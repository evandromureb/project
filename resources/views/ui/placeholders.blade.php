<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $cardCode = <<<'BLADE'
        <div class="grid gap-6 md:grid-cols-2">
            <x-ui.card title="Card title">
                <p class="mb-4 text-sm text-muted-foreground">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                </p>
                <x-ui.button color="primary" size="sm">Go somewhere</x-ui.button>
            </x-ui.card>

            <x-ui.card aria-hidden="true">
                <x-ui.placeholder.placeholder-group animation="glow" class="flex flex-col gap-3">
                    <x-ui.placeholder width="1/2" size="lg" />
                    <x-ui.placeholder :lines="3" />
                    <x-ui.placeholder tag="button" width="1/2" color="primary" />
                </x-ui.placeholder.placeholder-group>
            </x-ui.card>
        </div>
        BLADE;

    $widthsCode = <<<'BLADE'
        <x-ui.placeholder width="full" />
        <x-ui.placeholder width="3/4" />
        <x-ui.placeholder width="1/2" />
        <x-ui.placeholder width="1/4" />
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.placeholder size="lg" width="full" />
        <x-ui.placeholder size="md" width="full" />
        <x-ui.placeholder size="sm" width="full" />
        <x-ui.placeholder size="xs" width="full" />
        BLADE;

    $colorsCode = <<<'BLADE'
        <x-ui.placeholder width="full" />
        <x-ui.placeholder width="full" color="primary" />
        <x-ui.placeholder width="full" color="success" />
        <x-ui.placeholder width="full" color="warning" />
        <x-ui.placeholder width="full" color="danger" />
        <x-ui.placeholder width="full" color="info" />
        BLADE;

    $animationsCode = <<<'BLADE'
        <x-ui.placeholder animation="glow" width="full" />
        <x-ui.placeholder animation="wave" width="full" />
        <x-ui.placeholder animation="none" width="full" />
        BLADE;

    $linesCode = <<<'BLADE'
        <x-ui.placeholder :lines="4" animation="glow" />
        <x-ui.placeholder :lines="3" animation="wave" />
        BLADE;

    $buttonCode = <<<'BLADE'
        <x-ui.placeholder tag="button" width="1/2" color="primary" />
        <x-ui.placeholder tag="button" width="1/3" color="success" size="sm" />
        <x-ui.placeholder tag="a" width="1/4" color="info" />
        BLADE;

    $groupCode = <<<'BLADE'
        <x-ui.placeholder.placeholder-group animation="wave" class="flex flex-col gap-2">
            <x-ui.placeholder width="full" />
            <x-ui.placeholder width="3/4" />
            <x-ui.placeholder width="1/2" />
        </x-ui.placeholder.placeholder-group>
        BLADE;

    $roundedCode = <<<'BLADE'
        <x-ui.placeholder rounded="none" width="full" />
        <x-ui.placeholder rounded="sm" width="full" />
        <x-ui.placeholder rounded="md" width="full" />
        <x-ui.placeholder rounded="lg" width="full" />
        <x-ui.placeholder rounded="full" width="full" />
        BLADE;

    $mediaCode = <<<'BLADE'
        <div class="flex gap-3">
            <x-ui.placeholder class="!size-12 !min-h-12 shrink-0" rounded="full" width="auto" />
            <div class="flex flex-1 flex-col gap-2">
                <x-ui.placeholder width="1/3" size="lg" />
                <x-ui.placeholder :lines="2" size="sm" />
            </div>
        </div>
        BLADE;

    $cardHtml = <<<'HTML'
        <div class="grid w-full gap-6 md:grid-cols-2">
            <div class="card">
                <div class="card-header"><div><h5 class="card-title">Card title</h5></div></div>
                <div class="card-body">
                    <p class="mb-4 text-sm text-muted-foreground">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <button type="button" class="btn btn-sm btn-primary">Go somewhere</button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="ui-placeholder-group flex flex-col gap-3" role="status" aria-busy="true" aria-label="Carregando card">
                        <span class="sr-only">Carregando card</span>
                        <span class="ui-placeholder min-h-5 w-1/2 rounded-md ui-placeholder-glow" aria-hidden="true"></span>
                        <div class="ui-placeholder-lines flex w-full flex-col gap-2" aria-hidden="true">
                            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-glow" aria-hidden="true"></span>
                            <span class="ui-placeholder min-h-3.5 w-3/4 rounded-md ui-placeholder-glow" aria-hidden="true"></span>
                            <span class="ui-placeholder min-h-3.5 w-3/4 rounded-md ui-placeholder-glow" aria-hidden="true"></span>
                        </div>
                        <button type="button" disabled tabindex="-1" class="ui-placeholder h-9 min-h-9 w-1/2 rounded-md ui-placeholder-solid bg-primary ui-placeholder-glow" aria-hidden="true"></button>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $widthsHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-2">
            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-3/4 rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-1/2 rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-1/4 rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
        </div>
        HTML;

    $sizesHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-2">
            <span class="ui-placeholder min-h-5 w-full rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-2.5 w-full rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-2 w-full rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
        </div>
        HTML;

    $colorsHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-2">
            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-solid bg-primary ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-solid bg-success ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-solid bg-warning ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-solid bg-danger ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-solid bg-info ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
        </div>
        HTML;

    $animationsHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-3">
            <div>
                <p class="mb-1 text-xs text-muted-foreground">glow</p>
                <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            </div>
            <div>
                <p class="mb-1 text-xs text-muted-foreground">wave</p>
                <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-wave" role="status" aria-busy="true" aria-label="Carregando…"></span>
            </div>
            <div>
                <p class="mb-1 text-xs text-muted-foreground">none</p>
                <span class="ui-placeholder min-h-3.5 w-full rounded-md" role="status" aria-busy="true" aria-label="Carregando…"></span>
            </div>
        </div>
        HTML;

    $linesHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-4">
            <div class="ui-placeholder-lines flex w-full flex-col gap-2" role="status" aria-busy="true" aria-label="Carregando…">
                <span class="sr-only">Carregando…</span>
                <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-glow" aria-hidden="true"></span>
                <span class="ui-placeholder min-h-3.5 w-3/4 rounded-md ui-placeholder-glow" aria-hidden="true"></span>
                <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-glow" aria-hidden="true"></span>
                <span class="ui-placeholder min-h-3.5 w-3/4 rounded-md ui-placeholder-glow" aria-hidden="true"></span>
            </div>
            <div class="ui-placeholder-lines flex w-full flex-col gap-2" role="status" aria-busy="true" aria-label="Carregando…">
                <span class="sr-only">Carregando…</span>
                <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-wave" aria-hidden="true"></span>
                <span class="ui-placeholder min-h-3.5 w-3/4 rounded-md ui-placeholder-wave" aria-hidden="true"></span>
                <span class="ui-placeholder min-h-3.5 w-3/4 rounded-md ui-placeholder-wave" aria-hidden="true"></span>
            </div>
        </div>
        HTML;

    $buttonHtml = <<<'HTML'
        <div class="flex flex-wrap items-center gap-3">
            <button type="button" disabled tabindex="-1" class="ui-placeholder h-9 min-h-9 w-1/2 rounded-md ui-placeholder-solid bg-primary ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></button>
            <button type="button" disabled tabindex="-1" class="ui-placeholder h-8 min-h-8 w-1/3 rounded-md ui-placeholder-solid bg-success ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></button>
            <a href="#" tabindex="-1" aria-disabled="true" class="ui-placeholder h-9 min-h-9 w-1/4 rounded-md ui-placeholder-solid bg-info ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></a>
        </div>
        HTML;

    $groupHtml = <<<'HTML'
        <div class="ui-placeholder-group flex w-full flex-col gap-2" role="status" aria-busy="true" aria-label="Carregando…">
            <span class="sr-only">Carregando…</span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-wave" aria-hidden="true"></span>
            <span class="ui-placeholder min-h-3.5 w-3/4 rounded-md ui-placeholder-wave" aria-hidden="true"></span>
            <span class="ui-placeholder min-h-3.5 w-1/2 rounded-md ui-placeholder-wave" aria-hidden="true"></span>
        </div>
        HTML;

    $roundedHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-2">
            <span class="ui-placeholder min-h-3.5 w-full rounded-none ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-sm ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-lg ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <span class="ui-placeholder min-h-3.5 w-full rounded-full ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
        </div>
        HTML;

    $mediaHtml = <<<'HTML'
        <div class="flex w-full max-w-md gap-3">
            <span class="ui-placeholder min-h-3.5 w-auto rounded-full ui-placeholder-glow !size-12 !min-h-12 shrink-0" role="status" aria-busy="true" aria-label="Carregando…"></span>
            <div class="flex flex-1 flex-col gap-2">
                <span class="ui-placeholder min-h-5 w-1/3 rounded-md ui-placeholder-glow" role="status" aria-busy="true" aria-label="Carregando…"></span>
                <div class="ui-placeholder-lines flex w-full flex-col gap-2" role="status" aria-busy="true" aria-label="Carregando…">
                    <span class="sr-only">Carregando…</span>
                    <span class="ui-placeholder min-h-2.5 w-full rounded-md ui-placeholder-glow" aria-hidden="true"></span>
                    <span class="ui-placeholder min-h-2.5 w-3/4 rounded-md ui-placeholder-glow" aria-hidden="true"></span>
                </div>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.placeholder&gt;</code> é a barra de loading estilo (<code>glow</code> / <code>wave</code>), com larguras, tamanhos,
            cores e botões. Para layouts compostos (card, tabela, lista), prefira
            <code>&lt;x-ui.skeleton&gt;</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Card com placeholder" :code="$cardCode" :html="$cardHtml">
            <x-slot:description>
                Comparação clássica: card real vs card com placeholders.
            </x-slot:description>
            <div class="grid w-full gap-6 md:grid-cols-2">
                <x-ui.card title="Card title">
                    <p class="mb-4 text-sm text-muted-foreground">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                    <x-ui.button color="primary" size="sm">Go somewhere</x-ui.button>
                </x-ui.card>

                <x-ui.card>
                    <x-ui.placeholder.placeholder-group animation="glow" class="flex flex-col gap-3" label="Carregando card">
                        <x-ui.placeholder width="1/2" size="lg" />
                        <x-ui.placeholder :lines="3" />
                        <x-ui.placeholder tag="button" width="1/2" color="primary" />
                    </x-ui.placeholder.placeholder-group>
                </x-ui.card>
            </div>
        </x-ui.example>

        <x-ui.example title="Larguras" :code="$widthsCode" :html="$widthsHtml">
            <x-slot:description>
                <code>width</code>: <code>full</code>, <code>3/4</code>, <code>1/2</code>, <code>1/4</code>,
                <code>75</code>, <code>50</code>, <code>25</code>…
            </x-slot:description>
            <div class="flex w-full flex-col gap-2">
                <x-ui.placeholder width="full" />
                <x-ui.placeholder width="3/4" />
                <x-ui.placeholder width="1/2" />
                <x-ui.placeholder width="1/4" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>xs</code>, <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-2">
                <x-ui.placeholder size="lg" width="full" />
                <x-ui.placeholder size="md" width="full" />
                <x-ui.placeholder size="sm" width="full" />
                <x-ui.placeholder size="xs" width="full" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Sem <code>color</code> usa o trilho muted; com token, a barra fica na cor do tema.
            </x-slot:description>
            <div class="flex w-full flex-col gap-2">
                <x-ui.placeholder width="full" />
                <x-ui.placeholder width="full" color="primary" />
                <x-ui.placeholder width="full" color="success" />
                <x-ui.placeholder width="full" color="warning" />
                <x-ui.placeholder width="full" color="danger" />
                <x-ui.placeholder width="full" color="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Animações" :code="$animationsCode" :html="$animationsHtml">
            <x-slot:description>
                <code>animation</code>: <code>glow</code> (padrão), <code>wave</code> ou <code>none</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <div>
                    <p class="mb-1 text-xs text-muted-foreground">glow</p>
                    <x-ui.placeholder animation="glow" width="full" />
                </div>
                <div>
                    <p class="mb-1 text-xs text-muted-foreground">wave</p>
                    <x-ui.placeholder animation="wave" width="full" />
                </div>
                <div>
                    <p class="mb-1 text-xs text-muted-foreground">none</p>
                    <x-ui.placeholder animation="none" width="full" />
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Múltiplas linhas" :code="$linesCode" :html="$linesHtml">
            <x-slot:description>
                <code>:lines</code> gera um bloco de barras com larguras variadas (parágrafo).
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.placeholder :lines="4" animation="glow" />
                <x-ui.placeholder :lines="3" animation="wave" />
            </div>
        </x-ui.example>

        <x-ui.example title="Como botão / link" :code="$buttonCode" :html="$buttonHtml">
            <x-slot:description>
                <code>tag="button"</code> ou <code>tag="a"</code> — desabilitado, com altura de botão.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-3">
                <x-ui.placeholder tag="button" width="1/2" color="primary" />
                <x-ui.placeholder tag="button" width="1/3" color="success" size="sm" />
                <x-ui.placeholder tag="a" width="1/4" color="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Grupo" :code="$groupCode" :html="$groupHtml">
            <x-slot:description>
                <code>&lt;x-ui.placeholder.placeholder-group&gt;</code> compartilha <code>animation</code>/<code>size</code>/<code>color</code>
                via <code>@@aware</code> e concentra o <code>role="status"</code>.
            </x-slot:description>
            <x-ui.placeholder.placeholder-group animation="wave" class="flex w-full flex-col gap-2">
                <x-ui.placeholder width="full" />
                <x-ui.placeholder width="3/4" />
                <x-ui.placeholder width="1/2" />
            </x-ui.placeholder.placeholder-group>
        </x-ui.example>

        <x-ui.example title="Cantos" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code>: <code>none</code>, <code>sm</code>, <code>md</code>, <code>lg</code>, <code>full</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-2">
                <x-ui.placeholder rounded="none" width="full" />
                <x-ui.placeholder rounded="sm" width="full" />
                <x-ui.placeholder rounded="md" width="full" />
                <x-ui.placeholder rounded="lg" width="full" />
                <x-ui.placeholder rounded="full" width="full" />
            </div>
        </x-ui.example>

        <x-ui.example title="Media (composição)" :code="$mediaCode" :html="$mediaHtml">
            <x-slot:description>
                Combine um círculo (<code>rounded="full"</code> + <code>class</code>) com linhas de texto.
            </x-slot:description>
            <div class="flex w-full max-w-md gap-3">
                <x-ui.placeholder class="!size-12 !min-h-12 shrink-0" rounded="full" width="auto" />
                <div class="flex flex-1 flex-col gap-2">
                    <x-ui.placeholder width="1/3" size="lg" />
                    <x-ui.placeholder :lines="2" size="sm" />
                </div>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="placeholder" />
</x-ui.docs>
