// Lógica do <x-forms.input-image> como Alpine.data nomeado (não inline
// no x-data) — FileList, drag/drop, preview e validação de dimensões
// quebrariam wire:navigate se ficassem soltas num atributo x-data="{...}".
// Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formInputImage', (options = {}) => ({
        items: [],
        existing: Array.isArray(options.existing) ? [...options.existing] : [],
        dragging: false,
        focused: false,
        validationError: '',
        disabled: Boolean(options.disabled),
        readonly: Boolean(options.readonly),
        multiple: Boolean(options.multiple),
        maxFiles: options.maxFiles ?? null,
        maxSize: options.maxSize ?? null,
        minWidth: options.minWidth ?? null,
        minHeight: options.minHeight ?? null,
        maxWidth: options.maxWidth ?? null,
        maxHeight: options.maxHeight ?? null,
        accept: typeof options.accept === 'string' ? options.accept : 'image/*',
        removable: options.removable !== false,
        replaceOnSelect: options.replaceOnSelect !== false,
        showMeta: options.showMeta !== false,
        browseText: typeof options.browseText === 'string' ? options.browseText : 'Selecionar imagem',
        changeText: typeof options.changeText === 'string' ? options.changeText : 'Trocar',
        _dragCounter: 0,
        _uid: 0,
        _syncing: false,

        init() {
            this.$watch('items', () => {
                this.syncInput();
                this.$dispatch('images-changed', {
                    files: this.items.map((item) => item.file).filter(Boolean),
                    count: this.items.length,
                });
            });

            this.$nextTick(() => this.syncInput());
        },

        destroy() {
            this.items.forEach((item) => this.revokePreview(item));
        },

        get count() {
            return this.items.length + this.existing.length;
        },

        get hasImages() {
            return this.count > 0;
        },

        get primaryPreview() {
            if (this.items.length > 0) {
                return this.items[0].previewUrl;
            }

            if (this.existing.length > 0) {
                return this.existing[0].url ?? null;
            }

            return null;
        },

        get primaryName() {
            if (this.items.length > 0) {
                return this.items[0].name;
            }

            if (this.existing.length > 0) {
                return this.existing[0].name ?? 'Imagem';
            }

            return '';
        },

        get primaryMeta() {
            if (this.items.length > 0) {
                const item = this.items[0];
                const parts = [this.formatBytes(item.size)];

                if (item.width && item.height) {
                    parts.push(`${item.width}×${item.height}`);
                }

                return parts.join(' · ');
            }

            if (this.existing.length > 0) {
                const item = this.existing[0];
                const parts = [];

                if (item.size) {
                    parts.push(this.formatBytes(item.size));
                }

                if (item.width && item.height) {
                    parts.push(`${item.width}×${item.height}`);
                }

                return parts.length > 0 ? parts.join(' · ') : 'Imagem atual';
            }

            return '';
        },

        get isFull() {
            if (! this.multiple) {
                return this.items.length >= 1 || this.existing.length >= 1;
            }

            return this.maxFiles !== null && this.count >= this.maxFiles;
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly;
        },

        get canAdd() {
            return this.canEdit && ! this.isFull;
        },

        openPicker() {
            if (! this.canEdit) {
                return;
            }

            if (this.multiple && this.isFull) {
                return;
            }

            this.$refs.input?.click();
        },

        onZoneKeydown(event) {
            if (! this.canEdit) {
                return;
            }

            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                this.openPicker();
            }
        },

        onFocus() {
            this.focused = true;
        },

        onBlur() {
            this.focused = false;
        },

        onDragEnter(event) {
            if (! this.canEdit) {
                return;
            }

            event.preventDefault();
            this._dragCounter += 1;
            this.dragging = true;
        },

        onDragOver(event) {
            if (! this.canEdit) {
                return;
            }

            event.preventDefault();

            if (event.dataTransfer) {
                event.dataTransfer.dropEffect = 'copy';
            }
        },

        onDragLeave(event) {
            if (! this.canEdit) {
                return;
            }

            event.preventDefault();
            this._dragCounter = Math.max(0, this._dragCounter - 1);

            if (this._dragCounter === 0) {
                this.dragging = false;
            }
        },

        onDrop(event) {
            if (! this.canEdit) {
                return;
            }

            event.preventDefault();
            this._dragCounter = 0;
            this.dragging = false;

            const files = Array.from(event.dataTransfer?.files ?? []);
            this.addFiles(files);
        },

        onInputChange(event) {
            if (this._syncing) {
                return;
            }

            const files = Array.from(event.target?.files ?? []);
            this.addFiles(files);

            if (event.target) {
                this._syncing = true;

                try {
                    event.target.value = '';
                } finally {
                    this._syncing = false;
                }
            }

            this.syncInput();
        },

        async addFiles(fileList) {
            if (! this.canEdit || ! Array.isArray(fileList) || fileList.length === 0) {
                return;
            }

            this.validationError = '';

            let incoming = [...fileList];

            if (! this.multiple) {
                incoming = incoming.slice(0, 1);
            }

            const slots = this.availableSlots();

            if (this.multiple && slots !== null && incoming.length > slots) {
                this.validationError = slots <= 0
                    ? `Limite de ${this.maxFiles} imagem(ns) atingido.`
                    : `Você pode adicionar no máximo mais ${slots} imagem(ns).`;
                incoming = incoming.slice(0, Math.max(0, slots));
            }

            const next = [];

            for (const file of incoming) {
                const error = await this.validateFile(file);

                if (error) {
                    this.validationError = error;

                    continue;
                }

                next.push(await this.makeItem(file));
            }

            if (next.length === 0) {
                return;
            }

            if (! this.multiple) {
                if (this.existing.length > 0) {
                    [...this.existing].forEach((item, index) => {
                        this.$dispatch('existing-removed', { index, item });
                    });
                    this.existing = [];
                }

                this.clearItems({ silent: true });
                this.items = next;
            } else {
                this.items = [...this.items, ...next];
            }
        },

        availableSlots() {
            if (! this.multiple) {
                return 1;
            }

            if (this.maxFiles === null) {
                return null;
            }

            return Math.max(0, this.maxFiles - this.count);
        },

        async validateFile(file) {
            if (! (file instanceof File)) {
                return 'Arquivo inválido.';
            }

            if (! this.isImageFile(file)) {
                return `${file.name} não é uma imagem válida.`;
            }

            if (! this.matchesAccept(file)) {
                return `Tipo não permitido: ${file.name}`;
            }

            if (this.maxSize !== null && file.size > this.maxSize) {
                return `${file.name} excede ${this.formatBytes(this.maxSize)}.`;
            }

            const dimensions = await this.readDimensions(file);

            if (! dimensions) {
                return `Não foi possível ler as dimensões de ${file.name}.`;
            }

            const { width, height } = dimensions;

            if (this.minWidth !== null && width < this.minWidth) {
                return `${file.name} precisa ter pelo menos ${this.minWidth}px de largura.`;
            }

            if (this.minHeight !== null && height < this.minHeight) {
                return `${file.name} precisa ter pelo menos ${this.minHeight}px de altura.`;
            }

            if (this.maxWidth !== null && width > this.maxWidth) {
                return `${file.name} excede ${this.maxWidth}px de largura.`;
            }

            if (this.maxHeight !== null && height > this.maxHeight) {
                return `${file.name} excede ${this.maxHeight}px de altura.`;
            }

            return null;
        },

        isImageFile(file) {
            const type = String(file.type || '').toLowerCase();

            if (type.startsWith('image/')) {
                return true;
            }

            const ext = this.extensionOf(file.name);

            return ['png', 'jpg', 'jpeg', 'gif', 'webp', 'svg', 'bmp', 'avif', 'heic', 'heif'].includes(ext);
        },

        matchesAccept(file) {
            if (! this.accept) {
                return this.isImageFile(file);
            }

            const tokens = this.accept
                .split(',')
                .map((part) => part.trim().toLowerCase())
                .filter(Boolean);

            if (tokens.length === 0) {
                return this.isImageFile(file);
            }

            const name = String(file.name || '').toLowerCase();
            const type = String(file.type || '').toLowerCase();
            const ext = name.includes('.') ? `.${name.split('.').pop()}` : '';

            return tokens.some((token) => {
                if (token.startsWith('.')) {
                    return ext === token;
                }

                if (token.endsWith('/*')) {
                    const group = token.slice(0, -1);

                    return type.startsWith(group);
                }

                return type === token;
            });
        },

        readDimensions(file) {
            return new Promise((resolve) => {
                const url = URL.createObjectURL(file);
                const image = new Image();

                image.onload = () => {
                    const width = image.naturalWidth || image.width;
                    const height = image.naturalHeight || image.height;
                    URL.revokeObjectURL(url);
                    resolve({ width, height });
                };

                image.onerror = () => {
                    URL.revokeObjectURL(url);
                    resolve(null);
                };

                image.src = url;
            });
        },

        async makeItem(file) {
            this._uid += 1;

            const dimensions = await this.readDimensions(file);
            const previewUrl = URL.createObjectURL(file);

            return {
                id: `image-${this._uid}`,
                file,
                name: file.name,
                size: file.size,
                type: file.type || '',
                extension: this.extensionOf(file.name),
                previewUrl,
                width: dimensions?.width ?? null,
                height: dimensions?.height ?? null,
                error: null,
            };
        },

        removeAt(index) {
            if (! this.canEdit || ! this.removable) {
                return;
            }

            const item = this.items[index];

            if (! item) {
                return;
            }

            this.revokePreview(item);
            this.items.splice(index, 1);
            this.validationError = '';
            this.$dispatch('image-removed', { index, name: item.name });
        },

        removePrimary() {
            if (! this.canEdit || ! this.removable) {
                return;
            }

            if (this.items.length > 0) {
                this.removeAt(0);

                return;
            }

            if (this.existing.length > 0) {
                this.removeExistingAt(0);
            }
        },

        removeExistingAt(index) {
            if (! this.canEdit || ! this.removable) {
                return;
            }

            const item = this.existing[index];

            if (! item) {
                return;
            }

            this.existing.splice(index, 1);
            this.$dispatch('existing-removed', { index, item });
        },

        clear() {
            if (! this.canEdit) {
                return;
            }

            if (this.existing.length > 0) {
                [...this.existing].forEach((item, index) => {
                    this.$dispatch('existing-removed', { index, item });
                });
                this.existing = [];
            }

            this.clearItems();
            this.validationError = '';
        },

        clearItems({ silent = false } = {}) {
            this.items.forEach((item) => this.revokePreview(item));
            this.items = [];

            if (! silent) {
                this.$dispatch('images-cleared');
            }
        },

        revokePreview(item) {
            if (item?.previewUrl) {
                URL.revokeObjectURL(item.previewUrl);
                item.previewUrl = null;
            }
        },

        syncInput() {
            const input = this.$refs.input;

            if (! input || this._syncing) {
                return;
            }

            this._syncing = true;

            try {
                const transfer = new DataTransfer();

                this.items.forEach((item) => {
                    if (item.file instanceof File) {
                        transfer.items.add(item.file);
                    }
                });

                input.files = transfer.files;

                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.dispatchEvent(new Event('change', { bubbles: true }));
            } catch {
                // Alguns ambientes antigos não permitem setar input.files.
            } finally {
                this._syncing = false;
            }
        },

        extensionOf(filename) {
            const name = String(filename || '');
            const idx = name.lastIndexOf('.');

            if (idx <= 0 || idx === name.length - 1) {
                return '';
            }

            return name.slice(idx + 1).toLowerCase();
        },

        formatBytes(bytes) {
            const value = Number(bytes) || 0;

            if (value < 1024) {
                return `${value} B`;
            }

            const units = ['KB', 'MB', 'GB', 'TB'];
            let size = value;
            let unit = -1;

            do {
                size /= 1024;
                unit += 1;
            } while (size >= 1024 && unit < units.length - 1);

            return `${size.toFixed(size >= 10 || unit === 0 ? 0 : 1)} ${units[unit]}`;
        },

        itemMeta(item) {
            const parts = [this.formatBytes(item.size)];

            if (item.width && item.height) {
                parts.push(`${item.width}×${item.height}`);
            }

            if (item.extension) {
                parts.push(item.extension.toUpperCase());
            }

            return parts.join(' · ');
        },

        existingMeta(item) {
            const parts = [];

            if (item.size) {
                parts.push(this.formatBytes(item.size));
            }

            if (item.width && item.height) {
                parts.push(`${item.width}×${item.height}`);
            }

            return parts.length > 0 ? parts.join(' · ') : 'Imagem atual';
        },
    }));
});
