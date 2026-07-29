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
            'gallery' => ['nullable', 'array', 'max:4'],
            'gallery.*' => ['image', 'max:2048'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.input-crop label="Imagem" name="image" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*">

    <label class="text-sm font-medium text-foreground">Imagem</label>

    <div
        role="button"
        tabindex="0"
        class="group/card relative w-full overflow-hidden rounded-lg border bg-card border-border text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
        style="aspect-ratio: 1 / 1;"
    >
        <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                <i class="bi bi-crop leading-none text-2xl"></i>
            </span>

            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste uma imagem para recortar</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
                </p>
            </div>

            <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 5 MB · JPEG</p>
        </div>
    </div>
</div>
HTML;

    $avatarCode = <<<'BLADE'
<x-forms.input-crop
    layout="avatar"
    circular
    aspect="square"
    aspect-lock
    label="Foto de perfil"
    name="avatar"
    :output-width="400"
    :output-height="400"
    output-type="image/jpeg"
    max-size="5MB"
    hint="Recorte circular 1:1, exportado em 400×400."
/>
BLADE;

    $avatarHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*">

    <label class="text-sm font-medium text-foreground">Foto de perfil</label>

    <div class="flex flex-wrap items-center gap-4">
        <div
            role="button"
            tabindex="0"
            class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed transition-all size-28 rounded-full bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
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
            <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 5 MB · Saída 400×400px · JPEG</p>
        </div>
    </div>

    <p class="mb-0 text-xs text-muted-foreground">Recorte circular 1:1, exportado em 400×400.</p>
</div>
HTML;

    $coverCode = <<<'BLADE'
<x-forms.input-crop
    layout="card"
    label="Capa"
    name="cover"
    aspect="video"
    aspect-lock
    :output-width="1280"
    :output-height="720"
    max-size="5MB"
/>
BLADE;

    $coverHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*">

    <label class="text-sm font-medium text-foreground">Capa</label>

    <div
        role="button"
        tabindex="0"
        class="group/card relative w-full overflow-hidden rounded-lg border bg-card border-border text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
        style="aspect-ratio: 16 / 9;"
    >
        <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                <i class="bi bi-crop leading-none text-2xl"></i>
            </span>

            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste uma imagem para recortar</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
                </p>
            </div>

            <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 5 MB · Saída 1280×720px · JPEG</p>
        </div>
    </div>
</div>
HTML;

    $freeCode = <<<'BLADE'
<x-forms.input-crop
    label="Recorte livre"
    name="free"
    aspect="free"
    show-preview
    hint="Troque a proporção na toolbar do modal."
/>
BLADE;

    $freeHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*">

    <label class="text-sm font-medium text-foreground">Recorte livre</label>

    <div
        role="button"
        tabindex="0"
        class="group/card relative w-full overflow-hidden rounded-lg border bg-card border-border text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
        style="aspect-ratio: 1 / 1;"
    >
        <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                <i class="bi bi-crop leading-none text-2xl"></i>
            </span>

            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste uma imagem para recortar</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
                </p>
            </div>

            <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 5 MB · JPEG</p>
        </div>
    </div>

    <p class="mb-0 text-xs text-muted-foreground">Troque a proporção na toolbar do modal.</p>
</div>
HTML;

    $galleryCode = <<<'BLADE'
<x-forms.input-crop
    layout="gallery"
    label="Galeria"
    name="photos"
    multiple
    :max-files="4"
    aspect="square"
    counter
    max-size="3MB"
/>
BLADE;

    $galleryHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*" multiple>

    <label class="text-sm font-medium text-foreground">Galeria</label>

    <div class="flex w-full flex-wrap gap-3 border-2 border-dashed p-3 rounded-lg bg-card border-border">
        <button
            type="button"
            class="inline-flex flex-col items-center justify-center gap-1 border border-dashed border-border text-muted-foreground transition-colors hover:border-current hover:text-foreground disabled:pointer-events-none size-24 rounded-lg text-primary"
            aria-label="Selecionar imagem"
        >
            <i class="bi bi-plus-lg text-xl leading-none"></i>
            <span class="text-[11px] font-medium">Add</span>
        </button>
    </div>

    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0/4</p>
    </div>
</div>
HTML;

    $dropzoneCode = <<<'BLADE'
<x-forms.input-crop
    layout="dropzone"
    label="Banner"
    name="banner"
    aspect="wide"
    aspect-lock
    output-type="image/webp"
    :quality="0.85"
/>
BLADE;

    $dropzoneHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*">

    <label class="text-sm font-medium text-foreground">Banner</label>

    <div
        role="button"
        tabindex="0"
        class="relative flex w-full flex-col items-center justify-center gap-2 border-2 border-dashed transition-colors rounded-lg bg-card border-border px-4 py-8 text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
    >
        <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
            <i class="bi bi-crop leading-none text-2xl"></i>
        </span>

        <div class="flex flex-col items-center gap-1 text-center">
            <p class="mb-0 font-medium text-foreground">Arraste uma imagem para recortar</p>
            <p class="mb-0 text-muted-foreground">
                ou
                <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
            </p>
        </div>

        <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · WebP</p>
    </div>
</div>
HTML;

    $outputCode = <<<'BLADE'
<x-forms.input-crop
    label="Thumbnail PNG"
    name="thumb"
    aspect="square"
    aspect-lock
    :output-width="512"
    :output-height="512"
    output-type="image/png"
    :quality="1"
/>
BLADE;

    $outputHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*">

    <label class="text-sm font-medium text-foreground">Thumbnail PNG</label>

    <div
        role="button"
        tabindex="0"
        class="group/card relative w-full overflow-hidden rounded-lg border bg-card border-border text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
        style="aspect-ratio: 1 / 1;"
    >
        <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                <i class="bi bi-crop leading-none text-2xl"></i>
            </span>

            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste uma imagem para recortar</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
                </p>
            </div>

            <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Saída 512×512px · PNG</p>
        </div>
    </div>
</div>
HTML;

    $existingCode = <<<'BLADE'
<x-forms.input-crop
    layout="avatar"
    circular
    label="Avatar atual"
    name="profile_photo"
    existing="https://picsum.photos/seed/crop/400/400"
    hint="Substitua para abrir o editor de recorte."
/>
BLADE;

    $existingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*">

    <label class="text-sm font-medium text-foreground">Avatar atual</label>

    <div class="flex flex-wrap items-center gap-4">
        <div
            role="button"
            tabindex="0"
            class="group/avatar relative flex shrink-0 items-center justify-center overflow-hidden border-2 border-dashed transition-all size-28 rounded-full bg-muted border-border cursor-pointer hover:border-current text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
        >
            <img src="https://picsum.photos/seed/crop/400/400" alt="crop.jpg" class="size-full object-cover">
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

            <p class="mb-0 truncate text-xs text-muted-foreground">crop.jpg</p>
            <p class="mb-0 text-[11px] text-muted-foreground">image/* · Máx. 5 MB · JPEG</p>
        </div>
    </div>

    <p class="mb-0 text-xs text-muted-foreground">Substitua para abrir o editor de recorte.</p>
</div>
HTML;

    $toolbarCode = <<<'BLADE'
<x-forms.input-crop
    label="Sem preview lateral"
    name="no_preview"
    :show-preview="false"
    aspect="landscape"
/>
BLADE;

    $toolbarHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*">

    <label class="text-sm font-medium text-foreground">Sem preview lateral</label>

    <div
        role="button"
        tabindex="0"
        class="group/card relative w-full overflow-hidden rounded-lg border bg-card border-border text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
        style="aspect-ratio: 4 / 3;"
    >
        <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                <i class="bi bi-crop leading-none text-2xl"></i>
            </span>

            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste uma imagem para recortar</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
                </p>
            </div>

            <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 5 MB · JPEG</p>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.input-crop label="Erro" name="bad" error="Envie uma imagem recortada." />
<x-forms.input-crop label="Desabilitado" disabled name="dis" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*" aria-invalid="true">

    <label class="text-sm font-medium text-foreground">Erro</label>

    <div
        role="button"
        tabindex="0"
        class="group/card relative w-full overflow-hidden rounded-lg border bg-card border-danger text-sm cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-danger focus-within:ring-danger"
        style="aspect-ratio: 1 / 1;"
    >
        <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                <i class="bi bi-crop leading-none text-2xl"></i>
            </span>

            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste uma imagem para recortar</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
                </p>
            </div>

            <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 5 MB · JPEG</p>
        </div>
    </div>

    <p class="mb-0 text-xs text-danger" role="alert">Envie uma imagem recortada.</p>
</div>
<div class="mt-4 flex w-full flex-col gap-1.5">
    <input type="file" class="sr-only" accept="image/*" disabled>

    <label class="text-sm font-medium text-foreground">Desabilitado</label>

    <div
        role="button"
        tabindex="0"
        class="group/card relative w-full overflow-hidden rounded-lg border bg-card border-border text-sm cursor-not-allowed opacity-60 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-1 focus-within:border-primary focus-within:ring-primary"
        style="aspect-ratio: 1 / 1;"
    >
        <div class="flex h-full min-h-40 w-full flex-col items-center justify-center gap-2 px-4 py-8">
            <span class="inline-flex bg-primary/15 text-primary rounded-full p-3">
                <i class="bi bi-crop leading-none text-2xl"></i>
            </span>

            <div class="flex flex-col items-center gap-1 text-center">
                <p class="mb-0 font-medium text-foreground">Arraste uma imagem para recortar</p>
                <p class="mb-0 text-muted-foreground">
                    ou
                    <span class="font-medium text-primary underline-offset-2 hover:underline">Selecionar imagem</span>
                </p>
            </div>

            <p class="mb-0 text-center text-[11px] text-muted-foreground">image/* · Máx. 5 MB · JPEG</p>
        </div>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.input-crop&gt;</code> abre um modal com
            <strong>Cropper.js</strong> ao selecionar (ou soltar) uma imagem: aspect ratio,
            zoom, rotação, espelhamento, preview ao vivo, exportação com tamanho/formato/qualidade,
            recorte circular para avatares, fila para múltiplos arquivos e sync com formulário
            clássico ou Livewire (<code>wire:model</code>).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Selecione uma imagem para abrir o editor de recorte. Proporção padrão
                <code>square</code> (1:1), export JPEG.
            </x-slot:description>
            <x-forms.input-crop label="Imagem" name="image" />
        </x-ui.example>

        <x-ui.example title="Avatar circular" :code="$avatarCode" :html="$avatarHtml">
            <x-slot:description>
                Use <code>circular</code> + <code>aspect-lock</code> e
                <code>output-width</code>/<code>output-height</code> para foto de perfil.
            </x-slot:description>
            <x-forms.input-crop
                layout="avatar"
                circular
                aspect="square"
                aspect-lock
                label="Foto de perfil"
                name="avatar_demo"
                :output-width="400"
                :output-height="400"
                output-type="image/jpeg"
                max-size="5MB"
                hint="Recorte circular 1:1, exportado em 400×400."
            />
        </x-ui.example>

        <x-ui.example title="Capa 16:9" :code="$coverCode" :html="$coverHtml">
            <x-slot:description>
                Layout <code>card</code> com <code>aspect="video"</code> travado e saída 1280×720.
            </x-slot:description>
            <div class="max-w-xl">
                <x-forms.input-crop
                    layout="card"
                    label="Capa"
                    name="cover_demo"
                    aspect="video"
                    aspect-lock
                    :output-width="1280"
                    :output-height="720"
                    max-size="5MB"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Proporção livre" :code="$freeCode" :html="$freeHtml">
            <x-slot:description>
                Com <code>aspect="free"</code> a toolbar permite trocar 1:1, 16:9, 4:3, 3:4 ou livre.
            </x-slot:description>
            <x-forms.input-crop
                label="Recorte livre"
                name="free_demo"
                aspect="free"
                show-preview
                hint="Troque a proporção na toolbar do modal."
            />
        </x-ui.example>

        <x-ui.example title="Dropzone + WebP" :code="$dropzoneCode" :html="$dropzoneHtml">
            <x-slot:description>
                Layout <code>dropzone</code>, aspect <code>wide</code>, export
                <code>image/webp</code> com qualidade 0.85.
            </x-slot:description>
            <x-forms.input-crop
                layout="dropzone"
                label="Banner"
                name="banner_demo"
                aspect="wide"
                aspect-lock
                output-type="image/webp"
                :quality="0.85"
            />
        </x-ui.example>

        <x-ui.example title="Galeria (múltiplos)" :code="$galleryCode" :html="$galleryHtml">
            <x-slot:description>
                Cada arquivo abre o cropper em sequência (fila). Re-corte pelo ícone na miniatura.
            </x-slot:description>
            <x-forms.input-crop
                layout="gallery"
                label="Galeria"
                name="photos_demo"
                multiple
                :max-files="4"
                aspect="square"
                counter
                max-size="3MB"
            />
        </x-ui.example>

        <x-ui.example title="Saída PNG 512×512" :code="$outputCode" :html="$outputHtml">
            <x-slot:description>
                Controle <code>output-type</code>, <code>output-width</code>,
                <code>output-height</code> e <code>quality</code>.
            </x-slot:description>
            <x-forms.input-crop
                label="Thumbnail PNG"
                name="thumb_demo"
                aspect="square"
                aspect-lock
                :output-width="512"
                :output-height="512"
                output-type="image/png"
                :quality="1"
            />
        </x-ui.example>

        <x-ui.example title="Imagem existente" :code="$existingCode" :html="$existingHtml">
            <x-slot:description>
                Prop <code>existing</code> mostra a URL atual até o usuário substituir.
            </x-slot:description>
            <x-forms.input-crop
                layout="avatar"
                circular
                label="Avatar atual"
                name="profile_photo_demo"
                existing="https://picsum.photos/seed/crop/400/400"
                hint="Substitua para abrir o editor de recorte."
            />
        </x-ui.example>

        <x-ui.example title="Sem preview lateral" :code="$toolbarCode" :html="$toolbarHtml">
            <x-slot:description>
                Desligue o preview com <code>:show-preview="false"</code>.
            </x-slot:description>
            <x-forms.input-crop
                label="Sem preview lateral"
                name="no_preview_demo"
                :show-preview="false"
                aspect="landscape"
            />
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-forms.input-crop label="Erro" name="bad_demo" error="Envie uma imagem recortada." />
            <div class="mt-4">
                <x-forms.input-crop label="Desabilitado" disabled name="dis_demo" />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-input-crop" />
</x-ui.docs>
