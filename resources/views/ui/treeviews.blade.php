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
<x-ui.treeview :expanded="['docs', 'src']">
    <x-ui.treeview.treeview-item name="docs" label="Documents">
        <x-ui.treeview.treeview-item name="resume" label="resume.pdf" icon="bi-file-earmark-pdf" />
        <x-ui.treeview.treeview-item name="cover" label="cover-letter.docx" icon="bi-file-earmark-word" />
    </x-ui.treeview.treeview-item>
    <x-ui.treeview.treeview-item name="src" label="Source">
        <x-ui.treeview.treeview-item name="app-js" label="app.js" icon="bi-filetype-js" />
        <x-ui.treeview.treeview-item name="app-css" label="app.css" icon="bi-filetype-css" />
    </x-ui.treeview.treeview-item>
    <x-ui.treeview.treeview-item name="readme" label="README.md" icon="bi-markdown" />
</x-ui.treeview>
BLADE;

    $selectableCode = <<<'BLADE'
<x-ui.treeview selectable :expanded="['team']" selected="ana">
    <x-ui.treeview.treeview-item name="team" label="Equipe" icon="bi-people">
        <x-ui.treeview.treeview-item name="ana" label="Ana Silva" icon="bi-person" />
        <x-ui.treeview.treeview-item name="bruno" label="Bruno Costa" icon="bi-person" />
        <x-ui.treeview.treeview-item name="carla" label="Carla Dias" icon="bi-person" />
    </x-ui.treeview.treeview-item>
    <x-ui.treeview.treeview-item name="archive" label="Arquivados" icon="bi-archive" />
</x-ui.treeview>
BLADE;

    $multipleCode = <<<'BLADE'
<x-ui.treeview selectable multiple :expanded="['langs']" :selected="['php', 'js']">
    <x-ui.treeview.treeview-item name="langs" label="Linguagens">
        <x-ui.treeview.treeview-item name="php" label="PHP" icon="bi-filetype-php" />
        <x-ui.treeview.treeview-item name="js" label="JavaScript" icon="bi-filetype-js" />
        <x-ui.treeview.treeview-item name="go" label="Go" icon="bi-filetype-tsx" />
    </x-ui.treeview.treeview-item>
</x-ui.treeview>
BLADE;

    $checkableCode = <<<'BLADE'
<x-ui.treeview checkable :expanded="['permissions']" :checked="['read']">
    <x-ui.treeview.treeview-item name="permissions" label="Permissões">
        <x-ui.treeview.treeview-item name="read" label="Leitura" />
        <x-ui.treeview.treeview-item name="write" label="Escrita" />
        <x-ui.treeview.treeview-item name="admin" label="Administração">
            <x-ui.treeview.treeview-item name="users" label="Usuários" />
            <x-ui.treeview.treeview-item name="billing" label="Cobrança" />
        </x-ui.treeview.treeview-item>
    </x-ui.treeview.treeview-item>
</x-ui.treeview>
BLADE;

    $linesCode = <<<'BLADE'
<x-ui.treeview lines :expanded="['project', 'app']">
    <x-ui.treeview.treeview-item name="project" label="projeto">
        <x-ui.treeview.treeview-item name="app" label="app">
            <x-ui.treeview.treeview-item name="models" label="Models" icon="bi-database" />
            <x-ui.treeview.treeview-item name="http" label="Http" icon="bi-globe" />
        </x-ui.treeview.treeview-item>
        <x-ui.treeview.treeview-item name="routes" label="routes" icon="bi-signpost-split" />
    </x-ui.treeview.treeview-item>
</x-ui.treeview>
BLADE;

    $actionsCode = <<<'BLADE'
<x-ui.treeview actions :expanded="['a']">
    <x-ui.treeview.treeview-item name="a" label="Pasta A">
        <x-ui.treeview.treeview-item name="a1" label="arquivo-a1.txt" />
        <x-ui.treeview.treeview-item name="a2" label="arquivo-a2.txt" />
    </x-ui.treeview.treeview-item>
    <x-ui.treeview.treeview-item name="b" label="Pasta B">
        <x-ui.treeview.treeview-item name="b1" label="arquivo-b1.txt" />
    </x-ui.treeview.treeview-item>
</x-ui.treeview>
BLADE;

    $indicatorCode = <<<'BLADE'
<x-ui.treeview indicator="plus" :expanded="['inbox']" color="success">
    <x-ui.treeview.treeview-item name="inbox" label="Caixa de entrada" badge="12">
        <x-ui.treeview.treeview-item name="starred" label="Com estrela" icon="bi-star" />
        <x-ui.treeview.treeview-item name="sent" label="Enviados" icon="bi-send" />
    </x-ui.treeview.treeview-item>
    <x-ui.treeview.treeview-item name="spam" label="Spam" icon="bi-exclamation-octagon" badge="3" />
</x-ui.treeview>
BLADE;

    $sizesCode = <<<'BLADE'
<x-ui.treeview size="sm" :expanded="['sm']">
    <x-ui.treeview.treeview-item name="sm" label="Compacto">
        <x-ui.treeview.treeview-item name="sm-1" label="Item" />
    </x-ui.treeview.treeview-item>
</x-ui.treeview>

