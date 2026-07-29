@props([
    'title' => null,
    'code' => '',
    'livewire' => null,
    'html' => null,
    'json' => null,
    'section' => null,
    'group' => 'examples',
    'groupLabel' => null,
    'copyable' => true,
    'copyLabel' => 'Copiar',
    'copiedLabel' => 'Copiado!',
])

@php
    $livewireSource = trim((string) ($livewire ?? $code));
    $htmlSource = filled($html) ? trim((string) $html) : '';
    $jsonSource = filled($json) ? trim((string) $json) : '';

    $sources = array_filter([
        'html' => $htmlSource,
        'livewire' => $livewireSource,
        'json' => $jsonSource,
    ], fn (string $value): bool => $value !== '');

    $initialFormat = array_key_first($sources) ?? 'livewire';
    $hasFormatSwitcher = count($sources) > 1;

    $sectionId = $section ?: ($title ? \Illuminate\Support\Str::slug((string) $title) : null);

    $formatMeta = [
        'livewire' => ['label' => 'Livewire', 'language' => 'blade'],
        'html' => ['label' => 'HTML', 'language' => 'html'],
        'json' => ['label' => 'JSON', 'language' => 'json'],
    ];
@endphp

{{--
    Bloco de documentação: Preview / Code + Copy.
    Formatos opcionais Livewire / HTML / JSON na barra dos 3 pontinhos
    (só aparecem quando há mais de um formato).
    Alpine.data('uiExample') em resources/js/example.js.
    Com title, registra âncora no TOC de <x-ui.docs> via data-docs-section.
--}}
<div
    x-data="uiExample(@js($sources), @js($copyLabel), @js($copiedLabel), @js($initialFormat))"
    @if ($sectionId)
        id="{{ $sectionId }}"
        data-docs-section="{{ $sectionId }}"
        data-docs-label="{{ $title }}"
        data-docs-group="{{ $group }}"
        @if (filled($groupLabel)) data-docs-group-label="{{ $groupLabel }}" @endif
    @endif
    {{ $attributes->class(['ui-example w-full min-w-0 space-y-3']) }}
>
    @if (filled($title))
        <h3 class="text-lg font-semibold tracking-tight text-foreground">{{ $title }}</h3>
    @endif

    @isset($description)
        <div class="text-sm leading-relaxed text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            {{ $description }}
        </div>
    @endisset

    <div class="flex flex-wrap items-center justify-between gap-3">
        <div
            class="inline-flex items-center rounded-lg bg-muted p-0.5"
            role="tablist"
            aria-label="Alternar preview e código"
        >
            <button
                type="button"
                role="tab"
                x-bind:aria-selected="tab === 'preview'"
                x-on:click="showPreview()"
                x-bind:class="previewTabClass"
                class="rounded-md px-3 py-1.5 text-sm font-medium transition-colors"
            >
                Preview
            </button>
            <button
                type="button"
                role="tab"
                x-bind:aria-selected="tab === 'code'"
                x-on:click="showCode()"
                x-bind:class="codeTabClass"
                class="rounded-md px-3 py-1.5 text-sm font-medium transition-colors"
            >
                Code
            </button>
        </div>

        {{--@if ($copyable)
            <button
                type="button"
                x-show="tab === 'code'"
                x-cloak
                x-on:click="copy()"
                x-bind:aria-label="copyButtonLabel"
                class="inline-flex size-8 items-center justify-center rounded-md border border-border bg-card text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                title="Copiar código"
            >
                <i
                    class="bi text-sm leading-none"
                    x-bind:class="copyIconClass"
                    aria-hidden="true"
                ></i>
            </button>
        @endif--}}
    </div>

    <div class="overflow-hidden rounded-xl border border-border bg-card shadow-sm">
        <div class="flex items-center gap-2 border-b border-border bg-muted/50 px-3 py-2">
            <div class="flex items-center gap-1.5" aria-hidden="true">
                <span class="size-2 rounded-full bg-border"></span>
                <span class="size-2 rounded-full bg-border"></span>
                <span class="size-2 rounded-full bg-border"></span>
            </div>

            @if ($hasFormatSwitcher)
                <div
                    x-show="tab === 'code'"
                    x-cloak
                    class="ms-auto inline-flex items-center rounded-md bg-muted p-0.5"
                    role="tablist"
                    aria-label="Formato do código"
                >
                    @foreach ($sources as $formatKey => $formatSource)
                        <button
                            type="button"
                            role="tab"
                            x-bind:aria-selected="format === @js($formatKey)"
                            x-on:click="setFormat(@js($formatKey))"
                            x-bind:class="formatTabClass(@js($formatKey))"
                            class="rounded px-2.5 py-1 text-xs font-medium transition-colors"
                        >
                            {{ $formatMeta[$formatKey]['label'] }}
                        </button>
                    @endforeach
                </div><button
					type="button"
			        x-show="tab === 'code'"
			        x-cloak
			        x-on:click="copy()"
			        x-bind:aria-label="copyButtonLabel"
			        class="inline-flex size-8 items-center justify-center rounded-md border border-border bg-card text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
			        title="Copiar código"
				>
					<i
						class="bi text-sm leading-none"
				        x-bind:class="copyIconClass"
				        aria-hidden="true"
					></i>
				</button>
            @endif
        </div>

        <div role="tabpanel" x-show="tab === 'preview'" class="bg-card p-4 text-foreground sm:p-5">
            <div class="flex w-full min-w-0 flex-wrap items-center gap-2">
                {{ $slot }}
            </div>
        </div>

        <div role="tabpanel" x-show="tab === 'code'" x-cloak class="bg-card">
            {{-- x-if: Shiki/Alpine do editor só inicia ao abrir Code / cada formato pela 1ª vez --}}
            @foreach ($sources as $formatKey => $formatSource)
                <template x-if="codeMounted && formatsMounted[@js($formatKey)]">
                    <div x-show="format === @js($formatKey)" x-cloak>
                        <x-ui.code-editor
                            :code="$formatSource"
                            :language="$formatMeta[$formatKey]['language']"
                            theme="github-dark"
                            :show-header="false"
                            :copyable="false"
                            max-height="28rem"
                            :label="'Código do exemplo ('.$formatMeta[$formatKey]['label'].')'"
                            class="rounded-none border-0"
                        />
                    </div>
                </template>
            @endforeach
        </div>
    </div>
</div>
