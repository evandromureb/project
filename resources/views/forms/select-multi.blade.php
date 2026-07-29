<?php

use Livewire\Component;

return new class extends Component
{
    /** @var list<string> */
    public array $roles = ['editor', 'author'];

    /** @var list<string> */
    public array $skills = [];

    /** @var list<string> */
    public array $cities = [];

    public function save(): void
    {
        $this->validate([
            'roles' => ['required', 'array', 'min:1'],
            'roles.*' => ['string'],
            'skills' => ['nullable', 'array'],
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

    $permissions = [
        ['label' => 'Conteúdo', 'options' => [
            ['value' => 'posts.read', 'label' => 'Ler posts'],
            ['value' => 'posts.write', 'label' => 'Escrever posts'],
            ['value' => 'posts.delete', 'label' => 'Excluir posts'],
        ]],
        ['label' => 'Usuários', 'options' => [
            ['value' => 'users.read', 'label' => 'Ver usuários'],
            ['value' => 'users.manage', 'label' => 'Gerenciar usuários'],
        ]],
        ['label' => 'Sistema', 'options' => [
            ['value' => 'settings', 'label' => 'Configurações'],
            ['value' => 'billing', 'label' => 'Billing'],
        ]],
    ];

    $demoUrl = route('forms.autocomplete-demo');

    $basicCode = <<<'BLADE'
<x-forms.select-multi
    label="Papéis"
    name="roles"
    :options="$roles"
/>
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="roles" class="text-sm font-medium text-foreground">Papéis</label>
    <div
        role="combobox"
        tabindex="0"
        aria-haspopup="listbox"
        aria-multiselectable="true"
        id="roles"
        class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5"
    >
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $chipsCode = <<<'BLADE'
<x-forms.select-multi
    label="Skills"
    name="skills"
    display="chips"
    :options="$frameworks"
    :value="['laravel', 'alpine']"
/>
BLADE;

    $chipsHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Chips</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
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
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Contagem</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="truncate text-foreground">3 selecionado(s)</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Texto</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="truncate text-foreground">Laravel, Alpine.js</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $countCode = <<<'BLADE'
<x-forms.select-multi
    label="Skills"
    name="skills"
    display="count"
    :options="$frameworks"
    :value="['laravel', 'vue', 'pest']"
/>
BLADE;

    $textCode = <<<'BLADE'
<x-forms.select-multi
    label="Skills"
    name="skills"
    display="text"
    :options="$frameworks"
    :value="['laravel', 'alpine']"
/>
BLADE;

    $inlineCode = <<<'BLADE'
<x-forms.select-multi
    layout="inline"
    label="Permissões"
    name="permissions"
    :options="$permissions"
    invertible
    :max-selected="5"
    counter
/>
BLADE;

    $inlineHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Permissões</label>
    <div class="w-full overflow-hidden rounded-lg border border-border bg-card shadow-sm">
        <div class="border-b border-border px-2 py-2">
            <div class="flex items-center gap-2 rounded-md border border-border bg-background px-2.5 py-1.5">
                <i class="bi bi-search text-xs text-muted-foreground"></i>
                <input type="text" placeholder="Buscar…" autocomplete="off" class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-2 border-b border-border px-3 py-2">
            <div class="flex flex-wrap items-center gap-3">
                <button type="button" class="cursor-pointer text-xs font-medium text-primary hover:underline">Selecionar todos</button>
                <button type="button" class="cursor-pointer text-xs font-medium text-muted-foreground hover:text-foreground hover:underline">Inverter</button>
            </div>
        </div>
        <div class="max-h-72 overflow-y-auto py-1">
            <div class="flex items-center justify-between gap-2 px-3 pb-1 pt-2">
                <span class="text-[10px] font-semibold uppercase tracking-wide text-muted-foreground">Conteúdo</span>
                <button type="button" class="cursor-pointer text-[10px] font-medium text-primary hover:underline">Todos</button>
            </div>
            <button type="button" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px] text-transparent"><i class="bi bi-check leading-none"></i></span>
                <span class="min-w-0 flex-1"><span class="truncate font-medium text-foreground">Ler posts</span></span>
            </button>
            <button type="button" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px] text-transparent"><i class="bi bi-check leading-none"></i></span>
                <span class="min-w-0 flex-1"><span class="truncate font-medium text-foreground">Escrever posts</span></span>
            </button>
            <button type="button" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px] text-transparent"><i class="bi bi-check leading-none"></i></span>
                <span class="min-w-0 flex-1"><span class="truncate font-medium text-foreground">Excluir posts</span></span>
            </button>
            <div class="flex items-center justify-between gap-2 px-3 pb-1 pt-2">
                <span class="text-[10px] font-semibold uppercase tracking-wide text-muted-foreground">Usuários</span>
                <button type="button" class="cursor-pointer text-[10px] font-medium text-primary hover:underline">Todos</button>
            </div>
            <button type="button" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px] text-transparent"><i class="bi bi-check leading-none"></i></span>
                <span class="min-w-0 flex-1"><span class="truncate font-medium text-foreground">Ver usuários</span></span>
            </button>
            <button type="button" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px] text-transparent"><i class="bi bi-check leading-none"></i></span>
                <span class="min-w-0 flex-1"><span class="truncate font-medium text-foreground">Gerenciar usuários</span></span>
            </button>
            <div class="flex items-center justify-between gap-2 px-3 pb-1 pt-2">
                <span class="text-[10px] font-semibold uppercase tracking-wide text-muted-foreground">Sistema</span>
                <button type="button" class="cursor-pointer text-[10px] font-medium text-primary hover:underline">Todos</button>
            </div>
            <button type="button" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px] text-transparent"><i class="bi bi-check leading-none"></i></span>
                <span class="min-w-0 flex-1"><span class="truncate font-medium text-foreground">Configurações</span></span>
            </button>
            <button type="button" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px] text-transparent"><i class="bi bi-check leading-none"></i></span>
                <span class="min-w-0 flex-1"><span class="truncate font-medium text-foreground">Billing</span></span>
            </button>
        </div>
    </div>
    <p class="text-xs text-muted-foreground tabular-nums">0/5</p>
