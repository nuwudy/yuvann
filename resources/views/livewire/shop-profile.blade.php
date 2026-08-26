<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    <!-- Shop Header Profile -->
    <div class="bg-brand-green-900 rounded-3xl overflow-hidden shadow-xl mb-12 border border-brand-green-800 relative">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1545239351-ef35f43d514b?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center opacity-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-green-900 via-brand-green-900/80 to-transparent"></div>
        
        <div class="relative z-10 px-6 py-12 md:py-16 flex flex-col md:flex-row items-center gap-8 md:gap-12 max-w-5xl mx-auto">
            <div class="flex-shrink-0">
                <div class="w-32 h-32 md:w-48 md:h-48 rounded-full bg-white flex items-center justify-center overflow-hidden border-4 border-brand-gold-500/50 shadow-[0_0_30px_rgba(201,168,76,0.2)] p-2">
                    @if($shop->profile_pic)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($shop->profile_pic) }}" alt="{{ $shop->name }}" class="w-full h-full object-contain">
                    @else
                        <span class="text-6xl font-serif font-bold text-brand-green-900">{{ substr($shop->name, 0, 1) }}</span>
                    @endif
                </div>
            </div>
            <div class="text-center md:text-left text-white flex-1">
                <span class="inline-block px-3 py-1 bg-brand-gold-500/20 text-brand-gold-400 border border-brand-gold-500/30 text-[10px] font-bold rounded-full mb-3 uppercase tracking-widest backdrop-blur-sm">Verified Partner</span>
                <h1 class="text-4xl md:text-5xl font-serif font-bold mb-4 text-brand-gold-50">{{ $shop->name }}</h1>
                <p class="text-brand-green-100/90 text-sm md:text-base leading-relaxed max-w-2xl">
                    {{ $shop->description ?: 'Explore the curated collection of Ayurvedic wellness products by ' . $shop->name . '.' }}
                </p>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="mb-6 flex justify-between items-end border-b border-brand-green-100 pb-4">
        <div>
            <h2 class="text-2xl font-serif font-bold text-brand-green-900">Products by {{ $shop->name }}</h2>
            <p class="text-sm text-brand-green-700/70 mt-1">Showing {{ $products->count() }} items</p>
        </div>
    </div>

    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-2xl overflow-hidden border border-brand-green-100/60 shadow-sm hover:shadow-md hover:border-brand-gold-500/30 transition-all flex flex-col group relative">
                    
                    @if($product->badge)
                        <span class="absolute top-4 left-4 z-10 inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-brand-gold-500 text-brand-green-900 tracking-wide uppercase shadow-sm">
                            {{ $product->badge }}
                        </span>
                    @endif

                    <div class="h-56 w-full overflow-hidden bg-brand-green-50">
                        <a href="/products/{{ $product->slug }}">
                            <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>

                    <div class="p-5 flex-grow flex flex-col text-left">
                        <span class="text-[9px] font-semibold text-brand-gold-600 uppercase tracking-wider break-words leading-snug">{{ $product->categories->pluck('name')->join(' • ') }}</span>
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
                        
                        <div class="flex items-center justify-between mt-auto pt-4">
                            <div class="flex flex-col">
                                <span class="font-sans text-sm font-bold text-brand-green-900">₹{{ number_format($product->active_price, 2) }}</span>
                                @if($product->is_on_sale)
                                    <span class="text-[10px] text-brand-green-700/50 line-through">₹{{ number_format($product->price, 2) }}</span>
                                @endif
                            </div>
                            <a href="/products/{{ $product->slug }}" class="w-8 h-8 rounded-full bg-brand-green-50 text-brand-green-800 flex items-center justify-center hover:bg-brand-gold-500 hover:text-brand-green-900 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-20 bg-white rounded-2xl border border-brand-green-100 shadow-sm">
            <div class="w-16 h-16 bg-brand-green-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-2xl text-brand-green-900">📦</span>
            </div>
            <h3 class="text-lg font-serif font-bold text-brand-green-900">No Products Yet</h3>
            <p class="text-sm text-brand-green-700/70 mt-1 max-w-md mx-auto">This shop hasn't listed any products yet. Check back soon for new arrivals!</p>
            <a href="/" class="inline-block mt-6 px-6 py-2.5 bg-brand-green-900 text-brand-gold-400 font-semibold text-xs rounded-xl hover:bg-brand-green-800 transition-colors">Return to Home</a>
        </div>
    @endif
</div>
