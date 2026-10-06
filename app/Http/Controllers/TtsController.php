<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TtsController extends Controller
{
    /**
     * Stream native regional TTS audio (Malayalam, Tamil, Hindi, English).
     * Caches generated audio chunks to disk for instant subsequent playback.
     */
    public function stream(Request $request)
    {
        $locale = strtolower($request->query('locale', 'en'));
        $text = trim($request->query('text', ''));

        if (empty($text)) {
            return response()->json(['error' => 'Text parameter is required'], 400);
        }

        // Limit text chunk size to prevent upstream errors (max 200 characters)
        $text = mb_substr($text, 0, 200, 'UTF-8');

        // Supported locales map
        $allowedLocales = [
            'ml' => 'ml',
            'ta' => 'ta',
            'hi' => 'hi',
            'en' => 'en-IN',
        ];

        $targetLang = $allowedLocales[$locale] ?? 'en-IN';

        // Cache directory in storage/app/public/tts_cache
        $cacheDir = storage_path('app/public/tts_cache');
        if (!File::isDirectory($cacheDir)) {
            File::makeDirectory($cacheDir, 0755, true, true);
        }

        $hash = md5($targetLang . '_' . $text);
        $cacheFile = $cacheDir . '/' . $hash . '.mp3';

        if (File::exists($cacheFile) && File::size($cacheFile) > 0) {
            $audioContent = File::get($cacheFile);
            return response($audioContent, 200, [
                'Content-Type' => 'audio/mpeg',
                'Content-Length' => strlen($audioContent),
                'Cache-Control' => 'public, max-age=604800, immutable',
                'X-TTS-Source' => 'cache',
            ]);
        }

        // Fetch from high-quality regional speech engine
        $url = 'https://translate.google.com/translate_tts?ie=UTF-8&client=tw-ob&tl=' . urlencode($targetLang) . '&q=' . urlencode($text);

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36\r\nAccept: */*\r\nReferer: https://translate.google.com/\r\n",
                'timeout' => 5,
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]
        ]);

        $audioContent = @file_get_contents($url, false, $context);

        if ($audioContent !== false && strlen($audioContent) > 100) {
            File::put($cacheFile, $audioContent);

            return response($audioContent, 200, [
                'Content-Type' => 'audio/mpeg',
                'Content-Length' => strlen($audioContent),
                'Cache-Control' => 'public, max-age=604800, immutable',
                'X-TTS-Source' => 'live',
            ]);
        }

        return response()->json(['error' => 'Unable to generate audio stream'], 502);
    }
}
