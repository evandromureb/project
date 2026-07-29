<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.drawer.drawer-trigger name="basic">Abrir drawer</x-ui.drawer.drawer-trigger>

        <x-ui.drawer name="basic" title="Notificações" description="Atualizações das últimas 24h">
            <p class="m-0 text-sm text-muted-foreground">Nenhuma notificação nova.</p>
        </x-ui.drawer>
        BLADE;

/*     O drawer é teleportado para o final do <body> (x-teleport) e fica
         oculto (x-cloak/x-show) até o trigger disparar $store.drawer.show().
         Os $xHtml abaixo mostram a estrutura no estado "aberto". 
*/
    $basicHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Abrir drawer</button>

        <div class="fixed inset-0 z-[100]" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 right-0 border-l w-full max-w-sm" role="dialog" aria-modal="true" aria-label="Notificações">
                <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-border text-card-foreground">
                    <div class="min-w-0 flex-1">
                        <h5 class="m-0 text-base font-semibold text-card-foreground">Notificações</h5>
                        <p class="m-0 mt-0.5 text-sm text-muted-foreground">Atualizações das últimas 24h</p>
                    </div>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="min-h-0 flex-1 p-5">
                    <p class="m-0 text-sm text-muted-foreground">Nenhuma notificação nova.</p>
                </div>
            </div>
        </div>
        HTML;

    $placementsCode = <<<'BLADE'
        <x-ui.drawer.drawer-trigger name="from-start">Esquerda</x-ui.drawer.drawer-trigger>
        <x-ui.drawer name="from-start" placement="start" title="Menu">...</x-ui.drawer>

        <x-ui.drawer.drawer-trigger name="from-end">Direita</x-ui.drawer.drawer-trigger>
        <x-ui.drawer name="from-end" placement="end" title="Carrinho">...</x-ui.drawer>

        <x-ui.drawer.drawer-trigger name="from-top">Topo</x-ui.drawer.drawer-trigger>
        <x-ui.drawer name="from-top" placement="top" title="Aviso">...</x-ui.drawer>

        <x-ui.drawer.drawer-trigger name="from-bottom">Baixo</x-ui.drawer.drawer-trigger>
        <x-ui.drawer name="from-bottom" placement="bottom" title="Ações">...</x-ui.drawer>
        BLADE;

/*     placementClasses muda por posição; o restante da estrutura é igual ao "Básico". 
*/
    $placementsHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Esquerda</button>
        <!-- painel: "inset-y-0 left-0 border-r w-full max-w-sm" (placement="start") -->

        <button type="button" class="btn btn-outline-secondary">Direita</button>
        <!-- painel: "inset-y-0 right-0 border-l w-full max-w-sm" (placement="end", padrão) -->

        <button type="button" class="btn btn-outline-secondary">Topo</button>
        <!-- painel: "inset-x-0 top-0 border-b h-64" (placement="top") -->

        <button type="button" class="btn btn-outline-secondary">Baixo</button>
        <!-- painel: "inset-x-0 bottom-0 border-t h-64" (placement="bottom") -->
        HTML;

    $sizesCode = <<<'BLADE'
        <x-ui.drawer.drawer-trigger name="size-sm">sm</x-ui.drawer.drawer-trigger>
        <x-ui.drawer name="size-sm" size="sm" title="sm">...</x-ui.drawer>

        <x-ui.drawer.drawer-trigger name="size-md">md</x-ui.drawer.drawer-trigger>
        <x-ui.drawer name="size-md" size="md" title="md">...</x-ui.drawer>

        <x-ui.drawer.drawer-trigger name="size-lg">lg</x-ui.drawer.drawer-trigger>
        <x-ui.drawer name="size-lg" size="lg" title="lg">...</x-ui.drawer>

        <x-ui.drawer.drawer-trigger name="size-xl">xl</x-ui.drawer.drawer-trigger>
        <x-ui.drawer name="size-xl" size="xl" title="xl">...</x-ui.drawer>

        <x-ui.drawer.drawer-trigger name="size-full">full</x-ui.drawer.drawer-trigger>
        <x-ui.drawer name="size-full" size="full" title="full">...</x-ui.drawer>
        BLADE;

/*     sizeClasses (horizontal, start/end): sm=max-w-xs, md=max-w-sm, lg=max-w-md, xl=max-w-lg, full=max-w-none w-full 
*/
    $sizesHtml = <<<'HTML'
        <button type="button" class="btn btn-sm btn-outline-secondary">sm</button> <!-- painel: w-full max-w-xs -->
        <button type="button" class="btn btn-sm btn-outline-secondary">md</button> <!-- painel: w-full max-w-sm -->
        <button type="button" class="btn btn-sm btn-outline-secondary">lg</button> <!-- painel: w-full max-w-md -->
        <button type="button" class="btn btn-sm btn-outline-secondary">xl</button> <!-- painel: w-full max-w-lg -->
        <button type="button" class="btn btn-sm btn-outline-secondary">full</button> <!-- painel: w-full max-w-none -->
        HTML;

    $headerColorsCode = <<<'BLADE'
        <x-ui.drawer name="hdr-primary" title="Primary" color="primary">...</x-ui.drawer>
        <x-ui.drawer name="hdr-success" title="Success" color="success" variant="soft">...</x-ui.drawer>
        <x-ui.drawer name="hdr-danger" title="Danger" color="danger">...</x-ui.drawer>
        BLADE;

    $headerColorsHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Primary</button>
        <!-- cabeçalho solid: "border-b border-primary bg-primary text-primary-foreground" -->
        <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-primary bg-primary text-primary-foreground">
            <div class="min-w-0 flex-1">
                <h5 class="m-0 text-base font-semibold">Primary</h5>
                <p class="m-0 mt-0.5 text-sm opacity-80">Cabeçalho sólido</p>
            </div>
            <button type="button" class="btn-icon -mr-2 shrink-0 text-inherit opacity-80 hover:opacity-100" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
        </div>

        <button type="button" class="btn btn-soft-success">Success soft</button>
        <!-- cabeçalho soft: "border-b border-success/15 bg-success/10 text-success" -->
        <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-success/15 bg-success/10 text-success">
            <div class="min-w-0 flex-1">
                <h5 class="m-0 text-base font-semibold">Pedido confirmado</h5>
                <p class="m-0 mt-0.5 text-sm opacity-75">Pagamento aprovado</p>
            </div>
            <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
        </div>

        <button type="button" class="btn btn-warning">Warning</button>
        <button type="button" class="btn btn-soft-danger">Danger soft</button>
        <button type="button" class="btn btn-info">Info</button>
        <!-- mesma estrutura, trocando o token de cor -->
        HTML;

    $softHeaderCode = <<<'BLADE'
        <x-ui.drawer name="soft-header" title="Filtros" description="Refine a listagem" variant="soft">
            ...
        </x-ui.drawer>
        BLADE;

