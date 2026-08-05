<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Yuvann Admin Dashboard' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="h-full bg-[#f4f3ef] text-[#1a2a22]">
    <div class="min-h-full flex" x-data="{ sidebarOpen: false }">
        
        <!-- Mobile Sidebar Overlay -->
        <div class="fixed inset-0 z-40 flex md:hidden" role="dialog" aria-modal="true" x-show="sidebarOpen" style="display: none;">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity" @click="sidebarOpen = false"></div>
            
            <div class="relative flex-1 flex flex-col max-w-xs w-full bg-brand-green-900 focus:outline-none">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-shrink-0 flex items-center px-4">
                        <span class="text-xl font-serif text-brand-gold-100 tracking-tight">Yuvann Admin</span>
                    </div>
                    <nav class="mt-5 px-2 space-y-1">
                        <a href="/admin/products" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-white bg-brand-green-800">
                            Products
                        </a>
                        <a href="/admin/categories" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-brand-green-100 hover:bg-brand-green-800">
                            Categories
                        </a>
                        <a href="/admin/orders" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-brand-green-100 hover:bg-brand-green-800">
                            Orders
                        </a>
                        <a href="/admin/media" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-brand-green-100 hover:bg-brand-green-800">
                            Media Library
                        </a>
                        <a href="/admin/settings" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-brand-green-100 hover:bg-brand-green-800">
                            Settings
                        </a>
                        <a href="/" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-brand-green-100 hover:bg-brand-green-800">
                            View Storefront
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Static Sidebar for Desktop -->
        <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0 bg-brand-green-900 border-r border-brand-green-800 shadow-md">
            <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
                <div class="flex items-center flex-shrink-0 px-6 pb-5 border-b border-brand-green-800">
                    <span class="text-2xl font-serif text-brand-gold-100 tracking-tight">Yuvann <span class="font-sans text-xs uppercase text-brand-gold-400 tracking-wider">Admin</span></span>
                </div>
                <div class="flex-grow flex flex-col">
                    <nav class="flex-1 px-4 py-6 space-y-2">
                        <a href="/admin/products" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-md text-white bg-brand-green-800 hover:bg-brand-green-700/80 transition-all">
                            📦 Products
                        </a>
                        <a href="/admin/categories" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-md text-brand-green-100 hover:bg-brand-green-800 hover:text-white transition-all">
                            🗂️ Categories
                        </a>
                        <a href="/admin/orders" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-md text-brand-green-100 hover:bg-brand-green-800 hover:text-white transition-all">
                            📋 Orders
                        </a>
                        <a href="/admin/media" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-md text-brand-green-100 hover:bg-brand-green-800 hover:text-white transition-all">
                            🖼️ Media Library
                        </a>
                        <a href="/admin/settings" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-md text-brand-green-100 hover:bg-brand-green-800 hover:text-white transition-all">
                            ⚙️ Settings
                        </a>
                        <hr class="border-brand-green-800 my-4">
                        <a href="/" class="group flex items-center px-4 py-2.5 text-xs font-medium rounded-md text-brand-green-200 hover:bg-brand-green-800 hover:text-white transition-all">
                            🌐 View Storefront
                        </a>
                    </nav>
                </div>
                <!-- Admin User Footer -->
                <div class="flex-shrink-0 flex border-t border-brand-green-800 p-4 bg-brand-green-950">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-brand-gold-500 flex items-center justify-center text-brand-green-900 font-bold">
                            SD
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs font-medium text-white">Dr. Sajeev Dev</span>
                            <span class="text-[10px] text-brand-green-200">System Administrator</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Workspace -->
        <div class="md:pl-64 flex flex-col flex-1">
            <!-- Top bar -->
            <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white border-b border-brand-green-100 shadow-sm md:shadow-none">
                <button type="button" class="px-4 border-r border-brand-green-100 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-brand-gold-500 md:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex items-center">
                        <h2 class="text-lg font-serif font-semibold text-brand-green-900">
                            {{ $header ?? 'Dashboard' }}
                        </h2>
                    </div>
                    <div class="ml-4 flex items-center md:ml-6 gap-3">
                        <!-- Home Button -->
                        <a href="/"
                           class="inline-flex items-center gap-1.5 text-xs text-brand-green-800 hover:text-brand-green-900 font-medium bg-brand-green-50 hover:bg-brand-green-100 px-3 py-1.5 rounded-full border border-brand-green-100 transition-all"
                           title="Go to Storefront">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Home
                        </a>
                        <!-- Logout -->
                        <form action="/admin/logout" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs text-brand-green-800 hover:text-brand-gold-600 font-medium bg-brand-green-50 hover:bg-red-50 hover:border-red-200 hover:text-red-600 px-3 py-1.5 rounded-full border border-brand-green-100 transition-all">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 py-8 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    @livewireScripts

    {{-- ═══════════════════════════════════════════════════════════════════════ --}}
    {{-- GLOBAL MEDIA PICKER                                                    --}}
    {{-- Lives directly on <body> — outside every Livewire component and        --}}
    {{-- every CSS stacking context. Triggered by window CustomEvent from any   --}}
    {{-- page. Communicates back via window.Livewire.getByName().               --}}
    {{-- ═══════════════════════════════════════════════════════════════════════ --}}
    <div id="yl-global-media-picker"
         x-data="{
            open: false,
            target: '',
            items: [],
            search: '',
            loading: false,
            selectedPaths: [],

            init() {
                window.addEventListener('open-media-picker', (e) => {
                    this.target        = e.detail.target;
                    this.search        = '';
                    this.open          = true;
                    this.selectedPaths = this.snapshotSelection();
                    this.loadItems();
                });
            },

            getLivewire() {
                try {
                    const comps = window.Livewire.getByName('admin.product-manager');
                    return comps && comps.length ? comps[0] : null;
                } catch(e) { return null; }
            },

            snapshotSelection() {
                const lw = this.getLivewire();
                if (!lw) return [];
                if (this.target === 'featured') return lw.existing_featured_image ? [lw.existing_featured_image] : [];
                if (this.target === 'gallery')  return [...(lw.existing_gallery_images || [])];
                if (this.target === 'video')    return lw.existing_product_video  ? [lw.existing_product_video]  : [];
                return [];
            },

            async loadItems() {
                this.loading = true;
                this.items   = [];
                const type   = (this.target === 'video') ? 'video' : 'image';
                const qs     = '?type=' + type + (this.search ? '&search=' + encodeURIComponent(this.search) : '');
                try {
                    const res  = await fetch('/admin/api/media' + qs, {
                        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                    });
                    this.items = await res.json();
                } catch(e) { this.items = []; }
                this.loading = false;
            },

            isSelected(path) {
                return this.selectedPaths.includes(path);
            },

            async pickItem(item) {
                const lw = this.getLivewire();
                if (!lw) { alert('Form component not found. Please refresh.'); return; }

                if (this.target === 'featured') {
                    await lw.setFeaturedFromLibrary(item.path);
                    this.selectedPaths = [item.path];
                    this.open = false;

                } else if (this.target === 'gallery') {
                    if (this.isSelected(item.path)) {
                        await lw.removeGalleryImageByPath(item.path);
                        this.selectedPaths = this.selectedPaths.filter(p => p !== item.path);
                    } else {
                        await lw.addGalleryImageFromLibrary(item.path);
                        this.selectedPaths.push(item.path);
                    }

                } else if (this.target === 'video') {
                    await lw.setVideoFromLibrary(item.path);
                    this.selectedPaths = [item.path];
                    this.open = false;
                }
            },

            get pickerTitle() {
                if (this.target === 'featured') return '📂 Media Library — Select Featured Image';
                if (this.target === 'gallery')  return '📂 Media Library — Add to Gallery';
                if (this.target === 'video')    return '📂 Media Library — Select Video';
                return '📂 Media Library';
            }
         }"
         x-init="init()">

        {{-- Full-screen backdrop — always a direct child of <body> --}}
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             style="display:none; z-index:99999;"
             class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-start justify-center p-4 pt-10 overflow-y-auto"
             @click.self="open = false">

            {{-- Picker Panel --}}
            <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl border border-brand-green-100 flex flex-col"
                 style="max-height:88vh;"
                 @click.stop>

                {{-- Header --}}
                <div class="flex items-center justify-between px-5 py-4 bg-brand-green-900 rounded-t-3xl flex-shrink-0">
                    <div>
                        <h3 class="text-sm font-serif font-bold text-brand-gold-100" x-text="pickerTitle"></h3>
                        <p class="text-[10px] text-brand-green-300 mt-0.5" x-show="target === 'gallery'">
                            Click to add &nbsp;·&nbsp; click again to remove &nbsp;·&nbsp; click <strong>Done</strong> when finished
                        </p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button type="button" x-show="target === 'gallery'" @click="open = false"
                                class="px-4 py-1.5 bg-brand-gold-500 hover:bg-brand-gold-400 text-brand-green-900 rounded-full text-xs font-bold shadow transition-all">
                            ✓ Done
                        </button>
                        <button type="button" @click="open = false"
                                class="w-8 h-8 flex items-center justify-center rounded-full bg-brand-green-800 hover:bg-brand-green-700 text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Search --}}
                <div class="px-5 py-3 border-b border-brand-green-100 flex-shrink-0 bg-brand-green-50/40">
                    <input type="text"
                           x-model="search"
                           @input.debounce.400ms="loadItems()"
                           placeholder="Search media library…"
                           class="w-full bg-white border border-brand-green-100 rounded-xl py-2 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500">
                </div>

                {{-- Grid area --}}
                <div class="flex-1 overflow-y-auto p-4">

                    {{-- Loading spinner --}}
                    <div x-show="loading" class="flex flex-col items-center justify-center py-16 gap-3">
                        <svg class="w-8 h-8 animate-spin text-brand-gold-500" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                        </svg>
                        <p class="text-xs text-brand-green-700/60 font-medium">Loading media…</p>
                    </div>

                    {{-- Empty state --}}
                    <div x-show="!loading && items.length === 0" class="text-center py-16">
                        <div class="text-5xl mb-3">🖼️</div>
                        <p class="text-brand-green-700/60 text-sm font-medium">No media found.</p>
                        <a href="/admin/media" target="_blank"
                           class="inline-flex items-center gap-1 text-brand-gold-600 hover:text-brand-gold-700 text-xs font-semibold mt-2">
                            Upload files in Media Library ↗
                        </a>
                    </div>

                    {{-- Thumbnail grid --}}
                    <div x-show="!loading && items.length > 0"
                         style="display:grid; grid-template-columns: repeat(auto-fill, minmax(110px, 1fr)); gap:10px;">
                        <template x-for="item in items" :key="item.id">
                            <button type="button"
                                    @click="pickItem(item)"
                                    :style="isSelected(item.path)
                                        ? 'outline: 3px solid #c9a84c; outline-offset:2px; transform:scale(0.96);'
                                        : ''"
                                    style="position:relative; border-radius:10px; overflow:hidden; border:2px solid #d1e3d1; background:#fff; cursor:pointer; text-align:left; transition: all 0.15s;">

                                {{-- Image thumbnail --}}
                                <template x-if="item.type === 'image'">
                                    <div style="width:100%; aspect-ratio:1/1; overflow:hidden; background:#eef3ee;">
                                        <img :src="item.url" :alt="item.name"
                                             style="width:100%; height:100%; object-fit:cover; display:block;"
                                             loading="lazy">
                                    </div>
                                </template>

                                {{-- Video thumbnail --}}
                                <template x-if="item.type === 'video'">
                                    <div style="width:100%; aspect-ratio:1/1; overflow:hidden; background:#000; position:relative;">
                                        <video :src="item.url + '#t=0.1'" preload="metadata" muted playsinline
                                               style="width:100%; height:100%; object-fit:cover; pointer-events:none;"></video>
                                        <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;background:rgba(0,0,0,0.3);">
                                            <div style="width:28px;height:28px;border-radius:50%;background:rgba(255,255,255,0.85);display:flex;align-items:center;justify-content:center;">
                                                <svg style="width:14px;height:14px;fill:#1a3a22;margin-left:2px;" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                </template>

                                {{-- Name & size --}}
                                <div style="padding:4px 6px; background:#fff;">
                                    <p style="font-size:9px; font-weight:600; color:#1a3a22; overflow:hidden; white-space:nowrap; text-overflow:ellipsis; margin:0;" x-text="item.name"></p>
                                    <p style="font-size:8px; color:#6b7280; margin:0;" x-text="item.formatted_size"></p>
                                </div>

                                {{-- Selected checkmark --}}
                                <div x-show="isSelected(item.path)"
                                     style="position:absolute;top:4px;right:4px;width:20px;height:20px;border-radius:50%;background:#c9a84c;display:flex;align-items:center;justify-content:center;box-shadow:0 1px 3px rgba(0,0,0,0.3);">
                                    <svg style="width:11px;height:11px;" fill="none" stroke="white" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                            </button>
                        </template>
                    </div>


                </div>{{-- /grid area --}}
            </div>{{-- /panel --}}
        </div>{{-- /backdrop --}}
    </div>{{-- /global-media-picker --}}

</body>
</html>

