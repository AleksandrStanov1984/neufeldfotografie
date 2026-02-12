@php
    $images = $storiesImages ?? [];
    $links  = $storiesLinks ?? [];
    $fallback = asset('assets/images/fallback.png');
@endphp


<section class="home-stories" data-section="home-stories" aria-labelledby="home-stories-title">
    <div class="home-stories__inner">

        <h2 class="home-stories__title" id="home-stories-title">
            {{ __('components/sections/stories.title') }}
        </h2>

        <p class="home-stories__subtitle">{{ __('components/sections/stories.subtitle') }}</p>

        {{-- optional SEO line --}}
        {{-- <p class="home-stories__desc">{{ __('components/sections/stories.desc') }}</p> --}}

        <div class="home-stories__hr" aria-hidden="true"></div>

        <div class="home-stories__grid" role="list">
            @for($i = 0; $i < 3; $i++)
                @php
                    $img   = $images[$i] ?? $fallback;
                    $title = __('components/sections/stories.items.' . $i . '.title');
                    $href  = $links[$i] ?? '#';
                @endphp

                <a class="home-stories__card"
                   href="{{ $href }}"
                   role="listitem"
                   aria-label="{{ $title }}">

                    <div class="home-stories__img">
                        <img
                            src="{{ $img }}"
                            alt="{{ $title }}"
                            loading="lazy"
                            decoding="async"
                            fetchpriority="low"
                            width="800"
                            height="1000"
                            style="height:auto;"
                        >
                    </div>

                    <div class="home-stories__caption">
                        <div class="home-stories__name">{{ $title }}</div>
                    </div>
                </a>

                   @if($i < 2)
                        <div class="home-stories__vdiv" aria-hidden="true" role="presentation"></div>
                    @endif
                @endfor

        </div>

        <div class="home-stories__hr home-stories__hr--bottom" aria-hidden="true"></div>

    </div>
</section>
