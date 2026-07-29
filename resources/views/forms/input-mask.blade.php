<?php

use Livewire\Component;

return new class extends Component
{
    public string $cpf = '';

    public string $phone = '';

    public string $money = '';

    public function save(): void
    {
        $this->validate([
            'cpf' => ['required', 'digits:11'],
            'phone' => ['required', 'min:10'],
            'money' => ['required', 'min:1'],
        ]);
    }
};
?>

@php
    $presetsCode = <<<'BLADE'
<x-forms.input-mask preset="cpf" label="CPF" name="cpf" clearable />
<x-forms.input-mask preset="cnpj" label="CNPJ" name="cnpj" />
<x-forms.input-mask preset="cep" label="CEP" name="cep" />
<x-forms.input-mask preset="phone-br" label="Telefone" name="phone" hint="Fixo ou celular (máscara dinâmica)." />
BLADE;

    $presetsHtml = <<<'HTML'
<div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-demo_cpf" class="text-sm font-medium text-foreground">CPF</label>
        <input type="hidden" name="demo_cpf" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-person-vcard leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-demo_cpf" placeholder="000.000.000-00" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-demo_cnpj" class="text-sm font-medium text-foreground">CNPJ</label>
        <input type="hidden" name="demo_cnpj" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-building leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-demo_cnpj" placeholder="00.000.000/0000-00" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-demo_cep" class="text-sm font-medium text-foreground">CEP</label>
        <input type="hidden" name="demo_cep" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-mailbox leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-demo_cep" placeholder="00000-000" autocomplete="postal-code" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-demo_phone" class="text-sm font-medium text-foreground">Telefone</label>
        <input type="hidden" name="demo_phone" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-telephone leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-demo_phone" placeholder="(00) 00000-0000" autocomplete="tel" inputmode="tel" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0 flex-1">
                <p class="mb-0 text-xs text-muted-foreground">Fixo ou celular (máscara dinâmica).</p>
            </div>
        </div>
    </div>
</div>
HTML;

    $moneyCode = <<<'BLADE'
<x-forms.input-mask preset="money" label="Valor" name="amount" clearable />
<x-forms.input-mask preset="percent" label="Percentual" name="rate" />
<x-forms.input-mask
    preset="money"
    label="Com 3 casas"
    :decimals="3"
    name="precise"
    placeholder="0,000"
/>
BLADE;

    $moneyHtml = <<<'HTML'
<div class="flex w-full max-w-md flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-demo_amount" class="text-sm font-medium text-foreground">Valor</label>
        <input type="hidden" name="demo_amount" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-currency-dollar leading-none text-sm"></i>
                </span>
                <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">R$</span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-demo_amount" placeholder="0,00" inputmode="decimal" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full text-end tabular-nums">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-demo_rate" class="text-sm font-medium text-foreground">Percentual</label>
        <input type="hidden" name="demo_rate" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-demo_rate" placeholder="0,00" inputmode="decimal" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full text-end tabular-nums">
                </div>
                <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">%</span>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-demo_precise" class="text-sm font-medium text-foreground">Com 3 casas</label>
        <input type="hidden" name="demo_precise" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-currency-dollar leading-none text-sm"></i>
                </span>
                <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">R$</span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-demo_precise" placeholder="0,000" inputmode="decimal" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full text-end tabular-nums">
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $customCode = <<<'BLADE'
<x-forms.input-mask mask="999-aaa-***" label="Custom" placeholder="123-abc-x9z" />
<x-forms.input-mask mask="AAA-9999" label="Somente maiúsculas" hint="Token A força uppercase." />
<x-forms.input-mask preset="plate-br" label="Placa" />
<x-forms.input-mask preset="hex-color" label="Cor hex" />
BLADE;

    $customHtml = <<<'HTML'
<div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Custom</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="123-abc-x9z" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Somente maiúsculas</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <div class="relative min-w-0 flex-1">
                    <input type="text" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0 flex-1">
                <p class="mb-0 text-xs text-muted-foreground">Token A força uppercase.</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Placa</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-car-front leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="ABC-1D23" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Cor hex</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-palette leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="#000000" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $dynamicCode = <<<'BLADE'
<x-forms.input-mask
    :mask="['(99) 9999-9999', '(99) 99999-9999']"
    label="Telefone BR"
    icon="bi-telephone"
    inputmode="tel"
/>
BLADE;

    $dynamicHtml = <<<'HTML'
