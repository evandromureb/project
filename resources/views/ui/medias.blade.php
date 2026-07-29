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
<x-ui.media
    title="Media heading"
    description="This is some content from a media component. You can replace this with any content and adjust it as needed."
    icon="bi-person-fill"
    iconColor="primary"
/>
BLADE;

    $positionCode = <<<'BLADE'
<x-ui.media
    title="Media à esquerda"
    description="position=&quot;start&quot; (padrão) — mídia antes do conteúdo."
    icon="bi-image"
    iconColor="info"
    position="start"
/>
<x-ui.media
    title="Media à direita"
    description="position=&quot;end&quot; — mídia depois do conteúdo (flex-row-reverse)."
    icon="bi-image"
    iconColor="success"
    position="end"
/>
BLADE;

    $alignCode = <<<'BLADE'
<x-ui.media
    title="Top Aligned media"
    description="Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis."
    icon="bi-align-top"
    iconColor="primary"
    align="start"
/>
<x-ui.media
    title="Center Aligned media"
    description="Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis."
    icon="bi-align-middle"
    iconColor="warning"
    align="center"
/>
<x-ui.media
    title="Bottom Aligned media"
    description="Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis."
    icon="bi-align-bottom"
    iconColor="danger"
    align="end"
/>
BLADE;

    $nestingCode = <<<'BLADE'
<x-ui.media
    title="Media heading"
    description="This is some content from a media component. You can replace this with any content and adjust it as needed."
    icon="bi-chat-left-text"
    iconColor="primary"
>
    <x-ui.media
        title="Media aninhada"
        description="Place nested media within the body of a parent media object."
        icon="bi-chat-left"
        iconColor="secondary"
        media-size="sm"
    />
</x-ui.media>
<x-ui.media
    title="Outro item"
    description="Sibling media object after the nested block."
    icon="bi-person-badge"
    iconColor="info"
/>
BLADE;

    $gridCode = <<<'BLADE'
<x-ui.media.media-group :cols="2" gap="md">
    <x-ui.media
        title="Notificações"
        description="Alertas e mensagens do sistema."
        icon="bi-bell-fill"
        iconColor="warning"
        variant="bordered"
    />
    <x-ui.media
        title="Equipe"
        description="Membros e permissões."
        icon="bi-people-fill"
        iconColor="primary"
        variant="bordered"
    />
    <x-ui.media
        title="Arquivos"
        description="Uploads e anexos recentes."
        icon="bi-folder-fill"
        iconColor="info"
        variant="bordered"
    />
    <x-ui.media
        title="Faturamento"
        description="Faturas e métodos de pagamento."
        icon="bi-credit-card-fill"
        iconColor="success"
        variant="bordered"
    />
</x-ui.media.media-group>
BLADE;

    $gridThreeCode = <<<'BLADE'
<x-ui.media.media-group :cols="3">
    <x-ui.media title="Alpha" description="Coluna responsiva." icon="bi-1-circle-fill" iconColor="primary" variant="soft" />
    <x-ui.media title="Beta" description="Coluna responsiva." icon="bi-2-circle-fill" iconColor="success" variant="soft" />
    <x-ui.media title="Gamma" description="Coluna responsiva." icon="bi-3-circle-fill" iconColor="warning" variant="soft" />
</x-ui.media.media-group>
BLADE;

    $listCode = <<<'BLADE'
<x-ui.media.media-group divided>
    <x-ui.media title="Ana Souza" description="Comentou no pedido #4821." icon="bi-person-fill" iconColor="primary" />
    <x-ui.media title="Bruno Lima" description="Marcou a tarefa como concluída." icon="bi-person-fill" iconColor="success" />
    <x-ui.media title="Carla Dias" description="Enviou um novo anexo." icon="bi-person-fill" iconColor="info" />
</x-ui.media.media-group>
BLADE;

    $avatarCode = <<<'BLADE'
<x-ui.media title="Ana Souza" description="Product designer · Online agora">
    <x-slot:media>
        <x-ui.avatar name="Ana Souza" color="auto" circle size="lg" badge badge-color="success" />
    </x-slot:media>
    <x-slot:actions>
        <x-ui.button size="sm" color="primary" variant="soft">Mensagem</x-ui.button>
        <x-ui.button size="sm" variant="outline" color="secondary">Perfil</x-ui.button>
    </x-slot:actions>
