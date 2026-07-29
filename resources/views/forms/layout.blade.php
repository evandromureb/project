<?php

use Livewire\Component;

return new class extends Component
{
    public string $firstName = '';

    public string $lastName = '';

    public string $email = '';

    public string $phone = '';

    public string $city = '';

    public string $state = '';

    public string $zip = '';

    public string $bio = '';

    public function save(): void
    {
        $this->validate([
            'firstName' => ['required', 'min:2'],
            'lastName' => ['required', 'min:2'],
            'email' => ['required', 'email'],
            'city' => ['required'],
        ]);
    }
};
?>

@php
    $verticalCode = <<<'BLADE'
<x-forms.layout as="form" variant="vertical" title="Perfil" description="Dados básicos da conta.">
    <x-forms.layout.layout-field label="Nome" name="name" placeholder="Ana Silva" required />
    <x-forms.layout.layout-field label="E-mail" name="email" type="email" placeholder="ana@empresa.com" required />
    <x-forms.layout.layout-field label="Bio" name="bio" hint="Opcional — aparece no perfil público.">
        <x-forms.textarea name="bio" :rows="3" placeholder="Sobre você…" />
    </x-forms.layout.layout-field>
    <x-forms.layout.layout-actions>
        <x-ui.button type="button" variant="soft" color="secondary">Cancelar</x-ui.button>
        <x-ui.button type="submit" color="primary">Salvar</x-ui.button>
    </x-forms.layout.layout-actions>
</x-forms.layout>
BLADE;

    $verticalHtml = <<<'HTML'
<form class="form-layout w-full" data-variant="vertical">
    <div class="mb-4 flex flex-col gap-1">
        <h5 class="text-base font-semibold text-foreground">Perfil</h5>
        <p class="mb-0 text-sm text-muted-foreground">Dados básicos da conta.</p>
    </div>
    <div class="flex flex-col gap-4">
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <label for="form-layout-field-name" class="font-medium text-foreground text-sm after:ms-0.5 after:text-danger after:content-['*']">Nome</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-name" name="name" placeholder="Ana Silva" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <label for="form-layout-field-email" class="font-medium text-foreground text-sm after:ms-0.5 after:text-danger after:content-['*']">E-mail</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="email" id="form-layout-field-email" name="email" placeholder="ana@empresa.com" autocomplete="email" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <div id="form-layout-field-bio-label" class="font-medium text-foreground text-sm">Bio</div>
            <div role="group" aria-labelledby="form-layout-field-bio-label" class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/textarea relative flex w-full flex-col rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary text-sm px-3 py-2.5 cursor-text">
                        <textarea id="bio" name="bio" rows="3" placeholder="Sobre você…" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground text-sm resize-y leading-relaxed"></textarea>
                    </div>
                </div>
                <p class="mt-1.5 mb-0 text-sm text-muted-foreground">Opcional — aparece no perfil público.</p>
            </div>
        </div>
        <div class="form-layout-actions flex flex-wrap items-center gap-2 justify-end w-full">
            <button type="button" class="btn btn-soft-secondary">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</form>
HTML;

    $horizontalCode = <<<'BLADE'
<x-forms.layout as="form" variant="horizontal" :label-cols="3" title="Horizontal">
    <x-forms.layout.layout-field label="E-mail" name="h_email" type="email" autocomplete="username" placeholder="voce@empresa.com" required />
    <x-forms.layout.layout-field label="Senha" name="h_password" type="password" placeholder="••••••••" required />
    <x-forms.layout.layout-field label="Empresa" name="h_company" placeholder="Acme Ltda" hint="Nome fantasia." />
    <x-forms.layout.layout-actions>
        <x-ui.button type="submit" color="primary">Entrar</x-ui.button>
    </x-forms.layout.layout-actions>
</x-forms.layout>
BLADE;

    $horizontalHtml = <<<'HTML'
<form class="form-layout w-full" data-variant="horizontal">
    <div class="mb-4 flex flex-col gap-1">
        <h5 class="text-base font-semibold text-foreground">Horizontal</h5>
    </div>
    <div class="flex flex-col gap-4">
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-h_email" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5 after:ms-0.5 after:text-danger after:content-['*']">E-mail</label>
            <div class="min-w-0 col-span-12 sm:col-span-9">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="email" id="form-layout-field-h_email" name="h_email" placeholder="voce@empresa.com" autocomplete="username" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-h_password" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5 after:ms-0.5 after:text-danger after:content-['*']">Senha</label>
            <div class="min-w-0 col-span-12 sm:col-span-9">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="password" id="form-layout-field-h_password" name="h_password" placeholder="••••••••" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-h_company" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5">Empresa</label>
            <div class="min-w-0 col-span-12 sm:col-span-9">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-h_company" name="h_company" placeholder="Acme Ltda" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                    <p class="mt-1.5 mb-0 text-xs text-muted-foreground">Nome fantasia.</p>
                </div>
            </div>
        </div>
        <div class="form-layout-actions flex flex-wrap items-center gap-2 justify-end w-full col-span-full">
            <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
    </div>
</form>
HTML;

    $horizontalSizingCode = <<<'BLADE'
<x-forms.layout variant="horizontal" :label-cols="2" size="sm" class="mb-4">
    <x-forms.layout.layout-field label="E-mail" name="sz_sm" type="email" placeholder="size=sm" />
</x-forms.layout>
<x-forms.layout variant="horizontal" :label-cols="2" size="md" class="mb-4">
    <x-forms.layout.layout-field label="E-mail" name="sz_md" type="email" placeholder="size=md" />
</x-forms.layout>
<x-forms.layout variant="horizontal" :label-cols="2" size="lg">
    <x-forms.layout.layout-field label="E-mail" name="sz_lg" type="email" placeholder="size=lg" />
</x-forms.layout>
BLADE;

    $horizontalSizingHtml = <<<'HTML'
<div class="form-layout w-full mb-4" data-variant="horizontal" data-size="sm">
    <div class="flex flex-col gap-4">
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-sz_sm" class="font-medium text-foreground text-xs col-span-12 sm:col-span-2 pt-1.5">E-mail</label>
            <div class="min-w-0 col-span-12 sm:col-span-10">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-8 text-xs px-2.5 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="email" id="form-layout-field-sz_sm" name="sz_sm" placeholder="size=sm" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-layout w-full mb-4" data-variant="horizontal" data-size="md">
    <div class="flex flex-col gap-4">
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-sz_md" class="font-medium text-foreground text-sm col-span-12 sm:col-span-2 pt-2.5">E-mail</label>
            <div class="min-w-0 col-span-12 sm:col-span-10">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="email" id="form-layout-field-sz_md" name="sz_md" placeholder="size=md" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-layout w-full" data-variant="horizontal" data-size="lg">
    <div class="flex flex-col gap-4">
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-sz_lg" class="font-medium text-foreground text-base col-span-12 sm:col-span-2 pt-3">E-mail</label>
            <div class="min-w-0 col-span-12 sm:col-span-10">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-11 text-base px-3.5 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="email" id="form-layout-field-sz_lg" name="sz_lg" placeholder="size=lg" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $gridCode = <<<'BLADE'