/*     variant="soft" sem "color": cabeçalho "border-b border-border bg-muted/50 text-card-foreground" 
*/
    $softHeaderHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Filtros</button>

        <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 left-0 border-r w-full max-w-sm">
            <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-border bg-muted/50 text-card-foreground">
                <div class="min-w-0 flex-1">
                    <h5 class="m-0 text-base font-semibold">Filtros</h5>
                    <p class="m-0 mt-0.5 text-sm text-muted-foreground">Refine a listagem</p>
                </div>
                <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="min-h-0 flex-1 p-5">
                <div class="flex flex-col gap-3 text-sm">
                    <label class="flex flex-col gap-1.5 font-medium">Status
                        <select class="rounded-md border border-border bg-background px-3 py-2 text-sm"><option>Todos</option></select>
                    </label>
                </div>
            </div>
            <div class="flex items-center gap-2 border-t border-border bg-muted/30 px-5 py-4 justify-end">
                <button type="button" class="btn btn-sm btn-outline-secondary">Limpar</button>
                <button type="button" class="btn btn-sm btn-primary">Aplicar</button>
            </div>
        </div>
        HTML;

    $roundedCode = <<<'BLADE'
        {{-- Cantos arredondados na borda livre (bottom sheet / painel flutuante) --}}
        <x-ui.drawer name="sheet" placement="bottom" size="lg" title="Compartilhar" rounded>
            ...
        </x-ui.drawer>
        BLADE;

/*     rounded + placement="bottom": arredonda só a borda livre ("rounded-t-2xl") 
*/
    $roundedHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Compartilhar</button>

        <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-x-0 bottom-0 border-t h-96 rounded-t-2xl">
            <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-border text-card-foreground">
                <div class="min-w-0 flex-1">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Compartilhar</h5>
                    <p class="m-0 mt-0.5 text-sm text-muted-foreground">Escolha um destino</p>
                </div>
                <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="min-h-0 flex-1 p-5">
                <div class="grid grid-cols-4 gap-3 text-center text-xs">
                    <button type="button" class="flex flex-col items-center gap-2 rounded-xl p-3">
                        <span class="flex size-11 items-center justify-center rounded-full bg-primary/10 text-primary"><i class="bi bi-link-45deg text-xl"></i></span>
                        Copiar link
                    </button>
                </div>
            </div>
        </div>
        HTML;

    $customHeaderCode = <<<'BLADE'
        <x-ui.drawer name="profile">
            <x-slot:header>
                <div class="flex items-center gap-3">
                    <x-ui.avatar initials="AM" color="primary" circle />
                    <div>
                        <p class="m-0 text-sm font-semibold">Ana Mendes</p>
                        <p class="m-0 text-xs text-muted-foreground">ana@empresa.com</p>
                    </div>
                </div>
            </x-slot:header>
            ...
        </x-ui.drawer>
        BLADE;

/*     O slot "header" substitui título/descrição; sem "color" nem "variant"
         soft, o cabeçalho usa a classe padrão ("border-b border-border text-card-foreground"). 
*/
    $customHeaderHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Perfil</button>

        <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 right-0 border-l w-full max-w-sm">
            <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-border text-card-foreground">
                <div class="min-w-0 flex-1">
                    <div class="flex items-center gap-3">
                        <div class="avatar avatar-circle bg-primary text-primary-foreground">AM</div>
                        <div class="min-w-0">
                            <p class="m-0 truncate text-sm font-semibold">Ana Mendes</p>
                            <p class="m-0 truncate text-xs text-muted-foreground">ana@empresa.com</p>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="min-h-0 flex-1 p-5">
                <nav class="flex flex-col gap-1 text-sm">
                    <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 text-muted-foreground hover:bg-muted hover:text-foreground"><i class="bi bi-gear" aria-hidden="true"></i> Conta</a>
                    <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 text-danger hover:bg-danger/10"><i class="bi bi-box-arrow-right" aria-hidden="true"></i> Sair</a>
                </nav>
            </div>
        </div>
        HTML;

    $footerCode = <<<'BLADE'
        <x-ui.drawer name="edit-item" title="Editar produto" footerAlign="stretch">
            ...
            <x-slot:footer>
                <x-ui.drawer.drawer-trigger name="edit-item" action="close" variant="outline" color="secondary">Cancelar</x-ui.drawer.drawer-trigger>
                <x-ui.drawer.drawer-trigger name="edit-item" action="close" color="primary">Salvar</x-ui.drawer.drawer-trigger>
            </x-slot:footer>
        </x-ui.drawer>
        BLADE;

