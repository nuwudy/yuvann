@section('meta')
    <title>You Are Money: A Secret Guide to Financial Freedom – By Dr. Sajeev Dev | Yuvann</title>
    <meta name="description" content="30 years of distilled wisdom by Dr. Sajeev Dev (DBA). Discover practical frameworks to break free from the debt trap, rewire your wealth mindset, and achieve holistic financial peace.">
    <meta property="og:title" content="You Are Money: A Secret Guide to Financial Freedom – By Dr. Sajeev Dev">
    <meta property="og:description" content="Discover why YOU are the primary asset. A transformative, actionable guide to eliminating debt and creating generational wealth.">
    <meta property="og:image" content="https://yuvann.com/storage/products/4859c2b9-6c8e-4058-ac9f-17d1b1217386.webp">
    <meta property="og:url" content="{{ url('/you-are-money') }}">
    <meta property="og:type" content="book">
@endsection

<div x-data="{ notification: null, previewModal: false }" 
     @notify.window="notification = $event.detail[0]; setTimeout(() => notification = null, 3500)"
     class="bg-[#faf9f6] text-brand-green-950 min-h-screen">

    <!-- Toast Notification -->
    <div class="fixed bottom-20 sm:bottom-6 right-6 z-50 transition-all duration-300" 
         x-show="notification" 
         x-transition:enter="transform ease-out duration-300 transition-all"
         x-transition:enter-start="translate-y-4 opacity-0"
         x-transition:enter-end="translate-y-0 opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;">
        <div class="bg-brand-green-950 text-white px-5 py-3.5 rounded-2xl shadow-2xl border-2 border-brand-gold-500/50 flex items-center gap-3">
            <span class="text-brand-gold-400 text-lg">✨</span>
            <span class="text-xs sm:text-sm font-semibold" x-text="notification ? notification.message : ''"></span>
        </div>
    </div>

    <!-- 1. HERO SHOWCASE SECTION -->
    <section class="relative overflow-hidden pt-8 pb-16 lg:py-20 border-b border-brand-green-100/70"
             style="background: linear-gradient(180deg, #0e241b 0%, #153527 60%, #0a1b14 100%); color: #ffffff;">
        
        <!-- Ambient Background Glows -->
        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-brand-gold-500/15 blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 -right-24 w-96 h-96 rounded-full bg-emerald-500/10 blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs text-brand-gold-300/80 mb-6 font-medium">
                <a href="/" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <a href="/products" class="hover:text-white transition-colors">Publications</a>
                <span>/</span>
                <span class="text-white font-semibold">You Are Money</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                
                <!-- Left: 3D Book Showcase & Gallery Switcher -->
                <div class="lg:col-span-5 flex flex-col items-center">
                    <div class="relative group max-w-sm w-full">
                        <!-- Background card halo -->
                        <div class="absolute inset-0 bg-brand-gold-500/20 rounded-3xl blur-xl group-hover:bg-brand-gold-500/30 transition-all duration-500"></div>
                        
                        <!-- Main 3D Book Image Display -->
                        <div class="relative rounded-2xl overflow-hidden border-2 border-brand-gold-500/60 shadow-2xl bg-brand-green-900/60 aspect-[3/4] flex items-center justify-center p-4">
                            <img src="{{ $activeImage }}" 
                                 alt="You Are Money Book by Dr. Sajeev Dev" 
                                 class="w-full h-full object-contain drop-shadow-[0_20px_35px_rgba(0,0,0,0.8)] transition-all duration-500 hover:scale-105">
                            
                            <!-- Bestseller Ribbon -->
                            <div class="absolute top-3 right-3 bg-brand-gold-400 text-brand-green-950 font-black text-[11px] px-3 py-1 rounded-full uppercase tracking-wider shadow-md">
                                ★ National Edition
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Thumbnails -->
                    <div class="flex items-center gap-3 mt-6">
                        @php
                            $gallery = [
                                'https://yuvann.com/storage/products/4859c2b9-6c8e-4058-ac9f-17d1b1217386.webp',
                                'https://yuvann.com/storage/products/950b4a4e-e079-4e6a-99eb-6c5310182f85.webp',
                                'https://yuvann.com/storage/products/1f659dcb-ad90-4c36-8824-fe3f992fac07.webp',
                                'https://yuvann.com/storage/products/6f788026-0fa2-4e7d-b900-9275f76adbd4.webp'
                            ];
                        @endphp
                        @foreach($gallery as $img)
                            <button type="button" 
                                    wire:click="selectImage('{{ $img }}')"
                                    class="w-14 h-16 rounded-xl overflow-hidden border-2 transition-all p-0.5 {{ $activeImage === $img ? 'border-brand-gold-400 scale-105 shadow-md bg-brand-gold-500/20' : 'border-brand-green-800 opacity-60 hover:opacity-100' }}">
                                <img src="{{ $img }}" alt="Preview" class="w-full h-full object-cover rounded-lg">
                            </button>
                        @endforeach
                    </div>

                    <div class="mt-4 text-center text-xs text-brand-green-200/80 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-brand-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Hardcover & Paperback Format • Exclusive Yuvann Distribution</span>
                    </div>
                </div>

                <!-- Right: Book Title, Hook & Instant Purchase Actions -->
                <div class="lg:col-span-7 space-y-6 text-left">
                    
                    <!-- Eyebrow Pill -->
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-xs"
                              style="background-color: #1b4332; color: #f5eed1; border: 1px solid #d4af37;">
                            <span>📖</span>
                            <span>A Secret Guide to Financial Freedom</span>
                        </span>
                        <span class="text-xs text-brand-gold-300 font-medium">By Dr. Sajeev Dev, DBA</span>
                    </div>

                    <!-- Main Catchphrase Headline -->
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-serif font-bold text-white leading-tight" 
                        style="text-shadow: 0 2px 8px rgba(0,0,0,0.5);">
                        You Are Money
                    </h1>

                    <p class="text-base sm:text-xl font-light text-brand-gold-100 leading-relaxed max-w-2xl">
                        Dismantling three decades of financial illusions to unlock your primary wealth-generating asset — <strong class="text-brand-gold-400 font-semibold">Yourself</strong>.
                    </p>

                    <!-- Fast Feature Highlights List -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-xs sm:text-sm text-brand-green-100">
                        <div class="flex items-start gap-2.5">
                            <span class="text-brand-gold-400 text-base">✓</span>
                            <span><strong>30 Years Distilled:</strong> Practical strategies over abstract textbook theory.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-brand-gold-400 text-base">✓</span>
                            <span><strong>Debt Elimination:</strong> Systematic blueprints to extinguish liabilities.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-brand-gold-400 text-base">✓</span>
                            <span><strong>Internal Asset Mindset:</strong> Shift from chasing money to magnetizing it.</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <span class="text-brand-gold-400 text-base">✓</span>
                            <span><strong>Holistic Life Mastery:</strong> End financial anxiety to reclaim physical wellness.</span>
                        </div>
                    </div>

                    <!-- Price & Purchase Action Card -->
                    <div class="p-6 sm:p-7 rounded-2xl border border-brand-gold-500/40 shadow-xl space-y-5"
                         style="background-color: #0b1f17; background: linear-gradient(135deg, #0b1f17 0%, #153527 100%);">
                        
                        <div class="flex flex-wrap items-baseline justify-between gap-4 border-b border-brand-green-800/80 pb-4">
                            <div>
                                <div class="text-xs text-brand-gold-300 uppercase tracking-wider font-semibold">Special Author Edition</div>
                                <div class="flex items-baseline gap-3">
                                    <span class="text-3xl sm:text-4xl font-serif font-bold text-white">₹{{ number_format($price, 2) }}</span>
                                    <span class="text-xs text-emerald-400 font-semibold bg-emerald-950/60 px-2 py-0.5 rounded border border-emerald-500/40">In Stock • Fast Dispatch</span>
                                </div>
                            </div>

                            <!-- Quantity Selector -->
                            <div class="flex items-center gap-3">
                                <span class="text-xs text-brand-green-200">Qty:</span>
                                <div class="inline-flex items-center rounded-full bg-brand-green-900 border border-brand-gold-500/40 p-1 text-white">
                                    <button type="button" wire:click="decrementQty" class="w-8 h-8 rounded-full hover:bg-brand-green-800 flex items-center justify-center text-sm font-bold transition-colors">
                                        −
                                    </button>
                                    <span class="w-8 text-center text-sm font-bold text-brand-gold-300">{{ $quantity }}</span>
                                    <button type="button" wire:click="incrementQty" class="w-8 h-8 rounded-full hover:bg-brand-green-800 flex items-center justify-center text-sm font-bold transition-colors">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row items-center gap-3 pt-1">
                            <!-- Primary WhatsApp Buy Button -->
                            <a href="{{ $waOrderUrl }}" 
                               target="_blank"
                               class="w-full sm:flex-1 inline-flex items-center justify-center gap-2.5 px-6 py-4 rounded-full font-bold text-sm shadow-2xl hover:scale-102 transition-all duration-300"
                               style="background-color: #25D366; color: #07150f;">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/>
                                </svg>
                                <span>Order on WhatsApp (₹{{ number_format($totalPrice, 0) }})</span>
                            </a>

                            <!-- Direct Add to Cart Button -->
                            <button type="button" 
                                    wire:click="addToCart"
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-4 rounded-full font-bold text-sm bg-brand-gold-400 hover:bg-brand-gold-300 text-brand-green-950 shadow-xl transition-all duration-300 hover:scale-102">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                <span>Add to Cart</span>
                            </button>

                            <!-- Buy Now -->
                            <button type="button" 
                                    wire:click="buyNow"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-4 rounded-full font-semibold text-xs text-brand-green-100 hover:text-white border border-brand-green-700 hover:border-brand-gold-400 transition-colors">
                                Checkout &rarr;
                            </button>
                        </div>

                        <!-- Trust Guarantees -->
                        <div class="flex flex-wrap items-center justify-between gap-4 pt-2 text-[11px] text-brand-green-200/80">
                            <span class="flex items-center gap-1.5">
                                <span>📦</span>
                                <span>Secure Pan-India Door Delivery</span>
                            </span>
                            <span class="flex items-center gap-1.5">
                                <span>✍️</span>
                                <span>Author Personalized Copies on Request</span>
                            </span>
                            <span class="flex items-center gap-1.5">
                                <span>🔒</span>
                                <span>Official Yuvann Publishing Guarantee</span>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 2. THE BIG SHIFT: WHY YOU ARE THE MONEY -->
    <section class="py-16 sm:py-24 bg-white border-b border-brand-green-100/80">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center space-y-8">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-gold-100 text-brand-green-900 text-xs font-bold uppercase tracking-wider border border-brand-gold-300">
                <span>💡</span>
                <span>The Fundamental Paradigm Shift</span>
            </div>

            <h2 class="text-3xl sm:text-5xl font-serif font-bold text-brand-green-950 leading-tight">
                "Money Is Not What You Chase in the World.<br>
                <span class="text-brand-gold-600 italic font-normal">Money Is Who You Become at the Core."</span>
            </h2>

            <p class="text-base sm:text-lg text-brand-green-900/80 leading-relaxed font-light text-justify sm:text-center">
                Millions of individuals work themselves into physical exhaustion, debt fatigue, and chronic health breakdown trying to acquire wealth. Yet, true abundance consistently eludes those who treat money as an external prize. 
            </p>

            <div class="p-8 rounded-3xl bg-[#fbfaf8] border border-brand-gold-400/50 shadow-sm text-left space-y-4">
                <h3 class="font-serif font-bold text-xl text-brand-green-900 flex items-center gap-2">
                    <span class="text-brand-gold-500">🗝️</span> The Secret Core Teaching
                </h3>
                <p class="text-sm sm:text-base text-brand-green-900/80 leading-relaxed">
                    In <strong>"You Are Money,"</strong> Dr. Sajeev Dev dismantles the myth that wealth is accidental or exclusively technical. He reveals that every rupee in your possession is an energetic reflection of your personal clarity, self-worth, emotional discipline, and internal resilience. When you align your lifestyle, eliminate mental liabilities, and master your life energy, wealth naturally gravitates and compounds.
                </p>
            </div>
        </div>
    </section>

    <!-- 3. THE 5 CORE PILLARS OF WEALTH MASTERY -->
    <section class="py-16 sm:py-24 bg-[#faf9f6]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-3 mb-16">
                <span class="text-xs font-bold text-brand-gold-600 uppercase tracking-widest">
                    The 5 Pillars of Mastery
                </span>
                <h2 class="text-3xl sm:text-4xl font-serif font-bold text-brand-green-950">
                    What Makes This Guide Completely Different
                </h2>
                <p class="text-sm text-brand-green-900/70">
                    Built on practical execution, behavioral psychology, and holistic wellbeing — not dry financial jargon.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Pillar 1 -->
                <div class="bg-white rounded-3xl p-8 border border-brand-green-100 shadow-xs hover:shadow-md transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-900 flex items-center justify-center text-2xl font-bold">
                            ⏳
                        </div>
                        <h3 class="font-serif font-bold text-xl text-brand-green-950">30 Years of Distilled Wisdom</h3>
                        <p class="text-xs sm:text-sm text-brand-green-900/80 leading-relaxed">
                            The culmination of three decades of rigorous research, trial-and-error, business leadership, and real-world execution condensed into a clear, actionable guide.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-brand-green-50 text-[11px] font-semibold text-brand-gold-600">
                        Zero Fluff • 100% Reality-Tested
                    </div>
                </div>

                <!-- Pillar 2 -->
                <div class="bg-white rounded-3xl p-8 border border-brand-green-100 shadow-xs hover:shadow-md transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-900 flex items-center justify-center text-2xl font-bold">
                            ⛓️
                        </div>
                        <h3 class="font-serif font-bold text-xl text-brand-green-950">Break Free from the Debt Trap</h3>
                        <p class="text-xs sm:text-sm text-brand-green-900/80 leading-relaxed">
                            Practical, step-by-step methodologies to overcome lingering financial liabilities, eliminate high-interest drains, and rebuild sustainable, surplus cash flow.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-brand-green-50 text-[11px] font-semibold text-emerald-700">
                        Systematic Cash-Flow Recovery
                    </div>
                </div>

                <!-- Pillar 3 -->
                <div class="bg-white rounded-3xl p-8 border border-brand-green-100 shadow-xs hover:shadow-md transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-2xl bg-brand-gold-100 text-brand-green-950 flex items-center justify-center text-2xl font-bold">
                            🧠
                        </div>
                        <h3 class="font-serif font-bold text-xl text-brand-green-950">Rewire Your Wealth Mindset</h3>
                        <p class="text-xs sm:text-sm text-brand-green-900/80 leading-relaxed">
                            Understand why you are the primary asset. Unlock your dormant internal potential to attract, expand, and retain wealth effortlessly and ethically.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-brand-green-50 text-[11px] font-semibold text-brand-gold-600">
                        Subconscious Wealth Reprogramming
                    </div>
                </div>

                <!-- Pillar 4 -->
                <div class="bg-white rounded-3xl p-8 border border-brand-green-100 shadow-xs hover:shadow-md transition-all duration-300 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-900 flex items-center justify-center text-2xl font-bold">
                            🗺️
                        </div>
                        <h3 class="font-serif font-bold text-xl text-brand-green-950">Actionable Roadmaps Over Abstract Theory</h3>
                        <p class="text-xs sm:text-sm text-brand-green-900/80 leading-relaxed">
                            Direct strategies designed for everyday people, entrepreneurs, and professionals seeking genuine financial sovereignty and peace of mind.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-brand-green-50 text-[11px] font-semibold text-blue-800">
                        Checklists & Real-World Audits
                    </div>
                </div>

                <!-- Pillar 5 -->
                <div class="bg-white rounded-3xl p-8 border border-brand-green-100 shadow-xs hover:shadow-md transition-all duration-300 space-y-4 flex flex-col justify-between lg:col-span-2">
                    <div class="space-y-3">
                        <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-900 flex items-center justify-center text-2xl font-bold">
                            🧘
                        </div>
                        <h3 class="font-serif font-bold text-xl text-brand-green-950">Holistic Life & Wealth Mastery</h3>
                        <p class="text-xs sm:text-sm text-brand-green-900/80 leading-relaxed">
                            Designed to work hand-in-hand with your personal wellness journey. Chronic financial anxiety destroys your body, sleep, and relationships. By stabilizing your financial foundation, you foster a worry-free, disease-free future.
                        </p>
                    </div>
                    <div class="pt-3 border-t border-brand-green-50 text-[11px] font-semibold text-purple-800">
                        Health + Wealth Integration
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. BOOK OVERVIEW & WHAT READERS DISCOVER -->
    <section class="py-16 sm:py-24 bg-white border-y border-brand-green-100/70">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                <div class="md:col-span-5">
                    <div class="rounded-3xl overflow-hidden border-2 border-brand-gold-500/40 shadow-xl aspect-square bg-[#0e241b] p-6 flex items-center justify-center">
                        <img src="https://yuvann.com/storage/products/950b4a4e-e079-4e6a-99eb-6c5310182f85.webp" 
                             alt="Book Spine and Detail" 
                             class="w-full h-full object-contain drop-shadow-2xl">
                    </div>
                </div>

                <div class="md:col-span-7 space-y-5 text-left">
                    <span class="text-xs font-bold text-brand-gold-600 uppercase tracking-widest block">Detailed Book Overview</span>
                    <h2 class="text-3xl sm:text-4xl font-serif font-bold text-brand-green-950">
                        A Masterclass Between Two Covers
                    </h2>
                    <p class="text-sm sm:text-base text-brand-green-900/80 leading-relaxed font-light">
                        In <strong>"You Are Money,"</strong> Dr. Sajeev Dev bridges psychology, practical asset discipline, and life-energy management to help readers transform their relationship with wealth. 
                    </p>
                    <p class="text-sm sm:text-base text-brand-green-900/80 leading-relaxed font-light">
                        Rather than lecturing on obscure derivatives or Wall Street formulas, Dr. Dev speaks directly to the realities of everyday family economics, recurring debts, entrepreneurial risk, and the vital mindset required to maintain financial serenity.
                    </p>

                    <!-- Interactive Practical Features -->
                    <div class="space-y-3 pt-2">
                        <div class="p-4 rounded-xl bg-amber-50/70 border border-amber-200/80 flex items-start gap-3">
                            <span class="text-amber-800 text-lg">📝</span>
                            <div>
                                <h4 class="font-bold text-xs sm:text-sm text-amber-950">Active Reading & Personal Checklists</h4>
                                <p class="text-xs text-amber-900/80 leading-relaxed mt-0.5">Keep a dedicated journal to complete the self-assessment exercises and personal wealth audit checklists at the end of each chapter.</p>
                            </div>
                        </div>

                        <div class="p-4 rounded-xl bg-emerald-50/70 border border-emerald-200/80 flex items-start gap-3">
                            <span class="text-emerald-800 text-lg">🎯</span>
                            <div>
                                <h4 class="font-bold text-xs sm:text-sm text-emerald-950">Implement One System at a Time</h4>
                                <p class="text-xs text-emerald-900/80 leading-relaxed mt-0.5">Focus on implementing one financial milestone strategy before advancing to the next, building compounding momentum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 5. TARGET AUDIENCE: WHO MUST READ THIS -->
    <section class="py-16 sm:py-24 bg-[#faf9f6]">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto space-y-3 mb-14">
                <span class="text-xs font-bold text-brand-gold-600 uppercase tracking-widest">
                    Who This Book Is For
                </span>
                <h2 class="text-3xl sm:text-4xl font-serif font-bold text-brand-green-950">
                    Are You Facing Any of These Situations?
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-brand-green-100 shadow-xs space-y-2">
                    <div class="text-2xl">💸</div>
                    <h4 class="font-serif font-bold text-base text-brand-green-950">Stuck in Month-End Anxiety</h4>
                    <p class="text-xs text-brand-green-900/70 leading-relaxed">
                        Earn well but feel money slipping away before the month closes, leaving little to invest or preserve.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-brand-green-100 shadow-xs space-y-2">
                    <div class="text-2xl">📊</div>
                    <h4 class="font-serif font-bold text-base text-brand-green-950">Ambitious Entrepreneurs</h4>
                    <p class="text-xs text-brand-green-900/70 leading-relaxed">
                        Navigating business bottlenecks, seeking to build multiple robust revenue streams and sustainable operational cash flow.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-brand-green-100 shadow-xs space-y-2">
                    <div class="text-2xl">⚡</div>
                    <h4 class="font-serif font-bold text-base text-brand-green-950">Breaking Lingering Liabilities</h4>
                    <p class="text-xs text-brand-green-900/70 leading-relaxed">
                        Struggling with credit cards, compounding loans, or emotional debt patterns that feel impossible to overturn.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-brand-green-100 shadow-xs space-y-2">
                    <div class="text-2xl">🌱</div>
                    <h4 class="font-serif font-bold text-base text-brand-green-950">Holistic Wellness Seekers</h4>
                    <p class="text-xs text-brand-green-900/70 leading-relaxed">
                        Anyone who recognizes that financial instability causes sleep deprivation, hormonal distress, and chronic illness.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-brand-green-100 shadow-xs space-y-2">
                    <div class="text-2xl">🎁</div>
                    <h4 class="font-serif font-bold text-base text-brand-green-950">The Ultimate Empowering Gift</h4>
                    <p class="text-xs text-brand-green-900/70 leading-relaxed">
                        An empowering, life-altering gift for students, graduating professionals, newlyweds, and ambitious team members.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-brand-green-100 shadow-xs space-y-2">
                    <div class="text-2xl">🏰</div>
                    <h4 class="font-serif font-bold text-base text-brand-green-950">Generational Legacy Builders</h4>
                    <p class="text-xs text-brand-green-900/70 leading-relaxed">
                        Those determined to break poverty patterns and gift true financial literacy to their children and future generations.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. ABOUT THE AUTHOR -->
    <section class="py-16 sm:py-24 bg-white border-t border-brand-green-100/70">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="rounded-3xl p-8 sm:p-12 border border-brand-green-100 bg-[#fbfaf8] shadow-sm flex flex-col md:flex-row items-center gap-8 text-center md:text-left">
                <div class="w-36 h-36 sm:w-44 sm:h-44 rounded-full overflow-hidden border-4 border-brand-gold-500/30 flex-shrink-0 shadow-lg">
                    <img src="https://yuvann.com/storage/media/1efcda7f-d369-40dc-aae9-81be1320217d.webp" 
                         alt="Dr. Sajeev Dev, DBA" 
                         class="w-full h-full object-cover">
                </div>

                <div class="space-y-3">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-gold-100 text-brand-green-900 text-xs font-bold uppercase tracking-wider">
                        <span>✍️</span>
                        <span>Meet The Author</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-serif font-bold text-brand-green-950">
                        Dr. Sajeev Dev, <span class="text-brand-gold-600 font-normal">DBA</span>
                    </h3>
                    <p class="text-xs sm:text-sm font-semibold text-brand-green-800">
                        Doctorate in Business Administration • Traditional Lineage Vaidhyan • Certified Healthcare Provider (QCI)
                    </p>
                    <p class="text-xs sm:text-sm text-brand-green-900/80 leading-relaxed font-light">
                        With over three decades of immersion in executive leadership, holistic traditional medicine, and mindset coaching, Dr. Sajeev Dev brings a unique, grounded perspective to financial sovereignty. As the founder of Yuvann Wellness Concepts, he demonstrates that real prosperity is the natural consequence of internal vitality, self-mastery, and clear ethical action.
                    </p>
                    <div class="pt-2">
                        <a href="/dr-sajeev-dev" class="text-xs font-bold text-brand-gold-600 hover:text-brand-gold-700 underline flex items-center justify-center md:justify-start gap-1">
                            <span>Read Full Author Profile & Credentials</span>
                            <span>&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. FINAL HIGH-CONVERTING ORDER BOX -->
    <section class="py-16 sm:py-20 bg-[#faf9f6]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <div class="relative rounded-3xl p-8 sm:p-12 shadow-2xl border-2 border-brand-gold-500 overflow-hidden text-center space-y-6"
                 style="background-color: #0e241b !important; background: linear-gradient(135deg, #0e241b 0%, #173d2d 50%, #07150f 100%) !important; color: #ffffff !important;">
                
                <div class="absolute -right-20 -top-20 w-80 h-80 rounded-full bg-brand-gold-500/20 blur-2xl pointer-events-none"></div>

                <div class="relative z-10 max-w-2xl mx-auto space-y-5">
                    <span class="inline-flex items-center gap-1.5 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider"
                          style="background-color: #153527; color: #f5eed1; border: 1px solid #d4af37;">
                        <span>📚</span>
                        <span>Invest in Your Lifetime Freedom</span>
                    </span>

                    <h2 class="text-2xl sm:text-4xl font-serif font-bold leading-tight" 
                        style="color: #ffffff !important; text-shadow: 0 2px 8px rgba(0,0,0,0.5);">
                        Claim Your Copy of "You Are Money" Today
                    </h2>

                    <p class="text-sm sm:text-base leading-relaxed font-light" style="color: #e1ede6 !important;">
                        Available in Hardcover & Paperback. Direct dispatch to your doorstep across India. Fast 1-click WhatsApp order confirmation.
                    </p>

                    <div class="text-3xl sm:text-4xl font-serif font-bold text-brand-gold-300">
                        ₹{{ number_format($price, 2) }}
                    </div>

                    <!-- Dual CTAs -->
                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ $waOrderUrl }}" 
                           target="_blank"
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 font-bold text-sm sm:text-base rounded-full shadow-2xl hover:scale-105 transition-all duration-300"
                           style="background-color: #25D366 !important; color: #07150f !important;">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/>
                            </svg>
                            <span>Order Copy on WhatsApp</span>
                        </a>

                        <button type="button" 
                                wire:click="addToCart"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 font-bold text-sm sm:text-base rounded-full shadow-2xl hover:scale-105 transition-all duration-300"
                                style="background-color: #d4af37 !important; color: #07150f !important;">
                            <span>🛒 Add to Cart & Buy Online</span>
                        </button>
                    </div>

                    <!-- Direct Phone Queries -->
                    <div class="pt-4 text-xs flex flex-wrap items-center justify-center gap-4"
                         style="border-top: 1px solid rgba(212, 175, 55, 0.3) !important; color: #c2dbc9 !important;">
                        <span>For Bulk / Signed Inquiries:</span>
                        <a href="tel:+917736609299" class="underline font-bold hover:text-brand-gold-300" style="color: #ffffff !important;">
                            📞 77366 09299
                        </a>
                        <span class="text-brand-gold-500">|</span>
                        <a href="tel:+919447365545" class="underline font-bold hover:text-brand-gold-300" style="color: #ffffff !important;">
                            📞 94473 65545
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. STICKY BOTTOM BAR (MOBILE ONLY) -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 z-40 p-3 bg-brand-green-950/95 backdrop-blur-md border-t border-brand-gold-500/40 shadow-2xl flex items-center justify-between gap-3">
        <div class="flex items-center gap-2.5">
            <img src="{{ $activeImage }}" alt="Thumbnail" class="w-10 h-12 object-cover rounded shadow border border-brand-gold-400">
            <div>
                <div class="text-[10px] text-brand-gold-300 font-bold uppercase">You Are Money</div>
                <div class="text-sm font-bold text-white">₹{{ number_format($price, 0) }}</div>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ $waOrderUrl }}" 
               target="_blank"
               class="px-4 py-2.5 rounded-full text-xs font-bold text-brand-green-950 bg-emerald-400 flex items-center gap-1.5 shadow-md">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/></svg>
                <span>WhatsApp</span>
            </a>
            <button type="button" 
                    wire:click="addToCart"
                    class="px-3.5 py-2.5 rounded-full text-xs font-bold text-brand-green-950 bg-brand-gold-400 shadow-md">
                + Cart
            </button>
        </div>
    </div>

</div>
