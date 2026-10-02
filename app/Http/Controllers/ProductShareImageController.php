<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;

class ProductShareImageController extends Controller
{
    /**
     * Serve a standard JPEG image for product link sharing on WhatsApp, Facebook, Twitter, etc.
     */
    public function show(string $slug)
    {
        $defaultFallback = public_path('images/yuvann-share.jpg');

        $product = Product::where('slug', $slug)->first();
        if (!$product || empty($product->featured_image)) {
            return response()->file($defaultFallback, [
                'Content-Type' => 'image/jpeg',
                'Cache-Control' => 'public, max-age=604800',
            ]);
        }

        // 1. If companion .jpg file exists on disk
        $jpgPath = preg_replace('/\.webp$/i', '.jpg', $product->featured_image);
        if ($jpgPath !== $product->featured_image && Storage::disk('public')->exists($jpgPath)) {
            return response()->file(Storage::disk('public')->path($jpgPath), [
                'Content-Type' => 'image/jpeg',
                'Cache-Control' => 'public, max-age=604800',
            ]);
        }

        // 2. If cached converted JPEG exists
        $cacheRelPath = 'products/share-cache/' . $product->id . '.jpg';
        if (Storage::disk('public')->exists($cacheRelPath)) {
            return response()->file(Storage::disk('public')->path($cacheRelPath), [
                'Content-Type' => 'image/jpeg',
                'Cache-Control' => 'public, max-age=604800',
            ]);
        }

        // 3. Convert on the fly and cache
        try {
            $featured = $product->featured_image;
            $isRemote = str_starts_with($featured, 'http://') || str_starts_with($featured, 'https://');
            $driver = extension_loaded('gd') 
                ? new GdDriver() 
                : (extension_loaded('imagick') ? new ImagickDriver() : null);

            if ($driver) {
                $manager = new ImageManager($driver);

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

                    if ($binary) {
                        $image = $manager->read($binary);
                    }
                } else {
                    $localPath = Storage::disk('public')->path($featured);
                    if (file_exists($localPath)) {
                        $image = $manager->read($localPath);
                    }
                }

                if (isset($image)) {
                    $image->cover(800, 800);
                    $jpegData = (string) $image->toJpeg(85);

                    Storage::disk('public')->put($cacheRelPath, $jpegData);

                    return response($jpegData, 200, [
                        'Content-Type' => 'image/jpeg',
                        'Cache-Control' => 'public, max-age=604800',
                    ]);
                }
            }
        } catch (\Throwable $e) {
            report($e);
        }

        // 4. Fallback to Yuvann share banner
        return response()->file($defaultFallback, [
            'Content-Type' => 'image/jpeg',
            'Cache-Control' => 'public, max-age=604800',
        ]);
    }
}
