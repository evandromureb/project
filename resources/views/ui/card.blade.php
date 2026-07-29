<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.card title="Projects Overview" subtitle="Últimos 30 dias">
            <p class="mb-0 text-sm text-muted-foreground">
                Acompanhe o progresso dos projetos ativos da equipe.
            </p>
        </x-ui.card>
        BLADE;

    $basicHtml = <<<'HTML'
        <div class="card">
            <div class="card-header">
                <div>
                    <h5 class="card-title">Projects Overview</h5>
                    <p class="mt-1 mb-0 text-sm text-muted-foreground">Últimos 30 dias</p>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">
                    Acompanhe o progresso dos projetos ativos da equipe.
                </p>
            </div>
        </div>
        HTML;

    $noHeaderCode = <<<'BLADE'
        <x-ui.card>
            <p class="mb-0 text-sm text-muted-foreground">
                Card sem título nem header — só o corpo.
            </p>
        </x-ui.card>
        BLADE;

    $noHeaderHtml = <<<'HTML'
        <div class="card">
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">
                    Card sem título nem header — só o corpo.
                </p>
            </div>
        </div>
        HTML;


    $customHeaderCode = <<<'BLADE'
        <x-ui.card>
            <x-slot:header>
                <div class="flex min-w-0 items-center gap-2">
                    <h5 class="card-title">Tarefas da sprint</h5>
                    <x-ui.badge color="primary" size="sm" pill>12</x-ui.badge>
                </div>
                <x-ui.button size="sm" variant="soft" color="primary">Nova</x-ui.button>
            </x-slot:header>

            <p class="mb-0 text-sm text-muted-foreground">
                O slot "header" substitui totalmente a prop "title".
            </p>
        </x-ui.card>
        BLADE;

    $customHeaderHtml = <<<'HTML'
        <div class="card">
            <div class="card-header">
                <div class="flex min-w-0 items-center gap-2">
                    <h5 class="card-title">Tarefas da sprint</h5>
                    <span class="badge badge-primary badge-sm rounded-full">12</span>
                </div>
                <button type="button" class="btn btn-sm btn-soft-primary">Nova</button>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">
                    O slot "header" substitui totalmente a prop "title".
                </p>
            </div>
        </div>
        HTML;

    $footerCode = <<<'BLADE'
        <x-ui.card title="Relatório mensal" subtitle="Março 2026">
            <p class="mb-0 text-sm text-muted-foreground">
                Receita, churn e novos clientes do período.
            </p>

            <x-slot:footer>
                <span class="text-xs text-muted-foreground">Atualizado há 2 h</span>
                <x-ui.button size="sm" color="primary">Ver detalhes</x-ui.button>
            </x-slot:footer>
        </x-ui.card>
        BLADE;

    $footerHtml = <<<'HTML'
        <div class="card">
            <div class="card-header">
                <div>
                    <h5 class="card-title">Relatório mensal</h5>
                    <p class="mt-1 mb-0 text-sm text-muted-foreground">Março 2026</p>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">
                    Receita, churn e novos clientes do período.
                </p>
            </div>
            <div class="card-footer">
                <span class="text-xs text-muted-foreground">Atualizado há 2 h</span>
                <button type="button" class="btn btn-sm btn-primary">Ver detalhes</button>
            </div>
        </div>
        HTML;


    $classesCode = <<<'BLADE'
        <x-ui.card
            title="Card compacto"
            headerClass="bg-primary/5"
            bodyClass="p-3"
            footerClass="justify-end bg-muted"
        >
            <p class="mb-0 text-sm text-muted-foreground">
                "headerClass", "bodyClass" e "footerClass" acrescentam
                classes extras às áreas internas do card.
            </p>

            <x-slot:footer>
                <x-ui.button size="sm" variant="soft" color="primary">Fechar</x-ui.button>
            </x-slot:footer>
        </x-ui.card>
        BLADE;

    $classesHtml = <<<'HTML'
        <div class="card">
            <div class="card-header bg-primary/5">
                <div>
                    <h5 class="card-title">Card compacto</h5>
                </div>
            </div>
            <div class="card-body p-3">
                <p class="mb-0 text-sm text-muted-foreground">
                    "headerClass", "bodyClass" e "footerClass" acrescentam
                    classes extras às áreas internas do card.
                </p>
            </div>
            <div class="card-footer justify-end bg-muted">
                <button type="button" class="btn btn-sm btn-soft-primary">Fechar</button>
            </div>
        </div>
        HTML;

    $subtitleCode = <<<'BLADE'
        <x-ui.card title="Card title" subtitle="Card subtitle">
            <p class="mb-0 text-sm text-muted-foreground">
                Texto do card, logo abaixo do título e do subtítulo.
            </p>
        </x-ui.card>
        BLADE;

    $subtitleHtml = <<<'HTML'
        <div class="card">
            <div class="card-header">
                <div>
                    <h5 class="card-title">Card title</h5>
                    <p class="mt-1 mb-0 text-sm text-muted-foreground">Card subtitle</p>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">
                    Texto do card, logo abaixo do título e do subtítulo.
                </p>
            </div>
        </div>
        HTML;


    $imageTopCode = <<<'BLADE'
        <x-ui.card
            title="Vista da montanha"
            subtitle="Fotografia · Natureza"
            image="https://picsum.photos/seed/card-top/600/300"
            imageHeight="h-40"
        >
            <p class="mb-0 text-sm text-muted-foreground">
                Imagem no topo do card (padrão, imagePosition="top").
            </p>
        </x-ui.card>
        BLADE;

    $imageTopHtml = <<<'HTML'
        <div class="card">
            <img
                src="https://picsum.photos/seed/card-top/600/300"
                alt="Vista da montanha"
                class="w-full h-40 rounded-t-md object-cover"
            >
            <div class="card-header">
                <div>
                    <h5 class="card-title">Vista da montanha</h5>
                    <p class="mt-1 mb-0 text-sm text-muted-foreground">Fotografia · Natureza</p>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">
                    Imagem no topo do card (padrão, imagePosition="top").
                </p>
            </div>
        </div>
        HTML;


    $imageBottomCode = <<<'BLADE'
        <x-ui.card
            title="Vista do lago"
            image="https://picsum.photos/seed/card-bottom/600/300"
            imagePosition="bottom"
            imageHeight="h-40"
        >
            <p class="mb-0 text-sm text-muted-foreground">
                Imagem depois do conteúdo, com imagePosition="bottom".
            </p>
        </x-ui.card>
        BLADE;

    $imageBottomHtml = <<<'HTML'
        <div class="card">
            <div class="card-header">
                <div>
                    <h5 class="card-title">Vista do lago</h5>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">
                    Imagem depois do conteúdo, com imagePosition="bottom".
                </p>
            </div>
            <img
                src="https://picsum.photos/seed/card-bottom/600/300"
                alt="Vista do lago"
                class="w-full h-40 rounded-b-md object-cover"
            >
        </div>
        HTML;

    $imageOverlayCode = <<<'BLADE'
        <x-ui.card
            title="Trilha na floresta"
            subtitle="Publicado há 3 dias"
            image="https://picsum.photos/seed/card-overlay/600/350"
            imagePosition="overlay"
            imageHeight="h-64"
        />
        BLADE;

    $imageOverlayHtml = <<<'HTML'
        <div class="card">
            <div class="relative">
                <img
                    src="https://picsum.photos/seed/card-overlay/600/350"
                    alt="Trilha na floresta"
                    class="w-full h-64 rounded-md object-cover"
                >
                <div class="absolute inset-0 flex flex-col justify-end rounded-md bg-gradient-to-t from-black/70 to-transparent p-5">
                    <h5 class="card-title text-white">Trilha na floresta</h5>
                    <p class="mt-1 mb-0 text-sm text-white/80">Publicado há 3 dias</p>
                </div>
            </div>
        </div>
        HTML;


    $horizontalCode = <<<'BLADE'
        <x-ui.card
            title="Camisa esportiva"
            subtitle="R$ 129,90"
            image="https://picsum.photos/seed/card-horizontal/300/300"
            horizontal
        >
            <p class="mb-3 text-sm text-muted-foreground">
                Tecido dry-fit, disponível em 4 cores.
            </p>
            <div class="flex items-center gap-2">
                <x-ui.badge color="success" size="sm" variant="soft">Em estoque</x-ui.badge>
                <x-ui.button size="sm" color="primary">Comprar</x-ui.button>
            </div>
        </x-ui.card>
        BLADE;

    $horizontalHtml = <<<'HTML'
        <div class="card flex">
            <img
                src="https://picsum.photos/seed/card-horizontal/300/300"
                alt="Camisa esportiva"
                class="w-1/3 shrink-0 rounded-l-md object-cover"
            >
            <div class="flex min-w-0 flex-1 flex-col">
                <div class="card-header">
                    <div>
                        <h5 class="card-title">Camisa esportiva</h5>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">R$ 129,90</p>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-3 text-sm text-muted-foreground">
                        Tecido dry-fit, disponível em 4 cores.
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="badge badge-soft-success badge-sm">Em estoque</span>
                        <button type="button" class="btn btn-sm btn-primary">Comprar</button>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $colorCode = <<<'BLADE'
        <x-ui.card title="Primary" color="primary">
            <p class="mb-0 text-sm">Fundo sólido com texto contrastante.</p>
        </x-ui.card>
        <x-ui.card title="Success" color="success">
            <p class="mb-0 text-sm">Ideal para confirmações e status positivos.</p>
        </x-ui.card>
        <x-ui.card title="Warning" color="warning">
            <p class="mb-0 text-sm">Chama atenção sem parecer erro.</p>
        </x-ui.card>
        <x-ui.card title="Danger" color="danger">
            <p class="mb-0 text-sm">Use para alertas críticos.</p>
        </x-ui.card>
        BLADE;

    $colorHtml = <<<'HTML'
        <div class="card border-primary bg-primary text-primary-foreground">
            <div class="card-header">
                <div><h5 class="card-title">Primary</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm">Fundo sólido com texto contrastante.</p>
            </div>
        </div>
        <div class="card border-success bg-success text-success-foreground">
            <div class="card-header">
                <div><h5 class="card-title">Success</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm">Ideal para confirmações e status positivos.</p>
            </div>
        </div>
        <div class="card border-warning bg-warning text-warning-foreground">
            <div class="card-header">
                <div><h5 class="card-title">Warning</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm">Chama atenção sem parecer erro.</p>
            </div>
        </div>
        <div class="card border-danger bg-danger text-danger-foreground">
            <div class="card-header">
                <div><h5 class="card-title">Danger</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm">Use para alertas críticos.</p>
            </div>
        </div>
        HTML;


    $softColorCode = <<<'BLADE'
        <x-ui.card title="Primary soft" color="primary" variant="soft">
            <p class="mb-0 text-sm text-muted-foreground">Fundo suave com borda leve.</p>
        </x-ui.card>
        <x-ui.card title="Info soft" color="info" variant="soft">
            <p class="mb-0 text-sm text-muted-foreground">Bom para dicas e novidades.</p>
        </x-ui.card>
        <x-ui.card title="Success soft" color="success" variant="soft">
            <p class="mb-0 text-sm text-muted-foreground">Menos agressivo que o solid.</p>
        </x-ui.card>
        <x-ui.card title="Danger soft" color="danger" variant="soft">
            <p class="mb-0 text-sm text-muted-foreground">Aviso sem alarme total.</p>
        </x-ui.card>
        BLADE;

    $softColorHtml = <<<'HTML'
        <div class="card border-primary/25 bg-primary/10 text-primary">
            <div class="card-header">
                <div><h5 class="card-title">Primary soft</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">Fundo suave com borda leve.</p>
            </div>
        </div>
        <div class="card border-info/25 bg-info/10 text-info">
            <div class="card-header">
                <div><h5 class="card-title">Info soft</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">Bom para dicas e novidades.</p>
            </div>
        </div>
        <div class="card border-success/25 bg-success/10 text-success">
            <div class="card-header">
                <div><h5 class="card-title">Success soft</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">Menos agressivo que o solid.</p>
            </div>
        </div>
        <div class="card border-danger/25 bg-danger/10 text-danger">
            <div class="card-header">
                <div><h5 class="card-title">Danger soft</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">Aviso sem alarme total.</p>
            </div>
        </div>
        HTML;


    $outlineColorCode = <<<'BLADE'
        <x-ui.card title="Primary outline" color="primary" variant="outline">
            <p class="mb-0 text-sm text-muted-foreground">Borda colorida, fundo do card.</p>
        </x-ui.card>
        <x-ui.card title="Warning outline" color="warning" variant="outline">
            <p class="mb-0 text-sm text-muted-foreground">Destaque só pela borda.</p>
        </x-ui.card>
        BLADE;

    $outlineColorHtml = <<<'HTML'
        <div class="card border-primary bg-card text-primary">
            <div class="card-header">
                <div><h5 class="card-title">Primary outline</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">Borda colorida, fundo do card.</p>
            </div>
        </div>
        <div class="card border-warning bg-card text-warning">
            <div class="card-header">
                <div><h5 class="card-title">Warning outline</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">Destaque só pela borda.</p>
            </div>
        </div>
        HTML;

    $borderAccentCode = <<<'BLADE'
        <x-ui.card title="Em andamento" borderAccent="warning">
            <p class="mb-0 text-sm text-muted-foreground">75% concluído.</p>
        </x-ui.card>
        <x-ui.card title="Concluído" borderAccent="success">
            <p class="mb-0 text-sm text-muted-foreground">100% concluído.</p>
        </x-ui.card>
        <x-ui.card title="Bloqueado" borderAccent="danger">
            <p class="mb-0 text-sm text-muted-foreground">Aguardando revisão.</p>
        </x-ui.card>
        <x-ui.card title="Novo" borderAccent="info">
            <p class="mb-0 text-sm text-muted-foreground">Criado hoje.</p>
        </x-ui.card>
        BLADE;

    $borderAccentHtml = <<<'HTML'
        <div class="card border-l-4 border-l-warning">
            <div class="card-header">
                <div><h5 class="card-title">Em andamento</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">75% concluído.</p>
            </div>
        </div>
        <div class="card border-l-4 border-l-success">
            <div class="card-header">
                <div><h5 class="card-title">Concluído</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">100% concluído.</p>
            </div>
        </div>
        <div class="card border-l-4 border-l-danger">
            <div class="card-header">
                <div><h5 class="card-title">Bloqueado</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">Aguardando revisão.</p>
            </div>
        </div>
        <div class="card border-l-4 border-l-info">
            <div class="card-header">
                <div><h5 class="card-title">Novo</h5></div>
            </div>
            <div class="card-body">
                <p class="mb-0 text-sm text-muted-foreground">Criado hoje.</p>
            </div>
        </div>
        HTML;


    $statsCode = <<<'BLADE'
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <x-ui.card bodyClass="flex items-start justify-between gap-3">
                <div>
                    <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Receita</p>
                    <p class="mb-0 text-2xl font-semibold tracking-tight">R$ 48,2k</p>
                    <p class="mt-1 mb-0 text-xs text-success">+12,4% vs mês anterior</p>
                </div>
                <span class="flex size-10 items-center justify-center rounded-md bg-primary/15 text-primary">
                    <i class="bi bi-currency-dollar text-lg" aria-hidden="true"></i>
                </span>
            </x-ui.card>

            <x-ui.card bodyClass="flex items-start justify-between gap-3">
                <div>
                    <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Usuários</p>
                    <p class="mb-0 text-2xl font-semibold tracking-tight">2.847</p>
                    <p class="mt-1 mb-0 text-xs text-success">+8,1% vs mês anterior</p>
                </div>
                <span class="flex size-10 items-center justify-center rounded-md bg-info/15 text-info">
                    <i class="bi bi-people text-lg" aria-hidden="true"></i>
                </span>
            </x-ui.card>

            <x-ui.card bodyClass="flex items-start justify-between gap-3" borderAccent="danger">
                <div>
                    <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Churn</p>
                    <p class="mb-0 text-2xl font-semibold tracking-tight">2,4%</p>
                    <p class="mt-1 mb-0 text-xs text-danger">+0,3% vs mês anterior</p>
                </div>
                <span class="flex size-10 items-center justify-center rounded-md bg-danger/15 text-danger">
                    <i class="bi bi-graph-down-arrow text-lg" aria-hidden="true"></i>
                </span>
            </x-ui.card>
        </div>
        BLADE;

    $statsHtml = <<<'HTML'
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="card">
                <div class="card-body flex items-start justify-between gap-3">
                    <div>
                        <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Receita</p>
                        <p class="mb-0 text-2xl font-semibold tracking-tight">R$ 48,2k</p>
                        <p class="mt-1 mb-0 text-xs text-success">+12,4% vs mês anterior</p>
                    </div>
                    <span class="flex size-10 items-center justify-center rounded-md bg-primary/15 text-primary">
                        <i class="bi bi-currency-dollar text-lg" aria-hidden="true"></i>
                    </span>
                </div>
            </div>

            <div class="card">
                <div class="card-body flex items-start justify-between gap-3">
                    <div>
                        <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Usuários</p>
                        <p class="mb-0 text-2xl font-semibold tracking-tight">2.847</p>
                        <p class="mt-1 mb-0 text-xs text-success">+8,1% vs mês anterior</p>
                    </div>
                    <span class="flex size-10 items-center justify-center rounded-md bg-info/15 text-info">
                        <i class="bi bi-people text-lg" aria-hidden="true"></i>
                    </span>
                </div>
            </div>

            <div class="card border-l-4 border-l-danger">
                <div class="card-body flex items-start justify-between gap-3">
                    <div>
                        <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Churn</p>
                        <p class="mb-0 text-2xl font-semibold tracking-tight">2,4%</p>
                        <p class="mt-1 mb-0 text-xs text-danger">+0,3% vs mês anterior</p>
                    </div>
                    <span class="flex size-10 items-center justify-center rounded-md bg-danger/15 text-danger">
                        <i class="bi bi-graph-down-arrow text-lg" aria-hidden="true"></i>
                    </span>
                </div>
            </div>
        </div>
        HTML;

    $profileCode = <<<'BLADE'
        <x-ui.card>
            <div class="flex items-center gap-4">
                <x-ui.avatar initials="AL" color="primary" circle size="lg" />
                <div class="min-w-0 flex-1">
                    <h5 class="card-title">Ana Lima</h5>
                    <p class="mb-0 text-sm text-muted-foreground">Product Designer · São Paulo</p>
                </div>
                <x-ui.badge color="success" size="sm" variant="soft" dot>Online</x-ui.badge>
            </div>

            <x-slot:footer>
                <x-ui.button size="sm" variant="soft" color="secondary">Mensagem</x-ui.button>
                <x-ui.button size="sm" color="primary">Ver perfil</x-ui.button>
            </x-slot:footer>
        </x-ui.card>
        BLADE;

    $profileHtml = <<<'HTML'
        <div class="card">
            <div class="card-body">
                <div class="flex items-center gap-4">
                    <div class="avatar avatar-lg avatar-circle bg-primary text-primary-foreground">AL</div>
                    <div class="min-w-0 flex-1">
                        <h5 class="card-title">Ana Lima</h5>
                        <p class="mb-0 text-sm text-muted-foreground">Product Designer · São Paulo</p>
                    </div>
                    <span class="badge badge-soft-success badge-sm">Online</span>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-soft-secondary">Mensagem</button>
                <button type="button" class="btn btn-sm btn-primary">Ver perfil</button>
            </div>
        </div>
        HTML;

    $ribbonCode = <<<'BLADE'
        <x-ui.card title="Plano anual" class="relative overflow-hidden">
            <x-ui.ribbon shape="diagonal" color="success">-20%</x-ui.ribbon>
            <p class="mb-3 text-sm text-muted-foreground">
                Economize dois meses com o pagamento anual.
            </p>
            <p class="mb-0 text-2xl font-semibold tracking-tight">R$ 79<span class="text-sm font-normal text-muted-foreground">/mês</span></p>
        </x-ui.card>
        BLADE;

    $ribbonHtml = <<<'HTML'
        <div class="card relative overflow-hidden">
            <div class="card-header">
                <div><h5 class="card-title">Plano anual</h5></div>
            </div>
            <div class="card-body">
                <div class="ribbon ribbon-diagonal ribbon-success">-20%</div>
                <p class="mb-3 text-sm text-muted-foreground">
                    Economize dois meses com o pagamento anual.
                </p>
                <p class="mb-0 text-2xl font-semibold tracking-tight">R$ 79<span class="text-sm font-normal text-muted-foreground">/mês</span></p>
            </div>
        </div>
        HTML;

    $stretchedLinkCode = <<<'BLADE'
        <x-ui.card title="Relatório de vendas" href="#" class="transition-shadow hover:shadow-md">
            <p class="mb-0 text-sm text-muted-foreground">
                O card inteiro é clicável. Um botão real ainda funciona por cima —
                ele só precisa de class="relative z-[2]".
            </p>

            <x-slot:footer>
                <button type="button" class="btn btn-sm btn-soft-primary relative z-[2]" onclick="alert('Botão real, não o link do card')">
                    Ação do botão
                </button>
            </x-slot:footer>
        </x-ui.card>
        BLADE;

    $stretchedLinkHtml = <<<'HTML'
        <div class="card relative transition-shadow hover:shadow-md">
            <a href="#" class="absolute inset-0 z-[1] rounded-[inherit]" aria-label="Relatório de vendas"></a>
            <div class="card-header">
                <div><h5 class="card-title">Relatório de vendas</h5></div>
            </div>
            <div class="card-body relative z-[2]">
                <p class="mb-0 text-sm text-muted-foreground">
                    O card inteiro é clicável. Um botão real ainda funciona por cima —
                    ele só precisa de class="relative z-[2]".
                </p>
            </div>
            <div class="card-footer relative z-[2]">
                <button type="button" class="btn btn-sm btn-soft-primary relative z-[2]" onclick="alert('Botão real, não o link do card')">
                    Ação do botão
                </button>
            </div>
        </div>
        HTML;


    $centeredCode = <<<'BLADE'
        <x-ui.card bodyClass="text-center" color="primary" variant="soft">
            <span class="mx-auto mb-3 flex size-12 items-center justify-center rounded-full bg-primary/15 text-primary">
                <i class="bi bi-rocket-takeoff text-xl" aria-hidden="true"></i>
            </span>
            <h5 class="card-title">Assinatura Pro</h5>
            <p class="mt-1 text-sm text-muted-foreground">Todos os recursos, sem limites.</p>
            <x-ui.button color="primary" class="mt-4 justify-center">Assinar agora</x-ui.button>
        </x-ui.card>
        BLADE;

    $centeredHtml = <<<'HTML'
        <div class="card border-primary/25 bg-primary/10 text-primary">
            <div class="card-body text-center">
                <span class="mx-auto mb-3 flex size-12 items-center justify-center rounded-full bg-primary/15 text-primary">
                    <i class="bi bi-rocket-takeoff text-xl" aria-hidden="true"></i>
                </span>
                <h5 class="card-title">Assinatura Pro</h5>
                <p class="mt-1 text-sm text-muted-foreground">Todos os recursos, sem limites.</p>
                <button type="button" class="btn btn-primary mt-4 justify-center">Assinar agora</button>
            </div>
        </div>
        HTML;

    $loaderCode = <<<'BLADE'
        <x-ui.card title="Carregando dados">
            <div class="flex items-center gap-3 text-sm text-muted-foreground">
                <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent"></span>
                Buscando as informações mais recentes...
            </div>
        </x-ui.card>
        BLADE;

    $loaderHtml = <<<'HTML'
        <div class="card">
            <div class="card-header">
                <div><h5 class="card-title">Carregando dados</h5></div>
            </div>
            <div class="card-body">
                <div class="flex items-center gap-3 text-sm text-muted-foreground">
                    <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent"></span>
                    Buscando as informações mais recentes...
                </div>
            </div>
        </div>
        HTML;


    $groupCode = <<<'BLADE'
        <div class="flex flex-col gap-4 sm:flex-row">
            <x-ui.card title="Básico" class="flex-1" bodyClass="flex flex-col">
                <p class="text-3xl font-semibold tracking-tight">R$ 0</p>
                <p class="mb-4 text-sm text-muted-foreground">Para experimentar.</p>
                <ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
                    <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> 1 projeto</li>
                    <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Suporte por e-mail</li>
                </ul>
                <x-ui.button variant="outline" color="primary" block>Começar</x-ui.button>
            </x-ui.card>

            <x-ui.card title="Pro" class="flex-1" color="primary" variant="soft" bodyClass="flex flex-col">
                <div class="mb-1 flex items-center gap-2">
                    <p class="mb-0 text-3xl font-semibold tracking-tight">R$ 49</p>
                    <x-ui.badge color="primary" size="sm" pill>Popular</x-ui.badge>
                </div>
                <p class="mb-4 text-sm text-muted-foreground">Para times em crescimento.</p>
                <ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
                    <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Projetos ilimitados</li>
                    <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Suporte prioritário</li>
                </ul>
                <x-ui.button color="primary" block>Assinar Pro</x-ui.button>
            </x-ui.card>

            <x-ui.card title="Enterprise" class="flex-1" bodyClass="flex flex-col">
                <p class="text-3xl font-semibold tracking-tight">Custom</p>
                <p class="mb-4 text-sm text-muted-foreground">Para grandes empresas.</p>
                <ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
                    <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> SSO e auditoria</li>
                    <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Gerente dedicado</li>
                </ul>
                <x-ui.button variant="outline" color="secondary" block>Falar com vendas</x-ui.button>
            </x-ui.card>
        </div>
        BLADE;

    $groupHtml = <<<'HTML'
        <div class="flex flex-col gap-4 sm:flex-row">
            <div class="card flex-1">
                <div class="card-header">
                    <div><h5 class="card-title">Básico</h5></div>
                </div>
                <div class="card-body flex flex-col">
                    <p class="text-3xl font-semibold tracking-tight">R$ 0</p>
                    <p class="mb-4 text-sm text-muted-foreground">Para experimentar.</p>
                    <ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> 1 projeto</li>
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Suporte por e-mail</li>
                    </ul>
                    <button type="button" class="btn btn-outline-primary w-full">Começar</button>
                </div>
            </div>

            <div class="card flex-1 border-primary/25 bg-primary/10 text-primary">
                <div class="card-header">
                    <div><h5 class="card-title">Pro</h5></div>
                </div>
                <div class="card-body flex flex-col">
                    <div class="mb-1 flex items-center gap-2">
                        <p class="mb-0 text-3xl font-semibold tracking-tight">R$ 49</p>
                        <span class="badge badge-primary badge-sm rounded-full">Popular</span>
                    </div>
                    <p class="mb-4 text-sm text-muted-foreground">Para times em crescimento.</p>
                    <ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Projetos ilimitados</li>
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Suporte prioritário</li>
                    </ul>
                    <button type="button" class="btn btn-primary w-full">Assinar Pro</button>
                </div>
            </div>

            <div class="card flex-1">
                <div class="card-header">
                    <div><h5 class="card-title">Enterprise</h5></div>
                </div>
                <div class="card-body flex flex-col">
                    <p class="text-3xl font-semibold tracking-tight">Custom</p>
                    <p class="mb-4 text-sm text-muted-foreground">Para grandes empresas.</p>
                    <ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> SSO e auditoria</li>
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Gerente dedicado</li>
                    </ul>
                    <button type="button" class="btn btn-outline-secondary w-full">Falar com vendas</button>
                </div>
            </div>
        </div>
        HTML;

    $gridCode = <<<'BLADE'
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <x-ui.card title="Documentação" bodyClass="space-y-2">
                <p class="mb-0 text-sm text-muted-foreground">Guias e referências da API.</p>
                <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:underline">
                    Abrir <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </a>
            </x-ui.card>
            <x-ui.card title="Integrações" bodyClass="space-y-2">
                <p class="mb-0 text-sm text-muted-foreground">Conecte Slack, GitHub e mais.</p>
                <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:underline">
                    Explorar <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </a>
            </x-ui.card>
            <x-ui.card title="Changelog" bodyClass="space-y-2">
                <p class="mb-0 text-sm text-muted-foreground">O que mudou nas últimas releases.</p>
                <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:underline">
                    Ver notas <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </a>
            </x-ui.card>
        </div>
        BLADE;

    $gridHtml = <<<'HTML'
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="card">
                <div class="card-header">
                    <div><h5 class="card-title">Documentação</h5></div>
                </div>
                <div class="card-body space-y-2">
                    <p class="mb-0 text-sm text-muted-foreground">Guias e referências da API.</p>
                    <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:underline">
                        Abrir <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div><h5 class="card-title">Integrações</h5></div>
                </div>
                <div class="card-body space-y-2">
                    <p class="mb-0 text-sm text-muted-foreground">Conecte Slack, GitHub e mais.</p>
                    <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:underline">
                        Explorar <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div><h5 class="card-title">Changelog</h5></div>
                </div>
                <div class="card-body space-y-2">
                    <p class="mb-0 text-sm text-muted-foreground">O que mudou nas últimas releases.</p>
                    <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:underline">
                        Ver notas <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        HTML;

    $masonryCode = <<<'BLADE'
        <div class="columns-1 gap-4 sm:columns-2 lg:columns-3 [&>*]:mb-4 [&>*]:break-inside-avoid">
            <x-ui.card title="Card curto">
                <p class="mb-0 text-sm text-muted-foreground">Uma linha de conteúdo.</p>
            </x-ui.card>
            <x-ui.card title="Card alto">
                <p class="mb-0 text-sm text-muted-foreground">
                    Este card tem bem mais conteúdo, então fica mais alto que os
                    vizinhos — o layout de colunas do CSS reflui os próximos
                    cards para preencher o espaço, criando o efeito "masonry"
                    sem nenhum JavaScript.
                </p>
            </x-ui.card>
            <x-ui.card title="Outro card curto" color="info" variant="soft">
                <p class="mb-0 text-sm text-muted-foreground">Conteúdo breve com cor soft.</p>
            </x-ui.card>
            <x-ui.card
                title="Com imagem"
                image="https://picsum.photos/seed/card-masonry/600/200"
                imageHeight="h-28"
            >
                <p class="mb-0 text-sm text-muted-foreground">Mistura bem no masonry.</p>
            </x-ui.card>
        </div>
        BLADE;

    $masonryHtml = <<<'HTML'
        <div class="columns-1 gap-4 sm:columns-2 lg:columns-3 [&>*]:mb-4 [&>*]:break-inside-avoid">
            <div class="card">
                <div class="card-header">
                    <div><h5 class="card-title">Card curto</h5></div>
                </div>
                <div class="card-body">
                    <p class="mb-0 text-sm text-muted-foreground">Uma linha de conteúdo.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div><h5 class="card-title">Card alto</h5></div>
                </div>
                <div class="card-body">
                    <p class="mb-0 text-sm text-muted-foreground">
                        Este card tem bem mais conteúdo, então fica mais alto que os
                        vizinhos — o layout de colunas do CSS reflui os próximos
                        cards para preencher o espaço, criando o efeito "masonry"
                        sem nenhum JavaScript.
                    </p>
                </div>
            </div>
            <div class="card border-info/25 bg-info/10 text-info">
                <div class="card-header">
                    <div><h5 class="card-title">Outro card curto</h5></div>
                </div>
                <div class="card-body">
                    <p class="mb-0 text-sm text-muted-foreground">Conteúdo breve com cor soft.</p>
                </div>
            </div>
            <div class="card">
                <img
                    src="https://picsum.photos/seed/card-masonry/600/200"
                    alt="Com imagem"
                    class="w-full h-28 rounded-t-md object-cover"
                >
                <div class="card-header">
                    <div><h5 class="card-title">Com imagem</h5></div>
                </div>
                <div class="card-body">
                    <p class="mb-0 text-sm text-muted-foreground">Mistura bem no masonry.</p>
                </div>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-ui.card&gt;</code> é um contêiner genérico com header, body e footer
            opcionais. Suporta subtítulo, imagem (topo, base ou overlay), layout horizontal, cor de fundo
            nas variantes <code>solid</code>, <code>soft</code> e <code>outline</code>, borda de destaque
            e link esticado. Grupos, grids, stats e pricing são composição com utilities do Tailwind e
            outros componentes da UI.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Use <code>title</code> e, opcionalmente, <code>subtitle</code> para o header padrão.
            </x-slot:description>
            <x-ui.card title="Projects Overview" subtitle="Últimos 30 dias" class="w-full">
                <p class="mb-0 text-sm text-muted-foreground">
                    Acompanhe o progresso dos projetos ativos da equipe.
                </p>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Sem header" :code="$noHeaderCode" :html="$noHeaderHtml">
            <x-slot:description>
                Sem <code>title</code> nem slot <code>header</code>, o card renderiza só o corpo.
            </x-slot:description>
            <x-ui.card class="w-full">
                <p class="mb-0 text-sm text-muted-foreground">
                    Card sem título nem header — só o corpo.
                </p>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Subtítulo" :code="$subtitleCode" :html="$subtitleHtml">
            <x-slot:description>
                <code>subtitle</code> aparece logo abaixo do título, em texto discreto.
            </x-slot:description>
            <x-ui.card title="Card title" subtitle="Card subtitle" class="w-full">
                <p class="mb-0 text-sm text-muted-foreground">
                    Texto do card, logo abaixo do título e do subtítulo.
                </p>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Header customizado" :code="$customHeaderCode" :html="$customHeaderHtml">
            <x-slot:description>
                O slot <code>header</code> substitui <code>title</code> — combine badge, botão, etc.
            </x-slot:description>
            <x-ui.card class="w-full">
                <x-slot:header>
                    <div class="flex min-w-0 items-center gap-2">
                        <h5 class="card-title">Tarefas da sprint</h5>
                        <x-ui.badge color="primary" size="sm" pill>12</x-ui.badge>
                    </div>
                    <x-ui.button size="sm" variant="soft" color="primary">Nova</x-ui.button>
                </x-slot:header>

                <p class="mb-0 text-sm text-muted-foreground">
                    O slot "header" substitui totalmente a prop "title".
                </p>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Com footer" :code="$footerCode" :html="$footerHtml">
            <x-slot:description>
                O slot <code>footer</code> adiciona uma área inferior ao card.
            </x-slot:description>
            <x-ui.card title="Relatório mensal" subtitle="Março 2026" class="w-full">
                <p class="mb-0 text-sm text-muted-foreground">
                    Receita, churn e novos clientes do período.
                </p>

                <x-slot:footer>
                    <span class="text-xs text-muted-foreground">Atualizado há 2 h</span>
                    <x-ui.button size="sm" color="primary">Ver detalhes</x-ui.button>
                </x-slot:footer>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Classes customizadas" :code="$classesCode" :html="$classesHtml">
            <x-slot:description>
                <code>headerClass</code>, <code>bodyClass</code> e <code>footerClass</code> acrescentam classes extras.
            </x-slot:description>
            <x-ui.card
                title="Card compacto"
                headerClass="bg-primary/5"
                bodyClass="p-3"
                footerClass="justify-end bg-muted"
                class="w-full"
            >
                <p class="mb-0 text-sm text-muted-foreground">
                    "headerClass", "bodyClass" e "footerClass" acrescentam
                    classes extras às áreas internas do card.
                </p>

                <x-slot:footer>
                    <x-ui.button size="sm" variant="soft" color="primary">Fechar</x-ui.button>
                </x-slot:footer>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Cores sólidas" :code="$colorCode" :html="$colorHtml">
            <x-slot:description>
                <code>color</code> com <code>variant="solid"</code> (padrão) preenche o card com o token do tema.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">
                <x-ui.card title="Primary" color="primary">
                    <p class="mb-0 text-sm">Fundo sólido com texto contrastante.</p>
                </x-ui.card>
                <x-ui.card title="Success" color="success">
                    <p class="mb-0 text-sm">Ideal para confirmações e status positivos.</p>
                </x-ui.card>
                <x-ui.card title="Warning" color="warning">
                    <p class="mb-0 text-sm">Chama atenção sem parecer erro.</p>
                </x-ui.card>
                <x-ui.card title="Danger" color="danger">
                    <p class="mb-0 text-sm">Use para alertas críticos.</p>
                </x-ui.card>
            </div>
        </x-ui.example>

        <x-ui.example title="Cores soft" :code="$softColorCode" :html="$softColorHtml">
            <x-slot:description>
                <code>variant="soft"</code> — fundo suave, bom para dashboards e highlights discretos.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">
                <x-ui.card title="Primary soft" color="primary" variant="soft">
                    <p class="mb-0 text-sm text-muted-foreground">Fundo suave com borda leve.</p>
                </x-ui.card>
                <x-ui.card title="Info soft" color="info" variant="soft">
                    <p class="mb-0 text-sm text-muted-foreground">Bom para dicas e novidades.</p>
                </x-ui.card>
                <x-ui.card title="Success soft" color="success" variant="soft">
                    <p class="mb-0 text-sm text-muted-foreground">Menos agressivo que o solid.</p>
                </x-ui.card>
                <x-ui.card title="Danger soft" color="danger" variant="soft">
                    <p class="mb-0 text-sm text-muted-foreground">Aviso sem alarme total.</p>
                </x-ui.card>
            </div>
        </x-ui.example>

        <x-ui.example title="Cores outline" :code="$outlineColorCode" :html="$outlineColorHtml">
            <x-slot:description>
                <code>variant="outline"</code> mantém o fundo do card e colore só a borda/título.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.card title="Primary outline" color="primary" variant="outline">
                    <p class="mb-0 text-sm text-muted-foreground">Borda colorida, fundo do card.</p>
                </x-ui.card>
                <x-ui.card title="Warning outline" color="warning" variant="outline">
                    <p class="mb-0 text-sm text-muted-foreground">Destaque só pela borda.</p>
                </x-ui.card>
            </div>
        </x-ui.example>

        <x-ui.example title="Borda de destaque" :code="$borderAccentCode" :html="$borderAccentHtml">
            <x-slot:description>
                <code>borderAccent</code> adiciona uma faixa esquerda colorida (status).
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.card title="Em andamento" borderAccent="warning">
                    <p class="mb-0 text-sm text-muted-foreground">75% concluído.</p>
                </x-ui.card>
                <x-ui.card title="Concluído" borderAccent="success">
                    <p class="mb-0 text-sm text-muted-foreground">100% concluído.</p>
                </x-ui.card>
                <x-ui.card title="Bloqueado" borderAccent="danger">
                    <p class="mb-0 text-sm text-muted-foreground">Aguardando revisão.</p>
                </x-ui.card>
                <x-ui.card title="Novo" borderAccent="info">
                    <p class="mb-0 text-sm text-muted-foreground">Criado hoje.</p>
                </x-ui.card>
            </div>
        </x-ui.example>

        <x-ui.example title="Imagem no topo" :code="$imageTopCode" :html="$imageTopHtml">
            <x-slot:description>
                <code>image</code> + <code>imagePosition="top"</code> (padrão). Ajuste a altura com <code>imageHeight</code>.
            </x-slot:description>
            <x-ui.card
                title="Vista da montanha"
                subtitle="Fotografia · Natureza"
                image="https://picsum.photos/seed/card-top/600/300"
                imageHeight="h-40"
                class="w-full"
            >
                <p class="mb-0 text-sm text-muted-foreground">
                    Imagem no topo do card (padrão, imagePosition="top").
                </p>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Imagem embaixo" :code="$imageBottomCode" :html="$imageBottomHtml">
            <x-slot:description>
                <code>imagePosition="bottom"</code> coloca a imagem depois do conteúdo.
            </x-slot:description>
            <x-ui.card
                title="Vista do lago"
                image="https://picsum.photos/seed/card-bottom/600/300"
                imagePosition="bottom"
                imageHeight="h-40"
                class="w-full"
            >
                <p class="mb-0 text-sm text-muted-foreground">
                    Imagem depois do conteúdo, com imagePosition="bottom".
                </p>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Imagem com overlay" :code="$imageOverlayCode" :html="$imageOverlayHtml">
            <x-slot:description>
                <code>imagePosition="overlay"</code> sobrepõe título/subtítulo à imagem com degradê.
            </x-slot:description>
            <x-ui.card
                title="Trilha na floresta"
                subtitle="Publicado há 3 dias"
                image="https://picsum.photos/seed/card-overlay/600/350"
                imagePosition="overlay"
                imageHeight="h-64"
                class="w-full"
            />
        </x-ui.example>

        <x-ui.example title="Horizontal" :code="$horizontalCode" :html="$horizontalHtml">
            <x-slot:description>
                <code>horizontal</code> põe a imagem à esquerda e o conteúdo à direita.
            </x-slot:description>
            <x-ui.card
                title="Camisa esportiva"
                subtitle="R$ 129,90"
                image="https://picsum.photos/seed/card-horizontal/300/300"
                horizontal
                class="w-full"
            >
                <p class="mb-3 text-sm text-muted-foreground">
                    Tecido dry-fit, disponível em 4 cores.
                </p>
                <div class="flex items-center gap-2">
                    <x-ui.badge color="success" size="sm" variant="soft">Em estoque</x-ui.badge>
                    <x-ui.button size="sm" color="primary">Comprar</x-ui.button>
                </div>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Cards de métricas" :code="$statsCode" :html="$statsHtml">
            <x-slot:description>
                Composição sem props novas — ícone + valor + variação, opcionalmente com <code>borderAccent</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-3">
                <x-ui.card bodyClass="flex items-start justify-between gap-3">
                    <div>
                        <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Receita</p>
                        <p class="mb-0 text-2xl font-semibold tracking-tight">R$ 48,2k</p>
                        <p class="mt-1 mb-0 text-xs text-success">+12,4% vs mês anterior</p>
                    </div>
                    <span class="flex size-10 items-center justify-center rounded-md bg-primary/15 text-primary">
                        <i class="bi bi-currency-dollar text-lg" aria-hidden="true"></i>
                    </span>
                </x-ui.card>

                <x-ui.card bodyClass="flex items-start justify-between gap-3">
                    <div>
                        <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Usuários</p>
                        <p class="mb-0 text-2xl font-semibold tracking-tight">2.847</p>
                        <p class="mt-1 mb-0 text-xs text-success">+8,1% vs mês anterior</p>
                    </div>
                    <span class="flex size-10 items-center justify-center rounded-md bg-info/15 text-info">
                        <i class="bi bi-people text-lg" aria-hidden="true"></i>
                    </span>
                </x-ui.card>

                <x-ui.card bodyClass="flex items-start justify-between gap-3" borderAccent="danger">
                    <div>
                        <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Churn</p>
                        <p class="mb-0 text-2xl font-semibold tracking-tight">2,4%</p>
                        <p class="mt-1 mb-0 text-xs text-danger">+0,3% vs mês anterior</p>
                    </div>
                    <span class="flex size-10 items-center justify-center rounded-md bg-danger/15 text-danger">
                        <i class="bi bi-graph-down-arrow text-lg" aria-hidden="true"></i>
                    </span>
                </x-ui.card>
            </div>
        </x-ui.example>

        <x-ui.example title="Perfil" :code="$profileCode" :html="$profileHtml">
            <x-slot:description>
                Combine <code>avatar</code>, <code>badge</code> e footer de ações.
            </x-slot:description>
            <x-ui.card class="w-full">
                <div class="flex items-center gap-4">
                    <x-ui.avatar initials="AL" color="primary" circle size="lg" />
                    <div class="min-w-0 flex-1">
                        <h5 class="card-title">Ana Lima</h5>
                        <p class="mb-0 text-sm text-muted-foreground">Product Designer · São Paulo</p>
                    </div>
                    <x-ui.badge color="success" size="sm" variant="soft" dot>Online</x-ui.badge>
                </div>

                <x-slot:footer>
                    <x-ui.button size="sm" variant="soft" color="secondary">Mensagem</x-ui.button>
                    <x-ui.button size="sm" color="primary">Ver perfil</x-ui.button>
                </x-slot:footer>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Com ribbon" :code="$ribbonCode" :html="$ribbonHtml">
            <x-slot:description>
                Use <code>class="relative overflow-hidden"</code> no card para ribbons diagonais.
            </x-slot:description>
            <x-ui.card title="Plano anual" class="relative w-full overflow-hidden">
                <x-ui.ribbon shape="diagonal" color="success">-20%</x-ui.ribbon>
                <p class="mb-3 text-sm text-muted-foreground">
                    Economize dois meses com o pagamento anual.
                </p>
                <p class="mb-0 text-2xl font-semibold tracking-tight">R$ 79<span class="text-sm font-normal text-muted-foreground">/mês</span></p>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Link esticado" :code="$stretchedLinkCode" :html="$stretchedLinkHtml">
            <x-slot:description>
                <code>href</code> torna o card clicável. Interativos reais precisam de <code>relative z-[2]</code>.
            </x-slot:description>
            <x-ui.card title="Relatório de vendas" href="#" class="w-full transition-shadow hover:shadow-md">
                <p class="mb-0 text-sm text-muted-foreground">
                    O card inteiro é clicável. Um botão real ainda funciona por cima —
                    ele só precisa de class="relative z-[2]".
                </p>

                <x-slot:footer>
                    <button type="button" class="btn btn-sm btn-soft-primary relative z-[2]" onclick="alert('Botão real, não o link do card')">
                        Ação do botão
                    </button>
                </x-slot:footer>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="CTA centralizado" :code="$centeredCode" :html="$centeredHtml">
            <x-slot:description>
                <code>bodyClass="text-center"</code> + <code>variant="soft"</code> para um bloco de conversão.
            </x-slot:description>
            <x-ui.card bodyClass="text-center" color="primary" variant="soft" class="w-full">
                <span class="mx-auto mb-3 flex size-12 items-center justify-center rounded-full bg-primary/15 text-primary">
                    <i class="bi bi-rocket-takeoff text-xl" aria-hidden="true"></i>
                </span>
                <h5 class="card-title">Assinatura Pro</h5>
                <p class="mt-1 text-sm text-muted-foreground">Todos os recursos, sem limites.</p>
                <x-ui.button color="primary" class="mt-4 justify-center">Assinar agora</x-ui.button>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Com carregamento" :code="$loaderCode" :html="$loaderHtml">
            <x-slot:description>
                Spinner simples (mesmo padrão do <code>&lt;x-ui.button loading&gt;</code>) no corpo.
            </x-slot:description>
            <x-ui.card title="Carregando dados" class="w-full">
                <div class="flex items-center gap-3 text-sm text-muted-foreground">
                    <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent"></span>
                    Buscando as informações mais recentes...
                </div>
            </x-ui.card>
        </x-ui.example>

        <x-ui.example title="Planos / pricing" :code="$groupCode" :html="$groupHtml">
            <x-slot:description>
                Grupo de cards iguais em altura com <code>flex</code> + <code>flex-1</code>; destaque o plano recomendado com <code>variant="soft"</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4 sm:flex-row">
                <x-ui.card title="Básico" class="flex-1" bodyClass="flex flex-col">
                    <p class="text-3xl font-semibold tracking-tight">R$ 0</p>
                    <p class="mb-4 text-sm text-muted-foreground">Para experimentar.</p>
                    <ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> 1 projeto</li>
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Suporte por e-mail</li>
                    </ul>
                    <x-ui.button variant="outline" color="primary" block>Começar</x-ui.button>
                </x-ui.card>

                <x-ui.card title="Pro" class="flex-1" color="primary" variant="soft" bodyClass="flex flex-col">
                    <div class="mb-1 flex items-center gap-2">
                        <p class="mb-0 text-3xl font-semibold tracking-tight">R$ 49</p>
                        <x-ui.badge color="primary" size="sm" pill>Popular</x-ui.badge>
                    </div>
                    <p class="mb-4 text-sm text-muted-foreground">Para times em crescimento.</p>
                    <ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Projetos ilimitados</li>
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Suporte prioritário</li>
                    </ul>
                    <x-ui.button color="primary" block>Assinar Pro</x-ui.button>
                </x-ui.card>

                <x-ui.card title="Enterprise" class="flex-1" bodyClass="flex flex-col">
                    <p class="text-3xl font-semibold tracking-tight">Custom</p>
                    <p class="mb-4 text-sm text-muted-foreground">Para grandes empresas.</p>
                    <ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> SSO e auditoria</li>
                        <li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Gerente dedicado</li>
                    </ul>
                    <x-ui.button variant="outline" color="secondary" block>Falar com vendas</x-ui.button>
                </x-ui.card>
            </div>
        </x-ui.example>

        <x-ui.example title="Grid de cards" :code="$gridCode" :html="$gridHtml">
            <x-slot:description>
                <code>grid grid-cols-{n}</code> — mesmo padrão da página <a href="{{ route('grid') }}" class="text-primary hover:underline">Grid</a>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-3">
                <x-ui.card title="Documentação" bodyClass="space-y-2">
                    <p class="mb-0 text-sm text-muted-foreground">Guias e referências da API.</p>
                    <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:underline">
                        Abrir <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                </x-ui.card>
                <x-ui.card title="Integrações" bodyClass="space-y-2">
                    <p class="mb-0 text-sm text-muted-foreground">Conecte Slack, GitHub e mais.</p>
                    <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:underline">
                        Explorar <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                </x-ui.card>
                <x-ui.card title="Changelog" bodyClass="space-y-2">
                    <p class="mb-0 text-sm text-muted-foreground">O que mudou nas últimas releases.</p>
                    <a href="#" class="inline-flex items-center gap-1 text-sm font-medium text-primary hover:underline">
                        Ver notas <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    </a>
                </x-ui.card>
            </div>
        </x-ui.example>

        <x-ui.example title="Masonry" :code="$masonryCode" :html="$masonryHtml">
            <x-slot:description>
                <code>columns-{n}</code> (CSS multi-column) — alturas diferentes sem JavaScript.
            </x-slot:description>
            <div class="w-full columns-1 gap-4 sm:columns-2 lg:columns-3 [&>*]:mb-4 [&>*]:break-inside-avoid">
                <x-ui.card title="Card curto">
                    <p class="mb-0 text-sm text-muted-foreground">Uma linha de conteúdo.</p>
                </x-ui.card>
                <x-ui.card title="Card alto">
                    <p class="mb-0 text-sm text-muted-foreground">
                        Este card tem bem mais conteúdo, então fica mais alto que os
                        vizinhos — o layout de colunas do CSS reflui os próximos
                        cards para preencher o espaço, criando o efeito "masonry"
                        sem nenhum JavaScript.
                    </p>
                </x-ui.card>
                <x-ui.card title="Outro card curto" color="info" variant="soft">
                    <p class="mb-0 text-sm text-muted-foreground">Conteúdo breve com cor soft.</p>
                </x-ui.card>
                <x-ui.card
                    title="Com imagem"
                    image="https://picsum.photos/seed/card-masonry/600/200"
                    imageHeight="h-28"
                >
                    <p class="mb-0 text-sm text-muted-foreground">Mistura bem no masonry.</p>
                </x-ui.card>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="card" />
</x-ui.docs>
