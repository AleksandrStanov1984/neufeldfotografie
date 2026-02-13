<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;
use App\Support\SectionPaths;

class NewbornController extends Controller
{
    public function index()
    {
        $fallback = SectionPaths::fallbackUrl();

        // HERO
        $heroImages = Images::list(
            SectionPaths::dir('newborn', 'hero')
        );

        // REASONS
        $reasonsImages = Images::list(
            SectionPaths::dir('newborn', 'reasons')
        );

        // GALLERY
        $galleryImages = Images::list(
            SectionPaths::dir('newborn', 'gallery')
        );

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

            // gallery
            'newbornGalleryImages'   => $galleryImages,
            'newbornGalleryFirst'    => $galleryImages[0] ?? $fallback,
            'newbornGalleryFallback' => $fallback,
            'newbornGalleryInterval' => 5000,
        ]);
    }
}
