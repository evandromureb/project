@props([
    'type' => 'rect',
    'animation' => 'pulse',
    'size' => 'md',
    'rounded' => null,
    'lines' => 3,
    'rows' => 3,
    'columns' => 4,
    'width' => null,
    'height' => null,
    'label' => 'Carregando…',
])

@php
    $types = [
        'rect', 'text', 'circle', 'avatar', 'button', 'input', 'heading', 'image',
        'paragraph', 'card', 'list-item', 'media', 'table',
    ];

    if (! in_array($type, $types, true)) {
        $type = 'rect';
    }

    if (! in_array($animation, ['pulse', 'shimmer', 'none'], true)) {
        $animation = 'pulse';
    }

    if (! in_array($size, ['xs', 'sm', 'md', 'lg', 'xl'], true)) {
        $size = 'md';
    }

    $lines = max(1, (int) $lines);
    $rows = max(1, (int) $rows);
    $columns = max(1, min(8, (int) $columns));

    $composites = ['paragraph', 'card', 'list-item', 'media', 'table'];
    $isComposite = in_array($type, $composites, true);

    $resolvedRounded = $rounded ?? match ($type) {
        'circle', 'avatar' => 'full',
        'button' => 'md',
        'input' => 'md',
        'image', 'card' => 'md',
        'text', 'heading', 'paragraph' => 'sm',
        default => 'md',
    };

    if (! in_array($resolvedRounded, ['none', 'sm', 'md', 'lg', 'full'], true)) {
        $resolvedRounded = 'md';
    }

    $roundedClasses = match ($resolvedRounded) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };

    $animationClasses = match ($animation) {
        'shimmer' => 'ui-skeleton-shimmer',
        'none' => '',
        default => 'animate-pulse',
    };

    $boneBase = trim("ui-skeleton block bg-muted {$roundedClasses} {$animationClasses}");

    $widthClasses = match ($width) {
        'full' => 'w-full',
        '3/4', '75' => 'w-3/4',
        '2/3', '66' => 'w-2/3',
        '1/2', '50' => 'w-1/2',
        '1/3', '33' => 'w-1/3',
        '1/4', '25' => 'w-1/4',
        'auto' => 'w-auto',
        default => null,
    };

    // Frações (% do pai) precisam de um wrapper `w-full` — senão o pai
    // shrink-to-fit e a % resolve para 0 (barras invisíveis).
    $needsWidthWrapper = $widthClasses !== null
        && $widthClasses !== 'w-full'
        && $widthClasses !== 'w-auto'
        && in_array($type, ['text', 'heading', 'rect', 'image', 'input'], true);

    // Defaults de dimensão por tipo/tamanho — literais para o scanner.
    $avatarSizeClasses = match ($size) {
        'xs' => 'size-6',
        'sm' => 'size-8',
        'lg' => 'size-12',
        'xl' => 'size-16',
        default => 'size-10',
    };

    $textHeightClasses = match ($size) {
        'xs' => 'h-2.5',
        'sm' => 'h-3',
        'lg' => 'h-4',
        'xl' => 'h-5',
        default => 'h-3.5',
    };

    $headingHeightClasses = match ($size) {
        'xs' => 'h-4',
        'sm' => 'h-5',
        'lg' => 'h-7',
        'xl' => 'h-8',
        default => 'h-6',
    };

    $buttonClasses = match ($size) {
        'xs' => 'h-7 w-16',
        'sm' => 'h-8 w-20',
        'lg' => 'h-11 w-28',
        'xl' => 'h-12 w-32',
        default => 'h-9 w-24',
    };

    $inputHeightClasses = match ($size) {
        'xs' => 'h-7',
        'sm' => 'h-8',
        'lg' => 'h-11',
        'xl' => 'h-12',
        default => 'h-9',
    };

    $imageHeightClasses = match ($height ?? $size) {
        'xs', 'sm' => 'h-24',
        'lg' => 'h-48',
        'xl' => 'h-64',
        default => 'h-36',
    };

    $rectHeightClasses = match ($height ?? $size) {
        'xs' => 'h-3',
        'sm' => 'h-4',
        'lg' => 'h-8',
        'xl' => 'h-12',
        default => 'h-6',
    };

    $lineWidths = ['w-full', 'w-11/12', 'w-4/5', 'w-3/4', 'w-2/3', 'w-5/6'];

    $boneClasses = match ($type) {
        'circle', 'avatar' => trim("{$boneBase} shrink-0 {$avatarSizeClasses}"),
        'text' => trim("{$boneBase} {$textHeightClasses} ".($widthClasses ?? 'w-full')),
        'heading' => trim("{$boneBase} {$headingHeightClasses} ".($widthClasses ?? 'w-2/3')),
        'button' => trim("{$boneBase} shrink-0 {$buttonClasses}"),
        'input' => trim("{$boneBase} w-full {$inputHeightClasses}"),
        'image' => trim("{$boneBase} w-full {$imageHeightClasses}"),
        'rect' => trim("{$boneBase} ".($widthClasses ?? 'w-full')." {$rectHeightClasses}"),
        default => $boneBase,
    };
@endphp

