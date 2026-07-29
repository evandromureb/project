<?php

use Livewire\Component;

return new class extends Component
{
    public string $country = 'br';

    /** @var list<string> */
    public array $roles = ['editor'];

    public string $status = '';

    public function save(): void
    {
        $this->validate([
            'country' => ['required', 'string'],
            'roles' => ['required', 'array', 'min:1'],
            'status' => ['required', 'string'],
        ]);
    }
};
?>

@php
    $countries = [
        'br' => 'Brasil',
        'pt' => 'Portugal',
        'us' => 'Estados Unidos',
        'ar' => 'Argentina',
        'cl' => 'Chile',
    ];

    $roleOptions = [
        ['value' => 'admin', 'label' => 'Administrador', 'icon' => 'bi-shield-lock', 'description' => 'Acesso total ao sistema'],
        ['value' => 'editor', 'label' => 'Editor', 'icon' => 'bi-pencil-square', 'description' => 'Pode criar e editar conteúdo'],
        ['value' => 'viewer', 'label' => 'Visualizador', 'icon' => 'bi-eye', 'description' => 'Somente leitura'],
        ['value' => 'billing', 'label' => 'Financeiro', 'icon' => 'bi-credit-card', 'disabled' => true, 'description' => 'Em breve'],
    ];

    $grouped = [
        [
            'label' => 'América',
            'options' => [
                ['value' => 'br', 'label' => 'Brasil', 'icon' => 'bi-flag'],
                ['value' => 'ar', 'label' => 'Argentina', 'icon' => 'bi-flag'],
                ['value' => 'us', 'label' => 'Estados Unidos', 'icon' => 'bi-flag'],
            ],
        ],
        [
            'label' => 'Europa',
            'options' => [
                ['value' => 'pt', 'label' => 'Portugal', 'icon' => 'bi-flag'],
                ['value' => 'es', 'label' => 'Espanha', 'icon' => 'bi-flag'],
                ['value' => 'fr', 'label' => 'França', 'icon' => 'bi-flag'],
            ],
        ],
    ];

    $statuses = [
        ['value' => 'draft', 'label' => 'Rascunho', 'icon' => 'bi-file-earmark'],
        ['value' => 'published', 'label' => 'Publicado', 'icon' => 'bi-check-circle'],
        ['value' => 'archived', 'label' => 'Arquivado', 'icon' => 'bi-archive'],
    ];

    $basicCode = <<<'BLADE'
<x-forms.select
    label="País"
    name="country"
    :options="['br' => 'Brasil', 'pt' => 'Portugal', 'us' => 'Estados Unidos']"
    placeholder="Escolha um país"
/>
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-country" class="text-sm font-medium text-foreground">País</label>
    <div id="select-country" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-country-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Escolha um país</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $valueCode = <<<'BLADE'
<x-forms.select
    label="País"
    name="country"
    value="br"
    :options="['br' => 'Brasil', 'pt' => 'Portugal', 'us' => 'Estados Unidos']"
/>
BLADE;

    $valueHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="br">
    <label for="select-country" class="text-sm font-medium text-foreground">País</label>
    <div id="select-country" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-country-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-foreground">Brasil</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $searchableCode = <<<'BLADE'
<x-forms.select
    label="País"
    name="country"
    searchable
    :options="$countries"
    placeholder="Busque um país…"
    icon="bi-globe2"
/>
BLADE;

    $searchableHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-country" class="text-sm font-medium text-foreground">País</label>
    <div id="select-country" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-country-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-globe2 leading-none text-sm"></i></span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Busque um país…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $multipleCode = <<<'BLADE'
<x-forms.select
    label="Funções"
    name="roles"
    multiple
    searchable
    :options="$roleOptions"
    :max-selected="3"
    counter
    hint="Até 3 funções."
/>
BLADE;

    $multipleHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="[]">
    <label for="select-roles" class="text-sm font-medium text-foreground">Funções</label>
    <div id="select-roles" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-roles-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-wrap">
                <span class="truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p class="mb-0 text-xs text-muted-foreground">Até 3 funções.</p>
        </div>
        <p class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0/3</p>
    </div>
</div>
HTML;

    $richCode = <<<'BLADE'
<x-forms.select
    label="Função"
    name="role"
    :options="$roleOptions"
/>
BLADE;

    $richHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-role" class="text-sm font-medium text-foreground">Função</label>
    <div id="select-role" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-role-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $groupsCode = <<<'BLADE'
<x-forms.select
    label="Região"
    name="region"
    searchable
    :options="$grouped"
