<section class="gallery-grid" data-gallery>
    <div class="gallery-grid__inner">
        <h2 class="gallery-grid__heading">{{ $heading }}</h2>

        <div class="gallery-grid__masonry">
            @foreach(($images ?? []) as $i => $img)
                <button class="gallery-card"
                        type="button"
                        data-gallery-open
                        data-src="{{ asset($img) }}"
                        aria-label="Open image {{ $i + 1 }}">
                    <img src="{{ asset($img) }}" alt="" loading="lazy">
                </button>
            @endforeach
        </div>
    </div>

    {{-- MODAL --}}
    <div class="gallery-modal" data-gallery-modal hidden>
        <div class="gallery-modal__backdrop" data-gallery-close></div>

        <div class="gallery-modal__panel" role="dialog" aria-modal="true">
            <button class="gallery-modal__close" type="button" data-gallery-close aria-label="Close">×</button>
            <img class="gallery-modal__img" data-gallery-modal-img src="" alt="">
        </div>
    </div>
</section>
