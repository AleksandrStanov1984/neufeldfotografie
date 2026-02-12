export function initLangSwitcher() {
    const root = document.querySelector('[data-lang-switch]');
    if (!root) return;

    const btn = root.querySelector('[data-lang-btn]');
    const menu = root.querySelector('[data-lang-menu]');
    if (!btn || !menu) return;

    const close = () => {
        menu.hidden = true;
        btn.setAttribute('aria-expanded', 'false');
    };

    const open = () => {
        menu.hidden = false;
        btn.setAttribute('aria-expanded', 'true');
    };

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = btn.getAttribute('aria-expanded') === 'true';
        isOpen ? close() : open();
    });

    document.addEventListener('click', close);
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') close();
    });
}
