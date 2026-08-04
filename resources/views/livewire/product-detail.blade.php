@section('meta')
    <meta name="description" content="{{ Str::limit($product->short_description ?? 'Buy ' . $product->name . ' from Yuvann Wellness Concepts.', 160) }}">
    <meta property="og:title" content="{{ $product->name }} | Yuvann Wellness Concepts">
    <meta property="og:description" content="{{ Str::limit($product->short_description ?? 'Premium Ayurvedic & Herbal Products by Dr. Sajeev Dev.', 200) }}">
    @php
        $ogImageUrl = $product->featured_image_url;
        if (!str_starts_with($ogImageUrl, 'http')) {
            $ogImageUrl = url(str_starts_with($ogImageUrl, '/') ? $ogImageUrl : '/storage/' . $ogImageUrl);
        }
    @endphp
    <meta property="og:image" content="{{ $ogImageUrl }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="product">
    <meta name="twitter:card" content="summary_large_image">
@endsection

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
                    <a href="/products?category={{ $product->category->slug }}" class="hover:text-brand-green-900 transition-colors">{{ $product->category->name }}</a>
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
                </div>
            @elseif($productVideoUrl)
                {{-- Only video exists (single image), show a standalone play button --}}
                <div class="flex gap-3 py-1">
                    <button @click="activeMedia = { type: 'image', src: '{{ $product->featured_image_url }}' }"
                            class="w-20 h-20 bg-white rounded-xl border overflow-hidden p-1 flex-shrink-0 focus:outline-none transition-all shadow-sm"
                            :class="activeMedia.type === 'image' ? 'border-brand-gold-500 ring-2 ring-brand-gold-500/20 scale-95' : 'border-brand-green-100 hover:border-brand-green-300'">
                        <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                    </button>
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
                </div>
            @endif
        </div>

        <!-- Right Side: Details & Actions -->
        <div class="lg:col-span-6 space-y-6 text-left">
            <!-- Badge & Stock Status -->
            <div class="flex items-center justify-between">
                @if($product->badge)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-brand-gold-500 text-brand-green-900 tracking-wide uppercase shadow-sm">
                        {{ $product->badge }}
                    </span>
                @else
                    <div></div>
                @endif
                
                @if($product->in_stock)
                    <span class="inline-flex items-center gap-1.5 text-xs text-green-700 font-semibold bg-green-50 px-3 py-1 rounded-full border border-green-200">
                        <span class="w-2 h-2 rounded-full bg-green-600 animate-pulse"></span>
                        In Stock ({{ $product->stock_quantity }} units)
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 text-xs text-red-700 font-semibold bg-red-50 px-3 py-1 rounded-full border border-red-200">
                        Out of Stock
                    </span>
                @endif
            </div>

            <!-- Title & Price -->
            <div class="space-y-2">
                <span class="text-xs font-bold text-brand-gold-600 uppercase tracking-widest">{{ $product->category->name }}</span>
                <h1 class="text-3xl sm:text-4xl font-serif font-bold text-brand-green-900 leading-tight">{{ $product->name }}</h1>
                <p class="text-xs text-brand-green-700/60 font-medium">SKU: <span class="font-bold">{{ $product->sku }}</span> | Size: <span class="font-bold">{{ $product->unit_size }}</span></p>
                
                <div class="flex items-baseline gap-3 pt-2">
                    @if($product->is_on_sale)
                        <span class="text-lg text-brand-green-700/40 line-through">₹{{ number_format($product->price, 2) }}</span>
                        <span class="text-3xl font-serif font-bold text-brand-green-900">₹{{ number_format($product->sale_price, 2) }}</span>
                        <span class="text-xs font-bold text-brand-gold-600 bg-brand-gold-50 px-2 py-1 rounded-md border border-brand-gold-100">
                            Save {{ $product->savings_percentage }}%
                        </span>
                    @else
                        <span class="text-3xl font-serif font-bold text-brand-green-900">₹{{ number_format($product->price, 2) }}</span>
                    @endif
                </div>
            </div>

            <!-- Short Description -->
            <p class="text-sm text-brand-green-800/80 leading-relaxed border-t border-brand-green-100/60 pt-4">
                {{ $product->short_description }}
            </p>

            <!-- Quantity & Actions Area -->
            @if($product->in_stock)
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
                                class="flex-1 py-3.5 px-6 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-full font-semibold shadow-md hover:shadow-lg transition-all focus:outline-none flex justify-center items-center gap-2 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            Add to Cart
                        </button>
                        
                        <!-- WhatsApp Buy -->
                        @php
                            $waMessage = "Hello Dr. Sajeev Dev, I would like to order " . $quantity . " x *" . $product->name . "* (" . $product->unit_size . ") priced at ₹" . number_format($product->active_price * $quantity, 2) . ". Please guide me with payment details. Product link: " . request()->url();
                            $waUrl = "https://wa.me/917736609299?text=" . urlencode($waMessage);
                        @endphp
                        <a href="{{ $waUrl }}" target="_blank" 
                           class="flex-1 py-3.5 px-6 border-2 border-green-600 bg-green-50 text-green-700 hover:bg-green-100 rounded-full font-semibold flex items-center justify-center gap-2 transition-all text-sm">
                            <svg class="w-4 h-4 fill-current text-green-600" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                            </svg>
                            Buy via WhatsApp
                        </a>
                        
                        <!-- Share -->
                        <button @click="if (navigator.share) { navigator.share({ title: '{{ addslashes($product->name) }}', url: '{{ request()->url() }}' }) } else { navigator.clipboard.writeText('{{ request()->url() }}'); window.dispatchEvent(new CustomEvent('notify', { detail: [{ message: 'Link copied to clipboard!' }] })); }" 
                                class="py-3.5 px-4 border border-brand-green-200 bg-white text-brand-green-800 hover:bg-brand-green-50 rounded-full font-semibold flex items-center justify-center shadow-sm transition-all text-sm group" title="Share this product">
                            <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Tabs Segment (Alpine.js) -->
            <div class="border-t border-brand-green-100/60 pt-6" x-data="{ activeTab: 'benefits' }">
                <!-- Tab Headers -->
                <div class="flex border-b border-brand-green-100/50 gap-4 sm:gap-8">
                    <button @click="activeTab = 'benefits'" 
                            class="pb-3 text-xs sm:text-sm font-semibold focus:outline-none transition-all uppercase tracking-wider border-b-2"
                            :class="activeTab === 'benefits' ? 'border-brand-gold-500 text-brand-green-900' : 'border-transparent text-brand-green-700/50 hover:text-brand-green-800'">
                        Benefits
                    </button>
                    <button @click="activeTab = 'ingredients'" 
                            class="pb-3 text-xs sm:text-sm font-semibold focus:outline-none transition-all uppercase tracking-wider border-b-2"
                            :class="activeTab === 'ingredients' ? 'border-brand-gold-500 text-brand-green-900' : 'border-transparent text-brand-green-700/50 hover:text-brand-green-800'">
                        Ingredients
                    </button>
                    <button @click="activeTab = 'usage'" 
                            class="pb-3 text-xs sm:text-sm font-semibold focus:outline-none transition-all uppercase tracking-wider border-b-2"
                            :class="activeTab === 'usage' ? 'border-brand-gold-500 text-brand-green-900' : 'border-transparent text-brand-green-700/50 hover:text-brand-green-800'">
                        Directions
                    </button>
                </div>

                <!-- Tab Panels -->
                <div class="py-4 text-xs sm:text-sm text-brand-green-800/80 leading-relaxed font-medium">
                    <!-- Benefits Panel -->
                    <div x-show="activeTab === 'benefits'" x-transition>
                        <p class="whitespace-pre-line text-left">{{ $details['benefits'] ?? 'Clinical benefits documentation coming soon.' }}</p>
                    </div>

                    <!-- Ingredients Panel -->
                    <div x-show="activeTab === 'ingredients'" x-transition style="display: none;">
                        <p class="whitespace-pre-line text-left">{{ $details['ingredients'] ?? 'Pure clinical-grade herbs formulate this remedy.' }}</p>
                    </div>

                    <!-- Usage Panel -->
                    <div x-show="activeTab === 'usage'" x-transition style="display: none;">
                        <p class="whitespace-pre-line text-left">{{ $details['usage'] ?? 'Refer to primary packaging or consult Dr. Sajeev Dev for directions.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
