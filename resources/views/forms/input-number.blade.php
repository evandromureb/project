<?php

use Livewire\Component;

return new class extends Component
{
    public string|int|float|null $quantity = 1;

    public string|int|float|null $price = 1999.9;

    public string|int|float|null $discount = 10;

    public string|int|float|null $weight = null;

    public function save(): void
    {
        $this->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
            'price' => ['required', 'numeric', 'min:0'],
            'discount' => ['required', 'numeric', 'min:0', 'max:100'],
            'weight' => ['nullable', 'numeric', 'min:0'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.input-number label="Quantidade" name="qty" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-number-qty" class="text-sm font-medium text-foreground">Quantidade</label>
    <input type="hidden" name="qty" value="">
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text pe-1 w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-123 leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="text" role="spinbutton" id="input-number-qty" value="" placeholder="0,00" autocomplete="off" inputmode="decimal" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full">
            </div>
            <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
            </div>
        </div>
    </div>
</div>
HTML;

    $integerCode = <<<'BLADE'
<x-forms.input-number
    mode="integer"
    label="Unidades"
    name="units"
    :min="1"
    :max="99"
    :value="1"
/>
BLADE;

    $integerHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-number-units" class="text-sm font-medium text-foreground">Unidades</label>
    <input type="hidden" name="units" value="1">
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text pe-1 w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="text" role="spinbutton" id="input-number-units" value="1" aria-valuemin="1" aria-valuemax="99" placeholder="0" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full">
            </div>
            <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
            </div>
        </div>
    </div>
</div>
HTML;

    $currencyCode = <<<'BLADE'
<x-forms.input-number
    mode="currency"
    label="Preço"
    name="price"
    :value="1999.9"
    hint="Formata no blur: 1.999,90"
/>
BLADE;

    $currencyHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-number-price" class="text-sm font-medium text-foreground">Preço</label>
    <input type="hidden" name="price" value="1999.9">
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text pe-1 w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-currency-dollar leading-none text-sm"></i></span>
            <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">R$</span>
            <div class="relative min-w-0 flex-1">
                <input type="text" role="spinbutton" id="input-number-price" value="1999.9" placeholder="0,00" autocomplete="off" inputmode="decimal" aria-describedby="input-number-price-hint" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full">
            </div>
            <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
            </div>
        </div>
    </div>
    <div class="min-w-0">
        <p id="input-number-price-hint" class="mb-0 text-xs text-muted-foreground">Formata no blur: 1.999,90</p>
    </div>
</div>
HTML;

    $percentCode = <<<'BLADE'
<x-forms.input-number
    mode="percent"
    label="Desconto"
    name="discount"
    :value="10"
/>
BLADE;

    $percentHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-number-discount" class="text-sm font-medium text-foreground">Desconto</label>
    <input type="hidden" name="discount" value="10">
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text pe-1 w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-percent leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="text" role="spinbutton" id="input-number-discount" value="10" aria-valuemin="0" aria-valuemax="100" placeholder="0,00" autocomplete="off" inputmode="decimal" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full">
            </div>
            <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">%</span>
            <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
            </div>
        </div>
    </div>
</div>
HTML;

    $sideControlsCode = <<<'BLADE'
<x-forms.input-number
    mode="integer"
    label="Assentos"
    name="seats"
    controls-position="side"
    :min="0"
    :max="20"
    :value="2"
/>
BLADE;

    $sideControlsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-number-seats" class="text-sm font-medium text-foreground">Assentos</label>
    <input type="hidden" name="seats" value="2">
    <div class="flex w-full items-stretch rounded-lg focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <button type="button" class="box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground h-9.5 text-sm px-3 [&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none [&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none border border-r-0 justify-center px-0 rounded-l-lg cursor-pointer bg-muted" aria-label="Diminuir" tabindex="-1"><i class="bi bi-dash-lg text-sm leading-none"></i></button>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text rounded-l-none rounded-r-none min-w-0 flex-1">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="text" role="spinbutton" id="input-number-seats" value="2" aria-valuemin="0" aria-valuemax="20" placeholder="0" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full">
            </div>
        </div>
        <button type="button" class="box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground h-9.5 text-sm px-3 [&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none [&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none border border-l-0 justify-center px-0 rounded-r-lg cursor-pointer bg-muted" aria-label="Aumentar" tabindex="-1"><i class="bi bi-plus-lg text-sm leading-none"></i></button>
    </div>
</div>
HTML;

    $noControlsCode = <<<'BLADE'
<x-forms.input-number
    label="Código"
    name="code"
    mode="integer"
    :controls="false"
    align="start"
    :allow-negative="false"
/>
BLADE;

    $noControlsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-number-code" class="text-sm font-medium text-foreground">Código</label>
    <input type="hidden" name="code" value="">
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="text" role="spinbutton" id="input-number-code" value="" placeholder="0" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-start h-full w-full">
            </div>
        </div>
    </div>
</div>
HTML;

    $customCode = <<<'BLADE'
<x-forms.input-number
    label="Peso"
    name="weight"
    :decimals="3"
    :step="0.001"
    :min="0"
    suffix="kg"
    clearable
    wheel
/>
BLADE;

    $customHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-number-weight" class="text-sm font-medium text-foreground">Peso</label>
    <input type="hidden" name="weight" value="">
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text pe-1 w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-123 leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="text" role="spinbutton" id="input-number-weight" value="" aria-valuemin="0" placeholder="0,00" autocomplete="off" inputmode="decimal" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full">
            </div>
            <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">kg</span>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 rounded-full" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
            <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
            </div>
        </div>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.input-number size="sm" label="Pequeno" name="n_sm" mode="integer" />
<x-forms.input-number size="md" label="Médio" name="n_md" mode="integer" />
<x-forms.input-number size="lg" label="Grande" name="n_lg" mode="integer" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-number-n_sm" class="text-xs font-medium text-foreground">Pequeno</label>
        <input type="hidden" name="n_sm" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-8 text-xs px-2.5 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" id="input-number-n_sm" value="" placeholder="0" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-number-n_md" class="text-sm font-medium text-foreground">Médio</label>
        <input type="hidden" name="n_md" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" id="input-number-n_md" value="" placeholder="0" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-number-n_lg" class="text-sm font-medium text-foreground">Grande</label>
        <input type="hidden" name="n_lg" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-11 text-base px-3.5 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-base"></i></span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" id="input-number-n_lg" value="" placeholder="0" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.input-number variant="default" label="Default" name="v_default" mode="integer" />
<x-forms.input-number variant="filled" label="Filled" name="v_filled" mode="integer" />
<x-forms.input-number variant="flush" label="Flush" name="v_flush" mode="integer" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-number-v_default" class="text-sm font-medium text-foreground">Default</label>
        <input type="hidden" name="v_default" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" id="input-number-v_default" value="" placeholder="0" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-number-v_filled" class="text-sm font-medium text-foreground">Filled</label>
        <input type="hidden" name="v_filled" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border border-transparent bg-muted shadow-none border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" id="input-number-v_filled" value="" placeholder="0" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-number-v_flush" class="text-sm font-medium text-foreground">Flush</label>
        <input type="hidden" name="v_flush" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-none border-0 border-b border-border bg-transparent shadow-none focus-within:ring-0 focus-within:border-b-2 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" id="input-number-v_flush" value="" placeholder="0" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.input-number label="Sucesso" name="ok" state="success" mode="currency" :value="50" />
<x-forms.input-number label="Erro" name="bad" error="Informe um valor válido." mode="currency" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-number-ok" class="text-sm font-medium text-foreground">Sucesso</label>
        <input type="hidden" name="ok" value="50">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-success focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success h-9.5 text-sm px-3 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success" aria-hidden="true"><i class="bi bi-currency-dollar leading-none text-sm"></i></span>
                <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">R$</span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" id="input-number-ok" value="50" placeholder="0,00" autocomplete="off" inputmode="decimal" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-number-bad" class="text-sm font-medium text-foreground">Erro</label>
        <input type="hidden" name="bad" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-danger focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger h-9.5 text-sm px-3 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger" aria-hidden="true"><i class="bi bi-currency-dollar leading-none text-sm"></i></span>
                <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">R$</span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" id="input-number-bad" value="" placeholder="0,00" autocomplete="off" inputmode="decimal" aria-invalid="true" aria-describedby="input-number-bad-error" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
        <div class="min-w-0"><p id="input-number-bad-error" class="mb-0 text-xs text-danger" role="alert">Informe um valor válido.</p></div>
    </div>
</div>
HTML;

    $floatingCode = <<<'BLADE'
<x-forms.input-number floating label="Valor" mode="currency" name="float_price" />
<x-forms.input-number floating label="Taxa" mode="percent" name="float_rate" />
BLADE;

    $floatingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <input type="hidden" name="float_price" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-currency-dollar leading-none text-sm"></i></span>
                <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">R$</span>
                <div class="relative min-w-0 flex-1 h-full">
                    <input type="text" role="spinbutton" id="input-number-float_price" value="" placeholder=" " autocomplete="off" inputmode="decimal" class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end">
                    <label for="input-number-float_price" class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1/2 -translate-y-1/2 text-sm">Valor</label>
                </div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="hidden" name="float_rate" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-percent leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1 h-full">
                    <input type="text" role="spinbutton" id="input-number-float_rate" value="" aria-valuemin="0" aria-valuemax="100" placeholder=" " autocomplete="off" inputmode="decimal" class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end">
                    <label for="input-number-float_rate" class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1/2 -translate-y-1/2 text-sm">Taxa</label>
                </div>
                <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">%</span>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.input-number label="Desabilitado" disabled mode="integer" :value="10" />
<x-forms.input-number label="Readonly" readonly mode="currency" :value="25.5" />
<x-forms.input-number label="Loading" loading mode="decimal" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Desabilitado</label>
        <input type="hidden" value="10" disabled>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-not-allowed opacity-60 pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" value="10" placeholder="0" autocomplete="off" inputmode="numeric" disabled class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" disabled class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" disabled class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Readonly</label>
        <input type="hidden" value="25.5">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-currency-dollar leading-none text-sm"></i></span>
                <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">R$</span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" value="25.5" placeholder="0,00" autocomplete="off" inputmode="decimal" readonly class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Loading</label>
        <input type="hidden" value="" disabled>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-not-allowed opacity-60 pe-1 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-123 leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" value="" placeholder="0,00" autocomplete="off" inputmode="decimal" disabled class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
                <span class="relative z-10 size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
                <div class="relative z-10 flex h-[calc(100%-0.25rem)] w-6 shrink-0 flex-col overflow-hidden rounded-md border border-border">
                    <button type="button" disabled class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40 border-b border-border" aria-label="Aumentar" tabindex="-1"><i class="bi bi-chevron-up text-[10px] leading-none"></i></button>
                    <button type="button" disabled class="flex flex-1 items-center justify-center text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none disabled:opacity-40" aria-label="Diminuir" tabindex="-1"><i class="bi bi-chevron-down text-[10px] leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $addonsCode = <<<'BLADE'
<x-forms.input-number label="SKU qty" mode="integer" name="sku_qty" :controls="false">
    <x-slot:addon-start>QTD</x-slot:addon-start>
    <x-slot:addon-end>un</x-slot:addon-end>
</x-forms.input-number>
BLADE;

    $addonsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-number-sku_qty" class="text-sm font-medium text-foreground">SKU qty</label>
    <input type="hidden" name="sku_qty" value="">
    <div class="flex w-full items-stretch rounded-lg focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground h-9.5 text-sm px-3 [&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none [&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none border border-r-0 rounded-l-lg">QTD</div>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text shadow-none rounded-l-none rounded-r-none min-w-0 flex-1">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-hash leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1"><input type="text" role="spinbutton" id="input-number-sku_qty" value="" placeholder="0" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none tabular-nums placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end h-full w-full"></div>
        </div>
        <div class="box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground h-9.5 text-sm px-3 [&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none [&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none border border-l-0 rounded-r-lg">un</div>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.input-number&gt;</code> é o campo numérico completo:
            steppers, <code>min</code>/<code>max</code>/<code>step</code>, formatação pt-BR,
            modos <code>integer</code>, <code>decimal</code>, <code>currency</code> e
            <code>percent</code>, teclado (setas, PageUp/Down, Home/End) e binding numérico
            para Livewire via <code>value-mode="number"</code> (padrão).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico (decimal)" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Padrão <code>mode="decimal"</code> com steppers empilhados no fim.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-number label="Quantidade" name="demo_qty" />
            </div>
        </x-ui.example>

        <x-ui.example title="Inteiro com limites" :code="$integerCode" :html="$integerHtml">
            <x-slot:description>
                <code>mode="integer"</code> + <code>min</code>/<code>max</code>. Home/End saltam aos limites.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-number
                    mode="integer"
                    label="Unidades"
                    name="demo_units"
                    :min="1"
                    :max="99"
                    :value="1"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Moeda" :code="$currencyCode" :html="$currencyHtml">
            <x-slot:description>
                <code>mode="currency"</code> aplica prefixo <code>R$</code> e 2 casas.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-number
                    mode="currency"
                    label="Preço"
                    name="demo_price"
                    :value="1999.9"
                    hint="Formata no blur: 1.999,90"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Percentual" :code="$percentCode" :html="$percentHtml">
            <x-slot:description>
                <code>mode="percent"</code> usa sufixo <code>%</code> e limita 0–100.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-number
                    mode="percent"
                    label="Desconto"
                    name="demo_discount"
                    :value="10"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Controles laterais" :code="$sideControlsCode" :html="$sideControlsHtml">
            <x-slot:description>
                <code>controls-position="side"</code> mostra − e + como addons.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-number
                    mode="integer"
                    label="Assentos"
                    name="demo_seats"
                    controls-position="side"
                    :min="0"
                    :max="20"
                    :value="2"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Sem steppers" :code="$noControlsCode" :html="$noControlsHtml">
            <x-slot:description>
                Desligue com <code>:controls="false"</code>. Útil para códigos numéricos.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-number
                    label="Código"
                    name="demo_code"
                    mode="integer"
                    :controls="false"
                    align="start"
                    :allow-negative="false"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Customizado (peso)" :code="$customCode" :html="$customHtml">
            <x-slot:description>
                Ajuste <code>decimals</code>, <code>step</code>, <code>suffix</code>, <code>clearable</code> e <code>wheel</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-number
                    label="Peso"
                    name="demo_weight"
                    :decimals="3"
                    :step="0.001"
                    :min="0"
                    suffix="kg"
                    clearable
                    wheel
                    hint="Scroll com o campo focado para alterar."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-number size="sm" label="Pequeno" name="demo_sm" mode="integer" />
                <x-forms.input-number size="md" label="Médio" name="demo_md" mode="integer" />
                <x-forms.input-number size="lg" label="Grande" name="demo_lg" mode="integer" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Mesmas variantes do input: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-number variant="default" label="Default" name="demo_v_default" mode="integer" />
                <x-forms.input-number variant="filled" label="Filled" name="demo_v_filled" mode="integer" />
                <x-forms.input-number variant="flush" label="Flush" name="demo_v_flush" mode="integer" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> / <code>error</code> com detecção automática via <code>$errors</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-number label="Sucesso" name="demo_ok" state="success" mode="currency" :value="50" />
                <x-forms.input-number label="Erro" name="demo_bad" error="Informe um valor válido." mode="currency" />
            </div>
        </x-ui.example>

        <x-ui.example title="Floating label" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                <code>floating</code> com a mesma lógica Alpine do input.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-number floating label="Valor" mode="currency" name="demo_float_price" />
                <x-forms.input-number floating label="Taxa" mode="percent" name="demo_float_rate" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Estados de interação do controle.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-number label="Desabilitado" disabled mode="integer" :value="10" />
                <x-forms.input-number label="Readonly" readonly mode="currency" :value="25.5" />
                <x-forms.input-number label="Loading" loading mode="decimal" />
            </div>
        </x-ui.example>

        <x-ui.example title="Addons" :code="$addonsCode" :html="$addonsHtml">
            <x-slot:description>
                Slots <code>addon-start</code> / <code>addon-end</code> (com steppers desligados).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-number label="SKU qty" mode="integer" name="demo_sku_qty" :controls="false">
                    <x-slot:addon-start>QTD</x-slot:addon-start>
                    <x-slot:addon-end>un</x-slot:addon-end>
                </x-forms.input-number>
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-input-number" />
</x-ui.docs>
