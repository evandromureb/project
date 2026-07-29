// Lógica do <x-forms.input-upload> como Alpine.data nomeado (não inline
// no x-data) — FileList, drag/drop e validação quebrariam wire:navigate
// se ficassem soltas num atributo x-data="{...}".
// Ver reference/dropdown.md (gotcha #4).
document.addEventListener('alpine:init', () => {
    Alpine.data('formInputUpload', (options = {}) => ({
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
        accept: typeof options.accept === 'string' ? options.accept : '',
        showPreview: options.showPreview !== false,
        removable: options.removable !== false,
        replaceOnSelect: options.replaceOnSelect !== false,
        simulateProgress: Boolean(options.simulateProgress),
        _dragCounter: 0,
        _uid: 0,
        _syncing: false,

        init() {
            this.$watch('items', () => {
                this.syncInput();
                this.$dispatch('files-changed', {
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

        get hasFiles() {
            return this.count > 0;
        },

        get isFull() {
            if (! this.multiple) {
                return this.items.length >= 1;
            }

            return this.maxFiles !== null && this.count >= this.maxFiles;
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly;
        },

        get acceptLabel() {
            if (! this.accept) {
                return '';
            }

            return this.accept
                .split(',')
                .map((part) => part.trim())
                .filter(Boolean)
                .join(', ');
        },

        get maxSizeLabel() {
            if (this.maxSize === null) {
                return '';
            }

            return this.formatBytes(this.maxSize);
        },

        openPicker() {
            if (! this.canEdit || this.isFull) {
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
            // Ignora o `change` disparado por syncInput (DataTransfer) —
            // sem isso vira loop infinito e a página trava.
            if (this._syncing) {
                return;
            }

            const files = Array.from(event.target?.files ?? []);
            this.addFiles(files);

            // Limpar o value permite reescolher o mesmo arquivo; o FileList
            // real fica em `items` e o $watch reaplica via DataTransfer.
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

        addFiles(fileList) {
            if (! this.canEdit || ! Array.isArray(fileList) || fileList.length === 0) {
                return;
            }

            this.validationError = '';

            let incoming = [...fileList];

            if (! this.multiple) {
                this.clearItems({ silent: true });
                incoming = incoming.slice(0, 1);
            } else if (this.replaceOnSelect && this.items.length === 0 && this.existing.length === 0) {
                // noop — append
            }

            const slots = this.availableSlots();

            if (slots !== null && incoming.length > slots) {
                this.validationError = slots <= 0
                    ? `Limite de ${this.maxFiles} arquivo(s) atingido.`
                    : `Você pode adicionar no máximo mais ${slots} arquivo(s).`;
                incoming = incoming.slice(0, Math.max(0, slots));
            }

            const next = [];

            incoming.forEach((file) => {
                const error = this.validateFile(file);

                if (error) {
                    this.validationError = error;

                    return;
                }

                next.push(this.makeItem(file));
            });

            if (next.length === 0) {
                return;
            }

            if (! this.multiple) {
                // Arquivo novo substitui o atual (inclusive os `existing` de edição).
                if (this.existing.length > 0) {
                    [...this.existing].forEach((item, index) => {
                        this.$dispatch('existing-removed', { index, item });
                    });
                    this.existing = [];
                }

                this.items = next;
            } else {
                this.items = [...this.items, ...next];
            }

            if (this.simulateProgress) {
                next.forEach((item) => this.runSimulatedProgress(item.id));
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

        validateFile(file) {
            if (! (file instanceof File)) {
                return 'Arquivo inválido.';
            }

            if (! this.matchesAccept(file)) {
                return `Tipo não permitido: ${file.name}`;
            }

            if (this.maxSize !== null && file.size > this.maxSize) {
                return `${file.name} excede ${this.formatBytes(this.maxSize)}.`;
            }

            return null;
        },

        matchesAccept(file) {
            if (! this.accept) {
                return true;
            }

            const tokens = this.accept
                .split(',')
                .map((part) => part.trim().toLowerCase())
                .filter(Boolean);

            if (tokens.length === 0) {
                return true;
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

        makeItem(file) {
            this._uid += 1;

            const isImage = String(file.type || '').startsWith('image/');
            const previewUrl = isImage && this.showPreview
                ? URL.createObjectURL(file)
                : null;

            return {
                id: `upload-${this._uid}`,
                file,
                name: file.name,
                size: file.size,
                type: file.type || '',
                extension: this.extensionOf(file.name),
                isImage,
                previewUrl,
                icon: this.iconFor(file),
                progress: this.simulateProgress ? 0 : 100,
                status: this.simulateProgress ? 'uploading' : 'ready',
                error: null,
            };
        },

        runSimulatedProgress(id) {
            const tick = () => {
                const item = this.items.find((entry) => entry.id === id);

                if (! item || item.status !== 'uploading') {
                    return;
                }

                const step = 8 + Math.round(Math.random() * 18);
                item.progress = Math.min(100, item.progress + step);

                if (item.progress >= 100) {
                    item.progress = 100;
                    item.status = 'ready';

                    return;
                }

                window.setTimeout(tick, 120 + Math.round(Math.random() * 180));
            };

            window.setTimeout(tick, 80);
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
            this.$dispatch('file-removed', { index, name: item.name });
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

            this.clearItems();
            this.validationError = '';
        },

        clearItems({ silent = false } = {}) {
            this.items.forEach((item) => this.revokePreview(item));
            this.items = [];

            if (! silent) {
                this.$dispatch('files-cleared');
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

                // Livewire / formulários clássicos precisam do change;
                // onInputChange ignora enquanto _syncing === true.
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

        iconFor(file) {
            const type = String(file.type || '').toLowerCase();
            const ext = this.extensionOf(file.name);

            if (type.startsWith('image/') || ['png', 'jpg', 'jpeg', 'gif', 'webp', 'svg', 'bmp'].includes(ext)) {
                return 'bi-file-earmark-image';
            }

            if (type === 'application/pdf' || ext === 'pdf') {
                return 'bi-file-earmark-pdf';
            }

            if (type.startsWith('video/') || ['mp4', 'mov', 'webm', 'mkv'].includes(ext)) {
                return 'bi-file-earmark-play';
            }

            if (type.startsWith('audio/') || ['mp3', 'wav', 'ogg', 'flac'].includes(ext)) {
                return 'bi-file-earmark-music';
            }

            if (['zip', 'rar', '7z', 'tar', 'gz'].includes(ext) || type.includes('zip') || type.includes('compressed')) {
                return 'bi-file-earmark-zip';
            }

            if (['doc', 'docx'].includes(ext) || type.includes('word')) {
                return 'bi-file-earmark-word';
            }

            if (['xls', 'xlsx', 'csv'].includes(ext) || type.includes('sheet') || type.includes('excel')) {
                return 'bi-file-earmark-excel';
            }

            if (['ppt', 'pptx'].includes(ext) || type.includes('presentation')) {
                return 'bi-file-earmark-ppt';
            }

            if (['txt', 'md', 'rtf'].includes(ext) || type.startsWith('text/')) {
                return 'bi-file-earmark-text';
            }

            if (['js', 'ts', 'php', 'py', 'json', 'html', 'css', 'blade'].includes(ext)) {
                return 'bi-file-earmark-code';
            }

            return 'bi-file-earmark';
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

        existingIcon(item) {
            return this.iconFor({
                name: item?.name ?? '',
                type: item?.type ?? '',
            });
        },

        existingIsImage(item) {
            if (item?.isImage === true) {
                return true;
            }

            const type = String(item?.type || '').toLowerCase();

            if (type.startsWith('image/')) {
                return true;
            }

            const ext = this.extensionOf(item?.name ?? item?.url ?? '');

            return ['png', 'jpg', 'jpeg', 'gif', 'webp', 'svg', 'bmp'].includes(ext);
        },
    }));
});
