<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\View\Composers\FooterComposer;

use App\Support\Images;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('partials.footer', FooterComposer::class);

        View::composer('sections.home.contact-cta', function ($view) {
            $fallback = asset('assets/images/fallback.png');

            $dir = 'assets/components/sections/chapters';
            $chapterImages = Images::list($dir);

            $view->with([
               'chapterImages'   => $chapterImages,
               'chapterFirst'    => $chapterImages[0] ?? $fallback,
               'chapterFallback' => $fallback,
               'chapterInterval' => 5000,
            ]);
        });
    }
}
