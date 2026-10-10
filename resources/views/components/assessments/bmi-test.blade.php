<section id="bmi-assessment" class="py-16 md:py-20 bg-brand-green-50/70 relative">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8" x-data="bmiAssessment()" x-cloak>
        
        <!-- Section Header with Language Selector -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-2 mb-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider text-brand-green-900 bg-brand-green-100 uppercase">
                    <span x-text="t('badge')"></span>
                </span>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-gray-900" x-text="t('heading')"></h2>
            <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto mt-2" x-text="t('subheading')"></p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-5 sm:p-8 md:p-10 border border-gray-200/80 relative overflow-hidden">
            
            <!-- Global Floating Language Switcher Header (Visible across all steps) -->
            <div class="flex flex-wrap items-center justify-between pb-4 mb-6 border-b border-gray-100 gap-3">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wider flex items-center gap-1">
                        <span>🌐</span>
                        <span x-text="t('lang_label')">Language</span>:
                    </span>
                    <span class="text-xs font-extrabold text-brand-green-900 bg-brand-green-100/80 px-2.5 py-0.5 rounded-full" x-text="currentLangName"></span>
                </div>
                
                <!-- Quick Language Switching Pills -->
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
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-emerald-50 text-emerald-800 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-emerald-200 shadow-sm">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-serif font-bold text-gray-900 mb-2" x-text="t('intro_title')"></h3>
                <p class="text-sm sm:text-base text-gray-600 max-w-lg mx-auto mb-6 leading-relaxed" x-text="t('intro_desc')"></p>

                <!-- Prominent Language Selector Cards -->
                <div class="mb-8 p-5 bg-gradient-to-br from-brand-green-50/80 to-emerald-50/60 rounded-2xl border border-brand-green-200/80 shadow-xs">
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

            <!-- Quiz Stepper Header (Steps 1 to 8) -->
            <div x-show="step >= 1 && step <= 8" class="mb-6">
                <div class="flex items-center justify-between text-xs font-semibold text-gray-500 mb-2">
                    <span class="text-brand-green-800 uppercase tracking-wider font-bold" x-text="stepCategory"></span>
                    <span class="font-bold text-gray-700" x-text="t('step_counter', {step: step, total: 8})"></span>
                </div>
                <div class="h-2 w-full bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-brand-green-700 to-emerald-500 transition-all duration-300 ease-out"
                         :style="`width: ${(step / 8) * 100}%`"></div>
                </div>
            </div>

            <!-- STEP 1: Full Name -->
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 1, total: 8})"></span>
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
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 2, total: 8})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q2_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('q2_desc')"></p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="profile.gender = 'Female'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Female' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">👩</span>
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': profile.gender === 'Female'}" x-text="t('gender_female')"></span>
                                <span class="text-xs text-gray-500" x-text="t('gender_female_desc')"></span>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                             :class="profile.gender === 'Female' ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="profile.gender === 'Female'" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                        </div>
                    </button>

                    <button type="button" 
                            @click="profile.gender = 'Male'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Male' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">👨</span>
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': profile.gender === 'Male'}" x-text="t('gender_male')"></span>
                                <span class="text-xs text-gray-500" x-text="t('gender_male_desc')"></span>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                             :class="profile.gender === 'Male' ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="profile.gender === 'Male'" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                        </div>
                    </button>

                    <button type="button" 
                            @click="profile.gender = 'Other'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Other' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">🧑</span>
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': profile.gender === 'Other'}" x-text="t('gender_other')"></span>
                                <span class="text-xs text-gray-500" x-text="t('gender_other_desc')"></span>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                             :class="profile.gender === 'Other' ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="profile.gender === 'Other'" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                        </div>
                    </button>
                </div>
            </div>

            <!-- STEP 3: Age Group -->
            <div x-show="step === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 3, total: 8})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q3_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('q3_desc')"></p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in ageOptions" :key="item.val">
                        <button type="button" 
                                @click="profile.ageGroup = item.val" 
                                class="w-full text-left p-4 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="profile.ageGroup === item.val ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': profile.ageGroup === item.val}" x-text="item.label"></span>
                                <span class="text-xs text-gray-500 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="profile.ageGroup === item.val ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                                <div x-show="profile.ageGroup === item.val" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 4: WhatsApp Phone Number -->
            <div x-show="step === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 4, total: 8})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q4_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('q4_desc')"></p>
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
                    <div class="bg-emerald-50 rounded-xl p-3 border border-emerald-200/80 flex items-start gap-2.5 text-xs text-emerald-900">
                        <span class="text-base shrink-0">🔒</span>
                        <span x-text="t('q4_privacy')"></span>
                    </div>
                </div>
            </div>

            <!-- STEP 5: Height & Weight Metrics -->
            <div x-show="step === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 5, total: 8})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q5_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('q5_desc')"></p>
                </div>

                <div class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200">
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5" x-text="t('q5_height_label')"></label>
                            <div class="relative">
                                <input type="number" 
                                       x-model.number="answers.height" 
                                       placeholder="168" 
                                       min="80" max="250"
                                       class="w-full bg-white border-2 border-gray-300 rounded-xl px-4 py-3 text-lg font-bold text-gray-900 focus:outline-none focus:border-brand-green-700">
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-gray-400">cm</span>
                            </div>
                            <span class="text-[11px] text-gray-500 mt-1 block">5 ft = 152 cm · 5'6" = 168 cm · 5'10" = 178 cm</span>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200">
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5" x-text="t('q5_weight_label')"></label>
                            <div class="relative">
                                <input type="number" 
                                       x-model.number="answers.weight" 
                                       placeholder="68" 
                                       min="25" max="220"
                                       class="w-full bg-white border-2 border-gray-300 rounded-xl px-4 py-3 text-lg font-bold text-gray-900 focus:outline-none focus:border-brand-green-700">
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-gray-400">kg</span>
                            </div>
                            <span class="text-[11px] text-gray-500 mt-1 block" x-text="t('q5_weight_hint')"></span>
                        </div>
                    </div>

                    <div x-show="bmiValue > 0" class="p-4 rounded-2xl bg-brand-green-50/80 border border-brand-green-200 flex items-center justify-between">
                        <div>
                            <span class="text-xs uppercase font-bold text-brand-green-800" x-text="t('calc_bmi_preview')">Calculated BMI</span>
                            <div class="text-2xl font-serif font-black text-brand-green-950" x-text="bmiValue"></div>
                        </div>
                        <span class="px-3.5 py-1.5 rounded-full text-xs font-bold"
                              :class="{
                                  'bg-amber-100 text-amber-900': bmiCategoryKey === 'underweight',
                                  'bg-emerald-100 text-emerald-900': bmiCategoryKey === 'normal',
                                  'bg-orange-100 text-orange-900': bmiCategoryKey === 'overweight',
                                  'bg-red-100 text-red-900': bmiCategoryKey === 'obese'
                              }"
                              x-text="bmiCategoryLabel"></span>
                    </div>
                </div>
            </div>

            <!-- STEP 6: Primary Health Goal -->
            <div x-show="step === 6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 6, total: 8})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q6_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('q6_desc')"></p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in goalOptions" :key="item.val">
                        <button type="button" 
                                @click="answers.goal = item.val" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.goal === item.val ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div class="flex items-center gap-3.5">
                                <span class="text-2xl" x-text="item.icon"></span>
                                <div>
                                    <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.goal === item.val}" x-text="item.label"></span>
                                    <span class="text-xs text-gray-500" x-text="item.desc"></span>
                                </div>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.goal === item.val ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                                <div x-show="answers.goal === item.val" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 7: Digestion (Agni) -->
            <div x-show="step === 7" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 7, total: 8})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q7_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('q7_desc')"></p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in agniOptions" :key="item.val">
                        <button type="button" 
                                @click="answers.agni = item.val" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.agni === item.val ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div class="flex items-center gap-3.5">
                                <span class="text-2xl" x-text="item.icon"></span>
                                <div>
                                    <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.agni === item.val}" x-text="item.label"></span>
                                    <span class="text-xs text-gray-500" x-text="item.desc"></span>
                                </div>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.agni === item.val ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                                <div x-show="answers.agni === item.val" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 8: Constitution (Dosha Tendency) -->
            <div x-show="step === 8" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2" x-text="t('step_counter', {step: 8, total: 8})"></span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug" x-text="t('q8_title')"></h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('q8_desc')"></p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in doshaOptions" :key="item.val">
                        <button type="button" 
                                @click="answers.dosha = item.val" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.dosha === item.val ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div class="flex items-center gap-3.5">
                                <span class="text-2xl" x-text="item.icon"></span>
                                <div>
                                    <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.dosha === item.val}" x-text="item.label"></span>
                                    <span class="text-xs text-gray-500" x-text="item.desc"></span>
                                </div>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.dosha === item.val ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                                <div x-show="answers.dosha === item.val" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- Quiz Stepper Footer Buttons (Steps 1 to 8) -->
            <div x-show="step >= 1 && step <= 8" class="mt-8 pt-5 border-t border-gray-100 flex items-center justify-between">
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
                    <span x-text="step === 8 ? t('submit_btn') : t('next_btn')">Next Step</span>
                    <span>→</span>
                </button>
            </div>

            <!-- STEP 9: Detailed Diagnostic Report Screen -->
            <div x-show="step === 9" x-transition:enter="transition ease-out duration-400" x-transition:enter-start="opacity-0 scale-98" x-transition:enter-end="opacity-100 scale-100" class="py-2">
                
                <div class="text-center mb-8">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider text-emerald-900 bg-emerald-100 uppercase mb-2">
                        <span>📋</span>
                        <span x-text="t('report_badge')">Official Clinical Evaluation</span>
                    </span>
                    <h3 class="text-2xl sm:text-3xl font-serif font-bold text-gray-900">
                        <span x-text="profile.name || 'Valued Patient'"></span>, <span x-text="t('report_ready_title')">Your Ayurvedic Body Blueprint</span>
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1" x-text="t('report_ready_subtitle')"></p>
                </div>

                <!-- Main BMI Score Hero Card -->
                <div class="rounded-3xl p-6 sm:p-8 mb-6 border shadow-sm text-center relative overflow-hidden"
                     :class="{
                         'bg-amber-50/70 border-amber-200': bmiCategoryKey === 'underweight',
                         'bg-emerald-50/70 border-emerald-200': bmiCategoryKey === 'normal',
                         'bg-orange-50/70 border-orange-200': bmiCategoryKey === 'overweight',
                         'bg-red-50/70 border-red-200': bmiCategoryKey === 'obese'
                     }">
                    <span class="text-xs font-extrabold uppercase tracking-widest text-gray-500 block mb-1" x-text="t('bmi_hero_label')">Your Calculated Body Mass Index</span>
                    <div class="text-5xl sm:text-6xl font-serif font-black mb-2"
                         :class="{
                             'text-amber-800': bmiCategoryKey === 'underweight',
                             'text-emerald-900': bmiCategoryKey === 'normal',
                             'text-orange-900': bmiCategoryKey === 'overweight',
                             'text-red-900': bmiCategoryKey === 'obese'
                         }"
                         x-text="bmiValue"></div>
                    
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-sm font-black mb-4 shadow-2xs"
                         :class="{
                             'bg-amber-200/90 text-amber-950': bmiCategoryKey === 'underweight',
                             'bg-emerald-200/90 text-emerald-950': bmiCategoryKey === 'normal',
                             'bg-orange-200/90 text-orange-950': bmiCategoryKey === 'overweight',
                             'bg-red-200/90 text-red-950': bmiCategoryKey === 'obese'
                         }"
                         x-text="bmiCategoryLabel"></div>

                    <p class="text-xs sm:text-sm text-gray-700 max-w-lg mx-auto leading-relaxed" x-text="bmiAdviceText"></p>
                </div>

                <!-- WhatsApp Quick Action Banner -->
                <div class="bg-gradient-to-r from-emerald-50 via-brand-green-50 to-emerald-50 rounded-2xl p-5 border border-emerald-200/90 mb-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-center sm:text-left">
                        <h4 class="font-bold text-sm sm:text-base text-emerald-950 flex items-center justify-center sm:justify-start gap-1.5">
                            <span>📲</span>
                            <span x-text="t('wa_box_title')">Receive Full Body Composition Report on WhatsApp</span>
                        </h4>
                        <p class="text-xs text-emerald-800 mt-0.5" x-text="t('wa_box_desc')">
                            Get your ideal weight target, metabolic Agni prescription, and lifestyle plan sent to your phone.
                        </p>
                    </div>
                    <a :href="whatsappLink" target="_blank" 
                       class="inline-flex items-center justify-center bg-[#25D366] hover:bg-[#1ebd5b] text-white font-bold px-6 py-3 rounded-xl transition-all shadow-sm hover:shadow-md text-xs sm:text-sm gap-2 shrink-0 cursor-pointer">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.976L2 22l5.174-1.357a9.923 9.923 0 004.838 1.259h.005c5.505 0 9.988-4.479 9.988-9.985S17.518 2 12.012 2zM12.012 20.202h-.004a8.273 8.273 0 01-4.223-1.155l-.303-.18-3.138.823.836-3.062-.197-.314A8.252 8.252 0 013.69 11.984C3.691 7.42 7.408 3.702 11.97 3.702c4.545 0 8.243 3.714 8.243 8.283 0 4.56-3.7 8.272-8.201 8.217zM16.55 13.992c-.248-.124-1.472-.727-1.7-.811-.228-.084-.395-.124-.56.124-.167.248-.646.811-.79 9.977-.146.166-.293.187-.54.062-1.071-.539-2.583-1.638-3.197-2.317-.168-.186-.334-.187-.582-.062-.248.125-1.05.388-1.602 1.341-.55 1.05.021 1.554.499 2.502.167.332.083.623-.042.871-.125.248-.56 1.348-.767 1.846-.2.482-.403.417-.56.425-.145.008-.312.008-.479.008a.911.911 0 00-.663.309c-.228.248-.871.851-.871 2.073s.893 2.404 1.018 2.57c.125.166 1.752 2.673 4.246 3.75.594.256 1.057.41 1.419.524.595.189 1.137.162 1.564.098.48-.073 1.472-.602 1.68-1.184.208-.582.208-1.08.146-1.184-.062-.104-.228-.166-.476-.29z"/>
                        </svg>
                        <span x-text="t('send_wa_btn')">Send to My WhatsApp</span>
                    </a>
                </div>

                <!-- Diagnostic Breakdown Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <!-- Ideal Target Weight -->
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-widest block mb-1" x-text="t('target_wt_label')">Target Weight Window</span>
                        <div class="text-xl font-serif font-bold text-brand-green-900" x-text="idealWeightRange"></div>
                        <p class="text-xs text-gray-600 mt-1" x-text="t('target_wt_desc')"></p>
                    </div>

                    <!-- Agni Diagnostic -->
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-widest block mb-1" x-text="t('agni_card_label')">Metabolic Fire (Agni)</span>
                        <div class="text-xl font-serif font-bold text-brand-green-900" x-text="agniLabelText"></div>
                        <p class="text-xs text-gray-600 mt-1" x-text="agniDescriptionText"></p>
                    </div>
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
    function bmiAssessment() {
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
                height: '',
                weight: '',
                goal: '',
                agni: '',
                dosha: ''
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

            // Full localized string dictionaries
            i18n: {
                en: {
                    badge: "Clinical Ayurvedic Assessment",
                    heading: "Ayurvedic BMI & Prakriti Assessment",
                    subheading: "A personalized clinical screening by Dr. Sajeev Dev to evaluate your body mass composition, digestive fire (Agni), and biological constitution (Prakriti).",
                    lang_label: "Language",
                    choose_lang_title: "Select Your Preferred Language",
                    intro_title: "Discover Your Ayurvedic Body Balance & Ideal Weight",
                    intro_desc: "Standard weight charts ignore your unique constitutional build. This doctor-guided assessment calculates your body mass using Asian-Indian clinical cutoffs and maps your metabolic Agni and Dosha tendencies, delivered directly to your WhatsApp.",
                    f1_title: "Takes 2 Minutes",
                    f1_desc: "One focused question at a time.",
                    f2_title: "WhatsApp Report",
                    f2_desc: "Receive your detailed custom metrics on your phone.",
                    f3_title: "Doctor-Guided",
                    f3_desc: "Ayurvedic guidance by Dr. Sajeev Dev.",
                    begin_btn: "Begin Assessment",
                    prev_btn: "Previous",
                    next_btn: "Next Step",
                    submit_btn: "Submit & View Report",
                    retake_btn: "← Retake Assessment",
                    step_counter: "Step {step} of {total}",
                    
                    q1_title: "1. What is your full name?",
                    q1_desc: "To personalize your confidential health evaluation and official report:",
                    q1_placeholder: "e.g. Priya Sharma",
                    q1_tip: "Type your name and press <strong>Enter ↵</strong> or click <strong>Next Step →</strong> below.",

                    q2_title: "2. What is your biological gender?",
                    q2_desc: "Basal metabolic rate (BMR) and body fat percentage distribution vary by gender:",
                    gender_female: "Female",
                    gender_female_desc: "Essential fat distribution, hormonal cycles, and subcutaneous metabolic balance",
                    gender_male: "Male",
                    gender_male_desc: "Higher muscle mass baseline, visceral fat risk, and higher daily metabolic expenditure",
                    gender_other: "Other / Prefer not to say",
                    gender_other_desc: "Holistic metabolic balance and general Ayurvedic constitutional evaluation",

                    q3_title: "3. Which age group do you belong to?",
                    q3_desc: "Age directly impacts metabolic rate, tissue building (Dhatus), and digestive fire:",

                    q4_title: "4. What is your WhatsApp phone number?",
                    q4_desc: "We will format your complete BMI profile, target weight metrics, and doctor's custom advice directly to your WhatsApp:",
                    q4_placeholder: "Enter 10-digit mobile number",
                    q4_privacy: "Confidential. Your number is only used to deliver your assessment report and doctor consultation.",

                    q5_title: "5. What are your current height and weight?",
                    q5_desc: "Used to compute your Body Mass Index (BMI) using Asian-Indian clinical cutoffs:",
                    q5_height_label: "Height (in cm)",
                    q5_weight_label: "Weight (in kg)",
                    q5_weight_hint: "Measure in the morning before breakfast for peak accuracy",
                    calc_bmi_preview: "Calculated BMI",

                    q6_title: "6. What is your primary wellness objective?",
                    q6_desc: "Allows Dr. Sajeev Dev to tailor dietary guidelines and functional foods to your goal:",

                    q7_title: "7. How would you describe your daily digestion (Agni)?",
                    q7_desc: "Agni is the root of metabolic health in Ayurveda, dictating nutrient assimilation:",

                    q8_title: "8. What is your natural physical & mental tendency (Dosha)?",
                    q8_desc: "Identifies your biological constitution (Prakriti) to sustain lifelong vitality:",

                    report_badge: "Official Clinical Evaluation",
                    report_ready_title: "Your Ayurvedic Body Blueprint",
                    report_ready_subtitle: "Clinical evaluation generated based on Asian-Indian WHO/ICMR standards and Tridosha balance.",
                    bmi_hero_label: "Your Calculated Body Mass Index",
                    wa_box_title: "Receive Full Body Composition Report on WhatsApp",
                    wa_box_desc: "Get your ideal weight target, metabolic Agni prescription, and lifestyle plan sent to your phone.",
                    send_wa_btn: "Send to My WhatsApp",
                    target_wt_label: "Target Weight Window",
                    target_wt_desc: "Calculated for your height using Asian-Indian clinical standards (BMI 18.5 – 22.9).",
                    agni_card_label: "Metabolic Fire (Agni)"
                },
                ml: {
                    badge: "ആയുർവേദ ക്ലിനിക്കൽ പരിശോധന",
                    heading: "ആയുർവേദ BMI & ശരീരപ്രകൃതി നിർണ്ണയം",
                    subheading: "ഡോ. സജീവ് ദേവിന്റെ നേതൃത്വത്തിൽ നിങ്ങളുടെ ശരീരഭാരം (BMI), ദഹനശേഷി (അഗ്നി), ശരീരപ്രകൃതി (ത്രിദോഷങ്ങൾ) എന്നിവ വിലയിരുത്താനുള്ള പരിശോധന.",
                    lang_label: "ഭാഷ",
                    choose_lang_title: "നിങ്ങളുടെ ഭാഷ തിരഞ്ഞെടുക്കുക",
                    intro_title: "ശരീര പ്രകൃതിയും അനുയോജ്യമായ ശരീരഭാരവും അറിയൂ",
                    intro_desc: "ഓരോരുത്തരുടെയും ശരീരപ്രകൃതി വ്യത്യസ്തമാണ്. ഇന്ത്യൻ ക്ലിനിക്കൽ മാനദണ്ഡങ്ങൾ അനുസരിച്ച് നിങ്ങളുടെ BMI, ദഹനശേഷി (അഗ്നി), ശരീരപ്രകൃതി എന്നിവ മനസ്സിലാക്കി ഡോക്ടറുടെ നിർദ്ദേശങ്ങൾ നിങ്ങളുടെ വാട്സാപ്പിൽ നേരിട്ട് ലഭ്യമാക്കുന്നു.",
                    f1_title: "2 മിനിറ്റ് മതി",
                    f1_desc: "ലളിതമായ ഏതാനും ചോദ്യങ്ങൾ മാത്രം.",
                    f2_title: "വാട്സാപ്പ് റിപ്പോർട്ട്",
                    f2_desc: "പൂർണ്ണ വിവരങ്ങൾ നിങ്ങളുടെ ഫോണിലേക്ക്.",
                    f3_title: "വിദഗ്ദ്ധ ഡോക്ടർ ഉപദേശം",
                    f3_desc: "ഡോ. സജീവ് ദേവിന്റെ നേരിട്ടുള്ള മാർഗ്ഗനിർദ്ദേശം.",
                    begin_btn: "പരിശോധന ആരംഭിക്കുക",
                    prev_btn: "പിന്നോട്ട്",
                    next_btn: "അടുത്ത ഘട്ടം",
                    submit_btn: "റിപ്പോർട്ട് കാണുക",
                    retake_btn: "← വീണ്ടും പരിശോധിക്കുക",
                    step_counter: "ഘട്ടം {step} / {total}",

                    q1_title: "1. നിങ്ങളുടെ മുഴുവൻ പേരെന്താണ്?",
                    q1_desc: "നിങ്ങളുടെ പരിശോധനാ റിപ്പോർട്ടിനായി പേര് നൽകുക:",
                    q1_placeholder: "ഉദാ: പ്രിയ ശർമ്മ",
                    q1_tip: "പേര് ടൈപ്പ് ചെയ്ത് <strong>Enter ↵</strong> അമർത്തുക അല്ലെങ്കിൽ താഴെയുള്ള <strong>അടുത്ത ഘട്ടം →</strong> ക്ലിക്ക് ചെയ്യുക.",

                    q2_title: "2. നിങ്ങളുടെ ലിംഗം ഏതാണ്?",
                    q2_desc: "ശരീരത്തിലെ അപചയ പ്രക്രിയയും (Metabolism) കൊഴുപ്പിന്റെ അളവും ലിംഗഭേദമനുസരിച്ച് വ്യത്യാസപ്പെടുന്നു:",
                    gender_female: "സ്ത്രീ (Female)",
                    gender_female_desc: "ഹോർമോൺ വ്യതിയാനങ്ങളും സ്വാഭാവിക ശരീരഘടനയും പരിഗണിക്കുന്നു",
                    gender_male: "പുരുഷൻ (Male)",
                    gender_male_desc: "മസിൽ പിണ്ഡവും ദൈനംദിന കലോറി ആവശ്യകതയും പരിഗണിക്കുന്നു",
                    gender_other: "മറ്റുള്ളവ (Other)",
                    gender_other_desc: "പൊതുവായ ആയുർവേദ പ്രകൃതി നിർണ്ണയം",

                    q3_title: "3. നിങ്ങളുടെ പ്രായപരിധി ഏതാണ്?",
                    q3_desc: "പ്രായം ദഹനശേഷിയെയും ധാതുക്കളുടെ നിർമ്മാണത്തെയും നേരിട്ട് സ്വാധീനിക്കുന്നു:",

                    q4_title: "4. നിങ്ങളുടെ വാട്സാപ്പ് നമ്പർ നൽകുക:",
                    q4_desc: "നിങ്ങളുടെ വിശദമായ BMI റിപ്പോർട്ടും ഡോക്ടറുടെ ആരോഗ്യ നിർദ്ദേശങ്ങളും ഈ നമ്പറിലേക്ക് അയച്ചു നൽകുന്നതാണ്:",
                    q4_placeholder: "10 അക്ക മൊബൈൽ നമ്പർ നൽകുക",
                    q4_privacy: "തികച്ചും രഹസ്യമായി സൂക്ഷിക്കും. റിപ്പോർട്ട് അയക്കുന്നതിനും ഡോക്ടറുടെ കൺസൾട്ടേഷനും മാത്രമായി ഉപയോഗിക്കുന്നു.",

                    q5_title: "5. നിങ്ങളുടെ ഉയരവും തൂക്കവും എത്രയാണ്?",
                    q5_desc: "നിങ്ങളുടെ കൃത്യമായ ബോഡി മാസ് ഇൻഡക്സ് (BMI) കണക്കാക്കുന്നതിന്:",
                    q5_height_label: "ഉയരം (സെ.മീ / cm)",
                    q5_weight_label: "ശരീരഭാരം (കി.ഗ്രാം / kg)",
                    q5_weight_hint: "രാവിലെ പ്രാതലിന് മുൻപ് അളക്കുന്നത് ഏറ്റവും കൃത്യമായിരിക്കും",
                    calc_bmi_preview: "കണക്കാക്കിയ BMI",

                    q6_title: "6. നിങ്ങളുടെ പ്രധാന ആരോഗ്യ ലക്ഷ്യം എന്താണ്?",
                    q6_desc: "നിങ്ങളുടെ ലക്ഷ്യത്തിനനുസരിച്ച് ഭക്ഷണക്രമവും ഔഷധങ്ങളും നിർദ്ദേശിക്കാൻ സഹായിക്കുന്നു:",

                    q7_title: "7. നിങ്ങളുടെ നിത്യേനയുള്ള ദഹനം (അഗ്നി) എങ്ങനെയുള്ളതാണ്?",
                    q7_desc: "ആയുർവേദത്തിൽ ദഹനശേഷി (അഗ്നി) ശരീരത്തിന്റെ ആരോഗ്യത്തിന്റെ അടിത്തറയാണ്:",

                    q8_title: "8. നിങ്ങളുടെ ശരീര പ്രകൃതി (ദോഷം) എങ്ങനെയുള്ളതാണ്?",
                    q8_desc: "ആരോഗ്യം നിലനിർത്താൻ നിങ്ങളുടെ ജന്മസിദ്ധമായ ശരീരപ്രകൃതി അറിയുന്നത് അത്യാവശ്യമാണ്:",

                    report_badge: "ക്ലിനിക്കൽ പരിശോധനാ റിപ്പോർട്ട്",
                    report_ready_title: "നിങ്ങളുടെ ആയുർവേദ ശരീര റിപ്പോർട്ട്",
                    report_ready_subtitle: "ഇന്ത്യൻ ക്ലിനിക്കൽ മാനദണ്ഡങ്ങളും ത്രിദോഷ സിദ്ധാന്തവും അനുസരിച്ച് തയ്യാറാക്കിയത്.",
                    bmi_hero_label: "കണക്കാക്കിയ ബോഡി മാസ് ഇൻഡക്സ് (BMI)",
                    wa_box_title: "പൂർണ്ണ വിവരങ്ങൾ വാട്സാപ്പിൽ സൗജന്യമായി ലഭിക്കാൻ",
                    wa_box_desc: "അനുയോജ്യമായ ശരീരഭാരം, ഭക്ഷണക്രമം, ഡോക്ടറുടെ നിർദ്ദേശങ്ങൾ എന്നിവ ഫോണിൽ ലഭ്യമാകും.",
                    send_wa_btn: "വാട്സാപ്പിലേക്ക് അയക്കുക",
                    target_wt_label: "അനുയോജ്യമായ ശരീരഭാരം (Target Weight)",
                    target_wt_desc: "നിങ്ങളുടെ ഉയരത്തിന് അനുയോജ്യമായ ആരോഗ്യകരമായ ശരീരഭാര പരിധി (BMI 18.5 – 22.9).",
                    agni_card_label: "ദഹനശേഷി (അഗ്നി വിശകലനം)"
                },
                hi: {
                    badge: "आयुर्वेदिक नैदानिक मूल्यांकन",
                    heading: "आयुर्वेदिक बीएमआई (BMI) व प्रकृति मूल्यांकन",
                    subheading: "डॉ. सजीव देव द्वारा आपके बॉडी मास (बीएमआई), पाचन अग्नि और जैविक प्रकृति (दोष) का व्यक्तिगत मूल्यांकन।",
                    lang_label: "भाषा",
                    choose_lang_title: "अपनी पसंदीदा भाषा चुनें",
                    intro_title: "अपने शरीर का आयुर्वेदिक संतुलन और आदर्श वजन जानें",
                    intro_desc: "पारंपरिक चार्ट शरीर की व्यक्तिगत प्रकृति को नजरअंदाज करते हैं। यह डॉक्टर-निर्देशित मूल्यांकन भारतीय नैदानिक मानकों के अनुसार आपके बीएमआई और पाचन अग्नि की स्थिति सीधे आपके व्हाट्सएप पर भेजता है।",
                    f1_title: "केवल 2 मिनट",
                    f1_desc: "सरल और केंद्रित प्रश्न।",
                    f2_title: "व्हाट्सएप रिपोर्ट",
                    f2_desc: "विस्तृत रिपोर्ट सीधे आपके फोन पर।",
                    f3_title: "डॉक्टर द्वारा निर्देशित",
                    f3_desc: "डॉ. सजीव देव द्वारा प्रमाणित मार्गदर्शन।",
                    begin_btn: "मूल्यांकन शुरू करें",
                    prev_btn: "पिछला",
                    next_btn: "अगला कदम",
                    submit_btn: "रिपोर्ट देखें",
                    retake_btn: "← पुनः मूल्यांकन करें",
                    step_counter: "चरण {step} / {total}",

                    q1_title: "1. आपका पूरा नाम क्या है?",
                    q1_desc: "आपकी गोपनीय स्वास्थ्य रिपोर्ट तैयार करने के लिए:",
                    q1_placeholder: "उदा. प्रिया शर्मा",
                    q1_tip: "नाम लिखकर <strong>Enter ↵</strong> दबाएं या नीचे <strong>अगला कदम →</strong> पर क्लिक करें।",

                    q2_title: "2. आपका जैविक लिंग क्या है?",
                    q2_desc: "लिंग के अनुसार मेटाबॉलिक दर और वसा वितरण में अंतर होता है:",
                    gender_female: "महिला (Female)",
                    gender_female_desc: "हार्मोनल संतुलन और प्राकृतिक शारीरिक बनावट",
                    gender_male: "पुरुष (Male)",
                    gender_male_desc: "मांसपेशियों का अनुपात और दैनिक ऊर्जा व्यय",
                    gender_other: "अन्य (Other)",
                    gender_other_desc: "सामान्य आयुर्वेदिक शारीरिक मूल्यांकन",

                    q3_title: "3. आप किस आयु वर्ग में आते हैं?",
                    q3_desc: "आयु सीधे तौर पर मेटाबॉलिज्म और पाचन अग्नि को प्रभावित करती है:",

                    q4_title: "4. आपका व्हाट्सएप मोबाइल नंबर क्या है?",
                    q4_desc: "हम आपकी पूरी बीएमआई प्रोफाइल और डॉक्टर की सलाह सीधे आपके व्हाट्सएप पर भेजेंगे:",
                    q4_placeholder: "10 अंकों का मोबाइल नंबर दर्ज करें",
                    q4_privacy: "पूर्णतः गोपनीय। केवल रिपोर्ट और डॉक्टर परामर्श के लिए उपयोग होगा।",

                    q5_title: "5. आपकी वर्तमान लंबाई और वजन कितना है?",
                    q5_desc: "सटीक बॉडी मास इंडेक्स (BMI) की गणना के लिए आवश्यक:",
                    q5_height_label: "लंबाई (सेमी / cm)",
                    q5_weight_label: "वजन (किलो / kg)",
                    q5_weight_hint: "सुबह खाली पेट मापने पर सबसे सटीक परिणाम मिलते हैं",
                    calc_bmi_preview: "गणना किया गया बीएमआई",

                    q6_title: "6. आपका प्राथमिक स्वास्थ्य लक्ष्य क्या है?",
                    q6_desc: "डॉक्टर को आपके लक्ष्य के अनुसार सही आहार और उपाय सुझाने में मदद मिलती है:",

                    q7_title: "7. आपका दैनिक पाचन (अग्नि) कैसा रहता है?",
                    q7_desc: "आयुर्वेद में पाचन अग्नि संपूर्ण स्वास्थ्य की नींव है:",

                    q8_title: "8. आपकी प्राकृतिक शारीरिक प्रवृत्ति (दोष) क्या है?",
                    q8_desc: "निरोगी जीवन के लिए अपनी मूल प्रकृति (वात, पित्त, कफ) को समझना आवश्यक है:",

                    report_badge: "आधिकारिक क्लिनिकल मूल्यांकन",
                    report_ready_title: "आपकी आयुर्वेदिक शरीर रिपोर्ट",
                    report_ready_subtitle: "भारतीय चिकित्सा मानकों और त्रिदोष संतुलन के आधार पर तैयार।",
                    bmi_hero_label: "आपका बॉडी मास इंडेक्स (BMI)",
                    wa_box_title: "व्हाट्सएप पर पूरी रिपोर्ट प्राप्त करें",
                    wa_box_desc: "आदर्श वजन लक्ष्य, पाचन अग्नि उपचार और आहार योजना अपने फोन पर पाएं।",
                    send_wa_btn: "व्हाट्सएप पर भेजें",
                    target_wt_label: "आदर्श वजन सीमा (Target Weight)",
                    target_wt_desc: "आपकी लंबाई के अनुसार स्वस्थ वजन सीमा (BMI 18.5 – 22.9)।",
                    agni_card_label: "पाचन शक्ति (अग्नि विश्लेषण)"
                },
                ta: {
                    badge: "ஆயுர்வேத மருத்துவ மதிப்பீடு",
                    heading: "ஆயுர்வேத பிஎம்ஐ (BMI) & பிரகிருதி மதிப்பீடு",
                    subheading: "டாக்டர் சஜீவ் தேவ் அவர்களின் வழிகாட்டுதலில் உங்கள் உடல் எடை (BMI), செரிமான சக்தி (அக்னி) மற்றும் பிரகிருதி மதிப்பீடு.",
                    lang_label: "மொழி",
                    choose_lang_title: "உங்கள் மொழியைத் தேர்ந்தெடுக்கவும்",
                    intro_title: "உங்கள் உடலின் இயல்பான எடையும் தத்துவமும் அறியுங்கள்",
                    intro_desc: "ஒவ்வொருவரின் உடல் கட்டமைப்பும் தனித்துவமானது. இந்திய மருத்துவ அளவுகோலின்படி உங்கள் பிஎம்ஐ, செரிமான சக்தி மற்றும் உடல் தோஷத்தை அறிந்து உங்கள் வாட்ஸ்அப்பில் நேரடியாக அறிக்கை பெறுங்கள்.",
                    f1_title: "2 நிமிடங்கள் போதும்",
                    f1_desc: "எளிமையான சில கேள்விகள் மட்டுமே.",
                    f2_title: "வாட்ஸ்அப் அறிக்கை",
                    f2_desc: "முழு விவரங்கள் உங்கள் தொலைபேசியில்.",
                    f3_title: "மருத்துவர் வழிகாட்டுதல்",
                    f3_desc: "டாக்டர் சஜீவ் தேவ் அவர்களின் பிரத்யேக ஆலோசனை.",
                    begin_btn: "மதிப்பீட்டைத் தொடங்கவும்",
                    prev_btn: "முந்தையது",
                    next_btn: "அடுத்த படி",
                    submit_btn: "அறிக்கையைக் காண்க",
                    retake_btn: "← மீண்டும் மதிப்பீடு செய்க",
                    step_counter: "படி {step} / {total}",

                    q1_title: "1. உங்கள் முழு பெயர் என்ன?",
                    q1_desc: "உங்கள் மருத்துவ அறிக்கையை தயாரிக்க உங்கள் பெயரை உள்ளிடவும்:",
                    q1_placeholder: "எ.கா: பிரியா சர்மா",
                    q1_tip: "பெயரை உள்ளிட்டு <strong>Enter ↵</strong> அழுத்தவும் அல்லது <strong>அடுத்த படி →</strong> கிளிக் செய்யவும்.",

                    q2_title: "2. உங்கள் பாலினம் என்ன?",
                    q2_desc: "பாலினத்திற்கு ஏற்ப வளர்சிதை மாற்றமும் கொழுப்பு அமைப்பும் மாறுபடுகிறது:",
                    gender_female: "பெண் (Female)",
                    gender_female_desc: "ஹார்மோன் சுழற்சி மற்றும் இயல்பான தசை அமைப்பு",
                    gender_male: "ஆண் (Male)",
                    gender_male_desc: "அதிக தசை அளவு மற்றும் அன்றாட ஆற்றல் தேவை",
                    gender_other: "மற்றவை (Other)",
                    gender_other_desc: "பொதுவான ஆயுர்வேத பிரகிருதி மதிப்பீடு",

                    q3_title: "3. உங்கள் வயது வரம்பு என்ன?",
                    q3_desc: "வயது செரிமான சக்தியையும் உடல் பலத்தையும் நேரடியாக பாதிக்கிறது:",

                    q4_title: "4. உங்கள் வாட்ஸ்அப் எண் என்ன?",
                    q4_desc: "உங்கள் விரிவான பிஎம்ஐ அறிக்கை மற்றும் மருத்துவர் ஆலோசனையை இந்த எண்ணிற்கு அனுப்புவோம்:",
                    q4_placeholder: "10 இலக்க மொபைல் எண்ணை உள்ளிடவும்",
                    q4_privacy: "முற்றிலும் ரகசியமானது. அறிக்கை மற்றும் மருத்துவ ஆலோசனைக்கு மட்டுமே பயன்படும்.",

                    q5_title: "5. உங்கள் தற்போதைய உயரமும் எடையும் என்ன?",
                    q5_desc: "சரியான பிஎம்ஐ (BMI) கணக்கிட இவை தேவை:",
                    q5_height_label: "உயரம் (செ.மீ / cm)",
                    q5_weight_label: "எடை (கி.கி / kg)",
                    q5_weight_hint: "காலை உணவுக்கு முன் அளவிடுவது மிகவும் துல்லியமானது",
                    calc_bmi_preview: "கணக்கிடப்பட்ட பிஎம்ஐ",

                    q6_title: "6. உங்கள் முக்கிய ஆரோக்கிய நோக்கம் என்ன?",
                    q6_desc: "உங்கள் நோக்கத்திற்கு ஏற்ப சரியான உணவு மற்றும் தயாரிப்புகளை மருத்துவர் பரிந்துரைக்க உதவும்:",

                    q7_title: "7. உங்கள் அன்றாட செரிமானம் (அக்னி) எவ்வாறு உள்ளது?",
                    q7_desc: "ஆயுர்வேதத்தில் செரிமான சக்தி (அக்னி) ஆரோக்கியத்தின் மூலக்கல்லாகும்:",

                    q8_title: "8. உங்கள் உடல் பிரகிருதி (தோஷம்) எவ்வாறு உள்ளது?",
                    q8_desc: "நீண்ட ஆயுளுக்கும் ஆரோக்கியத்திற்கும் உங்கள் தோஷ அமைப்பை அறிவது அவசியம்:",

                    report_badge: "அதிகாரப்பூர்வ மருத்துவ அறிக்கை",
                    report_ready_title: "உங்கள் ஆயுர்வேத உடல் அறிக்கை",
                    report_ready_subtitle: "இந்திய மருத்துவ அளவுகோல்கள் மற்றும் திரிதோஷ சமநிலையின் அடிப்படையில் உருவானது.",
                    bmi_hero_label: "கணக்கிடப்பட்ட பிஎம்ஐ (BMI)",
                    wa_box_title: "வாட்ஸ்அப்பில் முழு அறிக்கையைப் பெறுக",
                    wa_box_desc: "இலக்கு எடை, அக்னி மருந்து மற்றும் உணவு ஆலோசனைகளை உங்கள் தொலைபேசியில் பெறுக.",
                    send_wa_btn: "வாட்ஸ்அப்பிற்கு அனுப்புக",
                    target_wt_label: "இலக்கு எடை வரம்பு (Target Weight)",
                    target_wt_desc: "உங்கள் உயரத்திற்கு ஏற்ற ஆரோக்கியமான எடை வரம்பு (BMI 18.5 – 22.9).",
                    agni_card_label: "செரிமான சக்தி (அக்னி ஆய்வு)"
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
                        { val: 'Under 18', label: '18 വയസ്സിന് താഴെ', desc: 'കഫ പ്രായം: ശരീര വളർച്ചയുടെ ഘട്ടം' },
                        { val: '18–29', label: '18–29 വയസ്സ്', desc: 'പിത്ത പ്രായം: ഉയർന്ന ഉന്മേഷവും കർമ്മശേഷിയും' },
                        { val: '30–45', label: '30–45 വയസ്സ്', desc: 'മെറ്റബോളിസം മന്ദഗതിയിലാകുന്ന പ്രായം' },
                        { val: '46–60', label: '46–60 വയസ്സ്', desc: 'ഹോർമോൺ വ്യതിയാനങ്ങളും മാറ്റങ്ങളും' },
                        { val: '60+', label: '60 വയസ്സിന് മുകളിൽ', desc: 'വാത പ്രായം: സന്ധികൾക്കും എല്ലുകൾക്കും കൂടുതൽ കരുതൽ' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 'Under 18', label: '18 वर्ष से कम', desc: 'कफ अवस्था: शारीरिक विकास का काल' },
                        { val: '18–29', label: '18–29 वर्ष', desc: 'पित्त अवस्था: उच्चतम ऊर्जा व सक्रियता' },
                        { val: '30–45', label: '30–45 वर्ष', desc: 'मेटाबॉलिज्म में हल्का धीमापन' },
                        { val: '46–60', label: '46–60 वर्ष', desc: 'हार्मोनल बदलाव व संतुलन' },
                        { val: '60+', label: '60 वर्ष से अधिक', desc: 'वात अवस्था: जोड़ों व हड्डियों की विशेष देखभाल' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 'Under 18', label: '18 வயதுக்கு கீழ்', desc: 'கப பருவம்: உடல் வளர்ச்சி காலம்' },
                        { val: '18–29', label: '18–29 வயது', desc: 'பித்த பருவம்: உச்ச ஆற்றல் காலம்' },
                        { val: '30–45', label: '30–45 வயது', desc: 'மெட்டபாலிசம் சற்று குறையும் காலம்' },
                        { val: '46–60', label: '46–60 வயது', desc: 'ஹார்மோன் மாற்றங்களின் காலம்' },
                        { val: '60+', label: '60 வயதுக்கு மேல்', desc: 'வாத பருவம்: மூட்டு மற்றும் எலும்பு பாதுகாப்பு' }
                    ];
                }
                return [
                    { val: 'Under 18', label: 'Under 18', desc: 'Kapha age stage: rapid physical growth and natural tissue building' },
                    { val: '18–29', label: '18–29', desc: 'Pitta age stage: peak metabolic activity, high physical output, and career stress' },
                    { val: '30–45', label: '30–45', desc: 'Metabolic plateau: gradual slowdown in calorie expenditure and lifestyle stress' },
                    { val: '46–60', label: '46–60', desc: 'Transition phase: perimenopause, hormonal shift, and muscular conservation' },
                    { val: '60+', label: '60+', desc: 'Vata age stage: catabolic phase requiring gentle Agni care and bone nourishment' }
                ];
            },

            get goalOptions() {
                if (this.lang === 'ml') {
                    return [
                        { val: 'Weight Loss', icon: '🔥', label: 'അമിതവണ്ണം കുറയ്ക്കൽ', desc: 'വയറ്റിലെ കൊഴുപ്പ് കുറച്ച് സ്വാഭാവിക ഭാരം കൈവരിക്കുക' },
                        { val: 'Weight Gain', icon: '💪', label: 'ശരീരഭാരം വർദ്ധിപ്പിക്കൽ', desc: 'മെലിഞ്ഞ ശരീരം മാറ്റി ആരോഗ്യകരമായ പേശീബലം നേടുക' },
                        { val: 'Digestive Balance', icon: '🌱', label: 'ദഹനവും അസിഡിറ്റിയും ശമിപ്പിക്കൽ', desc: 'ഗ്യാസ്, നെഞ്ചെരിച്ചിൽ, വയറു വീർക്കൽ എന്നിവ ഇല്ലാതാക്കുക' },
                        { val: 'Vitality & Energy', icon: '⚡', label: 'നിത്യേനയുള്ള ഉന്മേഷവും സ്റ്റാമിനയും', desc: 'വിട്ടുമാറാത്ത ക്ഷീണം മാറ്റി ഊർജ്ജസ്വലത വീണ്ടെടുക്കുക' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 'Weight Loss', icon: '🔥', label: 'वजन घटाना (फैट लॉस)', desc: 'पेट की चर्बी कम कर स्वस्थ व संतुलित वजन पाना' },
                        { val: 'Weight Gain', icon: '💪', label: 'वजन व मांसपेशियां बढ़ाना', desc: 'कमजोरी दूर कर प्राकृतिक रूप से वजन बढ़ाना' },
                        { val: 'Digestive Balance', icon: '🌱', label: 'पाचन व एसिडिटी सुधार', desc: 'गैस, अपच और सीने की जलन से स्थायी राहत' },
                        { val: 'Vitality & Energy', icon: '⚡', label: 'दैनिक ऊर्जा व स्टैमिना', desc: 'थकान दूर कर दिनभर ताजगी व चुस्ती बनाए रखना' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 'Weight Loss', icon: '🔥', label: 'எடை குறைப்பு (Fat Loss)', desc: 'தொப்பை மற்றும் அதிக கொழுப்பை குறைத்து இயல்பான எடை பெறுதல்' },
                        { val: 'Weight Gain', icon: '💪', label: 'ஆரோக்கியமான எடை அதிகரிப்பு', desc: 'உடல் பலவீனத்தை போக்கி தசை வலிமை பெறுதல்' },
                        { val: 'Digestive Balance', icon: '🌱', label: 'செரிமானம் & அசிடிட்டி நிவாரணம்', desc: 'வாயுத்தொல்லை, நெஞ்செரிச்சல் மற்றும் மந்தம் நீக்குதல்' },
                        { val: 'Vitality & Energy', icon: '⚡', label: 'அன்றாட புத்துணர்ச்சி & ஸ்டேமினா', desc: 'தொடர் சோர்வை போக்கி நாள் முழுவதும் சுறுசுறுப்புடன் இருத்தல்' }
                    ];
                }
                return [
                    { val: 'Weight Loss', icon: '🔥', label: 'Healthy Weight & Fat Loss', desc: 'Reduce visceral belly fat while preserving lean tissue and stamina' },
                    { val: 'Weight Gain', icon: '💪', label: 'Pure Lean Weight Gain', desc: 'Nourish underbuilt Dhatus without accumulating toxic visceral fat' },
                    { val: 'Digestive Balance', icon: '🌱', label: 'Balance Agni & Gut Comfort', desc: 'Calm chronic hyperacidity, bloating, gas, and irregular bowel habits' },
                    { val: 'Vitality & Energy', icon: '⚡', label: 'Overall Energy & Vitality', desc: 'Overcome afternoon exhaustion and brain fog with pure adaptogenic energy' }
                ];
            },

            get agniOptions() {
                if (this.lang === 'ml') {
                    return [
                        { val: 'Tikshna', icon: '🌶️', label: 'തീക്ഷ്ണാഗ്നി (കൂടിയ വിശപ്പും അസിഡിറ്റിയും)', desc: 'ഭക്ഷണം വൈകിയാൽ നെഞ്ചെരിച്ചിലോ തലവേദനയോ ഉണ്ടാകുന്നു' },
                        { val: 'Manda', icon: '🐢', label: 'മന്ദാഗ്നി (ദഹനക്കുറവും ആലസ്യവും)', desc: 'ഭക്ഷണത്തിന് ശേഷം വയർ ഭാരമുള്ളതായി തോന്നുന്നു, വിശപ്പ് കുറവ്' },
                        { val: 'Vishama', icon: '💨', label: 'വിഷമാഗ്നി (മാറിമറിയുന്ന വിശപ്പും ഗ്യാസും)', desc: 'ചിലപ്പോൾ നല്ല വിശപ്പ്, ചിലപ്പോൾ ഒട്ടും വിശപ്പില്ല, ഗ്യാസ് പ്രശ്നങ്ങൾ' },
                        { val: 'Sama', icon: '⚖️', label: 'സമാഗ്നി (സന്തുലിതമായ നല്ല ദഹനം)', desc: 'കൃത്യസമയത്ത് വിശപ്പും സുഖകരമായ ദഹനവും' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 'Tikshna', icon: '🌶️', label: 'तीक्ष्णाग्नि (तेज भूख व एसिडिटी)', desc: 'भोजन में देरी होने पर सीने में जलन या सिरदर्द होना' },
                        { val: 'Manda', icon: '🐢', label: 'मंदाग्नि (धीमा पाचन व भारीपन)', desc: 'खाने के बाद पेट भारी रहना और भूख कम लगना' },
                        { val: 'Vishama', icon: '💨', label: 'विषमाग्नि (अनियमित पाचन व गैस)', desc: 'कभी तेज भूख तो कभी बिल्कुल नहीं, पेट में गैस बनना' },
                        { val: 'Sama', icon: '⚖️', label: 'समाग्नि (संतुलित व स्वस्थ पाचन)', desc: 'समय पर भूख लगना और भोजन का सुचारू रूप से पचना' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 'Tikshna', icon: '🌶️', label: 'தீக்ஷ்ண அக்னி (அதிக பசி & அசிடிட்டி)', desc: 'உணவு தாமதமானால் நெஞ்செரிச்சல் அல்லது தலைவலி ஏற்படுதல்' },
                        { val: 'Manda', icon: '🐢', label: 'மந்த அக்னி (மெதுவான செரிமானம்)', desc: 'உணவுக்கு பின் வயிறு கனமாக இருத்தல், பசியின்மை' },
                        { val: 'Vishama', icon: '💨', label: 'விஷம அக்னி (மாறுபடும் பசி & வாயு)', desc: 'சில நேரம் அதிக பசி, சில நேரம் பசியே இல்லாமை, வாயுத்தொல்லை' },
                        { val: 'Sama', icon: '⚖️', label: 'சம அக்னி (சீரான செரிமானம்)', desc: 'சரியான நேரத்தில் பசி மற்றும் எளிதான செரிமானம்' }
                    ];
                }
                return [
                    { val: 'Tikshna', icon: '🌶️', label: 'Tikshna Agni (Sharp / Acidic)', desc: 'Intense hunger; missing meals triggers acidity, heartburn, or irritability' },
                    { val: 'Manda', icon: '🐢', label: 'Manda Agni (Slow / Sluggish)', desc: 'Sluggish metabolism; post-meal heaviness, slow transit, and low morning appetite' },
                    { val: 'Vishama', icon: '💨', label: 'Vishama Agni (Irregular / Gas)', desc: 'Unpredictable digestion; variable appetite, frequent abdominal gas, and bloating' },
                    { val: 'Sama', icon: '⚖️', label: 'Sama Agni (Balanced & Harmonious)', desc: 'Steady comfortable digestion; light post-meal feeling and regular elimination' }
                ];
            },

            get doshaOptions() {
                if (this.lang === 'ml') {
                    return [
                        { val: 'Vata', icon: '🌬️', label: 'വാത പ്രകൃതി (Vata)', desc: 'മെലിഞ്ഞ ശരീരം, വരണ്ട ചർമ്മം, തണുപ്പ് സഹിക്കാൻ ബുദ്ധിമുട്ട്, കൂടുതൽ ചിന്തകൾ' },
                        { val: 'Pitta', icon: '🔥', label: 'പിത്ത പ്രകൃതി (Pitta)', desc: 'ഇടത്തരം ശരീരം, ചൂട് സഹിക്കാൻ ബുദ്ധിമുട്ട്, വേഗത്തിൽ ദേഷ്യം, വിയർപ്പ്' },
                        { val: 'Kapha', icon: '🌊', label: 'കഫ പ്രകൃതി (Kapha)', desc: 'തടിച്ച ഉറച്ച ശരീരം, ഭാരം പെട്ടെന്ന് കൂടുന്നു, ശാന്തമായ ശാന്ത സ്വഭാവം' }
                    ];
                }
                if (this.lang === 'hi') {
                    return [
                        { val: 'Vata', icon: '🌬️', label: 'वात प्रकृति (Vata)', desc: 'दुबला शरीर, शुष्क त्वचा, ठंड से संवेदनशीलता, चंचल मन' },
                        { val: 'Pitta', icon: '🔥', label: 'पित्त प्रकृति (Pitta)', desc: 'मध्यम बनावट, शरीर में गर्मी, तेज भूख, जल्दी गुस्सा आना' },
                        { val: 'Kapha', icon: '🌊', label: 'कफ प्रकृति (Kapha)', desc: 'मजबूत भारी शरीर, वजन जल्दी बढ़ना, शांत व धैर्यवान स्वभाव' }
                    ];
                }
                if (this.lang === 'ta') {
                    return [
                        { val: 'Vata', icon: '🌬️', label: 'வாத பிரகிருதி (Vata)', desc: 'மெலிந்த உடல், வறண்ட தோல், குளிர் தாங்க இயலாமை, விரைவான மனம்' },
                        { val: 'Pitta', icon: '🔥', label: 'பித்த பிரகிருதி (Pitta)', desc: 'நடுத்தர உடல், உடல் உஷ்ணம், அதிக வியர்வை, எளிதில் கோபம்' },
                        { val: 'Kapha', icon: '🌊', label: 'கப பிரகிருதி (Kapha)', desc: 'பருமனான உடல், எளிதில் எடை கூடுதல், அமைதியான குணம்' }
                    ];
                }
                return [
                    { val: 'Vata', icon: '🌬️', label: 'Vata Tendency (Air & Space)', desc: 'Slender frame, dry skin, sensitive to cold, erratic energy, and creative anxiety' },
                    { val: 'Pitta', icon: '🔥', label: 'Pitta Tendency (Fire & Water)', desc: 'Medium build, warm skin, prone to flushing, competitive drive, and sharp appetite' },
                    { val: 'Kapha', icon: '🌊', label: 'Kapha Tendency (Earth & Water)', desc: 'Sturdy solid build, gains weight easily, unhurried movements, and calm patience' }
                ];
            },

            startQuiz() {
                this.step = 1;
                this.scrollToTop();
            },

            scrollToTop() {
                const el = document.getElementById('bmi-assessment');
                if (el) {
                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            },

            get stepCategory() {
                const map = {
                    en: ['Assessment', 'Profile: Full Name', 'Profile: Gender', 'Profile: Age Group', 'Contact: WhatsApp', 'Body Metrics: Height & Weight', 'Health Objective: Primary Goal', 'Digestion: Agni Analysis', 'Constitution: Prakriti Tendency'],
                    ml: ['പരിശോധന', 'വിവരങ്ങൾ: പേര്', 'വിവരങ്ങൾ: ലിംഗം', 'വിവരങ്ങൾ: പ്രായപരിധി', 'ബന്ധപ്പെടാൻ: വാട്സാപ്പ്', 'ശരീര അളവുകൾ: ഉയരവും തൂക്കവും', 'ലക്ഷ്യം: ആരോഗ്യ ലക്ഷ്യം', 'ദഹനം: അഗ്നി നിർണ്ണയം', 'ശരീരപ്രകൃതി: ദോഷ നിർണ്ണയം'],
                    hi: ['मूल्यांकन', 'विवरण: पूरा नाम', 'विवरण: लिंग', 'विवरण: आयु वर्ग', 'संपर्क: व्हाट्सएप', 'शारीरिक माप: लंबाई व वजन', 'उद्देश्य: प्राथमिक लक्ष्य', 'पाचन: अग्नि विश्लेषण', 'प्रकृति: दोष प्रवृत्ति'],
                    ta: ['மதிப்பீடு', 'விவரம்: முழு பெயர்', 'விவரம்: பாலினம்', 'விவரம்: வயது வரம்பு', 'தொடர்பு: வாட்ஸ்அப்', 'உடல் அளவு: உயரம் & எடை', 'நோக்கம்: ஆரோக்கிய குறிக்கோள்', 'செரிமானம்: அக்னி ஆய்வு', 'பிரகிருதி: தோஷ அமைப்பு']
                };
                let list = map[this.lang] || map['en'];
                return list[this.step] || list[0];
            },

            get canProceed() {
                if (this.step === 1) return this.profile.name.trim().length >= 2;
                if (this.step === 2) return this.profile.gender !== '';
                if (this.step === 3) return this.profile.ageGroup !== '';
                if (this.step === 4) return this.profile.phone.replace(/[^0-9]/g, '').length >= 10;
                if (this.step === 5) return this.answers.height > 80 && this.answers.weight > 25;
                if (this.step === 6) return this.answers.goal !== '';
                if (this.step === 7) return this.answers.agni !== '';
                if (this.step === 8) return this.answers.dosha !== '';
                return false;
            },

            nextStep() {
                if (this.canProceed && this.step < 9) {
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
                this.answers = { height: '', weight: '', goal: '', agni: '', dosha: '' };
                this.scrollToTop();
            },

            get bmiValue() {
                const h = parseFloat(this.answers.height) / 100;
                const w = parseFloat(this.answers.weight);
                if (!h || !w || h <= 0) return 0;
                return parseFloat((w / (h * h)).toFixed(1));
            },

            get bmiCategoryKey() {
                const bmi = this.bmiValue;
                if (!bmi) return 'unknown';
                if (bmi < 18.5) return 'underweight';
                if (bmi >= 18.5 && bmi <= 22.9) return 'normal';
                if (bmi >= 23.0 && bmi <= 24.9) return 'overweight';
                return 'obese';
            },

            get bmiCategoryLabel() {
                const key = this.bmiCategoryKey;
                const labels = {
                    en: { underweight: 'Underweight', normal: 'Normal (Healthy Weight)', overweight: 'Overweight', obese: 'Obese' },
                    ml: { underweight: 'കുറഞ്ഞ ശരീരഭാരം (Underweight)', normal: 'ആരോഗ്യകരമായ ഭാരം (Normal)', overweight: 'അമിതഭാരം (Overweight)', obese: 'അമിതവണ്ണം (Obese)' },
                    hi: { underweight: 'कम वजन (Underweight)', normal: 'सामान्य व स्वस्थ वजन (Normal)', overweight: 'अधिक वजन (Overweight)', obese: 'मोटापा (Obese)' },
                    ta: { underweight: 'குறைந்த எடை (Underweight)', normal: 'ஆரோக்கியமான எடை (Normal)', overweight: 'அதிக எடை (Overweight)', obese: 'உடல் பருமன் (Obese)' }
                };
                let dict = labels[this.lang] || labels['en'];
                return dict[key] || 'Unknown';
            },

            get bmiAdviceText() {
                const key = this.bmiCategoryKey;
                const advice = {
                    en: {
                        underweight: 'Your BMI is below the healthy range. Focus on nutrient-dense building foods (Brimhana) and strengthening Agni.',
                        normal: 'Your body mass is within the optimal Asian-Indian healthy window. Focus on maintaining pure cellular vitality.',
                        overweight: 'You are slightly above the healthy threshold. Mild Agni stimulation (Deepana) and fiber-rich meals will help reset balance.',
                        obese: 'Your BMI indicates significant metabolic and visceral load. A structured Ayurvedic fat-loss plan (Medo Hara) is strongly advised.'
                    },
                    ml: {
                        underweight: 'നിങ്ങളുടെ ശരീരഭാരം സാധാരണ നിലയേക്കാൾ കുറവാണ്. പോഷക സമ്പുഷ്ടമായ ഭക്ഷണങ്ങളും ദഹനശേഷി വർദ്ധിപ്പിക്കുന്ന മാർഗ്ഗങ്ങളും സ്വീകരിക്കുക.',
                        normal: 'നിങ്ങളുടെ ശരീരഭാരം ആരോഗ്യകരമായ അനുയോജ്യമായ നിലയിലാണ്. ഇത് നിലനിർത്താൻ സന്തുലിതമായ ആഹാരരീതി തുടരുക.',
                        overweight: 'നിങ്ങൾക്ക് നേരിയ തോതിൽ അമിതഭാരമുണ്ട്. ദഹനം മെച്ചപ്പെടുത്താനും നാരുകൾ അടങ്ങിയ ഭക്ഷണം കഴിക്കാനും ശ്രദ്ധിക്കുക.',
                        obese: 'നിങ്ങളുടെ ശരീരഭാരം ആരോഗ്യകരമായ പരിധിക്ക് മുകളിലാണ്. കൊഴുപ്പ് കുറയ്ക്കാനും ഉപാപചയം വർദ്ധിപ്പിക്കാനുമുള്ള ആയുർവേദ മാർഗ്ഗങ്ങൾ സ്വീകരിക്കുക.'
                    },
                    hi: {
                        underweight: 'आपका बीएमआई सामान्य से कम है। पोषक तत्वों से भरपूर आहार और पाचन अग्नि को मजबूत करने पर ध्यान दें।',
                        normal: 'आपका वजन भारतीय स्वास्थ्य मानकों के अनुसार बिल्कुल सही व स्वस्थ है। इसी जीवनशैली को बनाए रखें।',
                        overweight: 'आपका वजन सामान्य से थोड़ा अधिक है। सुपाच्य और फाइबर युक्त भोजन से मेटाबॉलिज्म को गति दें।',
                        obese: 'आपका बीएमआई अत्यधिक शारीरिक भार दर्शाता है। आयुर्वेदिक दिनचर्या और वजन प्रबंधन योजना की आवश्यकता है।'
                    },
                    ta: {
                        underweight: 'உங்கள் பிஎம்ஐ இயல்பான அளவை விட குறைவாக உள்ளது. சத்து நிறைந்த உணவுகளால் உடலை பலப்படுத்தவும்.',
                        normal: 'உங்கள் உடல் எடை ஆரோக்கியமான சரியான வரம்பில் உள்ளது. சமச்சீர் உணவை தொடர்ந்து கடைப்பிடிக்கவும்.',
                        overweight: 'உங்கள் எடை இயல்பை விட சற்று அதிகமாக உள்ளது. நார்ச்சத்து நிறைந்த உணவுகளால் எடையை கட்டுப்படுத்தவும்.',
                        obese: 'உங்கள் பிஎம்ஐ அதிக உடல் பருமனை காட்டுகிறது. முறையான ஆயுர்வேத எடை குறைப்பு முறையை பின்பற்றுவது அவசியம்.'
                    }
                };
                let dict = advice[this.lang] || advice['en'];
                return dict[key] || '';
            },

            get idealWeightRange() {
                const h = parseFloat(this.answers.height) / 100;
                if (!h || h <= 0) return 'N/A';
                const minW = Math.round(18.5 * h * h);
                const maxW = Math.round(22.9 * h * h);
                return `${minW} kg – ${maxW} kg`;
            },

            get agniLabelText() {
                const opt = this.agniOptions.find(o => o.val === this.answers.agni);
                return opt ? opt.label : this.answers.agni;
            },

            get agniDescriptionText() {
                const desc = {
                    en: {
                        Tikshna: 'Requires cooling, non-spicy foods. Do not skip meals to prevent excess bile and acidity.',
                        Manda: 'Requires warming spices (ginger, pepper) and light dinners to activate sluggish metabolic breakdown.',
                        Vishama: 'Requires grounding warm soups and fixed meal routines to stabilize fluctuating digestive rhythms.',
                        Sama: 'Digestive flame is harmonious; continue balanced seasonal nutrition.'
                    },
                    ml: {
                        Tikshna: 'തണുപ്പുള്ളതും എരിവ് കുറഞ്ഞതുമായ ഭക്ഷണം കഴിക്കുക. അസിഡിറ്റി തടയാൻ ഭക്ഷണം ഒഴിവാക്കാതിരിക്കുക.',
                        Manda: 'ഇഞ്ചി, കുരുമുളക് തുടങ്ങിയവ ചേർത്ത ലഘുഭക്ഷണം ശീലമാക്കുക. രാത്രി കട്ടി ആഹാരങ്ങൾ ഒഴിവാക്കുക.',
                        Vishama: 'ചെറുചൂടുള്ള സൂപ്പുകളും കൃത്യസമയത്തുള്ള ഭക്ഷണരീതിയും ദഹനം ക്രമപ്പെടുത്താൻ സഹായിക്കും.',
                        Sama: 'ദഹനശേഷി സന്തുലിതമാണ്; നിലവിലെ സമീകൃതാഹാരം തുടരുക.'
                    },
                    hi: {
                        Tikshna: 'शीतल और कम मसालेदार भोजन लें। एसिडिटी से बचने के लिए भोजन छोड़ने से बचें।',
                        Manda: 'अदरक व काली मिर्च युक्त सुपाच्य भोजन लें। रात में भारी भोजन से परहेज करें।',
                        Vishama: 'नियमित समय पर हल्का व गर्म भोजन लें ताकि गैस व अनियमितता से बचाव हो सके।',
                        Sama: 'पाचन अग्नि संतुलित है; संतुलित मौसमी आहार जारी रखें।'
                    },
                    ta: {
                        Tikshna: 'குளிர்ச்சியான காரம் குறைவான உணவை உட்கொள்ளவும். அசிடிட்டியை தவிர்க்க பசியை தள்ளிப்போட வேண்டாம்.',
                        Manda: 'இஞ்சி, மிளகு கலந்த எளிய உணவை உண்ணவும். இரவில் கனமான உணவை தவிர்க்கவும்.',
                        Vishama: 'வெதுவெதுப்பான எளிய உணவை சரியான நேரத்தில் உண்பது செரிமானத்தை சீராக்கும்.',
                        Sama: 'செரிமான சக்தி சீராக உள்ளது; சத்தான உணவை தொடரவும்.'
                    }
                };
                let dict = desc[this.lang] || desc['en'];
                return dict[this.answers.agni] || '';
            },

            get whatsappLink() {
                const phone = "917736609299";
                let text = '';
                if (this.lang === 'ml') {
                    text = `🌿 *യുവൻ ക്ലിനിക്കൽ റിപ്പോർട്ട്: BMI & ശരീരപ്രകൃതി നിർണ്ണയം*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *രോഗിയുടെ പേര്:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *ലിംഗം:* ${this.profile.gender || 'Not specified'} | *പ്രായപരിധി:* ${this.profile.ageGroup || 'Not specified'}\n`;
                    text += `📱 *വാട്സാപ്പ്:* +91 ${this.profile.phone || ''}\n\n`;
                    text += `📊 *ശരീര അളവുകൾ:*\n`;
                    text += `• ഉയരം: ${this.answers.height} cm | ഭാരം: ${this.answers.weight} kg\n`;
                    text += `• കണക്കാക്കിയ BMI: ${this.bmiValue} (${this.bmiCategoryLabel})\n`;
                    text += `• അനുയോജ്യമായ ഭാരം: ${this.idealWeightRange}\n\n`;
                    text += `🔥 *ദഹനശേഷി (അഗ്നി):* ${this.agniLabelText}\n`;
                    text += `🌿 *ശരീരപ്രകൃതി (ദോഷം):* ${this.answers.dosha || 'Not specified'}\n`;
                    text += `🎯 *പ്രധാന ലക്ഷ്യം:* ${this.answers.goal || 'Not specified'}\n\n`;
                    text += `🛒 *യുവൻ ഔഷധ ശേഖരം:* https://yuvann.com/products\n\n`;
                    text += `നമസ്കാരം ഡോ. സജീവ് ദേവ്, ദയവായി എന്റെ ഈ റിപ്പോർട്ട് പരിശോധിച്ച് എനിക്ക് അനുയോജ്യമായ ആയുർവേദ ഭക്ഷണക്രമവും നിർദ്ദേശങ്ങളും നൽകിയാലും!`;
                } else if (this.lang === 'hi') {
                    text = `🌿 *युवान क्लिनिकल रिपोर्ट: बीएमआई व प्रकृति मूल्यांकन*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *रोगी का नाम:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *लिंग:* ${this.profile.gender || 'Not specified'} | *आयु वर्ग:* ${this.profile.ageGroup || 'Not specified'}\n`;
                    text += `📱 *व्हाट्सएप:* +91 ${this.profile.phone || ''}\n\n`;
                    text += `📊 *शारीरिक माप:*\n`;
                    text += `• लंबाई: ${this.answers.height} cm | वजन: ${this.answers.weight} kg\n`;
                    text += `• बीएमआई (BMI): ${this.bmiValue} (${this.bmiCategoryLabel})\n`;
                    text += `• आदर्श वजन सीमा: ${this.idealWeightRange}\n\n`;
                    text += `🔥 *पाचन अग्नि:* ${this.agniLabelText}\n`;
                    text += `🌿 *प्रकृति (दोष):* ${this.answers.dosha || 'Not specified'}\n`;
                    text += `🎯 *स्वास्थ्य लक्ष्य:* ${this.answers.goal || 'Not specified'}\n\n`;
                    text += `🛒 *युवान उत्पाद:* https://yuvann.com/products\n\n`;
                    text += `नमस्ते डॉ. सजीव देव, कृपया मेरी इस रिपोर्ट की समीक्षा करें और मुझे उपयुक्त आहार व आयुर्वेदिक सलाह प्रदान करें!`;
                } else if (this.lang === 'ta') {
                    text = `🌿 *யுவான் மருத்துவ அறிக்கை: பிஎம்ஐ & பிரகிருதி மதிப்பீடு*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *நோயாளி:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *பாலினம்:* ${this.profile.gender || 'Not specified'} | *வயது:* ${this.profile.ageGroup || 'Not specified'}\n`;
                    text += `📱 *வாட்ஸ்அப்:* +91 ${this.profile.phone || ''}\n\n`;
                    text += `📊 *உடல் அளவுகள்:*\n`;
                    text += `• உயரம்: ${this.answers.height} cm | எடை: ${this.answers.weight} kg\n`;
                    text += `• பிஎம்ஐ (BMI): ${this.bmiValue} (${this.bmiCategoryLabel})\n`;
                    text += `• இலக்கு எடை: ${this.idealWeightRange}\n\n`;
                    text += `🔥 *செரிமான அக்னி:* ${this.agniLabelText}\n`;
                    text += `🌿 *பிரகிருதி (தோஷம்):* ${this.answers.dosha || 'Not specified'}\n`;
                    text += `🎯 *முக்கிய நோக்கம்:* ${this.answers.goal || 'Not specified'}\n\n`;
                    text += `🛒 *யுவான் பொருட்கள்:* https://yuvann.com/products\n\n`;
                    text += `வணக்கம் டாக்டர் சஜீவ் தேவ், எனது இந்த அறிக்கையை பரிசீலித்து எனக்கு ஏற்ற உணவுமுறை மற்றும் மருத்துவ ஆலோசனைகளை வழங்குங்கள்!`;
                } else {
                    text = `🌿 *YUVANN CLINICAL REPORT: BMI & PRAKRITI ASSESSMENT*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *Patient:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *Gender:* ${this.profile.gender || 'Not specified'} | *Age Group:* ${this.profile.ageGroup || 'Not specified'}\n`;
                    text += `📱 *WhatsApp:* +91 ${this.profile.phone || ''}\n\n`;
                    text += `📊 *Body Metrics:*\n`;
                    text += `• Height: ${this.answers.height} cm | Weight: ${this.answers.weight} kg\n`;
                    text += `• Calculated BMI: ${this.bmiValue} (${this.bmiCategoryLabel})\n`;
                    text += `• Ideal Weight Window: ${this.idealWeightRange}\n\n`;
                    text += `🔥 *Metabolic Agni:* ${this.agniLabelText}\n`;
                    text += `🌿 *Constitution (Dosha):* ${this.answers.dosha || 'Not specified'}\n`;
                    text += `🎯 *Primary Goal:* ${this.answers.goal || 'Not specified'}\n\n`;
                    text += `🛒 *Official Yuvann Shop Collection:*\nhttps://yuvann.com/products\n\n`;
                    text += `Hello Dr. Sajeev Dev, please review my assessment and guide me with a personalized diet and Ayurvedic product regimen!`;
                }

                return `https://wa.me/${phone}?text=${encodeURIComponent(text)}`;
            }
        }
    }
</script>
