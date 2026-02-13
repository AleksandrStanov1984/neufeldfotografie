@php
    $images   = $chapterImages ?? [];
    $fallback = $chapterFallback ?? asset('assets/images/fallback.png');
    $first    = $chapterFirst ?? ($images[0] ?? $fallback);
    $interval = $chapterInterval ?? 5000;
@endphp

<section class="home-contact-cta" data-cta aria-labelledby="contact-cta-title">
    <div class="home-contact-cta__inner">

      <div class="home-contact-cta__left">
          <a href="{{ route('contact') }}"
             class="home-contact-cta__photo"
             data-cta-rotator
             data-interval="{{ $interval }}"
             data-images='@json($images, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)'
             style="background-image:url('{{ $first }}');"
             aria-label="{{ __('components/sections/contact_cta.image_aria') }}">
          </a>
      </div>

      <div class="home-contact-cta__right">

          <div class="home-contact-cta__toprow">
              <a class="home-contact-cta__mini" href="{{ route('contact') }}">
                  <span class="home-contact-cta__mini-text">{{ __('components/sections/contact_cta.mini') }}</span>
              </a>
              <a class="home-contact-cta__arrow" href="{{ route('contact') }}" aria-label="{{ __('components/sections/contact_cta.arrow_aria') }}">
                  <span class="home-contact-cta__arrow-icon" aria-hidden="true">→</span>
              </a>
          </div>

          <a class="home-contact-cta__titlewrap" href="{{ route('contact') }}">
              <h2 id="contact-cta-title" class="home-contact-cta__title">
                  {{ __('components/sections/contact_cta.title') }}
              </h2>
          </a>

          <div class="home-contact-cta__desc">
              {{ __('components/sections/contact_cta.desc') }}
          </div>

      </div>

      <div class="home-contact-cta__vertical" aria-hidden="true">
          {{ __('components/sections/contact_cta.vertical') }}
      </div>

    </div>

</section>
