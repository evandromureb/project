<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    // Heredocs com fechamento na coluna 0 — evita ParseError de indentação
    // flexível do PHP quando o Livewire extrai a view SFC.
    $basicCode = <<<'BLADE'
<x-ui.list>
    <x-ui.list.list-item icon="bi-receipt">Enviar o acordo de cobrança</x-ui.list.list-item>
    <x-ui.list.list-item icon="bi-files">Enviar toda a documentação</x-ui.list.list-item>
    <x-ui.list.list-item icon="bi-chat-dots">Reunião para revisar o formulário</x-ui.list.list-item>
    <x-ui.list.list-item icon="bi-shield-check">Verificar tema e suporte ao cliente</x-ui.list.list-item>
</x-ui.list>
BLADE;

    $basicHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-receipt shrink-0 text-[1.05em] leading-none text-primary" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Enviar o acordo de cobrança</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-files shrink-0 text-[1.05em] leading-none text-primary" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Enviar toda a documentação</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-chat-dots shrink-0 text-[1.05em] leading-none text-primary" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Reunião para revisar o formulário</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-shield-check shrink-0 text-[1.05em] leading-none text-primary" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Verificar tema e suporte ao cliente</span>
    </li>
</ul>
HTML;

    $activeCode = <<<'BLADE'
<x-ui.list>
    <x-ui.list.list-item active>Enviar o acordo de cobrança</x-ui.list.list-item>
    <x-ui.list.list-item>Enviar toda a documentação</x-ui.list.list-item>
    <x-ui.list.list-item>Reunião para revisar o formulário</x-ui.list.list-item>
    <x-ui.list.list-item>Verificar tema e suporte ao cliente</x-ui.list.list-item>
    <x-ui.list.list-item>Começar a apresentação</x-ui.list.list-item>
</x-ui.list>
BLADE;

/*     active sem "color": colorClasses vira "z-[1] border-primary bg-primary text-primary-foreground" (aria-current="true"). 
*/
    $activeHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item aria-current="true" class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm z-[1] border-primary bg-primary text-primary-foreground">
        <span class="min-w-0 flex-1" data-list-body>Enviar o acordo de cobrança</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Enviar toda a documentação</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Reunião para revisar o formulário</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Verificar tema e suporte ao cliente</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Começar a apresentação</span>
    </li>
</ul>
HTML;

    $disabledCode = <<<'BLADE'
<x-ui.list>
    <x-ui.list.list-item disabled>
        <x-slot:start>
            <x-ui.avatar initials="JB" size="xs" color="primary" circle />
        </x-slot:start>
        James Ballard
    </x-ui.list.list-item>
    <x-ui.list.list-item>
        <x-slot:start>
            <x-ui.avatar initials="NM" size="xs" color="success" circle />
        </x-slot:start>
        Nancy Martino
    </x-ui.list.list-item>
    <x-ui.list.list-item>
        <x-slot:start>
            <x-ui.avatar initials="HB" size="xs" color="info" circle />
        </x-slot:start>
        Henry Baird
    </x-ui.list.list-item>
    <x-ui.list.list-item>
        <x-slot:start>
            <x-ui.avatar initials="EK" size="xs" color="warning" circle />
        </x-slot:start>
        Erica Kernan
    </x-ui.list.list-item>
</x-ui.list>
BLADE;

    $disabledHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item aria-disabled="true" class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground pointer-events-none cursor-not-allowed opacity-50">
        <span class="flex shrink-0 items-center" data-list-start>
            <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-6 text-xs bg-primary/15 text-primary rounded-full"><span>JB</span></div>
        </span>
        <span class="min-w-0 flex-1" data-list-body>James Ballard</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="flex shrink-0 items-center" data-list-start>
            <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-6 text-xs bg-success/15 text-success rounded-full"><span>NM</span></div>
        </span>
        <span class="min-w-0 flex-1" data-list-body>Nancy Martino</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="flex shrink-0 items-center" data-list-start>
            <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-6 text-xs bg-info/15 text-info rounded-full"><span>HB</span></div>
        </span>
        <span class="min-w-0 flex-1" data-list-body>Henry Baird</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="flex shrink-0 items-center" data-list-start>
            <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-6 text-xs bg-warning/15 text-warning rounded-full"><span>EK</span></div>
        </span>
        <span class="min-w-0 flex-1" data-list-body>Erica Kernan</span>
    </li>
</ul>
HTML;

    $linksCode = <<<'BLADE'
<x-ui.list tag="div">
    <x-ui.list.list-item href="#" active>O item ativo atual</x-ui.list.list-item>
    <x-ui.list.list-item href="#">Um segundo item da lista</x-ui.list.list-item>
    <x-ui.list.list-item href="#">Um terceiro item da lista</x-ui.list.list-item>
    <x-ui.list.list-item href="#">Um quarto item da lista</x-ui.list.list-item>
    <x-ui.list.list-item href="#" disabled>Um item desabilitado</x-ui.list.list-item>
</x-ui.list>
BLADE;

    $linksHtml = <<<'HTML'
<div data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <a href="#" data-list-item aria-current="true" class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm z-[1] border-primary bg-primary text-primary-foreground no-underline">
        <span class="min-w-0 flex-1" data-list-body>O item ativo atual</span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground cursor-pointer transition-colors duration-150 hover:bg-muted/70 focus-visible:bg-muted/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Um segundo item da lista</span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground cursor-pointer transition-colors duration-150 hover:bg-muted/70 focus-visible:bg-muted/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Um terceiro item da lista</span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground cursor-pointer transition-colors duration-150 hover:bg-muted/70 focus-visible:bg-muted/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Um quarto item da lista</span>
    </a>
    <a href="#" data-list-item aria-disabled="true" tabindex="-1" class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground pointer-events-none cursor-not-allowed opacity-50 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Um item desabilitado</span>
    </a>
