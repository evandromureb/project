@props([
    'index' => 0,
    'image' => null,
    'alt' => null,
    'caption' => null,
    'captionText' => null,
    'interval' => null,
])

@aware([
    'fade' => false,
])

@php
    $hasCaption = filled($caption) || filled($captionText);
    $slideIndex = (int) $index;
@endphp

<div
    data-carousel-index="{{ $slideIndex }}"
    @if ($interval)
        data-interval="{{ $interval }}"
    @endif
    x-bind:aria-hidden="active === {{ $slideIndex }} ? 'false' : 'true'"
    role="group"
    aria-roledescription="slide"
    @if ($fade)
        x-show="active === {{ $slideIndex }}"
        x-transition:enter="transition ease-in-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute inset-0 size-full"
    @else
        x-bind:style="'transform: translateX(' + (({{ $slideIndex }} - active) * 100) + '%)'"
        class="absolute inset-0 size-full transition-transform duration-500 ease-in-out"
    @endif
>
    @if ($image)
        <img
            src="{{ $image }}"
            alt="{{ $alt ?? $caption ?? 'Slide '.($slideIndex + 1) }}"
            class="size-full object-cover select-none"
            draggable="false"
        >
    @else
        {{ $slot }}
    @endif

    @if ($hasCaption)
        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/75 via-black/35 to-transparent px-5 pt-16 pb-10 sm:px-8">
            <div class="max-w-xl text-left">
                @if ($caption)
                    <h5 class="text-base font-semibold text-white sm:text-lg">{{ $caption }}</h5>
                @endif

                @if ($captionText)
                    <p class="mt-1 text-sm text-white/85">{{ $captionText }}</p>
                @endif
            </div>
        </div>
    @endif
</div>
