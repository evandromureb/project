<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $spacingCode = <<<'BLADE'
        <div class="p-1 bg-primary/15">p-1  (4px)</div>
        <div class="p-2 bg-primary/15">p-2  (8px)</div>
        <div class="p-3 bg-primary/15">p-3  (12px)</div>
        <div class="p-4 bg-primary/15">p-4  (16px)</div>
        <div class="p-5 bg-primary/15">p-5  (20px) — padding do <x-ui.card></div>
        <div class="p-6 bg-primary/15">p-6  (24px) — padding do conteúdo da página</div>
        <div class="p-8 bg-primary/15">p-8  (32px)</div>
        BLADE;

    $radiusCode = <<<'BLADE'
        <div class="rounded-sm">rounded-sm</div>
        <div class="rounded-md">rounded-md — padrão dos cards/botões</div>
        <div class="rounded-lg">rounded-lg</div>
        <div class="rounded-xl">rounded-xl</div>
        <div class="rounded-full">rounded-full — avatares/badges circulares</div>
        BLADE;

    $shadowCode = <<<'BLADE'
        <div class="shadow-sm">shadow-sm</div>
        <div class="shadow-card">shadow-card — token custom, usado em <x-ui.card></div>
        <div class="shadow-md">shadow-md</div>
        <div class="shadow-lg">shadow-lg — dropdowns, modais</div>
        BLADE;

    $borderCode = <<<'BLADE'
        <div class="border border-border">border (1px) + border-border</div>
        <div class="border-2 border-border">border-2 (2px)</div>
        <div class="border-t border-border">border-t — só a borda superior</div>
        <div class="border-l-4 border-primary">border-l-4 — usado em blockquotes/alerts de destaque</div>
        BLADE;

    $sizingCode = <<<'BLADE'
        <div class="size-8">size-8 — 32×32px (ex.: ícone de botão)</div>
        <div class="size-10">size-10 — 40×40px (avatar padrão)</div>
        <div class="w-full">w-full — 100% da largura do pai</div>
        <div class="max-w-sm">max-w-sm — 24rem (modal pequeno)</div>
        <div class="max-w-lg">max-w-lg — 32rem (modal padrão)</div>
        BLADE;

    $opacityCode = <<<'BLADE'
        <div class="opacity-100">opacity-100</div>
        <div class="opacity-70">opacity-70 — ribbon com hover, texto secundário do footer</div>
        <div class="opacity-50">opacity-50 — estado desabilitado (botões, itens de menu)</div>
        BLADE;

    $positionCode = <<<'BLADE'
        <div class="relative">
            <div class="absolute top-0 right-0">absolute top-0 right-0 — badge/ribbon no canto</div>
        </div>

        <div class="fixed inset-0 z-50">fixed inset-0 — backdrop de modal/dropdown</div>
        BLADE;

    $displayCode = <<<'BLADE'
        <div class="hidden lg:block">hidden lg:block — escondido no mobile, visível no desktop</div>
        <div class="block lg:hidden">block lg:hidden — o oposto (só mobile)</div>
        <span class="inline-flex items-center gap-1">inline-flex — ícone + texto na mesma linha</span>
        <div class="truncate">truncate — corta texto longo com "…"</div>
        BLADE;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            Referência rápida das utilities Tailwind mais usadas nos componentes deste projeto —
            espaçamento, raio de borda, sombra, tamanho e visibilidade. Não são classes
            customizadas (exceto <code>shadow-card</code>, um token próprio) — é só um resumo do
            que já aparece espalhado pelos componentes, reunido num só lugar.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Espaçamento (padding)" :code="$spacingCode">
            <x-slot:description>
                <code>p-5</code> é o padding padrão do <code>&lt;x-ui.card&gt;</code>; <code>p-6</code> é o padding do conteúdo da página (ver <code>layouts/app.blade.php</code>).
            </x-slot:description>
            <div class="flex w-full flex-col gap-2 text-xs text-primary">
                <div class="rounded bg-primary/15 p-1">p-1 (4px)</div>
                <div class="rounded bg-primary/15 p-2">p-2 (8px)</div>
                <div class="rounded bg-primary/15 p-3">p-3 (12px)</div>
                <div class="rounded bg-primary/15 p-4">p-4 (16px)</div>
                <div class="rounded bg-primary/15 p-5">p-5 (20px) — padding do &lt;x-ui.card&gt;</div>
                <div class="rounded bg-primary/15 p-6">p-6 (24px) — padding do conteúdo da página</div>
                <div class="rounded bg-primary/15 p-8">p-8 (32px)</div>
            </div>
        </x-ui.example>

        <x-ui.example title="Raio de borda" :code="$radiusCode">
            <x-slot:description>
                <code>rounded-md</code> é o padrão de cards/botões/inputs no projeto.
            </x-slot:description>
            <div class="flex w-full flex-col gap-2 text-xs text-card-foreground">
                <div class="rounded-sm border border-border bg-card p-2">rounded-sm</div>
                <div class="rounded-md border border-border bg-card p-2">rounded-md — padrão</div>
                <div class="rounded-lg border border-border bg-card p-2">rounded-lg</div>
                <div class="rounded-xl border border-border bg-card p-2">rounded-xl</div>
                <div class="rounded-full border border-border bg-card p-2 text-center">rounded-full</div>
            </div>
        </x-ui.example>

        <x-ui.example title="Sombra" :code="$shadowCode">
            <x-slot:description>
                <code>shadow-card</code> é um token custom (<code>--card-shadow</code>) — os demais são utilities padrão do Tailwind.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3 text-xs text-card-foreground">
                <div class="rounded-md bg-card p-3 shadow-sm">shadow-sm</div>
                <div class="rounded-md bg-card p-3 shadow-card">shadow-card — usado em &lt;x-ui.card&gt;</div>
                <div class="rounded-md bg-card p-3 shadow-md">shadow-md</div>
                <div class="rounded-md bg-card p-3 shadow-lg">shadow-lg — dropdowns, modais</div>
            </div>
        </x-ui.example>

        <x-ui.example title="Bordas" :code="$borderCode">
            <x-slot:description>
                <code>border-border</code> é o token de borda padrão — quase toda borda no app usa essa cor.
            </x-slot:description>
            <div class="flex w-full flex-col gap-2 text-xs text-card-foreground">
                <div class="rounded-md border border-border bg-card p-2">border + border-border</div>
                <div class="rounded-md border-2 border-border bg-card p-2">border-2</div>
                <div class="rounded-md border-t border-border bg-card p-2">border-t (só a superior)</div>
                <div class="rounded-md border-l-4 border-primary bg-card p-2">border-l-4 (destaque)</div>
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanho" :code="$sizingCode">
            <x-slot:description>
                <code>size-*</code> define largura e altura iguais de uma vez (ícones/avatares quadrados).
            </x-slot:description>
            <div class="flex w-full flex-col gap-2 text-xs text-card-foreground">
                <div class="flex size-8 items-center justify-center rounded-md border border-border bg-card">8</div>
                <div class="flex size-10 items-center justify-center rounded-md border border-border bg-card">10</div>
                <div class="w-full rounded-md border border-border bg-card p-2">w-full</div>
                <div class="max-w-sm rounded-md border border-border bg-card p-2">max-w-sm</div>
            </div>
        </x-ui.example>

        <x-ui.example title="Opacidade" :code="$opacityCode">
            <x-slot:description>
                <code>opacity-50</code> é o padrão para estados desabilitados nos componentes deste projeto.
            </x-slot:description>
            <div class="flex w-full flex-col gap-2 text-xs text-card-foreground">
                <div class="rounded-md border border-border bg-card p-2 opacity-100">opacity-100</div>
                <div class="rounded-md border border-border bg-card p-2 opacity-70">opacity-70</div>
                <div class="rounded-md border border-border bg-card p-2 opacity-50">opacity-50 (desabilitado)</div>
            </div>
        </x-ui.example>

        <x-ui.example title="Posicionamento" :code="$positionCode">
            <x-slot:description>
                <code>relative</code> + <code>absolute</code> para badges/ribbons; <code>fixed inset-0</code> para overlays de tela cheia.
            </x-slot:description>
            <div class="relative w-full rounded-md border border-border bg-card p-6 text-xs text-card-foreground">
                Contêiner com <code class="rounded bg-sidebar px-1 text-danger">relative</code>
                <span class="absolute top-2 right-2 rounded-full bg-danger px-2 py-0.5 text-[10px] text-danger-foreground">canto</span>
            </div>
        </x-ui.example>

        <x-ui.example title="Visibilidade e texto" :code="$displayCode">
            <x-slot:description>
                <code>hidden</code>/<code>block</code> por breakpoint para mostrar conteúdo diferente por tamanho de tela; <code>truncate</code> corta texto longo.
            </x-slot:description>
            <div class="flex w-full flex-col gap-2 text-xs text-card-foreground">
                <div class="hidden rounded-md border border-border bg-card p-2 lg:block">hidden lg:block — só aparece em telas grandes</div>
                <div class="rounded-md border border-border bg-card p-2 lg:hidden">block lg:hidden — só aparece no mobile</div>
                <div class="max-w-40 truncate rounded-md border border-border bg-card p-2">truncate: um texto bem longo que não cabe e é cortado</div>
            </div>
        </x-ui.example>
    </div>
</div>
</x-ui.docs>
