<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $locales = collect(File::directories(lang_path()))
            ->map(fn ($p) => basename($p))
            ->values()
            ->toArray();

        // Только GET страницы (без contact.send и без _assets)
        $routes = [
            'home' => ['changefreq' => 'weekly', 'priority' => '1.0'],
            'about' => ['changefreq' => 'monthly', 'priority' => '0.8'],
            'gallery' => ['changefreq' => 'weekly', 'priority' => '0.9'],
            'contact' => ['changefreq' => 'monthly', 'priority' => '0.7'],
            'babybauch' => ['changefreq' => 'monthly', 'priority' => '0.8'],
            'cake_smash' => ['changefreq' => 'monthly', 'priority' => '0.8'],
            'price' => ['changefreq' => 'monthly', 'priority' => '0.8'],
            'datenschutz' => ['changefreq' => 'yearly', 'priority' => '0.3'],
            'impressum' => ['changefreq' => 'yearly', 'priority' => '0.3'],
            'agb' => ['changefreq' => 'yearly', 'priority' => '0.3'],
        ];

        $urls = [];
        $today = now()->toDateString();

        foreach ($locales as $locale) {
            foreach ($routes as $name => $meta) {
                $loc = route($name);
                $loc = $this->withLang($loc, $locale);

                $urls[] = [
                    'loc' => $loc,
                    'lastmod' => $today,
                    'changefreq' => $meta['changefreq'],
                    'priority' => $meta['priority'],
                ];
            }
        }

        return response()
            ->view('sitemap.index', compact('urls'))
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    private function withLang(string $url, string $locale): string
    {
        // Если вдруг url уже с query — аккуратно добавляем
        $sep = str_contains($url, '?') ? '&' : '?';
        return $url . $sep . 'lang=' . urlencode($locale);
    }
}
