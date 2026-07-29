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
        <x-ui.calendar show-selection />
        BLADE;

    $eventsCode = <<<'BLADE'
        <x-ui.calendar
            :year="2026"
            :month="7"
            :events="[
                ['date' => '2026-07-10', 'title' => 'Reunião de equipe', 'color' => 'primary'],
                ['date' => '2026-07-15', 'title' => 'Entrega do projeto', 'color' => 'danger'],
                ['date' => '2026-07-15', 'title' => 'Corte de ponto', 'color' => 'warning'],
                ['date' => '2026-07-22', 'title' => 'Aniversário da empresa', 'color' => 'success'],
            ]"
        />
        BLADE;

    $eventsListCode = <<<'BLADE'
        <x-ui.calendar
            :year="2026"
            :month="7"
            events-display="list"
            :events="[
                ['date' => '2026-07-10', 'title' => 'Reunião de equipe', 'color' => 'primary'],
                ['date' => '2026-07-15', 'title' => 'Entrega do projeto', 'color' => 'danger'],
                ['date' => '2026-07-15', 'title' => 'Corte de ponto', 'color' => 'warning'],
                ['date' => '2026-07-22', 'title' => 'Aniversário da empresa', 'color' => 'success'],
            ]"
        />
        BLADE;

    $eventsBadgeCode = <<<'BLADE'
        <x-ui.calendar
            :year="2026"
            :month="7"
            events-display="badge"
            :events="[
                ['date' => '2026-07-08', 'title' => 'Stand-up'],
                ['date' => '2026-07-08', 'title' => '1:1'],
                ['date' => '2026-07-15', 'title' => 'Release'],
                ['date' => '2026-07-15', 'title' => 'QA'],
                ['date' => '2026-07-15', 'title' => 'Demo'],
            ]"
        />
        BLADE;

    $multipleCode = <<<'BLADE'
        <x-ui.calendar
            mode="multiple"
            color="success"
            show-selection
            :selected="['2026-07-05', '2026-07-12', '2026-07-19']"
        />
        BLADE;

    $rangeCode = <<<'BLADE'
        <x-ui.calendar
            mode="range"
            color="info"
            show-selection
            :selected="['2026-07-10', '2026-07-16']"
        />
        BLADE;

    $disabledCode = <<<'BLADE'
        <x-ui.calendar
            :year="2026"
            :month="7"
            disable-past
            disable-weekends
            :disabled-dates="['2026-07-09', '2026-07-10']"
            color="primary"
            show-selection
        />
        BLADE;

    $boundsCode = <<<'BLADE'
        <x-ui.calendar
            :year="2026"
            :month="7"
            min-date="2026-07-05"
            max-date="2026-07-25"
            color="warning"
            show-selection
        />
        BLADE;

    $mondayCode = <<<'BLADE'
        <x-ui.calendar week-start="monday" show-selection />
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.calendar size="sm" color="secondary" class="max-w-xs" />
        <x-ui.calendar size="lg" color="primary" class="max-w-md" />
        BLADE;

    $colorsCode = <<<'BLADE'
        <x-ui.calendar color="danger" :selected="'2026-07-14'" :year="2026" :month="7" :show-navigation="false" />
        <x-ui.calendar color="success" :selected="'2026-07-14'" :year="2026" :month="7" :show-navigation="false" />
        BLADE;

    $noNavCode = <<<'BLADE'
        <x-ui.calendar :year="2026" :month="7" :show-navigation="false" color="warning" />
        BLADE;

    $formCode = <<<'BLADE'
        <form wire:submit.prevent="save" class="flex flex-col gap-4 sm:flex-row sm:items-start">
            <x-ui.calendar name="due_date" color="danger" show-selection />
            <div class="flex flex-col gap-2">
                <p class="text-sm text-muted-foreground">A data escolhida vai no input hidden <code>due_date</code>.</p>
                <x-ui.button type="submit" color="primary">Salvar prazo</x-ui.button>
            </div>
        </form>
        BLADE;


    $basicHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <!-- um <button role="gridcell"> por dia do mês, ex.: -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground cursor-pointer hover:bg-muted">
                        <span>1</span>
                    </button>
                </div>
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" aria-selected="true" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 rounded-md bg-primary text-primary-foreground shadow-sm hover:bg-primary">
                        <span>2</span>
                    </button>
                </div>
                <!-- ... demais dias do mês ... -->
            </div>
            <div class="mt-3 flex items-center gap-2 rounded-md border border-border bg-muted/40 px-3 py-2 text-xs">
                <i class="bi bi-calendar-check text-sm text-muted-foreground" aria-hidden="true"></i>
                <span class="min-w-0 truncate font-medium text-foreground">2 de julho</span>
            </div>
        </div>
        HTML;

    $eventsHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <!-- dia sem evento -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground cursor-pointer hover:bg-muted">
                        <span>9</span>
                    </button>
                </div>
                <!-- dia 10, evento "Reunião de equipe" (primary) -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground cursor-pointer hover:bg-muted">
                        <span>10</span>
                        <span class="absolute bottom-1 flex h-1 items-center justify-center gap-0.5">
                            <span class="size-1 rounded-full bg-primary"></span>
                        </span>
                    </button>
                </div>
                <!-- dia 15, 2 eventos (danger + warning) -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground cursor-pointer hover:bg-muted">
                        <span>15</span>
                        <span class="absolute bottom-1 flex h-1 items-center justify-center gap-0.5">
                            <span class="size-1 rounded-full bg-danger"></span>
                            <span class="size-1 rounded-full bg-warning"></span>
                        </span>
                    </button>
                </div>
                <!-- ... demais dias do mês ... -->
            </div>
        </div>
        HTML;

    $eventsListHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <!-- ... dias do mês, cada um com bolinhas como no exemplo "Eventos (pontos)" ... -->
            </div>
            <div class="mt-4 flex flex-col gap-2 border-t border-border pt-3">
                <p class="text-[11px] font-semibold tracking-wide text-muted-foreground uppercase">Eventos do mês</p>
                <div class="flex items-start gap-2.5">
                    <span class="mt-0.5 w-[4.5rem] shrink-0 text-[11px] font-medium text-muted-foreground capitalize">10 de julho</span>
                    <div class="flex min-w-0 flex-1 flex-col gap-1">
                        <div class="flex items-center gap-2 text-xs text-foreground">
                            <span class="size-1.5 shrink-0 rounded-full bg-primary"></span>
                            <span class="truncate">Reunião de equipe</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-start gap-2.5">
                    <span class="mt-0.5 w-[4.5rem] shrink-0 text-[11px] font-medium text-muted-foreground capitalize">15 de julho</span>
                    <div class="flex min-w-0 flex-1 flex-col gap-1">
                        <div class="flex items-center gap-2 text-xs text-foreground">
                            <span class="size-1.5 shrink-0 rounded-full bg-danger"></span>
                            <span class="truncate">Entrega do projeto</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-foreground">
                            <span class="size-1.5 shrink-0 rounded-full bg-warning"></span>
                            <span class="truncate">Corte de ponto</span>
                        </div>
                    </div>
                </div>
                <!-- ... demais dias com evento ... -->
            </div>
        </div>
        HTML;

    $eventsBadgeHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <!-- dia 8, 2 eventos -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground cursor-pointer hover:bg-muted">
                        <span>8</span>
                    </button>
                    <span class="pointer-events-none absolute -top-0.5 -right-0.5 flex size-3.5 items-center justify-center rounded-full bg-danger text-[9px] font-semibold text-danger-foreground shadow-sm">2</span>
                </div>
                <!-- dia 15, 3 eventos -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground cursor-pointer hover:bg-muted">
                        <span>15</span>
                    </button>
                    <span class="pointer-events-none absolute -top-0.5 -right-0.5 flex size-3.5 items-center justify-center rounded-full bg-danger text-[9px] font-semibold text-danger-foreground shadow-sm">3</span>
                </div>
                <!-- ... demais dias do mês ... -->
            </div>
        </div>
        HTML;

    $multipleHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <!-- dias 5, 12 e 19 selecionados (cada clique alterna) -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" aria-selected="true" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 rounded-md bg-success text-success-foreground shadow-sm hover:bg-success">
                        <span>5</span>
                    </button>
                </div>
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" aria-selected="true" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 rounded-md bg-success text-success-foreground shadow-sm hover:bg-success">
                        <span>12</span>
                    </button>
                </div>
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" aria-selected="true" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 rounded-md bg-success text-success-foreground shadow-sm hover:bg-success">
                        <span>19</span>
                    </button>
                </div>
                <!-- ... demais dias do mês ... -->
            </div>
            <div class="mt-3 flex items-center gap-2 rounded-md border border-border bg-muted/40 px-3 py-2 text-xs">
                <i class="bi bi-calendar-check text-sm text-muted-foreground" aria-hidden="true"></i>
                <span class="min-w-0 truncate font-medium text-foreground">5, 12 e 19 de julho</span>
            </div>
        </div>
        HTML;

    $rangeHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <!-- dia 10, início do range -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" aria-selected="true" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 rounded-l-md rounded-r-none bg-info text-info-foreground shadow-sm hover:bg-info">
                        <span>10</span>
                    </button>
                </div>
                <!-- dias 11 a 15, preenchimento do range -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 rounded-none bg-info/15 text-foreground">
                        <span>11</span>
                    </button>
                </div>
                <!-- dia 16, fim do range -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" aria-selected="true" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 rounded-r-md rounded-l-none bg-info text-info-foreground shadow-sm hover:bg-info">
                        <span>16</span>
                    </button>
                </div>
                <!-- ... demais dias do mês ... -->
            </div>
            <div class="mt-3 flex items-center gap-2 rounded-md border border-border bg-muted/40 px-3 py-2 text-xs">
                <i class="bi bi-calendar-check text-sm text-muted-foreground" aria-hidden="true"></i>
                <span class="min-w-0 truncate font-medium text-foreground">10 a 16 de julho</span>
            </div>
        </div>
        HTML;

    $disabledHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <!-- dia comum, habilitado -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground cursor-pointer hover:bg-muted">
                        <span>13</span>
                    </button>
                </div>
                <!-- fim de semana (disable-weekends) -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" disabled class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground opacity-35 cursor-not-allowed hover:bg-transparent">
                        <span>11</span>
                    </button>
                </div>
                <!-- data em disabled-dates -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" disabled class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground opacity-35 cursor-not-allowed hover:bg-transparent">
                        <span>9</span>
                    </button>
                </div>
                <!-- ... demais dias do mês (dias passados também desabilitados por disable-past) ... -->
            </div>
        </div>
        HTML;

    $boundsHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <!-- dia 4, fora da janela min-date, desabilitado -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" disabled class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground opacity-35 cursor-not-allowed hover:bg-transparent">
                        <span>4</span>
                    </button>
                </div>
                <!-- dia 5, início da janela, habilitado -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground cursor-pointer hover:bg-muted">
                        <span>5</span>
                    </button>
                </div>
                <!-- dia 26, fora da janela max-date, desabilitado -->
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" disabled class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 text-foreground opacity-35 cursor-not-allowed hover:bg-transparent">
                        <span>26</span>
                    </button>
                </div>
                <!-- ... demais dias do mês ... -->
            </div>
        </div>
        HTML;

    $mondayHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
            <div class="mb-1.5 grid grid-cols-7 gap-0.5">
                <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
                <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
                <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
                <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
                <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
                <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
                <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <!-- ... dias do mês, semana agora começa na segunda ... -->
            </div>
        </div>
        HTML;

    $sizesHtml = <<<'HTML'
        <div class="inline-block w-full max-w-xs rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-8 text-xs text-foreground cursor-pointer hover:bg-muted">
                        <span>1</span>
                    </button>
                </div>
                <!-- ... demais dias, célula size-8 text-xs ... -->
            </div>
        </div>

        <div class="inline-block w-full max-w-md rounded-md border border-border bg-card p-4 shadow-sm">
        <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-11 text-sm sm:size-12 sm:text-base text-foreground cursor-pointer hover:bg-muted">
                        <span>1</span>
                    </button>
                </div>
                <!-- ... demais dias, célula size-11/size-12 sm:text-base ... -->
            </div>
        </div>
        HTML;

    $colorsHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
            <div class="mb-3 text-center">
                <span class="text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
            </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" aria-selected="true" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 rounded-md bg-danger text-danger-foreground shadow-sm hover:bg-danger">
                        <span>14</span>
                    </button>
                </div>
                <!-- ... demais dias do mês ... -->
            </div>
        </div>

        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
            <div class="mb-3 text-center">
                <span class="text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
            </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <div class="relative flex items-center justify-center">
                    <button type="button" role="gridcell" aria-selected="true" class="relative flex flex-col items-center justify-center font-medium transition-colors outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-1 disabled:pointer-events-none size-9 text-sm sm:size-10 rounded-md bg-success text-success-foreground shadow-sm hover:bg-success">
                        <span>14</span>
                    </button>
                </div>
                <!-- ... demais dias do mês ... -->
            </div>
        </div>
        HTML;

    $noNavHtml = <<<'HTML'
        <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
            <div class="mb-3 text-center">
                <span class="text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
            </div>
        <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
            <div class="grid grid-cols-7 gap-0.5" role="grid">
                <!-- ... dias do mês, sem botões de navegação ... -->
            </div>
        </div>
        HTML;

    $formHtml = <<<'HTML'
        <form class="flex w-full flex-col gap-4 sm:flex-row sm:items-start">
            <div class="inline-block w-full max-w-sm rounded-md border border-border bg-card p-4 shadow-sm">
                <input type="hidden" name="due_date" value="2026-07-15">
            <div class="mb-3 flex items-center justify-between gap-2">
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Mês anterior">
                <i class="bi bi-chevron-left text-sm leading-none" aria-hidden="true"></i>
            </button>
            <div class="flex min-w-0 flex-col items-center gap-0.5">
                <span class="truncate text-sm font-semibold tracking-tight text-foreground">Julho de 2026</span>
                <button type="button" class="rounded-full px-2 py-0.5 text-[11px] font-medium transition-colors text-primary hover:bg-primary/10">Hoje</button>
            </div>
            <button type="button" class="flex size-8 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary" aria-label="Próximo mês">
                <i class="bi bi-chevron-right text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
            <div class="mb-1.5 grid grid-cols-7 gap-0.5">
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Dom</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Seg</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Ter</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qua</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Qui</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sex</span>
            <span class="flex h-7 items-center justify-center text-[10px] font-semibold tracking-wider text-muted-foreground uppercase">Sáb</span>
        </div>
                <div class="grid grid-cols-7 gap-0.5" role="grid">
                    <!-- ... dias do mês ... -->
                </div>
                <div class="mt-3 flex items-center gap-2 rounded-md border border-border bg-muted/40 px-3 py-2 text-xs">
                    <i class="bi bi-calendar-check text-sm text-muted-foreground" aria-hidden="true"></i>
                    <span class="min-w-0 truncate font-medium text-foreground">15 de julho</span>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <p class="mb-0 text-sm text-muted-foreground">
                    A data escolhida vai no input hidden <code>due_date</code>.
                </p>
                <button type="submit" class="btn btn-primary">Salvar prazo</button>
            </div>
        </form>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.calendar&gt;</code> é um calendário mensal em Alpine: navegação, seleção
            <code>single</code>/<code>multiple</code>/<code>range</code>, eventos (<code>dot</code>,
            <code>badge</code>, <code>list</code>), datas bloqueadas, início da semana, tamanhos e cores.
            Use <code>show-selection</code> para ver o resumo da data escolhida, e <code>name</code> para
            publicar um <code>input hidden</code> em formulários.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Mês atual, seleção <code>single</code>, com resumo da data (<code>show-selection</code>).
            </x-slot:description>
            <x-ui.calendar show-selection />
        </x-ui.example>

        <x-ui.example title="Eventos (pontos)" :code="$eventsCode" :html="$eventsHtml">
            <x-slot:description>
                <code>events</code> com <code>date</code>, <code>title</code> e <code>color</code> — até 3 pontos por dia.
            </x-slot:description>
            <x-ui.calendar
                :year="2026"
                :month="7"
                :events="[
                    ['date' => '2026-07-10', 'title' => 'Reunião de equipe', 'color' => 'primary'],
                    ['date' => '2026-07-15', 'title' => 'Entrega do projeto', 'color' => 'danger'],
                    ['date' => '2026-07-15', 'title' => 'Corte de ponto', 'color' => 'warning'],
                    ['date' => '2026-07-22', 'title' => 'Aniversário da empresa', 'color' => 'success'],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Eventos (lista)" :code="$eventsListCode" :html="$eventsListHtml">
            <x-slot:description>
                <code>events-display="list"</code> — agenda do mês abaixo da grade, com bolinha colorida.
            </x-slot:description>
            <x-ui.calendar
                :year="2026"
                :month="7"
                events-display="list"
                :events="[
                    ['date' => '2026-07-10', 'title' => 'Reunião de equipe', 'color' => 'primary'],
                    ['date' => '2026-07-15', 'title' => 'Entrega do projeto', 'color' => 'danger'],
                    ['date' => '2026-07-15', 'title' => 'Corte de ponto', 'color' => 'warning'],
                    ['date' => '2026-07-22', 'title' => 'Aniversário da empresa', 'color' => 'success'],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Eventos (badge)" :code="$eventsBadgeCode" :html="$eventsBadgeHtml">
            <x-slot:description>
                <code>events-display="badge"</code> — contador no canto do dia.
            </x-slot:description>
            <x-ui.calendar
                :year="2026"
                :month="7"
                events-display="badge"
                :events="[
                    ['date' => '2026-07-08', 'title' => 'Stand-up'],
                    ['date' => '2026-07-08', 'title' => '1:1'],
                    ['date' => '2026-07-15', 'title' => 'Release'],
                    ['date' => '2026-07-15', 'title' => 'QA'],
                    ['date' => '2026-07-15', 'title' => 'Demo'],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Seleção múltipla" :code="$multipleCode" :html="$multipleHtml">
            <x-slot:description>
                <code>mode="multiple"</code> — cada clique alterna o dia.
            </x-slot:description>
            <x-ui.calendar
                mode="multiple"
                color="success"
                show-selection
                :selected="['2026-07-05', '2026-07-12', '2026-07-19']"
            />
        </x-ui.example>

        <x-ui.example title="Intervalo (range)" :code="$rangeCode" :html="$rangeHtml">
            <x-slot:description>
                <code>mode="range"</code> — início e fim com preenchimento contínuo entre os dias.
            </x-slot:description>
            <x-ui.calendar
                mode="range"
                color="info"
                show-selection
                :selected="['2026-07-10', '2026-07-16']"
            />
        </x-ui.example>

        <x-ui.example title="Datas desabilitadas" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disable-past</code>, <code>disable-weekends</code> e <code>disabled-dates</code>.
            </x-slot:description>
            <x-ui.calendar
                :year="2026"
                :month="7"
                disable-past
                disable-weekends
                :disabled-dates="['2026-07-09', '2026-07-10']"
                color="primary"
                show-selection
            />
        </x-ui.example>

        <x-ui.example title="Janela min / max" :code="$boundsCode" :html="$boundsHtml">
            <x-slot:description>
                <code>min-date</code> e <code>max-date</code> limitam o período selecionável (ex.: reserva).
            </x-slot:description>
            <x-ui.calendar
                :year="2026"
                :month="7"
                min-date="2026-07-05"
                max-date="2026-07-25"
                color="warning"
                show-selection
            />
        </x-ui.example>

        <x-ui.example title="Semana na segunda" :code="$mondayCode" :html="$mondayHtml">
            <x-slot:description>
                <code>week-start="monday"</code> reordena cabeçalho e grade.
            </x-slot:description>
            <x-ui.calendar week-start="monday" show-selection />
        </x-ui.example>

        <x-ui.example title="Sem navegação" :code="$noNavCode" :html="$noNavHtml">
            <x-slot:description>
                <code>:show-navigation="false"</code> — mês fixo (rótulo permanece).
            </x-slot:description>
            <x-ui.calendar :year="2026" :month="7" :show-navigation="false" color="warning" />
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size="sm"</code> e <code>lg</code> — células menores ou maiores.
            </x-slot:description>
            <div class="flex w-full flex-col items-start gap-6 sm:flex-row sm:items-end">
                <x-ui.calendar size="sm" color="secondary" class="max-w-xs" />
                <x-ui.calendar size="lg" color="primary" class="max-w-md" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Token <code>color</code> no selecionado, “hoje” e preenchimento de range.
            </x-slot:description>
            <div class="flex w-full flex-col items-start gap-6 sm:flex-row">
                <x-ui.calendar color="danger" :selected="'2026-07-14'" :year="2026" :month="7" :show-navigation="false" />
                <x-ui.calendar color="success" :selected="'2026-07-14'" :year="2026" :month="7" :show-navigation="false" />
                <x-ui.calendar color="info" mode="range" :selected="['2026-07-10', '2026-07-16']" :year="2026" :month="7" :show-navigation="false" />
            </div>
        </x-ui.example>

        <x-ui.example title="Integração com formulário" :code="$formCode" :html="$formHtml">
            <x-slot:description>
                <code>name</code> publica um hidden com a data — envia no submit normalmente.
            </x-slot:description>
            <form wire:submit.prevent="save" class="flex w-full flex-col gap-4 sm:flex-row sm:items-start">
                <x-ui.calendar name="due_date" color="danger" show-selection />
                <div class="flex flex-col gap-2">
                    <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
                        A data escolhida vai no input hidden <code>due_date</code>.
                    </p>
                    <x-ui.button type="submit" color="primary">Salvar prazo</x-ui.button>
                </div>
            </form>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api component="ui/calendar/calendar" title="x-ui.calendar" />
</x-ui.docs>
