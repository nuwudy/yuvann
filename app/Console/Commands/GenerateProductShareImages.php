<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;

class GenerateProductShareImages extends Command
{
    protected $signature = 'products:generate-share-images';
    protected $description = 'Generate companion JPEG share images for products to support WhatsApp and Facebook link previews';

    public function handle(): int
    {
        $products = Product::whereNotNull('featured_image')->get();
        $this->info("Checking share images for {$products->count()} products...");

        $driver = extension_loaded('gd') 
            ? new GdDriver() 
            : (extension_loaded('imagick') ? new ImagickDriver() : null);

        if (!$driver) {
            $this->error('Neither GD nor Imagick extension is available.');
            return self::FAILURE;
        }

        $manager = new ImageManager($driver);
        $count = 0;

        foreach ($products as $product) {
            $featured = $product->featured_image;
            if (empty($featured)) continue;

            $isRemote = str_starts_with($featured, 'http://') || str_starts_with($featured, 'https://');
            $companionJpg = !$isRemote ? preg_replace('/\.webp$/i', '.jpg', $featured) : null;
            $cacheRelPath = 'products/share-cache/' . $product->id . '.jpg';

            if (($isRemote || ($companionJpg && Storage::disk('public')->exists($companionJpg))) && Storage::disk('public')->exists($cacheRelPath)) {
                $this->line("Product #{$product->id} ({$product->name}) share image already exists.");
                continue;
            }

            try {
                if ($isRemote) {
                    $url = $featured;
                    if (str_contains($url, 'images.unsplash.com')) {
                        $url = preg_replace('/(\?|&)auto=format/', '$1fm=jpg', $url);
                        if (!str_contains($url, 'fm=jpg')) {
                            $url .= (str_contains($url, '?') ? '&' : '?') . 'fm=jpg';
                        }
                    }

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
                    $binary = curl_exec($ch);
                    curl_close($ch);

                    if (!$binary) {
                        $this->warn("Product #{$product->id} remote image could not be fetched: {$url}");
                        continue;
                    }
                    $image = $manager->read($binary);
                } else {
                    $localPath = Storage::disk('public')->path($featured);
                    if (!file_exists($localPath)) {
                        $this->warn("Product #{$product->id} local image not found: {$localPath}");
                        continue;
                    }
                    $image = $manager->read($localPath);
                }

                $image->cover(800, 800);
                $jpegData = (string) $image->toJpeg(85);

                if (!$isRemote && $companionJpg && $companionJpg !== $featured) {
                    Storage::disk('public')->put($companionJpg, $jpegData);
                }
                Storage::disk('public')->put($cacheRelPath, $jpegData);

                $this->info("Generated JPEG for product #{$product->id} ({$product->name})");
                $count++;
            } catch (\Throwable $e) {
                $this->error("Failed for product #{$product->id}: " . $e->getMessage());
            }
        }

        $this->info("Completed! Generated {$count} share images.");
        return self::SUCCESS;
    }
}
