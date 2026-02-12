@php
    $bgImages = $philosophyBgImages ?? [];
    $fallback = $philosophyBgFallback ?? asset('assets/images/fallback.png');
    $bgFirst  = $philosophyBgFirst ?? ($bgImages[0] ?? $fallback);
@endphp

<section class="about-philosophy" data-section="about-philosophy" aria-labelledby="about-philosophy-title">

    <div
        class="about-philosophy__bg"
        style="background-image:url('{{ $bgFirst }}');"
        role="img"
        aria-label="{{ __('components/about/sections/about_philosophy.bg_aria') }}"
    ></div>

    <div class="about-philosophy__overlay" aria-hidden="true"></div>

    <div class="about-philosophy__inner">

        <div class="about-philosophy__card">
            <div class="about-philosophy__line about-philosophy__line--top" aria-hidden="true"></div>

            <h2 class="about-philosophy__title" id="about-philosophy-title">
                {{ __('components/about/sections/about_philosophy.title') }}
            </h2>

            <div class="about-philosophy__line about-philosophy__line--mid" aria-hidden="true"></div>

            <div class="about-philosophy__text">
                {!! nl2br(e(__('components/about/sections/about_philosophy.body'))) !!}
            </div>
        </div>

    </div>
</section>
