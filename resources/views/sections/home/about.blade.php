@props([

    'image' => $homeAboutFirst ?? asset('assets/images/fallback.png'),
])

<section class="home-about" id="about" data-section="home-about">
    <div class="home-about__inner">

        <div class="home-about__vline home-about__vline--left" aria-hidden="true"></div>

        <div class="home-about__left">
            <div class="home-about__title-row">
                <p class="home-about__meet">{{ __('components/sections/about.meet_your') }}</p>
                <span class="home-about__hline" aria-hidden="true"></span>
            </div>

            <a class="home-about__image-link"
               href="{{ route('about') }}"
               aria-label="{{ __('components/sections/about.button') }}">
                <img
                  class="home-about__image"
                  src="{{ $image }}"
                  alt="{{ __('components/sections/about.image_alt') }}"
                  loading="lazy"
                  decoding="async"
                  fetchpriority="low"
                  data-rotator="home-about"
                  data-images='@json(($homeAboutImages ?? []), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)'
                  data-fallback="{{ $homeAboutFallback ?? asset('assets/images/fallback.png') }}"
                  data-interval="{{ $homeAboutInterval ?? 5000 }}"
                  width="900"
                  height="1200"
                  style="height:auto;"
                >


            </a>
        </div>

        <div class="home-about__right">
            <h2 class="home-about__headline">{{ __('components/sections/about.headline') }}</h2>
            <h3 class="home-about__sub">{{ __('components/sections/about.subheadline') }}</h3>

            <div class="home-about__text">
                {!! nl2br(e(__('components/sections/about.body'))) !!}
            </div>


        </div>

        <div class="home-about__vline home-about__vline--right" aria-hidden="true"></div>

    </div>
</section>
