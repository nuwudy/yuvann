<div class="bg-[#faf9f6] min-h-screen py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="flex text-xs text-brand-green-800/60 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="/" class="hover:text-brand-gold-600 transition-colors">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <span class="mx-2 text-gray-400">/</span>
                        <span class="text-brand-green-900 font-medium">Wellness Journal</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Hero Banner -->
        <div class="relative rounded-3xl overflow-hidden bg-brand-green-900 text-white p-8 sm:p-12 lg:p-16 mb-12 shadow-xl border border-brand-gold-500/20">
            <!-- Decorative background pattern -->
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#c89d53_1px,transparent_1px)] [background-size:16px_16px]"></div>
            
            <div class="relative z-10 max-w-3xl space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-gold-500/20 border border-brand-gold-400/40 text-brand-gold-300 text-xs font-semibold uppercase tracking-widest">
                    <span>🌿</span>
                    <span>Ayurvedic Wisdom & Product Introductions</span>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-white tracking-tight leading-tight">
                    The Yuvann <span class="italic font-light text-brand-gold-300">Wellness Journal</span>
                </h1>
                <p class="text-sm sm:text-base text-brand-green-100/80 leading-relaxed font-light">
                    Explore clinically grounded tips, lifestyle rituals, and product spotlights from Dr. Sajeev Dev designed to harmonize your mind, body, and daily vitality.
                </p>
            </div>
        </div>

        <!-- Category Pills & Search Controls -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">
            <!-- Category Pills -->
            <div class="flex flex-wrap gap-2 items-center">
                <button wire:click="selectCategory('all')" 
                        class="px-4 py-2 rounded-full text-xs font-medium transition-all shadow-xs {{ $selectedCategory === 'all' ? 'bg-brand-green-900 text-white shadow-md' : 'bg-white text-brand-green-800 hover:bg-brand-green-50 border border-brand-green-100' }}">
                    All Articles
                </button>
                @foreach($categories as $cat)
                    <button wire:click="selectCategory('{{ $cat }}')" 
                            class="px-4 py-2 rounded-full text-xs font-medium transition-all shadow-xs {{ $selectedCategory === $cat ? 'bg-brand-green-900 text-white shadow-md' : 'bg-white text-brand-green-800 hover:bg-brand-green-50 border border-brand-green-100' }}">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>

            <!-- Search Field -->
            <div class="relative w-full md:w-72">
                <input type="text" wire:model.live.debounce.300ms="search" 
                       placeholder="Search tips, herbs, remedies..." 
                       class="w-full bg-white border border-brand-green-100 rounded-full py-2 pl-10 pr-4 text-xs focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900 shadow-xs">
                <svg class="h-4 w-4 text-brand-green-600 absolute left-3.5 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>

        <!-- Featured Post Spotlight (When on first page without search) -->
        @if($featuredPost)
            <div class="mb-14">
                <div class="group relative rounded-2xl overflow-hidden bg-white border border-brand-green-100 shadow-lg hover:shadow-xl transition-all duration-300 grid grid-cols-1 lg:grid-cols-12">
                    <!-- Image -->
                    <div class="lg:col-span-7 relative h-72 sm:h-96 lg:h-auto overflow-hidden bg-gray-100">
                        <img src="{{ $featuredPost->featured_image_url }}" alt="{{ $featuredPost->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-brand-gold-500 text-brand-green-950 shadow-md">
                                Featured Guide
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="lg:col-span-5 p-6 sm:p-8 lg:p-10 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 text-xs text-brand-green-700/70">
                                <span class="font-semibold text-brand-green-900">{{ $featuredPost->category }}</span>
                                <span>•</span>
                                <span>{{ $featuredPost->read_time }}</span>
                                <span>•</span>
                                <span>{{ $featuredPost->published_at ? $featuredPost->published_at->format('M d, Y') : $featuredPost->created_at->format('M d, Y') }}</span>
                            </div>

                            <h2 class="text-2xl sm:text-3xl font-serif font-bold text-brand-green-900 group-hover:text-brand-gold-600 transition-colors leading-snug">
                                <a href="/blog/{{ $featuredPost->slug }}">
                                    {{ $featuredPost->title }}
                                </a>
                            </h2>

                            <p class="text-xs sm:text-sm text-brand-green-900/75 line-clamp-3 leading-relaxed">
                                {{ $featuredPost->excerpt }}
                            </p>

                            <!-- Featured Products Badge if any -->
                            @if($featuredPost->products->isNotEmpty())
                                <div class="pt-2">
                                    <span class="text-[11px] font-semibold text-brand-green-900 uppercase tracking-wider block mb-1.5">
                                        Introduced Remedies:
                                    </span>
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach($featuredPost->products as $p)
                                            <span class="inline-flex items-center gap-1 text-[11px] bg-brand-green-50 text-brand-green-900 border border-brand-green-200/80 px-2.5 py-1 rounded-full font-medium">
                                                <span>🌿</span>
                                                <span>{{ $p->name }}</span>
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="pt-6 border-t border-brand-green-100 flex items-center justify-between mt-6">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-brand-green-800 text-brand-gold-300 flex items-center justify-center text-xs font-bold font-serif">
                                    SD
                                </div>
                                <span class="text-xs font-medium text-brand-green-900">{{ $featuredPost->author_name }}</span>
                            </div>
                            <a href="/blog/{{ $featuredPost->slug }}" 
                               class="inline-flex items-center gap-1 text-xs font-semibold text-brand-green-800 hover:text-brand-gold-600 transition-colors">
                                <span>Read Full Guide</span>
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Articles Grid -->
        @if($posts->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="group bg-white rounded-2xl overflow-hidden border border-brand-green-100 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col h-full">
                        <!-- Card Image -->
                        <a href="/blog/{{ $post->slug }}" class="relative block h-52 overflow-hidden bg-gray-100">
                            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                            <div class="absolute top-3 left-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-white/95 backdrop-blur-xs text-brand-green-900 shadow-xs border border-brand-green-100">
                                    {{ $post->category }}
                                </span>
                            </div>
                        </a>

                        <!-- Card Body -->
                        <div class="p-6 flex flex-col flex-grow justify-between space-y-4">
                            <div class="space-y-2.5">
                                <div class="flex items-center gap-2 text-[11px] text-gray-500">
                                    <span>{{ $post->read_time }}</span>
                                    <span>•</span>
                                    <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                                </div>

                                <h3 class="text-lg font-serif font-bold text-brand-green-900 group-hover:text-brand-gold-600 transition-colors line-clamp-2">
                                    <a href="/blog/{{ $post->slug }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <p class="text-xs text-brand-green-900/70 line-clamp-3 leading-relaxed">
                                    {{ $post->excerpt }}
                                </p>
                            </div>

                            <!-- Introduced Products pill if any -->
                            @if($post->products->isNotEmpty())
                                <div class="pt-2 border-t border-brand-green-50">
                                    <span class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider block mb-1">Featured In Article:</span>
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($post->products->take(2) as $p)
                                            <span class="inline-flex items-center gap-1 text-[10px] bg-brand-gold-50 text-brand-green-900 border border-brand-gold-200/60 px-2 py-0.5 rounded-md truncate max-w-[140px]">
                                                ✨ {{ $p->name }}
                                            </span>
                                        @endforeach
                                        @if($post->products->count() > 2)
                                            <span class="text-[10px] text-gray-400 self-center">+{{ $post->products->count() - 2 }} more</span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Footer -->
                            <div class="pt-4 border-t border-brand-green-100 flex items-center justify-between">
                                <span class="text-xs font-medium text-brand-green-800">{{ $post->author_name }}</span>
                                <a href="/blog/{{ $post->slug }}" class="text-xs font-semibold text-brand-gold-600 hover:text-brand-gold-700 flex items-center gap-1">
                                    <span>Read</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $posts->links() }}
            </div>
        @else
            <!-- Empty state -->
            <div class="text-center py-16 bg-white rounded-2xl border border-brand-green-100 p-8">
                <span class="text-4xl mb-3 block">🌿</span>
                <h3 class="text-lg font-serif font-bold text-brand-green-900">No wellness articles found</h3>
                <p class="text-xs text-gray-500 mt-1 max-w-sm mx-auto">
                    Try adjusting your search or filtering by another category to discover tips and natural formulations.
                </p>
                <button wire:click="selectCategory('all'); $set('search', '');" class="mt-4 inline-flex items-center px-4 py-2 bg-brand-green-800 text-white text-xs font-semibold rounded-full hover:bg-brand-green-700 transition-colors">
                    View All Articles
                </button>
            </div>
        @endif

    </div>
</div>
