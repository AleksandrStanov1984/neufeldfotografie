function preload(url) {
    return new Promise((resolve) => {
        const img = new Image();
        img.onload = () => resolve(true);
        img.onerror = () => resolve(false);
        img.src = url;
    });
}

/**
 * Крутилка для <img data-rotator ...> (например, фото на странице Prices)
 * - если 0/1 фото -> не крутим
 * - если >1 -> меняем каждые data-interval (default 5000)
 */
function initImgRotators() {
    const imgs = document.querySelectorAll('img[data-rotator]');
    if (!imgs.length) return;

    imgs.forEach((imgEl) => {
        let urls = [];
        try {
            urls = JSON.parse(imgEl.getAttribute('data-images') || '[]');
        } catch (e) {
            urls = [];
        }

        const fallback = imgEl.getAttribute('data-fallback') || '';
        const interval = parseInt(imgEl.getAttribute('data-interval') || '5000', 10);

        // нормализуем список: только строки
        urls = Array.isArray(urls) ? urls.filter((u) => typeof u === 'string' && u.trim() !== '') : [];

        // если картинок нет — ставим fallback и выходим
        if (!urls.length) {
            if (fallback) imgEl.src = fallback;
            return;
        }

        // если одна — просто показываем, не крутим
        if (urls.length === 1) {
            imgEl.src = urls[0] || fallback || imgEl.src;
            return;
        }

        // если фото несколько — крутим
        let index = 0;
        imgEl.src = urls[0] || fallback || imgEl.src;

        setInterval(async () => {
            index = (index + 1) % urls.length;
            const nextUrl = urls[index] || fallback;
            if (!nextUrl) return;

            await preload(nextUrl);
            imgEl.src = nextUrl;
        }, interval);
    });
}

/**
 * ✅ NEW: крутилка для single background hero
 * Структура:
 * <section data-hero data-interval="5000">
 *   <div data-hero-bg style="background-image:url('...')"></div>
 *   <script type="application/json" data-hero-images>[...]</script>
 * </section>
 *
 * - если 0/1 фото -> не крутим
 * - если >1 -> меняем каждые data-interval (default 5000)
 */
function initSingleBgRotators() {
    const heroes = document.querySelectorAll('[data-hero]');
    if (!heroes.length) return;

    heroes.forEach((hero) => {
        const bg = hero.querySelector('[data-hero-bg]');
        const dataEl = hero.querySelector('script[data-hero-images]');
        if (!bg || !dataEl) return;

        let urls = [];
        try {
            urls = JSON.parse(dataEl.textContent || '[]');
        } catch (e) {
            urls = [];
        }

        urls = Array.isArray(urls) ? urls.filter((u) => typeof u === 'string' && u.trim() !== '') : [];

        // если 0/1 — не крутим
        if (urls.length <= 1) {
            if (urls[0]) bg.style.backgroundImage = `url("${urls[0]}")`;
            return;
        }

        const interval = parseInt(hero.getAttribute('data-interval') || '5000', 10);

        let index = 0;
        bg.style.backgroundImage = `url("${urls[0]}")`;

        setInterval(async () => {
            index = (index + 1) % urls.length;
            const nextUrl = urls[index];
            if (!nextUrl) return;

            await preload(nextUrl);
            bg.style.backgroundImage = `url("${nextUrl}")`;
        }, interval);
    });
}

export function initHeroRotator() {
    // сначала запускаем ротаторы для IMG
    initImgRotators();

    // ✅ NEW: single background hero (newborn)
    initSingleBgRotators();

    const sides = document.querySelectorAll('[data-hero-side]');
    if (!sides.length) return;

    const hero = document.querySelector('[data-hero]');
    const mq = window.matchMedia('(max-width: 900px)');

    const rotators = [];
    const allUrls = [];

    const buildLayers = (sideEl, urls, fallback) => {
        const list = Array.isArray(urls) && urls.length ? urls : (fallback ? [fallback] : []);

        sideEl.innerHTML = '';

        list.forEach((url, idx) => {
            const layer = document.createElement('div');
            layer.className = 'hero-layer' + (idx === 0 ? ' is-active' : '');
            layer.style.backgroundImage = `url("${url}")`;
            sideEl.appendChild(layer);
        });

        return list.length;
    };

    sides.forEach((sideEl) => {
        const fallback = sideEl.getAttribute('data-fallback') || '';
        let urls = [];

        try {
            urls = JSON.parse(sideEl.getAttribute('data-images') || '[]');
        } catch (e) {
            urls = [];
        }

        const count = buildLayers(sideEl, urls, fallback);

        (Array.isArray(urls) ? urls : []).forEach((u) => u && allUrls.push(u));

        rotators.push({
            el: sideEl,
            index: 0,
            count,
            fallback,
            urls: Array.isArray(urls) ? urls : [],
        });
    });

    const tickDesktop = async () => {
        for (const r of rotators) {
            if (r.el.getAttribute('data-hero-side') === 'mobile') continue;
            if (r.count <= 1) continue;

            const layers = r.el.querySelectorAll('.hero-layer');
            const nextIndex = (r.index + 1) % r.count;

            const nextLayer = layers[nextIndex];
            const nextUrl = r.urls[nextIndex] || r.fallback;
            if (nextUrl) await preload(nextUrl);

            layers[r.index]?.classList.remove('is-active');
            r.index = nextIndex;
            nextLayer?.classList.add('is-active');
        }
    };

    const mobileEl = hero?.querySelector('[data-hero-side="mobile"]');

    const uniq = (arr) => Array.from(new Set(arr.filter(Boolean)));
    const mobilePool = uniq(allUrls);

    let mobileIndex = 0;
    let mobileSide = 'left';

    const setMobileFrame = async () => {
        if (!hero || !mobileEl) return;

        const pool = mobilePool.length ? mobilePool : [rotators[0]?.fallback].filter(Boolean);
        if (!pool.length) return;

        const nextUrl = pool[mobileIndex % pool.length];
        mobileIndex++;

        mobileSide = mobileSide === 'left' ? 'right' : 'left';

        await preload(nextUrl);

        hero.classList.toggle('hero--mobile-left', mobileSide === 'left');
        hero.classList.toggle('hero--mobile-right', mobileSide === 'right');

        mobileEl.style.backgroundImage = `url("${nextUrl}")`;
    };

    let timer = null;

    const start = () => {
        if (timer) clearInterval(timer);

        if (mq.matches) {
            setMobileFrame();
            timer = setInterval(setMobileFrame, 5000);
        } else {
            timer = setInterval(tickDesktop, 5000);
        }
    };

    start();
    mq.addEventListener?.('change', start);
}
