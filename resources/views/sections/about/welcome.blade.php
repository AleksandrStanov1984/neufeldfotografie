@php
    $images   = $welcomeImages ?? [];
    $fallback = $welcomeFallback ?? asset('assets/images/fallback.png');
    $first    = $welcomeFirst ?? ($images[0] ?? $fallback);
    $interval = $welcomeInterval ?? 5000;
@endphp

<section class="about-welcome" data-section="about-welcome" aria-labelledby="about-welcome-title">
    <div class="about-welcome__inner">

        {{-- Заголовки как сейчас (мобилка супер) --}}
        <div class="about-welcome__top">
            {{-- SEO: на странице /about это будет H1 --}}
            <h1 class="about-welcome__h1" id="about-welcome-title">
                {{ __('components/about/sections/about_welcome.h1') }}
            </h1>

            <h2 class="about-welcome__h2">
                {{ __('components/about/sections/about_welcome.h2') }}
            </h2>
        </div>

        {{-- GRID: desktop = text left / image right, mobile = как сейчас --}}
        <div class="about-welcome__grid">

            {{-- LEFT (desktop): text --}}
            <div class="about-welcome__col about-welcome__col--text">
                <h3 class="about-welcome__h3">
                    {{ __('components/about/sections/about_welcome.h3') }}
                </h3>

                <div class="about-welcome__text">
                    {!! nl2br(e(__('components/about/sections/about_welcome.body'))) !!}
                </div>
            </div>

            {{-- RIGHT (desktop): image + credit --}}
            <div class="about-welcome__col about-welcome__col--image">

                <div class="about-welcome__media">
                    <div
                        class="about-welcome__image"
                        data-bg-rotator
                        data-interval="{{ $interval }}"
                        data-images='@json($images, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)'
                        data-fallback="{{ $fallback }}"
                        style="background-image: url('{{ $first }}');"
                        role="img"
                        aria-label="{{ __('components/about/sections/about_welcome.image_aria') }}"
                    ></div>
                </div>

                <div class="about-welcome__credit">
                    {{ __('components/about/sections/about_welcome.credit') }}
                </div>

            </div>

        </div>

        <div class="about-welcome__line" aria-hidden="true"></div>

    </div>
</section>
