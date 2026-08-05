<div class="relative">
    <!-- Cart Trigger Button -->
    <button wire:click="toggleCart" class="relative p-2 text-brand-green-800 hover:text-brand-gold-600 transition-colors focus:outline-none focus:ring-2 focus:ring-brand-gold-500 rounded-full">
        <span class="sr-only">Open shopping cart</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        @if($totalQuantity > 0)
            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-white bg-brand-gold-600 rounded-full transform translate-x-1 -translate-y-1">
                {{ $totalQuantity }}
            </span>
        @endif
    </button>

    <!-- Side Drawer Cart overlay -->
    <template x-teleport="body">
        <div class="fixed inset-0 overflow-hidden z-[999]" 
             x-data="{ show: @entangle('isOpen') }" 
             x-show="show" 
             x-description="Portal-like modal backdrop"
             style="display: none;">
            
        <div class="absolute inset-0 overflow-hidden">
            <!-- Background Overlay -->
            <div class="absolute inset-0 bg-[#0e241b]/60 backdrop-blur-sm transition-opacity" 
                 x-show="show"
                 x-transition:enter="ease-in-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="show = false"></div>

            <!-- Slide-over panel -->
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div class="pointer-events-auto h-full w-screen max-w-md"
                     x-show="show"
                     x-transition:enter="transform transition ease-in-out duration-350"
                     x-transition:enter-start="translate-x-full"
                     x-transition:enter-end="translate-x-0"
                     x-transition:leave="transform transition ease-in-out duration-300"
                     x-transition:leave-start="translate-x-0"
                     x-transition:leave-end="translate-x-full">
                    
                    <div class="flex h-full flex-col bg-[#faf9f6] shadow-2xl border-l border-brand-green-100">
                        <!-- Drawer Header -->
                        <div class="px-6 py-5 border-b border-brand-green-100 flex items-center justify-between bg-brand-green-900 text-white">
                            <h2 class="text-lg font-serif font-semibold text-brand-gold-100">Your Wellness Cart</h2>
                            <button @click="show = false" class="text-brand-green-100 hover:text-brand-gold-400 focus:outline-none p-1 rounded-full hover:bg-brand-green-800 transition-colors">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Cart Items Area -->
                        <div class="flex-1 overflow-y-auto px-6 py-4">
                            @if(count($cartItems) > 0)
                                <ul role="list" class="-my-6 divide-y divide-brand-green-100/50">
                                    @foreach($cartItems as $item)
                                        <li class="flex py-6">
                                            <!-- Product Thumbnail -->
                                            <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg border border-brand-green-100 bg-white">
                                                <img src="{{ str_starts_with($item['featured_image'], 'http') ? $item['featured_image'] : \Illuminate\Support\Facades\Storage::url($item['featured_image']) }}" alt="{{ $item['name'] }}" class="h-full w-full object-cover">
                                            </div>

                                            <!-- Product details -->
                                            <div class="ml-4 flex flex-1 flex-col">
                                                <div>
                                                    <div class="flex justify-between text-sm font-semibold text-brand-green-900">
                                                        <h3>
                                                            <a href="/products/{{ $item['slug'] }}">{{ $item['name'] }}</a>
                                                        </h3>
                                                        <p class="ml-4 text-brand-green-900">₹{{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                                                    </div>
                                                    <p class="mt-1 text-xs text-brand-green-700/80">{{ $item['unit_size'] }}</p>
                                                </div>
                                                <div class="flex flex-1 items-end justify-between text-xs">
                                                    <!-- Quantity Controls -->
                                                    <div class="flex items-center border border-brand-green-200 rounded-full bg-white px-2 py-1 gap-2.5">
                                                        <button wire:click="decrementQuantity('{{ $item['cart_id'] }}')" class="text-brand-green-800 hover:text-brand-gold-600 focus:outline-none font-bold px-1 text-sm">-</button>
                                                        <span class="font-medium text-brand-green-900 w-4 text-center">{{ $item['quantity'] }}</span>
                                                        <button wire:click="incrementQuantity('{{ $item['cart_id'] }}')" class="text-brand-green-800 hover:text-brand-gold-600 focus:outline-none font-bold px-1 text-sm">+</button>
                                                    </div>

                                                    <!-- Remove Button -->
                                                    <div class="flex">
                                                        <button type="button" wire:click="removeItem('{{ $item['cart_id'] }}')" class="font-medium text-red-600 hover:text-red-800 transition-colors">
                                                            Remove
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="flex flex-col items-center justify-center h-64 text-center">
                                    <div class="w-16 h-16 bg-brand-green-50 rounded-full flex items-center justify-center text-brand-green-600 border border-brand-green-100 mb-4">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-sm font-semibold text-brand-green-900 font-serif">Your Cart is Empty</h3>
                                    <p class="text-xs text-brand-green-700/60 mt-1 max-w-xs">It looks like you haven't added any Ayurvedic wellness products yet.</p>
                                    <a href="/products" @click="show = false" class="mt-6 inline-flex items-center px-4 py-2 border border-transparent text-xs font-semibold rounded-full text-white bg-brand-green-800 hover:bg-brand-green-700 shadow-sm transition-all">
                                        Start Shopping
                                    </a>
                                </div>
                            @endif
                        </div>

                        <!-- Subtotal and Action Footer -->
                        @if(count($cartItems) > 0)
                            <div class="border-t border-brand-green-100 px-6 py-6 bg-brand-green-50/50">
                                <div class="flex justify-between text-base font-semibold text-brand-green-900">
                                    <p>Subtotal</p>
                                    <p>₹{{ number_format($subtotal, 2) }}</p>
                                </div>
                                <p class="mt-0.5 text-xs text-brand-green-700/80">Shipping and taxes calculated at checkout.</p>
                                <div class="mt-6 flex flex-col gap-3">
                                    <a href="/checkout" @click="show = false" class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-full text-sm font-semibold text-white bg-brand-green-800 hover:bg-brand-green-700 shadow-sm transition-all">
                                        Proceed to Checkout
                                    </a>
                                    <button @click="show = false" class="w-full flex items-center justify-center px-6 py-2.5 border border-brand-green-200 rounded-full text-xs font-semibold text-brand-green-800 bg-white hover:bg-brand-green-50 transition-all">
                                        Continue Shopping
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </template>
</div>
