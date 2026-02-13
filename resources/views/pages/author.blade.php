@extends('layouts.app')

@php
    $seoKey = $seoKey ?? 'author';
    $tPrefix = $tPrefix ?? 'pages/author';
@endphp

@section('content')

<section class="author-hero" aria-labelledby="author-title">
    <div class="author-hero__bg" aria-hidden="true"></div>

    <div class="author-hero__inner">
        <div class="author-hero__top">
            <div class="author-hero__meta">
                <div class="author-hero__name">{{ __($tPrefix.'.hero.name') }}</div>
                <h1 id="author-title" class="author-hero__title">
                    {!! nl2br(e(__($tPrefix.'.hero.title'))) !!}
                </h1>

                <p class="author-hero__lead">
                    {{ __($tPrefix.'.hero.lead') }}
                </p>

                <div class="author-hero__stack">
                    {{ __($tPrefix.'.hero.stack') }}
                </div>

                <div class="author-hero__socials" aria-label="Social links">
                    <a class="author-hero__social" href="{{ $links['telegram'] }}" target="_blank" rel="noopener"
                       aria-label="Telegram">
                        <img src="{{ $icons['telegram'] }}" alt="Telegram" loading="lazy">
                    </a>

                    <a class="author-hero__social" href="{{ $links['whatsapp'] }}" target="_blank" rel="noopener"
                       aria-label="WhatsApp">
                        <img src="{{ $icons['whatsapp'] }}" alt="WhatsApp" loading="lazy">
                    </a>
                </div>
            </div>

            <div class="author-hero__profile">
                <div class="author-hero__ring" aria-hidden="true"></div>
                <img class="author-hero__avatar"
                     src="{{ $profileImage }}"
                     alt="{{ __($tPrefix.'.hero.photo_alt') }}"
                     width="520" height="520"
                     loading="lazy" decoding="async">
            </div>
        </div>

        <div class="author-hero__divider" aria-hidden="true"></div>

        <div class="author-panels">
            <div class="author-panel">
                <h2 class="author-panel__title">{{ __($tPrefix.'.contact.title') }}</h2>
                <p class="author-panel__text">{{ __($tPrefix.'.contact.text') }}</p>

                <div class="author-panel__list">
                    <div><span>{{ __($tPrefix.'.contact.location_label') }}</span> {{ __($tPrefix.'.contact.location') }}</div>
                    <div><span>{{ __($tPrefix.'.contact.email_label') }}</span> <a href="mailto:{{ __($tPrefix.'.contact.email') }}">{{ __($tPrefix.'.contact.email') }}</a></div>
                    <div><span>{{ __($tPrefix.'.contact.phone_label') }}</span> <a href="tel:{{ __($tPrefix.'.contact.phone_raw') }}">{{ __($tPrefix.'.contact.phone') }}</a></div>
                    <div><span>{{ __($tPrefix.'.contact.github_label') }}</span> <a href="{{ __($tPrefix.'.contact.github_url') }}" target="_blank" rel="noopener">{{ __($tPrefix.'.contact.github') }}</a></div>
                    <div><span>{{ __($tPrefix.'.contact.linkedin_label') }}</span> <a href="{{ __($tPrefix.'.contact.linkedin_url') }}" target="_blank" rel="noopener">{{ __($tPrefix.'.contact.linkedin') }}</a></div>
                    <div><span>{{ __($tPrefix.'.contact.langs_label') }}</span> {{ __($tPrefix.'.contact.langs') }}</div>
                </div>
            </div>

            <div class="author-panel">
                <h2 class="author-panel__title">{{ __($tPrefix.'.about.title') }}</h2>
                <p>{{ __($tPrefix.'.about.p1') }}</p>
                <p>{{ __($tPrefix.'.about.p2') }}</p>
                <p>{{ __($tPrefix.'.about.p3') }}</p>
                <p>{{ __($tPrefix.'.about.p4') }}</p>
            </div>
        </div>

    </div>
</section>

@endsection
