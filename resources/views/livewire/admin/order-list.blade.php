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
                        <th class="px-6 py-4">Order ID</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Customer</th>
                        <th class="px-6 py-4">Payment</th>
                        <th class="px-6 py-4">Total</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-green-100/30 text-xs text-brand-green-900 font-medium">
                    @forelse($orders as $order)
                        <tr class="hover:bg-brand-green-50/20 transition-colors">
                            <td class="px-6 py-4 font-bold text-brand-green-900">{{ $order->order_number }}</td>
                            <td class="px-6 py-4 text-brand-green-700">{{ $order->created_at->format('d-M-Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-brand-green-900">{{ $order->customer_name }}</div>
                                <div class="text-[10px] text-brand-green-700/60">{{ $order->customer_phone }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($order->payment_method === 'whatsapp')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-green-50 text-green-700 border border-green-200">
                                        <svg class="w-3 h-3 fill-current text-green-600" viewBox="0 0 24 24">
                                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                                        </svg>
                                        WhatsApp
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                        💳 Razorpay
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-bold text-brand-green-900">₹{{ number_format($order->total_amount, 2) }}</td>
                            <td class="px-6 py-4 text-center">
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
                            <td class="px-6 py-4 text-right space-x-2">
                                <button wire:click="viewDetails({{ $order->id }})" class="text-brand-green-800 hover:text-brand-gold-600 font-bold">Details</button>
                                <select wire:change="updateStatus({{ $order->id }}, $event.target.value)" 
                                        class="bg-brand-green-50/50 border border-brand-green-100 rounded-lg py-1 px-1.5 text-[10px] font-bold text-brand-green-800 focus:outline-none">
                                    <option value="">Update Status</option>
                                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
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
                    <!-- Customer Details Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 border-b border-brand-green-100 pb-5">
                        <div class="space-y-1">
                            <span class="text-[9px] font-bold text-brand-green-700/60 uppercase">Customer Info</span>
                            <div class="text-xs font-bold text-brand-green-900">{{ $selectedOrder->customer_name }}</div>
                            <div class="text-xs text-brand-green-800">{{ $selectedOrder->customer_phone }}</div>
                            @if($selectedOrder->customer_email)
                                <div class="text-xs text-brand-green-800">{{ $selectedOrder->customer_email }}</div>
                            @endif
                        </div>
                        <div class="space-y-1">
                            <span class="text-[9px] font-bold text-brand-green-700/60 uppercase">Shipping Address</span>
                            <div class="text-xs font-medium text-brand-green-900 leading-relaxed">{{ $selectedOrder->shipping_address }}</div>
                        </div>
                        <div class="space-y-1">
                            <span class="text-[9px] font-bold text-brand-green-700/60 uppercase">Payment Method</span>
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
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $selectedOrder->customer_phone);
                                    if (strlen($cleanPhone) === 10) { $cleanPhone = '91' . $cleanPhone; }
                                    $adminChatUrl = "https://wa.me/{$cleanPhone}?text=" . urlencode("Hello {$selectedOrder->customer_name}, regarding your Yuvann order #{$selectedOrder->order_number}...");
                                @endphp
                                <a href="{{ $adminChatUrl }}" target="_blank" class="inline-flex items-center gap-1 text-[10px] font-bold text-green-700 hover:text-green-800 bg-green-50 px-2 py-1 rounded-md border border-green-200">
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
