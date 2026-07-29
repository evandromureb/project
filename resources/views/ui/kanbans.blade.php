<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $demoColumns = [
        ['id' => 'backlog', 'title' => 'Backlog', 'color' => 'secondary', 'icon' => 'bi-inbox'],
        ['id' => 'todo', 'title' => 'A Fazer', 'color' => 'info', 'icon' => 'bi-list-task', 'limit' => 5],
        ['id' => 'doing', 'title' => 'Em Progresso', 'color' => 'warning', 'icon' => 'bi-lightning', 'limit' => 3],
        ['id' => 'done', 'title' => 'Concluído', 'color' => 'success', 'icon' => 'bi-check2-circle'],
    ];

    $demoCards = [
        [
            'id' => '1',
            'column' => 'backlog',
            'title' => 'Pesquisa de usuários',
            'description' => 'Entrevistar 8 clientes do plano Pro sobre o fluxo de onboarding.',
            'tags' => [['label' => 'Research', 'color' => 'info']],
            'priority' => 'medium',
            'assignee' => ['name' => 'Ana Silva', 'color' => 'primary'],
            'dueDate' => '2026-08-05',
            'comments' => 2,
        ],
        [
            'id' => '2',
            'column' => 'todo',
            'title' => 'Wireframes do dashboard',
            'description' => 'Versões mobile e desktop da home autenticada.',
            'tags' => [
                ['label' => 'Design', 'color' => 'primary'],
                ['label' => 'UI', 'color' => 'secondary'],
            ],
            'priority' => 'high',
            'assignees' => [
                ['name' => 'Bruno Costa', 'color' => 'success'],
                ['name' => 'Carla Dias', 'color' => 'warning'],
            ],
            'dueDate' => '2026-07-28',
            'attachments' => 3,
        ],
        [
            'id' => '3',
            'column' => 'todo',
            'title' => 'API de notificações',
            'description' => 'Endpoints para listar, marcar como lida e preferências.',
            'tags' => [['label' => 'Backend', 'color' => 'danger']],
            'priority' => 'urgent',
            'assignee' => ['name' => 'Diego Alves', 'color' => 'info'],
            'dueDate' => '2026-07-26',
            'comments' => 5,
            'attachments' => 1,
        ],
        [
            'id' => '4',
            'column' => 'doing',
            'title' => 'Componente Kanban',
            'description' => 'Drag-and-drop, WIP limits e documentação na lib de UI.',
            'tags' => [
                ['label' => 'Frontend', 'color' => 'primary'],
                ['label' => 'Alpine', 'color' => 'info'],
            ],
            'priority' => 'high',
            'assignees' => [
                ['name' => 'Eva Martins', 'color' => 'danger'],
                ['name' => 'Felipe Rocha', 'color' => 'secondary'],
                ['name' => 'Gina Lopes', 'color' => 'success'],
                ['name' => 'Hugo Nunes', 'color' => 'warning'],
            ],
            'dueDate' => '2026-07-27',
            'comments' => 8,
            'attachments' => 2,
        ],
        [
            'id' => '5',
            'column' => 'doing',
            'title' => 'Testes de regressão',
            'description' => 'Cobrir fluxos críticos do checkout.',
            'tags' => [['label' => 'QA', 'color' => 'warning']],
            'priority' => 'medium',
            'assignee' => ['name' => 'Iris Souza', 'color' => 'primary'],
            'dueDate' => '2026-07-29',
        ],
        [
            'id' => '6',
            'column' => 'done',
            'title' => 'Setup do design system',
            'description' => 'Tokens de cor, tipografia e componentes base.',
            'tags' => [['label' => 'Design', 'color' => 'primary']],
            'priority' => 'low',
            'assignee' => ['name' => 'João Pinto', 'color' => 'info'],
            'comments' => 1,
        ],
        [
            'id' => '7',
            'column' => 'done',
            'title' => 'Login com 2FA',
            'description' => 'TOTP + códigos de recuperação.',
            'tags' => [
                ['label' => 'Security', 'color' => 'danger'],
                ['label' => 'Backend', 'color' => 'secondary'],
            ],
            'priority' => 'high',
            'assignees' => [
                ['name' => 'Karen Melo', 'color' => 'success'],
                ['name' => 'Leo Dias', 'color' => 'primary'],
            ],
        ],
    ];

    $basicColumns = [
        ['id' => 'todo', 'title' => 'A Fazer', 'color' => 'secondary'],
        ['id' => 'doing', 'title' => 'Em Progresso', 'color' => 'warning'],
        ['id' => 'done', 'title' => 'Concluído', 'color' => 'success'],
    ];

    $basicCards = [
        ['id' => 'a1', 'column' => 'todo', 'title' => 'Escrever brief do projeto'],
        ['id' => 'a2', 'column' => 'todo', 'title' => 'Definir métricas de sucesso'],
        ['id' => 'a3', 'column' => 'doing', 'title' => 'Protótipo de baixa fidelidade'],
        ['id' => 'a4', 'column' => 'done', 'title' => 'Kickoff com stakeholders'],
    ];

    $wipColumns = [
        ['id' => 'todo', 'title' => 'A Fazer', 'color' => 'info', 'limit' => 4],
        ['id' => 'doing', 'title' => 'Em Progresso', 'color' => 'warning', 'limit' => 2],
        ['id' => 'review', 'title' => 'Revisão', 'color' => 'primary', 'limit' => 2],
        ['id' => 'done', 'title' => 'Pronto', 'color' => 'success'],
    ];

    $wipCards = [
        ['id' => 'w1', 'column' => 'todo', 'title' => 'Card 1', 'priority' => 'low'],
        ['id' => 'w2', 'column' => 'todo', 'title' => 'Card 2', 'priority' => 'medium'],
        ['id' => 'w3', 'column' => 'doing', 'title' => 'Card 3', 'priority' => 'high'],
        ['id' => 'w4', 'column' => 'doing', 'title' => 'Card 4', 'priority' => 'urgent'],
        ['id' => 'w5', 'column' => 'review', 'title' => 'Card 5'],
        ['id' => 'w6', 'column' => 'done', 'title' => 'Card 6'],
    ];

    $basicCode = <<<'BLADE'
        <x-ui.kanban
            :columns="[
                ['id' => 'todo', 'title' => 'A Fazer', 'color' => 'secondary'],
                ['id' => 'doing', 'title' => 'Em Progresso', 'color' => 'warning'],
                ['id' => 'done', 'title' => 'Concluído', 'color' => 'success'],
            ]"
            :cards="[
                ['id' => 'a1', 'column' => 'todo', 'title' => 'Escrever brief do projeto'],
                ['id' => 'a2', 'column' => 'todo', 'title' => 'Definir métricas de sucesso'],
                ['id' => 'a3', 'column' => 'doing', 'title' => 'Protótipo de baixa fidelidade'],
                ['id' => 'a4', 'column' => 'done', 'title' => 'Kickoff com stakeholders'],
            ]"
        />
        BLADE;

