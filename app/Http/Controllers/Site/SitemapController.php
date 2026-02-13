<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class SitemapController extends Controller
{
    public function index(): Response
    {
        // locales берём из resources/lang/*
        $locales = collect(File::directories(lang_path()))
            ->map(fn($p) => basename($p))
            ->values()
            ->toArray();

        $routes = config('site_sections.sitemap.routes', []);
        $gallerySlugs = config('site_sections.allowed_gallery_slugs', ['newborn', 'cake-smash', 'babybauch']);

        $urls = [];
        $today = now()->toDateString();

        foreach ($locales as $locale) {
            foreach ($routes as $item) {

                // обычный route
                if (($item['type'] ?? 'route') === 'route') {
                    $loc = route($item['name']);
                    $loc = $this->withLang($loc, $locale);

                    $urls[] = [
                        'loc' => $loc,
                        'lastmod' => $today,
                        'changefreq' => $item['changefreq'] ?? 'monthly',
                        'priority' => $item['priority'] ?? '0.5',
                    ];

                    continue;
                }

                // gallery route with slug
                if (($item['type'] ?? '') === 'gallery') {
                    foreach ($gallerySlugs as $slug) {
                        $loc = route($item['name'], ['slug' => $slug]);
                        $loc = $this->withLang($loc, $locale);

                        $urls[] = [
                            'loc' => $loc,
                            'lastmod' => $today,
                            'changefreq' => $item['changefreq'] ?? 'weekly',
                            'priority' => $item['priority'] ?? '0.9',
                        ];
                    }
                }
            }
        }

        return response()
            ->view('sitemap.index', compact('urls'))
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    private function withLang(string $url, string $locale): string
    {
        $sep = str_contains($url, '?') ? '&' : '?';
        return $url . $sep . 'lang=' . urlencode($locale);
    }
}
