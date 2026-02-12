export function initPricesHeroRotator() {
    const wrap = document.querySelector('[data-prices-rotator]');
    if (!wrap) return;

    let images = [];
    try {
        images = JSON.parse(wrap.dataset.images || '[]');
    } catch {
        images = [];
    }

    const fallback = wrap.dataset.fallback;
    const interval = parseInt(wrap.dataset.interval || 5000);

    if (!images.length && fallback) {
        images = [fallback];
    }

    if (images.length <= 1) return;

    const imgs = wrap.querySelectorAll('.prices-hero__image');
    let active = 0;
    let index = 1;

    setInterval(() => {
        const next = index % images.length;
        const nextImg = imgs[1 - active];

        nextImg.src = images[next];

        nextImg.onload = () => {
            imgs[active].classList.remove('is-active');
            nextImg.classList.add('is-active');
            active = 1 - active;
        };

        index++;
    }, interval);
}
