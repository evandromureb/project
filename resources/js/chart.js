// <x-ui.chart> — Alpine.data nomeado (não x-data inline). A lógica usa
// comparações/arrow functions que quebrariam wire:navigate num atributo
// x-data="{...}" inline. Ver reference/dropdown.md (gotcha #4).
// Motor: Apache ECharts (https://echarts.apache.org/), carregado sob demanda
// para não inflar o bundle das páginas sem charts.
let echartsPromise = null;

function loadEcharts() {
    if (!echartsPromise) {
        echartsPromise = import('echarts');
    }

    return echartsPromise;
}

const TOKEN_COLORS = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

const CARTESIAN_TYPES = new Set(['line', 'area', 'bar', 'horizontal-bar', 'scatter']);

function cssVar(el, name, fallback = '') {
    const value = getComputedStyle(el).getPropertyValue(name).trim();

    return value || fallback;
}

function resolveColor(el, color) {
    if (!color) {
        return null;
    }

    if (typeof color !== 'string') {
        return color;
    }

    if (TOKEN_COLORS.includes(color)) {
        return cssVar(el, `--${color}`, color);
    }

    return color;
}

function themePalette(el, colors = null) {
    if (Array.isArray(colors) && colors.length > 0) {
        return colors.map((color) => resolveColor(el, color) ?? color);
    }

    return TOKEN_COLORS.map((token) => cssVar(el, `--${token}`));
}

function themeTextStyle(el) {
    return {
        color: cssVar(el, '--muted-foreground', '#64748b'),
        fontFamily: getComputedStyle(el).fontFamily,
    };
}

function deepMerge(target, source) {
    if (!source || typeof source !== 'object' || Array.isArray(source)) {
        return source ?? target;
    }

    const output = { ...(target ?? {}) };

    Object.keys(source).forEach((key) => {
        const value = source[key];

        if (value && typeof value === 'object' && !Array.isArray(value)) {
            output[key] = deepMerge(output[key], value);
        } else {
            output[key] = value;
        }
    });

    return output;
}

function isEmptySeries(series) {
    if (series == null) {
        return true;
    }

    if (typeof series === 'number') {
        return false;
    }

    if (!Array.isArray(series)) {
        return true;
    }

    if (series.length === 0) {
        return true;
    }

    if (series.every((item) => typeof item === 'number' || item == null)) {
        return series.every((item) => item == null);
    }

    return false;
}

function normalizeCartesianSeries(type, series, stacked, smooth, showLabel) {
    const baseType = type === 'area' ? 'line' : type === 'horizontal-bar' ? 'bar' : type;

    if (!Array.isArray(series)) {
        return [];
    }

    if (series.every((item) => typeof item === 'number' || item == null)) {
        return [
            {
                type: baseType,
                data: series,
                smooth: smooth || undefined,
                stack: stacked ? 'total' : undefined,
                areaStyle: type === 'area' ? {} : undefined,
                label: showLabel ? { show: true } : undefined,
                emphasis: { focus: 'series' },
            },
        ];
    }

    return series.map((item) => {
        if (typeof item === 'number' || item == null) {
            return { type: baseType, data: [item] };
        }

        const itemType = item.type ?? baseType;
        const isArea = type === 'area' || itemType === 'area' || item.areaStyle != null;

        return {
            name: item.name,
            type: itemType === 'area' ? 'line' : itemType,
            data: item.data ?? [],
            smooth: item.smooth ?? (smooth || undefined),
            stack: item.stack ?? (stacked ? 'total' : undefined),
            areaStyle: isArea ? (item.areaStyle ?? {}) : item.areaStyle,
            label: item.label ?? (showLabel ? { show: true } : undefined),
            itemStyle: item.itemStyle,
            emphasis: item.emphasis ?? { focus: 'series' },
            yAxisIndex: item.yAxisIndex,
            xAxisIndex: item.xAxisIndex,
            markLine: item.markLine,
            markPoint: item.markPoint,
        };
    });
}