<x-forms.layout as="form" variant="grid" :columns="2" title="Grid 2 colunas">
    <x-forms.layout.layout-field label="Nome" name="g_first" placeholder="Ana" required />
    <x-forms.layout.layout-field label="Sobrenome" name="g_last" placeholder="Silva" required />
    <x-forms.layout.layout-field label="E-mail" name="g_email" type="email" placeholder="ana@empresa.com" span="full" />
    <x-forms.layout.layout-field label="Cidade" name="g_city" placeholder="São Paulo" />
    <x-forms.layout.layout-field label="UF" name="g_state" placeholder="SP" />
    <x-forms.layout.layout-actions>
        <x-ui.button type="submit" color="primary">Continuar</x-ui.button>
    </x-forms.layout.layout-actions>
</x-forms.layout>
BLADE;

    $gridHtml = <<<'HTML'
<form class="form-layout w-full" data-variant="grid">
    <div class="mb-4 flex flex-col gap-1">
        <h5 class="text-base font-semibold text-foreground">Grid 2 colunas</h5>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <label for="form-layout-field-g_first" class="font-medium text-foreground text-sm after:ms-0.5 after:text-danger after:content-['*']">Nome</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-g_first" name="g_first" placeholder="Ana" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <label for="form-layout-field-g_last" class="font-medium text-foreground text-sm after:ms-0.5 after:text-danger after:content-['*']">Sobrenome</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-g_last" name="g_last" placeholder="Silva" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5 col-span-full">
            <label for="form-layout-field-g_email" class="font-medium text-foreground text-sm">E-mail</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="email" id="form-layout-field-g_email" name="g_email" placeholder="ana@empresa.com" autocomplete="email" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <label for="form-layout-field-g_city" class="font-medium text-foreground text-sm">Cidade</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-g_city" name="g_city" placeholder="São Paulo" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <label for="form-layout-field-g_state" class="font-medium text-foreground text-sm">UF</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-g_state" name="g_state" placeholder="SP" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-actions flex flex-wrap items-center gap-2 justify-end w-full col-span-full">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </div>
    </div>
</form>
HTML;

    $columnSizingCode = <<<'BLADE'
<x-forms.layout as="form" variant="vertical" onsubmit="return false;">
    <x-forms.layout.layout-row :columns="2">
        <x-forms.layout.layout-field label="Nome" name="c_first" placeholder="Firstname" />
        <x-forms.layout.layout-field label="Sobrenome" name="c_last" placeholder="Lastname" />
    </x-forms.layout.layout-row>
    <x-forms.layout.layout-row :columns="3">
        <x-forms.layout.layout-field label="E-mail" name="c_email" type="email" autocomplete="username" placeholder="Email" />
        <x-forms.layout.layout-field label="Senha" name="c_password" type="password" placeholder="Password" />
        <x-forms.layout.layout-field label="Confirmar" name="c_confirm" type="password" placeholder="Confirm" />
    </x-forms.layout.layout-row>
    <x-forms.layout.layout-row :columns="3">
        <x-forms.layout.layout-field label="Cidade" name="c_city" placeholder="City" span="2" />
        <x-forms.layout.layout-field label="UF" name="c_uf" placeholder="SP" />
        <x-forms.layout.layout-field label="CEP" name="c_zip" placeholder="00000-000" />
    </x-forms.layout.layout-row>
</x-forms.layout>
BLADE;

    $columnSizingHtml = <<<'HTML'
<form class="form-layout w-full" data-variant="vertical">
    <div class="flex flex-col gap-4">
        <div class="form-layout-row w-full min-w-0 grid grid-cols-1 md:grid-cols-2 gap-4 items-start col-span-full">
            <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                <label for="form-layout-field-c_first" class="font-medium text-foreground text-sm">Nome</label>
                <div class="min-w-0 w-full">
                    <div class="flex w-full flex-col gap-1.5">
                        <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                            <div class="relative min-w-0 flex-1">
                                <input type="text" id="form-layout-field-c_first" name="c_first" placeholder="Firstname" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                <label for="form-layout-field-c_last" class="font-medium text-foreground text-sm">Sobrenome</label>
                <div class="min-w-0 w-full">
                    <div class="flex w-full flex-col gap-1.5">
                        <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                            <div class="relative min-w-0 flex-1">
                                <input type="text" id="form-layout-field-c_last" name="c_last" placeholder="Lastname" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-row w-full min-w-0 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 items-start col-span-full">
            <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                <label for="form-layout-field-c_email" class="font-medium text-foreground text-sm">E-mail</label>
                <div class="min-w-0 w-full">
                    <div class="flex w-full flex-col gap-1.5">
                        <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                            <div class="relative min-w-0 flex-1">
                                <input type="email" id="form-layout-field-c_email" name="c_email" placeholder="Email" autocomplete="username" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                <label for="form-layout-field-c_password" class="font-medium text-foreground text-sm">Senha</label>
                <div class="min-w-0 w-full">
                    <div class="flex w-full flex-col gap-1.5">
                        <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                            <div class="relative min-w-0 flex-1">
                                <input type="password" id="form-layout-field-c_password" name="c_password" placeholder="Password" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                <label for="form-layout-field-c_confirm" class="font-medium text-foreground text-sm">Confirmar</label>
                <div class="min-w-0 w-full">
                    <div class="flex w-full flex-col gap-1.5">
                        <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                            <div class="relative min-w-0 flex-1">
                                <input type="password" id="form-layout-field-c_confirm" name="c_confirm" placeholder="Confirm" autocomplete="new-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-row w-full min-w-0 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 items-start col-span-full">
            <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5 col-span-1 md:col-span-2">
                <label for="form-layout-field-c_city" class="font-medium text-foreground text-sm">Cidade</label>
                <div class="min-w-0 w-full">
                    <div class="flex w-full flex-col gap-1.5">
                        <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                            <div class="relative min-w-0 flex-1">
                                <input type="text" id="form-layout-field-c_city" name="c_city" placeholder="City" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                <label for="form-layout-field-c_uf" class="font-medium text-foreground text-sm">UF</label>
                <div class="min-w-0 w-full">
                    <div class="flex w-full flex-col gap-1.5">
                        <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                            <div class="relative min-w-0 flex-1">
                                <input type="text" id="form-layout-field-c_uf" name="c_uf" placeholder="SP" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                <label for="form-layout-field-c_zip" class="font-medium text-foreground text-sm">CEP</label>
                <div class="min-w-0 w-full">
                    <div class="flex w-full flex-col gap-1.5">
                        <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                            <div class="relative min-w-0 flex-1">
                                <input type="text" id="form-layout-field-c_zip" name="c_zip" placeholder="00000-000" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
