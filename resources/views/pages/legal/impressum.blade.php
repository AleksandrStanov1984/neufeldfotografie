@extends('layouts.app')

@php($seoKey = 'impressum')

@section('content')
<section class="legal-page section">
    <div class="container legal-page__container">
        <header class="legal-page__header">
            <div class="legal-page__kicker">{{ __('legal.impressum.kicker') }}</div>
            <h1 class="legal-page__title">{{ __('legal.impressum.title') }}</h1>

            @if(!empty(__('legal.impressum.updated')))
                <div class="legal-page__meta">{{ __('legal.impressum.updated') }}</div>
            @endif

            <div class="legal-page__line" aria-hidden="true"></div>
        </header>

        {{-- ✅ TOC как в Datenschutz --}}
        @if(!empty(__('legal.impressum.toc_title')) && is_array(__('legal.impressum.toc')) && count(__('legal.impressum.toc')))
            <div class="legal-page__toc">
                <h2 class="legal-page__toc-title">{{ __('legal.impressum.toc_title') }}</h2>
                <div class="legal-page__toc-grid">
                    @foreach(__('legal.impressum.toc') as $item)
                        <a class="legal-page__toc-link" href="#{{ $item['id'] }}">{{ $item['label'] }}</a>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="legal-page__content prose">
            @foreach(__('legal.impressum.sections') as $section)
                <section class="legal-page__section" id="{{ $section['id'] }}">
                    <h2>{{ $section['title'] }}</h2>
                    {!! $section['body'] !!}
                </section>
            @endforeach
        </div>
    </div>
</section>
@endsection
