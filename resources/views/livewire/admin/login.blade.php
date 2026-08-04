<div class="min-h-[70vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-brand-green-50/20">
    <div class="max-w-md w-full space-y-8 bg-white p-8 sm:p-10 rounded-3xl border border-brand-green-100 shadow-xl text-left">
        <!-- Brand Header -->
        <div class="text-center">
            <span class="text-3xl">🌿</span>
            <h2 class="mt-4 text-3xl font-serif font-bold text-brand-green-900">Admin Login</h2>
            <p class="mt-1.5 text-xs text-brand-green-700/60 font-medium">Yuvann Wellness Concepts Control Panel</p>
        </div>

        <form wire:submit.prevent="login" class="mt-8 space-y-6">
            <div class="space-y-4 rounded-md">
                <!-- Email Address -->
                <div>
                    <label for="email_address" class="block text-xs font-bold text-brand-green-900 uppercase mb-2">Email Address</label>
                    <input id="email_address" wire:model="email" type="email" autocomplete="email" placeholder="admin@yuvann.com"
                           class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 px-3.5 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('email') border-red-400 @enderror">
                    @error('email')
                        <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div x-data="{ showPassword: false }">
                    <label for="pwd" class="block text-xs font-bold text-brand-green-900 uppercase mb-2">Password</label>
                    <div class="relative">
                        <input id="pwd" wire:model="password"
                               :type="showPassword ? 'text' : 'password'"
                               autocomplete="current-password"
                               placeholder="••••••••"
                               class="w-full bg-brand-green-50/30 border border-brand-green-100 rounded-xl py-2.5 pl-3.5 pr-11 text-xs text-brand-green-900 focus:outline-none focus:ring-1 focus:ring-brand-gold-500 @error('password') border-red-400 @enderror">
                        <!-- Toggle button -->
                        <button type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-brand-green-400 hover:text-brand-green-700 transition-colors focus:outline-none"
                                :title="showPassword ? 'Hide password' : 'Show password'">
                            <!-- Eye icon (show) -->
                            <svg x-show="!showPassword" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <!-- Eye-off icon (hide) -->
                            <svg x-show="showPassword" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-[10px] text-red-600 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent text-sm font-bold rounded-full text-white bg-brand-green-800 hover:bg-brand-green-700 focus:outline-none shadow-md hover:shadow-lg transition-all">
                    Access Portal
                </button>
            </div>
        </form>
    </div>
</div>
