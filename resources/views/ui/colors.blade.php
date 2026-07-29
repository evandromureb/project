<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $semanticCode = <<<'BLADE'
        <x-ui.color-swatch label="Primary" bg="bg-primary" foreground="text-primary-foreground" var="--primary" />
        <x-ui.color-swatch label="Secondary" bg="bg-secondary" foreground="text-secondary-foreground" var="--secondary" />
        <x-ui.color-swatch label="Success" bg="bg-success" foreground="text-success-foreground" var="--success" />
        <x-ui.color-swatch label="Warning" bg="bg-warning" foreground="text-warning-foreground" var="--warning" />
        <x-ui.color-swatch label="Danger" bg="bg-danger" foreground="text-danger-foreground" var="--danger" />
        <x-ui.color-swatch label="Info" bg="bg-info" foreground="text-info-foreground" var="--info" />
        BLADE;

    $semanticHtml = <<<'HTML'
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-primary text-primary-foreground flex h-16 items-center justify-center text-sm font-medium">Primary</div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">Primary</span>
                <code class="text-[11px] text-muted-foreground">--primary</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-secondary text-secondary-foreground flex h-16 items-center justify-center text-sm font-medium">Secondary</div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">Secondary</span>
                <code class="text-[11px] text-muted-foreground">--secondary</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-success text-success-foreground flex h-16 items-center justify-center text-sm font-medium">Success</div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">Success</span>
                <code class="text-[11px] text-muted-foreground">--success</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-warning text-warning-foreground flex h-16 items-center justify-center text-sm font-medium">Warning</div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">Warning</span>
                <code class="text-[11px] text-muted-foreground">--warning</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-danger text-danger-foreground flex h-16 items-center justify-center text-sm font-medium">Danger</div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">Danger</span>
                <code class="text-[11px] text-muted-foreground">--danger</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-info text-info-foreground flex h-16 items-center justify-center text-sm font-medium">Info</div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">Info</span>
                <code class="text-[11px] text-muted-foreground">--info</code>
            </div>
        </div>
        HTML;

    $softCode = <<<'BLADE'
        <x-ui.color-swatch label="Primary/15" bg="bg-primary/15" foreground="text-primary" var="--primary" />
        <x-ui.color-swatch label="Success/15" bg="bg-success/15" foreground="text-success" var="--success" />
        <x-ui.color-swatch label="Danger/15" bg="bg-danger/15" foreground="text-danger" var="--danger" />
        BLADE;

    $softHtml = <<<'HTML'
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-primary/15 text-primary flex h-16 items-center justify-center text-sm font-medium">Primary/15</div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">Primary/15</span>
                <code class="text-[11px] text-muted-foreground">--primary</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-success/15 text-success flex h-16 items-center justify-center text-sm font-medium">Success/15</div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">Success/15</span>
                <code class="text-[11px] text-muted-foreground">--success</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-danger/15 text-danger flex h-16 items-center justify-center text-sm font-medium">Danger/15</div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">Danger/15</span>
                <code class="text-[11px] text-muted-foreground">--danger</code>
            </div>
        </div>
        HTML;

    $surfaceCode = <<<'BLADE'
        <x-ui.color-swatch label="background" bg="bg-background" var="--background" />
        <x-ui.color-swatch label="foreground" bg="bg-foreground" var="--foreground" />
        <x-ui.color-swatch label="card" bg="bg-card" var="--card" />
        <x-ui.color-swatch label="card-foreground" bg="bg-card-foreground" var="--card-foreground" />
        <x-ui.color-swatch label="popover" bg="bg-popover" var="--popover" />
        <x-ui.color-swatch label="popover-foreground" bg="bg-popover-foreground" var="--popover-foreground" />
        <x-ui.color-swatch label="muted" bg="bg-muted" var="--muted" />
        <x-ui.color-swatch label="muted-foreground" bg="bg-muted-foreground" var="--muted-foreground" />
        <x-ui.color-swatch label="border" bg="bg-border" var="--border" />
        BLADE;

    $surfaceHtml = <<<'HTML'
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-background h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">background</span>
                <code class="text-[11px] text-muted-foreground">--background</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-foreground h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">foreground</span>
                <code class="text-[11px] text-muted-foreground">--foreground</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-card h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">card</span>
                <code class="text-[11px] text-muted-foreground">--card</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-card-foreground h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">card-foreground</span>
                <code class="text-[11px] text-muted-foreground">--card-foreground</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-popover h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">popover</span>
                <code class="text-[11px] text-muted-foreground">--popover</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-popover-foreground h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">popover-foreground</span>
                <code class="text-[11px] text-muted-foreground">--popover-foreground</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-muted h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">muted</span>
                <code class="text-[11px] text-muted-foreground">--muted</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-muted-foreground h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">muted-foreground</span>
                <code class="text-[11px] text-muted-foreground">--muted-foreground</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-border h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">border</span>
                <code class="text-[11px] text-muted-foreground">--border</code>
            </div>
        </div>
        HTML;

    $sidebarCode = <<<'BLADE'
        <x-ui.color-swatch label="sidebar" bg="bg-sidebar" var="--sidebar" />
        <x-ui.color-swatch label="sidebar-foreground" bg="bg-sidebar-foreground" var="--sidebar-foreground" />
        <x-ui.color-swatch label="sidebar-active" bg="bg-sidebar-active" var="--sidebar-active" />
        <x-ui.color-swatch label="sidebar-active-foreground" bg="bg-sidebar-active-foreground" var="--sidebar-active-foreground" />
        <x-ui.color-swatch label="sidebar-border" bg="bg-sidebar-border" var="--sidebar-border" />
        BLADE;

    $sidebarHtml = <<<'HTML'
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-sidebar h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">sidebar</span>
                <code class="text-[11px] text-muted-foreground">--sidebar</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-sidebar-foreground h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">sidebar-foreground</span>
                <code class="text-[11px] text-muted-foreground">--sidebar-foreground</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-sidebar-active h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">sidebar-active</span>
                <code class="text-[11px] text-muted-foreground">--sidebar-active</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-sidebar-active-foreground h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">sidebar-active-foreground</span>
                <code class="text-[11px] text-muted-foreground">--sidebar-active-foreground</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-sidebar-border h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">sidebar-border</span>
                <code class="text-[11px] text-muted-foreground">--sidebar-border</code>
            </div>
        </div>
        HTML;

    $headerFooterCode = <<<'BLADE'
        <x-ui.color-swatch label="header" bg="bg-header" var="--header" />
        <x-ui.color-swatch label="header-foreground" bg="bg-header-foreground" var="--header-foreground" />
        <x-ui.color-swatch label="header-icon" bg="bg-header-icon" var="--header-icon" />
        <x-ui.color-swatch label="header-hover" bg="bg-header-hover" var="--header-hover" />
        <x-ui.color-swatch label="footer" bg="bg-footer" var="--footer" />
        <x-ui.color-swatch label="footer-foreground" bg="bg-footer-foreground" var="--footer-foreground" />
        BLADE;
    $headerFooterHtml = <<<'HTML'
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-header h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">header</span>
                <code class="text-[11px] text-muted-foreground">--header</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-header-foreground h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">header-foreground</span>
                <code class="text-[11px] text-muted-foreground">--header-foreground</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-header-icon h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">header-icon</span>
                <code class="text-[11px] text-muted-foreground">--header-icon</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-header-hover h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">header-hover</span>
                <code class="text-[11px] text-muted-foreground">--header-hover</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-footer h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">footer</span>
                <code class="text-[11px] text-muted-foreground">--footer</code>
            </div>
        </div>
        <div class="overflow-hidden rounded-md border border-border bg-card">
            <div class="bg-footer-foreground h-12 border-b border-border"></div>
            <div class="flex items-center justify-between gap-2 px-3 py-2">
                <span class="text-xs font-medium text-card-foreground">footer-foreground</span>
                <code class="text-[11px] text-muted-foreground">--footer-foreground</code>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            Todas as cores do app são <strong>tokens de tema</strong> — variáveis CSS definidas em
            <code>resources/css/themes/*.css</code> e mapeadas para utilities Tailwind reais em
            <code>resources/css/layout.css</code> (<code>@@theme inline</code>). Nunca use cores
            Tailwind fixas (<code>bg-blue-500</code>) em componentes — use sempre os tokens abaixo,
            para que tudo responda corretamente à troca de tema (claro/escuro e as 5 paletas:
            default, blue, green, corporate, danger) sem precisar tocar em nenhum componente.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Cores semânticas" :code="$semanticCode" :html="$semanticHtml">
            <x-slot:description>
                As 6 cores usadas em botões, badges, alerts, etc. Cada uma tem um token <code>-foreground</code> irmão com contraste garantido.
            </x-slot:description>
            <div class="grid w-full grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-6">
                <x-ui.color-swatch label="Primary" bg="bg-primary" foreground="text-primary-foreground" var="--primary" />
                <x-ui.color-swatch label="Secondary" bg="bg-secondary" foreground="text-secondary-foreground" var="--secondary" />
                <x-ui.color-swatch label="Success" bg="bg-success" foreground="text-success-foreground" var="--success" />
                <x-ui.color-swatch label="Warning" bg="bg-warning" foreground="text-warning-foreground" var="--warning" />
                <x-ui.color-swatch label="Danger" bg="bg-danger" foreground="text-danger-foreground" var="--danger" />
                <x-ui.color-swatch label="Info" bg="bg-info" foreground="text-info-foreground" var="--info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variante suave (soft)" :code="$softCode" :html="$softHtml">
            <x-slot:description>
                O padrão <code>bg-{token}/15 text-{token}</code> usado em badges, alerts e botões "soft" — nunca opacidades fixas de cores Tailwind.
            </x-slot:description>
            <div class="grid w-full grid-cols-2 gap-3 sm:grid-cols-3">
                <x-ui.color-swatch label="Primary/15" bg="bg-primary/15" foreground="text-primary" var="--primary" />
                <x-ui.color-swatch label="Success/15" bg="bg-success/15" foreground="text-success" var="--success" />
                <x-ui.color-swatch label="Danger/15" bg="bg-danger/15" foreground="text-danger" var="--danger" />
            </div>
        </x-ui.example>

        <x-ui.example title="Superfícies" :code="$surfaceCode" :html="$surfaceHtml">
            <x-slot:description>
                Fundo, texto, cards, popovers e a borda padrão da aplicação.
            </x-slot:description>
            <div class="grid w-full grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-5">
                <x-ui.color-swatch label="background" bg="bg-background" var="--background" />
                <x-ui.color-swatch label="foreground" bg="bg-foreground" var="--foreground" />
                <x-ui.color-swatch label="card" bg="bg-card" var="--card" />
                <x-ui.color-swatch label="card-foreground" bg="bg-card-foreground" var="--card-foreground" />
                <x-ui.color-swatch label="popover" bg="bg-popover" var="--popover" />
                <x-ui.color-swatch label="popover-foreground" bg="bg-popover-foreground" var="--popover-foreground" />
                <x-ui.color-swatch label="muted" bg="bg-muted" var="--muted" />
                <x-ui.color-swatch label="muted-foreground" bg="bg-muted-foreground" var="--muted-foreground" />
                <x-ui.color-swatch label="border" bg="bg-border" var="--border" />
            </div>
        </x-ui.example>

        <x-ui.example title="Sidebar" :code="$sidebarCode" :html="$sidebarHtml">
            <x-slot:description>
                Tokens exclusivos da barra lateral (<code>layouts/sidebar/*.blade.php</code>).
            </x-slot:description>
            <div class="grid w-full grid-cols-2 gap-3 sm:grid-cols-3">
                <x-ui.color-swatch label="sidebar" bg="bg-sidebar" var="--sidebar" />
                <x-ui.color-swatch label="sidebar-foreground" bg="bg-sidebar-foreground" var="--sidebar-foreground" />
                <x-ui.color-swatch label="sidebar-active" bg="bg-sidebar-active" var="--sidebar-active" />
                <x-ui.color-swatch label="sidebar-active-foreground" bg="bg-sidebar-active-foreground" var="--sidebar-active-foreground" />
                <x-ui.color-swatch label="sidebar-border" bg="bg-sidebar-border" var="--sidebar-border" />
            </div>
        </x-ui.example>

        <x-ui.example title="Header e footer" :code="$headerFooterCode" :html="$headerFooterHtml">
            <x-slot:description>
                Tokens exclusivos do topbar e do rodapé.
            </x-slot:description>
            <div class="grid w-full grid-cols-2 gap-3 sm:grid-cols-3">
                <x-ui.color-swatch label="header" bg="bg-header" var="--header" />
                <x-ui.color-swatch label="header-foreground" bg="bg-header-foreground" var="--header-foreground" />
                <x-ui.color-swatch label="header-icon" bg="bg-header-icon" var="--header-icon" />
                <x-ui.color-swatch label="header-hover" bg="bg-header-hover" var="--header-hover" />
                <x-ui.color-swatch label="footer" bg="bg-footer" var="--footer" />
                <x-ui.color-swatch label="footer-foreground" bg="bg-footer-foreground" var="--footer-foreground" />
            </div>
        </x-ui.example>
    </div>
</div>
</x-ui.docs>
