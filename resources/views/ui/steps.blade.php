<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.steps>
            <x-ui.steps.step-item title="Carrinho" done />
            <x-ui.steps.step-item title="Entrega" done />
            <x-ui.steps.step-item title="Pagamento" active pulse />
            <x-ui.steps.step-item title="Confirmação" />
        </x-ui.steps>
        BLADE;

    $descriptionCode = <<<'BLADE'
        <x-ui.steps>
            <x-ui.steps.step-item title="Dados da conta" description="Nome, e-mail e senha" done />
            <x-ui.steps.step-item title="Documentos" description="Envio dos comprovantes" active pulse />
            <x-ui.steps.step-item title="Revisão" description="Análise da nossa equipe" />
            <x-ui.steps.step-item title="Conclusão" description="Ativação do acesso" optional />
        </x-ui.steps>
        BLADE;

    $errorCode = <<<'BLADE'
        <x-ui.steps>
            <x-ui.steps.step-item title="Dados enviados" done />
            <x-ui.steps.step-item title="Pagamento" description="Cartão recusado" error>
                <x-slot:actions>
                    <x-ui.badge color="danger" variant="soft" size="sm" pill>falhou</x-ui.badge>
                </x-slot:actions>
            </x-ui.steps.step-item>
            <x-ui.steps.step-item title="Confirmação" />
        </x-ui.steps>
        BLADE;

    $markerStyleCode = <<<'BLADE'
        <x-ui.steps marker-style="solid">...</x-ui.steps>
        <x-ui.steps marker-style="soft">...</x-ui.steps>
        <x-ui.steps marker-style="outline">...</x-ui.steps>
        <x-ui.steps marker-style="dot">...</x-ui.steps>
        BLADE;

    $colorsCode = <<<'BLADE'
        <x-ui.steps color="secondary">
            <x-ui.steps.step-item title="Briefing" done />
            <x-ui.steps.step-item title="Produção" active pulse />
            <x-ui.steps.step-item title="Entrega" />
        </x-ui.steps>

        <x-ui.steps color="success">...</x-ui.steps>
        <x-ui.steps color="warning">...</x-ui.steps>
        <x-ui.steps color="info">...</x-ui.steps>
        BLADE;

    $lineStyleCode = <<<'BLADE'
        <x-ui.steps line-style="dashed" color="info">
            <x-ui.steps.step-item title="Planejado" done />
            <x-ui.steps.step-item title="Em andamento" active pulse />
            <x-ui.steps.step-item title="Próximo" />
        </x-ui.steps>

        <x-ui.steps line-style="dotted" marker-style="dot" color="secondary">
            <x-ui.steps.step-item title="Briefing" done />
            <x-ui.steps.step-item title="Protótipo" active pulse />
            <x-ui.steps.step-item title="Entrega" />
        </x-ui.steps>
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.steps size="sm">
            <x-ui.steps.step-item title="Pequeno" done />
            <x-ui.steps.step-item title="Etapa 2" active />
            <x-ui.steps.step-item title="Etapa 3" />
        </x-ui.steps>

        <x-ui.steps size="lg">
            <x-ui.steps.step-item title="Grande" icon="bi-person" done />
            <x-ui.steps.step-item title="Etapa 2" icon="bi-file-earmark-text" active pulse />
            <x-ui.steps.step-item title="Etapa 3" icon="bi-check2-circle" />
        </x-ui.steps>
        BLADE;

    $iconsCode = <<<'BLADE'
        <x-ui.steps :numbered="false">
            <x-ui.steps.step-item title="Conta" icon="bi-person" done />
            <x-ui.steps.step-item title="Endereço" icon="bi-geo-alt" active pulse />
            <x-ui.steps.step-item title="Pagamento" icon="bi-credit-card" />
        </x-ui.steps>
        BLADE;

    $rightCode = <<<'BLADE'
        <x-ui.steps label-placement="right">
            <x-ui.steps.step-item title="Solicitação" description="Enviada em 12 Jan" done />
            <x-ui.steps.step-item title="Aprovação" description="Aguardando gestor" active pulse />
            <x-ui.steps.step-item title="Liberação" description="Acesso ao sistema" />
        </x-ui.steps>
        BLADE;

    $verticalCode = <<<'BLADE'
        <x-ui.steps orientation="vertical">
            <x-ui.steps.step-item title="Pedido criado" description="09:00 — Registrado no sistema" done />
            <x-ui.steps.step-item title="Pagamento aprovado" description="09:12 — Confirmado pela operadora" done />
            <x-ui.steps.step-item title="Em separação" description="10:30 — Preparando no estoque" active pulse />
            <x-ui.steps.step-item title="Enviado" description="Previsto para hoje" />
        </x-ui.steps>
        BLADE;

    $verticalCardCode = <<<'BLADE'
        <x-ui.steps orientation="vertical" card color="primary">
            <x-ui.steps.step-item title="Dados da empresa" description="CNPJ, razão social e endereço" done>
                <x-slot:actions>
                    <x-ui.badge color="success" variant="soft" size="sm" pill>ok</x-ui.badge>
                </x-slot:actions>
            </x-ui.steps.step-item>
            <x-ui.steps.step-item title="Documentos" description="Contrato social e comprovante" done>
                <x-slot:actions>
                    <x-ui.badge color="success" variant="soft" size="sm" pill>ok</x-ui.badge>
                </x-slot:actions>
            </x-ui.steps.step-item>
            <x-ui.steps.step-item title="Revisão" description="Validação pela nossa equipe" active pulse>
                <x-slot:actions>
                    <x-ui.badge color="primary" variant="soft" size="sm" pill>agora</x-ui.badge>
                </x-slot:actions>
                Tempo médio de análise: 1 dia útil.
            </x-ui.steps.step-item>
            <x-ui.steps.step-item title="Ativação" description="Liberação do acesso" optional />
        </x-ui.steps>
        BLADE;

    $horizontalCardCode = <<<'BLADE'
        <x-ui.steps card marker-style="solid" size="sm">
            <x-ui.steps.step-item title="Coletado" description="SP — 08:15" icon="bi-box-seam" done />
            <x-ui.steps.step-item title="Em trânsito" description="Campinas — 19:40" icon="bi-truck" active pulse />
            <x-ui.steps.step-item title="Entrega" description="Previsto 14 Jan" icon="bi-geo-alt" />
            <x-ui.steps.step-item title="Concluído" description="Assinatura" icon="bi-house-check" />
        </x-ui.steps>
        BLADE;

    $compactCode = <<<'BLADE'
        <x-ui.steps orientation="vertical" compact size="sm" marker-style="dot" color="secondary">
            <x-ui.steps.step-item title="Rascunho salvo" description="10:02" done />
            <x-ui.steps.step-item title="Enviado para revisão" description="10:40" done />
            <x-ui.steps.step-item title="Em análise" description="11:15" active pulse />
            <x-ui.steps.step-item title="Publicação" description="—" />
        </x-ui.steps>
        BLADE;

    $clickableCode = <<<'BLADE'
        {{-- "clickable" torna cada etapa um <button>; use @click ou wire:click
             normalmente, como em qualquer outro elemento --}}
        <x-ui.steps clickable>
            <x-ui.steps.step-item title="Etapa 1" done @click="etapa = 1" />
            <x-ui.steps.step-item title="Etapa 2" active pulse @click="etapa = 2" />
            <x-ui.steps.step-item title="Etapa 3" disabled />
        </x-ui.steps>

        {{-- "href" transforma a etapa em link, ignora "clickable" --}}
        <x-ui.steps>
            <x-ui.steps.step-item title="Perfil" href="/conta/perfil" done />
            <x-ui.steps.step-item title="Preferências" href="/conta/preferencias" active />
        </x-ui.steps>
        BLADE;

    $scrollCode = <<<'BLADE'
        {{-- O container já é overflow-x-auto; uma largura mínima nos itens
             troca "encolher" por "rolar" quando há muitas etapas. --}}
        <x-ui.steps size="sm" class="[&>li]:min-w-24">
            <x-ui.steps.step-item title="Lead" done />
            <x-ui.steps.step-item title="Qualificação" done />
            <x-ui.steps.step-item title="Diagnóstico" done />
            <x-ui.steps.step-item title="Proposta" active pulse />
            <x-ui.steps.step-item title="Negociação" />
            <x-ui.steps.step-item title="Contrato" />
            <x-ui.steps.step-item title="Onboarding" />
            <x-ui.steps.step-item title="Go-live" />
        </x-ui.steps>
        BLADE;

    $completeCode = <<<'BLADE'
        <x-ui.steps color="success" marker-style="solid">
            <x-ui.steps.step-item title="Pedido" done />
            <x-ui.steps.step-item title="Pagamento" done />
            <x-ui.steps.step-item title="Envio" done />
            <x-ui.steps.step-item title="Entrega" done />
        </x-ui.steps>
        BLADE;

    // Gera o HTML puro equivalente ao que <x-ui.steps> / <x-ui.steps.step-item>
    // realmente renderizam — mesma lógica de
    // resources/views/components/ui/steps/{steps,step-item}.blade.php. A
    // numeração automática vem do contador CSS (.ui-steps-numbered), não é
    // impressa aqui.
    $palettes = [
        'primary' => ['solid' => 'border-primary bg-primary text-primary-foreground', 'soft' => 'border-primary bg-primary/15 text-primary', 'outline' => 'border-primary bg-card text-primary', 'dot' => 'bg-primary', 'ring' => 'ring-primary/25', 'halo' => "before:bg-primary/40", 'line' => 'border-primary', 'text' => 'text-primary', 'accent' => 'border-l-primary', 'cardActive' => 'border-primary/40', 'cardHover' => 'hover:border-primary/40'],
        'secondary' => ['solid' => 'border-secondary bg-secondary text-secondary-foreground', 'soft' => 'border-secondary bg-secondary/15 text-secondary', 'outline' => 'border-secondary bg-card text-secondary', 'dot' => 'bg-secondary', 'ring' => 'ring-secondary/25', 'halo' => "before:bg-secondary/40", 'line' => 'border-secondary', 'text' => 'text-secondary', 'accent' => 'border-l-secondary', 'cardActive' => 'border-secondary/40', 'cardHover' => 'hover:border-secondary/40'],
        'success' => ['solid' => 'border-success bg-success text-success-foreground', 'soft' => 'border-success bg-success/15 text-success', 'outline' => 'border-success bg-card text-success', 'dot' => 'bg-success', 'ring' => 'ring-success/25', 'halo' => "before:bg-success/40", 'line' => 'border-success', 'text' => 'text-success', 'accent' => 'border-l-success', 'cardActive' => 'border-success/40', 'cardHover' => 'hover:border-success/40'],
        'warning' => ['solid' => 'border-warning bg-warning text-warning-foreground', 'soft' => 'border-warning bg-warning/15 text-warning', 'outline' => 'border-warning bg-card text-warning', 'dot' => 'bg-warning', 'ring' => 'ring-warning/25', 'halo' => "before:bg-warning/40", 'line' => 'border-warning', 'text' => 'text-warning', 'accent' => 'border-l-warning', 'cardActive' => 'border-warning/40', 'cardHover' => 'hover:border-warning/40'],
        'danger' => ['solid' => 'border-danger bg-danger text-danger-foreground', 'soft' => 'border-danger bg-danger/15 text-danger', 'outline' => 'border-danger bg-card text-danger', 'dot' => 'bg-danger', 'ring' => 'ring-danger/25', 'halo' => "before:bg-danger/40", 'line' => 'border-danger', 'text' => 'text-danger', 'accent' => 'border-l-danger', 'cardActive' => 'border-danger/40', 'cardHover' => 'hover:border-danger/40'],
        'info' => ['solid' => 'border-info bg-info text-info-foreground', 'soft' => 'border-info bg-info/15 text-info', 'outline' => 'border-info bg-card text-info', 'dot' => 'bg-info', 'ring' => 'ring-info/25', 'halo' => "before:bg-info/40", 'line' => 'border-info', 'text' => 'text-info', 'accent' => 'border-l-info', 'cardActive' => 'border-info/40', 'cardHover' => 'hover:border-info/40'],
    ];

    $renderStepItem = function (array $o) use ($palettes): string {
        $title = $o['title'] ?? null;
        $description = $o['description'] ?? null;
        $icon = $o['icon'] ?? null;
        $optional = $o['optional'] ?? false;
        $done = $o['done'] ?? false;
        $active = $o['active'] ?? false;
        $error = $o['error'] ?? false;
        $disabled = $o['disabled'] ?? false;
        $pulse = $o['pulse'] ?? false;
        $href = $o['href'] ?? null;
        $actionsHtml = $o['actionsHtml'] ?? '';
        $bodyHtml = $o['bodyHtml'] ?? '';

        $orientation = $o['orientation'] ?? 'horizontal';
        $labelPlacement = $o['labelPlacement'] ?? 'bottom';
        $color = $o['color'] ?? 'primary';
        $size = $o['size'] ?? 'md';
        $lineStyle = $o['lineStyle'] ?? 'solid';
        $markerStyle = $o['markerStyle'] ?? 'solid';
        $numbered = $o['numbered'] ?? true;
        $clickable = $o['clickable'] ?? false;
        $card = $o['card'] ?? false;
        $compact = $o['compact'] ?? false;

        $status = match (true) {
            $error => 'error',
            $done => 'done',
            $active => 'active',
            default => 'pending',
        };

        $statusColor = $status === 'error' ? 'danger' : $color;
        $palette = $palettes[$statusColor];

        $isHorizontal = $orientation === 'horizontal';
        $isRight = $isHorizontal && $labelPlacement === 'right';
        $isDot = $markerStyle === 'dot';
        $isReached = in_array($status, ['done', 'active', 'error'], true);
        $hasActionsSlot = $actionsHtml !== '';

        $defaultIcon = match ($status) {
            'done' => 'bi-check-lg',
            'error' => 'bi-exclamation-lg',
            default => null,
        };
        $resolvedIcon = $icon ?? $defaultIcon;

        $haloClasses = $pulse
            ? "before:absolute before:inset-0 before:-z-10 before:animate-ping before:rounded-full before:content-[''] {$palette['halo']}"
            : '';

        $sizeClasses = match ($size) {
            'sm' => 'size-6 text-[0.7rem]',
            'lg' => 'size-10 text-base',
            default => 'size-8 text-sm',
        };

        $dotSizeClasses = match ($size) {
            'sm' => 'size-2.5',
            'lg' => 'size-4',
            default => 'size-3',
        };

        $markerToneClasses = match (true) {
            $isDot && $status === 'pending' => 'bg-border',
            $isDot => $palette['dot'],
            $status === 'pending' => 'border-border bg-card text-muted-foreground',
            default => $palette[$markerStyle],
        };

        $markerClasses = $isDot
            ? trim(implode(' ', array_filter(['relative flex shrink-0 rounded-full', $dotSizeClasses, $markerToneClasses, $status === 'active' ? "ring-4 {$palette['ring']}" : '', $haloClasses])))
            : trim(implode(' ', array_filter(['relative inline-flex shrink-0 items-center justify-center rounded-full border-2 font-semibold shadow-sm', $sizeClasses, $markerToneClasses, $status === 'active' ? "ring-4 {$palette['ring']}" : '', $haloClasses])));

        $lineStyleClasses = match ($lineStyle) {
            'dashed' => 'border-dashed',
            'dotted' => 'border-dotted',
            default => '',
        };

        $titleClasses = match ($size) {
            'sm' => 'text-xs',
            'lg' => 'text-base',
            default => 'text-sm',
        };

        $descriptionClasses = match ($size) {
            'sm' => 'text-[0.65rem]',
            'lg' => 'text-xs',
            default => 'text-[0.7rem]',
        };

        $titleToneClasses = match (true) {
            $status === 'pending' => 'text-muted-foreground',
            $status === 'active' => $palette['text'],
            $status === 'error' => 'text-danger',
            default => 'text-foreground',
        };

        $spacingClasses = match ($size) {
            'sm' => 'gap-2',
            'lg' => 'gap-4',
            default => 'gap-3',
        };

        $contentSpacing = $isHorizontal
            ? ''
            : ($compact ? 'pb-4' : match ($size) {
                'sm' => 'pb-6',
                'lg' => 'pb-10',
                default => 'pb-8',
            });

        $isInteractive = ! $disabled && ($clickable || $href);
        $tag = match (true) {
            $disabled => 'div',
            (bool) $href => 'a',
            $clickable => 'button',
            default => 'div',
        };

        $liClasses = match (true) {
            $isRight => 'relative flex min-w-0 flex-1 items-center',
            $isHorizontal => 'relative flex flex-1 flex-col items-center text-center',
            default => 'relative w-full',
        };

        $markerTopPadding = match (true) {
            $isHorizontal => '',
            $card && $isDot => 'pt-5',
            $card => 'pt-2',
            $isDot => 'pt-1.5',
            default => '',
        };

        $markerColumnClasses = match (true) {
            $isRight => 'flex shrink-0 items-center',
            $isHorizontal => 'flex w-full items-center',
            default => trim(implode(' ', array_filter(['flex flex-col items-center self-stretch', $markerTopPadding]))),
        };

        $cardClasses = $card
            ? trim(implode(' ', array_filter([
                'rounded-md border bg-card p-3.5 shadow-sm transition-[border-color,box-shadow] duration-200',
                match ($status) {
                    'active', 'error' => "shadow-md {$palette['cardActive']}",
                    'pending' => 'border-border',
                    default => "border-border {$palette['cardHover']}",
                },
                ! $isHorizontal ? ($status === 'pending' ? 'border-l-2 border-l-border' : "border-l-2 {$palette['accent']}") : '',
            ])))
            : '';

        $contentClasses = trim(implode(' ', array_filter([
            'min-w-0',
            $isRight ? 'ms-3 max-w-[11rem] shrink-0 text-left' : '',
            $isHorizontal && ! $isRight ? ($card ? 'mt-2 w-full max-w-[11rem] px-1' : 'mt-2 max-w-[9rem] px-1') : '',
            ! $isHorizontal ? 'flex-1 '.$contentSpacing : '',
            ! $isHorizontal && ! $card ? 'pt-0.5' : '',
        ])));

        $cardWrapperClasses = trim('min-w-0 '.$cardClasses);

        $triggerClasses = trim(implode(' ', array_filter([
            'flex min-w-0 text-left transition-[opacity,colors] duration-150',
            $isRight ? 'w-full flex-row items-center' : '',
            $isHorizontal && ! $isRight ? 'w-full flex-col items-center' : '',
            ! $isHorizontal ? 'w-full flex-row items-start '.$spacingClasses : '',
            $disabled ? 'cursor-not-allowed opacity-50' : '',
            $isInteractive && ! $disabled ? 'cursor-pointer rounded-md hover:opacity-80 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary' : '',
        ])));

        $metaClasses = trim(implode(' ', array_filter(['flex flex-wrap items-center gap-1.5', $isHorizontal && ! $isRight ? 'justify-center' : ''])));

        $markerInner = '';
        if ($resolvedIcon && ! $isDot) {
            $markerInner = "<i class=\"bi {$resolvedIcon} leading-none\"></i>";
        } elseif ($numbered && ! $isDot) {
            $markerInner = '<span data-step-number class="leading-none"></span>';
        }

        $lineBefore = ($isHorizontal && ! $isRight)
            ? '<span data-line-before aria-hidden="true" class="h-0 min-w-6 flex-1 border-t-2 '.$lineStyleClasses.' '.($isReached ? $palette['line'] : 'border-border').'"></span>'
            : '';

        $lineAfter = '';
        if ($isHorizontal && ! $isRight) {
            $lineAfter = '<span data-line aria-hidden="true" class="h-0 min-w-6 flex-1 border-t-2 '.$lineStyleClasses.' '.($status === 'done' ? $palette['line'] : 'border-border').'"></span>';
        } elseif (! $isHorizontal) {
            $lineAfter = '<span data-line aria-hidden="true" class="mt-1.5 w-0 flex-1 border-l-2 '.$lineStyleClasses.' '.($status === 'done' ? $palette['line'] : 'border-border').'"></span>';
        }

        $rightLine = $isRight
            ? '<span data-line aria-hidden="true" class="ms-3 h-0 min-w-6 flex-1 border-t-2 '.$lineStyleClasses.' '.($status === 'done' ? $palette['line'] : 'border-border').'"></span>'
            : '';

        $metaHtml = '';
        if ($title || $optional || $hasActionsSlot) {
            $metaHtml = "<div class=\"{$metaClasses}\">";
            if ($title) {
                $metaHtml .= "<p class=\"m-0 font-semibold {$titleToneClasses} {$titleClasses}\">{$title}</p>";
            }
            if ($optional) {
                $metaHtml .= '<span class="rounded bg-muted px-1.5 py-0.5 text-[0.65rem] font-medium text-muted-foreground">Opcional</span>';
            }
            $metaHtml .= $actionsHtml.'</div>';
        }

        $descHtml = '';
        if ($description) {
            $mt = ($title || $optional || $hasActionsSlot) ? 'mt-0.5' : '';
            $descHtml = "<p class=\"m-0 leading-relaxed text-muted-foreground {$mt} {$descriptionClasses}\">{$description}</p>";
        }

        $slotHtml = $bodyHtml !== ''
            ? "<div class=\"mt-1 leading-relaxed text-muted-foreground {$descriptionClasses}\">{$bodyHtml}</div>"
            : '';

        $tagAttrs = '';
        if ($tag === 'a') {
            $tagAttrs .= ' href="'.($href ?: '#').'"';
        }
        if ($tag === 'button') {
            $tagAttrs .= ' type="button"';
        }
        if ($disabled) {
            $tagAttrs .= ' aria-disabled="true"';
        }
        if ($status === 'active') {
            $tagAttrs .= ' aria-current="step"';
        }

        return <<<HTML
            <li class="{$liClasses}">
                <{$tag} class="{$triggerClasses}"{$tagAttrs}>
                    <div class="{$markerColumnClasses}">
                        {$lineBefore}
                        <span class="{$markerClasses}" aria-hidden="true">{$markerInner}</span>
                        {$lineAfter}
                    </div>
                    <div data-content class="{$contentClasses}">
                        <div class="{$cardWrapperClasses}">
                            {$metaHtml}
                            {$descHtml}
                            {$slotHtml}
                        </div>
                    </div>
                    {$rightLine}
                </{$tag}>
            </li>
            HTML;
    };

    $renderSteps = function (array $items, array $shared = []) use ($renderStepItem): string {
        $orientation = $shared['orientation'] ?? 'horizontal';
        $numbered = $shared['numbered'] ?? true;
        $labelPlacement = $orientation === 'vertical' ? 'bottom' : ($shared['labelPlacement'] ?? 'bottom');
        $markerStyle = $shared['markerStyle'] ?? 'solid';

        $containerClasses = $orientation === 'horizontal'
            ? 'flex w-full items-start overflow-x-auto pb-1'
            : 'flex w-full flex-col';

        $classes = trim($containerClasses.($numbered ? ' ui-steps-numbered' : '').(isset($shared['extraClass']) ? ' '.$shared['extraClass'] : ''));

        $lis = implode("\n", array_map(
            fn ($item) => $renderStepItem($item + $shared),
            $items
        ));

        return "<ol aria-label=\"Progresso\" data-orientation=\"{$orientation}\" data-label-placement=\"{$labelPlacement}\" data-marker-style=\"{$markerStyle}\" class=\"{$classes}\">\n{$lis}\n</ol>";
    };

    $failedBadge = '<span class="inline-flex items-center font-medium leading-none bg-danger/15 text-danger gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>falhou</span></span>';
    $okBadge = '<span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>ok</span></span>';
    $nowBadge = '<span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>agora</span></span>';

    $basicHtml = $renderSteps([
        ['title' => 'Carrinho', 'done' => true],
        ['title' => 'Entrega', 'done' => true],
        ['title' => 'Pagamento', 'active' => true, 'pulse' => true],
        ['title' => 'Confirmação'],
    ]);

    $descriptionHtml = $renderSteps([
        ['title' => 'Dados da conta', 'description' => 'Nome, e-mail e senha', 'done' => true],
        ['title' => 'Documentos', 'description' => 'Envio dos comprovantes', 'active' => true, 'pulse' => true],
        ['title' => 'Revisão', 'description' => 'Análise da nossa equipe'],
        ['title' => 'Conclusão', 'description' => 'Ativação do acesso', 'optional' => true],
    ]);

    $errorHtml = $renderSteps([
        ['title' => 'Dados enviados', 'done' => true],
        ['title' => 'Pagamento', 'description' => 'Cartão recusado', 'error' => true, 'actionsHtml' => $failedBadge],
        ['title' => 'Confirmação'],
    ]);

    $markerStyleHtml = '<div class="grid w-full gap-6 sm:grid-cols-2 xl:grid-cols-4">'."\n".implode("\n", array_map(
        fn ($style) => "<div class=\"space-y-3\">\n<p class=\"m-0 font-mono text-xs text-muted-foreground\">marker-style=\"{$style}\"</p>\n"
            .$renderSteps([
                ['title' => 'Um', 'done' => true],
                ['title' => 'Dois', 'active' => true],
                ['title' => 'Três'],
            ], ['markerStyle' => $style, 'size' => 'sm'])
            .'</div>',
        ['solid', 'soft', 'outline', 'dot']
    ))."\n</div>";

    $colorsHtml = '<div class="grid w-full gap-6 sm:grid-cols-2 xl:grid-cols-4">'."\n".implode("\n", array_map(
        fn ($token) => "<div class=\"space-y-3\">\n<p class=\"m-0 font-mono text-xs text-muted-foreground\">color=\"{$token}\"</p>\n"
            .$renderSteps([
                ['title' => 'Feito', 'done' => true],
                ['title' => 'Atual', 'active' => true],
                ['title' => 'Próx.'],
            ], ['color' => $token, 'size' => 'sm'])
            .'</div>',
        ['primary', 'secondary', 'success', 'info']
    ))."\n</div>";

    $lineStyleHtml = '<div class="flex w-full flex-col gap-6">'."\n"
        .$renderSteps([
            ['title' => 'Planejado', 'done' => true],
            ['title' => 'Em andamento', 'active' => true, 'pulse' => true],
            ['title' => 'Próximo'],
        ], ['lineStyle' => 'dashed', 'color' => 'info'])
        ."\n".$renderSteps([
            ['title' => 'Briefing', 'done' => true],
            ['title' => 'Protótipo', 'active' => true, 'pulse' => true],
            ['title' => 'Entrega'],
        ], ['lineStyle' => 'dotted', 'markerStyle' => 'dot', 'color' => 'secondary'])
        ."\n</div>";

    $completeHtml = $renderSteps([
        ['title' => 'Pedido', 'done' => true],
        ['title' => 'Pagamento', 'done' => true],
        ['title' => 'Envio', 'done' => true],
        ['title' => 'Entrega', 'done' => true],
    ], ['color' => 'success', 'markerStyle' => 'solid']);

    $sizesHtml = '<div class="flex w-full flex-col gap-8">'."\n"
        .$renderSteps([
            ['title' => 'Pequeno', 'done' => true],
            ['title' => 'Etapa 2', 'active' => true],
            ['title' => 'Etapa 3'],
        ], ['size' => 'sm'])
        ."\n".$renderSteps([
            ['title' => 'Grande', 'icon' => 'bi-person', 'done' => true],
            ['title' => 'Etapa 2', 'icon' => 'bi-file-earmark-text', 'active' => true, 'pulse' => true],
            ['title' => 'Etapa 3', 'icon' => 'bi-check2-circle'],
        ], ['size' => 'lg'])
        ."\n</div>";

    $iconsHtml = $renderSteps([
        ['title' => 'Conta', 'icon' => 'bi-person', 'done' => true],
        ['title' => 'Endereço', 'icon' => 'bi-geo-alt', 'active' => true, 'pulse' => true],
        ['title' => 'Pagamento', 'icon' => 'bi-credit-card'],
    ], ['numbered' => false]);

    $rightHtml = $renderSteps([
        ['title' => 'Solicitação', 'description' => 'Enviada em 12 Jan', 'done' => true],
        ['title' => 'Aprovação', 'description' => 'Aguardando gestor', 'active' => true, 'pulse' => true],
        ['title' => 'Liberação', 'description' => 'Acesso ao sistema'],
    ], ['labelPlacement' => 'right']);

    $verticalHtml = $renderSteps([
        ['title' => 'Pedido criado', 'description' => '09:00 — Registrado no sistema', 'done' => true],
        ['title' => 'Pagamento aprovado', 'description' => '09:12 — Confirmado pela operadora', 'done' => true],
        ['title' => 'Em separação', 'description' => '10:30 — Preparando no estoque', 'active' => true, 'pulse' => true],
        ['title' => 'Enviado', 'description' => 'Previsto para hoje'],
    ], ['orientation' => 'vertical']);

    $compactHtml = $renderSteps([
        ['title' => 'Rascunho salvo', 'description' => '10:02', 'done' => true],
        ['title' => 'Enviado para revisão', 'description' => '10:40', 'done' => true],
        ['title' => 'Em análise', 'description' => '11:15', 'active' => true, 'pulse' => true],
        ['title' => 'Publicação', 'description' => '—'],
    ], ['orientation' => 'vertical', 'compact' => true, 'size' => 'sm', 'markerStyle' => 'dot', 'color' => 'secondary']);

    $verticalCardHtml = $renderSteps([
        ['title' => 'Dados da empresa', 'description' => 'CNPJ, razão social e endereço', 'done' => true, 'actionsHtml' => $okBadge],
        ['title' => 'Documentos', 'description' => 'Contrato social e comprovante', 'done' => true, 'actionsHtml' => $okBadge],
        ['title' => 'Revisão', 'description' => 'Validação pela nossa equipe', 'active' => true, 'pulse' => true, 'actionsHtml' => $nowBadge, 'bodyHtml' => 'Tempo médio de análise: 1 dia útil.'],
        ['title' => 'Ativação', 'description' => 'Liberação do acesso', 'optional' => true],
    ], ['orientation' => 'vertical', 'card' => true, 'color' => 'primary']);

    $horizontalCardHtml = $renderSteps([
        ['title' => 'Coletado', 'description' => 'SP — 08:15', 'icon' => 'bi-box-seam', 'done' => true],
        ['title' => 'Em trânsito', 'description' => 'Campinas — 19:40', 'icon' => 'bi-truck', 'active' => true, 'pulse' => true],
        ['title' => 'Entrega', 'description' => 'Previsto 14 Jan', 'icon' => 'bi-geo-alt'],
        ['title' => 'Concluído', 'description' => 'Assinatura', 'icon' => 'bi-house-check'],
    ], ['card' => true, 'markerStyle' => 'solid', 'size' => 'sm']);

    $clickableHtml = '<div class="flex w-full flex-col gap-8">'."\n"
        .$renderSteps([
            ['title' => 'Etapa 1', 'done' => true],
            ['title' => 'Etapa 2', 'active' => true, 'pulse' => true],
            ['title' => 'Etapa 3', 'disabled' => true],
        ], ['clickable' => true])
        ."\n".$renderSteps([
            ['title' => 'Perfil', 'href' => '#', 'done' => true],
            ['title' => 'Preferências', 'href' => '#', 'active' => true],
        ])
        ."\n</div>";

    $scrollHtml = $renderSteps([
        ['title' => 'Lead', 'done' => true],
        ['title' => 'Qualificação', 'done' => true],
        ['title' => 'Diagnóstico', 'done' => true],
        ['title' => 'Proposta', 'active' => true, 'pulse' => true],
        ['title' => 'Negociação'],
        ['title' => 'Contrato'],
        ['title' => 'Onboarding'],
        ['title' => 'Go-live'],
    ], ['size' => 'sm', 'extraClass' => '[&>li]:min-w-24']);
