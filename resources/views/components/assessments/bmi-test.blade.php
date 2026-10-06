<section id="bmi-assessment" class="py-16 md:py-20 bg-brand-green-50/70 relative">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-8">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider text-brand-green-900 bg-brand-green-100 uppercase mb-2.5">
                Clinical Ayurvedic Assessment
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-gray-900">Ayurvedic BMI & Prakriti Assessment</h2>
            <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto mt-2">
                A personalized clinical screening by Dr. Sajeev Dev to evaluate your body mass composition, digestive fire (Agni), and biological constitution (Prakriti).
            </p>
        </div>

        <div x-data="bmiAssessment()" class="bg-white rounded-3xl shadow-xl p-5 sm:p-8 md:p-10 border border-gray-200/80 relative overflow-hidden" x-cloak>
            
            <!-- Step 0: Intro Screen -->
            <div x-show="step === 0" class="text-center py-4 sm:py-6">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-emerald-50 text-emerald-800 rounded-2xl flex items-center justify-center mx-auto mb-5 border border-emerald-200 shadow-sm">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-serif font-bold text-gray-900 mb-3">Discover Your Ayurvedic Body Balance & Ideal Weight</h3>
                <p class="text-sm sm:text-base text-gray-600 max-w-lg mx-auto mb-8 leading-relaxed">
                    Standard weight charts ignore your unique constitutional build. This doctor-guided assessment calculates your body mass using Asian-Indian clinical cutoffs and maps your metabolic Agni and Dosha tendencies, delivered directly to your WhatsApp.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 max-w-xl mx-auto mb-8 text-left">
                    <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200">
                        <span class="text-lg block mb-1">⏱️</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-gray-900">Takes 2 Minutes</h4>
                        <p class="text-[11px] text-gray-600 mt-0.5">One focused question at a time.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200">
                        <span class="text-lg block mb-1">📲</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-gray-900">WhatsApp Report</h4>
                        <p class="text-[11px] text-gray-600 mt-0.5">Receive your detailed custom metrics on your phone.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200">
                        <span class="text-lg block mb-1">🌿</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-gray-900">Doctor-Guided</h4>
                        <p class="text-[11px] text-gray-600 mt-0.5">Ayurvedic guidance by Dr. Sajeev Dev.</p>
                    </div>
                </div>

                <button type="button" 
                        @click="startQuiz()" 
                        class="inline-flex items-center justify-center px-8 sm:px-10 py-3.5 sm:py-4 text-base font-bold text-white bg-brand-green-800 hover:bg-brand-green-700 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5 cursor-pointer gap-2">
                    <span>Begin Assessment</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

            <!-- Quiz Stepper Header (Steps 1 to 8) -->
            <div x-show="step >= 1 && step <= 8" class="mb-6">
                <div class="flex items-center justify-between text-xs font-semibold text-gray-500 mb-2">
                    <span class="text-brand-green-800 uppercase tracking-wider font-bold" x-text="stepCategory"></span>
                    <span class="font-bold text-gray-700" x-text="`Step ${step} of 8`"></span>
                </div>
                <div class="h-2 w-full bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-brand-green-700 to-emerald-500 transition-all duration-300 ease-out"
                         :style="`width: ${(step / 8) * 100}%`"></div>
                </div>
            </div>

            <!-- ONE QUESTION AT A TIME -->

            <!-- STEP 1: Full Name -->
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 1 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        1. What is your full name?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">To personalize your confidential health evaluation and official report:</p>
                </div>

                <div class="space-y-4">
                    <div class="relative">
                        <input type="text" 
                               x-model.trim="profile.name" 
                               @keydown.enter.prevent="if (canProceed) nextStep()"
                               autofocus
                               placeholder="e.g. Priya Sharma"
                               class="w-full bg-white border-2 border-gray-300 rounded-2xl px-5 py-4 text-base focus:outline-none focus:border-brand-green-700 focus:ring-4 focus:ring-brand-green-100 text-gray-900 shadow-2xs font-medium placeholder:text-gray-400">
                    </div>
                    <p class="text-xs text-gray-500 flex items-center gap-1.5">
                        <span>💡</span>
                        <span>Type your name and press <strong>Enter ↵</strong> or click <strong>Next Step →</strong> below.</span>
                    </p>
                </div>
            </div>

            <!-- STEP 2: Biological Gender -->
            <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 2 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        2. What is your biological gender?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Basal metabolic rate (BMR) and body fat percentage distribution vary by gender:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="profile.gender = 'Female'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                            :class="profile.gender === 'Female' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="flex items-center gap-3.5">
                            <span class="text-2xl">👩</span>
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': profile.gender === 'Female'}">Female</span>
                                <span class="text-xs text-gray-500">Essential fat distribution, hormonal cycles, and subcutaneous metabolic balance</span>
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
                                <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': profile.gender === 'Male'}">Male</span>
                                <span class="text-xs text-gray-500">Higher muscle mass baseline, visceral fat risk, and higher daily metabolic expenditure</span>
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
                                <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': profile.gender === 'Other'}">Other / Prefer not to say</span>
                                <span class="text-xs text-gray-500">Holistic metabolic balance and general Ayurvedic constitutional evaluation</span>
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
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 3 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        3. Which age group do you belong to?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Age directly impacts metabolic rate, tissue building (Dhatus), and digestive fire:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in [
                        { label: 'Under 18', desc: 'Kapha age stage: rapid physical growth and natural tissue building' },
                        { label: '18–29', desc: 'Pitta age stage: peak metabolic activity, high physical output, and career stress' },
                        { label: '30–45', desc: 'Metabolic plateau: gradual slowdown in calorie expenditure and lifestyle stress' },
                        { label: '46–60', desc: 'Transition phase: perimenopause, hormonal shift, and muscular conservation' },
                        { label: '60+', desc: 'Vata age stage: catabolic phase requiring gentle Agni care and bone nourishment' }
                    ]" :key="item.label">
                        <button type="button" 
                                @click="profile.ageGroup = item.label" 
                                class="w-full text-left p-4 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="profile.ageGroup === item.label ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': profile.ageGroup === item.label}" x-text="item.label"></span>
                                <span class="text-xs text-gray-500 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="profile.ageGroup === item.label ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                                <div x-show="profile.ageGroup === item.label" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 4: WhatsApp Phone Number -->
            <div x-show="step === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 4 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        4. What is your WhatsApp phone number?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">We will format your complete BMI profile, target weight metrics, and doctor's custom advice directly to your WhatsApp:</p>
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
                               placeholder="Enter 10-digit mobile number"
                               class="flex-1 w-full bg-white px-4 py-4 text-base focus:outline-none text-gray-900 font-medium placeholder:text-gray-400">
                    </div>
                    <div class="bg-emerald-50 rounded-xl p-3 border border-emerald-200/80 flex items-start gap-2.5 text-xs text-emerald-900">
                        <span class="text-base shrink-0">🔒</span>
                        <span>Confidential. Your number is only used to deliver your assessment report and doctor consultation.</span>
                    </div>
                </div>
            </div>

            <!-- STEP 5: Height & Weight Metrics -->
            <div x-show="step === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 5 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        5. What are your current height and weight?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Used to compute your Body Mass Index (BMI) using Asian-Indian clinical cutoffs:</p>
                </div>

                <div class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200">
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Height (in cm)
                            </label>
                            <div class="relative">
                                <input type="number" 
                                       x-model.number="answers.height" 
                                       placeholder="e.g. 168" 
                                       min="80" max="250"
                                       class="w-full bg-white border-2 border-gray-300 rounded-xl px-4 py-3 text-lg font-bold text-gray-900 focus:outline-none focus:border-brand-green-700">
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-gray-400">cm</span>
                            </div>
                            <span class="text-[11px] text-gray-500 mt-1 block">5 ft = 152 cm · 5'6" = 168 cm · 5'10" = 178 cm</span>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200">
                            <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-1.5">
                                Weight (in kg)
                            </label>
                            <div class="relative">
                                <input type="number" 
                                       x-model.number="answers.weight" 
                                       placeholder="e.g. 68" 
                                       min="20" max="250"
                                       class="w-full bg-white border-2 border-gray-300 rounded-xl px-4 py-3 text-lg font-bold text-gray-900 focus:outline-none focus:border-brand-green-700">
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-bold text-gray-400">kg</span>
                            </div>
                            <span class="text-[11px] text-gray-500 mt-1 block">Measured on an empty stomach in the morning</span>
                        </div>
                    </div>

                    <!-- Instant Live BMI Preview -->
                    <template x-if="bmiValue > 0">
                        <div class="p-4 rounded-2xl border flex items-center justify-between"
                             :class="{
                                 'bg-blue-50 border-blue-200 text-blue-900': bmiCategory === 'Underweight',
                                 'bg-emerald-50 border-emerald-200 text-emerald-900': bmiCategory === 'Normal (Healthy Weight)',
                                 'bg-amber-50 border-amber-200 text-amber-900': bmiCategory === 'Overweight',
                                 'bg-red-50 border-red-200 text-red-900': bmiCategory === 'Obese'
                             }">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider block">Calculated BMI</span>
                                <span class="text-2xl font-black font-serif" x-text="bmiValue"></span>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-bold px-3 py-1 rounded-full bg-white shadow-2xs inline-block" x-text="bmiCategory"></span>
                                <p class="text-[11px] mt-1" x-text="'Healthy Asian-Indian target: 18.5 – 22.9'"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- STEP 6: Primary Health & Body Goal -->
            <div x-show="step === 6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 6 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        6. What is your primary body & wellness goal?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Directs the therapeutic direction of your doctor-prescribed action plan:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in [
                        { label: 'Fat Loss & Tummy Reduction (Medo Hara)', desc: 'Reduce visceral fat, clear sluggish metabolic waste (Ama), and tone the waistline' },
                        { label: 'Building Healthy Muscle Mass (Brimhana)', desc: 'Gain nutrient-dense healthy weight without digestive heaviness or fat accumulation' },
                        { label: 'Maintaining Steady Weight & Vitality', desc: 'Sustain current weight while optimizing all-day stamina, focus, and energy' },
                        { label: 'Healing Digestion & Chronic Gut Bloating', desc: 'Eliminate post-meal distention, unpredictable bowels, and gut discomfort' }
                    ]" :key="item.label">
                        <button type="button" 
                                @click="answers.goal = item.label" 
                                class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-center justify-between cursor-pointer"
                                :class="answers.goal === item.label ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                            <div>
                                <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.goal === item.label}" x-text="item.label"></span>
                                <span class="text-xs text-gray-500 mt-0.5 block" x-text="item.desc"></span>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0 ml-3"
                                 :class="answers.goal === item.label ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                                <div x-show="answers.goal === item.label" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </template>
                </div>
            </div>

            <!-- STEP 7: Digestive Fire (Agni) -->
            <div x-show="step === 7" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 7 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        7. How does your digestive fire (Agni) typically behave?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">In Ayurveda, your metabolism is governed by the state of your central digestive flame:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="answers.agni = 'Tikshna'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.agni === 'Tikshna' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.agni === 'Tikshna' ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.agni === 'Tikshna'" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.agni === 'Tikshna'}">Strong & Sharp (Tikshna Agni)</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Frequent intense hunger; can digest anything quickly; prone to acidity, heartburn, or irritability if a meal is delayed.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="answers.agni = 'Manda'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.agni === 'Manda' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.agni === 'Manda' ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.agni === 'Manda'" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.agni === 'Manda'}">Slow & Sluggish (Manda Agni)</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Rarely feel deeply hungry; food feels like it sits in stomach for hours; morning heaviness; easy weight gain.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="answers.agni = 'Vishama'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.agni === 'Vishama' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.agni === 'Vishama' ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.agni === 'Vishama'" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.agni === 'Vishama'}">Irregular & Fluctuating (Vishama Agni)</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Unpredictable appetite—ravenous one day, no appetite the next; frequent gas, constipation, or lower abdominal bloating.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="answers.agni = 'Sama'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.agni === 'Sama' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.agni === 'Sama' ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.agni === 'Sama'" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.agni === 'Sama'}">Balanced & Steady (Sama Agni)</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Smooth digestion; clear wakeful mornings; comfortable appetite at predictable intervals without discomfort.</span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- STEP 8: Body Frame & Constitutional Tendency (Prakriti) -->
            <div x-show="step === 8" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 8 of 8</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        8. Which description best matches your natural body frame & temperament?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Helps Dr. Sajeev Dev identify your baseline biological Dosha dominance:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="answers.dosha = 'Vata'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.dosha === 'Vata' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.dosha === 'Vata' ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.dosha === 'Vata'" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.dosha === 'Vata'}">Slender / Light Build (Vata Dominant)</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Naturally lean or hard to gain weight; dry skin/hair; sensitive to cold weather; quick-moving mind and creative.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="answers.dosha = 'Pitta'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.dosha === 'Pitta' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.dosha === 'Pitta' ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.dosha === 'Pitta'" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.dosha === 'Pitta'}">Medium / Athletic Build (Pitta Dominant)</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Moderate, well-proportioned frame; warm body temperature; dislikes hot humid weather; sharp intellect and driven nature.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="answers.dosha = 'Kapha'" 
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.dosha === 'Kapha' ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.dosha === 'Kapha' ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.dosha === 'Kapha'" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-base block text-gray-900" :class="{'text-emerald-950': answers.dosha === 'Kapha'}">Broad / Sturdy Build (Kapha Dominant)</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Naturally solid, broad joints; soft thick skin; gains weight easily and loses slowly; great endurance and calm, loving disposition.</span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Navigation Controls (Bottom Bar for Steps 1-8) -->
            <div class="mt-8 pt-5 border-t border-gray-100 flex items-center justify-between" x-show="step >= 1 && step <= 8">
                <button type="button" 
                        @click="prevStep()" 
                        class="px-5 py-2.5 rounded-xl font-semibold text-xs uppercase tracking-wider text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors border border-gray-200 cursor-pointer">
                    ← Back
                </button>
                
                <button type="button" 
                        @click="nextStep()" 
                        :disabled="!canProceed" 
                        class="px-7 py-3 rounded-xl font-bold text-white transition-all transform active:scale-95 disabled:opacity-40 disabled:cursor-not-allowed shadow-md hover:shadow-lg flex items-center gap-2 cursor-pointer bg-brand-green-800 hover:bg-brand-green-700 text-sm">
                    <span x-text="step === 8 ? 'Complete & View Results' : 'Next Step'"></span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

            <!-- STEP 9: Comprehensive Clinical Results Screen -->
            <div x-show="step === 9" style="display: none;" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-98 translate-y-3" x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                
                <!-- Patient Header & BMI Gauge -->
                <div class="text-center mb-8 pt-2">
                    <div class="flex flex-wrap items-center justify-center gap-2 mb-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-gray-100 text-gray-800 border border-gray-200" 
                              x-show="profile.name" 
                              x-text="'Patient: ' + profile.name"></span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-gray-100 text-gray-700 border border-gray-200" 
                              x-show="profile.gender" 
                              x-text="profile.gender + ' • ' + (profile.ageGroup || '')"></span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-emerald-100 text-emerald-800 border border-emerald-300"
                              x-text="'Height: ' + answers.height + ' cm • Weight: ' + answers.weight + ' kg'">
                        </span>
                    </div>

                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-3 shadow-inner ring-8 ring-opacity-20"
                         :class="{
                             'bg-blue-100 text-blue-700 ring-blue-500': bmiCategory === 'Underweight',
                             'bg-emerald-100 text-emerald-700 ring-emerald-500': bmiCategory === 'Normal (Healthy Weight)',
                             'bg-amber-100 text-amber-700 ring-amber-400': bmiCategory === 'Overweight',
                             'bg-red-100 text-red-700 ring-red-400': bmiCategory === 'Obese'
                         }">
                        <span class="text-2xl font-black font-serif" x-text="bmiValue"></span>
                    </div>

                    <h3 class="text-2xl sm:text-3xl font-serif font-bold text-gray-900 mb-1" x-text="bmiCategory"></h3>
                    <p class="text-xs sm:text-sm text-gray-600 max-w-lg mx-auto" x-text="bmiAdvice"></p>
                </div>

                <!-- WHATSAPP REPORT DELIVERY BUTTON -->
                <div class="bg-emerald-50/80 rounded-2xl p-4 sm:p-5 mb-8 border border-emerald-200 text-center flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-left">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-emerald-950 flex items-center gap-1.5">
                            <span>📲</span>
                            <span>Receive Full Body Composition Report on WhatsApp</span>
                        </h4>
                        <p class="text-xs text-emerald-800 mt-0.5">
                            Get your ideal weight target, metabolic Agni prescription, and lifestyle plan sent to your phone.
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

                <!-- Diagnostic Breakdown Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <!-- Ideal Target Weight -->
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-widest block mb-1">Target Weight Window</span>
                        <div class="text-xl font-serif font-bold text-brand-green-900" x-text="idealWeightRange"></div>
                        <p class="text-xs text-gray-600 mt-1">Calculated for your height using Asian-Indian clinical standards (BMI 18.5 – 22.9).</p>
                    </div>

                    <!-- Agni Diagnostic -->
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-200">
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-widest block mb-1">Metabolic Fire (Agni)</span>
                        <div class="text-xl font-serif font-bold text-brand-green-900" x-text="agniLabel"></div>
                        <p class="text-xs text-gray-600 mt-1" x-text="agniDescription"></p>
                    </div>
                </div>

                <!-- DR. SAJEEV DEV'S CLINICAL GUIDANCE & TAILORED FORMULATIONS -->
                <div class="bg-gradient-to-br from-brand-gold-50 via-white to-brand-green-50/50 rounded-3xl p-6 sm:p-8 mb-8 border border-brand-gold-200 shadow-md">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-6 h-6 rounded-full bg-brand-green-800 text-white flex items-center justify-center text-xs font-bold">🌿</span>
                        <span class="text-xs font-bold uppercase tracking-wider text-brand-green-900">Dr. Sajeev Dev's Therapeutic Perspective</span>
                    </div>
                    <h4 class="text-xl sm:text-2xl font-serif font-bold text-gray-900 mb-3">
                        Ignite Metabolism Naturally without Harsh Stimulants
                    </h4>
                    <p class="text-xs sm:text-sm text-gray-700 leading-relaxed mb-6">
                        In Ayurvedic science, sustainable body weight and muscle tone are by-products of balanced Agni (digestive fire) and toxin clearance (Ama Pachana). Rather than crash dieting, we nourish the tissues with whole, organic functional foods.
                    </p>

                    <!-- 3 RECOMMENDED PRODUCTS FOR THIS GOAL -->
                    <div class="mb-6">
                        <h5 class="text-xs font-bold uppercase tracking-wider text-brand-green-950 mb-3">
                            Tailored Formulations for Your Metabolic Profile:
                        </h5>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <!-- Product 1: Ragi Millet Soup Mix -->
                            <a href="/products/ragi-millet-soup-mix" target="_blank"
                               class="group block bg-white rounded-2xl border border-gray-200 hover:border-brand-gold-500 hover:shadow-lg transition-all flex flex-col justify-between overflow-hidden">
                                <div>
                                    <div class="relative bg-gray-50 p-3 flex items-center justify-center border-b border-gray-100 h-36">
                                        <span class="absolute top-2 left-2 px-2 py-0.5 rounded-full text-[9px] font-bold uppercase bg-amber-100 text-amber-800">Low-GI Fiber</span>
                                        <span class="absolute top-2 right-2 text-xs font-bold text-emerald-900 bg-white/95 px-2 py-0.5 rounded shadow-2xs">₹135</span>
                                        <img src="https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=600&auto=format&fit=crop" 
                                             alt="Ragi Millet Soup Mix" class="h-28 object-contain group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="p-3.5">
                                        <h6 class="font-serif font-bold text-xs sm:text-sm text-gray-900 group-hover:text-brand-green-800 line-clamp-1">Ragi Millet Soup Mix</h6>
                                        <p class="text-[11px] text-gray-600 mt-1 line-clamp-2">Slow-release complex carbs & high dietary fiber for natural satiety and easy evening digestion.</p>
                                    </div>
                                </div>
                                <div class="p-3.5 pt-0">
                                    <div class="w-full py-1.5 px-3 bg-brand-green-50 group-hover:bg-brand-green-800 text-brand-green-900 group-hover:text-white rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span>View Product</span>
                                        <span>→</span>
                                    </div>
                                </div>
                            </a>

                            <!-- Product 2: Moringa Leaves Powder -->
                            <a href="/products/moringa-leaves-powder" target="_blank"
                               class="group block bg-white rounded-2xl border border-gray-200 hover:border-brand-gold-500 hover:shadow-lg transition-all flex flex-col justify-between overflow-hidden">
                                <div>
                                    <div class="relative bg-gray-50 p-3 flex items-center justify-center border-b border-gray-100 h-36">
                                        <span class="absolute top-2 left-2 px-2 py-0.5 rounded-full text-[9px] font-bold uppercase bg-emerald-100 text-emerald-800">Superfood Agni</span>
                                        <span class="absolute top-2 right-2 text-xs font-bold text-emerald-900 bg-white/95 px-2 py-0.5 rounded shadow-2xs">₹180</span>
                                        <img src="https://images.unsplash.com/photo-1515694346937-94d85e41e6f0?q=80&w=600&auto=format&fit=crop" 
                                             alt="Moringa Leaves Powder" class="h-28 object-contain group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="p-3.5">
                                        <h6 class="font-serif font-bold text-xs sm:text-sm text-gray-900 group-hover:text-brand-green-800 line-clamp-1">Moringa Leaves Powder</h6>
                                        <p class="text-[11px] text-gray-600 mt-1 line-clamp-2">90+ plant nutrients and antioxidants to stimulate sluggish metabolic fire and cell detox.</p>
                                    </div>
                                </div>
                                <div class="p-3.5 pt-0">
                                    <div class="w-full py-1.5 px-3 bg-brand-green-50 group-hover:bg-brand-green-800 text-brand-green-900 group-hover:text-white rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span>View Product</span>
                                        <span>→</span>
                                    </div>
                                </div>
                            </a>

                            <!-- Product 3: Monk Fruit Powder -->
                            <a href="/products/monk-fruit-powder" target="_blank"
                               class="group block bg-white rounded-2xl border border-gray-200 hover:border-brand-gold-500 hover:shadow-lg transition-all flex flex-col justify-between overflow-hidden">
                                <div>
                                    <div class="relative bg-gray-50 p-3 flex items-center justify-center border-b border-gray-100 h-36">
                                        <span class="absolute top-2 left-2 px-2 py-0.5 rounded-full text-[9px] font-bold uppercase bg-brand-gold-100 text-brand-gold-900">Zero-Cal Sweetener</span>
                                        <span class="absolute top-2 right-2 text-xs font-bold text-emerald-900 bg-white/95 px-2 py-0.5 rounded shadow-2xs">₹450</span>
                                        <img src="https://images.unsplash.com/photo-1594911774802-8822a7079af1?q=80&w=600&auto=format&fit=crop" 
                                             alt="Monk Fruit Powder" class="h-28 object-contain group-hover:scale-105 transition-transform">
                                    </div>
                                    <div class="p-3.5">
                                        <h6 class="font-serif font-bold text-xs sm:text-sm text-gray-900 group-hover:text-brand-green-800 line-clamp-1">Monk Fruit Powder</h6>
                                        <p class="text-[11px] text-gray-600 mt-1 line-clamp-2">Pure zero-glycemic sweetness without artificial chemicals, stopping insulin belly storage.</p>
                                    </div>
                                </div>
                                <div class="p-3.5 pt-0">
                                    <div class="w-full py-1.5 px-3 bg-brand-green-50 group-hover:bg-brand-green-800 text-brand-green-900 group-hover:text-white rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span>View Product</span>
                                        <span>→</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- DIRECT GATEWAY TO ALL PRODUCTS PAGE -->
                    <div class="p-4 sm:p-5 bg-brand-green-900 text-white rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-center sm:text-left">
                            <span class="text-xs font-bold uppercase tracking-widest text-brand-gold-400 block mb-0.5">Explore the Complete Store</span>
                            <h5 class="font-serif font-bold text-base sm:text-lg text-white">Visit Yuvann Ayurvedic Remedies & Foods</h5>
                            <p class="text-xs text-brand-green-100/80 mt-0.5">
                                Discover doctor-formulated herbal oils, powders, and healing foods at <span class="text-brand-gold-300 font-mono">yuvann.com/products</span>
                            </p>
                        </div>
                        <a href="https://yuvann.com/products" 
                           class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-brand-gold-500 hover:bg-brand-gold-400 text-brand-green-950 font-black text-xs sm:text-sm rounded-xl transition-all shadow-md shrink-0 gap-2 cursor-pointer">
                            <span>Explore All Products</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <button type="button" 
                            @click="resetQuiz()" 
                            class="text-xs text-gray-500 hover:text-gray-800 font-semibold underline underline-offset-4 cursor-pointer">
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
                if (this.step === 1) return 'Profile: Full Name';
                if (this.step === 2) return 'Profile: Gender';
                if (this.step === 3) return 'Profile: Age Group';
                if (this.step === 4) return 'Contact: WhatsApp';
                if (this.step === 5) return 'Body Metrics: Height & Weight';
                if (this.step === 6) return 'Health Objective: Primary Goal';
                if (this.step === 7) return 'Digestion: Agni Analysis';
                if (this.step === 8) return 'Constitution: Prakriti Tendency';
                return 'Assessment';
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
            get bmiCategory() {
                const bmi = this.bmiValue;
                if (!bmi) return 'Unknown';
                // Asian-Indian WHO/ICMR Classification:
                if (bmi < 18.5) return 'Underweight';
                if (bmi >= 18.5 && bmi <= 22.9) return 'Normal (Healthy Weight)';
                if (bmi >= 23.0 && bmi <= 24.9) return 'Overweight';
                return 'Obese';
            },
            get bmiAdvice() {
                if (this.bmiCategory === 'Underweight') {
                    return 'Your BMI is below the healthy range. Focus on nutrient-dense building foods (Brimhana) and strengthening Agni.';
                }
                if (this.bmiCategory === 'Normal (Healthy Weight)') {
                    return 'Your body mass is within the optimal Asian-Indian healthy window. Focus on maintaining pure cellular vitality.';
                }
                if (this.bmiCategory === 'Overweight') {
                    return 'You are slightly above the healthy threshold. Mild Agni stimulation (Deepana) and fiber-rich meals will help reset balance.';
                }
                return 'Your BMI indicates significant metabolic and visceral load. A structured Ayurvedic fat-loss plan (Medo Hara) is strongly advised.';
            },
            get idealWeightRange() {
                const h = parseFloat(this.answers.height) / 100;
                if (!h || h <= 0) return 'N/A';
                const minW = Math.round(18.5 * h * h);
                const maxW = Math.round(22.9 * h * h);
                return `${minW} kg – ${maxW} kg`;
            },
            get agniLabel() {
                if (this.answers.agni === 'Tikshna') return 'Tikshna Agni (Sharp / Pitta)';
                if (this.answers.agni === 'Manda') return 'Manda Agni (Slow / Kapha)';
                if (this.answers.agni === 'Vishama') return 'Vishama Agni (Irregular / Vata)';
                return 'Sama Agni (Balanced)';
            },
            get agniDescription() {
                if (this.answers.agni === 'Tikshna') return 'Requires cooling, non-spicy foods. Do not skip meals to prevent excess bile and acidity.';
                if (this.answers.agni === 'Manda') return 'Requires warming spices (ginger, pepper) and light dinners to activate sluggish metabolic breakdown.';
                if (this.answers.agni === 'Vishama') return 'Requires grounding warm soups and fixed meal routines to stabilize fluctuating digestive rhythms.';
                return 'Digestive flame is harmonious; continue balanced seasonal nutrition.';
            },
            get whatsappLink() {
                const phone = "917736609299";
                let text = `🌿 *YUVANN CLINICAL REPORT: BMI & PRAKRITI ASSESSMENT*\n`;
                text += `----------------------------------------\n`;
                text += `👤 *Patient:* ${this.profile.name || 'Anonymous'}\n`;
                text += `⚧ *Gender:* ${this.profile.gender || 'Not specified'} | *Age Group:* ${this.profile.ageGroup || 'Not specified'}\n`;
                text += `📱 *WhatsApp:* +91 ${this.profile.phone || ''}\n\n`;

                text += `📊 *Body Metrics:*\n`;
                text += `• Height: ${this.answers.height} cm | Weight: ${this.answers.weight} kg\n`;
                text += `• Calculated BMI: ${this.bmiValue} (${this.bmiCategory})\n`;
                text += `• Ideal Weight Window: ${this.idealWeightRange}\n\n`;

                text += `🔥 *Metabolic Agni:* ${this.agniLabel}\n`;
                text += `🌿 *Constitution (Dosha):* ${this.answers.dosha || 'Not specified'}\n`;
                text += `🎯 *Primary Goal:* ${this.answers.goal || 'Not specified'}\n\n`;

                text += `🛒 *Official Yuvann Shop Collection:*\nhttps://yuvann.com/products\n\n`;
                text += `Hello Dr. Sajeev Dev, please review my assessment and guide me with a personalized diet and Ayurvedic product regimen!`;

                return `https://wa.me/${phone}?text=${encodeURIComponent(text)}`;
            }
        }
    }
</script>
