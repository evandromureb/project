<?php

use Livewire\Component;

return new class extends Component
{
    public int|float $volume = 40;

    /** @var array{0: int|float, 1: int|float} */
    public array $priceRange = [200, 800];

    public int|float $rating = 3.5;

    public function save(): void
    {
        $this->validate([
            'volume' => ['required', 'numeric', 'min:0', 'max:100'],
            'priceRange' => ['required', 'array', 'size:2'],
            'priceRange.0' => ['required', 'numeric', 'min:0', 'max:1000'],
            'priceRange.1' => ['required', 'numeric', 'min:0', 'max:1000', 'gte:priceRange.0'],
            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.range label="Volume" name="volume" :value="40" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <div id="range-volume-label" class="text-sm font-medium text-foreground">Volume</div>
        </div>
    </div>
    <input type="hidden" id="range-volume" name="volume" value="40">
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:40%"></div>
                <button type="button" role="slider" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" aria-labelledby="range-volume-label" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:40%" aria-label="Valor"></button>
            </div>
            <span id="range-volume-value" class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">40</span>
        </div>
    </div>
</div>
HTML;

    $dualCode = <<<'BLADE'
<x-forms.range
    mode="dual"
    label="Faixa de preço"
    name="price_min"
    name-end="price_max"
    :min="0"
    :max="1000"
    :step="10"
    :value="[200, 800]"
    prefix="R$ "
    show-min-max
/>
BLADE;

    $dualHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <div id="range-price_min-label" class="text-sm font-medium text-foreground">Faixa de preço</div>
        </div>
    </div>
    <input type="hidden" id="range-price_min" name="price_min" value="200">
    <input type="hidden" id="range-price_min-end" name="price_max" value="800">
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:20%;width:60%"></div>
                <button type="button" role="slider" aria-valuemin="0" aria-valuemax="800" aria-valuenow="200" aria-labelledby="range-price_min-label" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:20%" aria-label="Valor mínimo"></button>
                <button type="button" role="slider" aria-valuemin="200" aria-valuemax="1000" aria-valuenow="800" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:80%" aria-label="Valor máximo"></button>
            </div>
            <span id="range-price_min-value" class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">R$ 200 - R$ 800</span>
        </div>
    </div>
    <div class="flex justify-between gap-2 text-xs text-muted-foreground tabular-nums">
        <span>R$ 0</span>
        <span>R$ 1000</span>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.range size="sm" label="Pequeno" :value="25" />
<x-forms.range size="md" label="Médio" :value="50" />
<x-forms.range size="lg" label="Grande" :value="75" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <div class="text-xs font-medium text-foreground">Pequeno</div>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-6" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1 bg-primary" style="left:0%;width:25%"></div>
                <button type="button" role="slider" aria-valuenow="25" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-3.5 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:25%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-xs text-foreground">25</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <div class="text-sm font-medium text-foreground">Médio</div>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:50%"></div>
                <button type="button" role="slider" aria-valuenow="50" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:50%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">50</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <div class="text-base font-medium text-foreground">Grande</div>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-10" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-2.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-2.5 bg-primary" style="left:0%;width:75%"></div>
                <button type="button" role="slider" aria-valuenow="75" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-5 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:75%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">75</span>
        </div>
    </div>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.range color="primary" label="Primary" :value="40" />
<x-forms.range color="success" label="Success" :value="60" />
<x-forms.range color="warning" label="Warning" :value="45" />
<x-forms.range color="danger" label="Danger" :value="80" />
<x-forms.range color="info" label="Info" :value="55" />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Primary</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:40%"></div>
                <button type="button" role="slider" aria-valuenow="40" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:40%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">40</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Success</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-success" style="left:0%;width:60%"></div>
                <button type="button" role="slider" aria-valuenow="60" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-success focus-visible:ring-success/40 cursor-grab active:cursor-grabbing top-1/2" style="left:60%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">60</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Warning</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-warning" style="left:0%;width:45%"></div>
                <button type="button" role="slider" aria-valuenow="45" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-warning focus-visible:ring-warning/40 cursor-grab active:cursor-grabbing top-1/2" style="left:45%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">45</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Danger</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-danger" style="left:0%;width:80%"></div>
                <button type="button" role="slider" aria-valuenow="80" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-danger focus-visible:ring-danger/40 cursor-grab active:cursor-grabbing top-1/2" style="left:80%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">80</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Info</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-info" style="left:0%;width:55%"></div>
                <button type="button" role="slider" aria-valuenow="55" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-info focus-visible:ring-info/40 cursor-grab active:cursor-grabbing top-1/2" style="left:55%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">55</span>
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.range variant="default" label="Default" :value="40" />
<x-forms.range variant="soft" color="info" label="Soft" :value="55" />
<x-forms.range variant="gradient" color="success" label="Gradient" :value="70" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Default</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:40%"></div>
                <button type="button" role="slider" aria-valuenow="40" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:40%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">40</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Soft</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-info/15"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-info" style="left:0%;width:55%"></div>
                <button type="button" role="slider" aria-valuenow="55" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-info focus-visible:ring-info/40 cursor-grab active:cursor-grabbing top-1/2" style="left:55%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">55</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Gradient</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-gradient-to-r from-success/70 to-success" style="left:0%;width:70%"></div>
                <button type="button" role="slider" aria-valuenow="70" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-success focus-visible:ring-success/40 cursor-grab active:cursor-grabbing top-1/2" style="left:70%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">70</span>
        </div>
    </div>
</div>
HTML;

    $valuePositionsCode = <<<'BLADE'
<x-forms.range label="Valor no fim" value-position="end" :value="35" suffix="%" />
<x-forms.range label="Valor no topo" value-position="top" :value="60" suffix="%" />
<x-forms.range label="Só tooltip" value-position="tooltip" :value="45" suffix="%" />
BLADE;

    $valuePositionsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Valor no fim</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:35%"></div>
                <button type="button" role="slider" aria-valuenow="35" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:35%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">35%</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Valor no topo</div></div>
        <span class="shrink-0 font-semibold tabular-nums text-sm text-foreground">60%</span>
    </div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:60%"></div>
                <button type="button" role="slider" aria-valuenow="60" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:60%" aria-label="Valor"></button>
            </div>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Só tooltip</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:45%"></div>
                <button type="button" role="slider" aria-valuenow="45" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:45%" aria-label="Valor">
                    <span class="pointer-events-none absolute rounded-md bg-foreground px-1.5 py-0.5 text-[10px] font-semibold text-background tabular-nums shadow-sm bottom-full mb-2 left-1/2 -translate-x-1/2">45%</span>
                </button>
            </div>
        </div>
    </div>
</div>
HTML;

    $marksCode = <<<'BLADE'
<x-forms.range
    label="Satisfação"
    :min="0"
    :max="100"
    :step="25"
    :value="50"
    :marks="[0, 25, 50, 75, 100]"
    suffix="%"
    show-min-max
/>
BLADE;

    $marksHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Satisfação</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:50%"></div>
                <div class="pointer-events-none absolute inset-0">
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:0%" tabindex="-1" aria-label="Marca 0%"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:25%" tabindex="-1" aria-label="Marca 25%"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:50%" tabindex="-1" aria-label="Marca 50%"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:75%" tabindex="-1" aria-label="Marca 75%"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:100%" tabindex="-1" aria-label="Marca 100%"><span class="block rounded-full bg-border size-1.5"></span></button>
                </div>
                <button type="button" role="slider" aria-valuenow="50" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:50%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">50%</span>
        </div>
    </div>
    <div class="flex justify-between gap-2 text-xs text-muted-foreground tabular-nums">
        <span>0%</span>
        <div class="relative mx-2 hidden min-h-4 flex-1 sm:block">
            <span class="absolute -translate-x-1/2 text-[0.65rem]" style="left:0%">0%</span>
            <span class="absolute -translate-x-1/2 text-[0.65rem]" style="left:25%">25%</span>
            <span class="absolute -translate-x-1/2 text-[0.65rem]" style="left:50%">50%</span>
            <span class="absolute -translate-x-1/2 text-[0.65rem]" style="left:75%">75%</span>
            <span class="absolute -translate-x-1/2 text-[0.65rem]" style="left:100%">100%</span>
        </div>
        <span>100%</span>
    </div>
</div>
HTML;

    $snapCode = <<<'BLADE'
<x-forms.range
    label="Nível"
    :marks="[
        ['value' => 0, 'label' => 'Baixo'],
        ['value' => 50, 'label' => 'Médio'],
        ['value' => 100, 'label' => 'Alto'],
    ]"
    snap
    :value="50"
/>
BLADE;

    $snapHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Nível</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:50%"></div>
                <div class="pointer-events-none absolute inset-0">
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:0%" tabindex="-1" aria-label="Marca Baixo"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:50%" tabindex="-1" aria-label="Marca Médio"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:100%" tabindex="-1" aria-label="Marca Alto"><span class="block rounded-full bg-border size-1.5"></span></button>
                </div>
                <button type="button" role="slider" aria-valuenow="50" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:50%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">50</span>
        </div>
    </div>
</div>
HTML;

    $inputsCode = <<<'BLADE'
<x-forms.range
    mode="dual"
    label="Orçamento"
    with-input
    :min="0"
    :max="5000"
    :step="50"
    :value="[500, 2500]"
    prefix="R$ "
/>
BLADE;

    $inputsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Orçamento</div></div></div>
    <input type="hidden" name="orcamento" value="500">
    <input type="hidden" name="orcamento_end" value="2500">
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center gap-3">
            <input type="number" min="0" max="5000" step="50" value="500" class="shrink-0 rounded-lg border border-border bg-card tabular-nums text-foreground shadow-sm outline-none focus:ring-2 focus:ring-offset-1 h-9.5 w-20 px-2.5 text-sm border-primary focus-visible:ring-primary/40" aria-label="Valor mínimo">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:10%;width:40%"></div>
                <button type="button" role="slider" aria-valuenow="500" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:10%" aria-label="Valor mínimo"></button>
                <button type="button" role="slider" aria-valuenow="2500" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:50%" aria-label="Valor máximo"></button>
            </div>
            <input type="number" min="0" max="5000" step="50" value="2500" class="shrink-0 rounded-lg border border-border bg-card tabular-nums text-foreground shadow-sm outline-none focus:ring-2 focus:ring-offset-1 h-9.5 w-20 px-2.5 text-sm border-primary focus-visible:ring-primary/40" aria-label="Valor máximo">
        </div>
    </div>
</div>
HTML;

    $verticalCode = <<<'BLADE'
<div class="flex gap-8">
    <x-forms.range vertical label="Bass" color="info" :value="60" />
    <x-forms.range vertical mode="dual" label="EQ" color="success" :value="[30, 70]" />
</div>
BLADE;

    $verticalHtml = <<<'HTML'
<div class="flex gap-8">
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Bass</div></div></div>
        <div class="flex flex-col items-center gap-3">
            <div class="relative flex min-w-0 h-52 flex-col items-center">
                <div class="relative touch-none select-none h-full w-8" role="presentation">
                    <div class="absolute rounded-full inset-y-0 left-1/2 -translate-x-1/2 w-1.5 bg-muted"></div>
                    <div class="absolute rounded-full left-1/2 -translate-x-1/2 w-1.5 bg-info" style="bottom:0%;height:60%"></div>
                    <button type="button" role="slider" aria-valuenow="60" aria-orientation="vertical" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-info focus-visible:ring-info/40 cursor-grab active:cursor-grabbing left-1/2" style="bottom:60%" aria-label="Valor"></button>
                </div>
            </div>
            <span class="font-semibold tabular-nums text-sm text-foreground">60</span>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">EQ</div></div></div>
        <div class="flex flex-col items-center gap-3">
            <div class="relative flex min-w-0 h-52 flex-col items-center">
                <div class="relative touch-none select-none h-full w-8" role="presentation">
                    <div class="absolute rounded-full inset-y-0 left-1/2 -translate-x-1/2 w-1.5 bg-muted"></div>
                    <div class="absolute rounded-full left-1/2 -translate-x-1/2 w-1.5 bg-success" style="bottom:30%;height:40%"></div>
                    <button type="button" role="slider" aria-valuenow="30" aria-orientation="vertical" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-success focus-visible:ring-success/40 cursor-grab active:cursor-grabbing left-1/2" style="bottom:30%" aria-label="Valor mínimo"></button>
                    <button type="button" role="slider" aria-valuenow="70" aria-orientation="vertical" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-success focus-visible:ring-success/40 cursor-grab active:cursor-grabbing left-1/2" style="bottom:70%" aria-label="Valor máximo"></button>
                </div>
            </div>
            <span class="font-semibold tabular-nums text-sm text-foreground">30 - 70</span>
        </div>
    </div>
</div>
HTML;

    $stepDecimalsCode = <<<'BLADE'
<x-forms.range
    label="Avaliação"
    :min="0"
    :max="5"
    :step="0.5"
    :decimals="1"
    :value="3.5"
    suffix=" ★"
    :marks="[0, 1, 2, 3, 4, 5]"
/>
BLADE;

    $stepDecimalsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Avaliação</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:70%"></div>
                <div class="pointer-events-none absolute inset-0">
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:0%" tabindex="-1" aria-label="Marca 0"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:20%" tabindex="-1" aria-label="Marca 1"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:40%" tabindex="-1" aria-label="Marca 2"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:60%" tabindex="-1" aria-label="Marca 3"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:80%" tabindex="-1" aria-label="Marca 4"><span class="block rounded-full bg-border size-1.5"></span></button>
                    <button type="button" class="pointer-events-auto absolute z-[1] flex flex-col items-center" style="left:100%" tabindex="-1" aria-label="Marca 5"><span class="block rounded-full bg-border size-1.5"></span></button>
                </div>
                <button type="button" role="slider" aria-valuenow="3.5" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-grab active:cursor-grabbing top-1/2" style="left:70%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">3.5 ★</span>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.range label="Sucesso" state="success" :value="70" />
<x-forms.range label="Erro" error="Escolha um valor válido." :value="20" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-success">Sucesso</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-success" style="left:0%;width:70%"></div>
                <button type="button" role="slider" aria-valuenow="70" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-success focus-visible:ring-success/40 cursor-grab active:cursor-grabbing top-1/2" style="left:70%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-success">70</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-danger">Erro</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-danger" style="left:0%;width:20%"></div>
                <button type="button" role="slider" aria-valuenow="20" aria-invalid="true" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-danger focus-visible:ring-danger/40 cursor-grab active:cursor-grabbing top-1/2" style="left:20%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-danger">20</span>
        </div>
    </div>
    <div class="min-w-0">
        <p class="mb-0 text-xs text-danger" role="alert">Escolha um valor válido.</p>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.range label="Desabilitado" disabled :value="40" />
<x-forms.range label="Somente leitura" readonly :value="65" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5 opacity-60">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Desabilitado</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8 cursor-not-allowed" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:40%"></div>
                <button type="button" role="slider" aria-valuenow="40" aria-disabled="true" disabled tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-not-allowed top-1/2" style="left:40%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">40</span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-start justify-between gap-3"><div class="min-w-0 flex-1"><div class="text-sm font-medium text-foreground">Somente leitura</div></div></div>
    <div class="flex items-center gap-3">
        <div class="relative flex min-w-0 w-full flex-1 items-center">
            <div class="relative touch-none select-none w-full h-8 cursor-not-allowed" role="presentation">
                <div class="absolute rounded-full inset-x-0 top-1/2 -translate-y-1/2 h-1.5 bg-muted"></div>
                <div class="absolute rounded-full top-1/2 -translate-y-1/2 h-1.5 bg-primary" style="left:0%;width:65%"></div>
                <button type="button" role="slider" aria-valuenow="65" aria-disabled="true" tabindex="0" class="absolute z-[2] rounded-full border-2 bg-card shadow-sm outline-none focus-visible:ring-2 focus-visible:ring-offset-1 size-4 border-primary focus-visible:ring-primary/40 cursor-not-allowed top-1/2" style="left:65%" aria-label="Valor"></button>
            </div>
            <span class="shrink-0 min-w-12 text-end font-semibold tabular-nums text-sm text-foreground">65</span>
        </div>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.range&gt;</code> é um slider completo: modo
            <code>single</code> ou <code>dual</code>, <code>min</code>/<code>max</code>/<code>step</code>,
            marcas, snap, tooltips, inputs auxiliares, orientação vertical, prefixo/sufixo,
            variantes e binding Livewire via <code>x-modelable</code>
            (número ou <code>[min, max]</code>).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Slider simples com valor à direita (<code>value-position="end"</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.range label="Volume" name="demo_volume" :value="40" />
            </div>
        </x-ui.example>

        <x-ui.example title="Dual (intervalo)" :code="$dualCode" :html="$dualHtml">
            <x-slot:description>
                <code>mode="dual"</code> com dois thumbs. Use <code>name</code> + <code>name-end</code>
                em forms HTML, ou array no Livewire.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.range
                    mode="dual"
                    label="Faixa de preço"
                    name="demo_price_min"
                    name-end="demo_price_max"
                    :min="0"
                    :max="1000"
                    :step="10"
                    :value="[200, 800]"
                    prefix="R$ "
                    show-min-max
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>sm</code>, <code>md</code> (padrão) e <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.range size="sm" label="Pequeno" name="demo_sm" :value="25" />
                <x-forms.range size="md" label="Médio" name="demo_md" :value="50" />
                <x-forms.range size="lg" label="Grande" name="demo_lg" :value="75" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Tokens de tema: <code>primary</code>, <code>success</code>, <code>warning</code>,
                <code>danger</code>, <code>info</code>, <code>secondary</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.range color="primary" label="Primary" :value="40" />
                <x-forms.range color="success" label="Success" :value="60" />
                <x-forms.range color="warning" label="Warning" :value="45" />
                <x-forms.range color="danger" label="Danger" :value="80" />
                <x-forms.range color="info" label="Info" :value="55" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>default</code>, <code>soft</code> (trilha colorida suave) e <code>gradient</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.range variant="default" label="Default" :value="40" />
                <x-forms.range variant="soft" color="info" label="Soft" :value="55" />
                <x-forms.range variant="gradient" color="success" label="Gradient" :value="70" />
            </div>
        </x-ui.example>

        <x-ui.example title="Posição do valor" :code="$valuePositionsCode" :html="$valuePositionsHtml">
            <x-slot:description>
                <code>end</code>, <code>top</code> ou <code>tooltip</code> (sempre visível no thumb).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.range label="Valor no fim" value-position="end" :value="35" suffix="%" />
                <x-forms.range label="Valor no topo" value-position="top" :value="60" suffix="%" />
                <x-forms.range label="Só tooltip" value-position="tooltip" :value="45" suffix="%" />
            </div>
        </x-ui.example>

        <x-ui.example title="Marcas" :code="$marksCode" :html="$marksHtml">
            <x-slot:description>
                <code>:marks</code> como lista de valores, ou <code>:marks="true"</code> para 5 marcas automáticas.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.range
                    label="Satisfação"
                    :min="0"
                    :max="100"
                    :step="25"
                    :value="50"
                    :marks="[0, 25, 50, 75, 100]"
                    suffix="%"
                    show-min-max
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Snap nas marcas" :code="$snapCode" :html="$snapHtml">
            <x-slot:description>
                <code>snap</code> atrai o thumb à marca mais próxima. Labels custom via
                <code>['value' => …, 'label' => …]</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.range
                    label="Nível"
                    :marks="[
                        ['value' => 0, 'label' => 'Baixo'],
                        ['value' => 50, 'label' => 'Médio'],
                        ['value' => 100, 'label' => 'Alto'],
                    ]"
                    snap
                    :value="50"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Com inputs" :code="$inputsCode" :html="$inputsHtml">
            <x-slot:description>
                <code>with-input</code> sincroniza campos numéricos ao lado do slider.
            </x-slot:description>
            <div class="w-full max-w-lg">
                <x-forms.range
                    mode="dual"
                    label="Orçamento"
                    with-input
                    :min="0"
                    :max="5000"
                    :step="50"
                    :value="[500, 2500]"
                    prefix="R$ "
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Step decimal" :code="$stepDecimalsCode" :html="$stepDecimalsHtml">
            <x-slot:description>
                <code>step</code> fracionário com <code>decimals</code> e sufixo.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.range
                    label="Avaliação"
                    :min="0"
                    :max="5"
                    :step="0.5"
                    :decimals="1"
                    :value="3.5"
                    suffix=" ★"
                    :marks="[0, 1, 2, 3, 4, 5]"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados e erro" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> ou <code>error</code> (também via <code>$errors</code> pelo <code>name</code>).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.range label="Sucesso" state="success" :value="70" />
                <x-forms.range label="Erro" error="Escolha um valor válido." :value="20" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> impede interação; <code>readonly</code> mantém o valor visível sem editar.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.range label="Desabilitado" disabled :value="40" />
                <x-forms.range label="Somente leitura" readonly :value="65" />
            </div>
        </x-ui.example>

        <x-ui.example title="Vertical" :code="$verticalCode" :html="$verticalHtml">
            <x-slot:description>
                <code>vertical</code> para equalizers, volume e filtros laterais.
            </x-slot:description>
            <div class="flex gap-10 px-4">
                <x-forms.range vertical label="Bass" color="info" :value="60" />
                <x-forms.range vertical mode="dual" label="EQ" color="success" :value="[30, 70]" />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-range" />
</x-ui.docs>
