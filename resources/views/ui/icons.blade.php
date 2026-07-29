<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.icon name="bi-house-fill" />
        <x-ui.icon name="bi-heart-fill" />
        <x-ui.icon name="bi-star-fill" />
        BLADE;

/*     Sem "variant" (padrão "none"), o componente renderiza um <i> bare, sem wrapper. 
*/
    $basicHtml = <<<'HTML'
        <i class="bi bi-house-fill leading-none text-base" aria-hidden="true"></i>
        <i class="bi bi-heart-fill leading-none text-base" aria-hidden="true"></i>
        <i class="bi bi-star-fill leading-none text-base" aria-hidden="true"></i>
        HTML;

    $sizesCode = <<<'BLADE'
        <x-ui.icon name="bi-stars" size="xs" />
        <x-ui.icon name="bi-stars" size="sm" />
        <x-ui.icon name="bi-stars" size="md" />
        <x-ui.icon name="bi-stars" size="lg" />
        <x-ui.icon name="bi-stars" size="xl" />
        <x-ui.icon name="bi-stars" size="2xl" />
        BLADE;

    $sizesHtml = <<<'HTML'
        <i class="bi bi-stars leading-none text-xs" aria-hidden="true"></i>
        <i class="bi bi-stars leading-none text-sm" aria-hidden="true"></i>
        <i class="bi bi-stars leading-none text-base" aria-hidden="true"></i>
        <i class="bi bi-stars leading-none text-2xl" aria-hidden="true"></i>
        <i class="bi bi-stars leading-none text-3xl" aria-hidden="true"></i>
        <i class="bi bi-stars leading-none text-4xl" aria-hidden="true"></i>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.icon name="bi-circle-fill" color="primary" />
        <x-ui.icon name="bi-circle-fill" color="success" />
        <x-ui.icon name="bi-circle-fill" color="warning" />
        <x-ui.icon name="bi-circle-fill" color="danger" />
        BLADE;

/*     sem variant, "color" só adiciona a classe de texto (bareColorClasses) ao <i> 
*/
    $colorsHtml = <<<'HTML'
        <i class="bi bi-circle-fill leading-none text-base text-primary" aria-hidden="true"></i>
        <i class="bi bi-circle-fill leading-none text-base text-secondary" aria-hidden="true"></i>
        <i class="bi bi-circle-fill leading-none text-base text-success" aria-hidden="true"></i>
        <i class="bi bi-circle-fill leading-none text-base text-warning" aria-hidden="true"></i>
        <i class="bi bi-circle-fill leading-none text-base text-danger" aria-hidden="true"></i>
        <i class="bi bi-circle-fill leading-none text-base text-info" aria-hidden="true"></i>
        HTML;

    $variantsCode = <<<'BLADE'
        <x-ui.icon name="bi-box-seam-fill" color="primary" variant="soft" />
        <x-ui.icon name="bi-box-seam-fill" color="primary" variant="solid" />
        <x-ui.icon name="bi-box-seam-fill" color="primary" variant="outline" />
        <x-ui.icon name="bi-box-seam-fill" color="primary" variant="ghost" />
        BLADE;

/*     hasBox=true (variant != "none"): wrapper <span> "relative inline-flex shrink-0 items-center justify-center transition-colors" + boxSize md "size-11 rounded-xl" + a cor do variant 
*/
    $variantsHtml = <<<'HTML'
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-primary/15 text-primary">
            <i class="bi bi-box-seam-fill leading-none text-xl" aria-hidden="true"></i>
        </span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-primary text-primary-foreground">
            <i class="bi bi-box-seam-fill leading-none text-xl" aria-hidden="true"></i>
        </span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full border border-primary/40 bg-transparent text-primary">
            <i class="bi bi-box-seam-fill leading-none text-xl" aria-hidden="true"></i>
        </span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-transparent text-primary hover:bg-primary/10">
            <i class="bi bi-box-seam-fill leading-none text-xl" aria-hidden="true"></i>
        </span>
        HTML;

    $matrixCode = <<<'BLADE'
        {{-- soft / solid / outline × cada token de cor --}}
        <x-ui.icon name="bi-lightning-fill" color="success" variant="soft" />
        <x-ui.icon name="bi-lightning-fill" color="success" variant="solid" />
        <x-ui.icon name="bi-lightning-fill" color="success" variant="outline" />
        BLADE;