</x-ui.media>
BLADE;

    $variantsCode = <<<'BLADE'
<x-ui.media title="Soft" description="Fundo muted." icon="bi-layers" variant="soft" />
<x-ui.media title="Bordered" description="Card com borda." icon="bi-card-heading" iconColor="secondary" variant="bordered" />
<x-ui.media title="Accent" description="Barra colorida à esquerda." icon="bi-bookmark-fill" iconColor="success" variant="accent" />
BLADE;

    $sizesCode = <<<'BLADE'
<x-ui.media title="sm" description="mediaSize=&quot;sm&quot;" icon="bi-stars" iconColor="info" media-size="sm" />
<x-ui.media title="md" description="mediaSize=&quot;md&quot; (padrão)" icon="bi-stars" iconColor="info" media-size="md" />
<x-ui.media title="lg" description="mediaSize=&quot;lg&quot;" icon="bi-stars" iconColor="info" media-size="lg" />
<x-ui.media title="xl" description="mediaSize=&quot;xl&quot;" icon="bi-stars" iconColor="info" media-size="xl" />
BLADE;

    $metaCode = <<<'BLADE'
<x-ui.media
    title="Campanha de verão"
    description="Relatório semanal de performance."
    icon="bi-megaphone-fill"
    iconColor="warning"
    href="#"
>
    <x-slot:meta>
        <span class="inline-flex items-center gap-1"><i class="bi bi-calendar3"></i> 12 Jul – 30 Ago</span>
        <span class="text-border">·</span>
        <span class="inline-flex items-center gap-1"><i class="bi bi-eye"></i> 8.4k views</span>
    </x-slot:meta>
</x-ui.media>
BLADE;

    $iconVariantsCode = <<<'BLADE'
<x-ui.media title="Soft" description="iconVariant soft" icon="bi-box-seam" iconVariant="soft" iconColor="primary" />
<x-ui.media title="Solid" description="iconVariant solid" icon="bi-box-seam" iconVariant="solid" iconColor="primary" />
<x-ui.media title="Outline" description="iconVariant outline" icon="bi-box-seam" iconVariant="outline" iconColor="primary" />
BLADE;

    $endAlignComboCode = <<<'BLADE'
<x-ui.media
    title="End + center"
    description="position=&quot;end&quot; com align=&quot;center&quot; — mídia à direita, centrada verticalmente."
    icon="bi-arrow-left-right"
    iconColor="info"
    position="end"
    align="center"
    variant="bordered"
/>
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full min-w-0 items-start gap-3 flex-row">
    <div class="shrink-0">
        <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
            <i class="bi bi-person-fill text-xl leading-none"></i>
        </span>
    </div>
    <div class="min-w-0 flex-1">
        <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Media heading</h5>
        <div class="mt-1 text-sm leading-relaxed text-muted-foreground">
            This is some content from a media component. You can replace this with any content and adjust it as needed.
        </div>
    </div>
</div>
HTML;

    $positionHtml = <<<'HTML'
<div class="flex w-full flex-col gap-6">
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-info/15 text-info ring-info/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-image text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Media à esquerda</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">
                position="start" (padrão) — mídia antes do conteúdo.
            </div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row-reverse">
        <div class="shrink-0">
            <span class="bg-success/15 text-success ring-success/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-image text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Media à direita</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">
                position="end" — mídia depois do conteúdo (flex-row-reverse).
            </div>
        </div>
    </div>
</div>
HTML;

    $alignHtml = <<<'HTML'
<div class="flex w-full flex-col gap-6">
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-align-top text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Top Aligned media</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo.
            </div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-center gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-warning/15 text-warning ring-warning/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-align-middle text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Center Aligned media</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo.
            </div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-end gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-danger/15 text-danger ring-danger/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-align-bottom text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Bottom Aligned media</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo.
            </div>
        </div>
    </div>
</div>
HTML;

    $gridHtml = <<<'HTML'
