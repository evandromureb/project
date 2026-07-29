@props([
    'title' => null,
    'date' => null,
    'icon' => null,
    'color' => null,
    'markerStyle' => null,
    'href' => null,
    'active' => false,
    'muted' => false,
    'pulse' => false,
    'side' => null,
])

@aware([
    'orientation' => 'vertical',
    'variant' => 'line',
    'color' => 'primary',
    'size' => 'md',
    'lineStyle' => 'solid',
    'markerStyle' => 'soft',
    'card' => false,
    'compact' => false,
    'numbered' => false,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($markerStyle, ['soft', 'solid', 'outline', 'dot'], true)) {
        $markerStyle = 'soft';
    }

    /**
     * Todas as classes de cor precisam existir literalmente no arquivo para o
     * Tailwind gerá-las (nada de "border-{$color}" interpolado).
     *
     * @var array{soft: string, solid: string, outline: string, dot: string, ring: string, halo: string, line: string, accent: string, cardActive: string, cardHover: string, link: string}
     */
    $palette = match ($color) {
        'primary' => [
            'soft' => 'border-primary bg-primary/15 text-primary',
            'solid' => 'border-primary bg-primary text-primary-foreground',
            'outline' => 'border-primary bg-card text-primary',
            'dot' => 'bg-primary',
            'ring' => 'ring-primary/25',
            'halo' => 'before:bg-primary/40',
            'line' => 'border-primary',
            'accent' => 'border-l-primary',
            'cardActive' => 'border-primary/40',
            'cardHover' => 'hover:border-primary/40',
            'link' => 'hover:text-primary',
        ],
        'secondary' => [
            'soft' => 'border-secondary bg-secondary/15 text-secondary',
            'solid' => 'border-secondary bg-secondary text-secondary-foreground',
            'outline' => 'border-secondary bg-card text-secondary',
            'dot' => 'bg-secondary',
            'ring' => 'ring-secondary/25',
            'halo' => 'before:bg-secondary/40',
            'line' => 'border-secondary',
            'accent' => 'border-l-secondary',
            'cardActive' => 'border-secondary/40',
            'cardHover' => 'hover:border-secondary/40',
            'link' => 'hover:text-secondary',
        ],
        'success' => [
            'soft' => 'border-success bg-success/15 text-success',
            'solid' => 'border-success bg-success text-success-foreground',
            'outline' => 'border-success bg-card text-success',
            'dot' => 'bg-success',
            'ring' => 'ring-success/25',
            'halo' => 'before:bg-success/40',
            'line' => 'border-success',
            'accent' => 'border-l-success',
            'cardActive' => 'border-success/40',
            'cardHover' => 'hover:border-success/40',
            'link' => 'hover:text-success',
        ],
        'warning' => [
            'soft' => 'border-warning bg-warning/15 text-warning',
            'solid' => 'border-warning bg-warning text-warning-foreground',
            'outline' => 'border-warning bg-card text-warning',
            'dot' => 'bg-warning',
            'ring' => 'ring-warning/25',
            'halo' => 'before:bg-warning/40',
            'line' => 'border-warning',
            'accent' => 'border-l-warning',
            'cardActive' => 'border-warning/40',
            'cardHover' => 'hover:border-warning/40',
            'link' => 'hover:text-warning',
        ],
        'danger' => [
            'soft' => 'border-danger bg-danger/15 text-danger',
            'solid' => 'border-danger bg-danger text-danger-foreground',
            'outline' => 'border-danger bg-card text-danger',
            'dot' => 'bg-danger',
            'ring' => 'ring-danger/25',
            'halo' => 'before:bg-danger/40',
            'line' => 'border-danger',
            'accent' => 'border-l-danger',
            'cardActive' => 'border-danger/40',
            'cardHover' => 'hover:border-danger/40',
            'link' => 'hover:text-danger',
        ],
        'info' => [
            'soft' => 'border-info bg-info/15 text-info',
            'solid' => 'border-info bg-info text-info-foreground',
            'outline' => 'border-info bg-card text-info',
            'dot' => 'bg-info',
            'ring' => 'ring-info/25',
            'halo' => 'before:bg-info/40',
            'line' => 'border-info',
            'accent' => 'border-l-info',
            'cardActive' => 'border-info/40',
            'cardHover' => 'hover:border-info/40',
            'link' => 'hover:text-info',
        ],
    };

    $isHorizontal = $orientation === 'horizontal';
    $isAlternate = ! $isHorizontal && $variant === 'alternate';
    $isGutter = ! $isHorizontal && $variant === 'gutter';
    $isDot = $markerStyle === 'dot';

    $hasMarkerSlot = isset($marker) && $marker->isNotEmpty();
    $hasActionsSlot = isset($actions) && $actions->isNotEmpty();

    // Halo animado como ::before com z-index negativo: fica atrás do próprio
    // marcador (o marcador é "relative" sem z-index, logo não cria contexto de
    // empilhamento) em vez de tingir o ícone por cima.
    $haloClasses = $pulse
        ? "before:absolute before:inset-0 before:-z-10 before:animate-ping before:rounded-full before:content-[''] {$palette['halo']}"
        : '';

    $markerClasses = $isDot
        ? implode(' ', array_filter([
            'relative flex shrink-0 rounded-full',
            match ($size) {
                'sm' => 'size-2.5',
                'lg' => 'size-4',
                default => 'size-3',
            },
            $palette['dot'],
            $active ? "ring-4 {$palette['ring']}" : '',
            $haloClasses,
        ]))
        : implode(' ', array_filter([
            'relative inline-flex shrink-0 items-center justify-center rounded-full border-2 font-semibold shadow-sm',
            match ($size) {
                'sm' => 'size-6 text-[0.7rem]',
                'lg' => 'size-10 text-base',
                default => 'size-8 text-sm',
            },
            $active ? $palette['solid'] : $palette[$markerStyle],
            $active ? "ring-4 {$palette['ring']}" : '',
            $haloClasses,
        ]));

    $lineStyleClasses = match ($lineStyle) {
        'dashed' => 'border-dashed',
        'dotted' => 'border-dotted',
        default => '',
    };

    // Espaçamento entre itens fica no bloco de conteúdo (não como padding do
    // <li>): assim a coluna do marcador — que é "self-stretch" — cobre também
    // esse espaço e a linha fica contínua de um item ao outro.
    $spacingClasses = $compact
        ? 'pb-4'
        : match ($size) {
            'sm' => 'pb-6',
            'lg' => 'pb-10',
            default => 'pb-8',
        };

    $titleClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $dateClasses = match ($size) {
        'sm' => 'text-[0.65rem]',
        'lg' => 'text-xs',
        default => 'text-[0.7rem]',
    };

    $bodyClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-sm',
        default => 'text-[0.8125rem]',
    };

    $forcedSide = in_array($side, ['left', 'right'], true) ? $side : null;

    // Zigue-zague sem índice em PHP: o <li> lê a própria posição estrutural
    // (odd/even) e reposiciona o único bloco de conteúdo na coluna 1 ou 3 do
    // grid — mesma técnica de "first:"/"last:" de <x-ui.breadcrumb.breadcrumb-item>.
    // Abaixo de "sm" o layout colapsa para uma coluna só (conteúdo à direita).
    $alternateSwapClasses = $isAlternate && ! $forcedSide
        ? 'odd:[&>[data-content]]:sm:col-start-1 odd:[&>[data-content]]:sm:text-right even:[&>[data-content]]:sm:col-start-3 even:[&>[data-content]]:sm:text-left odd:[&_[data-meta]]:sm:justify-end'
        : '';

    $forcedSideClasses = match ($isAlternate ? $forcedSide : null) {
        'left' => 'sm:col-start-1 sm:text-right [&_[data-meta]]:sm:justify-end',
        'right' => 'sm:col-start-3 sm:text-left',
        default => '',
    };

    $liClasses = match (true) {
        $isHorizontal => 'relative flex flex-1 flex-col items-center gap-2 text-center',
        $isAlternate => 'relative grid grid-cols-[auto_1fr] items-start gap-x-4 sm:grid-cols-[1fr_auto_1fr] sm:gap-x-6',
        $isGutter => 'relative grid grid-cols-[max-content_auto_1fr] items-start gap-x-3 sm:gap-x-4',
        default => 'relative flex '.match ($size) {
            'sm' => 'gap-3',
            'lg' => 'gap-5',
            default => 'gap-4',
        },
    };

    // Alinha o centro do marcador com a primeira linha de texto do conteúdo —
    // com "card" essa linha começa depois do padding interno do card.
    $markerTopPadding = match (true) {
        $isHorizontal => '',
        $card && $isDot => 'pt-5',
        $card => 'pt-2',
        $isDot && ! $hasMarkerSlot => 'pt-1.5',
        default => '',
    };

    $markerColumnClasses = implode(' ', array_filter([
        $isHorizontal ? 'flex w-full items-center' : 'flex flex-col items-center self-stretch',
        $isAlternate ? 'col-start-1 row-start-1 sm:col-start-2' : '',
        $markerTopPadding,
    ]));

    $cardClasses = $card
        ? implode(' ', array_filter([
            'rounded-md border bg-card p-3.5 shadow-sm transition-[border-color,box-shadow] duration-200',
            $active ? "shadow-md {$palette['cardActive']}" : "border-border {$palette['cardHover']}",
            // Faixa colorida na borda encostada na linha — só quando o
            // conteúdo está sempre à direita dela.
            ! $isAlternate && ! $isHorizontal ? "border-l-2 {$palette['accent']}" : '',
        ]))
        : '';

    $contentClasses = implode(' ', array_filter([
        'min-w-0',
        // Em horizontal os cards precisam de "w-full" para todos ficarem com a
        // mesma largura (a do <li>, que é flex-1) em vez de encolher no texto.
        $isHorizontal ? ($card ? 'w-full max-w-[11rem] px-1' : 'max-w-[11rem] px-1') : $spacingClasses,
        $isAlternate ? 'col-start-2 row-start-1 text-left' : '',
        ! $isHorizontal && ! $isAlternate && ! $isGutter ? 'flex-1' : '',
        ! $isHorizontal && ! $card ? 'pt-0.5' : '',
        $forcedSideClasses,
    ]));

    $cardWrapperClasses = trim("min-w-0 {$cardClasses}");

    // Título e data na mesma linha (data à direita) só na variante "line" —
    // nas outras o conteúdo é estreito ou centralizado, então empilham.
    $stackHeader = $isHorizontal || $isAlternate || $isGutter;

    $metaClasses = implode(' ', array_filter([
        'flex flex-wrap items-center gap-2',
        $stackHeader ? '' : 'ms-auto shrink-0',
        $isHorizontal ? 'justify-center' : '',
    ]));