</div>
HTML;

    $transferCode = <<<'BLADE'
<x-forms.select-multi
    layout="transfer"
    label="Membros do time"
    name="members"
    :options="$frameworks"
    sortable
    :value="['laravel', 'livewire']"
    available-title="Disponíveis"
    selected-title="No time"
/>
BLADE;

    $transferHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Membros do time</label>
    <div class="grid w-full grid-cols-1 gap-3 md:grid-cols-[1fr_auto_1fr] md:items-stretch">
        <div class="flex min-h-64 flex-col overflow-hidden rounded-lg border border-border bg-card shadow-sm">
            <div class="flex items-center justify-between gap-2 border-b border-border px-3 py-2">
                <span class="text-xs font-semibold uppercase tracking-wide text-muted-foreground">Disponíveis</span>
                <span class="text-xs tabular-nums text-muted-foreground">7</span>
            </div>
            <div class="border-b border-border px-2 py-2">
                <div class="flex items-center gap-2 rounded-md border border-border bg-background px-2.5 py-1.5">
                    <i class="bi bi-search text-xs text-muted-foreground"></i>
                    <input type="text" placeholder="Buscar…" autocomplete="off" class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground">
                </div>
            </div>
            <div class="flex items-center justify-between gap-2 border-b border-border px-3 py-1.5">
                <button type="button" class="cursor-pointer text-xs font-medium text-primary hover:underline">Selecionar todos</button>
            </div>
            <div class="min-h-0 flex-1 overflow-y-auto py-1" role="listbox" aria-multiselectable="true" aria-label="Disponíveis">
                <button type="button" role="option" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                    <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px]"><i class="bi bi-plus leading-none text-muted-foreground"></i></span>
                    <span class="min-w-0 flex-1"><span class="flex items-center gap-1.5"><span class="truncate font-medium text-foreground">Symfony</span></span></span>
                </button>
                <button type="button" role="option" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                    <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px]"><i class="bi bi-plus leading-none text-muted-foreground"></i></span>
                    <span class="min-w-0 flex-1"><span class="flex items-center gap-1.5"><span class="truncate font-medium text-foreground">Alpine.js</span></span></span>
                </button>
                <button type="button" role="option" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                    <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px]"><i class="bi bi-plus leading-none text-muted-foreground"></i></span>
                    <span class="min-w-0 flex-1"><span class="flex items-center gap-1.5"><span class="truncate font-medium text-foreground">Vue</span></span></span>
                </button>
                <button type="button" role="option" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                    <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px]"><i class="bi bi-plus leading-none text-muted-foreground"></i></span>
                    <span class="min-w-0 flex-1"><span class="flex items-center gap-1.5"><span class="truncate font-medium text-foreground">React</span></span></span>
                </button>
                <button type="button" role="option" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                    <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px]"><i class="bi bi-plus leading-none text-muted-foreground"></i></span>
                    <span class="min-w-0 flex-1"><span class="flex items-center gap-1.5"><span class="truncate font-medium text-foreground">Tailwind CSS</span></span></span>
                </button>
                <button type="button" role="option" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                    <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px]"><i class="bi bi-plus leading-none text-muted-foreground"></i></span>
                    <span class="min-w-0 flex-1"><span class="flex items-center gap-1.5"><span class="truncate font-medium text-foreground">Pest</span></span></span>
                </button>
                <button type="button" role="option" class="flex w-full items-start gap-2 px-3 py-2 text-start transition-colors hover:bg-muted">
                    <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border border-border bg-background text-[10px]"><i class="bi bi-plus leading-none text-muted-foreground"></i></span>
                    <span class="min-w-0 flex-1"><span class="flex items-center gap-1.5"><span class="truncate font-medium text-foreground">PHPUnit</span></span></span>
                </button>
            </div>
        </div>
        <div class="flex flex-row items-center justify-center gap-2 md:flex-col md:px-1">
            <button type="button" class="inline-flex size-9 cursor-pointer items-center justify-center rounded-lg border border-border bg-card text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Selecionar todos filtrados" title="Selecionar todos filtrados">
                <i class="bi bi-chevron-double-right hidden leading-none md:inline"></i>
                <i class="bi bi-chevron-double-down leading-none md:hidden"></i>
            </button>
            <button type="button" class="inline-flex size-9 cursor-pointer items-center justify-center rounded-lg border border-border bg-card text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Remover todos filtrados" title="Remover todos filtrados">
                <i class="bi bi-chevron-double-left hidden leading-none md:inline"></i>
                <i class="bi bi-chevron-double-up leading-none md:hidden"></i>
            </button>
        </div>
        <div class="flex min-h-64 flex-col overflow-hidden rounded-lg border border-border bg-card shadow-sm">
            <div class="flex items-center justify-between gap-2 border-b border-border px-3 py-2">
                <span class="text-xs font-semibold uppercase tracking-wide text-muted-foreground">No time</span>
                <span class="text-xs tabular-nums text-muted-foreground">2</span>
            </div>
            <div class="border-b border-border px-2 py-2">
                <div class="flex items-center gap-2 rounded-md border border-border bg-background px-2.5 py-1.5">
                    <i class="bi bi-search text-xs text-muted-foreground"></i>
                    <input type="text" placeholder="Filtrar selecionados…" autocomplete="off" class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground">
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 border-b border-border px-3 py-1.5">
                <button type="button" class="cursor-pointer text-xs font-medium text-muted-foreground hover:text-foreground hover:underline">Limpar</button>
            </div>
            <div class="min-h-0 flex-1 overflow-y-auto py-1" role="listbox" aria-label="No time">
                <div class="flex items-center gap-1 px-2 py-1.5 hover:bg-muted">
                    <div class="min-w-0 flex-1 px-1">
                        <div class="flex items-center gap-1.5"><span class="truncate text-sm font-medium text-foreground">Laravel</span></div>
                    </div>
                    <button type="button" class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-background hover:text-foreground" aria-label="Mover para cima"><i class="bi bi-chevron-up text-xs leading-none"></i></button>
                    <button type="button" class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-background hover:text-foreground" aria-label="Mover para baixo"><i class="bi bi-chevron-down text-xs leading-none"></i></button>
                    <button type="button" class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-background hover:text-foreground" aria-label="Remover Laravel"><i class="bi bi-x-lg text-xs leading-none"></i></button>
                </div>
                <div class="flex items-center gap-1 px-2 py-1.5 hover:bg-muted">
                    <div class="min-w-0 flex-1 px-1">
                        <div class="flex items-center gap-1.5"><span class="truncate text-sm font-medium text-foreground">Livewire</span></div>
                    </div>
                    <button type="button" class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-background hover:text-foreground" aria-label="Mover para cima"><i class="bi bi-chevron-up text-xs leading-none"></i></button>
                    <button type="button" class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-background hover:text-foreground" aria-label="Mover para baixo"><i class="bi bi-chevron-down text-xs leading-none"></i></button>
                    <button type="button" class="inline-flex size-7 cursor-pointer items-center justify-center rounded-md text-muted-foreground hover:bg-background hover:text-foreground" aria-label="Remover Livewire"><i class="bi bi-x-lg text-xs leading-none"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

    $limitsCode = <<<'BLADE'
