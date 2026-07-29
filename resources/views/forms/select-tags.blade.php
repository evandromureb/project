<?php

use Livewire\Component;

return new class extends Component
{
    /** @var list<string> */
    public array $skills = ['laravel', 'alpine'];

    /** @var list<string> */
    public array $cities = [];

    public function save(): void
    {
        $this->validate([
            'skills' => ['required', 'array', 'min:1'],
            'skills.*' => ['string'],
            'cities' => ['nullable', 'array'],
            'cities.*' => ['string'],
        ]);
    }
};
?>

@php
    $frameworks = [
        ['value' => 'laravel', 'label' => 'Laravel', 'icon' => 'bi-braces', 'description' => 'PHP framework', 'group' => 'Backend'],
        ['value' => 'symfony', 'label' => 'Symfony', 'icon' => 'bi-braces', 'description' => 'PHP framework', 'group' => 'Backend'],
        ['value' => 'livewire', 'label' => 'Livewire', 'icon' => 'bi-lightning', 'description' => 'Full-stack PHP', 'group' => 'Backend'],
        ['value' => 'alpine', 'label' => 'Alpine.js', 'icon' => 'bi-wind', 'description' => 'Minimal JS', 'group' => 'Frontend'],
        ['value' => 'vue', 'label' => 'Vue', 'icon' => 'bi-filetype-js', 'description' => 'UI framework', 'group' => 'Frontend'],
        ['value' => 'react', 'label' => 'React', 'icon' => 'bi-filetype-js', 'description' => 'UI library', 'group' => 'Frontend'],
        ['value' => 'tailwind', 'label' => 'Tailwind CSS', 'icon' => 'bi-palette', 'description' => 'Utility-first CSS', 'group' => 'Frontend'],
        ['value' => 'pest', 'label' => 'Pest', 'icon' => 'bi-bug', 'description' => 'Testing', 'group' => 'Qualidade'],
        ['value' => 'phpunit', 'label' => 'PHPUnit', 'icon' => 'bi-bug', 'description' => 'Testing', 'group' => 'Qualidade'],
    ];

    $roles = [
        'admin' => 'Administrador',
        'editor' => 'Editor',
        'author' => 'Autor',
        'viewer' => 'Visualizador',
        'billing' => 'Financeiro',
        'support' => 'Suporte',
    ];

    $demoUrl = route('forms.autocomplete-demo');

    $basicCode = <<<'BLADE'
<x-forms.select-tags
    label="Skills"
    name="skills"
    :options="$frameworks"
    placeholder="Buscar e adicionar…"
/>
BLADE;

    $valueCode = <<<'BLADE'
<x-forms.select-tags
    label="Skills"
    name="skills"
    :value="['laravel', 'alpine']"
    :options="$frameworks"
/>
BLADE;

    $createCode = <<<'BLADE'
<x-forms.select-tags
    label="Tags"
    name="tags"
    allow-create
    :options="$frameworks"
    create-text="Adicionar"
    hint="Enter cria um valor novo se não houver match."
/>
BLADE;

    $limitsCode = <<<'BLADE'
<x-forms.select-tags
    label="Até 4 skills"
    name="limited"
    :options="$frameworks"
    :max-selected="4"
    counter
/>
BLADE;

    $overflowCode = <<<'BLADE'
<x-forms.select-tags
    label="Visíveis"
    name="visible"
    :value="['laravel', 'symfony', 'livewire', 'alpine', 'vue', 'react']"
    :options="$frameworks"
    :max-visible="3"
    hint="“+N mais” expande as tags ocultas."
/>
BLADE;

    $selectAllCode = <<<'BLADE'
<x-forms.select-tags
    label="Funções"
    name="roles"
    :options="$roles"
    select-all
    :hide-selected="false"
    hint="Checkbox na lista; clique de novo desmarca."
/>
BLADE;

    $remoteCode = <<<'BLADE'
