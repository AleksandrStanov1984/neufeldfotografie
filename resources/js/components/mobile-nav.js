export function initMobileNav() {
    const openBtn = document.querySelector('[data-nav-open]');
    const nav = document.querySelector('[data-nav]');

    if (!openBtn || !nav) return;

    const isOpen = () => nav.classList.contains('is-open');

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

    openBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        if (isOpen()) close();
        else open();
    });

    // click inside panel must NOT close
    nav.addEventListener('click', (e) => e.stopPropagation());

    // click outside closes
    document.addEventListener('click', () => {
        if (isOpen()) close();
    });

    // Esc closes
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isOpen()) close();
    });

    // optional: click on link closes
    nav.querySelectorAll('a').forEach(a => a.addEventListener('click', close));
}
