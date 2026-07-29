@props([
    'type' => 'line',
    'series' => [],
    'categories' => [],
    'labels' => [],
    'options' => null,
    'height' => 320,
    'title' => null,
    'subtitle' => null,
    'legend' => true,
    'tooltip' => true,
    'stacked' => false,
    'smooth' => false,
    'showLabel' => false,
    'colors' => null,
    'emptyText' => 'Sem dados para exibir',
    'animation' => true,
])

@php
    $types = [
        'line',
        'area',
        'bar',
        'horizontal-bar',
        'pie',
        'donut',
        'doughnut',
        'radar',
        'polarArea',
        'scatter',
    ];

    if (! in_array($type, $types, true)) {
        $type = 'line';
    }

    $heightValue = is_numeric($height) ? $height.'px' : (string) $height;

    $config = [
        'type' => $type,
        'series' => $series,
        'categories' => $categories !== [] ? $categories : $labels,
        'labels' => $labels,
        'options' => $options,
        'title' => $title,
        'subtitle' => $subtitle,
        'legend' => (bool) $legend,
        'tooltip' => (bool) $tooltip,
        'stacked' => (bool) $stacked,
        'smooth' => (bool) $smooth,
        'showLabel' => (bool) $showLabel,
        'colors' => $colors,
        'animation' => (bool) $animation,
    ];
@endphp

<div
    x-data="chartJs(@js($config))"
    {{ $attributes->class(['ui-chart ui-chart-js relative w-full']) }}
    style="--ui-chart-height: {{ $heightValue }}"
    role="img"
    @if ($title) aria-label="{{ $title }}" @endif
>
    <template x-if="empty">
        <div
            class="flex items-center justify-center rounded-md border border-dashed border-border bg-muted/30 px-4 text-sm text-muted-foreground"
            style="height: var(--ui-chart-height)"
        >
            {{ $emptyText }}
        </div>
    </template>

    <div
        x-show="! empty"
        class="relative w-full"
        style="height: var(--ui-chart-height); min-height: 160px"
    >
        <canvas x-ref="canvas" class="absolute inset-0 h-full w-full"></canvas>
    </div>
</div>
