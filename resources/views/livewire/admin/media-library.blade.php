<div>
    {{-- Flash Message --}}
    @if(session()->has('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 text-xs font-semibold px-4 py-3 rounded-xl mb-6">
            🌿 {{ session('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="bg-red-50 border border-red-200 text-red-800 text-xs font-semibold px-4 py-3 rounded-xl mb-6">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    {{-- ══════════════ Upload Section ══════════════ --}}
    <form wire:submit="upload" class="bg-white rounded-2xl border border-brand-green-100 shadow-sm mb-6 overflow-hidden text-left">
        <div class="px-5 py-4 border-b border-brand-green-100 bg-brand-green-50/40">
            <h3 class="text-sm font-serif font-bold text-brand-green-900">Upload to Library</h3>
            <p class="text-[10px] text-brand-green-700/60 mt-0.5 font-medium">
                Images are auto-converted to WebP 800×800. Videos stored as-is. Max 50 MB per file.
            </p>
        </div>
        <div class="p-5">
            {{-- File picker --}}
            <div class="relative border-2 border-dashed border-brand-green-200 hover:border-brand-gold-400 rounded-2xl p-8 text-center transition-colors cursor-pointer group"
                 onclick="document.getElementById('media-upload-input').click()"
                 x-data
                 x-on:livewire-upload-error="alert('Upload failed! The file may be larger than your server\'s PHP upload_max_filesize limit. Please increase it in your cPanel.')">
                <div class="text-4xl mb-2 group-hover:scale-110 transition-transform duration-200">📁</div>
                <p class="text-xs font-semibold text-brand-green-800">Click to browse or drag files here</p>
                <p class="text-[10px] text-brand-green-700/50 mt-1">JPEG · PNG · GIF · WebP · MP4 · WebM · MOV — max 50 MB each</p>

                <input id="media-upload-input"
                       type="file"
                       wire:model="uploadFiles"
                       multiple
                       accept="image/jpeg,image/png,image/gif,image/webp,video/mp4,video/webm,video/quicktime"
                       class="absolute inset-0 opacity-0 cursor-pointer w-full h-full">
            </div>

            {{-- Validation Errors --}}
            @error('uploadFiles.*') 
                <div class="mt-2 text-xs font-semibold text-red-600 bg-red-50 p-2 rounded-lg border border-red-200">
                    ⚠️ {{ $message }}
                </div>
            @enderror
            @error('uploadFiles') 
                <div class="mt-2 text-xs font-semibold text-red-600 bg-red-50 p-2 rounded-lg border border-red-200">
                    ⚠️ {{ $message }}
                </div>
            @enderror

            {{-- Upload loading state --}}
            <div wire:loading wire:target="uploadFiles" class="mt-3 flex items-center gap-2 text-xs text-brand-green-700/70 animate-pulse">
                <svg class="w-4 h-4 animate-spin text-brand-gold-500" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                Processing files…
            </div>

            {{-- Preview selected files (Auto-uploading) --}}
            <div class="{{ count($uploadFiles) > 0 ? 'block' : 'hidden' }}">
                <div class="mt-4 p-4 bg-brand-green-50/60 rounded-xl border border-brand-green-100 text-center">
                    <svg class="w-8 h-8 animate-spin text-brand-gold-500 mx-auto mb-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                    <p class="text-xs font-bold text-brand-green-900 uppercase">Processing {{ count($uploadFiles) }} file(s)...</p>
                    <p class="text-[10px] text-brand-green-700/60 mt-1">Please wait, saving to library.</p>
                </div>
            </div>
        </div>
    </form>

    {{-- ══════════════ Filters Row ══════════════ --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-5">
        {{-- Type Tabs --}}
        <div class="flex gap-1.5 bg-white border border-brand-green-100 rounded-xl p-1 shadow-sm">
            @foreach(['' => 'All', 'image' => '🖼️ Images', 'video' => '🎬 Videos'] as $val => $label)
                <button wire:click="$set('typeFilter', '{{ $val }}')"
                        class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all {{ $typeFilter === $val ? 'bg-brand-green-800 text-white shadow-sm' : 'text-brand-green-700 hover:bg-brand-green-50' }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        {{-- Search --}}
        <div class="relative w-full sm:w-56">
            <input type="text" wire:model.live.debounce.300ms="search"
                   placeholder="Search by name…"
                   class="w-full bg-white border border-brand-green-100 rounded-xl py-2 pl-3.5 pr-9 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 shadow-sm">
            <svg class="absolute right-3 top-2.5 w-3.5 h-3.5 text-brand-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>
    </div>

    {{-- Item count --}}
    <p class="text-[10px] text-brand-green-700/60 font-medium mb-4">
        {{ $items->total() }} file(s) in library
        @if($search) matching "<strong>{{ $search }}</strong>" @endif
    </p>

    {{-- ══════════════ Media Grid ══════════════ --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3 text-left">
        @forelse($items as $item)
            <div class="group relative bg-white rounded-2xl border border-brand-green-100 overflow-hidden shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">

                {{-- Thumbnail --}}
                @if($item->type === 'image')
                    <div class="aspect-square overflow-hidden bg-brand-green-50">
                        <img src="{{ $item->url }}" alt="{{ $item->name }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                             loading="lazy">
                    </div>
                @else
                    <div class="aspect-square overflow-hidden bg-black relative">
                        <video src="{{ $item->url }}#t=0.1" preload="metadata" muted playsinline
                               class="w-full h-full object-cover pointer-events-none"></video>
                        <div class="absolute inset-0 flex items-center justify-center bg-black/25 group-hover:bg-black/15 transition-all">
                            <div class="w-9 h-9 rounded-full bg-white/80 group-hover:bg-white flex items-center justify-center shadow-md transition-all">
                                <svg class="w-4 h-4 fill-brand-green-900 ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Info --}}
                <div class="p-2">
                    <p class="text-[10px] font-semibold text-brand-green-900 truncate" title="{{ $item->name }}">{{ $item->name }}</p>
                    <div class="flex items-center justify-between mt-0.5">
                        <p class="text-[9px] text-brand-green-700/50">{{ $item->formatted_size }}</p>
                        <span class="text-[8px] font-bold uppercase tracking-wide px-1.5 py-0.5 rounded-full {{ $item->type === 'image' ? 'bg-blue-50 text-blue-600' : 'bg-purple-50 text-purple-600' }}">
                            {{ $item->type }}
                        </span>
                    </div>
                </div>

                {{-- Delete button (shown on hover) --}}
                <button wire:click="delete({{ $item->id }})"
                        onclick="return confirm('Remove \'{{ addslashes($item->name) }}\' from the library? This cannot be undone.')"
                        title="Delete"
                        class="absolute top-2 right-2 w-6 h-6 rounded-full bg-red-500 hover:bg-red-600 text-white text-xs font-bold opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center shadow-md">
                    ×
                </button>

                {{-- Type icon badge --}}
                <div class="absolute top-2 left-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    @if($item->type === 'image')
                        <span class="text-[9px] bg-black/40 text-white px-1.5 py-0.5 rounded-full font-medium">IMG</span>
                    @else
                        <span class="text-[9px] bg-black/40 text-white px-1.5 py-0.5 rounded-full font-medium">VID</span>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16">
                <div class="text-5xl mb-4">🖼️</div>
                <p class="text-brand-green-800 font-semibold text-sm">No media files yet</p>
                <p class="text-brand-green-700/60 text-xs mt-1">Upload images or videos using the section above.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($items->hasPages())
        <div class="mt-6 px-1">
            {{ $items->links() }}
        </div>
    @endif
</div>