/*     mesma estrutura do exemplo "Variantes com box", repetida para cada token de cor (só troca a classe de cor). 
*/
    $matrixHtml = <<<'HTML'
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-success/15 text-success"><i class="bi bi-lightning-fill leading-none text-xl" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-success text-success-foreground"><i class="bi bi-lightning-fill leading-none text-xl" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full border border-success/40 bg-transparent text-success"><i class="bi bi-lightning-fill leading-none text-xl" aria-hidden="true"></i></span>
        HTML;

    $shapeCode = <<<'BLADE'
        <x-ui.icon name="bi-gear-fill" color="secondary" variant="soft" shape="circle" />
        <x-ui.icon name="bi-gear-fill" color="secondary" variant="soft" shape="square" />
        BLADE;

/*     shape="circle" -> "rounded-full"; shape="square" com boxSize md (não é xs/lg/xl) cai no default "rounded-xl". 
*/
    $shapeHtml = <<<'HTML'
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-secondary/15 text-secondary"><i class="bi bi-gear-fill leading-none text-xl" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-xl bg-secondary/15 text-secondary"><i class="bi bi-gear-fill leading-none text-xl" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-xl bg-secondary text-secondary-foreground"><i class="bi bi-gear-fill leading-none text-xl" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full border border-secondary/40 bg-transparent text-secondary"><i class="bi bi-gear-fill leading-none text-xl" aria-hidden="true"></i></span>
        HTML;

    $boxSizesCode = <<<'BLADE'
        <x-ui.icon name="bi-lightning-fill" color="warning" variant="solid" boxSize="xs" />
        <x-ui.icon name="bi-lightning-fill" color="warning" variant="solid" boxSize="sm" />
        <x-ui.icon name="bi-lightning-fill" color="warning" variant="solid" boxSize="md" />
        <x-ui.icon name="bi-lightning-fill" color="warning" variant="solid" boxSize="lg" />
        <x-ui.icon name="bi-lightning-fill" color="warning" variant="solid" boxSize="xl" />
        BLADE;

/*     boxSize: xs="size-7"/"text-xs", sm="size-8"/"text-sm", md="size-11"/"text-xl", lg="size-14"/"text-2xl", xl="size-16"/"text-3xl" (shape padrão "circle" -> rounded-full sempre) 
*/
    $boxSizesHtml = <<<'HTML'
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-7 rounded-full bg-warning text-warning-foreground"><i class="bi bi-lightning-fill leading-none text-xs" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-8 rounded-full bg-warning text-warning-foreground"><i class="bi bi-lightning-fill leading-none text-sm" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-warning text-warning-foreground"><i class="bi bi-lightning-fill leading-none text-xl" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-14 rounded-full bg-warning text-warning-foreground"><i class="bi bi-lightning-fill leading-none text-2xl" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-16 rounded-full bg-warning text-warning-foreground"><i class="bi bi-lightning-fill leading-none text-3xl" aria-hidden="true"></i></span>
        HTML;

    $ringShadowCode = <<<'BLADE'
        <x-ui.icon name="bi-shield-fill-check" color="success" variant="soft" ring />
        <x-ui.icon name="bi-rocket-takeoff-fill" color="primary" variant="solid" shadow />
        <x-ui.icon name="bi-gem" color="info" variant="soft" ring shadow shape="square" />
        BLADE;

    $ringShadowHtml = <<<'HTML'
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-success/15 text-success ring-1 ring-success/20"><i class="bi bi-shield-fill-check leading-none text-xl" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-primary text-primary-foreground shadow-sm"><i class="bi bi-rocket-takeoff-fill leading-none text-xl" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-xl bg-info/15 text-info ring-1 ring-info/20 shadow-sm"><i class="bi bi-gem leading-none text-xl" aria-hidden="true"></i></span>
        HTML;

    $spinCode = <<<'BLADE'
        <x-ui.icon name="bi-arrow-repeat" size="lg" spin />
        <x-ui.icon name="bi-arrow-clockwise" color="primary" variant="soft" spin />
        <x-ui.icon name="bi-wifi" color="warning" size="lg" pulse />
        BLADE;

    $spinHtml = <<<'HTML'
        <i class="bi bi-arrow-repeat leading-none text-2xl animate-spin" aria-hidden="true"></i>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-primary/15 text-primary"><i class="bi bi-arrow-clockwise leading-none text-xl animate-spin" aria-hidden="true"></i></span>
        <i class="bi bi-wifi leading-none text-2xl text-warning animate-pulse" aria-hidden="true"></i>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-danger/15 text-danger"><i class="bi bi-broadcast leading-none text-xl animate-pulse" aria-hidden="true"></i></span>
        HTML;

    $flipRotateCode = <<<'BLADE'
        <x-ui.icon name="bi-signpost-fill" size="lg" />
        <x-ui.icon name="bi-signpost-fill" size="lg" flip="horizontal" />
        <x-ui.icon name="bi-arrow-up" size="lg" :rotate="90" />
        <x-ui.icon name="bi-arrow-up" size="lg" :rotate="180" />
        BLADE;

    $flipRotateHtml = <<<'HTML'
        <i class="bi bi-signpost-fill leading-none text-2xl" aria-hidden="true"></i>
        <i class="bi bi-signpost-fill leading-none text-2xl -scale-x-100" aria-hidden="true"></i>
        <i class="bi bi-signpost-fill leading-none text-2xl -scale-y-100" aria-hidden="true"></i>
        <i class="bi bi-arrow-up leading-none text-2xl rotate-90" aria-hidden="true"></i>
        <i class="bi bi-arrow-up leading-none text-2xl rotate-180" aria-hidden="true"></i>
        <i class="bi bi-arrow-up leading-none text-2xl -rotate-90" aria-hidden="true"></i>
        HTML;

    $labelCode = <<<'BLADE'
        <x-ui.icon name="bi-star-fill" color="warning" />
        <x-ui.icon name="bi-exclamation-triangle-fill" color="danger" label="Atenção: campo obrigatório" />
        BLADE;