<div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-6">
    <div class="flex w-full min-w-0 items-start gap-3 flex-row rounded-xl border border-border bg-card p-3.5 shadow-sm">
        <div class="shrink-0">
            <span class="bg-warning/15 text-warning ring-warning/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-bell-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Notificações</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Alertas e mensagens do sistema.</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row rounded-xl border border-border bg-card p-3.5 shadow-sm">
        <div class="shrink-0">
            <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-people-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Equipe</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Membros e permissões.</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row rounded-xl border border-border bg-card p-3.5 shadow-sm">
        <div class="shrink-0">
            <span class="bg-info/15 text-info ring-info/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-folder-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Arquivos</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Uploads e anexos recentes.</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row rounded-xl border border-border bg-card p-3.5 shadow-sm">
        <div class="shrink-0">
            <span class="bg-success/15 text-success ring-success/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-credit-card-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Faturamento</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Faturas e métodos de pagamento.</div>
        </div>
    </div>
</div>
HTML;

    $gridThreeHtml = <<<'HTML'
<div class="w-full grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
    <div class="flex w-full min-w-0 items-start gap-3 flex-row rounded-xl bg-muted/50 p-3.5">
        <div class="shrink-0">
            <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-1-circle-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Alpha</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Coluna responsiva.</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row rounded-xl bg-muted/50 p-3.5">
        <div class="shrink-0">
            <span class="bg-success/15 text-success ring-success/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-2-circle-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Beta</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Coluna responsiva.</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row rounded-xl bg-muted/50 p-3.5">
        <div class="shrink-0">
            <span class="bg-warning/15 text-warning ring-warning/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-3-circle-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Gamma</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Coluna responsiva.</div>
        </div>
    </div>
</div>
HTML;

    $listHtml = <<<'HTML'
<div class="w-full flex flex-col gap-6 divide-y divide-border [&>*]:py-4 first:[&>*]:pt-0 last:[&>*]:pb-0">
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-person-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Ana Souza</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Comentou no pedido #4821.</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-success/15 text-success ring-success/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-person-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Bruno Lima</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Marcou a tarefa como concluída.</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-info/15 text-info ring-info/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-person-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Carla Dias</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Enviou um novo anexo.</div>
        </div>
    </div>
</div>
HTML;

    $nestingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-6">
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-chat-left-text text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Media heading</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">
                This is some content from a media component. You can replace this with any content and adjust it as needed.
            </div>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground [&>[data-media-root]]:mt-3">
                <div class="flex w-full min-w-0 items-start gap-3 flex-row">
                    <div class="shrink-0">
                        <span class="bg-secondary/15 text-secondary ring-secondary/15 size-9 rounded-lg flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                            <i class="bi bi-chat-left text-base leading-none"></i>
                        </span>
                    </div>
                    <div class="min-w-0 flex-1">
                        <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Media aninhada</h5>
                        <div class="mt-1 text-sm leading-relaxed text-muted-foreground">
                            Place nested media within the body of a parent media object.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-info/15 text-info ring-info/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-person-badge text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Outro item</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">
                Sibling media object after the nested block.
            </div>
        </div>
    </div>
</div>
HTML;

    $avatarHtml = <<<'HTML'
<div class="flex w-full min-w-0 items-start gap-3 flex-row">
    <div class="shrink-0">
        <div class="avatar avatar-lg avatar-circle relative bg-primary text-primary-foreground">
            AS
            <span class="avatar-badge bg-success"></span>
        </div>
    </div>
    <div class="min-w-0 flex-1">
        <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Ana Souza</h5>
        <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Product designer · Online agora</div>
        <div class="mt-3 flex flex-wrap items-center gap-2">
            <button type="button" class="btn btn-sm btn-soft-primary">Mensagem</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Perfil</button>
        </div>
    </div>
</div>
HTML;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full min-w-0 items-start gap-3 flex-row rounded-xl bg-muted/50 p-3.5">
        <div class="shrink-0">
            <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-layers text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Soft</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Fundo muted.</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row rounded-xl border border-border bg-card p-3.5 shadow-sm">
        <div class="shrink-0">
            <span class="bg-secondary/15 text-secondary ring-secondary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-card-heading text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Bordered</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Card com borda.</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row rounded-xl border border-border border-l-4 border-l-success bg-card p-3.5">
        <div class="shrink-0">
            <span class="bg-success/15 text-success ring-success/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-bookmark-fill text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Accent</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Barra colorida à esquerda.</div>
        </div>
    </div>
