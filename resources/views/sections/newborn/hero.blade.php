@php
  $images = $images ?? [];
  $fallback = $fallback ?? asset('assets/images/fallback.png');
  $first = $first ?? ($images[0] ?? $fallback);
  $interval = $interval ?? 5000;
@endphp

<section class="newborn-hero" data-hero data-interval="{{ $interval }}">
    <div class="newborn-hero__bg"
         data-hero-bg
         style="background-image:url('{{ $first }}')"></div>

    <div class="newborn-hero__content">
        <h1 class="newborn-hero__title">{{ __('pages/newborn.hero.title') }}</h1>
    </div>

    <script type="application/json" data-hero-images>
        {!! json_encode(array_values($images), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    {{-- Нижний блок как на скрине --}}
    <div class="newborn-hero__panel" aria-label="Newborn sessions intro">
        <div class="newborn-hero__panel-inner">
            <div class="newborn-hero__panel-left">
                <div class="newborn-hero__panel-kicker">
                    {{ __('pages/newborn.panel.kicker') }}
                </div>
            </div>

            <div class="newborn-hero__panel-center">
                <div class="newborn-hero__panel-lead">
                    {{ __('pages/newborn.panel.lead') }}
                </div>

                <div class="newborn-hero__panel-text">
                    <p>{{ __('pages/newborn.panel.p1') }}</p>
                    <p>{{ __('pages/newborn.panel.p2') }}</p>
                </div>
            </div>

            <div class="newborn-hero__panel-right">
                <div class="newborn-hero__panel-tagline">
                    {{ __('pages/newborn.panel.tagline') }}
                </div>
            </div>
        </div>
    </div>
</section>
