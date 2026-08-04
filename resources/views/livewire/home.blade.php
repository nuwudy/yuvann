<div x-data="{ notification: null }" 
     @notify.window="notification = $event.detail[0]; setTimeout(() => notification = null, 3000)"
     class="relative">
     
    <!-- Toast Notification -->
    <div class="fixed bottom-5 right-5 z-50 transition-all duration-300" 
         x-show="notification" 
         x-transition:enter="transform ease-out duration-300 transition-all"
         x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;">
        <div class="bg-brand-green-800 text-white px-4 py-3 rounded-xl shadow-lg border border-brand-gold-500/30 flex items-center gap-2.5">
            <span class="text-brand-gold-400">🌿</span>
            <span class="text-xs font-semibold" x-text="notification ? notification.message : ''"></span>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-brand-green-50/70 via-brand-green-100/30 to-[#faf9f6] py-16 sm:py-24 overflow-hidden border-b border-brand-green-100/60">
        <div class="absolute inset-0 opacity-40">
            <!-- Decorative circle shape -->
            <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-brand-green-200/40 blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 w-80 h-80 rounded-full bg-brand-gold-100/40 blur-2xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Content -->
                <div class="lg:col-span-7 space-y-6 text-left">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-brand-green-100 border border-brand-green-200/50 rounded-full text-xs font-semibold text-brand-green-800 tracking-wide uppercase">
                        🌱 Clinical Ayurvedic Science
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-serif font-bold text-brand-green-900 leading-tight">
                        Nurturing Your Body With Authentic <span class="italic text-brand-green-700">Ayurvedic Integrity</span>
                    </h1>
                    <p class="text-sm sm:text-base text-brand-green-800/80 max-w-xl leading-relaxed">
                        Yuvann Wellness Concepts started by Dr Sajeev Dev. He started this movement to help people lead healthy and happy lives with wellness products. He is a Certified Ayurvedic Dietician and has Diploma in Herbal Medicines Manufacturing.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="/products" class="px-6 py-3 border border-transparent rounded-full text-sm font-semibold text-white bg-brand-green-800 hover:bg-brand-green-700 shadow-md hover:shadow-lg transition-all">
                            Shop Wellness Remedies
                        </a>
                        <a href="https://wa.me/917736609299?text=Hi%20Dr.%20Sajeev,%20I%20would%20like%20to%20consult%20regarding%20my%20health." 
                           target="_blank" 
                           class="px-6 py-3 border border-brand-green-200 rounded-full text-sm font-semibold text-brand-green-800 bg-white hover:bg-brand-green-50 transition-all flex items-center gap-1.5 shadow-sm">
                            Contact Dr. Sajeev Dev
                        </a>
                    </div>
                </div>
                
                <!-- Right Image Showcase -->
                <div class="lg:col-span-5 relative flex justify-center">
                    <div class="relative w-72 h-72 sm:w-96 sm:h-96 rounded-full border-4 border-brand-gold-500/20 p-4 bg-white shadow-xl overflow-hidden flex items-center justify-center">
                        <img src="https://yuvann.com/storage/media/5a70348f-5e77-430c-9440-e8fbbb60e7d9.webp" 
                             alt="Ayurvedic Wellness Oils" 
                             class="h-full w-full object-cover rounded-full hover:scale-105 transition-transform duration-700">
                    </div>
                    <!-- Small decorative card -->
                    <div class="absolute bottom-4 right-4 sm:right-10 bg-white border border-brand-green-100 p-3.5 rounded-xl shadow-lg flex items-center gap-3 max-w-[200px]">
                        <span class="text-xl">🎓</span>
                        <div class="text-left">
                            <h4 class="text-xs font-semibold text-brand-green-900 font-serif">Certified Expert</h4>
                            <p class="text-[10px] text-brand-green-700/60 leading-tight">Ayurvedic Dietician & Herbal Medicines.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
                <h2 class="text-3xl font-serif font-bold text-brand-green-900">Explore by Category</h2>
                <p class="text-xs sm:text-sm text-brand-green-700/70">Carefully structured ranges targeting specific wellness benefits.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($categories as $category)
                    @php
                        $bgImage = $category->image_url
                            ?? 'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?q=80&w=800&auto=format&fit=crop';
                    @endphp
                    <a href="/products?category={{ $category->slug }}" class="group relative rounded-2xl overflow-hidden h-48 border border-brand-green-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-end p-4">
                        <div class="absolute inset-0">
                            <img src="{{ $bgImage }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.5) 50%, transparent 100%);"></div>
                        </div>
                        <div class="relative z-10 text-left" style="text-shadow: 0px 2px 5px rgba(0,0,0,1), 0px 0px 10px rgba(0,0,0,0.8);">
                            <h3 class="font-serif text-lg md:text-xl font-bold text-white tracking-wide">{{ $category->name }}</h3>
                            <p class="text-[11px] md:text-xs text-white line-clamp-1 mt-1 font-medium">{{ $category->description }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Flagship Featured Products Section -->
    <section class="py-16 bg-[#faf9f6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
                <h2 class="text-3xl font-serif font-bold text-brand-green-900">Featured Formulations</h2>
                <p class="text-xs sm:text-sm text-brand-green-700/70">Dr. Sajeev Dev's highly recommended wellness essentials.</p>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProducts as $product)
                    <div class="bg-white rounded-2xl overflow-hidden border border-brand-green-100/60 shadow-sm hover:shadow-md hover:border-brand-gold-500/30 transition-all flex flex-col group relative">
                        
                        <!-- Badge -->
                        @if($product->badge)
                            <span class="absolute top-4 left-4 z-10 inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-brand-gold-500 text-brand-green-900 tracking-wide uppercase shadow-sm">
                                {{ $product->badge }}
                            </span>
                        @endif

                        <!-- Product Image -->
                        <div class="h-64 w-full overflow-hidden bg-brand-green-50 relative">
                            <a href="/products/{{ $product->slug }}">
                                <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </a>
                        </div>

                        <!-- Product Info -->
                        <div class="p-6 flex-grow flex flex-col text-left">
                            <span class="text-[10px] font-semibold text-brand-gold-600 uppercase tracking-widest">{{ $product->category->name }}</span>
                            <h3 class="font-serif text-lg font-bold text-brand-green-900 mt-1 hover:text-brand-green-700 transition-colors">
                                <a href="/products/{{ $product->slug }}">{{ $product->name }}</a>
                            </h3>
                            <p class="text-xs text-brand-green-700/60 mt-1.5 flex-grow line-clamp-2">
                                {{ $product->short_description }}
                            </p>
                            <div class="flex items-center justify-between mt-4">
                                <span class="text-xs text-brand-green-800 font-medium bg-brand-green-50 px-2 py-0.5 rounded-md border border-brand-green-100">
                                    {{ $product->unit_size }}
                                </span>
                                <div class="flex items-baseline gap-2">
                                    @if($product->is_on_sale)
                                        <span class="text-sm text-brand-green-700/40 line-through">₹{{ number_format($product->price, 2) }}</span>
                                        <span class="text-lg font-bold text-brand-green-900">₹{{ number_format($product->sale_price, 2) }}</span>
                                    @else
                                        <span class="text-lg font-bold text-brand-green-900">₹{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Card Action Buttons -->
                        <div class="px-6 pb-6 pt-2 border-t border-brand-green-50 flex gap-2">
                            <!-- Add to Cart -->
                            <button wire:click="addToCart({{ $product->id }})" 
                                    class="flex-1 py-2 px-3 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-full text-xs font-semibold shadow-sm hover:shadow transition-all focus:outline-none">
                                Add to Cart
                            </button>
                            
                            <!-- WhatsApp Purchase -->
                            @php
                                $waMessage = "Hello Dr. Sajeev Dev, I would like to order *" . $product->name . "* (" . $product->unit_size . ") priced at ₹" . number_format($product->active_price, 2) . ". Please guide me with payment details. Product link: " . url('/products/' . $product->slug);
                                $waUrl = "https://wa.me/917736609299?text=" . urlencode($waMessage);
                            @endphp
                            <a href="{{ $waUrl }}" target="_blank" 
                               class="py-2 px-3 border border-green-600 bg-green-50 text-green-700 hover:bg-green-100 rounded-full text-xs font-semibold flex items-center justify-center gap-1 transition-all">
                                <svg class="w-3.5 h-3.5 fill-current text-green-600" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                                </svg>
                                Buy now
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="/products" class="inline-flex items-center gap-1.5 px-6 py-3 border border-brand-green-800 text-sm font-semibold rounded-full text-brand-green-800 hover:bg-brand-green-50 transition-all shadow-sm">
                    View All Remedies
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Consultation Banner -->
    <section class="py-16 bg-brand-green-900 text-white relative overflow-hidden border-t-2 border-brand-gold-400">
        <div class="absolute inset-0 opacity-20">
            <!-- decorative layout -->
            <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-brand-gold-500/30 blur-3xl"></div>
            <div class="absolute -left-20 -top-20 w-80 h-80 rounded-full bg-brand-green-700/50 blur-2xl"></div>
        </div>

        <div class="max-w-4xl mx-auto text-center px-4 relative z-10 space-y-6">
            <span class="text-brand-gold-400 text-3xl font-serif">🌾</span>
            <h2 class="text-3xl sm:text-4xl font-serif font-bold text-brand-gold-100">Professional Ayurvedic Consultation</h2>
            <p class="text-sm sm:text-base text-brand-green-100/80 leading-relaxed max-w-2xl mx-auto">
                Are you dealing with specific wellness goals or chronic health conditions? Get expert, personalized medical guidance from **Dr. Sajeev Dev** directly on WhatsApp.
            </p>
            <div class="pt-4">
                <a href="https://wa.me/917736609299?text=Hi%20Dr.%20Sajeev,%20I%20would%20like%20to%20schedule%20a%20personal%20health%20consultation." 
                   target="_blank" 
                   class="inline-flex items-center gap-2.5 px-8 py-4 border border-transparent rounded-full text-base font-semibold text-brand-green-900 bg-brand-gold-500 hover:bg-brand-gold-400 shadow-lg hover:scale-105 transition-all duration-300">
                    <svg class="w-5 h-5 fill-current text-brand-green-900" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                    </svg>
                    Book WhatsApp Consultation
                </a>
            </div>
            <p class="text-[10px] text-brand-green-100/50">Consultations are conducted over text, voice note, or call.</p>
        </div>
    </section>
</div>
