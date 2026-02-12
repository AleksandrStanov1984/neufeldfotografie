<nav class="site-nav" data-mobile-nav>
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">
        {{ __('nav.home') }}
    </a>
    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">
        {{ __('nav.about') }}
    </a>
    <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'is-active' : '' }}">
        {{ __('nav.gallery') }}
    </a>
    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'is-active' : '' }}">
        {{ __('nav.contact') }}
    </a>
</nav>
