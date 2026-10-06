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
     * Process and save an image as WebP.
     *
     * - For products: 800×800 (1:1 square)
     * - For blog: 1200×675 (16:9 landscape)
     *
     * @param  \Illuminate\Http\UploadedFile  $file        The uploaded file
     * @param  string                         $directory   Storage sub-path (e.g. 'products', 'blog')
     * @param  int|null                       $targetWidth Optional custom width
     * @param  int|null                       $targetHeight Optional custom height
     * @return string                                      The stored file path relative to disk root
     */
    public function storeAsWebP(UploadedFile $file, string $directory = 'products', ?int $targetWidth = null, ?int $targetHeight = null): string
    {
        try {
            $manager = $this->makeManager();

            $w = $targetWidth ?? ($directory === 'blog' ? 1200 : self::WIDTH);
            $h = $targetHeight ?? ($directory === 'blog' ? 675 : self::HEIGHT);

            // Read and process
            $image = $manager->read($file->getRealPath());
            $image->cover($w, $h);

            // Encode to WebP
            $encoded = $image->toWebp(self::QUALITY);

            // Build a unique filename
            $uuid     = Str::uuid()->toString();
            $filename = $uuid . '.webp';
            $path     = $directory . '/' . $filename;

            // Save WebP to the public disk
            Storage::disk('public')->put($path, (string) $encoded);

            // Also save a companion JPEG for social sharing (WhatsApp/Facebook do not support WebP)
            try {
                $jpgEncoded = $image->toJpeg(self::QUALITY);
                Storage::disk('public')->put($directory . '/' . $uuid . '.jpg', (string) $jpgEncoded);
            } catch (\Throwable $ignored) {
            }

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
