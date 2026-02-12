@props([
    // items: [ ['title' => '...', 'content' => '<p>..</p>'], ... ]
    'items' => [],
    // unique id prefix (если на странице несколько аккордеонов)
    'id' => 'acc',
    // allow multiple items open at once
    'multiple' => false,
])

@php
    $accordionId = $id;
@endphp

<div class="sa-accordion"
     data-accordion
     data-accordion-multiple="{{ $multiple ? '1' : '0' }}"
     data-accordion-id="{{ $accordionId }}">
    @foreach($items as $index => $item)
        @php
            $btnId = $accordionId . '-btn-' . $index;
            $panelId = $accordionId . '-panel-' . $index;
            $title = $item['title'] ?? '';
            $content = $item['content'] ?? '';
        @endphp

        <div class="sa-acc-item" data-acc-item>
            <button
                class="sa-acc-btn"
                type="button"
                id="{{ $btnId }}"
                aria-controls="{{ $panelId }}"
                aria-expanded="false"
                data-acc-btn>
                <span class="sa-acc-title">{{ $title }}</span>
                <span class="sa-acc-icon" aria-hidden="true"></span>
            </button>

            <div
                class="sa-acc-panel"
                id="{{ $panelId }}"
                role="region"
                aria-labelledby="{{ $btnId }}"
                hidden
                data-acc-panel>
                <div class="sa-acc-content">
                    {!! $content !!}
                </div>
            </div>
        </div>
    @endforeach
</div>
