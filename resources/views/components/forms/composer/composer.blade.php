@props([
    'variant' => 'default',
    'size' => 'md',
    'color' => 'primary',
    'placeholder' => 'How can I help you today?',
    'value' => '',
    'name' => null,
    'id' => null,
    'disabled' => false,
    'readonly' => false,
    'loading' => false,
    'maxLength' => null,
    'minRows' => 1,
    'maxRows' => 8,
    'submitOnEnter' => true,
    'requireValue' => true,
    'clearOnSubmit' => false,
    'showAttach' => true,
    'showCommand' => true,
    'showTools' => true,
    'showVoice' => true,
    'showSend' => true,
    'showCounter' => false,
    'showStop' => true,
    'compact' => false,
    'accept' => '*/*',
    'multiple' => true,
    'maxFiles' => 5,
    'maxFileSize' => 10485760,
    'attachLabel' => 'Anexar arquivo',
    'commandLabel' => 'Comandos',
    'toolsLabel' => 'Ferramentas',
    'voiceLabel' => 'Entrada de voz',
    'sendLabel' => 'Enviar',
    'stopLabel' => 'Parar',
    'toolsOpen' => false,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($variant, ['default', 'soft', 'outline', 'inverted'], true)) {
        $variant = 'default';
    }

    $isDisabled = $disabled || $attributes->has('disabled');
    $isReadonly = $readonly || $attributes->has('readonly');
    $composerId = $id ?? ($name ? 'form-composer-'.$name : 'form-composer-'.str()->uuid());

    $shellRadiusClass = match ($size) {
        'sm' => 'rounded-2xl',
        'lg' => 'rounded-[1.75rem]',
        default => 'rounded-3xl',
    };

    $shellPadClass = match ($size) {
        'sm' => 'p-3',
        'lg' => 'p-5',
        default => 'p-4',
    };

    $textClass = match ($size) {
        'sm' => 'text-sm',
        'lg' => 'text-lg',
        default => 'text-base',
    };

    $iconBtnClass = match ($size) {
        'sm' => 'size-8 text-sm',
        'lg' => 'size-11 text-lg',
        default => 'size-9 text-base',
    };

    $actionBtnClass = match ($size) {
        'sm' => 'size-8 text-sm rounded-lg',
        'lg' => 'size-11 text-lg rounded-xl',
        default => 'size-9 text-base rounded-xl',
    };

    $toolbarGapClass = match ($size) {
        'sm' => 'gap-0.5',
        'lg' => 'gap-1.5',
        default => 'gap-1',
    };

    $shellToneClass = match ($variant) {
        'soft' => 'border border-transparent bg-muted text-foreground shadow-none',
        'outline' => 'border-2 border-border bg-card text-foreground shadow-none',
        'inverted' => 'border border-transparent bg-foreground text-background shadow-sm',
        default => 'border border-border bg-card text-foreground shadow-sm',
    };

    $focusRingClass = match ($color) {
        'secondary' => 'focus-within:ring-secondary/35',
        'success' => 'focus-within:ring-success/35',
        'warning' => 'focus-within:ring-warning/35',
        'danger' => 'focus-within:ring-danger/35',
        'info' => 'focus-within:ring-info/35',
        default => 'focus-within:ring-primary/35',
    };

    $placeholderClass = match ($variant) {
        'inverted' => 'placeholder:text-background/50',
        default => 'placeholder:text-muted-foreground',
    };

    $textareaToneClass = match ($variant) {
        'inverted' => 'text-background caret-background',
        default => 'text-foreground caret-foreground',
    };

    $ghostIconClass = match ($variant) {
        'inverted' => 'text-background/60 hover:bg-background/10 hover:text-background',
        default => 'text-muted-foreground hover:bg-muted hover:text-foreground',
    };

    $ghostActiveClass = match ($variant) {
        'inverted' => 'bg-background/10',
        default => 'bg-muted',
    };

    $voiceBtnClass = match ($variant) {
        'inverted' => 'border border-background/15 bg-background/10 text-background hover:bg-background/15',
        'soft' => 'border border-transparent bg-background text-foreground hover:bg-card',
        default => 'border border-border bg-muted text-foreground hover:bg-muted/80',
    };

    $sendColorClass = match ($color) {
        'secondary' => 'bg-secondary text-secondary-foreground hover:opacity-90',
        'success' => 'bg-success text-success-foreground hover:opacity-90',
        'warning' => 'bg-warning text-warning-foreground hover:opacity-90',
        'danger' => 'bg-danger text-danger-foreground hover:opacity-90',
        'info' => 'bg-info text-info-foreground hover:opacity-90',
        default => 'bg-primary text-primary-foreground hover:opacity-90',
    };

    $sendActiveClass = match ($variant) {
        'inverted' => 'bg-background text-foreground hover:opacity-90',
        default => $sendColorClass,
    };

    $sendIdleClass = match ($variant) {
        'inverted' => 'bg-background/20 text-background/50',
        default => 'bg-muted text-muted-foreground',
    };

    $stopBtnClass = match ($variant) {
        'inverted' => 'bg-background text-foreground',
        default => 'bg-foreground text-background',
    };

    $chipClass = match ($variant) {
        'inverted' => 'border-background/15 bg-background/10 text-background',
        default => 'border-border bg-muted text-foreground',
    };

    $chipIconClass = match ($variant) {
        'inverted' => 'bg-background/10',
        default => 'bg-background',
    };

    $chipRemoveClass = match ($variant) {
        'inverted' => 'hover:bg-background/10',
        default => 'hover:bg-background',
    };

    $toolsPanelClass = match ($variant) {
        'inverted' => 'border-background/15 bg-background/5 text-background/80',
        default => 'border-border bg-muted/60 text-muted-foreground',
    };

    $toolsChipClass = match ($variant) {
        'inverted' => 'bg-background/10',
        default => 'bg-background',
    };

    $toolsChipMutedClass = match ($variant) {
        'inverted' => 'bg-background/5',
        default => 'bg-background/70',
    };

    $compactMenuClass = match ($variant) {
        'inverted' => 'border-background/15 bg-foreground text-background',
        default => 'border-border bg-card text-foreground',
    };

    $recordingClass = 'border-transparent bg-danger text-danger-foreground hover:opacity-90 animate-pulse';

    $modelAttributes = $attributes->whereStartsWith('wire:model');
    $rootAttributes = $attributes
        ->except(['class', 'disabled', 'readonly'])
        ->whereDoesntStartWith('wire:model');

    $alpineConfig = [
        'value' => (string) $value,
        'placeholder' => (string) $placeholder,
        'disabled' => (bool) $isDisabled,
        'readonly' => (bool) $isReadonly,
        'loading' => (bool) $loading,
        'maxLength' => $maxLength,
        'minRows' => (int) $minRows,
        'maxRows' => (int) $maxRows,
        'submitOnEnter' => (bool) $submitOnEnter,
        'requireValue' => (bool) $requireValue,
        'clearOnSubmit' => (bool) $clearOnSubmit,
        'accept' => (string) $accept,
        'multiple' => (bool) $multiple,
        'maxFiles' => (int) $maxFiles,
        'maxFileSize' => (int) $maxFileSize,
        'toolsOpen' => (bool) $toolsOpen,
    ];

    $hasActionsStart = isset($actionsStart);
    $hasActionsEnd = isset($actionsEnd);
    $hasFooter = isset($footer);
    $hasToolsPanel = isset($tools);
@endphp

<div
    x-data="formComposer(@js($alpineConfig))"
    x-modelable="value"
    {{ $modelAttributes }}
    {{ $attributes->only('class')->class(['w-full']) }}
    {{ $rootAttributes }}
    @dragover.prevent
    @drop="onDrop($event)"
>
    @if (filled($name))
        <input type="hidden" name="{{ $name }}" x-model="value" @disabled($isDisabled)>
    @endif

    <div
        @class([
            'relative flex w-full flex-col transition-shadow',
            $shellRadiusClass,
            $shellPadClass,
            $shellToneClass,
            'focus-within:ring-2 focus-within:ring-offset-1',
            $focusRingClass,
            $isDisabled ? 'pointer-events-none opacity-60' : null,
        ])
    >
        {{-- Attachments --}}
        <div
            x-show="attachments.length > 0"
            x-cloak
            class="mb-3 flex flex-wrap gap-2"
        >
            <template x-for="file in attachments" x-bind:key="file.id">
                <div @class([
                    'group relative inline-flex max-w-full items-center gap-2 rounded-xl border px-2 py-1.5 text-xs',
                    $chipClass,
                ])>
                    <template x-if="file.isImage && file.previewUrl">
                        <img
                            x-bind:src="file.previewUrl"
                            x-bind:alt="file.name"
                            class="size-8 shrink-0 rounded-md object-cover"
                        />
                    </template>
                    <template x-if="! file.isImage || ! file.previewUrl">
                        <span @class([
                            'inline-flex size-8 shrink-0 items-center justify-center rounded-md',
                            $chipIconClass,
                        ])>
                            <i class="bi bi-file-earmark text-sm" aria-hidden="true"></i>
                        </span>
                    </template>
                    <span class="min-w-0">
                        <span class="block truncate font-medium" x-text="file.name"></span>
                        <span class="block opacity-70" x-text="file.humanSize"></span>
                    </span>
                    <button
                        type="button"
                        @class([
                            'ms-1 inline-flex size-5 shrink-0 items-center justify-center rounded-full opacity-70 hover:opacity-100',
                            $chipRemoveClass,
                        ])
                        x-bind:aria-label="'Remover ' + file.name"
                        @click="removeAttachment(file.id)"
                    >
                        <i class="bi bi-x text-sm leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            </template>
        </div>

        @isset($attachments)
            <div class="mb-3">
                {{ $attachments }}
            </div>
        @endisset

        {{-- Textarea --}}
        <textarea
            x-ref="textarea"
            id="{{ $composerId }}"
            rows="{{ $minRows }}"
            x-model="value"
            x-bind:placeholder="placeholder"
            @input="onInput($event)"
            @keydown="onKeydown($event)"
            @focus="focused = true"
            @blur="focused = false"
            @disabled($isDisabled)
            @if ($isReadonly) readonly @endif
            @if ($maxLength) maxlength="{{ $maxLength }}" @endif
            @class([
                'w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0',
                $textClass,
                $placeholderClass,
                $textareaToneClass,
                'disabled:cursor-not-allowed',
            ])
            aria-label="{{ $placeholder }}"
        ></textarea>

        {{-- Toolbar --}}
        <div @class(['mt-3 flex items-center justify-between', $toolbarGapClass])>
            <div @class(['relative flex min-w-0 items-center', $toolbarGapClass])>
                @if ($compact)
                    <button
                        type="button"
                        @click="toggleCompactMenu()"
                        @class([
                            'inline-flex items-center justify-center transition-colors',
                            $iconBtnClass,
                            'rounded-lg',
                            $ghostIconClass,
                        ])
                        aria-label="Mais ações"
                        x-bind:aria-expanded="compactMenuOpen.toString()"
                    >
                        <i class="bi bi-plus-lg leading-none" aria-hidden="true"></i>
                    </button>

                    <div
                        x-show="compactMenuOpen"
                        x-cloak
                        @click.outside="closeCompactMenu()"
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        @class([
                            'absolute bottom-full start-0 z-20 mb-2 flex items-center rounded-xl border p-1 shadow-lg',
                            $toolbarGapClass,
                            $compactMenuClass,
                        ])
                    >
                        @if ($showAttach)
                            <button
                                type="button"
                                @click="openAttach(); closeCompactMenu()"
                                @class([$iconBtnClass, 'inline-flex items-center justify-center rounded-lg', $ghostIconClass])
                                aria-label="{{ $attachLabel }}"
                            >
                                <i class="bi bi-paperclip leading-none" aria-hidden="true"></i>
                            </button>
                        @endif
                        @if ($showCommand)
                            <button
                                type="button"
                                @click="insertCommand('/'); closeCompactMenu()"
                                @class([$iconBtnClass, 'inline-flex items-center justify-center rounded-lg', $ghostIconClass])
                                aria-label="{{ $commandLabel }}"
                            >
                                <span class="text-base font-semibold leading-none" aria-hidden="true">/</span>
                            </button>
                        @endif
                        @if ($showTools)
                            <button
                                type="button"
                                @click="toggleTools(); closeCompactMenu()"
                                @class([$iconBtnClass, 'inline-flex items-center justify-center rounded-lg', $ghostIconClass])
                                aria-label="{{ $toolsLabel }}"
                                x-bind:aria-pressed="toolsOpen.toString()"
                            >
                                <i class="bi bi-sliders leading-none" aria-hidden="true"></i>
                            </button>
                        @endif
                        @if ($hasActionsStart)
                            {{ $actionsStart }}
                        @endif
                    </div>
                @else
                    @if ($showAttach)
                        <button
                            type="button"
                            @click="openAttach()"
                            @class([$iconBtnClass, 'inline-flex items-center justify-center rounded-lg transition-colors', $ghostIconClass])
                            aria-label="{{ $attachLabel }}"
                        >
                            <i class="bi bi-paperclip leading-none" aria-hidden="true"></i>
                        </button>
                    @endif

                    @if ($showCommand)
                        <button
                            type="button"
                            @click="insertCommand('/')"
                            @class([$iconBtnClass, 'inline-flex items-center justify-center rounded-lg transition-colors', $ghostIconClass])
                            aria-label="{{ $commandLabel }}"
                        >
                            <span class="text-base font-semibold leading-none" aria-hidden="true">/</span>
                        </button>
                    @endif

                    @if ($showTools)
                        <button
                            type="button"
                            @click="toggleTools()"
                            @class([
                                $iconBtnClass,
                                'inline-flex items-center justify-center rounded-lg transition-colors',
                                $ghostIconClass,
                            ])
                            aria-label="{{ $toolsLabel }}"
                            x-bind:aria-pressed="toolsOpen.toString()"
                            x-bind:class="toolsOpen ? @js($ghostActiveClass) : ''"
                        >
                            <i class="bi bi-sliders leading-none" aria-hidden="true"></i>
                        </button>
                    @endif

                    @if ($hasActionsStart)
                        {{ $actionsStart }}
                    @endif
                @endif

                @if ($showCounter)
                    <span
                        class="ms-1 hidden text-xs tabular-nums opacity-60 sm:inline"
                        x-bind:class="characterLimitReached ? 'text-danger opacity-100' : ''"
                        x-text="counterText"
                    ></span>
                @endif
            </div>

            <div @class(['flex shrink-0 items-center', $toolbarGapClass])>
                @if ($hasActionsEnd)
                    {{ $actionsEnd }}
                @endif

                @if ($showVoice)
                    <button
                        type="button"
                        @click="toggleVoice()"
                        x-bind:class="recording ? @js($recordingClass) : @js($voiceBtnClass)"
                        @class([
                            'inline-flex items-center justify-center transition-colors',
                            $actionBtnClass,
                        ])
                        x-bind:aria-label="recording ? 'Parar gravação' : @js($voiceLabel)"
                        x-bind:aria-pressed="recording.toString()"
                    >
                        <i
                            class="bi leading-none"
                            x-bind:class="recording ? 'bi-stop-fill' : 'bi-mic'"
                            aria-hidden="true"
                        ></i>
                    </button>
                @endif

                @if ($showSend)
                    <button
                        type="button"
                        x-show="! loading"
                        @click="submit()"
                        x-bind:disabled="! canSubmit"
                        x-bind:class="canSubmit ? @js($sendActiveClass) : @js($sendIdleClass)"
                        @class([
                            'inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed',
                            $actionBtnClass,
                        ])
                        aria-label="{{ $sendLabel }}"
                    >
                        <i class="bi bi-send-fill leading-none" aria-hidden="true"></i>
                    </button>

                    @if ($showStop)
                        <button
                            type="button"
                            x-show="loading"
                            x-cloak
                            @click="stop()"
                            @class([
                                'inline-flex items-center justify-center transition-colors',
                                $actionBtnClass,
                                $stopBtnClass,
                            ])
                            aria-label="{{ $stopLabel }}"
                        >
                            <span class="size-2.5 rounded-sm bg-current" aria-hidden="true"></span>
                        </button>
                    @else
                        <button
                            type="button"
                            x-show="loading"
                            x-cloak
                            disabled
                            @class([
                                'inline-flex items-center justify-center',
                                $actionBtnClass,
                                $sendActiveClass,
                            ])
                            aria-label="Enviando"
                        >
                            <span class="size-4 animate-spin rounded-full border-2 border-current border-t-transparent" aria-hidden="true"></span>
                        </button>
                    @endif
                @endif
            </div>
        </div>

        @if ($hasToolsPanel || $showTools)
            <div
                x-show="toolsOpen"
                x-cloak
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @class(['mt-3 rounded-2xl border p-3 text-sm', $toolsPanelClass])
            >
                @isset($tools)
                    {{ $tools }}
                @else
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-xs font-medium uppercase tracking-wide opacity-70">Modelo</span>
                        <span @class(['rounded-full px-2.5 py-1 text-xs font-medium', $toolsChipClass])>Padrão</span>
                        <span @class(['rounded-full px-2.5 py-1 text-xs font-medium opacity-70', $toolsChipMutedClass])>Rápido</span>
                        <span @class(['rounded-full px-2.5 py-1 text-xs font-medium opacity-70', $toolsChipMutedClass])>Preciso</span>
                    </div>
                @endisset
            </div>
        @endif

        @if ($hasFooter)
            <div class="mt-2 text-xs opacity-60">
                {{ $footer }}
            </div>
        @endif
    </div>

    <input
        x-ref="fileInput"
        type="file"
        class="hidden"
        accept="{{ $accept }}"
        @if ($multiple) multiple @endif
        @change="onFilesSelected($event)"
        tabindex="-1"
    >
</div>
