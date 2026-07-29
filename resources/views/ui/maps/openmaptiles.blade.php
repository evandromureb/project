<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $omtCode = <<<'BLADE'
        <x-ui.map
            tiles="openmaptiles"
            tiles-url="https://tile.openstreetmap.org/{z}/{x}/{y}.png"
            tiles-attribution="&copy; <a href='https://openmaptiles.org/'>OpenMapTiles</a> &copy; <a href='https://www.openstreetmap.org/copyright'>OpenStreetMap</a>"
            :lat="-15.13"
            :lng="-53.19"
            :zoom="4"
        />
        BLADE;

/*     Shell renderizado pelo servidor; "tiles"/"tiles-url" só afetam o JS de
         inicialização (resources/js/map.js), não a estrutura estática abaixo. 
*/
    $omtHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 420px; min-height: 200px"></div>
        </div>
        HTML;

    $customCode = <<<'BLADE'
        <x-ui.map
            tiles="custom"
            tiles-url="https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png"
            tiles-attribution="&copy; OpenStreetMap &copy; CARTO"
            :lat="48.86"
            :lng="2.35"
            :zoom="11"
            :height="360"
        />
        BLADE;

    $customHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 360px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 360px; min-height: 200px"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <a href="https://openmaptiles.org/" target="_blank" rel="noopener">OpenMapTiles</a>
            é o schema/stack open-source para self-host de vector tiles (OSM + Natural Earth).
            No <code>&lt;x-ui.map&gt;</code> use <code>tiles="openmaptiles"</code> (ou <code>custom</code>) com
            <code>tiles-url</code> apontando para o seu servidor, MapTiler ou proxy raster.
            Attribution padrão cita OpenMapTiles + OpenStreetMap.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Preset openmaptiles" :code="$omtCode" :html="$omtHtml">
            <x-slot:description>
                Em demo usamos URL raster pública; em produção aponte <code>tiles-url</code> ao seu host OpenMapTiles.
            </x-slot:description>
            <x-ui.map
                tiles="openmaptiles"
                tiles-url="https://tile.openstreetmap.org/{z}/{x}/{y}.png"
                tiles-attribution="&copy; <a href='https://openmaptiles.org/'>OpenMapTiles</a> &copy; <a href='https://www.openstreetmap.org/copyright'>OpenStreetMap</a>"
                :lat="-15.13"
                :lng="-53.19"
                :zoom="4"
            />
        </x-ui.example>

        <x-ui.example title="tiles-url custom" :code="$customCode" :html="$customHtml">
            <x-slot:description>
                Qualquer endpoint <code>{z}/{x}/{y}</code> compatível com Leaflet.
            </x-slot:description>
            <x-ui.map
                tiles="custom"
                tiles-url="https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png"
                tiles-attribution="&copy; OpenStreetMap &copy; CARTO"
                :lat="48.86"
                :lng="2.35"
                :zoom="11"
                :height="360"
            />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
