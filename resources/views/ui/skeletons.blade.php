<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.skeleton class="h-4 w-48" />
        <x-ui.skeleton type="circle" />
        <x-ui.skeleton type="text" width="3/4" />
        BLADE;

    $typesCode = <<<'BLADE'
        <x-ui.skeleton type="text" />
        <x-ui.skeleton type="heading" />
        <x-ui.skeleton type="avatar" />
        <x-ui.skeleton type="button" />
        <x-ui.skeleton type="input" />
        <x-ui.skeleton type="image" />
        BLADE;

    $paragraphCode = <<<'BLADE'
        <x-ui.skeleton type="paragraph" :lines="4" />
        BLADE;

    $cardCode = <<<'BLADE'
        <x-ui.skeleton type="card" />
        BLADE;

    $listCode = <<<'BLADE'
        <div class="flex flex-col gap-4">
            <x-ui.skeleton type="list-item" />
            <x-ui.skeleton type="list-item" />
            <x-ui.skeleton type="list-item" />
        </div>
        BLADE;

    $mediaCode = <<<'BLADE'
        <x-ui.skeleton type="media" />
        BLADE;

    $tableCode = <<<'BLADE'
        <x-ui.skeleton type="table" :rows="4" :columns="4" />
        BLADE;

    $animationCode = <<<'BLADE'
        <x-ui.skeleton animation="pulse" type="paragraph" :lines="2" />
        <x-ui.skeleton animation="shimmer" type="paragraph" :lines="2" />
        <x-ui.skeleton animation="none" type="paragraph" :lines="2" />
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.skeleton type="avatar" size="xs" />
        <x-ui.skeleton type="avatar" size="sm" />
        <x-ui.skeleton type="avatar" size="md" />
        <x-ui.skeleton type="avatar" size="lg" />
        <x-ui.skeleton type="avatar" size="xl" />
        BLADE;

    $roundedCode = <<<'BLADE'
        <x-ui.skeleton rounded="none" class="h-8 w-24" />
        <x-ui.skeleton rounded="sm" class="h-8 w-24" />
        <x-ui.skeleton rounded="md" class="h-8 w-24" />
        <x-ui.skeleton rounded="lg" class="h-8 w-24" />
        <x-ui.skeleton rounded="full" class="h-8 w-24" />
        BLADE;

    $widthsCode = <<<'BLADE'
        <x-ui.skeleton type="text" width="full" />
        <x-ui.skeleton type="text" width="3/4" />
        <x-ui.skeleton type="text" width="1/2" />
        <x-ui.skeleton type="text" width="1/3" />
        <x-ui.skeleton type="text" width="1/4" />
        BLADE;

    $composeCode = <<<'BLADE'
        <div class="flex items-start gap-3">
            <x-ui.skeleton type="avatar" size="lg" />
            <div class="flex flex-1 flex-col gap-2">
                <x-ui.skeleton type="heading" width="1/3" />
                <x-ui.skeleton type="text" :lines="2" />
                <div class="flex gap-2 pt-1">
                    <x-ui.skeleton type="button" size="sm" />
                    <x-ui.skeleton type="button" size="sm" />
                </div>
            </div>
        </div>
        BLADE;

    $srOnly = '<span class="sr-only">Carregando…</span>';

    $basicHtml = <<<HTML
        <span class="ui-skeleton block bg-muted rounded-md animate-pulse w-full h-6 h-4 w-48" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-full animate-pulse shrink-0 size-10" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
        </div>
        HTML;

    $typesHtml = <<<HTML
        <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-full" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-full" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
        </div>
        <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-6 w-2/3" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-full animate-pulse shrink-0 size-10" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-md animate-pulse shrink-0 h-9 w-24" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-md animate-pulse w-full h-9" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-md animate-pulse w-full h-24" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        HTML;

    $paragraphHtml = <<<HTML
        <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-full" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-full" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-full" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-2/3" aria-hidden="true"></span>
        </div>
        HTML;

    $cardHtml = <<<HTML
        <div class="ui-skeleton-group flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-md animate-pulse w-full h-36 !rounded-none" aria-hidden="true"></span>
            <div class="flex flex-col gap-3 p-4">
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-6 w-2/3" aria-hidden="true"></span>
                <div class="flex flex-col gap-2">
                    <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-full" aria-hidden="true"></span>
                    <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-5/6" aria-hidden="true"></span>
                    <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
                </div>
                <div class="mt-1 flex gap-2">
                    <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-9 w-24" aria-hidden="true"></span>
                    <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-9 w-24" aria-hidden="true"></span>
                </div>
            </div>
        </div>
        HTML;

    $listItemHtml = <<<HTML
        <div class="ui-skeleton-group flex w-full items-center gap-3" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-md animate-pulse shrink-0 size-10 !rounded-full" aria-hidden="true"></span>
            <div class="flex min-w-0 flex-1 flex-col gap-2">
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-1/3" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-2/3" aria-hidden="true"></span>
            </div>
            <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-12 shrink-0" aria-hidden="true"></span>
        </div>
        HTML;

    $listHtml = <<<HTML
        <div class="flex flex-col gap-4">
        {$listItemHtml}
        {$listItemHtml}
        {$listItemHtml}
        </div>
        HTML;

    $mediaHtml = <<<HTML
        <div class="ui-skeleton-group flex w-full gap-3" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-md animate-pulse size-16 shrink-0 sm:size-20" aria-hidden="true"></span>
            <div class="flex min-w-0 flex-1 flex-col justify-center gap-2">
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-6 w-1/2" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-full" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-4/5" aria-hidden="true"></span>
            </div>
        </div>
        HTML;

    $tableHtml = <<<HTML
        <div class="ui-skeleton-group w-full overflow-hidden rounded-lg border border-border" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <div class="grid gap-3 border-b border-border bg-muted/40 p-3" style="grid-template-columns: repeat(4, minmax(0, 1fr));">
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
            </div>
            <div class="grid gap-3 border-b border-border p-3 last:border-b-0" style="grid-template-columns: repeat(4, minmax(0, 1fr));">
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-full" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-11/12" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-4/5" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
            </div>
            <div class="grid gap-3 border-b border-border p-3 last:border-b-0" style="grid-template-columns: repeat(4, minmax(0, 1fr));">
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-11/12" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-4/5" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-2/3" aria-hidden="true"></span>
            </div>
            <div class="grid gap-3 border-b border-border p-3 last:border-b-0" style="grid-template-columns: repeat(4, minmax(0, 1fr));">
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-4/5" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-2/3" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-5/6" aria-hidden="true"></span>
            </div>
            <div class="grid gap-3 border-b border-border p-3 last:border-b-0" style="grid-template-columns: repeat(4, minmax(0, 1fr));">
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-2/3" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-5/6" aria-hidden="true"></span>
                <span class="ui-skeleton block bg-muted rounded-md animate-pulse h-3.5 w-full" aria-hidden="true"></span>
            </div>
        </div>
        HTML;

    $animationHtml = <<<HTML
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <div>
                <p class="mb-2 text-xs font-medium text-muted-foreground">pulse</p>
                <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
                    {$srOnly}
                    <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-full" aria-hidden="true"></span>
                    <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-4/5" aria-hidden="true"></span>
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-medium text-muted-foreground">shimmer</p>
                <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
                    {$srOnly}
                    <span class="ui-skeleton block bg-muted rounded-sm ui-skeleton-shimmer h-3.5 w-full" aria-hidden="true"></span>
                    <span class="ui-skeleton block bg-muted rounded-sm ui-skeleton-shimmer h-3.5 w-4/5" aria-hidden="true"></span>
                </div>
            </div>
            <div>
                <p class="mb-2 text-xs font-medium text-muted-foreground">none</p>
                <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
                    {$srOnly}
                    <span class="ui-skeleton block bg-muted rounded-sm h-3.5 w-full" aria-hidden="true"></span>
                    <span class="ui-skeleton block bg-muted rounded-sm h-3.5 w-4/5" aria-hidden="true"></span>
                </div>
            </div>
        </div>
        HTML;

    $sizesHtml = <<<HTML
        <span class="ui-skeleton block bg-muted rounded-full animate-pulse shrink-0 size-6" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-full animate-pulse shrink-0 size-8" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-full animate-pulse shrink-0 size-10" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-full animate-pulse shrink-0 size-12" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-full animate-pulse shrink-0 size-16" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        HTML;

    $roundedHtml = <<<HTML
        <span class="ui-skeleton block bg-muted rounded-none animate-pulse w-full h-6 h-8 w-24" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-sm animate-pulse w-full h-6 h-8 w-24" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-md animate-pulse w-full h-6 h-8 w-24" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-lg animate-pulse w-full h-6 h-8 w-24" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        <span class="ui-skeleton block bg-muted rounded-full animate-pulse w-full h-6 h-8 w-24" role="status" aria-busy="true" aria-label="Carregando…">
            {$srOnly}
        </span>
        HTML;

    $widthsHtml = <<<HTML
        <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-full" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-full" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-full" aria-hidden="true"></span>
        </div>
        <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
        </div>
        <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-1/2" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-1/2" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-1/2" aria-hidden="true"></span>
        </div>
        <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-1/3" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-1/3" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-1/3" aria-hidden="true"></span>
        </div>
        <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
            {$srOnly}
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-1/4" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-1/4" aria-hidden="true"></span>
            <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-1/4" aria-hidden="true"></span>
        </div>
        HTML;

    $composeHtml = <<<HTML
        <div class="flex items-start gap-3">
            <span class="ui-skeleton block bg-muted rounded-full animate-pulse shrink-0 size-12" role="status" aria-busy="true" aria-label="Carregando…">
                {$srOnly}
            </span>
            <div class="flex flex-1 flex-col gap-2">
                <span class="block w-full" role="status" aria-busy="true" aria-label="Carregando…">
                    {$srOnly}
                    <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-6 w-1/3" aria-hidden="true"></span>
                </span>
                <div class="ui-skeleton-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-live="polite" aria-label="Carregando…">
                    {$srOnly}
                    <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-full" aria-hidden="true"></span>
                    <span class="ui-skeleton block bg-muted rounded-sm animate-pulse h-3.5 w-3/4" aria-hidden="true"></span>
                </div>
                <div class="flex gap-2 pt-1">
                    <span class="ui-skeleton block bg-muted rounded-md animate-pulse shrink-0 h-8 w-20" role="status" aria-busy="true" aria-label="Carregando…">
                        {$srOnly}
                    </span>
                    <span class="ui-skeleton block bg-muted rounded-md animate-pulse shrink-0 h-8 w-20" role="status" aria-busy="true" aria-label="Carregando…">
                        {$srOnly}
                    </span>
                </div>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.skeleton&gt;</code> é um placeholder de carregamento: ossos primitivos
            (<code>text</code>, <code>avatar</code>, <code>button</code>…) e layouts compostos
            (<code>paragraph</code>/<code>card</code>/<code>list-item</code>/<code>media</code>/<code>table</code>.
            Animações <code>pulse</code>, <code>shimmer</code> ou <code>none</code>, com
            <code>role="status"</code> e texto acessível.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Retângulo via <code>class</code>, círculo e linha de texto.
            </x-slot:description>
            <div class="flex flex-col items-start gap-3">
                <x-ui.skeleton class="h-4 w-48" />
                <x-ui.skeleton type="circle" />
                <x-ui.skeleton type="text" width="3/4" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tipos primitivos" :code="$typesCode" :html="$typesHtml">
            <x-slot:description>
                Atalhos de forma: texto, título, avatar, botão, input e imagem.
            </x-slot:description>
            <div class="flex flex-col gap-3">
                <x-ui.skeleton type="text" />
                <x-ui.skeleton type="heading" />
                <div class="flex items-center gap-3">
                    <x-ui.skeleton type="avatar" />
                    <x-ui.skeleton type="button" />
                </div>
                <x-ui.skeleton type="input" />
                <x-ui.skeleton type="image" height="sm" />
            </div>
        </x-ui.example>

        <x-ui.example title="Parágrafo" :code="$paragraphCode" :html="$paragraphHtml">
            <x-slot:description>
                <code>type="paragraph"</code> com <code>lines</code> (última linha mais curta).
            </x-slot:description>
            <x-ui.skeleton type="paragraph" :lines="4" />
        </x-ui.example>

        <x-ui.example title="Card" :code="$cardCode" :html="$cardHtml">
            <x-slot:description>
                Layout composto: imagem + título + texto + ações.
            </x-slot:description>
            <x-ui.skeleton type="card" />
        </x-ui.example>

        <x-ui.example title="List item" :code="$listCode" :html="$listHtml">
            <x-slot:description>
                Avatar + linhas + meta — ideal para listas em loading.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.skeleton type="list-item" />
                <x-ui.skeleton type="list-item" />
                <x-ui.skeleton type="list-item" />
            </div>
        </x-ui.example>

        <x-ui.example title="Media" :code="$mediaCode" :html="$mediaHtml">
            <x-slot:description>
                Thumb + título + linhas (bloco de mídia).
            </x-slot:description>
            <x-ui.skeleton type="media" />
        </x-ui.example>

        <x-ui.example title="Tabela" :code="$tableCode" :html="$tableHtml">
            <x-slot:description>
                <code>type="table"</code> com <code>rows</code> e <code>columns</code>.
            </x-slot:description>
            <x-ui.skeleton type="table" :rows="4" :columns="4" />
        </x-ui.example>

        <x-ui.example title="Animações" :code="$animationCode" :html="$animationHtml">
            <x-slot:description>
                <code>pulse</code> (padrão), <code>shimmer</code> (CSS em
                <code>layout.css</code>) e <code>none</code>.
            </x-slot:description>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">pulse</p>
                    <x-ui.skeleton animation="pulse" type="paragraph" :lines="2" />
                </div>
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">shimmer</p>
                    <x-ui.skeleton animation="shimmer" type="paragraph" :lines="2" />
                </div>
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">none</p>
                    <x-ui.skeleton animation="none" type="paragraph" :lines="2" />
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos (avatar)" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: xs → xl (afeta avatar, texto, botão, etc.).
            </x-slot:description>
            <div class="flex flex-wrap items-end gap-3">
                <x-ui.skeleton type="avatar" size="xs" />
                <x-ui.skeleton type="avatar" size="sm" />
                <x-ui.skeleton type="avatar" size="md" />
                <x-ui.skeleton type="avatar" size="lg" />
                <x-ui.skeleton type="avatar" size="xl" />
            </div>
        </x-ui.example>

        <x-ui.example title="Arredondamento" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code> sobrescreve o padrão do tipo.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-3">
                <x-ui.skeleton rounded="none" class="h-8 w-24" />
                <x-ui.skeleton rounded="sm" class="h-8 w-24" />
                <x-ui.skeleton rounded="md" class="h-8 w-24" />
                <x-ui.skeleton rounded="lg" class="h-8 w-24" />
                <x-ui.skeleton rounded="full" class="h-8 w-24" />
            </div>
        </x-ui.example>

        <x-ui.example title="Larguras" :code="$widthsCode" :html="$widthsHtml">
            <x-slot:description>
                <code>width</code>: full, 3/4, 1/2, 1/3, 1/4…
            </x-slot:description>
            <div class="flex w-full flex-col gap-2">
                <x-ui.skeleton type="text" width="full" />
                <x-ui.skeleton type="text" width="3/4" />
                <x-ui.skeleton type="text" width="1/2" />
                <x-ui.skeleton type="text" width="1/3" />
                <x-ui.skeleton type="text" width="1/4" />
            </div>
        </x-ui.example>

        <x-ui.example title="Composição manual" :code="$composeCode" :html="$composeHtml">
            <x-slot:description>
                Combine primitivos livremente para layouts sob medida.
            </x-slot:description>
            <div class="flex items-start gap-3">
                <x-ui.skeleton type="avatar" size="lg" />
                <div class="flex flex-1 flex-col gap-2">
                    <x-ui.skeleton type="heading" width="1/3" />
                    <x-ui.skeleton type="text" :lines="2" />
                    <div class="flex gap-2 pt-1">
                        <x-ui.skeleton type="button" size="sm" />
                        <x-ui.skeleton type="button" size="sm" />
                    </div>
                </div>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api component="ui/skeleton/skeleton" title="x-ui.skeleton" />
</x-ui.docs>
