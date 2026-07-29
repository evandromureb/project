// <x-ui.map> — Alpine.data nomeado (não x-data inline). Comparações e arrows
// quebrariam wire:navigate num atributo inline. Ver reference/dropdown.md (#4).
// Motor: Leaflet (https://leafletjs.com/), carregado sob demanda.
// Tiles: OpenStreetMap, Carto, OpenTopoMap; OpenMapTiles via tilesUrl custom.
// Overlay SVG: Free Vector Maps (ou qualquer SVG/PNG georreferenciado).

let leafletPromise = null;

function loadLeaflet() {
    if (!leafletPromise) {
        leafletPromise = Promise.all([
            import('leaflet'),
            import('leaflet/dist/leaflet.css'),
            import('leaflet/dist/images/marker-icon-2x.png'),
            import('leaflet/dist/images/marker-icon.png'),
            import('leaflet/dist/images/marker-shadow.png'),
        ]).then(([mod, , icon2x, icon, shadow]) => {
            const L = mod.default ?? mod;

            // Vite reescreve asset URLs — o default do Leaflet quebra com bundlers.
            delete L.Icon.Default.prototype._getIconUrl;
            L.Icon.Default.mergeOptions({
                iconRetinaUrl: icon2x.default ?? icon2x,
                iconUrl: icon.default ?? icon,
                shadowUrl: shadow.default ?? shadow,
            });

            return L;
        });
    }

    return leafletPromise;
}

const TOKEN_COLORS = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

function cssVar(el, name, fallback = '') {
    const value = getComputedStyle(el).getPropertyValue(name).trim();

    return value || fallback;
}

function resolveColor(el, color, fallback = '#3388ff') {
    if (!color) {
        return fallback;
    }

    if (typeof color !== 'string') {
        return color;
    }

    if (TOKEN_COLORS.includes(color)) {
        return cssVar(el, `--${color}`, fallback);
    }

    return color;
}

/**
 * Presets de tiles raster compatíveis com Leaflet.
 * OpenMapTiles (vetorial self-host) entra via `tilesUrl` / preset `openmaptiles`.
 */
function tilePresets(tilesUrl = null, tilesAttribution = null) {
    return {
        osm: {
            name: 'OpenStreetMap',
            url: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a>',
            maxZoom: 19,
        },
        'osm-hot': {
            name: 'OSM Humanitarian',
            url: 'https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png',
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a> contributors, Tiles style by Humanitarian OpenStreetMap Team',
            maxZoom: 19,
            subdomains: 'abc',
        },
        opentopomap: {
            name: 'OpenTopoMap',
            url: 'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',
            attribution:
                'Map data: &copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a>, <a href="https://opentopomap.org" target="_blank" rel="noopener">OpenTopoMap</a> (CC-BY-SA)',
            maxZoom: 17,
            subdomains: 'abc',
        },
        'carto-voyager': {
            name: 'Carto Voyager',
            url: 'https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png',
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a> &copy; <a href="https://carto.com/attributions" target="_blank" rel="noopener">CARTO</a>',
            maxZoom: 20,
            subdomains: 'abcd',
        },
        'carto-positron': {
            name: 'Carto Positron',
            url: 'https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png',
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a> &copy; <a href="https://carto.com/attributions" target="_blank" rel="noopener">CARTO</a>',
            maxZoom: 20,
            subdomains: 'abcd',
        },
        'carto-dark': {
            name: 'Carto Dark Matter',
            url: 'https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png',
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a> &copy; <a href="https://carto.com/attributions" target="_blank" rel="noopener">CARTO</a>',
            maxZoom: 20,
            subdomains: 'abcd',
        },
        openmaptiles: {
            name: 'OpenMapTiles',
            // Self-host / MapTiler / OpenFreeMap raster proxy — passe tilesUrl.
            url: tilesUrl || 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
            attribution:
                tilesAttribution ||
                '&copy; <a href="https://openmaptiles.org/" target="_blank" rel="noopener">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a>',
            maxZoom: 22,
        },
        custom: {
            name: 'Custom',
            url: tilesUrl || 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
            attribution:
                tilesAttribution ||
                '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a>',
            maxZoom: 22,
        },
    };
}

function normalizeLatLng(value) {
    if (Array.isArray(value) && value.length >= 2) {
        return [Number(value[0]), Number(value[1])];
    }

    if (value && typeof value === 'object' && 'lat' in value && ('lng' in value || 'lon' in value)) {
        return [Number(value.lat), Number(value.lng ?? value.lon)];
    }

    return null;
}