/*     Sem "label": aria-hidden (decorativo). Com "label": role="img" + aria-label (sem aria-hidden). 
*/
    $labelHtml = <<<'HTML'
        <i class="bi bi-star-fill leading-none text-base text-warning" aria-hidden="true"></i>
        <i class="bi bi-exclamation-triangle-fill leading-none text-base text-danger" role="img" aria-label="Atenção: campo obrigatório"></i>
        HTML;

    $linkCode = <<<'BLADE'
        <x-ui.icon name="bi-github" href="#" color="secondary" variant="soft" label="Abrir no GitHub" />
        <x-ui.icon name="bi-share-fill" href="#" color="primary" variant="solid" label="Compartilhar" />
        <x-ui.icon name="bi-three-dots" href="#" variant="ghost" boxSize="sm" label="Mais ações" />
        BLADE;

    $linkHtml = <<<'HTML'
        <a href="#" aria-label="Abrir no GitHub" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-secondary/15 text-secondary">
            <i class="bi bi-github leading-none text-xl" aria-hidden="true"></i>
        </a>
        <a href="#" aria-label="Compartilhar" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-primary text-primary-foreground hover:opacity-90">
            <i class="bi bi-share-fill leading-none text-xl" aria-hidden="true"></i>
        </a>
        <a href="#" aria-label="Mais ações" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-8 rounded-full bg-transparent text-muted-foreground hover:bg-muted hover:text-foreground">
            <i class="bi bi-three-dots leading-none text-sm" aria-hidden="true"></i>
        </a>
        HTML;

    $badgeCode = <<<'BLADE'
        <x-ui.icon name="bi-bell-fill" color="secondary" variant="soft" boxSize="lg" badge="3" />
        <x-ui.icon name="bi-envelope-fill" color="primary" variant="soft" boxSize="lg" badge badgeColor="success" />
        <x-ui.icon name="bi-chat-dots-fill" color="info" variant="soft" boxSize="lg" badge="12" badgeColor="danger" />
        BLADE;

