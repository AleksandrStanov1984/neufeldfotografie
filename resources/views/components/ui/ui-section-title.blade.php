@php
    $headingTag = in_array($tag, ['h1','h2','h3','h4','h5','h6']) ? $tag : 'h2';
@endphp

@if($resolvedTitle())
    <{{ $headingTag }}
        @if($id) id="{{ $id }}" @endif
        {{ $attributes->merge(['class' => 'ui-section-title']) }}
    >
        {{ $resolvedTitle() }}
    </{{ $headingTag }}>
@endif

@if($resolvedSubtitle())
    <div class="ui-section-subtitle">
        {{ $resolvedSubtitle() }}
    </div>
@endif
