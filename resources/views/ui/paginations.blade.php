<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.pagination :current="3" :total="10" />
        BLADE;

    $ellipsisCode = <<<'BLADE'
        <x-ui.pagination :current="8" :total="20" :siblings="1" :boundaries="1" />
        BLADE;

    $simpleCode = <<<'BLADE'
        <x-ui.pagination mode="simple" :current="2" :total="8" />
        BLADE;

    $compactCode = <<<'BLADE'
        <x-ui.pagination mode="compact" :current="4" :total="12" show-first-last />
        BLADE;

    $infoCode = <<<'BLADE'
        <x-ui.pagination
            align="between"
            show-info
            show-per-page
            :current="2"
            :total="10"
            :per-page="10"
            :total-items="95"
        />
        BLADE;

    $jumpCode = <<<'BLADE'
        <x-ui.pagination
            show-jump
            show-first-last
            :current="5"
            :total="24"
        />
        BLADE;

    $variantsCode = <<<'BLADE'
        <x-ui.pagination variant="outline" :current="3" :total="8" />
        <x-ui.pagination variant="soft" :current="3" :total="8" />
        <x-ui.pagination variant="solid" :current="3" :total="8" />
        <x-ui.pagination variant="ghost" :current="3" :total="8" />
        <x-ui.pagination variant="flat" :current="3" :total="8" />
        BLADE;

    $colorsCode = <<<'BLADE'
        <x-ui.pagination color="primary" variant="soft" :current="2" :total="6" />
        <x-ui.pagination color="success" variant="soft" :current="2" :total="6" />
        <x-ui.pagination color="danger" :current="2" :total="6" />
        <x-ui.pagination color="info" variant="flat" :current="2" :total="6" />
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.pagination size="sm" :current="2" :total="6" />
        <x-ui.pagination size="md" :current="2" :total="6" />
        <x-ui.pagination size="lg" :current="2" :total="6" />
        BLADE;

    $roundedCode = <<<'BLADE'
        <x-ui.pagination rounded :current="3" :total="8" />
        <x-ui.pagination rounded variant="soft" color="info" :current="3" :total="8" />
        BLADE;

    $labelsCode = <<<'BLADE'
        <x-ui.pagination
            :icons="false"
            mode="simple"
            prev-label="Voltar"
            next-label="Avançar"
            :current="2"
            :total="5"
        />
        BLADE;

    $disabledCode = <<<'BLADE'
        <x-ui.pagination disabled :current="3" :total="8" show-info :total-items="80" />
        BLADE;

    $alignCode = <<<'BLADE'
        <x-ui.pagination align="start" :current="2" :total="5" />
        <x-ui.pagination align="center" :current="2" :total="5" />
        <x-ui.pagination align="end" :current="2" :total="5" />
        BLADE;

    $eventsCode = <<<'BLADE'
        <x-ui.pagination
            :current="1"
            :total="12"
            :total-items="120"
            show-info
            show-per-page
            x-on:pagination-change="console.log($event.detail)"
            x-on:pagination-per-page="console.log('per-page', $event.detail)"
        />
        BLADE;

    $paginatorCode = <<<'BLADE'
        {{-- Com LengthAwarePaginator do Laravel --}}
        <x-ui.pagination :paginator="$users" show-info align="between" />
        BLADE;

    $btn = 'inline-flex shrink-0 items-center justify-center font-medium transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none disabled:opacity-50';

    $basicHtml = <<<'HTML'
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="inline-flex shrink-0 items-center justify-center font-medium transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none disabled:opacity-50 h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted" aria-label="Anterior">
                        <i class="bi bi-chevron-left text-xs" aria-hidden="true"></i>
                        <span class="sr-only">Anterior</span>
                    </button>
                    <button type="button" class="inline-flex shrink-0 items-center justify-center font-medium transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none disabled:opacity-50 h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums">1</button>
                    <button type="button" class="inline-flex shrink-0 items-center justify-center font-medium transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none disabled:opacity-50 h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums">2</button>
                    <button type="button" aria-current="page" class="inline-flex shrink-0 items-center justify-center font-medium transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none disabled:opacity-50 h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums">3</button>
                    <button type="button" class="inline-flex shrink-0 items-center justify-center font-medium transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none disabled:opacity-50 h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums">4</button>
                    <span aria-hidden="true" class="inline-flex shrink-0 items-center justify-center font-medium transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none disabled:opacity-50 h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-muted-foreground pointer-events-none">…</span>
                    <button type="button" class="inline-flex shrink-0 items-center justify-center font-medium transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none disabled:opacity-50 h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums">10</button>
                    <button type="button" class="inline-flex shrink-0 items-center justify-center font-medium transition-colors duration-150 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 disabled:pointer-events-none disabled:opacity-50 h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted" aria-label="Próximo">
                        <span class="sr-only">Próximo</span>
                        <i class="bi bi-chevron-right text-xs" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </nav>
        HTML;

    $ellipsisHtml = <<<'HTML'
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">7</button>
                    <button type="button" aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">8</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">9</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">20</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>
        HTML;

    $simpleHtml = <<<'HTML'
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior">
                        <i class="bi bi-chevron-left text-xs" aria-hidden="true"></i>
                        <span>Anterior</span>
                    </button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo">
                        <span>Próximo</span>
                        <i class="bi bi-chevron-right text-xs" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </nav>
        HTML;

    $compactHtml = <<<'HTML'
        <!-- mode="compact": show-first-last é ignorado nesse modo -->
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior">
                        <i class="bi bi-chevron-left text-xs" aria-hidden="true"></i>
                        <span class="sr-only">Anterior</span>
                    </button>
                    <span aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-muted-foreground tabular-nums inline-flex shrink-0 items-center justify-center font-medium">4 / 12</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo">
                        <span class="sr-only">Próximo</span>
                        <i class="bi bi-chevron-right text-xs" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </nav>
        HTML;

    $infoHtml = <<<'HTML'
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-between" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3 me-auto">
                <p class="m-0 text-muted-foreground text-[0.8125rem]">Mostrando 11–20 de 95</p>
                <label class="inline-flex items-center gap-2 text-muted-foreground text-[0.8125rem]">
                    <span class="whitespace-nowrap">Por página</span>
                    <select class="rounded-md border border-border bg-card px-2 font-medium text-foreground h-9 text-sm">
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <button type="button" aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">2</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">3</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">10</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>
        HTML;

    $jumpHtml = <<<'HTML'
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Primeira"><i class="bi bi-chevron-double-left text-xs" aria-hidden="true"></i><span class="sr-only">Primeira</span></button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">4</button>
                    <button type="button" aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">5</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">6</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">24</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Última"><span class="sr-only">Última</span><i class="bi bi-chevron-double-right text-xs" aria-hidden="true"></i></button>
                </div>
                <form class="inline-flex items-center gap-2">
                    <label class="inline-flex items-center gap-2 text-muted-foreground text-[0.8125rem]">
                        <span class="whitespace-nowrap">Ir para</span>
                        <input type="number" min="1" max="24" value="5" class="rounded-md border border-border bg-card px-2 text-center font-medium text-foreground tabular-nums h-9 w-12 text-sm" aria-label="Número da página">
                    </label>
                    <button type="submit" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium">Ir</button>
                </form>
            </div>
        </nav>
        HTML;

    $disabledHtml = <<<'HTML'
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <p class="m-0 text-muted-foreground text-[0.8125rem]">Mostrando 21–30 de 80</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" disabled class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium disabled:pointer-events-none disabled:opacity-50" aria-label="Anterior" aria-disabled="true"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" disabled class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium disabled:pointer-events-none disabled:opacity-50">1</button>
                    <button type="button" disabled class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium disabled:pointer-events-none disabled:opacity-50">2</button>
                    <button type="button" disabled aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium disabled:pointer-events-none disabled:opacity-50">3</button>
                    <button type="button" disabled class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium disabled:pointer-events-none disabled:opacity-50">4</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" disabled class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium disabled:pointer-events-none disabled:opacity-50">8</button>
                    <button type="button" disabled class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium disabled:pointer-events-none disabled:opacity-50" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>
        HTML;

    $variantsHtml = <<<'HTML'
        <!-- outline (padrão) -->
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">2</button>
                    <button type="button" aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">3</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">4</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">8</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>

        <!-- soft: idle "border border-transparent bg-primary/10 text-primary hover:bg-primary/20"; ativo "border border-transparent bg-primary text-primary-foreground hover:bg-primary" -->
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 tabular-nums inline-flex shrink-0 items-center justify-center font-medium">2</button>
                    <button type="button" aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">3</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 tabular-nums inline-flex shrink-0 items-center justify-center font-medium">4</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 tabular-nums inline-flex shrink-0 items-center justify-center font-medium">8</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>

        <!-- solid: no componente atual gera as mesmas classes de "outline" (idle/ativo idênticos) -->
        <!-- ghost: idle "border border-transparent bg-transparent text-foreground hover:bg-muted"; ativo "border border-transparent bg-primary/15 text-primary hover:bg-primary/15" -->
        <!-- flat: grupo sem gap-1, botões com "border-y" contínuo (-ms-px) formando um bloco único; ativo com z-[1] -->
        HTML;

    $colorsHtml = <<<'HTML'
        <!-- primary (soft) -->
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <button type="button" aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">2</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 tabular-nums inline-flex shrink-0 items-center justify-center font-medium">3</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 tabular-nums inline-flex shrink-0 items-center justify-center font-medium">6</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-transparent bg-primary/10 text-primary hover:bg-primary/20 inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>

        <!-- success (soft): mesma estrutura, troque "primary" por "success" nas classes de cor -->
        <!-- danger (outline, padrão): idle "border border-border bg-card text-foreground hover:bg-muted"; ativo "border border-danger bg-danger text-danger-foreground hover:bg-danger" -->
        <!-- info (flat): grupo contínuo (-ms-px, sem gap-1); ativo "border-y border-info bg-info text-info-foreground hover:bg-info z-[1]" -->
        HTML;

    $sizesHtml = <<<'HTML'
        <!-- sm -->
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-8 min-w-8 px-2 text-xs gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-[0.7rem]" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" class="h-8 min-w-8 px-2 text-xs gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <button type="button" aria-current="page" class="h-8 min-w-8 px-2 text-xs gap-1 rounded-md border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">2</button>
                    <button type="button" class="h-8 min-w-8 px-2 text-xs gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">3</button>
                    <span aria-hidden="true" class="h-8 min-w-8 px-2 text-xs gap-1 rounded-md border border-border bg-card text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-8 min-w-8 px-2 text-xs gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">6</button>
                    <button type="button" class="h-8 min-w-8 px-2 text-xs gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-[0.7rem]" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>

        <!-- md: mesma estrutura, botões "h-9 min-w-9 px-2.5 text-sm gap-1", ícone "text-xs" -->
        <!-- lg: mesma estrutura, botões "h-11 min-w-11 px-3.5 text-sm gap-1.5", ícone "text-sm" -->
        HTML;

    $roundedHtml = <<<'HTML'
        <!-- rounded: raio "rounded-full" em vez de "rounded-md" -->
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-full border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-full border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-full border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">2</button>
                    <button type="button" aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-full border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">3</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-full border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">4</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-full border border-border bg-card text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-full border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">8</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-full border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>

        <!-- rounded + soft + info: mesma forma "rounded-full", classes de cor "soft"/"info" -->
        HTML;

    $labelsHtml = <<<'HTML'
        <!-- :icons="false": sem <i>, só o texto do label -->
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Voltar">
                        <span>Voltar</span>
                    </button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Avançar">
                        <span>Avançar</span>
                    </button>
                </div>
            </div>
        </nav>
        HTML;

    $alignHtml = <<<'HTML'
        <!-- align="start" -->
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-start" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <button type="button" aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">2</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">3</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">4</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">5</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>

        <!-- align="center": troque "justify-start" por "justify-center" na <nav> -->
        <!-- align="end": troque "justify-start" por "justify-end" na <nav> -->
        HTML;

    $eventsHtml = <<<'HTML'
        <!-- x-on:pagination-change / x-on:pagination-per-page não têm efeito estático; a estrutura abaixo é o shell renderizado -->
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-center" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3">
                <p class="m-0 text-muted-foreground text-[0.8125rem]">Mostrando 1–10 de 120</p>
                <label class="inline-flex items-center gap-2 text-muted-foreground text-[0.8125rem]">
                    <span class="whitespace-nowrap">Por página</span>
                    <select class="rounded-md border border-border bg-card px-2 font-medium text-foreground h-9 text-sm">
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">2</button>
                    <span aria-hidden="true" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-muted-foreground pointer-events-none inline-flex shrink-0 items-center justify-center font-medium">…</span>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">12</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>
        HTML;

    $paginatorHtml = <<<'HTML'
        <!-- Ilustrativo: com um LengthAwarePaginator real, from/to/total/lastPage vêm do próprio paginator -->
        <nav class="ui-pagination flex w-full flex-wrap items-center gap-3 justify-between" aria-label="Paginação">
            <div class="flex flex-wrap items-center gap-3 me-auto">
                <p class="m-0 text-muted-foreground text-[0.8125rem]">Mostrando 1–15 de 42</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <div class="inline-flex items-center gap-1" role="list">
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Anterior"><i class="bi bi-chevron-left text-xs" aria-hidden="true"></i><span class="sr-only">Anterior</span></button>
                    <button type="button" aria-current="page" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-primary bg-primary text-primary-foreground hover:bg-primary tabular-nums inline-flex shrink-0 items-center justify-center font-medium">1</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">2</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted tabular-nums inline-flex shrink-0 items-center justify-center font-medium">3</button>
                    <button type="button" class="h-9 min-w-9 px-2.5 text-sm gap-1 rounded-md border border-border bg-card text-foreground hover:bg-muted inline-flex shrink-0 items-center justify-center font-medium" aria-label="Próximo"><span class="sr-only">Próximo</span><i class="bi bi-chevron-right text-xs" aria-hidden="true"></i></button>
                </div>
            </div>
        </nav>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.pagination&gt;</code> é uma paginação em Alpine: modos
            <code>full</code>/<code>simple</code>/<code>compact</code>, variantes, cores, tamanhos,
            ellipsis, primeira/última, info (“Mostrando X–Y de Z”), seletor de itens por página,
            salto direto e eventos <code>pagination-change</code> /
            <code>pagination-per-page</code>. Aceita props manuais ou um
            <code>LengthAwarePaginator</code> via <code>:paginator</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Números de página com anterior/próximo. Clique para navegar (estado Alpine).
            </x-slot:description>
            <x-ui.pagination :current="3" :total="10" />
        </x-ui.example>

        <x-ui.example title="Ellipsis" :code="$ellipsisCode" :html="$ellipsisHtml">
            <x-slot:description>
                Com muitas páginas, <code>siblings</code> e <code>boundaries</code> controlam a janela.
            </x-slot:description>
            <x-ui.pagination :current="8" :total="20" :siblings="1" :boundaries="1" />
        </x-ui.example>

        <x-ui.example title="Simple" :code="$simpleCode" :html="$simpleHtml">
            <x-slot:description>
                <code>mode="simple"</code> — só anterior/próximo com rótulos.
            </x-slot:description>
            <x-ui.pagination mode="simple" :current="2" :total="8" />
        </x-ui.example>

        <x-ui.example title="Compact" :code="$compactCode" :html="$compactHtml">
            <x-slot:description>
                <code>mode="compact"</code> mostra <code>atual / total</code>;
                <code>show-first-last</code> adiciona os atalhos.
            </x-slot:description>
            <x-ui.pagination mode="compact" :current="4" :total="12" show-first-last />
        </x-ui.example>

        <x-ui.example title="Info + por página" :code="$infoCode" :html="$infoHtml">
            <x-slot:description>
                <code>show-info</code> + <code>total-items</code> + <code>show-per-page</code>,
                alinhado com <code>align="between"</code>.
            </x-slot:description>
            <x-ui.pagination
                align="between"
                show-info
                show-per-page
                :current="2"
                :total="10"
                :per-page="10"
                :total-items="95"
            />
        </x-ui.example>

        <x-ui.example title="Ir para página" :code="$jumpCode" :html="$jumpHtml">
            <x-slot:description>
                <code>show-jump</code> + <code>show-first-last</code>.
            </x-slot:description>
            <x-ui.pagination show-jump show-first-last :current="5" :total="24" />
        </x-ui.example>

        <x-ui.example title="Desabilitado" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> bloqueia todos os controles.
            </x-slot:description>
            <x-ui.pagination disabled :current="3" :total="8" show-info :total-items="80" />
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>outline</code> (padrão), <code>soft</code>, <code>solid</code>,
                <code>ghost</code> e <code>flat</code> (grupo contínuo).
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.pagination variant="outline" :current="3" :total="8" />
                <x-ui.pagination variant="soft" :current="3" :total="8" />
                <x-ui.pagination variant="solid" :current="3" :total="8" />
                <x-ui.pagination variant="ghost" :current="3" :total="8" />
                <x-ui.pagination variant="flat" :current="3" :total="8" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Tokens <code>primary</code>/<code>secondary</code>/<code>success</code>/
                <code>warning</code>/<code>danger</code>/<code>info</code>.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.pagination color="primary" variant="soft" :current="2" :total="6" />
                <x-ui.pagination color="success" variant="soft" :current="2" :total="6" />
                <x-ui.pagination color="danger" :current="2" :total="6" />
                <x-ui.pagination color="info" variant="flat" :current="2" :total="6" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.pagination size="sm" :current="2" :total="6" />
                <x-ui.pagination size="md" :current="2" :total="6" />
                <x-ui.pagination size="lg" :current="2" :total="6" />
            </div>
        </x-ui.example>

        <x-ui.example title="Arredondado" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code> aplica pill nos botões.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.pagination rounded :current="3" :total="8" />
                <x-ui.pagination rounded variant="soft" color="info" :current="3" :total="8" />
            </div>
        </x-ui.example>

        <x-ui.example title="Só texto" :code="$labelsCode" :html="$labelsHtml">
            <x-slot:description>
                <code>:icons="false"</code> com labels customizados.
            </x-slot:description>
            <x-ui.pagination
                :icons="false"
                mode="simple"
                prev-label="Voltar"
                next-label="Avançar"
                :current="2"
                :total="5"
            />
        </x-ui.example>

        <x-ui.example title="Alinhamento" :code="$alignCode" :html="$alignHtml">
            <x-slot:description>
                <code>align</code>: <code>start</code>, <code>center</code>, <code>end</code>,
                <code>between</code>.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.pagination align="start" :current="2" :total="5" />
                <x-ui.pagination align="center" :current="2" :total="5" />
                <x-ui.pagination align="end" :current="2" :total="5" />
            </div>
        </x-ui.example>

        <x-ui.example title="Eventos" :code="$eventsCode" :html="$eventsHtml">
            <x-slot:description>
                Abra o console: <code>pagination-change</code> e <code>pagination-per-page</code>.
            </x-slot:description>
            <x-ui.pagination
                :current="1"
                :total="12"
                :total-items="120"
                show-info
                show-per-page
                x-on:pagination-change="console.log('pagination-change', $event.detail)"
                x-on:pagination-per-page="console.log('pagination-per-page', $event.detail)"
            />
        </x-ui.example>

        <x-ui.example title="Paginator Laravel" :code="$paginatorCode" :html="$paginatorHtml">
            <x-slot:description>
                Passe <code>:paginator="$users"</code> — o componente lê
                <code>currentPage</code>, <code>lastPage</code>, <code>total</code>,
                <code>perPage</code> e as URLs automaticamente.
            </x-slot:description>
            <p class="mb-0 text-sm text-muted-foreground">
                Em páginas reais: <code>&lt;x-ui.pagination :paginator="$users" show-info align="between" /&gt;</code>
            </p>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api component="ui/pagination/pagination" title="x-ui.pagination" />
</x-ui.docs>
