// Helpers compartilhados pelos wrappers de chart (ECharts, Apex, Chart.js, D3).

export const TOKEN_COLORS = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

export function cssVar(el, name, fallback = '') {
    const value = getComputedStyle(el).getPropertyValue(name).trim();

    return value || fallback;
}

export function resolveColor(el, color) {
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

export function themePalette(el, colors = null) {
    if (Array.isArray(colors) && colors.length > 0) {
        return colors.map((color) => resolveColor(el, color) ?? color);
    }

    return TOKEN_COLORS.map((token) => cssVar(el, `--${token}`));
}

export function isEmptySeries(series) {
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

export function deepMerge(target, source) {
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

export function normalizeNamedSeries(series) {
    if (!Array.isArray(series)) {
        return [];
    }

    if (series.every((item) => typeof item === 'number' || item == null)) {
        return [{ name: 'Series', data: series }];
    }

    return series.map((item, index) => {
        if (typeof item === 'number' || item == null) {
            return { name: `Series ${index + 1}`, data: [item] };
        }

        return {
            name: item.name ?? `Series ${index + 1}`,
            data: item.data ?? [],
            type: item.type,
        };
    });
}

export function normalizePieData(series) {
    let data = series;

    if (Array.isArray(series) && series.length === 1 && Array.isArray(series[0]?.data)) {
        data = series[0].data;
    }

    if (!Array.isArray(data)) {
        return [];
    }

    return data.map((item, index) => {
        if (typeof item === 'number') {
            return { name: `Item ${index + 1}`, value: item };
        }

        return {
            name: item.name ?? `Item ${index + 1}`,
            value: item.value ?? 0,
        };
    });
}