HTML;

    $inlineCode = <<<'BLADE'
<x-forms.layout as="form" variant="inline" gap="sm">
    <x-forms.layout.layout-field label="Nome" name="i_name" placeholder="Jane Doe" auto />
    <x-forms.layout.layout-field label="Usuário" name="i_user" placeholder="username" auto>
        <x-forms.input-group name="i_user" prepend="@" placeholder="username" />
    </x-forms.layout.layout-field>
    <x-forms.layout.layout-field label="Preferência" name="i_pref" auto>
        <x-forms.select
            name="i_pref"
            placeholder="Escolha…"
            :options="[['value' => '1', 'label' => 'Um'], ['value' => '2', 'label' => 'Dois'], ['value' => '3', 'label' => 'Três']]"
        />
    </x-forms.layout.layout-field>
    <x-forms.checkbox label="Lembrar-me" name="i_remember" />
    <x-forms.layout.layout-actions align="start">
        <x-ui.button type="submit" color="primary">Enviar</x-ui.button>
    </x-forms.layout.layout-actions>
</x-forms.layout>
BLADE;

    $inlineHtml = <<<'HTML'
<form class="form-layout w-full" data-variant="inline">
    <div class="flex flex-wrap items-end gap-2">
        <div class="form-layout-field min-w-0 flex w-auto flex-col gap-1.5 w-auto shrink-0">
            <label for="form-layout-field-i_name" class="sr-only">Nome</label>
            <div class="min-w-0 w-auto">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-i_name" name="i_name" placeholder="Jane Doe" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-auto flex-col gap-1.5 w-auto shrink-0">
            <div id="form-layout-field-i_user-label" class="sr-only">Usuário</div>
            <div role="group" aria-labelledby="form-layout-field-i_user-label" class="min-w-0 w-auto">
                <div class="flex w-full items-stretch rounded-lg focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary">
                    <span class="inline-flex items-center rounded-l-lg border border-r-0 border-border bg-muted px-3 text-sm text-muted-foreground">@</span>
                    <div class="relative flex h-9.5 min-w-0 flex-1 items-center rounded-r-lg border border-border bg-card px-3 text-sm">
                        <input type="text" id="i_user" name="i_user" placeholder="username" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-auto flex-col gap-1.5 w-auto shrink-0">
            <div id="form-layout-field-i_pref-label" class="sr-only">Preferência</div>
            <div role="group" aria-labelledby="form-layout-field-i_pref-label" class="min-w-0 w-auto">
                <select id="i_pref" name="i_pref" class="h-9.5 w-full rounded-lg border border-border bg-card px-3 text-sm text-foreground shadow-sm focus:border-primary focus:ring-2 focus:ring-primary focus:ring-offset-1">
                    <option value="" disabled selected>Escolha…</option>
                    <option value="1">Um</option>
                    <option value="2">Dois</option>
                    <option value="3">Três</option>
                </select>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" id="i_remember" name="i_remember" class="size-4 rounded border-border text-primary focus:ring-primary">
            <label for="i_remember" class="text-sm font-medium text-foreground">Lembrar-me</label>
        </div>
        <div class="form-layout-actions flex flex-wrap items-center gap-2 justify-start w-auto shrink-0">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
HTML;

    $floatingCode = <<<'BLADE'
<x-forms.layout as="form" variant="grid" :columns="2" floating title="Floating labels">
    <x-forms.layout.layout-field label="Nome" name="f_first" placeholder=" " required />
    <x-forms.layout.layout-field label="Sobrenome" name="f_last" placeholder=" " required />
    <x-forms.layout.layout-field label="E-mail" name="f_email" type="email" placeholder=" " span="full" />
    <x-forms.layout.layout-field label="Cidade" name="f_city" placeholder=" " />
    <x-forms.layout.layout-field label="CEP" name="f_zip" placeholder=" " />
    <x-forms.layout.layout-actions>
        <x-ui.button type="submit" color="primary">Enviar</x-ui.button>
    </x-forms.layout.layout-actions>
</x-forms.layout>
BLADE;

    $floatingHtml = <<<'HTML'
<form class="form-layout w-full" data-variant="grid">
    <div class="mb-4 flex flex-col gap-1">
        <h5 class="text-base font-semibold text-foreground">Floating labels</h5>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text">
                        <div class="relative h-full min-w-0 flex-1">
                            <input type="text" id="form-layout-field-f_first" name="f_first" placeholder=" " class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none" required>
                            <label for="form-layout-field-f_first" class="pointer-events-none absolute start-0 top-1.5 z-10 text-xs text-muted-foreground transition-all duration-150 ease-out">Nome</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text">
                        <div class="relative h-full min-w-0 flex-1">
                            <input type="text" id="form-layout-field-f_last" name="f_last" placeholder=" " class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none" required>
                            <label for="form-layout-field-f_last" class="pointer-events-none absolute start-0 top-1.5 z-10 text-xs text-muted-foreground transition-all duration-150 ease-out">Sobrenome</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5 col-span-full">
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text">
                        <div class="relative h-full min-w-0 flex-1">
                            <input type="email" id="form-layout-field-f_email" name="f_email" placeholder=" " class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none">
                            <label for="form-layout-field-f_email" class="pointer-events-none absolute start-0 top-1.5 z-10 text-xs text-muted-foreground transition-all duration-150 ease-out">E-mail</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text">
                        <div class="relative h-full min-w-0 flex-1">
                            <input type="text" id="form-layout-field-f_city" name="f_city" placeholder=" " class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none">
                            <label for="form-layout-field-f_city" class="pointer-events-none absolute start-0 top-1.5 z-10 text-xs text-muted-foreground transition-all duration-150 ease-out">Cidade</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text">
                        <div class="relative h-full min-w-0 flex-1">
                            <input type="text" id="form-layout-field-f_zip" name="f_zip" placeholder=" " class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none">
                            <label for="form-layout-field-f_zip" class="pointer-events-none absolute start-0 top-1.5 z-10 text-xs text-muted-foreground transition-all duration-150 ease-out">CEP</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-actions flex flex-wrap items-center gap-2 justify-end w-full col-span-full">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
HTML;

    $sectionsCode = <<<'BLADE'
