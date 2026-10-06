<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Page Header & Action -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-serif font-bold text-brand-green-900">Multilingual Blog & Wellness Articles</h1>
                <p class="text-sm text-gray-500 mt-1">
                    Publish doctor-guided health tips in English, Malayalam, Hindi & Tamil with native regional TTS voice reading.
                </p>
            </div>
            <div>
                <button wire:click="openCreateForm" 
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-brand-green-800 hover:bg-brand-green-700 text-white text-sm font-semibold rounded-lg shadow transition-all cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Write New Article
                </button>
            </div>
        </div>

        <!-- Flash Messages -->
        @if (session()->has('success'))
            <div class="mb-6 p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span>🌿</span>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">&times;</button>
            </div>
        @endif

        <!-- Filter & Search Toolbar -->
        <div class="bg-white rounded-xl shadow-sm border border-brand-green-100/60 p-4 mb-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                <!-- Search Input -->
                <div class="relative">
                    <input type="text" wire:model.live.debounce.300ms="search" 
                           placeholder="Search articles, tips, author..." 
                           class="w-full bg-brand-green-50/50 border border-brand-green-200/80 rounded-lg pl-9 pr-3 py-2 text-xs focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900">
                    <svg class="w-4 h-4 text-brand-green-600 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <!-- Category Filter -->
                <div>
                    <select wire:model.live="categoryFilter" 
                            class="w-full bg-brand-green-50/50 border border-brand-green-200/80 rounded-lg px-3 py-2 text-xs focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status Filter -->
                <div>
                    <select wire:model.live="statusFilter" 
                            class="w-full bg-brand-green-50/50 border border-brand-green-200/80 rounded-lg px-3 py-2 text-xs focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900">
                        <option value="">All Statuses</option>
                        <option value="published">Published Only</option>
                        <option value="draft">Drafts Only</option>
                        <option value="archived">Archived Only</option>
                    </select>
                </div>

                <!-- Clear Filters / Quick Count -->
                <div class="flex items-center justify-between sm:justify-end gap-2 text-xs text-gray-500">
                    <span>Total: <strong class="text-brand-green-900">{{ $posts->total() }}</strong> posts</span>
                    @if(!empty($search) || !empty($categoryFilter) || !empty($statusFilter))
                        <button wire:click="$set('search', ''); $set('categoryFilter', ''); $set('statusFilter', '');" 
                                class="text-brand-gold-600 hover:underline font-medium ml-2 cursor-pointer">
                            Reset
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <!-- Articles Table -->
        <div class="bg-white rounded-xl shadow-sm border border-brand-green-100/60 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-brand-green-100/60 text-left">
                    <thead class="bg-[#fbfaf8] text-brand-green-900 text-xs font-semibold uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-3.5">Article</th>
                            <th class="px-6 py-3.5">Languages</th>
                            <th class="px-6 py-3.5">Category</th>
                            <th class="px-6 py-3.5">Featured Products</th>
                            <th class="px-6 py-3.5">Status</th>
                            <th class="px-6 py-3.5">Date</th>
                            <th class="px-6 py-3.5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-brand-green-100/40 text-sm">
                        @forelse($posts as $post)
                            <tr class="hover:bg-brand-green-50/30 transition-colors">
                                <!-- Article thumbnail & title -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3.5">
                                        <div class="w-14 h-14 rounded-lg overflow-hidden flex-shrink-0 bg-gray-100 border border-brand-green-100">
                                            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                        </div>
                                        <div class="max-w-md">
                                            <a href="/blog/{{ $post->slug }}" target="_blank" class="font-medium text-brand-green-900 hover:text-brand-gold-600 line-clamp-1 transition-colors flex items-center gap-1.5" title="View live article">
                                                <span>{{ $post->title }}</span>
                                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                </svg>
                                            </a>
                                            <span class="text-xs text-gray-400 mt-0.5 block line-clamp-1 font-mono">/blog/{{ $post->slug }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Available Language Badges -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-1 flex-wrap">
                                        @php
                                            $locs = $post->getAvailableLocales();
                                            $flags = ['en' => '🇬🇧 EN', 'ml' => '🌴 ML', 'hi' => '🇮🇳 HI', 'ta' => '🌺 TA'];
                                        @endphp
                                        @foreach($locs as $l)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold bg-brand-green-50 text-brand-green-900 border border-brand-green-200">
                                                {{ $flags[$l] ?? strtoupper($l) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>

                                <!-- Category -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-brand-gold-100/60 text-brand-green-900 border border-brand-gold-200">
                                        {{ $post->category }}
                                    </span>
                                </td>

                                <!-- Linked Products -->
                                <td class="px-6 py-4">
                                    @if($post->products->isNotEmpty())
                                        <div class="flex flex-wrap gap-1 max-w-xs">
                                            @foreach($post->products as $prod)
                                                <a href="/products/{{ $prod->slug }}" target="_blank" 
                                                   class="inline-flex items-center gap-1 text-[11px] bg-brand-green-50 text-brand-green-800 border border-brand-green-200/80 px-2 py-0.5 rounded-md hover:bg-brand-green-100" title="{{ $prod->name }}">
                                                    <span>📦</span>
                                                    <span class="truncate max-w-[120px]">{{ $prod->name }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-400 italic">None linked</span>
                                    @endif
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if(($post->status ?? '') === 'published' || $post->is_published)
                                        <button wire:click="togglePublish({{ $post->id }})" 
                                                class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100 cursor-pointer">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Published
                                        </button>
                                    @elseif(($post->status ?? '') === 'archived')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                            Archived
                                        </span>
                                    @else
                                        <button wire:click="togglePublish({{ $post->id }})" 
                                                class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200 hover:bg-gray-200 cursor-pointer">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                            Draft
                                        </button>
                                    @endif
                                </td>

                                <!-- Date -->
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">
                                    {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right text-xs font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <button wire:click="openEditForm({{ $post->id }})" 
                                                class="p-1.5 text-brand-green-800 hover:text-brand-gold-600 rounded-lg hover:bg-brand-green-50 transition-colors cursor-pointer" title="Edit article">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
                                        <button wire:click="delete({{ $post->id }})" 
                                                wire:confirm="Are you sure you want to delete this article? Linked products will remain safe." 
                                                class="p-1.5 text-red-500 hover:text-red-700 rounded-lg hover:bg-red-50 transition-colors cursor-pointer" title="Delete article">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500 text-xs">
                                    <div class="max-w-sm mx-auto space-y-2">
                                        <span class="text-3xl block">📜</span>
                                        <p class="font-medium text-brand-green-900">No wellness articles found.</p>
                                        <p class="text-gray-400">Click "Write New Article" above to create doctor-guided posts.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
                <div class="px-6 py-4 border-t border-brand-green-100/60 bg-[#fbfaf8]">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- ═══════════════════════════════════════════════════════════ -->
    <!-- EDIT / CREATE MULTILINGUAL ARTICLE MODAL                    -->
    <!-- ═══════════════════════════════════════════════════════════ -->
    @if ($isFormOpen)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-brand-green-950/60 backdrop-blur-xs transition-opacity" wire:click="closeForm"></div>

            <div class="flex items-center justify-center min-h-screen p-4 text-center sm:p-0">
                <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-4xl sm:w-full border border-brand-green-100 flex flex-col max-h-[92vh]">
                    
                    <!-- Modal Header -->
                    <div class="px-6 py-4 bg-[#fbfaf8] border-b border-brand-green-100 flex items-center justify-between flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-serif font-bold text-brand-green-900">
                                {{ $postId ? 'Edit Multilingual Article: ' . ($translations['en']['title'] ?: 'Post #' . $postId) : 'Write New Multilingual Article' }}
                            </h3>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Provide content in English, Malayalam, Hindi & Tamil. Browser TTS reads in the reader's native voice.
                            </p>
                        </div>
                        <button type="button" wire:click="closeForm" class="text-gray-400 hover:text-gray-600 p-1.5 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Modal Body (Scrollable) -->
                    <form wire:submit.prevent="save" class="flex-grow overflow-y-auto p-6 space-y-6">
                        
                        <!-- 1. Common Metadata Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4 rounded-xl bg-brand-green-50/30 border border-brand-green-100">
                            <!-- Slug -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">
                                    URL Slug <span class="text-red-500">*</span>
                                </label>
                                <div class="flex items-center rounded-lg border border-gray-300 bg-white px-2.5 py-1.5 text-xs text-gray-500">
                                    <span>/blog/</span>
                                    <input type="text" wire:model="slug" class="bg-transparent border-none p-0 focus:ring-0 text-brand-green-900 w-full ml-1 font-mono text-xs">
                                </div>
                                @error('slug') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Category -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">
                                    Category <span class="text-red-500">*</span>
                                </label>
                                <input type="text" list="categorySuggestions" wire:model="category" 
                                       placeholder="Wellness Tips, Product Spotlights, etc." 
                                       class="w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900 focus:ring-1 focus:ring-brand-gold-500">
                                <datalist id="categorySuggestions">
                                    <option value="Wellness Tips">
                                    <option value="Product Spotlights">
                                    <option value="Ayurvedic Lifestyle">
                                    <option value="Herbal Remedies">
                                    <option value="Diet & Nutrition">
                                    <option value="Women's Health">
                                </datalist>
                                @error('category') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Publication Status -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">Status</label>
                                <select wire:model="status" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900 focus:ring-1 focus:ring-brand-gold-500">
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="archived">Archived</option>
                                </select>
                            </div>

                            <!-- Author Name -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">Author Name</label>
                                <input type="text" wire:model="author_name" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900">
                            </div>

                            <!-- Read Time -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">Read Time</label>
                                <input type="text" wire:model="read_time" placeholder="e.g. 5 min read" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900">
                            </div>

                            <!-- Publish Date -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">Publication Date</label>
                                <input type="datetime-local" wire:model="published_at" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900">
                            </div>
                        </div>

                        <!-- 2. Featured Cover Image Section -->
                        <div class="p-4 rounded-xl bg-white border border-gray-200">
                            <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-2">Featured Cover Image</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                                <div>
                                    <div class="flex items-center gap-3">
                                        <input type="file" wire:model="featured_image" accept="image/*" class="text-xs text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-brand-green-800 file:text-white hover:file:bg-brand-green-700 cursor-pointer">
                                        <div wire:loading wire:target="featured_image" class="text-xs text-brand-gold-600 font-medium">Uploading...</div>
                                    </div>
                                    <p class="text-[11px] text-gray-500 mt-2">
                                        Or paste an external high-res image URL:
                                    </p>
                                    <input type="url" wire:model="image_url" placeholder="https://images.unsplash.com/..." class="mt-1 w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900">
                                </div>

                                <!-- Image Preview -->
                                <div class="flex items-center justify-center md:justify-end">
                                    @if ($featured_image)
                                        <img src="{{ $featured_image->temporaryUrl() }}" alt="Preview" class="h-24 w-40 object-cover rounded-lg border border-brand-green-200 shadow-xs">
                                    @elseif ($existing_featured_image)
                                        <img src="{{ str_starts_with($existing_featured_image, 'http') ? $existing_featured_image : Storage::url($existing_featured_image) }}" alt="Current Image" class="h-24 w-40 object-cover rounded-lg border border-brand-green-200 shadow-xs">
                                    @else
                                        <div class="h-24 w-40 rounded-lg bg-gray-100 border border-dashed border-gray-300 flex flex-col items-center justify-center text-gray-400 text-xs text-center p-2">
                                            <span>📷</span>
                                            <span class="mt-1">No cover image</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- 3. CENTRALIZED MULTILINGUAL CONTENT TABS (en, ml, hi, ta) -->
                        <div class="border border-brand-gold-500/40 rounded-2xl bg-white overflow-hidden shadow-xs">
                            <!-- Tab Bar -->
                            <div class="bg-gradient-to-r from-brand-green-950 via-brand-green-900 to-brand-green-950 p-2.5 flex items-center justify-between gap-2 flex-wrap">
                                <div class="flex items-center gap-1.5 flex-wrap">
                                    @php
                                        $languages = [
                                            'en' => ['name' => 'English', 'native' => 'English', 'flag' => '🇬🇧'],
                                            'ml' => ['name' => 'Malayalam', 'native' => 'മലയാളം', 'flag' => '🌴'],
                                            'hi' => ['name' => 'Hindi', 'native' => 'हिन्दी', 'flag' => '🇮🇳'],
                                            'ta' => ['name' => 'Tamil', 'native' => 'தமிழ்', 'flag' => '🌺'],
                                        ];
                                    @endphp

                                    @foreach($languages as $code => $info)
                                        @php
                                            $hasContent = $this->hasLocaleContent($code);
                                            $isActive = ($activeLocaleTab === $code);
                                        @endphp
                                        <button type="button" 
                                                wire:click="setLocaleTab('{{ $code }}')"
                                                class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 cursor-pointer {{ $isActive ? 'bg-brand-gold-400 text-brand-green-950 shadow-md ring-1 ring-white/50' : 'text-brand-green-100 hover:bg-white/10' }}">
                                            <span>{{ $info['flag'] }}</span>
                                            <span>{{ $info['native'] }}</span>
                                            @if($hasContent)
                                                <span class="w-1.5 h-1.5 rounded-full {{ $isActive ? 'bg-brand-green-950' : 'bg-emerald-400' }}" title="Content present"></span>
                                            @endif
                                        </button>
                                    @endforeach
                                </div>

                                <div class="text-[11px] text-brand-gold-300 font-medium hidden sm:block">
                                    Editing: <strong>{{ $languages[$activeLocaleTab]['name'] }}</strong>
                                </div>
                            </div>

                            <!-- Tab Content Area for $activeLocaleTab -->
                            <div class="p-5 space-y-4">
                                <!-- Article Title -->
                                <div>
                                    <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">
                                        Title ({{ $languages[$activeLocaleTab]['name'] }})
                                        @if($activeLocaleTab === 'en') <span class="text-red-500">*</span> @endif
                                    </label>
                                    <input type="text" 
                                           wire:model.live.debounce.300ms="translations.{{ $activeLocaleTab }}.title" 
                                           placeholder="Article Title in {{ $languages[$activeLocaleTab]['name'] }}..." 
                                           class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-sm focus:ring-1 focus:ring-brand-gold-500 text-brand-green-900">
                                    @error("translations.{$activeLocaleTab}.title") <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <!-- Excerpt -->
                                <div>
                                    <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">
                                        Summary / Excerpt ({{ $languages[$activeLocaleTab]['name'] }})
                                    </label>
                                    <textarea wire:model="translations.{{ $activeLocaleTab }}.excerpt" rows="2" 
                                              placeholder="Brief summary in {{ $languages[$activeLocaleTab]['name'] }} shown in cards and preview..." 
                                              class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-xs focus:ring-1 focus:ring-brand-gold-500 text-brand-green-900"></textarea>
                                </div>

                                <!-- Rich Article Content -->
                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider">
                                            Article Content ({{ $languages[$activeLocaleTab]['name'] }})
                                            @if($activeLocaleTab === 'en') <span class="text-red-500">*</span> @endif
                                        </label>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-500">
                                            <span>Quick inserts:</span>
                                            <button type="button" 
                                                    onclick="let el = document.getElementById('blog-content-area'); el.value += '\n<h2>Subheading Title</h2>\n<p>Paragraph text...</p>\n'; el.dispatchEvent(new Event('input'));"
                                                    class="bg-gray-100 hover:bg-gray-200 text-brand-green-900 px-2 py-0.5 rounded border border-gray-200 cursor-pointer">
                                                + Subheading
                                            </button>
                                            <button type="button" 
                                                    onclick="let el = document.getElementById('blog-content-area'); el.value += '\n<div class=\'ayurveda-tip-box\'>\n    <strong>🌿 Dr. Sajeev\'s Tip:</strong>\n    <p>Your advice here...</p>\n</div>\n'; el.dispatchEvent(new Event('input'));"
                                                    class="bg-emerald-50 hover:bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded border border-emerald-200 cursor-pointer">
                                                + Tip Box
                                            </button>
                                        </div>
                                    </div>
                                    <textarea id="blog-content-area" 
                                              wire:model="translations.{{ $activeLocaleTab }}.content" rows="12" 
                                              placeholder="Write rich formatted content in {{ $languages[$activeLocaleTab]['name'] }}. HTML tags like <h2>, <p>, <ul>, <div class='ayurveda-tip-box'> are supported." 
                                              class="w-full font-mono text-xs bg-white border border-gray-300 rounded-lg p-3 focus:ring-1 focus:ring-brand-gold-500 text-brand-green-900 leading-relaxed"></textarea>
                                    @error("translations.{$activeLocaleTab}.content") <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <!-- Studio Audio URL (Optional) -->
                                <div class="p-3 rounded-xl bg-brand-gold-50/50 border border-brand-gold-200">
                                    <div class="flex items-center justify-between mb-1">
                                        <label class="block text-xs font-bold text-brand-green-950 uppercase tracking-wider flex items-center gap-1.5">
                                            <span>🎙️</span>
                                            <span>Studio Audio Recording URL (Optional)</span>
                                        </label>
                                        <span class="text-[10px] text-brand-gold-700 font-semibold">TTS will be used if left blank</span>
                                    </div>
                                    <input type="url" 
                                           wire:model="translations.{{ $activeLocaleTab }}.audio_url" 
                                           placeholder="https://.../audio-{{ $activeLocaleTab }}.mp3" 
                                           class="w-full bg-white border border-brand-gold-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900 focus:ring-1 focus:ring-brand-gold-500">
                                    <p class="text-[11px] text-gray-500 mt-1">
                                        If provided, users will hear this custom recording. If blank, zero-dependency browser TTS in the {{ $languages[$activeLocaleTab]['name'] }} voice is spoken automatically!
                                    </p>
                                </div>

                                <!-- SEO Meta for this language -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 pt-2 border-t border-gray-100">
                                    <div>
                                        <label class="block text-[11px] font-semibold text-gray-600 uppercase tracking-wider mb-1">SEO Meta Title ({{ $activeLocaleTab }})</label>
                                        <input type="text" wire:model="translations.{{ $activeLocaleTab }}.meta_title" placeholder="Defaults to Title" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] font-semibold text-gray-600 uppercase tracking-wider mb-1">SEO Meta Description ({{ $activeLocaleTab }})</label>
                                        <input type="text" wire:model="translations.{{ $activeLocaleTab }}.meta_description" placeholder="Defaults to Excerpt" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Featured / Introduced Products Selector -->
                        <div class="p-4 rounded-xl bg-amber-50/40 border border-amber-200/70" x-data="{ openDropdown: false }">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <label class="block text-xs font-semibold text-amber-950 uppercase tracking-wider">
                                        ✨ Tag Products Featured in this Article / Wellness Tip
                                    </label>
                                    <p class="text-[11px] text-amber-800/80">
                                        Tagged products appear in an interactive "Featured Remedies" showcase with instant "Add to Cart" and size selection.
                                    </p>
                                </div>
                                <span class="text-xs font-bold text-amber-900 bg-amber-200/60 px-2 py-0.5 rounded-full">
                                    {{ count($product_ids) }} tagged
                                </span>
                            </div>

                            <!-- Product search filter -->
                            <div class="mb-3">
                                <input type="text" wire:model.live.debounce.200ms="productSearch" 
                                       placeholder="Filter products to tag..." 
                                       class="w-full bg-white border border-amber-200 rounded-lg px-3 py-1.5 text-xs text-brand-green-900 focus:ring-1 focus:ring-amber-500">
                            </div>

                            <!-- Checkbox list of products -->
                            <div class="max-h-40 overflow-y-auto divide-y divide-amber-100 bg-white rounded-lg border border-amber-200 p-2 space-y-1">
                                @forelse($availableProducts as $prod)
                                    <label class="flex items-center gap-3 p-1.5 hover:bg-amber-50/60 rounded cursor-pointer transition-colors">
                                        <input type="checkbox" 
                                               wire:click="toggleProduct({{ $prod->id }})" 
                                               @checked(in_array($prod->id, $product_ids))
                                               class="rounded text-brand-green-800 focus:ring-brand-green-800 h-4 w-4 border-gray-300">
                                        <div class="flex items-center gap-2 flex-grow">
                                            <div class="w-8 h-8 rounded bg-gray-100 overflow-hidden flex-shrink-0 border border-gray-200">
                                                <img src="{{ $prod->featured_image_url }}" alt="{{ $prod->name }}" class="w-full h-full object-cover">
                                            </div>
                                            <div class="text-xs font-medium text-brand-green-900 truncate">
                                                {{ $prod->name }}
                                            </div>
                                        </div>
                                        <div class="text-xs text-amber-900 font-semibold whitespace-nowrap">
                                            ₹{{ number_format($prod->active_price, 2) }}
                                        </div>
                                    </label>
                                @empty
                                    <div class="text-xs text-gray-500 text-center py-2">No matching products found.</div>
                                @endforelse
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="pt-4 border-t border-brand-green-100 flex items-center justify-end gap-3 flex-shrink-0">
                            <button type="button" wire:click="closeForm" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-medium rounded-lg transition-colors cursor-pointer">
                                Cancel
                            </button>
                            <button type="submit" class="px-5 py-2 bg-brand-green-800 hover:bg-brand-green-700 text-white text-xs font-semibold rounded-lg shadow transition-all flex items-center gap-2 cursor-pointer">
                                <span wire:loading.remove wire:target="save">
                                    {{ $postId ? 'Save Changes' : 'Publish Article' }}
                                </span>
                                <span wire:loading wire:target="save">
                                    Saving...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