/*     footerAlign="stretch" -> "justify-stretch [&>*]:flex-1" no rodapé 
*/
    $footerHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Editar</button>

        <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 right-0 border-l w-full max-w-sm">
            <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-border text-card-foreground">
                <div class="min-w-0 flex-1">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Editar produto</h5>
                    <p class="m-0 mt-0.5 text-sm text-muted-foreground">Camiseta básica</p>
                </div>
                <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="min-h-0 flex-1 p-5">
                <div class="flex flex-col gap-3">
                    <label class="text-sm font-medium">Nome<input type="text" class="mt-1 w-full rounded-md border border-border bg-background px-3 py-2 text-sm" value="Camiseta básica"></label>
                </div>
            </div>
            <div class="flex items-center gap-2 border-t border-border bg-muted/30 px-5 py-4 justify-stretch [&>*]:flex-1">
                <button type="button" class="btn btn-outline-secondary">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
        HTML;

    $navCode = <<<'BLADE'
        <x-ui.drawer name="nav" placement="start" title="Navegação" size="sm">
            <nav class="flex flex-col gap-1 text-sm">
                <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 font-medium bg-primary/10 text-primary">
                    <i class="bi bi-house"></i> Início
                </a>
                <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <i class="bi bi-bag"></i> Pedidos
                </a>
            </nav>
        </x-ui.drawer>
        BLADE;

    $navHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Menu</button>

        <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 left-0 border-r w-full max-w-xs">
            <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-border text-card-foreground">
                <div class="min-w-0 flex-1"><h5 class="m-0 text-base font-semibold text-card-foreground">Navegação</h5></div>
                <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="min-h-0 flex-1 p-5">
                <nav class="flex flex-col gap-1 text-sm">
                    <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 font-medium bg-primary/10 text-primary"><i class="bi bi-house"></i> Início</a>
                    <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 text-muted-foreground hover:bg-muted hover:text-foreground"><i class="bi bi-bag"></i> Pedidos</a>
                </nav>
            </div>
        </div>
        HTML;

    $notificationsCode = <<<'BLADE'
        <x-ui.drawer name="inbox" title="Inbox" description="3 não lidas" color="info" variant="soft" scrollable>
            {{-- Lista de notificações --}}
        </x-ui.drawer>
        BLADE;

/*     color="info" + variant="soft": cabeçalho "border-b border-info/15 bg-info/10 text-info"; scrollable -> "overflow-y-auto" no corpo 
*/
    $notificationsHtml = <<<'HTML'
        <button type="button" class="btn btn-soft-info">Inbox</button>

        <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 right-0 border-l w-full max-w-sm">
            <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-info/15 bg-info/10 text-info">
                <div class="min-w-0 flex-1">
                    <h5 class="m-0 text-base font-semibold">Inbox</h5>
                    <p class="m-0 mt-0.5 text-sm opacity-75">3 não lidas</p>
                </div>
                <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="overflow-y-auto min-h-0 flex-1 p-5">
                <div class="flex flex-col divide-y divide-border -mx-5 -my-5">
                    <button type="button" class="flex gap-3 px-5 py-3.5 text-start hover:bg-muted/60">
                        <span class="text-sm font-medium">Pedido #4821 enviado</span>
                    </button>
                </div>
            </div>
        </div>
        HTML;

    $scrollableCode = <<<'BLADE'
        <x-ui.drawer name="long-content" title="Termos de uso" scrollable>
            {{-- Cabeçalho e rodapé ficam fixos; só este bloco rola --}}
            <p>Conteúdo longo...</p>
            <x-slot:footer>
                <x-ui.drawer.drawer-trigger name="long-content" action="close">Fechar</x-ui.drawer.drawer-trigger>
            </x-slot:footer>
        </x-ui.drawer>
        BLADE;

    $scrollableHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Termos de uso</button>

        <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 right-0 border-l w-full max-w-sm">
            <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-border text-card-foreground">
                <div class="min-w-0 flex-1"><h5 class="m-0 text-base font-semibold text-card-foreground">Termos de uso</h5></div>
                <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="overflow-y-auto min-h-0 flex-1 p-5">
                <div class="space-y-3 text-sm text-muted-foreground">
                    <p class="m-0">Parágrafo 1 — texto de exemplo para demonstrar a rolagem interna do drawer.</p>
                    <p class="m-0">Parágrafo 2 — ...</p>
                </div>
            </div>
            <div class="flex items-center gap-2 border-t border-border bg-muted/30 px-5 py-4 justify-end">
                <button type="button" class="btn btn-primary">Fechar</button>
            </div>
        </div>
        HTML;

    $staticBackdropCode = <<<'BLADE'
        {{-- Clicar fora não fecha; só o botão de fechar ou "Escape" --}}
        <x-ui.drawer name="confirm-required" title="Confirme para continuar" color="warning" staticBackdrop>
            Esta ação exige confirmação explícita.
        </x-ui.drawer>
        BLADE;

/*     staticBackdrop: o backdrop existe mas sem @click de fechar 
*/
    $staticBackdropHtml = <<<'HTML'
        <button type="button" class="btn btn-warning">Ação sensível</button>

        <div class="fixed inset-0 z-[100]" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div> <!-- sem @click de fechar -->
            <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 right-0 border-l w-full max-w-sm">
                <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-warning bg-warning text-warning-foreground">
                    <div class="min-w-0 flex-1">
                        <h5 class="m-0 text-base font-semibold">Confirme para continuar</h5>
                        <p class="m-0 mt-0.5 text-sm opacity-80">Clique fora não fecha</p>
                    </div>
                    <button type="button" class="btn-icon -mr-2 shrink-0 text-inherit opacity-80 hover:opacity-100" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
                </div>
                <div class="min-h-0 flex-1 p-5">
                    <p class="m-0 text-sm text-muted-foreground">Esta ação exige confirmação explícita — clicar fora não fecha o painel.</p>
                </div>
                <div class="flex items-center gap-2 border-t border-border bg-muted/30 px-5 py-4 justify-end">
                    <button type="button" class="btn btn-outline-secondary">Cancelar</button>
                    <button type="button" class="btn btn-warning">Confirmar</button>
                </div>
            </div>
        </div>
        HTML;

    $noBackdropCode = <<<'BLADE'
        {{-- Sem camada escura e com "bodyScroll", o painel fica sobreposto sem
             bloquear a interação com o resto da página --}}
        <x-ui.drawer name="live-filters" placement="start" title="Filtros" variant="soft" :backdrop="false" bodyScroll>
            Ajuste os filtros e veja a lista atualizar ao lado.
        </x-ui.drawer>
        BLADE;

