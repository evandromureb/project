// <x-ui.chart-apex> — Alpine.data nomeado. Motor: ApexCharts (https://apexcharts.com/).
import {
    cssVar,
    deepMerge,
    isEmptySeries,
    normalizeNamedSeries,
    normalizePieData,
    themePalette,
} from './chart-theme';
import 'apexcharts/dist/apexcharts.css';

let apexPromise = null;

function loadApex() {
    if (!apexPromise) {
        apexPromise = import('apexcharts').then((mod) => mod.default ?? mod);
    }

    return apexPromise;
}

/**
 * ApexCharts 6.x lê `config.subtitle.text` sem optional chaining em
 * getAccessibleChartLabel(). Passar `subtitle: undefined` sobrescreve o default
 * e explode o render — sempre enviar objetos { text } (string vazia ok).
 */
function omitUndefined(value) {
    if (Array.isArray(value)) {
        return value.map(omitUndefined);
    }

    if (!value || typeof value !== 'object') {
        return value;
    }

    return Object.fromEntries(
        Object.entries(value)
            .filter(([, entry]) => entry !== undefined)
            .map(([key, entry]) => [key, omitUndefined(entry)]),
    );
}

function buildOptions(el, config) {
    const type = config.type ?? 'line';
    const categories = config.categories ?? config.labels ?? [];
    const palette = themePalette(el, config.colors);
    const muted = cssVar(el, '--muted-foreground', '#64748b');
    const foreground = cssVar(el, '--foreground', '#1e293b');
    const border = cssVar(el, '--border', '#e9ebec');
    const pieTypes = new Set(['pie', 'donut', 'radialBar']);
    const height = Number.parseInt(String(config.height ?? 320), 10) || 320;

    let chartType = type;
    let series;
    let plotOptions = {};
    let xaxis = { categories };
    let labels = categories;

    if (type === 'horizontal-bar') {
        chartType = 'bar';
        plotOptions = { bar: { horizontal: true, borderRadius: 4 } };
        series = normalizeNamedSeries(config.series).map((s) => ({ name: s.name, data: s.data }));
    } else if (type === 'area') {
        chartType = 'area';
        series = normalizeNamedSeries(config.series).map((s) => ({ name: s.name, data: s.data }));
    } else if (type === 'donut') {
        chartType = 'donut';
        const pie = normalizePieData(config.series);
        series = pie.map((item) => item.value);
        labels = pie.map((item) => item.name);
    } else if (type === 'pie') {
        chartType = 'pie';
        const pie = normalizePieData(config.series);
        series = pie.map((item) => item.value);
        labels = pie.map((item) => item.name);
    } else if (type === 'radialBar') {
        chartType = 'radialBar';
        const pie = normalizePieData(config.series);
        series = pie.map((item) => item.value);
        labels = pie.map((item) => item.name);
        plotOptions = {
            radialBar: {
                dataLabels: {
                    name: { fontSize: '13px' },
                    value: { fontSize: '16px', color: foreground },
                    total: {
                        show: true,
                        label: 'Total',
                        color: muted,
                        formatter(w) {
                            return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                        },
                    },
                },
            },
        };
    } else if (type === 'radar') {
        chartType = 'radar';
        series = normalizeNamedSeries(config.series).map((s) => ({ name: s.name, data: s.data }));
    } else if (type === 'scatter') {
        chartType = 'scatter';
        series = normalizeNamedSeries(config.series).map((s) => ({ name: s.name, data: s.data }));
        xaxis = { type: 'numeric' };
    } else if (type === 'heatmap') {
        chartType = 'heatmap';
        series = Array.isArray(config.series)
            ? config.series.map((item, index) => {
                  if (item?.name && Array.isArray(item.data)) {
                      return item;
                  }

                  return {
                      name: (config.yCategories ?? [])[index] ?? `Row ${index + 1}`,
                      data: Array.isArray(item) ? item : item?.data ?? [],
                  };
              })
            : [];
    } else {
        chartType = type === 'bar' ? 'bar' : 'line';
        series = normalizeNamedSeries(config.series).map((s) => ({ name: s.name, data: s.data }));

        if (type === 'bar') {
            plotOptions = { bar: { borderRadius: 4, columnWidth: '55%' } };
        }
    }

    const built = {
        chart: {
            type: chartType,
            height,
            width: '100%',
            fontFamily: getComputedStyle(el).fontFamily,
            background: 'transparent',
            toolbar: { show: Boolean(config.toolbox) },
            zoom: { enabled: Boolean(config.dataZoom) },
            stacked: Boolean(config.stacked),
            animations: { enabled: config.animation !== false },
            foreColor: muted,
        },
        colors: palette,
        series,
        // ApexCharts 6: title/subtitle devem ser objetos com `.text` (nunca undefined).
        title: {
            text: config.title ?? '',
            style: { fontSize: '14px', fontWeight: 600, color: foreground },
        },
        subtitle: {
            text: config.subtitle ?? '',
            style: { color: muted, fontSize: '12px' },
        },
        legend: {
            show: config.legend !== false,
            labels: { colors: muted },
        },
        tooltip: {
            enabled: config.tooltip !== false,
            theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
        },
        dataLabels: { enabled: Boolean(config.showLabel) },
        stroke: {
            curve: config.smooth ? 'smooth' : 'straight',
            width: type === 'area' || type === 'line' ? 2 : undefined,
        },
        plotOptions,
        grid: {
            borderColor: border,
            strokeDashArray: 4,
        },
        theme: {
            mode: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
        },
    };

    if (pieTypes.has(type)) {
        built.labels = labels;
    } else {
        built.xaxis = {
            ...xaxis,
            labels: { style: { colors: muted } },
            axisBorder: { color: border },
            axisTicks: { color: border },
        };
        built.yaxis = {
            labels: { style: { colors: muted } },
        };
    }

    if (type === 'area') {
        built.fill = { type: 'gradient', opacity: 0.35 };
    }

    if (type === 'line' || type === 'area') {
        built.stroke.width = 2;
    }

    const merged = config.options && typeof config.options === 'object'
        ? deepMerge(built, config.options)
        : built;

    return omitUndefined(merged);
}

document.addEventListener('alpine:init', () => {
    Alpine.data('chartApex', (config) => ({
        config: config ?? {},
        chart: null,
        empty: isEmptySeries(config?.series) && !config?.options?.series,
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
                    this.empty = isEmptySeries(this.config.series) && !this.config.options?.series;
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

            if (this.empty && !this.config.options?.series) {
                if (this.chart) {
                    this.chart.destroy();
                    this.chart = null;
                }

                return;
            }

            try {
                const ApexCharts = await loadApex();

                if (!this.$el.isConnected) {
                    return;
                }

                const options = buildOptions(this.$el, this.config);

                if (this.chart) {
                    await this.chart.updateOptions(options, true, true);
                } else {
                    this.chart = new ApexCharts(canvas, options);
                    await this.chart.render();
                    this.chart.addEventListener('dataPointSelection', (_event, _chartContext, payload) => {
                        this.$dispatch('chart-click', {
                            seriesIndex: payload.seriesIndex,
                            dataIndex: payload.dataPointIndex,
                            value: payload.w?.config?.series?.[payload.seriesIndex],
                        });
                    });
                }
            } catch (error) {
                console.error('[x-ui.chart-apex] falha ao renderizar', error);
            }
        },

        update(partial = {}) {
            this.config = { ...this.config, ...partial };
            this.empty = isEmptySeries(this.config.series) && !this.config.options?.series;
            this.render();
        },

        resize() {
            this.chart?.resize?.();
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
