<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $roundCode = <<<'BLADE'
        <div class="relative rounded-md border border-border bg-card p-4 pt-5">
            <x-ui.ribbon shape="round" color="primary">20%</x-ui.ribbon>
            <p class="mb-0 text-sm text-muted-foreground">Desconto aplicado no checkout.</p>
        </div>

        <div class="relative rounded-md border border-border bg-card p-4 pt-5">
            <x-ui.ribbon shape="round" color="success" position="right">Novo</x-ui.ribbon>
            <p class="mb-0 text-sm text-muted-foreground">Produto recém-lançado.</p>
        </div>
        BLADE;

    $ribbonCode = <<<'BLADE'
        <div class="relative rounded-md border border-border bg-card py-4 pe-4 ps-11">
            <x-ui.ribbon shape="ribbon" color="danger">Sale</x-ui.ribbon>
            <p class="mb-0 text-sm font-medium text-foreground">Camiseta dry-fit</p>
            <p class="mb-0 text-sm text-muted-foreground">R$ 89,90</p>
        </div>

        <div class="relative rounded-md border border-border bg-card py-4 pe-11 ps-4">
            <x-ui.ribbon shape="ribbon" color="info" position="right">Novo</x-ui.ribbon>
            <p class="mb-0 text-sm font-medium text-foreground">Tênis runner</p>
            <p class="mb-0 text-sm text-muted-foreground">R$ 249,90</p>
        </div>
        BLADE;

    $diagonalCode = <<<'BLADE'
        <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-10">
            <x-ui.ribbon shape="diagonal" color="success">Sale</x-ui.ribbon>
            <p class="mb-0 text-sm font-medium text-foreground">Kit inicial</p>
            <p class="mb-0 text-sm text-muted-foreground">Oferta por tempo limitado.</p>
        </div>

        <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-10">
            <x-ui.ribbon shape="diagonal" color="warning" position="right">Novo</x-ui.ribbon>
            <p class="mb-0 text-sm font-medium text-foreground">Coleção verão</p>
            <p class="mb-0 text-sm text-muted-foreground">Acabou de chegar.</p>
        </div>
        BLADE;

    $boxCode = <<<'BLADE'
        <div class="relative rounded-md border border-border bg-card p-4 pt-11">
            <x-ui.ribbon shape="box" color="primary">Básico</x-ui.ribbon>
            <p class="mb-0 text-sm text-muted-foreground">Para começar com o essencial.</p>
        </div>

        <div class="relative rounded-md border border-border bg-card p-4 pt-11">
            <x-ui.ribbon shape="box" color="secondary">Padrão</x-ui.ribbon>
            <p class="mb-0 text-sm text-muted-foreground">Recursos para o dia a dia.</p>
        </div>

        <div class="relative rounded-md border border-border bg-card p-4 pt-11">
            <x-ui.ribbon shape="box" color="success">Premium</x-ui.ribbon>
            <p class="mb-0 text-sm text-muted-foreground">Tudo liberado, sem limites.</p>
        </div>
        BLADE;

    $softCode = <<<'BLADE'
        <div class="relative rounded-md border border-border bg-card p-4 pt-11">
            <x-ui.ribbon shape="box" color="primary" variant="soft">Beta</x-ui.ribbon>
            <p class="mb-0 text-sm text-muted-foreground">Destaque suave, sem competir com o conteúdo.</p>
        </div>

        <div class="relative rounded-md border border-border bg-card py-4 pe-4 ps-11">
            <x-ui.ribbon shape="ribbon" color="warning" variant="soft">Hot</x-ui.ribbon>
            <p class="mb-0 text-sm text-muted-foreground">Bandeira soft no canto.</p>
        </div>
        BLADE;

    $cornerCode = <<<'BLADE'
        <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-8 ps-8">
            <x-ui.ribbon shape="corner" color="warning" icon="bi-star-fill" />
            <p class="mb-0 text-sm text-muted-foreground">Favorito da comunidade.</p>
        </div>

        <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-8 pe-8">
            <x-ui.ribbon shape="corner" color="danger" icon="bi-fire" position="right" />
            <p class="mb-0 text-sm text-muted-foreground">Em alta esta semana.</p>
        </div>
        BLADE;

    $iconCode = <<<'BLADE'
        <div class="relative rounded-md border border-border bg-card p-4 pt-11">
            <x-ui.ribbon shape="box" color="info" icon="bi-percent">20% off</x-ui.ribbon>
            <p class="mb-0 text-sm text-muted-foreground">Cupom aplicado automaticamente.</p>
        </div>

        <div class="relative rounded-md border border-border bg-card p-4 pt-5">
            <x-ui.ribbon shape="round" color="warning" icon="bi-star-fill" size="sm" />
            <p class="mb-0 text-sm text-muted-foreground">Só ícone no selo redondo.</p>
        </div>
        BLADE;

    $hoverCode = <<<'BLADE'
        <div class="group relative overflow-hidden rounded-md border border-border bg-card p-4 pt-10">
            <x-ui.ribbon shape="diagonal" color="danger" hover>-15%</x-ui.ribbon>
            <p class="mb-0 text-sm font-medium text-foreground">Passe o mouse no card</p>
            <p class="mb-0 text-sm text-muted-foreground">O ribbon ganha opacidade total no hover.</p>
        </div>
        BLADE;

    $sizesCode = <<<'BLADE'
        <div class="relative rounded-md border border-border bg-card p-4 pt-10">
            <x-ui.ribbon shape="box" color="primary" size="sm">SM</x-ui.ribbon>
            <p class="mb-0 text-sm text-muted-foreground">Tamanho pequeno.</p>
        </div>

        <div class="relative rounded-md border border-border bg-card p-4 pt-11">
            <x-ui.ribbon shape="box" color="primary" size="md">MD</x-ui.ribbon>
            <p class="mb-0 text-sm text-muted-foreground">Tamanho médio (padrão).</p>
        </div>
        BLADE;

    $cardCode = <<<'BLADE'
        <x-ui.card class="relative overflow-hidden" bodyClass="pt-10">
            <x-ui.ribbon shape="diagonal" color="danger">-30%</x-ui.ribbon>

            <p class="mb-2 text-xs font-medium tracking-wide text-muted-foreground uppercase">Plano anual</p>
            <p class="mb-1 text-2xl font-semibold text-card-foreground">
                R$ 299<span class="text-sm font-normal text-muted-foreground">/ano</span>
            </p>
            <p class="mb-4 text-sm text-muted-foreground">Economize 30% pagando anualmente.</p>
            <x-ui.button color="primary" size="sm" block>Assinar agora</x-ui.button>
        </x-ui.card>

        <x-ui.card class="relative" bodyClass="ps-11">
            <x-ui.ribbon shape="ribbon" color="success" variant="soft">Pro</x-ui.ribbon>

            <p class="mb-1 text-sm font-medium text-card-foreground">Workspace Pro</p>
            <p class="mb-0 text-sm text-muted-foreground">Projetos ilimitados e suporte prioritário.</p>
        </x-ui.card>
        BLADE;

    $roundHtml = <<<'HTML'
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="relative rounded-md border border-border bg-card p-4 pt-5">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-primary text-primary-foreground absolute -top-2.5 -left-2.5 flex size-11 items-center justify-center rounded-full shadow-sm text-[11px]">
                    <span class="leading-none">20%</span>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Desconto aplicado no checkout.</p>
            </div>

            <div class="relative rounded-md border border-border bg-card p-4 pt-5">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-success text-success-foreground absolute -top-2.5 -right-2.5 flex size-11 items-center justify-center rounded-full shadow-sm text-[11px]">
                    <span class="leading-none">Novo</span>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Produto recém-lançado.</p>
            </div>
        </div>
        HTML;

    $ribbonHtml = <<<'HTML'
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="relative rounded-md border border-border bg-card py-4 pe-4 ps-11">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-danger text-danger-foreground absolute top-0 left-3 inline-flex items-center justify-center gap-1 px-1.5 py-2.5 shadow-sm [clip-path:polygon(0_0,100%_0,100%_calc(100%-8px),50%_100%,0_calc(100%-8px))] [writing-mode:vertical-rl] [transform:rotate(180deg)] text-[11px]">
                    <span class="leading-none">Sale</span>
                </div>
                <p class="mb-0 text-sm font-medium text-foreground">Camiseta dry-fit</p>
                <p class="mb-0 text-sm text-muted-foreground">R$ 89,90</p>
            </div>

            <div class="relative rounded-md border border-border bg-card py-4 pe-11 ps-4">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-info text-info-foreground absolute top-0 right-3 inline-flex items-center justify-center gap-1 px-1.5 py-2.5 shadow-sm [clip-path:polygon(0_0,100%_0,100%_calc(100%-8px),50%_100%,0_calc(100%-8px))] [writing-mode:vertical-rl] text-[11px]">
                    <span class="leading-none">Novo</span>
                </div>
                <p class="mb-0 text-sm font-medium text-foreground">Tênis runner</p>
                <p class="mb-0 text-sm text-muted-foreground">R$ 249,90</p>
            </div>
        </div>
        HTML;

    $diagonalHtml = <<<'HTML'
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-10">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-success text-success-foreground absolute top-3.5 -left-8 w-32 -rotate-45 py-0.5 text-center shadow-sm text-[11px]">
                    <span class="leading-none">Sale</span>
                </div>
                <p class="mb-0 text-sm font-medium text-foreground">Kit inicial</p>
                <p class="mb-0 text-sm text-muted-foreground">Oferta por tempo limitado.</p>
            </div>

            <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-10">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-warning text-warning-foreground absolute top-3.5 -right-8 w-32 rotate-45 py-0.5 text-center shadow-sm text-[11px]">
                    <span class="leading-none">Novo</span>
                </div>
                <p class="mb-0 text-sm font-medium text-foreground">Coleção verão</p>
                <p class="mb-0 text-sm text-muted-foreground">Acabou de chegar.</p>
            </div>
        </div>
        HTML;

    $boxHtml = <<<'HTML'
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-primary text-primary-foreground absolute top-3 left-0 inline-flex items-center gap-1 rounded-r-md px-2.5 py-1 shadow-sm text-[11px]">
                    <span class="leading-none">Básico</span>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Para começar com o essencial.</p>
            </div>

            <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-secondary text-secondary-foreground absolute top-3 left-0 inline-flex items-center gap-1 rounded-r-md px-2.5 py-1 shadow-sm text-[11px]">
                    <span class="leading-none">Padrão</span>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Recursos para o dia a dia.</p>
            </div>

            <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-success text-success-foreground absolute top-3 left-0 inline-flex items-center gap-1 rounded-r-md px-2.5 py-1 shadow-sm text-[11px]">
                    <span class="leading-none">Premium</span>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Tudo liberado, sem limites.</p>
            </div>
        </div>
        HTML;

    $softHtml = <<<'HTML'
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase border border-primary/25 bg-primary/15 text-primary absolute top-3 left-0 inline-flex items-center gap-1 rounded-r-md px-2.5 py-1 shadow-sm text-[11px]">
                    <span class="leading-none">Beta</span>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Destaque suave, sem competir com o conteúdo.</p>
            </div>

            <div class="relative rounded-md border border-border bg-card py-4 pe-4 ps-11">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase border border-warning/25 bg-warning/15 text-warning absolute top-0 left-3 inline-flex items-center justify-center gap-1 px-1.5 py-2.5 shadow-sm [clip-path:polygon(0_0,100%_0,100%_calc(100%-8px),50%_100%,0_calc(100%-8px))] [writing-mode:vertical-rl] [transform:rotate(180deg)] text-[11px]">
                    <span class="leading-none">Hot</span>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Bandeira soft no canto.</p>
            </div>
        </div>
        HTML;

    $cornerHtml = <<<'HTML'
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-8 ps-8">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-warning text-warning-foreground absolute top-0 left-0 flex size-12 items-start justify-start pt-1.5 pl-1.5 [clip-path:polygon(0_0,100%_0,0_100%)] text-[11px]">
                    <i class="bi bi-star-fill shrink-0 leading-none text-xs" aria-hidden="true"></i>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Favorito da comunidade.</p>
            </div>

            <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-8 pe-8">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-danger text-danger-foreground absolute top-0 right-0 flex size-12 items-start justify-end pt-1.5 pr-1.5 [clip-path:polygon(100%_0,100%_100%,0_0)] text-[11px]">
                    <i class="bi bi-fire shrink-0 leading-none text-xs" aria-hidden="true"></i>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Em alta esta semana.</p>
            </div>
        </div>
        HTML;

    $iconHtml = <<<'HTML'
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-info text-info-foreground absolute top-3 left-0 inline-flex items-center gap-1 rounded-r-md px-2.5 py-1 shadow-sm text-[11px]">
                    <i class="bi bi-percent shrink-0 leading-none text-xs" aria-hidden="true"></i>
                    <span class="leading-none">20% off</span>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Cupom aplicado automaticamente.</p>
            </div>

            <div class="relative rounded-md border border-border bg-card p-4 pt-5">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-warning text-warning-foreground absolute -top-2 -left-2 flex size-9 items-center justify-center rounded-full shadow-sm text-[10px]">
                    <i class="bi bi-star-fill shrink-0 leading-none text-[10px]" aria-hidden="true"></i>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Só ícone no selo redondo.</p>
            </div>
        </div>
        HTML;

    $hoverHtml = <<<'HTML'
        <div class="group relative w-full overflow-hidden rounded-md border border-border bg-card p-4 pt-10">
            <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-danger text-danger-foreground absolute top-3.5 -left-8 w-32 -rotate-45 py-0.5 text-center shadow-sm text-[11px] opacity-60 transition-opacity duration-200 group-hover:opacity-100">
                <span class="leading-none">-15%</span>
            </div>
            <p class="mb-0 text-sm font-medium text-foreground">Passe o mouse no card</p>
            <p class="mb-0 text-sm text-muted-foreground">O ribbon ganha opacidade total no hover.</p>
        </div>
        HTML;

    $sizesHtml = <<<'HTML'
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="relative rounded-md border border-border bg-card p-4 pt-10">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-primary text-primary-foreground absolute top-2.5 left-0 inline-flex items-center gap-1 rounded-r-md px-2 py-0.5 shadow-sm text-[10px]">
                    <span class="leading-none">SM</span>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Tamanho pequeno.</p>
            </div>

            <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-primary text-primary-foreground absolute top-3 left-0 inline-flex items-center gap-1 rounded-r-md px-2.5 py-1 shadow-sm text-[11px]">
                    <span class="leading-none">MD</span>
                </div>
                <p class="mb-0 text-sm text-muted-foreground">Tamanho médio (padrão).</p>
            </div>
        </div>
        HTML;

    $cardHtml = <<<'HTML'
        <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="card relative overflow-hidden">
                <div class="card-body pt-10">
                    <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase bg-danger text-danger-foreground absolute top-3.5 -left-8 w-32 -rotate-45 py-0.5 text-center shadow-sm text-[11px]">
                        <span class="leading-none">-30%</span>
                    </div>

                    <p class="mb-2 text-xs font-medium tracking-wide text-muted-foreground uppercase">Plano anual</p>
                    <p class="mb-1 text-2xl font-semibold text-card-foreground">
                        R$ 299<span class="text-sm font-normal text-muted-foreground">/ano</span>
                    </p>
                    <p class="mb-4 text-sm text-muted-foreground">Economize 30% pagando anualmente.</p>
                    <button type="button" class="btn btn-sm btn-primary w-full justify-center">Assinar agora</button>
                </div>
            </div>

            <div class="card relative">
                <div class="card-body ps-11">
                    <div class="pointer-events-none z-10 font-semibold tracking-wide uppercase border border-success/25 bg-success/15 text-success absolute top-0 left-3 inline-flex items-center justify-center gap-1 px-1.5 py-2.5 shadow-sm [clip-path:polygon(0_0,100%_0,100%_calc(100%-8px),50%_100%,0_calc(100%-8px))] [writing-mode:vertical-rl] [transform:rotate(180deg)] text-[11px]">
                        <span class="leading-none">Pro</span>
                    </div>

                    <p class="mb-1 text-sm font-medium text-card-foreground">Workspace Pro</p>
                    <p class="mb-0 text-sm text-muted-foreground">Projetos ilimitados e suporte prioritário.</p>
                </div>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.ribbon&gt;</code> é um selo no canto de um bloco (<code>relative</code> no pai).
            Como fica <code>absolute</code>, reserve espaço no conteúdo (<code>pt-*</code>, <code>ps-*</code>)
            para não encobrir o texto. Use <code>overflow-hidden</code> com
            <code>diagonal</code>/<code>corner</code>. Formas: ribbon, round, box, diagonal, corner —
            com <code>solid</code> ou <code>soft</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Redondo" :code="$roundCode" :html="$roundHtml">
            <x-slot:description>
                <code>shape="round"</code> — selo compacto no canto. O pai pode ter pouco padding; o círculo fica parcialmente para fora.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative rounded-md border border-border bg-card p-4 pt-5">
                    <x-ui.ribbon shape="round" color="primary">20%</x-ui.ribbon>
                    <p class="mb-0 text-sm text-muted-foreground">Desconto aplicado no checkout.</p>
                </div>

                <div class="relative rounded-md border border-border bg-card p-4 pt-5">
                    <x-ui.ribbon shape="round" color="success" position="right">Novo</x-ui.ribbon>
                    <p class="mb-0 text-sm text-muted-foreground">Produto recém-lançado.</p>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Bandeira (ribbon)" :code="$ribbonCode" :html="$ribbonHtml">
            <x-slot:description>
                <code>shape="ribbon"</code> — faixa vertical com ponta recortada. Reserve <code>ps-11</code> / <code>pe-11</code> no conteúdo.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative rounded-md border border-border bg-card py-4 pe-4 ps-11">
                    <x-ui.ribbon shape="ribbon" color="danger">Sale</x-ui.ribbon>
                    <p class="mb-0 text-sm font-medium text-foreground">Camiseta dry-fit</p>
                    <p class="mb-0 text-sm text-muted-foreground">R$ 89,90</p>
                </div>

                <div class="relative rounded-md border border-border bg-card py-4 pe-11 ps-4">
                    <x-ui.ribbon shape="ribbon" color="info" position="right">Novo</x-ui.ribbon>
                    <p class="mb-0 text-sm font-medium text-foreground">Tênis runner</p>
                    <p class="mb-0 text-sm text-muted-foreground">R$ 249,90</p>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Diagonal" :code="$diagonalCode" :html="$diagonalHtml">
            <x-slot:description>
                <code>shape="diagonal"</code> — faixa no canto. Exige <code>overflow-hidden</code> e um pouco de <code>pt-10</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-10">
                    <x-ui.ribbon shape="diagonal" color="success">Sale</x-ui.ribbon>
                    <p class="mb-0 text-sm font-medium text-foreground">Kit inicial</p>
                    <p class="mb-0 text-sm text-muted-foreground">Oferta por tempo limitado.</p>
                </div>

                <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-10">
                    <x-ui.ribbon shape="diagonal" color="warning" position="right">Novo</x-ui.ribbon>
                    <p class="mb-0 text-sm font-medium text-foreground">Coleção verão</p>
                    <p class="mb-0 text-sm text-muted-foreground">Acabou de chegar.</p>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Caixa (boxed)" :code="$boxCode" :html="$boxHtml">
            <x-slot:description>
                <code>shape="box"</code> — etiqueta na borda. Use <code>pt-11</code> para o texto começar abaixo dela.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                    <x-ui.ribbon shape="box" color="primary">Básico</x-ui.ribbon>
                    <p class="mb-0 text-sm text-muted-foreground">Para começar com o essencial.</p>
                </div>

                <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                    <x-ui.ribbon shape="box" color="secondary">Padrão</x-ui.ribbon>
                    <p class="mb-0 text-sm text-muted-foreground">Recursos para o dia a dia.</p>
                </div>

                <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                    <x-ui.ribbon shape="box" color="success">Premium</x-ui.ribbon>
                    <p class="mb-0 text-sm text-muted-foreground">Tudo liberado, sem limites.</p>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Soft" :code="$softCode" :html="$softHtml">
            <x-slot:description>
                <code>variant="soft"</code> — fundo suave, menos agressivo que o solid.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                    <x-ui.ribbon shape="box" color="primary" variant="soft">Beta</x-ui.ribbon>
                    <p class="mb-0 text-sm text-muted-foreground">Destaque suave, sem competir com o conteúdo.</p>
                </div>

                <div class="relative rounded-md border border-border bg-card py-4 pe-4 ps-11">
                    <x-ui.ribbon shape="ribbon" color="warning" variant="soft">Hot</x-ui.ribbon>
                    <p class="mb-0 text-sm text-muted-foreground">Bandeira soft no canto.</p>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Canto (triângulo)" :code="$cornerCode" :html="$cornerHtml">
            <x-slot:description>
                <code>shape="corner"</code> — triângulo só com ícone. Reserve um pouco de padding no canto.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-8 ps-8">
                    <x-ui.ribbon shape="corner" color="warning" icon="bi-star-fill" />
                    <p class="mb-0 text-sm text-muted-foreground">Favorito da comunidade.</p>
                </div>

                <div class="relative overflow-hidden rounded-md border border-border bg-card p-4 pt-8 pe-8">
                    <x-ui.ribbon shape="corner" color="danger" icon="bi-fire" position="right" />
                    <p class="mb-0 text-sm text-muted-foreground">Em alta esta semana.</p>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Com ícone" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                Prop <code>icon</code> em qualquer forma (em <code>corner</code>, use só o ícone).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                    <x-ui.ribbon shape="box" color="info" icon="bi-percent">20% off</x-ui.ribbon>
                    <p class="mb-0 text-sm text-muted-foreground">Cupom aplicado automaticamente.</p>
                </div>

                <div class="relative rounded-md border border-border bg-card p-4 pt-5">
                    <x-ui.ribbon shape="round" color="warning" icon="bi-star-fill" size="sm" />
                    <p class="mb-0 text-sm text-muted-foreground">Só ícone no selo redondo.</p>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Hover" :code="$hoverCode" :html="$hoverHtml">
            <x-slot:description>
                <code>hover</code> + <code>group</code> no pai: ribbon discreto até o mouse entrar.
            </x-slot:description>
            <div class="group relative w-full overflow-hidden rounded-md border border-border bg-card p-4 pt-10">
                <x-ui.ribbon shape="diagonal" color="danger" hover>-15%</x-ui.ribbon>
                <p class="mb-0 text-sm font-medium text-foreground">Passe o mouse no card</p>
                <p class="mb-0 text-sm text-muted-foreground">O ribbon ganha opacidade total no hover.</p>
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size="sm"</code> ou <code>md</code> — ajusta texto e dimensões da forma.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="relative rounded-md border border-border bg-card p-4 pt-10">
                    <x-ui.ribbon shape="box" color="primary" size="sm">SM</x-ui.ribbon>
                    <p class="mb-0 text-sm text-muted-foreground">Tamanho pequeno.</p>
                </div>

                <div class="relative rounded-md border border-border bg-card p-4 pt-11">
                    <x-ui.ribbon shape="box" color="primary" size="md">MD</x-ui.ribbon>
                    <p class="mb-0 text-sm text-muted-foreground">Tamanho médio (padrão).</p>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Em cards reais" :code="$cardCode" :html="$cardHtml">
            <x-slot:description>
                Composição com <code>&lt;x-ui.card&gt;</code>: use <code>bodyClass</code> para o clearance (<code>pt-10</code>, <code>ps-11</code>).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
                <x-ui.card class="relative overflow-hidden" bodyClass="pt-10">
                    <x-ui.ribbon shape="diagonal" color="danger">-30%</x-ui.ribbon>

                    <p class="mb-2 text-xs font-medium tracking-wide text-muted-foreground uppercase">Plano anual</p>
                    <p class="mb-1 text-2xl font-semibold text-card-foreground">
                        R$ 299<span class="text-sm font-normal text-muted-foreground">/ano</span>
                    </p>
                    <p class="mb-4 text-sm text-muted-foreground">Economize 30% pagando anualmente.</p>
                    <x-ui.button color="primary" size="sm" block>Assinar agora</x-ui.button>
                </x-ui.card>

                <x-ui.card class="relative" bodyClass="ps-11">
                    <x-ui.ribbon shape="ribbon" color="success" variant="soft">Pro</x-ui.ribbon>

                    <p class="mb-1 text-sm font-medium text-card-foreground">Workspace Pro</p>
                    <p class="mb-0 text-sm text-muted-foreground">Projetos ilimitados e suporte prioritário.</p>
                </x-ui.card>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="ribbon" />
</x-ui.docs>