<x-forms.select-tags
    label="Cidades"
    name="cities"
    :url="route('forms.autocomplete-demo')"
    :min-chars="1"
    :debounce="300"
    placeholder="Busque uma cidade…"
/>
BLADE;

    $tagStylesCode = <<<'BLADE'
<x-forms.select-tags label="Soft" :value="['laravel']" :options="$frameworks" tag-color="info" tag-variant="soft" />
<x-forms.select-tags label="Solid" :value="['alpine']" :options="$frameworks" tag-color="success" tag-variant="solid" />
<x-forms.select-tags label="Outline" :value="['vue']" :options="$frameworks" tag-color="warning" tag-variant="outline" />
<x-forms.select-tags label="Soft border" :value="['pest']" :options="$frameworks" tag-color="danger" tag-variant="soft-border" />
BLADE;

    $sizesCode = <<<'BLADE'
<x-forms.select-tags size="sm" label="Pequeno" :options="$roles" />
<x-forms.select-tags size="md" label="Médio" :options="$roles" />
<x-forms.select-tags size="lg" label="Grande" :options="$roles" />
BLADE;

    $variantsCode = <<<'BLADE'
<x-forms.select-tags variant="default" label="Default" :options="$roles" />
<x-forms.select-tags variant="filled" label="Filled" :options="$roles" />
<x-forms.select-tags variant="flush" label="Flush" :options="$roles" />
BLADE;

    $statesCode = <<<'BLADE'
<x-forms.select-tags label="Sucesso" state="success" :value="['laravel']" :options="$frameworks" hint="Campo válido." />
<x-forms.select-tags label="Erro" error="Selecione ao menos um item." :options="$frameworks" />
BLADE;

    $floatingCode = <<<'BLADE'
<x-forms.select-tags floating label="Skills" :value="['laravel', 'alpine']" :options="$frameworks" />
BLADE;

    $disabledCode = <<<'BLADE'
<x-forms.select-tags label="Desabilitado" disabled :value="['laravel']" :options="$frameworks" />
<x-forms.select-tags label="Readonly" readonly :value="['alpine']" :options="$frameworks" />
<x-forms.select-tags label="Loading" loading :options="$frameworks" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Skills</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $valueHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Skills</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Laravel</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Laravel"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Alpine.js</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Alpine.js"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <input type="text" placeholder="" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $createHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Tags</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Enter cria um valor novo se não houver match.</p>
</div>
HTML;

    $limitsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Até 4 skills</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0/4</p>
    </div>
</div>
HTML;

    $overflowHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Visíveis</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Laravel</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Laravel"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Symfony</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Symfony"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Livewire</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Livewire"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <button type="button" class="inline-flex cursor-pointer items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary opacity-90 hover:opacity-100" aria-label="Mostrar 3 mais">+3 mais</button>
                <input type="text" placeholder="" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">"+N mais" expande as tags ocultas.</p>
</div>
HTML;

    $selectAllHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Funções</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Checkbox na lista; clique de novo desmarca.</p>
