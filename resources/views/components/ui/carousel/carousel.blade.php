@props([
    'interval' => 5000,
    'controls' => true,
    'indicators' => true,
    'fade' => false,
    'dark' => false,
    'pauseOnHover' => true,
    'touch' => true,
    'loop' => true,
    'height' => 'h-80',
])

@php
    // "dark" inverte só a cor dos controles/indicadores (fica escura, para
    // usar sobre fotos claras) — não tem relação com o tema claro/escuro do
    // app, é sempre a mesma exceção de superfície fixa do <x-ui.tooltip dark>.
    $controlClasses = $dark
        ? 'bg-white/85 text-neutral-900 shadow-sm backdrop-blur-sm hover:bg-white'
        : 'bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60';

    $indicatorActiveClasses = $dark ? 'w-6 bg-neutral-900' : 'w-6 bg-white';
    $indicatorInactiveClasses = $dark ? 'w-1.5 bg-neutral-900/40 hover:bg-neutral-900/60' : 'w-1.5 bg-white/50 hover:bg-white/80';
    $indicatorBarClasses = $dark ? 'bg-white/50' : 'bg-black/25';
@endphp

<div
    x-data="carousel(@js($interval), @js($loop), @js($pauseOnHover))"
    @if ($pauseOnHover)
        @mouseenter="paused = true"
        @mouseleave="paused = false"
    @endif
    @keydown.left.prevent="prev()"
    @keydown.right.prevent="next()"
    tabindex="0"
    role="region"
    aria-roledescription="carousel"
    aria-live="polite"
    {{ $attributes->class(['group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2', $height]) }}
>
    <div
        x-ref="track"
        @if ($touch)
            @touchstart.passive="onTouchStart($event)"
            @touchend.passive="onTouchEnd($event)"
        @endif
        class="relative size-full"
    >
        {{ $slot }}
    </div>

    @if ($controls)
        <button
            type="button"
            @click="prev()"
            class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 {{ $controlClasses }}"
            aria-label="Slide anterior"
        >
            <i class="bi bi-chevron-left text-base leading-none" aria-hidden="true"></i>
        </button>

        <button
            type="button"
            @click="next()"
            class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 {{ $controlClasses }}"
            aria-label="Próximo slide"
        >
            <i class="bi bi-chevron-right text-base leading-none" aria-hidden="true"></i>
        </button>
    @endif

    @if ($indicators)
        <div class="absolute bottom-3 left-1/2 z-10 flex -translate-x-1/2 items-center gap-1.5 rounded-full px-2 py-1.5 backdrop-blur-sm {{ $indicatorBarClasses }}" role="tablist">
            <template x-for="index in slides" :key="index">
                <button
                    type="button"
                    role="tab"
                    @click="goTo(index)"
                    x-bind:class="active === index ? '{{ $indicatorActiveClasses }}' : '{{ $indicatorInactiveClasses }}'"
                    x-bind:aria-selected="active === index ? 'true' : 'false'"
                    x-bind:aria-label="'Ir para o slide ' + (index + 1)"
                    class="h-1.5 rounded-full transition-all duration-300"
                ></button>
            </template>
        </div>
    @endif
</div>
