@extends('layouts.app')

@php($seoKey = $seoKey ?? 'contact')

@section('content')

  @include('sections.contact.hero', [
    'images' => $contactHeroImages ?? [],
    'firstImage' => $contactHeroFirst ?? null,
    'interval' => $contactHeroInterval ?? 5000,
  ])

  @include('sections.contact.contacts', [
     'socialLinks' => $socialLinks ?? [],
  ])

@endsection
