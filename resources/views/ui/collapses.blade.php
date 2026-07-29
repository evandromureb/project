<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.collapse.collapse-trigger name="basic-example" color="primary" variant="soft" indicator>
            Mostrar detalhes
        </x-ui.collapse.collapse-trigger>

        <x-ui.collapse name="basic-example" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
            Este é o conteúdo recolhível. Ele desliza suavemente ao abrir e fechar.
        </x-ui.collapse>
        BLADE;

    $variantsCode = <<<'BLADE'
        <x-ui.collapse.collapse-trigger name="v-soft" color="primary" variant="soft" indicator>Soft</x-ui.collapse.collapse-trigger>
        <x-ui.collapse.collapse-trigger name="v-outline" color="primary" variant="outline" indicator>Outline</x-ui.collapse.collapse-trigger>
        <x-ui.collapse.collapse-trigger name="v-ghost" color="primary" variant="ghost" indicator>Ghost</x-ui.collapse.collapse-trigger>
        <x-ui.collapse.collapse-trigger name="v-link" color="primary" variant="link" indicator>Link</x-ui.collapse.collapse-trigger>

        <x-ui.collapse name="v-soft" class="mt-3 rounded-md border border-primary/20 bg-primary/5 p-4 text-sm text-muted-foreground">
            Painel do gatilho soft.
        </x-ui.collapse>
        BLADE;

    $labelCode = <<<'BLADE'
        <x-ui.collapse.collapse-trigger name="toggle-label" color="primary" variant="soft" indicator>
            <span x-text="$store.collapse.isOpen('toggle-label') ? 'Ocultar detalhes' : 'Mostrar detalhes'"></span>
        </x-ui.collapse.collapse-trigger>

        <x-ui.collapse name="toggle-label" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
            O rótulo do botão muda conforme o estado aberto/fechado.
        </x-ui.collapse>
        BLADE;

    $multiTriggerCode = <<<'BLADE'
        <div class="flex flex-wrap gap-2">
            <x-ui.collapse.collapse-trigger name="shared-panel" color="secondary" variant="soft" icon="bi-eye">
                Ver
            </x-ui.collapse.collapse-trigger>
            <x-ui.collapse.collapse-trigger name="shared-panel" color="secondary" variant="outline" indicator>
                Alternar
            </x-ui.collapse.collapse-trigger>
        </div>

        <x-ui.collapse name="shared-panel" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
            Qualquer um dos botões controla este mesmo painel.
        </x-ui.collapse>
        BLADE;

    $multiTargetCode = <<<'BLADE'
        <x-ui.collapse.collapse-trigger :name="['panel-a', 'panel-b']" color="primary" variant="soft" indicator>
            Abrir os dois painéis
        </x-ui.collapse.collapse-trigger>

        <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2">
            <x-ui.collapse name="panel-a" class="rounded-md border border-success/25 bg-success/10 p-4 text-sm text-success">
                <p class="mb-0 font-medium">Painel A</p>
                <p class="mb-0 mt-1 opacity-90">Conteúdo do primeiro alvo.</p>
            </x-ui.collapse>
            <x-ui.collapse name="panel-b" class="rounded-md border border-info/25 bg-info/10 p-4 text-sm text-info">
                <p class="mb-0 font-medium">Painel B</p>
                <p class="mb-0 mt-1 opacity-90">Conteúdo do segundo alvo.</p>
            </x-ui.collapse>
        </div>
        BLADE;

    $openCloseCode = <<<'BLADE'
        <div class="flex flex-wrap gap-2">
            <x-ui.button color="success" variant="soft" size="sm" icon="bi-plus-lg" @click="$store.collapse.show('manual')">
                Abrir
            </x-ui.button>
            <x-ui.button color="danger" variant="soft" size="sm" icon="bi-dash-lg" @click="$store.collapse.hide('manual')">
                Fechar
            </x-ui.button>
            <x-ui.collapse.collapse-trigger name="manual" size="sm" indicator>Alternar</x-ui.collapse.collapse-trigger>
        </div>

        <x-ui.collapse name="manual" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
            Use show/hide/toggle da store conforme a ação.
        </x-ui.collapse>
        BLADE;

    $defaultOpenCode = <<<'BLADE'
        <x-ui.collapse.collapse-trigger name="open-by-default" color="secondary" variant="soft" indicator>
            <span x-text="$store.collapse.isOpen('open-by-default') ? 'Recolher' : 'Expandir'"></span>
        </x-ui.collapse.collapse-trigger>

        <x-ui.collapse name="open-by-default" show class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
            Este painel já começa aberto (prop "show").
        </x-ui.collapse>
        BLADE;

    $horizontalCode = <<<'BLADE'
        <div class="flex items-center gap-2">
            <x-ui.collapse.collapse-trigger name="search-bar" color="secondary" variant="soft" icon="bi-search" iconOnly aria-label="Buscar" />

            <x-ui.collapse
                name="search-bar"
                horizontal
                width="max-w-xs"
                class="inline-block align-middle rounded-md border border-border bg-card shadow-sm"
            >
                <input type="text" placeholder="Buscar na página..." class="w-64 bg-transparent px-3 py-2 text-sm outline-none placeholder:text-muted-foreground">
            </x-ui.collapse>
        </div>
        BLADE;

    $customTriggerCode = <<<'BLADE'
        <p class="mb-0 text-sm text-foreground">
            Produto com descrição longa.
            <button type="button" @click="$store.collapse.toggle('read-more')" class="font-medium text-primary hover:underline">
                <span x-text="$store.collapse.isOpen('read-more') ? 'Ler menos' : 'Ler mais'"></span>
            </button>
        </p>

        <x-ui.collapse name="read-more" class="mt-2 text-sm text-muted-foreground">
            Texto adicional revelado sem <code>&lt;x-ui.collapse.collapse-trigger&gt;</code> —
            qualquer elemento pode chamar a store.
        </x-ui.collapse>
        BLADE;

    $alertCode = <<<'BLADE'
        <x-ui.collapse.collapse-trigger name="tips" color="info" variant="ghost" icon="bi-lightbulb" indicator>
            Dicas de uso
        </x-ui.collapse.collapse-trigger>

        <x-ui.collapse name="tips" class="mt-3">
            <x-ui.alert color="info" icon title="Atalhos">
                Use as setas do teclado nas tabs e Escape para fechar modais.
            </x-ui.alert>
        </x-ui.collapse>
        BLADE;

    $faqCode = <<<'BLADE'
        <div class="w-full divide-y divide-border rounded-md border border-border">
            <div class="p-4">
                <x-ui.collapse.collapse-trigger name="faq-1" variant="ghost" color="secondary" class="w-full justify-between px-0" indicator>
                    Como altero meu plano?
                </x-ui.collapse.collapse-trigger>
                <x-ui.collapse name="faq-1" class="mt-2 text-sm text-muted-foreground">
                    Em Configurações → Faturamento você pode subir ou descer de plano a qualquer momento.
                </x-ui.collapse>
            </div>
            <div class="p-4">
                <x-ui.collapse.collapse-trigger name="faq-2" variant="ghost" color="secondary" class="w-full justify-between px-0" indicator>
                    Vocês emitem nota fiscal?
                </x-ui.collapse.collapse-trigger>
                <x-ui.collapse name="faq-2" class="mt-2 text-sm text-muted-foreground">
                    Sim. A NF-e é enviada automaticamente para o e-mail da conta após cada cobrança.
                </x-ui.collapse>
            </div>
        </div>
        BLADE;

    $cardCode = <<<'BLADE'
        <x-ui.card title="Filtros avançados" subtitle="Opcional">
            <x-ui.collapse.collapse-trigger name="filters" icon="bi-sliders" variant="soft" color="primary" indicator>
                <span x-text="$store.collapse.isOpen('filters') ? 'Ocultar filtros' : 'Mostrar filtros'"></span>
            </x-ui.collapse.collapse-trigger>

            <x-ui.collapse name="filters" class="mt-4 space-y-4">
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <input type="text" placeholder="Categoria" class="rounded-md border border-border bg-card px-3 py-2 text-sm outline-none focus-visible:outline-2 focus-visible:outline-primary">
                    <input type="text" placeholder="Status" class="rounded-md border border-border bg-card px-3 py-2 text-sm outline-none focus-visible:outline-2 focus-visible:outline-primary">
                </div>
                <div class="flex flex-wrap gap-2">
                    <x-ui.button color="primary" size="sm">Aplicar</x-ui.button>
                    <x-ui.button color="secondary" variant="ghost" size="sm">Limpar</x-ui.button>
                </div>
            </x-ui.collapse>
        </x-ui.card>
        BLADE;

