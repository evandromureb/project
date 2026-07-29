<?php

use Livewire\Component;

return new class extends Component
{
    public string $location = '';

    /** @var list<string> */
    public array $path = [];

    /** @var list<string> */
    public array $cities = [];

    public function save(): void
    {
        $this->validate([
            'location' => ['required', 'string'],
            'path' => ['required', 'array', 'min:2'],
            'cities' => ['required', 'array', 'min:1'],
        ]);
    }
};
?>

@php
    $locations = [
        [
            'value' => 'america',
            'label' => 'América',
            'icon' => 'bi-globe-americas',
            'description' => 'Continente',
            'children' => [
                [
                    'value' => 'br',
                    'label' => 'Brasil',
                    'icon' => 'bi-flag',
                    'children' => [
                        ['value' => 'sp', 'label' => 'São Paulo', 'description' => 'SP', 'icon' => 'bi-geo-alt'],
                        ['value' => 'rj', 'label' => 'Rio de Janeiro', 'description' => 'RJ', 'icon' => 'bi-geo-alt'],
                        ['value' => 'bh', 'label' => 'Belo Horizonte', 'description' => 'MG', 'icon' => 'bi-geo-alt'],
                        ['value' => 'cwb', 'label' => 'Curitiba', 'description' => 'PR', 'icon' => 'bi-geo-alt'],
                    ],
                ],
                [
                    'value' => 'ar',
                    'label' => 'Argentina',
                    'icon' => 'bi-flag',
                    'children' => [
                        ['value' => 'ba', 'label' => 'Buenos Aires', 'icon' => 'bi-geo-alt'],
                        ['value' => 'cor', 'label' => 'Córdoba', 'icon' => 'bi-geo-alt'],
                    ],
                ],
                [
                    'value' => 'us',
                    'label' => 'Estados Unidos',
                    'icon' => 'bi-flag',
                    'children' => [
                        ['value' => 'nyc', 'label' => 'Nova York', 'icon' => 'bi-geo-alt'],
                        ['value' => 'sf', 'label' => 'São Francisco', 'icon' => 'bi-geo-alt'],
                        ['value' => 'chi', 'label' => 'Chicago', 'disabled' => true, 'description' => 'Indisponível'],
                    ],
                ],
            ],
        ],
        [
            'value' => 'europe',
            'label' => 'Europa',
            'icon' => 'bi-globe-europe-africa',
            'description' => 'Continente',
            'children' => [
                [
                    'value' => 'pt',
                    'label' => 'Portugal',
                    'icon' => 'bi-flag',
                    'children' => [
                        ['value' => 'lis', 'label' => 'Lisboa', 'icon' => 'bi-geo-alt'],
                        ['value' => 'porto', 'label' => 'Porto', 'icon' => 'bi-geo-alt'],
                    ],
                ],
                [
                    'value' => 'es',
                    'label' => 'Espanha',
                    'icon' => 'bi-flag',
                    'children' => [
                        ['value' => 'mad', 'label' => 'Madrid', 'icon' => 'bi-geo-alt'],
                        ['value' => 'bcn', 'label' => 'Barcelona', 'icon' => 'bi-geo-alt'],
                    ],
                ],
            ],
        ],
        [
            'value' => 'asia',
            'label' => 'Ásia',
            'icon' => 'bi-globe-asia-australia',
            'children' => [
                [
                    'value' => 'jp',
                    'label' => 'Japão',
                    'icon' => 'bi-flag',
                    'children' => [
                        ['value' => 'tyo', 'label' => 'Tóquio', 'icon' => 'bi-geo-alt'],
                        ['value' => 'osa', 'label' => 'Osaka', 'icon' => 'bi-geo-alt'],
                    ],
                ],
            ],
        ],
    ];

    $categories = [
        [
            'value' => 'electronics',
            'label' => 'Eletrônicos',
            'icon' => 'bi-cpu',
            'children' => [
                [
                    'value' => 'computers',
                    'label' => 'Computadores',
                    'children' => [
                        ['value' => 'notebook', 'label' => 'Notebook'],
                        ['value' => 'desktop', 'label' => 'Desktop'],
                    ],
                ],
                [
                    'value' => 'phones',
                    'label' => 'Celulares',
                    'children' => [
                        ['value' => 'android', 'label' => 'Android'],
                        ['value' => 'ios', 'label' => 'iOS'],
                    ],
                ],
            ],
        ],
        [
            'value' => 'home',
            'label' => 'Casa',
            'icon' => 'bi-house',
            'children' => [
                [
                    'value' => 'kitchen',
                    'label' => 'Cozinha',
                    'children' => [
                        ['value' => 'blender', 'label' => 'Liquidificador'],
                        ['value' => 'oven', 'label' => 'Forno'],
                    ],
                ],
            ],
        ],
    ];

    $demoUrl = route('forms.wizard-demo');

    $basicCode = <<<'BLADE'
