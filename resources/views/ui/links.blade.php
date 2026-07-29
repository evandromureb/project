<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
        <x-ui.link href="#">Link padrão</x-ui.link>
        BLADE;

    $basicHtml = <<<'HTML'
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">Link padrão</a>
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.link href="#" color="primary">Primary</x-ui.link>
        <x-ui.link href="#" color="secondary">Secondary</x-ui.link>
        <x-ui.link href="#" color="success">Success</x-ui.link>
        <x-ui.link href="#" color="warning">Warning</x-ui.link>
        <x-ui.link href="#" color="danger">Danger</x-ui.link>
        <x-ui.link href="#" color="info">Info</x-ui.link>
        <x-ui.link href="#" color="muted">Muted</x-ui.link>
        BLADE;

    $colorsHtml = <<<'HTML'
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">Primary</a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-secondary no-underline hover:underline text-sm">Secondary</a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-success no-underline hover:underline text-sm">Success</a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-warning no-underline hover:underline text-sm">Warning</a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-danger no-underline hover:underline text-sm">Danger</a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-info no-underline hover:underline text-sm">Info</a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-muted-foreground hover:text-foreground no-underline hover:underline text-sm">Muted</a>
        HTML;

    $underlineCode = <<<'BLADE'
        <x-ui.link href="#" underline="none">Sem sublinhado</x-ui.link>
        <x-ui.link href="#" underline="hover">Sublinha no hover (padrão)</x-ui.link>
        <x-ui.link href="#" underline="always">Sempre sublinhado</x-ui.link>
        BLADE;

    $underlineHtml = <<<'HTML'
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline text-sm">Sem sublinhado</a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">Sublinha no hover (padrão)</a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary underline text-sm">Sempre sublinhado</a>
        HTML;

    $sizesCode = <<<'BLADE'
        <x-ui.link href="#" size="sm">Pequeno</x-ui.link>
        <x-ui.link href="#" size="md">Médio</x-ui.link>
        <x-ui.link href="#" size="lg">Grande</x-ui.link>
        BLADE;

    $sizesHtml = <<<'HTML'
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-xs">Pequeno</a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">Médio</a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-base">Grande</a>
        HTML;

    $iconCode = <<<'BLADE'
        <x-ui.link href="#" icon="bi-download">Baixar arquivo</x-ui.link>
        <x-ui.link href="#" icon="bi-arrow-left" iconPosition="start" color="muted">Voltar</x-ui.link>
        BLADE;

    $iconHtml = <<<'HTML'
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">
            <i class="bi bi-download shrink-0 leading-none" aria-hidden="true"></i>
            Baixar arquivo
        </a>
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-muted-foreground hover:text-foreground no-underline hover:underline text-sm">
            <i class="bi bi-arrow-left shrink-0 leading-none" aria-hidden="true"></i>
            Voltar
        </a>
        HTML;

    $arrowCode = <<<'BLADE'
        <x-ui.link href="#" arrow>Ver todos os relatórios</x-ui.link>
        BLADE;

    $arrowHtml = <<<'HTML'
        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">
            Ver todos os relatórios
            <i class="bi bi-arrow-right shrink-0 leading-none transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true"></i>
        </a>
        HTML;

    $externalCode = <<<'BLADE'
        <x-ui.link href="https://laravel.com" external>Documentação do Laravel</x-ui.link>
        BLADE;

    $externalHtml = <<<'HTML'
        <a href="https://laravel.com" target="_blank" rel="noopener noreferrer" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">
            Documentação do Laravel
            <i class="bi bi-box-arrow-up-right shrink-0 leading-none" aria-hidden="true"></i>
        </a>
        HTML;

    $disabledCode = <<<'BLADE'
        <x-ui.link href="#" disabled>Link desabilitado</x-ui.link>
        BLADE;