/*     :backdrop="false": sem a div de overlay; bodyScroll usa x-trap sem ".noscroll" 
*/
    $noBackdropHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Filtros</button>

        <div class="fixed inset-0 z-[100]" role="presentation">
            <!-- sem overlay: nenhuma div "fixed inset-0 bg-black/50" -->
            <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 left-0 border-r w-full max-w-sm">
                <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-border bg-muted/50 text-card-foreground">
                    <div class="min-w-0 flex-1"><h5 class="m-0 text-base font-semibold">Filtros</h5></div>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
                </div>
                <div class="min-h-0 flex-1 p-5">
                    <p class="m-0 text-sm text-muted-foreground">Ajuste os filtros e continue navegando na página ao lado.</p>
                </div>
            </div>
        </div>
        HTML;

    $chainedCode = <<<'BLADE'
        <x-ui.drawer.drawer-trigger name="cart">Ver carrinho</x-ui.drawer.drawer-trigger>

        <x-ui.drawer name="cart" title="Carrinho (2 itens)">
            2 produtos, R$ 159,80.
            <x-slot:footer>
                <x-ui.drawer.drawer-trigger name="checkout" action="open" :closes="['cart']" class="w-full">
                    Finalizar compra
                </x-ui.drawer.drawer-trigger>
            </x-slot:footer>
        </x-ui.drawer>

        <x-ui.drawer name="checkout" title="Finalizar compra" placement="start" color="success" variant="soft">
            Dados de pagamento...
            <x-slot:footer>
                <x-ui.drawer.drawer-trigger name="cart" action="open" :closes="['checkout']" variant="outline" color="secondary">
                    Voltar ao carrinho
                </x-ui.drawer.drawer-trigger>
            </x-slot:footer>
        </x-ui.drawer>
        BLADE;

/*     "closes" só afeta o clique do trigger ($store.drawer.hideMany), sem impacto estrutural no HTML. 
*/
    $chainedHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Ver carrinho</button>

        <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 right-0 border-l w-full max-w-sm">
            <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-border text-card-foreground">
                <div class="min-w-0 flex-1">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Carrinho (2 itens)</h5>
                    <p class="m-0 mt-0.5 text-sm text-muted-foreground">Subtotal R$ 159,80</p>
                </div>
                <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="min-h-0 flex-1 p-5">
                <ul class="m-0 flex list-none flex-col gap-3 p-0 text-sm">
                    <li class="flex items-center justify-between gap-3 rounded-lg border border-border px-3 py-2.5">
                        <span class="block font-medium">Camiseta básica</span>
                        <span class="font-medium tabular-nums">R$ 79,90</span>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-2 border-t border-border bg-muted/30 px-5 py-4 justify-end">
                <button type="button" class="btn btn-primary">Finalizar compra</button>
            </div>
        </div>

        <!-- segundo drawer, placement="start", color="success" variant="soft" -->
        <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 left-0 border-r w-full max-w-sm">
            <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-success/15 bg-success/10 text-success">
                <div class="min-w-0 flex-1">
                    <h5 class="m-0 text-base font-semibold">Finalizar compra</h5>
                    <p class="m-0 mt-0.5 text-sm opacity-75">Pagamento seguro</p>
                </div>
                <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar"><i class="bi bi-x-lg text-base leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="min-h-0 flex-1 p-5">
                <label class="text-sm font-medium">Cartão<input type="text" class="mt-1 w-full rounded-md border border-border bg-background px-3 py-2" placeholder="•••• •••• •••• 4242"></label>
            </div>
            <div class="flex items-center gap-2 border-t border-border bg-muted/30 px-5 py-4 justify-end">
                <button type="button" class="btn btn-outline-secondary">Voltar</button>
                <button type="button" class="btn btn-success">Pagar R$ 159,80</button>
            </div>
        </div>
        HTML;

    $noCloseButtonCode = <<<'BLADE'
        <x-ui.drawer name="pick-one" title="Escolha uma opção" :closeButton="false" footerAlign="stretch">
            <div class="flex flex-col gap-2">
                <x-ui.drawer.drawer-trigger name="pick-one" action="close" variant="outline" color="secondary" class="w-full">Opção A</x-ui.drawer.drawer-trigger>
                <x-ui.drawer.drawer-trigger name="pick-one" action="close" variant="outline" color="secondary" class="w-full">Opção B</x-ui.drawer.drawer-trigger>
            </div>
        </x-ui.drawer>
        BLADE;

