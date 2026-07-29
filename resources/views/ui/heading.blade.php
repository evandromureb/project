<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.heading title="Produtos" />
        BLADE;

    $basicHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex min-w-0 gap-3.5 items-center">
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Produtos</h1>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $descriptionCode = <<<'BLADE'
        <x-ui.heading title="Produtos" description="Gerencie o catálogo da sua loja." />
        BLADE;

    $descriptionHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex min-w-0 gap-3.5 items-center">
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Produtos</h1>
                    </div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Gerencie o catálogo da sua loja.</p>
                </div>
            </div>
        </div>
        HTML;

    $iconCode = <<<'BLADE'
        <x-ui.heading
            title="Pedidos"
            description="Acompanhe o status de cada pedido."
            icon="bi-bag-check-fill"
            iconColor="success"
        />
        BLADE;

/*     ícone soft: "bg-success/15 text-success ring-success/15" + iconBoxSize md "size-11 rounded-xl" 
*/
    $iconHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-success/15 text-success ring-success/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                    <i class="bi bi-bag-check-fill text-xl leading-none"></i>
                </span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Pedidos</h1>
                    </div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Acompanhe o status de cada pedido.</p>
                </div>
            </div>
        </div>
        HTML;

    $iconVariantsCode = <<<'BLADE'
        <x-ui.heading title="Soft" icon="bi-box-seam" iconVariant="soft" iconColor="primary" />
        <x-ui.heading title="Solid" icon="bi-box-seam" iconVariant="solid" iconColor="primary" />
        <x-ui.heading title="Outline" icon="bi-box-seam" iconVariant="outline" iconColor="primary" />
        BLADE;

    $iconVariantsHtml = <<<'HTML'
        <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-box-seam text-xl leading-none"></i></span>
        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Soft</h1>

        <span class="bg-primary text-primary-foreground ring-primary/30 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-box-seam text-xl leading-none"></i></span>
        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Solid</h1>

        <span class="border border-primary/30 bg-card text-primary ring-0 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-box-seam text-xl leading-none"></i></span>
        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Outline</h1>
        HTML;

    $iconSizesCode = <<<'BLADE'
        <x-ui.heading title="Pequeno" icon="bi-stars" iconSize="sm" iconColor="info" />
        <x-ui.heading title="Médio" icon="bi-stars" iconSize="md" iconColor="info" />
        <x-ui.heading title="Grande" icon="bi-stars" iconSize="lg" iconColor="info" />
        BLADE;

