@extends('layouts.app')

@php($seoKey = 'cake_smash')

@section('content')
    <x-ui.container>
        <x-ui.section-title :title="__('pages/cake_smash.h1')" />
        <p>{{ __('pages/cake_smash.intro') }}</p>
    </x-ui.container>
@endsection
