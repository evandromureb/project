<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $colorsCode = <<<'BLADE'
        <x-ui.button color="primary">Primary</x-ui.button>
        <x-ui.button color="secondary">Secondary</x-ui.button>
        <x-ui.button color="success">Success</x-ui.button>
        <x-ui.button color="warning">Warning</x-ui.button>
        <x-ui.button color="danger">Danger</x-ui.button>
        <x-ui.button color="info">Info</x-ui.button>
        BLADE;

    $colorsHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-secondary">Secondary</button>
        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-warning">Warning</button>
        <button type="button" class="btn btn-danger">Danger</button>
        <button type="button" class="btn btn-info">Info</button>
        HTML;

    $softCode = <<<'BLADE'
        <x-ui.button color="primary" variant="soft">Primary</x-ui.button>
        <x-ui.button color="secondary" variant="soft">Secondary</x-ui.button>
        <x-ui.button color="success" variant="soft">Success</x-ui.button>
        <x-ui.button color="warning" variant="soft">Warning</x-ui.button>
        <x-ui.button color="danger" variant="soft">Danger</x-ui.button>
        <x-ui.button color="info" variant="soft">Info</x-ui.button>
        BLADE;

    $softHtml = <<<'HTML'
        <button type="button" class="btn btn-soft-primary">Primary</button>
        <button type="button" class="btn btn-soft-secondary">Secondary</button>
        <button type="button" class="btn btn-soft-success">Success</button>
        <button type="button" class="btn btn-soft-warning">Warning</button>
        <button type="button" class="btn btn-soft-danger">Danger</button>
        <button type="button" class="btn btn-soft-info">Info</button>
        HTML;

    $outlineCode = <<<'BLADE'
        <x-ui.button color="primary" variant="outline">Primary</x-ui.button>
        <x-ui.button color="secondary" variant="outline">Secondary</x-ui.button>
        <x-ui.button color="success" variant="outline">Success</x-ui.button>
        <x-ui.button color="warning" variant="outline">Warning</x-ui.button>
        <x-ui.button color="danger" variant="outline">Danger</x-ui.button>
        <x-ui.button color="info" variant="outline">Info</x-ui.button>
        BLADE;

    $outlineHtml = <<<'HTML'
        <button type="button" class="btn btn-outline-primary">Primary</button>
        <button type="button" class="btn btn-outline-secondary">Secondary</button>
        <button type="button" class="btn btn-outline-success">Success</button>
        <button type="button" class="btn btn-outline-warning">Warning</button>
        <button type="button" class="btn btn-outline-danger">Danger</button>
        <button type="button" class="btn btn-outline-info">Info</button>
        HTML;

    $ghostCode = <<<'BLADE'
        <x-ui.button color="primary" variant="ghost">Primary</x-ui.button>
        <x-ui.button color="secondary" variant="ghost">Secondary</x-ui.button>
        <x-ui.button color="success" variant="ghost">Success</x-ui.button>
        <x-ui.button color="danger" variant="ghost">Danger</x-ui.button>
        BLADE;

    $ghostHtml = <<<'HTML'
        <button type="button" class="btn btn-ghost-primary">Primary</button>
        <button type="button" class="btn btn-ghost-secondary">Secondary</button>
        <button type="button" class="btn btn-ghost-success">Success</button>
        <button type="button" class="btn btn-ghost-danger">Danger</button>
        HTML;

    $linkCode = <<<'BLADE'
        <x-ui.button color="primary" variant="link">Saiba mais</x-ui.button>
        <x-ui.button color="secondary" variant="link" icon="bi-box-arrow-up-right" iconPosition="end">
            Abrir docs
        </x-ui.button>
        <x-ui.button color="danger" variant="link">Remover item</x-ui.button>
        BLADE;

    $linkHtml = <<<'HTML'
        <button type="button" class="btn btn-link-primary">Saiba mais</button>
        <button type="button" class="btn btn-link-secondary">
            <span>Abrir docs</span>
            <i class="bi bi-box-arrow-up-right shrink-0 leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-link-danger">Remover item</button>
        HTML;

    $sizesCode = <<<'BLADE'
        <x-ui.button color="primary" size="sm" icon="bi-plus-lg">Pequeno</x-ui.button>
        <x-ui.button color="primary" size="md" icon="bi-plus-lg">Médio</x-ui.button>
        <x-ui.button color="primary" size="lg" icon="bi-plus-lg">Grande</x-ui.button>
        BLADE;

    $sizesHtml = <<<'HTML'
        <button type="button" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i>
            <span>Pequeno</span>
        </button>
        <button type="button" class="btn btn-primary">
            <i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i>
            <span>Médio</span>
        </button>
        <button type="button" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i>
            <span>Grande</span>
        </button>
        HTML;

    $iconCode = <<<'BLADE'
        <x-ui.button color="primary" icon="bi-plus-lg">Novo registro</x-ui.button>
        <x-ui.button color="success" icon="bi-check-lg" variant="soft">Aprovar</x-ui.button>
        <x-ui.button color="warning" icon="bi-download" variant="outline">Exportar</x-ui.button>
        <x-ui.button color="secondary" icon="bi-arrow-right" iconPosition="end" variant="ghost">
            Continuar
        </x-ui.button>
        BLADE;

    $iconHtml = <<<'HTML'
        <button type="button" class="btn btn-primary">
            <i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i>
            <span>Novo registro</span>
        </button>
        <button type="button" class="btn btn-soft-success">
            <i class="bi bi-check-lg shrink-0 leading-none" aria-hidden="true"></i>
            <span>Aprovar</span>
        </button>
        <button type="button" class="btn btn-outline-warning">
            <i class="bi bi-download shrink-0 leading-none" aria-hidden="true"></i>
            <span>Exportar</span>
        </button>
        <button type="button" class="btn btn-ghost-secondary">
            <span>Continuar</span>
            <i class="bi bi-arrow-right shrink-0 leading-none" aria-hidden="true"></i>
        </button>
        HTML;

    $iconOnlyCode = <<<'BLADE'
        <x-ui.button color="primary" icon="bi-pencil-fill" iconOnly aria-label="Editar" />
        <x-ui.button color="success" icon="bi-check-lg" iconOnly variant="soft" aria-label="Confirmar" />
        <x-ui.button color="danger" icon="bi-trash-fill" iconOnly variant="outline" aria-label="Excluir" />
        <x-ui.button color="secondary" icon="bi-three-dots" iconOnly variant="ghost" size="sm" aria-label="Mais opções" />
        <x-ui.button color="info" icon="bi-funnel" iconOnly variant="soft" size="lg" rounded aria-label="Filtrar" />
        BLADE;

    $iconOnlyHtml = <<<'HTML'
        <button type="button" class="btn btn-primary size-10 p-0" aria-label="Editar">
            <i class="bi bi-pencil-fill shrink-0 leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-soft-success size-10 p-0" aria-label="Confirmar">
            <i class="bi bi-check-lg shrink-0 leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-outline-danger size-10 p-0" aria-label="Excluir">
            <i class="bi bi-trash-fill shrink-0 leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-ghost-secondary btn-sm size-8 p-0" aria-label="Mais opções">
            <i class="bi bi-three-dots shrink-0 leading-none" aria-hidden="true"></i>
        </button>
        <button type="button" class="btn btn-soft-info btn-lg btn-rounded size-12 p-0" aria-label="Filtrar">
            <i class="bi bi-funnel shrink-0 leading-none" aria-hidden="true"></i>
        </button>
        HTML;

    $loadingCode = <<<'BLADE'
        <x-ui.button color="primary" loading>Salvando...</x-ui.button>
        <x-ui.button color="secondary" variant="soft" loading>Enviando</x-ui.button>
        <x-ui.button color="success" variant="outline" loading>Processando</x-ui.button>
        <x-ui.button color="primary" loading iconOnly aria-label="Carregando" />
        BLADE;

    $loadingHtml = <<<'HTML'
        <button type="button" class="btn btn-primary" disabled>
            <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent" aria-hidden="true"></span>
            <span>Salvando...</span>
        </button>
        <button type="button" class="btn btn-soft-secondary" disabled>
            <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent" aria-hidden="true"></span>
            <span>Enviando</span>
        </button>
        <button type="button" class="btn btn-outline-success" disabled>
            <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent" aria-hidden="true"></span>
            <span>Processando</span>
        </button>
        <button type="button" class="btn btn-primary size-10 p-0" disabled aria-label="Carregando">
            <span class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent" aria-hidden="true"></span>
        </button>
        HTML;

    $disabledCode = <<<'BLADE'
        <x-ui.button color="primary" disabled>Solid</x-ui.button>
        <x-ui.button color="primary" variant="soft" disabled>Soft</x-ui.button>
        <x-ui.button color="danger" variant="outline" disabled>Outline</x-ui.button>
        <x-ui.button color="secondary" variant="ghost" disabled>Ghost</x-ui.button>
        BLADE;

    $disabledHtml = <<<'HTML'
        <button type="button" class="btn btn-primary" disabled>Solid</button>
        <button type="button" class="btn btn-soft-primary" disabled>Soft</button>
        <button type="button" class="btn btn-outline-danger" disabled>Outline</button>
        <button type="button" class="btn btn-ghost-secondary" disabled>Ghost</button>
        HTML;

    $shapeCode = <<<'BLADE'
        <x-ui.button color="primary" rounded>Pill solid</x-ui.button>
        <x-ui.button color="success" variant="soft" rounded icon="bi-check-lg">Aprovado</x-ui.button>
        <x-ui.button color="primary" variant="outline" rounded>Pill outline</x-ui.button>
        <x-ui.button color="danger" icon="bi-heart-fill" iconOnly rounded aria-label="Favoritar" />
        BLADE;

    $shapeHtml = <<<'HTML'
        <button type="button" class="btn btn-primary btn-rounded">Pill solid</button>
        <button type="button" class="btn btn-soft-success btn-rounded">
            <i class="bi bi-check-lg shrink-0 leading-none" aria-hidden="true"></i>
            <span>Aprovado</span>
        </button>
        <button type="button" class="btn btn-outline-primary btn-rounded">Pill outline</button>
        <button type="button" class="btn btn-danger btn-rounded size-10 p-0" aria-label="Favoritar">
            <i class="bi bi-heart-fill shrink-0 leading-none" aria-hidden="true"></i>
        </button>
        HTML;

    $actionsCode = <<<'BLADE'
        <x-ui.button color="secondary" variant="ghost">Cancelar</x-ui.button>
        <x-ui.button color="primary" icon="bi-check-lg">Salvar alterações</x-ui.button>
        BLADE;

    $actionsHtml = <<<'HTML'
        <button type="button" class="btn btn-ghost-secondary">Cancelar</button>
        <button type="button" class="btn btn-primary">
            <i class="bi bi-check-lg shrink-0 leading-none" aria-hidden="true"></i>
            <span>Salvar alterações</span>
        </button>
        HTML;

    $toolbarCode = <<<'BLADE'
        <div class="flex flex-wrap items-center gap-1 rounded-md border border-border bg-muted/40 p-1">
            <x-ui.button color="secondary" variant="ghost" size="sm" icon="bi-type-bold" iconOnly aria-label="Negrito" />
            <x-ui.button color="secondary" variant="ghost" size="sm" icon="bi-type-italic" iconOnly aria-label="Itálico" />
            <x-ui.button color="secondary" variant="ghost" size="sm" icon="bi-type-underline" iconOnly aria-label="Sublinhado" />
            <span class="mx-1 h-5 w-px bg-border" aria-hidden="true"></span>
            <x-ui.button color="secondary" variant="ghost" size="sm" icon="bi-link-45deg" iconOnly aria-label="Link" />
            <x-ui.button color="secondary" variant="ghost" size="sm" icon="bi-image" iconOnly aria-label="Imagem" />
        </div>
        BLADE;

    $toolbarHtml = <<<'HTML'
        <div class="flex flex-wrap items-center gap-1 rounded-md border border-border bg-muted/40 p-1">
            <button type="button" class="btn btn-ghost-secondary btn-sm size-8 p-0" aria-label="Negrito">
                <i class="bi bi-type-bold shrink-0 leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-ghost-secondary btn-sm size-8 p-0" aria-label="Itálico">
                <i class="bi bi-type-italic shrink-0 leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-ghost-secondary btn-sm size-8 p-0" aria-label="Sublinhado">
                <i class="bi bi-type-underline shrink-0 leading-none" aria-hidden="true"></i>
            </button>
            <span class="mx-1 h-5 w-px bg-border" aria-hidden="true"></span>
            <button type="button" class="btn btn-ghost-secondary btn-sm size-8 p-0" aria-label="Link">
                <i class="bi bi-link-45deg shrink-0 leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="btn btn-ghost-secondary btn-sm size-8 p-0" aria-label="Imagem">
                <i class="bi bi-image shrink-0 leading-none" aria-hidden="true"></i>
            </button>
        </div>
        HTML;

    $blockCode = <<<'BLADE'
        <div class="flex w-full max-w-sm flex-col gap-2">
            <x-ui.button color="primary" block icon="bi-box-arrow-in-right">Entrar</x-ui.button>
            <x-ui.button color="secondary" variant="outline" block>Criar conta</x-ui.button>
            <x-ui.button color="secondary" variant="link" block>Esqueci minha senha</x-ui.button>
        </div>
        BLADE;

    $blockHtml = <<<'HTML'
        <div class="flex w-full max-w-sm flex-col gap-2">
            <button type="button" class="btn btn-primary w-full">
                <i class="bi bi-box-arrow-in-right shrink-0 leading-none" aria-hidden="true"></i>
                <span>Entrar</span>
            </button>
            <button type="button" class="btn btn-outline-secondary w-full">Criar conta</button>
            <button type="button" class="btn btn-link-secondary w-full">Esqueci minha senha</button>
        </div>
        HTML;

    $asLinkCode = <<<'BLADE'
        <x-ui.button color="primary" href="{{ route('dashboard') }}" icon="bi-house">
            Ir para o dashboard
        </x-ui.button>
        <x-ui.button color="secondary" variant="outline" href="{{ route('dashboard') }}" icon="bi-arrow-right" iconPosition="end">
            Abrir painel
        </x-ui.button>
        BLADE;
    $asLinkHtml = <<<'HTML'
        <a href="/dashboard" class="btn btn-primary">
            <i class="bi bi-house shrink-0 leading-none" aria-hidden="true"></i>
            <span>Ir para o dashboard</span>
        </a>
        <a href="/dashboard" class="btn btn-outline-secondary">
            <span>Abrir painel</span>
            <i class="bi bi-arrow-right shrink-0 leading-none" aria-hidden="true"></i>
        </a>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-ui.button&gt;</code> renderiza um
            <code>&lt;button&gt;</code> (ou <code>&lt;a&gt;</code> com <code>href</code>),
            com cores do tema e variantes <code>solid</code>, <code>soft</code>,
            <code>outline</code>, <code>ghost</code> e <code>link</code>. Também cobre
            tamanhos, ícones, pill, loading, disabled e largura total.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Cores sólidas" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Use <code>color</code> com <code>variant="solid"</code> (padrão) para o botão de ação principal.
            </x-slot:description>
            <x-ui.button color="primary">Primary</x-ui.button>
            <x-ui.button color="secondary">Secondary</x-ui.button>
            <x-ui.button color="success">Success</x-ui.button>
            <x-ui.button color="warning">Warning</x-ui.button>
            <x-ui.button color="danger">Danger</x-ui.button>
            <x-ui.button color="info">Info</x-ui.button>
        </x-ui.example>

        <x-ui.example title="Soft" :code="$softCode" :html="$softHtml">
            <x-slot:description>
                <code>variant="soft"</code> — fundo suave, bom para ações secundárias sem competir com o CTA.
            </x-slot:description>
            <x-ui.button color="primary" variant="soft">Primary</x-ui.button>
            <x-ui.button color="secondary" variant="soft">Secondary</x-ui.button>
            <x-ui.button color="success" variant="soft">Success</x-ui.button>
            <x-ui.button color="warning" variant="soft">Warning</x-ui.button>
            <x-ui.button color="danger" variant="soft">Danger</x-ui.button>
            <x-ui.button color="info" variant="soft">Info</x-ui.button>
        </x-ui.example>

        <x-ui.example title="Outline" :code="$outlineCode" :html="$outlineHtml">
            <x-slot:description>
                <code>variant="outline"</code> — borda colorida; no hover preenche com a cor sólida.
            </x-slot:description>
            <x-ui.button color="primary" variant="outline">Primary</x-ui.button>
            <x-ui.button color="secondary" variant="outline">Secondary</x-ui.button>
            <x-ui.button color="success" variant="outline">Success</x-ui.button>
            <x-ui.button color="warning" variant="outline">Warning</x-ui.button>
            <x-ui.button color="danger" variant="outline">Danger</x-ui.button>
            <x-ui.button color="info" variant="outline">Info</x-ui.button>
        </x-ui.example>

        <x-ui.example title="Ghost" :code="$ghostCode" :html="$ghostHtml">
            <x-slot:description>
                <code>variant="ghost"</code> — transparente até o hover; ideal para toolbars e dismiss.
            </x-slot:description>
            <x-ui.button color="primary" variant="ghost">Primary</x-ui.button>
            <x-ui.button color="secondary" variant="ghost">Secondary</x-ui.button>
            <x-ui.button color="success" variant="ghost">Success</x-ui.button>
            <x-ui.button color="danger" variant="ghost">Danger</x-ui.button>
        </x-ui.example>

        <x-ui.example title="Link" :code="$linkCode" :html="$linkHtml">
            <x-slot:description>
                <code>variant="link"</code> — aparência de texto com underline no hover.
            </x-slot:description>
            <x-ui.button color="primary" variant="link">Saiba mais</x-ui.button>
            <x-ui.button color="secondary" variant="link" icon="bi-box-arrow-up-right" iconPosition="end">
                Abrir docs
            </x-ui.button>
            <x-ui.button color="danger" variant="link">Remover item</x-ui.button>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size="sm"</code>, <code>md</code> (padrão) ou <code>lg</code>.
            </x-slot:description>
            <x-ui.button color="primary" size="sm" icon="bi-plus-lg">Pequeno</x-ui.button>
            <x-ui.button color="primary" size="md" icon="bi-plus-lg">Médio</x-ui.button>
            <x-ui.button color="primary" size="lg" icon="bi-plus-lg">Grande</x-ui.button>
        </x-ui.example>

        <x-ui.example title="Com ícone" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                Prop <code>icon</code> (Bootstrap Icons); <code>iconPosition="end"</code> coloca à direita.
            </x-slot:description>
            <x-ui.button color="primary" icon="bi-plus-lg">Novo registro</x-ui.button>
            <x-ui.button color="success" icon="bi-check-lg" variant="soft">Aprovar</x-ui.button>
            <x-ui.button color="warning" icon="bi-download" variant="outline">Exportar</x-ui.button>
            <x-ui.button color="secondary" icon="bi-arrow-right" iconPosition="end" variant="ghost">
                Continuar
            </x-ui.button>
        </x-ui.example>

        <x-ui.example title="Somente ícone" :code="$iconOnlyCode" :html="$iconOnlyHtml">
            <x-slot:description>
                <code>iconOnly</code> + <code>aria-label</code> — quadrado (ou pill com <code>rounded</code>).
            </x-slot:description>
            <x-ui.button color="primary" icon="bi-pencil-fill" iconOnly aria-label="Editar" />
            <x-ui.button color="success" icon="bi-check-lg" iconOnly variant="soft" aria-label="Confirmar" />
            <x-ui.button color="danger" icon="bi-trash-fill" iconOnly variant="outline" aria-label="Excluir" />
            <x-ui.button color="secondary" icon="bi-three-dots" iconOnly variant="ghost" size="sm" aria-label="Mais opções" />
            <x-ui.button color="info" icon="bi-funnel" iconOnly variant="soft" size="lg" rounded aria-label="Filtrar" />
        </x-ui.example>

        <x-ui.example title="Carregando" :code="$loadingCode" :html="$loadingHtml">
            <x-slot:description>
                <code>loading</code> troca o ícone por um spinner e desabilita a interação.
            </x-slot:description>
            <x-ui.button color="primary" loading>Salvando...</x-ui.button>
            <x-ui.button color="secondary" variant="soft" loading>Enviando</x-ui.button>
            <x-ui.button color="success" variant="outline" loading>Processando</x-ui.button>
            <x-ui.button color="primary" loading iconOnly aria-label="Carregando" />
        </x-ui.example>

        <x-ui.example title="Desabilitado" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                Prop nativa <code>disabled</code> (ou <code>loading</code>) em todas as variantes.
            </x-slot:description>
            <x-ui.button color="primary" disabled>Solid</x-ui.button>
            <x-ui.button color="primary" variant="soft" disabled>Soft</x-ui.button>
            <x-ui.button color="danger" variant="outline" disabled>Outline</x-ui.button>
            <x-ui.button color="secondary" variant="ghost" disabled>Ghost</x-ui.button>
        </x-ui.example>

        <x-ui.example title="Formato pill" :code="$shapeCode" :html="$shapeHtml">
            <x-slot:description>
                <code>rounded</code> aplica cantos totalmente arredondados.
            </x-slot:description>
            <x-ui.button color="primary" rounded>Pill solid</x-ui.button>
            <x-ui.button color="success" variant="soft" rounded icon="bi-check-lg">Aprovado</x-ui.button>
            <x-ui.button color="primary" variant="outline" rounded>Pill outline</x-ui.button>
            <x-ui.button color="danger" icon="bi-heart-fill" iconOnly rounded aria-label="Favoritar" />
        </x-ui.example>

        <x-ui.example title="Par de ações" :code="$actionsCode" :html="$actionsHtml">
            <x-slot:description>
                Padrão comum de formulário: dismiss ghost + CTA solid.
            </x-slot:description>
            <x-ui.button color="secondary" variant="ghost">Cancelar</x-ui.button>
            <x-ui.button color="primary" icon="bi-check-lg">Salvar alterações</x-ui.button>
        </x-ui.example>

        <x-ui.example title="Toolbar" :code="$toolbarCode" :html="$toolbarHtml">
            <x-slot:description>
                Botões <code>ghost</code> + <code>iconOnly</code> + <code>size="sm"</code> para barras de ferramentas.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-1 rounded-md border border-border bg-muted/40 p-1">
                <x-ui.button color="secondary" variant="ghost" size="sm" icon="bi-type-bold" iconOnly aria-label="Negrito" />
                <x-ui.button color="secondary" variant="ghost" size="sm" icon="bi-type-italic" iconOnly aria-label="Itálico" />
                <x-ui.button color="secondary" variant="ghost" size="sm" icon="bi-type-underline" iconOnly aria-label="Sublinhado" />
                <span class="mx-1 h-5 w-px bg-border" aria-hidden="true"></span>
                <x-ui.button color="secondary" variant="ghost" size="sm" icon="bi-link-45deg" iconOnly aria-label="Link" />
                <x-ui.button color="secondary" variant="ghost" size="sm" icon="bi-image" iconOnly aria-label="Imagem" />
            </div>
        </x-ui.example>

        <x-ui.example title="Largura total" :code="$blockCode" :html="$blockHtml">
            <x-slot:description>
                <code>block</code> ocupa 100% da largura — útil em telas de auth e drawers.
            </x-slot:description>
            <div class="flex w-full max-w-sm flex-col gap-2">
                <x-ui.button color="primary" block icon="bi-box-arrow-in-right">Entrar</x-ui.button>
                <x-ui.button color="secondary" variant="outline" block>Criar conta</x-ui.button>
                <x-ui.button color="secondary" variant="link" block>Esqueci minha senha</x-ui.button>
            </div>
        </x-ui.example>

        <x-ui.example title="Como link" :code="$asLinkCode" :html="$asLinkHtml">
            <x-slot:description>
                Com <code>href</code>, o componente renderiza um <code>&lt;a&gt;</code> com o mesmo visual de botão.
            </x-slot:description>
            <x-ui.button color="primary" href="{{ route('dashboard') }}" icon="bi-house">
                Ir para o dashboard
            </x-ui.button>
            <x-ui.button color="secondary" variant="outline" href="{{ route('dashboard') }}" icon="bi-arrow-right" iconPosition="end">
                Abrir painel
            </x-ui.button>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="button" />
</x-ui.docs>
