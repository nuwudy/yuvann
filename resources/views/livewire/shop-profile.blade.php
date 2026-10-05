@section('meta')
    @php
        $ogImageUrl = url('/icons/icon-512.png');
        if (app()->environment('production') && !str_starts_with($ogImageUrl, 'https://')) {
            $ogImageUrl = str_replace('http://', 'https://', $ogImageUrl);
        }
        $metaDesc = Str::limit($shop->description ?: 'Explore curated Ayurvedic wellness products by ' . $shop->name . ' on Yuvann — Rebalancing you.', 160);
        $shareTitle = $shop->name . ' | Yuvann - Rebalancing you';
        $shareDesc = Str::limit($shop->description ?: 'Explore curated Ayurvedic wellness products by ' . $shop->name . ' on Yuvann — Rebalancing you.', 200);
    @endphp
    <meta name="description" content="{{ $metaDesc }}">
    <meta name="keywords" content="{{ $shop->name }}, Yuvann, Ayurvedic Wellness, Rebalancing you, Herbal Products">

    <!-- Open Graph / WhatsApp / Facebook Meta Tags -->
    <meta property="og:site_name" content="Yuvann - Rebalancing you">
    <meta property="og:title" content="{{ $shareTitle }}">
    <meta property="og:description" content="{{ $shareDesc }}">
    <meta property="og:image" content="{{ $ogImageUrl }}">
    <meta property="og:image:secure_url" content="{{ $ogImageUrl }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="512">
    <meta property="og:image:height" content="512">
    <meta property="og:image:alt" content="Yuvann - Rebalancing you">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $shareTitle }}">
    <meta name="twitter:description" content="{{ $shareDesc }}">
    <meta name="twitter:image" content="{{ $ogImageUrl }}">

    <!-- Fallback Image Link -->
    <link rel="image_src" href="{{ $ogImageUrl }}">
