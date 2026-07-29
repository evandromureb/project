@props([
    'title' => null,
    'description' => null,
    'icon' => null,
    'columns' => 1,
    'gap' => null,
    'divided' => false,
])

@aware([
    'variant' => 'vertical',
    'gap' => 'md',
    'dense' => false,
])

@php
    $sectionColumns = (int) $columns;

    if (! in_array($sectionColumns, [1, 2, 3, 4], true)) {
        $sectionColumns = 1;
    }

    $gapKey = $gap ?? 'md';

    if (is_int($gapKey) || (is_string($gapKey) && ctype_digit((string) $gapKey))) {
        $gapKey = (string) max(0, min(12, (int) $gapKey));
    }

    $gapClass = match ((string) $gapKey) {
        'none', '0' => 'gap-0',
        'xs', '1' => 'gap-1',
        'sm', '2' => 'gap-2',
        '3' => 'gap-3',
        'md', '4' => $dense ? 'gap-3' : 'gap-4',
        '5' => 'gap-5',
        'lg', '6' => 'gap-6',
        '7' => 'gap-7',
        '8' => 'gap-8',
        'xl', '10' => 'gap-10',
        '9' => 'gap-9',
        '11' => 'gap-11',
        '12' => 'gap-12',
        default => $dense ? 'gap-3' : 'gap-4',
    };

    $bodyClass = match (true) {
        $variant === 'inline' => 'flex flex-wrap items-end '.$gapClass,
        $sectionColumns === 2 => 'grid grid-cols-1 md:grid-cols-2 '.$gapClass,
        $sectionColumns === 3 => 'grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 '.$gapClass,
        $sectionColumns === 4 => 'grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 '.$gapClass,
        default => 'flex flex-col '.$gapClass,
    };

    $hasHeading = filled($title) || filled($description) || filled($icon) || isset($heading);
@endphp

<section
    data-form-layout-section
    {{
        $attributes->class([
            'form-layout-section flex w-full min-w-0 flex-col',
            $dense ? 'gap-3' : 'gap-4',
            $divided ? 'border-t border-border pt-4' : null,
        ])
    }}
>
    @if ($hasHeading)
        <div class="flex items-start gap-3">
            @if (filled($icon))
                <span class="inline-flex size-9 shrink-0 items-center justify-center rounded-lg bg-muted text-foreground">
                    <i class="bi {{ $icon }} text-base leading-none" aria-hidden="true"></i>
                </span>
            @endif

            <div class="min-w-0 flex-1">
                @isset($heading)
                    {{ $heading }}
                @else
                    @if (filled($title))
                        <h6 class="mb-0 text-sm font-semibold text-foreground">{{ $title }}</h6>
                    @endif
                    @if (filled($description))
                        <p class="mb-0 mt-0.5 text-sm text-muted-foreground">{{ $description }}</p>
                    @endif
                @endisset
            </div>

            @isset($actions)
                <div class="ms-auto shrink-0">
                    {{ $actions }}
                </div>
            @endisset
        </div>
    @endif

    <div @class([$bodyClass])>
        {{ $slot }}
    </div>
</section>
