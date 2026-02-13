<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class LegalController extends Controller
{
    public function privacy(): View|Factory
    {
        return view('pages.legal.privacy', [
            'seoKey' => 'privacy',
        ]);
    }

    public function impressum(): View|Factory
    {
        return view('pages.legal.impressum', [
            'seoKey' => 'impressum',
        ]);
    }
}
