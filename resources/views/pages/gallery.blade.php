@extends('layouts.app')

@php($seoKey = 'gallery')

@section('content')
    <x-ui.container>
        <x-ui.section-title :title="__('pages/gallery.h1')" />
        <p>{{ __('pages/gallery.body') }}</p>
    </x-ui.container>
@endsection
