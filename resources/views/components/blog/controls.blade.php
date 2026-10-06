@props([
    'availableLocales' => ['en'],
    'translations' => [],
])

@php
    $localeMeta = [
        'en' => ['label' => 'English', 'native' => 'English', 'flag' => '🇬🇧', 'fontClass' => 'font-sans'],
        'ml' => ['label' => 'Malayalam', 'native' => 'മലയാളം', 'flag' => '🌴', 'fontClass' => 'font-["Noto_Sans_Malayalam",sans-serif]'],
        'hi' => ['label' => 'Hindi', 'native' => 'हिन्दी', 'flag' => '🇮🇳', 'fontClass' => 'font-["Noto_Sans_Devanagari",sans-serif]'],
        'ta' => ['label' => 'Tamil', 'native' => 'தமிழ்', 'flag' => '🌺', 'fontClass' => 'font-["Noto_Sans_Tamil",sans-serif]'],
    ];

    $speechLabels = [
        'en' => [
            'listen' => 'Listen to article',
            'playing' => 'Playing audio...',
            'paused' => 'Paused',
            'stop' => 'Stop',
        ],
        'ml' => [
            'listen' => 'ലേഖനം കേൾക്കുക',
            'playing' => 'ഓഡിയോ കേൾക്കുന്നു...',
            'paused' => 'നിർത്തിവെച്ചു',
            'stop' => 'നിർത്തുക',
        ],
        'hi' => [
            'listen' => 'लेख सुनें',
            'playing' => 'ऑडियो चल रहा है...',
            'paused' => 'रुका हुआ',
            'stop' => 'रोकें',
        ],
        'ta' => [
            'listen' => 'கட்டுரையை கேளுங்கள்',
            'playing' => 'ஆடியோ ஒலிக்கிறது...',
            'paused' => 'இடைநிறுத்தப்பட்டது',
            'stop' => 'நிறுத்து',
        ],
    ];
@endphp

<!-- Interactive Blog Controls Header (Language Switcher + Regional TTS Audio Player) -->
<div class="my-6 p-4 sm:p-5 rounded-2xl bg-gradient-to-br from-brand-green-900 via-brand-green-950 to-brand-green-900 text-white shadow-xl border border-brand-gold-500/30">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        
        <!-- 1. Language Switcher (Only renders tabs for locales present in this article) -->
        <div class="flex items-center gap-2 flex-wrap">
            <span class="text-[11px] font-bold uppercase tracking-wider text-brand-gold-300 mr-1 flex items-center gap-1.5">
                <svg class="w-4 h-4 text-brand-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                </svg>
                <span>Language:</span>
            </span>

            <div class="inline-flex p-1 rounded-xl bg-white/10 border border-white/10 backdrop-blur-sm gap-1">
                @foreach($availableLocales as $loc)
                    @php
                        $meta = $localeMeta[$loc] ?? ['label' => strtoupper($loc), 'native' => strtoupper($loc), 'flag' => '🌐', 'fontClass' => 'font-sans'];
                    @endphp
                    <button type="button" 
                            @click="switchLocale('{{ $loc }}')"
                            :class="activeLocale === '{{ $loc }}' ? 'bg-brand-gold-400 text-brand-green-950 font-black shadow-md ring-1 ring-brand-gold-300' : 'text-brand-green-100 hover:text-white hover:bg-white/10 font-medium'"
                            class="px-3.5 py-1.5 rounded-lg text-xs sm:text-sm transition-all duration-200 flex items-center gap-1.5 cursor-pointer whitespace-nowrap {{ $meta['fontClass'] }}"
                            title="Read in {{ $meta['label'] }}">
                        <span>{{ $meta['flag'] }}</span>
                        <span>{{ $meta['native'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>

        <!-- 2. Integrated Audio Player Widget (TTS / Studio Audio) -->
        <div class="flex items-center gap-3">
            <!-- Audio Playback Toggle Button -->
            <button type="button" 
                    @click="toggleAudio()"
                    class="group relative inline-flex items-center gap-2.5 px-4 py-2 sm:px-5 sm:py-2.5 rounded-full text-xs sm:text-sm font-bold transition-all duration-300 shadow-md cursor-pointer border"
                    :class="audioState === 'playing' 
                        ? 'bg-brand-gold-400 text-brand-green-950 border-brand-gold-300 shadow-brand-gold-400/30 ring-2 ring-brand-gold-400/50' 
                        : (audioState === 'paused' 
                            ? 'bg-amber-100 text-amber-950 border-amber-300' 
                            : 'bg-white/15 hover:bg-brand-gold-400 text-white hover:text-brand-green-950 border-white/20 hover:border-brand-gold-400')">
                
                <!-- Play Icon (idle) -->
                <template x-if="audioState === 'idle'">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-brand-gold-300 group-hover:text-brand-green-950 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </span>
                </template>

                <!-- Pause Icon (playing) -->
                <template x-if="audioState === 'playing'">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-brand-green-950" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                        </svg>
                        <!-- Sound wave animation -->
                        <span class="flex items-center gap-0.5 h-3">
                            <span class="w-1 bg-brand-green-950 rounded-full animate-bounce h-2" style="animation-delay: 0.1s"></span>
                            <span class="w-1 bg-brand-green-950 rounded-full animate-bounce h-3.5" style="animation-delay: 0.2s"></span>
                            <span class="w-1 bg-brand-green-950 rounded-full animate-bounce h-2" style="animation-delay: 0.3s"></span>
                        </span>
                    </span>
                </template>

                <!-- Resume Icon (paused) -->
                <template x-if="audioState === 'paused'">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-amber-950" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </span>
                </template>

                <!-- Dynamic localized label text -->
                <span x-text="getAudioLabel()" class="tracking-wide"></span>
            </button>

            <!-- Stop Button (Visible only when playing or paused) -->
            <button type="button" 
                    x-show="audioState !== 'idle'" 
                    @click="stopAudio()"
                    class="p-2 sm:px-3 sm:py-2 rounded-full text-xs font-semibold bg-white/10 hover:bg-red-500/80 text-white/90 hover:text-white border border-white/20 transition-all flex items-center gap-1.5 cursor-pointer"
                    title="Stop audio">
                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                    <path d="M6 6h12v12H6z"/>
                </svg>
                <span class="hidden sm:inline" x-text="getStopLabel()">Stop</span>
            </button>
        </div>

    </div>

    <!-- Active Mode & Voice Indicator bar -->
    <div class="mt-3 pt-2.5 border-t border-white/10 flex items-center justify-between text-[11px] text-brand-green-100/70">
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full" :class="audioState === 'playing' ? 'bg-emerald-400 animate-pulse' : 'bg-gray-400'"></span>
            <span x-text="activeAudioBadge"></span>
        </div>
        <div class="text-[10px] text-brand-gold-300 font-mono tracking-wider">
            YUVANN NATIVE AUDIO
        </div>
    </div>
</div>
