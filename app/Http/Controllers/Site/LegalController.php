<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class LegalController extends Controller
{
    public function privacy(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('pages.legal.privacy');
    }

    public function impressum(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('pages.legal.impressum');
    }
}
