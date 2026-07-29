@props([
    'offset' => 96,
    'label' => 'Nesta página',
])

{{--
    Layout de documentação: conteúdo + TOC "On This Page".
    Seções âncora: elementos com data-docs-section (ex.: <x-ui.example> / <x-ui.docs.section>).
    Alpine.data('uiDocs') em resources/js/ui-docs.js.
--}}
<div
    x-data="uiDocs(@js((int) $offset))"
    {{ $attributes->class(['ui-docs flex w-full min-w-0 flex-row-reverse items-stretch gap-8 max-lg:flex-col']) }}
>
    <nav
        class="sticky z-10 hidden w-56 shrink-0 self-start lg:block"
        style="top: {{ (int) $offset }}px; max-height: calc(100vh - {{ (int) $offset + 16 }}px);"
        aria-label="{{ $label }}"
    >
        <p class="mb-3 text-sm font-semibold text-foreground">Nesta página</p>

        <div class="flex max-h-[calc(100%-1.75rem)] flex-col gap-4 overflow-y-auto border-s border-border ps-3">
            <template x-for="group in groups" :key="group.key">
                <div class="flex flex-col gap-1">
                    <p class="text-sm font-medium text-foreground" x-text="group.label"></p>
                    <template x-for="item in group.items" :key="item.id">
                        <a
                            x-bind:href="'#' + item.id"
                            x-on:click.prevent="scrollTo(item.id)"
                            x-bind:aria-current="active === item.id ? 'location' : null"
                            x-bind:class="itemClass(item.id)"
                            class="-ms-px border-s-2 ps-3 text-[0.8125rem] font-medium no-underline transition-colors"
                            x-text="item.label"
                        ></a>
                    </template>
                </div>
            </template>
        </div>
    </nav>

    <div class="w-full min-w-0 flex-1 space-y-10" x-ref="content">
        {{ $slot }}
    </div>
</div>
