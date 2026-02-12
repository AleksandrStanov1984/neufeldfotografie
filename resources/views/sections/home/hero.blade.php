@php
    $leftImages  = $leftImages ?? [];
    $rightImages = $rightImages ?? [];
    $fallback    = asset('assets/images/fallback.png');

    // MOBILE: left1 -> right1 -> left2 -> right2 ...
    $mobileImages = [];
    $max = max(count($leftImages), count($rightImages));
    for ($i = 0; $i < $max; $i++) {
        if (!empty($leftImages[$i]))  $mobileImages[] = $leftImages[$i];
        if (!empty($rightImages[$i])) $mobileImages[] = $rightImages[$i];
    }

    // Чтобы JS всегда имел что показывать
    if (empty($leftImages))  $leftImages  = [$fallback];
    if (empty($rightImages)) $rightImages = [$fallback];
    if (empty($mobileImages)) $mobileImages = [$fallback];
@endphp

<section class="hero" data-hero aria-labelledby="hero-title">
    <div class="hero-bg">

        <div class="hero-ui" aria-hidden="true">
            <div class="hero-ui__mid-line"></div>

            <div class="hero-ui__bottom">
                <div class="hero-ui__bottom-line"></div>
                <div class="hero-ui__bottom-label">{{ __('components/sections/hero.bottom_label') }}</div>
                <div class="hero-ui__arrow"></div>
            </div>
        </div>

        <div class="hero-headline-wrap">
            <div class="hero-kicker">{{ __('components/sections/hero.kicker') }}</div>

            {{-- H1 для SEO --}}
            <h1 class="hero-headline" id="hero-title">
                {!! __('components/sections/hero.h1_html') !!}
            </h1>

            {{-- (опционально) маленький абзац с ключами --}}
            {{-- <p class="hero-sub">{{ __('components/sections/hero.sub') }}</p> --}}

            {{-- CTA для внутренней перелинковки --}}
            <a class="hero-cta" href="{{ route('contact') }}">
            </a>
        </div>

        {{-- DESKTOP --}}
        <div class="hero-half hero-half--left"
             data-hero-side="left"
             data-images='@json($leftImages, JSON_UNESCAPED_SLASHES)'
             data-fallback="{{ $fallback }}"></div>

        <div class="hero-half hero-half--right"
             data-hero-side="right"
             data-images='@json($rightImages, JSON_UNESCAPED_SLASHES)'
             data-fallback="{{ $fallback }}"></div>

        <div class="hero-divider" aria-hidden="true"></div>
        <div class="hero-overlay" aria-hidden="true"></div>

        {{-- MOBILE --}}
        <div class="hero-mobile"
             data-hero-side="mobile"
             data-images='@json($mobileImages, JSON_UNESCAPED_SLASHES)'
             data-fallback="{{ $fallback }}"></div>

    </div>
</section>