</div>
HTML;

    $buttonsCode = <<<'BLADE'
<x-ui.list tag="div">
    <x-ui.list.list-item as="button" active>O item ativo atual</x-ui.list.list-item>
    <x-ui.list.list-item as="button">Um segundo item da lista</x-ui.list.list-item>
    <x-ui.list.list-item as="button">Um terceiro item da lista</x-ui.list.list-item>
    <x-ui.list.list-item as="button">Um quarto item da lista</x-ui.list.list-item>
    <x-ui.list.list-item as="button" disabled>Um item desabilitado</x-ui.list.list-item>
</x-ui.list>
BLADE;

    $buttonsHtml = <<<'HTML'
<div data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <button type="button" data-list-item aria-current="true" class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm z-[1] border-primary bg-primary text-primary-foreground no-underline appearance-none">
        <span class="min-w-0 flex-1" data-list-body>O item ativo atual</span>
    </button>
    <button type="button" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground cursor-pointer transition-colors duration-150 hover:bg-muted/70 focus-visible:bg-muted/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30 no-underline appearance-none">
        <span class="min-w-0 flex-1" data-list-body>Um segundo item da lista</span>
    </button>
    <button type="button" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground cursor-pointer transition-colors duration-150 hover:bg-muted/70 focus-visible:bg-muted/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30 no-underline appearance-none">
        <span class="min-w-0 flex-1" data-list-body>Um terceiro item da lista</span>
    </button>
    <button type="button" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground cursor-pointer transition-colors duration-150 hover:bg-muted/70 focus-visible:bg-muted/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30 no-underline appearance-none">
        <span class="min-w-0 flex-1" data-list-body>Um quarto item da lista</span>
    </button>
    <button type="button" data-list-item aria-disabled="true" disabled class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground pointer-events-none cursor-not-allowed opacity-50 no-underline appearance-none">
        <span class="min-w-0 flex-1" data-list-body>Um item desabilitado</span>
    </button>
</div>
HTML;

    $flushCode = <<<'BLADE'
<x-ui.list variant="flush">
    <x-ui.list.list-item>Um item da lista</x-ui.list.list-item>
    <x-ui.list.list-item>Um segundo item da lista</x-ui.list.list-item>
    <x-ui.list.list-item>Um terceiro item da lista</x-ui.list.list-item>
    <x-ui.list.list-item>Um quarto item da lista</x-ui.list.list-item>
</x-ui.list>
BLADE;

    $flushHtml = <<<'HTML'
<ul data-list data-variant="flush" data-horizontal="false" data-size="md" class="ui-list w-full rounded-none border-0 [&>[data-list-item]]:rounded-none [&>[data-list-item]]:border-x-0 first:[&>[data-list-item]]:border-t-0 last:[&>[data-list-item]]:border-b-0 flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Um item da lista</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Um segundo item da lista</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Um terceiro item da lista</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Um quarto item da lista</span>
    </li>
</ul>
HTML;

    $horizontalCode = <<<'BLADE'
<x-ui.list horizontal>
    <x-ui.list.list-item>Inbox</x-ui.list.list-item>
    <x-ui.list.list-item active>Profile</x-ui.list.list-item>
    <x-ui.list.list-item>Messages</x-ui.list.list-item>
    <x-ui.list.list-item>Settings</x-ui.list.list-item>
</x-ui.list>

{{-- A partir de um breakpoint --}}
<x-ui.list horizontal="md">
    <x-ui.list.list-item>Home</x-ui.list.list-item>
    <x-ui.list.list-item>About</x-ui.list.list-item>
    <x-ui.list.list-item>Contact</x-ui.list.list-item>
</x-ui.list>
BLADE;

    $horizontalHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="true" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-row [&>[data-list-item]]:border-b-0 [&>[data-list-item]]:border-r last:[&>[data-list-item]]:border-r-0">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Inbox</span>
    </li>
    <li data-list-item aria-current="true" class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm z-[1] border-primary bg-primary text-primary-foreground">
        <span class="min-w-0 flex-1" data-list-body>Profile</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Messages</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Settings</span>
    </li>
</ul>

<!-- horizontal="md": mesmas classes, mas com o prefixo de breakpoint "md:" -->
<ul data-list data-variant="default" data-horizontal="md" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border md:flex md:flex-row md:[&>[data-list-item]]:border-b-0 md:[&>[data-list-item]]:border-r md:last:[&>[data-list-item]]:border-r-0">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Home</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>About</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Contact</span>
    </li>
</ul>
HTML;

    $contextualCode = <<<'BLADE'
<x-ui.list>
    <x-ui.list.list-item>Item padrão sem cor</x-ui.list.list-item>
    <x-ui.list.list-item color="primary">Um item primary simples</x-ui.list.list-item>
    <x-ui.list.list-item color="secondary">Um item secondary simples</x-ui.list.list-item>
    <x-ui.list.list-item color="success">Um item success simples</x-ui.list.list-item>
    <x-ui.list.list-item color="danger">Um item danger simples</x-ui.list.list-item>
    <x-ui.list.list-item color="warning">Um item warning simples</x-ui.list.list-item>
    <x-ui.list.list-item color="info">Um item info simples</x-ui.list.list-item>
</x-ui.list>
BLADE;

/*     color-variant="soft" (padrão): colorClasses = "border-{cor}/25 bg-{cor}/10 text-{cor}" 
*/
    $contextualHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Item padrão sem cor</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-primary/25 bg-primary/10 text-primary">
        <span class="min-w-0 flex-1" data-list-body>Um item primary simples</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-secondary/25 bg-secondary/10 text-secondary">
        <span class="min-w-0 flex-1" data-list-body>Um item secondary simples</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-success/25 bg-success/10 text-success">
        <span class="min-w-0 flex-1" data-list-body>Um item success simples</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-danger/25 bg-danger/10 text-danger">
        <span class="min-w-0 flex-1" data-list-body>Um item danger simples</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-warning/25 bg-warning/10 text-warning">
        <span class="min-w-0 flex-1" data-list-body>Um item warning simples</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-info/25 bg-info/10 text-info">
        <span class="min-w-0 flex-1" data-list-body>Um item info simples</span>
    </li>
