<?php

namespace App\Support;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class Images
{
    /**
     * List images from /public/$dir.
     * Returns array of asset() URLs.
     */
    public static function list(
        string $dir,
        array $extensions = ['jpg', 'jpeg', 'png', 'webp'],
        int $cacheSeconds = 3600
    ): array
    {
        $dir = trim(str_replace('\\', '/', $dir), '/');
        $abs = public_path($dir);

        if (!File::exists($abs) || !File::isDirectory($abs)) {
            return [];
        }

        $cacheKey = 'images:' . md5($dir);

        return Cache::remember($cacheKey, $cacheSeconds, function () use ($abs, $dir, $extensions) {

            return collect(File::files($abs))
                ->filter(function ($file) use ($extensions) {
                    $ext = strtolower($file->getExtension());
                    return in_array($ext, $extensions, true);
                })
                ->sortBy(fn($file) => strtolower($file->getFilename()))
                ->map(function ($file) use ($dir) {
                    $filename = $file->getFilename();

                    // rawurlencode только имя файла, не весь путь
                    return asset($dir . '/' . rawurlencode($filename));
                })
                ->values()
                ->all();
        });
    }

    /**
     * Clear cache for specific directory.
     */
    public static function clearCache(string $dir): void
    {
        $dir = trim(str_replace('\\', '/', $dir), '/');
        Cache::forget('images:' . md5($dir));
    }
}