</div>
HTML;

    $remoteHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Cidades</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Busque uma cidade…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $tagStylesHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Soft</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-info/15 px-1.5 py-px text-[11px] leading-4 font-medium text-info">
                    <span class="max-w-[10rem] truncate">Laravel</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Laravel"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <input type="text" placeholder="" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Solid</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-success px-1.5 py-px text-[11px] leading-4 font-medium text-success-foreground">
                    <span class="max-w-[10rem] truncate">Alpine.js</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Alpine.js"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <input type="text" placeholder="" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Outline</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md border border-warning bg-transparent px-1.5 py-px text-[11px] leading-4 font-medium text-warning">
                    <span class="max-w-[10rem] truncate">Vue</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Vue"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <input type="text" placeholder="" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Soft border</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md border border-danger/50 bg-danger/15 px-1.5 py-px text-[11px] leading-4 font-medium text-danger">
                    <span class="max-w-[10rem] truncate">Pest</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Pest"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <input type="text" placeholder="" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $sizesHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-xs font-medium text-foreground">Pequeno</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-8 text-xs px-2.5 py-1">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Médio</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Grande</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-11 text-base px-3.5 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-base leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-base leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $variantsHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Default</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Filled</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border border-transparent bg-muted shadow-none border-border transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Flush</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-none border-0 border-b border-border bg-transparent shadow-none border-border transition-colors focus-within:ring-0 focus-within:border-b-2 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $statesHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Sucesso</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-success transition-colors focus-within:border-success focus-within:ring-2 focus-within:ring-success focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Laravel</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Laravel"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <input type="text" placeholder="" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Campo válido.</p>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Erro</label>
    <div aria-invalid="true" class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-danger transition-colors focus-within:border-danger focus-within:ring-2 focus-within:ring-danger focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-danger" role="alert">Selecione ao menos um item.</p>