</ul>
HTML;

    $contextualLinksCode = <<<'BLADE'
<x-ui.list tag="div">
    <x-ui.list.list-item href="#">Item padrão sem cor</x-ui.list.list-item>
    <x-ui.list.list-item href="#" color="primary">Um item primary simples</x-ui.list.list-item>
    <x-ui.list.list-item href="#" color="secondary">Um item secondary simples</x-ui.list.list-item>
    <x-ui.list.list-item href="#" color="success">Um item success simples</x-ui.list.list-item>
    <x-ui.list.list-item href="#" color="danger">Um item danger simples</x-ui.list.list-item>
    <x-ui.list.list-item href="#" color="warning">Um item warning simples</x-ui.list.list-item>
    <x-ui.list.list-item href="#" color="info">Um item info simples</x-ui.list.list-item>
</x-ui.list>
BLADE;

    $contextualLinksHtml = <<<'HTML'
<div data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground cursor-pointer transition-colors duration-150 hover:bg-muted/70 focus-visible:bg-muted/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Item padrão sem cor</span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-primary/25 bg-primary/10 text-primary cursor-pointer transition-colors duration-150 hover:brightness-95 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Um item primary simples</span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-secondary/25 bg-secondary/10 text-secondary cursor-pointer transition-colors duration-150 hover:brightness-95 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Um item secondary simples</span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-success/25 bg-success/10 text-success cursor-pointer transition-colors duration-150 hover:brightness-95 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Um item success simples</span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-danger/25 bg-danger/10 text-danger cursor-pointer transition-colors duration-150 hover:brightness-95 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Um item danger simples</span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-warning/25 bg-warning/10 text-warning cursor-pointer transition-colors duration-150 hover:brightness-95 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Um item warning simples</span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-info/25 bg-info/10 text-info cursor-pointer transition-colors duration-150 hover:brightness-95 no-underline">
        <span class="min-w-0 flex-1" data-list-body>Um item info simples</span>
    </a>
</div>
HTML;

    $fillCode = <<<'BLADE'
<x-ui.list>
    <x-ui.list.list-item color="primary" color-variant="solid">Primary</x-ui.list.list-item>
    <x-ui.list.list-item color="secondary" color-variant="solid">Secondary</x-ui.list.list-item>
    <x-ui.list.list-item color="success" color-variant="solid">Success</x-ui.list.list-item>
    <x-ui.list.list-item color="danger" color-variant="solid">Danger</x-ui.list.list-item>
    <x-ui.list.list-item color="warning" color-variant="solid">Warning</x-ui.list.list-item>
    <x-ui.list.list-item color="info" color-variant="solid">Info</x-ui.list.list-item>
</x-ui.list>
BLADE;

    $fillHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-primary bg-primary text-primary-foreground">
        <span class="min-w-0 flex-1" data-list-body>Primary</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-secondary bg-secondary text-secondary-foreground">
        <span class="min-w-0 flex-1" data-list-body>Secondary</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-success bg-success text-success-foreground">
        <span class="min-w-0 flex-1" data-list-body>Success</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-danger bg-danger text-danger-foreground">
        <span class="min-w-0 flex-1" data-list-body>Danger</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-warning bg-warning text-warning-foreground">
        <span class="min-w-0 flex-1" data-list-body>Warning</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-info bg-info text-info-foreground">
        <span class="min-w-0 flex-1" data-list-body>Info</span>
    </li>
</ul>
HTML;

    $badgesCode = <<<'BLADE'
<x-ui.list>
    <x-ui.list.list-item>
        Inbox
        <x-slot:end>
            <x-ui.badge color="primary" variant="solid" pill>14</x-ui.badge>
        </x-slot:end>
    </x-ui.list.list-item>
    <x-ui.list.list-item>
        Profile
        <x-slot:end>
            <x-ui.badge color="success" variant="solid" pill>2</x-ui.badge>
        </x-slot:end>
    </x-ui.list.list-item>
    <x-ui.list.list-item>
        Messages
        <x-slot:end>
            <x-ui.badge color="warning" variant="solid" pill>99+</x-ui.badge>
        </x-slot:end>
    </x-ui.list.list-item>
    <x-ui.list.list-item>
        Settings
        <x-slot:end>
            <x-ui.badge color="danger" variant="solid" pill>2</x-ui.badge>
        </x-slot:end>
    </x-ui.list.list-item>
</x-ui.list>
BLADE;

    $badgesHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Inbox</span>
        <span class="ms-auto flex shrink-0 items-center gap-2" data-list-end>
            <span class="inline-flex items-center font-medium leading-none bg-primary text-primary-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full">14</span>
        </span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Profile</span>
        <span class="ms-auto flex shrink-0 items-center gap-2" data-list-end>
            <span class="inline-flex items-center font-medium leading-none bg-success text-success-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full">2</span>
        </span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Messages</span>
        <span class="ms-auto flex shrink-0 items-center gap-2" data-list-end>
            <span class="inline-flex items-center font-medium leading-none bg-warning text-warning-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full">99+</span>
        </span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Settings</span>
        <span class="ms-auto flex shrink-0 items-center gap-2" data-list-end>
            <span class="inline-flex items-center font-medium leading-none bg-danger text-danger-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full">2</span>
        </span>
    </li>
</ul>
HTML;

    $checkboxCode = <<<'BLADE'
