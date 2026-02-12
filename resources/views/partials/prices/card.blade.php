@php
    // $id, $card
    $modalId = match($id) {
        'price-newborn-mini' => 'modal-price-newborn-mini',
        'price-newborn-maxi' => 'modal-price-newborn-maxi',
        'price-maternity-mini' => 'modal-price-maternity-mini',
        'price-maternity-maxi' => 'modal-price-maternity-maxi',
        'price-cakesmash' => 'modal-price-cakesmash',
        default => null,
    };
@endphp

<article class="price-card" id="{{ $id }}">
    <div class="price-card__top">
        <div class="price-card__badge">{{ $card['badge'] }}</div>
        <div class="price-card__price">{{ $card['price'] }}</div>
    </div>

    <h3 class="price-card__title">{{ $card['title'] }}</h3>

    <ul class="price-card__list">
        @foreach($card['short'] as $line)
            <li>{{ $line }}</li>
        @endforeach
    </ul>

   <button
       class="price-card__btn"
       type="button"

       @if($modalId)
           data-modal-open="modal-{{ $id }}">
       @endif

       {{ __('pages/prices.kicker') }}
   </button>
</article>
