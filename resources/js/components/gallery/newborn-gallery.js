export function initNewbornGallery() {
    const root = document.querySelector('[data-gallery]');
    if (!root) return;

    const track = root.querySelector('[data-gallery-track]');
    const prev = root.querySelector('[data-gallery-prev]');
    const next = root.querySelector('[data-gallery-next]');
    if (!track || !prev || !next) return;

    const getCells = () => Array.from(track.querySelectorAll('.newborn-gallery__cell'));

    const getGap = () => {
        const styles = window.getComputedStyle(track);
        return parseInt(styles.columnGap || styles.gap || '0', 10) || 0;
    };

    const getCellWidth = () => {
        const cell = track.querySelector('.newborn-gallery__cell');
        return cell ? cell.getBoundingClientRect().width : 400;
    };

    const getStep = () => getCellWidth() + getGap();

    // =========================
    // Infinite loop (seamless)
    // =========================
    let isLoopReady = false;
    let cloneCount = 0;
    let realCount = 0;
    let isJumping = false;

    const setupInfinite = () => {
        const cells = getCells();
        realCount = cells.length;

        // если мало слайдов — смысла нет
        if (realCount < 3) return;

        // сколько клонировать (достаточно 2-3, но зависит от ширины)
        cloneCount = Math.min(3, realCount);

        // чистим, если уже делали (на случай повторного init)
        if (track.dataset.loopReady === '1') return;

        const first = cells.slice(0, cloneCount);
        const last = cells.slice(-cloneCount);

        // prepend last clones
        last.forEach((cell) => {
            const c = cell.cloneNode(true);
            c.dataset.clone = '1';
            track.insertBefore(c, track.firstChild);
        });

        // append first clones
        first.forEach((cell) => {
            const c = cell.cloneNode(true);
            c.dataset.clone = '1';
            track.appendChild(c);
        });

        track.dataset.loopReady = '1';
        isLoopReady = true;

        // стартуем на первом "реальном" слайде (после prepended клонов)
        // перенос делаем после layout
        requestAnimationFrame(() => {
            const step = getStep();
            track.scrollLeft = step * cloneCount;
        });
    };

    const fixLoopIfNeeded = () => {
        if (!isLoopReady || isJumping) return;

        const step = getStep();
        const cellsNow = getCells();
        const totalCount = cellsNow.length;

        // границы "реального" диапазона
        const min = step * (cloneCount - 0.5);               // чуть раньше, чтобы не мигало
        const max = step * (cloneCount + realCount - 0.5);   // конец реального диапазона

        // если ушли в левую "зону клонов" — переносим вправо в конец реального
        if (track.scrollLeft < min) {
            isJumping = true;
            // переносим на аналогичное место в конце реального диапазона
            track.scrollLeft = track.scrollLeft + step * realCount;
            isJumping = false;
            return;
        }

        // если ушли в правую "зону клонов" — переносим в начало реального
        if (track.scrollLeft > max) {
            isJumping = true;
            track.scrollLeft = track.scrollLeft - step * realCount;
            isJumping = false;
        }
    };

    setupInfinite();

    // перехватываем scroll — чтобы чинить петлю
    track.addEventListener('scroll', () => {
        // на некоторых браузерах scroll может стрелять очень часто
        // лёгкая защита:
        requestAnimationFrame(fixLoopIfNeeded);
    });

    // =========================
    // Buttons
    // =========================
    const scrollBySlides = (dir) => {
        const step = getStep();
        track.scrollBy({ left: dir * step, behavior: 'smooth' });
    };

    prev.addEventListener('click', () => scrollBySlides(-1));
    next.addEventListener('click', () => scrollBySlides(1));

    // =========================
    // Mouse drag
    // =========================
    let isDown = false;
    let startX = 0;
    let startScrollLeft = 0;

    track.addEventListener('mousedown', (e) => {
        if (e.button !== 0) return;
        isDown = true;
        track.classList.add('is-dragging');
        startX = e.pageX;
        startScrollLeft = track.scrollLeft;
    });

    window.addEventListener('mouseup', () => {
        if (!isDown) return;
        isDown = false;
        track.classList.remove('is-dragging');
        // после окончания drag — поправим петлю
        fixLoopIfNeeded();
    });

    window.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const dx = e.pageX - startX;
        track.scrollLeft = startScrollLeft - dx * 1.4;
    });

    track.addEventListener('mouseleave', () => {
        if (!isDown) return;
        isDown = false;
        track.classList.remove('is-dragging');
        fixLoopIfNeeded();
    });

    // =========================
    // Resize: пересчитать step и корректно выставить позицию
    // =========================
    window.addEventListener('resize', () => {
        if (!isLoopReady) return;
        // просто вернёмся в "реальный" диапазон
        requestAnimationFrame(() => {
            const step = getStep();
            // если вдруг улетели — поправим
            fixLoopIfNeeded();
            // гарантируем стартовую зону
            if (track.scrollLeft < step * cloneCount) {
                track.scrollLeft = step * cloneCount;
            }
        });
    });
}