/*     badgeColor padrão é "danger"; a bolinha de badge de 1 caractere usa "size-3.5", 2+ caracteres ganham "min-h-4 min-w-4 px-1". 
*/
    $badgeHtml = <<<'HTML'
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-14 rounded-full bg-secondary/15 text-secondary">
            <i class="bi bi-bell-fill leading-none text-2xl" aria-hidden="true"></i>
            <span class="absolute -top-1 -right-1 flex items-center justify-center rounded-full text-[9px] font-semibold leading-none text-white ring-2 ring-card bg-danger size-3.5" aria-hidden="true">3</span>
        </span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-14 rounded-full bg-primary/15 text-primary">
            <i class="bi bi-envelope-fill leading-none text-2xl" aria-hidden="true"></i>
            <span class="absolute -top-1 -right-1 flex items-center justify-center rounded-full text-[9px] font-semibold leading-none text-white ring-2 ring-card bg-success size-3.5" aria-hidden="true"></span>
        </span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-14 rounded-full bg-info/15 text-info">
            <i class="bi bi-chat-dots-fill leading-none text-2xl" aria-hidden="true"></i>
            <span class="absolute -top-1 -right-1 flex items-center justify-center rounded-full text-[9px] font-semibold leading-none text-white ring-2 ring-card bg-danger min-h-4 min-w-4 px-1" aria-hidden="true">12</span>
        </span>
        HTML;

    $statusCode = <<<'BLADE'
        <x-ui.icon name="bi-check-circle-fill" color="success" variant="soft" label="Concluído" />
        <x-ui.icon name="bi-exclamation-circle-fill" color="warning" variant="soft" label="Atenção" />
        <x-ui.icon name="bi-x-circle-fill" color="danger" variant="soft" label="Erro" />
        <x-ui.icon name="bi-info-circle-fill" color="info" variant="soft" label="Info" />
        BLADE;

    $statusHtml = <<<'HTML'
        <span role="img" aria-label="Concluído" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-success/15 text-success"><i class="bi bi-check-circle-fill leading-none text-xl" aria-hidden="true"></i></span>
        <span role="img" aria-label="Atenção" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-warning/15 text-warning"><i class="bi bi-exclamation-circle-fill leading-none text-xl" aria-hidden="true"></i></span>
        <span role="img" aria-label="Erro" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-danger/15 text-danger"><i class="bi bi-x-circle-fill leading-none text-xl" aria-hidden="true"></i></span>
        <span role="img" aria-label="Info" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-info/15 text-info"><i class="bi bi-info-circle-fill leading-none text-xl" aria-hidden="true"></i></span>
        HTML;

    $toolbarCode = <<<'BLADE'
        <div class="inline-flex items-center gap-1 rounded-xl border border-border bg-card p-1 shadow-sm">
            <x-ui.icon name="bi-type-bold" href="#" variant="ghost" boxSize="sm" shape="square" label="Negrito" />
            <x-ui.icon name="bi-type-italic" href="#" variant="ghost" boxSize="sm" shape="square" label="Itálico" />
            <x-ui.icon name="bi-type-underline" href="#" variant="ghost" boxSize="sm" shape="square" label="Sublinhado" />
            <span class="mx-1 h-5 w-px bg-border"></span>
            <x-ui.icon name="bi-link-45deg" href="#" variant="ghost" boxSize="sm" shape="square" label="Link" />
        </div>
        BLADE;