<x-forms.select-wizard
    label="Localização"
    name="location"
    :options="$locations"
    :levels="['Continente', 'País', 'Cidade']"
    hint="Navegue continente → país → cidade."
/>
BLADE;

    $valueCode = <<<'BLADE'
<x-forms.select-wizard
    label="Cidade"
    name="location"
    value="sp"
    :options="$locations"
    :levels="['Continente', 'País', 'Cidade']"
/>
BLADE;

    $columnsCode = <<<'BLADE'
<x-forms.select-wizard
    label="Categoria"
    name="category"
    display="columns"
    :options="$categories"
    :levels="['Departamento', 'Seção', 'Produto']"
/>
BLADE;

    $searchableCode = <<<'BLADE'
<x-forms.select-wizard
    label="Localização"
    name="location"
    searchable
    search-deep
    :options="$locations"
    search-placeholder="Buscar em todos os níveis…"
/>
BLADE;

    $pathCode = <<<'BLADE'
<x-forms.select-wizard
    label="Caminho"
    name="path"
    value-mode="path"
    :value="['america', 'br', 'sp']"
    :options="$locations"
    separator=" › "
/>
BLADE;

    $multipleCode = <<<'BLADE'
<x-forms.select-wizard
    label="Cidades"
    name="cities"
    multiple
    searchable
    :options="$locations"
    :max-selected="3"
    counter
/>
BLADE;

    $changeOnSelectCode = <<<'BLADE'
<x-forms.select-wizard
    label="Região"
    name="region"
    change-on-select
    :options="$locations"
    hint="Permite selecionar níveis intermediários."
/>
BLADE;

    $remoteCode = <<<'BLADE'
<x-forms.select-wizard
    label="Localização remota"
    name="remote"
    :url="route('forms.wizard-demo')"
    parent-param="parent"
    :options="[
        ['value' => 'america', 'label' => 'América', 'hasChildren' => true],
        ['value' => 'europe', 'label' => 'Europa', 'hasChildren' => true],
    ]"
    :levels="['Continente', 'País', 'Cidade']"
/>
BLADE;

    $sizesCode = <<<'BLADE'
<x-forms.select-wizard size="sm" label="Pequeno" :options="$locations" />
<x-forms.select-wizard size="md" label="Médio" :options="$locations" />
<x-forms.select-wizard size="lg" label="Grande" :options="$locations" />
BLADE;

    $variantsCode = <<<'BLADE'
<x-forms.select-wizard variant="default" label="Default" :options="$locations" />
<x-forms.select-wizard variant="filled" label="Filled" :options="$locations" />
<x-forms.select-wizard variant="flush" label="Flush" :options="$locations" />
BLADE;

    $statesCode = <<<'BLADE'
<x-forms.select-wizard label="Sucesso" state="success" value="lis" :options="$locations" hint="Campo válido." />
<x-forms.select-wizard label="Erro" error="Selecione uma localização." :options="$locations" />
BLADE;

    $floatingCode = <<<'BLADE'
<x-forms.select-wizard floating label="Localização" searchable :options="$locations" />
<x-forms.select-wizard floating label="Cidades" multiple :options="$locations" />
BLADE;

    $disabledCode = <<<'BLADE'
<x-forms.select-wizard label="Desabilitado" disabled value="sp" :options="$locations" />
<x-forms.select-wizard label="Readonly" readonly value="lis" :options="$locations" />
<x-forms.select-wizard label="Loading" loading :options="$locations" />
BLADE;

    $leafOnlyCode = <<<'BLADE'
