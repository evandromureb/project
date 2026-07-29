// Lógica do <x-ui.cookie-alert> como Alpine.data nomeado (+ store auxiliar
// para ler o consentimento de qualquer lugar do app). Não usar x-data="{...}"
// inline: comparações/arrow functions quebram wire:navigate — ver
// reference/dropdown.md (gotcha #4) na skill ui-components.
document.addEventListener('alpine:init', () => {
    Alpine.store('cookieConsent', {
        get(key = 'cookie-consent', storage = 'local') {
            try {
                const raw = (storage === 'session' ? sessionStorage : localStorage).getItem(key);

                return raw ? JSON.parse(raw) : null;
            } catch {
                return null;
            }
        },

        has(key = 'cookie-consent', storage = 'local') {
            return !!this.get(key, storage);
        },

        allowed(category, key = 'cookie-consent', storage = 'local') {
            const consent = this.get(key, storage);

            if (!consent) {
                return false;
            }

            if (consent.status === 'accepted') {
                return true;
            }

            return !!consent.categories?.[category];
        },

        clear(key = 'cookie-consent', storage = 'local') {
            try {
                (storage === 'session' ? sessionStorage : localStorage).removeItem(key);
            } catch {
                // ignore quota / private-mode failures
            }
        },
    });

    Alpine.data('cookieAlert', (config = {}) => ({
        open: false,
        customizing: false,
        categories: {},
        storageKey: config.storageKey || 'cookie-consent',
        storageType: config.storage || 'local',
        force: !!config.force,
        manual: !!config.manual,
        preview: !!config.preview,
        delay: Number(config.delay) || 0,
        categoryDefs: Array.isArray(config.categories) ? config.categories : [],

        init() {
            this.resetCategories();

            this._onExternalReset = (event) => {
                const key = event.detail?.key;

                if (key && key !== this.storageKey) {
                    return;
                }

                this.reset();
            };

            this._onExternalShow = (event) => {
                const key = event.detail?.key;

                if (key && key !== this.storageKey) {
                    return;
                }

                this.show();
            };

            window.addEventListener('cookie-alert-reset', this._onExternalReset);
            window.addEventListener('cookie-alert-show', this._onExternalShow);

            // manual: fica fechado até cookie-alert-show / cookie-alert-reset
            // (útil nas demos live da docs). preview/force ignoram storage.
            if (this.manual) {
                return;
            }

            if (this.preview || this.force || !this.hasConsent()) {
                this.scheduleShow();
            }
        },

        destroy() {
            window.removeEventListener('cookie-alert-reset', this._onExternalReset);
            window.removeEventListener('cookie-alert-show', this._onExternalShow);
        },

        resetCategories() {
            const next = {};

            this.categoryDefs.forEach((cat) => {
                next[cat.key] = cat.required ? true : !!cat.default;
            });

            this.categories = next;
        },

        storageApi() {
            return this.storageType === 'session' ? sessionStorage : localStorage;
        },

        hasConsent() {
            try {
                return !!this.storageApi().getItem(this.storageKey);
            } catch {
                return false;
            }
        },

        scheduleShow() {
            if (this.delay > 0) {
                setTimeout(() => {
                    this.open = true;
                }, this.delay);

                return;
            }

            this.open = true;
        },

        show() {
            this.open = true;
        },

        hide() {
            this.open = false;
            this.customizing = false;
        },

        toggleCustomize() {
            this.customizing = !this.customizing;
        },

        accept() {
            this.categoryDefs.forEach((cat) => {
                this.categories[cat.key] = true;
            });

            this.persist('accepted');
        },

        decline() {
            this.categoryDefs.forEach((cat) => {
                this.categories[cat.key] = !!cat.required;
            });

            this.persist('declined');
        },

        saveCustom() {
            this.categoryDefs.forEach((cat) => {
                if (cat.required) {
                    this.categories[cat.key] = true;
                }
            });

            this.persist('custom');
        },

        persist(status) {
            const payload = {
                status,
                categories: { ...this.categories },
                timestamp: new Date().toISOString(),
            };

            if (!this.preview) {
                try {
                    this.storageApi().setItem(this.storageKey, JSON.stringify(payload));
                } catch {
                    // ignore quota / private-mode failures
                }
            }

            this.hide();
            this.$dispatch('cookie-consent', payload);
            window.dispatchEvent(new CustomEvent('cookie-consent', { detail: payload }));
        },

        reset() {
            if (!this.preview) {
                try {
                    this.storageApi().removeItem(this.storageKey);
                } catch {
                    // ignore
                }
            }

            this.resetCategories();
            this.customizing = false;
            this.open = true;
        },

        isCategoryEnabled(key) {
            return !!this.categories[key];
        },

        toggleCategory(key) {
            const def = this.categoryDefs.find((cat) => cat.key === key);

            if (!def || def.required) {
                return;
            }

            this.categories[key] = !this.categories[key];
        },
    }));
});
