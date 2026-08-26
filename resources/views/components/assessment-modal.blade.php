<div x-show="showAssessment" x-cloak class="relative z-[100]" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Background backdrop -->
    <div x-show="showAssessment"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-brand-green-900/80 backdrop-blur-sm transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal panel -->
            <div x-show="showAssessment"
                 @click.away="showAssessment = false"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl text-gray-800"
                 x-data="assessmentData()">
                 
                <!-- Close Button -->
                <button @click="showAssessment = false" class="absolute top-4 right-4 text-emerald-50 hover:text-white z-10 p-1 bg-emerald-900/20 rounded-full transition-colors">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Header -->
                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 p-6 text-white text-center rounded-t-2xl relative shadow-sm">
                    <h2 class="text-2xl font-bold mb-1 font-serif text-white drop-shadow-sm">Ayurvedic Assessment</h2>
                    <p class="text-emerald-50 text-sm">Discover your Dosha, Agni, and personalized diet plan.</p>
                </div>

                <!-- Progress Bar -->
                <div class="bg-slate-100 h-1.5 w-full">
                    <div class="h-full bg-amber-400 transition-all duration-500 ease-in-out"
                         :style="`width: ${progress}%`"></div>
                </div>

                <div class="p-6 sm:p-8">
                    
                    <!-- Step 1: Body Metrics -->
                    <div x-show="step === 1" x-cloak x-transition.opacity.duration.300ms>
                        <h2 class="text-xl font-semibold mb-6 text-slate-800 text-center">Step 1: Your Body Metrics</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Gender</label>
                                <select x-model="gender" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50 p-2.5 border bg-white">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Age</label>
                                <input type="number" x-model="age" placeholder="Years" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50 p-2.5 border bg-white">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1 flex justify-between">
                                    Height
                                    <span class="text-xs text-teal-600 cursor-pointer font-semibold hover:underline" @click="heightUnit = heightUnit === 'cm' ? 'ftin' : 'cm'" x-text="heightUnit === 'cm' ? 'Switch to Ft/In' : 'Switch to cm'"></span>
                                </label>
                                
                                <div x-show="heightUnit === 'cm'">
                                    <input type="number" x-model="heightCm" placeholder="Height in cm" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50 p-2.5 border bg-white">
                                </div>
                                
                                <div x-show="heightUnit === 'ftin'" class="flex space-x-2">
                                    <input type="number" x-model="heightFt" placeholder="Feet" class="w-1/2 border-slate-300 rounded-lg shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50 p-2.5 border bg-white">
                                    <input type="number" x-model="heightIn" placeholder="Inches" class="w-1/2 border-slate-300 rounded-lg shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50 p-2.5 border bg-white">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Weight (kg)</label>
                                <input type="number" x-model="weight" placeholder="Weight in kg" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-500 focus:ring-opacity-50 p-2.5 border bg-white">
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Primary Wellness Goal -->
                    <div x-show="step === 2" x-cloak x-transition.opacity.duration.300ms>
                        <h2 class="text-xl font-semibold mb-6 text-slate-800 text-center">Step 2: Primary Wellness Goal</h2>
                        <div class="space-y-3">
                            <template x-for="item in ['Weight Loss & Management', 'Muscle Building & Stamina', 'Digestion & Detoxification', 'General Vitality & Immunity']">
                                <label class="block cursor-pointer">
                                    <input type="radio" name="goal" :value="item" x-model="goal" class="peer sr-only">
                                    <div class="p-4 rounded-xl border-2 border-slate-100 hover:border-teal-400 transition-all flex items-center justify-between peer-checked:border-emerald-500 peer-checked:bg-emerald-50">
                                        <span class="font-medium text-slate-800" x-text="item"></span>
                                    </div>
                                </label>
                            </template>
                        </div>
                    </div>

                    <!-- Step 3: Agni (Digestive Fire) -->
                    <div x-show="step === 3" x-cloak x-transition.opacity.duration.300ms>
                        <h2 class="text-xl font-semibold mb-6 text-slate-800 text-center">Step 3: Your Digestion (Agni)</h2>
                        <div class="space-y-3">
                            <label class="block cursor-pointer">
                                <input type="radio" name="agni" value="Irregular/Vata" x-model="agni" class="peer sr-only">
                                <div class="p-4 rounded-xl border-2 border-slate-100 hover:border-teal-400 transition-all flex flex-col peer-checked:border-emerald-500 peer-checked:bg-emerald-50">
                                    <span class="font-medium text-slate-800">Irregular (Visham Agni)</span>
                                    <span class="text-sm text-slate-500 mt-1">Appetite fluctuates. Prone to gas, bloating, or constipation.</span>
                                </div>
                            </label>
                            <label class="block cursor-pointer">
                                <input type="radio" name="agni" value="Strong/Pitta" x-model="agni" class="peer sr-only">
                                <div class="p-4 rounded-xl border-2 border-slate-100 hover:border-teal-400 transition-all flex flex-col peer-checked:border-emerald-500 peer-checked:bg-emerald-50">
                                    <span class="font-medium text-slate-800">Strong (Tikshna Agni)</span>
                                    <span class="text-sm text-slate-500 mt-1">Sharp appetite, can digest almost anything. Prone to acidity or heartburn.</span>
                                </div>
                            </label>
                            <label class="block cursor-pointer">
                                <input type="radio" name="agni" value="Slow/Kapha" x-model="agni" class="peer sr-only">
                                <div class="p-4 rounded-xl border-2 border-slate-100 hover:border-teal-400 transition-all flex flex-col peer-checked:border-emerald-500 peer-checked:bg-emerald-50">
                                    <span class="font-medium text-slate-800">Slow (Manda Agni)</span>
                                    <span class="text-sm text-slate-500 mt-1">Appetite is low. Feel heavy or sluggish after meals. Tendency to gain weight easily.</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Step 4: Body Tendencies -->
                    <div x-show="step === 4" x-cloak x-transition.opacity.duration.300ms>
                        <h2 class="text-xl font-semibold mb-6 text-slate-800 text-center">Step 4: Body Tendencies</h2>
                        <div class="space-y-3">
                            <label class="block cursor-pointer">
                                <input type="radio" name="dosha" value="Vata (Cold/Dry)" x-model="dosha" class="peer sr-only">
                                <div class="p-4 rounded-xl border-2 border-slate-100 hover:border-teal-400 transition-all flex flex-col peer-checked:border-emerald-500 peer-checked:bg-emerald-50">
                                    <span class="font-medium text-slate-800">Cold & Dry Skin, Light Build</span>
                                    <span class="text-sm text-slate-500 mt-1">Often feel cold, struggle to gain weight, hyperactive mind.</span>
                                </div>
                            </label>
                            <label class="block cursor-pointer">
                                <input type="radio" name="dosha" value="Pitta (Warm/Acidic)" x-model="dosha" class="peer sr-only">
                                <div class="p-4 rounded-xl border-2 border-slate-100 hover:border-teal-400 transition-all flex flex-col peer-checked:border-emerald-500 peer-checked:bg-emerald-50">
                                    <span class="font-medium text-slate-800">Warm & Sensitive Skin, Medium Build</span>
                                    <span class="text-sm text-slate-500 mt-1">Often feel warm, sweat easily, prone to inflammation or irritability.</span>
                                </div>
                            </label>
                            <label class="block cursor-pointer">
                                <input type="radio" name="dosha" value="Kapha (Heavy/Stable)" x-model="dosha" class="peer sr-only">
                                <div class="p-4 rounded-xl border-2 border-slate-100 hover:border-teal-400 transition-all flex flex-col peer-checked:border-emerald-500 peer-checked:bg-emerald-50">
                                    <span class="font-medium text-slate-800">Oily Skin, Heavy Build</span>
                                    <span class="text-sm text-slate-500 mt-1">Consistent energy, calm mind, but gain weight easily and find it hard to lose.</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Step 5: Results -->
                    <div x-show="step === 5" x-cloak x-transition.opacity.duration.500ms>
                        <div class="text-center mb-6">
                            <h2 class="text-2xl font-bold text-slate-800 mb-2">Your Wellness Profile</h2>
                            <p class="text-slate-500 text-sm">Based on Ayurvedic principles and Asian-Indian BMI standards</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- BMI Card -->
                            <div class="bg-slate-50 rounded-2xl p-6 text-center border border-slate-100">
                                <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-2">Your BMI</p>
                                <div class="text-4xl font-extrabold text-emerald-500 mb-2" x-text="bmi"></div>
                                <div class="inline-block px-3 py-1 rounded-full text-sm font-medium"
                                     :class="{
                                        'bg-blue-100 text-blue-700': bmiCategory === 'Underweight',
                                        'bg-emerald-100 text-emerald-700': bmiCategory === 'Normal',
                                        'bg-orange-100 text-orange-700': bmiCategory === 'Overweight',
                                        'bg-red-100 text-red-700': bmiCategory === 'Obese'
                                     }" x-text="bmiCategory"></div>
                                <p class="text-[10px] text-slate-400 mt-4">Asian-Indian Standard (Normal: 18.5 - 22.9)</p>
                            </div>

                            <!-- Dosha Card -->
                            <div class="bg-slate-50 rounded-2xl p-6 text-center border border-slate-100 flex flex-col justify-center">
                                <p class="text-sm font-semibold text-slate-500 uppercase tracking-wider mb-2">Primary Dosha Imbalance</p>
                                <div class="text-xl font-bold text-amber-500 mb-2" x-text="primaryDoshaLabel"></div>
                                <p class="text-xs text-slate-600 leading-snug" x-text="doshaAdvice"></p>
                            </div>
                        </div>

                        <!-- Action Area -->
                        <div class="bg-emerald-50 rounded-2xl p-6 border border-emerald-100 text-center">
                            <h3 class="font-bold text-emerald-800 mb-2 text-lg">Take the Next Step</h3>
                            <p class="text-sm text-emerald-700 mb-5">Share this assessment with Dr. Sajeev Dev for a personalized Ayurvedic diet and lifestyle protocol.</p>
                            
                            <a :href="whatsappLink" target="_blank" class="inline-flex items-center justify-center w-full md:w-auto px-6 py-3 bg-[#25D366] hover:bg-[#1da851] text-white font-medium rounded-xl transition-all shadow-md hover:scale-105 active:scale-95">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                Chat with Dr. Sajeev Dev
                            </a>
                        </div>
                    </div>
                    
                    <!-- Navigation Buttons -->
                    <div class="mt-8 flex justify-between items-center border-t border-slate-100 pt-6" x-show="step < 5">
                        <button @click="prevStep()" 
                                class="px-5 py-2.5 rounded-xl font-medium text-slate-500 hover:text-slate-800 hover:bg-slate-100 transition-colors"
                                :class="{'invisible': step === 1}">
                            Back
                        </button>
                        <button @click="nextStep()" 
                                class="px-6 py-2.5 rounded-xl font-medium text-white bg-emerald-500 hover:bg-teal-500 transition-colors shadow-md shadow-emerald-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                :disabled="!isStepValid()">
                            <span x-text="step === 4 ? 'See Results' : 'Continue'"></span>
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('assessmentData', () => ({
            step: 1,
            totalSteps: 5,
            heightUnit: 'cm', // cm or ftin
            heightCm: '',
            heightFt: '',
            heightIn: '',
            weight: '',
            gender: '',
            age: '',
            goal: '',
            agni: '',
            dosha: '',
            
            // Results
            bmi: null,
            bmiCategory: '',
            
            get progress() {
                return ((this.step - 1) / (this.totalSteps - 1)) * 100;
            },
            
            isStepValid() {
                if (this.step === 1) {
                    if (this.heightUnit === 'cm' && !this.heightCm) return false;
                    if (this.heightUnit === 'ftin' && (!this.heightFt || !this.heightIn)) return false;
                    if (!this.weight || !this.gender || !this.age) return false;
                    return true;
                }
                if (this.step === 2) return this.goal !== '';
                if (this.step === 3) return this.agni !== '';
                if (this.step === 4) return this.dosha !== '';
                return true;
            },
            
            nextStep() {
                if (!this.isStepValid()) return;
                
                if(this.step === 4) {
                    this.calculateResults();
                }
                if(this.step < this.totalSteps) {
                    this.step++;
                }
            },
            
            prevStep() {
                if(this.step > 1) {
                    this.step--;
                }
            },
            
            calculateResults() {
                let heightInMeters;
                if (this.heightUnit === 'cm') {
                    heightInMeters = this.heightCm / 100;
                } else {
                    let ft = parseInt(this.heightFt) || 0;
                    let inch = parseInt(this.heightIn) || 0;
                    let inches = (ft * 12) + inch;
                    heightInMeters = inches * 0.0254;
                }
                this.bmi = (this.weight / (heightInMeters * heightInMeters)).toFixed(1);
                
                // Asian-Indian BMI Standards
                if (this.bmi < 18.5) this.bmiCategory = 'Underweight';
                else if (this.bmi <= 22.9) this.bmiCategory = 'Normal';
                else if (this.bmi <= 24.9) this.bmiCategory = 'Overweight';
                else this.bmiCategory = 'Obese';
            },
            
            get primaryDoshaLabel() {
                if (this.dosha.includes('Vata')) return 'Vata (Wind & Space)';
                if (this.dosha.includes('Pitta')) return 'Pitta (Fire & Water)';
                if (this.dosha.includes('Kapha')) return 'Kapha (Earth & Water)';
                return 'Tri-dosha Balance';
            },
            
            get doshaAdvice() {
                if (this.dosha.includes('Vata')) return 'Favor warm, moist, and grounding foods. Avoid cold drinks and raw salads in excess.';
                if (this.dosha.includes('Pitta')) return 'Favor cooling, sweet, and stabilizing foods. Avoid excessive spice, caffeine, and acidic foods.';
                if (this.dosha.includes('Kapha')) return 'Favor warm, light, and spicy foods. Avoid heavy sweets, dairy, and cold foods.';
                return 'Maintain balance across all tastes and temperatures.';
            },
            
            get whatsappLink() {
                const phone = "917736609299";
                let h = this.heightUnit === 'cm' ? `${this.heightCm} cm` : `${this.heightFt}ft ${this.heightIn}in`;
                const text = `Hello Dr. Sajeev, I completed the Ayurvedic Assessment on Yuvann Wellness.\n\n*My Details:*\nAge: ${this.age}\nGender: ${this.gender}\nHeight: ${h}\nWeight: ${this.weight} kg\n*BMI:* ${this.bmi} (${this.bmiCategory} - Asian-Indian Standard)\n\n*Wellness Profile:*\nPrimary Goal: ${this.goal}\nAgni (Digestion): ${this.agni}\nBody Tendency: ${this.dosha}\n\nPlease guide me further with a customized protocol.`;
                return `https://wa.me/${phone}?text=${encodeURIComponent(text)}`;
            }
        }));
    });
</script>
