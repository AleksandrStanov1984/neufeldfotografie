
@php
    use Illuminate\Support\Facades\File;

    $currentLocale = app()->getLocale();

    $locales = collect(File::directories(lang_path()))
        ->map(fn($p) => basename($p))
        ->filter()
        ->sort()
        ->values();
@endphp


<header class="hero-header" data-hero-header>
    <div class="hero-header__rule" aria-hidden="true"></div>

    <div class="hero-header__inner">
        <a class="hero-header__brand" href="{{ route('home') }}" aria-label="Angelika Photography">
            <img src="{{ asset('assets/brand/angelika-logo.svg') }}" alt="ANGELIKA" class="hero-header__logo">
        </a>

        <div class="hero-header__right">
            {{-- LANG SWITCH --}}
            <div class="lang-switch" data-lang-switch>
                <button class="lang-switch__btn" type="button" data-lang-btn aria-haspopup="listbox" aria-expanded="false">
                    <span class="lang-switch__label">{{ strtoupper($currentLocale) }}</span>
                    <span class="lang-switch__chev" aria-hidden="true"></span>
                </button>

                <div class="lang-switch__menu" data-lang-menu role="listbox" aria-label="Language" hidden>
                    @foreach($locales as $loc)
                        <a
                            class="lang-switch__item {{ $loc === $currentLocale ? 'is-active' : '' }}"
                            href="{{ route('locale.switch', ['locale' => $loc]) }}"
                            role="option"
                            aria-selected="{{ $loc === $currentLocale ? 'true' : 'false' }}"
                        >{{ strtoupper($loc) }}</a>
                    @endforeach
                </div>
            </div>

            {{-- BURGER --}}
            <button class="hero-header__burger" type="button"
                    data-nav-open
                    aria-label="Open menu"
                    aria-expanded="false"
                    aria-controls="heroNav">
                <svg width="28" height="28" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>


    {{-- TOP NAV PANEL --}}
    <div class="hero-nav" id="heroNav" data-nav aria-hidden="true">
        <div class="hero-nav__row">
            <div class="hero-nav__rule" aria-hidden="true"></div>

            <nav class="hero-nav__links" aria-label="Main navigation">
                <a href="{{ route('home') }}">{{ __('nav.home') }}</a>
                <a href="{{ route('about') }}">{{ __('nav.about') }}</a>
                <a href="{{ route('contact') }}">{{ __('nav.contact') }}</a>
                <a href="{{ route('price') }}">{{ __('nav.prices') }}</a>
                <div class="hero-nav__dd" data-gallery-dd>
                    <button class="hero-nav__dd-btn"
                            type="button"
                            data-gallery-dd-btn
                            aria-haspopup="menu"
                            aria-expanded="false">
                        {{ __('nav.gallery') }}
                    </button>

                    <div class="hero-nav__dd-menu" data-gallery-dd-menu role="menu" hidden>
                        <a role="menuitem" class="hero-nav__dd-item" href="{{ route('newborn') }}">
                            {{ __('nav.newborn') }}
                        </a>
                        <a role="menuitem" class="hero-nav__dd-item" href="{{ route('babybauch') }}">
                            {{ __('nav.babybauch') }}
                        </a>
                        <a role="menuitem" class="hero-nav__dd-item" href="{{ route('cake_smash') }}">
                            {{ __('nav.cake_smash') }}
                        </a>
                    </div>
                </div>

            </nav>

            <div class="hero-nav__rule" aria-hidden="true"></div>
        </div>
    </div>
</header>