<div class="w-full max-w-md">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Telefone BR</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-telephone leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" inputmode="tel" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $valueModeCode = <<<'BLADE'
{{-- Padrão: envia dígitos crus (unmasked) no name / wire:model --}}
<x-forms.input-mask preset="cpf" label="CPF (unmasked)" name="cpf_raw" value-mode="unmasked" />

{{-- Envia o valor já formatado --}}
<x-forms.input-mask preset="cpf" label="CPF (masked)" name="cpf_fmt" value-mode="masked" />
BLADE;

    $valueModeHtml = <<<'HTML'
<div class="flex w-full max-w-md flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-cpf_raw" class="text-sm font-medium text-foreground">CPF (unmasked)</label>
        <input type="hidden" name="cpf_raw" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-person-vcard leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-cpf_raw" placeholder="000.000.000-00" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-cpf_fmt" class="text-sm font-medium text-foreground">CPF (masked)</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-person-vcard leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-cpf_fmt" name="cpf_fmt" placeholder="000.000.000-00" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $guideCode = <<<'BLADE'
<x-forms.input-mask
    preset="cpf"
    label="Com guia"
    guide
    :lazy="false"
    placeholder-char="_"
    hint="Ao focar, mostra o restante da máscara."
/>
BLADE;

    $guideHtml = <<<'HTML'
<div class="w-full max-w-md">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Com guia</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-person-vcard leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="000.000.000-00" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0 flex-1">
                <p class="mb-0 text-xs text-muted-foreground">Ao focar, mostra o restante da máscara.</p>
            </div>
        </div>
    </div>
</div>
HTML;

    $clearIncompleteCode = <<<'BLADE'
<x-forms.input-mask
    preset="date"
    label="Data"
    clear-incomplete
    hint="Se incompleta no blur, limpa o campo."
/>
BLADE;

    $clearIncompleteHtml = <<<'HTML'
<div class="w-full max-w-md">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Data</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-calendar-date leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="dd/mm/aaaa" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0 flex-1">
                <p class="mb-0 text-xs text-muted-foreground">Se incompleta no blur, limpa o campo.</p>
            </div>
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.input-mask preset="cep" variant="default" label="Default" />
<x-forms.input-mask preset="cep" variant="filled" label="Filled" />
<x-forms.input-mask preset="cep" variant="flush" label="Flush" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full max-w-md flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Default</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-mailbox leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="00000-000" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Filled</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border border-transparent bg-muted shadow-none border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-mailbox leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="00000-000" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Flush</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-none border-0 border-b border-border bg-transparent shadow-none focus-within:ring-0 focus-within:border-b-2 h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-mailbox leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="00000-000" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.input-mask preset="phone" size="sm" label="Pequeno" />
<x-forms.input-mask preset="phone" size="md" label="Médio" />
<x-forms.input-mask preset="phone" size="lg" label="Grande" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full max-w-md flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-xs font-medium text-foreground">Pequeno</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-8 text-xs px-2.5 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-telephone leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="(00) 0000-0000" autocomplete="tel" inputmode="tel" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Médio</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-telephone leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="(00) 0000-0000" autocomplete="tel" inputmode="tel" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Grande</label>
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-11 text-base px-3.5 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-telephone leading-none text-base"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="(00) 0000-0000" autocomplete="tel" inputmode="tel" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.input-mask preset="cpf" label="Sucesso" state="success" value="52998224725" />
<x-forms.input-mask preset="cpf" label="Erro" error="CPF inválido." value="111" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full max-w-md flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Sucesso</label>
        <input type="hidden" value="52998224725">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-success focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success" aria-hidden="true">
                    <i class="bi bi-person-vcard leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" value="52998224725" placeholder="000.000.000-00" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Erro</label>
        <input type="hidden" value="111">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-danger focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger" aria-hidden="true">
                    <i class="bi bi-person-vcard leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" value="111" placeholder="000.000.000-00" aria-invalid="true" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0 flex-1">
                <p class="mb-0 text-xs text-danger" role="alert">CPF inválido.</p>
            </div>
        </div>
    </div>
</div>
HTML;

    $floatingCode = <<<'BLADE'
<x-forms.input-mask floating preset="cpf" label="CPF" />
<x-forms.input-mask floating preset="money" label="Valor" />
BLADE;

    $floatingHtml = <<<'HTML'
