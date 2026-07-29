<?php

use Livewire\Component;

return new class extends Component
{
    public string $body = '<p>Olá, <strong>mundo</strong>!</p>';

    public string $article = '';

    public function save(): never
    {
        $this->validate([
            'body' => ['required', 'min:10'],
            'article' => ['nullable', 'max:20000'],
        ]);
		dd($this->body);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.editor
    label="Conteúdo"
    name="body"
    hint="Editor WYSIWYG BaseLab (baselabeditor)."
>
    <p>Texto inicial com <em>ênfase</em>.</p>
</x-forms.editor>
BLADE;

    $basicHtml = <<<'HTML'
<div id="editor-body" class="flex w-full flex-col gap-1.5">
    <label for="editor-body-source" class="text-sm font-medium text-foreground">Conteúdo</label>

    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea id="editor-body-source" name="body" class="sr-only" tabindex="-1" aria-hidden="true"><p>Texto inicial com <em>ênfase</em>.</p></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 320px"></div>
    </div>

    <p class="mb-0 text-xs text-muted-foreground">Editor WYSIWYG BaseLab (baselabeditor).</p>
</div>
HTML;

    $presetsCode = <<<'BLADE'
<x-forms.editor label="Default" preset="default" :height="240" />
<x-forms.editor label="Minimalist" preset="minimalist" :height="200" />
<x-forms.editor label="Corporate" preset="corporate" locale="es" :height="240" />
BLADE;

    $presetsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Default</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 240px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Minimalist</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 200px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Corporate</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 240px"></div>
    </div>
</div>
HTML;

    $themesCode = <<<'BLADE'
<x-forms.editor label="Padrão" theme="padrao" :height="220" />
<x-forms.editor label="Escuro" theme="escuro" appearance="dark" :height="220" />
<x-forms.editor label="Corporate" theme="corporate" :height="220" />
BLADE;

    $themesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Padrão</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 220px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Escuro</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 220px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Corporate</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 220px"></div>
    </div>
</div>
HTML;

    $localesCode = <<<'BLADE'
<x-forms.editor label="Português" locale="pt" :height="200" />
<x-forms.editor label="English" locale="en" :height="200" />
<x-forms.editor label="Español" locale="es" :height="200" />
BLADE;

    $localesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Português</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 200px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">English</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 200px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Español</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 200px"></div>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.editor size="sm" label="Pequeno" />
<x-forms.editor size="md" label="Médio" />
<x-forms.editor size="lg" label="Grande" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-xs font-medium text-foreground">Pequeno</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 220px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Médio</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 320px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Grande</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 420px"></div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.editor variant="default" label="Default" :height="200" />
<x-forms.editor variant="filled" label="Filled" :height="200" />
<x-forms.editor variant="flush" label="Flush" :height="200" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Default</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 200px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Filled</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border border-transparent bg-muted shadow-none border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 200px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Flush</label>
    <div class="group/editor relative w-full transition-colors rounded-none border-0 border-b border-border bg-transparent shadow-none focus-within:ring-0 focus-within:border-b-2 border-border focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 200px"></div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.editor label="Sucesso" state="success" value="<p>Publicado.</p>" hint="Campo ok." :height="180" />
<x-forms.editor label="Atenção" state="warning" value="<p>Revisar…</p>" :height="180" />
<x-forms.editor label="Erro" state="danger" value="<p></p>" error="Conteúdo obrigatório." :height="180" />
<x-forms.editor label="Info" state="info" value="<p>Dica</p>" hint="Informação adicional." :height="180" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Sucesso</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-success focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"><p>Publicado.</p></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 180px"></div>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Campo ok.</p>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Atenção</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-warning focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-warning focus-within:ring-warning">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"><p>Revisar…</p></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 180px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Erro</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-danger focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger" aria-invalid="true">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"><p></p></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 180px"></div>
    </div>
    <p class="mb-0 text-xs text-danger" role="alert">Conteúdo obrigatório.</p>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Info</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-info focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-info focus-within:ring-info">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"><p>Dica</p></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 180px"></div>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">Informação adicional.</p>
</div>
HTML;

    $toolbarCode = <<<'BLADE'
<x-forms.editor
    label="Toolbar customizada"
    :plugins="['undo', 'redo', 'bold', 'italic', 'underline', 'link', 'bullet-list', 'numbered-list']"
    :toolbar="['undo redo | bold italic underline | link', 'bullet-list numbered-list']"
    :height="280"
/>
BLADE;

    $toolbarHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Toolbar customizada</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 280px"></div>
    </div>
</div>
HTML;

    $minimalCode = <<<'BLADE'
<x-forms.editor
    label="Só negrito e itálico"
    preset="minimalist"
    :footer="false"
    :height="180"
/>
BLADE;

    $minimalHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Só negrito e itálico</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 180px"></div>
    </div>
</div>
HTML;

    $counterCode = <<<'BLADE'
<x-forms.editor
    label="Resumo"
    counter
    word-counter
    :maxlength="500"
    placeholder="Escreva um resumo…"
    :height="220"
/>
BLADE;

    $counterHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Resumo</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true" placeholder="Escreva um resumo…" maxlength="500"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 220px"></div>
        <p class="pointer-events-none absolute start-4 top-14 z-10 max-w-[calc(100%-2rem)] text-sm text-muted-foreground">Escreva um resumo…</p>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0 palavras · 0/500</p>
    </div>
</div>
HTML;

    $clearableCode = <<<'BLADE'
<x-forms.editor
    label="Rascunho"
    clearable
    value="<p>Texto que pode ser limpo.</p>"
    :height="200"
/>
BLADE;

    $clearableHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Rascunho</label>
        <div class="flex items-center gap-1.5">
            <button type="button" class="inline-flex cursor-pointer items-center gap-1 rounded-md px-1.5 py-0.5 text-xs text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none" aria-label="Limpar editor">
                <i class="bi bi-x-lg text-[0.7rem] leading-none" aria-hidden="true"></i>
                Limpar
            </button>
        </div>
    </div>

    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"><p>Texto que pode ser limpo.</p></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 200px"></div>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.editor label="Desabilitado" disabled value="<p>Somente visual.</p>" :height="180" />
<x-forms.editor label="Readonly" readonly value="<p>Não editável.</p>" :height="180" />
<x-forms.editor label="Loading" loading value="<p>Salvando…</p>" :height="180" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Desabilitado</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary opacity-60">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true" disabled><p>Somente visual.</p></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 180px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Readonly</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true" readonly><p>Não editável.</p></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 180px"></div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label class="text-sm font-medium text-foreground">Loading</label>
        <div class="flex items-center gap-1.5">
            <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
        </div>
    </div>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary opacity-60">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true" disabled><p>Salvando…</p></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 180px"></div>
    </div>
</div>
HTML;

    $uploadCode = <<<'BLADE'
<x-forms.editor
    label="Com upload de imagem"
    :plugins="['undo', 'redo', 'bold', 'italic', 'image']"
    :toolbar="['undo redo | bold italic | image']"
    image-upload-url="/forms/api/editor-upload-demo"
    :image-max-size="2097152"
    :height="260"
    hint="POST multipart com campo file/image → JSON { url }."
/>
BLADE;

    $uploadHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Com upload de imagem</label>
    <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
        <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 260px"></div>
    </div>
    <p class="mb-0 text-xs text-muted-foreground">POST multipart com campo file/image → JSON { url }.</p>
</div>
HTML;

    $eventsCode = <<<'BLADE'
<div
    x-data="{ last: '' }"
    x-on:editor-change="last = $event.detail.value"
>
    <x-forms.editor label="Eventos" :height="200" />
    <p class="mt-2 text-xs text-muted-foreground" x-text="last ? ('HTML: ' + last) : 'Sem alterações ainda.'"></p>
</div>
BLADE;

    $eventsHtml = <<<'HTML'
<div x-data="{ last: '' }" x-on:editor-change="last = $event.detail.value">
    <div class="flex w-full flex-col gap-1.5">
        <label class="text-sm font-medium text-foreground">Eventos</label>
        <div class="group/editor relative w-full transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <textarea class="sr-only" tabindex="-1" aria-hidden="true"></textarea>
            <div class="forms-editor-mount min-h-[8rem] w-full [&_.editor]:!max-w-none [&_.editor]:!border-0 [&_.editor]:!shadow-none" style="min-height: 200px"></div>
        </div>
    </div>
    <p class="mt-2 text-xs text-muted-foreground" x-text="last ? ('HTML: ' + last) : 'Sem alterações ainda.'"></p>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.editor&gt;</code> embute o
            <a href="https://www.npmjs.com/package/baselabeditor" class="text-primary underline" target="_blank" rel="noopener">baselabeditor</a>
            (BaseLab Editor): label, hint, erro (via <code>$errors</code>), presets
            (<code>default</code>/<code>corporate</code>/<code>minimalist</code>), temas
            (<code>padrao</code>/<code>escuro</code>/<code>corporate</code>, locales
            <code>pt</code>/<code>en</code>/<code>es</code>, toolbar/plugins, footer,
            upload de imagem, contador, clearable, estados e binding Livewire via
            <code>x-modelable</code>. O mount usa <code>wire:ignore</code> para preservar
            o DOM do editor. <code>class</code> cai no wrapper; <code>wire:model*</code> no root.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Slot padrão (ou <code>value</code>) define o HTML inicial. Passe <code>name</code> para forms clássicos.
            </x-slot:description>
            <div class="w-full">
                <x-forms.editor
                    label="Conteúdo"
                    name="body"
                    hint="Editor WYSIWYG BaseLab (baselabeditor)."
                >
                    <p>Texto inicial com <em>ênfase</em>.</p>
                </x-forms.editor>
            </div>
        </x-ui.example>

        <x-ui.example title="Presets" :code="$presetsCode" :html="$presetsHtml">
            <x-slot:description>
                <code>preset</code>: <code>default</code>, <code>minimalist</code> (só bold/italic) e <code>corporate</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-3">
                <x-forms.editor label="Default" preset="default" :height="240" />
                <x-forms.editor label="Minimalist" preset="minimalist" :height="200" />
                <x-forms.editor label="Corporate" preset="corporate" locale="es" :height="240" />
            </div>
        </x-ui.example>

        <x-ui.example title="Temas e aparência" :code="$themesCode" :html="$themesHtml">
            <x-slot:description>
                <code>theme</code> e <code>appearance</code> (<code>light</code>/<code>dark</code>). Sem appearance, segue o dark mode da app.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-3">
                <x-forms.editor label="Padrão" theme="padrao" :height="220" />
                <x-forms.editor label="Escuro" theme="escuro" appearance="dark" :height="220" />
                <x-forms.editor label="Corporate" theme="corporate" :height="220" />
            </div>
        </x-ui.example>

        <x-ui.example title="Locales" :code="$localesCode" :html="$localesHtml">
            <x-slot:description>
                <code>locale</code>: <code>pt</code> (padrão), <code>en</code>, <code>es</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-forms.editor label="Português" locale="pt" :height="200" />
                <x-forms.editor label="English" locale="en" :height="200" />
                <x-forms.editor label="Español" locale="es" :height="200" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code> ajusta altura padrão: sm=220, md=320, lg=420. Sobrescreva com <code>height</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-forms.editor size="sm" label="Pequeno" />
                <x-forms.editor size="md" label="Médio" />
                <x-forms.editor size="lg" label="Grande" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Shell do campo: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-3">
                <x-forms.editor variant="default" label="Default" :height="200" />
                <x-forms.editor variant="filled" label="Filled" :height="200" />
                <x-forms.editor variant="flush" label="Flush" :height="200" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> ou <code>error</code> (força danger + <code>role="alert"</code>).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.editor label="Sucesso" state="success" value="<p>Publicado.</p>" hint="Campo ok." :height="180" />
                <x-forms.editor label="Atenção" state="warning" value="<p>Revisar…</p>" :height="180" />
                <x-forms.editor label="Erro" state="danger" value="<p></p>" error="Conteúdo obrigatório." :height="180" />
                <x-forms.editor label="Info" state="info" value="<p>Dica</p>" hint="Informação adicional." :height="180" />
            </div>
        </x-ui.example>

        <x-ui.example title="Toolbar e plugins" :code="$toolbarCode" :html="$toolbarHtml">
            <x-slot:description>
                <code>plugins</code> (ids) e <code>toolbar</code> (string ou array de linhas, com <code>|</code> como separador).
            </x-slot:description>
            <div class="w-full">
                <x-forms.editor
                    label="Toolbar customizada"
                    :plugins="['undo', 'redo', 'bold', 'italic', 'underline', 'link', 'bullet-list', 'numbered-list']"
                    :toolbar="['undo redo | bold italic underline | link', 'bullet-list numbered-list']"
                    :height="280"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Minimal (sem footer)" :code="$minimalCode" :html="$minimalHtml">
            <x-slot:description>
                <code>:footer="false"</code> esconde a status bar.
            </x-slot:description>
            <div class="w-full">
                <x-forms.editor
                    label="Só negrito e itálico"
                    preset="minimalist"
                    :footer="false"
                    :height="180"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Contador" :code="$counterCode" :html="$counterHtml">
            <x-slot:description>
                Conta texto plano (sem tags). <code>counter</code>, <code>word-counter</code>, <code>maxlength</code>.
            </x-slot:description>
            <div class="w-full">
                <x-forms.editor
                    label="Resumo"
                    counter
                    word-counter
                    :maxlength="500"
                    placeholder="Escreva um resumo…"
                    :height="220"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Clearable" :code="$clearableCode" :html="$clearableHtml">
            <x-slot:description>
                <code>clearable</code> limpa o HTML e dispara <code>editor-clear</code>.
            </x-slot:description>
            <div class="w-full">
                <x-forms.editor
                    label="Rascunho"
                    clearable
                    value="<p>Texto que pode ser limpo.</p>"
                    :height="200"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled, readonly e loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Bloqueia edição no surface (<code>contenteditable=false</code>) e reduz opacidade.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-3">
                <x-forms.editor label="Desabilitado" disabled value="<p>Somente visual.</p>" :height="180" />
                <x-forms.editor label="Readonly" readonly value="<p>Não editável.</p>" :height="180" />
                <x-forms.editor label="Loading" loading value="<p>Salvando…</p>" :height="180" />
            </div>
        </x-ui.example>

        <x-ui.example title="Upload de imagem" :code="$uploadCode" :html="$uploadHtml">
            <x-slot:description>
                <code>image-upload-url</code> faz POST multipart; resposta JSON com <code>url</code>.
                Também dispara <code>editor-upload</code>.
            </x-slot:description>
            <div class="w-full">
                <x-forms.editor
                    label="Com upload de imagem"
                    :plugins="['undo', 'redo', 'bold', 'italic', 'image']"
                    :toolbar="['undo redo | bold italic | image']"
                    image-upload-url="/forms/api/editor-upload-demo"
                    :image-max-size="2097152"
                    :height="260"
                    hint="POST multipart com campo file/image → JSON { url }."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Eventos Alpine" :code="$eventsCode" :html="$eventsHtml">
            <x-slot:description>
                <code>editor-ready</code>, <code>editor-change</code>, <code>editor-blur</code>,
                <code>editor-clear</code>, <code>editor-upload</code>, <code>editor-error</code>.
            </x-slot:description>
            <div
                class="w-full"
                x-data="{ last: '' }"
                x-on:editor-change="last = $event.detail.value"
            >
                <x-forms.editor label="Eventos" :height="200" />
                <p class="mt-2 text-xs text-muted-foreground" x-text="last ? ('HTML: ' + last) : 'Sem alterações ainda.'"></p>
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api component="forms/editor/editor" title="x-forms.editor" />
</x-ui.docs>
