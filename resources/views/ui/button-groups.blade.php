<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.button-group label="Ações">
            <x-ui.button color="primary" variant="outline">Esquerda</x-ui.button>
            <x-ui.button color="primary" variant="outline">Meio</x-ui.button>
            <x-ui.button color="primary" variant="outline">Direita</x-ui.button>
        </x-ui.button-group>
        BLADE;

    $softCode = <<<'BLADE'
        <x-ui.button-group label="Filtros soft">
            <x-ui.button color="primary" variant="soft">Todos</x-ui.button>
            <x-ui.button color="primary" variant="soft">Ativos</x-ui.button>
            <x-ui.button color="primary" variant="soft">Arquivados</x-ui.button>
        </x-ui.button-group>
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.button-group size="sm" label="Tamanho pequeno">
            <x-ui.button color="secondary" variant="outline">Um</x-ui.button>
            <x-ui.button color="secondary" variant="outline">Dois</x-ui.button>
            <x-ui.button color="secondary" variant="outline">Três</x-ui.button>
        </x-ui.button-group>

        <x-ui.button-group label="Tamanho médio">
            <x-ui.button color="secondary" variant="outline">Um</x-ui.button>
            <x-ui.button color="secondary" variant="outline">Dois</x-ui.button>
            <x-ui.button color="secondary" variant="outline">Três</x-ui.button>
        </x-ui.button-group>

        <x-ui.button-group size="lg" label="Tamanho grande">
            <x-ui.button color="secondary" variant="outline">Um</x-ui.button>
            <x-ui.button color="secondary" variant="outline">Dois</x-ui.button>
            <x-ui.button color="secondary" variant="outline">Três</x-ui.button>
        </x-ui.button-group>
        BLADE;

    $verticalCode = <<<'BLADE'
        <x-ui.button-group vertical label="Ações verticais">
            <x-ui.button color="primary" variant="outline" icon="bi-house">Início</x-ui.button>
            <x-ui.button color="primary" variant="outline" icon="bi-bar-chart">Relatórios</x-ui.button>
            <x-ui.button color="primary" variant="outline" icon="bi-gear">Configurações</x-ui.button>
        </x-ui.button-group>
        BLADE;

    $activeCode = <<<'BLADE'
        <x-ui.button-group label="Alternar visualização">
            <x-ui.button color="primary" variant="solid" icon="bi-list">Lista</x-ui.button>
            <x-ui.button color="primary" variant="outline" icon="bi-grid-3x3-gap">Grade</x-ui.button>
            <x-ui.button color="primary" variant="outline" icon="bi-kanban">Kanban</x-ui.button>
        </x-ui.button-group>
        BLADE;

    $periodCode = <<<'BLADE'
        <x-ui.button-group rounded size="sm" label="Período">
            <x-ui.button color="secondary" variant="solid">7 dias</x-ui.button>
            <x-ui.button color="secondary" variant="outline">30 dias</x-ui.button>
            <x-ui.button color="secondary" variant="outline">90 dias</x-ui.button>
            <x-ui.button color="secondary" variant="outline">Ano</x-ui.button>
        </x-ui.button-group>
        BLADE;

    $mixedCode = <<<'BLADE'
        <x-ui.button-group label="Ações do pedido">
            <x-ui.button color="success" variant="soft" icon="bi-check-lg">Aprovar</x-ui.button>
            <x-ui.button color="warning" variant="soft" icon="bi-hourglass-split">Adiar</x-ui.button>
            <x-ui.button color="danger" variant="soft" icon="bi-x-lg">Recusar</x-ui.button>
        </x-ui.button-group>
        BLADE;

    $iconOnlyCode = <<<'BLADE'
        <x-ui.button-group label="Alinhamento">
            <x-ui.button color="secondary" variant="outline" icon="bi-text-left" iconOnly aria-label="À esquerda" />
            <x-ui.button color="secondary" variant="solid" icon="bi-text-center" iconOnly aria-label="Centralizado" />
            <x-ui.button color="secondary" variant="outline" icon="bi-text-right" iconOnly aria-label="À direita" />
        </x-ui.button-group>

        <x-ui.button-group label="Zoom" size="sm">
            <x-ui.button color="secondary" variant="ghost" icon="bi-zoom-out" iconOnly aria-label="Diminuir" />
            <x-ui.button color="secondary" variant="ghost" icon="bi-zoom-in" iconOnly aria-label="Aumentar" />
        </x-ui.button-group>
        BLADE;

    $blockCode = <<<'BLADE'
        <x-ui.button-group block label="Abas de conteúdo">
            <x-ui.button color="primary" variant="solid">Visão geral</x-ui.button>
            <x-ui.button color="primary" variant="outline">Atividade</x-ui.button>
            <x-ui.button color="primary" variant="outline">Arquivos</x-ui.button>
        </x-ui.button-group>
        BLADE;

    $roundedCode = <<<'BLADE'
        <x-ui.button-group rounded label="Status">
            <x-ui.button color="primary" variant="soft">Todos</x-ui.button>
            <x-ui.button color="primary" variant="soft">Abertos</x-ui.button>
            <x-ui.button color="primary" variant="soft">Fechados</x-ui.button>
        </x-ui.button-group>
        BLADE;

    $splitCode = <<<'BLADE'
        <x-ui.button-group label="Salvar com opções">
            <x-ui.button color="primary" icon="bi-check-lg">Salvar</x-ui.button>
            <x-ui.button color="primary" icon="bi-chevron-down" iconOnly aria-label="Mais opções" />
        </x-ui.button-group>

        <x-ui.button-group label="Exportar">
            <x-ui.button color="secondary" variant="outline" icon="bi-download">Exportar</x-ui.button>
            <x-ui.button color="secondary" variant="outline" icon="bi-chevron-down" iconOnly aria-label="Formatos" />
        </x-ui.button-group>
        BLADE;

    $toolbarCode = <<<'BLADE'
        <div class="flex flex-wrap items-center gap-2 rounded-md border border-border bg-muted/40 p-2" role="toolbar" aria-label="Editor">
            <x-ui.button-group size="sm" label="Histórico">
                <x-ui.button color="secondary" variant="outline" icon="bi-arrow-counterclockwise" iconOnly aria-label="Desfazer" />
                <x-ui.button color="secondary" variant="outline" icon="bi-arrow-clockwise" iconOnly aria-label="Refazer" />
            </x-ui.button-group>

            <x-ui.button-group size="sm" label="Formatação de texto">
                <x-ui.button color="secondary" variant="outline" icon="bi-type-bold" iconOnly aria-label="Negrito" />
                <x-ui.button color="secondary" variant="outline" icon="bi-type-italic" iconOnly aria-label="Itálico" />
                <x-ui.button color="secondary" variant="outline" icon="bi-type-underline" iconOnly aria-label="Sublinhado" />
            </x-ui.button-group>

            <x-ui.button-group size="sm" label="Listas">
                <x-ui.button color="secondary" variant="outline" icon="bi-list-ul" iconOnly aria-label="Lista" />
                <x-ui.button color="secondary" variant="outline" icon="bi-list-ol" iconOnly aria-label="Numerada" />
            </x-ui.button-group>

            <x-ui.button-group size="sm" label="Inserir">
                <x-ui.button color="secondary" variant="outline" icon="bi-link-45deg" iconOnly aria-label="Link" />
                <x-ui.button color="secondary" variant="outline" icon="bi-image" iconOnly aria-label="Imagem" />
            </x-ui.button-group>
        </div>
        BLADE;

    $basicHtml = <<<'HTML'
        <div role="group" aria-label="Ações" class="btn-group">
            <button type="button" class="btn btn-outline-primary">Esquerda</button>
            <button type="button" class="btn btn-outline-primary">Meio</button>
            <button type="button" class="btn btn-outline-primary">Direita</button>
        </div>
        HTML;

    $softHtml = <<<'HTML'
        <div role="group" aria-label="Filtros soft" class="btn-group">
            <button type="button" class="btn btn-soft-primary">Todos</button>
            <button type="button" class="btn btn-soft-primary">Ativos</button>
            <button type="button" class="btn btn-soft-primary">Arquivados</button>
        </div>
        HTML;

    $sizesHtml = <<<'HTML'
        <div role="group" aria-label="Tamanho pequeno" class="btn-group btn-group-sm">
            <button type="button" class="btn btn-outline-secondary">Um</button>
            <button type="button" class="btn btn-outline-secondary">Dois</button>
            <button type="button" class="btn btn-outline-secondary">Três</button>
        </div>

        <div role="group" aria-label="Tamanho médio" class="btn-group">
            <button type="button" class="btn btn-outline-secondary">Um</button>
            <button type="button" class="btn btn-outline-secondary">Dois</button>
            <button type="button" class="btn btn-outline-secondary">Três</button>
        </div>

        <div role="group" aria-label="Tamanho grande" class="btn-group btn-group-lg">
            <button type="button" class="btn btn-outline-secondary">Um</button>
            <button type="button" class="btn btn-outline-secondary">Dois</button>
            <button type="button" class="btn btn-outline-secondary">Três</button>
        </div>
        HTML;

    $verticalHtml = <<<'HTML'
        <div role="group" aria-label="Ações verticais" class="btn-group-vertical">
            <button type="button" class="btn btn-outline-primary">
                <i class="bi bi-house shrink-0 leading-none" aria-hidden="true"></i>
                <span>Início</span>
            </button>
            <button type="button" class="btn btn-outline-primary">
                <i class="bi bi-bar-chart shrink-0 leading-none" aria-hidden="true"></i>
                <span>Relatórios</span>
            </button>
            <button type="button" class="btn btn-outline-primary">
                <i class="bi bi-gear shrink-0 leading-none" aria-hidden="true"></i>
                <span>Configurações</span>
            </button>
        </div>
        HTML;

    $activeHtml = <<<'HTML'
        <div role="group" aria-label="Alternar visualização" class="btn-group">
            <button type="button" class="btn btn-primary">
                <i class="bi bi-list shrink-0 leading-none" aria-hidden="true"></i>
                <span>Lista</span>
            </button>
            <button type="button" class="btn btn-outline-primary">
                <i class="bi bi-grid-3x3-gap shrink-0 leading-none" aria-hidden="true"></i>
                <span>Grade</span>
            </button>
            <button type="button" class="btn btn-outline-primary">
                <i class="bi bi-kanban shrink-0 leading-none" aria-hidden="true"></i>
                <span>Kanban</span>
            </button>
        </div>
        HTML;

    $periodHtml = <<<'HTML'
        <div role="group" aria-label="Período" class="btn-group btn-group-sm btn-group-rounded">
            <button type="button" class="btn btn-secondary">7 dias</button>
            <button type="button" class="btn btn-outline-secondary">30 dias</button>
            <button type="button" class="btn btn-outline-secondary">90 dias</button>
            <button type="button" class="btn btn-outline-secondary">Ano</button>
        </div>
        HTML;

    $mixedHtml = <<<'HTML'
        <div role="group" aria-label="Ações do pedido" class="btn-group">
            <button type="button" class="btn btn-soft-success">
                <i class="bi bi-check-lg shrink-0 leading-none" aria-hidden="true"></i>
                <span>Aprovar</span>
            </button>
            <button type="button" class="btn btn-soft-warning">
                <i class="bi bi-hourglass-split shrink-0 leading-none" aria-hidden="true"></i>
                <span>Adiar</span>
            </button>
            <button type="button" class="btn btn-soft-danger">
                <i class="bi bi-x-lg shrink-0 leading-none" aria-hidden="true"></i>
                <span>Recusar</span>
            </button>
        </div>
        HTML;

    $iconOnlyHtml = <<<'HTML'
        <div role="group" aria-label="Alinhamento" class="btn-group">
            <button type="button" class="btn btn-outline-secondary size-10 p-0">
                <i class="bi bi-text-left shrink-0 leading-none" aria-hidden="true"></i>
                <span class="sr-only">À esquerda</span>
            </button>
            <button type="button" class="btn btn-secondary size-10 p-0">
                <i class="bi bi-text-center shrink-0 leading-none" aria-hidden="true"></i>
                <span class="sr-only">Centralizado</span>
            </button>
            <button type="button" class="btn btn-outline-secondary size-10 p-0">
                <i class="bi bi-text-right shrink-0 leading-none" aria-hidden="true"></i>
                <span class="sr-only">À direita</span>
            </button>
        </div>

        <div role="group" aria-label="Zoom" class="btn-group btn-group-sm">
            <button type="button" class="btn btn-ghost-secondary size-8 p-0">
                <i class="bi bi-zoom-out shrink-0 leading-none" aria-hidden="true"></i>
                <span class="sr-only">Diminuir</span>
            </button>
            <button type="button" class="btn btn-ghost-secondary size-8 p-0">
                <i class="bi bi-zoom-in shrink-0 leading-none" aria-hidden="true"></i>
                <span class="sr-only">Aumentar</span>
            </button>
        </div>
        HTML;

    $blockHtml = <<<'HTML'
        <div role="group" aria-label="Abas de conteúdo" class="btn-group btn-group-block">
            <button type="button" class="btn btn-primary w-full">Visão geral</button>
            <button type="button" class="btn btn-outline-primary w-full">Atividade</button>
            <button type="button" class="btn btn-outline-primary w-full">Arquivos</button>
        </div>
        HTML;

    $roundedHtml = <<<'HTML'
        <div role="group" aria-label="Status" class="btn-group btn-group-rounded">
            <button type="button" class="btn btn-soft-primary">Todos</button>
            <button type="button" class="btn btn-soft-primary">Abertos</button>
            <button type="button" class="btn btn-soft-primary">Fechados</button>
        </div>
        HTML;

    $splitHtml = <<<'HTML'
        <div role="group" aria-label="Salvar com opções" class="btn-group">
            <button type="button" class="btn btn-primary">
                <i class="bi bi-check-lg shrink-0 leading-none" aria-hidden="true"></i>
                <span>Salvar</span>
            </button>
            <button type="button" class="btn btn-primary size-10 p-0">
                <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i>
                <span class="sr-only">Mais opções</span>
            </button>
        </div>

        <div role="group" aria-label="Exportar" class="btn-group">
            <button type="button" class="btn btn-outline-secondary">
                <i class="bi bi-download shrink-0 leading-none" aria-hidden="true"></i>
                <span>Exportar</span>
            </button>
            <button type="button" class="btn btn-outline-secondary size-10 p-0">
                <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i>
                <span class="sr-only">Formatos</span>
            </button>
        </div>
        HTML;

    $toolbarHtml = <<<'HTML'
        <div class="flex flex-wrap items-center gap-2 rounded-md border border-border bg-muted/40 p-2" role="toolbar" aria-label="Editor">
            <div role="group" aria-label="Histórico" class="btn-group btn-group-sm">
                <button type="button" class="btn btn-outline-secondary size-8 p-0">
                    <i class="bi bi-arrow-counterclockwise shrink-0 leading-none" aria-hidden="true"></i>
                    <span class="sr-only">Desfazer</span>
                </button>
                <button type="button" class="btn btn-outline-secondary size-8 p-0">
                    <i class="bi bi-arrow-clockwise shrink-0 leading-none" aria-hidden="true"></i>
                    <span class="sr-only">Refazer</span>
                </button>
            </div>

            <div role="group" aria-label="Formatação de texto" class="btn-group btn-group-sm">
                <button type="button" class="btn btn-outline-secondary size-8 p-0">
                    <i class="bi bi-type-bold shrink-0 leading-none" aria-hidden="true"></i>
                    <span class="sr-only">Negrito</span>
                </button>
                <button type="button" class="btn btn-outline-secondary size-8 p-0">
                    <i class="bi bi-type-italic shrink-0 leading-none" aria-hidden="true"></i>
                    <span class="sr-only">Itálico</span>
                </button>
                <button type="button" class="btn btn-outline-secondary size-8 p-0">
                    <i class="bi bi-type-underline shrink-0 leading-none" aria-hidden="true"></i>
                    <span class="sr-only">Sublinhado</span>
                </button>
            </div>

            <div role="group" aria-label="Listas" class="btn-group btn-group-sm">
                <button type="button" class="btn btn-outline-secondary size-8 p-0">
                    <i class="bi bi-list-ul shrink-0 leading-none" aria-hidden="true"></i>
                    <span class="sr-only">Lista</span>
                </button>
                <button type="button" class="btn btn-outline-secondary size-8 p-0">
                    <i class="bi bi-list-ol shrink-0 leading-none" aria-hidden="true"></i>
                    <span class="sr-only">Numerada</span>
                </button>
            </div>

            <div role="group" aria-label="Inserir" class="btn-group btn-group-sm">
                <button type="button" class="btn btn-outline-secondary size-8 p-0">
                    <i class="bi bi-link-45deg shrink-0 leading-none" aria-hidden="true"></i>
                    <span class="sr-only">Link</span>
                </button>
                <button type="button" class="btn btn-outline-secondary size-8 p-0">
                    <i class="bi bi-image shrink-0 leading-none" aria-hidden="true"></i>
                    <span class="sr-only">Imagem</span>
                </button>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-ui.button-group&gt;</code> agrupa vários
            <code>&lt;x-ui.button&gt;</code> num bloco conectado (sem bordas duplicadas).
            Suporta orientação vertical, tamanhos, largura total (<code>block</code>),
            cantos pill (<code>rounded</code>) e composição em toolbars.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Envolva botões no grupo. Use <code>label</code> para o <code>aria-label</code>.
            </x-slot:description>
            <x-ui.button-group label="Ações">
                <x-ui.button color="primary" variant="outline">Esquerda</x-ui.button>
                <x-ui.button color="primary" variant="outline">Meio</x-ui.button>
                <x-ui.button color="primary" variant="outline">Direita</x-ui.button>
            </x-ui.button-group>
        </x-ui.example>

        <x-ui.example title="Soft" :code="$softCode" :html="$softHtml">
            <x-slot:description>
                Grupo com <code>variant="soft"</code> — filtros e chips de status discretos.
            </x-slot:description>
            <x-ui.button-group label="Filtros soft">
                <x-ui.button color="primary" variant="soft">Todos</x-ui.button>
                <x-ui.button color="primary" variant="soft">Ativos</x-ui.button>
                <x-ui.button color="primary" variant="soft">Arquivados</x-ui.button>
            </x-ui.button-group>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code> no grupo (<code>sm</code>/<code>lg</code>) aplica a todos os filhos de uma vez.
            </x-slot:description>
            <div class="flex w-full flex-col items-start gap-3">
                <x-ui.button-group size="sm" label="Tamanho pequeno">
                    <x-ui.button color="secondary" variant="outline">Um</x-ui.button>
                    <x-ui.button color="secondary" variant="outline">Dois</x-ui.button>
                    <x-ui.button color="secondary" variant="outline">Três</x-ui.button>
                </x-ui.button-group>

                <x-ui.button-group label="Tamanho médio">
                    <x-ui.button color="secondary" variant="outline">Um</x-ui.button>
                    <x-ui.button color="secondary" variant="outline">Dois</x-ui.button>
                    <x-ui.button color="secondary" variant="outline">Três</x-ui.button>
                </x-ui.button-group>

                <x-ui.button-group size="lg" label="Tamanho grande">
                    <x-ui.button color="secondary" variant="outline">Um</x-ui.button>
                    <x-ui.button color="secondary" variant="outline">Dois</x-ui.button>
                    <x-ui.button color="secondary" variant="outline">Três</x-ui.button>
                </x-ui.button-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Vertical" :code="$verticalCode" :html="$verticalHtml">
            <x-slot:description>
                <code>vertical</code> empilha os botões (arredonda topo/base).
            </x-slot:description>
            <x-ui.button-group vertical label="Ações verticais">
                <x-ui.button color="primary" variant="outline" icon="bi-house">Início</x-ui.button>
                <x-ui.button color="primary" variant="outline" icon="bi-bar-chart">Relatórios</x-ui.button>
                <x-ui.button color="primary" variant="outline" icon="bi-gear">Configurações</x-ui.button>
            </x-ui.button-group>
        </x-ui.example>

        <x-ui.example title="Estado ativo" :code="$activeCode" :html="$activeHtml">
            <x-slot:description>
                Ativo = <code>variant="solid"</code>; demais = <code>outline</code> (sem estado no componente).
            </x-slot:description>
            <x-ui.button-group label="Alternar visualização">
                <x-ui.button color="primary" variant="solid" icon="bi-list">Lista</x-ui.button>
                <x-ui.button color="primary" variant="outline" icon="bi-grid-3x3-gap">Grade</x-ui.button>
                <x-ui.button color="primary" variant="outline" icon="bi-kanban">Kanban</x-ui.button>
            </x-ui.button-group>
        </x-ui.example>

        <x-ui.example title="Seletor de período" :code="$periodCode" :html="$periodHtml">
            <x-slot:description>
                <code>rounded</code> + <code>size="sm"</code> — bom para filtros de dashboard.
            </x-slot:description>
            <x-ui.button-group rounded size="sm" label="Período">
                <x-ui.button color="secondary" variant="solid">7 dias</x-ui.button>
                <x-ui.button color="secondary" variant="outline">30 dias</x-ui.button>
                <x-ui.button color="secondary" variant="outline">90 dias</x-ui.button>
                <x-ui.button color="secondary" variant="outline">Ano</x-ui.button>
            </x-ui.button-group>
        </x-ui.example>

        <x-ui.example title="Cores mistas" :code="$mixedCode" :html="$mixedHtml">
            <x-slot:description>
                Cada botão pode ter cor própria — ações relacionadas com semânticas distintas.
            </x-slot:description>
            <x-ui.button-group label="Ações do pedido">
                <x-ui.button color="success" variant="soft" icon="bi-check-lg">Aprovar</x-ui.button>
                <x-ui.button color="warning" variant="soft" icon="bi-hourglass-split">Adiar</x-ui.button>
                <x-ui.button color="danger" variant="soft" icon="bi-x-lg">Recusar</x-ui.button>
            </x-ui.button-group>
        </x-ui.example>

        <x-ui.example title="Somente ícone" :code="$iconOnlyCode" :html="$iconOnlyHtml">
            <x-slot:description>
                <code>iconOnly</code> + <code>aria-label</code>; misture <code>solid</code>/<code>outline</code>/<code>ghost</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-3">
                <x-ui.button-group label="Alinhamento">
                    <x-ui.button color="secondary" variant="outline" icon="bi-text-left" iconOnly aria-label="À esquerda" />
                    <x-ui.button color="secondary" variant="solid" icon="bi-text-center" iconOnly aria-label="Centralizado" />
                    <x-ui.button color="secondary" variant="outline" icon="bi-text-right" iconOnly aria-label="À direita" />
                </x-ui.button-group>

                <x-ui.button-group label="Zoom" size="sm">
                    <x-ui.button color="secondary" variant="ghost" icon="bi-zoom-out" iconOnly aria-label="Diminuir" />
                    <x-ui.button color="secondary" variant="ghost" icon="bi-zoom-in" iconOnly aria-label="Aumentar" />
                </x-ui.button-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Largura total" :code="$blockCode" :html="$blockHtml">
            <x-slot:description>
                <code>block</code> faz o grupo ocupar 100% e divide o espaço entre os botões.
            </x-slot:description>
            <div class="w-full max-w-xl">
                <x-ui.button-group block label="Abas de conteúdo">
                    <x-ui.button color="primary" variant="solid">Visão geral</x-ui.button>
                    <x-ui.button color="primary" variant="outline">Atividade</x-ui.button>
                    <x-ui.button color="primary" variant="outline">Arquivos</x-ui.button>
                </x-ui.button-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Cantos pill" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code> arredonda só as extremidades do grupo (pill).
            </x-slot:description>
            <x-ui.button-group rounded label="Status">
                <x-ui.button color="primary" variant="soft">Todos</x-ui.button>
                <x-ui.button color="primary" variant="soft">Abertos</x-ui.button>
                <x-ui.button color="primary" variant="soft">Fechados</x-ui.button>
            </x-ui.button-group>
        </x-ui.example>

        <x-ui.example title="Split button" :code="$splitCode" :html="$splitHtml">
            <x-slot:description>
                Ação principal + botão só com chevron — padrão clássico de “salvar com opções”.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-3">
                <x-ui.button-group label="Salvar com opções">
                    <x-ui.button color="primary" icon="bi-check-lg">Salvar</x-ui.button>
                    <x-ui.button color="primary" icon="bi-chevron-down" iconOnly aria-label="Mais opções" />
                </x-ui.button-group>

                <x-ui.button-group label="Exportar">
                    <x-ui.button color="secondary" variant="outline" icon="bi-download">Exportar</x-ui.button>
                    <x-ui.button color="secondary" variant="outline" icon="bi-chevron-down" iconOnly aria-label="Formatos" />
                </x-ui.button-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Barra de ferramentas" :code="$toolbarCode" :html="$toolbarHtml">
            <x-slot:description>
                Vários grupos com <code>flex gap-2</code> e <code>role="toolbar"</code>.
            </x-slot:description>
            <div class="flex w-full flex-wrap items-center gap-2 rounded-md border border-border bg-muted/40 p-2" role="toolbar" aria-label="Editor">
                <x-ui.button-group size="sm" label="Histórico">
                    <x-ui.button color="secondary" variant="outline" icon="bi-arrow-counterclockwise" iconOnly aria-label="Desfazer" />
                    <x-ui.button color="secondary" variant="outline" icon="bi-arrow-clockwise" iconOnly aria-label="Refazer" />
                </x-ui.button-group>

                <x-ui.button-group size="sm" label="Formatação de texto">
                    <x-ui.button color="secondary" variant="outline" icon="bi-type-bold" iconOnly aria-label="Negrito" />
                    <x-ui.button color="secondary" variant="outline" icon="bi-type-italic" iconOnly aria-label="Itálico" />
                    <x-ui.button color="secondary" variant="outline" icon="bi-type-underline" iconOnly aria-label="Sublinhado" />
                </x-ui.button-group>

                <x-ui.button-group size="sm" label="Listas">
                    <x-ui.button color="secondary" variant="outline" icon="bi-list-ul" iconOnly aria-label="Lista" />
                    <x-ui.button color="secondary" variant="outline" icon="bi-list-ol" iconOnly aria-label="Numerada" />
                </x-ui.button-group>

                <x-ui.button-group size="sm" label="Inserir">
                    <x-ui.button color="secondary" variant="outline" icon="bi-link-45deg" iconOnly aria-label="Link" />
                    <x-ui.button color="secondary" variant="outline" icon="bi-image" iconOnly aria-label="Imagem" />
                </x-ui.button-group>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="button-group" />
</x-ui.docs>
