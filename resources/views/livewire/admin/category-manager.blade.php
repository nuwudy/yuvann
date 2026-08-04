<div>
    <!-- Flash Messages -->
    @if(session()->has('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 text-xs font-semibold px-4 py-3 rounded-xl mb-6 text-left">
            🌿 {{ session('success') }}
        </div>
    @endif

    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <!-- Search -->
        <div class="relative w-full sm:w-80">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search categories..."
                   class="w-full bg-white border border-brand-green-100 rounded-xl py-2 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 shadow-sm">
        </div>
        <!-- Add Button -->
        <button wire:click="openCreateForm" 
                class="px-5 py-2.5 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-xl text-xs font-semibold shadow-sm flex items-center gap-1.5 transition-all">
            ➕ Add Category
        </button>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-brand-green-100/60 rounded-2xl shadow-sm overflow-hidden text-left">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-brand-green-100/50">
                <thead class="bg-brand-green-50/50 text-[10px] font-bold text-brand-green-900 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Image</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Slug</th>
                        <th class="px-6 py-4">Description</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-green-100/30 text-xs text-brand-green-900 font-medium">
                    @forelse($categories as $category)
                        <tr class="hover:bg-brand-green-50/20 transition-colors">
                            <td class="px-6 py-4">
                                @if($category->image_url)
                                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="h-10 w-10 rounded-lg object-cover border border-brand-green-100">
                                @else
                                    <div class="h-10 w-10 rounded-lg bg-brand-green-50 border border-brand-green-100 flex items-center justify-center text-brand-green-400 text-lg">🌿</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-brand-green-900">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-brand-green-700">{{ $category->slug }}</td>
                            <td class="px-6 py-4 text-brand-green-700/80 max-w-xs truncate">{{ $category->description ?? '-' }}</td>
                            <td class="px-6 py-4 text-center">
                                <button wire:click="toggleStatus({{ $category->id }})" 
                                        class="px-2.5 py-1 rounded-full text-[10px] font-semibold border transition-all inline-flex items-center gap-1"
                                        style="cursor: pointer;"
                                        :class="'{{ $category->is_active }}' ? 'bg-green-50 text-green-700 border-green-200' : 'bg-red-50 text-red-700 border-red-200'">
                                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button wire:click="openEditForm({{ $category->id }})" class="text-brand-gold-600 hover:text-brand-gold-700 font-bold">Edit</button>
                                <button wire:click="deleteCategory({{ $category->id }})" 
                                        onclick="confirm('Are you sure you want to delete this category? All associated products will be deleted!') || event.stopImmediatePropagation()"
                                        class="text-red-600 hover:text-red-700 font-bold">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-brand-green-700/60 font-medium">
                                No categories found. Click "Add Category" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($categories->hasPages())
            <div class="px-6 py-4 border-t border-brand-green-100/50">
                {{ $categories->links() }}
            </div>
        @endif
    </div>

    <!-- Category Modal Overlay -->
    <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center p-4" 
         x-data="{ isOpen: @entangle('isFormOpen') }" 
         x-show="isOpen" 
         style="display: none;">
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-[#0e241b]/60 backdrop-blur-sm transition-opacity" @click="isOpen = false"></div>

        <!-- Modal Card -->
        <div class="bg-white rounded-3xl border border-brand-green-100 overflow-hidden shadow-2xl max-w-lg w-full z-10 text-left"
             x-show="isOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            
            <div class="px-6 py-5 border-b border-brand-green-100 bg-brand-green-900 text-white flex justify-between items-center">
                <h3 class="text-base font-serif font-bold text-brand-gold-100">
                    {{ $categoryId ? 'Modify Category' : 'Create Category' }}
                </h3>
                <button wire:click="closeForm" class="text-brand-green-100 hover:text-brand-gold-400 focus:outline-none p-1 rounded-full hover:bg-brand-green-800 transition-colors">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form wire:submit.prevent="saveCategory" class="p-6 space-y-4">
                <!-- Name -->
                <div>
                    <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Category Name *</label>
                    <input type="text" wire:model.live="name" placeholder="e.g. Women's Care" 
                           class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('name') border-red-400 @enderror">
                    @error('name') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Slug *</label>
                    <input type="text" wire:model="slug" placeholder="e.g. womens-care" 
                           class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('slug') border-red-400 @enderror">
                    @error('slug') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-1.5">Description (Optional)</label>
                    <textarea wire:model="description" rows="3" placeholder="Brief outline of this category's products..." 
                              class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500"></textarea>
                </div>

                <!-- Category Image -->
                <div>
                    <label class="block text-[10px] font-bold text-brand-green-900 uppercase mb-2">Category Image (Optional)</label>
                    <div class="flex items-center gap-2" x-data="{ imgName: 'No file chosen' }">
                        {{-- Hidden file input --}}
                        <input type="file" id="categoryImageInput" wire:model="category_image"
                               class="hidden"
                               @change="imgName = $event.target.files[0]?.name ?? 'No file chosen'">
                        {{-- Styled Choose button --}}
                        <button type="button"
                                onclick="document.getElementById('categoryImageInput').click()"
                                class="flex items-center gap-2 px-4 py-2 rounded-xl border-2 border-dashed border-brand-green-300 bg-brand-green-50 hover:bg-brand-gold-50 hover:border-brand-gold-400 text-brand-green-800 transition-all flex-1 min-w-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0 text-brand-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-[11px] font-semibold truncate" x-text="imgName === 'No file chosen' ? '📁 Choose Image…' : imgName"></span>
                        </button>
                    </div>
                    @error('category_image') <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> @enderror

                    {{-- Preview: new upload --}}
                    @if ($category_image)
                        <div class="mt-3">
                            <span class="text-[10px] text-brand-green-700/60 block mb-1">New Image Preview:</span>
                            <div class="h-24 w-24 rounded-xl overflow-hidden border border-brand-green-200">
                                <img src="{{ $category_image->temporaryUrl() }}" class="w-full h-full object-cover">
                            </div>
                        </div>
                    @elseif ($existing_image)
                        <div class="mt-3">
                            <span class="text-[10px] text-brand-green-700/60 block mb-1">Current Image:</span>
                            <div class="relative h-24 w-24 rounded-xl overflow-hidden border border-brand-green-200 bg-white cursor-pointer"
                                 x-data="{ hovered: false }"
                                 @mouseenter="hovered = true"
                                 @mouseleave="hovered = false">
                                <img src="{{ (str_starts_with($existing_image, 'http://') || str_starts_with($existing_image, 'https://')) ? $existing_image : \Illuminate\Support\Facades\Storage::url($existing_image) }}" class="w-full h-full object-cover">
                                <div x-show="hovered"
                                     x-transition:enter="transition ease-out duration-150"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     x-transition:leave="transition ease-in duration-100"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     style="display:none;"
                                     class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center gap-1">
                                    <button type="button" wire:click="$set('existing_image', null)"
                                            class="flex flex-col items-center gap-0.5 text-white hover:text-red-300 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        <span class="text-[9px] font-bold uppercase tracking-wide leading-none">Remove</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Status Toggle -->
                <div class="flex items-center gap-3 pt-2">
                    <input type="checkbox" id="category_active" wire:model="is_active" 
                           class="h-4.5 w-4.5 text-brand-green-800 focus:ring-brand-gold-500 border-brand-green-200 rounded">
                    <label for="category_active" class="text-xs font-bold text-brand-green-900 uppercase cursor-pointer">Mark Category as Active</label>
                </div>

                <!-- Actions -->
                <div class="border-t border-brand-green-100/60 pt-5 flex justify-end gap-3.5">
                    <button type="button" wire:click="closeForm" 
                            class="px-5 py-2 border border-brand-green-200 rounded-full text-xs font-semibold text-brand-green-800 bg-white hover:bg-brand-green-50 transition-all">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-6 py-2 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-full text-xs font-semibold shadow-sm transition-all">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
