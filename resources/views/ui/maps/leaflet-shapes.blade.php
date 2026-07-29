<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $markersCode = <<<'BLADE'
        <x-ui.map
            :lat="-15.13"
            :lng="-53.19"
            :zoom="4"
            :markers="[
                ['lat' => -23.55, 'lng' => -46.63, 'popup' => '<strong>São Paulo</strong>', 'color' => 'danger'],
                ['lat' => -22.9, 'lng' => -43.2, 'popup' => 'Rio de Janeiro', 'color' => 'primary', 'openPopup' => true],
                ['lat' => -15.78, 'lng' => -47.93, 'popup' => 'Brasília', 'color' => 'success', 'draggable' => true],
            ]"
        />
        BLADE;

/*     Shell renderizado pelo servidor (markers/shapes são desenhados via JS —
         ver reference/map.md; a estrutura estática é sempre o wrapper + canvas). 
*/
    $markersHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 420px; min-height: 200px"></div>
        </div>
        HTML;

    $shapesCode = <<<'BLADE'
        <x-ui.map
            :lat="-23.55"
            :lng="-46.63"
            :zoom="11"
            :circles="[['lat' => -23.55, 'lng' => -46.63, 'radius' => 4000, 'color' => 'info', 'popup' => 'Raio 4 km']]"
            :polygons="[[
                'color' => 'warning',
                'latlngs' => [[-23.52, -46.68], [-23.58, -46.68], [-23.58, -46.58], [-23.52, -46.58]],
                'popup' => 'Polígono',
            ]]"
            :polylines="[[
                'color' => 'danger',
                'latlngs' => [[-23.50, -46.70], [-23.55, -46.63], [-23.60, -46.55]],
                'popup' => 'Rota',
            ]]"
        />
        BLADE;

    $shapesHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 420px; min-height: 200px"></div>
        </div>
        HTML;

    $geojsonCode = <<<'BLADE'
        <x-ui.map
            :lat="-23.55"
            :lng="-46.63"
            :zoom="10"
            fit-geojson
            :geojson="[
                'type' => 'FeatureCollection',
                'features' => [
                    [
                        'type' => 'Feature',
                        'properties' => ['name' => 'Centro', 'color' => 'primary'],
                        'geometry' => [
                            'type' => 'Point',
                            'coordinates' => [-46.63, -23.55],
                        ],
                    ],
                ],
            ]"
        />
        BLADE;

    $geojsonHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 420px; min-height: 200px"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            Formas vetoriais do
            <a href="https://leafletjs.com/" target="_blank" rel="noopener">Leaflet</a>:
            markers (com pin colorido / HTML), círculos, polígonos, polylines, retângulos e GeoJSON.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Marcadores" :code="$markersCode" :html="$markersHtml">
            <x-slot:description>
                Use <code>color</code> (token de tema), <code>popup</code>, <code>draggable</code> e <code>openPopup</code>.
            </x-slot:description>
            <x-ui.map
                :lat="-15.13"
                :lng="-53.19"
                :zoom="4"
                :markers="[
                    ['lat' => -23.55, 'lng' => -46.63, 'popup' => '<strong>São Paulo</strong>', 'color' => 'danger'],
                    ['lat' => -22.9, 'lng' => -43.2, 'popup' => 'Rio de Janeiro', 'color' => 'primary', 'openPopup' => true],
                    ['lat' => -15.78, 'lng' => -47.93, 'popup' => 'Brasília', 'color' => 'success', 'draggable' => true],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Círculos, polígonos e rotas" :code="$shapesCode" :html="$shapesHtml">
            <x-slot:description>
                Props <code>circles</code>, <code>polygons</code> e <code>polylines</code> aceitam <code>color</code> de tema.
            </x-slot:description>
            <x-ui.map
                :lat="-23.55"
                :lng="-46.63"
                :zoom="11"
                :circles="[['lat' => -23.55, 'lng' => -46.63, 'radius' => 4000, 'color' => 'info', 'popup' => 'Raio 4 km']]"
                :polygons="[[
                    'color' => 'warning',
                    'latlngs' => [[-23.52, -46.68], [-23.58, -46.68], [-23.58, -46.58], [-23.52, -46.58]],
                    'popup' => 'Polígono',
                ]]"
                :polylines="[[
                    'color' => 'danger',
                    'latlngs' => [[-23.50, -46.70], [-23.55, -46.63], [-23.60, -46.55]],
                    'popup' => 'Rota',
                ]]"
            />
        </x-ui.example>

        <x-ui.example title="GeoJSON" :code="$geojsonCode" :html="$geojsonHtml">
            <x-slot:description>
                <code>geojson</code> + <code>fit-geojson</code> ajusta o viewport aos features.
            </x-slot:description>
            <x-ui.map
                :lat="-23.55"
                :lng="-46.63"
                :zoom="10"
                fit-geojson
                :geojson="[
                    'type' => 'FeatureCollection',
                    'features' => [
                        [
                            'type' => 'Feature',
                            'properties' => ['name' => 'Centro', 'color' => 'primary'],
                            'geometry' => [
                                'type' => 'Point',
                                'coordinates' => [-46.63, -23.55],
                            ],
                        ],
                    ],
                ]"
            />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
