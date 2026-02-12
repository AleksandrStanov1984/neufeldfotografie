<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use App\Support\Images;

class GalleryController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('pages.gallery');
    }
}
