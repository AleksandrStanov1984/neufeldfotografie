export function initContactHeroRotator() {
    const root = document.querySelector('[data-contact-hero]');
    if (!root) return;

    const left = root.querySelector('.contact-hero__left');
    if (!left) return;

    let images = [];
    try {
        images = JSON.parse(root.dataset.images || '[]');
    } catch (e) {
        images = [];
    }

    if (!Array.isArray(images) || images.length === 0) return;

    let index = 0;
    left.style.backgroundImage = `url("${images[index]}")`;

    if (images.length === 1) return;

    setInterval(() => {
        index = (index + 1) % images.length;
        left.style.backgroundImage = `url("${images[index]}")`;
    }, 5000);
}
