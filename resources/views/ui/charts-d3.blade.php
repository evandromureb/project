<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $months = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul'];

    $barCode = <<<'BLADE'
        <x-ui.chart-d3
            type="bar"
            title="Vendas por canal"
            :categories="['Site', 'App', 'Loja', 'Parceiros']"
            :series="[
                ['name' => 'Q1', 'data' => [320, 240, 180, 120]],
                ['name' => 'Q2', 'data' => [280, 300, 210, 160]],
            ]"
        />
        BLADE;

    $barHtml = <<<'HTML'
        <div class="ui-chart ui-chart-d3 relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Vendas por canal">
            <div class="w-full overflow-hidden" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $horizontalCode = <<<'BLADE'
        <x-ui.chart-d3
            type="horizontal-bar"
            title="Top produtos"
            :categories="['Plano Pro', 'Plano Plus', 'Add-on', 'Suporte']"
            :series="[['name' => 'Receita', 'data' => [420, 310, 180, 95]]]"
        />
        BLADE;

    $horizontalHtml = <<<'HTML'
        <div class="ui-chart ui-chart-d3 relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Top produtos">
            <div class="w-full overflow-hidden" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $lineCode = <<<'BLADE'
        <x-ui.chart-d3
            type="line"
            title="Receita mensal"
            smooth
            :categories="['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul']"
            :series="[
                ['name' => '2025', 'data' => [120, 132, 101, 134, 90, 230, 210]],
                ['name' => '2026', 'data' => [220, 182, 191, 234, 290, 330, 310]],
            ]"
        />
        BLADE;

    $lineHtml = <<<'HTML'
        <div class="ui-chart ui-chart-d3 relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Receita mensal">
            <div class="w-full overflow-hidden" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $areaCode = <<<'BLADE'
        <x-ui.chart-d3
            type="area"
            title="Visitantes"
            smooth
            :categories="['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun']"
            :series="[
                ['name' => 'Orgânico', 'data' => [140, 180, 160, 210, 190, 250]],
                ['name' => 'Pago', 'data' => [80, 90, 110, 100, 130, 140]],
            ]"
        />
        BLADE;

    $areaHtml = <<<'HTML'
        <div class="ui-chart ui-chart-d3 relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Visitantes">
            <div class="w-full overflow-hidden" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $pieCode = <<<'BLADE'
        <x-ui.chart-d3
            type="pie"
            title="Dispositivos"
            :series="[
                ['name' => 'Desktop', 'value' => 48],
                ['name' => 'Mobile', 'value' => 36],
                ['name' => 'Tablet', 'value' => 16],
            ]"
        />
        BLADE;

    $pieHtml = <<<'HTML'
        <div class="ui-chart ui-chart-d3 relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Dispositivos">
            <div class="w-full overflow-hidden" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $donutCode = <<<'BLADE'
        <x-ui.chart-d3
            type="donut"
            title="Origem do tráfego"
            :series="[
                ['name' => 'Direto', 'value' => 335],
                ['name' => 'E-mail', 'value' => 210],
                ['name' => 'Ads', 'value' => 154],
                ['name' => 'Social', 'value' => 135],
            ]"
        />
        BLADE;

    $donutHtml = <<<'HTML'
        <div class="ui-chart ui-chart-d3 relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Origem do tráfego">
            <div class="w-full overflow-hidden" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.chart-d3
            type="bar"
            title="Cores customizadas"
            :categories="['A', 'B', 'C', 'D']"
            :colors="['success', 'warning', 'danger', 'info']"
            :series="[
                ['name' => 'Alpha', 'data' => [40, 55, 30, 70]],
                ['name' => 'Beta', 'data' => [25, 35, 45, 50]],
            ]"
        />
        BLADE;

    $colorsHtml = <<<'HTML'
        <div class="ui-chart ui-chart-d3 relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Cores customizadas">
            <div class="w-full overflow-hidden" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $emptyCode = <<<'BLADE'
        <x-ui.chart-d3 type="bar" :series="[]" empty-text="Nenhuma métrica neste período" />
        BLADE;

    $emptyHtml = <<<'HTML'
        <div class="ui-chart ui-chart-d3 relative w-full" style="--ui-chart-height: 320px" role="img">
            <div
                class="flex items-center justify-center rounded-md border border-dashed border-border bg-muted/30 px-4 text-sm text-muted-foreground"
                style="height: var(--ui-chart-height)"
            >
                Nenhuma métrica neste período
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.chart-d3&gt;</code> renderiza SVG com
            <a href="https://d3js.org/" target="_blank" rel="noopener" class="text-primary underline-offset-2 hover:underline">D3</a>
            para visualizações customizáveis. Cobre line, area, bar, horizontal-bar, pie e donut com tokens do tema.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Bar" :code="$barCode" :html="$barHtml">
            <x-ui.chart-d3
                type="bar"
                title="Vendas por canal"
                :categories="['Site', 'App', 'Loja', 'Parceiros']"
                :series="[
                    ['name' => 'Q1', 'data' => [320, 240, 180, 120]],
                    ['name' => 'Q2', 'data' => [280, 300, 210, 160]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Horizontal bar" :code="$horizontalCode" :html="$horizontalHtml">
            <x-ui.chart-d3
                type="horizontal-bar"
                title="Top produtos"
                :categories="['Plano Pro', 'Plano Plus', 'Add-on', 'Suporte']"
                :series="[['name' => 'Receita', 'data' => [420, 310, 180, 95]]]"
            />
        </x-ui.example>

        <x-ui.example title="Line" :code="$lineCode" :html="$lineHtml">
            <x-ui.chart-d3
                type="line"
                title="Receita mensal"
                smooth
                :categories="$months"
                :series="[
                    ['name' => '2025', 'data' => [120, 132, 101, 134, 90, 230, 210]],
                    ['name' => '2026', 'data' => [220, 182, 191, 234, 290, 330, 310]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Area" :code="$areaCode" :html="$areaHtml">
            <x-ui.chart-d3
                type="area"
                title="Visitantes"
                smooth
                :categories="['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun']"
                :series="[
                    ['name' => 'Orgânico', 'data' => [140, 180, 160, 210, 190, 250]],
                    ['name' => 'Pago', 'data' => [80, 90, 110, 100, 130, 140]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Pie" :code="$pieCode" :html="$pieHtml">
            <x-ui.chart-d3
                type="pie"
                title="Dispositivos"
                :series="[
                    ['name' => 'Desktop', 'value' => 48],
                    ['name' => 'Mobile', 'value' => 36],
                    ['name' => 'Tablet', 'value' => 16],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Donut" :code="$donutCode" :html="$donutHtml">
            <x-ui.chart-d3
                type="donut"
                title="Origem do tráfego"
                :series="[
                    ['name' => 'Direto', 'value' => 335],
                    ['name' => 'E-mail', 'value' => 210],
                    ['name' => 'Ads', 'value' => 154],
                    ['name' => 'Social', 'value' => 135],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-ui.chart-d3
                type="bar"
                title="Cores customizadas"
                :categories="['A', 'B', 'C', 'D']"
                :colors="['success', 'warning', 'danger', 'info']"
                :series="[
                    ['name' => 'Alpha', 'data' => [40, 55, 30, 70]],
                    ['name' => 'Beta', 'data' => [25, 35, 45, 50]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Empty" :code="$emptyCode" :html="$emptyHtml">
            <x-ui.chart-d3 type="bar" :series="[]" empty-text="Nenhuma métrica neste período" />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="chart-d3" />
</x-ui.docs>
