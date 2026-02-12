@extends('layouts.app')

@php($seoKey = 'datenschutz')

@section('content')
<section class="legal-page section">
    <div class="container legal-page__container">
        <header class="legal-page__header">
            <div class="legal-page__kicker">{{ __('legal.datenschutz.kicker') }}</div>
            <h1 class="legal-page__title">{{ __('legal.datenschutz.title') }}</h1>
            <div class="legal-page__meta">{{ __('legal.datenschutz.updated') }}</div>
            <div class="legal-page__line" aria-hidden="true"></div>
        </header>

        <div class="legal-page__toc">
            <h2 class="legal-page__toc-title">{{ __('legal.datenschutz.toc_title') }}</h2>
            <div class="legal-page__toc-grid">
                @foreach(__('legal.datenschutz.toc') as $item)
                    <a class="legal-page__toc-link" href="#{{ $item['id'] }}">{{ $item['label'] }}</a>
                @endforeach
            </div>
        </div>

        <div class="legal-page__content prose">
            @foreach(__('legal.datenschutz.sections') as $section)
                <section class="legal-page__section" id="{{ $section['id'] }}">
                    <h2>{{ $section['title'] }}</h2>
                    {!! $section['body'] !!}
                </section>
            @endforeach
        </div>

        <div class="legal-page__footer-note">
            {!! __('legal.datenschutz.source_note') !!}
        </div>
    </div>
</section>
@endsection
