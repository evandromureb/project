<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.dropdown label="Menu">
            <x-ui.dropdown.dropdown-item href="#">Perfil</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Configurações</x-ui.dropdown.dropdown-item>
            <div class="my-1 border-t border-border"></div>
            <x-ui.dropdown.dropdown-item href="#" danger>Sair</x-ui.dropdown.dropdown-item>
        </x-ui.dropdown>
        BLADE;

/*     O menu é teleportado para o <body> e posicionado via JS (mesmo padrão
         do <x-ui.drawer>); os $xHtml mostram a estrutura no estado "aberto". 
*/
    $basicHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary" aria-expanded="false">
            Menu <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i>
        </button>

        <div class="z-50 min-w-48 rounded-md border border-border bg-popover py-1 shadow-lg" role="menu">
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <span class="min-w-0 flex-1 truncate">Perfil</span>
            </a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <span class="min-w-0 flex-1 truncate">Configurações</span>
            </a>
            <div class="my-1 border-t border-border"></div>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-danger hover:bg-danger/10">
                <span class="min-w-0 flex-1 truncate">Sair</span>
            </a>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.dropdown label="Primary" color="primary" variant="solid">...</x-ui.dropdown>
        <x-ui.dropdown label="Success" color="success" variant="solid">...</x-ui.dropdown>
        <x-ui.dropdown label="Danger" color="danger" variant="soft">...</x-ui.dropdown>
        <x-ui.dropdown label="Info" color="info" variant="outline">...</x-ui.dropdown>
        BLADE;

    $colorsHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Primary <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-success">Success <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-soft-danger">Danger <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-outline-info">Info <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        HTML;

    $splitCode = <<<'BLADE'
        <x-ui.dropdown label="Salvar" color="primary" split>
            <x-ui.dropdown.dropdown-item href="#">Salvar como rascunho</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Salvar e publicar</x-ui.dropdown.dropdown-item>
        </x-ui.dropdown>
        BLADE;

    $splitHtml = <<<'HTML'
        <div role="group" class="btn-group">
            <button type="button" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-primary size-10 p-0" aria-label="Abrir menu" aria-expanded="false">
                <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i>
            </button>
        </div>
        HTML;

    $sizesCode = <<<'BLADE'
        <x-ui.dropdown label="Pequeno" size="sm">...</x-ui.dropdown>
        <x-ui.dropdown label="Médio" size="md">...</x-ui.dropdown>
        <x-ui.dropdown label="Grande" size="lg">...</x-ui.dropdown>
        BLADE;

    $sizesHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary btn-sm">Pequeno <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-outline-secondary">Médio <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-outline-secondary btn-lg">Grande <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        HTML;

    $autoDirectionCode = <<<'BLADE'
        {{-- sem "direction"/"align": decide down/up e start/end sozinho, medindo o
             espaço disponível na viewport antes de abrir --}}
        <x-ui.dropdown label="Automático">
            <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
        </x-ui.dropdown>
        BLADE;

/*     direction="auto"/align="auto": nada muda estruturalmente — a decisão
         down/up/start/end é calculada em JS a partir do retângulo do trigger. 
*/
    $autoDirectionHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Automático <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        HTML;

    $directionsCode = <<<'BLADE'
        <x-ui.dropdown label="Down" direction="down">...</x-ui.dropdown>
        <x-ui.dropdown label="Up" direction="up">...</x-ui.dropdown>
        <x-ui.dropdown label="Start" direction="start">...</x-ui.dropdown>
        <x-ui.dropdown label="End" direction="end">...</x-ui.dropdown>
        BLADE;

/*     "direction" só afeta o cálculo de posição em JS (menuStyle), sem mudar classes estáticas. 
*/
    $directionsHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Down <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-outline-secondary">Up <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-outline-secondary">Start <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-outline-secondary">End <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        HTML;

    $alignCode = <<<'BLADE'
        <x-ui.dropdown label="Alinhado à esquerda" align="start">...</x-ui.dropdown>
        <x-ui.dropdown label="Alinhado à direita" align="end">...</x-ui.dropdown>
        BLADE;

    $alignHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Alinhado à esquerda <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-outline-secondary">Alinhado à direita <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>
        HTML;

    $darkCode = <<<'BLADE'
        <x-ui.dropdown label="Menu escuro" dark>
            <x-ui.dropdown.dropdown-item href="#">Perfil</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Configurações</x-ui.dropdown.dropdown-item>
        </x-ui.dropdown>
        BLADE;

