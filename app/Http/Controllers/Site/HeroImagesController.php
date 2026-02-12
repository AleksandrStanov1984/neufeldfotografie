<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;

class HeroImagesController extends Controller
{
    public function index(): JsonResponse
    {
        $base = public_path('assets/hero');

        $left = $this->scan($base . DIRECTORY_SEPARATOR . 'left');
        $right = $this->scan($base . DIRECTORY_SEPARATOR . 'right');

        return response()->json([
            'left' => $left,
            'right' => $right,
            'fallback' => '/assets/images/fallback.png',
        ]);
    }

    private function scan(string $dir): array
    {
        if (!File::exists($dir) || !File::isDirectory($dir)) {
            return [];
        }

        $files = collect(File::files($dir))
            ->filter(fn($f) => in_array(strtolower($f->getExtension()), ['jpg','jpeg','png','webp']))
            ->sortBy(fn($f) => $f->getFilename())
            ->map(fn($f) => '/assets/hero/' . basename($dir) . '/' . $f->getFilename())
            ->values()
            ->all();

        return $files;
    }
}