<x-ui.treeview size="lg" :expanded="['lg']" class="mt-4">
    <x-ui.treeview.treeview-item name="lg" label="Grande">
        <x-ui.treeview.treeview-item name="lg-1" label="Item" />
    </x-ui.treeview.treeview-item>
</x-ui.treeview>
BLADE;

    $flushCode = <<<'BLADE'
<x-ui.treeview variant="flush" :expanded="['nav']">
    <x-ui.treeview.treeview-item name="nav" label="Navegação">
        <x-ui.treeview.treeview-item name="home" label="Início" icon="bi-house" href="#" />
        <x-ui.treeview.treeview-item name="settings" label="Configurações" icon="bi-gear" href="#" />
    </x-ui.treeview.treeview-item>
</x-ui.treeview>
BLADE;

    $disabledCode = <<<'BLADE'
<x-ui.treeview :expanded="['root']">
    <x-ui.treeview.treeview-item name="root" label="Projeto">
        <x-ui.treeview.treeview-item name="ok" label="Disponível" />
        <x-ui.treeview.treeview-item name="locked" label="Bloqueado" disabled />
    </x-ui.treeview.treeview-item>
</x-ui.treeview>
BLADE;

    $colorsCode = <<<'BLADE'
<x-ui.treeview selectable color="danger" :expanded="['alerts']" selected="critical">
    <x-ui.treeview.treeview-item name="alerts" label="Alertas">
        <x-ui.treeview.treeview-item name="critical" label="Crítico" icon="bi-exclamation-triangle" />
        <x-ui.treeview.treeview-item name="warning" label="Atenção" icon="bi-exclamation-circle" />
    </x-ui.treeview.treeview-item>
</x-ui.treeview>
BLADE;

    $slotsCode = <<<'BLADE'
<x-ui.treeview :expanded="['people']">
    <x-ui.treeview.treeview-item name="people" label="Pessoas">
        <x-ui.treeview.treeview-item name="ana" label="Ana Silva">
            <x-slot:start>
                <x-ui.avatar initials="AS" size="xs" color="primary" circle />
            </x-slot:start>
            <x-slot:end>
                <x-ui.badge size="sm" pill variant="soft" color="success">Online</x-ui.badge>
            </x-slot:end>
        </x-ui.treeview.treeview-item>
        <x-ui.treeview.treeview-item name="bruno" label="Bruno Costa">
            <x-slot:start>
                <x-ui.avatar initials="BC" size="xs" color="info" circle />
            </x-slot:start>
        </x-ui.treeview.treeview-item>
    </x-ui.treeview.treeview-item>
</x-ui.treeview>
BLADE;

    $draggableCode = <<<'BLADE'
<x-ui.treeview draggable :expanded="['src', 'components']">
    <x-ui.treeview.treeview-item name="src" label="src">
        <x-ui.treeview.treeview-item name="components" label="components">
            <x-ui.treeview.treeview-item name="button" label="button.blade.php" icon="bi-filetype-php" />
            <x-ui.treeview.treeview-item name="card" label="card.blade.php" icon="bi-filetype-php" />
        </x-ui.treeview.treeview-item>
        <x-ui.treeview.treeview-item name="app-js" label="app.js" icon="bi-filetype-js" />
    </x-ui.treeview.treeview-item>
    <x-ui.treeview.treeview-item name="readme" label="README.md" icon="bi-markdown" />
    <x-ui.treeview.treeview-item name="locked" label="travado.txt" disable-drag />
