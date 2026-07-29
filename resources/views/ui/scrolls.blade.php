<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $items = [
        'Dashboard com métricas em tempo real',
        'Biblioteca de componentes reutilizáveis',
        'Temas claro e escuro com tokens CSS',
        'Formulários com máscaras e validação',
        'Tabelas, kanban e calendários',
        'Notificações toast e drawers',
        'Charts Apache ECharts integrados',
        'Acessibilidade e foco visível',
        'Livewire + Alpine sem SPA pesada',
        'Testes Pest cobrindo a UI',
        'Scroll areas com fades e atalhos',
        'Scrollspy para docs longas',
    ];

    $defaultCode = <<<'BLADE'
<x-ui.scroll height="14rem">
    <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
        <li>Item 1</li>
        <li>Item 2</li>
        {{-- … --}}
    </ul>
</x-ui.scroll>
BLADE;

    $scrollbarCode = <<<'BLADE'
<x-ui.scroll height="12rem" scrollbar="thin" color="primary">…</x-ui.scroll>
<x-ui.scroll height="12rem" scrollbar="auto" color="success">…</x-ui.scroll>
<x-ui.scroll height="12rem" scrollbar="hidden">…</x-ui.scroll>
BLADE;

    $fadeCode = <<<'BLADE'
<x-ui.scroll height="12rem" fade>…</x-ui.scroll>
<x-ui.scroll height="12rem" :fade="false" shadow>…</x-ui.scroll>
BLADE;

    $horizontalCode = <<<'BLADE'
<x-ui.scroll orientation="horizontal" height="7rem" fade>
    <div class="flex w-max gap-3">
        <div class="w-40 shrink-0 rounded-md border border-border bg-muted/40 p-4">Card A</div>
        <div class="w-40 shrink-0 rounded-md border border-border bg-muted/40 p-4">Card B</div>
        {{-- … --}}
    </div>
</x-ui.scroll>
BLADE;

    $chromeCode = <<<'BLADE'
<x-ui.scroll height="16rem">
    <x-slot:header>
        <p class="mb-0 text-sm font-semibold text-foreground">Mensagens</p>
    </x-slot:header>

    <div class="space-y-2 text-sm text-muted-foreground">…</div>

    <x-slot:footer>
        <p class="mb-0 text-xs text-muted-foreground">12 conversas</p>
    </x-slot:footer>
</x-ui.scroll>
BLADE;

    $buttonsCode = <<<'BLADE'
<x-ui.scroll height="14rem" show-buttons fade color="primary">…</x-ui.scroll>
BLADE;

    $colorsCode = <<<'BLADE'
<x-ui.scroll height="10rem" color="primary">…</x-ui.scroll>
<x-ui.scroll height="10rem" color="danger">…</x-ui.scroll>
<x-ui.scroll height="10rem" color="info">…</x-ui.scroll>
BLADE;

    $roundedCode = <<<'BLADE'
<x-ui.scroll height="10rem" rounded="none">…</x-ui.scroll>
<x-ui.scroll height="10rem" rounded="md">…</x-ui.scroll>
<x-ui.scroll height="10rem" rounded="xl">…</x-ui.scroll>
BLADE;

    $apiCode = <<<'BLADE'
<div x-data class="flex flex-col gap-3">
    <div x-ref="scrollWrap">
        <x-ui.scroll height="12rem" :fade="false">…</x-ui.scroll>
    </div>
    <div class="flex gap-2">
        <x-ui.button size="sm" color="primary" x-on:click="Alpine.$data($refs.scrollWrap.firstElementChild).scrollToTop()">
            Topo
        </x-ui.button>
        <x-ui.button size="sm" variant="outline" color="secondary" x-on:click="Alpine.$data($refs.scrollWrap.firstElementChild).scrollToBottom()">
            Final
        </x-ui.button>
    </div>
</div>
BLADE;

    $defaultHtml = <<<'HTML'
<div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border w-full" style="--ui-scroll-height: 14rem; --ui-scroll-thumb: var(--muted-foreground)" role="region" aria-label="Área de rolagem">
    <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
        <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
            <div class="ui-scroll-content">
                <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
                    <li class="rounded-md border border-border/70 bg-muted/30 px-3 py-2 text-foreground">Dashboard com métricas em tempo real</li>
                    <li class="rounded-md border border-border/70 bg-muted/30 px-3 py-2 text-foreground">Biblioteca de componentes reutilizáveis</li>
                    <li class="rounded-md border border-border/70 bg-muted/30 px-3 py-2 text-foreground">Temas claro e escuro com tokens CSS</li>
                    <!-- ... mais itens ... -->
                </ul>
            </div>
        </div>
        <!-- fade (padrão true): gradientes nas bordas, visíveis via JS conforme a posição do scroll -->
        <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
    </div>
