<x-layouts.app>
    <!-- Hero Section -->
    <div class="relative bg-brand-green-900 text-white overflow-hidden py-16 sm:py-24">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-brand-gold-500 blur-3xl mix-blend-screen"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center gap-12">
            <!-- Image Side -->
            <div class="w-48 h-48 sm:w-64 sm:h-64 flex-shrink-0 relative">
                <div class="absolute inset-0 rounded-full border-4 border-brand-gold-500/30 scale-105"></div>
                <img src="https://yuvann.com/storage/media/5a70348f-5e77-430c-9440-e8fbbb60e7d9.webp" 
                     alt="Dr. Sajeev Dev" 
                     class="w-full h-full object-cover rounded-full shadow-2xl relative z-10">
            </div>
            
            <!-- Content Side -->
            <div class="text-center md:text-left flex-1 space-y-4">
                <h1 class="text-4xl sm:text-5xl font-serif font-bold text-brand-gold-100">Dr. Sajeev Dev</h1>
                <p class="text-lg sm:text-xl font-semibold text-brand-green-100">
                    Ayurvedic Wellness Dietician | Certified Nattu Vaidhyan | Herbal Medicine Manufacturing Expert
                </p>
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-2 text-xs font-semibold text-brand-green-900 mt-4">
                    <span class="bg-brand-gold-400 px-3 py-1 rounded-full">Motivational Trainer</span>
                    <span class="bg-brand-gold-400 px-3 py-1 rounded-full">Success Coach</span>
                    <span class="bg-brand-gold-400 px-3 py-1 rounded-full">Author</span>
                    <span class="bg-brand-gold-400 px-3 py-1 rounded-full">Counselor</span>
                    <span class="bg-brand-gold-400 px-3 py-1 rounded-full">Entrepreneur</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-[#faf9f6] py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <!-- Biography -->
            <section class="prose prose-brand-green prose-lg max-w-none text-brand-green-900/80 leading-relaxed text-justify">
                <p>
                    <strong>Dr. Sajeev Dev</strong> is a highly respected Wellness Mentor, Ayurvedic Wellness Dietician, Certified Nattu Vaidhyan, Trainer, Counselor, and Serial Entrepreneur with over three decades of professional experience in health, wellness, education, and personal transformation.
                </p>
                <p>
                    He successfully completed the <em>Diploma in Herbal Medicine Manufacture</em> and <em>Diploma in Ayurvedic Dietician</em> with an <strong>A+ Grade</strong> from the Technical Study and Skill Research (TSSR) Council, demonstrating his commitment to traditional Indian healthcare systems and scientific wellness practices.
                </p>
                <p>
                    As a Certified Traditional Community Healthcare Provider and Certified Nattu Vaidhyan, Dr. Sajeev Dev combines the timeless wisdom of Ayurveda with modern wellness principles to guide individuals toward healthier and more balanced lives.
                </p>
            </section>

            <!-- Mission & Motto -->
            <section class="bg-white rounded-3xl p-8 sm:p-12 border border-brand-green-100 shadow-sm relative overflow-hidden">
                <div class="absolute -top-10 -right-10 text-9xl text-brand-green-50 opacity-50 font-serif">"</div>
                
                <h3 class="text-2xl font-serif font-bold text-brand-green-900 mb-4 flex items-center gap-2">
                    <span class="text-brand-gold-500">🎯</span> Our Mission
                </h3>
                <p class="text-brand-green-800/90 leading-relaxed mb-8">
                    To promote healthy living through Ayurveda, proper nutrition, herbal remedies, and positive lifestyle changes, empowering people to achieve physical, mental, and emotional well-being naturally.
                </p>

                <div class="h-px w-full bg-brand-green-100 mb-8"></div>

                <h3 class="text-xl font-serif font-bold text-brand-green-900 mb-4 flex items-center gap-2">
                    <span class="text-brand-gold-500">✨</span> Professional Motto
                </h3>
                <blockquote class="text-2xl sm:text-3xl font-serif italic text-brand-green-800 leading-tight">
                    "Nature Heals.<br>Knowledge Empowers.<br>Healthy Living Inspires."
                </blockquote>
            </section>

            <!-- Qualifications & Expertise Grid -->
            <div class="grid md:grid-cols-2 gap-8 sm:gap-12">
                
                <!-- Qualifications -->
                <section>
                    <h3 class="text-2xl font-serif font-bold text-brand-green-900 mb-6 pb-2 border-b-2 border-brand-gold-400 inline-block">
                        Professional Qualifications
                    </h3>
                    <ul class="space-y-4">
                        @foreach([
                            'Doctorate in Business Administration',
                            'Diploma in Herbal Medicine Manufacture (A+ Grade)',
                            'Diploma in Ayurvedic Dietician (A+ Grade)',
                            'Certified Nattu Vaidhyan',
                            'Certified Traditional Community Healthcare Provider (CTCHP)',
                            'Certified Counselor',
                            'Certified Mind Metrix Analyst',
                            'Motivational Trainer',
                            'Success Coach',
                            'Author and Entrepreneur'
                        ] as $qualification)
                            <li class="flex items-start gap-3 text-brand-green-800">
                                <svg class="w-6 h-6 text-brand-gold-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $qualification }}</span>
                            </li>
                        @endforeach
                    </ul>
                </section>

                <!-- Expertise -->
                <section>
                    <h3 class="text-2xl font-serif font-bold text-brand-green-900 mb-6 pb-2 border-b-2 border-brand-gold-400 inline-block">
                        Areas of Expertise
                    </h3>
                    <ul class="space-y-4">
                        @foreach([
                            'Ayurvedic Wellness Consultation',
                            'Ayurvedic Diet & Lifestyle Guidance',
                            'Herbal Medicine Manufacturing',
                            'Traditional Nattu Vaidyam',
                            'Natural Health Promotion',
                            'Wellness Counseling',
                            'Preventive Healthcare',
                            'Stress Management',
                            'Holistic Nutrition',
                            'Personal Transformation & Mindset Coaching'
                        ] as $expertise)
                            <li class="flex items-start gap-3 text-brand-green-800">
                                <svg class="w-6 h-6 text-brand-green-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>{{ $expertise }}</span>
                            </li>
                        @endforeach
                    </ul>
                </section>

            </div>
            
            <!-- Contact CTA -->
            <div class="text-center pt-8 border-t border-brand-green-200">
                <h3 class="text-2xl font-serif font-bold text-brand-green-900 mb-4">Start Your Wellness Journey</h3>
                <p class="text-brand-green-700/80 mb-6">Get expert, personalized medical guidance from Dr. Sajeev Dev directly on WhatsApp.</p>
                <a href="https://wa.me/917736609299?text=Hi%20Dr.%20Sajeev,%20I%20would%20like%20to%20schedule%20a%20personal%20health%20consultation." 
                   target="_blank" 
                   class="inline-flex items-center gap-2.5 px-8 py-4 border border-transparent rounded-full text-base font-semibold text-white bg-brand-green-800 hover:bg-brand-green-700 shadow-lg hover:scale-105 transition-all duration-300">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.504-5.713-1.463L0 24zm6.59-4.846c1.6.95 3.197 1.451 4.793 1.453 5.461.002 9.9-4.432 9.903-9.892.002-2.646-1.02-5.133-2.88-6.996C16.544 1.858 14.06 1.83 11.414 1.83c-5.461 0-9.9 4.431-9.903 9.892 0 2.03.535 4.017 1.549 5.754L2.08 21.82l4.567-1.198z"/>
                    </svg>
                    Contact Dr. Sajeev Dev
                </a>
            </div>

        </div>
    </div>
</x-layouts.app>
