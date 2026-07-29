<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $defaultCode = <<<'BLADE'
        <x-ui.countup :value="1250" caption="Clientes ativos" />
        BLADE;

/*     Nota comum a todos os $xHtml deste arquivo: antes do Alpine montar,
         o span exibe o valor de "start" (0 por padrão) formatado com
         decimal/separator manuais — a animação até "value" (e a formatação
         via Intl quando "locale" é usado) só acontece via JS. 
*/
    $defaultHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-foreground">
                <span class="ui-countup-number">0</span>
            </span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Clientes ativos</span>
        </div>
        HTML;

    $sizesCode = <<<'BLADE'
        <x-ui.countup :value="120" size="xs" caption="xs" />
        <x-ui.countup :value="340" size="sm" caption="sm" />
        <x-ui.countup :value="560" size="md" caption="md" />
        <x-ui.countup :value="780" size="lg" caption="lg" />
        <x-ui.countup :value="990" size="xl" caption="xl" />
        BLADE;

    $sizesHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-lg font-bold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">xs</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-xl font-bold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">sm</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">md</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-3xl font-bold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">lg</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-4xl font-bold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">xl</span>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.countup :value="1280" color="primary" caption="Primary" />
        <x-ui.countup :value="860" color="success" caption="Success" />
        <x-ui.countup :value="420" color="warning" caption="Warning" />
        <x-ui.countup :value="96" color="danger" caption="Danger" />
        <x-ui.countup :value="512" color="info" caption="Info" />
        BLADE;

    $colorsHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-primary"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Primary</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-success"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Success</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-warning"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Warning</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-danger"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Danger</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-info"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Info</span>
        </div>
        HTML;

    $prefixSuffixCode = <<<'BLADE'
        <x-ui.countup :value="4590.75" :decimals="2" prefix="R$ " caption="Receita" color="success" />
        <x-ui.countup :value="98.6" :decimals="1" suffix="%" caption="Satisfação" color="primary" />
        <x-ui.countup :value="2400" suffix="+" caption="Downloads" color="info" />
        BLADE;

    $prefixSuffixHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-success"><span class="ui-countup-number">R$ 0,00</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Receita</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-primary"><span class="ui-countup-number">0,0%</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Satisfação</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-info"><span class="ui-countup-number">0+</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Downloads</span>
        </div>
        HTML;

    $slotsCode = <<<'BLADE'
        <x-ui.countup :value="1890" color="primary" caption="Pedidos no mês">
            <x-slot:prefixSlot>
                <x-ui.icon name="bi-cart3" class="text-[0.55em]" />
            </x-slot:prefixSlot>
        </x-ui.countup>

        <x-ui.countup :value="42" color="success" caption="Taxa de conversão">
            <x-slot:suffixSlot>%</x-slot:suffixSlot>
        </x-ui.countup>
        BLADE;

    $slotsHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-primary">
                <span class="ui-countup-prefix shrink-0 font-[inherit] text-[0.55em] opacity-80"><i class="bi bi-cart3 leading-none text-base text-[0.55em]" aria-hidden="true"></i></span>
                <span class="ui-countup-number">0</span>
            </span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Pedidos no mês</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-success">
                <span class="ui-countup-number">0</span>
                <span class="ui-countup-suffix shrink-0 font-[inherit] text-[0.55em] opacity-80">%</span>
            </span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Taxa de conversão</span>
        </div>
        HTML;

    $localeCode = <<<'BLADE'
        <x-ui.countup :value="1234567.89" :decimals="2" locale="pt-BR" caption="pt-BR" />
        <x-ui.countup :value="1234567.89" :decimals="2" locale="en-US" caption="en-US" />
        <x-ui.countup :value="1234567.89" :decimals="2" locale="de-DE" caption="de-DE" />
        BLADE;

