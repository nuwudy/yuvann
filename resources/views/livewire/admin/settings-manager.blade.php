<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Store Settings</h2>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Shipping Configuration</h3>
        
        <form wire:submit="saveSettings">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div>
                    <label for="shipping_charge" class="block text-sm font-medium text-gray-700">Flat Shipping Charge (₹)</label>
                    <input type="number" step="0.01" wire:model="shipping_charge" id="shipping_charge" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm">
                    @error('shipping_charge') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="free_shipping_threshold" class="block text-sm font-medium text-gray-700">Free Shipping Threshold (₹)</label>
                    <input type="number" step="0.01" wire:model="free_shipping_threshold" id="free_shipping_threshold" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm">
                    @error('free_shipping_threshold') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                
            </div>

            <div class="mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
