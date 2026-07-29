@props([
    'searchable' => true,
    'selectAll' => true,
    'invertible' => false,
    'clearable' => true,
    'optionButtonClass' => 'flex w-full items-start gap-2 px-3 py-2 text-start transition-colors disabled:cursor-not-allowed disabled:opacity-50 hover:bg-muted focus:bg-muted focus:outline-none data-[active=true]:bg-muted',
    'searchPlaceholder' => 'Buscar…',
    'selectAllText' => 'Selecionar todos',
    'clearAllText' => 'Limpar',
    'invertText' => 'Inverter',
    'withTeleportSearch' => false,
    'maxHeightClass' => 'max-h-60',
])

@if ($searchable)
    <div class="border-b border-border px-2 py-2">
        <div class="flex items-center gap-2 rounded-md border border-border bg-background px-2.5 py-1.5">
            <i class="bi bi-search text-xs text-muted-foreground" aria-hidden="true"></i>
            <input
                type="text"
                x-ref="search"
                x-model="query"
                @input="onQueryInput()"
                @keydown="onPanelKeydown($event)"
                class="w-full bg-transparent text-sm outline-none placeholder:text-muted-foreground"
                placeholder="{{ $searchPlaceholder }}"
                autocomplete="off"
            >
        </div>
    </div>
@endif

<div
    x-show="selectAll || invertible || (hasValue && clearable)"
    x-cloak
    class="flex flex-wrap items-center justify-between gap-2 border-b border-border px-3 py-2"
>
    <div class="flex flex-wrap items-center gap-3">
        <button
            type="button"
            x-show="selectAll && canSelectAll"
            @mousedown.prevent="selectAllFiltered()"
            class="cursor-pointer text-xs font-medium text-primary hover:underline"
            x-text="selectAllText"
        ></button>
        <span
            x-show="selectAll && ! canSelectAll"
            class="text-xs text-muted-foreground"
            x-text="selectAllText"
        ></span>

        <button
            type="button"
            x-show="canInvert"
            @mousedown.prevent="invertSelection()"
            class="cursor-pointer text-xs font-medium text-muted-foreground hover:text-foreground hover:underline"
            x-text="invertText"
        ></button>
    </div>

    <button
        type="button"
        x-show="hasValue && clearable && canEdit"
        @mousedown.prevent="clear()"
        class="cursor-pointer text-xs font-medium text-muted-foreground hover:text-foreground hover:underline"
        x-text="clearAllText"
    ></button>
</div>

<div
    x-ref="menuList"
    @class([$maxHeightClass, 'overflow-y-auto py-1'])
    role="group"
>
    <template x-if="statusMessage !== ''">
        <div class="flex items-center justify-center gap-2 px-3 py-6 text-center text-sm text-muted-foreground">
            <span
                x-show="loading"
                class="size-4 shrink-0 animate-spin rounded-full border-2 border-current border-t-transparent"
                aria-hidden="true"
            ></span>
            <span x-text="statusMessage"></span>
        </div>
    </template>

    <template x-for="(item, index) in visibleItems" x-bind:key="'sm-item-' + index + '-' + (item.type === 'group' ? item.label : item.option.value)">
        <div>
            <template x-if="item.type === 'group'">
                <div class="flex items-center justify-between gap-2 px-3 pb-1 pt-2">
                    <span
                        class="text-[10px] font-semibold uppercase tracking-wide text-muted-foreground"
                        x-text="item.label"
                    ></span>
                    <button
                        type="button"
                        x-show="canEdit && selectAll"
                        @mousedown.prevent="selectGroup(item.label)"
                        class="cursor-pointer text-[10px] font-medium text-primary hover:underline"
                    >Todos</button>
                </div>
            </template>

            <template x-if="item.type === 'option'">
                <button
                    type="button"
                    role="option"
                    x-bind:data-active="(activeIndex === index).toString()"
                    x-bind:aria-selected="isSelected(item.option.value).toString()"
                    x-bind:disabled="item.option.disabled || (isFull && ! isSelected(item.option.value))"
                    @mousedown.prevent="toggleOption(item.option)"
                    class="{{ $optionButtonClass }}"
                >
                    <span
                        class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded border text-[10px]"
                        x-bind:class="{
                            'border-primary bg-primary text-primary-foreground': isSelected(item.option.value),
                            'border-border bg-background text-transparent': ! isSelected(item.option.value),
                        }"
                        aria-hidden="true"
                    >
                        <i class="bi bi-check leading-none"></i>
                    </span>

                    <span class="min-w-0 flex-1">
                        <span class="flex items-center gap-1.5">
                            <template x-if="item.option.icon">
                                <i class="bi leading-none text-muted-foreground" x-bind:class="item.option.icon" aria-hidden="true"></i>
                            </template>
                            <span
                                class="truncate font-medium text-foreground"
                                x-html="highlightedLabel(item.option.label)"
                            ></span>
                        </span>
                        <template x-if="item.option.description">
                            <span
                                class="mt-0.5 block truncate text-xs text-muted-foreground"
                                x-text="item.option.description"
                            ></span>
                        </template>
                    </span>
                </button>
            </template>
        </div>
    </template>
</div>
