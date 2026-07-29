@props([
    'title' => null,
    'subtitle' => null,
    'badge' => null,
    'badgeColor' => 'primary',
    'badgeVariant' => 'soft',
    'color' => null,
    'variant' => 'plain',
    'borderAccent' => null,
    'flush' => false,
    'headerClass' => null,
    'bodyClass' => null,
    'footerClass' => null,
    'shadow' => true,
    'loading' => false,
    'href' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = null;
    }

    if (! in_array($variant, ['plain', 'solid', 'soft', 'outline'], true)) {
        $variant = 'plain';
    }

    if (! in_array($badgeColor, $tokenColors, true)) {
        $badgeColor = 'primary';
    }

    if (! in_array($badgeVariant, ['soft', 'solid', 'outline', 'soft-border'], true)) {
        $badgeVariant = 'soft';
    }

    $hasColor = $color !== null;
    $isStretchedLink = filled($href);
    $hasHeaderSlot = isset($header) && $header->isNotEmpty();
    $hasToolbar = isset($toolbar) && $toolbar->isNotEmpty();
    $hasFooter = isset($footer) && $footer->isNotEmpty();
    $hasBadge = $badge !== null && $badge !== false && $badge !== '';
    $showHeader = $hasHeaderSlot || filled($title) || filled($subtitle) || $hasBadge || $hasToolbar;

    $solidClasses = $hasColor ? match ($color) {
        'primary' => 'border-primary bg-primary text-primary-foreground [&_.card-title]:text-primary-foreground [&_.card-header]:border-primary-foreground/20 [&_.card-footer]:border-primary-foreground/20 [&_.text-muted-foreground]:text-primary-foreground/80',
        'secondary' => 'border-secondary bg-secondary text-secondary-foreground [&_.card-title]:text-secondary-foreground [&_.card-header]:border-secondary-foreground/20 [&_.card-footer]:border-secondary-foreground/20 [&_.text-muted-foreground]:text-secondary-foreground/80',
        'success' => 'border-success bg-success text-success-foreground [&_.card-title]:text-success-foreground [&_.card-header]:border-success-foreground/20 [&_.card-footer]:border-success-foreground/20 [&_.text-muted-foreground]:text-success-foreground/80',
        'warning' => 'border-warning bg-warning text-warning-foreground [&_.card-title]:text-warning-foreground [&_.card-header]:border-warning-foreground/20 [&_.card-footer]:border-warning-foreground/20 [&_.text-muted-foreground]:text-warning-foreground/80',
        'danger' => 'border-danger bg-danger text-danger-foreground [&_.card-title]:text-danger-foreground [&_.card-header]:border-danger-foreground/20 [&_.card-footer]:border-danger-foreground/20 [&_.text-muted-foreground]:text-danger-foreground/80',
        'info' => 'border-info bg-info text-info-foreground [&_.card-title]:text-info-foreground [&_.card-header]:border-info-foreground/20 [&_.card-footer]:border-info-foreground/20 [&_.text-muted-foreground]:text-info-foreground/80',
    } : null;

    $softClasses = $hasColor ? match ($color) {
        'primary' => 'border-primary/25 bg-primary/10 text-primary [&_.card-title]:text-primary [&_.card-header]:border-primary/15 [&_.card-footer]:border-primary/15',
        'secondary' => 'border-secondary/25 bg-secondary/10 text-secondary [&_.card-title]:text-secondary [&_.card-header]:border-secondary/15 [&_.card-footer]:border-secondary/15',
        'success' => 'border-success/25 bg-success/10 text-success [&_.card-title]:text-success [&_.card-header]:border-success/15 [&_.card-footer]:border-success/15',
        'warning' => 'border-warning/25 bg-warning/10 text-warning [&_.card-title]:text-warning [&_.card-header]:border-warning/15 [&_.card-footer]:border-warning/15',
        'danger' => 'border-danger/25 bg-danger/10 text-danger [&_.card-title]:text-danger [&_.card-header]:border-danger/15 [&_.card-footer]:border-danger/15',
        'info' => 'border-info/25 bg-info/10 text-info [&_.card-title]:text-info [&_.card-header]:border-info/15 [&_.card-footer]:border-info/15',
    } : null;

    $outlineClasses = $hasColor ? match ($color) {
        'primary' => 'border-primary bg-card text-primary [&_.card-title]:text-primary',
        'secondary' => 'border-secondary bg-card text-secondary [&_.card-title]:text-secondary',
        'success' => 'border-success bg-card text-success [&_.card-title]:text-success',
        'warning' => 'border-warning bg-card text-warning [&_.card-title]:text-warning',
        'danger' => 'border-danger bg-card text-danger [&_.card-title]:text-danger',
        'info' => 'border-info bg-card text-info [&_.card-title]:text-info',
    } : null;

    $colorClasses = match ($variant) {
        'solid' => $solidClasses,
        'soft' => $softClasses,
        'outline' => $outlineClasses,
        default => null,
    };

    $borderAccentClasses = ($borderAccent !== null && in_array($borderAccent, $tokenColors, true))
        ? match ($borderAccent) {
            'primary' => 'border-l-4 border-l-primary',
            'secondary' => 'border-l-4 border-l-secondary',
            'success' => 'border-l-4 border-l-success',
            'warning' => 'border-l-4 border-l-warning',
            'danger' => 'border-l-4 border-l-danger',
            'info' => 'border-l-4 border-l-info',
        }
        : null;
@endphp

{{--
    Shell de widget de dashboard: header com título +
    toolbar, body (flush para tabelas/gráficos), footer opcional. Conteúdo
    especializa via slot — stats, charts, lists, tables, feeds, mixed.
--}}
<div
    {{
        $attributes->class([
            'ui-widget card flex flex-col overflow-hidden',
            'relative' => $isStretchedLink,
            $shadow ? null : 'shadow-none',
            $colorClasses,
            $borderAccentClasses,
        ])
    }}
    @if ($loading) aria-busy="true" @endif
>
    @if ($isStretchedLink)
        <a href="{{ $href }}" class="absolute inset-0 z-[1] rounded-[inherit]" aria-label="{{ $title ?? 'Abrir' }}"></a>
    @endif

    @if ($showHeader)
        <div @class([
            'card-header',
            $headerClass,
            $isStretchedLink ? 'relative z-[2]' : null,
        ])>
            @if ($hasHeaderSlot)
                {{ $header }}
            @else
                <div class="min-w-0 flex-1">
                    <div class="flex flex-wrap items-center gap-2">
                        @if (filled($title))
                            <h5 class="card-title">{{ $title }}</h5>
                        @endif

                        @if ($hasBadge)
                            <x-ui.badge :color="$badgeColor" :variant="$badgeVariant" size="sm" pill>
                                {{ $badge }}
                            </x-ui.badge>
                        @endif
                    </div>

                    @if (filled($subtitle))
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">{{ $subtitle }}</p>
                    @endif
                </div>

                @if ($hasToolbar)
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        {{ $toolbar }}
                    </div>
                @endif
            @endif
        </div>
    @endif

    <div @class([
        'ui-widget-body flex-1',
        $flush ? '' : 'card-body',
        $bodyClass,
        $isStretchedLink ? 'relative z-[2]' : null,
    ])>
        @if ($loading)
            <div class="flex flex-col gap-3 {{ $flush ? 'p-5' : '' }}">
                <x-ui.skeleton class="h-4 w-1/3" />
                <x-ui.skeleton class="h-24 w-full" />
                <x-ui.skeleton class="h-4 w-2/3" />
            </div>
        @else
            {{ $slot }}
        @endif
    </div>

    @if ($hasFooter)
        <div @class([
            'card-footer',
            $footerClass,
            $isStretchedLink ? 'relative z-[2]' : null,
        ])>
            {{ $footer }}
        </div>
    @endif
</div>
