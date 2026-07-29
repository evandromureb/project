<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $overlayCode = <<<'BLADE'
        <x-ui.map
            tiles="carto-positron"
            :overlay="[
                'url' => asset('maps/asia-outline.svg'),
                'bounds' => [[-50, 60], [55, 180]],
                'opacity' => 0.7,
            ]"
            :markers="[
                ['lat' => 35.68, 'lng' => 139.69, 'popup' => 'Tóquio', 'color' => 'danger'],
                ['lat' => 28.61, 'lng' => 77.21, 'popup' => 'Nova Delhi', 'color' => 'warning'],
                ['lat' => -33.87, 'lng' => 151.21, 'popup' => 'Sydney', 'color' => 'info'],
            ]"
        />
        BLADE;

    $overlayHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: var(--ui-map-height); min-height: 200px"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline">
            Área <strong>Ásia e Oceania</strong> —
            overlays no estilo
            <a href="https://freevectormaps.com/" target="_blank" rel="noopener">Free Vector Maps</a>
            (China, Índia, Japão, Austrália…).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Ásia e Oceania" :code="$overlayCode" :html="$overlayHtml">
            <x-ui.map
                tiles="carto-positron"
                :overlay="[
                    'url' => asset('maps/asia-outline.svg'),
                    'bounds' => [[-50, 60], [55, 180]],
                    'opacity' => 0.7,
                ]"
                :markers="[
                    ['lat' => 35.68, 'lng' => 139.69, 'popup' => 'Tóquio', 'color' => 'danger'],
                    ['lat' => 28.61, 'lng' => 77.21, 'popup' => 'Nova Delhi', 'color' => 'warning'],
                    ['lat' => -33.87, 'lng' => 151.21, 'popup' => 'Sydney', 'color' => 'info'],
                ]"
            />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
