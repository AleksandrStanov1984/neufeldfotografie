<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;
use App\Support\SectionPaths;

class AboutController extends Controller
{
    public function index()
    {
        $fallback = SectionPaths::fallbackUrl();

        $welcomeImages = Images::list(SectionPaths::dir('about', 'welcome'));
        $philosophyBgImages = Images::list(SectionPaths::dir('about', 'philosophy_bg'));

        return view('pages.about', [
            'seoKey' => 'about',

            // welcome
            'welcomeImages'   => $welcomeImages,
            'welcomeFirst'    => $welcomeImages[0] ?? $fallback,
            'welcomeFallback' => $fallback,
            'welcomeInterval' => 5000,

            // philosophy background
            'philosophyBgImages'   => $philosophyBgImages,
            'philosophyBgFirst'    => $philosophyBgImages[0] ?? $fallback,
            'philosophyBgFallback' => $fallback,
        ]);
    }
}
