@php
    if ($preview) {
        $wrapperClasses = 'relative z-0 w-full';
    } elseif ($isModal) {
        $wrapperClasses = 'fixed inset-0 z-[120] flex items-center justify-center p-4';
    } elseif ($isBar) {
        $wrapperClasses = 'fixed z-[120] '.$barPositionClasses;
    } else {
        $wrapperClasses = 'fixed z-[120] '.$floatingPositionClasses;
    }

    $titleId = 'cookie-alert-title-'.md5((string) $storageKey);
@endphp

<div
    x-show="open"
    x-cloak
    @if ($isModal && ! $preview)
        x-trap.noscroll="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    @endif
    class="{{ $wrapperClasses }}"
    role="dialog"
    aria-modal="{{ $isModal && ! $preview ? 'true' : 'false' }}"
    aria-labelledby="{{ $titleId }}"
    aria-live="polite"
>
    @if ($isModal && ! $preview)
        <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
    @endif

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="{{ $enterFrom }}"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="opacity-0"
        @class([
            'relative',
            $panelWidthClasses,
            $shellClasses,
            'shadow-md' => $preview,
            'mx-auto' => $preview,
        ])
    >
        <div @class([
            'mx-auto flex gap-4 p-4 sm:p-5',
            'max-w-5xl flex-col lg:flex-row lg:items-center' => $isBar,
            'flex-col' => ! $isBar,
        ])>
            <div class="flex min-w-0 flex-1 items-start gap-3">
                @if ($iconClass)
                    <span
                        class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg {{ $iconToneClasses }}"
                        aria-hidden="true"
                    >
                        <i class="bi {{ $iconClass }} text-lg leading-none" aria-hidden="true"></i>
                    </span>
                @endif

                <div class="min-w-0 flex-1">
                    @if ($title)
                        <p
                            id="{{ $titleId }}"
                            class="mb-1 text-sm font-semibold leading-tight tracking-tight"
                        >{{ $title }}</p>
                    @endif

                    <div class="text-sm leading-relaxed {{ $title ? 'opacity-80' : '' }}">
                        @if ($hasBody)
                            {{ $slot }}
                        @else
                            {{ $defaultBody }}
                        @endif

                        @if ($policyUrl)
                            <span class="ms-1">
                                <x-ui.link
                                    :href="$policyUrl"
                                    :color="$variant === 'solid' ? 'secondary' : $color"
                                    underline="always"
                                    size="sm"
                                    external
                                >{{ $policyLabel }}</x-ui.link>
                            </span>
                        @endif
                    </div>
                </div>

                @if ($dismissible)
                    <button
                        type="button"
                        @click="hide()"
                        class="-m-1 shrink-0 rounded-md p-1 opacity-60 transition-opacity hover:opacity-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-current"
                        aria-label="Fechar aviso de cookies"
                    >
                        <i class="bi bi-x-lg text-sm leading-none" aria-hidden="true"></i>
                    </button>
                @endif
            </div>

            <div
                x-show="! customizing"
                @class([
                    'flex shrink-0 flex-wrap items-center gap-2',
                    'lg:justify-end' => $isBar,
                ])
            >
                @if ($showCustomize)
                    <x-ui.button
                        type="button"
                        :color="$variant === 'solid' ? 'secondary' : $color"
                        :variant="$variant === 'solid' ? 'soft' : 'ghost'"
                        size="sm"
                        @click="toggleCustomize()"
                    >
                        {{ $customizeLabel }}
                    </x-ui.button>
                @endif

                @if ($showDecline)
                    <x-ui.button
                        type="button"
                        :color="$variant === 'solid' ? 'secondary' : $color"
                        :variant="$variant === 'solid' ? 'soft' : 'outline'"
                        size="sm"
                        @click="decline()"
                    >
                        {{ $declineLabel }}
                    </x-ui.button>
                @endif

                <x-ui.button
                    type="button"
                    :color="$variant === 'solid' ? 'secondary' : $color"
                    :variant="$variant === 'solid' ? 'soft' : 'solid'"
                    size="sm"
                    @click="accept()"
                >
                    {{ $acceptLabel }}
                </x-ui.button>
            </div>
        </div>

        <div
            x-show="customizing"
            x-collapse
            class="border-t border-current/10 px-4 pb-4 sm:px-5 sm:pb-5"
        >
            <div @class([
                'flex flex-col gap-3 pt-4',
                'mx-auto max-w-5xl' => $isBar,
            ])>
                <template x-for="cat in categoryDefs" :key="cat.key">
                    <label
                        class="flex cursor-pointer items-start gap-3 rounded-lg border border-current/10 bg-black/5 p-3 dark:bg-white/5"
                        x-bind:class="cat.required ? 'cursor-default opacity-80' : ''"
                    >
                        <input
                            type="checkbox"
                            class="mt-0.5 size-4 shrink-0 rounded border-border text-primary focus:ring-primary"
                            x-bind:checked="categories[cat.key]"
                            x-bind:disabled="cat.required"
                            @change="toggleCategory(cat.key)"
                        >
                        <span class="min-w-0 flex-1">
                            <span class="flex flex-wrap items-center gap-2">
                                <span class="text-sm font-semibold" x-text="cat.label"></span>
                                <span
                                    x-show="cat.required"
                                    class="rounded bg-current/10 px-1.5 py-0.5 text-[10px] font-semibold uppercase tracking-wide"
                                >Obrigatório</span>
                            </span>
                            <span
                                class="mt-0.5 block text-xs leading-relaxed opacity-75"
                                x-text="cat.description"
                            ></span>
                        </span>
                    </label>
                </template>
            </div>

            <div @class([
                'mt-4 flex flex-wrap items-center justify-end gap-2',
                'mx-auto max-w-5xl' => $isBar,
            ])>
                <x-ui.button
                    type="button"
                    :color="$variant === 'solid' ? 'secondary' : $color"
                    :variant="$variant === 'solid' ? 'soft' : 'ghost'"
                    size="sm"
                    @click="customizing = false"
                >
                    Voltar
                </x-ui.button>
                <x-ui.button
                    type="button"
                    :color="$variant === 'solid' ? 'secondary' : $color"
                    :variant="$variant === 'solid' ? 'soft' : 'solid'"
                    size="sm"
                    @click="saveCustom()"
                >
                    {{ $saveLabel }}
                </x-ui.button>
            </div>
        </div>
    </div>
</div>
