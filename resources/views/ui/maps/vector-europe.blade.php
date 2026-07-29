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
                'url' => asset('maps/europe-outline.svg'),
                'bounds' => [[34, -12], [72, 40]],
                'opacity' => 0.7,
            ]"
            :markers="[
                ['lat' => 48.86, 'lng' => 2.35, 'popup' => 'Paris', 'color' => 'primary'],
                ['lat' => 52.52, 'lng' => 13.40, 'popup' => 'Berlim', 'color' => 'danger'],
                ['lat' => 41.90, 'lng' => 12.50, 'popup' => 'Roma', 'color' => 'warning'],
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
            Área <strong>Europa</strong> —
            <a href="https://freevectormaps.com/" target="_blank" rel="noopener">Free Vector Maps</a>
            oferece mapas por país (França, Alemanha, Reino Unido…). Substitua o SVG demo pelo download oficial.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Europa (SVG overlay)" :code="$overlayCode" :html="$overlayHtml">
            <x-ui.map
                tiles="carto-positron"
                :overlay="[
                    'url' => asset('maps/europe-outline.svg'),
                    'bounds' => [[34, -12], [72, 40]],
                    'opacity' => 0.7,
                ]"
                :markers="[
                    ['lat' => 48.86, 'lng' => 2.35, 'popup' => 'Paris', 'color' => 'primary'],
                    ['lat' => 52.52, 'lng' => 13.40, 'popup' => 'Berlim', 'color' => 'danger'],
                    ['lat' => 41.90, 'lng' => 12.50, 'popup' => 'Roma', 'color' => 'warning'],
                ]"
            />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