function normalizePieSeries(type, series, showLabel) {
    let data = series;

    if (Array.isArray(series) && series.length === 1 && Array.isArray(series[0]?.data)) {
        data = series[0].data;
    }

    if (!Array.isArray(data)) {
        data = [];
    }

    data = data.map((item) => {
        if (typeof item === 'number') {
            return { value: item };
        }

        return {
            name: item.name,
            value: item.value ?? 0,
            itemStyle: item.itemStyle,
        };
    });

    return [
        {
            type: 'pie',
            radius: type === 'donut' ? ['45%', '70%'] : '65%',
            center: ['50%', '50%'],
            avoidLabelOverlap: true,
            itemStyle: {
                borderRadius: type === 'donut' ? 6 : 4,
                borderColor: 'transparent',
                borderWidth: 2,
            },
            label: showLabel
                ? { show: true, formatter: '{b}: {d}%' }
                : { show: true, formatter: '{b}' },
            emphasis: {
                label: { show: true, fontWeight: '600' },
                itemStyle: { shadowBlur: 8, shadowOffsetX: 0 },
            },
            data,
        },
    ];
}

function normalizeRadarSeries(series, showLabel) {
    if (!Array.isArray(series)) {
        return [];
    }

    if (series.every((item) => typeof item === 'number' || item == null)) {
        return [
            {
                type: 'radar',
                data: [{ value: series }],
                label: showLabel ? { show: true } : undefined,
            },
        ];
    }

    return [
        {
            type: 'radar',
            data: series.map((item) => ({
                name: item.name,
                value: item.data ?? item.value ?? [],
            })),
            label: showLabel ? { show: true } : undefined,
            areaStyle: { opacity: 0.15 },
        },
    ];
}

function normalizeGaugeSeries(series, showLabel) {
    let value = 0;

    if (typeof series === 'number') {
        value = series;
    } else if (Array.isArray(series) && series.length > 0) {
        const first = series[0];
        value = typeof first === 'number' ? first : (first.value ?? first.data?.[0] ?? 0);
    }

    return [
        {
            type: 'gauge',
            progress: { show: true, width: 12 },
            axisLine: { lineStyle: { width: 12 } },
            axisTick: { show: false },
            splitLine: { length: 8, lineStyle: { width: 2 } },
            anchor: { show: true, showAbove: true, size: 14, itemStyle: { borderWidth: 2 } },
            title: { show: false },
            detail: {
                valueAnimation: true,
                fontSize: 22,
                formatter: showLabel ? '{value}%' : '{value}',
                offsetCenter: [0, '70%'],
            },
            data: [{ value }],
        },
    ];
}

function normalizeFunnelSeries(series, showLabel) {
    let data = series;

    if (Array.isArray(series) && series.length === 1 && Array.isArray(series[0]?.data)) {
        data = series[0].data;
    }

    if (!Array.isArray(data)) {
        data = [];
    }

    data = data.map((item) => {
        if (typeof item === 'number') {
            return { value: item };
        }

        return { name: item.name, value: item.value ?? 0 };
    });

    return [
        {
            type: 'funnel',
            left: '12%',
            width: '76%',
            minSize: '10%',
            maxSize: '100%',
            sort: 'descending',
            gap: 4,
            label: {
                show: true,
                position: 'inside',
                formatter: showLabel ? '{b}: {c}' : '{b}',
            },
            itemStyle: { borderColor: 'transparent', borderWidth: 1 },
            data,
        },
    ];
}

function normalizeHeatmapSeries(series, showLabel) {
    let data = series;

    if (Array.isArray(series) && series.length === 1 && Array.isArray(series[0]?.data)) {
        data = series[0].data;
    }

    if (!Array.isArray(data)) {
        data = [];
    }

    return [
        {
            type: 'heatmap',
            data,
            label: { show: showLabel },
            emphasis: {
                itemStyle: { shadowBlur: 8, shadowColor: 'rgba(0, 0, 0, 0.25)' },
            },
        },
    ];
}

