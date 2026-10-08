@section('meta')
    @php
        $shareImageUrl = $product->share_image_url;
        if (app()->environment('production') && !str_starts_with($shareImageUrl, 'https://')) {
            $shareImageUrl = str_replace('http://', 'https://', $shareImageUrl);
        }
        $metaDesc = Str::limit($product->short_description ?: 'Explore ' . $product->name . ' by Yuvann Wellness Concepts — Rebalancing you.', 160);
        $shareTitle = $product->name . ' | Yuvann - Rebalancing you';
        $shareDesc = Str::limit($product->short_description ?: 'Explore ' . $product->name . ' by Yuvann Wellness Concepts — Rebalancing you.', 200);
        $imgType = str_ends_with(strtolower(parse_url($shareImageUrl, PHP_URL_PATH) ?? ''), '.png') ? 'image/png' : 'image/jpeg';
    @endphp
    <meta name="description" content="{{ $metaDesc }}">
    <meta name="keywords" content="{{ $product->name }}, Yuvann, Ayurvedic Wellness, Rebalancing you, {{ $product->categories->pluck('name')->join(', ') }}">

    <!-- Open Graph / WhatsApp / Facebook Meta Tags -->
    <meta property="og:site_name" content="Yuvann - Rebalancing you">
    <meta property="og:title" content="{{ $shareTitle }}">
    <meta property="og:description" content="{{ $shareDesc }}">
    <meta property="og:image" content="{{ $shareImageUrl }}">
    <meta property="og:image:secure_url" content="{{ $shareImageUrl }}">
    <meta property="og:image:type" content="{{ $imgType }}">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="800">
    <meta property="og:image:alt" content="{{ $product->name }} - Yuvann - Rebalancing you">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="product">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $shareTitle }}">
    <meta name="twitter:description" content="{{ $shareDesc }}">
    <meta name="twitter:image" content="{{ $shareImageUrl }}">

    <!-- Fallback Image Link -->
    <link rel="image_src" href="{{ $shareImageUrl }}">

    @include('components.seo.product-schema', ['product' => $product])
@endsection

