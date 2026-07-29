// Lógica do <x-forms.input-crop> como Alpine.data nomeado (não inline
// no x-data) — Cropper.js, modal e FileList quebrariam wire:navigate se
// ficassem soltos num atributo x-data="{...}". Ver reference/dropdown.md
// (gotcha #4).
import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.css';

document.addEventListener('alpine:init', () => {
    Alpine.data('formInputCrop', (options = {}) => ({
        items: [],
        existing: Array.isArray(options.existing) ? [...options.existing] : [],
        queue: [],
        dragging: false,
        focused: false,
        modalOpen: false,
        cropping: false,
        validationError: '',
        disabled: Boolean(options.disabled),
        readonly: Boolean(options.readonly),
        multiple: Boolean(options.multiple),
        maxFiles: options.maxFiles ?? null,
        maxSize: options.maxSize ?? null,
        accept: typeof options.accept === 'string' ? options.accept : 'image/*',
        removable: options.removable !== false,
        replaceOnSelect: options.replaceOnSelect !== false,
        showMeta: options.showMeta !== false,
        showToolbar: options.showToolbar !== false,
        showPreview: options.showPreview !== false,
        aspectLock: Boolean(options.aspectLock),
        circular: Boolean(options.circular),
        browseText: typeof options.browseText === 'string' ? options.browseText : 'Selecionar imagem',
        changeText: typeof options.changeText === 'string' ? options.changeText : 'Trocar',
        modalTitle: typeof options.modalTitle === 'string' ? options.modalTitle : 'Recortar imagem',
        confirmText: typeof options.confirmText === 'string' ? options.confirmText : 'Aplicar',
        cancelText: typeof options.cancelText === 'string' ? options.cancelText : 'Cancelar',
        outputWidth: options.outputWidth ?? null,
        outputHeight: options.outputHeight ?? null,
        outputType: typeof options.outputType === 'string' ? options.outputType : 'image/jpeg',
        quality: typeof options.quality === 'number' ? options.quality : 0.92,
        viewMode: options.viewMode ?? 1,
        dragMode: typeof options.dragMode === 'string' ? options.dragMode : 'move',
        guides: options.guides !== false,
        center: options.center !== false,
        highlight: options.highlight !== false,
        background: options.background !== false,
        autoCropArea: typeof options.autoCropArea === 'number' ? options.autoCropArea : 0.8,
        rotatable: options.rotatable !== false,
        scalable: options.scalable !== false,
        zoomable: options.zoomable !== false,
        zoomOnTouch: options.zoomOnTouch !== false,
        zoomOnWheel: options.zoomOnWheel !== false,
        cropBoxMovable: options.cropBoxMovable !== false,
        cropBoxResizable: options.cropBoxResizable !== false,
        toggleDragModeOnDblclick: options.toggleDragModeOnDblclick !== false,
        minCropBoxWidth: options.minCropBoxWidth ?? 0,
        minCropBoxHeight: options.minCropBoxHeight ?? 0,
        initialAspect: options.aspectRatio ?? 1,
        aspectRatio: options.aspectRatio ?? 1,
        aspectPresets: Array.isArray(options.aspectPresets) ? options.aspectPresets : [],
        livePreviewUrl: null,
        _dragCounter: 0,
        _uid: 0,
        _syncing: false,
        _cropper: null,
        _sourceUrl: null,
        _sourceFile: null,
        _editIndex: null,
        _previewTimer: null,
        _boundKeydown: null,

        init() {
            this.$watch('items', () => {
                this.syncInput();
                this.$dispatch('crops-changed', {
                    files: this.items.map((item) => item.file).filter(Boolean),
                    count: this.items.length,
                });
            });

            this._boundKeydown = (event) => {
                if (event.key === 'Escape' && this.modalOpen && ! this.cropping) {
                    this.cancelCrop();
                }
            };

            window.addEventListener('keydown', this._boundKeydown);
            this.$nextTick(() => this.syncInput());
        },

        destroy() {
            this.destroyCropper();
            this.revokeSource();
            this.revokeLivePreview();
            this.items.forEach((item) => this.revokePreview(item));

            if (this._boundKeydown) {
                window.removeEventListener('keydown', this._boundKeydown);
            }
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
                return this.itemMeta(this.items[0]);
            }

            if (this.existing.length > 0) {
                return this.existingMeta(this.existing[0]);
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

        get queueRemaining() {
            return this.queue.length;
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

            const valid = [];

            for (const file of incoming) {
                const error = this.validateFile(file);

                if (error) {
                    this.validationError = error;

                    continue;
                }

                valid.push(file);
            }

            if (valid.length === 0) {
                return;
            }

            if (! this.multiple) {
                this.queue = [];
                this.openCropper(valid[0], { replace: true });

                return;
            }

            this.queue = [...this.queue, ...valid];
            this.processQueue();
        },

        processQueue() {
            if (this.modalOpen || this.queue.length === 0) {
                return;
            }

            const next = this.queue.shift();
            this.openCropper(next, { replace: false });
        },

        availableSlots() {
            if (! this.multiple) {
                return 1;
            }

            if (this.maxFiles === null) {
                return null;
            }

            return Math.max(0, this.maxFiles - this.count - this.queue.length);
        },

        validateFile(file) {
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

            return null;
        },

        isImageFile(file) {
            const type = String(file.type || '').toLowerCase();

            if (type.startsWith('image/')) {
                return true;
            }

            const ext = this.extensionOf(file.name);

            return ['png', 'jpg', 'jpeg', 'gif', 'webp', 'bmp', 'avif'].includes(ext);
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

        openCropper(file, { replace = false, editIndex = null } = {}) {
            this._sourceFile = file;
            this._editIndex = editIndex;
            this._replaceOnConfirm = replace || (! this.multiple && editIndex === null);
            this.aspectRatio = this.initialAspect;
            this.revokeSource();
            this.revokeLivePreview();
            this._sourceUrl = URL.createObjectURL(file);
            this.modalOpen = true;

            this.$nextTick(() => {
                // Dois rAF: espera o x-show sair de display:none e o layout
                // estabilizar antes do Cropper medir o container.
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => this.mountCropper());
                });
            });
        },

        recropAt(index) {
            if (! this.canEdit) {
                return;
            }

            const item = this.items[index];

            if (! item?.file) {
                return;
            }

            this.openCropper(item.file, { editIndex: index });
        },

        recropPrimary() {
            if (this.items.length > 0) {
                this.recropAt(0);
            }
        },

        mountCropper() {
            this.destroyCropper();

            const image = this.$refs.cropImage;

            if (! image || ! this._sourceUrl) {
                return;
            }

            image.src = this._sourceUrl;

            const aspect = this.aspectRatio === null || this.aspectRatio === 'free'
                ? NaN
                : Number(this.aspectRatio);

            this._cropper = new Cropper(image, {
                aspectRatio: Number.isFinite(aspect) ? aspect : NaN,
                viewMode: this.viewMode,
                dragMode: this.dragMode,
                guides: this.guides,
                center: this.center,
                highlight: this.highlight,
                background: this.background,
                autoCropArea: this.autoCropArea,
                rotatable: this.rotatable,
                scalable: this.scalable,
                zoomable: this.zoomable,
                zoomOnTouch: this.zoomOnTouch,
                zoomOnWheel: this.zoomOnWheel,
                cropBoxMovable: this.cropBoxMovable,
                cropBoxResizable: this.cropBoxResizable && ! this.circular,
                toggleDragModeOnDblclick: this.toggleDragModeOnDblclick,
                minCropBoxWidth: this.minCropBoxWidth,
                minCropBoxHeight: this.minCropBoxHeight,
                responsive: true,
                checkOrientation: true,
                ready: () => {
                    this.updateLivePreview();
                },
                crop: () => {
                    this.scheduleLivePreview();
                },
            });
        },

        destroyCropper() {
            if (this._cropper) {
                this._cropper.destroy();
                this._cropper = null;
            }
        },

        revokeSource() {
            if (this._sourceUrl) {
                URL.revokeObjectURL(this._sourceUrl);
                this._sourceUrl = null;
            }
        },

        revokeLivePreview() {
            if (this.livePreviewUrl) {
                URL.revokeObjectURL(this.livePreviewUrl);
                this.livePreviewUrl = null;
            }
        },

        scheduleLivePreview() {
            if (! this.showPreview) {
                return;
            }

            if (this._previewTimer) {
                clearTimeout(this._previewTimer);
            }

            this._previewTimer = setTimeout(() => this.updateLivePreview(), 120);
        },

        updateLivePreview() {
            if (! this.showPreview || ! this._cropper) {
                return;
            }

            try {
                const canvas = this.getCroppedCanvasElement({
                    width: 160,
                    height: 160,
                    fillColor: '#fff',
                });

                if (! canvas) {
                    return;
                }

                canvas.toBlob((blob) => {
                    if (! blob) {
                        return;
                    }

                    this.revokeLivePreview();
                    this.livePreviewUrl = URL.createObjectURL(blob);
                }, 'image/jpeg', 0.8);
            } catch {
                // Cropper ainda não pronto.
            }
        },

        setAspect(ratio) {
            if (this.aspectLock || ! this._cropper) {
                return;
            }

            this.aspectRatio = ratio;

            if (ratio === null || ratio === 'free') {
                this._cropper.setAspectRatio(NaN);
            } else {
                this._cropper.setAspectRatio(Number(ratio));
            }

            this.scheduleLivePreview();
        },

        zoom(delta) {
            this._cropper?.zoom(delta);
        },

        rotate(degrees) {
            if (! this.rotatable) {
                return;
            }

            this._cropper?.rotate(degrees);
        },

        scaleX() {
            if (! this.scalable || ! this._cropper) {
                return;
            }

            const data = this._cropper.getData();
            this._cropper.scaleX(-(data.scaleX || 1));
        },

        scaleY() {
            if (! this.scalable || ! this._cropper) {
                return;
            }

            const data = this._cropper.getData();
            this._cropper.scaleY(-(data.scaleY || 1));
        },

        resetCropper() {
            this._cropper?.reset();
            this.aspectRatio = this.initialAspect;

            if (this._cropper) {
                const aspect = this.aspectRatio === null || this.aspectRatio === 'free'
                    ? NaN
                    : Number(this.aspectRatio);
                this._cropper.setAspectRatio(Number.isFinite(aspect) ? aspect : NaN);
            }

            this.scheduleLivePreview();
        },

        setDragMode(mode) {
            this.dragMode = mode;
            this._cropper?.setDragMode(mode);
        },

        cancelCrop() {
            if (this.cropping) {
                return;
            }

            this.closeModal();
            this.processQueue();
        },

        closeModal() {
            this.modalOpen = false;
            this.destroyCropper();
            this.revokeSource();
            this.revokeLivePreview();
            this._sourceFile = null;
            this._editIndex = null;
        },

        getCroppedCanvasElement(overrides = {}) {
            if (! this._cropper) {
                return null;
            }

            const options = {
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
                ...overrides,
            };

            if (this.outputWidth) {
                options.width = this.outputWidth;
            }

            if (this.outputHeight) {
                options.height = this.outputHeight;
            }

            if (! options.fillColor && (this.outputType === 'image/jpeg' || this.outputType === 'image/webp')) {
                options.fillColor = '#fff';
            }

            return this._cropper.getCroppedCanvas(options);
        },

        async confirmCrop() {
            if (! this._cropper || ! this._sourceFile || this.cropping) {
                return;
            }

            this.cropping = true;

            try {
                const canvas = this.getCroppedCanvasElement();

                if (! canvas) {
                    this.validationError = 'Não foi possível gerar o recorte.';
                    this.cropping = false;

                    return;
                }

                const blob = await this.canvasToBlob(canvas, this.outputType, this.quality);

                if (! blob) {
                    this.validationError = 'Falha ao exportar a imagem recortada.';
                    this.cropping = false;

                    return;
                }

                const baseName = this.stripExtension(this._sourceFile.name) || 'imagem';
                const extension = this.extensionForMime(this.outputType);
                const file = new File([blob], `${baseName}.${extension}`, {
                    type: this.outputType,
                    lastModified: Date.now(),
                });

                const item = await this.makeItem(file, {
                    width: canvas.width,
                    height: canvas.height,
                });

                if (this._editIndex !== null && this.items[this._editIndex]) {
                    this.revokePreview(this.items[this._editIndex]);
                    this.items.splice(this._editIndex, 1, item);
                } else if (this._replaceOnConfirm || ! this.multiple) {
                    if (this.existing.length > 0) {
                        [...this.existing].forEach((existingItem, index) => {
                            this.$dispatch('existing-removed', { index, item: existingItem });
                        });
                        this.existing = [];
                    }

                    this.clearItems({ silent: true });
                    this.items = [item];
                } else {
                    this.items = [...this.items, item];
                }

                this.$dispatch('crop-applied', {
                    file,
                    width: canvas.width,
                    height: canvas.height,
                });

                this.closeModal();
                this.processQueue();
            } catch {
                this.validationError = 'Erro ao aplicar o recorte.';
            } finally {
                this.cropping = false;
            }
        },

        canvasToBlob(canvas, type, quality) {
            return new Promise((resolve) => {
                canvas.toBlob((blob) => resolve(blob), type, quality);
            });
        },

        async makeItem(file, dimensions = {}) {
            this._uid += 1;

            const previewUrl = URL.createObjectURL(file);

            return {
                id: `crop-${this._uid}`,
                file,
                name: file.name,
                size: file.size,
                type: file.type || '',
                extension: this.extensionOf(file.name),
                previewUrl,
                width: dimensions.width ?? null,
                height: dimensions.height ?? null,
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
            this.$dispatch('crop-removed', { index, name: item.name });
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
            this.queue = [];
            this.validationError = '';
        },

        clearItems({ silent = false } = {}) {
            this.items.forEach((item) => this.revokePreview(item));
            this.items = [];

            if (! silent) {
                this.$dispatch('crops-cleared');
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

        stripExtension(filename) {
            const name = String(filename || '');
            const idx = name.lastIndexOf('.');

            if (idx <= 0) {
                return name;
            }

            return name.slice(0, idx);
        },

        extensionForMime(mime) {
            return {
                'image/jpeg': 'jpg',
                'image/png': 'png',
                'image/webp': 'webp',
            }[mime] || 'jpg';
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

        aspectLabel(ratio) {
            if (ratio === null || ratio === 'free') {
                return 'Livre';
            }

            const value = Number(ratio);

            if (Math.abs(value - 1) < 0.001) {
                return '1:1';
            }

            if (Math.abs(value - 16 / 9) < 0.001) {
                return '16:9';
            }

            if (Math.abs(value - 4 / 3) < 0.001) {
                return '4:3';
            }

            if (Math.abs(value - 3 / 4) < 0.001) {
                return '3:4';
            }

            if (Math.abs(value - 21 / 9) < 0.001) {
                return '21:9';
            }

            return value.toFixed(2);
        },

        isAspectActive(ratio) {
            if (ratio === null || ratio === 'free') {
                return this.aspectRatio === null || this.aspectRatio === 'free' || Number.isNaN(Number(this.aspectRatio));
            }

            return Math.abs(Number(this.aspectRatio) - Number(ratio)) < 0.001;
        },
    }));
});
