<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;
use App\Support\SectionPaths;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class HomeController extends Controller
{
    public function index(): View|Factory
    {
        $fallback = SectionPaths::fallbackUrl();

        // HERO (left/right)
        $leftImages = Images::list(SectionPaths::dir('home', 'hero_left'));
        $rightImages = Images::list(SectionPaths::dir('home', 'hero_right'));

        // HOME CHAPTERS
        $chapterImages = Images::list(SectionPaths::dir('home', 'chapters'));

        // HOME ABOUT
        $homeAboutImages = Images::list(SectionPaths::dir('home', 'about'));

        // STORIES / CTA
        $storiesImages = Images::list(SectionPaths::dir('home', 'stories'));

        return view('pages.home', [
            'seoKey' => 'home',

            'leftImages'  => $leftImages,
            'rightImages' => $rightImages,

            // HOME CHAPTER
            'chapterImages'   => $chapterImages,
            'chapterFirst'    => $chapterImages[0] ?? $fallback,
            'chapterFallback' => $fallback,
            'chapterInterval' => 5000,

            // HOME ABOUT
            'homeAboutImages'   => $homeAboutImages,
            'homeAboutFirst'    => $homeAboutImages[0] ?? $fallback,
            'homeAboutFallback' => $fallback,
            'homeAboutInterval' => 5000,

            // CTA (stories)
            'storiesImages' => $storiesImages,
            'story1' => $storiesImages[0] ?? $fallback,
            'story2' => $storiesImages[1] ?? $fallback,
            'story3' => $storiesImages[2] ?? $fallback,
            'ctaInterval' => 5000,

            'storiesLinks' => [
                route('newborn'),
                route('babybauch'),
                route('cake_smash'),
            ],
        ]);
    }
}
