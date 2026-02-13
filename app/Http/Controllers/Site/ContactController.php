<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;
use App\Support\SectionPaths;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function index()
    {
        $fallback = SectionPaths::fallbackUrl();

        $heroImages = Images::list(
            SectionPaths::dir('contact', 'hero')
        );

        // SOCIAL LINKS (JSON)
        $socialLinks = [];
        $socialRelPath = config('site_sections.pages.contact.social_json');
        $socialAbsPath = public_path($socialRelPath);

        if (File::exists($socialAbsPath)) {
            $socialLinks = json_decode(File::get($socialAbsPath), true) ?? [];
        }

        // ✅ normalize icon urls (same logic as footer)
        $iconsDir = trim(config('site_sections.ui.icons_dir', 'assets/icons'), '/');

        $socialLinks = collect($socialLinks)
            ->map(function ($item) use ($iconsDir) {
                $icon = $item['icon'] ?? null;

                $item['icon_url'] = $icon
                    ? asset($iconsDir . '/' . basename($icon))
                    : null;

                return $item;
            })
            ->values()
            ->all();

        return view('pages.contact', [
            'seoKey' => 'contact',

            'contactHeroImages'   => $heroImages,
            'contactHeroFirst'    => $heroImages[0] ?? $fallback,
            'contactHeroFallback' => $fallback,
            'contactHeroInterval' => 5000,

            'socialLinks' => $socialLinks,
        ]);
    }
}
