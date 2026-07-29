<?php

use Livewire\Component;

return new class extends Component
{
    public string $brand = '#3B82F6';

    public string $accent = 'rgb(34, 197, 94)';

    public string $overlay = '#00000080';

    public string $theme = '#8B5CF6';

    public function save(): void
    {
        $this->validate([
            'brand' => ['required', 'string', 'max:32'],
            'accent' => ['required', 'string', 'max:48'],
            'overlay' => ['required', 'string', 'max:32'],
            'theme' => ['required', 'string', 'max:32'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.color-picker label="Cor da marca" name="brand" value="#3B82F6" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" name="brand" value="#3B82F6" />
    <label class="text-sm font-medium text-foreground">Cor da marca</label>
    <div role="combobox" tabindex="0" aria-haspopup="dialog" aria-expanded="false" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #3B82F6" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center h-full">
                <span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#3B82F6</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar cor">
            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
        </button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true">
            <i class="bi bi-chevron-down leading-none text-sm"></i>
        </span>
    </div>
</div>
HTML;

    $formatsCode = <<<'BLADE'
<x-forms.color-picker label="HEX" format="hex" value="#F59E0B" />
<x-forms.color-picker label="RGB" format="rgb" value="rgb(245, 158, 11)" />
<x-forms.color-picker label="HSL" format="hsl" value="hsl(43, 96%, 56%)" />
BLADE;

    $formatsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">HEX</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #F59E0B" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#F59E0B</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">RGB</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: rgb(245, 158, 11)" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">rgb(245, 158, 11)</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">HSL</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: hsl(43, 96%, 56%)" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">hsl(43, 96%, 56%)</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $alphaCode = <<<'BLADE'
<x-forms.color-picker
    label="Overlay"
    name="overlay"
    alpha
    value="#00000080"
    hint="Inclui canal alpha (hex 8 dígitos / rgba / hsla)"
/>
BLADE;

    $alphaHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" name="overlay" value="#00000080" />
    <label class="text-sm font-medium text-foreground">Overlay</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #00000080" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#00000080</span></div>
        <button type="button" class="relative z-10 flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar cor"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
    <div class="min-w-0">
        <p class="mb-0 text-xs text-muted-foreground">Inclui canal alpha (hex 8 dígitos / rgba / hsla)</p>
    </div>
</div>
HTML;

    $presetsCode = <<<'BLADE'
<x-forms.color-picker
    label="Tema"
    :presets="['#0F172A', '#1D4ED8', '#7C3AED', '#DB2777', '#EA580C', '#16A34A']"
    value="#1D4ED8"
/>
BLADE;

    $presetsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Tema</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #1D4ED8" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#1D4ED8</span></div>
        <button type="button" class="relative z-10 flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar cor"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $inlineCode = <<<'BLADE'
<x-forms.color-picker
    label="Inline"
    inline
    :show-recent="false"
    value="#14B8A6"
/>
BLADE;

    $inlineHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Inline</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #14B8A6" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#14B8A6</span></div>
        <button type="button" class="relative z-10 flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar cor"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
    </div>
    <div role="dialog" aria-label="Seletor de cor" class="w-full max-w-sm overflow-hidden rounded-xl border border-border bg-card shadow-sm">
        <div class="p-3 text-xs text-muted-foreground">Área de saturação/matiz, sliders e paleta (painel inline sempre visível).</div>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.color-picker size="sm" label="Pequeno" value="#EF4444" />
<x-forms.color-picker size="md" label="Médio" value="#EF4444" />
<x-forms.color-picker size="lg" label="Grande" value="#EF4444" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-xs font-medium text-foreground">Pequeno</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-8 text-xs px-2.5 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-5" style="background-color: #EF4444" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#EF4444</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Médio</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #EF4444" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#EF4444</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Grande</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-11 text-base px-3.5 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-7" style="background-color: #EF4444" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#EF4444</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-base"></i></span>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.color-picker variant="default" label="Default" value="#6366F1" />
<x-forms.color-picker variant="filled" label="Filled" value="#6366F1" />
<x-forms.color-picker variant="flush" label="Flush" value="#6366F1" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Default</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #6366F1" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#6366F1</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Filled</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border border-transparent bg-muted shadow-none h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #6366F1" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#6366F1</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Flush</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-none border-0 border-b border-border bg-transparent shadow-none h-9.5 text-sm px-3 cursor-pointer focus-within:ring-0 focus-within:border-b-2">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #6366F1" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#6366F1</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.color-picker label="Sucesso" state="success" value="#22C55E" hint="Cor válida." />
<x-forms.color-picker label="Erro" error="Escolha uma cor." value="#EF4444" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Sucesso</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-success h-9.5 text-sm px-3 cursor-pointer focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #22C55E" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#22C55E</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
    <div class="min-w-0"><p class="mb-0 text-xs text-muted-foreground">Cor válida.</p></div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Erro</label>
    <div role="combobox" tabindex="0" aria-invalid="true" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-danger h-9.5 text-sm px-3 cursor-pointer focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #EF4444" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#EF4444</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
    <div class="min-w-0"><p class="mb-0 text-xs text-danger" role="alert">Escolha uma cor.</p></div>
</div>
HTML;

    $floatingCode = <<<'BLADE'
<x-forms.color-picker floating label="Cor primária" name="primary_color" />
<x-forms.color-picker floating label="Cor secundária" name="secondary_color" value="#64748B" />
BLADE;

    $floatingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" name="primary_color" value="" />
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-12 text-sm px-3 cursor-pointer">
        <div class="relative h-full min-w-0 flex-1">
            <div class="flex h-full min-w-0 items-center pt-4 pb-1">
                <span class="min-w-0 flex-1 truncate font-mono tabular-nums text-muted-foreground"> </span>
            </div>
            <label class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1/2 -translate-y-1/2 text-sm">Cor primária</label>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" name="secondary_color" value="#64748B" />
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-12 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #64748B" aria-hidden="true"></span>
        <div class="relative h-full min-w-0 flex-1">
            <div class="flex h-full min-w-0 items-center pt-4 pb-1">
                <span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#64748B</span>
            </div>
            <label class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1.5 translate-y-0 text-xs">Cor secundária</label>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.color-picker label="Desabilitado" disabled value="#94A3B8" />
<x-forms.color-picker label="Readonly" readonly value="#0EA5E9" />
<x-forms.color-picker label="Loading" loading value="#8B5CF6" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Desabilitado</label>
    <div role="combobox" tabindex="0" aria-disabled="true" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-not-allowed opacity-60">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #94A3B8" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#94A3B8</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Readonly</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #0EA5E9" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#0EA5E9</span></div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Loading</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-not-allowed opacity-60">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #8B5CF6" aria-hidden="true"></span>
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#8B5CF6</span></div>
        <span class="relative z-10 size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
    </div>
</div>
HTML;

    $extrasCode = <<<'BLADE'
<x-forms.color-picker
    label="Completo"
    show-native
    swatch-position="end"
    :close-on-select="true"
    value="#EC4899"
/>
BLADE;

    $extrasHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Completo</label>
    <div role="combobox" tabindex="0" class="group/color-picker relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer">
        <div class="relative min-w-0 flex-1"><span class="min-w-0 flex-1 truncate font-mono tabular-nums text-foreground">#EC4899</span></div>
        <button type="button" class="relative z-10 flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar cor"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center rounded-md border border-border size-6" style="background-color: #EC4899" aria-hidden="true"></span>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.color-picker&gt;</code> é o seletor de cor completo:
            área saturação/brilho, slider de matiz, alpha opcional, formatos
            <code>hex</code>/<code>rgb</code>/<code>hsl</code>, paleta, cores recentes,
            conta-gotas (EyeDropper), copiar, modo inline e binding Livewire.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Swatch + valor formatado; clique abre o painel flutuante.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.color-picker label="Cor da marca" name="demo_brand" value="#3B82F6" />
            </div>
        </x-ui.example>

        <x-ui.example title="Formatos" :code="$formatsCode" :html="$formatsHtml">
            <x-slot:description>
                <code>format</code>: <code>hex</code> (padrão), <code>rgb</code> ou <code>hsl</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.color-picker label="HEX" format="hex" name="demo_hex" value="#F59E0B" />
                <x-forms.color-picker label="RGB" format="rgb" name="demo_rgb" value="rgb(245, 158, 11)" />
                <x-forms.color-picker label="HSL" format="hsl" name="demo_hsl" value="hsl(43, 96%, 56%)" />
            </div>
        </x-ui.example>

        <x-ui.example title="Com alpha" :code="$alphaCode" :html="$alphaHtml">
            <x-slot:description>
                <code>alpha</code> adiciona slider de opacidade e serializa com canal A.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.color-picker
                    label="Overlay"
                    name="demo_overlay"
                    alpha
                    value="#00000080"
                    hint="Inclui canal alpha (hex 8 dígitos / rgba / hsla)"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Paleta custom" :code="$presetsCode" :html="$presetsHtml">
            <x-slot:description>
                Passe <code>:presets</code> com um array de cores; <code>:presets="false"</code> esconde.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.color-picker
                    label="Tema"
                    name="demo_theme_presets"
                    :presets="['#0F172A', '#1D4ED8', '#7C3AED', '#DB2777', '#EA580C', '#16A34A']"
                    value="#1D4ED8"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Inline" :code="$inlineCode" :html="$inlineHtml">
            <x-slot:description>
                <code>inline</code> mantém o painel sempre visível (sem popover).
            </x-slot:description>
            <div class="w-full max-w-sm">
                <x-forms.color-picker
                    label="Inline"
                    name="demo_inline"
                    inline
                    :show-recent="false"
                    value="#14B8A6"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.color-picker size="sm" label="Pequeno" name="demo_sm" value="#EF4444" />
                <x-forms.color-picker size="md" label="Médio" name="demo_md" value="#EF4444" />
                <x-forms.color-picker size="lg" label="Grande" name="demo_lg" value="#EF4444" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Mesmas variantes do input: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.color-picker variant="default" label="Default" name="demo_v_default" value="#6366F1" />
                <x-forms.color-picker variant="filled" label="Filled" name="demo_v_filled" value="#6366F1" />
                <x-forms.color-picker variant="flush" label="Flush" name="demo_v_flush" value="#6366F1" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> / <code>error</code> com detecção automática via <code>$errors</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.color-picker label="Sucesso" name="demo_ok" state="success" value="#22C55E" hint="Cor válida." />
                <x-forms.color-picker label="Erro" name="demo_bad" error="Escolha uma cor." value="#EF4444" />
            </div>
        </x-ui.example>

        <x-ui.example title="Floating label" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                <code>floating</code> com a mesma lógica Alpine do input.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.color-picker floating label="Cor primária" name="demo_float_primary" />
                <x-forms.color-picker floating label="Cor secundária" name="demo_float_secondary" value="#64748B" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Estados de interação do controle.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.color-picker label="Desabilitado" disabled value="#94A3B8" />
                <x-forms.color-picker label="Readonly" readonly value="#0EA5E9" />
                <x-forms.color-picker label="Loading" loading value="#8B5CF6" />
            </div>
        </x-ui.example>

        <x-ui.example title="Extras" :code="$extrasCode" :html="$extrasHtml">
            <x-slot:description>
                <code>show-native</code>, <code>swatch-position="end"</code> e <code>close-on-select</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.color-picker
                    label="Completo"
                    name="demo_extras"
                    show-native
                    swatch-position="end"
                    :close-on-select="true"
                    value="#EC4899"
                />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-color-picker" />
</x-ui.docs>