<x-forms.layout as="form" variant="vertical" card title="Cadastro" description="Organize campos em seções.">
    <x-forms.layout.layout-section title="Conta" description="Credenciais de acesso." icon="bi-person">
        <x-forms.layout.layout-row :columns="2">
            <x-forms.layout.layout-field label="E-mail" name="s_email" type="email" autocomplete="username" required />
            <x-forms.layout.layout-field label="Telefone" name="s_phone" type="tel" />
        </x-forms.layout.layout-row>
        <x-forms.layout.layout-field label="Senha" name="s_password" type="password" required />
    </x-forms.layout.layout-section>

    <x-forms.layout.layout-section title="Endereço" description="Onde você mora." icon="bi-geo-alt" divided :columns="2">
        <x-forms.layout.layout-field label="Cidade" name="s_city" />
        <x-forms.layout.layout-field label="UF" name="s_state" />
        <x-forms.layout.layout-field label="CEP" name="s_zip" span="full" />
    </x-forms.layout.layout-section>

    <x-forms.layout.layout-actions>
        <x-ui.button type="button" variant="soft" color="secondary">Voltar</x-ui.button>
        <x-ui.button type="submit" color="primary">Criar conta</x-ui.button>
    </x-forms.layout.layout-actions>
</x-forms.layout>
BLADE;

    $sectionsHtml = <<<'HTML'
<form class="form-layout w-full card overflow-hidden space-y-0" data-variant="vertical">
    <div class="card-header flex flex-col items-start gap-1">
        <h5 class="card-title mb-0">Cadastro</h5>
        <p class="mb-0 text-sm text-muted-foreground">Organize campos em seções.</p>
    </div>
    <div class="card-body flex flex-col gap-4">
        <section class="form-layout-section flex w-full min-w-0 flex-col gap-4">
            <div class="flex items-start gap-3">
                <span class="inline-flex size-9 shrink-0 items-center justify-center rounded-lg bg-muted text-foreground">
                    <i class="bi bi-person text-base leading-none"></i>
                </span>
                <div class="min-w-0 flex-1">
                    <h6 class="mb-0 text-sm font-semibold text-foreground">Conta</h6>
                    <p class="mb-0 mt-0.5 text-sm text-muted-foreground">Credenciais de acesso.</p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="form-layout-row w-full min-w-0 grid grid-cols-1 md:grid-cols-2 gap-4 items-start col-span-full">
                    <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                        <label for="form-layout-field-s_email" class="font-medium text-foreground text-sm after:ms-0.5 after:text-danger after:content-['*']">E-mail</label>
                        <div class="min-w-0 w-full">
                            <div class="flex w-full flex-col gap-1.5">
                                <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                                    <div class="relative min-w-0 flex-1">
                                        <input type="email" id="form-layout-field-s_email" name="s_email" autocomplete="username" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                        <label for="form-layout-field-s_phone" class="font-medium text-foreground text-sm">Telefone</label>
                        <div class="min-w-0 w-full">
                            <div class="flex w-full flex-col gap-1.5">
                                <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                                    <div class="relative min-w-0 flex-1">
                                        <input type="tel" id="form-layout-field-s_phone" name="s_phone" autocomplete="tel" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                    <label for="form-layout-field-s_password" class="font-medium text-foreground text-sm after:ms-0.5 after:text-danger after:content-['*']">Senha</label>
                    <div class="min-w-0 w-full">
                        <div class="flex w-full flex-col gap-1.5">
                            <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                                <div class="relative min-w-0 flex-1">
                                    <input type="password" id="form-layout-field-s_password" name="s_password" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="form-layout-section flex w-full min-w-0 flex-col gap-4 border-t border-border pt-4">
            <div class="flex items-start gap-3">
                <span class="inline-flex size-9 shrink-0 items-center justify-center rounded-lg bg-muted text-foreground">
                    <i class="bi bi-geo-alt text-base leading-none"></i>
                </span>
                <div class="min-w-0 flex-1">
                    <h6 class="mb-0 text-sm font-semibold text-foreground">Endereço</h6>
                    <p class="mb-0 mt-0.5 text-sm text-muted-foreground">Onde você mora.</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                    <label for="form-layout-field-s_city" class="font-medium text-foreground text-sm">Cidade</label>
                    <div class="min-w-0 w-full">
                        <div class="flex w-full flex-col gap-1.5">
                            <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                                <div class="relative min-w-0 flex-1">
                                    <input type="text" id="form-layout-field-s_city" name="s_city" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
                    <label for="form-layout-field-s_state" class="font-medium text-foreground text-sm">UF</label>
                    <div class="min-w-0 w-full">
                        <div class="flex w-full flex-col gap-1.5">
                            <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                                <div class="relative min-w-0 flex-1">
                                    <input type="text" id="form-layout-field-s_state" name="s_state" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5 col-span-full">
                    <label for="form-layout-field-s_zip" class="font-medium text-foreground text-sm">CEP</label>
                    <div class="min-w-0 w-full">
                        <div class="flex w-full flex-col gap-1.5">
                            <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                                <div class="relative min-w-0 flex-1">
                                    <input type="text" id="form-layout-field-s_zip" name="s_zip" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="form-layout-actions flex flex-wrap items-center gap-2 justify-end border-t border-border pt-4 w-full">
            <button type="button" class="btn btn-soft-secondary">Voltar</button>
            <button type="submit" class="btn btn-primary">Criar conta</button>
        </div>
    </div>
</form>
HTML;

    $cardCode = <<<'BLADE'
<x-forms.layout
    as="form"
    variant="horizontal"
    :label-cols="3"
    card
    title="Configurações"
    description="Atualize as preferências da equipe."
>
    <x-forms.layout.layout-field label="Nome do time" name="team_name" placeholder="Product" required />
    <x-forms.layout.layout-field label="Slug" name="team_slug" placeholder="product" hint="Usado na URL." />
    <x-forms.layout.layout-field label="Visibilidade" name="team_visibility">
        <x-forms.select
            name="team_visibility"
            :options="[['value' => 'private', 'label' => 'Privado'], ['value' => 'public', 'label' => 'Público']]"
        />
    </x-forms.layout.layout-field>
    <x-forms.layout.layout-actions>
        <x-slot:start>
            <x-ui.button type="button" variant="ghost" color="danger">Excluir</x-ui.button>
        </x-slot:start>
        <x-ui.button type="submit" color="primary">Salvar alterações</x-ui.button>
    </x-forms.layout.layout-actions>
</x-forms.layout>
BLADE;

    $cardHtml = <<<'HTML'
