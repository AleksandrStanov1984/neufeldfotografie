@extends('layouts.app')

@php($seoKey = 'prices')

@section('content')

{{-- HERO --}}
@include('sections.prices.hero')

{{-- PACKAGES --}}
@include('sections.prices.packages')

{{-- EXTRA CTA --}}
@include('sections.home.contact-cta')

{{-- MODALS --}}
@include('sections.prices.modals')

@endsection
