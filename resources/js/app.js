import './bootstrap';

import { initModals } from './modules/modals';
import { initButtons } from './modules/buttons';
import { initForms } from './modules/forms';
import { initGalleryDropdown } from './modules/header';

import { initMobileNav } from './components/mobile-nav';
import { initHeroRotator } from './components/hero-rotator';
import { initFooterCarousel } from './components/footer-carousel';
import { initLangSwitcher } from "./components/lang-switcher.js";
import { initChaptersRotation } from './components/chapters-rotation';
import { initHomeAboutRotation } from './components/home-about-rotation';
import { initSectionAccordions } from "./components/section-accordion";

import { initBgRotator } from './components/about/components/bg-rotator';

import { initContactHeroRotator } from './components/contact/components/contact-hero-rotator';
import { initPricesHeroRotator } from './components/price/prices-hero-rotator';

import { initNewbornGallery } from './components/gallery/newborn-gallery';

document.addEventListener('DOMContentLoaded', () => {
    initModals();
    initButtons();
    initForms();
    initGalleryDropdown();

    initMobileNav();
    initHeroRotator();
    initFooterCarousel();
    initLangSwitcher();
    initChaptersRotation();
    initHomeAboutRotation();
    initSectionAccordions();

    initBgRotator();
    initContactHeroRotator();
    initPricesHeroRotator();

    initNewbornGallery();

    // header scroll state
    const header = document.querySelector('[data-hero-header]');
    if (header) {
        const onScroll = () => {
            header.classList.toggle('is-scrolled', window.scrollY > 8);
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }
});
