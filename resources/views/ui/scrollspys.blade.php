<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    // Heredocs com fechamento na coluna 0 — evita ParseError de indentação
    // flexível do PHP quando o Livewire extrai a view SFC.
    $basicCode = <<<'BLADE'
<x-ui.scrollspy default="intro" height="20rem">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="intro" icon="bi-house">Introdução</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="features" icon="bi-stars">Recursos</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="pricing" icon="bi-tag">Preços</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="faq" icon="bi-question-circle">FAQ</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>

    <x-ui.scrollspy.scrollspy-section name="intro" title="Introdução" class="pb-8">
        <p class="mb-0 text-sm text-muted-foreground">
            O scrollspy destaca o item da navegação correspondente à seção visível.
            Role o painel ao lado para ver o destaque mudar.
        </p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="features" title="Recursos" class="pb-8">
        <p class="mb-0 text-sm text-muted-foreground">
            IntersectionObserver, scroll suave, variantes de nav, cores, itens aninhados e sync de hash.
        </p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="pricing" title="Preços" class="pb-8">
        <p class="mb-0 text-sm text-muted-foreground">
            Planos mensais e anuais com destaque automático conforme a leitura.
        </p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="faq" title="FAQ" class="pb-8">
        <p class="mb-0 text-sm text-muted-foreground">
            Perguntas frequentes sobre instalação, acessibilidade e customização.
        </p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $pillsCode = <<<'BLADE'
<x-ui.scrollspy default="p-overview" variant="pills" color="primary" height="18rem">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="p-overview">Visão geral</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="p-setup">Setup</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="p-api">API</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="p-overview" title="Visão geral" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Variante pills — item ativo com fundo sólido.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="p-setup" title="Setup" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Instale e importe o componente na página.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="p-api" title="API" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Props, slots e eventos documentados abaixo.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $softCode = <<<'BLADE'
<x-ui.scrollspy default="s-start" variant="soft" color="info" height="18rem">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="s-start" icon="bi-play-circle">Começar</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="s-guide" icon="bi-book">Guia</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="s-tips" icon="bi-lightbulb">Dicas</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="s-start" title="Começar" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Soft — destaque suave sem competir com o conteúdo.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="s-guide" title="Guia" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Passo a passo de uso em layouts de documentação.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="s-tips" title="Dicas" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Prefira root="self" em demos embutidas e root="window" em páginas inteiras.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $underlineCode = <<<'BLADE'
<x-ui.scrollspy default="u-one" variant="underline" color="success" height="18rem">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="u-one">Seção um</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="u-two">Seção dois</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="u-three">Seção três</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="u-one" title="Seção um" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Underline vertical — borda à esquerda no item ativo.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="u-two" title="Seção dois" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Ideal para sumários de documentação longos.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="u-three" title="Seção três" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Combine com sticky e offset do header fixo.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $boxedCode = <<<'BLADE'
<x-ui.scrollspy default="b-a" variant="boxed" color="warning" height="18rem">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="b-a">Alpha</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="b-b">Beta</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="b-c">Gamma</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="b-a" title="Alpha" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Boxed — item ativo flutua sobre o fundo muted.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="b-b" title="Beta" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Boa opção quando a nav precisa de contorno visual próprio.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="b-c" title="Gamma" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Funciona em vertical e horizontal.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $nestedCode = <<<'BLADE'
<x-ui.scrollspy default="n-intro" variant="underline" height="20rem" nav-width="14rem">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="n-intro">Introdução</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="n-auth">Autenticação</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="n-auth-login" nested>Login</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="n-auth-register" nested>Cadastro</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="n-billing">Faturamento</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="n-billing-invoices" nested>Faturas</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="n-intro" title="Introdução" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Itens com nested recebem indentação de subnível.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="n-auth" title="Autenticação" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Fluxos de acesso à conta.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="n-auth-login" title="Login" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">E-mail, senha e recuperação.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="n-auth-register" title="Cadastro" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Criação de conta e confirmação.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="n-billing" title="Faturamento" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Planos e métodos de pagamento.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="n-billing-invoices" title="Faturas" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Histórico e download de PDFs.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $horizontalCode = <<<'BLADE'
<x-ui.scrollspy
    default="h-one"
    :vertical="false"
    variant="pills"
    color="info"
    height="16rem"
>
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="h-one">Um</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="h-two">Dois</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="h-three">Três</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="h-four">Quatro</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="h-one" title="Seção um" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Nav horizontal acima do conteúdo rolável.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="h-two" title="Seção dois" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Útil em landings com âncoras curtas.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="h-three" title="Seção três" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Combine com sticky para fixar a nav no topo.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="h-four" title="Seção quatro" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">O item ativo acompanha a seção em vista.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $endCode = <<<'BLADE'
<x-ui.scrollspy default="e-left" nav-position="end" variant="soft" color="secondary" height="18rem">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="e-left">Conteúdo</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="e-mid">Meio</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="e-right">Final</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="e-left" title="Conteúdo" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">nav-position="end" coloca o sumário à direita.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="e-mid" title="Meio" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Padrão comum em docs com TOC no canto direito.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="e-right" title="Final" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">O layout usa flex-row-reverse internamente.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $badgeCode = <<<'BLADE'
<x-ui.scrollspy default="g-inbox" variant="list" color="danger" height="18rem">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="g-inbox" icon="bi-envelope" badge="12">Caixa de entrada</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="g-sent" icon="bi-send">Enviados</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="g-spam" icon="bi-exclamation-octagon" badge="3">Spam</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="g-inbox" title="Caixa de entrada" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Ícones e badges nos itens da navegação.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="g-sent" title="Enviados" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Histórico de mensagens enviadas.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="g-spam" title="Spam" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">3 mensagens precisam de revisão.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $colorsCode = <<<'BLADE'
<x-ui.scrollspy default="c-primary" variant="pills" color="primary" height="12rem" nav-width="9rem">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="c-primary">Primary</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="c-primary-b">Outra</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="c-primary" title="Primary" class="pb-8">
        <p class="mb-0 text-sm text-muted-foreground">Cor primary.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="c-primary-b" title="Outra" class="pb-8">
        <p class="mb-0 text-sm text-muted-foreground">Segunda seção.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>

