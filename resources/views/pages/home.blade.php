@extends('layouts.app')

@php($seoKey = 'home')

@section('content')
    @include('sections.home.hero')

    @include('sections.home.about')

    @include('sections.home.stories')

    @include('sections.home.contact-cta')


@endsection
