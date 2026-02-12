export function initChaptersRotation() {
    const items = document.querySelectorAll('[data-cta-rotator]');
    if (!items.length) return;

    items.forEach((el) => {
        let images = [];
        try {
            const raw = el.dataset.images || '[]';
            images = JSON.parse(raw);
        } catch (e) {
            images = [];
        }

        console.log('[CTA ROTATOR] images:', images);

        if (!Array.isArray(images) || images.length === 0) return;

        // Если фон не задан — задаём первый
        if (!el.style.backgroundImage || el.style.backgroundImage === 'none') {
            el.style.backgroundImage = `url('${images[0]}')`;
        }

        if (images.length <= 1) return;

        const interval = parseInt(el.dataset.interval || '5000', 10);
        let index = 0;

        el.classList.add('cta-rotator');

        setInterval(() => {
            index = (index + 1) % images.length;
            const nextUrl = images[index];

            // fade-out
            el.classList.add('is-fading');

            // preload
            const img = new Image();
            img.src = nextUrl;

            img.onload = () => {
                window.setTimeout(() => {
                    el.style.backgroundImage = `url('${nextUrl}')`;
                    el.classList.remove('is-fading');
                }, 220);
            };

            img.onerror = () => {
                console.warn('[CTA ROTATOR] failed to load:', nextUrl);
                el.classList.remove('is-fading');
            };
        }, interval);
    });
}