<x-ui.scrollspy default="c-success" variant="pills" color="success" height="12rem" nav-width="9rem">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="c-success">Success</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="c-success-b">Outra</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="c-success" title="Success" class="pb-8">
        <p class="mb-0 text-sm text-muted-foreground">Cor success.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="c-success-b" title="Outra" class="pb-8">
        <p class="mb-0 text-sm text-muted-foreground">Segunda seção.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $linkClasses = 'inline-flex items-center gap-2 text-sm font-medium whitespace-nowrap no-underline transition-colors focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary';

    $basicHtml = <<<HTML
<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 12rem;">
        <nav aria-label="Navegação da página" class="flex flex-col overflow-hidden rounded-md border border-border bg-card w-full">
            <a href="#intro" data-scrollspy-target="intro" aria-current="location" class="{$linkClasses} w-full border-b border-border px-3.5 py-2.5 last:border-b-0 z-[1] border-primary bg-primary text-primary-foreground">
                <i class="bi bi-house shrink-0 leading-none" aria-hidden="true"></i>
                <span class="min-w-0 truncate">Introdução</span>
            </a>
            <a href="#features" data-scrollspy-target="features" class="{$linkClasses} w-full border-b border-border px-3.5 py-2.5 last:border-b-0 bg-card text-foreground hover:bg-muted/70">
                <i class="bi bi-stars shrink-0 leading-none" aria-hidden="true"></i>
                <span class="min-w-0 truncate">Recursos</span>
            </a>
            <a href="#pricing" data-scrollspy-target="pricing" class="{$linkClasses} w-full border-b border-border px-3.5 py-2.5 last:border-b-0 bg-card text-foreground hover:bg-muted/70">
                <i class="bi bi-tag shrink-0 leading-none" aria-hidden="true"></i>
                <span class="min-w-0 truncate">Preços</span>
            </a>
            <a href="#faq" data-scrollspy-target="faq" class="{$linkClasses} w-full border-b border-border px-3.5 py-2.5 last:border-b-0 bg-card text-foreground hover:bg-muted/70">
                <i class="bi bi-question-circle shrink-0 leading-none" aria-hidden="true"></i>
                <span class="min-w-0 truncate">FAQ</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 20rem; max-height: 20rem;">
        <section id="intro" data-scrollspy-section="intro" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Introdução</h3>
            <p class="mb-0 text-sm text-muted-foreground">
                O scrollspy destaca o item da navegação correspondente à seção visível.
                Role o painel ao lado para ver o destaque mudar.
            </p>
        </section>
        <section id="features" data-scrollspy-section="features" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Recursos</h3>
            <p class="mb-0 text-sm text-muted-foreground">
                IntersectionObserver, scroll suave, variantes de nav, cores, itens aninhados e sync de hash.
            </p>
        </section>
        <section id="pricing" data-scrollspy-section="pricing" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Preços</h3>
            <p class="mb-0 text-sm text-muted-foreground">
                Planos mensais e anuais com destaque automático conforme a leitura.
            </p>
        </section>
        <section id="faq" data-scrollspy-section="faq" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">FAQ</h3>
            <p class="mb-0 text-sm text-muted-foreground">
                Perguntas frequentes sobre instalação, acessibilidade e customização.
            </p>
        </section>
    </div>
</div>
HTML;

    $pillsHtml = <<<HTML
<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 12rem;">
        <nav aria-label="Navegação da página" class="inline-flex flex-wrap gap-1 w-full">
            <a href="#p-overview" data-scrollspy-target="p-overview" aria-current="location" class="{$linkClasses} rounded-md px-3 py-1.5 bg-primary text-primary-foreground shadow-sm">
                <span class="min-w-0 truncate">Visão geral</span>
            </a>
            <a href="#p-setup" data-scrollspy-target="p-setup" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Setup</span>
            </a>
            <a href="#p-api" data-scrollspy-target="p-api" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">API</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 18rem; max-height: 18rem;">
        <section id="p-overview" data-scrollspy-section="p-overview" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Visão geral</h3>
            <p class="mb-0 text-sm text-muted-foreground">Variante pills — item ativo com fundo sólido.</p>
        </section>
        <section id="p-setup" data-scrollspy-section="p-setup" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Setup</h3>
            <p class="mb-0 text-sm text-muted-foreground">Instale e importe o componente na página.</p>
        </section>
        <section id="p-api" data-scrollspy-section="p-api" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">API</h3>
            <p class="mb-0 text-sm text-muted-foreground">Props, slots e eventos documentados abaixo.</p>
        </section>
    </div>
</div>
HTML;

    $softHtml = <<<HTML