/>
BLADE;

    $groupsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-region" class="text-sm font-medium text-foreground">Região</label>
    <div id="select-region" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-region-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
    <!-- Painel (aberto), teleportado para <body> quando open=true -->
    <div class="hidden overflow-hidden rounded-lg border border-border bg-card shadow-lg" role="listbox">
        <div class="border-b border-border p-2"><div class="flex items-center gap-2 rounded-md border border-border bg-muted/40 px-2.5 py-1.5"><i class="bi bi-search text-sm text-muted-foreground" aria-hidden="true"></i><input type="text" placeholder="Buscar…" class="min-w-0 flex-1 bg-transparent text-sm text-foreground outline-none placeholder:text-muted-foreground" autocomplete="off"></div></div>
        <div class="max-h-60 overflow-y-auto py-1">
            <div class="px-3 pb-1 pt-2 text-[10px] font-semibold uppercase tracking-wide text-muted-foreground">América</div>
            <button type="button" role="option" class="flex w-full cursor-pointer items-start gap-2 px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70"><span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center"></span><i class="bi bi-flag mt-0.5 shrink-0 leading-none text-muted-foreground" aria-hidden="true"></i><span class="min-w-0 flex-1"><span class="block truncate font-medium">Brasil</span></span></button>
            <button type="button" role="option" class="flex w-full cursor-pointer items-start gap-2 px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70"><span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center"></span><i class="bi bi-flag mt-0.5 shrink-0 leading-none text-muted-foreground" aria-hidden="true"></i><span class="min-w-0 flex-1"><span class="block truncate font-medium">Argentina</span></span></button>
            <button type="button" role="option" class="flex w-full cursor-pointer items-start gap-2 px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70"><span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center"></span><i class="bi bi-flag mt-0.5 shrink-0 leading-none text-muted-foreground" aria-hidden="true"></i><span class="min-w-0 flex-1"><span class="block truncate font-medium">Estados Unidos</span></span></button>
            <div class="px-3 pb-1 pt-2 text-[10px] font-semibold uppercase tracking-wide text-muted-foreground">Europa</div>
            <button type="button" role="option" class="flex w-full cursor-pointer items-start gap-2 px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70"><span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center"></span><i class="bi bi-flag mt-0.5 shrink-0 leading-none text-muted-foreground" aria-hidden="true"></i><span class="min-w-0 flex-1"><span class="block truncate font-medium">Portugal</span></span></button>
            <button type="button" role="option" class="flex w-full cursor-pointer items-start gap-2 px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70"><span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center"></span><i class="bi bi-flag mt-0.5 shrink-0 leading-none text-muted-foreground" aria-hidden="true"></i><span class="min-w-0 flex-1"><span class="block truncate font-medium">Espanha</span></span></button>
            <button type="button" role="option" class="flex w-full cursor-pointer items-start gap-2 px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70"><span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center"></span><i class="bi bi-flag mt-0.5 shrink-0 leading-none text-muted-foreground" aria-hidden="true"></i><span class="min-w-0 flex-1"><span class="block truncate font-medium">França</span></span></button>
        </div>
    </div>
</div>
HTML;

    $nativeCode = <<<'BLADE'
<x-forms.select
    native
    label="Status"
    name="status"
    :options="['draft' => 'Rascunho', 'published' => 'Publicado', 'archived' => 'Arquivado']"
/>
BLADE;

    $nativeHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="select-status" class="text-sm font-medium text-foreground">Status</label>
    <div class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <select id="select-status" name="status" class="min-w-0 flex-1 appearance-none bg-transparent text-foreground outline-none disabled:cursor-not-allowed h-full w-full">
                <option value="" selected>Selecione…</option>
                <option value="draft">Rascunho</option>
                <option value="published">Publicado</option>
                <option value="archived">Arquivado</option>
            </select>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.select size="sm" label="Pequeno" :options="$statuses" />
<x-forms.select size="md" label="Médio" :options="$statuses" />
<x-forms.select size="lg" label="Grande" :options="$statuses" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-sm" class="text-xs font-medium text-foreground">Pequeno</label>
    <div id="select-sm" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-sm-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-8 text-xs px-2.5 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-md" class="text-sm font-medium text-foreground">Médio</label>
    <div id="select-md" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-md-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-lg" class="text-sm font-medium text-foreground">Grande</label>
    <div id="select-lg" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-lg-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-11 text-base px-3.5 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-base"></i></span>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.select variant="default" label="Default" :options="$statuses" />
<x-forms.select variant="filled" label="Filled" :options="$statuses" />
<x-forms.select variant="flush" label="Flush" :options="$statuses" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-default" class="text-sm font-medium text-foreground">Default</label>
    <div id="select-default" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-default-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-filled" class="text-sm font-medium text-foreground">Filled</label>
    <div id="select-filled" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-filled-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border border-transparent bg-muted shadow-none border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-flush" class="text-sm font-medium text-foreground">Flush</label>
    <div id="select-flush" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-flush-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-none border-0 border-b border-border bg-transparent shadow-none focus-within:ring-0 focus-within:border-b-2 border-border focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.select label="Sucesso" state="success" value="published" :options="$statuses" hint="Campo válido." />
