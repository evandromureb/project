<?php

use Livewire\Component;

return new class extends Component
{
    /** @var list<array{name?: string, email?: string, role?: string}> */
    public array $contacts = [
        ['name' => 'Ana Silva', 'email' => 'ana@empresa.com', 'role' => 'admin'],
        ['name' => 'Bruno Costa', 'email' => 'bruno@empresa.com', 'role' => 'member'],
    ];

    /** @var list<array{title?: string, url?: string}> */
    public array $links = [
        ['title' => 'Documentação', 'url' => 'https://laravel.com'],
    ];

    public function save(): void
    {
        $this->validate([
            'contacts' => ['required', 'array', 'min:1'],
            'contacts.*.name' => ['required', 'string', 'min:2'],
            'contacts.*.email' => ['required', 'email'],
            'contacts.*.role' => ['required', 'string'],
            'links' => ['nullable', 'array'],
            'links.*.title' => ['required', 'string'],
            'links.*.url' => ['required', 'url'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.repeater
    label="Contatos"
    name="contacts"
    :fields="[
        ['name' => 'name', 'label' => 'Nome', 'required' => true],
        ['name' => 'email', 'label' => 'E-mail', 'type' => 'email'],
    ]"
    :items="[['name' => 'Ana', 'email' => 'ana@mail.com']]"
    show-counter
/>
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-3">
    <div class="flex flex-wrap items-end justify-between gap-2">
        <div class="text-sm font-medium text-foreground">Contatos</div>
        <span class="text-xs text-muted-foreground">1 item</span>
    </div>

    <div class="flex flex-col gap-3" role="list" aria-label="Contatos">
        <div class="relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow" role="listitem">
            <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                <button type="button" class="inline-flex size-8 shrink-0 cursor-grab items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Arrastar para reordenar">
                    <i class="bi bi-grip-vertical text-base leading-none" aria-hidden="true"></i>
                </button>
                <div class="min-w-0 flex-1">
                    <div class="truncate text-sm font-medium text-foreground">Item 1</div>
                    <div class="text-[0.6875rem] text-muted-foreground">#1</div>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Mover para cima">
                        <i class="bi bi-arrow-up text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Mover para baixo">
                        <i class="bi bi-arrow-down text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                        <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="text-sm font-medium text-foreground">Nome <span class="text-danger" aria-hidden="true">*</span></label>
                        <input
                            type="text"
                            class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm"
                            name="contacts[0][name]"
                            value="Ana"
                            required
                        >
                    </div>
                    <div>
                        <label class="text-sm font-medium text-foreground">E-mail</label>
                        <input
                            type="email"
                            class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm"
                            name="contacts[0][email]"
                            value="ana@mail.com"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <button type="button" class="btn btn-outline-primary w-full sm:w-auto">
            <i class="bi bi-plus-lg" aria-hidden="true"></i>
            Adicionar item
        </button>
    </div>
</div>
HTML;

    $schemaCode = <<<'BLADE'
<x-forms.repeater
    label="Equipe"
    name="team"
    columns="2"
    item-label=":name"
    cloneable
    :fields="[
        ['name' => 'name', 'label' => 'Nome', 'required' => true],
        ['name' => 'email', 'label' => 'E-mail', 'type' => 'email'],
        [
            'name' => 'role',
            'label' => 'Papel',
            'type' => 'select',
            'options' => [
                ['value' => 'admin', 'label' => 'Admin'],
                ['value' => 'member', 'label' => 'Membro'],
            ],
        ],
        ['name' => 'bio', 'label' => 'Bio', 'type' => 'textarea', 'colSpan' => 2, 'rows' => 2],
        ['name' => 'active', 'label' => 'Ativo', 'type' => 'checkbox'],
    ]"
    :default-items="1"
/>
BLADE;

    $schemaHtml = <<<'HTML'
<div class="flex w-full flex-col gap-3">
    <div class="text-sm font-medium text-foreground">Equipe</div>

    <div class="flex flex-col gap-3" role="list" aria-label="Equipe">
        <div class="relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow" role="listitem">
            <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                <button type="button" class="inline-flex size-8 shrink-0 cursor-grab items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Arrastar para reordenar">
                    <i class="bi bi-grip-vertical text-base leading-none" aria-hidden="true"></i>
                </button>
                <div class="min-w-0 flex-1">
                    <div class="truncate text-sm font-medium text-foreground">Item 1</div>
                    <div class="text-[0.6875rem] text-muted-foreground">#1</div>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Mover para cima">
                        <i class="bi bi-arrow-up text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Mover para baixo">
                        <i class="bi bi-arrow-down text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Duplicar item">
                        <i class="bi bi-copy text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                        <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-sm font-medium text-foreground">Nome <span class="text-danger" aria-hidden="true">*</span></label>
                        <input type="text" class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="team[0][name]" required>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-foreground">E-mail</label>
                        <input type="email" class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="team[0][email]">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-foreground">Papel</label>
                        <select class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="team[0][role]">
                            <option value="">Selecione…</option>
                            <option value="admin">Admin</option>
                            <option value="member">Membro</option>
                        </select>
                    </div>
                    <label class="flex cursor-pointer items-start gap-2.5">
                        <input type="checkbox" class="mt-0.5 size-4 rounded border-border text-primary focus:ring-primary/30" name="team[0][active]">
                        <span class="block text-sm font-medium text-foreground">Ativo</span>
                    </label>
                    <div class="sm:col-span-2">
                        <label class="text-sm font-medium text-foreground">Bio</label>
                        <textarea class="w-full rounded-md border border-border bg-card px-3 py-2 text-sm text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60" name="team[0][bio]" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <button type="button" class="btn btn-outline-primary w-full sm:w-auto">
            <i class="bi bi-plus-lg" aria-hidden="true"></i>
            Adicionar item
        </button>
    </div>
</div>
HTML;

    $slotCode = <<<'BLADE'
<x-forms.repeater label="Links" name="links" :default-items="1" item-label=":title">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <x-forms.input
            label="Título"
            x-bind:name="fieldName('title', index)"
            x-bind:id="fieldId('title', index)"
            x-model="item.title"
        />
        <x-forms.input
            label="URL"
            type="url"
            x-bind:name="fieldName('url', index)"
            x-bind:id="fieldId('url', index)"
            x-model="item.url"
        />
    </div>
</x-forms.repeater>
BLADE;

    $slotHtml = <<<'HTML'
<div class="flex w-full flex-col gap-3">
    <div class="text-sm font-medium text-foreground">Links</div>

    <div class="flex flex-col gap-3" role="list" aria-label="Links">
        <div class="relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow" role="listitem">
            <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                <button type="button" class="inline-flex size-8 shrink-0 cursor-grab items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Arrastar para reordenar">
                    <i class="bi bi-grip-vertical text-base leading-none" aria-hidden="true"></i>
                </button>
                <div class="min-w-0 flex-1">
                    <div class="truncate text-sm font-medium text-foreground">Item 1</div>
                    <div class="text-[0.6875rem] text-muted-foreground">#1</div>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                        <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="flex w-full flex-col gap-1.5">
                        <label class="text-sm font-medium text-foreground">Título</label>
                        <div class="flex w-full items-stretch">
                            <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 px-3 text-sm cursor-text">
                                <input type="text" name="links[0][title]" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed h-full w-full">
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full flex-col gap-1.5">
                        <label class="text-sm font-medium text-foreground">URL</label>
                        <div class="flex w-full items-stretch">
                            <div class="group/input relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 px-3 text-sm cursor-text">
                                <input type="url" name="links[0][url]" class="min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed h-full w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <button type="button" class="btn btn-outline-primary w-full sm:w-auto">
            <i class="bi bi-plus-lg" aria-hidden="true"></i>
            Adicionar item
        </button>
    </div>
</div>
HTML;

    $limitsCode = <<<'BLADE'
<x-forms.repeater
    label="Até 3 itens"
    name="limited"
    :min="1"
    :max="3"
    :default-items="1"
    confirm-delete
    :fields="[['name' => 'label', 'label' => 'Rótulo']]"
/>
BLADE;

    $limitsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-3">
    <div class="flex flex-wrap items-end justify-between gap-2">
        <div class="text-sm font-medium text-foreground">Até 3 itens</div>
        <span class="text-xs text-muted-foreground">1 / 3 itens</span>
    </div>

    <div class="flex flex-col gap-3" role="list" aria-label="Até 3 itens">
        <div class="relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow" role="listitem">
            <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                <button type="button" class="inline-flex size-8 shrink-0 cursor-grab items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Arrastar para reordenar">
                    <i class="bi bi-grip-vertical text-base leading-none" aria-hidden="true"></i>
                </button>
                <div class="min-w-0 flex-1">
                    <div class="truncate text-sm font-medium text-foreground">Item 1</div>
                    <div class="text-[0.6875rem] text-muted-foreground">#1</div>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                        <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="text-sm font-medium text-foreground">Rótulo</label>
                        <input type="text" class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="limited[0][label]">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <button type="button" class="btn btn-outline-primary w-full sm:w-auto">
            <i class="bi bi-plus-lg" aria-hidden="true"></i>
            Adicionar item
        </button>
    </div>
</div>
HTML;

    $collapseCode = <<<'BLADE'
<x-forms.repeater
    label="Seções"
    name="sections"
    collapsible
    collapsed
    cloneable
    :fields="[
        ['name' => 'title', 'label' => 'Título'],
        ['name' => 'body', 'label' => 'Conteúdo', 'type' => 'textarea'],
    ]"
    :items="[
        ['title' => 'Introdução', 'body' => 'Texto inicial'],
        ['title' => 'Detalhes', 'body' => 'Mais informações'],
    ]"
/>
BLADE;

    $collapseHtml = <<<'HTML'
<div class="flex w-full flex-col gap-3">
    <div class="text-sm font-medium text-foreground">Seções</div>

    <div class="flex flex-wrap items-center gap-2">
        <button type="button" class="btn btn-ghost-secondary btn-sm">
            <i class="bi bi-arrows-expand" aria-hidden="true"></i>
            Expandir todos
        </button>
        <button type="button" class="btn btn-ghost-secondary btn-sm">
            <i class="bi bi-arrows-collapse" aria-hidden="true"></i>
            Recolher todos
        </button>
    </div>

    <div class="flex flex-col gap-3" role="list" aria-label="Seções">
        <!-- item recolhido: só o header fica visível -->
        <div class="relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow" role="listitem">
            <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                <button type="button" class="inline-flex size-8 shrink-0 cursor-grab items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Arrastar para reordenar">
                    <i class="bi bi-grip-vertical text-base leading-none" aria-hidden="true"></i>
                </button>
                <button type="button" class="inline-flex size-8 shrink-0 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Expandir ou recolher">
                    <i class="bi bi-chevron-down text-sm leading-none transition-transform" aria-hidden="true"></i>
                </button>
                <div class="min-w-0 flex-1">
                    <div class="truncate text-sm font-medium text-foreground">Introdução</div>
                    <div class="text-[0.6875rem] text-muted-foreground">#1</div>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Duplicar item">
                        <i class="bi bi-copy text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                        <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow" role="listitem">
            <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                <button type="button" class="inline-flex size-8 shrink-0 cursor-grab items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Arrastar para reordenar">
                    <i class="bi bi-grip-vertical text-base leading-none" aria-hidden="true"></i>
                </button>
                <button type="button" class="inline-flex size-8 shrink-0 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Expandir ou recolher">
                    <i class="bi bi-chevron-down text-sm leading-none transition-transform" aria-hidden="true"></i>
                </button>
                <div class="min-w-0 flex-1">
                    <div class="truncate text-sm font-medium text-foreground">Detalhes</div>
                    <div class="text-[0.6875rem] text-muted-foreground">#2</div>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Duplicar item">
                        <i class="bi bi-copy text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                        <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <button type="button" class="btn btn-outline-primary w-full sm:w-auto">
            <i class="bi bi-plus-lg" aria-hidden="true"></i>
            Adicionar item
        </button>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.repeater variant="soft" label="Soft" name="v_soft" :fields="['title']" :default-items="1" />
<x-forms.repeater variant="bordered" label="Bordered" name="v_border" :fields="['title']" :default-items="1" />
<x-forms.repeater variant="flush" label="Flush" name="v_flush" :fields="['title']" :default-items="1" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-3">
    <div class="flex w-full flex-col gap-3">
        <div class="text-sm font-medium text-foreground">Soft</div>
        <div class="flex flex-col gap-3" role="list" aria-label="Soft">
            <div class="relative flex flex-col overflow-hidden rounded-lg border border-transparent bg-muted text-foreground transition-shadow" role="listitem">
                <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                    <div class="min-w-0 flex-1">
                        <div class="truncate text-sm font-medium text-foreground">Item 1</div>
                        <div class="text-[0.6875rem] text-muted-foreground">#1</div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                        <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                            <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="text-sm font-medium text-foreground">Title</label>
                            <input type="text" class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="v_soft[0][title]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-outline-primary w-full sm:w-auto">
                <i class="bi bi-plus-lg" aria-hidden="true"></i>
                Adicionar item
            </button>
        </div>
    </div>

    <div class="flex w-full flex-col gap-3">
        <div class="text-sm font-medium text-foreground">Bordered</div>
        <div class="flex flex-col gap-3" role="list" aria-label="Bordered">
            <div class="relative flex flex-col overflow-hidden rounded-lg border-2 border-border bg-card text-card-foreground transition-shadow" role="listitem">
                <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                    <div class="min-w-0 flex-1">
                        <div class="truncate text-sm font-medium text-foreground">Item 1</div>
                        <div class="text-[0.6875rem] text-muted-foreground">#1</div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                        <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                            <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="text-sm font-medium text-foreground">Title</label>
                            <input type="text" class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="v_border[0][title]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-outline-primary w-full sm:w-auto">
                <i class="bi bi-plus-lg" aria-hidden="true"></i>
                Adicionar item
            </button>
        </div>
    </div>

    <div class="flex w-full flex-col gap-3">
        <div class="text-sm font-medium text-foreground">Flush</div>
        <div class="flex flex-col gap-3" role="list" aria-label="Flush">
            <div class="relative flex flex-col overflow-hidden rounded-none border-0 border-b border-border bg-transparent text-foreground shadow-none" role="listitem">
                <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                    <div class="min-w-0 flex-1">
                        <div class="truncate text-sm font-medium text-foreground">Item 1</div>
                        <div class="text-[0.6875rem] text-muted-foreground">#1</div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                        <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                            <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="p-4">
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="text-sm font-medium text-foreground">Title</label>
                            <input type="text" class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="v_flush[0][title]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-outline-primary w-full sm:w-auto">
                <i class="bi bi-plus-lg" aria-hidden="true"></i>
                Adicionar item
            </button>
        </div>
    </div>
</div>
HTML;

    $reorderCode = <<<'BLADE'
<x-forms.repeater
    label="Prioridades"
    name="priorities"
    cloneable
    reorderable
    reorder-with-buttons
    item-label=":label"
    :fields="[['name' => 'label', 'label' => 'Nome']]"
    :items="[
        ['label' => 'Alta'],
        ['label' => 'Média'],
        ['label' => 'Baixa'],
    ]"