<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 12rem;">
        <nav aria-label="Navegação da página" class="inline-flex flex-wrap gap-1 w-full">
            <a href="#s-start" data-scrollspy-target="s-start" aria-current="location" class="{$linkClasses} rounded-md px-3 py-1.5 bg-info/15 text-info">
                <i class="bi bi-play-circle shrink-0 leading-none" aria-hidden="true"></i>
                <span class="min-w-0 truncate">Começar</span>
            </a>
            <a href="#s-guide" data-scrollspy-target="s-guide" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <i class="bi bi-book shrink-0 leading-none" aria-hidden="true"></i>
                <span class="min-w-0 truncate">Guia</span>
            </a>
            <a href="#s-tips" data-scrollspy-target="s-tips" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <i class="bi bi-lightbulb shrink-0 leading-none" aria-hidden="true"></i>
                <span class="min-w-0 truncate">Dicas</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 18rem; max-height: 18rem;">
        <section id="s-start" data-scrollspy-section="s-start" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Começar</h3>
            <p class="mb-0 text-sm text-muted-foreground">Soft — destaque suave sem competir com o conteúdo.</p>
        </section>
        <section id="s-guide" data-scrollspy-section="s-guide" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Guia</h3>
            <p class="mb-0 text-sm text-muted-foreground">Passo a passo de uso em layouts de documentação.</p>
        </section>
        <section id="s-tips" data-scrollspy-section="s-tips" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Dicas</h3>
            <p class="mb-0 text-sm text-muted-foreground">Prefira root="self" em demos embutidas e root="window" em páginas inteiras.</p>
        </section>
    </div>
</div>
HTML;

    $underlineHtml = <<<HTML
<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 12rem;">
        <nav aria-label="Navegação da página" class="flex flex-col gap-1 border-s border-border ps-3 w-full">
            <a href="#u-one" data-scrollspy-target="u-one" aria-current="location" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 border-success text-success">
                <span class="min-w-0 truncate">Seção um</span>
            </a>
            <a href="#u-two" data-scrollspy-target="u-two" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 text-muted-foreground hover:text-foreground">
                <span class="min-w-0 truncate">Seção dois</span>
            </a>
            <a href="#u-three" data-scrollspy-target="u-three" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 text-muted-foreground hover:text-foreground">
                <span class="min-w-0 truncate">Seção três</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 18rem; max-height: 18rem;">
        <section id="u-one" data-scrollspy-section="u-one" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Seção um</h3>
            <p class="mb-0 text-sm text-muted-foreground">Underline vertical — borda à esquerda no item ativo.</p>
        </section>
        <section id="u-two" data-scrollspy-section="u-two" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Seção dois</h3>
            <p class="mb-0 text-sm text-muted-foreground">Ideal para sumários de documentação longos.</p>
        </section>
        <section id="u-three" data-scrollspy-section="u-three" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Seção três</h3>
            <p class="mb-0 text-sm text-muted-foreground">Combine com sticky e offset do header fixo.</p>
        </section>
    </div>
</div>
HTML;

    $boxedHtml = <<<HTML
<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 12rem;">
        <nav aria-label="Navegação da página" class="flex flex-col gap-1 rounded-md bg-muted p-1 w-full">
            <a href="#b-a" data-scrollspy-target="b-a" aria-current="location" class="{$linkClasses} rounded-md px-3 py-1.5 bg-card text-warning shadow-sm">
                <span class="min-w-0 truncate">Alpha</span>
            </a>
            <a href="#b-b" data-scrollspy-target="b-b" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Beta</span>
            </a>
            <a href="#b-c" data-scrollspy-target="b-c" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Gamma</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 18rem; max-height: 18rem;">
        <section id="b-a" data-scrollspy-section="b-a" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Alpha</h3>
            <p class="mb-0 text-sm text-muted-foreground">Boxed — item ativo flutua sobre o fundo muted.</p>
        </section>
        <section id="b-b" data-scrollspy-section="b-b" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Beta</h3>
            <p class="mb-0 text-sm text-muted-foreground">Boa opção quando a nav precisa de contorno visual próprio.</p>
        </section>
        <section id="b-c" data-scrollspy-section="b-c" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Gamma</h3>
            <p class="mb-0 text-sm text-muted-foreground">Funciona em vertical e horizontal.</p>
        </section>
    </div>
</div>
HTML;

    $nestedHtml = <<<HTML
