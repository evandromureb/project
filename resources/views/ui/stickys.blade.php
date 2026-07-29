<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $paragraphs = [
        'O sticky mantém headers, toolbars e menus à vista enquanto o usuário rola o conteúdo.',
        'API: offset, activate, release, reverse, width auto e z-index.',
        'Em demos use root="self" para um viewport interno — no app real use target="body".',
        'Quando ativo, o elemento recebe a classe active e o body ganha data-ui-sticky-{name}="on".',
        'Variants Tailwind ui-sticky-active: e ui-sticky-release: controlam o visual no estado sticky.',
        'Combine com sticky-item para mostrar atalhos só enquanto a barra estiver grudada.',
        'release aponta para um seletor que, ao entrar no viewport, libera o modo sticky.',
        'activate calcula o offset a partir da posição de outro elemento no fluxo.',
        'width="auto" trava a largura medida no momento da ativação (modo fixed/body).',
        'start="auto" preserva o inset-inline-start calculado pelo layout atual.',
        'release-delay atrasa a limpeza dos estilos inline na saída, suavizando a transição.',
        'A API Alpine expõe update(), show(), hide(), toggle(), isActive() e isRelease().',
    ];

    $basicCode = <<<'BLADE'
<x-ui.sticky
    root="self"
    height="18rem"
    name="basic"
    :offset="48"
    top="0"
    zindex="20"
    class="ui-sticky-active:shadow-md ui-sticky-active:border-b ui-sticky-active:border-border"
>
    <x-slot:before>
        <div class="space-y-2 p-4">
            <p class="mb-0 text-sm text-muted-foreground">Role para baixo — a barra gruda no topo.</p>
            <div class="h-16 rounded-md bg-muted/40"></div>
        </div>
    </x-slot:before>

    <div class="flex items-center gap-3 bg-card px-4 py-3">
        <x-ui.badge color="primary" variant="soft">Sticky</x-ui.badge>
        <span class="text-sm font-medium text-foreground">Navegação</span>
        <span class="ms-auto text-xs text-muted-foreground ui-sticky-active:text-primary">ativo</span>
    </div>

    <x-slot:content>
        <div class="space-y-3 p-4">
            <p class="mb-0 text-sm text-muted-foreground">Conteúdo longo…</p>
        </div>
    </x-slot:content>
</x-ui.sticky>
BLADE;

    $releaseCode = <<<'BLADE'
<x-ui.sticky
    root="self"
    height="18rem"
    name="release-demo"
    :offset="40"
    top="0"
    release="#sticky-release-zone"
    sticky-class="shadow-md"
    class="ui-sticky-active:bg-primary ui-sticky-active:text-primary-foreground"
>
    <x-slot:before>
        <div class="p-4 text-sm text-muted-foreground">Role até a zona de release.</div>
    </x-slot:before>

    <div class="flex items-center gap-2 px-4 py-3">
        <i class="bi bi-pin-angle"></i>
        <span class="text-sm font-medium">Toolbar</span>
    </div>

    <x-slot:content>
        <div class="space-y-3 p-4">…</div>
        <div id="sticky-release-zone" class="mx-4 mb-4 rounded-md border border-dashed border-warning bg-warning/10 p-4 text-sm">
            Zona de release — sticky libera aqui.
        </div>
        <div class="space-y-3 p-4">…</div>
    </x-slot:content>
</x-ui.sticky>
BLADE;

    $itemsCode = <<<'BLADE'
<x-ui.sticky root="self" height="16rem" name="items" :offset="32" top="0" zindex="20">
    <x-slot:before>
        <div class="h-12 p-4 text-sm text-muted-foreground">Antes…</div>
    </x-slot:before>

    <div class="flex items-center gap-3 border-b border-border bg-card px-4 py-3 ui-sticky-active:shadow-sm">
        <x-ui.sticky.sticky-item show="inactive">
            <span class="text-sm text-muted-foreground">Título da página</span>
        </x-ui.sticky.sticky-item>
        <x-ui.sticky.sticky-item show="active">
            <x-ui.button size="sm" color="primary">Salvar</x-ui.button>
        </x-ui.sticky.sticky-item>
        <span class="ms-auto text-xs text-muted-foreground">Editor</span>
    </div>

    <x-slot:content>
        <div class="space-y-3 p-4">…</div>
    </x-slot:content>
