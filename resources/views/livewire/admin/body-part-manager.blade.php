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
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search body parts (e.g. Hair, Skin, Eye)..."
                   class="w-full bg-white border border-brand-green-100 rounded-xl py-2 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 shadow-sm">
        </div>
        <!-- Add Button -->
        <button wire:click="openCreateForm" 
                class="px-5 py-2.5 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-xl text-xs font-semibold shadow-sm flex items-center gap-1.5 transition-all">
            ➕ Add Body Care Area
        </button>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-brand-green-100/60 rounded-2xl shadow-sm overflow-hidden text-left">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-brand-green-100/50">
                <thead class="bg-brand-green-50/50 text-[10px] font-bold text-brand-green-900 uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Image / Icon</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Slug</th>
                        <th class="px-6 py-4 text-center">Sort Order</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-green-100/30 text-xs text-brand-green-900 font-medium">
                    @forelse($bodyParts as $part)
                        <tr class="hover:bg-brand-green-50/20 transition-colors">
                            <td class="px-6 py-4">
                                @if($part->image_url)
                                    <img src="{{ $part->image_url }}" alt="{{ $part->name }}" class="h-10 w-10 rounded-full object-cover border border-brand-gold-500/30 shadow-xs">
                                @else
                                    <div class="h-10 w-10 rounded-full bg-brand-green-50 border border-brand-green-100 flex items-center justify-center text-brand-green-600 text-lg">🧘</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-brand-green-900">
                                <div>{{ $part->name }}</div>
                                @if($part->description)
                                    <div class="text-[11px] text-brand-green-700/60 font-normal truncate max-w-xs">{{ $part->description }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-brand-green-700">{{ $part->slug }}</td>
                            <td class="px-6 py-4 text-center font-mono text-xs text-brand-green-800">{{ $part->sort_order }}</td>
                            <td class="px-6 py-4 text-center">
                                <button wire:click="toggleStatus({{ $part->id }})" 
                                        class="px-2.5 py-1 rounded-full text-[10px] font-semibold border transition-all inline-flex items-center gap-1 cursor-pointer"
                                        :class="'{{ $part->is_active }}' ? 'bg-green-50 text-green-700 border-green-200' : 'bg-red-50 text-red-700 border-red-200'">
                                    {{ $part->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button wire:click="openEditForm({{ $part->id }})" class="text-brand-gold-600 hover:text-brand-gold-700 font-bold">Edit</button>
                                <button wire:click="deleteBodyPart({{ $part->id }})" 
                                        onclick="confirm('Are you sure you want to delete this body care area? Products will remain intact.') || event.stopImmediatePropagation()"
                                        class="text-red-600 hover:text-red-700 font-bold">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-brand-green-700/60 font-medium">
                                No body care areas found. Click "Add Body Care Area" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($bodyParts->hasPages())
            <div class="px-6 py-4 border-t border-brand-green-100/50">
                {{ $bodyParts->links() }}
            </div>
        @endif
    </div>

    <!-- Body Part Modal Overlay -->
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
            
            <div class="p-6 border-b border-brand-green-100/60 flex justify-between items-center bg-brand-green-50/50">
                <h3 class="font-serif text-lg font-bold text-brand-green-900">
                    {{ $bodyPartId ? 'Edit Targeted Body Care Area' : 'Add Targeted Body Care Area' }}
                </h3>
                <button wire:click="closeForm" class="text-brand-green-600 hover:text-brand-green-800 text-xl font-bold">&times;</button>
            </div>

            <form wire:submit.prevent="saveBodyPart" class="p-6 space-y-4">
                <!-- Name -->
                <div>
                    <label class="block text-xs font-semibold text-brand-green-900 mb-1.5">Area Name (e.g. Hair, Skin, Eye, Chest) *</label>
                    <input type="text" wire:model.live="name" placeholder="e.g. Hair" 
                           class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500">
                    @error('name') <span class="text-[10px] text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label class="block text-xs font-semibold text-brand-green-900 mb-1.5">Slug *</label>
                    <input type="text" wire:model="slug" placeholder="e.g. hair" 
                           class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500">
                    @error('slug') <span class="text-[10px] text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label class="block text-xs font-semibold text-brand-green-900 mb-1.5">Display Order (Lower numbers appear first)</label>
                    <input type="number" wire:model="sort_order" min="0" placeholder="0" 
                           class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500">
                    @error('sort_order') <span class="text-[10px] text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-xs font-semibold text-brand-green-900 mb-1.5">Description (Optional)</label>
                    <textarea wire:model="description" rows="2" placeholder="Brief info about what this area addresses..." 
                              class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500"></textarea>
                    @error('description') <span class="text-[10px] text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-xs font-semibold text-brand-green-900 mb-1.5">Image / Illustration</label>
                    @if ($body_part_image)
                        <div class="mb-2 flex items-center gap-3">
                            <img src="{{ $body_part_image->temporaryUrl() }}" class="h-16 w-16 object-cover rounded-full border-2 border-brand-gold-500">
                            <span class="text-[10px] text-brand-green-700">New Image Preview</span>
                        </div>
                    @elseif ($existing_image)
                        <div class="mb-2 flex items-center gap-3">
                            <img src="{{ str_starts_with($existing_image, 'http') ? $existing_image : \Illuminate\Support\Facades\Storage::url($existing_image) }}" class="h-16 w-16 object-cover rounded-full border border-brand-green-200">
                            <span class="text-[10px] text-brand-green-700">Current Image</span>
                        </div>
                    @endif
                    <input type="file" wire:model="body_part_image" accept="image/*"
                           class="block w-full text-xs text-brand-green-700 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-green-50 file:text-brand-green-800 hover:file:bg-brand-green-100 cursor-pointer">
                    <p class="text-[10px] text-brand-green-600/70 mt-1">Recommended: square image or illustration (e.g. 400x400 PNG/WebP/SVG).</p>
                    @error('body_part_image') <span class="text-[10px] text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Status Checkbox -->
                <div class="pt-2">
                    <label class="flex items-center gap-2 text-xs font-semibold text-brand-green-900 cursor-pointer">
                        <input type="checkbox" wire:model="is_active" 
                               class="rounded border-brand-green-300 text-brand-green-800 focus:ring-brand-gold-500 h-4 w-4">
                        <span>Active (Visible on Storefront)</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-3 pt-4 border-t border-brand-green-100">
                    <button type="button" wire:click="closeForm" 
                            class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs font-semibold transition-all">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-5 py-2 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-xl text-xs font-semibold shadow-sm transition-all">
                        {{ $bodyPartId ? 'Update Area' : 'Save Area' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