/*     O Alpine (x-for) percorre "columns"/"cards" em runtime; abaixo, o HTML
         equivalente já expandido para os dados deste exemplo específico. 
*/
    $basicHtml = <<<'HTML'
        <div class="ui-kanban flex w-full gap-4 overflow-x-auto pb-2" role="region" aria-label="Quadro Kanban">
            <div class="w-80 min-w-80 flex shrink-0 flex-col rounded-lg border border-border bg-muted/40">
                <div class="flex items-center gap-2 border-b border-border px-3 py-2.5">
                    <span class="size-2 shrink-0 rounded-full bg-secondary" aria-hidden="true"></span>
                    <h3 class="m-0 min-w-0 flex-1 truncate font-semibold text-foreground text-sm">A Fazer</h3>
                    <span class="inline-flex min-w-5 items-center justify-center rounded-md px-1.5 py-0.5 text-[0.65rem] font-semibold tabular-nums bg-secondary/10 text-secondary">2</span>
                </div>
                <div class="flex max-h-144 min-h-24 flex-1 flex-col gap-2 overflow-y-auto p-2">
                    <article class="group relative flex flex-col rounded-md border border-border bg-card shadow-sm transition-[box-shadow,border-color,opacity] duration-150 p-3 gap-2 cursor-grab active:cursor-grabbing" draggable="true" role="listitem">
                        <h4 class="m-0 font-semibold text-foreground text-[0.8125rem]">Escrever brief do projeto</h4>
                    </article>
                    <article class="group relative flex flex-col rounded-md border border-border bg-card shadow-sm transition-[box-shadow,border-color,opacity] duration-150 p-3 gap-2 cursor-grab active:cursor-grabbing" draggable="true" role="listitem">
                        <h4 class="m-0 font-semibold text-foreground text-[0.8125rem]">Definir métricas de sucesso</h4>
                    </article>
                    <div class="h-0.5 rounded-full bg-primary transition-opacity opacity-0" aria-hidden="true"></div>
                </div>
            </div>
            <div class="w-80 min-w-80 flex shrink-0 flex-col rounded-lg border border-border bg-muted/40">
                <div class="flex items-center gap-2 border-b border-border px-3 py-2.5">
                    <span class="size-2 shrink-0 rounded-full bg-warning" aria-hidden="true"></span>
                    <h3 class="m-0 min-w-0 flex-1 truncate font-semibold text-foreground text-sm">Em Progresso</h3>
                    <span class="inline-flex min-w-5 items-center justify-center rounded-md px-1.5 py-0.5 text-[0.65rem] font-semibold tabular-nums bg-warning/10 text-warning">1</span>
                </div>
                <div class="flex max-h-144 min-h-24 flex-1 flex-col gap-2 overflow-y-auto p-2">
                    <article class="group relative flex flex-col rounded-md border border-border bg-card shadow-sm transition-[box-shadow,border-color,opacity] duration-150 p-3 gap-2 cursor-grab active:cursor-grabbing" draggable="true" role="listitem">
                        <h4 class="m-0 font-semibold text-foreground text-[0.8125rem]">Protótipo de baixa fidelidade</h4>
                    </article>
                    <div class="h-0.5 rounded-full bg-primary transition-opacity opacity-0" aria-hidden="true"></div>
                </div>
            </div>
            <div class="w-80 min-w-80 flex shrink-0 flex-col rounded-lg border border-border bg-muted/40">
                <div class="flex items-center gap-2 border-b border-border px-3 py-2.5">
                    <span class="size-2 shrink-0 rounded-full bg-success" aria-hidden="true"></span>
                    <h3 class="m-0 min-w-0 flex-1 truncate font-semibold text-foreground text-sm">Concluído</h3>
                    <span class="inline-flex min-w-5 items-center justify-center rounded-md px-1.5 py-0.5 text-[0.65rem] font-semibold tabular-nums bg-success/10 text-success">1</span>
                </div>
                <div class="flex max-h-144 min-h-24 flex-1 flex-col gap-2 overflow-y-auto p-2">
                    <article class="group relative flex flex-col rounded-md border border-border bg-card shadow-sm transition-[box-shadow,border-color,opacity] duration-150 p-3 gap-2 cursor-grab active:cursor-grabbing" draggable="true" role="listitem">
                        <h4 class="m-0 font-semibold text-foreground text-[0.8125rem]">Kickoff com stakeholders</h4>
                    </article>
                    <div class="h-0.5 rounded-full bg-primary transition-opacity opacity-0" aria-hidden="true"></div>
                </div>
            </div>
        </div>
        HTML;

    $fullCode = <<<'BLADE'
        <x-ui.kanban
            :columns="[
                ['id' => 'backlog', 'title' => 'Backlog', 'color' => 'secondary', 'icon' => 'bi-inbox'],
                ['id' => 'todo', 'title' => 'A Fazer', 'color' => 'info', 'icon' => 'bi-list-task', 'limit' => 5],
                ['id' => 'doing', 'title' => 'Em Progresso', 'color' => 'warning', 'icon' => 'bi-lightning', 'limit' => 3],
                ['id' => 'done', 'title' => 'Concluído', 'color' => 'success', 'icon' => 'bi-check2-circle'],
            ]"
            :cards="[
                [
                    'id' => '1',
                    'column' => 'todo',
                    'title' => 'Wireframes do dashboard',
                    'description' => 'Versões mobile e desktop.',
                    'tags' => [
                        ['label' => 'Design', 'color' => 'primary'],
                        ['label' => 'UI', 'color' => 'secondary'],
                    ],
                    'priority' => 'high',
                    'assignees' => [
                        ['name' => 'Bruno Costa', 'color' => 'success'],
                        ['name' => 'Carla Dias', 'color' => 'warning'],
                    ],
                    'dueDate' => '2026-07-28',
                    'attachments' => 3,
                ],
                // ...
            ]"
        />
        BLADE;

