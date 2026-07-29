<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $voyagerCode = <<<'BLADE'
        <x-ui.map tiles="carto-voyager" :lat="-15.13" :lng="-53.19" :zoom="4" />
        BLADE;

/*     Shell renderizado pelo servidor; "tiles"/"layers" só afetam o JS de
         inicialização (resources/js/map.js), não a estrutura estática abaixo. 
*/
    $voyagerHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 420px; min-height: 200px"></div>
        </div>
        HTML;

    $positronCode = <<<'BLADE'
        <x-ui.map tiles="carto-positron" :lat="40.42" :lng="-3.70" :zoom="5" :height="340" />
        BLADE;

    $positronHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 340px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 340px; min-height: 200px"></div>
        </div>
        HTML;

    $darkCode = <<<'BLADE'
        <x-ui.map tiles="carto-dark" :lat="35.68" :lng="139.69" :zoom="10" :height="340" />
        BLADE;

    $darkHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 340px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 340px; min-height: 200px"></div>
        </div>
        HTML;

    $switchCode = <<<'BLADE'
        <x-ui.map
            tiles="carto-voyager"
            layer-control
            :layers="['carto-voyager', 'carto-positron', 'carto-dark']"
            :lat="-15.13"
            :lng="-53.19"
            :zoom="4"
        />
        BLADE;

    $switchHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: 420px; min-height: 200px"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            Estilos raster no espírito dos
            <a href="https://openmaptiles.org/" target="_blank" rel="noopener">Open Map Styles</a>
            (Voyager / Positron / Dark Matter), servidos via CartoCDN sobre dados OSM —
            ideais quando você ainda não self-hosta vector tiles OpenMapTiles.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Voyager" :code="$voyagerCode" :html="$voyagerHtml">
            <x-ui.map tiles="carto-voyager" :lat="-15.13" :lng="-53.19" :zoom="4" />
        </x-ui.example>

        <x-ui.example title="Positron (light)" :code="$positronCode" :html="$positronHtml">
            <x-ui.map tiles="carto-positron" :lat="40.42" :lng="-3.70" :zoom="5" :height="340" />
        </x-ui.example>

        <x-ui.example title="Dark Matter" :code="$darkCode" :html="$darkHtml">
            <x-ui.map tiles="carto-dark" :lat="35.68" :lng="139.69" :zoom="10" :height="340" />
        </x-ui.example>

        <x-ui.example title="Trocar estilos" :code="$switchCode" :html="$switchHtml">
            <x-slot:description>
                <code>layer-control</code> + <code>layers</code> para alternar os três estilos.
            </x-slot:description>
            <x-ui.map
                tiles="carto-voyager"
                layer-control
                :layers="['carto-voyager', 'carto-positron', 'carto-dark']"
                :lat="-15.13"
                :lng="-53.19"
                :zoom="4"
            />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
