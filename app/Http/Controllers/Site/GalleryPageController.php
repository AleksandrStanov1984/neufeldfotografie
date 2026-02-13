<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Support\Images;

class GalleryPageController extends Controller
{
    public function show(string $slug)
    {
        // slug: newborn | cake-smash | babybauch
        $map = [
            'newborn'     => ['tPrefix' => 'pages/gallery', 'key' => 'newborn'],
            'cake-smash'  => ['tPrefix' => 'pages/gallery', 'key' => 'cake_smash'],
            'babybauch'   => ['tPrefix' => 'pages/gallery', 'key' => 'babybauch'],
        ];

        abort_unless(isset($map[$slug]), 404);

        $heroDir    = "assets/components/sections/{$slug}/hero";
        $galleryDir = "assets/components/sections/{$slug}/gallery";

        $heroImages    = Images::list($heroDir);
        $galleryImages = Images::list($galleryDir);

        $heroImage = $heroImages[0] ?? null;

        // SEO key (чтобы мета была разная для каждой галереи)
        $seoKey = "gallery_{$map[$slug]['key']}";

        return view('pages.gallery', [
            'slug'          => $slug,
            'seoKey'        => $seoKey,
            'tPrefix'       => $map[$slug]['tPrefix'],
            'galleryKey'    => $map[$slug]['key'], // newborn|cake_smash|babybauch
            'heroImage'     => $heroImage,
            'galleryImages' => $galleryImages,
        ]);
    }
}
