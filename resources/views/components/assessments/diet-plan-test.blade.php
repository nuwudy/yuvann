<section id="diet-plan-test" class="py-16 md:py-20 bg-brand-green-900 relative text-white overflow-hidden">
    <!-- Background atmospheric glow -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-emerald-800/30 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 right-0 w-80 h-80 bg-brand-gold-900/30 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" x-data="dietPlanFinder()" x-cloak>
        
        <!-- Section Header with Language Selector -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-2 mb-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider text-brand-gold-400 bg-brand-gold-400/15 uppercase border border-brand-gold-400/30">
                    <span x-text="t('badge')">Ayurvedic Nutrition Science</span>
                </span>
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-white" x-text="t('heading')"></h2>
            <p class="text-sm sm:text-base text-brand-green-100/80 max-w-xl mx-auto mt-2" x-text="t('subheading')"></p>
        </div>

        <div class="bg-brand-green-800/95 backdrop-blur-md rounded-3xl shadow-2xl p-5 sm:p-8 md:p-10 border border-brand-green-700/80 relative overflow-hidden">
            
            <!-- Global Floating Language Switcher Header (Visible across all steps) -->
            <div class="flex flex-wrap items-center justify-between pb-4 mb-6 border-b border-brand-green-700/80 gap-3">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-brand-gold-400 uppercase tracking-wider flex items-center gap-1">
                        <span>🌐</span>
                        <span x-text="t('lang_label')">Language</span>:
                    </span>
                    <span class="text-xs font-extrabold text-brand-green-950 bg-brand-gold-400 px-2.5 py-0.5 rounded-full" x-text="currentLangName"></span>
                </div>
                
                <!-- Quick Language Switching Pills -->
                <div class="inline-flex p-1 bg-brand-green-950/80 rounded-full border border-brand-green-700 text-xs shadow-2xs">
                    <button type="button" @click="setLanguage('en')" 
                            :class="lang === 'en' ? 'bg-brand-gold-400 text-brand-green-950 font-bold shadow-xs' : 'text-brand-green-200 hover:text-white font-medium'"
                            class="px-2.5 py-1 rounded-full transition-all cursor-pointer">
                        🇬🇧 EN
                    </button>
                    <button type="button" @click="setLanguage('ml')" 
                            :class="lang === 'ml' ? 'bg-brand-gold-400 text-brand-green-950 font-bold shadow-xs' : 'text-brand-green-200 hover:text-white font-medium'"
                            class="px-2.5 py-1 rounded-full transition-all cursor-pointer">
                        🌴 മലയാളം
                    </button>
                    <button type="button" @click="setLanguage('hi')" 
                            :class="lang === 'hi' ? 'bg-brand-gold-400 text-brand-green-950 font-bold shadow-xs' : 'text-brand-green-200 hover:text-white font-medium'"
                            class="px-2.5 py-1 rounded-full transition-all cursor-pointer">
                        🇮🇳 हिन्दी
                    </button>
                    <button type="button" @click="setLanguage('ta')" 
                            :class="lang === 'ta' ? 'bg-brand-gold-400 text-brand-green-950 font-bold shadow-xs' : 'text-brand-green-200 hover:text-white font-medium'"
                            class="px-2.5 py-1 rounded-full transition-all cursor-pointer">
                        🌺 தமிழ்
                    </button>
                </div>
            </div>

            <!-- Step 0: Language Selection & Intro Screen -->
            <div x-show="step === 0" class="text-center py-2 sm:py-4">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-brand-gold-400/10 text-brand-gold-400 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-brand-gold-400/30 shadow-sm">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-serif font-bold text-white mb-2" x-text="t('intro_title')"></h3>
                <p class="text-sm sm:text-base text-brand-green-100/90 max-w-lg mx-auto mb-6 leading-relaxed" x-text="t('intro_desc')"></p>

                <!-- Prominent Language Selector Cards -->
                <div class="mb-8 p-5 bg-brand-green-950/70 rounded-2xl border border-brand-green-700 shadow-xs">
                    <label class="block text-xs font-black uppercase tracking-widest text-brand-gold-400 mb-3 text-center">
                        <span class="inline-block mr-1">👇</span>
                        <span x-text="t('choose_lang_title')">Select Your Language / നിങ്ങളുടെ ഭാഷ തിരഞ്ഞെടുക്കുക</span>
                    </label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5 max-w-xl mx-auto">
                        <button type="button" @click="selectLanguageAndStart('en')"
                                class="p-3.5 rounded-xl border-2 transition-all text-center flex flex-col items-center justify-center cursor-pointer hover:scale-105"
                                :class="lang === 'en' ? 'border-brand-gold-400 bg-brand-green-900 shadow-md ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-950/60 hover:bg-brand-green-900 hover:border-brand-green-600'">
                            <span class="text-2xl mb-1">🇬🇧</span>
                            <span class="font-bold text-sm text-white">English</span>
                            <span class="text-[10px] text-brand-green-200 mt-0.5">Clinical English</span>
                        </button>

                        <button type="button" @click="selectLanguageAndStart('ml')"
                                class="p-3.5 rounded-xl border-2 transition-all text-center flex flex-col items-center justify-center cursor-pointer hover:scale-105"
                                :class="lang === 'ml' ? 'border-brand-gold-400 bg-brand-green-900 shadow-md ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-950/60 hover:bg-brand-green-900 hover:border-brand-green-600'">
                            <span class="text-2xl mb-1">🌴</span>
                            <span class="font-bold text-sm text-brand-gold-300">മലയാളം</span>
                            <span class="text-[10px] text-brand-green-200 mt-0.5">Malayalam</span>
                        </button>

                        <button type="button" @click="selectLanguageAndStart('hi')"
                                class="p-3.5 rounded-xl border-2 transition-all text-center flex flex-col items-center justify-center cursor-pointer hover:scale-105"
                                :class="lang === 'hi' ? 'border-brand-gold-400 bg-brand-green-900 shadow-md ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-950/60 hover:bg-brand-green-900 hover:border-brand-green-600'">
                            <span class="text-2xl mb-1">🇮🇳</span>
                            <span class="font-bold text-sm text-white">हिन्दी</span>
                            <span class="text-[10px] text-brand-green-200 mt-0.5">Hindi</span>
                        </button>

                        <button type="button" @click="selectLanguageAndStart('ta')"
                                class="p-3.5 rounded-xl border-2 transition-all text-center flex flex-col items-center justify-center cursor-pointer hover:scale-105"
                                :class="lang === 'ta' ? 'border-brand-gold-400 bg-brand-green-900 shadow-md ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-950/60 hover:bg-brand-green-900 hover:border-brand-green-600'">
                            <span class="text-2xl mb-1">🌺</span>
                            <span class="font-bold text-sm text-white">தமிழ்</span>
                            <span class="text-[10px] text-brand-green-200 mt-0.5">Tamil</span>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 max-w-xl mx-auto mb-8 text-left">
                    <div class="p-3.5 rounded-xl bg-brand-green-900/60 border border-brand-green-700">
                        <span class="text-lg block mb-1">⏱️</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-brand-gold-300" x-text="t('f1_title')">Takes 2 Minutes</h4>
                        <p class="text-[11px] text-brand-green-100/70 mt-0.5" x-text="t('f1_desc')">Focused single-question progression.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-brand-green-900/60 border border-brand-green-700">
                        <span class="text-lg block mb-1">📲</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-brand-gold-300" x-text="t('f2_title')">WhatsApp Chart</h4>
                        <p class="text-[11px] text-brand-green-100/70 mt-0.5" x-text="t('f2_desc')">Receive your custom 7-day chart directly.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-brand-green-900/60 border border-brand-green-700">
                        <span class="text-lg block mb-1">🌿</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-brand-gold-300" x-text="t('f3_title')">Doctor-Guided</h4>
                        <p class="text-[11px] text-brand-green-100/70 mt-0.5" x-text="t('f3_desc')">Curated by Dr. Sajeev Dev.</p>
                    </div>
                </div>

                <button type="button" 
                        @click="startQuiz()" 
                        class="inline-flex items-center justify-center px-8 sm:px-10 py-3.5 sm:py-4 text-base font-bold text-brand-green-950 bg-brand-gold-400 hover:bg-brand-gold-300 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5 cursor-pointer gap-2">
                    <span x-text="t('begin_btn')">Begin Diet Assessment</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

            <!-- Quiz Stepper Header (Steps 1 to 8) -->
            <div x-show="step >= 1 && step <= 8" class="mb-6">
                <div class="flex items-center justify-between text-xs font-semibold text-brand-green-200 mb-2">
                    <span class="text-brand-gold-400 uppercase tracking-wider font-bold" x-text="stepCategory"></span>
                    <span class="font-bold text-white" x-text="t('step_counter').replace('{step}', step).replace('{total}', 8)"></span>
                </div>
                <div class="h-2 w-full bg-brand-green-950 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-brand-gold-500 to-amber-300 transition-all duration-300 ease-out"
                         :style="`width: ${(step / 8) * 100}%`"></div>
                </div>
            </div>

            <!-- ONE QUESTION AT A TIME -->

            <!-- STEP 1: Full Name -->
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30" x-text="t('step_counter').replace('{step}', 1).replace('{total}', 8)">Step 1 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug" x-text="t('q1_title')">
                        1. What is your full name?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1" x-text="t('q1_desc')">To personalize your custom meal blueprint and official doctor consultation:</p>
                </div>

                <div class="space-y-4">
                    <div class="relative">
                        <input type="text" 
                               x-model.trim="profile.name" 
                               @keydown.enter.prevent="if (canProceed) nextStep()"
                               autofocus
                               :placeholder="t('q1_placeholder')"
                               class="w-full bg-brand-green-900/90 border-2 border-brand-green-600 rounded-2xl px-5 py-4 text-base focus:outline-none focus:border-brand-gold-400 focus:ring-4 focus:ring-brand-gold-400/20 text-white shadow-2xs font-medium placeholder:text-brand-green-300/50">
                    </div>
                    <p class="text-xs text-brand-green-200 flex items-center gap-1.5">
                        <span>💡</span>
                        <span x-html="t('q1_tip')"></span>
                    </p>
                </div>
            </div>

            <!-- STEP 2: Biological Gender -->
            <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30" x-text="t('step_counter').replace('{step}', 2).replace('{total}', 8)">Step 2 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug" x-text="t('q2_title')">
                        2. What is your biological gender?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1" x-text="t('q2_desc')">Nutrient partitioning and caloric distribution require gender-specific consideration:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="profile.gender = 'Female'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Female' ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">👩</span>
                            <div>
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': profile.gender === 'Female'}" x-text="t('gender_female')">Female</span>
                                <span class="text-xs text-brand-green-200" x-text="t('gender_female_desc')">Hormonal cycle support, blood nourishment (Rakta Dhatu), and iron density</span>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                             :class="profile.gender === 'Female' ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                            <div x-show="profile.gender === 'Female'" class="w-2.5 h-2.5 rounded-full bg-brand-green-950"></div>
                        </div>
                    </button>

                    <button type="button" 
                            @click="profile.gender = 'Male'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Male' ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">👨</span>
                            <div>
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': profile.gender === 'Male'}" x-text="t('gender_male')">Male</span>
                                <span class="text-xs text-brand-green-200" x-text="t('gender_male_desc')">Muscle preservation, visceral fat management, and high metabolic efficiency</span>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                             :class="profile.gender === 'Male' ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                            <div x-show="profile.gender === 'Male'" class="w-2.5 h-2.5 rounded-full bg-brand-green-950"></div>
                        </div>
                    </button>

                    <button type="button" 
                            @click="profile.gender = 'Other'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Other' ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">🧑</span>
                            <div>
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': profile.gender === 'Other'}" x-text="t('gender_other')">Other / Prefer not to say</span>
                                <span class="text-xs text-brand-green-200" x-text="t('gender_other_desc')">Balanced nutritional blueprint for general metabolic vitality</span>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                             :class="profile.gender === 'Other' ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                            <div x-show="profile.gender === 'Other'" class="w-2.5 h-2.5 rounded-full bg-brand-green-950"></div>
                        </div>
                    </button>
                </div>
            </div>

            <!-- STEP 3: Age Group -->
            <div x-show="step === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30" x-text="t('step_counter').replace('{step}', 3).replace('{total}', 8)">Step 3 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug" x-text="t('q3_title')">
                        3. Which age group do you belong to?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1" x-text="t('q3_desc')">Life stages define your cellular Agni and digestive capacity:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in ageGroupList" :key="item.val">
                        <button type="button" 
                                @click="profile.ageGroup = item.val" 
                                class="w-full text-left p-4 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="profile.ageGroup === item.val ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                            <div>
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': profile.ageGroup === item.val}" x-text="item.label"></span>
                                <span class="text-xs text-brand-green-200 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="profile.ageGroup === item.val ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                                <div x-show="profile.ageGroup === item.val" class="w-2.5 h-2.5 rounded-full bg-brand-green-950"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 4: WhatsApp Phone Number -->
            <div x-show="step === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30" x-text="t('step_counter').replace('{step}', 4).replace('{total}', 8)">Step 4 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug" x-text="t('q4_title')">
                        4. What is your WhatsApp phone number?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1" x-text="t('q4_desc')">We will send your complete 7-day personalized diet blueprint and shopping guide directly to your phone:</p>
                </div>

                <div class="space-y-4">
                    <div class="flex rounded-2xl overflow-hidden border-2 border-brand-green-600 bg-brand-green-900 shadow-2xs focus-within:ring-4 focus-within:ring-brand-gold-400/20 focus-within:border-brand-gold-400 transition-all">
                        <div class="bg-brand-green-950 px-4 py-4 border-r border-brand-green-700 flex items-center gap-2 shrink-0 text-white font-bold text-sm select-none">
                            <span class="text-lg">🇮🇳</span>
                            <span>+91</span>
                        </div>
                        <input type="tel" 
                               x-model.trim="profile.phone" 
                               @keydown.enter.prevent="if (canProceed) nextStep()"
                               maxlength="10"
                               autofocus
                               :placeholder="t('q4_placeholder')"
                               class="flex-1 w-full bg-brand-green-900 px-4 py-4 text-base focus:outline-none text-white font-medium placeholder:text-brand-green-300/50">
                    </div>
                    <div class="bg-brand-green-950/80 rounded-xl p-3 border border-brand-green-700 flex items-start gap-2.5 text-xs text-brand-green-200">
                        <span class="text-base shrink-0">🔒</span>
                        <span x-text="t('q4_privacy')">Confidential. Your number is only used to deliver your customized diet blueprint and doctor consultation.</span>
                    </div>
                </div>
            </div>

            <!-- STEP 5: Primary Health Goal -->
            <div x-show="step === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30" x-text="t('step_counter').replace('{step}', 5).replace('{total}', 8)">Step 5 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug" x-text="t('q5_title')">
                        5. What is the primary focus for your daily meal plan?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1" x-text="t('q5_desc')">Select the therapeutic purpose your meal blueprint should prioritize:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in goalList" :key="item.val">
                        <button type="button" 
                                @click="answers.goal = item.val" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.goal === item.val ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                            <div>
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': answers.goal === item.val}" x-text="item.label"></span>
                                <span class="text-xs text-brand-green-200 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.goal === item.val ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                                <div x-show="answers.goal === item.val" class="w-2.5 h-2.5 rounded-full bg-brand-green-950"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 6: Dietary Preference -->
            <div x-show="step === 6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30" x-text="t('step_counter').replace('{step}', 6).replace('{total}', 8)">Step 6 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug" x-text="t('q6_title')">
                        6. What is your primary dietary preference?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1" x-text="t('q6_desc')">We tailor your breakfast, lunch, and dinner recipes strictly to your preferred food matrix:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in dietList" :key="item.val">
                        <button type="button" 
                                @click="answers.diet = item.val" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.diet === item.val ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                            <div>
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': answers.diet === item.val}" x-text="item.label"></span>
                                <span class="text-xs text-brand-green-200 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.diet === item.val ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                                <div x-show="answers.diet === item.val" class="w-2.5 h-2.5 rounded-full bg-brand-green-950"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 7: Post-Meal Digestion Pattern -->
            <div x-show="step === 7" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30" x-text="t('step_counter').replace('{step}', 7).replace('{total}', 8)">Step 7 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug" x-text="t('q7_title')">
                        7. How do you usually feel 1 to 2 hours after your main meal?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1" x-text="t('q7_desc')">Identifies whether your digestive fire needs warming, cooling, or stabilizing spices:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in digestionList" :key="item.val">
                        <button type="button" 
                                @click="answers.digestion = item.val" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                                :class="answers.digestion === item.val ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                            <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                                 :class="answers.digestion === item.val ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                                <div x-show="answers.digestion === item.val" class="w-2 h-2 rounded-full bg-brand-green-950"></div>
                            </div>
                            <div class="flex-1">
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': answers.digestion === item.val}" x-text="item.label"></span>
                                <span class="text-xs sm:text-sm text-brand-green-200 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 8: Daily Sensitivities & Cravings -->
            <div x-show="step === 8" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30" x-text="t('step_counter').replace('{step}', 8).replace('{total}', 8)">Step 8 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug" x-text="t('q8_title')">
                        8. Do you experience any of these daily sensitivities?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1" x-text="t('q8_desc')">Select all that apply to help Dr. Sajeev Dev customize herbal co-factors:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in sensitivityList" :key="item.key">
                        <button type="button" 
                                @click="toggleSensitivity(item.key)" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                                :class="answers.sensitivities.includes(item.key) ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600'">
                            <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                                 :class="answers.sensitivities.includes(item.key) ? 'border-brand-gold-400 bg-brand-gold-400 text-brand-green-950 font-bold' : 'border-brand-green-600 bg-transparent'">
                                <span x-show="answers.sensitivities.includes(item.key)">✓</span>
                            </div>
                            <div class="flex-1">
                                <span class="font-bold text-sm sm:text-base block text-white" :class="{'text-brand-gold-300': answers.sensitivities.includes(item.key)}" x-text="item.label"></span>
                                <span class="text-xs sm:text-sm text-brand-green-200 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                        </button>
                    </template>
                </div>

                <div class="mt-4 text-center">
                    <button type="button" 
                            @click="clearSensitivities()" 
                            class="text-xs text-brand-green-200 hover:text-white underline underline-offset-2 cursor-pointer"
                            x-text="t('none_sensitivities')">
                        None of these sensitivities apply to me
                    </button>
                </div>
            </div>

            <!-- Navigation Controls (Bottom Bar for Steps 1-8) -->
            <div class="mt-8 pt-5 border-t border-brand-green-700/80 flex items-center justify-between" x-show="step >= 1 && step <= 8">
                <button type="button" 
                        @click="prevStep()" 
                        class="px-5 py-2.5 rounded-xl font-semibold text-xs uppercase tracking-wider text-brand-green-200 hover:text-white hover:bg-brand-green-700/60 transition-colors border border-brand-green-700 cursor-pointer">
                    <span x-text="t('prev_btn')">← Back</span>
                </button>
                
                <button type="button" 
                        @click="nextStep()" 
                        :disabled="!canProceed" 
                        class="px-7 py-3 rounded-xl font-bold text-brand-green-950 transition-all transform active:scale-95 disabled:opacity-40 disabled:cursor-not-allowed shadow-md hover:shadow-lg flex items-center gap-2 cursor-pointer bg-brand-gold-400 hover:bg-brand-gold-300 text-sm">
                    <span x-text="step === 8 ? t('submit_btn') : t('next_btn')"></span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

            <!-- STEP 9: Personalized Daily Meal Blueprint Screen -->
            <div x-show="step === 9" style="display: none;" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-98 translate-y-3" x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                
                <!-- Patient Profile Header -->
                <div class="text-center mb-8 pt-2">
                    <div class="flex flex-wrap items-center justify-center gap-2 mb-3">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-brand-green-950 text-brand-gold-300 border border-brand-green-700" 
                              x-show="profile.name" 
                              x-text="t('patient_label') + ': ' + profile.name"></span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-brand-green-950 text-white border border-brand-green-700" 
                              x-show="profile.gender" 
                              x-text="genderLabel + ' • ' + (ageGroupLabel || '')"></span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-brand-gold-400 text-brand-green-950" 
                              x-text="goalLabel"></span>
                    </div>

                    <h3 class="text-2xl sm:text-3xl font-serif font-bold text-white mb-2" x-text="t('report_title')">Your 3-Phase Daily Ayurvedic Blueprint</h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 max-w-lg mx-auto">
                        <span x-text="t('report_sub_1')"></span>
                        <span class="font-bold text-brand-gold-400" x-text="digestionLabel"></span>
                        <span x-text="t('report_sub_2')"></span>
                    </p>
                </div>

                <!-- WHATSAPP DELIVERY CTA -->
                <div class="bg-brand-green-950/80 rounded-2xl p-4 sm:p-5 mb-8 border border-brand-gold-500/30 text-center flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-left">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 flex items-center gap-1.5">
                            <span>📲</span>
                            <span x-text="t('wa_box_title')">Receive Full 7-Day Custom Diet Chart on WhatsApp</span>
                        </h4>
                        <p class="text-xs text-brand-green-100/70 mt-0.5" x-text="t('wa_box_desc')">
                            Get complete recipes, timing chart, and Dr. Sajeev Dev's guidance delivered straight to your phone.
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

                <!-- 3 MEAL PHASE CARDS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <!-- Morning Phase -->
                    <div class="bg-brand-green-950/70 rounded-2xl p-5 border border-brand-green-700 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-400" x-text="t('phase1_badge')">Phase 1: Morning</span>
                                <span class="text-base">🌅</span>
                            </div>
                            <h4 class="text-base font-bold text-white mb-2" x-text="t('phase1_title')">Agni Activation & Detox</h4>
                            <p class="text-xs text-brand-green-100/90 leading-relaxed" x-text="blueprint.morning"></p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-brand-green-800 text-[11px] text-brand-gold-300">
                            <strong x-text="t('recommended_time')">Recommended Time:</strong> 6:30 AM – 8:00 AM
                        </div>
                    </div>

                    <!-- Midday Lunch Phase -->
                    <div class="bg-brand-green-950/70 rounded-2xl p-5 border border-brand-green-700 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-400" x-text="t('phase2_badge')">Phase 2: Midday</span>
                                <span class="text-base">☀️</span>
                            </div>
                            <h4 class="text-base font-bold text-white mb-2" x-text="t('phase2_title')">Main Rebuilding Meal</h4>
                            <p class="text-xs text-brand-green-100/90 leading-relaxed" x-text="blueprint.lunch"></p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-brand-green-800 text-[11px] text-brand-gold-300">
                            <strong x-text="t('recommended_time')">Recommended Time:</strong> 12:30 PM – 1:30 PM
                        </div>
                    </div>

                    <!-- Evening Dinner Phase -->
                    <div class="bg-brand-green-950/70 rounded-2xl p-5 border border-brand-green-700 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-400" x-text="t('phase3_badge')">Phase 3: Sunset</span>
                                <span class="text-base">🌙</span>
                            </div>
                            <h4 class="text-base font-bold text-white mb-2" x-text="t('phase3_title')">Light Healing Dinner</h4>
                            <p class="text-xs text-brand-green-100/90 leading-relaxed" x-text="blueprint.dinner"></p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-brand-green-800 text-[11px] text-brand-gold-300">
                            <strong x-text="t('recommended_time')">Recommended Time:</strong> 7:00 PM – 7:45 PM
                        </div>
                    </div>
                </div>

                <!-- DR. SAJEEV DEV'S THERAPEUTIC HERBAL INTEGRATION -->
                <div class="bg-gradient-to-br from-brand-green-950 via-brand-green-900 to-brand-green-950 rounded-3xl p-6 sm:p-8 mb-8 border border-brand-gold-400/30 shadow-xl">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-6 h-6 rounded-full bg-brand-gold-400 text-brand-green-950 flex items-center justify-center text-xs font-bold">🌿</span>
                        <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300" x-text="t('doc_badge')">Dr. Sajeev Dev's Therapeutic Nutrition Advice</span>
                    </div>
                    <h4 class="text-xl sm:text-2xl font-serif font-bold text-white mb-3" x-text="t('doc_heading')">
                        Pair Your Daily Meals with Pure Ayurvedic Functional Foods
                    </h4>
                    <p class="text-xs sm:text-sm text-brand-green-100/90 leading-relaxed mb-6" x-text="t('doc_desc')">
                        A diet plan is only as effective as your body's cellular assimilation. Adding pure, single-origin functional botanicals helps kindle your digestive fire (Deepana) and prevent toxic buildup (Ama) throughout your tissues.
                    </p>

                    <!-- 3 RECOMMENDED PRODUCTS FOR THIS DIET -->
                    <div class="mb-6">
                        <h5 class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 mb-3" x-text="t('essential_foods')">
                            Essential Functional Foods to Integrate into Your Diet:
                        </h5>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <!-- Product 1: Moringa Leaves Powder -->
                            <a href="/products/moringa-leaves-powder" target="_blank"
                               class="group block bg-brand-green-900 rounded-2xl border border-brand-green-700 hover:border-brand-gold-400 hover:shadow-lg transition-all flex flex-col justify-between overflow-hidden">
                                <div>
                                    <div class="relative bg-brand-green-950/80 p-3 flex items-center justify-center border-b border-brand-green-800 h-36">
                                        <span class="absolute top-2 left-2 px-2 py-0.5 rounded-full text-[9px] font-bold uppercase bg-emerald-900 text-emerald-300 border border-emerald-700">Morning Agni</span>
                                        <span class="absolute top-2 right-2 text-xs font-bold text-white bg-brand-green-800 px-2 py-0.5 rounded border border-brand-green-600">₹180</span>
                                        <img src="https://images.unsplash.com/photo-1515694346937-94d85e41e6f0?q=80&w=600&auto=format&fit=crop" 
                                             alt="Moringa Leaves Powder" class="h-28 object-contain group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="p-3.5">
                                        <h6 class="font-serif font-bold text-xs sm:text-sm text-white group-hover:text-brand-gold-300 line-clamp-1" x-text="t('prod1_title')">Moringa Leaves Powder</h6>
                                        <p class="text-[11px] text-brand-green-200 mt-1 line-clamp-2" x-text="t('prod1_desc')">Pure organic green powder for morning warm water detox, metabolic kickstart, and micro-nutrition.</p>
                                    </div>
                                </div>
                                <div class="p-3.5 pt-0">
                                    <div class="w-full py-1.5 px-3 bg-brand-green-800 group-hover:bg-brand-gold-400 text-brand-green-100 group-hover:text-brand-green-950 rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span x-text="t('view_product')">View Product</span>
                                        <span>→</span>
                                    </div>
                                </div>
                            </a>

                            <!-- Product 2: Jamun Seed Powder -->
                            <a href="/products/jamun-seed-powder" target="_blank"
                               class="group block bg-brand-green-900 rounded-2xl border border-brand-green-700 hover:border-brand-gold-400 hover:shadow-lg transition-all flex flex-col justify-between overflow-hidden">
                                <div>
                                    <div class="relative bg-brand-green-950/80 p-3 flex items-center justify-center border-b border-brand-green-800 h-36">
                                        <span class="absolute top-2 left-2 px-2 py-0.5 rounded-full text-[9px] font-bold uppercase bg-purple-900 text-purple-300 border border-purple-700">Sugar & Gut</span>
                                        <span class="absolute top-2 right-2 text-xs font-bold text-white bg-brand-green-800 px-2 py-0.5 rounded border border-brand-green-600">₹190</span>
                                        <img src="https://images.unsplash.com/photo-1622483767028-3f66f32aef97?q=80&w=600&auto=format&fit=crop" 
                                             alt="Jamun Seed Powder" class="h-28 object-contain group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="p-3.5">
                                        <h6 class="font-serif font-bold text-xs sm:text-sm text-white group-hover:text-brand-gold-300 line-clamp-1" x-text="t('prod2_title')">Jamun Seed Powder</h6>
                                        <p class="text-[11px] text-brand-green-200 mt-1 line-clamp-2" x-text="t('prod2_desc')">Helps curb carbohydrate cravings, balances post-lunch sugar spikes, and supports digestive Agni.</p>
                                    </div>
                                </div>
                                <div class="p-3.5 pt-0">
                                    <div class="w-full py-1.5 px-3 bg-brand-green-800 group-hover:bg-brand-gold-400 text-brand-green-100 group-hover:text-brand-green-950 rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span x-text="t('view_product')">View Product</span>
                                        <span>→</span>
                                    </div>
                                </div>
                            </a>

                            <!-- Product 3: Ragi Millet Soup Mix -->
                            <a href="/products/ragi-millet-soup-mix" target="_blank"
                               class="group block bg-brand-green-900 rounded-2xl border border-brand-green-700 hover:border-brand-gold-400 hover:shadow-lg transition-all flex flex-col justify-between overflow-hidden">
                                <div>
                                    <div class="relative bg-brand-green-950/80 p-3 flex items-center justify-center border-b border-brand-green-800 h-36">
                                        <span class="absolute top-2 left-2 px-2 py-0.5 rounded-full text-[9px] font-bold uppercase bg-amber-900 text-amber-300 border border-amber-700">Dinner Soup</span>
                                        <span class="absolute top-2 right-2 text-xs font-bold text-white bg-brand-green-800 px-2 py-0.5 rounded border border-brand-green-600">₹135</span>
                                        <img src="https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=600&auto=format&fit=crop" 
                                             alt="Ragi Millet Soup Mix" class="h-28 object-contain group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="p-3.5">
                                        <h6 class="font-serif font-bold text-xs sm:text-sm text-white group-hover:text-brand-gold-300 line-clamp-1" x-text="t('prod3_title')">Ragi Millet Soup Mix</h6>
                                        <p class="text-[11px] text-brand-green-200 mt-1 line-clamp-2" x-text="t('prod3_desc')">Ideal wholesome evening replacement; light on the stomach, high in calcium & slow-release fiber.</p>
                                    </div>
                                </div>
                                <div class="p-3.5 pt-0">
                                    <div class="w-full py-1.5 px-3 bg-brand-green-800 group-hover:bg-brand-gold-400 text-brand-green-100 group-hover:text-brand-green-950 rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span x-text="t('view_product')">View Product</span>
                                        <span>→</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- DIRECT GATEWAY TO ALL PRODUCTS PAGE -->
                    <div class="p-4 sm:p-5 bg-brand-green-950 text-white rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4 border border-brand-gold-500/30">
                        <div class="text-center sm:text-left">
                            <span class="text-xs font-bold uppercase tracking-widest text-brand-gold-400 block mb-0.5" x-text="t('catalog_sub')">Explore the Full Catalog</span>
                            <h5 class="font-serif font-bold text-base sm:text-lg text-white" x-text="t('catalog_title')">Visit Yuvann Ayurvedic Shop</h5>
                            <p class="text-xs text-brand-green-100/80 mt-0.5" x-text="t('catalog_desc')">
                                Browse all doctor-formulated herbal oils, functional foods, and powders at <span class="text-brand-gold-300 font-mono">yuvann.com/products</span>
                            </p>
                        </div>
                        <a href="https://yuvann.com/products" 
                           class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-brand-gold-400 hover:bg-brand-gold-300 text-brand-green-950 font-black text-xs sm:text-sm rounded-xl transition-all shadow-md shrink-0 gap-2 cursor-pointer">
                            <span x-text="t('shop_all_btn')">Shop All Products</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <button type="button" 
                            @click="resetQuiz()" 
                            class="text-xs text-brand-gold-400 hover:text-brand-gold-200 font-semibold underline underline-offset-4 cursor-pointer"
                            x-text="t('retake_btn')">
                        ← Retake Diet Assessment
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    function dietPlanFinder() {
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
                goal: '',
                diet: '',
                digestion: '',
                sensitivities: []
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

            // Full localized dictionaries
            i18n: {
                en: {
                    badge: "Ayurvedic Nutrition Science",
                    heading: "Ayurvedic Diet Plan & Meal Blueprint",
                    subheading: "A structured nutritional screening by Dr. Sajeev Dev to construct your personalized daily meal blueprint based on your Agni, Dosha, and metabolic goals.",
                    lang_label: "Language",
                    choose_lang_title: "Select Your Preferred Language",
                    intro_title: "Unlock Your Custom Ayurvedic Daily Meal Blueprint",
                    intro_desc: "Food is medicine (Ahar Kalpana) when matched to your unique digestive fire. Answer a few brief lifestyle questions one screen at a time to discover your optimal breakfast, lunch, and dinner routine, formatted for your WhatsApp.",
                    f1_title: "Takes 2 Minutes",
                    f1_desc: "Focused single-question progression.",
                    f2_title: "WhatsApp Chart",
                    f2_desc: "Receive your custom 7-day chart directly.",
                    f3_title: "Doctor-Guided",
                    f3_desc: "Curated by Dr. Sajeev Dev.",
                    begin_btn: "Begin Diet Assessment",
                    prev_btn: "← Back",
                    next_btn: "Next Step",
                    submit_btn: "Complete & View Blueprint",
                    retake_btn: "← Retake Diet Assessment",
                    step_counter: "Step {step} of {total}",

                    q1_title: "1. What is your full name?",
                    q1_desc: "To personalize your custom meal blueprint and official doctor consultation:",
                    q1_placeholder: "e.g. Priya Sharma",
                    q1_tip: "Type your name and press <strong>Enter ↵</strong> or click <strong>Next Step →</strong> below.",

                    q2_title: "2. What is your biological gender?",
                    q2_desc: "Nutrient partitioning and caloric distribution require gender-specific consideration:",
                    gender_female: "Female",
                    gender_female_desc: "Hormonal cycle support, blood nourishment (Rakta Dhatu), and iron density",
                    gender_male: "Male",
                    gender_male_desc: "Muscle preservation, visceral fat management, and high metabolic efficiency",
                    gender_other: "Other / Prefer not to say",
                    gender_other_desc: "Balanced nutritional blueprint for general metabolic vitality",

                    q3_title: "3. Which age group do you belong to?",
                    q3_desc: "Life stages define your cellular Agni and digestive capacity:",

                    q4_title: "4. What is your WhatsApp phone number?",
                    q4_desc: "We will send your complete 7-day personalized diet blueprint and shopping guide directly to your phone:",
                    q4_placeholder: "Enter 10-digit mobile number",
                    q4_privacy: "Confidential. Your number is only used to deliver your customized diet blueprint and doctor consultation.",

                    q5_title: "5. What is the primary focus for your daily meal plan?",
                    q5_desc: "Select the therapeutic purpose your meal blueprint should prioritize:",

                    q6_title: "6. What is your primary dietary preference?",
                    q6_desc: "We tailor your breakfast, lunch, and dinner recipes strictly to your preferred food matrix:",

                    q7_title: "7. How do you usually feel 1 to 2 hours after your main meal?",
                    q7_desc: "Identifies whether your digestive fire needs warming, cooling, or stabilizing spices:",

                    q8_title: "8. Do you experience any of these daily sensitivities?",
                    q8_desc: "Select all that apply to help Dr. Sajeev Dev customize herbal co-factors:",
                    none_sensitivities: "None of these sensitivities apply to me",

                    patient_label: "Patient",
                    report_title: "Your 3-Phase Daily Ayurvedic Blueprint",
                    report_sub_1: "Structured to balance your digestive fire (",
                    report_sub_2: ") and sustain peak cellular nourishment throughout the day.",
                    wa_box_title: "Receive Full 7-Day Custom Diet Chart on WhatsApp",
                    wa_box_desc: "Get complete recipes, timing chart, and Dr. Sajeev Dev's guidance delivered straight to your phone.",
                    send_wa_btn: "Send to My WhatsApp",

                    phase1_badge: "Phase 1: Morning",
                    phase1_title: "Agni Activation & Detox",
                    phase2_badge: "Phase 2: Midday",
                    phase2_title: "Main Rebuilding Meal",
                    phase3_badge: "Phase 3: Sunset",
                    phase3_title: "Light Healing Dinner",
                    recommended_time: "Recommended Time:",

                    doc_badge: "Dr. Sajeev Dev's Therapeutic Nutrition Advice",
                    doc_heading: "Pair Your Daily Meals with Pure Ayurvedic Functional Foods",
                    doc_desc: "A diet plan is only as effective as your body's cellular assimilation. Adding pure, single-origin functional botanicals helps kindle your digestive fire (Deepana) and prevent toxic buildup (Ama) throughout your tissues.",
                    essential_foods: "Essential Functional Foods to Integrate into Your Diet:",

                    prod1_title: "Moringa Leaves Powder",
                    prod1_desc: "Pure organic green powder for morning warm water detox, metabolic kickstart, and micro-nutrition.",
                    prod2_title: "Jamun Seed Powder",
                    prod2_desc: "Helps curb carbohydrate cravings, balances post-lunch sugar spikes, and supports digestive Agni.",
                    prod3_title: "Ragi Millet Soup Mix",
                    prod3_desc: "Ideal wholesome evening replacement; light on the stomach, high in calcium & slow-release fiber.",
                    view_product: "View Product",

                    catalog_sub: "Explore the Full Catalog",
                    catalog_title: "Visit Yuvann Ayurvedic Shop",
                    catalog_desc: "Browse all doctor-formulated herbal oils, functional foods, and powders at yuvann.com/products",
                    shop_all_btn: "Shop All Products"
                },
                ml: {
                    badge: "ആയുർവേദ പോഷകാഹാര ശാസ്ത്രം",
                    heading: "ആയുർവേദ ഭക്ഷണക്രമവും പ്രതിദിന മെനുവും",
                    subheading: "നിങ്ങളുടെ ദഹനാഗ്നി, ദോഷം, ആരോഗ്യ ലക്ഷ്യം എന്നിവയ്ക്കനുസൃതമായി ഡോ. സജീവ് ദേവ് തയ്യാറാക്കുന്ന വ്യക്തിഗത ഭക്ഷണക്രമം.",
                    lang_label: "ഭാഷ",
                    choose_lang_title: "നിങ്ങളുടെ ഭാഷ തിരഞ്ഞെടുക്കുക",
                    intro_title: "നിങ്ങൾക്കായുള്ള ആയുർവേദ പ്രതിദിന ഭക്ഷണക്രമം കണ്ടെത്തൂ",
                    intro_desc: "ശരിയായ ദഹനാഗ്നിക്ക് അനുയോജ്യമായ ആഹാരം ഔഷധമാണ് (ആഹാര കല്പന). ലളിതമായ കുറച്ച് ചോദ്യങ്ങൾക്ക് ഉത്തരം നൽകി നിങ്ങളുടെ പ്രഭാതഭക്ഷണം, ഉച്ചയൂണ്, അത്താഴം എന്നിവ വാട്സാപ്പിൽ നേടൂ.",
                    f1_title: "2 മിനിറ്റ് മാത്രം",
                    f1_desc: "ലളിതമായ ഒറ്റയൊറ്റ ചോദ്യങ്ങൾ.",
                    f2_title: "വാട്സാപ്പ് ചാർട്ട്",
                    f2_desc: "വ്യക്തിഗത ഡയറ്റ് ചാർട്ട് ഫോണിൽ ലഭിക്കും.",
                    f3_title: "ഡോക്ടറുടെ നിർദ്ദേശം",
                    f3_desc: "ഡോ. സജീവ് ദേവിന്റെ മേൽനോട്ടത്തിൽ.",
                    begin_btn: "ഡയറ്റ് പരിശോധന ആരംഭിക്കുക",
                    prev_btn: "← പിന്നോട്ട്",
                    next_btn: "അടുത്ത ഘട്ടം",
                    submit_btn: "ഡയറ്റ് പ്ലാൻ കാണുക",
                    retake_btn: "← വീണ്ടും പരിശോധിക്കുക",
                    step_counter: "ഘട്ടം {step} / {total}",

                    q1_title: "1. നിങ്ങളുടെ പൂർണ്ണമായ പേര് എന്താണ്?",
                    q1_desc: "നിങ്ങൾക്കുള്ള ഭക്ഷണക്രമവും ഡോക്ടറുടെ നിർദ്ദേശങ്ങളും തയ്യാറാക്കാൻ:",
                    q1_placeholder: "ഉദാ: പ്രിയ ശർമ്മ",
                    q1_tip: "പേര് ടൈപ്പ് ചെയ്ത് <strong>Enter ↵</strong> അമർത്തുക അല്ലെങ്കിൽ താഴെയുള്ള <strong>അടുത്ത ഘട്ടം →</strong> ക്ലിക്ക് ചെയ്യുക.",

                    q2_title: "2. നിങ്ങളുടെ ലിംഗം ഏതാണ്?",
                    q2_desc: "പോഷക ആഗിരണവും ഊർജ്ജ വിനിയോഗവും ലിംഗഭേദമനുസരിച്ച് വ്യത്യാസപ്പെടുന്നു:",
                    gender_female: "സ്ത്രീ (Female)",
                    gender_female_desc: "ഹോർമോൺ സംതുലനം, രക്തധാതു പോഷണം, അയൺ സാന്ദ്രത",
                    gender_male: "പുരുഷൻ (Male)",
                    gender_male_desc: "പേശീബലം, വിസറൽ കൊഴുപ്പ് നിയന്ത്രണം, ഉയർന്ന മെറ്റബോളിസം",
                    gender_other: "മറ്റുള്ളവ (Other)",
                    gender_other_desc: "സാധാരണ ഉപാപചയ പ്രവർത്തനങ്ങൾക്കുള്ള സംതുലിത പോഷണം",

                    q3_title: "3. നിങ്ങളുടെ പ്രായപരിധി ഏതാണ്?",
                    q3_desc: "ജീവിതഘട്ടങ്ങൾ നിങ്ങളുടെ ദഹനാഗ്നിയെയും ഉപാപചയ പ്രവർത്തനങ്ങളെയും സ്വാധീനിക്കുന്നു:",

                    q4_title: "4. നിങ്ങളുടെ വാട്സാപ്പ് നമ്പർ എന്താണ്?",
                    q4_desc: "7 ദിവസത്തെ വ്യക്തിഗത ഡയറ്റ് ചാർട്ടും നിർദ്ദേശങ്ങളും നിങ്ങളുടെ ഫോണിൽ അയച്ചുതരുന്നതാണ്:",
                    q4_placeholder: "10 അക്ക മൊബൈൽ നമ്പർ നൽകുക",
                    q4_privacy: "രഹസ്യസ്വഭാവം ഉറപ്പ്. ഡയറ്റ് ചാർട്ടും ഡോക്ടറുടെ നിർദ്ദേശങ്ങളും നൽകാൻ മാത്രമേ ഈ നമ്പർ ഉപയോഗിക്കൂ.",

                    q5_title: "5. നിങ്ങളുടെ ഭക്ഷണക്രമത്തിന്റെ പ്രധാന ലക്ഷ്യം എന്താണ്?",
                    q5_desc: "ഭക്ഷണക്രമം മുൻഗണന നൽകേണ്ട പ്രധാന ലക്ഷ്യം തിരഞ്ഞെടുക്കുക:",

                    q6_title: "6. നിങ്ങളുടെ പ്രധാന ഭക്ഷണ ശൈലി ഏതാണ്?",
                    q6_desc: "നിങ്ങളുടെ പ്രഭാതഭക്ഷണം, ഉച്ചയൂണ്, അത്താഴം എന്നിവ ഈ ശൈലിക്ക് അനുയോജ്യമായി ക്രമീകരിക്കുന്നു:",

                    q7_title: "7. പ്രധാന ഭക്ഷണം കഴിഞ്ഞ് 1-2 മണിക്കൂറിന് ശേഷം നിങ്ങൾക്ക് എന്താണ് അനുഭവപ്പെടുന്നത്?",
                    q7_desc: "നിങ്ങളുടെ ദഹനാഗ്നിക്ക് ചൂടുള്ളതോ തണുപ്പുള്ളതോ ആയ ചേരുവകളാണോ ആവശ്യമെന്ന് നിർണ്ണയിക്കുന്നു:",

                    q8_title: "8. താഴെ പറയുന്ന ലക്ഷണങ്ങളിൽ എന്തെങ്കിലും അനുഭവപ്പെടാറുണ്ടോ?",
                    q8_desc: "ഡോ. സജീവ് ദേവിന് അനുയോജ്യമായ ഔഷധങ്ങൾ നിർദ്ദേശിക്കാൻ സഹായിക്കുന്ന വിവരങ്ങൾ തിരഞ്ഞെടുക്കുക:",
                    none_sensitivities: "ഇവയിലൊന്നും എനിക്ക് ബാധകമല്ല",

                    patient_label: "വ്യക്തി",
                    report_title: "നിങ്ങളുടെ 3-ഘട്ട പ്രതിദിന ആയുർവേദ ഭക്ഷണക്രമം",
                    report_sub_1: "നിങ്ങളുടെ ദഹനാഗ്നി (",
                    report_sub_2: ") സംതുലിതമാക്കാനും ദിവസേന ഊർജ്ജം നിലനിർത്താനും ക്രമീകരിച്ചിരിക്കുന്നു.",
                    wa_box_title: "പൂർണ്ണ 7 ദിവസത്തെ ഡയറ്റ് ചാർട്ട് വാട്സാപ്പിൽ നേടൂ",
                    wa_box_desc: "വിശദമായ മെനു, ഭക്ഷണ സമയം, ഡോക്ടറുടെ നിർദ്ദേശങ്ങൾ എന്നിവ നേരിട്ട് ഫോണിൽ ലഭിക്കും.",
                    send_wa_btn: "വാട്സാപ്പിലേക്ക് അയക്കുക",

                    phase1_badge: "ഘട്ടം 1: പ്രഭാതം",
                    phase1_title: "അഗ്നി ഉത്തേജനവും ശരീരശുദ്ധിയും",
                    phase2_badge: "ഘട്ടം 2: ഉച്ച",
                    phase2_title: "പ്രധാന പോഷക ഭക്ഷണം",
                    phase3_badge: "ഘട്ടം 3: സന്ധ്യ / അത്താഴം",
                    phase3_title: "ലഘുവായ സുഖപ്രദ അത്താഴം",
                    recommended_time: "അനുയോജ്യമായ സമയം:",

                    doc_badge: "ഡോ. സജീവ് ദേവിന്റെ പോഷകാഹാര നിർദ്ദേശം",
                    doc_heading: "ഭക്ഷണത്തോടൊപ്പം ശുദ്ധമായ ആയുർവേദ ഫങ്ഷണൽ ഫുഡ്സ് ഉൾപ്പെടുത്തൂ",
                    doc_desc: "ഭക്ഷണത്തിലെ പോഷകങ്ങൾ ശരീരം എത്രത്തോളം ആഗിരണം ചെയ്യുന്നു എന്നതിലാണ് ആരോഗ്യം. ശുദ്ധമായ ആയുർവേദ ചേരുവകൾ ദഹനാഗ്നി ഉത്തേജിപ്പിക്കാനും ശരീരത്തിലെ വിഷാംശങ്ങൾ (ആമം) നീക്കാനും സഹായിക്കുന്നു.",
                    essential_foods: "ഭക്ഷണത്തിൽ ഉൾപ്പെടുത്തേണ്ട പ്രധാന ആയുർവേദ ഉൽപ്പന്നങ്ങൾ:",

                    prod1_title: "മുരിങ്ങയില പൊടി (Moringa Leaves Powder)",
                    prod1_desc: "രാവിലെ ചെറുചൂടുവെള്ളത്തിൽ കഴിക്കാൻ ഉത്തമം; ശരീരശുദ്ധിക്കും ഉയർന്ന പോഷക ലഭ്യതയ്ക്കും സഹായിക്കുന്നു.",
                    prod2_title: "ഞാവൽ കുരു പൊടി (Jamun Seed Powder)",
                    prod2_desc: "മധുരത്തോടുള്ള ആസക്തി കുറയ്ക്കാനും ഉച്ചഭക്ഷണത്തിന് ശേഷമുള്ള ക്ഷീണം മാറ്റാനും സഹായിക്കുന്നു.",
                    prod3_title: "റാഗി മില്ലറ്റ് സൂപ്പ് മിക്സ് (Ragi Millet Soup Mix)",
                    prod3_desc: "രാത്രിയിലെ ലഘുഭക്ഷണത്തിന് ഏറ്റവും അനുയോജ്യം; വയറിന് കട്ടിയില്ല, കാൽസ്യവും നാരുകളും നൽകുന്നു.",
                    view_product: "വിശദാംശങ്ങൾ കാണുക",

                    catalog_sub: "മുഴുവൻ ഉൽപ്പന്നങ്ങളും കാണുക",
                    catalog_title: "യുവൻ ആയുർവേദിക് ഷോപ്പ് സന്ദർശിക്കൂ",
                    catalog_desc: "ഡോക്ടർ തയ്യാറാക്കിയ എല്ലാ ഔഷധ തൈലങ്ങളും ഭക്ഷണ പൗഡറുകളും yuvann.com/products-ൽ ലഭ്യമാണ്",
                    shop_all_btn: "എല്ലാ ഉൽപ്പന്നങ്ങളും കാണുക"
                },
                hi: {
                    badge: "आयुर्वेदिक पोषण विज्ञान",
                    heading: "आयुर्वेदिक आहार योजना व दैनिक भोजन रूपरेखा",
                    subheading: "आपकी पाचन अग्नि, दोष और मेटाबॉलिक लक्ष्यों के आधार पर डॉ. सजीव देव द्वारा तैयार की गई व्यक्तिगत दैनिक भोजन योजना।",
                    lang_label: "भाषा",
                    choose_lang_title: "अपनी पसंदीदा भाषा चुनें",
                    intro_title: "अपनी व्यक्तिगत आयुर्वेदिक दैनिक भोजन योजना जानें",
                    intro_desc: "सही पाचन अग्नि के अनुसार लिया गया भोजन ही औषधि है (आहार कल्पना)। कुछ सरल प्रश्नों के उत्तर दें और अपने नाश्ते, दोपहर और रात के भोजन की सटीक रूपरेखा सीधे व्हाट्सएप पर पाएं।",
                    f1_title: "केवल 2 मिनट",
                    f1_desc: "सरल और केंद्रित प्रश्न।",
                    f2_title: "व्हाट्सएप चार्ट",
                    f2_desc: "7-दिनों का चार्ट सीधे फोन पर पाएं।",
                    f3_title: "डॉक्टर द्वारा प्रमाणित",
                    f3_desc: "डॉ. सजीव देव द्वारा तैयार।",
                    begin_btn: "आहार मूल्यांकन शुरू करें",
                    prev_btn: "← पिछला",
                    next_btn: "अगला कदम",
                    submit_btn: "आहार योजना देखें",
                    retake_btn: "← पुनः मूल्यांकन करें",
                    step_counter: "चरण {step} / {total}",

                    q1_title: "1. आपका पूरा नाम क्या है?",
                    q1_desc: "आपकी भोजन योजना और डॉक्टर परामर्श तैयार करने के लिए:",
                    q1_placeholder: "उदा. प्रिया शर्मा",
                    q1_tip: "नाम लिखकर <strong>Enter ↵</strong> दबाएं या नीचे <strong>अगला कदम →</strong> पर क्लिक करें।",

                    q2_title: "2. आपका जैविक लिंग क्या है?",
                    q2_desc: "पोषक तत्वों का उपयोग और कैलोरी वितरण लिंग पर निर्भर करता है:",
                    gender_female: "महिला (Female)",
                    gender_female_desc: "हार्मोनल संतुलन, रक्त धातु पोषण और आयरन घनत्व",
                    gender_male: "पुरुष (Male)",
                    gender_male_desc: "मांसपेशियों का संरक्षण, विसरल फैट प्रबंधन और उच्च मेटाबॉलिज्म",
                    gender_other: "अन्य (Other)",
                    gender_other_desc: "सामान्य मेटाबॉलिक ऊर्जा के लिए संतुलित पोषण रूपरेखा",

                    q3_title: "3. आप किस आयु वर्ग में आते हैं?",
                    q3_desc: "जीवन का चरण आपकी पाचन अग्नि और चयापचय क्षमता तय करता है:",

                    q4_title: "4. आपका व्हाट्सएप मोबाइल नंबर क्या है?",
                    q4_desc: "हम आपकी 7-दिवसीय व्यक्तिगत आहार योजना और खरीदारी गाइड सीधे आपके फोन पर भेजेंगे:",
                    q4_placeholder: "10 अंकों का मोबाइल नंबर दर्ज करें",
                    q4_privacy: "गोपनीय। आपका नंबर केवल आपकी व्यक्तिगत आहार योजना और डॉक्टर परामर्श भेजने के लिए उपयोग किया जाता है।",

                    q5_title: "5. आपकी भोजन योजना का प्राथमिक लक्ष्य क्या है?",
                    q5_desc: "उस चिकित्सकीय उद्देश्य को चुनें जिसे आपकी आहार योजना में प्राथमिकता मिलनी चाहिए:",

                    q6_title: "6. आपकी प्राथमिक खान-पान प्राथमिकता क्या है?",
                    q6_desc: "हम आपके नाश्ते, दोपहर और रात के भोजन को आपकी पसंद के अनुसार अनुकूलित करते हैं:",

                    q7_title: "7. मुख्य भोजन के 1 से 2 घंटे बाद आप आमतौर पर कैसा महसूस करते हैं?",
                    q7_desc: "यह निर्धारित करता है कि आपकी पाचन अग्नि को गर्म, ठंडे या संतुलित मसालों की आवश्यकता है:",

                    q8_title: "8. क्या आप इनमें से किसी दैनिक संवेदनशीलता का अनुभव करते हैं?",
                    q8_desc: "डॉ. सजीव देव को सही हर्बल पूरक चुनने में मदद करने के लिए सभी लागू विकल्प चुनें:",
                    none_sensitivities: "इनमें से कोई भी मुझ पर लागू नहीं होता",

                    patient_label: "मरीज",
                    report_title: "आपकी 3-चरणीय दैनिक आयुर्वेदिक भोजन योजना",
                    report_sub_1: "आपकी पाचन अग्नि (",
                    report_sub_2: ") को संतुलित करने और पूरे दिन निरंतर ऊर्जा प्रदान करने के लिए तैयार।",
                    wa_box_title: "व्हाट्सएप पर पूरा 7-दिवसीय डाइट चार्ट प्राप्त करें",
                    wa_box_desc: "विस्तृत व्यंजन विधियां, समय सारिणी और डॉ. सजीव देव का मार्गदर्शन सीधे अपने फोन पर पाएं।",
                    send_wa_btn: "व्हाट्सएप पर भेजें",

                    phase1_badge: "चरण 1: सुबह",
                    phase1_title: "अग्नि प्रदीप्ति व डिटॉक्स",
                    phase2_badge: "चरण 2: दोपहर",
                    phase2_title: "मुख्य पौष्टिक भोजन",
                    phase3_badge: "चरण 3: शाम / सूर्यास्त",
                    phase3_title: "हल्का व सुपाच्य रात्रिभोज",
                    recommended_time: "अनुशंसित समय:",

                    doc_badge: "डॉ. सजीव देव की चिकित्सीय पोषण सलाह",
                    doc_heading: "अपने दैनिक भोजन में शुद्ध आयुर्वेदिक फंक्शनल फूड्स शामिल करें",
                    doc_desc: "आहार योजना तभी प्रभावी होती है जब शरीर पोषक तत्वों को अवशोषित करे। शुद्ध आयुर्वेदिक जड़ी-बूटियां पाचन अग्नि (दीपन) को जगाती हैं और विषाक्त पदार्थों (आम) को रोकती हैं।",
                    essential_foods: "आहार में शामिल करने के लिए आवश्यक आयुर्वेदिक उत्पाद:",

                    prod1_title: "मोरिंगा पत्ती पाउडर (Moringa Powder)",
                    prod1_desc: "सुबह गुनगुने पानी के साथ डिटॉक्स, मेटाबॉलिक शुरुआत और सूक्ष्म पोषण के लिए सर्वोत्तम।",
                    prod2_title: "जामुन बीज पाउडर (Jamun Seed Powder)",
                    prod2_desc: "मीठे की तीव्र इच्छा कम करने और दोपहर के भोजन के बाद शुगर स्पाइक्स को नियंत्रित करने में सहायक।",
                    prod3_title: "रागी बाजरा सूप मिक्स (Ragi Millet Soup Mix)",
                    prod3_desc: "शाम के हल्के भोजन के लिए आदर्श; पेट पर हल्का, कैल्शियम व धीमी गति से पचने वाले फाइबर से भरपूर।",
                    view_product: "उत्पाद देखें",

                    catalog_sub: "पूरा कैटलॉग देखें",
                    catalog_title: "युवान आयुर्वेदिक स्टोर पर जाएं",
                    catalog_desc: "डॉक्टर द्वारा निर्मित सभी हर्बल तेल, खाद्य पाउडर व उत्पाद yuvann.com/products पर उपलब्ध हैं",
                    shop_all_btn: "सभी उत्पाद देखें"
                },
                ta: {
                    badge: "ஆயுர்வேத ஊட்டச்சத்து அறிவியல்",
                    heading: "ஆயுர்வேத உணவு முறை & தினசரி உணவு வழிகாட்டி",
                    subheading: "உங்கள் அக்னி, தோஷம் மற்றும் வளர்சிதை மாற்ற இலக்குகளுக்கு ஏற்ப டாக்டர் சஜீவ் தேவ் தயாரிக்கும் தனிப்பயனாக்கப்பட்ட உணவு வழிகாட்டி.",
                    lang_label: "மொழி",
                    choose_lang_title: "உங்கள் மொழியைத் தேர்ந்தெடுக்கவும்",
                    intro_title: "உங்களுக்கான ஆயுர்வேத தினசரி உணவு முறையை அறியுங்கள்",
                    intro_desc: "செரிமான அக்னிக்கு ஏற்ற உணவு மருந்தாகிறது (ஆகார கல்பனா). எளிய கேள்விகளுக்கு பதிலளித்து உங்கள் காலை, மதியம் மற்றும் இரவு உணவு திட்டத்தை வாட்ஸ்அப்பில் பெறுங்கள்.",
                    f1_title: "2 நிமிடங்கள் மட்டுமே",
                    f1_desc: "எளிய நேரடி வினாக்கள்.",
                    f2_title: "வாட்ஸ்அப் பட்டியல்",
                    f2_desc: "7 நாள் உணவு திட்டம் போனில் கிடைக்கும்.",
                    f3_title: "மருத்துவர் வழிகாட்டுதல்",
                    f3_desc: "டாக்டர் சஜீவ் தேவ் மேற்பார்வையில்.",
                    begin_btn: "உணவு மதிப்பீட்டைத் தொடங்குங்கள்",
                    prev_btn: "← பின்செல்",
                    next_btn: "அடுத்த படி",
                    submit_btn: "உணவு திட்டத்தைக் காண்க",
                    retake_btn: "← மீண்டும் சோதிக்கவும்",
                    step_counter: "படி {step} / {total}",

                    q1_title: "1. உங்கள் முழு பெயர் என்ன?",
                    q1_desc: "உங்கள் உணவு திட்டம் மற்றும் மருத்துவர் ஆலோசனையை தயாரிக்க:",
                    q1_placeholder: "எ.கா: பிரியா ஷர்மா",
                    q1_tip: "பெயரை உள்ளிட்டு <strong>Enter ↵</strong> அழுத்தவும் அல்லது கீழே <strong>அடுத்த படி →</strong> கிளிக் செய்யவும்.",

                    q2_title: "2. உங்கள் பாலினம் என்ன?",
                    q2_desc: "ஊட்டச்சத்து பயன்பாடு பாலினத்திற்கு ஏற்ப மாறுபடுகிறது:",
                    gender_female: "பெண் (Female)",
                    gender_female_desc: "ஹார்மோன் சுழற்சி சமநிலை, ரத்த தாது ஊட்டச்சத்து மற்றும் இரும்புச்சத்து",
                    gender_male: "ஆண் (Male)",
                    gender_male_desc: "தசை பராமரிப்பு, கொழுப்பு கட்டுப்பாடு மற்றும் அதிக வளர்சிதை மாற்றம்",
                    gender_other: "பிற (Other)",
                    gender_other_desc: "பொதுவான வளர்சிதை மாற்ற ஆற்றலுக்கான சமச்சீர் ஊட்டச்சத்து",

                    q3_title: "3. உங்கள் வயது வரம்பு எது?",
                    q3_desc: "வாழ்க்கை பருவம் உங்கள் செரிமான அக்னியை நிர்ணயிக்கிறது:",

                    q4_title: "4. உங்கள் வாட்ஸ்அப் எண் என்ன?",
                    q4_desc: "7 நாள் தனிப்பயனாக்கப்பட்ட உணவு பட்டியலை உங்கள் போனுக்கு அனுப்புவோம்:",
                    q4_placeholder: "10 இலக்க மொபைல் எண் உள்ளிடவும்",
                    q4_privacy: "ரகசியம் காக்கப்படும். உங்கள் உணவு திட்டத்தை அனுப்ப மட்டுமே இந்த எண் பயன்படுத்தப்படுகிறது.",

                    q5_title: "5. உங்கள் உணவு திட்டத்தின் முக்கிய நோக்கம் என்ன?",
                    q5_desc: "உங்கள் உணவு திட்டம் முன்னுரிமை அளிக்க வேண்டிய குறிக்கோளைத் தேர்ந்தெடுக்கவும்:",

                    q6_title: "6. உங்கள் உணவு பழக்கம் என்ன?",
                    q6_desc: "உங்கள் காலை, மதிய, இரவு உணவை உங்கள் விருப்பத்திற்கு ஏற்ப அமைப்போம்:",

                    q7_title: "7. முக்கிய உணவு உட்கொண்ட 1-2 மணி நேரத்திற்குப் பிறகு நீங்கள் எப்படி உணர்கிறீர்கள்?",
                    q7_desc: "உங்கள் செரிமானத்திற்கு எந்த வகையான மசாலாக்கள் தேவை என்பதை தீர்மானிக்கிறது:",

                    q8_title: "8. பின்வரும் அறிகுறிகளில் ஏதேனும் உங்களுக்கு உள்ளதா?",
                    q8_desc: "மருத்துவர் மூலிகை சத்துக்களை பரிந்துரைக்க உதவும் விருப்பங்களைத் தேர்வு செய்யவும்:",
                    none_sensitivities: "இவை எதுவும் எனக்கு பொருந்தாது",

                    patient_label: "நோயாளி",
                    report_title: "உங்கள் 3-கட்ட தினசரி ஆயுர்வேத உணவு திட்டம்",
                    report_sub_1: "உங்கள் செரிமான அக்னியை (",
                    report_sub_2: ") சமநிலைப்படுத்தவும் நாள் முழுவதும் புத்துணர்ச்சியுடன் இருக்கவும் வடிவமைக்கப்பட்டது.",
                    wa_box_title: "முழு 7 நாள் உணவு பட்டியலை வாட்ஸ்அப்பில் பெறுங்கள்",
                    wa_box_desc: "முழுமையான செய்முறைகள், உணவு நேரம் மற்றும் மருத்துவரின் ஆலோசனை நேரடியாக போனில் கிடைக்கும்.",
                    send_wa_btn: "வாட்ஸ்அப்பில் அனுப்பவும்",

                    phase1_badge: "கட்டம் 1: காலை",
                    phase1_title: "அக்னி தூண்டுதல் & நச்சு நீக்கம்",
                    phase2_badge: "கட்டம் 2: மதியம்",
                    phase2_title: "முக்கிய புத்துணர்ச்சி உணவு",
                    phase3_badge: "கட்டம் 3: மாலை / இரவு",
                    phase3_title: "எளிய செரிமான இரவு உணவு",
                    recommended_time: "பரிந்துரைக்கப்பட்ட நேரம்:",

                    doc_badge: "டாக்டர் சஜீவ் தேவ் ஊட்டச்சத்து ஆலோசனை",
                    doc_heading: "உணவுடன் தூய ஆயுர்வேத செயல்பாட்டு உணவுகளை இணைக்கவும்",
                    doc_desc: "உடல் சத்துக்களை கிரகிக்கும் போதே உணவு திட்டம் பலனளிக்கும். தூய ஆயுர்வேத மூலிகைகள் செரிமான அக்னியை தூண்டவும் நச்சுக்களை (ஆமம்) நீக்கவும் உதவுகின்றன.",
                    essential_foods: "உணவில் சேர்க்க வேண்டிய முக்கிய ஆயுர்வேத பொருட்கள்:",

                    prod1_title: "முருங்கை இலை பொடி (Moringa Leaves Powder)",
                    prod1_desc: "காலை வெதுவெதுப்பான நீரில் குடிக்க சிறந்தது; நச்சு நீக்கம் மற்றும் நுண்ணூட்டச்சத்து வழங்குகிறது.",
                    prod2_title: "நாவல் பழ விதை பொடி (Jamun Seed Powder)",
                    prod2_desc: "இனிப்பு ஆசையைக் குறைக்கவும், மதிய உணவுக்குப் பின் சர்க்கரை உயர்வை சமநிலைப்படுத்தவும் உதவுகிறது.",
                    prod3_title: "ராகி சிறுதானிய சூப் மிக்ஸ் (Ragi Millet Soup Mix)",
                    prod3_desc: "இரவு உணவிற்கு ஏற்ற எளிய உணவு; எளிதில் செரிக்கும், கால்சியம் மற்றும் நார்ச்சத்து நிறைந்தது.",
                    view_product: "பொருளைக் காண்க",

                    catalog_sub: "முழு பட்டியலையும் காண்க",
                    catalog_title: "யுவான் ஆயுர்வேத கடைக்கு செல்லுங்கள்",
                    catalog_desc: "மருத்துவர் தயாரித்த அனைத்து மூலிகை தைலங்கள் மற்றும் பொடிகள் yuvann.com/products-ல் கிடைக்கும்",
                    shop_all_btn: "அனைத்து பொருட்கள்"
                }
            },

            t(key) {
                const dict = this.i18n[this.lang] || this.i18n['en'];
                return dict[key] !== undefined ? dict[key] : (this.i18n['en'][key] || key);
            },

            get ageGroupList() {
                const lists = {
                    en: [
                        { val: 'Under 18', label: 'Under 18', desc: 'Active tissue growth phase; requires wholesome calorie and protein density' },
                        { val: '18–29', label: '18–29', desc: 'Peak metabolic fire; high physical activity and career stress balancing' },
                        { val: '30–45', label: '30–45', desc: 'Metabolic conservation phase; preventing visceral fat and post-lunch slumps' },
                        { val: '46–60', label: '46–60', desc: 'Hormonal transition phase; prioritizing lighter dinners and easy assimilation' },
                        { val: '60+', label: '60+', desc: 'Gentle Agni phase; warm soupy meals, easy mucosal digestion, and joint care' }
                    ],
                    ml: [
                        { val: 'Under 18', label: '18 വയസ്സിൽ താഴെ', desc: 'ശരീര വളർച്ചാ ഘട്ടം; കൂടുതൽ ഊർജ്ജവും പ്രോട്ടീനും ആവശ്യമുള്ള സമയം' },
                        { val: '18–29', label: '18–29 വയസ്സ്', desc: 'ഉയർന്ന ഉപാപചയ പ്രവർത്തനങ്ങൾ; പഠന-ജോലി സമ്മർദ്ദം നിയന്ത്രിക്കേണ്ട ഘട്ടം' },
                        { val: '30–45', label: '30–45 വയസ്സ്', desc: 'ശരീര സംരക്ഷണ ഘട്ടം; അടിവയറ്റിലെ കൊഴുപ്പ് തടയാനും ഉച്ചകഴിഞ്ഞുള്ള ക്ഷീണം മാറ്റാനും' },
                        { val: '46–60', label: '46–60 വയസ്സ്', desc: 'ഹോർമോൺ മാറ്റങ്ങൾ; രാത്രി ലഘുഭക്ഷണവും എളുപ്പത്തിൽ ദഹിക്കുന്ന ഭക്ഷണവും' },
                        { val: '60+', label: '60 വയസ്സിന് മുകളിൽ', desc: 'ശാന്തമായ ദഹന ഘട്ടം; ചൂടുള്ള സൂപ്പുകൾ, സന്ധീസംരക്ഷണം, മൃദുവായ ആഹാരം' }
                    ],
                    hi: [
                        { val: 'Under 18', label: '18 वर्ष से कम', desc: 'शारीरिक विकास का चरण; पौष्टिक कैलोरी और प्रोटीन की आवश्यकता' },
                        { val: '18–29', label: '18–29 वर्ष', desc: 'उच्च चयापचय दर; शारीरिक गतिविधि और तनाव संतुलन' },
                        { val: '30–45', label: '30–45 वर्ष', desc: 'मेटाबॉलिक स्थिरता; पेट की चर्बी रोकना और ऊर्जा बनाए रखना' },
                        { val: '46–60', label: '46–60 वर्ष', desc: 'हार्मोनल बदलाव; हल्का रात्रिभोज और सुपाच्य भोजन' },
                        { val: '60+', label: '60+ वर्ष', desc: 'सौम्य अग्नि चरण; गर्म सूप, जोड़ों की देखभाल और हल्का भोजन' }
                    ],
                    ta: [
                        { val: 'Under 18', label: '18 வயதுக்கு கீழ்', desc: 'உடல் வளர்ச்சி பருவம்; சத்துக்கள் நிறைந்த கலோரி மற்றும் புரதத் தேவை' },
                        { val: '18–29', label: '18–29 வயது', desc: 'அதிக வளர்சிதை மாற்ற அக்னி; உடல் உழைப்பு மற்றும் மன அழுத்த சமநிலை' },
                        { val: '30–45', label: '30–45 வயது', desc: 'கொழுப்பு சேராமல் தடுத்தல் மற்றும் மதிய சோர்வை நீக்குதல்' },
                        { val: '46–60', label: '46–60 வயது', desc: 'ஹார்மோன் மாற்றம்; எளிய இரவு உணவு மற்றும் எளிதில் செரிக்கும் உணவு' },
                        { val: '60+', label: '60+ வயது', desc: 'மெதுவான செரிமானம்; வெதுவெதுப்பான சூப் வகைகள், மூட்டு பாதுகாப்பு' }
                    ]
                };
                return lists[this.lang] || lists['en'];
            },

            get goalList() {
                const lists = {
                    en: [
                        { val: 'Fat Loss & Metabolic Reset (Medo Hara)', label: 'Fat Loss & Metabolic Reset (Medo Hara)', desc: 'Accelerate fat oxidation, eliminate water retention, and keep evening dinners light' },
                        { val: 'Blood Nourishment & Vitality (Rakta Vardhaka)', label: 'Blood Nourishment & Vitality (Rakta Vardhaka)', desc: 'Boost hemoglobin/ferritin, combat midday fatigue, and optimize cellular oxygenation' },
                        { val: 'Deep Gut Detox & Bloat Clearance (Ama Pachana)', label: 'Deep Gut Detox & Bloat Clearance (Ama Pachana)', desc: 'Ignite sluggish Agni, clear undigested gut residue, and relieve post-meal heaviness' },
                        { val: 'Cellular Longevity & Rejuvenation (Rasayana)', label: 'Cellular Longevity & Rejuvenation (Rasayana)', desc: 'Nourish all 7 tissue layers (Dhatus), protect skin/hair glow, and sustain steady stamina' }
                    ],
                    ml: [
                        { val: 'Fat Loss & Metabolic Reset (Medo Hara)', label: 'ശരീരഭാരം കുറയ്ക്കലും ഉപാപചയ പുനഃക്രമീകരണവും (മേദോഹര)', desc: 'അമിത കൊഴുപ്പ് ഇല്ലാതാക്കുക, ശരീരഭാരം ക്രമീകരിക്കുക, രാത്രി ലഘുവായ ഭക്ഷണം' },
                        { val: 'Blood Nourishment & Vitality (Rakta Vardhaka)', label: 'രക്തശുദ്ധീകരണവും ഉന്മേഷവും (രക്തവർദ്ധക)', desc: 'ഹീമോഗ്ലോബിൻ വർദ്ധിപ്പിക്കുക, ഉച്ചകഴിഞ്ഞുള്ള ക്ഷീണം മാറ്റുക, ഊർജ്ജസ്വലത' },
                        { val: 'Deep Gut Detox & Bloat Clearance (Ama Pachana)', label: 'ആഴത്തിലുള്ള ഉദര ശുദ്ധീകരണം (ആമ പാചന)', desc: 'ദഹനക്കുറവ് മാറ്റുക, ആമദോഷം നീക്കുക, വയറ്റിലെ ഗ്യാസും അസ്വസ്ഥതയും ഒഴിവാക്കുക' },
                        { val: 'Cellular Longevity & Rejuvenation (Rasayana)', label: 'ശരീരപുഷ്ടിയും ദീർഘായുസ്സും (രസായന)', desc: 'സപ്തധാതുക്കളെ പരിപോഷിപ്പിക്കുക, ചർമ്മ-മുടി ആരോഗ്യം, പ്രതിരോധശേഷി' }
                    ],
                    hi: [
                        { val: 'Fat Loss & Metabolic Reset (Medo Hara)', label: 'वसा कम करना व मेटाबॉलिक रीसेट (मेदोहर)', desc: 'अतिरिक्त चर्बी कम करें, वॉटर रिटेंशन हटाएं और शाम का भोजन हल्का रखें' },
                        { val: 'Blood Nourishment & Vitality (Rakta Vardhaka)', label: 'रक्त पोषण व नई ऊर्जा (रक्तवर्धक)', desc: 'हीमोग्लोबिन बढ़ाएं, दोपहर की थकान दूर करें और ऊर्जा बनाए रखें' },
                        { val: 'Deep Gut Detox & Bloat Clearance (Ama Pachana)', label: 'पेट का गहरा डिटॉक्स व गैस निवारण (आम पाचन)', desc: 'पाचन अग्नि तेज करें, विषाक्त पदार्थ निकालें और पेट का भारीपन दूर करें' },
                        { val: 'Cellular Longevity & Rejuvenation (Rasayana)', label: 'कायाकल्प व दीर्घायु पोषण (रसायन)', desc: 'सातों धातुओं का पोषण, त्वचा व बालों की चमक और प्रतिरोधक क्षमता' }
                    ],
                    ta: [
                        { val: 'Fat Loss & Metabolic Reset (Medo Hara)', label: 'உடல் எடை குறைப்பு & வளர்சிதை மாற்றம் (மேதோஹர)', desc: 'கொழுப்பைக் குறைத்தல், நீர் தேக்கத்தை நீக்குதல், இரவில் எளிய உணவு' },
                        { val: 'Blood Nourishment & Vitality (Rakta Vardhaka)', label: 'ரத்த விருத்தி & புத்துணர்ச்சி (ரக்த வர்தக)', desc: 'ஹீமோகுளோபின் அதிகரிப்பு, மதிய சோர்வு நீக்குதல், உற்சாகம்' },
                        { val: 'Deep Gut Detox & Bloat Clearance (Ama Pachana)', label: 'குடல் நச்சு நீக்கம் & வாயு தீர்வு (ஆம பாச்சன)', desc: 'செரிமானத்தை தூண்டுதல், கழிவுகளை அகற்றுதல், வயிறு உப்புசம் நீக்குதல்' },
                        { val: 'Cellular Longevity & Rejuvenation (Rasayana)', label: 'நீண்ட ஆயுள் & புத்துணர்வு (ரசாயனம்)', desc: '7 தாதுக்களுக்கு ஊட்டமளித்தல், சரும-கூந்தல் பராமரிப்பு, நோய் எதிர்ப்பு சக்தி' }
                    ]
                };
                return lists[this.lang] || lists['en'];
            },

            get dietList() {
                const lists = {
                    en: [
                        { val: 'Pure Vegetarian (Satvik / Plant-focused)', label: 'Pure Vegetarian (Satvik / Plant-focused)', desc: 'Lentils, legumes, whole grains, vegetables, nuts, and cold-pressed oils' },
                        { val: 'Vegetarian with Dairy & Ghee', label: 'Vegetarian with Dairy & Ghee', desc: 'Vegetarian meals enriched with A2 cow ghee, buttermilk, and fresh paneer' },
                        { val: 'Non-Vegetarian / Mixed Diet', label: 'Non-Vegetarian / Mixed Diet', desc: 'Balanced diet incorporating eggs, poultry, fish, or lean broth cooked with turmeric' },
                        { val: 'Vegan (100% Plant-Based)', label: 'Vegan (100% Plant-Based)', desc: 'Exclusively plant foods without any dairy, honey, or animal derivatives' }
                    ],
                    ml: [
                        { val: 'Pure Vegetarian (Satvik / Plant-focused)', label: 'ശുദ്ധ സസ്യാഹാരം (സാത്വികം)', desc: 'ധാന്യങ്ങൾ, പയറുവർഗ്ഗങ്ങൾ, പച്ചക്കറികൾ, നട്സ്, എണ്ണകൾ' },
                        { val: 'Vegetarian with Dairy & Ghee', label: 'നെയ്യും പാലും അടങ്ങിയ സസ്യാഹാരം', desc: 'പശുവിൻ നെയ്യ്, മോര്, പനീർ, പാൽ എന്നിവയോടൊപ്പം ഉള്ള സസ്യാഹാരം' },
                        { val: 'Non-Vegetarian / Mixed Diet', label: 'മിശ്രഭോജനം (നോൺ-വെജിറ്റേറിയൻ)', desc: 'മുട്ട, മത്സ്യം, ചിക്കൻ എന്നിവ മഞ്ഞളും സുഗന്ധവ്യഞ്ജനങ്ങളും ചേർത്ത് തയ്യാറാക്കിയത്' },
                        { val: 'Vegan (100% Plant-Based)', label: 'വീഗൻ (സസ്യജന്യ ആഹാരം മാത്രം)', desc: 'പാലും പാലുൽപ്പന്നങ്ങളും തേനും ഒഴിവാക്കിയുള്ള പൂർണ്ണ സസ്യഭക്ഷണം' }
                    ],
                    hi: [
                        { val: 'Pure Vegetarian (Satvik / Plant-focused)', label: 'शुद्ध शाकाहारी (सात्विक / वनस्पति-आधारित)', desc: 'दालें, साबुत अनाज, हरी सब्जियां, मेवे और शुद्ध तेल' },
                        { val: 'Vegetarian with Dairy & Ghee', label: 'दूध व घी युक्त शाकाहारी', desc: 'देसी गाय का घी, छाछ, पनीर और पौष्टिक शाकाहारी भोजन' },
                        { val: 'Non-Vegetarian / Mixed Diet', label: 'मिश्रित आहार (अंडा/मांसाहार सहित)', desc: 'अंडा, मछली, चिकन आदि को हल्दी व पाचक मसालों के साथ पकाकर' },
                        { val: 'Vegan (100% Plant-Based)', label: 'वीगन (पूर्णतः वनस्पति-आधारित)', desc: 'डेयरी, शहद या किसी भी पशु उत्पाद के बिना शुद्ध पादप आहार' }
                    ],
                    ta: [
                        { val: 'Pure Vegetarian (Satvik / Plant-focused)', label: 'சுத்த சைவ உணவு (சாத்வீகம்)', desc: 'தானியங்கள், பருப்பு வகைகள், காய்கறிகள், நட்ஸ் மற்றும் நல்லெண்ணெய்' },
                        { val: 'Vegetarian with Dairy & Ghee', label: 'பால் & நெய் கலந்த சைவ உணவு', desc: 'பசு நெய், மோர், பனீர் மற்றும் சத்தான காய்கறி உணவுகள்' },
                        { val: 'Non-Vegetarian / Mixed Diet', label: 'அசைவ / கலப்பு உணவு முறை', desc: 'முட்டை, மீன், சிக்கன் போன்றவற்றை மஞ்சள் மற்றும் மசாலாவுடன் சேர்த்து' },
                        { val: 'Vegan (100% Plant-Based)', label: 'வீகன் (முழு தாவர உணவு)', desc: 'பால், தேன் போன்ற எந்த விலங்கு பொருட்களும் இல்லாத உணவு' }
                    ]
                };
                return lists[this.lang] || lists['en'];
            },

            get digestionList() {
                const lists = {
                    en: [
                        { val: 'Manda', label: 'Heavy, Sleepy & Sluggish (Slow Agni)', desc: 'Food feels like it sits in the stomach forever; feel drowsy or sluggish; metabolism is slow.' },
                        { val: 'Tikshna', label: 'Acidic, Hot or Quick Hunger (Sharp Agni)', desc: 'Digest quickly but often experience acid reflux, sour burps, or get hungry again very soon.' },
                        { val: 'Vishama', label: 'Bloated, Gassy & Distended (Irregular Agni)', desc: 'Stomach expands like a balloon; frequent gas, gurgling noises, or unpredictable bowel movements.' },
                        { val: 'Sama', label: 'Light & Clear Energy (Balanced Agni)', desc: 'Smooth digestion without gas or heaviness; consistent energy throughout the afternoon.' }
                    ],
                    ml: [
                        { val: 'Manda', label: 'ഭാരവും ഉറക്കത്തൂക്കവും (മന്ദാഗ്നി - Manda Agni)', desc: 'ഭക്ഷണം കഴിച്ചാൽ ദഹിക്കാൻ വളരെ സമയമെടുക്കുന്നു; അലസത, മന്ദത, സാവധാനമുള്ള ദഹനം.' },
                        { val: 'Tikshna', label: 'അസിഡിറ്റിയും നെഞ്ചെരിച്ചിലും (തീക്ഷ്ണാഗ്നി - Tikshna Agni)', desc: 'പെട്ടെന്ന് ദഹിക്കുന്നു, എങ്കിലും പുളിച്ചുതികട്ടൽ, നെഞ്ചെരിച്ചിൽ, പെട്ടെന്ന് വിശപ്പ് വരുന്നു.' },
                        { val: 'Vishama', label: 'വയറു വീർക്കലും ഗ്യാസും (വിഷമാഗ്നി - Vishama Agni)', desc: 'വയർ വീർത്തുനിൽക്കുന്നു; ഗ്യാസ്, വയറ്റിൽ ശബ്ദം, അസ്ഥിരമായ മലശോധന.' },
                        { val: 'Sama', label: 'ലഘുത്വവും സംതുലിത ഊർജ്ജവും (സമാഗ്നി - Sama Agni)', desc: 'ഗ്യാസോ ഭാരമോ ഇല്ലാതെ സുഖകരമായ ദഹനം; ഉച്ചയ്ക്കും നിലനിൽക്കുന്ന ഉന്മേഷം.' }
                    ],
                    hi: [
                        { val: 'Manda', label: 'भारीपन, आलस्य व सुस्ती (मंदाग्नि)', desc: 'भोजन पचने में बहुत समय लगता है; सुस्ती महसूस होती है और मेटाबॉलिज्म धीमा रहता है।' },
                        { val: 'Tikshna', label: 'एसिडिटी, जलन व जल्दी भूख (तीक्ष्णाग्नि)', desc: 'जल्दी पचता है परंतु खट्टी डकारें, सीने में जलन और तुरंत दोबारा भूख लग जाती है।' },
                        { val: 'Vishama', label: 'पेट फूलना, गैस व भारीपन (विषमाग्नि)', desc: 'पेट गुब्बारे की तरह फूल जाता है; अत्यधिक गैस और अनिश्चित पेट साफ होना।' },
                        { val: 'Sama', label: 'हल्कापन व निरंतर ऊर्जा (समाग्नि)', desc: 'बिना गैस या भारीपन के सहज पाचन; दोपहर में भी ऊर्जावान महसूस होना।' }
                    ],
                    ta: [
                        { val: 'Manda', label: 'மந்தம், தூக்கம் & சோர்வு (மந்தாக்னி)', desc: 'உணவு செரிக்க அதிக நேரம் எடுக்கிறது; மந்தமான உணர்வு மற்றும் மெதுவான வளர்சிதை மாற்றம்.' },
                        { val: 'Tikshna', label: 'அசிடிட்டி & விரைவில் பசி (தீக்ஷ்ணாக்னி)', desc: 'விரைவில் செரிக்கும், ஆனால் நெஞ்செரிச்சல், புளித்த ஏப்பம் மற்றும் மீண்டும் விரைவில் பசி.' },
                        { val: 'Vishama', label: 'வயிறு உப்புசம் & வாயுத்தொல்லை (விஷமாக்னி)', desc: 'வயிறு பலூன் போல் உப்புகிறது; அடிக்கடி வாயு பிரிதல் மற்றும் சீரற்ற மலம் கழித்தல்.' },
                        { val: 'Sama', label: 'சுறுசுறுப்பு & சீரான ஆற்றல் (சமாக்னி)', desc: 'எவ்வித வாயுவோ பாரமோ இன்றி சீரான செரிமானம்; பகல் முழுவதும் நீடிக்கும் புத்துணர்ச்சி.' }
                    ]
                };
                return lists[this.lang] || lists['en'];
            },

            get sensitivityList() {
                const lists = {
                    en: [
                        { key: 'sugar', label: 'Sugar & Carbohydrate Cravings', desc: 'Intense urge for sweet snacks, biscuits, or tea between 3 PM and 6 PM.' },
                        { key: 'fatigue', label: 'Post-Meal Brain Fog & Afternoon Energy Crash', desc: 'Mental exhaustion and lack of focus following lunch; reliance on caffeine to keep working.' },
                        { key: 'bowels', label: 'Constipation or Incomplete Morning Evacuation', desc: 'Straining, hard dry stools, or needing multiple attempts before feeling cleared out.' },
                        { key: 'bloat', label: 'Water Retention or Morning Puffiness', desc: 'Puffiness under eyes, heavy limbs, or tight rings in fingers upon waking.' }
                    ],
                    ml: [
                        { key: 'sugar', label: 'മധുരത്തോടും പലഹാരങ്ങളോടുമുള്ള ആസക്തി', desc: 'വൈകുന്നേരം 3 മണിക്കും 6 മണിക്കും ഇടയിൽ മധുരപലഹാരങ്ങളോ ചായയോ കഴിക്കാനുള്ള അമിതമായ ആഗ്രഹം.' },
                        { key: 'fatigue', label: 'ഭക്ഷണത്തിന് ശേഷമുള്ള ക്ഷീണവും ഉന്മേഷക്കുറവും', desc: 'ഉച്ചഭക്ഷണത്തിന് ശേഷം ശ്രദ്ധ കേന്ദ്രീകരിക്കാൻ ബുദ്ധിമുട്ട്; ജോലി ചെയ്യാൻ ചായയോ കാപ്പിയോ വേണമെന്ന അവസ്ഥ.' },
                        { key: 'bowels', label: 'മലബന്ധം അല്ലെങ്കിൽ അപൂർണ്ണമായ ശോധന', desc: 'രാവിലെ ശോധന സുഗമമല്ലാതെ വരിക, കഠിനമായ മലം, അല്ലെങ്കിൽ പലതവണ പോകേണ്ടിവരിക.' },
                        { key: 'bloat', label: 'ശരീരത്തിൽ നീർക്കെട്ട് അല്ലെങ്കിൽ രാവിലെ മുഖത്തെ വീക്കം', desc: 'രാവിലെ ഉണരുമ്പോൾ കണ്ണിന് താഴെ വീക്കം, കൈകാലുകളിൽ ഭാരം, വിരലുകളിൽ മോതിരം ഇറുകുക.' }
                    ],
                    hi: [
                        { key: 'sugar', label: 'मीठा व कार्बोहाइड्रेट खाने की तीव्र इच्छा', desc: 'दोपहर 3 से 6 बजे के बीच चाय, बिस्कुट या मीठी चीजें खाने की तीव्र लालसा।' },
                        { key: 'fatigue', label: 'भोजन के बाद सुस्ती व दोपहर की थकान', desc: 'दोपहर के भोजन के बाद मानसिक थकान; काम जारी रखने के लिए चाय/कॉफी पर निर्भरता।' },
                        { key: 'bowels', label: 'कब्ज या सुबह पेट पूरी तरह साफ न होना', desc: 'कड़ा मल, पेट साफ होने में कठिनाई या बार-बार शौचालय जाने की आवश्यकता।' },
                        { key: 'bloat', label: 'शरीर में सूजन या सुबह चेहरे पर भारीपन', desc: 'सुबह उठने पर आंखों के नीचे सूजन, भारी पैर या उंगलियों में अंगूठी तंग होना।' }
                    ],
                    ta: [
                        { key: 'sugar', label: 'இனிப்பு & மாவுச்சத்து உணவுகளுக்கான தீவிர ஆசை', desc: 'மாலை 3 முதல் 6 மணிக்குள் இனிப்பு தின்பண்டங்கள் அல்லது டீ குடிக்கும் தீவிர ஆசை.' },
                        { key: 'fatigue', label: 'உணவுக்குப் பின் மந்தம் & மதிய சோர்வு', desc: 'மதிய உணவுக்குப் பின் கவனக்குறைவு; வேலை செய்ய டீ/காபியை நம்பியிருக்கும் நிலை.' },
                        { key: 'bowels', label: 'மலச்சிக்கல் அல்லது முழுமையற்ற மலம் கழித்தல்', desc: 'மலம் கழிக்க சிரமப்படுதல் அல்லது வயிறு முழுமையாக சுத்தமாகாத உணர்வு.' },
                        { key: 'bloat', label: 'உடலில் நீர் தேக்கம் அல்லது காலையில் முக வீக்கம்', desc: 'காலையில் எழும்போது கண்களுக்குக் கீழ் வீக்கம், கால்கள் பாரமாக இருத்தல்.' }
                    ]
                };
                return lists[this.lang] || lists['en'];
            },

            startQuiz() {
                this.step = 1;
                this.scrollToTop();
            },

            scrollToTop() {
                const el = document.getElementById('diet-plan-test');
                if (el) {
                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            },

            toggleSensitivity(val) {
                const idx = this.answers.sensitivities.indexOf(val);
                if (idx > -1) {
                    this.answers.sensitivities.splice(idx, 1);
                } else {
                    this.answers.sensitivities.push(val);
                }
            },

            clearSensitivities() {
                this.answers.sensitivities = [];
                this.nextStep();
            },

            get stepCategory() {
                const map = {
                    en: ['Introduction', 'Profile: Full Name', 'Profile: Gender', 'Profile: Age Group', 'Contact: WhatsApp', 'Objective: Dietary Goal', 'Preference: Food Pattern', 'Digestion: Post-Meal Agni', 'Symptoms: Daily Sensitivities'],
                    ml: ['ആമുഖം', 'വിവരങ്ങൾ: പേര്', 'വിവരങ്ങൾ: ലിംഗം', 'വിവരങ്ങൾ: പ്രായപരിധി', 'ബന്ധപ്പെടാൻ: വാട്സാപ്പ്', 'ലക്ഷ്യം: ഭക്ഷണ ലക്ഷ്യം', 'ശൈലി: ഭക്ഷണ രീതി', 'ദഹനം: ദഹനാഗ്നി', 'ലക്ഷണങ്ങൾ: അസ്വസ്ഥതകൾ'],
                    hi: ['परिचय', 'विवरण: पूरा नाम', 'विवरण: लिंग', 'विवरण: आयु वर्ग', 'संपर्क: व्हाट्सएप', 'लक्ष्य: आहार उद्देश्य', 'प्राथमिकता: भोजन शैली', 'पाचन: पाचन अग्नि', 'लक्षण: दैनिक संवेदनशीलता'],
                    ta: ['அறிமுகம்', 'விவரம்: முழு பெயர்', 'விவரம்: பாலினம்', 'விவரம்: வயது வரம்பு', 'தொடர்பு: வாட்ஸ்அப்', 'நோக்கம்: உணவு குறிக்கோள்', 'விருப்பம்: உணவு முறை', 'செரிமானம்: அக்னி ஆய்வு', 'அறிகுறிகள்: தினசரி பாதிப்புகள்']
                };
                let list = map[this.lang] || map['en'];
                return list[this.step] || list[0];
            },

            get canProceed() {
                if (this.step === 1) return this.profile.name.trim().length >= 2;
                if (this.step === 2) return this.profile.gender !== '';
                if (this.step === 3) return this.profile.ageGroup !== '';
                if (this.step === 4) return this.profile.phone.replace(/[^0-9]/g, '').length >= 10;
                if (this.step === 5) return this.answers.goal !== '';
                if (this.step === 6) return this.answers.diet !== '';
                if (this.step === 7) return this.answers.digestion !== '';
                if (this.step === 8) return true; // Optional checklist
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
                this.answers = { goal: '', diet: '', digestion: '', sensitivities: [] };
                this.scrollToTop();
            },

            get genderLabel() {
                if (this.profile.gender === 'Female') return this.t('gender_female');
                if (this.profile.gender === 'Male') return this.t('gender_male');
                if (this.profile.gender === 'Other') return this.t('gender_other');
                return this.profile.gender;
            },

            get ageGroupLabel() {
                const found = this.ageGroupList.find(i => i.val === this.profile.ageGroup);
                return found ? found.label : this.profile.ageGroup;
            },

            get goalLabel() {
                const found = this.goalList.find(i => i.val === this.answers.goal);
                return found ? found.label : this.answers.goal;
            },

            get digestionLabel() {
                if (this.lang === 'ml') {
                    if (this.answers.digestion === 'Tikshna') return 'തീക്ഷ്ണാഗ്നി (പിത്തം / Tikshna Agni)';
                    if (this.answers.digestion === 'Manda') return 'മന്ദാഗ്നി (കഫം / Manda Agni)';
                    if (this.answers.digestion === 'Vishama') return 'വിഷമാഗ്നി (വാതം / Vishama Agni)';
                    return 'സമാഗ്നി (സംതുലിതം / Sama Agni)';
                }
                if (this.lang === 'hi') {
                    if (this.answers.digestion === 'Tikshna') return 'तीक्ष्णाग्नि (पित्त / Tikshna Agni)';
                    if (this.answers.digestion === 'Manda') return 'मंदाग्नि (कफ / Manda Agni)';
                    if (this.answers.digestion === 'Vishama') return 'विषमाग्नि (वात / Vishama Agni)';
                    return 'समाग्नि (संतुलित / Sama Agni)';
                }
                if (this.lang === 'ta') {
                    if (this.answers.digestion === 'Tikshna') return 'தீக்ஷ்ணாக்னி (பித்தம் / Tikshna Agni)';
                    if (this.answers.digestion === 'Manda') return 'மந்தாக்னி (கபம் / Manda Agni)';
                    if (this.answers.digestion === 'Vishama') return 'விஷமாக்னி (வாதம் / Vishama Agni)';
                    return 'சமாக்னி (சமநிலை / Sama Agni)';
                }
                if (this.answers.digestion === 'Tikshna') return 'Tikshna Agni (Sharp / Pitta)';
                if (this.answers.digestion === 'Manda') return 'Manda Agni (Slow / Kapha)';
                if (this.answers.digestion === 'Vishama') return 'Vishama Agni (Irregular / Vata)';
                return 'Sama Agni (Balanced)';
            },

            get blueprint() {
                if (this.lang === 'ml') {
                    let morning = 'ജീരകം, മല്ലി, പെരുംജീരകം എന്നിവയിട്ട് തിളപ്പിച്ച ചെറുചൂടുവെള്ളം കുടിച്ച് പ്രഭാതത്തിലെ ദഹനാഗ്നി സുഖകരമായി ഉണർത്തുക.';
                    let lunch = 'ചെറുചൂടുള്ള അന്നജം (തവിടുള്ള അരി അല്ലെങ്കിൽ മില്ലറ്റുകൾ), വേവിച്ച പച്ചക്കറികൾ, പരിപ്പ് കറി, ദഹനത്തിന് സഹായിക്കുന്ന ചേരുവകൾ.';
                    let dinner = 'രാത്രി 7:30 ന് മുൻപായി ലഘുവായ ചെറുചൂടുള്ള സൂപ്പോ പയർ സൂപ്പോ കുടിക്കുക. ഇത് ദഹനത്തിന് ആയാസം കുറയ്ക്കുന്നു.';

                    if (this.answers.digestion === 'Manda') {
                        morning = 'ഇഞ്ചി ചതച്ചിട്ട് തിളപ്പിച്ച വെള്ളത്തിൽ ഒരു സ്പൂൺ തേൻ ചേർത്ത് കുടിക്കുക; ശരീരത്തിലെ കഫക്കെട്ടും മന്ദതയും നീക്കാൻ സഹായിക്കുന്നു.';
                        lunch = 'നാരുകൾ അടങ്ങിയ മില്ലറ്റുകൾ/കുത്തരി, കുരുമുളകും കടുക് വറുത്തതും ചേർത്ത ഇലക്കറികൾ.';
                        dinner = 'ജീരകവും ഇഞ്ചിയും ചേർത്ത ചൂടുള്ള റാഗി മില്ലറ്റ് പച്ചക്കറി സൂപ്പ്. രാത്രി തൈരോ മധുരപലഹാരങ്ങളോ പാൽക്കട്ടികളോ ഒഴിവാക്കുക.';
                    } else if (this.answers.digestion === 'Tikshna') {
                        morning = 'തലേദിവസം രാത്രി കുതിർത്ത മല്ലിവെള്ളം അല്ലെങ്കിൽ നെല്ലിക്കാനീര്. എരിവും പുളിയും ഉള്ളവ പ്രഭാതത്തിൽ ഒഴിവാക്കുക.';
                        lunch = 'തണുപ്പുള്ളതും ആശ്വാസകരവുമായ ഉച്ചഭക്ഷണം: ചോറ്, കുമ്പളങ്ങ/മത്തങ്ങ കറി, ചെറുപയർ പരിപ്പ്, അല്പം പശുവിൻ നെയ്യ്.';
                        dinner = 'മല്ലിയും പെരുംജീരകവും ചേർത്ത ലഘുവായ വെജിറ്റബിൾ കിച്ചടി. തക്കാളി, വിനാഗിരി, എരിവുള്ള മുളകുകൾ എന്നിവ രാത്രി ഒഴിവാക്കുക.';
                    } else if (this.answers.digestion === 'Vishama') {
                        morning = 'ചെറുചൂടുവെള്ളത്തിൽ ഒരു നുള്ള് ഇന്തുപ്പും അര സ്പൂൺ നെയ്യും ചേർത്ത് കുടിക്കുക; വാതദോഷം കുറയ്ക്കാനും സുഖശോധനയ്ക്കും ഉത്തമം.';
                        lunch = 'നെയ്യ് ചേർത്ത ചോറ്, കാരറ്റ്, ചെറുപയർ പരിപ്പ് എന്നിവ അടങ്ങിയ ചെറുചൂടുള്ള ഈർപ്പമുള്ള ആഹാരം.';
                        dinner = 'കായവും അയമോദകവും ചേർത്ത ചൂടുള്ള കഞ്ഞി അല്ലെങ്കിൽ ലഘുവായ സൂപ്പ്. രാത്രിയിലെ ഗ്യാസ് ശല്യം പൂർണ്ണമായും തടയുന്നു.';
                    }

                    if (this.answers.diet.includes('Non-Vegetarian') && !this.answers.goal.includes('Detox')) {
                        lunch += ' (മഞ്ഞളും കുരുമുളകും ചേർത്ത് വേവിച്ച മീൻകറിയോ സൂപ്പോ ഉൾപ്പെടുത്താം).';
                    }
                    return { morning, lunch, dinner };
                }

                if (this.lang === 'hi') {
                    let morning = 'जीरा, धनिया और सौंफ के बीजों से बना गुनगुना पानी पीकर सुबह की पाचन अग्नि को सहजता से प्रज्वलित करें।';
                    let lunch = 'गर्म, ताजा पकाया हुआ मौसमी अनाज (बाजरा/चावल), उबली हुई सब्जियां, पीली दाल और पाचक जड़ी-बूटियां।';
                    let dinner = 'शाम 7:30 बजे से पहले हल्का गर्म सूप या दाल का पानी, जिससे रात को पेट पूरी तरह हल्का रहे।';

                    if (this.answers.digestion === 'Manda') {
                        morning = 'ताजा अदरक और दालचीनी का गुनगुना काढ़ा, एक चम्मच शहद के साथ; चयापचय सुस्ती (आम पाचन) दूर करने के लिए।';
                        lunch = 'उच्च फाइबर युक्त अनाज (मिलेट्स/ब्राउन राइस), काली मिर्च व राई से तड़के वाली हरी सब्जियां।';
                        dinner = 'जीरा और अदरक से बना गर्म रागी मिलेट वेजिटेबल सूप। रात में दही, भारी पनीर या मिठाई से बचें।';
                    } else if (this.answers.digestion === 'Tikshna') {
                        morning = 'रात भर भिगोया हुआ धनिए का पानी या ताजा आंवला रस। कड़वे नींबू या तेज मसालों से बचें।';
                        lunch = 'शीतल व सुखदायक भोजन: लाल चावल, लौकी/कद्दू, पकी हुई मूंग दाल और शुद्ध देसी गाय का घी।';
                        dinner = 'धनिया और सौंफ के साथ पकी हुई हल्की खिचड़ी। टमाटर, सिरका, तीखी मिर्च व तले भोजन से बचें।';
                    } else if (this.answers.digestion === 'Vishama') {
                        morning = 'एक चुटकी सेंधा नमक और आधा चम्मच घी मिला गुनगुना पानी; अनियमित वात को शांत करने और कब्ज दूर करने के लिए।';
                        lunch = 'गर्म व सुपाच्य भोजन: मूंग दाल, गाजर और जीरे व घी से बने चावल।';
                        dinner = 'हींग और अजवायन के तड़के वाला गर्म दलिया या हल्का सूप, जिससे शाम को गैस न बने।';
                    }

                    if (this.answers.diet.includes('Non-Vegetarian') && !this.answers.goal.includes('Detox')) {
                        lunch += ' (हल्दी के साथ उबली हुई मछली या हल्का शोरबा शामिल कर सकते हैं)।';
                    }
                    return { morning, lunch, dinner };
                }

                if (this.lang === 'ta') {
                    let morning = 'சீரகம், மல்லி, சோம்பு கலந்த வெதுவெதுப்பான நீரைக் குடித்து காலை செரிமான அக்னியைத் தூண்டவும்.';
                    let lunch = 'பருவகால தானியங்கள், வேகவைத்த காய்கறிகள், பாசிப்பருப்பு மற்றும் செரிமான மூலிகைகள் கலந்த சத்தான உணவு.';
                    let dinner = 'இரவு 7:30 மணிக்குள் லேசான வெதுவெதுப்பான சூப் அல்லது பருப்பு ரசம்; இரவில் நிம்மதியான தூக்கத்திற்கு வழிவகுக்கும்.';

                    if (this.answers.digestion === 'Manda') {
                        morning = 'இஞ்சி, இலவங்கப்பட்டை கலந்த வெதுவெதுப்பான நீரில் ஒரு தேக்கரண்டி தேன் சேர்த்து குடிக்கவும்; மந்தமான செரிமானத்தை நீக்கும்.';
                        lunch = 'நார்ச்சத்து நிறைந்த சிறுதானியங்கள், மிளகு மற்றும் கடுகு தாளித்த கீரைகள்.';
                        dinner = 'சீரகம் மற்றும் இஞ்சி சேர்த்த சூடான ராகி வெஜிடபிள் சூப். இரவில் தயிர், இனிப்பு வகைகளைத் தவிர்க்கவும்.';
                    } else if (this.answers.digestion === 'Tikshna') {
                        morning = 'இரவில் ஊறவைத்த கொத்தமல்லி நீர் அல்லது நெல்லிக்காய் சாறு. அதிக காரம்/புளியைத் தவிர்க்கவும்.';
                        lunch = 'குளிர்ச்சியூட்டும் உணவு: புழுங்கல் அரிசி, பூசணிக்காய், பாசிப்பருப்பு மற்றும் தூய பசு நெய்.';
                        dinner = 'கொத்தமல்லி மற்றும் சோம்பு சேர்த்த எளிய வெஜிடபிள் கிச்சடி. தக்காளி, வினிகர், அதிக காரத்தைத் தவிர்க்கவும்.';
                    } else if (this.answers.digestion === 'Vishama') {
                        morning = 'வெதுவெதுப்பான நீரில் ஒரு சிட்டிகை இந்துப்பு மற்றும் அரை ஸ்பூன் நெய்; வாத அமைதியையும் காலை சுக மலக்கழிப்பையும் தரும்.';
                        lunch = 'பாசிப்பருப்பு, கேரட் மற்றும் நெய் தாளித்த சீரக சாதம் அடங்கிய சூடான உணவு.';
                        dinner = 'பெருங்காயம் மற்றும் ஓமம் தாளித்த சூடான கஞ்சி அல்லது சூப்; இரவு வாயுத்தொல்லையை முற்றிலுமாகத் தடுக்கும்.';
                    }

                    if (this.answers.diet.includes('Non-Vegetarian') && !this.answers.goal.includes('Detox')) {
                        lunch += ' (மஞ்சள் சேர்த்து சமைத்த மீன் அல்லது சூப் சேர்த்துக் கொள்ளலாம்).';
                    }
                    return { morning, lunch, dinner };
                }

                // Default English
                let morning = 'Warm water infused with cumin, coriander, and fennel (CCF) seeds to ignite morning digestive flame smoothly.';
                let lunch = 'Warm, freshly cooked seasonal grain bowl with steamed vegetables, yellow dal, and cooling digestive herbs.';
                let dinner = 'Light warm soup or well-spiced lentil broth before 7:30 PM to allow complete gut clearance before sleep.';

                if (this.answers.digestion === 'Manda') {
                    morning = 'Warm water with freshly crushed ginger, cinnamon, and a teaspoon of honey to dissolve metabolic sluggishness (Ama Pachana).';
                    lunch = 'High-fiber spiced grains (millets/brown rice) seasoned with black pepper, mustard seeds, and sautéed greens.';
                    dinner = 'Hot Ragi Millet vegetable soup spiced with cumin and ginger. Avoid dairy, heavy curd, or desserts at night.';
                } else if (this.answers.digestion === 'Tikshna') {
                    morning = 'Room-temperature water steeped with overnight coriander seeds or fresh amla juice. Avoid harsh lemon/spices.';
                    lunch = 'Soothing lunch: red rice, steamed zucchini, sweet pumpkin, cooked green moong dal, and a drizzle of pure A2 cow ghee.';
                    dinner = 'Mild vegetable khichdi cooked with coriander and fennel seeds. Avoid tomatoes, vinegar, chilies, and fried foods.';
                } else if (this.answers.digestion === 'Vishama') {
                    morning = 'Warm water with a pinch of Himalayan pink salt and 1/2 tsp ghee to ground erratic Vata and eliminate dry bowel inertia.';
                    lunch = 'Warm, moist, soupy meal with easily digested lentils (split moong), carrots, and cumin-tempered rice with ghee.';
                    dinner = 'Soothing warm porridge or light soup seasoned with hing (asafoetida) and ajwain to completely prevent evening gas.';
                }

                if (this.answers.diet.includes('Non-Vegetarian') && !this.answers.goal.includes('Detox')) {
                    lunch += ' (May include lightly spiced clear bone broth or steamed fish cooked with fresh turmeric).';
                }

                return { morning, lunch, dinner };
            },

            get whatsappLink() {
                const phone = "917736609299";
                let text = '';

                if (this.lang === 'ml') {
                    text = `🌿 *യുവൻ ക്ലിനിക്കൽ റിപ്പോർട്ട്: ആയുർവേദ ഭക്ഷണക്രമം (DIET BLUEPRINT)*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *വ്യക്തി:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *ലിംഗം:* ${this.genderLabel || 'സൂചിപ്പിച്ചിട്ടില്ല'} | *പ്രായം:* ${this.ageGroupLabel || 'സൂചിപ്പിച്ചിട്ടില്ല'}\n`;
                    text += `📱 *വാട്സാപ്പ്:* +91 ${this.profile.phone || ''}\n\n`;

                    text += `🎯 *ലക്ഷ്യം:* ${this.goalLabel}\n`;
                    text += `🥗 *ഭക്ഷണ ശൈലി:* ${this.answers.diet}\n`;
                    text += `🔥 *ദഹന ശേഷി:* ${this.digestionLabel}\n\n`;

                    text += `📋 *3-ഘട്ട പ്രതിദിന ഭക്ഷണക്രമം:*\n`;
                    text += `• *പ്രഭാതം (6:30-8 AM):* ${this.blueprint.morning}\n`;
                    text += `• *ഉച്ചയൂണ് (12:30-1:30 PM):* ${this.blueprint.lunch}\n`;
                    text += `• *അത്താഴം (7-7:45 PM):* ${this.blueprint.dinner}\n\n`;

                    text += `🛒 *ഔദ്യോഗിക യുവൻ ഉൽപ്പന്നങ്ങൾ:*\nhttps://yuvann.com/products\n\n`;
                    text += `നമസ്കാരം ഡോ. സജീവ് ദേവ്, ദയവായി എന്റെ ഡയറ്റ് പ്ലാൻ പരിശോധിച്ച് 7 ദിവസത്തെ സമ്പൂർണ്ണ ഡയറ്റ് ചാർട്ടും നിർദ്ദേശങ്ങളും അയച്ചുതരിക!`;
                } else if (this.lang === 'hi') {
                    text = `🌿 *युवान क्लीनिकल रिपोर्ट: आयुर्वेदिक आहार योजना (DIET BLUEPRINT)*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *मरीज:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *लिंग:* ${this.genderLabel || 'अनिर्दिष्ट'} | *आयु वर्ग:* ${this.ageGroupLabel || 'अनिर्दिष्ट'}\n`;
                    text += `📱 *व्हाट्सएप:* +91 ${this.profile.phone || ''}\n\n`;

                    text += `🎯 *प्राथमिक लक्ष्य:* ${this.goalLabel}\n`;
                    text += `🥗 *आहार प्राथमिकता:* ${this.answers.diet}\n`;
                    text += `🔥 *पाचन अग्नि:* ${this.digestionLabel}\n\n`;

                    text += `📋 *3-चरणीय दैनिक भोजन योजना:*\n`;
                    text += `• *सुबह (6:30-8 AM):* ${this.blueprint.morning}\n`;
                    text += `• *दोपहर (12:30-1:30 PM):* ${this.blueprint.lunch}\n`;
                    text += `• *रात का खाना (7-7:45 PM):* ${this.blueprint.dinner}\n\n`;

                    text += `🛒 *युवान आयुर्वेदिक स्टोर:*\nhttps://yuvann.com/products\n\n`;
                    text += `नमस्ते डॉ. सजीव देव, कृपया मेरी भोजन योजना की समीक्षा करें और मुझे पूरा 7-दिवसीय डाइट चार्ट और उत्पाद मार्गदर्शन भेजें!`;
                } else if (this.lang === 'ta') {
                    text = `🌿 *யுவான் மருத்துவ அறிக்கை: ஆயுர்வேத உணவு முறை (DIET BLUEPRINT)*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *நோயாளி:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *பாலினம்:* ${this.genderLabel || 'குறிப்பிடப்படவில்லை'} | *வயது:* ${this.ageGroupLabel || 'குறிப்பிடப்படவில்லை'}\n`;
                    text += `📱 *வாட்ஸ்அப்:* +91 ${this.profile.phone || ''}\n\n`;

                    text += `🎯 *முக்கிய நோக்கம்:* ${this.goalLabel}\n`;
                    text += `🥗 *உணவு பழக்கம்:* ${this.answers.diet}\n`;
                    text += `🔥 *செரிமான அக்னி:* ${this.digestionLabel}\n\n`;

                    text += `📋 *3-கட்ட தினசரி உணவு வழிகாட்டி:*\n`;
                    text += `• *காலை (6:30-8 AM):* ${this.blueprint.morning}\n`;
                    text += `• *மதியம் (12:30-1:30 PM):* ${this.blueprint.lunch}\n`;
                    text += `• *இரவு (7-7:45 PM):* ${this.blueprint.dinner}\n\n`;

                    text += `🛒 *யுவான் பொருட்கள் கடை:*\nhttps://yuvann.com/products\n\n`;
                    text += `வணக்கம் டாக்டர் சஜீவ் தேவ், எனது உணவு வழிகாட்டியைப் பரிசீலித்து, முழுமையான 7 நாள் உணவு பட்டியலையும் வழிகாட்டுதலையும் அனுப்பவும்!`;
                } else {
                    text = `🌿 *YUVANN CLINICAL REPORT: AYURVEDIC DIET BLUEPRINT*\n`;
                    text += `----------------------------------------\n`;
                    text += `👤 *Patient:* ${this.profile.name || 'Anonymous'}\n`;
                    text += `⚧ *Gender:* ${this.profile.gender || 'Not specified'} | *Age Group:* ${this.profile.ageGroup || 'Not specified'}\n`;
                    text += `📱 *WhatsApp:* +91 ${this.profile.phone || ''}\n\n`;

                    text += `🎯 *Therapeutic Goal:* ${this.answers.goal}\n`;
                    text += `🥗 *Diet Preference:* ${this.answers.diet}\n`;
                    text += `🔥 *Digestive Agni:* ${this.digestionLabel}\n\n`;

                    text += `📋 *3-Phase Daily Blueprint:*\n`;
                    text += `• *Morning (6:30-8 AM):* ${this.blueprint.morning}\n`;
                    text += `• *Midday Lunch (12:30-1:30 PM):* ${this.blueprint.lunch}\n`;
                    text += `• *Sunset Dinner (7-7:45 PM):* ${this.blueprint.dinner}\n\n`;

                    text += `🛒 *Official Yuvann Shop Collection:*\nhttps://yuvann.com/products\n\n`;
                    text += `Hello Dr. Sajeev Dev, please review my meal blueprint and send me the complete 7-Day Personalized Diet Chart and product dosage instructions!`;
                }

                return `https://wa.me/${phone}?text=${encodeURIComponent(text)}`;
            }
        }
    }
</script>
