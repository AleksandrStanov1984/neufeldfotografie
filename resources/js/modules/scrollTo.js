export function initScrollTo() {
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-scroll-to]');
        if (!btn) return;

        e.preventDefault();
        const sel = btn.getAttribute('data-scroll-to');
        const target = document.querySelector(sel);
        if (!target) return;

        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
}