</div>
HTML;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-info/15 text-info ring-info/15 size-9 rounded-lg flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-stars text-base leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">sm</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">mediaSize="sm"</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-info/15 text-info ring-info/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-stars text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">md</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">mediaSize="md" (padrão)</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-info/15 text-info ring-info/15 size-14 rounded-2xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-stars text-2xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">lg</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">mediaSize="lg"</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-info/15 text-info ring-info/15 size-16 rounded-2xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-stars text-3xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">xl</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">mediaSize="xl"</div>
        </div>
    </div>
</div>
HTML;

    $iconVariantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-primary/15 text-primary ring-primary/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-box-seam text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Soft</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">iconVariant soft</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="bg-primary text-primary-foreground ring-primary/30 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-box-seam text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Solid</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">iconVariant solid</div>
        </div>
    </div>
    <div class="flex w-full min-w-0 items-start gap-3 flex-row">
        <div class="shrink-0">
            <span class="border border-primary/30 bg-card text-primary ring-0 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
                <i class="bi bi-box-seam text-xl leading-none"></i>
            </span>
        </div>
        <div class="min-w-0 flex-1">
            <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">Outline</h5>
            <div class="mt-1 text-sm leading-relaxed text-muted-foreground">iconVariant outline</div>
        </div>
    </div>
</div>
HTML;

    $metaHtml = <<<'HTML'
<div class="flex w-full min-w-0 items-start gap-3 flex-row">
    <div class="shrink-0">
        <span class="bg-warning/15 text-warning ring-warning/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
            <i class="bi bi-megaphone-fill text-xl leading-none"></i>
        </span>
    </div>
    <div class="min-w-0 flex-1">
        <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">
            <a href="#" class="text-inherit underline-offset-4 transition-colors duration-150 hover:text-primary hover:underline">Campanha de verão</a>
        </h5>
        <div class="mt-1 text-sm leading-relaxed text-muted-foreground">Relatório semanal de performance.</div>
        <div class="mt-2 flex flex-wrap items-center gap-2 text-xs text-muted-foreground">
            <span class="inline-flex items-center gap-1"><i class="bi bi-calendar3"></i> 12 Jul – 30 Ago</span>
            <span class="text-border">·</span>
            <span class="inline-flex items-center gap-1"><i class="bi bi-eye"></i> 8.4k views</span>
        </div>
    </div>
</div>
HTML;

    $endAlignComboHtml = <<<'HTML'
<div class="flex w-full min-w-0 items-center gap-3 flex-row-reverse rounded-xl border border-border bg-card p-3.5 shadow-sm">
    <div class="shrink-0">
        <span class="bg-info/15 text-info ring-info/15 size-11 rounded-xl flex shrink-0 items-center justify-center ring-1" aria-hidden="true">
            <i class="bi bi-arrow-left-right text-xl leading-none"></i>
        </span>
    </div>
    <div class="min-w-0 flex-1">
        <h5 class="m-0 text-sm font-semibold leading-snug text-foreground">End + center</h5>
        <div class="mt-1 text-sm leading-relaxed text-muted-foreground">
            position="end" com align="center" — mídia à direita, centrada verticalmente.
        </div>
    </div>
