<?php

return [
    'global' => [
        'site_name' => 'Angelika Neufeld Fotografie',
        'separator' => '–',
        'default_description' => 'Newborn-, Babybauch- und Familienfotografie in Tengen. Natürlich, ruhig und mit viel Gefühl.',
        'robots' => 'index,follow',

        // OG defaults
        'og_type' => 'website',
        'twitter_card' => 'summary_large_image',
        'og_image' => '/assets/og/default.jpg',
    ],

    // =========================
    // MAIN PAGES
    // =========================

    'home' => [
        'title' => 'Newborn-, Babybauch- & Familienfotografie in Tengen',
        'description' => 'Liebevolle Newborn-, Babybauch-, Cake Smash- und Familien-Shootings in Tengen. Natürlich, ruhig und mit viel Gefühl.',
        'robots' => 'index,follow',
        'og_image' => '/assets/og/home.jpg',
    ],

    'about' => [
        'title' => 'Über mich | Angelika Neufeld Fotografie',
        'description' => 'Erfahre mehr über Angelika Neufeld Fotografie – Newborn-, Babybauch- und Familienfotografie in der Region Tengen.',
        'keywords' => 'Fotograf, Newborn, Babybauch, Familienfotografie, Cake Smash, Tengen',
        'robots' => 'index,follow',
        'og_image' => '/assets/og/default.jpg',
    ],

    'gallery' => [
        'title' => 'Galerie | Newborn, Babybauch, Cake Smash & Familie',
        'description' => 'Entdecke ausgewählte Fotos aus Newborn-, Babybauch-, Cake Smash- und Familien-Shootings.',
        'robots' => 'index,follow',
        'og_image' => '/assets/og/default.jpg',
    ],

    'contact' => [
        'title' => 'Kontakt | Angelika Neufeld Fotografie',
        'description' => 'Schreibe mir für eine Shooting-Anfrage. Ich freue mich darauf, deine Geschichte festzuhalten.',
        'robots' => 'index,follow',
        'og_image' => '/assets/og/default.jpg',
    ],

    // =========================
    // SERVICE PAGES
    // =========================

    'prices' => [
        'title' => 'Preise & Pakete | Newborn, Babybauch & Cake Smash',
        'description' => 'Preispakete für Newborn-, Babybauch- und Cake Smash-Shootings inkl. Galerie zur Bildauswahl und professioneller Bearbeitung.',
        'robots' => 'index,follow',
        'og_image' => '/assets/og/default.jpg',
    ],

    'newborn' => [
      'title' => 'Neugeborenenfotograf Tengen | Babyfotograf Schaffhausen | Little Lights',
      'description' => 'Authentische Neugeborenenfotos …',
      'keywords' => 'Neugeborenenfotograf Tengen, Babyfotograf Schaffhausen, ...',
    ],


    'babybauch' => [
        'title' => 'Babybauch-Shooting | Infos & Pakete',
        'description' => 'Babybauch-Shooting in Tengen: natürliche Bilder, ruhige Atmosphäre und liebevolle Begleitung. Infos & Pakete.',
        'robots' => 'index,follow',
        'og_image' => '/assets/og/default.jpg',
    ],

    'cake_smash' => [
        'title' => 'Cake Smash-Shooting | Infos & Pakete',
        'description' => 'Cake Smash-Shooting in Tengen: Deko in Wunschfarbe, natürliche Bilder und schöne Erinnerungen. Infos & Pakete.',
        'robots' => 'index,follow',
        'og_image' => '/assets/og/default.jpg',
    ],

     'gallery_newborn' => [
         'title' => 'Newborn Galerie | Neufeld Fotografie',
         'description' => 'Newborn Galerie – natürliche Babyfotos in Studio-Ästhetik.',
         'keywords' => 'Neugeborenenfotografie, Newborn, Galerie, Rottweil',
     ],

     'gallery_cake_smash' => [
         'title' => 'Cake Smash Galerie | Neufeld Fotografie',
         'description' => 'Cake Smash Galerie – Geburtstagsshooting und Familienmomente.',
         'keywords' => 'Cake Smash, Fotoshooting, Galerie, Rottweil',
     ],

     'gallery_babybauch' => [
         'title' => 'Babybauch Galerie | Neufeld Fotografie',
         'description' => 'Babybauch Galerie – Schwangerschaftsfotos mit eleganter Ästhetik.',
         'keywords' => 'Babybauch, Schwangerschaftsfotografie, Galerie, Rottweil',
     ],

    // =========================
    // LEGAL PAGES (top-level keys)
    // =========================

    'datenschutz' => [
        'title' => 'Datenschutzerklärung | Angelika Neufeld Fotografie',
        'description' => 'Informationen zum Datenschutz und zur Verarbeitung personenbezogener Daten.',
        'robots' => 'noindex,follow',
        'og_image' => '/assets/og/legal.jpg',
    ],

    'impressum' => [
        'title' => 'Impressum | Angelika Neufeld Fotografie',
        'description' => 'Impressum – Angaben gemäß § 5 TMG und rechtliche Hinweise.',
        'robots' => 'noindex,follow',
        'og_image' => '/assets/og/legal.jpg',
    ],

    'agb' => [
        'title' => 'AGB | Angelika Neufeld Fotografie',
        'description' => 'Allgemeine Geschäftsbedingungen für Fotoaufträge und die Lizenzierung von Stock-Fotos.',
        'robots' => 'noindex,follow',
        'og_image' => '/assets/og/legal.jpg',
    ],

    'author' => [
      'title' => 'Oleksandr Stanov – Full Stack & .NET Entwickler',
      'description' => 'Full-Stack-Entwickler (Laravel/Vue.js, C#/.NET) mit Erfahrung in E-Commerce, Telco-Systemen sowie Embedded- und Industrie-Umgebungen.',
      'robots' => 'index,follow',
      'og_image' => '/assets/author/profile/oleksandr-stanov.jpg',
      'og_image_alt' => 'Oleksandr Stanov – Full Stack & .NET Entwickler',
    ],


    // =========================
    // LEGACY STRUCTURE (keep for compatibility)
    // =========================
    'legal' => [
        'privacy' => [
            'title' => 'Datenschutzerklärung',
            'description' => 'Informationen zum Datenschutz.',
            'robots' => 'noindex,follow',
            'og_image' => '/assets/og/legal.jpg',
        ],
        'agb' => [
            'title' => 'AGB',
            'description' => 'Allgemeine Geschäftsbedingungen.',
            'robots' => 'noindex,follow',
            'og_image' => '/assets/og/legal.jpg',
        ],
        'impressum' => [
            'title' => 'Impressum',
            'description' => 'Impressum.',
            'robots' => 'noindex,follow',
            'og_image' => '/assets/og/legal.jpg',
        ],
    ],

    // =========================
    // OTHER
    // =========================

    'author' => [
        'title' => 'Über den Autor dieser Website',
        'description' => 'Informationen über den Entwickler dieser Website.',
        'og_image' => '/assets/og/default.jpg',
        'robots' => 'noindex,nofollow',
    ],
];
