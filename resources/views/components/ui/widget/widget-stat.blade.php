@props([
    'title' => null,
    'value' => null,
    'prefix' => null,
    'suffix' => null,
    'description' => null,
    'icon' => null,
    'iconVariant' => 'soft',
    'iconPosition' => 'end',
    'color' => 'primary',
    'variant' => 'plain',
    'size' => 'md',
    'layout' => 'tile',
    'trend' => null,
    'trendValue' => null,
    'trendLabel' => null,
    'trendInverse' => false,
    'progress' => null,
    'progressMax' => 100,
    'compare' => null,
    'link' => null,
    'linkLabel' => null,
    'badge' => null,
    'badgeColor' => null,
    'animate' => false,
    'animateDuration' => 2000,
    'decimals' => 0,
    'loading' => false,
    'href' => null,
    'borderAccent' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($variant, ['plain', 'solid', 'soft', 'outline'], true)) {
        $variant = 'plain';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    // tile = ícone + valor + trend badge + link
    // counter = valor grande + vs previous month
    // progress = valor + compare + barra
    // compact = ícone ao lado, mínimo
    // stacked = ícone no topo, centrado
    if (! in_array($layout, ['tile', 'counter', 'progress', 'compact', 'stacked'], true)) {
        $layout = 'tile';
    }

    if (! in_array($iconVariant, ['soft', 'solid', 'outline', 'none'], true)) {
        $iconVariant = 'soft';
    }

    if (! in_array($iconPosition, ['start', 'end'], true)) {
        $iconPosition = 'end';
    }

    if (! in_array($trend, [null, 'up', 'down', 'flat'], true)) {
        $trend = null;
    }

    $badgeColor = $badgeColor ?? $color;

    if (! in_array($badgeColor, $tokenColors, true)) {
        $badgeColor = $color;
    }

    $isStretchedLink = filled($href);
    $hasIcon = filled($icon) || isset($iconSlot);
    $hasTrend = $trend !== null || filled($trendValue) || isset($trendSlot);
    $hasProgress = $progress !== null && $progress !== false && $progress !== '';
    $hasValue = ($value !== null && $value !== '') || isset($valueSlot);
    $hasLink = filled($link) || filled($linkLabel);
    $useCountup = $animate && is_numeric($value) && ! isset($valueSlot) && ! $loading;

    $solidClasses = match ($color) {
        'primary' => 'border-primary bg-primary text-primary-foreground [&_.ui-widget-stat-title]:text-primary-foreground/80 [&_.ui-widget-stat-value]:text-primary-foreground [&_.ui-widget-stat-desc]:text-primary-foreground/70',
        'secondary' => 'border-secondary bg-secondary text-secondary-foreground [&_.ui-widget-stat-title]:text-secondary-foreground/80 [&_.ui-widget-stat-value]:text-secondary-foreground [&_.ui-widget-stat-desc]:text-secondary-foreground/70',
        'success' => 'border-success bg-success text-success-foreground [&_.ui-widget-stat-title]:text-success-foreground/80 [&_.ui-widget-stat-value]:text-success-foreground [&_.ui-widget-stat-desc]:text-success-foreground/70',
        'warning' => 'border-warning bg-warning text-warning-foreground [&_.ui-widget-stat-title]:text-warning-foreground/80 [&_.ui-widget-stat-value]:text-warning-foreground [&_.ui-widget-stat-desc]:text-warning-foreground/70',
        'danger' => 'border-danger bg-danger text-danger-foreground [&_.ui-widget-stat-title]:text-danger-foreground/80 [&_.ui-widget-stat-value]:text-danger-foreground [&_.ui-widget-stat-desc]:text-danger-foreground/70',
        'info' => 'border-info bg-info text-info-foreground [&_.ui-widget-stat-title]:text-info-foreground/80 [&_.ui-widget-stat-value]:text-info-foreground [&_.ui-widget-stat-desc]:text-info-foreground/70',
    };

    $softClasses = match ($color) {
        'primary' => 'border-primary/25 bg-primary/10 [&_.ui-widget-stat-value]:text-primary',
        'secondary' => 'border-secondary/25 bg-secondary/10 [&_.ui-widget-stat-value]:text-secondary',
        'success' => 'border-success/25 bg-success/10 [&_.ui-widget-stat-value]:text-success',
        'warning' => 'border-warning/25 bg-warning/10 [&_.ui-widget-stat-value]:text-warning',
        'danger' => 'border-danger/25 bg-danger/10 [&_.ui-widget-stat-value]:text-danger',
        'info' => 'border-info/25 bg-info/10 [&_.ui-widget-stat-value]:text-info',
    };

    $outlineClasses = match ($color) {
        'primary' => 'border-primary bg-card [&_.ui-widget-stat-value]:text-primary',
        'secondary' => 'border-secondary bg-card [&_.ui-widget-stat-value]:text-secondary',
        'success' => 'border-success bg-card [&_.ui-widget-stat-value]:text-success',
        'warning' => 'border-warning bg-card [&_.ui-widget-stat-value]:text-warning',
        'danger' => 'border-danger bg-card [&_.ui-widget-stat-value]:text-danger',
        'info' => 'border-info bg-card [&_.ui-widget-stat-value]:text-info',
    };

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

    $paddingClasses = match ($size) {
        'sm' => 'p-4',
        'lg' => 'p-6',
        default => 'p-5',
    };

    $valueSizeClasses = match ($size) {
        'sm' => 'text-xl',
        'lg' => 'text-3xl',
        default => 'text-2xl',
    };

    $iconBoxSize = match ($size) {
        'sm' => 'sm',
        'lg' => 'lg',
        default => 'md',
    };

    $resolvedTrend = $trend;

    if ($resolvedTrend === null && filled($trendValue)) {
        $raw = trim((string) $trendValue);
        $resolvedTrend = str_starts_with($raw, '-')
            ? 'down'
            : (str_starts_with($raw, '+') || $raw === '0%' || $raw === '0.00 %' ? (str_starts_with($raw, '+') ? 'up' : 'flat') : 'up');
    }

    $trendLooksGood = $trendInverse
        ? $resolvedTrend === 'down'
        : $resolvedTrend === 'up';
    $trendLooksBad = $trendInverse
        ? $resolvedTrend === 'up'
        : $resolvedTrend === 'down';

    $trendColorClasses = match (true) {
        $trendLooksGood => 'text-success',
        $trendLooksBad => 'text-danger',
        default => 'text-muted-foreground',
    };

    $trendBadgeColor = match (true) {
        $trendLooksGood => 'success',
        $trendLooksBad => 'danger',
        default => 'secondary',
    };

    $trendIcon = match ($resolvedTrend) {
        'up' => 'bi-arrow-up',
        'down' => 'bi-arrow-down',
        'flat' => 'bi-arrow-right',
        default => null,
    };

    $progressValue = $hasProgress ? max(0, (float) $progress) : 0;
@endphp

<div
    {{
        $attributes->class([
            'ui-widget-stat card relative overflow-hidden',
            $paddingClasses,
            $colorClasses,
            $borderAccentClasses,
            'text-center' => $layout === 'stacked',
        ])
    }}
    @if ($loading) aria-busy="true" @endif
>
    @if ($isStretchedLink)
        <a href="{{ $href }}" class="absolute inset-0 z-[1] rounded-[inherit]" aria-label="{{ $title ?? 'Abrir' }}"></a>
    @endif

    @if ($loading)
        <div class="flex flex-col gap-3">
            <x-ui.skeleton class="h-3 w-24" />
            <x-ui.skeleton class="h-8 w-28" />
            <x-ui.skeleton class="h-3 w-36" />
        </div>
    @elseif ($layout === 'compact')
        <div class="relative z-[2] flex items-center gap-4 {{ $iconPosition === 'end' ? 'flex-row-reverse' : '' }}">
            @if ($hasIcon)
                <div class="ui-widget-stat-icon shrink-0">
                    @isset($iconSlot)
                        {{ $iconSlot }}
                    @else
                        <x-ui.icon :name="$icon" :color="$color" :variant="$iconVariant === 'none' ? 'none' : $iconVariant" :box-size="$iconBoxSize" shape="circle" />
                    @endisset
                </div>
            @endif

            <div class="min-w-0 flex-1 {{ $iconPosition === 'end' ? 'text-start' : '' }}">
                @if (filled($title))
                    <p class="ui-widget-stat-title mb-1 text-xs font-medium uppercase tracking-wide text-muted-foreground">{{ $title }}</p>
                @endif

                @if ($hasValue)
                    <div class="ui-widget-stat-value {{ $valueSizeClasses }} font-semibold tabular-nums tracking-tight text-card-foreground">
                        @isset($valueSlot)
                            {{ $valueSlot }}
                        @elseif ($useCountup)
                            <x-ui.countup :value="(float) $value" :prefix="$prefix ?? ''" :suffix="$suffix ?? ''" :decimals="$decimals" :duration="$animateDuration" :size="match ($size) { 'sm' => 'sm', 'lg' => 'xl', default => 'md' }" weight="semibold" color="current" class="!gap-0" />
                        @else
                            @if (filled($prefix))<span class="text-[0.55em] opacity-80">{{ $prefix }}</span>@endif{{ $value }}@if (filled($suffix))<span class="text-[0.55em] opacity-80">{{ $suffix }}</span>@endif
                        @endisset
                    </div>
                @endif

                @if ($hasTrend)
                    <div class="mt-1 flex flex-wrap items-center gap-1 text-xs {{ $trendColorClasses }}">
                        @isset($trendSlot)
                            {{ $trendSlot }}
                        @else
                            @if ($trendIcon)<i class="bi {{ $trendIcon }}" aria-hidden="true"></i>@endif
                            @if (filled($trendValue))<span class="font-medium">{{ $trendValue }}</span>@endif
                            @if (filled($trendLabel))<span class="text-muted-foreground">{{ $trendLabel }}</span>@endif
                        @endisset
                    </div>
                @endif
            </div>
        </div>
    @elseif ($layout === 'stacked')
        <div class="relative z-[2] flex flex-col items-center gap-3">
            @if ($hasIcon)
                <div class="ui-widget-stat-icon">
                    @isset($iconSlot)
                        {{ $iconSlot }}
                    @else
                        <x-ui.icon :name="$icon" :color="$color" :variant="$iconVariant === 'none' ? 'none' : $iconVariant" :box-size="$iconBoxSize" shape="circle" />
                    @endisset
                </div>
            @endif

            @if (filled($title))
                <p class="ui-widget-stat-title mb-0 text-xs font-medium uppercase tracking-wide text-muted-foreground">{{ $title }}</p>
            @endif

            @if ($hasValue)
                <div class="ui-widget-stat-value {{ $valueSizeClasses }} font-semibold tabular-nums tracking-tight text-card-foreground">
                    @isset($valueSlot)
                        {{ $valueSlot }}
                    @elseif ($useCountup)
                        <x-ui.countup :value="(float) $value" :prefix="$prefix ?? ''" :suffix="$suffix ?? ''" :decimals="$decimals" :duration="$animateDuration" :size="match ($size) { 'sm' => 'sm', 'lg' => 'xl', default => 'md' }" weight="semibold" color="current" class="!gap-0" align="center" />
                    @else
                        @if (filled($prefix))<span class="text-[0.55em] opacity-80">{{ $prefix }}</span>@endif{{ $value }}@if (filled($suffix))<span class="text-[0.55em] opacity-80">{{ $suffix }}</span>@endif
                    @endisset
                </div>
            @endif

            @if ($hasTrend)
                <div class="flex flex-wrap items-center justify-center gap-1 text-xs {{ $trendColorClasses }}">
                    @if ($trendIcon)<i class="bi {{ $trendIcon }}" aria-hidden="true"></i>@endif
                    @if (filled($trendValue))<span class="font-medium">{{ $trendValue }}</span>@endif
                    @if (filled($trendLabel))<span class="text-muted-foreground">{{ $trendLabel }}</span>@endif
                </div>
            @endif
        </div>
    @elseif ($layout === 'progress')
        <div class="relative z-[2] flex flex-col gap-3">
            <div class="flex items-start justify-between gap-3">
                <div class="min-w-0">
                    @if (filled($title))
                        <p class="ui-widget-stat-title mb-1 text-sm font-medium text-muted-foreground">{{ $title }}</p>
                    @endif

                    @if ($hasValue)
                        <div class="ui-widget-stat-value {{ $valueSizeClasses }} font-semibold tabular-nums tracking-tight text-card-foreground">
                            @isset($valueSlot)
                                {{ $valueSlot }}
                            @elseif ($useCountup)
                                <x-ui.countup :value="(float) $value" :prefix="$prefix ?? ''" :suffix="$suffix ?? ''" :decimals="$decimals" :duration="$animateDuration" :size="match ($size) { 'sm' => 'sm', 'lg' => 'xl', default => 'md' }" weight="semibold" color="current" class="!gap-0" />
                            @else
                                @if (filled($prefix))<span class="text-[0.55em] opacity-80">{{ $prefix }}</span>@endif{{ $value }}@if (filled($suffix))<span class="text-[0.55em] opacity-80">{{ $suffix }}</span>@endif
                            @endisset
                        </div>
                    @endif

                    @if (filled($compare))
                        <p class="ui-widget-stat-desc mt-1 mb-0 text-xs text-muted-foreground">{{ $compare }}</p>
                    @endif
                </div>

                @if ($hasTrend && filled($trendValue))
                    <x-ui.badge :color="$trendBadgeColor" variant="soft" size="sm" :icon="$trendIcon" pill>
                        {{ $trendValue }}
                    </x-ui.badge>
                @elseif ($hasIcon)
                    <x-ui.icon :name="$icon" :color="$color" :variant="$iconVariant === 'none' ? 'none' : $iconVariant" :box-size="$iconBoxSize" shape="circle" />
                @endif
            </div>

            @if ($hasProgress)
                <x-ui.progress :value="$progressValue" :max="(float) $progressMax" :color="$color" size="sm" />
            @endif
        </div>
    @elseif ($layout === 'counter')
        <div class="relative z-[2] flex flex-col gap-2">
            @if (filled($title))
                <p class="ui-widget-stat-title mb-0 text-sm font-medium text-muted-foreground">{{ $title }}</p>
            @endif

            @if ($hasValue)
                <div class="ui-widget-stat-value {{ $valueSizeClasses }} font-semibold tabular-nums tracking-tight text-card-foreground">
                    @isset($valueSlot)
                        {{ $valueSlot }}
                    @elseif ($useCountup)
                        <x-ui.countup :value="(float) $value" :prefix="$prefix ?? ''" :suffix="$suffix ?? ''" :decimals="$decimals" :duration="$animateDuration" :size="match ($size) { 'sm' => 'sm', 'lg' => 'xl', default => 'md' }" weight="semibold" color="current" class="!gap-0" />
                    @else
                        @if (filled($prefix))<span class="text-[0.55em] opacity-80">{{ $prefix }}</span>@endif{{ $value }}@if (filled($suffix))<span class="text-[0.55em] opacity-80">{{ $suffix }}</span>@endif
                    @endisset
                </div>
            @endif

            @if ($hasTrend)
                <p class="mb-0 flex flex-wrap items-center gap-1.5 text-xs">
                    <span class="inline-flex items-center gap-1 font-semibold {{ $trendColorClasses }}">
                        @if ($trendIcon)<i class="bi {{ $trendIcon }}" aria-hidden="true"></i>@endif
                        {{ $trendValue }}
                    </span>
                    @if (filled($trendLabel))
                        <span class="text-muted-foreground">{{ $trendLabel }}</span>
                    @endif
                </p>
            @endif

            @if (filled($description))
                <p class="ui-widget-stat-desc mb-0 text-sm text-muted-foreground">{{ $description }}</p>
            @endif

            @if ($slot->isNotEmpty())
                <div class="ui-widget-stat-content -mx-1 pt-1">{{ $slot }}</div>
            @endif
        </div>
    @else
        {{-- layout="tile" --}}
        <div class="relative z-[2] flex flex-col gap-4">
            <div class="flex items-start justify-between gap-3">
                <div class="min-w-0 flex-1">
                    <div class="mb-2 flex flex-wrap items-center gap-2">
                        @if (filled($title))
                            <p class="ui-widget-stat-title mb-0 text-xs font-medium uppercase tracking-wide text-muted-foreground">{{ $title }}</p>
                        @endif

                        @if (filled($badge))
                            <x-ui.badge :color="$badgeColor" variant="soft" size="sm" pill>{{ $badge }}</x-ui.badge>
                        @endif
                    </div>

                    @if ($hasTrend && filled($trendValue))
                        <div class="mb-2">
                            <x-ui.badge :color="$trendBadgeColor" variant="soft" size="sm" :icon="$trendIcon" pill>
                                {{ $trendValue }}
                            </x-ui.badge>
                        </div>
                    @endif

                    @if ($hasValue)
                        <div class="ui-widget-stat-value {{ $valueSizeClasses }} font-semibold tabular-nums tracking-tight text-card-foreground">
                            @isset($valueSlot)
                                {{ $valueSlot }}
                            @elseif ($useCountup)
                                <x-ui.countup :value="(float) $value" :prefix="$prefix ?? ''" :suffix="$suffix ?? ''" :decimals="$decimals" :duration="$animateDuration" :size="match ($size) { 'sm' => 'sm', 'lg' => 'xl', default => 'md' }" weight="semibold" color="current" class="!gap-0" />
                            @else
                                @if (filled($prefix))<span class="text-[0.55em] opacity-80">{{ $prefix }}</span>@endif{{ $value }}@if (filled($suffix))<span class="text-[0.55em] opacity-80">{{ $suffix }}</span>@endif
                            @endisset
                        </div>
                    @endif

                    @if (filled($description))
                        <p class="ui-widget-stat-desc mt-1 mb-0 text-sm text-muted-foreground">{{ $description }}</p>
                    @endif
                </div>

                @if ($hasIcon)
                    <div class="ui-widget-stat-icon shrink-0">
                        @isset($iconSlot)
                            {{ $iconSlot }}
                        @else
                            <x-ui.icon :name="$icon" :color="$color" :variant="$iconVariant === 'none' ? 'none' : $iconVariant" :box-size="$iconBoxSize" shape="circle" />
                        @endisset
                    </div>
                @endif
            </div>

            @if ($slot->isNotEmpty())
                <div class="ui-widget-stat-content -mx-1">{{ $slot }}</div>
            @endif

            @if ($hasProgress)
                <x-ui.progress :value="$progressValue" :max="(float) $progressMax" :color="$color" size="sm" />
            @endif

            @if ($hasLink)
                <div class="border-t border-border/60 pt-3">
                    @if (filled($link))
                        <a href="{{ $link }}" class="relative z-[2] text-sm font-medium text-primary hover:underline">
                            {{ $linkLabel ?? 'Ver detalhes' }}
                            <i class="bi bi-arrow-right ms-1 text-xs" aria-hidden="true"></i>
                        </a>
                    @else
                        <span class="text-sm font-medium text-muted-foreground">{{ $linkLabel }}</span>
                    @endif
                </div>
            @endif
        </div>
    @endif
</div>
