<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.separator />
        BLADE;

    $labelCode = <<<'BLADE'
        <x-ui.separator label="Ou continue com" />
        <x-ui.separator label="Seção" label-position="start" />
        <x-ui.separator label="Fim" label-position="end" />
        BLADE;

    $variantsCode = <<<'BLADE'
        <x-ui.separator variant="solid" />
        <x-ui.separator variant="dashed" />
        <x-ui.separator variant="dotted" />
        <x-ui.separator variant="double" />
        <x-ui.separator variant="gradient" />
        BLADE;

    $colorsCode = <<<'BLADE'
        <x-ui.separator color="primary" />
        <x-ui.separator color="success" variant="dashed" />
        <x-ui.separator color="danger" variant="gradient" />
        <x-ui.separator color="info" label="Info" label-variant="soft" />
        BLADE;

    $labelVariantsCode = <<<'BLADE'
        <x-ui.separator label="Plain" label-variant="plain" />
        <x-ui.separator label="Soft" label-variant="soft" color="primary" />
        <x-ui.separator label="Outline" label-variant="outline" color="info" />
        <x-ui.separator label="Solid" label-variant="solid" color="success" />
        BLADE;

    $iconCode = <<<'BLADE'
        <x-ui.separator icon="bi-star" label="Destaques" label-variant="soft" color="warning" />
        <x-ui.separator icon="bi-shield-check" label-variant="outline" color="success" />
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.separator size="sm" label="Pequeno" />
        <x-ui.separator size="md" label="Médio" />
        <x-ui.separator size="lg" label="Grande" />
        BLADE;

    $spacingCode = <<<'BLADE'
        <x-ui.separator spacing="none" />
        <x-ui.separator spacing="sm" />
        <x-ui.separator spacing="md" />
        <x-ui.separator spacing="lg" />
        BLADE;

    $verticalCode = <<<'BLADE'
        <div class="flex h-32 items-stretch gap-6">
            <x-ui.separator orientation="vertical" />
            <x-ui.separator orientation="vertical" variant="dashed" color="primary" />
            <x-ui.separator orientation="vertical" label="OU" label-variant="soft" color="info" />
        </div>
        BLADE;

    $slotCode = <<<'BLADE'
        <x-ui.separator label-variant="soft" color="primary">
            <x-ui.badge color="primary" variant="soft" size="sm" pill>Novo</x-ui.badge>
        </x-ui.separator>
        BLADE;

    $formCode = <<<'BLADE'
        <div class="mx-auto max-w-sm space-y-4">
            <x-ui.button color="primary" block>Entrar com e-mail</x-ui.button>
            <x-ui.separator label="ou" />
            <x-ui.button variant="outline" color="secondary" block icon="bi-github">
                Continuar com GitHub
            </x-ui.button>
        </div>
        BLADE;

    $lineDefault = 'h-0.5 w-full bg-border border-border';

    $basicHtml = <<<HTML
        <div class="ui-separator flex w-full items-center my-4" role="none" aria-hidden="true">
            <div class="{$lineDefault}"></div>
        </div>
        HTML;

    $labelHtml = <<<HTML
        <div class="ui-separator flex w-full items-center gap-3 my-4" role="separator" aria-orientation="horizontal" aria-label="Ou continue com">
            <div class="min-w-4 flex-1 {$lineDefault}"></div>
            <span class="inline-flex shrink-0 items-center font-medium whitespace-nowrap text-muted-foreground text-xs gap-1.5">Ou continue com</span>
            <div class="min-w-4 flex-1 {$lineDefault}"></div>
        </div>
        <div class="ui-separator flex w-full items-center gap-3 my-4" role="separator" aria-orientation="horizontal" aria-label="Seção">
            <span class="inline-flex shrink-0 items-center font-medium whitespace-nowrap text-muted-foreground text-xs gap-1.5">Seção</span>
            <div class="min-w-4 flex-1 {$lineDefault}"></div>
        </div>
        <div class="ui-separator flex w-full items-center gap-3 my-4" role="separator" aria-orientation="horizontal" aria-label="Fim">
            <div class="min-w-4 flex-1 {$lineDefault}"></div>
            <span class="inline-flex shrink-0 items-center font-medium whitespace-nowrap text-muted-foreground text-xs gap-1.5">Fim</span>
        </div>
        HTML;

    $variantsHtml = <<<HTML
        <div class="ui-separator flex w-full items-center my-2" role="none" aria-hidden="true">
            <div class="{$lineDefault}"></div>
        </div>
        <div class="ui-separator flex w-full items-center my-2" role="none" aria-hidden="true">
            <div class="h-0 w-full border-t-2 border-dashed bg-border border-border"></div>
        </div>
        <div class="ui-separator flex w-full items-center my-2" role="none" aria-hidden="true">
            <div class="h-0 w-full border-t-2 border-dotted bg-border border-border"></div>
        </div>
        <div class="ui-separator flex w-full items-center my-2" role="none" aria-hidden="true">
            <div class="h-0 w-full border-t-[3px] border-double border-border"></div>
        </div>
        <div class="ui-separator flex w-full items-center my-2" role="none" aria-hidden="true">
            <div class="h-0.5 w-full bg-gradient-to-r from-transparent via-border to-transparent"></div>
        </div>
        HTML;

    $colorsHtml = <<<HTML
        <div class="ui-separator flex w-full items-center my-2" role="none" aria-hidden="true">
            <div class="h-0.5 w-full bg-primary border-primary"></div>
        </div>
        <div class="ui-separator flex w-full items-center my-2" role="none" aria-hidden="true">
            <div class="h-0 w-full border-t-2 border-dashed bg-success border-success"></div>
        </div>
        <div class="ui-separator flex w-full items-center my-2" role="none" aria-hidden="true">
            <div class="h-0.5 w-full bg-gradient-to-r from-transparent via-danger to-transparent"></div>
        </div>
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal" aria-label="Info">
            <div class="min-w-4 flex-1 h-0.5 w-full bg-info border-info"></div>
            <span class="inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap bg-info/15 text-info text-xs gap-1.5 px-2.5 py-0.5">Info</span>
            <div class="min-w-4 flex-1 h-0.5 w-full bg-info border-info"></div>
        </div>
        HTML;

    $labelVariantsHtml = <<<HTML
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal" aria-label="Plain">
            <div class="min-w-4 flex-1 {$lineDefault}"></div>
            <span class="inline-flex shrink-0 items-center font-medium whitespace-nowrap text-muted-foreground text-xs gap-1.5">Plain</span>
            <div class="min-w-4 flex-1 {$lineDefault}"></div>
        </div>
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal" aria-label="Soft">
            <div class="min-w-4 flex-1 h-0.5 w-full bg-primary border-primary"></div>
            <span class="inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap bg-primary/15 text-primary text-xs gap-1.5 px-2.5 py-0.5">Soft</span>
            <div class="min-w-4 flex-1 h-0.5 w-full bg-primary border-primary"></div>
        </div>
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal" aria-label="Outline">
            <div class="min-w-4 flex-1 h-0.5 w-full bg-info border-info"></div>
            <span class="inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap border border-info/30 bg-card text-info text-xs gap-1.5 px-2.5 py-0.5">Outline</span>
            <div class="min-w-4 flex-1 h-0.5 w-full bg-info border-info"></div>
        </div>
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal" aria-label="Solid">
            <div class="min-w-4 flex-1 h-0.5 w-full bg-success border-success"></div>
            <span class="inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap bg-success text-success-foreground text-xs gap-1.5 px-2.5 py-0.5">Solid</span>
            <div class="min-w-4 flex-1 h-0.5 w-full bg-success border-success"></div>
        </div>
        HTML;

    $iconHtml = <<<HTML
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal" aria-label="Destaques">
            <div class="min-w-4 flex-1 h-0.5 w-full bg-warning border-warning"></div>
            <span class="inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap bg-warning/15 text-warning text-xs gap-1.5 px-2.5 py-0.5">
                <i class="bi bi-star text-xs leading-none" aria-hidden="true"></i>
                Destaques
            </span>
            <div class="min-w-4 flex-1 h-0.5 w-full bg-warning border-warning"></div>
        </div>
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal">
            <div class="min-w-4 flex-1 h-0.5 w-full bg-success border-success"></div>
            <span class="inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap border border-success/30 bg-card text-success text-xs gap-1.5 px-2.5 py-0.5">
                <i class="bi bi-shield-check text-xs leading-none" aria-hidden="true"></i>
            </span>
            <div class="min-w-4 flex-1 h-0.5 w-full bg-success border-success"></div>
        </div>
        HTML;

    $sizesHtml = <<<HTML
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal" aria-label="Pequeno">
            <div class="min-w-4 flex-1 h-px w-full bg-border border-border"></div>
            <span class="inline-flex shrink-0 items-center font-medium whitespace-nowrap text-muted-foreground text-[0.65rem] gap-1">Pequeno</span>
            <div class="min-w-4 flex-1 h-px w-full bg-border border-border"></div>
        </div>
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal" aria-label="Médio">
            <div class="min-w-4 flex-1 {$lineDefault}"></div>
            <span class="inline-flex shrink-0 items-center font-medium whitespace-nowrap text-muted-foreground text-xs gap-1.5">Médio</span>
            <div class="min-w-4 flex-1 {$lineDefault}"></div>
        </div>
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal" aria-label="Grande">
            <div class="min-w-4 flex-1 h-[3px] w-full bg-border border-border"></div>
            <span class="inline-flex shrink-0 items-center font-medium whitespace-nowrap text-muted-foreground text-sm gap-1.5">Grande</span>
            <div class="min-w-4 flex-1 h-[3px] w-full bg-border border-border"></div>
        </div>
        HTML;

    $spacingHtml = <<<HTML
        <div class="rounded-md border border-border bg-muted/30 p-3">
            <p class="mb-0 text-xs text-muted-foreground">none</p>
            <div class="ui-separator flex w-full items-center my-0" role="none" aria-hidden="true">
                <div class="{$lineDefault}"></div>
            </div>
            <p class="mb-0 text-xs text-muted-foreground">sm</p>
            <div class="ui-separator flex w-full items-center my-2" role="none" aria-hidden="true">
                <div class="{$lineDefault}"></div>
            </div>
            <p class="mb-0 text-xs text-muted-foreground">md</p>
            <div class="ui-separator flex w-full items-center my-4" role="none" aria-hidden="true">
                <div class="{$lineDefault}"></div>
            </div>
            <p class="mb-0 text-xs text-muted-foreground">lg</p>
            <div class="ui-separator flex w-full items-center my-8" role="none" aria-hidden="true">
                <div class="{$lineDefault}"></div>
            </div>
        </div>
        HTML;

    $verticalHtml = <<<HTML
        <div class="flex h-40 items-stretch justify-center gap-10 rounded-md border border-border bg-muted/20 p-4">
            <div class="flex flex-1 flex-col justify-center text-center text-sm text-muted-foreground">Esquerda</div>
            <div class="ui-separator inline-flex h-full flex-col items-center self-stretch min-h-24 mx-0" role="none" aria-hidden="true">
                <div class="h-full w-0.5 bg-border border-border"></div>
            </div>
            <div class="flex flex-1 flex-col justify-center text-center text-sm text-muted-foreground">Centro</div>
            <div class="ui-separator inline-flex h-full flex-col items-center self-stretch min-h-24 mx-0" role="none" aria-hidden="true">
                <div class="h-full w-0 border-l-2 border-dashed bg-primary border-primary"></div>
            </div>
            <div class="flex flex-1 flex-col justify-center text-center text-sm text-muted-foreground">Direita</div>
            <div class="ui-separator inline-flex h-full flex-col items-center self-stretch gap-2 min-h-24 mx-0" role="separator" aria-orientation="vertical" aria-label="OU">
                <div class="min-h-4 w-full flex-1 h-full w-0.5 bg-info border-info"></div>
                <span class="inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap bg-info/15 text-info text-xs gap-1.5 px-2.5 py-0.5">OU</span>
                <div class="min-h-4 w-full flex-1 h-full w-0.5 bg-info border-info"></div>
            </div>
            <div class="flex flex-1 flex-col justify-center text-center text-sm text-muted-foreground">Mais</div>
        </div>
        HTML;

    $slotHtml = <<<HTML
        <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal">
            <div class="min-w-4 flex-1 h-0.5 w-full bg-primary border-primary"></div>
            <span class="inline-flex shrink-0 items-center rounded-full font-medium whitespace-nowrap bg-primary/15 text-primary text-xs gap-1.5 px-2.5 py-0.5">
                <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>Novo</span></span>
            </span>
            <div class="min-w-4 flex-1 h-0.5 w-full bg-primary border-primary"></div>
        </div>
        HTML;

    $formHtml = <<<'HTML'
        <div class="mx-auto max-w-sm space-y-4">
            <button type="button" class="btn btn-primary w-full">Entrar com e-mail</button>
            <div class="ui-separator flex w-full items-center gap-3 my-2" role="separator" aria-orientation="horizontal" aria-label="ou">
                <div class="min-w-4 flex-1 h-0.5 w-full bg-border border-border"></div>
                <span class="inline-flex shrink-0 items-center font-medium whitespace-nowrap text-muted-foreground text-xs gap-1.5">ou</span>
                <div class="min-w-4 flex-1 h-0.5 w-full bg-border border-border"></div>
            </div>
            <button type="button" class="btn btn-outline-secondary w-full">
                <i class="bi bi-github shrink-0 leading-none" aria-hidden="true"></i>
                <span>Continuar com GitHub</span>
            </button>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.separator&gt;</code> é um divisor horizontal ou vertical: estilos
            <code>solid</code>/<code>dashed</code>/<code>dotted</code>/<code>double</code>/<code>gradient</code>,
            cores do tema, espessura, espaçamento, rótulo (com posição e variantes), ícone e slot.
            Sem conteúdo fica decorativo (<code>aria-hidden</code>); com label vira
            <code>role="separator"</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Linha horizontal neutra com espaçamento padrão.
            </x-slot:description>
            <div>
                <p class="mb-0 text-sm text-muted-foreground">Conteúdo acima</p>
                <x-ui.separator />
                <p class="mb-0 text-sm text-muted-foreground">Conteúdo abaixo</p>
            </div>
        </x-ui.example>

        <x-ui.example title="Com rótulo" :code="$labelCode" :html="$labelHtml">
            <x-slot:description>
                <code>label</code> + <code>label-position</code>
                (<code>start</code>/<code>center</code>/<code>end</code>).
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.separator label="Ou continue com" />
                <x-ui.separator label="Seção" label-position="start" />
                <x-ui.separator label="Fim" label-position="end" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes de linha" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>variant</code>: solid, dashed, dotted, double, gradient.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <div>
                    <p class="mb-1 text-xs text-muted-foreground">solid</p>
                    <x-ui.separator variant="solid" spacing="sm" />
                </div>
                <div>
                    <p class="mb-1 text-xs text-muted-foreground">dashed</p>
                    <x-ui.separator variant="dashed" spacing="sm" />
                </div>
                <div>
                    <p class="mb-1 text-xs text-muted-foreground">dotted</p>
                    <x-ui.separator variant="dotted" spacing="sm" />
                </div>
                <div>
                    <p class="mb-1 text-xs text-muted-foreground">double</p>
                    <x-ui.separator variant="double" spacing="sm" />
                </div>
                <div>
                    <p class="mb-1 text-xs text-muted-foreground">gradient</p>
                    <x-ui.separator variant="gradient" spacing="sm" />
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> com os tokens do tema (padrão = <code>border</code>).
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.separator color="primary" spacing="sm" />
                <x-ui.separator color="success" variant="dashed" spacing="sm" />
                <x-ui.separator color="danger" variant="gradient" spacing="sm" />
                <x-ui.separator color="info" label="Info" label-variant="soft" spacing="sm" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes do rótulo" :code="$labelVariantsCode" :html="$labelVariantsHtml">
            <x-slot:description>
                <code>label-variant</code>: plain, soft, outline, solid.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.separator label="Plain" label-variant="plain" spacing="sm" />
                <x-ui.separator label="Soft" label-variant="soft" color="primary" spacing="sm" />
                <x-ui.separator label="Outline" label-variant="outline" color="info" spacing="sm" />
                <x-ui.separator label="Solid" label-variant="solid" color="success" spacing="sm" />
            </div>
        </x-ui.example>

        <x-ui.example title="Ícone" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                <code>icon</code> (Bootstrap Icons) sozinho ou com <code>label</code>.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.separator icon="bi-star" label="Destaques" label-variant="soft" color="warning" spacing="sm" />
                <x-ui.separator icon="bi-shield-check" label-variant="outline" color="success" spacing="sm" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code> controla espessura da linha e tipografia do rótulo.
            </x-slot:description>
            <div class="flex flex-col gap-4">
                <x-ui.separator size="sm" label="Pequeno" spacing="sm" />
                <x-ui.separator size="md" label="Médio" spacing="sm" />
                <x-ui.separator size="lg" label="Grande" spacing="sm" />
            </div>
        </x-ui.example>

        <x-ui.example title="Espaçamento" :code="$spacingCode" :html="$spacingHtml">
            <x-slot:description>
                <code>spacing</code>: none, sm, md, lg (margin no eixo da orientação).
            </x-slot:description>
            <div class="rounded-md border border-border bg-muted/30 p-3">
                <p class="mb-0 text-xs text-muted-foreground">none</p>
                <x-ui.separator spacing="none" />
                <p class="mb-0 text-xs text-muted-foreground">sm</p>
                <x-ui.separator spacing="sm" />
                <p class="mb-0 text-xs text-muted-foreground">md</p>
                <x-ui.separator spacing="md" />
                <p class="mb-0 text-xs text-muted-foreground">lg</p>
                <x-ui.separator spacing="lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Vertical" :code="$verticalCode" :html="$verticalHtml">
            <x-slot:description>
                <code>orientation="vertical"</code> — use em layouts flex com altura definida.
            </x-slot:description>
            <div class="flex h-40 items-stretch justify-center gap-10 rounded-md border border-border bg-muted/20 p-4">
                <div class="flex flex-1 flex-col justify-center text-center text-sm text-muted-foreground">Esquerda</div>
                <x-ui.separator orientation="vertical" spacing="none" />
                <div class="flex flex-1 flex-col justify-center text-center text-sm text-muted-foreground">Centro</div>
                <x-ui.separator orientation="vertical" variant="dashed" color="primary" spacing="none" />
                <div class="flex flex-1 flex-col justify-center text-center text-sm text-muted-foreground">Direita</div>
                <x-ui.separator orientation="vertical" label="OU" label-variant="soft" color="info" spacing="none" />
                <div class="flex flex-1 flex-col justify-center text-center text-sm text-muted-foreground">Mais</div>
            </div>
        </x-ui.example>

        <x-ui.example title="Slot customizado" :code="$slotCode" :html="$slotHtml">
            <x-slot:description>
                O slot padrão substitui o texto do rótulo (ex.: badge).
            </x-slot:description>
            <x-ui.separator label-variant="soft" color="primary" spacing="sm">
                <x-ui.badge color="primary" variant="soft" size="sm" pill>Novo</x-ui.badge>
            </x-ui.separator>
        </x-ui.example>

        <x-ui.example title="Em formulário" :code="$formCode" :html="$formHtml">
            <x-slot:description>
                Padrão clássico “ou” entre ações alternativas.
            </x-slot:description>
            <div class="mx-auto max-w-sm space-y-4">
                <x-ui.button color="primary" block>Entrar com e-mail</x-ui.button>
                <x-ui.separator label="ou" spacing="sm" />
                <x-ui.button variant="outline" color="secondary" block icon="bi-github">
                    Continuar com GitHub
                </x-ui.button>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api component="ui/separator/separator" title="x-ui.separator" />
</x-ui.docs>