<div class="flex w-full max-w-md flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-person-vcard leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1 h-full">
                    <input type="text" placeholder=" " inputmode="numeric" class="peer h-full w-full placeholder-transparent pt-4 pb-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                    <label class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1/2 -translate-y-1/2 text-sm">CPF</label>
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="hidden" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-currency-dollar leading-none text-sm"></i>
                </span>
                <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">R$</span>
                <div class="relative min-w-0 flex-1 h-full">
                    <input type="text" placeholder=" " inputmode="decimal" class="peer h-full w-full placeholder-transparent pt-4 pb-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-end tabular-nums">
                    <label class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1/2 -translate-y-1/2 text-sm">Valor</label>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $addonsCode = <<<'BLADE'
<x-forms.input-mask preset="money" label="Doação" name="donation">
    <x-slot:addon-end class="border-0 bg-transparent p-0">
        <button type="button" class="btn btn-primary h-full rounded-none rounded-r-lg px-4">Doar</button>
    </x-slot:addon-end>
</x-forms.input-mask>
BLADE;

    $addonsHtml = <<<'HTML'
<div class="w-full max-w-md">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Doação</label>
        <input type="hidden" name="donation" value="">
        <div class="flex w-full items-stretch rounded-lg focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="group/input relative flex min-w-0 flex-1 items-center gap-2 transition-colors rounded-lg rounded-r-none border bg-card shadow-none border-border h-9.5 text-sm px-3 cursor-text">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-currency-dollar leading-none text-sm"></i>
                </span>
                <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">R$</span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" placeholder="0,00" inputmode="decimal" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full text-end tabular-nums">
                </div>
            </div>
            <div class="box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground h-9.5 px-3 text-sm border-0 bg-transparent p-0 border border-l-0 rounded-r-lg [&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none [&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none">
                <button type="button" class="btn btn-primary h-full rounded-none rounded-r-lg px-4">Doar</button>
            </div>
        </div>
    </div>
</div>
HTML;


    $creditCode = <<<'BLADE'
<x-forms.input-mask preset="credit-card" label="Cartão" name="card" />
<x-forms.input-mask preset="cvv" label="CVV" name="cvv" class="max-w-28" />
<x-forms.input-mask preset="datetime" label="Data e hora" name="when" />
BLADE;

    $creditHtml = <<<'HTML'
<div class="flex w-full max-w-md flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-demo_card" class="text-sm font-medium text-foreground">Cartão</label>
        <input type="hidden" name="demo_card" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-credit-card leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-demo_card" placeholder="0000 0000 0000 0000" autocomplete="cc-number" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5 max-w-28">
        <label for="input-mask-demo_cvv" class="text-sm font-medium text-foreground">CVV</label>
        <input type="hidden" name="demo_cvv" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-shield-lock leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-demo_cvv" placeholder="000" autocomplete="cc-csc" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-mask-demo_when" class="text-sm font-medium text-foreground">Data e hora</label>
        <input type="hidden" name="demo_when" value="">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-calendar-event leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="text" id="input-mask-demo_when" placeholder="dd/mm/aaaa hh:mm" autocomplete="off" inputmode="numeric" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
