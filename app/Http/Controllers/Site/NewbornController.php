<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;

class NewbornController extends Controller
{
    public function index()
    {
        $fallback = asset('assets/images/fallback.png');

        // HERO
        $heroDir = 'assets/components/sections/newborn/hero';
        $heroImages = Images::list($heroDir);

        // REASONS
        $reasonsDir = 'assets/components/sections/newborn/reasons';
        $reasonsImages = Images::list($reasonsDir);

        $galleryDir = 'assets/components/sections/newborn/gallery';
        $galleryImages = Images::list($galleryDir);

        return view('pages.newborn', [
            'seoKey' => 'newborn',

            // hero
            'newbornHeroImages'   => $heroImages,
            'newbornHeroFirst'    => $heroImages[0] ?? $fallback,
            'newbornHeroFallback' => $fallback,
            'newbornHeroInterval' => 5000,

            // reasons
            'newbornReasonsImages'   => $reasonsImages,
            'newbornReasonsFirst'    => $reasonsImages[0] ?? $fallback,
            'newbornReasonsFallback' => $fallback,
            'newbornReasonsInterval' => 5000,

            'newbornGalleryImages'   => $galleryImages,
            'newbornGalleryFirst'    => $reasonsImages[0] ?? $fallback,
            'newbornGalleryFallback' => $fallback,
            'newbornReasonsInterval' => 5000,
        ]);
    }
}
