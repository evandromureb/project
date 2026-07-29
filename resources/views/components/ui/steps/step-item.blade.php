@props([
    'title' => null,
    'description' => null,
    'icon' => null,
    'optional' => false,
    'done' => false,
    'active' => false,
    'error' => false,
    'disabled' => false,
    'pulse' => false,
    'href' => null,
])

@aware([
    'orientation' => 'horizontal',
    'labelPlacement' => 'bottom',
    'color' => 'primary',
    'size' => 'md',
    'lineStyle' => 'solid',
    'markerStyle' => 'solid',
    'numbered' => true,
    'clickable' => false,
    'card' => false,
    'compact' => false,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if (! in_array($markerStyle, ['solid', 'soft', 'outline', 'dot'], true)) {
        $markerStyle = 'solid';
    }

    // Precedência de status: erro > concluído > ativo > pendente. Um item só
    // pode estar em um desses estados por vez.
    $status = match (true) {
        $error => 'error',
        $done => 'done',
        $active => 'active',
        default => 'pending',
    };

    // "pending" nunca usa a cor do token (fica neutro, indicando que a etapa
    // ainda não foi alcançada); os demais estados usam a cor resolvida acima,
    // exceto "error" que sempre força "danger" independente de "color".
    $statusColor = $status === 'error' ? 'danger' : $color;

    /**
     * Todas as classes de cor precisam existir literalmente no arquivo para o
     * Tailwind gerá-las (nada de "border-{$statusColor}" interpolado).
     *
     * @var array{solid: string, soft: string, outline: string, dot: string, ring: string, halo: string, line: string, text: string, accent: string, cardActive: string, cardHover: string}
     */
    $palette = match ($statusColor) {
        'primary' => [
            'solid' => 'border-primary bg-primary text-primary-foreground',
            'soft' => 'border-primary bg-primary/15 text-primary',
            'outline' => 'border-primary bg-card text-primary',
            'dot' => 'bg-primary',
            'ring' => 'ring-primary/25',
            'halo' => 'before:bg-primary/40',
            'line' => 'border-primary',
            'text' => 'text-primary',
            'accent' => 'border-l-primary',
            'cardActive' => 'border-primary/40',
            'cardHover' => 'hover:border-primary/40',
        ],
        'secondary' => [
            'solid' => 'border-secondary bg-secondary text-secondary-foreground',
            'soft' => 'border-secondary bg-secondary/15 text-secondary',
            'outline' => 'border-secondary bg-card text-secondary',
            'dot' => 'bg-secondary',
            'ring' => 'ring-secondary/25',
            'halo' => 'before:bg-secondary/40',
            'line' => 'border-secondary',
            'text' => 'text-secondary',
            'accent' => 'border-l-secondary',
            'cardActive' => 'border-secondary/40',
            'cardHover' => 'hover:border-secondary/40',
        ],
        'success' => [
            'solid' => 'border-success bg-success text-success-foreground',
            'soft' => 'border-success bg-success/15 text-success',
            'outline' => 'border-success bg-card text-success',
            'dot' => 'bg-success',
            'ring' => 'ring-success/25',
            'halo' => 'before:bg-success/40',
            'line' => 'border-success',
            'text' => 'text-success',
            'accent' => 'border-l-success',
            'cardActive' => 'border-success/40',
            'cardHover' => 'hover:border-success/40',
        ],
        'warning' => [
            'solid' => 'border-warning bg-warning text-warning-foreground',
            'soft' => 'border-warning bg-warning/15 text-warning',
            'outline' => 'border-warning bg-card text-warning',
            'dot' => 'bg-warning',
            'ring' => 'ring-warning/25',
            'halo' => 'before:bg-warning/40',
            'line' => 'border-warning',
            'text' => 'text-warning',
            'accent' => 'border-l-warning',
            'cardActive' => 'border-warning/40',
            'cardHover' => 'hover:border-warning/40',
        ],
        'danger' => [
            'solid' => 'border-danger bg-danger text-danger-foreground',
            'soft' => 'border-danger bg-danger/15 text-danger',
            'outline' => 'border-danger bg-card text-danger',
            'dot' => 'bg-danger',
            'ring' => 'ring-danger/25',
            'halo' => 'before:bg-danger/40',
            'line' => 'border-danger',
            'text' => 'text-danger',
            'accent' => 'border-l-danger',
            'cardActive' => 'border-danger/40',
            'cardHover' => 'hover:border-danger/40',
        ],
        'info' => [
            'solid' => 'border-info bg-info text-info-foreground',
            'soft' => 'border-info bg-info/15 text-info',
            'outline' => 'border-info bg-card text-info',
            'dot' => 'bg-info',
            'ring' => 'ring-info/25',
            'halo' => 'before:bg-info/40',
            'line' => 'border-info',
            'text' => 'text-info',
            'accent' => 'border-l-info',
            'cardActive' => 'border-info/40',
            'cardHover' => 'hover:border-info/40',
        ],
    };

    $isHorizontal = $orientation === 'horizontal';
    $isRight = $isHorizontal && $labelPlacement === 'right';
    $isDot = $markerStyle === 'dot';
    $isReached = in_array($status, ['done', 'active', 'error'], true);
    $hasActionsSlot = isset($actions) && $actions->isNotEmpty();

    // Ícone padrão por status (check para concluído, exclamação para erro);
    // um "icon" explícito sempre vence. Some para "pending" — aí o número
    // (ou nada, se "numbered" estiver desligado) aparece.
    $defaultIcon = match ($status) {
        'done' => 'bi-check-lg',
        'error' => 'bi-exclamation-lg',
        default => null,
    };

    $resolvedIcon = $icon ?? $defaultIcon;

    // Halo animado como ::before com z-index negativo: fica atrás do próprio
    // marcador em vez de tingir o ícone/número por cima.
    $haloClasses = $pulse
        ? "before:absolute before:inset-0 before:-z-10 before:animate-ping before:rounded-full before:content-[''] {$palette['halo']}"
        : '';

    $sizeClasses = match ($size) {
        'sm' => 'size-6 text-[0.7rem]',
        'lg' => 'size-10 text-base',
        default => 'size-8 text-sm',
    };

    $dotSizeClasses = match ($size) {
        'sm' => 'size-2.5',
        'lg' => 'size-4',
        default => 'size-3',
    };

    // Marcador "pending" fica sempre neutro (borda cinza, sem cor de token) —
    // é o único jeito visual de dizer "ainda não chegou aqui" sem depender de
    // uma prop "muted" separada, como em <x-ui.timeline.timeline-item>.
    $markerToneClasses = match (true) {
        $isDot && $status === 'pending' => 'bg-border',
        $isDot => $palette['dot'],
        $status === 'pending' => 'border-border bg-card text-muted-foreground',
        default => $palette[$markerStyle],
    };

    $markerClasses = $isDot
        ? implode(' ', array_filter([
            'relative flex shrink-0 rounded-full',
            $dotSizeClasses,
            $markerToneClasses,
            $status === 'active' ? "ring-4 {$palette['ring']}" : '',
            $haloClasses,
        ]))
        : implode(' ', array_filter([
            'relative inline-flex shrink-0 items-center justify-center rounded-full border-2 font-semibold shadow-sm',
            $sizeClasses,
            $markerToneClasses,
            $status === 'active' ? "ring-4 {$palette['ring']}" : '',
            $haloClasses,
        ]));

    $lineStyleClasses = match ($lineStyle) {
        'dashed' => 'border-dashed',
        'dotted' => 'border-dotted',
        default => '',
    };

    $titleClasses = match ($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        default => 'text-sm',
    };

    $descriptionClasses = match ($size) {
        'sm' => 'text-[0.65rem]',
        'lg' => 'text-xs',
        default => 'text-[0.7rem]',
    };

    $titleToneClasses = match (true) {
        $status === 'pending' => 'text-muted-foreground',
        $status === 'active' => $palette['text'],
        $status === 'error' => 'text-danger',
        default => 'text-foreground',
    };

    $spacingClasses = match ($size) {
        'sm' => 'gap-2',
        'lg' => 'gap-4',
        default => 'gap-3',
    };

    // Espaçamento vertical entre itens fica no bloco de conteúdo (não no <li>):
    // assim a coluna do marcador (self-stretch) cobre o intervalo e a linha
    // fica contínua — mesma técnica de <x-ui.timeline.timeline-item>.
    $contentSpacing = $isHorizontal
        ? ''
        : ($compact
            ? 'pb-4'
            : match ($size) {
                'sm' => 'pb-6',
                'lg' => 'pb-10',
                default => 'pb-8',
            });

    $isInteractive = ! $disabled && ($clickable || $href);
    $tag = match (true) {
        $disabled => 'div',
        (bool) $href => 'a',
        $clickable => 'button',
        default => 'div',
    };

    $liClasses = match (true) {
        $isRight => 'relative flex min-w-0 flex-1 items-center',
        $isHorizontal => 'relative flex flex-1 flex-col items-center text-center',
        default => 'relative w-full',
    };

    // Alinha o centro do marcador com a primeira linha do conteúdo — com
    // "card" essa linha começa depois do padding interno do card.
    $markerTopPadding = match (true) {
        $isHorizontal => '',
        $card && $isDot => 'pt-5',
        $card => 'pt-2',
        $isDot => 'pt-1.5',
        default => '',
    };

    // Em "right", o marcador fica sozinho (sem a linha dentro) — a linha sai
    // depois do conteúdo e preenche o resto do <li>. Antes a linha vivia numa
    // coluna shrink-0 e nunca crescia até o próximo item.
    $markerColumnClasses = match (true) {
        $isRight => 'flex shrink-0 items-center',
        $isHorizontal => 'flex w-full items-center',
        default => implode(' ', array_filter([
            'flex flex-col items-center self-stretch',
            $markerTopPadding,
        ])),
    };

    $cardClasses = $card
        ? implode(' ', array_filter([
            'rounded-md border bg-card p-3.5 shadow-sm transition-[border-color,box-shadow] duration-200',
            match ($status) {
                'active', 'error' => "shadow-md {$palette['cardActive']}",
                'pending' => 'border-border',
                default => "border-border {$palette['cardHover']}",
            },
            ! $isHorizontal
                ? ($status === 'pending' ? 'border-l-2 border-l-border' : "border-l-2 {$palette['accent']}")
                : '',
        ]))
        : '';

    $contentClasses = implode(' ', array_filter([
        'min-w-0',
        $isRight ? 'ms-3 max-w-[11rem] shrink-0 text-left' : '',
        $isHorizontal && ! $isRight ? ($card ? 'mt-2 w-full max-w-[11rem] px-1' : 'mt-2 max-w-[9rem] px-1') : '',
        ! $isHorizontal ? 'flex-1 '.$contentSpacing : '',
        ! $isHorizontal && ! $card ? 'pt-0.5' : '',
    ]));

    $cardWrapperClasses = trim('min-w-0 '.$cardClasses);

    $triggerClasses = implode(' ', array_filter([
        'flex min-w-0 text-left transition-[opacity,colors] duration-150',
        $isRight ? 'w-full flex-row items-center' : '',
        $isHorizontal && ! $isRight ? 'w-full flex-col items-center' : '',
        ! $isHorizontal ? 'w-full flex-row items-start '.$spacingClasses : '',
        $disabled ? 'cursor-not-allowed opacity-50' : '',
        $isInteractive && ! $disabled ? 'cursor-pointer rounded-md hover:opacity-80 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary' : '',
    ]));

    $metaClasses = implode(' ', array_filter([
        'flex flex-wrap items-center gap-1.5',
        $isHorizontal && ! $isRight ? 'justify-center' : '',
    ]));
@endphp

<li
    @class([
        $liClasses,
        'first:[&_[data-line-before]]:invisible last:[&_[data-line]]:invisible',
        'last:[&_[data-content]]:pb-0',
    ])
>
    {{--
        $attributes vão no trigger (button/a/div), não no <li>: assim
        wire:click / @click / class do consumidor caem no elemento interativo,
        não num ancestral inerte. As classes estruturais (first:/last:) ficam
        no <li>, que é quem tem a posição entre os irmãos do <ol>.
    --}}
    <{{ $tag }}
        {{ $attributes->class([$triggerClasses]) }}
        @if ($tag === 'a') href="{{ $href }}" @endif
        @if ($tag === 'button') type="button" @endif
        @if ($disabled) aria-disabled="true" @endif
        @if ($status === 'active') aria-current="step" @endif
    >
        <div class="{{ $markerColumnClasses }}">
            @if ($isHorizontal && ! $isRight)
                <span
                    data-line-before
                    aria-hidden="true"
                    class="h-0 min-w-6 flex-1 border-t-2 {{ $lineStyleClasses }} {{ $isReached ? $palette['line'] : 'border-border' }}"
                ></span>
            @endif

            <span class="{{ $markerClasses }}" aria-hidden="true">
                @if ($resolvedIcon && ! $isDot)
                    <i class="bi {{ $resolvedIcon }} leading-none"></i>
                @elseif ($numbered && ! $isDot)
                    <span data-step-number class="leading-none"></span>
                @endif
            </span>

            @if ($isHorizontal && ! $isRight)
                <span
                    data-line
                    aria-hidden="true"
                    class="h-0 min-w-6 flex-1 border-t-2 {{ $lineStyleClasses }} {{ $status === 'done' ? $palette['line'] : 'border-border' }}"
                ></span>
            @elseif (! $isHorizontal)
                <span
                    data-line
                    aria-hidden="true"
                    class="mt-1.5 w-0 flex-1 border-l-2 {{ $lineStyleClasses }} {{ $status === 'done' ? $palette['line'] : 'border-border' }}"
                ></span>
            @endif
        </div>

        <div data-content class="{{ $contentClasses }}">
            <div class="{{ $cardWrapperClasses }}">
                @if ($title || $optional || $hasActionsSlot)
                    <div class="{{ $metaClasses }}">
                        @if ($title)
                            <p class="m-0 font-semibold {{ $titleToneClasses }} {{ $titleClasses }}">{{ $title }}</p>
                        @endif

                        @if ($optional)
                            <span class="rounded bg-muted px-1.5 py-0.5 text-[0.65rem] font-medium text-muted-foreground">Opcional</span>
                        @endif

                        {{ $actions ?? '' }}
                    </div>
                @endif

                @if ($description)
                    <p class="m-0 leading-relaxed text-muted-foreground {{ $title || $optional || $hasActionsSlot ? 'mt-0.5' : '' }} {{ $descriptionClasses }}">{{ $description }}</p>
                @endif

                @if ($slot->isNotEmpty())
                    <div class="mt-1 leading-relaxed text-muted-foreground {{ $descriptionClasses }}">
                        {{ $slot }}
                    </div>
                @endif
            </div>
        </div>

        @if ($isRight)
            <span
                data-line
                aria-hidden="true"
                class="ms-3 h-0 min-w-6 flex-1 border-t-2 {{ $lineStyleClasses }} {{ $status === 'done' ? $palette['line'] : 'border-border' }}"
            ></span>
        @endif
    </{{ $tag }}>
</li>
