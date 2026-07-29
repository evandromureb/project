<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-12</div>
            <div class="col-span-6 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-6</div>
            <div class="col-span-6 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-6</div>
            <div class="col-span-4 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-4</div>
            <div class="col-span-4 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-4</div>
            <div class="col-span-4 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-4</div>
            <div class="col-span-3 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-3</div>
            <div class="col-span-3 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-3</div>
            <div class="col-span-3 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-3</div>
            <div class="col-span-3 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-3</div>
        </div>
        BLADE;

    $responsiveCode = <<<'BLADE'
        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-md bg-success/15 p-3 text-center text-xs text-success">1 / 2 / 4</div>
            <div class="rounded-md bg-success/15 p-3 text-center text-xs text-success">1 / 2 / 4</div>
            <div class="rounded-md bg-success/15 p-3 text-center text-xs text-success">1 / 2 / 4</div>
            <div class="rounded-md bg-success/15 p-3 text-center text-xs text-success">1 / 2 / 4</div>
        </div>
        BLADE;

    $gapCode = <<<'BLADE'
        <div class="grid grid-cols-3 gap-1">...</div>  {{-- gap-1  (4px)  --}}
        <div class="grid grid-cols-3 gap-3">...</div>  {{-- gap-3  (12px) --}}
        <div class="grid grid-cols-3 gap-6">...</div>  {{-- gap-6  (24px) — gutter padrão do app --}}
        <div class="grid grid-cols-3 gap-8">...</div>  {{-- gap-8  (32px) --}}
        BLADE;

    $flexCode = <<<'BLADE'
        <div class="flex items-center justify-between gap-3">
            <div class="rounded-md bg-info/15 px-4 py-2 text-xs text-info">Esquerda</div>
            <div class="rounded-md bg-info/15 px-4 py-2 text-xs text-info">Direita</div>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row">
            <div class="flex-1 rounded-md bg-info/15 p-3 text-center text-xs text-info">flex-1</div>
            <div class="flex-1 rounded-md bg-info/15 p-3 text-center text-xs text-info">flex-1</div>
            <div class="w-32 shrink-0 rounded-md bg-info/15 p-3 text-center text-xs text-info">w-32 (fixo)</div>
        </div>
        BLADE;

    $orderCode = <<<'BLADE'
        <div class="flex gap-3">
            <div class="order-3 rounded-md bg-warning/15 p-3 text-xs text-warning">order-3 (mostrado 3º)</div>
            <div class="order-1 rounded-md bg-warning/15 p-3 text-xs text-warning">order-1 (mostrado 1º)</div>
            <div class="order-2 rounded-md bg-warning/15 p-3 text-xs text-warning">order-2 (mostrado 2º)</div>
        </div>
        BLADE;

    $breakpointsCode = <<<'BLADE'
        sm   40rem  (640px)
        md   48rem  (768px)
        lg   64rem  (1024px)
        xl   80rem  (1280px)
        2xl  96rem  (1536px)
        BLADE;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O layout usa o sistema de grid/flexbox nativo do Tailwind — não há um grid customizado
            do app. Esta página é uma referência rápida das convenções já usadas nos demais
            componentes (ex.: <code>grid grid-cols-12 gap-6</code> no dashboard, <code>gap-6</code>
            como gutter padrão do conteúdo).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Grid de 12 colunas" :code="$basicCode">
            <x-slot:description>
                <code>grid grid-cols-12</code> + <code>col-span-{n}</code> nos filhos — o mesmo padrão usado no dashboard.
            </x-slot:description>
            <div class="grid w-full grid-cols-12 gap-3">
                <div class="col-span-12 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-12</div>
                <div class="col-span-6 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-6</div>
                <div class="col-span-6 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-6</div>
                <div class="col-span-4 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-4</div>
                <div class="col-span-4 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-4</div>
                <div class="col-span-4 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-4</div>
                <div class="col-span-3 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-3</div>
                <div class="col-span-3 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-3</div>
                <div class="col-span-3 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-3</div>
                <div class="col-span-3 rounded-md bg-primary/15 p-3 text-center text-xs text-primary">col-span-3</div>
            </div>
        </x-ui.example>

        <x-ui.example title="Grid responsivo" :code="$responsiveCode">
            <x-slot:description>
                Prefixos de breakpoint (<code>sm:</code>, <code>lg:</code>) mudam o número de colunas conforme a largura da tela.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-md bg-success/15 p-3 text-center text-xs text-success">1 / 2 / 4</div>
                <div class="rounded-md bg-success/15 p-3 text-center text-xs text-success">1 / 2 / 4</div>
                <div class="rounded-md bg-success/15 p-3 text-center text-xs text-success">1 / 2 / 4</div>
                <div class="rounded-md bg-success/15 p-3 text-center text-xs text-success">1 / 2 / 4</div>
            </div>
        </x-ui.example>

        <x-ui.example title="Escala de gap" :code="$gapCode">
            <x-slot:description>
                <code>gap-6</code> (24px) é o gutter padrão usado no conteúdo das páginas e nos cards do dashboard.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <div class="grid grid-cols-3 gap-1">
                    <div class="rounded bg-secondary/15 p-2 text-center text-[11px] text-secondary">gap-1</div>
                    <div class="rounded bg-secondary/15 p-2 text-center text-[11px] text-secondary">gap-1</div>
                    <div class="rounded bg-secondary/15 p-2 text-center text-[11px] text-secondary">gap-1</div>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="rounded bg-secondary/15 p-2 text-center text-[11px] text-secondary">gap-3</div>
                    <div class="rounded bg-secondary/15 p-2 text-center text-[11px] text-secondary">gap-3</div>
                    <div class="rounded bg-secondary/15 p-2 text-center text-[11px] text-secondary">gap-3</div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="rounded bg-secondary/15 p-2 text-center text-[11px] text-secondary">gap-6</div>
                    <div class="rounded bg-secondary/15 p-2 text-center text-[11px] text-secondary">gap-6</div>
                    <div class="rounded bg-secondary/15 p-2 text-center text-[11px] text-secondary">gap-6</div>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Breakpoints" :code="$breakpointsCode">
            <x-slot:description>
                Os mesmos breakpoints padrão do Tailwind v4 — sem customização no projeto.
            </x-slot:description>
            <div class="w-full overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b border-border text-xs text-muted-foreground">
                            <th class="py-2 pr-4 font-medium">Prefixo</th>
                            <th class="py-2 pr-4 font-medium">Largura mínima</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <tr><td class="py-2 pr-4"><code class="text-xs">sm</code></td><td class="py-2 pr-4 text-muted-foreground">40rem (640px)</td></tr>
                        <tr><td class="py-2 pr-4"><code class="text-xs">md</code></td><td class="py-2 pr-4 text-muted-foreground">48rem (768px)</td></tr>
                        <tr><td class="py-2 pr-4"><code class="text-xs">lg</code></td><td class="py-2 pr-4 text-muted-foreground">64rem (1024px)</td></tr>
                        <tr><td class="py-2 pr-4"><code class="text-xs">xl</code></td><td class="py-2 pr-4 text-muted-foreground">80rem (1280px)</td></tr>
                        <tr><td class="py-2 pr-4"><code class="text-xs">2xl</code></td><td class="py-2 pr-4 text-muted-foreground">96rem (1536px)</td></tr>
                    </tbody>
                </table>
            </div>
        </x-ui.example>

        <x-ui.example title="Flexbox" :code="$flexCode">
            <x-slot:description>
                <code>justify-between</code>, <code>flex-1</code> e <code>shrink-0</code> para colunas elásticas + uma coluna de largura fixa.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <div class="flex items-center justify-between gap-3">
                    <div class="rounded-md bg-info/15 px-4 py-2 text-xs text-info">Esquerda</div>
                    <div class="rounded-md bg-info/15 px-4 py-2 text-xs text-info">Direita</div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <div class="flex-1 rounded-md bg-info/15 p-3 text-center text-xs text-info">flex-1</div>
                    <div class="flex-1 rounded-md bg-info/15 p-3 text-center text-xs text-info">flex-1</div>
                    <div class="w-32 shrink-0 rounded-md bg-info/15 p-3 text-center text-xs text-info">w-32 (fixo)</div>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Ordem visual" :code="$orderCode">
            <x-slot:description>
                <code>order-{n}</code> muda a ordem de exibição sem alterar a ordem no HTML.
            </x-slot:description>
            <div class="flex w-full gap-3">
                <div class="order-3 rounded-md bg-warning/15 p-3 text-xs text-warning">order-3 (mostrado 3º)</div>
                <div class="order-1 rounded-md bg-warning/15 p-3 text-xs text-warning">order-1 (mostrado 1º)</div>
                <div class="order-2 rounded-md bg-warning/15 p-3 text-xs text-warning">order-2 (mostrado 2º)</div>
            </div>
        </x-ui.example>
    </div>
</div>
</x-ui.docs>
