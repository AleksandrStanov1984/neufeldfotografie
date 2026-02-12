@props([
'id',
'title' => null,
])

<div id="{{ $id }}" class="modal" role="dialog" aria-modal="true" aria-labelledby="{{ $id }}-title">
    <div class="modal__backdrop"></div>

    <div class="modal__panel">
        <div class="modal__header">
            @if($title)
                <div class="modal__title" id="{{ $id }}-title">{{ $title }}</div>
            @endif

            <button class="modal__close btn btn--ghost btn--sm" type="button" data-modal-close aria-label="Close">
                ✕
            </button>
        </div>

        <div class="modal__body">
            {{ $slot }}
        </div>
    </div>
</div>

