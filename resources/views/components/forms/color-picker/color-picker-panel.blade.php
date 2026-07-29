{{-- Painel interno do <x-forms.color-picker> — não usar isolado. --}}
<div class="flex flex-col">
    <div class="flex items-center justify-between gap-2 border-b border-border px-3 py-2.5">
        <div class="flex items-center gap-2">
            <span
                class="size-8 shrink-0 rounded-md border border-border shadow-inner"
                x-bind:style="swatchStyle"
                aria-hidden="true"
            ></span>
            <div class="min-w-0">
                <p class="mb-0 text-[10px] font-medium tracking-[0.12em] text-muted-foreground uppercase">Cor</p>
                <p class="mb-0 truncate font-mono text-sm font-semibold tabular-nums text-foreground" x-text="hasValue ? value : '—'"></p>
            </div>
        </div>

        <div class="flex items-center gap-1">
            <template x-if="showEyedropper && eyedropperSupported">
                <button
                    type="button"
                    @click="eyedrop()"
                    class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground"
                    aria-label="Conta-gotas"
                    title="Conta-gotas"
                >
                    <i class="bi bi-eyedropper text-sm leading-none" aria-hidden="true"></i>
                </button>
            </template>

            <template x-if="showCopy">
                <button
                    type="button"
                    @click="copy()"
                    x-bind:disabled="! hasValue"
                    class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40"
                    x-bind:aria-label="copied ? 'Copiado' : 'Copiar cor'"
                    title="Copiar"
                >
                    <i
                        class="bi text-sm leading-none"
                        x-bind:class="copied ? 'bi-check-lg text-success' : 'bi-clipboard'"
                        aria-hidden="true"
                    ></i>
                </button>
            </template>
        </div>
    </div>

    <div class="space-y-3 p-3">
        <div
            x-ref="satval"
            class="relative h-40 w-full cursor-crosshair touch-none overflow-hidden rounded-lg border border-border"
            x-bind:style="satValStyle"
            @pointerdown="startDrag('satval', $event)"
        >
            <span
                class="pointer-events-none absolute size-4 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-white shadow"
                x-bind:style="pointerStyle"
                aria-hidden="true"
            ></span>
        </div>

        <div class="space-y-2">
            <div
                x-ref="hue"
                class="relative h-3 w-full cursor-pointer touch-none rounded-full border border-border"
                x-bind:style="'background:' + hueGradient"
                @pointerdown="startDrag('hue', $event)"
                role="slider"
                aria-label="Matiz"
                x-bind:aria-valuenow="hue"
                aria-valuemin="0"
                aria-valuemax="360"
            >
                <span
                    class="pointer-events-none absolute top-1/2 size-4 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-white bg-white shadow"
                    x-bind:style="'left:' + (hue / 360 * 100) + '%'"
                    aria-hidden="true"
                ></span>
            </div>

            <template x-if="alpha">
                <div
                    x-ref="alpha"
                    class="relative h-3 w-full cursor-pointer touch-none rounded-full border border-border"
                    style="background-image:linear-gradient(45deg,#ccc 25%,transparent 25%),linear-gradient(-45deg,#ccc 25%,transparent 25%),linear-gradient(45deg,transparent 75%,#ccc 75%),linear-gradient(-45deg,transparent 75%,#ccc 75%);background-size:8px 8px;background-position:0 0,0 4px,4px -4px,-4px 0;"
                    @pointerdown="startDrag('alpha', $event)"
                    role="slider"
                    aria-label="Opacidade"
                    x-bind:aria-valuenow="Math.round(alphaValue * 100)"
                    aria-valuemin="0"
                    aria-valuemax="100"
                >
                    <div
                        class="absolute inset-0 rounded-full"
                        x-bind:style="'background:' + alphaGradient"
                    ></div>
                    <span
                        class="pointer-events-none absolute top-1/2 size-4 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-white bg-white shadow"
                        x-bind:style="'left:' + (alphaValue * 100) + '%'"
                        aria-hidden="true"
                    ></span>
                </div>
            </template>
        </div>

        <div class="flex items-center gap-2">
            <div class="inline-flex shrink-0 rounded-md border border-border bg-muted/40 p-0.5">
                <template x-for="fmt in formatOptions" x-bind:key="'fmt-' + fmt">
                    <button
                        type="button"
                        @click="setFormat(fmt)"
                        class="rounded px-2 py-1 text-[10px] font-semibold uppercase tracking-wide transition-colors"
                        x-bind:class="format === fmt
                            ? '{{ $formatActiveClasses }}'
                            : 'text-muted-foreground hover:text-foreground'"
                        x-text="fmt"
                    ></button>
                </template>
            </div>

            <template x-if="showInput">
                <input
                    x-ref="hexInput"
                    type="text"
                    x-model="textValue"
                    @input="onTextInput()"
                    @blur="onTextBlur()"
                    @keydown="onTextKeydown($event)"
                    @click.stop
                    x-bind:placeholder="placeholder"
                    autocomplete="off"
                    spellcheck="false"
                    class="min-w-0 flex-1 rounded-md border border-border bg-card px-2.5 py-1.5 font-mono text-xs text-foreground outline-none placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30"
                />
            </template>

            <template x-if="showNative">
                <input
                    type="color"
                    class="size-9 shrink-0 cursor-pointer rounded-md border border-border bg-transparent p-0.5"
                    x-bind:value="hasValue ? (value.startsWith('#') ? value.slice(0, 7) : hsvToHex(hue, sat, val)) : '#000000'"
                    @input="onNativeInput($event)"
                    @click.stop
                    aria-label="Seletor nativo"
                />
            </template>
        </div>
    </div>

    <template x-if="showPresets && presets.length > 0">
        <div class="border-t border-border px-3 py-2.5">
            <p class="mb-2 text-[10px] font-medium tracking-[0.12em] text-muted-foreground uppercase">Paleta</p>
            <div class="grid grid-cols-8 gap-1.5">
                <template x-for="(preset, index) in presets" x-bind:key="'preset-' + index + '-' + preset">
                    <button
                        type="button"
                        @click="applyPreset(preset)"
                        class="relative aspect-square rounded-md border border-border transition-transform hover:scale-105 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40"
                        x-bind:style="'background-color:' + preset"
                        x-bind:aria-label="'Selecionar ' + preset"
                        x-bind:title="preset"
                    >
                        <span
                            x-show="isPresetActive(preset)"
                            x-cloak
                            class="absolute inset-0 flex items-center justify-center rounded-md bg-black/20"
                        >
                            <i class="bi bi-check-lg text-sm text-white drop-shadow" aria-hidden="true"></i>
                        </span>
                    </button>
                </template>
            </div>
        </div>
    </template>

    <template x-if="showRecent && recent.length > 0">
        <div class="border-t border-border px-3 py-2.5">
            <p class="mb-2 text-[10px] font-medium tracking-[0.12em] text-muted-foreground uppercase">Recentes</p>
            <div class="grid grid-cols-8 gap-1.5">
                <template x-for="(item, index) in recent" x-bind:key="'recent-' + index + '-' + item">
                    <button
                        type="button"
                        @click="applyPreset(item)"
                        class="relative aspect-square rounded-md border border-border transition-transform hover:scale-105 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40"
                        x-bind:style="'background-color:' + item"
                        x-bind:aria-label="'Selecionar ' + item"
                        x-bind:title="item"
                    >
                        <span
                            x-show="isPresetActive(item)"
                            x-cloak
                            class="absolute inset-0 flex items-center justify-center rounded-md bg-black/20"
                        >
                            <i class="bi bi-check-lg text-sm text-white drop-shadow" aria-hidden="true"></i>
                        </span>
                    </button>
                </template>
            </div>
        </div>
    </template>
</div>