/*     disabled: renderiza <span> em vez de <a>, com aria-disabled/tabindex e opacidade reduzida. 
*/
    $disabledHtml = <<<'HTML'
        <span aria-disabled="true" tabindex="-1" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm pointer-events-none cursor-not-allowed opacity-50">Link desabilitado</span>
        HTML;

    $inTextCode = <<<'BLADE'
        <p class="text-sm text-muted-foreground">
            Ao continuar, você concorda com nossos
            <x-ui.link href="#" underline="always" size="sm">Termos de uso</x-ui.link>
            e nossa
            <x-ui.link href="#" underline="always" size="sm">Política de privacidade</x-ui.link>.
        </p>
        BLADE;

    $inTextHtml = <<<'HTML'
        <p class="text-sm text-muted-foreground">
            Ao continuar, você concorda com nossos
            <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary underline text-xs">Termos de uso</a>
            e nossa
            <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary underline text-xs">Política de privacidade</a>.
        </p>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.link&gt;</code> é um link estilizado e consistente com o resto da
            biblioteca — sem Alpine/JS, puramente presentational. Suporta cores (as 6 semânticas +
            <code>muted</code>), sublinhado configurável, tamanhos, ícone (início ou fim), seta
            animada no hover, link externo (nova aba + <code>rel</code> seguro + ícone automático) e
            estado desabilitado.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Cor <code>primary</code> e sublinhado só no hover são o padrão.
            </x-slot:description>
            <x-ui.link href="#">Link padrão</x-ui.link>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code>: as 6 cores do tema, mais <code>muted</code> (discreto, ganha cor no hover).
            </x-slot:description>
            <x-ui.link href="#" color="primary">Primary</x-ui.link>
            <x-ui.link href="#" color="secondary">Secondary</x-ui.link>
            <x-ui.link href="#" color="success">Success</x-ui.link>
            <x-ui.link href="#" color="warning">Warning</x-ui.link>
            <x-ui.link href="#" color="danger">Danger</x-ui.link>
            <x-ui.link href="#" color="info">Info</x-ui.link>
            <x-ui.link href="#" color="muted">Muted</x-ui.link>
        </x-ui.example>

        <x-ui.example title="Sublinhado" :code="$underlineCode" :html="$underlineHtml">
            <x-slot:description>
                <code>underline</code>: <code>none</code>, <code>hover</code> (padrão) ou <code>always</code>.
            </x-slot:description>
            <x-ui.link href="#" underline="none">Sem sublinhado</x-ui.link>
            <x-ui.link href="#" underline="hover">Sublinha no hover (padrão)</x-ui.link>
            <x-ui.link href="#" underline="always">Sempre sublinhado</x-ui.link>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code> (padrão) ou <code>lg</code>.
            </x-slot:description>
            <x-ui.link href="#" size="sm">Pequeno</x-ui.link>
            <x-ui.link href="#" size="md">Médio</x-ui.link>
            <x-ui.link href="#" size="lg">Grande</x-ui.link>
        </x-ui.example>

        <x-ui.example title="Com ícone" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                <code>icon</code> + <code>iconPosition</code> (<code>start</code>/<code>end</code>).
            </x-slot:description>
            <x-ui.link href="#" icon="bi-download">Baixar arquivo</x-ui.link>
            <x-ui.link href="#" icon="bi-arrow-left" iconPosition="start" color="muted">Voltar</x-ui.link>
        </x-ui.example>

        <x-ui.example title="Seta animada" :code="$arrowCode" :html="$arrowHtml">
            <x-slot:description>
                <code>arrow</code> acrescenta uma seta que desliza para a direita no hover.
            </x-slot:description>
            <x-ui.link href="#" arrow>Ver todos os relatórios</x-ui.link>
        </x-ui.example>

        <x-ui.example title="Link externo" :code="$externalCode" :html="$externalHtml">
            <x-slot:description>
                <code>external</code> abre em nova aba (<code>target="_blank" rel="noopener noreferrer"</code>) e acrescenta um ícone automaticamente.
            </x-slot:description>
            <x-ui.link href="https://laravel.com" external>Documentação do Laravel</x-ui.link>
        </x-ui.example>

        <x-ui.example title="Desabilitado" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> renderiza um <code>&lt;span&gt;</code> em vez de <code>&lt;a&gt;</code> (sem navegação possível).
            </x-slot:description>
            <x-ui.link href="#" disabled>Link desabilitado</x-ui.link>
        </x-ui.example>

        <x-ui.example title="Dentro de um parágrafo" :code="$inTextCode" :html="$inTextHtml">
            <x-slot:description>
                Uso comum: links inline dentro de texto corrido, com <code>underline="always"</code> para ficarem claramente identificáveis mesmo sem hover.
            </x-slot:description>
            <p class="w-full text-sm text-muted-foreground">
                Ao continuar, você concorda com nossos
                <x-ui.link href="#" underline="always" size="sm">Termos de uso</x-ui.link>
                e nossa
                <x-ui.link href="#" underline="always" size="sm">Política de privacidade</x-ui.link>.
            </p>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="link" />
</x-ui.docs>
