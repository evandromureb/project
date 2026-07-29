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
            :lat="20"
            :lng="0"
            :zoom="2"
            :overlay="[
                'url' => asset('maps/world-outline.svg'),
                'bounds' => [[-60, -170], [75, 180]],
                'opacity' => 0.75,
            ]"
        />
        BLADE;

    $downloadCode = <<<'BLADE'
        {{-- Baixe SVGs em https://freevectormaps.com/ e sirva de /public --}}
        <x-ui.map
            tiles="osm"
            :overlay="[
                'url' => asset('maps/meu-mapa.svg'),
                'bounds' => [[sul, oeste], [norte, leste]],
                'opacity' => 0.85,
            ]"
        />
        BLADE;

    $overlayHtml = <<<'HTML'
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: var(--ui-map-height); min-height: 200px"></div>
        </div>
        HTML;

    $downloadHtml = <<<'HTML'
        <!-- Baixe SVGs em https://freevectormaps.com/ e sirva de /public -->
        <div class="ui-map relative w-full overflow-hidden rounded-md border border-border bg-muted/20" style="--ui-map-height: 420px" role="region" aria-label="Mapa interativo">
            <div class="ui-map-canvas z-0 w-full" style="height: var(--ui-map-height); min-height: 200px"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            Overlay SVG no padrão
            <a href="https://freevectormaps.com/" target="_blank" rel="noopener">Free Vector Maps</a>
            — baixe o vetor, coloque em <code>public/maps</code> e passe em <code>overlay.url</code> com
            <code>bounds</code> geográficos <code>[[sul, oeste], [norte, leste]]</code>.
            Esta demo usa um contorno simplificado local (área: Mundo).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Overlay mundo" :code="$overlayCode" :html="$overlayHtml">
            <x-slot:description>
                <code>overlay</code> desenha o SVG sobre tiles OSM/Carto e faz <code>fitBounds</code> automático.
            </x-slot:description>
            <x-ui.map
                tiles="carto-positron"
                :lat="20"
                :lng="0"
                :zoom="2"
                :overlay="[
                    'url' => asset('maps/world-outline.svg'),
                    'bounds' => [[-60, -170], [75, 180]],
                    'opacity' => 0.75,
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Usando Free Vector Maps" :code="$downloadCode" :html="$downloadHtml">
            <x-slot:description>
                Substitua a URL pelo SVG baixado do site (licença conforme a página License).
            </x-slot:description>
            <div class="rounded-md border border-dashed border-border bg-muted/30 px-4 py-6 text-sm text-muted-foreground">
                Baixe em
                <a href="https://freevectormaps.com/" target="_blank" rel="noopener" class="text-primary underline-offset-2 hover:underline">freevectormaps.com</a>,
                salve em <code class="text-danger">public/maps/</code> e use o snippet da aba Code.
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="map" />
</x-ui.docs>