<x-forms.select-multi
    label="Até 3 skills"
    name="limited"
    :options="$frameworks"
    :max-selected="3"
    :max-visible="2"
    counter
/>
BLADE;

    $limitsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Até 3 skills</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
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
                <button type="button" class="inline-flex cursor-pointer items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary opacity-90 hover:opacity-100">+1 mais</button>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="text-xs text-muted-foreground tabular-nums">3/3</p>
</div>
HTML;

    $remoteCode = <<<'BLADE'
<x-forms.select-multi
    label="Cidades"
    name="cities"
    :url="$demoUrl"
    :min-chars="1"
    placeholder="Buscar cidades…"
    display="chips"
/>
BLADE;

    $remoteHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Cidades</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="text-muted-foreground">Buscar cidades…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.select-multi size="sm" label="Pequeno" name="s_sm" :options="$roles" />
<x-forms.select-multi size="md" label="Médio" name="s_md" :options="$roles" />
<x-forms.select-multi size="lg" label="Grande" name="s_lg" :options="$roles" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-xs font-medium text-foreground">Pequeno</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-8 text-xs px-2.5 py-1">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Médio</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Grande</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-11 text-base px-3.5 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-base leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-base leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.select-multi label="Sucesso" state="success" :options="$roles" :value="['editor']" />
<x-forms.select-multi label="Erro" error="Selecione ao menos um papel." :options="$roles" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Sucesso</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-success transition-colors focus-within:border-success focus-within:ring-2 focus-within:ring-success focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Editor</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Editor"><i class="bi bi-x text-xs leading-none"></i></button>
                </span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Erro</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" aria-invalid="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-danger transition-colors focus-within:border-danger focus-within:ring-2 focus-within:ring-danger focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="text-xs text-danger" role="alert">Selecione ao menos um papel.</p>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.select-multi label="Desabilitado" disabled :options="$roles" :value="['admin']" />
