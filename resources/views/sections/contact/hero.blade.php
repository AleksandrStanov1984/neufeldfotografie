@php
    $images = $images ?? [];
    $fallback = asset('assets/images/fallback.png');
    $bgImages = !empty($images) ? $images : [$fallback];
@endphp

<section class="contact-hero"
         data-contact-hero
         data-images='@json($bgImages, JSON_UNESCAPED_SLASHES)'>

    <div class="contact-hero__left" aria-hidden="true"></div>

    <div class="contact-hero__right">
        <div class="contact-hero__right-inner">
            <div class="contact-hero__top">
                {{ __('components/contact/sections/contact.hero.question') }}
            </div>

            <h1 class="contact-hero__title">
                {{ __('components/contact/sections/contact.hero.kicker') }}
            </h1>

            <div class="contact-hero__dash" aria-hidden="true"></div>

            <div class="contact-hero__mid">
                {{ __('components/contact/sections/contact.hero.title') }}
            </div>

            <div class="contact-hero__bottom">
                {{ __('components/contact/sections/contact.hero.eyebrow') }}
            </div>
        </div>
    </div>


    <div class="contact-hero__divider" aria-hidden="true"></div>
</section>
