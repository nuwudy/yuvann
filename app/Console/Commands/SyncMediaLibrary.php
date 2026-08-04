<?php

namespace App\Console\Commands;

use App\Models\MediaItem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SyncMediaLibrary extends Command
{
    protected $signature = 'media:sync';
    protected $description = 'Syncs all existing product images and videos into the Media Library database';

    public function handle()
    {
        $this->info('Starting media sync...');

        $directories = [
            'products',
            'products/videos',
            'media',
            'media/videos'
        ];

        $addedCount = 0;

        foreach ($directories as $dir) {
            $files = Storage::disk('public')->files($dir);
            
            foreach ($files as $path) {
                // Skip if already in DB
                if (MediaItem::where('path', $path)->exists()) {
                    continue;
                }

                $mime = Storage::disk('public')->mimeType($path);
                $size = Storage::disk('public')->size($path);
                $isImage = str_starts_with($mime, 'image/');
                
                $baseName = pathinfo($path, PATHINFO_FILENAME);

                MediaItem::create([
                    'name'      => $baseName,
                    'path'      => $path,
                    'type'      => $isImage ? 'image' : 'video',
                    'mime_type' => $mime,
                    'size'      => $size,
                ]);

                $this->line("Added: " . $path);
                $addedCount++;
            }
        }

        $this->info("Sync complete! Added {$addedCount} new files to the Media Library.");
    }
}
