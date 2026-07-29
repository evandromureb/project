<?php

use Livewire\Component;

return new class extends Component
{
    public string $bio = '';

    public string $notes = '';

    public function save(): void
    {
        $this->validate([
            'bio' => ['required', 'min:20', 'max:280'],
            'notes' => ['nullable', 'max:1000'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.textarea label="Biografia" name="bio" placeholder="Conte um pouco sobre você…" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-bio" class="text-sm font-medium text-foreground">Biografia</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-bio" name="bio" rows="3" placeholder="Conte um pouco sobre você…" autocomplete="off" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
HTML;

    $hintRequiredCode = <<<'BLADE'
<x-forms.textarea
    label="Mensagem"
    name="message"
    required
    hint="Seja claro e objetivo — até 500 caracteres."
    :rows="4"
    placeholder="Escreva sua mensagem…"
/>
BLADE;

    $hintRequiredHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-message" class="text-sm font-medium text-foreground">Mensagem <span class="text-danger" aria-hidden="true">*</span></label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-message" name="message" rows="4" placeholder="Escreva sua mensagem…" autocomplete="off" aria-describedby="textarea-message-hint" required class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="textarea-message-hint" class="mb-0 text-xs text-muted-foreground">Seja claro e objetivo — até 500 caracteres.</p>
        </div>
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.textarea size="sm" label="Pequeno" placeholder="size=sm" :rows="2" />
<x-forms.textarea size="md" label="Médio" placeholder="size=md" :rows="3" />
<x-forms.textarea size="lg" label="Grande" placeholder="size=lg" :rows="4" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-sm" class="text-xs font-medium text-foreground">Pequeno</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-2.5 py-2 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-sm" rows="2" placeholder="size=sm" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-xs resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-md" class="text-sm font-medium text-foreground">Médio</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-md" rows="3" placeholder="size=md" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-lg" class="text-sm font-medium text-foreground">Grande</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3.5 py-3 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-lg" rows="4" placeholder="size=lg" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-base resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.textarea variant="default" label="Default" placeholder="Borda + fundo do card" />
<x-forms.textarea variant="filled" label="Filled" placeholder="Fundo muted" />
<x-forms.textarea variant="flush" label="Flush" placeholder="Somente underline" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-default" class="text-sm font-medium text-foreground">Default</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-default" rows="3" placeholder="Borda + fundo do card" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-filled" class="text-sm font-medium text-foreground">Filled</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border border-transparent bg-muted shadow-none border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-filled" rows="3" placeholder="Fundo muted" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-flush" class="text-sm font-medium text-foreground">Flush</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-none border-0 border-b border-border bg-transparent shadow-none focus-within:ring-0 focus-within:border-b-2 border-border focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-flush" rows="3" placeholder="Somente underline" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.textarea label="Sucesso" state="success" value="Texto válido." hint="Campo ok." />
<x-forms.textarea label="Atenção" state="warning" value="Revisar…" hint="Confira o conteúdo." />
<x-forms.textarea label="Erro" state="danger" value="Inválido" error="Este campo é obrigatório." />
<x-forms.textarea label="Info" state="info" value="Dica" hint="Informação adicional." />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-success" class="text-sm font-medium text-foreground">Sucesso</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-success focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-success" rows="3" aria-describedby="textarea-success-hint" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed">Texto válido.</textarea>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="textarea-success-hint" class="mb-0 text-xs text-muted-foreground">Campo ok.</p>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-warning" class="text-sm font-medium text-foreground">Atenção</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-warning focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-warning focus-within:ring-warning px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-warning" rows="3" aria-describedby="textarea-warning-hint" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed">Revisar…</textarea>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="textarea-warning-hint" class="mb-0 text-xs text-muted-foreground">Confira o conteúdo.</p>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-danger" class="text-sm font-medium text-foreground">Erro</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-danger focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-danger" rows="3" aria-describedby="textarea-danger-error" aria-invalid="true" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed">Inválido</textarea>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="textarea-danger-error" class="mb-0 text-xs text-danger" role="alert">Este campo é obrigatório.</p>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-info" class="text-sm font-medium text-foreground">Info</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-info focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-info focus-within:ring-info px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-info" rows="3" aria-describedby="textarea-info-hint" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed">Dica</textarea>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1">
            <p id="textarea-info-hint" class="mb-0 text-xs text-muted-foreground">Informação adicional.</p>
        </div>
    </div>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.textarea color="primary" label="Primary" placeholder="focus ring" :rows="2" />
<x-forms.textarea color="success" label="Success" placeholder="focus ring" :rows="2" />
<x-forms.textarea color="warning" label="Warning" placeholder="focus ring" :rows="2" />
<x-forms.textarea color="danger" label="Danger" placeholder="focus ring" :rows="2" />
<x-forms.textarea color="info" label="Info" placeholder="focus ring" :rows="2" />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-color-primary" class="text-sm font-medium text-foreground">Primary</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-color-primary" rows="2" placeholder="focus ring" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-color-success" class="text-sm font-medium text-foreground">Success</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-color-success" rows="2" placeholder="focus ring" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-color-warning" class="text-sm font-medium text-foreground">Warning</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-warning focus-within:ring-warning px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-color-warning" rows="2" placeholder="focus ring" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-color-danger" class="text-sm font-medium text-foreground">Danger</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-color-danger" rows="2" placeholder="focus ring" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-color-info" class="text-sm font-medium text-foreground">Info</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-info focus-within:ring-info px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-color-info" rows="2" placeholder="focus ring" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
HTML;

    $rowsCode = <<<'BLADE'
<x-forms.textarea label="2 linhas" :rows="2" placeholder="rows=2" />
<x-forms.textarea label="5 linhas" :rows="5" placeholder="rows=5" />
<x-forms.textarea label="8 linhas" :rows="8" placeholder="rows=8" />
BLADE;

    $rowsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-rows-2" class="text-sm font-medium text-foreground">2 linhas</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-rows-2" rows="2" placeholder="rows=2" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-rows-5" class="text-sm font-medium text-foreground">5 linhas</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-rows-5" rows="5" placeholder="rows=5" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-rows-8" class="text-sm font-medium text-foreground">8 linhas</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-rows-8" rows="8" placeholder="rows=8" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
HTML;

    $resizeCode = <<<'BLADE'
<x-forms.textarea label="Vertical (padrão)" resize="vertical" placeholder="Arraste pela borda inferior" />
<x-forms.textarea label="Sem resize" resize="none" placeholder="Altura fixa" />
<x-forms.textarea label="Ambos" resize="both" placeholder="Horizontal e vertical" />
BLADE;

    $resizeHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-resize-vertical" class="text-sm font-medium text-foreground">Vertical (padrão)</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-resize-vertical" rows="3" placeholder="Arraste pela borda inferior" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-resize-none" class="text-sm font-medium text-foreground">Sem resize</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-resize-none" rows="3" placeholder="Altura fixa" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-none leading-relaxed"></textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-resize-both" class="text-sm font-medium text-foreground">Ambos</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-resize-both" rows="3" placeholder="Horizontal e vertical" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize leading-relaxed"></textarea>
        </div>
    </div>
</div>
HTML;

    $autoGrowCode = <<<'BLADE'
<x-forms.textarea
    label="Auto-grow"
    auto-grow
    :rows="2"
    :max-rows="8"
    placeholder="Digite — a altura cresce até 8 linhas…"
/>
BLADE;

    $autoGrowHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-autogrow" class="text-sm font-medium text-foreground">Auto-grow</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-autogrow" rows="2" placeholder="Digite — a altura cresce até 8 linhas…" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-none leading-relaxed"></textarea>
        </div>
    </div>
</div>
HTML;

    $counterCode = <<<'BLADE'
<x-forms.textarea label="Bio" :maxlength="280" counter placeholder="Até 280 caracteres" />
<x-forms.textarea label="Resumo" word-counter counter placeholder="Conta palavras e caracteres" />
BLADE;

    $counterHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-counter-bio" class="text-sm font-medium text-foreground">Bio</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-counter-bio" rows="3" placeholder="Até 280 caracteres" maxlength="280" aria-describedby="textarea-counter-bio-counter" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p id="textarea-counter-bio-counter" class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0/280</p>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-counter-resumo" class="text-sm font-medium text-foreground">Resumo</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-counter-resumo" rows="3" placeholder="Conta palavras e caracteres" aria-describedby="textarea-counter-resumo-counter" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0 flex-1"></div>
        <p id="textarea-counter-resumo-counter" class="mb-0 shrink-0 text-xs tabular-nums text-muted-foreground">0 palavras · 0</p>
    </div>
</div>
HTML;

    $clearableCode = <<<'BLADE'
<x-forms.textarea
    label="Rascunho"
    clearable
    value="Texto que pode ser limpo com o botão X"
    :rows="3"
/>
BLADE;

    $clearableHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-clearable" class="text-sm font-medium text-foreground">Rascunho</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-clearable" rows="3" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed">Texto que pode ser limpo com o botão X</textarea>
        </div>
        <div class="pointer-events-none absolute end-2 top-2 z-10 flex items-center gap-1">
            <button
                type="button"
                class="pointer-events-auto flex shrink-0 cursor-pointer items-center justify-center rounded-full p-0.5 text-muted-foreground transition-colors hover:bg-muted hover:text-foreground disabled:pointer-events-none"
                aria-label="Limpar"
            >
                <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
HTML;

    $floatingCode = <<<'BLADE'
<x-forms.textarea floating label="Observações" :rows="4" />
<x-forms.textarea floating label="Comentário" required :rows="3" />
BLADE;

    $floatingHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-floating-observacoes" rows="4" placeholder=" " class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed peer placeholder-transparent pt-4"></textarea>
            <label
                for="textarea-floating-observacoes"
                class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-3 translate-y-0 text-sm"
            >Observações</label>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-floating-comentario" rows="3" placeholder=" " required class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed peer placeholder-transparent pt-4"></textarea>
            <label
                for="textarea-floating-comentario"
                class="pointer-events-none absolute start-0 z-10 text-muted-foreground transition-all duration-150 ease-out top-3 translate-y-0 text-sm"
            >Comentário <span class="text-danger" aria-hidden="true">*</span></label>
        </div>
    </div>
</div>
HTML;

    $roundedCode = <<<'BLADE'
<x-forms.textarea rounded label="Notas" placeholder="Cantos mais arredondados" :rows="3" />
BLADE;

    $roundedHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-rounded" class="text-sm font-medium text-foreground">Notas</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-2xl border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-rounded" rows="3" placeholder="Cantos mais arredondados" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.textarea label="Desabilitado" disabled value="somente leitura visual" />
<x-forms.textarea label="Readonly" readonly value="não editável" />
<x-forms.textarea label="Loading" loading placeholder="Salvando…" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-disabled" class="text-sm font-medium text-foreground">Desabilitado</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-not-allowed opacity-60 w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-disabled" rows="3" disabled class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed">somente leitura visual</textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-readonly" class="text-sm font-medium text-foreground">Readonly</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-readonly" rows="3" readonly class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed">não editável</textarea>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-loading" class="text-sm font-medium text-foreground">Loading</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-not-allowed opacity-60 w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-loading" rows="3" placeholder="Salvando…" disabled class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed"></textarea>
        </div>
        <div class="pointer-events-none absolute end-2 top-2 z-10 flex items-center gap-1">
            <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent text-muted-foreground" aria-hidden="true"></span>
        </div>
    </div>
</div>
HTML;

    $slotCode = <<<'BLADE'
<x-forms.textarea label="Conteúdo via slot" name="body">
Conteúdo inicial no slot padrão.
</x-forms.textarea>
BLADE;

    $slotHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="textarea-body" class="text-sm font-medium text-foreground">Conteúdo via slot</label>
    <div class="group/textarea relative flex w-full flex-col transition-colors rounded-lg border bg-card shadow-sm border-border focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary px-3 py-2.5 cursor-text w-full">
        <div class="relative min-w-0 flex-1">
            <textarea id="textarea-body" name="body" rows="3" autocomplete="off" class="min-w-0 w-full bg-transparent text-foreground outline-none placeholder:text-muted-foreground disabled:cursor-not-allowed read-only:cursor-default text-sm resize-y leading-relaxed">
Conteúdo inicial no slot padrão.
            </textarea>
        </div>
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.textarea&gt;</code> é o campo multilinha completo:
            label, hint, erro (com detecção automática via <code>$errors</code>), variantes
            <code>default</code>/<code>filled</code>/<code>flush</code>, estados, floating label,
            clearable, contador de caracteres/palavras, auto-grow, resize e loading.
            Atributos como <code>wire:model</code> e <code>autofocus</code> caem no
            <code>&lt;textarea&gt;</code>; <code>class</code> no wrapper.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Label + placeholder. Passe <code>name</code> para formulários HTML clássicos.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.textarea label="Biografia" name="bio" placeholder="Conte um pouco sobre você…" />
            </div>
        </x-ui.example>

        <x-ui.example title="Hint e obrigatório" :code="$hintRequiredCode" :html="$hintRequiredHtml">
            <x-slot:description>
                <code>required</code> marca o asterisco; <code>hint</code> aparece abaixo do campo.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.textarea
                    label="Mensagem"
                    name="message"
                    required
                    hint="Seja claro e objetivo — até 500 caracteres."
                    :rows="4"
                    placeholder="Escreva sua mensagem…"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code> (padrão) e <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.textarea size="sm" label="Pequeno" placeholder="size=sm" :rows="2" />
                <x-forms.textarea size="md" label="Médio" placeholder="size=md" :rows="3" />
                <x-forms.textarea size="lg" label="Grande" placeholder="size=lg" :rows="4" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>default</code>, <code>filled</code> e <code>flush</code> (underline).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.textarea variant="default" label="Default" placeholder="Borda + fundo do card" />
                <x-forms.textarea variant="filled" label="Filled" placeholder="Fundo muted" />
                <x-forms.textarea variant="flush" label="Flush" placeholder="Somente underline" />
            </div>
        </x-ui.example>

        <x-ui.example title="Linhas (rows)" :code="$rowsCode" :html="$rowsHtml">
            <x-slot:description>
                <code>rows</code> define a altura inicial (e o mínimo do auto-grow).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.textarea label="2 linhas" :rows="2" placeholder="rows=2" />
                <x-forms.textarea label="5 linhas" :rows="5" placeholder="rows=5" />
                <x-forms.textarea label="8 linhas" :rows="8" placeholder="rows=8" />
            </div>
        </x-ui.example>

        <x-ui.example title="Resize" :code="$resizeCode" :html="$resizeHtml">
            <x-slot:description>
                <code>resize</code>: <code>vertical</code> (padrão), <code>none</code>, <code>horizontal</code> ou <code>both</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.textarea label="Vertical (padrão)" resize="vertical" placeholder="Arraste pela borda inferior" />
                <x-forms.textarea label="Sem resize" resize="none" placeholder="Altura fixa" />
                <x-forms.textarea label="Ambos" resize="both" placeholder="Horizontal e vertical" />
            </div>
        </x-ui.example>

        <x-ui.example title="Auto-grow" :code="$autoGrowCode" :html="$autoGrowHtml">
            <x-slot:description>
                <code>auto-grow</code> cresce com o conteúdo. Use <code>rows</code>/<code>min-rows</code> e
                <code>max-rows</code> para limites. Com auto-grow, <code>resize</code> vira <code>none</code>.
            </x-slot:description>
            <div class="w-full max-w-xl">
                <x-forms.textarea
                    label="Auto-grow"
                    auto-grow
                    :rows="2"
                    :max-rows="8"
                    placeholder="Digite — a altura cresce até 8 linhas…"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> ou <code>error</code> (força <code>danger</code> + mensagem com <code>role="alert"</code>).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                <x-forms.textarea label="Sucesso" state="success" value="Texto válido." hint="Campo ok." />
                <x-forms.textarea label="Atenção" state="warning" value="Revisar…" hint="Confira o conteúdo." />
                <x-forms.textarea label="Erro" state="danger" value="Inválido" error="Este campo é obrigatório." />
                <x-forms.textarea label="Info" state="info" value="Dica" hint="Informação adicional." />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores de foco" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> controla o anel de foco quando não há <code>state</code>/<code>error</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-5">
                <x-forms.textarea color="primary" label="Primary" placeholder="focus ring" :rows="2" />
                <x-forms.textarea color="success" label="Success" placeholder="focus ring" :rows="2" />
                <x-forms.textarea color="warning" label="Warning" placeholder="focus ring" :rows="2" />
                <x-forms.textarea color="danger" label="Danger" placeholder="focus ring" :rows="2" />
                <x-forms.textarea color="info" label="Info" placeholder="focus ring" :rows="2" />
            </div>
        </x-ui.example>

        <x-ui.example title="Contador" :code="$counterCode" :html="$counterHtml">
            <x-slot:description>
                <code>counter</code>/<code>maxlength</code> para caracteres; <code>word-counter</code> para palavras.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.textarea label="Bio" :maxlength="280" counter placeholder="Até 280 caracteres" />
                <x-forms.textarea label="Resumo" word-counter counter placeholder="Conta palavras e caracteres" />
            </div>
        </x-ui.example>

        <x-ui.example title="Clearable" :code="$clearableCode" :html="$clearableHtml">
            <x-slot:description>
                <code>clearable</code> mostra o botão X quando há valor (dispara <code>input</code>/<code>change</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.textarea
                    label="Rascunho"
                    clearable
                    value="Texto que pode ser limpo com o botão X"
                    :rows="3"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Floating label" :code="$floatingCode" :html="$floatingHtml">
            <x-slot:description>
                <code>floating</code> anima o label para dentro do campo.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.textarea floating label="Observações" :rows="4" />
                <x-forms.textarea floating label="Comentário" required :rows="3" />
            </div>
        </x-ui.example>

        <x-ui.example title="Rounded" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code> aplica cantos mais arredondados (<code>rounded-2xl</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.textarea rounded label="Notas" placeholder="Cantos mais arredondados" :rows="3" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled, readonly e loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code>, <code>readonly</code> e <code>loading</code> (spinner + disabled).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.textarea label="Desabilitado" disabled value="somente leitura visual" />
                <x-forms.textarea label="Readonly" readonly value="não editável" />
                <x-forms.textarea label="Loading" loading placeholder="Salvando…" />
            </div>
        </x-ui.example>

        <x-ui.example title="Conteúdo via slot" :code="$slotCode" :html="$slotHtml">
            <x-slot:description>
                O slot padrão preenche o valor inicial (alternativa à prop <code>value</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.textarea label="Conteúdo via slot" name="body">
Conteúdo inicial no slot padrão.
                </x-forms.textarea>
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-textarea" />
</x-ui.docs>
