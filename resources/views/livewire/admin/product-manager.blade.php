<div>
    <!-- Flash Messages -->
    @if(session()->has('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 text-xs font-semibold px-4 py-3 rounded-xl mb-6 text-left">
            🌿 {{ session('success') }}
        </div>
    @endif

    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <!-- Search and Filters -->
        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
            <div class="relative w-full sm:w-64">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search products..."
                       class="w-full bg-white border border-brand-green-100 rounded-xl py-2 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 shadow-sm">
            </div>
            <select wire:model.live="categoryFilter" 
                    class="bg-white border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 shadow-sm">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Add Button -->
        <button wire:click="openCreateForm" 
                class="px-5 py-2.5 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-xl text-xs font-semibold shadow-sm flex items-center gap-1.5 transition-all">
            ➕ Add Product
        </button>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-brand-green-100/60 rounded-2xl shadow-sm overflow-hidden text-left">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-brand-green-100/50">
                <thead class="bg-brand-green-50/50 text-[10px] font-bold text-brand-green-900 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Image</th>
                        <th class="px-6 py-4">Product Details</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Stock</th>
                        <th class="px-6 py-4 text-center">Featured</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-green-100/30 text-xs text-brand-green-900 font-medium">
                    @forelse($products as $product)
                        <tr class="hover:bg-brand-green-50/20 transition-colors">
                            <!-- Thumbnail -->
                            <td class="px-6 py-4">
                                <div class="h-10 w-10 rounded-lg overflow-hidden border border-brand-green-100 bg-white">
                                    <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                </div>
                            </td>
                            <!-- Details -->
                            <td class="px-6 py-4">
                                <div class="font-bold text-brand-green-900">{{ $product->name }}</div>
                                <div class="text-[10px] text-brand-green-700/60 font-medium">SKU: {{ $product->sku }} | Size: {{ $product->unit_size }}</div>
                            </td>
                            <!-- Category -->
                            <td class="px-6 py-4 text-brand-green-700">{{ $product->category->name }}</td>
                            <!-- Price -->
                            <td class="px-6 py-4 font-semibold text-brand-green-900">
                                @if($product->is_on_sale)
                                    <span class="text-brand-green-700/40 line-through text-[10px] mr-1">₹{{ number_format($product->price, 2) }}</span>
                                    <span>₹{{ number_format($product->sale_price, 2) }}</span>
                                @else
                                    <span>₹{{ number_format($product->price, 2) }}</span>
                                @endif
                            </td>
                            <!-- Stock -->
                            <td class="px-6 py-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold"
                                      :class="'{{ $product->in_stock }}' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200'">
                                    {{ $product->stock_quantity }} items
                                </span>
                            </td>
                            <!-- Featured -->
                            <td class="px-6 py-4 text-center">
                                <button wire:click="toggleFeatured({{ $product->id }})" 
                                        class="p-1 rounded hover:bg-brand-green-50 transition-colors"
                                        style="cursor: pointer;">
                                    @if($product->is_featured)
                                        <span class="text-brand-gold-500 text-lg">★</span>
                                    @else
                                        <span class="text-brand-green-200 hover:text-brand-gold-400 text-lg">☆</span>
                                    @endif
                                </button>
                            </td>
                            <!-- Status -->
                            <td class="px-6 py-4 text-center">
                                <button wire:click="toggleStatus({{ $product->id }})" 
                                        class="px-2.5 py-1 rounded-full text-[10px] font-semibold border transition-all inline-flex items-center gap-1"
                                        style="cursor: pointer;"
                                        :class="'{{ $product->is_active }}' ? 'bg-green-50 text-green-700 border-green-200' : 'bg-red-50 text-red-700 border-red-200'">
                                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <!-- Actions -->
                            <td class="px-6 py-4 text-right space-x-2">
                                <button wire:click="openEditForm({{ $product->id }})" class="text-brand-gold-600 hover:text-brand-gold-700 font-bold">Edit</button>
                                <button wire:click="deleteProduct({{ $product->id }})" 
                                        onclick="confirm('Are you sure you want to delete this product?') || event.stopImmediatePropagation()"
                                        class="text-red-600 hover:text-red-700 font-bold">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-brand-green-700/60 font-medium">
                                No products found. Click "Add Product" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($products->hasPages())
            <div class="px-6 py-4 border-t border-brand-green-100/50">
                {{ $products->links() }}
            </div>
        @endif
    </div>

    <!-- Product Modal Overlay (Grid inputs) -->
    <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center p-4" 
         x-data="{ isOpen: @entangle('isFormOpen') }" 
         x-show="isOpen" 
         style="display: none;">
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-[#0e241b]/60 backdrop-blur-sm transition-opacity" @click="isOpen = false"></div>

        <!-- Modal Card -->
        <div class="bg-white rounded-3xl border border-brand-green-100 overflow-hidden shadow-2xl max-w-4xl w-full z-10 text-left"
             x-show="isOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            
            <div class="px-6 py-5 border-b border-brand-green-100 bg-brand-green-900 text-white flex justify-between items-center">
                <h3 class="text-base font-serif font-bold text-brand-gold-100">
                    {{ $productId ? 'Modify Product Details' : 'Create New Product' }}
                </h3>
                <button wire:click="closeForm" class="text-brand-green-100 hover:text-brand-gold-400 focus:outline-none p-1 rounded-full hover:bg-brand-green-800 transition-colors">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="saveProduct" class="p-6 overflow-y-auto max-h-[80vh] space-y-6">
                
                <!-- General Section -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    <!-- Title -->
                    <div class="md:col-span-6">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Product Title *</label>
                        <input type="text" wire:model.live="name" placeholder="e.g. Ruthu Santhi Oil" 
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('name') border-red-400 @enderror">
                        @error('name') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Slug -->
                    <div class="md:col-span-6">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Slug *</label>
                        <input type="text" wire:model="slug" placeholder="e.g. ruthu-santhi-oil" 
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('slug') border-red-400 @enderror">
                        @error('slug') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Short Description -->
                    <div class="md:col-span-12" style="grid-column: 1 / -1;">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Short Description</label>
                        <textarea wire:model="short_description" rows="3" placeholder="Brief summary for the product card..." 
                                  class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('short_description') border-red-400 @enderror"></textarea>
                        @error('short_description') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- SKU -->
                    <div class="md:col-span-4">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">SKU Code *</label>
                        <input type="text" wire:model="sku" placeholder="e.g. RS-OIL-100" 
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('sku') border-red-400 @enderror">
                        @error('sku') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Category selection -->
                    <div class="md:col-span-4">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Category *</label>
                        <select wire:model="category_id" 
                                class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('category_id') border-red-400 @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Unit Size -->
                    <div class="md:col-span-4">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Unit Size *</label>
                        <input type="text" wire:model="unit_size" placeholder="e.g. 100ml, 250g" 
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('unit_size') border-red-400 @enderror">
                        @error('unit_size') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Regular Price -->
                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Regular Price (₹) *</label>
                        <input type="number" step="0.01" wire:model="price" placeholder="350.00" 
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('price') border-red-400 @enderror">
                        @error('price') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Sale Price -->
                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Sale Price (₹, Optional)</label>
                        <input type="number" step="0.01" wire:model="sale_price" placeholder="299.00" 
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('sale_price') border-red-400 @enderror">
                        @error('sale_price') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Stock Quantity -->
                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Stock Quantity *</label>
                        <input type="number" wire:model="stock_quantity" placeholder="50" 
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('stock_quantity') border-red-400 @enderror">
                        @error('stock_quantity') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Badge -->
                    <div class="md:col-span-3">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Badge Text (e.g., 100% Herbal)</label>
                        <input type="text" wire:model="badge" placeholder="e.g. 100% Herbal" 
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500">
                    </div>
                </div>

                <!-- Descriptive Information (Tabs content fields) -->
                <div class="space-y-4 border-t border-brand-green-100/60 pt-6">
                    <h4 class="font-serif text-sm font-bold text-brand-green-900">Product Tabs Description (for PDP layout)</h4>
                    
                    <!-- Key Benefits -->
                    <div>
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Key Benefits *</label>
                        <textarea wire:model="benefits" rows="3" placeholder="• Benefit 1&#10;• Benefit 2..." 
                                  class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('benefits') border-red-400 @enderror"></textarea>
                        @error('benefits') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Ingredients -->
                    <div>
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Ingredients & Ayurvedic Breakdown *</label>
                        <textarea wire:model="ingredients" rows="3" placeholder="• Herb 1 (Botanical Name) - Qty&#10;• Herb 2..." 
                                  class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('ingredients') border-red-400 @enderror"></textarea>
                        @error('ingredients') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Usage / Directions -->
                    <div>
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">How to Use / Directions *</label>
                        <textarea wire:model="usage" rows="3" placeholder="Directions for safe topical or oral administration..." 
                                  class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('usage') border-red-400 @enderror"></textarea>
                        @error('usage') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Image Uploads -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 border-t border-brand-green-100/60 pt-6">
                    <!-- Featured Image -->
                    <div class="md:col-span-6">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-2">Featured Image *</label>
                        <div class="flex items-center gap-2"
                             x-data="{ featuredName: 'No file chosen' }">
                            {{-- Hidden real input --}}
                            <input type="file" id="featuredFileInput" wire:model="featured_image"
                                   class="hidden"
                                   @change="featuredName = $event.target.files[0]?.name ?? 'No file chosen'">
                            {{-- Styled Choose File button --}}
                            <button type="button"
                                    onclick="document.getElementById('featuredFileInput').click()"
                                    class="flex items-center gap-2 px-4 py-2 rounded-xl border-2 border-dashed border-brand-green-300 bg-brand-green-50 hover:bg-brand-gold-50 hover:border-brand-gold-400 text-brand-green-800 transition-all flex-1 min-w-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0 text-brand-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-[11px] font-semibold truncate" x-text="featuredName === 'No file chosen' ? '📁 Choose Image…' : featuredName"></span>
                            </button>
                            {{-- Library button --}}
                            <button type="button"
                                    onclick="window.dispatchEvent(new CustomEvent('open-media-picker', { detail: { target: 'featured' } }))"
                                    class="flex-shrink-0 flex items-center gap-1.5 px-3 py-2 text-[10px] font-bold text-brand-green-800 bg-brand-green-50 border border-brand-green-200 rounded-xl hover:bg-brand-gold-50 hover:border-brand-gold-400 transition-all">
                                📂 Library
                            </button>
                        </div>
                        @error('featured_image') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror

                        <!-- Preview -->
                        <div class="mt-3">
                            @if ($featured_image)
                                <span class="text-[10px] text-brand-green-700/60 block mb-1">Temporary Preview:</span>
                                <div class="h-28 w-28 rounded-xl overflow-hidden border border-brand-green-200">
                                    <img src="{{ $featured_image->temporaryUrl() }}" class="w-full h-full object-cover">
                                </div>
                            @elseif ($existing_featured_image)
                                <span class="text-[10px] text-brand-green-700/60 block mb-1">Current Image:</span>
                                <div class="relative h-28 w-28 rounded-xl overflow-hidden border border-brand-green-200 bg-white cursor-pointer"
                                     x-data="{ hovered: false }"
                                     @mouseenter="hovered = true"
                                     @mouseleave="hovered = false">
                                    <img src="{{ (str_starts_with($existing_featured_image, 'http://') || str_starts_with($existing_featured_image, 'https://')) ? $existing_featured_image : \Illuminate\Support\Facades\Storage::url($existing_featured_image) }}" class="w-full h-full object-cover">
                                    <div x-show="hovered"
                                         x-transition:enter="transition ease-out duration-150"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         x-transition:leave="transition ease-in duration-100"
                                         x-transition:leave-start="opacity-100"
                                         x-transition:leave-end="opacity-0"
                                         style="display:none;"
                                         class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center gap-1">
                                        <button type="button" wire:click="$set('existing_featured_image', null)"
                                                class="flex flex-col items-center gap-0.5 text-white hover:text-red-300 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            <span class="text-[9px] font-bold uppercase tracking-wide leading-none">Remove</span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Gallery Images -->
                    <div class="md:col-span-6">
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-2">Gallery Images (Optional, Multi)</label>
                        <div class="flex items-center gap-2"
                             x-data="{ galleryLabel: 'No files chosen' }">
                            {{-- Hidden real input --}}
                            <input type="file" id="galleryFileInput" wire:model="new_gallery_images" multiple
                                   class="hidden"
                                   @change="galleryLabel = $event.target.files.length > 0 ? $event.target.files.length + ' file(s) selected' : 'No files chosen'">
                            {{-- Styled Choose Files button --}}
                            <button type="button"
                                    onclick="document.getElementById('galleryFileInput').click()"
                                    class="flex items-center gap-2 px-4 py-2 rounded-xl border-2 border-dashed border-brand-green-300 bg-brand-green-50 hover:bg-brand-gold-50 hover:border-brand-gold-400 text-brand-green-800 transition-all flex-1 min-w-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0 text-brand-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-[11px] font-semibold truncate" x-text="galleryLabel === 'No files chosen' ? '📁 Choose Images…' : galleryLabel"></span>
                            </button>
                            {{-- Library button --}}
                            <button type="button"
                                    onclick="window.dispatchEvent(new CustomEvent('open-media-picker', { detail: { target: 'gallery' } }))"
                                    class="flex-shrink-0 flex items-center gap-1.5 px-3 py-2 text-[10px] font-bold text-brand-green-800 bg-brand-green-50 border border-brand-green-200 rounded-xl hover:bg-brand-gold-50 hover:border-brand-gold-400 transition-all">
                                📂 Library
                            </button>
                        </div>
                        @error('new_gallery_images.*') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror

                        <!-- Preview -->
                        <div class="mt-3">
                            @if (count($new_gallery_images) > 0)
                                <span class="text-[10px] text-brand-green-700/60 block mb-1">New Uploads:</span>
                                <div class="flex gap-2 flex-wrap">
                                    @foreach($new_gallery_images as $gImg)
                                        <div class="h-16 w-16 rounded-xl overflow-hidden border border-brand-green-200">
                                            <img src="{{ $gImg->temporaryUrl() }}" class="w-full h-full object-cover">
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if (count($existing_gallery_images) > 0)
                                <span class="text-[10px] text-brand-green-700/60 block mb-1 {{ count($new_gallery_images) > 0 ? 'mt-3' : '' }}">Current Gallery:</span>
                                <div class="flex gap-3 flex-wrap">
                                    @foreach($existing_gallery_images as $gIndex => $gPath)
                                        @php
                                            $gUrl = (str_starts_with($gPath, 'http://') || str_starts_with($gPath, 'https://')) ? $gPath : \Illuminate\Support\Facades\Storage::url($gPath);
                                        @endphp
                                        <div class="relative h-16 w-16 rounded-xl overflow-hidden border border-brand-green-200 bg-white cursor-pointer"
                                             x-data="{ hovered: false }"
                                             @mouseenter="hovered = true"
                                             @mouseleave="hovered = false">
                                            {{-- Image --}}
                                            <img src="{{ $gUrl }}" class="w-full h-full object-cover">
                                            {{-- Dark overlay + trash icon on hover --}}
                                            <div x-show="hovered"
                                                 x-transition:enter="transition ease-out duration-150"
                                                 x-transition:enter-start="opacity-0"
                                                 x-transition:enter-end="opacity-100"
                                                 x-transition:leave="transition ease-in duration-100"
                                                 x-transition:leave-start="opacity-100"
                                                 x-transition:leave-end="opacity-0"
                                                 style="display:none;"
                                                 class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center gap-1">
                                                <button type="button"
                                                        wire:click="removeGalleryImage({{ $gIndex }})"
                                                        class="flex flex-col items-center gap-0.5 text-white hover:text-red-300 transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    <span class="text-[9px] font-bold uppercase tracking-wide leading-none">Remove</span>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Product Short Video Upload -->
                <div class="border-t border-brand-green-100/60 pt-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-base">🎬</span>
                        <label class="block text-[10px] font-bold text-brand-green-900 uppercase">Product Short Video (Optional)</label>
                    </div>
                    <p class="text-[10px] text-brand-green-700/60 font-medium mb-3">
                        Upload a short showcase video (10–30 seconds recommended). Accepted formats: MP4, WebM, MOV — max 50 MB.
                    </p>

                    <div class="flex items-center gap-2">
                        <input type="file" wire:model="product_video" accept="video/mp4,video/webm,video/quicktime"
                               class="text-xs text-brand-green-800 flex-1 min-w-0 file:mr-3 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-brand-green-100 file:text-brand-green-800 hover:file:bg-brand-green-200 transition-all">
                        <button type="button"
                                onclick="window.dispatchEvent(new CustomEvent('open-media-picker', { detail: { target: 'video' } }))"
                                class="flex-shrink-0 flex items-center gap-1.5 px-3 py-1.5 text-[10px] font-bold text-brand-green-800 bg-brand-green-50 border border-brand-green-200 rounded-lg hover:bg-brand-gold-50 hover:border-brand-gold-400 transition-all">
                            📂 Library
                        </button>
                    </div>
                    @error('product_video') <p class="text-[10px] text-red-600 mt-1.5 font-semibold">{{ $message }}</p> @enderror

                    <div wire:loading wire:target="product_video" class="mt-2 text-[10px] text-brand-green-700/60 font-medium animate-pulse">
                        ⏳ Uploading video…
                    </div>

                    @if ($product_video)
                        <div class="mt-3">
                            <span class="text-[10px] text-brand-green-700/60 block mb-1.5">📹 New Video Preview:</span>
                            <video src="{{ $product_video->temporaryUrl() }}" controls
                                   class="rounded-xl border border-brand-green-200 shadow-sm w-full max-w-sm" style="max-height:200px;">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @elseif ($existing_product_video)
                        <div class="mt-3">
                            <span class="text-[10px] text-brand-green-700/60 block mb-1.5">🎥 Current Video:</span>
                            <video src="{{ (str_starts_with($existing_product_video, 'http://') || str_starts_with($existing_product_video, 'https://')) ? $existing_product_video : \Illuminate\Support\Facades\Storage::url($existing_product_video) }}"
                                   controls class="rounded-xl border border-brand-green-200 shadow-sm w-full max-w-sm" style="max-height:200px;">
                                Your browser does not support the video tag.
                            </video>
                            <p class="text-[10px] text-brand-green-700/60 mt-1.5 font-medium">Upload a new video above to replace this one.</p>
                        </div>
                    @endif
                </div>

                <!-- Toggle Options -->
                <div class="flex flex-wrap gap-6 pt-2">
                    <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-brand-green-900 uppercase">
                        <input type="checkbox" wire:model="is_active" class="h-4.5 w-4.5 text-brand-green-800 focus:ring-brand-gold-500 border-brand-green-200 rounded">
                        <span>Active Storefront Listing</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-brand-green-900 uppercase">
                        <input type="checkbox" wire:model="is_featured" class="h-4.5 w-4.5 text-brand-green-800 focus:ring-brand-gold-500 border-brand-green-200 rounded">
                        <span>Highlight as Featured</span>
                    </label>
                </div>

                <!-- Modal Actions -->
                <div class="border-t border-brand-green-100/60 pt-5 flex justify-end gap-3.5">
                    <button type="button" wire:click="closeForm"
                            class="px-5 py-2 border border-brand-green-200 rounded-full text-xs font-semibold text-brand-green-800 bg-white hover:bg-brand-green-50 transition-all">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-6 py-2 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-full text-xs font-semibold shadow-sm transition-all">
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
