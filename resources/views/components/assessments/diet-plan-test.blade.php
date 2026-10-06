<section id="diet-plan-test" class="py-16 md:py-20 bg-brand-green-900 relative text-white overflow-hidden">
    <!-- Background atmospheric glow -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-emerald-800/30 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 right-0 w-80 h-80 bg-brand-gold-900/30 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center mb-8">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider text-brand-gold-400 bg-brand-gold-400/15 uppercase mb-2.5 border border-brand-gold-400/30">
                Ayurvedic Nutrition Science
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-white">Ayurvedic Diet Plan & Meal Blueprint</h2>
            <p class="text-sm sm:text-base text-brand-green-100/80 max-w-xl mx-auto mt-2">
                A structured nutritional screening by Dr. Sajeev Dev to construct your personalized daily meal blueprint based on your Agni, Dosha, and metabolic goals.
            </p>
        </div>

        <div x-data="dietPlanFinder()" class="bg-brand-green-800/95 backdrop-blur-md rounded-3xl shadow-2xl p-5 sm:p-8 md:p-10 border border-brand-green-700/80 relative overflow-hidden" x-cloak>
            
            <!-- Step 0: Intro Screen -->
            <div x-show="step === 0" class="text-center py-4 sm:py-6">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-brand-gold-400/10 text-brand-gold-400 rounded-2xl flex items-center justify-center mx-auto mb-5 border border-brand-gold-400/30 shadow-sm">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-serif font-bold text-white mb-3">Unlock Your Custom Ayurvedic Daily Meal Blueprint</h3>
                <p class="text-sm sm:text-base text-brand-green-100/90 max-w-lg mx-auto mb-8 leading-relaxed">
                    Food is medicine (Ahar Kalpana) when matched to your unique digestive fire. Answer a few brief lifestyle questions one screen at a time to discover your optimal breakfast, lunch, and dinner routine, formatted for your WhatsApp.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 max-w-xl mx-auto mb-8 text-left">
                    <div class="p-3.5 rounded-xl bg-brand-green-900/60 border border-brand-green-700">
                        <span class="text-lg block mb-1">⏱️</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-brand-gold-300">Takes 2 Minutes</h4>
                        <p class="text-[11px] text-brand-green-100/70 mt-0.5">Focused single-question progression.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-brand-green-900/60 border border-brand-green-700">
                        <span class="text-lg block mb-1">📲</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-brand-gold-300">WhatsApp Chart</h4>
                        <p class="text-[11px] text-brand-green-100/70 mt-0.5">Receive your custom 7-day chart directly.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-brand-green-900/60 border border-brand-green-700">
                        <span class="text-lg block mb-1">🌿</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-brand-gold-300">Doctor-Guided</h4>
                        <p class="text-[11px] text-brand-green-100/70 mt-0.5">Curated by Dr. Sajeev Dev.</p>
                    </div>
                </div>

                <button type="button" 
                        @click="startQuiz()" 
                        class="inline-flex items-center justify-center px-8 sm:px-10 py-3.5 sm:py-4 text-base font-bold text-brand-green-950 bg-brand-gold-400 hover:bg-brand-gold-300 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5 cursor-pointer gap-2">
                    <span>Begin Diet Assessment</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

            <!-- Quiz Stepper Header (Steps 1 to 8) -->
            <div x-show="step >= 1 && step <= 8" class="mb-6">
                <div class="flex items-center justify-between text-xs font-semibold text-brand-green-200 mb-2">
                    <span class="text-brand-gold-400 uppercase tracking-wider font-bold" x-text="stepCategory"></span>
                    <span class="font-bold text-white" x-text="`Step ${step} of 8`"></span>
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
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30">Step 1 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug">
                        1. What is your full name?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1">To personalize your custom meal blueprint and official doctor consultation:</p>
                </div>

                <div class="space-y-4">
                    <div class="relative">
                        <input type="text" 
                               x-model.trim="profile.name" 
                               @keydown.enter.prevent="if (canProceed) nextStep()"
                               autofocus
                               placeholder="e.g. Priya Sharma"
                               class="w-full bg-brand-green-900/90 border-2 border-brand-green-600 rounded-2xl px-5 py-4 text-base focus:outline-none focus:border-brand-gold-400 focus:ring-4 focus:ring-brand-gold-400/20 text-white shadow-2xs font-medium placeholder:text-brand-green-300/50">
                    </div>
                    <p class="text-xs text-brand-green-200 flex items-center gap-1.5">
                        <span>💡</span>
                        <span>Type your name and press <strong>Enter ↵</strong> or click <strong>Next Step →</strong> below.</span>
                    </p>
                </div>
            </div>

            <!-- STEP 2: Biological Gender -->
            <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30">Step 2 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug">
                        2. What is your biological gender?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1">Nutrient partitioning and caloric distribution require gender-specific consideration:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="profile.gender = 'Female'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Female' ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">👩</span>
                            <div>
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': profile.gender === 'Female'}">Female</span>
                                <span class="text-xs text-brand-green-200">Hormonal cycle support, blood nourishment (Rakta Dhatu), and iron density</span>
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
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': profile.gender === 'Male'}">Male</span>
                                <span class="text-xs text-brand-green-200">Muscle preservation, visceral fat management, and high metabolic efficiency</span>
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
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': profile.gender === 'Other'}">Other / Prefer not to say</span>
                                <span class="text-xs text-brand-green-200">Balanced nutritional blueprint for general metabolic vitality</span>
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
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30">Step 3 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug">
                        3. Which age group do you belong to?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1">Life stages define your cellular Agni and digestive capacity:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in [
                        { label: 'Under 18', desc: 'Active tissue growth phase; requires wholesome calorie and protein density' },
                        { label: '18–29', desc: 'Peak metabolic fire; high physical activity and career stress balancing' },
                        { label: '30–45', desc: 'Metabolic conservation phase; preventing visceral fat and post-lunch slumps' },
                        { label: '46–60', desc: 'Hormonal transition phase; prioritizing lighter dinners and easy assimilation' },
                        { label: '60+', desc: 'Gentle Agni phase; warm soupy meals, easy mucosal digestion, and joint care' }
                    ]" :key="item.label">
                        <button type="button" 
                                @click="profile.ageGroup = item.label" 
                                class="w-full text-left p-4 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="profile.ageGroup === item.label ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                            <div>
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': profile.ageGroup === item.label}" x-text="item.label"></span>
                                <span class="text-xs text-brand-green-200 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="profile.ageGroup === item.label ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                                <div x-show="profile.ageGroup === item.label" class="w-2.5 h-2.5 rounded-full bg-brand-green-950"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 4: WhatsApp Phone Number -->
            <div x-show="step === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30">Step 4 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug">
                        4. What is your WhatsApp phone number?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1">We will send your complete 7-day personalized diet blueprint and shopping guide directly to your phone:</p>
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
                               placeholder="Enter 10-digit mobile number"
                               class="flex-1 w-full bg-brand-green-900 px-4 py-4 text-base focus:outline-none text-white font-medium placeholder:text-brand-green-300/50">
                    </div>
                    <div class="bg-brand-green-950/80 rounded-xl p-3 border border-brand-green-700 flex items-start gap-2.5 text-xs text-brand-green-200">
                        <span class="text-base shrink-0">🔒</span>
                        <span>Confidential. Your number is only used to deliver your customized diet blueprint and doctor consultation.</span>
                    </div>
                </div>
            </div>

            <!-- STEP 5: Primary Health Goal -->
            <div x-show="step === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30">Step 5 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug">
                        5. What is the primary focus for your daily meal plan?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1">Select the therapeutic purpose your meal blueprint should prioritize:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in [
                        { label: 'Fat Loss & Metabolic Reset (Medo Hara)', desc: 'Accelerate fat oxidation, eliminate water retention, and keep evening dinners light' },
                        { label: 'Blood Nourishment & Vitality (Rakta Vardhaka)', desc: 'Boost hemoglobin/ferritin, combat midday fatigue, and optimize cellular oxygenation' },
                        { label: 'Deep Gut Detox & Bloat Clearance (Ama Pachana)', desc: 'Ignite sluggish Agni, clear undigested gut residue, and relieve post-meal heaviness' },
                        { label: 'Cellular Longevity & Rejuvenation (Rasayana)', desc: 'Nourish all 7 tissue layers (Dhatus), protect skin/hair glow, and sustain steady stamina' }
                    ]" :key="item.label">
                        <button type="button" 
                                @click="answers.goal = item.label" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.goal === item.label ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                            <div>
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': answers.goal === item.label}" x-text="item.label"></span>
                                <span class="text-xs text-brand-green-200 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.goal === item.label ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                                <div x-show="answers.goal === item.label" class="w-2.5 h-2.5 rounded-full bg-brand-green-950"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 6: Dietary Preference -->
            <div x-show="step === 6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30">Step 6 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug">
                        6. What is your primary dietary preference?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1">We tailor your breakfast, lunch, and dinner recipes strictly to your preferred food matrix:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in [
                        { label: 'Pure Vegetarian (Satvik / Plant-focused)', desc: 'Lentils, legumes, whole grains, vegetables, nuts, and cold-pressed oils' },
                        { label: 'Vegetarian with Dairy & Ghee', desc: 'Vegetarian meals enriched with A2 cow ghee, buttermilk, and fresh paneer' },
                        { label: 'Non-Vegetarian / Mixed Diet', desc: 'Balanced diet incorporating eggs, poultry, fish, or lean broth cooked with turmeric' },
                        { label: 'Vegan (100% Plant-Based)', desc: 'Exclusively plant foods without any dairy, honey, or animal derivatives' }
                    ]" :key="item.label">
                        <button type="button" 
                                @click="answers.diet = item.label" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.diet === item.label ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                            <div>
                                <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': answers.diet === item.label}" x-text="item.label"></span>
                                <span class="text-xs text-brand-green-200 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.diet === item.label ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                                <div x-show="answers.diet === item.label" class="w-2.5 h-2.5 rounded-full bg-brand-green-950"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 7: Post-Meal Digestion Pattern -->
            <div x-show="step === 7" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30">Step 7 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug">
                        7. How do you usually feel 1 to 2 hours after your main meal?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1">Identifies whether your digestive fire needs warming, cooling, or stabilizing spices:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="answers.digestion = 'Manda'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.digestion === 'Manda' ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.digestion === 'Manda' ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                            <div x-show="answers.digestion === 'Manda'" class="w-2 h-2 rounded-full bg-brand-green-950"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': answers.digestion === 'Manda'}">Heavy, Sleepy & Sluggish (Slow Agni)</span>
                            <span class="text-xs sm:text-sm text-brand-green-200 mt-0.5 block">Food feels like it sits in the stomach forever; feel drowsy or sluggish; metabolism is slow.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="answers.digestion = 'Tikshna'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.digestion === 'Tikshna' ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.digestion === 'Tikshna' ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                            <div x-show="answers.digestion === 'Tikshna'" class="w-2 h-2 rounded-full bg-brand-green-950"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': answers.digestion === 'Tikshna'}">Acidic, Hot or Quick Hunger (Sharp Agni)</span>
                            <span class="text-xs sm:text-sm text-brand-green-200 mt-0.5 block">Digest quickly but often experience acid reflux, sour burps, or get hungry again very soon.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="answers.digestion = 'Vishama'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.digestion === 'Vishama' ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.digestion === 'Vishama' ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                            <div x-show="answers.digestion === 'Vishama'" class="w-2 h-2 rounded-full bg-brand-green-950"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': answers.digestion === 'Vishama'}">Bloated, Gassy & Distended (Irregular Agni)</span>
                            <span class="text-xs sm:text-sm text-brand-green-200 mt-0.5 block">Stomach expands like a balloon; frequent gas, gurgling noises, or unpredictable bowel movements.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="answers.digestion = 'Sama'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.digestion === 'Sama' ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600 hover:bg-brand-green-900'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.digestion === 'Sama' ? 'border-brand-gold-400 bg-brand-gold-400' : 'border-brand-green-600 bg-transparent'">
                            <div x-show="answers.digestion === 'Sama'" class="w-2 h-2 rounded-full bg-brand-green-950"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-white" :class="{'text-brand-gold-300': answers.digestion === 'Sama'}">Light & Clear Energy (Balanced Agni)</span>
                            <span class="text-xs sm:text-sm text-brand-green-200 mt-0.5 block">Smooth digestion without gas or heaviness; consistent energy throughout the afternoon.</span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- STEP 8: Daily Sensitivities & Cravings -->
            <div x-show="step === 8" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 bg-brand-gold-400/20 px-3 py-1 rounded-full inline-block mb-2 border border-brand-gold-400/30">Step 8 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white leading-snug">
                        8. Do you experience any of these daily sensitivities?
                    </h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 mt-1">Select all that apply to help Dr. Sajeev Dev customize herbal co-factors:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="toggleSensitivity('sugar')" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.sensitivities.includes('sugar') ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.sensitivities.includes('sugar') ? 'border-brand-gold-400 bg-brand-gold-400 text-brand-green-950 font-bold' : 'border-brand-green-600 bg-transparent'">
                            <span x-show="answers.sensitivities.includes('sugar')">✓</span>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-white" :class="{'text-brand-gold-300': answers.sensitivities.includes('sugar')}">Sugar & Carbohydrate Cravings</span>
                            <span class="text-xs sm:text-sm text-brand-green-200 mt-0.5 block">Intense urge for sweet snacks, biscuits, or tea between 3 PM and 6 PM.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleSensitivity('fatigue')" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.sensitivities.includes('fatigue') ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.sensitivities.includes('fatigue') ? 'border-brand-gold-400 bg-brand-gold-400 text-brand-green-950 font-bold' : 'border-brand-green-600 bg-transparent'">
                            <span x-show="answers.sensitivities.includes('fatigue')">✓</span>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-white" :class="{'text-brand-gold-300': answers.sensitivities.includes('fatigue')}">Post-Meal Brain Fog & Afternoon Energy Crash</span>
                            <span class="text-xs sm:text-sm text-brand-green-200 mt-0.5 block">Mental exhaustion and lack of focus following lunch; reliance on caffeine to keep working.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleSensitivity('bowels')" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.sensitivities.includes('bowels') ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.sensitivities.includes('bowels') ? 'border-brand-gold-400 bg-brand-gold-400 text-brand-green-950 font-bold' : 'border-brand-green-600 bg-transparent'">
                            <span x-show="answers.sensitivities.includes('bowels')">✓</span>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-white" :class="{'text-brand-gold-300': answers.sensitivities.includes('bowels')}">Constipation or Incomplete Morning Evacuation</span>
                            <span class="text-xs sm:text-sm text-brand-green-200 mt-0.5 block">Straining, hard dry stools, or needing multiple attempts before feeling cleared out.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleSensitivity('bloat')" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.sensitivities.includes('bloat') ? 'border-brand-gold-400 bg-brand-green-700/80 shadow-sm ring-2 ring-brand-gold-400/30' : 'border-brand-green-700 bg-brand-green-900/60 hover:border-brand-green-600'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.sensitivities.includes('bloat') ? 'border-brand-gold-400 bg-brand-gold-400 text-brand-green-950 font-bold' : 'border-brand-green-600 bg-transparent'">
                            <span x-show="answers.sensitivities.includes('bloat')">✓</span>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-white" :class="{'text-brand-gold-300': answers.sensitivities.includes('bloat')}">Water Retention or Morning Puffiness</span>
                            <span class="text-xs sm:text-sm text-brand-green-200 mt-0.5 block">Puffiness under eyes, heavy limbs, or tight rings in fingers upon waking.</span>
                        </div>
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <button type="button" 
                            @click="clearSensitivities()" 
                            class="text-xs text-brand-green-200 hover:text-white underline underline-offset-2 cursor-pointer">
                        None of these sensitivities apply to me
                    </button>
                </div>
            </div>

            <!-- Navigation Controls (Bottom Bar for Steps 1-8) -->
            <div class="mt-8 pt-5 border-t border-brand-green-700/80 flex items-center justify-between" x-show="step >= 1 && step <= 8">
                <button type="button" 
                        @click="prevStep()" 
                        class="px-5 py-2.5 rounded-xl font-semibold text-xs uppercase tracking-wider text-brand-green-200 hover:text-white hover:bg-brand-green-700/60 transition-colors border border-brand-green-700 cursor-pointer">
                    ← Back
                </button>
                
                <button type="button" 
                        @click="nextStep()" 
                        :disabled="!canProceed" 
                        class="px-7 py-3 rounded-xl font-bold text-brand-green-950 transition-all transform active:scale-95 disabled:opacity-40 disabled:cursor-not-allowed shadow-md hover:shadow-lg flex items-center gap-2 cursor-pointer bg-brand-gold-400 hover:bg-brand-gold-300 text-sm">
                    <span x-text="step === 8 ? 'Complete & View Blueprint' : 'Next Step'"></span>
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
                              x-text="'Patient: ' + profile.name"></span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-brand-green-950 text-white border border-brand-green-700" 
                              x-show="profile.gender" 
                              x-text="profile.gender + ' • ' + (profile.ageGroup || '')"></span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-brand-gold-400 text-brand-green-950" 
                              x-text="answers.goal"></span>
                    </div>

                    <h3 class="text-2xl sm:text-3xl font-serif font-bold text-white mb-2">Your 3-Phase Daily Ayurvedic Blueprint</h3>
                    <p class="text-xs sm:text-sm text-brand-green-100/80 max-w-lg mx-auto">
                        Structured to balance your digestive fire (<span class="font-bold text-brand-gold-400" x-text="digestionLabel"></span>) and sustain peak cellular nourishment throughout the day.
                    </p>
                </div>

                <!-- WHATSAPP DELIVERY CTA -->
                <div class="bg-brand-green-950/80 rounded-2xl p-4 sm:p-5 mb-8 border border-brand-gold-500/30 text-center flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-left">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 flex items-center gap-1.5">
                            <span>📲</span>
                            <span>Receive Full 7-Day Custom Diet Chart on WhatsApp</span>
                        </h4>
                        <p class="text-xs text-brand-green-100/70 mt-0.5">
                            Get complete recipes, timing chart, and Dr. Sajeev Dev's guidance delivered straight to your phone.
                        </p>
                    </div>
                    <a :href="whatsappLink" target="_blank" 
                       class="inline-flex items-center justify-center bg-[#25D366] hover:bg-[#1ebd5b] text-white font-bold px-6 py-3 rounded-xl transition-all shadow-sm hover:shadow-md text-xs sm:text-sm gap-2 shrink-0 cursor-pointer">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.976L2 22l5.174-1.357a9.923 9.923 0 004.838 1.259h.005c5.505 0 9.988-4.479 9.988-9.985S17.518 2 12.012 2zM12.012 20.202h-.004a8.273 8.273 0 01-4.223-1.155l-.303-.18-3.138.823.836-3.062-.197-.314A8.252 8.252 0 013.69 11.984C3.691 7.42 7.408 3.702 11.97 3.702c4.545 0 8.243 3.714 8.243 8.283 0 4.56-3.7 8.272-8.201 8.217zM16.55 13.992c-.248-.124-1.472-.727-1.7-.811-.228-.084-.395-.124-.56.124-.167.248-.646.811-.79 9.977-.146.166-.293.187-.54.062-1.071-.539-2.583-1.638-3.197-2.317-.168-.186-.334-.187-.582-.062-.248.125-1.05.388-1.602 1.341-.55 1.05.021 1.554.499 2.502.167.332.083.623-.042.871-.125.248-.56 1.348-.767 1.846-.2.482-.403.417-.56.425-.145.008-.312.008-.479.008a.911.911 0 00-.663.309c-.228.248-.871.851-.871 2.073s.893 2.404 1.018 2.57c.125.166 1.752 2.673 4.246 3.75.594.256 1.057.41 1.419.524.595.189 1.137.162 1.564.098.48-.073 1.472-.602 1.68-1.184.208-.582.208-1.08.146-1.184-.062-.104-.228-.166-.476-.29z"/>
                        </svg>
                        <span>Send to My WhatsApp</span>
                    </a>
                </div>

                <!-- 3 MEAL PHASE CARDS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <!-- Morning Phase -->
                    <div class="bg-brand-green-950/70 rounded-2xl p-5 border border-brand-green-700 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-400">Phase 1: Morning</span>
                                <span class="text-base">🌅</span>
                            </div>
                            <h4 class="text-base font-bold text-white mb-2">Agni Activation & Detox</h4>
                            <p class="text-xs text-brand-green-100/90 leading-relaxed" x-text="blueprint.morning"></p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-brand-green-800 text-[11px] text-brand-gold-300">
                            <strong>Recommended Time:</strong> 6:30 AM – 8:00 AM
                        </div>
                    </div>

                    <!-- Midday Lunch Phase -->
                    <div class="bg-brand-green-950/70 rounded-2xl p-5 border border-brand-green-700 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-400">Phase 2: Midday</span>
                                <span class="text-base">☀️</span>
                            </div>
                            <h4 class="text-base font-bold text-white mb-2">Main Rebuilding Meal</h4>
                            <p class="text-xs text-brand-green-100/90 leading-relaxed" x-text="blueprint.lunch"></p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-brand-green-800 text-[11px] text-brand-gold-300">
                            <strong>Recommended Time:</strong> 12:30 PM – 1:30 PM
                        </div>
                    </div>

                    <!-- Evening Dinner Phase -->
                    <div class="bg-brand-green-950/70 rounded-2xl p-5 border border-brand-green-700 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-400">Phase 3: Sunset</span>
                                <span class="text-base">🌙</span>
                            </div>
                            <h4 class="text-base font-bold text-white mb-2">Light Healing Dinner</h4>
                            <p class="text-xs text-brand-green-100/90 leading-relaxed" x-text="blueprint.dinner"></p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-brand-green-800 text-[11px] text-brand-gold-300">
                            <strong>Recommended Time:</strong> 7:00 PM – 7:45 PM
                        </div>
                    </div>
                </div>

                <!-- DR. SAJEEV DEV'S THERAPEUTIC HERBAL INTEGRATION -->
                <div class="bg-gradient-to-br from-brand-green-950 via-brand-green-900 to-brand-green-950 rounded-3xl p-6 sm:p-8 mb-8 border border-brand-gold-400/30 shadow-xl">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-6 h-6 rounded-full bg-brand-gold-400 text-brand-green-950 flex items-center justify-center text-xs font-bold">🌿</span>
                        <span class="text-xs font-bold uppercase tracking-wider text-brand-gold-300">Dr. Sajeev Dev's Therapeutic Nutrition Advice</span>
                    </div>
                    <h4 class="text-xl sm:text-2xl font-serif font-bold text-white mb-3">
                        Pair Your Daily Meals with Pure Ayurvedic Functional Foods
                    </h4>
                    <p class="text-xs sm:text-sm text-brand-green-100/90 leading-relaxed mb-6">
                        A diet plan is only as effective as your body's cellular assimilation. Adding pure, single-origin functional botanicals helps kindle your digestive fire (Deepana) and prevent toxic buildup (Ama) throughout your tissues.
                    </p>

                    <!-- 3 RECOMMENDED PRODUCTS FOR THIS DIET -->
                    <div class="mb-6">
                        <h5 class="text-xs font-bold uppercase tracking-wider text-brand-gold-300 mb-3">
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
                                        <h6 class="font-serif font-bold text-xs sm:text-sm text-white group-hover:text-brand-gold-300 line-clamp-1">Moringa Leaves Powder</h6>
                                        <p class="text-[11px] text-brand-green-200 mt-1 line-clamp-2">Pure organic green powder for morning warm water detox, metabolic kickstart, and micro-nutrition.</p>
                                    </div>
                                </div>
                                <div class="p-3.5 pt-0">
                                    <div class="w-full py-1.5 px-3 bg-brand-green-800 group-hover:bg-brand-gold-400 text-brand-green-100 group-hover:text-brand-green-950 rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span>View Product</span>
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
                                        <h6 class="font-serif font-bold text-xs sm:text-sm text-white group-hover:text-brand-gold-300 line-clamp-1">Jamun Seed Powder</h6>
                                        <p class="text-[11px] text-brand-green-200 mt-1 line-clamp-2">Helps curb carbohydrate cravings, balances post-lunch sugar spikes, and supports digestive Agni.</p>
                                    </div>
                                </div>
                                <div class="p-3.5 pt-0">
                                    <div class="w-full py-1.5 px-3 bg-brand-green-800 group-hover:bg-brand-gold-400 text-brand-green-100 group-hover:text-brand-green-950 rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span>View Product</span>
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
                                        <h6 class="font-serif font-bold text-xs sm:text-sm text-white group-hover:text-brand-gold-300 line-clamp-1">Ragi Millet Soup Mix</h6>
                                        <p class="text-[11px] text-brand-green-200 mt-1 line-clamp-2">Ideal wholesome evening replacement; light on the stomach, high in calcium & slow-release fiber.</p>
                                    </div>
                                </div>
                                <div class="p-3.5 pt-0">
                                    <div class="w-full py-1.5 px-3 bg-brand-green-800 group-hover:bg-brand-gold-400 text-brand-green-100 group-hover:text-brand-green-950 rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span>View Product</span>
                                        <span>→</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- DIRECT GATEWAY TO ALL PRODUCTS PAGE -->
                    <div class="p-4 sm:p-5 bg-brand-green-950 text-white rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4 border border-brand-gold-500/30">
                        <div class="text-center sm:text-left">
                            <span class="text-xs font-bold uppercase tracking-widest text-brand-gold-400 block mb-0.5">Explore the Full Catalog</span>
                            <h5 class="font-serif font-bold text-base sm:text-lg text-white">Visit Yuvann Ayurvedic Shop</h5>
                            <p class="text-xs text-brand-green-100/80 mt-0.5">
                                Browse all doctor-formulated herbal oils, functional foods, and powders at <span class="text-brand-gold-300 font-mono">yuvann.com/products</span>
                            </p>
                        </div>
                        <a href="https://yuvann.com/products" 
                           class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-brand-gold-400 hover:bg-brand-gold-300 text-brand-green-950 font-black text-xs sm:text-sm rounded-xl transition-all shadow-md shrink-0 gap-2 cursor-pointer">
                            <span>Shop All Products</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <button type="button" 
                            @click="resetQuiz()" 
                            class="text-xs text-brand-gold-400 hover:text-brand-gold-200 font-semibold underline underline-offset-4 cursor-pointer">
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
                if (this.step === 1) return 'Profile: Full Name';
                if (this.step === 2) return 'Profile: Gender';
                if (this.step === 3) return 'Profile: Age Group';
                if (this.step === 4) return 'Contact: WhatsApp';
                if (this.step === 5) return 'Objective: Dietary Goal';
                if (this.step === 6) return 'Preference: Food Pattern';
                if (this.step === 7) return 'Digestion: Post-Meal Agni';
                if (this.step === 8) return 'Symptoms: Daily Sensitivities';
                return 'Diet Blueprint';
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
            get digestionLabel() {
                if (this.answers.digestion === 'Tikshna') return 'Tikshna Agni (Sharp / Pitta)';
                if (this.answers.digestion === 'Manda') return 'Manda Agni (Slow / Kapha)';
                if (this.answers.digestion === 'Vishama') return 'Vishama Agni (Irregular / Vata)';
                return 'Sama Agni (Balanced)';
            },
            get blueprint() {
                let morning = 'Warm water infused with cumin, coriander, and fennel (CCF) seeds to ignite morning digestive flame smoothly.';
                let lunch = 'Warm, freshly cooked seasonal grain bowl with steamed vegetables, yellow dal, and cooling digestive herbs.';
                let dinner = 'Light warm soup or well-spiced lentil broth before 7:30 PM to allow complete gut clearance before sleep.';

                // Customized to digestion
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

                // Customized to diet
                if (this.answers.diet.includes('Non-Vegetarian') && !this.answers.goal.includes('Detox')) {
                    lunch += ' (May include lightly spiced clear bone broth or steamed fish cooked with fresh turmeric).';
                }

                return { morning, lunch, dinner };
            },
            get whatsappLink() {
                const phone = "917736609299";
                let text = `🌿 *YUVANN CLINICAL REPORT: AYURVEDIC DIET BLUEPRINT*\n`;
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

                return `https://wa.me/${phone}?text=${encodeURIComponent(text)}`;
            }
        }
    }
</script>
