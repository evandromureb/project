<?php

use Livewire\Component;

return new class extends Component
{
    public int|float|null $score = 4;

    public int|float|null $satisfaction = null;

    public int|float|null $quality = 3.5;

    public function save(): void
    {
        $this->validate([
            'score' => ['required', 'numeric', 'min:1', 'max:5'],
            'satisfaction' => ['nullable', 'numeric', 'min:0.5', 'max:5'],
            'quality' => ['required', 'numeric', 'min:0.5', 'max:5'],
        ]);
    }
};
?>

@php
    $labels = ['Péssimo', 'Ruim', 'Ok', 'Bom', 'Excelente'];

    $basicCode = <<<'BLADE'
<x-forms.rating label="Avaliação" name="score" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label id="rating-score-label" for="rating-score" class="text-sm font-medium text-foreground">Avaliação</label>
    </div>
    <input type="hidden" id="rating-score" name="score" value="">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="rating-score-label" aria-valuenow="0" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
HTML;

    $valueCode = <<<'BLADE'
<x-forms.rating label="Nota" name="score" :value="4" show-value />
BLADE;

    $valueHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label id="rating-score-label" for="rating-score" class="text-sm font-medium text-foreground">Nota</label>
    </div>
    <input type="hidden" id="rating-score" name="score" value="4">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="rating-score-label" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
        <div class="flex min-w-0 items-baseline gap-1.5 text-sm">
            <span class="font-semibold tabular-nums text-foreground">4<span class="font-normal text-muted-foreground">/5</span></span>
        </div>
    </div>
</div>
HTML;

    $halfCode = <<<'BLADE'
<x-forms.rating
    label="Qualidade"
    name="quality"
    allow-half
    :value="3.5"
    show-value
    show-label
    :labels="['Péssimo', 'Ruim', 'Ok', 'Bom', 'Excelente']"
/>
BLADE;

    $halfHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label id="rating-quality-label" for="rating-quality" class="text-sm font-medium text-foreground">Qualidade</label>
    </div>
    <input type="hidden" id="rating-quality" name="quality" value="3.5">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="rating-quality-label" aria-valuenow="3.5" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <span class="pointer-events-none absolute inset-y-0 start-0 w-1/2 overflow-hidden" aria-hidden="true">
                        <i class="bi bi-star-fill absolute start-0 top-1/2 -translate-y-1/2 leading-none text-xl text-warning"></i>
                    </span>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
        <div class="flex min-w-0 items-baseline gap-1.5 text-sm">
            <span class="font-semibold tabular-nums text-foreground">3.5<span class="font-normal text-muted-foreground">/5</span></span>
            <span class="truncate text-muted-foreground">Bom</span>
        </div>
    </div>
</div>
HTML;

    $labelsCode = <<<'BLADE'
<x-forms.rating
    label="Satisfação"
    show-label
    :labels="['Péssimo', 'Ruim', 'Ok', 'Bom', 'Excelente']"
/>
BLADE;

    $labelsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label id="rating-satisfaction-label" for="rating-satisfaction" class="text-sm font-medium text-foreground">Satisfação</label>
    </div>
    <input type="hidden" id="rating-satisfaction" value="">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="rating-satisfaction-label" aria-valuenow="0" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
        <div class="flex min-w-0 items-baseline gap-1.5 text-sm">
            <span class="truncate text-muted-foreground">Sem avaliação</span>
        </div>
    </div>
</div>
HTML;

    $iconsCode = <<<'BLADE'
<x-forms.rating label="Estrelas" icon="star" :value="4" />
<x-forms.rating label="Corações" icon="heart" color="danger" :value="3" />
<x-forms.rating label="Círculos" icon="circle" color="info" :value="5" />
<x-forms.rating label="Joinha" icon="hand" color="success" :value="4" />
BLADE;

    $iconsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Estrelas</label>
    </div>
    <input type="hidden" value="4">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Corações</label>
    </div>
    <input type="hidden" value="3">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-danger">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-heart leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-heart-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-danger" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-heart leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-heart-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-danger" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-heart leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-heart-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-danger" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-heart leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-heart leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Círculos</label>
    </div>
    <input type="hidden" value="5">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-info">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-circle leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-circle-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-info" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-circle leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-circle-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-info" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-circle leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-circle-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-info" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-circle leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-circle-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-info" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-circle leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-circle-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-info" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Joinha</label>
    </div>
    <input type="hidden" value="4">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-success">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-hand-thumbs-up leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-hand-thumbs-up-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-success" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-hand-thumbs-up leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-hand-thumbs-up-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-success" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-hand-thumbs-up leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-hand-thumbs-up-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-success" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-hand-thumbs-up leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-hand-thumbs-up-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-success" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-hand-thumbs-up leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.rating size="sm" label="Pequeno" :value="3" />
