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
        <x-forms.time-picker placeholder="Selecione o horário" />
        BLADE;

    $basicHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input
                    type="text"
                    placeholder="Selecione o horário"
                    autocomplete="off"
                    class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text"
                >
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;

    $valueCode = <<<'BLADE'
        <x-forms.time-picker :selected="'14:30'" color="success" />
        BLADE;

    $valueHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-success h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" value="14:30" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar horário">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;

    $presetsCode = <<<'BLADE'
        <x-forms.time-picker
            presets
            :selected="'09:00'"
            color="primary"
            placeholder="Atalhos rápidos"
        />
        BLADE;

    $presetsHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" value="09:00" placeholder="Atalhos rápidos" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar horário">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
            <!-- painel (teleportado para o body, oculto até abrir) mostra chips: 08:00, 09:00, 12:00, 14:00, 18:00, 20:00 -->
        </div>
        HTML;

    $customPresetsCode = <<<'BLADE'
        <x-forms.time-picker
            :presets="['07:30', '10:00', '13:30', '16:00', '19:00']"
            :minute-step="30"
            color="info"
        />
        BLADE;

    $customPresetsHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-info h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;

    $solidCode = <<<'BLADE'
        <x-forms.time-picker variant="solid" :selected="'14:30'" color="primary" />
        BLADE;

    $solidHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" value="14:30" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar horário">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
            <!-- variant="solid": no painel, o item selecionado nas colunas usa bg-primary text-primary-foreground em vez do soft padrão -->
        </div>
        HTML;

    $secondsCode = <<<'BLADE'
        <x-forms.time-picker format="H:i:s" :selected="'09:05:30'" color="info" />
        BLADE;

    $secondsHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-info h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" value="09:05:30" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar horário">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
            <!-- painel ganha a coluna extra "Seg" (segundos) -->
        </div>
        HTML;

    $twelveHourCode = <<<'BLADE'
        <x-forms.time-picker format="h:i A" :selected="'14:30'" color="primary" />
        BLADE;

    $twelveHourHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" value="02:30 PM" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar horário">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
            <!-- painel ganha a coluna extra AM/PM -->
        </div>
        HTML;

    $stepCode = <<<'BLADE'
        <x-forms.time-picker :minute-step="15" placeholder="A cada 15 min" color="warning" />
        BLADE;

    $stepHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-warning h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" placeholder="A cada 15 min" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;

    $hourStepCode = <<<'BLADE'
        <x-forms.time-picker :hour-step="2" :minute-step="30" color="secondary" />
        BLADE;

    $hourStepHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-secondary h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;

    $boundsCode = <<<'BLADE'
        <x-forms.time-picker min-time="08:00" max-time="18:00" color="danger" />
        BLADE;

    $boundsHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-danger h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
            <!-- painel desabilita horas fora de 08:00-18:00 -->
        </div>
        HTML;

    $disabledTimesCode = <<<'BLADE'
        <x-forms.time-picker :disabled-times="['12:00', '12:30', '13:00']" color="secondary" />
        BLADE;

    $disabledTimesHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-secondary h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
            <!-- painel desabilita exatamente 12:00, 12:30 e 13:00 -->
        </div>
        HTML;

    $sizesCode = <<<'BLADE'
        <x-forms.time-picker size="sm" placeholder="Pequeno" />
        <x-forms.time-picker size="md" placeholder="Médio" />
        <x-forms.time-picker size="lg" placeholder="Grande" />
        BLADE;

    $sizesHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-4 sm:flex-row">
            <div class="relative inline-block w-full">
                <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-8 text-xs cursor-pointer">
                    <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                    <input type="text" placeholder="Pequeno" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                        <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="relative inline-block w-full">
                <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
                    <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                    <input type="text" placeholder="Médio" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                        <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="relative inline-block w-full">
                <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-11 text-base cursor-pointer">
                    <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                    <input type="text" placeholder="Grande" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                        <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-forms.time-picker color="primary" :selected="'09:00'" />
        <x-forms.time-picker color="success" :selected="'09:00'" />
        <x-forms.time-picker color="danger" :selected="'09:00'" />
        <x-forms.time-picker color="info" :selected="'09:00'" />
        BLADE;

    $colorsHtml = <<<'HTML'
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="relative inline-block w-full">
                <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
                    <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                    <input type="text" value="09:00" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar horário">
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                        <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="relative inline-block w-full">
                <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-success h-9.5 text-sm cursor-pointer">
                    <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                    <input type="text" value="09:00" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar horário">
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                        <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="relative inline-block w-full">
                <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-danger h-9.5 text-sm cursor-pointer">
                    <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                    <input type="text" value="09:00" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar horário">
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                        <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="relative inline-block w-full">
                <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-info h-9.5 text-sm cursor-pointer">
                    <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                    <input type="text" value="09:00" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar horário">
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                        <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
        HTML;

    $noPreviewCode = <<<'BLADE'
        <x-forms.time-picker :show-preview="false" :show-headers="false" :selected="'10:15'" />
        BLADE;

    $noPreviewHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" value="10:15" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar horário">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
            <!-- painel sem bloco de preview e sem cabeçalhos "Hora"/"Min" nas colunas -->
        </div>
        HTML;

    $disabledCode = <<<'BLADE'
        <x-forms.time-picker disabled :selected="'09:00'" />
        BLADE;

    $disabledHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm opacity-60 cursor-not-allowed bg-muted">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" value="09:00" autocomplete="off" disabled class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" disabled aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;

    $noClearCode = <<<'BLADE'
        <x-forms.time-picker :clearable="false" :selected="'09:00'" />
        BLADE;

    $noClearHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" value="09:00" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;

    $closeOnSelectCode = <<<'BLADE'
        <x-forms.time-picker close-on-select placeholder="Fecha ao escolher" />
        BLADE;

    $closeOnSelectHtml = <<<'HTML'
        <div class="relative inline-block w-full">
            <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary h-9.5 text-sm cursor-pointer">
                <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                <input type="text" placeholder="Fecha ao escolher" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                    <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;

    $formCode = <<<'BLADE'
        <form wire:submit.prevent="save" class="flex flex-col gap-4 sm:flex-row sm:items-end">
            <x-forms.time-picker name="start_time" color="danger" class="sm:max-w-56" />
            <x-ui.button type="submit" color="primary">Salvar</x-ui.button>
        </form>
        BLADE;

    $formHtml = <<<'HTML'
        <form class="flex w-full flex-col gap-4 sm:flex-row sm:items-end">
            <div class="relative inline-block w-full sm:max-w-56">
                <input type="hidden" name="start_time" value="">
                <div class="flex w-full items-center gap-2 rounded-lg border border-border bg-card px-3 shadow-sm transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-danger h-9.5 text-sm cursor-pointer">
                    <i class="bi bi-clock shrink-0 text-muted-foreground" aria-hidden="true"></i>
                    <input type="text" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed cursor-text">
                    <button type="button" class="flex shrink-0 items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Abrir seletor de horário">
                        <i class="bi bi-chevron-down text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-forms.time-picker&gt;</code> — input + painel com colunas de hora/minuto
            (segundo/AM-PM opcionais), preview do horário e atalhos via <code>presets</code>.
            Use <code>format</code> (<code>H</code>/<code>h</code>/<code>i</code>/<code>s</code>/<code>A</code>),
            <code>variant="soft"</code>, passos <code>hour-step</code>/<code>minute-step</code>
            e <code>name</code> em formulários.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Formato <code>H:i</code> com preview grande e cabeçalhos nas colunas.
            </x-slot:description>
            <x-forms.time-picker placeholder="Selecione o horário" />
        </x-ui.example>

        <x-ui.example title="Valor inicial" :code="$valueCode" :html="$valueHtml">
            <x-slot:description>
                <code>selected</code> aceita <code>'H:i'</code> (ou <code>'H:i:s'</code>) já formatado.
            </x-slot:description>
            <x-forms.time-picker :selected="'14:30'" color="success" />
        </x-ui.example>

        <x-ui.example title="Presets rápidos" :code="$presetsCode" :html="$presetsHtml">
            <x-slot:description>
                <code>presets</code> mostra chips (08:00, 09:00, 12:00…). Clique aplica e destaca o ativo.
            </x-slot:description>
            <div class="max-w-sm">
                <x-forms.time-picker
                    presets
                    :selected="'09:00'"
                    color="primary"
                    placeholder="Atalhos rápidos"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Presets customizados" :code="$customPresetsCode" :html="$customPresetsHtml">
            <x-slot:description>
                Passe um array <code>:presets="[...]"</code> — combine com <code>minute-step</code>.
            </x-slot:description>
            <x-forms.time-picker
                :presets="['07:30', '10:00', '13:30', '16:00', '19:00']"
                :minute-step="30"
                color="info"
            />
        </x-ui.example>

        <x-ui.example title="Variante solid" :code="$solidCode" :html="$solidHtml">
            <x-slot:description>
                Padrão é <code>soft</code>. Use <code>variant="solid"</code> para pill preenchida no item ativo.
            </x-slot:description>
            <x-forms.time-picker variant="solid" :selected="'14:30'" color="primary" />
        </x-ui.example>

        <x-ui.example title="Com segundos" :code="$secondsCode" :html="$secondsHtml">
            <x-slot:description>
                <code>format="H:i:s"</code> — adiciona a coluna de segundos.
            </x-slot:description>
            <x-forms.time-picker format="H:i:s" :selected="'09:05:30'" color="info" />
        </x-ui.example>

        <x-ui.example title="Formato 12 horas" :code="$twelveHourCode" :html="$twelveHourHtml">
            <x-slot:description>
                <code>format="h:i A"</code> — hora 1–12 + coluna AM/PM.
            </x-slot:description>
            <x-forms.time-picker format="h:i A" :selected="'14:30'" color="primary" />
        </x-ui.example>

        <x-ui.example title="Passo de minutos" :code="$stepCode" :html="$stepHtml">
            <x-slot:description>
                <code>minute-step="15"</code> — lista só com múltiplos de 15.
            </x-slot:description>
            <x-forms.time-picker :minute-step="15" placeholder="A cada 15 min" color="warning" />
        </x-ui.example>

        <x-ui.example title="Passo de horas" :code="$hourStepCode" :html="$hourStepHtml">
            <x-slot:description>
                <code>hour-step</code> + <code>minute-step</code> para grades mais curtas.
            </x-slot:description>
            <x-forms.time-picker :hour-step="2" :minute-step="30" color="secondary" />
        </x-ui.example>

        <x-ui.example title="Janela min / max" :code="$boundsCode" :html="$boundsHtml">
            <x-slot:description>
                <code>min-time</code> e <code>max-time</code> desabilitam valores fora da janela.
            </x-slot:description>
            <x-forms.time-picker min-time="08:00" max-time="18:00" color="danger" />
        </x-ui.example>

        <x-ui.example title="Horários desabilitados" :code="$disabledTimesCode" :html="$disabledTimesHtml">
            <x-slot:description>
                <code>disabled-times</code> — lista exata de <code>'H:i'</code> bloqueados.
            </x-slot:description>
            <x-forms.time-picker :disabled-times="['12:00', '12:30', '13:00']" color="secondary" />
        </x-ui.example>

        <x-ui.example title="Sem preview / cabeçalhos" :code="$noPreviewCode" :html="$noPreviewHtml">
            <x-slot:description>
                <code>:show-preview="false"</code> e <code>:show-headers="false"</code> para um painel compacto.
            </x-slot:description>
            <x-forms.time-picker :show-preview="false" :show-headers="false" :selected="'10:15'" />
        </x-ui.example>

        <x-ui.example title="Fecha ao selecionar" :code="$closeOnSelectCode" :html="$closeOnSelectHtml">
            <x-slot:description>
                <code>close-on-select</code> fecha o painel ao clicar em qualquer coluna.
            </x-slot:description>
            <x-forms.time-picker close-on-select placeholder="Fecha ao escolher" />
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code> ajusta o input e o padding das células nas colunas.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4 sm:flex-row">
                <x-forms.time-picker size="sm" placeholder="Pequeno" />
                <x-forms.time-picker size="md" placeholder="Médio" />
                <x-forms.time-picker size="lg" placeholder="Grande" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Token de cor na seleção, presets, “Agora”, “OK” e anel de foco.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <x-forms.time-picker color="primary" :selected="'09:00'" />
                <x-forms.time-picker color="success" :selected="'09:00'" />
                <x-forms.time-picker color="danger" :selected="'09:00'" />
                <x-forms.time-picker color="info" :selected="'09:00'" />
            </div>
        </x-ui.example>

        <x-ui.example title="Desabilitado" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> bloqueia digitação, painel e limpar.
            </x-slot:description>
            <x-forms.time-picker disabled :selected="'09:00'" />
        </x-ui.example>

        <x-ui.example title="Sem botão de limpar" :code="$noClearCode" :html="$noClearHtml">
            <x-slot:description>
                <code>:clearable="false"</code> — esconde o "x".
            </x-slot:description>
            <x-forms.time-picker :clearable="false" :selected="'09:00'" />
        </x-ui.example>

        <x-ui.example title="Integração com formulário" :code="$formCode" :html="$formHtml">
            <x-slot:description>
                <code>name</code> publica um <code>input hidden</code> no submit.
            </x-slot:description>
            <form wire:submit.prevent="save" class="flex w-full flex-col gap-4 sm:flex-row sm:items-end">
                <x-forms.time-picker name="start_time" color="danger" class="sm:max-w-56" />
                <x-ui.button type="submit" color="primary">Salvar</x-ui.button>
            </form>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api component="forms/time-picker/time-picker" title="x-forms.time-picker" />
</x-ui.docs>