/*     iconSize: sm="size-9 rounded-lg"/"text-base", md="size-11 rounded-xl"/"text-xl", lg="size-14 rounded-2xl"/"text-2xl" 
*/
    $iconSizesHtml = <<<'HTML'
        <span class="bg-info/15 text-info ring-info/15 size-9 rounded-lg flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-stars text-base leading-none"></i></span>
        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Pequeno</h1>

        <span class="bg-info/15 text-info ring-info/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-stars text-xl leading-none"></i></span>
        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Médio</h1>

        <span class="bg-info/15 text-info ring-info/15 size-14 rounded-2xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-stars text-2xl leading-none"></i></span>
        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Grande</h1>
        HTML;

    $eyebrowCode = <<<'BLADE'
        <x-ui.heading
            eyebrow="Financeiro"
            title="Faturas"
            description="Emitidas nos últimos 30 dias."
            icon="bi-receipt"
            iconColor="info"
        />
        BLADE;

    $eyebrowHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-info/15 text-info ring-info/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-receipt text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <p class="mb-0.5 text-xs font-semibold tracking-wide text-muted-foreground uppercase truncate">Financeiro</p>
                    <div class="flex flex-wrap items-center gap-2">
                        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Faturas</h1>
                    </div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Emitidas nos últimos 30 dias.</p>
                </div>
            </div>
        </div>
        HTML;

    $badgeCode = <<<'BLADE'
        <x-ui.heading
            title="Inbox"
            description="Mensagens da equipe."
            icon="bi-inbox-fill"
            iconColor="primary"
            badge="12 novas"
            badgeColor="danger"
        />
        BLADE;

    $badgeHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-inbox-fill text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Inbox</h1>
                        <span class="inline-flex items-center font-medium leading-none bg-danger/15 text-danger gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>12 novas</span></span>
                    </div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Mensagens da equipe.</p>
                </div>
            </div>
        </div>
        HTML;

    $variantsCode = <<<'BLADE'
        <x-ui.heading title="Soft" description="Fundo muted." variant="soft" icon="bi-layers" />
        <x-ui.heading title="Accent" description="Borda colorida à esquerda." variant="accent" icon="bi-bookmark-fill" iconColor="success" />
        <x-ui.heading title="Bordered" description="Card com borda e sombra." variant="bordered" icon="bi-card-heading" iconColor="secondary" />
        BLADE;

    $variantsHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between rounded-xl bg-muted/50 px-4 py-3.5">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-layers text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2"><h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Soft</h1></div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Fundo muted.</p>
                </div>
            </div>
        </div>

        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between rounded-xl border border-border border-l-4 border-l-success bg-card px-4 py-3.5">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-success/15 text-success ring-success/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-bookmark-fill text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2"><h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Accent</h1></div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Borda colorida à esquerda.</p>
                </div>
            </div>
        </div>

        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between rounded-xl border border-border bg-card px-4 py-3.5 shadow-sm">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-secondary/15 text-secondary ring-secondary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-card-heading text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2"><h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Bordered</h1></div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Card com borda e sombra.</p>
                </div>
            </div>
        </div>
        HTML;

    $actionsCode = <<<'BLADE'
        <x-ui.heading title="Clientes" description="42 clientes cadastrados." icon="bi-people-fill">
            <x-ui.button variant="outline" color="secondary" size="sm" icon="bi-download">Exportar</x-ui.button>
            <x-ui.button color="primary" size="sm" icon="bi-plus-lg">Novo cliente</x-ui.button>
        </x-ui.heading>
        BLADE;

    $actionsHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-people-fill text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2"><h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Clientes</h1></div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">42 clientes cadastrados.</p>
                </div>
            </div>
            <div class="flex shrink-0 flex-wrap items-center gap-2">
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-download shrink-0 leading-none" aria-hidden="true"></i><span>Exportar</span></button>
                <button type="button" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i><span>Novo cliente</span></button>
            </div>
        </div>
        HTML;

    $metaCode = <<<'BLADE'
        <x-ui.heading title="Campanha de verão" icon="bi-megaphone-fill" iconColor="warning" badge="Ativa" badgeColor="success">
            <x-slot:meta>
                <span class="inline-flex items-center gap-1"><i class="bi bi-calendar3"></i> 12 Jul – 30 Ago</span>
                <span class="text-border">·</span>
                <span class="inline-flex items-center gap-1"><i class="bi bi-eye"></i> 8.4k views</span>
            </x-slot:meta>
            <x-ui.button size="sm" variant="outline" color="secondary">Editar</x-ui.button>
        </x-ui.heading>
        BLADE;

    $metaHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-warning/15 text-warning ring-warning/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-megaphone-fill text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Campanha de verão</h1>
                        <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>Ativa</span></span>
                    </div>
                    <div class="mt-2 flex flex-wrap items-center gap-2 text-xs text-muted-foreground">
                        <span class="inline-flex items-center gap-1"><i class="bi bi-calendar3" aria-hidden="true"></i> 12 Jul – 30 Ago</span>
                        <span class="text-border" aria-hidden="true">·</span>
                        <span class="inline-flex items-center gap-1"><i class="bi bi-eye" aria-hidden="true"></i> 8.4k views</span>
                    </div>
                </div>
            </div>
            <div class="flex shrink-0 flex-wrap items-center gap-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
            </div>
        </div>
        HTML;

    $breadcrumbCode = <<<'BLADE'
        <x-ui.heading title="Contrato.pdf" icon="bi-file-earmark-text-fill" iconColor="warning">
            <x-ui.breadcrumb>
                <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#">Documentos</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Contrato.pdf</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.heading>
        BLADE;

    $breadcrumbHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-warning/15 text-warning ring-warning/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-file-earmark-text-fill text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2"><h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Contrato.pdf</h1></div>
                </div>
            </div>
            <div class="flex shrink-0 flex-wrap items-center gap-2">
                <nav aria-label="breadcrumb" class="w-full">
                    <ol class="flex flex-wrap items-center text-sm gap-1.5">
                        <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                            <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true"><i class="bi bi-chevron-right leading-none" aria-hidden="true"></i></span>
                            <a href="#" class="inline-flex max-w-full items-center outline-none gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                                <i class="bi bi-house shrink-0 leading-none text-sm" aria-hidden="true"></i>
                                <span class="min-w-0">Início</span>
                            </a>
                        </li>
                        <li class="flex min-w-0 items-center gap-1.5">
                            <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true"><i class="bi bi-chevron-right leading-none" aria-hidden="true"></i></span>
                            <a href="#" class="inline-flex max-w-full items-center outline-none gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                                <span class="min-w-0">Documentos</span>
                            </a>
                        </li>
                        <li class="flex min-w-0 items-center gap-1.5">
                            <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true"><i class="bi bi-chevron-right leading-none" aria-hidden="true"></i></span>
                            <span aria-current="page" class="inline-flex max-w-full items-center outline-none gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                                <span class="min-w-0">Contrato.pdf</span>
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        HTML;

    $levelsCode = <<<'BLADE'
        <x-ui.heading title="Nível 1 (padrão)" level="1" />
        <x-ui.heading title="Nível 2" level="2" />
        <x-ui.heading title="Nível 3" level="3" />
        BLADE;

