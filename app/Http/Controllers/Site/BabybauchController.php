<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;

class BabybauchController extends Controller
{
    public function index()
    {
        $fallback = asset('assets/images/fallback.png');

        $heroDir = 'assets/components/sections/babybauch/hero';
        $heroImages = Images::list($heroDir);

        $reasonsDir = 'assets/components/sections/babybauch/reasons';
        $reasonsImages = Images::list($reasonsDir);

        $galleryDir = 'assets/components/sections/babybauch/gallery';
        $galleryImages = Images::list($galleryDir);

        return view('pages.babybauch', [
            'seoKey' => 'babybauch',

            'babybauchHeroImages'   => $heroImages,
            'babybauchHeroFirst'    => $heroImages[0] ?? $fallback,
            'babybauchHeroFallback' => $fallback,
            'babybauchHeroInterval' => 5000,

            'babybauchReasonsImages'   => $reasonsImages,
            'babybauchReasonsFirst'    => $reasonsImages[0] ?? $fallback,
            'babybauchReasonsFallback' => $fallback,

            'babybauchGalleryImages'   => $galleryImages,
            'babybauchGalleryFallback' => $fallback,
        ]);
    }
}