/>
BLADE;

    $reorderHtml = <<<'HTML'
<div class="flex w-full flex-col gap-3">
    <div class="text-sm font-medium text-foreground">Prioridades</div>

    <div class="flex flex-col gap-3" role="list" aria-label="Prioridades">
        <div class="relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow" role="listitem">
            <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                <button type="button" class="inline-flex size-8 shrink-0 cursor-grab items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Arrastar para reordenar">
                    <i class="bi bi-grip-vertical text-base leading-none" aria-hidden="true"></i>
                </button>
                <div class="min-w-0 flex-1">
                    <div class="truncate text-sm font-medium text-foreground">Alta</div>
                    <div class="text-[0.6875rem] text-muted-foreground">#1</div>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground disabled:cursor-not-allowed disabled:opacity-40" disabled aria-label="Mover para cima">
                        <i class="bi bi-arrow-up text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Mover para baixo">
                        <i class="bi bi-arrow-down text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Duplicar item">
                        <i class="bi bi-copy text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                        <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="text-sm font-medium text-foreground">Nome</label>
                        <input type="text" class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="priorities[0][label]" value="Alta">
                    </div>
                </div>
            </div>
        </div>

        <div class="relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow" role="listitem">
            <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                <button type="button" class="inline-flex size-8 shrink-0 cursor-grab items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Arrastar para reordenar">
                    <i class="bi bi-grip-vertical text-base leading-none" aria-hidden="true"></i>
                </button>
                <div class="min-w-0 flex-1">
                    <div class="truncate text-sm font-medium text-foreground">Média</div>
                    <div class="text-[0.6875rem] text-muted-foreground">#2</div>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Mover para cima">
                        <i class="bi bi-arrow-up text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Mover para baixo">
                        <i class="bi bi-arrow-down text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Duplicar item">
                        <i class="bi bi-copy text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                        <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="text-sm font-medium text-foreground">Nome</label>
                        <input type="text" class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="priorities[1][label]" value="Média">
                    </div>
                </div>
            </div>
        </div>

        <div class="relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow" role="listitem">
            <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                <button type="button" class="inline-flex size-8 shrink-0 cursor-grab items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Arrastar para reordenar">
                    <i class="bi bi-grip-vertical text-base leading-none" aria-hidden="true"></i>
                </button>
                <div class="min-w-0 flex-1">
                    <div class="truncate text-sm font-medium text-foreground">Baixa</div>
                    <div class="text-[0.6875rem] text-muted-foreground">#3</div>
                </div>
                <div class="flex shrink-0 flex-wrap items-center gap-0.5">
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Mover para cima">
                        <i class="bi bi-arrow-up text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground disabled:cursor-not-allowed disabled:opacity-40" disabled aria-label="Mover para baixo">
                        <i class="bi bi-arrow-down text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Duplicar item">
                        <i class="bi bi-copy text-sm leading-none" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded-md text-danger hover:bg-danger/10" aria-label="Remover item">
                        <i class="bi bi-trash3 text-sm leading-none" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="text-sm font-medium text-foreground">Nome</label>
                        <input type="text" class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="priorities[2][label]" value="Baixa">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <button type="button" class="btn btn-outline-primary w-full sm:w-auto">
            <i class="bi bi-plus-lg" aria-hidden="true"></i>
            Adicionar item
        </button>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.repeater
    label="Somente leitura"
    name="locked"
    readonly
    :addable="false"
    :removable="false"
    :reorderable="false"
    :fields="[['name' => 'name', 'label' => 'Nome']]"
    :items="[['name' => 'Fixo']]"