/*     level define a tag semântica e (sem "size") o tamanho: 1=text-2xl, 2=text-xl, 3=text-lg 
*/
    $levelsHtml = <<<'HTML'
        <div class="flex flex-wrap items-center gap-2"><h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Nível 1 (padrão)</h1></div>
        <div class="flex flex-wrap items-center gap-2"><h2 class="text-xl truncate leading-tight font-semibold tracking-tight text-foreground">Nível 2</h2></div>
        <div class="flex flex-wrap items-center gap-2"><h3 class="text-lg truncate leading-tight font-semibold tracking-tight text-foreground">Nível 3</h3></div>
        HTML;

    $sizeOverrideCode = <<<'BLADE'
        <x-ui.heading title="Seção do formulário" level="3" size="sm" divider />
        BLADE;

/*     size="sm" -> text-lg, sobrescrevendo o text-lg que "level=3" já daria por padrão (mesmo valor aqui, mas a fonte da classe muda); divider + variant="default" -> "border-b border-border pb-4" 
*/
    $sizeOverrideHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between border-b border-border pb-4">
            <div class="flex min-w-0 gap-3.5 items-center">
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h3 class="text-lg truncate leading-tight font-semibold tracking-tight text-foreground">Seção do formulário</h3>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $alignStartCode = <<<'BLADE'
        <x-ui.heading title="Editar perfil" description="Atualize seus dados pessoais." align="start">
            <x-ui.button color="primary" size="sm">Salvar</x-ui.button>
        </x-ui.heading>
        BLADE;

