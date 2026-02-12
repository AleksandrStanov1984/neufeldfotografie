<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use App\Support\Images;

class NewbornController extends Controller
{
    public function index()
    {
        $fallback = asset('assets/images/fallback.png');

        $dir = 'assets/components/sections/newborn/hero';
        $images = Images::list($dir);

        return view('pages.newborn', [
            'seoKey' => 'newborn',

            'newbornHeroImages'   => $images,
            'newbornHeroFirst'    => $images[0] ?? $fallback,
            'newbornHeroFallback' => $fallback,
            'newbornHeroInterval' => 5000,
        ]);
    }

}
