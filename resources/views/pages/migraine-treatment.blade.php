<x-layouts.app>
    <!-- Page Container with Language State (Defaults to Malayalam with English toggle) -->
    <div x-data="{ lang: 'ml' }" class="bg-[#faf9f6] min-h-screen">

        <!-- Top Urgent Alert Bar -->
        <div class="bg-gradient-to-r from-brand-gold-600 via-amber-500 to-brand-gold-600 text-brand-green-950 text-xs sm:text-sm font-bold py-2.5 px-4 text-center shadow-xs">
            <div class="max-w-7xl mx-auto flex items-center justify-center gap-2 flex-wrap">
                <span>⚡</span>
                <span x-show="lang === 'ml'">പ്രത്യേക അറിയിപ്പ്: സീറ്റുകൾ പരിമിതമാണ് — മുൻകൂട്ടി അപ്പോയിന്റ്മെന്റ് എടുക്കുന്നവർക്ക് മാത്രം!</span>
                <span x-show="lang === 'en'">Special Notice: Strictly by prior appointment only due to limited early morning slots!</span>
                <a href="#booking-section" class="underline hover:text-white font-extrabold ml-1">
                    <span x-show="lang === 'ml'">ഇപ്പോൾ ബുക്ക് ചെയ്യുക &darr;</span>
                    <span x-show="lang === 'en'">Book Now &darr;</span>
                </a>
            </div>
        </div>

        <!-- Hero Header -->
        <div class="relative bg-brand-green-900 text-white overflow-hidden py-12 sm:py-20 border-b-4 border-brand-gold-500">
            <!-- Background Ambient Glow -->
            <div class="absolute inset-0 opacity-15 pointer-events-none">
                <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-brand-gold-500 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-96 h-96 rounded-full bg-emerald-500 blur-3xl"></div>
            </div>

            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Breadcrumbs & Language Switcher -->
                <div class="flex items-center justify-between gap-4 mb-6 flex-wrap">
                    <nav class="flex text-xs text-brand-green-200" aria-label="Breadcrumb">
                        <a href="/" class="hover:text-brand-gold-400">Home</a>
                        <span class="mx-2 text-brand-green-500">/</span>
                        <span class="text-brand-gold-300 font-medium">Migraine Treatment</span>
                    </nav>

                    <!-- Language Switcher Pill -->
                    <div class="inline-flex rounded-full bg-brand-green-950/80 p-1 border border-brand-gold-500/40 shadow-inner">
                        <button type="button" @click="lang = 'ml'" 
                                :class="lang === 'ml' ? 'bg-brand-gold-500 text-brand-green-950 font-bold shadow' : 'text-brand-green-200 hover:text-white'"
                                class="px-3.5 py-1 rounded-full text-xs transition-all">
                            മലയാളം
                        </button>
                        <button type="button" @click="lang = 'en'" 
                                :class="lang === 'en' ? 'bg-brand-gold-500 text-brand-green-950 font-bold shadow' : 'text-brand-green-200 hover:text-white'"
                                class="px-3.5 py-1 rounded-full text-xs transition-all">
                            English
                        </button>
                    </div>
                </div>

                <!-- Doctor Badge & Top Hook -->
                <div class="text-center space-y-4 max-w-3xl mx-auto">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-brand-gold-500/20 border border-brand-gold-400/40 text-brand-gold-300 text-xs font-semibold uppercase tracking-widest">
                        <span>🌿</span>
                        <span x-show="lang === 'ml'">പരമ്പരാഗത ആയുർവേദ ഒറ്റമൂലി ചികിത്സ</span>
                        <span x-show="lang === 'en'">Traditional Ayurvedic Single Herbal Remedy</span>
                    </div>

                    <!-- Main Title (Bilingual) -->
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-serif font-bold text-white tracking-tight leading-tight">
                        <span x-show="lang === 'ml'">
                            മൈഗ്രെയ്ൻ മാറാനുള്ള <br class="hidden sm:inline">
                            <span class="text-brand-gold-300 italic">അതുല്യ അവസരം!</span>
                        </span>
                        <span x-show="lang === 'en'">
                            Unique Opportunity to <br class="hidden sm:inline">
                            <span class="text-brand-gold-300 italic">Relieve Migraine!</span>
                        </span>
                    </h1>

                    <p class="text-base sm:text-xl text-brand-gold-100 font-medium">
                        <span x-show="lang === 'ml'">ഒറ്റമൂലി ചികിത്സ — ഫലപ്രദവും പ്രകൃതിസഹജവുമായൊരു മാർഗം</span>
                        <span x-show="lang === 'en'">Single herbal remedy — an effective and natural way</span>
                    </p>

                    <!-- Doctor Credentials Subtitle -->
                    <div class="pt-2 flex items-center justify-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-brand-gold-500 flex items-center justify-center text-brand-green-950 font-serif font-bold text-sm shadow">
                            SD
                        </div>
                        <div class="text-left text-xs sm:text-sm">
                            <div class="font-bold text-white">Dr. Sajeev Dev</div>
                            <div class="text-brand-green-200 text-xs">Yuvann Wellness Concepts</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 sm:-mt-10 relative z-20 pb-20">

            <!-- 4 Pillar Quick Info Grid (Cards) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
                <!-- 1. Timing Card -->
                <div class="bg-white rounded-2xl p-5 shadow-lg border-2 border-brand-gold-500/40 flex flex-col justify-between">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-lg font-bold">
                            ⏰
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-gray-500 block">
                                <span x-show="lang === 'ml'">സമയം (Timing)</span>
                                <span x-show="lang === 'en'">Reporting Time</span>
                            </span>
                            <span class="text-base font-serif font-bold text-brand-green-950">5:15 AM</span>
                        </div>
                    </div>
                    <p class="text-xs text-brand-green-900/80 leading-relaxed">
                        <span x-show="lang === 'ml'">രാവിലെ 5.15-ന് മുമ്പ് എത്തിച്ചേരണം. <strong>സൂര്യോദയത്തിന് മുമ്പ്</strong> ചികിത്സ പൂർത്തിയാക്കേണ്ടതുണ്ട്.</span>
                        <span x-show="lang === 'en'">Arrive before 5:15 AM. Treatment must be completed strictly <strong>before sunrise</strong>.</span>
                    </p>
                </div>

                <!-- 2. Date / Booking Card -->
                <div class="bg-white rounded-2xl p-5 shadow-lg border border-brand-green-100 flex flex-col justify-between">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-lg font-bold">
                            📅
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-gray-500 block">
                                <span x-show="lang === 'ml'">തീയതി (Date)</span>
                                <span x-show="lang === 'en'">Date</span>
                            </span>
                            <span class="text-sm font-bold text-brand-green-950">By Appointment</span>
                        </div>
                    </div>
                    <p class="text-xs text-brand-green-900/80 leading-relaxed">
                        <span x-show="lang === 'ml'">മുൻകൂട്ടി ഫോൺ / വാട്സ്ആപ്പ് വഴി തീയതിയും സമയവും ബുക്ക് ചെയ്യുന്നവർക്ക് മാത്രം.</span>
                        <span x-show="lang === 'en'">Strictly as per prior appointment only. Book your slot in advance.</span>
                    </p>
                </div>

                <!-- 3. Location Card -->
                <div class="bg-white rounded-2xl p-5 shadow-lg border border-brand-green-100 flex flex-col justify-between">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-red-100 text-red-800 flex items-center justify-center text-lg font-bold">
                            📍
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-gray-500 block">
                                <span x-show="lang === 'ml'">സ്ഥലം (Location)</span>
                                <span x-show="lang === 'en'">Location</span>
                            </span>
                            <span class="text-sm font-bold text-brand-green-950">Kariyad, Ernakulam</span>
                        </div>
                    </div>
                    <p class="text-xs text-brand-green-900/80 leading-relaxed">
                        <span x-show="lang === 'ml'">കൊച്ചിൻ റിഫ്രാക്ടറീസ്, പട്ടരുമടം ഡിസ്പെൻസറിയ്ക്ക് എതിരെ, കരിയാട്.</span>
                        <span x-show="lang === 'en'">Kochin Refractories, Opp. Pattarumadom Dispensary, Kariyad.</span>
                    </p>
                </div>

                <!-- 4. Direct Call Card -->
                <div class="rounded-2xl p-5 shadow-lg flex flex-col justify-between"
                     style="background-color: #0e241b !important; background: linear-gradient(135deg, #0e241b 0%, #173d2d 100%) !important; color: #ffffff !important;">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-xl bg-brand-gold-500 text-brand-green-950 flex items-center justify-center text-lg font-bold">
                            📞
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-brand-gold-400 block">
                                <span x-show="lang === 'ml'">ഹെൽപ്പ്‌ലൈൻ (Helpline)</span>
                                <span x-show="lang === 'en'">Contact</span>
                            </span>
                            <a href="tel:+917736609299" class="text-xs sm:text-sm font-bold text-white hover:text-brand-gold-300">77366 09299</a>
                        </div>
                    </div>
                    <div class="text-[11px] text-brand-green-200 space-y-0.5">
                        <div>Alt: <a href="tel:+919447365545" class="underline hover:text-white">94473 65545</a></div>
                        <div class="text-brand-gold-300 font-semibold">Dr. Sajeev Dev</div>
                    </div>
                </div>
            </div>

            <!-- Main Letter & Overview Card -->
            <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-brand-green-100/80 mb-10 space-y-8">
                
                <!-- Malayalam Version Letter -->
                <div x-show="lang === 'ml'" class="space-y-6 text-brand-green-900 leading-relaxed">
                    <div class="border-b border-brand-green-100 pb-4">
                        <span class="text-sm font-semibold text-brand-gold-700">പ്രിയ സുഹൃത്തേ,</span>
                        <h2 class="text-2xl sm:text-3xl font-serif font-bold text-brand-green-900 mt-2">
                            തുടർച്ചയായ തലവേദനയും മൈഗ്രെയ്നും നിങ്ങളെ ബുദ്ധിമുട്ടിക്കുന്നുണ്ടോ?
                        </h2>
                    </div>

                    <div class="text-base space-y-4 text-brand-green-900/90 font-sans">
                        <p class="text-lg text-emerald-900 font-medium">
                            ഇനി ആശങ്കപ്പെടേണ്ട! നൂറ്റാണ്ടുകളായി പരീക്ഷിച്ചും ഫലപ്രദമെന്ന് തെളിയിച്ചിട്ടുള്ള പരമ്പരാഗത ഒറ്റമൂലി ചികിത്സ ഇപ്പോൾ ലഭ്യമാണ്.
                        </p>
                        <p>
                            മൈഗ്രെയ്ൻ മൂലമുണ്ടാകുന്ന അസഹ്യമായ വേദന, തലയുടെ ഒരു വശത്തുണ്ടാകുന്ന കൊളുത്തിപ്പിടുത്തം, ഛർദ്ദിൽ തോന്നൽ, വെളിച്ചവും ശബ്ദവും അസഹ്യമാകുന്ന അവസ്ഥ എന്നിവ നമ്മുടെ ദൈനംദിന ജീവിതത്തെയും ജോലിയിലെ ഏകാഗ്രതയെയും കാര്യമായി ബാധിക്കാറുണ്ട്. വേദനാസംഹാരികൾ താൽക്കാലിക ആശ്വാസം മാത്രമേ നൽകുന്നുള്ളൂ.
                        </p>
                        <p>
                            ഈ ഒറ്റമൂലി പ്രയോഗം സൂര്യോദയത്തിന് മുൻപുള്ള പ്രത്യേക സമയത്ത് ചെയ്യുമ്പോൾ ശരീരത്തിലെ നാഡീവ്യവസ്ഥയെയും രക്തചംക്രമണത്തെയും ശാന്തമാക്കുകയും മൈഗ്രെയ്നിൽനിന്ന് <strong>സ്വാഭാവികമായും സ്ഥിരമായും ആശ്വാസം</strong> നേടിത്തരുകയും ചെയ്യുന്നു.
                        </p>
                    </div>

                    <!-- Highlight Box with Leaf Icon -->
                    <div class="bg-[#f2f8f3] border-l-4 border-emerald-700 rounded-r-2xl p-5 sm:p-6 text-emerald-950 space-y-2">
                        <div class="font-serif font-bold text-lg flex items-center gap-2">
                            <span>🌿</span>
                            <span>എന്തുകൊണ്ട് സൂര്യോദയത്തിന് മുമ്പ്?</span>
                        </div>
                        <p class="text-sm leading-relaxed text-emerald-900">
                            സൂര്യോദയത്തിന് മുമ്പുള്ള സമയത്ത് വാത-പിത്ത ദോഷങ്ങൾ ശാന്തമായിരിക്കുന്ന വേളയിലാണ് ഈ ഒറ്റമൂലി പ്രയോഗം നടത്തുന്നത്. ഔഷധത്തിന്റെ പരമാവധി ഗുണഫലം ശരീരത്തിലെ ശിരോഭാഗത്തെ നാഡീഞരമ്പുകളിലേക്ക് ആഗിരണം ചെയ്യപ്പെടാൻ പ്രഭാതത്തിലെ ഈ സവിശേഷ സമയം അത്യാവശ്യമാണ്. അതിനാൽ <strong>കൃത്യം 5:15 AM-ന് മുൻപ്</strong> എത്തിച്ചേരേണ്ടതാണ്.
                        </p>
                    </div>
                </div>

                <!-- English Version Letter -->
                <div x-show="lang === 'en'" class="space-y-6 text-brand-green-900 leading-relaxed">
                    <div class="border-b border-brand-green-100 pb-4">
                        <span class="text-sm font-semibold text-brand-gold-700">Dear Friend,</span>
                        <h2 class="text-2xl sm:text-3xl font-serif font-bold text-brand-green-900 mt-2">
                            Are you troubled by recurring headaches and migraines?
                        </h2>
                    </div>

                    <div class="text-base space-y-4 text-brand-green-900/90">
                        <p class="text-lg text-emerald-900 font-medium">
                            Worry no more! A traditional single herbal remedy treatment, tested and proven effective for centuries, is now available.
                        </p>
                        <p>
                            Chronic migraine and throbbing vascular headaches drain your productivity, sleep, and emotional peace. Frequent intake of chemical painkillers often provides only temporary suppression without treating the root cause.
                        </p>
                        <p>
                            This authentic Ayurvedic single herbal formulation (Ottamooli) is administered in the early dawn to harmonize cranial circulation, calm hyperactive neural pathways, and deliver <strong>natural and lasting relief</strong>.
                        </p>
                    </div>

                    <!-- Highlight Box English -->
                    <div class="bg-[#f2f8f3] border-l-4 border-emerald-700 rounded-r-2xl p-5 sm:p-6 text-emerald-950 space-y-2">
                        <div class="font-serif font-bold text-lg flex items-center gap-2">
                            <span>🌿</span>
                            <span>Why must it be completed before sunrise?</span>
                        </div>
                        <p class="text-sm leading-relaxed text-emerald-900">
                            Traditional Ayurvedic science recognizes the pre-dawn Brahma-Muhurta as the critical biological window where cranial blood vessels and Marma points respond most receptively to herbal stimulation. Performing the remedy before sunrise ensures maximum potency and lasting relief.
                        </p>
                    </div>
                </div>

                <!-- Location & Venue Details Section -->
                <div class="rounded-2xl bg-[#fbfaf8] border border-brand-green-100 p-6 sm:p-8 space-y-4">
                    <h3 class="text-lg font-serif font-bold text-brand-green-900 flex items-center gap-2">
                        <span>📍</span>
                        <span x-show="lang === 'ml'">ചികിത്സ നടക്കുന്ന സ്ഥലം (Venue Details)</span>
                        <span x-show="lang === 'en'">Treatment Venue & Address</span>
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                        <div class="space-y-2 text-sm text-brand-green-900/90">
                            <div class="font-bold text-base text-brand-green-950">
                                <span x-show="lang === 'ml'">ട്രീറ്റ്മെന്റ് സ്പോട്ട് (Treatment Spot)</span>
                                <span x-show="lang === 'en'">Treatment Spot</span>
                            </div>
                            <div>
                                <p class="font-medium text-brand-green-900">
                                    കൊച്ചിൻ റിഫ്രാക്ടറീസ് ആൻഡ് മിനറൽസ് <br>
                                    (Kochin Refractories and Minerals)
                                </p>
                                <p class="text-gray-600 mt-1">
                                    പട്ടരുമടം ഡിസ്പെൻസറിയ്ക്ക് എതിർവശത്ത്, <br>
                                    (Opp. Pattarumadom Dispensary)
                                </p>
                                <p class="text-gray-600">
                                    കരിയാട്, മേക്കാട് പി.ഒ., എറണാകുളം ജില്ല. <br>
                                    (Kariyad, Meekad P.O., Ernakulam District, Kerala)
                                </p>
                            </div>
                        </div>

                        <!-- Directions / Maps Helper -->
                        <div class="bg-white rounded-xl p-4 border border-brand-green-100 shadow-xs space-y-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider block">
                                <span x-show="lang === 'ml'">യാത്രാ സൗകര്യം</span>
                                <span x-show="lang === 'en'">Location Assistance</span>
                            </span>
                            <p class="text-xs text-gray-600">
                                <span x-show="lang === 'ml'">നെടുമ്പാശ്ശേരി എയർപോർട്ട് / അങ്കമാലി / ആലുവ ഭാഗത്തുനിന്ന് എളുപ്പത്തിൽ എത്തിച്ചേരാവുന്നതാണ്.</span>
                                <span x-show="lang === 'en'">Conveniently accessible near Nedumbassery Airport, Angamaly, and Aluva routes.</span>
                            </p>
                            <div class="pt-1">
                                <a href="https://www.google.com/maps/search/?api=1&query=Kariyad+Meekad+Ernakulam" 
                                   target="_blank" 
                                   class="inline-flex items-center gap-2 text-xs font-bold text-brand-gold-700 hover:text-brand-gold-800 bg-brand-gold-50 hover:bg-brand-gold-100 px-3.5 py-2 rounded-lg border border-brand-gold-200 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span x-show="lang === 'ml'">ഗൂഗിൾ മാപ്പിൽ സ്ഥലം കാണുക</span>
                                    <span x-show="lang === 'en'">Open Kariyad in Google Maps</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Treatment Guidelines Checklist -->
                <div class="space-y-4 pt-2">
                    <h3 class="text-lg font-serif font-bold text-brand-green-900 flex items-center gap-2">
                        <span>📋</span>
                        <span x-show="lang === 'ml'">ചികിത്സയ്ക്ക് എത്തുമ്പോൾ ശ്രദ്ധിക്കേണ്ട പ്രധാന കാര്യങ്ങൾ</span>
                        <span x-show="lang === 'en'">Important Guidelines for Treatment</span>
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs sm:text-sm">
                        <div class="p-4 rounded-xl bg-amber-50/70 border border-amber-200/80 space-y-1">
                            <div class="font-bold text-amber-950 flex items-center gap-1.5">
                                <span>1.</span>
                                <span x-show="lang === 'ml'">മുൻകൂട്ടി ബുക്ക് ചെയ്യുക</span>
                                <span x-show="lang === 'en'">Prior Booking</span>
                            </div>
                            <p class="text-amber-900/80 text-xs leading-relaxed">
                                <span x-show="lang === 'ml'">ദിവസേന പരിമിതമായ ആളുകൾക്ക് മാത്രമേ ചികിത്സ നൽകാൻ സാധിക്കൂ. അതിനാൽ ഫോൺ വഴി സമയം സ്ഥിരീകരിക്കുക.</span>
                                <span x-show="lang === 'en'">Daily slots are strictly limited. Ensure your confirmation call or WhatsApp message is confirmed.</span>
                            </p>
                        </div>

                        <div class="p-4 rounded-xl bg-amber-50/70 border border-amber-200/80 space-y-1">
                            <div class="font-bold text-amber-950 flex items-center gap-1.5">
                                <span>2.</span>
                                <span x-show="lang === 'ml'">കൃത്യസമയം പാലിക്കുക</span>
                                <span x-show="lang === 'en'">Punctuality</span>
                            </div>
                            <p class="text-amber-900/80 text-xs leading-relaxed">
                                <span x-show="lang === 'ml'">രാവിലെ 5:15 AM-ന് മുൻപായി തന്നെ ചികിത്സാ സ്ഥലത്ത് എത്തിച്ചേരണം. സൂര്യൻ ഉദിച്ചുകഴിഞ്ഞാൽ ചികിത്സ സാധ്യമല്ല.</span>
                                <span x-show="lang === 'en'">Reach before 5:15 AM sharp. The remedy cannot be administered once the sun rises.</span>
                            </p>
                        </div>

                        <div class="p-4 rounded-xl bg-amber-50/70 border border-amber-200/80 space-y-1">
                            <div class="font-bold text-amber-950 flex items-center gap-1.5">
                                <span>3.</span>
                                <span x-show="lang === 'ml'">ഡോക്ടറുടെ നിർദ്ദേശം</span>
                                <span x-show="lang === 'en'">Pre-Treatment Advice</span>
                            </div>
                            <p class="text-amber-900/80 text-xs leading-relaxed">
                                <span x-show="lang === 'ml'">ഭക്ഷണക്രമത്തെക്കുറിച്ചും പ്രഭാത ദിനചര്യകളെക്കുറിച്ചും ബുക്കിംഗ് സമയത്ത് നൽകുന്ന നിർദ്ദേശങ്ങൾ കർശനമായി പാലിക്കുക.</span>
                                <span x-show="lang === 'en'">Follow the light fasting or water intake instructions given during your appointment booking.</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- BOOKING SECTION & WHATSAPP QUERY CTA -->
            <div id="booking-section" 
                 class="relative rounded-3xl text-white p-8 sm:p-12 shadow-2xl border-2 border-brand-gold-500 overflow-hidden mb-12"
                 style="background-color: #0e241b !important; background: linear-gradient(135deg, #0e241b 0%, #173d2d 50%, #07150f 100%) !important; color: #ffffff !important;">
                
                <!-- Subtle background ambient illumination -->
                <div class="absolute inset-0 opacity-20 pointer-events-none" style="background: radial-gradient(circle at top right, #d4af37, transparent 70%);"></div>

                <div class="relative z-10 max-w-3xl mx-auto text-center space-y-6">
                    <!-- Badge -->
                    <div>
                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider shadow-sm"
                              style="background-color: #153527 !important; color: #f5eed1 !important; border: 1px solid #d4af37 !important;">
                            <span>📲</span>
                            <span x-show="lang === 'ml'">മുൻകൂട്ടി ബുക്കിംഗ് ആരംഭിച്ചു</span>
                            <span x-show="lang === 'en'">Advance Booking Open</span>
                        </span>
                    </div>

                    <!-- Main Catchphrase (Ultra-readable high contrast) -->
                    <h2 class="text-2xl sm:text-4xl font-serif font-bold leading-tight" 
                        style="color: #ffffff !important; text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);">
                        <span x-show="lang === 'ml'">നിങ്ങളുടെ ജീവിതത്തിൽ വേദന രഹിതമായൊരു പ്രഭാതം നേടാൻ ഇന്നുതന്നെ ബുക്ക് ചെയ്യൂ!</span>
                        <span x-show="lang === 'en'">Seize this opportunity today to have a pain-free morning in your life!</span>
                    </h2>

                    <!-- Explanatory Subtext -->
                    <p class="text-sm sm:text-base leading-relaxed font-normal max-w-2xl mx-auto" 
                       style="color: #e1ede6 !important;">
                        <span x-show="lang === 'ml'">സീറ്റുകൾ വളരെ പരിമിതമായതിനാൽ ഉടൻതന്നെ വാട്സ്ആപ്പ് വഴിയോ ഫോൺ വഴിയോ ബന്ധപ്പെട്ട് നിങ്ങളുടെ തീയതി ഉറപ്പാക്കുക.</span>
                        <span x-show="lang === 'en'">Due to limited slots, contact directly via WhatsApp or phone call to confirm your appointment date.</span>
                    </p>

                    <!-- WhatsApp CTA Buttons (Primary: 77366 09299 | Alternate: 94473 65545) -->
                    <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
                        <!-- Primary WhatsApp Button (77366 09299) -->
                        <a href="https://wa.me/917736609299?text={{ urlencode('നമസ്കാരം ഡോ. സജീവ് ദേവ്, കരിയാട് വെച്ച് നടക്കുന്ന മൈഗ്രെയ്ൻ ഒറ്റമൂലി ചികിത്സയ്ക്കായി (Migraine Ottamooli Treatment) അപ്പോയിന്റ്മെന്റ് ബുക്ക് ചെയ്യാൻ ആഗ്രഹിക്കുന്നു. ലഭ്യമായ തീയതിയും മറ്റു വിവരങ്ങളും അറിയിക്കാമോ?') }}" 
                           target="_blank" 
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 font-bold text-sm sm:text-base rounded-full shadow-2xl hover:scale-105 transition-all duration-300"
                           style="background-color: #25D366 !important; color: #07150f !important;">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/>
                            </svg>
                            <div class="text-left">
                                <div class="text-[11px] uppercase tracking-wider font-semibold opacity-90 leading-tight">
                                    <span x-show="lang === 'ml'">വാട്സ്ആപ്പിൽ ബുക്ക് ചെയ്യുക</span>
                                    <span x-show="lang === 'en'">Book on WhatsApp</span>
                                </div>
                                <div class="text-base font-extrabold">77366 09299</div>
                            </div>
                        </a>

                        <!-- Secondary WhatsApp Button (94473 65545) -->
                        <a href="https://wa.me/919447365545?text={{ urlencode('നമസ്കാരം ഡോ. സജീവ് ദേവ്, കരിയാട് വെച്ച് നടക്കുന്ന മൈഗ്രെയ്ൻ ഒറ്റമൂലി ചികിത്സയ്ക്കായി (Migraine Ottamooli Treatment) അപ്പോയിന്റ്മെന്റ് ബുക്ക് ചെയ്യാൻ ആഗ്രഹിക്കുന്നു. ലഭ്യമായ തീയതിയും മറ്റു വിവരങ്ങളും അറിയിക്കാമോ?') }}" 
                           target="_blank" 
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 font-bold text-sm sm:text-base rounded-full shadow-2xl hover:scale-105 transition-all duration-300"
                           style="background-color: #d4af37 !important; color: #07150f !important;">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/>
                            </svg>
                            <div class="text-left">
                                <div class="text-[11px] uppercase tracking-wider font-semibold opacity-90 leading-tight">
                                    <span x-show="lang === 'ml'">വാട്സ്ആപ്പ് 2</span>
                                    <span x-show="lang === 'en'">WhatsApp 2</span>
                                </div>
                                <div class="text-base font-extrabold">94473 65545</div>
                            </div>
                        </a>
                    </div>

                    <!-- Direct Phone Call Links -->
                    <div class="pt-4 text-xs flex flex-wrap items-center justify-center gap-4"
                         style="border-top: 1px solid rgba(212, 175, 55, 0.3) !important; color: #c2dbc9 !important;">
                        <span>
                            <span x-show="lang === 'ml'">ഫോണിൽ നേരിട്ട് വിളിക്കാൻ:</span>
                            <span x-show="lang === 'en'">Direct Phone Calls:</span>
                        </span>
                        <a href="tel:+917736609299" class="underline font-bold hover:text-brand-gold-300" style="color: #ffffff !important;">
                            📞 77366 09299
                        </a>
                        <span class="text-brand-gold-500">|</span>
                        <a href="tel:+919447365545" class="underline font-bold hover:text-brand-gold-300" style="color: #ffffff !important;">
                            📞 94473 65545
                        </a>
                    </div>
                </div>
            </div>

            <!-- Share this Opportunity (Viral WhatsApp Share) -->
            <div class="rounded-2xl bg-white border border-brand-green-100 p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xs text-center sm:text-left">
                <div class="space-y-1 max-w-lg">
                    <h4 class="font-serif font-bold text-lg text-brand-green-900">
                        <span x-show="lang === 'ml'">മൈഗ്രെയ്ൻ ഉള്ള നിങ്ങളുടെ സുഹൃത്തുക്കൾക്കും ബന്ധുക്കൾക്കും ഈ വിവരം ഷെയർ ചെയ്യൂ!</span>
                        <span x-show="lang === 'en'">Share this relief opportunity with friends or family suffering from migraine!</span>
                    </h4>
                    <p class="text-xs text-gray-500">
                        <span x-show="lang === 'ml'">നൂറ്റാണ്ടുകളായി പരീക്ഷിച്ച ഒറ്റമൂലി ചികിത്സയിലൂടെ ഒരാൾക്കെങ്കിലും ആശ്വാസം ലഭിക്കാൻ ഇത് സഹായകമാകും.</span>
                        <span x-show="lang === 'en'">Help someone find natural and lasting freedom from recurring throbbing headaches.</span>
                    </p>
                </div>

                <a href="https://api.whatsapp.com/send?text={{ urlencode('മൈഗ്രെയ്ൻ മാറാനുള്ള അതുല്യ അവസരം! ഡോ. സജീവ് ദേവിന്റെ നേതൃത്വത്തിൽ എറണാകുളം കരിയാടിൽ നടക്കുന്ന പരമ്പരാഗത ഒറ്റമൂലി ചികിത്സ. കൂടുതൽ വിവരങ്ങൾക്കും ബുക്കിംഗിനും: ' . url('/migraine-treatment')) }}" 
                   target="_blank" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-300 hover:bg-emerald-100 font-bold text-xs shadow-xs transition-colors flex-shrink-0">
                    <svg class="w-4 h-4 fill-current text-emerald-600" viewBox="0 0 24 24">
                        <path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/>
                    </svg>
                    <span x-show="lang === 'ml'">വാട്സ്ആപ്പിൽ ഷെയർ ചെയ്യുക</span>
                    <span x-show="lang === 'en'">Share on WhatsApp</span>
                </a>
            </div>

        </div>

        <!-- Sticky Mobile Bottom Floating Action Bar -->
        <div class="fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur-md border-t border-brand-green-100 p-3 sm:hidden shadow-2xl flex items-center justify-between gap-3">
            <a href="tel:+917736609299" 
               class="flex-1 py-2.5 bg-gray-100 text-brand-green-950 font-bold text-xs rounded-xl flex items-center justify-center gap-1.5 border border-gray-200 shadow-xs">
                <span>📞 Call</span>
            </a>
            <a href="https://wa.me/917736609299?text={{ urlencode('നമസ്കാരം ഡോ. സജീവ് ദേവ്, കരിയാട് വെച്ച് നടക്കുന്ന മൈഗ്രെയ്ൻ ഒറ്റമൂലി ചികിത്സയ്ക്കായി (Migraine Ottamooli Treatment) അപ്പോയിന്റ്മെന്റ് ബുക്ക് ചെയ്യാൻ ആഗ്രഹിക്കുന്നു. ലഭ്യമായ തീയതിയും മറ്റു വിവരങ്ങളും അറിയിക്കാമോ?') }}" 
               target="_blank" 
               class="flex-2 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-1.5 shadow-md">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M12.012 2.25c-5.378 0-9.75 4.372-9.75 9.75 0 1.72.448 3.396 1.3 4.873l-1.383 5.05 5.168-1.357c1.428.777 3.037 1.184 4.665 1.185h.004c5.376 0 9.748-4.372 9.748-9.75 0-2.605-1.014-5.053-2.857-6.897A9.68 9.68 0 0012.012 2.25zm5.72 13.725c-.244.688-1.2 1.254-1.645 1.3-.448.047-.893.208-2.88-.574-2.544-1.002-4.178-3.59-4.305-3.76-.126-.167-1.026-1.365-1.026-2.597 0-1.233.645-1.84.872-2.088.227-.248.5-.31.666-.31.168 0 .337.002.484.01.155.007.362-.058.567.447.21.517.717 1.748.778 1.873.063.125.105.27.02.436-.083.167-.126.27-.253.418-.125.146-.264.327-.377.44-.127.126-.26.262-.112.518.148.256.66 1.085 1.417 1.758.974.87 1.794 1.14 2.047 1.266.253.126.402.105.55-.063.148-.168.633-.734.802-.986.168-.25.337-.21.565-.126.23.084 1.458.687 1.71.813.253.126.422.188.485.293.063.104.063.605-.18 1.293z"/>
                </svg>
                <span>WhatsApp Booking</span>
            </a>
        </div>
    </div>
</x-layouts.app>
