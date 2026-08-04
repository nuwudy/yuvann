<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MediaItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'type',
        'mime_type',
        'size',
    ];

    /**
     * Get the public URL for the media file.
     */
    public function getUrlAttribute(): string
    {
        if (str_starts_with($this->path, 'http://') || str_starts_with($this->path, 'https://')) {
            return $this->path;
        }
        return Storage::url($this->path);
    }

    /**
     * Get the file size as a human-readable string.
     */
    public function getFormattedSizeAttribute(): string
    {
        if ($this->size >= 1_048_576) {
            return round($this->size / 1_048_576, 1) . ' MB';
        }
        if ($this->size >= 1_024) {
            return round($this->size / 1_024) . ' KB';
        }
        return $this->size . ' B';
    }
}
