<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Support\Images;
use App\Support\SectionPaths;

class GalleryPageController extends Controller
{
    public function show(string $slug)
    {
        $allowed = config('site_sections.allowed_gallery_slugs', []);
        abort_unless(in_array($slug, $allowed, true), 404);

        $map = config('site_sections.gallery_map', []);
        abort_unless(isset($map[$slug]), 404);

        $fallback = SectionPaths::fallbackUrl();

        // HERO / GALLERY from page slug
        $heroImages = Images::list(
            SectionPaths::dir($slug, 'hero')
        );

        $galleryImages = Images::list(
            SectionPaths::dir($slug, 'gallery')
        );

        $heroImage = $heroImages[0] ?? null;

        // SEO key for gallery pages
        $seoKey = 'gallery_' . $map[$slug]['key'];

        return view('pages.gallery', [
            'slug'          => $slug,
            'seoKey'        => $seoKey,
            'tPrefix'       => $map[$slug]['tPrefix'],
            'galleryKey'    => $map[$slug]['key'], // newborn|cake_smash|babybauch

            'heroImage'     => $heroImage,
            'galleryImages' => $galleryImages,

            'fallback'      => $fallback,
        ]);
    }
}
