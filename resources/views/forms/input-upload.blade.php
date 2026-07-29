<?php

use Livewire\Component;
use Livewire\WithFileUploads;

return new class extends Component
{
    use WithFileUploads;

    /** @var mixed */
    public $photo;

    /** @var array<int, mixed> */
    public array $documents = [];

    public function save(): void
    {
        $this->validate([
            'photo' => ['nullable', 'image', 'max:2048'],
            'documents' => ['nullable', 'array', 'max:5'],
            'documents.*' => ['file', 'max:5120'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.input-upload label="Arquivo" name="file" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" id="input-upload-file" name="file" class="sr-only">
    <label for="input-upload-file" class="text-sm font-medium text-foreground">Arquivo</label>
    <div role="button" tabindex="0" aria-controls="input-upload-file" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
        <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true">
            <i class="bi bi-cloud-arrow-up leading-none text-2xl"></i>
        </span>
        <div class="flex flex-col items-center gap-1 text-center">
            <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
            <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
        </div>
    </div>
</div>
HTML;

    $imagesCode = <<<'BLADE'
<x-forms.input-upload
    label="Foto de perfil"
    name="avatar"
    accept="image/*"
    max-size="2MB"
    hint="PNG, JPG ou WEBP até 2 MB."
/>
BLADE;

    $imagesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" id="input-upload-avatar" name="avatar" accept="image/*" aria-describedby="input-upload-avatar-hint" class="sr-only">
    <label for="input-upload-avatar" class="text-sm font-medium text-foreground">Foto de perfil</label>
    <div role="button" tabindex="0" aria-controls="input-upload-avatar" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
        <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true">
            <i class="bi bi-cloud-arrow-up leading-none text-2xl"></i>
        </span>
        <div class="flex flex-col items-center gap-1 text-center">
            <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
            <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
        </div>
        <p class="mb-0 text-center text-[11px] text-muted-foreground">
            <span>image/*</span><span aria-hidden="true"> · </span><span>Máx. 2 MB</span>
        </p>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-upload-avatar-hint" class="mb-0 text-xs text-muted-foreground">PNG, JPG ou WEBP até 2 MB.</p>
        </div>
    </div>
</div>
HTML;

    $multipleCode = <<<'BLADE'
<x-forms.input-upload
    label="Documentos"
    name="documents"
    multiple
    :max-files="5"
    max-size="5MB"
    accept=".pdf,.doc,.docx,.png,.jpg"
    counter
/>
BLADE;

    $multipleHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" id="input-upload-documents" name="documents[]" multiple accept=".pdf,.doc,.docx,.png,.jpg" aria-describedby="input-upload-documents-counter" class="sr-only">
    <label for="input-upload-documents" class="text-sm font-medium text-foreground">Documentos</label>
    <div role="button" tabindex="0" aria-controls="input-upload-documents" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
        <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true">
            <i class="bi bi-cloud-arrow-up leading-none text-2xl"></i>
        </span>
        <div class="flex flex-col items-center gap-1 text-center">
            <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
            <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
        </div>
        <p class="mb-0 text-center text-[11px] text-muted-foreground">
            <span>.pdf,.doc,.docx,.png,.jpg</span><span aria-hidden="true"> · </span><span>Máx. 5 MB</span><span aria-hidden="true"> · </span><span>Até 5 arquivo(s)</span>
        </p>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p id="input-upload-documents-counter" class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0/5</p>
    </div>
</div>
HTML;

    $buttonCode = <<<'BLADE'
<x-forms.input-upload
    layout="button"
    label="Anexo"
    name="attachment"
    accept=".pdf,image/*"
    max-size="10MB"
/>
BLADE;

    $buttonHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" id="input-upload-attachment" name="attachment" accept=".pdf,image/*" class="sr-only">
    <label for="input-upload-attachment" class="text-sm font-medium text-foreground">Anexo</label>
    <div class="flex flex-wrap items-center gap-3">
        <button type="button" class="btn btn-primary">
            <i class="bi bi-cloud-arrow-up" aria-hidden="true"></i>
            <span>Escolher arquivo</span>
        </button>
        <p class="mb-0 text-sm text-muted-foreground">Nenhum arquivo selecionado</p>
    </div>
</div>
HTML;

    $inlineCode = <<<'BLADE'
<x-forms.input-upload
    layout="inline"
    label="Currículo"
    name="resume"
    accept=".pdf,.doc,.docx"
    max-size="5MB"
    empty-text="Envie seu currículo"
/>
BLADE;

    $inlineHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" id="input-upload-resume" name="resume" accept=".pdf,.doc,.docx" class="sr-only">
    <label for="input-upload-resume" class="text-sm font-medium text-foreground">Currículo</label>
    <div class="group/input relative flex w-full items-center gap-2 transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary text-sm min-h-9.5 px-3 py-1.5 w-full">
        <span class="inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
            <i class="bi bi-cloud-arrow-up leading-none text-sm"></i>
        </span>
        <button type="button" class="min-w-0 flex-1 truncate bg-transparent text-start text-foreground outline-none disabled:cursor-not-allowed">
            <span class="text-muted-foreground">Envie seu currículo</span>
        </button>
        <button type="button" class="btn btn-soft-primary btn-sm shrink-0">Selecionar arquivo</button>
    </div>
</div>
HTML;

    $progressCode = <<<'BLADE'
<x-forms.input-upload
    label="Upload com progresso"
    name="demo_progress"
    multiple
    :max-files="3"
    simulate-progress
    hint="Progresso simulado apenas para UI/demo."
/>
BLADE;

    $progressHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" id="input-upload-demo_progress" name="demo_progress[]" multiple aria-describedby="input-upload-demo_progress-hint" class="sr-only">
    <label for="input-upload-demo_progress" class="text-sm font-medium text-foreground">Upload com progresso</label>
    <div role="button" tabindex="0" aria-controls="input-upload-demo_progress" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
        <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true">
            <i class="bi bi-cloud-arrow-up leading-none text-2xl"></i>
        </span>
        <div class="flex flex-col items-center gap-1 text-center">
            <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
            <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
        </div>
        <p class="mb-0 text-center text-[11px] text-muted-foreground"><span>Até 3 arquivo(s)</span></p>
    </div>
    <ul class="m-0 flex list-none flex-col gap-2 p-0">
        <li class="flex items-center gap-3 border border-border bg-card p-2 rounded-lg">
            <div class="relative flex shrink-0 items-center justify-center overflow-hidden bg-muted size-12 rounded-lg">
                <i class="bi bi-file-earmark leading-none text-lg text-primary" aria-hidden="true"></i>
            </div>
            <div class="min-w-0 flex-1">
                <div class="flex items-start justify-between gap-2">
                    <div class="min-w-0">
                        <p class="mb-0 truncate text-sm font-medium text-foreground">relatorio.pdf</p>
                        <p class="mb-0 text-xs text-muted-foreground">1.2 MB</p>
                    </div>
                    <button type="button" class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-1.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Remover relatorio.pdf">
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-muted">
                    <div class="h-full rounded-full transition-all duration-150 bg-primary" style="width:62%"></div>
                </div>
            </div>
        </li>
    </ul>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-upload-demo_progress-hint" class="mb-0 text-xs text-muted-foreground">Progresso simulado apenas para UI/demo.</p>
        </div>
    </div>
</div>
HTML;

    $existingCode = <<<'BLADE'
<x-forms.input-upload
    label="Capa"
    name="cover"
    accept="image/*"
    max-size="3MB"
    :existing="[['name' => 'capa-atual.jpg', 'url' => 'https://picsum.photos/seed/upload/120/120', 'type' => 'image/jpeg']]"
    hint="Substitua ou mantenha o arquivo atual."
/>
BLADE;

    $existingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" id="input-upload-cover" name="cover" accept="image/*" aria-describedby="input-upload-cover-hint" class="sr-only">
    <label for="input-upload-cover" class="text-sm font-medium text-foreground">Capa</label>
    <div role="button" tabindex="0" aria-controls="input-upload-cover" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
        <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true">
            <i class="bi bi-cloud-arrow-up leading-none text-2xl"></i>
        </span>
        <div class="flex flex-col items-center gap-1 text-center">
            <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
            <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
        </div>
        <p class="mb-0 text-center text-[11px] text-muted-foreground"><span>image/*</span><span aria-hidden="true"> · </span><span>Máx. 3 MB</span></p>
    </div>
    <ul class="m-0 flex list-none flex-col gap-2 p-0">
        <li class="flex items-center gap-3 border border-border bg-card p-2 rounded-lg">
            <div class="relative flex shrink-0 items-center justify-center overflow-hidden bg-muted size-12 rounded-lg">
                <img src="https://picsum.photos/seed/upload/120/120" alt="capa-atual.jpg" class="size-full object-cover">
            </div>
            <div class="min-w-0 flex-1">
                <p class="mb-0 truncate text-sm font-medium text-foreground">capa-atual.jpg</p>
                <p class="mb-0 text-xs text-muted-foreground">Arquivo atual</p>
            </div>
            <button type="button" class="inline-flex shrink-0 cursor-pointer items-center justify-center rounded-full p-1.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground" aria-label="Remover capa-atual.jpg">
                <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
            </button>
        </li>
    </ul>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="input-upload-cover-hint" class="mb-0 text-xs text-muted-foreground">Substitua ou mantenha o arquivo atual.</p>
        </div>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.input-upload size="sm" label="Pequeno" name="u_sm" />
<x-forms.input-upload size="md" label="Médio" name="u_md" />
<x-forms.input-upload size="lg" label="Grande" name="u_lg" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-u_sm" name="u_sm" class="sr-only">
        <label for="input-upload-u_sm" class="text-xs font-medium text-foreground">Pequeno</label>
        <div role="button" tabindex="0" aria-controls="input-upload-u_sm" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-3 py-5 text-xs cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-u_md" name="u_md" class="sr-only">
        <label for="input-upload-u_md" class="text-sm font-medium text-foreground">Médio</label>
        <div role="button" tabindex="0" aria-controls="input-upload-u_md" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-u_lg" name="u_lg" class="sr-only">
        <label for="input-upload-u_lg" class="text-sm font-medium text-foreground">Grande</label>
        <div role="button" tabindex="0" aria-controls="input-upload-u_lg" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-6 py-10 text-base cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-3xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.input-upload variant="default" label="Default" name="uv_default" />
<x-forms.input-upload variant="filled" label="Filled" name="uv_filled" />
<x-forms.input-upload variant="flush" label="Flush" name="uv_flush" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-uv_default" name="uv_default" class="sr-only">
        <label for="input-upload-uv_default" class="text-sm font-medium text-foreground">Default</label>
        <div role="button" tabindex="0" aria-controls="input-upload-uv_default" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-uv_filled" name="uv_filled" class="sr-only">
        <label for="input-upload-uv_filled" class="text-sm font-medium text-foreground">Filled</label>
        <div role="button" tabindex="0" aria-controls="input-upload-uv_filled" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-muted border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-uv_flush" name="uv_flush" class="sr-only">
        <label for="input-upload-uv_flush" class="text-sm font-medium text-foreground">Flush</label>
        <div role="button" tabindex="0" aria-controls="input-upload-uv_flush" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.input-upload color="primary" label="Primary" name="uc_primary" />
<x-forms.input-upload color="success" label="Success" name="uc_success" />
<x-forms.input-upload color="warning" label="Warning" name="uc_warning" />
<x-forms.input-upload color="danger" label="Danger" name="uc_danger" />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-uc_primary" name="uc_primary" class="sr-only">
        <label for="input-upload-uc_primary" class="text-sm font-medium text-foreground">Primary</label>
        <div role="button" tabindex="0" aria-controls="input-upload-uc_primary" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-uc_success" name="uc_success" class="sr-only">
        <label for="input-upload-uc_success" class="text-sm font-medium text-foreground">Success</label>
        <div role="button" tabindex="0" aria-controls="input-upload-uc_success" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-success/15 text-success rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-success underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-uc_warning" name="uc_warning" class="sr-only">
        <label for="input-upload-uc_warning" class="text-sm font-medium text-foreground">Warning</label>
        <div role="button" tabindex="0" aria-controls="input-upload-uc_warning" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-warning/15 text-warning rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-warning underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-uc_danger" name="uc_danger" class="sr-only">
        <label for="input-upload-uc_danger" class="text-sm font-medium text-foreground">Danger</label>
        <div role="button" tabindex="0" aria-controls="input-upload-uc_danger" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-danger/15 text-danger rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-danger underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.input-upload label="Sucesso" name="ok" state="success" hint="Arquivo válido." />
<x-forms.input-upload label="Erro" name="bad" error="Envie ao menos um arquivo." />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-ok" name="ok" aria-describedby="input-upload-ok-hint" class="sr-only">
        <label for="input-upload-ok" class="text-sm font-medium text-foreground">Sucesso</label>
        <div role="button" tabindex="0" aria-controls="input-upload-ok" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-success px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0 flex-1"><p id="input-upload-ok-hint" class="mb-0 text-xs text-muted-foreground">Arquivo válido.</p></div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-bad" name="bad" aria-invalid="true" aria-describedby="input-upload-bad-error" class="sr-only">
        <label for="input-upload-bad" class="text-sm font-medium text-foreground">Erro</label>
        <div role="button" tabindex="0" aria-controls="input-upload-bad" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-danger px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0 flex-1"><p id="input-upload-bad-error" class="mb-0 text-xs text-danger" role="alert">Envie ao menos um arquivo.</p></div>
        </div>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.input-upload label="Desabilitado" disabled name="dis" />
<x-forms.input-upload label="Readonly" readonly name="ro" :existing="[['name' => 'contrato.pdf', 'type' => 'application/pdf']]" />
<x-forms.input-upload label="Loading" loading name="load" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-dis" name="dis" disabled class="sr-only">
        <label for="input-upload-dis" class="text-sm font-medium text-foreground">Desabilitado</label>
        <div role="button" tabindex="0" aria-controls="input-upload-dis" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-not-allowed opacity-60 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-ro" name="ro" readonly class="sr-only">
        <label for="input-upload-ro" class="text-sm font-medium text-foreground">Readonly</label>
        <div role="button" tabindex="0" aria-controls="input-upload-ro" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
        <ul class="m-0 flex list-none flex-col gap-2 p-0">
            <li class="flex items-center gap-3 border border-border bg-card p-2 rounded-lg">
                <div class="relative flex shrink-0 items-center justify-center overflow-hidden bg-muted size-12 rounded-lg">
                    <i class="bi bi-file-earmark-pdf leading-none text-lg text-primary" aria-hidden="true"></i>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="mb-0 truncate text-sm font-medium text-foreground">contrato.pdf</p>
                    <p class="mb-0 text-xs text-muted-foreground">Arquivo atual</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" id="input-upload-load" name="load" disabled class="sr-only">
        <label for="input-upload-load" class="text-sm font-medium text-foreground">Loading</label>
        <div role="button" tabindex="0" aria-controls="input-upload-load" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-not-allowed opacity-60 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
            <span class="size-6 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
                <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
            </div>
        </div>
    </div>
</div>
HTML;

    $noPreviewCode = <<<'BLADE'
<x-forms.input-upload
    label="Sem preview"
    name="noprev"
    accept="image/*"
    :show-preview="false"
    multiple
    :max-files="4"
/>
BLADE;

    $noPreviewHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" id="input-upload-noprev" name="noprev[]" multiple accept="image/*" class="sr-only">
    <label for="input-upload-noprev" class="text-sm font-medium text-foreground">Sem preview</label>
    <div role="button" tabindex="0" aria-controls="input-upload-noprev" class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary w-full">
        <span class="inline-flex bg-primary/15 text-primary rounded-full p-3" aria-hidden="true"><i class="bi bi-cloud-arrow-up leading-none text-2xl"></i></span>
        <div class="flex flex-col items-center gap-1 text-center">
            <p class="mb-0 font-medium text-foreground">Arraste e solte os arquivos aqui</p>
            <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar arquivo</span></p>
        </div>
        <p class="mb-0 text-center text-[11px] text-muted-foreground"><span>image/*</span><span aria-hidden="true"> · </span><span>Até 4 arquivo(s)</span></p>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.input-upload&gt;</code> cobre upload completo:
            dropzone com drag &amp; drop, layouts botão/inline, múltiplos arquivos,
            <code>accept</code>, tamanho máximo, prévia de imagens, lista com ícones,
            remoção, contador, arquivos existentes e sync com formulário clássico
            (<code>name</code> / <code>name[]</code>) ou Livewire (<code>wire:model</code> no input).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Dropzone padrão: clique ou arraste um arquivo.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-upload label="Arquivo" name="demo_basic" />
            </div>
        </x-ui.example>

        <x-ui.example title="Somente imagens" :code="$imagesCode" :html="$imagesHtml">
            <x-slot:description>
                <code>accept</code> + <code>max-size</code> (ex.: <code>2MB</code>) com validação no cliente.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-upload
                    label="Foto de perfil"
                    name="demo_avatar"
                    accept="image/*"
                    max-size="2MB"
                    hint="PNG, JPG ou WEBP até 2 MB."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Múltiplos + limites" :code="$multipleCode" :html="$multipleHtml">
            <x-slot:description>
                <code>multiple</code>, <code>max-files</code>, <code>max-size</code> e <code>counter</code>.
            </x-slot:description>
            <div class="w-full max-w-xl">
                <x-forms.input-upload
                    label="Documentos"
                    name="demo_documents"
                    multiple
                    :max-files="5"
                    max-size="5MB"
                    accept=".pdf,.doc,.docx,.png,.jpg"
                    counter
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Layout botão" :code="$buttonCode" :html="$buttonHtml">
            <x-slot:description>
                <code>layout="button"</code> — botão de escolha + lista de arquivos.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-upload
                    layout="button"
                    label="Anexo"
                    name="demo_attachment"
                    accept=".pdf,image/*"
                    max-size="10MB"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Layout inline" :code="$inlineCode" :html="$inlineHtml">
            <x-slot:description>
                <code>layout="inline"</code> — campo compacto no estilo input.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-upload
                    layout="inline"
                    label="Currículo"
                    name="demo_resume"
                    accept=".pdf,.doc,.docx"
                    max-size="5MB"
                    empty-text="Envie seu currículo"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Progresso simulado" :code="$progressCode" :html="$progressHtml">
            <x-slot:description>
                <code>simulate-progress</code> para demos de UI (não é upload real).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-upload
                    label="Upload com progresso"
                    name="demo_progress"
                    multiple
                    :max-files="3"
                    simulate-progress
                    hint="Progresso simulado apenas para UI/demo."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Arquivo existente" :code="$existingCode" :html="$existingHtml">
            <x-slot:description>
                <code>:existing</code> mostra arquivos já salvos (edição). Dispara <code>existing-removed</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-upload
                    label="Capa"
                    name="demo_cover"
                    accept="image/*"
                    max-size="3MB"
                    :existing="[['name' => 'capa-atual.jpg', 'url' => 'https://picsum.photos/seed/upload/120/120', 'type' => 'image/jpeg']]"
                    hint="Substitua ou mantenha o arquivo atual."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-upload size="sm" label="Pequeno" name="demo_sm" />
                <x-forms.input-upload size="md" label="Médio" name="demo_md" />
                <x-forms.input-upload size="lg" label="Grande" name="demo_lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Mesmas variantes do input: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-upload variant="default" label="Default" name="demo_v_default" />
                <x-forms.input-upload variant="filled" label="Filled" name="demo_v_filled" />
                <x-forms.input-upload variant="flush" label="Flush" name="demo_v_flush" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Token de tema em <code>color</code> (ícone, destaque e progresso).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.input-upload color="primary" label="Primary" name="demo_c_primary" />
                <x-forms.input-upload color="success" label="Success" name="demo_c_success" />
                <x-forms.input-upload color="warning" label="Warning" name="demo_c_warning" />
                <x-forms.input-upload color="danger" label="Danger" name="demo_c_danger" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> / <code>error</code> com detecção automática via <code>$errors</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-upload label="Sucesso" name="demo_ok" state="success" hint="Arquivo válido." />
                <x-forms.input-upload label="Erro" name="demo_bad" error="Envie ao menos um arquivo." />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Estados de interação do controle.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-upload label="Desabilitado" disabled name="demo_dis" />
                <x-forms.input-upload
                    label="Readonly"
                    readonly
                    name="demo_ro"
                    :existing="[['name' => 'contrato.pdf', 'type' => 'application/pdf']]"
                />
                <x-forms.input-upload label="Loading" loading name="demo_load" />
            </div>
        </x-ui.example>

        <x-ui.example title="Sem preview" :code="$noPreviewCode" :html="$noPreviewHtml">
            <x-slot:description>
                <code>:show-preview="false"</code> usa apenas ícones por tipo.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-upload
                    label="Sem preview"
                    name="demo_noprev"
                    accept="image/*"
                    :show-preview="false"
                    multiple
                    :max-files="4"
                />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-input-upload" />
</x-ui.docs>
