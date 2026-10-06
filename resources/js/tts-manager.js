/**
 * Yuvann Regional Audio & Text-to-Speech (TTS) Engine
 * 
 * Powered by Hybrid Native Architecture:
 * 1. Checks if browser/OS has an authentic native voice for the selected locale.
 * 2. If present (e.g. English, Hindi, or devices with installed Indic packs),
 *    uses window.speechSynthesis with sentence chunking & interruption guard.
 * 3. If the browser/OS LACKS native voice support for Indic languages like
 *    Malayalam (ml) or Tamil (ta) (which causes browsers to fall back to English
 *    voices that skip Indic characters and only read numbers out loud),
 *    it seamlessly uses Yuvann's high-fidelity Regional Audio Streamer (/api/tts/stream).
 * 
 * Result: Fluent, authentic pronunciation in Malayalam, Tamil, Hindi & English
 * across ALL devices, operating systems, and browsers.
 */

export class YuvannTTSManager {
    constructor() {
        this.synth = typeof window !== 'undefined' && 'speechSynthesis' in window ? window.speechSynthesis : null;
        this.voices = [];
        this.currentUtterance = null;
        this.state = 'idle'; // 'idle' | 'playing' | 'paused'
        this.currentLocale = 'en';
        this.activeText = '';
        this.chunks = [];
        this.currentChunkIndex = 0;
        this.onStateChangeCallbacks = [];
        this.studioAudioElement = null;
        this.streamAudioElement = null;
        this.mode = 'synth'; // 'synth' | 'stream' | 'studio'

        this.localeMap = {
            en: ['en-IN', 'en-GB', 'en-US', 'en'],
            ml: ['ml-IN', 'ml'],
            hi: ['hi-IN', 'hi'],
            ta: ['ta-IN', 'ta'],
        };

        this.labels = {
            en: {
                listen: 'Listen to article',
                playing: 'Playing audio...',
                paused: 'Paused',
                completed: 'Audio finished',
                stopped: 'Stopped',
            },
            ml: {
                listen: 'ലേഖനം കേൾക്കുക',
                playing: 'ഓഡിയോ കേൾക്കുന്നു...',
                paused: 'നിർത്തിവെച്ചു',
                completed: 'ഓഡിയോ പൂർത്തിയായി',
                stopped: 'നിർത്തി',
            },
            hi: {
                listen: 'लेख सुनें',
                playing: 'ऑडियो चल रहा है...',
                paused: 'रुका हुआ',
                completed: 'ऑडियो समाप्त',
                stopped: 'रोक दिया',
            },
            ta: {
                listen: 'கட்டுரையை கேளுங்கள்',
                playing: 'ஆடியோ ஒலிக்கிறது...',
                paused: 'இடைநிறுத்தப்பட்டது',
                completed: 'ஆடியோ முடிந்தது',
                stopped: 'நிறுத்தப்பட்டது',
            },
        };

        this.initVoices();
    }

    isSupported() {
        return true; // Supported universally via hybrid Web Speech + Streaming engine
    }

    initVoices() {
        if (!this.synth) return;

        const populate = () => {
            this.voices = this.synth.getVoices();
        };

        populate();
        if (typeof this.synth.onvoiceschanged !== 'undefined') {
            this.synth.onvoiceschanged = populate;
        }
    }

    onStateChange(callback) {
        if (typeof callback === 'function') {
            this.onStateChangeCallbacks.push(callback);
        }
    }

    notifyState(detail = {}) {
        this.onStateChangeCallbacks.forEach(cb => {
            try {
                cb({
                    state: this.state,
                    locale: this.currentLocale,
                    mode: this.mode,
                    ...detail,
                });
            } catch (e) {
                console.error('[TTSManager] Callback error:', e);
            }
        });
    }

    getLabel(locale, key = 'listen') {
        const lang = this.labels[locale] || this.labels.en;
        return lang[key] || this.labels.en[key] || '';
    }

    /**
     * Checks if the device/browser actually has a native voice for this locale
     */
    hasNativeVoice(locale) {
        if (!this.synth) return false;

        const voices = this.synth.getVoices();
        if (!voices || voices.length === 0) return false;

        const targetPrefixes = (this.localeMap[locale] || [locale]).map(l => l.split('-')[0].toLowerCase());

        return voices.some(v => {
            const lang = (v.lang || '').replace('_', '-').toLowerCase();
            const voiceName = (v.name || '').toLowerCase();

            // Match language code
            if (targetPrefixes.some(p => lang.startsWith(p))) {
                return true;
            }

            // Match full language name in voice metadata
            if (locale === 'ml' && (voiceName.includes('malayalam') || lang.includes('ml'))) return true;
            if (locale === 'ta' && (voiceName.includes('tamil') || lang.includes('ta'))) return true;
            if (locale === 'hi' && (voiceName.includes('hindi') || lang.includes('hi'))) return true;

            return false;
        });
    }

