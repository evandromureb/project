<?php

use Livewire\Component;

return new class extends Component
{
    public string $password = '';

    public string $password_confirmation = '';

    public function save(): void
    {
        $this->validate([
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.input-password label="Senha" name="password" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-password-password" class="text-sm font-medium text-foreground">Senha</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="password" id="input-password-password" name="password" placeholder="Digite sua senha" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha">
                <i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
HTML;

    $newCode = <<<'BLADE'
<x-forms.input-password
    mode="new"
    label="Nova senha"
    name="password"
    required
    hint="Use letras, números e um símbolo."
/>
BLADE;

    $newHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-password-password" class="text-sm font-medium text-foreground">
        Nova senha <span class="text-danger" aria-hidden="true">*</span>
    </label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="password" id="input-password-password" name="password" placeholder="Crie uma senha" autocomplete="new-password" required aria-describedby="input-password-password-hint input-password-password-strength input-password-password-rules input-password-password-caps" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Gerar senha" title="Gerar senha">
                <i class="bi bi-magic text-sm leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha">
                <i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div id="input-password-password-strength" class="flex flex-col gap-1.5" aria-live="polite">
        <div class="flex items-center justify-between gap-3">
            <span class="text-xs text-muted-foreground">Força da senha</span>
            <span class="text-xs font-medium"></span>
        </div>
        <div class="h-1.5 w-full overflow-hidden rounded-full bg-muted" aria-hidden="true">
            <div class="h-full rounded-full transition-all duration-200 ease-out"></div>
        </div>
    </div>
    <ul id="input-password-password-rules" class="mb-0 flex list-none flex-col gap-1 p-0" aria-label="Requisitos da senha">
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Mínimo de 8 caracteres</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Uma letra maiúscula</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Uma letra minúscula</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Um número</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Um símbolo</span></li>
    </ul>
    <div class="min-w-0">
        <p id="input-password-password-hint" class="mb-0 text-xs text-muted-foreground">Use letras, números e um símbolo.</p>
    </div>
</div>
HTML;

    $toggleHoldCode = <<<'BLADE'
<x-forms.input-password
    label="Senha"
    name="password"
    toggle-mode="hold"
    hint="Segure o olho para revelar."
/>
BLADE;

    $toggleHoldHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-password-password" class="text-sm font-medium text-foreground">Senha</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="password" id="input-password-password" name="password" placeholder="Digite sua senha" autocomplete="current-password" aria-describedby="input-password-password-hint" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha" title="Segure para revelar">
                <i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div class="min-w-0">
        <p id="input-password-password-hint" class="mb-0 text-xs text-muted-foreground">Segure o olho para revelar.</p>
    </div>
</div>
HTML;

    $noToggleCode = <<<'BLADE'
<x-forms.input-password label="Senha" name="pin" :toggle="false" />
BLADE;

    $noToggleHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-password-pin" class="text-sm font-medium text-foreground">Senha</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="password" id="input-password-pin" name="pin" placeholder="Digite sua senha" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
        </div>
    </div>
</div>
HTML;

    $actionsCode = <<<'BLADE'
<x-forms.input-password
    mode="new"
    label="Senha"
    name="password"
    copyable
    :rules="false"
/>
BLADE;

    $actionsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-password-password" class="text-sm font-medium text-foreground">Senha</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="password" id="input-password-password" name="password" placeholder="Crie uma senha" autocomplete="new-password" aria-describedby="input-password-password-strength input-password-password-caps" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Gerar senha" title="Gerar senha">
                <i class="bi bi-magic text-sm leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Copiar senha" title="Copiar senha">
                <i class="bi bi-clipboard text-sm leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha">
                <i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div id="input-password-password-strength" class="flex flex-col gap-1.5" aria-live="polite">
        <div class="flex items-center justify-between gap-3">
            <span class="text-xs text-muted-foreground">Força da senha</span>
            <span class="text-xs font-medium"></span>
        </div>
        <div class="h-1.5 w-full overflow-hidden rounded-full bg-muted" aria-hidden="true">
            <div class="h-full rounded-full transition-all duration-200 ease-out"></div>
        </div>
    </div>
</div>
HTML;

    $strengthOnlyCode = <<<'BLADE'
<x-forms.input-password
    label="Senha"
    name="password"
    strength
    :rules="false"
    :generate="false"
/>
BLADE;

    $strengthOnlyHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-password-password" class="text-sm font-medium text-foreground">Senha</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="password" id="input-password-password" name="password" placeholder="Digite sua senha" autocomplete="current-password" aria-describedby="input-password-password-strength input-password-password-caps" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha">
                <i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div id="input-password-password-strength" class="flex flex-col gap-1.5" aria-live="polite">
        <div class="flex items-center justify-between gap-3">
            <span class="text-xs text-muted-foreground">Força da senha</span>
            <span class="text-xs font-medium"></span>
        </div>
        <div class="h-1.5 w-full overflow-hidden rounded-full bg-muted" aria-hidden="true">
            <div class="h-full rounded-full transition-all duration-200 ease-out"></div>
        </div>
    </div>
</div>
HTML;

    $customRulesCode = <<<'BLADE'
<x-forms.input-password
    mode="new"
    label="Senha forte"
    name="password"
    :min-length="12"
    :require-symbol="false"
    :generator-length="20"
/>
BLADE;

    $customRulesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="input-password-password" class="text-sm font-medium text-foreground">Senha forte</label>
    <div class="flex w-full items-stretch">
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <input type="password" id="input-password-password" name="password" placeholder="Crie uma senha" autocomplete="new-password" aria-describedby="input-password-password-strength input-password-password-rules input-password-password-caps" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full">
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Gerar senha" title="Gerar senha">
                <i class="bi bi-magic text-sm leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha">
                <i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div id="input-password-password-strength" class="flex flex-col gap-1.5" aria-live="polite">
        <div class="flex items-center justify-between gap-3">
            <span class="text-xs text-muted-foreground">Força da senha</span>
            <span class="text-xs font-medium"></span>
        </div>
        <div class="h-1.5 w-full overflow-hidden rounded-full bg-muted" aria-hidden="true">
            <div class="h-full rounded-full transition-all duration-200 ease-out"></div>
        </div>
    </div>
    <ul id="input-password-password-rules" class="mb-0 flex list-none flex-col gap-1 p-0" aria-label="Requisitos da senha">
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Mínimo de 12 caracteres</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Uma letra maiúscula</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Uma letra minúscula</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Um número</span></li>
    </ul>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.input-password size="sm" label="Pequeno" name="p_sm" :strength="false" :rules="false" :generate="false" />
<x-forms.input-password size="md" label="Médio" name="p_md" :strength="false" :rules="false" :generate="false" />
<x-forms.input-password size="lg" label="Grande" name="p_lg" :strength="false" :rules="false" :generate="false" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-password-p_sm" class="text-xs font-medium text-foreground">Pequeno</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-8 text-xs px-2.5 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" id="input-password-p_sm" name="p_sm" placeholder="Digite sua senha" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-password-p_md" class="text-sm font-medium text-foreground">Médio</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" id="input-password-p_md" name="p_md" placeholder="Digite sua senha" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-password-p_lg" class="text-sm font-medium text-foreground">Grande</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-11 text-base px-3.5 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-base"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" id="input-password-p_lg" name="p_lg" placeholder="Digite sua senha" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.input-password variant="default" label="Default" name="v_default" :strength="false" :rules="false" :generate="false" />
<x-forms.input-password variant="filled" label="Filled" name="v_filled" :strength="false" :rules="false" :generate="false" />
<x-forms.input-password variant="flush" label="Flush" name="v_flush" :strength="false" :rules="false" :generate="false" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-password-v_default" class="text-sm font-medium text-foreground">Default</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" id="input-password-v_default" name="v_default" placeholder="Digite sua senha" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-password-v_filled" class="text-sm font-medium text-foreground">Filled</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border border-transparent bg-muted shadow-none border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" id="input-password-v_filled" name="v_filled" placeholder="Digite sua senha" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-password-v_flush" class="text-sm font-medium text-foreground">Flush</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-none border-0 border-b border-border bg-transparent shadow-none focus-within:ring-0 focus-within:border-b-2 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" id="input-password-v_flush" name="v_flush" placeholder="Digite sua senha" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.input-password label="Sucesso" name="ok" state="success" value="Segura!123" :strength="false" :rules="false" :generate="false" />
<x-forms.input-password label="Erro" name="bad" error="Senha inválida." :strength="false" :rules="false" :generate="false" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-password-ok" class="text-sm font-medium text-foreground">Sucesso</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-success focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" id="input-password-ok" name="ok" value="Segura!123" placeholder="Digite sua senha" autocomplete="current-password" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-password-bad" class="text-sm font-medium text-foreground">Erro</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-danger focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" id="input-password-bad" name="bad" placeholder="Digite sua senha" autocomplete="current-password" aria-invalid="true" aria-describedby="input-password-bad-error" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="min-w-0"><p id="input-password-bad-error" class="mb-0 text-xs text-danger" role="alert">Senha inválida.</p></div>
    </div>
</div>
HTML;

    $floatingCode = <<<'BLADE'
<x-forms.input-password floating label="Senha" name="float_current" :strength="false" :rules="false" :generate="false" />
<x-forms.input-password floating mode="new" label="Nova senha" name="float_new" />
BLADE;

    $floatingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1 h-full">
                    <input type="password" id="input-password-float_current" name="float_current" placeholder=" " autocomplete="current-password" class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                    <label for="input-password-float_current" class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1/2 -translate-y-1/2 text-sm">Senha</label>
                </div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-12 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1 h-full">
                    <input type="password" id="input-password-float_new" name="float_new" placeholder=" " autocomplete="new-password" aria-describedby="input-password-float_new-strength input-password-float_new-rules input-password-float_new-caps" class="peer h-full w-full placeholder-transparent pt-4 pb-1 min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                    <label for="input-password-float_new" class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1/2 -translate-y-1/2 text-sm">Nova senha</label>
                </div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Gerar senha" title="Gerar senha"><i class="bi bi-magic text-sm leading-none" aria-hidden="true"></i></button>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div id="input-password-float_new-strength" class="flex flex-col gap-1.5" aria-live="polite">
        <div class="flex items-center justify-between gap-3">
            <span class="text-xs text-muted-foreground">Força da senha</span>
            <span class="text-xs font-medium"></span>
        </div>
        <div class="h-1.5 w-full overflow-hidden rounded-full bg-muted" aria-hidden="true">
            <div class="h-full rounded-full transition-all duration-200 ease-out"></div>
        </div>
    </div>
    <ul id="input-password-float_new-rules" class="mb-0 flex list-none flex-col gap-1 p-0" aria-label="Requisitos da senha">
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Mínimo de 8 caracteres</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Uma letra maiúscula</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Uma letra minúscula</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Um número</span></li>
        <li class="flex items-center gap-1.5 text-xs text-muted-foreground"><i class="bi bi-circle leading-none" aria-hidden="true"></i><span>Um símbolo</span></li>
    </ul>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.input-password label="Desabilitado" disabled value="secret" :strength="false" :rules="false" :generate="false" />
<x-forms.input-password label="Readonly" readonly value="secret" :strength="false" :rules="false" :generate="false" />
<x-forms.input-password label="Loading" loading :strength="false" :rules="false" :generate="false" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Desabilitado</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-not-allowed opacity-60 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" value="secret" placeholder="Digite sua senha" autocomplete="current-password" disabled class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <button type="button" disabled class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Readonly</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-text w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" value="secret" placeholder="Digite sua senha" autocomplete="current-password" readonly class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Loading</label>
        <div class="flex w-full items-stretch">
            <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-not-allowed opacity-60 w-full">
                <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-lock leading-none text-sm"></i></span>
                <div class="relative min-w-0 flex-1"><input type="password" placeholder="Digite sua senha" autocomplete="current-password" disabled class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default h-full w-full"></div>
                <span class="relative z-10 size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
                <button type="button" disabled class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-md p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Mostrar senha"><i class="bi bi-eye text-sm leading-none" aria-hidden="true"></i></button>
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
            O componente <code>&lt;x-forms.input-password&gt;</code> é o campo de senha completo:
            toggle de visibilidade (clique ou segurar), medidor de força, checklist de requisitos,
            aviso de Caps Lock, gerar senha e copiar. Use <code>mode="current"</code> no login e
            <code>mode="new"</code> no cadastro/alteração — o modo novo liga força, regras e gerar
            por padrão.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico (login)" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Padrão <code>mode="current"</code>: toggle + Caps Lock, sem medidor/gerar.
            </x-slot:description>
            <form onsubmit="return false;" class="w-full max-w-md">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password label="Senha" name="demo_password" />
            </form>
        </x-ui.example>

        <x-ui.example title="Nova senha" :code="$newCode" :html="$newHtml">
            <x-slot:description>
                <code>mode="new"</code> ativa força, requisitos e botão gerar.
            </x-slot:description>
            <form onsubmit="return false;" class="w-full max-w-md">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password
                    mode="new"
                    label="Nova senha"
                    name="demo_new_password"
                    required
                    hint="Use letras, números e um símbolo."
                />
            </form>
        </x-ui.example>

        <x-ui.example title="Toggle: segurar" :code="$toggleHoldCode" :html="$toggleHoldHtml">
            <x-slot:description>
                <code>toggle-mode="hold"</code> revela só enquanto o botão está pressionado.
            </x-slot:description>
            <form onsubmit="return false;" class="w-full max-w-md">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password
                    label="Senha"
                    name="demo_hold"
                    toggle-mode="hold"
                    hint="Segure o olho para revelar."
                />
            </form>
        </x-ui.example>

        <x-ui.example title="Sem toggle" :code="$noToggleCode" :html="$noToggleHtml">
            <x-slot:description>
                Desligue com <code>:toggle="false"</code>.
            </x-slot:description>
            <form onsubmit="return false;" class="w-full max-w-md">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password label="Senha" name="demo_pin" :toggle="false" />
            </form>
        </x-ui.example>

        <x-ui.example title="Gerar + copiar" :code="$actionsCode" :html="$actionsHtml">
            <x-slot:description>
                <code>copyable</code> e gerar (ligado em <code>mode="new"</code>).
            </x-slot:description>
            <form onsubmit="return false;" class="w-full max-w-md">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password
                    mode="new"
                    label="Senha"
                    name="demo_actions"
                    copyable
                    :rules="false"
                />
            </form>
        </x-ui.example>

        <x-ui.example title="Só medidor de força" :code="$strengthOnlyCode" :html="$strengthOnlyHtml">
            <x-slot:description>
                Force <code>strength</code> mesmo em <code>mode="current"</code>.
            </x-slot:description>
            <form onsubmit="return false;" class="w-full max-w-md">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password
                    label="Senha"
                    name="demo_strength"
                    strength
                    :rules="false"
                    :generate="false"
                />
            </form>
        </x-ui.example>

        <x-ui.example title="Regras customizadas" :code="$customRulesCode" :html="$customRulesHtml">
            <x-slot:description>
                Ajuste <code>min-length</code>, <code>require-*</code> e <code>generator-length</code>.
            </x-slot:description>
            <form onsubmit="return false;" class="w-full max-w-md">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password
                    mode="new"
                    label="Senha forte"
                    name="demo_custom_rules"
                    :min-length="12"
                    :require-symbol="false"
                    :generator-length="20"
                />
            </form>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <form onsubmit="return false;" class="flex w-full max-w-md flex-col gap-4">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password size="sm" label="Pequeno" name="demo_sm" :strength="false" :rules="false" :generate="false" />
                <x-forms.input-password size="md" label="Médio" name="demo_md" :strength="false" :rules="false" :generate="false" />
                <x-forms.input-password size="lg" label="Grande" name="demo_lg" :strength="false" :rules="false" :generate="false" />
            </form>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Mesmas variantes do input: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <form onsubmit="return false;" class="flex w-full max-w-md flex-col gap-4">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password variant="default" label="Default" name="demo_v_default" :strength="false" :rules="false" :generate="false" />
                <x-forms.input-password variant="filled" label="Filled" name="demo_v_filled" :strength="false" :rules="false" :generate="false" />
                <x-forms.input-password variant="flush" label="Flush" name="demo_v_flush" :strength="false" :rules="false" :generate="false" />
            </form>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> / <code>error</code> com detecção automática via <code>$errors</code>.
            </x-slot:description>
            <form onsubmit="return false;" class="flex w-full max-w-md flex-col gap-4">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password label="Sucesso" name="demo_ok" state="success" value="Segura!123" :strength="false" :rules="false" :generate="false" />
                <x-forms.input-password label="Erro" name="demo_bad" error="Senha inválida." :strength="false" :rules="false" :generate="false" />
            </form>
        </x-ui.example>

        <x-ui.example title="Floating label" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                <code>floating</code> com a mesma lógica Alpine do input.
            </x-slot:description>
            <form onsubmit="return false;" class="flex w-full max-w-md flex-col gap-4">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password floating label="Senha" name="demo_float_current" :strength="false" :rules="false" :generate="false" />
                <x-forms.input-password floating mode="new" label="Nova senha" name="demo_float_new" />
            </form>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Estados de interação do controle.
            </x-slot:description>
            <form onsubmit="return false;" class="flex w-full max-w-md flex-col gap-4">
                <input type="text" name="username" autocomplete="username" class="sr-only" tabindex="-1" aria-hidden="true">
                <x-forms.input-password label="Desabilitado" disabled value="secret" :strength="false" :rules="false" :generate="false" />
                <x-forms.input-password label="Readonly" readonly value="secret" :strength="false" :rules="false" :generate="false" />
                <x-forms.input-password label="Loading" loading :strength="false" :rules="false" :generate="false" />
            </form>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-input-password" />
</x-ui.docs>
