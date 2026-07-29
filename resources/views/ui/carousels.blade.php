<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $fullCode = <<<'BLADE'
        <x-ui.carousel>
            <x-ui.carousel.carousel-item
                index="0"
                image="https://picsum.photos/seed/carousel-full-1/1100/480"
                caption="Trilha na serra"
                captionText="Paisagens abertas e ar puro no fim de semana."
            />
            <x-ui.carousel.carousel-item
                index="1"
                image="https://picsum.photos/seed/carousel-full-2/1100/480"
                caption="Costa atlântica"
                captionText="Praias desertas a poucas horas da cidade."
            />
            <x-ui.carousel.carousel-item
                index="2"
                image="https://picsum.photos/seed/carousel-full-3/1100/480"
                caption="Cidade à noite"
                captionText="Luzes, gastronomia e vida noturna."
            />
        </x-ui.carousel>
        BLADE;

    $basicCode = <<<'BLADE'
        <x-ui.carousel :controls="false" :indicators="false">
            <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-1/900/400" />
            <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-2/900/400" />
            <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-3/900/400" />
        </x-ui.carousel>
        BLADE;

    $controlsCode = <<<'BLADE'
        <x-ui.carousel :indicators="false">
            <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-4/900/400" />
            <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-5/900/400" />
            <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-6/900/400" />
        </x-ui.carousel>
        BLADE;

    $indicatorsCode = <<<'BLADE'
        <x-ui.carousel :controls="false">
            <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-7/900/400" />
            <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-8/900/400" />
            <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-9/900/400" />
        </x-ui.carousel>
        BLADE;

    $fadeCode = <<<'BLADE'
        <x-ui.carousel fade>
            <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-13/900/400" caption="Crossfade" captionText="Transição por opacidade." />
            <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-14/900/400" />
            <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-15/900/400" />
        </x-ui.carousel>
        BLADE;

    $customIntervalCode = <<<'BLADE'
        <x-ui.carousel :interval="3000">
            <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-16/900/400" :interval="1500" />
            <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-17/900/400" :interval="6000" />
            <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-18/900/400" />
        </x-ui.carousel>
        BLADE;

    $darkCode = <<<'BLADE'
        <x-ui.carousel dark>
            <x-ui.carousel.carousel-item
                index="0"
                image="https://picsum.photos/seed/carousel-19/900/400"
                caption="Modo escuro"
                captionText="Controles e indicadores escuros, para fotos claras."
            />
            <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-20/900/400" />
        </x-ui.carousel>
        BLADE;

    $noAutoplayCode = <<<'BLADE'
        <x-ui.carousel :interval="false">
            <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-21/900/400" />
            <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-22/900/400" />
            <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-23/900/400" />
        </x-ui.carousel>
        BLADE;

    $heroCode = <<<'BLADE'
        <x-ui.carousel height="h-96" :interval="6000">
            <x-ui.carousel.carousel-item index="0">
                <div class="relative flex size-full items-end bg-primary p-8 sm:p-10">
                    <img
                        src="https://picsum.photos/seed/carousel-hero-1/1200/600"
                        alt=""
                        class="absolute inset-0 size-full object-cover opacity-40"
                    >
                    <div class="relative max-w-lg text-primary-foreground">
                        <p class="mb-2 text-xs font-medium tracking-wide uppercase opacity-80">Lançamento</p>
                        <h5 class="text-2xl font-semibold tracking-tight sm:text-3xl">Construa interfaces mais rápido</h5>
                        <p class="mt-2 text-sm opacity-90">Componentes prontos, tokens do tema e docs ao vivo.</p>
                        <x-ui.button color="secondary" variant="solid" size="sm" class="mt-4">Começar agora</x-ui.button>
                    </div>
                </div>
            </x-ui.carousel.carousel-item>
            <x-ui.carousel.carousel-item index="1">
                <div class="relative flex size-full items-end bg-info p-8 sm:p-10">
                    <img
                        src="https://picsum.photos/seed/carousel-hero-2/1200/600"
                        alt=""
                        class="absolute inset-0 size-full object-cover opacity-35"
                    >
                    <div class="relative max-w-lg text-info-foreground">
                        <p class="mb-2 text-xs font-medium tracking-wide uppercase opacity-80">Design system</p>
                        <h5 class="text-2xl font-semibold tracking-tight sm:text-3xl">Um visual consistente</h5>
                        <p class="mt-2 text-sm opacity-90">Botões, cards, tabs e alerts no mesmo idioma visual.</p>
                    </div>
                </div>
            </x-ui.carousel.carousel-item>
        </x-ui.carousel>
        BLADE;

    $cardsCode = <<<'BLADE'
        <x-ui.carousel height="h-64" :interval="false">
            <x-ui.carousel.carousel-item index="0">
                <div class="flex size-full flex-col justify-between bg-muted p-6">
                    <x-ui.badge color="primary" variant="soft" size="sm">Produto</x-ui.badge>
                    <div>
                        <h5 class="text-lg font-semibold text-foreground">Analytics em tempo real</h5>
                        <p class="mt-1 text-sm text-muted-foreground">Acompanhe métricas sem sair do painel.</p>
                    </div>
                </div>
            </x-ui.carousel.carousel-item>
            <x-ui.carousel.carousel-item index="1">
                <div class="flex size-full flex-col justify-between bg-success/10 p-6">
                    <x-ui.badge color="success" variant="soft" size="sm">Sucesso</x-ui.badge>
                    <div>
                        <h5 class="text-lg font-semibold text-foreground">+38% de conversão</h5>
                        <p class="mt-1 text-sm text-muted-foreground">Resultado médio após adotar o funil guiado.</p>
                    </div>
                </div>
            </x-ui.carousel.carousel-item>
            <x-ui.carousel.carousel-item index="2">
                <div class="flex size-full flex-col justify-between bg-warning/10 p-6">
                    <x-ui.badge color="warning" variant="soft" size="sm">Dica</x-ui.badge>
                    <div>
                        <h5 class="text-lg font-semibold text-foreground">Pause no hover</h5>
                        <p class="mt-1 text-sm text-muted-foreground">O autoplay pausa quando o mouse está sobre o carrossel.</p>
                    </div>
                </div>
            </x-ui.carousel.carousel-item>
        </x-ui.carousel>
        BLADE;