    findBestVoice(locale) {
        if (!this.voices || this.voices.length === 0) {
            this.voices = this.synth ? this.synth.getVoices() : [];
        }

        const candidates = this.localeMap[locale] || [locale];

        for (const target of candidates) {
            const exact = this.voices.find(v => {
                const lang = (v.lang || '').replace('_', '-').toLowerCase();
                return lang === target.toLowerCase();
            });
            if (exact) return exact;
        }

        for (const target of candidates) {
            const prefix = target.split('-')[0].toLowerCase();
            const partial = this.voices.find(v => {
                const lang = (v.lang || '').replace('_', '-').toLowerCase();
                return lang.startsWith(prefix);
            });
            if (partial) return partial;
        }

        return null;
    }

    cleanText(htmlOrText) {
        if (!htmlOrText) return '';

        // Add sentence boundaries after block elements
        let text = htmlOrText
            .replace(/<\/(h[1-6]|p|li|div|blockquote)>/gi, '. ')
            .replace(/<[^>]+>/g, ' ');

        const tmp = document.createElement('div');
        tmp.innerHTML = text;
        text = tmp.textContent || tmp.innerText || '';

        return text.replace(/\s+/g, ' ').replace(/\.+/g, '.').trim();
    }

    chunkText(text, maxLength = 140) {
        if (!text) return [];

        const sentences = text.match(/[^.!?\n]+[.!?\n]+|[^.!?\n]+$/g) || [text];
        const chunks = [];
        let currentChunk = '';

        for (const sentence of sentences) {
            const trimmed = sentence.trim();
            if (!trimmed) continue;

            if ((currentChunk + ' ' + trimmed).length <= maxLength) {
                currentChunk = currentChunk ? currentChunk + ' ' + trimmed : trimmed;
            } else {
                if (currentChunk) chunks.push(currentChunk);
                currentChunk = trimmed;
            }
        }

        if (currentChunk) {
            chunks.push(currentChunk);
        }

        return chunks;
    }

    /**
     * Play custom studio audio URL if provided
     */
    playStudioAudio(audioUrl, onEnd) {
        this.stop();

        this.mode = 'studio';
        this.studioAudioElement = new Audio(audioUrl);
        this.state = 'playing';
        this.notifyState();

        this.studioAudioElement.onended = () => {
            this.state = 'idle';
            this.notifyState({ finished: true });
            if (onEnd) onEnd();
        };

        this.studioAudioElement.onerror = () => {
            console.warn('[TTSManager] Studio audio playback error.');
            this.state = 'idle';
            this.notifyState({ error: true });
        };

        this.studioAudioElement.play().catch(err => {
            console.warn('[TTSManager] Audio autoplay prevented:', err);
            this.state = 'idle';
            this.notifyState({ error: true });
        });
    }

    /**
     * Play via high-fidelity Regional Audio Streamer (for Malayalam, Tamil, etc.)
     */
    playStreamAudio() {
        if (this.currentChunkIndex >= this.chunks.length) {
            this.state = 'idle';
            this.notifyState({ finished: true });
            return;
        }

        const chunk = this.chunks[this.currentChunkIndex];
        const streamUrl = '/api/tts/stream?locale=' + encodeURIComponent(this.currentLocale) + 
                          '&text=' + encodeURIComponent(chunk);

        this.streamAudioElement = new Audio(streamUrl);
        this.mode = 'stream';
        this.state = 'playing';

        this.streamAudioElement.onended = () => {
            if (this.state === 'playing') {
                this.currentChunkIndex++;
                this.playStreamAudio();
            }
        };

        this.streamAudioElement.onerror = (e) => {
            console.warn('[TTSManager] Stream chunk error at index', this.currentChunkIndex, e);
            // Advance to next chunk if one fails
            this.currentChunkIndex++;
            if (this.currentChunkIndex < this.chunks.length) {
                this.playStreamAudio();
            } else {
                this.state = 'idle';
                this.notifyState({ error: true });
            }
        };

        this.streamAudioElement.play().catch(err => {
            console.warn('[TTSManager] Stream autoplay prevented:', err);
            this.state = 'idle';
            this.notifyState({ error: true });
        });
    }

