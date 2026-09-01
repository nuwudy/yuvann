<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Header -->
    <div class="text-left border-b border-brand-green-100 pb-6 mb-8">
        <h1 class="text-3xl font-serif font-bold text-brand-green-900">Secure Checkout</h1>
        <p class="text-xs sm:text-sm text-brand-green-700/70 mt-1.5">Provide your shipping details below to place your order and initiate WhatsApp delivery routing.</p>
    </div>

    @if(session()->has('error'))
        <div class="bg-red-50 border border-red-200 text-red-800 text-xs font-semibold px-4 py-3 rounded-xl mb-6 text-left">
            ⚠️ {{ session('error') }}
        </div>
    @endif
    
    @if($subtotal < $freeShippingThreshold)
        <div class="bg-blue-50 border border-blue-200 text-blue-800 text-xs font-semibold px-4 py-3 rounded-xl mb-6 text-left">
            ℹ️ Add ₹{{ number_format($freeShippingThreshold - $subtotal, 2) }} more to your cart to get Free Shipping!
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Side: Billing/Shipping Form -->
        <div class="lg:col-span-7 bg-white p-6 sm:p-8 rounded-2xl border border-brand-green-100/60 shadow-sm text-left">
            <h2 class="text-lg font-serif font-bold text-brand-green-900 mb-6">1. Customer & Shipping Details</h2>
            
            <form wire:submit.prevent="placeOrder" class="space-y-5">
                <!-- Customer Name -->
                <div>
                    <label for="name" class="block text-xs font-bold text-brand-green-900 uppercase mb-2">Full Name *</label>
                    <input type="text" id="name" wire:model="customer_name" placeholder="John Doe" 
                           class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('customer_name') border-red-400 @enderror">
                    @error('customer_name') 
                        <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Customer Phone -->
                    <div>
                        <label for="phone" class="block text-xs font-bold text-brand-green-900 uppercase mb-2">WhatsApp Phone Number *</label>
                        <input type="text" id="phone" wire:model="customer_phone" placeholder="e.g. 9876543210" 
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('customer_phone') border-red-400 @enderror">
                        <span class="text-[9px] text-brand-green-700/50 mt-1 block">Used to initiate confirmation messaging.</span>
                        @error('customer_phone') 
                            <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Customer Email -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-brand-green-900 uppercase mb-2">Email Address (Optional)</label>
                        <input type="email" id="email" wire:model="customer_email" placeholder="johndoe@example.com" 
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('customer_email') border-red-400 @enderror">
                        @error('customer_email') 
                            <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

                <!-- Shipping Address -->
                <div>
                    <label for="address" class="block text-xs font-bold text-brand-green-900 uppercase mb-2">Full Shipping Address *</label>
                    <textarea id="address" wire:model="shipping_address" rows="4" placeholder="House/Flat No., Street Name, Landmark, City, State, Pincode" 
                              class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('shipping_address') border-red-400 @enderror"></textarea>
                    @error('shipping_address') 
                        <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="block text-xs font-bold text-brand-green-900 uppercase mb-2">Order Notes / Consult Request (Optional)</label>
                    <textarea id="notes" wire:model="notes" rows="2" placeholder="e.g. Please send instructions, schedule consultation with Dr. Sajeev Dev, etc." 
                              class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500"></textarea>
                </div>

                <!-- Payment Method Selection -->
                <div class="pt-2 border-t border-brand-green-100/60">
                    <h2 class="text-base font-serif font-bold text-brand-green-900 mb-3">2. Choose Payment Method</h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                        <!-- Razorpay Online Option -->
                        <label class="relative flex flex-col p-4 rounded-xl border-2 cursor-pointer transition-all {{ $payment_method === 'razorpay' ? 'border-brand-green-800 bg-brand-green-50/40 shadow-sm' : 'border-brand-green-100 hover:border-brand-green-300 bg-white' }}">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2.5">
                                    <input type="radio" wire:model.live="payment_method" value="razorpay" class="text-brand-green-800 focus:ring-brand-gold-500">
                                    <span class="text-xs font-bold text-brand-green-900">Pay Online</span>
                                </div>
                                <span class="text-xs">💳</span>
                            </div>
                            <p class="text-[11px] text-brand-green-700/80 pl-6 leading-relaxed">UPI (GPay/PhonePe), Credit & Debit Cards, NetBanking via Razorpay.</p>
                        </label>

                        <!-- WhatsApp Order Option -->
                        <label class="relative flex flex-col p-4 rounded-xl border-2 cursor-pointer transition-all {{ $payment_method === 'whatsapp' ? 'border-green-600 bg-green-50/50 shadow-sm' : 'border-brand-green-100 hover:border-green-300 bg-white' }}">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2.5">
                                    <input type="radio" wire:model.live="payment_method" value="whatsapp" class="text-green-600 focus:ring-green-500">
                                    <span class="text-xs font-bold text-brand-green-900">Order via WhatsApp</span>
                                </div>
                                <svg class="w-4 h-4 fill-current text-green-600" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                                </svg>
                            </div>
                            <p class="text-[11px] text-brand-green-700/80 pl-6 leading-relaxed">Pay offline, direct UPI QR, or consult directly with Dr. Sajeev Dev.</p>
                        </label>
                    </div>
                </div>

                <!-- Place Order CTA Button -->
                <div class="pt-2">
                    @if($payment_method === 'whatsapp')
                        <button type="submit" 
                                class="w-full py-4 px-6 bg-green-600 hover:bg-green-700 text-white rounded-full font-bold shadow-md hover:shadow-lg transition-all focus:outline-none flex justify-center items-center gap-2 text-sm">
                            <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                            </svg>
                            Place Order via WhatsApp • ₹{{ number_format($totalAmount, 2) }}
                        </button>
                        <p class="text-[10px] text-brand-green-700/60 mt-3 text-center">Your order details will be sent directly to Dr. Sajeev Dev on WhatsApp for confirmation.</p>
                    @else
                        <button type="submit" 
                                class="w-full py-4 px-6 bg-brand-green-800 hover:bg-brand-green-700 text-white rounded-full font-bold shadow-md hover:shadow-lg transition-all focus:outline-none flex justify-center items-center gap-2 text-sm">
                            <svg class="w-4 h-4 fill-current text-brand-gold-400" viewBox="0 0 24 24">
                                <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                            </svg>
                            Pay Securely with Razorpay • ₹{{ number_format($totalAmount, 2) }}
                        </button>
                        <p class="text-[10px] text-brand-green-700/50 mt-3 text-center">Your payment will be processed securely via 256-bit encryption.</p>
                    @endif
                </div>
            </form>
        </div>

        <!-- Right Side: Order Summary Card -->
        <div class="lg:col-span-5 space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-brand-green-100/60 shadow-sm text-left">
                <h2 class="text-lg font-serif font-bold text-brand-green-900 border-b border-brand-green-100/50 pb-4 mb-4">Order Summary</h2>
                
                <!-- Items list -->
                <ul class="divide-y divide-brand-green-100/30 max-h-80 overflow-y-auto mb-4">
                    @foreach($cartItems as $item)
                        <li class="flex py-4">
                            <div class="h-14 w-14 flex-shrink-0 overflow-hidden rounded-lg border border-brand-green-100 bg-white">
                                <img src="{{ str_starts_with($item['featured_image'], 'http') ? $item['featured_image'] : \Illuminate\Support\Facades\Storage::url($item['featured_image']) }}" alt="{{ $item['name'] }}" class="h-full w-full object-cover">
                            </div>
                            <div class="ml-4 flex-1 flex flex-col justify-between">
                                <div class="flex justify-between text-xs font-semibold text-brand-green-900">
                                    <h3>{{ $item['name'] }}</h3>
                                    <p class="ml-2">₹{{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                                </div>
                                <div class="flex justify-between text-[10px] text-brand-green-700/60 font-medium">
                                    <p>{{ $item['unit_size'] }}</p>
                                    <p>Qty: {{ $item['quantity'] }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- Pricing breakdown -->
                <div class="border-t border-brand-green-100/60 pt-4 space-y-2 text-xs">
                    <div class="flex justify-between text-brand-green-700/80 font-medium">
                        <span>Items Subtotal</span>
                        <span>₹{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-brand-green-700/80 font-medium">
                        <span>Shipping Fee</span>
                        @if($shippingAmount == 0)
                            <span class="text-green-700 font-semibold uppercase">Free</span>
                        @else
                            <span>₹{{ number_format($shippingAmount, 2) }}</span>
                        @endif
                    </div>
                    <hr class="border-brand-green-100/50 my-2">
                    <div class="flex justify-between text-sm font-bold text-brand-green-900">
                        <span>Total Amount</span>
                        <span>₹{{ number_format($totalAmount, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Trust Badge Card -->
            <div class="bg-brand-green-50/50 border border-brand-green-100 rounded-2xl p-5 text-left space-y-4">
                <h3 class="text-xs font-bold text-brand-green-900 uppercase tracking-wide">Yuvann Health Guarantee</h3>
                <div class="space-y-3.5">
                    <div class="flex items-start gap-3">
                        <span class="text-lg">🛡️</span>
                        <div>
                            <h4 class="text-xs font-semibold text-brand-green-900 leading-tight">Flexible Payment Options</h4>
                            <p class="text-[10px] text-brand-green-700/60 mt-0.5">Pay online via Razorpay or place your order directly via WhatsApp.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-lg">💬</span>
                        <div>
                            <h4 class="text-xs font-semibold text-brand-green-900 leading-tight">Direct Doctor Support</h4>
                            <p class="text-[10px] text-brand-green-700/60 mt-0.5">You can connect with Dr. Sajeev Dev's clinical desk for consultation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Razorpay Script & WhatsApp Dispatcher -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('open-whatsapp-order', (options) => {
                const data = Array.isArray(options) ? options[0] : options;
                if (data && data.url) {
                    window.open(data.url, '_blank');
                }
                if (data && data.redirect) {
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 300);
                }
            });

            Livewire.on('initiate-razorpay', (options) => {
                var rzp1 = new Razorpay({
                    key: options[0].key,
                    amount: options[0].amount,
                    currency: "INR",
                    name: "Yuvann Wellness",
                    description: "Order Checkout",
                    order_id: options[0].order_id,
                    handler: function (response){
                        @this.verifyPayment(response.razorpay_payment_id, response.razorpay_order_id, response.razorpay_signature);
                    },
                    prefill: {
                        name: options[0].name,
                        email: options[0].email,
                        contact: options[0].contact
                    },
                    theme: {
                        color: "#1a3d2b"
                    },
                    modal: {
                        ondismiss: function() {
                            alert("Payment was cancelled. You can try again.");
                        }
                    }
                });
                
                rzp1.on('payment.failed', function (response){
                    alert("Payment failed: " + response.error.description);
                });
                
                rzp1.open();
            });
        });
    </script>
</div>
