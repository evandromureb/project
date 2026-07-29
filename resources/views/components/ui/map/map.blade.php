@props([
    'lat' => -15.13,
    'lng' => -53.19,
    'zoom' => 4,
    'minZoom' => 1,
    'maxZoom' => 19,
    'tiles' => 'osm',
    'tilesUrl' => null,
    'tilesAttribution' => null,
    'layers' => null,
    'markers' => [],
    'circles' => [],
    'polylines' => [],
    'polygons' => [],
    'rectangles' => [],
    'geojson' => null,
    'geojsonStyle' => null,
    'fitGeojson' => false,
    'overlay' => null,
    'bounds' => null,
    'boundsPadding' => [24, 24],
    'boundsMaxZoom' => 14,
    'height' => 420,
    'zoomControl' => true,
    'scrollWheelZoom' => true,
    'dragging' => true,
    'doubleClickZoom' => true,
    'attribution' => true,
    'keyboard' => true,
    'layerControl' => false,
    'scale' => false,
    'loading' => false,
    'emptyText' => 'Não foi possível carregar o mapa',
    'ariaLabel' => 'Mapa interativo',
])

@php
    $tilePresets = [
        'osm',
        'osm-hot',
        'opentopomap',
        'carto-voyager',
        'carto-positron',
        'carto-dark',
        'openmaptiles',
        'custom',
    ];

    if (! in_array($tiles, $tilePresets, true)) {
        $tiles = 'osm';
    }

    $heightValue = is_numeric($height) ? $height.'px' : (string) $height;

    $normalizedLayers = null;

    if (is_array($layers) && $layers !== []) {
        $normalizedLayers = array_values(array_filter(
            $layers,
            fn (mixed $layer): bool => is_string($layer) && in_array($layer, $tilePresets, true),
        ));

        if ($normalizedLayers === []) {
            $normalizedLayers = null;
        }
    }

    $config = [
        'lat' => (float) $lat,
        'lng' => (float) $lng,
        'zoom' => (int) $zoom,
        'minZoom' => (int) $minZoom,
        'maxZoom' => (int) $maxZoom,
        'tiles' => $tiles,
        'tilesUrl' => $tilesUrl,
        'tilesAttribution' => $tilesAttribution,
        'layers' => $normalizedLayers,
        'markers' => $markers,
        'circles' => $circles,
        'polylines' => $polylines,
        'polygons' => $polygons,
        'rectangles' => $rectangles,
        'geojson' => $geojson,
        'geojsonStyle' => $geojsonStyle,
        'fitGeojson' => (bool) $fitGeojson,
        'overlay' => $overlay,
        'bounds' => $bounds,
        'boundsPadding' => $boundsPadding,
        'boundsMaxZoom' => (int) $boundsMaxZoom,
        'zoomControl' => (bool) $zoomControl,
        'scrollWheelZoom' => (bool) $scrollWheelZoom,
        'dragging' => (bool) $dragging,
        'doubleClickZoom' => (bool) $doubleClickZoom,
        'attribution' => (bool) $attribution,
        'keyboard' => (bool) $keyboard,
        'layerControl' => (bool) $layerControl,
        'scale' => (bool) $scale,
    ];
@endphp

<div
    x-data="map(@js($config))"
    {{ $attributes->class(['ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20']) }}
    style="--ui-map-height: {{ $heightValue }}"
    role="region"
    aria-label="{{ $ariaLabel }}"
>
    @if ($loading)
        <div
            class="absolute inset-0 z-20 flex items-center justify-center bg-background/60 text-sm text-muted-foreground backdrop-blur-[1px]"
        >
            <span class="inline-flex items-center gap-2">
                <x-ui.spinner size="sm" />
                Carregando mapa…
            </span>
        </div>
    @endif

    <template x-if="error">
        <div
            class="flex items-center justify-center px-4 text-sm text-muted-foreground"
            style="height: var(--ui-map-height); min-height: 200px"
        >
            <span x-text="error || @js($emptyText)"></span>
        </div>
    </template>

    <div
        x-show="! error"
        x-ref="canvas"
        class="ui-map-canvas z-0 w-full"
        style="height: var(--ui-map-height); min-height: 200px"
        wire:ignore
    ></div>

    {{ $slot }}
</div>
