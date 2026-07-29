@props([
    'name' => null,
    'title' => null,
    'description' => null,
    'icon' => null,
    'optional' => false,
    'disabled' => false,
    'heading' => true,
])

@aware([
    'fade' => true,
    'optionalText' => 'Opcional',
])

@php
    if ($name === null || $name === '') {
        throw new \InvalidArgumentException('A prop [name] é obrigatória em <x-forms.wizard.wizard-step>.');
    }

    $title = $title ?? (string) $name;
@endphp

<div
    data-wizard-step="{{ $name }}"
    data-wizard-title="{{ $title }}"
    @if (filled($description)) data-wizard-description="{{ $description }}" @endif
    @if (filled($icon)) data-wizard-icon="{{ $icon }}" @endif
    data-wizard-optional="{{ $optional ? 'true' : 'false' }}"
    data-wizard-disabled="{{ $disabled ? 'true' : 'false' }}"
    @if ($disabled) disabled @endif
    x-show="active === @js($name)"
    x-cloak
    @if ($fade)
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    @endif
    role="tabpanel"
    x-bind:aria-hidden="active === @js($name) ? 'false' : 'true'"
    {{ $attributes->class('outline-none') }}
>
    @if ($heading && ($title || $description))
        <div class="mb-4" data-wizard-step-heading>
            <div class="flex flex-wrap items-center gap-2">
                <h3 class="text-base font-semibold text-foreground">{{ $title }}</h3>
                @if ($optional)
                    <x-ui.badge size="sm" variant="soft" color="secondary">{{ $optionalText }}</x-ui.badge>
                @endif
            </div>
            @if (filled($description))
                <p class="mt-1 mb-0 text-sm text-muted-foreground">{{ $description }}</p>
            @endif
        </div>
    @endif

    {{ $slot }}
</div>
