<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;
use App\Support\SectionPaths;

class CakeSmashController extends Controller
{
    public function index()
    {
        $fallback = SectionPaths::fallbackUrl();

        // HERO
        $heroImages = Images::list(
            SectionPaths::dir('cake-smash', 'hero')
        );

        // REASONS
        $reasonsImages = Images::list(
            SectionPaths::dir('cake-smash', 'reasons')
        );

        // GALLERY
        $galleryImages = Images::list(
            SectionPaths::dir('cake-smash', 'gallery')
        );

        return view('pages.cake_smash', [
            'seoKey' => 'cake_smash',

            // hero
            'cakeSmashHeroImages'   => $heroImages,
            'cakeSmashHeroFirst'    => $heroImages[0] ?? $fallback,
            'cakeSmashHeroFallback' => $fallback,
            'cakeSmashHeroInterval' => 5000,

            // reasons
            'cakeSmashReasonsImages'   => $reasonsImages,
            'cakeSmashReasonsFirst'    => $reasonsImages[0] ?? $fallback,
            'cakeSmashReasonsFallback' => $fallback,

            // gallery
            'cakeSmashGalleryImages'   => $galleryImages,
            'cakeSmashGalleryFallback' => $fallback,
        ]);
    }
}
