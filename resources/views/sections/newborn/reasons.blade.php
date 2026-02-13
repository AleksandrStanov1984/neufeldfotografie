@php
    $tPrefix  = $tPrefix ?? 'pages/newborn';

    // универсально: всё приходит извне через include(...)
    $images   = $images ?? [];
    $fallback = $fallback ?? asset('assets/images/fallback.png');
    $first    = $first ?? null;

    // normalize
    $images = is_array($images) ? array_values(array_filter($images)) : [];

    // choose image
    $image = $first ?: ($images[0] ?? $fallback);

    // unique id for aria
    $titleId = 'reasons-title-' . str_replace(['/', '.'], '-', $tPrefix);
@endphp

<section class="newborn-reasons" aria-labelledby="{{ $titleId }}">
    <div class="newborn-reasons__inner">

        <h2 class="newborn-reasons__title" id="{{ $titleId }}">
            {{ __($tPrefix.'.reasons.title') }}
        </h2>

        <div class="newborn-reasons__subrow">
            <div class="newborn-reasons__line" aria-hidden="true"></div>
            <div class="newborn-reasons__subtitle">
                {{ __($tPrefix.'.reasons.subtitle') }}
            </div>
        </div>

        <div class="newborn-reasons__grid">
            <div class="newborn-reasons__col newborn-reasons__col--left">
                <div class="newborn-reasons__block">

                    <h3 class="newborn-reasons__block-title">
                        {{ __($tPrefix.'.reasons.left.title') }}
                    </h3>

                    <p class="newborn-reasons__p">{{ __($tPrefix.'.reasons.left.p1') }}</p>
                    <p class="newborn-reasons__p">{{ __($tPrefix.'.reasons.left.p2') }}</p>
                    <p class="newborn-reasons__p">{{ __($tPrefix.'.reasons.left.p3') }}</p>

                    {{-- optional second block --}}
                    @php
                        $title2 = __($tPrefix.'.reasons.left.title2');
                        $p4     = __($tPrefix.'.reasons.left.p4');
                        $p5     = __($tPrefix.'.reasons.left.p5');

                        $hasSecond =
                            $title2 !== $tPrefix.'.reasons.left.title2' ||
                            $p4     !== $tPrefix.'.reasons.left.p4' ||
                            $p5     !== $tPrefix.'.reasons.left.p5';
                    @endphp

                    @if($hasSecond)
                        <h3 class="newborn-reasons__block-title newborn-reasons__block-title--secondary">
                            {{ $title2 }}
                        </h3>

                        @if($p4 !== $tPrefix.'.reasons.left.p4')
                            <p class="newborn-reasons__p">{{ $p4 }}</p>
                        @endif

                        @if($p5 !== $tPrefix.'.reasons.left.p5')
                            <p class="newborn-reasons__p">{{ $p5 }}</p>
                        @endif
                    @endif

                </div>
            </div>

            <div class="newborn-reasons__col newborn-reasons__col--image">
                <figure class="newborn-reasons__image">
                    <img
                        src="{{ $image }}"
                        alt="{{ __($tPrefix.'.reasons.image_alt') }}"
                        loading="lazy"
                        decoding="async"
                        width="900"
                        height="1100"
                        style="height:auto;"
                    >
                </figure>
            </div>

            <div class="newborn-reasons__col newborn-reasons__col--right">
                <div class="newborn-reasons__block">
                    <h3 class="newborn-reasons__block-title">
                        {{ __($tPrefix.'.reasons.right.title') }}
                    </h3>
                    <p class="newborn-reasons__p">{{ __($tPrefix.'.reasons.right.p1') }}</p>
                    <p class="newborn-reasons__p">{{ __($tPrefix.'.reasons.right.p2') }}</p>
                    <p class="newborn-reasons__p">{{ __($tPrefix.'.reasons.right.p3') }}</p>
                </div>
            </div>
        </div>

        {{-- NOTE (optional) --}}
        @php
            $noteTitle = __($tPrefix.'.reasons.note.title');
            $noteP1    = __($tPrefix.'.reasons.note.p1');
            $noteP2    = __($tPrefix.'.reasons.note.p2');

            $hasNote =
                $noteTitle !== $tPrefix.'.reasons.note.title' ||
                $noteP1    !== $tPrefix.'.reasons.note.p1' ||
                $noteP2    !== $tPrefix.'.reasons.note.p2';
        @endphp

        @if($hasNote)
            <div class="newborn-reasons__note">
                <div class="newborn-reasons__note-title">
                    {{ $noteTitle }}
                </div>
                <div class="newborn-reasons__note-text">
                    @if($noteP1 !== $tPrefix.'.reasons.note.p1')
                        <p>{{ $noteP1 }}</p>
                    @endif
                    @if($noteP2 !== $tPrefix.'.reasons.note.p2')
                        <p>{{ $noteP2 }}</p>
                    @endif
                </div>
            </div>
        @endif

    </div>
</section>
