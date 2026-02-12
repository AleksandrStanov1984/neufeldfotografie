<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class FooterComposer
{
    public function compose(View $view): void
    {
        // Фото футера
        $footerPath = public_path('assets/footer');
        $images = [];

        if (File::exists($footerPath)) {
            $images = collect(File::files($footerPath))
                ->filter(fn($file) => in_array($file->getExtension(), ['jpg','jpeg','png','webp']))
                ->map(fn($file) => asset('assets/footer/'.$file->getFilename()))
                ->values()
                ->toArray();
        }

        // Соцсети
        $socials = [];
        $socialJson = public_path('assets/social-links.json');

        if (File::exists($socialJson)) {
            $socials = json_decode(file_get_contents($socialJson), true) ?? [];
        }

        $view->with([
            'footerImages' => $images,
            'footerSocials' => $socials,
            'footerHasCarousel' => count($images) > 7,
        ]);
    }
}
