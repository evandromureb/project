<?php

use Livewire\Component;

return new class extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $search = '';

    public string $bio = '';

    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);
    }
};
?>

@php
    // Heredocs com fechamento na coluna 0 — evita ParseError de indentação
    // flexível do PHP quando o Livewire extrai a view SFC.
    $basicCode = <<<'BLADE'
<x-forms.input label="Nome" name="name" placeholder="Digite seu nome" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-name" class="text-sm font-medium text-foreground">Nome</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-name" name="name" placeholder="Digite seu nome" autocomplete="name" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>
HTML;

    $typesCode = <<<'BLADE'
<form onsubmit="return false;" class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
    <x-forms.input type="email" label="E-mail" name="demo_email" autocomplete="username" placeholder="voce@empresa.com" icon="bi-envelope" />
    <x-forms.input type="password" label="Senha" name="demo_password" placeholder="••••••••" />
    <x-forms.input type="search" label="Buscar" name="demo_search" placeholder="Pesquisar…" icon="bi-search" />
    <x-forms.input type="tel" label="Telefone" name="demo_tel" placeholder="(11) 99999-9999" icon="bi-telephone" />
    <x-forms.input type="url" label="Site" name="demo_url" placeholder="https://" icon="bi-link-45deg" />
    <x-forms.input type="number" label="Quantidade" name="demo_qty" placeholder="0" icon="bi-hash" />
</form>
BLADE;

    $typesHtml = <<<'HTML'
<form class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-demo_email" class="text-sm font-medium text-foreground">E-mail</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-envelope leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="email" id="input-demo_email" name="demo_email" placeholder="voce@empresa.com" autocomplete="username" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col gap-1.5">
        <label for="input-demo_password" class="text-sm font-medium text-foreground">Senha</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                <div class="relative min-w-0 flex-1">
                    <input type="password" id="input-demo_password" name="demo_password" placeholder="••••••••" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha">
                    <i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col gap-1.5">
        <label for="input-demo_search" class="text-sm font-medium text-foreground">Buscar</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-search leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="search" id="input-demo_search" name="demo_search" placeholder="Pesquisar…" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col gap-1.5">
        <label for="input-demo_tel" class="text-sm font-medium text-foreground">Telefone</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-telephone leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="tel" id="input-demo_tel" name="demo_tel" placeholder="(11) 99999-9999" autocomplete="tel" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col gap-1.5">
        <label for="input-demo_url" class="text-sm font-medium text-foreground">Site</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-link-45deg leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="url" id="input-demo_url" name="demo_url" placeholder="https://" autocomplete="url" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col gap-1.5">
        <label for="input-demo_qty" class="text-sm font-medium text-foreground">Quantidade</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                    <i class="bi bi-hash leading-none text-sm"></i>
                </span>
                <div class="relative min-w-0 flex-1">
                    <input type="number" id="input-demo_qty" name="demo_qty" placeholder="0" autocomplete="off" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
</form>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.input size="sm" label="Pequeno" placeholder="size=sm" />
<x-forms.input size="md" label="Médio" placeholder="size=md" />
<x-forms.input size="lg" label="Grande" placeholder="size=lg" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-sm" class="text-xs font-medium text-foreground">Pequeno</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-8 text-xs px-2.5 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-sm" placeholder="size=sm" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-md" class="text-sm font-medium text-foreground">Médio</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-md" placeholder="size=md" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-lg" class="text-sm font-medium text-foreground">Grande</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-11 text-base px-3.5 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-lg" placeholder="size=lg" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.input variant="default" label="Default" placeholder="Borda + fundo do card" />
<x-forms.input variant="filled" label="Filled" placeholder="Fundo muted" />
<x-forms.input variant="flush" label="Flush" placeholder="Somente underline" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-default" class="text-sm font-medium text-foreground">Default</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-default" placeholder="Borda + fundo do card" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-filled" class="text-sm font-medium text-foreground">Filled</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border border-transparent bg-muted shadow-none border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-filled" placeholder="Fundo muted" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-flush" class="text-sm font-medium text-foreground">Flush</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-none border-0 border-b border-border bg-transparent shadow-none focus-within:ring-0 focus-within:border-b-2 border-border focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-flush" placeholder="Somente underline" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>
HTML;

    $iconsCode = <<<'BLADE'
