<section id="bmi-assessment" class="py-20 bg-brand-green-50 relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-brand-green-900 mb-4">Ayurvedic BMI & Prakriti Assessment</h2>
            <p class="text-lg text-brand-green-700 max-w-2xl mx-auto">
                Discover your body type, digestive fire (Agni), and optimal weight range based on Asian-Indian BMI standards.
            </p>
        </div>

        <div x-data="bmiAssessment()" class="bg-white rounded-3xl shadow-xl p-6 md:p-10 border border-brand-green-100 relative overflow-hidden" x-cloak>
            
            <!-- Progress Bar -->
            <div class="mb-8" x-show="step <= totalSteps">
                <div class="h-2 w-full bg-brand-green-50 rounded-full overflow-hidden shadow-inner">
                    <div class="h-full bg-gradient-to-r from-emerald-400 to-emerald-600 transition-all duration-500 ease-out"
                         :style="`width: ${(step / totalSteps) * 100}%`"></div>
                </div>
                <div class="mt-2 text-xs font-bold text-brand-green-600 text-right uppercase tracking-widest" x-text="`Step ${step} of ${totalSteps}`"></div>
            </div>

            <!-- Step 1: Basic Stats -->
            <div x-show="step === 1" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-4">
                <h3 class="text-2xl font-semibold mb-6 text-brand-green-900">Your Body Metrics</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-brand-green-800 mb-2">Gender</label>
                        <select x-model="answers.gender" class="w-full bg-brand-green-50 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-0 rounded-xl px-4 py-3">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-brand-green-800 mb-2">Age</label>
                        <input type="number" x-model="answers.age" placeholder="e.g. 35" class="w-full bg-brand-green-50 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-0 rounded-xl px-4 py-3">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-brand-green-800 mb-2">Height (cm)</label>
                        <input type="number" x-model="answers.height" placeholder="e.g. 170" class="w-full bg-brand-green-50 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-0 rounded-xl px-4 py-3">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-brand-green-800 mb-2">Weight (kg)</label>
                        <input type="number" x-model="answers.weight" placeholder="e.g. 68" class="w-full bg-brand-green-50 border-transparent focus:border-emerald-500 focus:bg-white focus:ring-0 rounded-xl px-4 py-3">
                    </div>
                </div>
            </div>

            <!-- Step 2: Goal -->
            <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-4">
                <h3 class="text-2xl font-semibold mb-6 text-brand-green-900">What is your primary health goal?</h3>
                <div class="space-y-4">
                    <template x-for="goal in ['Weight Loss (Fat Reduction)', 'Weight Gain (Building Mass)', 'Maintaining Vitality & Health', 'Managing Digestion/Gut Issues']">
                        <label class="block p-5 border-2 border-brand-green-100 rounded-2xl cursor-pointer hover:border-emerald-400 hover:shadow-md transition-all duration-200"
                               :class="{'border-emerald-500 bg-emerald-50': answers.goal === goal}">
                            <input type="radio" class="hidden" x-model="answers.goal" :value="goal">
                            <span class="font-medium text-brand-green-900" x-text="goal"></span>
                        </label>
                    </template>
                </div>
            </div>

            <!-- Step 3: Agni & Dosha -->
            <div x-show="step === 3" style="display: none;" x-transition:enter="transition ease-out duration-300 delay-100" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-4">
                <h3 class="text-2xl font-semibold mb-6 text-brand-green-900">Digestion & Tendencies</h3>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-brand-green-800 mb-3">How is your digestion (Agni)?</label>
                    <div class="space-y-3">
                        <label class="flex items-start p-4 border rounded-xl cursor-pointer" :class="{'border-brand-gold-500 bg-brand-gold-50': answers.agni === 'Tikshna'}">
                            <input type="radio" class="mt-1" x-model="answers.agni" value="Tikshna">
                            <div class="ml-3">
                                <span class="font-bold block text-brand-green-900">Strong/Sharp (Tikshna)</span>
                                <span class="text-sm text-brand-green-700">I get hungry frequently and can digest almost anything. Sometimes suffer from acidity.</span>
                            </div>
                        </label>
                        <label class="flex items-start p-4 border rounded-xl cursor-pointer" :class="{'border-brand-gold-500 bg-brand-gold-50': answers.agni === 'Manda'}">
                            <input type="radio" class="mt-1" x-model="answers.agni" value="Manda">
                            <div class="ml-3">
                                <span class="font-bold block text-brand-green-900">Slow/Sluggish (Manda)</span>
                                <span class="text-sm text-brand-green-700">I rarely feel very hungry. Digestion is slow, often feel heavy after meals.</span>
                            </div>
                        </label>
                        <label class="flex items-start p-4 border rounded-xl cursor-pointer" :class="{'border-brand-gold-500 bg-brand-gold-50': answers.agni === 'Vishama'}">
                            <input type="radio" class="mt-1" x-model="answers.agni" value="Vishama">
                            <div class="ml-3">
                                <span class="font-bold block text-brand-green-900">Irregular (Vishama)</span>
                                <span class="text-sm text-brand-green-700">My appetite fluctuates. Sometimes strong, sometimes weak. Often experience bloating.</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="mt-10 flex justify-between items-center" x-show="step <= totalSteps">
                <button @click="step--" 
                        class="px-6 py-2.5 rounded-xl font-medium text-brand-green-700 hover:bg-brand-green-100 transition-colors"
                        :class="{'invisible': step === 1}">
                    Back
                </button>
                
                <button @click="nextStep" :disabled="!canProceed" 
                        class="px-8 py-3 rounded-xl font-semibold text-white transition-all transform active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed bg-emerald-600 hover:bg-emerald-700 shadow-md">
                    <span x-text="step === totalSteps ? 'See Results' : 'Continue'"></span>
                </button>
            </div>

            <!-- Step 4: Results -->
            <div x-show="step === 4" style="display: none;" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 scale-95 translate-y-4" x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                <div class="text-center mb-10">
                    <h3 class="text-3xl font-bold text-brand-green-900 mb-2">Your Ayurvedic Assessment Profile</h3>
                    <p class="text-brand-green-700">Based on Asian-Indian parameters.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                    <!-- BMI Card -->
                    <div class="bg-brand-green-50 rounded-2xl p-6 border border-brand-green-100 text-center">
                        <span class="text-sm font-bold text-brand-green-600 uppercase tracking-widest block mb-2">Your BMI</span>
                        <div class="text-5xl font-black text-brand-green-900 mb-4" x-text="bmiResult.value"></div>
                        <div class="inline-block px-4 py-1.5 rounded-full text-sm font-bold shadow-sm mb-4"
                             :class="{
                                 'bg-blue-100 text-blue-700': bmiResult.category === 'Underweight',
                                 'bg-emerald-100 text-emerald-700': bmiResult.category === 'Normal (Healthy Weight)',
                                 'bg-amber-100 text-amber-700': bmiResult.category === 'Overweight',
                                 'bg-red-100 text-red-700': bmiResult.category === 'Obese'
                             }" x-text="bmiResult.category">
                        </div>
                        <p class="text-sm text-brand-green-800" x-text="bmiResult.message"></p>
                    </div>

                    <!-- Agni / Dosha Card -->
                    <div class="bg-brand-gold-50 rounded-2xl p-6 border border-brand-gold-200">
                        <span class="text-sm font-bold text-brand-gold-700 uppercase tracking-widest block mb-4">Ayurvedic Insight</span>
                        <h4 class="text-xl font-bold text-brand-green-900 mb-2">Agni: <span x-text="answers.agni"></span></h4>
                        <p class="text-brand-green-800 mb-4 text-sm leading-relaxed" x-text="agniAnalysis"></p>
                        
                        <h4 class="text-sm font-bold text-brand-green-900 mb-1">Primary Dietary Pointer:</h4>
                        <p class="text-brand-green-800 text-sm italic" x-text="dietaryPointer"></p>
                    </div>
                </div>

                <!-- WhatsApp CTA -->
                <div class="bg-emerald-900 rounded-3xl p-8 text-center text-white relative overflow-hidden shadow-2xl">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                    <div class="relative z-10">
                        <h4 class="text-2xl font-bold mb-4">Get Your Personalized Action Plan</h4>
                        <p class="text-emerald-100 mb-8 max-w-xl mx-auto">
                            Share these results directly with Dr. Sajeev Dev for a custom diet chart, lifestyle recommendations, and holistic wellness guidance.
                        </p>
                        <a :href="whatsappLink" target="_blank" class="inline-flex items-center justify-center bg-[#25D366] text-white font-bold px-8 py-4 rounded-xl hover:bg-[#1ebd5b] transition-all duration-300 shadow-lg hover:shadow-[#25d366]/40 transform hover:-translate-y-1 w-full md:w-auto text-lg group">
                            <svg class="w-7 h-7 mr-3 fill-current group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24"><path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.964 9.964 0 001.333 4.976L2 22l5.174-1.357a9.923 9.923 0 004.838 1.259h.005c5.505 0 9.988-4.479 9.988-9.985S17.518 2 12.012 2zM12.012 20.202h-.004a8.273 8.273 0 01-4.223-1.155l-.303-.18-3.138.823.836-3.062-.197-.314A8.252 8.252 0 013.69 11.984C3.691 7.42 7.408 3.702 11.97 3.702c4.545 0 8.243 3.714 8.243 8.283 0 4.56-3.7 8.272-8.201 8.217zM16.55 13.992c-.248-.124-1.472-.727-1.7-.811-.228-.084-.395-.124-.56.124-.167.248-.646.811-.79 9.977-.146.166-.293.187-.54.062-1.071-.539-2.583-1.638-3.197-2.317-.168-.186-.334-.187-.582-.062-.248.125-1.05.388-1.602 1.341-.55 1.05.021 1.554.499 2.502.167.332.083.623-.042.871-.125.248-.56 1.348-.767 1.846-.2.482-.403.417-.56.425-.145.008-.312.008-.479.008a.911.911 0 00-.663.309c-.228.248-.871.851-.871 2.073s.893 2.404 1.018 2.57c.125.166 1.752 2.673 4.246 3.75.594.256 1.057.41 1.419.524.595.189 1.137.162 1.564.098.48-.073 1.472-.602 1.68-1.184.208-.582.208-1.08.146-1.184-.062-.104-.228-.166-.476-.29z"></path></svg>
                            Consult Dr. Sajeev Dev
                        </a>
                    </div>
                </div>
                
                <div class="mt-8 text-center">
                    <button @click="resetQuiz" class="text-sm text-brand-green-600 hover:text-brand-green-900 font-medium underline underline-offset-4 transition-colors">
                        Retake Assessment
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
    function bmiAssessment() {
        return {
            step: 1,
            totalSteps: 3,
            answers: {
                gender: '',
                age: '',
                height: '',
                weight: '',
                goal: '',
                agni: ''
            },
            get canProceed() {
                if (this.step === 1) return this.answers.gender && this.answers.age && this.answers.height && this.answers.weight;
                if (this.step === 2) return this.answers.goal !== '';
                if (this.step === 3) return this.answers.agni !== '';
                return false;
            },
            nextStep() {
                if (this.canProceed && this.step <= this.totalSteps) {
                    this.step++;
                }
            },
            resetQuiz() {
                this.step = 1;
                this.answers = { gender: '', age: '', height: '', weight: '', goal: '', agni: '' };
            },
            get bmiResult() {
                const h = parseFloat(this.answers.height) / 100;
                const w = parseFloat(this.answers.weight);
                if (!h || !w) return { value: '0', category: 'Unknown', message: '' };
                
                const bmi = (w / (h * h)).toFixed(1);
                let category = '';
                let message = '';
                
                // Asian-Indian BMI classification
                if (bmi < 18.5) {
                    category = 'Underweight';
                    message = 'You are below the healthy weight range. Focus on nourishing, building foods (Brimhana).';
                } else if (bmi >= 18.5 && bmi <= 22.9) {
                    category = 'Normal (Healthy Weight)';
                    message = 'You are within the optimal healthy range. Maintain your balance with seasonal routines.';
                } else if (bmi >= 23.0 && bmi <= 24.9) {
                    category = 'Overweight';
                    message = 'You are slightly above the healthy range. Consider mild detox (Langhana) and active lifestyle.';
                } else {
                    category = 'Obese';
                    message = 'You are above the healthy range. Structured Ayurvedic weight management is recommended.';
                }
                
                return { value: bmi, category, message };
            },
            get agniAnalysis() {
                if (this.answers.agni === 'Tikshna') return 'You have a sharp, intense digestive fire, often associated with Pitta dominance. You can digest heavy foods but are prone to acidity and inflammation if you skip meals.';
                if (this.answers.agni === 'Manda') return 'You have a slow digestive fire, typical of Kapha dominance. Metabolism is sluggish, making it easy to gain weight and feel lethargic.';
                if (this.answers.agni === 'Vishama') return 'Your digestion is irregular, linked to Vata dominance. It fluctuates, leading to gas, bloating, and unpredictable appetite.';
                return '';
            },
            get dietaryPointer() {
                if (this.answers.agni === 'Tikshna') return 'Favor cooling, mildly sweet, and bitter foods. Avoid overly spicy, fermented, or deep-fried items. Do not skip meals.';
                if (this.answers.agni === 'Manda') return 'Favor warm, light, and spicy foods (ginger, black pepper). Eat only when genuinely hungry and avoid heavy sweets or dairy.';
                if (this.answers.agni === 'Vishama') return 'Favor warm, grounding, and oily/moist foods (ghee, soups). Eat at regular times daily in a calm environment.';
                return '';
            },
            get whatsappLink() {
                const phone = "917736609299";
                let text = `Hello Dr. Sajeev Dev, I completed the *Ayurvedic BMI & Prakriti Assessment* on Yuvann.\n\n`;
                text += `*My Profile:*\n`;
                text += `- Age/Gender: ${this.answers.age} | ${this.answers.gender}\n`;
                text += `- Height/Weight: ${this.answers.height}cm | ${this.answers.weight}kg\n`;
                text += `- BMI: ${this.bmiResult.value} (${this.bmiResult.category})\n`;
                text += `- Goal: ${this.answers.goal}\n`;
                text += `- Digestion (Agni): ${this.answers.agni}\n\n`;
                text += `I would like to receive personalized Ayurvedic guidance based on these metrics.`;
                
                return `https://wa.me/${phone}?text=${encodeURIComponent(text)}`;
            }
        }
    }
</script>