/*     dark: acrescenta "border-neutral-700 bg-neutral-900 text-neutral-100" ao menu, fixo (não segue o tema). 
*/
    $darkHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Menu escuro <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>

        <div class="z-50 min-w-48 rounded-md border border-neutral-700 bg-neutral-900 text-neutral-100 py-1 shadow-lg" role="menu">
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <span class="min-w-0 flex-1 truncate">Perfil</span>
            </a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <span class="min-w-0 flex-1 truncate">Configurações</span>
            </a>
        </div>
        HTML;

    $itemColorsCode = <<<'BLADE'
        <x-ui.dropdown label="Status">
            <x-ui.dropdown.dropdown-item color="primary" icon="bi-circle-fill" href="#">Primary</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item color="secondary" icon="bi-circle-fill" href="#">Secondary</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item color="success" icon="bi-circle-fill" href="#">Success</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item color="warning" icon="bi-circle-fill" href="#">Warning</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item color="danger" icon="bi-circle-fill" href="#">Danger</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item color="info" icon="bi-circle-fill" href="#">Info</x-ui.dropdown.dropdown-item>
        </x-ui.dropdown>
        BLADE;

    $itemColorsHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Status <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>

        <div class="z-50 min-w-48 rounded-md border border-border bg-popover py-1 shadow-lg" role="menu">
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-primary hover:bg-primary/10">
                <i class="bi bi-circle-fill shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Primary</span>
            </a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-secondary hover:bg-secondary/10">
                <i class="bi bi-circle-fill shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Secondary</span>
            </a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-success hover:bg-success/10">
                <i class="bi bi-circle-fill shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Success</span>
            </a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-warning hover:bg-warning/10">
                <i class="bi bi-circle-fill shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Warning</span>
            </a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-danger hover:bg-danger/10">
                <i class="bi bi-circle-fill shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Danger</span>
            </a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-info hover:bg-info/10">
                <i class="bi bi-circle-fill shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Info</span>
            </a>
        </div>
        HTML;

    $itemsCode = <<<'BLADE'
        <x-ui.dropdown label="Ações">
            <div class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-muted-foreground">
                Gerenciar registro
            </div>
            <x-ui.dropdown.dropdown-item icon="bi-eye" href="#">Visualizar</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item icon="bi-pencil" href="#">Editar</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item icon="bi-arrow-repeat" href="#" active>Atualizar</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item icon="bi-download" disabled>Exportar (indisponível)</x-ui.dropdown.dropdown-item>
            <div class="my-1 border-t border-border"></div>
            <x-ui.dropdown.dropdown-item icon="bi-trash" href="#" danger>Excluir</x-ui.dropdown.dropdown-item>
        </x-ui.dropdown>
        BLADE;

    $itemsHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Ações <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>

        <div class="z-50 min-w-48 rounded-md border border-border bg-popover py-1 shadow-lg" role="menu">
            <div class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-muted-foreground">Gerenciar registro</div>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <i class="bi bi-eye shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Visualizar</span>
            </a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <i class="bi bi-pencil shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Editar</span>
            </a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors bg-primary/10 text-primary">
                <i class="bi bi-arrow-repeat shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Atualizar</span>
            </a>
            <button type="button" disabled role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors cursor-not-allowed text-muted-foreground opacity-50">
                <i class="bi bi-download shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Exportar (indisponível)</span>
            </button>
            <div class="my-1 border-t border-border"></div>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-danger hover:bg-danger/10">
                <i class="bi bi-trash shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Excluir</span>
            </a>
        </div>
        HTML;

    $autoCloseCode = <<<'BLADE'
        {{-- "outside": itens com keepOpen não fecham o menu ao clicar (ex.: opções tipo checkbox) --}}
        <x-ui.dropdown label="Filtros" autoClose="outside">
            <x-ui.dropdown.dropdown-item icon="bi-check-square" keepOpen>Ativos</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item icon="bi-square" keepOpen>Arquivados</x-ui.dropdown.dropdown-item>
        </x-ui.dropdown>

        {{-- "false": só fecha via Escape ou por um botão que zera "open" manualmente --}}
        <x-ui.dropdown label="Manual" :autoClose="false">
            <div class="px-4 py-2 text-sm text-muted-foreground">
                Este menu só fecha pelo botão abaixo ou pela tecla Esc.
            </div>
            <x-ui.dropdown.dropdown-item @click="open = false">Fechar menu</x-ui.dropdown.dropdown-item>
        </x-ui.dropdown>
        BLADE;

    $autoCloseHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Filtros <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>

        <div class="z-50 min-w-48 rounded-md border border-border bg-popover py-1 shadow-lg" role="menu">
            <button type="button" data-keep-open role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <i class="bi bi-check-square shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Ativos</span>
            </button>
            <button type="button" data-keep-open role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <i class="bi bi-square shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Arquivados</span>
            </button>
        </div>

        <button type="button" class="btn btn-outline-secondary">Manual <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>

        <div class="z-50 min-w-48 rounded-md border border-border bg-popover py-1 shadow-lg" role="menu">
            <div class="px-4 py-2 text-sm text-muted-foreground">Este menu só fecha pelo botão abaixo ou pela tecla Esc.</div>
            <button type="button" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <span class="min-w-0 flex-1 truncate">Fechar menu</span>
            </button>
        </div>
        HTML;

    $scrollCode = <<<'BLADE'
        <x-ui.dropdown label="Selecionar país" menuClass="max-h-56 overflow-y-auto">
            <x-ui.dropdown.dropdown-item href="#">Brasil</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Portugal</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Argentina</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Chile</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Uruguai</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Paraguai</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Colômbia</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">México</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Peru</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item href="#">Bolívia</x-ui.dropdown.dropdown-item>
        </x-ui.dropdown>
        BLADE;

