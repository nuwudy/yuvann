/**
 * Yuvann Regional Audio & Text-to-Speech (TTS) Engine
 * 
 * Powered by Web Speech API (window.speechSynthesis)
 * Supports dynamic locale mapping:
 *   - 'en' -> 'en-IN' (Indian English preferred)
 *   - 'ml' -> 'ml-IN' (Malayalam)
 *   - 'hi' -> 'hi-IN' (Hindi)
 *   - 'ta' -> 'ta-IN' (Tamil)
 * 
 * Includes voice caching, sentence chunking for long articles,
 * interruption guard, error handling, and studio audio fallback.
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
                unsupported: 'Audio reading not supported in this browser',
                completed: 'Audio finished',
                voiceFound: 'Doctor Voice Active',
                voiceNotFound: 'System Voice Active',
            },
            ml: {
                listen: 'ലേഖനം കേൾക്കുക',
                playing: 'ഓഡിയോ കേൾക്കുന്നു...',
                paused: 'നിർത്തിവെച്ചു',
                unsupported: 'ഈ ബ്രൗസറിൽ ഓഡിയോ ലഭ്യമല്ല',
                completed: 'ഓഡിയോ പൂർത്തിയായി',
                voiceFound: 'ശബ്ദം ലഭ്യമാണ്',
                voiceNotFound: 'സാധാരണ ശബ്ദം',
            },
            hi: {
                listen: 'लेख सुनें',
                playing: 'ऑडियो चल रहा है...',
                paused: 'रुका हुआ',
                unsupported: 'इस ब्राउज़र में ऑडियो समर्थित नहीं है',
                completed: 'ऑडियो समाप्त',
                voiceFound: 'आवाज उपलब्ध है',
                voiceNotFound: 'सिस्टम आवाज',
            },
            ta: {
                listen: 'கட்டுரையை கேளுங்கள்',
                playing: 'ஆடியோ ஒலிக்கிறது...',
                paused: 'இடைநிறுத்தப்பட்டது',
                unsupported: 'இந்த உலாவியில் ஆடியோ கிடைக்கவில்லை',
                completed: 'ஆடியோ முடிந்தது',
                voiceFound: 'குரல் கிடைக்கிறது',
                voiceNotFound: 'கணினி குரல்',
            },
        };

        this.initVoices();
    }

    isSupported() {
        return !!this.synth && typeof window.SpeechSynthesisUtterance !== 'undefined';
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
     * Resolves the best available voice for given ISO code (en, ml, hi, ta)
     */
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

    /**
     * Clean raw HTML or Markdown into clean human-readable sentences
     */
    cleanText(htmlOrText) {
        if (!htmlOrText) return '';

        // Add pause indicators after block elements
        let text = htmlOrText
            .replace(/<\/(h[1-6]|p|li|div|blockquote)>/gi, '. ')
            .replace(/<[^>]+>/g, ' ');

        // Decode basic HTML entities
        const tmp = document.createElement('div');
        tmp.innerHTML = text;
        text = tmp.textContent || tmp.innerText || '';

        // Consolidate whitespace and punctuation
        return text.replace(/\s+/g, ' ').replace(/\.+/g, '.').trim();
    }

    /**
     * Split text into manageable sentence chunks (prevents Chrome 15s TTS cutoff bug)
     */
    chunkText(text, maxLength = 160) {
        if (!text) return [];

        const sentences = text.match(/[^.!?]+[.!?]+|[^.!?]+$/g) || [text];
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

        this.studioAudioElement = new Audio(audioUrl);
        this.state = 'playing';
        this.notifyState({ isStudioAudio: true });

        this.studioAudioElement.onended = () => {
            this.state = 'idle';
            this.notifyState({ isStudioAudio: true, finished: true });
            if (onEnd) onEnd();
        };

        this.studioAudioElement.onerror = () => {
            console.warn('[TTSManager] Studio audio playback error, falling back to TTS.');
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
     * Main Playback Method (TTS or custom audio)
     */
    play({ text, locale = 'en', audioUrl = null, onStateChange = null }) {
        if (onStateChange) {
            this.onStateChange(onStateChange);
        }

        // If studio audio URL is provided, prioritize it
        if (audioUrl) {
            return this.playStudioAudio(audioUrl);
        }

        if (!this.isSupported()) {
            this.notifyState({ error: 'unsupported' });
            return;
        }

        // Interruption guard: Cancel any existing utterance before starting new
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
        this.state = 'playing';

        this.notifyState({ starting: true });
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

        utterance.rate = 0.95; // Slightly measured, clear cadence for wellness advice
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
            console.warn('[TTSManager] Utterance error:', e.error);
            // Advance to next chunk if one fails
            this.currentChunkIndex++;
            if (this.currentChunkIndex < this.chunks.length) {
                this.speakCurrentChunk();
            } else {
                this.state = 'idle';
                this.notifyState({ error: e.error });
            }
        };

        this.currentUtterance = utterance;
        this.synth.speak(utterance);
    }

    /**
     * Pause speech
     */
    pause() {
        if (this.studioAudioElement && !this.studioAudioElement.paused) {
            this.studioAudioElement.pause();
            this.state = 'paused';
            this.notifyState({ isStudioAudio: true });
            return;
        }

        if (this.synth && this.synth.speaking && this.state === 'playing') {
            this.synth.pause();
            this.state = 'paused';
            this.notifyState();
        }
    }

    /**
     * Resume speech
     */
    resume() {
        if (this.studioAudioElement && this.studioAudioElement.paused && this.state === 'paused') {
            this.studioAudioElement.play();
            this.state = 'playing';
            this.notifyState({ isStudioAudio: true });
            return;
        }

        if (this.synth && this.state === 'paused') {
            this.synth.resume();
            this.state = 'playing';
            this.notifyState();
        }
    }

    /**
     * Toggle play / pause
     */
    toggle(params) {
        if (this.state === 'playing') {
            this.pause();
        } else if (this.state === 'paused') {
            this.resume();
        } else {
            this.play(params);
        }
    }

    /**
     * Stop and cancel immediately (Interruption Guard)
     */
    stop() {
        if (this.studioAudioElement) {
            try {
                this.studioAudioElement.pause();
                this.studioAudioElement.currentTime = 0;
            } catch (e) {}
            this.studioAudioElement = null;
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
