@props([
    'title' => null,
    'subtitle' => null,
    'headerClass' => null,
    'bodyClass' => null,
    'footerClass' => null,
    'image' => null,
    'imagePosition' => 'top',
    'imageAlt' => null,
    'imageHeight' => 'h-48',
    'horizontal' => false,
    'color' => null,
    'variant' => 'solid',
    'borderAccent' => null,
    'href' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];
    $hasColor = $color !== null && in_array($color, $tokenColors, true);

    if (! in_array($variant, ['solid', 'soft', 'outline'], true)) {
        $variant = 'solid';
    }

    $solidClasses = $hasColor ? match ($color) {
        'primary' => 'border-primary bg-primary text-primary-foreground [&_.card-title]:text-primary-foreground [&_.card-header]:border-primary-foreground/20 [&_.card-footer]:border-primary-foreground/20 [&_.text-muted-foreground]:text-primary-foreground/80',
        'secondary' => 'border-secondary bg-secondary text-secondary-foreground [&_.card-title]:text-secondary-foreground [&_.card-header]:border-secondary-foreground/20 [&_.card-footer]:border-secondary-foreground/20 [&_.text-muted-foreground]:text-secondary-foreground/80',
        'success' => 'border-success bg-success text-success-foreground [&_.card-title]:text-success-foreground [&_.card-header]:border-success-foreground/20 [&_.card-footer]:border-success-foreground/20 [&_.text-muted-foreground]:text-success-foreground/80',
        'warning' => 'border-warning bg-warning text-warning-foreground [&_.card-title]:text-warning-foreground [&_.card-header]:border-warning-foreground/20 [&_.card-footer]:border-warning-foreground/20 [&_.text-muted-foreground]:text-warning-foreground/80',
        'danger' => 'border-danger bg-danger text-danger-foreground [&_.card-title]:text-danger-foreground [&_.card-header]:border-danger-foreground/20 [&_.card-footer]:border-danger-foreground/20 [&_.text-muted-foreground]:text-danger-foreground/80',
        'info' => 'border-info bg-info text-info-foreground [&_.card-title]:text-info-foreground [&_.card-header]:border-info-foreground/20 [&_.card-footer]:border-info-foreground/20 [&_.text-muted-foreground]:text-info-foreground/80',
    } : null;

    $softClasses = $hasColor ? match ($color) {
        'primary' => 'border-primary/25 bg-primary/10 text-primary [&_.card-title]:text-primary [&_.card-header]:border-primary/15 [&_.card-footer]:border-primary/15',
        'secondary' => 'border-secondary/25 bg-secondary/10 text-secondary [&_.card-title]:text-secondary [&_.card-header]:border-secondary/15 [&_.card-footer]:border-secondary/15',
        'success' => 'border-success/25 bg-success/10 text-success [&_.card-title]:text-success [&_.card-header]:border-success/15 [&_.card-footer]:border-success/15',
        'warning' => 'border-warning/25 bg-warning/10 text-warning [&_.card-title]:text-warning [&_.card-header]:border-warning/15 [&_.card-footer]:border-warning/15',
        'danger' => 'border-danger/25 bg-danger/10 text-danger [&_.card-title]:text-danger [&_.card-header]:border-danger/15 [&_.card-footer]:border-danger/15',
        'info' => 'border-info/25 bg-info/10 text-info [&_.card-title]:text-info [&_.card-header]:border-info/15 [&_.card-footer]:border-info/15',
    } : null;

    $outlineClasses = $hasColor ? match ($color) {
        'primary' => 'border-primary bg-card text-primary [&_.card-title]:text-primary',
        'secondary' => 'border-secondary bg-card text-secondary [&_.card-title]:text-secondary',
        'success' => 'border-success bg-card text-success [&_.card-title]:text-success',
        'warning' => 'border-warning bg-card text-warning [&_.card-title]:text-warning',
        'danger' => 'border-danger bg-card text-danger [&_.card-title]:text-danger',
        'info' => 'border-info bg-card text-info [&_.card-title]:text-info',
    } : null;

    $colorClasses = $hasColor
        ? match ($variant) {
            'soft' => $softClasses,
            'outline' => $outlineClasses,
            default => $solidClasses,
        }
        : null;

    $borderAccentClasses = ($borderAccent !== null && in_array($borderAccent, $tokenColors, true))
        ? match ($borderAccent) {
            'primary' => 'border-l-4 border-l-primary',
            'secondary' => 'border-l-4 border-l-secondary',
            'success' => 'border-l-4 border-l-success',
            'warning' => 'border-l-4 border-l-warning',
            'danger' => 'border-l-4 border-l-danger',
            'info' => 'border-l-4 border-l-info',
        }
        : null;

    // "imagePosition" só se aplica no layout empilhado (padrão); no
    // horizontal a imagem sempre fica à esquerda do conteúdo.
    $isOverlay = $image && $imagePosition === 'overlay' && ! $horizontal;
    $isStretchedLink = (bool) $href;
@endphp

<div
    {{
        $attributes->class([
            'card',
            'relative' => $isStretchedLink,
            'flex' => $horizontal,
            $colorClasses,
            $borderAccentClasses,
        ])
    }}
>
    {{-- "Stretched link": todo o card vira clicável; conteúdo interativo
         real (botões/links) precisa de "relative z-[2]" para ficar acima
         deste overlay — ver reference/card.md. --}}
    @if ($isStretchedLink)
        <a href="{{ $href }}" class="absolute inset-0 z-[1] rounded-[inherit]" aria-label="{{ $title ?? $subtitle ?? 'Abrir' }}"></a>
    @endif

    @if ($image && $horizontal)
        <img
            src="{{ $image }}"
            alt="{{ $imageAlt ?? $title }}"
            class="w-1/3 shrink-0 rounded-l-md object-cover"
        >
    @elseif ($image && $imagePosition === 'top' && ! $isOverlay)
        <img
            src="{{ $image }}"
            alt="{{ $imageAlt ?? $title }}"
            class="w-full {{ $imageHeight }} rounded-t-md object-cover"
        >
    @endif

    <div class="{{ $horizontal ? 'flex min-w-0 flex-1 flex-col' : '' }}">
        @if ($isOverlay)
            <div class="relative">
                <img
                    src="{{ $image }}"
                    alt="{{ $imageAlt ?? $title }}"
                    class="w-full {{ $imageHeight }} rounded-md object-cover"
                >
                <div class="absolute inset-0 flex flex-col justify-end rounded-md bg-gradient-to-t from-black/70 to-transparent p-5">
                    @if ($title)
                        <h5 class="card-title text-white">{{ $title }}</h5>
                    @endif

                    @if ($subtitle)
                        <p class="mt-1 mb-0 text-sm text-white/80">{{ $subtitle }}</p>
                    @endif

                    @if ($slot->isNotEmpty())
                        <div class="mt-2 text-sm text-white/90">
                            {{ $slot }}
                        </div>
                    @endif
                </div>
            </div>
        @else
            @if ($title || isset($header))
                <div class="card-header {{ $headerClass }}">
                    @isset($header)
                        {{ $header }}
                    @else
                        <div>
                            <h5 class="card-title">{{ $title }}</h5>

                            @if ($subtitle)
                                <p class="mt-1 mb-0 text-sm text-muted-foreground">{{ $subtitle }}</p>
                            @endif
                        </div>
                    @endisset
                </div>
            @endif

            <div class="card-body {{ $bodyClass }} {{ $isStretchedLink ? 'relative z-[2]' : '' }}">
                {{ $slot }}
            </div>

            @isset($footer)
                <div class="card-footer {{ $footerClass }} {{ $isStretchedLink ? 'relative z-[2]' : '' }}">
                    {{ $footer }}
                </div>
            @endisset

            @if ($image && $imagePosition === 'bottom' && ! $horizontal)
                <img
                    src="{{ $image }}"
                    alt="{{ $imageAlt ?? $title }}"
                    class="w-full {{ $imageHeight }} rounded-b-md object-cover"
                >
            @endif
        @endif
    </div>
</div>
