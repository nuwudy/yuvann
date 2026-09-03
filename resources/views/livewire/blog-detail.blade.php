<div class="bg-[#faf9f6] min-h-screen py-10" x-data="{ copied: false }">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-xs text-brand-green-800/60 mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="/" class="hover:text-brand-gold-600 transition-colors">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <span class="mx-2 text-gray-400">/</span>
                        <a href="/blog" class="hover:text-brand-gold-600 transition-colors">Wellness Journal</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <span class="mx-2 text-gray-400">/</span>
                        <a href="/blog?category={{ urlencode($post->category) }}" class="hover:text-brand-gold-600 transition-colors">{{ $post->category }}</a>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Article Header -->
        <header class="space-y-4 mb-8">
            <div class="flex flex-wrap items-center gap-2">
                <a href="/blog?category={{ urlencode($post->category) }}" 
                   class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-brand-gold-100 text-brand-green-900 border border-brand-gold-300/60 hover:bg-brand-gold-200 transition-colors">
                    {{ $post->category }}
                </a>
                <span class="text-xs text-gray-400">•</span>
                <span class="text-xs text-gray-500">{{ $post->read_time }}</span>
                <span class="text-xs text-gray-400">•</span>
                <span class="text-xs text-gray-500">{{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-brand-green-900 leading-tight">
                {{ $post->title }}
            </h1>

            @if($post->excerpt)
                <p class="text-base sm:text-lg text-brand-green-900/80 font-light leading-relaxed">
                    {{ $post->excerpt }}
                </p>
            @endif

            <!-- Author & Share Bar -->
            <div class="pt-4 border-t border-b border-brand-green-100 py-3.5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <!-- Author Info -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-brand-green-800 text-brand-gold-300 flex items-center justify-center font-bold font-serif text-sm border border-brand-gold-500/40 shadow-xs">
                        SD
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-brand-green-900">
                            {{ $post->author_name }}
                        </div>
                        <div class="text-xs text-brand-green-800/70">
                            {{ $post->author_title ?: 'Chief Ayurvedic Consultant' }}
                        </div>
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="flex items-center gap-2">
                    <span class="text-xs text-gray-400 font-medium mr-1">Share:</span>
                    <!-- WhatsApp Share -->
                    <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' - ' . url()->current()) }}" 
                       target="_blank" 
                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100 transition-colors"
                       title="Share on WhatsApp">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                            <path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/>
                        </svg>
                        <span>WhatsApp</span>
                    </a>

                    <!-- Copy Link -->
                    <button type="button" 
                            @click="navigator.clipboard.writeText(window.location.href); copied = true; setTimeout(() => copied = false, 2000)"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium bg-white text-gray-700 border border-gray-200 hover:bg-gray-50 transition-colors"
                            title="Copy link">
                        <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <span x-text="copied ? 'Copied!' : 'Copy Link'"></span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        @if($post->featured_image)
            <div class="mb-10 rounded-2xl overflow-hidden shadow-lg border border-brand-green-100 max-h-[460px] bg-gray-100">
                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Article Prose Content -->
        <article class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-brand-green-100 mb-12">
            <style>
                .blog-prose h2 {
                    font-family: 'Playfair Display', serif;
                    font-size: 1.65rem;
                    font-weight: 700;
                    color: #1a2a22;
                    margin-top: 2rem;
                    margin-bottom: 0.85rem;
                    line-height: 1.3;
                }
                .blog-prose h3 {
                    font-family: 'Playfair Display', serif;
                    font-size: 1.3rem;
                    font-weight: 600;
                    color: #1a2a22;
                    margin-top: 1.5rem;
                    margin-bottom: 0.5rem;
                }
                .blog-prose p {
                    font-size: 1rem;
                    line-height: 1.8;
                    color: #2c3e34;
                    margin-bottom: 1.25rem;
                }
                .blog-prose p.lead {
                    font-size: 1.15rem;
                    font-weight: 400;
                    color: #1a2a22;
                    line-height: 1.85;
                    border-left: 3px solid #c89d53;
                    padding-left: 1rem;
                    font-style: italic;
                    margin-bottom: 1.75rem;
                }
                .blog-prose ul, .blog-prose ol {
                    margin-bottom: 1.25rem;
                    padding-left: 1.5rem;
                    color: #2c3e34;
                    line-height: 1.8;
                }
                .blog-prose ul {
                    list-style-type: disc;
                }
                .blog-prose ol {
                    list-style-type: decimal;
                }
                .blog-prose li {
                    margin-bottom: 0.5rem;
                }
                .blog-prose .ayurveda-tip-box {
                    background-color: #f3f8f4;
                    border: 1px solid #b7dbbf;
                    border-left: 5px solid #235338;
                    border-radius: 0.75rem;
                    padding: 1.25rem 1.5rem;
                    margin: 2rem 0;
                }
                .blog-prose .ayurveda-tip-box strong {
                    color: #1a422b;
                    display: block;
                    font-size: 0.95rem;
                    margin-bottom: 0.35rem;
                }
                .blog-prose .ayurveda-tip-box p {
                    margin-bottom: 0;
                    font-size: 0.95rem;
                    color: #1e3f2d;
                }
            </style>

            <div class="blog-prose">
                {!! $post->content !!}
            </div>
        </article>

        <!-- FEATURED / INTRODUCED PRODUCTS SPOTLIGHT -->
        @if($post->products->isNotEmpty())
            <section class="bg-gradient-to-br from-amber-50/70 via-white to-brand-green-50/50 rounded-3xl p-6 sm:p-10 border border-brand-gold-500/30 shadow-md mb-12">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-6">
                    <div>
                        <div class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-gold-700 uppercase tracking-wider">
                            <span>🌿</span>
                            <span>Doctor-Formulated Remedies</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-serif font-bold text-brand-green-900 mt-1">
                            Featured in this Article
                        </h2>
                    </div>
                    <p class="text-xs text-gray-500 max-w-xs">
                        Pure formulations mentioned above to help you seamlessly integrate these wellness tips into your daily routine.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($post->products as $product)
                        <div class="bg-white rounded-2xl p-5 border border-brand-green-100 shadow-sm hover:shadow-md transition-all flex flex-col justify-between group">
                            <div>
                                <div class="relative h-44 rounded-xl overflow-hidden bg-gray-50 mb-4 border border-gray-100">
                                    <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    
                                    @if($product->is_on_sale)
                                        <span class="absolute top-2.5 left-2.5 bg-brand-gold-500 text-brand-green-950 font-bold text-[10px] px-2 py-0.5 rounded-full shadow-xs uppercase tracking-wider">
                                            {{ $product->savings_percentage }}% OFF
                                        </span>
                                    @endif

                                    @if(!$product->in_stock)
                                        <span class="absolute top-2.5 right-2.5 bg-red-600 text-white font-bold text-[10px] px-2 py-0.5 rounded-full shadow-xs">
                                            Out of Stock
                                        </span>
                                    @endif
                                </div>

                                <div class="space-y-1">
                                    <div class="text-[11px] text-brand-gold-700 font-semibold uppercase tracking-wider">
                                        {{ $product->unit_size }}
                                    </div>
                                    <h3 class="font-serif font-bold text-base text-brand-green-900 group-hover:text-brand-gold-600 transition-colors line-clamp-1">
                                        <a href="/products/{{ $product->slug }}">
                                            {{ $product->name }}
                                        </a>
                                    </h3>
                                    @if($product->short_description)
                                        <p class="text-xs text-gray-500 line-clamp-2 mt-1">
                                            {{ $product->short_description }}
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="pt-4 mt-4 border-t border-gray-100 flex items-center justify-between">
                                <div>
                                    <div class="text-xs text-gray-400 font-normal">Price:</div>
                                    <div class="flex items-baseline gap-1.5">
                                        <span class="text-base font-bold text-brand-green-900">
                                            ₹{{ number_format($product->active_price, 2) }}
                                        </span>
                                        @if($product->is_on_sale)
                                            <span class="text-xs text-gray-400 line-through">
                                                ₹{{ number_format($product->price, 2) }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <a href="/products/{{ $product->slug }}" 
                                       class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-brand-green-900 text-xs font-semibold rounded-lg transition-colors">
                                        Details
                                    </a>
                                    @if($product->in_stock)
                                        <button type="button" 
                                                wire:click="addToCart({{ $product->id }})" 
                                                class="px-3.5 py-1.5 bg-brand-green-800 hover:bg-brand-green-700 text-white text-xs font-semibold rounded-lg shadow-sm hover:shadow transition-all flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                            </svg>
                                            <span>Add to Cart</span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- WhatsApp Doctor Consultation Banner -->
        <div class="rounded-2xl bg-brand-green-900 text-white p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6 shadow-lg mb-14 border border-brand-gold-500/30">
            <div class="space-y-1 text-center sm:text-left">
                <span class="text-xs text-brand-gold-400 font-semibold tracking-wider uppercase">Direct Doctor Guidance</span>
                <h3 class="text-xl font-serif font-bold text-white">Have questions about this wellness tip?</h3>
                <p class="text-xs text-brand-green-100/80 max-w-md">
                    Connect directly with Dr. Sajeev Dev for personalized Ayurvedic advice tailored to your body constitution.
                </p>
            </div>
            <a href="https://wa.me/917736609299?text={{ urlencode('Hi Dr. Sajeev, I just read your article "' . $post->title . '" and would like to ask a question.') }}" 
               target="_blank" 
               class="px-5 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-brand-green-950 text-xs font-bold rounded-full shadow-md hover:scale-105 transition-all flex-shrink-0 flex items-center gap-2">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/>
                </svg>
                <span>Consult on WhatsApp</span>
            </a>
        </div>

        <!-- Related Articles -->
        @if($relatedPosts->isNotEmpty())
            <section class="mb-14">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl sm:text-2xl font-serif font-bold text-brand-green-900">
                        Continue Reading
                    </h2>
                    <a href="/blog" class="text-xs font-semibold text-brand-gold-600 hover:text-brand-gold-700 flex items-center gap-1">
                        <span>All Guides</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $rel)
                        <a href="/blog/{{ $rel->slug }}" class="group bg-white rounded-2xl overflow-hidden border border-brand-green-100 shadow-xs hover:shadow-md transition-all flex flex-col">
                            <div class="h-36 overflow-hidden bg-gray-100">
                                <img src="{{ $rel->featured_image_url }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-4 flex flex-col justify-between flex-grow">
                                <div class="space-y-1.5">
                                    <span class="text-[10px] font-semibold text-brand-gold-700 uppercase tracking-wider block">
                                        {{ $rel->category }}
                                    </span>
                                    <h4 class="font-serif font-bold text-sm text-brand-green-900 group-hover:text-brand-gold-600 transition-colors line-clamp-2">
                                        {{ $rel->title }}
                                    </h4>
                                </div>
                                <span class="text-[11px] text-gray-400 mt-3 block">
                                    {{ $rel->read_time }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Back to Blog Button -->
        <div class="text-center">
            <a href="/blog" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-brand-green-50 text-brand-green-900 border border-brand-green-200 text-xs font-semibold hover:bg-brand-green-100 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Back to Wellness Journal</span>
            </a>
        </div>

    </div>
</div>
