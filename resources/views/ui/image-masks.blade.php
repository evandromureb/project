<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $demoSrc = 'https://picsum.photos/id/1015/240/240';

    $shapesCode = <<<'BLADE'
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="squircle" alt="Squircle" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="heart" alt="Heart" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="hexagon" alt="Hexagon" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="hexagon-2" alt="Hexagon 2" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="decagon" alt="Decagon" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="pentagon" alt="Pentagon" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="diamond" alt="Diamond" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="square" alt="Square" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="circle" alt="Circle" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="star" alt="Star" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="star-2" alt="Star 2" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="triangle" alt="Triangle" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="triangle-2" alt="Triangle 2" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="triangle-3" alt="Triangle 3" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="triangle-4" alt="Triangle 4" />
        BLADE;

/*     classes finais: "ui-image-mask ui-image-mask-{shape} {sizeClasses} {fitClasses}" (mask-image via CSS em resources/css) 
*/
    $shapesHtml = <<<'HTML'
        <img src="https://picsum.photos/id/1015/240/240" alt="Squircle" loading="lazy" class="ui-image-mask ui-image-mask-squircle size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Heart" loading="lazy" class="ui-image-mask ui-image-mask-heart size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Hexagon" loading="lazy" class="ui-image-mask ui-image-mask-hexagon size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Hexagon 2" loading="lazy" class="ui-image-mask ui-image-mask-hexagon-2 size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Decagon" loading="lazy" class="ui-image-mask ui-image-mask-decagon size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Pentagon" loading="lazy" class="ui-image-mask ui-image-mask-pentagon size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Diamond" loading="lazy" class="ui-image-mask ui-image-mask-diamond size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Square" loading="lazy" class="ui-image-mask ui-image-mask-square size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Circle" loading="lazy" class="ui-image-mask ui-image-mask-circle size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Star" loading="lazy" class="ui-image-mask ui-image-mask-star size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Star 2" loading="lazy" class="ui-image-mask ui-image-mask-star-2 size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Triangle" loading="lazy" class="ui-image-mask ui-image-mask-triangle size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Triangle 2" loading="lazy" class="ui-image-mask ui-image-mask-triangle-2 size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Triangle 3" loading="lazy" class="ui-image-mask ui-image-mask-triangle-3 size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Triangle 4" loading="lazy" class="ui-image-mask ui-image-mask-triangle-4 size-24 object-cover">
        HTML;

    $sizesCode = <<<'BLADE'
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="squircle" size="xs" alt="" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="squircle" size="sm" alt="" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="squircle" size="md" alt="" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="squircle" size="lg" alt="" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="squircle" size="xl" alt="" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="squircle" size="2xl" alt="" />
        BLADE;

/*     size: xs=size-10, sm=size-14, md=size-20 (padrão), lg=size-24, xl=size-32, 2xl=size-40 
*/
    $sizesHtml = <<<'HTML'
        <img src="https://picsum.photos/id/1015/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-squircle size-10 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-squircle size-14 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-squircle size-20 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-squircle size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-squircle size-32 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-squircle size-40 object-cover">
        HTML;

    $halfCode = <<<'BLADE'
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="circle" half="1" size="lg" alt="Metade esquerda" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="circle" half="2" size="lg" alt="Metade direita" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="heart" half="1" size="lg" alt="" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="heart" half="2" size="lg" alt="" />
        BLADE;

    $halfHtml = <<<'HTML'
        <img src="https://picsum.photos/id/1015/240/240" alt="Metade esquerda" loading="lazy" class="ui-image-mask ui-image-mask-circle ui-image-mask-half-1 size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="Metade direita" loading="lazy" class="ui-image-mask ui-image-mask-circle ui-image-mask-half-2 size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-heart ui-image-mask-half-1 size-24 object-cover">
        <img src="https://picsum.photos/id/1015/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-heart ui-image-mask-half-2 size-24 object-cover">
        HTML;

    $colorsCode = <<<'BLADE'
        <x-ui.image-mask shape="hexagon" color="primary" size="lg" />
        <x-ui.image-mask shape="star" color="warning" size="lg" />
        <x-ui.image-mask shape="heart" color="danger" size="lg" />
        <x-ui.image-mask shape="squircle" color="info" size="lg" />
        <x-ui.image-mask shape="diamond" color="success" size="lg" />
        <x-ui.image-mask shape="pentagon" color="secondary" size="lg" />
        BLADE;

