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
        <x-ui.chart
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

/*     Nota comum a todos os $xHtml deste arquivo: este é só o "shell" estático
         renderizado pelo Blade (wrapper + alvo vazio); o desenho do gráfico em si
         (linhas, barras, fatias) acontece via Apache ECharts em tempo de execução,
         a partir do x-data="chart(...)" que não é reproduzido aqui. 
*/
    $lineHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Receita mensal">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $areaCode = <<<'BLADE'
        <x-ui.chart
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
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Visitantes">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $barCode = <<<'BLADE'
        <x-ui.chart
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
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Vendas por canal">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $stackedBarCode = <<<'BLADE'
        <x-ui.chart
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

    $stackedBarHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Tickets por status">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $horizontalCode = <<<'BLADE'
        <x-ui.chart
            type="horizontal-bar"
            title="Top produtos"
            :categories="['Plano Pro', 'Plano Plus', 'Add-on', 'Suporte']"
            :series="[['name' => 'Receita', 'data' => [420, 310, 180, 95]]]"
            :legend="false"
        />
        BLADE;

    $horizontalHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Top produtos">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $pieCode = <<<'BLADE'
        <x-ui.chart
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
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Dispositivos">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $donutCode = <<<'BLADE'
        <x-ui.chart
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
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Origem do tráfego">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $radarCode = <<<'BLADE'
        <x-ui.chart
            type="radar"
            title="Performance do time"
            :categories="['Velocidade', 'Qualidade', 'Entrega', 'Comunicação', 'Inovação']"
            :series="[
                ['name' => 'Time A', 'data' => [80, 90, 70, 85, 75]],
                ['name' => 'Time B', 'data' => [70, 75, 85, 80, 90]],
            ]"
        />
        BLADE;

    $radarHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Performance do time">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $gaugeCode = <<<'BLADE'
        <x-ui.chart
            type="gauge"
            title="Meta do mês"
            :series="72"
            :height="280"
        />
        BLADE;

    $gaugeHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 280px" role="img" aria-label="Meta do mês">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $scatterCode = <<<'BLADE'
        <x-ui.chart
            type="scatter"
            title="Altura × Peso"
            :legend="false"
            :series="[
                ['name' => 'Grupo A', 'data' => [[161, 51], [167, 59], [159, 49], [172, 65], [168, 58]]],
                ['name' => 'Grupo B', 'data' => [[174, 70], [180, 78], [176, 72], [182, 85], [178, 75]]],
            ]"
            :options="[
                'xAxis' => ['type' => 'value', 'name' => 'Altura'],
                'yAxis' => ['type' => 'value', 'name' => 'Peso'],
            ]"
        />
        BLADE;

    $scatterHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Altura × Peso">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $funnelCode = <<<'BLADE'
        <x-ui.chart
            type="funnel"
            title="Funil de conversão"
            show-label
            :series="[
                ['name' => 'Visitantes', 'value' => 1000],
                ['name' => 'Leads', 'value' => 620],
                ['name' => 'Trials', 'value' => 310],
                ['name' => 'Clientes', 'value' => 120],
            ]"
        />
        BLADE;

    $funnelHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Funil de conversão">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $heatmapCode = <<<'BLADE'
        <x-ui.chart
            type="heatmap"
            title="Atividade semanal"
            show-label
            :height="360"
            :categories="['0h', '4h', '8h', '12h', '16h', '20h']"
            :y-categories="['Seg', 'Ter', 'Qua', 'Qui', 'Sex']"
            :series="[
                [0, 0, 3], [1, 0, 1], [2, 0, 8], [3, 0, 12], [4, 0, 9], [5, 0, 4],
                [0, 1, 2], [1, 1, 0], [2, 1, 10], [3, 1, 14], [4, 1, 11], [5, 1, 5],
                [0, 2, 1], [1, 2, 2], [2, 2, 9], [3, 2, 13], [4, 2, 10], [5, 2, 6],
                [0, 3, 2], [1, 3, 1], [2, 3, 11], [3, 3, 15], [4, 3, 12], [5, 3, 7],
                [0, 4, 4], [1, 4, 2], [2, 4, 7], [3, 4, 10], [4, 4, 8], [5, 4, 3],
            ]"
        />
        BLADE;

    $heatmapHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 360px" role="img" aria-label="Atividade semanal">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.chart
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
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Cores customizadas">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $toolboxCode = <<<'BLADE'
        <x-ui.chart
            type="line"
            title="Com toolbox e zoom"
            smooth
            toolbox
            data-zoom
            :categories="['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']"
            :series="[
                ['name' => 'MRR', 'data' => [12, 14, 15, 18, 20, 22, 25, 28, 30, 34, 38, 42]],
            ]"
        />
        BLADE;

    $toolboxHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Com toolbox e zoom">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $optionsCode = <<<'BLADE'
        <x-ui.chart
            type="bar"
            :categories="['Seg', 'Ter', 'Qua', 'Qui', 'Sex']"
            :series="[['name' => 'Pedidos', 'data' => [18, 24, 20, 28, 32]]]"
            :options="[
                'title' => ['text' => 'Escape hatch: options ECharts'],
                'series' => [
                    [
                        'type' => 'bar',
                        'name' => 'Pedidos',
                        'data' => [18, 24, 20, 28, 32],
                        'itemStyle' => ['borderRadius' => [6, 6, 0, 0]],
                    ],
                ],
            ]"
        />
        BLADE;

    $optionsHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $emptyCode = <<<'BLADE'
        <x-ui.chart type="line" :series="[]" empty-text="Nenhuma métrica neste período" />
        <x-ui.chart
            type="line"
            loading
            :categories="['Jan', 'Fev', 'Mar']"
            :series="[['name' => 'Sales', 'data' => [10, 20, 15]]]"
        />
        BLADE;

    $emptyHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img">
            <div
                class="flex items-center justify-center rounded-md border border-dashed border-border bg-muted/30 px-4 text-sm text-muted-foreground"
                style="height: var(--ui-chart-height)"
            >
                Nenhuma métrica neste período
            </div>
        </div>
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;

    $mixedCode = <<<'BLADE'
        <x-ui.chart
            type="bar"
            title="Vendas + ticket médio"
            :categories="['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun']"
            :series="[
                ['name' => 'Vendas', 'type' => 'bar', 'data' => [120, 150, 140, 180, 170, 210]],
                ['name' => 'Ticket médio', 'type' => 'line', 'smooth' => true, 'yAxisIndex' => 1, 'data' => [32, 35, 30, 40, 38, 44]],
            ]"
            :options="[
                'yAxis' => [
                    ['type' => 'value', 'name' => 'Vendas'],
                    ['type' => 'value', 'name' => 'Ticket', 'splitLine' => ['show' => false]],
                ],
            ]"
        />
        BLADE;
    $mixedHtml = <<<'HTML'
        <div class="ui-chart relative w-full" style="--ui-chart-height: 320px" role="img" aria-label="Vendas + ticket médio">
            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.chart&gt;</code> é um wrapper Blade/Alpine sobre
            <a href="https://echarts.apache.org/en/index.html" target="_blank" rel="noopener" class="text-primary underline-offset-2 hover:underline">Apache ECharts</a>.
            Cubra line, area, bar, pie, donut, radar, gauge, scatter, funnel e heatmap com tokens
            de tema, resize automático, dark mode e escape hatch via <code>options</code>.
            Outras engines estão nos submenus ApexCharts, Chart.js e D3.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Line" :code="$lineCode" :html="$lineHtml">
            <x-slot:description>
                Use <code>type="line"</code> com <code>smooth</code> e múltiplas séries nomeadas.
            </x-slot:description>
            <x-ui.chart
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
            <x-slot:description>
                <code>type="area"</code> + <code>stacked</code> empilha as áreas.
            </x-slot:description>
            <x-ui.chart
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
            <x-slot:description>
                Barras agrupadas por categoria.
            </x-slot:description>
            <x-ui.chart
                type="bar"
                title="Vendas por canal"
                :categories="['Site', 'App', 'Loja', 'Parceiros']"
                :series="[
                    ['name' => 'Q1', 'data' => [320, 240, 180, 120]],
                    ['name' => 'Q2', 'data' => [280, 300, 210, 160]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Bar stacked" :code="$stackedBarCode" :html="$stackedBarHtml">
            <x-slot:description>
                Ative <code>stacked</code> para empilhar segmentos.
            </x-slot:description>
            <x-ui.chart
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
            <x-slot:description>
                <code>type="horizontal-bar"</code> inverte os eixos.
            </x-slot:description>
            <x-ui.chart
                type="horizontal-bar"
                title="Top produtos"
                :categories="['Plano Pro', 'Plano Plus', 'Add-on', 'Suporte']"
                :series="[['name' => 'Receita', 'data' => [420, 310, 180, 95]]]"
                :legend="false"
            />
        </x-ui.example>

        <x-ui.example title="Pie" :code="$pieCode" :html="$pieHtml">
            <x-slot:description>
                Séries no formato <code>[['name' => …, 'value' => …]]</code>.
            </x-slot:description>
            <x-ui.chart
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
            <x-slot:description>
                <code>type="donut"</code> com <code>show-label</code> para percentuais.
            </x-slot:description>
            <x-ui.chart
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

        <x-ui.example title="Radar" :code="$radarCode" :html="$radarHtml">
            <x-slot:description>
                <code>categories</code> vira os indicadores do radar.
            </x-slot:description>
            <x-ui.chart
                type="radar"
                title="Performance do time"
                :categories="['Velocidade', 'Qualidade', 'Entrega', 'Comunicação', 'Inovação']"
                :series="[
                    ['name' => 'Time A', 'data' => [80, 90, 70, 85, 75]],
                    ['name' => 'Time B', 'data' => [70, 75, 85, 80, 90]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Gauge" :code="$gaugeCode" :html="$gaugeHtml">
            <x-slot:description>
                Passe um número (ou série) em <code>series</code>.
            </x-slot:description>
            <x-ui.chart
                type="gauge"
                title="Meta do mês"
                :series="72"
                :height="280"
            />
        </x-ui.example>

        <x-ui.example title="Scatter" :code="$scatterCode" :html="$scatterHtml">
            <x-slot:description>
                Pontos como pares <code>[x, y]</code>; combine com <code>options</code> para eixos valor.
            </x-slot:description>
            <x-ui.chart
                type="scatter"
                title="Altura × Peso"
                :legend="false"
                :series="[
                    ['name' => 'Grupo A', 'data' => [[161, 51], [167, 59], [159, 49], [172, 65], [168, 58]]],
                    ['name' => 'Grupo B', 'data' => [[174, 70], [180, 78], [176, 72], [182, 85], [178, 75]]],
                ]"
                :options="[
                    'xAxis' => ['type' => 'value', 'name' => 'Altura'],
                    'yAxis' => ['type' => 'value', 'name' => 'Peso'],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Funnel" :code="$funnelCode" :html="$funnelHtml">
            <x-slot:description>
                Ideal para funis de conversão.
            </x-slot:description>
            <x-ui.chart
                type="funnel"
                title="Funil de conversão"
                show-label
                :series="[
                    ['name' => 'Visitantes', 'value' => 1000],
                    ['name' => 'Leads', 'value' => 620],
                    ['name' => 'Trials', 'value' => 310],
                    ['name' => 'Clientes', 'value' => 120],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Heatmap" :code="$heatmapCode" :html="$heatmapHtml">
            <x-slot:description>
                Dados no formato <code>[xIndex, yIndex, value]</code> com <code>categories</code> e <code>y-categories</code>.
            </x-slot:description>
            <x-ui.chart
                type="heatmap"
                title="Atividade semanal"
                show-label
                :height="360"
                :categories="['0h', '4h', '8h', '12h', '16h', '20h']"
                :y-categories="['Seg', 'Ter', 'Qua', 'Qui', 'Sex']"
                :series="[
                    [0, 0, 3], [1, 0, 1], [2, 0, 8], [3, 0, 12], [4, 0, 9], [5, 0, 4],
                    [0, 1, 2], [1, 1, 0], [2, 1, 10], [3, 1, 14], [4, 1, 11], [5, 1, 5],
                    [0, 2, 1], [1, 2, 2], [2, 2, 9], [3, 2, 13], [4, 2, 10], [5, 2, 6],
                    [0, 3, 2], [1, 3, 1], [2, 3, 11], [3, 3, 15], [4, 3, 12], [5, 3, 7],
                    [0, 4, 4], [1, 4, 2], [2, 4, 7], [3, 4, 10], [4, 4, 8], [5, 4, 3],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Misto (bar + line)" :code="$mixedCode" :html="$mixedHtml">
            <x-slot:description>
                Misture tipos por série e use <code>options.yAxis</code> para eixo duplo.
            </x-slot:description>
            <x-ui.chart
                type="bar"
                title="Vendas + ticket médio"
                :categories="['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun']"
                :series="[
                    ['name' => 'Vendas', 'type' => 'bar', 'data' => [120, 150, 140, 180, 170, 210]],
                    ['name' => 'Ticket médio', 'type' => 'line', 'smooth' => true, 'yAxisIndex' => 1, 'data' => [32, 35, 30, 40, 38, 44]],
                ]"
                :options="[
                    'yAxis' => [
                        ['type' => 'value', 'name' => 'Vendas'],
                        ['type' => 'value', 'name' => 'Ticket', 'splitLine' => ['show' => false]],
                    ],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>colors</code> aceita tokens do tema ou hex.
            </x-slot:description>
            <x-ui.chart
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

        <x-ui.example title="Toolbox + dataZoom" :code="$toolboxCode" :html="$toolboxHtml">
            <x-slot:description>
                <code>toolbox</code> e <code>data-zoom</code> para explorar séries longas.
            </x-slot:description>
            <x-ui.chart
                type="line"
                title="Com toolbox e zoom"
                smooth
                toolbox
                data-zoom
                :categories="['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']"
                :series="[
                    ['name' => 'MRR', 'data' => [12, 14, 15, 18, 20, 22, 25, 28, 30, 34, 38, 42]],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Options (ECharts raw)" :code="$optionsCode" :html="$optionsHtml">
            <x-slot:description>
                <code>options</code> faz merge profundo com a option gerada — escape hatch completo.
            </x-slot:description>
            <x-ui.chart
                type="bar"
                :categories="['Seg', 'Ter', 'Qua', 'Qui', 'Sex']"
                :series="[['name' => 'Pedidos', 'data' => [18, 24, 20, 28, 32]]]"
                :options="[
                    'title' => ['text' => 'Escape hatch: options ECharts'],
                    'series' => [
                        [
                            'type' => 'bar',
                            'name' => 'Pedidos',
                            'data' => [18, 24, 20, 28, 32],
                            'itemStyle' => ['borderRadius' => [6, 6, 0, 0]],
                        ],
                    ],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Empty + loading" :code="$emptyCode" :html="$emptyHtml">
            <x-slot:description>
                Sem dados mostra <code>empty-text</code>. Use <code>loading</code> durante fetch.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.chart type="line" :series="[]" empty-text="Nenhuma métrica neste período" />
                <x-ui.chart
                    type="line"
                    loading
                    :categories="['Jan', 'Fev', 'Mar']"
                    :series="[['name' => 'Sales', 'data' => [10, 20, 15]]]"
                />
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="chart" />
</x-ui.docs>