/*     :closeButton="false": o header não renderiza o botão "x" no canto. 
*/
    $noCloseButtonHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary">Escolher opção</button>

        <div class="fixed z-10 flex flex-col overflow-hidden border-border bg-card text-card-foreground shadow-xl inset-y-0 right-0 border-l w-full max-w-sm">
            <div class="flex items-start justify-between gap-3 px-5 py-4 border-b border-border text-card-foreground">
                <div class="min-w-0 flex-1"><h5 class="m-0 text-base font-semibold text-card-foreground">Escolha uma opção</h5></div>
                <!-- sem botão de fechar -->
            </div>
            <div class="min-h-0 flex-1 p-5">
                <div class="flex flex-col gap-2">
                    <button type="button" class="btn btn-outline-secondary w-full">Opção A</button>
                    <button type="button" class="btn btn-outline-secondary w-full">Opção B</button>
                </div>
            </div>
            <div class="flex items-center gap-2 border-t border-border bg-muted/30 px-5 py-4 justify-stretch [&>*]:flex-1"></div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.drawer&gt;</code> é um painel que desliza a partir de uma borda da viewport
            (offcanvas). Mesma store global do <code>&lt;x-ui.modal&gt;</code> — gatilho e painel não
            precisam ser vizinhos no DOM. Suporta 4 posições, 5 tamanhos, cabeçalho colorido
            (<code>color</code>/<code>variant</code>), descrição, cantos arredondados (<code>rounded</code>),
            rodapé alinhável, backdrop estático, sem backdrop, conteúdo rolável e drawers encadeados.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                <code>title</code> + <code>description</code> montam o cabeçalho padrão.
                <code>&lt;x-ui.drawer.drawer-trigger&gt;</code> e <code>&lt;x-ui.drawer&gt;</code> combinam pelo mesmo <code>name</code>.
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="basic">Abrir drawer</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="basic" title="Notificações" description="Atualizações das últimas 24h">
                <p class="m-0 text-sm text-muted-foreground">Nenhuma notificação nova.</p>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Cabeçalho suave" :code="$softHeaderCode" :html="$softHeaderHtml">
            <x-slot:description>
                <code>variant="soft"</code> aplica fundo muted no cabeçalho — útil para filtros e painéis secundários.
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="soft-header" variant="outline" color="secondary">Filtros</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="soft-header" title="Filtros" description="Refine a listagem" variant="soft" placement="start">
                <div class="flex flex-col gap-3 text-sm">
                    <label class="flex flex-col gap-1.5 font-medium">
                        Status
                        <select class="rounded-md border border-border bg-background px-3 py-2 text-sm">
                            <option>Todos</option>
                            <option>Ativos</option>
                            <option>Arquivados</option>
                        </select>
                    </label>
                    <label class="flex flex-col gap-1.5 font-medium">
                        Ordenar por
                        <select class="rounded-md border border-border bg-background px-3 py-2 text-sm">
                            <option>Mais recentes</option>
                            <option>Nome A–Z</option>
                        </select>
                    </label>
                </div>
                <x-slot:footer>
                    <x-ui.drawer.drawer-trigger name="soft-header" action="close" variant="outline" color="secondary" size="sm">Limpar</x-ui.drawer.drawer-trigger>
                    <x-ui.drawer.drawer-trigger name="soft-header" action="close" size="sm">Aplicar</x-ui.drawer.drawer-trigger>
                </x-slot:footer>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Posições" :code="$placementsCode" :html="$placementsHtml">
            <x-slot:description>
                <code>placement="start|end|top|bottom"</code> — desliza a partir da borda correspondente.
            </x-slot:description>
            <div class="flex flex-wrap gap-2">
                <x-ui.drawer.drawer-trigger name="from-start" variant="outline" color="secondary">Esquerda</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="from-start" placement="start" title="Menu">
                    <nav class="flex flex-col gap-1 text-sm">
                        <a href="#" class="rounded-md bg-primary/10 px-3 py-2 font-medium text-primary">Início</a>
                        <a href="#" class="rounded-md px-3 py-2 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground">Pedidos</a>
                        <a href="#" class="rounded-md px-3 py-2 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground">Configurações</a>
                    </nav>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="from-end" variant="outline" color="secondary">Direita</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="from-end" placement="end" title="Carrinho">
                    <p class="m-0 text-sm text-muted-foreground">Seu carrinho está vazio.</p>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="from-top" variant="outline" color="secondary">Topo</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="from-top" placement="top" title="Aviso do sistema" color="warning" variant="soft">
                    <p class="m-0 text-sm text-muted-foreground">Manutenção programada para hoje às 23h.</p>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="from-bottom" variant="outline" color="secondary">Baixo</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="from-bottom" placement="bottom" title="Ações rápidas">
                    <div class="grid grid-cols-3 gap-3 text-center text-sm">
                        <button type="button" class="flex flex-col items-center gap-2 rounded-lg p-3 transition-colors hover:bg-muted">
                            <i class="bi bi-share text-lg text-primary"></i>
                            Compartilhar
                        </button>
                        <button type="button" class="flex flex-col items-center gap-2 rounded-lg p-3 transition-colors hover:bg-muted">
                            <i class="bi bi-copy text-lg text-info"></i>
                            Duplicar
                        </button>
                        <button type="button" class="flex flex-col items-center gap-2 rounded-lg p-3 transition-colors hover:bg-muted">
                            <i class="bi bi-archive text-lg text-warning"></i>
                            Arquivar
                        </button>
                    </div>
                </x-ui.drawer>
            </div>
        </x-ui.example>

        <x-ui.example title="Bottom sheet arredondado" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code> arredonda a borda livre do painel — ideal para sheets em <code>placement="bottom"</code>.
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="sheet" variant="outline" color="secondary" icon="bi-share">Compartilhar</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="sheet" placement="bottom" size="lg" title="Compartilhar" description="Escolha um destino" rounded>
                <div class="grid grid-cols-4 gap-3 text-center text-xs">
                    <button type="button" class="flex flex-col items-center gap-2 rounded-xl p-3 transition-colors hover:bg-muted">
                        <span class="flex size-11 items-center justify-center rounded-full bg-primary/10 text-primary">
                            <i class="bi bi-link-45deg text-xl"></i>
                        </span>
                        Copiar link
                    </button>
                    <button type="button" class="flex flex-col items-center gap-2 rounded-xl p-3 transition-colors hover:bg-muted">
                        <span class="flex size-11 items-center justify-center rounded-full bg-success/10 text-success">
                            <i class="bi bi-whatsapp text-xl"></i>
                        </span>
                        WhatsApp
                    </button>
                    <button type="button" class="flex flex-col items-center gap-2 rounded-xl p-3 transition-colors hover:bg-muted">
                        <span class="flex size-11 items-center justify-center rounded-full bg-info/10 text-info">
                            <i class="bi bi-envelope text-xl"></i>
                        </span>
                        E-mail
                    </button>
                    <button type="button" class="flex flex-col items-center gap-2 rounded-xl p-3 transition-colors hover:bg-muted">
                        <span class="flex size-11 items-center justify-center rounded-full bg-secondary/15 text-secondary">
                            <i class="bi bi-three-dots text-xl"></i>
                        </span>
                        Mais
                    </button>
                </div>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size="sm|md|lg|xl|full"</code> — largura em <code>start</code>/<code>end</code>, altura em
                <code>top</code>/<code>bottom</code>.
            </x-slot:description>
            <div class="flex flex-wrap gap-2">
                <x-ui.drawer.drawer-trigger name="size-sm" size="sm" variant="outline" color="secondary">sm</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="size-sm" size="sm" title="Tamanho sm">
                    <p class="m-0 text-sm text-muted-foreground">max-w-xs · h-40</p>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="size-md" size="sm" variant="outline" color="secondary">md</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="size-md" size="md" title="Tamanho md">
                    <p class="m-0 text-sm text-muted-foreground">max-w-sm · h-64 (padrão)</p>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="size-lg" size="sm" variant="outline" color="secondary">lg</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="size-lg" size="lg" title="Tamanho lg">
                    <p class="m-0 text-sm text-muted-foreground">max-w-md · h-96</p>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="size-xl" size="sm" variant="outline" color="secondary">xl</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="size-xl" size="xl" title="Tamanho xl">
                    <p class="m-0 text-sm text-muted-foreground">max-w-lg · h-[32rem]</p>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="size-full" size="sm" variant="outline" color="secondary">full</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="size-full" size="full" title="Tamanho full">
                    <p class="m-0 text-sm text-muted-foreground">max-w-none w-full · h-full</p>
                </x-ui.drawer>
            </div>
        </x-ui.example>

        <x-ui.example title="Cabeçalhos coloridos" :code="$headerColorsCode" :html="$headerColorsHtml">
            <x-slot:description>
                <code>color</code> pinta o cabeçalho com tokens do tema.
                Use <code>variant="soft"</code> para um tom suave ou omita (equivale a solid) para fundo sólido.
            </x-slot:description>
            <div class="flex flex-wrap gap-2">
                <x-ui.drawer.drawer-trigger name="hdr-primary" size="sm" color="primary">Primary</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="hdr-primary" title="Primary" description="Cabeçalho sólido" color="primary">
                    <p class="m-0 text-sm text-muted-foreground">Útil para drawers de destaque ou onboarding.</p>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="hdr-success" size="sm" color="success" variant="soft">Success soft</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="hdr-success" title="Pedido confirmado" description="Pagamento aprovado" color="success" variant="soft">
                    <p class="m-0 text-sm text-muted-foreground">O cabeçalho soft herda a cor do token sem cobrir o painel inteiro.</p>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="hdr-warning" size="sm" color="warning">Warning</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="hdr-warning" title="Atenção" description="Revise antes de continuar" color="warning">
                    <p class="m-0 text-sm text-muted-foreground">Combine com <code class="text-danger">staticBackdrop</code> em fluxos sensíveis.</p>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="hdr-danger" size="sm" color="danger" variant="soft">Danger soft</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="hdr-danger" title="Excluir item" description="Esta ação não pode ser desfeita" color="danger" variant="soft">
                    <p class="m-0 text-sm text-muted-foreground">O produto será removido permanentemente.</p>
                    <x-slot:footer>
                        <x-ui.drawer.drawer-trigger name="hdr-danger" action="close" variant="outline" color="secondary">Cancelar</x-ui.drawer.drawer-trigger>
                        <x-ui.drawer.drawer-trigger name="hdr-danger" action="close" color="danger">Excluir</x-ui.drawer.drawer-trigger>
                    </x-slot:footer>
                </x-ui.drawer>

                <x-ui.drawer.drawer-trigger name="hdr-info" size="sm" color="info">Info</x-ui.drawer.drawer-trigger>
                <x-ui.drawer name="hdr-info" title="Novidades" description="O que mudou nesta versão" color="info">
                    <ul class="m-0 list-disc space-y-1 ps-4 text-sm text-muted-foreground">
                        <li>Drawers com cabeçalho colorido</li>
                        <li>Bottom sheet arredondado</li>
                        <li>Alinhamento de rodapé</li>
                    </ul>
                </x-ui.drawer>
            </div>
        </x-ui.example>

        <x-ui.example title="Cabeçalho customizado" :code="$customHeaderCode" :html="$customHeaderHtml">
            <x-slot:description>
                O slot <code>header</code> substitui título/descrição — use para avatar, badges ou qualquer markup.
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="profile" variant="outline" color="secondary" icon="bi-person">Perfil</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="profile" title="Perfil">
                <x-slot:header>
                    <div class="flex items-center gap-3">
                        <x-ui.avatar initials="AM" color="primary" circle />
                        <div class="min-w-0">
                            <p class="m-0 truncate text-sm font-semibold">Ana Mendes</p>
                            <p class="m-0 truncate text-xs text-muted-foreground">ana@empresa.com</p>
                        </div>
                    </div>
                </x-slot:header>

                <nav class="flex flex-col gap-1 text-sm">
                    <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground">
                        <i class="bi bi-gear" aria-hidden="true"></i> Conta
                    </a>
                    <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground">
                        <i class="bi bi-bell" aria-hidden="true"></i> Notificações
                    </a>
                    <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 text-danger transition-colors hover:bg-danger/10">
                        <i class="bi bi-box-arrow-right" aria-hidden="true"></i> Sair
                    </a>
                </nav>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Navegação lateral" :code="$navCode" :html="$navHtml">
            <x-slot:description>
                Padrão clássico de menu offcanvas — <code>placement="start"</code> + <code>size="sm"</code>.
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="nav" variant="outline" color="secondary" icon="bi-list">Menu</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="nav" placement="start" title="Navegação" size="sm">
                <nav class="flex flex-col gap-1 text-sm">
                    <a href="#" class="flex items-center gap-2 rounded-md bg-primary/10 px-3 py-2 font-medium text-primary">
                        <i class="bi bi-house" aria-hidden="true"></i> Início
                    </a>
                    <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground">
                        <i class="bi bi-bag" aria-hidden="true"></i> Pedidos
                        <x-ui.badge color="primary" variant="soft" size="sm" class="ms-auto">12</x-ui.badge>
                    </a>
                    <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground">
                        <i class="bi bi-people" aria-hidden="true"></i> Clientes
                    </a>
                    <a href="#" class="flex items-center gap-2 rounded-md px-3 py-2 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground">
                        <i class="bi bi-gear" aria-hidden="true"></i> Configurações
                    </a>
                </nav>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Inbox / notificações" :code="$notificationsCode" :html="$notificationsHtml">
            <x-slot:description>
                Combine <code>color</code>, <code>variant="soft"</code> e <code>scrollable</code> para uma inbox lateral.
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="inbox" color="info" variant="soft" icon="bi-inbox">Inbox</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="inbox" title="Inbox" description="3 não lidas" color="info" variant="soft" scrollable size="md">
                <div class="flex flex-col divide-y divide-border -mx-5 -my-5">
                    <button type="button" class="flex gap-3 px-5 py-3.5 text-start transition-colors hover:bg-muted/60">
                        <x-ui.avatar icon="bi-cart-check" color="success" size="sm" circle />
                        <span class="min-w-0 flex-1">
                            <span class="flex items-center justify-between gap-2">
                                <span class="text-sm font-medium">Pedido #4821 enviado</span>
                                <span class="shrink-0 text-xs text-muted-foreground">agora</span>
                            </span>
                            <span class="mt-0.5 block text-xs text-muted-foreground">O rastreio foi atualizado para “em trânsito”.</span>
                        </span>
                    </button>
                    <button type="button" class="flex gap-3 px-5 py-3.5 text-start transition-colors hover:bg-muted/60">
                        <x-ui.avatar icon="bi-chat-dots" color="primary" size="sm" circle />
                        <span class="min-w-0 flex-1">
                            <span class="flex items-center justify-between gap-2">
                                <span class="text-sm font-medium">Nova mensagem de Joana</span>
                                <span class="shrink-0 text-xs text-muted-foreground">12 min</span>
                            </span>
                            <span class="mt-0.5 block text-xs text-muted-foreground">“Consegue revisar o orçamento ainda hoje?”</span>
                        </span>
                    </button>
                    <button type="button" class="flex gap-3 px-5 py-3.5 text-start transition-colors hover:bg-muted/60">
                        <x-ui.avatar icon="bi-exclamation-triangle" color="warning" size="sm" circle />
                        <span class="min-w-0 flex-1">
                            <span class="flex items-center justify-between gap-2">
                                <span class="text-sm font-medium">Estoque baixo</span>
                                <span class="shrink-0 text-xs text-muted-foreground">1 h</span>
                            </span>
                            <span class="mt-0.5 block text-xs text-muted-foreground">Camiseta básica — restam 4 unidades.</span>
                        </span>
                    </button>
                </div>
                <x-slot:footer>
                    <x-ui.drawer.drawer-trigger name="inbox" action="close" variant="outline" color="secondary" class="w-full justify-center">Marcar todas como lidas</x-ui.drawer.drawer-trigger>
                </x-slot:footer>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Com rodapé de ações" :code="$footerCode" :html="$footerHtml">
            <x-slot:description>
                Slot <code>footer</code> fixo abaixo do conteúdo.
                <code>footerAlign="stretch|start|end|center|between"</code> controla o alinhamento.
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="edit-item" color="secondary" variant="outline">Editar</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="edit-item" title="Editar produto" description="Camiseta básica" footerAlign="stretch">
                <div class="flex flex-col gap-3">
                    <label class="text-sm font-medium">Nome
                        <input type="text" class="mt-1 w-full rounded-md border border-border bg-background px-3 py-2 text-sm" value="Camiseta básica" />
                    </label>
                    <label class="text-sm font-medium">Preço
                        <input type="text" class="mt-1 w-full rounded-md border border-border bg-background px-3 py-2 text-sm" value="R$ 79,90" />
                    </label>
                </div>
                <x-slot:footer>
                    <x-ui.drawer.drawer-trigger name="edit-item" action="close" variant="outline" color="secondary">Cancelar</x-ui.drawer.drawer-trigger>
                    <x-ui.drawer.drawer-trigger name="edit-item" action="close" color="primary">Salvar</x-ui.drawer.drawer-trigger>
                </x-slot:footer>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Conteúdo rolável" :code="$scrollableCode" :html="$scrollableHtml">
            <x-slot:description>
                <code>scrollable</code> mantém cabeçalho e rodapé fixos; só o corpo rola quando o conteúdo é maior que o painel.
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="long-content" color="secondary" variant="outline">Termos de uso</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="long-content" title="Termos de uso" scrollable>
                <div class="space-y-3 text-sm text-muted-foreground">
                    @foreach (range(1, 12) as $paragraph)
                        <p class="m-0">Parágrafo {{ $paragraph }} — texto de exemplo para demonstrar a rolagem interna do drawer.</p>
                    @endforeach
                </div>
                <x-slot:footer>
                    <x-ui.drawer.drawer-trigger name="long-content" action="close">Fechar</x-ui.drawer.drawer-trigger>
                </x-slot:footer>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Backdrop estático" :code="$staticBackdropCode" :html="$staticBackdropHtml">
            <x-slot:description>
                <code>staticBackdrop</code> impede fechar clicando fora — só o botão de fechar ou <code>Escape</code>
                (desligável com <code>:keyboard="false"</code>).
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="confirm-required" color="warning">Ação sensível</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="confirm-required" title="Confirme para continuar" description="Clique fora não fecha" color="warning" staticBackdrop>
                <p class="m-0 text-sm text-muted-foreground">Esta ação exige confirmação explícita — clicar fora não fecha o painel.</p>
                <x-slot:footer>
                    <x-ui.drawer.drawer-trigger name="confirm-required" action="close" variant="outline" color="secondary">Cancelar</x-ui.drawer.drawer-trigger>
                    <x-ui.drawer.drawer-trigger name="confirm-required" action="close" color="warning">Confirmar</x-ui.drawer.drawer-trigger>
                </x-slot:footer>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Sem backdrop (não bloqueia a página)" :code="$noBackdropCode" :html="$noBackdropHtml">
            <x-slot:description>
                <code>:backdrop="false"</code> remove a camada escura; combinado com <code>bodyScroll</code> a página
                continua rolável e clicável por trás do painel — útil para um painel de filtros "sempre disponível".
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="live-filters" color="secondary" variant="outline">Filtros</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="live-filters" placement="start" title="Filtros" variant="soft" :backdrop="false" bodyScroll>
                <p class="m-0 text-sm text-muted-foreground">Ajuste os filtros e continue navegando na página ao lado.</p>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Drawers encadeados" :code="$chainedCode" :html="$chainedHtml">
            <x-slot:description>
                <code>closes</code> fecha um drawer ao abrir outro — fluxo de carrinho → checkout, cada um com sua própria
                posição e estilo de cabeçalho.
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="cart">Ver carrinho</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="cart" title="Carrinho (2 itens)" description="Subtotal R$ 159,80">
                <ul class="m-0 flex list-none flex-col gap-3 p-0 text-sm">
                    <li class="flex items-center justify-between gap-3 rounded-lg border border-border px-3 py-2.5">
                        <span>
                            <span class="block font-medium">Camiseta básica</span>
                            <span class="text-xs text-muted-foreground">M · Branca</span>
                        </span>
                        <span class="font-medium tabular-nums">R$ 79,90</span>
                    </li>
                    <li class="flex items-center justify-between gap-3 rounded-lg border border-border px-3 py-2.5">
                        <span>
                            <span class="block font-medium">Boné logo</span>
                            <span class="text-xs text-muted-foreground">Único</span>
                        </span>
                        <span class="font-medium tabular-nums">R$ 79,90</span>
                    </li>
                </ul>
                <x-slot:footer>
                    <x-ui.drawer.drawer-trigger name="checkout" action="open" :closes="['cart']" class="w-full justify-center">
                        Finalizar compra
                    </x-ui.drawer.drawer-trigger>
                </x-slot:footer>
            </x-ui.drawer>

            <x-ui.drawer name="checkout" title="Finalizar compra" description="Pagamento seguro" placement="start" color="success" variant="soft">
                <div class="flex flex-col gap-3 text-sm">
                    <label class="font-medium">Cartão
                        <input type="text" class="mt-1 w-full rounded-md border border-border bg-background px-3 py-2" placeholder="•••• •••• •••• 4242" />
                    </label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="font-medium">Validade
                            <input type="text" class="mt-1 w-full rounded-md border border-border bg-background px-3 py-2" placeholder="MM/AA" />
                        </label>
                        <label class="font-medium">CVC
                            <input type="text" class="mt-1 w-full rounded-md border border-border bg-background px-3 py-2" placeholder="123" />
                        </label>
                    </div>
                </div>
                <x-slot:footer>
                    <x-ui.drawer.drawer-trigger name="cart" action="open" :closes="['checkout']" variant="outline" color="secondary">
                        Voltar
                    </x-ui.drawer.drawer-trigger>
                    <x-ui.drawer.drawer-trigger name="checkout" action="close" color="success">Pagar R$ 159,80</x-ui.drawer.drawer-trigger>
                </x-slot:footer>
            </x-ui.drawer>
        </x-ui.example>

        <x-ui.example title="Sem botão de fechar no cabeçalho" :code="$noCloseButtonCode" :html="$noCloseButtonHtml">
            <x-slot:description>
                <code>:closeButton="false"</code> — force o usuário a escolher uma ação em vez de simplesmente fechar.
            </x-slot:description>
            <x-ui.drawer.drawer-trigger name="pick-one" color="secondary" variant="outline">Escolher opção</x-ui.drawer.drawer-trigger>

            <x-ui.drawer name="pick-one" title="Escolha uma opção" description="Selecione para continuar" :closeButton="false" rounded placement="bottom" size="md">
                <div class="flex flex-col gap-2">
                    <x-ui.drawer.drawer-trigger name="pick-one" action="close" variant="outline" color="secondary" class="w-full justify-center">Opção A</x-ui.drawer.drawer-trigger>
                    <x-ui.drawer.drawer-trigger name="pick-one" action="close" variant="outline" color="secondary" class="w-full justify-center">Opção B</x-ui.drawer.drawer-trigger>
                </div>
            </x-ui.drawer>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="drawer" />
</x-ui.docs>
