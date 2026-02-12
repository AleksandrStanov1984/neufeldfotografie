export function initModals() {
    let scrollY = 0;

    const lockScroll = () => {
        scrollY = window.scrollY || 0;
        document.body.style.position = 'fixed';
        document.body.style.top = `-${scrollY}px`;
        document.body.style.left = '0';
        document.body.style.right = '0';
        document.body.style.width = '100%';


    };

    const unlockScroll = () => {
        document.body.style.position = '';
        document.body.style.top = '';
        document.body.style.left = '';
        document.body.style.right = '';
        document.body.style.width = '';
        window.scrollTo(0, scrollY);
    };

    const openModal = (id) => {
        const el = document.getElementById(id);
        if (!el) return;
        el.classList.add('is-open');
        lockScroll();
    };

    const closeModal = (modalEl) => {
        if (!modalEl) return;
        modalEl.classList.remove('is-open');
        unlockScroll();
    };

    document.addEventListener('click', (e) => {
        const open = e.target.closest('[data-modal-open]');
        if (open) {
            e.preventDefault();
            const raw = open.getAttribute('data-modal-open');
            console.log('open id raw:', raw);
            console.log('exists?', document.getElementById(raw));


            openModal(open.getAttribute('data-modal-open'));

            console.log('AAAAAAAAAAAAAAAAAA');
            return;
        }

        const closeBtn = e.target.closest('[data-modal-close]');
        if (closeBtn) {
            e.preventDefault();
            closeModal(closeBtn.closest('.modal'));


            return;
        }

        // клик по backdrop закрывает
        if (e.target.classList.contains('modal__backdrop')) {
            closeModal(e.target.closest('.modal'));
            return;
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key !== 'Escape') return;
        const opened = document.querySelector('.modal.is-open');
        if (opened) closeModal(opened);
    });
}
