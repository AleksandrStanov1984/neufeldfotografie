<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;
use App\Support\SectionPaths;

class BabybauchController extends Controller
{
    public function index()
    {
        $fallback = SectionPaths::fallbackUrl();

        // HERO
        $heroImages = Images::list(
            SectionPaths::dir('babybauch', 'hero')
        );

        // REASONS
        $reasonsImages = Images::list(
            SectionPaths::dir('babybauch', 'reasons')
        );

        // GALLERY
        $galleryImages = Images::list(
            SectionPaths::dir('babybauch', 'gallery')
        );

        return view('pages.babybauch', [
            'seoKey' => 'babybauch',

            // hero
            'babybauchHeroImages'   => $heroImages,
            'babybauchHeroFirst'    => $heroImages[0] ?? $fallback,
            'babybauchHeroFallback' => $fallback,
            'babybauchHeroInterval' => 5000,

            // reasons
            'babybauchReasonsImages'   => $reasonsImages,
            'babybauchReasonsFirst'    => $reasonsImages[0] ?? $fallback,
            'babybauchReasonsFallback' => $fallback,

            // gallery
            'babybauchGalleryImages'   => $galleryImages,
            'babybauchGalleryFallback' => $fallback,
        ]);
    }
}