<x-forms.rating size="md" label="Médio" :value="3" />
<x-forms.rating size="lg" label="Grande" :value="3" />
<x-forms.rating size="xl" label="Extra" :value="3" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Pequeno</label>
    </div>
    <input type="hidden" value="3">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-0.5 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-base text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-base text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-base text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-base text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-base text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-base text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-base text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-base text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Médio</label>
    </div>
    <input type="hidden" value="3">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Grande</label>
    </div>
    <input type="hidden" value="3">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1.5 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-2xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-2xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-2xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-2xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-2xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-2xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-2xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-2xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Extra</label>
    </div>
    <input type="hidden" value="3">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-2 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-3xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-3xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-3xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-3xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-3xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-3xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-3xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-3xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.rating color="warning" label="Warning" :value="4" />
<x-forms.rating color="primary" label="Primary" :value="4" />
<x-forms.rating color="success" label="Success" :value="4" />
<x-forms.rating color="danger" label="Danger" :value="4" />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Warning</label>
    </div>
    <input type="hidden" value="4">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Primary</label>
    </div>
    <input type="hidden" value="4">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-primary">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-primary" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-primary" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-primary" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-primary" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Success</label>
    </div>
    <input type="hidden" value="4">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-success">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-success" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-success" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-success" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-success" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Danger</label>
    </div>
    <input type="hidden" value="4">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-danger">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-danger" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-danger" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-danger" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-danger" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
HTML;

    $maxCode = <<<'BLADE'
<x-forms.rating label="Nota 0–10" :max="10" :value="7" show-value />
BLADE;

    $maxHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label id="rating-max-label" for="rating-max" class="text-sm font-medium text-foreground">Nota 0–10</label>
    </div>
    <input type="hidden" id="rating-max" value="7">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="rating-max-label" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 10">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 10">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 10">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 10">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 10">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="6 de 10">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="7 de 10">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="8 de 10">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="9 de 10">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="10 de 10">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
        <div class="flex min-w-0 items-baseline gap-1.5 text-sm">
            <span class="font-semibold tabular-nums text-foreground">7<span class="font-normal text-muted-foreground">/10</span></span>
        </div>
    </div>
</div>
HTML;

    $readonlyCode = <<<'BLADE'
