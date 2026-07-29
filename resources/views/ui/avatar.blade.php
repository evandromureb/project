<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $sizesCode = <<<'BLADE'
        <x-ui.avatar initials="AB" size="xs" color="primary" circle />
        <x-ui.avatar initials="AB" size="sm" color="primary" circle />
        <x-ui.avatar initials="AB" size="md" color="primary" circle />
        <x-ui.avatar initials="AB" size="lg" color="primary" circle />
        <x-ui.avatar initials="AB" size="xl" color="primary" circle />
        BLADE;

    $sizesHtml = <<<'HTML'
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-6 text-xs bg-primary/15 text-primary rounded-full">
            <span>AB</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-8 text-xs bg-primary/15 text-primary rounded-full">
            <span>AB</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full">
            <span>AB</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-12 text-base bg-primary/15 text-primary rounded-full">
            <span>AB</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-16 text-lg bg-primary/15 text-primary rounded-full">
            <span>AB</span>
        </div>
        HTML;

    $shapeCode = <<<'BLADE'
        <x-ui.avatar initials="AB" color="primary" />
        <x-ui.avatar initials="AB" color="primary" circle />
        BLADE;

    $shapeHtml = <<<'HTML'
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-md">
            <span>AB</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full">
            <span>AB</span>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.avatar initials="PR" color="primary" circle />
        <x-ui.avatar initials="SE" color="secondary" circle />
        <x-ui.avatar initials="SU" color="success" circle />
        <x-ui.avatar initials="WA" color="warning" circle />
        <x-ui.avatar initials="DA" color="danger" circle />
        <x-ui.avatar initials="IN" color="info" circle />
        BLADE;

    $colorsHtml = <<<'HTML'
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full">
            <span>PR</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-secondary/15 text-secondary rounded-full">
            <span>SE</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-success/15 text-success rounded-full">
            <span>SU</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-warning/15 text-warning rounded-full">
            <span>WA</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-danger/15 text-danger rounded-full">
            <span>DA</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-info/15 text-info rounded-full">
            <span>IN</span>
        </div>
        HTML;

    $autoColorCode = <<<'BLADE'
        <x-ui.avatar name="Ana Souza" color="auto" circle />
        <x-ui.avatar name="Bruno Lima" color="auto" circle />
        <x-ui.avatar name="Carla Dias" color="auto" circle />
        BLADE;

    $autoColorHtml = <<<'HTML'
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-secondary/15 text-secondary rounded-full" title="Ana Souza">
            <span>AS</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-info/15 text-info rounded-full" title="Bruno Lima">
            <span>BL</span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-danger/15 text-danger rounded-full" title="Carla Dias">
            <span>CD</span>
        </div>
        HTML;

    $nameCode = <<<'BLADE'
        <x-ui.avatar name="Guest User" color="primary" circle />
        BLADE;

    $nameHtml = <<<'HTML'
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full" title="Guest User">
            <span>GU</span>
        </div>
        HTML;

    $iconCode = <<<'BLADE'
        <x-ui.avatar icon="bi-person-fill" color="secondary" circle />
        <x-ui.avatar icon="bi-building" color="info" circle />
        <x-ui.avatar icon="bi-gear-fill" color="warning" circle />
        BLADE;

    $iconHtml = <<<'HTML'
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-secondary/15 text-secondary rounded-full">
            <i class="bi bi-person-fill" aria-hidden="true"></i>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-info/15 text-info rounded-full">
            <i class="bi bi-building" aria-hidden="true"></i>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-warning/15 text-warning rounded-full">
            <i class="bi bi-gear-fill" aria-hidden="true"></i>
        </div>
        HTML;

    $imageCode = <<<'BLADE'
        <x-ui.avatar src="https://i.pravatar.cc/80?img=12" alt="Avatar de exemplo" size="lg" circle />
        BLADE;

    $imageHtml = <<<'HTML'
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-12 text-base bg-muted text-foreground rounded-full" title="Avatar de exemplo">
            <img src="https://i.pravatar.cc/80?img=12" alt="Avatar de exemplo" class="size-full object-cover rounded-full">
        </div>
        HTML;

    $badgeCode = <<<'BLADE'
        <x-ui.avatar initials="ON" color="primary" circle badge badgeColor="success" />
        <x-ui.avatar initials="AW" color="primary" circle badge badgeColor="warning" />
        <x-ui.avatar initials="OF" color="primary" circle badge badgeColor="danger" />
        BLADE;

    $badgeHtml = <<<'HTML'
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full">
            <span>ON</span>
            <span class="absolute right-0 bottom-0 flex size-3 items-center justify-center rounded-full ring-2 ring-card bg-success" aria-hidden="true"></span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full">
            <span>AW</span>
            <span class="absolute right-0 bottom-0 flex size-3 items-center justify-center rounded-full ring-2 ring-card bg-warning" aria-hidden="true"></span>
        </div>
        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full">
            <span>OF</span>
            <span class="absolute right-0 bottom-0 flex size-3 items-center justify-center rounded-full ring-2 ring-card bg-danger" aria-hidden="true"></span>
        </div>
        HTML;

    $linkCode = <<<'BLADE'
        <x-ui.avatar name="Guest User" color="primary" circle href="#" />
        BLADE;

    $linkHtml = <<<'HTML'
        <a href="#" class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full" title="Guest User">
            <span>GU</span>
        </a>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-ui.avatar&gt;</code>
            exibe a foto, as iniciais ou um ícone de um usuário/entidade. Suporta tamanhos, cores, formato
            (quadrado ou circular), badge de status e link de destino.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                Controle o tamanho com <code>size</code>: <code>xs</code>, <code>sm</code>, <code>md</code>, <code>lg</code> ou <code>xl</code>.
            </x-slot:description>
            <x-ui.avatar initials="AB" size="xs" color="primary" circle />
            <x-ui.avatar initials="AB" size="sm" color="primary" circle />
            <x-ui.avatar initials="AB" size="md" color="primary" circle />
            <x-ui.avatar initials="AB" size="lg" color="primary" circle />
            <x-ui.avatar initials="AB" size="xl" color="primary" circle />
        </x-ui.example>

        <x-ui.example title="Formato" :code="$shapeCode" :html="$shapeHtml">
            <x-slot:description>
                O padrão é quadrado com cantos suaves; use <code>circle</code> para o formato circular.
            </x-slot:description>
            <x-ui.avatar initials="AB" color="primary" />
            <x-ui.avatar initials="AB" color="primary" circle />
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Use a prop <code>color</code> para o fundo das iniciais/ícone.
            </x-slot:description>
            <x-ui.avatar initials="PR" color="primary" circle />
            <x-ui.avatar initials="SE" color="secondary" circle />
            <x-ui.avatar initials="SU" color="success" circle />
            <x-ui.avatar initials="WA" color="warning" circle />
            <x-ui.avatar initials="DA" color="danger" circle />
            <x-ui.avatar initials="IN" color="info" circle />
        </x-ui.example>

        <x-ui.example title="Cor automática" :code="$autoColorCode" :html="$autoColorHtml">
            <x-slot:description>
                Com <code>color="auto"</code>, a cor é derivada do <code>name</code>.
            </x-slot:description>
            <x-ui.avatar name="Ana Souza" color="auto" circle />
            <x-ui.avatar name="Bruno Lima" color="auto" circle />
            <x-ui.avatar name="Carla Dias" color="auto" circle />
        </x-ui.example>

        <x-ui.example title="A partir do nome" :code="$nameCode" :html="$nameHtml">
            <x-slot:description>
                A prop <code>name</code> gera as iniciais automaticamente.
            </x-slot:description>
            <x-ui.avatar name="Guest User" color="primary" circle />
        </x-ui.example>

        <x-ui.example title="Com ícone" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                A prop <code>icon</code> aceita uma classe Bootstrap Icons no lugar das iniciais.
            </x-slot:description>
            <x-ui.avatar icon="bi-person-fill" color="secondary" circle />
            <x-ui.avatar icon="bi-building" color="info" circle />
            <x-ui.avatar icon="bi-gear-fill" color="warning" circle />
        </x-ui.example>

        <x-ui.example title="Com imagem" :code="$imageCode" :html="$imageHtml">
            <x-slot:description>
                Use <code>src</code> (e opcionalmente <code>alt</code>) para exibir uma foto.
            </x-slot:description>
            <x-ui.avatar src="https://i.pravatar.cc/80?img=12" alt="Avatar de exemplo" size="lg" circle />
        </x-ui.example>

        <x-ui.example title="Badge de status" :code="$badgeCode" :html="$badgeHtml">
            <x-slot:description>
                As props <code>badge</code> e <code>badgeColor</code> adicionam um indicador de status.
            </x-slot:description>
            <x-ui.avatar initials="ON" color="primary" circle badge badgeColor="success" />
            <x-ui.avatar initials="AW" color="primary" circle badge badgeColor="warning" />
            <x-ui.avatar initials="OF" color="primary" circle badge badgeColor="danger" />
        </x-ui.example>

        <x-ui.example title="Como link" :code="$linkCode" :html="$linkHtml">
            <x-slot:description>
                Com a prop <code>href</code>, o avatar é renderizado como <code>&lt;a&gt;</code>.
            </x-slot:description>
            <x-ui.avatar name="Guest User" color="primary" circle href="#" />
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="avatar" />
</x-ui.docs>