/*     align="start" -> wrapperClasses "flex-col items-start" (sem sm:flex-row) 
*/
    $alignStartHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col items-start">
            <div class="flex min-w-0 gap-3.5 items-center">
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2"><h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Editar perfil</h1></div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Atualize seus dados pessoais.</p>
                </div>
            </div>
            <div class="flex shrink-0 flex-wrap items-center gap-2">
                <button type="button" class="btn btn-sm btn-primary">Salvar</button>
            </div>
        </div>
        HTML;

    $alignCenterCode = <<<'BLADE'
        <x-ui.heading
            title="Bem-vindo de volta"
            description="Escolha por onde começar hoje."
            icon="bi-emoji-smile"
            iconColor="primary"
            iconVariant="solid"
            align="center"
        >
            <x-ui.button color="primary" size="sm">Ir ao painel</x-ui.button>
            <x-ui.button variant="outline" color="secondary" size="sm">Ver tutoriais</x-ui.button>
        </x-ui.heading>
        BLADE;

    $alignCenterHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col items-center text-center">
            <div class="flex min-w-0 gap-3.5 items-center flex-col">
                <span class="bg-primary text-primary-foreground ring-primary/30 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-emoji-smile text-xl leading-none"></i></span>
                <div class="min-w-0 text-center">
                    <div class="flex flex-wrap items-center gap-2 justify-center">
                        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Bem-vindo de volta</h1>
                    </div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Escolha por onde começar hoje.</p>
                </div>
            </div>
            <div class="flex shrink-0 flex-wrap items-center gap-2 justify-center">
                <button type="button" class="btn btn-sm btn-primary">Ir ao painel</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Ver tutoriais</button>
            </div>
        </div>
        HTML;

    $dividerCode = <<<'BLADE'
        <x-ui.heading title="Preferências" description="Notificações e privacidade." divider icon="bi-gear-fill" />
        BLADE;

    $dividerHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between border-b border-border pb-4">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-gear-fill text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2"><h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Preferências</h1></div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Notificações e privacidade.</p>
                </div>
            </div>
        </div>
        HTML;

    $wrapCode = <<<'BLADE'
        <x-ui.heading
            title="Relatório consolidado de performance comercial"
            description="Inclui pedidos, cancelamentos, ticket médio e conversão por canal nos últimos 90 dias."
            icon="bi-graph-up-arrow"
            iconColor="success"
            :truncate="false"
        />
        BLADE;

