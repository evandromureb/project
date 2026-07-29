<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="basic">Abrir modal</x-ui.modal.modal-trigger>

        <x-ui.modal name="basic" title="Título do modal">
            Conteúdo do modal aqui.

            <x-slot:footer>
                <x-ui.modal.modal-trigger name="basic" action="close" variant="outline" color="secondary">Fechar</x-ui.modal.modal-trigger>
                <x-ui.modal.modal-trigger name="basic" action="close" color="primary">Salvar</x-ui.modal.modal-trigger>
            </x-slot:footer>
        </x-ui.modal>
        BLADE;

    $centeredCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="centered">Abrir centralizado</x-ui.modal.modal-trigger>

        <x-ui.modal name="centered" title="Modal centralizado" centered>
            Este modal fica centralizado verticalmente na tela.
        </x-ui.modal>
        BLADE;

    $gridCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="grid">Novo contato</x-ui.modal.modal-trigger>

        <x-ui.modal name="grid" title="Novo contato" size="lg">
            <form onsubmit="return false;" class="grid grid-cols-2 gap-4">
                <input type="text" id="modal-grid-first" name="first_name" placeholder="Nome" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                <input type="text" id="modal-grid-last" name="last_name" placeholder="Sobrenome" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                <input type="email" id="modal-grid-email" name="email" placeholder="E-mail" class="col-span-2 rounded-md border border-border bg-card px-3 py-2 text-sm">
                <input type="text" id="modal-grid-city" name="city" placeholder="Cidade" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                <input type="text" id="modal-grid-state" name="state" placeholder="Estado" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
            </form>

            <x-slot:footer>
                <x-ui.modal.modal-trigger name="grid" action="close" variant="outline" color="secondary">Cancelar</x-ui.modal.modal-trigger>
                <x-ui.modal.modal-trigger name="grid" action="close" color="primary">Salvar contato</x-ui.modal.modal-trigger>
            </x-slot:footer>
        </x-ui.modal>
        BLADE;

    $staticBackdropCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="static" color="warning">Abrir com backdrop estático</x-ui.modal.modal-trigger>

        <x-ui.modal name="static" title="Ação obrigatória" centered staticBackdrop>
            Este modal só fecha pelo botão ou pela tecla Esc — clicar fora não fecha.

            <x-slot:footer>
                <x-ui.modal.modal-trigger name="static" action="close" color="primary">Entendi</x-ui.modal.modal-trigger>
            </x-slot:footer>
        </x-ui.modal>
        BLADE;

    $chainCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="step-1">Iniciar assistente</x-ui.modal.modal-trigger>

        <x-ui.modal name="step-1" title="Etapa 1 de 2" centered>
            Preencha os dados básicos antes de continuar.

            <x-slot:footer>
                <x-ui.modal.modal-trigger name="step-2" action="open" :closes="['step-1']" color="primary">
                    Próxima etapa
                </x-ui.modal.modal-trigger>
            </x-slot:footer>
        </x-ui.modal>

        <x-ui.modal name="step-2" title="Etapa 2 de 2" centered>
            Confirme os dados e finalize.

            <x-slot:footer>
                <x-ui.modal.modal-trigger name="step-1" action="open" :closes="['step-2']" variant="outline" color="secondary">
                    Voltar
                </x-ui.modal.modal-trigger>
                <x-ui.modal.modal-trigger name="step-2" action="close" color="success">Concluir</x-ui.modal.modal-trigger>
            </x-slot:footer>
        </x-ui.modal>
        BLADE;

    $scrollableCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="scrollable">Abrir rolável</x-ui.modal.modal-trigger>

        <x-ui.modal name="scrollable" title="Termos de uso" centered scrollable>
            @for ($i = 1; $i <= 15; $i++)
                <p class="mb-3">Parágrafo {{ $i }} dos termos de uso — conteúdo de exemplo para demonstrar a rolagem interna.</p>
            @endfor
        </x-ui.modal>
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="size-sm" size="sm">Pequeno</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="size-lg" size="sm">Grande</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="size-xl" size="sm">Extra grande</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="size-fullscreen" size="sm">Tela cheia</x-ui.modal.modal-trigger>

        <x-ui.modal name="size-sm" title="Pequeno" size="sm" centered>Conteúdo do modal pequeno.</x-ui.modal>
        <x-ui.modal name="size-lg" title="Grande" size="lg" centered>Conteúdo do modal grande.</x-ui.modal>
        <x-ui.modal name="size-xl" title="Extra grande" size="xl" centered>Conteúdo do modal extra grande.</x-ui.modal>
        <x-ui.modal name="size-fullscreen" title="Tela cheia" size="fullscreen">Conteúdo do modal em tela cheia.</x-ui.modal>
        BLADE;

    $fullscreenBelowCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="responsive-fs">Abrir</x-ui.modal.modal-trigger>

        <x-ui.modal name="responsive-fs" title="Tela cheia só no mobile" fullscreenBelow="md" centered>
            Abaixo do breakpoint "md" este modal ocupa a tela inteira; a partir do "md" vira um modal normal.
        </x-ui.modal>
        BLADE;

    $animationsCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="anim-fade" variant="soft" size="sm">Fade</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="anim-zoom" variant="soft" size="sm">Zoom</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="anim-up" variant="soft" size="sm">Subir</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="anim-down" variant="soft" size="sm">Descer</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="anim-left" variant="soft" size="sm">Esquerda</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="anim-right" variant="soft" size="sm">Direita</x-ui.modal.modal-trigger>

        <x-ui.modal name="anim-fade" title="Fade" animation="fade" centered>Animação padrão.</x-ui.modal>
        <x-ui.modal name="anim-zoom" title="Zoom" animation="zoom" centered>Aumenta a partir do centro.</x-ui.modal>
        <x-ui.modal name="anim-up" title="Subir" animation="slide-up" centered>Entra de baixo para cima.</x-ui.modal>
        <x-ui.modal name="anim-down" title="Descer" animation="slide-down" centered>Entra de cima para baixo.</x-ui.modal>
        <x-ui.modal name="anim-left" title="Esquerda" animation="slide-left" centered>Entra da esquerda.</x-ui.modal>
        <x-ui.modal name="anim-right" title="Direita" animation="slide-right" centered>Entra da direita.</x-ui.modal>
        BLADE;

    $positionsCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="pos-top" variant="outline" size="sm">Topo</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="pos-top-right" variant="outline" size="sm">Topo direita</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="pos-bottom" variant="outline" size="sm">Base</x-ui.modal.modal-trigger>
        <x-ui.modal.modal-trigger name="pos-bottom-right" variant="outline" size="sm">Base direita</x-ui.modal.modal-trigger>

        <x-ui.modal name="pos-top" title="Topo" position="top" size="sm">Ancorado no topo, centralizado.</x-ui.modal>
        <x-ui.modal name="pos-top-right" title="Topo direita" position="top-right" size="sm">Ancorado no canto superior direito.</x-ui.modal>
        <x-ui.modal name="pos-bottom" title="Base" position="bottom" size="sm">Ancorado na base, centralizado.</x-ui.modal>
        <x-ui.modal name="pos-bottom-right" title="Base direita" position="bottom-right" size="sm">Ancorado no canto inferior direito.</x-ui.modal>
        BLADE;

    $successCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="success" color="success">Simular pagamento</x-ui.modal.modal-trigger>

        <x-ui.modal name="success" size="sm" centered :closeButton="false">
            <div class="flex flex-col items-center gap-3 text-center">
                <x-ui.avatar icon="bi-check-lg" color="success" size="xl" circle />
                <h5 class="m-0 text-base font-semibold">Pagamento confirmado!</h5>
                <p class="mb-0 text-sm text-muted-foreground">
                    Seu pedido #4821 foi processado com sucesso.
                </p>
                <x-ui.modal.modal-trigger name="success" action="close" color="success" class="w-full justify-center">
                    Concluir
                </x-ui.modal.modal-trigger>
            </div>
        </x-ui.modal>
        BLADE;

    $loginCode = <<<'BLADE'
        <x-ui.modal.modal-trigger name="login" icon="bi-person-badge">Entrar</x-ui.modal.modal-trigger>

        <x-ui.modal name="login" title="Acesse sua conta" centered size="sm">
            <form onsubmit="return false;" class="flex flex-col gap-3">
                <input type="email" id="modal-login-email" name="email" autocomplete="username" placeholder="E-mail" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                <input type="password" id="modal-login-password" name="password" autocomplete="current-password" placeholder="Senha" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
            </form>

            <x-slot:footer>
                <x-ui.modal.modal-trigger name="login" action="close" color="primary" block>Entrar</x-ui.modal.modal-trigger>
            </x-slot:footer>
        </x-ui.modal>
        BLADE;

    $basicHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Abrir modal</button>

        <!-- teleportado para o fim do <body>; oculto (x-cloak) até isOpen('basic') -->
        <div class="fixed inset-0 z-[100] flex items-start justify-center pt-16 overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-lg" role="dialog" aria-modal="true" aria-label="Título do modal">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Título do modal</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">
                    Conteúdo do modal aqui.
                </div>
                <div class="flex items-center justify-end gap-2 border-t border-border px-5 py-4">
                    <button type="button" class="btn btn-outline-secondary">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
        HTML;

    $centeredHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Abrir centralizado</button>

        <div class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-lg" role="dialog" aria-modal="true" aria-label="Modal centralizado">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Modal centralizado</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">
                    Este modal fica centralizado verticalmente na tela.
                </div>
            </div>
        </div>
        HTML;

    $gridHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Novo contato</button>

        <div class="fixed inset-0 z-[100] flex items-start justify-center pt-16 overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-2xl" role="dialog" aria-modal="true" aria-label="Novo contato">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Novo contato</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">
                    <form onsubmit="return false;" class="grid grid-cols-2 gap-4">
                        <input type="text" placeholder="Nome" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                        <input type="text" placeholder="Sobrenome" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                        <input type="email" placeholder="E-mail" class="col-span-2 rounded-md border border-border bg-card px-3 py-2 text-sm">
                        <input type="text" placeholder="Cidade" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                        <input type="text" placeholder="Estado" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                    </form>
                </div>
                <div class="flex items-center justify-end gap-2 border-t border-border px-5 py-4">
                    <button type="button" class="btn btn-outline-secondary">Cancelar</button>
                    <button type="button" class="btn btn-primary">Salvar contato</button>
                </div>
            </div>
        </div>
        HTML;

    $staticBackdropHtml = <<<'HTML'
        <button type="button" class="btn btn-warning">Abrir com backdrop estático</button>

        <!-- staticBackdrop: o backdrop não tem @click de fechar -->
        <div class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-lg" role="dialog" aria-modal="true" aria-label="Ação obrigatória">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Ação obrigatória</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">
                    Este modal só fecha pelo botão ou pela tecla Esc — clicar fora não fecha.
                </div>
                <div class="flex items-center justify-end gap-2 border-t border-border px-5 py-4">
                    <button type="button" class="btn btn-primary">Entendi</button>
                </div>
            </div>
        </div>
        HTML;

    $chainHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Iniciar assistente</button>

        <!-- Modal "step-1" -->
        <div class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-lg" role="dialog" aria-modal="true" aria-label="Etapa 1 de 2">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Etapa 1 de 2</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">
                    Preencha os dados básicos antes de continuar.
                </div>
                <div class="flex items-center justify-end gap-2 border-t border-border px-5 py-4">
                    <button type="button" class="btn btn-primary">Próxima etapa</button>
                </div>
            </div>
        </div>

        <!-- Modal "step-2": "Próxima etapa" fecha step-1 e abre step-2 (mesma store global) -->
        <div class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-lg" role="dialog" aria-modal="true" aria-label="Etapa 2 de 2">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Etapa 2 de 2</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">
                    Confirme os dados e finalize.
                </div>
                <div class="flex items-center justify-end gap-2 border-t border-border px-5 py-4">
                    <button type="button" class="btn btn-outline-secondary">Voltar</button>
                    <button type="button" class="btn btn-success">Concluir</button>
                </div>
            </div>
        </div>
        HTML;

    $scrollableHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Abrir rolável</button>

        <!-- scrollable: diálogo com max-h-[calc(100vh_-_2rem)] e corpo com overflow-y-auto -->
        <div class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-lg max-h-[calc(100vh_-_2rem)]" role="dialog" aria-modal="true" aria-label="Termos de uso">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Termos de uso</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="overflow-y-auto p-5">
                    <p class="mb-3">Parágrafo 1 dos termos de uso — conteúdo de exemplo para demonstrar a rolagem interna.</p>
                    <p class="mb-3">Parágrafo 2 dos termos de uso — conteúdo de exemplo para demonstrar a rolagem interna.</p>
                    <!-- ... mais 13 parágrafos ... -->
                </div>
            </div>
        </div>
        HTML;

    $sizesHtml = <<<'HTML'
        <button type="button" class="btn btn-primary btn-sm">Pequeno</button>
        <button type="button" class="btn btn-primary btn-sm">Grande</button>
        <button type="button" class="btn btn-primary btn-sm">Extra grande</button>
        <button type="button" class="btn btn-primary btn-sm">Tela cheia</button>

        <!-- cada modal muda só a classe de tamanho: max-w-sm / max-w-2xl / max-w-4xl / h-full w-full max-w-none rounded-none (fullscreen) -->
        <div class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-sm" role="dialog" aria-modal="true" aria-label="Pequeno">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Pequeno</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">Conteúdo do modal pequeno.</div>
            </div>
        </div>
        HTML;

    $fullscreenBelowHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Abrir</button>

        <!-- fullscreenBelow="md": tela cheia até "md", vira modal normal a partir do breakpoint -->
        <div class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg h-full w-full max-w-none rounded-none md:h-auto md:max-w-lg md:rounded-md" role="dialog" aria-modal="true" aria-label="Tela cheia só no mobile">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Tela cheia só no mobile</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">
                    Abaixo do breakpoint "md" este modal ocupa a tela inteira; a partir do "md" vira um modal normal.
                </div>
            </div>
        </div>
        HTML;

    $animationsHtml = <<<'HTML'
        <button type="button" class="btn btn-soft-primary btn-sm">Fade</button>
        <button type="button" class="btn btn-soft-primary btn-sm">Zoom</button>
        <button type="button" class="btn btn-soft-primary btn-sm">Subir</button>
        <button type="button" class="btn btn-soft-primary btn-sm">Descer</button>
        <button type="button" class="btn btn-soft-primary btn-sm">Esquerda</button>
        <button type="button" class="btn btn-soft-primary btn-sm">Direita</button>

        <!-- animation só muda as classes de entrada/saída (x-transition), a estrutura é a mesma -->
        <div class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-lg" role="dialog" aria-modal="true" aria-label="Fade">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Fade</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">Animação padrão.</div>
            </div>
        </div>
        HTML;

    $positionsHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-primary btn-sm">Topo</button>
        <button type="button" class="btn btn-outline-primary btn-sm">Topo direita</button>
        <button type="button" class="btn btn-outline-primary btn-sm">Base</button>
        <button type="button" class="btn btn-outline-primary btn-sm">Base direita</button>

        <!-- position="top": items-start justify-center pt-16 (as demais mudam items/justify/padding) -->
        <div class="fixed inset-0 z-[100] flex items-start justify-center pt-16 overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-sm" role="dialog" aria-modal="true" aria-label="Topo">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Topo</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">Ancorado no topo, centralizado.</div>
            </div>
        </div>
        HTML;

    $successHtml = <<<'HTML'
        <button type="button" class="btn btn-success">Simular pagamento</button>

        <!-- :closeButton="false" e sem "title": sem header -->
        <div class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-sm" role="dialog" aria-modal="true">
                <div class="p-5">
                    <div class="flex flex-col items-center gap-3 text-center">
                        <div class="avatar avatar-xl avatar-circle bg-success text-success-foreground">
                            <i class="bi bi-check-lg" aria-hidden="true"></i>
                        </div>
                        <h5 class="m-0 text-base font-semibold">Pagamento confirmado!</h5>
                        <p class="mb-0 text-sm text-muted-foreground">
                            Seu pedido #4821 foi processado com sucesso.
                        </p>
                        <button type="button" class="btn btn-success w-full justify-center">Concluir</button>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $loginHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">
            <i class="bi bi-person-badge shrink-0 leading-none"></i>
            <span>Entrar</span>
        </button>

        <div class="fixed inset-0 z-[100] flex items-center justify-center overflow-y-auto p-4" role="presentation">
            <div class="fixed inset-0 bg-black/50" aria-hidden="true"></div>
            <div class="relative z-10 my-auto flex w-full flex-col rounded-md border border-border bg-card text-card-foreground shadow-lg max-w-sm" role="dialog" aria-modal="true" aria-label="Acesse sua conta">
                <div class="flex items-center justify-between gap-3 border-b border-border px-5 py-4">
                    <h5 class="m-0 text-base font-semibold text-card-foreground">Acesse sua conta</h5>
                    <button type="button" class="btn-icon -mr-2 shrink-0" aria-label="Fechar">
                        <i class="bi bi-x-lg text-base leading-none"></i>
                    </button>
                </div>
                <div class="p-5">
                    <form onsubmit="return false;" class="flex flex-col gap-3">
                        <input type="email" autocomplete="username" placeholder="E-mail" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                        <input type="password" autocomplete="current-password" placeholder="Senha" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                    </form>
                </div>
                <div class="flex items-center justify-end gap-2 border-t border-border px-5 py-4">
                    <button type="button" class="btn btn-primary w-full">Entrar</button>
                </div>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.modal&gt;</code> exibe uma janela sobreposta com fundo escurecido, foco
            preso dentro dela (<code>x-trap</code>) e rolagem do body bloqueada enquanto aberta —
            tudo via Alpine, sem JS de terceiros. Use <code>&lt;x-ui.modal.modal-trigger&gt;</code> para
            abrir/fechar (gatilho e modal não precisam ser vizinhos no DOM — mesma store global do
            <code>&lt;x-ui.collapse&gt;</code>). Suporta tamanhos, tela cheia responsiva, centralização,
            rolagem interna, backdrop estático, teclado, 6 animações, 7 posições e encadeamento entre
            modais.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                <code>title</code> gera o cabeçalho padrão; o slot <code>footer</code> adiciona os botões de ação.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="basic">Abrir modal</x-ui.modal.modal-trigger>

            <x-ui.modal name="basic" title="Título do modal">
                Conteúdo do modal aqui.

                <x-slot:footer>
                    <x-ui.modal.modal-trigger name="basic" action="close" variant="outline" color="secondary">Fechar</x-ui.modal.modal-trigger>
                    <x-ui.modal.modal-trigger name="basic" action="close" color="primary">Salvar</x-ui.modal.modal-trigger>
                </x-slot:footer>
            </x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Centralizado verticalmente" :code="$centeredCode" :html="$centeredHtml">
            <x-slot:description>
                <code>centered</code> alinha o modal no meio vertical da tela em vez de ancorado no topo (padrão).
            </x-slot:description>
            <x-ui.modal.modal-trigger name="centered">Abrir centralizado</x-ui.modal.modal-trigger>

            <x-ui.modal name="centered" title="Modal centralizado" centered>
                Este modal fica centralizado verticalmente na tela.
            </x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Grid no modal" :code="$gridCode" :html="$gridHtml">
            <x-slot:description>
                O corpo do modal aceita qualquer markup — aqui, campos de formulário organizados em grid.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="grid">Novo contato</x-ui.modal.modal-trigger>

            <x-ui.modal name="grid" title="Novo contato" size="lg">
                <form onsubmit="return false;" class="grid grid-cols-2 gap-4">
                    <input type="text" id="modal-grid-first" name="first_name" placeholder="Nome" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                    <input type="text" id="modal-grid-last" name="last_name" placeholder="Sobrenome" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                    <input type="email" id="modal-grid-email" name="email" placeholder="E-mail" class="col-span-2 rounded-md border border-border bg-card px-3 py-2 text-sm">
                    <input type="text" id="modal-grid-city" name="city" placeholder="Cidade" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                    <input type="text" id="modal-grid-state" name="state" placeholder="Estado" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                </form>

                <x-slot:footer>
                    <x-ui.modal.modal-trigger name="grid" action="close" variant="outline" color="secondary">Cancelar</x-ui.modal.modal-trigger>
                    <x-ui.modal.modal-trigger name="grid" action="close" color="primary">Salvar contato</x-ui.modal.modal-trigger>
                </x-slot:footer>
            </x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Backdrop estático" :code="$staticBackdropCode" :html="$staticBackdropHtml">
            <x-slot:description>
                <code>staticBackdrop</code> impede fechar clicando fora — só o botão ou <code>Esc</code> (se <code>keyboard</code> estiver ativo) fecham.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="static" color="warning">Abrir com backdrop estático</x-ui.modal.modal-trigger>

            <x-ui.modal name="static" title="Ação obrigatória" centered staticBackdrop>
                Este modal só fecha pelo botão ou pela tecla Esc — clicar fora não fecha.

                <x-slot:footer>
                    <x-ui.modal.modal-trigger name="static" action="close" color="primary">Entendi</x-ui.modal.modal-trigger>
                </x-slot:footer>
            </x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Alternar entre modais" :code="$chainCode" :html="$chainHtml">
            <x-slot:description>
                <code>action="open"</code> combinado com <code>closes</code> fecha o modal atual e abre o próximo — útil para assistentes em etapas.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="step-1">Iniciar assistente</x-ui.modal.modal-trigger>

            <x-ui.modal name="step-1" title="Etapa 1 de 2" centered>
                Preencha os dados básicos antes de continuar.

                <x-slot:footer>
                    <x-ui.modal.modal-trigger name="step-2" action="open" :closes="['step-1']" color="primary">
                        Próxima etapa
                    </x-ui.modal.modal-trigger>
                </x-slot:footer>
            </x-ui.modal>

            <x-ui.modal name="step-2" title="Etapa 2 de 2" centered>
                Confirme os dados e finalize.

                <x-slot:footer>
                    <x-ui.modal.modal-trigger name="step-1" action="open" :closes="['step-2']" variant="outline" color="secondary">
                        Voltar
                    </x-ui.modal.modal-trigger>
                    <x-ui.modal.modal-trigger name="step-2" action="close" color="success">Concluir</x-ui.modal.modal-trigger>
                </x-slot:footer>
            </x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Rolável" :code="$scrollableCode" :html="$scrollableHtml">
            <x-slot:description>
                <code>scrollable</code> mantém cabeçalho/rodapé fixos e rola só o conteúdo quando ele é mais alto que a tela.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="scrollable">Abrir rolável</x-ui.modal.modal-trigger>

            <x-ui.modal name="scrollable" title="Termos de uso" centered scrollable>
                @for ($i = 1; $i <= 15; $i++)
                    <p class="mb-3">Parágrafo {{ $i }} dos termos de uso — conteúdo de exemplo para demonstrar a rolagem interna.</p>
                @endfor
            </x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code> (padrão), <code>lg</code>, <code>xl</code> ou <code>fullscreen</code>.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="size-sm" size="sm">Pequeno</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="size-lg" size="sm">Grande</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="size-xl" size="sm">Extra grande</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="size-fullscreen" size="sm">Tela cheia</x-ui.modal.modal-trigger>

            <x-ui.modal name="size-sm" title="Pequeno" size="sm" centered>Conteúdo do modal pequeno.</x-ui.modal>
            <x-ui.modal name="size-lg" title="Grande" size="lg" centered>Conteúdo do modal grande.</x-ui.modal>
            <x-ui.modal name="size-xl" title="Extra grande" size="xl" centered>Conteúdo do modal extra grande.</x-ui.modal>
            <x-ui.modal name="size-fullscreen" title="Tela cheia" size="fullscreen">Conteúdo do modal em tela cheia.</x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Tela cheia responsiva" :code="$fullscreenBelowCode" :html="$fullscreenBelowHtml">
            <x-slot:description>
                <code>fullscreenBelow="md"</code> ocupa a tela inteira só abaixo do breakpoint informado.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="responsive-fs">Abrir</x-ui.modal.modal-trigger>

            <x-ui.modal name="responsive-fs" title="Tela cheia só no mobile" fullscreenBelow="md" centered>
                Abaixo do breakpoint "md" este modal ocupa a tela inteira; a partir do "md" vira um modal normal.
            </x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Animações" :code="$animationsCode" :html="$animationsHtml">
            <x-slot:description>
                <code>animation</code>: <code>fade</code> (padrão), <code>zoom</code>, <code>slide-up</code>, <code>slide-down</code>, <code>slide-left</code>, <code>slide-right</code>.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="anim-fade" variant="soft" size="sm">Fade</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="anim-zoom" variant="soft" size="sm">Zoom</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="anim-up" variant="soft" size="sm">Subir</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="anim-down" variant="soft" size="sm">Descer</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="anim-left" variant="soft" size="sm">Esquerda</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="anim-right" variant="soft" size="sm">Direita</x-ui.modal.modal-trigger>

            <x-ui.modal name="anim-fade" title="Fade" animation="fade" centered>Animação padrão.</x-ui.modal>
            <x-ui.modal name="anim-zoom" title="Zoom" animation="zoom" centered>Aumenta a partir do centro.</x-ui.modal>
            <x-ui.modal name="anim-up" title="Subir" animation="slide-up" centered>Entra de baixo para cima.</x-ui.modal>
            <x-ui.modal name="anim-down" title="Descer" animation="slide-down" centered>Entra de cima para baixo.</x-ui.modal>
            <x-ui.modal name="anim-left" title="Esquerda" animation="slide-left" centered>Entra da esquerda.</x-ui.modal>
            <x-ui.modal name="anim-right" title="Direita" animation="slide-right" centered>Entra da direita.</x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Posições" :code="$positionsCode" :html="$positionsHtml">
            <x-slot:description>
                <code>position</code>: <code>center</code> (padrão), <code>top</code>, <code>top-right</code>, <code>top-left</code>, <code>bottom</code>, <code>bottom-right</code>, <code>bottom-left</code>.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="pos-top" variant="outline" size="sm">Topo</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="pos-top-right" variant="outline" size="sm">Topo direita</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="pos-bottom" variant="outline" size="sm">Base</x-ui.modal.modal-trigger>
            <x-ui.modal.modal-trigger name="pos-bottom-right" variant="outline" size="sm">Base direita</x-ui.modal.modal-trigger>

            <x-ui.modal name="pos-top" title="Topo" position="top" size="sm">Ancorado no topo, centralizado.</x-ui.modal>
            <x-ui.modal name="pos-top-right" title="Topo direita" position="top-right" size="sm">Ancorado no canto superior direito.</x-ui.modal>
            <x-ui.modal name="pos-bottom" title="Base" position="bottom" size="sm">Ancorado na base, centralizado.</x-ui.modal>
            <x-ui.modal name="pos-bottom-right" title="Base direita" position="bottom-right" size="sm">Ancorado no canto inferior direito.</x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Exemplo: confirmação de sucesso" :code="$successCode" :html="$successHtml">
            <x-slot:description>
                Composição livre no corpo (sem <code>title</code>/com <code>:closeButton="false"</code>) usando <code>&lt;x-ui.avatar&gt;</code> como ícone central.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="success" color="success">Simular pagamento</x-ui.modal.modal-trigger>

            <x-ui.modal name="success" size="sm" centered :closeButton="false">
                <div class="flex flex-col items-center gap-3 text-center">
                    <x-ui.avatar icon="bi-check-lg" color="success" size="xl" circle />
                    <h5 class="m-0 text-base font-semibold">Pagamento confirmado!</h5>
                    <p class="mb-0 text-sm text-muted-foreground">
                        Seu pedido #4821 foi processado com sucesso.
                    </p>
                    <x-ui.modal.modal-trigger name="success" action="close" color="success" class="w-full justify-center">
                        Concluir
                    </x-ui.modal.modal-trigger>
                </div>
            </x-ui.modal>
        </x-ui.example>

        <x-ui.example title="Exemplo: formulário de login" :code="$loginCode" :html="$loginHtml">
            <x-slot:description>
                Formulário simples no corpo, com botão de largura total no rodapé.
            </x-slot:description>
            <x-ui.modal.modal-trigger name="login" icon="bi-person-badge">Entrar</x-ui.modal.modal-trigger>

            <x-ui.modal name="login" title="Acesse sua conta" centered size="sm">
                <form onsubmit="return false;" class="flex flex-col gap-3">
                    <input type="email" id="modal-login-email" name="email" autocomplete="username" placeholder="E-mail" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                    <input type="password" id="modal-login-password" name="password" autocomplete="current-password" placeholder="Senha" class="rounded-md border border-border bg-card px-3 py-2 text-sm">
                </form>

                <x-slot:footer>
                    <x-ui.modal.modal-trigger name="login" action="close" color="primary" block>Entrar</x-ui.modal.modal-trigger>
                </x-slot:footer>
            </x-ui.modal>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="modal" />
</x-ui.docs>
