<?php

namespace App\Support;

use Illuminate\Support\Facades\File;

class Images
{
    /**
     * List images from /public/$dir (dir is relative to public).
     * Returns array of asset() urls with rawurlencode() filenames.
     */
    public static function list(string $dir, array $extensions = ['jpg', 'jpeg', 'png', 'webp']): array
    {
        $dir = trim($dir, '/');
        $abs = public_path($dir);

        if (!File::exists($abs) || !File::isDirectory($abs)) {
            return [];
        }

        $files = File::files($abs);

        $images = collect($files)
            ->filter(function ($file) use ($extensions) {
                $ext = strtolower($file->getExtension());
                return in_array($ext, $extensions, true);
            })
            ->sortBy(fn($file) => strtolower($file->getFilename()))
            ->map(function ($file) use ($dir) {
                $filename = $file->getFilename();
                return asset($dir . '/' . rawurlencode($filename));
            })
            ->values()
            ->all();

        return $images;
    }
}