<x-forms.rating label="Média pública" :value="4.5" allow-half readonly show-value />
<x-forms.rating label="Desabilitado" :value="2" disabled />
BLADE;

    $readonlyHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Média pública</label>
    </div>
    <input type="hidden" value="4.5">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="4.5" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <span class="pointer-events-none absolute inset-y-0 start-0 w-1/2 overflow-hidden" aria-hidden="true">
                        <i class="bi bi-star-fill absolute start-0 top-1/2 -translate-y-1/2 leading-none text-xl text-warning"></i>
                    </span>
                </button>
        </div>
        <div class="flex min-w-0 items-baseline gap-1.5 text-sm">
            <span class="font-semibold tabular-nums text-foreground">4.5<span class="font-normal text-muted-foreground">/5</span></span>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5 opacity-60">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Desabilitado</label>
    </div>
    <input type="hidden" value="2" disabled>
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="None-label" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" class="inline-flex items-center outline-none gap-1 cursor-not-allowed opacity-60 focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5" disabled>
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5" disabled>
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                    <i class="bi bi-star-fill pointer-events-none absolute inset-0 flex items-center justify-center leading-none text-xl text-warning" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5" disabled>
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5" disabled>
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5" disabled>
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.rating label="Obrigatório" name="required_score" required error="Selecione uma nota." />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label id="rating-required_score-label" for="rating-required_score" class="text-sm font-medium text-foreground">Obrigatório <span class="text-danger" aria-hidden="true">*</span></label>
    </div>
    <input type="hidden" id="rating-required_score" name="required_score" value="">
    <div class="flex flex-wrap items-center gap-3">
        <div role="slider" tabindex="0" aria-labelledby="rating-required_score-label" aria-valuenow="0" aria-valuemin="0" aria-valuemax="5" aria-invalid="true" class="inline-flex items-center outline-none gap-1 cursor-pointer focus-visible:rounded-md focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-warning">
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="1 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="2 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="3 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="4 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
                <button type="button" tabindex="-1" class="relative inline-flex appearance-none items-center justify-center border-0 bg-transparent p-0 transition-transform duration-150 ease-out enabled:hover:scale-110 enabled:active:scale-95 disabled:pointer-events-none" aria-label="5 de 5">
                    <i class="bi bi-star leading-none text-xl text-muted-foreground/35" aria-hidden="true"></i>
                </button>
        </div>
    </div>
    <p role="alert" class="text-xs text-danger">Selecione uma nota.</p>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.rating&gt;</code> é a avaliação por estrelas (ou outros ícones):
            meias notas, hover preview, teclado, labels por nível, clearable e binding Livewire
            via <code>x-modelable="value"</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Padrão de 5 estrelas. Clique de novo na mesma nota para limpar (<code>clearable</code>).
            </x-slot:description>
            <x-forms.rating label="Avaliação" name="demo_score" />
        </x-ui.example>

        <x-ui.example title="Com valor" :code="$valueCode" :html="$valueHtml">
            <x-slot:description>
                <code>show-value</code> exibe <code>nota/max</code> ao lado.
            </x-slot:description>
            <x-forms.rating label="Nota" name="demo_value" :value="4" show-value />
        </x-ui.example>

        <x-ui.example title="Meias notas" :code="$halfCode" :html="$halfHtml">
            <x-slot:description>
                <code>allow-half</code> — clique na metade esquerda/direita da estrela.
            </x-slot:description>
            <x-forms.rating
                label="Qualidade"
                name="demo_quality"
                allow-half
                :value="3.5"
                show-value
                show-label
                :labels="$labels"
            />
        </x-ui.example>

        <x-ui.example title="Labels por nível" :code="$labelsCode" :html="$labelsHtml">
            <x-slot:description>
                <code>:labels</code> + <code>show-label</code> descrevem a nota atual / hover.
            </x-slot:description>
            <x-forms.rating
                label="Satisfação"
                name="demo_labels"
                show-label
                :labels="$labels"
            />
        </x-ui.example>

        <x-ui.example title="Ícones" :code="$iconsCode" :html="$iconsHtml">
            <x-slot:description>
                Presets: <code>star</code>, <code>heart</code>, <code>circle</code>, <code>hand</code>, <code>emoji</code>.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-forms.rating label="Estrelas" icon="star" :value="4" />
                <x-forms.rating label="Corações" icon="heart" color="danger" :value="3" />
                <x-forms.rating label="Círculos" icon="circle" color="info" :value="5" />
                <x-forms.rating label="Joinha" icon="hand" color="success" :value="4" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <div class="flex flex-col gap-4">
                <x-forms.rating size="sm" label="Pequeno" :value="3" />
                <x-forms.rating size="md" label="Médio" :value="3" />
                <x-forms.rating size="lg" label="Grande" :value="3" />
                <x-forms.rating size="xl" label="Extra" :value="3" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <div class="flex flex-col gap-4">
                <x-forms.rating color="warning" label="Warning" :value="4" />
                <x-forms.rating color="primary" label="Primary" :value="4" />
                <x-forms.rating color="success" label="Success" :value="4" />
                <x-forms.rating color="danger" label="Danger" :value="4" />
            </div>
        </x-ui.example>

        <x-ui.example title="Escala customizada" :code="$maxCode" :html="$maxHtml">
            <x-slot:description>
                <code>:max</code> de 1 a 10 (padrão 5).
            </x-slot:description>
            <x-forms.rating label="Nota 0–10" name="demo_max" :max="10" :value="7" show-value />
        </x-ui.example>

        <x-ui.example title="Readonly / disabled" :code="$readonlyCode" :html="$readonlyHtml">
            <div class="flex flex-col gap-4">
                <x-forms.rating label="Média pública" :value="4.5" allow-half readonly show-value />
                <x-forms.rating label="Desabilitado" :value="2" disabled />
            </div>
        </x-ui.example>

        <x-ui.example title="Estado de erro" :code="$statesCode" :html="$statesHtml">
            <x-forms.rating label="Obrigatório" name="demo_required" required error="Selecione uma nota." />
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api component="forms/rating/rating" title="x-forms.rating" />
</x-ui.docs>
