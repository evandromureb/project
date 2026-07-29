<?php

use Livewire\Component;

return new class extends Component
{
    public string $city = '';

    /** @var list<string> */
    public array $skills = [];

    public string $tag = '';

    public function save(): void
    {
        $this->validate([
            'city' => ['required', 'string'],
            'skills' => ['required', 'array', 'min:1'],
            'tag' => ['nullable', 'string'],
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

    $countries = [
        'br' => 'Brasil',
        'pt' => 'Portugal',
        'us' => 'Estados Unidos',
        'ar' => 'Argentina',
        'cl' => 'Chile',
        'mx' => 'México',
        'es' => 'Espanha',
        'fr' => 'França',
    ];

    $demoUrl = route('forms.autocomplete-demo');

    $basicCode = <<<'BLADE'
<x-forms.select-autocomplete
    label="Framework"
    name="framework"
    :options="$frameworks"
    placeholder="Busque um framework…"
/>
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="framework" class="text-sm font-medium text-foreground">Framework</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="framework" placeholder="Busque um framework…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $valueCode = <<<'BLADE'
<x-forms.select-autocomplete
    label="Framework"
    name="framework"
    value="laravel"
    :options="$frameworks"
/>
BLADE;

    $valueHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="framework" class="text-sm font-medium text-foreground">Framework</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="framework" value="Laravel" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar">
            <i class="bi bi-x-lg text-xs leading-none"></i>
        </button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $minCharsCode = <<<'BLADE'
<x-forms.select-autocomplete
    label="País"
    name="country"
    :options="$countries"
    :min-chars="2"
    min-chars-text="Digite ao menos 2 caracteres…"
    :debounce="150"
/>
BLADE;

    $minCharsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="country" class="text-sm font-medium text-foreground">País</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="country" placeholder="Digite para buscar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $remoteCode = <<<'BLADE'
<x-forms.select-autocomplete
    label="Cidade"
    name="city"
    :url="route('forms.autocomplete-demo')"
    :min-chars="1"
    :debounce="300"
    placeholder="Busque uma cidade…"
    hint="Fetch remoto com debounce e abort."
/>
BLADE;

    $remoteHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="city" class="text-sm font-medium text-foreground">Cidade</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="city" placeholder="Busque uma cidade…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Fetch remoto com debounce e abort.</p>
</div>
HTML;

    $multipleCode = <<<'BLADE'
<x-forms.select-autocomplete
    label="Skills"
    name="skills"
    multiple
    :options="$frameworks"
    :max-selected="4"
    counter
/>
BLADE;

    $multipleHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="skills" class="text-sm font-medium text-foreground">Skills</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                    <span class="max-w-[10rem] truncate">Laravel</span>
                    <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Laravel">
                        <i class="bi bi-x text-xs leading-none"></i>
                    </button>
                </span>
                <input type="text" id="skills" placeholder="Digite para buscar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">1/4</p>
    </div>
</div>
HTML;

    $createCode = <<<'BLADE'
<x-forms.select-autocomplete
    label="Tag"
    name="tag"
    allow-create
    :options="$frameworks"
    create-text="Adicionar"
    hint="Enter cria um valor novo se não houver match."
/>
BLADE;

    $createHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="tag" class="text-sm font-medium text-foreground">Tag</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="tag" placeholder="Digite para buscar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Enter cria um valor novo se não houver match.</p>
</div>
HTML;

    $groupsCode = <<<'BLADE'
<x-forms.select-autocomplete
    label="Stack"
    name="stack"
    :options="$frameworks"
    :highlight="true"
/>
BLADE;

    $groupsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="stack" class="text-sm font-medium text-foreground">Stack</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" id="stack" placeholder="Digite para buscar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.select-autocomplete size="sm" label="Pequeno" :options="$countries" />
<x-forms.select-autocomplete size="md" label="Médio" :options="$countries" />
<x-forms.select-autocomplete size="lg" label="Grande" :options="$countries" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-xs font-medium text-foreground">Pequeno</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-8 text-xs px-2.5 py-1">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Digite para buscar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Médio</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Digite para buscar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Grande</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-11 text-base px-3.5 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-base leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Digite para buscar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-base leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.select-autocomplete variant="default" label="Default" :options="$countries" />
<x-forms.select-autocomplete variant="filled" label="Filled" :options="$countries" />
<x-forms.select-autocomplete variant="flush" label="Flush" :options="$countries" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Default</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Digite para buscar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Filled</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border border-transparent bg-muted shadow-none transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Digite para buscar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Flush</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-none border-0 border-b border-border bg-transparent shadow-none transition-colors focus-within:border-b-2 focus-within:border-primary focus-within:ring-0 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Digite para buscar…" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.select-autocomplete label="Sucesso" state="success" value="laravel" :options="$frameworks" hint="Campo válido." />
<x-forms.select-autocomplete label="Erro" error="Selecione um item." :options="$frameworks" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Sucesso</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-success transition-colors focus-within:border-success focus-within:ring-2 focus-within:ring-success focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" value="Laravel" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar">
            <i class="bi bi-x-lg text-xs leading-none"></i>
        </button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Campo válido.</p>
</div>
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Erro</label>
    <div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-danger transition-colors focus-within:border-danger focus-within:ring-2 focus-within:ring-danger focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Digite para buscar…" aria-invalid="true" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground">
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-danger" role="alert">Selecione um item.</p>
</div>
HTML;

    $floatingCode = <<<'BLADE'
<x-forms.select-autocomplete floating label="Framework" value="laravel" :options="$frameworks" />
<x-forms.select-autocomplete floating label="Skills" multiple :value="['laravel', 'alpine']" :options="$frameworks" />
BLADE;

    $floatingHtml = <<<'HTML'
<div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-12 text-sm px-3">
    <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
        <i class="bi bi-search text-sm leading-none"></i>
    </span>
    <div class="relative min-w-0 flex-1 self-stretch">
        <div class="flex h-full min-h-0 min-w-0 flex-wrap items-center gap-1.5 pt-4 pb-1">
            <input type="text" value="Laravel" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder-transparent py-0">
        </div>
        <label class="pointer-events-none absolute start-0 z-10 top-1.5 translate-y-0 text-xs text-muted-foreground transition-all duration-150 ease-out">Framework</label>
    </div>
    <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar">
        <i class="bi bi-x-lg text-xs leading-none"></i>
    </button>
    <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
        <i class="bi bi-chevron-down text-sm leading-none"></i>
    </span>
</div>
<div class="group/select relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-12 text-sm px-3">
    <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
        <i class="bi bi-search text-sm leading-none"></i>
    </span>
    <div class="relative min-w-0 flex-1 self-stretch">
        <div class="flex h-full min-h-0 min-w-0 flex-wrap items-center gap-1.5 pt-4 pb-1">
            <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                <span class="max-w-[10rem] truncate">Laravel</span>
                <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Laravel">
                    <i class="bi bi-x text-xs leading-none"></i>
                </button>
            </span>
            <span class="inline-flex max-w-full items-center gap-0.5 rounded-md bg-primary/15 px-1.5 py-px text-[11px] leading-4 font-medium text-primary">
                <span class="max-w-[10rem] truncate">Alpine.js</span>
                <button type="button" class="-me-0.5 ms-0.5 inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 opacity-70 hover:opacity-100" aria-label="Remover Alpine.js">
                    <i class="bi bi-x text-xs leading-none"></i>
                </button>
            </span>
            <input type="text" autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder-transparent py-0">
        </div>
        <label class="pointer-events-none absolute start-0 z-10 top-1.5 translate-y-0 text-xs text-muted-foreground transition-all duration-150 ease-out">Skills</label>
    </div>
    <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar">
        <i class="bi bi-x-lg text-xs leading-none"></i>
    </button>
    <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
        <i class="bi bi-chevron-down text-sm leading-none"></i>
    </span>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.select-autocomplete label="Desabilitado" disabled value="laravel" :options="$frameworks" />
<x-forms.select-autocomplete label="Readonly" readonly value="alpine" :options="$frameworks" />
<x-forms.select-autocomplete label="Loading" loading :options="$frameworks" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Desabilitado</label>
    <div class="group/select relative flex w-full cursor-not-allowed items-center gap-2 rounded-lg border bg-card shadow-sm border-border opacity-60 transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" value="Laravel" disabled autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed">
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
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" value="Alpine.js" readonly autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground read-only:cursor-default">
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
            <i class="bi bi-search text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <input type="text" placeholder="Digite para buscar…" disabled autocomplete="off" class="min-w-[7rem] flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed">
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
            O <code>&lt;x-forms.select-autocomplete&gt;</code> é um combobox orientado a digitação:
            filtra localmente ou busca via <code>url</code> (debounce + abort), destaca matches,
            permite criar valores (<code>allow-create</code>), múltipla escolha com chips e sync
            Livewire via <code>x-modelable="value"</code>. Diferente do <code>select searchable</code>,
            o campo de busca <em>é</em> o controle principal.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Digite para filtrar. Setas + Enter selecionam; painel teletransportado.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-autocomplete
                    label="Framework"
                    name="demo_basic"
                    :options="$frameworks"
                    placeholder="Busque um framework…"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Valor inicial" :code="$valueCode" :html="$valueHtml">
            <x-slot:description>
                Com <code>value</code>, o input mostra o label correspondente.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-autocomplete
                    label="Framework"
                    name="demo_value"
                    value="laravel"
                    :options="$frameworks"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Mínimo de caracteres" :code="$minCharsCode" :html="$minCharsHtml">
            <x-slot:description>
                <code>min-chars</code> + <code>debounce</code> evitam ruído na busca.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-autocomplete
                    label="País"
                    name="demo_min"
                    :options="$countries"
                    :min-chars="2"
                    min-chars-text="Digite ao menos 2 caracteres…"
                    :debounce="150"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Busca remota (URL)" :code="$remoteCode" :html="$remoteHtml">
            <x-slot:description>
                <code>url</code> faz <code>GET ?q=</code> com abort da request anterior.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-autocomplete
                    label="Cidade"
                    name="demo_remote"
                    :url="$demoUrl"
                    :min-chars="1"
                    :debounce="300"
                    placeholder="Busque uma cidade…"
                    hint="Fetch remoto com debounce e abort."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Múltiplo" :code="$multipleCode" :html="$multipleHtml">
            <x-slot:description>
                Chips removíveis, <code>max-selected</code> e <code>counter</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-autocomplete
                    label="Skills"
                    name="demo_multi"
                    multiple
                    :value="['laravel']"
                    :options="$frameworks"
                    :max-selected="4"
                    counter
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Criar valor" :code="$createCode" :html="$createHtml">
            <x-slot:description>
                <code>allow-create</code> oferece a opção “Criar «texto»”.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-autocomplete
                    label="Tag"
                    name="demo_create"
                    allow-create
                    :options="$frameworks"
                    create-text="Adicionar"
                    hint="Enter cria um valor novo se não houver match."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Grupos + highlight" :code="$groupsCode" :html="$groupsHtml">
            <x-slot:description>
                Grupos via chave <code>group</code>; matches destacados com <code>&lt;mark&gt;</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-autocomplete
                    label="Stack"
                    name="demo_groups"
                    :options="$frameworks"
                    :highlight="true"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-autocomplete size="sm" label="Pequeno" name="demo_sm" :options="$countries" />
                <x-forms.select-autocomplete size="md" label="Médio" name="demo_md" :options="$countries" />
                <x-forms.select-autocomplete size="lg" label="Grande" name="demo_lg" :options="$countries" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Mesmas variantes do input: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-autocomplete variant="default" label="Default" name="demo_v_default" :options="$countries" />
                <x-forms.select-autocomplete variant="filled" label="Filled" name="demo_v_filled" :options="$countries" />
                <x-forms.select-autocomplete variant="flush" label="Flush" name="demo_v_flush" :options="$countries" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> / <code>error</code> com detecção automática via <code>$errors</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-autocomplete label="Sucesso" name="demo_ok" state="success" value="laravel" :options="$frameworks" hint="Campo válido." />
                <x-forms.select-autocomplete label="Erro" name="demo_bad" error="Selecione um item." :options="$frameworks" />
            </div>
        </x-ui.example>

        <x-ui.example title="Floating label" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                Sobe com foco, painel aberto, query ou valor.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-autocomplete floating label="Framework" name="demo_float" value="laravel" :options="$frameworks" />
                <x-forms.select-autocomplete floating label="Skills" name="demo_float_multi" multiple :value="['laravel', 'alpine']" :options="$frameworks" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Estados de interação do controle.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.select-autocomplete label="Desabilitado" disabled value="laravel" :options="$frameworks" />
                <x-forms.select-autocomplete label="Readonly" readonly value="alpine" :options="$frameworks" />
                <x-forms.select-autocomplete label="Loading" loading :options="$frameworks" />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-select-autocomplete" />
</x-ui.docs>