<x-forms.select label="Erro" error="Selecione um status." :options="$statuses" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="published">
    <label for="select-ok" class="text-sm font-medium text-foreground">Sucesso</label>
    <div id="select-ok" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-ok-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-success focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-foreground">Publicado</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p class="mb-0 text-xs text-muted-foreground">Campo válido.</p>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-bad" class="text-sm font-medium text-foreground">Erro</label>
    <div id="select-bad" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-bad-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-danger focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p class="mb-0 text-xs text-danger" role="alert">Selecione um status.</p>
        </div>
    </div>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.select color="primary" label="Primary" :options="$statuses" value="draft" />
<x-forms.select color="success" label="Success" :options="$statuses" value="published" />
<x-forms.select color="warning" label="Warning" :options="$statuses" value="draft" />
<x-forms.select color="danger" label="Danger" :options="$statuses" value="archived" />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="draft">
    <label for="select-c-primary" class="text-sm font-medium text-foreground">Primary</label>
    <div id="select-c-primary" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-c-primary-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-foreground">Rascunho</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="published">
    <label for="select-c-success" class="text-sm font-medium text-foreground">Success</label>
    <div id="select-c-success" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-c-success-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-foreground">Publicado</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="draft">
    <label for="select-c-warning" class="text-sm font-medium text-foreground">Warning</label>
    <div id="select-c-warning" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-c-warning-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-warning focus-within:ring-warning h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-foreground">Rascunho</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="archived">
    <label for="select-c-danger" class="text-sm font-medium text-foreground">Danger</label>
    <div id="select-c-danger" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-c-danger-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-foreground">Arquivado</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $floatingCode = <<<'BLADE'
<x-forms.select floating label="País" searchable :options="$countries" />
<x-forms.select floating label="Funções" multiple :options="$roleOptions" />
BLADE;

    $floatingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <div id="select-float-country" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-float-country-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-12 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1 self-stretch">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap h-full min-h-0 pt-4 pb-1">
                <span class="min-w-0 flex-1 truncate text-muted-foreground"> </span>
            </div>
            <label for="select-float-country" class="pointer-events-none absolute start-0 z-10 top-1/2 -translate-y-1/2 text-sm text-muted-foreground transition-all duration-150 ease-out">País</label>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="[]">
    <div id="select-float-roles" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-float-roles-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-12 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1 self-stretch">
            <div class="flex min-w-0 items-center gap-1.5 flex-wrap h-full min-h-0 pt-4 pb-1">
                <span class="truncate text-muted-foreground"> </span>
            </div>
            <label for="select-float-roles" class="pointer-events-none absolute start-0 z-10 top-1/2 -translate-y-1/2 text-sm text-muted-foreground transition-all duration-150 ease-out">Funções</label>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.select label="Desabilitado" disabled value="br" :options="$countries" />
<x-forms.select label="Readonly" readonly value="pt" :options="$countries" />
<x-forms.select label="Loading" loading :options="$countries" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="br">
    <label for="select-disabled" class="text-sm font-medium text-foreground">Desabilitado</label>
    <div id="select-disabled" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-disabled-listbox" aria-expanded="false" aria-disabled="true" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-not-allowed opacity-60 w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-foreground">Brasil</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="pt">
    <label for="select-readonly" class="text-sm font-medium text-foreground">Readonly</label>
    <div id="select-readonly" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-readonly-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-foreground">Portugal</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="">
    <label for="select-loading" class="text-sm font-medium text-foreground">Loading</label>
    <div id="select-loading" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-loading-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 size-4 shrink-0 self-center animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
    </div>
</div>
HTML;

    $clearableCode = <<<'BLADE'
