@extends('layouts.app')

@php($seoKey = 'babybauch')

@section('content')
    <x-ui.container>
        <x-ui.section-title :title="__('pages/babybauch.h1')" />
        <p>{{ __('pages/babybauch.intro') }}</p>
    </x-ui.container>
@endsection