/*     sem "src": renderiza um <div> com "bg-{color}" no lugar do <img>/fitClasses 
*/
    $colorsHtml = <<<'HTML'
        <div class="ui-image-mask ui-image-mask-hexagon size-24 bg-primary"></div>
        <div class="ui-image-mask ui-image-mask-star size-24 bg-warning"></div>
        <div class="ui-image-mask ui-image-mask-heart size-24 bg-danger"></div>
        <div class="ui-image-mask ui-image-mask-squircle size-24 bg-info"></div>
        <div class="ui-image-mask ui-image-mask-diamond size-24 bg-success"></div>
        <div class="ui-image-mask ui-image-mask-pentagon size-24 bg-secondary"></div>
        HTML;

    $linkCode = <<<'BLADE'
        <x-ui.image-mask
            src="https://picsum.photos/id/1015/240/240"
            shape="squircle"
            size="lg"
            href="#"
            alt="Abrir imagem"
        />
        BLADE;

    $linkHtml = <<<'HTML'
        <a href="#" class="inline-block">
            <img src="https://picsum.photos/id/1015/240/240" alt="Abrir imagem" loading="lazy" class="ui-image-mask ui-image-mask-squircle size-24 object-cover">
        </a>
        HTML;

    $fitCode = <<<'BLADE'
        <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="circle" fit="cover" size="lg" alt="cover" />
        <x-ui.image-mask src="https://picsum.photos/id/1015/400/200" shape="circle" fit="contain" size="lg" class="bg-muted" alt="contain" />
        BLADE;

    $fitHtml = <<<'HTML'
        <img src="https://picsum.photos/id/1015/240/240" alt="cover" loading="lazy" class="ui-image-mask ui-image-mask-circle size-24 object-cover">
        <img src="https://picsum.photos/id/1015/400/200" alt="contain" loading="lazy" class="ui-image-mask ui-image-mask-circle size-24 object-contain bg-muted">
        HTML;

    $galleryCode = <<<'BLADE'
        <div class="flex flex-wrap items-center gap-4">
            <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="squircle" size="lg" alt="" />
            <x-ui.image-mask src="https://picsum.photos/id/1016/240/240" shape="hexagon" size="lg" alt="" />
            <x-ui.image-mask src="https://picsum.photos/id/1018/240/240" shape="star-2" size="lg" alt="" />
            <x-ui.image-mask src="https://picsum.photos/id/1025/240/240" shape="heart" size="lg" alt="" />
            <x-ui.image-mask src="https://picsum.photos/id/1039/240/240" shape="diamond" size="lg" alt="" />
        </div>
        BLADE;

    $galleryHtml = <<<'HTML'
        <div class="flex flex-wrap items-center gap-4">
            <img src="https://picsum.photos/id/1015/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-squircle size-24 object-cover">
            <img src="https://picsum.photos/id/1016/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-hexagon size-24 object-cover">
            <img src="https://picsum.photos/id/1018/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-star-2 size-24 object-cover">
            <img src="https://picsum.photos/id/1025/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-heart size-24 object-cover">
            <img src="https://picsum.photos/id/1039/240/240" alt="" loading="lazy" class="ui-image-mask ui-image-mask-diamond size-24 object-cover">
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.image-mask&gt;</code> recorta uma imagem (ou um bloco colorido) em formas
            geométricas via CSS <code>mask-image</code>. Suporta 15 shapes, tamanhos, metade da máscara,
            cores de tema (sem <code>src</code>) e link opcional.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Todas as formas" :code="$shapesCode" :html="$shapesHtml">
            <x-slot:description>
                Use a prop <code>shape</code>: <code>squircle</code>, <code>heart</code>,
                <code>hexagon</code>, <code>hexagon-2</code>, <code>decagon</code>, <code>pentagon</code>,
                <code>diamond</code>, <code>square</code>, <code>circle</code>, <code>star</code>,
                <code>star-2</code>, <code>triangle</code>, <code>triangle-2</code>,
                <code>triangle-3</code>, <code>triangle-4</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-4">
                @foreach ([
                    'squircle', 'heart', 'hexagon', 'hexagon-2', 'decagon', 'pentagon', 'diamond',
                    'square', 'circle', 'star', 'star-2', 'triangle', 'triangle-2', 'triangle-3', 'triangle-4',
                ] as $shape)
                    <div class="flex flex-col items-center gap-2">
                        <x-ui.image-mask :src="$demoSrc" :shape="$shape" size="lg" :alt="$shape" />
                        <span class="text-[11px] text-muted-foreground">{{ $shape }}</span>
                    </div>
                @endforeach
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                Controle o tamanho com <code>size</code>: <code>xs</code>, <code>sm</code>,
                <code>md</code>, <code>lg</code>, <code>xl</code> ou <code>2xl</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-end gap-3">
                <x-ui.image-mask :src="$demoSrc" shape="squircle" size="xs" alt="" />
                <x-ui.image-mask :src="$demoSrc" shape="squircle" size="sm" alt="" />
                <x-ui.image-mask :src="$demoSrc" shape="squircle" size="md" alt="" />
                <x-ui.image-mask :src="$demoSrc" shape="squircle" size="lg" alt="" />
                <x-ui.image-mask :src="$demoSrc" shape="squircle" size="xl" alt="" />
                <x-ui.image-mask :src="$demoSrc" shape="squircle" size="2xl" alt="" />
            </div>
        </x-ui.example>

        <x-ui.example title="Metade da máscara" :code="$halfCode" :html="$halfHtml">
            <x-slot:description>
                <code>half="1"</code> mostra a metade inicial; <code>half="2"</code> a final
                (respeita RTL).
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-4">
                <x-ui.image-mask :src="$demoSrc" shape="circle" half="1" size="lg" alt="Metade esquerda" />
                <x-ui.image-mask :src="$demoSrc" shape="circle" half="2" size="lg" alt="Metade direita" />
                <x-ui.image-mask :src="$demoSrc" shape="heart" half="1" size="lg" alt="" />
                <x-ui.image-mask :src="$demoSrc" shape="heart" half="2" size="lg" alt="" />
            </div>
        </x-ui.example>

        <x-ui.example title="Formas coloridas (sem imagem)" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Sem <code>src</code>, use <code>color</code> com tokens do tema para um bloco mascarado.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-4">
                <x-ui.image-mask shape="hexagon" color="primary" size="lg" />
                <x-ui.image-mask shape="star" color="warning" size="lg" />
                <x-ui.image-mask shape="heart" color="danger" size="lg" />
                <x-ui.image-mask shape="squircle" color="info" size="lg" />
                <x-ui.image-mask shape="diamond" color="success" size="lg" />
                <x-ui.image-mask shape="pentagon" color="secondary" size="lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Como link" :code="$linkCode" :html="$linkHtml">
            <x-slot:description>
                Com <code>href</code>, a máscara é envolvida por um <code>&lt;a&gt;</code>.
            </x-slot:description>
            <x-ui.image-mask
                :src="$demoSrc"
                shape="squircle"
                size="lg"
                href="#"
                alt="Abrir imagem"
            />
        </x-ui.example>

        <x-ui.example title="Object-fit" :code="$fitCode" :html="$fitHtml">
            <x-slot:description>
                Ajuste o encaixe da imagem com <code>fit</code>: <code>cover</code> (padrão),
                <code>contain</code>, <code>fill</code>, <code>none</code>, <code>scale-down</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex flex-col items-center gap-2">
                    <x-ui.image-mask :src="$demoSrc" shape="circle" fit="cover" size="lg" alt="cover" />
                    <span class="text-[11px] text-muted-foreground">cover</span>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <x-ui.image-mask
                        src="https://picsum.photos/id/1015/400/200"
                        shape="circle"
                        fit="contain"
                        size="lg"
                        class="bg-muted"
                        alt="contain"
                    />
                    <span class="text-[11px] text-muted-foreground">contain</span>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Galeria" :code="$galleryCode" :html="$galleryHtml">
            <x-slot:description>
                Combine shapes diferentes numa mesma fileira.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-4">
                <x-ui.image-mask src="https://picsum.photos/id/1015/240/240" shape="squircle" size="lg" alt="" />
                <x-ui.image-mask src="https://picsum.photos/id/1016/240/240" shape="hexagon" size="lg" alt="" />
                <x-ui.image-mask src="https://picsum.photos/id/1018/240/240" shape="star-2" size="lg" alt="" />
                <x-ui.image-mask src="https://picsum.photos/id/1025/240/240" shape="heart" size="lg" alt="" />
                <x-ui.image-mask src="https://picsum.photos/id/1039/240/240" shape="diamond" size="lg" alt="" />
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="image-mask" />
</x-ui.docs>
