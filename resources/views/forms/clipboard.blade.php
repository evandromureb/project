<?php

use Livewire\Component;

return new class extends Component
{
    public string $inviteUrl = 'https://app.example.com/invite/abc123xyz';

    public string $apiKey = 'sk_live_51MqR2eK9xY7pL0vN3wQ8tU';

    public string $snippet = "composer require laravel/boost\nphp artisan boost:install";

    public function save(): void
    {
        $this->validate([
            'inviteUrl' => ['required', 'url'],
            'apiKey' => ['required', 'string', 'min:10'],
            'snippet' => ['required', 'string'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.clipboard
    label="Link de convite"
    name="invite"
    value="https://app.example.com/invite/abc123xyz"
/>
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label for="clipboard-invite" class="text-sm font-medium text-foreground">Link de convite</label>
    <input type="hidden" name="invite" value="https://app.example.com/invite/abc123xyz">
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                <i class="bi bi-link-45deg leading-none text-sm"></i>
            </span>
            <div class="relative min-w-0 h-full flex-1">
                <input id="clipboard-invite" type="text" value="https://app.example.com/invite/abc123xyz" readonly autocomplete="off" spellcheck="false" class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none placeholder:text-muted-foreground read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none"></i>
                </button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
</div>
HTML;

    $buttonLabelCode = <<<'BLADE'
<x-forms.clipboard
    label="URL pública"
    icon=""
    value="https://example.com/p/hello"
    button="both"
    button-label="Copiar link"
/>
BLADE;

    $buttonLabelHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">URL pública</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="https://example.com/p/hello" readonly autocomplete="off" spellcheck="false" class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar link">
                    <i class="bi bi-clipboard leading-none"></i>
                    <span class="text-xs">Copiar link</span>
                </button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
</div>
HTML;

    $noIconCode = <<<'BLADE'
<x-forms.clipboard
    label="Link de convite"
    icon=""
    value="https://app.example.com/invite/abc123xyz"
    button="both"
    button-label="Copiar"
/>

<x-forms.clipboard
    label="Endpoint"
    icon=""
    value="https://api.example.com/v1/users"
    click-to-copy
/>

<x-forms.clipboard
    mode="textarea"
    label="Snippet"
    icon=""
    :rows="3"
    value="npm install && npm run build"
/>
BLADE;

    $noIconHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Link de convite</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="https://app.example.com/invite/abc123xyz" readonly autocomplete="off" spellcheck="false" class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none"></i>
                    <span class="text-xs">Copiar</span>
                </button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Endpoint</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="https://api.example.com/v1/users" readonly autocomplete="off" spellcheck="false" class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none"></i>
                </button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Snippet</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-stretch gap-2 rounded-lg border bg-card shadow-sm border-border min-h-20 text-sm px-3 cursor-text transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="relative min-w-0 flex-1">
                <textarea rows="3" readonly class="w-full min-w-0 flex-1 resize-y bg-transparent py-2 font-mono text-[0.8125rem] tracking-tight text-foreground outline-none read-only:cursor-default">npm install &amp;&amp; npm run build</textarea>
            </div>
            <div class="relative z-10 mt-1.5 flex shrink-0 items-center gap-0.5 self-start">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none"></i>
                </button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
</div>
HTML;

    $editableCode = <<<'BLADE'
<x-forms.clipboard
    label="Mensagem"
    name="message"
    icon=""
    editable
    clearable
    value="Olá! Segue o link da reunião."
    hint="Edite e copie o texto final."
/>
BLADE;

    $editableHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Mensagem</label>
    <input type="hidden" name="message" value="Olá! Segue o link da reunião.">
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="Olá! Segue o link da reunião." autocomplete="off" spellcheck="false" class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-muted-foreground hover:text-foreground" aria-label="Limpar">
                    <i class="bi bi-x-lg text-xs leading-none"></i>
                </button>
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none"></i>
                </button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
    <p class="text-xs text-muted-foreground">Edite e copie o texto final.</p>
</div>
HTML;

    $maskedCode = <<<'BLADE'
<x-forms.clipboard
    label="API Key"
    name="api_key"
    masked
    value="sk_live_51MqR2eK9xY7pL0vN3wQ8tU"
    button="both"
    hint="Revele ou copie sem exibir."
/>
BLADE;

    $maskedHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">API Key</label>
    <input type="hidden" name="api_key" value="sk_live_51MqR2eK9xY7pL0vN3wQ8tU">
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                <i class="bi bi-link-45deg leading-none text-sm"></i>
            </span>
            <div class="relative min-w-0 h-full flex-1">
                <input type="password" value="sk_live_51MqR2eK9xY7pL0vN3wQ8tU" readonly autocomplete="off" spellcheck="false" class="h-full w-full min-w-0 flex-1 bg-transparent font-mono text-[0.8125rem] tracking-tight text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-muted-foreground hover:text-foreground" aria-label="Mostrar">
                    <i class="bi bi-eye leading-none"></i>
                </button>
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none"></i>
                    <span class="text-xs">Copiar</span>
                </button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
    <p class="text-xs text-muted-foreground">Revele ou copie sem exibir.</p>
</div>
HTML;

    $copyValueCode = <<<'BLADE'
<x-forms.clipboard
    label="Token mascarado"
    icon=""
    value="sk_live_••••••••••••8tU"
    copy-value="sk_live_51MqR2eK9xY7pL0vN3wQ8tU"
    hint="Mostra versão mascarada; copia o valor real."
/>
BLADE;

    $copyValueHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Token mascarado</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="sk_live_••••••••••••8tU" readonly autocomplete="off" spellcheck="false" class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none"></i>
                </button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
    <p class="text-xs text-muted-foreground">Mostra versão mascarada; copia o valor real.</p>
</div>
HTML;

    $textareaCode = <<<'BLADE'
<x-forms.clipboard
    mode="textarea"
    label="Notas"
    icon=""
    :rows="4"
    value="Linha 1
Linha 2
Linha 3"
/>
BLADE;

    $textareaHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Notas</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-stretch gap-2 rounded-lg border bg-card shadow-sm border-border min-h-24 text-sm px-3 cursor-text transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="relative min-w-0 flex-1">
                <textarea rows="4" readonly class="w-full min-w-0 flex-1 resize-y bg-transparent py-2 font-mono text-[0.8125rem] tracking-tight text-foreground outline-none read-only:cursor-default">Linha 1
Linha 2
Linha 3</textarea>
            </div>
            <div class="relative z-10 mt-1.5 flex shrink-0 items-center gap-0.5 self-start">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none"></i>
                </button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
</div>
HTML;

    $codeCode = <<<'BLADE'
<x-forms.clipboard
    mode="code"
    label="Instalação"
    language="bash"
    button="both"
    value="composer require laravel/boost
php artisan boost:install"
/>
BLADE;

    $codeHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Instalação</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full flex-col gap-0 rounded-lg border bg-card shadow-sm border-border p-0 text-sm cursor-text transition-colors">
            <div class="flex items-center justify-between gap-2 border-b border-border px-3 py-1.5">
                <div class="flex min-w-0 items-center gap-2">
                    <i class="bi bi-code-slash leading-none text-sm text-muted-foreground"></i>
                    <span class="truncate text-[10px] font-semibold uppercase tracking-wide text-muted-foreground">bash</span>
                </div>
                <div class="flex items-center gap-1">
                    <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                        <i class="bi bi-clipboard leading-none"></i>
                        <span class="text-xs">Copiar</span>
                    </button>
                </div>
            </div>
            <div class="relative min-w-0 flex-1">
                <textarea rows="3" readonly class="w-full min-w-0 flex-1 resize-y bg-transparent px-3 py-2 font-mono text-[0.8125rem] tracking-tight text-foreground outline-none read-only:cursor-default">composer require laravel/boost
php artisan boost:install</textarea>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
</div>
HTML;

    $buttonModeCode = <<<'BLADE'
<x-forms.clipboard
    mode="button"
    label="Código promocional"
    value="BEMVINDO20"
    button="both"
    button-label="Copiar cupom"
/>
BLADE;

    $buttonModeHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <span class="text-sm font-medium text-foreground">Código promocional</span>
    <button type="button" class="inline-flex items-center justify-center gap-2 rounded-lg border bg-card shadow-sm border-border text-sm h-9.5 px-3 font-medium transition-colors cursor-pointer hover:bg-muted text-primary" aria-label="Copiar cupom">
        <i class="bi bi-clipboard leading-none text-sm"></i>
        <span>Copiar cupom</span>
    </button>
    <p class="sr-only" aria-live="polite"></p>
</div>
HTML;

    $clickCode = <<<'BLADE'
<x-forms.clipboard
    label="Clique para copiar"
    icon=""
    value="https://example.com/share/42"
    click-to-copy
    hint="Clique em qualquer lugar do campo."
/>
BLADE;

    $clickHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Clique para copiar</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-pointer transition-colors focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="https://example.com/share/42" readonly autocomplete="off" spellcheck="false" class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none"></i>
                </button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
    <p class="text-xs text-muted-foreground">Clique em qualquer lugar do campo.</p>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.clipboard size="sm" label="Pequeno" icon="" value="sm-token" />
<x-forms.clipboard size="md" label="Médio" value="md-token" />
<x-forms.clipboard size="lg" label="Grande" icon="" value="lg-token" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-xs font-medium text-foreground">Pequeno</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-8 text-xs px-2.5 cursor-text">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="sm-token" readonly class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-xs font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none text-sm"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Médio</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true">
                <i class="bi bi-link-45deg leading-none text-sm"></i>
            </span>
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="md-token" readonly class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none text-sm"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Grande</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-11 text-base px-3.5 cursor-text">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="lg-token" readonly class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-base font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                    <i class="bi bi-clipboard leading-none text-base"></i>
                </button>
            </div>
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.clipboard variant="default" label="Default" icon="" value="default" />
<x-forms.clipboard variant="filled" label="Filled" value="filled" />
<x-forms.clipboard variant="flush" label="Flush" icon="" value="flush" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Default</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-border h-9.5 text-sm px-3 cursor-text">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="default" readonly class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar"><i class="bi bi-clipboard leading-none"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Filled</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border border-transparent bg-muted shadow-none text-sm h-9.5 px-3 cursor-text">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-muted-foreground" aria-hidden="true"><i class="bi bi-link-45deg leading-none text-sm"></i></span>
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="filled" readonly class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar"><i class="bi bi-clipboard leading-none"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Flush</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-none border-0 border-b border-border bg-transparent shadow-none text-sm h-9.5 px-3 cursor-text focus-within:ring-0 focus-within:border-b-2">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="flush" readonly class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar"><i class="bi bi-clipboard leading-none"></i></button>
            </div>
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.clipboard label="Sucesso" state="success" icon="" value="ok-123" />
<x-forms.clipboard label="Erro" error="Não foi possível gerar o link." value="" />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Sucesso</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-success h-9.5 text-sm px-3 cursor-text focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-success focus-within:ring-success">
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="ok-123" readonly class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar"><i class="bi bi-clipboard leading-none"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Erro</label>
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-lg border bg-card shadow-sm border-danger h-9.5 text-sm px-3 cursor-text focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-danger focus-within:ring-danger">
            <span class="relative z-10 inline-flex shrink-0 items-center justify-center text-danger" aria-hidden="true"><i class="bi bi-link-45deg leading-none text-sm"></i></span>
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="" readonly aria-invalid="true" class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" disabled class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10 disabled:pointer-events-none disabled:opacity-40" aria-label="Copiar"><i class="bi bi-clipboard leading-none"></i></button>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
    <p class="text-xs text-danger" role="alert">Não foi possível gerar o link.</p>
</div>
HTML;

    $addonsCode = <<<'BLADE'
<x-forms.clipboard label="Endpoint" icon="" value="users" prefix="/api/v1/">
    <x-slot:addon-end>.json</x-slot:addon-end>
</x-forms.clipboard>
BLADE;

    $addonsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="text-sm font-medium text-foreground">Endpoint</label>
    <div class="flex w-full items-stretch rounded-lg focus-within:ring-2 focus-within:ring-offset-1 focus-within:border-primary focus-within:ring-primary">
        <div class="group/clipboard relative flex w-full items-center gap-2 rounded-l-none rounded-r-lg border bg-card shadow-none border-border h-9.5 text-sm px-3 cursor-text min-w-0 flex-1">
            <span class="relative z-10 inline-flex shrink-0 select-none items-center text-sm text-muted-foreground">/api/v1/</span>
            <div class="relative min-w-0 h-full flex-1">
                <input type="text" value="users" readonly class="h-full w-full min-w-0 flex-1 bg-transparent text-foreground outline-none read-only:cursor-default">
            </div>
            <div class="relative z-10 flex shrink-0 items-center gap-0.5">
                <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar"><i class="bi bi-clipboard leading-none"></i></button>
            </div>
        </div>
        <div class="box-border inline-flex shrink-0 items-center border border-l-0 rounded-r-lg border-border bg-muted px-3 text-sm font-medium text-muted-foreground h-9.5">.json</div>
    </div>
</div>
HTML;

    $slotCode = <<<'BLADE'
<x-forms.clipboard mode="code" language="php" button="both">
$user->notify(new InviteCreated($invite));
</x-forms.clipboard>
BLADE;

    $slotHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <div class="flex w-full items-stretch">
        <div class="group/clipboard relative flex w-full flex-col gap-0 rounded-lg border bg-card shadow-sm border-border p-0 text-sm cursor-text">
            <div class="flex items-center justify-between gap-2 border-b border-border px-3 py-1.5">
                <div class="flex min-w-0 items-center gap-2">
                    <i class="bi bi-code-slash leading-none text-sm text-muted-foreground"></i>
                    <span class="truncate text-[10px] font-semibold uppercase tracking-wide text-muted-foreground">php</span>
                </div>
                <div class="flex items-center gap-1">
                    <button type="button" class="relative z-10 inline-flex shrink-0 cursor-pointer items-center justify-center gap-1.5 rounded-md px-1.5 py-1 text-sm font-medium transition-colors text-primary hover:bg-primary/10" aria-label="Copiar">
                        <i class="bi bi-clipboard leading-none"></i>
                        <span class="text-xs">Copiar</span>
                    </button>
                </div>
            </div>
            <div class="relative min-w-0 flex-1">
                <textarea rows="3" readonly class="w-full min-w-0 flex-1 resize-y bg-transparent px-3 py-2 font-mono text-[0.8125rem] tracking-tight text-foreground outline-none read-only:cursor-default">$user->notify(new InviteCreated($invite));</textarea>
            </div>
        </div>
    </div>
    <p class="sr-only" aria-live="polite"></p>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.clipboard&gt;</code> copia texto para a área de transferência:
            modos <code>input</code>, <code>textarea</code>, <code>code</code> e <code>button</code>,
            máscara, valor de exibição ≠ valor copiado, click-to-copy, feedback acessível e
            eventos <code>clipboard-copied</code> / <code>clipboard-failed</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Campo readonly com botão de copiar (ícone). Feedback visual e <code>aria-live</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.clipboard
                    label="Link de convite"
                    name="demo_invite"
                    value="https://app.example.com/invite/abc123xyz"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Botão com label" :code="$buttonLabelCode" :html="$buttonLabelHtml">
            <x-slot:description>
                <code>button="both"</code> mostra ícone + texto que alterna para “Copiado!”.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.clipboard
                    label="URL pública"
                    icon=""
                    value="https://example.com/p/hello"
                    button="both"
                    button-label="Copiar link"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Sem ícone" :code="$noIconCode" :html="$noIconHtml">
            <x-slot:description>
                Use <code>icon=""</code> (ou <code>icon="none"</code>) para remover o ícone à esquerda.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.clipboard
                    label="Link de convite"
                    icon=""
                    value="https://app.example.com/invite/abc123xyz"
                    button="both"
                    button-label="Copiar"
                />
                <x-forms.clipboard
                    label="Endpoint"
                    icon=""
                    value="https://api.example.com/v1/users"
                    click-to-copy
                />
                <x-forms.clipboard
                    mode="textarea"
                    label="Snippet"
                    icon=""
                    :rows="3"
                    value="npm install && npm run build"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Editável" :code="$editableCode" :html="$editableHtml">
            <x-slot:description>
                <code>editable</code> permite alterar o texto antes de copiar.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.clipboard
                    label="Mensagem"
                    name="demo_message"
                    icon=""
                    editable
                    clearable
                    value="Olá! Segue o link da reunião."
                    hint="Edite e copie o texto final."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Mascarado (API key)" :code="$maskedCode" :html="$maskedHtml">
            <x-slot:description>
                <code>masked</code> aplica <code>text-security</code> + toggle de revelar
                (sem <code>type="password"</code>).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.clipboard
                    label="API Key"
                    name="demo_api_key"
                    masked
                    value="sk_live_51MqR2eK9xY7pL0vN3wQ8tU"
                    button="both"
                    hint="Revele ou copie sem exibir."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Display ≠ copy" :code="$copyValueCode" :html="$copyValueHtml">
            <x-slot:description>
                <code>value</code> é o que aparece; <code>copy-value</code> é o que vai para o clipboard.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.clipboard
                    label="Token mascarado"
                    icon=""
                    value="sk_live_••••••••••••8tU"
                    copy-value="sk_live_51MqR2eK9xY7pL0vN3wQ8tU"
                    hint="Mostra versão mascarada; copia o valor real."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Click to copy" :code="$clickCode" :html="$clickHtml">
            <x-slot:description>
                <code>click-to-copy</code> copia ao clicar no campo inteiro.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.clipboard
                    label="Clique para copiar"
                    icon=""
                    value="https://example.com/share/42"
                    click-to-copy
                    hint="Clique em qualquer lugar do campo."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Textarea" :code="$textareaCode" :html="$textareaHtml">
            <div class="w-full max-w-md">
                <x-forms.clipboard
                    mode="textarea"
                    label="Notas"
                    icon=""
                    :rows="4"
                    value="Linha 1
Linha 2
Linha 3"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Code block" :code="$codeCode" :html="$codeHtml">
            <x-slot:description>
                <code>mode="code"</code> com header de linguagem e mono.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.clipboard
                    mode="code"
                    label="Instalação"
                    language="bash"
                    button="both"
                    value="composer require laravel/boost
php artisan boost:install"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Só botão" :code="$buttonModeCode" :html="$buttonModeHtml">
            <x-slot:description>
                <code>mode="button"</code> para cupons / ações rápidas.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.clipboard
                    mode="button"
                    label="Código promocional"
                    value="BEMVINDO20"
                    button="both"
                    button-label="Copiar cupom"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Slot como valor" :code="$slotCode" :html="$slotHtml">
            <x-slot:description>
                O conteúdo do slot vira o valor quando <code>value</code> não é passado.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.clipboard
                    mode="code"
                    language="php"
                    button="both"
                    :value="'\$user->notify(new InviteCreated(\$invite));'"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.clipboard size="sm" label="Pequeno" icon="" value="sm-token" />
                <x-forms.clipboard size="md" label="Médio" value="md-token" />
                <x-forms.clipboard size="lg" label="Grande" icon="" value="lg-token" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.clipboard variant="default" label="Default" icon="" value="default" />
                <x-forms.clipboard variant="filled" label="Filled" value="filled" />
                <x-forms.clipboard variant="flush" label="Flush" icon="" value="flush" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.clipboard label="Sucesso" state="success" icon="" value="ok-123" />
                <x-forms.clipboard label="Erro" error="Não foi possível gerar o link." value="" />
            </div>
        </x-ui.example>

        <x-ui.example title="Prefix / addon" :code="$addonsCode" :html="$addonsHtml">
            <div class="w-full max-w-md">
                <x-forms.clipboard label="Endpoint" icon="" value="users" prefix="/api/v1/">
                    <x-slot:addon-end>.json</x-slot:addon-end>
                </x-forms.clipboard>
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api component="forms/clipboard/clipboard" title="x-forms.clipboard" />
</x-ui.docs>
