<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use App\Support\SectionPaths;

class FooterComposer
{
    public function compose(View $view): void
    {
        // === FOOTER IMAGES ===
        $footerRelDir = SectionPaths::group('footer', 'dir');
        $footerAbsDir = public_path($footerRelDir);

        $images = [];

        if (File::exists($footerAbsDir) && File::isDirectory($footerAbsDir)) {
            $images = collect(File::files($footerAbsDir))
                ->filter(fn($file) =>
                    in_array(strtolower($file->getExtension()), ['jpg','jpeg','png','webp'], true)
                )
                ->sortBy(fn($file) => strtolower($file->getFilename()))
                ->map(fn($file) =>
                    asset(trim($footerRelDir, '/') . '/' . rawurlencode($file->getFilename()))
                )
                ->values()
                ->toArray();
        }

        // === SOCIAL LINKS ===
        $socials = [];
        $socialRelPath = SectionPaths::group('footer', 'social_json');
        $socialAbsPath = public_path($socialRelPath);

        if (File::exists($socialAbsPath)) {
            $socials = json_decode(File::get($socialAbsPath), true) ?? [];
        }

        // normalize icon urls
        $iconsDir = trim(config('site_sections.ui.icons_dir', 'assets/icons'), '/');

        $socials = collect($socials)
            ->map(function ($item) use ($iconsDir) {
                $icon = $item['icon'] ?? null;

                $item['icon_url'] = $icon
                    ? asset($iconsDir . '/' . basename($icon))
                    : null;

                return $item;
            })
            ->values()
            ->toArray();

        $view->with([
            'footerImages'      => $images,
            'footerSocials'     => $socials,
            'footerHasCarousel' => count($images) > 7,
        ]);
    }
}
