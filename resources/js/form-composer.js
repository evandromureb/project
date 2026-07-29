// Lógica do <x-forms.composer> como Alpine.data nomeado (não inline no
// x-data) — comparações e arrows quebrariam wire:navigate se ficassem
// soltas num atributo x-data="{...}". Ver reference/dropdown.md.
document.addEventListener('alpine:init', () => {
    Alpine.data('formComposer', (options = {}) => ({
        value: String(options.value ?? ''),
        placeholder: String(options.placeholder ?? ''),
        disabled: Boolean(options.disabled),
        readonly: Boolean(options.readonly),
        loading: Boolean(options.loading),
        maxLength: options.maxLength === null || options.maxLength === undefined
            ? null
            : Number(options.maxLength),
        minRows: Number(options.minRows ?? 1),
        maxRows: options.maxRows === null || options.maxRows === undefined
            ? 8
            : Number(options.maxRows),
        submitOnEnter: options.submitOnEnter !== false,
        requireValue: options.requireValue !== false,
        clearOnSubmit: Boolean(options.clearOnSubmit),
        accept: String(options.accept ?? '*/*'),
        multiple: options.multiple !== false,
        maxFiles: Number(options.maxFiles ?? 5),
        maxFileSize: Number(options.maxFileSize ?? 10 * 1024 * 1024),
        toolsOpen: Boolean(options.toolsOpen),
        compactMenuOpen: false,
        focused: false,
        recording: false,
        attachments: [],
        _attachmentId: 0,
        _objectUrls: [],

        init() {
            this.$nextTick(() => this.autoResize());

            this.$watch('value', () => {
                this.$nextTick(() => this.autoResize());
            });

            this.$watch('loading', (next) => {
                if (next) {
                    this.recording = false;
                }
            });
        },

        destroy() {
            this.revokeObjectUrls();
        },

        get canEdit() {
            return ! this.disabled && ! this.readonly && ! this.loading;
        },

        get hasValue() {
            return this.value.trim().length > 0;
        },

        get canSubmit() {
            if (this.disabled || this.readonly || this.loading) {
                return false;
            }

            if (! this.requireValue) {
                return true;
            }

            return this.hasValue || this.attachments.length > 0;
        },

        get characterCount() {
            return this.value.length;
        },

        get characterLimitReached() {
            return this.maxLength !== null && this.characterCount >= this.maxLength;
        },

        get counterText() {
            if (this.maxLength === null) {
                return String(this.characterCount);
            }

            return `${this.characterCount}/${this.maxLength}`;
        },

        autoResize() {
            const el = this.$refs.textarea;

            if (! el) {
                return;
            }

            el.style.height = 'auto';

            const styles = window.getComputedStyle(el);
            const lineHeight = Number.parseFloat(styles.lineHeight) || 24;
            const padding = Number.parseFloat(styles.paddingTop) + Number.parseFloat(styles.paddingBottom);
            const minHeight = lineHeight * this.minRows + padding;
            const maxHeight = lineHeight * this.maxRows + padding;
            const next = Math.min(Math.max(el.scrollHeight, minHeight), maxHeight);

            el.style.height = `${next}px`;
            el.style.overflowY = el.scrollHeight > maxHeight ? 'auto' : 'hidden';
        },

        onInput() {
            if (this.maxLength !== null && this.value.length > this.maxLength) {
                this.value = this.value.slice(0, this.maxLength);
            }
        },

        onKeydown(event) {
            if (! this.submitOnEnter) {
                return;
            }

            if (event.key === 'Enter' && ! event.shiftKey && ! event.isComposing) {
                event.preventDefault();
                this.submit();
            }
        },

        focus() {
            this.$refs.textarea?.focus();
        },

        clear() {
            this.value = '';
            this.clearAttachments();
            this.$nextTick(() => {
                this.autoResize();
                this.focus();
            });
        },

        submit() {
            if (! this.canSubmit) {
                return;
            }

            const detail = {
                value: this.value,
                attachments: this.attachments.map((file) => ({
                    id: file.id,
                    name: file.name,
                    size: file.size,
                    type: file.type,
                    file: file.file,
                })),
            };

            this.$dispatch('composer-submit', detail);

            if (typeof options.onSubmit === 'function') {
                options.onSubmit(detail);
            }

            if (this.clearOnSubmit) {
                this.value = '';
                this.clearAttachments();
                this.$nextTick(() => this.autoResize());
            }
        },

        stop() {
            this.$dispatch('composer-stop');
        },

        openAttach() {
            if (! this.canEdit) {
                return;
            }

            this.$refs.fileInput?.click();
        },

        onFilesSelected(event) {
            const files = Array.from(event.target.files || []);
            event.target.value = '';

            if (files.length === 0) {
                return;
            }

            this.addFiles(files);
        },

        onDrop(event) {
            if (! this.canEdit) {
                return;
            }

            event.preventDefault();
            const files = Array.from(event.dataTransfer?.files || []);
            this.addFiles(files);
        },

        addFiles(files) {
            const remaining = Math.max(0, this.maxFiles - this.attachments.length);
            const accepted = files.slice(0, remaining);
            const rejected = [];

            for (const file of accepted) {
                if (file.size > this.maxFileSize) {
                    rejected.push({ file, reason: 'size' });
                    continue;
                }

                const id = ++this._attachmentId;
                const isImage = file.type.startsWith('image/');
                let previewUrl = null;

                if (isImage) {
                    previewUrl = URL.createObjectURL(file);
                    this._objectUrls.push(previewUrl);
                }

                this.attachments.push({
                    id,
                    name: file.name,
                    size: file.size,
                    type: file.type || 'application/octet-stream',
                    file,
                    isImage,
                    previewUrl,
                    humanSize: this.formatBytes(file.size),
                });
            }

            if (accepted.length > 0) {
                this.$dispatch('composer-attach', { attachments: this.attachments, rejected });
            }

            if (files.length > remaining || rejected.length > 0) {
                this.$dispatch('composer-attach-rejected', {
                    overflow: files.length > remaining,
                    rejected,
                });
            }
        },

        removeAttachment(id) {
            const index = this.attachments.findIndex((item) => item.id === id);

            if (index === -1) {
                return;
            }

            const [removed] = this.attachments.splice(index, 1);

            if (removed?.previewUrl) {
                URL.revokeObjectURL(removed.previewUrl);
                this._objectUrls = this._objectUrls.filter((url) => url !== removed.previewUrl);
            }

            this.$dispatch('composer-attach-remove', { id, attachment: removed });
        },

        clearAttachments() {
            this.revokeObjectUrls();
            this.attachments = [];
        },

        revokeObjectUrls() {
            for (const url of this._objectUrls) {
                URL.revokeObjectURL(url);
            }

            this._objectUrls = [];
        },

        formatBytes(bytes) {
            if (! Number.isFinite(bytes) || bytes <= 0) {
                return '0 B';
            }

            const units = ['B', 'KB', 'MB', 'GB'];
            const index = Math.min(units.length - 1, Math.floor(Math.log(bytes) / Math.log(1024)));
            const value = bytes / (1024 ** index);

            return `${value.toFixed(value >= 10 || index === 0 ? 0 : 1)} ${units[index]}`;
        },

        insertCommand(prefix = '/') {
            if (! this.canEdit) {
                return;
            }

            const needsSpace = this.value.length > 0 && ! /\s$/.test(this.value);
            this.value = `${this.value}${needsSpace ? ' ' : ''}${prefix}`;
            this.$dispatch('composer-command', { value: this.value, prefix });
            this.$nextTick(() => {
                this.autoResize();
                this.focus();
                const el = this.$refs.textarea;

                if (el) {
                    const end = el.value.length;
                    el.setSelectionRange(end, end);
                }
            });
        },

        toggleTools() {
            if (this.disabled) {
                return;
            }

            this.toolsOpen = ! this.toolsOpen;
            this.$dispatch('composer-tools', { open: this.toolsOpen });
        },

        toggleVoice() {
            if (! this.canEdit && ! this.recording) {
                return;
            }

            this.recording = ! this.recording;
            this.$dispatch('composer-voice', { recording: this.recording });
        },

        toggleCompactMenu() {
            this.compactMenuOpen = ! this.compactMenuOpen;
        },

        closeCompactMenu() {
            this.compactMenuOpen = false;
        },
    }));
});