</div>
HTML;

    $floatingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-12 text-sm px-3">
        <span class="relative z-10 inline-flex shrink-0 self-stretch items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1 self-stretch">
            <div class="flex h-full min-h-0 min-w-0 flex-wrap items-center gap-1.5 pt-4 pb-1">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Laravel</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Laravel"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Alpine.js</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Alpine.js"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
                <input type="text" placeholder=" " autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-transparent py-0">
            </div>
            <label class="pointer-events-none absolute start-0 z-10 top-1.5 translate-y-0 text-xs text-muted-foreground transition-all duration-150 ease-out">Skills</label>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 self-center cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $disabledHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Desabilitado</label>
    <div class="group/select relative flex w-full cursor-not-allowed items-center gap-2 rounded-lg border bg-card shadow-sm border-border opacity-60 transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Laravel</span>
                </span>
                <input type="text" placeholder="" autocomplete="off" disabled class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Readonly</label>
    <div class="group/select relative flex w-full cursor-text items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Alpine.js</span>
                </span>
                <input type="text" placeholder="" autocomplete="off" readonly class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground read-only:cursor-default">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Loading</label>
    <div class="group/select relative flex w-full cursor-not-allowed items-center gap-2 rounded-lg border bg-card shadow-sm border-border opacity-60 transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-tags text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Buscar e adicionar…" autocomplete="off" disabled class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed">
            </div>
        </div>
        <span class="relative z-10 size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O <code>&lt;x-forms.select-tags&gt;</code> é um multi-select orientado a tags:
            escolhe opções (locais ou remotas), mostra chips removíveis, permite criar valores,
            colapsar com <code>max-visible</code>, selecionar todos, estilizar tags
            (<code>tag-color</code> / <code>tag-variant</code>) e sincronizar com Livewire via
            <code>x-modelable="value"</code>. Diferente do <code>input-tags</code>, as opções
            vêm de uma lista estruturada (value/label/ícone/grupo).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Digite para filtrar. Painel permanece aberto ao selecionar
                (<code>:close-on-select="false"</code> por padrão).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-tags
                    label="Skills"
                    name="demo_basic"
                    :options="$frameworks"
                    placeholder="Buscar e adicionar…"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Valor inicial" :code="$valueCode" :html="$valueHtml">
            <x-slot:description>
                <code>value</code> aceita array ou CSV; chips usam label/ícone da opção.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-tags
                    label="Skills"
                    name="demo_value"
                    :value="['laravel', 'alpine']"
                    :options="$frameworks"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Criar valor" :code="$createCode" :html="$createHtml">
            <x-slot:description>
                <code>allow-create</code> oferece “Criar «texto»” quando não há match.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-tags
                    label="Tags"
                    name="demo_create"
                    allow-create
                    :options="$frameworks"
                    create-text="Adicionar"
                    hint="Enter cria um valor novo se não houver match."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Limite + contador" :code="$limitsCode" :html="$limitsHtml">
            <x-slot:description>
                <code>max-selected</code> limita e ativa o contador automaticamente.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-tags
                    label="Até 4 skills"
                    name="demo_limit"
                    :options="$frameworks"
                    :max-selected="4"
                    counter
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Overflow (+N mais)" :code="$overflowCode" :html="$overflowHtml">
            <x-slot:description>
                <code>max-visible</code> colapsa tags extras; clique em “+N mais” / “Menos”.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-tags
                    label="Visíveis"
                    name="demo_overflow"
                    :value="['laravel', 'symfony', 'livewire', 'alpine', 'vue', 'react']"
                    :options="$frameworks"
                    :max-visible="3"
                    hint="“+N mais” expande as tags ocultas."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Select all + toggle" :code="$selectAllCode" :html="$selectAllHtml">
            <x-slot:description>
                <code>select-all</code> e <code>:hide-selected="false"</code> mostram checkbox
                e permitem desmarcar na lista.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-tags
                    label="Funções"
                    name="demo_select_all"
                    :options="$roles"
                    select-all
                    :hide-selected="false"
                    hint="Checkbox na lista; clique de novo desmarca."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Busca remota (URL)" :code="$remoteCode" :html="$remoteHtml">
            <x-slot:description>
                <code>url</code> faz <code>GET ?q=</code> com debounce e abort.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-tags
                    label="Cidades"
                    name="demo_remote"
                    :url="$demoUrl"
                    :min-chars="1"
                    :debounce="300"
                    placeholder="Busque uma cidade…"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Estilo das tags" :code="$tagStylesCode" :html="$tagStylesHtml">
            <x-slot:description>
                <code>tag-color</code> + <code>tag-variant</code>: soft, solid, outline, soft-border.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-tags label="Soft" name="demo_tag_soft" :value="['laravel']" :options="$frameworks" tag-color="info" tag-variant="soft" />
                <x-forms.select-tags label="Solid" name="demo_tag_solid" :value="['alpine']" :options="$frameworks" tag-color="success" tag-variant="solid" />
                <x-forms.select-tags label="Outline" name="demo_tag_outline" :value="['vue']" :options="$frameworks" tag-color="warning" tag-variant="outline" />
                <x-forms.select-tags label="Soft border" name="demo_tag_border" :value="['pest']" :options="$frameworks" tag-color="danger" tag-variant="soft-border" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-tags size="sm" label="Pequeno" name="demo_sm" :options="$roles" />
                <x-forms.select-tags size="md" label="Médio" name="demo_md" :options="$roles" />
                <x-forms.select-tags size="lg" label="Grande" name="demo_lg" :options="$roles" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Mesmas variantes do input: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-tags variant="default" label="Default" name="demo_v_default" :options="$roles" />
                <x-forms.select-tags variant="filled" label="Filled" name="demo_v_filled" :options="$roles" />
                <x-forms.select-tags variant="flush" label="Flush" name="demo_v_flush" :options="$roles" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> / <code>error</code> com detecção automática via <code>$errors</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-tags label="Sucesso" name="demo_ok" state="success" :value="['laravel']" :options="$frameworks" hint="Campo válido." />
                <x-forms.select-tags label="Erro" name="demo_bad" error="Selecione ao menos um item." :options="$frameworks" />
            </div>
        </x-ui.example>

        <x-ui.example title="Floating label" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                Sobe com foco, painel aberto, query ou tags.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-tags floating label="Skills" name="demo_float" :value="['laravel', 'alpine']" :options="$frameworks" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Estados de interação do controle.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-tags label="Desabilitado" disabled :value="['laravel']" :options="$frameworks" />
                <x-forms.select-tags label="Readonly" readonly :value="['alpine']" :options="$frameworks" />
                <x-forms.select-tags label="Loading" loading :options="$frameworks" />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api component="forms/select-tags/select-tags" title="x-forms.select-tags" />
</x-ui.docs>