<div x-data="productDetailReader({
        translations: {{ Js::from($translations) }},
        availableLocales: {{ Js::from($availableLocales) }}
     })" 
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

    <!-- Breadcrumbs -->
    <nav class="flex text-xs text-brand-green-700/60 mb-6 font-medium text-left" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li><a href="/" class="hover:text-brand-green-900 transition-colors">Home</a></li>
            <li>
                <div class="flex items-center gap-1.5">
                    <span>/</span>
                    <a href="/products" class="hover:text-brand-green-900 transition-colors">Products</a>
                </div>
            </li>
            <li>
                <div class="flex items-center gap-1.5">
                    <span>/</span>
                    <a href="/products?category={{ $product->categories->first()->slug ?? '' }}" class="hover:text-brand-green-900 transition-colors">{{ $product->categories->first()->name ?? 'Products' }}</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center gap-1.5">
                    <span>/</span>
                    <span class="text-brand-green-900 font-semibold">{{ $product->name }}</span>
                </div>
            </li>
        </ol>
    </nav>

    @if(str_contains($product->slug, 'you-are-money'))
        <!-- Dedicated Book Sales Landing Page Banner -->
        <div class="mb-8 p-4 sm:p-5 rounded-2xl border border-brand-gold-400/50 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left transition-all hover:shadow-md"
             style="background: linear-gradient(135deg, #0e241b 0%, #173d2d 100%); color: #ffffff;">
            <div class="flex items-center gap-3.5">
                <span class="text-3xl sm:text-4xl">📖</span>
                <div>
                    <div class="text-[11px] uppercase font-bold text-brand-gold-300 tracking-wider">Dedicated Author Presentation & Masterclass</div>
                    <div class="text-sm sm:text-base font-serif font-bold text-white mt-0.5">
                        Discover the 5 Wealth Pillars, 30 Years of Distilled Wisdom & Active Frameworks
                    </div>
                </div>
            </div>
            <a href="/you-are-money" 
               class="whitespace-nowrap px-5 py-2.5 bg-brand-gold-400 hover:bg-brand-gold-300 text-brand-green-950 font-bold text-xs sm:text-sm rounded-full shadow-lg transition-transform hover:scale-105">
                View Special Presentation Page &rarr;
            </a>
        </div>
    @endif

    <!-- Main PDP Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start" 
         x-data="{ 
             activeMedia: { type: 'image', src: '{{ $product->featured_image_url }}' }
         }">
        
        <!-- Left Side: Interactive Gallery -->
        <div class="lg:col-span-6 space-y-4">
            <!-- Main Frame -->
            <div class="aspect-square bg-white rounded-3xl border border-brand-green-100 overflow-hidden flex items-center justify-center p-2 shadow-sm relative">
                <!-- Image display -->
                <img :src="activeMedia.src" 
                     alt="{{ $product->name }}" 
                     class="h-full w-full object-cover rounded-2xl hover:scale-102 transition-transform duration-300"
                     x-show="activeMedia.type === 'image'">

                <!-- Video display -->
                <video x-show="activeMedia.type === 'video'"
                       :src="activeMedia.src"
                       controls
                       autoplay
                       playsinline
                       class="h-full w-full object-cover rounded-2xl"
                       style="display: none;">
                    Your browser does not support the video tag.
                </video>

                <!-- Play badge overlay when viewing video -->
                <div x-show="activeMedia.type === 'video'"
                     class="absolute top-3 left-3 bg-black/60 text-white text-[10px] font-bold px-2.5 py-1 rounded-full flex items-center gap-1"
                     style="display: none;">
                    <span>▶</span> Video
                </div>
            </div>
            
            <!-- Thumbnails -->
            @php
                $gallery = is_string($product->gallery_images) 
                    ? json_decode($product->gallery_images, true) 
                    : $product->gallery_images;
                $allImages = array_unique(array_filter(array_merge([$product->featured_image_url], $gallery ?? [])));
                $productVideoUrl = $product->product_video_url;
            @endphp
            @if(count($allImages) > 1 || $productVideoUrl)
                <div class="flex gap-3 overflow-x-auto py-1">
                    {{-- Video thumbnail (if a product video exists) --}}
                    @if($productVideoUrl)
                        <button @click="activeMedia = { type: 'video', src: '{{ $productVideoUrl }}' }"
                                class="w-20 h-20 rounded-xl border overflow-hidden p-0 flex-shrink-0 focus:outline-none transition-all shadow-sm relative group bg-black"
                                :class="activeMedia.type === 'video' ? 'border-brand-gold-500 ring-2 ring-brand-gold-500/20 scale-95' : 'border-brand-green-100 hover:border-brand-gold-400'">
                            <!-- First-frame preview -->
                            <video src="{{ $productVideoUrl }}#t=0.1"
                                   preload="metadata"
                                   muted
                                   playsinline
                                   class="w-full h-full object-cover pointer-events-none">
                            </video>
                            <!-- Play icon overlay -->
                            <div class="absolute inset-0 flex items-center justify-center bg-black/30 group-hover:bg-black/20 transition-all">
                                <div class="w-7 h-7 rounded-full bg-white/80 group-hover:bg-white flex items-center justify-center shadow transition-all">
                                    <svg class="w-3.5 h-3.5 fill-brand-green-900 ml-0.5" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </button>
                    @endif

                    {{-- Image thumbnails --}}
                    @foreach($allImages as $imgUrl)
                        <!-- Resolve image URLs (local uploads or absolute seeds) -->
                        @php
                            $resolvedUrl = (str_starts_with($imgUrl, 'http://') || str_starts_with($imgUrl, 'https://')) ? $imgUrl : \Illuminate\Support\Facades\Storage::url($imgUrl);
                        @endphp
                        <button @click="activeMedia = { type: 'image', src: '{{ $resolvedUrl }}' }" 
                                class="w-20 h-20 bg-white rounded-xl border overflow-hidden p-1 flex-shrink-0 focus:outline-none transition-all shadow-sm"
                                :class="activeMedia.type === 'image' && activeMedia.src === '{{ $resolvedUrl }}' ? 'border-brand-gold-500 ring-2 ring-brand-gold-500/20 scale-95' : 'border-brand-green-100 hover:border-brand-green-300'">
                            <img src="{{ $resolvedUrl }}" alt="Gallery view" class="w-full h-full object-cover rounded-lg">
                        </button>
                    @endforeach
                </div>
            @elseif($productVideoUrl)
                {{-- Only video exists (single image), show a standalone play button --}}
                <div class="flex gap-3 py-1">
                    <button @click="activeMedia = { type: 'video', src: '{{ $productVideoUrl }}' }"
                            class="w-20 h-20 rounded-xl border overflow-hidden p-0 flex-shrink-0 focus:outline-none transition-all shadow-sm relative group bg-black"
                            :class="activeMedia.type === 'video' ? 'border-brand-gold-500 ring-2 ring-brand-gold-500/20 scale-95' : 'border-brand-green-100 hover:border-brand-gold-400'">
                        <!-- First-frame preview -->
                        <video src="{{ $productVideoUrl }}#t=0.1"
                               preload="metadata"
                               muted
                               playsinline
                               class="w-full h-full object-cover pointer-events-none">
                        </video>
                        <!-- Play icon overlay -->
                        <div class="absolute inset-0 flex items-center justify-center bg-black/30 group-hover:bg-black/20 transition-all">
                            <div class="w-7 h-7 rounded-full bg-white/80 group-hover:bg-white flex items-center justify-center shadow transition-all">
                                <svg class="w-3.5 h-3.5 fill-brand-green-900 ml-0.5" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </button>
                    <button @click="activeMedia = { type: 'image', src: '{{ $product->featured_image_url }}' }"
                            class="w-20 h-20 bg-white rounded-xl border overflow-hidden p-1 flex-shrink-0 focus:outline-none transition-all shadow-sm"
                            :class="activeMedia.type === 'image' ? 'border-brand-gold-500 ring-2 ring-brand-gold-500/20 scale-95' : 'border-brand-green-100 hover:border-brand-green-300'">
                        <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                    </button>
                </div>
            @endif
        </div>

        <!-- Right Side: Details & Actions -->
        <div class="lg:col-span-6 space-y-6 text-left">
            <!-- Badge & Stock Status -->
            <div class="flex items-center justify-between flex-wrap gap-2">
                <div class="flex items-center gap-2 flex-wrap">
                    @if($product->badge)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-brand-gold-500 text-brand-green-900 tracking-wide uppercase shadow-sm">
                            {{ $product->badge }}
                        </span>
                    @endif
                    @if($product->is_free_shipping)
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-black tracking-wide uppercase text-white shadow-md"
                              style="background: linear-gradient(135deg, #059669 0%, #10b981 100%) !important; color: #ffffff !important; box-shadow: 0 4px 12px rgba(5, 150, 105, 0.4) !important; border: 1.5px solid #ffffff !important;">
                            <svg class="w-4 h-4 fill-current text-white shrink-0 drop-shadow-xs" viewBox="0 0 24 24">
                                <path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                            </svg>
                            <span class="font-extrabold" style="text-shadow: 0 1px 2px rgba(0,0,0,0.25);">FREE SHIPPING</span>
                        </span>
                    @endif
                </div>
                
                @php
                    $activeVariant = $this->getSelectedVariant();
                    $inStock = $activeVariant ? $activeVariant->in_stock : $product->in_stock;
                    $stockQuantity = $activeVariant ? $activeVariant->stock_quantity : $product->stock_quantity;
                @endphp

                @if($inStock)
                    <span class="inline-flex items-center gap-1.5 text-xs text-green-700 font-semibold bg-green-50 px-3 py-1 rounded-full border border-green-200">
                        <span class="w-2 h-2 rounded-full bg-green-600 animate-pulse"></span>
                        In Stock ({{ $stockQuantity }} units)
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 text-xs text-red-700 font-semibold bg-red-50 px-3 py-1 rounded-full border border-red-200">
                        Out of Stock
                    </span>
                @endif
            </div>

            <!-- Title & Price -->
            <div class="space-y-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-brand-gold-600 uppercase tracking-widest">{{ $product->categories->pluck('name')->join(', ') }}</span>
                    @if($product->bodyParts->count() > 0)
                        <span class="text-brand-green-300">•</span>
                        <div class="flex flex-wrap gap-1.5 items-center">
                            <span class="text-[11px] font-semibold text-brand-green-700">Targeted For:</span>
                            @foreach($product->bodyParts as $bp)
                                <a href="/products?body_part={{ $bp->slug }}" class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-brand-gold-100/80 text-brand-green-900 border border-brand-gold-300 hover:bg-brand-gold-200 transition-colors">
                                    🧘 {{ $bp->name }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Multilingual Language Switcher & Doctor's Regional Audio Bar -->
                @if(count($availableLocales) > 1 || !empty($translations['ml']['name']) || !empty($translations['hi']['name']) || !empty($translations['ta']['name']))
                <div class="p-3 sm:p-4 rounded-2xl bg-gradient-to-br from-brand-green-900 via-brand-green-950 to-brand-green-900 text-white shadow-lg border border-brand-gold-500/30 space-y-2.5">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <!-- Language Switcher -->
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-gold-300 mr-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-brand-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                                </svg>
                                <span>Language:</span>
                            </span>
                            <div class="inline-flex p-0.5 rounded-xl bg-white/10 border border-white/10 backdrop-blur-sm gap-1">
                                @foreach($availableLocales as $loc)
                                    @php
                                        $locMeta = [
                                            'en' => ['native' => 'English', 'flag' => '🇬🇧', 'fontClass' => 'font-sans'],
                                            'ml' => ['native' => 'മലയാളം', 'flag' => '🌴', 'fontClass' => 'font-["Noto_Sans_Malayalam",sans-serif]'],
                                            'hi' => ['native' => 'हिन्दी', 'flag' => '🇮🇳', 'fontClass' => 'font-["Noto_Sans_Devanagari",sans-serif]'],
                                            'ta' => ['native' => 'தமிழ்', 'flag' => '🌺', 'fontClass' => 'font-["Noto_Sans_Tamil",sans-serif]'],
                                        ][$loc] ?? ['native' => strtoupper($loc), 'flag' => '🌐', 'fontClass' => 'font-sans'];
                                    @endphp
                                    <button type="button" 
                                            @click="switchLocale('{{ $loc }}')"
                                            :class="activeLocale === '{{ $loc }}' ? 'bg-brand-gold-400 text-brand-green-950 font-black shadow-xs ring-1 ring-brand-gold-300' : 'text-brand-green-100 hover:text-white hover:bg-white/10 font-medium'"
                                            class="px-2.5 py-1 rounded-lg text-xs transition-all flex items-center gap-1 cursor-pointer whitespace-nowrap {{ $locMeta['fontClass'] }}"
                                            title="View in {{ $locMeta['native'] }}">
                                        <span>{{ $locMeta['flag'] }}</span>
                                        <span>{{ $locMeta['native'] }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- Audio Player Button -->
                        <div class="flex items-center gap-2">
                            <button type="button" 
                                    @click="toggleAudio()"
                                    class="group relative inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold transition-all duration-300 shadow-sm cursor-pointer border"
                                    :class="audioState === 'playing' 
                                        ? 'bg-brand-gold-400 text-brand-green-950 border-brand-gold-300 shadow-brand-gold-400/30 ring-2 ring-brand-gold-400/50' 
                                        : (audioState === 'paused' 
                                            ? 'bg-amber-100 text-amber-950 border-amber-300' 
                                            : 'bg-white/15 hover:bg-brand-gold-400 text-white hover:text-brand-green-950 border-white/20 hover:border-brand-gold-400')">
                                <template x-if="audioState === 'idle'">
                                    <span class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-brand-gold-300 group-hover:text-brand-green-950 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </span>
                                </template>
                                <template x-if="audioState === 'playing'">
                                    <span class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-brand-green-950" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                                        </svg>
                                        <span class="flex items-center gap-0.5 h-2.5">
                                            <span class="w-0.5 bg-brand-green-950 rounded-full animate-bounce h-1.5" style="animation-delay: 0.1s"></span>
                                            <span class="w-0.5 bg-brand-green-950 rounded-full animate-bounce h-2.5" style="animation-delay: 0.2s"></span>
                                            <span class="w-0.5 bg-brand-green-950 rounded-full animate-bounce h-1.5" style="animation-delay: 0.3s"></span>
                                        </span>
                                    </span>
                                </template>
                                <template x-if="audioState === 'paused'">
                                    <span class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-amber-950" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </span>
                                </template>
                                <span x-text="getAudioLabel()" class="tracking-wide text-xs"></span>
                            </button>

                            <!-- Stop button -->
                            <button type="button" 
                                    x-show="audioState !== 'idle'" 
                                    @click="stopAudio()"
                                    class="p-1.5 sm:px-2.5 sm:py-1.5 rounded-full text-xs font-semibold bg-white/10 hover:bg-red-500/80 text-white/90 hover:text-white border border-white/20 transition-all flex items-center gap-1 cursor-pointer"
                                    title="Stop audio">
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M6 6h12v12H6z"/></svg>
                                <span class="hidden sm:inline" x-text="getStopLabel()">Stop</span>
                            </button>
                        </div>
                    </div>

                    <!-- Voice indicator bar -->
                    <div class="pt-2 border-t border-white/10 flex items-center justify-between text-[10px] text-brand-green-100/70">
                        <div class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full" :class="audioState === 'playing' ? 'bg-emerald-400 animate-pulse' : 'bg-gray-400'"></span>
                            <span x-text="activeAudioBadge"></span>
                        </div>
                        <div class="text-[9px] text-brand-gold-300 font-mono tracking-wider">
                            YUVANN NATIVE AUDIO
                        </div>
                    </div>
                </div>
                @endif

                <h1 class="text-3xl sm:text-4xl font-serif font-bold text-brand-green-900 leading-tight" x-text="currentTranslation.name">
                    {{ $product->name }}
                </h1>
                
                @if($product->review_count > 0)
                    <div class="flex items-center gap-2 pt-1 pb-2">
                        <div class="flex text-brand-gold-500">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= round($product->average_rating) ? 'fill-current' : 'text-gray-300 fill-current' }}" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        <a href="#reviews" class="text-sm font-medium text-brand-green-700 hover:text-brand-gold-600 transition-colors">
                            {{ number_format($product->average_rating, 1) }} ({{ $product->review_count }} {{ Str::plural('Review', $product->review_count) }})
                        </a>
                    </div>
                @endif
                
                <p class="text-xs text-brand-green-700/60 font-medium">SKU: <span class="font-bold">{{ $activeVariant ? $activeVariant->sku : $product->sku }}</span> | Size: <span class="font-bold">{{ $activeVariant ? $activeVariant->unit_size : $product->unit_size }}</span></p>
                
                @if($product->variants->isNotEmpty())
                    <div class="pt-2 pb-1">
                        <span class="text-xs font-bold text-brand-green-900 uppercase block mb-2">Select Size:</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach($product->variants as $variant)
                                <button wire:click="$set('selectedVariantId', {{ $variant->id }})"
                                        class="px-4 py-2 border rounded-full text-sm font-semibold transition-all
                                        {{ $selectedVariantId === $variant->id ? 'border-brand-gold-500 bg-brand-gold-50 text-brand-green-900 ring-1 ring-brand-gold-500' : 'border-brand-green-200 text-brand-green-700 hover:border-brand-green-400' }}">
                                    {{ $variant->unit_size }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif

                @php
                    $displayPrice = $activeVariant ? $activeVariant->price : $product->price;
                    $displaySalePrice = $activeVariant ? $activeVariant->sale_price : $product->sale_price;
                    $isOnSale = $activeVariant ? $activeVariant->is_on_sale : $product->is_on_sale;
                    $savings = $activeVariant ? $activeVariant->savings_percentage : $product->savings_percentage;
                @endphp

                <div class="flex items-baseline gap-3 pt-2">
                    @if($isOnSale)
                        <span class="text-lg text-brand-green-700/40 line-through">₹{{ number_format($displayPrice, 2) }}</span>
                        <span class="text-3xl font-serif font-bold text-brand-green-900">₹{{ number_format($displaySalePrice, 2) }}</span>
                        <span class="text-xs font-bold text-brand-gold-600 bg-brand-gold-50 px-2 py-1 rounded-md border border-brand-gold-100">
                            Save {{ $savings }}%
                        </span>
                    @else
                        <span class="text-3xl font-serif font-bold text-brand-green-900">₹{{ number_format($displayPrice, 2) }}</span>
                    @endif

                    @if($product->is_free_shipping)
                        <div class="inline-flex items-center gap-2 text-xs sm:text-sm font-extrabold px-3 py-1.5 rounded-lg border shadow-xs"
                             style="background-color: #ecfdf5 !important; color: #047857 !important; border-color: #a7f3d0 !important;">
                            <span class="text-base">🚚</span>
                            <span>Eligible for <strong>FREE Shipping</strong> (Save ₹60)</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Short Description -->
            <p class="text-sm text-brand-green-800/80 leading-relaxed border-t border-brand-green-100/60 pt-4" x-text="currentTranslation.short_description">
                {{ $product->short_description }}
            </p>

            <!-- Quantity & Actions Area -->
            @if($inStock)
                <div class="space-y-4 border-t border-brand-green-100/60 pt-4">
                    <div class="flex items-center gap-4">
                        <span class="text-xs font-bold text-brand-green-900 uppercase">Quantity:</span>
                        <div class="flex items-center border border-brand-green-200 rounded-full bg-white px-3 py-1.5 gap-4">
                            <button wire:click="decrementQty" class="text-brand-green-800 hover:text-brand-gold-600 focus:outline-none font-bold text-base px-2">-</button>
                            <span class="font-bold text-brand-green-900 w-6 text-center text-sm">{{ $quantity }}</span>
                            <button wire:click="incrementQty" class="text-brand-green-800 hover:text-brand-gold-600 focus:outline-none font-bold text-base px-2">+</button>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <!-- Add to Cart -->
                        <button wire:click="addToCart" 
                                wire:loading.attr="disabled"
                                class="flex-1 py-3.5 px-6 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-full font-semibold shadow-md hover:shadow-lg transition-all focus:outline-none flex justify-center items-center gap-2 text-sm disabled:opacity-75 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span wire:loading.remove wire:target="addToCart">Add to Cart</span>
                            <span wire:loading wire:target="addToCart">Adding...</span>
                        </button>
                        
                        <!-- WhatsApp Buy Single Product -->
                        @php
                            $activePriceForWa = $activeVariant ? $activeVariant->active_price : $product->active_price;
                            $activeSizeForWa = $activeVariant ? $activeVariant->unit_size : $product->unit_size;
                            $waMessage = "Hello Dr. Sajeev Dev, I would like to order " . $quantity . " x *" . $product->name . "* (" . $activeSizeForWa . ") priced at ₹" . number_format($activePriceForWa * $quantity, 2) . ". Please guide me with payment details. Product link: " . request()->url();
                            $waUrl = "https://wa.me/917736609299?text=" . urlencode($waMessage);
                        @endphp
                        <a href="{{ $waUrl }}" target="_blank" 
                           class="flex-1 py-3.5 px-6 border-2 border-green-600 bg-green-50 text-green-700 hover:bg-green-100 rounded-full font-semibold flex items-center justify-center gap-2 transition-all text-sm shadow-sm" title="Direct single item WhatsApp order">
                            <svg class="w-4 h-4 fill-current text-green-600" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                            </svg>
                            Instant WhatsApp Buy
                        </a>
                        
                        <!-- Share -->
                        <button @click="if (navigator.share) { navigator.share({ title: '{{ addslashes($product->name) }}', url: '{{ request()->url() }}' }) } else { navigator.clipboard.writeText('{{ request()->url() }}'); window.dispatchEvent(new CustomEvent('notify', { detail: [{ message: 'Link copied to clipboard!' }] })); }" 
                                class="py-3.5 px-4 border border-brand-green-200 bg-white text-brand-green-800 hover:bg-brand-green-50 rounded-full font-semibold flex items-center justify-center shadow-sm transition-all text-sm group" title="Share this product">
                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Multi-product WhatsApp notice -->
                    <div class="flex items-center gap-2.5 p-3 rounded-xl bg-brand-green-50/80 border border-brand-green-100 text-xs text-brand-green-900">
                        <span class="text-base">🛒</span>
                        <span><strong>Ordering multiple items?</strong> Click <em>Add to Cart</em> and choose <strong>Order via WhatsApp</strong> or <strong>Online Payment</strong> at checkout!</span>
                    </div>
                </div>
            @endif

            <!-- Tabs Segment (Alpine.js) -->
            <div class="border-t border-brand-green-100/60 pt-6">
                <!-- Tab Headers -->
                <div class="flex border-b border-brand-green-100/50 gap-4 sm:gap-8">
                    <button @click="activeTab = 'benefits'" 
                            class="pb-3 text-xs sm:text-sm font-semibold focus:outline-none transition-all uppercase tracking-wider border-b-2 cursor-pointer"
                            :class="activeTab === 'benefits' ? 'border-brand-gold-500 text-brand-green-900' : 'border-transparent text-brand-green-700/50 hover:text-brand-green-800'">
                        Benefits
                    </button>
                    <button @click="activeTab = 'ingredients'" 
                            class="pb-3 text-xs sm:text-sm font-semibold focus:outline-none transition-all uppercase tracking-wider border-b-2 cursor-pointer"
                            :class="activeTab === 'ingredients' ? 'border-brand-gold-500 text-brand-green-900' : 'border-transparent text-brand-green-700/50 hover:text-brand-green-800'">
                        Ingredients
                    </button>
                    <button @click="activeTab = 'usage'" 
                            class="pb-3 text-xs sm:text-sm font-semibold focus:outline-none transition-all uppercase tracking-wider border-b-2 cursor-pointer"
                            :class="activeTab === 'usage' ? 'border-brand-gold-500 text-brand-green-900' : 'border-transparent text-brand-green-700/50 hover:text-brand-green-800'">
                        Directions
                    </button>
                </div>

                <!-- Tab Panels -->
                <div class="py-4 text-xs sm:text-sm text-brand-green-800/80 leading-relaxed font-medium">
                    <!-- Benefits Panel -->
                    <div x-show="activeTab === 'benefits'" x-transition>
                        <template x-if="currentTranslation.benefits && currentTranslation.benefits.length > 0">
                            <div class="space-y-3.5">
                                <template x-for="(item, idx) in currentTranslation.benefits" :key="'b-' + idx">
                                    <div class="flex items-start gap-2.5">
                                        <span class="text-brand-gold-600 mt-0.5 flex-shrink-0 text-xs">🌿</span>
                                        <div class="text-left leading-relaxed">
                                            <template x-if="item.title">
                                                <strong class="text-brand-green-950 font-bold" x-text="item.title + ':'"></strong>
                                            </template>
                                            <span x-text="item.content"></span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                        <template x-if="!currentTranslation.benefits || currentTranslation.benefits.length === 0">
                            <p class="whitespace-pre-line text-left text-brand-green-700/60">Clinical benefits documentation coming soon.</p>
                        </template>
                    </div>

                    <!-- Ingredients Panel -->
                    <div x-show="activeTab === 'ingredients'" x-transition style="display: none;">
                        <template x-if="currentTranslation.ingredients && currentTranslation.ingredients.length > 0">
                            <div class="space-y-3.5">
                                <template x-for="(item, idx) in currentTranslation.ingredients" :key="'i-' + idx">
                                    <div class="flex items-start gap-2.5">
                                        <span class="text-brand-gold-600 mt-0.5 flex-shrink-0 text-xs">🌱</span>
                                        <div class="text-left leading-relaxed">
                                            <template x-if="item.title">
                                                <strong class="text-brand-green-950 font-bold" x-text="item.title + ':'"></strong>
                                            </template>
                                            <span x-text="item.content"></span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                        <template x-if="!currentTranslation.ingredients || currentTranslation.ingredients.length === 0">
                            <p class="whitespace-pre-line text-left text-brand-green-700/60">Pure clinical-grade herbs formulate this remedy.</p>
                        </template>
                    </div>

                    <!-- Usage / Directions Panel -->
                    <div x-show="activeTab === 'usage'" x-transition style="display: none;">
                        <template x-if="currentTranslation.usage && currentTranslation.usage.length > 0">
                            <div class="space-y-3.5">
                                <template x-for="(item, idx) in currentTranslation.usage" :key="'u-' + idx">
                                    <div class="flex items-start gap-2.5">
                                        <span class="text-brand-gold-600 mt-0.5 flex-shrink-0 text-xs">✨</span>
                                        <div class="text-left leading-relaxed">
                                            <template x-if="item.title">
                                                <strong class="text-brand-green-950 font-bold" x-text="item.title + ':'"></strong>
                                            </template>
                                            <span x-text="item.content"></span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                        <template x-if="!currentTranslation.usage || currentTranslation.usage.length === 0">
                            <p class="whitespace-pre-line text-left text-brand-green-700/60">Refer to primary packaging or consult Dr. Sajeev Dev for directions.</p>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer Reviews Section -->
    <div id="reviews" class="mt-20 border-t border-brand-green-100/60 pt-12">
        <h2 class="text-2xl font-serif font-bold text-brand-green-900 mb-8">Customer Reviews</h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Review Form -->
            <div class="lg:col-span-5 bg-white p-6 rounded-3xl border border-brand-green-100/60 shadow-sm">
                <h3 class="text-lg font-serif font-bold text-brand-green-900 mb-4">Write a Review</h3>
                <form wire:submit="submitReview" class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-brand-green-900 mb-1">Your Name *</label>
                        <input type="text" wire:model="reviewName" required class="w-full rounded-xl border-gray-300 shadow-sm focus:border-brand-green-500 focus:ring-brand-green-500 sm:text-sm">
                        @error('reviewName') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-xs font-semibold text-brand-green-900 mb-1">Rating *</label>
                        <select wire:model="reviewRating" required class="w-full rounded-xl border-gray-300 shadow-sm focus:border-brand-green-500 focus:ring-brand-green-500 sm:text-sm">
                            <option value="5">5 - Excellent</option>
                            <option value="4">4 - Very Good</option>
                            <option value="3">3 - Average</option>
                            <option value="2">2 - Poor</option>
                            <option value="1">1 - Terrible</option>
                        </select>
                        @error('reviewRating') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-brand-green-900 mb-1">Comment (Optional)</label>
                        <textarea wire:model="reviewComment" rows="3" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-brand-green-500 focus:ring-brand-green-500 sm:text-sm"></textarea>
                        @error('reviewComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="w-full py-2.5 bg-brand-green-900 hover:bg-brand-green-800 text-white rounded-full font-semibold shadow-sm transition-all focus:outline-none">
                        Submit Review
                    </button>
                </form>
            </div>

            <!-- Review List -->
            <div class="lg:col-span-7 space-y-6">
                @php
                    $approvedReviews = $product->reviews()->where('is_approved', true)->latest()->get();
                @endphp
                
                @forelse($approvedReviews as $review)
                    <div class="bg-white p-6 rounded-3xl border border-brand-green-100/60 shadow-sm">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-bold text-brand-green-900 text-sm">{{ $review->customer_name }}</h4>
                            <span class="text-xs text-brand-green-700/60">{{ $review->created_at->format('F j, Y') }}</span>
                        </div>
                        <div class="flex text-brand-gold-500 mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'fill-current' : 'text-gray-300 fill-current' }}" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        @if($review->comment)
                            <p class="text-sm text-brand-green-800/80 leading-relaxed">{{ $review->comment }}</p>
                        @endif
                    </div>
                @empty
                    <div class="bg-brand-green-50/50 p-8 rounded-3xl border border-brand-green-100/60 text-center">
                        <p class="text-brand-green-800 font-medium">No reviews yet.</p>
                        <p class="text-sm text-brand-green-700/60 mt-1">Be the first to share your experience with this product!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('productDetailReader', (config) => ({
        translations: config.translations || {},
        activeLocale: 'en',
        availableLocales: config.availableLocales || ['en'],
        audioState: 'idle', // 'idle' | 'playing' | 'paused'
        activeAudioBadge: 'Ready to listen',
        notification: null,
        activeTab: 'benefits',

        speechLabels: {
            'en': { listen: "Listen to Doctor's Guide", playing: 'Playing audio...', paused: 'Paused', stop: 'Stop' },
            'ml': { listen: 'ഡോക്ടറുടെ നിർദ്ദേശം കേൾക്കുക', playing: 'ഓഡിയോ കേൾക്കുന്നു...', paused: 'നിർത്തിവെച്ചു', stop: 'നിർത്തുക' },
            'hi': { listen: 'डॉक्टर की सलाह सुनें', playing: 'ऑडियो चल रहा है...', paused: 'रुका हुआ', stop: 'रोकें' },
            'ta': { listen: 'மருத்துவர் வழிகாட்டலைக் கேளுங்கள்', playing: 'ஆடியோ ஒலிக்கிறது...', paused: 'இடைநிறுத்தப்பட்டது', stop: 'நிறுத்து' },
        },

        init() {
            const urlParams = new URLSearchParams(window.location.search);
            const langParam = urlParams.get('lang');
            if (langParam && this.availableLocales.includes(langParam)) {
                this.activeLocale = langParam;
            }

            if (window.YuvannTTS) {
                window.YuvannTTS.onStateChange((detail) => {
                    this.audioState = detail.state;
                    const labels = this.speechLabels[this.activeLocale] || this.speechLabels.en;
                    if (detail.state === 'playing') {
                        this.activeAudioBadge = labels.playing;
                    } else if (detail.state === 'paused') {
                        this.activeAudioBadge = labels.paused;
                    } else if (detail.finished) {
                        this.activeAudioBadge = 'Audio finished';
                        this.audioState = 'idle';
                    } else if (detail.error) {
                        this.activeAudioBadge = 'Audio unavailable';
                        this.audioState = 'idle';
                    } else {
                        this.activeAudioBadge = 'Ready to listen';
                    }
                });
            }
        },

        get currentTranslation() {
            return this.translations[this.activeLocale] || this.translations['en'] || {
                name: '{{ addslashes($product->name) }}',
                short_description: '{{ addslashes($product->short_description ?? '') }}',
                benefits: [],
                ingredients: [],
                usage: [],
                audio_url: null
            };
        },

        switchLocale(locale) {
            if (this.activeLocale === locale) return;
            this.stopAudio();
            this.activeLocale = locale;

            try {
                const url = new URL(window.location);
                url.searchParams.set('lang', locale);
                window.history.replaceState({}, '', url);
            } catch (e) {}
        },

        getAudioLabel() {
            const labels = this.speechLabels[this.activeLocale] || this.speechLabels.en;
            if (this.audioState === 'playing') return labels.playing;
            if (this.audioState === 'paused') return labels.paused;
            return labels.listen;
        },

        getStopLabel() {
            return (this.speechLabels[this.activeLocale] || this.speechLabels.en).stop;
        },

        toggleAudio() {
            if (this.audioState === 'playing') {
                this.pauseAudio();
            } else if (this.audioState === 'paused') {
                this.resumeAudio();
            } else {
                this.playAudio();
            }
        },

        playAudio() {
            const trans = this.currentTranslation;

            // Formulate authentic spoken doctor guide
            let speech = (trans.name ? trans.name + '. ' : '');
            if (trans.short_description) speech += trans.short_description + '. ';

            if (trans.benefits && trans.benefits.length > 0) {
                const bHead = this.activeLocale === 'ml' ? 'ഗുണങ്ങൾ: ' : (this.activeLocale === 'hi' ? 'मुख्य लाभ: ' : (this.activeLocale === 'ta' ? 'நன்மைகள்: ' : 'Key Benefits: '));
                speech += bHead;
                trans.benefits.forEach(b => {
                    speech += (b.title ? b.title + ': ' : '') + b.content + '. ';
                });
            }

            if (trans.usage && trans.usage.length > 0) {
                const uHead = this.activeLocale === 'ml' ? 'ഉപയോഗിക്കേണ്ട വിധം: ' : (this.activeLocale === 'hi' ? 'उपयोग विधि: ' : (this.activeLocale === 'ta' ? 'பயன்படுத்தும் முறை: ' : 'Directions: '));
                speech += uHead;
                trans.usage.forEach(u => {
                    speech += (u.title ? u.title + ': ' : '') + u.content + '. ';
                });
            }

            if (window.YuvannTTS) {
                window.YuvannTTS.play({
                    text: speech,
                    locale: this.activeLocale,
                    audioUrl: trans.audio_url || null
                });
            } else if (window.speechSynthesis) {
                window.speechSynthesis.cancel();
                const utter = new SpeechSynthesisUtterance(speech);
                utter.lang = this.activeLocale;
                this.audioState = 'playing';
                utter.onend = () => { this.audioState = 'idle'; };
                utter.onerror = () => { this.audioState = 'idle'; };
                window.speechSynthesis.speak(utter);
            }
        },

        pauseAudio() {
            if (window.YuvannTTS) {
                window.YuvannTTS.pause();
            } else if (window.speechSynthesis) {
                window.speechSynthesis.pause();
                this.audioState = 'paused';
            }
        },

        resumeAudio() {
            if (window.YuvannTTS) {
                window.YuvannTTS.resume();
            } else if (window.speechSynthesis) {
                window.speechSynthesis.resume();
                this.audioState = 'playing';
            }
        },

        stopAudio() {
            if (window.YuvannTTS) {
                window.YuvannTTS.stop();
            }
            if (window.speechSynthesis) {
                window.speechSynthesis.cancel();
            }
            this.audioState = 'idle';
            this.activeAudioBadge = 'Ready to listen';
        }
    }));
});
</script>