<x-ui.list>
    <x-ui.list.list-item control="checkbox" name="tasks" value="1" title="Enviar o acordo de cobrança" checked />
    <x-ui.list.list-item control="checkbox" name="tasks" value="2" title="Enviar toda a documentação" />
    <x-ui.list.list-item control="checkbox" name="tasks" value="3" title="Reunião para revisar o formulário" />
    <x-ui.list.list-item control="checkbox" name="tasks" value="4" title="Verificar tema e suporte" disabled />
</x-ui.list>
BLADE;

    $checkboxHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <input id="list-checkbox-tasks-1" type="checkbox" name="tasks" value="1" checked class="size-4 shrink-0 rounded border-border text-primary focus-visible:ring-2 focus-visible:ring-primary/30">
        <span class="min-w-0 flex-1" data-list-body>
            <label for="list-checkbox-tasks-1" class="m-0 block cursor-pointer font-medium">Enviar o acordo de cobrança</label>
        </span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <input id="list-checkbox-tasks-2" type="checkbox" name="tasks" value="2" class="size-4 shrink-0 rounded border-border text-primary focus-visible:ring-2 focus-visible:ring-primary/30">
        <span class="min-w-0 flex-1" data-list-body>
            <label for="list-checkbox-tasks-2" class="m-0 block cursor-pointer font-medium">Enviar toda a documentação</label>
        </span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <input id="list-checkbox-tasks-3" type="checkbox" name="tasks" value="3" class="size-4 shrink-0 rounded border-border text-primary focus-visible:ring-2 focus-visible:ring-primary/30">
        <span class="min-w-0 flex-1" data-list-body>
            <label for="list-checkbox-tasks-3" class="m-0 block cursor-pointer font-medium">Reunião para revisar o formulário</label>
        </span>
    </li>
    <li data-list-item aria-disabled="true" class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground pointer-events-none cursor-not-allowed opacity-50">
        <input id="list-checkbox-tasks-4" type="checkbox" name="tasks" value="4" disabled class="size-4 shrink-0 rounded border-border text-primary focus-visible:ring-2 focus-visible:ring-primary/30">
        <span class="min-w-0 flex-1" data-list-body>
            <label for="list-checkbox-tasks-4" class="m-0 block cursor-not-allowed font-medium">Verificar tema e suporte</label>
        </span>
    </li>
</ul>
HTML;

    $radioCode = <<<'BLADE'
<x-ui.list>
    <x-ui.list.list-item control="radio" name="plan" value="free" title="Plano Free" description="Até 3 projetos" checked />
    <x-ui.list.list-item control="radio" name="plan" value="pro" title="Plano Pro" description="Projetos ilimitados" />
    <x-ui.list.list-item control="radio" name="plan" value="enterprise" title="Enterprise" description="SLA e suporte dedicado" />
</x-ui.list>
BLADE;

    $radioHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <input id="list-radio-plan-free" type="radio" name="plan" value="free" checked class="size-4 shrink-0 rounded border-border text-primary focus-visible:ring-2 focus-visible:ring-primary/30 rounded-full">
        <span class="min-w-0 flex-1" data-list-body>
            <label for="list-radio-plan-free" class="m-0 block cursor-pointer font-medium">Plano Free</label>
            <span class="mt-0.5 block text-[0.8125rem] leading-relaxed text-muted-foreground">Até 3 projetos</span>
        </span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <input id="list-radio-plan-pro" type="radio" name="plan" value="pro" class="size-4 shrink-0 rounded border-border text-primary focus-visible:ring-2 focus-visible:ring-primary/30 rounded-full">
        <span class="min-w-0 flex-1" data-list-body>
            <label for="list-radio-plan-pro" class="m-0 block cursor-pointer font-medium">Plano Pro</label>
            <span class="mt-0.5 block text-[0.8125rem] leading-relaxed text-muted-foreground">Projetos ilimitados</span>
        </span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <input id="list-radio-plan-enterprise" type="radio" name="plan" value="enterprise" class="size-4 shrink-0 rounded border-border text-primary focus-visible:ring-2 focus-visible:ring-primary/30 rounded-full">
        <span class="min-w-0 flex-1" data-list-body>
            <label for="list-radio-plan-enterprise" class="m-0 block cursor-pointer font-medium">Enterprise</label>
            <span class="mt-0.5 block text-[0.8125rem] leading-relaxed text-muted-foreground">SLA e suporte dedicado</span>
        </span>
    </li>
</ul>
HTML;

    $iconsCode = <<<'BLADE'
<x-ui.list>
    <x-ui.list.list-item icon="bi-house-door" icon-color="primary">Dashboard</x-ui.list.list-item>
    <x-ui.list.list-item icon="bi-people" icon-color="success">Equipe</x-ui.list.list-item>
    <x-ui.list.list-item icon="bi-graph-up" icon-color="info">Relatórios</x-ui.list.list-item>
    <x-ui.list.list-item icon="bi-gear" icon-color="secondary">Configurações</x-ui.list.list-item>
</x-ui.list>
BLADE;

    $iconsHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-house-door shrink-0 text-[1.05em] leading-none text-primary" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Dashboard</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-people shrink-0 text-[1.05em] leading-none text-success" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Equipe</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-graph-up shrink-0 text-[1.05em] leading-none text-info" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Relatórios</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-gear shrink-0 text-[1.05em] leading-none text-secondary" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Configurações</span>
    </li>
</ul>
HTML;

    $numberedCode = <<<'BLADE'
<x-ui.list numbered>
    <x-ui.list.list-item title="Passo um" description="Configure a conta da empresa." />
    <x-ui.list.list-item title="Passo dois" description="Convide os membros da equipe." />
    <x-ui.list.list-item title="Passo três" description="Publique o primeiro projeto." active />
    <x-ui.list.list-item title="Passo quatro" description="Acompanhe as métricas." />
