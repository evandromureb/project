<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.timeline>
            <x-ui.timeline.timeline-item title="Pedido criado" date="09:00">
                O pedido #4821 foi registrado no sistema.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Pagamento aprovado" date="09:12">
                O pagamento foi confirmado pela operadora.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Em separação" date="10:30">
                O pedido está sendo preparado no estoque.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Enviado" date="Hoje, 14:45" active>
                O pedido saiu para entrega.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $iconsCode = <<<'BLADE'
        <x-ui.timeline>
            <x-ui.timeline.timeline-item title="Conta criada" date="12 Jan" icon="bi-person-plus" color="primary">
                Cadastro concluído com sucesso.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="E-mail verificado" date="12 Jan" icon="bi-envelope-check" color="success">
                O endereço de e-mail foi confirmado.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Pagamento recusado" date="15 Jan" icon="bi-x-lg" color="danger">
                O cartão informado foi recusado pela operadora.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Assinatura pendente" date="Aguardando" icon="bi-hourglass-split" color="warning" muted>
                Aguardando nova tentativa de pagamento.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $markerStyleCode = <<<'BLADE'
        <x-ui.timeline marker-style="soft">...</x-ui.timeline>
        <x-ui.timeline marker-style="solid">...</x-ui.timeline>
        <x-ui.timeline marker-style="outline">...</x-ui.timeline>
        <x-ui.timeline marker-style="dot">...</x-ui.timeline>

        {{-- Também aceita override por item --}}
        <x-ui.timeline marker-style="dot">
            <x-ui.timeline.timeline-item title="Etapa comum" date="09:00" />
            <x-ui.timeline.timeline-item title="Etapa destacada" date="09:30" marker-style="solid" icon="bi-check-lg" color="success" />
        </x-ui.timeline>
        BLADE;

    $colorsCode = <<<'BLADE'
        <x-ui.timeline color="secondary">
            <x-ui.timeline.timeline-item title="Build iniciado" date="14:02">Pipeline disparado pelo commit a1b2c3d.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Testes ok" date="14:05" color="success">312 testes passaram.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Deploy falhou" date="14:07" color="danger">Erro ao publicar no ambiente de produção.</x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $lineStyleCode = <<<'BLADE'
        <x-ui.timeline line-style="dashed" color="info">
            <x-ui.timeline.timeline-item title="Planejado" date="Semana 1">Levantamento de requisitos.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Em andamento" date="Semana 2" active pulse>Desenvolvimento da funcionalidade.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Próximo" date="Semana 3" muted>Testes e homologação.</x-ui.timeline.timeline-item>
        </x-ui.timeline>

        <x-ui.timeline line-style="dotted" marker-style="dot" color="secondary">
            <x-ui.timeline.timeline-item title="Rascunho salvo" date="10:02" />
            <x-ui.timeline.timeline-item title="Enviado para revisão" date="10:40" />
            <x-ui.timeline.timeline-item title="Aguardando aprovação" date="—" muted />
        </x-ui.timeline>
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.timeline size="sm">
            <x-ui.timeline.timeline-item title="Pequeno" date="08:00">Marcadores e textos compactos.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Etapa 2" date="09:00">Ideal para listas densas.</x-ui.timeline.timeline-item>
        </x-ui.timeline>

        <x-ui.timeline size="lg">
            <x-ui.timeline.timeline-item title="Grande" date="08:00" icon="bi-star">Marcadores e textos maiores.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Etapa 2" date="09:00" icon="bi-flag">Bom para linhas do tempo com poucos itens.</x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $compactCode = <<<'BLADE'
        <x-ui.timeline compact size="sm" marker-style="dot">
            <x-ui.timeline.timeline-item title="10:02 — Login" />
            <x-ui.timeline.timeline-item title="10:04 — Relatório exportado" />
            <x-ui.timeline.timeline-item title="10:09 — Permissão alterada" color="warning" />
            <x-ui.timeline.timeline-item title="10:15 — Logout" muted />
        </x-ui.timeline>
        BLADE;

    $numberedCode = <<<'BLADE'
        <x-ui.timeline numbered marker-style="solid" color="primary">
            <x-ui.timeline.timeline-item title="Dados da empresa" date="Concluído">
                CNPJ, razão social e endereço.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Documentos" date="Concluído">
                Contrato social e comprovante bancário.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Revisão" date="Em análise" active pulse>
                Nossa equipe está validando os documentos enviados.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Ativação" date="Pendente" muted>
                Liberação do acesso à plataforma.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $cardCode = <<<'BLADE'
        <x-ui.timeline card color="primary">
            <x-ui.timeline.timeline-item title="Contrato assinado" date="12 Jan, 09:20" icon="bi-file-earmark-check" href="#">
                Assinatura digital concluída por ambas as partes.
                <x-slot:actions>
                    <x-ui.badge color="success" variant="soft" pill>Concluído</x-ui.badge>
                </x-slot:actions>
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Fatura emitida" date="12 Jan, 10:05" icon="bi-receipt" color="info" href="#">
                Fatura #2451 no valor de R$ 4.900,00.
                <x-slot:actions>
                    <x-ui.badge color="info" variant="soft" pill>Aberta</x-ui.badge>
                </x-slot:actions>
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Pagamento em atraso" date="20 Jan" icon="bi-exclamation-triangle" color="danger" active>
                A cobrança venceu há 3 dias.
                <x-slot:actions>
                    <x-ui.badge color="danger" variant="soft" pill>Vencida</x-ui.badge>
                </x-slot:actions>
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $alternateCode = <<<'BLADE'
        <x-ui.timeline variant="alternate" color="primary">
            <x-ui.timeline.timeline-item title="Fundação da empresa" date="2019" icon="bi-flag">
                Início das operações com uma equipe de 3 pessoas.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Primeira rodada de investimento" date="2021" icon="bi-cash-coin" color="success">
                Captação de recursos para expansão.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Abertura de novo escritório" date="2023" icon="bi-building" color="info">
                Expansão para uma nova cidade.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Hoje" date="2026" icon="bi-star" active pulse>
                Continuamos crescendo.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $alternateCardCode = <<<'BLADE'
        <x-ui.timeline variant="alternate" card marker-style="outline" color="secondary">
            <x-ui.timeline.timeline-item title="Kickoff" date="Jan" icon="bi-rocket">Alinhamento de escopo com o cliente.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Protótipo" date="Fev" icon="bi-pencil" color="info">Fluxos navegáveis aprovados.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Entrega" date="Mar" icon="bi-check2-circle" color="success" active>Go-live em produção.</x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $sideCode = <<<'BLADE'
        <x-ui.timeline variant="alternate">
            <x-ui.timeline.timeline-item title="Sempre à esquerda" date="Passo 1" side="left">
                Forçado com a prop "side", ignora a alternância automática.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Sempre à esquerda também" date="Passo 2" side="left">
                Dois itens seguidos do mesmo lado.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Agora à direita" date="Passo 3" side="right">
                Volta ao padrão manual.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $gutterCode = <<<'BLADE'
        <x-ui.timeline variant="gutter" marker-style="dot" color="secondary">
            <x-ui.timeline.timeline-item title="v2.4.0 lançada" date="12 Jan">
                Novo editor de relatórios e melhorias de performance.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="v2.3.2" date="28 Dez" color="warning">
                Correção do cálculo de impostos em notas canceladas.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="v2.3.0" date="03 Dez" color="info">
                Integração com o gateway de pagamentos.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $horizontalCode = <<<'BLADE'
        <x-ui.timeline orientation="horizontal">
            <x-ui.timeline.timeline-item title="Pedido" date="09:00" icon="bi-cart" />
            <x-ui.timeline.timeline-item title="Pago" date="09:12" icon="bi-credit-card" color="success" />
            <x-ui.timeline.timeline-item title="Enviado" date="10:30" icon="bi-truck" color="info" active pulse />
            <x-ui.timeline.timeline-item title="Entregue" date="Previsto" icon="bi-house-check" muted />
        </x-ui.timeline>

        {{-- Stepper numerado --}}
        <x-ui.timeline orientation="horizontal" numbered marker-style="solid" line-style="dashed">
            <x-ui.timeline.timeline-item title="Carrinho" />
            <x-ui.timeline.timeline-item title="Entrega" />
            <x-ui.timeline.timeline-item title="Pagamento" active />
            <x-ui.timeline.timeline-item title="Confirmação" muted />
        </x-ui.timeline>
        BLADE;

    $horizontalCardCode = <<<'BLADE'
        <x-ui.timeline orientation="horizontal" card marker-style="solid" size="sm">
            <x-ui.timeline.timeline-item title="Coletado" date="12 Jan, 08:15" icon="bi-box-seam" color="success">
                Centro de distribuição — São Paulo/SP.
                <x-slot:actions>
                    <x-ui.badge color="success" variant="soft" size="sm" pill>ok</x-ui.badge>
                </x-slot:actions>
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Em trânsito" date="13 Jan, 19:40" icon="bi-truck" color="info" active pulse>
                Saiu da unidade de Campinas/SP.
                <x-slot:actions>
                    <x-ui.badge color="info" variant="soft" size="sm" pill>agora</x-ui.badge>
                </x-slot:actions>
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Saiu para entrega" date="Previsto 14 Jan" icon="bi-geo-alt" marker-style="outline" muted>
                Última milha com o parceiro local.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Entregue" date="Previsto 15 Jan" icon="bi-house-check" marker-style="outline" muted>
                Assinatura do destinatário.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $horizontalDotCode = <<<'BLADE'
        <x-ui.timeline orientation="horizontal" marker-style="dot" size="sm" line-style="dotted" color="secondary">
            <x-ui.timeline.timeline-item title="Briefing" date="Sem. 1" color="success" />
            <x-ui.timeline.timeline-item title="Wireframe" date="Sem. 2" color="success" />
            <x-ui.timeline.timeline-item title="Protótipo" date="Sem. 3" color="primary" active pulse />
            <x-ui.timeline.timeline-item title="Testes" date="Sem. 4" muted />
            <x-ui.timeline.timeline-item title="Entrega" date="Sem. 5" muted />
        </x-ui.timeline>
        BLADE;

    $horizontalAvatarCode = <<<'BLADE'
        <x-ui.timeline orientation="horizontal" size="lg">
            <x-ui.timeline.timeline-item title="Solicitante" date="Maria Silva">
                <x-slot:marker>
                    <x-ui.avatar initials="MS" size="md" color="primary" circle badge badgeColor="success" />
                </x-slot:marker>
                Abriu a requisição de compra.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Gestor" date="João Souza">
                <x-slot:marker>
                    <x-ui.avatar initials="JS" size="md" color="success" circle badge badgeColor="success" />
                </x-slot:marker>
                Aprovou em 12 Jan.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Financeiro" date="Ana Lima" active>
                <x-slot:marker>
                    <x-ui.avatar initials="AL" size="md" color="warning" circle />
                </x-slot:marker>
                Aguardando análise orçamentária.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Diretoria" date="Pendente" muted>
                <x-slot:marker>
                    <x-ui.avatar icon="bi-person" size="md" circle />
                </x-slot:marker>
                Aprovação final acima de R$ 50 mil.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    $horizontalScrollCode = <<<'BLADE'
        {{-- O container já é overflow-x-auto; uma largura mínima nos itens
             troca "encolher" por "rolar" quando há muitas etapas. --}}
        <x-ui.timeline orientation="horizontal" marker-style="solid" size="sm" numbered class="[&>li]:min-w-32">
            <x-ui.timeline.timeline-item title="Lead" date="02 Jan" color="success" />
            <x-ui.timeline.timeline-item title="Qualificação" date="04 Jan" color="success" />
            <x-ui.timeline.timeline-item title="Diagnóstico" date="09 Jan" color="success" />
            <x-ui.timeline.timeline-item title="Proposta" date="15 Jan" color="success" />
            <x-ui.timeline.timeline-item title="Negociação" date="21 Jan" active pulse />
            <x-ui.timeline.timeline-item title="Contrato" date="Previsto" muted />
            <x-ui.timeline.timeline-item title="Onboarding" date="Previsto" muted />
            <x-ui.timeline.timeline-item title="Go-live" date="Previsto" muted />
        </x-ui.timeline>
        BLADE;

    $markerCode = <<<'BLADE'
        <x-ui.timeline compact>
            <x-ui.timeline.timeline-item title="Maria Silva" date="há 2 min" href="#">
                <x-slot:marker>
                    <x-ui.avatar initials="MS" size="sm" color="primary" circle />
                </x-slot:marker>
                <x-slot:actions>
                    <x-ui.badge color="primary" variant="soft" pill>comentário</x-ui.badge>
                </x-slot:actions>
                Comentou na tarefa "Revisar layout".
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="João Souza" date="há 10 min" href="#">
                <x-slot:marker>
                    <x-ui.avatar initials="JS" size="sm" color="success" circle />
                </x-slot:marker>
                <x-slot:actions>
                    <x-ui.badge color="success" variant="soft" pill>concluída</x-ui.badge>
                </x-slot:actions>
                Marcou a tarefa "Ajustar API" como concluída.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
        BLADE;

    // Gera o HTML puro equivalente ao que <x-ui.timeline> / <x-ui.timeline.timeline-item>
    // realmente renderizam — mesma lógica de
    // resources/views/components/ui/timeline/{timeline,timeline-item}.blade.php. A
    // numeração automática vem do contador CSS (.ui-timeline-numbered), não é impressa aqui.
    $timelinePalette = [
        'primary' => ['soft' => 'border-primary bg-primary/15 text-primary', 'solid' => 'border-primary bg-primary text-primary-foreground', 'outline' => 'border-primary bg-card text-primary', 'dot' => 'bg-primary', 'ring' => 'ring-primary/25', 'halo' => "before:bg-primary/40", 'line' => 'border-primary', 'accent' => 'border-l-primary', 'cardActive' => 'border-primary/40', 'cardHover' => 'hover:border-primary/40', 'link' => 'hover:text-primary'],
        'secondary' => ['soft' => 'border-secondary bg-secondary/15 text-secondary', 'solid' => 'border-secondary bg-secondary text-secondary-foreground', 'outline' => 'border-secondary bg-card text-secondary', 'dot' => 'bg-secondary', 'ring' => 'ring-secondary/25', 'halo' => "before:bg-secondary/40", 'line' => 'border-secondary', 'accent' => 'border-l-secondary', 'cardActive' => 'border-secondary/40', 'cardHover' => 'hover:border-secondary/40', 'link' => 'hover:text-secondary'],
        'success' => ['soft' => 'border-success bg-success/15 text-success', 'solid' => 'border-success bg-success text-success-foreground', 'outline' => 'border-success bg-card text-success', 'dot' => 'bg-success', 'ring' => 'ring-success/25', 'halo' => "before:bg-success/40", 'line' => 'border-success', 'accent' => 'border-l-success', 'cardActive' => 'border-success/40', 'cardHover' => 'hover:border-success/40', 'link' => 'hover:text-success'],
        'warning' => ['soft' => 'border-warning bg-warning/15 text-warning', 'solid' => 'border-warning bg-warning text-warning-foreground', 'outline' => 'border-warning bg-card text-warning', 'dot' => 'bg-warning', 'ring' => 'ring-warning/25', 'halo' => "before:bg-warning/40", 'line' => 'border-warning', 'accent' => 'border-l-warning', 'cardActive' => 'border-warning/40', 'cardHover' => 'hover:border-warning/40', 'link' => 'hover:text-warning'],
        'danger' => ['soft' => 'border-danger bg-danger/15 text-danger', 'solid' => 'border-danger bg-danger text-danger-foreground', 'outline' => 'border-danger bg-card text-danger', 'dot' => 'bg-danger', 'ring' => 'ring-danger/25', 'halo' => "before:bg-danger/40", 'line' => 'border-danger', 'accent' => 'border-l-danger', 'cardActive' => 'border-danger/40', 'cardHover' => 'hover:border-danger/40', 'link' => 'hover:text-danger'],
        'info' => ['soft' => 'border-info bg-info/15 text-info', 'solid' => 'border-info bg-info text-info-foreground', 'outline' => 'border-info bg-card text-info', 'dot' => 'bg-info', 'ring' => 'ring-info/25', 'halo' => "before:bg-info/40", 'line' => 'border-info', 'accent' => 'border-l-info', 'cardActive' => 'border-info/40', 'cardHover' => 'hover:border-info/40', 'link' => 'hover:text-info'],
    ];

    $renderTimelineItem = function (array $o) use ($timelinePalette): string {
        $title = $o['title'] ?? null;
        $date = $o['date'] ?? null;
        $icon = $o['icon'] ?? null;
        $href = $o['href'] ?? null;
        $active = $o['active'] ?? false;
        $muted = $o['muted'] ?? false;
        $pulse = $o['pulse'] ?? false;
        $side = $o['side'] ?? null;
        $bodyHtml = $o['bodyHtml'] ?? '';
        $actionsHtml = $o['actionsHtml'] ?? '';
        $itemMarkerHtml = $o['markerHtml'] ?? '';

        $orientation = $o['orientation'] ?? 'vertical';
        $variant = $o['variant'] ?? 'line';
        $color = $o['color'] ?? 'primary';
        $size = $o['size'] ?? 'md';
        $lineStyle = $o['lineStyle'] ?? 'solid';
        $markerStyle = $o['markerStyle'] ?? 'soft';
        $card = $o['card'] ?? false;
        $compact = $o['compact'] ?? false;
        $numbered = $o['numbered'] ?? false;

        $palette = $timelinePalette[$color];

        $isHorizontal = $orientation === 'horizontal';
        $isAlternate = ! $isHorizontal && $variant === 'alternate';
        $isGutter = ! $isHorizontal && $variant === 'gutter';
        $isDot = $markerStyle === 'dot';
        $hasMarkerSlot = $itemMarkerHtml !== '';
        $hasActionsSlot = $actionsHtml !== '';

        $haloClasses = $pulse
            ? "before:absolute before:inset-0 before:-z-10 before:animate-ping before:rounded-full before:content-[''] {$palette['halo']}"
            : '';

        $markerClasses = $isDot
            ? trim(implode(' ', array_filter([
                'relative flex shrink-0 rounded-full',
                match ($size) { 'sm' => 'size-2.5', 'lg' => 'size-4', default => 'size-3' },
                $palette['dot'],
                $active ? "ring-4 {$palette['ring']}" : '',
                $haloClasses,
            ])))
            : trim(implode(' ', array_filter([
                'relative inline-flex shrink-0 items-center justify-center rounded-full border-2 font-semibold shadow-sm',
                match ($size) { 'sm' => 'size-6 text-[0.7rem]', 'lg' => 'size-10 text-base', default => 'size-8 text-sm' },
                $active ? $palette['solid'] : $palette[$markerStyle],
                $active ? "ring-4 {$palette['ring']}" : '',
                $haloClasses,
            ])));

        $lineStyleClasses = match ($lineStyle) { 'dashed' => 'border-dashed', 'dotted' => 'border-dotted', default => '' };

        $spacingClasses = $compact ? 'pb-4' : match ($size) { 'sm' => 'pb-6', 'lg' => 'pb-10', default => 'pb-8' };

        $titleClasses = match ($size) { 'sm' => 'text-xs', 'lg' => 'text-base', default => 'text-sm' };
        $dateClasses = match ($size) { 'sm' => 'text-[0.65rem]', 'lg' => 'text-xs', default => 'text-[0.7rem]' };
        $bodyClasses = match ($size) { 'sm' => 'text-xs', 'lg' => 'text-sm', default => 'text-[0.8125rem]' };

        $forcedSide = in_array($side, ['left', 'right'], true) ? $side : null;

        $alternateSwapClasses = $isAlternate && ! $forcedSide
            ? 'odd:[&>[data-content]]:sm:col-start-1 odd:[&>[data-content]]:sm:text-right even:[&>[data-content]]:sm:col-start-3 even:[&>[data-content]]:sm:text-left odd:[&_[data-meta]]:sm:justify-end'
            : '';

        $forcedSideClasses = match ($isAlternate ? $forcedSide : null) {
            'left' => 'sm:col-start-1 sm:text-right [&_[data-meta]]:sm:justify-end',
            'right' => 'sm:col-start-3 sm:text-left',
            default => '',
        };

        $liClasses = match (true) {
            $isHorizontal => 'relative flex flex-1 flex-col items-center gap-2 text-center',
            $isAlternate => 'relative grid grid-cols-[auto_1fr] items-start gap-x-4 sm:grid-cols-[1fr_auto_1fr] sm:gap-x-6',
            $isGutter => 'relative grid grid-cols-[max-content_auto_1fr] items-start gap-x-3 sm:gap-x-4',
            default => 'relative flex '.match ($size) { 'sm' => 'gap-3', 'lg' => 'gap-5', default => 'gap-4' },
        };

        $markerTopPadding = match (true) {
            $isHorizontal => '',
            $card && $isDot => 'pt-5',
            $card => 'pt-2',
            $isDot && ! $hasMarkerSlot => 'pt-1.5',
            default => '',
        };

        $markerColumnClasses = trim(implode(' ', array_filter([
            $isHorizontal ? 'flex w-full items-center' : 'flex flex-col items-center self-stretch',
            $isAlternate ? 'col-start-1 row-start-1 sm:col-start-2' : '',
            $markerTopPadding,
        ])));

        $cardClasses = $card
            ? trim(implode(' ', array_filter([
                'rounded-md border bg-card p-3.5 shadow-sm transition-[border-color,box-shadow] duration-200',
                $active ? "shadow-md {$palette['cardActive']}" : "border-border {$palette['cardHover']}",
                ! $isAlternate && ! $isHorizontal ? "border-l-2 {$palette['accent']}" : '',
            ])))
            : '';

        $contentClasses = trim(implode(' ', array_filter([
            'min-w-0',
            $isHorizontal ? ($card ? 'w-full max-w-[11rem] px-1' : 'max-w-[11rem] px-1') : $spacingClasses,
            $isAlternate ? 'col-start-2 row-start-1 text-left' : '',
            ! $isHorizontal && ! $isAlternate && ! $isGutter ? 'flex-1' : '',
            ! $isHorizontal && ! $card ? 'pt-0.5' : '',
            $forcedSideClasses,
        ])));

        $cardWrapperClasses = trim('min-w-0 '.$cardClasses);

        $stackHeader = $isHorizontal || $isAlternate || $isGutter;

        $metaClasses = trim(implode(' ', array_filter([
            'flex flex-wrap items-center gap-2',
            $stackHeader ? '' : 'ms-auto shrink-0',
            $isHorizontal ? 'justify-center' : '',
        ])));

        $liClassesFull = trim(implode(' ', array_filter([
            $liClasses,
            'first:[&_[data-line-before]]:invisible last:[&_[data-line]]:invisible',
            'last:[&>[data-content]]:pb-0',
            $alternateSwapClasses,
            $muted ? 'opacity-60' : '',
        ])));

        $gutterColHtml = '';
        if ($isGutter) {
            $gutterPt = $card ? 'pt-3.5' : 'pt-0.5';
            $gutterColHtml = "<div class=\"row-start-1 {$gutterPt} text-right font-medium whitespace-nowrap text-muted-foreground {$dateClasses}\">{$date}</div>";
        }

        $lineBeforeHtml = $isHorizontal
            ? '<span data-line-before aria-hidden="true" class="h-0 min-w-6 flex-1 border-t-2 '.$lineStyleClasses.' '.($active ? $palette['line'] : 'border-border').'"></span>'
            : '';

        $markerInnerHtml = $hasMarkerSlot
            ? $itemMarkerHtml
            : '<span class="'.$markerClasses.'" aria-hidden="true">'
                .($icon && ! $isDot ? "<i class=\"bi {$icon} leading-none\"></i>" : ($numbered && ! $isDot ? '<span data-timeline-number class="leading-none"></span>' : ''))
                .'</span>';

        $lineHtml = $isHorizontal
            ? '<span data-line aria-hidden="true" class="h-0 min-w-6 flex-1 border-t-2 '.$lineStyleClasses.' border-border"></span>'
            : '<span data-line aria-hidden="true" class="mt-1.5 w-0 flex-1 border-l-2 '.$lineStyleClasses.' border-border"></span>';

        $titleHtml = '';
        if ($title) {
            $titleHtml = $href
                ? "<a href=\"{$href}\" class=\"m-0 font-semibold text-foreground underline-offset-4 transition-colors duration-150 hover:underline {$palette['link']} {$titleClasses}\">{$title}</a>"
                : "<p class=\"m-0 font-semibold text-foreground {$titleClasses}\">{$title}</p>";
        }

        $metaHtml = '';
        if ((! $isGutter && $date) || $hasActionsSlot) {
            $metaHtml = "<div data-meta class=\"{$metaClasses}\">";
            if (! $isGutter && $date) {
                $metaHtml .= "<span class=\"text-muted-foreground {$dateClasses}\">{$date}</span>";
            }
            $metaHtml .= $actionsHtml.'</div>';
        }

        $headerWrapClasses = $stackHeader ? 'flex flex-col gap-0.5' : 'flex flex-wrap items-baseline gap-x-3 gap-y-0.5';

        $bodySlotHtml = $bodyHtml !== ''
            ? "<div class=\"mt-1 leading-relaxed text-muted-foreground {$bodyClasses}\">{$bodyHtml}</div>"
            : '';

        $dataSide = $forcedSide ?? 'auto';

        return <<<HTML
            <li class="{$liClassesFull}">
                {$gutterColHtml}
                <div class="{$markerColumnClasses}">
                    {$lineBeforeHtml}
                    {$markerInnerHtml}
                    {$lineHtml}
                </div>
                <div data-content data-side="{$dataSide}" class="{$contentClasses}">
                    <div class="{$cardWrapperClasses}">
                        <div class="{$headerWrapClasses}">
                            {$titleHtml}
                            {$metaHtml}
                        </div>
                        {$bodySlotHtml}
                    </div>
                </div>
            </li>
            HTML;
    };

    $renderTimeline = function (array $items, array $shared = []) use ($renderTimelineItem): string {
        $orientation = $shared['orientation'] ?? 'vertical';
        $variant = $shared['variant'] ?? 'line';

        if ($orientation === 'horizontal' && $variant !== 'line') {
            $variant = 'line';
        }

        $markerStyle = $shared['markerStyle'] ?? 'soft';
        $numbered = $shared['numbered'] ?? false;

        $containerClasses = $orientation === 'horizontal'
            ? 'flex w-full items-start overflow-x-auto pb-1'
            : 'flex w-full flex-col';

        $classes = trim($containerClasses.($numbered ? ' ui-timeline-numbered' : '').(isset($shared['extraClass']) ? ' '.$shared['extraClass'] : ''));

        $shared['orientation'] = $orientation;
        $shared['variant'] = $variant;

        $lis = implode("\n", array_map(
            fn ($item) => $renderTimelineItem($item + $shared),
            $items
        ));

        return "<ul data-orientation=\"{$orientation}\" data-variant=\"{$variant}\" data-marker-style=\"{$markerStyle}\" class=\"{$classes}\">\n{$lis}\n</ul>";
    };

    $badgeFn = function (string $color, string $label, string $size = 'md'): string {
        $softClasses = match ($color) {
            'primary' => 'bg-primary/15 text-primary',
            'secondary' => 'bg-secondary/15 text-secondary',
            'success' => 'bg-success/15 text-success',
            'warning' => 'bg-warning/15 text-warning',
            'danger' => 'bg-danger/15 text-danger',
            'info' => 'bg-info/15 text-info',
        };
        $sizeClasses = match ($size) { 'sm' => 'gap-1 px-2 py-0.5 text-[11px]', default => 'gap-1.5 px-2.5 py-1 text-xs' };

        return "<span class=\"inline-flex items-center font-medium leading-none {$softClasses} {$sizeClasses} rounded-full\"><span>{$label}</span></span>";
    };

    $avatarFn = function (array $o): string {
        $initials = $o['initials'] ?? null;
        $icon = $o['icon'] ?? null;
        $size = $o['size'] ?? 'md';
        $color = $o['color'] ?? null;
        $circle = $o['circle'] ?? false;
        $badge = $o['badge'] ?? false;
        $badgeColor = $o['badgeColor'] ?? 'success';

        $sizeClasses = match ($size) { 'xs' => 'size-6 text-xs', 'sm' => 'size-8 text-xs', 'lg' => 'size-12 text-base', 'xl' => 'size-16 text-lg', default => 'size-10 text-sm' };
        $colorClasses = match ($color) {
            'primary' => 'bg-primary/15 text-primary',
            'secondary' => 'bg-secondary/15 text-secondary',
            'success' => 'bg-success/15 text-success',
            'warning' => 'bg-warning/15 text-warning',
            'danger' => 'bg-danger/15 text-danger',
            'info' => 'bg-info/15 text-info',
            default => 'bg-muted text-foreground',
        };
        $shapeClasses = $circle ? 'rounded-full' : 'rounded-md';
        $badgeColorClasses = match ($badgeColor) {
            'primary' => 'bg-primary',
            'secondary' => 'bg-secondary',
            'warning' => 'bg-warning',
            'danger' => 'bg-danger',
            'info' => 'bg-info',
            default => 'bg-success',
        };

        $inner = $icon
            ? "<i class=\"bi {$icon}\" aria-hidden=\"true\"></i>"
            : ($initials ? "<span>{$initials}</span>" : '<i class="bi bi-person-fill" aria-hidden="true"></i>');

        $badgeHtml = $badge
            ? "<span class=\"absolute right-0 bottom-0 flex size-3 items-center justify-center rounded-full ring-2 ring-card {$badgeColorClasses}\" aria-hidden=\"true\"></span>"
            : '';

        return "<div class=\"relative inline-flex shrink-0 select-none items-center justify-center font-medium {$sizeClasses} {$colorClasses} {$shapeClasses}\">{$inner}{$badgeHtml}</div>";
    };

    $basicHtml = $renderTimeline([
        ['title' => 'Pedido criado', 'date' => '09:00', 'bodyHtml' => 'O pedido #4821 foi registrado no sistema.'],
        ['title' => 'Pagamento aprovado', 'date' => '09:12', 'bodyHtml' => 'O pagamento foi confirmado pela operadora.'],
        ['title' => 'Em separação', 'date' => '10:30', 'bodyHtml' => 'O pedido está sendo preparado no estoque.'],
        ['title' => 'Enviado', 'date' => 'Hoje, 14:45', 'active' => true, 'bodyHtml' => 'O pedido saiu para entrega.'],
    ]);

    $iconsHtml = $renderTimeline([
        ['title' => 'Conta criada', 'date' => '12 Jan', 'icon' => 'bi-person-plus', 'color' => 'primary', 'bodyHtml' => 'Cadastro concluído com sucesso.'],
        ['title' => 'E-mail verificado', 'date' => '12 Jan', 'icon' => 'bi-envelope-check', 'color' => 'success', 'bodyHtml' => 'O endereço de e-mail foi confirmado.'],
        ['title' => 'Pagamento recusado', 'date' => '15 Jan', 'icon' => 'bi-x-lg', 'color' => 'danger', 'bodyHtml' => 'O cartão informado foi recusado pela operadora.'],
        ['title' => 'Assinatura pendente', 'date' => 'Aguardando', 'icon' => 'bi-hourglass-split', 'color' => 'warning', 'muted' => true, 'bodyHtml' => 'Aguardando nova tentativa de pagamento.'],
    ]);

    $markerStyleHtml = '<div class="grid w-full gap-6 sm:grid-cols-2 xl:grid-cols-4">'."\n".implode("\n", array_map(
        fn ($style) => '<div class="space-y-3">'
            .'<p class="m-0 font-mono text-xs text-muted-foreground">marker-style="'.$style.'"</p>'
            .$renderTimeline([
                ['title' => 'Criado', 'date' => '09:00', 'icon' => 'bi-plus-lg'],
                ['title' => 'Aprovado', 'date' => '09:30', 'icon' => 'bi-check-lg', 'color' => 'success'],
                ['title' => 'Em rota', 'date' => '10:00', 'icon' => 'bi-truck', 'color' => 'info', 'active' => true],
            ], ['markerStyle' => $style, 'size' => 'sm', 'compact' => true])
            .'</div>',
        ['soft', 'solid', 'outline', 'dot']
    ))."\n".'</div>';

    $colorsHtml = $renderTimeline([
        ['title' => 'Build iniciado', 'date' => '14:02', 'bodyHtml' => 'Pipeline disparado pelo commit a1b2c3d.'],
        ['title' => 'Testes ok', 'date' => '14:05', 'color' => 'success', 'bodyHtml' => '312 testes passaram.'],
        ['title' => 'Deploy falhou', 'date' => '14:07', 'color' => 'danger', 'bodyHtml' => 'Erro ao publicar no ambiente de produção.'],
    ], ['color' => 'secondary']);

    $lineStyleHtml = '<div class="flex w-full flex-col gap-6">'."\n"
        .$renderTimeline([
            ['title' => 'Planejado', 'date' => 'Semana 1', 'bodyHtml' => 'Levantamento de requisitos.'],
            ['title' => 'Em andamento', 'date' => 'Semana 2', 'active' => true, 'pulse' => true, 'bodyHtml' => 'Desenvolvimento da funcionalidade.'],
            ['title' => 'Próximo', 'date' => 'Semana 3', 'muted' => true, 'bodyHtml' => 'Testes e homologação.'],
        ], ['lineStyle' => 'dashed', 'color' => 'info'])
        ."\n".$renderTimeline([
            ['title' => 'Rascunho salvo', 'date' => '10:02'],
            ['title' => 'Enviado para revisão', 'date' => '10:40'],
            ['title' => 'Aguardando aprovação', 'date' => '—', 'muted' => true],
        ], ['lineStyle' => 'dotted', 'markerStyle' => 'dot', 'color' => 'secondary'])
        ."\n".'</div>';

    $sizesHtml = '<div class="flex w-full flex-col gap-6">'."\n"
        .$renderTimeline([
            ['title' => 'Pequeno', 'date' => '08:00', 'bodyHtml' => 'Marcadores e textos compactos.'],
            ['title' => 'Etapa 2', 'date' => '09:00', 'bodyHtml' => 'Ideal para listas densas.'],
        ], ['size' => 'sm'])
        ."\n".$renderTimeline([
            ['title' => 'Grande', 'date' => '08:00', 'icon' => 'bi-star', 'bodyHtml' => 'Marcadores e textos maiores.'],
            ['title' => 'Etapa 2', 'date' => '09:00', 'icon' => 'bi-flag', 'bodyHtml' => 'Bom para linhas do tempo com poucos itens.'],
        ], ['size' => 'lg'])
        ."\n".'</div>';

    $compactHtml = $renderTimeline([
        ['title' => '10:02 — Login'],
        ['title' => '10:04 — Relatório exportado'],
        ['title' => '10:09 — Permissão alterada', 'color' => 'warning'],
        ['title' => '10:15 — Logout', 'muted' => true],
    ], ['compact' => true, 'size' => 'sm', 'markerStyle' => 'dot']);

    $numberedHtml = $renderTimeline([
        ['title' => 'Dados da empresa', 'date' => 'Concluído', 'bodyHtml' => 'CNPJ, razão social e endereço.'],
        ['title' => 'Documentos', 'date' => 'Concluído', 'bodyHtml' => 'Contrato social e comprovante bancário.'],
        ['title' => 'Revisão', 'date' => 'Em análise', 'active' => true, 'pulse' => true, 'bodyHtml' => 'Nossa equipe está validando os documentos enviados.'],
        ['title' => 'Ativação', 'date' => 'Pendente', 'muted' => true, 'bodyHtml' => 'Liberação do acesso à plataforma.'],
    ], ['numbered' => true, 'markerStyle' => 'solid', 'color' => 'primary']);

    $cardHtml = $renderTimeline([
        ['title' => 'Contrato assinado', 'date' => '12 Jan, 09:20', 'icon' => 'bi-file-earmark-check', 'href' => '#', 'bodyHtml' => 'Assinatura digital concluída por ambas as partes.', 'actionsHtml' => $badgeFn('success', 'Concluído')],
        ['title' => 'Fatura emitida', 'date' => '12 Jan, 10:05', 'icon' => 'bi-receipt', 'color' => 'info', 'href' => '#', 'bodyHtml' => 'Fatura #2451 no valor de R$ 4.900,00.', 'actionsHtml' => $badgeFn('info', 'Aberta')],
        ['title' => 'Pagamento em atraso', 'date' => '20 Jan', 'icon' => 'bi-exclamation-triangle', 'color' => 'danger', 'active' => true, 'bodyHtml' => 'A cobrança venceu há 3 dias.', 'actionsHtml' => $badgeFn('danger', 'Vencida')],
    ], ['card' => true, 'color' => 'primary']);

    $gutterHtml = $renderTimeline([
        ['title' => 'v2.4.0 lançada', 'date' => '12 Jan', 'bodyHtml' => 'Novo editor de relatórios e melhorias de performance.'],
        ['title' => 'v2.3.2', 'date' => '28 Dez', 'color' => 'warning', 'bodyHtml' => 'Correção do cálculo de impostos em notas canceladas.'],
        ['title' => 'v2.3.0', 'date' => '03 Dez', 'color' => 'info', 'bodyHtml' => 'Integração com o gateway de pagamentos.'],
    ], ['variant' => 'gutter', 'markerStyle' => 'dot', 'color' => 'secondary']);

    $alternateHtml = $renderTimeline([
        ['title' => 'Fundação da empresa', 'date' => '2019', 'icon' => 'bi-flag', 'bodyHtml' => 'Início das operações com uma equipe de 3 pessoas.'],
        ['title' => 'Primeira rodada de investimento', 'date' => '2021', 'icon' => 'bi-cash-coin', 'color' => 'success', 'bodyHtml' => 'Captação de recursos para expansão.'],
        ['title' => 'Abertura de novo escritório', 'date' => '2023', 'icon' => 'bi-building', 'color' => 'info', 'bodyHtml' => 'Expansão para uma nova cidade.'],
        ['title' => 'Hoje', 'date' => '2026', 'icon' => 'bi-star', 'active' => true, 'pulse' => true, 'bodyHtml' => 'Continuamos crescendo.'],
    ], ['variant' => 'alternate', 'color' => 'primary']);

    $alternateCardHtml = $renderTimeline([
        ['title' => 'Kickoff', 'date' => 'Jan', 'icon' => 'bi-rocket', 'bodyHtml' => 'Alinhamento de escopo com o cliente.'],
        ['title' => 'Protótipo', 'date' => 'Fev', 'icon' => 'bi-pencil', 'color' => 'info', 'bodyHtml' => 'Fluxos navegáveis aprovados.'],
        ['title' => 'Entrega', 'date' => 'Mar', 'icon' => 'bi-check2-circle', 'color' => 'success', 'active' => true, 'bodyHtml' => 'Go-live em produção.'],
    ], ['variant' => 'alternate', 'card' => true, 'markerStyle' => 'outline', 'color' => 'secondary']);

    $sideHtml = $renderTimeline([
        ['title' => 'Sempre à esquerda', 'date' => 'Passo 1', 'side' => 'left', 'bodyHtml' => 'Forçado com a prop "side", ignora a alternância automática.'],
        ['title' => 'Sempre à esquerda também', 'date' => 'Passo 2', 'side' => 'left', 'bodyHtml' => 'Dois itens seguidos do mesmo lado.'],
        ['title' => 'Agora à direita', 'date' => 'Passo 3', 'side' => 'right', 'bodyHtml' => 'Volta ao padrão manual.'],
    ], ['variant' => 'alternate']);

    $horizontalHtml = '<div class="flex w-full flex-col gap-8">'."\n"
        .$renderTimeline([
            ['title' => 'Pedido', 'date' => '09:00', 'icon' => 'bi-cart'],
            ['title' => 'Pago', 'date' => '09:12', 'icon' => 'bi-credit-card', 'color' => 'success'],
            ['title' => 'Enviado', 'date' => '10:30', 'icon' => 'bi-truck', 'color' => 'info', 'active' => true, 'pulse' => true],
            ['title' => 'Entregue', 'date' => 'Previsto', 'icon' => 'bi-house-check', 'muted' => true],
        ], ['orientation' => 'horizontal'])
        ."\n".$renderTimeline([
            ['title' => 'Carrinho'],
            ['title' => 'Entrega'],
            ['title' => 'Pagamento', 'active' => true],
            ['title' => 'Confirmação', 'muted' => true],
        ], ['orientation' => 'horizontal', 'numbered' => true, 'markerStyle' => 'solid', 'lineStyle' => 'dashed'])
        ."\n".'</div>';

    $horizontalCardHtml = $renderTimeline([
        ['title' => 'Coletado', 'date' => '12 Jan, 08:15', 'icon' => 'bi-box-seam', 'color' => 'success', 'bodyHtml' => 'Centro de distribuição — São Paulo/SP.', 'actionsHtml' => $badgeFn('success', 'ok', 'sm')],
        ['title' => 'Em trânsito', 'date' => '13 Jan, 19:40', 'icon' => 'bi-truck', 'color' => 'info', 'active' => true, 'pulse' => true, 'bodyHtml' => 'Saiu da unidade de Campinas/SP.', 'actionsHtml' => $badgeFn('info', 'agora', 'sm')],
        ['title' => 'Saiu para entrega', 'date' => 'Previsto 14 Jan', 'icon' => 'bi-geo-alt', 'markerStyle' => 'outline', 'muted' => true, 'bodyHtml' => 'Última milha com o parceiro local.'],
        ['title' => 'Entregue', 'date' => 'Previsto 15 Jan', 'icon' => 'bi-house-check', 'markerStyle' => 'outline', 'muted' => true, 'bodyHtml' => 'Assinatura do destinatário.'],
    ], ['orientation' => 'horizontal', 'card' => true, 'markerStyle' => 'solid', 'size' => 'sm']);

    $horizontalDotHtml = $renderTimeline([
        ['title' => 'Briefing', 'date' => 'Sem. 1', 'color' => 'success'],
        ['title' => 'Wireframe', 'date' => 'Sem. 2', 'color' => 'success'],
        ['title' => 'Protótipo', 'date' => 'Sem. 3', 'color' => 'primary', 'active' => true, 'pulse' => true],
        ['title' => 'Testes', 'date' => 'Sem. 4', 'muted' => true],
        ['title' => 'Entrega', 'date' => 'Sem. 5', 'muted' => true],
    ], ['orientation' => 'horizontal', 'markerStyle' => 'dot', 'size' => 'sm', 'lineStyle' => 'dotted', 'color' => 'secondary']);

    $horizontalAvatarHtml = $renderTimeline([
        ['title' => 'Solicitante', 'date' => 'Maria Silva', 'markerHtml' => $avatarFn(['initials' => 'MS', 'size' => 'md', 'color' => 'primary', 'circle' => true, 'badge' => true, 'badgeColor' => 'success']), 'bodyHtml' => 'Abriu a requisição de compra.'],
        ['title' => 'Gestor', 'date' => 'João Souza', 'markerHtml' => $avatarFn(['initials' => 'JS', 'size' => 'md', 'color' => 'success', 'circle' => true, 'badge' => true, 'badgeColor' => 'success']), 'bodyHtml' => 'Aprovou em 12 Jan.'],
        ['title' => 'Financeiro', 'date' => 'Ana Lima', 'active' => true, 'markerHtml' => $avatarFn(['initials' => 'AL', 'size' => 'md', 'color' => 'warning', 'circle' => true]), 'bodyHtml' => 'Aguardando análise orçamentária.'],
        ['title' => 'Diretoria', 'date' => 'Pendente', 'muted' => true, 'markerHtml' => $avatarFn(['icon' => 'bi-person', 'size' => 'md', 'circle' => true]), 'bodyHtml' => 'Aprovação final acima de R$ 50 mil.'],
    ], ['orientation' => 'horizontal', 'size' => 'lg']);

    $horizontalScrollHtml = $renderTimeline([
        ['title' => 'Lead', 'date' => '02 Jan', 'color' => 'success'],
        ['title' => 'Qualificação', 'date' => '04 Jan', 'color' => 'success'],
        ['title' => 'Diagnóstico', 'date' => '09 Jan', 'color' => 'success'],
        ['title' => 'Proposta', 'date' => '15 Jan', 'color' => 'success'],
        ['title' => 'Negociação', 'date' => '21 Jan', 'active' => true, 'pulse' => true],
        ['title' => 'Contrato', 'date' => 'Previsto', 'muted' => true],
        ['title' => 'Onboarding', 'date' => 'Previsto', 'muted' => true],
        ['title' => 'Go-live', 'date' => 'Previsto', 'muted' => true],
    ], ['orientation' => 'horizontal', 'markerStyle' => 'solid', 'size' => 'sm', 'numbered' => true, 'extraClass' => '[&>li]:min-w-32']);

    $markerHtml = $renderTimeline([
        ['title' => 'Maria Silva', 'date' => 'há 2 min', 'href' => '#', 'markerHtml' => $avatarFn(['initials' => 'MS', 'size' => 'sm', 'color' => 'primary', 'circle' => true]), 'actionsHtml' => $badgeFn('primary', 'comentário'), 'bodyHtml' => 'Comentou na tarefa "Revisar layout".'],
        ['title' => 'João Souza', 'date' => 'há 10 min', 'href' => '#', 'markerHtml' => $avatarFn(['initials' => 'JS', 'size' => 'sm', 'color' => 'success', 'circle' => true]), 'actionsHtml' => $badgeFn('success', 'concluída'), 'bodyHtml' => 'Marcou a tarefa "Ajustar API" como concluída.'],
    ], ['compact' => true]);
