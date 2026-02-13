<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\SectionPaths;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;

class HeroImagesController extends Controller
{
    public function index(): JsonResponse
    {
        $leftRel  = SectionPaths::group('hero_api', 'left');   // assets/hero/left
        $rightRel = SectionPaths::group('hero_api', 'right');  // assets/hero/right

        $left  = $this->scan(SectionPaths::publicDirPath($leftRel), $leftRel);
        $right = $this->scan(SectionPaths::publicDirPath($rightRel), $rightRel);

        return response()->json([
            'left'     => $left,
            'right'    => $right,
            'fallback' => asset(config('site_sections.fallback')),
        ]);
    }

    /**
     * @param string $absDir абсолютный путь (public_path)
     * @param string $relDir public-relative (для asset)
     */
    private function scan(string $absDir, string $relDir): array
    {
        if (!File::exists($absDir) || !File::isDirectory($absDir)) {
            return [];
        }

        $relDir = trim(str_replace('\\', '/', $relDir), '/');

        return collect(File::files($absDir))
            ->filter(fn($f) => in_array(strtolower($f->getExtension()), ['jpg','jpeg','png','webp'], true))
            ->sortBy(fn($f) => $f->getFilename())
            ->map(fn($f) => asset($relDir . '/' . $f->getFilename()))
            ->values()
            ->all();
    }
}
