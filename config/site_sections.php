<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Global fallback assets
    |--------------------------------------------------------------------------
    */
    'fallback' => 'assets/images/fallback.png',

    /*
    |--------------------------------------------------------------------------
    | Locales (used by SetLocale middleware, Seo::hreflangs(), Sitemap, etc.)
    |--------------------------------------------------------------------------
    */
    'locales' => [
        'available'   => ['de', 'en', 'ru'],
        'fallback'    => 'de',
        'query_key'   => 'lang',
        'session_key' => 'locale',
    ],

    /*
    |--------------------------------------------------------------------------
    | SEO helper config
    |--------------------------------------------------------------------------
    */
    'seo' => [
        'og_fallback' => '/assets/og/default.jpg',
        'og_locales_map' => [
            'de' => 'de_DE',
            'en' => 'en_US',
            'ru' => 'ru_RU',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Pages → Sections directories (public-relative)
    |--------------------------------------------------------------------------
    | Used by SectionPaths::dir($page, $section) and then Images::list($dir).
    | Keep them public-relative (without leading slash).
    */
    'pages' => [

        'home' => [
            'hero_left'  => 'assets/hero/left',
            'hero_right' => 'assets/hero/right',

            // chapters images for HOME/PREIS page live here now
            'chapters' => 'assets/components/sections/chapters/home',

            'about'    => 'assets/components/sections/about',
            'stories'  => 'assets/components/sections/stories',
        ],

        'newborn' => [
            'hero'    => 'assets/components/sections/newborn/hero',
            'reasons' => 'assets/components/sections/newborn/reasons',
            'gallery' => 'assets/components/sections/newborn/gallery',
        ],

        'cake-smash' => [
            'hero'    => 'assets/components/sections/cake-smash/hero',
            'reasons' => 'assets/components/sections/cake-smash/reasons',
            'gallery' => 'assets/components/sections/cake-smash/gallery',
        ],

        'babybauch' => [
            'hero'    => 'assets/components/sections/babybauch/hero',
            'reasons' => 'assets/components/sections/babybauch/reasons',
            'gallery' => 'assets/components/sections/babybauch/gallery',
        ],

        'about' => [
            'welcome'       => 'assets/about/components/sections/welcome',
            'philosophy_bg' => 'assets/about/backgraund/first',
        ],

        'contact' => [
            'hero'        => 'assets/components/sections/contact/sections/contact',
            'social_json' => 'assets/social-links.json',
        ],

        'prices' => [
            'hero' => 'assets/components/sections/price/sections/price/main',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Groups (non-page or shared assets)
    |--------------------------------------------------------------------------
    | Used by SectionPaths::group($group, $key) etc.
    */
    'groups' => [

        'hero_api' => [
            'left'  => 'assets/hero/left',
            'right' => 'assets/hero/right',
        ],

        'footer' => [
            'dir'         => 'assets/footer',
            'social_json' => 'assets/social-links.json',
        ],

        /*
         * contact-cta rotator images depend on current page/route
         * - home + prices  -> chapters/home
         * - babybauch      -> chapters/babybauch
         * - cake-smash     -> chapters/cake-smash
         * - newborn        -> chapters/newborn
         */
        'home_contact_cta' => [
            'default' => 'assets/components/sections/chapters/home',

            // by "page key" (we will map route names to these keys)
            'by_page' => [
                'home'      => 'assets/components/sections/chapters/home',
                'prices'    => 'assets/components/sections/chapters/home',
                'babybauch' => 'assets/components/sections/chapters/babybauch',
                'cake-smash'=> 'assets/components/sections/chapters/cake-smash',
                'newborn'   => 'assets/components/sections/chapters/newborn',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Gallery page config
    |--------------------------------------------------------------------------
    */
    'allowed_gallery_slugs' => ['newborn', 'cake-smash', 'babybauch'],

    'gallery_map' => [
        'newborn' => [
            'tPrefix' => 'pages/gallery',
            'key'     => 'newborn',
        ],
        'cake-smash' => [
            'tPrefix' => 'pages/gallery',
            'key'     => 'cake_smash',
        ],
        'babybauch' => [
            'tPrefix' => 'pages/gallery',
            'key'     => 'babybauch',
        ],
    ],

    'ui' => [
        'icons_dir' => 'assets/icons',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sitemap config
    |--------------------------------------------------------------------------
    */
    'sitemap' => [
        'routes' => [
            ['type' => 'route',   'name' => 'home',        'changefreq' => 'weekly',  'priority' => '1.0'],
            ['type' => 'route',   'name' => 'about',       'changefreq' => 'monthly', 'priority' => '0.8'],

            ['type' => 'gallery', 'name' => 'gallery.show','changefreq' => 'weekly',  'priority' => '0.9'],

            ['type' => 'route',   'name' => 'contact',     'changefreq' => 'monthly', 'priority' => '0.7'],
            ['type' => 'route',   'name' => 'babybauch',   'changefreq' => 'monthly', 'priority' => '0.8'],
            ['type' => 'route',   'name' => 'cake_smash',  'changefreq' => 'monthly', 'priority' => '0.8'],
            ['type' => 'route',   'name' => 'prices',      'changefreq' => 'monthly', 'priority' => '0.8'],

            ['type' => 'route',   'name' => 'datenschutz', 'changefreq' => 'yearly',  'priority' => '0.3'],
            ['type' => 'route',   'name' => 'impressum',   'changefreq' => 'yearly',  'priority' => '0.3'],
            ['type' => 'route',   'name' => 'agb',         'changefreq' => 'yearly',  'priority' => '0.3'],
        ],
    ],

];
