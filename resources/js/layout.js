const SIDEBAR_STORAGE_KEY = 'sidebar-collapsed';
const THEME_STORAGE_KEY = 'theme';
const THEME_NAME_STORAGE_KEY = 'theme-name';
const AVAILABLE_THEME_NAMES = ['default', 'blue', 'green', 'corporate', 'danger'];
const MONOCHROME_STORAGE_KEY = 'theme-monochrome';
const DESKTOP_QUERY = '(min-width: 1024px)';
let globalListenersBound = false;
let sidebarDefaultMinimized = false;

function isDesktop() {
    return window.matchMedia(DESKTOP_QUERY).matches;
}

function captureDefaultSidebarMinimized() {
    // O <body> é recriado a cada navegação via wire:navigate, então o
    // padrão vindo do SSR precisa ser recapturado a cada troca de página.
    sidebarDefaultMinimized = document.body.dataset.appSidebarMinimized === 'true';

    return sidebarDefaultMinimized;
}

function getSidebarMinimizedPreference() {
    const storedPreference = localStorage.getItem(SIDEBAR_STORAGE_KEY);

    if (storedPreference !== null) {
        return storedPreference === 'true';
    }

    return sidebarDefaultMinimized;
}

function isSidebarMinimized() {
    return document.body.dataset.appSidebarMinimized === 'true';
}

function setSidebarMinimized(minimized, persist = true) {
    document.body.dataset.appSidebarMinimized = minimized ? 'true' : 'false';

    if (persist) {
        localStorage.setItem(SIDEBAR_STORAGE_KEY, String(minimized));
    }
}

function setSidebarMobileOpen(open) {
    document.documentElement.toggleAttribute('data-sidebar-mobile-open', open);
}

function applySidebarState() {
    // Captura o padrão declarado no <body> antes de qualquer ajuste de viewport
    captureDefaultSidebarMinimized();
    setSidebarMinimized(isDesktop() && getSidebarMinimizedPreference(), false);
    setSidebarMobileOpen(false);
}

function bindGlobalListeners() {
    if (globalListenersBound) {
        return;
    }

    document.addEventListener('click', (event) => {
        const sidebarToggle = event.target.closest('[data-sidebar-toggle]');
        if (sidebarToggle) {
            if (isDesktop()) {
                setSidebarMinimized(!isSidebarMinimized());
            } else {
                setSidebarMobileOpen(!document.documentElement.hasAttribute('data-sidebar-mobile-open'));
            }

            return;
        }

        const sidebarOverlay = event.target.closest('[data-sidebar-overlay]');
        if (sidebarOverlay) {
            setSidebarMobileOpen(false);
            return;
        }

        // No mobile, fechar o drawer ao navegar por um link do menu.
        const sidebarLink = event.target.closest('.app-menu a[href]');
        if (sidebarLink && ! isDesktop()) {
            setSidebarMobileOpen(false);
        }

        const themeToggle = event.target.closest('[data-theme-toggle]');
        if (themeToggle) {
            const next = document.documentElement.classList.contains('dark') ? 'light' : 'dark';
            localStorage.setItem(THEME_STORAGE_KEY, next);
            applyTheme(next);
            return;
        }

        const themeNameOption = event.target.closest('[data-theme-name]');
        if (themeNameOption) {
            const name = themeNameOption.dataset.themeName;
            localStorage.setItem(THEME_NAME_STORAGE_KEY, name);
            applyThemeName(name);
            return;
        }

        const monochromeToggle = event.target.closest('[data-monochrome-toggle]');
        if (monochromeToggle) {
            const next = !document.documentElement.classList.contains('monochrome');
            localStorage.setItem(MONOCHROME_STORAGE_KEY, String(next));
            applyMonochrome(next);
            return;
        }

        const fullscreenToggle = event.target.closest('[data-fullscreen-toggle]');
        if (fullscreenToggle) {
            if (document.fullscreenElement) {
                document.exitFullscreen();
            } else {
                document.documentElement.requestFullscreen();
            }

            return;
        }

        const scrollToTop = event.target.closest('[data-scroll-to-top]');
        if (scrollToTop) {
            window.scrollTo({
                top: 0,
                behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth',
            });
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            setSidebarMobileOpen(false);
        }
    });

    window.matchMedia(DESKTOP_QUERY).addEventListener('change', (event) => {
        setSidebarMobileOpen(false);
        setSidebarMinimized(event.matches && getSidebarMinimizedPreference(), false);
    });

    window.addEventListener('scroll', updateScrollToTop, { passive: true });
    window.addEventListener('resize', updateScrollToTop);

    globalListenersBound = true;
}

function applyTheme(theme) {
    document.documentElement.classList.toggle('dark', theme === 'dark');
}

function initTheme() {
    const stored = localStorage.getItem(THEME_STORAGE_KEY);
    const preferred = stored ?? (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    applyTheme(preferred);
}

function applyThemeName(name) {
    if (name === 'default') {
        delete document.documentElement.dataset.theme;
    } else {
        document.documentElement.dataset.theme = name;
    }
}

function initThemeName() {
    const stored = localStorage.getItem(THEME_NAME_STORAGE_KEY);
    applyThemeName(AVAILABLE_THEME_NAMES.includes(stored) ? stored : 'default');
}

function applyMonochrome(enabled) {
    document.documentElement.classList.toggle('monochrome', enabled);

    const toggle = document.querySelector('[data-monochrome-toggle]');
    if (toggle) {
        toggle.setAttribute('aria-pressed', String(enabled));
    }
}

function initMonochrome() {
    applyMonochrome(localStorage.getItem(MONOCHROME_STORAGE_KEY) === 'true');
}

function initFullscreen() {
    //
}

const SCROLL_TO_TOP_BOTTOM_GAP = 20;

function updateScrollToTop() {
    // Elementos são recriados a cada navegação via wire:navigate, então são
    // buscados no momento da chamada em vez de capturados por closure.
    const scrollToTopButton = document.querySelector('[data-scroll-to-top]');

    if (!scrollToTopButton) {
        return;
    }

    const isVisible = window.scrollY > 0;

    scrollToTopButton.classList.toggle('hidden', !isVisible);
    scrollToTopButton.classList.toggle('flex', isVisible);

    // Mantém a setinha logo acima do footer (estático ou fixo), sem tapá-lo
    let bottom = SCROLL_TO_TOP_BOTTOM_GAP;

    const footer = document.querySelector('footer.footer');
    if (footer) {
        const footerOverlap = Math.max(0, window.innerHeight - footer.getBoundingClientRect().top);
        bottom = SCROLL_TO_TOP_BOTTOM_GAP + footerOverlap;
    }

    scrollToTopButton.style.bottom = `${bottom}px`;
}

export function initLayout() {
    bindGlobalListeners();
    applySidebarState();
    initTheme();
    initThemeName();
    initMonochrome();
    initFullscreen();
    updateScrollToTop();
}
