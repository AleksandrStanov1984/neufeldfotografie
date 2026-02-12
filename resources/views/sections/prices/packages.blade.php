<section class="prices-packages section" id="prices-packages" data-section="prices-packages">
    <div class="container">
        <header class="prices-packages__header">
            <div class="prices-packages__kicker">{{ __('pages/prices.kicker') }}</div>
            <h2 class="prices-packages__title">{{ __('pages/prices.section_title') }}</h2>
            <div class="prices-packages__line" aria-hidden="true"></div>
        </header>

        <div class="prices-grid">
            @php($cards = __('pages/prices.cards'))

            @include('partials.prices.card', ['id' => 'price-newborn-mini',   'card' => $cards['newborn_mini']])
            @include('partials.prices.card', ['id' => 'price-newborn-maxi',   'card' => $cards['newborn_maxi']])

            @include('partials.prices.card', ['id' => 'price-maternity-mini', 'card' => $cards['maternity_mini']])
            @include('partials.prices.card', ['id' => 'price-maternity-maxi', 'card' => $cards['maternity_maxi']])

            @include('partials.prices.card', ['id' => 'price-cakesmash',      'card' => $cards['cakesmash']])
        </div>

        @include('sections.prices.extras')
        @include('sections.prices.voucher')
    </div>
</section>
