<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Store Settings</h2>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <form wire:submit="saveSettings" class="space-y-6">
        <!-- Order Notifications & Fulfillment -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center gap-2 mb-2">
                <span class="text-xl">📲</span>
                <h3 class="text-lg font-medium text-gray-900">Order Fulfillment WhatsApp Desk</h3>
            </div>
            <p class="text-xs text-gray-500 mb-4">
                The WhatsApp number of the staff member / person in charge who handles order packing and dispatch. In Order Management, admin can click the green WhatsApp button on any order to instantly forward the complete order details to this number.
            </p>
            
            <div class="max-w-md">
                <label for="order_whatsapp_number" class="block text-sm font-medium text-gray-700">Order Handler WhatsApp Number</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" wire:model="order_whatsapp_number" id="order_whatsapp_number" 
                           placeholder="+91 94473 65545" 
                           class="block w-full rounded-md border-gray-300 focus:border-green-500 focus:ring-green-500 sm:text-sm font-mono">
                </div>
                <p class="text-[11px] text-gray-500 mt-1">Default: <strong>+91 94473 65545</strong>. You can update this anytime when the order handling person or number changes.</p>
                @error('order_whatsapp_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Shipping Configuration -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Shipping Configuration</h3>
            
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
        </div>

        <div>
            <button type="submit" class="inline-flex justify-center py-2.5 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 cursor-pointer">
                Save Settings
            </button>
        </div>
    </form>
</div>
