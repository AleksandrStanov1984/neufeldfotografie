@extends('layouts.app')

@php($seoKey = 'about')

@section('content')
    @include('sections.about.welcome')
    @include('sections.about.my-philosophy')
@endsection
