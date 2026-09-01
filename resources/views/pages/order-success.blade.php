<x-layouts.app>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        <div class="bg-white p-8 rounded-2xl border border-brand-green-100 shadow-sm">
            <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            
            @if($order->payment_method === 'whatsapp')
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                    </svg>
                </div>
                
                <h1 class="text-3xl font-serif font-bold text-brand-green-900 mb-2">Order Received via WhatsApp!</h1>
                <p class="text-brand-green-700/80 mb-6">Thank you for your order, {{ $order->customer_name }}.</p>
                
                <div class="bg-brand-green-50/50 border border-brand-green-100 rounded-xl p-4 text-left max-w-sm mx-auto mb-8 space-y-2">
                    <div class="flex justify-between">
                        <span class="text-xs font-bold text-brand-green-900">Order ID:</span>
                        <span class="text-xs font-mono text-brand-green-800 font-bold">{{ $order->order_number }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs font-bold text-brand-green-900">Total Amount:</span>
                        <span class="text-xs text-brand-green-900 font-bold">₹{{ number_format($order->total_amount, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs font-bold text-brand-green-900">Payment Mode:</span>
                        <span class="text-xs text-green-700 font-semibold">WhatsApp / Offline UPI</span>
                    </div>
                </div>

                <p class="text-xs sm:text-sm text-brand-green-700/80 mb-6 max-w-md mx-auto">
                    If WhatsApp did not open automatically on your device, please click the button below to connect with Dr. Sajeev Dev with your order details.
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ \App\Services\WhatsAppService::buildOrderWhatsAppUrl($order) }}" target="_blank" class="py-3.5 px-6 bg-green-600 hover:bg-green-700 text-white rounded-full font-bold shadow-md transition-all text-sm flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                        </svg>
                        Send Order on WhatsApp
                    </a>
                    <a href="/products" class="py-3.5 px-6 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-full font-bold shadow-md transition-all text-sm">
                        Continue Shopping
                    </a>
                </div>
            @else
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                
                <h1 class="text-3xl font-serif font-bold text-brand-green-900 mb-2">Payment Successful!</h1>
                <p class="text-brand-green-700/80 mb-6">Thank you for your order, {{ $order->customer_name }}.</p>
                
                <div class="bg-brand-green-50/50 border border-brand-green-100 rounded-xl p-4 text-left max-w-sm mx-auto mb-8 space-y-2">
                    <div class="flex justify-between">
                        <span class="text-xs font-bold text-brand-green-900">Order ID:</span>
                        <span class="text-xs font-mono text-brand-green-800 font-bold">{{ $order->order_number }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-xs font-bold text-brand-green-900">Amount Paid:</span>
                        <span class="text-xs text-brand-green-900 font-bold">₹{{ number_format($order->total_amount, 2) }}</span>
                    </div>
                    @if($order->razorpay_payment_id)
                        <div class="flex justify-between">
                            <span class="text-xs font-bold text-brand-green-900">Payment ID:</span>
                            <span class="text-xs text-brand-green-700 font-mono">{{ $order->razorpay_payment_id }}</span>
                        </div>
                    @endif
                </div>

                <p class="text-sm text-brand-green-700/80 mb-8">
                    We'll process your order soon. You can connect with us on WhatsApp if you need further assistance.
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/products" class="py-3 px-6 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-full font-bold shadow-md transition-all text-sm">
                        Continue Shopping
                    </a>
                    <a href="https://wa.me/917736609299?text={{ urlencode('Hello, I have placed an order. Order ID: ' . $order->order_number) }}" target="_blank" class="py-3 px-6 bg-green-600 hover:bg-green-700 text-white rounded-full font-bold shadow-md transition-all text-sm flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                        </svg>
                        Contact on WhatsApp
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
