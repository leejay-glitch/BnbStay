<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingRequest;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Carbon\CarbonPeriod;



class BnBController extends Controller
{
    /**
     * Check availability based on date & location.
     */
    public function search(Request $request)
    {
        $location = $request->input('location');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');

        // Check for any existing booking that overlaps
        $overlap = BookingRequest::where('location', 'like', "%$location%")
            ->where(function($query) use ($checkin, $checkout) {
                $query->whereBetween('check_in_date', [$checkin, $checkout])
                    ->orWhereBetween('check_out_date', [$checkin, $checkout])
                    ->orWhere(function ($query) use ($checkin, $checkout) {
                        $query->where('check_in_date', '<=', $checkin)
                              ->where('check_out_date', '>=', $checkout);
                    });
            })->exists();

        $available = !$overlap;

        // Fetch all booked date ranges to disable in calendar
        $bookings = BookingRequest::all(['check_in_date', 'check_out_date']);
        $disabledDates = [];

        foreach ($bookings as $booking) {
            $period = \Carbon\CarbonPeriod::create($booking->check_in_date, $booking->check_out_date);
            foreach ($period as $date) {
                $disabledDates[] = $date->format('Y-m-d');
             }
        }
        return view('bnb.results', compact(
            'location',
            'checkin',
            'checkout',
            'available',
            'disabledDates',
            'bookings'
        ));
    }

    /**
     * Store booking
     */
    public function store(Request $request)
    {
        \Log::info('Reached store method.', $request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:150',
            'phone' => 'nullable|string|max:20',
            'location' => 'required|string|max:255',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

       // Double booking prevention
        $overlap = BookingRequest::where('location', 'like', "%{$validated['location']}%")
            ->where(function($query) use ($validated) {
                $query->whereBetween('check_in_date', [$validated['check_in_date'], $validated['check_out_date']])
                    ->orWhereBetween('check_out_date', [$validated['check_in_date'], $validated['check_out_date']])
                    ->orWhere(function ($query) use ($validated) {
                        $query->where('check_in_date', '<=', $validated['check_in_date'])
                                ->where('check_out_date', '>=', $validated['check_out_date']);
                    });
            })->exists();

        if ($overlap) {
            return redirect()->back()->withErrors(['Sorry, those dates are no longer available. Please choose others.']);
    }

    BookingRequest::create($validated);
    \Log::info('Booking created');

    return redirect()->route('bnb.confirmation');
}
}
