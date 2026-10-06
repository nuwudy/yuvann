<section id="iron-test" class="py-16 md:py-20 bg-brand-gold-50/60 relative">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-8">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold tracking-wider text-brand-green-900 bg-brand-green-100 uppercase mb-2.5">
                Clinical Ayurvedic Assessment
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-gray-900">Iron & Blood Vitality Self-Assessment</h2>
            <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto mt-2">
                A personalized clinical screening by Dr. Sajeev Dev to evaluate Rakta Dhatu (blood tissue) vitality, ferritin depletion indicators, and nutrient absorption.
            </p>
        </div>

        <div x-data="ironQuiz()" class="bg-white rounded-3xl shadow-xl p-5 sm:p-8 md:p-10 border border-gray-200/80 relative overflow-hidden" x-cloak>
            
            <!-- Step 0: Intro Screen -->
            <div x-show="step === 0" class="text-center py-4 sm:py-6">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-brand-green-50 text-brand-green-800 rounded-2xl flex items-center justify-center mx-auto mb-5 border border-brand-green-200 shadow-sm">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-serif font-bold text-gray-900 mb-3">Understand Your Body's Iron & Vitality Status</h3>
                <p class="text-sm sm:text-base text-gray-600 max-w-lg mx-auto mb-8 leading-relaxed">
                    Unexplained fatigue, breathlessness on stairs, cold hands, or brittle nails often signal depleted ferritin and sluggish Rakta Dhatu. This quick, confidential assessment walks you through one question at a time and sends your full clinical report directly to your WhatsApp.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 max-w-xl mx-auto mb-8 text-left">
                    <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200">
                        <span class="text-lg block mb-1">⏱️</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-gray-900">Takes 2 Minutes</h4>
                        <p class="text-[11px] text-gray-600 mt-0.5">Quick single-question stepper tailored for you.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-gray-50 border border-gray-200">
                        <span class="text-lg block mb-1">📲</span>
                        <h4 class="font-bold text-xs uppercase tracking-wide text-gray-900">WhatsApp Report</h4>
                        <p class="text-[11px] text-gray-600 mt-0.5">Receive your detailed score & report directly.</p>
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

            <!-- Quiz Stepper Header (Steps 1 to 10) -->
            <div x-show="step >= 1 && step <= 10" class="mb-6">
                <div class="flex items-center justify-between text-xs font-semibold text-gray-500 mb-2">
                    <span class="text-brand-green-800 uppercase tracking-wider font-bold" x-text="stepCategory"></span>
                    <span class="font-bold text-gray-700" x-text="`Step ${step} of 10`"></span>
                </div>
                <div class="h-2 w-full bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-brand-green-700 to-emerald-500 transition-all duration-300 ease-out"
                         :style="`width: ${(step / 10) * 100}%`"></div>
                </div>
            </div>

            <!-- ONE QUESTION AT A TIME -->

            <!-- STEP 1: Full Name -->
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-6">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 1 of 10</span>
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
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 2 of 10</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        2. What is your gender?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Ferritin depletion risks and biological blood volume demands vary by gender:</p>
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
                                <span class="text-xs text-gray-500">Higher monthly iron demand due to menstrual cycle, pregnancy, or postpartum</span>
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
                                <span class="text-xs text-gray-500">Standard ferritin baseline, physical stamina, and muscular oxygenation</span>
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
                                <span class="text-xs text-gray-500">General metabolic vitality and tissue oxygenation evaluation</span>
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
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 3 of 10</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        3. Which age group do you belong to?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Age directly impacts digestive fire (Agni), iron absorption, and daily cellular energy:</p>
                </div>

                <div class="space-y-3">
                    <template x-for="item in [
                        { label: 'Under 18', desc: 'Rapid physical growth and heightened developmental iron requirement' },
                        { label: '18–29', desc: 'Peak physical activity, career entry, reproductive and muscle vitality' },
                        { label: '30–45', desc: 'High-stress working years, busy lifestyle, and hormonal balance' },
                        { label: '46–60', desc: 'Perimenopause / metabolic transition and cellular nourishment phase' },
                        { label: '60+', desc: 'Gentle Agni stage, requiring non-constipating, easy mucosal absorption' }
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
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 4 of 10</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-900 leading-snug">
                        4. What is your WhatsApp phone number?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">We will send your complete personalized clinical score, diagnostic findings, and doctor's advice directly to your WhatsApp:</p>
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

            <!-- STEP 5: Daily Energy Pattern -->
            <div x-show="step === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-5">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 5 of 10</span>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug">
                        5. Which statement best describes your daily energy curve?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Select the option that most closely matches your typical day:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="selectSingle('q1', 0)"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q1 === 0 ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q1 === 0 ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.q1 === 0" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q1 === 0}">Vibrant & Steady Energy</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Consistent stamina from morning until evening with normal wakefulness.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="selectSingle('q1', 1)"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q1 === 1 ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q1 === 1 ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.q1 === 1" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q1 === 1}">Mild Mid-Afternoon Dip</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Feel sluggish between 2 PM and 5 PM, but manage with brief rest or hydration.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="selectSingle('q1', 2)"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q1 === 2 ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q1 === 2 ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.q1 === 2" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q1 === 2}">Wake Up Tired / Morning Heaviness</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Feel drained even after 7–8 hours of sleep; rely heavily on coffee or tea to function.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="selectSingle('q1', 3)"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q1 === 3 ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q1 === 3 ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.q1 === 3" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q1 === 3}">Severe Chronic Exhaustion</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Persistent weakness throughout the day; difficult to complete simple daily routines.</span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- STEP 6: Physical Exertion & Breath -->
            <div x-show="step === 6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-5">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 6 of 10</span>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug">
                        6. How does your breathing respond during light exertion (e.g. stairs, brisk walk)?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Evaluates red blood cell oxygenation throughout your tissues:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="selectSingle('q1_breath', 0)"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q1_breath === 0 ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q1_breath === 0 ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.q1_breath === 0" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q1_breath === 0}">Normal & Comfortable</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">I comfortably climb 2+ flights of stairs or walk briskly without losing my breath.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="selectSingle('q1_breath', 1)"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q1_breath === 1 ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q1_breath === 1 ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.q1_breath === 1" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q1_breath === 1}">Noticeable Breathlessness or Heavy Legs</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Feel winded or experience sudden leg heaviness after just 1 flight of stairs.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="selectSingle('q1_breath', 2)"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q1_breath === 2 ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q1_breath === 2 ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.q1_breath === 2" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q1_breath === 2}">Frequent Breathlessness & Rapid Heartbeat</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Noticeable palpitations, chest thumping, or feeling lightheaded with mild everyday effort.</span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- STEP 7: Physical Biomarkers -->
            <div x-show="step === 7" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-5">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 7 of 10</span>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug">
                        7. Have you observed any of these physical biomarkers recently?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Select all that apply to you (multiple selections allowed):</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <button type="button" 
                            @click="toggleMulti('q2', 'pale')"
                            class="text-left p-3.5 sm:p-4 rounded-2xl border-2 transition-all flex items-start gap-3 cursor-pointer"
                            :class="answers.q2.includes('pale') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q2.includes('pale') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q2.includes('pale')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-xs sm:text-sm block text-gray-900" :class="{'text-emerald-950': answers.q2.includes('pale')}">Pale Inner Eyelids or Gums</span>
                            <span class="text-[11px] text-gray-600 mt-0.5 block">Inner eyelids or gums appear pale pink/white instead of healthy red.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleMulti('q2', 'nails')"
                            class="text-left p-3.5 sm:p-4 rounded-2xl border-2 transition-all flex items-start gap-3 cursor-pointer"
                            :class="answers.q2.includes('nails') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q2.includes('nails') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q2.includes('nails')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-xs sm:text-sm block text-gray-900" :class="{'text-emerald-950': answers.q2.includes('nails')}">Brittle, Peeling, or Ridged Nails</span>
                            <span class="text-[11px] text-gray-600 mt-0.5 block">Nails split easily, feel thin, or show vertical lines/flattening.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleMulti('q2', 'hair')"
                            class="text-left p-3.5 sm:p-4 rounded-2xl border-2 transition-all flex items-start gap-3 cursor-pointer"
                            :class="answers.q2.includes('hair') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q2.includes('hair') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q2.includes('hair')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-xs sm:text-sm block text-gray-900" :class="{'text-emerald-950': answers.q2.includes('hair')}">Unexplained Hair Thinning</span>
                            <span class="text-[11px] text-gray-600 mt-0.5 block">Noticeable shedding while brushing or washing without scalp infection.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleMulti('q2', 'cold')"
                            class="text-left p-3.5 sm:p-4 rounded-2xl border-2 transition-all flex items-start gap-3 cursor-pointer"
                            :class="answers.q2.includes('cold') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q2.includes('cold') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q2.includes('cold')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-xs sm:text-sm block text-gray-900" :class="{'text-emerald-950': answers.q2.includes('cold')}">Cold Hands & Feet</span>
                            <span class="text-[11px] text-gray-600 mt-0.5 block">Extremities feel freezing cold even in normal indoor temperatures.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleMulti('q2', 'dizzy')"
                            class="text-left p-3.5 sm:p-4 rounded-2xl border-2 transition-all flex items-start gap-3 cursor-pointer"
                            :class="answers.q2.includes('dizzy') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q2.includes('dizzy') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q2.includes('dizzy')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-xs sm:text-sm block text-gray-900" :class="{'text-emerald-950': answers.q2.includes('dizzy')}">Postural Lightheadedness</span>
                            <span class="text-[11px] text-gray-600 mt-0.5 block">Feeling dizzy when standing up quickly; recurring dull forehead tension.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleMulti('q2', 'brain_fog')"
                            class="text-left p-3.5 sm:p-4 rounded-2xl border-2 transition-all flex items-start gap-3 cursor-pointer"
                            :class="answers.q2.includes('brain_fog') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q2.includes('brain_fog') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q2.includes('brain_fog')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-xs sm:text-sm block text-gray-900" :class="{'text-emerald-950': answers.q2.includes('brain_fog')}">Brain Fog & Dips in Focus</span>
                            <span class="text-[11px] text-gray-600 mt-0.5 block">Sluggish mental clarity, slower recall, or difficulty concentrating on work.</span>
                        </div>
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <button type="button" 
                            @click="clearMulti('q2')"
                            class="text-xs text-gray-500 hover:text-gray-800 underline underline-offset-2 cursor-pointer">
                        None of these apply to me
                    </button>
                </div>
            </div>

            <!-- STEP 8: Dietary Pattern -->
            <div x-show="step === 8" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-5">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 8 of 10</span>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug">
                        8. What best represents your primary dietary pattern?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Helps estimate baseline intake of bioavailable heme vs. non-heme iron:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="selectSingle('q3_diet', 0)"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q3_diet === 0 ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q3_diet === 0 ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.q3_diet === 0" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q3_diet === 0}">Omnivorous / Mixed Diet</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Regularly consume eggs, poultry, fish, or meat (higher in readily absorbed heme iron).</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="selectSingle('q3_diet', 1)"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q3_diet === 1 ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q3_diet === 1 ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.q3_diet === 1" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q3_diet === 1}">Balanced Vegetarian or Vegan Diet</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Daily variety of lentils, dal, spinach, seeds, nuts, and whole grains.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="selectSingle('q3_diet', 2)"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q3_diet === 2 ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50/60'">
                        <div class="w-5 h-5 rounded-full border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q3_diet === 2 ? 'border-emerald-600 bg-emerald-600' : 'border-gray-300 bg-white'">
                            <div x-show="answers.q3_diet === 2" class="w-2 h-2 rounded-full bg-white"></div>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q3_diet === 2}">Vegetarian with Irregular Meals / Low Iron-Dense Foods</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Irregular meal timings; rarely eat dark greens; higher intake of refined carbs or processed snacks.</span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- STEP 9: Digestion & Absorption Blockers -->
            <div x-show="step === 9" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-5">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 9 of 10</span>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug">
                        9. Do any of these daily digestive or absorption habits apply to you?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">In Ayurveda, blood health depends directly on your digestive fire (Agni) to assimilate nutrients:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="toggleMulti('q3_gut', 'tannins')"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q3_gut.includes('tannins') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q3_gut.includes('tannins') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q3_gut.includes('tannins')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q3_gut.includes('tannins')}">Drink Tea, Coffee, or Milk within 45 mins of meals</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Tannins, polyphenols, and high calcium bind dietary iron and block up to 60% of absorption.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleMulti('q3_gut', 'gut')"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q3_gut.includes('gut') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q3_gut.includes('gut') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q3_gut.includes('gut')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q3_gut.includes('gut')}">Frequent Acidity, Bloating, or Regular Antacid Use</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Natural stomach acid is essential to convert dietary iron into absorbable ferrous form.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleMulti('q3_gut', 'low_vitc')"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q3_gut.includes('low_vitc') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q3_gut.includes('low_vitc') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q3_gut.includes('low_vitc')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q3_gut.includes('low_vitc')}">Rarely consume Vitamin C (Amla, lemon, citrus) with meals</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Ascorbic acid dramatically enhances plant-based non-heme iron absorption.</span>
                        </div>
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <button type="button" 
                            @click="clearMulti('q3_gut')"
                            class="text-xs text-gray-500 hover:text-gray-800 underline underline-offset-2 cursor-pointer">
                        None of these apply to my daily habits
                    </button>
                </div>
            </div>

            <!-- STEP 10: Physiological Factors & Iron Demand -->
            <div x-show="step === 10" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="mb-5">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-green-800 bg-brand-green-100 px-3 py-1 rounded-full inline-block mb-2">Step 10 of 10</span>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug">
                        10. Do any of these physiological factors or health history apply to you?
                    </h3>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Identifies biological life stages or medical factors that accelerate iron depletion:</p>
                </div>

                <div class="space-y-3">
                    <button type="button" 
                            @click="toggleMulti('q4_factors', 'heavy_cycle')"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q4_factors.includes('heavy_cycle') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q4_factors.includes('heavy_cycle') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q4_factors.includes('heavy_cycle')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q4_factors.includes('heavy_cycle')}">Heavy or Extended Menstrual Cycles</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Menstrual bleeding lasting > 5 days, passing blood clots, or soaking pads every 1–2 hours.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleMulti('q4_factors', 'past_anemia')"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q4_factors.includes('past_anemia') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q4_factors.includes('past_anemia') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q4_factors.includes('past_anemia')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q4_factors.includes('past_anemia')}">Past Diagnosis of Low Hemoglobin or Low Ferritin</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Previous laboratory tests showed Hb below 12 g/dL or a doctor advised iron therapy.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleMulti('q4_factors', 'postpartum')"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q4_factors.includes('postpartum') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q4_factors.includes('postpartum') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q4_factors.includes('postpartum')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q4_factors.includes('postpartum')}">Pregnancy, Postpartum, or Lactation Stage</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Substantially elevated biological demand for fetal nourishment or breast milk production.</span>
                        </div>
                    </button>

                    <button type="button" 
                            @click="toggleMulti('q4_factors', 'endurance')"
                            class="w-full text-left p-4 sm:p-5 rounded-2xl border-2 transition-all flex items-start gap-3.5 cursor-pointer"
                            :class="answers.q4_factors.includes('endurance') ? 'border-emerald-600 bg-emerald-50/70 shadow-sm ring-2 ring-emerald-600/20' : 'border-gray-200 bg-white hover:border-gray-300'">
                        <div class="w-5 h-5 rounded-lg border-2 shrink-0 mt-0.5 flex items-center justify-center transition-colors"
                             :class="answers.q4_factors.includes('endurance') ? 'border-emerald-600 bg-emerald-600 text-white' : 'border-gray-300 bg-white'">
                            <svg x-show="answers.q4_factors.includes('endurance')" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-bold text-sm sm:text-base block text-gray-900" :class="{'text-emerald-950': answers.q4_factors.includes('endurance')}">High-Intensity Athletics or Running</span>
                            <span class="text-xs sm:text-sm text-gray-600 mt-0.5 block">Frequent intense cardio and sweating accelerate red blood cell breakdown and iron loss.</span>
                        </div>
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <button type="button" 
                            @click="clearMulti('q4_factors')"
                            class="text-xs text-gray-500 hover:text-gray-800 underline underline-offset-2 cursor-pointer">
                        None of these factors apply to me
                    </button>
                </div>
            </div>

            <!-- Navigation Controls (Bottom Bar for Steps 1-10) -->
            <div class="mt-8 pt-5 border-t border-gray-100 flex items-center justify-between" x-show="step >= 1 && step <= 10">
                <button type="button" 
                        @click="prevStep()" 
                        class="px-5 py-2.5 rounded-xl font-semibold text-xs uppercase tracking-wider text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors border border-gray-200 cursor-pointer">
                    ← Back
                </button>
                
                <button type="button" 
                        @click="nextStep()" 
                        :disabled="!canProceed" 
                        class="px-7 py-3 rounded-xl font-bold text-white transition-all transform active:scale-95 disabled:opacity-40 disabled:cursor-not-allowed shadow-md hover:shadow-lg flex items-center gap-2 cursor-pointer bg-brand-green-800 hover:bg-brand-green-700 text-sm">
                    <span x-text="step === 10 ? 'Complete & View Results' : 'Next Step'"></span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

            <!-- Step 11: Comprehensive Clinical Results Screen -->
            <div x-show="step === 11" style="display: none;" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-98 translate-y-3" x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                
                <!-- Result Status Badge & Summary -->
                <div class="text-center mb-8 pt-2">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full mb-4 shadow-inner ring-8 ring-opacity-20"
                         :class="{
                             'bg-emerald-100 text-emerald-700 ring-emerald-500': result.risk === 'Low Risk',
                             'bg-amber-100 text-amber-700 ring-amber-400': result.risk === 'Moderate Risk',
                             'bg-red-100 text-red-700 ring-red-400': result.risk === 'High Indicator'
                         }">
                        <svg x-show="result.risk === 'Low Risk'" class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        <svg x-show="result.risk !== 'Low Risk'" class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    
                    <div class="flex flex-wrap items-center justify-center gap-2 mb-2.5">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-gray-100 text-gray-800 border border-gray-200" 
                              x-show="profile.name" 
                              x-text="'Patient: ' + profile.name"></span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-gray-100 text-gray-700 border border-gray-200" 
                              x-show="profile.gender" 
                              x-text="profile.gender + ' • ' + (profile.ageGroup || '')"></span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest"
                              :class="{
                                  'bg-emerald-100 text-emerald-800 border border-emerald-300': result.risk === 'Low Risk',
                                  'bg-amber-100 text-amber-800 border border-amber-300': result.risk === 'Moderate Risk',
                                  'bg-red-100 text-red-800 border border-red-300': result.risk === 'High Indicator'
                              }">
                            Score: <span x-text="score"></span> Points
                        </span>
                    </div>

                    <h3 class="text-2xl sm:text-3xl font-serif font-bold text-gray-900 mb-2.5" x-text="result.risk + ' of Iron Depletion'"></h3>
                    <p class="text-sm sm:text-base text-gray-600 max-w-xl mx-auto leading-relaxed" x-text="result.message"></p>
                </div>

                <!-- WHATSAPP REPORT DELIVERY BUTTON -->
                <div class="bg-emerald-50/80 rounded-2xl p-4 sm:p-5 mb-8 border border-emerald-200 text-center flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-left">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-emerald-950 flex items-center gap-1.5">
                            <span>📲</span>
                            <span>Receive Full Assessment Report on WhatsApp</span>
                        </h4>
                        <p class="text-xs text-emerald-800 mt-0.5">
                            Get your complete score, diagnostic findings, and doctor's dosage recommendations on your phone.
                        </p>
                    </div>
                    <a :href="whatsappReportLink" target="_blank" 
                       class="inline-flex items-center justify-center bg-[#25D366] hover:bg-[#1ebd5b] text-white font-bold px-6 py-3 rounded-xl transition-all shadow-sm hover:shadow-md text-xs sm:text-sm gap-2 shrink-0 cursor-pointer">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.976L2 22l5.174-1.357a9.923 9.923 0 004.838 1.259h.005c5.505 0 9.988-4.479 9.988-9.985S17.518 2 12.012 2zM12.012 20.202h-.004a8.273 8.273 0 01-4.223-1.155l-.303-.18-3.138.823.836-3.062-.197-.314A8.252 8.252 0 013.69 11.984C3.691 7.42 7.408 3.702 11.97 3.702c4.545 0 8.243 3.714 8.243 8.283 0 4.56-3.7 8.272-8.201 8.217zM16.55 13.992c-.248-.124-1.472-.727-1.7-.811-.228-.084-.395-.124-.56.124-.167.248-.646.811-.79 9.977-.146.166-.293.187-.54.062-1.071-.539-2.583-1.638-3.197-2.317-.168-.186-.334-.187-.582-.062-.248.125-1.05.388-1.602 1.341-.55 1.05.021 1.554.499 2.502.167.332.083.623-.042.871-.125.248-.56 1.348-.767 1.846-.2.482-.403.417-.56.425-.145.008-.312.008-.479.008a.911.911 0 00-.663.309c-.228.248-.871.851-.871 2.073s.893 2.404 1.018 2.57c.125.166 1.752 2.673 4.246 3.75.594.256 1.057.41 1.419.524.595.189 1.137.162 1.564.098.48-.073 1.472-.602 1.68-1.184.208-.582.208-1.08.146-1.184-.062-.104-.228-.166-.476-.29z"/>
                        </svg>
                        <span>Send to My WhatsApp</span>
                    </a>
                </div>

                <!-- Detected Diagnostic Observations -->
                <div class="bg-gray-50 rounded-2xl p-5 mb-8 border border-gray-200">
                    <h4 class="text-xs font-bold text-gray-900 uppercase tracking-widest mb-3 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-brand-green-800"></span>
                        Key Diagnostic Observations from Your Answers:
                    </h4>
                    <ul class="space-y-2 text-xs sm:text-sm text-gray-700">
                        <template x-for="flag in diagnosticFlags" :key="flag">
                            <li class="flex items-start gap-2.5">
                                <svg class="w-4 h-4 text-brand-green-700 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span x-text="flag"></span>
                            </li>
                        </template>
                    </ul>
                </div>

                <!-- GENTLE & PROFESSIONAL PRODUCT INVITATION -->
                <div class="bg-gradient-to-br from-brand-gold-50 via-white to-brand-green-50/50 rounded-3xl p-6 sm:p-8 mb-8 border border-brand-gold-200 shadow-md relative overflow-hidden">
                    
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-6 h-6 rounded-full bg-brand-green-800 text-white flex items-center justify-center text-xs font-bold">🌿</span>
                        <span class="text-xs font-bold uppercase tracking-wider text-brand-green-900">Dr. Sajeev Dev's Therapeutic Perspective</span>
                    </div>

                    <h4 class="text-xl sm:text-2xl font-serif font-bold text-gray-900 mb-3">
                        A Gentle, Food-Matrix Approach to Restoring Rakta Dhatu
                    </h4>

                    <div class="space-y-3 text-xs sm:text-sm text-gray-700 leading-relaxed mb-6">
                        <p>
                            Many individuals stop taking standard iron supplements because chemical iron tablets (like ferrous sulfate) frequently trigger uncomfortable constipation, stomach burning, and nausea.
                        </p>
                        <p>
                            In Ayurvedic practice, we prioritize <strong>Ahar Kalpana</strong>—delivering micronutrients embedded in an easily digested, natural chocolate matrix that protects the gastric lining and promotes smooth mucosal absorption.
                        </p>
                    </div>

                    <!-- 3 SPECIFIC VEACHOC FORMULATIONS TO EXPERIENCE -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-3">
                            <h5 class="text-xs font-bold uppercase tracking-wider text-brand-green-950">
                                Recommended VeaChoc Formulations to Experience:
                            </h5>
                            <span class="text-[11px] text-brand-gold-700 font-semibold">Clinically Formulated</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            
                            <!-- Product 1: Sugar-Free -->
                            <a href="https://yuvann.com/products/veachoc-sugar-free-rakthapushti-chocolate" 
                               target="_blank"
                               class="group block bg-white rounded-2xl border border-gray-200 hover:border-brand-gold-500 hover:shadow-lg transition-all flex flex-col justify-between overflow-hidden">
                                <div>
                                    <!-- Product Image Container -->
                                    <div class="relative bg-gradient-to-b from-brand-gold-50/40 to-gray-50/70 p-3 flex items-center justify-center border-b border-gray-100 overflow-hidden">
                                        <span class="absolute top-2.5 left-2.5 z-10 px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-800 shadow-2xs">
                                            Sugar-Free
                                        </span>
                                        <span class="absolute top-2.5 right-2.5 z-10 text-xs font-bold text-emerald-900 bg-white/95 px-2 py-0.5 rounded-md shadow-2xs border border-gray-200">
                                            ₹780
                                        </span>
                                        <img src="https://yuvann.com/storage/products/37d1d0f4-1df5-4956-8902-a00b75be0415.webp" 
                                             alt="VeaChoc Sugar-Free Rakthapushti Chocolate" 
                                             loading="lazy"
                                             class="w-full h-44 object-contain group-hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <div class="p-4">
                                        <h6 class="font-serif font-bold text-sm text-gray-900 group-hover:text-brand-green-800 transition-colors line-clamp-2 leading-snug">
                                            VeaChoc Sugar-Free Rakthapushti Chocolate
                                        </h6>
                                        <p class="text-[11px] text-gray-600 mt-1.5 line-clamp-3 leading-relaxed">
                                            Pure blood-nourishing formulation created specifically for sugar-conscious individuals, diabetics, or weight management without compromising iron bioavailability.
                                        </p>
                                    </div>
                                </div>
                                <div class="px-4 pb-4 pt-1">
                                    <div class="w-full py-2 px-3 bg-brand-green-50 group-hover:bg-brand-green-800 text-brand-green-900 group-hover:text-white rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span>View Product</span>
                                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                                    </div>
                                </div>
                            </a>

                            <!-- Product 2: Dark Chocolate Blood Builder -->
                            <a href="https://yuvann.com/products/veachoc-rakthapushti-dark-chocolate-iron-vitamin-c-blood-builder-supplement" 
                               target="_blank"
                               class="group block bg-white rounded-2xl border border-gray-200 hover:border-brand-gold-500 hover:shadow-lg transition-all flex flex-col justify-between overflow-hidden">
                                <div>
                                    <!-- Product Image Container -->
                                    <div class="relative bg-gradient-to-b from-brand-gold-50/40 to-gray-50/70 p-3 flex items-center justify-center border-b border-gray-100 overflow-hidden">
                                        <span class="absolute top-2.5 left-2.5 z-10 px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider bg-amber-100 text-amber-800 shadow-2xs">
                                            Dark Cacao + Vit C
                                        </span>
                                        <span class="absolute top-2.5 right-2.5 z-10 text-xs font-bold text-emerald-900 bg-white/95 px-2 py-0.5 rounded-md shadow-2xs border border-gray-200">
                                            From ₹299
                                        </span>
                                        <img src="https://yuvann.com/storage/products/cb7c2e61-02e4-4988-afff-d8f4c6c17151.webp" 
                                             alt="VeaChoc Rakthapushti Dark Chocolate" 
                                             loading="lazy"
                                             class="w-full h-44 object-contain group-hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <div class="p-4">
                                        <h6 class="font-serif font-bold text-sm text-gray-900 group-hover:text-brand-green-800 transition-colors line-clamp-2 leading-snug">
                                            VeaChoc Rakthapushti Dark Chocolate
                                        </h6>
                                        <p class="text-[11px] text-gray-600 mt-1.5 line-clamp-3 leading-relaxed">
                                            Intense antioxidant dark cacao blended with bioavailable iron and natural Vitamin C co-factors to dramatically enhance red cell oxygenation.
                                        </p>
                                    </div>
                                </div>
                                <div class="px-4 pb-4 pt-1">
                                    <div class="w-full py-2 px-3 bg-brand-green-50 group-hover:bg-brand-green-800 text-brand-green-900 group-hover:text-white rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span>View Product</span>
                                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                                    </div>
                                </div>
                            </a>

                            <!-- Product 3: Milk Chocolate Daily Iron -->
                            <a href="https://yuvann.com/products/veachoc-milk-chocolate-daily-iron-delicious-iron-supplement-with-seeds-nuts-vitamin-c" 
                               target="_blank"
                               class="group block bg-white rounded-2xl border border-gray-200 hover:border-brand-gold-500 hover:shadow-lg transition-all flex flex-col justify-between overflow-hidden">
                                <div>
                                    <!-- Product Image Container -->
                                    <div class="relative bg-gradient-to-b from-brand-gold-50/40 to-gray-50/70 p-3 flex items-center justify-center border-b border-gray-100 overflow-hidden">
                                        <span class="absolute top-2.5 left-2.5 z-10 px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider bg-brand-gold-100 text-brand-gold-800 shadow-2xs">
                                            Seeds & Nuts
                                        </span>
                                        <span class="absolute top-2.5 right-2.5 z-10 text-xs font-bold text-emerald-900 bg-white/95 px-2 py-0.5 rounded-md shadow-2xs border border-gray-200">
                                            From ₹299
                                        </span>
                                        <img src="https://yuvann.com/storage/products/b9314dc9-4c7c-4318-a346-07abbe1b4b52.webp" 
                                             alt="VeaChoc Milk Chocolate Daily Iron" 
                                             loading="lazy"
                                             class="w-full h-44 object-contain group-hover:scale-105 transition-transform duration-300">
                                    </div>
                                    <div class="p-4">
                                        <h6 class="font-serif font-bold text-sm text-gray-900 group-hover:text-brand-green-800 transition-colors line-clamp-2 leading-snug">
                                            VeaChoc Milk Chocolate Daily Iron
                                        </h6>
                                        <p class="text-[11px] text-gray-600 mt-1.5 line-clamp-3 leading-relaxed">
                                            Smooth, delightful daily milk chocolate with crunchy pumpkin seeds, almonds, and Vitamin C. Makes daily Rakta replenishment a treat for the whole family.
                                        </p>
                                    </div>
                                </div>
                                <div class="px-4 pb-4 pt-1">
                                    <div class="w-full py-2 px-3 bg-brand-green-50 group-hover:bg-brand-green-800 text-brand-green-900 group-hover:text-white rounded-xl text-xs font-bold flex items-center justify-between transition-colors">
                                        <span>View Product</span>
                                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>

                    <!-- DIRECT GATEWAY TO VEACHOC SHOP PAGE -->
                    <div class="p-4 sm:p-5 bg-brand-green-900 text-white rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-center sm:text-left">
                            <span class="text-xs font-bold uppercase tracking-widest text-brand-gold-400 block mb-0.5">Explore the Full Collection</span>
                            <h5 class="font-serif font-bold text-base sm:text-lg text-white">Visit the Official VeaChoc Brand Shop</h5>
                            <p class="text-xs text-brand-green-100/80 mt-0.5">
                                Browse all sizes, multi-packs, and complete nutritional facts at <span class="text-brand-gold-300 font-mono">yuvann.com/shops/veachoc</span>
                            </p>
                        </div>
                        <a href="https://yuvann.com/shops/veachoc" 
                           class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-brand-gold-500 hover:bg-brand-gold-400 text-brand-green-950 font-black text-xs sm:text-sm rounded-xl transition-all shadow-md shrink-0 gap-2 cursor-pointer">
                            <span>Explore VeaChoc Shop</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Direct WhatsApp Consultation with Dr. Sajeev Dev -->
                <div class="text-center pt-2">
                    <p class="text-xs sm:text-sm text-gray-600 mb-3 font-medium">Have specific health questions or need dosage advice?</p>
                    <a :href="whatsappReportLink" target="_blank" 
                       class="inline-flex items-center justify-center bg-[#25D366] hover:bg-[#1ebd5b] text-white font-bold px-6 py-3.5 rounded-xl transition-all shadow-sm hover:shadow-md text-sm gap-2.5 w-full sm:w-auto cursor-pointer">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.976L2 22l5.174-1.357a9.923 9.923 0 004.838 1.259h.005c5.505 0 9.988-4.479 9.988-9.985S17.518 2 12.012 2zM12.012 20.202h-.004a8.273 8.273 0 01-4.223-1.155l-.303-.18-3.138.823.836-3.062-.197-.314A8.252 8.252 0 013.69 11.984C3.691 7.42 7.408 3.702 11.97 3.702c4.545 0 8.243 3.714 8.243 8.283 0 4.56-3.7 8.272-8.201 8.217zM16.55 13.992c-.248-.124-1.472-.727-1.7-.811-.228-.084-.395-.124-.56.124-.167.248-.646.811-.79 9.977-.146.166-.293.187-.54.062-1.071-.539-2.583-1.638-3.197-2.317-.168-.186-.334-.187-.582-.062-.248.125-1.05.388-1.602 1.341-.55 1.05.021 1.554.499 2.502.167.332.083.623-.042.871-.125.248-.56 1.348-.767 1.846-.2.482-.403.417-.56.425-.145.008-.312.008-.479.008a.911.911 0 00-.663.309c-.228.248-.871.851-.871 2.073s.893 2.404 1.018 2.57c.125.166 1.752 2.673 4.246 3.75.594.256 1.057.41 1.419.524.595.189 1.137.162 1.564.098.48-.073 1.472-.602 1.68-1.184.208-.582.208-1.08.146-1.184-.062-.104-.228-.166-.476-.29z"/>
                        </svg>
                        <span>Chat with Dr. Sajeev Dev on WhatsApp</span>
                    </a>
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
    function ironQuiz() {
        return {
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
            startQuiz() {
                this.step = 1;
                this.scrollToTop();
            },
            selectSingle(field, value) {
                this.answers[field] = value;
            },
            toggleMulti(field, value) {
                const arr = this.answers[field];
                const index = arr.indexOf(value);
                if (index > -1) {
                    arr.splice(index, 1);
                } else {
                    arr.push(value);
                }
            },
            clearMulti(field) {
                this.answers[field] = [];
                this.nextStep();
            },
            scrollToTop() {
                const el = document.getElementById('iron-test');
                if (el) {
                    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            },
            get stepCategory() {
                if (this.step === 1) return 'Profile: Full Name';
                if (this.step === 2) return 'Profile: Gender';
                if (this.step === 3) return 'Profile: Age Group';
                if (this.step === 4) return 'Contact: WhatsApp';
                if (this.step === 5) return 'Dimension 1: Energy Curve';
                if (this.step === 6) return 'Dimension 1: Exertion & Stamina';
                if (this.step === 7) return 'Dimension 2: Physical Signs';
                if (this.step === 8) return 'Dimension 3: Dietary Pattern';
                if (this.step === 9) return 'Dimension 3: Digestive Absorption';
                if (this.step === 10) return 'Dimension 4: Life Stage Factors';
                return 'Assessment';
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
                this.profile = {
                    name: '',
                    gender: '',
                    ageGroup: '',
                    phone: ''
                };
                this.answers = {
                    q1: null,
                    q1_breath: null,
                    q2: [],
                    q3_diet: null,
                    q3_gut: [],
                    q4_factors: []
                };
                this.scrollToTop();
            },
            get score() {
                let s = 0;
                // Question 1: Energy
                if (this.answers.q1 === 1) s += 1;
                if (this.answers.q1 === 2) s += 2.5;
                if (this.answers.q1 === 3) s += 4;

                // Question 2: Breath
                if (this.answers.q1_breath === 1) s += 1.5;
                if (this.answers.q1_breath === 2) s += 3;

                // Question 3: Physical signs
                if (this.answers.q2.includes('pale')) s += 2.5;
                if (this.answers.q2.includes('nails')) s += 2;
                if (this.answers.q2.includes('hair')) s += 1.5;
                if (this.answers.q2.includes('cold')) s += 1.5;
                if (this.answers.q2.includes('dizzy')) s += 2;
                if (this.answers.q2.includes('brain_fog')) s += 1.5;

                // Question 4: Diet
                if (this.answers.q3_diet === 1) s += 1;
                if (this.answers.q3_diet === 2) s += 2.5;

                // Question 5: Gut / Absorption
                if (this.answers.q3_gut.includes('tannins')) s += 2;
                if (this.answers.q3_gut.includes('gut')) s += 2;
                if (this.answers.q3_gut.includes('low_vitc')) s += 1;

                // Question 6: Physiological
                if (this.answers.q4_factors.includes('heavy_cycle')) s += 3.5;
                if (this.answers.q4_factors.includes('past_anemia')) s += 3;
                if (this.answers.q4_factors.includes('postpartum')) s += 2.5;
                if (this.answers.q4_factors.includes('endurance')) s += 1.5;

                return Math.round(s * 10) / 10;
            },
            get result() {
                let risk = 'Low Risk';
                let message = 'Your vital energy indicators and cellular oxygenation reflect healthy Rakta Dhatu balance. Continuing balanced digestive habits and wholesome nutrition supports consistent stamina.';
                
                if (this.score >= 8.5) {
                    risk = 'High Indicator';
                    message = 'Your reported symptoms and physical markers strongly indicate depleted ferritin stores and weakened Rakta Dhatu. Introducing gentle, bioavailable nutritional support without digestive side effects is highly recommended.';
                } else if (this.score >= 4) {
                    risk = 'Moderate Risk';
                    message = 'You are displaying early signs of iron depletion and suboptimal blood nourishment. Addressing absorption inhibitors and incorporating daily food-matrix iron will help prevent further exhaustion.';
                }
                
                return { risk, message };
            },
            get diagnosticFlags() {
                let flags = [];
                if (this.answers.q1 >= 2) flags.push("Elevated chronic fatigue and unrefreshed mornings flag low tissue oxygenation.");
                if (this.answers.q1_breath >= 1) flags.push("Exertional shortness of breath suggests reduced red blood cell oxygen-carrying capacity.");
                if (this.answers.q2.includes('pale')) flags.push("Pallor of conjunctiva/mucous membranes is a hallmark physical sign of depleted hemoglobin.");
                if (this.answers.q2.includes('nails') || this.answers.q2.includes('hair')) flags.push("Brittle nails and diffuse hair shedding point to long-standing low ferritin stores.");
                if (this.answers.q2.includes('cold')) flags.push("Persistent cold extremities indicate reduced peripheral Rakta circulation.");
                if (this.answers.q3_gut.includes('tannins')) flags.push("Post-meal tea/coffee/milk consumption is inhibiting up to 60% of dietary iron absorption.");
                if (this.answers.q3_gut.includes('gut')) flags.push("Compromised stomach acidity or antacid usage impairs conversion to absorbable ferrous iron.");
                if (this.answers.q4_factors.includes('heavy_cycle')) flags.push("Heavy menstrual cycles substantially increase monthly blood and ferritin loss.");
                if (this.answers.q4_factors.includes('past_anemia')) flags.push("Prior history of anemia increases predisposition to recurrent iron dips.");
                if (flags.length === 0) {
                    flags.push("No severe depletion indicators detected; your current biomarkers are within a balanced range.");
                    flags.push("Continue nourishing meals and balanced digestive habits to maintain optimal Rakta vitality.");
                }
                return flags;
            },
            get whatsappReportLink() {
                const clinicPhone = "917736609299";
                let text = `🌿 *YUVANN CLINICAL REPORT: IRON & BLOOD VITALITY*\n`;
                text += `----------------------------------------\n`;
                text += `👤 *Patient:* ${this.profile.name || 'Anonymous'}\n`;
                text += `⚧ *Gender:* ${this.profile.gender || 'Not specified'} | *Age Group:* ${this.profile.ageGroup || 'Not specified'}\n`;
                text += `📱 *WhatsApp:* +91 ${this.profile.phone || ''}\n\n`;
                
                text += `📊 *Assessment Result:* ${this.result.risk} (Score: ${this.score} pts)\n`;
                text += `📝 *Clinical Summary:* ${this.result.message}\n\n`;
                
                text += `📋 *Key Observations:*\n`;
                this.diagnosticFlags.forEach(f => {
                    text += `• ${f}\n`;
                });
                
                text += `\n🍫 *Recommended VeaChoc Products to Experience:*\n`;
                text += `1. *Sugar-Free Rakthapushti Chocolate:*\nhttps://yuvann.com/products/veachoc-sugar-free-rakthapushti-chocolate\n`;
                text += `2. *Dark Chocolate (Iron + Vit C):*\nhttps://yuvann.com/products/veachoc-rakthapushti-dark-chocolate-iron-vitamin-c-blood-builder-supplement\n`;
                text += `3. *Milk Chocolate Daily Iron:*\nhttps://yuvann.com/products/veachoc-milk-chocolate-daily-iron-delicious-iron-supplement-with-seeds-nuts-vitamin-c\n\n`;
                
                text += `🛒 *Complete VeaChoc Shop Page:*\nhttps://yuvann.com/shops/veachoc\n\n`;
                text += `Hello Dr. Sajeev Dev, please guide me on the ideal VeaChoc formulation and daily dosage for my report!`;
                
                return `https://wa.me/${clinicPhone}?text=${encodeURIComponent(text)}`;
            }
        }
    }
</script>