<x-forms.select label="Com limpar" clearable value="br" :options="$countries" />
<x-forms.select label="Sem limpar" :clearable="false" value="pt" :options="$countries" />
BLADE;

    $clearableHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="br">
    <label for="select-clear-on" class="text-sm font-medium text-foreground">Com limpar</label>
    <div id="select-clear-on" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-clear-on-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-foreground">Brasil</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" value="pt">
    <label for="select-clear-off" class="text-sm font-medium text-foreground">Sem limpar</label>
    <div id="select-clear-off" role="combobox" tabindex="0" aria-haspopup="listbox" aria-controls="select-clear-off-listbox" aria-expanded="false" aria-disabled="false" class="group/select relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3 cursor-pointer w-full">
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 items-center gap-1.5 flex-nowrap">
                <span class="min-w-0 flex-1 truncate text-foreground">Portugal</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground transition-transform duration-150" aria-hidden="true"><i class="bi bi-chevron-down leading-none text-sm"></i></span>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.select&gt;</code> oferece um select customizado (JS puro,
            sem Alpine) com busca, múltipla escolha, grupos, ícones, descrições e teclado — além do
            modo <code>native</code> com <code>&lt;select&gt;</code> nativo. Sync com Livewire via
            <code>wire:model</code> direto no input oculto interno; em formulários clássicos, use
            <code>name</code> (ou <code>name[]</code> no múltiplo).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Passe <code>:options</code> como mapa <code>value =&gt; label</code> ou lista de objetos.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select
                    label="País"
                    name="demo_basic"
                    :options="$countries"
                    placeholder="Escolha um país"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Valor inicial" :code="$valueCode" :html="$valueHtml">
            <x-slot:description>
                Use <code>value</code> (string) ou array no modo <code>multiple</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select
                    label="País"
                    name="demo_value"
                    value="br"
                    :options="$countries"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Busca" :code="$searchableCode" :html="$searchableHtml">
            <x-slot:description>
                <code>searchable</code> adiciona campo de busca no painel (teleportado).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select
                    label="País"
                    name="demo_search"
                    searchable
                    :options="$countries"
                    placeholder="Busque um país…"
                    icon="bi-globe2"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Múltiplo" :code="$multipleCode" :html="$multipleHtml">
            <x-slot:description>
                Chips removíveis, <code>max-selected</code> e <code>counter</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select
                    label="Funções"
                    name="demo_roles"
                    multiple
                    searchable
                    :value="['editor']"
                    :options="$roleOptions"
                    :max-selected="3"
                    counter
                    hint="Até 3 funções."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Ícones + descrição" :code="$richCode" :html="$richHtml">
            <x-slot:description>
                Objetos com <code>icon</code>, <code>description</code> e <code>disabled</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select
                    label="Função"
                    name="demo_rich"
                    :options="$roleOptions"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Grupos" :code="$groupsCode" :html="$groupsHtml">
            <x-slot:description>
                Grupos via <code>['label' =&gt; …, 'options' =&gt; […]]</code> ou chave <code>group</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select
                    label="Região"
                    name="demo_groups"
                    searchable
                    :options="$grouped"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Nativo" :code="$nativeCode" :html="$nativeHtml">
            <x-slot:description>
                <code>native</code> renderiza um <code>&lt;select&gt;</code> real (acessibilidade/OS).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select
                    native
                    label="Status"
                    name="demo_native"
                    :options="['draft' => 'Rascunho', 'published' => 'Publicado', 'archived' => 'Arquivado']"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Limpar" :code="$clearableCode" :html="$clearableHtml">
            <x-slot:description>
                <code>clearable</code> (padrão <code>true</code>) mostra o botão X.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select label="Com limpar" name="demo_clear_on" clearable value="br" :options="$countries" />
                <x-forms.select label="Sem limpar" name="demo_clear_off" :clearable="false" value="pt" :options="$countries" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select size="sm" label="Pequeno" name="demo_sm" :options="$statuses" />
                <x-forms.select size="md" label="Médio" name="demo_md" :options="$statuses" />
                <x-forms.select size="lg" label="Grande" name="demo_lg" :options="$statuses" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Mesmas variantes do input: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select variant="default" label="Default" name="demo_v_default" :options="$statuses" />
                <x-forms.select variant="filled" label="Filled" name="demo_v_filled" :options="$statuses" />
                <x-forms.select variant="flush" label="Flush" name="demo_v_flush" :options="$statuses" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> / <code>error</code> com detecção automática via <code>$errors</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select label="Sucesso" name="demo_ok" state="success" value="published" :options="$statuses" hint="Campo válido." />
                <x-forms.select label="Erro" name="demo_bad" error="Selecione um status." :options="$statuses" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores de foco" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> controla o anel de foco (tokens do tema).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2">
                <x-forms.select color="primary" label="Primary" name="demo_c_primary" :options="$statuses" value="draft" />
                <x-forms.select color="success" label="Success" name="demo_c_success" :options="$statuses" value="published" />
                <x-forms.select color="warning" label="Warning" name="demo_c_warning" :options="$statuses" value="draft" />
                <x-forms.select color="danger" label="Danger" name="demo_c_danger" :options="$statuses" value="archived" />
            </div>
        </x-ui.example>

        <x-ui.example title="Floating label" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                <code>floating</code> sobe com foco, painel aberto ou valor selecionado.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select floating label="País" name="demo_float" searchable :options="$countries" />
                <x-forms.select floating label="Funções" name="demo_float_multi" multiple :options="$roleOptions" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Estados de interação do controle.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select label="Desabilitado" disabled value="br" :options="$countries" />
                <x-forms.select label="Readonly" readonly value="pt" :options="$countries" />
                <x-forms.select label="Loading" loading :options="$countries" />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-select" />
</x-ui.docs>
