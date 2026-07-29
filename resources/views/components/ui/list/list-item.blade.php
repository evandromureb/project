@props([
    'as' => null,
    'href' => null,
    'active' => false,
    'disabled' => false,
    'color' => null,
    'colorVariant' => 'soft',
    'icon' => null,
    'iconColor' => null,
    'title' => null,
    'description' => null,
    'control' => null,
    'name' => null,
    'value' => null,
    'checked' => false,
    'id' => null,
    'type' => 'button',
])

@aware([
    'variant' => 'default',
    'horizontal' => false,
    'numbered' => false,
    'size' => 'md',
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if ($color !== null && ! in_array($color, $tokenColors, true)) {
        $color = null;
    }

    if (! in_array($colorVariant, ['soft', 'solid'], true)) {
        $colorVariant = 'soft';
    }

    if (! in_array($size, ['sm', 'md', 'lg'], true)) {
        $size = 'md';
    }

    if ($iconColor !== null && ! in_array($iconColor, $tokenColors, true)) {
        $iconColor = null;
    }

    $iconColor = $iconColor ?? $color ?? 'primary';

    if ($control !== null && ! in_array($control, ['checkbox', 'radio'], true)) {
        $control = null;
    }

    // Tag do item: href → <a>; as="button" → <button>; as explícito; senão <li>.
    // Em listas acionáveis o container deve ser tag="div" (padrão).
    $tag = match (true) {
        filled($as) && in_array($as, ['li', 'a', 'button', 'div'], true) => $as,
        filled($href) => 'a',
        default => 'li',
    };

    if ($tag === 'a' && ! filled($href)) {
        $href = '#';
    }

    $isActionable = in_array($tag, ['a', 'button'], true);

    $hasStartSlot = isset($start) && $start->isNotEmpty();
    $hasEndSlot = isset($end) && $end->isNotEmpty();
    $hasTitle = filled($title);
    $hasDescription = filled($description) || (isset($descriptionSlot) && $descriptionSlot->isNotEmpty());
    $hasCustomContent = $hasTitle || $hasDescription;
    $hasControl = filled($control);
    $hasIcon = filled($icon) && ! $hasStartSlot;

    $controlId = $id ?? ($hasControl && filled($name)
        ? 'list-'.$control.'-'.\Illuminate\Support\Str::slug($name.'-'.(string) ($value ?? $title ?? 'item'))
        : null);

    $paddingClasses = match ($size) {
        'sm' => 'px-3 py-2 text-xs',
        'lg' => 'px-5 py-3.5 text-base',
        default => 'px-4 py-2.5 text-sm',
    };

    /**
     * Classes de cor literais — o Tailwind não gera "bg-{$color}/10".
     *
     * @var array{soft: string, softActive: string, solid: string, solidActive: string, icon: string}|null
     */
    $palette = $color === null ? null : match ($color) {
        'primary' => [
            'soft' => 'border-primary/25 bg-primary/10 text-primary',
            'softActive' => 'border-primary bg-primary/20 text-primary',
            'solid' => 'border-primary bg-primary text-primary-foreground',
            'solidActive' => 'border-primary bg-primary text-primary-foreground ring-2 ring-primary/30',
            'icon' => 'text-primary',
        ],
        'secondary' => [
            'soft' => 'border-secondary/25 bg-secondary/10 text-secondary',
            'softActive' => 'border-secondary bg-secondary/20 text-secondary',
            'solid' => 'border-secondary bg-secondary text-secondary-foreground',
            'solidActive' => 'border-secondary bg-secondary text-secondary-foreground ring-2 ring-secondary/30',
            'icon' => 'text-secondary',
        ],
        'success' => [
            'soft' => 'border-success/25 bg-success/10 text-success',
            'softActive' => 'border-success bg-success/20 text-success',
            'solid' => 'border-success bg-success text-success-foreground',
            'solidActive' => 'border-success bg-success text-success-foreground ring-2 ring-success/30',
            'icon' => 'text-success',
        ],
        'warning' => [
            'soft' => 'border-warning/25 bg-warning/10 text-warning',
            'softActive' => 'border-warning bg-warning/20 text-warning',
            'solid' => 'border-warning bg-warning text-warning-foreground',
            'solidActive' => 'border-warning bg-warning text-warning-foreground ring-2 ring-warning/30',
            'icon' => 'text-warning',
        ],
        'danger' => [
            'soft' => 'border-danger/25 bg-danger/10 text-danger',
            'softActive' => 'border-danger bg-danger/20 text-danger',
            'solid' => 'border-danger bg-danger text-danger-foreground',
            'solidActive' => 'border-danger bg-danger text-danger-foreground ring-2 ring-danger/30',
            'icon' => 'text-danger',
        ],
        'info' => [
            'soft' => 'border-info/25 bg-info/10 text-info',
            'softActive' => 'border-info bg-info/20 text-info',
            'solid' => 'border-info bg-info text-info-foreground',
            'solidActive' => 'border-info bg-info text-info-foreground ring-2 ring-info/30',
            'icon' => 'text-info',
        ],
    };

    $neutralActive = 'z-[1] border-primary bg-primary text-primary-foreground';
    $neutralActionable = 'cursor-pointer transition-colors duration-150 hover:bg-muted/70 focus-visible:bg-muted/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30';

    $colorClasses = match (true) {
        $palette !== null && $colorVariant === 'solid' && $active => $palette['solidActive'],
        $palette !== null && $colorVariant === 'solid' => $palette['solid'],
        $palette !== null && $active => $palette['softActive'],
        $palette !== null => $palette['soft'],
        $active => $neutralActive,
        default => 'border-border bg-card text-foreground',
    };

    $actionableClasses = ($isActionable && ! $disabled && ! $active && $palette === null)
        ? $neutralActionable
        : '';

    $actionableColoredClasses = ($isActionable && ! $disabled && $palette !== null && $colorVariant === 'soft' && ! $active)
        ? 'cursor-pointer transition-colors duration-150 hover:brightness-95'
        : '';

    $disabledClasses = $disabled
        ? 'pointer-events-none cursor-not-allowed opacity-50'
        : '';

    $iconToneClasses = $active && $palette === null
        ? 'text-primary-foreground'
        : ($palette !== null && $colorVariant === 'solid'
            ? 'text-inherit'
            : match ($iconColor) {
                'secondary' => 'text-secondary',
                'success' => 'text-success',
                'warning' => 'text-warning',
                'danger' => 'text-danger',
                'info' => 'text-info',
                default => 'text-primary',
            });

    $itemClasses = implode(' ', array_filter([
        'relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0',
        $paddingClasses,
        $colorClasses,
        $actionableClasses,
        $actionableColoredClasses,
        $disabledClasses,
        $numbered ? 'gap-3' : '',
        $isActionable ? 'no-underline' : '',
        $tag === 'button' ? 'appearance-none' : '',
    ]));
@endphp

<{{ $tag }}
    data-list-item
    @if ($active) aria-current="true" @endif
    @if ($disabled) aria-disabled="true" @endif
    @if ($tag === 'a')
        href="{{ $href }}"
        @if ($disabled) tabindex="-1" @endif
    @endif
    @if ($tag === 'button')
        type="{{ $type }}"
        @if ($disabled) disabled @endif
    @endif
    {{ $attributes->class([$itemClasses]) }}
>
    @if ($numbered)
        <span
            data-list-number
            class="flex size-6 shrink-0 items-center justify-center rounded-full bg-muted text-[0.7rem] font-semibold text-muted-foreground {{ $active && $palette === null ? 'bg-primary-foreground/20 text-primary-foreground' : '' }} {{ $palette !== null && $colorVariant === 'solid' ? 'bg-white/20 text-inherit' : '' }}"
            aria-hidden="true"
        ></span>
    @endif

    @if ($hasControl)
        <input
            @if ($controlId) id="{{ $controlId }}" @endif
            type="{{ $control }}"
            @if (filled($name)) name="{{ $name }}" @endif
            @if (filled($value)) value="{{ $value }}" @endif
            @checked($checked)
            @disabled($disabled)
            class="size-4 shrink-0 rounded border-border text-primary focus-visible:ring-2 focus-visible:ring-primary/30 {{ $control === 'radio' ? 'rounded-full' : '' }}"
        />
    @endif

    @if ($hasStartSlot)
        <span class="flex shrink-0 items-center" data-list-start>
            {{ $start }}
        </span>
    @elseif ($hasIcon)
        <i class="bi {{ $icon }} shrink-0 text-[1.05em] leading-none {{ $iconToneClasses }}" aria-hidden="true"></i>
    @endif

    <span class="min-w-0 flex-1" data-list-body>
        @if ($hasCustomContent)
            @if ($hasTitle)
                @if ($hasControl && $controlId)
                    <label for="{{ $controlId }}" class="m-0 block cursor-pointer font-medium {{ $disabled ? 'cursor-not-allowed' : '' }}">
                        {{ $title }}
                    </label>
                @else
                    <span class="m-0 block font-medium">{{ $title }}</span>
                @endif
            @endif

            @if ($hasDescription)
                <span @class([
                    'mt-0.5 block text-[0.8125rem] leading-relaxed',
                    $active && $palette === null ? 'text-primary-foreground/80' : 'text-muted-foreground',
                    $palette !== null && $colorVariant === 'solid' ? 'text-inherit opacity-90' : '',
                    $size === 'sm' ? 'text-xs' : '',
                ])>
                    @isset($descriptionSlot)
                        {{ $descriptionSlot }}
                    @else
                        {{ $description }}
                    @endisset
                </span>
            @endif

            @if ($slot->isNotEmpty())
                <span class="mt-1 block">{{ $slot }}</span>
            @endif
        @elseif ($hasControl && $controlId && $slot->isNotEmpty())
            <label for="{{ $controlId }}" class="m-0 block cursor-pointer {{ $disabled ? 'cursor-not-allowed' : '' }}">
                {{ $slot }}
            </label>
        @else
            {{ $slot }}
        @endif
    </span>

    @if ($hasEndSlot)
        <span class="ms-auto flex shrink-0 items-center gap-2" data-list-end>
            {{ $end }}
        </span>
    @endif
</{{ $tag }}>