<x-forms.select-wizard
    label="Somente folha"
    name="city"
    :show-path="false"
    value="porto"
    :options="$locations"
/>
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Localização</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-diagram-3 text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Navegue continente → país → cidade.</p>
</div>
HTML;

    $valueHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Cidade</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-diagram-3 text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                <i class="bi bi-geo-alt shrink-0 leading-none text-sm text-foreground"></i>
                <span class="min-w-0 flex-1 truncate text-foreground">América / Brasil / São Paulo</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $columnsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Categoria</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-diagram-3 text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $searchableHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Localização</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-diagram-3 text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $pathHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Caminho</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-diagram-3 text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                <i class="bi bi-geo-alt shrink-0 leading-none text-sm text-foreground"></i>
                <span class="min-w-0 flex-1 truncate text-foreground">América › Brasil › São Paulo</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $multipleHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Cidades</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-9.5 text-sm px-3 py-1.5">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-diagram-3 text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-wrap items-center gap-1.5">
                <span class="truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0/3</p>
    </div>
</div>
HTML;

    $changeOnSelectHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Região</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-diagram-3 text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Permite selecionar níveis intermediários.</p>
</div>
HTML;

    $remoteHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Localização remota</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-diagram-3 text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
            </div>
        </div>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $leafOnlyHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Somente folha</label>
    <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-diagram-3 text-sm leading-none"></i>
        </span>
        <div class="relative min-w-0 flex-1">
            <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                <i class="bi bi-geo-alt shrink-0 leading-none text-sm text-foreground"></i>
                <span class="min-w-0 flex-1 truncate text-foreground">Porto</span>
            </div>
        </div>
        <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none"></i></button>
        <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
            <i class="bi bi-chevron-down text-sm leading-none"></i>
        </span>
    </div>
</div>
HTML;

    $sizesHtml = <<<'HTML'
<div class="flex flex-col gap-3">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-xs font-medium text-foreground">Pequeno</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-8 text-xs px-2.5">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
                </div>
            </div>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Médio</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
                </div>
            </div>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Grande</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-11 text-base px-3.5">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-base leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
                </div>
            </div>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-chevron-down text-base leading-none"></i>
            </span>
        </div>
    </div>
</div>
HTML;

    $variantsHtml = <<<'HTML'
<div class="flex flex-col gap-3">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Default</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
                </div>
            </div>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Filled</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border border-transparent bg-muted shadow-none border-border transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
                </div>
            </div>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Flush</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-none border-0 border-b border-border bg-transparent shadow-none border-border transition-colors focus-within:ring-0 focus-within:border-b-2 focus-within:border-primary focus-within:ring-primary h-9.5 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
                </div>
            </div>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
    </div>
</div>
HTML;

    $statesHtml = <<<'HTML'
<div class="flex flex-col gap-3">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Sucesso</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-success transition-colors focus-within:border-success focus-within:ring-2 focus-within:ring-success focus-within:ring-offset-1 h-9.5 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <i class="bi bi-geo-alt shrink-0 leading-none text-sm text-success"></i>
                    <span class="min-w-0 flex-1 truncate text-foreground">Europa / Portugal / Lisboa</span>
                </div>
            </div>
            <button type="button" class="relative z-10 flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Limpar seleção"><i class="bi bi-x-lg text-xs leading-none"></i></button>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-success">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
        <p class="mb-0 text-xs text-muted-foreground">Campo válido.</p>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Erro</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-invalid="true" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-danger transition-colors focus-within:border-danger focus-within:ring-2 focus-within:ring-danger focus-within:ring-offset-1 h-9.5 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
                </div>
            </div>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
        <p class="mb-0 text-xs text-danger" role="alert">Selecione uma localização.</p>
    </div>
</div>
HTML;

    $floatingHtml = <<<'HTML'
