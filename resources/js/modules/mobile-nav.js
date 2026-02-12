export function initMobileNav() {
    const openBtn = document.querySelector('[data-nav-open]');
    const closeBtn = document.querySelector('[data-nav-close]');
    const nav = document.querySelector('[data-nav]');
    if (!openBtn || !closeBtn || !nav) return;

    const open = () => {
        nav.classList.add('is-open');
        document.body.classList.add('nav-open');
        openBtn.setAttribute('aria-expanded', 'true');
        nav.setAttribute('aria-hidden', 'false');
    };

    const close = () => {
        nav.classList.remove('is-open');
        document.body.classList.remove('nav-open');
        openBtn.setAttribute('aria-expanded', 'false');
        nav.setAttribute('aria-hidden', 'true');
    };

    openBtn.addEventListener('click', open);
    closeBtn.addEventListener('click', close);

    // ESC to close
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && nav.classList.contains('is-open')) close();
    });

    // click any link closes
    nav.querySelectorAll('a').forEach(a => a.addEventListener('click', close));
}
