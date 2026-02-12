@extends('layouts.app')

@php($seoKey = 'agb')

@section('content')
<section class="legal-page section">
    <div class="container legal-page__container">
        <header class="legal-page__header">
            <div class="legal-page__kicker">{{ __('legal.agb.kicker') }}</div>
            <h1 class="legal-page__title">{{ __('legal.agb.title') }}</h1>
            <div class="legal-page__line" aria-hidden="true"></div>
        </header>

        <div class="legal-page__toc">
            <h2 class="legal-page__toc-title">{{ __('legal.agb.toc_title') }}</h2>
            <div class="legal-page__toc-grid">
                @foreach(__('legal.agb.toc') as $item)
                    <a class="legal-page__toc-link" href="#{{ $item['id'] }}">{{ $item['label'] }}</a>
                @endforeach
            </div>
        </div>

        <div class="legal-page__content prose">
            @foreach(__('legal.agb.sections') as $section)
                <section class="legal-page__section" id="{{ $section['id'] }}">
                    <h2>{{ $section['title'] }}</h2>
                    {!! $section['body'] !!}
                </section>
            @endforeach
        </div>
    </div>
</section>
@endsection