@if ($isComposite)
    <div
        {{
            $attributes->class([
                'ui-skeleton-group',
                match ($type) {
                    'paragraph' => 'flex w-full flex-col gap-2',
                    'card' => 'flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card',
                    'list-item' => 'flex w-full items-center gap-3',
                    'media' => 'flex w-full gap-3',
                    'table' => 'w-full overflow-hidden rounded-lg border border-border',
                    default => 'w-full',
                },
            ])
        }}
        role="status"
        aria-busy="true"
        aria-live="polite"
        aria-label="{{ $label }}"
    >
        <span class="sr-only">{{ $label }}</span>

        @if ($type === 'paragraph')
            @for ($i = 0; $i < $lines; $i++)
                @php
                    $isLast = $i === $lines - 1;
                    $lineWidth = $isLast ? ($lineWidths[($i % (count($lineWidths) - 1)) + 1] ?? 'w-3/4') : 'w-full';
                @endphp
                <span class="{{ $boneBase }} {{ $textHeightClasses }} {{ $lineWidth }}" aria-hidden="true"></span>
            @endfor
        @elseif ($type === 'card')
            <span class="{{ $boneBase }} w-full {{ $imageHeightClasses }} !rounded-none" aria-hidden="true"></span>
            <div class="flex flex-col gap-3 p-4">
                <span class="{{ $boneBase }} {{ $headingHeightClasses }} w-2/3" aria-hidden="true"></span>
                <div class="flex flex-col gap-2">
                    <span class="{{ $boneBase }} {{ $textHeightClasses }} w-full" aria-hidden="true"></span>
                    <span class="{{ $boneBase }} {{ $textHeightClasses }} w-5/6" aria-hidden="true"></span>
                    <span class="{{ $boneBase }} {{ $textHeightClasses }} w-3/4" aria-hidden="true"></span>
                </div>
                <div class="mt-1 flex gap-2">
                    <span class="{{ $boneBase }} {{ $buttonClasses }}" aria-hidden="true"></span>
                    <span class="{{ $boneBase }} {{ $buttonClasses }}" aria-hidden="true"></span>
                </div>
            </div>
        @elseif ($type === 'list-item')
            <span class="{{ $boneBase }} shrink-0 {{ $avatarSizeClasses }} !rounded-full" aria-hidden="true"></span>
            <div class="flex min-w-0 flex-1 flex-col gap-2">
                <span class="{{ $boneBase }} {{ $textHeightClasses }} w-1/3" aria-hidden="true"></span>
                <span class="{{ $boneBase }} {{ $textHeightClasses }} w-2/3" aria-hidden="true"></span>
            </div>
            <span class="{{ $boneBase }} {{ $textHeightClasses }} w-12 shrink-0" aria-hidden="true"></span>
        @elseif ($type === 'media')
            <span class="{{ $boneBase }} size-16 shrink-0 sm:size-20" aria-hidden="true"></span>
            <div class="flex min-w-0 flex-1 flex-col justify-center gap-2">
                <span class="{{ $boneBase }} {{ $headingHeightClasses }} w-1/2" aria-hidden="true"></span>
                <span class="{{ $boneBase }} {{ $textHeightClasses }} w-full" aria-hidden="true"></span>
                <span class="{{ $boneBase }} {{ $textHeightClasses }} w-4/5" aria-hidden="true"></span>
            </div>
        @elseif ($type === 'table')
            <div class="grid gap-3 border-b border-border bg-muted/40 p-3" style="grid-template-columns: repeat({{ $columns }}, minmax(0, 1fr));">
                @for ($c = 0; $c < $columns; $c++)
                    <span class="{{ $boneBase }} {{ $textHeightClasses }} w-3/4" aria-hidden="true"></span>
                @endfor
            </div>
            @for ($r = 0; $r < $rows; $r++)
                <div class="grid gap-3 border-b border-border p-3 last:border-b-0" style="grid-template-columns: repeat({{ $columns }}, minmax(0, 1fr));">
                    @for ($c = 0; $c < $columns; $c++)
                        @php
                            $cellWidth = $lineWidths[($r + $c) % count($lineWidths)];
                        @endphp
                        <span class="{{ $boneBase }} {{ $textHeightClasses }} {{ $cellWidth }}" aria-hidden="true"></span>
                    @endfor
                </div>
            @endfor
        @endif
    </div>
@else
    @if ($type === 'text' && $lines > 1)
        <div
            {{ $attributes->class(['ui-skeleton-group flex w-full flex-col gap-2']) }}
            role="status"
            aria-busy="true"
            aria-live="polite"
            aria-label="{{ $label }}"
        >
            <span class="sr-only">{{ $label }}</span>
            @for ($i = 0; $i < $lines; $i++)
                @php
                    $isLast = $i === $lines - 1;
                    $lineWidth = $widthClasses ?? ($isLast ? 'w-3/4' : 'w-full');
                @endphp
                <span class="{{ $boneBase }} {{ $textHeightClasses }} {{ $lineWidth }}" aria-hidden="true"></span>
            @endfor
        </div>
    @else
        @if ($needsWidthWrapper)
            <span
                {{ $attributes->class(['block w-full']) }}
                role="status"
                aria-busy="true"
                aria-label="{{ $label }}"
            >
                <span class="sr-only">{{ $label }}</span>
                <span class="{{ $boneClasses }}" aria-hidden="true"></span>
            </span>
        @else
            <span
                {{
                    $attributes->class([
                        $boneClasses,
                    ])
                }}
                role="status"
                aria-busy="true"
                aria-label="{{ $label }}"
            >
                <span class="sr-only">{{ $label }}</span>
            </span>
        @endif
    @endif
@endif
