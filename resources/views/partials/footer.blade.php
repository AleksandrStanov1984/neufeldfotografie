@php
    $legalLinks = [
        ['route' => 'datenschutz', 'label' => __('footer.privacy')],
        ['route' => 'impressum', 'label' => __('footer.impressum')],
        ['route' => 'agb', 'label' => __('footer.agb')],
    ];
@endphp

<footer class="site-footer">

    {{-- TOP: LEFT(SEO centered) | divider | RIGHT(menu) --}}
    <div class="footer-top">
        <div class="footer-top__inner">

            <div class="footer-left">
                <div class="footer-seo">{{ __('footer.seo') }}</div>
            </div>

            <div class="footer-divider" aria-hidden="true"></div>

            <div class="footer-right">
                <nav class="footer-menu" aria-label="Footer">

                    <a href="{{ route('home') }}">{{ __('footer.menu.home') }}</a>

                    <a href="{{ route('contact') }}">{{ __('footer.menu.contact') }}</a>

                    <a href="{{ route('price') }}">{{ __('footer.menu.prices') }}</a>

                    <a href="{{ route('babybauch') }}">{{ __('footer.menu.babybauch') }}</a>

                    <a href="{{ route('cake_smash') }}">{{ __('footer.menu.cake_smash') }}</a>

                    <a href="{{ route('newborn') }}">{{ __('footer.menu.newborn') }}</a>

                    <span aria-hidden="true"></span>
                </nav>
            </div>

        </div>
    </div>

    {{-- SOCIALS --}}
    <div class="footer-social-row">
        <div class="footer-social-row__inner">
            <div class="footer-socials">
                @foreach($footerSocials as $social)
                    @continue(empty($social['url']) || empty($social['icon_url']))

                    <a href="{{ $social['url'] }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="{{ $social['label'] ?? '' }}">
                        <img src="{{ $social['icon_url'] }}" alt="{{ $social['label'] ?? '' }}" loading="lazy">
                    </a>
                @endforeach
            </div>
        </div>
    </div>


    {{-- GALLERY --}}
    <div class="footer-gallery {{ $footerHasCarousel ? 'is-carousel' : 'is-static' }}" data-footer-gallery>
        <div class="footer-gallery-wrap">
            <div class="footer-gallery__track">
                @foreach($footerImages as $img)
                    <div class="footer-gallery__item">
                        <img src="{{ $img }}" alt="" loading="lazy">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- BOTTOM --}}
   <div class="footer-bottom">
       <div class="footer-bottom__inner">

           <div class="footer-bottom__left">
               <span>© {{ date('Y') }}</span>
               <span class="dot">•</span>
               <span>{{ __('footer.crafted_by') }}</span>
               <a href="{{ route('author') }}">{{ __('footer.author') }}</a>
           </div>

           <div class="footer-bottom__right">
               @foreach($legalLinks as $index => $link)
                   <a href="{{ route($link['route']) }}">
                       {{ $link['label'] }}
                   </a>

                   @if(!$loop->last)
                       <span class="dot">•</span>
                   @endif
               @endforeach
           </div>


       </div>
   </div>


</footer>
