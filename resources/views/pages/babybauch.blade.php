@extends('layouts.app')

@php($seoKey = $seoKey ?? 'babybauch')

@section('content')
    @include('sections.newborn.hero', [
        'tPrefix'  => 'pages/babybauch',
        'images'   => $babybauchHeroImages ?? [],
        'first'    => $babybauchHeroFirst ?? null,
        'fallback' => $babybauchHeroFallback ?? null,
        'interval' => $babybauchHeroInterval ?? 5000,
    ])

    {{-- 2-я секция = дубль newborn intro, но с другим префиксом --}}
    @include('sections.newborn.intro', ['tPrefix' => 'pages/babybauch'])

    @include('sections.newborn.reasons', [
        'tPrefix' => 'pages/babybauch',
        'images'  => $babybauchReasonsImages ?? [],
        'first'   => $babybauchReasonsFirst ?? null,
    ])

    @include('sections.newborn.gallery', [
        'tPrefix'  => 'pages/babybauch',
        'images'   => $babybauchGalleryImages ?? [],
        'fallback' => $babybauchGalleryFallback ?? null,
        'gallerySlug' => 'babybauch',
    ])

    @include('sections.home.contact-cta')
@endsection
