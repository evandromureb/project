<?php

use Livewire\Component;

return new class extends Component
{
    public string $plan = 'pro';

    public string $billing = 'monthly';

    public string $theme = 'system';

    public function save(): void
    {
        $this->validate([
            'plan' => ['required', 'in:starter,pro,enterprise'],
            'billing' => ['required', 'in:monthly,yearly'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.radio.radio-group label="Plano" name="plan" required>
    <x-forms.radio label="Starter" value="starter" />
    <x-forms.radio label="Pro" value="pro" checked />
    <x-forms.radio label="Enterprise" value="enterprise" />
</x-forms.radio.radio-group>
BLADE;

    $basicHtml = <<<'HTML'
<fieldset role="radiogroup" aria-labelledby="radio-group-plan-label" aria-required="true" class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <legend id="radio-group-plan-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">
        Plano
        <span class="text-danger" aria-hidden="true">*</span>
    </legend>
    <div class="flex flex-col gap-2.5">
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="plan" value="starter" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">Starter</span>
            </span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="plan" value="pro" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">Pro</span>
            </span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="plan" value="enterprise" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">Enterprise</span>
            </span>
        </label>
    </div>
</fieldset>
HTML;

    $slotCode = <<<'BLADE'
<x-forms.radio.radio-group label="Notificações" name="notify">
    <x-forms.radio value="all" checked>
        Todas as <span class="text-primary">notificações</span>
    </x-forms.radio>
    <x-forms.radio value="important">
        Apenas as <strong>importantes</strong>
    </x-forms.radio>
</x-forms.radio.radio-group>
BLADE;

    $slotHtml = <<<'HTML'
<fieldset role="radiogroup" aria-labelledby="radio-group-notify-label" class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <legend id="radio-group-notify-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">
        Notificações
    </legend>
    <div class="flex flex-col gap-2.5">
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="notify" value="all" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">
                    Todas as <span class="text-primary">notificações</span>
                </span>
            </span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="notify" value="important" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">
                    Apenas as <strong>importantes</strong>
                </span>
            </span>
        </label>
    </div>
</fieldset>
HTML;

    $descriptionCode = <<<'BLADE'
<x-forms.radio
    label="Entrega padrão"
    description="3 a 5 dias úteis."
    name="shipping"
    value="standard"
    checked
/>
BLADE;

    $descriptionHtml = <<<'HTML'
<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="shipping" value="standard" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground">Entrega padrão</span>
        <span class="mt-0.5 block text-xs text-muted-foreground">3 a 5 dias úteis.</span>
    </span>
</label>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.radio size="sm" label="Pequeno" name="size_demo" value="sm" />
<x-forms.radio size="md" label="Médio" name="size_demo" value="md" checked />
<x-forms.radio size="lg" label="Grande" name="size_demo" value="lg" />
BLADE;

    $sizesHtml = <<<'HTML'
<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="size_demo" value="sm" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-3.5 checked:border-primary focus-visible:ring-primary/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-1.5 bg-primary"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-xs text-foreground">Pequeno</span>
    </span>
</label>
<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="size_demo" value="md" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground">Médio</span>
    </span>
</label>
<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="size_demo" value="lg" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-5 checked:border-primary focus-visible:ring-primary/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2.5 bg-primary"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-base text-foreground">Grande</span>
    </span>
</label>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.radio color="primary" label="Primary" name="c_primary" value="1" checked />
<x-forms.radio color="success" label="Success" name="c_success" value="1" checked />
<x-forms.radio color="warning" label="Warning" name="c_warning" value="1" checked />
<x-forms.radio color="danger" label="Danger" name="c_danger" value="1" checked />
<x-forms.radio color="info" label="Info" name="c_info" value="1" checked />
BLADE;

    $colorsHtml = <<<'HTML'
<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="c_primary" value="1" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground">Primary</span>
    </span>
</label>
<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="c_success" value="1" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-success focus-visible:ring-success/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-success"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground">Success</span>
    </span>
</label>
<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="c_warning" value="1" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-warning focus-visible:ring-warning/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-warning"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground">Warning</span>
    </span>
</label>
<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="c_danger" value="1" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-danger focus-visible:ring-danger/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-danger"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground">Danger</span>
    </span>
</label>
<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="c_info" value="1" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-info focus-visible:ring-info/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-info"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground">Info</span>
    </span>
</label>
HTML;

    $buttonCode = <<<'BLADE'
<x-forms.radio.radio-group label="Stack" name="stack" variant="button" direction="horizontal">
    <x-forms.radio label="Laravel" value="laravel" icon="bi-code-slash" checked />
    <x-forms.radio label="Livewire" value="livewire" icon="bi-lightning" />
    <x-forms.radio label="Alpine" value="alpine" icon="bi-wind" />
</x-forms.radio.radio-group>
BLADE;

    $buttonHtml = <<<'HTML'
<fieldset role="radiogroup" aria-labelledby="radio-group-stack-label" class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <legend id="radio-group-stack-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">Stack</legend>
    <div class="flex flex-wrap gap-2">
        <label class="relative inline-flex w-fit cursor-pointer items-center gap-2 border border-border bg-card font-medium transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/60 has-[:checked]:border-primary has-[:checked]:bg-primary/10 has-[:checked]:text-primary rounded-lg px-3 py-1.5 text-sm">
            <input type="radio" name="stack" value="laravel" checked class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0 disabled:cursor-not-allowed">
            <span class="relative inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors peer-checked:[&>span]:scale-100 size-4 peer-checked:border-primary">
                <span class="scale-0 rounded-full transition-transform size-2 bg-primary"></span>
            </span>
            <i class="bi bi-code-slash leading-none" aria-hidden="true"></i>
            <span>Laravel</span>
        </label>
        <label class="relative inline-flex w-fit cursor-pointer items-center gap-2 border border-border bg-card font-medium transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/60 has-[:checked]:border-primary has-[:checked]:bg-primary/10 has-[:checked]:text-primary rounded-lg px-3 py-1.5 text-sm">
            <input type="radio" name="stack" value="livewire" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0 disabled:cursor-not-allowed">
            <span class="relative inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors peer-checked:[&>span]:scale-100 size-4 peer-checked:border-primary">
                <span class="scale-0 rounded-full transition-transform size-2 bg-primary"></span>
            </span>
            <i class="bi bi-lightning leading-none" aria-hidden="true"></i>
            <span>Livewire</span>
        </label>
        <label class="relative inline-flex w-fit cursor-pointer items-center gap-2 border border-border bg-card font-medium transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/60 has-[:checked]:border-primary has-[:checked]:bg-primary/10 has-[:checked]:text-primary rounded-lg px-3 py-1.5 text-sm">
            <input type="radio" name="stack" value="alpine" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0 disabled:cursor-not-allowed">
            <span class="relative inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors peer-checked:[&>span]:scale-100 size-4 peer-checked:border-primary">
                <span class="scale-0 rounded-full transition-transform size-2 bg-primary"></span>
            </span>
            <i class="bi bi-wind leading-none" aria-hidden="true"></i>
            <span>Alpine</span>
        </label>
    </div>
</fieldset>
HTML;

    $cardCode = <<<'BLADE'
<x-forms.radio.radio-group label="Plano" name="plans" variant="card" direction="horizontal" required>
    <x-forms.radio
        label="Starter"
        description="Até 3 projetos e suporte por e-mail."
        value="starter"
        icon="bi-rocket"
    />
    <x-forms.radio
        label="Pro"
        description="Projetos ilimitados e SLA."
        value="pro"
        icon="bi-stars"
        checked
    />
</x-forms.radio.radio-group>
BLADE;

    $cardHtml = <<<'HTML'
<fieldset role="radiogroup" aria-labelledby="radio-group-plans-label" aria-required="true" class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <legend id="radio-group-plans-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">
        Plano
        <span class="text-danger" aria-hidden="true">*</span>
    </legend>
    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
        <label class="relative flex w-full cursor-pointer gap-3 border border-border bg-card p-4 shadow-sm transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/40 has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30 rounded-xl">
            <input type="radio" name="plans" value="starter" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0 disabled:cursor-not-allowed">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-checked:[&>span]:scale-100 size-4 peer-checked:border-primary peer-focus-visible:ring-primary/40">
                <span class="scale-0 rounded-full transition-transform size-2 bg-primary"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="flex items-center gap-2 text-sm font-medium text-foreground">
                    <i class="bi bi-rocket leading-none text-muted-foreground" aria-hidden="true"></i>
                    <span>Starter</span>
                </span>
                <span class="mt-1 block text-xs text-muted-foreground">Até 3 projetos e suporte por e-mail.</span>
            </span>
        </label>
        <label class="relative flex w-full cursor-pointer gap-3 border border-border bg-card p-4 shadow-sm transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/40 has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30 rounded-xl">
            <input type="radio" name="plans" value="pro" checked class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0 disabled:cursor-not-allowed">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-checked:[&>span]:scale-100 size-4 peer-checked:border-primary peer-focus-visible:ring-primary/40">
                <span class="scale-0 rounded-full transition-transform size-2 bg-primary"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="flex items-center gap-2 text-sm font-medium text-foreground">
                    <i class="bi bi-stars leading-none text-muted-foreground" aria-hidden="true"></i>
                    <span>Pro</span>
                </span>
                <span class="mt-1 block text-xs text-muted-foreground">Projetos ilimitados e SLA.</span>
            </span>
        </label>
    </div>
</fieldset>
HTML;

    $reverseCode = <<<'BLADE'
<x-forms.radio reverse label="Radio à direita" name="rev" value="a" checked />
<x-forms.radio reverse variant="card" label="Card invertido" description="Controle à direita." name="rev_card" value="b" />
BLADE;

    $reverseHtml = <<<'HTML'
<label class="flex items-start gap-2.5 flex-row-reverse justify-between cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="rev" value="a" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground">Radio à direita</span>
    </span>
</label>

<label class="relative flex w-full cursor-pointer gap-3 border border-border bg-card p-4 shadow-sm transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/40 has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30 rounded-xl flex-row-reverse">
    <input type="radio" name="rev_card" value="b" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0 disabled:cursor-not-allowed">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-checked:[&>span]:scale-100 size-4 peer-checked:border-primary peer-focus-visible:ring-primary/40">
        <span class="scale-0 rounded-full transition-transform size-2 bg-primary"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="flex items-center gap-2 text-sm font-medium text-foreground">
            <span>Card invertido</span>
        </span>
        <span class="mt-1 block text-xs text-muted-foreground">Controle à direita.</span>
    </span>
</label>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.radio label="Sucesso" state="success" name="st_ok" value="1" checked hint="Opção válida." />
<x-forms.radio label="Atenção" state="warning" name="st_warn" value="1" hint="Revise esta escolha." />
<x-forms.radio label="Erro" name="choice" value="1" error="Selecione uma opção." />
BLADE;

    $statesHtml = <<<'HTML'
<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="st_ok" value="1" checked aria-describedby="radio-st_ok-1-hint" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-success focus-visible:ring-success/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-success"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-success">Sucesso</span>
    </span>
</label>
<div class="min-w-0">
    <p id="radio-st_ok-1-hint" class="mb-0 text-xs text-muted-foreground">Opção válida.</p>
</div>

<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="st_warn" value="1" aria-describedby="radio-st_warn-1-hint" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-warning focus-visible:ring-warning/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-warning"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-warning">Atenção</span>
    </span>
</label>
<div class="min-w-0">
    <p id="radio-st_warn-1-hint" class="mb-0 text-xs text-muted-foreground">Revise esta escolha.</p>
</div>

<label class="flex items-start gap-2.5 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="choice" value="1" aria-describedby="radio-choice-1-error" aria-invalid="true" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-danger focus-visible:ring-danger/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-danger"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-danger">Erro</span>
    </span>
</label>
<div class="min-w-0">
    <p id="radio-choice-1-error" class="mb-0 text-xs text-danger" role="alert">Selecione uma opção.</p>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.radio label="Desabilitado" name="dis" value="a" disabled />
<x-forms.radio label="Desabilitado marcado" name="dis2" value="b" disabled checked />
<x-forms.radio label="Somente leitura" name="ro" value="c" readonly checked />
BLADE;

    $disabledHtml = <<<'HTML'
<label class="flex items-start gap-2.5 cursor-not-allowed">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="dis" value="a" disabled class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground opacity-60">Desabilitado</span>
    </span>
</label>
<label class="flex items-start gap-2.5 cursor-not-allowed">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="dis2" value="b" checked disabled class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground opacity-60">Desabilitado marcado</span>
    </span>
</label>
<label class="flex items-start gap-2.5 cursor-not-allowed">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
        <input type="radio" name="ro" value="c" checked class="peer shrink-0 cursor-default appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
        <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block font-medium text-sm text-foreground">Somente leitura</span>
    </span>
</label>
HTML;

    $groupHorizontalCode = <<<'BLADE'
<x-forms.radio.radio-group label="Período" name="period" direction="horizontal" color="info" required>
    <x-forms.radio label="Mensal" value="monthly" checked />
    <x-forms.radio label="Trimestral" value="quarterly" />
    <x-forms.radio label="Anual" value="yearly" />
</x-forms.radio.radio-group>
BLADE;

    $groupHorizontalHtml = <<<'HTML'
<fieldset role="radiogroup" aria-labelledby="radio-group-period-label" aria-required="true" class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <legend id="radio-group-period-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">
        Período
        <span class="text-danger" aria-hidden="true">*</span>
    </legend>
    <div class="flex flex-wrap gap-x-5 gap-y-2">
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="period" value="monthly" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-info focus-visible:ring-info/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-info"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">Mensal</span>
            </span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="period" value="quarterly" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-info focus-visible:ring-info/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-info"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">Trimestral</span>
            </span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="period" value="yearly" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-info focus-visible:ring-info/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-info"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">Anual</span>
            </span>
        </label>
    </div>
</fieldset>
HTML;

    $groupHintCode = <<<'BLADE'
<x-forms.radio.radio-group
    label="Método de pagamento"
    name="payment"
    description="Cobraremos apenas após a confirmação."
    hint="Você pode alterar depois."
    required
>
    <x-forms.radio label="Cartão de crédito" value="card" checked />
    <x-forms.radio label="Pix" value="pix" />
    <x-forms.radio label="Boleto" value="boleto" />
</x-forms.radio.radio-group>
BLADE;

    $groupHintHtml = <<<'HTML'
<fieldset role="radiogroup" aria-describedby="radio-group-payment-description radio-group-payment-hint" aria-labelledby="radio-group-payment-label" aria-required="true" class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <legend id="radio-group-payment-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">
        Método de pagamento
        <span class="text-danger" aria-hidden="true">*</span>
    </legend>
    <p id="radio-group-payment-description" class="mb-0 text-xs text-muted-foreground">Cobraremos apenas após a confirmação.</p>
    <div class="flex flex-col gap-2.5">
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="payment" value="card" checked class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">Cartão de crédito</span>
            </span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="payment" value="pix" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">Pix</span>
            </span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center">
                <input type="radio" name="payment" value="boleto" class="peer shrink-0 cursor-pointer appearance-none rounded-full border border-border bg-card transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50 size-4 checked:border-primary focus-visible:ring-primary/40">
                <span class="pointer-events-none absolute scale-0 rounded-full transition-transform peer-checked:scale-100 size-2 bg-primary"></span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="block font-medium text-sm text-foreground">Boleto</span>
            </span>
        </label>
    </div>
    <div class="min-w-0">
        <p id="radio-group-payment-hint" class="mb-0 text-xs text-muted-foreground">Você pode alterar depois.</p>
    </div>
</fieldset>
HTML;

    $roundedButtonsCode = <<<'BLADE'
<x-forms.radio.radio-group label="Tema" name="theme_ui" variant="button" direction="horizontal">
    <x-forms.radio label="Claro" value="light" rounded icon="bi-sun" />
    <x-forms.radio label="Escuro" value="dark" rounded icon="bi-moon" />
    <x-forms.radio label="Sistema" value="system" rounded icon="bi-laptop" checked />
</x-forms.radio.radio-group>
BLADE;

    $roundedButtonsHtml = <<<'HTML'
<fieldset role="radiogroup" aria-labelledby="radio-group-theme_ui-label" class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <legend id="radio-group-theme_ui-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">Tema</legend>
    <div class="flex flex-wrap gap-2">
        <label class="relative inline-flex w-fit cursor-pointer items-center gap-2 border border-border bg-card font-medium transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/60 has-[:checked]:border-primary has-[:checked]:bg-primary/10 has-[:checked]:text-primary rounded-lg px-3 py-1.5 text-sm !rounded-full">
            <input type="radio" name="theme_ui" value="light" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0 disabled:cursor-not-allowed">
            <span class="relative inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors peer-checked:[&>span]:scale-100 size-4 peer-checked:border-primary">
                <span class="scale-0 rounded-full transition-transform size-2 bg-primary"></span>
            </span>
            <i class="bi bi-sun leading-none" aria-hidden="true"></i>
            <span>Claro</span>
        </label>
        <label class="relative inline-flex w-fit cursor-pointer items-center gap-2 border border-border bg-card font-medium transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/60 has-[:checked]:border-primary has-[:checked]:bg-primary/10 has-[:checked]:text-primary rounded-lg px-3 py-1.5 text-sm !rounded-full">
            <input type="radio" name="theme_ui" value="dark" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0 disabled:cursor-not-allowed">
            <span class="relative inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors peer-checked:[&>span]:scale-100 size-4 peer-checked:border-primary">
                <span class="scale-0 rounded-full transition-transform size-2 bg-primary"></span>
            </span>
            <i class="bi bi-moon leading-none" aria-hidden="true"></i>
            <span>Escuro</span>
        </label>
        <label class="relative inline-flex w-fit cursor-pointer items-center gap-2 border border-border bg-card font-medium transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/60 has-[:checked]:border-primary has-[:checked]:bg-primary/10 has-[:checked]:text-primary rounded-lg px-3 py-1.5 text-sm !rounded-full">
            <input type="radio" name="theme_ui" value="system" checked class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0 disabled:cursor-not-allowed">
            <span class="relative inline-flex shrink-0 items-center justify-center rounded-full border border-border bg-card transition-colors peer-checked:[&>span]:scale-100 size-4 peer-checked:border-primary">
                <span class="scale-0 rounded-full transition-transform size-2 bg-primary"></span>
            </span>
            <i class="bi bi-laptop leading-none" aria-hidden="true"></i>
            <span>Sistema</span>
        </label>
    </div>
</fieldset>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.radio&gt;</code> cobre radio clássico, botão e card —
            com label, descrição, hint, erro (via <code>$errors</code>), tamanhos, cores,
            reverse e readonly. Use <code>&lt;x-forms.radio.radio-group&gt;</code> para
            <code>role="radiogroup"</code>, legend, direção e props compartilhadas
            (<code>name</code>, <code>color</code>, <code>variant</code>, <code>size</code>)
            via <code>@@aware</code>. Atributos como <code>wire:model</code> caem no
            <code>&lt;input&gt;</code>; <code>class</code> no wrapper.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico (grupo)" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                O <code>name</code> do grupo é herdado pelos radios filhos.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.radio.radio-group label="Plano" name="plan" required>
                    <x-forms.radio label="Starter" value="starter" />
                    <x-forms.radio label="Pro" value="pro" checked />
                    <x-forms.radio label="Enterprise" value="enterprise" />
                </x-forms.radio.radio-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Slot como label" :code="$slotCode" :html="$slotHtml">
            <x-slot:description>
                O slot padrão aceita HTML rico (links, ênfase).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.radio.radio-group label="Notificações" name="notify">
                    <x-forms.radio value="all" checked>
                        Todas as <span class="text-primary">notificações</span>
                    </x-forms.radio>
                    <x-forms.radio value="important">
                        Apenas as <strong>importantes</strong>
                    </x-forms.radio>
                </x-forms.radio.radio-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Descrição" :code="$descriptionCode" :html="$descriptionHtml">
            <x-slot:description>
                <code>description</code> fica sob o label; <code>hint</code> sob o controle.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.radio
                    label="Entrega padrão"
                    description="3 a 5 dias úteis."
                    name="shipping"
                    value="standard"
                    checked
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Grupo com hint" :code="$groupHintCode" :html="$groupHintHtml">
            <x-slot:description>
                Description e hint no nível do grupo.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.radio.radio-group
                    label="Método de pagamento"
                    name="payment"
                    description="Cobraremos apenas após a confirmação."
                    hint="Você pode alterar depois."
                    required
                >
                    <x-forms.radio label="Cartão de crédito" value="card" checked />
                    <x-forms.radio label="Pix" value="pix" />
                    <x-forms.radio label="Boleto" value="boleto" />
                </x-forms.radio.radio-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code> (padrão) e <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.radio size="sm" label="Pequeno" name="size_demo" value="sm" />
                <x-forms.radio size="md" label="Médio" name="size_demo" value="md" checked />
                <x-forms.radio size="lg" label="Grande" name="size_demo" value="lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Tokens do tema: <code>primary</code>, <code>success</code>, <code>warning</code>,
                <code>danger</code>, <code>info</code>, <code>secondary</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.radio color="primary" label="Primary" name="c_primary" value="1" checked />
                <x-forms.radio color="success" label="Success" name="c_success" value="1" checked />
                <x-forms.radio color="warning" label="Warning" name="c_warning" value="1" checked />
                <x-forms.radio color="danger" label="Danger" name="c_danger" value="1" checked />
                <x-forms.radio color="info" label="Info" name="c_info" value="1" checked />
            </div>
        </x-ui.example>

        <x-ui.example title="Botão" :code="$buttonCode" :html="$buttonHtml">
            <x-slot:description>
                <code>variant="button"</code> — chips exclusivos, ótimo com ícones.
            </x-slot:description>
            <x-forms.radio.radio-group label="Stack" name="stack" variant="button" direction="horizontal">
                <x-forms.radio label="Laravel" value="laravel" icon="bi-code-slash" checked />
                <x-forms.radio label="Livewire" value="livewire" icon="bi-lightning" />
                <x-forms.radio label="Alpine" value="alpine" icon="bi-wind" />
            </x-forms.radio.radio-group>
        </x-ui.example>

        <x-ui.example title="Botões arredondados" :code="$roundedButtonsCode" :html="$roundedButtonsHtml">
            <x-slot:description>
                <code>rounded</code> transforma o botão em pill.
            </x-slot:description>
            <x-forms.radio.radio-group label="Tema" name="theme_ui" variant="button" direction="horizontal">
                <x-forms.radio label="Claro" value="light" rounded icon="bi-sun" />
                <x-forms.radio label="Escuro" value="dark" rounded icon="bi-moon" />
                <x-forms.radio label="Sistema" value="system" rounded icon="bi-laptop" checked />
            </x-forms.radio.radio-group>
        </x-ui.example>

        <x-ui.example title="Card" :code="$cardCode" :html="$cardHtml">
            <x-slot:description>
                <code>variant="card"</code> para opções com título + descrição.
            </x-slot:description>
            <x-forms.radio.radio-group label="Plano" name="plans" variant="card" direction="horizontal" required>
                <x-forms.radio
                    label="Starter"
                    description="Até 3 projetos e suporte por e-mail."
                    value="starter"
                    icon="bi-rocket"
                />
                <x-forms.radio
                    label="Pro"
                    description="Projetos ilimitados e SLA."
                    value="pro"
                    icon="bi-stars"
                    checked
                />
            </x-forms.radio.radio-group>
        </x-ui.example>

        <x-ui.example title="Horizontal" :code="$groupHorizontalCode" :html="$groupHorizontalHtml">
            <x-slot:description>
                <code>direction="horizontal"</code> + <code>color</code> herdada.
            </x-slot:description>
            <x-forms.radio.radio-group label="Período" name="period" direction="horizontal" color="info" required>
                <x-forms.radio label="Mensal" value="monthly" checked />
                <x-forms.radio label="Trimestral" value="quarterly" />
                <x-forms.radio label="Anual" value="yearly" />
            </x-forms.radio.radio-group>
        </x-ui.example>

        <x-ui.example title="Reverse" :code="$reverseCode" :html="$reverseHtml">
            <x-slot:description>
                <code>reverse</code> espelha o controle e o texto.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.radio reverse label="Radio à direita" name="rev" value="a" checked />
                <x-forms.radio reverse variant="card" label="Card invertido" description="Controle à direita." name="rev_card" value="b" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados e erro" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> e <code>error</code> (força danger + <code>role="alert"</code>).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.radio label="Sucesso" state="success" name="st_ok" value="1" checked hint="Opção válida." />
                <x-forms.radio label="Atenção" state="warning" name="st_warn" value="1" hint="Revise esta escolha." />
                <x-forms.radio label="Erro" name="choice" value="1" error="Selecione uma opção." />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>readonly</code> bloqueia a troca via Alpine sem usar <code>disabled</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.radio label="Desabilitado" name="dis" value="a" disabled />
                <x-forms.radio label="Desabilitado marcado" name="dis2" value="b" disabled checked />
                <x-forms.radio label="Somente leitura" name="ro" value="c" readonly checked />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-radio" />
</x-ui.docs>
