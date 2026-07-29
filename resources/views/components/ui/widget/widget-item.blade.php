@props([
    'title' => null,
    'description' => null,
    'meta' => null,
    'icon' => null,
    'iconColor' => 'primary',
    'iconVariant' => 'soft',
    'avatar' => null,
    'avatarSrc' => null,
    'badge' => null,
    'badgeColor' => 'primary',
    'badgeVariant' => 'soft',
    'progress' => null,
    'progressColor' => null,
    'href' => null,
    'active' => false,
    'divider' => true,
])

@aware([
    'flush' => false,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($iconColor, $tokenColors, true)) {
        $iconColor = 'primary';
    }

    if (! in_array($iconVariant, ['soft', 'solid', 'outline', 'none'], true)) {
        $iconVariant = 'soft';
    }

    if (! in_array($badgeColor, $tokenColors, true)) {
        $badgeColor = 'primary';
    }

    if (! in_array($badgeVariant, ['soft', 'solid', 'outline', 'soft-border'], true)) {
        $badgeVariant = 'soft';
    }

    $progressColor = $progressColor ?? $iconColor;

    if (! in_array($progressColor, $tokenColors, true)) {
        $progressColor = 'primary';
    }

    $hasStart = isset($start) && $start->isNotEmpty();
    $hasEnd = isset($end) && $end->isNotEmpty();
    $hasIcon = filled($icon) && ! $hasStart;
    $hasAvatar = (filled($avatar) || filled($avatarSrc)) && ! $hasStart;
    $hasBadge = $badge !== null && $badge !== false && $badge !== '';
    $hasProgress = $progress !== null && $progress !== false && $progress !== '';
    $isLink = filled($href);
    $tag = $isLink ? 'a' : 'div';
@endphp

<{{ $tag }}
    @if ($isLink) href="{{ $href }}" @endif
    {{
        $attributes->class([
            'ui-widget-item group relative flex items-start gap-3 px-5 py-3.5 transition-colors',
            'border-b border-border last:border-b-0' => $divider,
            'bg-muted/40' => $active,
            'hover:bg-muted/30' => $isLink || ! $active,
            'cursor-pointer' => $isLink,
        ])
    }}
    data-widget-item
>
    @if ($hasStart)
        <div class="ui-widget-item-start shrink-0 self-center">{{ $start }}</div>
    @elseif ($hasAvatar)
        <x-ui.avatar
            :name="$avatar"
            :src="$avatarSrc"
            size="md"
            circle
            color="primary"
            class="shrink-0 self-center"
        />
    @elseif ($hasIcon)
        <div class="ui-widget-item-icon shrink-0 self-center">
            <x-ui.icon
                :name="$icon"
                :color="$iconColor"
                :variant="$iconVariant === 'none' ? 'none' : $iconVariant"
                box-size="sm"
                shape="circle"
            />
        </div>
    @endif

    <div class="min-w-0 flex-1">
        <div class="flex flex-wrap items-center gap-2">
            @if (filled($title))
                <p class="mb-0 truncate text-sm font-medium text-card-foreground">{{ $title }}</p>
            @endif

            @if ($hasBadge)
                <x-ui.badge :color="$badgeColor" :variant="$badgeVariant" size="sm" pill>
                    {{ $badge }}
                </x-ui.badge>
            @endif
        </div>

        @if (filled($description) || (isset($descriptionSlot) && $descriptionSlot->isNotEmpty()))
            <p class="mt-0.5 mb-0 line-clamp-2 text-sm text-muted-foreground">
                @isset($descriptionSlot)
                    {{ $descriptionSlot }}
                @else
                    {{ $description }}
                @endisset
            </p>
        @endif

        @if ($slot->isNotEmpty())
            <div class="mt-2">{{ $slot }}</div>
        @endif

        @if ($hasProgress)
            <div class="mt-2">
                <x-ui.progress :value="(float) $progress" :color="$progressColor" size="xs" />
            </div>
        @endif
    </div>

    @if ($hasEnd || filled($meta))
        <div class="ui-widget-item-end flex shrink-0 flex-col items-end gap-1 self-center text-end">
            @if ($hasEnd)
                {{ $end }}
            @elseif (filled($meta))
                <span class="text-xs text-muted-foreground whitespace-nowrap">{{ $meta }}</span>
            @endif
        </div>
    @endif
</{{ $tag }}>
