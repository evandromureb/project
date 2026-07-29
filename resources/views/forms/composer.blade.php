<?php

use Livewire\Component;

return new class extends Component
{
    public string $message = '';

    public bool $sending = false;

    /** @var array<int, string> */
    public array $log = [];

    public function send(): void
    {
        $text = trim($this->message);

        if ($text === '') {
            return;
        }

        $this->sending = true;
        $this->log[] = $text;
        $this->message = '';
        $this->sending = false;
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.composer />
BLADE;

    $basicHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="How can I help you today?" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="How can I help you today?"></textarea>

        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo">
                    <i class="bi bi-paperclip leading-none" aria-hidden="true"></i>
                </button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos">
                    <span class="text-base font-semibold leading-none" aria-hidden="true">/</span>
                </button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false">
                    <i class="bi bi-sliders leading-none" aria-hidden="true"></i>
                </button>
            </div>

            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false">
                    <i class="bi bi-mic leading-none" aria-hidden="true"></i>
                </button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar">
                    <i class="bi bi-send-fill leading-none" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>

    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.composer variant="inverted" />
<x-forms.composer variant="default" placeholder="Mensagem…" />
<x-forms.composer variant="soft" placeholder="Mensagem…" />
<x-forms.composer variant="outline" placeholder="Mensagem…" />
BLADE;

    $variantsHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-transparent bg-foreground text-background shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="How can I help you today?" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-background/50 text-background caret-background disabled:cursor-not-allowed" aria-label="How can I help you today?"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-background/60 hover:bg-background/10 hover:text-background" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-background/60 hover:bg-background/10 hover:text-background" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-background/60 hover:bg-background/10 hover:text-background" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-background/15 bg-background/10 text-background hover:bg-background/15" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-background/20 text-background/50" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Mensagem…" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Mensagem…"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-transparent bg-muted text-foreground shadow-none focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Mensagem…" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Mensagem…"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-transparent bg-background text-foreground hover:bg-card" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border-2 border-border bg-card text-foreground shadow-none focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Mensagem…" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Mensagem…"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.composer size="sm" placeholder="Compacto…" />
<x-forms.composer size="md" placeholder="Padrão…" />
<x-forms.composer size="lg" placeholder="Grande…" />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-2xl p-3 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Compacto…" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-sm placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Compacto…"></textarea>
        <div class="mt-3 flex items-center justify-between gap-0.5">
            <div class="relative flex min-w-0 items-center gap-0.5">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-8 text-sm rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-8 text-sm rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-8 text-sm rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-0.5">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-8 text-sm border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-8 text-sm bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Padrão…" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Padrão…"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-[1.75rem] p-5 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Grande…" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-lg placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Grande…"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1.5">
            <div class="relative flex min-w-0 items-center gap-1.5">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-11 text-lg rounded-xl text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-11 text-lg rounded-xl text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-11 text-lg rounded-xl text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1.5">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-11 text-lg border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-11 text-lg bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.composer variant="default" color="primary" value="Olá!" />
<x-forms.composer variant="default" color="success" value="Pronto para enviar" />
<x-forms.composer variant="default" color="danger" value="Ação crítica" />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="How can I help you today?" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="How can I help you today?">Olá!</textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base bg-primary text-primary-foreground hover:opacity-90" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-success/35">
        <textarea rows="1" placeholder="How can I help you today?" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="How can I help you today?">Pronto para enviar</textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base bg-success text-success-foreground hover:opacity-90" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-danger/35">
        <textarea rows="1" placeholder="How can I help you today?" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="How can I help you today?">Ação crítica</textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base bg-danger text-danger-foreground hover:opacity-90" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $loadingCode = <<<'BLADE'
<x-forms.composer loading value="Gerando resposta…" />
BLADE;

    $loadingHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="How can I help you today?" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="How can I help you today?">Gerando resposta…</textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base bg-foreground text-background" aria-label="Parar"><span class="size-2.5 rounded-sm bg-current" aria-hidden="true"></span></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.composer disabled placeholder="Composer desabilitado" />
<x-forms.composer readonly value="Somente leitura" />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35 pointer-events-none opacity-60">
        <textarea rows="1" placeholder="Composer desabilitado" disabled class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Composer desabilitado"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="How can I help you today?" readonly class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="How can I help you today?">Somente leitura</textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $attachmentsCode = <<<'BLADE'
<x-forms.composer
    placeholder="Anexe imagens ou arquivos…"
    accept="image/*,.pdf"
    :max-files="3"
/>
BLADE;

    $attachmentsHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Anexe imagens ou arquivos…" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Anexe imagens ou arquivos…"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="image/*,.pdf" multiple tabindex="-1">
</div>
HTML;

    $counterCode = <<<'BLADE'
<x-forms.composer
    show-counter
    :max-length="280"
    placeholder="Até 280 caracteres…"
/>
BLADE;

    $counterHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Até 280 caracteres…" maxlength="280" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Até 280 caracteres…"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
                <span class="ms-1 hidden text-xs tabular-nums opacity-60 sm:inline">0/280</span>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $compactCode = <<<'BLADE'
<x-forms.composer compact placeholder="Menu + no mobile/toolbar" />
BLADE;

    $compactHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Menu + no mobile/toolbar" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Menu + no mobile/toolbar"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Mais ações" aria-expanded="false"><i class="bi bi-plus-lg leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $minimalCode = <<<'BLADE'
<x-forms.composer
    :show-attach="false"
    :show-command="false"
    :show-tools="false"
    :show-voice="false"
    placeholder="Só texto e enviar"
/>
BLADE;

    $minimalHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Só texto e enviar" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Só texto e enviar"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1"></div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $toolsCode = <<<'BLADE'
<x-forms.composer tools-open placeholder="Ferramentas abertas…">
    <x-slot:tools>
        <div class="flex flex-wrap gap-2">
            <span class="rounded-full bg-muted px-2.5 py-1 text-xs text-foreground">GPT-4.1</span>
            <span class="rounded-full bg-muted/70 px-2.5 py-1 text-xs text-muted-foreground">Criativo</span>
            <span class="rounded-full bg-muted/70 px-2.5 py-1 text-xs text-muted-foreground">Web</span>
        </div>
    </x-slot:tools>
</x-forms.composer>
BLADE;

    $toolsHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Ferramentas abertas…" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Ferramentas abertas…"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg bg-muted text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="true"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="mt-3 rounded-2xl border p-3 text-sm border-border bg-muted/60 text-muted-foreground">
            <div class="flex flex-wrap gap-2">
                <span class="rounded-full bg-muted px-2.5 py-1 text-xs text-foreground">GPT-4.1</span>
                <span class="rounded-full bg-muted/70 px-2.5 py-1 text-xs text-muted-foreground">Criativo</span>
                <span class="rounded-full bg-muted/70 px-2.5 py-1 text-xs text-muted-foreground">Web</span>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $eventsCode = <<<'BLADE'
<div x-data="{ last: '' }" x-on:composer-submit="last = $event.detail.value">
    <x-forms.composer
        clear-on-submit
        placeholder="Enter envia · Shift+Enter quebra linha"
    />
    <p class="mt-2 text-sm text-muted-foreground" x-text="last ? 'Enviado: ' + last : 'Nada enviado ainda.'"></p>
</div>
BLADE;

    $eventsHtml = <<<'HTML'
<div class="w-full">
    <div class="w-full">
        <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
            <textarea rows="1" placeholder="Enter envia · Shift+Enter quebra linha" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Enter envia · Shift+Enter quebra linha"></textarea>
            <div class="mt-3 flex items-center justify-between gap-1">
                <div class="relative flex min-w-0 items-center gap-1">
                    <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                    <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                    <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
                </div>
                <div class="flex shrink-0 items-center gap-1">
                    <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                    <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
    </div>
    <p class="mt-2 mb-0 text-sm text-muted-foreground">Nada enviado ainda.</p>
</div>
HTML;


    $footerCode = <<<'BLADE'
<x-forms.composer placeholder="Com dica de atalho…">
    <x-slot:footer>
        <span class="text-muted-foreground">
            <kbd class="rounded border border-border px-1">Enter</kbd> envia ·
            <kbd class="rounded border border-border px-1">Shift</kbd>+<kbd class="rounded border border-border px-1">Enter</kbd> nova linha
        </span>
    </x-slot:footer>
</x-forms.composer>
BLADE;

    $footerHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-border bg-card text-foreground shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="Com dica de atalho…" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-muted-foreground text-foreground caret-foreground disabled:cursor-not-allowed" aria-label="Com dica de atalho…"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-muted-foreground hover:bg-muted hover:text-foreground" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-border bg-muted text-foreground hover:bg-muted/80" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-muted text-muted-foreground" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="mt-2 text-xs opacity-60">
            <span class="text-muted-foreground">
                <kbd class="rounded border border-border px-1">Enter</kbd> envia ·
                <kbd class="rounded border border-border px-1">Shift</kbd>+<kbd class="rounded border border-border px-1">Enter</kbd> nova linha
            </span>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;

    $invertedCode = <<<'BLADE'
<x-forms.composer variant="inverted" />
BLADE;

    $invertedHtml = <<<'HTML'
<div class="w-full">
    <div class="relative flex w-full flex-col transition-shadow rounded-3xl p-4 border border-transparent bg-foreground text-background shadow-sm focus-within:ring-2 focus-within:ring-offset-1 focus-within:ring-primary/35">
        <textarea rows="1" placeholder="How can I help you today?" class="w-full resize-none border-0 bg-transparent p-0 shadow-none outline-none ring-0 focus:outline-none focus:ring-0 text-base placeholder:text-background/50 text-background caret-background disabled:cursor-not-allowed" aria-label="How can I help you today?"></textarea>
        <div class="mt-3 flex items-center justify-between gap-1">
            <div class="relative flex min-w-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-background/60 hover:bg-background/10 hover:text-background" aria-label="Anexar arquivo"><i class="bi bi-paperclip leading-none" aria-hidden="true"></i></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-background/60 hover:bg-background/10 hover:text-background" aria-label="Comandos"><span class="text-base font-semibold leading-none" aria-hidden="true">/</span></button>
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base rounded-lg text-background/60 hover:bg-background/10 hover:text-background" aria-label="Ferramentas" aria-pressed="false"><i class="bi bi-sliders leading-none" aria-hidden="true"></i></button>
            </div>
            <div class="flex shrink-0 items-center gap-1">
                <button type="button" class="inline-flex items-center justify-center transition-colors size-9 text-base border border-background/15 bg-background/10 text-background hover:bg-background/15" aria-label="Entrada de voz" aria-pressed="false"><i class="bi bi-mic leading-none" aria-hidden="true"></i></button>
                <button type="button" disabled class="inline-flex items-center justify-center transition-colors disabled:cursor-not-allowed size-9 text-base bg-background/20 text-background/50" aria-label="Enviar"><i class="bi bi-send-fill leading-none" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <input type="file" class="hidden" accept="*/*" multiple tabindex="-1">
</div>
HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.composer&gt;</code> é o campo de mensagem estilo chat/AI:
            textarea com auto-grow, toolbar (anexo, <code>/</code>, ferramentas), voz, enviar/parar,
            chips de anexos e variantes com tokens do tema
            (<code>default</code>, <code>soft</code>, <code>outline</code>, <code>inverted</code>),
            modo <code>compact</code>, contador e binding Livewire via <code>x-modelable</code>.
            Enter envia; Shift+Enter quebra linha.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Padrão <code>variant="default"</code> com tokens <code>bg-card</code> / <code>border-border</code>.
            </x-slot:description>
            <div class="mx-auto w-full max-w-3xl">
                <x-forms.composer />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>inverted</code> usa <code>bg-foreground</code>/<code>text-background</code>;
                as demais usam <code>card</code>/<code>muted</code>/<code>border</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-forms.composer variant="inverted" />
                <x-forms.composer variant="default" placeholder="Mensagem…" />
                <x-forms.composer variant="soft" placeholder="Mensagem…" />
                <x-forms.composer variant="outline" placeholder="Mensagem…" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>sm</code>, <code>md</code> e <code>lg</code> ajustam padding, tipografia e botões.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-forms.composer size="sm" placeholder="Compacto…" />
                <x-forms.composer size="md" placeholder="Padrão…" />
                <x-forms.composer size="lg" placeholder="Grande…" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores do send" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Em variantes claras, <code>color</code> pinta o botão de envio com tokens
                (<code>primary</code>, <code>success</code>, etc.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-forms.composer color="primary" value="Olá!" />
                <x-forms.composer color="success" value="Pronto para enviar" />
                <x-forms.composer color="danger" value="Ação crítica" />
            </div>
        </x-ui.example>

        <x-ui.example title="Loading / stop" :code="$loadingCode" :html="$loadingHtml">
            <x-slot:description>
                Com <code>loading</code>, o send vira botão de parar (<code>composer-stop</code>).
            </x-slot:description>
            <x-forms.composer loading value="Gerando resposta…" />
        </x-ui.example>

        <x-ui.example title="Disabled / readonly" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Estados sem edição.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-forms.composer disabled placeholder="Composer desabilitado" />
                <x-forms.composer readonly value="Somente leitura" />
            </div>
        </x-ui.example>

        <x-ui.example title="Anexos" :code="$attachmentsCode" :html="$attachmentsHtml">
            <x-slot:description>
                Clique no paperclip ou arraste arquivos. Chips com preview de imagem e remover.
            </x-slot:description>
            <x-forms.composer
                placeholder="Anexe imagens ou arquivos…"
                accept="image/*,.pdf"
                :max-files="3"
            />
        </x-ui.example>

        <x-ui.example title="Contador e max-length" :code="$counterCode" :html="$counterHtml">
            <x-slot:description>
                <code>show-counter</code> + <code>max-length</code>.
            </x-slot:description>
            <x-forms.composer
                show-counter
                :max-length="280"
                placeholder="Até 280 caracteres…"
            />
        </x-ui.example>

        <x-ui.example title="Compact" :code="$compactCode" :html="$compactHtml">
            <x-slot:description>
                <code>compact</code> agrupa anexo/comando/ferramentas atrás do botão <code>+</code>.
            </x-slot:description>
            <x-forms.composer compact placeholder="Menu + no mobile/toolbar" />
        </x-ui.example>

        <x-ui.example title="Minimal" :code="$minimalCode" :html="$minimalHtml">
            <x-slot:description>
                Desligue ações com <code>:show-attach="false"</code> etc.
            </x-slot:description>
            <x-forms.composer
                :show-attach="false"
                :show-command="false"
                :show-tools="false"
                :show-voice="false"
                placeholder="Só texto e enviar"
            />
        </x-ui.example>

        <x-ui.example title="Painel de ferramentas" :code="$toolsCode" :html="$toolsHtml">
            <x-slot:description>
                Slot <code>tools</code> (ou painel padrão). Abra com o ícone de sliders ou <code>tools-open</code>.
            </x-slot:description>
            <div class="mx-auto w-full max-w-3xl">
                <x-forms.composer tools-open placeholder="Ferramentas abertas…">
                    <x-slot:tools>
                        <div class="flex flex-wrap gap-2">
                            <span class="rounded-full bg-muted px-2.5 py-1 text-xs text-foreground">GPT-4.1</span>
                            <span class="rounded-full bg-muted/70 px-2.5 py-1 text-xs text-muted-foreground">Criativo</span>
                            <span class="rounded-full bg-muted/70 px-2.5 py-1 text-xs text-muted-foreground">Web</span>
                        </div>
                    </x-slot:tools>
                </x-forms.composer>
            </div>
        </x-ui.example>

        <x-ui.example title="Footer / atalhos" :code="$footerCode" :html="$footerHtml">
            <x-slot:description>
                Slot <code>footer</code> para dicas abaixo do composer.
            </x-slot:description>
            <x-forms.composer placeholder="Com dica de atalho…">
                <x-slot:footer>
                    <span class="text-muted-foreground">
                        <kbd class="rounded border border-border px-1">Enter</kbd> envia ·
                        <kbd class="rounded border border-border px-1">Shift</kbd>+<kbd class="rounded border border-border px-1">Enter</kbd> nova linha
                    </span>
                </x-slot:footer>
            </x-forms.composer>
        </x-ui.example>

        <x-ui.example title="Eventos Alpine" :code="$eventsCode" :html="$eventsHtml">
            <x-slot:description>
                Escute <code>composer-submit</code>, <code>composer-attach</code>,
                <code>composer-voice</code>, <code>composer-tools</code>, <code>composer-stop</code>.
            </x-slot:description>
            <div class="w-full" x-data="{ last: '' }" x-on:composer-submit="last = $event.detail.value">
                <x-forms.composer
                    clear-on-submit
                    placeholder="Enter envia · Shift+Enter quebra linha"
                />
                <p class="mt-2 mb-0 text-sm text-muted-foreground" x-text="last ? 'Enviado: ' + last : 'Nada enviado ainda.'"></p>
            </div>
        </x-ui.example>


        <x-ui.example title="Inverted (estilo chat)" :code="$invertedCode" :html="$invertedHtml">
            <x-slot:description>
                <code>variant="inverted"</code> inverte <code>foreground</code>/<code>background</code>
                do tema — sem hex fixo.
            </x-slot:description>
            <div class="mx-auto w-full max-w-3xl">
                <x-forms.composer variant="inverted" />
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="forms-composer" />
</x-ui.docs>
