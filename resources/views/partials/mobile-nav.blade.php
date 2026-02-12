<div class="nav-scrim" data-nav-scrim></div>

<div class="mobile-nav" id="mobileNav" data-nav aria-hidden="true">
    <div class="mobile-nav__row">
        <div class="mobile-nav__rule"></div>

        <nav class="mobile-nav__links" aria-label="Mobile navigation">
            <a href="{{ route('home') }}">{{ __('nav.home') }}</a>
            <a href="{{ route('about') }}">{{ __('nav.about') }}</a>
            <a href="{{ route('contact') }}">{{ __('nav.contact') }}</a>
            <a href="{{ route('gallery') }}">{{ __('nav.gallery') }}</a>
        </nav>

        <button class="mobile-nav__close" type="button" data-nav-close aria-label="Close menu">
            <span class="close-icon" aria-hidden="true"></span>
        </button>

        <div class="mobile-nav__rule"></div>
    </div>
</div>