/*     "locale" só afeta a formatação via Intl.NumberFormat depois que o JS
         monta; o fallback SSR usa sempre decimal="," e separator="." (props
         literais), então os três mostram "0,00" antes de animar. 
*/
    $localeHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-foreground"><span class="ui-countup-number">0,00</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">pt-BR</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-foreground"><span class="ui-countup-number">0,00</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">en-US</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-foreground"><span class="ui-countup-number">0,00</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">de-DE</span>
        </div>
        HTML;

    $durationCode = <<<'BLADE'
        <x-ui.countup :value="1000" :duration="800" caption="800ms" color="primary" />
        <x-ui.countup :value="1000" :duration="2000" caption="2000ms" color="success" />
        <x-ui.countup :value="1000" :duration="4000" caption="4000ms" color="info" />
        BLADE;

    $durationHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-primary"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">800ms</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-success"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">2000ms</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-info"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">4000ms</span>
        </div>
        HTML;

    $easingCode = <<<'BLADE'
        <x-ui.countup :value="1000" easing="linear" caption="linear" />
        <x-ui.countup :value="1000" easing="easeOut" caption="easeOut" />
        <x-ui.countup :value="1000" easing="easeOutCubic" caption="easeOutCubic" />
        <x-ui.countup :value="1000" easing="easeOutExpo" caption="easeOutExpo" />
        BLADE;

    $easingHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">linear</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">easeOut</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">easeOutCubic</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">easeOutExpo</span>
        </div>
        HTML;

    $rangeCode = <<<'BLADE'
        <x-ui.countup :start="50" :value="100" suffix="%" caption="De 50 a 100" color="primary" />
        <x-ui.countup :start="1000" :value="250" caption="Contagem regressiva" color="danger" />
        BLADE;