/*     Mesma estrutura do exemplo "Básico", com os elementos extras que cada campo do card habilita. 
*/
    $fullHtml = <<<'HTML'
        <div class="ui-kanban flex w-full gap-4 overflow-x-auto pb-2" role="region" aria-label="Quadro Kanban">
            <div class="w-80 min-w-80 flex shrink-0 flex-col rounded-lg border border-border bg-muted/40">
                <div class="flex items-center gap-2 border-b border-border px-3 py-2.5">
                    <span class="size-2 shrink-0 rounded-full bg-info" aria-hidden="true"></span>
                    <!-- coluna com "icon": <i class="bi {icon} leading-none text-muted-foreground"></i> antes do título -->
                    <i class="bi bi-list-task leading-none text-muted-foreground" aria-hidden="true"></i>
                    <h3 class="m-0 min-w-0 flex-1 truncate font-semibold text-foreground text-sm">A Fazer</h3>
                    <!-- coluna com "limit": contador mostra "atual/máx" -->
                    <span class="inline-flex min-w-5 items-center justify-center rounded-md px-1.5 py-0.5 text-[0.65rem] font-semibold tabular-nums bg-info/10 text-info">1/5</span>
                </div>
                <div class="flex max-h-144 min-h-24 flex-1 flex-col gap-2 overflow-y-auto p-2">
                    <article class="group relative flex flex-col rounded-md border border-border bg-card shadow-sm transition-[box-shadow,border-color,opacity] duration-150 p-3 gap-2 cursor-grab active:cursor-grabbing" draggable="true" role="listitem">
                        <div class="flex flex-wrap items-center gap-1">
                            <span class="inline-flex items-center rounded px-1.5 py-0.5 text-[0.65rem] font-medium bg-primary/15 text-primary">Design</span>
                            <span class="inline-flex items-center rounded px-1.5 py-0.5 text-[0.65rem] font-medium bg-secondary/15 text-secondary">UI</span>
                            <span class="ms-auto inline-flex items-center gap-1 rounded px-1.5 py-0.5 text-[0.65rem] font-medium bg-warning/15 text-warning">
                                <i class="bi bi-flag-fill text-[0.6rem] leading-none" aria-hidden="true"></i>
                                <span>Alta</span>
                            </span>
                        </div>
                        <h4 class="m-0 font-semibold text-foreground text-[0.8125rem]">Wireframes do dashboard</h4>
                        <p class="m-0 line-clamp-2 text-muted-foreground text-[0.7rem]">Versões mobile e desktop.</p>
                        <div class="mt-auto flex flex-wrap items-center gap-2 pt-0.5">
                            <span class="inline-flex items-center gap-1 text-[0.65rem] font-medium text-muted-foreground">
                                <i class="bi bi-calendar3 leading-none" aria-hidden="true"></i>
                                <span>28 jul</span>
                            </span>
                            <span class="inline-flex items-center gap-1 text-[0.65rem] text-muted-foreground">
                                <i class="bi bi-paperclip leading-none" aria-hidden="true"></i>
                                <span>3</span>
                            </span>
                            <div class="ms-auto flex items-center -space-x-1.5">
                                <span class="inline-flex size-6 items-center justify-center rounded-full border-2 border-card text-[0.6rem] font-semibold bg-success/15 text-success" title="Bruno Costa">BC</span>
                                <span class="inline-flex size-6 items-center justify-center rounded-full border-2 border-card text-[0.6rem] font-semibold bg-warning/15 text-warning" title="Carla Dias">CD</span>
                            </div>
                        </div>
                    </article>
                    <div class="h-0.5 rounded-full bg-primary transition-opacity opacity-0" aria-hidden="true"></div>
                </div>
            </div>
            <!-- demais colunas (Backlog/Em Progresso/Concluído) seguem a mesma estrutura -->
        </div>
        HTML;

    $wipCode = <<<'BLADE'
        <x-ui.kanban
            enforce-limit
            :columns="[
                ['id' => 'todo', 'title' => 'A Fazer', 'color' => 'info', 'limit' => 4],
                ['id' => 'doing', 'title' => 'Em Progresso', 'color' => 'warning', 'limit' => 2],
                ['id' => 'review', 'title' => 'Revisão', 'color' => 'primary', 'limit' => 2],
                ['id' => 'done', 'title' => 'Pronto', 'color' => 'success'],
            ]"
            :cards="$wipCards"
        />
        BLADE;

