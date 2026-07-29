<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.popover title="Título do popover">
            <x-slot:trigger>
                <x-ui.button color="primary">Clique aqui</x-ui.button>
            </x-slot:trigger>

            Conteúdo do popover — qualquer markup pode entrar aqui.
        </x-ui.popover>
        BLADE;

    $placementsCode = <<<'BLADE'
        <x-ui.popover title="Em cima" placement="top">
            <x-slot:trigger><x-ui.button variant="outline" color="secondary" size="sm">Topo</x-ui.button></x-slot:trigger>
            Conteúdo do popover.
        </x-ui.popover>

        <x-ui.popover title="Embaixo" placement="bottom">
            <x-slot:trigger><x-ui.button variant="outline" color="secondary" size="sm">Base</x-ui.button></x-slot:trigger>
            Conteúdo do popover.
        </x-ui.popover>

        <x-ui.popover title="À esquerda" placement="left">
            <x-slot:trigger><x-ui.button variant="outline" color="secondary" size="sm">Esquerda</x-ui.button></x-slot:trigger>
            Conteúdo do popover.
        </x-ui.popover>

        <x-ui.popover title="À direita" placement="right">
            <x-slot:trigger><x-ui.button variant="outline" color="secondary" size="sm">Direita</x-ui.button></x-slot:trigger>
            Conteúdo do popover.
        </x-ui.popover>
        BLADE;

    $hoverCode = <<<'BLADE'
        <x-ui.popover title="Detalhes" on="hover" :closeButton="false">
            <x-slot:trigger>
                <i class="bi bi-info-circle text-lg text-muted-foreground"></i>
            </x-slot:trigger>

            Aparece ao passar o mouse e some ao tirar — sem botão de fechar.
        </x-ui.popover>
        BLADE;

    $coloredCode = <<<'BLADE'
        <x-ui.popover title="Atenção" color="warning">
            <x-slot:trigger>
                <x-ui.button variant="soft" color="warning" icon="bi-exclamation-triangle">Aviso</x-ui.button>
            </x-slot:trigger>

            Esta ação não pode ser desfeita.
        </x-ui.popover>
        BLADE;

    $noArrowCode = <<<'BLADE'
        <x-ui.popover title="Sem seta" :arrow="false">
            <x-slot:trigger><x-ui.button variant="outline" color="secondary">Abrir</x-ui.button></x-slot:trigger>
            Conteúdo do popover.
        </x-ui.popover>
        BLADE;

    $richCode = <<<'BLADE'
        <x-ui.popover title="Filtrar por status" color="primary">
            <x-slot:trigger>
                <x-ui.button icon="bi-funnel" variant="soft" color="primary">Filtros</x-ui.button>
            </x-slot:trigger>

            <div class="flex flex-col gap-2">
                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox" checked> Ativos
                </label>
                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox"> Arquivados
                </label>
                <x-ui.button size="sm" color="primary" class="mt-2 justify-center">Aplicar</x-ui.button>
            </div>
        </x-ui.popover>
        BLADE;

    $basicHtml = <<<'HTML'
        <div class="inline-block">
            <button type="button" class="btn btn-primary">Clique aqui</button>
        </div>

        <!-- painel teleportado para o fim do <body>, oculto (x-cloak) até o clique no trigger -->
        <div role="dialog" class="z-[110] w-72 rounded-md border border-border bg-popover text-popover-foreground shadow-lg">
            <div class="flex items-center justify-between gap-3 rounded-t-md border-b border-border px-4 py-2.5 text-popover-foreground">
                <h6 class="m-0 text-sm font-semibold">Título do popover</h6>
                <button type="button" class="btn-icon -mr-1 size-6 shrink-0" aria-label="Fechar">
                    <i class="bi bi-x text-sm leading-none"></i>
                </button>
            </div>
            <div class="px-4 py-3 text-sm">
                Conteúdo do popover — qualquer markup pode entrar aqui.
            </div>
            <!-- seta (arrow): span 12x12 rotacionado 45°, posicionado conforme o placement resolvido -->
            <span class="absolute size-3 rotate-45 bg-popover border border-border -bottom-1.5 left-1/2 -translate-x-1/2 border-t-0 border-l-0" aria-hidden="true"></span>
        </div>
        HTML;

    $placementsHtml = <<<'HTML'
        <div class="inline-block"><button type="button" class="btn btn-outline-secondary btn-sm">Topo</button></div>
        <div class="inline-block"><button type="button" class="btn btn-outline-secondary btn-sm">Base</button></div>
        <div class="inline-block"><button type="button" class="btn btn-outline-secondary btn-sm">Esquerda</button></div>
        <div class="inline-block"><button type="button" class="btn btn-outline-secondary btn-sm">Direita</button></div>

        <!-- painel (exemplo placement="top"): a seta muda de lado conforme resolvedPlacement -->
        <div role="dialog" class="z-[110] w-72 rounded-md border border-border bg-popover text-popover-foreground shadow-lg">
            <div class="flex items-center justify-between gap-3 rounded-t-md border-b border-border px-4 py-2.5 text-popover-foreground">
                <h6 class="m-0 text-sm font-semibold">Em cima</h6>
                <button type="button" class="btn-icon -mr-1 size-6 shrink-0" aria-label="Fechar"><i class="bi bi-x text-sm leading-none"></i></button>
            </div>
            <div class="px-4 py-3 text-sm">Conteúdo do popover.</div>
            <span class="absolute size-3 rotate-45 bg-popover border border-border -bottom-1.5 left-1/2 -translate-x-1/2 border-t-0 border-l-0" aria-hidden="true"></span>
        </div>
        HTML;

    $hoverHtml = <<<'HTML'
        <div class="inline-block">
            <i class="bi bi-info-circle text-lg text-muted-foreground"></i>
        </div>

        <!-- on="hover": o painel abre no mouseenter do trigger e fecha no mouseleave -->
        <div role="dialog" class="z-[110] w-72 rounded-md border border-border bg-popover text-popover-foreground shadow-lg">
            <div class="flex items-center justify-between gap-3 rounded-t-md border-b border-border px-4 py-2.5 text-popover-foreground">
                <h6 class="m-0 text-sm font-semibold">Detalhes</h6>
                <!-- :closeButton="false": sem botão de fechar -->
            </div>
            <div class="px-4 py-3 text-sm">
                Aparece ao passar o mouse e some ao tirar — sem botão de fechar.
            </div>
            <span class="absolute size-3 rotate-45 bg-popover border border-border -bottom-1.5 left-1/2 -translate-x-1/2 border-t-0 border-l-0" aria-hidden="true"></span>
        </div>
        HTML;

    $coloredHtml = <<<'HTML'
        <div class="inline-block">
            <button type="button" class="btn btn-soft-warning">
                <i class="bi bi-exclamation-triangle shrink-0 leading-none"></i>
                <span>Aviso</span>
            </button>
        </div>

        <!-- color="warning": cabeçalho tingido com o token -->
        <div role="dialog" class="z-[110] w-72 rounded-md border border-border bg-popover text-popover-foreground shadow-lg">
            <div class="flex items-center justify-between gap-3 rounded-t-md border-b border-border px-4 py-2.5 bg-warning text-warning-foreground">
                <h6 class="m-0 text-sm font-semibold">Atenção</h6>
                <button type="button" class="btn-icon -mr-1 size-6 shrink-0" aria-label="Fechar"><i class="bi bi-x text-sm leading-none"></i></button>
            </div>
            <div class="px-4 py-3 text-sm">
                Esta ação não pode ser desfeita.
            </div>
            <!-- se resolvedPlacement for "bottom", a seta usa "bg-warning" (sem borda) para casar com o header -->
            <span class="absolute size-3 rotate-45 bg-popover border border-border -bottom-1.5 left-1/2 -translate-x-1/2 border-t-0 border-l-0" aria-hidden="true"></span>
        </div>
        HTML;

    $noArrowHtml = <<<'HTML'
        <div class="inline-block">
            <button type="button" class="btn btn-outline-secondary">Abrir</button>
        </div>

        <!-- :arrow="false": sem o <span> triangular -->
        <div role="dialog" class="z-[110] w-72 rounded-md border border-border bg-popover text-popover-foreground shadow-lg">
            <div class="flex items-center justify-between gap-3 rounded-t-md border-b border-border px-4 py-2.5 text-popover-foreground">
                <h6 class="m-0 text-sm font-semibold">Sem seta</h6>
                <button type="button" class="btn-icon -mr-1 size-6 shrink-0" aria-label="Fechar"><i class="bi bi-x text-sm leading-none"></i></button>
            </div>
            <div class="px-4 py-3 text-sm">Conteúdo do popover.</div>
        </div>
        HTML;

    $richHtml = <<<'HTML'
        <div class="inline-block">
            <button type="button" class="btn btn-soft-primary">
                <i class="bi bi-funnel shrink-0 leading-none"></i>
                <span>Filtros</span>
            </button>
        </div>

        <div role="dialog" class="z-[110] w-72 rounded-md border border-border bg-popover text-popover-foreground shadow-lg">
            <div class="flex items-center justify-between gap-3 rounded-t-md border-b border-border px-4 py-2.5 bg-primary text-primary-foreground">
                <h6 class="m-0 text-sm font-semibold">Filtrar por status</h6>
                <button type="button" class="btn-icon -mr-1 size-6 shrink-0" aria-label="Fechar"><i class="bi bi-x text-sm leading-none"></i></button>
            </div>
            <div class="px-4 py-3 text-sm">
                <div class="flex flex-col gap-2">
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" checked> Ativos
                    </label>
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox"> Arquivados
                    </label>
                    <button type="button" class="btn btn-sm btn-primary mt-2 justify-center">Aplicar</button>
                </div>
            </div>
            <span class="absolute size-3 rotate-45 bg-popover border border-border -bottom-1.5 left-1/2 -translate-x-1/2 border-t-0 border-l-0" aria-hidden="true"></span>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.popover&gt;</code> é como o <code>&lt;x-ui.tooltip&gt;</code>, mas para
            conteúdo mais rico: título, corpo com qualquer markup, botão de fechar e ativação por
            clique (padrão) ou hover. O slot <code>trigger</code> define o elemento que abre o
            popover. Direção <code>auto</code> (padrão) detecta o espaço disponível, igual ao
            tooltip/dropdown.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                <code>title</code> + slot padrão (corpo) + slot <code>trigger</code> (o que abre o popover).
            </x-slot:description>
            <x-ui.popover title="Título do popover">
                <x-slot:trigger>
                    <x-ui.button color="primary">Clique aqui</x-ui.button>
                </x-slot:trigger>

                Conteúdo do popover — qualquer markup pode entrar aqui.
            </x-ui.popover>
        </x-ui.example>

        <x-ui.example title="Direções" :code="$placementsCode" :html="$placementsHtml">
            <x-slot:description>
                <code>placement</code>: <code>auto</code> (padrão), <code>top</code>, <code>bottom</code>, <code>left</code>, <code>right</code>.
            </x-slot:description>
            <x-ui.popover title="Em cima" placement="top">
                <x-slot:trigger><x-ui.button variant="outline" color="secondary" size="sm">Topo</x-ui.button></x-slot:trigger>
                Conteúdo do popover.
            </x-ui.popover>

            <x-ui.popover title="Embaixo" placement="bottom">
                <x-slot:trigger><x-ui.button variant="outline" color="secondary" size="sm">Base</x-ui.button></x-slot:trigger>
                Conteúdo do popover.
            </x-ui.popover>

            <x-ui.popover title="À esquerda" placement="left">
                <x-slot:trigger><x-ui.button variant="outline" color="secondary" size="sm">Esquerda</x-ui.button></x-slot:trigger>
                Conteúdo do popover.
            </x-ui.popover>

            <x-ui.popover title="À direita" placement="right">
                <x-slot:trigger><x-ui.button variant="outline" color="secondary" size="sm">Direita</x-ui.button></x-slot:trigger>
                Conteúdo do popover.
            </x-ui.popover>
        </x-ui.example>

        <x-ui.example title="Ativado por hover, sem botão de fechar" :code="$hoverCode" :html="$hoverHtml">
            <x-slot:description>
                <code>on="hover"</code> + <code>:closeButton="false"</code> — bom para um ícone de "info" discreto.
            </x-slot:description>
            <x-ui.popover title="Detalhes" on="hover" :closeButton="false">
                <x-slot:trigger>
                    <i class="bi bi-info-circle text-lg text-muted-foreground"></i>
                </x-slot:trigger>

                Aparece ao passar o mouse e some ao tirar — sem botão de fechar.
            </x-ui.popover>
        </x-ui.example>

        <x-ui.example title="Cabeçalho colorido" :code="$coloredCode" :html="$coloredHtml">
            <x-slot:description>
                <code>color</code> tinge o cabeçalho do popover com um token do tema.
            </x-slot:description>
            <x-ui.popover title="Atenção" color="warning">
                <x-slot:trigger>
                    <x-ui.button variant="soft" color="warning" icon="bi-exclamation-triangle">Aviso</x-ui.button>
                </x-slot:trigger>

                Esta ação não pode ser desfeita.
            </x-ui.popover>
        </x-ui.example>

        <x-ui.example title="Sem seta" :code="$noArrowCode" :html="$noArrowHtml">
            <x-slot:description>
                <code>:arrow="false"</code> remove o indicador triangular.
            </x-slot:description>
            <x-ui.popover title="Sem seta" :arrow="false">
                <x-slot:trigger><x-ui.button variant="outline" color="secondary">Abrir</x-ui.button></x-slot:trigger>
                Conteúdo do popover.
            </x-ui.popover>
        </x-ui.example>

        <x-ui.example title="Conteúdo rico" :code="$richCode" :html="$richHtml">
            <x-slot:description>
                O corpo aceita qualquer markup — aqui, um pequeno formulário de filtros.
            </x-slot:description>
            <x-ui.popover title="Filtrar por status" color="primary">
                <x-slot:trigger>
                    <x-ui.button icon="bi-funnel" variant="soft" color="primary">Filtros</x-ui.button>
                </x-slot:trigger>

                <div class="flex flex-col gap-2">
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox" checked> Ativos
                    </label>
                    <label class="flex items-center gap-2 text-sm">
                        <input type="checkbox"> Arquivados
                    </label>
                    <x-ui.button size="sm" color="primary" class="mt-2 justify-center">Aplicar</x-ui.button>
                </div>
            </x-ui.popover>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="popover" />
</x-ui.docs>