<x-forms.select-multi label="Readonly" readonly :options="$roles" :value="['editor']" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Desabilitado</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-not-allowed items-center gap-2 rounded-lg border bg-card shadow-sm border-border opacity-60 transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Administrador</span>
                </span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Readonly</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-ui-checks text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Editor</span>
                </span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.select-multi&gt;</code> é o multi-select dedicado:
            layouts <code>dropdown</code>, <code>inline</code> e <code>transfer</code> (dual-list),
            display <code>chips</code>/<code>count</code>/<code>text</code>, checkboxes, select-all,
            inverter, grupos, busca, remote, limite, ordenação e binding Livewire (array).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico (dropdown)" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Padrão <code>layout="dropdown"</code> com checkboxes e <code>display="chips"</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-multi
                    label="Papéis"
                    name="demo_roles"
                    :options="$roles"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Display: chips / count / text" :code="$chipsCode" :html="$chipsHtml">
            <x-slot:description>
                Controle como a seleção aparece no trigger com <code>display</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-multi
                    label="Chips"
                    name="demo_chips"
                    display="chips"
                    :options="$frameworks"
                    :value="['laravel', 'alpine']"
                />
                <x-forms.select-multi
                    label="Contagem"
                    name="demo_count"
                    display="count"
                    :options="$frameworks"
                    :value="['laravel', 'vue', 'pest']"
                />
                <x-forms.select-multi
                    label="Texto"
                    name="demo_text"
                    display="text"
                    :options="$frameworks"
                    :value="['laravel', 'alpine']"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Inline (checklist)" :code="$inlineCode" :html="$inlineHtml">
            <x-slot:description>
                <code>layout="inline"</code> mantém a lista sempre visível.
                <code>invertible</code> troca selecionados ↔ não selecionados.
            </x-slot:description>
            <div class="w-full max-w-xl">
                <x-forms.select-multi
                    layout="inline"
                    label="Permissões"
                    name="demo_permissions"
                    :options="$permissions"
                    invertible
                    :max-selected="5"
                    counter
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Transfer (dual-list)" :code="$transferCode" :html="$transferHtml">
            <x-slot:description>
                <code>layout="transfer"</code> com painéis Disponíveis / Selecionados.
                <code>sortable</code> permite reordenar a seleção.
            </x-slot:description>
            <div class="w-full">
                <x-forms.select-multi
                    layout="transfer"
                    label="Membros do time"
                    name="demo_members"
                    :options="$frameworks"
                    sortable
                    :value="['laravel', 'livewire']"
                    available-title="Disponíveis"
                    selected-title="No time"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Limites e overflow" :code="$limitsCode" :html="$limitsHtml">
            <x-slot:description>
                <code>max-selected</code> + <code>max-visible</code> + <code>counter</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-multi
                    label="Até 3 skills"
                    name="demo_limited"
                    :options="$frameworks"
                    :max-selected="3"
                    :max-visible="2"
                    counter
                    :value="['laravel', 'alpine', 'vue']"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Remote" :code="$remoteCode" :html="$remoteHtml">
            <x-slot:description>
                Busca remota via <code>url</code> (mesmo endpoint do autocomplete demo).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-multi
                    label="Cidades"
                    name="demo_cities"
                    :url="$demoUrl"
                    :min-chars="1"
                    placeholder="Buscar cidades…"
                    display="chips"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-multi size="sm" label="Pequeno" name="demo_s_sm" :options="$roles" />
                <x-forms.select-multi size="md" label="Médio" name="demo_s_md" :options="$roles" />
                <x-forms.select-multi size="lg" label="Grande" name="demo_s_lg" :options="$roles" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-multi label="Sucesso" name="demo_ok" state="success" :options="$roles" :value="['editor']" />
                <x-forms.select-multi label="Erro" name="demo_bad" error="Selecione ao menos um papel." :options="$roles" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly" :code="$disabledCode" :html="$disabledHtml">
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-multi label="Desabilitado" disabled :options="$roles" :value="['admin']" />
                <x-forms.select-multi label="Readonly" readonly :options="$roles" :value="['editor']" />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api component="forms/select-multi/select-multi" title="x-forms.select-multi" />
</x-ui.docs>