</x-ui.list>
BLADE;

    $numberedHtml = <<<'HTML'
<ol data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col ui-list-numbered">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span data-list-number class="flex size-6 shrink-0 items-center justify-center rounded-full bg-muted text-[0.7rem] font-semibold text-muted-foreground" aria-hidden="true"></span>
        <span class="min-w-0 flex-1" data-list-body>
            <span class="m-0 block font-medium">Passo um</span>
            <span class="mt-0.5 block text-[0.8125rem] leading-relaxed text-muted-foreground">Configure a conta da empresa.</span>
        </span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span data-list-number class="flex size-6 shrink-0 items-center justify-center rounded-full bg-muted text-[0.7rem] font-semibold text-muted-foreground" aria-hidden="true"></span>
        <span class="min-w-0 flex-1" data-list-body>
            <span class="m-0 block font-medium">Passo dois</span>
            <span class="mt-0.5 block text-[0.8125rem] leading-relaxed text-muted-foreground">Convide os membros da equipe.</span>
        </span>
    </li>
    <li data-list-item aria-current="true" class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm z-[1] border-primary bg-primary text-primary-foreground">
        <span data-list-number class="flex size-6 shrink-0 items-center justify-center rounded-full bg-muted text-[0.7rem] font-semibold text-muted-foreground bg-primary-foreground/20 text-primary-foreground" aria-hidden="true"></span>
        <span class="min-w-0 flex-1" data-list-body>
            <span class="m-0 block font-medium">Passo três</span>
            <span class="mt-0.5 block text-[0.8125rem] leading-relaxed text-primary-foreground/80">Publique o primeiro projeto.</span>
        </span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <span data-list-number class="flex size-6 shrink-0 items-center justify-center rounded-full bg-muted text-[0.7rem] font-semibold text-muted-foreground" aria-hidden="true"></span>
        <span class="min-w-0 flex-1" data-list-body>
            <span class="m-0 block font-medium">Passo quatro</span>
            <span class="mt-0.5 block text-[0.8125rem] leading-relaxed text-muted-foreground">Acompanhe as métricas.</span>
        </span>
    </li>
</ol>
HTML;

    $customCode = <<<'BLADE'
<x-ui.list tag="div">
    <x-ui.list.list-item
        href="#"
        active
        title="Ana Souza"
        description="Comentou na tarefa Revisar layout do dashboard."
    >
        <x-slot:start>
            <x-ui.avatar initials="AS" size="sm" color="primary" circle />
        </x-slot:start>
        <x-slot:end>
            <span class="text-xs opacity-80">há 3 min</span>
        </x-slot:end>
    </x-ui.list.list-item>
    <x-ui.list.list-item
        href="#"
        title="Bruno Lima"
        description="Atualizou o status do pedido #4821 para Enviado."
    >
        <x-slot:start>
            <x-ui.avatar initials="BL" size="sm" color="success" circle />
        </x-slot:start>
        <x-slot:end>
            <span class="text-xs text-muted-foreground">há 1 h</span>
        </x-slot:end>
    </x-ui.list.list-item>
    <x-ui.list.list-item
        href="#"
        title="Carla Mendes"
        description="Anexou a fatura #2451 ao contrato."
    >
        <x-slot:start>
            <x-ui.avatar initials="CM" size="sm" color="info" circle />
        </x-slot:start>
        <x-slot:end>
            <span class="text-xs text-muted-foreground">ontem</span>
        </x-slot:end>
    </x-ui.list.list-item>
</x-ui.list>
BLADE;

    $customHtml = <<<'HTML'
<div data-list data-variant="default" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <a href="#" data-list-item aria-current="true" class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm z-[1] border-primary bg-primary text-primary-foreground no-underline">
        <span class="flex shrink-0 items-center" data-list-start>
            <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-8 text-xs bg-primary/15 text-primary rounded-full"><span>AS</span></div>
        </span>
        <span class="min-w-0 flex-1" data-list-body>
            <span class="m-0 block font-medium">Ana Souza</span>
            <span class="mt-0.5 block text-[0.8125rem] leading-relaxed text-primary-foreground/80">Comentou na tarefa Revisar layout do dashboard.</span>
        </span>
        <span class="ms-auto flex shrink-0 items-center gap-2" data-list-end>
            <span class="text-xs opacity-80">há 3 min</span>
        </span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground cursor-pointer transition-colors duration-150 hover:bg-muted/70 focus-visible:bg-muted/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30 no-underline">
        <span class="flex shrink-0 items-center" data-list-start>
            <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-8 text-xs bg-success/15 text-success rounded-full"><span>BL</span></div>
        </span>
        <span class="min-w-0 flex-1" data-list-body>
            <span class="m-0 block font-medium">Bruno Lima</span>
            <span class="mt-0.5 block text-[0.8125rem] leading-relaxed text-muted-foreground">Atualizou o status do pedido #4821 para Enviado.</span>
        </span>
        <span class="ms-auto flex shrink-0 items-center gap-2" data-list-end>
            <span class="text-xs text-muted-foreground">há 1 h</span>
        </span>
    </a>
    <a href="#" data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground cursor-pointer transition-colors duration-150 hover:bg-muted/70 focus-visible:bg-muted/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/30 no-underline">
        <span class="flex shrink-0 items-center" data-list-start>
            <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-8 text-xs bg-info/15 text-info rounded-full"><span>CM</span></div>
        </span>
        <span class="min-w-0 flex-1" data-list-body>
            <span class="m-0 block font-medium">Carla Mendes</span>
            <span class="mt-0.5 block text-[0.8125rem] leading-relaxed text-muted-foreground">Anexou a fatura #2451 ao contrato.</span>
        </span>
        <span class="ms-auto flex shrink-0 items-center gap-2" data-list-end>
            <span class="text-xs text-muted-foreground">ontem</span>
        </span>
    </a>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-ui.list size="sm">
    <x-ui.list.list-item>Compacto (sm)</x-ui.list.list-item>
    <x-ui.list.list-item>Segundo item</x-ui.list.list-item>
