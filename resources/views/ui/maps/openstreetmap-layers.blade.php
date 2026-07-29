<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $layersCode = <<<'BLADE'
        <x-ui.map
            tiles="osm"
            layer-control
            scale
            :layers="['osm', 'osm-hot', 'opentopomap', 'carto-voyager']"
            :lat="-15.13"
            :lng="-53.19"
            :zoom="4"
        />
        BLADE;

/*     Shell renderizado pelo servidor; "layers"/"layer-control"/"markers" só
         afetam o JS de inicialização (resources/js/map.js). 
*/
    $layersHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 420px; min-height: 200px"></div>
        </div>
        HTML;

    $markersCode = <<<'BLADE'
        <x-ui.map
            tiles="osm"
            layer-control
            :layers="['osm', 'carto-positron', 'carto-dark']"
            :lat="-23.55"
            :lng="-46.63"
            :zoom="10"
            :markers="[
                ['lat' => -23.55, 'lng' => -46.63, 'popup' => 'São Paulo', 'color' => 'danger'],
            ]"
        />
        BLADE;

    $markersHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 420px; min-height: 200px"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            Controle de camadas base sobre
            <a href="https://www.openstreetmap.org/" target="_blank" rel="noopener">OpenStreetMap</a>.
            Passe <code>layers</code> com presets e ligue <code>layer-control</code> para o seletor do Leaflet.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Layer control" :code="$layersCode" :html="$layersHtml">
            <x-slot:description>
                Alterna entre OSM, HOT, OpenTopoMap e Carto Voyager.
            </x-slot:description>
            <x-ui.map
                tiles="osm"
                layer-control
                scale
                :layers="['osm', 'osm-hot', 'opentopomap', 'carto-voyager']"
                :lat="-15.13"
                :lng="-53.19"
                :zoom="4"
            />
        </x-ui.example>

        <x-ui.example title="Camadas + marcador" :code="$markersCode" :html="$markersHtml">
            <x-slot:description>
                Combine troca de tiles com markers — útil para temas claro/escuro.
            </x-slot:description>
            <x-ui.map
                tiles="osm"
                layer-control
                :layers="['osm', 'carto-positron', 'carto-dark']"
                :lat="-23.55"
                :lng="-46.63"
                :zoom="10"
                :markers="[
                    ['lat' => -23.55, 'lng' => -46.63, 'popup' => 'São Paulo', 'color' => 'danger'],
                ]"
            />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
