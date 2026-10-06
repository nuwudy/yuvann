<div x-data="{ notification: null, mobileFilterOpen: false }" 
     @notify.window="notification = $event.detail[0]; setTimeout(() => notification = null, 3000)"
     class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
     
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

    @php 
        $shop = $shop ?? ''; 
        $shops = $shops ?? collect(); 
        $body_part = $body_part ?? ''; 
        $category = $category ?? ''; 
        $search = $search ?? ''; 
        $maxPrice = $maxPrice ?? 10000; 
    @endphp

    <!-- Shop Heading & Prominent Search Header -->
    <div class="border-b border-brand-green-100 pb-5 mb-6 text-left">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="text-[10px] font-bold tracking-widest text-brand-gold-600 uppercase bg-brand-gold-50 px-2.5 py-1 rounded-full border border-brand-gold-200">Official Yuvann Store</span>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-brand-green-900 mt-1.5">Ayurvedic Remedies & Foods</h1>
                <p class="text-xs sm:text-sm text-brand-green-700/70 mt-1">Scientifically formulated, naturally sourced organic products for your holistic well-being.</p>
            </div>
            
            <!-- Quick Active Count or Reset (Desktop) -->
            @php
                $activeCount = ($body_part ? 1 : 0) + ($category ? 1 : 0) + ($shop ? 1 : 0) + ($maxPrice < 10000 ? 1 : 0) + (!empty($search) ? 1 : 0);
            @endphp
            @if($activeCount > 0)
                <button type="button" wire:click="resetFilters" 
                        class="hidden md:inline-flex items-center gap-1.5 text-xs text-brand-gold-700 hover:text-brand-green-900 font-bold bg-brand-gold-50/70 hover:bg-brand-gold-100 px-3 py-1.5 rounded-lg border border-brand-gold-200 transition-colors">
                    <span>Reset All Filters</span>
                    <span class="w-4 h-4 rounded-full bg-brand-gold-500 text-brand-green-950 text-[10px] flex items-center justify-center font-black">{{ $activeCount }}</span>
                </button>
            @endif
        </div>

        <!-- Prominent Search Bar (Full Width & Instantaneous) -->
        <div class="mt-5">
            <div class="relative flex items-center shadow-xs rounded-2xl bg-white border border-brand-green-200/90 focus-within:border-brand-gold-500 focus-within:ring-2 focus-within:ring-brand-gold-400/25 transition-all">
                <span class="pl-4 pr-2 text-brand-green-800/70 pointer-events-none">
                    <svg class="w-5 h-5 text-brand-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </span>
                <input type="text" 
                       wire:model.live.debounce.300ms="search" 
                       placeholder="Search any product, herb, oil, veachoc, or health concern (e.g. sleep, iron, gut)..." 
                       class="w-full py-3.5 sm:py-4 pr-10 bg-transparent text-xs sm:text-sm font-medium text-brand-green-950 placeholder-brand-green-700/50 focus:outline-none">
                
                @if(!empty($search))
                    <button type="button" wire:click="$set('search', '')" 
                            class="absolute right-3.5 p-1 rounded-full text-gray-400 hover:text-brand-green-900 hover:bg-brand-green-50 text-xs font-bold transition-all" 
                            title="Clear search">
                        ✕
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Mobile Fast Controls Bar (Zero Real Estate Waste - Products Visible Instantly) -->
    <div class="lg:hidden mb-5 space-y-3">
        <!-- Horizontal Scrollable Quick Category Pills -->
        <div class="flex items-center gap-2 overflow-x-auto pb-1.5 pt-0.5 no-scrollbar -mx-4 px-4 sm:mx-0 sm:px-0">
            <button type="button" 
                    wire:click="$set('category', '')" 
                    class="shrink-0 px-3.5 py-1.5 rounded-full text-xs font-bold transition-all shadow-2xs {{ empty($category) ? 'bg-brand-green-900 text-brand-gold-300 ring-2 ring-brand-gold-400/40 shadow-xs' : 'bg-white text-brand-green-800 border border-brand-green-200 hover:border-brand-gold-300' }}">
                ✨ All Products
            </button>
            @foreach($categories as $cat)
                <button type="button" 
                        wire:click="$set('category', '{{ $cat->slug }}')" 
                        class="shrink-0 px-3.5 py-1.5 rounded-full text-xs font-bold transition-all shadow-2xs {{ $category === $cat->slug ? 'bg-brand-green-900 text-brand-gold-300 ring-2 ring-brand-gold-400/40 shadow-xs' : 'bg-white text-brand-green-800 border border-brand-green-200 hover:border-brand-gold-300' }}">
                    {{ $cat->name }}
                </button>
            @endforeach
        </div>

        <!-- Mobile Filter Action Row -->
        <div class="flex items-center justify-between gap-2 pt-1 bg-white p-2.5 rounded-2xl border border-brand-green-100 shadow-2xs">
            <!-- Open Filter Drawer Button -->
            <button type="button" 
                    @click="mobileFilterOpen = true"
                    class="inline-flex items-center gap-2 px-3 py-2 rounded-xl text-xs font-bold bg-brand-green-900 text-white shadow-xs hover:bg-brand-green-800 transition-all border border-brand-gold-500/30">
                <svg class="w-4 h-4 text-brand-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                </svg>
                <span>Filter & Care</span>
                @php
                    $mobileFilterBadge = ($body_part ? 1 : 0) + ($category ? 1 : 0) + ($shop ? 1 : 0) + ($maxPrice < 10000 ? 1 : 0);
                @endphp
                @if($mobileFilterBadge > 0)
                    <span class="w-4 h-4 rounded-full bg-brand-gold-500 text-brand-green-950 text-[10px] font-black flex items-center justify-center">
                        {{ $mobileFilterBadge }}
                    </span>
                @endif
            </button>

            <!-- Mobile Sort Dropdown & Count -->
            <div class="flex items-center gap-2">
                <select wire:model.live="sort" 
                        class="bg-brand-green-50 border border-brand-green-200 rounded-xl py-2 px-2.5 text-xs font-semibold text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500">
                    <option value="latest">Latest</option>
                    <option value="featured">Best Sellers</option>
                    <option value="price_asc">Price: Low-High</option>
                    <option value="price_desc">Price: High-Low</option>
                </select>

                <span class="text-[11px] font-bold text-brand-green-900 whitespace-nowrap pr-1">
                    {{ $products->total() }} items
                </span>
            </div>
        </div>
    </div>

    <!-- Mobile Slide-Over Filter Drawer (Accessible on-demand, takes 0 screen space by default) -->
    <div x-show="mobileFilterOpen" 
         x-cloak
         class="fixed inset-0 z-50 overflow-hidden" 
         style="display: none;"
         aria-labelledby="slide-over-title" 
         role="dialog" 
         aria-modal="true">
        
        <!-- Backdrop Overlay -->
        <div x-show="mobileFilterOpen" 
             x-transition:enter="ease-in-out duration-300" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100" 
             x-transition:leave="ease-in-out duration-300" 
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0" 
             @click="mobileFilterOpen = false"
             class="fixed inset-0 bg-brand-green-950/60 backdrop-blur-xs transition-opacity"></div>

        <div class="fixed inset-y-0 right-0 max-w-full flex pl-8 sm:pl-10">
            <div x-show="mobileFilterOpen" 
                 x-transition:enter="transform transition ease-in-out duration-300" 
                 x-transition:enter-start="translate-x-full" 
                 x-transition:enter-end="translate-x-0" 
                 x-transition:leave="transform transition ease-in-out duration-300" 
                 x-transition:leave-start="translate-x-0" 
                 x-transition:leave-end="translate-x-full" 
                 class="w-screen max-w-md bg-white shadow-2xl flex flex-col text-left">
                
                <!-- Drawer Header -->
                <div class="p-4 sm:p-5 bg-brand-green-900 text-white flex items-center justify-between border-b border-brand-green-800">
                    <div class="flex items-center gap-2.5">
                        <span class="text-brand-gold-400 text-xl">🌿</span>
                        <div>
                            <h2 class="font-serif text-base font-bold text-white tracking-wide">Filter & Refine</h2>
                            <p class="text-[11px] text-brand-gold-300/80">Tailor products to your body & wellness goals</p>
                        </div>
                    </div>
                    <button type="button" 
                            @click="mobileFilterOpen = false" 
                            class="w-8 h-8 rounded-full bg-white/10 text-white flex items-center justify-center hover:bg-white/20 transition-colors">
                        ✕
                    </button>
                </div>

                <!-- Drawer Body (Scrollable) -->
                <div class="flex-1 overflow-y-auto p-5 space-y-6">
                    <!-- Targeted Body Care Widget -->
                    @if(isset($bodyParts) && $bodyParts->count() > 0)
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-serif text-xs font-bold text-brand-green-900 uppercase tracking-wider flex items-center gap-1.5">
                                <span>🧘</span> Targeted Body Care
                            </h3>
                            @if($body_part)
                                <button type="button" wire:click="$set('body_part', '')" class="text-[11px] text-brand-gold-700 hover:underline font-bold">Clear</button>
                            @endif
                        </div>
                        <div class="grid grid-cols-2 gap-2 max-h-52 overflow-y-auto pr-1">
                            <label class="flex items-center gap-2 p-2.5 rounded-xl border text-xs font-medium cursor-pointer transition-all {{ empty($body_part) ? 'bg-brand-green-900 text-white border-brand-green-900 font-bold shadow-xs' : 'bg-gray-50/60 border-gray-200 text-brand-green-900 hover:bg-white' }}">
                                <input type="radio" name="mobile_bp" wire:model.live="body_part" value="" class="sr-only">
                                <span>All Body Areas</span>
                            </label>
                            @foreach($bodyParts as $bp)
                                <label class="flex items-center gap-2 p-2.5 rounded-xl border text-xs font-medium cursor-pointer transition-all {{ $body_part === $bp->slug ? 'bg-brand-green-900 text-white border-brand-green-900 font-bold shadow-xs' : 'bg-gray-50/60 border-gray-200 text-brand-green-900 hover:bg-white' }}">
                                    <input type="radio" name="mobile_bp" wire:model.live="body_part" value="{{ $bp->slug }}" class="sr-only">
                                    <span class="truncate">{{ $bp->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Categories Widget -->
                    <div class="pt-4 border-t border-brand-green-100">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-serif text-xs font-bold text-brand-green-900 uppercase tracking-wider flex items-center gap-1.5">
                                <span>🏷️</span> Categories
                            </h3>
                            @if($category)
                                <button type="button" wire:click="$set('category', '')" class="text-[11px] text-brand-gold-700 hover:underline font-bold">Clear</button>
                            @endif
                        </div>
                        <div class="grid grid-cols-2 gap-2 max-h-56 overflow-y-auto pr-1">
                            <label class="flex items-center gap-2 p-2.5 rounded-xl border text-xs font-medium cursor-pointer transition-all {{ empty($category) ? 'bg-brand-green-900 text-white border-brand-green-900 font-bold shadow-xs' : 'bg-gray-50/60 border-gray-200 text-brand-green-900 hover:bg-white' }}">
                                <input type="radio" name="mobile_cat" wire:model.live="category" value="" class="sr-only">
                                <span>All Products</span>
                            </label>
                            @foreach($categories as $cat)
                                <label class="flex items-center gap-2 p-2.5 rounded-xl border text-xs font-medium cursor-pointer transition-all {{ $category === $cat->slug ? 'bg-brand-green-900 text-white border-brand-green-900 font-bold shadow-xs' : 'bg-gray-50/60 border-gray-200 text-brand-green-900 hover:bg-white' }}">
                                    <input type="radio" name="mobile_cat" wire:model.live="category" value="{{ $cat->slug }}" class="sr-only">
                                    <span class="truncate">{{ $cat->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Partner Shops Widget (Mobile) -->
                    @if(isset($shops) && $shops->count() > 0)
                    <div class="pt-4 border-t border-brand-green-100">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-serif text-xs font-bold text-brand-green-900 uppercase tracking-wider flex items-center gap-1.5">
                                <span>🏪</span> Partner Shops & Brands
                            </h3>
                            @if($shop)
                                <button type="button" wire:click="$set('shop', '')" class="text-[11px] text-brand-gold-700 hover:underline font-bold">Clear</button>
                            @endif
                        </div>
                        <div class="grid grid-cols-2 gap-2 max-h-52 overflow-y-auto pr-1">
                            <label class="flex items-center gap-2 p-2.5 rounded-xl border text-xs font-medium cursor-pointer transition-all {{ empty($shop) ? 'bg-brand-green-900 text-white border-brand-green-900 font-bold shadow-xs' : 'bg-gray-50/60 border-gray-200 text-brand-green-900 hover:bg-white' }}">
                                <input type="radio" name="mobile_shop" wire:model.live="shop" value="" class="sr-only">
                                <span>All Partner Shops</span>
                            </label>
                            @foreach($shops as $s)
                                <label class="flex items-center gap-2 p-2.5 rounded-xl border text-xs font-medium cursor-pointer transition-all {{ $shop === $s->slug ? 'bg-brand-green-900 text-white border-brand-green-900 font-bold shadow-xs' : 'bg-gray-50/60 border-gray-200 text-brand-green-900 hover:bg-white' }}">
                                    <input type="radio" name="mobile_shop" wire:model.live="shop" value="{{ $s->slug }}" class="sr-only">
                                    @if($s->profile_pic)
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($s->profile_pic) }}" alt="{{ $s->name }}" class="w-4 h-4 rounded-full object-contain shrink-0 bg-white">
                                    @endif
                                    <span class="truncate">{{ $s->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Max Price Slider Widget -->
                    <div class="pt-4 border-t border-brand-green-100">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-serif text-xs font-bold text-brand-green-900 uppercase tracking-wider">Max Price Range</h3>
                            <span class="text-xs font-black text-brand-green-950 bg-brand-gold-100 px-2 py-0.5 rounded-md border border-brand-gold-300">₹{{ $maxPrice }}</span>
                        </div>
                        <input type="range" min="50" max="10000" step="50" wire:model.live="maxPrice" 
                               class="w-full h-2 bg-brand-green-100 rounded-lg appearance-none cursor-pointer accent-brand-green-800">
                        <div class="flex justify-between text-[10px] text-brand-green-700/60 mt-1.5 font-medium">
                            <span>₹50</span>
                            <span>₹10,000</span>
                        </div>
                    </div>
                </div>

                <!-- Drawer Sticky Footer -->
                <div class="p-4 bg-brand-green-50/80 border-t border-brand-green-100 flex items-center gap-3">
                    <button type="button" 
                            wire:click="resetFilters" 
                            class="flex-1 py-3 px-3 rounded-xl text-xs font-bold text-brand-green-900 bg-white border border-brand-green-200 hover:bg-brand-green-50 transition-all text-center">
                        Reset All
                    </button>
                    <button type="button" 
                            @click="mobileFilterOpen = false" 
                            class="flex-1 py-3 px-3 rounded-xl text-xs font-black text-brand-green-950 bg-gradient-to-r from-brand-gold-400 to-brand-gold-500 hover:from-brand-gold-500 hover:to-brand-gold-600 transition-all text-center shadow-sm">
                        Show {{ $products->total() }} Products
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Grid Container -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        
        <!-- Desktop Sidebar Filters (Hidden on Mobile, Visible on lg Screens) -->
        <aside class="hidden lg:block lg:col-span-1 space-y-6">
            <!-- Targeted Body Care Widget -->
            @if(isset($bodyParts) && $bodyParts->count() > 0)
            <div class="bg-white p-5 rounded-2xl border border-brand-green-100/60 shadow-sm text-left">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="font-serif text-sm font-semibold text-brand-green-900 uppercase tracking-wider flex items-center gap-1.5">
                        <span>🧘</span> Targeted Body Care
                    </h3>
                    @if($body_part)
                        <button type="button" wire:click="$set('body_part', '')" class="text-[10px] text-brand-gold-600 hover:underline font-semibold">Clear</button>
                    @endif
                </div>
                <div class="space-y-1.5 max-h-52 overflow-y-auto pr-1">
                    <label class="flex items-center gap-2.5 text-xs text-brand-green-800 font-medium cursor-pointer p-1 rounded-lg hover:bg-brand-green-50/50 transition-colors">
                        <input type="radio" name="body_part_filter" wire:model.live="body_part" value="" 
                               class="text-brand-green-800 focus:ring-brand-gold-500 h-4 w-4 border-brand-green-200">
                        <span>All Body Areas</span>
                    </label>
                    @foreach($bodyParts as $bp)
                        <label class="flex items-center gap-2.5 text-xs text-brand-green-800 font-medium cursor-pointer p-1 rounded-lg hover:bg-brand-green-50/50 transition-colors">
                            <input type="radio" name="body_part_filter" wire:model.live="body_part" value="{{ $bp->slug }}" 
                                   class="text-brand-green-800 focus:ring-brand-gold-500 h-4 w-4 border-brand-green-200">
                            <span class="truncate">{{ $bp->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Categories Widget -->
            <div class="bg-white p-5 rounded-2xl border border-brand-green-100/60 shadow-sm text-left">
                <h3 class="font-serif text-sm font-semibold text-brand-green-900 mb-3 uppercase tracking-wider flex items-center gap-1.5">
                    <span>🏷️</span> Categories
                </h3>
                <div class="space-y-2 max-h-64 overflow-y-auto pr-1">
                    <label class="flex items-center gap-2.5 text-xs text-brand-green-800 font-medium cursor-pointer">
                        <input type="radio" name="category_filter" wire:model.live="category" value="" 
                               class="text-brand-green-800 focus:ring-brand-gold-500 h-4.5 w-4.5 border-brand-green-200">
                        <span>All Products</span>
                    </label>
                    @foreach($categories as $cat)
                        <label class="flex items-center gap-2.5 text-xs text-brand-green-800 font-medium cursor-pointer">
                            <input type="radio" name="category_filter" wire:model.live="category" value="{{ $cat->slug }}" 
                                   class="text-brand-green-800 focus:ring-brand-gold-500 h-4.5 w-4.5 border-brand-green-200">
                            <span>{{ $cat->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Partner Shops & Brands Widget (Desktop) -->
            @if(isset($shops) && $shops->count() > 0)
            <div class="bg-white p-5 rounded-2xl border border-brand-green-100/60 shadow-sm text-left">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="font-serif text-sm font-semibold text-brand-green-900 uppercase tracking-wider flex items-center gap-1.5">
                        <span>🏪</span> Partner Shops
                    </h3>
                    @if($shop)
                        <button type="button" wire:click="$set('shop', '')" class="text-[10px] text-brand-gold-600 hover:underline font-semibold">Clear</button>
                    @endif
                </div>
                <div class="space-y-1.5 max-h-56 overflow-y-auto pr-1">
                    <label class="flex items-center gap-2.5 text-xs text-brand-green-800 font-medium cursor-pointer p-1 rounded-lg hover:bg-brand-green-50/50 transition-colors">
                        <input type="radio" name="shop_filter" wire:model.live="shop" value="" 
                               class="text-brand-green-800 focus:ring-brand-gold-500 h-4 w-4 border-brand-green-200">
                        <span>All Partner Shops</span>
                    </label>
                    @foreach($shops as $s)
                        <label class="flex items-center gap-2.5 text-xs text-brand-green-800 font-medium cursor-pointer p-1 rounded-lg hover:bg-brand-green-50/50 transition-colors">
                            <input type="radio" name="shop_filter" wire:model.live="shop" value="{{ $s->slug }}" 
                                   class="text-brand-green-800 focus:ring-brand-gold-500 h-4 w-4 border-brand-green-200">
                            @if($s->profile_pic)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($s->profile_pic) }}" alt="{{ $s->name }}" class="w-4 h-4 rounded-full object-contain bg-white border border-gray-200 shrink-0">
                            @endif
                            <span class="truncate">{{ $s->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Price Slider Widget -->
            <div class="bg-white p-5 rounded-2xl border border-brand-green-100/60 shadow-sm text-left">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="font-serif text-sm font-semibold text-brand-green-900 uppercase tracking-wider">Max Price</h3>
                    <span class="text-xs font-bold text-brand-green-900">₹{{ $maxPrice }}</span>
                </div>
                <input type="range" min="50" max="10000" step="50" wire:model.live="maxPrice" 
                       class="w-full h-1.5 bg-brand-green-100 rounded-lg appearance-none cursor-pointer accent-brand-green-800 focus:outline-none">
                <div class="flex justify-between text-[10px] text-brand-green-700/60 mt-1 font-medium">
                    <span>₹50</span>
                    <span>₹10,000</span>
                </div>
            </div>

            <!-- Reset Filters -->
            <button type="button" wire:click="resetFilters" 
                    class="w-full py-2.5 px-4 bg-brand-green-50 hover:bg-brand-green-100 text-brand-green-800 text-xs font-semibold rounded-xl border border-brand-green-100 transition-all">
                Reset All Filters
            </button>
        </aside>

        <!-- Product Grid Content (Appears Immediately on Mobile) -->
        <section class="lg:col-span-3">
            <!-- Toolbar -->
            <div class="bg-white px-5 py-4 rounded-2xl border border-brand-green-100/60 shadow-sm mb-6 space-y-3">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <p class="text-xs text-brand-green-700/80 font-medium">
                        @if(!empty($search))
                            Showing <span class="font-bold text-brand-green-900">{{ $products->total() }}</span> results for <span class="font-bold text-brand-green-900 font-serif">"{{ $search }}"</span>
                        @else
                            Showing <span class="font-bold text-brand-green-900">{{ $products->total() }}</span> Ayurvedic products
                        @endif
                    </p>
                    <div class="hidden sm:flex items-center gap-2">
                        <label for="sort_select" class="text-xs text-brand-green-700/80 font-medium">Sort by:</label>
                        <select id="sort_select" wire:model.live="sort" 
                                class="bg-brand-green-50 border border-brand-green-100 rounded-xl py-1 px-3 text-xs font-medium text-brand-green-900 focus:outline-none">
                            <option value="latest">Latest Arrivals</option>
                            <option value="featured">Best Sellers</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                        </select>
                    </div>
                </div>

                <!-- Active Filter Chips -->
                @if($body_part || $category || $shop || !empty($search))
                    <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-brand-green-100/50">
                        <span class="text-[10px] text-brand-green-700/60 font-semibold uppercase">Active Filters:</span>
                        
                        @if($body_part)
                            @php $selectedBp = $bodyParts->firstWhere('slug', $body_part); @endphp
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-brand-gold-100 text-brand-green-900 border border-brand-gold-300">
                                <span>Target: {{ $selectedBp?->name ?? $body_part }}</span>
                                <button type="button" wire:click="$set('body_part', '')" class="text-brand-green-800 hover:text-red-600 font-bold">&times;</button>
                            </span>
                        @endif

                        @if($category)
                            @php $selectedCat = $categories->firstWhere('slug', $category); @endphp
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-brand-green-100 text-brand-green-900 border border-brand-green-200">
                                <span>Category: {{ $selectedCat?->name ?? $category }}</span>
                                <button type="button" wire:click="$set('category', '')" class="text-brand-green-800 hover:text-red-600 font-bold">&times;</button>
                            </span>
                        @endif

                        @if($shop)
                            @php $selectedShop = $shops->firstWhere('slug', $shop); @endphp
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-brand-green-950 border border-emerald-300 shadow-2xs">
                                <span>🏪 Shop: {{ $selectedShop?->name ?? $shop }}</span>
                                <button type="button" wire:click="$set('shop', '')" class="text-brand-green-800 hover:text-red-600 font-bold">&times;</button>
                            </span>
                        @endif

                        @if(!empty($search))
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-brand-green-50 text-brand-green-900 border border-brand-green-200">
                                <span>Keyword: "{{ $search }}"</span>
                                <button type="button" wire:click="$set('search', '')" class="text-brand-green-800 hover:text-red-600 font-bold">&times;</button>
                            </span>
                        @endif

                        <button type="button" wire:click="resetFilters" class="text-[11px] text-brand-gold-600 hover:underline font-semibold ml-auto">
                            Clear All
                        </button>
                    </div>
                @endif
            </div>

            <!-- Products List -->
            @if($products->count() > 0)
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-xl sm:rounded-2xl overflow-hidden border border-brand-green-100/60 shadow-sm hover:shadow-md hover:border-brand-gold-500/30 transition-all flex flex-col group relative">
                            
                            <!-- Badge -->
                            @if($product->badge)
                                <span class="absolute top-2 left-2 sm:top-4 sm:left-4 z-10 inline-flex items-center px-1.5 sm:px-2.5 py-0.5 rounded-full text-[9px] sm:text-[10px] font-bold bg-brand-gold-500 text-brand-green-900 tracking-wide uppercase shadow-sm">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            @if($product->is_free_shipping)
                                <span class="absolute top-2 right-2 sm:top-3.5 sm:right-3.5 z-20 inline-flex items-center gap-1 sm:gap-1.5 px-1.5 sm:px-3 py-0.5 sm:py-1.5 rounded-full text-[8px] sm:text-[10px] font-black tracking-wider uppercase shadow-md"
                                      style="background: linear-gradient(135deg, #059669 0%, #10b981 100%) !important; color: #ffffff !important; box-shadow: 0 4px 14px rgba(5, 150, 105, 0.45) !important; border: 1px solid #ffffff !important;">
                                    <svg class="w-2.5 h-2.5 sm:w-3.5 sm:h-3.5 fill-current text-white shrink-0 drop-shadow-xs" viewBox="0 0 24 24">
                                        <path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                                    </svg>
                                    <span class="font-black leading-none" style="text-shadow: 0 1px 2px rgba(0,0,0,0.25);">FREE SHIPPING</span>
                                </span>
                            @endif

                            <!-- Image Container -->
                            <div class="aspect-square sm:h-56 w-full overflow-hidden bg-brand-green-50">
                                <a href="/products/{{ $product->slug }}">
                                    <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </a>
                            </div>

                            <!-- Info Container -->
                            <div class="p-3 sm:p-5 flex-grow flex flex-col text-left">
                                <div class="flex items-center justify-between gap-1.5 flex-wrap">
                                    <span class="text-[8px] sm:text-[9px] font-semibold text-brand-gold-600 uppercase tracking-wider line-clamp-1 leading-snug">{{ $product->categories->pluck('name')->join(' • ') }}</span>
                                    @if($product->shop)
                                        <span wire:click="$set('shop', '{{ $product->shop->slug }}')" class="text-[8px] sm:text-[9px] font-bold text-emerald-800 bg-emerald-50 hover:bg-emerald-100 px-1.5 py-0.2 rounded border border-emerald-200 transition-colors shrink-0 cursor-pointer" title="Filter by shop: {{ $product->shop->name }}">
                                            🏪 {{ $product->shop->name }}
                                        </span>
                                    @endif
                                </div>
                                <h3 class="font-serif text-xs sm:text-base font-bold text-brand-green-900 mt-1 hover:text-brand-green-700 transition-colors line-clamp-2 leading-tight min-h-[2rem] sm:min-h-0">
                                    <a href="/products/{{ $product->slug }}">{{ $product->name }}</a>
                                </h3>
                                @if($product->bodyParts->count() > 0)
                                    <div class="hidden sm:flex flex-wrap gap-1 mt-1.5">
                                        @foreach($product->bodyParts as $bp)
                                            <span class="inline-flex items-center text-[9px] font-semibold px-2 py-0.5 rounded-full bg-brand-gold-50/70 text-brand-green-900 border border-brand-gold-200">
                                                🧘 {{ $bp->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                                @if($product->review_count > 0)
                                    <div class="flex items-center gap-1 mt-1">
                                        <div class="flex text-brand-gold-500">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 {{ $i <= round($product->average_rating) ? 'fill-current' : 'text-gray-300 fill-current' }}" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-[9px] sm:text-[10px] text-brand-green-700/60 font-medium">({{ $product->review_count }})</span>
                                    </div>
                                @endif
                                <p class="hidden sm:block text-xs text-brand-green-700/60 mt-1.5 flex-grow line-clamp-2">
                                    {{ $product->short_description }}
                                </p>
                                @if($product->has_multiple_variants)
                                    <div class="mt-2 sm:mt-3 pt-1.5 sm:pt-2.5 border-t border-brand-green-100/80">
                                        <div class="text-[9px] sm:text-[10px] uppercase font-bold text-brand-green-800/70 mb-1 flex items-center justify-between">
                                            <span>Sizes:</span>
                                            <span class="text-brand-gold-700 font-bold lowercase text-[9px] sm:text-[10px] bg-brand-gold-50 px-1 py-0.2 rounded border border-brand-gold-200">{{ $product->active_variants->count() }}</span>
                                        </div>
                                        <div class="flex flex-wrap gap-1 sm:gap-1.5">
                                            @foreach($product->active_variants as $v)
                                                <a href="/products/{{ $product->slug }}?variant={{ $v->id }}" 
                                                   class="inline-flex items-center gap-1 px-1.5 sm:px-2.5 py-0.5 sm:py-1 rounded-md sm:rounded-lg text-[10px] sm:text-xs bg-white border border-brand-green-200 hover:border-brand-gold-500 hover:bg-brand-gold-50/70 transition-all shadow-2xs group/pill"
                                                   title="{{ $v->unit_size }} - ₹{{ number_format($v->active_price, 2) }}">
                                                    <span class="font-bold text-brand-green-900">{{ $v->unit_size }}</span>
                                                    <span class="font-black text-[9px] sm:text-[11px] text-brand-green-950 bg-brand-gold-100 px-1 py-0.2 rounded border border-brand-gold-300">₹{{ number_format($v->active_price, 0) }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="flex items-center justify-between mt-2 sm:mt-3 pt-1">
                                    @if(!$product->has_multiple_variants && $product->unit_size)
                                        <span class="text-[10px] sm:text-xs text-brand-green-800 font-semibold bg-brand-green-50 px-1.5 sm:px-2.5 py-0.5 rounded-md border border-brand-green-100">
                                            {{ $product->unit_size }}
                                        </span>
                                    @else
                                        <div></div>
                                    @endif
                                    <div class="flex flex-col items-end ml-auto">
                                        @if($product->has_price_range)
                                            <div class="flex items-baseline gap-1">
                                                <span class="text-[9px] sm:text-[11px] font-bold uppercase tracking-wider text-brand-gold-700">Range:</span>
                                                <span class="text-xs sm:text-lg font-black font-serif text-brand-green-950 tracking-tight">₹{{ number_format($product->min_price, 0) }}–₹{{ number_format($product->max_price, 0) }}</span>
                                            </div>
                                        @elseif($product->is_on_sale)
                                            <div class="flex items-baseline gap-1">
                                                <span class="text-[10px] sm:text-xs text-brand-green-700/40 line-through">₹{{ number_format($product->price, 0) }}</span>
                                                <span class="text-xs sm:text-lg font-bold text-brand-green-900">₹{{ number_format($product->sale_price, 0) }}</span>
                                            </div>
                                        @else
                                            <span class="text-xs sm:text-lg font-bold text-brand-green-900">₹{{ number_format($product->price, 0) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Actions Container -->
                            <div class="p-2 sm:px-5 sm:pb-5 sm:pt-2 border-t border-brand-green-50 flex gap-1.5 sm:gap-2">
                                @if($product->has_multiple_variants)
                                    <a href="/products/{{ $product->slug }}" 
                                       class="flex-1 py-1.5 sm:py-2 px-2 sm:px-3 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-lg sm:rounded-full text-[11px] sm:text-xs font-semibold shadow-xs transition-all text-center flex items-center justify-center gap-1">
                                        <span>Select Size</span>
                                        <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                @else
                                    <button wire:click="addToCart({{ $product->id }})" 
                                            class="flex-1 py-1.5 sm:py-2 px-2 sm:px-3 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-lg sm:rounded-full text-[11px] sm:text-xs font-semibold shadow-xs transition-all focus:outline-none">
                                        Add to Cart
                                    </button>
                                @endif
                                
                                @php
                                    $waUnit = $product->has_multiple_variants ? ($product->active_variants->first()->unit_size ?? $product->unit_size) : $product->unit_size;
                                    $waPrice = $product->has_multiple_variants ? $product->min_price : $product->active_price;
                                    $waMessage = "Hello Dr. Sajeev Dev, I would like to buy *" . $product->name . "* (" . $waUnit . ") priced at ₹" . number_format($waPrice, 2) . ". Please guide me with payment details. Product link: " . url('/products/' . $product->slug);
                                    $waUrl = "https://wa.me/917736609299?text=" . urlencode($waMessage);
                                @endphp
                                <a href="{{ $waUrl }}" target="_blank" 
                                   class="py-1.5 sm:py-2 px-2 sm:px-3 border border-green-600 bg-green-50 text-green-700 hover:bg-green-100 rounded-lg sm:rounded-full text-[11px] sm:text-xs font-semibold flex items-center justify-center gap-1 transition-all" title="Buy via WhatsApp">
                                    <svg class="w-3.5 h-3.5 fill-current text-green-600" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                                    </svg>
                                    <span class="hidden sm:inline">Buy</span>
                                </a>
                                
                                <button x-data @click="if (navigator.share) { navigator.share({ title: '{{ addslashes($product->name) }}', url: '{{ url('/products/' . $product->slug) }}' }) } else { navigator.clipboard.writeText('{{ url('/products/' . $product->slug) }}'); window.dispatchEvent(new CustomEvent('notify', { detail: [{ message: 'Link copied to clipboard!' }] })); }" 
                                        class="hidden sm:flex py-2 px-3 border border-brand-green-200 bg-white text-brand-green-800 hover:bg-brand-green-50 rounded-full items-center justify-center transition-all" title="Share Product">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $products->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-2xl border border-brand-green-100/60 p-16 text-center shadow-sm">
                    <div class="w-16 h-16 bg-brand-green-50 rounded-full flex items-center justify-center text-brand-green-600 border border-brand-green-100 mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-brand-green-900 font-serif">No Products Found</h3>
                    <p class="text-xs text-brand-green-700/60 mt-1 max-w-xs mx-auto">Try adjusting your filters, search keyword, or price range to explore other Yuvann products.</p>
                    <button wire:click="resetFilters" class="mt-6 px-5 py-2.5 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-full text-xs font-semibold shadow-sm transition-all">
                        Clear All Filters
                    </button>
                </div>
            @endif
        </section>
    </div>
</div>
