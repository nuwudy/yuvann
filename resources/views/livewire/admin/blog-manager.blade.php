<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Page Header & Action -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-serif font-bold text-brand-green-900">Blog & Wellness Articles</h1>
                <p class="text-sm text-gray-500 mt-1">
                    Publish doctor-guided health tips, Ayurvedic wisdom, and product spotlights with direct store integration.
                </p>
            </div>
            <div>
                <button wire:click="openCreateForm" 
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-brand-green-800 hover:bg-brand-green-700 text-white text-sm font-semibold rounded-lg shadow transition-all">
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
                    </select>
                </div>

                <!-- Clear Filters / Quick Count -->
                <div class="flex items-center justify-between sm:justify-end gap-2 text-xs text-gray-500">
                    <span>Total: <strong class="text-brand-green-900">{{ $posts->total() }}</strong> posts</span>
                    @if($search || $categoryFilter || $statusFilter)
                        <button wire:click="$set('search', ''); $set('categoryFilter', ''); $set('statusFilter', '');" 
                                class="text-brand-gold-600 hover:underline font-medium ml-2">
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
                            <th class="px-6 py-3.5">Category</th>
                            <th class="px-6 py-3.5">Featured Products</th>
                            <th class="px-6 py-3.5">Author</th>
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

                                <!-- Author -->
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-600">
                                    <div class="font-medium text-brand-green-900">{{ $post->author_name }}</div>
                                    <div class="text-[11px] text-gray-400">{{ $post->read_time }}</div>
                                </td>

                                <!-- Status toggle -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button wire:click="togglePublish({{ $post->id }})" 
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium transition-all {{ $post->is_published ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $post->is_published ? 'bg-emerald-600' : 'bg-gray-400' }}"></span>
                                        <span>{{ $post->is_published ? 'Published' : 'Draft' }}</span>
                                    </button>
                                </td>

                                <!-- Date -->
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">
                                    {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                    <div class="flex items-center justify-end gap-2">
                                        <button wire:click="openEditForm({{ $post->id }})" 
                                                class="text-xs font-medium text-brand-green-800 hover:text-brand-green-950 bg-brand-green-50 hover:bg-brand-green-100 px-2.5 py-1.5 rounded-md border border-brand-green-200/60 transition-all">
                                            Edit
                                        </button>
                                        <button wire:click="delete({{ $post->id }})" 
                                                wire:confirm="Are you sure you want to delete '{{ $post->title }}'?" 
                                                class="text-xs font-medium text-red-600 hover:text-red-800 bg-red-50 hover:bg-red-100 px-2.5 py-1.5 rounded-md border border-red-200/60 transition-all">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500 text-sm">
                                    No articles found matching your criteria.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($posts->hasPages())
                <div class="px-6 py-4 border-t border-brand-green-100/60">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Create / Edit Slide-Over / Modal Form -->
    @if($isFormOpen)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-xs transition-opacity" wire:click="closeForm"></div>

            <div class="flex items-center justify-center min-h-screen p-4 text-center sm:p-0">
                <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-4xl sm:w-full border border-brand-green-100 flex flex-col max-h-[90vh]">
                    
                    <!-- Modal Header -->
                    <div class="px-6 py-4 bg-[#fbfaf8] border-b border-brand-green-100 flex items-center justify-between flex-shrink-0">
                        <div>
                            <h3 class="text-lg font-serif font-bold text-brand-green-900">
                                {{ $postId ? 'Edit Article: ' . $title : 'Write New Wellness Article' }}
                            </h3>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Share wellness tips and connect products to guide your readers.
                            </p>
                        </div>
                        <button type="button" wire:click="closeForm" class="text-gray-400 hover:text-gray-600 p-1.5 rounded-lg hover:bg-gray-100 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Modal Body (Scrollable) -->
                    <form wire:submit.prevent="save" class="flex-grow overflow-y-auto p-6 space-y-6">
                        <!-- Top details grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Title -->
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1.5">
                                    Article Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" wire:model.live.debounce.300ms="title" 
                                       placeholder="e.g. 5 Ayurvedic Morning Habits for Vitality & Digestion" 
                                       class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-sm focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900">
                                @error('title') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Slug -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1.5">
                                    URL Slug <span class="text-red-500">*</span>
                                </label>
                                <div class="flex items-center rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-xs text-gray-500">
                                    <span>/blog/</span>
                                    <input type="text" wire:model="slug" class="bg-transparent border-none p-0 focus:ring-0 text-brand-green-900 w-full ml-1 font-mono text-xs">
                                </div>
                                @error('slug') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Category -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1.5">
                                    Category <span class="text-red-500">*</span>
                                </label>
                                <input type="text" list="categorySuggestions" wire:model="category" 
                                       placeholder="Wellness Tips, Product Spotlights, etc." 
                                       class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-sm focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900">
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

                            <!-- Author Name -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1.5">Author Name</label>
                                <input type="text" wire:model="author_name" class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-sm focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900">
                            </div>

                            <!-- Read Time -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1.5">Read Time</label>
                                <input type="text" wire:model="read_time" placeholder="e.g. 5 min read" class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-sm focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900">
                            </div>
                        </div>

                        <!-- Featured Cover Image Section -->
                        <div class="p-4 rounded-xl bg-brand-green-50/40 border border-brand-green-100">
                            <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-2">Featured Cover Image</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                                <div>
                                    <div class="flex items-center gap-3">
                                        <input type="file" wire:model="featured_image" accept="image/*" class="text-xs text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-brand-green-800 file:text-white hover:file:bg-brand-green-700 cursor-pointer">
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
                                        <img src="{{ $featured_image->temporaryUrl() }}" alt="Preview" class="h-28 w-44 object-cover rounded-lg border border-brand-green-200 shadow-xs">
                                    @elseif ($existing_featured_image)
                                        <img src="{{ str_starts_with($existing_featured_image, 'http') ? $existing_featured_image : Storage::url($existing_featured_image) }}" alt="Current Image" class="h-28 w-44 object-cover rounded-lg border border-brand-green-200 shadow-xs">
                                    @else
                                        <div class="h-28 w-44 rounded-lg bg-gray-100 border border-dashed border-gray-300 flex flex-col items-center justify-center text-gray-400 text-xs text-center p-2">
                                            <span>📷</span>
                                            <span class="mt-1">No cover image</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Excerpt -->
                        <div>
                            <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1.5">
                                Summary / Excerpt <span class="text-gray-400 font-normal">(Brief hook shown in article cards)</span>
                            </label>
                            <textarea wire:model="excerpt" rows="2" placeholder="A 1-2 sentence hook highlighting the wellness tips or products introduced..." class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-sm focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900"></textarea>
                            @error('excerpt') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Featured / Introduced Products Selector -->
                        <div class="p-4 rounded-xl bg-amber-50/40 border border-amber-200/70" x-data="{ openDropdown: false }">
                            <div class="flex items-center justify-between mb-2">
                                <div>
                                    <label class="block text-xs font-semibold text-amber-950 uppercase tracking-wider">
                                        ✨ Tag Products Featured in this Article / Wellness Tip
                                    </label>
                                    <p class="text-[11px] text-amber-800/80">
                                        Tagged products will appear in an interactive "Featured Remedies" showcase with instant "Add to Cart" and details buttons.
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

                        <!-- Content Editor with Quick Insert Helpers -->
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider">
                                    Article Content (HTML supported) <span class="text-red-500">*</span>
                                </label>
                                <div class="flex items-center gap-1.5 text-[11px] text-gray-500">
                                    <span>Quick inserts:</span>
                                    <button type="button" 
                                            onclick="let el = document.getElementById('blog-content-area'); el.value += '\n<h2>Subheading Title</h2>\n<p>Paragraph text...</p>\n'; el.dispatchEvent(new Event('input'));"
                                            class="bg-gray-100 hover:bg-gray-200 text-brand-green-900 px-2 py-0.5 rounded border border-gray-200">
                                        + Subheading
                                    </button>
                                    <button type="button" 
                                            onclick="let el = document.getElementById('blog-content-area'); el.value += '\n<div class=\'ayurveda-tip-box\'>\n    <strong>🌿 Dr. Sajeev\'s Ayurvedic Tip:</strong>\n    <p>Your advice here...</p>\n</div>\n'; el.dispatchEvent(new Event('input'));"
                                            class="bg-emerald-50 hover:bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded border border-emerald-200">
                                        + Tip Box
                                    </button>
                                </div>
                            </div>
                            <textarea id="blog-content-area" wire:model="content" rows="12" 
                                      placeholder="Write rich article content. Use <h2> for headers, <p> for paragraphs, <ul>/<li> for lists, and <div class='ayurveda-tip-box'> for highlighted wellness tips." 
                                      class="w-full font-mono text-xs bg-white border border-gray-300 rounded-lg p-3 focus:ring-1 focus:ring-brand-gold-500 focus:border-brand-gold-500 text-brand-green-900 leading-relaxed"></textarea>
                            @error('content') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Publishing Options & SEO Meta -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-gray-200">
                            <!-- Publishing Checkbox -->
                            <div class="flex items-center gap-3">
                                <input type="checkbox" id="is_published" wire:model="is_published" class="rounded text-brand-green-800 focus:ring-brand-green-800 h-4 w-4 border-gray-300">
                                <label for="is_published" class="text-xs font-semibold text-brand-green-900 cursor-pointer">
                                    Publish this article immediately
                                </label>
                            </div>

                            <!-- Publish Date -->
                            <div>
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">Publication Date</label>
                                <input type="datetime-local" wire:model="published_at" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900">
                            </div>

                            <!-- SEO Meta Title -->
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">SEO Meta Title (Optional)</label>
                                <input type="text" wire:model="meta_title" placeholder="Defaults to Article Title" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900">
                            </div>

                            <!-- SEO Meta Description -->
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-brand-green-900 uppercase tracking-wider mb-1">SEO Meta Description (Optional)</label>
                                <input type="text" wire:model="meta_description" placeholder="Defaults to excerpt" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-1.5 text-xs text-brand-green-900">
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="pt-4 border-t border-brand-green-100 flex items-center justify-end gap-3 flex-shrink-0">
                            <button type="button" wire:click="closeForm" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-medium rounded-lg transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="px-5 py-2 bg-brand-green-800 hover:bg-brand-green-700 text-white text-xs font-semibold rounded-lg shadow transition-all flex items-center gap-2">
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
