<?php

use Livewire\Component;

return new class extends Component
{
    public string $amount = '';

    public string $website = '';

    public string $coupon = '';

    public function applyCoupon(): void
    {
        $this->validate([
            'coupon' => ['required', 'min:3'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.input-group
    label="Website"
    prepend="https://"
    append=".com"
    name="website"
    placeholder="meusite"
/>
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Website</label>

    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">https://</div>
        <div class="input-group-control">
            <input type="text" name="website" placeholder="meusite" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
        <div class="input-group-text text-sm text-muted-foreground">.com</div>
    </div>
</div>
HTML;

    $composeCode = <<<'BLADE'
<x-forms.input-group label="Valor">
    <x-forms.input-group.input-group-text>R$</x-forms.input-group.input-group-text>
    <x-forms.input-group.input-group-input name="amount" placeholder="0,00" />
    <x-forms.input-group.input-group-text>,00</x-forms.input-group.input-group-text>
</x-forms.input-group>
BLADE;

    $composeHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Valor</label>

    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">R$</div>
        <div class="input-group-control">
            <input type="text" name="amount" placeholder="0,00" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
        <div class="input-group-text text-sm text-muted-foreground">,00</div>
    </div>
</div>
HTML;

    $iconCode = <<<'BLADE'
<x-forms.input-group label="Usuário">
    <x-forms.input-group.input-group-text icon="bi-person" />
    <x-forms.input-group.input-group-input name="username" placeholder="usuario" />
    <x-forms.input-group.input-group-text icon="bi-check-lg" />
</x-forms.input-group>
BLADE;

    $iconHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Usuário</label>

    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">
            <i class="bi bi-person leading-none"></i>
        </div>
        <div class="input-group-control">
            <input type="text" name="username" placeholder="usuario" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
        <div class="input-group-text text-sm text-muted-foreground">
            <i class="bi bi-check-lg leading-none"></i>
        </div>
    </div>
</div>
HTML;

    $buttonCode = <<<'BLADE'
<x-forms.input-group label="Cupom">
    <x-forms.input-group.input-group-input name="coupon" placeholder="CÓDIGO" />
    <x-ui.button color="primary" type="button">Aplicar</x-ui.button>
</x-forms.input-group>

<x-forms.input-group label="Busca">
    <x-forms.input-group.input-group-input name="q" placeholder="Pesquisar…" icon="bi-search" />
    <x-ui.button color="secondary" variant="outline" type="button" icon="bi-search" iconOnly aria-label="Buscar" />
</x-forms.input-group>
BLADE;

    $buttonHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Cupom</label>

    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-control">
            <input type="text" name="coupon_demo" placeholder="CÓDIGO" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
        <button type="button" class="btn btn-primary">Aplicar</button>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Busca</label>

    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-control">
            <span class="inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-search leading-none text-sm"></i>
            </span>
            <input type="text" name="q_demo" placeholder="Pesquisar…" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
        <button type="button" class="btn btn-outline-secondary" aria-label="Buscar">
            <i class="bi bi-search"></i>
        </button>
    </div>
</div>
HTML;

    $bothButtonsCode = <<<'BLADE'
<x-forms.input-group label="Mensagem">
    <x-ui.button color="secondary" variant="outline" type="button" icon="bi-emoji-smile" iconOnly aria-label="Emoji" />
    <x-forms.input-group.input-group-input name="message" placeholder="Escreva uma mensagem…" />
    <x-ui.button color="primary" type="button" icon="bi-send" iconOnly aria-label="Enviar" />
</x-forms.input-group>
BLADE;

    $bothButtonsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Mensagem</label>

    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <button type="button" class="btn btn-outline-secondary" aria-label="Emoji">
            <i class="bi bi-emoji-smile"></i>
        </button>
        <div class="input-group-control">
            <input type="text" name="message" placeholder="Escreva uma mensagem…" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
        <button type="button" class="btn btn-primary" aria-label="Enviar">
            <i class="bi bi-send"></i>
        </button>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.input-group size="sm" label="Pequeno" prepend="@" placeholder="handle" />
<x-forms.input-group size="md" label="Médio" prepend="@" placeholder="handle" />
<x-forms.input-group size="lg" label="Grande" prepend="@" placeholder="handle" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-xs font-medium text-foreground">Pequeno</label>
    <div role="group" class="input-group input-group-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-xs text-muted-foreground">@</div>
        <div class="input-group-control">
            <input type="text" placeholder="handle" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Médio</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">@</div>
        <div class="input-group-control">
            <input type="text" placeholder="handle" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Grande</label>
    <div role="group" class="input-group input-group-lg focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">@</div>
        <div class="input-group-control">
            <input type="text" placeholder="handle" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.input-group variant="default" label="Default" prepend="https://" placeholder="site" />
<x-forms.input-group variant="filled" label="Filled" prepend="https://" placeholder="site" />
<x-forms.input-group variant="flush" label="Flush" prepend="https://" placeholder="site" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Default</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">https://</div>
        <div class="input-group-control">
            <input type="text" placeholder="site" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Filled</label>
    <div role="group" class="input-group input-group-filled focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">https://</div>
        <div class="input-group-control">
            <input type="text" placeholder="site" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Flush</label>
    <div role="group" class="input-group input-group-flush">
        <div class="input-group-text text-sm text-muted-foreground">https://</div>
        <div class="input-group-control">
            <input type="text" placeholder="site" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.input-group label="Sucesso" state="success" prepend="@" value="ok" hint="Disponível." />
<x-forms.input-group label="Atenção" state="warning" prepend="@" value="talvez" hint="Confira." />
<x-forms.input-group label="Erro" state="danger" prepend="@" value="x" error="Já existe." />
<x-forms.input-group label="Info" state="info" prepend="@" value="dica" hint="Informação." />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Sucesso</label>
    <div role="group" class="input-group input-group-success focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success">
        <div class="input-group-text text-sm text-muted-foreground">@</div>
        <div class="input-group-control">
            <input type="text" value="ok" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Disponível.</p>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Atenção</label>
    <div role="group" class="input-group input-group-warning focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-warning focus-within:ring-warning">
        <div class="input-group-text text-sm text-muted-foreground">@</div>
        <div class="input-group-control">
            <input type="text" value="talvez" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Confira.</p>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Erro</label>
    <div role="group" class="input-group input-group-danger focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger">
        <div class="input-group-text text-sm text-muted-foreground">@</div>
        <div class="input-group-control">
            <input type="text" value="x" aria-invalid="true" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
    <p class="mb-0 text-xs text-danger" role="alert">Já existe.</p>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Info</label>
    <div role="group" class="input-group input-group-info focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-info focus-within:ring-info">
        <div class="input-group-text text-sm text-muted-foreground">@</div>
        <div class="input-group-control">
            <input type="text" value="dica" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Informação.</p>
</div>
HTML;

    $checkboxCode = <<<'BLADE'
<x-forms.input-group label="Com checkbox">
    <x-forms.input-group.input-group-text>
        <input type="checkbox" name="agree" value="1" aria-label="Confirmar" />
    </x-forms.input-group.input-group-text>
    <x-forms.input-group.input-group-input name="terms_note" placeholder="Observação" />
</x-forms.input-group>

<x-forms.input-group label="Com radio">
    <x-forms.input-group.input-group-text>
        <input type="radio" name="plan" value="pro" aria-label="Plano Pro" />
    </x-forms.input-group.input-group-text>
    <x-forms.input-group.input-group-input name="plan_label" placeholder="Pro" />
</x-forms.input-group>
BLADE;

    $checkboxHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Com checkbox</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">
            <input type="checkbox" name="agree" value="1" aria-label="Confirmar">
        </div>
        <div class="input-group-control">
            <input type="text" name="terms_note" placeholder="Observação" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Com radio</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">
            <input type="radio" name="plan" value="pro" aria-label="Plano Pro">
        </div>
        <div class="input-group-control">
            <input type="text" name="plan_label" placeholder="Pro" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
HTML;

    $multipleCode = <<<'BLADE'
<x-forms.input-group label="Nome completo">
    <x-forms.input-group.input-group-input name="first_name" placeholder="Nome" class="max-w-[40%]" />
    <x-forms.input-group.input-group-input name="last_name" placeholder="Sobrenome" />
</x-forms.input-group>
BLADE;

    $multipleHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Nome completo</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-control">
            <input type="text" name="first_name" placeholder="Nome" class="max-w-[40%] min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
        <div class="input-group-control">
            <input type="text" name="last_name" placeholder="Sobrenome" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
HTML;

    $featuresCode = <<<'BLADE'
<x-forms.input-group label="Senha">
    <x-forms.input-group.input-group-text icon="bi-lock" />
    <x-forms.input-group.input-group-input type="password" name="demo_password" placeholder="••••••••" />
</x-forms.input-group>

<x-forms.input-group label="Tag">
    <x-forms.input-group.input-group-text>#</x-forms.input-group.input-group-text>
    <x-forms.input-group.input-group-input name="tag" :maxlength="40" counter placeholder="Até 40 caracteres" />
</x-forms.input-group>
BLADE;

    $featuresHtml = <<<'HTML'
<form onsubmit="return false;" class="flex w-full max-w-md flex-col gap-4">
    <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Senha</label>
        <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="input-group-text text-sm text-muted-foreground">
                <i class="bi bi-lock leading-none"></i>
            </div>
            <div class="input-group-control">
                <input type="password" name="demo_password" placeholder="••••••••" autocomplete="new-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Tag</label>
        <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="input-group-text text-sm text-muted-foreground">#</div>
            <div class="input-group-control">
                <input type="text" name="tag" maxlength="40" placeholder="Até 40 caracteres" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                <span class="shrink-0 tabular-nums text-muted-foreground text-sm">0/40</span>
            </div>
        </div>
    </div>
</form>
HTML;

    $passwordClearCode = <<<'BLADE'
<x-forms.input-group label="Senha">
    <x-forms.input-group.input-group-text icon="bi-lock" />
    <x-forms.input-group.input-group-input type="password" name="secret" placeholder="••••••••" />
</x-forms.input-group>

<x-forms.input-group label="Buscar" clearable icon="bi-search" placeholder="Limpar com X" value="texto" />
BLADE;

    $passwordClearHtml = <<<'HTML'
<form onsubmit="return false;" class="flex w-full max-w-md flex-col gap-4">
    <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Senha</label>
        <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="input-group-text text-sm text-muted-foreground">
                <i class="bi bi-lock leading-none"></i>
            </div>
            <div class="input-group-control">
                <input type="password" name="secret" placeholder="••••••••" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                <button type="button" class="flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha">
                    <i class="bi bi-eye text-sm leading-none"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Buscar</label>
        <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="input-group-control">
                <span class="inline-flex shrink-0 items-center justify-center text-muted-foreground">
                    <i class="bi bi-search leading-none text-sm"></i>
                </span>
                <input type="text" placeholder="Limpar com X" value="texto" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                <button type="button" class="flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar">
                    <i class="bi bi-x-lg text-xs leading-none"></i>
                </button>
            </div>
        </div>
    </div>
</form>
HTML;

    $roundedCode = <<<'BLADE'
<x-forms.input-group rounded label="Pill" prepend="@" placeholder="handle" />
BLADE;

    $roundedHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Pill</label>
    <div role="group" class="input-group input-group-rounded focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">@</div>
        <div class="input-group-control">
            <input type="text" placeholder="handle" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.input-group label="Desabilitado" disabled prepend="@" value="bloqueado" />
<x-forms.input-group label="Loading">
    <x-forms.input-group.input-group-text icon="bi-link-45deg" />
    <x-forms.input-group.input-group-input loading placeholder="Salvando…" />
</x-forms.input-group>
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Desabilitado</label>
    <div role="group" class="input-group input-group-disabled focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">@</div>
        <div class="input-group-control">
            <input type="text" value="bloqueado" disabled class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Loading</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">
            <i class="bi bi-link-45deg leading-none"></i>
        </div>
        <div class="input-group-control">
            <input type="text" placeholder="Salvando…" disabled class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground"></span>
        </div>
    </div>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.input-group color="primary" label="Primary" prepend="#" placeholder="focus" />
<x-forms.input-group color="success" label="Success" prepend="#" placeholder="focus" />
<x-forms.input-group color="warning" label="Warning" prepend="#" placeholder="focus" />
<x-forms.input-group color="danger" label="Danger" prepend="#" placeholder="focus" />
<x-forms.input-group color="info" label="Info" prepend="#" placeholder="focus" />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Primary</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="input-group-text text-sm text-muted-foreground">#</div>
        <div class="input-group-control">
            <input type="text" placeholder="focus" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Success</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success">
        <div class="input-group-text text-sm text-muted-foreground">#</div>
        <div class="input-group-control">
            <input type="text" placeholder="focus" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Warning</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-warning focus-within:ring-warning">
        <div class="input-group-text text-sm text-muted-foreground">#</div>
        <div class="input-group-control">
            <input type="text" placeholder="focus" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Danger</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger">
        <div class="input-group-text text-sm text-muted-foreground">#</div>
        <div class="input-group-control">
            <input type="text" placeholder="focus" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Info</label>
    <div role="group" class="input-group focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-info focus-within:ring-info">
        <div class="input-group-text text-sm text-muted-foreground">#</div>
        <div class="input-group-control">
            <input type="text" placeholder="focus" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
        </div>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O <code>&lt;x-forms.input-group&gt;</code> agrupa texto, ícones, botões e um ou mais
            <code>&lt;x-forms.input-group.input-group-input&gt;</code> num controle visualmente conectado
            . Use o modo conveniência com
            <code>prepend</code>/<code>append</code>, ou compose com
            <code>&lt;x-forms.input-group.input-group-text&gt;</code>, inputs e
            <code>&lt;x-ui.button&gt;</code>. Props <code>size</code>/<code>color</code>/
            <code>state</code>/<code>variant</code>/<code>rounded</code>/<code>disabled</code>
            fluem para os filhos via <code>@@aware</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Conveniência (prepend / append)" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Sem slot default: <code>prepend</code> e <code>append</code> geram addons de texto
                em volta do controle. Atributos como <code>name</code>/<code>wire:model</code>
                vão para o input.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-group
                    label="Website"
                    prepend="https://"
                    append=".com"
                    name="website"
                    placeholder="meusite"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Composição" :code="$composeCode" :html="$composeHtml">
            <x-slot:description>
                Filhos explícitos: <code>input-group-text</code> + <code>input-group-input</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-group label="Valor">
                    <x-forms.input-group.input-group-text>R$</x-forms.input-group.input-group-text>
                    <x-forms.input-group.input-group-input name="amount" placeholder="0,00" />
                    <x-forms.input-group.input-group-text>,00</x-forms.input-group.input-group-text>
                </x-forms.input-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Ícones no addon" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                <code>icon</code> em <code>&lt;x-forms.input-group.input-group-text&gt;</code> (Bootstrap Icons).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-group label="Usuário">
                    <x-forms.input-group.input-group-text icon="bi-person" />
                    <x-forms.input-group.input-group-input name="username" placeholder="usuario" />
                    <x-forms.input-group.input-group-text icon="bi-check-lg" />
                </x-forms.input-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Com botão" :code="$buttonCode" :html="$buttonHtml">
            <x-slot:description>
                <code>&lt;x-ui.button&gt;</code> como filho direto do grupo — cantos e altura
                alinhados via CSS (<code>.input-group &gt; .btn</code>).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.input-group label="Cupom">
                    <x-forms.input-group.input-group-input name="coupon_demo" placeholder="CÓDIGO" />
                    <x-ui.button color="primary" type="button">Aplicar</x-ui.button>
                </x-forms.input-group>

                <x-forms.input-group label="Busca">
                    <x-forms.input-group.input-group-input name="q_demo" placeholder="Pesquisar…" icon="bi-search" />
                    <x-ui.button color="secondary" variant="outline" type="button" icon="bi-search" iconOnly aria-label="Buscar" />
                </x-forms.input-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Botões nas duas pontas" :code="$bothButtonsCode" :html="$bothButtonsHtml">
            <x-slot:description>
                Botão + input + botão — útil para actions de mensagem ou toolbar inline.
            </x-slot:description>
            <div class="w-full max-w-xl">
                <x-forms.input-group label="Mensagem">
                    <x-ui.button color="secondary" variant="outline" type="button" icon="bi-emoji-smile" iconOnly aria-label="Emoji" />
                    <x-forms.input-group.input-group-input name="message" placeholder="Escreva uma mensagem…" />
                    <x-ui.button color="primary" type="button" icon="bi-send" iconOnly aria-label="Enviar" />
                </x-forms.input-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code> no grupo redimensiona textos, controle e botões filhos.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-group size="sm" label="Pequeno" prepend="@" placeholder="handle" />
                <x-forms.input-group size="md" label="Médio" prepend="@" placeholder="handle" />
                <x-forms.input-group size="lg" label="Grande" prepend="@" placeholder="handle" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>default</code>, <code>filled</code> e <code>flush</code> (underline).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-group variant="default" label="Default" prepend="https://" placeholder="site" />
                <x-forms.input-group variant="filled" label="Filled" prepend="https://" placeholder="site" />
                <x-forms.input-group variant="flush" label="Flush" prepend="https://" placeholder="site" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> ou <code>error</code> pintam a borda de todo o grupo.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.input-group label="Sucesso" state="success" prepend="@" value="ok" hint="Disponível." />
                <x-forms.input-group label="Atenção" state="warning" prepend="@" value="talvez" hint="Confira." />
                <x-forms.input-group label="Erro" state="danger" prepend="@" value="x" error="Já existe." />
                <x-forms.input-group label="Info" state="info" prepend="@" value="dica" hint="Informação." />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores de foco" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> controla o anel de foco quando não há <code>state</code>/<code>error</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-5">
                <x-forms.input-group color="primary" label="Primary" prepend="#" placeholder="focus" />
                <x-forms.input-group color="success" label="Success" prepend="#" placeholder="focus" />
                <x-forms.input-group color="warning" label="Warning" prepend="#" placeholder="focus" />
                <x-forms.input-group color="danger" label="Danger" prepend="#" placeholder="focus" />
                <x-forms.input-group color="info" label="Info" prepend="#" placeholder="focus" />
            </div>
        </x-ui.example>

        <x-ui.example title="Checkbox e radio" :code="$checkboxCode" :html="$checkboxHtml">
            <x-slot:description>
                Coloque <code>checkbox</code>/<code>radio</code> dentro de
                <code>input-group-text</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.input-group label="Com checkbox">
                    <x-forms.input-group.input-group-text>
                        <input type="checkbox" name="agree" value="1" aria-label="Confirmar" />
                    </x-forms.input-group.input-group-text>
                    <x-forms.input-group.input-group-input name="terms_note" placeholder="Observação" />
                </x-forms.input-group>

                <x-forms.input-group label="Com radio">
                    <x-forms.input-group.input-group-text>
                        <input type="radio" name="plan" value="pro" aria-label="Plano Pro" />
                    </x-forms.input-group.input-group-text>
                    <x-forms.input-group.input-group-input name="plan_label" placeholder="Pro" />
                </x-forms.input-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Múltiplos inputs" :code="$multipleCode" :html="$multipleHtml">
            <x-slot:description>
                Dois <code>input-group-input</code> no mesmo grupo (nome + sobrenome).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-group label="Nome completo">
                    <x-forms.input-group.input-group-input name="first_name" placeholder="Nome" class="max-w-[40%]" />
                    <x-forms.input-group.input-group-input name="last_name" placeholder="Sobrenome" />
                </x-forms.input-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Senha, clearable e contador" :code="$passwordClearCode" :html="$passwordClearHtml">
            <x-slot:description>
                O controle herda toggle de senha, <code>clearable</code> e contador do
                <code>formInput</code> Alpine (mesmo do <code>&lt;x-forms.input&gt;</code>).
            </x-slot:description>
            <form onsubmit="return false;" class="flex w-full max-w-md flex-col gap-4">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-group label="Senha">
                    <x-forms.input-group.input-group-text icon="bi-lock" />
                    <x-forms.input-group.input-group-input type="password" name="secret" placeholder="••••••••" />
                </x-forms.input-group>

                <x-forms.input-group label="Buscar" clearable icon="bi-search" placeholder="Limpar com X" value="texto" />
            </form>
        </x-ui.example>

        <x-ui.example title="Features no controle" :code="$featuresCode" :html="$featuresHtml">
            <x-slot:description>
                Contador e ícones convivem com os addons do grupo.
            </x-slot:description>
            <form onsubmit="return false;" class="flex w-full max-w-md flex-col gap-4">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-group label="Senha">
                    <x-forms.input-group.input-group-text icon="bi-lock" />
                    <x-forms.input-group.input-group-input type="password" name="demo_password" placeholder="••••••••" />
                </x-forms.input-group>

                <x-forms.input-group label="Tag">
                    <x-forms.input-group.input-group-text>#</x-forms.input-group.input-group-text>
                    <x-forms.input-group.input-group-input name="tag" :maxlength="40" counter placeholder="Até 40 caracteres" />
                </x-forms.input-group>
            </form>
        </x-ui.example>

        <x-ui.example title="Pill / rounded" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code> aplica cantos pill nas extremidades do grupo.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-group rounded label="Pill" prepend="@" placeholder="handle" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled e loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> no grupo; <code>loading</code> no controle.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-group label="Desabilitado" disabled prepend="@" value="bloqueado" />
                <x-forms.input-group label="Loading">
                    <x-forms.input-group.input-group-text icon="bi-link-45deg" />
                    <x-forms.input-group.input-group-input loading placeholder="Salvando…" />
                </x-forms.input-group>
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-input-group" />
</x-ui.docs>
