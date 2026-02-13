@php
  $tPrefix = $tPrefix ?? 'pages/newborn';

  $images = $images ?? [];
  $fallback = $fallback ?? asset('assets/images/fallback.png');
  $first = $first ?? ($images[0] ?? $fallback);
  $interval = $interval ?? 5000;
@endphp

<section class="newborn-hero" data-hero data-interval="{{ $interval }}">
    <div class="newborn-hero__bg" data-hero-bg style="background-image:url('{{ $first }}')"></div>

    <div class="newborn-hero__content">
        <h1 class="newborn-hero__title">{{ __($tPrefix.'.hero.title') }}</h1>
    </div>

    <script type="application/json" data-hero-images>
        {!! json_encode(array_values($images), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    <div class="newborn-hero__panel" aria-label="Page intro">
        <div class="newborn-hero__panel-inner">
            <div class="newborn-hero__panel-left">
                <div class="newborn-hero__panel-kicker">
                    {{ __($tPrefix.'.panel.kicker') }}
                </div>
            </div>

            <div class="newborn-hero__panel-center">
                <div class="newborn-hero__panel-lead">
                    {{ __($tPrefix.'.panel.lead') }}
                </div>

                <div class="newborn-hero__panel-text">
                    <p>{{ __($tPrefix.'.panel.p1') }}</p>
                    <p>{{ __($tPrefix.'.panel.p2') }}</p>
                </div>
            </div>

            <div class="newborn-hero__panel-right">
                <div class="newborn-hero__panel-tagline">
                    {{ __($tPrefix.'.panel.tagline') }}
                </div>
            </div>
        </div>
    </div>
</section>