@endsection

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    <!-- Shop Header Profile -->
    <div class="bg-brand-green-900 rounded-3xl overflow-hidden shadow-xl mb-12 border border-brand-green-800 relative">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1545239351-ef35f43d514b?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center opacity-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-green-900 via-brand-green-900/80 to-transparent"></div>
        
        <div class="relative z-10 px-6 py-12 md:py-16 flex flex-col md:flex-row items-center gap-6 md:gap-8 max-w-5xl mx-auto">
            <div class="flex-shrink-0">
                <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-white flex items-center justify-center overflow-hidden border-4 border-brand-gold-500/50 shadow-lg p-1.5 transition-transform hover:scale-105 hover:border-brand-gold-400">
                    @if($shop->profile_pic)
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($shop->profile_pic) }}" alt="{{ $shop->name }}" class="w-full h-full object-cover rounded-full">
                    @else
                        <span class="text-4xl md:text-5xl font-serif font-bold text-brand-green-900">{{ substr($shop->name, 0, 1) }}</span>
                    @endif
                </div>
            </div>
            <div class="text-center md:text-left text-white flex-1">
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-2 mb-3">
                    <span class="inline-block px-3 py-1 bg-brand-gold-500/20 text-brand-gold-400 border border-brand-gold-500/30 text-[10px] font-bold rounded-full uppercase tracking-widest backdrop-blur-sm">Verified Partner</span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-brand-green-800/90 text-brand-gold-300 border border-brand-gold-500/30 text-[10px] font-medium rounded-full tracking-wider backdrop-blur-sm">
                        <img src="{{ asset('icons/icon-512.png') }}" alt="Yuvann" class="w-3.5 h-3.5 rounded-full inline-block">
                        <span>Yuvann &bull; Rebalancing you</span>
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl font-serif font-bold mb-2 text-brand-gold-50">{{ $shop->name }}</h1>
                <p class="text-brand-gold-400/90 text-sm font-serif italic tracking-wide mb-3">Rebalancing you</p>
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
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-xl sm:rounded-2xl overflow-hidden border border-brand-green-100/60 shadow-sm hover:shadow-md hover:border-brand-gold-500/30 transition-all flex flex-col group relative">
                    
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

                    <div class="aspect-square sm:h-56 w-full overflow-hidden bg-brand-green-50">
                        <a href="/products/{{ $product->slug }}">
                            <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>

                    <div class="p-3 sm:p-5 flex-grow flex flex-col text-left">
                        <span class="text-[8px] sm:text-[9px] font-semibold text-brand-gold-600 uppercase tracking-wider break-words leading-snug">{{ $product->categories->pluck('name')->join(' • ') }}</span>
                        <h3 class="font-serif text-xs sm:text-base font-bold text-brand-green-900 mt-1 hover:text-brand-green-700 transition-colors line-clamp-2 leading-tight min-h-[2rem] sm:min-h-0">
                            <a href="/products/{{ $product->slug }}">{{ $product->name }}</a>
                        </h3>
                        
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
                        
                        @if($product->has_multiple_variants)
                            <div class="mt-2 sm:mt-2.5 pt-1.5 sm:pt-2 border-t border-brand-green-100/80">
                                <div class="text-[9px] sm:text-[10px] uppercase font-bold text-brand-green-800/70 tracking-wider mb-1 sm:mb-1.5 flex items-center justify-between">
                                    <span>Sizes:</span>
                                    <span class="text-brand-gold-700 font-bold lowercase text-[9px] sm:text-[10px] bg-brand-gold-50 px-1.5 py-0.2 rounded border border-brand-gold-200">{{ $product->active_variants->count() }} sizes</span>
                                </div>
                                <div class="flex flex-wrap gap-1 sm:gap-1.5">
                                    @foreach($product->active_variants as $v)
                                        <a href="/products/{{ $product->slug }}?variant={{ $v->id }}" 
                                           class="inline-flex items-center gap-1 sm:gap-1.5 px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-md sm:rounded-lg text-[10px] sm:text-xs bg-white border border-brand-green-200 hover:border-brand-gold-500 hover:bg-brand-gold-50/70 transition-all shadow-2xs group/pill"
                                           title="{{ $v->unit_size }} - ₹{{ number_format($v->active_price, 2) }}">
                                            <span class="font-bold text-brand-green-900">{{ $v->unit_size }}</span>
                                            <span class="font-black text-[9px] sm:text-[11px] text-brand-green-950 bg-brand-gold-100 px-1 sm:px-1.5 py-0.2 sm:py-0.5 rounded border border-brand-gold-300 group-hover/pill:bg-brand-gold-200 transition-colors">₹{{ number_format($v->active_price, 0) }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @elseif($product->unit_size)
                            <p class="text-[10px] sm:text-xs text-brand-green-700/60 mt-1">{{ $product->unit_size }}</p>
                        @endif
                        
                        <div class="flex items-center justify-between mt-auto pt-2 sm:pt-3">
                            <div class="flex flex-col">
                                @if($product->has_price_range)
                                    <span class="text-[8px] sm:text-[10px] font-bold uppercase tracking-wider text-brand-gold-700">Price Range</span>
                                    <div class="flex items-baseline gap-1">
                                        <span class="font-serif text-xs sm:text-lg font-black text-brand-green-950 tracking-tight">₹{{ number_format($product->min_price, 0) }}–₹{{ number_format($product->max_price, 0) }}</span>
                                    </div>
                                @else
                                    <span class="font-sans text-xs sm:text-base font-bold text-brand-green-900">₹{{ number_format($product->active_price, 0) }}</span>
                                    @if($product->is_on_sale)
                                        <span class="text-[9px] sm:text-[10px] text-brand-green-700/50 line-through">₹{{ number_format($product->price, 0) }}</span>
                                    @endif
                                @endif
                            </div>
                            <a href="/products/{{ $product->slug }}" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-brand-green-800 text-white flex items-center justify-center hover:bg-brand-gold-500 hover:text-brand-green-950 transition-colors shadow-xs" title="View Options">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
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