@endphp

<x-ui.docs>
<div class="flex flex-col gap-10">
    <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
        <x-slot:description>
            Marcador simples (bolinha) ligado por uma linha vertical contínua; <code>date</code> aparece à direita do título.
        </x-slot:description>
        <x-ui.timeline>
            <x-ui.timeline.timeline-item title="Pedido criado" date="09:00">
                O pedido #4821 foi registrado no sistema.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Pagamento aprovado" date="09:12">
                O pagamento foi confirmado pela operadora.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Em separação" date="10:30">
                O pedido está sendo preparado no estoque.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Enviado" date="Hoje, 14:45" active>
                O pedido saiu para entrega.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Ícones e cores por item" :code="$iconsCode" :html="$iconsHtml">
        <x-slot:description>
            <code>icon</code> e <code>color</code> em cada <code>&lt;x-ui.timeline.timeline-item&gt;</code> sobrescrevem o padrão herdado do
            <code>&lt;x-ui.timeline&gt;</code> pai; <code>muted</code> esmaece etapas futuras/pendentes.
        </x-slot:description>
        <x-ui.timeline>
            <x-ui.timeline.timeline-item title="Conta criada" date="12 Jan" icon="bi-person-plus" color="primary">
                Cadastro concluído com sucesso.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="E-mail verificado" date="12 Jan" icon="bi-envelope-check" color="success">
                O endereço de e-mail foi confirmado.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Pagamento recusado" date="15 Jan" icon="bi-x-lg" color="danger">
                O cartão informado foi recusado pela operadora.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Assinatura pendente" date="Aguardando" icon="bi-hourglass-split" color="warning" muted>
                Aguardando nova tentativa de pagamento.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Estilos de marcador" :code="$markerStyleCode" :html="$markerStyleHtml">
        <x-slot:description>
            <code>marker-style="soft|solid|outline|dot"</code> no container (ou por item, que tem prioridade).
            <code>dot</code> é um ponto pequeno e ignora <code>icon</code>/numeração.
        </x-slot:description>
        <div class="grid w-full gap-6 sm:grid-cols-2 xl:grid-cols-4">
            @foreach (['soft', 'solid', 'outline', 'dot'] as $style)
                <div class="space-y-3">
                    <p class="m-0 font-mono text-xs text-muted-foreground">marker-style="{{ $style }}"</p>
                    <x-ui.timeline :marker-style="$style" size="sm" compact>
                        <x-ui.timeline.timeline-item title="Criado" date="09:00" icon="bi-plus-lg" />
                        <x-ui.timeline.timeline-item title="Aprovado" date="09:30" icon="bi-check-lg" color="success" />
                        <x-ui.timeline.timeline-item title="Em rota" date="10:00" icon="bi-truck" color="info" active />
                    </x-ui.timeline>
                </div>
            @endforeach
        </div>
    </x-ui.example>

    <x-ui.example title="Cor padrão do container" :code="$colorsCode" :html="$colorsHtml">
        <x-slot:description>
            <code>color</code> no <code>&lt;x-ui.timeline&gt;</code> é o padrão para todos os itens que não definem a própria cor.
        </x-slot:description>
        <x-ui.timeline color="secondary">
            <x-ui.timeline.timeline-item title="Build iniciado" date="14:02">Pipeline disparado pelo commit a1b2c3d.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Testes ok" date="14:05" color="success">312 testes passaram.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Deploy falhou" date="14:07" color="danger">Erro ao publicar no ambiente de produção.</x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Estilo da linha" :code="$lineStyleCode" :html="$lineStyleHtml">
        <x-slot:description>
            <code>line-style="solid|dashed|dotted"</code> — tracejada/pontilhada combina bem com etapas planejadas.
            <code>pulse</code> adiciona um halo animado no marcador da etapa em andamento.
        </x-slot:description>
        <div class="flex w-full flex-col gap-6">
            <x-ui.timeline line-style="dashed" color="info">
                <x-ui.timeline.timeline-item title="Planejado" date="Semana 1">Levantamento de requisitos.</x-ui.timeline.timeline-item>
                <x-ui.timeline.timeline-item title="Em andamento" date="Semana 2" active pulse>Desenvolvimento da funcionalidade.</x-ui.timeline.timeline-item>
                <x-ui.timeline.timeline-item title="Próximo" date="Semana 3" muted>Testes e homologação.</x-ui.timeline.timeline-item>
            </x-ui.timeline>

            <x-ui.timeline line-style="dotted" marker-style="dot" color="secondary">
                <x-ui.timeline.timeline-item title="Rascunho salvo" date="10:02" />
                <x-ui.timeline.timeline-item title="Enviado para revisão" date="10:40" />
                <x-ui.timeline.timeline-item title="Aguardando aprovação" date="—" muted />
            </x-ui.timeline>
        </div>
    </x-ui.example>

    <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
        <x-slot:description>
            <code>size="sm|md|lg"</code> ajusta marcador, textos e o espaço entre itens.
        </x-slot:description>
        <div class="flex w-full flex-col gap-6">
            <x-ui.timeline size="sm">
                <x-ui.timeline.timeline-item title="Pequeno" date="08:00">Marcadores e textos compactos.</x-ui.timeline.timeline-item>
                <x-ui.timeline.timeline-item title="Etapa 2" date="09:00">Ideal para listas densas.</x-ui.timeline.timeline-item>
            </x-ui.timeline>

            <x-ui.timeline size="lg">
                <x-ui.timeline.timeline-item title="Grande" date="08:00" icon="bi-star">Marcadores e textos maiores.</x-ui.timeline.timeline-item>
                <x-ui.timeline.timeline-item title="Etapa 2" date="09:00" icon="bi-flag">Bom para linhas do tempo com poucos itens.</x-ui.timeline.timeline-item>
            </x-ui.timeline>
        </div>
    </x-ui.example>

    <x-ui.example title="Compacto (log de atividade)" :code="$compactCode" :html="$compactHtml">
        <x-slot:description>
            <code>compact</code> reduz o espaço entre itens — combinado com <code>size="sm"</code> e
            <code>marker-style="dot"</code> vira uma lista densa de eventos.
        </x-slot:description>
        <x-ui.timeline compact size="sm" marker-style="dot">
            <x-ui.timeline.timeline-item title="10:02 — Login" />
            <x-ui.timeline.timeline-item title="10:04 — Relatório exportado" />
            <x-ui.timeline.timeline-item title="10:09 — Permissão alterada" color="warning" />
            <x-ui.timeline.timeline-item title="10:15 — Logout" muted />
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Numeração automática" :code="$numberedCode" :html="$numberedHtml">
        <x-slot:description>
            <code>numbered</code> numera os marcadores por contador CSS (sem índice em PHP); itens com <code>icon</code>
            mantêm o ícone.
        </x-slot:description>
        <x-ui.timeline numbered marker-style="solid" color="primary">
            <x-ui.timeline.timeline-item title="Dados da empresa" date="Concluído">
                CNPJ, razão social e endereço.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Documentos" date="Concluído">
                Contrato social e comprovante bancário.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Revisão" date="Em análise" active pulse>
                Nossa equipe está validando os documentos enviados.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Ativação" date="Pendente" muted>
                Liberação do acesso à plataforma.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Conteúdo em card" :code="$cardCode" :html="$cardHtml">
        <x-slot:description>
            <code>card</code> envolve o conteúdo em um card com faixa colorida na borda e realce no hover.
            <code>href</code> transforma o título em link e o slot <code>actions</code> recebe badges/botões à direita.
        </x-slot:description>
        <x-ui.timeline card color="primary">
            <x-ui.timeline.timeline-item title="Contrato assinado" date="12 Jan, 09:20" icon="bi-file-earmark-check" href="#">
                Assinatura digital concluída por ambas as partes.
                <x-slot:actions>
                    <x-ui.badge color="success" variant="soft" pill>Concluído</x-ui.badge>
                </x-slot:actions>
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Fatura emitida" date="12 Jan, 10:05" icon="bi-receipt" color="info" href="#">
                Fatura #2451 no valor de R$ 4.900,00.
                <x-slot:actions>
                    <x-ui.badge color="info" variant="soft" pill>Aberta</x-ui.badge>
                </x-slot:actions>
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Pagamento em atraso" date="20 Jan" icon="bi-exclamation-triangle" color="danger" active>
                A cobrança venceu há 3 dias.
                <x-slot:actions>
                    <x-ui.badge color="danger" variant="soft" pill>Vencida</x-ui.badge>
                </x-slot:actions>
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Coluna de datas" :code="$gutterCode" :html="$gutterHtml">
        <x-slot:description>
            <code>variant="gutter"</code> move a <code>date</code> para uma coluna própria à esquerda da linha, alinhando todas as
            datas — formato típico de changelog/histórico.
        </x-slot:description>
        <x-ui.timeline variant="gutter" marker-style="dot" color="secondary">
            <x-ui.timeline.timeline-item title="v2.4.0 lançada" date="12 Jan">
                Novo editor de relatórios e melhorias de performance.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="v2.3.2" date="28 Dez" color="warning">
                Correção do cálculo de impostos em notas canceladas.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="v2.3.0" date="03 Dez" color="info">
                Integração com o gateway de pagamentos.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Variante alternada" :code="$alternateCode" :html="$alternateHtml">
        <x-slot:description>
            <code>variant="alternate"</code> — itens alternam esquerda/direita ao redor de uma linha central (posição ímpar/par do
            item, sem contar em PHP). Abaixo de <code>sm</code> o layout colapsa para uma coluna só.
        </x-slot:description>
        <x-ui.timeline variant="alternate" color="primary">
            <x-ui.timeline.timeline-item title="Fundação da empresa" date="2019" icon="bi-flag">
                Início das operações com uma equipe de 3 pessoas.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Primeira rodada de investimento" date="2021" icon="bi-cash-coin" color="success">
                Captação de recursos para expansão.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Abertura de novo escritório" date="2023" icon="bi-building" color="info">
                Expansão para uma nova cidade.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Hoje" date="2026" icon="bi-star" active pulse>
                Continuamos crescendo.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Alternada em cards" :code="$alternateCardCode" :html="$alternateCardHtml">
        <x-slot:description>
            <code>card</code> também funciona na variante alternada (sem a faixa lateral, já que o lado varia).
        </x-slot:description>
        <x-ui.timeline variant="alternate" card marker-style="outline" color="secondary">
            <x-ui.timeline.timeline-item title="Kickoff" date="Jan" icon="bi-rocket">Alinhamento de escopo com o cliente.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Protótipo" date="Fev" icon="bi-pencil" color="info">Fluxos navegáveis aprovados.</x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Entrega" date="Mar" icon="bi-check2-circle" color="success" active>Go-live em produção.</x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Lado forçado" :code="$sideCode" :html="$sideHtml">
        <x-slot:description>
            <code>side="left|right"</code> em um item força o lado, ignorando a alternância automática — útil para agrupar etapas
            do mesmo lado.
        </x-slot:description>
        <x-ui.timeline variant="alternate">
            <x-ui.timeline.timeline-item title="Sempre à esquerda" date="Passo 1" side="left">
                Forçado com a prop "side", ignora a alternância automática.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Sempre à esquerda também" date="Passo 2" side="left">
                Dois itens seguidos do mesmo lado.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Agora à direita" date="Passo 3" side="right">
                Volta ao padrão manual.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Orientação horizontal" :code="$horizontalCode" :html="$horizontalHtml">
        <x-slot:description>
            <code>orientation="horizontal"</code> — a linha corre entre os marcadores e o conteúdo fica centralizado abaixo.
            Com <code>numbered</code> + <code>marker-style="solid"</code> vira um stepper de checkout.
        </x-slot:description>
        <div class="flex w-full flex-col gap-8">
            <x-ui.timeline orientation="horizontal">
                <x-ui.timeline.timeline-item title="Pedido" date="09:00" icon="bi-cart" />
                <x-ui.timeline.timeline-item title="Pago" date="09:12" icon="bi-credit-card" color="success" />
                <x-ui.timeline.timeline-item title="Enviado" date="10:30" icon="bi-truck" color="info" active pulse />
                <x-ui.timeline.timeline-item title="Entregue" date="Previsto" icon="bi-house-check" muted />
            </x-ui.timeline>

            <x-ui.timeline orientation="horizontal" numbered marker-style="solid" line-style="dashed">
                <x-ui.timeline.timeline-item title="Carrinho" />
                <x-ui.timeline.timeline-item title="Entrega" />
                <x-ui.timeline.timeline-item title="Pagamento" active />
                <x-ui.timeline.timeline-item title="Confirmação" muted />
            </x-ui.timeline>
        </div>
    </x-ui.example>

    <x-ui.example title="Horizontal com cards (rastreio)" :code="$horizontalCardCode" :html="$horizontalCardHtml">
        <x-slot:description>
            <code>card</code> + <code>orientation="horizontal"</code> — cada etapa vira um card sob o marcador; etapas futuras usam
            <code>marker-style="outline"</code> + <code>muted</code> e a atual ganha <code>pulse</code>.
        </x-slot:description>
        <x-ui.timeline orientation="horizontal" card marker-style="solid" size="sm">
            <x-ui.timeline.timeline-item title="Coletado" date="12 Jan, 08:15" icon="bi-box-seam" color="success">
                Centro de distribuição — São Paulo/SP.
                <x-slot:actions>
                    <x-ui.badge color="success" variant="soft" size="sm" pill>ok</x-ui.badge>
                </x-slot:actions>
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Em trânsito" date="13 Jan, 19:40" icon="bi-truck" color="info" active pulse>
                Saiu da unidade de Campinas/SP.
                <x-slot:actions>
                    <x-ui.badge color="info" variant="soft" size="sm" pill>agora</x-ui.badge>
                </x-slot:actions>
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Saiu para entrega" date="Previsto 14 Jan" icon="bi-geo-alt" marker-style="outline" muted>
                Última milha com o parceiro local.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Entregue" date="Previsto 15 Jan" icon="bi-house-check" marker-style="outline" muted>
                Assinatura do destinatário.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Horizontal com pontos (roadmap)" :code="$horizontalDotCode" :html="$horizontalDotHtml">
        <x-slot:description>
            <code>marker-style="dot"</code> + <code>line-style="dotted"</code> — formato leve para roadmaps e fases de projeto.
        </x-slot:description>
        <x-ui.timeline orientation="horizontal" marker-style="dot" size="sm" line-style="dotted" color="secondary">
            <x-ui.timeline.timeline-item title="Briefing" date="Sem. 1" color="success" />
            <x-ui.timeline.timeline-item title="Wireframe" date="Sem. 2" color="success" />
            <x-ui.timeline.timeline-item title="Protótipo" date="Sem. 3" color="primary" active pulse />
            <x-ui.timeline.timeline-item title="Testes" date="Sem. 4" muted />
            <x-ui.timeline.timeline-item title="Entrega" date="Sem. 5" muted />
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Horizontal com avatares (aprovação)" :code="$horizontalAvatarCode" :html="$horizontalAvatarHtml">
        <x-slot:description>
            Slot <code>marker</code> com <code>&lt;x-ui.avatar&gt;</code> — fluxo de aprovação com quem já assinou e quem falta.
        </x-slot:description>
        <x-ui.timeline orientation="horizontal" size="lg">
            <x-ui.timeline.timeline-item title="Solicitante" date="Maria Silva">
                <x-slot:marker>
                    <x-ui.avatar initials="MS" size="md" color="primary" circle badge badgeColor="success" />
                </x-slot:marker>
                Abriu a requisição de compra.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Gestor" date="João Souza">
                <x-slot:marker>
                    <x-ui.avatar initials="JS" size="md" color="success" circle badge badgeColor="success" />
                </x-slot:marker>
                Aprovou em 12 Jan.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Financeiro" date="Ana Lima" active>
                <x-slot:marker>
                    <x-ui.avatar initials="AL" size="md" color="warning" circle />
                </x-slot:marker>
                Aguardando análise orçamentária.
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="Diretoria" date="Pendente" muted>
                <x-slot:marker>
                    <x-ui.avatar icon="bi-person" size="md" circle />
                </x-slot:marker>
                Aprovação final acima de R$ 50 mil.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Horizontal com scroll (muitas etapas)" :code="$horizontalScrollCode" :html="$horizontalScrollHtml">
        <x-slot:description>
            O container já tem <code>overflow-x-auto</code>; <code>class="[&amp;&gt;li]:min-w-32"</code> impede os itens de encolher
            demais e ativa a rolada horizontal quando há muitas etapas.
        </x-slot:description>
        <x-ui.timeline orientation="horizontal" marker-style="solid" size="sm" numbered class="[&>li]:min-w-32">
            <x-ui.timeline.timeline-item title="Lead" date="02 Jan" color="success" />
            <x-ui.timeline.timeline-item title="Qualificação" date="04 Jan" color="success" />
            <x-ui.timeline.timeline-item title="Diagnóstico" date="09 Jan" color="success" />
            <x-ui.timeline.timeline-item title="Proposta" date="15 Jan" color="success" />
            <x-ui.timeline.timeline-item title="Negociação" date="21 Jan" active pulse />
            <x-ui.timeline.timeline-item title="Contrato" date="Previsto" muted />
            <x-ui.timeline.timeline-item title="Onboarding" date="Previsto" muted />
            <x-ui.timeline.timeline-item title="Go-live" date="Previsto" muted />
        </x-ui.timeline>
    </x-ui.example>

    <x-ui.example title="Marcador customizado (feed de atividades)" :code="$markerCode" :html="$markerHtml">
        <x-slot:description>
            O slot nomeado <code>marker</code> substitui completamente o marcador padrão — útil para avatares em feeds de atividade,
            combinado com <code>href</code> no título e o slot <code>actions</code>.
        </x-slot:description>
        <x-ui.timeline compact>
            <x-ui.timeline.timeline-item title="Maria Silva" date="há 2 min" href="#">
                <x-slot:marker>
                    <x-ui.avatar initials="MS" size="sm" color="primary" circle />
                </x-slot:marker>
                <x-slot:actions>
                    <x-ui.badge color="primary" variant="soft" pill>comentário</x-ui.badge>
                </x-slot:actions>
                Comentou na tarefa "Revisar layout".
            </x-ui.timeline.timeline-item>
            <x-ui.timeline.timeline-item title="João Souza" date="há 10 min" href="#">
                <x-slot:marker>
                    <x-ui.avatar initials="JS" size="sm" color="success" circle />
                </x-slot:marker>
                <x-slot:actions>
                    <x-ui.badge color="success" variant="soft" pill>concluída</x-ui.badge>
                </x-slot:actions>
                Marcou a tarefa "Ajustar API" como concluída.
            </x-ui.timeline.timeline-item>
        </x-ui.timeline>
    </x-ui.example>
</div>

    <x-ui.docs.api component="ui/timeline/timeline" title="x-ui.timeline" />
</x-ui.docs>
