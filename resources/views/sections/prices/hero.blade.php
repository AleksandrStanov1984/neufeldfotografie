<section class="prices-hero" data-section="prices-hero">
    <div class="prices-hero__inner">

        {{-- LEFT: image (rotator) --}}
        <div class="prices-hero__left">
            <div class="prices-hero__image-wrap"
                 data-prices-rotator
                 data-images='@json(($pricesHeroImages ?? []), JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)'
                 data-fallback="{{ $pricesHeroFallback ?? asset('assets/images/fallback.png') }}"
                 data-interval="{{ $pricesHeroInterval ?? 5000 }}">

                <img class="prices-hero__image is-active" src="{{ $pricesHeroFirst ?? asset('assets/images/fallback.png') }}" alt="">
                <img class="prices-hero__image" alt="">
            </div>

        </div>

        {{-- RIGHT: text --}}
        <div class="prices-hero__right">
            <div class="prices-hero__kicker">{{ __('pages/prices.kicker') }}</div>
            <h1 class="prices-hero__title">{{ __('pages/prices.title') }}</h1>
            <p class="prices-hero__lead">{{ __('pages/prices.lead') }}</p>

            <div class="prices-hero__arrow" aria-hidden="true">
                <span class="prices-hero__arrow-icon">↓</span>
            </div>
        </div>

    </div>
</section>