/*     enforce-limit: quando a coluna atinge "limit", o contador vira "bg-danger/15 text-danger"
         e o drop de novos cards é bloqueado (o resto da estrutura é igual ao "Básico"). 
*/
    $wipHtml = <<<'HTML'
        <div class="w-80 min-w-80 flex shrink-0 flex-col rounded-lg border border-border bg-muted/40 opacity-90">
            <div class="flex items-center gap-2 border-b border-border px-3 py-2.5">
                <span class="size-2 shrink-0 rounded-full bg-warning" aria-hidden="true"></span>
                <h3 class="m-0 min-w-0 flex-1 truncate font-semibold text-foreground text-sm">Em Progresso</h3>
                <span class="inline-flex min-w-5 items-center justify-center rounded-md px-1.5 py-0.5 text-[0.65rem] font-semibold tabular-nums bg-danger/15 text-danger">2/2</span>
            </div>
            <div class="flex max-h-144 min-h-24 flex-1 flex-col gap-2 overflow-y-auto p-2">
                <article class="group relative flex flex-col rounded-md border border-border bg-card shadow-sm transition-[box-shadow,border-color,opacity] duration-150 p-3 gap-2 cursor-grab active:cursor-grabbing" draggable="true" role="listitem">
                    <h4 class="m-0 font-semibold text-foreground text-[0.8125rem]">Card 3</h4>
                </article>
            </div>
        </div>
        <!-- demais colunas (A Fazer/Revisão/Pronto) seguem a mesma estrutura do exemplo "Básico" -->
        HTML;

    $staticCode = <<<'BLADE'
        <x-ui.kanban
            :draggable="false"
            :columns="$basicColumns"
            :cards="$basicCards"
        />
        BLADE;

