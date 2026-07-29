<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.breadcrumb>
            <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item href="#">Produtos</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Detalhe do produto</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $basicHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <i class="bi bi-house shrink-0 leading-none text-sm" aria-hidden="true"></i>
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Produtos</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                        <span class="min-w-0">Detalhe do produto</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $softCode = <<<'BLADE'
        <x-ui.breadcrumb variant="soft">
            <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item href="#">Projetos</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Board</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $softHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full rounded-lg border border-border/60 bg-muted/40 px-3 py-2">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <i class="bi bi-house shrink-0 leading-none text-sm" aria-hidden="true"></i>
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Projetos</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                        <span class="min-w-0">Board</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $pillsCode = <<<'BLADE'
        <x-ui.breadcrumb variant="pills" color="info">
            <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item href="#">Clientes</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Maria Silva</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $pillsHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full rounded-lg">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-2 py-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground hover:text-info">
                        <i class="bi bi-house shrink-0 leading-none text-sm" aria-hidden="true"></i>
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-2 py-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground hover:text-info">
                        <span class="min-w-0">Clientes</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-2 py-0.5 bg-info/10 text-info font-semibold">
                        <span class="min-w-0">Maria Silva</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $separatorSlashCode = <<<'BLADE'
        <x-ui.breadcrumb separator="/">
            <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item href="#">Configurações</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Perfil</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $separatorSlashHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <span class="font-medium">/</span>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <span class="font-medium">/</span>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Configurações</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <span class="font-medium">/</span>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                        <span class="min-w-0">Perfil</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $separatorDotCode = <<<'BLADE'
        <x-ui.breadcrumb separator="·">
            <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item href="#">Blog</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Artigo</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $separatorDotHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <span class="font-medium">·</span>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <span class="font-medium">·</span>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Blog</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <span class="font-medium">·</span>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                        <span class="min-w-0">Artigo</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $separatorIconCode = <<<'BLADE'
        <x-ui.breadcrumb separator="bi-arrow-right-short">
            <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item href="#">Relatórios</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Vendas</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $separatorIconHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-arrow-right-short leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-arrow-right-short leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Relatórios</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-arrow-right-short leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                        <span class="min-w-0">Vendas</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $iconsCode = <<<'BLADE'
        <x-ui.breadcrumb>
            <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-folder">Projetos</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item icon="bi-file-earmark-text" active>Contrato.pdf</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $iconsHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <i class="bi bi-house shrink-0 leading-none text-sm" aria-hidden="true"></i>
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <i class="bi bi-folder shrink-0 leading-none text-sm" aria-hidden="true"></i>
                        <span class="min-w-0">Projetos</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                        <i class="bi bi-file-earmark-text shrink-0 leading-none text-sm" aria-hidden="true"></i>
                        <span class="min-w-0">Contrato.pdf</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $truncateCode = <<<'BLADE'
        <x-ui.breadcrumb class="max-w-md">
            <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item href="#">Documentos</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item truncate active>
                Relatório financeiro consolidado do segundo trimestre 2026.pdf
            </x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $truncateHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full max-w-md">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <i class="bi bi-house shrink-0 leading-none text-sm" aria-hidden="true"></i>
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Documentos</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold min-w-0">
                        <span class="min-w-0 truncate">Relatório financeiro consolidado do segundo trimestre 2026.pdf</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $collapseCode = <<<'BLADE'
        <x-ui.breadcrumb variant="soft">
            <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-collapse label="Mostrar pastas ocultas">
                <x-ui.dropdown.dropdown-item href="#">Documentos</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">2026</x-ui.dropdown.dropdown-item>
                <x-ui.dropdown.dropdown-item href="#">Julho</x-ui.dropdown.dropdown-item>
            </x-ui.breadcrumb.breadcrumb-collapse>
            <x-ui.breadcrumb.breadcrumb-item href="#">Contratos</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Contrato.pdf</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $collapseHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full rounded-lg border border-border/60 bg-muted/40 px-3 py-2">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <i class="bi bi-house shrink-0 leading-none text-sm" aria-hidden="true"></i>
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <div class="inline-block">
                        <button
                            type="button"
                            aria-expanded="false"
                            aria-label="Mostrar pastas ocultas"
                            class="inline-flex items-center justify-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 size-7 text-sm rounded-md text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground"
                        >
                            <i class="bi bi-three-dots leading-none" aria-hidden="true"></i>
                        </button>
                        <div hidden role="menu" class="z-50 min-w-48 rounded-md border border-border bg-popover py-1 shadow-lg">
                            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                                <span class="min-w-0 flex-1 truncate">Documentos</span>
                            </a>
                            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                                <span class="min-w-0 flex-1 truncate">2026</span>
                            </a>
                            <a href="#" role="menuitem" class="flex w-full items-center gap-2.5 px-4 py-2 text-left text-sm transition-colors text-popover-foreground hover:bg-header-hover">
                                <span class="min-w-0 flex-1 truncate">Julho</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Contratos</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                        <span class="min-w-0">Contrato.pdf</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $headerCode = <<<'BLADE'
        <div class="flex flex-col gap-2">
            <x-ui.breadcrumb variant="plain" size="sm">
                <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#">Catálogo</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Camisetas</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
            <h2 class="text-xl font-semibold tracking-tight text-foreground">Camisetas</h2>
            <p class="text-sm text-muted-foreground">Gerencie produtos desta categoria.</p>
        </div>
        BLADE;

    $headerHtml = <<<'HTML'
        <div class="flex flex-col gap-2">
            <nav aria-label="breadcrumb" class="w-full">
                <ol class="flex flex-wrap items-center text-xs gap-1">
                    <li class="flex min-w-0 items-center gap-1 first:[&>[data-separator]]:hidden">
                        <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-[0.7rem]" aria-hidden="true">
                            <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                        </span>
                        <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1 rounded-md px-1 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                            <i class="bi bi-house shrink-0 leading-none text-[0.7rem]" aria-hidden="true"></i>
                            <span class="min-w-0">Início</span>
                        </a>
                    </li>
                    <li class="flex min-w-0 items-center gap-1 first:[&>[data-separator]]:hidden">
                        <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-[0.7rem]" aria-hidden="true">
                            <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                        </span>
                        <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1 rounded-md px-1 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                            <span class="min-w-0">Catálogo</span>
                        </a>
                    </li>
                    <li class="flex min-w-0 items-center gap-1 first:[&>[data-separator]]:hidden">
                        <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-[0.7rem]" aria-hidden="true">
                            <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                        </span>
                        <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1 rounded-md px-1 py-0.5 text-foreground font-semibold">
                            <span class="min-w-0">Camisetas</span>
                        </span>
                    </li>
                </ol>
            </nav>
            <h2 class="text-xl font-semibold tracking-tight text-foreground">Camisetas</h2>
            <p class="text-sm text-muted-foreground">Gerencie produtos desta categoria.</p>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.breadcrumb color="success" variant="pills">
            <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item href="#">Financeiro</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Faturas</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $colorsHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full rounded-lg">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-2 py-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground hover:text-success">
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-2 py-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground hover:text-success">
                        <span class="min-w-0">Financeiro</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-2 py-0.5 bg-success/10 text-success font-semibold">
                        <span class="min-w-0">Faturas</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $sizesCode = <<<'BLADE'
        <x-ui.breadcrumb size="sm">
            <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Pequeno</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>

        <x-ui.breadcrumb size="md">
            <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Médio</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>

        <x-ui.breadcrumb size="lg">
            <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Grande</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $sizesHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full">
            <ol class="flex flex-wrap items-center text-xs gap-1">
                <li class="flex min-w-0 items-center gap-1 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-[0.7rem]" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1 rounded-md px-1 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-[0.7rem]" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1 rounded-md px-1 py-0.5 text-foreground font-semibold">
                        <span class="min-w-0">Pequeno</span>
                    </span>
                </li>
            </ol>
        </nav>

        <nav aria-label="breadcrumb" class="w-full">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                        <span class="min-w-0">Médio</span>
                    </span>
                </li>
            </ol>
        </nav>

        <nav aria-label="breadcrumb" class="w-full">
            <ol class="flex flex-wrap items-center text-base gap-2">
                <li class="flex min-w-0 items-center gap-2 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-base" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-2 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-2 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-base" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-2 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                        <span class="min-w-0">Grande</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;

    $disabledCode = <<<'BLADE'
        <x-ui.breadcrumb>
            <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item disabled>Sem permissão</x-ui.breadcrumb.breadcrumb-item>
            <x-ui.breadcrumb.breadcrumb-item active>Página atual</x-ui.breadcrumb.breadcrumb-item>
        </x-ui.breadcrumb>
        BLADE;

    $disabledHtml = <<<'HTML'
        <nav aria-label="breadcrumb" class="w-full">
            <ol class="flex flex-wrap items-center text-sm gap-1.5">
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <a href="#" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground transition-colors hover:bg-muted/70 hover:text-foreground hover:text-primary">
                        <span class="min-w-0">Início</span>
                    </a>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-disabled="true" tabindex="-1" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-muted-foreground/45 cursor-not-allowed">
                        <span class="min-w-0">Sem permissão</span>
                    </span>
                </li>
                <li class="flex min-w-0 items-center gap-1.5 first:[&>[data-separator]]:hidden">
                    <span data-separator class="flex shrink-0 items-center text-muted-foreground/50 text-sm" aria-hidden="true">
                        <i class="bi bi-chevron-right leading-none" aria-hidden="true"></i>
                    </span>
                    <span aria-current="page" class="inline-flex max-w-full items-center outline-none focus-visible:ring-2 focus-visible:ring-primary/30 focus-visible:ring-offset-1 gap-1.5 rounded-md px-1.5 py-0.5 text-foreground font-semibold">
                        <span class="min-w-0">Página atual</span>
                    </span>
                </li>
            </ol>
        </nav>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.breadcrumb&gt;</code> — trilha composta por
            <code>&lt;x-ui.breadcrumb.breadcrumb-item&gt;</code>. Variantes
            <code>plain</code>, <code>soft</code> e <code>pills</code>; separadores
            ícone/texto; <code>truncate</code> em nomes longos; e
            <code>&lt;x-ui.breadcrumb.breadcrumb-collapse&gt;</code> para o meio da trilha.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Separador padrão <code>bi-chevron-right</code>. Último item com <code>active</code>.
            </x-slot:description>
            <x-ui.breadcrumb>
                <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#">Produtos</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Detalhe do produto</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Variante soft" :code="$softCode" :html="$softHtml">
            <x-slot:description>
                <code>variant="soft"</code> — trilha em faixa suave com borda leve.
            </x-slot:description>
            <x-ui.breadcrumb variant="soft">
                <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#">Projetos</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Board</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Variante pills" :code="$pillsCode" :html="$pillsHtml">
            <x-slot:description>
                <code>variant="pills"</code> — itens com padding; o ativo usa o token de <code>color</code>.
            </x-slot:description>
            <x-ui.breadcrumb variant="pills" color="info">
                <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#">Clientes</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Maria Silva</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Separador com caractere" :code="$separatorSlashCode" :html="$separatorSlashHtml">
            <x-slot:description>
                String sem <code>bi-</code> vira texto literal (ex.: <code>/</code>).
            </x-slot:description>
            <x-ui.breadcrumb separator="/">
                <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#">Configurações</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Perfil</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Separador ponto" :code="$separatorDotCode" :html="$separatorDotHtml">
            <x-slot:description>
                <code>separator="·"</code> — estilo editorial mais discreto.
            </x-slot:description>
            <x-ui.breadcrumb separator="·">
                <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#">Blog</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Artigo</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Separador seta" :code="$separatorIconCode" :html="$separatorIconHtml">
            <x-slot:description>
                Qualquer <code>bi-*</code> funciona — aqui <code>bi-arrow-right-short</code>.
            </x-slot:description>
            <x-ui.breadcrumb separator="bi-arrow-right-short">
                <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#">Relatórios</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Vendas</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Ícones por item" :code="$iconsCode" :html="$iconsHtml">
            <x-slot:description>
                <code>icon</code> em cada item (Bootstrap Icons).
            </x-slot:description>
            <x-ui.breadcrumb>
                <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-folder">Projetos</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item icon="bi-file-earmark-text" active>Contrato.pdf</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Truncate" :code="$truncateCode" :html="$truncateHtml">
            <x-slot:description>
                <code>truncate</code> no item + largura no pai para nomes longos.
            </x-slot:description>
            <x-ui.breadcrumb class="max-w-md">
                <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#">Documentos</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item truncate active>
                    Relatório financeiro consolidado do segundo trimestre 2026.pdf
                </x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Trecho colapsado" :code="$collapseCode" :html="$collapseHtml">
            <x-slot:description>
                <code>&lt;x-ui.breadcrumb.breadcrumb-collapse&gt;</code> + <code>&lt;x-ui.dropdown.dropdown-item&gt;</code> no slot.
            </x-slot:description>
            <x-ui.breadcrumb variant="soft">
                <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-collapse label="Mostrar pastas ocultas">
                    <x-ui.dropdown.dropdown-item href="#">Documentos</x-ui.dropdown.dropdown-item>
                    <x-ui.dropdown.dropdown-item href="#">2026</x-ui.dropdown.dropdown-item>
                    <x-ui.dropdown.dropdown-item href="#">Julho</x-ui.dropdown.dropdown-item>
                </x-ui.breadcrumb.breadcrumb-collapse>
                <x-ui.breadcrumb.breadcrumb-item href="#">Contratos</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Contrato.pdf</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Cabeçalho de página" :code="$headerCode" :html="$headerHtml">
            <x-slot:description>
                Padrão comum: breadcrumb pequeno acima do título da página.
            </x-slot:description>
            <div class="flex w-full flex-col gap-2">
                <x-ui.breadcrumb variant="plain" size="sm">
                    <x-ui.breadcrumb.breadcrumb-item href="#" icon="bi-house">Início</x-ui.breadcrumb.breadcrumb-item>
                    <x-ui.breadcrumb.breadcrumb-item href="#">Catálogo</x-ui.breadcrumb.breadcrumb-item>
                    <x-ui.breadcrumb.breadcrumb-item active>Camisetas</x-ui.breadcrumb.breadcrumb-item>
                </x-ui.breadcrumb>
                <h2 class="text-xl font-semibold tracking-tight text-foreground">Camisetas</h2>
                <p class="text-sm text-muted-foreground">Gerencie produtos desta categoria.</p>
            </div>
        </x-ui.example>

        <x-ui.example title="Cor + pills" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> no hover dos links e no pill do item <code>active</code> (variante pills).
            </x-slot:description>
            <x-ui.breadcrumb color="success" variant="pills">
                <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item href="#">Financeiro</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Faturas</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Item desabilitado" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> — sem navegação, aparência esmaecida.
            </x-slot:description>
            <x-ui.breadcrumb>
                <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item disabled>Sem permissão</x-ui.breadcrumb.breadcrumb-item>
                <x-ui.breadcrumb.breadcrumb-item active>Página atual</x-ui.breadcrumb.breadcrumb-item>
            </x-ui.breadcrumb>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size="sm"</code>, <code>md</code> e <code>lg</code>.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.breadcrumb size="sm">
                    <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
                    <x-ui.breadcrumb.breadcrumb-item active>Pequeno</x-ui.breadcrumb.breadcrumb-item>
                </x-ui.breadcrumb>

                <x-ui.breadcrumb size="md">
                    <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
                    <x-ui.breadcrumb.breadcrumb-item active>Médio</x-ui.breadcrumb.breadcrumb-item>
                </x-ui.breadcrumb>

                <x-ui.breadcrumb size="lg">
                    <x-ui.breadcrumb.breadcrumb-item href="#">Início</x-ui.breadcrumb.breadcrumb-item>
                    <x-ui.breadcrumb.breadcrumb-item active>Grande</x-ui.breadcrumb.breadcrumb-item>
                </x-ui.breadcrumb>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="breadcrumb" />
</x-ui.docs>
