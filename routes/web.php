<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\GalleryController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\LegalController;
use App\Http\Controllers\Site\HeroImagesController;
use App\Http\Controllers\Site\PricesController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/babybauch', fn() => view('pages.babybauch'))->name('babybauch');
Route::get('/cake-smash', fn() => view('pages.cake_smash'))->name('cake_smash');

Route::get('/price', [PricesController::class, 'index'])->name('price');

Route::get('/newborn', [\App\Http\Controllers\Site\NewbornController::class, 'index'])
    ->name('newborn');


Route::get('/author', fn () => view('pages.author'))->name('author');

Route::view('/datenschutz', 'pages.legal.datenschutz')->name('datenschutz');
Route::view('/impressum', 'pages.legal.impressum')->name('impressum');
Route::view('/agb', 'pages.legal.agb')->name('agb');

Route::get('/_assets/hero-images', [HeroImagesController::class, 'index'])->name('assets.hero-images');

Route::get('/lang/{locale}', function (string $locale) {

    $available = collect(File::directories(lang_path()))
        ->map(fn ($p) => basename($p))
        ->toArray();

    abort_unless(in_array($locale, $available, true), 404);

    session(['locale' => $locale]);

    return redirect()->back();
})->name('locale.switch');

/* Route::get('/sitemap.xml', [\App\Http\Controllers\Site\SitemapController::class, 'index'])
    ->name('sitemap'); */





