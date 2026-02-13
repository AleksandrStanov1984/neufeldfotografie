<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php use App\Support\Seo; @endphp

    {{-- Primary SEO --}}
    <title>@yield('seo:title', Seo::title($seoKey ?? 'home'))</title>
    <meta name="description" content="@yield('seo:description', Seo::description($seoKey ?? 'home'))">
    <meta name="robots" content="@yield('seo:robots', Seo::robots($seoKey ?? 'home'))">

    {{-- Optional (if you support it in Seo class) --}}
    @if(method_exists(Seo::class, 'keywords'))
        <meta name="keywords" content="@yield('seo:keywords', Seo::keywords($seoKey ?? 'home'))">
    @endif

    {{-- Canonical --}}
    <link rel="canonical" href="{{ Seo::canonical() }}">

    {{-- Hreflang (multilingual SEO) --}}
    @if(method_exists(Seo::class, 'hreflangs'))
        @foreach(Seo::hreflangs() as $hreflang => $url)
            <link rel="alternate" href="{{ $url }}" hreflang="{{ $hreflang }}">
        @endforeach
    @endif

    {{-- OpenGraph --}}
    <meta property="og:site_name" content="{{ __('seo.global.site_name') }}">
    <meta property="og:type" content="{{ Seo::ogType() }}">
    <meta property="og:title" content="@yield('og:title', Seo::title($seoKey ?? 'home'))">
    <meta property="og:description" content="@yield('og:description', Seo::description($seoKey ?? 'home'))">
    <meta property="og:url" content="{{ Seo::canonical() }}">
    <meta property="og:image" content="@yield('og:image', Seo::ogImage($seoKey ?? 'home'))">

    @if(method_exists(Seo::class, 'ogImageAlt'))
        <meta property="og:image:alt" content="@yield('og:image:alt', Seo::ogImageAlt($seoKey ?? 'home'))">
    @endif

    @if(method_exists(Seo::class, 'ogLocale'))
        <meta property="og:locale" content="{{ Seo::ogLocale() }}">
    @endif
    @if(method_exists(Seo::class, 'ogAlternateLocales'))
        @foreach(Seo::ogAlternateLocales() as $loc)
            <meta property="og:locale:alternate" content="{{ $loc }}">
        @endforeach
    @endif

    {{-- Twitter --}}
    <meta name="twitter:card" content="{{ Seo::twitterCard() }}">
    <meta name="twitter:title" content="@yield('tw:title', Seo::title($seoKey ?? 'home'))">
    <meta name="twitter:description" content="@yield('tw:description', Seo::description($seoKey ?? 'home'))">
    <meta name="twitter:image" content="@yield('tw:image', Seo::ogImage($seoKey ?? 'home'))">

    {{-- Icons (add files later) --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- Preconnect for fonts (only if you use external fonts later) --}}
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com"> --}}
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- JSON-LD slot (will add later when pages are ready) --}}
    @stack('seo:jsonld')
</head>

@php
    $lightRoutes = ['home', 'newborn', 'babybauch', 'cake_smash', 'contact'];
    $isLightHeader = request()->routeIs(...$lightRoutes);
@endphp

<body class="{{ $isLightHeader ? 'page-home' : 'page-inner' }}">

    @include('partials.hero-header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('modals')
</body>
</html>
