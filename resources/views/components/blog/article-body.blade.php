@props([
    'post' => null,
])

<!-- Multilingual Blog Article Body with Native Indic Typography -->
<div class="blog-article-wrapper">
    <!-- Dynamic Heading -->
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-brand-green-900 mb-6 transition-all duration-300"
        :class="{
            'font-serif leading-tight': activeLocale === 'en',
            'font-[\'Noto_Sans_Malayalam\',sans-serif] leading-[1.4]': activeLocale === 'ml',
            'font-[\'Noto_Sans_Devanagari\',sans-serif] leading-[1.4]': activeLocale === 'hi',
            'font-[\'Noto_Sans_Tamil\',sans-serif] leading-[1.4]': activeLocale === 'ta'
        }"
        x-text="currentTranslation.title">
        {{ $post->title }}
    </h1>

    <!-- Dynamic Excerpt -->
    <template x-if="currentTranslation.excerpt">
        <p class="text-base sm:text-lg text-brand-green-900/80 mb-8 font-light transition-all duration-300"
           :class="{
               'leading-relaxed': activeLocale === 'en',
               'font-[\'Noto_Sans_Malayalam\',sans-serif] leading-[2.0]': activeLocale === 'ml',
               'font-[\'Noto_Sans_Devanagari\',sans-serif] leading-[1.9]': activeLocale === 'hi',
               'font-[\'Noto_Sans_Tamil\',sans-serif] leading-[2.0]': activeLocale === 'ta'
           }"
           x-text="currentTranslation.excerpt">
            {{ $post->excerpt }}
        </p>
    </template>

    <!-- Rich Prose Body -->
    <article class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-brand-green-100 mb-12">
        <style>
            .blog-prose h2 {
                font-size: 1.65rem;
                font-weight: 700;
                color: #1a2a22;
                margin-top: 2.2rem;
                margin-bottom: 0.9rem;
                line-height: 1.35;
            }
            .blog-prose h3 {
                font-size: 1.3rem;
                font-weight: 600;
                color: #1a2a22;
                margin-top: 1.7rem;
                margin-bottom: 0.6rem;
                line-height: 1.4;
            }
            .blog-prose p {
                font-size: 1.05rem;
                color: #2c3e34;
                margin-bottom: 1.35rem;
            }
            .blog-prose p.lead {
                font-size: 1.15rem;
                color: #1a2a22;
                border-left: 3px solid #c89d53;
                padding-left: 1rem;
                font-style: italic;
                margin-bottom: 1.75rem;
            }
            .blog-prose ul, .blog-prose ol {
                margin-bottom: 1.35rem;
                padding-left: 1.5rem;
                color: #2c3e34;
            }
            .blog-prose ul {
                list-style-type: disc;
            }
            .blog-prose ol {
                list-style-type: decimal;
            }
            .blog-prose li {
                margin-bottom: 0.5rem;
            }
            .blog-prose .ayurveda-tip-box {
                background-color: #f3f8f4;
                border: 1px solid #b7dbbf;
                border-left: 5px solid #235338;
                border-radius: 0.75rem;
                padding: 1.25rem 1.5rem;
                margin: 2rem 0;
            }
            .blog-prose .ayurveda-tip-box strong {
                color: #1a422b;
                display: block;
                margin-bottom: 0.5rem;
                font-size: 1rem;
            }
            .blog-prose .ayurveda-tip-box p {
                margin-bottom: 0;
                font-size: 0.95rem;
            }

            /* Indic Script Typography Tuning */
            .indic-ml {
                font-family: 'Noto Sans Malayalam', sans-serif;
                line-height: 2.1 !important;
                letter-spacing: 0.01em;
            }
            .indic-ml h2, .indic-ml h3 {
                font-family: 'Noto Sans Malayalam', sans-serif !important;
                line-height: 1.5 !important;
            }
            .indic-hi {
                font-family: 'Noto Sans Devanagari', sans-serif;
                line-height: 2.0 !important;
                letter-spacing: 0.01em;
            }
            .indic-hi h2, .indic-hi h3 {
                font-family: 'Noto Sans Devanagari', sans-serif !important;
                line-height: 1.45 !important;
            }
            .indic-ta {
                font-family: 'Noto Sans Tamil', sans-serif;
                line-height: 2.1 !important;
                letter-spacing: 0.01em;
            }
            .indic-ta h2, .indic-ta h3 {
                font-family: 'Noto Sans Tamil', sans-serif !important;
                line-height: 1.5 !important;
            }
            .indic-en {
                font-family: 'Inter', sans-serif;
                line-height: 1.85 !important;
            }
            .indic-en h2, .indic-en h3 {
                font-family: 'Playfair Display', serif !important;
            }
        </style>

        <!-- Dynamically Swapped HTML Prose (Swaps instantly on tab click with zero page reload) -->
        <div class="blog-prose transition-all duration-200"
             :class="{
                 'indic-en': activeLocale === 'en',
                 'indic-ml': activeLocale === 'ml',
                 'indic-hi': activeLocale === 'hi',
                 'indic-ta': activeLocale === 'ta'
             }"
             x-html="currentTranslation.content">
            {!! $post->content !!}
        </div>
    </article>
</div>
