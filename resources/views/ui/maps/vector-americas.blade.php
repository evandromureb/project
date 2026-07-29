<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $brazilCode = <<<'BLADE'
        <x-ui.map
            tiles="carto-voyager"
            :overlay="[
                'url' => asset('maps/brazil-outline.svg'),
                'bounds' => [[-34.0, -74.0], [5.5, -34.5]],
                'opacity' => 0.8,
            ]"
            :markers="[
                ['lat' => -15.78, 'lng' => -47.93, 'popup' => 'Brasília', 'color' => 'success'],
                ['lat' => -23.55, 'lng' => -46.63, 'popup' => 'São Paulo', 'color' => 'danger'],
            ]"
        />
        BLADE;

    $regionCode = <<<'BLADE'
        <x-ui.map
            tiles="osm"
            :lat="-15.13"
            :lng="-60"
            :zoom="3"
            :bounds="[[-56, -120], [72, -30]]"
            scale
            :markers="[
                ['lat' => 40.71, 'lng' => -74.01, 'popup' => 'Nova York', 'color' => 'primary'],
                ['lat' => 19.43, 'lng' => -99.13, 'popup' => 'Cidade do México', 'color' => 'warning'],
                ['lat' => -34.60, 'lng' => -58.38, 'popup' => 'Buenos Aires', 'color' => 'info'],
            ]"
        />
        BLADE;

    $brazilHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: var(--ui-map-height); min-height: 200px"></div>
        </div>
        HTML;

    $regionHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: var(--ui-map-height); min-height: 200px"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            Área <strong>Américas</strong> — overlays no estilo
            <a href="https://freevectormaps.com/" target="_blank" rel="noopener">Free Vector Maps</a>
            (América do Norte, Central, Caribe e do Sul). Demo com contorno do Brasil + vista continental.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Brasil (SVG overlay)" :code="$brazilCode" :html="$brazilHtml">
            <x-slot:description>
                SVG local em <code>public/maps/brazil-outline.svg</code> com bounds do território.
            </x-slot:description>
            <x-ui.map
                tiles="carto-voyager"
                :overlay="[
                    'url' => asset('maps/brazil-outline.svg'),
                    'bounds' => [[-34.0, -74.0], [5.5, -34.5]],
                    'opacity' => 0.8,
                ]"
                :markers="[
                    ['lat' => -15.78, 'lng' => -47.93, 'popup' => 'Brasília', 'color' => 'success'],
                    ['lat' => -23.55, 'lng' => -46.63, 'popup' => 'São Paulo', 'color' => 'danger'],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Américas (vista)" :code="$regionCode" :html="$regionHtml">
            <x-slot:description>
                Use <code>bounds</code> para enquadrar o continente sem overlay.
            </x-slot:description>
            <x-ui.map
                tiles="osm"
                :lat="-15.13"
                :lng="-60"
                :zoom="3"
                :bounds="[[-56, -120], [72, -30]]"
                scale
                :markers="[
                    ['lat' => 40.71, 'lng' => -74.01, 'popup' => 'Nova York', 'color' => 'primary'],
                    ['lat' => 19.43, 'lng' => -99.13, 'popup' => 'Cidade do México', 'color' => 'warning'],
                    ['lat' => -34.60, 'lng' => -58.38, 'popup' => 'Buenos Aires', 'color' => 'info'],
                ]"
            />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
