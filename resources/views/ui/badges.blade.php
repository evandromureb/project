<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $colorsCode = <<<'BLADE'
        <x-ui.badge color="primary" variant="solid">Primary</x-ui.badge>
        <x-ui.badge color="secondary" variant="solid">Secondary</x-ui.badge>
        <x-ui.badge color="success" variant="solid">Success</x-ui.badge>
        <x-ui.badge color="warning" variant="solid">Warning</x-ui.badge>
        <x-ui.badge color="danger" variant="solid">Danger</x-ui.badge>
        <x-ui.badge color="info" variant="solid">Info</x-ui.badge>
        BLADE;

    $colorsHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none bg-primary text-primary-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Primary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-secondary text-secondary-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Secondary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-success text-success-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Success</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-warning text-warning-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Warning</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-danger text-danger-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Danger</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-info text-info-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Info</span>
        </span>
        HTML;

    $variantsCode = <<<'BLADE'
        <x-ui.badge color="primary" variant="soft">Soft</x-ui.badge>
        <x-ui.badge color="primary" variant="solid">Solid</x-ui.badge>
        <x-ui.badge color="primary" variant="outline">Outline</x-ui.badge>
        BLADE;

    $variantsHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Soft</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-primary text-primary-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Solid</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-primary bg-transparent text-primary gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Outline</span>
        </span>
        HTML;

    $softCode = <<<'BLADE'
        <x-ui.badge color="primary" variant="soft">Primary</x-ui.badge>
        <x-ui.badge color="secondary" variant="soft">Secondary</x-ui.badge>
        <x-ui.badge color="success" variant="soft">Success</x-ui.badge>
        <x-ui.badge color="warning" variant="soft">Warning</x-ui.badge>
        <x-ui.badge color="danger" variant="soft">Danger</x-ui.badge>
        <x-ui.badge color="info" variant="soft">Info</x-ui.badge>
        BLADE;

    $softHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Primary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-secondary/15 text-secondary gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Secondary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Success</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-warning/15 text-warning gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Warning</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-danger/15 text-danger gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Danger</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-info/15 text-info gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Info</span>
        </span>
        HTML;

    $outlineCode = <<<'BLADE'
        <x-ui.badge color="primary" variant="outline">Primary</x-ui.badge>
        <x-ui.badge color="secondary" variant="outline">Secondary</x-ui.badge>
        <x-ui.badge color="success" variant="outline">Success</x-ui.badge>
        <x-ui.badge color="warning" variant="outline">Warning</x-ui.badge>
        <x-ui.badge color="danger" variant="outline">Danger</x-ui.badge>
        <x-ui.badge color="info" variant="outline">Info</x-ui.badge>
        BLADE;

    $outlineHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none border border-primary bg-transparent text-primary gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Primary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-secondary bg-transparent text-secondary gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Secondary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-success bg-transparent text-success gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Success</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-warning bg-transparent text-warning gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Warning</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-danger bg-transparent text-danger gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Danger</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-info bg-transparent text-info gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Info</span>
        </span>
        HTML;

    $softBorderCode = <<<'BLADE'
        <x-ui.badge color="primary" variant="soft-border">Primary</x-ui.badge>
        <x-ui.badge color="secondary" variant="soft-border">Secondary</x-ui.badge>
        <x-ui.badge color="success" variant="soft-border">Success</x-ui.badge>
        <x-ui.badge color="warning" variant="soft-border">Warning</x-ui.badge>
        <x-ui.badge color="danger" variant="soft-border">Danger</x-ui.badge>
        <x-ui.badge color="info" variant="soft-border">Info</x-ui.badge>
        BLADE;

    $softBorderHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none border border-primary/50 bg-primary/15 text-primary gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Primary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-secondary/50 bg-secondary/15 text-secondary gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Secondary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-success/50 bg-success/15 text-success gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Success</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-warning/50 bg-warning/15 text-warning gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Warning</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-danger/50 bg-danger/15 text-danger gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Danger</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-info/50 bg-info/15 text-info gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Info</span>
        </span>
        HTML;

    $labelCode = <<<'BLADE'
        <x-ui.badge color="primary" square>Primary</x-ui.badge>
        <x-ui.badge color="secondary" square>Secondary</x-ui.badge>
        <x-ui.badge color="success" square>Success</x-ui.badge>
        <x-ui.badge color="warning" square>Warning</x-ui.badge>
        <x-ui.badge color="danger" square>Danger</x-ui.badge>
        <x-ui.badge color="info" square>Info</x-ui.badge>
        BLADE;

    $labelHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1.5 px-2.5 py-1 text-xs rounded-none">
            <span>Primary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-secondary/15 text-secondary gap-1.5 px-2.5 py-1 text-xs rounded-none">
            <span>Secondary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1.5 px-2.5 py-1 text-xs rounded-none">
            <span>Success</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-warning/15 text-warning gap-1.5 px-2.5 py-1 text-xs rounded-none">
            <span>Warning</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-danger/15 text-danger gap-1.5 px-2.5 py-1 text-xs rounded-none">
            <span>Danger</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-info/15 text-info gap-1.5 px-2.5 py-1 text-xs rounded-none">
            <span>Info</span>
        </span>
        HTML;

    $sizesCode = <<<'BLADE'
        <x-ui.badge color="primary" size="sm">Pequeno</x-ui.badge>
        <x-ui.badge color="primary" size="md">Médio</x-ui.badge>
        <x-ui.badge color="primary" size="lg">Grande</x-ui.badge>
        BLADE;

    $sizesHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1 px-2 py-0.5 text-[11px] rounded-md">
            <span>Pequeno</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span>Médio</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-2 px-3 py-1.5 text-sm rounded-md">
            <span>Grande</span>
        </span>
        HTML;

    $shapeCode = <<<'BLADE'
        <x-ui.badge color="primary" variant="solid" pill>Primary</x-ui.badge>
        <x-ui.badge color="secondary" variant="solid" pill>Secondary</x-ui.badge>
        <x-ui.badge color="success" variant="solid" pill>Success</x-ui.badge>
        <x-ui.badge color="warning" variant="solid" pill>Warning</x-ui.badge>
        <x-ui.badge color="danger" variant="solid" pill>Danger</x-ui.badge>
        <x-ui.badge color="info" variant="solid" pill>Info</x-ui.badge>
        BLADE;

    $shapeHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none bg-primary text-primary-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full">
            <span>Primary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-secondary text-secondary-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full">
            <span>Secondary</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-success text-success-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full">
            <span>Success</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-warning text-warning-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full">
            <span>Warning</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-danger text-danger-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full">
            <span>Danger</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-info text-info-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full">
            <span>Info</span>
        </span>
        HTML;

    $iconCode = <<<'BLADE'
        <x-ui.badge color="success" icon="bi-check-lg">Aprovado</x-ui.badge>
        <x-ui.badge color="warning" icon="bi-star-fill" variant="solid">Destaque</x-ui.badge>
        <x-ui.badge color="info" icon="bi-lightning-charge-fill" variant="outline">Novo</x-ui.badge>
        BLADE;

    $iconHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <i class="bi bi-check-lg shrink-0 leading-none" aria-hidden="true"></i>
            <span>Aprovado</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-warning text-warning-foreground gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <i class="bi bi-star-fill shrink-0 leading-none" aria-hidden="true"></i>
            <span>Destaque</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none border border-info bg-transparent text-info gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <i class="bi bi-lightning-charge-fill shrink-0 leading-none" aria-hidden="true"></i>
            <span>Novo</span>
        </span>
        HTML;

    $dotCode = <<<'BLADE'
        <x-ui.badge color="success" dot>Online</x-ui.badge>
        <x-ui.badge color="warning" dot>Ausente</x-ui.badge>
        <x-ui.badge color="danger" dot>Offline</x-ui.badge>
        BLADE;

    $dotHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span class="size-1.5 shrink-0 rounded-full bg-success" aria-hidden="true"></span>
            <span>Online</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-warning/15 text-warning gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span class="size-1.5 shrink-0 rounded-full bg-warning" aria-hidden="true"></span>
            <span>Ausente</span>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-danger/15 text-danger gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <span class="size-1.5 shrink-0 rounded-full bg-danger" aria-hidden="true"></span>
            <span>Offline</span>
        </span>
        HTML;

    $removableCode = <<<'BLADE'
        <x-ui.badge color="primary" variant="soft" pill removable>Laravel</x-ui.badge>
        <x-ui.badge color="secondary" variant="soft" pill removable>Livewire</x-ui.badge>
        <x-ui.badge color="info" variant="soft" pill removable>Tailwind</x-ui.badge>
        BLADE;

    $removableHtml = <<<'HTML'
        <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1.5 px-2.5 py-1 text-xs rounded-full">
            <span>Laravel</span>
            <button type="button" class="-mr-1 ml-0.5 shrink-0 rounded-full p-0.5 opacity-70 transition-opacity hover:opacity-100" aria-label="Remover">
                <i class="bi bi-x text-xs leading-none" aria-hidden="true"></i>
            </button>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-secondary/15 text-secondary gap-1.5 px-2.5 py-1 text-xs rounded-full">
            <span>Livewire</span>
            <button type="button" class="-mr-1 ml-0.5 shrink-0 rounded-full p-0.5 opacity-70 transition-opacity hover:opacity-100" aria-label="Remover">
                <i class="bi bi-x text-xs leading-none" aria-hidden="true"></i>
            </button>
        </span>
        <span class="inline-flex items-center font-medium leading-none bg-info/15 text-info gap-1.5 px-2.5 py-1 text-xs rounded-full">
            <span>Tailwind</span>
            <button type="button" class="-mr-1 ml-0.5 shrink-0 rounded-full p-0.5 opacity-70 transition-opacity hover:opacity-100" aria-label="Remover">
                <i class="bi bi-x text-xs leading-none" aria-hidden="true"></i>
            </button>
        </span>
        HTML;

    $linkCode = <<<'BLADE'
        <x-ui.badge color="primary" icon="bi-tag-fill" href="#">Ver categoria</x-ui.badge>
        BLADE;

    $linkHtml = <<<'HTML'
        <a href="#" class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1.5 px-2.5 py-1 text-xs rounded-md">
            <i class="bi bi-tag-fill shrink-0 leading-none" aria-hidden="true"></i>
            <span>Ver categoria</span>
        </a>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-ui.badge&gt;</code>
            é um rótulo compacto para status, categorias ou contadores. Suporta cores, variantes
            (<code>soft</code> / <code>solid</code> / <code>outline</code> / <code>soft-border</code>), tamanhos, formato
            (pill/quadrado), ícone, indicador de status (dot), remoção (chip) e uso como link.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Default Badges" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Use <code>variant="solid"</code> para badges com fundo cheio e texto contrastante.
            </x-slot:description>
            <x-ui.badge color="primary" variant="solid">Primary</x-ui.badge>
            <x-ui.badge color="secondary" variant="solid">Secondary</x-ui.badge>
            <x-ui.badge color="success" variant="solid">Success</x-ui.badge>
            <x-ui.badge color="warning" variant="solid">Warning</x-ui.badge>
            <x-ui.badge color="danger" variant="solid">Danger</x-ui.badge>
            <x-ui.badge color="info" variant="solid">Info</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Soft Badges" :code="$softCode" :html="$softHtml">
            <x-slot:description>
                Use <code>variant="soft"</code> (padrão) para fundo suave e texto na cor do tema.
            </x-slot:description>
            <x-ui.badge color="primary" variant="soft">Primary</x-ui.badge>
            <x-ui.badge color="secondary" variant="soft">Secondary</x-ui.badge>
            <x-ui.badge color="success" variant="soft">Success</x-ui.badge>
            <x-ui.badge color="warning" variant="soft">Warning</x-ui.badge>
            <x-ui.badge color="danger" variant="soft">Danger</x-ui.badge>
            <x-ui.badge color="info" variant="soft">Info</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Outline Badges" :code="$outlineCode" :html="$outlineHtml">
            <x-slot:description>
                Use <code>variant="outline"</code> para badges apenas com borda e texto colorido.
            </x-slot:description>
            <x-ui.badge color="primary" variant="outline">Primary</x-ui.badge>
            <x-ui.badge color="secondary" variant="outline">Secondary</x-ui.badge>
            <x-ui.badge color="success" variant="outline">Success</x-ui.badge>
            <x-ui.badge color="warning" variant="outline">Warning</x-ui.badge>
            <x-ui.badge color="danger" variant="outline">Danger</x-ui.badge>
            <x-ui.badge color="info" variant="outline">Info</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Soft Border Badges" :code="$softBorderCode" :html="$softBorderHtml">
            <x-slot:description>
                Use <code>variant="soft-border"</code> para fundo suave com borda na mesma cor.
            </x-slot:description>
            <x-ui.badge color="primary" variant="soft-border">Primary</x-ui.badge>
            <x-ui.badge color="secondary" variant="soft-border">Secondary</x-ui.badge>
            <x-ui.badge color="success" variant="soft-border">Success</x-ui.badge>
            <x-ui.badge color="warning" variant="soft-border">Warning</x-ui.badge>
            <x-ui.badge color="danger" variant="soft-border">Danger</x-ui.badge>
            <x-ui.badge color="info" variant="soft-border">Info</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Label Badges" :code="$labelCode" :html="$labelHtml">
            <x-slot:description>
                Use a prop <code>square</code> para o formato retangular de label (sem cantos arredondados).
            </x-slot:description>
            <x-ui.badge color="primary" square>Primary</x-ui.badge>
            <x-ui.badge color="secondary" square>Secondary</x-ui.badge>
            <x-ui.badge color="success" square>Success</x-ui.badge>
            <x-ui.badge color="warning" square>Warning</x-ui.badge>
            <x-ui.badge color="danger" square>Danger</x-ui.badge>
            <x-ui.badge color="info" square>Info</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Rounded Pill Badges" :code="$shapeCode" :html="$shapeHtml">
            <x-slot:description>
                Use a prop <code>pill</code> para cantos totalmente arredondados (<code>rounded-full</code>).
            </x-slot:description>
            <x-ui.badge color="primary" variant="solid" pill>Primary</x-ui.badge>
            <x-ui.badge color="secondary" variant="solid" pill>Secondary</x-ui.badge>
            <x-ui.badge color="success" variant="solid" pill>Success</x-ui.badge>
            <x-ui.badge color="warning" variant="solid" pill>Warning</x-ui.badge>
            <x-ui.badge color="danger" variant="solid" pill>Danger</x-ui.badge>
            <x-ui.badge color="info" variant="solid" pill>Info</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Compare as variantes <code>soft</code>, <code>solid</code> e <code>outline</code> lado a lado.
            </x-slot:description>
            <x-ui.badge color="primary" variant="soft">Soft</x-ui.badge>
            <x-ui.badge color="primary" variant="solid">Solid</x-ui.badge>
            <x-ui.badge color="primary" variant="outline">Outline</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                Controle o tamanho com <code>size="sm"</code>, <code>md</code> (padrão) ou <code>lg</code>.
            </x-slot:description>
            <x-ui.badge color="primary" size="sm">Pequeno</x-ui.badge>
            <x-ui.badge color="primary" size="md">Médio</x-ui.badge>
            <x-ui.badge color="primary" size="lg">Grande</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Com ícone" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                A prop <code>icon</code> aceita uma classe Bootstrap Icons à esquerda do texto.
            </x-slot:description>
            <x-ui.badge color="success" icon="bi-check-lg">Aprovado</x-ui.badge>
            <x-ui.badge color="warning" icon="bi-star-fill" variant="solid">Destaque</x-ui.badge>
            <x-ui.badge color="info" icon="bi-lightning-charge-fill" variant="outline">Novo</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Indicador de status (dot)" :code="$dotCode" :html="$dotHtml">
            <x-slot:description>
                Use a prop <code>dot</code> para um indicador de status colorido no lugar do ícone.
            </x-slot:description>
            <x-ui.badge color="success" dot>Online</x-ui.badge>
            <x-ui.badge color="warning" dot>Ausente</x-ui.badge>
            <x-ui.badge color="danger" dot>Offline</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Removível (chip)" :code="$removableCode" :html="$removableHtml">
            <x-slot:description>
                A prop <code>removable</code> adiciona um botão de fechar que oculta o badge (Alpine).
            </x-slot:description>
            <x-ui.badge color="primary" variant="soft" pill removable>Laravel</x-ui.badge>
            <x-ui.badge color="secondary" variant="soft" pill removable>Livewire</x-ui.badge>
            <x-ui.badge color="info" variant="soft" pill removable>Tailwind</x-ui.badge>
        </x-ui.example>

        <x-ui.example title="Como link" :code="$linkCode" :html="$linkHtml">
            <x-slot:description>
                Com a prop <code>href</code>, o badge é renderizado como <code>&lt;a&gt;</code>.
            </x-slot:description>
            <x-ui.badge color="primary" icon="bi-tag-fill" href="#">Ver categoria</x-ui.badge>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="badge" />
</x-ui.docs>
