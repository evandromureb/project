<?php

use Livewire\Component;

return new class extends Component
{
    /** @var list<string> */
    public array $tags = ['laravel', 'livewire'];

    /** @var list<string> */
    public array $skills = [];

    public function save(): void
    {
        $this->validate([
            'tags' => ['required', 'array', 'min:1'],
            'tags.*' => ['string', 'max:30'],
            'skills' => ['nullable', 'array'],
            'skills.*' => ['string', 'max:30'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.input-tags label="Tags" name="tags" placeholder="Digite e pressione Enter" />
BLADE;

    $tagChip = function (string $text, string $color = 'primary', string $variant = 'soft', string $size = 'md'): string {
        $tone = match ($variant) {
            'solid' => match ($color) {
                'secondary' => 'bg-secondary text-secondary-foreground',
                'success' => 'bg-success text-success-foreground',
                'warning' => 'bg-warning text-warning-foreground',
                'danger' => 'bg-danger text-danger-foreground',
                'info' => 'bg-info text-info-foreground',
                default => 'bg-primary text-primary-foreground',
            },
            'outline' => match ($color) {
                'secondary' => 'border border-secondary bg-transparent text-secondary',
                'success' => 'border border-success bg-transparent text-success',
                'warning' => 'border border-warning bg-transparent text-warning',
                'danger' => 'border border-danger bg-transparent text-danger',
                'info' => 'border border-info bg-transparent text-info',
                default => 'border border-primary bg-transparent text-primary',
            },
            'soft-border' => match ($color) {
                'secondary' => 'border border-secondary/50 bg-secondary/15 text-secondary',
                'success' => 'border border-success/50 bg-success/15 text-success',
                'warning' => 'border border-warning/50 bg-warning/15 text-warning',
                'danger' => 'border border-danger/50 bg-danger/15 text-danger',
                'info' => 'border border-info/50 bg-info/15 text-info',
                default => 'border border-primary/50 bg-primary/15 text-primary',
            },
            default => match ($color) {
                'secondary' => 'bg-secondary/15 text-secondary',
                'success' => 'bg-success/15 text-success',
                'warning' => 'bg-warning/15 text-warning',
                'danger' => 'bg-danger/15 text-danger',
                'info' => 'bg-info/15 text-info',
                default => 'bg-primary/15 text-primary',
            },
        };
        $sizeClasses = match ($size) {
            'sm' => 'gap-0.5 px-1.5 py-px text-[10px] leading-4',
            'lg' => 'gap-1 px-2 py-0.5 text-xs leading-5',
            default => 'gap-0.5 px-1.5 py-px text-[11px] leading-4',
        };

        return "<span class=\"inline-flex max-w-full items-center font-medium {$tone} {$sizeClasses} rounded-md\">"
            ."<span class=\"max-w-[12rem] truncate\">{$text}</span>"
            .'<button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 transition-opacity hover:opacity-100" aria-label="Remover '.$text.'">'
            .'<i class="bi bi-x text-xs leading-none" aria-hidden="true"></i></button></span>';
    };

    $basicHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <label for="input-tags-tags" class="text-sm font-medium text-foreground">Tags</label>
    <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="input-tags-tags" placeholder="Digite e pressione Enter" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
            </div>
        </div>
    </div>
</div>
HTML;

    $prefilledCode = <<<'BLADE'
<x-forms.input-tags
    label="Stack"
    name="stack"
    :value="['php', 'laravel', 'alpine']"
    hint="Remova com Backspace ou no X da tag."
/>
BLADE;

    $prefilledHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <label for="input-tags-stack" class="text-sm font-medium text-foreground">Stack</label>
    <input type="hidden" name="stack[]" value="php">
    <input type="hidden" name="stack[]" value="laravel">
    <input type="hidden" name="stack[]" value="alpine">
    <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                {$tagChip('php')}
                {$tagChip('laravel')}
                {$tagChip('alpine')}
                <input type="text" id="input-tags-stack" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-describedby="input-tags-stack-hint" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags">
            <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
        </button>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-tags-stack-hint" class="mb-0 text-xs text-muted-foreground">Remova com Backspace ou no X da tag.</p>
        </div>
    </div>
</div>
HTML;

    $suggestionsCode = <<<'BLADE'
<x-forms.input-tags
    label="Tecnologias"
    name="tech"
    :suggestions="['PHP', 'Laravel', 'Livewire', 'Alpine', 'Tailwind', 'Pest', 'Vite']"
    placeholder="Busque ou crie…"
/>
BLADE;

    $suggestionsHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <label for="input-tags-tech" class="text-sm font-medium text-foreground">Tecnologias</label>
    <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="input-tags-tech" placeholder="Busque ou crie…" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-controls="input-tags-tech-suggestions" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
            </div>
        </div>
    </div>
    <div id="input-tags-tech-suggestions" role="listbox" class="hidden overflow-hidden rounded-lg border border-border bg-card py-1 shadow-lg">
        <button type="button" role="option" class="flex w-full cursor-pointer items-center px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70">PHP</button>
        <button type="button" role="option" class="flex w-full cursor-pointer items-center px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70">Laravel</button>
        <button type="button" role="option" class="flex w-full cursor-pointer items-center px-3 py-2 text-start text-sm text-foreground transition-colors hover:bg-muted/70">Livewire</button>
    </div>
</div>
HTML;

    $onlySuggestionsCode = <<<'BLADE'
<x-forms.input-tags
    label="Categoria"
    name="category"
    :allow-create="false"
    :suggestions="['Backend', 'Frontend', 'DevOps', 'Design']"
    hint="Só é possível escolher da lista."
/>
BLADE;

    $onlySuggestionsHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <label for="input-tags-category" class="text-sm font-medium text-foreground">Categoria</label>
    <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="input-tags-category" placeholder="Adicionar tag…" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-describedby="input-tags-category-hint" aria-controls="input-tags-category-suggestions" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
            </div>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-tags-category-hint" class="mb-0 text-xs text-muted-foreground">Só é possível escolher da lista.</p>
        </div>
    </div>
</div>
HTML;

    $limitsCode = <<<'BLADE'
<x-forms.input-tags
    label="Até 5 tags"
    name="limited"
    :max-tags="5"
    :max-length="12"
    counter
    placeholder="Máx. 12 chars por tag"
/>
BLADE;

    $limitsHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <label for="input-tags-limited" class="text-sm font-medium text-foreground">Até 5 tags</label>
    <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="input-tags-limited" placeholder="Máx. 12 chars por tag" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-describedby="input-tags-limited-counter" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
            </div>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p id="input-tags-limited-counter" class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0/5</p>
    </div>
</div>
HTML;

    $separatorsCode = <<<'BLADE'
<x-forms.input-tags
    label="Separadores"
    name="sep"
    :separators="[',', ';', ' ']"
    hint="Enter, vírgula, ponto e vírgula ou espaço."
/>
BLADE;

    $separatorsHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <label for="input-tags-sep" class="text-sm font-medium text-foreground">Separadores</label>
    <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="input-tags-sep" placeholder="Adicionar tag…" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-describedby="input-tags-sep-hint" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
            </div>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-tags-sep-hint" class="mb-0 text-xs text-muted-foreground">Enter, vírgula, ponto e vírgula ou espaço.</p>
        </div>
    </div>
</div>
HTML;

    $tagStylesCode = <<<'BLADE'
<x-forms.input-tags label="Soft" :value="['design']" tag-color="info" tag-variant="soft" />
<x-forms.input-tags label="Solid" :value="['solid']" tag-color="success" tag-variant="solid" />
<x-forms.input-tags label="Outline" :value="['outline']" tag-color="warning" tag-variant="outline" />
<x-forms.input-tags label="Soft border" :value="['border']" tag-color="danger" tag-variant="soft-border" />
BLADE;

    $tagStylesHtml = <<<HTML
<div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-soft" class="text-sm font-medium text-foreground">Soft</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('design', 'info', 'soft')}
                    <input type="text" id="input-tags-soft" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-solid" class="text-sm font-medium text-foreground">Solid</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('solid', 'success', 'solid')}
                    <input type="text" id="input-tags-solid" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-outline" class="text-sm font-medium text-foreground">Outline</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('outline', 'warning', 'outline')}
                    <input type="text" id="input-tags-outline" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-soft_border" class="text-sm font-medium text-foreground">Soft border</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('border', 'danger', 'soft-border')}
                    <input type="text" id="input-tags-soft_border" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.input-tags size="sm" label="Pequeno" :value="['sm']" />
<x-forms.input-tags size="md" label="Médio" :value="['md']" />
<x-forms.input-tags size="lg" label="Grande" :value="['lg']" />
BLADE;

    $sizesHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-sm" class="text-xs font-medium text-foreground">Pequeno</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-8 text-xs px-2.5 py-1 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('sm', 'primary', 'soft', 'sm')}
                    <input type="text" id="input-tags-sm" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-md" class="text-sm font-medium text-foreground">Médio</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('md')}
                    <input type="text" id="input-tags-md" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-lg" class="text-sm font-medium text-foreground">Grande</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-11 text-base px-3.5 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-base"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('lg', 'primary', 'soft', 'lg')}
                    <input type="text" id="input-tags-lg" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.input-tags variant="default" label="Default" :value="['default']" />
<x-forms.input-tags variant="filled" label="Filled" :value="['filled']" />
<x-forms.input-tags variant="flush" label="Flush" :value="['flush']" />
BLADE;

    $variantsHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-v_default" class="text-sm font-medium text-foreground">Default</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('default')}
                    <input type="text" id="input-tags-v_default" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-v_filled" class="text-sm font-medium text-foreground">Filled</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border border-transparent bg-muted shadow-none border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('filled')}
                    <input type="text" id="input-tags-v_filled" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-v_flush" class="text-sm font-medium text-foreground">Flush</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-none border-0 border-b border-border bg-transparent shadow-none focus-within:ring-0 focus-within:border-b-2 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('flush')}
                    <input type="text" id="input-tags-v_flush" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.input-tags label="Sucesso" state="success" :value="['ok']" hint="Campo válido." />
<x-forms.input-tags label="Erro" error="Informe ao menos uma tag." :value="[]" />
BLADE;

    $statesHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-ok" class="text-sm font-medium text-foreground">Sucesso</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-success focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-success" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('ok')}
                    <input type="text" id="input-tags-ok" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-describedby="input-tags-ok-hint" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
        </div>
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0 flex-1"><p id="input-tags-ok-hint" class="mb-0 text-xs text-muted-foreground">Campo válido.</p></div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-bad" class="text-sm font-medium text-foreground">Erro</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-danger focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-danger" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    <input type="text" id="input-tags-bad" placeholder="Adicionar tag…" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-invalid="true" aria-describedby="input-tags-bad-error" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
        </div>
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0 flex-1"><p id="input-tags-bad-error" class="mb-0 text-xs text-danger" role="alert">Informe ao menos uma tag.</p></div>
        </div>
    </div>
</div>
HTML;

    $floatingCode = <<<'BLADE'
<x-forms.input-tags floating label="Tags" name="float_tags" />
BLADE;

    $floatingHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-12 text-sm px-3 cursor-text w-full">
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
        <div class="relative min-w-0 flex-1 self-stretch">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5 h-full min-h-0 pt-4 pb-1">
                <input type="text" id="input-tags-float_tags" placeholder=" " autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default placeholder-transparent py-0">
            </div>
            <label for="input-tags-float_tags" class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-1/2 -translate-y-1/2 text-sm">Tags</label>
        </div>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.input-tags label="Desabilitado" disabled :value="['locked']" />
<x-forms.input-tags label="Readonly" readonly :value="['fixed']" />
<x-forms.input-tags label="Loading" loading />
BLADE;

    $disabledHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-locked" class="text-sm font-medium text-foreground">Desabilitado</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border min-h-9.5 text-sm px-3 py-1.5 cursor-not-allowed opacity-60 w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('locked')}
                    <input type="text" id="input-tags-locked" disabled autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label for="input-tags-fixed" class="text-sm font-medium text-foreground">Readonly</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    {$tagChip('fixed')}
                    <input type="text" id="input-tags-fixed" readonly autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Loading</label>
        <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border min-h-9.5 text-sm px-3 py-1.5 cursor-not-allowed opacity-60 w-full">
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                    <input type="text" placeholder="Adicionar tag…" disabled autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
                </div>
            </div>
            <span class="relative z-10 size-4 shrink-0 self-center animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
        </div>
    </div>
</div>
HTML;

    $duplicatesCode = <<<'BLADE'
<x-forms.input-tags
    label="Permite duplicatas"
    name="dupes"
    allow-duplicates
    case-sensitive
    :value="['PHP', 'php']"
/>
BLADE;

    $duplicatesHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <label for="input-tags-dupes" class="text-sm font-medium text-foreground">Permite duplicatas</label>
    <input type="hidden" name="dupes[]" value="PHP">
    <input type="hidden" name="dupes[]" value="php">
    <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary min-h-9.5 text-sm px-3 py-1.5 cursor-text w-full">
        <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-tags leading-none text-sm"></i></span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                {$tagChip('PHP')}
                {$tagChip('php')}
                <input type="text" id="input-tags-dupes" autocomplete="off" role="combobox" aria-autocomplete="list" aria-expanded="false" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center self-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar tags"><i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i></button>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.input-tags&gt;</code> gerencia uma lista de tags:
            Enter/vírgula para adicionar, Backspace para remover a última, sugestões com teclado,
            colar texto separado, limite máximo, estilos de badge e sync com Livewire via
            <code>x-modelable</code> + <code>wire:model</code>. Em formulários clássicos, use
            <code>name</code> para enviar <code>name[]</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Digite e pressione <code>Enter</code> ou <code>,</code> para criar uma tag.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-tags label="Tags" name="demo_basic" placeholder="Digite e pressione Enter" />
            </div>
        </x-ui.example>

        <x-ui.example title="Pré-preenchido" :code="$prefilledCode" :html="$prefilledHtml">
            <x-slot:description>
                Passe um array em <code>:value</code> (ou string separada por vírgulas).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-tags
                    label="Stack"
                    name="demo_stack"
                    :value="['php', 'laravel', 'alpine']"
                    hint="Remova com Backspace ou no X da tag."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Sugestões" :code="$suggestionsCode" :html="$suggestionsHtml">
            <x-slot:description>
                Lista filtrável; setas + Enter selecionam. Painel teletransportado para o <code>body</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-tags
                    label="Tecnologias"
                    name="demo_tech"
                    :suggestions="['PHP', 'Laravel', 'Livewire', 'Alpine', 'Tailwind', 'Pest', 'Vite']"
                    placeholder="Busque ou crie…"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Somente da lista" :code="$onlySuggestionsCode" :html="$onlySuggestionsHtml">
            <x-slot:description>
                <code>:allow-create="false"</code> bloqueia tags fora das sugestões.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-tags
                    label="Categoria"
                    name="demo_category"
                    :allow-create="false"
                    :suggestions="['Backend', 'Frontend', 'DevOps', 'Design']"
                    hint="Só é possível escolher da lista."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Limites + contador" :code="$limitsCode" :html="$limitsHtml">
            <x-slot:description>
                <code>max-tags</code>, <code>max-length</code> e <code>counter</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-tags
                    label="Até 5 tags"
                    name="demo_limited"
                    :max-tags="5"
                    :max-length="12"
                    counter
                    placeholder="Máx. 12 chars por tag"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Separadores" :code="$separatorsCode" :html="$separatorsHtml">
            <x-slot:description>
                Customize <code>:separators</code>; colar texto também é dividido.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-tags
                    label="Separadores"
                    name="demo_sep"
                    :separators="[',', ';', ' ']"
                    hint="Enter, vírgula, ponto e vírgula ou espaço."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Estilo das tags" :code="$tagStylesCode" :html="$tagStylesHtml">
            <x-slot:description>
                <code>tag-color</code> e <code>tag-variant</code> (mesma família do badge).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.input-tags label="Soft" name="demo_soft" :value="['design']" tag-color="info" tag-variant="soft" />
                <x-forms.input-tags label="Solid" name="demo_solid" :value="['solid']" tag-color="success" tag-variant="solid" />
                <x-forms.input-tags label="Outline" name="demo_outline" :value="['outline']" tag-color="warning" tag-variant="outline" />
                <x-forms.input-tags label="Soft border" name="demo_soft_border" :value="['border']" tag-color="danger" tag-variant="soft-border" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-tags size="sm" label="Pequeno" name="demo_sm" :value="['sm']" />
                <x-forms.input-tags size="md" label="Médio" name="demo_md" :value="['md']" />
                <x-forms.input-tags size="lg" label="Grande" name="demo_lg" :value="['lg']" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Mesmas variantes do input: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-tags variant="default" label="Default" name="demo_v_default" :value="['default']" />
                <x-forms.input-tags variant="filled" label="Filled" name="demo_v_filled" :value="['filled']" />
                <x-forms.input-tags variant="flush" label="Flush" name="demo_v_flush" :value="['flush']" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> / <code>error</code> com detecção automática via <code>$errors</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-tags label="Sucesso" name="demo_ok" state="success" :value="['ok']" hint="Campo válido." />
                <x-forms.input-tags label="Erro" name="demo_bad" error="Informe ao menos uma tag." />
            </div>
        </x-ui.example>

        <x-ui.example title="Floating label" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                <code>floating</code> sobe com foco ou quando há tags/texto.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-tags floating label="Tags" name="demo_float" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Estados de interação do controle.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-tags label="Desabilitado" disabled :value="['locked']" />
                <x-forms.input-tags label="Readonly" readonly :value="['fixed']" />
                <x-forms.input-tags label="Loading" loading />
            </div>
        </x-ui.example>

        <x-ui.example title="Duplicatas" :code="$duplicatesCode" :html="$duplicatesHtml">
            <x-slot:description>
                Por padrão duplicatas (case-insensitive) são bloqueadas.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-tags
                    label="Permite duplicatas"
                    name="demo_dupes"
                    allow-duplicates
                    case-sensitive
                    :value="['PHP', 'php']"
                />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-input-tags" />
</x-ui.docs>
