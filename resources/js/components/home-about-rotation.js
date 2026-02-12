export function initHomeAboutRotation() {
    const img = document.querySelector('img[data-rotator="about-about"]');
    if (!img) return;

    let images = [];
    try {
        images = JSON.parse(img.dataset.images || '[]');
    } catch (e) {
        images = [];
    }

    const fallback = img.dataset.fallback || '';
    const interval = parseInt(img.dataset.interval || '5000', 10);

    // Если нет картинок — ставим fallback и выходим
    if (!images.length) {
        if (fallback) img.src = fallback;
        return;
    }

    // Если одна — просто показываем её
    if (images.length === 1) {
        img.src = images[0];
        return;
    }

    // Если много — ротация
    let i = 0;
    img.src = images[i];

    setInterval(() => {
        i = (i + 1) % images.length;

        // preload next
        const next = new Image();
        next.src = images[i];
        next.onload = () => { img.src = images[i]; };
    }, interval);
}