</x-ui.treeview>
BLADE;

    // ---------------------------------------------------------------------
    // Geradores do HTML "puro" (sem Livewire/Alpine) equivalente ao que
    // <x-ui.treeview>/<x-ui.treeview.treeview-item> produzem, no estado
    // inicial (antes de qualquer clique): nós listados em "expanded" abertos,
    // demais ocultos via atributo "hidden". Réplica das classes/estrutura de
    // resources/views/components/ui/treeview/{treeview,treeview-item}.blade.php
    // e da lógica de resources/js/treeview.js (isIndeterminate etc.).
    // ---------------------------------------------------------------------

    $treeviewColorSoft = fn (string $color): string => match ($color) {
        'primary' => 'bg-primary/15 text-primary',
        'secondary' => 'bg-secondary/15 text-secondary',
        'success' => 'bg-success/15 text-success',
        'warning' => 'bg-warning/15 text-warning',
        'danger' => 'bg-danger/15 text-danger',
        'info' => 'bg-info/15 text-info',
        default => 'bg-primary/15 text-primary',
    };

    $treeviewColorSelectedBg = fn (string $color): string => match ($color) {
        'primary' => 'bg-primary/10 text-primary',
        'secondary' => 'bg-secondary/10 text-secondary',
        'success' => 'bg-success/10 text-success',
        'warning' => 'bg-warning/10 text-warning',
        'danger' => 'bg-danger/10 text-danger',
        'info' => 'bg-info/10 text-info',
        default => 'bg-primary/10 text-primary',
    };

    $treeviewColorIconText = fn (string $color): string => match ($color) {
        'primary' => 'text-primary',
        'secondary' => 'text-secondary',
        'success' => 'text-success',
        'warning' => 'text-warning',
        'danger' => 'text-danger',
        'info' => 'text-info',
        default => 'text-primary',
    };

    $treeviewAvatarHtml = fn (string $initials, string $color): string => '<div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-6 text-xs '.$treeviewColorSoft($color).' rounded-full"><span>'.$initials.'</span></div>';

    $treeviewBadgeHtml = fn (string $label, string $color): string => '<span class="inline-flex items-center font-medium leading-none '.$treeviewColorSoft($color).' gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>'.$label.'</span></span>';

    $treeviewFlattenNames = function (array $nodes) use (&$treeviewFlattenNames): array {
        $names = [];
        foreach ($nodes as $node) {
            $names[] = $node['name'];
            $names = array_merge($names, $treeviewFlattenNames($node['children'] ?? []));
        }

        return $names;
    };

    $treeviewDescendantNames = function (array $node) use (&$treeviewDescendantNames): array {
        $names = [];
        foreach ($node['children'] ?? [] as $child) {
            $names[] = $child['name'];
            $names = array_merge($names, $treeviewDescendantNames($child));
        }

        return $names;
    };

    $renderTreeviewNode = function (array $node, array $ctx) use (&$renderTreeviewNode, &$treeviewDescendantNames, $treeviewColorSelectedBg, $treeviewColorIconText, $treeviewColorSoft): string {
        $name = $node['name'];
        $label = $node['label'];
        $children = $node['children'] ?? [];
        $hasChildren = $children !== [];
        $disabled = $node['disabled'] ?? false;
        $href = $node['href'] ?? null;
        $disableDrag = $node['disableDrag'] ?? false;
        $badge = $node['badge'] ?? null;
        $startHtml = $node['start'] ?? null;
        $endHtml = $node['end'] ?? null;

        $draggable = $ctx['draggable'];
        $itemDraggable = $draggable && ! $disableDrag && ! $disabled;
        $showGroup = $hasChildren || $draggable;
        $isLink = filled($href);

        $icon = $node['icon'] ?? null;
        $iconOpen = $node['iconOpen'] ?? null;

        if (! $icon && ! $startHtml) {
            $icon = $hasChildren ? 'bi-folder' : 'bi-file-earmark';
        }

        if ($hasChildren && ! $iconOpen && $icon === 'bi-folder') {
            $iconOpen = 'bi-folder2-open';
        }

        $expanded = in_array($name, $ctx['expanded'], true);

        $paddingClasses = match ($ctx['size']) {
            'sm' => 'gap-1.5 px-1.5 py-1 text-xs',
            'lg' => 'gap-2.5 px-2.5 py-2 text-base',
            default => 'gap-2 px-2 py-1.5 text-sm',
        };

        $indicatorIcon = match ($ctx['indicator']) {
            'plus' => null,
            'caret' => 'bi-caret-right-fill',
            default => 'bi-chevron-right',
        };

        $isSelected = $ctx['selectable']
            ? ($ctx['multiple'] ? in_array($name, (array) $ctx['selected'], true) : $ctx['selected'] === $name)
            : false;

        $isChecked = in_array($name, $ctx['checked'], true);

        $isIndeterminate = false;

        if ($ctx['checkable'] && $ctx['cascade'] && $hasChildren) {
            $desc = $treeviewDescendantNames($node);

            if ($desc !== []) {
                $checkedCount = count(array_intersect($desc, $ctx['checked']));
                $isIndeterminate = $checkedCount > 0 && $checkedCount < count($desc);
            }
        }

        $itemClasses = trim(implode(' ', array_filter([
            'ui-treeview-item group relative flex w-full min-w-0 items-center rounded-md outline-none transition-colors focus-visible:outline-2 focus-visible:outline-offset-[-2px] focus-visible:outline-primary',
            $paddingClasses,
            $disabled ? 'cursor-not-allowed opacity-50' : 'hover:bg-muted',
            (! $disabled && ($ctx['selectable'] || $ctx['checkable'] || $hasChildren || $isLink || $draggable)) ? 'cursor-pointer' : '',
            $isSelected ? $treeviewColorSelectedBg($ctx['color']) : '',
        ])));

        $tabindex = $name === $ctx['firstName'] ? '0' : '-1';

        $attrs = [
            'role="treeitem"',
            'data-treeview-name="'.$name.'"',
            'data-treeview-branch="'.($hasChildren ? 'true' : 'false').'"',
        ];

        if ($disabled) {
            $attrs[] = 'data-treeview-disabled';
        }

        if ($disableDrag) {
            $attrs[] = 'data-treeview-undraggable';
        }

        if ($hasChildren || $draggable) {
            $attrs[] = 'aria-expanded="'.($expanded ? 'true' : 'false').'"';
        }

        if ($ctx['selectable']) {
            $attrs[] = 'aria-selected="'.($isSelected ? 'true' : 'false').'"';
        }

        if ($ctx['checkable']) {
            $attrs[] = 'aria-checked="'.($isIndeterminate ? 'mixed' : ($isChecked ? 'true' : 'false')).'"';
        }

        if ($disabled) {
            $attrs[] = 'aria-disabled="true"';
        }

        $attrs[] = 'tabindex="'.$tabindex.'"';
        $attrs[] = 'class="'.$itemClasses.'"';

        $item = '<div '.implode(' ', $attrs).'>'."\n";

        if ($itemDraggable) {
            $item .= '<button type="button" tabindex="-1" class="inline-flex size-5 shrink-0 cursor-grab items-center justify-center rounded text-muted-foreground transition-colors hover:bg-muted-foreground/10 hover:text-foreground active:cursor-grabbing" aria-label="Arrastar item">'
                .'<i class="bi bi-grip-vertical text-sm leading-none" aria-hidden="true"></i></button>'."\n";
        }

        if ($hasChildren) {
            if ($ctx['indicator'] === 'plus') {
                $toggleIconClass = 'bi '.($expanded ? 'bi-dash-lg' : 'bi-plus-lg').' text-xs leading-none';
            } else {
                $toggleIconClass = 'bi '.$indicatorIcon.' text-[0.65rem] leading-none transition-transform duration-200'.($expanded ? ' rotate-90' : '');
            }

            $item .= '<button type="button" tabindex="-1" class="inline-flex size-5 shrink-0 items-center justify-center rounded text-muted-foreground transition-colors hover:bg-muted-foreground/10 hover:text-foreground" aria-hidden="true">'
                .'<i class="'.$toggleIconClass.'"></i></button>'."\n";
        } else {
            $item .= '<span class="inline-flex size-5 shrink-0" aria-hidden="true"></span>'."\n";
        }

        if ($ctx['checkable']) {
            $checkboxAttrs = 'type="checkbox" tabindex="-1" class="size-3.5 shrink-0 rounded border-border text-primary focus:ring-primary/40"';

            if ($disabled) {
                $checkboxAttrs .= ' disabled';
            }

            if ($isChecked) {
                $checkboxAttrs .= ' checked';
            }

            if ($isIndeterminate) {
                $checkboxAttrs .= ' indeterminate';
            }

            $item .= '<input '.$checkboxAttrs.' aria-hidden="true" />'."\n";
        }

        if ($startHtml) {
            $item .= '<span class="flex shrink-0 items-center" aria-hidden="true">'.$startHtml.'</span>'."\n";
        } elseif (filled($icon)) {
            $displayIcon = ($expanded && $iconOpen) ? $iconOpen : $icon;
            $iconColorClass = $isSelected ? ' '.$treeviewColorIconText($ctx['color']) : '';
            $item .= '<i class="bi '.$displayIcon.' shrink-0 text-base leading-none text-muted-foreground'.$iconColorClass.'" aria-hidden="true"></i>'."\n";
        }

        if ($isLink) {
            $linkClasses = 'min-w-0 flex-1 truncate text-left no-underline '.($disabled ? 'pointer-events-none' : 'text-foreground');
            $linkAttrs = $disabled ? ' tabindex="-1" aria-disabled="true"' : '';
            $item .= '<a href="'.$href.'" class="'.$linkClasses.'"'.$linkAttrs.'>'.$label.'</a>'."\n";
        } else {
            $item .= '<span class="min-w-0 flex-1 truncate text-left">'.$label.'</span>'."\n";
        }

        if (filled($badge)) {
            $item .= '<span class="inline-flex items-center font-medium leading-none '.$treeviewColorSoft($ctx['color']).' gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>'.$badge.'</span></span>'."\n";
        }

        if ($endHtml) {
            $item .= '<span class="flex shrink-0 items-center gap-1.5">'.$endHtml.'</span>'."\n";
        }

        $item .= '</div>'."\n";

        $group = '';

        if ($showGroup) {
            $groupClasses = 'ui-treeview-group m-0 list-none p-0 ps-4'.($ctx['lines'] ? ' ui-treeview-group-lines' : '');
            $hiddenAttr = $expanded ? '' : ' hidden';

            $childrenHtml = '';
            foreach ($children as $child) {
                $childrenHtml .= $renderTreeviewNode($child, $ctx);
            }

            $group = '<ul role="group" class="'.$groupClasses.'"'.$hiddenAttr.'>'."\n".$childrenHtml.'</ul>'."\n";
        }

        return '<li class="ui-treeview-node relative">'."\n".$item.$group.'</li>'."\n";
    };

    $renderTreeview = function (array $nodes, array $opts = []) use (&$renderTreeviewNode, &$treeviewFlattenNames): string {
        $ctx = [
            'selectable' => $opts['selectable'] ?? false,
            'multiple' => $opts['multiple'] ?? false,
            'checkable' => $opts['checkable'] ?? false,
            'checked' => $opts['checked'] ?? [],
            'cascade' => $opts['cascade'] ?? true,
            'color' => $opts['color'] ?? 'primary',
            'size' => $opts['size'] ?? 'md',
            'indicator' => $opts['indicator'] ?? 'chevron',
            'draggable' => $opts['draggable'] ?? false,
            'expanded' => $opts['expanded'] ?? [],
            'lines' => $opts['lines'] ?? false,
        ];
        $ctx['selected'] = $opts['selected'] ?? ($ctx['multiple'] ? [] : null);

        $names = $treeviewFlattenNames($nodes);
        $ctx['firstName'] = $names[0] ?? null;

        $variant = $opts['variant'] ?? 'default';
        $variantClasses = $variant === 'flush' ? 'rounded-none border-0' : 'rounded-md border border-border p-2';
        $actions = $opts['actions'] ?? false;
        $ariaLabel = $opts['ariaLabel'] ?? 'Árvore';

        $html = '<div data-treeview data-variant="'.$variant.'" data-size="'.$ctx['size'].'" data-color="'.$ctx['color'].'"'.($ctx['draggable'] ? ' data-treeview-draggable' : '').' class="ui-treeview w-full '.$variantClasses.'">'."\n";

        if ($actions) {
            $html .= <<<HTML
                <div class="mb-2 flex flex-wrap items-center gap-2 border-b border-border pb-2">
                    <button type="button" class="inline-flex items-center gap-1.5 rounded-md px-2 py-1 text-xs font-medium text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                        <i class="bi bi-arrows-expand text-sm leading-none" aria-hidden="true"></i>
                        Expandir tudo
                    </button>
                    <button type="button" class="inline-flex items-center gap-1.5 rounded-md px-2 py-1 text-xs font-medium text-muted-foreground transition-colors hover:bg-muted hover:text-foreground focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                        <i class="bi bi-arrows-collapse text-sm leading-none" aria-hidden="true"></i>
                        Recolher tudo
                    </button>
                </div>

                HTML;
        }

        $rootClasses = 'ui-treeview-root m-0 list-none p-0'.($ctx['lines'] ? ' ui-treeview-lines' : '');

        $html .= '<ul role="tree" aria-label="'.$ariaLabel.'" class="'.$rootClasses.'">'."\n";

        foreach ($nodes as $node) {
            $html .= $renderTreeviewNode($node, $ctx);
        }

        $html .= '</ul>'."\n".'</div>';

        return $html;
    };

    $basicHtml = $renderTreeview([
        ['name' => 'docs', 'label' => 'Documents', 'children' => [
            ['name' => 'resume', 'label' => 'resume.pdf', 'icon' => 'bi-file-earmark-pdf'],
            ['name' => 'cover', 'label' => 'cover-letter.docx', 'icon' => 'bi-file-earmark-word'],
        ]],
        ['name' => 'src', 'label' => 'Source', 'children' => [
            ['name' => 'app-js', 'label' => 'app.js', 'icon' => 'bi-filetype-js'],
            ['name' => 'app-css', 'label' => 'app.css', 'icon' => 'bi-filetype-css'],
        ]],
        ['name' => 'readme', 'label' => 'README.md', 'icon' => 'bi-markdown'],
    ], ['expanded' => ['docs', 'src']]);

    $selectableHtml = $renderTreeview([
        ['name' => 'team', 'label' => 'Equipe', 'icon' => 'bi-people', 'children' => [
            ['name' => 'ana', 'label' => 'Ana Silva', 'icon' => 'bi-person'],
            ['name' => 'bruno', 'label' => 'Bruno Costa', 'icon' => 'bi-person'],
            ['name' => 'carla', 'label' => 'Carla Dias', 'icon' => 'bi-person'],
        ]],
        ['name' => 'archive', 'label' => 'Arquivados', 'icon' => 'bi-archive'],
    ], ['selectable' => true, 'expanded' => ['team'], 'selected' => 'ana']);

    $multipleHtml = $renderTreeview([
        ['name' => 'langs', 'label' => 'Linguagens', 'children' => [
            ['name' => 'php', 'label' => 'PHP', 'icon' => 'bi-filetype-php'],
            ['name' => 'js', 'label' => 'JavaScript', 'icon' => 'bi-filetype-js'],
            ['name' => 'go', 'label' => 'Go', 'icon' => 'bi-filetype-tsx'],
        ]],
    ], ['selectable' => true, 'multiple' => true, 'expanded' => ['langs'], 'selected' => ['php', 'js']]);

    $checkableHtml = $renderTreeview([
        ['name' => 'permissions', 'label' => 'Permissões', 'children' => [
            ['name' => 'read', 'label' => 'Leitura'],
            ['name' => 'write', 'label' => 'Escrita'],
            ['name' => 'admin', 'label' => 'Administração', 'children' => [
                ['name' => 'users', 'label' => 'Usuários'],
                ['name' => 'billing', 'label' => 'Cobrança'],
            ]],
        ]],
    ], ['checkable' => true, 'expanded' => ['permissions'], 'checked' => ['read']]);

    $linesHtml = $renderTreeview([
        ['name' => 'project', 'label' => 'projeto', 'children' => [
            ['name' => 'app', 'label' => 'app', 'children' => [
                ['name' => 'models', 'label' => 'Models', 'icon' => 'bi-database'],
                ['name' => 'http', 'label' => 'Http', 'icon' => 'bi-globe'],
            ]],
            ['name' => 'routes', 'label' => 'routes', 'icon' => 'bi-signpost-split'],
        ]],
    ], ['lines' => true, 'expanded' => ['project', 'app']]);

    $actionsHtml = $renderTreeview([
        ['name' => 'a', 'label' => 'Pasta A', 'children' => [
            ['name' => 'a1', 'label' => 'arquivo-a1.txt'],
            ['name' => 'a2', 'label' => 'arquivo-a2.txt'],
        ]],
        ['name' => 'b', 'label' => 'Pasta B', 'children' => [
            ['name' => 'b1', 'label' => 'arquivo-b1.txt'],
        ]],
    ], ['actions' => true, 'expanded' => ['a']]);

    $indicatorHtml = $renderTreeview([
        ['name' => 'inbox', 'label' => 'Caixa de entrada', 'badge' => '12', 'children' => [
            ['name' => 'starred', 'label' => 'Com estrela', 'icon' => 'bi-star'],
            ['name' => 'sent', 'label' => 'Enviados', 'icon' => 'bi-send'],
        ]],
        ['name' => 'spam', 'label' => 'Spam', 'icon' => 'bi-exclamation-octagon', 'badge' => '3'],
    ], ['indicator' => 'plus', 'expanded' => ['inbox'], 'color' => 'success']);

    $sizesHtml = $renderTreeview([
        ['name' => 'sm', 'label' => 'Compacto', 'children' => [
            ['name' => 'sm-1', 'label' => 'Item'],
        ]],
    ], ['size' => 'sm', 'expanded' => ['sm']])
        ."\n\n"
        .$renderTreeview([
            ['name' => 'lg', 'label' => 'Grande', 'children' => [
                ['name' => 'lg-1', 'label' => 'Item'],
            ]],
        ], ['size' => 'lg', 'expanded' => ['lg']]);

    $flushHtml = $renderTreeview([
        ['name' => 'nav', 'label' => 'Navegação', 'children' => [
            ['name' => 'home', 'label' => 'Início', 'icon' => 'bi-house', 'href' => '#'],
            ['name' => 'settings', 'label' => 'Configurações', 'icon' => 'bi-gear', 'href' => '#'],
        ]],
    ], ['variant' => 'flush', 'expanded' => ['nav']]);

    $disabledHtml = $renderTreeview([
        ['name' => 'root', 'label' => 'Projeto', 'children' => [
            ['name' => 'ok', 'label' => 'Disponível'],
            ['name' => 'locked', 'label' => 'Bloqueado', 'disabled' => true],
        ]],
    ], ['expanded' => ['root']]);

    $colorsHtml = $renderTreeview([
        ['name' => 'alerts', 'label' => 'Alertas', 'children' => [
            ['name' => 'critical', 'label' => 'Crítico', 'icon' => 'bi-exclamation-triangle'],
            ['name' => 'warning', 'label' => 'Atenção', 'icon' => 'bi-exclamation-circle'],
        ]],
    ], ['selectable' => true, 'color' => 'danger', 'expanded' => ['alerts'], 'selected' => 'critical']);

    $slotsHtml = $renderTreeview([
        ['name' => 'people', 'label' => 'Pessoas', 'children' => [
            ['name' => 'ana', 'label' => 'Ana Silva', 'start' => $treeviewAvatarHtml('AS', 'primary'), 'end' => $treeviewBadgeHtml('Online', 'success')],
            ['name' => 'bruno', 'label' => 'Bruno Costa', 'start' => $treeviewAvatarHtml('BC', 'info')],
        ]],
    ], ['expanded' => ['people']]);

    $draggableHtml = $renderTreeview([
        ['name' => 'src', 'label' => 'src', 'children' => [
            ['name' => 'components', 'label' => 'components', 'children' => [
                ['name' => 'button', 'label' => 'button.blade.php', 'icon' => 'bi-filetype-php'],
                ['name' => 'card', 'label' => 'card.blade.php', 'icon' => 'bi-filetype-php'],
            ]],
            ['name' => 'app-js', 'label' => 'app.js', 'icon' => 'bi-filetype-js'],
        ]],
        ['name' => 'readme', 'label' => 'README.md', 'icon' => 'bi-markdown'],
        ['name' => 'locked', 'label' => 'travado.txt', 'disableDrag' => true],
    ], ['draggable' => true, 'expanded' => ['src', 'components']]);
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.treeview&gt;</code> exibe hierarquias expansíveis (pastas, menus, permissões).
            Aninhe <code>&lt;x-ui.treeview.treeview-item&gt;</code> para montar a árvore. Suporta expand/collapse,
            seleção simples ou múltipla, checkboxes com cascata (pai ↔ filhos + estado indeterminado),
            drag-and-drop (<code>draggable</code> — reordenar, aninhar; handle ⋮⋮), linhas-guia,
            ações “expandir/recolher tudo”, indicadores chevron/plus/caret, ícones
            (pasta abre/fecha automaticamente), badge, links, slots <code>start</code>/<code>end</code>,
            tamanhos, cores, variantes flush/bordered, item desabilitado e navegação por teclado
            (setas, Home, End, Enter/Space, <code>*</code>) no padrão WAI-ARIA tree.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Use <code>:expanded</code> com um array de <code>name</code>s para abrir nós iniciais.
                Ramos sem <code>icon</code> ganham pasta; folhas ganham arquivo.
            </x-slot:description>
            <div class="w-full">
                <x-ui.treeview :expanded="['docs', 'src']">
                    <x-ui.treeview.treeview-item name="docs" label="Documents">
                        <x-ui.treeview.treeview-item name="resume" label="resume.pdf" icon="bi-file-earmark-pdf" />
                        <x-ui.treeview.treeview-item name="cover" label="cover-letter.docx" icon="bi-file-earmark-word" />
                    </x-ui.treeview.treeview-item>
                    <x-ui.treeview.treeview-item name="src" label="Source">
                        <x-ui.treeview.treeview-item name="app-js" label="app.js" icon="bi-filetype-js" />
                        <x-ui.treeview.treeview-item name="app-css" label="app.css" icon="bi-filetype-css" />
                    </x-ui.treeview.treeview-item>
                    <x-ui.treeview.treeview-item name="readme" label="README.md" icon="bi-markdown" />
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Selecionável" :code="$selectableCode" :html="$selectableHtml">
            <x-slot:description>
                <code>selectable</code> permite clicar (ou Enter/Space) para selecionar um nó.
                Escute o evento <code>treeview-select</code>.
            </x-slot:description>
            <div class="w-full">
                <x-ui.treeview selectable :expanded="['team']" selected="ana">
                    <x-ui.treeview.treeview-item name="team" label="Equipe" icon="bi-people">
                        <x-ui.treeview.treeview-item name="ana" label="Ana Silva" icon="bi-person" />
                        <x-ui.treeview.treeview-item name="bruno" label="Bruno Costa" icon="bi-person" />
                        <x-ui.treeview.treeview-item name="carla" label="Carla Dias" icon="bi-person" />
                    </x-ui.treeview.treeview-item>
                    <x-ui.treeview.treeview-item name="archive" label="Arquivados" icon="bi-archive" />
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Seleção múltipla" :code="$multipleCode" :html="$multipleHtml">
            <x-slot:description>
                Combine <code>selectable</code> + <code>multiple</code>; <code>selected</code> vira um array.
            </x-slot:description>
            <div class="w-full">
                <x-ui.treeview selectable multiple :expanded="['langs']" :selected="['php', 'js']">
                    <x-ui.treeview.treeview-item name="langs" label="Linguagens">
                        <x-ui.treeview.treeview-item name="php" label="PHP" icon="bi-filetype-php" />
                        <x-ui.treeview.treeview-item name="js" label="JavaScript" icon="bi-filetype-js" />
                        <x-ui.treeview.treeview-item name="go" label="Go" icon="bi-filetype-tsx" />
                    </x-ui.treeview.treeview-item>
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Checkboxes" :code="$checkableCode" :html="$checkableHtml">
            <x-slot:description>
                <code>checkable</code> mostra checkboxes. Com <code>cascade</code> (padrão), marcar o pai
                marca os filhos e o pai fica indeterminado quando só parte está marcada.
            </x-slot:description>
            <div class="w-full">
                <x-ui.treeview checkable :expanded="['permissions']" :checked="['read']">
                    <x-ui.treeview.treeview-item name="permissions" label="Permissões">
                        <x-ui.treeview.treeview-item name="read" label="Leitura" />
                        <x-ui.treeview.treeview-item name="write" label="Escrita" />
                        <x-ui.treeview.treeview-item name="admin" label="Administração">
                            <x-ui.treeview.treeview-item name="users" label="Usuários" />
                            <x-ui.treeview.treeview-item name="billing" label="Cobrança" />
                        </x-ui.treeview.treeview-item>
                    </x-ui.treeview.treeview-item>
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Linhas-guia" :code="$linesCode" :html="$linesHtml">
            <x-slot:description>
                <code>lines</code> desenha uma linha vertical nos grupos aninhados.
            </x-slot:description>
            <div class="w-full">
                <x-ui.treeview lines :expanded="['project', 'app']">
                    <x-ui.treeview.treeview-item name="project" label="projeto">
                        <x-ui.treeview.treeview-item name="app" label="app">
                            <x-ui.treeview.treeview-item name="models" label="Models" icon="bi-database" />
                            <x-ui.treeview.treeview-item name="http" label="Http" icon="bi-globe" />
                        </x-ui.treeview.treeview-item>
                        <x-ui.treeview.treeview-item name="routes" label="routes" icon="bi-signpost-split" />
                    </x-ui.treeview.treeview-item>
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Ações expandir/recolher" :code="$actionsCode" :html="$actionsHtml">
            <x-slot:description>
                <code>actions</code> adiciona botões para expandir ou recolher todos os ramos.
            </x-slot:description>
            <div class="w-full">
                <x-ui.treeview actions :expanded="['a']">
                    <x-ui.treeview.treeview-item name="a" label="Pasta A">
                        <x-ui.treeview.treeview-item name="a1" label="arquivo-a1.txt" />
                        <x-ui.treeview.treeview-item name="a2" label="arquivo-a2.txt" />
                    </x-ui.treeview.treeview-item>
                    <x-ui.treeview.treeview-item name="b" label="Pasta B">
                        <x-ui.treeview.treeview-item name="b1" label="arquivo-b1.txt" />
                    </x-ui.treeview.treeview-item>
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Indicador +/- e badge" :code="$indicatorCode" :html="$indicatorHtml">
            <x-slot:description>
                <code>indicator="plus"</code> (também <code>chevron</code>/<code>caret</code>).
                Badge e cor vêm do item / do container.
            </x-slot:description>
            <div class="w-full">
                <x-ui.treeview indicator="plus" :expanded="['inbox']" color="success">
                    <x-ui.treeview.treeview-item name="inbox" label="Caixa de entrada" badge="12">
                        <x-ui.treeview.treeview-item name="starred" label="Com estrela" icon="bi-star" />
                        <x-ui.treeview.treeview-item name="sent" label="Enviados" icon="bi-send" />
                    </x-ui.treeview.treeview-item>
                    <x-ui.treeview.treeview-item name="spam" label="Spam" icon="bi-exclamation-octagon" badge="3" />
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code> aceita <code>sm</code>, <code>md</code> (padrão) e <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.treeview size="sm" :expanded="['sm']">
                    <x-ui.treeview.treeview-item name="sm" label="Compacto">
                        <x-ui.treeview.treeview-item name="sm-1" label="Item" />
                    </x-ui.treeview.treeview-item>
                </x-ui.treeview>

                <x-ui.treeview size="lg" :expanded="['lg']">
                    <x-ui.treeview.treeview-item name="lg" label="Grande">
                        <x-ui.treeview.treeview-item name="lg-1" label="Item" />
                    </x-ui.treeview.treeview-item>
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Flush + links" :code="$flushCode" :html="$flushHtml">
            <x-slot:description>
                <code>variant="flush"</code> remove borda/padding. Use <code>href</code> no item para links.
            </x-slot:description>
            <div class="w-full">
                <x-ui.treeview variant="flush" :expanded="['nav']">
                    <x-ui.treeview.treeview-item name="nav" label="Navegação">
                        <x-ui.treeview.treeview-item name="home" label="Início" icon="bi-house" href="#" />
                        <x-ui.treeview.treeview-item name="settings" label="Configurações" icon="bi-gear" href="#" />
                    </x-ui.treeview.treeview-item>
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Desabilitado" :code="$disabledCode" :html="$disabledHtml">
            <x-slot:description>
                <code>disabled</code> impede expand, seleção e checkbox nesse nó.
            </x-slot:description>
            <div class="w-full">
                <x-ui.treeview :expanded="['root']">
                    <x-ui.treeview.treeview-item name="root" label="Projeto">
                        <x-ui.treeview.treeview-item name="ok" label="Disponível" />
                        <x-ui.treeview.treeview-item name="locked" label="Bloqueado" disabled />
                    </x-ui.treeview.treeview-item>
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>color</code> tinge o item selecionado (tokens do tema).
            </x-slot:description>
            <div class="w-full">
                <x-ui.treeview selectable color="danger" :expanded="['alerts']" selected="critical">
                    <x-ui.treeview.treeview-item name="alerts" label="Alertas">
                        <x-ui.treeview.treeview-item name="critical" label="Crítico" icon="bi-exclamation-triangle" />
                        <x-ui.treeview.treeview-item name="warning" label="Atenção" icon="bi-exclamation-circle" />
                    </x-ui.treeview.treeview-item>
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Slots start / end" :code="$slotsCode" :html="$slotsHtml">
            <x-slot:description>
                Os slots <code>start</code> e <code>end</code> substituem ícone / acrescentam meta à direita
                (avatar, badge, ações).
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-ui.treeview :expanded="['people']">
                    <x-ui.treeview.treeview-item name="people" label="Pessoas">
                        <x-ui.treeview.treeview-item name="ana" label="Ana Silva">
                            <x-slot:start>
                                <x-ui.avatar initials="AS" size="xs" color="primary" circle />
                            </x-slot:start>
                            <x-slot:end>
                                <x-ui.badge size="sm" pill variant="soft" color="success">Online</x-ui.badge>
                            </x-slot:end>
                        </x-ui.treeview.treeview-item>
                        <x-ui.treeview.treeview-item name="bruno" label="Bruno Costa">
                            <x-slot:start>
                                <x-ui.avatar initials="BC" size="xs" color="info" circle />
                            </x-slot:start>
                        </x-ui.treeview.treeview-item>
                    </x-ui.treeview.treeview-item>
                </x-ui.treeview>
            </div>
        </x-ui.example>

        <x-ui.example title="Drag and drop" :code="$draggableCode" :html="$draggableHtml">
            <x-slot:description>
                <code>draggable</code> mostra o handle de arraste. Solte na faixa superior/inferior para
                reordenar (linha) ou no centro para aninhar (destaque). Não dá para soltar em um
                descendente. Use <code>disable-drag</code> para travar um item. Escute
                <code>treeview-reorder</code>.
            </x-slot:description>
            <div class="w-full max-w-lg">
                <x-ui.treeview draggable :expanded="['src', 'components']">
                    <x-ui.treeview.treeview-item name="src" label="src">
                        <x-ui.treeview.treeview-item name="components" label="components">
                            <x-ui.treeview.treeview-item name="button" label="button.blade.php" icon="bi-filetype-php" />
                            <x-ui.treeview.treeview-item name="card" label="card.blade.php" icon="bi-filetype-php" />
                        </x-ui.treeview.treeview-item>
                        <x-ui.treeview.treeview-item name="app-js" label="app.js" icon="bi-filetype-js" />
                    </x-ui.treeview.treeview-item>
                    <x-ui.treeview.treeview-item name="readme" label="README.md" icon="bi-markdown" />
                    <x-ui.treeview.treeview-item name="locked" label="travado.txt" disable-drag />
                </x-ui.treeview>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api component="ui/treeview/treeview" title="x-ui.treeview" />
</x-ui.docs>
