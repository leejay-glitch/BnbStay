<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'BnB App') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="font-[Poppins] antialiased text-gray-800 bg-gray-50">

<!-- HEADER -->
<header class="sticky top-0 z-50 bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between px-6 py-4">
        <a href="/" class="text-2xl font-bold text-indigo-600">BnBStay</a>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
            <a href="/" class="hover:text-indigo-500">Home</a>
            <a href="#availability" class="hover:text-indigo-500">Book</a>
            <a href="#contact" class="hover:text-indigo-500">Contact</a>
        </nav>

        <!-- Mobile Menu Button -->
        <button id="menu-toggle" class="md:hidden text-indigo-600 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Nav -->
    <div id="mobile-menu" class="hidden md:hidden px-6 pb-4 space-y-2 text-gray-700 font-medium bg-white shadow-md">
        <a href="/" class="block hover:text-indigo-500">Home</a>
        <a href="#availability" class="block hover:text-indigo-500">Book</a>
        <a href="#contact" class="block hover:text-indigo-500">Contact</a>
    </div>
</header>

<!-- MAIN CONTENT -->
<main class="min-h-screen">
    @yield('content')

    <!-- CONTACT SECTION -->
    <section id="contact" class="bg-gray-100 py-12 px-6">
        <div class="container mx-auto px-6 text-center space-y-4">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Contact Us</h2>
            <div class="flex justify-center items-center space-x-6 text-sm">
                <!-- WhatsApp -->
                <a href="https://wa.me/254796123655" target="_blank" class="flex items-center space-x-2 hover:text-green-400 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-green-500" viewBox="0 0 24 24">
                        <path d="M20.52 3.48A11.87 11.87 0 0 0 12 0a11.87 11.87 0 0 0-8.52 3.48C1.3 5.66 0 8.69 0 12c0 2.05.53 4.05 1.52 5.8L0 24l6.32-1.52A11.93 11.93 0 0 0 12 24c3.31 0 6.34-1.3 8.52-3.48A11.87 11.87 0 0 0 24 12c0-3.31-1.3-6.34-3.48-8.52zM12 21.5a9.5 9.5 0 0 1-4.8-1.3l-.35-.2-3.75.9.9-3.75-.2-.35A9.5 9.5 0 1 1 12 21.5zm5.52-7.23c-.3-.15-1.77-.87-2.04-.97s-.48-.15-.68.15-.77.97-.95 1.17-.35.22-.65.07a7.83 7.83 0 0 1-2.3-1.42 8.72 8.72 0 0 1-1.6-2.01c-.15-.26 0-.4.11-.55.12-.14.26-.35.38-.52.13-.18.17-.3.26-.5.09-.18.04-.37-.02-.52-.07-.15-.68-1.64-.93-2.25-.24-.56-.5-.48-.68-.49l-.58-.01c-.2 0-.52.07-.8.37a3.35 3.35 0 0 0-1.03 2.47c0 1.45 1.03 2.85 1.18 3.05.15.2 2.02 3.1 4.9 4.35.68.3 1.2.48 1.62.61.68.22 1.3.19 1.79.11.55-.08 1.77-.72 2.02-1.42.25-.7.25-1.3.18-1.42-.07-.11-.25-.18-.52-.33z"/>
                    </svg>
                    <span>WhatsApp Us</span>
                </a>

                <!-- Phone -->
                <a href="tel:+254796123655" class="flex items-center space-x-2 hover:text-blue-400 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-blue-400" viewBox="0 0 24 24">
                        <path d="M6.62 10.79a15.054 15.054 0 0 0 6.59 6.59l2.2-2.2a1.004 1.004 0 0 1 1.11-.21c1.21.49 2.53.76 3.88.76a1 1 0 0 1 1 1v3.44a1 1 0 0 1-1 1C9.61 22 2 14.39 2 5a1 1 0 0 1 1-1h3.44a1 1 0 0 1 1 1c0 1.35.27 2.67.76 3.88a1 1 0 0 1-.21 1.11l-2.2 2.2z"/>
                    </svg>
                    <span>+254 796 123 655</span>
                </a>
            </div>

            <!-- Google Map -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Find us at Wood Avenue, Kilimani – Nairobi</h3>
                <div class="w-full h-64 md:h-96 rounded-lg overflow-hidden shadow-lg">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.72433121824!2d36.7872216!3d-1.2995278!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10ed6a6b9ff9%3A0x25aa17a74dcb7f41!2sWood%20Avenue%20Plaza%2C%20Kilimani%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1718790170376!5m2!1sen!2ske"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-200 py-8 text-center mt-16">
    <p>&copy; {{ date('Y') }} BnBStay. All rights reserved.</p>
</footer>

<!-- SCRIPTS -->
@stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    AOS.init({ duration: 800, once: true });

    document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('mobile-menu');
        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
         new Swiper('.mySwiper', {
        loop: true,
        spaceBetween: 20,
        centeredSlides: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        slidesPerView: 1,
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 }
        }
    });
    });
</script>
</body>
</html>
