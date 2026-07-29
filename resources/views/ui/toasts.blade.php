<?php

use Livewire\Component;

return new class extends Component
{

	public function mount(): void
	{
		$this->dispatch('toast', type: 'danger', message: 'Veio do servidor!');
	}

    public function notifyFromServer(): void
    {
        $this->dispatch('toast', type: 'success', title: 'Disparado pelo servidor', message: 'Este toast veio de uma ação Livewire via $this->dispatch(\'toast\', ...).');
    }
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.button @click="$store.toast.show({ message: 'Notificação padrão.' })">
            Disparar
        </x-ui.button>
        BLADE;

    $basicHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border bg-card/95 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="m-0 text-sm leading-relaxed opacity-90">Notificação padrão.</p>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div class="h-0.5 w-full bg-muted">
                <div class="h-full w-3/5 bg-foreground/40 transition-[width] duration-100 ease-linear"></div>
            </div>
        </div>
        HTML;

    $typesCode = <<<'BLADE'
        <x-ui.button color="success" @click="$store.toast.success('Operação concluída com sucesso.')">Sucesso</x-ui.button>
        <x-ui.button color="danger" @click="$store.toast.danger('Não foi possível salvar as alterações.')">Erro</x-ui.button>
        <x-ui.button color="warning" @click="$store.toast.warning('Verifique os campos antes de continuar.')">Aviso</x-ui.button>
        <x-ui.button color="info" @click="$store.toast.info('Nova versão disponível.')">Info</x-ui.button>
        BLADE;

    $typesHtml = <<<'HTML'
        <div class="flex flex-col gap-2.5">
            <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-success bg-success/5 text-foreground shadow-lg backdrop-blur-sm">
                <div class="flex items-start gap-3 p-3.5">
                    <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-success/15 text-base text-success">
                        <i class="bi bi-check-circle-fill leading-none" aria-hidden="true"></i>
                    </span>
                    <div class="min-w-0 flex-1 pt-0.5">
                        <p class="m-0 text-sm leading-relaxed opacity-90">Operação concluída com sucesso.</p>
                    </div>
                    <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="h-0.5 w-full bg-success/15">
                    <div class="h-full w-3/5 bg-success transition-[width] duration-100 ease-linear"></div>
                </div>
            </div>
            <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-danger bg-danger/5 text-foreground shadow-lg backdrop-blur-sm">
                <div class="flex items-start gap-3 p-3.5">
                    <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-danger/15 text-base text-danger">
                        <i class="bi bi-x-circle-fill leading-none" aria-hidden="true"></i>
                    </span>
                    <div class="min-w-0 flex-1 pt-0.5">
                        <p class="m-0 text-sm leading-relaxed opacity-90">Não foi possível salvar as alterações.</p>
                    </div>
                    <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="h-0.5 w-full bg-danger/15">
                    <div class="h-full w-3/5 bg-danger transition-[width] duration-100 ease-linear"></div>
                </div>
            </div>
            <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-warning bg-warning/5 text-foreground shadow-lg backdrop-blur-sm">
                <div class="flex items-start gap-3 p-3.5">
                    <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-warning/15 text-base text-warning">
                        <i class="bi bi-exclamation-triangle-fill leading-none" aria-hidden="true"></i>
                    </span>
                    <div class="min-w-0 flex-1 pt-0.5">
                        <p class="m-0 text-sm leading-relaxed opacity-90">Verifique os campos antes de continuar.</p>
                    </div>
                    <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="h-0.5 w-full bg-warning/15">
                    <div class="h-full w-3/5 bg-warning transition-[width] duration-100 ease-linear"></div>
                </div>
            </div>
            <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-info bg-info/5 text-foreground shadow-lg backdrop-blur-sm">
                <div class="flex items-start gap-3 p-3.5">
                    <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-info/15 text-base text-info">
                        <i class="bi bi-info-circle-fill leading-none" aria-hidden="true"></i>
                    </span>
                    <div class="min-w-0 flex-1 pt-0.5">
                        <p class="m-0 text-sm leading-relaxed opacity-90">Nova versão disponível.</p>
                    </div>
                    <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                        <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="h-0.5 w-full bg-info/15">
                    <div class="h-full w-3/5 bg-info transition-[width] duration-100 ease-linear"></div>
                </div>
            </div>
        </div>
        HTML;

    $titleCode = <<<'BLADE'
        <x-ui.button color="success" @click="$store.toast.success('O pedido #4821 foi processado.', { title: 'Pedido confirmado' })">
            Disparar com título
        </x-ui.button>
        BLADE;

    $titleHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-success bg-success/5 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-success/15 text-base text-success">
                    <i class="bi bi-check-circle-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="mb-0.5 text-sm font-semibold tracking-tight">Pedido confirmado</p>
                    <p class="m-0 text-sm leading-relaxed opacity-80">O pedido #4821 foi processado.</p>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div class="h-0.5 w-full bg-success/15">
                <div class="h-full w-3/5 bg-success transition-[width] duration-100 ease-linear"></div>
            </div>
        </div>
        HTML;

    $solidCode = <<<'BLADE'
        <x-ui.toast-container position="top-center" variant="solid" />

        <x-ui.button color="warning" @click="$store.toast.warning('Sua sessão expira em 5 minutos.', { position: 'top-center' })">
            Disparar (variant solid)
        </x-ui.button>
        BLADE;

    $solidHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border-warning bg-warning text-warning-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-black/10 text-base text-current">
                    <i class="bi bi-exclamation-triangle-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="m-0 text-sm leading-relaxed opacity-90">Sua sessão expira em 5 minutos.</p>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-black/10 hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div class="h-0.5 w-full bg-black/10">
                <div class="h-full w-3/5 bg-current opacity-50 transition-[width] duration-100 ease-linear"></div>
            </div>
        </div>
        HTML;

    $outlineCode = <<<'BLADE'
        <x-ui.toast-container position="bottom-center" variant="outline" />

        <x-ui.button color="info" @click="$store.toast.info('Atualização disponível para instalar.', {
            title: 'Nova versão',
            position: 'bottom-center',
        })">
            Disparar (variant outline)
        </x-ui.button>
        BLADE;

    $outlineHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-info/50 bg-card/95 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-info/15 text-base text-info">
                    <i class="bi bi-info-circle-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="mb-0.5 text-sm font-semibold tracking-tight">Nova versão</p>
                    <p class="m-0 text-sm leading-relaxed opacity-80">Atualização disponível para instalar.</p>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div class="h-0.5 w-full bg-info/15">
                <div class="h-full w-3/5 bg-info transition-[width] duration-100 ease-linear"></div>
            </div>
        </div>
        HTML;

    $actionsCode = <<<'BLADE'
        <x-ui.button @click="$store.toast.show({
            type: 'info',
            title: 'Item removido',
            message: 'O item foi movido para a lixeira.',
            actions: [{ label: 'Desfazer', onClick: function () { console.log('desfeito') } }],
        })">
            Disparar com ação
        </x-ui.button>
        BLADE;

    $actionsHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-info bg-info/5 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-info/15 text-base text-info">
                    <i class="bi bi-info-circle-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="mb-0.5 text-sm font-semibold tracking-tight">Item removido</p>
                    <p class="m-0 text-sm leading-relaxed opacity-80">O item foi movido para a lixeira.</p>
                    <div class="mt-2.5 flex flex-wrap gap-1.5">
                        <button type="button" class="rounded-md bg-info/15 px-2 py-1 text-xs font-semibold text-info transition-colors hover:bg-info/25">Desfazer</button>
                    </div>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div class="h-0.5 w-full bg-info/15">
                <div class="h-full w-3/5 bg-info transition-[width] duration-100 ease-linear"></div>
            </div>
        </div>
        HTML;

    $multiActionsCode = <<<'BLADE'
        <x-ui.button color="warning" @click="$store.toast.warning('Há alterações não salvas neste formulário.', {
            title: 'Sair sem salvar?',
            duration: 0,
            actions: [
                { label: 'Descartar', onClick: function () {} },
                { label: 'Continuar editando', onClick: function () {} },
            ],
        })">
            Disparar com 2 ações
        </x-ui.button>
        BLADE;

    $multiActionsHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-warning bg-warning/5 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-warning/15 text-base text-warning">
                    <i class="bi bi-exclamation-triangle-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="mb-0.5 text-sm font-semibold tracking-tight">Sair sem salvar?</p>
                    <p class="m-0 text-sm leading-relaxed opacity-80">Há alterações não salvas neste formulário.</p>
                    <div class="mt-2.5 flex flex-wrap gap-1.5">
                        <button type="button" class="rounded-md bg-warning/15 px-2 py-1 text-xs font-semibold text-warning transition-colors hover:bg-warning/25">Descartar</button>
                        <button type="button" class="rounded-md bg-warning/15 px-2 py-1 text-xs font-semibold text-warning transition-colors hover:bg-warning/25">Continuar editando</button>
                    </div>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;

    $persistentCode = <<<'BLADE'
        <x-ui.button color="danger" @click="$store.toast.danger('Falha crítica — ação manual necessária.', { duration: 0 })">
            Disparar persistente
        </x-ui.button>
        BLADE;

    $persistentHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-danger bg-danger/5 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-danger/15 text-base text-danger">
                    <i class="bi bi-x-circle-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="m-0 text-sm leading-relaxed opacity-90">Falha crítica — ação manual necessária.</p>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;

    $durationCode = <<<'BLADE'
        <x-ui.button @click="$store.toast.info('Some em 2 segundos.', { duration: 2000 })">
            Duration 2s
        </x-ui.button>
        BLADE;

    $durationHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-info bg-info/5 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-info/15 text-base text-info">
                    <i class="bi bi-info-circle-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="m-0 text-sm leading-relaxed opacity-90">Some em 2 segundos.</p>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div class="h-0.5 w-full bg-info/15">
                <div class="h-full w-2/5 bg-info transition-[width] duration-100 ease-linear"></div>
            </div>
        </div>
        HTML;

    $iconCode = <<<'BLADE'
        <x-ui.button @click="$store.toast.show({
            type: 'success',
            icon: 'bi-cloud-check-fill',
            title: 'Backup concluído',
            message: 'Todos os arquivos foram sincronizados.',
        })">
            Ícone customizado
        </x-ui.button>
        BLADE;

    $iconHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-success bg-success/5 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-success/15 text-base text-success">
                    <i class="bi bi-cloud-check-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="mb-0.5 text-sm font-semibold tracking-tight">Backup concluído</p>
                    <p class="m-0 text-sm leading-relaxed opacity-80">Todos os arquivos foram sincronizados.</p>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div class="h-0.5 w-full bg-success/15">
                <div class="h-full w-3/5 bg-success transition-[width] duration-100 ease-linear"></div>
            </div>
        </div>
        HTML;

    $positionsCode = <<<'BLADE'
        <x-ui.toast-container position="bottom-left" />

        <x-ui.button @click="$store.toast.info('Canto inferior esquerdo.', { position: 'bottom-left' })">
            Disparar
        </x-ui.button>
        BLADE;

    $positionsHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-info bg-info/5 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-info/15 text-base text-info">
                    <i class="bi bi-info-circle-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="m-0 text-sm leading-relaxed opacity-90">Canto inferior esquerdo.</p>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div class="h-0.5 w-full bg-info/15">
                <div class="h-full w-3/5 bg-info transition-[width] duration-100 ease-linear"></div>
            </div>
        </div>
        HTML;

    $sizeCode = <<<'BLADE'
        <x-ui.toast-container position="bottom-right" size="lg" :max="3" />

        <x-ui.button @click="$store.toast.success('Toast grande com limite de 3 na pilha.', {
            title: 'Size lg',
            position: 'bottom-right',
        })">
            Disparar (lg + max 3)
        </x-ui.button>
        BLADE;

    $sizeHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-md overflow-hidden rounded-xl border border-border border-l-[3px] border-l-success bg-success/5 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3.5 p-4">
                <span class="inline-flex size-10 shrink-0 items-center justify-center rounded-lg bg-success/15 text-lg text-success">
                    <i class="bi bi-check-circle-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="mb-0.5 text-base font-semibold tracking-tight">Size lg</p>
                    <p class="m-0 text-sm leading-relaxed opacity-80">Toast grande com limite de 3 na pilha.</p>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div class="h-0.5 w-full bg-success/15">
                <div class="h-full w-3/5 bg-success transition-[width] duration-100 ease-linear"></div>
            </div>
        </div>
        HTML;

    $serverCode = <<<'BLADE'
        {{-- No componente Livewire --}}
        public function notifyFromServer(): void
        {
            $this->dispatch('toast', type: 'success', message: 'Veio do servidor!');
        }

        {{-- Na view --}}
        <x-ui.button wire:click="notifyFromServer">Disparar do servidor</x-ui.button>
        BLADE;

    $serverHtml = <<<'HTML'
        <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-xl border border-border border-l-[3px] border-l-success bg-success/5 text-foreground shadow-lg backdrop-blur-sm">
            <div class="flex items-start gap-3 p-3.5">
                <span class="inline-flex size-8 shrink-0 items-center justify-center rounded-lg bg-success/15 text-base text-success">
                    <i class="bi bi-check-circle-fill leading-none" aria-hidden="true"></i>
                </span>
                <div class="min-w-0 flex-1 pt-0.5">
                    <p class="m-0 text-sm leading-relaxed opacity-90">Veio do servidor!</p>
                </div>
                <button type="button" class="inline-flex size-7 shrink-0 items-center justify-center rounded-md opacity-60 transition-colors hover:bg-muted hover:opacity-100" aria-label="Fechar notificação">
                    <i class="bi bi-x-lg text-xs leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div class="h-0.5 w-full bg-success/15">
                <div class="h-full w-3/5 bg-success transition-[width] duration-100 ease-linear"></div>
            </div>
        </div>
        HTML;

    $clearCode = <<<'BLADE'
        <x-ui.button color="secondary" variant="outline" @click="$store.toast.clear()">
            Limpar todos
        </x-ui.button>
        BLADE;

    $clearHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-secondary" onclick="/* limpar todos os toasts */">
            Limpar todos
        </button>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.toast-container&gt;</code> já está no layout (<code>top-right</code>, soft).
            Dispare com <code>$store.toast.success()</code>/<code>danger()</code>/<code>warning()</code>/<code>info()</code>
            ou <code>$this->dispatch('toast', ...)</code>. Variantes
            <code>soft</code>, <code>solid</code> e <code>outline</code>; tamanhos; ações; duração.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                <code>$store.toast.show({ message })</code> — some após 5s (padrão).
            </x-slot:description>
            <x-ui.button @click="$store.toast.show({ message: 'Notificação padrão.' })">
                Disparar
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Tipos" :code="$typesCode" :html="$typesHtml">
            <x-slot:description>
                Atalhos com ícone em chip colorido, faixa lateral e barra de progresso no tom do tipo.
            </x-slot:description>
            <div class="flex flex-wrap gap-2">
                <x-ui.button color="success" @click="$store.toast.success('Operação concluída com sucesso.')">Sucesso</x-ui.button>
                <x-ui.button color="danger" @click="$store.toast.danger('Não foi possível salvar as alterações.')">Erro</x-ui.button>
                <x-ui.button color="warning" @click="$store.toast.warning('Verifique os campos antes de continuar.')">Aviso</x-ui.button>
                <x-ui.button color="info" @click="$store.toast.info('Nova versão disponível.')">Info</x-ui.button>
            </div>
        </x-ui.example>

        <x-ui.example title="Com título" :code="$titleCode" :html="$titleHtml">
            <x-slot:description>
                <code>title</code> — linha em negrito acima da mensagem.
            </x-slot:description>
            <x-ui.button color="success" @click="$store.toast.success('O pedido #4821 foi processado.', { title: 'Pedido confirmado' })">
                Disparar com título
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Ícone customizado" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                <code>icon</code> sobrescreve o ícone padrão do tipo (<code>null</code> remove).
            </x-slot:description>
            <x-ui.button @click="$store.toast.show({
                type: 'success',
                icon: 'bi-cloud-check-fill',
                title: 'Backup concluído',
                message: 'Todos os arquivos foram sincronizados.',
            })">
                Ícone customizado
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Variante solid" :code="$solidCode" :html="$solidHtml">
            <x-slot:description>
                <code>variant="solid"</code> no container preenche o toast inteiro com a cor do tipo.
            </x-slot:description>
            <x-ui.toast-container position="top-center" variant="solid" />
            <x-ui.button color="warning" @click="$store.toast.warning('Sua sessão expira em 5 minutos.', { position: 'top-center' })">
                Disparar (variant solid)
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Variante outline" :code="$outlineCode" :html="$outlineHtml">
            <x-slot:description>
                <code>variant="outline"</code> — superfície de card com borda tingida na cor do tipo.
            </x-slot:description>
            <x-ui.toast-container position="bottom-center" variant="outline" />
            <x-ui.button color="info" @click="$store.toast.info('Atualização disponível para instalar.', {
                title: 'Nova versão',
                position: 'bottom-center',
            })">
                Disparar (variant outline)
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Com ação" :code="$actionsCode" :html="$actionsHtml">
            <x-slot:description>
                <code>actions</code> aceita <code>{ label, onClick }</code> — o clique executa o callback e fecha o toast.
            </x-slot:description>
            <x-ui.button @click="$store.toast.show({
                type: 'info',
                title: 'Item removido',
                message: 'O item foi movido para a lixeira.',
                actions: [{ label: 'Desfazer', onClick: function () { console.log('desfeito') } }],
            })">
                Disparar com ação
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Com 2 ações" :code="$multiActionsCode" :html="$multiActionsHtml">
            <x-slot:description>
                Vários itens em <code>actions</code> — combine com <code>duration: 0</code> para exigir uma escolha.
            </x-slot:description>
            <x-ui.button color="warning" @click="$store.toast.warning('Há alterações não salvas neste formulário.', {
                title: 'Sair sem salvar?',
                duration: 0,
                actions: [
                    { label: 'Descartar', onClick: function () {} },
                    { label: 'Continuar editando', onClick: function () {} },
                ],
            })">
                Disparar com 2 ações
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Persistente" :code="$persistentCode" :html="$persistentHtml">
            <x-slot:description>
                <code>duration: 0</code> — não some sozinho, só fecha pelo "x" (sem barra de progresso).
            </x-slot:description>
            <x-ui.button color="danger" @click="$store.toast.danger('Falha crítica — ação manual necessária.', { duration: 0 })">
                Disparar persistente
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Duração customizada" :code="$durationCode" :html="$durationHtml">
            <x-slot:description>
                <code>duration</code> em milissegundos — o padrão é <code>5000</code>.
            </x-slot:description>
            <x-ui.button @click="$store.toast.info('Some em 2 segundos.', { duration: 2000 })">
                Duration 2s
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Outra posição" :code="$positionsCode" :html="$positionsHtml">
            <x-slot:description>
                Cada <code>&lt;x-ui.toast-container&gt;</code> só renderiza toasts da sua própria <code>position</code>.
            </x-slot:description>
            <x-ui.toast-container position="bottom-left" />
            <x-ui.button @click="$store.toast.info('Canto inferior esquerdo.', { position: 'bottom-left' })">
                Disparar
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Tamanho + limite da pilha" :code="$sizeCode" :html="$sizeHtml">
            <x-slot:description>
                <code>size="lg"</code> e <code>:max="3"</code> — mantém só os 3 mais recentes visíveis nesta posição.
            </x-slot:description>
            <x-ui.toast-container position="bottom-right" size="lg" :max="3" />
            <x-ui.button @click="$store.toast.success('Toast grande com limite de 3 na pilha.', {
                title: 'Size lg',
                position: 'bottom-right',
            })">
                Disparar (lg + max 3)
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Disparado pelo servidor" :code="$serverCode" :html="$serverHtml">
            <x-slot:description>
                Uma ação Livewire chama <code>$this->dispatch('toast', ...)</code> — o navegador escuta o evento
                <code>toast</code> e empilha na store.
            </x-slot:description>
            <x-ui.button wire:click="notifyFromServer">Disparar do servidor</x-ui.button>
        </x-ui.example>

        <x-ui.example title="Limpar tudo" :code="$clearCode" :html="$clearHtml">
            <x-slot:description>
                <code>$store.toast.clear()</code> remove todos os toasts ativos, de qualquer posição.
            </x-slot:description>
            <x-ui.button color="secondary" variant="outline" @click="$store.toast.clear()">
                Limpar todos
            </x-ui.button>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api component="ui/toast-container/toast-container" title="x-ui.toast-container" />
</x-ui.docs>