function buildOption(el, config) {
    const type = config.type ?? 'line';
    const series = config.series ?? [];
    const categories = config.categories ?? config.labels ?? [];
    const yCategories = config.yCategories ?? [];
    const textStyle = themeTextStyle(el);
    const palette = themePalette(el, config.colors);
    const border = cssVar(el, '--border', '#e9ebec');
    const card = cssVar(el, '--card', '#ffffff');
    const foreground = cssVar(el, '--foreground', '#1e293b');
    const muted = cssVar(el, '--muted-foreground', '#64748b');

    const base = {
        color: palette,
        textStyle,
        backgroundColor: 'transparent',
        animation: config.animation !== false,
        title: config.title
            ? {
                  text: config.title,
                  subtext: config.subtitle ?? undefined,
                  left: 'left',
                  textStyle: { color: foreground, fontSize: 14, fontWeight: 600 },
                  subtextStyle: { color: muted, fontSize: 12 },
              }
            : undefined,
        tooltip: config.tooltip !== false
            ? {
                  trigger: CARTESIAN_TYPES.has(type) || type === 'heatmap' ? 'axis' : 'item',
                  axisPointer: CARTESIAN_TYPES.has(type)
                      ? { type: type.includes('bar') ? 'shadow' : 'line' }
                      : undefined,
                  backgroundColor: card,
                  borderColor: border,
                  textStyle: { color: foreground },
              }
            : undefined,
        legend: config.legend !== false
            ? {
                  type: 'scroll',
                  top: config.title ? 28 : 0,
                  textStyle: { color: muted },
              }
            : undefined,
        toolbox: config.toolbox
            ? {
                  feature: {
                      saveAsImage: { title: 'Salvar' },
                      dataView: { readOnly: true, title: 'Dados', lang: ['Dados', 'Fechar', 'Atualizar'] },
                      restore: { title: 'Restaurar' },
                  },
                  iconStyle: { borderColor: muted },
              }
            : undefined,
        dataZoom: config.dataZoom
            ? [
                  { type: 'inside', start: 0, end: 100 },
                  { type: 'slider', start: 0, end: 100, height: 18, bottom: 8 },
              ]
            : undefined,
    };

    let built;

    if (type === 'pie' || type === 'donut') {
        built = {
            ...base,
            series: normalizePieSeries(type, series, config.showLabel),
        };
    } else if (type === 'radar') {
        const max = config.max ?? Math.max(
            100,
            ...normalizeRadarSeries(series, false).flatMap((s) =>
                (s.data ?? []).flatMap((d) => d.value ?? []),
            ),
        );

        built = {
            ...base,
            radar: {
                indicator: (categories.length > 0 ? categories : ['A', 'B', 'C', 'D', 'E']).map((name) =>
                    typeof name === 'string' ? { name, max } : name,
                ),
                axisName: { color: muted },
                splitLine: { lineStyle: { color: border } },
                splitArea: { areaStyle: { color: ['transparent', cssVar(el, '--muted', '#e2e8f0') + '33'] } },
                axisLine: { lineStyle: { color: border } },
            },
            series: normalizeRadarSeries(series, config.showLabel),
        };
    } else if (type === 'gauge') {
        built = {
            ...base,
            legend: undefined,
            series: normalizeGaugeSeries(series, config.showLabel !== false),
        };
    } else if (type === 'funnel') {
        built = {
            ...base,
            tooltip: { ...(base.tooltip ?? {}), trigger: 'item' },
            series: normalizeFunnelSeries(series, config.showLabel),
        };
    } else if (type === 'heatmap') {
        const flat = Array.isArray(series?.[0]?.data) ? series[0].data : series;
        const values = (flat ?? []).map((item) => (Array.isArray(item) ? item[2] : 0));
        const min = config.min ?? Math.min(0, ...values);
        const max = config.max ?? Math.max(1, ...values);

        built = {
            ...base,
            tooltip: { ...(base.tooltip ?? {}), position: 'top' },
            grid: {
                top: config.title ? 56 : 32,
                left: 48,
                right: 24,
                bottom: config.dataZoom ? 56 : 32,
            },
            xAxis: {
                type: 'category',
                data: categories,
                splitArea: { show: true },
                axisLabel: { color: muted },
                axisLine: { lineStyle: { color: border } },
            },
            yAxis: {
                type: 'category',
                data: yCategories,
                splitArea: { show: true },
                axisLabel: { color: muted },
                axisLine: { lineStyle: { color: border } },
            },
            visualMap: {
                min,
                max,
                calculable: true,
                orient: 'horizontal',
                left: 'center',
                bottom: config.dataZoom ? 36 : 0,
                inRange: {
                    color: [
                        cssVar(el, '--primary') + '22',
                        cssVar(el, '--primary'),
                        cssVar(el, '--danger'),
                    ],
                },
                textStyle: { color: muted },
            },
            series: normalizeHeatmapSeries(series, config.showLabel),
        };
    } else {
        const horizontal = type === 'horizontal-bar';
        const isScatter = type === 'scatter';
        const categoryAxis = {
            type: 'category',
            data: categories,
            axisTick: { alignWithLabel: true },
            axisLabel: { color: muted },
            axisLine: { lineStyle: { color: border } },
            splitLine: { show: false },
        };
        const valueAxis = {
            type: 'value',
            axisLabel: { color: muted },
            axisLine: { show: false },
            splitLine: { lineStyle: { color: border, type: 'dashed' } },
        };

        let xAxis = horizontal ? valueAxis : categoryAxis;
        let yAxis = horizontal ? categoryAxis : valueAxis;

        if (isScatter) {
            xAxis = { ...valueAxis, splitLine: { lineStyle: { color: border, type: 'dashed' } } };
            yAxis = { ...valueAxis };
        }

        built = {
            ...base,
            grid: {
                top: config.title ? 56 : (config.legend !== false ? 40 : 24),
                left: 12,
                right: 16,
                bottom: config.dataZoom ? 56 : 12,
                containLabel: true,
                ...(config.grid ?? {}),
            },
            xAxis,
            yAxis,
            series: normalizeCartesianSeries(
                type,
                series,
                config.stacked,
                config.smooth,
                config.showLabel,
            ),
        };
    }

    if (config.xAxis && built.xAxis) {
        built.xAxis = deepMerge(built.xAxis, config.xAxis);
    }

    if (config.yAxis && built.yAxis) {
        built.yAxis = deepMerge(built.yAxis, config.yAxis);
    }

    if (config.options && typeof config.options === 'object') {
        built = deepMerge(built, config.options);
    }

    return built;
}

