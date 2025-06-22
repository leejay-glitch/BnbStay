@extends('layouts.app')

@section('content')
<section class="container mx-auto px-6 py-20 text-center">
    <h1 class="text-3xl font-bold mb-6">Availability Result</h1>

    <p class="text-lg text-gray-600 mb-6">
        <strong>Location:</strong> {{ $location }}<br>
        <strong>Dates:</strong> {{ $checkin }} to {{ $checkout }}
    </p>

    @if($available)
       <!-- Booking Form When Dates ARE Available -->
        <div class="max-w-2xl mx-auto mt-10 bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-gray-200" data-aos="fade-up">
            <h3 class="text-2xl font-bold mb-6 flex items-center justify-center gap-2 text-gray-800">
                <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7l-4-4m0 0L8 7m4-4v18"/>
                </svg>
                Complete Your Booking
            </h3>

            <form action="{{ route('bnb.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="location" value="{{ $location }}">
                <input type="hidden" name="check_in_date" value="{{ $checkin }}">
                <input type="hidden" name="check_out_date" value="{{ $checkout }}">

                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="name" id="name" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email (optional)</label>
                    <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1">Phone Number</label>
                    <input type="tel" name="phone" id="phone" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-teal-600 hover:bg-teal-500 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
                        Confirm Booking
                    </button>
                </div>
            </form>
        </div>


    @else
        <div class="bg-red-100 border border-red-300 text-red-700 px-6 py-4 rounded-xl mb-6 inline-block">
            😔 Sorry, the BnB is already booked for those dates.
        </div>

     

        <h3 class="text-xl font-semibold text-gray-800 mt-10 mb-4">Try Another Date</h3>
        <input type="text" id="available-dates" class="border p-3 rounded w-full max-w-sm mx-auto" placeholder="Pick available dates">

        <!-- Custom Booking Form -->
<div class="max-w-2xl mx-auto mt-10 bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-2xl border border-gray-200" data-aos="fade-up">
    <h3 class="text-2xl font-bold mb-6 flex items-center justify-center gap-2 text-gray-800">
        <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7l-4-4m0 0L8 7m4-4v18"/>
        </svg>
        Complete Your Booking
    </h3>

            <form id="calendar-booking-form" action="{{ route('bnb.store') }}" method="POST" class="space-y-6 hidden">
                    @csrf
                    <input type="hidden" name="location" value="{{ $location }}">
                    <input type="hidden" id="cal_check_in" name="check_in_date">
                    <input type="hidden" id="cal_check_out" name="check_out_date">


                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="name" id="name" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email (optional)</label>
                    <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1">Phone Number</label>
                    <input type="tel" name="phone" id="phone" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-teal-600 hover:bg-teal-500 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
                        Confirm Booking
                    </button>
                </div>
            </form>
        </div>

    @endif
</section>

{{-- 🧠 Flatpickr Scripts --}}
@if(!$available)
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const disabled = @json($disabledDates ?? []);

        flatpickr("#available-dates", {
            mode: "range",
            minDate: "today",
            dateFormat: "Y-m-d",
            disable: disabled,
            locale: {
                firstDayOfWeek: 1
            },
            onDayCreate: function (dObj, dStr, fp, dayElem) {
                const dateStr = dayElem.dateObj.toISOString().split('T')[0];
                if (disabled.includes(dateStr)) {
                    dayElem.style.background = "#fca5a5"; // Light red
                    dayElem.style.color = "#fff";
                    dayElem.style.cursor = "not-allowed";
                }
            },
            onClose: function (selectedDates) {
                if (selectedDates.length === 2) {
                    const [start, end] = selectedDates;
                    document.getElementById("cal_check_in").value = start.toISOString().split('T')[0];
                    document.getElementById("cal_check_out").value = end.toISOString().split('T')[0];
                    document.getElementById("calendar-booking-form").classList.remove("hidden");
                    document.getElementById("calendar-booking-form").scrollIntoView({ behavior: "smooth" });
                }
            }
        });
    });
</script>
@endpush

@endif
@endsection