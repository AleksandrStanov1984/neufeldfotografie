@extends('layouts.app')

@php
    $seoKey   = $seoKey ?? 'newborn';
    $tPrefix  = 'pages/newborn';
@endphp

@section('content')

    {{-- HERO --}}
    @include('sections.newborn.hero', [
        'tPrefix'  => $tPrefix,
        'images'   => $newbornHeroImages ?? [],
        'first'    => $newbornHeroFirst ?? null,
        'fallback' => $newbornHeroFallback ?? null,
        'interval' => $newbornHeroInterval ?? 5000,
    ])

    {{-- INTRO (дубль панели, но уже секция ниже) --}}
    @include('sections.newborn.intro', [
        'tPrefix' => $tPrefix
    ])

    {{-- REASONS --}}
    @include('sections.newborn.reasons', [
        'tPrefix'  => $tPrefix,
        'images'   => $newbornReasonsImages ?? [],
        'first'    => $newbornReasonsFirst ?? null,
        'fallback' => $newbornReasonsFallback ?? null,
    ])


    {{-- GALLERY --}}
    @include('sections.newborn.gallery', [
        'tPrefix' => $tPrefix,
        'images'  => $newbornGalleryImages ?? [],
        'fallback'=> $newbornGalleryFallback ?? null,
        'gallerySlug' => 'newborn',
    ])

    @include('sections.home.contact-cta')

@endsection
