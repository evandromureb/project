<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.tabs default="profile">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="profile" icon="bi-person">Perfil</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="settings" icon="bi-gear">Configurações</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="billing" icon="bi-credit-card">Faturamento</x-ui.tabs.tab-item>
            </x-slot:nav>

            <x-ui.tabs.tab-panel name="profile">
                <p class="mb-0 text-sm text-muted-foreground">Atualize nome, foto e preferências da conta.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="settings">
                <p class="mb-0 text-sm text-muted-foreground">Notificações, idioma e segurança.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="billing">
                <p class="mb-0 text-sm text-muted-foreground">Planos, faturas e método de pagamento.</p>
            </x-ui.tabs.tab-panel>
        </x-ui.tabs>
        BLADE;

    $basicHtml = <<<'HTML'
        <div>
            <div role="tablist" class="flex flex-wrap gap-4 border-b border-border">
                <button type="button" id="tab-profile" aria-controls="tab-panel-profile" data-tab-name="profile" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary -mb-px border-b-2 border-transparent px-1 pb-2.5 border-primary text-primary">
                    <i class="bi bi-person shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Perfil</span>
                </button>
                <button type="button" id="tab-settings" aria-controls="tab-panel-settings" data-tab-name="settings" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary -mb-px border-b-2 border-transparent px-1 pb-2.5 text-muted-foreground hover:text-foreground">
                    <i class="bi bi-gear shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Configurações</span>
                </button>
                <button type="button" id="tab-billing" aria-controls="tab-panel-billing" data-tab-name="billing" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary -mb-px border-b-2 border-transparent px-1 pb-2.5 text-muted-foreground hover:text-foreground">
                    <i class="bi bi-credit-card shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Faturamento</span>
                </button>
            </div>

            <div class="mt-4">
                <div id="tab-panel-profile" aria-labelledby="tab-profile" role="tabpanel" tabindex="0">
                    <p class="mb-0 text-sm text-muted-foreground">Atualize nome, foto e preferências da conta.</p>
                </div>
                <div id="tab-panel-settings" aria-labelledby="tab-settings" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Notificações, idioma e segurança.</p>
                </div>
                <div id="tab-panel-billing" aria-labelledby="tab-billing" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Planos, faturas e método de pagamento.</p>
                </div>
            </div>
        </div>
        HTML;

    $pillsCode = <<<'BLADE'
        <x-ui.tabs default="profile" variant="pills" color="primary">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="profile">Perfil</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="settings">Configurações</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="billing">Faturamento</x-ui.tabs.tab-item>
            </x-slot:nav>

            <x-ui.tabs.tab-panel name="profile">
                <p class="mb-0 text-sm text-muted-foreground">Aba ativa com fundo sólido.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="settings">
                <p class="mb-0 text-sm text-muted-foreground">Conteúdo de configurações.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="billing">
                <p class="mb-0 text-sm text-muted-foreground">Conteúdo de faturamento.</p>
            </x-ui.tabs.tab-panel>
        </x-ui.tabs>
        BLADE;

    $pillsHtml = <<<'HTML'
        <div>
            <div role="tablist" class="inline-flex flex-wrap gap-1">
                <button type="button" id="tab-profile" aria-controls="tab-panel-profile" data-tab-name="profile" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 bg-primary text-primary-foreground shadow-sm">
                    <span>Perfil</span>
                </button>
                <button type="button" id="tab-settings" aria-controls="tab-panel-settings" data-tab-name="settings" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <span>Configurações</span>
                </button>
                <button type="button" id="tab-billing" aria-controls="tab-panel-billing" data-tab-name="billing" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <span>Faturamento</span>
                </button>
            </div>

            <div class="mt-4">
                <div id="tab-panel-profile" aria-labelledby="tab-profile" role="tabpanel" tabindex="0">
                    <p class="mb-0 text-sm text-muted-foreground">Aba ativa com fundo sólido.</p>
                </div>
                <div id="tab-panel-settings" aria-labelledby="tab-settings" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Conteúdo de configurações.</p>
                </div>
                <div id="tab-panel-billing" aria-labelledby="tab-billing" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Conteúdo de faturamento.</p>
                </div>
            </div>
        </div>
        HTML;

    $softCode = <<<'BLADE'
        <x-ui.tabs default="overview" variant="soft" color="info">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="overview" icon="bi-speedometer2">Visão geral</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="activity" icon="bi-activity">Atividade</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="files" icon="bi-folder2">Arquivos</x-ui.tabs.tab-item>
            </x-slot:nav>

            <x-ui.tabs.tab-panel name="overview">
                <p class="mb-0 text-sm text-muted-foreground">Variante soft — destaque suave sem competir com o conteúdo.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="activity">
                <p class="mb-0 text-sm text-muted-foreground">Linha do tempo de eventos recentes.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="files">
                <p class="mb-0 text-sm text-muted-foreground">Documentos e anexos do projeto.</p>
            </x-ui.tabs.tab-panel>
        </x-ui.tabs>
        BLADE;

    $softHtml = <<<'HTML'
        <div>
            <div role="tablist" class="inline-flex flex-wrap gap-1">
                <button type="button" id="tab-overview" aria-controls="tab-panel-overview" data-tab-name="overview" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 bg-info/15 text-info">
                    <i class="bi bi-speedometer2 shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Visão geral</span>
                </button>
                <button type="button" id="tab-activity" aria-controls="tab-panel-activity" data-tab-name="activity" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <i class="bi bi-activity shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Atividade</span>
                </button>
                <button type="button" id="tab-files" aria-controls="tab-panel-files" data-tab-name="files" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <i class="bi bi-folder2 shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Arquivos</span>
                </button>
            </div>

            <div class="mt-4">
                <div id="tab-panel-overview" aria-labelledby="tab-overview" role="tabpanel" tabindex="0">
                    <p class="mb-0 text-sm text-muted-foreground">Variante soft — destaque suave sem competir com o conteúdo.</p>
                </div>
                <div id="tab-panel-activity" aria-labelledby="tab-activity" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Linha do tempo de eventos recentes.</p>
                </div>
                <div id="tab-panel-files" aria-labelledby="tab-files" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Documentos e anexos do projeto.</p>
                </div>
            </div>
        </div>
        HTML;

    $boxedCode = <<<'BLADE'
        <x-ui.tabs default="profile" variant="boxed" color="success">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="profile">Perfil</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="settings">Configurações</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="billing">Faturamento</x-ui.tabs.tab-item>
            </x-slot:nav>

            <x-ui.tabs.tab-panel name="profile">
                <p class="mb-0 text-sm text-muted-foreground">Aba ativa flutua sobre o fundo muted.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="settings">
                <p class="mb-0 text-sm text-muted-foreground">Conteúdo de configurações.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="billing">
                <p class="mb-0 text-sm text-muted-foreground">Conteúdo de faturamento.</p>
            </x-ui.tabs.tab-panel>
        </x-ui.tabs>
        BLADE;

    $boxedHtml = <<<'HTML'
        <div>
            <div role="tablist" class="inline-flex flex-wrap gap-1 rounded-md bg-muted p-1">
                <button type="button" id="tab-profile" aria-controls="tab-panel-profile" data-tab-name="profile" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 bg-card text-success shadow-sm">
                    <span>Perfil</span>
                </button>
                <button type="button" id="tab-settings" aria-controls="tab-panel-settings" data-tab-name="settings" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <span>Configurações</span>
                </button>
                <button type="button" id="tab-billing" aria-controls="tab-panel-billing" data-tab-name="billing" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <span>Faturamento</span>
                </button>
            </div>

            <div class="mt-4">
                <div id="tab-panel-profile" aria-labelledby="tab-profile" role="tabpanel" tabindex="0">
                    <p class="mb-0 text-sm text-muted-foreground">Aba ativa flutua sobre o fundo muted.</p>
                </div>
                <div id="tab-panel-settings" aria-labelledby="tab-settings" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Conteúdo de configurações.</p>
                </div>
                <div id="tab-panel-billing" aria-labelledby="tab-billing" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Conteúdo de faturamento.</p>
                </div>
            </div>
        </div>
        HTML;

    $badgeCode = <<<'BLADE'
        <x-ui.tabs default="inbox" variant="soft">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="inbox" icon="bi-envelope" badge="12">Caixa de entrada</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="sent" icon="bi-send">Enviados</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="alerts" icon="bi-bell" badge="3">Alertas</x-ui.tabs.tab-item>
            </x-slot:nav>

            <x-ui.tabs.tab-panel name="inbox">
                <div class="space-y-2">
                    <p class="mb-0 text-sm font-medium text-foreground">12 mensagens não lidas</p>
                    <p class="mb-0 text-sm text-muted-foreground">Priorize respostas de clientes e convites de equipe.</p>
                </div>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="sent">
                <p class="mb-0 text-sm text-muted-foreground">Histórico de mensagens enviadas.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="alerts">
                <p class="mb-0 text-sm text-muted-foreground">3 alertas precisam da sua atenção.</p>
            </x-ui.tabs.tab-panel>
        </x-ui.tabs>
        BLADE;

    $badgeHtml = <<<'HTML'
        <div>
            <div role="tablist" class="inline-flex flex-wrap gap-1">
                <button type="button" id="tab-inbox" aria-controls="tab-panel-inbox" data-tab-name="inbox" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 bg-primary/15 text-primary">
                    <i class="bi bi-envelope shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Caixa de entrada</span>
                    <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1 px-2 py-0.5 text-[11px] rounded-full">12</span>
                </button>
                <button type="button" id="tab-sent" aria-controls="tab-panel-sent" data-tab-name="sent" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <i class="bi bi-send shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Enviados</span>
                </button>
                <button type="button" id="tab-alerts" aria-controls="tab-panel-alerts" data-tab-name="alerts" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <i class="bi bi-bell shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Alertas</span>
                    <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1 px-2 py-0.5 text-[11px] rounded-full">3</span>
                </button>
            </div>

            <div class="mt-4">
                <div id="tab-panel-inbox" aria-labelledby="tab-inbox" role="tabpanel" tabindex="0">
                    <div class="space-y-2">
                        <p class="mb-0 text-sm font-medium text-foreground">12 mensagens não lidas</p>
                        <p class="mb-0 text-sm text-muted-foreground">Priorize respostas de clientes e convites de equipe.</p>
                    </div>
                </div>
                <div id="tab-panel-sent" aria-labelledby="tab-sent" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Histórico de mensagens enviadas.</p>
                </div>
                <div id="tab-panel-alerts" aria-labelledby="tab-alerts" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">3 alertas precisam da sua atenção.</p>
                </div>
            </div>
        </div>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.tabs default="a" variant="pills" color="primary">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="a">Primary</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="b">Tab B</x-ui.tabs.tab-item>
            </x-slot:nav>
            <x-ui.tabs.tab-panel name="a">Primary</x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="b">B</x-ui.tabs.tab-panel>
        </x-ui.tabs>

        <x-ui.tabs default="a" variant="pills" color="success">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="a">Success</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="b">Tab B</x-ui.tabs.tab-item>
            </x-slot:nav>
            <x-ui.tabs.tab-panel name="a">Success</x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="b">B</x-ui.tabs.tab-panel>
        </x-ui.tabs>

        <x-ui.tabs default="a" variant="soft" color="warning">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="a">Warning soft</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="b">Tab B</x-ui.tabs.tab-item>
            </x-slot:nav>
            <x-ui.tabs.tab-panel name="a">Warning soft</x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="b">B</x-ui.tabs.tab-panel>
        </x-ui.tabs>
        BLADE;

    $colorsHtml = <<<'HTML'
        <div>
            <div role="tablist" class="inline-flex flex-wrap gap-1">
                <button type="button" id="tab-a" aria-controls="tab-panel-a" data-tab-name="a" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 bg-primary text-primary-foreground shadow-sm">
                    <span>Primary</span>
                </button>
                <button type="button" id="tab-b" aria-controls="tab-panel-b" data-tab-name="b" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <span>Tab B</span>
                </button>
            </div>
            <div class="mt-4">
                <div id="tab-panel-a" aria-labelledby="tab-a" role="tabpanel" tabindex="0">Primary</div>
                <div id="tab-panel-b" aria-labelledby="tab-b" role="tabpanel" tabindex="0" hidden>B</div>
            </div>
        </div>

        <div>
            <div role="tablist" class="inline-flex flex-wrap gap-1">
                <button type="button" id="tab-a" aria-controls="tab-panel-a" data-tab-name="a" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 bg-success text-success-foreground shadow-sm">
                    <span>Success</span>
                </button>
                <button type="button" id="tab-b" aria-controls="tab-panel-b" data-tab-name="b" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <span>Tab B</span>
                </button>
            </div>
            <div class="mt-4">
                <div id="tab-panel-a" aria-labelledby="tab-a" role="tabpanel" tabindex="0">Success</div>
                <div id="tab-panel-b" aria-labelledby="tab-b" role="tabpanel" tabindex="0" hidden>B</div>
            </div>
        </div>

        <div>
            <div role="tablist" class="inline-flex flex-wrap gap-1">
                <button type="button" id="tab-a" aria-controls="tab-panel-a" data-tab-name="a" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 bg-warning/15 text-warning">
                    <span>Warning soft</span>
                </button>
                <button type="button" id="tab-b" aria-controls="tab-panel-b" data-tab-name="b" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <span>Tab B</span>
                </button>
            </div>
            <div class="mt-4">
                <div id="tab-panel-a" aria-labelledby="tab-a" role="tabpanel" tabindex="0">Warning soft</div>
                <div id="tab-panel-b" aria-labelledby="tab-b" role="tabpanel" tabindex="0" hidden>B</div>
            </div>
        </div>
        HTML;

    $verticalCode = <<<'BLADE'
        <x-ui.tabs default="profile" vertical variant="soft" color="primary">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="profile" icon="bi-person">Perfil</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="settings" icon="bi-gear">Configurações</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="billing" icon="bi-credit-card">Faturamento</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="team" icon="bi-people">Equipe</x-ui.tabs.tab-item>
            </x-slot:nav>

            <x-ui.tabs.tab-panel name="profile">
                <div class="flex items-start gap-4">
                    <x-ui.avatar initials="AL" color="primary" circle size="lg" />
                    <div>
                        <h5 class="card-title">Ana Lima</h5>
                        <p class="mb-2 text-sm text-muted-foreground">Product Designer · São Paulo</p>
                        <x-ui.badge color="success" size="sm" variant="soft" dot>Online</x-ui.badge>
                    </div>
                </div>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="settings">
                <p class="mb-0 text-sm text-muted-foreground">Preferências de idioma, tema e notificações.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="billing">
                <p class="mb-0 text-sm text-muted-foreground">Plano Pro · renovação em 12 dias.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="team">
                <p class="mb-0 text-sm text-muted-foreground">8 membros ativos neste workspace.</p>
            </x-ui.tabs.tab-panel>
        </x-ui.tabs>
        BLADE;

    $verticalHtml = <<<'HTML'
        <div class="flex gap-6">
            <div role="tablist" aria-orientation="vertical" class="flex flex-col gap-1">
                <button type="button" id="tab-profile" aria-controls="tab-panel-profile" data-tab-name="profile" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 bg-primary/15 text-primary">
                    <i class="bi bi-person shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Perfil</span>
                </button>
                <button type="button" id="tab-settings" aria-controls="tab-panel-settings" data-tab-name="settings" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <i class="bi bi-gear shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Configurações</span>
                </button>
                <button type="button" id="tab-billing" aria-controls="tab-panel-billing" data-tab-name="billing" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <i class="bi bi-credit-card shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Faturamento</span>
                </button>
                <button type="button" id="tab-team" aria-controls="tab-panel-team" data-tab-name="team" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <i class="bi bi-people shrink-0 leading-none" aria-hidden="true"></i>
                    <span>Equipe</span>
                </button>
            </div>

            <div class="min-w-0 flex-1">
                <div id="tab-panel-profile" aria-labelledby="tab-profile" role="tabpanel" tabindex="0">
                    <div class="flex items-start gap-4">
                        <span class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-12 text-base bg-primary/15 text-primary rounded-full" title="AL">
                            <span>AL</span>
                        </span>
                        <div>
                            <h5 class="card-title">Ana Lima</h5>
                            <p class="mb-2 text-sm text-muted-foreground">Product Designer · São Paulo</p>
                            <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1 px-2 py-0.5 text-[11px] rounded-md">
                                <span class="size-1.5 shrink-0 rounded-full bg-success" aria-hidden="true"></span>
                                <span>Online</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="tab-panel-settings" aria-labelledby="tab-settings" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Preferências de idioma, tema e notificações.</p>
                </div>
                <div id="tab-panel-billing" aria-labelledby="tab-billing" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Plano Pro · renovação em 12 dias.</p>
                </div>
                <div id="tab-panel-team" aria-labelledby="tab-team" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">8 membros ativos neste workspace.</p>
                </div>
            </div>
        </div>
        HTML;

    $justifiedCode = <<<'BLADE'
        <x-ui.tabs default="day" justified variant="boxed">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="day">Dia</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="week">Semana</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="month">Mês</x-ui.tabs.tab-item>
            </x-slot:nav>

            <x-ui.tabs.tab-panel name="day">
                <p class="mb-0 text-sm text-muted-foreground">Métricas das últimas 24 horas.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="week">
                <p class="mb-0 text-sm text-muted-foreground">Resumo dos últimos 7 dias.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="month">
                <p class="mb-0 text-sm text-muted-foreground">Comparativo do mês corrente.</p>
            </x-ui.tabs.tab-panel>
        </x-ui.tabs>
        BLADE;

    $justifiedHtml = <<<'HTML'
        <div>
            <div role="tablist" class="inline-flex flex-wrap gap-1 rounded-md bg-muted p-1 w-full [&>*]:flex-1 [&>*]:justify-center">
                <button type="button" id="tab-day" aria-controls="tab-panel-day" data-tab-name="day" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 bg-card text-primary shadow-sm">
                    <span>Dia</span>
                </button>
                <button type="button" id="tab-week" aria-controls="tab-panel-week" data-tab-name="week" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <span>Semana</span>
                </button>
                <button type="button" id="tab-month" aria-controls="tab-panel-month" data-tab-name="month" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <span>Mês</span>
                </button>
            </div>

            <div class="mt-4">
                <div id="tab-panel-day" aria-labelledby="tab-day" role="tabpanel" tabindex="0">
                    <p class="mb-0 text-sm text-muted-foreground">Métricas das últimas 24 horas.</p>
                </div>
                <div id="tab-panel-week" aria-labelledby="tab-week" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Resumo dos últimos 7 dias.</p>
                </div>
                <div id="tab-panel-month" aria-labelledby="tab-month" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Comparativo do mês corrente.</p>
                </div>
            </div>
        </div>
        HTML;

    $disabledCode = <<<'BLADE'
        <x-ui.tabs default="profile">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="profile">Perfil</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="settings" disabled>Configurações (bloqueado)</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="billing">Faturamento</x-ui.tabs.tab-item>
            </x-slot:nav>

            <x-ui.tabs.tab-panel name="profile">
                <p class="mb-0 text-sm text-muted-foreground">Abas desabilitadas saem da navegação por teclado.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="settings">
                <p class="mb-0 text-sm text-muted-foreground">Indisponível.</p>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="billing">
                <p class="mb-0 text-sm text-muted-foreground">Conteúdo de faturamento.</p>
            </x-ui.tabs.tab-panel>
        </x-ui.tabs>
        BLADE;

    $disabledHtml = <<<'HTML'
        <div>
            <div role="tablist" class="flex flex-wrap gap-4 border-b border-border">
                <button type="button" id="tab-profile" aria-controls="tab-panel-profile" data-tab-name="profile" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary -mb-px border-b-2 border-transparent px-1 pb-2.5 border-primary text-primary">
                    <span>Perfil</span>
                </button>
                <button type="button" id="tab-settings" aria-controls="tab-panel-settings" data-tab-name="settings" role="tab" aria-selected="false" tabindex="-1" disabled class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary -mb-px border-b-2 border-transparent px-1 pb-2.5 text-muted-foreground hover:text-foreground cursor-not-allowed opacity-50">
                    <span>Configurações (bloqueado)</span>
                </button>
                <button type="button" id="tab-billing" aria-controls="tab-panel-billing" data-tab-name="billing" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary -mb-px border-b-2 border-transparent px-1 pb-2.5 text-muted-foreground hover:text-foreground">
                    <span>Faturamento</span>
                </button>
            </div>

            <div class="mt-4">
                <div id="tab-panel-profile" aria-labelledby="tab-profile" role="tabpanel" tabindex="0">
                    <p class="mb-0 text-sm text-muted-foreground">Abas desabilitadas saem da navegação por teclado.</p>
                </div>
                <div id="tab-panel-settings" aria-labelledby="tab-settings" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Indisponível.</p>
                </div>
                <div id="tab-panel-billing" aria-labelledby="tab-billing" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Conteúdo de faturamento.</p>
                </div>
            </div>
        </div>
        HTML;

    $cardCode = <<<'BLADE'
        <x-ui.card>
            <x-ui.tabs default="overview" variant="underline">
                <x-slot:nav>
                    <x-ui.tabs.tab-item name="overview" icon="bi-graph-up">Visão geral</x-ui.tabs.tab-item>
                    <x-ui.tabs.tab-item name="orders" icon="bi-bag" badge="4">Pedidos</x-ui.tabs.tab-item>
                    <x-ui.tabs.tab-item name="customers" icon="bi-people">Clientes</x-ui.tabs.tab-item>
                </x-slot:nav>

                <x-ui.tabs.tab-panel name="overview">
                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                        <div>
                            <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Receita</p>
                            <p class="mb-0 text-xl font-semibold text-foreground">R$ 48,2k</p>
                        </div>
                        <div>
                            <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Pedidos</p>
                            <p class="mb-0 text-xl font-semibold text-foreground">312</p>
                        </div>
                        <div>
                            <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Conversão</p>
                            <p class="mb-0 text-xl font-semibold text-foreground">3,8%</p>
                        </div>
                    </div>
                </x-ui.tabs.tab-panel>
                <x-ui.tabs.tab-panel name="orders">
                    <p class="mb-0 text-sm text-muted-foreground">4 pedidos aguardando envio.</p>
                </x-ui.tabs.tab-panel>
                <x-ui.tabs.tab-panel name="customers">
                    <p class="mb-0 text-sm text-muted-foreground">Lista de clientes recentes.</p>
                </x-ui.tabs.tab-panel>
            </x-ui.tabs>
        </x-ui.card>
        BLADE;

    $cardHtml = <<<'HTML'
        <div class="card">
            <div class="card-body">
                <div>
                    <div role="tablist" class="flex flex-wrap gap-4 border-b border-border">
                        <button type="button" id="tab-overview" aria-controls="tab-panel-overview" data-tab-name="overview" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary -mb-px border-b-2 border-transparent px-1 pb-2.5 border-primary text-primary">
                            <i class="bi bi-graph-up shrink-0 leading-none" aria-hidden="true"></i>
                            <span>Visão geral</span>
                        </button>
                        <button type="button" id="tab-orders" aria-controls="tab-panel-orders" data-tab-name="orders" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary -mb-px border-b-2 border-transparent px-1 pb-2.5 text-muted-foreground hover:text-foreground">
                            <i class="bi bi-bag shrink-0 leading-none" aria-hidden="true"></i>
                            <span>Pedidos</span>
                            <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1 px-2 py-0.5 text-[11px] rounded-full">4</span>
                        </button>
                        <button type="button" id="tab-customers" aria-controls="tab-panel-customers" data-tab-name="customers" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary -mb-px border-b-2 border-transparent px-1 pb-2.5 text-muted-foreground hover:text-foreground">
                            <i class="bi bi-people shrink-0 leading-none" aria-hidden="true"></i>
                            <span>Clientes</span>
                        </button>
                    </div>

                    <div class="mt-4">
                        <div id="tab-panel-overview" aria-labelledby="tab-overview" role="tabpanel" tabindex="0">
                            <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                                <div>
                                    <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Receita</p>
                                    <p class="mb-0 text-xl font-semibold text-foreground">R$ 48,2k</p>
                                </div>
                                <div>
                                    <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Pedidos</p>
                                    <p class="mb-0 text-xl font-semibold text-foreground">312</p>
                                </div>
                                <div>
                                    <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Conversão</p>
                                    <p class="mb-0 text-xl font-semibold text-foreground">3,8%</p>
                                </div>
                            </div>
                        </div>
                        <div id="tab-panel-orders" aria-labelledby="tab-orders" role="tabpanel" tabindex="0" hidden>
                            <p class="mb-0 text-sm text-muted-foreground">4 pedidos aguardando envio.</p>
                        </div>
                        <div id="tab-panel-customers" aria-labelledby="tab-customers" role="tabpanel" tabindex="0" hidden>
                            <p class="mb-0 text-sm text-muted-foreground">Lista de clientes recentes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $actionsCode = <<<'BLADE'
        <x-ui.tabs default="details" variant="pills" color="primary">
            <x-slot:nav>
                <x-ui.tabs.tab-item name="details">Detalhes</x-ui.tabs.tab-item>
                <x-ui.tabs.tab-item name="permissions">Permissões</x-ui.tabs.tab-item>
            </x-slot:nav>

            <x-ui.tabs.tab-panel name="details">
                <div class="space-y-3">
                    <p class="mb-0 text-sm text-muted-foreground">Revise as informações antes de publicar.</p>
                    <div class="flex flex-wrap gap-2">
                        <x-ui.button color="primary" size="sm" icon="bi-check-lg">Publicar</x-ui.button>
                        <x-ui.button color="secondary" variant="ghost" size="sm">Cancelar</x-ui.button>
                    </div>
                </div>
            </x-ui.tabs.tab-panel>
            <x-ui.tabs.tab-panel name="permissions">
                <p class="mb-0 text-sm text-muted-foreground">Quem pode editar este recurso.</p>
            </x-ui.tabs.tab-panel>
        </x-ui.tabs>
        BLADE;

    $actionsHtml = <<<'HTML'
        <div>
            <div role="tablist" class="inline-flex flex-wrap gap-1">
                <button type="button" id="tab-details" aria-controls="tab-panel-details" data-tab-name="details" role="tab" aria-selected="true" tabindex="0" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 bg-primary text-primary-foreground shadow-sm">
                    <span>Detalhes</span>
                </button>
                <button type="button" id="tab-permissions" aria-controls="tab-panel-permissions" data-tab-name="permissions" role="tab" aria-selected="false" tabindex="-1" class="inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                    <span>Permissões</span>
                </button>
            </div>

            <div class="mt-4">
                <div id="tab-panel-details" aria-labelledby="tab-details" role="tabpanel" tabindex="0">
                    <div class="space-y-3">
                        <p class="mb-0 text-sm text-muted-foreground">Revise as informações antes de publicar.</p>
                        <div class="flex flex-wrap gap-2">
                            <button type="button" class="btn btn-primary btn-sm">
                                <i class="bi bi-check-lg shrink-0 leading-none" aria-hidden="true"></i>
                                <span>Publicar</span>
                            </button>
                            <button type="button" class="btn btn-ghost-secondary btn-sm">
                                <span>Cancelar</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="tab-panel-permissions" aria-labelledby="tab-permissions" role="tabpanel" tabindex="0" hidden>
                    <p class="mb-0 text-sm text-muted-foreground">Quem pode editar este recurso.</p>
                </div>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.tabs&gt;</code> organiza conteúdo em abas. Use
            <code>&lt;x-ui.tabs.tab-item&gt;</code> no slot <code>nav</code> e
            <code>&lt;x-ui.tabs.tab-panel&gt;</code> no slot padrão — ligados pela prop
            <code>name</code>. Variantes: <code>underline</code>, <code>pills</code>,
            <code>soft</code> e <code>boxed</code>. Também há cores, ícones, badge,
            vertical, justified, disabled e navegação por teclado (WAI-ARIA).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Variante padrão (<code>underline</code>): aba ativa com linha inferior colorida.
            </x-slot:description>
            <div class="w-full">
                <x-ui.tabs default="profile">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="profile" icon="bi-person">Perfil</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="settings" icon="bi-gear">Configurações</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="billing" icon="bi-credit-card">Faturamento</x-ui.tabs.tab-item>
                    </x-slot:nav>

                    <x-ui.tabs.tab-panel name="profile">
                        <p class="mb-0 text-sm text-muted-foreground">Atualize nome, foto e preferências da conta.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="settings">
                        <p class="mb-0 text-sm text-muted-foreground">Notificações, idioma e segurança.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="billing">
                        <p class="mb-0 text-sm text-muted-foreground">Planos, faturas e método de pagamento.</p>
                    </x-ui.tabs.tab-panel>
                </x-ui.tabs>
            </div>
        </x-ui.example>

        <x-ui.example title="Pills" :code="$pillsCode" :html="$pillsHtml">
            <x-slot:description>
                <code>variant="pills"</code> — aba ativa com fundo sólido na cor do tema.
            </x-slot:description>
            <div class="w-full">
                <x-ui.tabs default="profile" variant="pills" color="primary">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="profile">Perfil</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="settings">Configurações</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="billing">Faturamento</x-ui.tabs.tab-item>
                    </x-slot:nav>

                    <x-ui.tabs.tab-panel name="profile">
                        <p class="mb-0 text-sm text-muted-foreground">Aba ativa com fundo sólido.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="settings">
                        <p class="mb-0 text-sm text-muted-foreground">Conteúdo de configurações.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="billing">
                        <p class="mb-0 text-sm text-muted-foreground">Conteúdo de faturamento.</p>
                    </x-ui.tabs.tab-panel>
                </x-ui.tabs>
            </div>
        </x-ui.example>

        <x-ui.example title="Soft" :code="$softCode" :html="$softHtml">
            <x-slot:description>
                <code>variant="soft"</code> — fundo suave na aba ativa; bom para dashboards.
            </x-slot:description>
            <div class="w-full">
                <x-ui.tabs default="overview" variant="soft" color="info">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="overview" icon="bi-speedometer2">Visão geral</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="activity" icon="bi-activity">Atividade</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="files" icon="bi-folder2">Arquivos</x-ui.tabs.tab-item>
                    </x-slot:nav>

                    <x-ui.tabs.tab-panel name="overview">
                        <p class="mb-0 text-sm text-muted-foreground">Variante soft — destaque suave sem competir com o conteúdo.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="activity">
                        <p class="mb-0 text-sm text-muted-foreground">Linha do tempo de eventos recentes.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="files">
                        <p class="mb-0 text-sm text-muted-foreground">Documentos e anexos do projeto.</p>
                    </x-ui.tabs.tab-panel>
                </x-ui.tabs>
            </div>
        </x-ui.example>

        <x-ui.example title="Boxed" :code="$boxedCode" :html="$boxedHtml">
            <x-slot:description>
                <code>variant="boxed"</code> — abas num contêiner muted; a ativa flutua com sombra.
            </x-slot:description>
            <div class="w-full">
                <x-ui.tabs default="profile" variant="boxed" color="success">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="profile">Perfil</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="settings">Configurações</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="billing">Faturamento</x-ui.tabs.tab-item>
                    </x-slot:nav>

                    <x-ui.tabs.tab-panel name="profile">
                        <p class="mb-0 text-sm text-muted-foreground">Aba ativa flutua sobre o fundo muted.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="settings">
                        <p class="mb-0 text-sm text-muted-foreground">Conteúdo de configurações.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="billing">
                        <p class="mb-0 text-sm text-muted-foreground">Conteúdo de faturamento.</p>
                    </x-ui.tabs.tab-panel>
                </x-ui.tabs>
            </div>
        </x-ui.example>

        <x-ui.example title="Com badge" :code="$badgeCode" :html="$badgeHtml">
            <x-slot:description>
                <code>badge</code> renderiza um <code>&lt;x-ui.badge&gt;</code> soft na cor do tabs.
            </x-slot:description>
            <div class="w-full">
                <x-ui.tabs default="inbox" variant="soft">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="inbox" icon="bi-envelope" badge="12">Caixa de entrada</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="sent" icon="bi-send">Enviados</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="alerts" icon="bi-bell" badge="3">Alertas</x-ui.tabs.tab-item>
                    </x-slot:nav>

                    <x-ui.tabs.tab-panel name="inbox">
                        <div class="space-y-2">
                            <p class="mb-0 text-sm font-medium text-foreground">12 mensagens não lidas</p>
                            <p class="mb-0 text-sm text-muted-foreground">Priorize respostas de clientes e convites de equipe.</p>
                        </div>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="sent">
                        <p class="mb-0 text-sm text-muted-foreground">Histórico de mensagens enviadas.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="alerts">
                        <p class="mb-0 text-sm text-muted-foreground">3 alertas precisam da sua atenção.</p>
                    </x-ui.tabs.tab-panel>
                </x-ui.tabs>
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> nos tokens do tema — herdado pelos itens via <code>@@aware</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.tabs default="a" variant="pills" color="primary">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="a">Primary</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="b">Tab B</x-ui.tabs.tab-item>
                    </x-slot:nav>
                    <x-ui.tabs.tab-panel name="a"><p class="mb-0 text-sm text-muted-foreground">Primary</p></x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="b"><p class="mb-0 text-sm text-muted-foreground">B</p></x-ui.tabs.tab-panel>
                </x-ui.tabs>

                <x-ui.tabs default="a" variant="pills" color="success">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="a">Success</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="b">Tab B</x-ui.tabs.tab-item>
                    </x-slot:nav>
                    <x-ui.tabs.tab-panel name="a"><p class="mb-0 text-sm text-muted-foreground">Success</p></x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="b"><p class="mb-0 text-sm text-muted-foreground">B</p></x-ui.tabs.tab-panel>
                </x-ui.tabs>

                <x-ui.tabs default="a" variant="pills" color="danger">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="a">Danger</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="b">Tab B</x-ui.tabs.tab-item>
                    </x-slot:nav>
                    <x-ui.tabs.tab-panel name="a"><p class="mb-0 text-sm text-muted-foreground">Danger</p></x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="b"><p class="mb-0 text-sm text-muted-foreground">B</p></x-ui.tabs.tab-panel>
                </x-ui.tabs>

                <x-ui.tabs default="a" variant="soft" color="warning">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="a">Warning soft</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="b">Tab B</x-ui.tabs.tab-item>
                    </x-slot:nav>
                    <x-ui.tabs.tab-panel name="a"><p class="mb-0 text-sm text-muted-foreground">Warning soft</p></x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="b"><p class="mb-0 text-sm text-muted-foreground">B</p></x-ui.tabs.tab-panel>
                </x-ui.tabs>
            </div>
        </x-ui.example>

        <x-ui.example title="Vertical" :code="$verticalCode" :html="$verticalHtml">
            <x-slot:description>
                <code>vertical</code> coloca a navegação à esquerda — ideal para páginas de conta/settings.
            </x-slot:description>
            <div class="w-full">
                <x-ui.tabs default="profile" vertical variant="soft" color="primary">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="profile" icon="bi-person">Perfil</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="settings" icon="bi-gear">Configurações</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="billing" icon="bi-credit-card">Faturamento</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="team" icon="bi-people">Equipe</x-ui.tabs.tab-item>
                    </x-slot:nav>

                    <x-ui.tabs.tab-panel name="profile">
                        <div class="flex items-start gap-4">
                            <x-ui.avatar initials="AL" color="primary" circle size="lg" />
                            <div>
                                <h5 class="card-title">Ana Lima</h5>
                                <p class="mb-2 text-sm text-muted-foreground">Product Designer · São Paulo</p>
                                <x-ui.badge color="success" size="sm" variant="soft" dot>Online</x-ui.badge>
                            </div>
                        </div>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="settings">
                        <p class="mb-0 text-sm text-muted-foreground">Preferências de idioma, tema e notificações.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="billing">
                        <p class="mb-0 text-sm text-muted-foreground">Plano Pro · renovação em 12 dias.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="team">
                        <p class="mb-0 text-sm text-muted-foreground">8 membros ativos neste workspace.</p>
                    </x-ui.tabs.tab-panel>
                </x-ui.tabs>
            </div>
        </x-ui.example>

        <x-ui.example title="Largura justificada" :code="$justifiedCode" :html="$justifiedHtml">
            <x-slot:description>
                <code>justified</code> divide a largura igualmente entre as abas (só horizontal).
            </x-slot:description>
            <div class="w-full">
                <x-ui.tabs default="day" justified variant="boxed">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="day">Dia</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="week">Semana</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="month">Mês</x-ui.tabs.tab-item>
                    </x-slot:nav>

                    <x-ui.tabs.tab-panel name="day">
                        <p class="mb-0 text-sm text-muted-foreground">Métricas das últimas 24 horas.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="week">
                        <p class="mb-0 text-sm text-muted-foreground">Resumo dos últimos 7 dias.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="month">
                        <p class="mb-0 text-sm text-muted-foreground">Comparativo do mês corrente.</p>
                    </x-ui.tabs.tab-panel>
                </x-ui.tabs>
            </div>
        </x-ui.example>

        <x-ui.example title="Aba desabilitada" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> bloqueia clique e o ciclo de setas/Home/End.
            </x-slot:description>
            <div class="w-full">
                <x-ui.tabs default="profile">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="profile">Perfil</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="settings" disabled>Configurações (bloqueado)</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="billing">Faturamento</x-ui.tabs.tab-item>
                    </x-slot:nav>

                    <x-ui.tabs.tab-panel name="profile">
                        <p class="mb-0 text-sm text-muted-foreground">Abas desabilitadas saem da navegação por teclado.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="settings">
                        <p class="mb-0 text-sm text-muted-foreground">Indisponível.</p>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="billing">
                        <p class="mb-0 text-sm text-muted-foreground">Conteúdo de faturamento.</p>
                    </x-ui.tabs.tab-panel>
                </x-ui.tabs>
            </div>
        </x-ui.example>

        <x-ui.example title="Dentro de um card" :code="$cardCode" :html="$cardHtml">
            <x-slot:description>
                Composição comum: tabs + métricas dentro de <code>&lt;x-ui.card&gt;</code>.
            </x-slot:description>
            <div class="w-full">
                <x-ui.card>
                    <x-ui.tabs default="overview" variant="underline">
                        <x-slot:nav>
                            <x-ui.tabs.tab-item name="overview" icon="bi-graph-up">Visão geral</x-ui.tabs.tab-item>
                            <x-ui.tabs.tab-item name="orders" icon="bi-bag" badge="4">Pedidos</x-ui.tabs.tab-item>
                            <x-ui.tabs.tab-item name="customers" icon="bi-people">Clientes</x-ui.tabs.tab-item>
                        </x-slot:nav>

                        <x-ui.tabs.tab-panel name="overview">
                            <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                                <div>
                                    <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Receita</p>
                                    <p class="mb-0 text-xl font-semibold text-foreground">R$ 48,2k</p>
                                </div>
                                <div>
                                    <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Pedidos</p>
                                    <p class="mb-0 text-xl font-semibold text-foreground">312</p>
                                </div>
                                <div>
                                    <p class="mb-1 text-xs font-medium tracking-wide text-muted-foreground uppercase">Conversão</p>
                                    <p class="mb-0 text-xl font-semibold text-foreground">3,8%</p>
                                </div>
                            </div>
                        </x-ui.tabs.tab-panel>
                        <x-ui.tabs.tab-panel name="orders">
                            <p class="mb-0 text-sm text-muted-foreground">4 pedidos aguardando envio.</p>
                        </x-ui.tabs.tab-panel>
                        <x-ui.tabs.tab-panel name="customers">
                            <p class="mb-0 text-sm text-muted-foreground">Lista de clientes recentes.</p>
                        </x-ui.tabs.tab-panel>
                    </x-ui.tabs>
                </x-ui.card>
            </div>
        </x-ui.example>

        <x-ui.example title="Com ações no painel" :code="$actionsCode" :html="$actionsHtml">
            <x-slot:description>
                O painel aceita qualquer markup — botões, formulários, alertas, etc.
            </x-slot:description>
            <div class="w-full">
                <x-ui.tabs default="details" variant="pills" color="primary">
                    <x-slot:nav>
                        <x-ui.tabs.tab-item name="details">Detalhes</x-ui.tabs.tab-item>
                        <x-ui.tabs.tab-item name="permissions">Permissões</x-ui.tabs.tab-item>
                    </x-slot:nav>

                    <x-ui.tabs.tab-panel name="details">
                        <div class="space-y-3">
                            <p class="mb-0 text-sm text-muted-foreground">Revise as informações antes de publicar.</p>
                            <div class="flex flex-wrap gap-2">
                                <x-ui.button color="primary" size="sm" icon="bi-check-lg">Publicar</x-ui.button>
                                <x-ui.button color="secondary" variant="ghost" size="sm">Cancelar</x-ui.button>
                            </div>
                        </div>
                    </x-ui.tabs.tab-panel>
                    <x-ui.tabs.tab-panel name="permissions">
                        <p class="mb-0 text-sm text-muted-foreground">Quem pode editar este recurso.</p>
                    </x-ui.tabs.tab-panel>
                </x-ui.tabs>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="tabs" />
</x-ui.docs>