/*     draggable=false: os cards perdem "draggable" e "cursor-grab", ganhando "cursor-pointer" (clique ainda funciona). 
*/
    $staticHtml = <<<'HTML'
        <article class="group relative flex flex-col rounded-md border border-border bg-card shadow-sm transition-[box-shadow,border-color,opacity] duration-150 p-3 gap-2 cursor-pointer" role="listitem">
            <h4 class="m-0 font-semibold text-foreground text-[0.8125rem]">Escrever brief do projeto</h4>
        </article>
        <!-- estrutura de colunas idêntica ao exemplo "Básico" -->
        HTML;

    $sizesCode = <<<'BLADE'
        <x-ui.kanban size="sm" column-width="sm" :columns="$basicColumns" :cards="$basicCards" />
        <x-ui.kanban size="lg" column-width="lg" :columns="$basicColumns" :cards="$basicCards" />
        BLADE;

/*     columnWidth: sm="w-64 min-w-64", md="w-80 min-w-80" (padrão), lg="w-96 min-w-96".
         size afeta cardPaddingClasses/cardTitleClasses/titleSizeClasses: sm="p-2.5 gap-1.5"+text-xs título de coluna+text-xs título de card, lg="p-4 gap-2.5"+text-base+text-sm. 
*/
    $sizesHtml = <<<'HTML'
        <!-- size="sm" column-width="sm" -->
        <div class="w-64 min-w-64 flex shrink-0 flex-col rounded-lg border border-border bg-muted/40">
            <div class="flex items-center gap-2 border-b border-border px-3 py-2.5">
                <h3 class="m-0 min-w-0 flex-1 truncate font-semibold text-foreground text-xs">A Fazer</h3>
            </div>
            <div class="flex max-h-144 min-h-24 flex-1 flex-col gap-2 overflow-y-auto p-2">
                <article class="rounded-md border border-border bg-card shadow-sm p-2.5 gap-1.5">
                    <h4 class="m-0 font-semibold text-foreground text-xs">Escrever brief do projeto</h4>
                </article>
            </div>
        </div>

        <!-- size="lg" column-width="lg" -->
        <div class="w-96 min-w-96 flex shrink-0 flex-col rounded-lg border border-border bg-muted/40">
            <div class="flex items-center gap-2 border-b border-border px-3 py-2.5">
                <h3 class="m-0 min-w-0 flex-1 truncate font-semibold text-foreground text-base">A Fazer</h3>
            </div>
            <div class="flex max-h-144 min-h-24 flex-1 flex-col gap-2 overflow-y-auto p-2">
                <article class="rounded-md border border-border bg-card shadow-sm p-4 gap-2.5">
                    <h4 class="m-0 font-semibold text-foreground text-sm">Escrever brief do projeto</h4>
                </article>
            </div>
        </div>
        HTML;

    $collapsibleCode = <<<'BLADE'
        <x-ui.kanban
            collapsible
            :columns="[
                ['id' => 'todo', 'title' => 'A Fazer', 'color' => 'info'],
                ['id' => 'doing', 'title' => 'Em Progresso', 'color' => 'warning', 'collapsed' => true],
                ['id' => 'done', 'title' => 'Concluído', 'color' => 'success'],
            ]"
            :cards="$basicCards"
        />
        BLADE;