</div>
HTML;

    $scrollbarHtml = <<<'HTML'
<div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
    <div>
        <p class="mb-2 text-xs font-medium text-muted-foreground">thin</p>
        <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border" style="--ui-scroll-height: 12rem; --ui-scroll-thumb: var(--primary)" role="region" aria-label="Área de rolagem">
            <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
                <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
                    <div class="ui-scroll-content">
                        <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm">
                            <li>Dashboard com métricas em tempo real</li>
                            <li>Biblioteca de componentes reutilizáveis</li>
                        </ul>
                    </div>
                </div>
                <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
                <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            </div>
        </div>
    </div>
    <div>
        <p class="mb-2 text-xs font-medium text-muted-foreground">auto</p>
        <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border" style="--ui-scroll-height: 12rem; --ui-scroll-thumb: var(--success)" role="region" aria-label="Área de rolagem">
            <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
                <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-auto" tabindex="0">
                    <div class="ui-scroll-content">
                        <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm">
                            <li>Dashboard com métricas em tempo real</li>
                            <li>Biblioteca de componentes reutilizáveis</li>
                        </ul>
                    </div>
                </div>
                <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
                <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            </div>
        </div>
    </div>
    <div>
        <p class="mb-2 text-xs font-medium text-muted-foreground">hidden</p>
        <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border" style="--ui-scroll-height: 12rem; --ui-scroll-thumb: var(--muted-foreground)" role="region" aria-label="Área de rolagem">
            <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
                <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-hidden" tabindex="0">
                    <div class="ui-scroll-content">
                        <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm">
                            <li>Dashboard com métricas em tempo real</li>
                            <li>Biblioteca de componentes reutilizáveis</li>
                        </ul>
                    </div>
                </div>
                <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
                <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            </div>
        </div>
    </div>
</div>
HTML;

    $fadeHtml = <<<'HTML'
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border" style="--ui-scroll-height: 12rem; --ui-scroll-thumb: var(--muted-foreground)" role="region" aria-label="Área de rolagem">
        <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
            <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
                <div class="ui-scroll-content">
                    <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
                        <li>Dashboard com métricas em tempo real</li>
                        <li>Biblioteca de componentes reutilizáveis</li>
                    </ul>
                </div>
            </div>
            <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        </div>
    </div>

    <!-- :fade="false" shadow: sem gradiente, com sombra interna sutil nas bordas -->
    <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border" style="--ui-scroll-height: 12rem; --ui-scroll-thumb: var(--muted-foreground)" role="region" aria-label="Área de rolagem">
        <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
            <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
                <div class="ui-scroll-content">
                    <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
                        <li>Dashboard com métricas em tempo real</li>
                        <li>Biblioteca de componentes reutilizáveis</li>
                    </ul>
                </div>
            </div>
            <div class="ui-scroll-shadow ui-scroll-shadow-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            <div class="ui-scroll-shadow ui-scroll-shadow-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        </div>
    </div>
</div>
HTML;

    $horizontalHtml = <<<'HTML'
<div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border ui-scroll-horizontal w-full" style="--ui-scroll-height: 7rem; --ui-scroll-thumb: var(--muted-foreground)" role="region" aria-label="Área de rolagem">
    <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
        <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-x-auto overflow-y-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
            <div class="ui-scroll-content">
                <div class="flex w-max gap-3">
                    <div class="w-44 shrink-0 rounded-md border border-border bg-muted/40 p-4 text-sm text-foreground">Dashboard com métricas em tempo real</div>
                    <div class="w-44 shrink-0 rounded-md border border-border bg-muted/40 p-4 text-sm text-foreground">Biblioteca de componentes reutilizáveis</div>
                    <div class="w-44 shrink-0 rounded-md border border-border bg-muted/40 p-4 text-sm text-foreground">Temas claro e escuro com tokens CSS</div>
                </div>
            </div>
        </div>
        <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
    </div>
</div>
HTML;

    $chromeHtml = <<<'HTML'