/*     Aqui o valor inicial exibido antes da animação é o próprio "start" (não 0). 
*/
    $rangeHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-primary">
                <span class="ui-countup-number">50</span>
                <span class="ui-countup-suffix shrink-0 font-[inherit] text-[0.55em] opacity-80">%</span>
            </span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">De 50 a 100</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-danger"><span class="ui-countup-number">1.000</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Contagem regressiva</span>
        </div>
        HTML;

    $triggerCode = <<<'BLADE'
        <x-ui.countup :value="7500" trigger="auto" caption="Auto (ao montar)" color="primary" />
        <x-ui.countup :value="7500" trigger="visible" caption="Visible (viewport)" color="success" />
        BLADE;

    $triggerHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-primary"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Auto (ao montar)</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-success"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Visible (viewport)</span>
        </div>
        HTML;

    $manualCode = <<<'BLADE'
        <div x-data class="flex flex-col items-start gap-3">
            {{-- x-ref no wrapper: o root do countup já tem x-data, então um
                 x-ref nele registraria a ref nele mesmo (closestRoot), não no pai. --}}
            <div x-ref="manualCount">
                <x-ui.countup
                    :value="9999"
                    trigger="manual"
                    prefix="#"
                    color="primary"
                    caption="Disparo manual"
                />
            </div>
            <div class="flex gap-2">
                <x-ui.button size="sm" color="primary" x-on:click="Alpine.$data($refs.manualCount.firstElementChild).start()">
                    Iniciar
                </x-ui.button>
                <x-ui.button size="sm" variant="outline" color="secondary" x-on:click="Alpine.$data($refs.manualCount.firstElementChild).restart()">
                    Reiniciar
                </x-ui.button>
                <x-ui.button size="sm" variant="outline" color="secondary" x-on:click="Alpine.$data($refs.manualCount.firstElementChild).reset()">
                    Reset
                </x-ui.button>
            </div>
        </div>
        BLADE;

    $manualHtml = <<<'HTML'
        <div class="flex flex-col items-start gap-3">
            <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
                <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-primary">
                    <span class="ui-countup-prefix shrink-0 font-[inherit] text-[0.55em] opacity-80">#</span>
                    <span class="ui-countup-number">0</span>
                </span>
                <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Disparo manual</span>
            </div>
            <div class="flex flex-wrap gap-2">
                <button type="button" class="btn btn-sm btn-primary">Iniciar</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Reiniciar</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Reset</button>
            </div>
        </div>
        HTML;

    $statsCode = <<<'BLADE'
        <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
            <x-ui.countup :value="12840" size="lg" color="primary" caption="Visitantes" align="center" />
            <x-ui.countup :value="96.4" :decimals="1" suffix="%" size="lg" color="success" caption="Uptime" align="center" />
            <x-ui.countup :value="482" size="lg" color="info" caption="Projetos" align="center" />
            <x-ui.countup :value="24" suffix="h" size="lg" color="warning" caption="Suporte" align="center" />
        </div>
        BLADE;

    $statsHtml = <<<'HTML'
        <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
            <div class="ui-countup inline-flex flex-col gap-1 text-center items-center">
                <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-3xl font-bold text-primary"><span class="ui-countup-number">0</span></span>
                <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Visitantes</span>
            </div>
            <div class="ui-countup inline-flex flex-col gap-1 text-center items-center">
                <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-3xl font-bold text-success">
                    <span class="ui-countup-number">0,0</span>
                    <span class="ui-countup-suffix shrink-0 font-[inherit] text-[0.55em] opacity-80">%</span>
                </span>
                <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Uptime</span>
            </div>
            <div class="ui-countup inline-flex flex-col gap-1 text-center items-center">
                <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-3xl font-bold text-info"><span class="ui-countup-number">0</span></span>
                <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Projetos</span>
            </div>
            <div class="ui-countup inline-flex flex-col gap-1 text-center items-center">
                <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-3xl font-bold text-warning">
                    <span class="ui-countup-number">0</span>
                    <span class="ui-countup-suffix shrink-0 font-[inherit] text-[0.55em] opacity-80">h</span>
                </span>
                <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Suporte</span>
            </div>
        </div>
        HTML;

    $delayCode = <<<'BLADE'
        <x-ui.countup :value="300" :delay="0" caption="Sem delay" color="primary" />
        <x-ui.countup :value="600" :delay="400" caption="400ms" color="success" />
        <x-ui.countup :value="900" :delay="800" caption="800ms" color="info" />
        BLADE;

    $delayHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-primary"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">Sem delay</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-success"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">400ms</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-info"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">800ms</span>
        </div>
        HTML;

    $weightCode = <<<'BLADE'
        <x-ui.countup :value="440" weight="normal" caption="normal" />
        <x-ui.countup :value="440" weight="medium" caption="medium" />
        <x-ui.countup :value="440" weight="semibold" caption="semibold" />
        <x-ui.countup :value="440" weight="bold" caption="bold" />
        <x-ui.countup :value="440" weight="extrabold" caption="extrabold" />
        BLADE;

    $weightHtml = <<<'HTML'
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-normal text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">normal</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-medium text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">medium</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-semibold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">semibold</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-bold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">bold</span>
        </div>
        <div class="ui-countup inline-flex flex-col gap-1 text-start items-start">
            <span class="ui-countup-value inline-flex flex-wrap items-baseline gap-x-1 tabular-nums tracking-tight text-2xl font-extrabold text-foreground"><span class="ui-countup-number">0</span></span>
            <span class="ui-countup-caption text-sm font-normal text-muted-foreground">extrabold</span>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.countup&gt;</code> anima um número de <code>start</code> até
            <code>value</code> com easing, prefix/suffix, locale, e disparo por viewport
            (<code>trigger="visible"</code>). A lógica vive em Alpine
            (<code>countup</code> — sem dependência npm.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Padrão" :code="$defaultCode" :html="$defaultHtml">
            <x-slot:description>
                Informe o alvo com <code>value</code>. Por padrão anima ao entrar no viewport.
            </x-slot:description>
            <x-ui.countup :value="1250" caption="Clientes ativos" />
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Tokens do tema via <code>color</code>. Padrão: <code>foreground</code>.
            </x-slot:description>
            <div class="flex flex-wrap gap-8">
                <x-ui.countup :value="1280" color="primary" caption="Primary" />
                <x-ui.countup :value="860" color="success" caption="Success" />
                <x-ui.countup :value="420" color="warning" caption="Warning" />
                <x-ui.countup :value="96" color="danger" caption="Danger" />
                <x-ui.countup :value="512" color="info" caption="Info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>xs</code> … <code>3xl</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-end gap-8">
                <x-ui.countup :value="120" size="xs" caption="xs" />
                <x-ui.countup :value="340" size="sm" caption="sm" />
                <x-ui.countup :value="560" size="md" caption="md" />
                <x-ui.countup :value="780" size="lg" caption="lg" />
                <x-ui.countup :value="990" size="xl" caption="xl" />
            </div>
        </x-ui.example>

        <x-ui.example title="Prefixo e sufixo" :code="$prefixSuffixCode" :html="$prefixSuffixHtml">
            <x-slot:description>
                Use <code>prefix</code>, <code>suffix</code> e <code>decimals</code> para moeda/percentual.
            </x-slot:description>
            <div class="flex flex-wrap gap-8">
                <x-ui.countup :value="4590.75" :decimals="2" prefix="R$ " caption="Receita" color="success" />
                <x-ui.countup :value="98.6" :decimals="1" suffix="%" caption="Satisfação" color="primary" />
                <x-ui.countup :value="2400" suffix="+" caption="Downloads" color="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Slots de prefixo/sufixo" :code="$slotsCode" :html="$slotsHtml">
            <x-slot:description>
                <code>prefixSlot</code> / <code>suffixSlot</code> aceitam HTML (ícones, etc.).
            </x-slot:description>
            <div class="flex flex-wrap gap-8">
                <x-ui.countup :value="1890" color="primary" caption="Pedidos no mês">
                    <x-slot:prefixSlot>
                        <x-ui.icon name="bi-cart3" class="text-[0.55em]" />
                    </x-slot:prefixSlot>
                </x-ui.countup>

                <x-ui.countup :value="42" color="success" caption="Taxa de conversão">
                    <x-slot:suffixSlot>%</x-slot:suffixSlot>
                </x-ui.countup>
            </div>
        </x-ui.example>

        <x-ui.example title="Locale (Intl)" :code="$localeCode" :html="$localeHtml">
            <x-slot:description>
                Com <code>locale</code>, a formatação usa <code>Intl.NumberFormat</code>.
            </x-slot:description>
            <div class="flex flex-wrap gap-8">
                <x-ui.countup :value="1234567.89" :decimals="2" locale="pt-BR" caption="pt-BR" />
                <x-ui.countup :value="1234567.89" :decimals="2" locale="en-US" caption="en-US" />
                <x-ui.countup :value="1234567.89" :decimals="2" locale="de-DE" caption="de-DE" />
            </div>
        </x-ui.example>

        <x-ui.example title="Duração" :code="$durationCode" :html="$durationHtml">
            <x-slot:description>
                <code>duration</code> em milissegundos (padrão <code>2000</code>).
            </x-slot:description>
            <div class="flex flex-wrap gap-8">
                <x-ui.countup :value="1000" :duration="800" caption="800ms" color="primary" />
                <x-ui.countup :value="1000" :duration="2000" caption="2000ms" color="success" />
                <x-ui.countup :value="1000" :duration="4000" caption="4000ms" color="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Easing" :code="$easingCode" :html="$easingHtml">
            <x-slot:description>
                Curvas: <code>linear</code>, <code>easeIn</code>, <code>easeOut</code>,
                <code>easeInOut</code>, <code>easeOutCubic</code>, <code>easeInExpo</code>,
                <code>easeOutExpo</code> (padrão).
            </x-slot:description>
            <div class="flex flex-wrap gap-8">
                <x-ui.countup :value="1000" easing="linear" caption="linear" />
                <x-ui.countup :value="1000" easing="easeOut" caption="easeOut" />
                <x-ui.countup :value="1000" easing="easeOutCubic" caption="easeOutCubic" />
                <x-ui.countup :value="1000" easing="easeOutExpo" caption="easeOutExpo" />
            </div>
        </x-ui.example>

        <x-ui.example title="Intervalo start → value" :code="$rangeCode" :html="$rangeHtml">
            <x-slot:description>
                <code>start</code> define a origem. Também funciona em contagem regressiva.
            </x-slot:description>
            <div class="flex flex-wrap gap-8">
                <x-ui.countup :start="50" :value="100" suffix="%" caption="De 50 a 100" color="primary" />
                <x-ui.countup :start="1000" :value="250" caption="Contagem regressiva" color="danger" />
            </div>
        </x-ui.example>

        <x-ui.example title="Delay escalonado" :code="$delayCode" :html="$delayHtml">
            <x-slot:description>
                <code>delay</code> atrasa o início (útil em grids de métricas).
            </x-slot:description>
            <div class="flex flex-wrap gap-8">
                <x-ui.countup :value="300" :delay="0" caption="Sem delay" color="primary" />
                <x-ui.countup :value="600" :delay="400" caption="400ms" color="success" />
                <x-ui.countup :value="900" :delay="800" caption="800ms" color="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Peso tipográfico" :code="$weightCode" :html="$weightHtml">
            <x-slot:description>
                <code>weight</code>: <code>normal</code> … <code>extrabold</code>.
            </x-slot:description>
            <div class="flex flex-wrap gap-8">
                <x-ui.countup :value="440" weight="normal" caption="normal" />
                <x-ui.countup :value="440" weight="medium" caption="medium" />
                <x-ui.countup :value="440" weight="semibold" caption="semibold" />
                <x-ui.countup :value="440" weight="bold" caption="bold" />
                <x-ui.countup :value="440" weight="extrabold" caption="extrabold" />
            </div>
        </x-ui.example>

        <x-ui.example title="Trigger" :code="$triggerCode" :html="$triggerHtml">
            <x-slot:description>
                <code>auto</code> inicia ao montar; <code>visible</code> (padrão) espera o viewport.
            </x-slot:description>
            <div class="flex flex-wrap gap-8">
                <x-ui.countup :value="7500" trigger="auto" caption="Auto (ao montar)" color="primary" />
                <x-ui.countup :value="7500" trigger="visible" caption="Visible (viewport)" color="success" />
            </div>
        </x-ui.example>

        <x-ui.example title="Controle manual" :code="$manualCode" :html="$manualHtml">
            <x-slot:description>
                Com <code>trigger="manual"</code>, coloque o <code>x-ref</code> num wrapper
                (não no countup) e chame <code>Alpine.$data($refs….firstElementChild).start()</code>.
            </x-slot:description>
            <div x-data class="flex flex-col items-start gap-3">
                <div x-ref="manualCount">
                    <x-ui.countup
                        :value="9999"
                        trigger="manual"
                        prefix="#"
                        color="primary"
                        caption="Disparo manual"
                    />
                </div>
                <div class="flex flex-wrap gap-2">
                    <x-ui.button size="sm" color="primary" x-on:click="Alpine.$data($refs.manualCount.firstElementChild).start()">
                        Iniciar
                    </x-ui.button>
                    <x-ui.button size="sm" variant="outline" color="secondary" x-on:click="Alpine.$data($refs.manualCount.firstElementChild).restart()">
                        Reiniciar
                    </x-ui.button>
                    <x-ui.button size="sm" variant="outline" color="secondary" x-on:click="Alpine.$data($refs.manualCount.firstElementChild).reset()">
                        Reset
                    </x-ui.button>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Grid de métricas" :code="$statsCode" :html="$statsHtml">
            <x-slot:description>
                Combine <code>align="center"</code>, <code>caption</code> e tamanhos maiores para KPIs.
            </x-slot:description>
            <div class="grid grid-cols-2 gap-6 md:grid-cols-4">
                <x-ui.countup :value="12840" size="lg" color="primary" caption="Visitantes" align="center" />
                <x-ui.countup :value="96.4" :decimals="1" suffix="%" size="lg" color="success" caption="Uptime" align="center" />
                <x-ui.countup :value="482" size="lg" color="info" caption="Projetos" align="center" />
                <x-ui.countup :value="24" suffix="h" size="lg" color="warning" caption="Suporte" align="center" />
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="countup" />
</x-ui.docs>
