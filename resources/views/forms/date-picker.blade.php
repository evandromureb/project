<?php

use Livewire\Component;

return new class extends Component
{
    public function save(): void
    {
        //
    }
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-forms.date-picker placeholder="Selecione a data" />
        BLADE;

    $basicHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $dualCode = <<<'BLADE'
        <x-forms.date-picker
            mode="range"
            :months="2"
            color="info"
            placeholder="Selecione o intervalo"
            :selected="['2026-07-10', '2026-07-16']"
            :year="2026"
            :month="7"
        />
        BLADE;

    $dualHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-info h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione o intervalo" readonly class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-pointer" value="10/07/2026 - 16/07/2026">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar data">
            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $presetsCode = <<<'BLADE'
        <x-forms.date-picker
            mode="range"
            presets
            color="primary"
            placeholder="Selecione o intervalo"
            :year="2026"
            :month="7"
        />
        BLADE;

    $presetsHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione o intervalo" readonly class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-pointer" value="">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $valueCode = <<<'BLADE'
        <x-forms.date-picker :selected="'2026-07-14'" :year="2026" :month="7" color="success" />
        BLADE;

    $valueHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-success h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="14/07/2026">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar data">
            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $rangeCode = <<<'BLADE'
        <x-forms.date-picker
            mode="range"
            color="info"
            :selected="['2026-07-10', '2026-07-16']"
            :year="2026"
            :month="7"
        />
        BLADE;

    $rangeHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-info h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" readonly class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-pointer" value="10/07/2026 - 16/07/2026">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar data">
            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $multipleCode = <<<'BLADE'
        <x-forms.date-picker
            mode="multiple"
            color="warning"
            :selected="['2026-07-05', '2026-07-12', '2026-07-19']"
            :year="2026"
            :month="7"
        />
        BLADE;

    $multipleHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-warning h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" readonly class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-pointer" value="05/07/2026, 12/07/2026, 19/07/2026">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar data">
            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $disabledDatesCode = <<<'BLADE'
        <x-forms.date-picker
            :year="2026"
            :month="7"
            disable-past
            disable-weekends
            :disabled-dates="['2026-07-09', '2026-07-10']"
            color="danger"
        />
        BLADE;

    $disabledDatesHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-danger h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $boundsCode = <<<'BLADE'
        <x-forms.date-picker
            :year="2026"
            :month="7"
            min-date="2026-07-05"
            max-date="2026-07-25"
            color="warning"
        />
        BLADE;

    $boundsHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-warning h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $mondayCode = <<<'BLADE'
        <x-forms.date-picker week-start="monday" :year="2026" :month="7" />
        BLADE;

    $mondayHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $sizesCode = <<<'BLADE'
        <x-forms.date-picker size="sm" placeholder="Pequeno" />
        <x-forms.date-picker size="md" placeholder="Médio" />
        <x-forms.date-picker size="lg" placeholder="Grande" />
        BLADE;

    $sizesHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-8 text-xs cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Pequeno" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Médio" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-11 text-base cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Grande" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-forms.date-picker color="primary" :selected="'2026-07-14'" :year="2026" :month="7" />
        <x-forms.date-picker color="success" :selected="'2026-07-14'" :year="2026" :month="7" />
        <x-forms.date-picker color="danger" :selected="'2026-07-14'" :year="2026" :month="7" />
        <x-forms.date-picker color="info" :selected="'2026-07-14'" :year="2026" :month="7" />
        BLADE;

    $colorsHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="14/07/2026">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar data">
            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-success h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="14/07/2026">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar data">
            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-danger h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="14/07/2026">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar data">
            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-info h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="14/07/2026">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar data">
            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $formatCode = <<<'BLADE'
        <x-forms.date-picker format="Y-m-d" placeholder="aaaa-mm-dd" />
        BLADE;

    $formatHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="aaaa-mm-dd" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $disabledCode = <<<'BLADE'
        <x-forms.date-picker disabled :selected="'2026-07-14'" :year="2026" :month="7" />
        BLADE;

    $disabledHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm opacity-60 cursor-not-allowed bg-muted">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" disabled class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="14/07/2026">
        <button type="button" disabled class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $noClearCode = <<<'BLADE'
        <x-forms.date-picker :clearable="false" :selected="'2026-07-14'" :year="2026" :month="7" />
        BLADE;

    $noClearHtml = <<<'HTML'
        <div class="relative inline-block w-full">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="14/07/2026">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        HTML;

    $formCode = <<<'BLADE'
        <form wire:submit.prevent="save" class="flex flex-col gap-4 sm:flex-row sm:items-end">
            <x-forms.date-picker name="due_date" color="danger" class="sm:max-w-64" />
            <x-ui.button type="submit" color="primary">Salvar prazo</x-ui.button>
        </form>
        BLADE;

    $formHtml = <<<'HTML'
        <form class="flex w-full flex-col gap-4 sm:flex-row sm:items-end">
        <div class="relative inline-block w-full sm:max-w-64">
        <input type="hidden" name="due_date" value="">
        <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-danger h-9.5 text-sm cursor-pointer">
        <i class="bi bi-calendar3 shrink-0 text-muted-foreground" aria-hidden="true"></i>
        <input type="text" autocomplete="off" placeholder="Selecione a data" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text" value="">
        <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Abrir calendário">
            <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar prazo</button>
        </form>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-forms.date-picker&gt;</code> — input + painel flutuante com calendário.
            Use <code>:months="2"</code> para visão dual e <code>presets</code> para atalhos
            (Hoje, Últimos 7 dias, Este mês…). Modos <code>single</code>/<code>multiple</code>/<code>range</code>,
            cores, tamanhos e <code>name</code> para formulários.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Modo <code>single</code> — digite <code>dd/mm/aaaa</code> ou abra o calendário.
                Hoje aparece como ponto sob o dia.
            </x-slot:description>
            <x-forms.date-picker placeholder="Selecione a data" />
        </x-ui.example>

        <x-ui.example title="Valor inicial" :code="$valueCode" :html="$valueHtml">
            <x-slot:description>
                <code>selected</code> aceita uma data <code>'Y-m-d'</code> já formatada no input.
            </x-slot:description>
            <x-forms.date-picker :selected="'2026-07-14'" :year="2026" :month="7" color="success" />
        </x-ui.example>

        <x-ui.example title="Dois meses" :code="$dualCode" :html="$dualHtml">
            <x-slot:description>
                <code>:months="2"</code> — dois calendários lado a lado, setas agrupadas à direita
                (ideal para <code>mode="range"</code>).
            </x-slot:description>
            <div class="max-w-md">
                <x-forms.date-picker
                    mode="range"
                    :months="2"
                    color="info"
                    placeholder="Selecione o intervalo"
                    :selected="['2026-07-10', '2026-07-16']"
                    :year="2026"
                    :month="7"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Presets de intervalo" :code="$presetsCode" :html="$presetsHtml">
            <x-slot:description>
                <code>presets</code> ativa a barra lateral (Hoje, Ontem, Esta semana, Últimos 7 dias…)
                e força automaticamente a visão de dois meses.
            </x-slot:description>
            <div class="max-w-lg">
                <x-forms.date-picker
                    mode="range"
                    presets
                    color="primary"
                    placeholder="Selecione o intervalo"
                    :year="2026"
                    :month="7"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Intervalo (range)" :code="$rangeCode" :html="$rangeHtml">
            <x-slot:description>
                <code>mode="range"</code> — input mostra <code>início - fim</code>, somente leitura.
            </x-slot:description>
            <x-forms.date-picker
                mode="range"
                color="info"
                :selected="['2026-07-10', '2026-07-16']"
                :year="2026"
                :month="7"
            />
        </x-ui.example>

        <x-ui.example title="Seleção múltipla" :code="$multipleCode" :html="$multipleHtml">
            <x-slot:description>
                <code>mode="multiple"</code> — o painel permanece aberto entre os cliques.
            </x-slot:description>
            <x-forms.date-picker
                mode="multiple"
                color="warning"
                :selected="['2026-07-05', '2026-07-12', '2026-07-19']"
                :year="2026"
                :month="7"
            />
        </x-ui.example>

        <x-ui.example title="Datas desabilitadas" :code="$disabledDatesCode" :html="$disabledDatesHtml">
            <x-slot:description>
                <code>disable-past</code>, <code>disable-weekends</code> e <code>disabled-dates</code>.
            </x-slot:description>
            <x-forms.date-picker
                :year="2026"
                :month="7"
                disable-past
                disable-weekends
                :disabled-dates="['2026-07-09', '2026-07-10']"
                color="danger"
            />
        </x-ui.example>

        <x-ui.example title="Janela min / max" :code="$boundsCode" :html="$boundsHtml">
            <x-slot:description>
                <code>min-date</code> e <code>max-date</code> limitam o período selecionável.
            </x-slot:description>
            <x-forms.date-picker
                :year="2026"
                :month="7"
                min-date="2026-07-05"
                max-date="2026-07-25"
                color="warning"
            />
        </x-ui.example>

        <x-ui.example title="Semana começa na segunda" :code="$mondayCode" :html="$mondayHtml">
            <x-slot:description>
                <code>week-start="monday"</code> reordena cabeçalho e grade.
            </x-slot:description>
            <x-forms.date-picker week-start="monday" :year="2026" :month="7" />
        </x-ui.example>

        <x-ui.example title="Formato customizado" :code="$formatCode" :html="$formatHtml">
            <x-slot:description>
                <code>format</code> aceita <code>d</code>/<code>m</code>/<code>Y</code> em qualquer ordem/separador.
            </x-slot:description>
            <x-forms.date-picker format="Y-m-d" placeholder="aaaa-mm-dd" />
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size="sm"</code>, <code>md</code> (padrão) e <code>lg</code> — input e células do painel.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4 sm:flex-row">
                <x-forms.date-picker size="sm" placeholder="Pequeno" />
                <x-forms.date-picker size="md" placeholder="Médio" />
                <x-forms.date-picker size="lg" placeholder="Grande" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Token de cor no dia selecionado, preenchimento de range, ponto de “hoje” e anel de foco.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <x-forms.date-picker color="primary" :selected="'2026-07-14'" :year="2026" :month="7" />
                <x-forms.date-picker color="success" :selected="'2026-07-14'" :year="2026" :month="7" />
                <x-forms.date-picker color="danger" :selected="'2026-07-14'" :year="2026" :month="7" />
                <x-forms.date-picker color="info" :selected="'2026-07-14'" :year="2026" :month="7" />
            </div>
        </x-ui.example>

        <x-ui.example title="Desabilitado" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> bloqueia digitação, abertura do painel e o botão de limpar.
            </x-slot:description>
            <x-forms.date-picker disabled :selected="'2026-07-14'" :year="2026" :month="7" />
        </x-ui.example>

        <x-ui.example title="Sem botão de limpar" :code="$noClearCode" :html="$noClearHtml">
            <x-slot:description>
                <code>:clearable="false"</code> — esconde o "x" mesmo com data selecionada.
            </x-slot:description>
            <x-forms.date-picker :clearable="false" :selected="'2026-07-14'" :year="2026" :month="7" />
        </x-ui.example>

        <x-ui.example title="Integração com formulário" :code="$formCode" :html="$formHtml">
            <x-slot:description>
                <code>name</code> publica um <code>input hidden</code> — envia no submit normalmente.
            </x-slot:description>
            <form wire:submit.prevent="save" class="flex w-full flex-col gap-4 sm:flex-row sm:items-end">
                <x-forms.date-picker name="due_date" color="danger" class="sm:max-w-64" />
                <x-ui.button type="submit" color="primary">Salvar prazo</x-ui.button>
            </form>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api component="forms/date-picker/date-picker" title="x-forms.date-picker" />
</x-ui.docs>
