<div>
    <!-- Flash Messages -->
    @if(session()->has('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 text-xs font-semibold px-4 py-3 rounded-xl mb-6 text-left flex items-center justify-between">
            <span>🌿 {{ session('success') }}</span>
        </div>
    @endif

    <!-- Order Handler WhatsApp Notice & Quick Change Bar -->
    <div class="bg-gradient-to-r from-emerald-50 via-green-50 to-emerald-50 border border-emerald-200/80 rounded-2xl p-4 mb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 shadow-xs text-left">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-emerald-600 text-white flex items-center justify-center text-sm shadow-xs shrink-0">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.976L2 22l5.174-1.357a9.923 9.923 0 004.838 1.259h.005c5.505 0 9.988-4.479 9.988-9.985S17.518 2 12.012 2zM12.012 20.202h-.004a8.273 8.273 0 01-4.223-1.155l-.303-.18-3.138.823.836-3.062-.197-.314A8.252 8.252 0 013.69 11.984C3.691 7.42 7.408 3.702 11.97 3.702c4.545 0 8.243 3.714 8.243 8.283 0 4.56-3.7 8.272-8.201 8.217zM16.55 13.992c-.248-.124-1.472-.727-1.7-.811-.228-.084-.395-.124-.56.124-.167.248-.646.811-.79 9.977-.146.166-.293.187-.54.062-1.071-.539-2.583-1.638-3.197-2.317-.168-.186-.334-.187-.582-.062-.248.125-1.05.388-1.602 1.341-.55 1.05.021 1.554.499 2.502.167.332.083.623-.042.871-.125.248-.56 1.348-.767 1.846-.2.482-.403.417-.56.425-.145.008-.312.008-.479.008a.911.911 0 00-.663.309c-.228.248-.871.851-.871 2.073s.893 2.404 1.018 2.57c.125.166 1.752 2.673 4.246 3.75.594.256 1.057.41 1.419.524.595.189 1.137.162 1.564.098.48-.073 1.472-.602 1.68-1.184.208-.582.208-1.08.146-1.184-.062-.104-.228-.166-.476-.29z"/>
                </svg>
            </div>
            <div>
                <div class="text-[11px] font-bold uppercase tracking-wider text-emerald-950 flex items-center gap-1.5">
                    <span>Order Fulfillment WhatsApp Desk</span>
                    <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                </div>
                <div class="text-xs text-emerald-800 mt-0.5">
                    1-Click WhatsApp buttons forward order details & delivery address to:
                    <span class="font-bold font-mono text-emerald-950 bg-white px-2 py-0.5 rounded border border-emerald-300 ml-1">{{ $orderWhatsAppNumber }}</span>
                </div>
            </div>
        </div>

        <div class="shrink-0">
            @if(!$isEditingWhatsApp)
                <button wire:click="startEditingWhatsApp" 
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-emerald-900 bg-white hover:bg-emerald-100/70 border border-emerald-300 shadow-2xs transition-all cursor-pointer">
                    <span>✏️</span> <span>Change WhatsApp Number</span>
                </button>
            @else
                <div class="flex items-center gap-1.5">
                    <input type="text" wire:model="tempWhatsAppNumber" placeholder="+91 94473 65545" 
                           class="text-xs font-mono px-3 py-1.5 rounded-xl border-2 border-emerald-500 bg-white focus:outline-none focus:ring-2 focus:ring-emerald-400 w-44 text-gray-900">
                    <button wire:click="saveOrderWhatsAppNumber" class="px-3 py-1.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-xs cursor-pointer">
                        Save
                    </button>
                    <button wire:click="cancelEditingWhatsApp" class="px-2.5 py-1.5 rounded-xl text-xs font-medium text-gray-600 bg-gray-150 hover:bg-gray-200 cursor-pointer">
                        ✕
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Header Actions (Search and Filters) -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
            <div class="relative w-full sm:w-64">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search order ID, customer, phone..."
                       class="w-full bg-white border border-brand-green-100 rounded-xl py-2 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 shadow-sm">
            </div>
            <select wire:model.live="statusFilter" 
                    class="bg-white border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 shadow-sm">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            <select wire:model.live="paymentMethodFilter" 
                    class="bg-white border border-brand-green-100 rounded-xl py-2 px-3 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 shadow-sm">
                <option value="">All Payment Types</option>
                <option value="razorpay">Online (Razorpay)</option>
                <option value="whatsapp">WhatsApp Order</option>
            </select>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-brand-green-100/60 rounded-2xl shadow-sm overflow-hidden text-left">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-brand-green-100/50">
                <thead class="bg-brand-green-50/50 text-[10px] font-bold text-brand-green-900 uppercase tracking-wider">
                    <tr>
                        <th class="px-5 py-4">Order ID</th>
                        <th class="px-5 py-4">Date</th>
                        <th class="px-5 py-4">Customer</th>
                        <th class="px-5 py-4">Payment</th>
                        <th class="px-5 py-4">Total</th>
                        <th class="px-5 py-4 text-center">Status</th>
                        <th class="px-5 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-green-100/30 text-xs text-brand-green-900 font-medium">
                    @forelse($orders as $order)
                        <tr class="hover:bg-brand-green-50/20 transition-colors">
                            <td class="px-5 py-4 font-bold text-brand-green-900 font-mono text-xs">{{ $order->order_number }}</td>
                            <td class="px-5 py-4 text-brand-green-700 whitespace-nowrap">{{ $order->created_at->format('d-M-Y H:i') }}</td>
                            <td class="px-5 py-4">
                                <div class="font-semibold text-brand-green-900">{{ $order->customer_name }}</div>
                                <div class="text-[10px] text-brand-green-700/60 font-mono">{{ $order->customer_phone }}</div>
                            </td>
                            <td class="px-5 py-4">
                                @if($order->payment_method === 'whatsapp')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-green-50 text-green-700 border border-green-200 whitespace-nowrap">
                                        <svg class="w-3 h-3 fill-current text-green-600" viewBox="0 0 24 24">
                                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                                        </svg>
                                        WhatsApp
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200 whitespace-nowrap">
                                        💳 Razorpay
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4 font-bold text-brand-green-900 whitespace-nowrap">₹{{ number_format($order->total_amount, 2) }}</td>
                            <td class="px-5 py-4 text-center">
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-amber-50 text-amber-700 border border-amber-200',
                                        'processing' => 'bg-blue-50 text-blue-700 border border-blue-200',
                                        'completed' => 'bg-green-50 text-green-700 border border-green-200',
                                        'cancelled' => 'bg-red-50 text-red-700 border border-red-200',
                                    ];
                                    $col = $statusColors[$order->status] ?? 'bg-gray-50 text-gray-700 border border-gray-200';
                                @endphp
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold uppercase tracking-wider {{ $col }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <div class="inline-flex items-center gap-2 justify-end">
                                    <!-- 1-Click WhatsApp to Order Handler -->
                                    <a href="{{ $this->getWhatsAppFulfillmentUrl($order) }}" target="_blank"
                                       title="1-Click WhatsApp to Order Handler ({{ $orderWhatsAppNumber }})"
                                       class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg text-[10px] font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-xs transition-all hover:scale-105 shrink-0 whitespace-nowrap">
                                        <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24">
                                            <path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.976L2 22l5.174-1.357a9.923 9.923 0 004.838 1.259h.005c5.505 0 9.988-4.479 9.988-9.985S17.518 2 12.012 2zM12.012 20.202h-.004a8.273 8.273 0 01-4.223-1.155l-.303-.18-3.138.823.836-3.062-.197-.314A8.252 8.252 0 013.69 11.984C3.691 7.42 7.408 3.702 11.97 3.702c4.545 0 8.243 3.714 8.243 8.283 0 4.56-3.7 8.272-8.201 8.217zM16.55 13.992c-.248-.124-1.472-.727-1.7-.811-.228-.084-.395-.124-.56.124-.167.248-.646.811-.79 9.977-.146.166-.293.187-.54.062-1.071-.539-2.583-1.638-3.197-2.317-.168-.186-.334-.187-.582-.062-.248.125-1.05.388-1.602 1.341-.55 1.05.021 1.554.499 2.502.167.332.083.623-.042.871-.125.248-.56 1.348-.767 1.846-.2.482-.403.417-.56.425-.145.008-.312.008-.479.008a.911.911 0 00-.663.309c-.228.248-.871.851-.871 2.073s.893 2.404 1.018 2.57c.125.166 1.752 2.673 4.246 3.75.594.256 1.057.41 1.419.524.595.189 1.137.162 1.564.098.48-.073 1.472-.602 1.68-1.184.208-.582.208-1.08.146-1.184-.062-.104-.228-.166-.476-.29z"/>
                                        </svg>
                                        <span>WhatsApp</span>
                                    </a>

                                    <button wire:click="viewDetails({{ $order->id }})" class="text-brand-green-800 hover:text-brand-gold-600 font-bold text-xs px-1">Details</button>
                                    
                                    <select wire:change="updateStatus({{ $order->id }}, $event.target.value)" 
                                            class="bg-brand-green-50/50 border border-brand-green-100 rounded-lg py-1 px-1.5 text-[10px] font-bold text-brand-green-800 focus:outline-none">
                                        <option value="">Status</option>
                                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-brand-green-700/60 font-medium">
                                No orders found matching your search.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($orders->hasPages())
            <div class="px-6 py-4 border-t border-brand-green-100/50">
                {{ $orders->links() }}
            </div>
        @endif
    </div>

    <!-- Order Details Modal -->
    <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center p-4" 
         x-data="{ isOpen: @entangle('isDetailsOpen') }" 
         x-show="isOpen" 
         style="display: none;">
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-[#0e241b]/60 backdrop-blur-sm transition-opacity" @click="isOpen = false"></div>

        <!-- Modal Card -->
        <div class="bg-white rounded-3xl border border-brand-green-100 overflow-hidden shadow-2xl max-w-2xl w-full z-10 text-left"
             x-show="isOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            
            <div class="px-6 py-5 border-b border-brand-green-100 bg-brand-green-900 text-white flex justify-between items-center">
                <h3 class="text-base font-serif font-bold text-brand-gold-100">
                    Order details: {{ $selectedOrder?->order_number }}
                </h3>
                <button wire:click="closeDetails" class="text-brand-green-100 hover:text-brand-gold-400 focus:outline-none p-1 rounded-full hover:bg-brand-green-800 transition-colors">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            @if($selectedOrder)
                <div class="p-6 space-y-6 overflow-y-auto max-h-[70vh]">
                    <!-- PROMINENT ONE-CLICK WHATSAPP TO ORDER HANDLER BANNER -->
                    <div class="p-4 rounded-2xl bg-gradient-to-r from-emerald-500 via-green-600 to-emerald-600 text-white shadow-md flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-emerald-100 block">Fulfillment WhatsApp Dispatch</span>
                            <h4 class="text-sm font-bold text-white">Send Order to Handling Person ({{ $orderWhatsAppNumber }})</h4>
                        </div>
                        <a href="{{ $this->getWhatsAppFulfillmentUrl($selectedOrder) }}" target="_blank"
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white text-emerald-900 hover:bg-emerald-50 font-extrabold text-xs shadow-sm transition-all shrink-0 hover:scale-102">
                            <svg class="w-4 h-4 fill-current text-emerald-600" viewBox="0 0 24 24">
                                <path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.976L2 22l5.174-1.357a9.923 9.923 0 004.838 1.259h.005c5.505 0 9.988-4.479 9.988-9.985S17.518 2 12.012 2zM12.012 20.202h-.004a8.273 8.273 0 01-4.223-1.155l-.303-.18-3.138.823.836-3.062-.197-.314A8.252 8.252 0 013.69 11.984C3.691 7.42 7.408 3.702 11.97 3.702c4.545 0 8.243 3.714 8.243 8.283 0 4.56-3.7 8.272-8.201 8.217zM16.55 13.992c-.248-.124-1.472-.727-1.7-.811-.228-.084-.395-.124-.56.124-.167.248-.646.811-.79 9.977-.146.166-.293.187-.54.062-1.071-.539-2.583-1.638-3.197-2.317-.168-.186-.334-.187-.582-.062-.248.125-1.05.388-1.602 1.341-.55 1.05.021 1.554.499 2.502.167.332.083.623-.042.871-.125.248-.56 1.348-.767 1.846-.2.482-.403.417-.56.425-.145.008-.312.008-.479.008a.911.911 0 00-.663.309c-.228.248-.871.851-.871 2.073s.893 2.404 1.018 2.57c.125.166 1.752 2.673 4.246 3.75.594.256 1.057.41 1.419.524.595.189 1.137.162 1.564.098.48-.073 1.472-.602 1.68-1.184.208-.582.208-1.08.146-1.184-.062-.104-.228-.166-.476-.29z"/>
                            </svg>
                            <span>Forward to WhatsApp Handler</span>
                        </a>
                    </div>

                    <!-- Customer Details Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 border-b border-brand-green-100 pb-5">
                        <div class="space-y-1">
                            <span class="text-[9px] font-bold text-brand-green-700/60 uppercase">Customer Info</span>
                            <div class="text-xs font-bold text-brand-green-900">{{ $selectedOrder->customer_name }}</div>
                            <div class="text-xs text-brand-green-800 font-mono">{{ $selectedOrder->customer_phone }}</div>
                            @if($selectedOrder->customer_email)
                                <div class="text-xs text-brand-green-800">{{ $selectedOrder->customer_email }}</div>
                            @endif
                        </div>
                        <div class="space-y-1">
                            <span class="text-[9px] font-bold text-brand-green-700/60 uppercase">Shipping Address</span>
                            <div class="text-xs font-medium text-brand-green-900 leading-relaxed">{{ $selectedOrder->shipping_address }}</div>
                        </div>
                        <div class="space-y-1">
                            <span class="text-[9px] font-bold text-brand-green-700/60 uppercase">Payment & Chat</span>
                            <div class="text-xs font-bold text-brand-green-900">
                                @if($selectedOrder->payment_method === 'whatsapp')
                                    <span class="text-green-700">WhatsApp / Direct</span>
                                @else
                                    <span class="text-blue-700">Razorpay Online</span>
                                @endif
                            </div>
                            @if($selectedOrder->razorpay_payment_id)
                                <div class="text-[10px] text-brand-green-700/60 font-mono">ID: {{ $selectedOrder->razorpay_payment_id }}</div>
                            @endif
                            <div class="pt-1.5">
                                @php
                                    $cleanCustomerPhone = preg_replace('/[^0-9]/', '', $selectedOrder->customer_phone);
                                    if (strlen($cleanCustomerPhone) === 10) { $cleanCustomerPhone = '91' . $cleanCustomerPhone; }
                                    $customerChatUrl = "https://wa.me/{$cleanCustomerPhone}?text=" . urlencode("Hello {$selectedOrder->customer_name}, regarding your Yuvann order #{$selectedOrder->order_number}...");
                                @endphp
                                <a href="{{ $customerChatUrl }}" target="_blank" class="inline-flex items-center gap-1 text-[10px] font-bold text-green-700 hover:text-green-800 bg-green-50 px-2 py-1 rounded-md border border-green-200">
                                    <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                                    </svg>
                                    Chat with Customer
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Special notes -->
                    @if($selectedOrder->notes)
                        <div class="bg-brand-green-50/50 p-3 rounded-xl border border-brand-green-100 text-xs">
                            <strong class="text-brand-green-900 font-bold block mb-1">Customer Note:</strong>
                            <p class="text-brand-green-800 font-medium whitespace-pre-line">{{ $selectedOrder->notes }}</p>
                        </div>
                    @endif

                    <!-- Items Table -->
                    <div class="space-y-2">
                        <h4 class="text-xs font-bold text-brand-green-900 uppercase tracking-wide">Ordered Items</h4>
                        <div class="border border-brand-green-100/50 rounded-xl overflow-hidden">
                            <table class="min-w-full divide-y divide-brand-green-100/40 text-xs">
                                <thead class="bg-brand-green-50/50 text-[10px] font-bold text-brand-green-800">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Item Description</th>
                                        <th class="px-4 py-2 text-center">Unit</th>
                                        <th class="px-4 py-2 text-center">Price</th>
                                        <th class="px-4 py-2 text-center">Quantity</th>
                                        <th class="px-4 py-2 text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-brand-green-100/30 font-medium text-brand-green-950">
                                    @foreach($selectedOrder->items as $item)
                                        <tr>
                                            <td class="px-4 py-2.5 text-left font-bold">{{ $item->product_name }}</td>
                                            <td class="px-4 py-2.5 text-center text-brand-green-800">{{ $item->unit_size ?? '-' }}</td>
                                            <td class="px-4 py-2.5 text-center">₹{{ number_format($item->price, 2) }}</td>
                                            <td class="px-4 py-2.5 text-center">{{ $item->quantity }}</td>
                                            <td class="px-4 py-2.5 text-right font-bold">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Total / Change status inside details -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 pt-4 border-t border-brand-green-100/50">
                        <div class="text-sm font-bold text-brand-green-900">
                            Total Order Value: <span class="text-lg font-serif">₹{{ number_format($selectedOrder->total_amount, 2) }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-brand-green-800 font-bold uppercase">Change Status:</span>
                            <select wire:change="updateStatus({{ $selectedOrder->id }}, $event.target.value)" 
                                    class="bg-brand-green-50 border border-brand-green-100 rounded-xl py-1.5 px-3 text-xs font-bold text-brand-green-900 focus:outline-none">
                                <option value="pending" {{ $selectedOrder->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $selectedOrder->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $selectedOrder->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $selectedOrder->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