/*     menuClass acrescenta classes ao contêiner do menu (aqui, "max-h-56 overflow-y-auto"). 
*/
    $scrollHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Selecionar país <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i></button>

        <div class="z-50 min-w-48 rounded-md border border-border bg-popover py-1 shadow-lg max-h-56 overflow-y-auto" role="menu">
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover"><span class="min-w-0 flex-1 truncate">Brasil</span></a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover"><span class="min-w-0 flex-1 truncate">Portugal</span></a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover"><span class="min-w-0 flex-1 truncate">Argentina</span></a>
            <!-- ... demais países ... -->
        </div>
        HTML;

    $customTriggerCode = <<<'BLADE'
        <x-ui.dropdown>
            <x-slot:trigger>
                <x-ui.avatar name="Evandro Mureb" color="primary" circle class="cursor-pointer" />
            </x-slot:trigger>

            <div class="border-b border-border px-4 py-2 text-sm font-semibold">Olá, Evandro!</div>
            <x-ui.dropdown.dropdown-item icon="bi-person" href="#">Perfil</x-ui.dropdown.dropdown-item>
            <x-ui.dropdown.dropdown-item icon="bi-gear" href="#">Configurações</x-ui.dropdown.dropdown-item>
            <div class="my-1 border-t border-border"></div>
            <x-ui.dropdown.dropdown-item icon="bi-box-arrow-right" href="#" danger>Sair</x-ui.dropdown.dropdown-item>
        </x-ui.dropdown>
        BLADE;

    $customTriggerHtml = <<<'HTML'
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full cursor-pointer" title="Evandro Mureb">
            <span>EM</span>
        </div>

        <div class="z-50 min-w-48 rounded-md border border-border bg-popover py-1 shadow-lg" role="menu">
            <div class="border-b border-border px-4 py-2 text-sm font-semibold">Olá, Evandro!</div>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <i class="bi bi-person shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Perfil</span>
            </a>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                <i class="bi bi-gear shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Configurações</span>
            </a>
            <div class="my-1 border-t border-border"></div>
            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-danger hover:bg-danger/10">
                <i class="bi bi-box-arrow-right shrink-0 text-base leading-none" aria-hidden="true"></i>
                <span class="min-w-0 flex-1 truncate">Sair</span>
            </a>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.dropdown&gt;</code> exibe um menu flutuante acionado por clique (Alpine
            <code>x-data</code>/<code>x-show</code>, sem dependência de JS de terceiros). Use
            <code>&lt;x-ui.dropdown.dropdown-item&gt;</code> para os itens do menu. Por padrão, a direção e o
            alinhamento são detectados automaticamente a partir do espaço disponível na tela (pode
            ser fixado manualmente). Suporta cores, variantes, tamanhos, botão split, menu escuro,
            comportamento de fechamento automático e um <code>trigger</code> totalmente customizável.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                <code>label</code> gera um <code>&lt;x-ui.button&gt;</code> como acionador; o conteúdo do menu vai no slot padrão.
            </x-slot:description>
            <x-ui.dropdown label="Menu">
                <x-ui.dropdown.dropdown-item href="#">Perfil</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Configurações</x-ui.dropdown.dropdown-item>
                <div class="my-1 border-t border-border"></div>
                <x-ui.dropdown.dropdown-item href="#" danger>Sair</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> e <code>variant</code> seguem as mesmas opções do <code>&lt;x-ui.button&gt;</code>.
            </x-slot:description>
            <x-ui.dropdown label="Primary" color="primary" variant="solid">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
            <x-ui.dropdown label="Success" color="success" variant="solid">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
            <x-ui.dropdown label="Danger" color="danger" variant="soft">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
            <x-ui.dropdown label="Info" color="info" variant="outline">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Botão split" :code="$splitCode" :html="$splitHtml">
            <x-slot:description>
                Com <code>split</code>, a ação principal e o acionador do menu viram botões separados (agrupados via <code>&lt;x-ui.button-group&gt;</code>).
            </x-slot:description>
            <x-ui.dropdown label="Salvar" color="primary" split>
                <x-ui.dropdown.dropdown-item href="#">Salvar como rascunho</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Salvar e publicar</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code> (<code>sm</code>/<code>md</code>/<code>lg</code>) controla o tamanho do botão acionador padrão.
            </x-slot:description>
            <x-ui.dropdown label="Pequeno" size="sm">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
            <x-ui.dropdown label="Médio" size="md">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
            <x-ui.dropdown label="Grande" size="lg">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Direção e alinhamento automáticos (padrão)" :code="$autoDirectionCode" :html="$autoDirectionHtml">
            <x-slot:description>
                Sem <code>direction</code>/<code>align</code> (o padrão de ambos é <code>"auto"</code>), o menu mede o espaço disponível na viewport antes de abrir e escolhe sozinho o lado (<code>down</code>/<code>up</code>) e o alinhamento (<code>start</code>/<code>end</code>) que couberem — evita que o menu "desapareça" cortado perto das bordas da tela.
            </x-slot:description>
            <x-ui.dropdown label="Automático">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Direções explícitas" :code="$directionsCode" :html="$directionsHtml">
            <x-slot:description>
                <code>direction</code> força um lado específico (<code>down</code>/<code>up</code>/<code>start</code>/<code>end</code>) em vez de detectar automaticamente.
            </x-slot:description>
            <x-ui.dropdown label="Down" direction="down">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
            <x-ui.dropdown label="Up" direction="up">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
            <x-ui.dropdown label="Start" direction="start">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
            <x-ui.dropdown label="End" direction="end">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Alinhamento explícito" :code="$alignCode" :html="$alignHtml">
            <x-slot:description>
                <code>align="end"</code> força a borda direita do menu alinhada com a do acionador, sem depender da detecção automática.
            </x-slot:description>
            <x-ui.dropdown label="Alinhado à esquerda" align="start">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
            <x-ui.dropdown label="Alinhado à direita" align="end">
                <x-ui.dropdown.dropdown-item href="#">Item</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Menu escuro" :code="$darkCode" :html="$darkHtml">
            <x-slot:description>
                <code>dark</code> aplica uma superfície escura fixa ao menu, independente do tema ativo.
            </x-slot:description>
            <x-ui.dropdown label="Menu escuro" dark>
                <x-ui.dropdown.dropdown-item href="#">Perfil</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Configurações</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Cor dos itens do menu" :code="$itemColorsCode" :html="$itemColorsHtml">
            <x-slot:description>
                <code>color</code> em <code>&lt;x-ui.dropdown.dropdown-item&gt;</code> tinge texto e hover com qualquer cor do tema; <code>danger</code> é um atalho para <code>color="danger"</code>.
            </x-slot:description>
            <x-ui.dropdown label="Status">
                <x-ui.dropdown.dropdown-item color="primary" icon="bi-circle-fill" href="#">Primary</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item color="secondary" icon="bi-circle-fill" href="#">Secondary</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item color="success" icon="bi-circle-fill" href="#">Success</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item color="warning" icon="bi-circle-fill" href="#">Warning</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item color="danger" icon="bi-circle-fill" href="#">Danger</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item color="info" icon="bi-circle-fill" href="#">Info</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Itens do menu" :code="$itemsCode" :html="$itemsHtml">
            <x-slot:description>
                <code>&lt;x-ui.dropdown.dropdown-item&gt;</code> aceita <code>icon</code>, <code>active</code>, <code>disabled</code>, <code>danger</code> e <code>color</code>.
            </x-slot:description>
            <x-ui.dropdown label="Ações">
                <div class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-muted-foreground">
                    Gerenciar registro
                </div>
                <x-ui.dropdown.dropdown-item icon="bi-eye" href="#">Visualizar</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item icon="bi-pencil" href="#">Editar</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item icon="bi-arrow-repeat" href="#" active>Atualizar</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item icon="bi-download" disabled>Exportar (indisponível)</x-ui.dropdown.dropdown-item>
                <div class="my-1 border-t border-border"></div>
                <x-ui.dropdown.dropdown-item icon="bi-trash" href="#" danger>Excluir</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Fechamento automático" :code="$autoCloseCode" :html="$autoCloseHtml">
            <x-slot:description>
                <code>autoClose</code>: <code>true</code> (padrão), <code>"outside"</code>, <code>"inside"</code> ou <code>false</code> (manual). Itens com <code>keepOpen</code> nunca fecham o menu ao serem clicados.
            </x-slot:description>
            <x-ui.dropdown label="Filtros" autoClose="outside">
                <x-ui.dropdown.dropdown-item icon="bi-check-square" keepOpen>Ativos</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item icon="bi-square" keepOpen>Arquivados</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>

            <x-ui.dropdown label="Manual" :autoClose="false">
                <div class="px-4 py-2 text-sm text-muted-foreground">
                    Este menu só fecha pelo botão abaixo ou pela tecla Esc.
                </div>
                <x-ui.dropdown.dropdown-item @click="open = false">Fechar menu</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Menu rolável" :code="$scrollCode" :html="$scrollHtml">
            <x-slot:description>
                <code>menuClass</code> acrescenta classes ao contêiner do menu — aqui, <code>max-h-56 overflow-y-auto</code> para listas longas.
            </x-slot:description>
            <x-ui.dropdown label="Selecionar país" menuClass="max-h-56 overflow-y-auto">
                <x-ui.dropdown.dropdown-item href="#">Brasil</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Portugal</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Argentina</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Chile</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Uruguai</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Paraguai</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Colômbia</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">México</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Peru</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Bolívia</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>

        <x-ui.example title="Trigger customizado" :code="$customTriggerCode" :html="$customTriggerHtml">
            <x-slot:description>
                Passe qualquer markup no slot <code>trigger</code> (ex.: um <code>&lt;x-ui.avatar&gt;</code>) para substituir o botão padrão. A direção/alinhamento automáticos funcionam normalmente com um trigger customizado.
            </x-slot:description>
            <x-ui.dropdown>
                <x-slot:trigger>
                    <x-ui.avatar name="Evandro Mureb" color="primary" circle class="cursor-pointer" />
                </x-slot:trigger>

                <div class="border-b border-border px-4 py-2 text-sm font-semibold">Olá, Evandro!</div>
                <x-ui.dropdown.dropdown-item icon="bi-person" href="#">Perfil</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item icon="bi-gear" href="#">Configurações</x-ui.dropdown.dropdown-item>
                <div class="my-1 border-t border-border"></div>
                <x-ui.dropdown.dropdown-item icon="bi-box-arrow-right" href="#" danger>Sair</x-ui.dropdown.dropdown-item>
            </x-ui.dropdown>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="dropdown" />
</x-ui.docs>
