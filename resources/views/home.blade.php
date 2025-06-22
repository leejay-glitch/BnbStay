@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<section class="relative bg-cover bg-center text-white min-h-screen py-24 px-6" style="background-image: url('{{ asset('images/bnb_bg.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative container mx-auto flex flex-col md:flex-row items-center justify-between gap-10">
        <div class="flex-1 text-center md:text-left" data-aos="fade-right">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
                Welcome to <span class="text-amber-400">Your Cozy Escape</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-xl">
                Discover comfort and style in our fully-equipped BnB apartment — ideal for business or leisure.
            </p>
            <a href="#availability" class="bg-amber-400 hover:bg-amber-300 text-gray-900 font-semibold px-8 py-4 rounded-full shadow-lg transition">
                Book Now
            </a>
        </div>
    </div>
</section>

<!-- BOOKING FORM -->
<!-- AVAILABILITY CHECK FORM -->
<section id="availability" class="py-20 px-6 bg-gray-100">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Check Availability</h2>

        <form action="{{ route('bnb.search') }}" method="GET" class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto bg-white p-8 rounded-3xl shadow-lg">
            <div>
                <label for="location" class="block font-semibold mb-2 text-gray-700">Location</label>
                <select name="location" id="location" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-teal-500 focus:border-teal-500">
                    <option value="Nairobi">Nairobi</option>
                </select>
            </div>
            <div>
                <label for="checkin" class="block font-semibold mb-2 text-gray-700">Check-in</label>
                <input type="date" id="checkin" name="checkin" required class="w-full border-gray-300 rounded-lg p-3">
            </div>
            <div>
                <label for="checkout" class="block font-semibold mb-2 text-gray-700">Check-out</label>
                <input type="date" id="checkout" name="checkout" required class="w-full border-gray-300 rounded-lg p-3">
            </div>
            <div class="md:col-span-3 text-center mt-4">
                <button type="submit" class="bg-teal-600 hover:bg-teal-500 text-white font-semibold px-10 py-3 rounded-full shadow transition">Check Availability</button>
            </div>
        </form>
    </div>
</section>


<!-- GALLERY -->
<section class="bg-gray-100 py-20 px-6">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-6">Gallery</h2>
        <p class="max-w-2xl mx-auto text-gray-600 mb-8">Swipe through our modern and cozy apartment.</p>

        <div class="swiper mySwiper w-full max-w-5xl mx-auto">
            <div class="swiper-wrapper">
                @foreach (['interior1', 'kitchen', 'washroom', 'washroom2', 'interior2', 'facilities'] as $img)
                    <div class="swiper-slide">
                        <div class="h-[500px] w-full rounded-2xl overflow-hidden shadow-lg">
                            <img src="{{ asset("images/{$img}.jpg") }}" alt="{{ ucfirst($img) }}"
                                 class="w-full h-full object-cover object-center transition-transform duration-300 hover:scale-105" />
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation & Pagination -->
            <div class="swiper-button-next text-indigo-600"></div>
            <div class="swiper-button-prev text-indigo-600"></div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>


<!-- FEATURES -->
<section class="bg-white py-20 px-6">
    <div class="container mx-auto grid md:grid-cols-2 items-center gap-10">
        <div class="rounded-3xl overflow-hidden shadow-lg" data-aos="fade-right">
            <img src="{{ asset('images/interior1.jpg') }}" alt="BnB Interior" class="w-full h-full object-cover">
        </div>
        <div data-aos="fade-left">
            <h2 class="text-3xl font-bold mb-4 text-gray-800">Experience Comfort & Style</h2>
            <p class="text-gray-600 mb-6 text-lg">Step into a space where elegance meets comfort. Our featured BnB offers a serene stay with modern décor, cozy lighting, and all essential amenities for your getaway.</p>
            <ul class="space-y-2 text-gray-700 font-medium mb-6">
                <li>✔ Fast WiFi & Smart TV</li>
                <li>✔ Fully equipped kitchen</li>
                <li>✔ Private balcony</li>
                <li>✔ Close to top attractions</li>
            </ul>
        </div>
    </div>
</section>

<!-- GUEST REVIEWS -->
<section class="bg-white py-20 px-6">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Why Guests Love Staying With Us</h2>
        <div class="grid md:grid-cols-3 gap-8 text-left">
            <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2 text-indigo-600">Fast WiFi & Smart TV</h3>
                <p>Unlimited streaming and browsing — perfect for remote work or cozy nights in.</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2 text-indigo-600">Fully Equipped Kitchenette</h3>
                <p>Fridge, microwave & more — cook your favorites anytime.</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2 text-indigo-600">Secure & Accessible</h3>
                <p>Gated apartment, 24/7 security, just 3 mins from town.</p>
            </div>
        </div>
        <div class="mt-16 max-w-3xl mx-auto text-center">
            <p class="text-xl italic text-gray-700 mb-4">"The studio was sparkling clean, cozy, and had everything I needed. Will definitely return!"</p>
            <span class="block text-indigo-600 font-semibold">— Leejay M., Nairobi</span>
        </div>
    </div>
</section>
@endsection
