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
            tiles="carto-voyager"
            :overlay="[
                'url' => asset('maps/africa-outline.svg'),
                'bounds' => [[-35, -20], [38, 55]],
                'opacity' => 0.75,
            ]"
            :markers="[
                ['lat' => 30.04, 'lng' => 31.24, 'popup' => 'Cairo', 'color' => 'warning'],
                ['lat' => -26.20, 'lng' => 28.04, 'popup' => 'Joanesburgo', 'color' => 'success'],
                ['lat' => 25.20, 'lng' => 55.27, 'popup' => 'Dubai', 'color' => 'danger'],
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
            Área <strong>África e Oriente Médio</strong> —
            mapas vetoriais em
            <a href="https://freevectormaps.com/" target="_blank" rel="noopener">Free Vector Maps</a>
            (Egito, África do Sul, Emirados…).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="África e Oriente Médio" :code="$overlayCode" :html="$overlayHtml">
            <x-ui.map
                tiles="carto-voyager"
                :overlay="[
                    'url' => asset('maps/africa-outline.svg'),
                    'bounds' => [[-35, -20], [38, 55]],
                    'opacity' => 0.75,
                ]"
                :markers="[
                    ['lat' => 30.04, 'lng' => 31.24, 'popup' => 'Cairo', 'color' => 'warning'],
                    ['lat' => -26.20, 'lng' => 28.04, 'popup' => 'Joanesburgo', 'color' => 'success'],
                    ['lat' => 25.20, 'lng' => 55.27, 'popup' => 'Dubai', 'color' => 'danger'],
                ]"
            />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