<form class="form-layout w-full card overflow-hidden space-y-0" data-variant="horizontal">
    <div class="card-header flex flex-col items-start gap-1">
        <h5 class="card-title mb-0">Configurações</h5>
        <p class="mb-0 text-sm text-muted-foreground">Atualize as preferências da equipe.</p>
    </div>
    <div class="card-body flex flex-col gap-4">
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-team_name" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5 after:ms-0.5 after:text-danger after:content-['*']">Nome do time</label>
            <div class="min-w-0 col-span-12 sm:col-span-9">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-team_name" name="team_name" placeholder="Product" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-team_slug" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5">Slug</label>
            <div class="min-w-0 col-span-12 sm:col-span-9">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-team_slug" name="team_slug" placeholder="product" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                    <p class="mt-1.5 mb-0 text-xs text-muted-foreground">Usado na URL.</p>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <div id="form-layout-field-team_visibility-label" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5">Visibilidade</div>
            <div role="group" aria-labelledby="form-layout-field-team_visibility-label" class="min-w-0 col-span-12 sm:col-span-9">
                <select id="team_visibility" name="team_visibility" class="h-9.5 w-full rounded-lg border border-border bg-card px-3 text-sm text-foreground shadow-sm focus:border-primary focus:ring-2 focus:ring-primary focus:ring-offset-1">
                    <option value="private">Privado</option>
                    <option value="public">Público</option>
                </select>
            </div>
        </div>
        <div class="form-layout-actions flex flex-wrap items-center gap-2 justify-end border-t border-border pt-4 w-full">
            <div class="me-auto flex flex-wrap items-center gap-2">
                <button type="button" class="btn btn-ghost-danger">Excluir</button>
            </div>
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
        </div>
    </div>
</form>
HTML;

    $labelColsCode = <<<'BLADE'
<x-forms.layout variant="horizontal" :label-cols="2" class="mb-6">
    <x-forms.layout.layout-field label="label-cols=2" name="lc2" placeholder="Controle ocupa 10/12" />
</x-forms.layout>
<x-forms.layout variant="horizontal" :label-cols="4" class="mb-6">
    <x-forms.layout.layout-field label="label-cols=4" name="lc4" placeholder="Controle ocupa 8/12" />
</x-forms.layout>
<x-forms.layout variant="horizontal" :label-cols="6">
    <x-forms.layout.layout-field label="label-cols=6" name="lc6" placeholder="Controle ocupa 6/12" />
</x-forms.layout>
BLADE;

    $labelColsHtml = <<<'HTML'
<div class="form-layout w-full mb-6" data-variant="horizontal">
    <div class="flex flex-col gap-4">
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-lc2" class="font-medium text-foreground text-sm col-span-12 sm:col-span-2 pt-2.5">label-cols=2</label>
            <div class="min-w-0 col-span-12 sm:col-span-10">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-lc2" name="lc2" placeholder="Controle ocupa 10/12" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-layout w-full mb-6" data-variant="horizontal">
    <div class="flex flex-col gap-4">
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-lc4" class="font-medium text-foreground text-sm col-span-12 sm:col-span-4 pt-2.5">label-cols=4</label>
            <div class="min-w-0 col-span-12 sm:col-span-8">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-lc4" name="lc4" placeholder="Controle ocupa 8/12" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-layout w-full" data-variant="horizontal">
    <div class="flex flex-col gap-4">
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-lc6" class="font-medium text-foreground text-sm col-span-12 sm:col-span-6 pt-2.5">label-cols=6</label>
            <div class="min-w-0 col-span-12 sm:col-span-6">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-lc6" name="lc6" placeholder="Controle ocupa 6/12" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $actionsCode = <<<'BLADE'
<x-forms.layout variant="vertical" gap="sm">
    <x-forms.layout.layout-field label="Título" name="a_title" placeholder="Documento" />
    <x-forms.layout.layout-actions align="between" bordered>
        <x-ui.button type="button" variant="soft" color="secondary">Rascunho</x-ui.button>
        <div class="flex gap-2">
            <x-ui.button type="button" variant="outline" color="secondary">Pré-visualizar</x-ui.button>
            <x-ui.button type="button" color="primary">Publicar</x-ui.button>
        </div>
    </x-forms.layout.layout-actions>
</x-forms.layout>
BLADE;

    $actionsHtml = <<<'HTML'
<div class="form-layout w-full" data-variant="vertical">
    <div class="flex flex-col gap-2">
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1.5">
            <label for="form-layout-field-a_title" class="font-medium text-foreground text-sm">Título</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-a_title" name="a_title" placeholder="Documento" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-actions flex flex-wrap items-center gap-2 justify-between border-t border-border pt-4 w-full">
            <button type="button" class="btn btn-soft-secondary">Rascunho</button>
            <div class="flex gap-2">
                <button type="button" class="btn btn-outline-secondary">Pré-visualizar</button>
                <button type="button" class="btn btn-primary">Publicar</button>
            </div>
        </div>
    </div>
</div>
HTML;

    $slotCode = <<<'BLADE'
<x-forms.layout variant="horizontal" :label-cols="3">
    <x-forms.layout.layout-field label="Website" name="site" required>
        <x-forms.input-group name="site" prepend="https://" append=".com" placeholder="meusite" />
    </x-forms.layout.layout-field>
    <x-forms.layout.layout-field label="Plano" name="plan">
        <x-forms.radio.radio-group name="plan" direction="horizontal">
            <x-forms.radio label="Free" name="plan" value="free" checked />
            <x-forms.radio label="Pro" name="plan" value="pro" />
            <x-forms.radio label="Business" name="plan" value="business" />
        </x-forms.radio.radio-group>
    </x-forms.layout.layout-field>
    <x-forms.layout.layout-field label="Notificações" name="notify">
        <x-forms.switch label="E-mail semanal" name="notify" />
    </x-forms.layout.layout-field>
</x-forms.layout>
BLADE;

    $slotHtml = <<<'HTML'
