<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.map :lat="-15.13" :lng="-53.19" :zoom="4" />
        BLADE;

/*     Shell renderizado pelo servidor: o <div data-...> com x-data="map(...)" e o
         canvas "wire:ignore" onde o Leaflet monta o mapa via JS (resources/js/map.js).
         A inicialização real (tiles, pan/zoom, markers etc.) depende do bundle da
         aplicação — aqui mostramos apenas a estrutura estática. 
*/
    $basicHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 420px; min-height: 200px"></div>
        </div>
        HTML;

    $controlsCode = <<<'BLADE'
        <x-ui.map
            :lat="-23.55"
            :lng="-46.63"
            :zoom="11"
            scale
            :height="360"
        />
        BLADE;

    $controlsHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 360px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 360px; min-height: 200px"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.map&gt;</code> usa
            <a href="https://leafletjs.com/" target="_blank" rel="noopener">Leaflet</a>
            como motor interativo (pan, zoom, eventos, controles). Centro padrão alinhado ao
            <a href="https://www.openstreetmap.org/#map=4/-15.13/-53.19" target="_blank" rel="noopener">OpenStreetMap</a>
            no Brasil. Veja também as áreas OpenStreetMap, OpenMapTiles e Free Vector Maps neste menu.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                <code>lat</code>, <code>lng</code> e <code>zoom</code> definem a vista inicial.
            </x-slot:description>
            <x-ui.map :lat="-15.13" :lng="-53.19" :zoom="4" />
        </x-ui.example>

        <x-ui.example title="Controles" :code="$controlsCode" :html="$controlsHtml">
            <x-slot:description>
                <code>scale</code> adiciona a barra métrica. Zoom control vem ligado por padrão.
            </x-slot:description>
            <x-ui.map
                :lat="-23.55"
                :lng="-46.63"
                :zoom="11"
                scale
                :height="360"
            />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
