@php
    $tPrefix  = $tPrefix ?? 'pages/newborn';

    // IMPORTANT: секция универсальная — не тянем переменные newborn внутрь
    $images   = $images ?? [];
    $fallback = $fallback ?? asset('assets/images/fallback.png');

    $images = is_array($images) ? array_values(array_filter($images)) : [];

    // уникальный id для aria (чтобы не пересекалось между страницами/секциями)
    $titleId = 'gallery-title-' . str_replace(['/', '.'], '-', $tPrefix);

    $gallerySlug = $gallerySlug
            ?? (str_contains($tPrefix, 'babybauch') ? 'babybauch'
            : (str_contains($tPrefix, 'cake_smash') ? 'cake-smash'
            : 'newborn'));
@endphp

<section class="newborn-gallery" aria-labelledby="{{ $titleId }}">
    <div class="newborn-gallery__inner">

        {{-- top line --}}
        <div class="newborn-gallery__topline" aria-hidden="true"></div>

        <h2 class="newborn-gallery__title" id="{{ $titleId }}">
            <a class="newborn-gallery__title-link"
               href="{{ route('gallery.show', ['slug' => $gallerySlug]) }}">
                {{ __($tPrefix.'.reasons.gallery.title') }}
            </a>
        </h2>

        <div class="newborn-gallery__subrow">
            <div class="newborn-gallery__line" aria-hidden="true"></div>
            <div class="newborn-gallery__subtitle">
                {{ __($tPrefix.'.reasons.gallery.subtitle') }}
            </div>
        </div>

        <div class="newborn-gallery__slider" data-gallery>

            <div class="newborn-gallery__track" data-gallery-track>
                @forelse($images as $src)
                    <div class="newborn-gallery__cell">
                        <img src="{{ $src }}" alt="{{ __($tPrefix.'.gallery.image_alt') }}"
                             loading="lazy" decoding="async" width="900" height="650" style="height:auto;">
                    </div>
                @empty
                    <div class="newborn-gallery__cell">
                        <img src="{{ $fallback }}" alt="{{ __($tPrefix.'.gallery.image_alt') }}"
                             loading="lazy" decoding="async" width="900" height="650" style="height:auto;">
                    </div>
                @endforelse
            </div>

            <div class="newborn-gallery__navrow" aria-hidden="false">
                <button class="newborn-gallery__nav newborn-gallery__nav--prev" type="button" aria-label="Previous" data-gallery-prev>
                    <span class="newborn-gallery__arrow" aria-hidden="true">←</span>
                </button>

                <div class="newborn-gallery__slash" aria-hidden="true">/</div>

                <button class="newborn-gallery__nav newborn-gallery__nav--next" type="button" aria-label="Next" data-gallery-next>
                    <span class="newborn-gallery__arrow" aria-hidden="true">→</span>
                </button>
            </div>
        </div>


    </div>
</section>