function pathOptions(el, style = {}) {
    return {
        color: resolveColor(el, style.color, '#3388ff'),
        fillColor: resolveColor(el, style.fillColor ?? style.color, '#3388ff'),
        fillOpacity: style.fillOpacity ?? 0.2,
        weight: style.weight ?? 3,
        opacity: style.opacity ?? 1,
        dashArray: style.dashArray ?? null,
    };
}

document.addEventListener('alpine:init', () => {
    Alpine.data('map', (config) => ({
        config,
        L: null,
        map: null,
        baseLayers: {},
        overlays: {},
        markerLayer: null,
        featureLayer: null,
        overlayLayer: null,
        layerControl: null,
        scaleControl: null,
        ready: false,
        error: null,
        resizeObserver: null,

        async init() {
            try {
                this.L = await loadLeaflet();
                await this.$nextTick();
                this.createMap();
                this.ready = true;
                this.$dispatch('map-ready', { map: this.map, L: this.L });
            } catch (error) {
                this.error = error?.message || 'Falha ao carregar o mapa';
                console.error('[x-ui.map]', error);
            }

            this.resizeObserver = new ResizeObserver(() => this.invalidateSize());
            this.resizeObserver.observe(this.$el);

            this.$watch(
                () => JSON.stringify(this.config),
                () => {
                    if (this.ready) {
                        this.syncFromConfig();
                    }
                },
            );
        },

        destroy() {
            this.resizeObserver?.disconnect();
            this.map?.remove();
            this.map = null;
        },

        createMap() {
            const L = this.L;
            const el = this.$refs.canvas;

            if (!el || this.map) {
                return;
            }

            const center = [Number(this.config.lat ?? -15.13), Number(this.config.lng ?? -53.19)];
            const zoom = Number(this.config.zoom ?? 4);

            this.map = L.map(el, {
                center,
                zoom,
                minZoom: this.config.minZoom ?? 1,
                maxZoom: this.config.maxZoom ?? 19,
                zoomControl: this.config.zoomControl !== false,
                scrollWheelZoom: this.config.scrollWheelZoom !== false,
                dragging: this.config.dragging !== false,
                doubleClickZoom: this.config.doubleClickZoom !== false,
                attributionControl: this.config.attribution !== false,
                keyboard: this.config.keyboard !== false,
            });

            this.markerLayer = L.layerGroup().addTo(this.map);
            this.featureLayer = L.layerGroup().addTo(this.map);

            this.buildBaseLayers();
            this.applyTiles();
            this.renderMarkers();
            this.renderShapes();
            this.renderGeoJson();
            this.renderOverlay();
            this.applyBounds();
            this.applyControls();
            this.bindMapEvents();

            // Leaflet precisa invalidar tamanho quando o container muda (tabs, docs, etc.).
            requestAnimationFrame(() => this.invalidateSize());
        },

        buildBaseLayers() {
            const L = this.L;
            const presets = tilePresets(this.config.tilesUrl, this.config.tilesAttribution);
            const keys = Array.isArray(this.config.layers) && this.config.layers.length > 0
                ? this.config.layers
                : [this.config.tiles || 'osm'];

            this.baseLayers = {};

            keys.forEach((key) => {
                const preset = presets[key] || presets.osm;
                const options = {
                    attribution: preset.attribution,
                    maxZoom: preset.maxZoom ?? 19,
                };

                if (preset.subdomains) {
                    options.subdomains = preset.subdomains;
                }

                this.baseLayers[preset.name] = L.tileLayer(preset.url, options);
            });
        },

        applyTiles() {
            const presets = tilePresets(this.config.tilesUrl, this.config.tilesAttribution);
            const key = this.config.tiles || 'osm';
            const preset = presets[key] || presets.osm;
            const active = this.baseLayers[preset.name] || Object.values(this.baseLayers)[0];

            Object.values(this.baseLayers).forEach((layer) => {
                if (this.map.hasLayer(layer)) {
                    this.map.removeLayer(layer);
                }
            });

            if (active) {
                active.addTo(this.map);
            }
        },

        applyControls() {
            const L = this.L;

            if (this.layerControl) {
                this.map.removeControl(this.layerControl);
                this.layerControl = null;
            }

            if (this.scaleControl) {
                this.map.removeControl(this.scaleControl);
                this.scaleControl = null;
            }

            if (this.config.layerControl && Object.keys(this.baseLayers).length > 1) {
                this.layerControl = L.control
                    .layers(this.baseLayers, this.overlays, { collapsed: true })
                    .addTo(this.map);
            }

            if (this.config.scale) {
                this.scaleControl = L.control
                    .scale({ imperial: false, metric: true })
                    .addTo(this.map);
            }
        },

        bindMapEvents() {
            this.map.on('click', (event) => {
                this.$dispatch('map-click', {
                    lat: event.latlng.lat,
                    lng: event.latlng.lng,
                });
            });

            this.map.on('moveend', () => {
                const center = this.map.getCenter();
                this.$dispatch('map-move', {
                    lat: center.lat,
                    lng: center.lng,
                    zoom: this.map.getZoom(),
                });
            });

            this.map.on('zoomend', () => {
                this.$dispatch('map-zoom', { zoom: this.map.getZoom() });
            });
        },

        renderMarkers() {
            const L = this.L;
            this.markerLayer.clearLayers();

            const markers = Array.isArray(this.config.markers) ? this.config.markers : [];

            markers.forEach((marker, index) => {
                const point =
                    normalizeLatLng(marker) ||
                    normalizeLatLng([marker.lat, marker.lng ?? marker.lon]);

                if (!point) {
                    return;
                }

                const options = {
                    draggable: Boolean(marker.draggable),
                    title: marker.title || '',
                    opacity: marker.opacity ?? 1,
                };

                let layer;

                if (marker.iconHtml || marker.color) {
                    const color = resolveColor(this.$el, marker.color, '#ef4444');
                    const html =
                        marker.iconHtml ||
                        `<span class="ui-map-marker-pin" style="--ui-map-pin:${color}"><i class="${marker.icon || 'bi bi-geo-alt-fill'}"></i></span>`;

                    options.icon = L.divIcon({
                        className: 'ui-map-div-icon',
                        html,
                        iconSize: marker.iconSize || [28, 28],
                        iconAnchor: marker.iconAnchor || [14, 28],
                        popupAnchor: marker.popupAnchor || [0, -24],
                    });
                }

                layer = L.marker(point, options);

                if (marker.popup) {
                    layer.bindPopup(marker.popup, {
                        maxWidth: marker.popupMaxWidth || 280,
                    });

                    if (marker.openPopup) {
                        layer.on('add', () => layer.openPopup());
                    }
                }

                if (marker.tooltip) {
                    layer.bindTooltip(marker.tooltip, {
                        permanent: Boolean(marker.tooltipPermanent),
                        direction: marker.tooltipDirection || 'top',
                    });
                }

                layer.on('click', () => {
                    this.$dispatch('map-marker-click', { marker, index, lat: point[0], lng: point[1] });
                });

                if (marker.draggable) {
                    layer.on('dragend', (event) => {
                        const pos = event.target.getLatLng();
                        this.$dispatch('map-marker-drag', {
                            marker,
                            index,
                            lat: pos.lat,
                            lng: pos.lng,
                        });
                    });
                }

                layer.addTo(this.markerLayer);
            });
        },

        renderShapes() {
            const L = this.L;
            this.featureLayer.clearLayers();

            (this.config.circles || []).forEach((circle) => {
                const center = normalizeLatLng(circle.center || [circle.lat, circle.lng]);

                if (!center || circle.radius == null) {
                    return;
                }

                const layer = L.circle(center, {
                    radius: Number(circle.radius),
                    ...pathOptions(this.$el, circle),
                });

                if (circle.popup) {
                    layer.bindPopup(circle.popup);
                }

                layer.addTo(this.featureLayer);
            });

            (this.config.polylines || []).forEach((line) => {
                const latlngs = (line.latlngs || line.points || [])
                    .map((p) => normalizeLatLng(p))
                    .filter(Boolean);

                if (latlngs.length < 2) {
                    return;
                }

                const layer = L.polyline(latlngs, pathOptions(this.$el, line));

                if (line.popup) {
                    layer.bindPopup(line.popup);
                }

                layer.addTo(this.featureLayer);
            });

            (this.config.polygons || []).forEach((poly) => {
                const latlngs = (poly.latlngs || poly.points || [])
                    .map((p) => normalizeLatLng(p))
                    .filter(Boolean);

                if (latlngs.length < 3) {
                    return;
                }

                const layer = L.polygon(latlngs, pathOptions(this.$el, poly));

                if (poly.popup) {
                    layer.bindPopup(poly.popup);
                }

                layer.addTo(this.featureLayer);
            });

            (this.config.rectangles || []).forEach((rect) => {
                const bounds = rect.bounds;

                if (!Array.isArray(bounds) || bounds.length < 2) {
                    return;
                }

                const layer = L.rectangle(bounds, pathOptions(this.$el, rect));

                if (rect.popup) {
                    layer.bindPopup(rect.popup);
                }

                layer.addTo(this.featureLayer);
            });
        },

        renderGeoJson() {
            const L = this.L;
            const data = this.config.geojson;

            if (!data) {
                return;
            }

            const layer = L.geoJSON(data, {
                style: (feature) =>
                    pathOptions(this.$el, {
                        color: feature?.properties?.color,
                        fillColor: feature?.properties?.fillColor,
                        fillOpacity: feature?.properties?.fillOpacity,
                        weight: feature?.properties?.weight,
                        ...this.config.geojsonStyle,
                    }),
                pointToLayer: (feature, latlng) => {
                    const color = resolveColor(
                        this.$el,
                        feature?.properties?.color,
                        '#ef4444',
                    );

                    return L.circleMarker(latlng, {
                        radius: feature?.properties?.radius ?? 8,
                        color,
                        fillColor: color,
                        fillOpacity: 0.8,
                        weight: 2,
                    });
                },
                onEachFeature: (feature, layer) => {
                    const props = feature?.properties || {};
                    const popup = props.popup || props.name || props.title;

                    if (popup) {
                        layer.bindPopup(String(popup));
                    }
                },
            });

            layer.addTo(this.featureLayer);

            if (this.config.fitGeojson) {
                const bounds = layer.getBounds();

                if (bounds.isValid()) {
                    this.map.fitBounds(bounds, { padding: [24, 24] });
                }
            }
        },

        renderOverlay() {
            const L = this.L;

            if (this.overlayLayer) {
                this.map.removeLayer(this.overlayLayer);
                this.overlayLayer = null;
            }

            const overlay = this.config.overlay;

            if (!overlay?.url || !overlay?.bounds) {
                return;
            }

            const options = {
                opacity: overlay.opacity ?? 0.85,
                interactive: Boolean(overlay.interactive),
                zIndex: overlay.zIndex ?? 200,
                className: 'ui-map-vector-overlay',
            };

            this.overlayLayer = L.imageOverlay(overlay.url, overlay.bounds, options).addTo(this.map);

            if (overlay.fit !== false) {
                this.map.fitBounds(overlay.bounds, { padding: [16, 16] });
            }
        },

        applyBounds() {
            if (!this.config.bounds || !Array.isArray(this.config.bounds)) {
                return;
            }

            try {
                this.map.fitBounds(this.config.bounds, {
                    padding: this.config.boundsPadding || [24, 24],
                    maxZoom: this.config.boundsMaxZoom || 14,
                });
            } catch {
                // bounds inválidos — ignora
            }
        },

        syncFromConfig() {
            if (!this.map) {
                return;
            }

            this.buildBaseLayers();
            this.applyTiles();
            this.renderMarkers();
            this.renderShapes();
            this.renderGeoJson();
            this.renderOverlay();
            this.applyControls();

            if (!this.config.bounds && !this.config.overlay && !this.config.fitGeojson) {
                this.map.setView(
                    [Number(this.config.lat ?? -15.13), Number(this.config.lng ?? -53.19)],
                    Number(this.config.zoom ?? 4),
                );
            }
        },

        invalidateSize() {
            this.map?.invalidateSize({ animate: false });
        },

        setView(lat, lng, zoom = null) {
            this.map?.setView([lat, lng], zoom ?? this.map.getZoom());
        },

        flyTo(lat, lng, zoom = null) {
            this.map?.flyTo([lat, lng], zoom ?? this.map.getZoom());
        },

        fitBounds(bounds, options = {}) {
            this.map?.fitBounds(bounds, options);
        },

        getCenter() {
            const center = this.map?.getCenter();

            return center ? { lat: center.lat, lng: center.lng } : null;
        },

        getZoom() {
            return this.map?.getZoom() ?? null;
        },
    }));
});
