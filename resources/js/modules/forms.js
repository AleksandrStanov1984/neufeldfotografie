/* ======================================================
   FORMS — GLOBAL HANDLER
   Validation + states + async submit
====================================================== */

export function initForms() {
    document.addEventListener('submit', async (e) => {
        const form = e.target.closest('form[data-form]');
        if (!form) return;

        e.preventDefault();

        // reset UI
        clearFormErrors(form);
        setFormMessage(form, '', ''); // clear
        setFormState(form, 'idle');

        // client-side validation
        const validation = validateForm(form);
        if (!validation.ok) {
            showValidationErrors(form, validation.errors);
            setFormState(form, 'error');
            setFormMessage(form, validation.message || 'Bitte prüfen Sie die Felder.', 'error');
            return;
        }

        // submit
        const submitBtn = getSubmitButton(form);
        setButtonState(submitBtn, 'loading');

        try {
            const url = form.getAttribute('action') || window.location.href;
            const method = (form.getAttribute('method') || 'POST').toUpperCase();

            const payload = new FormData(form);

            const res = await fetch(url, {
                method,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken(),
                },
                body: payload,
            });

            const data = await safeJson(res);

            if (!res.ok) {
                // Laravel validation errors => 422
                if (res.status === 422 && data?.errors) {
                    applyServerErrors(form, data.errors);
                    setFormState(form, 'error');
                    setFormMessage(form, data.message || 'Bitte prüfen Sie die Felder.', 'error');
                    setButtonState(submitBtn, 'idle');
                    return;
                }

                throw new Error(data?.message || `Request failed: ${res.status}`);
            }

            // success
            setFormState(form, 'success');
            setFormMessage(form, data?.message || 'Danke! Nachricht wurde gesendet.', 'success');
            setButtonState(submitBtn, 'success');

            // optional: reset form after success
            form.reset();

            // optional: auto close modal if inside
            const modal = form.closest('.modal');
            if (modal) {
                setTimeout(() => modal.classList.remove('is-open'), 900);
            }

            // return button to idle after short delay
            setTimeout(() => setButtonState(submitBtn, 'idle'), 1400);

        } catch (err) {
            console.error(err);
            setFormState(form, 'error');
            setFormMessage(form, 'Es ist ein Fehler aufgetreten. Bitte versuchen Sie es später erneut.', 'error');
            setButtonState(submitBtn, 'idle');
        }
    });
}

/* =========================
   Validation
========================= */

function validateForm(form) {
    const errors = {};
    const fields = Array.from(form.querySelectorAll('[name]'));

    for (const el of fields) {
        if (el.disabled) continue;

        const name = el.getAttribute('name');
        const value = (el.value ?? '').trim();

        // required
        if (el.hasAttribute('required') && !value) {
            errors[name] = 'Dieses Feld ist erforderlich.';
            continue;
        }

        // email
        if (el.dataset.type === 'email' || el.getAttribute('type') === 'email') {
            if (value && !isValidEmail(value)) {
                errors[name] = 'Bitte geben Sie eine gültige E-Mail ein.';
            }
        }

        // min length
        if (el.dataset.minlen) {
            const min = Number(el.dataset.minlen);
            if (value && value.length < min) {
                errors[name] = `Mindestens ${min} Zeichen.`;
            }
        }
    }

    const ok = Object.keys(errors).length === 0;
    return {
        ok,
        errors,
        message: ok ? '' : 'Bitte korrigieren Sie die markierten Felder.',
    };
}

/* =========================
   UI helpers
========================= */

function applyServerErrors(form, errorsObj) {
    // errorsObj: { field: [msg1, msg2], ... }
    for (const [field, msgs] of Object.entries(errorsObj)) {
        const msg = Array.isArray(msgs) ? msgs[0] : String(msgs);
        setFieldError(form, field, msg);
    }
}

function showValidationErrors(form, errors) {
    for (const [field, msg] of Object.entries(errors)) {
        setFieldError(form, field, msg);
    }
}

function setFieldError(form, field, message) {
    const input = form.querySelector(`[name="${cssEscape(field)}"]`);
    if (input) input.classList.add('is-invalid');

    const errBox = form.querySelector(`[data-error-for="${cssEscape(field)}"]`);
    if (errBox) {
        errBox.textContent = message;
        errBox.classList.add('is-visible');
    }
}

function clearFormErrors(form) {
    form.querySelectorAll('.is-invalid').forEach((el) => el.classList.remove('is-invalid'));
    form.querySelectorAll('[data-error-for].is-visible').forEach((el) => {
        el.textContent = '';
        el.classList.remove('is-visible');
    });
}

function setFormMessage(form, text, type /* success|error|info|'' */) {
    const box = form.querySelector('[data-form-message]');
    if (!box) return;

    box.textContent = text || '';
    box.classList.remove('is-success', 'is-error', 'is-info');

    if (!text) return;
    if (type === 'success') box.classList.add('is-success');
    if (type === 'error') box.classList.add('is-error');
    if (type === 'info') box.classList.add('is-info');
}

function setFormState(form, state /* idle|loading|success|error */) {
    form.dataset.state = state;
}

function getSubmitButton(form) {
    return form.querySelector('[data-submit]') || form.querySelector('button[type="submit"]');
}

/* =========================
   Button state (reused)
========================= */

function setButtonState(btn, state /* idle|loading|success */) {
    if (!btn) return;

    btn.classList.remove('is-loading', 'is-success');
    btn.removeAttribute('aria-busy');

    if (state === 'loading') {
        btn.classList.add('is-loading');
        btn.setAttribute('aria-busy', 'true');
        return;
    }

    if (state === 'success') {
        btn.classList.add('is-success');
    }
}

/* =========================
   Utils
========================= */

function getCsrfToken() {
    const meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.getAttribute('content') : '';
}

async function safeJson(res) {
    try { return await res.json(); } catch { return null; }
}

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function cssEscape(value) {
    // minimal escape for attribute selectors
    return String(value).replace(/"/g, '\\"');
}
