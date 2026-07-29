<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $verticalCode = <<<'BLADE'
        <x-ui.stack gap="md">
            <div class="rounded-md border border-border bg-card p-3 text-sm">Primeiro</div>
            <div class="rounded-md border border-border bg-card p-3 text-sm">Segundo</div>
            <div class="rounded-md border border-border bg-card p-3 text-sm">Terceiro</div>
        </x-ui.stack>
        BLADE;

    $horizontalCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" gap="md">
            <div class="rounded-md border border-border bg-card p-3 text-sm">Primeiro</div>
            <div class="rounded-md border border-border bg-card p-3 text-sm">Segundo</div>
            <div class="rounded-md border border-border bg-card p-3 text-sm">Terceiro</div>
        </x-ui.stack>
        BLADE;

    $gapsCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" gap="none">…</x-ui.stack>
        <x-ui.stack direction="horizontal" gap="xs">…</x-ui.stack>
        <x-ui.stack direction="horizontal" gap="sm">…</x-ui.stack>
        <x-ui.stack direction="horizontal" gap="md">…</x-ui.stack>
        <x-ui.stack direction="horizontal" gap="lg">…</x-ui.stack>
        <x-ui.stack direction="horizontal" gap="xl">…</x-ui.stack>
        BLADE;

    $alignCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" align="start" gap="md" class="h-24">…</x-ui.stack>
        <x-ui.stack direction="horizontal" align="center" gap="md" class="h-24">…</x-ui.stack>
        <x-ui.stack direction="horizontal" align="end" gap="md" class="h-24">…</x-ui.stack>
        <x-ui.stack direction="horizontal" align="stretch" gap="md" class="h-24">…</x-ui.stack>
        BLADE;

    $justifyCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" justify="between" class="w-full">
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">A</div>
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">B</div>
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">C</div>
        </x-ui.stack>
        BLADE;

    $pushCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" gap="md" class="w-full">
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Logo</div>
            <x-ui.stack.stack-item push>
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Ações</div>
            </x-ui.stack.stack-item>
        </x-ui.stack>
        BLADE;

    $spacerCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" gap="md" class="w-full">
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Início</div>
            <x-ui.stack.stack-item spacer />
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Meio</div>
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Fim</div>
        </x-ui.stack>
        BLADE;

    $divideCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" gap="none" divide class="w-full rounded-md border border-border">
            <div class="px-4 py-2 text-sm">Item</div>
            <div class="px-4 py-2 text-sm">Item</div>
            <div class="px-4 py-2 text-sm">Item</div>
        </x-ui.stack>

        <x-ui.stack gap="none" divide="dashed" divide-color="primary" class="rounded-md border border-border">
            <div class="px-4 py-2 text-sm">Linha 1</div>
            <div class="px-4 py-2 text-sm">Linha 2</div>
            <div class="px-4 py-2 text-sm">Linha 3</div>
        </x-ui.stack>
        BLADE;

    $separatorCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" gap="md" align="center">
            <x-forms.input placeholder="Adicionar item…" class="min-w-0 grow" />
            <x-ui.button color="primary">Enviar</x-ui.button>
            <x-ui.separator orientation="vertical" spacing="none" class="!mx-0 h-8" />
            <x-ui.button variant="outline" color="danger">Limpar</x-ui.button>
        </x-ui.stack>
        BLADE;

    $buttonsCode = <<<'BLADE'
        <x-ui.stack gap="sm" class="mx-auto max-w-xs">
            <x-ui.button color="primary" block>Salvar alterações</x-ui.button>
            <x-ui.button variant="outline" color="secondary" block>Cancelar</x-ui.button>
        </x-ui.stack>
        BLADE;

    $responsiveCode = <<<'BLADE'
        <x-ui.stack from="md" gap="md" class="w-full">
            <div class="rounded-md border border-border bg-card p-3 text-sm">Mobile empilha</div>
            <div class="rounded-md border border-border bg-card p-3 text-sm">Desktop alinha</div>
            <div class="rounded-md border border-border bg-card p-3 text-sm">em linha</div>
        </x-ui.stack>
        BLADE;

    $wrapCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" wrap gap="sm" class="max-w-sm">
            <x-ui.badge color="primary">Laravel</x-ui.badge>
            <x-ui.badge color="info">Livewire</x-ui.badge>
            <x-ui.badge color="success">Pest</x-ui.badge>
            <x-ui.badge color="warning">Tailwind</x-ui.badge>
            <x-ui.badge color="danger">Alpine</x-ui.badge>
            <x-ui.badge color="secondary">Vite</x-ui.badge>
        </x-ui.stack>
        BLADE;

    $reverseCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" reverse gap="md">
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">1</div>
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">2</div>
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">3</div>
        </x-ui.stack>
        BLADE;

    $growCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" grow gap="md" class="w-full">
            <div class="rounded-md border border-border bg-card p-3 text-center text-sm">Igual</div>
            <div class="rounded-md border border-border bg-card p-3 text-center text-sm">Igual</div>
            <div class="rounded-md border border-border bg-card p-3 text-center text-sm">Igual</div>
        </x-ui.stack>
        BLADE;

    $itemAlignCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" align="stretch" gap="md" class="h-28">
            <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Stretch</div>
            <x-ui.stack.stack-item align="center">
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Center</div>
            </x-ui.stack.stack-item>
            <x-ui.stack.stack-item align="end">
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">End</div>
            </x-ui.stack.stack-item>
        </x-ui.stack>
        BLADE;

    $toolbarCode = <<<'BLADE'
        <x-ui.stack direction="horizontal" gap="sm" align="center" class="w-full rounded-md border border-border bg-card p-3">
            <x-ui.button size="sm" variant="soft" color="secondary" icon="bi-funnel">Filtros</x-ui.button>
            <x-ui.button size="sm" variant="soft" color="secondary" icon="bi-sort-down">Ordenar</x-ui.button>
            <x-ui.stack.stack-item spacer />
            <x-ui.button size="sm" color="primary" icon="bi-plus-lg">Novo</x-ui.button>
        </x-ui.stack>
        BLADE;

    // Gera o HTML puro equivalente ao que <x-ui.stack> / <x-ui.stack.stack-item>
    // realmente renderizam — mesma lógica de
    // resources/views/components/ui/stack/{stack,stack-item}.blade.php.
    $renderStack = function (
        string $direction = 'vertical',
        string|int $gap = 'md',
        ?string $align = null,
        string $justify = 'start',
        bool $wrap = false,
        bool $reverse = false,
        bool|string $divide = false,
        ?string $divideColor = null,
        bool $grow = false,
        ?string $from = null,
        string $extraClass = '',
        string $childrenHtml = '',
    ): string {
        if ($align === null) {
            $align = $direction === 'horizontal' ? 'center' : 'stretch';
        }

        $gapKey = is_int($gap) || ctype_digit((string) $gap) ? (string) max(0, min(12, (int) $gap)) : $gap;

        $gapClasses = match ($gapKey) {
            'none', '0' => 'gap-0',
            'xs', '1' => 'gap-1',
            'sm', '2' => 'gap-2',
            '3' => 'gap-3',
            'md', '4' => 'gap-4',
            '5' => 'gap-5',
            'lg', '6' => 'gap-6',
            '7' => 'gap-7',
            '8' => 'gap-8',
            'xl', '10' => 'gap-10',
            '2xl', '12' => 'gap-12',
            '9' => 'gap-9',
            '11' => 'gap-11',
            default => 'gap-4',
        };

        $alignClasses = match ($align) {
            'start' => 'items-start',
            'center' => 'items-center',
            'end' => 'items-end',
            'baseline' => 'items-baseline',
            default => 'items-stretch',
        };

        $justifyClasses = match ($justify) {
            'center' => 'justify-center',
            'end' => 'justify-end',
            'between' => 'justify-between',
            'around' => 'justify-around',
            'evenly' => 'justify-evenly',
            default => 'justify-start',
        };

        $directionClasses = match (true) {
            $direction === 'horizontal' && $from === 'md' && $reverse => 'flex-row-reverse md:flex-col-reverse',
            $direction === 'horizontal' && $reverse => 'flex-row-reverse',
            $direction === 'horizontal' => 'flex-row',
            $from === 'md' && $reverse => 'flex-col-reverse md:flex-row-reverse',
            $from === 'md' => 'flex-col md:flex-row',
            $reverse => 'flex-col-reverse',
            default => 'flex-col',
        };

        $childWidthClasses = match (true) {
            $grow => '[&>[data-stack-item]]:grow [&>:not([data-stack-spacer])]:grow',
            $direction === 'vertical' && $from === null => '[&>[data-stack-item]]:w-full',
            $direction === 'vertical' && $from === 'md' => '[&>[data-stack-item]]:w-full md:[&>[data-stack-item]]:w-auto',
            default => '',
        };

        $divideStyle = match (true) {
            $divide === true => 'solid',
            in_array($divide, ['dashed', 'dotted'], true) => $divide,
            default => false,
        };

        $divideAxisClasses = match (true) {
            ! $divideStyle => '',
            $direction === 'horizontal' => 'divide-x',
            default => 'divide-y',
        };

        $divideStyleClasses = match ($divideStyle) {
            'dashed' => 'divide-dashed',
            'dotted' => 'divide-dotted',
            'solid' => 'divide-solid',
            default => '',
        };

        $divideColorClasses = match ($divideColor) {
            'primary' => 'divide-primary/30',
            'secondary' => 'divide-secondary/30',
            'success' => 'divide-success/30',
            'warning' => 'divide-warning/30',
            'danger' => 'divide-danger/30',
            'info' => 'divide-info/30',
            default => $divideStyle ? 'divide-border' : '',
        };

        $axis = $direction === 'horizontal' ? 'horizontal' : 'vertical';

        $classes = trim(implode(' ', array_filter([
            'ui-stack flex self-stretch',
            $directionClasses,
            $gapClasses,
            $alignClasses,
            $justifyClasses,
            $childWidthClasses,
            $divideAxisClasses,
            $divideStyleClasses,
            $divideColorClasses,
            $wrap ? 'flex-wrap' : 'flex-nowrap',
            $extraClass,
        ])));

        $fromAttr = $from ? " data-from=\"{$from}\"" : '';

        return "<div data-stack data-direction=\"{$direction}\" data-axis=\"{$axis}\"{$fromAttr} class=\"{$classes}\">\n{$childrenHtml}\n</div>";
    };

    $renderStackItem = function (
        string $direction = 'vertical',
        bool $push = false,
        bool $grow = false,
        bool $shrink = true,
        ?string $align = null,
        bool $spacer = false,
        string $childHtml = '',
    ): string {
        $axis = $direction === 'horizontal' ? 'horizontal' : 'vertical';

        $pushClasses = match (true) {
            ! $push => '',
            $axis === 'horizontal' => 'ms-auto',
            default => 'mt-auto',
        };

        $alignClasses = match ($align) {
            'start' => 'self-start',
            'center' => 'self-center',
            'end' => 'self-end',
            'stretch' => 'self-stretch',
            'baseline' => 'self-baseline',
            'auto' => 'self-auto',
            default => '',
        };

        $classes = trim(implode(' ', array_filter([
            'ui-stack-item',
            $pushClasses,
            $alignClasses,
            $grow || $spacer ? 'grow' : '',
            ! $shrink && ! $spacer ? 'shrink-0' : '',
            $shrink && ! $spacer ? 'shrink' : '',
            $spacer ? 'min-h-0 min-w-0' : '',
        ])));

        $attr = $spacer ? 'data-stack-spacer aria-hidden="true"' : 'data-stack-item';
        $inner = $spacer ? '' : $childHtml;

        return "<div {$attr} class=\"{$classes}\">{$inner}</div>";
    };

    $box = fn ($text) => '<div class="rounded-md border border-border bg-card p-3 text-sm">'.$text.'</div>';
    $boxPx = fn ($text) => '<div class="rounded-md border border-border bg-card px-3 py-2 text-sm">'.$text.'</div>';

    $verticalHtml = $renderStack(childrenHtml: $box('Primeiro')."\n".$box('Segundo')."\n".$box('Terceiro'));

    $horizontalHtml = $renderStack(direction: 'horizontal', childrenHtml: $box('Primeiro')."\n".$box('Segundo')."\n".$box('Terceiro'));

    $gapsHtml = '<div class="flex flex-col gap-4">'."\n".implode("\n", array_map(
        fn ($gap) => "<div>\n<p class=\"mb-1 text-xs text-muted-foreground\">gap=\"{$gap}\"</p>\n"
            .$renderStack(direction: 'horizontal', gap: $gap, childrenHtml: implode("\n", array_map(
                fn ($l) => '<div class="rounded-md bg-primary/15 px-3 py-1.5 text-xs text-primary">'.$l.'</div>',
                ['A', 'B', 'C']
            )))
            ."\n</div>",
        ['none', 'xs', 'sm', 'md', 'lg', 'xl']
    ))."\n</div>";

    $alignHtml = '<div class="flex flex-col gap-3">'."\n".implode("\n", array_map(
        fn ($align) => "<div>\n<p class=\"mb-1 text-xs text-muted-foreground\">{$align}</p>\n"
            .$renderStack(
                direction: 'horizontal',
                align: $align,
                gap: 'md',
                extraClass: 'h-20 rounded-md border border-dashed border-border px-2',
                childrenHtml: '<div class="rounded-md bg-info/15 px-2 py-1 text-xs text-info">a</div>'
                    ."\n".'<div class="rounded-md bg-info/15 px-2 py-3 text-xs text-info">bb</div>'
                    ."\n".'<div class="rounded-md bg-info/15 px-2 py-2 text-xs text-info">ccc</div>'
            )
            ."\n</div>",
        ['start', 'center', 'end', 'stretch']
    ))."\n</div>";

    $justifyHtml = '<div class="flex flex-col gap-3">'."\n".implode("\n", array_map(
        fn ($justify) => "<div>\n<p class=\"mb-1 text-xs text-muted-foreground\">{$justify}</p>\n"
            .$renderStack(
                direction: 'horizontal',
                justify: $justify,
                extraClass: 'w-full rounded-md border border-dashed border-border px-2 py-2',
                childrenHtml: implode("\n", array_map(
                    fn ($l) => '<div class="rounded-md border border-border bg-card px-2 py-1 text-xs">'.$l.'</div>',
                    ['A', 'B', 'C']
                ))
            )
            ."\n</div>",
        ['start', 'center', 'end', 'between', 'around', 'evenly']
    ))."\n</div>";

    $pushHtml = $renderStack(
        direction: 'horizontal',
        gap: 'md',
        extraClass: 'w-full rounded-md border border-dashed border-border p-3',
        childrenHtml: $boxPx('Logo')."\n".$renderStackItem(direction: 'horizontal', push: true, childHtml: $boxPx('Ações'))
    );

    $spacerHtml = $renderStack(
        direction: 'horizontal',
        gap: 'md',
        extraClass: 'w-full rounded-md border border-dashed border-border p-3',
        childrenHtml: $boxPx('Início')."\n".$renderStackItem(direction: 'horizontal', spacer: true)."\n".$boxPx('Meio')."\n".$boxPx('Fim')
    );

    $divideHtml = '<div class="grid grid-cols-1 gap-4 md:grid-cols-2">'."\n"
        .$renderStack(
            direction: 'horizontal',
            gap: 'none',
            divide: true,
            extraClass: 'w-full overflow-hidden rounded-md border border-border',
            childrenHtml: '<div class="px-4 py-2 text-sm">Item</div>'."\n".'<div class="px-4 py-2 text-sm">Item</div>'."\n".'<div class="px-4 py-2 text-sm">Item</div>'
        )
        ."\n".$renderStack(
            gap: 'none',
            divide: 'dashed',
            divideColor: 'primary',
            extraClass: 'overflow-hidden rounded-md border border-border',
            childrenHtml: '<div class="px-4 py-2 text-sm">Linha 1</div>'."\n".'<div class="px-4 py-2 text-sm">Linha 2</div>'."\n".'<div class="px-4 py-2 text-sm">Linha 3</div>'
        )
        ."\n</div>";

    $separatorHtml = $renderStack(
        direction: 'horizontal',
        gap: 'md',
        align: 'center',
        extraClass: 'w-full',
        childrenHtml: '<div class="min-w-0 grow"><input type="text" placeholder="Adicionar item…" class="form-input w-full"></div>'
            ."\n".'<button type="button" class="btn btn-primary">Enviar</button>'
            ."\n".'<div class="ui-separator inline-flex h-full flex-col items-center self-stretch min-h-24 !mx-0 h-8" role="none" aria-hidden="true"><div class="h-full w-0.5 bg-border border-border"></div></div>'
            ."\n".'<button type="button" class="btn btn-outline-danger">Limpar</button>'
    );

    $buttonsHtml = $renderStack(
        gap: 'sm',
        extraClass: 'mx-auto max-w-xs',
        childrenHtml: '<button type="button" class="btn btn-primary w-full">Salvar alterações</button>'
            ."\n".'<button type="button" class="btn btn-outline-secondary w-full">Cancelar</button>'
    );

    $responsiveHtml = $renderStack(
        gap: 'md',
        from: 'md',
        extraClass: 'w-full',
        childrenHtml: $box('Mobile empilha')."\n".$box('Desktop alinha')."\n".$box('em linha')
    );

    $wrapHtml = $renderStack(
        direction: 'horizontal',
        wrap: true,
        gap: 'sm',
        extraClass: 'max-w-sm',
        childrenHtml: '<span class="inline-flex items-center font-medium leading-none bg-primary text-primary-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md"><span>Laravel</span></span>'
            ."\n".'<span class="inline-flex items-center font-medium leading-none bg-info text-info-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md"><span>Livewire</span></span>'
            ."\n".'<span class="inline-flex items-center font-medium leading-none bg-success text-success-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md"><span>Pest</span></span>'
            ."\n".'<span class="inline-flex items-center font-medium leading-none bg-warning text-warning-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md"><span>Tailwind</span></span>'
            ."\n".'<span class="inline-flex items-center font-medium leading-none bg-danger text-danger-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md"><span>Alpine</span></span>'
            ."\n".'<span class="inline-flex items-center font-medium leading-none bg-secondary text-secondary-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md"><span>Vite</span></span>'
    );

    $reverseHtml = $renderStack(
        direction: 'horizontal',
        reverse: true,
        gap: 'md',
        childrenHtml: $boxPx('1')."\n".$boxPx('2')."\n".$boxPx('3')
    );

    $growHtml = $renderStack(
        direction: 'horizontal',
        grow: true,
        gap: 'md',
        extraClass: 'w-full',
        childrenHtml: implode("\n", array_map(
            fn () => '<div class="rounded-md border border-border bg-card p-3 text-center text-sm">Igual</div>',
            [1, 2, 3]
        ))
    );

    $itemAlignHtml = $renderStack(
        direction: 'horizontal',
        align: 'stretch',
        gap: 'md',
        extraClass: 'h-28 rounded-md border border-dashed border-border p-2',
        childrenHtml: $boxPx('Stretch')
            ."\n".$renderStackItem(direction: 'horizontal', align: 'center', childHtml: $boxPx('Center'))
            ."\n".$renderStackItem(direction: 'horizontal', align: 'end', childHtml: $boxPx('End'))
    );

    $toolbarHtml = $renderStack(
        direction: 'horizontal',
        gap: 'sm',
        align: 'center',
        extraClass: 'w-full rounded-md border border-border bg-card p-3',
        childrenHtml: '<button type="button" class="btn btn-soft-secondary btn-sm"><i class="bi bi-funnel shrink-0 leading-none" aria-hidden="true"></i><span>Filtros</span></button>'
            ."\n".'<button type="button" class="btn btn-soft-secondary btn-sm"><i class="bi bi-sort-down shrink-0 leading-none" aria-hidden="true"></i><span>Ordenar</span></button>'
            ."\n".$renderStackItem(direction: 'horizontal', spacer: true)
            ."\n".'<button type="button" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i><span>Novo</span></button>'
    );
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.stack&gt;</code> é o atalho de layout flex (estilo do design system
            <code>vstack</code>/<code>hstack</code>): direção, gap, alinhamento, justify,
            wrap, reverse, divisores CSS e flip responsivo com <code>from</code>.
            Use <code>&lt;x-ui.stack.stack-item&gt;</code> para <code>push</code>,
            <code>spacer</code>, <code>grow</code> e alinhamento individual.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Vertical (vstack)" :code="$verticalCode" :html="$verticalHtml">
            <x-slot:description>
                Padrão: <code>direction="vertical"</code>, filhos em largura total,
                <code>align="stretch"</code>.
            </x-slot:description>
            <x-ui.stack gap="md">
                <div class="rounded-md border border-border bg-card p-3 text-sm">Primeiro</div>
                <div class="rounded-md border border-border bg-card p-3 text-sm">Segundo</div>
                <div class="rounded-md border border-border bg-card p-3 text-sm">Terceiro</div>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Horizontal (hstack)" :code="$horizontalCode" :html="$horizontalHtml">
            <x-slot:description>
                <code>direction="horizontal"</code> centra no eixo cruzado
                (como o <code>.hstack</code>).
            </x-slot:description>
            <x-ui.stack direction="horizontal" gap="md">
                <div class="rounded-md border border-border bg-card p-3 text-sm">Primeiro</div>
                <div class="rounded-md border border-border bg-card p-3 text-sm">Segundo</div>
                <div class="rounded-md border border-border bg-card p-3 text-sm">Terceiro</div>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Gaps" :code="$gapsCode" :html="$gapsHtml">
            <x-slot:description>
                Tokens <code>none</code>/<code>xs</code>/<code>sm</code>/<code>md</code>/<code>lg</code>/<code>xl</code>/<code>2xl</code>
                ou escala <code>0</code>–<code>12</code>.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                @foreach (['none', 'xs', 'sm', 'md', 'lg', 'xl'] as $gap)
                    <div>
                        <p class="mb-1 text-xs text-muted-foreground">gap="{{ $gap }}"</p>
                        <x-ui.stack direction="horizontal" :gap="$gap">
                            <div class="rounded-md bg-primary/15 px-3 py-1.5 text-xs text-primary">A</div>
                            <div class="rounded-md bg-primary/15 px-3 py-1.5 text-xs text-primary">B</div>
                            <div class="rounded-md bg-primary/15 px-3 py-1.5 text-xs text-primary">C</div>
                        </x-ui.stack>
                    </div>
                @endforeach
            </div>
        </x-ui.example>

        <x-ui.example title="Align (eixo cruzado)" :code="$alignCode" :html="$alignHtml">
            <x-slot:description>
                <code>align</code>: start, center, end, stretch, baseline.
            </x-slot:description>
            <div class="flex flex-col gap-3">
                @foreach (['start', 'center', 'end', 'stretch'] as $align)
                    <div>
                        <p class="mb-1 text-xs text-muted-foreground">{{ $align }}</p>
                        <x-ui.stack direction="horizontal" :align="$align" gap="md" class="h-20 rounded-md border border-dashed border-border px-2">
                            <div class="rounded-md bg-info/15 px-2 py-1 text-xs text-info">a</div>
                            <div class="rounded-md bg-info/15 px-2 py-3 text-xs text-info">bb</div>
                            <div class="rounded-md bg-info/15 px-2 py-2 text-xs text-info">ccc</div>
                        </x-ui.stack>
                    </div>
                @endforeach
            </div>
        </x-ui.example>

        <x-ui.example title="Justify (eixo principal)" :code="$justifyCode" :html="$justifyHtml">
            <x-slot:description>
                <code>justify</code>: start, center, end, between, around, evenly.
            </x-slot:description>
            <div class="flex flex-col gap-3">
                @foreach (['start', 'center', 'end', 'between', 'around', 'evenly'] as $justify)
                    <div>
                        <p class="mb-1 text-xs text-muted-foreground">{{ $justify }}</p>
                        <x-ui.stack direction="horizontal" :justify="$justify" class="w-full rounded-md border border-dashed border-border px-2 py-2">
                            <div class="rounded-md border border-border bg-card px-2 py-1 text-xs">A</div>
                            <div class="rounded-md border border-border bg-card px-2 py-1 text-xs">B</div>
                            <div class="rounded-md border border-border bg-card px-2 py-1 text-xs">C</div>
                        </x-ui.stack>
                    </div>
                @endforeach
            </div>
        </x-ui.example>

        <x-ui.example title="Push (ms-auto / mt-auto)" :code="$pushCode" :html="$pushHtml">
            <x-slot:description>
                <code>&lt;x-ui.stack.stack-item push&gt;</code> empurra o item para o fim do eixo
                (como <code>ms-auto</code> no hstack).
            </x-slot:description>
            <x-ui.stack direction="horizontal" gap="md" class="w-full rounded-md border border-dashed border-border p-3">
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Logo</div>
                <x-ui.stack.stack-item push>
                    <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Ações</div>
                </x-ui.stack.stack-item>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Spacer" :code="$spacerCode" :html="$spacerHtml">
            <x-slot:description>
                <code>&lt;x-ui.stack.stack-item spacer /&gt;</code> ocupa o espaço livre
                (<code>flex-1</code> — útil para separar grupos.
            </x-slot:description>
            <x-ui.stack direction="horizontal" gap="md" class="w-full rounded-md border border-dashed border-border p-3">
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Início</div>
                <x-ui.stack.stack-item spacer />
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Meio</div>
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Fim</div>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Divide (CSS)" :code="$divideCode" :html="$divideHtml">
            <x-slot:description>
                <code>divide</code> / <code>divide="dashed|dotted"</code> +
                <code>divide-color</code>. Prefira <code>gap="none"</code> para a borda
                colar nos itens.
            </x-slot:description>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <x-ui.stack direction="horizontal" gap="none" divide class="w-full overflow-hidden rounded-md border border-border">
                    <div class="px-4 py-2 text-sm">Item</div>
                    <div class="px-4 py-2 text-sm">Item</div>
                    <div class="px-4 py-2 text-sm">Item</div>
                </x-ui.stack>
                <x-ui.stack gap="none" divide="dashed" divide-color="primary" class="overflow-hidden rounded-md border border-border">
                    <div class="px-4 py-2 text-sm">Linha 1</div>
                    <div class="px-4 py-2 text-sm">Linha 2</div>
                    <div class="px-4 py-2 text-sm">Linha 3</div>
                </x-ui.stack>
            </div>
        </x-ui.example>

        <x-ui.example title="Toolbar com separator" :code="$separatorCode" :html="$separatorHtml">
            <x-slot:description>
                Combine com <code>&lt;x-ui.separator orientation="vertical"&gt;</code>
                (equivalente ao <code>.vr</code>).
            </x-slot:description>
            <x-ui.stack direction="horizontal" gap="md" align="center" class="w-full">
                <div class="min-w-0 grow">
                    <x-forms.input placeholder="Adicionar item…" />
                </div>
                <x-ui.button color="primary">Enviar</x-ui.button>
                <x-ui.separator orientation="vertical" spacing="none" class="!mx-0 h-8" />
                <x-ui.button variant="outline" color="danger">Limpar</x-ui.button>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Botões empilhados" :code="$buttonsCode" :html="$buttonsHtml">
            <x-slot:description>
                Caso clássico: ações full-width empilhadas.
            </x-slot:description>
            <x-ui.stack gap="sm" class="mx-auto max-w-xs">
                <x-ui.button color="primary" block>Salvar alterações</x-ui.button>
                <x-ui.button variant="outline" color="secondary" block>Cancelar</x-ui.button>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Toolbar de página" :code="$toolbarCode" :html="$toolbarHtml">
            <x-slot:description>
                Spacer + botões: padrão de barra de ferramentas.
            </x-slot:description>
            <x-ui.stack direction="horizontal" gap="sm" align="center" class="w-full rounded-md border border-border bg-card p-3">
                <x-ui.button size="sm" variant="soft" color="secondary" icon="bi-funnel">Filtros</x-ui.button>
                <x-ui.button size="sm" variant="soft" color="secondary" icon="bi-sort-down">Ordenar</x-ui.button>
                <x-ui.stack.stack-item spacer />
                <x-ui.button size="sm" color="primary" icon="bi-plus-lg">Novo</x-ui.button>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Responsivo (from)" :code="$responsiveCode" :html="$responsiveHtml">
            <x-slot:description>
                <code>from="md"</code> empilha no mobile e vira linha a partir de
                <code>md</code>. Redimensione a janela para ver.
            </x-slot:description>
            <x-ui.stack from="md" gap="md" class="w-full">
                <div class="rounded-md border border-border bg-card p-3 text-sm">Mobile empilha</div>
                <div class="rounded-md border border-border bg-card p-3 text-sm">Desktop alinha</div>
                <div class="rounded-md border border-border bg-card p-3 text-sm">em linha</div>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Wrap" :code="$wrapCode" :html="$wrapHtml">
            <x-slot:description>
                <code>wrap</code> permite quebra de linha (chips, badges).
            </x-slot:description>
            <x-ui.stack direction="horizontal" wrap gap="sm" class="max-w-sm">
                <x-ui.badge color="primary">Laravel</x-ui.badge>
                <x-ui.badge color="info">Livewire</x-ui.badge>
                <x-ui.badge color="success">Pest</x-ui.badge>
                <x-ui.badge color="warning">Tailwind</x-ui.badge>
                <x-ui.badge color="danger">Alpine</x-ui.badge>
                <x-ui.badge color="secondary">Vite</x-ui.badge>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Reverse" :code="$reverseCode" :html="$reverseHtml">
            <x-slot:description>
                <code>reverse</code> inverte a ordem visual no eixo principal.
            </x-slot:description>
            <x-ui.stack direction="horizontal" reverse gap="md">
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">1</div>
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">2</div>
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">3</div>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Grow (filhos iguais)" :code="$growCode" :html="$growHtml">
            <x-slot:description>
                <code>grow</code> aplica <code>flex-grow</code> nos filhos diretos.
            </x-slot:description>
            <x-ui.stack direction="horizontal" grow gap="md" class="w-full">
                <div class="rounded-md border border-border bg-card p-3 text-center text-sm">Igual</div>
                <div class="rounded-md border border-border bg-card p-3 text-center text-sm">Igual</div>
                <div class="rounded-md border border-border bg-card p-3 text-center text-sm">Igual</div>
            </x-ui.stack>
        </x-ui.example>

        <x-ui.example title="Align por item" :code="$itemAlignCode" :html="$itemAlignHtml">
            <x-slot:description>
                <code>stack-item align</code> sobrescreve o align do pai
                (<code>(self-*)</code>.
            </x-slot:description>
            <x-ui.stack direction="horizontal" align="stretch" gap="md" class="h-28 rounded-md border border-dashed border-border p-2">
                <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Stretch</div>
                <x-ui.stack.stack-item align="center">
                    <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">Center</div>
                </x-ui.stack.stack-item>
                <x-ui.stack.stack-item align="end">
                    <div class="rounded-md border border-border bg-card px-3 py-2 text-sm">End</div>
                </x-ui.stack.stack-item>
            </x-ui.stack>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="stack" />
</x-ui.docs>
