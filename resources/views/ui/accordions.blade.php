<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.accordion default="shipping">
            <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                Você tem até 30 dias para solicitar a devolução do produto.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="payment" title="Quais formas de pagamento são aceitas?">
                Aceitamos cartão de crédito, Pix e boleto bancário.
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $basicHtml = <<<'HTML'
        <div class="divide-y divide-border rounded-md border border-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-primary">Qual o prazo de entrega?</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Como funciona a devolução?</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Quais formas de pagamento são aceitas?</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Aceitamos cartão de crédito, Pix e boleto bancário.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $multipleCode = <<<'BLADE'
        <x-ui.accordion multiple :default="['shipping', 'returns']">
            <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                Você tem até 30 dias para solicitar a devolução do produto.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="payment" title="Quais formas de pagamento são aceitas?">
                Aceitamos cartão de crédito, Pix e boleto bancário.
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $multipleHtml = <<<'HTML'
        <div class="divide-y divide-border rounded-md border border-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-primary">Qual o prazo de entrega?</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-primary">Como funciona a devolução?</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Quais formas de pagamento são aceitas?</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Aceitamos cartão de crédito, Pix e boleto bancário.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $flushCode = <<<'BLADE'
        <x-ui.accordion default="shipping" flush>
            <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                Você tem até 30 dias para solicitar a devolução do produto.
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $flushHtml = <<<'HTML'
        <div class="divide-y divide-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-primary">Qual o prazo de entrega?</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Como funciona a devolução?</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $plusCode = <<<'BLADE'
        <x-ui.accordion default="shipping" indicator="plus" color="success">
            <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                Você tem até 30 dias para solicitar a devolução do produto.
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $plusHtml = <<<'HTML'
        <div class="divide-y divide-border rounded-md border border-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-success">Qual o prazo de entrega?</span>
                        <i class="bi bi-dash-lg shrink-0 text-base leading-none text-muted-foreground" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Como funciona a devolução?</span>
                        <i class="bi bi-plus-lg shrink-0 text-base leading-none text-muted-foreground" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $iconCode = <<<'BLADE'
        <x-ui.accordion default="shipping">
            <x-ui.accordion.accordion-item name="shipping" title="Entrega" icon="bi-truck">
                O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="returns" title="Garantia" icon="bi-shield-check">
                Todos os produtos têm 12 meses de garantia contra defeitos de fabricação.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="faq" title="Dúvidas gerais" icon="bi-question-circle">
                Entre em contato pelo chat para outras dúvidas.
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $iconHtml = <<<'HTML'
        <div class="divide-y divide-border rounded-md border border-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <i class="bi bi-truck shrink-0 text-base leading-none text-muted-foreground" aria-hidden="true"></i>
                        <span class="min-w-0 flex-1 text-primary">Entrega</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <i class="bi bi-shield-check shrink-0 text-base leading-none text-muted-foreground" aria-hidden="true"></i>
                        <span class="min-w-0 flex-1 text-foreground">Garantia</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Todos os produtos têm 12 meses de garantia contra defeitos de fabricação.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <i class="bi bi-question-circle shrink-0 text-base leading-none text-muted-foreground" aria-hidden="true"></i>
                        <span class="min-w-0 flex-1 text-foreground">Dúvidas gerais</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Entre em contato pelo chat para outras dúvidas.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $badgeCode = <<<'BLADE'
        <x-ui.accordion default="open">
            <x-ui.accordion.accordion-item name="open" title="Chamados em aberto" badge="4">
                Lista dos chamados aguardando resposta.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="closed" title="Chamados resolvidos" badge="128">
                Histórico de chamados já finalizados.
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $badgeHtml = <<<'HTML'
        <div class="divide-y divide-border rounded-md border border-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-primary">Chamados em aberto</span>
                        <span class="inline-flex items-center gap-1 rounded-full bg-primary/15 px-2 py-0.5 text-[11px] leading-none font-medium text-primary"><span>4</span></span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Lista dos chamados aguardando resposta.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Chamados resolvidos</span>
                        <span class="inline-flex items-center gap-1 rounded-full bg-primary/15 px-2 py-0.5 text-[11px] leading-none font-medium text-primary"><span>128</span></span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Histórico de chamados já finalizados.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $disabledCode = <<<'BLADE'
        <x-ui.accordion default="shipping">
            <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="returns" title="Devolução (indisponível no momento)" disabled>
                Conteúdo indisponível.
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $disabledHtml = <<<'HTML'
        <div class="divide-y divide-border rounded-md border border-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-primary">Qual o prazo de entrega?</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" disabled aria-expanded="false" class="flex w-full cursor-not-allowed items-center gap-3 px-4 py-3 text-left text-sm font-medium opacity-50 transition-colors focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Devolução (indisponível no momento)</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Conteúdo indisponível.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $leftIconCode = <<<'BLADE'
        <x-ui.accordion default="shipping" indicatorPosition="start">
            <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                Você tem até 30 dias para solicitar a devolução do produto.
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $leftIconHtml = <<<'HTML'
        <div class="divide-y divide-border rounded-md border border-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                        <span class="min-w-0 flex-1 text-primary">Qual o prazo de entrega?</span>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                        <span class="min-w-0 flex-1 text-foreground">Como funciona a devolução?</span>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $borderedCode = <<<'BLADE'
        <x-ui.accordion default="shipping" bordered>
            <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                Você tem até 30 dias para solicitar a devolução do produto.
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $borderedHtml = <<<'HTML'
        <div class="flex flex-col gap-2">
            <div class="overflow-hidden rounded-md border border-border">
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-primary">Qual o prazo de entrega?</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </div>
                </div>
            </div>
            <div class="overflow-hidden rounded-md border border-border">
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Como funciona a devolução?</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $filledCode = <<<'BLADE'
        <x-ui.accordion default="shipping" bordered filled color="success">
            <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
            </x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                Você tem até 30 dias para solicitar a devolução do produto.
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $filledHtml = <<<'HTML'
        <div class="flex flex-col gap-2">
            <div class="overflow-hidden rounded-md border border-border">
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 bg-success/10 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-success">Qual o prazo de entrega?</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region" class="bg-success/10">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </div>
                </div>
            </div>
            <div class="overflow-hidden rounded-md border border-border">
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Como funciona a devolução?</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $nestedCode = <<<'BLADE'
        <x-ui.accordion default="order">
            <x-ui.accordion.accordion-item name="order" title="Detalhes do pedido">
                <p class="mb-3">Resumo geral do pedido #4821.</p>

                <x-ui.accordion default="items" flush>
                    <x-ui.accordion.accordion-item name="items" title="Itens do pedido">
                        2x Camiseta, 1x Boné.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="shipping-info" title="Endereço de entrega">
                        Rua Exemplo, 123 — São Paulo, SP.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $nestedHtml = <<<'HTML'
        <div class="divide-y divide-border rounded-md border border-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-primary">Detalhes do pedido</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                        <p class="mb-3">Resumo geral do pedido #4821.</p>

                        <div class="divide-y divide-border">
                            <div>
                                <h3 class="m-0">
                                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                                        <span class="min-w-0 flex-1 text-primary">Itens do pedido</span>
                                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                                    </button>
                                </h3>
                                <div role="region">
                                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                                        2x Camiseta, 1x Boné.
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="m-0">
                                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                                        <span class="min-w-0 flex-1 text-foreground">Endereço de entrega</span>
                                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                                    </button>
                                </h3>
                                <div hidden role="region">
                                    <div class="px-4 pb-4 text-sm text-muted-foreground">
                                        Rua Exemplo, 123 — São Paulo, SP.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.accordion default="a" color="success">
            <x-ui.accordion.accordion-item name="a" title="Aprovado">Conteúdo A.</x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="b" title="Item B">Conteúdo B.</x-ui.accordion.accordion-item>
        </x-ui.accordion>

        <x-ui.accordion default="a" color="danger">
            <x-ui.accordion.accordion-item name="a" title="Urgente">Conteúdo A.</x-ui.accordion.accordion-item>
            <x-ui.accordion.accordion-item name="b" title="Item B">Conteúdo B.</x-ui.accordion.accordion-item>
        </x-ui.accordion>
        BLADE;

    $colorsHtml = <<<'HTML'
        <div class="divide-y divide-border rounded-md border border-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-success">Aprovado</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">Conteúdo A.</div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Item B</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">Conteúdo B.</div>
                </div>
            </div>
        </div>

        <div class="divide-y divide-border rounded-md border border-border">
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="true" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-danger">Urgente</span>
                        <i class="bi bi-chevron-down rotate-180 shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">Conteúdo A.</div>
                </div>
            </div>
            <div>
                <h3 class="m-0">
                    <button type="button" aria-expanded="false" class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm font-medium transition-colors hover:bg-muted focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary">
                        <span class="min-w-0 flex-1 text-foreground">Item B</span>
                        <i class="bi bi-chevron-down shrink-0 text-sm leading-none text-muted-foreground transition-transform duration-200" aria-hidden="true"></i>
                    </button>
                </h3>
                <div hidden role="region">
                    <div class="px-4 pb-4 text-sm text-muted-foreground">Conteúdo B.</div>
                </div>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.accordion&gt;</code> organiza conteúdo em seções recolhíveis. Use
            <code>&lt;x-ui.accordion.accordion-item&gt;</code> para cada seção, com uma <code>name</code>
            única. Por padrão só uma seção fica aberta por vez (abrir uma fecha as outras); use
            <code>multiple</code> para permitir várias abertas ao mesmo tempo. Suporta indicador
            chevron/+- (posicionável à esquerda ou direita), cores, preenchimento colorido do item
            aberto, ícone e badge por item, item desabilitado, estilos flush/bordered, aninhamento
            (um accordion dentro de outro) e navegação por teclado (setas, Home, End) seguindo o
            padrão WAI-ARIA de accordion.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Só uma seção fica aberta por vez — abrir outra fecha a anterior automaticamente.
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion default="shipping">
                    <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="payment" title="Quais formas de pagamento são aceitas?">
                        Aceitamos cartão de crédito, Pix e boleto bancário.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Múltiplos abertos" :code="$multipleCode" :html="$multipleHtml">
            <x-slot:description>
                <code>multiple</code> permite abrir várias seções ao mesmo tempo; <code>default</code> vira um array de nomes.
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion multiple :default="['shipping', 'returns']">
                    <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="payment" title="Quais formas de pagamento são aceitas?">
                        Aceitamos cartão de crédito, Pix e boleto bancário.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Flush" :code="$flushCode" :html="$flushHtml">
            <x-slot:description>
                <code>flush</code> remove a borda/cantos arredondados externos, deixando as seções de borda a borda.
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion default="shipping" flush>
                    <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Indicador +/-" :code="$plusCode" :html="$plusHtml">
            <x-slot:description>
                <code>indicator="plus"</code> troca a seta que gira por um ícone que alterna entre <code>+</code> e <code>−</code>.
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion default="shipping" indicator="plus" color="success">
                    <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Com ícone" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                A prop <code>icon</code> em <code>&lt;x-ui.accordion.accordion-item&gt;</code> aceita qualquer classe Bootstrap Icons.
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion default="shipping">
                    <x-ui.accordion.accordion-item name="shipping" title="Entrega" icon="bi-truck">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="returns" title="Garantia" icon="bi-shield-check">
                        Todos os produtos têm 12 meses de garantia contra defeitos de fabricação.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="faq" title="Dúvidas gerais" icon="bi-question-circle">
                        Entre em contato pelo chat para outras dúvidas.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Com badge" :code="$badgeCode" :html="$badgeHtml">
            <x-slot:description>
                <code>badge</code> mostra um contador ao lado do título (renderiza um <code>&lt;x-ui.badge&gt;</code> interno).
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion default="open">
                    <x-ui.accordion.accordion-item name="open" title="Chamados em aberto" badge="4">
                        Lista dos chamados aguardando resposta.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="closed" title="Chamados resolvidos" badge="128">
                        Histórico de chamados já finalizados.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Ícone à esquerda" :code="$leftIconCode" :html="$leftIconHtml">
            <x-slot:description>
                <code>indicatorPosition="start"</code> move o indicador (seta/+-) para antes do título, em vez de depois.
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion default="shipping" indicatorPosition="start">
                    <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Bordas visíveis" :code="$borderedCode" :html="$borderedHtml">
            <x-slot:description>
                <code>bordered</code> dá a cada item sua própria borda e cantos arredondados, com espaço entre eles (em vez de um contêiner único com linhas divisórias).
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion default="shipping" bordered>
                    <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Preenchido com cor" :code="$filledCode" :html="$filledHtml">
            <x-slot:description>
                <code>filled</code> aplica um fundo suave na cor do tema ao item aberto (header + conteúdo), em vez de só tingir o texto.
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion default="shipping" bordered filled color="success">
                    <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="returns" title="Como funciona a devolução?">
                        Você tem até 30 dias para solicitar a devolução do produto.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Aninhado" :code="$nestedCode" :html="$nestedHtml">
            <x-slot:description>
                Um <code>&lt;x-ui.accordion&gt;</code> dentro do conteúdo de um item funciona normalmente — cada um tem seu próprio estado independente.
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion default="order">
                    <x-ui.accordion.accordion-item name="order" title="Detalhes do pedido">
                        <p class="mb-3">Resumo geral do pedido #4821.</p>

                        <x-ui.accordion default="items" flush>
                            <x-ui.accordion.accordion-item name="items" title="Itens do pedido">
                                2x Camiseta, 1x Boné.
                            </x-ui.accordion.accordion-item>
                            <x-ui.accordion.accordion-item name="shipping-info" title="Endereço de entrega">
                                Rua Exemplo, 123 — São Paulo, SP.
                            </x-ui.accordion.accordion-item>
                        </x-ui.accordion>
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Item desabilitado" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> em <code>&lt;x-ui.accordion.accordion-item&gt;</code> bloqueia clique e navegação por teclado até esse item.
            </x-slot:description>
            <div class="w-full">
                <x-ui.accordion default="shipping">
                    <x-ui.accordion.accordion-item name="shipping" title="Qual o prazo de entrega?">
                        O prazo padrão é de 5 a 10 dias úteis, variando conforme a região.
                    </x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="returns" title="Devolução (indisponível no momento)" disabled>
                        Conteúdo indisponível.
                    </x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> segue os tokens do tema, herdado automaticamente pelos itens via <code>@@aware</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.accordion default="a" color="success">
                    <x-ui.accordion.accordion-item name="a" title="Aprovado">Conteúdo A.</x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="b" title="Item B">Conteúdo B.</x-ui.accordion.accordion-item>
                </x-ui.accordion>

                <x-ui.accordion default="a" color="danger">
                    <x-ui.accordion.accordion-item name="a" title="Urgente">Conteúdo A.</x-ui.accordion.accordion-item>
                    <x-ui.accordion.accordion-item name="b" title="Item B">Conteúdo B.</x-ui.accordion.accordion-item>
                </x-ui.accordion>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="accordion" />
</x-ui.docs>
