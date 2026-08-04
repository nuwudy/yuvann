<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;

class ImageService
{
    /**
     * Target dimensions for product images (square crop).
     */
    private const WIDTH  = 800;
    private const HEIGHT = 800;

    /**
     * WebP quality (0–100). 85 is crisp yet well-compressed.
     */
    private const QUALITY = 85;

    /**
     * Process and save a product image as WebP.
     *
     * Accepts any browser-uploadable image (JPEG, PNG, GIF, BMP, WEBP, AVIF).
     * Resizes to 800×800 (cover crop) and encodes as WebP at quality 85.
     *
     * @param  \Illuminate\Http\UploadedFile  $file        The uploaded file
     * @param  string                         $directory   Storage sub-path (e.g. 'products')
     * @return string                                      The stored file path relative to disk root
     */
    public function storeAsWebP(UploadedFile $file, string $directory = 'products'): string
    {
        try {
            $manager = $this->makeManager();

            // Read and process
            $image = $manager->read($file->getRealPath());
            $image->cover(self::WIDTH, self::HEIGHT);

            // Encode to WebP
            $encoded = $image->toWebp(self::QUALITY);

            // Build a unique filename
            $filename = Str::uuid() . '.webp';
            $path     = $directory . '/' . $filename;

            // Save to the public disk
            Storage::disk('public')->put($path, (string) $encoded);

            return $path;
        } catch (\Throwable $e) {
            // Fallback: if Image processing fails (e.g. no WebP support or unreadable image),
            // just store the original file directly.
            return $file->store($directory, 'public');
        }
    }

    /**
     * Build an ImageManager using the best available driver.
     * GD is preferred; falls back to Imagick if available.
     * Throws a clear error if neither is available.
     */
    private function makeManager(): ImageManager
    {
        if (extension_loaded('gd')) {
            return new ImageManager(new GdDriver());
        }

        if (extension_loaded('imagick')) {
            return new ImageManager(new ImagickDriver());
        }

        throw new \RuntimeException(
            'No image processing extension found. ' .
            'Please enable the GD or Imagick PHP extension on your server.'
        );
    }
}