document.addEventListener('alpine:init', () => {
    Alpine.data('chart', (config) => ({
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
            if (this.resizeObserver) {
                this.resizeObserver.disconnect();
                this.resizeObserver = null;
            }

            if (this.themeObserver) {
                this.themeObserver.disconnect();
                this.themeObserver = null;
            }

            if (this.chart) {
                this.chart.dispose();
                this.chart = null;
            }
        },

        themeColors() {
            return themePalette(this.$el, this.config.colors);
        },

        buildOption() {
            return buildOption(this.$el, this.config);
        },

        async render() {
            const canvas = this.$refs.canvas;

            if (!canvas) {
                return;
            }

            if (this.empty && !this.config.options?.series) {
                if (this.chart) {
                    this.chart.dispose();
                    this.chart = null;
                }

                return;
            }

            const echarts = await loadEcharts();

            if (!this.$el.isConnected) {
                return;
            }

            if (!this.chart) {
                this.chart = echarts.init(canvas, null, { renderer: 'canvas' });
                this.chart.on('click', (params) => {
                    this.$dispatch('chart-click', {
                        name: params.name,
                        value: params.value,
                        seriesName: params.seriesName,
                        dataIndex: params.dataIndex,
                        seriesIndex: params.seriesIndex,
                        data: params.data,
                    });
                });
            }

            this.chart.setOption(this.buildOption(), { notMerge: true });

            if (this.config.loading) {
                this.chart.showLoading('default', {
                    text: 'Carregando…',
                    color: cssVar(this.$el, '--primary'),
                    textColor: cssVar(this.$el, '--muted-foreground'),
                    maskColor: 'transparent',
                });
            } else {
                this.chart.hideLoading();
            }

            this.chart.resize();
        },

        update(partial = {}) {
            this.config = { ...this.config, ...partial };
            this.empty = isEmptySeries(this.config.series) && !this.config.options?.series;
            this.render();
        },

        setOption(option, notMerge = false) {
            if (!this.chart) {
                this.render();
            }

            this.chart?.setOption(option, { notMerge });
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
            const root = document.documentElement;

            this.themeObserver = new MutationObserver(() => this.render());
            this.themeObserver.observe(root, {
                attributes: true,
                attributeFilter: ['class', 'data-theme'],
            });
        },
    }));
});