</div>
HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.media&gt;</code> é o media object clássico: mídia + corpo em flex.
            Controle <code>position</code> (start/end), <code>align</code> (start/center/end) e layouts em grade com
            <code>&lt;x-ui.media.media-group cols&gt;</code>. Suporta nesting, variantes, ícone/avatar/imagem e slots
            <code>media</code>, <code>meta</code> e <code>actions</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Título + descrição + ícone. Equivalente ao exemplo padrão.
            </x-slot:description>
            <div class="w-full">
                <x-ui.media
                    title="Media heading"
                    description="This is some content from a media component. You can replace this with any content and adjust it as needed."
                    icon="bi-person-fill"
                    iconColor="primary"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Position" :code="$positionCode" :html="$positionHtml">
            <x-slot:description>
                <code>position="start"</code> (padrão) ou <code>end</code> — mídia à esquerda ou à direita.
            </x-slot:description>
            <div class="flex w-full flex-col gap-6">
                <x-ui.media
                    title="Media à esquerda"
                    description='position="start" (padrão) — mídia antes do conteúdo.'
                    icon="bi-image"
                    iconColor="info"
                    position="start"
                />
                <x-ui.media
                    title="Media à direita"
                    description='position="end" — mídia depois do conteúdo (flex-row-reverse).'
                    icon="bi-image"
                    iconColor="success"
                    position="end"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Align" :code="$alignCode" :html="$alignHtml">
            <x-slot:description>
                <code>align="start|center|end"</code> — alinhamento vertical da mídia em relação ao corpo
                (<code>items-start</code> / <code>items-center</code> / <code>items-end</code>).
            </x-slot:description>
            <div class="flex w-full flex-col gap-6">
                <x-ui.media
                    title="Top Aligned media"
                    description="Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo."
                    icon="bi-align-top"
                    iconColor="primary"
                    align="start"
                />
                <x-ui.media
                    title="Center Aligned media"
                    description="Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo."
                    icon="bi-align-middle"
                    iconColor="warning"
                    align="center"
                />
                <x-ui.media
                    title="Bottom Aligned media"
                    description="Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo."
                    icon="bi-align-bottom"
                    iconColor="danger"
                    align="end"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Grid (2 colunas)" :code="$gridCode" :html="$gridHtml">
            <x-slot:description>
                <code>&lt;x-ui.media.media-group :cols="2"&gt;</code> — grade responsiva de media objects.
            </x-slot:description>
            <div class="w-full">
                <x-ui.media.media-group :cols="2" gap="md">
                    <x-ui.media
                        title="Notificações"
                        description="Alertas e mensagens do sistema."
                        icon="bi-bell-fill"
                        iconColor="warning"
                        variant="bordered"
                    />
                    <x-ui.media
                        title="Equipe"
                        description="Membros e permissões."
                        icon="bi-people-fill"
                        iconColor="primary"
                        variant="bordered"
                    />
                    <x-ui.media
                        title="Arquivos"
                        description="Uploads e anexos recentes."
                        icon="bi-folder-fill"
                        iconColor="info"
                        variant="bordered"
                    />
                    <x-ui.media
                        title="Faturamento"
                        description="Faturas e métodos de pagamento."
                        icon="bi-credit-card-fill"
                        iconColor="success"
                        variant="bordered"
                    />
                </x-ui.media.media-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Grid (3 colunas)" :code="$gridThreeCode" :html="$gridThreeHtml">
            <x-slot:description>
                <code>:cols="3"</code> — 1 col no mobile, 2 no <code>sm</code>, 3 no <code>xl</code>.
            </x-slot:description>
            <div class="w-full">
                <x-ui.media.media-group :cols="3">
                    <x-ui.media title="Alpha" description="Coluna responsiva." icon="bi-1-circle-fill" iconColor="primary" variant="soft" />
                    <x-ui.media title="Beta" description="Coluna responsiva." icon="bi-2-circle-fill" iconColor="success" variant="soft" />
                    <x-ui.media title="Gamma" description="Coluna responsiva." icon="bi-3-circle-fill" iconColor="warning" variant="soft" />
                </x-ui.media.media-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Lista dividida" :code="$listCode" :html="$listHtml">
            <x-slot:description>
                <code>media-group</code> com <code>divided</code> — feed/lista com separadores.
            </x-slot:description>
            <div class="w-full">
                <x-ui.media.media-group divided>
                    <x-ui.media title="Ana Souza" description="Comentou no pedido #4821." icon="bi-person-fill" iconColor="primary" />
                    <x-ui.media title="Bruno Lima" description="Marcou a tarefa como concluída." icon="bi-person-fill" iconColor="success" />
                    <x-ui.media title="Carla Dias" description="Enviou um novo anexo." icon="bi-person-fill" iconColor="info" />
                </x-ui.media.media-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Nesting" :code="$nestingCode" :html="$nestingHtml">
            <x-slot:description>
                Aninhe <code>&lt;x-ui.media&gt;</code> no slot padrão (corpo) do pai.
            </x-slot:description>
            <div class="flex w-full flex-col gap-6">
                <x-ui.media
                    title="Media heading"
                    description="This is some content from a media component. You can replace this with any content and adjust it as needed."
                    icon="bi-chat-left-text"
                    iconColor="primary"
                >
                    <x-ui.media
                        title="Media aninhada"
                        description="Place nested media within the body of a parent media object."
                        icon="bi-chat-left"
                        iconColor="secondary"
                        media-size="sm"
                    />
                </x-ui.media>

                <x-ui.media
                    title="Outro item"
                    description="Sibling media object after the nested block."
                    icon="bi-person-badge"
                    iconColor="info"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Avatar + actions" :code="$avatarCode" :html="$avatarHtml">
            <x-slot:description>
                Slot <code>media</code> para avatar customizado; slot <code>actions</code> para CTAs.
            </x-slot:description>
            <div class="w-full">
                <x-ui.media title="Ana Souza" description="Product designer · Online agora">
                    <x-slot:media>
                        <x-ui.avatar name="Ana Souza" color="auto" circle size="lg" badge badge-color="success" />
                    </x-slot:media>
                    <x-slot:actions>
                        <x-ui.button size="sm" color="primary" variant="soft">Mensagem</x-ui.button>
                        <x-ui.button size="sm" variant="outline" color="secondary">Perfil</x-ui.button>
                    </x-slot:actions>
                </x-ui.media>
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>variant="soft|bordered|accent"</code>. Em <code>accent</code>, a barra usa <code>iconColor</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.media title="Soft" description="Fundo muted." icon="bi-layers" variant="soft" />
                <x-ui.media title="Bordered" description="Card com borda." icon="bi-card-heading" iconColor="secondary" variant="bordered" />
                <x-ui.media title="Accent" description="Barra colorida à esquerda." icon="bi-bookmark-fill" iconColor="success" variant="accent" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos de mídia" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>mediaSize="sm|md|lg|xl"</code> — tamanho do ícone ou da imagem.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.media title="sm" description='mediaSize="sm"' icon="bi-stars" iconColor="info" media-size="sm" />
                <x-ui.media title="md" description='mediaSize="md" (padrão)' icon="bi-stars" iconColor="info" media-size="md" />
                <x-ui.media title="lg" description='mediaSize="lg"' icon="bi-stars" iconColor="info" media-size="lg" />
                <x-ui.media title="xl" description='mediaSize="xl"' icon="bi-stars" iconColor="info" media-size="xl" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes de ícone" :code="$iconVariantsCode" :html="$iconVariantsHtml">
            <x-slot:description>
                <code>iconVariant="soft|solid|outline"</code> — mesmo vocabulário de heading/badge.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.media title="Soft" description="iconVariant soft" icon="bi-box-seam" iconVariant="soft" iconColor="primary" />
                <x-ui.media title="Solid" description="iconVariant solid" icon="bi-box-seam" iconVariant="solid" iconColor="primary" />
                <x-ui.media title="Outline" description="iconVariant outline" icon="bi-box-seam" iconVariant="outline" iconColor="primary" />
            </div>
        </x-ui.example>

        <x-ui.example title="Meta + link" :code="$metaCode" :html="$metaHtml">
            <x-slot:description>
                Slot <code>meta</code> e prop <code>href</code> no título.
            </x-slot:description>
            <div class="w-full">
                <x-ui.media
                    title="Campanha de verão"
                    description="Relatório semanal de performance."
                    icon="bi-megaphone-fill"
                    iconColor="warning"
                    href="#"
                >
                    <x-slot:meta>
                        <span class="inline-flex items-center gap-1"><i class="bi bi-calendar3"></i> 12 Jul – 30 Ago</span>
                        <span class="text-border">·</span>
                        <span class="inline-flex items-center gap-1"><i class="bi bi-eye"></i> 8.4k views</span>
                    </x-slot:meta>
                </x-ui.media>
            </div>
        </x-ui.example>

        <x-ui.example title="Position + align" :code="$endAlignComboCode" :html="$endAlignComboHtml">
            <x-slot:description>
                Combine <code>position</code> e <code>align</code> livremente.
            </x-slot:description>
            <div class="w-full">
                <x-ui.media
                    title="End + center"
                    description='position="end" com align="center" — mídia à direita, centrada verticalmente.'
                    icon="bi-arrow-left-right"
                    iconColor="info"
                    position="end"
                    align="center"
                    variant="bordered"
                />
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="media" />
</x-ui.docs>
