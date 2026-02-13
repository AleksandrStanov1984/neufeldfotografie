document.addEventListener('DOMContentLoaded', () => {
    const root = document.querySelector('[data-gallery]');
    if (!root) return;

    const modal = root.querySelector('[data-gallery-modal]');
    const modalImg = root.querySelector('[data-gallery-modal-img]');
    const openBtns = root.querySelectorAll('[data-gallery-open]');
    const closeEls = root.querySelectorAll('[data-gallery-close]');

    let lastActive = null;

    function openModal(src) {
        lastActive = document.activeElement;
        modalImg.src = src;
        modal.hidden = false;
        document.documentElement.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.hidden = true;
        modalImg.src = '';
        document.documentElement.style.overflow = '';
        if (lastActive && typeof lastActive.focus === 'function') lastActive.focus();
    }

    openBtns.forEach(btn => {
        btn.addEventListener('click', () => openModal(btn.dataset.src));
    });

    closeEls.forEach(el => el.addEventListener('click', closeModal));

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal && !modal.hidden) closeModal();
    });
});
