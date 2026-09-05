<div x-data="{ notification: null, showAssessment: false }" 
     @notify.window="notification = $event.detail[0]; setTimeout(() => notification = null, 3000)"
     class="relative font-sans text-brand-green-900 selection:bg-brand-gold-200 selection:text-brand-green-900">
     
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

    <!-- Product Ticker -->
    <div class="bg-brand-green-800 border-b border-brand-gold-500/20 overflow-hidden py-3 flex items-center group w-full">
        <div class="product-marquee-content group-hover:[animation-play-state:paused]">
            <!-- First Set -->
            @foreach($featuredProducts as $product)
                <a href="/products/{{ $product->slug }}" class="text-brand-gold-400 hover:text-white text-sm font-semibold tracking-wider mx-6 transition-colors inline-flex items-center gap-2">
                    <span class="text-[10px]">✨</span> {{ $product->name }}
                </a>
            @endforeach
            <!-- Second Set -->
            @foreach($featuredProducts as $product)
                <a href="/products/{{ $product->slug }}" class="text-brand-gold-400 hover:text-white text-sm font-semibold tracking-wider mx-6 transition-colors inline-flex items-center gap-2">
                    <span class="text-[10px]">✨</span> {{ $product->name }}
                </a>
            @endforeach
            <!-- Third Set -->
            @foreach($featuredProducts as $product)
                <a href="/products/{{ $product->slug }}" class="text-brand-gold-400 hover:text-white text-sm font-semibold tracking-wider mx-6 transition-colors inline-flex items-center gap-2">
                    <span class="text-[10px]">✨</span> {{ $product->name }}
                </a>
            @endforeach
            <!-- Fourth Set -->
            @foreach($featuredProducts as $product)
                <a href="/products/{{ $product->slug }}" class="text-brand-gold-400 hover:text-white text-sm font-semibold tracking-wider mx-6 transition-colors inline-flex items-center gap-2">
                    <span class="text-[10px]">✨</span> {{ $product->name }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Special Announcement Banner: Migraine Ottamooli Camp -->
    <a href="/migraine-treatment" 
       class="py-3 px-4 text-center block shadow-sm transition-all hover:brightness-110 group border-y border-brand-gold-500/30"
       style="background: linear-gradient(90deg, #0e241b 0%, #1a4332 50%, #0e241b 100%);">
        <div class="max-w-7xl mx-auto flex items-center justify-center gap-2.5 flex-wrap text-white text-xs sm:text-sm font-medium">
            <span class="bg-brand-gold-400 text-brand-green-950 font-extrabold text-[11px] px-3 py-0.5 rounded-full uppercase tracking-wider shadow-sm">
                പ്രത്യേകം
            </span>
            <span class="text-brand-gold-200 font-bold">⚡ മൈഗ്രെയ്ൻ മാറാനുള്ള അപൂർവ്വ ഒറ്റമൂലി ചികിത്സ</span>
            <span class="hidden md:inline text-white/60">•</span>
            <span class="text-white/90">ഡോ. സജീവ് ദേവ് (കരിയാട്, എറണാകുളം)</span>
            <span class="inline-flex items-center gap-1 bg-brand-gold-500 hover:bg-brand-gold-400 text-brand-green-950 font-bold text-xs px-3.5 py-1 rounded-full shadow-sm ml-1 transition-transform group-hover:scale-105">
                <span>വിശദവിവരങ്ങൾക്കും ബുക്കിംഗിനും</span>
                <span>&rarr;</span>
            </span>
        </div>
    </a>

    <!-- 1. Immersive Hero Section with Video -->
    <section class="relative h-[85vh] min-h-[600px] flex items-center justify-center overflow-hidden bg-brand-green-900">
        <!-- Background Video -->
        <div class="absolute inset-0 z-0">
            <video autoplay loop muted playsinline class="w-full h-full object-cover opacity-80" poster="https://images.unsplash.com/photo-1611079830811-865080b06b9b?q=80&w=1600&auto=format&fit=crop">
                <!-- High-quality free nature/wellness video placeholder -->
                <source src="https://yuvann.com/storage/media/videos/5LLMTMqQtRg1rsepiVSWiPECnpPKf02QOUMHG9wA.mp4" type="video/mp4">
            </video>
            <!-- Overlay to ensure text readability -->
            <div class="absolute inset-0 bg-gradient-to-b from-brand-green-900/60 via-brand-green-900/30 to-brand-green-900/80"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto space-y-6 mt-16">
            <span class="block text-brand-gold-300 text-sm md:text-base font-semibold tracking-[0.2em] uppercase mb-4 opacity-0 animate-[fadeInUp_1s_ease-out_forwards]">
                CURATED AYURVEDIC WELLNESS
            </span>
            <h1 class="text-5xl sm:text-6xl md:text-7xl font-serif text-white leading-tight drop-shadow-lg opacity-0 animate-[fadeInUp_1s_ease-out_0.2s_forwards]">
                Think Wellness. <br/><span class="italic font-light">Think Yuvann.</span>
            </h1>
            <p class="text-brand-green-50 text-base md:text-lg max-w-2xl mx-auto font-light leading-relaxed drop-shadow opacity-0 animate-[fadeInUp_1s_ease-out_0.4s_forwards]">
                India’s trusted destination for doctor-guided, holistic wellness and natural care.
            </p>
            <div class="pt-8 flex flex-col sm:flex-row flex-wrap gap-4 justify-center items-center opacity-0 animate-[fadeInUp_1s_ease-out_0.6s_forwards]">
                <a href="/migraine-treatment" class="px-7 py-3.5 bg-brand-gold-400 hover:bg-brand-gold-300 text-brand-green-950 text-sm font-extrabold rounded-full shadow-xl hover:scale-105 transition-all duration-300 flex items-center gap-2 border-2 border-brand-gold-300 animate-pulse">
                    <span>⚡</span>
                    <span>മൈഗ്രെയ്ൻ ഒറ്റമൂലി ചികിത്സ</span>
                </a>
                <a href="/products" class="px-6 py-3 bg-brand-gold-500 hover:bg-brand-gold-400 text-brand-green-900 text-sm font-semibold rounded-full shadow-lg hover:scale-105 transition-all duration-300">
                    Shop Wellness
                </a>
                <a href="#bmi-assessment" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-semibold rounded-full shadow-lg hover:scale-105 transition-all duration-300">
                    Take Assessment Test
                </a>
                <a href="#iron-test" class="px-6 py-3 bg-[#8a1c1c] hover:bg-[#6b1515] text-white text-sm font-semibold rounded-full shadow-lg hover:scale-105 transition-all duration-300">
                    Iron & Blood Vitality Test
                </a>
                <a href="#diet-plan-test" class="px-6 py-3 bg-brand-green-800 hover:bg-brand-green-700 text-white text-sm font-semibold rounded-full shadow-lg hover:scale-105 transition-all duration-300">
                    Find Your Diet Plan
                </a>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 flex flex-col items-center gap-2 animate-bounce opacity-80">
            <span class="text-white text-[10px] uppercase tracking-widest font-semibold drop-shadow">Scroll</span>
            <svg class="w-4 h-4 text-white drop-shadow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
        </div>
    </section>

    <!-- Hand Picked for You Carousel -->
    <section id="hand-picked" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-serif font-bold text-brand-green-900">Hand Picked for You</h2>
                    <p class="text-sm text-brand-green-700/70 mt-2">Specially selected Ayurvedic essentials for your wellness journey.</p>
                </div>
                <a href="/products" class="hidden sm:inline-flex text-sm font-semibold text-brand-green-800 hover:text-brand-green-600 border-b border-brand-green-800 pb-0.5 transition-colors">
                    Shop All
                </a>
            </div>

            <!-- Horizontal Scroll Container with Arrows -->
            <div x-data="{
                scrollLeft() { $refs.handpickedSlider.scrollBy({ left: -350, behavior: 'smooth' }); },
                scrollRight() { $refs.handpickedSlider.scrollBy({ left: 350, behavior: 'smooth' }); }
            }" class="relative group">
                
                <!-- Left Arrow -->
                <button @click="scrollLeft" class="absolute left-2 md:-left-4 top-1/2 -translate-y-1/2 z-30 bg-white shadow-md hover:shadow-lg rounded-full p-3 text-brand-green-900 hover:bg-brand-gold-500 transition-all flex items-center justify-center border border-brand-green-100" aria-label="Scroll Left">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <!-- Right Arrow -->
                <button @click="scrollRight" class="absolute right-2 md:-right-4 top-1/2 -translate-y-1/2 z-30 bg-white shadow-md hover:shadow-lg rounded-full p-3 text-brand-green-900 hover:bg-brand-gold-500 transition-all flex items-center justify-center border border-brand-green-100" aria-label="Scroll Right">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <div x-ref="handpickedSlider" class="flex overflow-x-auto gap-6 pb-8 pt-4 snap-x snap-mandatory hide-scrollbar -mx-4 px-4 sm:mx-0 sm:px-0">
                    @foreach($featuredProducts as $product)
                        <div class="snap-start shrink-0 w-[280px] sm:w-[320px] bg-white rounded-xl shadow-sm border border-brand-green-50 group/card relative hover:shadow-xl hover:-translate-y-1 hover:border-brand-gold-500/30 transition-all duration-300 flex flex-col">
                            
                            @if($product->badge)
                                <span class="absolute top-4 left-4 z-10 px-2.5 py-1 rounded bg-brand-gold-500/90 backdrop-blur-sm text-[10px] font-bold text-brand-green-900 tracking-wider uppercase">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            <!-- Image with Hover Reveal -->
                            <div class="h-80 w-full bg-brand-green-50 relative overflow-hidden rounded-t-xl">
                                <a href="/products/{{ $product->slug }}">
                                    <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="absolute inset-0 h-full w-full object-cover group-hover/card:scale-105 transition-transform duration-700">
                                </a>
                                
                                <!-- Desktop Quick Add Overlay -->
                                <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover/card:translate-y-0 transition-transform duration-300 ease-out hidden lg:block bg-gradient-to-t from-black/60 to-transparent">
                                    <button wire:click="addToCart({{ $product->id }})" class="w-full py-3 bg-white text-brand-green-900 font-semibold text-sm rounded shadow hover:bg-brand-gold-500 active:scale-95 transition-all duration-200">
                                        Quick Add - ₹{{ number_format($product->active_price, 2) }}
                                    </button>
                                </div>
                            </div>

                            <!-- Info -->
                            <div class="p-5 flex flex-col flex-grow text-center">
                                <span class="text-[9px] font-bold text-brand-gold-600 uppercase tracking-wider mb-2 break-words leading-snug">{{ $product->categories->isNotEmpty() ? $product->categories->pluck('name')->join(' • ') : 'Product' }}</span>
                                <h3 class="font-serif text-lg text-brand-green-900 mb-1 hover:text-brand-green-700 transition-colors">
                                    <a href="/products/{{ $product->slug }}">{{ $product->name }}</a>
                                </h3>
                                @if($product->review_count > 0)
                                    <div class="flex items-center justify-center gap-1 mb-2">
                                        <div class="flex text-brand-gold-500">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-3 h-3 {{ $i <= round($product->average_rating) ? 'fill-current' : 'text-gray-300 fill-current' }}" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-[10px] text-brand-green-700/60 font-medium">({{ $product->review_count }})</span>
                                    </div>
                                @endif
                                <p class="text-sm text-brand-green-700/60 mb-4">{{ $product->unit_size ?? '' }}</p>
                                
                                <div class="mt-auto flex items-center justify-center gap-3">
                                    @if($product->is_on_sale)
                                        <span class="text-sm text-brand-green-700/40 line-through">₹{{ number_format($product->price, 2) }}</span>
                                        <span class="text-lg font-medium text-brand-green-900">₹{{ number_format($product->sale_price, 2) }}</span>
                                    @else
                                        <span class="text-lg font-medium text-brand-green-900">₹{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                                
                                <!-- Mobile / Tablet Add Button -->
                                <div class="mt-5 lg:hidden">
                                    <button wire:click="addToCart({{ $product->id }})" class="w-full py-2.5 border-2 border-brand-green-800 text-brand-green-800 font-semibold text-xs rounded-lg hover:bg-brand-green-800 hover:text-white active:scale-95 transition-all duration-200">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="text-center mt-6 sm:hidden">
                <a href="/products" class="inline-block border-b border-brand-green-800 text-brand-green-800 font-semibold text-sm pb-1">View All Products</a>
            </div>
        </div>
    </section>



    <!-- 2. Trust & Authority Bar -->
    <section class="bg-brand-green-900 text-brand-gold-100 py-6 border-y border-brand-gold-500/20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-8 md:gap-16 text-sm font-medium">
                <div class="flex items-center gap-2 group cursor-default">
                    <svg class="w-5 h-5 text-brand-gold-400 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span>100% Organic Ingredients</span>
                </div>
                <div class="flex items-center gap-2 group cursor-default">
                    <svg class="w-5 h-5 text-brand-gold-400 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path></svg>
                    <span>Expert Formulated</span>
                </div>
                <div class="flex items-center gap-2 group cursor-default">
                    <svg class="w-5 h-5 text-brand-gold-400 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    <span>GMP Certified Process</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Targeted Body Care Section (Shown directly above Shop by Category) -->
    @if(isset($bodyParts) && $bodyParts->count() > 0)
    <section class="py-14 bg-[#faf9f6] border-b border-brand-green-100/60 relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <span class="text-[11px] font-bold text-brand-gold-600 uppercase tracking-widest block mb-1">Targeted Holistic Wellness</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-brand-green-900">Targeted Body Care</h2>
                <p class="text-brand-green-700/70 mt-1.5 text-xs sm:text-sm max-w-xl mx-auto">Focus on what needs care today — doctor-guided formulations tailored for specific areas of your body.</p>
            </div>

            <!-- Smaller Compact Grid of Body Parts -->
            <div class="flex flex-wrap justify-center gap-3 sm:gap-4 md:gap-5">
                @foreach($bodyParts as $part)
                    @php
                        $partImg = $part->image_url ?? 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=400&auto=format&fit=crop';
                    @endphp
                    <a href="/products?body_part={{ $part->slug }}" 
                       class="group flex flex-col items-center bg-white p-2.5 sm:p-3 rounded-2xl border border-brand-green-100/80 shadow-xs hover:shadow-md hover:border-brand-gold-400 hover:-translate-y-1 transition-all duration-300 w-[84px] sm:w-[100px] md:w-[112px] text-center">
                        <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-full overflow-hidden mb-2 bg-brand-green-50 border-2 border-brand-green-100/80 group-hover:border-brand-gold-500 transition-all duration-300 relative p-0.5 shadow-xs flex items-center justify-center">
                            <img src="{{ $partImg }}" alt="{{ $part->name }}" class="w-full h-full object-cover rounded-full group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <span class="font-sans text-[11px] sm:text-xs font-semibold text-brand-green-900 leading-tight group-hover:text-brand-gold-600 transition-colors line-clamp-2">
                            {{ $part->name }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- 3. Categories -->
    <section class="py-16 bg-brand-green-900 relative">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-white">Shop by Category</h2>
                <p class="text-brand-green-100/70 mt-3 text-sm">Find the perfect Ayurvedic remedy for you</p>
            </div>
            <div class="flex flex-wrap justify-center gap-4 sm:gap-6">
                @foreach($categories as $index => $category)
                    @php
                        $bgImage = $category->image_url ?? 'https://images.unsplash.com/photo-1545239351-ef35f43d514b?q=80&w=800&auto=format&fit=crop';
                    @endphp
                    <a href="/products?category={{ $category->slug }}" class="group flex flex-col items-center bg-brand-green-800 p-3 sm:p-4 rounded-[2rem] shadow-[0_6px_0_0_rgba(0,0,0,0.3)] hover:shadow-[0_2px_0_0_rgba(0,0,0,0.3)] hover:translate-y-1 active:translate-y-1.5 active:shadow-none transition-all duration-200 w-[110px] sm:w-[140px] border border-brand-green-700/50">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full overflow-hidden mb-3 bg-brand-green-900 border-[3px] border-brand-gold-500/30 group-hover:border-brand-gold-400 transition-colors relative shadow-[inset_0_2px_6px_rgba(0,0,0,0.4)]">
                             <img src="{{ $bgImage }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-90 group-hover:opacity-100">
                        </div>
                        <h3 class="font-sans text-[11px] sm:text-sm font-semibold text-white text-center leading-tight group-hover:text-brand-gold-400 transition-colors tracking-wide">{{ $category->name }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Partner Shops / Brands -->
    @if(isset($shops) && $shops->count() > 0)
    <section class="py-12 bg-[#faf9f6] border-b border-brand-green-100">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-brand-green-900">Our Partner Shops</h2>
                <p class="text-brand-green-700/70 mt-2 text-sm">Discover curated wellness brands.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-6 sm:gap-8">
                @foreach($shops as $shop)
                    <a href="{{ route('shop.profile', $shop->slug) }}" class="group flex flex-col items-center">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full overflow-hidden mb-3 bg-white shadow-sm border border-brand-green-100 group-hover:border-brand-gold-400 group-hover:shadow-md transition-all duration-300 flex items-center justify-center p-2">
                            @if($shop->profile_pic)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($shop->profile_pic) }}" alt="{{ $shop->name }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                            @else
                                <span class="text-2xl font-serif font-bold text-brand-green-900">{{ substr($shop->name, 0, 1) }}</span>
                            @endif
                        </div>
                        <h3 class="font-sans text-sm font-semibold text-brand-green-900 text-center group-hover:text-brand-gold-600 transition-colors">{{ $shop->name }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- 4. Shoppable "Trending Now" Carousel -->
    <section id="trending" class="py-20 bg-[#faf9f6]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-serif font-bold text-brand-green-900">Trending Now</h2>
                    <p class="text-sm text-brand-green-700/70 mt-2">Our most loved Ayurvedic essentials.</p>
                </div>
                <a href="/products" class="hidden sm:inline-flex text-sm font-semibold text-brand-green-800 hover:text-brand-green-600 border-b border-brand-green-800 pb-0.5 transition-colors">
                    Shop All
                </a>
            </div>

            <!-- Horizontal Scroll Container with Arrows -->
            <div x-data="{
                scrollLeft() { $refs.slider.scrollBy({ left: -350, behavior: 'smooth' }); },
                scrollRight() { $refs.slider.scrollBy({ left: 350, behavior: 'smooth' }); }
            }" class="relative group">
                
                <!-- Left Arrow -->
                <button @click="scrollLeft" class="absolute left-2 md:-left-4 top-1/2 -translate-y-1/2 z-30 bg-white shadow-md hover:shadow-lg rounded-full p-3 text-brand-green-900 hover:bg-brand-gold-500 transition-all flex items-center justify-center border border-brand-green-100" aria-label="Scroll Left">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <!-- Right Arrow -->
                <button @click="scrollRight" class="absolute right-2 md:-right-4 top-1/2 -translate-y-1/2 z-30 bg-white shadow-md hover:shadow-lg rounded-full p-3 text-brand-green-900 hover:bg-brand-gold-500 transition-all flex items-center justify-center border border-brand-green-100" aria-label="Scroll Right">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <div x-ref="slider" class="flex overflow-x-auto gap-6 pb-8 pt-4 snap-x snap-mandatory hide-scrollbar -mx-4 px-4 sm:mx-0 sm:px-0">
                    @foreach($trendingProducts as $product)
                        <div class="snap-start shrink-0 w-[280px] sm:w-[320px] bg-white rounded-xl shadow-sm border border-brand-green-50 group/card relative hover:shadow-xl hover:-translate-y-1 hover:border-brand-gold-500/30 transition-all duration-300 flex flex-col">
                            
                            @if($product->badge)
                                <span class="absolute top-4 left-4 z-10 px-2.5 py-1 rounded bg-brand-gold-500/90 backdrop-blur-sm text-[10px] font-bold text-brand-green-900 tracking-wider uppercase">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            <!-- Image with Hover Reveal -->
                            <div class="h-80 w-full bg-brand-green-50 relative overflow-hidden rounded-t-xl">
                                <a href="/products/{{ $product->slug }}">
                                    <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="absolute inset-0 h-full w-full object-cover group-hover/card:scale-105 transition-transform duration-700">
                                </a>
                                
                                <!-- Desktop Quick Add Overlay -->
                                <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover/card:translate-y-0 transition-transform duration-300 ease-out hidden lg:block bg-gradient-to-t from-black/60 to-transparent">
                                    <button wire:click="addToCart({{ $product->id }})" class="w-full py-3 bg-white text-brand-green-900 font-semibold text-sm rounded shadow hover:bg-brand-gold-500 active:scale-95 transition-all duration-200">
                                        Quick Add - ₹{{ number_format($product->active_price, 2) }}
                                    </button>
                                </div>
                            </div>

                            <!-- Info -->
                            <div class="p-5 flex flex-col flex-grow text-center">
                                <span class="text-[9px] font-bold text-brand-gold-600 uppercase tracking-wider mb-2 break-words leading-snug">{{ $product->categories->isNotEmpty() ? $product->categories->pluck('name')->join(' • ') : 'Product' }}</span>
                                <h3 class="font-serif text-lg text-brand-green-900 mb-1 hover:text-brand-green-700 transition-colors">
                                    <a href="/products/{{ $product->slug }}">{{ $product->name }}</a>
                                </h3>
                                @if($product->review_count > 0)
                                    <div class="flex items-center justify-center gap-1 mb-2">
                                        <div class="flex text-brand-gold-500">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-3 h-3 {{ $i <= round($product->average_rating) ? 'fill-current' : 'text-gray-300 fill-current' }}" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-[10px] text-brand-green-700/60 font-medium">({{ $product->review_count }})</span>
                                    </div>
                                @endif
                                <p class="text-sm text-brand-green-700/60 mb-4">{{ $product->unit_size ?? '' }}</p>
                                
                                <div class="mt-auto flex items-center justify-center gap-3">
                                    @if($product->is_on_sale)
                                        <span class="text-sm text-brand-green-700/40 line-through">₹{{ number_format($product->price, 2) }}</span>
                                        <span class="text-lg font-medium text-brand-green-900">₹{{ number_format($product->sale_price, 2) }}</span>
                                    @else
                                        <span class="text-lg font-medium text-brand-green-900">₹{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                                
                                <!-- Mobile / Tablet Add Button -->
                                <div class="mt-5 lg:hidden">
                                    <button wire:click="addToCart({{ $product->id }})" class="w-full py-2.5 border-2 border-brand-green-800 text-brand-green-800 font-semibold text-xs rounded-lg hover:bg-brand-green-800 hover:text-white active:scale-95 transition-all duration-200">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="text-center mt-6 sm:hidden">
                <a href="/products" class="inline-block border-b border-brand-green-800 text-brand-green-800 font-semibold text-sm pb-1">View All Products</a>
            </div>
        </div>
    </section>

    <!-- 5. Shoppable "Latest Arrivals" Carousel -->
    <section id="latest-arrivals" class="py-20 bg-white border-t border-brand-green-100/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl sm:text-4xl font-serif font-bold text-brand-green-900">Latest Arrivals</h2>
                    <p class="text-sm text-brand-green-700/70 mt-2">Discover our newest additions for your wellness journey.</p>
                </div>
                <a href="/products" class="hidden sm:inline-flex text-sm font-semibold text-brand-green-800 hover:text-brand-green-600 border-b border-brand-green-800 pb-0.5 transition-colors">
                    Shop All
                </a>
            </div>

            <!-- Horizontal Scroll Container with Arrows -->
            <div x-data="{
                scrollLeft() { $refs.latestSlider.scrollBy({ left: -350, behavior: 'smooth' }); },
                scrollRight() { $refs.latestSlider.scrollBy({ left: 350, behavior: 'smooth' }); }
            }" class="relative group">
                
                <!-- Left Arrow -->
                <button @click="scrollLeft" class="absolute left-2 md:-left-4 top-1/2 -translate-y-1/2 z-30 bg-white shadow-md hover:shadow-lg rounded-full p-3 text-brand-green-900 hover:bg-brand-gold-500 transition-all flex items-center justify-center border border-brand-green-100" aria-label="Scroll Left">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <!-- Right Arrow -->
                <button @click="scrollRight" class="absolute right-2 md:-right-4 top-1/2 -translate-y-1/2 z-30 bg-white shadow-md hover:shadow-lg rounded-full p-3 text-brand-green-900 hover:bg-brand-gold-500 transition-all flex items-center justify-center border border-brand-green-100" aria-label="Scroll Right">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <div x-ref="latestSlider" class="flex overflow-x-auto gap-6 pb-8 pt-4 snap-x snap-mandatory hide-scrollbar -mx-4 px-4 sm:mx-0 sm:px-0">
                    @foreach($latestProducts as $product)
                        <div class="snap-start shrink-0 w-[280px] sm:w-[320px] bg-white rounded-xl shadow-sm border border-brand-green-50 group/card relative hover:shadow-xl hover:-translate-y-1 hover:border-brand-gold-500/30 transition-all duration-300 flex flex-col">
                            
                            @if($product->badge)
                                <span class="absolute top-4 left-4 z-10 px-2.5 py-1 rounded bg-brand-gold-500/90 backdrop-blur-sm text-[10px] font-bold text-brand-green-900 tracking-wider uppercase">
                                    {{ $product->badge }}
                                </span>
                            @else
                                <span class="absolute top-4 left-4 z-10 px-2.5 py-1 rounded bg-brand-green-800/90 backdrop-blur-sm text-[10px] font-bold text-white tracking-wider uppercase">
                                    New
                                </span>
                            @endif

                            <!-- Image with Hover Reveal -->
                            <div class="h-80 w-full bg-brand-green-50 relative overflow-hidden rounded-t-xl">
                                <a href="/products/{{ $product->slug }}">
                                    <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="absolute inset-0 h-full w-full object-cover group-hover/card:scale-105 transition-transform duration-700">
                                </a>
                                
                                <!-- Desktop Quick Add Overlay -->
                                <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover/card:translate-y-0 transition-transform duration-300 ease-out hidden lg:block bg-gradient-to-t from-black/60 to-transparent">
                                    <button wire:click="addToCart({{ $product->id }})" class="w-full py-3 bg-white text-brand-green-900 font-semibold text-sm rounded shadow hover:bg-brand-gold-500 active:scale-95 transition-all duration-200">
                                        Quick Add - ₹{{ number_format($product->active_price, 2) }}
                                    </button>
                                </div>
                            </div>

                            <!-- Info -->
                            <div class="p-5 flex flex-col flex-grow text-center">
                                <span class="text-[9px] font-bold text-brand-gold-600 uppercase tracking-wider mb-2 break-words leading-snug">{{ $product->categories->isNotEmpty() ? $product->categories->pluck('name')->join(' • ') : 'Product' }}</span>
                                <h3 class="font-serif text-lg text-brand-green-900 mb-1 hover:text-brand-green-700 transition-colors">
                                    <a href="/products/{{ $product->slug }}">{{ $product->name }}</a>
                                </h3>
                                @if($product->review_count > 0)
                                    <div class="flex items-center justify-center gap-1 mb-2">
                                        <div class="flex text-brand-gold-500">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-3 h-3 {{ $i <= round($product->average_rating) ? 'fill-current' : 'text-gray-300 fill-current' }}" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-[10px] text-brand-green-700/60 font-medium">({{ $product->review_count }})</span>
                                    </div>
                                @endif
                                <p class="text-sm text-brand-green-700/60 mb-4">{{ $product->unit_size ?? '' }}</p>
                                
                                <div class="mt-auto flex items-center justify-center gap-3">
                                    @if($product->is_on_sale)
                                        <span class="text-sm text-brand-green-700/40 line-through">₹{{ number_format($product->price, 2) }}</span>
                                        <span class="text-lg font-medium text-brand-green-900">₹{{ number_format($product->sale_price, 2) }}</span>
                                    @else
                                        <span class="text-lg font-medium text-brand-green-900">₹{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                                
                                <!-- Mobile / Tablet Add Button -->
                                <div class="mt-5 lg:hidden">
                                    <button wire:click="addToCart({{ $product->id }})" class="w-full py-2.5 border-2 border-brand-green-800 text-brand-green-800 font-semibold text-xs rounded-lg hover:bg-brand-green-800 hover:text-white active:scale-95 transition-all duration-200">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="text-center mt-6 sm:hidden">
                <a href="/products" class="inline-block border-b border-brand-green-800 text-brand-green-800 font-semibold text-sm pb-1">View All Products</a>
            </div>
        </div>
    </section>

    <!-- 6. Brand Story Section (Center Aligned) -->
    <section class="py-20 lg:py-32 bg-[#faf9f6] relative overflow-hidden">
        <!-- Subtle texture/pattern overlay -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23000000\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 flex flex-col items-center text-center z-10">
            <!-- The image -->
            <div class="relative w-48 h-48 sm:w-64 sm:h-64 mx-auto mb-10 group">
                <div class="absolute inset-0 bg-brand-gold-500 rounded-full translate-x-2 translate-y-2 opacity-10 transition-transform group-hover:translate-x-3 group-hover:translate-y-3"></div>
                <img src="https://yuvann.com/storage/media/1efcda7f-d369-40dc-aae9-81be1320217d.webp" alt="Dr. Sajeev Dev" class="relative z-10 w-full h-full rounded-full shadow-md object-cover ring-4 ring-brand-green-800/10 group-hover:ring-brand-gold-500/30 transition-all duration-500 grayscale-[20%] group-hover:grayscale-0">
            </div>
            
            <div class="space-y-8 flex flex-col items-center">
                <h2 class="text-3xl lg:text-5xl font-serif font-bold text-brand-green-900">
                    The Yuvann Promise
                </h2>
                <p class="text-brand-green-800/80 text-lg lg:text-xl leading-relaxed font-light max-w-2xl">
                    True wellness begins at the source. Guided by Traditional Lineage Vaidhyan Dr. Sajeev Dev (DBA), we blend generations of indigenous Ayurvedic wisdom with certified dietary excellence. Every herb is ethically sourced, every formulation is meticulously balanced.
                </p>
                <p class="text-brand-green-800/80 text-lg lg:text-xl leading-relaxed font-light max-w-2xl pb-4">
                    Experience the transformative power of nature, delivered in its purest form.
                </p>
                <a href="/dr-sajeev-dev" class="inline-block px-8 py-4 bg-brand-green-900 hover:bg-brand-green-800 text-brand-gold-400 font-semibold rounded-full shadow-lg hover:-translate-y-1 transition-all duration-300 border border-brand-gold-500/30">
                    Learn About Dr. Sajeev Dev
                </a>
            </div>
        </div>
    </section>

    <!-- 5.5 Featured Landmark Publication: You Are Money -->
    <section class="py-20 lg:py-28 relative overflow-hidden text-white" 
             style="background: radial-gradient(circle at 85% 20%, #1c4d37 0%, #0e281d 45%, #07150f 100%);">
        <!-- Ambient background lighting decorative elements -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-brand-gold-500/10 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 rounded-full bg-brand-green-500/10 blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Left Visual: 3D Book Presentation -->
                <div class="lg:col-span-5 flex flex-col items-center">
                    <div class="relative group max-w-[280px] sm:max-w-[340px] w-full">
                        <!-- Glow behind book -->
                        <div class="absolute -inset-4 bg-gradient-to-tr from-brand-gold-500/30 to-brand-green-400/20 rounded-3xl blur-2xl opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Book Cover Image -->
                        <div class="relative rounded-2xl overflow-hidden shadow-[0_25px_50px_-12px_rgba(0,0,0,0.7)] border-2 border-brand-gold-400/40 transform transition-transform duration-500 group-hover:scale-[1.02]">
                            <img src="https://yuvann.com/storage/products/4859c2b9-6c8e-4058-ac9f-17d1b1217386.webp" 
                                 alt="You Are Money by Dr. Sajeev Dev" 
                                 class="w-full h-auto object-cover block">
                            
                            <!-- Bestseller Ribbon -->
                            <div class="absolute top-4 left-4 bg-brand-gold-400 text-brand-green-950 text-xs font-black px-3 py-1 rounded-full uppercase tracking-wider shadow-md">
                                ★ National Bestseller
                            </div>

                            <!-- Price Tag Overlay -->
                            <div class="absolute bottom-4 right-4 bg-black/85 backdrop-blur-md text-brand-gold-300 border border-brand-gold-500/50 px-3.5 py-1.5 rounded-xl text-sm font-bold shadow-lg">
                                Only ₹400.00
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 text-xs text-brand-gold-300/80 font-medium tracking-wide flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-brand-gold-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Official Author Edition · Direct From Yuvann
                    </p>
                </div>

                <!-- Right Content -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    
                    <!-- Tag / Badge -->
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold tracking-wider uppercase border border-brand-gold-500/50"
                         style="background-color: rgba(212, 175, 55, 0.12); color: #f9e295;">
                        <span>📖</span>
                        <span>Landmark Financial & Mindset Publication</span>
                    </div>

                    <!-- Main Heading -->
                    <div class="space-y-2">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-white leading-tight">
                            You Are Money
                        </h2>
                        <p class="text-lg sm:text-xl font-serif italic text-brand-gold-300">
                            A Secret Guide to Financial Freedom — by Dr. Sajeev Dev (DBA)
                        </p>
                    </div>

                    <!-- Hook Description -->
                    <p class="text-sm sm:text-base text-brand-green-100/90 leading-relaxed font-light max-w-2xl mx-auto lg:mx-0">
                        In this masterwork, Dr. Sajeev Dev dismantles the illusions keeping hard-working individuals trapped in financial anxiety. Drawing from <strong>30 years of distilled research and enterprise execution</strong>, he proves why <em>you</em> are the primary asset and provides an actionable blueprint to eliminate debt and attain everlasting financial serenity.
                    </p>

                    <!-- Key Takeaways 4-Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 pt-2 text-left max-w-2xl mx-auto lg:mx-0">
                        <div class="p-3.5 rounded-xl border border-brand-gold-500/20" style="background-color: rgba(255, 255, 255, 0.04);">
                            <div class="text-brand-gold-400 font-bold text-sm mb-1 flex items-center gap-1.5">
                                <span>✦</span> 30 Years of Wisdom
                            </div>
                            <p class="text-xs text-brand-green-100/80">
                                Three decades of trial-and-error condensed into direct, actionable execution.
                            </p>
                        </div>

                        <div class="p-3.5 rounded-xl border border-brand-gold-500/20" style="background-color: rgba(255, 255, 255, 0.04);">
                            <div class="text-brand-gold-400 font-bold text-sm mb-1 flex items-center gap-1.5">
                                <span>✦</span> Escape the Debt Trap
                            </div>
                            <p class="text-xs text-brand-green-100/80">
                                Step-by-step methodologies to overcome lingering liabilities and rebuild healthy cash flow.
                            </p>
                        </div>

                        <div class="p-3.5 rounded-xl border border-brand-gold-500/20" style="background-color: rgba(255, 255, 255, 0.04);">
                            <div class="text-brand-gold-400 font-bold text-sm mb-1 flex items-center gap-1.5">
                                <span>✦</span> Rewire Your Wealth Mindset
                            </div>
                            <p class="text-xs text-brand-green-100/80">
                                Unlock your internal capacity to attract and sustain lasting financial security.
                            </p>
                        </div>

                        <div class="p-3.5 rounded-xl border border-brand-gold-500/20" style="background-color: rgba(255, 255, 255, 0.04);">
                            <div class="text-brand-gold-400 font-bold text-sm mb-1 flex items-center gap-1.5">
                                <span>✦</span> Holistic Health & Wealth
                            </div>
                            <p class="text-xs text-brand-green-100/80">
                                Alleviate economic stress to harmoniously support lifelong physical wellness.
                            </p>
                        </div>
                    </div>

                    <!-- Call To Action Buttons -->
                    <div class="pt-4 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="/you-are-money" 
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-8 py-4 rounded-full font-bold text-sm sm:text-base bg-brand-gold-400 hover:bg-brand-gold-300 text-brand-green-950 shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                            <span>Get Your Copy (₹400)</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>

                        <a href="https://wa.me/917736609299?text={{ urlencode('Hello Dr. Sajeev Dev, I would like to order your book *You Are Money: A Secret Guide to Financial Freedom* (₹400). Please guide me with payment and delivery details.') }}" 
                           target="_blank"
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-4 rounded-full font-bold text-sm sm:text-base shadow-lg hover:-translate-y-0.5 transition-all duration-300"
                           style="background-color: #25D366; color: #07150f;">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                <path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/>
                            </svg>
                            <span>Order via WhatsApp</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="py-24 bg-[#faf9f6] border-t border-brand-green-100/50">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="text-brand-gold-500 text-5xl font-serif leading-none block mb-4">"</span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif text-brand-green-900 font-medium leading-tight mb-8">
                I've been using Yuvann products for the last three months, and the difference in my daily energy levels is profound. It feels truly authentic and pure.
            </h2>
            <div class="flex flex-col items-center justify-center gap-3">
                <div class="flex gap-1.5 text-brand-gold-500">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                </div>
                <p class="text-sm font-semibold tracking-wide text-brand-green-800 uppercase">Sarah M. — Verified Buyer</p>
            </div>
        </div>
    </section>

    <!-- From the Wellness Journal (Blog & Product Introductions) -->
    @if(isset($latestPosts) && $latestPosts->isNotEmpty())
        <section class="py-20 bg-white border-t border-brand-green-100/60">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                    <div>
                        <div class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-gold-600 uppercase tracking-widest mb-1.5">
                            <span>🌿</span>
                            <span>Ancient Wisdom & Modern Living</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-serif font-bold text-brand-green-900">
                            From the Wellness Journal
                        </h2>
                        <p class="text-xs sm:text-sm text-brand-green-900/70 mt-1 max-w-xl">
                            Read doctor-guided lifestyle routines, natural remedies, and insights on integrating pure Ayurvedic formulations into your routine.
                        </p>
                    </div>
                    <div>
                        <a href="/blog" 
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-brand-green-800 text-brand-green-800 hover:bg-brand-green-800 hover:text-white text-xs font-semibold transition-all shadow-xs">
                            <span>Explore All Guides</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($latestPosts as $post)
                        <article class="group bg-[#fbfaf8] rounded-2xl overflow-hidden border border-brand-green-100/70 shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                            <div>
                                <a href="/blog/{{ $post->slug }}" class="block relative h-48 overflow-hidden bg-gray-100">
                                    <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <span class="absolute top-3 left-3 bg-white/95 backdrop-blur-xs text-brand-green-900 text-[11px] font-semibold px-2.5 py-0.5 rounded-full shadow-xs border border-brand-green-100">
                                        {{ $post->category }}
                                    </span>
                                </a>

                                <div class="p-5 space-y-2.5">
                                    <div class="flex items-center gap-2 text-[11px] text-gray-500">
                                        <span>{{ $post->read_time }}</span>
                                        <span>•</span>
                                        <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                                    </div>

                                    <h3 class="font-serif font-bold text-base text-brand-green-900 group-hover:text-brand-gold-600 transition-colors line-clamp-2">
                                        <a href="/blog/{{ $post->slug }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    <p class="text-xs text-brand-green-900/70 line-clamp-2 leading-relaxed">
                                        {{ $post->excerpt }}
                                    </p>

                                    @if($post->products->isNotEmpty())
                                        <div class="pt-2">
                                            <div class="flex flex-wrap gap-1">
                                                @foreach($post->products->take(2) as $p)
                                                    <span class="inline-flex items-center gap-1 text-[10px] bg-brand-gold-100/60 text-brand-green-900 border border-brand-gold-200/80 px-2 py-0.5 rounded-md font-medium truncate max-w-[130px]">
                                                        ✨ {{ $p->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="p-5 pt-0 border-t border-brand-green-100/60 mt-3 flex items-center justify-between">
                                <span class="text-[11px] font-medium text-brand-green-800">{{ $post->author_name }}</span>
                                <a href="/blog/{{ $post->slug }}" class="text-xs font-semibold text-brand-gold-600 hover:text-brand-gold-700 flex items-center gap-1">
                                    <span>Read Guide</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- 7. Refined Consultation Banner -->
    <section class="py-16 md:py-24 bg-brand-green-900 text-white relative overflow-hidden border-t-4 border-brand-gold-500">
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <div class="absolute -right-20 -bottom-20 w-96 h-96 rounded-full bg-brand-gold-500/50 blur-3xl"></div>
            <div class="absolute -left-20 -top-20 w-96 h-96 rounded-full bg-brand-gold-500/30 blur-3xl"></div>
        </div>

        <div class="max-w-5xl mx-auto px-4 relative z-10 flex flex-col md:flex-row items-center justify-between gap-12 text-center md:text-left">
            <div class="flex-1 space-y-4">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-brand-gold-100">Personalized Ayurvedic Guidance</h2>
                <p class="text-brand-green-100/80 font-light leading-relaxed max-w-lg mx-auto md:mx-0">
                    Not sure which formulations match your body constitution (Dosha)? Connect directly with Traditional Vaidhyan Dr. Sajeev Dev for personalized Ayurvedic diet & wellness guidance.
                </p>
            </div>
            
            <div class="shrink-0">
                <a href="https://wa.me/917736609299?text=Hi%20Dr.%20Sajeev,%20I%20would%20like%20to%20schedule%20a%20personal%20health%20consultation." 
                   target="_blank" 
                   class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-brand-gold-500 hover:bg-brand-gold-400 text-brand-green-900 font-semibold rounded-full shadow-xl hover:-translate-y-1 transition-all duration-300 w-full md:w-auto">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/></svg>
                    Book WhatsApp Consultation
                </a>
            </div>
        </div>
    </section>
    
    <!-- Assessment Sections -->
    <x-assessments.bmi-test />
    <x-assessments.iron-test />
    <x-assessments.diet-plan-test />
    
    <style>
        /* Custom animations and utilities */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .product-marquee-content {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 120s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    
    <x-assessment-modal />
</div>
