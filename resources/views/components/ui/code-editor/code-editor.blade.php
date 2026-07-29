@props([
    'code' => null,
    'value' => null,
    'language' => 'php',
    'theme' => 'monokai',
    'filename' => null,
    'copyable' => true,
    'showHeader' => true,
    'maxHeight' => '28rem',
    'label' => 'Código',
    'copyLabel' => 'Copiar',
    'copiedLabel' => 'Copiado!',
])

@php
    $themes = [
        'monokai',
        'one-dark-pro',
        'dracula',
        'github-dark',
        'github-light',
        'nord',
        'tokyo-night',
        'catppuccin-mocha',
        'catppuccin-latte',
        'vitesse-dark',
        'vitesse-light',
        'rose-pine',
        'material-theme-darker',
        'dark-plus',
        'night-owl',
        'poimandres',
    ];

    if (! in_array($theme, $themes, true)) {
        $theme = 'monokai';
    }

    $slotCode = isset($slot) ? trim((string) $slot) : '';
    $source = $code !== null ? (string) $code : ($value !== null ? (string) $value : $slotCode);

    $maxHeightValue = is_numeric($maxHeight) ? $maxHeight.'px' : (string) $maxHeight;

    $config = [
        'code' => $source,
        'language' => $language,
        'theme' => $theme,
        'filename' => $filename,
        'copyable' => (bool) $copyable,
        'showHeader' => (bool) $showHeader,
        'maxHeight' => $maxHeightValue,
        'copyLabel' => $copyLabel,
        'copiedLabel' => $copiedLabel,
    ];
@endphp

{{-- Bloco de código com Shiki: https://shiki.style/ — Alpine.data('codeEditor') --}}
<div
    x-data="codeEditor(@js($config))"
    x-modelable="value"
    x-bind:style="frameStyle"
    {{ $attributes->class(['ui-code-editor w-full min-w-0']) }}
    role="region"
    aria-label="{{ $label }}"
>
    <div class="ui-code-editor-header" x-show="hasHeader" x-cloak>
        <div class="ui-code-editor-title min-w-0 truncate">
            <template x-if="filename">
                <span class="inline-flex min-w-0 items-center gap-1.5 truncate">
                    <i class="bi bi-file-earmark-code shrink-0" aria-hidden="true"></i>
                    <span class="truncate" x-text="filename"></span>
                </span>
            </template>
            <template x-if="! filename">
                <span class="uppercase tracking-wide" x-text="languageLabel"></span>
            </template>
        </div>

        <button
            type="button"
            class="ui-code-editor-copy shrink-0"
            x-show="copyable"
            x-cloak
            x-on:click="copy()"
            x-bind:aria-label="copied ? copiedLabel : copyLabel"
        >
            <i
                class="bi text-sm leading-none"
                x-bind:class="failed ? 'bi-x-lg' : (copied ? 'bi-check2' : 'bi-clipboard')"
                aria-hidden="true"
            ></i>
            <span x-text="failed ? 'Erro' : (copied ? copiedLabel : copyLabel)"></span>
        </button>
    </div>

    <div class="ui-code-editor-body">
        <div class="ui-code-editor-loading" x-show="! ready" x-cloak>Carregando highlight…</div>
        <div x-show="ready" x-html="html"></div>
    </div>
</div>
