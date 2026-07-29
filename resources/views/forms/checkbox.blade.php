<?php

use Livewire\Component;

return new class extends Component
{
    public bool $terms = false;

    public bool $newsletter = true;

    /** @var list<string> */
    public array $features = ['api'];

    public function save(): void
    {
        $this->validate([
            'terms' => ['accepted'],
            'features' => ['required', 'array', 'min:1'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.checkbox label="Aceito os termos de uso" name="terms" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-terms" name="terms" value="1" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary indeterminate:border-primary indeterminate:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 peer-indeterminate:opacity-0 text-xs" aria-hidden="true"></i>
            <i class="bi bi-dash pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-indeterminate:opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-foreground">Aceito os termos de uso</span>
        </span>
    </label>
</div>
HTML;

    $slotCode = <<<'BLADE'
<x-forms.checkbox name="privacy" required>
    Li e aceito a <span class="text-primary underline">política de privacidade</span>
</x-forms.checkbox>
BLADE;

    $slotHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-privacy" name="privacy" value="1" required class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary indeterminate:border-primary indeterminate:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 peer-indeterminate:opacity-0 text-xs" aria-hidden="true"></i>
            <i class="bi bi-dash pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-indeterminate:opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-foreground">
                Li e aceito a <span class="text-primary underline">política de privacidade</span>
                <span class="text-danger" aria-hidden="true">*</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $descriptionCode = <<<'BLADE'
<x-forms.checkbox
    label="Receber novidades"
    description="Enviaremos no máximo 1 e-mail por semana."
    name="newsletter"
    checked
/>
BLADE;

    $descriptionHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-newsletter" name="newsletter" value="1" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary indeterminate:border-primary indeterminate:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-100 text-xs" aria-hidden="true"></i>
            <i class="bi bi-dash pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-foreground">Receber novidades</span>
            <span class="mt-0.5 block text-xs text-muted-foreground">Enviaremos no máximo 1 e-mail por semana.</span>
        </span>
    </label>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.checkbox size="sm" label="Pequeno" name="s_sm" />
<x-forms.checkbox size="md" label="Médio" name="s_md" />
<x-forms.checkbox size="lg" label="Grande" name="s_lg" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-s_sm" name="s_sm" value="1" class="peer size-3.5 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 text-[0.65rem]" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-xs font-medium text-foreground">Pequeno</span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-s_md" name="s_md" value="1" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-foreground">Médio</span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-s_lg" name="s_lg" value="1" class="peer size-5 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 text-sm" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-base font-medium text-foreground">Grande</span>
        </span>
    </label>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.checkbox color="primary" label="Primary" name="color_primary" checked />
<x-forms.checkbox color="success" label="Success" name="color_success" checked />
<x-forms.checkbox color="warning" label="Warning" name="color_warning" checked />
<x-forms.checkbox color="danger" label="Danger" name="color_danger" checked />
<x-forms.checkbox color="info" label="Info" name="color_info" checked />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-color_primary" name="color_primary" value="1" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Primary</span></span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-color_success" name="color_success" value="1" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-success checked:bg-success focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-success/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-success-foreground opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Success</span></span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-color_warning" name="color_warning" value="1" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-warning checked:bg-warning focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-warning/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-warning-foreground opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Warning</span></span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-color_danger" name="color_danger" value="1" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-danger checked:bg-danger focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-danger/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-danger-foreground opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Danger</span></span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-color_info" name="color_info" value="1" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-info checked:bg-info focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-info/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-info-foreground opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Info</span></span>
    </label>
</div>
HTML;

    $switchCode = <<<'BLADE'
<x-forms.checkbox variant="switch" label="Notificações push" name="push" checked />
<x-forms.checkbox
    variant="switch"
    label="Modo escuro"
    description="Aplica o tema escuro em todo o app."
    name="dark"
/>
BLADE;

    $switchHtml = <<<'HTML'
<label class="flex items-start gap-3 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center">
        <input type="checkbox" id="checkbox-push" role="switch" name="push" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0" />
        <span class="relative block rounded-full bg-muted transition-colors h-5 w-9 peer-checked:bg-primary peer-checked:[&>span]:translate-x-4 peer-focus-visible:ring-2 peer-focus-visible:ring-primary/40 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50">
            <span class="absolute rounded-full bg-white shadow-sm transition-transform top-0.5 left-0.5 size-4"></span>
        </span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block text-sm font-medium text-foreground">Notificações push</span>
    </span>
</label>
<label class="flex items-start gap-3 cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center">
        <input type="checkbox" id="checkbox-dark" role="switch" name="dark" value="1" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0" />
        <span class="relative block rounded-full bg-muted transition-colors h-5 w-9 peer-checked:bg-primary peer-checked:[&>span]:translate-x-4 peer-focus-visible:ring-2 peer-focus-visible:ring-primary/40 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50">
            <span class="absolute rounded-full bg-white shadow-sm transition-transform top-0.5 left-0.5 size-4"></span>
        </span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block text-sm font-medium text-foreground">Modo escuro</span>
        <span class="mt-0.5 block text-xs text-muted-foreground">Aplica o tema escuro em todo o app.</span>
    </span>
</label>
HTML;

    $buttonCode = <<<'BLADE'
<div class="flex flex-wrap gap-2">
    <x-forms.checkbox variant="button" label="Laravel" name="stack[]" value="laravel" icon="bi-code-slash" checked />
    <x-forms.checkbox variant="button" label="Livewire" name="stack[]" value="livewire" icon="bi-lightning" />
    <x-forms.checkbox variant="button" label="Alpine" name="stack[]" value="alpine" icon="bi-wind" />
</div>
BLADE;

    $buttonHtml = <<<'HTML'
<div class="flex flex-wrap gap-2">
    <label class="relative inline-flex w-fit cursor-pointer items-center gap-2 rounded-lg border border-border bg-card px-3 py-1.5 text-sm font-medium transition-colors hover:bg-muted/60 has-[:checked]:border-primary has-[:checked]:bg-primary/10 has-[:checked]:text-primary">
        <input type="checkbox" id="checkbox-stack-laravel" name="stack[]" value="laravel" checked class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0" />
        <span class="relative inline-flex shrink-0 items-center justify-center rounded border border-border bg-card transition-colors size-4 peer-checked:[&_.bi-check]:opacity-100 peer-checked:border-primary peer-checked:bg-primary" aria-hidden="true">
            <i class="bi bi-check absolute inset-0 flex items-center justify-center text-primary-foreground opacity-100 text-xs"></i>
        </span>
        <i class="bi bi-code-slash leading-none" aria-hidden="true"></i>
        <span>Laravel</span>
    </label>
    <label class="relative inline-flex w-fit cursor-pointer items-center gap-2 rounded-lg border border-border bg-card px-3 py-1.5 text-sm font-medium transition-colors hover:bg-muted/60 has-[:checked]:border-primary has-[:checked]:bg-primary/10 has-[:checked]:text-primary">
        <input type="checkbox" id="checkbox-stack-livewire" name="stack[]" value="livewire" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0" />
        <span class="relative inline-flex shrink-0 items-center justify-center rounded border border-border bg-card transition-colors size-4" aria-hidden="true">
            <i class="bi bi-check absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 text-xs"></i>
        </span>
        <i class="bi bi-lightning leading-none" aria-hidden="true"></i>
        <span>Livewire</span>
    </label>
    <label class="relative inline-flex w-fit cursor-pointer items-center gap-2 rounded-lg border border-border bg-card px-3 py-1.5 text-sm font-medium transition-colors hover:bg-muted/60 has-[:checked]:border-primary has-[:checked]:bg-primary/10 has-[:checked]:text-primary">
        <input type="checkbox" id="checkbox-stack-alpine" name="stack[]" value="alpine" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0" />
        <span class="relative inline-flex shrink-0 items-center justify-center rounded border border-border bg-card transition-colors size-4" aria-hidden="true">
            <i class="bi bi-check absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 text-xs"></i>
        </span>
        <i class="bi bi-wind leading-none" aria-hidden="true"></i>
        <span>Alpine</span>
    </label>
</div>
HTML;

    $cardCode = <<<'BLADE'
<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
    <x-forms.checkbox
        variant="card"
        label="Plano Starter"
        description="Até 3 projetos e suporte por e-mail."
        name="plans[]"
        value="starter"
        icon="bi-rocket"
        checked
    />
    <x-forms.checkbox
        variant="card"
        label="Plano Pro"
        description="Projetos ilimitados e SLA."
        name="plans[]"
        value="pro"
        icon="bi-stars"
    />
</div>
BLADE;

    $cardHtml = <<<'HTML'
<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
    <label class="relative flex w-full cursor-pointer gap-3 rounded-xl border border-border bg-card p-4 shadow-sm transition-colors hover:bg-muted/40 has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30">
        <input type="checkbox" id="checkbox-plans-starter" name="plans[]" value="starter" checked class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0" />
        <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center rounded border border-border bg-card transition-colors size-4 peer-checked:[&_.bi-check]:opacity-100 peer-checked:border-primary peer-checked:bg-primary peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1" aria-hidden="true">
            <i class="bi bi-check absolute inset-0 flex items-center justify-center text-primary-foreground opacity-100 text-xs"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 text-sm font-medium text-foreground">
                <i class="bi bi-rocket leading-none text-muted-foreground" aria-hidden="true"></i>
                <span>Plano Starter</span>
            </span>
            <span class="mt-1 block text-xs text-muted-foreground">Até 3 projetos e suporte por e-mail.</span>
        </span>
    </label>
    <label class="relative flex w-full cursor-pointer gap-3 rounded-xl border border-border bg-card p-4 shadow-sm transition-colors hover:bg-muted/40 has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30">
        <input type="checkbox" id="checkbox-plans-pro" name="plans[]" value="pro" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0" />
        <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center rounded border border-border bg-card transition-colors size-4 peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1" aria-hidden="true">
            <i class="bi bi-check absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 text-xs"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 text-sm font-medium text-foreground">
                <i class="bi bi-stars leading-none text-muted-foreground" aria-hidden="true"></i>
                <span>Plano Pro</span>
            </span>
            <span class="mt-1 block text-xs text-muted-foreground">Projetos ilimitados e SLA.</span>
        </span>
    </label>
</div>
HTML;

    $indeterminateCode = <<<'BLADE'
<x-forms.checkbox label="Seleção parcial" name="partial" indeterminate />
BLADE;

    $indeterminateHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-partial" name="partial" value="1" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary indeterminate:border-primary indeterminate:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 peer-indeterminate:opacity-0 text-xs" aria-hidden="true"></i>
            <i class="bi bi-dash pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-100 peer-indeterminate:opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-foreground">Seleção parcial</span>
        </span>
    </label>
</div>
HTML;

    $reverseCode = <<<'BLADE'
<x-forms.checkbox reverse label="Checkbox à direita" name="rev_default" />
<x-forms.checkbox reverse variant="switch" label="Switch à esquerda" name="rev_switch" checked />
BLADE;

    $reverseHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-rev_default" name="rev_default" value="1" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-foreground">Checkbox à direita</span>
        </span>
    </label>
</div>
<label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
    <span class="relative mt-0.5 inline-flex shrink-0 items-center">
        <input type="checkbox" id="checkbox-rev_switch" role="switch" name="rev_switch" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0" />
        <span class="relative block rounded-full bg-muted transition-colors h-5 w-9 peer-checked:bg-primary peer-checked:[&>span]:translate-x-4 peer-focus-visible:ring-2 peer-focus-visible:ring-primary/40 peer-focus-visible:ring-offset-1">
            <span class="absolute rounded-full bg-white shadow-sm transition-transform top-0.5 left-0.5 size-4"></span>
        </span>
    </span>
    <span class="min-w-0 flex-1">
        <span class="block text-sm font-medium text-foreground">Switch à esquerda</span>
    </span>
</label>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.checkbox label="Sucesso" state="success" checked hint="Opção válida." />
<x-forms.checkbox label="Atenção" state="warning" hint="Revise esta escolha." />
<x-forms.checkbox label="Erro" name="agree" error="Você precisa aceitar para continuar." />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-1" value="1" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-success checked:bg-success focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-success/40 focus-visible:ring-offset-1" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-success-foreground opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-success">Sucesso</span>
        </span>
    </label>
    <div class="min-w-0">
        <p class="mb-0 text-xs text-muted-foreground">Opção válida.</p>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-2" value="1" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-warning checked:bg-warning focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-warning/40 focus-visible:ring-offset-1" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-warning-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-warning">Atenção</span>
        </span>
    </label>
    <div class="min-w-0">
        <p class="mb-0 text-xs text-muted-foreground">Revise esta escolha.</p>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-agree" name="agree" value="1" aria-invalid="true" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-danger checked:bg-danger focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-danger/40 focus-visible:ring-offset-1" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-danger-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-danger">Erro</span>
        </span>
    </label>
    <div class="min-w-0">
        <p class="mb-0 text-xs text-danger" role="alert">Você precisa aceitar para continuar.</p>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.checkbox label="Desabilitado" disabled />
<x-forms.checkbox label="Desabilitado marcado" disabled checked />
<x-forms.checkbox label="Somente leitura" readonly checked />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-not-allowed">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" value="1" disabled class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-foreground opacity-60">Desabilitado</span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-not-allowed">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" value="1" checked disabled class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-foreground opacity-60">Desabilitado marcado</span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-2.5 cursor-default">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" value="1" checked class="peer size-4 shrink-0 cursor-default appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-foreground">Somente leitura</span>
        </span>
    </label>
</div>
HTML;

    $uncheckedValueCode = <<<'BLADE'
<x-forms.checkbox
    label="Ativo"
    name="active"
    value="1"
    unchecked-value="0"
    hint="Envia 0 quando desmarcado."
/>
BLADE;

    $uncheckedValueHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" name="active" value="0" />
    <label class="flex items-start gap-2.5 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0">
            <input type="checkbox" id="checkbox-active" name="active" value="1" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1" />
            <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
        </span>
        <span class="min-w-0 flex-1">
            <span class="block text-sm font-medium text-foreground">Ativo</span>
        </span>
    </label>
    <div class="min-w-0">
        <p class="mb-0 text-xs text-muted-foreground">Envia 0 quando desmarcado.</p>
    </div>
</div>
HTML;

    $groupVerticalCode = <<<'BLADE'
<x-forms.checkbox.checkbox-group label="Interesses" name="interests" required hint="Escolha pelo menos uma opção.">
    <x-forms.checkbox label="Design" name="interests[]" value="design" />
    <x-forms.checkbox label="Desenvolvimento" name="interests[]" value="dev" checked />
    <x-forms.checkbox label="Marketing" name="interests[]" value="marketing" />
</x-forms.checkbox.checkbox-group>
BLADE;

    $groupVerticalHtml = <<<'HTML'
<fieldset class="flex w-full min-w-0 flex-col gap-2 border-0 p-0" aria-describedby="checkbox-group-interests-hint">
    <div class="flex items-center justify-between gap-3">
        <legend id="checkbox-group-interests-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">
            Interesses <span class="text-danger" aria-hidden="true">*</span>
        </legend>
    </div>
    <div role="group" class="flex flex-col gap-2.5" aria-labelledby="checkbox-group-interests-label">
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="interests[]" value="design" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Design</span></span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="interests[]" value="dev" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Desenvolvimento</span></span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="interests[]" value="marketing" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Marketing</span></span>
        </label>
    </div>
    <div class="min-w-0">
        <p id="checkbox-group-interests-hint" class="mb-0 text-xs text-muted-foreground">Escolha pelo menos uma opção.</p>
    </div>
</fieldset>
HTML;

    $groupHorizontalCode = <<<'BLADE'
<x-forms.checkbox.checkbox-group label="Dias" direction="horizontal" color="info">
    <x-forms.checkbox label="Seg" name="days[]" value="mon" />
    <x-forms.checkbox label="Ter" name="days[]" value="tue" checked />
    <x-forms.checkbox label="Qua" name="days[]" value="wed" />
    <x-forms.checkbox label="Qui" name="days[]" value="thu" />
    <x-forms.checkbox label="Sex" name="days[]" value="fri" checked />
</x-forms.checkbox.checkbox-group>
BLADE;

    $groupHorizontalHtml = <<<'HTML'
<fieldset class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <div class="flex items-center justify-between gap-3">
        <legend id="checkbox-group-days-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">Dias</legend>
    </div>
    <div role="group" class="flex flex-wrap gap-x-5 gap-y-2" aria-labelledby="checkbox-group-days-label">
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="days[]" value="mon" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-info checked:bg-info" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-info-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Seg</span></span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="days[]" value="tue" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-info checked:bg-info" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-info-foreground opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Ter</span></span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="days[]" value="wed" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-info checked:bg-info" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-info-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Qua</span></span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="days[]" value="thu" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-info checked:bg-info" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-info-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Qui</span></span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="days[]" value="fri" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-info checked:bg-info" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-info-foreground opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Sex</span></span>
        </label>
    </div>
</fieldset>
HTML;

    $groupSelectAllCode = <<<'BLADE'
<x-forms.checkbox.checkbox-group
    label="Permissões"
    select-all
    show-count
    select-all-label="Todas as permissões"
>
    <x-forms.checkbox label="Ler" name="perms[]" value="read" checked />
    <x-forms.checkbox label="Escrever" name="perms[]" value="write" />
    <x-forms.checkbox label="Excluir" name="perms[]" value="delete" />
</x-forms.checkbox.checkbox-group>
BLADE;

    $groupSelectAllHtml = <<<'HTML'
<fieldset class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <div class="flex items-center justify-between gap-3">
        <legend id="checkbox-group-perms-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">Permissões</legend>
        <span class="shrink-0 text-xs tabular-nums text-muted-foreground">1/3</span>
    </div>
    <div class="border-b border-border pb-2">
        <label class="inline-flex cursor-pointer items-center gap-2.5">
            <span class="relative inline-flex shrink-0">
                <input type="checkbox" data-checkbox-group-master="true" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card checked:border-primary checked:bg-primary indeterminate:border-primary indeterminate:bg-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary/40 focus-visible:ring-offset-1 disabled:cursor-not-allowed" aria-label="Todas as permissões" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-xs text-primary-foreground opacity-0 peer-checked:opacity-100 peer-indeterminate:opacity-0" aria-hidden="true"></i>
                <i class="bi bi-dash pointer-events-none absolute inset-0 flex items-center justify-center text-xs text-primary-foreground opacity-0 peer-indeterminate:opacity-100" aria-hidden="true"></i>
            </span>
            <span class="text-sm font-medium text-foreground">Todas as permissões</span>
        </label>
    </div>
    <div role="group" class="flex flex-col gap-2.5" aria-labelledby="checkbox-group-perms-label">
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="perms[]" value="read" checked class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Ler</span></span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="perms[]" value="write" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Escrever</span></span>
        </label>
        <label class="flex items-start gap-2.5 cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0">
                <input type="checkbox" name="perms[]" value="delete" class="peer size-4 shrink-0 cursor-pointer appearance-none rounded border border-border bg-card transition-colors checked:border-primary checked:bg-primary" />
                <i class="bi bi-check pointer-events-none absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 peer-checked:opacity-100 text-xs" aria-hidden="true"></i>
            </span>
            <span class="min-w-0 flex-1"><span class="block text-sm font-medium text-foreground">Excluir</span></span>
        </label>
    </div>
</fieldset>
HTML;

    $groupCardsCode = <<<'BLADE'
<x-forms.checkbox.checkbox-group label="Extras" variant="card" direction="horizontal">
    <x-forms.checkbox label="Backup diário" description="Retenção de 30 dias." name="extras[]" value="backup" icon="bi-cloud-arrow-up" />
    <x-forms.checkbox label="CDN global" description="Latência reduzida." name="extras[]" value="cdn" icon="bi-globe" checked />
</x-forms.checkbox.checkbox-group>
BLADE;

    $groupCardsHtml = <<<'HTML'
<fieldset class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <div class="flex items-center justify-between gap-3">
        <legend id="checkbox-group-extras-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">Extras</legend>
    </div>
    <div role="group" class="grid grid-cols-1 gap-3 sm:grid-cols-2" aria-labelledby="checkbox-group-extras-label">
        <label class="relative flex w-full cursor-pointer gap-3 rounded-xl border border-border bg-card p-4 shadow-sm transition-colors hover:bg-muted/40">
            <input type="checkbox" name="extras[]" value="backup" class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0" />
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center rounded border border-border bg-card transition-colors size-4" aria-hidden="true">
                <i class="bi bi-check absolute inset-0 flex items-center justify-center text-primary-foreground opacity-0 text-xs"></i>
            </span>
            <span class="min-w-0 flex-1">
                <span class="flex items-center gap-2 text-sm font-medium text-foreground">
                    <i class="bi bi-cloud-arrow-up leading-none text-muted-foreground" aria-hidden="true"></i>
                    <span>Backup diário</span>
                </span>
                <span class="mt-1 block text-xs text-muted-foreground">Retenção de 30 dias.</span>
            </span>
        </label>
        <label class="relative flex w-full cursor-pointer gap-3 rounded-xl border border-border bg-card p-4 shadow-sm transition-colors hover:bg-muted/40 has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30">
            <input type="checkbox" name="extras[]" value="cdn" checked class="peer absolute inset-0 z-10 m-0 size-full cursor-pointer opacity-0" />
            <span class="relative mt-0.5 inline-flex shrink-0 items-center justify-center rounded border border-border bg-card transition-colors size-4 peer-checked:[&_.bi-check]:opacity-100 peer-checked:border-primary peer-checked:bg-primary" aria-hidden="true">
                <i class="bi bi-check absolute inset-0 flex items-center justify-center text-primary-foreground opacity-100 text-xs"></i>
            </span>
            <span class="min-w-0 flex-1">
                <span class="flex items-center gap-2 text-sm font-medium text-foreground">
                    <i class="bi bi-globe leading-none text-muted-foreground" aria-hidden="true"></i>
                    <span>CDN global</span>
                </span>
                <span class="mt-1 block text-xs text-muted-foreground">Latência reduzida.</span>
            </span>
        </label>
    </div>
</fieldset>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.checkbox&gt;</code> cobre checkbox clássico, switch,
            botão e card — com label, descrição, hint, erro (via <code>$errors</code>),
            tamanhos, cores, indeterminate, reverse, readonly e
            <code>unchecked-value</code>. Use <code>&lt;x-forms.checkbox.checkbox-group&gt;</code>
            para legend, direção, select-all e contagem. Atributos como
            <code>wire:model</code> caem no <code>&lt;input&gt;</code>; <code>class</code> no wrapper.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Label + <code>name</code> para formulários HTML clássicos.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.checkbox label="Aceito os termos de uso" name="terms" />
            </div>
        </x-ui.example>

        <x-ui.example title="Slot como label" :code="$slotCode" :html="$slotHtml">
            <x-slot:description>
                O slot padrão aceita HTML rico (links, ênfase).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.checkbox name="privacy" required>
                    Li e aceito a <span class="text-primary underline">política de privacidade</span>
                </x-forms.checkbox>
            </div>
        </x-ui.example>

        <x-ui.example title="Descrição e hint" :code="$descriptionCode" :html="$descriptionHtml">
            <x-slot:description>
                <code>description</code> fica sob o label; <code>hint</code> sob o controle.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.checkbox
                    label="Receber novidades"
                    description="Enviaremos no máximo 1 e-mail por semana."
                    name="newsletter"
                    checked
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Indeterminate" :code="$indeterminateCode" :html="$indeterminateHtml">
            <x-slot:description>
                <code>indeterminate</code> usa Alpine para a propriedade DOM (hífen no box).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.checkbox label="Seleção parcial" name="partial" indeterminate />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code> (padrão) e <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.checkbox size="sm" label="Pequeno" name="s_sm" />
                <x-forms.checkbox size="md" label="Médio" name="s_md" />
                <x-forms.checkbox size="lg" label="Grande" name="s_lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Tokens do tema: <code>primary</code>, <code>success</code>, <code>warning</code>,
                <code>danger</code>, <code>info</code>, <code>secondary</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.checkbox color="primary" label="Primary" name="demo_color_primary" checked />
                <x-forms.checkbox color="success" label="Success" name="demo_color_success" checked />
                <x-forms.checkbox color="warning" label="Warning" name="demo_color_warning" checked />
                <x-forms.checkbox color="danger" label="Danger" name="demo_color_danger" checked />
                <x-forms.checkbox color="info" label="Info" name="demo_color_info" checked />
            </div>
        </x-ui.example>

        <x-ui.example title="Switch" :code="$switchCode" :html="$switchHtml">
            <x-slot:description>
                <code>variant="switch"</code> com <code>role="switch"</code> para toggles on/off.
            </x-slot:description>
            <div class="grid w-full max-w-xl grid-cols-1 gap-4 sm:grid-cols-2">
                <x-forms.checkbox variant="switch" label="Notificações push" name="push" checked />
                <x-forms.checkbox
                    variant="switch"
                    label="Modo escuro"
                    description="Aplica o tema escuro em todo o app."
                    name="dark"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Botão" :code="$buttonCode" :html="$buttonHtml">
            <x-slot:description>
                <code>variant="button"</code> — chips selecionáveis, ótimo com ícones.
            </x-slot:description>
            <div class="flex flex-wrap gap-2">
                <x-forms.checkbox variant="button" label="Laravel" name="stack[]" value="laravel" icon="bi-code-slash" checked />
                <x-forms.checkbox variant="button" label="Livewire" name="stack[]" value="livewire" icon="bi-lightning" />
                <x-forms.checkbox variant="button" label="Alpine" name="stack[]" value="alpine" icon="bi-wind" />
            </div>
        </x-ui.example>

        <x-ui.example title="Card" :code="$cardCode" :html="$cardHtml">
            <x-slot:description>
                <code>variant="card"</code> para opções com título + descrição.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-3 sm:grid-cols-2">
                <x-forms.checkbox
                    variant="card"
                    label="Plano Starter"
                    description="Até 3 projetos e suporte por e-mail."
                    name="plans[]"
                    value="starter"
                    icon="bi-rocket"
                    checked
                />
                <x-forms.checkbox
                    variant="card"
                    label="Plano Pro"
                    description="Projetos ilimitados e SLA."
                    name="plans[]"
                    value="pro"
                    icon="bi-stars"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Reverse" :code="$reverseCode" :html="$reverseHtml">
            <x-slot:description>
                <code>reverse</code> espelha o controle e o texto.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.checkbox reverse label="Checkbox à direita" name="rev_default" />
                <x-forms.checkbox reverse variant="switch" label="Switch à esquerda" name="rev_switch" checked />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados e erro" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> e <code>error</code> (força danger + <code>role="alert"</code>).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.checkbox label="Sucesso" state="success" checked hint="Opção válida." />
                <x-forms.checkbox label="Atenção" state="warning" hint="Revise esta escolha." />
                <x-forms.checkbox label="Erro" name="agree" error="Você precisa aceitar para continuar." />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>readonly</code> bloqueia o toggle via Alpine sem usar <code>disabled</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.checkbox label="Desabilitado" disabled />
                <x-forms.checkbox label="Desabilitado marcado" disabled checked />
                <x-forms.checkbox label="Somente leitura" readonly checked />
            </div>
        </x-ui.example>

        <x-ui.example title="Unchecked value" :code="$uncheckedValueCode" :html="$uncheckedValueHtml">
            <x-slot:description>
                <code>unchecked-value</code> injeta um <code>hidden</code> antes do checkbox.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.checkbox
                    label="Ativo"
                    name="active"
                    value="1"
                    unchecked-value="0"
                    hint="Envia 0 quando desmarcado."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Grupo vertical" :code="$groupVerticalCode" :html="$groupVerticalHtml">
            <x-slot:description>
                <code>&lt;x-forms.checkbox.checkbox-group&gt;</code> com legend, hint e props compartilhadas via <code>@@aware</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.checkbox.checkbox-group label="Interesses" name="interests" required hint="Escolha pelo menos uma opção.">
                    <x-forms.checkbox label="Design" name="interests[]" value="design" />
                    <x-forms.checkbox label="Desenvolvimento" name="interests[]" value="dev" checked />
                    <x-forms.checkbox label="Marketing" name="interests[]" value="marketing" />
                </x-forms.checkbox.checkbox-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Grupo horizontal" :code="$groupHorizontalCode" :html="$groupHorizontalHtml">
            <x-slot:description>
                <code>direction="horizontal"</code> + <code>color</code> herdada pelos filhos.
            </x-slot:description>
            <x-forms.checkbox.checkbox-group label="Dias" direction="horizontal" color="info">
                <x-forms.checkbox label="Seg" name="days[]" value="mon" />
                <x-forms.checkbox label="Ter" name="days[]" value="tue" checked />
                <x-forms.checkbox label="Qua" name="days[]" value="wed" />
                <x-forms.checkbox label="Qui" name="days[]" value="thu" />
                <x-forms.checkbox label="Sex" name="days[]" value="fri" checked />
            </x-forms.checkbox.checkbox-group>
        </x-ui.example>

        <x-ui.example title="Select all + contagem" :code="$groupSelectAllCode" :html="$groupSelectAllHtml">
            <x-slot:description>
                <code>select-all</code> e <code>show-count</code> (Alpine <code>formCheckboxGroup</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.checkbox.checkbox-group
                    label="Permissões"
                    select-all
                    show-count
                    select-all-label="Todas as permissões"
                >
                    <x-forms.checkbox label="Ler" name="perms[]" value="read" checked />
                    <x-forms.checkbox label="Escrever" name="perms[]" value="write" />
                    <x-forms.checkbox label="Excluir" name="perms[]" value="delete" />
                </x-forms.checkbox.checkbox-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Grupo de cards" :code="$groupCardsCode" :html="$groupCardsHtml">
            <x-slot:description>
                O grupo pode forçar <code>variant="card"</code> e layout em colunas.
            </x-slot:description>
            <x-forms.checkbox.checkbox-group label="Extras" variant="card" direction="horizontal">
                <x-forms.checkbox label="Backup diário" description="Retenção de 30 dias." name="extras[]" value="backup" icon="bi-cloud-arrow-up" />
                <x-forms.checkbox label="CDN global" description="Latência reduzida." name="extras[]" value="cdn" icon="bi-globe" checked />
            </x-forms.checkbox.checkbox-group>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-checkbox" />
</x-ui.docs>
