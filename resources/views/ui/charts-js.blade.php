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
        <x-ui.chart-js
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
        <div class="ui-chart ui-chart-js relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Receita mensal">
            <div class="relative w-full" style="height: var(--ui-chart-height); min-height: 160px">
                <canvas class="absolute inset-0 h-full w-full"></canvas>
            </div>
        </div>
        HTML;

    $areaCode = <<<'BLADE'
        <x-ui.chart-js
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
        <div class="ui-chart ui-chart-js relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Visitantes">
            <div class="relative w-full" style="height: var(--ui-chart-height); min-height: 160px">
                <canvas class="absolute inset-0 h-full w-full"></canvas>
            </div>
        </div>
        HTML;

    $barCode = <<<'BLADE'
        <x-ui.chart-js
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
        <div class="ui-chart ui-chart-js relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Vendas por canal">
            <div class="relative w-full" style="height: var(--ui-chart-height); min-height: 160px">
                <canvas class="absolute inset-0 h-full w-full"></canvas>
            </div>
        </div>
        HTML;

    $stackedCode = <<<'BLADE'
        <x-ui.chart-js
            type="bar"
            title="Tickets por status"
            stacked
            :categories="['Seg', 'Ter', 'Qua', 'Qui', 'Sex']"
            :series="[
                ['name' => 'Abertos', 'data' => [12, 18, 14, 20, 16]],
                ['name' => 'Em progresso', 'data' => [8, 10, 9, 11, 12]],
                ['name' => 'Resolvidos', 'data' => [22, 28, 25, 30, 27]],
            ]"
        />
        BLADE;

    $stackedHtml = <<<'HTML'
        <div class="ui-chart ui-chart-js relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Tickets por status">
            <div class="relative w-full" style="height: var(--ui-chart-height); min-height: 160px">
                <canvas class="absolute inset-0 h-full w-full"></canvas>
            </div>
        </div>
        HTML;

    $horizontalCode = <<<'BLADE'
        <x-ui.chart-js
            type="horizontal-bar"
            title="Top produtos"
            :categories="['Plano Pro', 'Plano Plus', 'Add-on', 'Suporte']"
            :series="[['name' => 'Receita', 'data' => [420, 310, 180, 95]]]"
            :legend="false"
        />
        BLADE;

    $horizontalHtml = <<<'HTML'
        <div class="ui-chart ui-chart-js relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Top produtos">
            <div class="relative w-full" style="height: var(--ui-chart-height); min-height: 160px">
                <canvas class="absolute inset-0 h-full w-full"></canvas>
            </div>
        </div>
        HTML;

    $doughnutCode = <<<'BLADE'
        <x-ui.chart-js
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

    $doughnutHtml = <<<'HTML'
        <div class="ui-chart ui-chart-js relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Origem do tráfego">
            <div class="relative w-full" style="height: var(--ui-chart-height); min-height: 160px">
                <canvas class="absolute inset-0 h-full w-full"></canvas>
            </div>
        </div>
        HTML;

    $radarCode = <<<'BLADE'
        <x-ui.chart-js
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
        <div class="ui-chart ui-chart-js relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Skills">
            <div class="relative w-full" style="height: var(--ui-chart-height); min-height: 160px">
                <canvas class="absolute inset-0 h-full w-full"></canvas>
            </div>
        </div>
        HTML;

    $polarCode = <<<'BLADE'
        <x-ui.chart-js
            type="polarArea"
            title="Categorias"
            :series="[
                ['name' => 'Red', 'value' => 11],
                ['name' => 'Green', 'value' => 16],
                ['name' => 'Yellow', 'value' => 7],
                ['name' => 'Grey', 'value' => 3],
                ['name' => 'Blue', 'value' => 14],
            ]"
        />
        BLADE;

    $polarHtml = <<<'HTML'
        <div class="ui-chart ui-chart-js relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Categorias">
            <div class="relative w-full" style="height: var(--ui-chart-height); min-height: 160px">
                <canvas class="absolute inset-0 h-full w-full"></canvas>
            </div>
        </div>
        HTML;

    $scatterCode = <<<'BLADE'
        <x-ui.chart-js
            type="scatter"
            title="Altura × Peso"
            :legend="false"
            :series="[
                ['name' => 'Grupo A', 'data' => [[161, 51], [167, 59], [159, 49], [172, 65], [168, 58]]],
                ['name' => 'Grupo B', 'data' => [[174, 70], [180, 78], [176, 72], [182, 85], [178, 75]]],
            ]"
        />
        BLADE;

    $scatterHtml = <<<'HTML'
        <div class="ui-chart ui-chart-js relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Altura × Peso">
            <div class="relative w-full" style="height: var(--ui-chart-height); min-height: 160px">
                <canvas class="absolute inset-0 h-full w-full"></canvas>
            </div>
        </div>
        HTML;

    $emptyCode = <<<'BLADE'
        <x-ui.chart-js type="line" :series="[]" empty-text="Nenhuma métrica neste período" />
        BLADE;

    $emptyHtml = <<<'HTML'
        <div class="ui-chart ui-chart-js relative w-full" style="--ui-chart-height: 320px" role="img">
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
            <code>&lt;x-ui.chart-js&gt;</code> é um wrapper Blade/Alpine sobre
            <a href="https://www.chartjs.org/" target="_blank" rel="noopener" class="text-primary underline-offset-2 hover:underline">Chart.js</a>.
            API alinhada aos outros charts da lib; use <code>options</code> para config nativa Chart.js.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Line" :code="$lineCode" :html="$lineHtml">
            <x-ui.chart-js
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
            <x-ui.chart-js
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

        <x-ui.example title="Bar" :code="$barCode" :html="$barHtml">
            <x-ui.chart-js
                type="bar"
                title="Vendas por canal"
                :categories="['Site', 'App', 'Loja', 'Parceiros']"
                :series="[
                    ['name' => 'Q1', 'data' => [320, 240, 180, 120]],
                    ['name' => 'Q2', 'data' => [280, 300, 210, 160]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Bar stacked" :code="$stackedCode" :html="$stackedHtml">
            <x-ui.chart-js
                type="bar"
                title="Tickets por status"
                stacked
                :categories="['Seg', 'Ter', 'Qua', 'Qui', 'Sex']"
                :series="[
                    ['name' => 'Abertos', 'data' => [12, 18, 14, 20, 16]],
                    ['name' => 'Em progresso', 'data' => [8, 10, 9, 11, 12]],
                    ['name' => 'Resolvidos', 'data' => [22, 28, 25, 30, 27]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Horizontal bar" :code="$horizontalCode" :html="$horizontalHtml">
            <x-ui.chart-js
                type="horizontal-bar"
                title="Top produtos"
                :categories="['Plano Pro', 'Plano Plus', 'Add-on', 'Suporte']"
                :series="[['name' => 'Receita', 'data' => [420, 310, 180, 95]]]"
                :legend="false"
            />
        </x-ui.example>

        <x-ui.example title="Donut" :code="$doughnutCode" :html="$doughnutHtml">
            <x-ui.chart-js
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

        <x-ui.example title="Radar" :code="$radarCode" :html="$radarHtml">
            <x-ui.chart-js
                type="radar"
                title="Skills"
                :categories="['Speed', 'Reliability', 'Comfort', 'Safety', 'Efficiency']"
                :series="[
                    ['name' => 'Allocated', 'data' => [80, 50, 30, 40, 100]],
                    ['name' => 'Actual', 'data' => [70, 60, 50, 60, 87]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Polar Area" :code="$polarCode" :html="$polarHtml">
            <x-slot:description>
                Tipo nativo do Chart.js: <code>polarArea</code>.
            </x-slot:description>
            <x-ui.chart-js
                type="polarArea"
                title="Categorias"
                :series="[
                    ['name' => 'Red', 'value' => 11],
                    ['name' => 'Green', 'value' => 16],
                    ['name' => 'Yellow', 'value' => 7],
                    ['name' => 'Grey', 'value' => 3],
                    ['name' => 'Blue', 'value' => 14],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Scatter" :code="$scatterCode" :html="$scatterHtml">
            <x-ui.chart-js
                type="scatter"
                title="Altura × Peso"
                :legend="false"
                :series="[
                    ['name' => 'Grupo A', 'data' => [[161, 51], [167, 59], [159, 49], [172, 65], [168, 58]]],
                    ['name' => 'Grupo B', 'data' => [[174, 70], [180, 78], [176, 72], [182, 85], [178, 75]]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Empty" :code="$emptyCode" :html="$emptyHtml">
            <x-ui.chart-js type="line" :series="[]" empty-text="Nenhuma métrica neste período" />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="chart-js" />
</x-ui.docs>
