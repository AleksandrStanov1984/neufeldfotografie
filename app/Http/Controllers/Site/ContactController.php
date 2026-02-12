<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

use App\Support\Images;

class ContactController extends Controller
{
    public function index()
    {
        $fallback = asset('assets/images/fallback.png');

        // hero images (как уже делали)
        $dir = 'assets/components/sections/contact/sections/contact';
        $images = Images::list($dir);

        // social links JSON
        $socialLinksPath = public_path('assets/social-links.json');
        $socialLinks = [];

        if (File::exists($socialLinksPath)) {
            $json = File::get($socialLinksPath);
            $decoded = json_decode($json, true);

            if (is_array($decoded)) {
                // нормализуем иконки -> полный url
                $socialLinks = collect($decoded)->map(function ($item) {
                    $label = $item['label'] ?? '';
                    $url   = $item['url'] ?? '#';
                    $icon  = $item['icon'] ?? null;

                    $iconUrl = $icon ? asset('assets/icons/' . rawurlencode($icon)) : null;

                    return [
                        'label' => $label,
                        'url'   => $url,
                        'icon'  => $iconUrl,
                    ];
                })->all();
            }
        }

        return view('pages.contact', [
            'seoKey' => 'contact',

            'contactHeroImages' => $images,
            'contactHeroFirst' => $images[0] ?? $fallback,
            'contactHeroFallback' => $fallback,
            'contactHeroInterval' => 5000,

            'socialLinks' => $socialLinks,
        ]);
    }
}