<div class="flex flex-col gap-3">
    <div class="flex w-full flex-col gap-1.5">
        <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-12 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 self-stretch items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1 self-stretch">
                <div class="flex h-full min-h-0 min-w-0 flex-nowrap items-center gap-1.5 pt-4 pb-1">
                    <span class="min-w-0 flex-1 truncate text-muted-foreground">&nbsp;</span>
                </div>
                <label class="pointer-events-none absolute start-0 z-10 top-1/2 -translate-y-1/2 text-sm text-muted-foreground transition-all duration-150 ease-out">Localização</label>
            </div>
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-multiselectable="true" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 min-h-12 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 self-stretch items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1 self-stretch">
                <div class="flex h-full min-h-0 min-w-0 flex-wrap items-center gap-1.5 pt-4 pb-1">
                    <span class="truncate text-muted-foreground">&nbsp;</span>
                </div>
                <label class="pointer-events-none absolute start-0 z-10 top-1/2 -translate-y-1/2 text-sm text-muted-foreground transition-all duration-150 ease-out">Cidades</label>
            </div>
            <span class="relative z-10 inline-flex shrink-0 self-center items-center justify-center text-muted-foreground">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
    </div>
</div>
HTML;

    $disabledHtml = <<<'HTML'
<div class="flex flex-col gap-3">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Desabilitado</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-disabled="true" class="group/select-wizard relative flex w-full cursor-not-allowed items-center gap-2 rounded-lg border bg-card shadow-sm border-border opacity-60 transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <i class="bi bi-geo-alt shrink-0 leading-none text-sm text-muted-foreground"></i>
                    <span class="min-w-0 flex-1 truncate text-foreground">América / Brasil / São Paulo</span>
                </div>
            </div>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Readonly</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" class="group/select-wizard relative flex w-full cursor-pointer items-center gap-2 rounded-lg border bg-card shadow-sm border-border transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <i class="bi bi-geo-alt shrink-0 leading-none text-sm text-muted-foreground"></i>
                    <span class="min-w-0 flex-1 truncate text-foreground">Europa / Portugal / Lisboa</span>
                </div>
            </div>
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-chevron-down text-sm leading-none"></i>
            </span>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Loading</label>
        <div role="combobox" tabindex="0" aria-haspopup="listbox" aria-disabled="true" class="group/select-wizard relative flex w-full cursor-not-allowed items-center gap-2 rounded-lg border bg-card shadow-sm border-border opacity-60 transition-colors focus-within:border-primary focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-1 h-9.5 text-sm px-3">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground">
                <i class="bi bi-diagram-3 text-sm leading-none"></i>
            </span>
            <div class="relative min-w-0 flex-1">
                <div class="flex min-w-0 flex-nowrap items-center gap-1.5">
                    <span class="min-w-0 flex-1 truncate text-muted-foreground">Selecione…</span>
                </div>
            </div>
            <span class="relative z-10 size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
        </div>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.select-wizard&gt;</code> é um select hierárquico em cascata:
            navegue níveis (continente → país → cidade) no modo <code>panel</code> (wizard com
            breadcrumb) ou <code>columns</code> (cascader). Suporta busca profunda, valor folha ou
            caminho completo (<code>value-mode</code>), múltiplo, seleção de intermediários e
            carregamento remoto lazy. Sync com Livewire via <code>x-modelable="value"</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Drill-down com breadcrumb. Props <code>levels</code> rotulam o nível atual.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-wizard
                    label="Localização"
                    name="location_basic"
                    :options="$locations"
                    :levels="['Continente', 'País', 'Cidade']"
                    hint="Navegue continente → país → cidade."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Valor inicial" :code="$valueCode" :html="$valueHtml">
            <x-slot:description>
                Com <code>value-mode="leaf"</code> (padrão), passe o valor da folha — o caminho é resolvido automaticamente.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-wizard
                    label="Cidade"
                    name="location_value"
                    value="sp"
                    :options="$locations"
                    :levels="['Continente', 'País', 'Cidade']"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Colunas (cascader)" :code="$columnsCode" :html="$columnsHtml">
            <x-slot:description>
                Use <code>display="columns"</code> para o layout lado a lado estilo cascader.
            </x-slot:description>
            <div class="max-w-xl">
                <x-forms.select-wizard
                    label="Categoria"
                    name="category_columns"
                    display="columns"
                    :options="$categories"
                    :levels="['Departamento', 'Seção', 'Produto']"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Busca profunda" :code="$searchableCode" :html="$searchableHtml">
            <x-slot:description>
                <code>searchable</code> + <code>search-deep</code> filtra folhas em qualquer nível.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-wizard
                    label="Localização"
                    name="location_search"
                    searchable
                    search-deep
                    :options="$locations"
                    search-placeholder="Buscar em todos os níveis…"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Modo path" :code="$pathCode" :html="$pathHtml">
            <x-slot:description>
                <code>value-mode="path"</code> sincroniza o array completo do caminho.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-wizard
                    label="Caminho"
                    name="path_mode"
                    value-mode="path"
                    :value="['america', 'br', 'sp']"
                    :options="$locations"
                    separator=" › "
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Múltiplo" :code="$multipleCode" :html="$multipleHtml">
            <x-slot:description>
                Selecione várias folhas com chips e <code>max-selected</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-wizard
                    label="Cidades"
                    name="cities_multi"
                    multiple
                    searchable
                    :options="$locations"
                    :max-selected="3"
                    counter
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Selecionar intermediários" :code="$changeOnSelectCode" :html="$changeOnSelectHtml">
            <x-slot:description>
                <code>change-on-select</code> permite confirmar um nó pai sem chegar à folha.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-wizard
                    label="Região"
                    name="region_change"
                    change-on-select
                    :options="$locations"
                    hint="Permite selecionar níveis intermediários."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Remoto (lazy children)" :code="$remoteCode" :html="$remoteHtml">
            <x-slot:description>
                Com <code>url</code> + <code>hasChildren</code>, os filhos são carregados sob demanda via <code>?parent=</code>.
            </x-slot:description>
            <div class="max-w-xl">
                <x-forms.select-wizard
                    label="Localização remota"
                    name="remote_location"
                    :url="$demoUrl"
                    parent-param="parent"
                    :options="[
                        ['value' => 'america', 'label' => 'América', 'icon' => 'bi-globe-americas', 'hasChildren' => true],
                        ['value' => 'europe', 'label' => 'Europa', 'icon' => 'bi-globe-europe-africa', 'hasChildren' => true],
                        ['value' => 'asia', 'label' => 'Ásia', 'icon' => 'bi-globe-asia-australia', 'hasChildren' => true],
                    ]"
                    :levels="['Continente', 'País', 'Cidade']"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Somente rótulo da folha" :code="$leafOnlyCode" :html="$leafOnlyHtml">
            <x-slot:description>
                <code>:show-path="false"</code> exibe só o label final no trigger.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.select-wizard
                    label="Somente folha"
                    name="city_leaf"
                    :show-path="false"
                    value="porto"
                    :options="$locations"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <div class="flex flex-col gap-3">
                <x-forms.select-wizard size="sm" label="Pequeno" name="sz_sm" :options="$locations" />
                <x-forms.select-wizard size="md" label="Médio" name="sz_md" :options="$locations" />
                <x-forms.select-wizard size="lg" label="Grande" name="sz_lg" :options="$locations" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <div class="flex flex-col gap-3">
                <x-forms.select-wizard variant="default" label="Default" name="var_default" :options="$locations" />
                <x-forms.select-wizard variant="filled" label="Filled" name="var_filled" :options="$locations" />
                <x-forms.select-wizard variant="flush" label="Flush" name="var_flush" :options="$locations" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <div class="flex flex-col gap-3">
                <x-forms.select-wizard label="Sucesso" state="success" value="lis" name="st_ok" :options="$locations" hint="Campo válido." />
                <x-forms.select-wizard label="Erro" error="Selecione uma localização." name="st_err" :options="$locations" />
            </div>
        </x-ui.example>

        <x-ui.example title="Floating" :code="$floatingCode" :html="$floatingHtml">
            <div class="flex flex-col gap-3">
                <x-forms.select-wizard floating label="Localização" name="float_one" searchable :options="$locations" />
                <x-forms.select-wizard floating label="Cidades" name="float_multi" multiple :options="$locations" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / Readonly / Loading" :code="$disabledCode" :html="$disabledHtml">
            <div class="flex flex-col gap-3">
                <x-forms.select-wizard label="Desabilitado" disabled value="sp" name="dis" :options="$locations" />
                <x-forms.select-wizard label="Readonly" readonly value="lis" name="ro" :options="$locations" />
                <x-forms.select-wizard label="Loading" loading name="ld" :options="$locations" />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-select-wizard" />
</x-ui.docs>
