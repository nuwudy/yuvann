<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Yuvann Wellness Concepts - Premium Ayurvedic & Herbal Products' }}</title>
    
    <!-- SEO Meta Tags -->
    @hasSection('meta')
        @yield('meta')
    @else
        <meta name="description" content="Explore Yuvann Wellness Concepts by Dr. Sajeev Dev. Premium Ayurvedic oils, skin syrups, zero-calorie monk fruit, superfood soup mixes, and herbal powders.">
        <meta name="keywords" content="Ayurveda, Herbal Products, Ruthu Santhi Oil, Skin Rich Syrup, Monk Fruit Powder, Moringa Leaves, Dr. Sajeev Dev, Wellness">
        
        <!-- Open Graph / Social Media defaults -->
        <meta property="og:title" content="{{ $title ?? 'Yuvann Wellness Concepts' }}">
        <meta property="og:description" content="Explore Yuvann Wellness Concepts by Dr. Sajeev Dev. Premium Ayurvedic oils, skin syrups, zero-calorie monk fruit, superfood soup mixes, and herbal powders.">
        <meta property="og:image" content="{{ url('/icons/icon-512.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
    @endif

    <!-- ═══════════════ PWA Meta Tags ═══════════════ -->
    <!-- Web App Manifest -->
    <link rel="manifest" href="/manifest.json">

    <!-- Theme colour (Android status bar + browser chrome) -->
    <meta name="theme-color" content="#1a3d2b">
    <meta name="msapplication-TileColor" content="#1a3d2b">
    <meta name="msapplication-TileImage" content="/icons/icon-144.png">

    <!-- iOS / Safari PWA -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Yuvann">
    <link rel="apple-touch-icon" href="/icons/icon-192.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icons/icon-144.png">
    <link rel="apple-touch-icon" sizes="167x167" href="/icons/icon-192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/icon-192.png">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="96x96" href="/icons/icon-96.png">
    <link rel="shortcut icon" href="/favicon.ico">
    <!-- ════════════════════════════════════════════ -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- ═══════════════ Service Worker Registration ═══════════════ -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register('/sw.js', { scope: '/' })
                    .then(function (reg) {
                        console.log('[Yuvann PWA] Service worker registered:', reg.scope);
                    })
                    .catch(function (err) {
                        console.warn('[Yuvann PWA] Service worker registration failed:', err);
                    });
            });
        }
    </script>
    <!-- ══════════════════════════════════════════════════════════ -->