<x-forms.input label="Usuário" icon="bi-person" placeholder="usuario" />
<x-forms.input label="Valor" icon="bi-currency-dollar" icon-position="end" placeholder="0,00" />
BLADE;

    $iconsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-usuario" class="text-sm font-medium text-foreground">Usuário</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                <i class="bi bi-person leading-none text-sm"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-usuario" placeholder="usuario" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-valor" class="text-sm font-medium text-foreground">Valor</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-valor" placeholder="0,00" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                <i class="bi bi-currency-dollar leading-none text-sm"></i>
            </span>
        </div>
    </div>
</div>
HTML;

    $prefixSuffixCode = <<<'BLADE'
<x-forms.input label="Usuário" prefix="@" placeholder="handle" />
<x-forms.input label="Site" suffix=".com.br" placeholder="empresa" />
<x-forms.input label="Preço" prefix="R$" suffix=",00" placeholder="99" />
BLADE;

    $prefixSuffixHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-usuario2" class="text-sm font-medium text-foreground">Usuário</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">@</span>
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-usuario2" placeholder="handle" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-site" class="text-sm font-medium text-foreground">Site</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-site" placeholder="empresa" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">.com.br</span>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-preco" class="text-sm font-medium text-foreground">Preço</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">R$</span>
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-preco" placeholder="99" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <span class="relative z-10 shrink-0 select-none text-sm text-muted-foreground">,00</span>
        </div>
    </div>
</div>
HTML;

    $addonsCode = <<<'BLADE'
<x-forms.input label="Website" placeholder="meusite">
    <x-slot:addon-start>https://</x-slot:addon-start>
    <x-slot:addon-end>.com</x-slot:addon-end>
</x-forms.input>

<x-forms.input label="Cupom" placeholder="CÓDIGO">
    <x-slot:addon-end class="border-0 bg-transparent p-0">
        <button type="button" class="btn btn-primary h-full rounded-none rounded-r-lg px-4">Aplicar</button>
    </x-slot:addon-end>
</x-forms.input>
BLADE;

    $addonsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-website" class="text-sm font-medium text-foreground">Website</label>
    <div class="flex w-full items-stretch rounded-lg focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground h-9.5 px-3 text-sm [&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none [&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none border border-r-0 rounded-l-lg">https://</div>
        <div class="group/input relative flex min-w-0 flex-1 items-center gap-2 transition-colors border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text rounded-l-none rounded-r-none">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-website" placeholder="meusite" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
        <div class="box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground h-9.5 px-3 text-sm [&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none [&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none border border-l-0 rounded-r-lg">.com</div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-cupom" class="text-sm font-medium text-foreground">Cupom</label>
    <div class="flex w-full items-stretch rounded-lg focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="group/input relative flex min-w-0 flex-1 items-center gap-2 transition-colors border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text rounded-r-none">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-cupom" placeholder="CÓDIGO" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
        <div class="box-border inline-flex shrink-0 items-center border-border bg-muted font-medium text-muted-foreground h-9.5 px-3 text-sm [&_.btn]:h-full [&_.btn]:min-h-0 [&_.btn]:rounded-none [&_.btn]:shadow-none [&_button]:h-full [&_button]:min-h-0 [&_button]:rounded-none border border-l-0 rounded-r-lg border-0 bg-transparent p-0">
            <button type="button" class="btn btn-primary h-full rounded-none rounded-r-lg px-4">Aplicar</button>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.input label="Sucesso" state="success" value="tudo certo" hint="Campo válido." />
<x-forms.input label="Atenção" state="warning" value="revisar" hint="Confira este valor." />
<x-forms.input label="Erro" state="danger" value="inválido" error="Este campo é obrigatório." />
<x-forms.input label="Info" state="info" value="dica" hint="Informação adicional." />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-sucesso" class="text-sm font-medium text-foreground">Sucesso</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-success focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-sucesso" value="tudo certo" aria-describedby="input-sucesso-hint" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-sucesso-hint" class="mb-0 text-xs text-muted-foreground">Campo válido.</p>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-atencao" class="text-sm font-medium text-foreground">Atenção</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-warning focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-warning focus-within:ring-warning h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-atencao" value="revisar" aria-describedby="input-atencao-hint" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-atencao-hint" class="mb-0 text-xs text-muted-foreground">Confira este valor.</p>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-erro" class="text-sm font-medium text-foreground">Erro</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-danger focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-erro" value="inválido" aria-describedby="input-erro-error" aria-invalid="true" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-erro-error" class="mb-0 text-xs text-danger" role="alert">Este campo é obrigatório.</p>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-info" class="text-sm font-medium text-foreground">Info</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-info focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-info focus-within:ring-info h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-info" value="dica" aria-describedby="input-info-hint" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-info-hint" class="mb-0 text-xs text-muted-foreground">Informação adicional.</p>
        </div>
    </div>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.input color="primary" label="Primary" placeholder="focus ring" />
