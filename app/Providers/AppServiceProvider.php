<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

use App\View\Composers\FooterComposer;

use App\Support\Images;
use App\Support\SectionPaths;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('partials.footer', FooterComposer::class);

        View::composer('sections.home.contact-cta', function ($view) {
            $fallback = SectionPaths::fallbackUrl();

            // определяем "ключ страницы" по имени маршрута
            $routeName = Route::currentRouteName(); // home, newborn, babybauch, cake_smash, prices, ...
            $pageKey = match ($routeName) {
                'home'      => 'home',
                'prices'    => 'prices',
                'babybauch' => 'babybauch',
                'cake_smash'=> 'cake-smash',
                'newborn'   => 'newborn',
                default     => 'home',
            };

            $map = config('site_sections.groups.home_contact_cta.by_page', []);
            $defaultDir = config('site_sections.groups.home_contact_cta.default');
            $dir = $map[$pageKey] ?? $defaultDir;
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
