<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.cookie-alert preview storage-key="docs-preview-basic" />
        BLADE;

    $basicHtml = <<<'HTML'
        <div class="relative z-0 w-full" role="dialog" aria-modal="false" aria-live="polite">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/15 text-primary" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Nós usamos cookies</p>
                            <div class="text-sm leading-relaxed opacity-80">
                                Utilizamos cookies para melhorar sua experiência, analisar o tráfego e personalizar
                                conteúdo. Você pode aceitar todos, recusar os opcionais ou personalizar suas preferências.
                            </div>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-ghost-primary">Personalizar</button>
                        <button type="button" class="btn btn-sm btn-outline-primary">Recusar</button>
                        <button type="button" class="btn btn-sm btn-primary">Aceitar todos</button>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $customizeCode = <<<'BLADE'
        <x-ui.cookie-alert
            preview
            storage-key="docs-preview-customize"
            show-customize
            policy-url="https://example.com/privacy"
        >
            Usamos cookies para melhorar sua experiência e medir o uso do produto.
        </x-ui.cookie-alert>
        BLADE;

    $customizeHtml = <<<'HTML'
        <div class="relative z-0 w-full" role="dialog" aria-modal="false" aria-live="polite">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/15 text-primary" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Nós usamos cookies</p>
                            <div class="text-sm leading-relaxed opacity-80">
                                Usamos cookies para melhorar sua experiência e medir o uso do produto.
                                <span class="ms-1"><a href="https://example.com/privacy" target="_blank" rel="noopener noreferrer" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary underline text-sm">Política de Privacidade <i class="bi bi-box-arrow-up-right shrink-0 leading-none" aria-hidden="true"></i></a></span>
                            </div>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-ghost-primary">Personalizar</button>
                        <button type="button" class="btn btn-sm btn-outline-primary">Recusar</button>
                        <button type="button" class="btn btn-sm btn-primary">Aceitar todos</button>
                    </div>
                </div>
                <!-- painel de categorias (x-collapse) fica oculto até "Personalizar" ser clicado -->
            </div>
        </div>
        HTML;

    $layoutsCode = <<<'BLADE'
        <x-ui.cookie-alert preview layout="floating" storage-key="docs-layout-floating" />
        <x-ui.cookie-alert preview layout="bar" storage-key="docs-layout-bar" />
        <x-ui.cookie-alert preview layout="modal" storage-key="docs-layout-modal" />
        BLADE;

    $layoutsHtml = <<<'HTML'
        <!-- floating (preview): mesma estrutura do exemplo "Básico" -->
        <div class="relative z-0 w-full">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground shadow-md mx-auto">
                <!-- ... icone + título + corpo + ações (ver exemplo "Básico") -->
            </div>
        </div>

        <!-- bar (preview): panelWidthClasses vira "w-full max-w-none rounded-none shadow-lg" -->
        <div class="relative z-0 w-full">
            <div class="relative w-full max-w-none rounded-none shadow-lg border border-border border-t-[3px] border-t-primary bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 max-w-5xl flex-col lg:flex-row lg:items-center">
                    <!-- ... icone + título + corpo; ações com "lg:justify-end" -->
                </div>
            </div>
        </div>

        <!-- modal (preview): panelWidthClasses vira "w-full max-w-lg rounded-xl shadow-2xl" -->
        <div class="relative z-0 w-full">
            <div class="relative w-full max-w-lg rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground shadow-md mx-auto">
                <!-- ... icone + título + corpo + ações (ver exemplo "Básico") -->
            </div>
        </div>
        HTML;

    $variantsCode = <<<'BLADE'
        <x-ui.cookie-alert preview variant="soft" color="primary" storage-key="docs-var-soft" />
        <x-ui.cookie-alert preview variant="solid" color="primary" storage-key="docs-var-solid" />
        <x-ui.cookie-alert preview variant="outline" color="primary" storage-key="docs-var-outline" />
        BLADE;

    $variantsHtml = <<<'HTML'
        <!-- soft (padrão) -->
        <div class="relative z-0 w-full">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/15 text-primary" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Soft</p>
                            <div class="text-sm leading-relaxed opacity-80">Utilizamos cookies para melhorar sua experiência...</div>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-ghost-primary">Personalizar</button>
                        <button type="button" class="btn btn-sm btn-outline-primary">Recusar</button>
                        <button type="button" class="btn btn-sm btn-primary">Aceitar todos</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- solid -->
        <div class="relative z-0 w-full">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-primary bg-primary text-primary-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-black/10 text-current" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Solid</p>
                            <div class="text-sm leading-relaxed opacity-80">Utilizamos cookies para melhorar sua experiência...</div>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-soft-secondary">Personalizar</button>
                        <button type="button" class="btn btn-sm btn-soft-secondary">Recusar</button>
                        <button type="button" class="btn btn-sm btn-soft-secondary">Aceitar todos</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- outline -->
        <div class="relative z-0 w-full">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-primary bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/15 text-primary" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Outline</p>
                            <div class="text-sm leading-relaxed opacity-80">Utilizamos cookies para melhorar sua experiência...</div>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-ghost-primary">Personalizar</button>
                        <button type="button" class="btn btn-sm btn-outline-primary">Recusar</button>
                        <button type="button" class="btn btn-sm btn-primary">Aceitar todos</button>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.cookie-alert preview color="primary" storage-key="docs-color-primary" />
        <x-ui.cookie-alert preview color="success" storage-key="docs-color-success" />
        <x-ui.cookie-alert preview color="warning" storage-key="docs-color-warning" />
        <x-ui.cookie-alert preview color="info" storage-key="docs-color-info" />
        BLADE;

    $colorsHtml = <<<'HTML'
        <div class="relative z-0 w-full">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/15 text-primary" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Primary</p>
                            <div class="text-sm leading-relaxed opacity-80">Utilizamos cookies para melhorar sua experiência...</div>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-ghost-primary">Personalizar</button>
                        <button type="button" class="btn btn-sm btn-outline-primary">Recusar</button>
                        <button type="button" class="btn btn-sm btn-primary">Aceitar todos</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative z-0 w-full">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-success bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-success/15 text-success" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Success</p>
                            <div class="text-sm leading-relaxed opacity-80">Utilizamos cookies para melhorar sua experiência...</div>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-ghost-success">Personalizar</button>
                        <button type="button" class="btn btn-sm btn-outline-success">Recusar</button>
                        <button type="button" class="btn btn-sm btn-success">Aceitar todos</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative z-0 w-full">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-warning bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/15 text-warning" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Warning</p>
                            <div class="text-sm leading-relaxed opacity-80">Utilizamos cookies para melhorar sua experiência...</div>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-ghost-warning">Personalizar</button>
                        <button type="button" class="btn btn-sm btn-outline-warning">Recusar</button>
                        <button type="button" class="btn btn-sm btn-warning">Aceitar todos</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative z-0 w-full">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-info bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/15 text-info" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Info</p>
                            <div class="text-sm leading-relaxed opacity-80">Utilizamos cookies para melhorar sua experiência...</div>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-ghost-info">Personalizar</button>
                        <button type="button" class="btn btn-sm btn-outline-info">Recusar</button>
                        <button type="button" class="btn btn-sm btn-info">Aceitar todos</button>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $actionsCode = <<<'BLADE'
        <x-ui.cookie-alert
            preview
            storage-key="docs-actions"
            :show-decline="false"
            :show-customize="false"
            accept-label="Entendi"
        />
        BLADE;

    $actionsHtml = <<<'HTML'
        <div class="relative z-0 w-full">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/15 text-primary" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Nós usamos cookies</p>
                            <div class="text-sm leading-relaxed opacity-80">Utilizamos cookies para melhorar sua experiência...</div>
                        </div>
                    </div>
                    <!-- show-decline e show-customize desativados: só o botão de aceitar aparece -->
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-primary">Entendi</button>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $categoriesCode = <<<'BLADE'
        <x-ui.cookie-alert
            preview
            storage-key="docs-categories"
            :categories="[
                ['key' => 'necessary', 'label' => 'Essenciais', 'description' => 'Sempre ativos.', 'required' => true, 'default' => true],
                ['key' => 'analytics', 'label' => 'Métricas', 'description' => 'Uso anônimo.', 'required' => false, 'default' => true],
                ['key' => 'ads', 'label' => 'Anúncios', 'description' => 'Personalização.', 'required' => false, 'default' => false],
            ]"
        />
        BLADE;

    $categoriesHtml = <<<'HTML'
        <div class="relative z-0 w-full">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground shadow-md mx-auto">
                <div class="mx-auto flex gap-4 p-4 sm:p-5 flex-col">
                    <div class="flex min-w-0 flex-1 items-start gap-3">
                        <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/15 text-primary" aria-hidden="true">
                            <i class="bi bi-shield-lock-fill text-lg leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-1 text-sm font-semibold leading-tight tracking-tight">Nós usamos cookies</p>
                            <div class="text-sm leading-relaxed opacity-80">Utilizamos cookies para melhorar sua experiência...</div>
                        </div>
                    </div>
                    <div class="flex shrink-0 flex-wrap items-center gap-2">
                        <button type="button" class="btn btn-sm btn-ghost-primary">Personalizar</button>
                        <button type="button" class="btn btn-sm btn-outline-primary">Recusar</button>
                        <button type="button" class="btn btn-sm btn-primary">Aceitar todos</button>
                    </div>
                </div>
                <!-- ao clicar "Personalizar" (x-collapse), aparece uma opção por categoria -->
                <div class="border-t border-current/10 px-4 pb-4 sm:px-5 sm:pb-5">
                    <div class="flex flex-col gap-3 pt-4">
                        <label class="flex cursor-default items-start gap-3 rounded-lg border border-current/10 bg-black/5 p-3 dark:bg-white/5 opacity-80">
                            <input type="checkbox" class="mt-0.5 size-4 shrink-0 rounded border-border text-primary focus:ring-primary" checked disabled>
                            <span class="min-w-0 flex-1">
                                <span class="flex flex-wrap items-center gap-2">
                                    <span class="text-sm font-semibold">Essenciais</span>
                                    <span class="rounded bg-current/10 px-1.5 py-0.5 text-[10px] font-semibold uppercase tracking-wide">Obrigatório</span>
                                </span>
                                <span class="mt-0.5 block text-xs leading-relaxed opacity-75">Sempre ativos.</span>
                            </span>
                        </label>
                        <label class="flex cursor-pointer items-start gap-3 rounded-lg border border-current/10 bg-black/5 p-3 dark:bg-white/5">
                            <input type="checkbox" class="mt-0.5 size-4 shrink-0 rounded border-border text-primary focus:ring-primary" checked>
                            <span class="min-w-0 flex-1">
                                <span class="flex flex-wrap items-center gap-2">
                                    <span class="text-sm font-semibold">Métricas</span>
                                </span>
                                <span class="mt-0.5 block text-xs leading-relaxed opacity-75">Uso anônimo.</span>
                            </span>
                        </label>
                        <label class="flex cursor-pointer items-start gap-3 rounded-lg border border-current/10 bg-black/5 p-3 dark:bg-white/5">
                            <input type="checkbox" class="mt-0.5 size-4 shrink-0 rounded border-border text-primary focus:ring-primary">
                            <span class="min-w-0 flex-1">
                                <span class="flex flex-wrap items-center gap-2">
                                    <span class="text-sm font-semibold">Anúncios</span>
                                </span>
                                <span class="mt-0.5 block text-xs leading-relaxed opacity-75">Personalização.</span>
                            </span>
                        </label>
                    </div>
                    <div class="mt-4 flex flex-wrap items-center justify-end gap-2">
                        <button type="button" class="btn btn-sm btn-ghost-primary">Voltar</button>
                        <button type="button" class="btn btn-sm btn-primary">Salvar preferências</button>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $liveCode = <<<'BLADE'
        <x-ui.button @click="window.dispatchEvent(new CustomEvent('cookie-alert-reset', { detail: { key: 'docs-live-floating' } }))">
            Mostrar cookie alert
        </x-ui.button>

        <x-ui.cookie-alert
            manual
            storage-key="docs-live-floating"
            position="bottom-right"
            layout="floating"
            policy-url="https://example.com/privacy"
        />
        BLADE;

    $liveHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Mostrar cookie alert</button>

        <!--
            "manual" + sem "preview": o painel real é teleportado para o final
            do <body> e começa oculto (x-cloak/x-show) até o botão disparar o
            evento "cookie-alert-reset". Estrutura do painel (quando visível):
        -->
        <div class="fixed z-[120] bottom-4 right-4">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground">
                <!-- ... icone + título + corpo + ações (ver exemplo "Básico") -->
            </div>
        </div>
        HTML;

    $barLiveCode = <<<'BLADE'
        <x-ui.button @click="window.dispatchEvent(new CustomEvent('cookie-alert-reset', { detail: { key: 'docs-live-bar' } }))">
            Mostrar barra
        </x-ui.button>

        <x-ui.cookie-alert
            manual
            storage-key="docs-live-bar"
            layout="bar"
            position="bottom"
            color="info"
        />
        BLADE;

    $barLiveHtml = <<<'HTML'
        <button type="button" class="btn btn-info">Mostrar barra</button>

        <!-- painel teleportado, layout="bar": faixa full-width fixa no rodapé -->
        <div class="fixed z-[120] bottom-0 left-0 right-0">
            <div class="relative w-full max-w-none rounded-none shadow-lg border border-border border-t-[3px] border-t-info bg-card text-foreground">
                <!-- ... icone + título + corpo; ações com "lg:justify-end" -->
            </div>
        </div>
        HTML;

    $modalLiveCode = <<<'BLADE'
        <x-ui.button @click="window.dispatchEvent(new CustomEvent('cookie-alert-reset', { detail: { key: 'docs-live-modal' } }))">
            Mostrar modal
        </x-ui.button>

        <x-ui.cookie-alert
            manual
            storage-key="docs-live-modal"
            layout="modal"
            color="primary"
        />
        BLADE;

    $modalLiveHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Mostrar modal</button>

        <!-- painel teleportado, layout="modal": backdrop + card centralizado -->
        <div class="fixed inset-0 z-[120] flex items-center justify-center p-4">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative w-full max-w-lg rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground">
                <!-- ... icone + título + corpo + ações (ver exemplo "Básico") -->
            </div>
        </div>
        HTML;

    $storeCode = <<<'BLADE'
        {{-- Ler consentimento em qualquer lugar (Alpine) --}}
        <script>
            const consent = Alpine.store('cookieConsent').get('cookie-consent')
            const canTrack = Alpine.store('cookieConsent').allowed('analytics')
        </script>

        {{-- Ouvir a decisão do usuário --}}
        <div @cookie-consent.window="console.log($event.detail)">
            ...
        </div>
        BLADE;

    $productionCode = <<<'BLADE'
        {{-- No layout principal (uma vez) --}}
        <x-ui.cookie-alert
            storage-key="cookie-consent"
            policy-url="{{ route('privacy') }}"
            position="bottom"
            layout="floating"
        >
            Utilizamos cookies para melhorar sua experiência.
        </x-ui.cookie-alert>
        BLADE;

    $productionHtml = <<<'HTML'
        <!--
            Sem "preview"/"manual"/"force": o painel só renderiza visível se
            ainda não houver consentimento salvo em localStorage["cookie-consent"].
            Estrutura (quando visível), teleportada para o final do <body>:
        -->
        <div class="fixed z-[120] bottom-4 left-1/2 -translate-x-1/2">
            <div class="relative w-[calc(100%-2rem)] max-w-xl rounded-xl shadow-2xl border border-border border-t-[3px] border-t-primary bg-card text-foreground">
                <!-- ... icone + título + "Utilizamos cookies para melhorar sua experiência." + ações -->
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-ui.cookie-alert&gt;</code> exibe o aviso de consentimento de cookies com
            layouts <code>floating</code>, <code>bar</code> e <code>modal</code>, variantes de cor, personalização
            por categorias, persistência em <code>localStorage</code>/<code>sessionStorage</code> e eventos para
            integrar analytics. Nos exemplos abaixo, <code>preview</code> renderiza o painel inline (sem teleport)
            e não grava consentimento — use os botões “Mostrar” para demos reais no canto da tela.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Uso mínimo. Texto, ícone e botões padrão. <code>preview</code> mantém o banner visível na docs.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.cookie-alert preview storage-key="docs-preview-basic" />
                <x-ui.button
                    size="sm"
                    variant="outline"
                    color="secondary"
                    @click="window.dispatchEvent(new CustomEvent('cookie-alert-reset', { detail: { key: 'docs-preview-basic' } }))"
                >
                    Mostrar novamente
                </x-ui.button>
            </div>
        </x-ui.example>

        <x-ui.example title="Com personalização e política" :code="$customizeCode" :html="$customizeHtml">
            <x-slot:description>
                Clique em <code>Personalizar</code> para abrir as categorias. <code>policy-url</code> adiciona o link legal.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.cookie-alert
                    preview
                    storage-key="docs-preview-customize"
                    show-customize
                    policy-url="https://example.com/privacy"
                >
                    Usamos cookies para melhorar sua experiência e medir o uso do produto.
                </x-ui.cookie-alert>
                <x-ui.button
                    size="sm"
                    variant="outline"
                    color="secondary"
                    @click="window.dispatchEvent(new CustomEvent('cookie-alert-reset', { detail: { key: 'docs-preview-customize' } }))"
                >
                    Mostrar novamente
                </x-ui.button>
            </div>
        </x-ui.example>

        <x-ui.example title="Layouts" :code="$layoutsCode" :html="$layoutsHtml">
            <x-slot:description>
                <code>floating</code> (card), <code>bar</code> (faixa full-width) e <code>modal</code> (centrado).
                Em produção o modal usa backdrop + focus trap.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <div>
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-muted-foreground">Floating</p>
                    <x-ui.cookie-alert preview layout="floating" storage-key="docs-layout-floating" />
                </div>
                <div>
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-muted-foreground">Bar</p>
                    <x-ui.cookie-alert preview layout="bar" storage-key="docs-layout-bar" />
                </div>
                <div>
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-muted-foreground">Modal</p>
                    <x-ui.cookie-alert preview layout="modal" storage-key="docs-layout-modal" />
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>soft</code> (padrão), <code>solid</code> e <code>outline</code> — mesmos tokens do alert/toast.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.cookie-alert preview variant="soft" color="primary" storage-key="docs-var-soft" title="Soft" />
                <x-ui.cookie-alert preview variant="solid" color="primary" storage-key="docs-var-solid" title="Solid" />
                <x-ui.cookie-alert preview variant="outline" color="primary" storage-key="docs-var-outline" title="Outline" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Tokens <code>primary</code>, <code>secondary</code>, <code>success</code>, <code>warning</code>,
                <code>danger</code> e <code>info</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.cookie-alert preview color="primary" storage-key="docs-color-primary" title="Primary" />
                <x-ui.cookie-alert preview color="success" storage-key="docs-color-success" title="Success" />
                <x-ui.cookie-alert preview color="warning" storage-key="docs-color-warning" title="Warning" />
                <x-ui.cookie-alert preview color="info" storage-key="docs-color-info" title="Info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Apenas aceitar" :code="$actionsCode" :html="$actionsHtml">
            <x-slot:description>
                Desative <code>show-decline</code> / <code>show-customize</code> e customize os labels.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.cookie-alert
                    preview
                    storage-key="docs-actions"
                    :show-decline="false"
                    :show-customize="false"
                    accept-label="Entendi"
                />
                <x-ui.button
                    size="sm"
                    variant="outline"
                    color="secondary"
                    @click="window.dispatchEvent(new CustomEvent('cookie-alert-reset', { detail: { key: 'docs-actions' } }))"
                >
                    Mostrar novamente
                </x-ui.button>
            </div>
        </x-ui.example>

        <x-ui.example title="Categorias customizadas" :code="$categoriesCode" :html="$categoriesHtml">
            <x-slot:description>
                Passe um array em <code>:categories</code> com <code>key</code>, <code>label</code>,
                <code>description</code>, <code>required</code> e <code>default</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.cookie-alert
                    preview
                    storage-key="docs-categories"
                    :categories="[
                        ['key' => 'necessary', 'label' => 'Essenciais', 'description' => 'Sempre ativos.', 'required' => true, 'default' => true],
                        ['key' => 'analytics', 'label' => 'Métricas', 'description' => 'Uso anônimo.', 'required' => false, 'default' => true],
                        ['key' => 'ads', 'label' => 'Anúncios', 'description' => 'Personalização.', 'required' => false, 'default' => false],
                    ]"
                />
                <x-ui.button
                    size="sm"
                    variant="outline"
                    color="secondary"
                    @click="window.dispatchEvent(new CustomEvent('cookie-alert-reset', { detail: { key: 'docs-categories' } }))"
                >
                    Mostrar novamente
                </x-ui.button>
            </div>
        </x-ui.example>

        <x-ui.example title="Demo live — floating" :code="$liveCode" :html="$liveHtml">
            <x-slot:description>
                Sem <code>preview</code>: teleport para o <code>body</code>, canto <code>bottom-right</code>.
                <code>manual</code> começa fechado; o botão dispara <code>cookie-alert-reset</code>.
            </x-slot:description>
            <x-ui.button
                color="primary"
                @click="window.dispatchEvent(new CustomEvent('cookie-alert-reset', { detail: { key: 'docs-live-floating' } }))"
            >
                Mostrar cookie alert
            </x-ui.button>

            <x-ui.cookie-alert
                manual
                storage-key="docs-live-floating"
                position="bottom-right"
                layout="floating"
                policy-url="https://example.com/privacy"
            />
        </x-ui.example>

        <x-ui.example title="Demo live — bar" :code="$barLiveCode" :html="$barLiveHtml">
            <x-slot:description>
                Faixa fixa no rodapé (<code>layout="bar"</code>).
            </x-slot:description>
            <x-ui.button
                color="info"
                @click="window.dispatchEvent(new CustomEvent('cookie-alert-reset', { detail: { key: 'docs-live-bar' } }))"
            >
                Mostrar barra
            </x-ui.button>

            <x-ui.cookie-alert
                manual
                storage-key="docs-live-bar"
                layout="bar"
                position="bottom"
                color="info"
            />
        </x-ui.example>

        <x-ui.example title="Demo live — modal" :code="$modalLiveCode" :html="$modalLiveHtml">
            <x-slot:description>
                Modal central com backdrop e focus trap. Backdrop estático (exige uma escolha).
            </x-slot:description>
            <x-ui.button
                color="primary"
                @click="window.dispatchEvent(new CustomEvent('cookie-alert-reset', { detail: { key: 'docs-live-modal' } }))"
            >
                Mostrar modal
            </x-ui.button>

            <x-ui.cookie-alert
                manual
                storage-key="docs-live-modal"
                layout="modal"
                color="primary"
            />
        </x-ui.example>

        <x-ui.example title="Integração (store + eventos)" :code="$storeCode">
            <x-slot:description>
                <code>Alpine.store('cookieConsent')</code> lê o JSON persistido.
                O componente também dispara o evento <code>cookie-consent</code> (Alpine e <code>window</code>).
            </x-slot:description>
            <pre class="m-0 overflow-x-auto rounded-md bg-muted p-4 text-xs text-foreground"><code>Alpine.store('cookieConsent').get('cookie-consent')
Alpine.store('cookieConsent').allowed('analytics')
Alpine.store('cookieConsent').clear('cookie-consent')

// payload: { status, categories, timestamp }
window.addEventListener('cookie-consent', (e) => console.log(e.detail))</code></pre>
        </x-ui.example>

        <x-ui.example title="Uso em produção" :code="$productionCode" :html="$productionHtml">
            <x-slot:description>
                Monte uma vez no layout. Sem <code>preview</code>/<code>force</code>, só aparece se ainda não houver consentimento salvo.
            </x-slot:description>
            <pre class="m-0 overflow-x-auto rounded-md bg-muted p-4 text-xs text-foreground"><code>&lt;x-ui.cookie-alert
    storage-key="cookie-consent"
    policy-url="/privacy"
    position="bottom"
    layout="floating"
&gt;
    Utilizamos cookies para melhorar sua experiência.
&lt;/x-ui.cookie-alert&gt;</code></pre>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="cookie-alert" />
</x-ui.docs>