<x-forms.input color="success" label="Success" placeholder="focus ring" />
<x-forms.input color="warning" label="Warning" placeholder="focus ring" />
<x-forms.input color="danger" label="Danger" placeholder="focus ring" />
<x-forms.input color="info" label="Info" placeholder="focus ring" />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-primary" class="text-sm font-medium text-foreground">Primary</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-primary" placeholder="focus ring" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-success" class="text-sm font-medium text-foreground">Success</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-success" placeholder="focus ring" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-warning" class="text-sm font-medium text-foreground">Warning</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-warning focus-within:ring-warning h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-warning" placeholder="focus ring" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-danger" class="text-sm font-medium text-foreground">Danger</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-danger" placeholder="focus ring" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-info-color" class="text-sm font-medium text-foreground">Info</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-info focus-within:ring-info h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-info-color" placeholder="focus ring" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>
HTML;

    $passwordCode = <<<'BLADE'
<form onsubmit="return false;" class="flex flex-col gap-4">
    <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
    <x-forms.input type="password" label="Senha" name="password" placeholder="Digite a senha" />
    <x-forms.input type="password" label="Sem toggle" name="password_plain" :password-toggle="false" autocomplete="new-password" placeholder="••••••••" />
</form>
BLADE;

    $passwordHtml = <<<'HTML'
<form class="flex w-full max-w-md flex-col gap-4">
    <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">

    <div class="flex w-full flex-col gap-1.5">
        <label for="input-password" class="text-sm font-medium text-foreground">Senha</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                <div class="relative min-w-0 flex-1">
                    <input type="password" id="input-password" name="password" placeholder="Digite a senha" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha">
                    <i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="flex w-full flex-col gap-1.5">
        <label for="input-password_plain" class="text-sm font-medium text-foreground">Sem toggle</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                <div class="relative min-w-0 flex-1">
                    <input type="password" id="input-password_plain" name="password_plain" placeholder="••••••••" autocomplete="new-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
                </div>
            </div>
        </div>
    </div>
</form>
HTML;

    $clearableCode = <<<'BLADE'
<x-forms.input label="Buscar" clearable value="texto para limpar" icon="bi-search" />
BLADE;

    $clearableHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-buscar" class="text-sm font-medium text-foreground">Buscar</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                <i class="bi bi-search leading-none text-sm"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-buscar" value="texto para limpar" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar">
                <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
HTML;

    $floatingCode = <<<'BLADE'
<x-forms.input floating label="E-mail" type="email" />
<x-forms.input floating label="Nome completo" required />
BLADE;

    $floatingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text">
            <div class="relative h-full min-w-0 flex-1">
                <input type="email" id="input-email-floating" placeholder=" " class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                <label for="input-email-floating" class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1/2 -translate-y-1/2 text-sm">E-mail</label>
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text">
            <div class="relative h-full min-w-0 flex-1">
                <input type="text" id="input-nome-completo" placeholder=" " required class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                <label for="input-nome-completo" class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1/2 -translate-y-1/2 text-sm">
                    Nome completo
                    <span class="text-danger" aria-hidden="true">*</span>
                </label>
            </div>
        </div>
    </div>
</div>
HTML;

    $counterCode = <<<'BLADE'
<x-forms.input label="Bio" :maxlength="80" counter placeholder="Até 80 caracteres" />
BLADE;

    $counterHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-bio" class="text-sm font-medium text-foreground">Bio</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-bio" placeholder="Até 80 caracteres" maxlength="80" aria-describedby="input-bio-counter" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p id="input-bio-counter" class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0/80</p>
    </div>
</div>
HTML;

    $roundedCode = <<<'BLADE'
<x-forms.input rounded label="Pill" placeholder="rounded" icon="bi-search" />
BLADE;

    $roundedHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-pill" class="text-sm font-medium text-foreground">Pill</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-full border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                <i class="bi bi-search leading-none text-sm"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-pill" placeholder="rounded" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.input label="Desabilitado" disabled value="somente leitura visual" />
