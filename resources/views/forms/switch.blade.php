<?php

use Livewire\Component;

return new class extends Component
{
    public bool $notifications = true;

    public bool $marketing = false;

    public bool $twoFactor = true;

    public function save(): void
    {
        $this->validate([
            'twoFactor' => ['accepted'],
        ]);
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.switch label="Notificações push" name="push" />
BLADE;

    $basicHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-push" role="switch" name="push" value="1" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Notificações push</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $slotCode = <<<'BLADE'
<x-forms.switch name="updates" required>
    Receber <span class="text-primary underline">atualizações do produto</span>
</x-forms.switch>
BLADE;

    $slotHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-updates" role="switch" name="updates" value="1" required class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>
                    Receber <span class="text-primary underline">atualizações do produto</span>
                    <span class="text-danger" aria-hidden="true">*</span>
                </span>
            </span>
        </span>
    </label>
</div>
HTML;

    $descriptionCode = <<<'BLADE'
<x-forms.switch
    label="Modo escuro"
    description="Aplica o tema escuro em todo o app."
    name="dark"
    checked
/>
BLADE;

    $descriptionHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-dark" role="switch" name="dark" value="1" checked aria-describedby="switch-dark-description" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Modo escuro</span>
            </span>
            <span id="switch-dark-description" class="mt-0.5 block text-xs text-muted-foreground">Aplica o tema escuro em todo o app.</span>
        </span>
    </label>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.switch size="sm" label="Pequeno" name="s_sm" checked />
<x-forms.switch size="md" label="Médio" name="s_md" checked />
<x-forms.switch size="lg" label="Grande" name="s_lg" checked />
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-s_sm" role="switch" name="s_sm" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-4 w-7 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-3 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-3 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-xs text-foreground">
                <span>Pequeno</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-s_md" role="switch" name="s_md" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Médio</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-s_lg" role="switch" name="s_lg" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-6 w-11 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-5 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-5 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-base text-foreground">
                <span>Grande</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.switch color="primary" label="Primary" checked />
<x-forms.switch color="success" label="Success" checked />
<x-forms.switch color="warning" label="Warning" checked />
<x-forms.switch color="danger" label="Danger" checked />
<x-forms.switch color="info" label="Info" checked />
BLADE;

    $colorsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-primary" role="switch" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Primary</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-success" role="switch" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-success peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-success/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Success</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-warning" role="switch" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-warning peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-warning/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Warning</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-danger" role="switch" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-danger peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-danger/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Danger</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-info" role="switch" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-info peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-info/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Info</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $softCode = <<<'BLADE'
<x-forms.switch variant="soft" color="primary" label="Soft primary" checked />
<x-forms.switch variant="soft" color="success" label="Soft success" checked />
<x-forms.switch variant="soft" color="danger" label="Soft danger" />
BLADE;

    $softHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-soft-primary" role="switch" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted/80 peer-checked:bg-primary/25 peer-checked:[&>span.thumb]:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm dark:bg-card top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Soft primary</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-soft-success" role="switch" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted/80 peer-checked:bg-success/25 peer-checked:[&>span.thumb]:bg-success peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-success/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm dark:bg-card top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Soft success</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-soft-danger" role="switch" value="1" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted/80 peer-checked:bg-danger/25 peer-checked:[&>span.thumb]:bg-danger peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-danger/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm dark:bg-card top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Soft danger</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $outlinedCode = <<<'BLADE'
<x-forms.switch variant="outlined" label="Outlined" checked />
<x-forms.switch variant="outlined" color="info" label="Outlined info" />
BLADE;

    $outlinedHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-outlined" role="switch" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full border border-border bg-transparent peer-checked:border-primary peer-checked:bg-primary peer-checked:[&>span.thumb]:border-transparent peer-checked:[&>span.thumb]:bg-white peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform border border-border bg-card shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Outlined</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-outlined-info" role="switch" value="1" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full border border-border bg-transparent peer-checked:border-info peer-checked:bg-info peer-checked:[&>span.thumb]:border-transparent peer-checked:[&>span.thumb]:bg-white peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-info/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform border border-border bg-card shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Outlined info</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $iconsCode = <<<'BLADE'
<x-forms.switch with-icons label="Com ícones" name="icons" checked />
<x-forms.switch
    with-icons
    on-icon="bi-sun"
    off-icon="bi-moon"
    label="Tema"
    name="theme_icons"
/>
BLADE;

    $iconsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-icons" role="switch" name="icons" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="pointer-events-none absolute inset-0 flex items-center justify-between px-1">
                    <i class="switch-on bi bi-check text-white/90 opacity-0 transition-opacity text-[0.65rem]"></i>
                    <i class="switch-off bi bi-x ms-auto text-muted-foreground transition-opacity text-[0.65rem]"></i>
                </span>
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Com ícones</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-theme_icons" role="switch" name="theme_icons" value="1" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="pointer-events-none absolute inset-0 flex items-center justify-between px-1">
                    <i class="switch-on bi bi-sun text-white/90 opacity-0 transition-opacity text-[0.65rem]"></i>
                    <i class="switch-off bi bi-moon ms-auto text-muted-foreground transition-opacity text-[0.65rem]"></i>
                </span>
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Tema</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $statusCode = <<<'BLADE'
<x-forms.switch
    show-status
    on-label="Ativo"
    off-label="Inativo"
    label="Status da conta"
    name="account"
    checked
/>
BLADE;

    $statusHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-account" role="switch" name="account" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
            <span class="text-xs font-medium text-muted-foreground tabular-nums">
                <span class="peer-checked:hidden">Inativo</span>
                <span class="hidden peer-checked:inline">Ativo</span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Status da conta</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $labelsInsideCode = <<<'BLADE'
<x-forms.switch
    labels-inside
    on-label="On"
    off-label="Off"
    label="Labels no track"
    name="inside"
    checked
/>
BLADE;

    $labelsInsideHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-inside" role="switch" name="inside" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-12 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-7 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="pointer-events-none absolute inset-0 flex items-center justify-between px-1.5 font-bold uppercase tracking-wide text-[0.6rem]">
                    <span class="switch-on text-white/90 opacity-0 transition-opacity">On</span>
                    <span class="switch-off ms-auto text-muted-foreground transition-opacity">Off</span>
                </span>
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Labels no track</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $squareCode = <<<'BLADE'
<x-forms.switch square label="Quadrado" name="sq" checked />
<x-forms.switch square with-icons label="Quadrado com ícones" name="sq_icons" />
BLADE;

    $squareHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-sq" role="switch" name="sq" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-md bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Quadrado</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-sq_icons" role="switch" name="sq_icons" value="1" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-md bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="pointer-events-none absolute inset-0 flex items-center justify-between px-1">
                    <i class="switch-on bi bi-check text-white/90 opacity-0 transition-opacity text-[0.65rem]"></i>
                    <i class="switch-off bi bi-x ms-auto text-muted-foreground transition-opacity text-[0.65rem]"></i>
                </span>
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Quadrado com ícones</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $cardCode = <<<'BLADE'
<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
    <x-forms.switch
        variant="card"
        label="Backup automático"
        description="Snapshot diário com retenção de 30 dias."
        icon="bi-cloud-arrow-up"
        name="backup"
        checked
    />
    <x-forms.switch
        variant="card"
        label="CDN global"
        description="Entrega de assets com baixa latência."
        icon="bi-globe"
        name="cdn"
    />
</div>
BLADE;

    $cardHtml = <<<'HTML'
<div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
    <label class="relative flex w-full gap-3 border border-border bg-card p-4 shadow-sm transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/40 has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30 rounded-2xl flex-row-reverse cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-backup" role="switch" name="backup" value="1" checked aria-describedby="switch-backup-description" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 text-sm font-medium text-foreground">
                <i class="bi bi-cloud-arrow-up leading-none text-muted-foreground" aria-hidden="true"></i>
                <span>Backup automático</span>
            </span>
            <span id="switch-backup-description" class="mt-1 block text-xs text-muted-foreground">Snapshot diário com retenção de 30 dias.</span>
        </span>
    </label>
    <label class="relative flex w-full gap-3 border border-border bg-card p-4 shadow-sm transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/40 has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30 rounded-2xl flex-row-reverse cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-cdn" role="switch" name="cdn" value="1" aria-describedby="switch-cdn-description" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 text-sm font-medium text-foreground">
                <i class="bi bi-globe leading-none text-muted-foreground" aria-hidden="true"></i>
                <span>CDN global</span>
            </span>
            <span id="switch-cdn-description" class="mt-1 block text-xs text-muted-foreground">Entrega de assets com baixa latência.</span>
        </span>
    </label>
</div>
HTML;

    $reverseCode = <<<'BLADE'
<x-forms.switch label="Switch à direita (padrão)" name="rev" checked />
<x-forms.switch :reverse="false" label="Switch à esquerda" name="normal" />
BLADE;

    $reverseHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-rev" role="switch" name="rev" value="1" checked class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Switch à direita (padrão)</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-normal" role="switch" name="normal" value="1" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Switch à esquerda</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.switch label="Sucesso" state="success" checked hint="Configuração válida." />
<x-forms.switch label="Atenção" state="warning" hint="Revise esta opção." />
<x-forms.switch label="Erro" name="secure" error="Ative a autenticação em dois fatores." />
BLADE;

    $statesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-success-state" role="switch" value="1" checked aria-describedby="switch-success-state-hint" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-success peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-success/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-success">
                <span>Sucesso</span>
            </span>
        </span>
    </label>
    <div class="min-w-0">
        <p id="switch-success-state-hint" class="mb-0 text-xs text-muted-foreground">Configuração válida.</p>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-warning-state" role="switch" value="1" aria-describedby="switch-warning-state-hint" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-warning peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-warning/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-warning">
                <span>Atenção</span>
            </span>
        </span>
    </label>
    <div class="min-w-0">
        <p id="switch-warning-state-hint" class="mb-0 text-xs text-muted-foreground">Revise esta opção.</p>
    </div>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-secure" role="switch" name="secure" value="1" aria-describedby="switch-secure-error" aria-invalid="true" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-danger peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-danger/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-danger">
                <span>Erro</span>
            </span>
        </span>
    </label>
    <div class="min-w-0">
        <p id="switch-secure-error" class="mb-0 text-xs text-danger" role="alert">Ative a autenticação em dois fatores.</p>
    </div>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.switch label="Desabilitado" disabled />
<x-forms.switch label="Desabilitado ligado" disabled checked />
<x-forms.switch label="Somente leitura" readonly checked />
<x-forms.switch label="Carregando" loading checked />
BLADE;

    $disabledHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-not-allowed">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-disabled-off" role="switch" value="1" disabled class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-not-allowed">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground opacity-60">
                <span>Desabilitado</span>
            </span>
        </span>
    </label>
</div>
<div class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-not-allowed">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-disabled-on" role="switch" value="1" checked disabled class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-not-allowed">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground opacity-60">
                <span>Desabilitado ligado</span>
            </span>
        </span>
    </label>
</div>
<div x-data="formSwitch({ readonly: true, loading: false })" class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-not-allowed">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-readonly" role="switch" value="1" checked @click="onClick($event)" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-not-allowed">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Somente leitura</span>
            </span>
        </span>
    </label>
</div>
<div x-data="formSwitch({ readonly: false, loading: true })" class="flex w-full flex-col gap-1.5">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-not-allowed">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-loading" role="switch" value="1" checked disabled @click="onClick($event)" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-not-allowed">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full">
                    <span class="size-3 animate-spin rounded-full border-2 border-current border-t-transparent text-secondary"></span>
                </span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground opacity-60">
                <span>Carregando</span>
            </span>
        </span>
    </label>
</div>
HTML;

    $uncheckedValueCode = <<<'BLADE'
<x-forms.switch
    label="Ativo"
    name="active"
    value="1"
    unchecked-value="0"
    hint="Envia 0 quando desligado."
/>
BLADE;

    $uncheckedValueHtml = <<<'HTML'
<div class="flex w-full flex-col gap-1.5">
    <input type="hidden" name="active" value="0">
    <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
        <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
            <input x-ref="input" type="checkbox" id="switch-active" role="switch" name="active" value="1" aria-describedby="switch-active-hint" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
            <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
            </span>
        </span>
        <span class="min-w-0 flex-1">
            <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                <span>Ativo</span>
            </span>
        </span>
    </label>
    <div class="min-w-0">
        <p id="switch-active-hint" class="mb-0 text-xs text-muted-foreground">Envia 0 quando desligado.</p>
    </div>
</div>
HTML;

    $groupCode = <<<'BLADE'
<x-forms.switch.switch-group
    label="Preferências"
    description="Controle o que o app pode fazer."
    hint="Você pode alterar isso a qualquer momento."
>
    <x-forms.switch label="Notificações por e-mail" description="Resumo semanal." name="email" checked />
    <x-forms.switch label="Notificações push" name="push_pref" />
    <x-forms.switch label="E-mails de marketing" name="mkt" />
</x-forms.switch.switch-group>
BLADE;

    $groupHtml = <<<'HTML'
<fieldset aria-describedby="switch-group-preferencias-description switch-group-preferencias-hint" class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <legend id="switch-group-preferencias-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">Preferências</legend>
    <p id="switch-group-preferencias-description" class="mb-0 text-xs text-muted-foreground">Controle o que o app pode fazer.</p>
    <div role="group" class="flex flex-col gap-3" aria-labelledby="switch-group-preferencias-label">
        <div class="flex w-full flex-col gap-1.5">
            <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
                <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
                    <input x-ref="input" type="checkbox" id="switch-email" role="switch" name="email" value="1" checked aria-describedby="switch-email-description" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
                    <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                        <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
                    </span>
                </span>
                <span class="min-w-0 flex-1">
                    <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                        <span>Notificações por e-mail</span>
                    </span>
                    <span id="switch-email-description" class="mt-0.5 block text-xs text-muted-foreground">Resumo semanal.</span>
                </span>
            </label>
        </div>
        <div class="flex w-full flex-col gap-1.5">
            <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
                <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
                    <input x-ref="input" type="checkbox" id="switch-push_pref" role="switch" name="push_pref" value="1" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
                    <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                        <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
                    </span>
                </span>
                <span class="min-w-0 flex-1">
                    <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                        <span>Notificações push</span>
                    </span>
                </span>
            </label>
        </div>
        <div class="flex w-full flex-col gap-1.5">
            <label class="flex items-start gap-3 flex-row-reverse justify-between cursor-pointer">
                <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
                    <input x-ref="input" type="checkbox" id="switch-mkt" role="switch" name="mkt" value="1" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
                    <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                        <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
                    </span>
                </span>
                <span class="min-w-0 flex-1">
                    <span class="flex items-center gap-2 font-medium text-sm text-foreground">
                        <span>E-mails de marketing</span>
                    </span>
                </span>
            </label>
        </div>
    </div>
    <div class="min-w-0">
        <p id="switch-group-preferencias-hint" class="mb-0 text-xs text-muted-foreground">Você pode alterar isso a qualquer momento.</p>
    </div>
</fieldset>
HTML;

    $groupCardsCode = <<<'BLADE'
<x-forms.switch.switch-group label="Recursos" variant="card" direction="horizontal">
    <x-forms.switch label="API pública" description="Chaves e rate limit." icon="bi-key" name="api" checked />
    <x-forms.switch label="Webhooks" description="Eventos em tempo real." icon="bi-broadcast" name="hooks" />
</x-forms.switch.switch-group>
BLADE;

    $groupCardsHtml = <<<'HTML'
<fieldset class="flex w-full min-w-0 flex-col gap-2 border-0 p-0">
    <legend id="switch-group-recursos-label" class="float-none w-auto text-sm p-0 font-medium text-foreground">Recursos</legend>
    <div role="group" class="grid grid-cols-1 gap-3 sm:grid-cols-2" aria-labelledby="switch-group-recursos-label">
        <label class="relative flex w-full gap-3 border border-border bg-card p-4 shadow-sm transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/40 has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30 rounded-2xl flex-row-reverse cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
                <input x-ref="input" type="checkbox" id="switch-api" role="switch" name="api" value="1" checked aria-describedby="switch-api-description" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
                <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                    <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
                </span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="flex items-center gap-2 text-sm font-medium text-foreground">
                    <i class="bi bi-key leading-none text-muted-foreground" aria-hidden="true"></i>
                    <span>API pública</span>
                </span>
                <span id="switch-api-description" class="mt-1 block text-xs text-muted-foreground">Chaves e rate limit.</span>
            </span>
        </label>
        <label class="relative flex w-full gap-3 border border-border bg-card p-4 shadow-sm transition-colors has-[:disabled]:cursor-not-allowed has-[:disabled]:opacity-50 hover:bg-muted/40 has-[:checked]:border-primary has-[:checked]:ring-2 has-[:checked]:ring-primary/30 rounded-2xl flex-row-reverse cursor-pointer">
            <span class="relative mt-0.5 inline-flex shrink-0 items-center gap-2">
                <input x-ref="input" type="checkbox" id="switch-hooks" role="switch" name="hooks" value="1" aria-describedby="switch-hooks-description" class="peer absolute inset-0 z-10 m-0 size-full opacity-0 cursor-pointer">
                <span class="relative block transition-colors peer-focus-visible:ring-2 peer-focus-visible:ring-offset-1 peer-disabled:opacity-50 peer-checked:[&_.switch-on]:opacity-100 peer-checked:[&_.switch-off]:opacity-0 h-5 w-9 rounded-full bg-muted peer-checked:bg-primary peer-checked:[&>span.thumb]:translate-x-4 peer-focus-visible:ring-primary/40" aria-hidden="true">
                    <span class="thumb absolute flex items-center justify-center transition-transform bg-white shadow-sm top-0.5 left-0.5 size-4 rounded-full"></span>
                </span>
            </span>
            <span class="min-w-0 flex-1">
                <span class="flex items-center gap-2 text-sm font-medium text-foreground">
                    <i class="bi bi-broadcast leading-none text-muted-foreground" aria-hidden="true"></i>
                    <span>Webhooks</span>
                </span>
                <span id="switch-hooks-description" class="mt-1 block text-xs text-muted-foreground">Eventos em tempo real.</span>
            </span>
        </label>
    </div>
</fieldset>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.switch&gt;</code> é um toggle on/off dedicado
            (<code>role="switch"</code>) com label, descrição, hint, erro (via <code>$errors</code>),
            tamanhos, cores, variantes (<code>default</code>, <code>soft</code>, <code>outlined</code>,
            <code>card</code>), ícones, labels on/off (status ou dentro do track),
            <code>square</code>, <code>reverse</code> (padrão: switch à direita),
            <code>readonly</code>, <code>loading</code> e <code>unchecked-value</code>.
            Use <code>&lt;x-forms.switch.switch-group&gt;</code> para painéis de preferências.
            Atributos como <code>wire:model</code> caem no <code>&lt;input&gt;</code>;
            <code>class</code> no wrapper.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Label + <code>name</code> para formulários HTML clássicos.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.switch label="Notificações push" name="push" />
            </div>
        </x-ui.example>

        <x-ui.example title="Slot como label" :code="$slotCode" :html="$slotHtml">
            <x-slot:description>
                O slot padrão aceita HTML rico (links, ênfase).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.switch name="updates" required>
                    Receber <span class="text-primary underline">atualizações do produto</span>
                </x-forms.switch>
            </div>
        </x-ui.example>

        <x-ui.example title="Descrição e hint" :code="$descriptionCode" :html="$descriptionHtml">
            <x-slot:description>
                <code>description</code> fica sob o label; <code>hint</code> sob o controle.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.switch
                    label="Modo escuro"
                    description="Aplica o tema escuro em todo o app."
                    name="dark"
                    checked
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Reverse (settings)" :code="$reverseCode" :html="$reverseHtml">
            <x-slot:description>
                <code>reverse</code> é o padrão (switch à direita). Use
                <code>:reverse="false"</code> para o controle à esquerda.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-4">
                <x-forms.switch label="Switch à direita (padrão)" name="rev" checked />
                <x-forms.switch :reverse="false" label="Switch à esquerda" name="normal" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code> (padrão) e <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.switch size="sm" label="Pequeno" name="s_sm" checked />
                <x-forms.switch size="md" label="Médio" name="s_md" checked />
                <x-forms.switch size="lg" label="Grande" name="s_lg" checked />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Tokens do tema: <code>primary</code>, <code>success</code>, <code>warning</code>,
                <code>danger</code>, <code>info</code>, <code>secondary</code>.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.switch color="primary" label="Primary" checked />
                <x-forms.switch color="success" label="Success" checked />
                <x-forms.switch color="warning" label="Warning" checked />
                <x-forms.switch color="danger" label="Danger" checked />
                <x-forms.switch color="info" label="Info" checked />
            </div>
        </x-ui.example>

        <x-ui.example title="Soft" :code="$softCode" :html="$softHtml">
            <x-slot:description>
                <code>variant="soft"</code> — track suave e thumb colorido quando ligado.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.switch variant="soft" color="primary" label="Soft primary" checked />
                <x-forms.switch variant="soft" color="success" label="Soft success" checked />
                <x-forms.switch variant="soft" color="danger" label="Soft danger" />
            </div>
        </x-ui.example>

        <x-ui.example title="Outlined" :code="$outlinedCode" :html="$outlinedHtml">
            <x-slot:description>
                <code>variant="outlined"</code> — borda no track, preenchimento ao ligar.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.switch variant="outlined" label="Outlined" checked />
                <x-forms.switch variant="outlined" color="info" label="Outlined info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Com ícones" :code="$iconsCode" :html="$iconsHtml">
            <x-slot:description>
                <code>with-icons</code>; customize com <code>on-icon</code> / <code>off-icon</code>
                (Bootstrap Icons).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.switch with-icons label="Com ícones" name="icons" checked />
                <x-forms.switch
                    with-icons
                    on-icon="bi-sun"
                    off-icon="bi-moon"
                    label="Tema"
                    name="theme_icons"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Status on/off" :code="$statusCode" :html="$statusHtml">
            <x-slot:description>
                <code>show-status</code> + <code>on-label</code> / <code>off-label</code> ao lado do track.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.switch
                    show-status
                    on-label="Ativo"
                    off-label="Inativo"
                    label="Status da conta"
                    name="account"
                    checked
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Labels no track" :code="$labelsInsideCode" :html="$labelsInsideHtml">
            <x-slot:description>
                <code>labels-inside</code> alarga o track e mostra o texto dentro.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.switch
                    labels-inside
                    on-label="On"
                    off-label="Off"
                    label="Labels no track"
                    name="inside"
                    checked
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Square" :code="$squareCode" :html="$squareHtml">
            <x-slot:description>
                <code>square</code> troca o pill por cantos retos.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.switch square label="Quadrado" name="sq" checked />
                <x-forms.switch square with-icons label="Quadrado com ícones" name="sq_icons" />
            </div>
        </x-ui.example>

        <x-ui.example title="Card" :code="$cardCode" :html="$cardHtml">
            <x-slot:description>
                <code>variant="card"</code> — switch à direita por padrão (settings).
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-3 sm:grid-cols-2">
                <x-forms.switch
                    variant="card"
                    label="Backup automático"
                    description="Snapshot diário com retenção de 30 dias."
                    icon="bi-cloud-arrow-up"
                    name="backup"
                    checked
                />
                <x-forms.switch
                    variant="card"
                    label="CDN global"
                    description="Entrega de assets com baixa latência."
                    icon="bi-globe"
                    name="cdn"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados e erro" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> e <code>error</code> (força danger + <code>role="alert"</code>).
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.switch label="Sucesso" state="success" checked hint="Configuração válida." />
                <x-forms.switch label="Atenção" state="warning" hint="Revise esta opção." />
                <x-forms.switch label="Erro" name="secure" error="Ative a autenticação em dois fatores." />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>readonly</code> e <code>loading</code> bloqueiam o toggle via Alpine.
            </x-slot:description>
            <div class="flex w-full max-w-md flex-col gap-3">
                <x-forms.switch label="Desabilitado" disabled />
                <x-forms.switch label="Desabilitado ligado" disabled checked />
                <x-forms.switch label="Somente leitura" readonly checked />
                <x-forms.switch label="Carregando" loading checked />
            </div>
        </x-ui.example>

        <x-ui.example title="Unchecked value" :code="$uncheckedValueCode" :html="$uncheckedValueHtml">
            <x-slot:description>
                <code>unchecked-value</code> injeta um <code>hidden</code> antes do switch.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.switch
                    label="Ativo"
                    name="active"
                    value="1"
                    unchecked-value="0"
                    hint="Envia 0 quando desligado."
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Grupo de preferências" :code="$groupCode" :html="$groupHtml">
            <x-slot:description>
                <code>&lt;x-forms.switch.switch-group&gt;</code> com legend; filhos herdam <code>size</code>/<code>color</code>/<code>variant</code> via <code>@@aware</code>.
            </x-slot:description>
            <div class="w-full max-w-lg">
                <x-forms.switch.switch-group
                    label="Preferências"
                    description="Controle o que o app pode fazer."
                    hint="Você pode alterar isso a qualquer momento."
                >
                    <x-forms.switch label="Notificações por e-mail" description="Resumo semanal." name="email" checked />
                    <x-forms.switch label="Notificações push" name="push_pref" />
                    <x-forms.switch label="E-mails de marketing" name="mkt" />
                </x-forms.switch.switch-group>
            </div>
        </x-ui.example>

        <x-ui.example title="Grupo de cards" :code="$groupCardsCode" :html="$groupCardsHtml">
            <x-slot:description>
                O grupo pode forçar <code>variant="card"</code> e layout em colunas.
            </x-slot:description>
            <x-forms.switch.switch-group label="Recursos" variant="card" direction="horizontal">
                <x-forms.switch label="API pública" description="Chaves e rate limit." icon="bi-key" name="api" checked />
                <x-forms.switch label="Webhooks" description="Eventos em tempo real." icon="bi-broadcast" name="hooks" />
            </x-forms.switch.switch-group>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api reference="forms-switch" />
</x-ui.docs>