/*     ghost + boxSize sm + shape square (md default cai em rounded-xl para shape != circle; sm-> rounded-md por causa da regra especial de boxSize=xs? não, sm segue o default rounded-xl também, já que só xs/lg/xl têm regra própria) 
*/
    $toolbarHtml = <<<'HTML'
        <div class="inline-flex items-center gap-1 rounded-xl border border-border bg-card p-1 shadow-sm">
            <a href="#" aria-label="Negrito" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-8 rounded-xl bg-transparent text-muted-foreground hover:bg-muted hover:text-foreground">
                <i class="bi bi-type-bold leading-none text-sm" aria-hidden="true"></i>
            </a>
            <a href="#" aria-label="Itálico" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-8 rounded-xl bg-transparent text-muted-foreground hover:bg-muted hover:text-foreground">
                <i class="bi bi-type-italic leading-none text-sm" aria-hidden="true"></i>
            </a>
            <a href="#" aria-label="Sublinhado" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-8 rounded-xl bg-transparent text-muted-foreground hover:bg-muted hover:text-foreground">
                <i class="bi bi-type-underline leading-none text-sm" aria-hidden="true"></i>
            </a>
            <span class="mx-1 h-5 w-px bg-border" aria-hidden="true"></span>
            <a href="#" aria-label="Link" class="relative inline-flex shrink-0 items-center justify-center transition-colors size-8 rounded-xl bg-transparent text-muted-foreground hover:bg-muted hover:text-foreground">
                <i class="bi bi-link-45deg leading-none text-sm" aria-hidden="true"></i>
            </a>
        </div>
        HTML;

    $captionCode = <<<'BLADE'
        <div class="flex flex-col items-center gap-1.5">
            <x-ui.icon name="bi-house-fill" color="primary" variant="soft" />
            <span class="text-xs text-muted-foreground">Início</span>
        </div>
        BLADE;

    $captionHtml = <<<'HTML'
        <div class="flex flex-col items-center gap-1.5">
            <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-11 rounded-full bg-primary/15 text-primary"><i class="bi bi-house-fill leading-none text-xl" aria-hidden="true"></i></span>
            <span class="text-xs text-muted-foreground">Início</span>
        </div>
        HTML;

    $buttonCode = <<<'BLADE'
        <x-ui.button color="primary" size="sm" icon="bi-plus-lg">Novo item</x-ui.button>

        <x-ui.button variant="outline" color="secondary" size="sm">
            <x-ui.icon name="bi-download" size="sm" />
            Baixar relatório
        </x-ui.button>

        <x-ui.button variant="soft" color="primary" size="sm">
            <x-ui.icon name="bi-arrow-repeat" size="sm" spin />
            Sincronizando
        </x-ui.button>
        BLADE;

    $buttonHtml = <<<'HTML'
        <button type="button" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i><span>Novo item</span></button>

        <button type="button" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-download leading-none text-sm" aria-hidden="true"></i>
            Baixar relatório
        </button>

        <button type="button" class="btn btn-sm btn-soft-primary">
            <i class="bi bi-arrow-repeat leading-none text-sm animate-spin" aria-hidden="true"></i>
            Sincronizando
        </button>
        HTML;

    $galleryCode = <<<'BLADE'
        <x-ui.icon name="bi-house-fill" color="secondary" variant="soft" boxSize="sm" />
        <x-ui.icon name="bi-bag-fill" color="secondary" variant="soft" boxSize="sm" />
        <x-ui.icon name="bi-envelope-fill" color="secondary" variant="soft" boxSize="sm" />
        BLADE;

    $galleryHtml = <<<'HTML'
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-8 rounded-full bg-secondary/15 text-secondary"><i class="bi bi-house-fill leading-none text-sm" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-8 rounded-full bg-secondary/15 text-secondary"><i class="bi bi-bag-fill leading-none text-sm" aria-hidden="true"></i></span>
        <span class="relative inline-flex shrink-0 items-center justify-center transition-colors size-8 rounded-full bg-secondary/15 text-secondary"><i class="bi bi-envelope-fill leading-none text-sm" aria-hidden="true"></i></span>
        HTML;

    $gallery = [
        'Navegação' => ['bi-house-fill', 'bi-compass-fill', 'bi-map-fill', 'bi-geo-alt-fill', 'bi-signpost-2-fill', 'bi-arrow-left-right'],
        'Comércio' => ['bi-bag-fill', 'bi-cart-fill', 'bi-credit-card-fill', 'bi-receipt', 'bi-tag-fill', 'bi-box-seam-fill'],
        'Comunicação' => ['bi-envelope-fill', 'bi-chat-dots-fill', 'bi-bell-fill', 'bi-megaphone-fill', 'bi-telephone-fill', 'bi-send-fill'],
        'Mídia' => ['bi-image-fill', 'bi-camera-fill', 'bi-play-circle-fill', 'bi-music-note-beamed', 'bi-film', 'bi-mic-fill'],
        'Sistema' => ['bi-gear-fill', 'bi-shield-lock-fill', 'bi-person-fill', 'bi-people-fill', 'bi-search', 'bi-sliders'],
    ];
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.icon&gt;</code> é um wrapper para <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener" class="underline">Bootstrap Icons</a>
            (prop <code>name</code>, ex.: <code>bi-house-fill</code>). Sem <code>variant</code> renderiza um
            <code>&lt;i&gt;</code> simples; com <code>variant="soft|solid|outline|ghost"</code> ganha um container
            colorido. Suporta <code>spin</code>, <code>pulse</code>, <code>flip</code>, <code>rotate</code>,
            <code>ring</code>, <code>shadow</code>, badge de notificação e uso como link (<code>href</code>).
            Por padrão é decorativo (<code>aria-hidden</code>) — passe <code>label</code> quando o ícone
            carregar significado próprio.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Prop <code>name</code> — qualquer classe <code>bi-*</code>.
            </x-slot:description>
            <div class="flex items-center gap-4 text-xl">
                <x-ui.icon name="bi-house-fill" />
                <x-ui.icon name="bi-heart-fill" />
                <x-ui.icon name="bi-star-fill" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos do glifo" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>xs|sm|md|lg|xl|2xl</code> — controla o glifo quando não há box.
            </x-slot:description>
            <div class="flex items-center gap-4">
                <x-ui.icon name="bi-stars" size="xs" />
                <x-ui.icon name="bi-stars" size="sm" />
                <x-ui.icon name="bi-stars" size="md" />
                <x-ui.icon name="bi-stars" size="lg" />
                <x-ui.icon name="bi-stars" size="xl" />
                <x-ui.icon name="bi-stars" size="2xl" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores (sem box)" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> — tokens do tema; sem variant, só pinta o glifo.
            </x-slot:description>
            <div class="flex items-center gap-4 text-xl">
                <x-ui.icon name="bi-circle-fill" color="primary" />
                <x-ui.icon name="bi-circle-fill" color="secondary" />
                <x-ui.icon name="bi-circle-fill" color="success" />
                <x-ui.icon name="bi-circle-fill" color="warning" />
                <x-ui.icon name="bi-circle-fill" color="danger" />
                <x-ui.icon name="bi-circle-fill" color="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes com box" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>variant</code>: <code>soft|solid|outline|ghost</code> —
                <code>ghost</code> é transparente com hover, ideal para toolbars.
            </x-slot:description>
            <div class="flex items-center gap-4">
                <x-ui.icon name="bi-box-seam-fill" color="primary" variant="soft" />
                <x-ui.icon name="bi-box-seam-fill" color="primary" variant="solid" />
                <x-ui.icon name="bi-box-seam-fill" color="primary" variant="outline" />
                <x-ui.icon name="bi-box-seam-fill" color="primary" variant="ghost" />
            </div>
        </x-ui.example>

        <x-ui.example title="Matriz cor × variante" :code="$matrixCode" :html="$matrixHtml">
            <x-slot:description>
                Soft, solid e outline em todos os tokens — o padrão visual da biblioteca.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                @foreach (['primary', 'secondary', 'success', 'warning', 'danger', 'info'] as $token)
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="w-20 shrink-0 text-xs font-medium text-muted-foreground capitalize">{{ $token }}</span>
                        <x-ui.icon name="bi-bookmark-fill" :color="$token" variant="soft" />
                        <x-ui.icon name="bi-bookmark-fill" :color="$token" variant="solid" />
                        <x-ui.icon name="bi-bookmark-fill" :color="$token" variant="outline" />
                        <x-ui.icon name="bi-bookmark-fill" :color="$token" variant="ghost" />
                    </div>
                @endforeach
            </div>
        </x-ui.example>

        <x-ui.example title="Formato do box" :code="$shapeCode" :html="$shapeHtml">
            <x-slot:description>
                <code>shape</code>: <code>circle</code> (padrão) ou <code>square</code>.
            </x-slot:description>
            <div class="flex items-center gap-4">
                <x-ui.icon name="bi-gear-fill" color="secondary" variant="soft" shape="circle" />
                <x-ui.icon name="bi-gear-fill" color="secondary" variant="soft" shape="square" />
                <x-ui.icon name="bi-gear-fill" color="secondary" variant="solid" shape="square" />
                <x-ui.icon name="bi-gear-fill" color="secondary" variant="outline" shape="circle" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanho do box" :code="$boxSizesCode" :html="$boxSizesHtml">
            <x-slot:description>
                <code>boxSize</code>: <code>xs|sm|md|lg|xl</code> — dimensões do container (independente de <code>size</code>).
            </x-slot:description>
            <div class="flex items-center gap-4">
                <x-ui.icon name="bi-lightning-fill" color="warning" variant="solid" boxSize="xs" />
                <x-ui.icon name="bi-lightning-fill" color="warning" variant="solid" boxSize="sm" />
                <x-ui.icon name="bi-lightning-fill" color="warning" variant="solid" boxSize="md" />
                <x-ui.icon name="bi-lightning-fill" color="warning" variant="solid" boxSize="lg" />
                <x-ui.icon name="bi-lightning-fill" color="warning" variant="solid" boxSize="xl" />
            </div>
        </x-ui.example>

        <x-ui.example title="Ring e shadow" :code="$ringShadowCode" :html="$ringShadowHtml">
            <x-slot:description>
                <code>ring</code> adiciona um anel suave na cor do token;
                <code>shadow</code> aplica <code>shadow-sm</code> no box.
            </x-slot:description>
            <div class="flex items-center gap-4">
                <x-ui.icon name="bi-shield-fill-check" color="success" variant="soft" ring />
                <x-ui.icon name="bi-rocket-takeoff-fill" color="primary" variant="solid" shadow />
                <x-ui.icon name="bi-gem" color="info" variant="soft" ring shadow shape="square" />
            </div>
        </x-ui.example>

        <x-ui.example title="Spin e pulse" :code="$spinCode" :html="$spinHtml">
            <x-slot:description>
                <code>spin</code> — rotação contínua (loading).
                <code>pulse</code> — opacidade pulsante (atenção / live).
            </x-slot:description>
            <div class="flex items-center gap-4">
                <x-ui.icon name="bi-arrow-repeat" size="lg" spin />
                <x-ui.icon name="bi-arrow-clockwise" color="primary" variant="soft" spin />
                <x-ui.icon name="bi-wifi" color="warning" size="lg" pulse />
                <x-ui.icon name="bi-broadcast" color="danger" variant="soft" pulse />
            </div>
        </x-ui.example>

        <x-ui.example title="Flip e rotate" :code="$flipRotateCode" :html="$flipRotateHtml">
            <x-slot:description>
                <code>flip</code>: <code>horizontal|vertical</code>. <code>rotate</code>: <code>90|180|270</code>.
            </x-slot:description>
            <div class="flex items-center gap-4">
                <x-ui.icon name="bi-signpost-fill" size="lg" />
                <x-ui.icon name="bi-signpost-fill" size="lg" flip="horizontal" />
                <x-ui.icon name="bi-signpost-fill" size="lg" flip="vertical" />
                <x-ui.icon name="bi-arrow-up" size="lg" :rotate="90" />
                <x-ui.icon name="bi-arrow-up" size="lg" :rotate="180" />
                <x-ui.icon name="bi-arrow-up" size="lg" :rotate="270" />
            </div>
        </x-ui.example>

        <x-ui.example title="Status" :code="$statusCode" :html="$statusHtml">
            <x-slot:description>
                Conjunto pronto para feedbacks — soft + cor semântica + <code>label</code>.
            </x-slot:description>
            <div class="flex items-center gap-3">
                <x-ui.icon name="bi-check-circle-fill" color="success" variant="soft" label="Concluído" />
                <x-ui.icon name="bi-exclamation-circle-fill" color="warning" variant="soft" label="Atenção" />
                <x-ui.icon name="bi-x-circle-fill" color="danger" variant="soft" label="Erro" />
                <x-ui.icon name="bi-info-circle-fill" color="info" variant="soft" label="Info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Acessibilidade (label)" :code="$labelCode" :html="$labelHtml">
            <x-slot:description>
                Sem <code>label</code> o ícone é decorativo (<code>aria-hidden</code>). Com <code>label</code>, vira <code>role="img"</code> + <code>aria-label</code>.
            </x-slot:description>
            <div class="flex items-center gap-4">
                <x-ui.icon name="bi-star-fill" color="warning" />
                <x-ui.icon name="bi-exclamation-triangle-fill" color="danger" label="Atenção: campo obrigatório" />
            </div>
        </x-ui.example>

        <x-ui.example title="Como link" :code="$linkCode" :html="$linkHtml">
            <x-slot:description>
                <code>href</code> renderiza <code>&lt;a&gt;</code>. Sem <code>variant</code>, aplica hit-target
                no estilo ghost automaticamente.
            </x-slot:description>
            <div class="flex items-center gap-4">
                <x-ui.icon name="bi-github" href="#" color="secondary" variant="soft" label="Abrir no GitHub" />
                <x-ui.icon name="bi-share-fill" href="#" color="primary" variant="solid" label="Compartilhar" />
                <x-ui.icon name="bi-three-dots" href="#" variant="ghost" boxSize="sm" label="Mais ações" />
            </div>
        </x-ui.example>

        <x-ui.example title="Com badge" :code="$badgeCode" :html="$badgeHtml">
            <x-slot:description>
                <code>badge</code> (texto/número ou atributo vazio = ponto) + <code>badgeColor</code>.
                Contadores com 2+ dígitos ganham padding automático.
            </x-slot:description>
            <div class="flex items-center gap-4">
                <x-ui.icon name="bi-bell-fill" color="secondary" variant="soft" boxSize="lg" badge="3" />
                <x-ui.icon name="bi-envelope-fill" color="primary" variant="soft" boxSize="lg" badge badgeColor="success" />
                <x-ui.icon name="bi-chat-dots-fill" color="info" variant="soft" boxSize="lg" badge="12" badgeColor="danger" />
                <x-ui.icon name="bi-cart-fill" color="warning" variant="solid" boxSize="lg" badge="99+" />
            </div>
        </x-ui.example>

        <x-ui.example title="Toolbar (ghost)" :code="$toolbarCode" :html="$toolbarHtml">
            <x-slot:description>
                <code>variant="ghost"</code> + <code>shape="square"</code> + <code>boxSize="sm"</code> —
                padrão clássico de barra de ferramentas.
            </x-slot:description>
            <div class="inline-flex items-center gap-1 rounded-xl border border-border bg-card p-1 shadow-sm">
                <x-ui.icon name="bi-type-bold" href="#" variant="ghost" boxSize="sm" shape="square" label="Negrito" />
                <x-ui.icon name="bi-type-italic" href="#" variant="ghost" boxSize="sm" shape="square" label="Itálico" />
                <x-ui.icon name="bi-type-underline" href="#" variant="ghost" boxSize="sm" shape="square" label="Sublinhado" />
                <span class="mx-1 h-5 w-px bg-border" aria-hidden="true"></span>
                <x-ui.icon name="bi-list-ul" href="#" variant="ghost" boxSize="sm" shape="square" label="Lista" />
                <x-ui.icon name="bi-link-45deg" href="#" variant="ghost" boxSize="sm" shape="square" label="Link" />
                <span class="mx-1 h-5 w-px bg-border" aria-hidden="true"></span>
                <x-ui.icon name="bi-image" href="#" variant="ghost" boxSize="sm" shape="square" label="Imagem" />
            </div>
        </x-ui.example>

        <x-ui.example title="Com legenda" :code="$captionCode" :html="$captionHtml">
            <x-slot:description>
                Ícone + texto abaixo — útil em navs compactas e empty states.
            </x-slot:description>
            <div class="flex items-start gap-6">
                <div class="flex flex-col items-center gap-1.5">
                    <x-ui.icon name="bi-house-fill" color="primary" variant="soft" />
                    <span class="text-xs font-medium text-foreground">Início</span>
                </div>
                <div class="flex flex-col items-center gap-1.5">
                    <x-ui.icon name="bi-search" color="secondary" variant="soft" />
                    <span class="text-xs font-medium text-foreground">Buscar</span>
                </div>
                <div class="flex flex-col items-center gap-1.5">
                    <x-ui.icon name="bi-person-fill" color="info" variant="soft" />
                    <span class="text-xs font-medium text-foreground">Perfil</span>
                </div>
                <div class="flex flex-col items-center gap-1.5">
                    <x-ui.icon name="bi-bell-fill" color="warning" variant="soft" badge="2" />
                    <span class="text-xs font-medium text-foreground">Alertas</span>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Dentro de outros componentes" :code="$buttonCode" :html="$buttonHtml">
            <x-slot:description>
                <code>&lt;x-ui.button&gt;</code> já tem prop <code>icon</code>; use <code>&lt;x-ui.icon&gt;</code>
                no slot quando precisar de spin, tamanho fino, etc.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-3">
                <x-ui.button color="primary" size="sm" icon="bi-plus-lg">Novo item</x-ui.button>

                <x-ui.button variant="outline" color="secondary" size="sm">
                    <x-ui.icon name="bi-download" size="sm" />
                    Baixar relatório
                </x-ui.button>

                <x-ui.button variant="soft" color="primary" size="sm">
                    <x-ui.icon name="bi-arrow-repeat" size="sm" spin />
                    Sincronizando
                </x-ui.button>
            </div>
        </x-ui.example>

        <x-ui.example title="Galeria rápida" :code="$galleryCode" :html="$galleryHtml">
            <x-slot:description>
                Amostra de ícones Bootstrap agrupados por contexto — consulte o
                <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener" class="underline">catálogo completo</a>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-5">
                @foreach ($gallery as $group => $icons)
                    <div>
                        <p class="mb-2 text-xs font-semibold tracking-wide text-muted-foreground uppercase">{{ $group }}</p>
                        <div class="grid grid-cols-3 gap-2 sm:grid-cols-6">
                            @foreach ($icons as $iconName)
                                <div class="flex flex-col items-center gap-1.5 rounded-lg border border-border/60 bg-muted/30 px-2 py-3">
                                    <x-ui.icon :name="$iconName" color="secondary" variant="soft" boxSize="sm" />
                                    <span class="max-w-full truncate text-[10px] text-muted-foreground">{{ str_replace('bi-', '', $iconName) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="icon" />
</x-ui.docs>