@endphp

<x-ui.docs>
<div class="flex flex-col gap-10">
    <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
        <x-slot:description>
            <code>done</code> marca a etapa como concluída (ícone de check), <code>active</code> destaca a etapa atual e
            <code>pulse</code> adiciona um halo animado — sem nenhuma das duas a etapa fica pendente/neutra.
        </x-slot:description>
        <x-ui.steps>
            <x-ui.steps.step-item title="Carrinho" done />
            <x-ui.steps.step-item title="Entrega" done />
            <x-ui.steps.step-item title="Pagamento" active pulse />
            <x-ui.steps.step-item title="Confirmação" />
        </x-ui.steps>
    </x-ui.example>

    <x-ui.example title="Com descrição e etapa opcional" :code="$descriptionCode" :html="$descriptionHtml">
        <x-slot:description>
            <code>description</code> aparece abaixo do título; <code>optional</code> renderiza um badge "Opcional".
        </x-slot:description>
        <x-ui.steps>
            <x-ui.steps.step-item title="Dados da conta" description="Nome, e-mail e senha" done />
            <x-ui.steps.step-item title="Documentos" description="Envio dos comprovantes" active pulse />
            <x-ui.steps.step-item title="Revisão" description="Análise da nossa equipe" />
            <x-ui.steps.step-item title="Conclusão" description="Ativação do acesso" optional />
        </x-ui.steps>
    </x-ui.example>

    <x-ui.example title="Etapa com erro" :code="$errorCode" :html="$errorHtml">
        <x-slot:description>
            <code>error</code> força a cor <code>danger</code> e o ícone de exclamação — tem prioridade sobre
            <code>done</code>/<code>active</code>. O slot <code>actions</code> recebe badges ao lado do título.
        </x-slot:description>
        <x-ui.steps>
            <x-ui.steps.step-item title="Dados enviados" done />
            <x-ui.steps.step-item title="Pagamento" description="Cartão recusado" error>
                <x-slot:actions>
                    <x-ui.badge color="danger" variant="soft" size="sm" pill>falhou</x-ui.badge>
                </x-slot:actions>
            </x-ui.steps.step-item>
            <x-ui.steps.step-item title="Confirmação" />
        </x-ui.steps>
    </x-ui.example>

    <x-ui.example title="Estilos de marcador" :code="$markerStyleCode" :html="$markerStyleHtml">
        <x-slot:description>
            <code>marker-style="solid|soft|outline|dot"</code> — <code>dot</code> é um ponto pequeno e ignora ícone/numeração.
        </x-slot:description>
        <div class="grid w-full gap-6 sm:grid-cols-2 xl:grid-cols-4">
            @foreach (['solid', 'soft', 'outline', 'dot'] as $style)
                <div class="space-y-3">
                    <p class="m-0 font-mono text-xs text-muted-foreground">marker-style="{{ $style }}"</p>
                    <x-ui.steps :marker-style="$style" size="sm">
                        <x-ui.steps.step-item title="Um" done />
                        <x-ui.steps.step-item title="Dois" active />
                        <x-ui.steps.step-item title="Três" />
                    </x-ui.steps>
                </div>
            @endforeach
        </div>
    </x-ui.example>

    <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
        <x-slot:description>
            <code>color</code> é usado pelas etapas <code>done</code>/<code>active</code>; a pendente é sempre neutra.
        </x-slot:description>
        <div class="grid w-full gap-6 sm:grid-cols-2 xl:grid-cols-4">
            @foreach (['primary', 'secondary', 'success', 'info'] as $token)
                <div class="space-y-3">
                    <p class="m-0 font-mono text-xs text-muted-foreground">color="{{ $token }}"</p>
                    <x-ui.steps :color="$token" size="sm">
                        <x-ui.steps.step-item title="Feito" done />
                        <x-ui.steps.step-item title="Atual" active />
                        <x-ui.steps.step-item title="Próx." />
                    </x-ui.steps>
                </div>
            @endforeach
        </div>
    </x-ui.example>

    <x-ui.example title="Estilo da linha" :code="$lineStyleCode" :html="$lineStyleHtml">
        <x-slot:description>
            <code>line-style="solid|dashed|dotted"</code> no conector entre as etapas.
        </x-slot:description>
        <div class="flex w-full flex-col gap-6">
            <x-ui.steps line-style="dashed" color="info">
                <x-ui.steps.step-item title="Planejado" done />
                <x-ui.steps.step-item title="Em andamento" active pulse />
                <x-ui.steps.step-item title="Próximo" />
            </x-ui.steps>

            <x-ui.steps line-style="dotted" marker-style="dot" color="secondary">
                <x-ui.steps.step-item title="Briefing" done />
                <x-ui.steps.step-item title="Protótipo" active pulse />
                <x-ui.steps.step-item title="Entrega" />
            </x-ui.steps>
        </div>
    </x-ui.example>

    <x-ui.example title="Fluxo concluído" :code="$completeCode" :html="$completeHtml">
        <x-slot:description>
            Todas as etapas com <code>done</code> — a linha inteira fica na cor do token.
        </x-slot:description>
        <x-ui.steps color="success" marker-style="solid">
            <x-ui.steps.step-item title="Pedido" done />
            <x-ui.steps.step-item title="Pagamento" done />
            <x-ui.steps.step-item title="Envio" done />
            <x-ui.steps.step-item title="Entrega" done />
        </x-ui.steps>
    </x-ui.example>

    <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
        <x-slot:description>
            <code>size="sm|md|lg"</code> ajusta marcador, textos e o gap entre marcador/linha.
        </x-slot:description>
        <div class="flex w-full flex-col gap-8">
            <x-ui.steps size="sm">
                <x-ui.steps.step-item title="Pequeno" done />
                <x-ui.steps.step-item title="Etapa 2" active />
                <x-ui.steps.step-item title="Etapa 3" />
            </x-ui.steps>

            <x-ui.steps size="lg">
                <x-ui.steps.step-item title="Grande" icon="bi-person" done />
                <x-ui.steps.step-item title="Etapa 2" icon="bi-file-earmark-text" active pulse />
                <x-ui.steps.step-item title="Etapa 3" icon="bi-check2-circle" />
            </x-ui.steps>
        </div>
    </x-ui.example>

    <x-ui.example title="Ícones fixos (sem numeração)" :code="$iconsCode" :html="$iconsHtml">
        <x-slot:description>
            <code>:numbered="false"</code> desliga o contador — sem <code>icon</code> o marcador pendente fica vazio.
        </x-slot:description>
        <x-ui.steps :numbered="false">
            <x-ui.steps.step-item title="Conta" icon="bi-person" done />
            <x-ui.steps.step-item title="Endereço" icon="bi-geo-alt" active pulse />
            <x-ui.steps.step-item title="Pagamento" icon="bi-credit-card" />
        </x-ui.steps>
    </x-ui.example>

    <x-ui.example title="Rótulo ao lado (label-placement)" :code="$rightCode" :html="$rightHtml">
        <x-slot:description>
            <code>label-placement="right"</code> — texto ao lado do marcador; a linha conectora preenche o espaço restante
            até a próxima etapa.
        </x-slot:description>
        <x-ui.steps label-placement="right">
            <x-ui.steps.step-item title="Solicitação" description="Enviada em 12 Jan" done />
            <x-ui.steps.step-item title="Aprovação" description="Aguardando gestor" active pulse />
            <x-ui.steps.step-item title="Liberação" description="Acesso ao sistema" />
        </x-ui.steps>
    </x-ui.example>

    <x-ui.example title="Orientação vertical" :code="$verticalCode" :html="$verticalHtml">
        <x-slot:description>
            <code>orientation="vertical"</code> — marcador e linha ficam em coluna à esquerda do conteúdo.
        </x-slot:description>
        <x-ui.steps orientation="vertical">
            <x-ui.steps.step-item title="Pedido criado" description="09:00 — Registrado no sistema" done />
            <x-ui.steps.step-item title="Pagamento aprovado" description="09:12 — Confirmado pela operadora" done />
            <x-ui.steps.step-item title="Em separação" description="10:30 — Preparando no estoque" active pulse />
            <x-ui.steps.step-item title="Enviado" description="Previsto para hoje" />
        </x-ui.steps>
    </x-ui.example>

    <x-ui.example title="Compacto (log vertical)" :code="$compactCode" :html="$compactHtml">
        <x-slot:description>
            <code>compact</code> reduz o espaço entre itens — combina bem com <code>size="sm"</code> e
            <code>marker-style="dot"</code>.
        </x-slot:description>
        <x-ui.steps orientation="vertical" compact size="sm" marker-style="dot" color="secondary">
            <x-ui.steps.step-item title="Rascunho salvo" description="10:02" done />
            <x-ui.steps.step-item title="Enviado para revisão" description="10:40" done />
            <x-ui.steps.step-item title="Em análise" description="11:15" active pulse />
            <x-ui.steps.step-item title="Publicação" description="—" />
        </x-ui.steps>
    </x-ui.example>

    <x-ui.example title="Vertical em cards" :code="$verticalCardCode" :html="$verticalCardHtml">
        <x-slot:description>
            <code>card</code> + <code>orientation="vertical"</code> — cada etapa vira um card com faixa colorida; o slot
            <code>actions</code> recebe badges de status.
        </x-slot:description>
        <x-ui.steps orientation="vertical" card color="primary">
            <x-ui.steps.step-item title="Dados da empresa" description="CNPJ, razão social e endereço" done>
                <x-slot:actions>
                    <x-ui.badge color="success" variant="soft" size="sm" pill>ok</x-ui.badge>
                </x-slot:actions>
            </x-ui.steps.step-item>
            <x-ui.steps.step-item title="Documentos" description="Contrato social e comprovante" done>
                <x-slot:actions>
                    <x-ui.badge color="success" variant="soft" size="sm" pill>ok</x-ui.badge>
                </x-slot:actions>
            </x-ui.steps.step-item>
            <x-ui.steps.step-item title="Revisão" description="Validação pela nossa equipe" active pulse>
                <x-slot:actions>
                    <x-ui.badge color="primary" variant="soft" size="sm" pill>agora</x-ui.badge>
                </x-slot:actions>
                Tempo médio de análise: 1 dia útil.
            </x-ui.steps.step-item>
            <x-ui.steps.step-item title="Ativação" description="Liberação do acesso" optional />
        </x-ui.steps>
    </x-ui.example>

    <x-ui.example title="Horizontal em cards (rastreio)" :code="$horizontalCardCode" :html="$horizontalCardHtml">
        <x-slot:description>
            <code>card</code> no horizontal — cada etapa vira um card sob o marcador (larguras iguais via <code>w-full</code>).
        </x-slot:description>
        <x-ui.steps card marker-style="solid" size="sm">
            <x-ui.steps.step-item title="Coletado" description="SP — 08:15" icon="bi-box-seam" done />
            <x-ui.steps.step-item title="Em trânsito" description="Campinas — 19:40" icon="bi-truck" active pulse />
            <x-ui.steps.step-item title="Entrega" description="Previsto 14 Jan" icon="bi-geo-alt" />
            <x-ui.steps.step-item title="Concluído" description="Assinatura" icon="bi-house-check" />
        </x-ui.steps>
    </x-ui.example>

    <x-ui.example title="Etapas clicáveis / com link" :code="$clickableCode" :html="$clickableHtml">
        <x-slot:description>
            <code>clickable</code> no container faz cada etapa virar um <code>&lt;button&gt;</code> (aceita
            <code>@click</code>/<code>wire:click</code> no próprio item); <code>disabled</code> desativa a interação.
            <code>href</code> em um item transforma a etapa em link, independente de <code>clickable</code>.
        </x-slot:description>
        <div class="flex w-full flex-col gap-8">
            <x-ui.steps clickable>
                <x-ui.steps.step-item title="Etapa 1" done />
                <x-ui.steps.step-item title="Etapa 2" active pulse />
                <x-ui.steps.step-item title="Etapa 3" disabled />
            </x-ui.steps>

            <x-ui.steps>
                <x-ui.steps.step-item title="Perfil" href="#" done />
                <x-ui.steps.step-item title="Preferências" href="#" active />
            </x-ui.steps>
        </div>
    </x-ui.example>

    <x-ui.example title="Com scroll (muitas etapas)" :code="$scrollCode" :html="$scrollHtml">
        <x-slot:description>
            O container já tem <code>overflow-x-auto</code>; <code>class="[&amp;&gt;li]:min-w-24"</code> impede os itens de
            encolher demais e ativa a rolagem horizontal quando há muitas etapas.
        </x-slot:description>
        <x-ui.steps size="sm" class="[&>li]:min-w-24">
            <x-ui.steps.step-item title="Lead" done />
            <x-ui.steps.step-item title="Qualificação" done />
            <x-ui.steps.step-item title="Diagnóstico" done />
            <x-ui.steps.step-item title="Proposta" active pulse />
            <x-ui.steps.step-item title="Negociação" />
            <x-ui.steps.step-item title="Contrato" />
            <x-ui.steps.step-item title="Onboarding" />
            <x-ui.steps.step-item title="Go-live" />
        </x-ui.steps>
    </x-ui.example>
</div>

    <x-ui.docs.api component="ui/steps/steps" title="x-ui.steps" />
</x-ui.docs>