<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 14rem;">
        <nav aria-label="Navegação da página" class="flex flex-col gap-1 border-s border-border ps-3 w-full">
            <a href="#n-intro" data-scrollspy-target="n-intro" aria-current="location" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 border-primary text-primary">
                <span class="min-w-0 truncate">Introdução</span>
            </a>
            <a href="#n-auth" data-scrollspy-target="n-auth" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 text-muted-foreground hover:text-foreground">
                <span class="min-w-0 truncate">Autenticação</span>
            </a>
            <a href="#n-auth-login" data-scrollspy-target="n-auth-login" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 ps-5 text-[0.8125rem] text-muted-foreground hover:text-foreground">
                <span class="min-w-0 truncate">Login</span>
            </a>
            <a href="#n-auth-register" data-scrollspy-target="n-auth-register" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 ps-5 text-[0.8125rem] text-muted-foreground hover:text-foreground">
                <span class="min-w-0 truncate">Cadastro</span>
            </a>
            <a href="#n-billing" data-scrollspy-target="n-billing" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 text-muted-foreground hover:text-foreground">
                <span class="min-w-0 truncate">Faturamento</span>
            </a>
            <a href="#n-billing-invoices" data-scrollspy-target="n-billing-invoices" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 ps-5 text-[0.8125rem] text-muted-foreground hover:text-foreground">
                <span class="min-w-0 truncate">Faturas</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 20rem; max-height: 20rem;">
        <section id="n-intro" data-scrollspy-section="n-intro" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Introdução</h3>
            <p class="mb-0 text-sm text-muted-foreground">Itens com nested recebem indentação de subnível.</p>
        </section>
        <section id="n-auth" data-scrollspy-section="n-auth" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Autenticação</h3>
            <p class="mb-0 text-sm text-muted-foreground">Fluxos de acesso à conta.</p>
        </section>
        <section id="n-auth-login" data-scrollspy-section="n-auth-login" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Login</h3>
            <p class="mb-0 text-sm text-muted-foreground">E-mail, senha e recuperação.</p>
        </section>
        <section id="n-auth-register" data-scrollspy-section="n-auth-register" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Cadastro</h3>
            <p class="mb-0 text-sm text-muted-foreground">Criação de conta e confirmação.</p>
        </section>
        <section id="n-billing" data-scrollspy-section="n-billing" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Faturamento</h3>
            <p class="mb-0 text-sm text-muted-foreground">Planos e métodos de pagamento.</p>
        </section>
        <section id="n-billing-invoices" data-scrollspy-section="n-billing-invoices" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Faturas</h3>
            <p class="mb-0 text-sm text-muted-foreground">Histórico e download de PDFs.</p>
        </section>
    </div>
</div>
HTML;

    $horizontalHtml = <<<HTML
<div class="flex flex-col gap-4">
    <div class="w-full">
        <nav aria-label="Navegação da página" class="inline-flex flex-wrap gap-1 w-full">
            <a href="#h-one" data-scrollspy-target="h-one" aria-current="location" class="{$linkClasses} rounded-md px-3 py-1.5 bg-info text-info-foreground shadow-sm">
                <span class="min-w-0 truncate">Um</span>
            </a>
            <a href="#h-two" data-scrollspy-target="h-two" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Dois</span>
            </a>
            <a href="#h-three" data-scrollspy-target="h-three" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Três</span>
            </a>
            <a href="#h-four" data-scrollspy-target="h-four" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Quatro</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 16rem; max-height: 16rem;">
        <section id="h-one" data-scrollspy-section="h-one" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Seção um</h3>
            <p class="mb-0 text-sm text-muted-foreground">Nav horizontal acima do conteúdo rolável.</p>
        </section>
        <section id="h-two" data-scrollspy-section="h-two" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Seção dois</h3>
            <p class="mb-0 text-sm text-muted-foreground">Útil em landings com âncoras curtas.</p>
        </section>
        <section id="h-three" data-scrollspy-section="h-three" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Seção três</h3>
            <p class="mb-0 text-sm text-muted-foreground">Combine com sticky para fixar a nav no topo.</p>
        </section>
        <section id="h-four" data-scrollspy-section="h-four" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Seção quatro</h3>
            <p class="mb-0 text-sm text-muted-foreground">O item ativo acompanha a seção em vista.</p>
        </section>
    </div>
</div>
HTML;

    $endHtml = <<<HTML
<div class="flex flex-row-reverse gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 12rem;">
        <nav aria-label="Navegação da página" class="inline-flex flex-wrap gap-1 w-full">
            <a href="#e-left" data-scrollspy-target="e-left" aria-current="location" class="{$linkClasses} rounded-md px-3 py-1.5 bg-secondary/15 text-secondary">
                <span class="min-w-0 truncate">Conteúdo</span>
            </a>
            <a href="#e-mid" data-scrollspy-target="e-mid" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Meio</span>
            </a>
            <a href="#e-right" data-scrollspy-target="e-right" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Final</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 18rem; max-height: 18rem;">
        <section id="e-left" data-scrollspy-section="e-left" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Conteúdo</h3>
            <p class="mb-0 text-sm text-muted-foreground">nav-position="end" coloca o sumário à direita.</p>
        </section>
        <section id="e-mid" data-scrollspy-section="e-mid" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Meio</h3>
            <p class="mb-0 text-sm text-muted-foreground">Padrão comum em docs com TOC no canto direito.</p>
        </section>
        <section id="e-right" data-scrollspy-section="e-right" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Final</h3>
            <p class="mb-0 text-sm text-muted-foreground">O layout usa flex-row-reverse internamente.</p>
        </section>
    </div>
</div>
HTML;

    $badgeHtml = <<<HTML
