@extends('layouts.app')

@php
    // SEO обязателен
    $seoKey = $seoKey ?? 'gallery_newborn';

    // Переводы только через lang
    $tPrefix = $tPrefix ?? 'pages/gallery';
@endphp

@section('content')
    {{-- HERO --}}
    @include('sections.gallery.hero', [
        'heroImage' => $heroImage,
        'title'     => __($tPrefix . '.hero.' . $galleryKey . '.title'),
        'subtitle'  => __($tPrefix . '.hero.' . $galleryKey . '.subtitle'),
    ])

    {{-- GRID --}}
    @include('sections.gallery.grid', [
        'images' => $galleryImages,
        'heading' => __($tPrefix . '.grid.heading'),
    ])

    @include('sections.home.contact-cta')

@endsection
