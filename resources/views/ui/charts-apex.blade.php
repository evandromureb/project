<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $months = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul'];

    $lineCode = <<<'BLADE'
        <x-ui.chart-apex
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
        <div class="ui-chart ui-chart-apex relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Receita mensal">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $areaCode = <<<'BLADE'
        <x-ui.chart-apex
            type="area"
            title="Visitantes"
            smooth
            stacked
            :categories="['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun']"
            :series="[
                ['name' => 'Orgânico', 'data' => [140, 180, 160, 210, 190, 250]],
                ['name' => 'Pago', 'data' => [80, 90, 110, 100, 130, 140]],
            ]"
        />
        BLADE;

    $areaHtml = <<<'HTML'
        <div class="ui-chart ui-chart-apex relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Visitantes">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $barCode = <<<'BLADE'
        <x-ui.chart-apex
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
        <div class="ui-chart ui-chart-apex relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Vendas por canal">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $horizontalCode = <<<'BLADE'
        <x-ui.chart-apex
            type="horizontal-bar"
            title="Top produtos"
            :categories="['Plano Pro', 'Plano Plus', 'Add-on', 'Suporte']"
            :series="[['name' => 'Receita', 'data' => [420, 310, 180, 95]]]"
            :legend="false"
        />
        BLADE;

    $horizontalHtml = <<<'HTML'
        <div class="ui-chart ui-chart-apex relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Top produtos">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $donutCode = <<<'BLADE'
        <x-ui.chart-apex
            type="donut"
            title="Origem do tráfego"
            show-label
            :series="[
                ['name' => 'Direto', 'value' => 335],
                ['name' => 'E-mail', 'value' => 210],
                ['name' => 'Ads', 'value' => 154],
                ['name' => 'Social', 'value' => 135],
            ]"
        />
        BLADE;

    $donutHtml = <<<'HTML'
        <div class="ui-chart ui-chart-apex relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Origem do tráfego">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $radialCode = <<<'BLADE'
        <x-ui.chart-apex
            type="radialBar"
            title="Metas do trimestre"
            :series="[
                ['name' => 'Vendas', 'value' => 78],
                ['name' => 'Marketing', 'value' => 62],
                ['name' => 'Produto', 'value' => 88],
            ]"
        />
        BLADE;

    $radialHtml = <<<'HTML'
        <div class="ui-chart ui-chart-apex relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Metas do trimestre">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $radarCode = <<<'BLADE'
        <x-ui.chart-apex
            type="radar"
            title="Skills"
            :categories="['Speed', 'Reliability', 'Comfort', 'Safety', 'Efficiency']"
            :series="[
                ['name' => 'Allocated', 'data' => [80, 50, 30, 40, 100]],
                ['name' => 'Actual', 'data' => [70, 60, 50, 60, 87]],
            ]"
        />
        BLADE;

    $radarHtml = <<<'HTML'
        <div class="ui-chart ui-chart-apex relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Skills">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $heatmapCode = <<<'BLADE'
        <x-ui.chart-apex
            type="heatmap"
            title="Atividade"
            :height="320"
            :series="[
                ['name' => 'Seg', 'data' => [3, 1, 8, 12, 9, 4]],
                ['name' => 'Ter', 'data' => [2, 0, 10, 14, 11, 5]],
                ['name' => 'Qua', 'data' => [1, 2, 9, 13, 10, 6]],
                ['name' => 'Qui', 'data' => [2, 1, 11, 15, 12, 7]],
                ['name' => 'Sex', 'data' => [4, 2, 7, 10, 8, 3]],
            ]"
        />
        BLADE;

    $heatmapHtml = <<<'HTML'
        <div class="ui-chart ui-chart-apex relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Atividade">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $emptyCode = <<<'BLADE'
        <x-ui.chart-apex type="line" :series="[]" empty-text="Nenhuma métrica neste período" />
        BLADE;

    $emptyHtml = <<<'HTML'
        <div class="ui-chart ui-chart-apex relative w-full" style="--ui-chart-height: 320px" role="img">
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
            <code>&lt;x-ui.chart-apex&gt;</code> é um wrapper Blade/Alpine sobre
            <a href="https://apexcharts.com/" target="_blank" rel="noopener" class="text-primary underline-offset-2 hover:underline">ApexCharts</a>.
            Mesma API simplificada de props (<code>type</code>, <code>series</code>, <code>categories</code>) com escape hatch via <code>options</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Line" :code="$lineCode" :html="$lineHtml">
            <x-slot:description>
                Use <code>type="line"</code> com <code>smooth</code> e múltiplas séries.
            </x-slot:description>
            <x-ui.chart-apex
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

        <x-ui.example title="Area (stacked)" :code="$areaCode" :html="$areaHtml">
            <x-ui.chart-apex
                type="area"
                title="Visitantes"
                smooth
                stacked
                :categories="['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun']"
                :series="[
                    ['name' => 'Orgânico', 'data' => [140, 180, 160, 210, 190, 250]],
                    ['name' => 'Pago', 'data' => [80, 90, 110, 100, 130, 140]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Bar" :code="$barCode" :html="$barHtml">
            <x-ui.chart-apex
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
            <x-ui.chart-apex
                type="horizontal-bar"
                title="Top produtos"
                :categories="['Plano Pro', 'Plano Plus', 'Add-on', 'Suporte']"
                :series="[['name' => 'Receita', 'data' => [420, 310, 180, 95]]]"
                :legend="false"
            />
        </x-ui.example>

        <x-ui.example title="Donut" :code="$donutCode" :html="$donutHtml">
            <x-ui.chart-apex
                type="donut"
                title="Origem do tráfego"
                show-label
                :series="[
                    ['name' => 'Direto', 'value' => 335],
                    ['name' => 'E-mail', 'value' => 210],
                    ['name' => 'Ads', 'value' => 154],
                    ['name' => 'Social', 'value' => 135],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="RadialBar" :code="$radialCode" :html="$radialHtml">
            <x-slot:description>
                Tipo exclusivo do Apex: <code>radialBar</code>.
            </x-slot:description>
            <x-ui.chart-apex
                type="radialBar"
                title="Metas do trimestre"
                :series="[
                    ['name' => 'Vendas', 'value' => 78],
                    ['name' => 'Marketing', 'value' => 62],
                    ['name' => 'Produto', 'value' => 88],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Radar" :code="$radarCode" :html="$radarHtml">
            <x-ui.chart-apex
                type="radar"
                title="Skills"
                :categories="['Speed', 'Reliability', 'Comfort', 'Safety', 'Efficiency']"
                :series="[
                    ['name' => 'Allocated', 'data' => [80, 50, 30, 40, 100]],
                    ['name' => 'Actual', 'data' => [70, 60, 50, 60, 87]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Heatmap" :code="$heatmapCode" :html="$heatmapHtml">
            <x-ui.chart-apex
                type="heatmap"
                title="Atividade"
                :height="320"
                :series="[
                    ['name' => 'Seg', 'data' => [3, 1, 8, 12, 9, 4]],
                    ['name' => 'Ter', 'data' => [2, 0, 10, 14, 11, 5]],
                    ['name' => 'Qua', 'data' => [1, 2, 9, 13, 10, 6]],
                    ['name' => 'Qui', 'data' => [2, 1, 11, 15, 12, 7]],
                    ['name' => 'Sex', 'data' => [4, 2, 7, 10, 8, 3]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Empty" :code="$emptyCode" :html="$emptyHtml">
            <x-ui.chart-apex type="line" :series="[]" empty-text="Nenhuma métrica neste período" />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="chart-apex" />
</x-ui.docs>
