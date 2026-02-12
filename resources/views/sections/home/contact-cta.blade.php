@php
    $images   = $chapterImages ?? [];
    $fallback = $chapterFallback ?? asset('assets/images/fallback.png');
    $first    = $chapterFirst ?? ($images[0] ?? $fallback);
    $interval = $chapterInterval ?? 5000;
@endphp

<section class="home-contact-cta" data-cta aria-labelledby="contact-cta-title">
    <div class="home-contact-cta__inner">

        <a href="{{ route('contact') }}"
           class="home-contact-cta__image"
           data-cta-rotator
           data-interval="{{ $interval }}"
           data-images='@json($images, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)'
           style="background-image: url('{{ $first }}');"
           aria-label="{{ __('components/sections/contact_cta.image_aria') }}">
        </a>

        <div class="home-contact-cta__content">
            <h2 id="contact-cta-title">{{ __('components/sections/contact_cta.title') }}</h2>

            <p class="home-contact-cta__desc">
                {{ __('components/sections/contact_cta.desc') }}
            </p>

            <a href="{{ route('contact') }}" class="home-contact-cta__link">
                {{ __('components/sections/contact_cta.cta') }} <span aria-hidden="true">→</span>
            </a>
        </div>

    </div>
</section>