<div class="form-layout w-full" data-variant="horizontal">
    <div class="flex flex-col gap-4">
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <div id="form-layout-field-site-label" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5 after:ms-0.5 after:text-danger after:content-['*']">Website</div>
            <div role="group" aria-labelledby="form-layout-field-site-label" class="min-w-0 col-span-12 sm:col-span-9">
                <div class="flex w-full items-stretch rounded-lg focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary">
                    <span class="inline-flex items-center rounded-l-lg border border-r-0 border-border bg-muted px-3 text-sm text-muted-foreground">https://</span>
                    <div class="relative flex h-9.5 min-w-0 flex-1 items-center border border-border bg-card px-3 text-sm">
                        <input type="text" id="site" name="site" placeholder="meusite" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                    </div>
                    <span class="inline-flex items-center rounded-r-lg border border-l-0 border-border bg-muted px-3 text-sm text-muted-foreground">.com</span>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <div id="form-layout-field-plan-label" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5">Plano</div>
            <div role="group" aria-labelledby="form-layout-field-plan-label" class="min-w-0 col-span-12 sm:col-span-9">
                <div class="flex flex-wrap items-center gap-4">
                    <label class="flex items-center gap-2 text-sm text-foreground">
                        <input type="radio" name="plan" value="free" checked class="size-4 border-border text-primary focus:ring-primary">
                        Free
                    </label>
                    <label class="flex items-center gap-2 text-sm text-foreground">
                        <input type="radio" name="plan" value="pro" class="size-4 border-border text-primary focus:ring-primary">
                        Pro
                    </label>
                    <label class="flex items-center gap-2 text-sm text-foreground">
                        <input type="radio" name="plan" value="business" class="size-4 border-border text-primary focus:ring-primary">
                        Business
                    </label>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <div id="form-layout-field-notify-label" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5">Notificações</div>
            <div role="group" aria-labelledby="form-layout-field-notify-label" class="min-w-0 col-span-12 sm:col-span-9">
                <label class="inline-flex cursor-pointer items-center gap-2">
                    <span class="relative inline-flex h-5 w-9 items-center rounded-full bg-muted transition-colors">
                        <input type="checkbox" name="notify" class="peer sr-only">
                        <span class="inline-block size-4 translate-x-0.5 rounded-full bg-card shadow-sm transition-transform peer-checked:translate-x-4 peer-checked:bg-primary"></span>
                    </span>
                    <span class="text-sm text-foreground">E-mail semanal</span>
                </label>
            </div>
        </div>
    </div>
</div>
HTML;

    $errorsCode = <<<'BLADE'
<x-forms.layout variant="horizontal" :label-cols="3">
    <x-forms.layout.layout-field
        label="Usuário"
        name="username"
        placeholder="handle"
        error="Este usuário já está em uso."
        required
    />
    <x-forms.layout.layout-field
        label="Cupom"
        name="coupon"
        hint="Deixe em branco se não tiver."
    />
</x-forms.layout>
BLADE;

    $errorsHtml = <<<'HTML'
<div class="form-layout w-full" data-variant="horizontal">
    <div class="flex flex-col gap-4">
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-username" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5 after:ms-0.5 after:text-danger after:content-['*']">Usuário</label>
            <div class="min-w-0 col-span-12 sm:col-span-9">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-danger focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-username" name="username" placeholder="handle" aria-invalid="true" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full" required>
                        </div>
                    </div>
                    <p class="mt-1.5 mb-0 text-xs text-danger" role="alert">Este usuário já está em uso.</p>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 grid grid-cols-12 gap-x-4 gap-y-2 items-start">
            <label for="form-layout-field-coupon" class="font-medium text-foreground text-sm col-span-12 sm:col-span-3 pt-2.5">Cupom</label>
            <div class="min-w-0 col-span-12 sm:col-span-9">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-coupon" name="coupon" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                    <p class="mt-1.5 mb-0 text-xs text-muted-foreground">Deixe em branco se não tiver.</p>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $denseCode = <<<'BLADE'
<x-forms.layout variant="vertical" dense divided>
    <x-forms.layout.layout-field label="Projeto" name="d_project" placeholder="Website" />
    <x-forms.layout.layout-field label="Cliente" name="d_client" placeholder="Acme" />
    <x-forms.layout.layout-field label="Prazo" name="d_due" type="date" />
</x-forms.layout>
BLADE;

    $denseHtml = <<<'HTML'