<div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border w-full" style="--ui-scroll-height: 16rem; --ui-scroll-thumb: var(--muted-foreground)" role="region" aria-label="Área de rolagem">
    <div class="ui-scroll-header shrink-0 border-b border-border bg-card/95 backdrop-blur-sm px-4 py-2.5">
        <p class="mb-0 text-sm font-semibold text-foreground">Mensagens</p>
    </div>
    <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
        <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
            <div class="ui-scroll-content">
                <div class="space-y-2 text-sm text-muted-foreground">
                    <p class="mb-0 rounded-md border border-border/60 px-3 py-2 text-foreground">Dashboard com métricas em tempo real</p>
                    <p class="mb-0 rounded-md border border-border/60 px-3 py-2 text-foreground">Biblioteca de componentes reutilizáveis</p>
                </div>
            </div>
        </div>
        <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
    </div>
    <div class="ui-scroll-footer shrink-0 border-t border-border bg-card/95 backdrop-blur-sm px-4 py-2.5">
        <p class="mb-0 text-xs text-muted-foreground">12 itens</p>
    </div>
</div>
HTML;

    $buttonsHtml = <<<'HTML'
<div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border w-full" style="--ui-scroll-height: 14rem; --ui-scroll-thumb: var(--primary)" role="region" aria-label="Área de rolagem">
    <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
        <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
            <div class="ui-scroll-content">
                <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
                    <li class="rounded-md bg-muted/30 px-3 py-2 text-foreground">Dashboard com métricas em tempo real</li>
                    <li class="rounded-md bg-muted/30 px-3 py-2 text-foreground">Biblioteca de componentes reutilizáveis</li>
                </ul>
            </div>
        </div>
        <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        <!-- show-buttons: setas de atalho, visíveis via JS só quando há overflow no sentido correspondente -->
        <button type="button" class="ui-scroll-btn ui-scroll-btn-start absolute z-[2] inline-flex size-8 items-center justify-center rounded-full border border-border bg-card text-foreground shadow-sm" aria-label="Rolar para o topo">
            <i class="bi bi-chevron-up text-sm leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="ui-scroll-btn ui-scroll-btn-end absolute z-[2] inline-flex size-8 items-center justify-center rounded-full border border-border bg-card text-foreground shadow-sm" aria-label="Rolar para o final">
            <i class="bi bi-chevron-down text-sm leading-none" aria-hidden="true"></i>
        </button>
    </div>
</div>
HTML;

    $colorsHtml = <<<'HTML'
<div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
    <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border" style="--ui-scroll-height: 10rem; --ui-scroll-thumb: var(--primary)" role="region" aria-label="Área de rolagem">
        <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
            <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
                <div class="ui-scroll-content">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        <li>Dashboard com métricas em tempo real</li>
                        <li>Biblioteca de componentes reutilizáveis</li>
                    </ul>
                </div>
            </div>
            <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        </div>
    </div>
    <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border" style="--ui-scroll-height: 10rem; --ui-scroll-thumb: var(--danger)" role="region" aria-label="Área de rolagem">
        <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
            <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
                <div class="ui-scroll-content">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        <li>Dashboard com métricas em tempo real</li>
                        <li>Biblioteca de componentes reutilizáveis</li>
                    </ul>
                </div>
            </div>
            <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        </div>
    </div>
    <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border" style="--ui-scroll-height: 10rem; --ui-scroll-thumb: var(--info)" role="region" aria-label="Área de rolagem">
        <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
            <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
                <div class="ui-scroll-content">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        <li>Dashboard com métricas em tempo real</li>
                        <li>Biblioteca de componentes reutilizáveis</li>
                    </ul>
                </div>
            </div>
            <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        </div>
    </div>
</div>
HTML;

    $roundedHtml = <<<'HTML'
<div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
    <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-none border border-border" style="--ui-scroll-height: 10rem; --ui-scroll-thumb: var(--muted-foreground)" role="region" aria-label="Área de rolagem">
        <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
            <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
                <div class="ui-scroll-content">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        <li>Dashboard com métricas em tempo real</li>
                    </ul>
                </div>
            </div>
            <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        </div>
    </div>
    <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border" style="--ui-scroll-height: 10rem; --ui-scroll-thumb: var(--muted-foreground)" role="region" aria-label="Área de rolagem">
        <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
            <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
                <div class="ui-scroll-content">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        <li>Dashboard com métricas em tempo real</li>
                    </ul>
                </div>
            </div>
            <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        </div>
    </div>
    <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-xl border border-border" style="--ui-scroll-height: 10rem; --ui-scroll-thumb: var(--muted-foreground)" role="region" aria-label="Área de rolagem">
        <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
            <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
                <div class="ui-scroll-content">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        <li>Dashboard com métricas em tempo real</li>
                    </ul>
                </div>
            </div>
            <div class="ui-scroll-fade ui-scroll-fade-start pointer-events-none absolute z-[1]" aria-hidden="true"></div>
            <div class="ui-scroll-fade ui-scroll-fade-end pointer-events-none absolute z-[1]" aria-hidden="true"></div>
        </div>
    </div>
