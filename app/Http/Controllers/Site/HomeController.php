<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

use App\Support\Images;

class HomeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        $chapterDir = 'assets/components/sections/chapters';
        $chapterImages = Images::list($chapterDir);

        $homeAboutDir = 'assets/components/sections/about';
        $homeAboutImages = Images::list($homeAboutDir);

        $storiesDir = 'assets/components/sections/stories';
        $storiesImages = Images::list($storiesDir);
        $fallback = asset('assets/images/fallback.png');

        return view('pages.home', [
            'leftImages'  => Images::list('assets/hero/left'),
            'rightImages' => Images::list('assets/hero/right'),

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