    /**
     * Main Playback Method (Hybrid: Studio -> Web Speech -> Streaming)
     */
    play({ text, locale = 'en', audioUrl = null, onStateChange = null }) {
        if (onStateChange) {
            this.onStateChange(onStateChange);
        }

        // Interruption guard: Cancel any existing audio before starting
        this.stop();

        this.currentLocale = locale;
        this.activeText = this.cleanText(text);

        if (!this.activeText) {
            this.state = 'idle';
            this.notifyState();
            return;
        }

        this.chunks = this.chunkText(this.activeText);
        this.currentChunkIndex = 0;

        // 1. Prioritize custom studio audio
        if (audioUrl) {
            return this.playStudioAudio(audioUrl);
        }

        // 2. Check if native OS voice exists for this language
        // For Malayalam and Tamil: Windows and some browsers DO NOT have ml/ta voices installed.
        // If an English voice is used, it skips all Indic letters and only reads numbers!
        // Therefore, if no native voice is present, route immediately to high-fidelity Regional Audio Streamer.
        const hasVoice = this.hasNativeVoice(locale);

        if (!hasVoice) {
            console.log(`[TTSManager] No native OS voice found for ${locale}. Using Regional Audio Streamer.`);
            this.mode = 'stream';
            this.state = 'playing';
            this.notifyState({ starting: true, mode: 'stream' });
            this.playStreamAudio();
            return;
        }

        // 3. Native Web Speech synthesis (when voice IS installed)
        this.mode = 'synth';
        this.state = 'playing';
        this.notifyState({ starting: true, mode: 'synth' });
        this.speakCurrentChunk();
    }

    speakCurrentChunk() {
        if (!this.synth || this.state !== 'playing') return;

        if (this.currentChunkIndex >= this.chunks.length) {
            this.state = 'idle';
            this.notifyState({ finished: true });
            return;
        }

        const chunkText = this.chunks[this.currentChunkIndex];
        const utterance = new SpeechSynthesisUtterance(chunkText);

        const targetLang = (this.localeMap[this.currentLocale] || [this.currentLocale])[0];
        utterance.lang = targetLang;

        const voice = this.findBestVoice(this.currentLocale);
        if (voice) {
            utterance.voice = voice;
        }

        utterance.rate = 0.95;
        utterance.pitch = 1.0;

        utterance.onend = () => {
            if (this.state === 'playing') {
                this.currentChunkIndex++;
                this.speakCurrentChunk();
            }
        };

        utterance.onerror = (e) => {
            if (e.error === 'interrupted' || e.error === 'canceled') {
                return;
            }
            console.warn('[TTSManager] SpeechSynthesis error, falling back to Regional Streamer:', e.error);
            // Fall back to stream audio for remaining chunks
            this.mode = 'stream';
            this.playStreamAudio();
        };

        this.currentUtterance = utterance;
        this.synth.speak(utterance);
    }

    pause() {
        if (this.mode === 'studio' && this.studioAudioElement) {
            this.studioAudioElement.pause();
            this.state = 'paused';
            this.notifyState();
            return;
        }

        if (this.mode === 'stream' && this.streamAudioElement) {
            this.streamAudioElement.pause();
            this.state = 'paused';
            this.notifyState();
            return;
        }

        if (this.synth && this.synth.speaking && this.state === 'playing') {
            this.synth.pause();
            this.state = 'paused';
            this.notifyState();
        }
    }

    resume() {
        if (this.mode === 'studio' && this.studioAudioElement && this.state === 'paused') {
            this.studioAudioElement.play();
            this.state = 'playing';
            this.notifyState();
            return;
        }

        if (this.mode === 'stream' && this.streamAudioElement && this.state === 'paused') {
            this.streamAudioElement.play();
            this.state = 'playing';
            this.notifyState();
            return;
        }

        if (this.synth && this.state === 'paused') {
            this.synth.resume();
            this.state = 'playing';
            this.notifyState();
        }
    }

    toggle(params) {
        if (this.state === 'playing') {
            this.pause();
        } else if (this.state === 'paused') {
            this.resume();
        } else {
            this.play(params);
        }
    }

    stop() {
        if (this.studioAudioElement) {
            try {
                this.studioAudioElement.pause();
                this.studioAudioElement.currentTime = 0;
            } catch (e) {}
            this.studioAudioElement = null;
        }

        if (this.streamAudioElement) {
            try {
                this.streamAudioElement.pause();
                this.streamAudioElement.currentTime = 0;
            } catch (e) {}
            this.streamAudioElement = null;
        }

        if (this.synth) {
            try {
                this.synth.cancel();
            } catch (e) {}
        }

        this.currentUtterance = null;
        this.state = 'idle';
        this.currentChunkIndex = 0;
        this.notifyState({ stopped: true });
    }
}

// Global Singleton for easy browser and Alpine access
if (typeof window !== 'undefined') {
    window.YuvannTTS = window.YuvannTTS || new YuvannTTSManager();
}

export default YuvannTTSManager;
