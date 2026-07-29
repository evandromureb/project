<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $headingsCode = <<<'BLADE'
        <h1 class="text-4xl font-bold text-foreground">Heading 1</h1>
        <h2 class="text-3xl font-bold text-foreground">Heading 2</h2>
        <h3 class="text-2xl font-semibold text-foreground">Heading 3</h3>
        <h4 class="text-xl font-semibold text-foreground">Heading 4</h4>
        <h5 class="text-lg font-semibold text-foreground">Heading 5</h5>
        <h6 class="text-base font-semibold text-foreground">Heading 6</h6>
        BLADE;

    $sizesCode = <<<'BLADE'
        <p class="text-xs">text-xs — 12px</p>
        <p class="text-sm">text-sm — 14px</p>
        <p class="text-base">text-base — 16px</p>
        <p class="text-lg">text-lg — 18px</p>
        <p class="text-xl">text-xl — 20px</p>
        <p class="text-2xl">text-2xl — 24px</p>
        BLADE;

    $weightsCode = <<<'BLADE'
        <p class="font-normal">font-normal (400)</p>
        <p class="font-medium">font-medium (500)</p>
        <p class="font-semibold">font-semibold (600)</p>
        <p class="font-bold">font-bold (700)</p>
        BLADE;

    $colorsCode = <<<'BLADE'
        <p class="text-foreground">text-foreground</p>
        <p class="text-muted-foreground">text-muted-foreground</p>
        <p class="text-primary">text-primary</p>
        <p class="text-success">text-success</p>
        <p class="text-warning">text-warning</p>
        <p class="text-danger">text-danger</p>
        <p class="text-info">text-info</p>
        BLADE;

    $listsCode = <<<'BLADE'
        <ul class="list-disc space-y-1 pl-5 text-sm text-foreground">
            <li>Item de lista não ordenada</li>
            <li>Outro item</li>
        </ul>

        <ol class="list-decimal space-y-1 pl-5 text-sm text-foreground">
            <li>Primeiro passo</li>
            <li>Segundo passo</li>
        </ol>
        BLADE;

    $blockquoteCode = <<<'BLADE'
        <blockquote class="border-l-4 border-primary bg-muted/50 py-2 pl-4 text-sm text-muted-foreground italic">
            "Esta é uma citação de exemplo, usada para destacar um trecho de texto."
        </blockquote>
        BLADE;

    $codeCode = <<<'BLADE'
        Código inline: <code class="rounded bg-sidebar px-1.5 py-0.5 text-xs text-danger">$variable</code>

        <pre class="rounded-md border border-border bg-sidebar p-4 text-xs text-foreground"><code>Route::get('/', fn () => view('welcome'));</code></pre>
        BLADE;

    $linksCode = <<<'BLADE'
        <a href="#" class="text-primary hover:underline">Link padrão</a>
        <a href="#" class="text-muted-foreground hover:text-foreground hover:underline">Link discreto</a>
        BLADE;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            A fonte do projeto é a <strong>Inter</strong> (<code>--font-sans</code>, ver
            <code>resources/css/app.css</code>), carregada via <code>vite-plugin-fonts</code>
            (self-hosted, sem chamada externa ao Google Fonts). Esta página documenta a escala de
            tamanhos/pesos e as classes de texto já usadas nos demais componentes.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Títulos" :code="$headingsCode">
            <x-slot:description>
                Escala sugerida para <code>h1</code>–<code>h6</code> — o Tailwind não estiliza headings por padrão, então use estas classes explicitamente.
            </x-slot:description>
            <div class="flex w-full flex-col gap-2">
                <h1 class="text-4xl font-bold text-foreground">Heading 1</h1>
                <h2 class="text-3xl font-bold text-foreground">Heading 2</h2>
                <h3 class="text-2xl font-semibold text-foreground">Heading 3</h3>
                <h4 class="text-xl font-semibold text-foreground">Heading 4</h4>
                <h5 class="text-lg font-semibold text-foreground">Heading 5</h5>
                <h6 class="text-base font-semibold text-foreground">Heading 6</h6>
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos de texto" :code="$sizesCode">
            <x-slot:description>
                Escala de <code>text-xs</code> a <code>text-2xl</code> usada no corpo do texto.
            </x-slot:description>
            <div class="flex w-full flex-col gap-1.5 text-foreground">
                <p class="text-xs">text-xs — 12px</p>
                <p class="text-sm">text-sm — 14px</p>
                <p class="text-base">text-base — 16px</p>
                <p class="text-lg">text-lg — 18px</p>
                <p class="text-xl">text-xl — 20px</p>
                <p class="text-2xl">text-2xl — 24px</p>
            </div>
        </x-ui.example>

        <x-ui.example title="Pesos de fonte" :code="$weightsCode">
            <x-slot:description>
                A Inter suporta os 4 pesos carregados pelo projeto.
            </x-slot:description>
            <div class="flex w-full flex-col gap-1.5 text-foreground">
                <p class="font-normal">font-normal (400)</p>
                <p class="font-medium">font-medium (500)</p>
                <p class="font-semibold">font-semibold (600)</p>
                <p class="font-bold">font-bold (700)</p>
            </div>
        </x-ui.example>

        <x-ui.example title="Cores de texto" :code="$colorsCode">
            <x-slot:description>
                Sempre tokens de tema (ver página <a href="{{ route('colors') }}" class="text-primary hover:underline">Colors</a>) — nunca cores Tailwind fixas.
            </x-slot:description>
            <div class="flex w-full flex-col gap-1.5">
                <p class="text-foreground">text-foreground</p>
                <p class="text-muted-foreground">text-muted-foreground</p>
                <p class="text-primary">text-primary</p>
                <p class="text-success">text-success</p>
                <p class="text-warning">text-warning</p>
                <p class="text-danger">text-danger</p>
                <p class="text-info">text-info</p>
            </div>
        </x-ui.example>

        <x-ui.example title="Listas" :code="$listsCode">
            <x-slot:description>
                Tailwind remove os estilos nativos de lista (Preflight) — <code>list-disc</code>/<code>list-decimal</code> + <code>pl-5</code> restauram marcador e recuo.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <ul class="list-disc space-y-1 pl-5 text-sm text-foreground">
                    <li>Item de lista não ordenada</li>
                    <li>Outro item</li>
                </ul>

                <ol class="list-decimal space-y-1 pl-5 text-sm text-foreground">
                    <li>Primeiro passo</li>
                    <li>Segundo passo</li>
                </ol>
            </div>
        </x-ui.example>

        <x-ui.example title="Citação" :code="$blockquoteCode">
            <x-slot:description>
                Borda esquerda colorida + fundo suave para destacar uma citação.
            </x-slot:description>
            <blockquote class="w-full border-l-4 border-primary bg-muted/50 py-2 pl-4 text-sm text-muted-foreground italic">
                "Esta é uma citação de exemplo, usada para destacar um trecho de texto."
            </blockquote>
        </x-ui.example>

        <x-ui.example title="Código" :code="$codeCode">
            <x-slot:description>
                Mesmo padrão visual usado nos parágrafos introdutórios de todas as páginas de UI (<code>&lt;code&gt;</code> inline em rosa/danger).
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <p class="text-sm text-foreground">
                    Código inline: <code class="rounded bg-sidebar px-1.5 py-0.5 text-xs text-danger">$variable</code>
                </p>
                <pre class="overflow-x-auto rounded-md border border-border bg-sidebar p-4 text-xs text-foreground"><code>Route::get('/', fn () => view('welcome'));</code></pre>
            </div>
        </x-ui.example>

        <x-ui.example title="Links" :code="$linksCode">
            <x-slot:description>
                Link padrão (cor primária) e um link discreto (texto neutro, ganha cor no hover).
            </x-slot:description>
            <div class="flex w-full flex-col gap-2 text-sm">
                <a href="#" class="text-primary hover:underline">Link padrão</a>
                <a href="#" class="text-muted-foreground hover:text-foreground hover:underline">Link discreto</a>
            </div>
        </x-ui.example>
    </div>
</div>
</x-ui.docs>