</div>
HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.input-mask&gt;</code> aplica máscara de entrada com Alpine
            (sem libs externas). Suporta presets brasileiros (CPF, CNPJ, CEP, telefone dinâmico, dinheiro),
            máscaras customizadas com tokens <code>9</code>/<code>a</code>/<code>A</code>/<code>*</code>,
            guia visual, <code>value-mode</code> masked/unmasked (ideal para Livewire) e a mesma API visual
            do <code>&lt;x-forms.input&gt;</code> (label, estados, floating, clearable, addons…).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Presets BR" :code="$presetsCode" :html="$presetsHtml">
            <x-slot:description>
                Use <code>preset</code> para máscaras prontas. <code>phone-br</code> alterna fixo/celular.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.input-mask preset="cpf" label="CPF" name="demo_cpf" clearable />
                <x-forms.input-mask preset="cnpj" label="CNPJ" name="demo_cnpj" />
                <x-forms.input-mask preset="cep" label="CEP" name="demo_cep" />
                <x-forms.input-mask preset="phone-br" label="Telefone" name="demo_phone" hint="Fixo ou celular (máscara dinâmica)." />
            </div>
        </x-ui.example>

        <x-ui.example title="Dinheiro e percentual" :code="$moneyCode" :html="$moneyHtml">
            <x-slot:description>
                Modo reverso pt-BR. Ajuste casas com <code>decimals</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-mask preset="money" label="Valor" name="demo_amount" clearable />
                <x-forms.input-mask preset="percent" label="Percentual" name="demo_rate" />
                <x-forms.input-mask
                    preset="money"
                    label="Com 3 casas"
                    :decimals="3"
                    name="demo_precise"
                    placeholder="0,000"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Cartão, CVV e data/hora" :code="$creditCode" :html="$creditHtml">
            <x-slot:description>
                Presets <code>credit-card</code>, <code>cvv</code> e <code>datetime</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-mask preset="credit-card" label="Cartão" name="demo_card" />
                <x-forms.input-mask preset="cvv" label="CVV" name="demo_cvv" class="max-w-28" />
                <x-forms.input-mask preset="datetime" label="Data e hora" name="demo_when" />
            </div>
        </x-ui.example>

        <x-ui.example title="Máscara customizada" :code="$customCode" :html="$customHtml">
            <x-slot:description>
                Tokens: <code>9</code> dígito, <code>a</code> letra, <code>A</code> maiúscula,
                <code>S</code> minúscula, <code>*</code> alfanumérico. Escape com <code>\</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.input-mask mask="999-aaa-***" label="Custom" placeholder="123-abc-x9z" />
                <x-forms.input-mask mask="AAA-9999" label="Somente maiúsculas" hint="Token A força uppercase." />
                <x-forms.input-mask preset="plate-br" label="Placa" />
                <x-forms.input-mask preset="hex-color" label="Cor hex" />
            </div>
        </x-ui.example>

        <x-ui.example title="Máscara dinâmica (array)" :code="$dynamicCode" :html="$dynamicHtml">
            <x-slot:description>
                Passe <code>:mask</code> como array — a menor máscara que ainda cabe é escolhida.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-mask
                    :mask="['(99) 9999-9999', '(99) 99999-9999']"
                    label="Telefone BR"
                    icon="bi-telephone"
                    inputmode="tel"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="value-mode" :code="$valueModeCode" :html="$valueModeHtml">
            <x-slot:description>
                <code>unmasked</code> (padrão) envia só o valor cru; <code>masked</code> envia formatado.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-mask preset="cpf" label="CPF (unmasked)" name="cpf_raw" value-mode="unmasked" />
                <x-forms.input-mask preset="cpf" label="CPF (masked)" name="cpf_fmt" value-mode="masked" />
            </div>
        </x-ui.example>

        <x-ui.example title="Guia (eager + guide)" :code="$guideCode" :html="$guideHtml">
            <x-slot:description>
                <code>guide</code> e <code>:lazy="false"</code> mostram o restante da máscara no foco.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-mask
                    preset="cpf"
                    label="Com guia"
                    guide
                    :lazy="false"
                    placeholder-char="_"
                    hint="Ao focar, mostra o restante da máscara."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="clear-incomplete" :code="$clearIncompleteCode" :html="$clearIncompleteHtml">
            <x-slot:description>
                Com <code>clear-incomplete</code>, blur com valor parcial esvazia o campo.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-mask
                    preset="date"
                    label="Data"
                    clear-incomplete
                    hint="Se incompleta no blur, limpa o campo."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-mask preset="phone" size="sm" label="Pequeno" />
                <x-forms.input-mask preset="phone" size="md" label="Médio" />
                <x-forms.input-mask preset="phone" size="lg" label="Grande" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Mesmas variantes do input: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-mask preset="cep" variant="default" label="Default" />
                <x-forms.input-mask preset="cep" variant="filled" label="Filled" />
                <x-forms.input-mask preset="cep" variant="flush" label="Flush" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> / <code>error</code> com detecção automática via <code>$errors</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-mask preset="cpf" label="Sucesso" state="success" value="52998224725" />
                <x-forms.input-mask preset="cpf" label="Erro" error="CPF inválido." value="111" />
            </div>
        </x-ui.example>

        <x-ui.example title="Floating label" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                <code>floating</code> com a mesma lógica Alpine do input.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-mask floating preset="cpf" label="CPF" />
                <x-forms.input-mask floating preset="money" label="Valor" />
            </div>
        </x-ui.example>

        <x-ui.example title="Addon" :code="$addonsCode" :html="$addonsHtml">
            <x-slot:description>
                Slots <code>addon-start</code> / <code>addon-end</code> iguais ao input.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-mask preset="money" label="Doação" name="donation">
                    <x-slot:addon-end class="border-0 bg-transparent p-0">
                        <button type="button" class="btn btn-primary h-full rounded-none rounded-r-lg px-4">Doar</button>
                    </x-slot:addon-end>
                </x-forms.input-mask>
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-input-mask" />
</x-ui.docs>
