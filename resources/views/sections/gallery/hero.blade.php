@php
  $heroImage = $heroImage ?? null;
@endphp

<section class="gallery-hero">
    <div class="gallery-hero__bg"
         style="background-image: url('{{ $heroImage ? asset($heroImage) : asset('assets/images/fallback.png') }}');">
    </div>

    <div class="gallery-hero__overlay" aria-hidden="true"></div>

    <div class="gallery-hero__content">
        <h1 class="gallery-hero__title">{{ $title }}</h1>
        <div class="gallery-hero__subtitle">{{ $subtitle }}</div>
    </div>
</section>