/*     Nota comum a todos os $xHtml deste arquivo: mostra o shell estático
         renderizado pelo Blade com o slide 0 ativo (transform/aria-hidden como
         ficariam nesse instante); a troca de slides, autoplay, swipe e fade
         acontecem via Alpine em tempo de execução, a partir do
         x-data="carousel(...)" que não é reproduzido aqui. 
*/
    $fullHtml = <<<'HTML'
        <div role="region" aria-roledescription="carousel" aria-live="polite" tabindex="0" class="group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 h-80 w-full">
            <div class="relative size-full">
                <div data-carousel-index="0" role="group" aria-roledescription="slide" aria-hidden="false" style="transform: translateX(0%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-full-1/1100/480" alt="Trilha na serra" class="size-full object-cover select-none" draggable="false">
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/75 via-black/35 to-transparent px-5 pt-16 pb-10 sm:px-8">
                        <div class="max-w-xl text-left">
                            <h5 class="text-base font-semibold text-white sm:text-lg">Trilha na serra</h5>
                            <p class="mt-1 text-sm text-white/85">Paisagens abertas e ar puro no fim de semana.</p>
                        </div>
                    </div>
                </div>
                <div data-carousel-index="1" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(100%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-full-2/1100/480" alt="Costa atlântica" class="size-full object-cover select-none" draggable="false">
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/75 via-black/35 to-transparent px-5 pt-16 pb-10 sm:px-8">
                        <div class="max-w-xl text-left">
                            <h5 class="text-base font-semibold text-white sm:text-lg">Costa atlântica</h5>
                            <p class="mt-1 text-sm text-white/85">Praias desertas a poucas horas da cidade.</p>
                        </div>
                    </div>
                </div>
                <div data-carousel-index="2" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(200%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-full-3/1100/480" alt="Cidade à noite" class="size-full object-cover select-none" draggable="false">
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/75 via-black/35 to-transparent px-5 pt-16 pb-10 sm:px-8">
                        <div class="max-w-xl text-left">
                            <h5 class="text-base font-semibold text-white sm:text-lg">Cidade à noite</h5>
                            <p class="mt-1 text-sm text-white/85">Luzes, gastronomia e vida noturna.</p>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Slide anterior">
                <i class="bi bi-chevron-left text-base leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Próximo slide">
                <i class="bi bi-chevron-right text-base leading-none" aria-hidden="true"></i>
            </button>

            <div class="absolute bottom-3 left-1/2 z-10 flex -translate-x-1/2 items-center gap-1.5 rounded-full px-2 py-1.5 backdrop-blur-sm bg-black/25" role="tablist">
                <button type="button" role="tab" aria-selected="true" aria-label="Ir para o slide 1" class="h-1.5 rounded-full transition-all duration-300 w-6 bg-white"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 2" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 3" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
            </div>
        </div>
        HTML;

    $basicHtml = <<<'HTML'
        <div role="region" aria-roledescription="carousel" aria-live="polite" tabindex="0" class="group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 h-80 w-full">
            <div class="relative size-full">
                <div data-carousel-index="0" role="group" aria-roledescription="slide" aria-hidden="false" style="transform: translateX(0%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-1/900/400" alt="Slide 1" class="size-full object-cover select-none" draggable="false">
                </div>
                <div data-carousel-index="1" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(100%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-2/900/400" alt="Slide 2" class="size-full object-cover select-none" draggable="false">
                </div>
                <div data-carousel-index="2" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(200%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-3/900/400" alt="Slide 3" class="size-full object-cover select-none" draggable="false">
                </div>
            </div>
        </div>
        HTML;

    $controlsHtml = <<<'HTML'
        <div role="region" aria-roledescription="carousel" aria-live="polite" tabindex="0" class="group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 h-80 w-full">
            <div class="relative size-full">
                <div data-carousel-index="0" role="group" aria-roledescription="slide" aria-hidden="false" style="transform: translateX(0%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-4/900/400" alt="Slide 1" class="size-full object-cover select-none" draggable="false">
                </div>
                <div data-carousel-index="1" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(100%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-5/900/400" alt="Slide 2" class="size-full object-cover select-none" draggable="false">
                </div>
                <div data-carousel-index="2" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(200%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-6/900/400" alt="Slide 3" class="size-full object-cover select-none" draggable="false">
                </div>
            </div>

            <button type="button" class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Slide anterior">
                <i class="bi bi-chevron-left text-base leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Próximo slide">
                <i class="bi bi-chevron-right text-base leading-none" aria-hidden="true"></i>
            </button>
        </div>
        HTML;

    $indicatorsHtml = <<<'HTML'
        <div role="region" aria-roledescription="carousel" aria-live="polite" tabindex="0" class="group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 h-80 w-full">
            <div class="relative size-full">
                <div data-carousel-index="0" role="group" aria-roledescription="slide" aria-hidden="false" style="transform: translateX(0%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-7/900/400" alt="Slide 1" class="size-full object-cover select-none" draggable="false">
                </div>
                <div data-carousel-index="1" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(100%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-8/900/400" alt="Slide 2" class="size-full object-cover select-none" draggable="false">
                </div>
                <div data-carousel-index="2" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(200%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-9/900/400" alt="Slide 3" class="size-full object-cover select-none" draggable="false">
                </div>
            </div>

            <div class="absolute bottom-3 left-1/2 z-10 flex -translate-x-1/2 items-center gap-1.5 rounded-full px-2 py-1.5 backdrop-blur-sm bg-black/25" role="tablist">
                <button type="button" role="tab" aria-selected="true" aria-label="Ir para o slide 1" class="h-1.5 rounded-full transition-all duration-300 w-6 bg-white"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 2" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 3" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
            </div>
        </div>
        HTML;

    $fadeHtml = <<<'HTML'
        <div role="region" aria-roledescription="carousel" aria-live="polite" tabindex="0" class="group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 h-80 w-full">
            <div class="relative size-full">
                <div data-carousel-index="0" role="group" aria-roledescription="slide" aria-hidden="false" class="absolute inset-0 size-full">
                    <img src="https://picsum.photos/seed/carousel-13/900/400" alt="Crossfade" class="size-full object-cover select-none" draggable="false">
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/75 via-black/35 to-transparent px-5 pt-16 pb-10 sm:px-8">
                        <div class="max-w-xl text-left">
                            <h5 class="text-base font-semibold text-white sm:text-lg">Crossfade</h5>
                            <p class="mt-1 text-sm text-white/85">Transição por opacidade.</p>
                        </div>
                    </div>
                </div>
                <!-- slides 1 e 2: mesma estrutura, ocultos (x-show="active === index") até a troca de opacidade -->
            </div>

            <button type="button" class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Slide anterior">
                <i class="bi bi-chevron-left text-base leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Próximo slide">
                <i class="bi bi-chevron-right text-base leading-none" aria-hidden="true"></i>
            </button>

            <div class="absolute bottom-3 left-1/2 z-10 flex -translate-x-1/2 items-center gap-1.5 rounded-full px-2 py-1.5 backdrop-blur-sm bg-black/25" role="tablist">
                <button type="button" role="tab" aria-selected="true" aria-label="Ir para o slide 1" class="h-1.5 rounded-full transition-all duration-300 w-6 bg-white"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 2" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 3" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
            </div>
        </div>
        HTML;

    $customIntervalHtml = <<<'HTML'
        <div role="region" aria-roledescription="carousel" aria-live="polite" tabindex="0" class="group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 h-80 w-full">
            <div class="relative size-full">
                <div data-carousel-index="0" data-interval="1500" role="group" aria-roledescription="slide" aria-hidden="false" style="transform: translateX(0%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-16/900/400" alt="Slide 1" class="size-full object-cover select-none" draggable="false">
                </div>
                <div data-carousel-index="1" data-interval="6000" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(100%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-17/900/400" alt="Slide 2" class="size-full object-cover select-none" draggable="false">
                </div>
                <div data-carousel-index="2" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(200%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-18/900/400" alt="Slide 3" class="size-full object-cover select-none" draggable="false">
                </div>
            </div>

            <button type="button" class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Slide anterior">
                <i class="bi bi-chevron-left text-base leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Próximo slide">
                <i class="bi bi-chevron-right text-base leading-none" aria-hidden="true"></i>
            </button>

            <div class="absolute bottom-3 left-1/2 z-10 flex -translate-x-1/2 items-center gap-1.5 rounded-full px-2 py-1.5 backdrop-blur-sm bg-black/25" role="tablist">
                <button type="button" role="tab" aria-selected="true" aria-label="Ir para o slide 1" class="h-1.5 rounded-full transition-all duration-300 w-6 bg-white"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 2" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 3" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
            </div>
        </div>
        HTML;

    $darkHtml = <<<'HTML'
        <div role="region" aria-roledescription="carousel" aria-live="polite" tabindex="0" class="group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 h-80 w-full">
            <div class="relative size-full">
                <div data-carousel-index="0" role="group" aria-roledescription="slide" aria-hidden="false" style="transform: translateX(0%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-19/900/400" alt="Modo escuro" class="size-full object-cover select-none" draggable="false">
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/75 via-black/35 to-transparent px-5 pt-16 pb-10 sm:px-8">
                        <div class="max-w-xl text-left">
                            <h5 class="text-base font-semibold text-white sm:text-lg">Modo escuro</h5>
                            <p class="mt-1 text-sm text-white/85">Controles e indicadores escuros, para fotos claras.</p>
                        </div>
                    </div>
                </div>
                <div data-carousel-index="1" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(100%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-20/900/400" alt="Slide 2" class="size-full object-cover select-none" draggable="false">
                </div>
            </div>

            <button type="button" class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-white/85 text-neutral-900 shadow-sm backdrop-blur-sm hover:bg-white" aria-label="Slide anterior">
                <i class="bi bi-chevron-left text-base leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-white/85 text-neutral-900 shadow-sm backdrop-blur-sm hover:bg-white" aria-label="Próximo slide">
                <i class="bi bi-chevron-right text-base leading-none" aria-hidden="true"></i>
            </button>

            <div class="absolute bottom-3 left-1/2 z-10 flex -translate-x-1/2 items-center gap-1.5 rounded-full px-2 py-1.5 backdrop-blur-sm bg-white/50" role="tablist">
                <button type="button" role="tab" aria-selected="true" aria-label="Ir para o slide 1" class="h-1.5 rounded-full transition-all duration-300 w-6 bg-neutral-900"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 2" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-neutral-900/40 hover:bg-neutral-900/60"></button>
            </div>
        </div>
        HTML;

    $noAutoplayHtml = <<<'HTML'
        <div role="region" aria-roledescription="carousel" aria-live="polite" tabindex="0" class="group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 h-80 w-full">
            <div class="relative size-full">
                <div data-carousel-index="0" role="group" aria-roledescription="slide" aria-hidden="false" style="transform: translateX(0%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-21/900/400" alt="Slide 1" class="size-full object-cover select-none" draggable="false">
                </div>
                <div data-carousel-index="1" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(100%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-22/900/400" alt="Slide 2" class="size-full object-cover select-none" draggable="false">
                </div>
                <div data-carousel-index="2" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(200%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <img src="https://picsum.photos/seed/carousel-23/900/400" alt="Slide 3" class="size-full object-cover select-none" draggable="false">
                </div>
            </div>

            <button type="button" class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Slide anterior">
                <i class="bi bi-chevron-left text-base leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Próximo slide">
                <i class="bi bi-chevron-right text-base leading-none" aria-hidden="true"></i>
            </button>

            <div class="absolute bottom-3 left-1/2 z-10 flex -translate-x-1/2 items-center gap-1.5 rounded-full px-2 py-1.5 backdrop-blur-sm bg-black/25" role="tablist">
                <button type="button" role="tab" aria-selected="true" aria-label="Ir para o slide 1" class="h-1.5 rounded-full transition-all duration-300 w-6 bg-white"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 2" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 3" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
            </div>
        </div>
        HTML;

    $heroHtml = <<<'HTML'
        <div role="region" aria-roledescription="carousel" aria-live="polite" tabindex="0" class="group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 h-96 w-full">
            <div class="relative size-full">
                <div data-carousel-index="0" role="group" aria-roledescription="slide" aria-hidden="false" style="transform: translateX(0%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <div class="relative flex size-full items-end bg-primary p-8 sm:p-10">
                        <img src="https://picsum.photos/seed/carousel-hero-1/1200/600" alt="" class="absolute inset-0 size-full object-cover opacity-40">
                        <div class="relative max-w-lg text-primary-foreground">
                            <p class="mb-2 text-xs font-medium tracking-wide uppercase opacity-80">Lançamento</p>
                            <h5 class="text-2xl font-semibold tracking-tight sm:text-3xl">Construa interfaces mais rápido</h5>
                            <p class="mt-2 text-sm opacity-90">Componentes prontos, tokens do tema e docs ao vivo.</p>
                            <button type="button" class="btn btn-secondary btn-sm mt-4">Começar agora</button>
                        </div>
                    </div>
                </div>
                <div data-carousel-index="1" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(100%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <div class="relative flex size-full items-end bg-info p-8 sm:p-10">
                        <img src="https://picsum.photos/seed/carousel-hero-2/1200/600" alt="" class="absolute inset-0 size-full object-cover opacity-35">
                        <div class="relative max-w-lg text-info-foreground">
                            <p class="mb-2 text-xs font-medium tracking-wide uppercase opacity-80">Design system</p>
                            <h5 class="text-2xl font-semibold tracking-tight sm:text-3xl">Um visual consistente</h5>
                            <p class="mt-2 text-sm opacity-90">Botões, cards, tabs e alerts no mesmo idioma visual.</p>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Slide anterior">
                <i class="bi bi-chevron-left text-base leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Próximo slide">
                <i class="bi bi-chevron-right text-base leading-none" aria-hidden="true"></i>
            </button>

            <div class="absolute bottom-3 left-1/2 z-10 flex -translate-x-1/2 items-center gap-1.5 rounded-full px-2 py-1.5 backdrop-blur-sm bg-black/25" role="tablist">
                <button type="button" role="tab" aria-selected="true" aria-label="Ir para o slide 1" class="h-1.5 rounded-full transition-all duration-300 w-6 bg-white"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 2" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
            </div>
        </div>
        HTML;

    $cardsHtml = <<<'HTML'
        <div role="region" aria-roledescription="carousel" aria-live="polite" tabindex="0" class="group/carousel relative overflow-hidden rounded-md outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2 h-64 w-full">
            <div class="relative size-full">
                <div data-carousel-index="0" role="group" aria-roledescription="slide" aria-hidden="false" style="transform: translateX(0%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <div class="flex size-full flex-col justify-between bg-muted p-6">
                        <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1 px-2 py-0.5 text-[11px] rounded-md">Produto</span>
                        <div>
                            <h5 class="text-lg font-semibold text-foreground">Analytics em tempo real</h5>
                            <p class="mt-1 text-sm text-muted-foreground">Acompanhe métricas sem sair do painel.</p>
                        </div>
                    </div>
                </div>
                <div data-carousel-index="1" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(100%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <div class="flex size-full flex-col justify-between bg-success/10 p-6">
                        <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1 px-2 py-0.5 text-[11px] rounded-md">Sucesso</span>
                        <div>
                            <h5 class="text-lg font-semibold text-foreground">+38% de conversão</h5>
                            <p class="mt-1 text-sm text-muted-foreground">Resultado médio após adotar o funil guiado.</p>
                        </div>
                    </div>
                </div>
                <div data-carousel-index="2" role="group" aria-roledescription="slide" aria-hidden="true" style="transform: translateX(200%)" class="absolute inset-0 size-full transition-transform duration-500 ease-in-out">
                    <div class="flex size-full flex-col justify-between bg-warning/10 p-6">
                        <span class="inline-flex items-center font-medium leading-none bg-warning/15 text-warning gap-1 px-2 py-0.5 text-[11px] rounded-md">Dica</span>
                        <div>
                            <h5 class="text-lg font-semibold text-foreground">Pause no hover</h5>
                            <p class="mt-1 text-sm text-muted-foreground">O autoplay pausa quando o mouse está sobre o carrossel.</p>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="absolute top-1/2 left-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Slide anterior">
                <i class="bi bi-chevron-left text-base leading-none" aria-hidden="true"></i>
            </button>
            <button type="button" class="absolute top-1/2 right-3 z-10 flex size-10 -translate-y-1/2 items-center justify-center rounded-full opacity-90 transition-all hover:opacity-100 group-hover/carousel:opacity-100 bg-black/40 text-white shadow-sm backdrop-blur-sm hover:bg-black/60" aria-label="Próximo slide">
                <i class="bi bi-chevron-right text-base leading-none" aria-hidden="true"></i>
            </button>

            <div class="absolute bottom-3 left-1/2 z-10 flex -translate-x-1/2 items-center gap-1.5 rounded-full px-2 py-1.5 backdrop-blur-sm bg-black/25" role="tablist">
                <button type="button" role="tab" aria-selected="true" aria-label="Ir para o slide 1" class="h-1.5 rounded-full transition-all duration-300 w-6 bg-white"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 2" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
                <button type="button" role="tab" aria-selected="false" aria-label="Ir para o slide 3" class="h-1.5 rounded-full transition-all duration-300 w-1.5 bg-white/50 hover:bg-white/80"></button>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.carousel&gt;</code> exibe slides com autoplay, setas, indicadores em cápsula,
            legendas, slide ou <code>fade</code>, intervalo por slide, variante <code>dark</code> e swipe
            no toque — tudo via Alpine. Cada slide é um <code>&lt;x-ui.carousel.carousel-item&gt;</code> com
            <code>index</code> a partir de 0. Sem <code>image</code>, o slot aceita markup livre (hero, cards).
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Completo" :code="$fullCode" :html="$fullHtml">
            <x-slot:description>
                Controles + indicadores + legendas (padrão). Setas com blur; indicadores ativos ficam alongados.
            </x-slot:description>
            <x-ui.carousel class="w-full">
                <x-ui.carousel.carousel-item
                    index="0"
                    image="https://picsum.photos/seed/carousel-full-1/1100/480"
                    caption="Trilha na serra"
                    captionText="Paisagens abertas e ar puro no fim de semana."
                />
                <x-ui.carousel.carousel-item
                    index="1"
                    image="https://picsum.photos/seed/carousel-full-2/1100/480"
                    caption="Costa atlântica"
                    captionText="Praias desertas a poucas horas da cidade."
                />
                <x-ui.carousel.carousel-item
                    index="2"
                    image="https://picsum.photos/seed/carousel-full-3/1100/480"
                    caption="Cidade à noite"
                    captionText="Luzes, gastronomia e vida noturna."
                />
            </x-ui.carousel>
        </x-ui.example>

        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Só imagens — sem controles nem indicadores; troca a cada 5s.
            </x-slot:description>
            <x-ui.carousel :controls="false" :indicators="false" class="w-full">
                <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-1/900/400" />
                <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-2/900/400" />
                <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-3/900/400" />
            </x-ui.carousel>
        </x-ui.example>

        <x-ui.example title="Só controles" :code="$controlsCode" :html="$controlsHtml">
            <x-slot:description>
                Setas anterior/próximo, sem pontinhos.
            </x-slot:description>
            <x-ui.carousel :indicators="false" class="w-full">
                <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-4/900/400" />
                <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-5/900/400" />
                <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-6/900/400" />
            </x-ui.carousel>
        </x-ui.example>

        <x-ui.example title="Só indicadores" :code="$indicatorsCode" :html="$indicatorsHtml">
            <x-slot:description>
                Cápsulas clicáveis — a quantidade vem do número de slides.
            </x-slot:description>
            <x-ui.carousel :controls="false" class="w-full">
                <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-7/900/400" />
                <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-8/900/400" />
                <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-9/900/400" />
            </x-ui.carousel>
        </x-ui.example>

        <x-ui.example title="Crossfade" :code="$fadeCode" :html="$fadeHtml">
            <x-slot:description>
                <code>fade</code> troca o slide lateral por cruzamento de opacidade.
            </x-slot:description>
            <x-ui.carousel fade class="w-full">
                <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-13/900/400" caption="Crossfade" captionText="Transição por opacidade." />
                <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-14/900/400" />
                <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-15/900/400" />
            </x-ui.carousel>
        </x-ui.example>

        <x-ui.example title="Intervalo por slide" :code="$customIntervalCode" :html="$customIntervalHtml">
            <x-slot:description>
                <code>interval</code> no item sobrescreve o padrão só naquele slide (1,5s → 6s → 3s).
            </x-slot:description>
            <x-ui.carousel :interval="3000" class="w-full">
                <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-16/900/400" :interval="1500" />
                <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-17/900/400" :interval="6000" />
                <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-18/900/400" />
            </x-ui.carousel>
        </x-ui.example>

        <x-ui.example title="Variante escura" :code="$darkCode" :html="$darkHtml">
            <x-slot:description>
                <code>dark</code> escurece controles/indicadores — útil em fotos claras.
            </x-slot:description>
            <x-ui.carousel dark class="w-full">
                <x-ui.carousel.carousel-item
                    index="0"
                    image="https://picsum.photos/seed/carousel-19/900/400"
                    caption="Modo escuro"
                    captionText="Controles e indicadores escuros, para fotos claras."
                />
                <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-20/900/400" />
            </x-ui.carousel>
        </x-ui.example>

        <x-ui.example title="Sem autoplay" :code="$noAutoplayCode" :html="$noAutoplayHtml">
            <x-slot:description>
                <code>:interval="false"</code> — navegação só manual (setas, indicadores ou swipe).
            </x-slot:description>
            <x-ui.carousel :interval="false" class="w-full">
                <x-ui.carousel.carousel-item index="0" image="https://picsum.photos/seed/carousel-21/900/400" />
                <x-ui.carousel.carousel-item index="1" image="https://picsum.photos/seed/carousel-22/900/400" />
                <x-ui.carousel.carousel-item index="2" image="https://picsum.photos/seed/carousel-23/900/400" />
            </x-ui.carousel>
        </x-ui.example>

        <x-ui.example title="Hero com CTA" :code="$heroCode" :html="$heroHtml">
            <x-slot:description>
                Sem <code>image</code> no item: o slot vira o slide inteiro — overlay, título e botão.
            </x-slot:description>
            <x-ui.carousel height="h-96" :interval="6000" class="w-full">
                <x-ui.carousel.carousel-item index="0">
                    <div class="relative flex size-full items-end bg-primary p-8 sm:p-10">
                        <img
                            src="https://picsum.photos/seed/carousel-hero-1/1200/600"
                            alt=""
                            class="absolute inset-0 size-full object-cover opacity-40"
                        >
                        <div class="relative max-w-lg text-primary-foreground">
                            <p class="mb-2 text-xs font-medium tracking-wide uppercase opacity-80">Lançamento</p>
                            <h5 class="text-2xl font-semibold tracking-tight sm:text-3xl">Construa interfaces mais rápido</h5>
                            <p class="mt-2 text-sm opacity-90">Componentes prontos, tokens do tema e docs ao vivo.</p>
                            <x-ui.button color="secondary" variant="solid" size="sm" class="mt-4">Começar agora</x-ui.button>
                        </div>
                    </div>
                </x-ui.carousel.carousel-item>
                <x-ui.carousel.carousel-item index="1">
                    <div class="relative flex size-full items-end bg-info p-8 sm:p-10">
                        <img
                            src="https://picsum.photos/seed/carousel-hero-2/1200/600"
                            alt=""
                            class="absolute inset-0 size-full object-cover opacity-35"
                        >
                        <div class="relative max-w-lg text-info-foreground">
                            <p class="mb-2 text-xs font-medium tracking-wide uppercase opacity-80">Design system</p>
                            <h5 class="text-2xl font-semibold tracking-tight sm:text-3xl">Um visual consistente</h5>
                            <p class="mt-2 text-sm opacity-90">Botões, cards, tabs e alerts no mesmo idioma visual.</p>
                        </div>
                    </div>
                </x-ui.carousel.carousel-item>
            </x-ui.carousel>
        </x-ui.example>

        <x-ui.example title="Slides de conteúdo" :code="$cardsCode" :html="$cardsHtml">
            <x-slot:description>
                Carrossel sem foto — cards de feature/métrica com autoplay desligado.
            </x-slot:description>
            <x-ui.carousel height="h-64" :interval="false" class="w-full">
                <x-ui.carousel.carousel-item index="0">
                    <div class="flex size-full flex-col justify-between bg-muted p-6">
                        <x-ui.badge color="primary" variant="soft" size="sm">Produto</x-ui.badge>
                        <div>
                            <h5 class="text-lg font-semibold text-foreground">Analytics em tempo real</h5>
                            <p class="mt-1 text-sm text-muted-foreground">Acompanhe métricas sem sair do painel.</p>
                        </div>
                    </div>
                </x-ui.carousel.carousel-item>
                <x-ui.carousel.carousel-item index="1">
                    <div class="flex size-full flex-col justify-between bg-success/10 p-6">
                        <x-ui.badge color="success" variant="soft" size="sm">Sucesso</x-ui.badge>
                        <div>
                            <h5 class="text-lg font-semibold text-foreground">+38% de conversão</h5>
                            <p class="mt-1 text-sm text-muted-foreground">Resultado médio após adotar o funil guiado.</p>
                        </div>
                    </div>
                </x-ui.carousel.carousel-item>
                <x-ui.carousel.carousel-item index="2">
                    <div class="flex size-full flex-col justify-between bg-warning/10 p-6">
                        <x-ui.badge color="warning" variant="soft" size="sm">Dica</x-ui.badge>
                        <div>
                            <h5 class="text-lg font-semibold text-foreground">Pause no hover</h5>
                            <p class="mt-1 text-sm text-muted-foreground">O autoplay pausa quando o mouse está sobre o carrossel.</p>
                        </div>
                    </div>
                </x-ui.carousel.carousel-item>
            </x-ui.carousel>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="carousel" />
</x-ui.docs>