<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 12rem;">
        <nav aria-label="Navegação da página" class="flex flex-col overflow-hidden rounded-md border border-border bg-card w-full">
            <a href="#g-inbox" data-scrollspy-target="g-inbox" aria-current="location" class="{$linkClasses} w-full border-b border-border px-3.5 py-2.5 last:border-b-0 z-[1] border-danger bg-danger text-danger-foreground">
                <i class="bi bi-envelope shrink-0 leading-none" aria-hidden="true"></i>
                <span class="min-w-0 truncate">Caixa de entrada</span>
                <span class="ms-auto inline-flex items-center font-medium leading-none bg-danger/15 text-danger gap-1 px-2 py-0.5 text-[11px] rounded-full">12</span>
            </a>
            <a href="#g-sent" data-scrollspy-target="g-sent" class="{$linkClasses} w-full border-b border-border px-3.5 py-2.5 last:border-b-0 bg-card text-foreground hover:bg-muted/70">
                <i class="bi bi-send shrink-0 leading-none" aria-hidden="true"></i>
                <span class="min-w-0 truncate">Enviados</span>
            </a>
            <a href="#g-spam" data-scrollspy-target="g-spam" class="{$linkClasses} w-full border-b border-border px-3.5 py-2.5 last:border-b-0 bg-card text-foreground hover:bg-muted/70">
                <i class="bi bi-exclamation-octagon shrink-0 leading-none" aria-hidden="true"></i>
                <span class="min-w-0 truncate">Spam</span>
                <span class="ms-auto inline-flex items-center font-medium leading-none bg-danger/15 text-danger gap-1 px-2 py-0.5 text-[11px] rounded-full">3</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 18rem; max-height: 18rem;">
        <section id="g-inbox" data-scrollspy-section="g-inbox" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Caixa de entrada</h3>
            <p class="mb-0 text-sm text-muted-foreground">Ícones e badges nos itens da navegação.</p>
        </section>
        <section id="g-sent" data-scrollspy-section="g-sent" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Enviados</h3>
            <p class="mb-0 text-sm text-muted-foreground">Histórico de mensagens enviadas.</p>
        </section>
        <section id="g-spam" data-scrollspy-section="g-spam" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Spam</h3>
            <p class="mb-0 text-sm text-muted-foreground">3 mensagens precisam de revisão.</p>
        </section>
    </div>
</div>
HTML;

    $colorsHtml = <<<HTML
<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 9rem;">
        <nav aria-label="Navegação da página" class="inline-flex flex-wrap gap-1 w-full">
            <a href="#c-primary" data-scrollspy-target="c-primary" aria-current="location" class="{$linkClasses} rounded-md px-3 py-1.5 bg-primary text-primary-foreground shadow-sm">
                <span class="min-w-0 truncate">Primary</span>
            </a>
            <a href="#c-primary-b" data-scrollspy-target="c-primary-b" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Outra</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 12rem; max-height: 12rem;">
        <section id="c-primary" data-scrollspy-section="c-primary" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Primary</h3>
            <p class="mb-0 text-sm text-muted-foreground">Cor primary.</p>
        </section>
        <section id="c-primary-b" data-scrollspy-section="c-primary-b" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Outra</h3>
            <p class="mb-0 text-sm text-muted-foreground">Segunda seção.</p>
        </section>
    </div>
</div>

<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 9rem;">
        <nav aria-label="Navegação da página" class="inline-flex flex-wrap gap-1 w-full">
            <a href="#c-success" data-scrollspy-target="c-success" aria-current="location" class="{$linkClasses} rounded-md px-3 py-1.5 bg-success text-success-foreground shadow-sm">
                <span class="min-w-0 truncate">Success</span>
            </a>
            <a href="#c-success-b" data-scrollspy-target="c-success-b" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Outra</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 12rem; max-height: 12rem;">
        <section id="c-success" data-scrollspy-section="c-success" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Success</h3>
            <p class="mb-0 text-sm text-muted-foreground">Cor success.</p>
        </section>
        <section id="c-success-b" data-scrollspy-section="c-success-b" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Outra</h3>
            <p class="mb-0 text-sm text-muted-foreground">Segunda seção.</p>
        </section>
    </div>
</div>

<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 9rem;">
        <nav aria-label="Navegação da página" class="inline-flex flex-wrap gap-1 w-full">
            <a href="#c-warning" data-scrollspy-target="c-warning" aria-current="location" class="{$linkClasses} rounded-md px-3 py-1.5 bg-warning/15 text-warning">
                <span class="min-w-0 truncate">Warning</span>
            </a>
            <a href="#c-warning-b" data-scrollspy-target="c-warning-b" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Outra</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 12rem; max-height: 12rem;">
        <section id="c-warning" data-scrollspy-section="c-warning" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Warning</h3>
            <p class="mb-0 text-sm text-muted-foreground">Cor warning soft.</p>
        </section>
        <section id="c-warning-b" data-scrollspy-section="c-warning-b" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Outra</h3>
            <p class="mb-0 text-sm text-muted-foreground">Segunda seção.</p>
        </section>
    </div>
</div>

<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 9rem;">
        <nav aria-label="Navegação da página" class="flex flex-col overflow-hidden rounded-md border border-border bg-card w-full">
            <a href="#c-info" data-scrollspy-target="c-info" aria-current="location" class="{$linkClasses} w-full border-b border-border px-3.5 py-2.5 last:border-b-0 z-[1] border-info bg-info text-info-foreground">
                <span class="min-w-0 truncate">Info</span>
            </a>
            <a href="#c-info-b" data-scrollspy-target="c-info-b" class="{$linkClasses} w-full border-b border-border px-3.5 py-2.5 last:border-b-0 bg-card text-foreground hover:bg-muted/70">
                <span class="min-w-0 truncate">Outra</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 12rem; max-height: 12rem;">
        <section id="c-info" data-scrollspy-section="c-info" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Info</h3>
            <p class="mb-0 text-sm text-muted-foreground">Cor info em list.</p>
        </section>
        <section id="c-info-b" data-scrollspy-section="c-info-b" class="scroll-mt-4 pb-8">
            <h3 class="mb-3 text-base font-semibold text-foreground">Outra</h3>
            <p class="mb-0 text-sm text-muted-foreground">Segunda seção.</p>
        </section>
    </div>
</div>
HTML;

    $hashCode = <<<'BLADE'
