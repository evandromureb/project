<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $osmCode = <<<'BLADE'
        <x-ui.map tiles="osm" :lat="-15.13" :lng="-53.19" :zoom="4" />
        BLADE;

    $hotCode = <<<'BLADE'
        <x-ui.map tiles="osm-hot" :lat="-15.13" :lng="-53.19" :zoom="5" :height="360" />
        BLADE;

    $topoCode = <<<'BLADE'
        <x-ui.map tiles="opentopomap" :lat="-22.5" :lng="-45.0" :zoom="8" :height="360" />
        BLADE;

    $osmHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: var(--ui-map-height); min-height: 200px"></div>
        </div>
        HTML;

    $hotHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 360px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: var(--ui-map-height); min-height: 200px"></div>
        </div>
        HTML;

    $topoHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 360px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: var(--ui-map-height); min-height: 200px"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            Tiles raster do
            <a href="https://www.openstreetmap.org/#map=4/-15.13/-53.19" target="_blank" rel="noopener">OpenStreetMap</a>
            via Leaflet. Presets: <code>osm</code> (padrão), <code>osm-hot</code> (Humanitarian) e
            <code>opentopomap</code>. Respeite a
            <a href="https://operations.osmfoundation.org/policies/tiles/" target="_blank" rel="noopener">política de uso de tiles</a>
            em produção.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="OpenStreetMap" :code="$osmCode" :html="$osmHtml">
            <x-slot:description>
                <code>tiles="osm"</code> — mapa padrão OSM centrado no Brasil.
            </x-slot:description>
            <x-ui.map tiles="osm" :lat="-15.13" :lng="-53.19" :zoom="4" />
        </x-ui.example>

        <x-ui.example title="OSM Humanitarian" :code="$hotCode" :html="$hotHtml">
            <x-slot:description>
                <code>tiles="osm-hot"</code> — estilo HOT para contexto humanitário.
            </x-slot:description>
            <x-ui.map tiles="osm-hot" :lat="-15.13" :lng="-53.19" :zoom="5" :height="360" />
        </x-ui.example>

        <x-ui.example title="OpenTopoMap" :code="$topoCode" :html="$topoHtml">
            <x-slot:description>
                <code>tiles="opentopomap"</code> — relevo e curvas de nível (dados OSM).
            </x-slot:description>
            <x-ui.map tiles="opentopomap" :lat="-22.5" :lng="-45.0" :zoom="8" :height="360" />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
