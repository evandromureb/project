@props([
    'title' => 'Nós usamos cookies',
    'position' => 'bottom',
    'layout' => 'floating',
    'color' => 'primary',
    'variant' => 'soft',
    'icon' => true,
    'storageKey' => 'cookie-consent',
    'storage' => 'local',
    'acceptLabel' => 'Aceitar todos',
    'declineLabel' => 'Recusar',
    'customizeLabel' => 'Personalizar',
    'saveLabel' => 'Salvar preferências',
    'showDecline' => true,
    'showCustomize' => true,
    'policyUrl' => null,
    'policyLabel' => 'Política de Privacidade',
    'dismissible' => false,
    'delay' => 0,
    'force' => false,
    'manual' => false,
    'preview' => false,
    'categories' => null,
])

@php
    $tokenColors = ['primary', 'secondary', 'success', 'warning', 'danger', 'info'];

    if (! in_array($color, $tokenColors, true)) {
        $color = 'primary';
    }

    if (! in_array($variant, ['soft', 'solid', 'outline'], true)) {
        $variant = 'soft';
    }

    if (! in_array($layout, ['floating', 'bar', 'modal'], true)) {
        $layout = 'floating';
    }

    if (! in_array($position, ['bottom', 'bottom-left', 'bottom-right', 'top', 'top-left', 'top-right'], true)) {
        $position = 'bottom';
    }

    if (! in_array($storage, ['local', 'session'], true)) {
        $storage = 'local';
    }

    $defaultIcon = 'bi-shield-lock-fill';

    $iconClass = match (true) {
        $icon === false => null,
        $icon === true => $defaultIcon,
        is_string($icon) => $icon,
        default => $defaultIcon,
    };

    $defaultCategories = [
        [
            'key' => 'necessary',
            'label' => 'Necessários',
            'description' => 'Essenciais para o funcionamento do site. Sempre ativos.',
            'required' => true,
            'default' => true,
        ],
        [
            'key' => 'analytics',
            'label' => 'Analíticos',
            'description' => 'Ajudam a entender como o site é usado, de forma anônima.',
            'required' => false,
            'default' => false,
        ],
        [
            'key' => 'marketing',
            'label' => 'Marketing',
            'description' => 'Usados para personalizar anúncios e medir campanhas.',
            'required' => false,
            'default' => false,
        ],
    ];

    $resolvedCategories = is_array($categories) && count($categories) > 0
        ? $categories
        : $defaultCategories;

    $softClasses = match ($color) {
        'primary' => 'border border-border border-t-[3px] border-t-primary bg-card text-foreground',
        'secondary' => 'border border-border border-t-[3px] border-t-secondary bg-card text-foreground',
        'success' => 'border border-border border-t-[3px] border-t-success bg-card text-foreground',
        'warning' => 'border border-border border-t-[3px] border-t-warning bg-card text-foreground',
        'danger' => 'border border-border border-t-[3px] border-t-danger bg-card text-foreground',
        'info' => 'border border-border border-t-[3px] border-t-info bg-card text-foreground',
    };

    $solidClasses = match ($color) {
        'primary' => 'border border-primary bg-primary text-primary-foreground',
        'secondary' => 'border border-secondary bg-secondary text-secondary-foreground',
        'success' => 'border border-success bg-success text-success-foreground',
        'warning' => 'border border-warning bg-warning text-warning-foreground',
        'danger' => 'border border-danger bg-danger text-danger-foreground',
        'info' => 'border border-info bg-info text-info-foreground',
    };

    $outlineClasses = match ($color) {
        'primary' => 'border border-primary bg-card text-foreground',
        'secondary' => 'border border-secondary bg-card text-foreground',
        'success' => 'border border-success bg-card text-foreground',
        'warning' => 'border border-warning bg-card text-foreground',
        'danger' => 'border border-danger bg-card text-foreground',
        'info' => 'border border-info bg-card text-foreground',
    };

    $shellClasses = match ($variant) {
        'solid' => $solidClasses,
        'outline' => $outlineClasses,
        default => $softClasses,
    };

    $iconToneClasses = match (true) {
        $variant === 'solid' => 'bg-black/10 text-current',
        $color === 'primary' => 'bg-primary/15 text-primary',
        $color === 'secondary' => 'bg-secondary/15 text-secondary',
        $color === 'success' => 'bg-success/15 text-success',
        $color === 'warning' => 'bg-warning/15 text-warning',
        $color === 'danger' => 'bg-danger/15 text-danger',
        default => 'bg-info/15 text-info',
    };

    $isBar = $layout === 'bar';
    $isModal = $layout === 'modal';
    $isFloating = $layout === 'floating';

    // Em layout "bar", posição só distingue topo/baixo (full-width).
    $barPositionClasses = str_starts_with($position, 'top')
        ? 'top-0 left-0 right-0'
        : 'bottom-0 left-0 right-0';

    $floatingPositionClasses = match ($position) {
        'top' => 'top-4 left-1/2 -translate-x-1/2',
        'top-left' => 'top-4 left-4',
        'top-right' => 'top-4 right-4',
        'bottom-left' => 'bottom-4 left-4',
        'bottom-right' => 'bottom-4 right-4',
        default => 'bottom-4 left-1/2 -translate-x-1/2', // bottom
    };

    $enterFrom = str_starts_with($position, 'top')
        ? '-translate-y-3 opacity-0'
        : 'translate-y-3 opacity-0';

    $panelWidthClasses = $isBar
        ? 'w-full max-w-none rounded-none shadow-lg'
        : ($isModal
            ? 'w-full max-w-lg rounded-xl shadow-2xl'
            : 'w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl');

    $config = [
        'storageKey' => $storageKey,
        'storage' => $storage,
        'force' => (bool) $force,
        'manual' => (bool) $manual,
        'preview' => (bool) $preview,
        'delay' => (int) $delay,
        'categories' => $resolvedCategories,
    ];

    $hasBody = $slot->isNotEmpty();
    $defaultBody = 'Utilizamos cookies para melhorar sua experiência, analisar o tráfego e personalizar conteúdo. Você pode aceitar todos, recusar os opcionais ou personalizar suas preferências.';
@endphp

{{--
    Wrapper com x-data é obrigatório mesmo em preview: o Alpine só visita
    subárvores a partir de um root ([x-data] / [wire:id]). Em produção o
    painel é teleportado para o <body> (overflow dos ancestrais cliparia
    position:fixed — ver reference/dropdown.md). Em preview=true o painel
    fica inline na página de docs, sem persistir consentimento.
--}}
<div
    x-data="cookieAlert(@js($config))"
    {{ $attributes->class(['contents']) }}
    data-cookie-alert
    data-cookie-storage-key="{{ $storageKey }}"
>
    @if ($preview)
        @include('components.ui.cookie-alert.cookie-alert-panel')
    @else
        <template x-teleport="body">
            @include('components.ui.cookie-alert.cookie-alert-panel')
        </template>
    @endif
</div>
