@extends('layouts.app')

@php($seoKey = $seoKey ?? 'cake_smash')

@section('content')
    @include('sections.newborn.hero', [
        'tPrefix'  => 'pages/cake_smash',
        'images'   => $cakeSmashHeroImages ?? [],
        'first'    => $cakeSmashHeroFirst ?? null,
        'fallback' => $cakeSmashHeroFallback ?? null,
        'interval' => $cakeSmashHeroInterval ?? 5000,
    ])

    {{-- 2-я секция = дубль newborn intro, но с другим префиксом --}}
    @include('sections.newborn.intro', ['tPrefix' => 'pages/cake_smash'])

    @include('sections.newborn.reasons', [
        'tPrefix' => 'pages/cake_smash',
        'images'  => $cakeSmashReasonsImages ?? [],
        'first'   => $cakeSmashReasonsFirst ?? null,
    ])

    @include('sections.newborn.gallery', [
        'tPrefix'  => 'pages/cake_smash',
        'images'   => $cakeSmashGalleryImages ?? [],
        'fallback' => $cakeSmashGalleryFallback ?? null,
    ])
@endsection