@endphp

<li
    {{
        $attributes->class([
            $liClasses,
            'first:[&_[data-line-before]]:invisible last:[&_[data-line]]:invisible',
            'last:[&>[data-content]]:pb-0',
            $alternateSwapClasses,
            $muted ? 'opacity-60' : '',
        ])
    }}
>
    @if ($isGutter)
        <div class="row-start-1 {{ $card ? 'pt-3.5' : 'pt-0.5' }} text-right font-medium whitespace-nowrap text-muted-foreground {{ $dateClasses }}">
            {{ $date }}
        </div>
    @endif

    <div class="{{ $markerColumnClasses }}">
        @if ($isHorizontal)
            <span
                data-line-before
                aria-hidden="true"
                class="h-0 min-w-6 flex-1 border-t-2 {{ $lineStyleClasses }} {{ $active ? $palette['line'] : 'border-border' }}"
            ></span>
        @endif

        @if ($hasMarkerSlot)
            {{ $marker }}
        @else
            <span class="{{ $markerClasses }}" aria-hidden="true">
                @if ($icon && ! $isDot)
                    <i class="bi {{ $icon }} leading-none"></i>
                @elseif ($numbered && ! $isDot)
                    <span data-timeline-number class="leading-none"></span>
                @endif
            </span>
        @endif

        @if ($isHorizontal)
            <span
                data-line
                aria-hidden="true"
                class="h-0 min-w-6 flex-1 border-t-2 {{ $lineStyleClasses }} border-border"
            ></span>
        @else
            <span
                data-line
                aria-hidden="true"
                class="mt-1.5 w-0 flex-1 border-l-2 {{ $lineStyleClasses }} border-border"
            ></span>
        @endif
    </div>

    <div data-content data-side="{{ $forcedSide ?? 'auto' }}" class="{{ $contentClasses }}">
        <div class="{{ $cardWrapperClasses }}">
            <div class="{{ $stackHeader ? 'flex flex-col gap-0.5' : 'flex flex-wrap items-baseline gap-x-3 gap-y-0.5' }}">
                @if ($title)
                    @if ($href)
                        <a
                            href="{{ $href }}"
                            class="m-0 font-semibold text-foreground underline-offset-4 transition-colors duration-150 hover:underline {{ $palette['link'] }} {{ $titleClasses }}"
                        >{{ $title }}</a>
                    @else
                        <p class="m-0 font-semibold text-foreground {{ $titleClasses }}">{{ $title }}</p>
                    @endif
                @endif

                @if ((! $isGutter && $date) || $hasActionsSlot)
                    <div data-meta class="{{ $metaClasses }}">
                        @if (! $isGutter && $date)
                            <span class="text-muted-foreground {{ $dateClasses }}">{{ $date }}</span>
                        @endif

                        {{ $actions ?? '' }}
                    </div>
                @endif
            </div>

            @if ($slot->isNotEmpty())
                <div class="mt-1 leading-relaxed text-muted-foreground {{ $bodyClasses }}">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>
</li>
