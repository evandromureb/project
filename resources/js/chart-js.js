// <x-ui.chart-js> — Alpine.data nomeado. Motor: Chart.js (https://www.chartjs.org/).
import {
    cssVar,
    deepMerge,
    isEmptySeries,
    normalizeNamedSeries,
    normalizePieData,
    themePalette,
} from './chart-theme';

let chartJsPromise = null;

function loadChartJs() {
    if (!chartJsPromise) {
        chartJsPromise = import('chart.js/auto').then((mod) => mod.Chart ?? mod.default);
    }

    return chartJsPromise;
}

function withAlpha(hex, alpha = 0.25) {
    if (typeof hex !== 'string' || !hex.startsWith('#') || (hex.length !== 7 && hex.length !== 4)) {
        return hex;
    }

    let r;
    let g;
    let b;

    if (hex.length === 4) {
        r = Number.parseInt(hex[1] + hex[1], 16);
        g = Number.parseInt(hex[2] + hex[2], 16);
        b = Number.parseInt(hex[3] + hex[3], 16);
    } else {
        r = Number.parseInt(hex.slice(1, 3), 16);
        g = Number.parseInt(hex.slice(3, 5), 16);
        b = Number.parseInt(hex.slice(5, 7), 16);
    }

    return `rgba(${r}, ${g}, ${b}, ${alpha})`;
}

function mapType(type) {
    const map = {
        line: 'line',
        area: 'line',
        bar: 'bar',
        'horizontal-bar': 'bar',
        pie: 'pie',
        donut: 'doughnut',
        doughnut: 'doughnut',
        radar: 'radar',
        polarArea: 'polarArea',
        scatter: 'scatter',
    };

    return map[type] ?? 'line';
}

function buildConfig(el, config) {
    const type = config.type ?? 'line';
    const chartType = mapType(type);
    const categories = config.categories ?? config.labels ?? [];
    const palette = themePalette(el, config.colors);
    const muted = cssVar(el, '--muted-foreground', '#64748b');
    const foreground = cssVar(el, '--foreground', '#1e293b');
    const border = cssVar(el, '--border', '#e9ebec');
    const card = cssVar(el, '--card', '#ffffff');
    const pieTypes = new Set(['pie', 'donut', 'doughnut', 'polarArea']);

    let datasets;
    let labels = categories;

    if (pieTypes.has(type)) {
        const pie = normalizePieData(config.series);
        labels = pie.map((item) => item.name);
        datasets = [
            {
                data: pie.map((item) => item.value),
                backgroundColor: pie.map((_, index) => palette[index % palette.length]),
                borderColor: card,
                borderWidth: 2,
            },
        ];
    } else if (type === 'scatter') {
        datasets = normalizeNamedSeries(config.series).map((series, index) => ({
            label: series.name,
            data: (series.data ?? []).map((point) =>
                Array.isArray(point) ? { x: point[0], y: point[1] } : point,
            ),
            backgroundColor: palette[index % palette.length],
            borderColor: palette[index % palette.length],
        }));
    } else {
        datasets = normalizeNamedSeries(config.series).map((series, index) => {
            const color = palette[index % palette.length];

            return {
                label: series.name,
                data: series.data,
                type: series.type ? mapType(series.type) : undefined,
                borderColor: color,
                backgroundColor: type === 'area' ? withAlpha(color, 0.28) : color,
                fill: type === 'area',
                tension: config.smooth ? 0.35 : 0,
                borderRadius: type.includes('bar') ? 4 : 0,
                stack: config.stacked ? 'stack' : undefined,
            };
        });
    }

    const built = {
        type: chartType,
        data: { labels, datasets },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: type === 'horizontal-bar' ? 'y' : 'x',
            animation: config.animation === false ? false : undefined,
            plugins: {
                title: {
                    display: Boolean(config.title),
                    text: config.title ?? '',
                    color: foreground,
                    font: { size: 14, weight: 600 },
                },
                subtitle: {
                    display: Boolean(config.subtitle),
                    text: config.subtitle ?? '',
                    color: muted,
                },
                legend: {
                    display: config.legend !== false,
                    labels: { color: muted },
                },
                tooltip: {
                    enabled: config.tooltip !== false,
                    backgroundColor: card,
                    titleColor: foreground,
                    bodyColor: foreground,
                    borderColor: border,
                    borderWidth: 1,
                },
            },
            scales: pieTypes.has(type) || type === 'radar' || type === 'polarArea'
                ? undefined
                : {
                      x: {
                          stacked: Boolean(config.stacked),
                          ticks: { color: muted },
                          grid: { color: border },
                          border: { color: border },
                      },
                      y: {
                          stacked: Boolean(config.stacked),
                          ticks: { color: muted },
                          grid: { color: border },
                          border: { color: border },
                      },
                  },
            elements: {
                point: { radius: type === 'scatter' ? 5 : 3 },
            },
        },
    };

    if (config.showLabel) {
        built.options.plugins.datalabels = undefined;
    }

    if (config.options && typeof config.options === 'object') {
        return deepMerge(built, config.options);
    }

    return built;
}

document.addEventListener('alpine:init', () => {
    Alpine.data('chartJs', (config) => ({
        config: config ?? {},
        chart: null,
        empty: isEmptySeries(config?.series) && !config?.options?.data,
        themeObserver: null,
        resizeObserver: null,

        init() {
            this.$nextTick(() => {
                this.render();
                this.watchTheme();
                this.watchResize();
            });

            this.$watch(
                () => JSON.stringify(this.config),
                () => {
                    this.empty = isEmptySeries(this.config.series) && !this.config.options?.data;
                    this.render();
                },
            );
        },

        destroy() {
            this.teardown();
        },

        teardown() {
            this.resizeObserver?.disconnect();
            this.themeObserver?.disconnect();
            this.resizeObserver = null;
            this.themeObserver = null;

            if (this.chart) {
                this.chart.destroy();
                this.chart = null;
            }
        },

        async render() {
            const canvas = this.$refs.canvas;

            if (!canvas) {
                return;
            }

            if (this.empty && !this.config.options?.data) {
                if (this.chart) {
                    this.chart.destroy();
                    this.chart = null;
                }

                return;
            }

            const Chart = await loadChartJs();

            if (!this.$el.isConnected) {
                return;
            }

            const chartConfig = buildConfig(this.$el, this.config);

            chartConfig.options = chartConfig.options ?? {};
            chartConfig.options.onClick = (_event, elements, chart) => {
                if (!elements?.length) {
                    return;
                }

                const element = elements[0];

                this.$dispatch('chart-click', {
                    dataIndex: element.index,
                    seriesIndex: element.datasetIndex,
                    value: chart.data.datasets?.[element.datasetIndex]?.data?.[element.index],
                    label: chart.data.labels?.[element.index],
                });
            };

            if (this.chart) {
                this.chart.destroy();
                this.chart = null;
            }

            this.chart = new Chart(canvas, chartConfig);
        },

        update(partial = {}) {
            this.config = { ...this.config, ...partial };
            this.empty = isEmptySeries(this.config.series) && !this.config.options?.data;
            this.render();
        },

        resize() {
            this.chart?.resize();
        },

        watchResize() {
            if (typeof ResizeObserver === 'undefined') {
                window.addEventListener('resize', () => this.resize());

                return;
            }

            this.resizeObserver = new ResizeObserver(() => this.resize());
            this.resizeObserver.observe(this.$el);
        },

        watchTheme() {
            this.themeObserver = new MutationObserver(() => this.render());
            this.themeObserver.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['class', 'data-theme'],
            });
        },
    }));
});
