@extends('layouts.app')

@php($seoKey = $seoKey ?? 'newborn')

@section('content')
    @include('sections.newborn.hero', [
        'images' => $newbornHeroImages ?? [],
        'first' => $newbornHeroFirst ?? null,
        'fallback' => $newbornHeroFallback ?? null,
        'interval' => $newbornHeroInterval ?? 5000,
    ])

    @include('sections.newborn.intro')


@endsection