<x-forms.input label="Readonly" readonly value="não editável" />
<x-forms.input label="Loading" loading placeholder="Salvando…" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-desabilitado" class="text-sm font-medium text-foreground">Desabilitado</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-not-allowed opacity-60">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-desabilitado" value="somente leitura visual" disabled class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-readonly" class="text-sm font-medium text-foreground">Readonly</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-readonly" value="não editável" readonly class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>

<div class="flex w-full flex-col gap-1.5">
    <label for="input-loading" class="text-sm font-medium text-foreground">Loading</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-not-allowed opacity-60">
            <div class="relative min-w-0 flex-1">
                <input type="text" id="input-loading" placeholder="Salvando…" disabled class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <span class="relative z-10 size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
        </div>
    </div>
</div>
HTML;

    $hintRequiredCode = <<<'BLADE'
<x-forms.input
    label="E-mail corporativo"
    type="email"
    required
    hint="Usaremos este e-mail para notificações."
    placeholder="voce@empresa.com"
/>
BLADE;

    $hintRequiredHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-email-corp" class="text-sm font-medium text-foreground">
        E-mail corporativo
        <span class="text-danger" aria-hidden="true">*</span>
    </label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 flex-1">
                <input type="email" id="input-email-corp" placeholder="voce@empresa.com" autocomplete="email" aria-describedby="input-email-corp-hint" required class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-email-corp-hint" class="mb-0 text-xs text-muted-foreground">Usaremos este e-mail para notificações.</p>
        </div>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.input&gt;</code> é o campo de formulário completo:
            label, hint, erro (com detecção automática via <code>$errors</code>), ícones,
            prefix/suffix, addons, variantes <code>default</code>/<code>filled</code>/<code>flush</code>,
            estados, floating label, toggle de senha, clearable, contador e loading.
            Atributos como <code>wire:model</code>, <code>autocomplete</code> e <code>min</code>
            caem no <code>&lt;input&gt;</code>; <code>class</code> no wrapper.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Label + placeholder. Passe <code>name</code> para formulários HTML clássicos.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input label="Nome" name="name" placeholder="Digite seu nome" />
            </div>
        </x-ui.example>

        <x-ui.example title="Hint e obrigatório" :code="$hintRequiredCode" :html="$hintRequiredHtml">
            <x-slot:description>
                <code>required</code> marca o asterisco; <code>hint</code> aparece abaixo do campo.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input
                    label="E-mail corporativo"
                    type="email"
                    required
                    hint="Usaremos este e-mail para notificações."
                    placeholder="voce@empresa.com"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tipos" :code="$typesCode" :html="$typesHtml">
            <x-slot:description>
                <code>type</code> nativo — <code>password</code> ativa o toggle de visibilidade por padrão.
            </x-slot:description>
            <form onsubmit="return false;" class="grid w-full grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                <x-forms.input type="email" label="E-mail" name="demo_email" autocomplete="username" placeholder="voce@empresa.com" icon="bi-envelope" />
                <x-forms.input type="password" label="Senha" name="demo_password" placeholder="••••••••" />
                <x-forms.input type="search" label="Buscar" name="demo_search" placeholder="Pesquisar…" icon="bi-search" />
                <x-forms.input type="tel" label="Telefone" name="demo_tel" placeholder="(11) 99999-9999" icon="bi-telephone" />
                <x-forms.input type="url" label="Site" name="demo_url" placeholder="https://" icon="bi-link-45deg" />
                <x-forms.input type="number" label="Quantidade" name="demo_qty" placeholder="0" icon="bi-hash" />
            </form>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code> (padrão) e <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input size="sm" label="Pequeno" placeholder="size=sm" />
                <x-forms.input size="md" label="Médio" placeholder="size=md" />
                <x-forms.input size="lg" label="Grande" placeholder="size=lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>default</code>, <code>filled</code> e <code>flush</code> (underline).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input variant="default" label="Default" placeholder="Borda + fundo do card" />
                <x-forms.input variant="filled" label="Filled" placeholder="Fundo muted" />
                <x-forms.input variant="flush" label="Flush" placeholder="Somente underline" />
            </div>
        </x-ui.example>

        <x-ui.example title="Ícones" :code="$iconsCode" :html="$iconsHtml">
            <x-slot:description>
                <code>icon</code> (Bootstrap Icons) com <code>icon-position</code> <code>start</code>/<code>end</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input label="Usuário" icon="bi-person" placeholder="usuario" />
                <x-forms.input label="Valor" icon="bi-currency-dollar" icon-position="end" placeholder="0,00" />
            </div>
        </x-ui.example>

        <x-ui.example title="Prefix e suffix" :code="$prefixSuffixCode" :html="$prefixSuffixHtml">
            <x-slot:description>
                Texto auxiliar dentro do controle — props ou slots <code>prefix</code>/<code>suffix</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input label="Usuário" prefix="@" placeholder="handle" />
                <x-forms.input label="Site" suffix=".com.br" placeholder="empresa" />
                <x-forms.input label="Preço" prefix="R$" suffix=",00" placeholder="99" />
            </div>
        </x-ui.example>

        <x-ui.example title="Addons" :code="$addonsCode" :html="$addonsHtml">
            <x-slot:description>
                Slots <code>addon-start</code> / <code>addon-end</code> para texto ou botões anexados.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.input label="Website" placeholder="meusite">
                    <x-slot:addon-start>https://</x-slot:addon-start>
                    <x-slot:addon-end>.com</x-slot:addon-end>
                </x-forms.input>

                <x-forms.input label="Cupom" placeholder="CÓDIGO">
                    <x-slot:addon-end class="border-0 bg-transparent p-0">
                        <button type="button" class="btn btn-primary h-full rounded-none rounded-r-lg px-4">Aplicar</button>
                    </x-slot:addon-end>
                </x-forms.input>
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> ou <code>error</code> (força <code>danger</code> + mensagem com <code>role="alert"</code>).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.input label="Sucesso" state="success" value="tudo certo" hint="Campo válido." />
                <x-forms.input label="Atenção" state="warning" value="revisar" hint="Confira este valor." />
                <x-forms.input label="Erro" state="danger" value="inválido" error="Este campo é obrigatório." />
                <x-forms.input label="Info" state="info" value="dica" hint="Informação adicional." />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores de foco" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> controla o anel de foco quando não há <code>state</code>/<code>error</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-5">
                <x-forms.input color="primary" label="Primary" placeholder="focus ring" />
                <x-forms.input color="success" label="Success" placeholder="focus ring" />
                <x-forms.input color="warning" label="Warning" placeholder="focus ring" />
                <x-forms.input color="danger" label="Danger" placeholder="focus ring" />
                <x-forms.input color="info" label="Info" placeholder="focus ring" />
            </div>
        </x-ui.example>

        <x-ui.example title="Senha" :code="$passwordCode" :html="$passwordHtml">
            <x-slot:description>
                Toggle de visibilidade ligado por padrão em <code>type="password"</code>.
            </x-slot:description>
            <form onsubmit="return false;" class="flex w-full max-w-md flex-col gap-4">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input type="password" label="Senha" name="password" placeholder="Digite a senha" />
                <x-forms.input type="password" label="Sem toggle" name="password_plain" :password-toggle="false" autocomplete="new-password" placeholder="••••••••" />
            </form>
        </x-ui.example>

        <x-ui.example title="Clearable" :code="$clearableCode" :html="$clearableHtml">
            <x-slot:description>
                <code>clearable</code> mostra o botão X quando há valor (dispara <code>input</code>/<code>change</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input label="Buscar" clearable value="texto para limpar" icon="bi-search" />
            </div>
        </x-ui.example>

        <x-ui.example title="Floating label" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                <code>floating</code> anima o label para dentro do campo (peer + placeholder).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input floating label="E-mail" type="email" />
                <x-forms.input floating label="Nome completo" required />
            </div>
        </x-ui.example>

        <x-ui.example title="Contador" :code="$counterCode" :html="$counterHtml">
            <x-slot:description>
                <code>counter</code> e/ou <code>maxlength</code> exibem a contagem à direita.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input label="Bio" :maxlength="80" counter placeholder="Até 80 caracteres" />
            </div>
        </x-ui.example>

        <x-ui.example title="Pill / rounded" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code> aplica formato pill no controle.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input rounded label="Pill" placeholder="rounded" icon="bi-search" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled, readonly e loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code>, <code>readonly</code> e <code>loading</code> (spinner + disabled).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input label="Desabilitado" disabled value="somente leitura visual" />
                <x-forms.input label="Readonly" readonly value="não editável" />
                <x-forms.input label="Loading" loading placeholder="Salvando…" />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-input" />
</x-ui.docs>
