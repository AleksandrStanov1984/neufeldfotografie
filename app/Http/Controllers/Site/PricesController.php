<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

use App\Support\Images;

class PricesController extends Controller
{
    public function index()
    {
        $fallback = asset('assets/images/fallback.png');

        // hero images
        $dir = 'assets/components/sections/price/sections/price/main';
        $images = Images::list($dir);

        return view('pages.prices', [
            'seoKey' => 'prices',

            'pricesHeroImages' => $images,
            'pricesHeroFirst' => $images[0] ?? $fallback,
            'pricesHeroFallback' => $fallback,
            'pricesHeroInterval' => 5000,
        ]);
    }
}
