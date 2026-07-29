<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.tooltip text="Este é um tooltip">
            <x-ui.button variant="outline" color="secondary">Passe o mouse</x-ui.button>
        </x-ui.tooltip>
        BLADE;

    $basicHtml = <<<'HTML'
        <span class="relative inline-block">
            <button type="button" class="btn btn-outline-secondary">Passe o mouse</button>
            <div class="absolute top-full left-1/2 z-10 mt-2 max-w-[220px] -translate-x-1/2 rounded-md bg-neutral-900 px-2.5 py-1.5 text-xs font-medium text-neutral-100 shadow-lg">
                Este é um tooltip
                <span class="absolute -top-1 left-1/2 size-2 -translate-x-1/2 rotate-45 bg-neutral-900" aria-hidden="true"></span>
            </div>
        </span>
        HTML;

    $placementsCode = <<<'BLADE'
        <x-ui.tooltip text="Em cima" placement="top">
            <x-ui.button variant="outline" color="secondary" size="sm">Topo</x-ui.button>
        </x-ui.tooltip>
        <x-ui.tooltip text="Embaixo" placement="bottom">
            <x-ui.button variant="outline" color="secondary" size="sm">Base</x-ui.button>
        </x-ui.tooltip>
        <x-ui.tooltip text="À esquerda" placement="left">
            <x-ui.button variant="outline" color="secondary" size="sm">Esquerda</x-ui.button>
        </x-ui.tooltip>
        <x-ui.tooltip text="À direita" placement="right">
            <x-ui.button variant="outline" color="secondary" size="sm">Direita</x-ui.button>
        </x-ui.tooltip>
        BLADE;

    $placementsHtml = <<<'HTML'
        <span class="relative inline-block">
            <button type="button" class="btn btn-sm btn-outline-secondary">Topo</button>
            <div class="absolute bottom-full left-1/2 z-10 mb-2 max-w-[220px] -translate-x-1/2 rounded-md bg-neutral-900 px-2.5 py-1.5 text-xs font-medium text-neutral-100 shadow-lg">
                Em cima
                <span class="absolute -bottom-1 left-1/2 size-2 -translate-x-1/2 rotate-45 bg-neutral-900" aria-hidden="true"></span>
            </div>
        </span>
        <span class="relative inline-block">
            <button type="button" class="btn btn-sm btn-outline-secondary">Base</button>
            <div class="absolute top-full left-1/2 z-10 mt-2 max-w-[220px] -translate-x-1/2 rounded-md bg-neutral-900 px-2.5 py-1.5 text-xs font-medium text-neutral-100 shadow-lg">
                Embaixo
                <span class="absolute -top-1 left-1/2 size-2 -translate-x-1/2 rotate-45 bg-neutral-900" aria-hidden="true"></span>
            </div>
        </span>
        <span class="relative inline-block">
            <button type="button" class="btn btn-sm btn-outline-secondary">Esquerda</button>
            <div class="absolute top-1/2 right-full z-10 mr-2 max-w-[220px] -translate-y-1/2 rounded-md bg-neutral-900 px-2.5 py-1.5 text-xs font-medium text-neutral-100 shadow-lg">
                À esquerda
                <span class="absolute top-1/2 -right-1 size-2 -translate-y-1/2 rotate-45 bg-neutral-900" aria-hidden="true"></span>
            </div>
        </span>
        <span class="relative inline-block">
            <button type="button" class="btn btn-sm btn-outline-secondary">Direita</button>
            <div class="absolute top-1/2 left-full z-10 ml-2 max-w-[220px] -translate-y-1/2 rounded-md bg-neutral-900 px-2.5 py-1.5 text-xs font-medium text-neutral-100 shadow-lg">
                À direita
                <span class="absolute top-1/2 -left-1 size-2 -translate-y-1/2 rotate-45 bg-neutral-900" aria-hidden="true"></span>
            </div>
        </span>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.tooltip text="Escuro (padrão)" color="dark">
            <x-ui.button variant="outline" color="secondary" size="sm">Dark</x-ui.button>
        </x-ui.tooltip>
        <x-ui.tooltip text="Claro" color="light">
            <x-ui.button variant="outline" color="secondary" size="sm">Light</x-ui.button>
        </x-ui.tooltip>
        <x-ui.tooltip text="Sucesso" color="success">
            <x-ui.button variant="outline" color="success" size="sm">Success</x-ui.button>
        </x-ui.tooltip>
        <x-ui.tooltip text="Perigo" color="danger">
            <x-ui.button variant="outline" color="danger" size="sm">Danger</x-ui.button>
        </x-ui.tooltip>
        BLADE;

    $colorsHtml = <<<'HTML'
        <span class="relative inline-block">
            <button type="button" class="btn btn-sm btn-outline-secondary">Dark</button>
            <div class="absolute top-full left-1/2 z-10 mt-2 max-w-[220px] -translate-x-1/2 rounded-md bg-neutral-900 px-2.5 py-1.5 text-xs font-medium text-neutral-100 shadow-lg">
                Escuro (padrão)
                <span class="absolute -top-1 left-1/2 size-2 -translate-x-1/2 rotate-45 bg-neutral-900" aria-hidden="true"></span>
            </div>
        </span>
        <span class="relative inline-block">
            <button type="button" class="btn btn-sm btn-outline-secondary">Light</button>
            <div class="absolute top-full left-1/2 z-10 mt-2 max-w-[220px] -translate-x-1/2 rounded-md border border-border bg-popover px-2.5 py-1.5 text-xs font-medium text-popover-foreground shadow-lg">
                Claro
                <span class="absolute -top-1 left-1/2 size-2 -translate-x-1/2 rotate-45 border border-border bg-popover" aria-hidden="true"></span>
            </div>
        </span>
        <span class="relative inline-block">
            <button type="button" class="btn btn-sm btn-outline-success">Success</button>
            <div class="absolute top-full left-1/2 z-10 mt-2 max-w-[220px] -translate-x-1/2 rounded-md bg-success px-2.5 py-1.5 text-xs font-medium text-success-foreground shadow-lg">
                Sucesso
                <span class="absolute -top-1 left-1/2 size-2 -translate-x-1/2 rotate-45 bg-success" aria-hidden="true"></span>
            </div>
        </span>
        <span class="relative inline-block">
            <button type="button" class="btn btn-sm btn-outline-danger">Danger</button>
            <div class="absolute top-full left-1/2 z-10 mt-2 max-w-[220px] -translate-x-1/2 rounded-md bg-danger px-2.5 py-1.5 text-xs font-medium text-danger-foreground shadow-lg">
                Perigo
                <span class="absolute -top-1 left-1/2 size-2 -translate-x-1/2 rotate-45 bg-danger" aria-hidden="true"></span>
            </div>
        </span>
        HTML;

    $clickCode = <<<'BLADE'
        <x-ui.tooltip text="Apareceu ao clicar" on="click">
            <x-ui.button variant="soft" color="primary">Clique aqui</x-ui.button>
        </x-ui.tooltip>
        BLADE;

    $clickHtml = <<<'HTML'
        <span class="relative inline-block">
            <button type="button" class="btn btn-soft-primary">Clique aqui</button>
            <div class="absolute top-full left-1/2 z-10 mt-2 max-w-[220px] -translate-x-1/2 rounded-md bg-neutral-900 px-2.5 py-1.5 text-xs font-medium text-neutral-100 shadow-lg">
                Apareceu ao clicar
                <span class="absolute -top-1 left-1/2 size-2 -translate-x-1/2 rotate-45 bg-neutral-900" aria-hidden="true"></span>
            </div>
        </span>
        HTML;

    $htmlCode = <<<'BLADE'
        <x-ui.tooltip>
            <x-slot:content>
                <strong>Negrito</strong>, <em>itálico</em> e uma quebra<br>de linha.
            </x-slot:content>

            <x-ui.button variant="outline" color="secondary">Conteúdo rico</x-ui.button>
        </x-ui.tooltip>
        BLADE;

    $htmlHtml = <<<'HTML'
        <span class="relative inline-block">
            <button type="button" class="btn btn-outline-secondary">Conteúdo rico</button>
            <div class="absolute top-full left-1/2 z-10 mt-2 max-w-[220px] -translate-x-1/2 rounded-md bg-neutral-900 px-2.5 py-1.5 text-xs font-medium text-neutral-100 shadow-lg">
                <strong>Negrito</strong>, <em>itálico</em> e uma quebra<br>de linha.
                <span class="absolute -top-1 left-1/2 size-2 -translate-x-1/2 rotate-45 bg-neutral-900" aria-hidden="true"></span>
            </div>
        </span>
        HTML;

    $noArrowCode = <<<'BLADE'
        <x-ui.tooltip text="Sem seta" :arrow="false">
            <x-ui.button variant="outline" color="secondary">Sem seta</x-ui.button>
        </x-ui.tooltip>
        BLADE;

    $noArrowHtml = <<<'HTML'
        <span class="relative inline-block">
            <button type="button" class="btn btn-outline-secondary">Sem seta</button>
            <div class="absolute top-full left-1/2 z-10 mt-2 max-w-[220px] -translate-x-1/2 rounded-md bg-neutral-900 px-2.5 py-1.5 text-xs font-medium text-neutral-100 shadow-lg">
                Sem seta
            </div>
        </span>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.tooltip&gt;</code> envolve qualquer elemento e mostra uma dica curta ao
            passar o mouse (ou focar, para acessibilidade via teclado). Por padrão a direção é
            <code>auto</code> — mede o espaço disponível na tela antes de abrir e escolhe o lado que
            couber, mesma técnica do <code>&lt;x-ui.dropdown&gt;</code>. Suporta 4 direções fixas,
            cores, ativação por clique, conteúdo HTML e seta opcional.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                <code>text</code> define o conteúdo; sem <code>placement</code>, a direção é detectada automaticamente.
            </x-slot:description>
            <x-ui.tooltip text="Este é um tooltip">
                <x-ui.button variant="outline" color="secondary">Passe o mouse</x-ui.button>
            </x-ui.tooltip>
        </x-ui.example>

        <x-ui.example title="Direções" :code="$placementsCode" :html="$placementsHtml">
            <x-slot:description>
                <code>placement</code>: <code>auto</code> (padrão), <code>top</code>, <code>bottom</code>, <code>left</code>, <code>right</code>.
            </x-slot:description>
            <x-ui.tooltip text="Em cima" placement="top">
                <x-ui.button variant="outline" color="secondary" size="sm">Topo</x-ui.button>
            </x-ui.tooltip>
            <x-ui.tooltip text="Embaixo" placement="bottom">
                <x-ui.button variant="outline" color="secondary" size="sm">Base</x-ui.button>
            </x-ui.tooltip>
            <x-ui.tooltip text="À esquerda" placement="left">
                <x-ui.button variant="outline" color="secondary" size="sm">Esquerda</x-ui.button>
            </x-ui.tooltip>
            <x-ui.tooltip text="À direita" placement="right">
                <x-ui.button variant="outline" color="secondary" size="sm">Direita</x-ui.button>
            </x-ui.tooltip>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code>: <code>dark</code> (padrão, fixo independente do tema), <code>light</code>, ou qualquer token do tema.
            </x-slot:description>
            <x-ui.tooltip text="Escuro (padrão)" color="dark">
                <x-ui.button variant="outline" color="secondary" size="sm">Dark</x-ui.button>
            </x-ui.tooltip>
            <x-ui.tooltip text="Claro" color="light">
                <x-ui.button variant="outline" color="secondary" size="sm">Light</x-ui.button>
            </x-ui.tooltip>
            <x-ui.tooltip text="Sucesso" color="success">
                <x-ui.button variant="outline" color="success" size="sm">Success</x-ui.button>
            </x-ui.tooltip>
            <x-ui.tooltip text="Perigo" color="danger">
                <x-ui.button variant="outline" color="danger" size="sm">Danger</x-ui.button>
            </x-ui.tooltip>
        </x-ui.example>

        <x-ui.example title="Ativado por clique" :code="$clickCode" :html="$clickHtml">
            <x-slot:description>
                <code>on="click"</code> em vez do padrão <code>hover</code> (que também reage a foco/blur).
            </x-slot:description>
            <x-ui.tooltip text="Apareceu ao clicar" on="click">
                <x-ui.button variant="soft" color="primary">Clique aqui</x-ui.button>
            </x-ui.tooltip>
        </x-ui.example>

        <x-ui.example title="Conteúdo HTML" :code="$htmlCode" :html="$htmlHtml">
            <x-slot:description>
                O slot nomeado <code>content</code> aceita markup rico, em vez da prop <code>text</code> (texto simples).
            </x-slot:description>
            <x-ui.tooltip>
                <x-slot:content>
                    <strong>Negrito</strong>, <em>itálico</em> e uma quebra<br>de linha.
                </x-slot:content>

                <x-ui.button variant="outline" color="secondary">Conteúdo rico</x-ui.button>
            </x-ui.tooltip>
        </x-ui.example>

        <x-ui.example title="Sem seta" :code="$noArrowCode" :html="$noArrowHtml">
            <x-slot:description>
                <code>:arrow="false"</code> remove o indicador triangular.
            </x-slot:description>
            <x-ui.tooltip text="Sem seta" :arrow="false">
                <x-ui.button variant="outline" color="secondary">Sem seta</x-ui.button>
            </x-ui.tooltip>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="tooltip" />
</x-ui.docs>
