@props(['id', 'title', 'lines'])

<div class="modal modal--pretty" id="{{ $id }}" aria-hidden="true">
    <div class="modal__backdrop" data-modal-close></div>

    <div class="modal__panel" role="dialog" aria-modal="true" aria-labelledby="{{ $id }}-title">
        <button class="modal__close" type="button" aria-label="Close" data-modal-close>×</button>

        <div class="modal__content">
            <div class="modal__kicker">Preise & Pakete</div>
            <h2 class="modal__title" id="{{ $id }}-title">{{ $title }}</h2>
            <div class="modal__line" aria-hidden="true"></div>

            <div class="modal__body">
                <ul class="modal__list">
                    @foreach($lines as $line)
                        <li>{{ $line }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