/*     collapsible: cabeçalho ganha um botão de recolher; a coluna "Em Progresso" começa com collapsed=true (lista oculta, ícone rotacionado). 
*/
    $collapsibleHtml = <<<'HTML'
        <div class="w-80 min-w-80 flex shrink-0 flex-col rounded-lg border border-border bg-muted/40">
            <div class="flex items-center gap-2 border-b border-border px-3 py-2.5">
                <span class="size-2 shrink-0 rounded-full bg-warning" aria-hidden="true"></span>
                <h3 class="m-0 min-w-0 flex-1 truncate font-semibold text-foreground text-sm">Em Progresso</h3>
                <button type="button" class="inline-flex size-7 items-center justify-center rounded-md text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-expanded="false" aria-label="Expandir coluna">
                    <i class="bi bi-chevron-down text-xs transition-transform duration-200 -rotate-90" aria-hidden="true"></i>
                </button>
            </div>
            <!-- lista de cards oculta (x-show="!collapsed[column.id]" = false) -->
        </div>
        <!-- demais colunas (A Fazer/Concluído) seguem a mesma estrutura do exemplo "Básico", com o botão de recolher adicional no cabeçalho -->
        HTML;

    $eventsCode = <<<'BLADE'
        <x-ui.kanban
            :columns="$basicColumns"
            :cards="$basicCards"
            x-on:kanban-change="console.log($event.detail)"
            x-on:kanban-card-click="console.log('click', $event.detail.card)"
        />
        BLADE;

/*     x-on:kanban-* são listeners de evento, não alteram a estrutura renderizada — idêntica ao exemplo "Básico". 
*/
    $eventsHtml = <<<'HTML'
        <!-- estrutura de colunas/cards idêntica ao exemplo "Básico"; kanban-change/kanban-card-click
             são eventos customizados disparados via $dispatch(), sem markup próprio -->
        HTML;

    $formCode = <<<'BLADE'
        <form>
            <x-ui.kanban
                name="board"
                :columns="$basicColumns"
                :cards="$basicCards"
            />
            {{-- input hidden "board" com JSON { columns, cards } --}}
        </form>
        BLADE;

