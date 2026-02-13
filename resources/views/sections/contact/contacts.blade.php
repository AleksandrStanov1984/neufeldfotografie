@php
    $socialLinks = $socialLinks ?? [];

    $addressTitle = __('components/contact/sections/contact.info.address_title');
    $addressValue = __('components/contact/sections/contact.info.address_value');

    $mapSrc = 'https://www.google.com/maps?q=' . rawurlencode($addressValue) . '&output=embed';
@endphp

<section class="contact-panel section">
    <div class="container contact-panel__container">

        <header class="contact-panel__header">

            <h2 class="contact-panel__title">
                {{ __('components/contact/sections/contact.info.title_big') }}
            </h2>
        </header>

        <div class="contact-panel__grid">
            {{-- LEFT: info panel --}}
            <aside class="contact-panel__card">
                <div class="contact-panel__card-head">
                    <div class="contact-panel__card-title">{{ $addressTitle }}</div>
                    <div class="contact-panel__card-value">{{ $addressValue }}</div>
                </div>

                <div class="contact-panel__divider" aria-hidden="true"></div>

                <div class="contact-panel__links" role="list">
                  @foreach($socialLinks as $social)
                    <a class="contact-panel__link"
                       role="listitem"
                       href="{{ $social['url'] ?? '#' }}"
                       target="{{ !empty($social['url']) ? '_blank' : '_self' }}"
                       rel="{{ !empty($social['url']) ? 'noopener noreferrer' : '' }}"
                       aria-label="{{ $social['label'] ?? '' }}">

                      <span class="contact-panel__icon" aria-hidden="true">
                        <img src="{{ $social['icon_url'] ?? '' }}" alt="" loading="lazy">
                      </span>

                      <span class="contact-panel__label">{{ $social['label'] ?? '' }}</span>
                    </a>
                  @endforeach
                </div>


                <div class="contact-panel__divider" aria-hidden="true"></div>

                <div class="contact-panel__text">
                    <p>{{ __('components/contact/sections/contact.info.p1') }}</p>
                    <p>{{ __('components/contact/sections/contact.info.p2') }}</p>
                </div>
            </aside>

            {{-- RIGHT: map --}}
            <div class="contact-panel__map">
                <iframe
                    title="{{ __('components/contact/sections/contact.info.map_aria') }}"
                    src="{{ $mapSrc }}"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
        </div>

    </div>
</section>