<x-ui.scrollspy default="hash-a" hash height="16rem" variant="soft" color="primary">
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="hash-a">Alpha</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="hash-b">Beta</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="hash-c">Gamma</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>
    <x-ui.scrollspy.scrollspy-section name="hash-a" title="Alpha" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Com hash, a URL atualiza via history.replaceState (#hash-a).</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="hash-b" title="Beta" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Recarregar a página com o hash restaura a seção.</p>
    </x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="hash-c" title="Gamma" class="pb-10">
        <p class="mb-0 text-sm text-muted-foreground">Use nomes únicos na página para evitar colisão de ids.</p>
    </x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $windowCode = <<<'BLADE'
{{-- Em páginas reais, use root="window" para observar o scroll da janela.
     Ajuste offset para a altura do header sticky. --}}
<x-ui.scrollspy
    root="window"
    :offset="80"
    sticky
    hash
    variant="underline"
    nav-position="end"
    nav-width="14rem"
>
    <x-slot:nav>
        <x-ui.scrollspy.scrollspy-item target="docs-intro">Introdução</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="docs-install">Instalação</x-ui.scrollspy.scrollspy-item>
        <x-ui.scrollspy.scrollspy-item target="docs-usage">Uso</x-ui.scrollspy.scrollspy-item>
    </x-slot:nav>

    <x-ui.scrollspy.scrollspy-section name="docs-intro" title="Introdução">...</x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="docs-install" title="Instalação">...</x-ui.scrollspy.scrollspy-section>
    <x-ui.scrollspy.scrollspy-section name="docs-usage" title="Uso">...</x-ui.scrollspy.scrollspy-section>
</x-ui.scrollspy>
BLADE;

    $hashHtml = <<<HTML
<div class="flex flex-row gap-6">
    <div class="shrink-0 sticky top-0 self-start" style="width: 12rem;">
        <nav aria-label="Navegação da página" class="inline-flex flex-wrap gap-1 w-full">
            <a href="#hash-a" data-scrollspy-target="hash-a" aria-current="location" class="{$linkClasses} rounded-md px-3 py-1.5 bg-primary/15 text-primary">
                <span class="min-w-0 truncate">Alpha</span>
            </a>
            <a href="#hash-b" data-scrollspy-target="hash-b" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Beta</span>
            </a>
            <a href="#hash-c" data-scrollspy-target="hash-c" class="{$linkClasses} rounded-md px-3 py-1.5 text-muted-foreground hover:bg-muted hover:text-foreground">
                <span class="min-w-0 truncate">Gamma</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1 overflow-y-auto overscroll-contain scroll-smooth" style="height: 16rem; max-height: 16rem;">
        <section id="hash-a" data-scrollspy-section="hash-a" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Alpha</h3>
            <p class="mb-0 text-sm text-muted-foreground">Com hash, a URL atualiza via history.replaceState (#hash-a).</p>
        </section>
        <section id="hash-b" data-scrollspy-section="hash-b" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Beta</h3>
            <p class="mb-0 text-sm text-muted-foreground">Recarregar a página com o hash restaura a seção.</p>
        </section>
        <section id="hash-c" data-scrollspy-section="hash-c" class="scroll-mt-4 pb-10">
            <h3 class="mb-3 text-base font-semibold text-foreground">Gamma</h3>
            <p class="mb-0 text-sm text-muted-foreground">Use nomes únicos na página para evitar colisão de ids.</p>
        </section>
    </div>
</div>
HTML;

    $windowHtml = <<<HTML
<div class="flex flex-row-reverse gap-6">
    <div class="shrink-0 sticky self-start" style="width: 14rem; top: 80px;">
        <nav aria-label="Navegação da página" class="flex flex-col gap-1 border-s border-border ps-3 w-full">
            <a href="#docs-intro" data-scrollspy-target="docs-intro" aria-current="location" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 border-primary text-primary">
                <span class="min-w-0 truncate">Introdução</span>
            </a>
            <a href="#docs-install" data-scrollspy-target="docs-install" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 text-muted-foreground hover:text-foreground">
                <span class="min-w-0 truncate">Instalação</span>
            </a>
            <a href="#docs-usage" data-scrollspy-target="docs-usage" class="{$linkClasses} -ms-px border-s-2 border-transparent px-3 py-1.5 text-muted-foreground hover:text-foreground">
                <span class="min-w-0 truncate">Uso</span>
            </a>
        </nav>
    </div>
    <div class="min-w-0 flex-1">
        <section id="docs-intro" data-scrollspy-section="docs-intro" class="scroll-mt-4">Introdução</section>
        <section id="docs-install" data-scrollspy-section="docs-install" class="scroll-mt-4">Instalação</section>
        <section id="docs-usage" data-scrollspy-section="docs-usage" class="scroll-mt-4">Uso</section>
    </div>
</div>
HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.scrollspy&gt;</code> destaca o item da navegação conforme a seção
            visível no scroll. Use <code>&lt;x-ui.scrollspy.scrollspy-item&gt;</code> no slot
            <code>nav</code> e <code>&lt;x-ui.scrollspy.scrollspy-section&gt;</code> no slot padrão —
            ligados pela prop <code>target</code>/<code>name</code>. Variantes:
            <code>list</code>, <code>underline</code>, <code>pills</code>, <code>soft</code>
            e <code>boxed</code>. Também há cores, ícones, badge, nested, horizontal,
            nav à direita, hash na URL e <code>root="window"|"self"</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Variante padrão (<code>list</code>): nav vertical estilo list-group. O painel
                usa <code>root="self"</code> (padrão) para rolar dentro da demo.
            </x-slot:description>
            <div class="w-full">
                <x-ui.scrollspy default="intro" height="20rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="intro" icon="bi-house">Introdução</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="features" icon="bi-stars">Recursos</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="pricing" icon="bi-tag">Preços</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="faq" icon="bi-question-circle">FAQ</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>

                    <x-ui.scrollspy.scrollspy-section name="intro" title="Introdução" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">
                            O scrollspy destaca o item da navegação correspondente à seção visível.
                            Role o painel ao lado para ver o destaque mudar.
                        </p>
                        <p class="mt-3 mb-0 text-sm text-muted-foreground">
                            Clique num item para rolar suavemente até a seção. O observer pausa
                            durante o scroll programático para evitar flicker no estado ativo.
                        </p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="features" title="Recursos" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">
                            IntersectionObserver, scroll suave, variantes de nav, cores, itens aninhados e sync de hash.
                        </p>
                        <ul class="mt-3 mb-0 list-disc space-y-1 ps-5 text-sm text-muted-foreground">
                            <li>Offset configurável para headers sticky</li>
                            <li>Container próprio (<code>self</code>) ou janela (<code>window</code>)</li>
                            <li>Acessível com <code>aria-current="location"</code></li>
                        </ul>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="pricing" title="Preços" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">
                            Planos mensais e anuais com destaque automático conforme a leitura.
                        </p>
                        <p class="mt-3 mb-0 text-sm text-muted-foreground">
                            Continue rolando para ver o FAQ ativar na navegação.
                        </p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="faq" title="FAQ" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">
                            Perguntas frequentes sobre instalação, acessibilidade e customização.
                        </p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Pills" :code="$pillsCode" :html="$pillsHtml">
            <x-slot:description>
                <code>variant="pills"</code> — item ativo com fundo sólido na cor do tema.
            </x-slot:description>
            <div class="w-full">
                <x-ui.scrollspy default="p-overview" variant="pills" color="primary" height="18rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="p-overview">Visão geral</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="p-setup">Setup</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="p-api">API</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="p-overview" title="Visão geral" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Variante pills — item ativo com fundo sólido.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="p-setup" title="Setup" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Instale e importe o componente na página.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="p-api" title="API" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Props, slots e eventos documentados abaixo.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Soft" :code="$softCode" :html="$softHtml">
            <x-slot:description>
                <code>variant="soft"</code> com <code>color="info"</code> e ícones.
            </x-slot:description>
            <div class="w-full">
                <x-ui.scrollspy default="s-start" variant="soft" color="info" height="18rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="s-start" icon="bi-play-circle">Começar</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="s-guide" icon="bi-book">Guia</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="s-tips" icon="bi-lightbulb">Dicas</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="s-start" title="Começar" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Soft — destaque suave sem competir com o conteúdo.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="s-guide" title="Guia" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Passo a passo de uso em layouts de documentação.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="s-tips" title="Dicas" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Prefira root="self" em demos embutidas e root="window" em páginas inteiras.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Underline" :code="$underlineCode" :html="$underlineHtml">
            <x-slot:description>
                <code>variant="underline"</code> — borda de destaque no eixo da orientação.
            </x-slot:description>
            <div class="w-full">
                <x-ui.scrollspy default="u-one" variant="underline" color="success" height="18rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="u-one">Seção um</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="u-two">Seção dois</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="u-three">Seção três</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="u-one" title="Seção um" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Underline vertical — borda à esquerda no item ativo.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="u-two" title="Seção dois" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Ideal para sumários de documentação longos.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="u-three" title="Seção três" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Combine com sticky e offset do header fixo.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Boxed" :code="$boxedCode" :html="$boxedHtml">
            <x-slot:description>
                <code>variant="boxed"</code> — item ativo flutua sobre <code>bg-muted</code>.
            </x-slot:description>
            <div class="w-full">
                <x-ui.scrollspy default="b-a" variant="boxed" color="warning" height="18rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="b-a">Alpha</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="b-b">Beta</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="b-c">Gamma</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="b-a" title="Alpha" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Boxed — item ativo flutua sobre o fundo muted.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="b-b" title="Beta" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Boa opção quando a nav precisa de contorno visual próprio.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="b-c" title="Gamma" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Funciona em vertical e horizontal.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Itens aninhados" :code="$nestedCode" :html="$nestedHtml">
            <x-slot:description>
                <code>nested</code> indenta subníveis — útil para TOC de documentação.
            </x-slot:description>
            <div class="w-full">
                <x-ui.scrollspy default="n-intro" variant="underline" height="20rem" nav-width="14rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="n-intro">Introdução</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="n-auth">Autenticação</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="n-auth-login" nested>Login</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="n-auth-register" nested>Cadastro</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="n-billing">Faturamento</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="n-billing-invoices" nested>Faturas</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="n-intro" title="Introdução" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Itens com nested recebem indentação de subnível.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="n-auth" title="Autenticação" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Fluxos de acesso à conta.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="n-auth-login" title="Login" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">E-mail, senha e recuperação.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="n-auth-register" title="Cadastro" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Criação de conta e confirmação.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="n-billing" title="Faturamento" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Planos e métodos de pagamento.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="n-billing-invoices" title="Faturas" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Histórico e download de PDFs.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Horizontal" :code="$horizontalCode" :html="$horizontalHtml">
            <x-slot:description>
                <code>:vertical="false"</code> coloca a nav acima do conteúdo.
            </x-slot:description>
            <div class="w-full">
                <x-ui.scrollspy
                    default="h-one"
                    :vertical="false"
                    variant="pills"
                    color="info"
                    height="16rem"
                >
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="h-one">Um</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="h-two">Dois</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="h-three">Três</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="h-four">Quatro</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="h-one" title="Seção um" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Nav horizontal acima do conteúdo rolável.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="h-two" title="Seção dois" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Útil em landings com âncoras curtas.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="h-three" title="Seção três" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Combine com sticky para fixar a nav no topo.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="h-four" title="Seção quatro" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">O item ativo acompanha a seção em vista.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Nav à direita" :code="$endCode" :html="$endHtml">
            <x-slot:description>
                <code>nav-position="end"</code> — sumário no lado direito (TOC).
            </x-slot:description>
            <div class="w-full">
                <x-ui.scrollspy default="e-left" nav-position="end" variant="soft" color="secondary" height="18rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="e-left">Conteúdo</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="e-mid">Meio</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="e-right">Final</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="e-left" title="Conteúdo" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">nav-position="end" coloca o sumário à direita.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="e-mid" title="Meio" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Padrão comum em docs com TOC no canto direito.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="e-right" title="Final" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">O layout usa flex-row-reverse internamente.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Ícones e badges" :code="$badgeCode" :html="$badgeHtml">
            <x-slot:description>
                <code>icon</code> e <code>badge</code> nos itens — herdam a <code>color</code> do pai.
            </x-slot:description>
            <div class="w-full">
                <x-ui.scrollspy default="g-inbox" variant="list" color="danger" height="18rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="g-inbox" icon="bi-envelope" badge="12">Caixa de entrada</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="g-sent" icon="bi-send">Enviados</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="g-spam" icon="bi-exclamation-octagon" badge="3">Spam</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="g-inbox" title="Caixa de entrada" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Ícones e badges nos itens da navegação.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="g-sent" title="Enviados" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Histórico de mensagens enviadas.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="g-spam" title="Spam" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">3 mensagens precisam de revisão.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Tokens <code>primary</code>, <code>secondary</code>, <code>success</code>,
                <code>warning</code>, <code>danger</code> e <code>info</code>.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-2">
                <x-ui.scrollspy default="c-primary" variant="pills" color="primary" height="12rem" nav-width="9rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="c-primary">Primary</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="c-primary-b">Outra</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="c-primary" title="Primary" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">Cor primary.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="c-primary-b" title="Outra" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">Segunda seção.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>

                <x-ui.scrollspy default="c-success" variant="pills" color="success" height="12rem" nav-width="9rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="c-success">Success</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="c-success-b">Outra</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="c-success" title="Success" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">Cor success.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="c-success-b" title="Outra" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">Segunda seção.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>

                <x-ui.scrollspy default="c-warning" variant="soft" color="warning" height="12rem" nav-width="9rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="c-warning">Warning</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="c-warning-b">Outra</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="c-warning" title="Warning" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">Cor warning soft.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="c-warning-b" title="Outra" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">Segunda seção.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>

                <x-ui.scrollspy default="c-info" variant="list" color="info" height="12rem" nav-width="9rem">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="c-info">Info</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="c-info-b">Outra</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="c-info" title="Info" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">Cor info em list.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="c-info-b" title="Outra" class="pb-8">
                        <p class="mb-0 text-sm text-muted-foreground">Segunda seção.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Hash na URL" :code="$hashCode" :html="$hashHtml">
            <x-slot:description>
                <code>hash</code> sincroniza a seção ativa com <code>#id</code> via
                <code>history.replaceState</code> (sem poluir o histórico).
            </x-slot:description>
            <div class="w-full">
                <x-ui.scrollspy default="hash-a" hash height="16rem" variant="soft" color="primary">
                    <x-slot:nav>
                        <x-ui.scrollspy.scrollspy-item target="hash-a">Alpha</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="hash-b">Beta</x-ui.scrollspy.scrollspy-item>
                        <x-ui.scrollspy.scrollspy-item target="hash-c">Gamma</x-ui.scrollspy.scrollspy-item>
                    </x-slot:nav>
                    <x-ui.scrollspy.scrollspy-section name="hash-a" title="Alpha" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Com hash, a URL atualiza via history.replaceState (#hash-a).</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="hash-b" title="Beta" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Recarregar a página com o hash restaura a seção.</p>
                    </x-ui.scrollspy.scrollspy-section>
                    <x-ui.scrollspy.scrollspy-section name="hash-c" title="Gamma" class="pb-10">
                        <p class="mb-0 text-sm text-muted-foreground">Use nomes únicos na página para evitar colisão de ids.</p>
                    </x-ui.scrollspy.scrollspy-section>
                </x-ui.scrollspy>
            </div>
        </x-ui.example>

        <x-ui.example title="Página inteira (window)" :code="$windowCode" :html="$windowHtml">
            <x-slot:description>
                <code>root="window"</code> observa o scroll da janela. Use
                <code>offset</code> igual à altura do header sticky. Esta demo só mostra o código —
                o padrão das demos acima é <code>root="self"</code>.
            </x-slot:description>
            <div class="w-full rounded-md border border-dashed border-border bg-muted/40 p-4 text-sm text-muted-foreground">
                Veja o snippet em <strong class="text-foreground">Show Code</strong> — em páginas reais,
                <code class="text-danger">root="window"</code> + <code class="text-danger">:offset="80"</code>
                + <code class="text-danger">sticky</code> monta um TOC de documentação clássico.
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="scrollspy" />
</x-ui.docs>