/*     name="board": adiciona um <input type="hidden"> com o JSON do estado (colunas/ordem dos cards) como primeiro filho do wrapper. 
*/
    $formHtml = <<<'HTML'
        <form>
            <div class="ui-kanban flex w-full gap-4 overflow-x-auto pb-2" role="region" aria-label="Quadro Kanban">
                <input type="hidden" name="board" value="{&quot;columns&quot;:[...],&quot;cards&quot;:[...]}">
                <!-- estrutura de colunas/cards idêntica ao exemplo "Básico" -->
            </div>
        </form>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.kanban&gt;</code> é um quadro Kanban em Alpine: colunas coloridas, cards com
            tags, prioridade, prazo, assignees e metadados, drag-and-drop entre colunas (e
            reordenação), limite WIP, colunas recolhíveis e eventos
            <code>kanban-change</code> / <code>kanban-card-click</code>. Passe
            <code>columns</code> e <code>cards</code> como arrays; use <code>name</code> para
            publicar o estado num <code>input hidden</code>.
        </p>
    </x-ui.card>

    <div class="grid grid-cols-1 gap-6">
        <x-ui.example title="Quadro completo" :code="$fullCode" :html="$fullHtml">
            <x-slot:description>
                Ícones, limites WIP, tags, prioridades, prazos (atrasado / em breve), avatares,
                comentários e anexos. Arraste os cards entre as colunas.
            </x-slot:description>
            <x-ui.kanban :columns="$demoColumns" :cards="$demoCards" />
        </x-ui.example>

        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Três colunas e títulos simples — arraste para reordenar ou mudar de coluna.
            </x-slot:description>
            <x-ui.kanban :columns="$basicColumns" :cards="$basicCards" />
        </x-ui.example>

        <x-ui.example title="Limite WIP" :code="$wipCode" :html="$wipHtml">
            <x-slot:description>
                <code>limit</code> na coluna mostra <code>atual/máx</code>. Com
                <code>enforce-limit</code>, o drop é bloqueado quando a coluna está cheia
                (contagem em vermelho se ultrapassar).
            </x-slot:description>
            <x-ui.kanban enforce-limit :columns="$wipColumns" :cards="$wipCards" />
        </x-ui.example>
    </div>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Somente leitura" :code="$staticCode" :html="$staticHtml">
            <x-slot:description>
                <code>:draggable="false"</code> desativa o arraste; o clique ainda dispara
                <code>kanban-card-click</code>.
            </x-slot:description>
            <x-ui.kanban :draggable="false" :columns="$basicColumns" :cards="$basicCards" />
        </x-ui.example>

        <x-ui.example title="Colunas recolhíveis" :code="$collapsibleCode" :html="$collapsibleHtml">
            <x-slot:description>
                <code>collapsible</code> adiciona o botão de recolher;
                <code>collapsed</code> na coluna define o estado inicial.
            </x-slot:description>
            <x-ui.kanban
                collapsible
                :columns="[
                    ['id' => 'todo', 'title' => 'A Fazer', 'color' => 'info'],
                    ['id' => 'doing', 'title' => 'Em Progresso', 'color' => 'warning', 'collapsed' => true],
                    ['id' => 'done', 'title' => 'Concluído', 'color' => 'success'],
                ]"
                :cards="$basicCards"
            />
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code> controla tipografia/padding do card;
                <code>column-width</code> a largura da coluna (<code>sm</code>/<code>md</code>/<code>lg</code>).
            </x-slot:description>
            <div class="flex flex-col gap-6">
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">size="sm" · column-width="sm"</p>
                    <x-ui.kanban size="sm" column-width="sm" :columns="$basicColumns" :cards="$basicCards" />
                </div>
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">size="lg" · column-width="lg"</p>
                    <x-ui.kanban size="lg" column-width="lg" :columns="$basicColumns" :cards="$basicCards" />
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Eventos" :code="$eventsCode" :html="$eventsHtml">
            <x-slot:description>
                <code>kanban-change</code> após cada move;
                <code>kanban-card-click</code> no clique. Abra o console do navegador.
            </x-slot:description>
            <x-ui.kanban
                :columns="$basicColumns"
                :cards="$basicCards"
                x-on:kanban-change="console.log('kanban-change', $event.detail)"
                x-on:kanban-card-click="console.log('kanban-card-click', $event.detail.card)"
            />
        </x-ui.example>

        <x-ui.example title="Input hidden (formulário)" :code="$formCode" :html="$formHtml">
            <x-slot:description>
                Com <code>name</code>, o estado (ids de coluna + ordem dos cards) vai num
                <code>input hidden</code> JSON.
            </x-slot:description>
            <form>
                <x-ui.kanban name="board" :columns="$basicColumns" :cards="$basicCards" />
            </form>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api component="ui/kanban/kanban" title="x-ui.kanban" />
</x-ui.docs>