</x-ui.sticky>
BLADE;

    $variantsCode = <<<'BLADE'
<div class="flex gap-2 rounded-md border border-border bg-card px-4 py-3
            ui-sticky-active:border-primary ui-sticky-active:shadow-lg
            ui-sticky-release:opacity-80">
    Barra com modifiers Tailwind
</div>
BLADE;

    $positionCode = <<<'BLADE'
{{-- Página real (scroll da window) --}}
<x-ui.sticky
    name="app-header"
    target="body"
    :offset="80"
    top="0"
    start="auto"
    width="auto"
    zindex="40"
    sticky-class="shadow-md"
>
    <header class="bg-card px-4 py-3">Header sticky</header>
</x-ui.sticky>
BLADE;

    $apiCode = <<<'BLADE'
<div x-data class="flex flex-col gap-3">
    <div x-ref="stickyWrap">
        <x-ui.sticky root="self" height="14rem" name="api" :offset="24" top="0">
            <x-slot:before><div class="h-10"></div></x-slot:before>
            <div class="bg-card px-4 py-3 text-sm">Barra</div>
            <x-slot:content><div class="h-64 p-4">…</div></x-slot:content>
        </x-ui.sticky>
    </div>
    <x-ui.button
        size="sm"
        x-on:click="Alpine.$data($refs.stickyWrap.querySelector('[data-ui-sticky]')).update()"
    >
        update()
    </x-ui.button>
</div>
BLADE;

    $eventsCode = <<<'BLADE'
<x-ui.sticky
    root="self"
    height="14rem"
    name="events"
    :offset="24"
    top="0"
    x-on:sticky-change="console.log($event.detail)"
>
    …