/*     :truncate="false" troca "truncate" por "wrap-break-word" no título e na descrição, permitindo quebra de linha. 
*/
    $wrapHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-success/15 text-success ring-success/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-graph-up-arrow text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2">
                        <h1 class="text-2xl wrap-break-word leading-tight font-semibold tracking-tight text-foreground">Relatório consolidado de performance comercial</h1>
                    </div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground wrap-break-word">Inclui pedidos, cancelamentos, ticket médio e conversão por canal nos últimos 90 dias.</p>
                </div>
            </div>
        </div>
        HTML;

    $customIconCode = <<<'BLADE'
        <x-ui.heading title="Equipe de design" description="8 membros ativos.">
            <x-slot:iconSlot>
                <x-ui.avatar initials="EQ" size="md" color="primary" circle />
            </x-slot:iconSlot>
            <x-ui.button size="sm" variant="outline" color="secondary" icon="bi-person-plus">Convidar</x-ui.button>
        </x-ui.heading>
        BLADE;

    $customIconHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="flex shrink-0 items-center justify-center" aria-hidden="true">
                    <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full">
                        <span>EQ</span>
                    </div>
                </span>
                <div class="min-w-0">
                    <div class="flex flex-wrap items-center gap-2"><h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Equipe de design</h1></div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">8 membros ativos.</p>
                </div>
            </div>
            <div class="flex shrink-0 flex-wrap items-center gap-2">
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-person-plus shrink-0 leading-none" aria-hidden="true"></i><span>Convidar</span></button>
            </div>
        </div>
        HTML;

    $pageHeaderCode = <<<'BLADE'
        <x-ui.heading
            eyebrow="Catálogo"
            title="Produtos"
            description="Gerencie estoque, preços e variantes."
            icon="bi-box-seam-fill"
            iconColor="primary"
            iconVariant="soft"
            badge="248"
            badgeColor="secondary"
            variant="bordered"
        >
            <x-slot:meta>
                <span class="inline-flex items-center gap-1"><i class="bi bi-clock-history"></i> Atualizado há 5 min</span>
            </x-slot:meta>
            <x-ui.button variant="outline" color="secondary" size="sm" icon="bi-download">Exportar</x-ui.button>
            <x-ui.button color="primary" size="sm" icon="bi-plus-lg">Novo produto</x-ui.button>
        </x-ui.heading>
        BLADE;

    $pageHeaderHtml = <<<'HTML'
        <div class="flex min-w-0 gap-4 flex-col sm:flex-row sm:items-center sm:justify-between rounded-xl border border-border bg-card px-4 py-3.5 shadow-sm">
            <div class="flex min-w-0 gap-3.5 items-center">
                <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true"><i class="bi bi-box-seam-fill text-xl leading-none"></i></span>
                <div class="min-w-0">
                    <p class="mb-0.5 text-xs font-semibold tracking-wide text-muted-foreground uppercase truncate">Catálogo</p>
                    <div class="flex flex-wrap items-center gap-2">
                        <h1 class="text-2xl truncate leading-tight font-semibold tracking-tight text-foreground">Produtos</h1>
                        <span class="inline-flex items-center font-medium leading-none bg-secondary/15 text-secondary gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>248</span></span>
                    </div>
                    <p class="mt-1.5 text-sm leading-relaxed text-muted-foreground truncate">Gerencie estoque, preços e variantes.</p>
                    <div class="mt-2 flex flex-wrap items-center gap-2 text-xs text-muted-foreground">
                        <span class="inline-flex items-center gap-1"><i class="bi bi-clock-history" aria-hidden="true"></i> Atualizado há 5 min</span>
                    </div>
                </div>
            </div>
            <div class="flex shrink-0 flex-wrap items-center gap-2">
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-download shrink-0 leading-none" aria-hidden="true"></i><span>Exportar</span></button>
                <button type="button" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i><span>Novo produto</span></button>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.heading&gt;</code> é um cabeçalho de página/seção: ícone (soft/solid/outline),
            <code>eyebrow</code>, <code>title</code>, <code>badge</code>, <code>description</code>, slot
            <code>meta</code> e área de ações. Variantes visuais (<code>soft</code>, <code>accent</code>,
            <code>bordered</code>), alinhamentos (<code>between</code>, <code>start</code>, <code>center</code>)
            e <code>level</code>/<code>size</code> independentes para semântica vs tipografia.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Só <code>title</code>.
            </x-slot:description>
            <x-ui.heading title="Produtos" />
        </x-ui.example>

        <x-ui.example title="Com descrição" :code="$descriptionCode" :html="$descriptionHtml">
            <x-slot:description>
                Prop <code>description</code> — texto muted abaixo do título.
            </x-slot:description>
            <x-ui.heading title="Produtos" description="Gerencie o catálogo da sua loja." />
        </x-ui.example>

        <x-ui.example title="Com ícone" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                <code>icon</code> (Bootstrap Icons) + <code>iconColor</code> (token de cor).
            </x-slot:description>
            <x-ui.heading
                title="Pedidos"
                description="Acompanhe o status de cada pedido."
                icon="bi-bag-check-fill"
                iconColor="success"
            />
        </x-ui.example>

        <x-ui.example title="Com eyebrow" :code="$eyebrowCode" :html="$eyebrowHtml">
            <x-slot:description>
                <code>eyebrow</code> — rótulo pequeno em maiúsculas acima do título.
            </x-slot:description>
            <x-ui.heading
                eyebrow="Financeiro"
                title="Faturas"
                description="Emitidas nos últimos 30 dias."
                icon="bi-receipt"
                iconColor="info"
            />
        </x-ui.example>

        <x-ui.example title="Variantes de ícone" :code="$iconVariantsCode" :html="$iconVariantsHtml">
            <x-slot:description>
                <code>iconVariant="soft|solid|outline"</code> — mesmo padrão de badges/alerts.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.heading title="Soft (padrão)" icon="bi-box-seam" iconVariant="soft" iconColor="primary" />
                <x-ui.heading title="Solid" icon="bi-box-seam" iconVariant="solid" iconColor="primary" />
                <x-ui.heading title="Outline" icon="bi-box-seam" iconVariant="outline" iconColor="primary" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos de ícone" :code="$iconSizesCode" :html="$iconSizesHtml">
            <x-slot:description>
                <code>iconSize="sm|md|lg"</code> — independente do <code>size</code> do título.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.heading title="Pequeno" icon="bi-stars" iconSize="sm" iconColor="info" />
                <x-ui.heading title="Médio" icon="bi-stars" iconSize="md" iconColor="info" />
                <x-ui.heading title="Grande" icon="bi-stars" iconSize="lg" iconColor="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Com badge" :code="$badgeCode" :html="$badgeHtml">
            <x-slot:description>
                <code>badge</code> + <code>badgeColor</code> — pill ao lado do título. Use
                <code>badgeSlot</code> para markup customizado.
            </x-slot:description>
            <x-ui.heading
                title="Inbox"
                description="Mensagens da equipe."
                icon="bi-inbox-fill"
                iconColor="primary"
                badge="12 novas"
                badgeColor="danger"
            />
        </x-ui.example>

        <x-ui.example title="Variantes de container" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>variant="soft|accent|bordered"</code> — em <code>accent</code>, a cor da barra esquerda
                segue <code>iconColor</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.heading title="Soft" description="Fundo muted discreto." variant="soft" icon="bi-layers" iconColor="secondary" />
                <x-ui.heading title="Accent" description="Borda colorida à esquerda para destaque de seção." variant="accent" icon="bi-bookmark-fill" iconColor="success" />
                <x-ui.heading title="Bordered" description="Card com borda e sombra leve." variant="bordered" icon="bi-card-heading" iconColor="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Com ações" :code="$actionsCode" :html="$actionsHtml">
            <x-slot:description>
                O slot padrão vira a área de ações à direita (empilha em telas pequenas).
            </x-slot:description>
            <x-ui.heading title="Clientes" description="42 clientes cadastrados." icon="bi-people-fill">
                <x-ui.button variant="outline" color="secondary" size="sm" icon="bi-download">Exportar</x-ui.button>
                <x-ui.button color="primary" size="sm" icon="bi-plus-lg">Novo cliente</x-ui.button>
            </x-ui.heading>
        </x-ui.example>

        <x-ui.example title="Com meta" :code="$metaCode" :html="$metaHtml">
            <x-slot:description>
                Slot <code>meta</code> — linha de metadados abaixo da descrição (datas, contadores, status).
            </x-slot:description>
            <x-ui.heading title="Campanha de verão" icon="bi-megaphone-fill" iconColor="warning" badge="Ativa" badgeColor="success">
                <x-slot:meta>
                    <span class="inline-flex items-center gap-1"><i class="bi bi-calendar3" aria-hidden="true"></i> 12 Jul – 30 Ago</span>
                    <span class="text-border" aria-hidden="true">·</span>
                    <span class="inline-flex items-center gap-1"><i class="bi bi-eye" aria-hidden="true"></i> 8.4k views</span>
                </x-slot:meta>
                <x-ui.button size="sm" variant="outline" color="secondary">Editar</x-ui.button>
            </x-ui.heading>
        </x-ui.example>

        <x-ui.example title="Cabeçalho de página completo" :code="$pageHeaderCode" :html="$pageHeaderHtml">
            <x-slot:description>
                Combina eyebrow, ícone, badge, meta, variant e ações — padrão típico de listagem.
            </x-slot:description>
            <x-ui.heading
                eyebrow="Catálogo"
                title="Produtos"
                description="Gerencie estoque, preços e variantes."
                icon="bi-box-seam-fill"
                iconColor="primary"
                iconVariant="soft"
                badge="248"
                badgeColor="secondary"
                variant="bordered"
            >
                <x-slot:meta>
                    <span class="inline-flex items-center gap-1"><i class="bi bi-clock-history" aria-hidden="true"></i> Atualizado há 5 min</span>
                </x-slot:meta>
                <x-ui.button variant="outline" color="secondary" size="sm" icon="bi-download">Exportar</x-ui.button>
                <x-ui.button color="primary" size="sm" icon="bi-plus-lg">Novo produto</x-ui.button>
            </x-ui.heading>
        </x-ui.example>

        <x-ui.example title="Com breadcrumb" :code="$breadcrumbCode" :html="$breadcrumbHtml">
            <x-slot:description>
                O slot padrão também aceita <code>&lt;x-ui.breadcrumb&gt;</code> no lugar de botões.
            </x-slot:description>
            <x-ui.heading title="Contrato.pdf" icon="bi-file-earmark-text-fill" iconColor="warning">
                <x-ui.breadcrumb>
                    <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
                    <x-ui.breadcrumb.breadcrumb-item href="#">Documentos</x-ui.breadcrumb.breadcrumb-item>
                    <x-ui.breadcrumb.breadcrumb-item active>Contrato.pdf</x-ui.breadcrumb.breadcrumb-item>
                </x-ui.breadcrumb>
            </x-ui.heading>
        </x-ui.example>

        <x-ui.example title="Níveis semânticos" :code="$levelsCode" :html="$levelsHtml">
            <x-slot:description>
                <code>level</code> (1 a 6) define a tag <code>&lt;h1&gt;</code>–<code>&lt;h6&gt;</code> e, sem
                <code>size</code>, também o tamanho do texto.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.heading title="Nível 1 (padrão)" level="1" />
                <x-ui.heading title="Nível 2" level="2" />
                <x-ui.heading title="Nível 3" level="3" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanho independente do nível" :code="$sizeOverrideCode" :html="$sizeOverrideHtml">
            <x-slot:description>
                <code>size</code> (<code>sm|md|lg|xl</code>) sobrescreve o tamanho sem trocar a tag semântica.
            </x-slot:description>
            <x-ui.heading title="Seção do formulário" level="3" size="sm" divider />
        </x-ui.example>

        <x-ui.example title="Alinhamento empilhado" :code="$alignStartCode" :html="$alignStartHtml">
            <x-slot:description>
                <code>align="start"</code> — ações abaixo do título em vez de à direita.
            </x-slot:description>
            <x-ui.heading title="Editar perfil" description="Atualize seus dados pessoais." align="start">
                <x-ui.button color="primary" size="sm">Salvar</x-ui.button>
            </x-ui.heading>
        </x-ui.example>

        <x-ui.example title="Alinhamento centralizado" :code="$alignCenterCode" :html="$alignCenterHtml">
            <x-slot:description>
                <code>align="center"</code> — útil em empty states e telas de boas-vindas.
            </x-slot:description>
            <x-ui.heading
                title="Bem-vindo de volta"
                description="Escolha por onde começar hoje."
                icon="bi-emoji-smile"
                iconColor="primary"
                iconVariant="solid"
                align="center"
            >
                <x-ui.button color="primary" size="sm">Ir ao painel</x-ui.button>
                <x-ui.button variant="outline" color="secondary" size="sm">Ver tutoriais</x-ui.button>
            </x-ui.heading>
        </x-ui.example>

        <x-ui.example title="Com divisor" :code="$dividerCode" :html="$dividerHtml">
            <x-slot:description>
                <code>divider</code> — borda inferior (só na variant <code>default</code>), útil para separar seções.
            </x-slot:description>
            <x-ui.heading title="Preferências" description="Notificações e privacidade." divider icon="bi-gear-fill" />
        </x-ui.example>

        <x-ui.example title="Sem truncate (texto longo)" :code="$wrapCode" :html="$wrapHtml">
            <x-slot:description>
                <code>:truncate="false"</code> permite quebra de linha no título e na descrição.
            </x-slot:description>
            <x-ui.heading
                title="Relatório consolidado de performance comercial"
                description="Inclui pedidos, cancelamentos, ticket médio e conversão por canal nos últimos 90 dias."
                icon="bi-graph-up-arrow"
                iconColor="success"
                :truncate="false"
            />
        </x-ui.example>

        <x-ui.example title="Ícone customizado" :code="$customIconCode" :html="$customIconHtml">
            <x-slot:description>
                <code>x-slot:iconSlot</code> substitui o box colorido por qualquer markup (ex.: avatar) —
                sem o anel de cor por cima.
            </x-slot:description>
            <x-ui.heading title="Equipe de design" description="8 membros ativos.">
                <x-slot:iconSlot>
                    <x-ui.avatar initials="EQ" size="md" color="primary" circle />
                </x-slot:iconSlot>
                <x-ui.button size="sm" variant="outline" color="secondary" icon="bi-person-plus">Convidar</x-ui.button>
            </x-ui.heading>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="heading" />
</x-ui.docs>
