<div x-data="{ notification: null }" 
     @notify.window="notification = $event.detail[0]; setTimeout(() => notification = null, 3000)"
     class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
     
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

    <!-- Shop Heading -->
    <div class="text-left border-b border-brand-green-100 pb-6 mb-8">
        <h1 class="text-3xl sm:text-4xl font-serif font-bold text-brand-green-900">Ayurvedic Remedies & Foods</h1>
        <p class="text-xs sm:text-sm text-brand-green-700/70 mt-1.5">Scientifically formulated, naturally sourced organic products for your holistic well-being.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        
        <!-- Sidebar Filters -->
        <aside class="space-y-6 lg:col-span-1">
            <!-- Search Widget -->
            <div class="bg-white p-5 rounded-2xl border border-brand-green-100/60 shadow-sm text-left">
                <h3 class="font-serif text-sm font-semibold text-brand-green-900 mb-3 uppercase tracking-wider">Search</h3>
                <div class="relative">
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Type keywords..." 
                           class="w-full bg-brand-green-50/50 border border-brand-green-100 rounded-xl py-2 px-3 text-xs focus:outline-none focus:ring-1 focus:ring-brand-gold-500 text-brand-green-900">
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="bg-white p-5 rounded-2xl border border-brand-green-100/60 shadow-sm text-left">
                <h3 class="font-serif text-sm font-semibold text-brand-green-900 mb-3 uppercase tracking-wider">Categories</h3>
                <div class="space-y-2">
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

            <!-- Price Slider Widget -->
            <div class="bg-white p-5 rounded-2xl border border-brand-green-100/60 shadow-sm text-left">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="font-serif text-sm font-semibold text-brand-green-900 uppercase tracking-wider">Max Price</h3>
                    <span class="text-xs font-bold text-brand-green-900">₹{{ $maxPrice }}</span>
                </div>
                <input type="range" min="50" max="1000" step="10" wire:model.live="maxPrice" 
                       class="w-full h-1.5 bg-brand-green-100 rounded-lg appearance-none cursor-pointer accent-brand-green-800 focus:outline-none">
                <div class="flex justify-between text-[10px] text-brand-green-700/60 mt-1 font-medium">
                    <span>₹50</span>
                    <span>₹1,000</span>
                </div>
            </div>

            <!-- Reset Filters -->
            <button wire:click="resetFilters" 
                    class="w-full py-2.5 px-4 bg-brand-green-50 hover:bg-brand-green-100 text-brand-green-800 text-xs font-semibold rounded-xl border border-brand-green-100 transition-all">
                Reset All Filters
            </button>
        </aside>

        <!-- Product Grid Content -->
        <section class="lg:col-span-3">
            <!-- Toolbar -->
            <div class="bg-white px-5 py-4 rounded-2xl border border-brand-green-100/60 shadow-sm flex flex-wrap items-center justify-between gap-4 mb-6">
                <p class="text-xs text-brand-green-700/80 font-medium">
                    Showing <span class="font-bold text-brand-green-900">{{ $products->total() }}</span> Ayurvedic products
                </p>
                <div class="flex items-center gap-2">
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

            <!-- Products List -->
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-2xl overflow-hidden border border-brand-green-100/60 shadow-sm hover:shadow-md hover:border-brand-gold-500/30 transition-all flex flex-col group relative">
                            
                            <!-- Badge -->
                            @if($product->badge)
                                <span class="absolute top-4 left-4 z-10 inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-brand-gold-500 text-brand-green-900 tracking-wide uppercase shadow-sm">
                                    {{ $product->badge }}
                                </span>
                            @endif

                            <!-- Image Container -->
                            <div class="h-56 w-full overflow-hidden bg-brand-green-50">
                                <a href="/products/{{ $product->slug }}">
                                    <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </a>
                            </div>

                            <!-- Info Container -->
                            <div class="p-5 flex-grow flex flex-col text-left">
                                <span class="text-[9px] font-semibold text-brand-gold-600 uppercase tracking-widest">{{ $product->category->name }}</span>
                                <h3 class="font-serif text-base font-bold text-brand-green-900 mt-1 hover:text-brand-green-700 transition-colors">
                                    <a href="/products/{{ $product->slug }}">{{ $product->name }}</a>
                                </h3>
                                @if($product->review_count > 0)
                                    <div class="flex items-center gap-1 mt-1">
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
                                <p class="text-xs text-brand-green-700/60 mt-1.5 flex-grow line-clamp-2">
                                    {{ $product->short_description }}
                                </p>
                                <div class="flex items-center justify-between mt-4">
                                    <span class="text-xs text-brand-green-800 font-medium bg-brand-green-50 px-2 py-0.5 rounded-md border border-brand-green-100">
                                        {{ $product->unit_size }}
                                    </span>
                                    <div class="flex items-baseline gap-1.5">
                                        @if($product->is_on_sale)
                                            <span class="text-xs text-brand-green-700/40 line-through">₹{{ number_format($product->price, 2) }}</span>
                                            <span class="text-base font-bold text-brand-green-900">₹{{ number_format($product->sale_price, 2) }}</span>
                                        @else
                                            <span class="text-base font-bold text-brand-green-900">₹{{ number_format($product->price, 2) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Actions Container -->
                            <div class="px-5 pb-5 pt-2 border-t border-brand-green-50 flex gap-2">
                                <button wire:click="addToCart({{ $product->id }})" 
                                        class="flex-1 py-2 px-3 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-full text-xs font-semibold shadow-sm transition-all focus:outline-none">
                                    Add to Cart
                                </button>
                                
                                @php
                                    $waMessage = "Hello Dr. Sajeev Dev, I would like to buy *" . $product->name . "* (" . $product->unit_size . ") priced at ₹" . number_format($product->active_price, 2) . ". Please guide me with payment details. Product link: " . url('/products/' . $product->slug);
                                    $waUrl = "https://wa.me/917736609299?text=" . urlencode($waMessage);
                                @endphp
                                <a href="{{ $waUrl }}" target="_blank" 
                                   class="py-2 px-3 border border-green-600 bg-green-50 text-green-700 hover:bg-green-100 rounded-full text-xs font-semibold flex items-center justify-center gap-1 transition-all" title="Buy via WhatsApp">
                                    <svg class="w-3.5 h-3.5 fill-current text-green-600" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                                    </svg>
                                    Buy
                                </a>
                                
                                <button x-data @click="if (navigator.share) { navigator.share({ title: '{{ addslashes($product->name) }}', url: '{{ url('/products/' . $product->slug) }}' }) } else { navigator.clipboard.writeText('{{ url('/products/' . $product->slug) }}'); window.dispatchEvent(new CustomEvent('notify', { detail: [{ message: 'Link copied to clipboard!' }] })); }" 
                                        class="py-2 px-3 border border-brand-green-200 bg-white text-brand-green-800 hover:bg-brand-green-50 rounded-full flex items-center justify-center transition-all" title="Share Product">
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
