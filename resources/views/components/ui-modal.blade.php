@props([
  'id',
  'title' => '',
])

<div id="{{ $id }}" class="modal" aria-hidden="true">
    <div class="modal__backdrop" data-modal-close aria-hidden="true"></div>

    <div class="modal__panel" role="dialog" aria-modal="true" aria-label="{{ $title }}">
        <button class="modal__close" type="button" data-modal-close aria-label="Close">✕</button>

        <div class="modal__head">
            <div class="modal__title" data-modal-title>{{ $title }}</div>
        </div>

        <div class="modal__body" data-modal-body>
            {{ $slot }}
        </div>
    </div>
</div>