/>
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-3">
    <div class="text-sm font-medium text-foreground">Somente leitura</div>

    <div class="flex flex-col gap-3" role="list" aria-label="Somente leitura">
        <div class="relative flex flex-col overflow-hidden rounded-lg border border-border bg-card text-card-foreground shadow-sm transition-shadow" role="listitem">
            <div class="flex flex-wrap items-center gap-2 border-b border-border bg-muted/40 px-3 py-2.5">
                <div class="min-w-0 flex-1">
                    <div class="truncate text-sm font-medium text-foreground">Item 1</div>
                    <div class="text-[0.6875rem] text-muted-foreground">#1</div>
                </div>
            </div>
            <div class="p-4">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="text-sm font-medium text-foreground">Nome</label>
                        <input type="text" class="w-full rounded-md border border-border bg-card text-foreground shadow-sm outline-none transition-colors placeholder:text-muted-foreground focus:border-primary focus:ring-2 focus:ring-primary/30 disabled:cursor-not-allowed disabled:opacity-60 h-10 px-3 text-sm" name="locked[0][name]" value="Fixo" readonly>
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
            O <code>&lt;x-forms.repeater&gt;</code> monta listas repetíveis de campos: adicionar,
            remover, clonar, reordenar (drag ou setas), colapsar, limites <code>min</code>/<code>max</code>
            e empty state. Use a prop <code>fields</code> (schema) ou um slot custom com
            <code>item</code>/<code>index</code>, <code>fieldName()</code> e <code>fieldId()</code>.
            Livewire via <code>wire:model</code> + <code>x-modelable="items"</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Prop <code>fields</code> gera os controles. <code>show-counter</code> exibe a quantidade.
            </x-slot:description>
            <div class="w-full">
                <x-forms.repeater
                    label="Contatos"
                    name="demo_contacts"
                    :fields="[
                        ['name' => 'name', 'label' => 'Nome', 'required' => true],
                        ['name' => 'email', 'label' => 'E-mail', 'type' => 'email'],
                    ]"
                    :items="[['name' => 'Ana', 'email' => 'ana@mail.com']]"
                    show-counter
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Schema completo" :code="$schemaCode" :html="$schemaHtml">
            <x-slot:description>
                <code>columns</code>, <code>select</code>, <code>textarea</code>, <code>checkbox</code>,
                <code>cloneable</code> e <code>item-label=":name"</code>.
            </x-slot:description>
            <div class="w-full">
                <x-forms.repeater
                    label="Equipe"
                    name="demo_team"
                    columns="2"
                    item-label=":name"
                    cloneable
                    :fields="[
                        ['name' => 'name', 'label' => 'Nome', 'required' => true],
                        ['name' => 'email', 'label' => 'E-mail', 'type' => 'email'],
                        [
                            'name' => 'role',
                            'label' => 'Papel',
                            'type' => 'select',
                            'options' => [
                                ['value' => 'admin', 'label' => 'Admin'],
                                ['value' => 'member', 'label' => 'Membro'],
                            ],
                        ],
                        ['name' => 'bio', 'label' => 'Bio', 'type' => 'textarea', 'colSpan' => 2, 'rows' => 2],
                        ['name' => 'active', 'label' => 'Ativo', 'type' => 'checkbox'],
                    ]"
                    :default-items="1"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Slot custom" :code="$slotCode" :html="$slotHtml">
            <x-slot:description>
                No slot use <code>x-model="item.campo"</code> e
                <code>x-bind:name="fieldName('campo', index)"</code>.
            </x-slot:description>
            <div class="w-full">
                <x-forms.repeater label="Links" name="demo_links" :default-items="1" item-label=":title">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <x-forms.input
                            label="Título"
                            x-bind:name="fieldName('title', index)"
                            x-bind:id="fieldId('title', index)"
                            x-model="item.title"
                        />
                        <x-forms.input
                            label="URL"
                            type="url"
                            x-bind:name="fieldName('url', index)"
                            x-bind:id="fieldId('url', index)"
                            x-model="item.url"
                        />
                    </div>
                </x-forms.repeater>
            </div>
        </x-ui.example>

        <x-ui.example title="Min / max + confirmar exclusão" :code="$limitsCode" :html="$limitsHtml">
            <x-slot:description>
                <code>min</code>, <code>max</code> e <code>confirm-delete</code>.
            </x-slot:description>
            <x-forms.repeater
                label="Até 3 itens"
                name="demo_limited"
                :min="1"
                :max="3"
                :default-items="1"
                confirm-delete
                :fields="[['name' => 'label', 'label' => 'Rótulo']]"
            />
        </x-ui.example>

        <x-ui.example title="Colapsável" :code="$collapseCode" :html="$collapseHtml">
            <x-slot:description>
                <code>collapsible</code> + <code>collapsed</code>; toolbar expandir/recolher todos.
            </x-slot:description>
            <x-forms.repeater
                label="Seções"
                name="demo_sections"
                collapsible
                collapsed
                cloneable
                :fields="[
                    ['name' => 'title', 'label' => 'Título'],
                    ['name' => 'body', 'label' => 'Conteúdo', 'type' => 'textarea'],
                ]"
                :items="[
                    ['title' => 'Introdução', 'body' => 'Texto inicial'],
                    ['title' => 'Detalhes', 'body' => 'Mais informações'],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>variant</code>: <code>card</code>, <code>soft</code>, <code>bordered</code>, <code>flush</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-3">
                <x-forms.repeater variant="soft" label="Soft" name="demo_v_soft" :fields="['title']" :default-items="1" />
                <x-forms.repeater variant="bordered" label="Bordered" name="demo_v_border" :fields="['title']" :default-items="1" />
                <x-forms.repeater variant="flush" label="Flush" name="demo_v_flush" :fields="['title']" :default-items="1" />
            </div>
        </x-ui.example>

        <x-ui.example title="Clone + reorder" :code="$reorderCode" :html="$reorderHtml">
            <x-slot:description>
                <code>cloneable</code>, drag pelo grip e botões com <code>reorder-with-buttons</code>.
            </x-slot:description>
            <x-forms.repeater
                label="Prioridades"
                name="demo_priorities"
                cloneable
                reorderable
                reorder-with-buttons
                item-label=":label"
                :fields="[['name' => 'label', 'label' => 'Nome']]"
                :items="[
                    ['label' => 'Alta'],
                    ['label' => 'Média'],
                    ['label' => 'Baixa'],
                ]"
            />
        </x-ui.example>

        <x-ui.example title="Readonly" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>readonly</code> e flags para desligar ações.
            </x-slot:description>
            <x-forms.repeater
                label="Somente leitura"
                name="demo_locked"
                readonly
                :addable="false"
                :removable="false"
                :reorderable="false"
                :fields="[['name' => 'name', 'label' => 'Nome']]"
                :items="[['name' => 'Fixo']]"
            />
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-repeater" />
</x-ui.docs>
