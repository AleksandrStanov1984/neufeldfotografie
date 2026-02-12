function preload(url) {
    return new Promise((resolve) => {
        const img = new Image();
        img.onload = () => resolve(true);
        img.onerror = () => resolve(false);
        img.src = encodeURI(url);
    });
}

export function initBgRotator() {
    const items = document.querySelectorAll('[data-bg-rotator]');
    if (!items.length) return;

    items.forEach((el) => {
        const fallback = el.dataset.fallback || '';
        const interval = parseInt(el.dataset.interval || '5000', 10);

        let images = [];
        try {
            images = JSON.parse(el.dataset.images || '[]');
        } catch (e) {
            images = [];
        }

        const list = (Array.isArray(images) && images.length)
            ? images
            : (fallback ? [fallback] : []);

        if (list.length <= 1) return;

        let i = 0;

        setInterval(async () => {
            i = (i + 1) % list.length;
            const next = list[i];

            el.classList.add('is-fading');
            await preload(next);

            window.setTimeout(() => {
                el.style.backgroundImage = `url("${encodeURI(next)}")`;
                el.classList.remove('is-fading');
            }, 220);

        }, interval);
    });
}