/*     Traduções HTML puro. <x-ui.collapse.collapse-trigger> renderiza um <x-ui.button>
    (classes .btn/.btn-{variant}-{color} de resources/css/layout.css); com "indicator" o
    botão recebe utilities Tailwind extras e um <i> de seta ao final. <x-ui.collapse>
    renderiza um <div> com x-show + x-collapse (ou, em modo horizontal, um <div> com
    max-width animado) — aqui mostrado com o atributo "hidden" quando o painel começa
    fechado. O estado real (aberto/fechado) é controlado em runtime pela Alpine store
    "$store.collapse" (resources/js/collapse.js). 
*/
    $basicHtml = <<<'HTML'
        <button
            type="button"
            class="btn btn-soft-primary [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2"
            aria-controls="collapse-basic-example"
            aria-expanded="false"
        >
            <span>Mostrar detalhes</span>
            <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>

        <div
            id="collapse-basic-example"
            class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground"
            hidden
        >
            Este é o conteúdo recolhível. Ele desliza suavemente ao abrir e fechar.
        </div>
        HTML;

    $variantsHtml = <<<'HTML'
        <button type="button" class="btn btn-soft-primary [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-v-soft" aria-expanded="false">
            <span>Soft</span>
            <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-outline-primary [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-v-outline" aria-expanded="false">
            <span>Outline</span>
            <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-ghost-primary [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-v-ghost" aria-expanded="false">
            <span>Ghost</span>
            <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-link-primary [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-v-link" aria-expanded="false">
            <span>Link</span>
            <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>

        <div id="collapse-v-soft" class="mt-3 rounded-md border border-primary/20 bg-primary/5 p-4 text-sm text-muted-foreground" hidden>
            Painel do gatilho soft.
        </div>
        HTML;

    $labelHtml = <<<'HTML'
        <button type="button" class="btn btn-soft-primary [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-toggle-label" aria-expanded="false">
            <span>
                <span>Mostrar detalhes</span>
            </span>
            <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>

        <div id="collapse-toggle-label" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground" hidden>
            O rótulo do botão muda conforme o estado aberto/fechado.
        </div>
        HTML;

    $multiTriggerHtml = <<<'HTML'
        <div class="flex flex-wrap gap-2">
            <button type="button" class="btn btn-soft-secondary" aria-controls="collapse-shared-panel" aria-expanded="false">
                <i class="bi bi-eye shrink-0 leading-none" aria-hidden="true"></i>
                <span>Ver</span>
            </button>
            <button type="button" class="btn btn-outline-secondary [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-shared-panel" aria-expanded="false">
                <span>Alternar</span>
                <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
            </button>
        </div>

        <div id="collapse-shared-panel" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground" hidden>
            Qualquer um dos botões controla este mesmo painel.
        </div>
        HTML;

    $multiTargetHtml = <<<'HTML'
        <button type="button" class="btn btn-soft-primary [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-panel-a collapse-panel-b" aria-expanded="false">
            <span>Abrir os dois painéis</span>
            <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>

        <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2">
            <div id="collapse-panel-a" class="rounded-md border border-success/25 bg-success/10 p-4 text-sm text-success" hidden>
                <p class="mb-0 font-medium">Painel A</p>
                <p class="mb-0 mt-1 opacity-90">Conteúdo do primeiro alvo.</p>
            </div>
            <div id="collapse-panel-b" class="rounded-md border border-info/25 bg-info/10 p-4 text-sm text-info" hidden>
                <p class="mb-0 font-medium">Painel B</p>
                <p class="mb-0 mt-1 opacity-90">Conteúdo do segundo alvo.</p>
            </div>
        </div>
        HTML;

    $openCloseHtml = <<<'HTML'
        <div class="flex flex-wrap gap-2">
            <!-- @click="$store.collapse.show('manual')" -->
            <button type="button" class="btn btn-soft-success btn-sm">
                <i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i>
                <span>Abrir</span>
            </button>
            <!-- @click="$store.collapse.hide('manual')" -->
            <button type="button" class="btn btn-soft-danger btn-sm">
                <i class="bi bi-dash-lg shrink-0 leading-none" aria-hidden="true"></i>
                <span>Fechar</span>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-manual" aria-expanded="false">
                <span>Alternar</span>
                <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
            </button>
        </div>

        <div id="collapse-manual" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground" hidden>
            Use show/hide/toggle da store conforme a ação.
        </div>
        HTML;

    $defaultOpenHtml = <<<'HTML'
        <button type="button" class="btn btn-soft-secondary [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-open-by-default" aria-expanded="true">
            <span>
                <span>Recolher</span>
            </span>
            <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200 rotate-180" aria-hidden="true"></i>
        </button>

        <div id="collapse-open-by-default" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
            Este painel já começa aberto (prop "show").
        </div>
        HTML;

    $horizontalHtml = <<<'HTML'
        <div class="flex items-center gap-2">
            <button type="button" class="btn btn-soft-secondary size-10 p-0" aria-controls="collapse-search-bar" aria-expanded="false" aria-label="Buscar">
                <i class="bi bi-search shrink-0 leading-none" aria-hidden="true"></i>
            </button>

            <div
                id="collapse-search-bar"
                class="inline-block align-middle rounded-md border border-border bg-card shadow-sm overflow-hidden transition-[max-width] duration-300 max-w-0"
            >
                <div class="w-max">
                    <input type="text" placeholder="Buscar na página..." class="w-64 bg-transparent px-3 py-2 text-sm outline-none placeholder:text-muted-foreground">
                </div>
            </div>
        </div>
        HTML;

    $customTriggerHtml = <<<'HTML'
        <p class="mb-0 text-sm text-foreground">
            Produto com descrição longa.
            <button type="button" class="font-medium text-primary hover:underline">
                <span>Ler mais</span>
            </button>
        </p>

        <div id="collapse-read-more" class="mt-2 text-sm text-muted-foreground" hidden>
            Texto adicional revelado sem <code>&lt;x-ui.collapse.collapse-trigger&gt;</code> —
            qualquer elemento pode chamar a store.
        </div>
        HTML;

    $alertHtml = <<<'HTML'
        <button type="button" class="btn btn-ghost-info [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-tips" aria-expanded="false">
            <i class="bi bi-lightbulb shrink-0 leading-none" aria-hidden="true"></i>
            <span>Dicas de uso</span>
            <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
        </button>

        <div id="collapse-tips" class="mt-3" hidden>
            <div role="alert" class="border border-info/20 border-l-4 border-l-info bg-info/10 text-info flex items-start gap-3 rounded-md px-4 py-3 text-sm">
                <i class="bi bi-info-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
                <div class="min-w-0 flex-1">
                    <p class="mb-0 font-semibold leading-tight mb-1">Atalhos</p>
                    <div class="leading-relaxed text-[13px] opacity-90">
                        Use as setas do teclado nas tabs e Escape para fechar modais.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $faqHtml = <<<'HTML'
        <div class="w-full divide-y divide-border rounded-md border border-border">
            <div class="p-4">
                <button type="button" class="btn btn-ghost-secondary w-full justify-between px-0 [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-faq-1" aria-expanded="false">
                    <span>Como altero meu plano?</span>
                    <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
                <div id="collapse-faq-1" class="mt-2 text-sm text-muted-foreground" hidden>
                    Em Configurações → Faturamento você pode subir ou descer de plano a qualquer momento.
                </div>
            </div>
            <div class="p-4">
                <button type="button" class="btn btn-ghost-secondary w-full justify-between px-0 [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-faq-2" aria-expanded="false">
                    <span>Vocês emitem nota fiscal?</span>
                    <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>
                <div id="collapse-faq-2" class="mt-2 text-sm text-muted-foreground" hidden>
                    Sim. A NF-e é enviada automaticamente para o e-mail da conta após cada cobrança.
                </div>
            </div>
        </div>
        HTML;

    $cardHtml = <<<'HTML'
        <div class="card">
            <div class="card-header">
                <div>
                    <h5 class="card-title">Filtros avançados</h5>
                    <p class="mt-1 mb-0 text-sm text-muted-foreground">Opcional</p>
                </div>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-soft-primary [&>span]:inline-flex [&>span]:w-full [&>span]:items-center [&>span]:gap-2" aria-controls="collapse-filters" aria-expanded="false">
                    <i class="bi bi-sliders shrink-0 leading-none" aria-hidden="true"></i>
                    <span>
                        <span>Mostrar filtros</span>
                    </span>
                    <i class="bi bi-chevron-down ms-auto shrink-0 text-xs leading-none transition-transform duration-200" aria-hidden="true"></i>
                </button>

                <div id="collapse-filters" class="mt-4 space-y-4" hidden>
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <input type="text" placeholder="Categoria" class="rounded-md border border-border bg-card px-3 py-2 text-sm outline-none focus-visible:outline-2 focus-visible:outline-primary">
                        <input type="text" placeholder="Status" class="rounded-md border border-border bg-card px-3 py-2 text-sm outline-none focus-visible:outline-2 focus-visible:outline-primary">
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" class="btn btn-primary btn-sm">Aplicar</button>
                        <button type="button" class="btn btn-ghost-secondary btn-sm">Limpar</button>
                    </div>
                </div>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.collapse&gt;</code> mostra/esconde conteúdo com animação. Gatilho e painel
            não precisam ser vizinhos — o estado vive em <code>$store.collapse</code>, ligado por
            <code>name</code>. Dá para vários gatilhos num painel, um gatilho em vários painéis,
            <code>show</code>/<code>hide</code>/<code>toggle</code>, modo horizontal e gatilhos
            customizados. O trigger é um <code>&lt;x-ui.button&gt;</code> (solid, soft, outline,
            ghost, link).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                <code>collapse-trigger</code> + <code>collapse</code> com a mesma <code>name</code>.
            </x-slot:description>
            <div class="w-full">
                <x-ui.collapse.collapse-trigger name="basic-example" color="primary" variant="soft" indicator>
                    Mostrar detalhes
                </x-ui.collapse.collapse-trigger>

                <x-ui.collapse name="basic-example" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
                    Este é o conteúdo recolhível. Ele desliza suavemente ao abrir e fechar.
                </x-ui.collapse>
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes do gatilho" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                O trigger encaminha <code>variant</code> ao <code>&lt;x-ui.button&gt;</code> (inclui ghost/link).
            </x-slot:description>
            <div class="w-full space-y-3">
                <div class="flex flex-wrap items-center gap-2">
                    <x-ui.collapse.collapse-trigger name="v-soft" color="primary" variant="soft" indicator>Soft</x-ui.collapse.collapse-trigger>
                    <x-ui.collapse.collapse-trigger name="v-outline" color="primary" variant="outline" indicator>Outline</x-ui.collapse.collapse-trigger>
                    <x-ui.collapse.collapse-trigger name="v-ghost" color="primary" variant="ghost" indicator>Ghost</x-ui.collapse.collapse-trigger>
                    <x-ui.collapse.collapse-trigger name="v-link" color="primary" variant="link" indicator>Link</x-ui.collapse.collapse-trigger>
                </div>

                <x-ui.collapse name="v-soft" class="rounded-md border border-primary/20 bg-primary/5 p-4 text-sm text-muted-foreground">
                    Painel do gatilho soft.
                </x-ui.collapse>
                <x-ui.collapse name="v-outline" class="rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
                    Painel do gatilho outline.
                </x-ui.collapse>
                <x-ui.collapse name="v-ghost" class="rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
                    Painel do gatilho ghost.
                </x-ui.collapse>
                <x-ui.collapse name="v-link" class="rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
                    Painel do gatilho link.
                </x-ui.collapse>
            </div>
        </x-ui.example>

        <x-ui.example title="Rótulo dinâmico" :code="$labelCode" :html="$labelHtml">
            <x-slot:description>
                Use <code>x-text</code> + <code>$store.collapse.isOpen()</code> para trocar o texto.
            </x-slot:description>
            <div class="w-full">
                <x-ui.collapse.collapse-trigger name="toggle-label" color="primary" variant="soft" indicator>
                    <span x-text="$store.collapse.isOpen('toggle-label') ? 'Ocultar detalhes' : 'Mostrar detalhes'"></span>
                </x-ui.collapse.collapse-trigger>

                <x-ui.collapse name="toggle-label" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
                    O rótulo do botão muda conforme o estado aberto/fechado.
                </x-ui.collapse>
            </div>
        </x-ui.example>

        <x-ui.example title="Aberto por padrão" :code="$defaultOpenCode" :html="$defaultOpenHtml">
            <x-slot:description>
                Prop <code>show</code> no painel inicia já visível.
            </x-slot:description>
            <div class="w-full">
                <x-ui.collapse.collapse-trigger name="open-by-default" color="secondary" variant="soft" indicator>
                    <span x-text="$store.collapse.isOpen('open-by-default') ? 'Recolher' : 'Expandir'"></span>
                </x-ui.collapse.collapse-trigger>

                <x-ui.collapse name="open-by-default" show class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
                    Este painel já começa aberto (prop "show").
                </x-ui.collapse>
            </div>
        </x-ui.example>

        <x-ui.example title="Vários gatilhos, um painel" :code="$multiTriggerCode" :html="$multiTriggerHtml">
            <x-slot:description>
                Dois botões compartilham o estado pelo mesmo <code>name</code>.
            </x-slot:description>
            <div class="w-full">
                <div class="flex flex-wrap gap-2">
                    <x-ui.collapse.collapse-trigger name="shared-panel" color="secondary" variant="soft" icon="bi-eye">
                        Ver
                    </x-ui.collapse.collapse-trigger>
                    <x-ui.collapse.collapse-trigger name="shared-panel" color="secondary" variant="outline" indicator>
                        Alternar
                    </x-ui.collapse.collapse-trigger>
                </div>

                <x-ui.collapse name="shared-panel" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
                    Qualquer um dos botões controla este mesmo painel.
                </x-ui.collapse>
            </div>
        </x-ui.example>

        <x-ui.example title="Um gatilho, vários painéis" :code="$multiTargetCode" :html="$multiTargetHtml">
            <x-slot:description>
                Array em <code>name</code> alterna vários painéis de uma vez.
            </x-slot:description>
            <div class="w-full">
                <x-ui.collapse.collapse-trigger :name="['panel-a', 'panel-b']" color="primary" variant="soft" indicator>
                    Abrir os dois painéis
                </x-ui.collapse.collapse-trigger>

                <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <x-ui.collapse name="panel-a" class="rounded-md border border-success/25 bg-success/10 p-4 text-sm text-success">
                        <p class="mb-0 font-medium">Painel A</p>
                        <p class="mb-0 mt-1 opacity-90">Conteúdo do primeiro alvo.</p>
                    </x-ui.collapse>
                    <x-ui.collapse name="panel-b" class="rounded-md border border-info/25 bg-info/10 p-4 text-sm text-info">
                        <p class="mb-0 font-medium">Painel B</p>
                        <p class="mb-0 mt-1 opacity-90">Conteúdo do segundo alvo.</p>
                    </x-ui.collapse>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Abrir / fechar explícito" :code="$openCloseCode" :html="$openCloseHtml">
            <x-slot:description>
                <code>$store.collapse.show()</code> / <code>hide()</code> além do toggle.
            </x-slot:description>
            <div class="w-full">
                <div class="flex flex-wrap gap-2">
                    <x-ui.button color="success" variant="soft" size="sm" icon="bi-plus-lg" @click="$store.collapse.show('manual')">
                        Abrir
                    </x-ui.button>
                    <x-ui.button color="danger" variant="soft" size="sm" icon="bi-dash-lg" @click="$store.collapse.hide('manual')">
                        Fechar
                    </x-ui.button>
                    <x-ui.collapse.collapse-trigger name="manual" size="sm" indicator>Alternar</x-ui.collapse.collapse-trigger>
                </div>

                <x-ui.collapse name="manual" class="mt-3 rounded-md border border-border bg-muted/50 p-4 text-sm text-muted-foreground">
                    Use show/hide/toggle da store conforme a ação.
                </x-ui.collapse>
            </div>
        </x-ui.example>

        <x-ui.example title="Horizontal" :code="$horizontalCode" :html="$horizontalHtml">
            <x-slot:description>
                <code>horizontal</code> anima a largura — útil para busca embutida.
            </x-slot:description>
            <div class="flex w-full items-center gap-2">
                <x-ui.collapse.collapse-trigger name="search-bar" color="secondary" variant="soft" icon="bi-search" iconOnly aria-label="Buscar" />

                <x-ui.collapse
                    name="search-bar"
                    horizontal
                    width="max-w-xs"
                    class="inline-block align-middle rounded-md border border-border bg-card shadow-sm"
                >
                    <input type="text" placeholder="Buscar na página..." class="w-64 bg-transparent px-3 py-2 text-sm outline-none placeholder:text-muted-foreground">
                </x-ui.collapse>
            </div>
        </x-ui.example>

        <x-ui.example title="Gatilho customizado" :code="$customTriggerCode" :html="$customTriggerHtml">
            <x-slot:description>
                Qualquer elemento pode chamar <code>$store.collapse.toggle('name')</code>.
            </x-slot:description>
            <div class="w-full">
                <p class="mb-0 text-sm text-foreground">
                    Produto com descrição longa.
                    <button type="button" @click="$store.collapse.toggle('read-more')" class="font-medium text-primary hover:underline">
                        <span x-text="$store.collapse.isOpen('read-more') ? 'Ler menos' : 'Ler mais'"></span>
                    </button>
                </p>

                <x-ui.collapse name="read-more" class="mt-2 text-sm text-muted-foreground">
                    Texto adicional revelado sem <code>&lt;x-ui.collapse.collapse-trigger&gt;</code> —
                    qualquer elemento pode chamar a store.
                </x-ui.collapse>
            </div>
        </x-ui.example>

        <x-ui.example title="Com alert" :code="$alertCode" :html="$alertHtml">
            <x-slot:description>
                O painel aceita outros componentes — aqui um <code>&lt;x-ui.alert&gt;</code>.
            </x-slot:description>
            <div class="w-full">
                <x-ui.collapse.collapse-trigger name="tips" color="info" variant="ghost" icon="bi-lightbulb" indicator>
                    Dicas de uso
                </x-ui.collapse.collapse-trigger>

                <x-ui.collapse name="tips" class="mt-3">
                    <x-ui.alert color="info" icon title="Atalhos">
                        Use as setas do teclado nas tabs e Escape para fechar modais.
                    </x-ui.alert>
                </x-ui.collapse>
            </div>
        </x-ui.example>

        <x-ui.example title="Lista FAQ" :code="$faqCode" :html="$faqHtml">
            <x-slot:description>
                Padrão de perguntas frequentes com gatilhos <code>ghost</code> em largura total.
            </x-slot:description>
            <div class="w-full divide-y divide-border rounded-md border border-border">
                <div class="p-4">
                    <x-ui.collapse.collapse-trigger name="faq-1" variant="ghost" color="secondary" class="w-full justify-between px-0" indicator>
                        Como altero meu plano?
                    </x-ui.collapse.collapse-trigger>
                    <x-ui.collapse name="faq-1" class="mt-2 text-sm text-muted-foreground">
                        Em Configurações → Faturamento você pode subir ou descer de plano a qualquer momento.
                    </x-ui.collapse>
                </div>
                <div class="p-4">
                    <x-ui.collapse.collapse-trigger name="faq-2" variant="ghost" color="secondary" class="w-full justify-between px-0" indicator>
                        Vocês emitem nota fiscal?
                    </x-ui.collapse.collapse-trigger>
                    <x-ui.collapse name="faq-2" class="mt-2 text-sm text-muted-foreground">
                        Sim. A NF-e é enviada automaticamente para o e-mail da conta após cada cobrança.
                    </x-ui.collapse>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Dentro de um card" :code="$cardCode" :html="$cardHtml">
            <x-slot:description>
                Filtros avançados ocultos por padrão — composição comum com <code>&lt;x-ui.card&gt;</code>.
            </x-slot:description>
            <div class="w-full">
                <x-ui.card title="Filtros avançados" subtitle="Opcional">
                    <x-ui.collapse.collapse-trigger name="filters" icon="bi-sliders" variant="soft" color="primary" indicator>
                        <span x-text="$store.collapse.isOpen('filters') ? 'Ocultar filtros' : 'Mostrar filtros'"></span>
                    </x-ui.collapse.collapse-trigger>

                    <x-ui.collapse name="filters" class="mt-4 space-y-4">
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <input type="text" placeholder="Categoria" class="rounded-md border border-border bg-card px-3 py-2 text-sm outline-none focus-visible:outline-2 focus-visible:outline-primary">
                            <input type="text" placeholder="Status" class="rounded-md border border-border bg-card px-3 py-2 text-sm outline-none focus-visible:outline-2 focus-visible:outline-primary">
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <x-ui.button color="primary" size="sm">Aplicar</x-ui.button>
                            <x-ui.button color="secondary" variant="ghost" size="sm">Limpar</x-ui.button>
                        </div>
                    </x-ui.collapse>
                </x-ui.card>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="collapse" />
</x-ui.docs>
