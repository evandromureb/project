// <x-ui.chart-d3> — Alpine.data nomeado. Motor: D3 (https://d3js.org/).
import {
    cssVar,
    isEmptySeries,
    normalizeNamedSeries,
    normalizePieData,
    themePalette,
} from './chart-theme';

let d3Promise = null;

function loadD3() {
    if (!d3Promise) {
        d3Promise = import('d3');
    }

    return d3Promise;
}

function clearNode(node) {
    while (node.firstChild) {
        node.removeChild(node.firstChild);
    }
}

function drawChart(d3, el, canvas, config) {
    clearNode(canvas);

    const type = config.type ?? 'bar';
    const width = canvas.clientWidth || el.clientWidth || 640;
    const height = canvas.clientHeight || 320;
    const palette = themePalette(el, config.colors);
    const muted = cssVar(el, '--muted-foreground', '#64748b');
    const foreground = cssVar(el, '--foreground', '#1e293b');
    const border = cssVar(el, '--border', '#e9ebec');
    const categories = config.categories ?? config.labels ?? [];
    const margin = { top: config.title ? 36 : 16, right: 16, bottom: 36, left: 44 };
    const innerWidth = Math.max(10, width - margin.left - margin.right);
    const innerHeight = Math.max(10, height - margin.top - margin.bottom);

    const svg = d3
        .select(canvas)
        .append('svg')
        .attr('width', width)
        .attr('height', height)
        .attr('viewBox', `0 0 ${width} ${height}`)
        .attr('role', 'img');

    if (config.title) {
        svg.append('text')
            .attr('x', margin.left)
            .attr('y', 18)
            .attr('fill', foreground)
            .attr('font-size', 14)
            .attr('font-weight', 600)
            .text(config.title);
    }

    const root = svg.append('g').attr('transform', `translate(${margin.left},${margin.top})`);

    const dispatchClick = (payload) => {
        el.dispatchEvent(new CustomEvent('chart-click', { detail: payload, bubbles: true }));
    };

    if (type === 'pie' || type === 'donut') {
        const pieData = normalizePieData(config.series);
        const radius = Math.min(innerWidth, innerHeight) / 2;
        const g = root.append('g').attr('transform', `translate(${innerWidth / 2},${innerHeight / 2})`);
        const pie = d3.pie().value((d) => d.value).sort(null);
        const arc = d3
            .arc()
            .innerRadius(type === 'donut' ? radius * 0.55 : 0)
            .outerRadius(radius * 0.9);

        g.selectAll('path')
            .data(pie(pieData))
            .join('path')
            .attr('d', arc)
            .attr('fill', (_d, i) => palette[i % palette.length])
            .attr('stroke', cssVar(el, '--card', '#fff'))
            .attr('stroke-width', 2)
            .style('cursor', 'pointer')
            .on('click', (_event, d) => dispatchClick({ name: d.data.name, value: d.data.value }));

        if (config.showLabel || config.legend !== false) {
            const legend = svg.append('g').attr('transform', `translate(${width - 120}, ${margin.top})`);

            pieData.forEach((item, index) => {
                const row = legend.append('g').attr('transform', `translate(0, ${index * 18})`);
                row.append('rect').attr('width', 10).attr('height', 10).attr('rx', 2).attr('fill', palette[index % palette.length]);
                row.append('text').attr('x', 16).attr('y', 9).attr('fill', muted).attr('font-size', 12).text(item.name);
            });
        }

        return;
    }

    const series = normalizeNamedSeries(config.series);
    const xDomain = categories.length > 0 ? categories : series[0]?.data?.map((_v, i) => String(i + 1)) ?? [];
    const flatValues = series.flatMap((s) => s.data.map((v) => (typeof v === 'number' ? v : 0)));
    const yMax = Math.max(1, d3.max(flatValues) ?? 1);

    const x = d3.scaleBand().domain(xDomain).range([0, innerWidth]).padding(0.2);
    const y = d3.scaleLinear().domain([0, yMax * 1.1]).nice().range([innerHeight, 0]);

    root.append('g')
        .attr('transform', `translate(0,${innerHeight})`)
        .call(d3.axisBottom(x).tickSizeOuter(0))
        .call((g) => g.selectAll('text').attr('fill', muted))
        .call((g) => g.selectAll('line,path').attr('stroke', border));

    root.append('g')
        .call(d3.axisLeft(y).ticks(5))
        .call((g) => g.selectAll('text').attr('fill', muted))
        .call((g) => g.selectAll('line,path').attr('stroke', border));

    root.append('g')
        .attr('stroke', border)
        .attr('stroke-dasharray', '4 4')
        .call(d3.axisLeft(y).tickSize(-innerWidth).tickFormat('').ticks(5))
        .call((g) => g.select('.domain').remove());

    if (type === 'bar' || type === 'horizontal-bar') {
        if (type === 'horizontal-bar') {
            clearNode(canvas);
            const hx = d3.scaleLinear().domain([0, yMax * 1.1]).nice().range([0, innerWidth]);
            const hy = d3.scaleBand().domain(xDomain).range([0, innerHeight]).padding(0.2);
            const hSvg = d3.select(canvas).append('svg').attr('width', width).attr('height', height);
            if (config.title) {
                hSvg.append('text').attr('x', margin.left).attr('y', 18).attr('fill', foreground).attr('font-size', 14).attr('font-weight', 600).text(config.title);
            }
            const hRoot = hSvg.append('g').attr('transform', `translate(${margin.left},${margin.top})`);
            hRoot.append('g').attr('transform', `translate(0,${innerHeight})`).call(d3.axisBottom(hx).ticks(5)).call((g) => g.selectAll('text').attr('fill', muted)).call((g) => g.selectAll('line,path').attr('stroke', border));
            hRoot.append('g').call(d3.axisLeft(hy)).call((g) => g.selectAll('text').attr('fill', muted)).call((g) => g.selectAll('line,path').attr('stroke', border));
            const data = series[0]?.data ?? [];
            hRoot.selectAll('rect')
                .data(xDomain)
                .join('rect')
                .attr('y', (d) => hy(d))
                .attr('x', 0)
                .attr('height', hy.bandwidth())
                .attr('width', (_d, i) => hx(data[i] ?? 0))
                .attr('fill', palette[0])
                .attr('rx', 4)
                .style('cursor', 'pointer')
                .on('click', (_event, d) => {
                    const i = xDomain.indexOf(d);
                    dispatchClick({ name: d, value: data[i], dataIndex: i });
                });

            return;
        }

        const group = d3.scaleBand().domain(series.map((s) => s.name)).range([0, x.bandwidth()]).padding(0.08);

        series.forEach((s, seriesIndex) => {
            root.selectAll(`rect.series-${seriesIndex}`)
                .data(xDomain)
                .join('rect')
                .attr('class', `series-${seriesIndex}`)
                .attr('x', (d) => x(d) + group(s.name))
                .attr('y', (_d, i) => y(s.data[i] ?? 0))
                .attr('width', group.bandwidth())
                .attr('height', (_d, i) => innerHeight - y(s.data[i] ?? 0))
                .attr('fill', palette[seriesIndex % palette.length])
                .attr('rx', 3)
                .style('cursor', 'pointer')
                .on('click', (_event, d) => {
                    const i = xDomain.indexOf(d);
                    dispatchClick({ name: d, value: s.data[i], seriesName: s.name, dataIndex: i });
                });
        });

        return;
    }

    const line = d3
        .line()
        .x((_d, i) => (x(xDomain[i]) ?? 0) + x.bandwidth() / 2)
        .y((d) => y(d ?? 0))
        .curve(config.smooth ? d3.curveMonotoneX : d3.curveLinear);

    series.forEach((s, seriesIndex) => {
        const color = palette[seriesIndex % palette.length];

        if (type === 'area') {
            const area = d3
                .area()
                .x((_d, i) => (x(xDomain[i]) ?? 0) + x.bandwidth() / 2)
                .y0(innerHeight)
                .y1((d) => y(d ?? 0))
                .curve(config.smooth ? d3.curveMonotoneX : d3.curveLinear);

            root.append('path')
                .datum(s.data)
                .attr('fill', color)
                .attr('opacity', 0.25)
                .attr('d', area);
        }

        root.append('path')
            .datum(s.data)
            .attr('fill', 'none')
            .attr('stroke', color)
            .attr('stroke-width', 2)
            .attr('d', line);

        root.selectAll(`circle.series-${seriesIndex}`)
            .data(s.data)
            .join('circle')
            .attr('class', `series-${seriesIndex}`)
            .attr('cx', (_d, i) => (x(xDomain[i]) ?? 0) + x.bandwidth() / 2)
            .attr('cy', (d) => y(d ?? 0))
            .attr('r', 3.5)
            .attr('fill', color)
            .style('cursor', 'pointer')
            .on('click', (_event, d) => dispatchClick({ value: d, seriesName: s.name }));
    });
}

document.addEventListener('alpine:init', () => {
    Alpine.data('chartD3', (config) => ({
        config: config ?? {},
        empty: isEmptySeries(config?.series),
        themeObserver: null,
        resizeObserver: null,
        d3: null,

        init() {
            this.$nextTick(() => {
                this.render();
                this.watchTheme();
                this.watchResize();
            });

            this.$watch(
                () => JSON.stringify(this.config),
                () => {
                    this.empty = isEmptySeries(this.config.series);
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

            if (this.$refs.canvas) {
                clearNode(this.$refs.canvas);
            }
        },

        async render() {
            const canvas = this.$refs.canvas;

            if (!canvas) {
                return;
            }

            if (this.empty) {
                clearNode(canvas);

                return;
            }

            this.d3 = this.d3 ?? (await loadD3());

            if (!this.$el.isConnected) {
                return;
            }

            drawChart(this.d3, this.$el, canvas, this.config);
        },

        update(partial = {}) {
            this.config = { ...this.config, ...partial };
            this.empty = isEmptySeries(this.config.series);
            this.render();
        },

        resize() {
            this.render();
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