</x-ui.sticky>
BLADE;

    // Gera o "shell" HTML estático equivalente ao que <x-ui.sticky> renderiza —
    // a interatividade (Alpine, x-data="sticky(...)") não é reproduzida, só a
    // estrutura/classes, como recomendado para componentes com JS.
    $renderStickySelf = function (string $height, string $barHtml, string $beforeHtml = '', string $contentHtml = '', string $barClass = ''): string {
        $before = $beforeHtml !== '' ? "<div class=\"ui-sticky-before\">{$beforeHtml}</div>" : '';
        $content = $contentHtml !== '' ? "<div class=\"ui-sticky-content\">{$contentHtml}</div>" : '';
        $barClasses = trim('ui-sticky w-full '.$barClass);

        return <<<HTML
            <div data-ui-sticky-root class="ui-sticky-root relative w-full min-w-0 overflow-y-auto overscroll-contain border border-border bg-background" style="--ui-sticky-root-height: {$height};">
                {$before}
                <div data-ui-sticky data-ui-sticky-wrapper class="{$barClasses}">
                    {$barHtml}
                </div>
                {$content}
            </div>
            HTML;
    };

    $renderStickyItem = function (string $show, string $inner): string {
        return match ($show) {
            'active' => "<div class=\"ui-sticky-item\" data-ui-sticky-item=\"active\">{$inner}</div>",
            'inactive' => "<div class=\"ui-sticky-item\" data-ui-sticky-item=\"inactive\">{$inner}</div>",
            'release' => "<div class=\"ui-sticky-item\" data-ui-sticky-item=\"release\">{$inner}</div>",
            default => "<div class=\"ui-sticky-item\">{$inner}</div>",
        };
    };

    $paragraphBlocks = fn (array $items) => implode("\n", array_map(
        fn ($p) => '<p class="mb-0 rounded-md border border-border/70 bg-muted/30 px-3 py-2 text-sm text-foreground">'.$p.'</p>',
        $items
    ));

    $plainParagraphs = fn (array $items) => implode("\n", array_map(
        fn ($p) => '<p class="mb-0 text-sm text-muted-foreground">'.$p.'</p>',
        $items
    ));

    $basicHtml = $renderStickySelf(
        '18rem',
        '<div class="flex items-center gap-3 px-4 py-3">'
            .'<span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1.5 px-2.5 py-1 text-xs rounded-md"><span>Sticky</span></span>'
            .'<span class="text-sm font-medium text-foreground">Navegação</span>'
            .'<span class="ms-auto text-xs text-muted-foreground ui-sticky-active:text-primary">ativo quando grudado</span>'
            .'</div>',
        '<div class="space-y-2 p-4"><p class="mb-0 text-sm text-muted-foreground">Role para baixo — a barra gruda no topo.</p><div class="h-16 rounded-md bg-muted/40"></div></div>',
        '<div class="space-y-3 p-4">'.$paragraphBlocks($paragraphs).'</div>',
        'bg-card ui-sticky-active:shadow-md ui-sticky-active:border-b ui-sticky-active:border-border'
    );

    $releaseHtml = $renderStickySelf(
        '18rem',
        '<div class="flex items-center gap-2 px-4 py-3">'
            .'<i class="bi bi-pin-angle" aria-hidden="true"></i>'
            .'<span class="text-sm font-medium">Toolbar</span>'
            .'<span class="ms-auto text-xs opacity-80 ui-sticky-active:opacity-100">grudado</span>'
            .'</div>',
        '<div class="p-4 text-sm text-muted-foreground">Role até a zona tracejada amarela para liberar o sticky.</div>',
        '<div class="space-y-3 p-4">'.$plainParagraphs(array_slice($paragraphs, 0, 6)).'</div>'
            .'<div id="sticky-release-zone" class="mx-4 mb-4 rounded-md border border-dashed border-warning bg-warning/10 p-4 text-sm text-foreground">Zona de release — ao aparecer aqui, o sticky libera.</div>'
            .'<div class="space-y-3 p-4">'.$plainParagraphs(array_slice($paragraphs, 6)).'</div>',
        'ui-sticky-active:bg-primary ui-sticky-active:text-primary-foreground'
    );

    $itemsHtml = $renderStickySelf(
        '16rem',
        '<div class="flex items-center gap-3 border-b border-border bg-card px-4 py-3 ui-sticky-active:shadow-sm">'
            .$renderStickyItem('inactive', '<span class="text-sm text-muted-foreground">Título da página</span>')
            .$renderStickyItem('active', '<button type="button" class="btn btn-primary btn-sm">Salvar</button>')
            .'<span class="ms-auto text-xs text-muted-foreground">Editor</span>'
            .'</div>',
        '<div class="h-12 p-4 text-sm text-muted-foreground">Conteúdo antes da barra…</div>',
        '<div class="space-y-3 p-4">'.$plainParagraphs(array_slice($paragraphs, 0, 8)).'</div>'
    );

    $variantsHtml = $renderStickySelf(
        '14rem',
        '<div class="flex items-center gap-2 border border-border bg-card px-4 py-3 ui-sticky-active:border-primary ui-sticky-active:shadow-lg ui-sticky-release:opacity-80">'
            .'<span class="size-2 rounded-full bg-muted-foreground ui-sticky-active:bg-primary"></span>'
            .'<span class="text-sm text-foreground">Barra com modifiers</span>'
            .'</div>',
        '<div class="h-10 p-4 text-xs text-muted-foreground">Role…</div>',
        '<div class="space-y-3 p-4">'.$plainParagraphs(array_slice($paragraphs, 0, 6)).'</div>'
    );

    $positionHtml = <<<'HTML'
        <div data-ui-sticky-wrapper class="ui-sticky-wrapper w-full">
            <div data-ui-sticky data-ui-sticky-name="app-header" class="ui-sticky w-full">
                <header class="bg-card px-4 py-3">Header sticky</header>
            </div>
        </div>
        HTML;

    $apiHtml = '<div class="flex flex-col gap-3">'
        .'<div>'.$renderStickySelf(
            '14rem',
            '<div class="bg-card px-4 py-3 text-sm">Barra</div>',
            '<div class="h-10"></div>',
            '<div class="h-64 p-4">…</div>'
        ).'</div>'
        .'<button type="button" class="btn btn-primary btn-sm">update()</button>'
        .'</div>';

    $eventsHtml = '<div class="flex flex-col gap-2">'
        .'<p class="mb-0 text-xs text-muted-foreground">Evento: <span class="font-mono text-primary">Aguardando…</span></p>'
        .$renderStickySelf(
            '14rem',
            '<div class="border-b border-border bg-card px-4 py-3 text-sm ui-sticky-active:shadow-sm">Barra com eventos</div>',
            '<div class="h-10 p-4 text-xs text-muted-foreground">Role para disparar eventos</div>',
            '<div class="space-y-2 p-4">'.$plainParagraphs(array_slice($paragraphs, 0, 5)).'</div>'
        )
        .'</div>';
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.sticky&gt;</code> mantém um elemento fixo durante o scroll.
            Use <code>root="self"</code> em demos/painéis e <code>target="body"</code> em páginas reais.
            Estilize o estado ativo com <code>ui-sticky-active:*</code> / <code>ui-sticky-release:*</code>
            ou com <code>sticky-class</code> / <code>release-class</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Role o painel. Após o <code>offset</code>, a barra fica sticky e recebe
                <code>active</code> + modifiers <code>ui-sticky-active:*</code>.
            </x-slot:description>
            <x-ui.sticky
                root="self"
                height="18rem"
                name="basic"
                :offset="48"
                top="0"
                zindex="20"
                class="bg-card ui-sticky-active:shadow-md ui-sticky-active:border-b ui-sticky-active:border-border"
            >
                <x-slot:before>
                    <div class="space-y-2 p-4">
                        <p class="mb-0 text-sm text-muted-foreground">Role para baixo — a barra gruda no topo.</p>
                        <div class="h-16 rounded-md bg-muted/40"></div>
                    </div>
                </x-slot:before>

                <div class="flex items-center gap-3 px-4 py-3">
                    <x-ui.badge color="primary" variant="soft">Sticky</x-ui.badge>
                    <span class="text-sm font-medium text-foreground">Navegação</span>
                    <span class="ms-auto text-xs text-muted-foreground ui-sticky-active:text-primary">ativo quando grudado</span>
                </div>

                <x-slot:content>
                    <div class="space-y-3 p-4">
                        @foreach ($paragraphs as $paragraph)
                            <p class="mb-0 rounded-md border border-border/70 bg-muted/30 px-3 py-2 text-sm text-foreground">
                                {{ $paragraph }}
                            </p>
                        @endforeach
                    </div>
                </x-slot:content>
            </x-ui.sticky>
        </x-ui.example>

        <x-ui.example title="Release" :code="$releaseCode" :html="$releaseHtml">
            <x-slot:description>
                <code>release</code> aponta para um seletor. Quando o elemento entra no viewport do
                scroll root, o sticky libera (classe <code>release</code>).
            </x-slot:description>
            <x-ui.sticky
                root="self"
                height="18rem"
                name="release-demo"
                :offset="40"
                top="0"
                release="#sticky-release-zone"
                sticky-class="shadow-md"
                class="ui-sticky-active:bg-primary ui-sticky-active:text-primary-foreground"
            >
                <x-slot:before>
                    <div class="p-4 text-sm text-muted-foreground">
                        Role até a zona tracejada amarela para liberar o sticky.
                    </div>
                </x-slot:before>

                <div class="flex items-center gap-2 px-4 py-3">
                    <i class="bi bi-pin-angle" aria-hidden="true"></i>
                    <span class="text-sm font-medium">Toolbar</span>
                    <span class="ms-auto text-xs opacity-80 ui-sticky-active:opacity-100">grudado</span>
                </div>

                <x-slot:content>
                    <div class="space-y-3 p-4">
                        @foreach (array_slice($paragraphs, 0, 6) as $paragraph)
                            <p class="mb-0 text-sm text-muted-foreground">{{ $paragraph }}</p>
                        @endforeach
                    </div>
                    <div
                        id="sticky-release-zone"
                        class="mx-4 mb-4 rounded-md border border-dashed border-warning bg-warning/10 p-4 text-sm text-foreground"
                    >
                        Zona de release — ao aparecer aqui, o sticky libera.
                    </div>
                    <div class="space-y-3 p-4">
                        @foreach (array_slice($paragraphs, 6) as $paragraph)
                            <p class="mb-0 text-sm text-muted-foreground">{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </x-slot:content>
            </x-ui.sticky>
        </x-ui.example>

        <x-ui.example title="Sticky items" :code="$itemsCode" :html="$itemsHtml">
            <x-slot:description>
                <code>&lt;x-ui.sticky.sticky-item show="active|inactive|release"&gt;</code> troca o conteúdo
                conforme o estado.
            </x-slot:description>
            <x-ui.sticky
                root="self"
                height="16rem"
                name="items"
                :offset="32"
                top="0"
                zindex="20"
            >
                <x-slot:before>
                    <div class="h-12 p-4 text-sm text-muted-foreground">Conteúdo antes da barra…</div>
                </x-slot:before>

                <div class="flex items-center gap-3 border-b border-border bg-card px-4 py-3 ui-sticky-active:shadow-sm">
                    <x-ui.sticky.sticky-item show="inactive">
                        <span class="text-sm text-muted-foreground">Título da página</span>
                    </x-ui.sticky.sticky-item>
                    <x-ui.sticky.sticky-item show="active">
                        <x-ui.button size="sm" color="primary">Salvar</x-ui.button>
                    </x-ui.sticky.sticky-item>
                    <span class="ms-auto text-xs text-muted-foreground">Editor</span>
                </div>

                <x-slot:content>
                    <div class="space-y-3 p-4">
                        @foreach (array_slice($paragraphs, 0, 8) as $paragraph)
                            <p class="mb-0 text-sm text-muted-foreground">{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </x-slot:content>
            </x-ui.sticky>
        </x-ui.example>

        <x-ui.example title="Modifiers Tailwind" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                <code>ui-sticky-active:*</code> e <code>ui-sticky-release:*</code> funcionam no
                sticky e nos filhos.
            </x-slot:description>
            <x-ui.sticky
                root="self"
                height="14rem"
                name="variants"
                :offset="24"
                top="0"
                zindex="20"
            >
                <x-slot:before>
                    <div class="h-10 p-4 text-xs text-muted-foreground">Role…</div>
                </x-slot:before>

                <div class="flex items-center gap-2 border border-border bg-card px-4 py-3 ui-sticky-active:border-primary ui-sticky-active:shadow-lg ui-sticky-release:opacity-80">
                    <span class="size-2 rounded-full bg-muted-foreground ui-sticky-active:bg-primary"></span>
                    <span class="text-sm text-foreground">Barra com modifiers</span>
                </div>

                <x-slot:content>
                    <div class="space-y-3 p-4">
                        @foreach (array_slice($paragraphs, 0, 6) as $paragraph)
                            <p class="mb-0 text-sm text-muted-foreground">{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </x-slot:content>
            </x-ui.sticky>
        </x-ui.example>

        <x-ui.example title="Página real (body)" :code="$positionCode" :html="$positionHtml">
            <x-slot:description>
                Em produção use <code>target="body"</code> (padrão). O modo <code>fixed</code> trava
                largura/posição com <code>width="auto"</code> e <code>start="auto"</code>. Esta demo
                só mostra o código — o preview interativo usa <code>root="self"</code> acima.
            </x-slot:description>
            <div class="rounded-md border border-dashed border-border bg-muted/20 p-4 text-sm text-muted-foreground">
                <p class="mb-2 font-medium text-foreground">Uso típico no layout</p>
                <ul class="mb-0 list-disc space-y-1 ps-5">
                    <li><code class="text-danger">name</code> → <code>data-ui-sticky-&#123;name&#125;="on"</code> no <code>&lt;body&gt;</code></li>
                    <li><code class="text-danger">offset</code> → px de scroll para ativar (obrigatório &gt; 0)</li>
                    <li><code class="text-danger">top</code> / <code class="text-danger">start</code> / <code class="text-danger">width</code> → posição no modo fixed</li>
                    <li><code class="text-danger">zindex</code> → necessário para aplicar <code>position: fixed</code></li>
                </ul>
            </div>
        </x-ui.example>

        <x-ui.example title="API Alpine" :code="$apiCode" :html="$apiHtml">
            <x-slot:description>
                Acesse via <code>Alpine.$data(el)</code>:
                <code>update()</code>, <code>show()</code>, <code>hide()</code>, <code>toggle()</code>,
                <code>isActive()</code>, <code>isRelease()</code>.
            </x-slot:description>
            <div x-data class="flex flex-col gap-3">
                <div x-ref="stickyApiWrap">
                    <x-ui.sticky root="self" height="14rem" name="api" :offset="24" top="0" zindex="20">
                        <x-slot:before>
                            <div class="h-10 p-4 text-xs text-muted-foreground">Spacer</div>
                        </x-slot:before>
                        <div class="border-b border-border bg-card px-4 py-3 text-sm font-medium ui-sticky-active:shadow-sm">
                            Barra API
                        </div>
                        <x-slot:content>
                            <div class="space-y-2 p-4">
                                @foreach (array_slice($paragraphs, 0, 5) as $paragraph)
                                    <p class="mb-0 text-sm text-muted-foreground">{{ $paragraph }}</p>
                                @endforeach
                            </div>
                        </x-slot:content>
                    </x-ui.sticky>
                </div>
                <div class="flex flex-wrap gap-2">
                    <x-ui.button
                        size="sm"
                        color="primary"
                        x-on:click="Alpine.$data($refs.stickyApiWrap.querySelector('[data-ui-sticky]')).update()"
                    >
                        update()
                    </x-ui.button>
                    <x-ui.button
                        size="sm"
                        variant="outline"
                        color="secondary"
                        x-on:click="Alpine.$data($refs.stickyApiWrap.querySelector('[data-ui-sticky]')).show()"
                    >
                        show()
                    </x-ui.button>
                    <x-ui.button
                        size="sm"
                        variant="outline"
                        color="secondary"
                        x-on:click="Alpine.$data($refs.stickyApiWrap.querySelector('[data-ui-sticky]')).hide()"
                    >
                        hide()
                    </x-ui.button>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Eventos" :code="$eventsCode" :html="$eventsHtml">
            <x-slot:description>
                Dispara <code>sticky-change</code>, <code>sticky-show</code>, <code>sticky-shown</code>,
                <code>sticky-hide</code> e <code>sticky-hidden</code>.
            </x-slot:description>
            <div
                x-data="{ log: 'Aguardando…' }"
                class="flex flex-col gap-2"
                x-on:sticky-change="log = $event.detail.active ? 'ativo' : 'inativo'"
            >
                <p class="mb-0 text-xs text-muted-foreground">
                    Evento: <span class="font-mono text-primary" x-text="log"></span>
                </p>
                <x-ui.sticky
                    root="self"
                    height="14rem"
                    name="events"
                    :offset="24"
                    top="0"
                    zindex="20"
                >
                    <x-slot:before>
                        <div class="h-10 p-4 text-xs text-muted-foreground">Role para disparar eventos</div>
                    </x-slot:before>
                    <div class="border-b border-border bg-card px-4 py-3 text-sm ui-sticky-active:shadow-sm">
                        Barra com eventos
                    </div>
                    <x-slot:content>
                        <div class="space-y-2 p-4">
                            @foreach (array_slice($paragraphs, 0, 5) as $paragraph)
                                <p class="mb-0 text-sm text-muted-foreground">{{ $paragraph }}</p>
                            @endforeach
                        </div>
                    </x-slot:content>
                </x-ui.sticky>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="sticky" />
</x-ui.docs>
