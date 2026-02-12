@php($cards = __('pages/prices.cards'))

@include('modals.price', [
    'id' => 'modal-price-newborn-mini',
    'title' => $cards['newborn_mini']['modal_title'],
    'lines' => $cards['newborn_mini']['modal_body'],
])

@include('modals.price', [
    'id' => 'modal-price-newborn-maxi',
    'title' => $cards['newborn_maxi']['modal_title'],
    'lines' => $cards['newborn_maxi']['modal_body'],
])

@include('modals.price', [
    'id' => 'modal-price-maternity-mini',
    'title' => $cards['maternity_mini']['modal_title'],
    'lines' => $cards['maternity_mini']['modal_body'],
])

@include('modals.price', [
    'id' => 'modal-price-maternity-maxi',
    'title' => $cards['maternity_maxi']['modal_title'],
    'lines' => $cards['maternity_maxi']['modal_body'],
])

@include('modals.price', [
    'id' => 'modal-price-cakesmash',
    'title' => $cards['cakesmash']['modal_title'],
    'lines' => $cards['cakesmash']['modal_body'],
])
