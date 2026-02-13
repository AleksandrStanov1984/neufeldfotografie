export function initGalleryDropdown() {
    const root = document.querySelector('[data-gallery-dd]');
    if (!root) return;

    const btn = root.querySelector('[data-gallery-dd-btn]');
    const menu = root.querySelector('[data-gallery-dd-menu]');
    if (!btn || !menu) return;

    const open = () => {
        menu.hidden = false;
        btn.setAttribute('aria-expanded', 'true');
    };

    const close = () => {
        menu.hidden = true;
        btn.setAttribute('aria-expanded', 'false');
    };

    const toggle = () => (menu.hidden ? open() : close());

    btn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        toggle();
    });

    // клик вне — закрыть
    document.addEventListener('click', (e) => {
        if (!root.contains(e.target)) close();
    });

    // Esc — закрыть
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') close();
    });

    // если кликаем по пункту — закрываем сразу
    menu.querySelectorAll('a').forEach((a) => {
        a.addEventListener('click', () => close());
    });
}