</x-ui.list>

<x-ui.list size="lg">
    <x-ui.list.list-item>Confortável (lg)</x-ui.list.list-item>
    <x-ui.list.list-item>Segundo item</x-ui.list.list-item>
</x-ui.list>
BLADE;

    $sizesHtml = <<<'HTML'
<ul data-list data-variant="default" data-horizontal="false" data-size="sm" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-3 py-2 text-xs border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Compacto (sm)</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-3 py-2 text-xs border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Segundo item</span>
    </li>
</ul>

<ul data-list data-variant="default" data-horizontal="false" data-size="lg" class="ui-list w-full overflow-hidden rounded-md border border-border flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-5 py-3.5 text-base border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Confortável (lg)</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-5 py-3.5 text-base border-border bg-card text-foreground">
        <span class="min-w-0 flex-1" data-list-body>Segundo item</span>
    </li>
</ul>
HTML;

    $borderedCode = <<<'BLADE'
<x-ui.list variant="bordered">
    <x-ui.list.list-item icon="bi-inbox" icon-color="primary">
        Inbox
        <x-slot:end>
            <x-ui.badge color="primary" variant="soft" pill>12</x-ui.badge>
        </x-slot:end>
    </x-ui.list.list-item>
    <x-ui.list.list-item icon="bi-star" icon-color="warning">Favoritos</x-ui.list.list-item>
    <x-ui.list.list-item icon="bi-trash" icon-color="danger">Lixeira</x-ui.list.list-item>
</x-ui.list>
BLADE;

    $borderedHtml = <<<'HTML'
<ul data-list data-variant="bordered" data-horizontal="false" data-size="md" class="ui-list w-full overflow-hidden rounded-md border border-border [&>[data-list-item]]:border-x-0 first:[&>[data-list-item]]:border-t-0 last:[&>[data-list-item]]:border-b-0 flex flex-col">
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-inbox shrink-0 text-[1.05em] leading-none text-primary" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Inbox</span>
        <span class="ms-auto flex shrink-0 items-center gap-2" data-list-end>
            <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1.5 px-2.5 py-1 text-xs rounded-full">12</span>
        </span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-star shrink-0 text-[1.05em] leading-none text-warning" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Favoritos</span>
    </li>
    <li data-list-item class="relative flex w-full min-w-0 items-center gap-3 border-b border-border text-start last:border-b-0 px-4 py-2.5 text-sm border-border bg-card text-foreground">
        <i class="bi bi-trash shrink-0 text-[1.05em] leading-none text-danger" aria-hidden="true"></i>
        <span class="min-w-0 flex-1" data-list-body>Lixeira</span>
    </li>
