<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $variants = [
        'ring', 'ring-2', 'tailspin', 'line', 'dots', 'dot-pulse', 'dot-wave',
        'bars', 'bounce', 'orbit', 'grid', 'pulse', 'ripples', 'hourglass',
        'zoomies', 'mirage', 'square', 'hatch',
    ];

    $variantsCode = <<<'BLADE'
        <x-ui.spinner variant="ring" />
        <x-ui.spinner variant="ring-2" />
        <x-ui.spinner variant="tailspin" />
        <x-ui.spinner variant="dots" />
        <x-ui.spinner variant="dot-pulse" />
        <x-ui.spinner variant="bars" />
        <x-ui.spinner variant="bounce" />
        <x-ui.spinner variant="grid" />
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.spinner size="xs" />
        <x-ui.spinner size="sm" />
        <x-ui.spinner size="md" />
        <x-ui.spinner size="lg" />
        <x-ui.spinner size="xl" />
        BLADE;

    $colorsCode = <<<'BLADE'
        <x-ui.spinner color="primary" />
        <x-ui.spinner color="secondary" />
        <x-ui.spinner color="success" />
        <x-ui.spinner color="warning" />
        <x-ui.spinner color="danger" />
        <x-ui.spinner color="info" />
        BLADE;

    $speedCode = <<<'BLADE'
        <x-ui.spinner speed="slow" label="Lento" label-position="bottom" />
        <x-ui.spinner speed="normal" label="Normal" label-position="bottom" />
        <x-ui.spinner speed="fast" label="Rápido" label-position="bottom" />
        BLADE;

    $labelsCode = <<<'BLADE'
        <x-ui.spinner label="Carregando…" label-position="end" />
        <x-ui.spinner variant="dot-pulse" label="Aguarde" label-position="bottom" />
        BLADE;

    $thicknessCode = <<<'BLADE'
        <x-ui.spinner variant="ring" :thickness="2" size="lg" />
        <x-ui.spinner variant="ring" :thickness="4" size="lg" />
        <x-ui.spinner variant="ring" :thickness="6" size="lg" />
        BLADE;

    $dotsFamilyCode = <<<'BLADE'
        <x-ui.spinner variant="dots" size="lg" />
        <x-ui.spinner variant="dot-pulse" size="lg" />
        <x-ui.spinner variant="dot-wave" size="lg" />
        <x-ui.spinner variant="orbit" size="lg" />
        BLADE;

    $barsFamilyCode = <<<'BLADE'
        <x-ui.spinner variant="bars" size="lg" />
        <x-ui.spinner variant="mirage" size="lg" />
        <x-ui.spinner variant="zoomies" size="lg" />
        <x-ui.spinner variant="hatch" size="lg" />
        BLADE;

    $shapesCode = <<<'BLADE'
        <x-ui.spinner variant="pulse" size="lg" />
        <x-ui.spinner variant="ripples" size="lg" />
        <x-ui.spinner variant="hourglass" size="lg" />
        <x-ui.spinner variant="square" size="lg" />
        <x-ui.spinner variant="line" size="lg" />
        BLADE;

    $overlayCode = <<<'BLADE'
        <div class="relative h-40 overflow-hidden rounded-md border border-border bg-card">
            <p class="p-4 text-sm text-muted-foreground">Conteúdo por baixo do overlay…</p>
            <x-ui.spinner overlay label="Carregando página…" label-position="bottom" class="!absolute" />
        </div>
        BLADE;

    $buttonPairCode = <<<'BLADE'
        <x-ui.button color="primary">
            <x-ui.spinner size="xs" color="current" label-position="none" />
            Salvando
        </x-ui.button>
        BLADE;

    // Gera o HTML puro equivalente ao que <x-ui.spinner> realmente renderiza,
    // seguindo a mesma lógica de resources/views/components/ui/spinner/spinner.blade.php —
    // evita duplicar manualmente as 18 variantes (a aparência de cada uma vem do CSS
    // .ui-spinner-{variant} em resources/css/layout.css, não da estrutura HTML).
    $renderSpinner = function (
        string $variant = 'ring',
        string $size = 'md',
        string $color = 'primary',
        string $speed = 'normal',
        ?float $thickness = null,
        ?string $label = 'Carregando…',
        string $labelPosition = 'sr-only',
        bool $overlay = false,
        string $extraClass = '',
    ): string {
        $sizePx = match ($size) {
            'xs' => 16,
            'sm' => 20,
            'lg' => 48,
            'xl' => 64,
            default => 32,
        };

        $speedSec = match ($speed) {
            'slow' => '1.8s',
            'fast' => '0.7s',
            default => '1.2s',
        };

        $defaultThickness = match ($size) {
            'xs' => 2,
            'sm' => 2.5,
            'lg' => 4,
            'xl' => 5,
            default => 3.5,
        };

        $stroke = $thickness ?? $defaultThickness;

        $colorValue = match ($color) {
            'primary' => 'var(--primary)',
            'secondary' => 'var(--secondary)',
            'success' => 'var(--success)',
            'warning' => 'var(--warning)',
            'danger' => 'var(--danger)',
            'info' => 'var(--info)',
            'muted' => 'var(--muted-foreground)',
            'foreground' => 'var(--foreground)',
            default => 'currentColor',
        };

        $labelColorClasses = match ($color) {
            'primary' => 'text-primary',
            'secondary' => 'text-secondary',
            'success' => 'text-success',
            'warning' => 'text-warning',
            'danger' => 'text-danger',
            'info' => 'text-info',
            'muted' => 'text-muted-foreground',
            'foreground' => 'text-foreground',
            default => 'text-current',
        };

        $showLabel = $labelPosition !== 'none' && filled($label);
        $isInlineLabel = in_array($labelPosition, ['bottom', 'end'], true);

        $style = implode('; ', [
            '--ui-spinner-size: '.$sizePx.'px',
            '--ui-spinner-color: '.$colorValue,
            '--ui-spinner-speed: '.$speedSec,
            '--ui-spinner-stroke: '.$stroke.'px',
        ]);

        $dotCount = match ($variant) {
            'dots' => 8,
            'orbit' => 1,
            'dot-pulse', 'bounce' => 3,
            'dot-wave' => 5,
            'bars' => 4,
            'grid' => 9,
            'mirage' => 3,
            'line' => 12,
            'ripples' => 3,
            default => 0,
        };

        $wrapperClasses = trim(implode(' ', array_filter([
            'ui-spinner inline-flex',
            match ($labelPosition) {
                'bottom' => 'flex-col items-center gap-2',
                'end' => 'flex-row items-center gap-2.5',
                default => 'items-center',
            },
            $overlay ? '' : $extraClass,
        ])));

        $visual = match (true) {
            $variant === 'ring' => '<svg class="ui-spinner-ring-svg" viewBox="0 0 50 50">'
                .'<circle class="ui-spinner-ring-track" cx="25" cy="25" r="20" fill="none" />'
                .'<circle class="ui-spinner-ring-car" cx="25" cy="25" r="20" fill="none" />'
                .'</svg>',
            $variant === 'ring-2' => '<span class="ui-spinner-ring2-outer"></span><span class="ui-spinner-ring2-inner"></span>',
            $variant === 'tailspin' => '<span class="ui-spinner-tailspin-disc"></span>',
            $variant === 'square' => '<span class="ui-spinner-square-shape"></span>',
            $variant === 'hourglass' => '<span class="ui-spinner-hourglass-shape"></span>',
            $variant === 'zoomies' => '<span class="ui-spinner-zoomies-track"><span class="ui-spinner-zoomies-bar"></span></span>',
            $variant === 'hatch' => '<span class="ui-spinner-hatch-box"></span>',
            $variant === 'pulse' => '<span class="ui-spinner-pulse-core"></span><span class="ui-spinner-pulse-ring"></span>',
            default => implode('', array_map(
                fn ($i) => '<span class="ui-spinner-part" style="--i: '.$i.'"></span>',
                range(0, $dotCount - 1)
            )),
        };

        $labelHtml = '';
        if ($showLabel) {
            $labelClass = $labelPosition === 'sr-only'
                ? 'sr-only'
                : trim('text-sm font-medium '.$labelColorClasses);
            $labelHtml = "\n    <span class=\"{$labelClass}\">{$label}</span>";
        }

        $inner = <<<HTML
            <div class="{$wrapperClasses}" role="status" aria-live="polite" aria-busy="true" style="{$style}">
                <span class="ui-spinner-visual ui-spinner-{$variant}" aria-hidden="true">{$visual}</span>{$labelHtml}
            </div>
            HTML;

        if (! $overlay) {
            return $inner;
        }

        $overlayClasses = trim('ui-spinner-overlay fixed inset-0 z-50 flex items-center justify-center bg-background/70 backdrop-blur-[1px] '.$extraClass);

        return <<<HTML
            <div class="{$overlayClasses}" role="status" aria-live="polite" aria-busy="true">
            {$inner}
            </div>
            HTML;
    };

    $variantsHtml = '<div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">'."\n".implode("\n", array_map(
        fn ($v) => '<div class="flex flex-col items-center gap-2">'
            .$renderSpinner($v, 'lg')
            ."\n<span class=\"text-[11px] text-muted-foreground\">{$v}</span></div>",
        $variants
    ))."\n</div>";

    $sizesHtml = '<div class="flex flex-wrap items-end gap-4">'."\n".implode("\n", array_map(
        fn ($s) => $renderSpinner('ring', $s),
        ['xs', 'sm', 'md', 'lg', 'xl']
    ))."\n</div>";

    $colorsHtml = '<div class="flex flex-wrap items-center gap-4">'."\n".implode("\n", array_map(
        fn ($c) => $renderSpinner('ring', 'md', $c),
        ['primary', 'secondary', 'success', 'warning', 'danger', 'info']
    ))."\n</div>";

    $speedHtml = '<div class="flex flex-wrap items-start gap-8">'."\n"
        .$renderSpinner('ring', 'md', 'primary', 'slow', null, 'Lento', 'bottom')
        ."\n".$renderSpinner('ring', 'md', 'primary', 'normal', null, 'Normal', 'bottom')
        ."\n".$renderSpinner('ring', 'md', 'primary', 'fast', null, 'Rápido', 'bottom')
        ."\n</div>";

    $labelsHtml = '<div class="flex flex-wrap items-center gap-8">'."\n"
        .$renderSpinner('ring', 'md', 'primary', 'normal', null, 'Carregando…', 'end')
        ."\n".$renderSpinner('dot-pulse', 'md', 'primary', 'normal', null, 'Aguarde', 'bottom')
        ."\n</div>";

    $thicknessHtml = '<div class="flex flex-wrap items-center gap-6">'."\n"
        .$renderSpinner('ring', 'lg', 'primary', 'normal', 2.0)
        ."\n".$renderSpinner('ring', 'lg', 'primary', 'normal', 4.0)
        ."\n".$renderSpinner('ring', 'lg', 'primary', 'normal', 6.0)
        ."\n</div>";

    $dotsFamilyHtml = '<div class="flex flex-wrap items-center gap-6">'."\n".implode("\n", array_map(
        fn ($v) => $renderSpinner($v, 'lg'),
        ['dots', 'dot-pulse', 'dot-wave', 'orbit']
    ))."\n</div>";

    $barsFamilyHtml = '<div class="flex flex-wrap items-center gap-6">'."\n".implode("\n", array_map(
        fn ($v) => $renderSpinner($v, 'lg'),
        ['bars', 'mirage', 'zoomies', 'hatch']
    ))."\n</div>";

    $shapesHtml = '<div class="flex flex-wrap items-center gap-6">'."\n".implode("\n", array_map(
        fn ($v) => $renderSpinner($v, 'lg'),
        ['pulse', 'ripples', 'hourglass', 'square', 'line']
    ))."\n</div>";

    $buttonSpinner = $renderSpinner('ring', 'xs', 'current', 'normal', null, 'Carregando…', 'none');
    $buttonPairHtml = <<<HTML
        <button type="button" class="btn btn-primary">
        {$buttonSpinner}
            <span>Salvando</span>
        </button>
        HTML;

    $overlaySpinner = $renderSpinner('ring', 'md', 'primary', 'normal', null, 'Carregando página…', 'bottom', true, '!absolute');
    $overlayHtml = <<<HTML
        <div class="relative h-40 overflow-hidden rounded-md border border-border bg-card">
            <p class="p-4 text-sm text-muted-foreground">Conteúdo por baixo do overlay…</p>
        {$overlaySpinner}
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.spinner&gt;</code> é um indicador de carregamento indeterminado com
            18 variantes em CSS puro (sem dependência). Controla <code>variant</code>, <code>size</code>,
            <code>color</code>, <code>speed</code>, <code>thickness</code>, label e overlay.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Todas as variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Use <code>variant</code> para escolher o estilo. Há 18 opções (ring, dots, bars, grid…).
            </x-slot:description>
            <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                @foreach ($variants as $variant)
                    <div class="flex flex-col items-center gap-2">
                        <x-ui.spinner :variant="$variant" size="lg" />
                        <span class="text-[11px] text-muted-foreground">{{ $variant }}</span>
                    </div>
                @endforeach
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>xs</code>, <code>sm</code>, <code>md</code>, <code>lg</code>, <code>xl</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-end gap-4">
                <x-ui.spinner size="xs" />
                <x-ui.spinner size="sm" />
                <x-ui.spinner size="md" />
                <x-ui.spinner size="lg" />
                <x-ui.spinner size="xl" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Tokens do tema via <code>color</code>. Use <code>current</code> para herdar do pai.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-4">
                <x-ui.spinner color="primary" />
                <x-ui.spinner color="secondary" />
                <x-ui.spinner color="success" />
                <x-ui.spinner color="warning" />
                <x-ui.spinner color="danger" />
                <x-ui.spinner color="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Velocidade" :code="$speedCode" :html="$speedHtml">
            <x-slot:description>
                <code>speed</code>: <code>slow</code>, <code>normal</code>, <code>fast</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-start gap-8">
                <x-ui.spinner speed="slow" label="Lento" label-position="bottom" />
                <x-ui.spinner speed="normal" label="Normal" label-position="bottom" />
                <x-ui.spinner speed="fast" label="Rápido" label-position="bottom" />
            </div>
        </x-ui.example>

        <x-ui.example title="Labels" :code="$labelsCode" :html="$labelsHtml">
            <x-slot:description>
                <code>label-position</code>: <code>sr-only</code> (padrão), <code>end</code>,
                <code>bottom</code> ou <code>none</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-8">
                <x-ui.spinner label="Carregando…" label-position="end" />
                <x-ui.spinner variant="dot-pulse" label="Aguarde" label-position="bottom" />
            </div>
        </x-ui.example>

        <x-ui.example title="Espessura" :code="$thicknessCode" :html="$thicknessHtml">
            <x-slot:description>
                <code>thickness</code> ajusta o stroke (ring, bars, etc.) em pixels.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-6">
                <x-ui.spinner variant="ring" :thickness="2" size="lg" />
                <x-ui.spinner variant="ring" :thickness="4" size="lg" />
                <x-ui.spinner variant="ring" :thickness="6" size="lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Família dots" :code="$dotsFamilyCode" :html="$dotsFamilyHtml">
            <x-slot:description>
                Variantes baseadas em pontos: <code>dots</code>, <code>dot-pulse</code>,
                <code>dot-wave</code>, <code>orbit</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-6">
                <x-ui.spinner variant="dots" size="lg" />
                <x-ui.spinner variant="dot-pulse" size="lg" />
                <x-ui.spinner variant="dot-wave" size="lg" />
                <x-ui.spinner variant="orbit" size="lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Barras e texturas" :code="$barsFamilyCode" :html="$barsFamilyHtml">
            <x-slot:description>
                <code>bars</code> (waveform), <code>mirage</code>, <code>zoomies</code>, <code>hatch</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-6">
                <x-ui.spinner variant="bars" size="lg" />
                <x-ui.spinner variant="mirage" size="lg" />
                <x-ui.spinner variant="zoomies" size="lg" />
                <x-ui.spinner variant="hatch" size="lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Formas" :code="$shapesCode" :html="$shapesHtml">
            <x-slot:description>
                <code>pulse</code>, <code>ripples</code>, <code>hourglass</code>, <code>square</code>, <code>line</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-6">
                <x-ui.spinner variant="pulse" size="lg" />
                <x-ui.spinner variant="ripples" size="lg" />
                <x-ui.spinner variant="hourglass" size="lg" />
                <x-ui.spinner variant="square" size="lg" />
                <x-ui.spinner variant="line" size="lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Dentro de botão" :code="$buttonPairCode" :html="$buttonPairHtml">
            <x-slot:description>
                Com <code>color="current"</code> e <code>size="xs"</code>, encaixa em botões.
            </x-slot:description>
            <x-ui.button color="primary">
                <x-ui.spinner size="xs" color="current" label-position="none" />
                Salvando
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Overlay local" :code="$overlayCode" :html="$overlayHtml">
            <x-slot:description>
                <code>overlay</code> centra o spinner com backdrop. Em containers relativos,
                combine com <code>class="!absolute"</code> (em vez do <code>fixed</code> padrão).
            </x-slot:description>
            <div class="relative h-40 overflow-hidden rounded-md border border-border bg-card">
                <p class="p-4 text-sm text-muted-foreground">Conteúdo por baixo do overlay…</p>
                <x-ui.spinner overlay label="Carregando página…" label-position="bottom" class="!absolute" />
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="spinner" />
</x-ui.docs>
