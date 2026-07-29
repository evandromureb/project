@props([
    'value' => 0,
    'start' => 0,
    'duration' => 2000,
    'delay' => 0,
    'decimals' => 0,
    'decimal' => ',',
    'separator' => '.',
    'grouping' => true,
    'prefix' => '',
    'suffix' => '',
    'easing' => 'easeOutExpo',
    'trigger' => 'visible',
    'once' => true,
    'threshold' => 0.4,
    'locale' => null,
    'reducedMotion' => 'auto',
    'color' => 'foreground',
    'size' => 'md',
    'weight' => 'bold',
    'align' => 'start',
    'tag' => 'span',
    'label' => null,
    'caption' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'muted', 'foreground', 'current'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'foreground';
    }

    if (! in_array($size, ['xs', 'sm', 'md', 'lg', 'xl', '2xl', '3xl'], true)) {
        $size = 'md';
    }

    if (! in_array($weight, ['normal', 'medium', 'semibold', 'bold', 'extrabold'], true)) {
        $weight = 'bold';
    }

    if (! in_array($align, ['start', 'center', 'end'], true)) {
        $align = 'start';
    }

    $easings = ['linear', 'easeIn', 'easeOut', 'easeInOut', 'easeOutCubic', 'easeInExpo', 'easeOutExpo'];

    if (! in_array($easing, $easings, true)) {
        $easing = 'easeOutExpo';
    }

    if (! in_array($trigger, ['auto', 'visible', 'manual'], true)) {
        $trigger = 'visible';
    }

    if (! in_array($reducedMotion, ['auto', 'animate', 'reduce'], true)) {
        $reducedMotion = 'auto';
    }

    $allowedTags = ['span', 'div', 'p', 'strong', 'em', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];

    if (! in_array($tag, $allowedTags, true)) {
        $tag = 'span';
    }

    $start = (float) $start;
    $value = (float) $value;
    $duration = max(0, (int) $duration);
    $delay = max(0, (int) $delay);
    $decimals = max(0, min(20, (int) $decimals));
    $threshold = max(0, min(1, (float) $threshold));
    $grouping = (bool) $grouping;
    $once = (bool) $once;

    $colorClasses = match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        'muted' => 'text-muted-foreground',
        'current' => 'text-current',
        default => 'text-foreground',
    };

    $sizeClasses = match ($size) {
        'xs' => 'text-lg',
        'sm' => 'text-xl',
        'lg' => 'text-3xl',
        'xl' => 'text-4xl',
        '2xl' => 'text-5xl',
        '3xl' => 'text-6xl',
        default => 'text-2xl',
    };

    $weightClasses = match ($weight) {
        'normal' => 'font-normal',
        'medium' => 'font-medium',
        'semibold' => 'font-semibold',
        'extrabold' => 'font-extrabold',
        default => 'font-bold',
    };

    $alignClasses = match ($align) {
        'center' => 'text-center items-center',
        'end' => 'text-end items-end',
        default => 'text-start items-start',
    };

    $hasPrefixSlot = isset($prefixSlot) && $prefixSlot->isNotEmpty();
    $hasSuffixSlot = isset($suffixSlot) && $suffixSlot->isNotEmpty();
    $hasCaptionSlot = isset($captionSlot) && $captionSlot->isNotEmpty();
    $showCaption = $hasCaptionSlot || filled($caption);

    $stringPrefix = $hasPrefixSlot ? '' : (string) $prefix;
    $stringSuffix = $hasSuffixSlot ? '' : (string) $suffix;

    // Fallback SSR (antes do Alpine hidratar). Com `locale`, o JS assume o
    // format via Intl.NumberFormat; aqui espelhamos decimal/separator manuais.
    $absoluteStart = abs($start);
    $fixedStart = number_format($absoluteStart, $decimals, '.', '');
    [$intPart, $decPart] = array_pad(explode('.', $fixedStart, 2), 2, null);

    if ($grouping && (string) $separator !== '') {
        $intPart = preg_replace('/\B(?=(\d{3})+(?!\d))/', (string) $separator, (string) $intPart) ?? $intPart;
    }

    $initialNumber = $decimals > 0
        ? $intPart.$decimal.$decPart
        : $intPart;

    if ($start < 0) {
        $initialNumber = '-'.$initialNumber;
    }

    $initialDisplay = $stringPrefix.$initialNumber.$stringSuffix;

    $config = [
        'start' => $start,
        'end' => $value,
        'duration' => $duration,
        'delay' => $delay,
        'decimals' => $decimals,
        'decimal' => (string) $decimal,
        'separator' => (string) $separator,
        'grouping' => $grouping,
        // Prefix/suffix tipográficos entram no format JS só quando não há slot
        // rico — slots renderizam HTML ao redor do número animado.
        'prefix' => $stringPrefix,
        'suffix' => $stringSuffix,
        'easing' => $easing,
        'trigger' => $trigger,
        'once' => $once,
        'threshold' => $threshold,
        'locale' => filled($locale) ? (string) $locale : null,
        'reducedMotion' => $reducedMotion,
    ];

    $ariaLabel = $label;

    if ($ariaLabel === null && ! $hasCaptionSlot && filled($caption)) {
        $ariaLabel = (string) $caption;
    }
@endphp

{{--
    A lógica de animação vive em resources/js/countup.js (Alpine.data('countup')),
    não inline neste x-data — comparações e arrow functions direto no atributo
    quebram wire:navigate. Ver reference/countup.md na skill ui-components.
--}}
<div
    x-data="countup(@js($config))"
    {{
        $attributes->class([
            'ui-countup inline-flex flex-col gap-1',
            $alignClasses,
        ])
    }}
    @if ($ariaLabel) aria-label="{{ $ariaLabel }}" @endif
>
    <{{ $tag }}
        class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight {{ $sizeClasses }} {{ $weightClasses }} {{ $colorClasses }}"
        x-bind:aria-busy="busyLabel()"
        @if ($ariaLabel) aria-live="polite" @endif
    >
        @if ($hasPrefixSlot)
            <span class="ui-countup-prefix shrink-0 font-[inherit] text-[0.55em] opacity-80">{{ $prefixSlot }}</span>
        @endif

        <span class="ui-countup-number" x-text="display">{{ $initialDisplay }}</span>

        @if ($hasSuffixSlot)
            <span class="ui-countup-suffix shrink-0 font-[inherit] text-[0.55em] opacity-80">{{ $suffixSlot }}</span>
        @endif
    </{{ $tag }}>

    @if ($showCaption)
        <span class="ui-countup-caption text-sm font-normal text-muted-foreground">
            @if ($hasCaptionSlot)
                {{ $captionSlot }}
            @else
                {{ $caption }}
            @endif
        </span>
    @endif
</div>
