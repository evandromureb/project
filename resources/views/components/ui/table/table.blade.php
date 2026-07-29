@props([
    'variant' => 'default',
    'size' => 'md',
    'striped' => false,
    'hover' => false,
    'bordered' => false,
    'borderless' => false,
    'responsive' => true,
    'sticky' => false,
    'rounded' => true,
    'color' => null,
    'headVariant' => 'muted',
    'layout' => 'auto',
    'captionSide' => 'top',
    'verticalAlign' => 'middle',
    'fixed' => false,
])

@php
    // Props compartilhadas com filhos via @aware — o consumidor não precisa
    // repetir size / headVariant / verticalAlign / color em cada célula.
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($variant, ['default', 'flush'], true)) {
        $variant = 'default';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($headVariant, ['muted', 'solid', 'plain'], true)) {
        $headVariant = 'muted';
    }

    if (! in_array($layout, ['auto', 'fixed'], true)) {
        $layout = 'auto';
    }

    if ($fixed) {
        $layout = 'fixed';
    }

    if (! in_array($captionSide, ['top', 'bottom'], true)) {
        $captionSide = 'top';
    }

    if (! in_array($verticalAlign, ['top', 'middle', 'bottom'], true)) {
        $verticalAlign = 'middle';
    }

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = null;
    }

    $responsiveBreakpoints = ['sm', 'md', 'lg', 'xl'];

    if ($responsive === true || $responsive === 1 || $responsive === 'true' || $responsive === '1') {
        $responsiveMode = 'always';
    } elseif (in_array($responsive, $responsiveBreakpoints, true)) {
        $responsiveMode = $responsive;
    } else {
        $responsiveMode = false;
    }

    $sizeClasses = match ($size) {
        'sm' => 'text-xs [&_[data-table-head]]:px-3 [&_[data-table-head]]:py-2 [&_[data-table-cell]]:px-3 [&_[data-table-cell]]:py-2',
        'lg' => 'text-base [&_[data-table-head]]:px-5 [&_[data-table-head]]:py-3.5 [&_[data-table-cell]]:px-5 [&_[data-table-cell]]:py-3.5',
        default => 'text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3',
    };

    $verticalAlignClasses = match ($verticalAlign) {
        'top' => '[&_[data-table-cell]]:align-top [&_[data-table-head]]:align-top',
        'bottom' => '[&_[data-table-cell]]:align-bottom [&_[data-table-head]]:align-bottom',
        default => '[&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle',
    };

    // Borda externa + radius no wrapper (não na <table>). Com sticky o scroll
    // vertical fica no shell (overflow-y-auto); sem sticky, overflow-hidden
    // garante o clip do radius.
    $shellClasses = match ($variant) {
        'flush' => 'rounded-none border-0',
        default => implode(' ', array_filter([
            $rounded ? 'rounded-md border border-border' : 'rounded-none border border-border',
            $sticky ? '' : 'overflow-hidden',
        ])),
    };

    $borderClasses = match (true) {
        $borderless => 'border-0 [&_[data-table-row]]:border-0 [&_[data-table-head]]:border-0 [&_[data-table-cell]]:border-0',
        $bordered => '[&_[data-table-head]]:border [&_[data-table-head]]:border-border [&_[data-table-cell]]:border [&_[data-table-cell]]:border-border',
        default => '[&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0',
    };

    $stripedPalette = match ($color) {
        'primary' => '[&_[data-table-body]_[data-table-row]:nth-child(odd)]:bg-primary/5',
        'secondary' => '[&_[data-table-body]_[data-table-row]:nth-child(odd)]:bg-secondary/5',
        'success' => '[&_[data-table-body]_[data-table-row]:nth-child(odd)]:bg-success/5',
        'warning' => '[&_[data-table-body]_[data-table-row]:nth-child(odd)]:bg-warning/5',
        'danger' => '[&_[data-table-body]_[data-table-row]:nth-child(odd)]:bg-danger/5',
        'info' => '[&_[data-table-body]_[data-table-row]:nth-child(odd)]:bg-info/5',
        default => '[&_[data-table-body]_[data-table-row]:nth-child(odd)]:bg-muted/40',
    };

    $hoverPalette = match ($color) {
        'primary' => '[&_[data-table-body]_[data-table-row]:hover]:bg-primary/10',
        'secondary' => '[&_[data-table-body]_[data-table-row]:hover]:bg-secondary/10',
        'success' => '[&_[data-table-body]_[data-table-row]:hover]:bg-success/10',
        'warning' => '[&_[data-table-body]_[data-table-row]:hover]:bg-warning/10',
        'danger' => '[&_[data-table-body]_[data-table-row]:hover]:bg-danger/10',
        'info' => '[&_[data-table-body]_[data-table-row]:hover]:bg-info/10',
        default => '[&_[data-table-body]_[data-table-row]:hover]:bg-muted/60',
    };

    // Fundo no <th> (não só no thead): sticky precisa de bg opaco na célula
    // para cobrir as linhas que passam por baixo.
    $headColorClasses = match ($color) {
        'primary' => '[&_[data-table-header]]:bg-primary [&_[data-table-header]_[data-table-head]]:bg-primary [&_[data-table-header]_[data-table-head]]:text-primary-foreground [&_[data-table-header]]:border-primary',
        'secondary' => '[&_[data-table-header]]:bg-secondary [&_[data-table-header]_[data-table-head]]:bg-secondary [&_[data-table-header]_[data-table-head]]:text-secondary-foreground [&_[data-table-header]]:border-secondary',
        'success' => '[&_[data-table-header]]:bg-success [&_[data-table-header]_[data-table-head]]:bg-success [&_[data-table-header]_[data-table-head]]:text-success-foreground [&_[data-table-header]]:border-success',
        'warning' => '[&_[data-table-header]]:bg-warning [&_[data-table-header]_[data-table-head]]:bg-warning [&_[data-table-header]_[data-table-head]]:text-warning-foreground [&_[data-table-header]]:border-warning',
        'danger' => '[&_[data-table-header]]:bg-danger [&_[data-table-header]_[data-table-head]]:bg-danger [&_[data-table-header]_[data-table-head]]:text-danger-foreground [&_[data-table-header]]:border-danger',
        'info' => '[&_[data-table-header]]:bg-info [&_[data-table-header]_[data-table-head]]:bg-info [&_[data-table-header]_[data-table-head]]:text-info-foreground [&_[data-table-header]]:border-info',
        default => '',
    };

    $headVariantClasses = match ($headVariant) {
        'solid' => $color !== null
            ? $headColorClasses
            : '[&_[data-table-header]]:bg-foreground [&_[data-table-header]_[data-table-head]]:bg-foreground [&_[data-table-header]_[data-table-head]]:text-background',
        // sticky + plain: card opaco; sem sticky pode ficar transparente.
        'plain' => $sticky
            ? '[&_[data-table-header]_[data-table-head]]:bg-card'
            : '[&_[data-table-header]]:bg-transparent',
        // muted/50 deixa ver o conteúdo sob o sticky — com sticky usa muted sólido.
        default => $sticky
            ? '[&_[data-table-header]]:bg-muted [&_[data-table-header]_[data-table-head]]:bg-muted'
            : '[&_[data-table-header]]:bg-muted/50',
    };

    // sticky no <th>: thead sticky é inconsistente entre browsers.
    $stickyClasses = $sticky
        ? '[&_[data-table-header]_[data-table-head]]:sticky [&_[data-table-header]_[data-table-head]]:top-0 [&_[data-table-header]_[data-table-head]]:z-20'
        : '';

    $responsiveClasses = match ($responsiveMode) {
        'always' => 'w-full overflow-x-auto',
        'sm' => 'w-full sm:overflow-x-auto',
        'md' => 'w-full md:overflow-x-auto',
        'lg' => 'w-full lg:overflow-x-auto',
        'xl' => 'w-full xl:overflow-x-auto',
        default => 'w-full',
    };

    $responsiveAttr = match ($responsiveMode) {
        false => 'false',
        'always' => 'true',
        default => $responsiveMode,
    };

    $tableClasses = implode(' ', array_filter([
        'ui-table w-full border-collapse text-left text-foreground',
        $sizeClasses,
        $verticalAlignClasses,
        $borderClasses,
        $headVariantClasses,
        $stickyClasses,
        $layout === 'fixed' ? 'table-fixed' : 'table-auto',
        $captionSide === 'top' ? 'caption-top' : 'caption-bottom',
        $striped ? $stripedPalette : '',
        $hover ? $hoverPalette.' [&_[data-table-body]_[data-table-row]]:transition-colors' : '',
    ]));
@endphp

<div
    data-table-shell
    data-variant="{{ $variant }}"
    data-size="{{ $size }}"
    data-responsive="{{ $responsiveAttr }}"
    data-striped="{{ $striped ? 'true' : 'false' }}"
    data-hover="{{ $hover ? 'true' : 'false' }}"
    data-head-variant="{{ $headVariant }}"
    @if ($color) data-color="{{ $color }}" @endif
    {{
        $attributes->class([
            'ui-table-shell relative',
            $shellClasses,
            $responsiveClasses,
            $sticky ? 'max-h-[min(28rem,70vh)] overflow-y-auto' : '',
        ])
    }}
>
    <table data-table @class([$tableClasses])>
        {{ $slot }}
    </table>
</div>
