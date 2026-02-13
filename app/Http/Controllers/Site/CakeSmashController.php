<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;

class CakeSmashController extends Controller
{
    public function index()
    {
        $fallback = asset('assets/images/fallback.png');

        $heroDir = 'assets/components/sections/cake-smash/hero';
        $heroImages = Images::list($heroDir);

        $reasonsDir = 'assets/components/sections/cake-smash/reasons';
        $reasonsImages = Images::list($reasonsDir);

        $galleryDir = 'assets/components/sections/cake-smash/gallery';
        $galleryImages = Images::list($galleryDir);

        return view('pages.cake_smash', [
            'seoKey' => 'cake_smash',

            'cakeSmashHeroImages'   => $heroImages,
            'cakeSmashHeroFirst'    => $heroImages[0] ?? $fallback,
            'cakeSmashHeroFallback' => $fallback,
            'cakeSmashHeroInterval' => 5000,

            'cakeSmashReasonsImages'   => $reasonsImages,
            'cakeSmashReasonsFirst'    => $reasonsImages[0] ?? $fallback,
            'cakeSmashReasonsFallback' => $fallback,

            'cakeSmashGalleryImages'   => $galleryImages,
            'cakeSmashGalleryFallback' => $fallback,
        ]);
    }
}
