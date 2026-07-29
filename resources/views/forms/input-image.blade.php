<?php

use Livewire\Component;
use Livewire\WithFileUploads;

return new class extends Component
{
    use WithFileUploads;

    /** @var mixed */
    public $avatar;

    /** @var mixed */
    public $cover;

    /** @var array<int, mixed> */
    public array $gallery = [];

    public function save(): void
    {
        $this->validate([
            'avatar' => ['nullable', 'image', 'max:2048'],
            'cover' => ['nullable', 'image', 'max:4096'],
            'gallery' => ['nullable', 'array', 'max:6'],
            'gallery.*' => ['image', 'max:2048'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.input-image label="Imagem" name="image" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*" id="input-image-demo_basic">
    <label for="input-image-demo_basic" class="text-sm font-medium text-foreground">Imagem</label>
    <div
        role="button"
        tabindex="0"
        class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary rounded-lg"
        style="aspect-ratio: 1 / 1;"
    >
        <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                <i class="bi bi-image leading-none text-2xl"></i>
            </span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
                </p>
            </div>
            <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
        </div>
    </div>
</div>
HTML;

    $avatarCode = <<<'BLADE'
<x-forms.input-image
    layout="avatar"
    label="Foto de perfil"
    name="avatar"
    max-size="2MB"
    :min-width="200"
    :min-height="200"
    hint="PNG ou JPG, mínimo 200×200."
/>
BLADE;

    $avatarHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*" id="input-image-demo_avatar">
    <label for="input-image-demo_avatar" class="text-sm font-medium text-foreground">Foto de perfil</label>
    <div class="flex flex-wrap items-center gap-4">
        <div
            role="button"
            tabindex="0"
            aria-label="Selecionar imagem"
            class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed size-28 rounded-full bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
        >
            <span class="flex flex-col items-center justify-center gap-0.5 text-muted-foreground transition-colors group-hover/avatar:text-current">
                <i class="bi bi-camera leading-none text-2xl"></i>
            </span>
        </div>
        <div class="flex min-w-0 flex-1 flex-col gap-2">
            <div class="flex flex-wrap gap-2">
                <button type="button" class="btn btn-soft-primary btn-sm">
                    <i class="bi bi-camera"></i>
                    <span>Selecionar imagem</span>
                </button>
            </div>
            <p class="mb-0 text-xs text-muted-foreground">Nenhuma imagem</p>
            <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB · Mín. 200×200px</p>
        </div>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">PNG ou JPG, mínimo 200×200.</p>
</div>
HTML;

    $cardCode = <<<'BLADE'
<x-forms.input-image
    layout="card"
    label="Capa"
    name="cover"
    aspect="video"
    max-size="4MB"
    object-fit="cover"
/>
BLADE;

    $cardHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*" id="input-image-demo_cover">
    <label for="input-image-demo_cover" class="text-sm font-medium text-foreground">Capa</label>
    <div
        role="button"
        tabindex="0"
        class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary rounded-lg"
        style="aspect-ratio: 16 / 9;"
    >
        <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                <i class="bi bi-image leading-none text-2xl"></i>
            </span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
                </p>
            </div>
            <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 4 MB</p>
        </div>
    </div>
</div>
HTML;

    $dropzoneCode = <<<'BLADE'
<x-forms.input-image
    layout="dropzone"
    label="Banner"
    name="banner"
    aspect="wide"
    accept="image/png,image/jpeg,image/webp"
    max-size="3MB"
/>
BLADE;

    $dropzoneHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/png,image/jpeg,image/webp" id="input-image-demo_banner">
    <label for="input-image-demo_banner" class="text-sm font-medium text-foreground">Banner</label>
    <div
        role="button"
        tabindex="0"
        class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed border-border bg-card px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary rounded-lg"
    >
        <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
            <i class="bi bi-image leading-none text-2xl"></i>
        </span>
        <div class="flex flex-col items-center gap-1 text-center">
            <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
            <p class="mb-0 text-muted-foreground">
                ou
                <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
            </p>
        </div>
        <p class="mb-0 text-center text-[11px] text-muted-foreground">image/png,image/jpeg,image/webp · Máx. 3 MB</p>
    </div>
</div>
HTML;

    $galleryCode = <<<'BLADE'
<x-forms.input-image
    layout="gallery"
    label="Galeria"
    name="photos"
    multiple
    :max-files="6"
    max-size="2MB"
    counter
/>
BLADE;

    $galleryHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" name="photos[]" accept="image/*" id="input-image-demo_gallery" multiple>
    <label for="input-image-demo_gallery" class="text-sm font-medium text-foreground">Galeria</label>
    <div class="flex w-full flex-wrap gap-3 border-2 border-dashed border-border bg-card p-3 rounded-lg">
        <button
            type="button"
            aria-label="Selecionar imagem"
            class="inline-flex flex-col items-center justify-center gap-1 border border-dashed border-border text-muted-foreground transition-colors hover:border-current hover:text-foreground disabled:pointer-events-none size-24 rounded-lg text-primary"
        >
            <i class="bi bi-plus-lg text-xl leading-none"></i>
            <span class="text-[11px] font-medium">Add</span>
        </button>
    </div>
    <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB · Até 6 imagem(ns)</p>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0/6</p>
    </div>
</div>
HTML;

    $existingCode = <<<'BLADE'
<x-forms.input-image
    layout="avatar"
    label="Avatar atual"
    name="profile_photo"
    existing="https://picsum.photos/seed/avatar/200/200"
    hint="Substitua ou remova a foto atual."
/>
BLADE;

    $existingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*" id="input-image-demo_existing">
    <label for="input-image-demo_existing" class="text-sm font-medium text-foreground">Avatar atual</label>
    <div class="flex flex-wrap items-center gap-4">
        <div
            role="button"
            tabindex="0"
            aria-label="Selecionar imagem"
            class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed size-28 rounded-full bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
        >
            <img src="https://picsum.photos/seed/avatar/200/200" alt="avatar" class="size-full object-cover">
            <div class="pointer-events-none absolute inset-0 flex items-center justify-center bg-black/55 opacity-0 transition-opacity group-hover/avatar:opacity-100 group-focus-visible/avatar:opacity-100">
                <span class="inline-flex size-9 items-center justify-center rounded-full bg-white text-foreground shadow-sm">
                    <i class="bi bi-camera text-base leading-none"></i>
                </span>
            </div>
        </div>
        <div class="flex min-w-0 flex-1 flex-col gap-2">
            <div class="flex flex-wrap gap-2">
                <button type="button" class="btn btn-soft-primary btn-sm">
                    <i class="bi bi-camera"></i>
                    <span>Trocar</span>
                </button>
                <button type="button" class="btn btn-ghost-secondary btn-sm">
                    <i class="bi bi-trash"></i>
                    <span>Remover</span>
                </button>
            </div>
            <p class="mb-0 truncate text-xs text-muted-foreground">
                <span>avatar</span>
            </p>
            <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
        </div>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Substitua ou remova a foto atual.</p>
</div>
HTML;

    $dimensionsCode = <<<'BLADE'
<x-forms.input-image
    label="Thumbnail"
    name="thumb"
    :min-width="400"
    :min-height="400"
    :max-width="2000"
    :max-height="2000"
    max-size="1MB"
    hint="Entre 400×400 e 2000×2000, até 1 MB."
/>
BLADE;

    $dimensionsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*" id="input-image-demo_dims">
    <label for="input-image-demo_dims" class="text-sm font-medium text-foreground">Thumbnail</label>
    <div
        role="button"
        tabindex="0"
        class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary rounded-lg"
        style="aspect-ratio: 1 / 1;"
    >
        <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                <i class="bi bi-image leading-none text-2xl"></i>
            </span>
            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
                </p>
            </div>
            <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 1 MB · Mín. 400×400px · Máx. 2000×2000px</p>
        </div>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Entre 400×400 e 2000×2000, até 1 MB.</p>
</div>
HTML;

    $aspectsCode = <<<'BLADE'
<x-forms.input-image layout="card" aspect="square" label="1:1" name="a_square" />
<x-forms.input-image layout="card" aspect="video" label="16:9" name="a_video" />
<x-forms.input-image layout="card" aspect="portrait" label="3:4" name="a_portrait" />
BLADE;

    $aspectsHtml = <<<'HTML'
<div class="grid w-full grid-cols-1 gap-4 md:grid-cols-3">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_a_square">
        <label for="input-image-demo_a_square" class="text-sm font-medium text-foreground">1:1</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary rounded-lg" style="aspect-ratio: 1 / 1;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                    <i class="bi bi-image leading-none text-2xl"></i>
                </span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_a_video">
        <label for="input-image-demo_a_video" class="text-sm font-medium text-foreground">16:9</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary rounded-lg" style="aspect-ratio: 16 / 9;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                    <i class="bi bi-image leading-none text-2xl"></i>
                </span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_a_portrait">
        <label for="input-image-demo_a_portrait" class="text-sm font-medium text-foreground">3:4</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary rounded-lg" style="aspect-ratio: 3 / 4;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                    <i class="bi bi-image leading-none text-2xl"></i>
                </span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
</div>
HTML;

    $shapesCode = <<<'BLADE'
<x-forms.input-image layout="avatar" shape="circle" preview-size="md" label="Círculo" name="s_circle" />
<x-forms.input-image layout="avatar" shape="rounded" preview-size="md" label="Arredondado" name="s_rounded" />
<x-forms.input-image layout="avatar" shape="square" preview-size="md" label="Quadrado" name="s_square" />
BLADE;

    $shapesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_s_circle">
        <label for="input-image-demo_s_circle" class="text-sm font-medium text-foreground">Círculo</label>
        <div class="flex flex-wrap items-center gap-4">
            <div role="button" tabindex="0" aria-label="Selecionar imagem" class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed size-28 rounded-full bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
                <span class="flex flex-col items-center justify-center gap-0.5 text-muted-foreground transition-colors group-hover/avatar:text-current">
                    <i class="bi bi-camera leading-none text-2xl"></i>
                </span>
            </div>
            <div class="flex min-w-0 flex-1 flex-col gap-2">
                <div class="flex flex-wrap gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm">
                        <i class="bi bi-camera"></i>
                        <span>Selecionar imagem</span>
                    </button>
                </div>
                <p class="mb-0 text-xs text-muted-foreground">Nenhuma imagem</p>
                <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_s_rounded">
        <label for="input-image-demo_s_rounded" class="text-sm font-medium text-foreground">Arredondado</label>
        <div class="flex flex-wrap items-center gap-4">
            <div role="button" tabindex="0" aria-label="Selecionar imagem" class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed size-28 rounded-lg bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
                <span class="flex flex-col items-center justify-center gap-0.5 text-muted-foreground transition-colors group-hover/avatar:text-current">
                    <i class="bi bi-camera leading-none text-2xl"></i>
                </span>
            </div>
            <div class="flex min-w-0 flex-1 flex-col gap-2">
                <div class="flex flex-wrap gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm">
                        <i class="bi bi-camera"></i>
                        <span>Selecionar imagem</span>
                    </button>
                </div>
                <p class="mb-0 text-xs text-muted-foreground">Nenhuma imagem</p>
                <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_s_square">
        <label for="input-image-demo_s_square" class="text-sm font-medium text-foreground">Quadrado</label>
        <div class="flex flex-wrap items-center gap-4">
            <div role="button" tabindex="0" aria-label="Selecionar imagem" class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed size-28 rounded-none bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
                <span class="flex flex-col items-center justify-center gap-0.5 text-muted-foreground transition-colors group-hover/avatar:text-current">
                    <i class="bi bi-camera leading-none text-2xl"></i>
                </span>
            </div>
            <div class="flex min-w-0 flex-1 flex-col gap-2">
                <div class="flex flex-wrap gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm">
                        <i class="bi bi-camera"></i>
                        <span>Selecionar imagem</span>
                    </button>
                </div>
                <p class="mb-0 text-xs text-muted-foreground">Nenhuma imagem</p>
                <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.input-image layout="avatar" preview-size="sm" label="SM" name="ps_sm" />
<x-forms.input-image layout="avatar" preview-size="md" label="MD" name="ps_md" />
<x-forms.input-image layout="avatar" preview-size="lg" label="LG" name="ps_lg" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_ps_sm">
        <label for="input-image-demo_ps_sm" class="text-sm font-medium text-foreground">SM</label>
        <div class="flex flex-wrap items-center gap-4">
            <div role="button" tabindex="0" aria-label="Selecionar imagem" class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed size-20 rounded-full bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
                <span class="flex flex-col items-center justify-center gap-0.5 text-muted-foreground transition-colors group-hover/avatar:text-current">
                    <i class="bi bi-camera leading-none text-2xl"></i>
                </span>
            </div>
            <div class="flex min-w-0 flex-1 flex-col gap-2">
                <div class="flex flex-wrap gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm">
                        <i class="bi bi-camera"></i>
                        <span>Selecionar imagem</span>
                    </button>
                </div>
                <p class="mb-0 text-xs text-muted-foreground">Nenhuma imagem</p>
                <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_ps_md">
        <label for="input-image-demo_ps_md" class="text-sm font-medium text-foreground">MD</label>
        <div class="flex flex-wrap items-center gap-4">
            <div role="button" tabindex="0" aria-label="Selecionar imagem" class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed size-28 rounded-full bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
                <span class="flex flex-col items-center justify-center gap-0.5 text-muted-foreground transition-colors group-hover/avatar:text-current">
                    <i class="bi bi-camera leading-none text-2xl"></i>
                </span>
            </div>
            <div class="flex min-w-0 flex-1 flex-col gap-2">
                <div class="flex flex-wrap gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm">
                        <i class="bi bi-camera"></i>
                        <span>Selecionar imagem</span>
                    </button>
                </div>
                <p class="mb-0 text-xs text-muted-foreground">Nenhuma imagem</p>
                <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_ps_lg">
        <label for="input-image-demo_ps_lg" class="text-sm font-medium text-foreground">LG</label>
        <div class="flex flex-wrap items-center gap-4">
            <div role="button" tabindex="0" aria-label="Selecionar imagem" class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed size-36 rounded-full bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
                <span class="flex flex-col items-center justify-center gap-0.5 text-muted-foreground transition-colors group-hover/avatar:text-current">
                    <i class="bi bi-camera leading-none text-2xl"></i>
                </span>
            </div>
            <div class="flex min-w-0 flex-1 flex-col gap-2">
                <div class="flex flex-wrap gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm">
                        <i class="bi bi-camera"></i>
                        <span>Selecionar imagem</span>
                    </button>
                </div>
                <p class="mb-0 text-xs text-muted-foreground">Nenhuma imagem</p>
                <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.input-image color="primary" label="Primary" name="c_primary" />
<x-forms.input-image color="success" label="Success" name="c_success" />
<x-forms.input-image color="warning" label="Warning" name="c_warning" />
<x-forms.input-image color="danger" label="Danger" name="c_danger" />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_c_primary">
        <label for="input-image-demo_c_primary" class="text-sm font-medium text-foreground">Primary</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary rounded-lg" style="aspect-ratio: 1 / 1;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                    <i class="bi bi-image leading-none text-2xl"></i>
                </span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_c_success">
        <label for="input-image-demo_c_success" class="text-sm font-medium text-foreground">Success</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-success focus-within:ring-success rounded-lg" style="aspect-ratio: 1 / 1;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="inline-flex bg-success/15 text-success rounded-full p-3">
                    <i class="bi bi-image leading-none text-2xl"></i>
                </span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-success underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_c_warning">
        <label for="input-image-demo_c_warning" class="text-sm font-medium text-foreground">Warning</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-warning focus-within:ring-warning rounded-lg" style="aspect-ratio: 1 / 1;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="inline-flex bg-warning/15 text-warning rounded-full p-3">
                    <i class="bi bi-image leading-none text-2xl"></i>
                </span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-warning underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_c_danger">
        <label for="input-image-demo_c_danger" class="text-sm font-medium text-foreground">Danger</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-danger focus-within:ring-danger rounded-lg" style="aspect-ratio: 1 / 1;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="inline-flex bg-danger/15 text-danger rounded-full p-3">
                    <i class="bi bi-image leading-none text-2xl"></i>
                </span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-danger underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.input-image label="Sucesso" name="ok" state="success" hint="Imagem válida." />
<x-forms.input-image label="Erro" name="bad" error="Envie uma imagem." />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full max-w-sm flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_ok" aria-describedby="input-image-demo_ok-hint input-image-demo_ok-validation">
        <label for="input-image-demo_ok" class="text-sm font-medium text-foreground">Sucesso</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-success bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-success focus-within:ring-success rounded-lg" style="aspect-ratio: 1 / 1;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                    <i class="bi bi-image leading-none text-2xl"></i>
                </span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
        <p id="input-image-demo_ok-hint" class="mb-0 text-xs text-muted-foreground">Imagem válida.</p>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_bad" aria-describedby="input-image-demo_bad-error input-image-demo_bad-validation" aria-invalid="true">
        <label for="input-image-demo_bad" class="text-sm font-medium text-foreground">Erro</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-danger bg-card text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-danger focus-within:ring-danger rounded-lg" style="aspect-ratio: 1 / 1;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                    <i class="bi bi-image leading-none text-2xl"></i>
                </span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
        <p id="input-image-demo_bad-error" class="mb-0 text-xs text-danger" role="alert">Envie uma imagem.</p>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.input-image label="Desabilitado" disabled name="dis" />
<x-forms.input-image
    layout="avatar"
    label="Readonly"
    readonly
    name="ro"
    existing="https://picsum.photos/seed/readonly/200/200"
/>
<x-forms.input-image label="Loading" loading name="load" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full max-w-md flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_dis" disabled>
        <label for="input-image-demo_dis" class="text-sm font-medium text-foreground">Desabilitado</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-not-allowed opacity-60 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary rounded-lg" style="aspect-ratio: 1 / 1;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                    <i class="bi bi-image leading-none text-2xl"></i>
                </span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_ro" readonly>
        <label for="input-image-demo_ro" class="text-sm font-medium text-foreground">Readonly</label>
        <div class="flex flex-wrap items-center gap-4">
            <div role="button" tabindex="0" aria-label="Selecionar imagem" class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed size-28 rounded-full bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
                <img src="https://picsum.photos/seed/readonly/200/200" alt="readonly" class="size-full object-cover">
            </div>
            <div class="flex min-w-0 flex-1 flex-col gap-2">
                <div class="flex flex-wrap gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" disabled>
                        <i class="bi bi-camera"></i>
                        <span>Trocar</span>
                    </button>
                    <button type="button" class="btn btn-ghost-secondary btn-sm" disabled>
                        <i class="bi bi-trash"></i>
                        <span>Remover</span>
                    </button>
                </div>
                <p class="mb-0 truncate text-xs text-muted-foreground">
                    <span>readonly</span>
                </p>
                <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <input type="file" class="sr-only" accept="image/*" id="input-image-demo_load" disabled>
        <label for="input-image-demo_load" class="text-sm font-medium text-foreground">Loading</label>
        <div role="button" tabindex="0" class="group/card relative w-full overflow-hidden border-2 border-dashed border-border bg-card text-sm cursor-not-allowed opacity-60 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary rounded-lg" style="aspect-ratio: 1 / 1;">
            <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
                <span class="size-6 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
                <div class="flex flex-col items-center gap-1 text-center">
                    <p class="mb-0 font-medium text-foreground">Arraste e solte a imagem aqui</p>
                    <p class="mb-0 text-muted-foreground">ou <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span></p>
                </div>
                <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
            </div>
        </div>
    </div>
</div>
HTML;

    $cameraCode = <<<'BLADE'
<x-forms.input-image
    layout="avatar"
    label="Selfie"
    name="selfie"
    capture="user"
    accept="image/*"
    hint="Abre a câmera frontal em dispositivos móveis."
/>
BLADE;

    $cameraHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*" id="input-image-demo_selfie" capture="user">
    <label for="input-image-demo_selfie" class="text-sm font-medium text-foreground">Selfie</label>
    <div class="flex flex-wrap items-center gap-4">
        <div role="button" tabindex="0" aria-label="Selecionar imagem" class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed size-28 rounded-full bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <span class="flex flex-col items-center justify-center gap-0.5 text-muted-foreground transition-colors group-hover/avatar:text-current">
                <i class="bi bi-camera leading-none text-2xl"></i>
            </span>
        </div>
        <div class="flex min-w-0 flex-1 flex-col gap-2">
            <div class="flex flex-wrap gap-2">
                <button type="button" class="btn btn-soft-primary btn-sm">
                    <i class="bi bi-camera"></i>
                    <span>Selecionar imagem</span>
                </button>
            </div>
            <p class="mb-0 text-xs text-muted-foreground">Nenhuma imagem</p>
            <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 2 MB</p>
        </div>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Abre a câmera frontal em dispositivos móveis.</p>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.input-image&gt;</code> é especializado em imagens:
            layouts <code>avatar</code>, <code>card</code>, <code>dropzone</code> e <code>gallery</code>,
            preview com aspect ratio, validação de tamanho e dimensões (largura/altura),
            overlay de trocar/remover, imagem existente, câmera (<code>capture</code>) e sync
            com formulário clássico ou Livewire (<code>wire:model</code>).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Layout <code>card</code> padrão (1:1), aceita apenas imagens até 2&nbsp;MB.
            </x-slot:description>
            <div class="w-full max-w-sm">
                <x-forms.input-image label="Imagem" name="demo_basic" />
            </div>
        </x-ui.example>

        <x-ui.example title="Avatar" :code="$avatarCode" :html="$avatarHtml">
            <x-slot:description>
                <code>layout="avatar"</code> com preview circular, botões e dimensões mínimas.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-image
                    layout="avatar"
                    label="Foto de perfil"
                    name="demo_avatar"
                    max-size="2MB"
                    :min-width="200"
                    :min-height="200"
                    hint="PNG ou JPG, mínimo 200×200."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Card / capa" :code="$cardCode" :html="$cardHtml">
            <x-slot:description>
                <code>aspect="video"</code> (16:9) com overlay de trocar/remover.
            </x-slot:description>
            <div class="w-full max-w-lg">
                <x-forms.input-image
                    layout="card"
                    label="Capa"
                    name="demo_cover"
                    aspect="video"
                    max-size="4MB"
                    object-fit="cover"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Dropzone" :code="$dropzoneCode" :html="$dropzoneHtml">
            <x-slot:description>
                Zona de arraste + miniaturas abaixo (bom para banners).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-image
                    layout="dropzone"
                    label="Banner"
                    name="demo_banner"
                    accept="image/png,image/jpeg,image/webp"
                    max-size="3MB"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Galeria" :code="$galleryCode" :html="$galleryHtml">
            <x-slot:description>
                <code>multiple</code> + grade de thumbs com botão Add e contador.
            </x-slot:description>
            <div class="w-full max-w-xl">
                <x-forms.input-image
                    layout="gallery"
                    label="Galeria"
                    name="demo_gallery"
                    multiple
                    :max-files="6"
                    max-size="2MB"
                    counter
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Imagem existente" :code="$existingCode" :html="$existingHtml">
            <x-slot:description>
                <code>existing</code> (URL ou array) para edição. Dispara <code>existing-removed</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-image
                    layout="avatar"
                    label="Avatar atual"
                    name="demo_existing"
                    existing="https://picsum.photos/seed/avatar/200/200"
                    hint="Substitua ou remova a foto atual."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Validação de dimensões" :code="$dimensionsCode" :html="$dimensionsHtml">
            <x-slot:description>
                <code>min-width</code>, <code>min-height</code>, <code>max-width</code>, <code>max-height</code> no cliente.
            </x-slot:description>
            <div class="w-full max-w-sm">
                <x-forms.input-image
                    label="Thumbnail"
                    name="demo_dims"
                    :min-width="400"
                    :min-height="400"
                    :max-width="2000"
                    :max-height="2000"
                    max-size="1MB"
                    hint="Entre 400×400 e 2000×2000, até 1 MB."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Aspect ratios" :code="$aspectsCode" :html="$aspectsHtml">
            <x-slot:description>
                Presets <code>square</code>, <code>video</code>, <code>portrait</code>, <code>landscape</code>, <code>wide</code> ou custom <code>16 / 9</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-3">
                <x-forms.input-image layout="card" aspect="square" label="1:1" name="demo_a_square" />
                <x-forms.input-image layout="card" aspect="video" label="16:9" name="demo_a_video" />
                <x-forms.input-image layout="card" aspect="portrait" label="3:4" name="demo_a_portrait" />
            </div>
        </x-ui.example>

        <x-ui.example title="Shapes (avatar)" :code="$shapesCode" :html="$shapesHtml">
            <x-slot:description>
                <code>shape</code>: <code>circle</code>, <code>rounded</code>, <code>square</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-forms.input-image layout="avatar" shape="circle" preview-size="md" label="Círculo" name="demo_s_circle" />
                <x-forms.input-image layout="avatar" shape="rounded" preview-size="md" label="Arredondado" name="demo_s_rounded" />
                <x-forms.input-image layout="avatar" shape="square" preview-size="md" label="Quadrado" name="demo_s_square" />
            </div>
        </x-ui.example>

        <x-ui.example title="Preview sizes" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>preview-size</code>: <code>sm</code>, <code>md</code>, <code>lg</code>, <code>xl</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-forms.input-image layout="avatar" preview-size="sm" label="SM" name="demo_ps_sm" />
                <x-forms.input-image layout="avatar" preview-size="md" label="MD" name="demo_ps_md" />
                <x-forms.input-image layout="avatar" preview-size="lg" label="LG" name="demo_ps_lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Token de tema em <code>color</code> (ícone, destaque e foco).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.input-image color="primary" label="Primary" name="demo_c_primary" />
                <x-forms.input-image color="success" label="Success" name="demo_c_success" />
                <x-forms.input-image color="warning" label="Warning" name="demo_c_warning" />
                <x-forms.input-image color="danger" label="Danger" name="demo_c_danger" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> / <code>error</code> com detecção automática via <code>$errors</code>.
            </x-slot:description>
            <div class="flex w-full max-w-sm flex-col gap-4">
                <x-forms.input-image label="Sucesso" name="demo_ok" state="success" hint="Imagem válida." />
                <x-forms.input-image label="Erro" name="demo_bad" error="Envie uma imagem." />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Estados de interação do controle.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.input-image label="Desabilitado" disabled name="demo_dis" />
                <x-forms.input-image
                    layout="avatar"
                    label="Readonly"
                    readonly
                    name="demo_ro"
                    existing="https://picsum.photos/seed/readonly/200/200"
                />
                <x-forms.input-image label="Loading" loading name="demo_load" />
            </div>
        </x-ui.example>

        <x-ui.example title="Câmera (capture)" :code="$cameraCode" :html="$cameraHtml">
            <x-slot:description>
                <code>capture="user"</code> ou <code>environment</code> — útil em mobile.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-image
                    layout="avatar"
                    label="Selfie"
                    name="demo_selfie"
                    capture="user"
                    accept="image/*"
                    hint="Abre a câmera frontal em dispositivos móveis."
                />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-input-image" />
</x-ui.docs>