<div class="form-layout w-full" data-variant="vertical">
    <div class="flex flex-col gap-3 [&>[data-form-layout-field]:not(:last-child)]:border-b [&>[data-form-layout-field]:not(:last-child)]:border-border [&>[data-form-layout-field]:not(:last-child)]:pb-4">
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1" data-form-layout-field>
            <label for="form-layout-field-d_project" class="font-medium text-foreground text-sm">Projeto</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-d_project" name="d_project" placeholder="Website" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1" data-form-layout-field>
            <label for="form-layout-field-d_client" class="font-medium text-foreground text-sm">Cliente</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="text" id="form-layout-field-d_client" name="d_client" placeholder="Acme" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-layout-field min-w-0 flex w-full flex-col gap-1" data-form-layout-field>
            <label for="form-layout-field-d_due" class="font-medium text-foreground text-sm">Prazo</label>
            <div class="min-w-0 w-full">
                <div class="flex w-full flex-col gap-1.5">
                    <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text">
                        <div class="relative min-w-0 flex-1">
                            <input type="date" id="form-layout-field-d_due" name="d_due" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground h-full w-full">
                        </div>
                    </div>
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
            <code>&lt;x-forms.layout&gt;</code> organiza formulários em layouts:
            <code>vertical</code>, <code>horizontal</code>, <code>inline</code> e <code>grid</code>.
            Use <code>&lt;x-forms.layout.layout-field&gt;</code> para label/hint/erro (modo conveniência
            ou slot), <code>layout-row</code> para colunas, <code>layout-section</code> para
            grupos e <code>layout-actions</code> para o rodapé de botões. Props do layout
            descem aos filhos via <code>@@aware</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Vertical" :code="$verticalCode" :html="$verticalHtml">
            <x-slot:description>
                Empilha campos com label acima. Modo conveniência:
                <code>label</code> + <code>name</code> renderiza um <code>&lt;x-forms.input&gt;</code>.
            </x-slot:description>
            <div class="w-full max-w-xl">
                <x-forms.layout as="form" variant="vertical" title="Perfil" description="Dados básicos da conta." onsubmit="return false;">
                    <x-forms.layout.layout-field label="Nome" name="name" placeholder="Ana Silva" required />
                    <x-forms.layout.layout-field label="E-mail" name="email" type="email" placeholder="ana@empresa.com" required />
                    <x-forms.layout.layout-field label="Bio" name="bio" hint="Opcional — aparece no perfil público.">
                        <x-forms.textarea name="bio" :rows="3" placeholder="Sobre você…" />
                    </x-forms.layout.layout-field>
                    <x-forms.layout.layout-actions>
                        <x-ui.button type="button" variant="soft" color="secondary">Cancelar</x-ui.button>
                        <x-ui.button type="submit" color="primary">Salvar</x-ui.button>
                    </x-forms.layout.layout-actions>
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Horizontal" :code="$horizontalCode" :html="$horizontalHtml">
            <x-slot:description>
                Label à esquerda e controle à direita. Ajuste a proporção com
                <code>label-cols</code> (1–6 de 12). No mobile empilha automaticamente.
            </x-slot:description>
            <div class="w-full max-w-3xl">
                <x-forms.layout as="form" variant="horizontal" :label-cols="3" title="Horizontal" onsubmit="return false;">
                    <x-forms.layout.layout-field label="E-mail" name="h_email" type="email" autocomplete="username" placeholder="voce@empresa.com" required />
                    <x-forms.layout.layout-field label="Senha" name="h_password" type="password" placeholder="••••••••" required />
                    <x-forms.layout.layout-field label="Empresa" name="h_company" placeholder="Acme Ltda" hint="Nome fantasia." />
                    <x-forms.layout.layout-actions>
                        <x-ui.button type="submit" color="primary">Entrar</x-ui.button>
                    </x-forms.layout.layout-actions>
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Horizontal — tamanho do label" :code="$horizontalSizingCode" :html="$horizontalSizingHtml">
            <x-slot:description>
                <code>size</code> no layout ajusta tipografia do label e altura dos controles.
            </x-slot:description>
            <div class="w-full">
                <x-forms.layout variant="horizontal" :label-cols="2" size="sm" class="mb-4">
                    <x-forms.layout.layout-field label="E-mail" name="sz_sm" type="email" placeholder="size=sm" />
                </x-forms.layout>
                <x-forms.layout variant="horizontal" :label-cols="2" size="md" class="mb-4">
                    <x-forms.layout.layout-field label="E-mail" name="sz_md" type="email" placeholder="size=md" />
                </x-forms.layout>
                <x-forms.layout variant="horizontal" :label-cols="2" size="lg">
                    <x-forms.layout.layout-field label="E-mail" name="sz_lg" type="email" placeholder="size=lg" />
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Largura do label" :code="$labelColsCode" :html="$labelColsHtml">
            <x-slot:description>
                <code>label-cols</code> define quantas colunas (de 12) o label ocupa.
            </x-slot:description>
            <div class="w-full">
                <x-forms.layout variant="horizontal" :label-cols="2" class="mb-6">
                    <x-forms.layout.layout-field label="label-cols=2" name="lc2" placeholder="Controle ocupa 10/12" />
                </x-forms.layout>
                <x-forms.layout variant="horizontal" :label-cols="4" class="mb-6">
                    <x-forms.layout.layout-field label="label-cols=4" name="lc4" placeholder="Controle ocupa 8/12" />
                </x-forms.layout>
                <x-forms.layout variant="horizontal" :label-cols="6">
                    <x-forms.layout.layout-field label="label-cols=6" name="lc6" placeholder="Controle ocupa 6/12" />
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Grid" :code="$gridCode" :html="$gridHtml">
            <x-slot:description>
                <code>variant="grid"</code> + <code>columns</code>. Use <code>span="full"</code>
                no field para ocupar a linha inteira.
            </x-slot:description>
            <div class="w-full">
                <x-forms.layout as="form" variant="grid" :columns="2" title="Grid 2 colunas" onsubmit="return false;">
                    <x-forms.layout.layout-field label="Nome" name="g_first" placeholder="Ana" required />
                    <x-forms.layout.layout-field label="Sobrenome" name="g_last" placeholder="Silva" required />
                    <x-forms.layout.layout-field label="E-mail" name="g_email" type="email" placeholder="ana@empresa.com" span="full" />
                    <x-forms.layout.layout-field label="Cidade" name="g_city" placeholder="São Paulo" />
                    <x-forms.layout.layout-field label="UF" name="g_state" placeholder="SP" />
                    <x-forms.layout.layout-actions>
                        <x-ui.button type="submit" color="primary">Continuar</x-ui.button>
                    </x-forms.layout.layout-actions>
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Column sizing (layout-row)" :code="$columnSizingCode" :html="$columnSizingHtml">
            <x-slot:description>
                <code>&lt;x-forms.layout.layout-row&gt;</code> cria faixas com colunas mistas dentro
                de qualquer variant.
            </x-slot:description>
            <div class="w-full">
                <x-forms.layout as="form" variant="vertical" onsubmit="return false;">
                    <x-forms.layout.layout-row :columns="2">
                        <x-forms.layout.layout-field label="Nome" name="c_first" placeholder="Firstname" />
                        <x-forms.layout.layout-field label="Sobrenome" name="c_last" placeholder="Lastname" />
                    </x-forms.layout.layout-row>
                    <x-forms.layout.layout-row :columns="3">
                        <x-forms.layout.layout-field label="E-mail" name="c_email" type="email" autocomplete="username" placeholder="Email" />
                        <x-forms.layout.layout-field label="Senha" name="c_password" type="password" placeholder="Password" />
                        <x-forms.layout.layout-field label="Confirmar" name="c_confirm" type="password" placeholder="Confirm" />
                    </x-forms.layout.layout-row>
                    <x-forms.layout.layout-row :columns="3">
                        <x-forms.layout.layout-field label="Cidade" name="c_city" placeholder="City" span="2" />
                        <x-forms.layout.layout-field label="UF" name="c_uf" placeholder="SP" />
                        <x-forms.layout.layout-field label="CEP" name="c_zip" placeholder="00000-000" />
                    </x-forms.layout.layout-row>
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Inline" :code="$inlineCode" :html="$inlineHtml">
            <x-slot:description>
                Campos em linha com labels <code>sr-only</code> (placeholders visíveis).
                Use <code>auto</code> no field para largura intrínseca.
            </x-slot:description>
            <div class="w-full overflow-x-auto">
                <x-forms.layout as="form" variant="inline" gap="sm" onsubmit="return false;">
                    <x-forms.layout.layout-field label="Nome" name="i_name" placeholder="Jane Doe" auto />
                    <x-forms.layout.layout-field label="Usuário" name="i_user" placeholder="username" auto>
                        <x-forms.input-group name="i_user" prepend="@" placeholder="username" />
                    </x-forms.layout.layout-field>
                    <x-forms.layout.layout-field label="Preferência" name="i_pref" auto>
                        <x-forms.select
                            name="i_pref"
                            placeholder="Escolha…"
                            :options="[['value' => '1', 'label' => 'Um'], ['value' => '2', 'label' => 'Dois'], ['value' => '3', 'label' => 'Três']]"
                        />
                    </x-forms.layout.layout-field>
                    <x-forms.checkbox label="Lembrar-me" name="i_remember" />
                    <x-forms.layout.layout-actions align="start">
                        <x-ui.button type="submit" color="primary">Enviar</x-ui.button>
                    </x-forms.layout.layout-actions>
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Floating labels" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                <code>floating</code> no layout faz os fields de conveniência usarem
                label flutuante do <code>&lt;x-forms.input&gt;</code>.
            </x-slot:description>
            <div class="w-full">
                <x-forms.layout as="form" variant="grid" :columns="2" floating title="Floating labels" onsubmit="return false;">
                    <x-forms.layout.layout-field label="Nome" name="f_first" placeholder=" " required />
                    <x-forms.layout.layout-field label="Sobrenome" name="f_last" placeholder=" " required />
                    <x-forms.layout.layout-field label="E-mail" name="f_email" type="email" placeholder=" " span="full" />
                    <x-forms.layout.layout-field label="Cidade" name="f_city" placeholder=" " />
                    <x-forms.layout.layout-field label="CEP" name="f_zip" placeholder=" " />
                    <x-forms.layout.layout-actions>
                        <x-ui.button type="submit" color="primary">Enviar</x-ui.button>
                    </x-forms.layout.layout-actions>
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Seções + card" :code="$sectionsCode" :html="$sectionsHtml">
            <x-slot:description>
                <code>card</code> envolve o formulário; <code>layout-section</code> agrupa
                com título, ícone e <code>divided</code>.
            </x-slot:description>
            <div class="w-full max-w-3xl">
                <x-forms.layout as="form" variant="vertical" card title="Cadastro" description="Organize campos em seções." onsubmit="return false;">
                    <x-forms.layout.layout-section title="Conta" description="Credenciais de acesso." icon="bi-person">
                        <x-forms.layout.layout-row :columns="2">
                            <x-forms.layout.layout-field label="E-mail" name="s_email" type="email" autocomplete="username" required />
                            <x-forms.layout.layout-field label="Telefone" name="s_phone" type="tel" />
                        </x-forms.layout.layout-row>
                        <x-forms.layout.layout-field label="Senha" name="s_password" type="password" required />
                    </x-forms.layout.layout-section>

                    <x-forms.layout.layout-section title="Endereço" description="Onde você mora." icon="bi-geo-alt" divided :columns="2">
                        <x-forms.layout.layout-field label="Cidade" name="s_city" />
                        <x-forms.layout.layout-field label="UF" name="s_state" />
                        <x-forms.layout.layout-field label="CEP" name="s_zip" span="full" />
                    </x-forms.layout.layout-section>

                    <x-forms.layout.layout-actions>
                        <x-ui.button type="button" variant="soft" color="secondary">Voltar</x-ui.button>
                        <x-ui.button type="submit" color="primary">Criar conta</x-ui.button>
                    </x-forms.layout.layout-actions>
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Card horizontal + actions start" :code="$cardCode" :html="$cardHtml">
            <x-slot:description>
                Slot <code>start</code> em <code>layout-actions</code> ancora ações secundárias à esquerda.
            </x-slot:description>
            <div class="w-full max-w-3xl">
                <x-forms.layout
                    as="form"
                    variant="horizontal"
                    :label-cols="3"
                    card
                    title="Configurações"
                    description="Atualize as preferências da equipe."
                    onsubmit="return false;"
                >
                    <x-forms.layout.layout-field label="Nome do time" name="team_name" placeholder="Product" required />
                    <x-forms.layout.layout-field label="Slug" name="team_slug" placeholder="product" hint="Usado na URL." />
                    <x-forms.layout.layout-field label="Visibilidade" name="team_visibility">
                        <x-forms.select
                            name="team_visibility"
                            :options="[['value' => 'private', 'label' => 'Privado'], ['value' => 'public', 'label' => 'Público']]"
                        />
                    </x-forms.layout.layout-field>
                    <x-forms.layout.layout-actions>
                        <x-slot:start>
                            <x-ui.button type="button" variant="ghost" color="danger">Excluir</x-ui.button>
                        </x-slot:start>
                        <x-ui.button type="submit" color="primary">Salvar alterações</x-ui.button>
                    </x-forms.layout.layout-actions>
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Actions align" :code="$actionsCode" :html="$actionsHtml">
            <x-slot:description>
                <code>align="between"</code> + <code>bordered</code> no rodapé de ações.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.layout variant="vertical" gap="sm">
                    <x-forms.layout.layout-field label="Título" name="a_title" placeholder="Documento" />
                    <x-forms.layout.layout-actions align="between" bordered>
                        <x-ui.button type="button" variant="soft" color="secondary">Rascunho</x-ui.button>
                        <div class="flex gap-2">
                            <x-ui.button type="button" variant="outline" color="secondary">Pré-visualizar</x-ui.button>
                            <x-ui.button type="button" color="primary">Publicar</x-ui.button>
                        </div>
                    </x-forms.layout.layout-actions>
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Dense + divided" :code="$denseCode" :html="$denseHtml">
            <x-slot:description>
                <code>dense</code> reduz gaps; <code>divided</code> separa fields com borda.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.layout variant="vertical" dense divided>
                    <x-forms.layout.layout-field label="Projeto" name="d_project" placeholder="Website" />
                    <x-forms.layout.layout-field label="Cliente" name="d_client" placeholder="Acme" />
                    <x-forms.layout.layout-field label="Prazo" name="d_due" type="date" />
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Slot com controles compostos" :code="$slotCode" :html="$slotHtml">
            <x-slot:description>
                O slot do field aceita qualquer controle (<code>input-group</code>,
                <code>select</code>, <code>radio-group</code>, <code>switch</code>…).
            </x-slot:description>
            <div class="w-full max-w-3xl">
                <x-forms.layout variant="horizontal" :label-cols="3">
                    <x-forms.layout.layout-field label="Website" name="site" required>
                        <x-forms.input-group name="site" prepend="https://" append=".com" placeholder="meusite" />
                    </x-forms.layout.layout-field>
                    <x-forms.layout.layout-field label="Plano" name="plan">
                        <x-forms.radio.radio-group name="plan" direction="horizontal">
                            <x-forms.radio label="Free" name="plan" value="free" checked />
                            <x-forms.radio label="Pro" name="plan" value="pro" />
                            <x-forms.radio label="Business" name="plan" value="business" />
                        </x-forms.radio.radio-group>
                    </x-forms.layout.layout-field>
                    <x-forms.layout.layout-field label="Notificações" name="notify">
                        <x-forms.switch label="E-mail semanal" name="notify" />
                    </x-forms.layout.layout-field>
                </x-forms.layout>
            </div>
        </x-ui.example>

        <x-ui.example title="Erro e hint" :code="$errorsCode" :html="$errorsHtml">
            <x-slot:description>
                <code>error</code> força alerta; sem prop, busca em <code>$errors</code> pelo <code>name</code>.
            </x-slot:description>
            <div class="w-full">
                <x-forms.layout variant="horizontal" :label-cols="3">
                    <x-forms.layout.layout-field
                        label="Usuário"
                        name="username"
                        placeholder="handle"
                        error="Este usuário já está em uso."
                        required
                    />
                    <x-forms.layout.layout-field
                        label="Cupom"
                        name="coupon"
                        hint="Deixe em branco se não tiver."
                    />
                </x-forms.layout>
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-layout" />
</x-ui.docs>
