/* ======================================================
   BUTTON ACTIONS — GLOBAL
   Source of Truth
====================================================== */

export function initButtons() {
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-action]');
        if (!btn) return;

        const action = btn.dataset.action;

        switch (action) {
            case 'scroll-to':
                handleScrollTo(btn);
                break;

            case 'open-modal':
                handleOpenModal(btn);
                break;

            case 'submit-form':
                handleSubmitForm(btn);
                break;

            default:
                console.warn(`Unknown button action: ${action}`);
        }
    });
}

/* ======================================================
   ACTIONS
====================================================== */

function handleScrollTo(btn) {
    const targetId = btn.dataset.target;
    if (!targetId) return;

    const target = document.getElementById(targetId);
    if (!target) return;

    target.scrollIntoView({
        behavior: 'smooth',
        block: 'start',
    });
}

function handleOpenModal(btn) {
    const modalId = btn.dataset.target;
    if (!modalId) return;

    const modal = document.getElementById(modalId);
    if (!modal) return;

    modal.classList.add('is-open');
}

function handleSubmitForm(btn) {
    const formId = btn.dataset.target;
    if (!formId) return;

    const form = document.getElementById(formId);
    if (!form) return;

    form.requestSubmit();
}
