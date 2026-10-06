<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'translations',
        'category',
        'featured_image',
        'author_name',
        'author_title',
        'author_id',
        'read_time',
        'is_published',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
            'translations' => 'array',
        ];
    }

    /**
     * Relationship to author (User) if assigned.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Relationship to featured or introduced products in this post.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'blog_post_product')->withTimestamps();
    }

    /**
     * Scope for published articles.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where(function ($q) {
            $q->where('status', 'published')
              ->orWhere(function ($sub) {
                  $sub->whereNull('status')->where('is_published', true);
              });
        })->where(function ($q) {
            $q->whereNull('published_at')
              ->orWhere('published_at', '<=', now());
        });
    }

    /**
     * Scope to filter by category.
     */
    public function scopeCategory(Builder $query, ?string $category): Builder
    {
        if (empty($category) || strtolower($category) === 'all') {
            return $query;
        }

        return $query->where('category', $category);
    }

    /**
     * Get list of available ISO locales for this post (e.g. ['en', 'ml', 'hi', 'ta']).
     */
    public function getAvailableLocales(): array
    {
        if (empty($this->translations) || !is_array($this->translations)) {
            return ['en'];
        }

        $valid = [];
        foreach ($this->translations as $locale => $data) {
            if (!empty($data['content']) || !empty($data['title'])) {
                $valid[] = $locale;
            }
        }

        return !empty($valid) ? array_values($valid) : ['en'];
    }

    /**
     * Retrieve structured translation attributes for a locale.
     */
    public function getTranslation(?string $locale = 'en', string $fallback = 'en'): array
    {
        $translations = $this->translations ?? [];

        if ($locale && !empty($translations[$locale]) && (!empty($translations[$locale]['title']) || !empty($translations[$locale]['content']))) {
            return array_merge([
                'locale' => $locale,
                'title' => $this->title,
                'excerpt' => $this->excerpt,
                'content' => $this->content,
                'audio_url' => null,
                'meta_title' => $this->meta_title,
                'meta_description' => $this->meta_description,
            ], $translations[$locale]);
        }

        if ($fallback && !empty($translations[$fallback])) {
            return array_merge([
                'locale' => $fallback,
                'title' => $this->title,
                'excerpt' => $this->excerpt,
                'content' => $this->content,
                'audio_url' => null,
                'meta_title' => $this->meta_title,
                'meta_description' => $this->meta_description,
            ], $translations[$fallback]);
        }

        return [
            'locale' => 'en',
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'audio_url' => null,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];
    }

    /**
     * Localized Title accessor.
     */
    public function getTitle(?string $locale = null): string
    {
        return $this->getTranslation($locale)['title'] ?? $this->title ?? '';
    }

    /**
     * Localized Excerpt accessor.
     */
    public function getExcerpt(?string $locale = null): string
    {
        return $this->getTranslation($locale)['excerpt'] ?? $this->excerpt ?? '';
    }

    /**
     * Localized Rich Content accessor.
     */
    public function getContent(?string $locale = null): string
    {
        return $this->getTranslation($locale)['content'] ?? $this->content ?? '';
    }

    /**
     * Localized Audio URL accessor (if studio recorded audio is provided).
     */
    public function getAudioUrl(?string $locale = null): ?string
    {
        return $this->getTranslation($locale)['audio_url'] ?? null;
    }

    /**
     * Localized Meta Title.
     */
    public function getMetaTitle(?string $locale = null): ?string
    {
        return $this->getTranslation($locale)['meta_title'] ?? $this->meta_title ?? $this->title;
    }

    /**
     * Localized Meta Description.
     */
    public function getMetaDescription(?string $locale = null): ?string
    {
        return $this->getTranslation($locale)['meta_description'] ?? $this->meta_description ?? $this->excerpt;
    }

    /**
     * Clean plain text extracted from content for Text-To-Speech (TTS).
     */
    public function getPlainContentForSpeech(?string $locale = null): string
    {
        $raw = $this->getContent($locale);
        // Replace block tags with period and space to ensure TTS pauses between paragraphs and headings
        $withBreaks = preg_replace('/<\/(h[1-6]|p|li|div|blockquote)>/i', ". ", $raw);
        $clean = strip_tags($withBreaks);
        // Decode html entities
        $decoded = html_entity_decode($clean, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // Consolidate whitespaces and multiple periods
        $normalized = preg_replace('/\s+/', ' ', $decoded);
        return trim(preg_replace('/\.(\s*\.)+/', '.', $normalized));
    }

    /**
     * Get the featured image URL.
     */
    public function getFeaturedImageUrlAttribute(): string
    {
        if (empty($this->featured_image)) {
            return asset('icons/icon-512.png');
        }

        if (str_starts_with($this->featured_image, 'http://') || str_starts_with($this->featured_image, 'https://')) {
            return $this->featured_image;
        }

        return Storage::url($this->featured_image);
    }
}