</head>
<body class="flex flex-col min-h-screen antialiased bg-[#faf9f6] text-[#1a2a22]">

    <!-- Floating Shop Now Button -->
    <a href="/products" class="fixed left-0 top-1/2 -translate-y-1/2 z-50 bg-brand-gold-500 hover:bg-brand-gold-400 text-brand-green-900 font-bold py-4 px-2 rounded-r-lg shadow-xl transition-transform hover:scale-105 flex items-center justify-center border border-l-0 border-brand-green-900/20 group" style="writing-mode: vertical-rl; text-orientation: mixed; transform: rotate(180deg);">
        <span class="tracking-widest text-sm uppercase">Shop Now</span>
    </a>

    <!-- Top Announcement Bar -->
    <div class="bg-brand-green-800 text-white text-xs py-2 px-4 text-center font-medium tracking-wide">
        🌿 100% Doctor Formulated Ayurvedic Products | Free Delivery on Orders above ₹999!
    </div>

    <!-- Header Navigation -->
    <header class="sticky top-0 z-40 bg-[#faf9f6]/95 backdrop-blur-md border-b border-brand-green-100 shadow-sm" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="flex items-center gap-2 group">
                        <img src="{{ asset('images/logo.png') }}" alt="Yuvann Wellness Logo" class="h-12 w-auto">
                    </a>
                </div>

                <!-- Desktop Nav Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-sm font-medium text-brand-green-800 hover:text-brand-gold-600 transition-colors">Home</a>
                    <a href="/products" class="text-sm font-medium text-brand-green-800 hover:text-brand-gold-600 transition-colors">Shop All</a>
                    <a href="/products?category=womens-care" class="text-sm font-medium text-brand-green-800 hover:text-brand-gold-600 transition-colors">Women's Care</a>
                    <a href="/products?category=superfoods" class="text-sm font-medium text-brand-green-800 hover:text-brand-gold-600 transition-colors">Superfoods</a>
                    <a href="/products?category=herbal-powders" class="text-sm font-medium text-brand-green-800 hover:text-brand-gold-600 transition-colors">Herbal Powders</a>
                    <a href="{{ route('dr-sajeev-dev') }}" class="text-sm font-medium text-brand-green-800 hover:text-brand-gold-600 transition-colors">About Dr Sajeev Dev</a>
                </nav>

                <!-- Header Actions -->
                <div class="flex items-center gap-4">
                    <!-- Search Bar (Simple Redirect) -->
                    <form action="/products" method="GET" class="hidden lg:flex items-center relative">
                        <input type="text" name="search" placeholder="Search wellness..." 
                               class="bg-brand-green-50 border border-brand-green-100 rounded-full py-1.5 pl-4 pr-10 text-xs focus:outline-none focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900 w-48 transition-all focus:w-60">
                        <button type="submit" class="absolute right-3 text-brand-green-600 hover:text-brand-gold-600">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </form>

                    <!-- WhatsApp Button -->
                    <a href="https://wa.me/917736609299?text=Hi%20Dr.%20Sajeev,%20I%20would%20like%20to%20consult%20regarding%20Yuvann%20Wellness%20products." 
                       target="_blank" 
                       class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 border border-green-600 text-xs font-semibold rounded-full text-green-700 bg-green-50 hover:bg-green-100 transition-all shadow-sm">
                        <svg class="w-4 h-4 text-green-600 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                        </svg>
                        Dr. Sajeev Dev
                    </a>

                    <!-- Mini Cart Livewire Trigger component -->
                    <livewire:mini-cart />

                    <!-- Mobile Menu Button -->
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-brand-green-800 hover:text-brand-gold-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" x-show="!mobileMenuOpen"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" x-show="mobileMenuOpen" style="display: none;"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Alpine.js) -->
        <div class="md:hidden bg-[#faf9f6] border-t border-brand-green-100" x-show="mobileMenuOpen" x-transition style="display: none;">
            <div class="px-2 pt-2 pb-4 space-y-1 sm:px-3">
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-brand-green-800 hover:bg-brand-green-50">Home</a>
                <a href="/products" class="block px-3 py-2 rounded-md text-base font-medium text-brand-green-800 hover:bg-brand-green-50">Shop All</a>
                <a href="/products?category=womens-care" class="block px-3 py-2 rounded-md text-base font-medium text-brand-green-800 hover:bg-brand-green-50">Women's Care</a>
                <a href="/products?category=superfoods" class="block px-3 py-2 rounded-md text-base font-medium text-brand-green-800 hover:bg-brand-green-50">Superfoods</a>
                <a href="/products?category=herbal-powders" class="block px-3 py-2 rounded-md text-base font-medium text-brand-green-800 hover:bg-brand-green-50">Herbal Powders</a>
                <a href="{{ route('dr-sajeev-dev') }}" class="block px-3 py-2 rounded-md text-base font-medium text-brand-green-800 hover:bg-brand-green-50">About</a>
                <div class="mt-4 px-3">
                    <form action="/products" method="GET" class="relative">
                        <input type="text" name="search" placeholder="Search..." 
                               class="bg-brand-green-50 border border-brand-green-100 rounded-full py-2 pl-4 pr-10 text-sm w-full focus:outline-none">
                        <button type="submit" class="absolute right-3 top-2.5 text-brand-green-600">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Slot -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-brand-green-900 text-white mt-16 border-t-4 border-brand-gold-500">
        <!-- Trust Badges Section -->
        <div class="bg-brand-green-800 border-b border-brand-green-700 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-brand-green-700/50 flex items-center justify-center border border-brand-gold-500/30 mb-3 text-brand-gold-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h4 class="font-serif text-lg text-brand-gold-100">100% Herbal & Pure</h4>
                        <p class="text-xs text-brand-green-100/70 mt-1">Sourced from the finest natural plantations and prepared with traditional integrity.</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-brand-green-700/50 flex items-center justify-center border border-brand-gold-500/30 mb-3 text-brand-gold-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                        <h4 class="font-serif text-lg text-brand-gold-100">Doctor Formulated</h4>
                        <p class="text-xs text-brand-green-100/70 mt-1">Backed by the clinical experience of Dr. Sajeev Dev for targeted physiological benefits.</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 rounded-full bg-brand-green-700/50 flex items-center justify-center border border-brand-gold-500/30 mb-3 text-brand-gold-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h4 class="font-serif text-lg text-brand-gold-100">ISO Certified Quality</h4>
                        <p class="text-xs text-brand-green-100/70 mt-1">Prepared in certified manufacturing facilities maintaining strict hygiene & potency standards.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Footer Links & Info -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Branding column -->
                <div class="space-y-4">
                    <h3 class="text-xl font-serif text-brand-gold-400">Yuvann Wellness</h3>
                    <p class="text-xs text-brand-green-100/70 leading-relaxed">
                        Pioneering pure, clinical-grade Ayurvedic formulations and plant-based foods to restore your body's natural harmony. Created by Dr. Sajeev Dev.
                    </p>
                    <div class="flex gap-4">
                        <a href="https://wa.me/917736609299" target="_blank" class="text-brand-green-200 hover:text-white transition-colors">
                            <span class="sr-only">WhatsApp</span>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Navigation link list -->
                <div>
                    <h4 class="font-serif text-sm text-brand-gold-400 mb-4 tracking-wider uppercase">Our Categories</h4>
                    <ul class="space-y-2.5 text-xs text-brand-green-100/70">
                        <li><a href="/products?category=womens-care" class="hover:text-white transition-colors">Women's Care & Oils</a></li>
                        <li><a href="/products?category=superfoods" class="hover:text-white transition-colors">Nourishing Superfoods</a></li>
                        <li><a href="/products?category=herbal-powders" class="hover:text-white transition-colors">Pure Herbal Powders</a></li>
                        <li><a href="/products?category=natural-sweeteners" class="hover:text-white transition-colors">Low-Calorie Sweeteners</a></li>
                    </ul>
                </div>

                <!-- Support link list -->
                <div>
                    <h4 class="font-serif text-sm text-brand-gold-400 mb-4 tracking-wider uppercase">Quick Links</h4>
                    <ul class="space-y-2.5 text-xs text-brand-green-100/70">
                        <li><a href="/" class="hover:text-white transition-colors">Home</a></li>
                        <li><a href="/products" class="hover:text-white transition-colors">Browse Store</a></li>
                        <li><a href="{{ route('dr-sajeev-dev') }}" class="hover:text-white transition-colors">About Dr. Sajeev Dev</a></li>
                        <li><a href="https://wa.me/917736609299" target="_blank" class="hover:text-white transition-colors">Consult on WhatsApp</a></li>
                        <li><a href="/admin/products" class="hover:text-white transition-colors">Admin Panel</a></li>
                    </ul>
                </div>

                <!-- Contact card details -->
                <div>
                    <h4 class="font-serif text-sm text-brand-gold-400 mb-4 tracking-wider uppercase">Get In Touch</h4>
                    <ul class="space-y-3 text-xs text-brand-green-100/70">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-brand-gold-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Kerala, India</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-brand-gold-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <a href="tel:+917736609299" class="hover:text-white transition-colors">+91 7736609299</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-brand-gold-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <a href="mailto:infoyuvann@gmail.com" class="hover:text-white transition-colors">infoyuvann@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Medical Disclaimer & Copyright -->
            <div class="mt-12 pt-8 border-t border-brand-green-800 text-center space-y-4">
                <p class="text-[10px] text-brand-green-100/50 max-w-4xl mx-auto leading-relaxed">
                    <strong>Medical Disclaimer:</strong> The information provided on this website is for educational purposes only and is not intended to substitute medical advice, diagnosis, or treatment. Please consult with Dr. Sajeev Dev or another qualified physician regarding any health concerns, or before using any products or beginning any dietary plans.
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-xs text-brand-green-100/60 pt-2 pb-2">
                    <a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms & Conditions</a>
                    <span class="text-brand-green-700">|</span>
                    <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                    <span class="text-brand-green-700">|</span>
                    <a href="{{ route('refund') }}" class="hover:text-white transition-colors">Refund & Cancellation</a>
                    <span class="text-brand-green-700">|</span>
                    <a href="{{ route('shipping') }}" class="hover:text-white transition-colors">Shipping Policy</a>
                    <span class="text-brand-green-700">|</span>
                    <a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact Us</a>
                </div>
                <p class="text-xs text-brand-green-100/40">
                    &copy; {{ date('Y') }} Yuvann Wellness Concepts. All rights reserved. Designed for health.
                </p>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