</ul>
HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.list&gt;</code> + <code>&lt;x-ui.list.list-item&gt;</code> cobrem o list group:
            ativo/desabilitado, links e botões, flush/horizontal/numbered, cores soft e solid, badges, ícones,
            checkboxes/radios e conteúdo customizado com slots <code>start</code>/<code>end</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Lista padrão com borda e cantos arredondados. Ícones via <code>icon</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list>
                    <x-ui.list.list-item icon="bi-receipt">Enviar o acordo de cobrança</x-ui.list.list-item>
                    <x-ui.list.list-item icon="bi-files">Enviar toda a documentação</x-ui.list.list-item>
                    <x-ui.list.list-item icon="bi-chat-dots">Reunião para revisar o formulário</x-ui.list.list-item>
                    <x-ui.list.list-item icon="bi-shield-check">Verificar tema e suporte ao cliente</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Item ativo" :code="$activeCode" :html="$activeHtml">
            <x-slot:description>
                <code>active</code> marca a seleção atual (<code>aria-current="true"</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list>
                    <x-ui.list.list-item active>Enviar o acordo de cobrança</x-ui.list.list-item>
                    <x-ui.list.list-item>Enviar toda a documentação</x-ui.list.list-item>
                    <x-ui.list.list-item>Reunião para revisar o formulário</x-ui.list.list-item>
                    <x-ui.list.list-item>Verificar tema e suporte ao cliente</x-ui.list.list-item>
                    <x-ui.list.list-item>Começar a apresentação</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Itens desabilitados" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> reduz opacidade e bloqueia interação. Slot <code>start</code> para avatar.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list>
                    <x-ui.list.list-item disabled>
                        <x-slot:start>
                            <x-ui.avatar initials="JB" size="xs" color="primary" circle />
                        </x-slot:start>
                        James Ballard
                    </x-ui.list.list-item>
                    <x-ui.list.list-item>
                        <x-slot:start>
                            <x-ui.avatar initials="NM" size="xs" color="success" circle />
                        </x-slot:start>
                        Nancy Martino
                    </x-ui.list.list-item>
                    <x-ui.list.list-item>
                        <x-slot:start>
                            <x-ui.avatar initials="HB" size="xs" color="info" circle />
                        </x-slot:start>
                        Henry Baird
                    </x-ui.list.list-item>
                    <x-ui.list.list-item>
                        <x-slot:start>
                            <x-ui.avatar initials="EK" size="xs" color="warning" circle />
                        </x-slot:start>
                        Erica Kernan
                    </x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Lista com links" :code="$linksCode" :html="$linksHtml">
            <x-slot:description>
                Use <code>tag="div"</code> no container e <code>href</code> no item (vira <code>&lt;a&gt;</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list tag="div">
                    <x-ui.list.list-item href="#" active>O item ativo atual</x-ui.list.list-item>
                    <x-ui.list.list-item href="#">Um segundo item da lista</x-ui.list.list-item>
                    <x-ui.list.list-item href="#">Um terceiro item da lista</x-ui.list.list-item>
                    <x-ui.list.list-item href="#">Um quarto item da lista</x-ui.list.list-item>
                    <x-ui.list.list-item href="#" disabled>Um item desabilitado</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Lista com botões" :code="$buttonsCode" :html="$buttonsHtml">
            <x-slot:description>
                <code>as="button"</code> com hover/focus — container também em <code>tag="div"</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list tag="div">
                    <x-ui.list.list-item as="button" active>O item ativo atual</x-ui.list.list-item>
                    <x-ui.list.list-item as="button">Um segundo item da lista</x-ui.list.list-item>
                    <x-ui.list.list-item as="button">Um terceiro item da lista</x-ui.list.list-item>
                    <x-ui.list.list-item as="button">Um quarto item da lista</x-ui.list.list-item>
                    <x-ui.list.list-item as="button" disabled>Um item desabilitado</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Flush" :code="$flushCode" :html="$flushHtml">
            <x-slot:description>
                <code>variant="flush"</code> remove borda externa e cantos — útil dentro de cards.
            </x-slot:description>
            <div class="w-full max-w-md rounded-md border border-border bg-card">
                <x-ui.list variant="flush">
                    <x-ui.list.list-item>Um item da lista</x-ui.list.list-item>
                    <x-ui.list.list-item>Um segundo item da lista</x-ui.list.list-item>
                    <x-ui.list.list-item>Um terceiro item da lista</x-ui.list.list-item>
                    <x-ui.list.list-item>Um quarto item da lista</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Horizontal" :code="$horizontalCode" :html="$horizontalHtml">
            <x-slot:description>
                <code>horizontal</code> (sempre) ou <code>horizontal="sm|md|lg|xl"</code> a partir do breakpoint.
            </x-slot:description>
            <div class="flex w-full flex-col gap-6">
                <x-ui.list horizontal>
                    <x-ui.list.list-item>Inbox</x-ui.list.list-item>
                    <x-ui.list.list-item active>Profile</x-ui.list.list-item>
                    <x-ui.list.list-item>Messages</x-ui.list.list-item>
                    <x-ui.list.list-item>Settings</x-ui.list.list-item>
                </x-ui.list>
                <x-ui.list horizontal="md">
                    <x-ui.list.list-item>Home</x-ui.list.list-item>
                    <x-ui.list.list-item>About</x-ui.list.list-item>
                    <x-ui.list.list-item>Contact</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Classes contextuais" :code="$contextualCode" :html="$contextualHtml">
            <x-slot:description>
                <code>color</code> aplica fundo soft do token (equivalente a <code>list-group-item-*</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list>
                    <x-ui.list.list-item>Item padrão sem cor</x-ui.list.list-item>
                    <x-ui.list.list-item color="primary">Um item primary simples</x-ui.list.list-item>
                    <x-ui.list.list-item color="secondary">Um item secondary simples</x-ui.list.list-item>
                    <x-ui.list.list-item color="success">Um item success simples</x-ui.list.list-item>
                    <x-ui.list.list-item color="danger">Um item danger simples</x-ui.list.list-item>
                    <x-ui.list.list-item color="warning">Um item warning simples</x-ui.list.list-item>
                    <x-ui.list.list-item color="info">Um item info simples</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Contextuais com link" :code="$contextualLinksCode" :html="$contextualLinksHtml">
            <x-slot:description>
                Cores soft também funcionam em itens acionáveis (<code>href</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list tag="div">
                    <x-ui.list.list-item href="#">Item padrão sem cor</x-ui.list.list-item>
                    <x-ui.list.list-item href="#" color="primary">Um item primary simples</x-ui.list.list-item>
                    <x-ui.list.list-item href="#" color="secondary">Um item secondary simples</x-ui.list.list-item>
                    <x-ui.list.list-item href="#" color="success">Um item success simples</x-ui.list.list-item>
                    <x-ui.list.list-item href="#" color="danger">Um item danger simples</x-ui.list.list-item>
                    <x-ui.list.list-item href="#" color="warning">Um item warning simples</x-ui.list.list-item>
                    <x-ui.list.list-item href="#" color="info">Um item info simples</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Listas coloridas (fill)" :code="$fillCode" :html="$fillHtml">
            <x-slot:description>
                <code>color-variant="solid"</code> preenche o item com a cor do token (<code>list-group-fill-*</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list>
                    <x-ui.list.list-item color="primary" color-variant="solid">Primary</x-ui.list.list-item>
                    <x-ui.list.list-item color="secondary" color-variant="solid">Secondary</x-ui.list.list-item>
                    <x-ui.list.list-item color="success" color-variant="solid">Success</x-ui.list.list-item>
                    <x-ui.list.list-item color="danger" color-variant="solid">Danger</x-ui.list.list-item>
                    <x-ui.list.list-item color="warning" color-variant="solid">Warning</x-ui.list.list-item>
                    <x-ui.list.list-item color="info" color-variant="solid">Info</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Com badges" :code="$badgesCode" :html="$badgesHtml">
            <x-slot:description>
                Slot <code>end</code> para contadores, badges ou ações à direita.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list>
                    <x-ui.list.list-item>
                        Inbox
                        <x-slot:end>
                            <x-ui.badge color="primary" variant="solid" pill>14</x-ui.badge>
                        </x-slot:end>
                    </x-ui.list.list-item>
                    <x-ui.list.list-item>
                        Profile
                        <x-slot:end>
                            <x-ui.badge color="success" variant="solid" pill>2</x-ui.badge>
                        </x-slot:end>
                    </x-ui.list.list-item>
                    <x-ui.list.list-item>
                        Messages
                        <x-slot:end>
                            <x-ui.badge color="warning" variant="solid" pill>99+</x-ui.badge>
                        </x-slot:end>
                    </x-ui.list.list-item>
                    <x-ui.list.list-item>
                        Settings
                        <x-slot:end>
                            <x-ui.badge color="danger" variant="solid" pill>2</x-ui.badge>
                        </x-slot:end>
                    </x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Com checkboxes" :code="$checkboxCode" :html="$checkboxHtml">
            <x-slot:description>
                <code>control="checkbox"</code> + <code>name</code>/<code>value</code>/<code>checked</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list>
                    <x-ui.list.list-item control="checkbox" name="tasks" value="1" title="Enviar o acordo de cobrança" checked />
                    <x-ui.list.list-item control="checkbox" name="tasks" value="2" title="Enviar toda a documentação" />
                    <x-ui.list.list-item control="checkbox" name="tasks" value="3" title="Reunião para revisar o formulário" />
                    <x-ui.list.list-item control="checkbox" name="tasks" value="4" title="Verificar tema e suporte" disabled />
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Com radios" :code="$radioCode" :html="$radioHtml">
            <x-slot:description>
                <code>control="radio"</code> com o mesmo <code>name</code> agrupa as opções.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list>
                    <x-ui.list.list-item control="radio" name="plan" value="free" title="Plano Free" description="Até 3 projetos" checked />
                    <x-ui.list.list-item control="radio" name="plan" value="pro" title="Plano Pro" description="Projetos ilimitados" />
                    <x-ui.list.list-item control="radio" name="plan" value="enterprise" title="Enterprise" description="SLA e suporte dedicado" />
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Com ícones" :code="$iconsCode" :html="$iconsHtml">
            <x-slot:description>
                <code>icon</code> + <code>icon-color</code> (token). Slot <code>start</code> substitui o ícone.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list>
                    <x-ui.list.list-item icon="bi-house-door" icon-color="primary">Dashboard</x-ui.list.list-item>
                    <x-ui.list.list-item icon="bi-people" icon-color="success">Equipe</x-ui.list.list-item>
                    <x-ui.list.list-item icon="bi-graph-up" icon-color="info">Relatórios</x-ui.list.list-item>
                    <x-ui.list.list-item icon="bi-gear" icon-color="secondary">Configurações</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Numerada" :code="$numberedCode" :html="$numberedHtml">
            <x-slot:description>
                <code>numbered</code> numera via contador CSS (sem índice em PHP). Container vira <code>&lt;ol&gt;</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list numbered>
                    <x-ui.list.list-item title="Passo um" description="Configure a conta da empresa." />
                    <x-ui.list.list-item title="Passo dois" description="Convide os membros da equipe." />
                    <x-ui.list.list-item title="Passo três" description="Publique o primeiro projeto." active />
                    <x-ui.list.list-item title="Passo quatro" description="Acompanhe as métricas." />
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Conteúdo customizado" :code="$customCode" :html="$customHtml">
            <x-slot:description>
                Props <code>title</code>/<code>description</code> + slots <code>start</code>/<code>end</code> para feeds e notificações.
            </x-slot:description>
            <div class="w-full max-w-lg">
                <x-ui.list tag="div">
                    <x-ui.list.list-item
                        href="#"
                        active
                        title="Ana Souza"
                        description="Comentou na tarefa Revisar layout do dashboard."
                    >
                        <x-slot:start>
                            <x-ui.avatar initials="AS" size="sm" color="primary" circle />
                        </x-slot:start>
                        <x-slot:end>
                            <span class="text-xs opacity-80">há 3 min</span>
                        </x-slot:end>
                    </x-ui.list.list-item>
                    <x-ui.list.list-item
                        href="#"
                        title="Bruno Lima"
                        description="Atualizou o status do pedido #4821 para Enviado."
                    >
                        <x-slot:start>
                            <x-ui.avatar initials="BL" size="sm" color="success" circle />
                        </x-slot:start>
                        <x-slot:end>
                            <span class="text-xs text-muted-foreground">há 1 h</span>
                        </x-slot:end>
                    </x-ui.list.list-item>
                    <x-ui.list.list-item
                        href="#"
                        title="Carla Mendes"
                        description="Anexou a fatura #2451 ao contrato."
                    >
                        <x-slot:start>
                            <x-ui.avatar initials="CM" size="sm" color="info" circle />
                        </x-slot:start>
                        <x-slot:end>
                            <span class="text-xs text-muted-foreground">ontem</span>
                        </x-slot:end>
                    </x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size="sm|md|lg"</code> no container (herdado pelos itens via <code>@@aware</code>).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-ui.list size="sm">
                    <x-ui.list.list-item>Compacto (sm)</x-ui.list.list-item>
                    <x-ui.list.list-item>Segundo item</x-ui.list.list-item>
                </x-ui.list>
                <x-ui.list size="lg">
                    <x-ui.list.list-item>Confortável (lg)</x-ui.list.list-item>
                    <x-ui.list.list-item>Segundo item</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>

        <x-ui.example title="Bordered" :code="$borderedCode" :html="$borderedHtml">
            <x-slot:description>
                <code>variant="bordered"</code> — borda externa contínua, sem bordas laterais nos itens.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.list variant="bordered">
                    <x-ui.list.list-item icon="bi-inbox" icon-color="primary">
                        Inbox
                        <x-slot:end>
                            <x-ui.badge color="primary" variant="soft" pill>12</x-ui.badge>
                        </x-slot:end>
                    </x-ui.list.list-item>
                    <x-ui.list.list-item icon="bi-star" icon-color="warning">Favoritos</x-ui.list.list-item>
                    <x-ui.list.list-item icon="bi-trash" icon-color="danger">Lixeira</x-ui.list.list-item>
                </x-ui.list>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api component="ui/list/list" title="x-ui.list" />
</x-ui.docs>
