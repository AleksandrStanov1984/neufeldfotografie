function closePanel(btn, panel) {
    btn.setAttribute("aria-expanded", "false");
    panel.style.height = panel.scrollHeight + "px";
    panel.offsetHeight;
    panel.style.height = "0px";

    const onEnd = () => {
        panel.hidden = true;
        panel.style.height = "";
        panel.removeEventListener("transitionend", onEnd);
    };
    panel.addEventListener("transitionend", onEnd);
}

function openPanel(btn, panel) {
    btn.setAttribute("aria-expanded", "true");
    panel.hidden = false;

    panel.style.height = "0px";
    panel.offsetHeight;
    panel.style.height = panel.scrollHeight + "px";

    const onEnd = () => {
        panel.style.height = "";
        panel.removeEventListener("transitionend", onEnd);
    };
    panel.addEventListener("transitionend", onEnd);
}

export function initSectionAccordions() {
    document.querySelectorAll("[data-accordion-section]").forEach((root) => {
        const btn = root.querySelector("[data-acc-btn]");
        const panel = root.querySelector("[data-acc-panel]");
        if (!btn || !panel) return;

        // initial open
        btn.setAttribute("aria-expanded", "true");
        panel.hidden = false;

        btn.addEventListener("click", () => {
            const expanded = btn.getAttribute("aria-expanded") === "true";
            if (expanded) closePanel(btn, panel);
            else openPanel(btn, panel);
        });
    });
}
