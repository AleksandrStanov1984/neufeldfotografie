@php
  $tPrefix = $tPrefix ?? 'pages/newborn';
@endphp

<section class="newborn-intro" aria-labelledby="newborn-intro-title">
    <div class="newborn-intro__inner">

        <div class="newborn-intro__top">
            <div class="newborn-intro__left">
                <h2 class="newborn-intro__kicker" id="newborn-intro-title">
                    {{ __($tPrefix.'.panel.kicker') }}
                </h2>
            </div>

            <div class="newborn-intro__center">
                <div class="newborn-intro__lead">
                    {{ __($tPrefix.'.panel.lead') }}
                </div>
            </div>

            <div class="newborn-intro__top-spacer" aria-hidden="true"></div>
        </div>

        <div class="newborn-intro__middle">
            <div class="newborn-intro__text">
                <p>{{ __($tPrefix.'.panel.p1') }}</p>
                <p>{{ __($tPrefix.'.panel.p2') }}</p>
            </div>
        </div>

        <div class="newborn-intro__bottom">
            <div class="newborn-intro__right">
                <div class="newborn-intro__tagline">
                    {{ __($tPrefix.'.panel.tagline') }}
                </div>
            </div>
        </div>

    </div>
</section>
