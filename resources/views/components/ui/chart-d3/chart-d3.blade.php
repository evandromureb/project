@props([
    'type' => 'bar',
    'series' => [],
    'categories' => [],
    'labels' => [],
    'height' => 320,
    'title' => null,
    'legend' => true,
    'smooth' => false,
    'showLabel' => false,
    'colors' => null,
    'emptyText' => 'Sem dados para exibir',
])

@php
    $types = [
        'line',
        'area',
        'bar',
        'horizontal-bar',
        'pie',
        'donut',
    ];

    if (! in_array($type, $types, true)) {
        $type = 'bar';
    }

    $heightValue = is_numeric($height) ? $height.'px' : (string) $height;

    $config = [
        'type' => $type,
        'series' => $series,
        'categories' => $categories !== [] ? $categories : $labels,
        'labels' => $labels,
        'title' => $title,
        'legend' => (bool) $legend,
        'smooth' => (bool) $smooth,
        'showLabel' => (bool) $showLabel,
        'colors' => $colors,
    ];
@endphp

<div
    x-data="chartD3(@js($config))"
    {{ $attributes->class(['ui-chart ui-chart-d3 relative w-full']) }}
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
        x-ref="canvas"
        class="w-full overflow-hidden"
        style="height: var(--ui-chart-height); min-height: 160px"
    ></div>
</div>
