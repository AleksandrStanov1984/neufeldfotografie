<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;
use App\Support\SectionPaths;

class PricesController extends Controller
{
    public function index()
    {
        $fallback = SectionPaths::fallbackUrl();

        // HERO
        $heroImages = Images::list(
            SectionPaths::dir('prices', 'hero')
        );

        return view('pages.prices', [
            'seoKey' => 'prices',

            'pricesHeroImages'   => $heroImages,
            'pricesHeroFirst'    => $heroImages[0] ?? $fallback,
            'pricesHeroFallback' => $fallback,
            'pricesHeroInterval' => 5000,
        ]);
    }
}