</div>
HTML;

    $apiHtml = <<<'HTML'
<div class="flex w-full flex-col gap-3">
    <div class="ui-scroll relative flex min-h-0 flex-col bg-card text-card-foreground rounded-md border border-border w-full" style="--ui-scroll-height: 12rem; --ui-scroll-thumb: var(--muted-foreground)" role="region" aria-label="Área de rolagem">
        <div class="ui-scroll-frame relative min-h-0 min-w-0 flex-1">
            <div class="ui-scroll-viewport h-full min-h-0 min-w-0 overflow-y-auto overflow-x-hidden overscroll-contain p-4 scroll-smooth ui-scroll-bar-thin" tabindex="0">
                <div class="ui-scroll-content">
                    <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
                        <li class="rounded-md border border-border/60 px-3 py-2 text-foreground">Dashboard com métricas em tempo real</li>
                        <li class="rounded-md border border-border/60 px-3 py-2 text-foreground">Biblioteca de componentes reutilizáveis</li>
                    </ul>
                </div>
            </div>
            <!-- :fade="false": sem gradiente nas bordas -->
        </div>
    </div>
    <div class="flex flex-wrap gap-2">
        <button type="button" class="btn btn-sm btn-primary">Topo</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Final</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">+120px</button>
    </div>
</div>
HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.scroll&gt;</code> é uma área de rolagem com scrollbar tematizada,
            fades/sombras de borda, header/footer fixos, orientação vertical/horizontal
            e API Alpine (<code>scrollToTop</code>, <code>scrollToEnd</code>…). Diferente do
            <code>&lt;x-ui.scrollspy&gt;</code>, aqui o foco é o container de overflow.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Padrão" :code="$defaultCode" :html="$defaultHtml">
            <x-slot:description>
                Defina a altura com <code>height</code>. Fade de borda e scrollbar
                <code>thin</code> vêm ligados por padrão.
            </x-slot:description>
            <x-ui.scroll height="14rem" class="w-full">
                <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
                    @foreach ($items as $item)
                        <li class="rounded-md border border-border/70 bg-muted/30 px-3 py-2 text-foreground">{{ $item }}</li>
                    @endforeach
                </ul>
            </x-ui.scroll>
        </x-ui.example>

        <x-ui.example title="Scrollbar" :code="$scrollbarCode" :html="$scrollbarHtml">
            <x-slot:description>
                <code>scrollbar</code>: <code>thin</code> (padrão), <code>auto</code> ou
                <code>hidden</code>.
            </x-slot:description>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">thin</p>
                    <x-ui.scroll height="12rem" scrollbar="thin" color="primary">
                        <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm">
                            @foreach ($items as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </x-ui.scroll>
                </div>
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">auto</p>
                    <x-ui.scroll height="12rem" scrollbar="auto" color="success">
                        <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm">
                            @foreach ($items as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </x-ui.scroll>
                </div>
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">hidden</p>
                    <x-ui.scroll height="12rem" scrollbar="hidden">
                        <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm">
                            @foreach ($items as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </x-ui.scroll>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Fade e sombra" :code="$fadeCode" :html="$fadeHtml">
            <x-slot:description>
                <code>fade</code> aplica gradiente nas bordas com overflow.
                <code>shadow</code> usa sombra interna sutil.
            </x-slot:description>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <x-ui.scroll height="12rem" fade>
                    <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
                        @foreach ($items as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </x-ui.scroll>
                <x-ui.scroll height="12rem" :fade="false" shadow>
                    <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
                        @foreach ($items as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </x-ui.scroll>
            </div>
        </x-ui.example>

        <x-ui.example title="Horizontal" :code="$horizontalCode" :html="$horizontalHtml">
            <x-slot:description>
                <code>orientation="horizontal"</code> para carrosséis manuais / chips.
            </x-slot:description>
            <x-ui.scroll orientation="horizontal" height="7rem" fade class="w-full">
                <div class="flex w-max gap-3">
                    @foreach ($items as $item)
                        <div class="w-44 shrink-0 rounded-md border border-border bg-muted/40 p-4 text-sm text-foreground">
                            {{ $item }}
                        </div>
                    @endforeach
                </div>
            </x-ui.scroll>
        </x-ui.example>

        <x-ui.example title="Header e footer" :code="$chromeCode" :html="$chromeHtml">
            <x-slot:description>
                Slots <code>header</code> e <code>footer</code> ficam fora do viewport
                (sempre visíveis).
            </x-slot:description>
            <x-ui.scroll height="16rem" class="w-full">
                <x-slot:header>
                    <p class="mb-0 text-sm font-semibold text-foreground">Mensagens</p>
                </x-slot:header>

                <div class="space-y-2 text-sm text-muted-foreground">
                    @foreach ($items as $item)
                        <p class="mb-0 rounded-md border border-border/60 px-3 py-2 text-foreground">{{ $item }}</p>
                    @endforeach
                </div>

                <x-slot:footer>
                    <p class="mb-0 text-xs text-muted-foreground">{{ count($items) }} itens</p>
                </x-slot:footer>
            </x-ui.scroll>
        </x-ui.example>

        <x-ui.example title="Botões de atalho" :code="$buttonsCode" :html="$buttonsHtml">
            <x-slot:description>
                <code>show-buttons</code> exibe setas para início/fim quando há overflow.
            </x-slot:description>
            <x-ui.scroll height="14rem" show-buttons fade color="primary" class="w-full">
                <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
                    @foreach ($items as $item)
                        <li class="rounded-md bg-muted/30 px-3 py-2 text-foreground">{{ $item }}</li>
                    @endforeach
                </ul>
            </x-ui.scroll>
        </x-ui.example>

        <x-ui.example title="Cor da scrollbar" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> define o thumb via token do tema.
            </x-slot:description>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <x-ui.scroll height="10rem" color="primary">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        @foreach (array_slice($items, 0, 8) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </x-ui.scroll>
                <x-ui.scroll height="10rem" color="danger">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        @foreach (array_slice($items, 0, 8) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </x-ui.scroll>
                <x-ui.scroll height="10rem" color="info">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        @foreach (array_slice($items, 0, 8) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </x-ui.scroll>
            </div>
        </x-ui.example>

        <x-ui.example title="Arredondamento" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code>: <code>none</code>, <code>sm</code>, <code>md</code>,
                <code>lg</code>, <code>xl</code>, <code>full</code>.
            </x-slot:description>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <x-ui.scroll height="10rem" rounded="none">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        @foreach (array_slice($items, 0, 6) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </x-ui.scroll>
                <x-ui.scroll height="10rem" rounded="md">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        @foreach (array_slice($items, 0, 6) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </x-ui.scroll>
                <x-ui.scroll height="10rem" rounded="xl">
                    <ul class="m-0 list-none space-y-2 p-0 text-sm">
                        @foreach (array_slice($items, 0, 6) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </x-ui.scroll>
            </div>
        </x-ui.example>

        <x-ui.example title="API manual" :code="$apiCode" :html="$apiHtml">
            <x-slot:description>
                Coloque <code>x-ref</code> num wrapper e chame
                <code>Alpine.$data($refs….firstElementChild).scrollToTop()</code>
                (mesmo padrão do countup).
            </x-slot:description>
            <div x-data class="flex w-full flex-col gap-3">
                <div x-ref="scrollWrap">
                    <x-ui.scroll height="12rem" :fade="false" class="w-full">
                        <ul class="m-0 flex list-none flex-col gap-2 p-0 text-sm text-muted-foreground">
                            @foreach ($items as $item)
                                <li class="rounded-md border border-border/60 px-3 py-2 text-foreground">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </x-ui.scroll>
                </div>
                <div class="flex flex-wrap gap-2">
                    <x-ui.button size="sm" color="primary" x-on:click="Alpine.$data($refs.scrollWrap.firstElementChild).scrollToTop()">
                        Topo
                    </x-ui.button>
                    <x-ui.button size="sm" variant="outline" color="secondary" x-on:click="Alpine.$data($refs.scrollWrap.firstElementChild).scrollToBottom()">
                        Final
                    </x-ui.button>
                    <x-ui.button size="sm" variant="outline" color="secondary" x-on:click="Alpine.$data($refs.scrollWrap.firstElementChild).scrollBy(0, 120)">
                        +120px
                    </x-ui.button>
                </div>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="scroll" />
</x-ui.docs>
