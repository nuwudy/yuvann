<section id="diet-plan-test" class="py-20 bg-brand-green-900 relative text-white">
    <!-- Background accents -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-emerald-800/30 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 right-0 w-80 h-80 bg-brand-gold-900/30 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-brand-gold-400 mb-4">Ayurvedic Diet Plan Finder</h2>
            <p class="text-lg text-brand-green-100 max-w-2xl mx-auto">
                Generate your personalized daily meal blueprint based on your Dosha, digestion, and lifestyle.
            </p>
        </div>

        <div x-data="dietPlanFinder()" class="bg-brand-green-800/80 backdrop-blur-md rounded-3xl shadow-2xl p-6 md:p-10 border border-brand-green-700 relative overflow-hidden" x-cloak>
            
            <!-- Progress Bar -->
            <div class="mb-8" x-show="step <= totalSteps">
                <div class="h-2 w-full bg-brand-green-900 rounded-full overflow-hidden shadow-inner">
                    <div class="h-full bg-gradient-to-r from-brand-gold-600 to-brand-gold-400 transition-all duration-500 ease-out"
                         :style="`width: ${(step / totalSteps) * 100}%`"></div>
                </div>
                <div class="mt-2 text-xs font-bold text-brand-gold-500 text-right uppercase tracking-widest" x-text="`Step ${step} of ${totalSteps}`"></div>
            </div>

            <!-- Step 1: Goals & Diet -->
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-4">
                <h3 class="text-2xl font-semibold mb-6 text-white">Your Health Goal & Diet</h3>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-brand-gold-400 mb-3 uppercase tracking-wider">Primary Health Goal</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <template x-for="goal in ['Fat Loss (Medo Hara)', 'Blood Nourishment (Rakta)', 'Gut Detox (Ama Pachana)', 'Rejuvenation (Rasayana)']">
                                <label class="block p-4 border border-brand-green-600 rounded-xl cursor-pointer hover:border-brand-gold-500 hover:bg-brand-green-700 transition-all duration-200"
                                       :class="{'border-brand-gold-400 bg-brand-green-700 ring-1 ring-brand-gold-400': answers.goal === goal}">
                                    <input type="radio" class="hidden" x-model="answers.goal" :value="goal">
                                    <span class="font-medium text-white" x-text="goal"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-brand-gold-400 mb-3 uppercase tracking-wider">Dietary Preference</label>
                        <div class="flex gap-4">
                            <label class="flex-1 p-4 border border-brand-green-600 rounded-xl cursor-pointer hover:border-brand-gold-500 hover:bg-brand-green-700 text-center transition-all duration-200"
                                   :class="{'border-brand-gold-400 bg-brand-green-700 ring-1 ring-brand-gold-400': answers.diet === 'Vegetarian'}">
                                <input type="radio" class="hidden" x-model="answers.diet" value="Vegetarian">
                                <span class="font-medium text-white">Vegetarian</span>
                            </label>
                            <label class="flex-1 p-4 border border-brand-green-600 rounded-xl cursor-pointer hover:border-brand-gold-500 hover:bg-brand-green-700 text-center transition-all duration-200"
                                   :class="{'border-brand-gold-400 bg-brand-green-700 ring-1 ring-brand-gold-400': answers.diet === 'Non-Vegetarian'}">
                                <input type="radio" class="hidden" x-model="answers.diet" value="Non-Vegetarian">
                                <span class="font-medium text-white">Non-Vegetarian</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2: Digestion -->
            <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-4">
                <h3 class="text-2xl font-semibold mb-6 text-white">Post-Meal Digestion</h3>
                
                <p class="text-brand-green-100 mb-4">How do you usually feel 1-2 hours after a heavy meal?</p>
                <div class="space-y-3">
                    <label class="flex items-start p-4 border border-brand-green-600 rounded-xl cursor-pointer hover:bg-brand-green-700" :class="{'border-brand-gold-400 bg-brand-green-700': answers.digestion === 'Manda'}">
                        <input type="radio" class="mt-1" x-model="answers.digestion" value="Manda">
                        <div class="ml-3">
                            <span class="font-bold block text-brand-gold-300">Heavy & Sluggish (Manda Agni)</span>
                            <span class="text-sm text-brand-green-200">I feel sleepy, full, and digestion takes a very long time.</span>
                        </div>
                    </label>
                    <label class="flex items-start p-4 border border-brand-green-600 rounded-xl cursor-pointer hover:bg-brand-green-700" :class="{'border-brand-gold-400 bg-brand-green-700': answers.digestion === 'Tikshna'}">
                        <input type="radio" class="mt-1" x-model="answers.digestion" value="Tikshna">
                        <div class="ml-3">
                            <span class="font-bold block text-brand-gold-300">Acidic & Hot (Tikshna Agni)</span>
                            <span class="text-sm text-brand-green-200">I digest quickly but often experience heartburn or acidity.</span>
                        </div>
                    </label>
                    <label class="flex items-start p-4 border border-brand-green-600 rounded-xl cursor-pointer hover:bg-brand-green-700" :class="{'border-brand-gold-400 bg-brand-green-700': answers.digestion === 'Vishama'}">
                        <input type="radio" class="mt-1" x-model="answers.digestion" value="Vishama">
                        <div class="ml-3">
                            <span class="font-bold block text-brand-gold-300">Bloated & Gassy (Vishama Agni)</span>
                            <span class="text-sm text-brand-green-200">My stomach swells up, and I feel uncomfortable or gassy.</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Step 3: Sensitivities -->
            <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-4">
                <h3 class="text-2xl font-semibold mb-6 text-white">Daily Sensitivities</h3>
                
                <p class="text-brand-green-100 mb-4">Select any issues you frequently experience (optional):</p>
                <div class="space-y-3">
                    <label class="flex items-start p-4 border border-brand-green-600 rounded-xl cursor-pointer hover:bg-brand-green-700" :class="{'border-brand-gold-400 bg-brand-green-700': answers.sensitivities.includes('Sugar Slumps')}">
                        <div class="flex items-center h-5">
                            <input type="checkbox" class="w-5 h-5 text-brand-gold-500 bg-transparent border-brand-green-500 rounded focus:ring-brand-gold-500" x-model="answers.sensitivities" value="Sugar Slumps">
                        </div>
                        <div class="ml-3">
                            <span class="font-medium text-white block">Sugar Slumps & Cravings</span>
                        </div>
                    </label>
                    <label class="flex items-start p-4 border border-brand-green-600 rounded-xl cursor-pointer hover:bg-brand-green-700" :class="{'border-brand-gold-400 bg-brand-green-700': answers.sensitivities.includes('Low Energy')}">
                        <div class="flex items-center h-5">
                            <input type="checkbox" class="w-5 h-5 text-brand-gold-500 bg-transparent border-brand-green-500 rounded focus:ring-brand-gold-500" x-model="answers.sensitivities" value="Low Energy">
                        </div>
                        <div class="ml-3">
                            <span class="font-medium text-white block">Persistent Low Energy / Fatigue</span>
                        </div>
                    </label>
                    <label class="flex items-start p-4 border border-brand-green-600 rounded-xl cursor-pointer hover:bg-brand-green-700" :class="{'border-brand-gold-400 bg-brand-green-700': answers.sensitivities.includes('Constipation')}">
                        <div class="flex items-center h-5">
                            <input type="checkbox" class="w-5 h-5 text-brand-gold-500 bg-transparent border-brand-green-500 rounded focus:ring-brand-gold-500" x-model="answers.sensitivities" value="Constipation">
                        </div>
                        <div class="ml-3">
                            <span class="font-medium text-white block">Constipation or Irregular Bowels</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="mt-10 flex justify-between items-center" x-show="step <= totalSteps">
                <button @click="step--" 
                        class="px-6 py-2.5 rounded-xl font-medium text-brand-green-200 hover:text-white hover:bg-brand-green-700 transition-colors"
                        :class="{'invisible': step === 1}">
                    Back
                </button>
                
                <button @click="nextStep" :disabled="!canProceed" 
                        class="px-8 py-3 rounded-xl font-semibold text-brand-green-900 transition-all transform active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed bg-brand-gold-500 hover:bg-brand-gold-400 shadow-md">
                    <span x-text="step === totalSteps ? 'Generate Blueprint' : 'Continue'"></span>
                </button>
            </div>

            <!-- Step 4: Results (Blueprint) -->
            <div x-show="step === 4" style="display: none;" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 scale-95 translate-y-4" x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                <div class="text-center mb-10">
                    <h3 class="text-3xl font-bold text-brand-gold-400 mb-2">Your Daily Meal Blueprint</h3>
                    <p class="text-brand-green-100">A foundational guide to balance your Agni and achieve your goals.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
                    <!-- Morning -->
                    <div class="bg-brand-green-900/50 rounded-2xl p-5 border border-brand-green-700">
                        <div class="text-brand-gold-400 mb-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-2">Morning Detox</h4>
                        <p class="text-brand-green-100 text-sm leading-relaxed" x-text="blueprint.morning"></p>
                    </div>

                    <!-- Midday -->
                    <div class="bg-brand-green-900/50 rounded-2xl p-5 border border-brand-green-700">
                        <div class="text-brand-gold-400 mb-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-2">Healing Lunch</h4>
                        <p class="text-brand-green-100 text-sm leading-relaxed" x-text="blueprint.lunch"></p>
                    </div>

                    <!-- Evening -->
                    <div class="bg-brand-green-900/50 rounded-2xl p-5 border border-brand-green-700">
                        <div class="text-brand-gold-400 mb-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-2">Light Dinner</h4>
                        <p class="text-brand-green-100 text-sm leading-relaxed" x-text="blueprint.dinner"></p>
                    </div>
                </div>

                <!-- WhatsApp CTA -->
                <div class="bg-emerald-600 rounded-3xl p-8 text-center text-white relative overflow-hidden shadow-2xl">
                    <div class="relative z-10">
                        <h4 class="text-2xl font-bold mb-4 text-white">Unlock Your 7-Day Custom Diet Chart</h4>
                        <p class="text-emerald-100 mb-8 max-w-xl mx-auto font-medium">
                            This is just a 1-day blueprint. Send these results to Dr. Sajeev Dev on WhatsApp to receive your full, personalized 7-day Ayurvedic diet plan.
                        </p>
                        <a :href="whatsappLink" target="_blank" class="inline-flex items-center justify-center bg-[#25D366] text-white font-bold px-8 py-4 rounded-xl hover:bg-[#1ebd5b] transition-all duration-300 shadow-lg hover:shadow-[#25d366]/40 transform hover:-translate-y-1 w-full md:w-auto text-lg group border-2 border-[#33e275]">
                            <svg class="w-7 h-7 mr-3 fill-current group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24"><path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.976L2 22l5.174-1.357a9.923 9.923 0 004.838 1.259h.005c5.505 0 9.988-4.479 9.988-9.985S17.518 2 12.012 2zM12.012 20.202h-.004a8.273 8.273 0 01-4.223-1.155l-.303-.18-3.138.823.836-3.062-.197-.314A8.252 8.252 0 013.69 11.984C3.691 7.42 7.408 3.702 11.97 3.702c4.545 0 8.243 3.714 8.243 8.283 0 4.56-3.7 8.272-8.201 8.217zM16.55 13.992c-.248-.124-1.472-.727-1.7-.811-.228-.084-.395-.124-.56.124-.167.248-.646.811-.79 9.977-.146.166-.293.187-.54.062-1.071-.539-2.583-1.638-3.197-2.317-.168-.186-.334-.187-.582-.062-.248.125-1.05.388-1.602 1.341-.55 1.05.021 1.554.499 2.502.167.332.083.623-.042.871-.125.248-.56 1.348-.767 1.846-.2.482-.403.417-.56.425-.145.008-.312.008-.479.008a.911.911 0 00-.663.309c-.228.248-.871.851-.871 2.073s.893 2.404 1.018 2.57c.125.166 1.752 2.673 4.246 3.75.594.256 1.057.41 1.419.524.595.189 1.137.162 1.564.098.48-.073 1.472-.602 1.68-1.184.208-.582.208-1.08.146-1.184-.062-.104-.228-.166-.476-.29z"></path></svg>
                            Get 7-Day Diet Chart
                        </a>
                    </div>
                </div>
                
                <div class="mt-8 text-center">
                    <button @click="resetQuiz" class="text-sm text-brand-gold-500 hover:text-brand-gold-300 font-medium underline underline-offset-4 transition-colors">
                        Restart Finder
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
    function dietPlanFinder() {
        return {
            step: 1,
            totalSteps: 3,
            answers: {
                goal: '',
                diet: '',
                digestion: '',
                sensitivities: []
            },
            get canProceed() {
                if (this.step === 1) return this.answers.goal !== '' && this.answers.diet !== '';
                if (this.step === 2) return this.answers.digestion !== '';
                if (this.step === 3) return true; // Optional
                return false;
            },
            nextStep() {
                if (this.canProceed && this.step <= this.totalSteps) {
                    this.step++;
                }
            },
            resetQuiz() {
                this.step = 1;
                this.answers = { goal: '', diet: '', digestion: '', sensitivities: [] };
            },
            get blueprint() {
                let morning = 'Warm water with CCF (Cumin, Coriander, Fennel) seeds to ignite digestive fire gently.';
                let lunch = 'Warm, cooked grains (like quinoa or rice) with seasonal vegetables and mild spices.';
                let dinner = 'Light soup or well-cooked lentil broth (Dal) before 7 PM to ensure complete digestion before sleep.';
                
                // Adjust based on digestion
                if (this.answers.digestion === 'Manda') {
                    morning = 'Warm water with ginger and honey to kickstart sluggish metabolism (Ama Pachana).';
                    lunch = 'Spice-rich meals using black pepper, ginger, and garlic to stimulate Agni.';
                } else if (this.answers.digestion === 'Tikshna') {
                    morning = 'Room temperature water or coriander seed water. Avoid strong ginger/lemon.';
                    lunch = 'Cooling foods: ghee, coconut, green leafy vegetables. Avoid excessive chili/spices.';
                } else if (this.answers.digestion === 'Vishama') {
                    morning = 'Warm water with a pinch of rock salt and ghee to ground Vata and relieve gas.';
                    lunch = 'Warm, soupy, and mildly oily meals (like Khichdi) with cumin and asafoetida (hing).';
                }
                
                // Adjust based on diet preference
                if (this.answers.diet === 'Non-Vegetarian' && this.answers.goal !== 'Gut Detox (Ama Pachana)') {
                    lunch += ' Include light, easy-to-digest bone broth or lean white meat cooked with turmeric.';
                }
                
                return { morning, lunch, dinner };
            },
            get whatsappLink() {
                const phone = "917736609299";
                let text = `Hello Dr. Sajeev Dev, I completed the *Ayurvedic Diet Plan Finder* on Yuvann.\n\n`;
                text += `*My Profile:*\n`;
                text += `- Goal: ${this.answers.goal}\n`;
                text += `- Diet: ${this.answers.diet}\n`;
                text += `- Digestion (Agni): ${this.answers.digestion}\n`;
                
                if (this.answers.sensitivities.length > 0) {
                    text += `- Sensitivities: ${this.answers.sensitivities.join(', ')}\n`;
                }
                
                text += `\nPlease send me the complete 7-Day Personalized Diet Chart!`;
                
                return `https://wa.me/${phone}?text=${encodeURIComponent(text)}`;
            }
        }
    }
</script>
