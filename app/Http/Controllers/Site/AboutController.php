<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

use App\Support\Images;

class AboutController extends Controller
{
    public function index()
    {
        $dir = 'assets/about/components/sections/welcome';
        $images = Images::list($dir);

        $fallback = asset('assets/images/fallback.png');

        $philosophyBgDir = 'assets/about/backgraund/first';
        $philosophyBgImages = Images::list($philosophyBgDir);

        return view('pages.about', [
            'seoKey' => 'about',

            // welcome
            'welcomeImages'   => $images,
            'welcomeFirst'    => $images[0] ?? $fallback,
            'welcomeFallback' => $fallback,
            'welcomeInterval' => 5000,

            // philosophy background
            'philosophyBgImages'   => $philosophyBgImages,
            'philosophyBgFirst'    => $philosophyBgImages[0] ?? $fallback,
            'philosophyBgFallback' => $fallback,
        ]);
    }
}
