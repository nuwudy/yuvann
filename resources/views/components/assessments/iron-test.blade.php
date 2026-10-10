<section id="iron-test" class="py-16 md:py-20 bg-brand-gold-50/60 relative">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8" x-data="ironQuiz()" x-cloak>
        
        <!-- Section Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-2 mb-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider text-brand-green-900 bg-brand-green-100 uppercase">
                    <span x-text="t('badge')">Clinical Ayurvedic Assessment</span>
                </span>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-gray-900" x-text="t('heading')"></h2>
            <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto mt-2" x-text="t('subheading')"></p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-5 sm:p-8 md:p-10 border border-gray-200/80 relative overflow-hidden">
            
            <!-- Global Floating Language Switcher Header -->
            <div class="flex flex-wrap items-center justify-between pb-4 mb-6 border-b border-gray-100 gap-3">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-1">
                        <span>🌐</span>
                        <span x-text="t('lang_label')">Language</span>:
                    </span>
                    <span class="text-xs font-extrabold text-brand-green-900 bg-brand-green-100/80 px-2.5 py-0.5 rounded-full" x-text="currentLangName"></span>
                </div>
                
                <div class="inline-flex p-1 bg-gray-100/90 rounded-full border border-gray-200/80 text-xs shadow-2xs">
                    <button type="button" @click="setLanguage('en')" 
                            :class="lang === 'en' ? 'bg-brand-green-800 text-white font-bold shadow-xs' : 'text-gray-600 hover:text-gray-900 font-medium'"
                            class="px-2.5 py-1 rounded-full transition-all cursor-pointer">
                        🇬🇧 EN
                    </button>
                    <button type="button" @click="setLanguage('ml')" 
                            :class="lang === 'ml' ? 'bg-brand-green-800 text-white font-bold shadow-xs' : 'text-gray-600 hover:text-gray-900 font-medium'"
                            class="px-2.5 py-1 rounded-full transition-all cursor-pointer">
                        🌴 മലയാളം
                    </button>
                    <button type="button" @click="setLanguage('hi')" 
                            :class="lang === 'hi' ? 'bg-brand-green-800 text-white font-bold shadow-xs' : 'text-gray-600 hover:text-gray-900 font-medium'"
                            class="px-2.5 py-1 rounded-full transition-all cursor-pointer">
                        🇮🇳 हिन्दी
                    </button>
                    <button type="button" @click="setLanguage('ta')" 
                            :class="lang === 'ta' ? 'bg-brand-green-800 text-white font-bold shadow-xs' : 'text-gray-600 hover:text-gray-900 font-medium'"
                            class="px-2.5 py-1 rounded-full transition-all cursor-pointer">
                        🌺 தமிழ்
                    </button>
                </div>
            </div>

            <!-- Step 0: Language Selection & Intro Screen -->
            <div x-show="step === 0" class="text-center py-2 sm:py-4">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-brand-green-50 text-brand-green-800 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-brand-green-200 shadow-sm">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-serif font-bold text-gray-900 mb-2" x-text="t('intro_title')"></h3>
                <p class="text-sm sm:text-base text-gray-600 max-w-lg mx-auto mb-6 leading-relaxed" x-text="t('intro_desc')"></p>

                <!-- Prominent Language Selector Cards -->
                <div class="mb-8 p-5 bg-gradient-to-br from-red-50/70 to-brand-gold-50/80 rounded-2xl border border-brand-gold-200/80 shadow-xs">
                    <label class="block text-xs font-black uppercase tracking-widest text-brand-green-950 mb-3 text-center">
                        <span class="inline-block mr-1">👇</span>
                        <span x-text="t('choose_lang_title')">Select Your Language / നിങ്ങളുടെ ഭാഷ തിരഞ്ഞെടുക്കുക</span>
                    </label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 max-w-xl mx-auto">
                        <button type="button" @click="selectLanguageAndStart('en')"
                                class="p-3.5 rounded-xl border-2 transition-all text-center flex flex-col items-center justify-center cursor-pointer hover:scale-105"
                                :class="lang === 'en' ? 'border-brand-green-800 bg-white shadow-md ring-2 ring-brand-green-600/20' : 'border-gray-200 bg-white/80 hover:bg-white hover:border-brand-green-600'">
                            <span class="text-2xl mb-1">🇬🇧</span>
                            <span class="font-bold text-sm text-gray-900">English</span>
                            <span class="text-[10px] text-gray-500 mt-0.5">Clinical English</span>
                        </button>

                        <button type="button" @click="selectLanguageAndStart('ml')"
                                class="p-3.5 rounded-xl border-2 transition-all text-center flex flex-col items-center justify-center cursor-pointer hover:scale-105"
                                :class="lang === 'ml' ? 'border-brand-green-800 bg-white shadow-md ring-2 ring-brand-green-600/20' : 'border-gray-200 bg-white/80 hover:bg-white hover:border-brand-green-600'">
                            <span class="text-2xl mb-1">🌴</span>
                            <span class="font-bold text-sm text-brand-green-950">മലയാളം</span>
                            <span class="text-[10px] text-gray-500 mt-0.5">Malayalam</span>
                        </button>

                        <button type="button" @click="selectLanguageAndStart('hi')"
                                class="p-3.5 rounded-xl border-2 transition-all text-center flex flex-col items-center justify-center cursor-pointer hover:scale-105"
                                :class="lang === 'hi' ? 'border-brand-green-800 bg-white shadow-md ring-2 ring-brand-green-600/20' : 'border-gray-200 bg-white/80 hover:bg-white hover:border-brand-green-600'">
                            <span class="text-2xl mb-1">🇮🇳</span>
                            <span class="font-bold text-sm text-gray-900">हिन्दी</span>
                            <span class="text-[10px] text-gray-500 mt-0.5">Hindi</span>
                        </button>

                        <button type="button" @click="selectLanguageAndStart('ta')"
                                class="p-3.5 rounded-xl border-2 transition-all text-center flex flex-col items-center justify-center cursor-pointer hover:scale-105"
                                :class="lang === 'ta' ? 'border-brand-green-800 bg-white shadow-md ring-2 ring-brand-green-600/20' : 'border-gray-200 bg-white/80 hover:bg-white hover:border-brand-green-600'">
                            <span class="text-2xl mb-1">🌺</span>
                            <span class="font-bold text-sm text-gray-900">தமிழ்</span>
                            <span class="text-[10px] text-gray-500 mt-0.5">Tamil</span>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 max-w-xl mx-auto mb-8 text-left">
                    <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200">
                        <span class="text-lg block mb-1">⏱️</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-gray-900" x-text="t('f1_title')"></h4>
                        <p class="text-[11px] text-gray-600 mt-0.5" x-text="t('f1_desc')"></p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200">
                        <span class="text-lg block mb-1">📲</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-gray-900" x-text="t('f2_title')"></h4>
                        <p class="text-[11px] text-gray-600 mt-0.5" x-text="t('f2_desc')"></p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200">
                        <span class="text-lg block mb-1">🌿</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-gray-900" x-text="t('f3_title')"></h4>
                        <p class="text-[11px] text-gray-600 mt-0.5" x-text="t('f3_desc')"></p>
                    </div>
                </div>

                <button type="button" 
                        @click="startQuiz()" 
                        class="inline-flex items-center justify-center px-8 sm:px-10 py-3.5 sm:py-4 text-base font-bold text-white bg-brand-green-800 hover:bg-brand-green-700 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5 cursor-pointer gap-2">
                    <span x-text="t('begin_btn')">Begin Assessment</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

            <!-- Quiz Stepper Header (Steps 1 to 10) -->
            <div x-show="step >= 1 && step <= 10" class="mb-6">
                <div class="flex items-center justify-between text-xs font-semibold text-gray-500 mb-2">
                    <span class="text-brand-green-800 uppercase tracking-wider font-bold" x-text="stepCategory"></span>
                    <span class="font-bold text-gray-700" x-text="t('step_counter', {step: step, total: 10})"></span>
                </div>
                <div class="h-2 w-full bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-red-600 to-brand-gold-500 transition-all duration-300 ease-out"
                         :style="`width: ${(step / 10) * 100}%`"></div>
                </div>
            </div>

            <!-- STEP 1: Full Name -->
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 1, total: 10})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q1_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('q1_desc')"></p>
                </div>

                <div class="space-y-4">
                    <div class="relative">
                        <input type="text" 
                               x-model.trim="profile.name" 
                               @keydown.enter.prevent="if (canProceed) nextStep()"
                               autofocus
                               :placeholder="t('q1_placeholder')"
                               class="w-full bg-white border-2 border-gray-300 rounded-2xl px-5 py-4 text-base focus:outline-none focus:border-brand-green-700 focus:ring-4 focus:ring-brand-green-100 text-gray-900 shadow-2xs font-medium placeholder:text-gray-400">
                    </div>
                    <p class="text-xs text-gray-500 flex items-center gap-1.5">
                        <span>💡</span>
                        <span x-html="t('q1_tip')"></span>
                    </p>
                </div>
            </div>

            <!-- STEP 2: Biological Gender -->
            <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 2, total: 10})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q2_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('q2_desc')"></p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="profile.gender = 'Female'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Female' ? 'border-red-600 bg-red-50/70 shadow-sm ring-2 ring-red-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">👩</span>
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-red-950': profile.gender === 'Female'}" x-text="t('gender_female')"></span>
                                <span class="text-xs text-gray-500" x-text="t('iron_gender_female_desc')"></span>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                             :class="profile.gender === 'Female' ? 'border-red-600 bg-red-600' : 'border-gray-300 bg-white'">
                            <div x-show="profile.gender === 'Female'" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                        </div>
                    </button>

                    <button type="button" 
                            @click="profile.gender = 'Male'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Male' ? 'border-red-600 bg-red-50/70 shadow-sm ring-2 ring-red-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">👨</span>
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-red-950': profile.gender === 'Male'}" x-text="t('gender_male')"></span>
                                <span class="text-xs text-gray-500" x-text="t('iron_gender_male_desc')"></span>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                             :class="profile.gender === 'Male' ? 'border-red-600 bg-red-600' : 'border-gray-300 bg-white'">
                            <div x-show="profile.gender === 'Male'" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                        </div>
                    </button>

                    <button type="button" 
                            @click="profile.gender = 'Other'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Other' ? 'border-red-600 bg-red-50/70 shadow-sm ring-2 ring-red-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">🧑</span>
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-red-950': profile.gender === 'Other'}" x-text="t('gender_other')"></span>
                                <span class="text-xs text-gray-500" x-text="t('iron_gender_other_desc')"></span>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                             :class="profile.gender === 'Other' ? 'border-red-600 bg-red-600' : 'border-gray-300 bg-white'">
                            <div x-show="profile.gender === 'Other'" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                        </div>
                    </button>
                </div>
            </div>

            <!-- STEP 3: Age Group -->
            <div x-show="step === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 3, total: 10})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q3_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('q3_desc')"></p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in ageOptions" :key="item.val">
                        <button type="button" 
                                @click="profile.ageGroup = item.val" 
                                class="w-full text-left p-4 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="profile.ageGroup === item.val ? 'border-red-600 bg-red-50/70 shadow-sm ring-2 ring-red-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-red-950': profile.ageGroup === item.val}" x-text="item.label"></span>
                                <span class="text-xs text-gray-500 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="profile.ageGroup === item.val ? 'border-red-600 bg-red-600' : 'border-gray-300 bg-white'">
                                <div x-show="profile.ageGroup === item.val" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 4: WhatsApp Phone Number -->
            <div x-show="step === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 4, total: 10})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q4_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('iron_q4_desc')"></p>
                </div>

                <div class="space-y-4">
                    <div class="flex rounded-2xl overflow-hidden border-2 border-gray-300 bg-white shadow-2xs focus-within:ring-4 focus-within:ring-brand-green-100 focus-within:border-brand-green-700 transition-all">
                        <div class="bg-gray-100 px-4 py-4 border-r border-gray-300 flex items-center gap-2 shrink-0 text-gray-800 font-bold text-sm select-none">
                            <span class="text-lg">🇮🇳</span>
                            <span>+91</span>
                        </div>
                        <input type="tel" 
                               x-model.trim="profile.phone" 
                               @keydown.enter.prevent="if (canProceed) nextStep()"
                               maxlength="10"
                               autofocus
                               :placeholder="t('q4_placeholder')"
                               class="flex-1 w-full bg-white px-4 py-4 text-base focus:outline-none text-gray-900 font-medium placeholder:text-gray-400">
                    </div>
                    <div class="bg-brand-gold-50 rounded-xl p-3 border border-brand-gold-200/80 flex items-start gap-2.5 text-xs text-brand-gold-950">
                        <span class="text-base shrink-0">🔒</span>
                        <span x-text="t('q4_privacy')"></span>
                    </div>
                </div>
            </div>

            <!-- STEP 5: Dimension 1: Energy Curve -->
            <div x-show="step === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 5, total: 10})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('iron_q5_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('iron_q5_desc')"></p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in energyOptions" :key="item.val">
                        <button type="button" 
                                @click="answers.q1 = item.val" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.q1 === item.val ? 'border-red-600 bg-red-50/70 shadow-sm ring-2 ring-red-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div class="flex items-center gap-3.5">
                                <span class="text-2xl" x-text="item.icon"></span>
                                <div>
                                    <span class="font-bold text-base block text-gray-900" :class="{'text-red-950': answers.q1 === item.val}" x-text="item.label"></span>
                                    <span class="text-xs text-gray-500" x-text="item.desc"></span>
                                </div>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.q1 === item.val ? 'border-red-600 bg-red-600' : 'border-gray-300 bg-white'">
                                <div x-show="answers.q1 === item.val" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 6: Dimension 1: Exertion & Stamina -->
            <div x-show="step === 6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 6, total: 10})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('iron_q6_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('iron_q6_desc')"></p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in exertionOptions" :key="item.val">
                        <button type="button" 
                                @click="answers.q1_breath = item.val" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.q1_breath === item.val ? 'border-red-600 bg-red-50/70 shadow-sm ring-2 ring-red-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div class="flex items-center gap-3.5">
                                <span class="text-2xl" x-text="item.icon"></span>
                                <div>
                                    <span class="font-bold text-base block text-gray-900" :class="{'text-red-950': answers.q1_breath === item.val}" x-text="item.label"></span>
                                    <span class="text-xs text-gray-500" x-text="item.desc"></span>
                                </div>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.q1_breath === item.val ? 'border-red-600 bg-red-600' : 'border-gray-300 bg-white'">
                                <div x-show="answers.q1_breath === item.val" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 7: Dimension 2: Physical Signs (Checklist) -->
            <div x-show="step === 7" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 7, total: 10})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('iron_q7_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('iron_q7_desc')"></p>
                </div>

                <div class="space-y-2.5">
                    <template x-for="item in physicalSignOptions" :key="item.val">
                        <button type="button" 
                                @click="toggleMulti('q2', item.val)" 
                                class="w-full text-left p-3.5 sm:p-4 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.q2.includes(item.val) ? 'border-red-600 bg-red-50/70 shadow-sm ring-2 ring-red-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div class="flex items-center gap-3">
                                <span class="text-xl" x-text="item.icon"></span>
                                <div>
                                    <span class="font-bold text-sm block text-gray-900" :class="{'text-red-950': answers.q2.includes(item.val)}" x-text="item.label"></span>
                                    <span class="text-xs text-gray-500" x-text="item.desc"></span>
                                </div>
                            </div>
                            <div class="w-5 h-5 rounded-md border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.q2.includes(item.val) ? 'border-red-600 bg-red-600' : 'border-gray-300 bg-white'">
                                <svg x-show="answers.q2.includes(item.val)" class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                        </button>
                    </template>
                </div>

                <div class="mt-4 text-center">
                    <button type="button" @click="clearMulti('q2')" class="text-xs text-gray-500 hover:text-gray-800 font-semibold underline cursor-pointer" x-text="t('none_of_above')">
                        None of these apply to me (Skip to Next)
                    </button>
                </div>
            </div>

            <!-- STEP 8: Dimension 3: Dietary Iron Pattern -->
            <div x-show="step === 8" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 8, total: 10})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('iron_q8_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('iron_q8_desc')"></p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in dietOptions" :key="item.val">
                        <button type="button" 
                                @click="answers.q3_diet = item.val" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.q3_diet === item.val ? 'border-red-600 bg-red-50/70 shadow-sm ring-2 ring-red-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div class="flex items-center gap-3.5">
                                <span class="text-2xl" x-text="item.icon"></span>
                                <div>
                                    <span class="font-bold text-base block text-gray-900" :class="{'text-red-950': answers.q3_diet === item.val}" x-text="item.label"></span>
                                    <span class="text-xs text-gray-500" x-text="item.desc"></span>
                                </div>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.q3_diet === item.val ? 'border-red-600 bg-red-600' : 'border-gray-300 bg-white'">
                                <div x-show="answers.q3_diet === item.val" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 9: Dimension 3: Digestive Iron Absorption (Checklist) -->
            <div x-show="step === 9" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 9, total: 10})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('iron_q9_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('iron_q9_desc')"></p>
                </div>

                <div class="space-y-2.5">
                    <template x-for="item in gutOptions" :key="item.val">
                        <button type="button" 
                                @click="toggleMulti('q3_gut', item.val)" 
                                class="w-full text-left p-3.5 sm:p-4 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.q3_gut.includes(item.val) ? 'border-red-600 bg-red-50/70 shadow-sm ring-2 ring-red-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div class="flex items-center gap-3">
                                <span class="text-xl" x-text="item.icon"></span>
                                <div>
                                    <span class="font-bold text-sm block text-gray-900" :class="{'text-red-950': answers.q3_gut.includes(item.val)}" x-text="item.label"></span>
                                    <span class="text-xs text-gray-500" x-text="item.desc"></span>
                                </div>
                            </div>
                            <div class="w-5 h-5 rounded-md border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.q3_gut.includes(item.val) ? 'border-red-600 bg-red-600' : 'border-gray-300 bg-white'">
                                <svg x-show="answers.q3_gut.includes(item.val)" class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                        </button>
                    </template>
                </div>

                <div class="mt-4 text-center">
                    <button type="button" @click="clearMulti('q3_gut')" class="text-xs text-gray-500 hover:text-gray-800 font-semibold underline cursor-pointer" x-text="t('none_of_above')">
                        None of these apply to me (Skip to Next)
                    </button>
                </div>
            </div>

            <!-- STEP 10: Dimension 4: Life Stage Factors (Checklist) -->
            <div x-show="step === 10" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 10, total: 10})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('iron_q10_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('iron_q10_desc')"></p>
                </div>

                <div class="space-y-2.5">
                    <template x-for="item in lifeFactorOptions" :key="item.val">
                        <button type="button" 
                                @click="toggleMulti('q4_factors', item.val)" 
                                class="w-full text-left p-3.5 sm:p-4 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.q4_factors.includes(item.val) ? 'border-red-600 bg-red-50/70 shadow-sm ring-2 ring-red-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div class="flex items-center gap-3">
                                <span class="text-xl" x-text="item.icon"></span>
                                <div>
                                    <span class="font-bold text-sm block text-gray-900" :class="{'text-red-950': answers.q4_factors.includes(item.val)}" x-text="item.label"></span>
                                    <span class="text-xs text-gray-500" x-text="item.desc"></span>
                                </div>
                            </div>
                            <div class="w-5 h-5 rounded-md border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.q4_factors.includes(item.val) ? 'border-red-600 bg-red-600' : 'border-gray-300 bg-white'">
                                <svg x-show="answers.q4_factors.includes(item.val)" class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                        </button>
                    </template>
                </div>

                <div class="mt-4 text-center">
                    <button type="button" @click="clearMulti('q4_factors')" class="text-xs text-gray-500 hover:text-gray-800 font-semibold underline cursor-pointer" x-text="t('none_of_above')">
                        None of these apply to me (Skip to Next)
                    </button>
                </div>
            </div>

            <!-- Quiz Stepper Footer Buttons (Steps 1 to 10) -->
            <div x-show="step >= 1 && step <= 10" class="mt-8 pt-5 border-t border-gray-100 flex items-center justify-between">
                <button type="button" 
                        @click="prevStep()" 
                        class="px-5 py-2.5 text-xs sm:text-sm font-bold text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-all flex items-center gap-1.5 cursor-pointer">
                    <span>←</span>
                    <span x-text="t('prev_btn')">Previous</span>
                </button>

                <button type="button" 
                        @click="nextStep()" 
                        :disabled="!canProceed"
                        class="px-7 py-3 text-xs sm:text-sm font-bold rounded-full transition-all flex items-center gap-2 shadow-md cursor-pointer"
                        :class="canProceed ? 'bg-brand-green-800 hover:bg-brand-green-700 text-white hover:scale-105' : 'bg-gray-200 text-gray-400 cursor-not-allowed opacity-60'">
                    <span x-text="step === 10 ? t('submit_btn') : t('next_btn')">Next Step</span>
                    <span>→</span>
                </button>
            </div>

            <!-- STEP 11: Results Screen -->
            <div x-show="step === 11" x-transition:enter="transition ease-out duration-400" x-transition:enter-start="opacity-0 scale-98" x-transition:enter-end="opacity-100 scale-100" class="py-2">
                
                <div class="text-center mb-8">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase mb-2"
                          :class="{
                              'text-emerald-900 bg-emerald-100': result.riskKey === 'low',
                              'text-amber-900 bg-amber-100': result.riskKey === 'moderate',
                              'text-red-900 bg-red-100': result.riskKey === 'high'
                          }">
                        <span>🩸</span>
                        <span x-text="t('iron_report_badge')">Rakta Dhatu & Ferritin Report</span>
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-serif font-bold text-gray-900">
                        <span x-text="profile.name || 'Valued Patient'"></span>, <span x-text="t('iron_report_title')">Your Iron & Blood Vitality Profile</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('iron_report_subtitle')"></p>
                </div>

                <!-- Result Hero Card -->
                <div class="rounded-3xl p-6 sm:p-8 mb-6 border shadow-sm text-center relative overflow-hidden"
                     :class="{
                         'bg-emerald-50/70 border-emerald-200': result.riskKey === 'low',
                         'bg-amber-50/70 border-amber-200': result.riskKey === 'moderate',
                         'bg-red-50/70 border-red-200': result.riskKey === 'high'
                     }">
                    <span class="text-xs font-extrabold uppercase tracking-widest text-gray-500 block mb-1" x-text="t('iron_risk_label')">Rakta Dhatu Depletion Indicator</span>
                    <div class="text-3xl sm:text-4xl font-serif font-black mb-2"
                         :class="{
                             'text-emerald-900': result.riskKey === 'low',
                             'text-amber-900': result.riskKey === 'moderate',
                             'text-red-900': result.riskKey === 'high'
                         }"
                         x-text="result.riskLabel"></div>
                    
                    <span class="text-xs font-bold text-gray-500 block mb-4" x-text="`${score} / 25 ${t('score_pts')}`"></span>

                    <p class="text-xs sm:text-sm text-gray-700 max-w-lg mx-auto leading-relaxed" x-text="result.message"></p>
                </div>

                <!-- WhatsApp Doctor Consultation Banner -->
                <div class="bg-gradient-to-r from-red-50 via-brand-gold-50 to-red-50 rounded-2xl p-5 border border-brand-gold-200/90 mb-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-center sm:text-left">
                        <h4 class="font-bold text-sm sm:text-base text-gray-900 flex items-center justify-center sm:justify-start gap-1.5">
                            <span>📲</span>
                            <span x-text="t('iron_wa_box_title')">Receive Doctor's Personalized Blood Builder Plan on WhatsApp</span>
                        </h4>
                        <p class="text-xs text-gray-600 mt-0.5" x-text="t('iron_wa_box_desc')">
                            Send your observations directly to Dr. Sajeev Dev for a tailored VeaChoc and dietary dosage plan.
                        </p>
                    </div>
                    <a :href="whatsappReportLink" target="_blank" 
                       class="inline-flex items-center justify-center bg-[#25D366] hover:bg-[#1ebd5b] text-white font-bold px-6 py-3 rounded-xl transition-all shadow-sm hover:shadow-md text-xs sm:text-sm gap-2 shrink-0 cursor-pointer">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.976L2 22l5.174-1.357a9.923 9.923 0 004.838 1.259h.005c5.505 0 9.988-4.479 9.988-9.985S17.518 2 12.012 2zM12.012 20.202h-.004a8.273 8.273 0 01-4.223-1.155l-.303-.18-3.138.823.836-3.062-.197-.314A8.252 8.252 0 013.69 11.984C3.691 7.42 7.408 3.702 11.97 3.702c4.545 0 8.243 3.714 8.243 8.283 0 4.56-3.7 8.272-8.201 8.217zM16.55 13.992c-.248-.124-1.472-.727-1.7-.811-.228-.084-.395-.124-.56.124-.167.248-.646.811-.79 9.977-.146.166-.293.187-.54.062-1.071-.539-2.583-1.638-3.197-2.317-.168-.186-.334-.187-.582-.062-.248.125-1.05.388-1.602 1.341-.55 1.05.021 1.554.499 2.502.167.332.083.623-.042.871-.125.248-.56 1.348-.767 1.846-.2.482-.403.417-.56.425-.145.008-.312.008-.479.008a.911.911 0 00-.663.309c-.228.248-.871.851-.871 2.073s.893 2.404 1.018 2.57c.125.166 1.752 2.673 4.246 3.75.594.256 1.057.41 1.419.524.595.189 1.137.162 1.564.098.48-.073 1.472-.602 1.68-1.184.208-.582.208-1.08.146-1.184-.062-.104-.228-.166-.476-.29z"/>
                        </svg>
                        <span x-text="t('send_wa_btn')">Send to My WhatsApp</span>
                    </a>
                </div>

                <!-- Key Diagnostic Observations -->
                <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200 mb-8">
                    <h5 class="text-xs font-bold uppercase tracking-widest text-gray-700 mb-3" x-text="t('key_observations_title')">
                        Key Observations from Your Responses:
                    </h5>
                    <ul class="space-y-2 text-xs sm:text-sm text-gray-700">
                        <template x-for="flag in diagnosticFlags" :key="flag">
                            <li class="flex items-start gap-2">
                                <span class="text-red-600 font-bold shrink-0">•</span>
                                <span x-text="flag"></span>
                            </li>
                        </template>
                    </ul>
                </div>

                <!-- Retake Assessment Link -->
                <div class="mt-8 text-center">
                    <button type="button" 
                            @click="resetQuiz()" 
                            class="text-xs text-gray-500 hover:text-gray-800 font-semibold underline underline-offset-4 cursor-pointer"
                            x-text="t('retake_btn')">
                        ← Retake Assessment
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    function ironQuiz() {
        return {
            lang: localStorage.getItem('yuvann_assessment_lang') || 'en',
            step: 0,
            profile: {
                name: '',
                gender: '',
                ageGroup: '',
                phone: ''
            },
            answers: {
                q1: null,
                q1_breath: null,
                q2: [],
                q3_diet: null,
                q3_gut: [],
                q4_factors: []
            },

            setLanguage(l) {
                this.lang = l;
                localStorage.setItem('yuvann_assessment_lang', l);
            },

            selectLanguageAndStart(l) {
                this.setLanguage(l);
                this.startQuiz();
            },

            get currentLangName() {
                if (this.lang === 'ml') return 'മലയാളം';
                if (this.lang === 'hi') return 'हिन्दी';
                if (this.lang === 'ta') return 'தமிழ்';
                return 'English';
            },

            i18n: {
                en: {
                    badge: "Clinical Ayurvedic Assessment",
                    heading: "Iron & Blood Vitality Self-Assessment",
                    subheading: "A personalized clinical screening by Dr. Sajeev Dev to evaluate Rakta Dhatu (blood tissue) vitality, ferritin depletion indicators, and nutrient absorption.",
                    lang_label: "Language",
                    choose_lang_title: "Select Your Preferred Language",
                    intro_title: "Understand Your Body's Iron & Vitality Status",
                    intro_desc: "Unexplained fatigue, breathlessness on stairs, cold hands, or brittle nails often signal depleted ferritin and sluggish Rakta Dhatu. This quick, confidential assessment walks you through one question at a time and sends your full clinical report directly to your WhatsApp.",
                    f1_title: "Takes 2 Minutes",
                    f1_desc: "Quick single-question stepper tailored for you.",
                    f2_title: "WhatsApp Report",
                    f2_desc: "Receive your detailed score & report directly.",
                    f3_title: "Doctor-Guided",
                    f3_desc: "Ayurvedic guidance by Dr. Sajeev Dev.",
                    begin_btn: "Begin Assessment",
                    prev_btn: "Previous",
                    next_btn: "Next Step",
                    submit_btn: "Submit & View Report",
                    retake_btn: "← Retake Assessment",
                    step_counter: "Step {step} of {total}",
                    none_of_above: "None of these apply to me (Skip to Next)",
                    score_pts: "Risk Points",

                    q1_title: "1. What is your full name?",
                    q1_desc: "To personalize your confidential health evaluation and official report:",
                    q1_placeholder: "e.g. Priya Sharma",
                    q1_tip: "Type your name and press <strong>Enter ↵</strong> or click <strong>Next Step →</strong> below.",

                    q2_title: "2. What is your biological gender?",
                    q2_desc: "Biological factors like monthly menstrual cycles strongly dictate iron requirements:",
                    gender_female: "Female",
                    iron_gender_female_desc: "Higher risk of ferritin loss from monthly menstruation and reproductive phases",
                    gender_male: "Male",
                    iron_gender_male_desc: "Primary evaluation focused on digestive absorption, dietary intake, and endurance fatigue",
                    gender_other: "Other / Prefer not to say",
                    iron_gender_other_desc: "General blood tissue vitality and dietary iron bioavailability assessment",

                    q3_title: "3. Which age group do you belong to?",
                    q3_desc: "Iron demand and bone marrow hematopoiesis vary across life stages:",

                    q4_title: "4. What is your WhatsApp phone number?",
                    iron_q4_desc: "We will format your complete Rakta Dhatu evaluation, ferritin indicators, and doctor's custom advice directly to your WhatsApp:",
                    q4_placeholder: "Enter 10-digit mobile number",
                    q4_privacy: "Confidential. Your number is only used to deliver your assessment report and doctor consultation.",

                    iron_q5_title: "5. How would you describe your everyday energy levels?",
                    iron_q5_desc: "Mitochondrial oxygen delivery depends on healthy hemoglobin and ferritin stores:",

                    iron_q6_title: "6. How does your body respond to mild physical exertion?",
                    iron_q6_desc: "e.g. Climbing 2 flights of stairs, walking briskly uphill, or carrying groceries:",

                    iron_q7_title: "7. Do you experience any of these physical depletion signs?",
                    iron_q7_desc: "Check all that apply to your experience over the past 3 to 6 months:",

                    iron_q8_title: "8. What best describes your typical daily dietary pattern?",
                    iron_q8_desc: "Heme iron (animal sources) vs. non-heme iron (plant sources) absorb differently in the gut:",

                    iron_q9_title: "9. Do any of these digestive absorption barriers apply to you?",
                    iron_q9_desc: "Dietary tannins, phytates, and low stomach acid can block up to 60% of iron absorption:",

                    iron_q10_title: "10. Are any of these biological life stage factors present?",
                    iron_q10_desc: "Check any applicable physiological conditions affecting your iron reserve balance:",

                    iron_report_badge: "Rakta Dhatu & Ferritin Report",
                    iron_report_title: "Your Iron & Blood Vitality Profile",
                    iron_report_subtitle: "Evaluation computed from biological markers, stamina metrics, and Ayurvedic Rakta Dhatu parameters.",
                    iron_risk_label: "Rakta Dhatu Depletion Indicator",
                    iron_wa_box_title: "Receive Doctor's Personalized Blood Builder Plan on WhatsApp",
                    iron_wa_box_desc: "Send your observations directly to Dr. Sajeev Dev for a tailored VeaChoc and dietary dosage plan.",
                    send_wa_btn: "Send to My WhatsApp",
                    key_observations_title: "Key Observations from Your Responses:"
                },
                ml: {
                    badge: "ആയുർവേദ ക്ലിനിക്കൽ പരിശോധന",
                    heading: "രക്തത്തിലെ അയേൺ & ഉന്മേഷ പരിശോധന",
                    subheading: "ഡോ. സജീവ് ദേവിന്റെ നേതൃത്വത്തിൽ നിങ്ങളുടെ രക്തധാതു പുഷ്ടി, അയേൺ (ഫെറിറ്റിൻ) തോത്, ദഹന ആഗിരണ ശേഷി എന്നിവ വിലയിരുത്താനുള്ള പരിശോധന.",
                    lang_label: "ഭാഷ",
                    choose_lang_title: "നിങ്ങളുടെ ഭാഷ തിരഞ്ഞെടുക്കുക",
                    intro_title: "നിങ്ങളുടെ ശരീരത്തിലെ അയേൺ നിലയും ഉന്മേഷവും അറിയൂ",
                    intro_desc: "വിശദീകരിക്കാനാവാത്ത ക്ഷീണം, പടികൾ കയറുമ്പോഴുള്ള കിതപ്പ്, കൈകാലുകളിലെ തണുപ്പ്, നഖം പൊട്ടൽ എന്നിവ അയേൺ കുറവിന്റെ ലക്ഷണങ്ങളാകാം. ലളിതമായ ചോദ്യങ്ങൾക്ക് മറുപടി നൽകി പൂർണ്ണ റിപ്പോർട്ട് വാട്സാപ്പിൽ നേടൂ.",
                    f1_title: "2 മിനിറ്റ് മതി",
                    f1_desc: "ലളിതമായ ചോദ്യങ്ങൾ.",
                    f2_title: "വാട്സാപ്പ് റിപ്പോർട്ട്",
                    f2_desc: "വിശദമായ റിപ്പോർട്ട് ഫോണിൽ ലഭിക്കുന്നു.",
                    f3_title: "ഡോക്ടർ ഉപദേശം",
                    f3_desc: "ഡോ. സജീവ് ദേവിന്റെ നേരിട്ടുള്ള മാർഗ്ഗനിർദ്ദേശം.",
                    begin_btn: "പരിശോധന ആരംഭിക്കുക",
                    prev_btn: "പിന്നോട്ട്",
                    next_btn: "അടുത്ത ഘട്ടം",
                    submit_btn: "റിപ്പോർട്ട് കാണുക",
                    retake_btn: "← വീണ്ടും പരിശോധിക്കുക",
                    step_counter: "ഘട്ടം {step} / {total}",
                    none_of_above: "ഇവയിലൊന്നും എനിക്ക് ബാധകമല്ല (തുടരുക)",
                    score_pts: "റിസ്ക് പോയിന്റുകൾ",

                    q1_title: "1. നിങ്ങളുടെ മുഴുവൻ പേരെന്താണ്?",
                    q1_desc: "നിങ്ങളുടെ ക്ലിനിക്കൽ പരിശോധനാ റിപ്പോർട്ടിനായി പേര് നൽകുക:",
                    q1_placeholder: "ഉദാ: പ്രിയ ശർമ്മ",
                    q1_tip: "പേര് ടൈപ്പ് ചെയ്ത് <strong>Enter ↵</strong> അമർത്തുക അല്ലെങ്കിൽ താഴെയുള്ള <strong>അടുത്ത ഘട്ടം →</strong> ക്ലിക്ക് ചെയ്യുക.",

                    q2_title: "2. നിങ്ങളുടെ ലിംഗം ഏതാണ്?",
                    q2_desc: "ആർത്തവം മൂലമുള്ള രക്തനഷ്ടവും അയേൺ ആവശ്യകതയും ലിംഗഭേദമനുസരിച്ച് വ്യത്യാസപ്പെടുന്നു:",
                    gender_female: "സ്ത്രീ (Female)",
                    iron_gender_female_desc: "ആർത്തവം മൂലവും ഗർഭാവസ്ഥയിലും അയേൺ കുറയാനുള്ള സാധ്യത കൂടുതൽ",
                    gender_male: "പുരുഷൻ (Male)",
                    iron_gender_male_desc: "ഭക്ഷണരീതി, ദഹന ആഗിരണം, വ്യായാമ ക്ഷീണം എന്നിവയെ അടിസ്ഥാനമാക്കിയുള്ള പരിശോധന",
                    gender_other: "മറ്റുള്ളവ (Other)",
                    iron_gender_other_desc: "പൊതുവായ രക്തധാതു ആരോഗ്യ പരിശോധന",

                    q3_title: "3. നിങ്ങളുടെ പ്രായപരിധി ഏതാണ്?",
                    q3_desc: "പ്രായത്തിനനുസരിച്ച് രക്തത്തിലെ ഹീമോഗ്ലോബിൻ നിർമ്മാണശേഷി വ്യത്യാസപ്പെടുന്നു:",

                    q4_title: "4. നിങ്ങളുടെ വാട്സാപ്പ് നമ്പർ നൽകുക:",
                    iron_q4_desc: "നിങ്ങളുടെ വിശദമായ അയേൺ പരിശോധനാ റിപ്പോർട്ടും ഡോക്ടറുടെ നിർദ്ദേശങ്ങളും ഈ നമ്പറിലേക്ക് അയച്ചു നൽകുന്നതാണ്:",
                    q4_placeholder: "10 അക്ക മൊബൈൽ നമ്പർ നൽകുക",
                    q4_privacy: "തികച്ചും രഹസ്യമായി സൂക്ഷിക്കും. റിപ്പോർട്ട് അയക്കുന്നതിനും ഡോക്ടറുടെ കൺസൾട്ടേഷനും മാത്രമായി ഉപയോഗിക്കുന്നു.",

                    iron_q5_title: "5. നിങ്ങളുടെ ദൈനംദിന ഊർജ്ജ നില എങ്ങനെയാണ്?",
                    iron_q5_desc: "കോശങ്ങളിലേക്കുള്ള ഓക്സിജൻ പ്രവാഹം ഹീമോഗ്ലോബിന്റെയും അയേണിന്റെയും അളവിനെ ആശ്രയിച്ചിരിക്കുന്നു:",

                    iron_q6_title: "6. ചെറിയ അധ്വാനങ്ങളോട് ശരീരം എങ്ങനെ പ്രതികരിക്കുന്നു?",
                    iron_q6_desc: "ഉദാഹരണത്തിന് പടികൾ കയറുമ്പോഴോ വേഗത്തിൽ നടക്കുമ്പോഴോ:",

                    iron_q7_title: "7. താഴെ പറയുന്ന ലക്ഷണങ്ങൾ നിങ്ങൾ അനുഭവിക്കാറുണ്ടോ?",
                    iron_q7_desc: "കഴിഞ്ഞ 3 മുതൽ 6 മാസത്തിനിടയിൽ ഉണ്ടായ ലക്ഷണങ്ങൾ തിരഞ്ഞെടുക്കുക:",

                    iron_q8_title: "8. നിങ്ങളുടെ ദൈനംദിന ഭക്ഷണരീതി ഏതാണ്?",
                    iron_q8_desc: "സസ്യാഹാരത്തിലെ അയേണും മാംസാഹാരത്തിലെ അയേണും ശരീരം ആഗിരണം ചെയ്യുന്ന രീതി വ്യത്യസ്തമാണ്:",

                    iron_q9_title: "9. താഴെ പറയുന്ന ദഹനശീലങ്ങൾ നിങ്ങൾക്കുണ്ടോ?",
                    iron_q9_desc: "ഭക്ഷണത്തിന് തൊട്ടുപിന്നാലെയുള്ള ചായ, കാപ്പി എന്നിവ അയേൺ ആഗിരണത്തെ 60% വരെ തടസ്സപ്പെടുത്താം:",

                    iron_q10_title: "10. താഴെ പറയുന്ന പ്രത്യേക ഘട്ടങ്ങളിലൂടെ നിങ്ങൾ കടന്നുപോകുന്നുണ്ടോ?",
                    iron_q10_desc: "ശരീരത്തിലെ അയേൺ നിലയെ സ്വാധീനിക്കുന്ന ശാരീരിക അവസ്ഥകൾ:",

                    iron_report_badge: "രക്തധാതു & അയേൺ റിപ്പോർട്ട്",
                    iron_report_title: "നിങ്ങളുടെ രക്തധാതു & അയേൺ റിപ്പോർട്ട്",
                    iron_report_subtitle: "ശാരീരിക ലക്ഷണങ്ങളും ആയുർവേദ രക്തധാതു സിദ്ധാന്തവും അനുസരിച്ച് തയ്യാറാക്കിയത്.",
                    iron_risk_label: "അയേൺ കുറവിന്റെ അളവ്",
                    iron_wa_box_title: "ഡോക്ടറുടെ നിർദ്ദേശങ്ങൾ വാട്സാപ്പിൽ ലഭിക്കാൻ",
                    iron_wa_box_desc: "നിങ്ങളുടെ റിപ്പോർട്ട് പരിശോധിച്ച് അനുയോജ്യമായ വീചോക്ക് ചോക്ലേറ്റുകളും ഭക്ഷണക്രമവും ഡോക്ടർ നിർദ്ദേശിക്കും.",
                    send_wa_btn: "വാട്സാപ്പിലേക്ക് അയക്കുക",
                    key_observations_title: "നിങ്ങളുടെ ലക്ഷണങ്ങളിൽ നിന്നുള്ള പ്രധാന കണ്ടെത്തലുകൾ:"
                },
                hi: {
                    badge: "आयुर्वेदिक नैदानिक मूल्यांकन",
                    heading: "आयरन और रक्त जीवन शक्ति स्व-मूल्यांकन",
                    subheading: "डॉ. सजीव देव द्वारा आपके रक्त धातु (रक्त ऊतक) के स्वास्थ्य, फेरिटिन की कमी और पोषण अवशोषण का व्यक्तिगत मूल्यांकन।",
                    lang_label: "भाषा",
                    choose_lang_title: "अपनी पसंदीदा भाषा चुनें",
                    intro_title: "अपने शरीर का आयरन स्तर और जीवन शक्ति जानें",
                    intro_desc: "अकारण थकान, सीढ़ियों पर सांस फूलना, ठंडे हाथ-पैर या बालों का झड़ना फेरिटिन की कमी का संकेत हो सकते हैं। एक-एक प्रश्न का उत्तर दें और अपनी पूरी क्लिनिकल रिपोर्ट व्हाट्सएप पर प्राप्त करें।",
                    f1_title: "केवल 2 मिनट",
                    f1_desc: "सरल प्रश्नोत्तरी।",
                    f2_title: "व्हाट्सएप रिपोर्ट",
                    f2_desc: "विस्तृत स्कोर सीधे फोन पर।",
                    f3_title: "डॉक्टर द्वारा निर्देशित",
                    f3_desc: "डॉ. सजीव देव द्वारा प्रमाणित मार्गदर्शन।",
                    begin_btn: "मूल्यांकन शुरू करें",
                    prev_btn: "पिछला",
                    next_btn: "अगला कदम",
                    submit_btn: "रिपोर्ट देखें",
                    retake_btn: "← पुनः मूल्यांकन करें",
                    step_counter: "चरण {step} / {total}",
                    none_of_above: "इनमें से कोई भी मुझ पर लागू नहीं होता (आगे बढ़ें)",
                    score_pts: "जोखिम अंक",

                    q1_title: "1. आपका पूरा नाम क्या है?",
                    q1_desc: "आपकी गोपनीय स्वास्थ्य रिपोर्ट तैयार करने के लिए:",
                    q1_placeholder: "उदा. प्रिया शर्मा",
                    q1_tip: "नाम लिखकर <strong>Enter ↵</strong> दबाएं या नीचे <strong>अगला कदम →</strong> पर क्लिक करें।",

                    q2_title: "2. आपका जैविक लिंग क्या है?",
                    q2_desc: "मासिक धर्म और जैविक कारक आयरन की आवश्यकता को गहराई से प्रभावित करते हैं:",
                    gender_female: "महिला (Female)",
                    iron_gender_female_desc: "मासिक धर्म और प्रजनन चरणों के कारण फेरिटिन घटने का अधिक जोखिम",
                    gender_male: "पुरुष (Male)",
                    iron_gender_male_desc: "पाचन अवशोषण, आहार और दैनिक थकान पर आधारित मूल्यांकन",
                    gender_other: "अन्य (Other)",
                    iron_gender_other_desc: "सामान्य रक्त जीवन शक्ति मूल्यांकन",

                    q3_title: "3. आप किस आयु वर्ग में आते हैं?",
                    q3_desc: "आयु के अनुसार रक्त निर्माण और हीमोग्लोबिन की मांग बदलती है:",

                    q4_title: "4. आपका व्हाट्सएप मोबाइल नंबर क्या है?",
                    iron_q4_desc: "हम आपकी पूरी रक्त धातु रिपोर्ट और डॉक्टर की सलाह सीधे आपके व्हाट्सएप पर भेजेंगे:",
                    q4_placeholder: "10 अंकों का मोबाइल नंबर दर्ज करें",
                    q4_privacy: "पूर्णतः गोपनीय। केवल रिपोर्ट और डॉक्टर परामर्श के लिए उपयोग होगा।",

                    iron_q5_title: "5. आपकी दैनिक ऊर्जा का स्तर कैसा रहता है?",
                    iron_q5_desc: "शरीर की ऊर्जा सीधे हीमोग्लोबिन और ऑक्सीजन संचार पर निर्भर करती है:",

                    iron_q6_title: "6. हल्के शारीरिक श्रम पर आपका शरीर कैसी प्रतिक्रिया देता है?",
                    iron_q6_desc: "जैसे सीढ़ियां चढ़ना या तेज चलना:",

                    iron_q7_title: "7. क्या आप इनमें से किसी शारीरिक लक्षण का अनुभव करते हैं?",
                    iron_q7_desc: "पिछले 3 से 6 महीनों में महसूस हुए सभी लक्षण चुनें:",

                    iron_q8_title: "8. आपका मुख्य दैनिक आहार पैटर्न क्या है?",
                    iron_q8_desc: "शाकाहारी और मांसाहारी आहार से आयरन अलग-अलग तरह से अवशोषित होता है:",

                    iron_q9_title: "9. क्या इनमें से कोई पाचन संबंधी आदत आप पर लागू होती है?",
                    iron_q9_desc: "भोजन के तुरंत बाद चाय या कॉफी 60% तक आयरन अवशोषण रोक देती है:",

                    iron_q10_title: "10. क्या इनमें से कोई विशेष स्थिति आप पर लागू होती है?",
                    iron_q10_desc: "शरीर के आयरन रिजर्व को प्रभावित करने वाले शारीरिक कारक:",

                    iron_report_badge: "रक्त धातु व फेरिटिन रिपोर्ट",
                    iron_report_title: "आपकी आयरन व रक्त जीवन शक्ति रिपोर्ट",
                    iron_report_subtitle: "शारीरिक लक्षणों और आयुर्वेदिक रक्त धातु मापदंडों के आधार पर तैयार।",
                    iron_risk_label: "आयरन की कमी का स्तर",
                    iron_wa_box_title: "डॉक्टर की व्यक्तिगत सलाह व्हाट्सएप पर प्राप्त करें",
                    iron_wa_box_desc: "अपनी रिपोर्ट डॉ. सजीव देव को भेजें और उपयुक्त वीचोक चॉकलेट व आहार मार्गदर्शन पाएं।",
                    send_wa_btn: "व्हाट्सएप पर भेजें",
                    key_observations_title: "आपके उत्तरों के मुख्य बिंदु:"
                },
                ta: {
                    badge: "ஆயுர்வேத மருத்துவ மதிப்பீடு",
                    heading: "ரத்த இரும்புச்சத்து & புத்துணர்ச்சி சுய மதிப்பீடு",
                    subheading: "டாக்டர் சஜீவ் தேவ் அவர்களின் வழிகாட்டுதலில் ரத்த தாது பலம், இரும்புச்சத்து (ஃபெரிடின்) குறைபாடு மற்றும் சத்து உறிஞ்சுதல் மதிப்பீடு.",
                    lang_label: "மொழி",
                    choose_lang_title: "உங்கள் மொழியைத் தேர்ந்தெடுக்கவும்",
                    intro_title: "உங்கள் உடலின் இரும்புச்சத்தும் ரத்த பலமும் அறியுங்கள்",
                    intro_desc: "காரணமற்ற சோர்வு, படிகளில் மூச்சு வாங்குதல், குளிர்ந்த கை-கால்கள், முடி உதிர்தல் ஆகியவை இரும்புச்சத்து பற்றாக்குறையின் அறிகுறிகளாக இருக்கலாம். கேள்விகளுக்கு பதிலளித்து முழு அறிக்கையை வாட்ஸ்அப்பில் பெறுங்கள்.",
                    f1_title: "2 நிமிடங்கள் போதும்",
                    f1_desc: "எளிய கேள்விகள்.",
                    f2_title: "வாட்ஸ்அப் அறிக்கை",
                    f2_desc: "முழு அறிக்கை உங்கள் தொலைபேசியில்.",
                    f3_title: "மருத்துவர் ஆலோசனை",
                    f3_desc: "டாக்டர் சஜீவ் தேவ் அவர்களின் நேரடி வழிகாட்டுதல்.",
                    begin_btn: "மதிப்பீட்டைத் தொடங்கவும்",
                    prev_btn: "முந்தையது",
                    next_btn: "அடுத்த படி",
                    submit_btn: "அறிக்கையைக் காண்க",
                    retake_btn: "← மீண்டும் மதிப்பீடு செய்க",
                    step_counter: "படி {step} / {total}",
                    none_of_above: "இவற்றில் எதுவும் எனக்கு இல்லை (அடுத்து செல்க)",
                    score_pts: "ஆபத்து புள்ளிகள்",

                    q1_title: "1. உங்கள் முழு பெயர் என்ன?",
                    q1_desc: "உங்கள் மருத்துவ அறிக்கையை தயாரிக்க உங்கள் பெயரை உள்ளிடவும்:",
                    q1_placeholder: "எ.கா: பிரியா சர்மா",
                    q1_tip: "பெயரை உள்ளிட்டு <strong>Enter ↵</strong> அழுத்தவும் அல்லது <strong>அடுத்த படி →</strong> கிளிக் செய்யவும்.",

                    q2_title: "2. உங்கள் பாலினம் என்ன?",
                    q2_desc: "மாதவிடாய் இழப்பு மற்றும் உயிரியல் காரணிகள் இரும்புச்சத்து தேவையை நிர்ணயிக்கின்றன:",
                    gender_female: "பெண் (Female)",
                    iron_gender_female_desc: "மாதவிடாய் சுழற்சி மற்றும் பிரசவ காலங்களால் இரும்புச்சத்து குறையும் வாய்ப்பு அதிகம்",
                    gender_male: "ஆண் (Male)",
                    iron_gender_male_desc: "செரிமான உறிஞ்சுதல், உணவு மற்றும் உழைப்பு சோர்வு சார்ந்த ஆய்வு",
                    gender_other: "மற்றவை (Other)",
                    iron_gender_other_desc: "பொதுவான ரத்த தாது ஆரோக்கிய ஆய்வு",

                    q3_title: "3. உங்கள் வயது வரம்பு என்ன?",
                    q3_desc: "வயதிற்கு ஏற்ப ரத்த சிவப்பணு உற்பத்தி மற்றும் இரும்புச்சத்து தேவை மாறுகிறது:",

                    q4_title: "4. உங்கள் வாட்ஸ்அப் எண் என்ன?",
                    iron_q4_desc: "உங்கள் விரிவான இரும்புச்சத்து அறிக்கை மற்றும் மருத்துவர் ஆலோசனையை இந்த எண்ணிற்கு அனுப்புவோம்:",
                    q4_placeholder: "10 இலக்க மொபைல் எண்ணை உள்ளிடவும்",
                    q4_privacy: "முற்றிலும் ரகசியமானது. அறிக்கை மற்றும் மருத்துவ ஆலோசனைக்கு மட்டுமே பயன்படும்.",

                    iron_q5_title: "5. உங்கள் அன்றாட ஆற்றல் அளவு எவ்வாறு உள்ளது?",
                    iron_q5_desc: "செல்களுக்கு ஆக்ஸிஜன் கொண்டு செல்வது ஹீமோகுளோபின் மற்றும் இரும்புச்சத்தை சார்ந்தது:",

                    iron_q6_title: "6. எளிய உடலுழைப்பிற்கு உங்கள் உடல் எவ்வாறு எதிர்வினையாற்றுகிறது?",
                    iron_q6_desc: "உதாரணமாக மாடிப்படிகள் ஏறும் போதோ அல்லது வேகமாக நடக்கும் போதோ:",

                    iron_q7_title: "7. பின்வரும் உடல் அறிகுறிகளை நீங்கள் உணர்கிறீர்களா?",
                    iron_q7_desc: "கடந்த 3 முதல் 6 மாதங்களில் உங்களுக்கு ஏற்பட்ட அறிகுறிகளை தேர்ந்தெடுக்கவும்:",

                    iron_q8_title: "8. உங்கள் அன்றாட உணவு முறை என்ன?",
                    iron_q8_desc: "தாவர உணவு மற்றும் அசைவ உணவுகளிலிருந்து இரும்புச்சத்து உறிஞ்சப்படும் விதம் மாறுபடும்:",

                    iron_q9_title: "9. பின்வரும் செரிமான பழக்கங்கள் உங்களிடம் உள்ளதா?",
                    iron_q9_desc: "உணவுக்கு பின் உடனடியாக டீ அல்லது காபி குடிப்பது இரும்புச்சத்து உறிஞ்சுதலை 60% வரை தடுக்கும்:",

                    iron_q10_title: "10. பின்வரும் சிறப்பு வாழ்க்கை சூழல்களில் உள்ளீர்களா?",
                    iron_q10_desc: "உடலின் இரும்புச்சத்து அளவை பாதிக்கும் காரணிகள்:",

                    iron_report_badge: "ரத்த தாது & இரும்புச்சத்து அறிக்கை",
                    iron_report_title: "உங்கள் இரும்புச்சத்து மற்றும் ரத்த பல அறிக்கை",
                    iron_report_subtitle: "உடல் அறிகுறிகள் மற்றும் ஆயுர்வேத ரத்த தாது கோட்பாட்டின் அடிப்படையில் உருவானது.",
                    iron_risk_label: "இரும்புச்சத்து குறைபாடு நிலை",
                    iron_wa_box_title: "மருத்துவர் ஆலோசனையை வாட்ஸ்அப்பில் பெறுக",
                    iron_wa_box_desc: "உங்கள் அறிக்கையை டாக்டர் சஜீவ் தேவ் அவர்களுக்கு அனுப்பி சரியான வீசாக் சாக்லேட் மற்றும் உணவு ஆலோசனையை பெறுங்கள்.",
                    send_wa_btn: "வாட்ஸ்அப்பிற்கு அனுப்புக",
                    key_observations_title: "உங்கள் பதில்களின் முக்கிய கண்டறிதல்கள்:"
                }
            },

            t(key, params = {}) {
                let dict = this.i18n[this.lang] || this.i18n['en'];
                let text = dict[key] || this.i18n['en'][key] || key;
                for (let p in params) {
                    text = text.replace(new RegExp(`{${p}}`, 'g'), params[p]);
                }
                return text;
            },

            get ageOptions() {
                if (this.lang === 'ml') {
                    return [
                        { val: 'Under 18', label: '18 വയസ്സിന് താഴെ', desc: 'വളർച്ചയുടെ ഘട്ടത്തിലെ അയേൺ ആവശ്യകത' },
                        { val: '18–29', label: '18–29 വയസ്സ്', desc: 'സജീവ കർമ്മശേഷിയും ഉയർന്ന ഉപാപചയ നിരക്കും' },
                        { val: '30–45', label: '30–45 വയസ്സ്', desc: 'ജോലി സമ്മർദ്ദവും രക്തധാതു ക്ഷീണവും' },
                        { val: '46–60', label: '46–60 വയസ്സ്', desc: 'ഹോർമോൺ മാറ്റങ്ങളും ക്ഷീണവും' },
                        { val: '60+', label: '60 വയസ്സിന് മുകളിൽ', desc: 'ദഹനക്കുറവ് മൂലമുള്ള അയേൺ ആഗിരണ മാന്ദ്യം' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 'Under 18', label: '18 वर्ष से कम', desc: 'शारीरिक विकास में तीव्र आयरन मांग' },
                        { val: '18–29', label: '18–29 वर्ष', desc: 'सक्रिय जीवनशैली और उच्च ऊर्जा मांग' },
                        { val: '30–45', label: '30–45 वर्ष', desc: 'तनाव और रक्त धातु की क्रमिक थकान' },
                        { val: '46–60', label: '46–60 वर्ष', desc: 'हार्मोनल बदलाव व शारीरिक सहनशक्ति' },
                        { val: '60+', label: '60 वर्ष से अधिक', desc: 'धीमी पाचन क्रिया से अवशोषण में कमी' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 'Under 18', label: '18 வயதுக்கு கீழ்', desc: 'வளர்ச்சி காலத்தில் அதிக இரும்புச்சத்து தேவை' },
                        { val: '18–29', label: '18–29 வயது', desc: 'தீவிர உழைப்பு மற்றும் ஆற்றல் தேவை' },
                        { val: '30–45', label: '30–45 வயது', desc: 'அன்றாட சோர்வு மற்றும் ரத்த பலவீனம்' },
                        { val: '46–60', label: '46–60 வயது', desc: 'ஹார்மோன் மாற்றங்கள் மற்றும் சத்து குறைவு' },
                        { val: '60+', label: '60 வயதுக்கு மேல்', desc: 'செரிமான குறைவால் இரும்புச்சத்து உறிஞ்சாமை' }
                    ];
                }
                return [
                    { val: 'Under 18', label: 'Under 18', desc: 'Rapid growth phase with elevated red blood cell synthesis' },
                    { val: '18–29', label: '18–29', desc: 'Peak reproductive and high-output physical demands' },
                    { val: '30–45', label: '30–45', desc: 'Career, family, and metabolic stress compounding fatigue' },
                    { val: '46–60', label: '46–60', desc: 'Perimenopause, hormonal transition, and vascular maintenance' },
                    { val: '60+', label: '60+', desc: 'Hypochlorhydria (low acid) and reduced intestinal nutrient absorption' }
                ];
            },

            get energyOptions() {
                if (this.lang === 'ml') {
                    return [
                        { val: 0, icon: '⚡', label: 'പകൽ മുഴുവൻ സ്ഥിരമായ ഊർജ്ജം', desc: 'അസാധാരണ ക്ഷീണമില്ലാതെ ദിവസം മുഴുവൻ ഉത്സാഹം നിലനിൽക്കുന്നു' },
                        { val: 1, icon: '🌤️', label: 'ഉച്ചകഴിഞ്ഞ് നേരിയ ക്ഷീണം', desc: 'ഉച്ചതിരിഞ്ഞ് അല്പം മന്ദത തോന്നുമെങ്കിലും വിശ്രമിച്ചാൽ മാറുന്നു' },
                        { val: 2, icon: '☕', label: 'കടുത്ത ഉച്ചയ്ക്കു ശേഷമുള്ള തളർച്ച', desc: 'ഉച്ചതിരിഞ്ഞ് ജോലി ചെയ്യാൻ കഴിയാത്തവിധം തളർച്ച; ചായ/കാപ്പിയെ ആശ്രയിക്കുന്നു' },
                        { val: 3, icon: '🔋', label: 'ഉണരുമ്പോൾ തന്നെ കടുത്ത ക്ഷീണം', desc: 'ഉറങ്ങി എഴുന്നേൽക്കുമ്പോഴും ഉന്മേഷമില്ലായ്മ; വിട്ടുമാറാത്ത അലസത' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 0, icon: '⚡', label: 'दिनभर स्थिर और भरपूर ऊर्जा', desc: 'बिना किसी असामान्य थकान के सक्रिय दिनचर्या' },
                        { val: 1, icon: '🌤️', label: 'दोपहर में हल्की सुस्ती', desc: 'दोपहर के समय हल्का आलस जो आराम से ठीक हो जाता है' },
                        { val: 2, icon: '☕', label: 'दोपहर में अत्यधिक थकान व टूटन', desc: 'काम करने में कठिनाई; चाय या कॉफी पर अत्यधिक निर्भरता' },
                        { val: 3, icon: '🔋', label: 'सुबह उठते ही भारी थकान', desc: 'पूरी नींद के बाद भी ताजगी न मिलना; लगातार थकान' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 0, icon: '⚡', label: 'நாள் முழுவதும் சீரான சுறுசுறுப்பு', desc: 'சோர்வின்றி நாள் முழுவதும் புத்துணர்ச்சியாக இருத்தல்' },
                        { val: 1, icon: '🌤️', label: 'மதிய வேளையில் லேசான மந்தம்', desc: 'மதியத்திற்குப் பின் லேசான சோர்வு, ஓய்வெடுத்தால் சரியாகும்' },
                        { val: 2, icon: '☕', label: 'மதிய வேளையில் கடுமையான தளர்ச்சி', desc: 'வேலை செய்ய முடியாத அளவுக்கு சோர்வு; டீ/காபி கட்டாயம் தேவை' },
                        { val: 3, icon: '🔋', label: 'விடியலில் எழும்போதே அதிக சோர்வு', desc: 'தூங்கி எழுந்தாலும் புத்துணர்ச்சி இல்லாமை; தொடர் அசதி' }
                    ];
                }
                return [
                    { val: 0, icon: '⚡', label: 'Consistent & Stable All Day', desc: 'Steady energy from morning to evening without abnormal drops' },
                    { val: 1, icon: '🌤️', label: 'Mild Afternoon Slump', desc: 'Noticeable drop around 2-4 PM but recovers with a short break' },
                    { val: 2, icon: '☕', label: 'Severe Mid-Day Crash', desc: 'Heavy fog, loss of focus, and strong reliance on caffeine to function' },
                    { val: 3, icon: '🔋', label: 'Wake Up Exhausted', desc: 'Unrefreshing sleep, dragging through the day, chronic low stamina' }
                ];
            },

            get exertionOptions() {
                if (this.lang === 'ml') {
                    return [
                        { val: 0, icon: '🏃', label: 'സാധാരണ ശ്വാസോച്ഛ്വാസം', desc: 'രണ്ട് നിലകൾ കയറിയാലും പെട്ടെന്ന് കിതപ്പില്ലാതെ സാധാരണ നിലയിലെത്തുന്നു' },
                        { val: 1, icon: '😮‍💨', label: 'ചെറിയ കയറ്റത്തിൽ തന്നെ കിതപ്പ്', desc: 'പടികൾ കയറുമ്പോഴോ നടക്കുമ്പോഴോ ശ്വാസമെടുക്കാൻ ബുദ്ധിമുട്ട് അനുഭവപ്പെടുന്നു' },
                        { val: 2, icon: '💓', label: 'നെഞ്ചിടിപ്പും തലകറക്കവും', desc: 'സാധാരണ നടത്തത്തിൽ പോലും നെഞ്ചിൽ പടപടപ്പും തലകറക്കവും അനുഭവപ്പെടുന്നു' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 0, icon: '🏃', label: 'सामान्य व सुचारू सांस', desc: 'सीढ़ियां चढ़ने पर भी सांस तेजी से सामान्य हो जाती है' },
                        { val: 1, icon: '😮‍💨', label: 'हल्के श्रम पर सांस फूलना', desc: 'सीढ़ियां चढ़ने या तेज चलने पर सांस लेने में भारीपन' },
                        { val: 2, icon: '💓', label: 'दिल की धड़कन तेज होना व चक्कर', desc: 'सामान्य चलने पर भी घबराहट, दिल धड़कना या चक्कर आना' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 0, icon: '🏃', label: 'இயல்பான சுவாசம்', desc: 'மாடிப்படிகள் ஏறினாலும் விரைவாக இயல்பு நிலைக்கு திரும்புதல்' },
                        { val: 1, icon: '😮‍💨', label: 'சிறு உழைப்பிலும் மூச்சு வாங்குதல்', desc: 'படிகள் ஏறும் போதோ அல்லது நடக்கும் போதோ கடுமையான மூச்சுத்திணறல்' },
                        { val: 2, icon: '💓', label: 'நெஞ்சு படபடப்பு மற்றும் தலைசுற்றல்', desc: 'சாதாரணமாக நடக்கும் போதே படபடப்பு அல்லது மயக்கம் போன்ற உணர்வு' }
                    ];
                }
                return [
                    { val: 0, icon: '🏃', label: 'Normal & Quick Recovery', desc: 'Comfortable recovery after climbing stairs or brisk walking' },
                    { val: 1, icon: '😮‍💨', label: 'Shortness of Breath on Mild Incline', desc: 'Panting, heavy breathing, or burning leg muscles on slight exertion' },
                    { val: 2, icon: '💓', label: 'Palpitations or Dizziness', desc: 'Pounding heartbeat, chest awareness, or lightheadedness on routine stairs' }
                ];
            },

            get physicalSignOptions() {
                if (this.lang === 'ml') {
                    return [
                        { val: 'pale', icon: '👁️', label: 'കണ്ണിന്റെ ഉള്ളിലോ നാക്കിലോ വിളർച്ച', desc: 'കൺപോളയുടെ ഉള്ളിലെ പാളിയിലോ നാവിലോ ഉള്ള വിളറിയ നിറം' },
                        { val: 'nails', icon: '💅', label: 'പെട്ടെന്ന് പൊട്ടുന്ന നഖങ്ങൾ', desc: 'നഖങ്ങളിൽ വരകൾ, കുഴിവുകൾ അല്ലെങ്കിൽ എളുപ്പത്തിൽ പൊട്ടിപ്പോകൽ' },
                        { val: 'hair', icon: '💇', label: 'അമിതമായ മുടികൊഴിച്ചിൽ', desc: 'കുളിക്കുമ്പോഴും ചീകുമ്പോഴും കൊഴിയുന്ന അസാധാരണ മുടികൊഴിച്ചിൽ' },
                        { val: 'cold', icon: '❄️', label: 'കൈകാലുകളിലെ വിട്ടുമാറാത്ത തണുപ്പ്', desc: 'ചൂടുള്ള കാലാവസ്ഥയിലും കൈകാലുകളിൽ എപ്പോഴും തണുപ്പ്' },
                        { val: 'dizzy', icon: '💫', label: 'പെട്ടെന്ന് എഴുന്നേൽക്കുമ്പോൾ തലകറക്കം', desc: 'ഇരുന്നിട്ട് എഴുന്നേൽക്കുമ്പോൾ കൺമുന്നിൽ ഇരുട്ട് കയറൽ' },
                        { val: 'brain_fog', icon: '🧠', label: 'ഓർമ്മക്കുറവും ശ്രദ്ധ കേന്ദ്രീകരിക്കാൻ ബുദ്ധിമുട്ടും', desc: 'മാനസിക മന്ദതയും തലച്ചോറിന്റെ പ്രവർത്തന മാന്ദ്യവും' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 'pale', icon: '👁️', label: 'आंखों या जीभ में पीलापन (फीकापन)', desc: 'पलकों के अंदर या जीभ पर गुलाबीपन की कमी व पीलापन' },
                        { val: 'nails', icon: '💅', label: 'कमजोर व टूटने वाले नाखून', desc: 'नाखूनों में धारियां, गड्ढे या आसानी से टूटना' },
                        { val: 'hair', icon: '💇', label: 'अत्यधिक बाल झड़ना', desc: 'नहाते समय या कंघी करते समय बालों का गुच्छों में गिरना' },
                        { val: 'cold', icon: '❄️', label: 'हाथ-पैरों का ठंडा रहना', desc: 'गर्म मौसम में भी हथेलियों और तलवों में लगातार ठंडक' },
                        { val: 'dizzy', icon: '💫', label: 'अचानक खड़े होने पर चक्कर आना', desc: 'बैठकर उठने पर आंखों के आगे अंधेरा छाना' },
                        { val: 'brain_fog', icon: '🧠', label: 'याददाश्त व एकाग्रता में कमी (Brain Fog)', desc: 'मानसिक सुस्ती और ध्यान केंद्रित करने में कठिनाई' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 'pale', icon: '👁️', label: 'கண் இமை அல்லது நாவில் வெளிறிய நிறம்', desc: 'கண்களின் உட்புறம் அல்லது நாவில் ரத்த சிவப்பின்மை' },
                        { val: 'nails', icon: '💅', label: 'உடையும் நகங்கள்', desc: 'நகங்கள் எளிதில் உடைதல் அல்லது வரி வரியாக இருத்தல்' },
                        { val: 'hair', icon: '💇', label: 'அதிகப்படியான முடி உதிர்தல்', desc: 'குளிக்கும் போதோ சீவும் போதோ முடி கொத்து கொத்தாக கொட்டுதல்' },
                        { val: 'cold', icon: '❄️', label: 'குளிர்ந்த கை கால்கள்', desc: 'வெயில் காலத்திலும் கை, கால்கள் சில்லென்று இருத்தல்' },
                        { val: 'dizzy', icon: '💫', label: 'திடீரென எழும்போது தலைசுற்றல்', desc: 'அமர்ந்து எழும்போது கண்கள் இருண்டு போதல்' },
                        { val: 'brain_fog', icon: '🧠', label: 'கவனக்குறைவு மற்றும் ஞாபக மறதி', desc: 'மன சோர்வு மற்றும் வேலையில் கவனம் செலுத்த முடியாமை' }
                    ];
                }
                return [
                    { val: 'pale', icon: '👁️', label: 'Pale Inner Eyelids or Tongue', desc: 'Conjunctival or mucosal pallor indicating reduced circulating hemoglobin' },
                    { val: 'nails', icon: '💅', label: 'Brittle, Ridged, or Spoon Nails', desc: 'Flattening, vertical ridges, or spooning (koilonychia) from low tissue iron' },
                    { val: 'hair', icon: '💇', label: 'Excessive Hair Shedding', desc: 'Telogen effluvium: follicles entering resting phase prematurely due to low ferritin' },
                    { val: 'cold', icon: '❄️', label: 'Persistent Cold Hands & Feet', desc: 'Vasoconstriction diverting red blood cells from extremities to core organs' },
                    { val: 'dizzy', icon: '💫', label: 'Dizziness or Seeing Spots When Standing', desc: 'Orthostatic lightheadedness from transient cerebral hypoperfusion' },
                    { val: 'brain_fog', icon: '🧠', label: 'Brain Fog & Poor Concentration', desc: 'Reduced brain oxygenation impairing working memory and alertness' }
                ];
            },

            get dietOptions() {
                if (this.lang === 'ml') {
                    return [
                        { val: 0, icon: '🥩', label: 'മിശ്രഭുക്ക് (Omnivore)', desc: 'ആഴ്ചയിൽ മാംസമോ മീനോ കഴിക്കുന്ന പതിവുണ്ട്' },
                        { val: 1, icon: '🥗', label: 'സസ്യാഹാരം (Vegetarian)', desc: 'പാലുൽപ്പന്നങ്ങളും സസ്യഭക്ഷണങ്ങളും മാത്രം കഴിക്കുന്നു' },
                        { val: 2, icon: '🌱', label: 'പൂർണ്ണ സസ്യാഹാരം (Strict Vegan)', desc: 'പാലുൽപ്പന്നങ്ങളോ മാംസമോ ഇല്ലാത്ത ഭക്ഷണം' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 0, icon: '🥩', label: 'मांसाहारी / मिश्राहारी (Omnivore)', desc: 'साप्ताहिक रूप से मांस, मछली या अंडे का सेवन' },
                        { val: 1, icon: '🥗', label: 'शुद्ध शाकाहारी (Vegetarian)', desc: 'दालें, सब्जियां और दुग्ध उत्पादों पर आधारित आहार' },
                        { val: 2, icon: '🌱', label: 'वीगन (Strict Vegan)', desc: 'पूरी तरह से पशु उत्पाद मुक्त वनस्पति आहार' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 0, icon: '🥩', label: 'அசைவ உணவு (Omnivore)', desc: 'வாரந்தோறும் இறைச்சி அல்லது மீன் உட்கொள்பவர்' },
                        { val: 1, icon: '🥗', label: 'சைவ உணவு (Vegetarian)', desc: 'காய்கறிகள், பருப்பு வகைகள் மற்றும் பால் உணவு' },
                        { val: 2, icon: '🌱', label: 'முழு சைவ உணவு (Strict Vegan)', desc: 'பால் அல்லது எந்தவொரு விலங்கு பொருளும் இல்லாத உணவு' }
                    ];
                }
                return [
                    { val: 0, icon: '🥩', label: 'Regular Omnivore', desc: 'Consumes red meat, poultry, or fish weekly (readily absorbed heme iron)' },
                    { val: 1, icon: '🥗', label: 'Vegetarian / Lacto-Vegetarian', desc: 'Relies entirely on non-heme plant iron (requires bio-enhancers for absorption)' },
                    { val: 2, icon: '🌱', label: 'Strictly Vegan / Limited Variety', desc: 'Plant-only intake with minimal iron-dense seeds, legumes, or greens' }
                ];
            },

            get gutOptions() {
                if (this.lang === 'ml') {
                    return [
                        { val: 'tannins', icon: '☕', label: 'ഭക്ഷണത്തിന് തൊട്ടുപിന്നാലെ ചായ / കാപ്പി', desc: 'ഭക്ഷണത്തിന് മുൻപോ ശേഷമോ ഉള്ള ചായ/കാപ്പി അയേൺ ആഗിരണത്തെ തടയുന്നു' },
                        { val: 'gut', icon: '💊', label: 'അസിഡിറ്റിയും ആന്റാസിഡ് ഗുളികകളുടെ ഉപയോഗവും', desc: 'വയറ്റിലെ സ്വാഭാവിക ആസിഡ് കുറയുന്നത് അയേൺ ആഗിരണം കുറയ്ക്കുന്നു' },
                        { val: 'low_vitc', icon: '🍋', label: 'വിറ്റാമിൻ സി കുറഞ്ഞ ഭക്ഷണക്രമം', desc: 'നെല്ലിക്ക, നാരങ്ങ തുടങ്ങിയ സിട്രസ് പഴങ്ങൾ ഭക്ഷണത്തിൽ കുറവാണ്' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 'tannins', icon: '☕', label: 'भोजन के तुरंत बाद चाय या कॉफी पीना', desc: 'चाय-कॉफी में मौजूद टैनिन आयरन को अवशोषित होने से रोकते हैं' },
                        { val: 'gut', icon: '💊', label: 'गैस, अपच व एंटासिड दवाइयों का उपयोग', desc: 'कम पेट का एसिड आयरन को अवशोषण योग्य रूप में बदलने नहीं देता' },
                        { val: 'low_vitc', icon: '🍋', label: 'आहार में विटामिन सी की कमी', desc: 'आंवला, नींबू या ताजे खट्टे फलों का कम सेवन' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 'tannins', icon: '☕', label: 'உணவுக்கு பின் உடனடியாக டீ / காபி', desc: 'டீ, காபியிலுள்ள டானின்கள் இரும்புச்சத்தை உறிஞ்ச விடாமல் தடுக்கிறது' },
                        { val: 'gut', icon: '💊', label: 'அசிடிட்டி & மாத்திரைகள் பயன்பாடு', desc: 'இரைப்பை அமிலம் குறைவாக இருப்பது இரும்புச்சத்து உறிஞ்சுதலை பாதிக்கிறது' },
                        { val: 'low_vitc', icon: '🍋', label: 'வைட்டமின் சி சத்து குறைவான உணவு', desc: 'நெல்லிக்காய், எலுமிச்சை போன்ற புளிப்பு பழங்களை குறைவாக உண்பது' }
                    ];
                }
                return [
                    { val: 'tannins', icon: '☕', label: 'Tea / Coffee / Milk Right with Meals', desc: 'Tannins, polyphenols, and calcium bind tightly to iron, blocking up to 60% absorption' },
                    { val: 'gut', icon: '💊', label: 'Frequent Bloating / Regular Antacid Use', desc: 'Low stomach acidity prevents conversion of ferric iron into absorbable ferrous form' },
                    { val: 'low_vitc', icon: '🍋', label: 'Minimal Vitamin C with Meals', desc: 'Lacking ascorbic acid (amla, lemon) that reduces iron chelation and enhances uptake' }
                ];
            },

            get lifeFactorOptions() {
                if (this.lang === 'ml') {
                    return [
                        { val: 'heavy_cycle', icon: '🩸', label: 'കഠിനമായ ആർത്തവ രക്തസ്രാവം', desc: 'മാസമുറയിൽ അമിതമായ രക്തനഷ്ടവും കോച്ചിപ്പിടുത്തവും' },
                        { val: 'past_anemia', icon: '🩺', label: 'മുൻപ് അനീമിയ (വിളർച്ച) ബാധിച്ചിട്ടുണ്ട്', desc: 'ഡോക്ടർ അയേൺ കുറവെന്ന് മുൻപ് കണ്ടെത്തിയിട്ടുണ്ട്' },
                        { val: 'postpartum', icon: '👶', label: 'പ്രസവശേഷമുള്ള ഘട്ടം / മുലയൂട്ടൽ', desc: 'കഴിഞ്ഞ 2 വർഷത്തിനിടെ പ്രസവം നടക്കുകയോ മുലയൂട്ടുകയോ ചെയ്യുന്നു' },
                        { val: 'endurance', icon: '🏃‍♀️', label: 'കഠിനമായ വ്യായാമം / വിയർപ്പ്', desc: 'വ്യായാമം വഴിയുള്ള ധാതുക്കളുടെ നഷ്ടം' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 'heavy_cycle', icon: '🩸', label: 'अत्यधिक मासिक धर्म रक्तस्राव (Heavy Periods)', desc: 'मासिक धर्म में सामान्य से अधिक रक्त व कमजोरी' },
                        { val: 'past_anemia', icon: '🩺', label: 'पहले एनीमिया (खून की कमी) का इतिहास', desc: 'पूर्व में हीमोग्लोबिन कम होने की पुष्टि हुई हो' },
                        { val: 'postpartum', icon: '👶', label: 'प्रसवोत्तर / स्तनपान काल', desc: 'पिछले 2 वर्षों में प्रसव हुआ हो या वर्तमान में स्तनपान करा रही हों' },
                        { val: 'endurance', icon: '🏃‍♀️', label: 'कठिन व्यायाम व अत्यधिक पसीना', desc: 'दैनिक एथलेटिक अभ्यास से मिनरल्स का क्षरण' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 'heavy_cycle', icon: '🩸', label: 'அதிக மாதவிடாய் ரத்தப்போக்கு', desc: 'மாதவிடாய் காலத்தில் அதிக ரத்த இழப்பு மற்றும் சோர்வு' },
                        { val: 'past_anemia', icon: '🩺', label: 'முன்பு ரத்த சோகை (Anemia) கண்டறியப்பட்டது', desc: 'முன்பு ஹீமோகுளோபின் குறைவாக இருந்ததற்கான வரலாறு' },
                        { val: 'postpartum', icon: '👶', label: 'பிரசவத்திற்கு பின் / தாய்ப்பால் அளித்தல்', desc: 'கடந்த 2 வருடங்களில் பிரசவம் அல்லது தாய்ப்பால் புகட்டுதல்' },
                        { val: 'endurance', icon: '🏃‍♀️', label: 'கடுமையான உடற்பயிற்சி & வியர்வை', desc: 'கடுமையான உடற்பயிற்சியினால் ஏற்படும் சத்து இழப்பு' }
                    ];
                }
                return [
                    { val: 'heavy_cycle', icon: '🩸', label: 'Heavy or Prolonged Menstrual Cycles', desc: 'Losing >80ml blood per cycle substantially depletes baseline ferritin stores' },
                    { val: 'past_anemia', icon: '🩺', label: 'Prior History of Diagnosed Anemia', desc: 'Previous borderline hemoglobin or prescribed oral iron supplements' },
                    { val: 'postpartum', icon: '👶', label: 'Postpartum or Breastfeeding (<2 Years)', desc: 'Maternal nutrient depletion during gestation, delivery, and lactation' },
                    { val: 'endurance', icon: '🏃‍♀️', label: 'Intense Endurance Athletic Training', desc: 'Foot-strike hemolysis and heavy sweat electrolyte depletion' }
                ];
            },

            startQuiz() {
                this.step = 1;
                this.scrollToTop();
            },

            scrollToTop() {
                const el = document.getElementById('iron-test');
                if (el) {
                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            },

            toggleMulti(field, value) {
                const arr = this.answers[field];
                const idx = arr.indexOf(value);
                if (idx > -1) {
                    arr.splice(idx, 1);
                } else {
                    arr.push(value);
                }
            },

            clearMulti(field) {
                this.answers[field] = [];
                this.nextStep();
            },

            get stepCategory() {
                const map = {
                    en: ['Assessment', 'Profile: Full Name', 'Profile: Gender', 'Profile: Age Group', 'Contact: WhatsApp', 'Dimension 1: Energy Curve', 'Dimension 1: Exertion & Stamina', 'Dimension 2: Physical Signs', 'Dimension 3: Dietary Pattern', 'Dimension 3: Digestive Absorption', 'Dimension 4: Life Stage Factors'],
                    ml: ['പരിശോധന', 'വിവരങ്ങൾ: പേര്', 'വിവരങ്ങൾ: ലിംഗം', 'വിവരങ്ങൾ: പ്രായപരിധി', 'ബന്ധപ്പെടാൻ: വാട്സാപ്പ്', 'ലക്ഷണം 1: ഊർജ്ജ നില', 'ലക്ഷണം 1: അധ്വാനവും കിതപ്പും', 'ലക്ഷണം 2: ശാരീരിക അടയാളങ്ങൾ', 'ലക്ഷണം 3: ഭക്ഷണക്രമം', 'ലക്ഷണം 3: ദഹന ആഗിരണം', 'ലക്ഷണം 4: ജീവിതാവസ്ഥകൾ'],
                    hi: ['मूल्यांकन', 'विवरण: पूरा नाम', 'विवरण: लिंग', 'विवरण: आयु वर्ग', 'संपर्क: व्हाट्सएप', 'आयाम 1: दैनिक ऊर्जा', 'आयाम 1: शारीरिक सहनशक्ति', 'आयाम 2: शारीरिक संकेत', 'आयाम 3: आहार पैटर्न', 'आयाम 3: पाचन अवशोषण', 'आयाम 4: जीवन चरण कारक'],
                    ta: ['மதிப்பீடு', 'விவரம்: முழு பெயர்', 'விவரம்: பாலினம்', 'விவரம்: வயது வரம்பு', 'தொடர்பு: வாட்ஸ்அப்', 'நிலை 1: ஆற்றல் நிலை', 'நிலை 1: உழைப்பும் மூச்சும்', 'நிலை 2: உடல் அறிகுறிகள்', 'நிலை 3: உணவு முறை', 'நிலை 3: செரிமான உறிஞ்சுதல்', 'நிலை 4: வாழ்க்கை சூழல்']
                };
                let list = map[this.lang] || map['en'];
                return list[this.step] || list[0];
            },

            get canProceed() {
                if (this.step === 1) return this.profile.name.trim().length >= 2;
                if (this.step === 2) return this.profile.gender !== '';
                if (this.step === 3) return this.profile.ageGroup !== '';
                if (this.step === 4) return this.profile.phone.replace(/[^0-9]/g, '').length >= 10;
                if (this.step === 5) return this.answers.q1 !== null;
                if (this.step === 6) return this.answers.q1_breath !== null;
                if (this.step === 7) return true; // Optional checklist
                if (this.step === 8) return this.answers.q3_diet !== null;
                if (this.step === 9) return true; // Optional checklist
                if (this.step === 10) return true; // Optional checklist
                return false;
            },

            nextStep() {
                if (this.canProceed && this.step < 11) {
                    this.step++;
                    this.scrollToTop();
                }
            },

            prevStep() {
                if (this.step > 0) {
                    this.step--;
                    this.scrollToTop();
                }
            },

            resetQuiz() {
                this.step = 0;
                this.profile = { name: '', gender: '', ageGroup: '', phone: '' };
                this.answers = { q1: null, q1_breath: null, q2: [], q3_diet: null, q3_gut: [], q4_factors: [] };
                this.scrollToTop();
            },

            get score() {
                let s = 0;
                if (this.answers.q1 === 1) s += 1;
                if (this.answers.q1 === 2) s += 2.5;
                if (this.answers.q1 === 3) s += 4;

                if (this.answers.q1_breath === 1) s += 1.5;
                if (this.answers.q1_breath === 2) s += 3;

                if (this.answers.q2.includes('pale')) s += 2.5;
                if (this.answers.q2.includes('nails')) s += 2;
                if (this.answers.q2.includes('hair')) s += 1.5;
                if (this.answers.q2.includes('cold')) s += 1.5;
                if (this.answers.q2.includes('dizzy')) s += 2;
                if (this.answers.q2.includes('brain_fog')) s += 1.5;

                if (this.answers.q3_diet === 1) s += 1;
                if (this.answers.q3_diet === 2) s += 2.5;

                if (this.answers.q3_gut.includes('tannins')) s += 2;
                if (this.answers.q3_gut.includes('gut')) s += 2;
                if (this.answers.q3_gut.includes('low_vitc')) s += 1;

                if (this.answers.q4_factors.includes('heavy_cycle')) s += 3.5;
                if (this.answers.q4_factors.includes('past_anemia')) s += 3;
                if (this.answers.q4_factors.includes('postpartum')) s += 2.5;
                if (this.answers.q4_factors.includes('endurance')) s += 1.5;

                return Math.round(s * 10) / 10;
            },

            get result() {
                let riskKey = 'low';
                if (this.score >= 8.5) {
                    riskKey = 'high';
                } else if (this.score >= 4) {
                    riskKey = 'moderate';
                }

                const data = {
                    en: {
                        low: { riskLabel: 'Optimal Blood Vitality (Low Risk)', message: 'Your vital energy indicators and cellular oxygenation reflect healthy Rakta Dhatu balance. Continuing balanced digestive habits and wholesome nutrition supports consistent stamina.' },
                        moderate: { riskLabel: 'Early Depletion (Moderate Risk)', message: 'You are displaying early signs of iron depletion and suboptimal blood nourishment. Addressing absorption inhibitors and incorporating daily food-matrix iron will help prevent further exhaustion.' },
                        high: { riskLabel: 'Significant Depletion Indicator (High)', message: 'Your reported symptoms and physical markers strongly indicate depleted ferritin stores and weakened Rakta Dhatu. Introducing gentle, bioavailable nutritional support without digestive side effects is highly recommended.' }
                    },
                    ml: {
                        low: { riskLabel: 'ആരോഗ്യകരമായ രക്തധാതു (Low Risk)', message: 'നിങ്ങളുടെ ശരീരത്തിലെ രക്തധാതുവും ഓക്സിജൻ പ്രവാഹവും തൃപ്തികരമായ നിലയിലാണ്. സമീകൃതാഹാരവും ആരോഗ്യകരമായ ജീവിതരീതിയും തുടർന്നും കാത്തുസൂക്ഷിക്കുക.' },
                        moderate: { riskLabel: 'നേരിയ അയേൺ കുറവ് (Moderate Risk)', message: 'നിങ്ങൾക്ക് അയേൺ തോതിൽ ചെറിയ കുറവ് കാണപ്പെടുന്നു. ഭക്ഷണത്തോടൊപ്പമുള്ള ചായ ഒഴിവാക്കുകയും അയേൺ അടങ്ങിയ ആഹാരങ്ങൾ ശീലമാക്കുകയും ചെയ്യുന്നത് ഉചിതമാണ്.' },
                        high: { riskLabel: 'ശ്രദ്ധിക്കേണ്ട അയേൺ കുറവ് (High Risk)', message: 'നിങ്ങളുടെ ലക്ഷണങ്ങൾ ശരീരത്തിൽ കാര്യമായ തോതിൽ അയേൺ (ഫെറിറ്റിൻ) കുറവുണ്ടെന്ന് സൂചിപ്പിക്കുന്നു. സ്വാഭാവികമായ രക്തപുഷ്ടി ഔഷധങ്ങളും ഡോക്ടറുടെ ഉപദേശവും അത്യന്താപേക്ഷിതമാണ്.' }
                    },
                    hi: {
                        low: { riskLabel: 'स्वस्थ रक्त धातु (कम जोखिम)', message: 'आपकी जीवन शक्ति और हीमोग्लोबिन संतुलन सामान्य है। पौष्टिक आहार और नियमित दिनचर्या जारी रखें।' },
                        moderate: { riskLabel: 'हल्की आयरन कमी (मध्यम जोखिम)', message: 'आपमें आयरन की प्रारंभिक कमी के लक्षण दिख रहे हैं। चाय-कॉफी का परहेज और भोजन में आयरन युक्त पोषण बढ़ाना आवश्यक है।' },
                        high: { riskLabel: 'महत्वपूर्ण आयरन कमी (उच्च जोखिम)', message: 'आपके लक्षण शरीर में फेरिटिन और हीमोग्लोबिन की गंभीर कमी की ओर संकेत करते हैं। आयुर्वेदिक रक्त वर्धक पोषण की तत्काल आवश्यकता है।' }
                    },
                    ta: {
                        low: { riskLabel: 'ஆரோக்கியமான ரத்த தாது (குறைந்த ஆபத்து)', message: 'உங்கள் ரத்த ஓட்டமும் இரும்புச்சத்தும் இயல்பான அளவில் உள்ளது. சத்தான உணவை தொடர்ந்து கடைப்பிடிக்கவும்.' },
                        moderate: { riskLabel: 'லேசான இரும்புச்சத்து குறைவு (நடுத்தர ஆபத்து)', message: 'இரும்புச்சத்து குறைபாட்டின் ஆரம்ப அறிகுறிகள் தென்படுகின்றன. உறிஞ்சுதலை தடுக்கும் பழக்கங்களை மாற்றி சத்தான உணவை உட்கொள்ளவும்.' },
                        high: { riskLabel: 'அதிக இரும்புச்சத்து குறைபாடு (அதிக ஆபத்து)', message: 'உங்கள் அறிகுறிகள் உடலில் கணிசமான இரும்புச்சத்து (ஃபெரிடின்) குறைபாட்டை காட்டுகின்றன. உடனடி மருத்துவ ஊட்டச்சத்து ஆதரவு தேவை.' }
                    }
                };

                let dict = data[this.lang] || data['en'];
                let chosen = dict[riskKey] || dict['low'];
                return { riskKey, riskLabel: chosen.riskLabel, message: chosen.message };
            },

            get diagnosticFlags() {
                let flags = [];
                const lang = this.lang;

                if (this.answers.q1 >= 2) {
                    if (lang === 'ml') flags.push("വിട്ടുമാറാത്ത കഠിനമായ ക്ഷീണവും ഉന്മേഷക്കുറവും കോശങ്ങളിലേക്ക് ആവശ്യത്തിന് ഓക്സിജൻ എത്തുന്നില്ലെന്ന് സൂചിപ്പിക്കുന്നു.");
                    else if (lang === 'hi') flags.push("लगातार बनी रहने वाली थकान शरीर के ऊतकों में ऑक्सीजन की कमी को दर्शाती है।");
                    else if (lang === 'ta') flags.push("தொடர் சோர்வு மற்றும் விடியல் புத்துணர்ச்சியின்மை செல்களுக்கு ஆக்ஸிஜன் பற்றாக்குறையை காட்டுகிறது.");
                    else flags.push("Elevated chronic fatigue and unrefreshed mornings flag low tissue oxygenation.");
                }

                if (this.answers.q1_breath >= 1) {
                    if (lang === 'ml') flags.push("ചെറിയ നടത്തത്തിൽ പോലും കിതപ്പ് ഉണ്ടാകുന്നത് രക്തത്തിലെ ഓക്സിജൻ വാഹക ശേഷി കുറവായതിനാലാണ്.");
                    else if (lang === 'hi') flags.push("हल्के श्रम पर सांस फूलना लाल रक्त कोशिकाओं की कम ऑक्सीजन वहन क्षमता का संकेत है।");
                    else if (lang === 'ta') flags.push("எளிய உடலுழைப்பிலும் மூச்சுத்திணறல் ஏற்படுவது ரத்தத்தின் ஆக்ஸிஜன் கடத்தும் திறன் குறைவை காட்டுகிறது.");
                    else flags.push("Exertional shortness of breath suggests reduced red blood cell oxygen-carrying capacity.");
                }

                if (this.answers.q2.includes('pale')) {
                    if (lang === 'ml') flags.push("കൺപോളകളുടെ ഉള്ളിലെ വിളർച്ച ഹീമോഗ്ലോബിന്റെ അളവ് കുറവാണെന്നതിന്റെ പ്രധാന ലക്ഷണമാണ്.");
                    else if (lang === 'hi') flags.push("आंखों व जीभ का फीकापन हीमोग्लोबिन की कमी का स्पष्ट लक्षण है।");
                    else if (lang === 'ta') flags.push("கண் இமைகளின் வெளிறிய நிறம் ஹீமோகுளோபின் குறைபாட்டின் முக்கிய அடையாளம்.");
                    else flags.push("Pallor of conjunctiva/mucous membranes is a hallmark physical sign of depleted hemoglobin.");
                }

                if (this.answers.q2.includes('nails') || this.answers.q2.includes('hair')) {
                    if (lang === 'ml') flags.push("നഖം പൊട്ടുന്നതും മുടികൊഴിച്ചിലും ദീർഘകാലമായുള്ള അയേൺ (ഫെറിറ്റിൻ) കുറവിന്റെ സൂചനയാണ്.");
                    else if (lang === 'hi') flags.push("कमजोर नाखून और बालों का झड़ना लंबे समय से फेरिटिन की कमी दर्शाते हैं।");
                    else if (lang === 'ta') flags.push("உடையும் நகங்களும் முடி உதிர்தலும் உடலில் நீண்ட நாட்களாக இரும்புச்சத்து குறைவாக உள்ளதை குறிக்கிறது.");
                    else flags.push("Brittle nails and diffuse hair shedding point to long-standing low ferritin stores.");
                }

                if (this.answers.q2.includes('cold')) {
                    if (lang === 'ml') flags.push("കൈകാലുകളിലെ തണുപ്പ് രക്തചംക്രമണത്തിന്റെ കുറവിനെ സൂചിപ്പിക്കുന്നു.");
                    else if (lang === 'hi') flags.push("हाथ-पैरों का ठंडा रहना परिधीय रक्त संचार की कमी का संकेत है।");
                    else if (lang === 'ta') flags.push("குளிர்ந்த கை கால்கள் ரத்த ஓட்ட பற்றாக்குறையை காட்டுகிறது.");
                    else flags.push("Persistent cold extremities indicate reduced peripheral Rakta circulation.");
                }

                if (this.answers.q3_gut.includes('tannins')) {
                    if (lang === 'ml') flags.push("ഭക്ഷണത്തിന് ശേഷമുള്ള ചായ/കാപ്പി അയേൺ ആഗിരണത്തെ 60% വരെ തടസ്സപ്പെടുത്തുന്നു.");
                    else if (lang === 'hi') flags.push("भोजन के तुरंत बाद चाय/कॉफी का सेवन 60% तक आयरन अवशोषण रोक देता है।");
                    else if (lang === 'ta') flags.push("உணவுக்குப் பின் டீ/காபி குடிப்பது இரும்புச்சத்து உறிஞ்சுதலை 60% வரை தடுக்கிறது.");
                    else flags.push("Post-meal tea/coffee/milk consumption is inhibiting up to 60% of dietary iron absorption.");
                }

                if (this.answers.q4_factors.includes('heavy_cycle')) {
                    if (lang === 'ml') flags.push("കൂടിയ ആർത്തവ രക്തസ്രാവം മാസന്തോറുമുള്ള രക്തനഷ്ടത്തിനും അയേൺ കുറവിനും കാരണമാകുന്നു.");
                    else if (lang === 'hi') flags.push("अत्यधिक मासिक धर्म रक्तस्राव हर महीने फेरिटिन के स्तर को तेजी से घटाता है।");
                    else if (lang === 'ta') flags.push("அதிக மாதவிடாய் ரத்தப்போக்கு மாதாந்திர இரும்புச்சத்து இழப்பை பன்மடங்கு கூட்டுகிறது.");
                    else flags.push("Heavy menstrual cycles substantially increase monthly blood and ferritin loss.");
                }

                if (flags.length === 0) {
                    if (lang === 'ml') {
                        flags.push("കാര്യമായ അയേൺ കുറവിന്റെ ലക്ഷണങ്ങൾ കണ്ടെത്തിയിട്ടില്ല; രക്തധാതു സന്തുലിതമാണ്.");
                        flags.push("നിലവിലെ ആരോഗ്യകരമായ സമീകൃതാഹാര ശീലം തുടർന്നും മുന്നോട്ട് കൊണ്ടുപോവുക.");
                    } else if (lang === 'hi') {
                        flags.push("कोई गंभीर कमी के लक्षण नहीं मिले हैं; रक्त धातु संतुलित स्थिति में है।");
                        flags.push("स्वस्थ ऊर्जा बनाए रखने के लिए संतुलित खानपान जारी रखें।");
                    } else if (lang === 'ta') {
                        flags.push("கடுமையான குறைபாட்டின் அறிகுறிகள் இல்லை; உங்கள் ரத்த தாது சீராக உள்ளது.");
                        flags.push("நல்ல ஆற்றலை தக்கவைக்க சத்தான உணவு பழக்கத்தை தொடரவும்.");
                    } else {
                        flags.push("No severe depletion indicators detected; your current biomarkers are within a balanced range.");
                        flags.push("Continue nourishing meals and balanced digestive habits to maintain optimal Rakta vitality.");
                    }
                }

                return flags;
            },

            get whatsappReportLink() {
                const clinicPhone = "917736609299";
                let text = '';
                if (this.lang === 'ml') {
                    text = `🌿 *യുവൻ ക്ലിനിക്കൽ റിപ്പോർട്ട്: രക്തത്തിലെ അയേൺ & ഉന്മേഷ പരിശോധന*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *രോഗിയുടെ പേര്:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *ലിംഗം:* ${this.profile.gender || 'Not specified'} | *പ്രായപരിധി:* ${this.profile.ageGroup || 'Not specified'}\n`;
                    text += `📱 *വാട്സാപ്പ്:* +91 ${this.profile.phone || ''}\n\n`;
                    text += `📊 *പരിശോധനാ ഫലം:* ${this.result.riskLabel} (${this.score} pts)\n`;
                    text += `📝 *വിശകലനം:* ${this.result.message}\n\n`;
                    text += `📋 *പ്രധാന കണ്ടെത്തലുകൾ:*\n`;
                    this.diagnosticFlags.forEach(f => { text += `• ${f}\n`; });
                    text += `\n🍫 *വീചോക്ക് അയേൺ ചോക്ലേറ്റുകൾ:*\nhttps://yuvann.com/shops/veachoc\n\n`;
                    text += `നമസ്കാരം ഡോ. സജീവ് ദേവ്, ദയവായി എന്റെ ഈ റിപ്പോർട്ട് പരിശോധിച്ച് എനിക്ക് അനുയോജ്യമായ വീചോക്ക് ചോക്ലേറ്റുകളും ഭക്ഷണക്രമവും നിർദ്ദേശിച്ചാലും!`;
                } else if (this.lang === 'hi') {
                    text = `🌿 *युवान क्लिनिकल रिपोर्ट: आयरन और रक्त जीवन शक्ति मूल्यांकन*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *रोगी का नाम:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *लिंग:* ${this.profile.gender || 'Not specified'} | *आयु वर्ग:* ${this.profile.ageGroup || 'Not specified'}\n`;
                    text += `📱 *व्हाट्सएप:* +91 ${this.profile.phone || ''}\n\n`;
                    text += `📊 *परिणाम:* ${this.result.riskLabel} (${this.score} pts)\n`;
                    text += `📝 *विवरण:* ${this.result.message}\n\n`;
                    text += `📋 *मुख्य बिंदु:*\n`;
                    this.diagnosticFlags.forEach(f => { text += `• ${f}\n`; });
                    text += `\n🍫 *वीचोक चॉकलेट्स संग्रह:*\nhttps://yuvann.com/shops/veachoc\n\n`;
                    text += `नमस्ते डॉ. सजीव देव, कृपया मेरी इस रिपोर्ट की समीक्षा करें और मुझे सही वीचोक उत्पाद और खुराक का मार्गदर्शन दें!`;
                } else if (this.lang === 'ta') {
                    text = `🌿 *யுவான் மருத்துவ அறிக்கை: இரும்புச்சத்து & ரத்த புத்துணர்ச்சி*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *நோயாளி:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *பாலினம்:* ${this.profile.gender || 'Not specified'} | *வயது:* ${this.profile.ageGroup || 'Not specified'}\n`;
                    text += `📱 *வாட்ஸ்அப்:* +91 ${this.profile.phone || ''}\n\n`;
                    text += `📊 *முடிவு:* ${this.result.riskLabel} (${this.score} pts)\n`;
                    text += `📝 *மருத்துவ சுருக்கம்:* ${this.result.message}\n\n`;
                    text += `📋 *முக்கிய தகவல்கள்:*\n`;
                    this.diagnosticFlags.forEach(f => { text += `• ${f}\n`; });
                    text += `\n🍫 *வீசாக் இரும்புச்சத்து சாக்லேட்:* https://yuvann.com/shops/veachoc\n\n`;
                    text += `வணக்கம் டாக்டர் சஜீவ் தேவ், எனது அறிக்கையை பரிசீலித்து எனக்கு ஏற்ற வீசாக் மற்றும் உணவு ஆலோசனைகளை வழங்குங்கள்!`;
                } else {
                    text = `🌿 *YUVANN CLINICAL REPORT: IRON & BLOOD VITALITY*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *Patient:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *Gender:* ${this.profile.gender || 'Not specified'} | *Age Group:* ${this.profile.ageGroup || 'Not specified'}\n`;
                    text += `📱 *WhatsApp:* +91 ${this.profile.phone || ''}\n\n`;
                    text += `📊 *Assessment Result:* ${this.result.riskLabel} (Score: ${this.score} pts)\n`;
                    text += `📝 *Clinical Summary:* ${this.result.message}\n\n`;
                    text += `📋 *Key Observations:*\n`;
                    this.diagnosticFlags.forEach(f => { text += `• ${f}\n`; });
                    text += `\n🍫 *Recommended VeaChoc Collection:*\nhttps://yuvann.com/shops/veachoc\n\n`;
                    text += `Hello Dr. Sajeev Dev, please guide me on the ideal VeaChoc formulation and daily dosage for my report!`;
                }
                
                return `https://wa.me/${clinicPhone}?text=${encodeURIComponent(text)}`;
            }
        }
    }
</script>
