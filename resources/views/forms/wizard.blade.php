<?php

use Livewire\Component;

return new class extends Component
{
    public string $step = 'account';

    public string $name = '';

    public string $email = '';

    public string $company = '';

    public string $role = '';

    public string $bio = '';

    public bool $terms = false;

    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'min:2'],
            'email' => ['required', 'email'],
            'company' => ['required', 'min:2'],
            'role' => ['required'],
            'terms' => ['accepted'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.wizard card default="account">
    <x-forms.wizard.wizard-step name="account" title="Conta" description="Dados de acesso." icon="bi-person">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <x-forms.input label="Nome" name="name" required class="sm:col-span-2" />
            <x-forms.input label="E-mail" type="email" name="email" required class="sm:col-span-2" />
        </div>
    </x-forms.wizard.wizard-step>

    <x-forms.wizard.wizard-step name="profile" title="Perfil" description="Sobre você." icon="bi-card-text">
        <x-forms.textarea label="Bio" name="bio" rows="3" />
    </x-forms.wizard.wizard-step>

    <x-forms.wizard.wizard-step name="confirm" title="Confirmar" description="Revise e envie." icon="bi-check2-circle">
        <x-forms.checkbox label="Aceito os termos" name="terms" required />
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $pillsCode = <<<'BLADE'
<x-forms.wizard card variant="pills" default="profile" color="primary">
    <x-forms.wizard.wizard-step name="profile" title="Perfil" description="Informações básicas" icon="bi-person">
        <p class="mb-0 text-sm text-muted-foreground">Estilo pills: marcador + label lado a lado.</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="payment" title="Pagamento" description="Dados do cartão" icon="bi-credit-card">
        <p class="mb-0 text-sm text-muted-foreground">Concluídas ficam em success (check verde).</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="done" title="Pronto" description="Tudo certo" icon="bi-check-lg">
        <p class="mb-0 text-sm text-muted-foreground">Última etapa.</p>
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $verticalCode = <<<'BLADE'
<x-forms.wizard
    card
    orientation="vertical"
    show-step-index
    default="general"
    color="primary"
>
    <x-forms.wizard.wizard-step name="general" title="General" description="Product info" icon="bi-box">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <x-forms.input label="Product name" name="product" class="sm:col-span-2" />
            <x-forms.input label="SKU" name="sku" />
            <x-forms.input label="Price" name="price" />
        </div>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="description" title="Description" description="Details" icon="bi-text-left">
        <x-forms.textarea label="Description" name="desc" rows="4" />
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="shipping" title="Shipping" description="Delivery" icon="bi-truck">
        <x-forms.input label="Address" name="address" />
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="confirm" title="Confirm" description="Review" icon="bi-check2-circle">
        <p class="mb-0 text-sm text-muted-foreground">Confirme os dados e conclua.</p>
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $bottomCode = <<<'BLADE'
<x-forms.wizard card label-placement="bottom" default="a" color="info">
    <x-forms.wizard.wizard-step name="a" title="Início" description="Primeiro passo">
        <p class="mb-0 text-sm text-muted-foreground">Labels abaixo do marcador (estilo clássico).</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="b" title="Meio" description="Segundo passo">
        <p class="mb-0 text-sm text-muted-foreground">Linha conectora entre as etapas.</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="c" title="Fim" description="Último passo">
        <p class="mb-0 text-sm text-muted-foreground">Pronto.</p>
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $progressCode = <<<'BLADE'
<x-forms.wizard card default="one" variant="progress" color="success" show-progress>
    <x-forms.wizard.wizard-step name="one" title="Início">
        <p class="mb-0 text-sm text-muted-foreground">Barra de progresso no topo.</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="two" title="Meio">
        <p class="mb-0 text-sm text-muted-foreground">Etapa intermediária.</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="three" title="Fim">
        <p class="mb-0 text-sm text-muted-foreground">Última etapa.</p>
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $dotsCode = <<<'BLADE'
<x-forms.wizard card default="a" variant="dots" color="info">
    <x-forms.wizard.wizard-step name="a" title="Um" :heading="false">
        <p class="mb-0 text-sm text-muted-foreground">Indicadores em pontos.</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="b" title="Dois" :heading="false">
        <p class="mb-0 text-sm text-muted-foreground">Compacto para fluxos curtos.</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="c" title="Três" :heading="false">
        <p class="mb-0 text-sm text-muted-foreground">Último passo.</p>
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $simpleCode = <<<'BLADE'
<x-forms.wizard card default="details" variant="simple" color="secondary" orientation="vertical">
    <x-forms.wizard.wizard-step name="details" title="Detalhes">
        <x-forms.input label="Título" name="title" />
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="extras" title="Extras" optional>
        <x-forms.input label="Observação" name="note" />
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="review" title="Revisão">
        <p class="mb-0 text-sm text-muted-foreground">Confira e envie.</p>
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $clickableCode = <<<'BLADE'
<x-forms.wizard card default="one" clickable :linear="false" color="primary">
    <x-forms.wizard.wizard-step name="one" title="Um" icon="bi-1-circle">
        <p class="mb-0 text-sm text-muted-foreground">Navegação livre entre etapas.</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="two" title="Dois" icon="bi-2-circle">
        <p class="mb-0 text-sm text-muted-foreground">Clique no header para pular.</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="three" title="Três" icon="bi-3-circle">
        <p class="mb-0 text-sm text-muted-foreground">Sem bloqueio linear.</p>
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $optionalCode = <<<'BLADE'
<x-forms.wizard card default="required" color="primary">
    <x-forms.wizard.wizard-step name="required" title="Obrigatório" icon="bi-asterisk">
        <x-forms.input label="Nome" name="opt_name" required />
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="extra" title="Extra" description="Pode pular." icon="bi-plus-circle" optional>
        <x-forms.input label="Cupom" name="coupon" />
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="end" title="Fim" icon="bi-flag">
        <p class="mb-0 text-sm text-muted-foreground">Etapa final.</p>
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $validateCode = <<<'BLADE'
<x-forms.wizard card default="contact" validate color="danger">
    <x-forms.wizard.wizard-step name="contact" title="Contato" icon="bi-envelope">
        <x-forms.input label="E-mail" type="email" name="val_email" required />
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="done" title="Pronto" icon="bi-check">
        <p class="mb-0 text-sm text-muted-foreground">Só avança com e-mail válido (HTML5).</p>
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $customActionsCode = <<<'BLADE'
<x-forms.wizard card default="a" color="primary">
    <x-slot:actions>
        <div class="flex w-full flex-wrap items-center justify-between gap-2">
            <x-ui.button type="button" variant="ghost" color="secondary" x-on:click="previous()" x-bind:disabled="isFirst">
                Anterior
            </x-ui.button>
            <div class="flex gap-2">
                <x-ui.button type="button" variant="outline" color="secondary" x-show="! isLast" x-on:click="next()">
                    Continuar
                </x-ui.button>
                <x-ui.button type="button" color="success" x-show="isLast" x-on:click="finish()">
                    Finalizar cadastro
                </x-ui.button>
            </div>
        </div>
    </x-slot:actions>

    <x-forms.wizard.wizard-step name="a" title="Passo A" :heading="false">
        <p class="mb-0 text-sm text-muted-foreground">Footer 100% custom via slot actions.</p>
    </x-forms.wizard.wizard-step>
    <x-forms.wizard.wizard-step name="b" title="Passo B" :heading="false">
        <p class="mb-0 text-sm text-muted-foreground">Botões usam a API Alpine do wizard.</p>
    </x-forms.wizard.wizard-step>
</x-forms.wizard>
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm">
    <div class="shrink-0 border-b border-border px-5 py-4 sm:px-6">
        <nav aria-label="Assistente">
            <ol class="flex w-full flex-row flex-wrap items-center gap-x-6 gap-y-4">
                <li class="relative flex min-w-0 flex-1 items-center">
                    <div class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"></div>
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-primary text-sm font-semibold text-primary-foreground transition-all">
                            <i class="bi bi-person leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-primary">Conta</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Dados de acesso.</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 items-center">
                    <div class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"></div>
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-card-text leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Perfil</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Sobre você.</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 items-center">
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-check2-circle leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Confirmar</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Revise e envie.</span>
                        </span>
                    </button>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <div class="mb-4">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-semibold text-foreground">Conta</h3>
                </div>
                <p class="mt-1 mb-0 text-sm text-muted-foreground">Dados de acesso.</p>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="flex flex-col gap-1.5 sm:col-span-2">
                    <label class="text-sm font-medium text-foreground">Nome<span class="text-danger" aria-hidden="true">*</span></label>
                    <input type="text" class="w-full rounded-lg border border-border bg-card px-3 py-1.5 text-sm shadow-sm">
                </div>
                <div class="flex flex-col gap-1.5 sm:col-span-2">
                    <label class="text-sm font-medium text-foreground">E-mail<span class="text-danger" aria-hidden="true">*</span></label>
                    <input type="email" class="w-full rounded-lg border border-border bg-card px-3 py-1.5 text-sm shadow-sm">
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex min-h-9 flex-wrap items-center gap-2"></div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-primary"><i class="bi bi-arrow-right" aria-hidden="true"></i> Próximo</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $pillsHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm">
    <div class="shrink-0 border-b border-border px-5 py-4 sm:px-6">
        <nav aria-label="Assistente">
            <ol class="flex w-full flex-row flex-wrap items-center gap-x-6 gap-y-4">
                <li class="relative flex min-w-0 flex-1 items-center">
                    <div class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"></div>
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-primary text-sm font-semibold text-primary-foreground transition-all">
                            <i class="bi bi-person leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-primary">Perfil</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Informações básicas</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 items-center">
                    <div class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"></div>
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-credit-card leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Pagamento</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Dados do cartão</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 items-center">
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-check-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Pronto</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Tudo certo</span>
                        </span>
                    </button>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <div class="mb-4">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-semibold text-foreground">Perfil</h3>
                </div>
                <p class="mt-1 mb-0 text-sm text-muted-foreground">Informações básicas</p>
            </div>
            <p class="mb-0 text-sm text-muted-foreground">Estilo pills: marcador + label lado a lado.</p>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex min-h-9 flex-wrap items-center gap-2"></div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-primary"><i class="bi bi-arrow-right" aria-hidden="true"></i> Próximo</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $verticalHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm lg:flex-row">
    <div class="shrink-0 border-b border-border px-5 py-4 lg:w-56 lg:border-b-0 lg:border-e lg:px-4 lg:py-6">
        <nav aria-label="Assistente">
            <ol class="flex w-full flex-col gap-4">
                <li class="relative flex min-w-0 w-full">
                    <button type="button" class="relative z-10 flex min-w-0 w-full items-center gap-2.5 rounded-md px-2 py-2 text-left transition-colors hover:bg-muted/70">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-primary text-sm font-semibold text-primary-foreground transition-all">
                            <i class="bi bi-box leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="mb-0.5 block text-[0.6875rem] font-medium uppercase tracking-wide text-muted-foreground">Etapa 1</span>
                            <span class="block text-sm font-medium text-primary">General</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Product info</span>
                        </span>
                    </button>
                </li>
                <div class="ms-4 w-px flex-1 bg-border" style="min-height: 0.75rem"></div>
                <li class="relative flex min-w-0 w-full">
                    <button type="button" class="relative z-10 flex min-w-0 w-full items-center gap-2.5 rounded-md px-2 py-2 text-left transition-colors hover:bg-muted/70">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-text-left leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="mb-0.5 block text-[0.6875rem] font-medium uppercase tracking-wide text-muted-foreground">Etapa 2</span>
                            <span class="block text-sm font-medium text-muted-foreground">Description</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Details</span>
                        </span>
                    </button>
                </li>
                <div class="ms-4 w-px flex-1 bg-border" style="min-height: 0.75rem"></div>
                <li class="relative flex min-w-0 w-full">
                    <button type="button" class="relative z-10 flex min-w-0 w-full items-center gap-2.5 rounded-md px-2 py-2 text-left transition-colors hover:bg-muted/70">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-truck leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="mb-0.5 block text-[0.6875rem] font-medium uppercase tracking-wide text-muted-foreground">Etapa 3</span>
                            <span class="block text-sm font-medium text-muted-foreground">Shipping</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Delivery</span>
                        </span>
                    </button>
                </li>
                <div class="ms-4 w-px flex-1 bg-border" style="min-height: 0.75rem"></div>
                <li class="relative flex min-w-0 w-full">
                    <button type="button" class="relative z-10 flex min-w-0 w-full items-center gap-2.5 rounded-md px-2 py-2 text-left transition-colors hover:bg-muted/70">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-check2-circle leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="mb-0.5 block text-[0.6875rem] font-medium uppercase tracking-wide text-muted-foreground">Etapa 4</span>
                            <span class="block text-sm font-medium text-muted-foreground">Confirm</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Review</span>
                        </span>
                    </button>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <div class="mb-4">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-semibold text-foreground">General</h3>
                </div>
                <p class="mt-1 mb-0 text-sm text-muted-foreground">Product info</p>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="flex flex-col gap-1.5 sm:col-span-2">
                    <label class="text-sm font-medium text-foreground">Product name</label>
                    <input type="text" class="w-full rounded-lg border border-border bg-card px-3 py-1.5 text-sm shadow-sm">
                </div>
                <div class="flex flex-col gap-1.5">
                    <label class="text-sm font-medium text-foreground">SKU</label>
                    <input type="text" class="w-full rounded-lg border border-border bg-card px-3 py-1.5 text-sm shadow-sm">
                </div>
                <div class="flex flex-col gap-1.5">
                    <label class="text-sm font-medium text-foreground">Price</label>
                    <input type="text" class="w-full rounded-lg border border-border bg-card px-3 py-1.5 text-sm shadow-sm">
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex min-h-9 flex-wrap items-center gap-2"></div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-primary"><i class="bi bi-arrow-right" aria-hidden="true"></i> Próximo</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $bottomHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm">
    <div class="shrink-0 border-b border-border px-5 py-4 sm:px-6">
        <nav aria-label="Assistente">
            <ol class="flex w-full flex-row flex-wrap items-center gap-x-6 gap-y-4">
                <li class="relative flex min-w-0 flex-1 flex-col items-center">
                    <div class="absolute top-4 right-0 left-0 -z-0 hidden items-center px-[calc(50%+1.25rem)] sm:flex">
                        <div class="h-px w-full bg-border transition-colors"></div>
                    </div>
                    <button type="button" class="relative z-10 flex min-w-0 flex-col items-center gap-2.5 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-info text-sm font-semibold text-info-foreground transition-all">
                            <span>1</span>
                        </span>
                        <span class="mt-2 min-w-0 text-center">
                            <span class="block text-sm font-medium text-info">Início</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Primeiro passo</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 flex-col items-center">
                    <div class="absolute top-4 right-0 left-0 -z-0 hidden items-center px-[calc(50%+1.25rem)] sm:flex">
                        <div class="h-px w-full bg-border transition-colors"></div>
                    </div>
                    <button type="button" class="relative z-10 flex min-w-0 flex-col items-center gap-2.5 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <span>2</span>
                        </span>
                        <span class="mt-2 min-w-0 text-center">
                            <span class="block text-sm font-medium text-muted-foreground">Meio</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Segundo passo</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 flex-col items-center">
                    <button type="button" class="relative z-10 flex min-w-0 flex-col items-center gap-2.5 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <span>3</span>
                        </span>
                        <span class="mt-2 min-w-0 text-center">
                            <span class="block text-sm font-medium text-muted-foreground">Fim</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Último passo</span>
                        </span>
                    </button>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <div class="mb-4">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-semibold text-foreground">Início</h3>
                </div>
                <p class="mt-1 mb-0 text-sm text-muted-foreground">Primeiro passo</p>
            </div>
            <p class="mb-0 text-sm text-muted-foreground">Labels abaixo do marcador (estilo clássico).</p>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex min-h-9 flex-wrap items-center gap-2"></div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-info"><i class="bi bi-arrow-right" aria-hidden="true"></i> Próximo</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $progressHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm">
    <div class="shrink-0 border-b border-border px-5 py-4 sm:px-6">
        <div>
            <div class="mb-2 flex items-center justify-between gap-3">
                <span class="text-xs font-medium text-muted-foreground">1 / 3</span>
                <span class="text-xs font-medium text-muted-foreground">0%</span>
            </div>
            <div class="h-1.5 overflow-hidden rounded-full bg-muted" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="bg-success h-full rounded-full transition-all duration-300 ease-out" style="width: 0%"></div>
            </div>
        </div>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <div class="mb-4">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-semibold text-foreground">Início</h3>
                </div>
            </div>
            <p class="mb-0 text-sm text-muted-foreground">Barra de progresso no topo.</p>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex min-h-9 flex-wrap items-center gap-2"></div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-success"><i class="bi bi-arrow-right" aria-hidden="true"></i> Próximo</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $dotsHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm">
    <div class="shrink-0 border-b border-border px-5 py-4 sm:px-6">
        <nav aria-label="Assistente">
            <ol class="flex w-full justify-center gap-2">
                <li class="relative flex min-w-0 items-center">
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 text-left transition-colors">
                        <span class="size-3 rounded-full bg-info ring-4 ring-info/20 transition-all"></span>
                        <span class="sr-only">Um</span>
                    </button>
                </li>
                <li class="relative flex min-w-0 items-center">
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 text-left transition-colors">
                        <span class="size-3 rounded-full bg-border transition-all"></span>
                        <span class="sr-only">Dois</span>
                    </button>
                </li>
                <li class="relative flex min-w-0 items-center">
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 text-left transition-colors">
                        <span class="size-3 rounded-full bg-border transition-all"></span>
                        <span class="sr-only">Três</span>
                    </button>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <p class="mb-0 text-sm text-muted-foreground">Indicadores em pontos.</p>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex min-h-9 flex-wrap items-center gap-2"></div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-info"><i class="bi bi-arrow-right" aria-hidden="true"></i> Próximo</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $simpleHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm lg:flex-row">
    <div class="shrink-0 border-b border-border px-5 py-4 lg:w-56 lg:border-b-0 lg:border-e lg:px-4 lg:py-6">
        <nav aria-label="Assistente">
            <ol class="flex w-full flex-col gap-1">
                <li class="relative flex min-w-0 w-full">
                    <button type="button" class="relative z-10 flex min-w-0 w-full items-center gap-2.5 rounded-md px-2 py-2 text-left transition-colors hover:bg-muted/70">
                        <span class="size-9 inline-flex shrink-0 items-center justify-center rounded-full border border-transparent bg-secondary text-sm font-semibold text-secondary-foreground transition-all">1</span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-secondary">Detalhes</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 w-full">
                    <button type="button" class="relative z-10 flex min-w-0 w-full items-center gap-2.5 rounded-md px-2 py-2 text-left transition-colors hover:bg-muted/70">
                        <span class="size-9 inline-flex shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">2</span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Extras</span>
                            <span class="text-[0.6875rem] text-muted-foreground">Opcional</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 w-full">
                    <button type="button" class="relative z-10 flex min-w-0 w-full items-center gap-2.5 rounded-md px-2 py-2 text-left transition-colors hover:bg-muted/70">
                        <span class="size-9 inline-flex shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">3</span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Revisão</span>
                        </span>
                    </button>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <div class="mb-4">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-semibold text-foreground">Detalhes</h3>
                </div>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-sm font-medium text-foreground">Título</label>
                <input type="text" class="w-full rounded-lg border border-border bg-card px-3 py-1.5 text-sm shadow-sm">
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex min-h-9 flex-wrap items-center gap-2"></div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-secondary"><i class="bi bi-arrow-right" aria-hidden="true"></i> Próximo</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $clickableHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm">
    <div class="shrink-0 border-b border-border px-5 py-4 sm:px-6">
        <nav aria-label="Assistente">
            <ol class="flex w-full flex-row flex-wrap items-center gap-x-6 gap-y-4">
                <li class="relative flex min-w-0 flex-1 items-center">
                    <div class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"></div>
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-primary text-sm font-semibold text-primary-foreground transition-all">
                            <i class="bi bi-1-circle leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-primary">Um</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 items-center">
                    <div class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"></div>
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-2-circle leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Dois</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 items-center">
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-3-circle leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Três</span>
                        </span>
                    </button>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <div class="mb-4">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-semibold text-foreground">Um</h3>
                </div>
            </div>
            <p class="mb-0 text-sm text-muted-foreground">Navegação livre entre etapas.</p>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex min-h-9 flex-wrap items-center gap-2"></div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-primary"><i class="bi bi-arrow-right" aria-hidden="true"></i> Próximo</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $optionalHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm">
    <div class="shrink-0 border-b border-border px-5 py-4 sm:px-6">
        <nav aria-label="Assistente">
            <ol class="flex w-full flex-row flex-wrap items-center gap-x-6 gap-y-4">
                <li class="relative flex min-w-0 flex-1 items-center">
                    <div class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"></div>
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-primary text-sm font-semibold text-primary-foreground transition-all">
                            <i class="bi bi-asterisk leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-primary">Obrigatório</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 items-center">
                    <div class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"></div>
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-plus-circle leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Extra</span>
                            <span class="mt-0.5 block text-xs leading-snug text-muted-foreground">Pode pular.</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 items-center">
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-flag leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Fim</span>
                        </span>
                    </button>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <div class="mb-4">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-semibold text-foreground">Obrigatório</h3>
                </div>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-sm font-medium text-foreground">Nome<span class="text-danger" aria-hidden="true">*</span></label>
                <input type="text" class="w-full rounded-lg border border-border bg-card px-3 py-1.5 text-sm shadow-sm">
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex min-h-9 flex-wrap items-center gap-2"></div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-primary"><i class="bi bi-arrow-right" aria-hidden="true"></i> Próximo</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $validateHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm">
    <div class="shrink-0 border-b border-border px-5 py-4 sm:px-6">
        <nav aria-label="Assistente">
            <ol class="flex w-full flex-row flex-wrap items-center gap-x-6 gap-y-4">
                <li class="relative flex min-w-0 flex-1 items-center">
                    <div class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"></div>
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-danger text-sm font-semibold text-danger-foreground transition-all">
                            <i class="bi bi-envelope leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-danger">Contato</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 items-center">
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <i class="bi bi-check leading-none" aria-hidden="true"></i>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Pronto</span>
                        </span>
                    </button>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <div class="mb-4">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="text-base font-semibold text-foreground">Contato</h3>
                </div>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-sm font-medium text-foreground">E-mail<span class="text-danger" aria-hidden="true">*</span></label>
                <input type="email" class="w-full rounded-lg border border-border bg-card px-3 py-1.5 text-sm shadow-sm">
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex min-h-9 flex-wrap items-center gap-2"></div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-danger"><i class="bi bi-arrow-right" aria-hidden="true"></i> Próximo</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $customActionsHtml = <<<'HTML'
<div class="flex w-full flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm">
    <div class="shrink-0 border-b border-border px-5 py-4 sm:px-6">
        <nav aria-label="Assistente">
            <ol class="flex w-full flex-row flex-wrap items-center gap-x-6 gap-y-4">
                <li class="relative flex min-w-0 flex-1 items-center">
                    <div class="absolute top-1/2 right-0 left-[calc(100%-1.5rem)] hidden h-px -translate-y-1/2 bg-border sm:block"></div>
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-primary text-sm font-semibold text-primary-foreground transition-all">
                            <span>1</span>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-primary">Passo A</span>
                        </span>
                    </button>
                </li>
                <li class="relative flex min-w-0 flex-1 items-center">
                    <button type="button" class="relative z-10 flex min-w-0 items-center gap-2.5 pe-6 text-left transition-colors">
                        <span class="relative inline-flex size-9 shrink-0 items-center justify-center rounded-full border border-transparent bg-muted text-sm font-semibold text-muted-foreground transition-all">
                            <span>2</span>
                        </span>
                        <span class="min-w-0 flex-1">
                            <span class="block text-sm font-medium text-muted-foreground">Passo B</span>
                        </span>
                    </button>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex min-w-0 flex-1 flex-col">
        <div class="min-h-24 flex-1 px-5 py-6 sm:px-6">
            <p class="mb-0 text-sm text-muted-foreground">Footer 100% custom via slot actions.</p>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-border px-5 py-4 sm:px-6">
            <div class="flex w-full flex-wrap items-center justify-between gap-2">
                <button type="button" class="btn btn-ghost-secondary" disabled>Anterior</button>
                <div class="flex gap-2">
                    <button type="button" class="btn btn-outline-secondary">Continuar</button>
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
            O <code>&lt;x-forms.wizard&gt;</code> é um stepper multi-etapa: header com marcador + título/descrição lado a lado,
            etapas concluídas em <code>success</code>, pendentes em <code>bg-muted</code>,
            layout <code>card</code> (header / body / footer) e vertical com sidebar.
            Variantes: <code>steps</code>, <code>pills</code>, <code>progress</code>,
            <code>dots</code>, <code>simple</code>. Validação HTML5 por etapa, navegação linear
            ou livre, Livewire via <code>wire:model</code> + <code>x-modelable="active"</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico (card)" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                <code>card</code> envolve header, conteúdo e footer. Labels
                <code>inline</code> (padrão). Concluídas viram check verde.
            </x-slot:description>
            <div class="w-full">
                <x-forms.wizard card default="account">
                    <x-forms.wizard.wizard-step name="account" title="Conta" description="Dados de acesso." icon="bi-person">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-forms.input label="Nome" name="name" required class="sm:col-span-2" />
                            <x-forms.input label="E-mail" type="email" name="email" required class="sm:col-span-2" />
                        </div>
                    </x-forms.wizard.wizard-step>

                    <x-forms.wizard.wizard-step name="profile" title="Perfil" description="Sobre você." icon="bi-card-text">
                        <x-forms.textarea label="Bio" name="bio" rows="3" />
                    </x-forms.wizard.wizard-step>

                    <x-forms.wizard.wizard-step name="confirm" title="Confirmar" description="Revise e envie." icon="bi-check2-circle">
                        <x-forms.checkbox label="Aceito os termos" name="terms" required />
                    </x-forms.wizard.wizard-step>
                </x-forms.wizard>
            </div>
        </x-ui.example>

        <x-ui.example title="Pills" :code="$pillsCode" :html="$pillsHtml">
            <x-slot:description>
                <code>variant="pills"</code> — navegação compacta estilo stepper.
            </x-slot:description>
            <x-forms.wizard card variant="pills" default="profile" color="primary">
                <x-forms.wizard.wizard-step name="profile" title="Perfil" description="Informações básicas" icon="bi-person">
                    <p class="mb-0 text-sm text-muted-foreground">Estilo pills: marcador + label lado a lado.</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="payment" title="Pagamento" description="Dados do cartão" icon="bi-credit-card">
                    <p class="mb-0 text-sm text-muted-foreground">Concluídas ficam em success (check verde).</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="done" title="Pronto" description="Tudo certo" icon="bi-check-lg">
                    <p class="mb-0 text-sm text-muted-foreground">Última etapa.</p>
                </x-forms.wizard.wizard-step>
            </x-forms.wizard>
        </x-ui.example>

        <x-ui.example title="Vertical (Form Layout)" :code="$verticalCode" :html="$verticalHtml">
            <x-slot:description>
                Sidebar + conteúdo, com sidebar + conteúdo.
                <code>show-step-index</code> exibe “Etapa N” acima do título.
            </x-slot:description>
            <x-forms.wizard
                card
                orientation="vertical"
                show-step-index
                default="general"
                color="primary"
            >
                <x-forms.wizard.wizard-step name="general" title="General" description="Product info" icon="bi-box">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <x-forms.input label="Product name" name="product" class="sm:col-span-2" />
                        <x-forms.input label="SKU" name="sku" />
                        <x-forms.input label="Price" name="price" />
                    </div>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="description" title="Description" description="Details" icon="bi-text-left">
                    <x-forms.textarea label="Description" name="desc" rows="4" />
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="shipping" title="Shipping" description="Delivery" icon="bi-truck">
                    <x-forms.input label="Address" name="address" />
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="confirm" title="Confirm" description="Review" icon="bi-check2-circle">
                    <p class="mb-0 text-sm text-muted-foreground">Confirme os dados e conclua.</p>
                </x-forms.wizard.wizard-step>
            </x-forms.wizard>
        </x-ui.example>

        <x-ui.example title="Labels embaixo" :code="$bottomCode" :html="$bottomHtml">
            <x-slot:description>
                <code>label-placement="bottom"</code> para o estilo clássico centrado.
            </x-slot:description>
            <x-forms.wizard card label-placement="bottom" default="a" color="info">
                <x-forms.wizard.wizard-step name="a" title="Início" description="Primeiro passo">
                    <p class="mb-0 text-sm text-muted-foreground">Labels abaixo do marcador.</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="b" title="Meio" description="Segundo passo">
                    <p class="mb-0 text-sm text-muted-foreground">Linha conectora entre as etapas.</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="c" title="Fim" description="Último passo">
                    <p class="mb-0 text-sm text-muted-foreground">Pronto.</p>
                </x-forms.wizard.wizard-step>
            </x-forms.wizard>
        </x-ui.example>

        <x-ui.example title="Progress" :code="$progressCode" :html="$progressHtml">
            <x-slot:description>
                <code>variant="progress"</code> — só a barra + contador.
            </x-slot:description>
            <x-forms.wizard card default="one" variant="progress" color="success" show-progress>
                <x-forms.wizard.wizard-step name="one" title="Início">
                    <p class="mb-0 text-sm text-muted-foreground">Barra de progresso no topo.</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="two" title="Meio">
                    <p class="mb-0 text-sm text-muted-foreground">Etapa intermediária.</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="three" title="Fim">
                    <p class="mb-0 text-sm text-muted-foreground">Última etapa.</p>
                </x-forms.wizard.wizard-step>
            </x-forms.wizard>
        </x-ui.example>

        <x-ui.example title="Dots" :code="$dotsCode" :html="$dotsHtml">
            <x-slot:description>
                <code>variant="dots"</code> — indicadores mínimos.
            </x-slot:description>
            <x-forms.wizard card default="a" variant="dots" color="info">
                <x-forms.wizard.wizard-step name="a" title="Um" :heading="false">
                    <p class="mb-0 text-sm text-muted-foreground">Indicadores em pontos.</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="b" title="Dois" :heading="false">
                    <p class="mb-0 text-sm text-muted-foreground">Compacto para fluxos curtos.</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="c" title="Três" :heading="false">
                    <p class="mb-0 text-sm text-muted-foreground">Último passo.</p>
                </x-forms.wizard.wizard-step>
            </x-forms.wizard>
        </x-ui.example>

        <x-ui.example title="Simple vertical" :code="$simpleCode" :html="$simpleHtml">
            <x-slot:description>
                Lista textual com números. <code>optional</code> não bloqueia o avanço.
            </x-slot:description>
            <x-forms.wizard card default="details" variant="simple" color="secondary" orientation="vertical">
                <x-forms.wizard.wizard-step name="details" title="Detalhes">
                    <x-forms.input label="Título" name="title" />
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="extras" title="Extras" optional>
                    <x-forms.input label="Observação" name="note" />
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="review" title="Revisão">
                    <p class="mb-0 text-sm text-muted-foreground">Confira e envie.</p>
                </x-forms.wizard.wizard-step>
            </x-forms.wizard>
        </x-ui.example>

        <x-ui.example title="Navegação livre" :code="$clickableCode" :html="$clickableHtml">
            <x-slot:description>
                <code>clickable</code> + <code>:linear="false"</code>.
            </x-slot:description>
            <x-forms.wizard card default="one" clickable :linear="false" color="primary">
                <x-forms.wizard.wizard-step name="one" title="Um" icon="bi-1-circle">
                    <p class="mb-0 text-sm text-muted-foreground">Navegação livre entre etapas.</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="two" title="Dois" icon="bi-2-circle">
                    <p class="mb-0 text-sm text-muted-foreground">Clique no header para pular.</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="three" title="Três" icon="bi-3-circle">
                    <p class="mb-0 text-sm text-muted-foreground">Sem bloqueio linear.</p>
                </x-forms.wizard.wizard-step>
            </x-forms.wizard>
        </x-ui.example>

        <x-ui.example title="Etapa opcional" :code="$optionalCode" :html="$optionalHtml">
            <x-slot:description>
                <code>optional</code> não bloqueia o avanço linear.
            </x-slot:description>
            <x-forms.wizard card default="required" color="primary">
                <x-forms.wizard.wizard-step name="required" title="Obrigatório" icon="bi-asterisk">
                    <x-forms.input label="Nome" name="opt_name" required />
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="extra" title="Extra" description="Pode pular." icon="bi-plus-circle" optional>
                    <x-forms.input label="Cupom" name="coupon" />
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="end" title="Fim" icon="bi-flag">
                    <p class="mb-0 text-sm text-muted-foreground">Etapa final.</p>
                </x-forms.wizard.wizard-step>
            </x-forms.wizard>
        </x-ui.example>

        <x-ui.example title="Validação HTML5" :code="$validateCode" :html="$validateHtml">
            <x-slot:description>
                <code>next()</code>/<code>finish()</code> validam só os campos da etapa atual.
            </x-slot:description>
            <x-forms.wizard card default="contact" validate color="danger">
                <x-forms.wizard.wizard-step name="contact" title="Contato" icon="bi-envelope">
                    <x-forms.input label="E-mail" type="email" name="val_email" required />
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="done" title="Pronto" icon="bi-check">
                    <p class="mb-0 text-sm text-muted-foreground">Só avança com e-mail válido.</p>
                </x-forms.wizard.wizard-step>
            </x-forms.wizard>
        </x-ui.example>

        <x-ui.example title="Ações custom" :code="$customActionsCode" :html="$customActionsHtml">
            <x-slot:description>
                Slot <code>actions</code> substitui o footer.
            </x-slot:description>
            <x-forms.wizard card default="a" color="primary">
                <x-slot:actions>
                    <div class="flex w-full flex-wrap items-center justify-between gap-2">
                        <x-ui.button type="button" variant="ghost" color="secondary" x-on:click="previous()" x-bind:disabled="isFirst">
                            Anterior
                        </x-ui.button>
                        <div class="flex gap-2">
                            <x-ui.button type="button" variant="outline" color="secondary" x-show="! isLast" x-cloak x-on:click="next()">
                                Continuar
                            </x-ui.button>
                            <x-ui.button type="button" color="success" x-show="isLast" x-cloak x-on:click="finish()">
                                Finalizar cadastro
                            </x-ui.button>
                        </div>
                    </div>
                </x-slot:actions>

                <x-forms.wizard.wizard-step name="a" title="Passo A" :heading="false">
                    <p class="mb-0 text-sm text-muted-foreground">Footer 100% custom via slot actions.</p>
                </x-forms.wizard.wizard-step>
                <x-forms.wizard.wizard-step name="b" title="Passo B" :heading="false">
                    <p class="mb-0 text-sm text-muted-foreground">Botões usam a API Alpine do wizard.</p>
                </x-forms.wizard.wizard-step>
            </x-forms.wizard>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-wizard" />
</x-ui.docs>
