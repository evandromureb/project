<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $basicCode = <<<'BLADE'
<x-ui.table>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Nome</x-ui.table.table-head>
            <x-ui.table.table-head>E-mail</x-ui.table.table-head>
            <x-ui.table.table-head>Status</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row>
            <x-ui.table.table-cell strong>Ana Silva</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>ana@empresa.com</x-ui.table.table-cell>
            <x-ui.table.table-cell>
                <x-ui.badge color="success" variant="soft" pill>Ativo</x-ui.badge>
            </x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell strong>Bruno Costa</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>bruno@empresa.com</x-ui.table.table-cell>
            <x-ui.table.table-cell>
                <x-ui.badge color="warning" variant="soft" pill>Pendente</x-ui.badge>
            </x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell strong>Carla Mendes</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>carla@empresa.com</x-ui.table.table-cell>
            <x-ui.table.table-cell>
                <x-ui.badge color="danger" variant="soft" pill>Inativo</x-ui.badge>
            </x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $basicHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Nome</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">E-mail</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Status</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start font-medium text-foreground" data-table-cell>Ana Silva</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>ana@empresa.com</td>
                <td class="ui-table-cell text-start" data-table-cell>
                    <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1.5 px-2.5 py-1 text-xs rounded-full"><span>Ativo</span></span>
                </td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start font-medium text-foreground" data-table-cell>Bruno Costa</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>bruno@empresa.com</td>
                <td class="ui-table-cell text-start" data-table-cell>
                    <span class="inline-flex items-center font-medium leading-none bg-warning/15 text-warning gap-1.5 px-2.5 py-1 text-xs rounded-full"><span>Pendente</span></span>
                </td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start font-medium text-foreground" data-table-cell>Carla Mendes</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>carla@empresa.com</td>
                <td class="ui-table-cell text-start" data-table-cell>
                    <span class="inline-flex items-center font-medium leading-none bg-danger/15 text-danger gap-1.5 px-2.5 py-1 text-xs rounded-full"><span>Inativo</span></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $stripedCode = <<<'BLADE'
<x-ui.table striped>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>#</x-ui.table.table-head>
            <x-ui.table.table-head>Produto</x-ui.table.table-head>
            <x-ui.table.table-head align="end">Preço</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row>
            <x-ui.table.table-cell muted>1</x-ui.table.table-cell>
            <x-ui.table.table-cell>Notebook Pro</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 6.499</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell muted>2</x-ui.table.table-cell>
            <x-ui.table.table-cell>Monitor UltraWide</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 2.199</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell muted>3</x-ui.table.table-cell>
            <x-ui.table.table-cell>Teclado Mecânico</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 549</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell muted>4</x-ui.table.table-cell>
            <x-ui.table.table-cell>Mouse Vertical</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 289</x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $stripedHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="true" data-hover="false" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top [&_[data-table-body]_[data-table-row]:nth-child(odd)]:bg-muted/40" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">#</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Produto</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Preço</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>1</td>
                <td class="ui-table-cell text-start" data-table-cell>Notebook Pro</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 6.499</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>2</td>
                <td class="ui-table-cell text-start" data-table-cell>Monitor UltraWide</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 2.199</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>3</td>
                <td class="ui-table-cell text-start" data-table-cell>Teclado Mecânico</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 549</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>4</td>
                <td class="ui-table-cell text-start" data-table-cell>Mouse Vertical</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 289</td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $hoverCode = <<<'BLADE'
<x-ui.table hover>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Cliente</x-ui.table.table-head>
            <x-ui.table.table-head>Plano</x-ui.table.table-head>
            <x-ui.table.table-head align="end">MRR</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Acme Corp</x-ui.table.table-cell>
            <x-ui.table.table-cell>Enterprise</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 4.800</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Beta Ltda</x-ui.table.table-cell>
            <x-ui.table.table-cell>Pro</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 890</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Gamma SA</x-ui.table.table-cell>
            <x-ui.table.table-cell>Starter</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 149</x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $hoverHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="true" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top [&_[data-table-body]_[data-table-row]:hover]:bg-muted/60 [&_[data-table-body]_[data-table-row]]:transition-colors" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Cliente</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Plano</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">MRR</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Acme Corp</td>
                <td class="ui-table-cell text-start" data-table-cell>Enterprise</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 4.800</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Beta Ltda</td>
                <td class="ui-table-cell text-start" data-table-cell>Pro</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 890</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Gamma SA</td>
                <td class="ui-table-cell text-start" data-table-cell>Starter</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 149</td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $borderedCode = <<<'BLADE'
<x-ui.table bordered>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Campo</x-ui.table.table-head>
            <x-ui.table.table-head>Valor</x-ui.table.table-head>
            <x-ui.table.table-head>Unidade</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>CPU</x-ui.table.table-cell>
            <x-ui.table.table-cell mono>42%</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>uso</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Memória</x-ui.table.table-cell>
            <x-ui.table.table-cell mono>6.2 / 16</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>GB</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Disco</x-ui.table.table-cell>
            <x-ui.table.table-cell mono>128 / 512</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>GB</x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $borderedHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-head]]:border [&_[data-table-head]]:border-border [&_[data-table-cell]]:border [&_[data-table-cell]]:border-border [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Campo</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Valor</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Unidade</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>CPU</td>
                <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>42%</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>uso</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Memória</td>
                <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>6.2 / 16</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>GB</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Disco</td>
                <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>128 / 512</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>GB</td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $borderlessCode = <<<'BLADE'
<x-ui.table borderless>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Métrica</x-ui.table.table-head>
            <x-ui.table.table-head align="end">Valor</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Visitantes</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>12.480</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Conversões</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>384</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Taxa</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>3,08%</x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $borderlessHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle border-0 [&_[data-table-row]]:border-0 [&_[data-table-head]]:border-0 [&_[data-table-cell]]:border-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Métrica</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Valor</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Visitantes</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>12.480</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Conversões</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>384</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Taxa</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>3,08%</td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-ui.table size="sm">…</x-ui.table>
<x-ui.table size="md">…</x-ui.table>
<x-ui.table size="lg">…</x-ui.table>
BLADE;

    $sizesHtml = <<<'HTML'
<div class="flex w-full flex-col gap-6">
    <div>
        <p class="mb-2 text-xs font-medium text-muted-foreground">sm</p>
        <div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="sm" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
            <table class="ui-table w-full border-collapse text-left text-foreground text-xs [&_[data-table-head]]:px-3 [&_[data-table-head]]:py-2 [&_[data-table-cell]]:px-3 [&_[data-table-cell]]:py-2 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
                <thead class="ui-table-header" data-table-header>
                    <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                        <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Nome</th>
                        <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody class="ui-table-body" data-table-body>
                    <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                        <td class="ui-table-cell text-start" data-table-cell>Compacto</td>
                        <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>42</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <p class="mb-2 text-xs font-medium text-muted-foreground">md</p>
        <div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
            <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
                <thead class="ui-table-header" data-table-header>
                    <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                        <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Nome</th>
                        <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody class="ui-table-body" data-table-body>
                    <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                        <td class="ui-table-cell text-start" data-table-cell>Padrão</td>
                        <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>42</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <p class="mb-2 text-xs font-medium text-muted-foreground">lg</p>
        <div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="lg" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
            <table class="ui-table w-full border-collapse text-left text-foreground text-base [&_[data-table-head]]:px-5 [&_[data-table-head]]:py-3.5 [&_[data-table-cell]]:px-5 [&_[data-table-cell]]:py-3.5 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
                <thead class="ui-table-header" data-table-header>
                    <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                        <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Nome</th>
                        <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody class="ui-table-body" data-table-body>
                    <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                        <td class="ui-table-cell text-start" data-table-cell>Confortável</td>
                        <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>42</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
HTML;

    $captionCode = <<<'BLADE'
<x-ui.table>
    <x-ui.table.table-caption>
        Lista de pedidos do mês atual
    </x-ui.table.table-caption>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Pedido</x-ui.table.table-head>
            <x-ui.table.table-head>Cliente</x-ui.table.table-head>
            <x-ui.table.table-head align="end">Total</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row>
            <x-ui.table.table-cell mono>#1042</x-ui.table.table-cell>
            <x-ui.table.table-cell>Ana Silva</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 320,00</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell mono>#1043</x-ui.table.table-cell>
            <x-ui.table.table-cell>Bruno Costa</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 89,90</x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $captionHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
        <caption class="px-4 py-3 text-sm text-muted-foreground caption-top" data-table-caption data-side="top">
            Lista de pedidos do mês atual
        </caption>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Pedido</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Cliente</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Total</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>#1042</td>
                <td class="ui-table-cell text-start" data-table-cell>Ana Silva</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 320,00</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>#1043</td>
                <td class="ui-table-cell text-start" data-table-cell>Bruno Costa</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 89,90</td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $footerCode = <<<'BLADE'
<x-ui.table>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Item</x-ui.table.table-head>
            <x-ui.table.table-head align="end">Qtd</x-ui.table.table-head>
            <x-ui.table.table-head align="end">Valor</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Licença Pro</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>3</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 297,00</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Add-on Storage</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>1</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 49,00</x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
    <x-ui.table.table-footer>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Total</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>4</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 346,00</x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-footer>
</x-ui.table>
BLADE;

    $footerHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Item</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Qtd</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Valor</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Licença Pro</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>3</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 297,00</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Add-on Storage</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>1</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 49,00</td>
            </tr>
        </tbody>
        <tfoot class="ui-table-footer bg-muted/40 font-medium text-foreground" data-table-footer>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Total</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>4</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 346,00</td>
            </tr>
        </tfoot>
    </table>
</div>
HTML;

    $contextualCode = <<<'BLADE'
<x-ui.table>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Evento</x-ui.table.table-head>
            <x-ui.table.table-head>Severidade</x-ui.table.table-head>
            <x-ui.table.table-head>Horário</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row color="success">
            <x-ui.table.table-cell>Deploy concluído</x-ui.table.table-cell>
            <x-ui.table.table-cell>info</x-ui.table.table-cell>
            <x-ui.table.table-cell muted nowrap>09:12</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row color="warning">
            <x-ui.table.table-cell>Latência elevada</x-ui.table.table-cell>
            <x-ui.table.table-cell>warning</x-ui.table.table-cell>
            <x-ui.table.table-cell muted nowrap>10:45</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row color="danger">
            <x-ui.table.table-cell>Falha no worker</x-ui.table.table-cell>
            <x-ui.table.table-cell>critical</x-ui.table.table-cell>
            <x-ui.table.table-cell muted nowrap>11:02</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Célula colorida →</x-ui.table.table-cell>
            <x-ui.table.table-cell color="info">info</x-ui.table.table-cell>
            <x-ui.table.table-cell muted nowrap>11:30</x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $contextualHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Evento</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Severidade</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Horário</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors bg-success/10 text-success [&_[data-table-cell]]:text-success" data-table-row data-color="success">
                <td class="ui-table-cell text-start" data-table-cell>Deploy concluído</td>
                <td class="ui-table-cell text-start" data-table-cell>info</td>
                <td class="ui-table-cell text-start whitespace-nowrap text-muted-foreground" data-table-cell>09:12</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors bg-warning/10 text-warning [&_[data-table-cell]]:text-warning" data-table-row data-color="warning">
                <td class="ui-table-cell text-start" data-table-cell>Latência elevada</td>
                <td class="ui-table-cell text-start" data-table-cell>warning</td>
                <td class="ui-table-cell text-start whitespace-nowrap text-muted-foreground" data-table-cell>10:45</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors bg-danger/10 text-danger [&_[data-table-cell]]:text-danger" data-table-row data-color="danger">
                <td class="ui-table-cell text-start" data-table-cell>Falha no worker</td>
                <td class="ui-table-cell text-start" data-table-cell>critical</td>
                <td class="ui-table-cell text-start whitespace-nowrap text-muted-foreground" data-table-cell>11:02</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Célula colorida →</td>
                <td class="ui-table-cell text-start bg-info/10 text-info" data-table-cell data-color="info">info</td>
                <td class="ui-table-cell text-start whitespace-nowrap text-muted-foreground" data-table-cell>11:30</td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $activeCode = <<<'BLADE'
<x-ui.table hover>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Arquivo</x-ui.table.table-head>
            <x-ui.table.table-head>Tamanho</x-ui.table.table-head>
            <x-ui.table.table-head>Modificado</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row active>
            <x-ui.table.table-cell strong>relatorio.pdf</x-ui.table.table-cell>
            <x-ui.table.table-cell mono>2.4 MB</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>Hoje</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>contrato.docx</x-ui.table.table-cell>
            <x-ui.table.table-cell mono>840 KB</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>Ontem</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row disabled>
            <x-ui.table.table-cell>arquivo-bloqueado.zip</x-ui.table.table-cell>
            <x-ui.table.table-cell mono>12 MB</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>Seg</x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $activeHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="true" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top [&_[data-table-body]_[data-table-row]:hover]:bg-muted/60 [&_[data-table-body]_[data-table-row]]:transition-colors" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Arquivo</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Tamanho</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Modificado</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors bg-primary/10 [&_[data-table-cell]]:relative" data-table-row aria-selected="true" data-active="true">
                <td class="ui-table-cell text-start font-medium text-foreground" data-table-cell>relatorio.pdf</td>
                <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>2.4 MB</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>Hoje</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>contrato.docx</td>
                <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>840 KB</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>Ontem</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors pointer-events-none opacity-50" data-table-row aria-disabled="true" data-disabled="true">
                <td class="ui-table-cell text-start" data-table-cell>arquivo-bloqueado.zip</td>
                <td class="ui-table-cell text-start font-mono text-[0.8125rem] tabular-nums" data-table-cell>12 MB</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>Seg</td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $sortableCode = <<<'BLADE'
<x-ui.table hover>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head sortable sort="asc">Nome</x-ui.table.table-head>
            <x-ui.table.table-head sortable sort="none">Cargo</x-ui.table.table-head>
            <x-ui.table.table-head sortable sort="desc" align="end">Salário</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Ana Silva</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>Designer</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 8.200</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Bruno Costa</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>Engenheiro</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 11.400</x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>Carla Mendes</x-ui.table.table-cell>
            <x-ui.table.table-cell muted>Product</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono>R$ 9.800</x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $sortableHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="true" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top [&_[data-table-body]_[data-table-row]:hover]:bg-muted/60 [&_[data-table-body]_[data-table-row]]:transition-colors" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col" aria-sort="ascending">
                    <span class="inline-flex items-center gap-1.5 justify-start w-full">
                        <span class="min-w-0">Nome</span>
                        <i class="bi bi-caret-up-fill shrink-0 text-[0.65rem] leading-none" aria-hidden="true"></i>
                    </span>
                </th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col" aria-sort="none">
                    <span class="inline-flex items-center gap-1.5 justify-start w-full">
                        <span class="min-w-0">Cargo</span>
                        <i class="bi bi-caret-up-fill opacity-30 shrink-0 text-[0.65rem] leading-none" aria-hidden="true"></i>
                    </span>
                </th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col" aria-sort="descending">
                    <span class="inline-flex items-center gap-1.5 justify-end w-full">
                        <span class="min-w-0">Salário</span>
                        <i class="bi bi-caret-down-fill shrink-0 text-[0.65rem] leading-none" aria-hidden="true"></i>
                    </span>
                </th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Ana Silva</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>Designer</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 8.200</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Bruno Costa</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>Engenheiro</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 11.400</td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>Carla Mendes</td>
                <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>Product</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 9.800</td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $richCode = <<<'BLADE'
<x-ui.table hover>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Usuário</x-ui.table.table-head>
            <x-ui.table.table-head>Função</x-ui.table.table-head>
            <x-ui.table.table-head>Progresso</x-ui.table.table-head>
            <x-ui.table.table-head align="end">Ações</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>
                <div class="flex items-center gap-3">
                    <x-ui.avatar initials="AS" size="sm" color="primary" circle />
                    <div class="min-w-0">
                        <div class="font-medium">Ana Silva</div>
                        <div class="text-xs text-muted-foreground">ana@empresa.com</div>
                    </div>
                </div>
            </x-ui.table.table-cell>
            <x-ui.table.table-cell>
                <x-ui.badge color="primary" variant="soft">Admin</x-ui.badge>
            </x-ui.table.table-cell>
            <x-ui.table.table-cell>
                <x-ui.progress :value="72" size="sm" class="min-w-28" />
            </x-ui.table.table-cell>
            <x-ui.table.table-cell align="end">
                <x-ui.button-group size="sm">
                    <x-ui.button variant="ghost" size="sm" icon="bi-pencil" icon-only />
                    <x-ui.button variant="ghost" size="sm" icon="bi-trash" color="danger" icon-only />
                </x-ui.button-group>
            </x-ui.table.table-cell>
        </x-ui.table.table-row>
        <x-ui.table.table-row>
            <x-ui.table.table-cell>
                <div class="flex items-center gap-3">
                    <x-ui.avatar initials="BC" size="sm" color="success" circle />
                    <div class="min-w-0">
                        <div class="font-medium">Bruno Costa</div>
                        <div class="text-xs text-muted-foreground">bruno@empresa.com</div>
                    </div>
                </div>
            </x-ui.table.table-cell>
            <x-ui.table.table-cell>
                <x-ui.badge color="secondary" variant="soft">Editor</x-ui.badge>
            </x-ui.table.table-cell>
            <x-ui.table.table-cell>
                <x-ui.progress :value="45" size="sm" color="success" class="min-w-28" />
            </x-ui.table.table-cell>
            <x-ui.table.table-cell align="end">
                <x-ui.button-group size="sm">
                    <x-ui.button variant="ghost" size="sm" icon="bi-pencil" icon-only />
                    <x-ui.button variant="ghost" size="sm" icon="bi-trash" color="danger" icon-only />
                </x-ui.button-group>
            </x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $richHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="true" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top [&_[data-table-body]_[data-table-row]:hover]:bg-muted/60 [&_[data-table-body]_[data-table-row]]:transition-colors" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Usuário</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Função</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Progresso</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Ações</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>
                    <div class="flex items-center gap-3">
                        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-8 text-xs bg-primary/15 text-primary rounded-full">
                            <span>AS</span>
                        </div>
                        <div class="min-w-0">
                            <div class="font-medium">Ana Silva</div>
                            <div class="text-xs text-muted-foreground">ana@empresa.com</div>
                        </div>
                    </div>
                </td>
                <td class="ui-table-cell text-start" data-table-cell>
                    <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1.5 px-2.5 py-1 text-xs rounded-md"><span>Admin</span></span>
                </td>
                <td class="ui-table-cell text-start" data-table-cell>
                    <div class="ui-progress w-full min-w-28">
                        <div class="relative w-full overflow-hidden h-1.5 rounded-full bg-muted">
                            <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 72%" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </td>
                <td class="ui-table-cell text-end" data-table-cell>
                    <div role="group" class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-ghost-primary btn-sm size-8 p-0">
                            <i class="bi bi-pencil shrink-0 leading-none" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-ghost-danger btn-sm size-8 p-0">
                            <i class="bi bi-trash shrink-0 leading-none" aria-hidden="true"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>
                    <div class="flex items-center gap-3">
                        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-8 text-xs bg-success/15 text-success rounded-full">
                            <span>BC</span>
                        </div>
                        <div class="min-w-0">
                            <div class="font-medium">Bruno Costa</div>
                            <div class="text-xs text-muted-foreground">bruno@empresa.com</div>
                        </div>
                    </div>
                </td>
                <td class="ui-table-cell text-start" data-table-cell>
                    <span class="inline-flex items-center font-medium leading-none bg-secondary/15 text-secondary gap-1.5 px-2.5 py-1 text-xs rounded-md"><span>Editor</span></span>
                </td>
                <td class="ui-table-cell text-start" data-table-cell>
                    <div class="ui-progress w-full min-w-28">
                        <div class="relative w-full overflow-hidden h-1.5 rounded-full bg-muted">
                            <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-success text-success-foreground" style="width: 45%" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </td>
                <td class="ui-table-cell text-end" data-table-cell>
                    <div role="group" class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-ghost-primary btn-sm size-8 p-0">
                            <i class="bi bi-pencil shrink-0 leading-none" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-ghost-danger btn-sm size-8 p-0">
                            <i class="bi bi-trash shrink-0 leading-none" aria-hidden="true"></i>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $headVariantsCode = <<<'BLADE'
<x-ui.table head-variant="muted">…</x-ui.table>
<x-ui.table head-variant="solid" color="primary">…</x-ui.table>
<x-ui.table head-variant="plain">…</x-ui.table>
BLADE;

    $headVariantsHtml = <<<'HTML'
<div class="flex w-full flex-col gap-6">
    <div class="ui-table-shell relative rounded-md border border-primary overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="sm" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="solid" data-color="primary">
        <table class="ui-table w-full border-collapse text-left text-foreground text-xs [&_[data-table-head]]:px-3 [&_[data-table-head]]:py-2 [&_[data-table-cell]]:px-3 [&_[data-table-cell]]:py-2 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-primary [&_[data-table-header]_[data-table-head]]:bg-primary [&_[data-table-header]_[data-table-head]]:text-primary-foreground [&_[data-table-header]]:border-primary table-auto caption-top" data-table>
            <thead class="ui-table-header" data-table-header>
                <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                    <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Produto</th>
                    <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Estoque</th>
                </tr>
            </thead>
            <tbody class="ui-table-body" data-table-body>
                <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                    <td class="ui-table-cell text-start" data-table-cell>Camiseta</td>
                    <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>120</td>
                </tr>
                <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                    <td class="ui-table-cell text-start" data-table-cell>Calça</td>
                    <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>48</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="sm" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="plain">
        <table class="ui-table w-full border-collapse text-left text-foreground text-xs [&_[data-table-head]]:px-3 [&_[data-table-head]]:py-2 [&_[data-table-cell]]:px-3 [&_[data-table-cell]]:py-2 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-transparent table-auto caption-top" data-table>
            <thead class="ui-table-header" data-table-header>
                <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                    <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Produto</th>
                    <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Estoque</th>
                </tr>
            </thead>
            <tbody class="ui-table-body" data-table-body>
                <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                    <td class="ui-table-cell text-start" data-table-cell>Boné</td>
                    <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>30</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
HTML;

    $emptyCode = <<<'BLADE'
<x-ui.table>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Nome</x-ui.table.table-head>
            <x-ui.table.table-head>E-mail</x-ui.table.table-head>
            <x-ui.table.table-head>Status</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-empty
            :colspan="3"
            title="Nenhum usuário encontrado"
            description="Ajuste os filtros ou cadastre um novo usuário."
        >
            <x-ui.button color="primary" size="sm" icon="bi-plus-lg">Novo usuário</x-ui.button>
        </x-ui.table.table-empty>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $emptyHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Nome</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">E-mail</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Status</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr data-table-row data-table-empty-row>
                <td class="px-4 py-10 text-center" data-table-cell data-table-empty colspan="3">
                    <div class="mx-auto flex max-w-sm flex-col items-center gap-2">
                        <span class="flex size-10 items-center justify-center rounded-full bg-muted text-muted-foreground" aria-hidden="true">
                            <i class="bi bi-inbox text-lg leading-none"></i>
                        </span>
                        <p class="m-0 text-sm font-medium text-foreground">Nenhum usuário encontrado</p>
                        <p class="m-0 text-sm text-muted-foreground">Ajuste os filtros ou cadastre um novo usuário.</p>
                        <div class="mt-1">
                            <button type="button" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i>
                                <span>Novo usuário</span>
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
HTML;

    $flushCode = <<<'BLADE'
<x-ui.card title="Usuários" body-class="p-0">
    <x-ui.table variant="flush" hover>
        <x-ui.table.table-header>
            <x-ui.table.table-row>
                <x-ui.table.table-head>Nome</x-ui.table.table-head>
                <x-ui.table.table-head>Papel</x-ui.table.table-head>
            </x-ui.table.table-row>
        </x-ui.table.table-header>
        <x-ui.table.table-body>
            <x-ui.table.table-row>
                <x-ui.table.table-cell>Ana Silva</x-ui.table.table-cell>
                <x-ui.table.table-cell muted>Admin</x-ui.table.table-cell>
            </x-ui.table.table-row>
            <x-ui.table.table-row>
                <x-ui.table.table-cell>Bruno Costa</x-ui.table.table-cell>
                <x-ui.table.table-cell muted>Editor</x-ui.table.table-cell>
            </x-ui.table.table-row>
        </x-ui.table.table-body>
    </x-ui.table>
</x-ui.card>
BLADE;

    $flushHtml = <<<'HTML'
<div class="card">
    <div class="card-header">
        <div>
            <h5 class="card-title">Usuários</h5>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="ui-table-shell relative rounded-none border-0 w-full overflow-x-auto" data-table-shell data-variant="flush" data-size="md" data-responsive="true" data-striped="false" data-hover="true" data-head-variant="muted">
            <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top [&_[data-table-body]_[data-table-row]:hover]:bg-muted/60 [&_[data-table-body]_[data-table-row]]:transition-colors" data-table>
                <thead class="ui-table-header" data-table-header>
                    <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                        <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Nome</th>
                        <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Papel</th>
                    </tr>
                </thead>
                <tbody class="ui-table-body" data-table-body>
                    <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                        <td class="ui-table-cell text-start" data-table-cell>Ana Silva</td>
                        <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>Admin</td>
                    </tr>
                    <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                        <td class="ui-table-cell text-start" data-table-cell>Bruno Costa</td>
                        <td class="ui-table-cell text-start text-muted-foreground" data-table-cell>Editor</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
HTML;

    $stickyCode = <<<'BLADE'
<x-ui.table sticky hover>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head>Mês</x-ui.table.table-head>
            <x-ui.table.table-head align="end">Receita</x-ui.table.table-head>
            <x-ui.table.table-head align="end">Despesa</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        {{-- várias linhas — o header fica fixo ao rolar --}}
        <x-ui.table.table-row>…</x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    // Gerador PHP: mesmas 12 linhas do @foreach da versão Livewire, para não
    // transcrever manualmente 12 <tr> repetitivos com valores calculados.
    $stickyRows = '';

    foreach (['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'] as $stickyIndex => $stickyMes) {
        $stickyReceita = number_format(8000 + ($stickyIndex * 350), 0, ',', '.');
        $stickyDespesa = number_format(4200 + ($stickyIndex * 180), 0, ',', '.');

        $stickyRows .= <<<ROW
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start" data-table-cell>{$stickyMes}</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ {$stickyReceita}</td>
                <td class="ui-table-cell text-end font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ {$stickyDespesa}</td>
            </tr>

            ROW;
    }

    $stickyHtml = <<<HTML
<div class="ui-table-shell relative rounded-md border border-border w-full overflow-x-auto max-h-[min(28rem,70vh)] overflow-y-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="true" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted [&_[data-table-header]_[data-table-head]]:bg-muted [&_[data-table-header]_[data-table-head]]:sticky [&_[data-table-header]_[data-table-head]]:top-0 [&_[data-table-header]_[data-table-head]]:z-20 table-auto caption-top [&_[data-table-body]_[data-table-row]:hover]:bg-muted/60 [&_[data-table-body]_[data-table-row]]:transition-colors" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Mês</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Receita</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Despesa</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            {$stickyRows}</tbody>
    </table>
</div>
HTML;

    $responsiveCode = <<<'BLADE'
<x-ui.table>
    <x-ui.table.table-header>
        <x-ui.table.table-row>
            <x-ui.table.table-head nowrap>ID do pedido</x-ui.table.table-head>
            <x-ui.table.table-head nowrap>Cliente</x-ui.table.table-head>
            <x-ui.table.table-head nowrap>Produto</x-ui.table.table-head>
            <x-ui.table.table-head nowrap>Categoria</x-ui.table.table-head>
            <x-ui.table.table-head nowrap>Cidade</x-ui.table.table-head>
            <x-ui.table.table-head nowrap align="end">Total</x-ui.table.table-head>
            <x-ui.table.table-head nowrap>Status</x-ui.table.table-head>
        </x-ui.table.table-row>
    </x-ui.table.table-header>
    <x-ui.table.table-body>
        <x-ui.table.table-row>
            <x-ui.table.table-cell mono nowrap>#ORD-2048</x-ui.table.table-cell>
            <x-ui.table.table-cell nowrap>Ana Silva</x-ui.table.table-cell>
            <x-ui.table.table-cell nowrap>Notebook Pro 16"</x-ui.table.table-cell>
            <x-ui.table.table-cell nowrap>Eletrônicos</x-ui.table.table-cell>
            <x-ui.table.table-cell nowrap>São Paulo</x-ui.table.table-cell>
            <x-ui.table.table-cell align="end" mono nowrap>R$ 6.499,00</x-ui.table.table-cell>
            <x-ui.table.table-cell nowrap>
                <x-ui.badge color="success" variant="soft" pill>Pago</x-ui.badge>
            </x-ui.table.table-cell>
        </x-ui.table.table-row>
    </x-ui.table.table-body>
</x-ui.table>
BLADE;

    $responsiveHtml = <<<'HTML'
<div class="ui-table-shell relative rounded-md border border-border overflow-hidden w-full overflow-x-auto" data-table-shell data-variant="default" data-size="md" data-responsive="true" data-striped="false" data-hover="false" data-head-variant="muted">
    <table class="ui-table w-full border-collapse text-left text-foreground text-sm [&_[data-table-head]]:px-4 [&_[data-table-head]]:py-3 [&_[data-table-cell]]:px-4 [&_[data-table-cell]]:py-3 [&_[data-table-cell]]:align-middle [&_[data-table-head]]:align-middle [&_[data-table-row]]:border-b [&_[data-table-row]]:border-border [&_[data-table-header]_tr:last-child]:border-b [&_[data-table-body]_tr:last-child]:border-b-0 [&_[data-table-footer]_tr]:border-t [&_[data-table-footer]_tr]:border-b-0 [&_[data-table-header]]:bg-muted/50 table-auto caption-top" data-table>
        <thead class="ui-table-header" data-table-header>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">ID do pedido</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Cliente</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Produto</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Categoria</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Cidade</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-end" data-table-head scope="col">Total</th>
                <th class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start" data-table-head scope="col">Status</th>
            </tr>
        </thead>
        <tbody class="ui-table-body" data-table-body>
            <tr class="ui-table-row border-b border-border transition-colors" data-table-row>
                <td class="ui-table-cell text-start whitespace-nowrap font-mono text-[0.8125rem] tabular-nums" data-table-cell>#ORD-2048</td>
                <td class="ui-table-cell text-start whitespace-nowrap" data-table-cell>Ana Silva</td>
                <td class="ui-table-cell text-start whitespace-nowrap" data-table-cell>Notebook Pro 16"</td>
                <td class="ui-table-cell text-start whitespace-nowrap" data-table-cell>Eletrônicos</td>
                <td class="ui-table-cell text-start whitespace-nowrap" data-table-cell>São Paulo</td>
                <td class="ui-table-cell text-end whitespace-nowrap font-mono text-[0.8125rem] tabular-nums" data-table-cell>R$ 6.499,00</td>
                <td class="ui-table-cell text-start whitespace-nowrap" data-table-cell>
                    <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1.5 px-2.5 py-1 text-xs rounded-full"><span>Pago</span></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
HTML;
@endphp

<x-ui.docs>
<div>
    <x-ui.heading
        title="Tables"
        description="Tabelas semânticas com variantes, densidade, ordenação visual, estados e conteúdo rico."
    />

    <div class="mt-8 flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Compound: <code>table</code> → <code>table-header</code> / <code>table-body</code> → <code>table-row</code> → <code>table-head</code> / <code>table-cell</code>.
            </x-slot:description>
            <x-ui.table>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Nome</x-ui.table.table-head>
                        <x-ui.table.table-head>E-mail</x-ui.table.table-head>
                        <x-ui.table.table-head>Status</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell strong>Ana Silva</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>ana@empresa.com</x-ui.table.table-cell>
                        <x-ui.table.table-cell>
                            <x-ui.badge color="success" variant="soft" pill>Ativo</x-ui.badge>
                        </x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell strong>Bruno Costa</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>bruno@empresa.com</x-ui.table.table-cell>
                        <x-ui.table.table-cell>
                            <x-ui.badge color="warning" variant="soft" pill>Pendente</x-ui.badge>
                        </x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell strong>Carla Mendes</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>carla@empresa.com</x-ui.table.table-cell>
                        <x-ui.table.table-cell>
                            <x-ui.badge color="danger" variant="soft" pill>Inativo</x-ui.badge>
                        </x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Listrada" :code="$stripedCode" :html="$stripedHtml">
            <x-slot:description>
                <code>striped</code> alterna o fundo das linhas do body.
            </x-slot:description>
            <x-ui.table striped>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>#</x-ui.table.table-head>
                        <x-ui.table.table-head>Produto</x-ui.table.table-head>
                        <x-ui.table.table-head align="end">Preço</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell muted>1</x-ui.table.table-cell>
                        <x-ui.table.table-cell>Notebook Pro</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 6.499</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell muted>2</x-ui.table.table-cell>
                        <x-ui.table.table-cell>Monitor UltraWide</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 2.199</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell muted>3</x-ui.table.table-cell>
                        <x-ui.table.table-cell>Teclado Mecânico</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 549</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell muted>4</x-ui.table.table-cell>
                        <x-ui.table.table-cell>Mouse Vertical</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 289</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Hover" :code="$hoverCode" :html="$hoverHtml">
            <x-slot:description>
                <code>hover</code> destaca a linha sob o cursor.
            </x-slot:description>
            <x-ui.table hover>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Cliente</x-ui.table.table-head>
                        <x-ui.table.table-head>Plano</x-ui.table.table-head>
                        <x-ui.table.table-head align="end">MRR</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Acme Corp</x-ui.table.table-cell>
                        <x-ui.table.table-cell>Enterprise</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 4.800</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Beta Ltda</x-ui.table.table-cell>
                        <x-ui.table.table-cell>Pro</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 890</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Gamma SA</x-ui.table.table-cell>
                        <x-ui.table.table-cell>Starter</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 149</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Bordered" :code="$borderedCode" :html="$borderedHtml">
            <x-slot:description>
                <code>bordered</code> desenha a grade completa entre células.
            </x-slot:description>
            <x-ui.table bordered>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Campo</x-ui.table.table-head>
                        <x-ui.table.table-head>Valor</x-ui.table.table-head>
                        <x-ui.table.table-head>Unidade</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>CPU</x-ui.table.table-cell>
                        <x-ui.table.table-cell mono>42%</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>uso</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Memória</x-ui.table.table-cell>
                        <x-ui.table.table-cell mono>6.2 / 16</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>GB</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Disco</x-ui.table.table-cell>
                        <x-ui.table.table-cell mono>128 / 512</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>GB</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Borderless" :code="$borderlessCode" :html="$borderlessHtml">
            <x-slot:description>
                <code>borderless</code> remove todas as bordas internas.
            </x-slot:description>
            <x-ui.table borderless>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Métrica</x-ui.table.table-head>
                        <x-ui.table.table-head align="end">Valor</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Visitantes</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>12.480</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Conversões</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>384</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Taxa</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>3,08%</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code> (padrão) e <code>lg</code> — padding e tipografia.
            </x-slot:description>
            <div class="flex w-full flex-col gap-6">
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">sm</p>
                    <x-ui.table size="sm">
                        <x-ui.table.table-header>
                            <x-ui.table.table-row>
                                <x-ui.table.table-head>Nome</x-ui.table.table-head>
                                <x-ui.table.table-head>Valor</x-ui.table.table-head>
                            </x-ui.table.table-row>
                        </x-ui.table.table-header>
                        <x-ui.table.table-body>
                            <x-ui.table.table-row>
                                <x-ui.table.table-cell>Compacto</x-ui.table.table-cell>
                                <x-ui.table.table-cell mono>42</x-ui.table.table-cell>
                            </x-ui.table.table-row>
                        </x-ui.table.table-body>
                    </x-ui.table>
                </div>
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">md</p>
                    <x-ui.table size="md">
                        <x-ui.table.table-header>
                            <x-ui.table.table-row>
                                <x-ui.table.table-head>Nome</x-ui.table.table-head>
                                <x-ui.table.table-head>Valor</x-ui.table.table-head>
                            </x-ui.table.table-row>
                        </x-ui.table.table-header>
                        <x-ui.table.table-body>
                            <x-ui.table.table-row>
                                <x-ui.table.table-cell>Padrão</x-ui.table.table-cell>
                                <x-ui.table.table-cell mono>42</x-ui.table.table-cell>
                            </x-ui.table.table-row>
                        </x-ui.table.table-body>
                    </x-ui.table>
                </div>
                <div>
                    <p class="mb-2 text-xs font-medium text-muted-foreground">lg</p>
                    <x-ui.table size="lg">
                        <x-ui.table.table-header>
                            <x-ui.table.table-row>
                                <x-ui.table.table-head>Nome</x-ui.table.table-head>
                                <x-ui.table.table-head>Valor</x-ui.table.table-head>
                            </x-ui.table.table-row>
                        </x-ui.table.table-header>
                        <x-ui.table.table-body>
                            <x-ui.table.table-row>
                                <x-ui.table.table-cell>Confortável</x-ui.table.table-cell>
                                <x-ui.table.table-cell mono>42</x-ui.table.table-cell>
                            </x-ui.table.table-row>
                        </x-ui.table.table-body>
                    </x-ui.table>
                </div>
            </div>
        </x-ui.example>

        <x-ui.example title="Caption" :code="$captionCode" :html="$captionHtml">
            <x-slot:description>
                <code>table-caption</code> descreve a tabela. Use <code>caption-side</code> no container ou <code>side</code> no caption.
            </x-slot:description>
            <x-ui.table>
                <x-ui.table.table-caption>
                    Lista de pedidos do mês atual
                </x-ui.table.table-caption>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Pedido</x-ui.table.table-head>
                        <x-ui.table.table-head>Cliente</x-ui.table.table-head>
                        <x-ui.table.table-head align="end">Total</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell mono>#1042</x-ui.table.table-cell>
                        <x-ui.table.table-cell>Ana Silva</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 320,00</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell mono>#1043</x-ui.table.table-cell>
                        <x-ui.table.table-cell>Bruno Costa</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 89,90</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Footer" :code="$footerCode" :html="$footerHtml">
            <x-slot:description>
                <code>table-footer</code> para totais e resumos.
            </x-slot:description>
            <x-ui.table>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Item</x-ui.table.table-head>
                        <x-ui.table.table-head align="end">Qtd</x-ui.table.table-head>
                        <x-ui.table.table-head align="end">Valor</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Licença Pro</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>3</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 297,00</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Add-on Storage</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>1</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 49,00</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
                <x-ui.table.table-footer>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Total</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>4</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 346,00</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-footer>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Classes contextuais" :code="$contextualCode" :html="$contextualHtml">
            <x-slot:description>
                <code>color</code> na linha ou na célula aplica tint soft do token.
            </x-slot:description>
            <x-ui.table>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Evento</x-ui.table.table-head>
                        <x-ui.table.table-head>Severidade</x-ui.table.table-head>
                        <x-ui.table.table-head>Horário</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row color="success">
                        <x-ui.table.table-cell>Deploy concluído</x-ui.table.table-cell>
                        <x-ui.table.table-cell>info</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted nowrap>09:12</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row color="warning">
                        <x-ui.table.table-cell>Latência elevada</x-ui.table.table-cell>
                        <x-ui.table.table-cell>warning</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted nowrap>10:45</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row color="danger">
                        <x-ui.table.table-cell>Falha no worker</x-ui.table.table-cell>
                        <x-ui.table.table-cell>critical</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted nowrap>11:02</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Célula colorida →</x-ui.table.table-cell>
                        <x-ui.table.table-cell color="info">info</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted nowrap>11:30</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Ativa e desabilitada" :code="$activeCode" :html="$activeHtml">
            <x-slot:description>
                <code>active</code> / <code>selected</code> e <code>disabled</code> na linha.
            </x-slot:description>
            <x-ui.table hover>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Arquivo</x-ui.table.table-head>
                        <x-ui.table.table-head>Tamanho</x-ui.table.table-head>
                        <x-ui.table.table-head>Modificado</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row active>
                        <x-ui.table.table-cell strong>relatorio.pdf</x-ui.table.table-cell>
                        <x-ui.table.table-cell mono>2.4 MB</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>Hoje</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>contrato.docx</x-ui.table.table-cell>
                        <x-ui.table.table-cell mono>840 KB</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>Ontem</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row disabled>
                        <x-ui.table.table-cell>arquivo-bloqueado.zip</x-ui.table.table-cell>
                        <x-ui.table.table-cell mono>12 MB</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>Seg</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Ordenação visual" :code="$sortableCode" :html="$sortableHtml">
            <x-slot:description>
                <code>sortable</code> + <code>sort</code> (<code>none</code>/<code>asc</code>/<code>desc</code>) — apresentacional; o clique fica a cargo do consumidor.
            </x-slot:description>
            <x-ui.table hover>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head sortable sort="asc">Nome</x-ui.table.table-head>
                        <x-ui.table.table-head sortable sort="none">Cargo</x-ui.table.table-head>
                        <x-ui.table.table-head sortable sort="desc" align="end">Salário</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Ana Silva</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>Designer</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 8.200</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Bruno Costa</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>Engenheiro</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 11.400</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>Carla Mendes</x-ui.table.table-cell>
                        <x-ui.table.table-cell muted>Product</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono>R$ 9.800</x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Conteúdo rico" :code="$richCode" :html="$richHtml">
            <x-slot:description>
                Células aceitam avatar, badge, progress, botões — qualquer conteúdo Blade.
            </x-slot:description>
            <x-ui.table hover>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Usuário</x-ui.table.table-head>
                        <x-ui.table.table-head>Função</x-ui.table.table-head>
                        <x-ui.table.table-head>Progresso</x-ui.table.table-head>
                        <x-ui.table.table-head align="end">Ações</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>
                            <div class="flex items-center gap-3">
                                <x-ui.avatar initials="AS" size="sm" color="primary" circle />
                                <div class="min-w-0">
                                    <div class="font-medium">Ana Silva</div>
                                    <div class="text-xs text-muted-foreground">ana@empresa.com</div>
                                </div>
                            </div>
                        </x-ui.table.table-cell>
                        <x-ui.table.table-cell>
                            <x-ui.badge color="primary" variant="soft">Admin</x-ui.badge>
                        </x-ui.table.table-cell>
                        <x-ui.table.table-cell>
                            <x-ui.progress :value="72" size="sm" class="min-w-28" />
                        </x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end">
                            <x-ui.button-group size="sm">
                                <x-ui.button variant="ghost" size="sm" icon="bi-pencil" icon-only />
                                <x-ui.button variant="ghost" size="sm" icon="bi-trash" color="danger" icon-only />
                            </x-ui.button-group>
                        </x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell>
                            <div class="flex items-center gap-3">
                                <x-ui.avatar initials="BC" size="sm" color="success" circle />
                                <div class="min-w-0">
                                    <div class="font-medium">Bruno Costa</div>
                                    <div class="text-xs text-muted-foreground">bruno@empresa.com</div>
                                </div>
                            </div>
                        </x-ui.table.table-cell>
                        <x-ui.table.table-cell>
                            <x-ui.badge color="secondary" variant="soft">Editor</x-ui.badge>
                        </x-ui.table.table-cell>
                        <x-ui.table.table-cell>
                            <x-ui.progress :value="45" size="sm" color="success" class="min-w-28" />
                        </x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end">
                            <x-ui.button-group size="sm">
                                <x-ui.button variant="ghost" size="sm" icon="bi-pencil" icon-only />
                                <x-ui.button variant="ghost" size="sm" icon="bi-trash" color="danger" icon-only />
                            </x-ui.button-group>
                        </x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Cabeçalho" :code="$headVariantsCode" :html="$headVariantsHtml">
            <x-slot:description>
                <code>head-variant</code>: <code>muted</code> (padrão), <code>solid</code> (com <code>color</code>) e <code>plain</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-6">
                <x-ui.table head-variant="solid" color="primary" size="sm">
                    <x-ui.table.table-header>
                        <x-ui.table.table-row>
                            <x-ui.table.table-head>Produto</x-ui.table.table-head>
                            <x-ui.table.table-head align="end">Estoque</x-ui.table.table-head>
                        </x-ui.table.table-row>
                    </x-ui.table.table-header>
                    <x-ui.table.table-body>
                        <x-ui.table.table-row>
                            <x-ui.table.table-cell>Camiseta</x-ui.table.table-cell>
                            <x-ui.table.table-cell align="end" mono>120</x-ui.table.table-cell>
                        </x-ui.table.table-row>
                        <x-ui.table.table-row>
                            <x-ui.table.table-cell>Calça</x-ui.table.table-cell>
                            <x-ui.table.table-cell align="end" mono>48</x-ui.table.table-cell>
                        </x-ui.table.table-row>
                    </x-ui.table.table-body>
                </x-ui.table>
                <x-ui.table head-variant="plain" size="sm">
                    <x-ui.table.table-header>
                        <x-ui.table.table-row>
                            <x-ui.table.table-head>Produto</x-ui.table.table-head>
                            <x-ui.table.table-head align="end">Estoque</x-ui.table.table-head>
                        </x-ui.table.table-row>
                    </x-ui.table.table-header>
                    <x-ui.table.table-body>
                        <x-ui.table.table-row>
                            <x-ui.table.table-cell>Boné</x-ui.table.table-cell>
                            <x-ui.table.table-cell align="end" mono>30</x-ui.table.table-cell>
                        </x-ui.table.table-row>
                    </x-ui.table.table-body>
                </x-ui.table>
            </div>
        </x-ui.example>

        <x-ui.example title="Estado vazio" :code="$emptyCode" :html="$emptyHtml">
            <x-slot:description>
                <code>table-empty</code> com <code>colspan</code>, ícone, título, descrição e slot de ação.
            </x-slot:description>
            <x-ui.table>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Nome</x-ui.table.table-head>
                        <x-ui.table.table-head>E-mail</x-ui.table.table-head>
                        <x-ui.table.table-head>Status</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-empty
                        :colspan="3"
                        title="Nenhum usuário encontrado"
                        description="Ajuste os filtros ou cadastre um novo usuário."
                    >
                        <x-ui.button color="primary" size="sm" icon="bi-plus-lg">Novo usuário</x-ui.button>
                    </x-ui.table.table-empty>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Flush em card" :code="$flushCode" :html="$flushHtml">
            <x-slot:description>
                <code>variant="flush"</code> remove borda/radius externos — ideal dentro de cards.
            </x-slot:description>
            <div class="w-full max-w-lg">
                <x-ui.card title="Usuários" body-class="p-0">
                    <x-ui.table variant="flush" hover>
                        <x-ui.table.table-header>
                            <x-ui.table.table-row>
                                <x-ui.table.table-head>Nome</x-ui.table.table-head>
                                <x-ui.table.table-head>Papel</x-ui.table.table-head>
                            </x-ui.table.table-row>
                        </x-ui.table.table-header>
                        <x-ui.table.table-body>
                            <x-ui.table.table-row>
                                <x-ui.table.table-cell>Ana Silva</x-ui.table.table-cell>
                                <x-ui.table.table-cell muted>Admin</x-ui.table.table-cell>
                            </x-ui.table.table-row>
                            <x-ui.table.table-row>
                                <x-ui.table.table-cell>Bruno Costa</x-ui.table.table-cell>
                                <x-ui.table.table-cell muted>Editor</x-ui.table.table-cell>
                            </x-ui.table.table-row>
                        </x-ui.table.table-body>
                    </x-ui.table>
                </x-ui.card>
            </div>
        </x-ui.example>

        <x-ui.example title="Header sticky" :code="$stickyCode" :html="$stickyHtml">
            <x-slot:description>
                <code>sticky</code> fixa o thead ao rolar (altura máxima no shell).
            </x-slot:description>
            <x-ui.table sticky hover>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head>Mês</x-ui.table.table-head>
                        <x-ui.table.table-head align="end">Receita</x-ui.table.table-head>
                        <x-ui.table.table-head align="end">Despesa</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    @foreach (['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'] as $i => $mes)
                        <x-ui.table.table-row>
                            <x-ui.table.table-cell>{{ $mes }}</x-ui.table.table-cell>
                            <x-ui.table.table-cell align="end" mono>R$ {{ number_format(8000 + ($i * 350), 0, ',', '.') }}</x-ui.table.table-cell>
                            <x-ui.table.table-cell align="end" mono>R$ {{ number_format(4200 + ($i * 180), 0, ',', '.') }}</x-ui.table.table-cell>
                        </x-ui.table.table-row>
                    @endforeach
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>

        <x-ui.example title="Responsiva" :code="$responsiveCode" :html="$responsiveHtml">
            <x-slot:description>
                <code>responsive</code> (padrão <code>true</code>) envolve a tabela em scroll horizontal. Use <code>nowrap</code> nas células largas.
            </x-slot:description>
            <x-ui.table>
                <x-ui.table.table-header>
                    <x-ui.table.table-row>
                        <x-ui.table.table-head nowrap>ID do pedido</x-ui.table.table-head>
                        <x-ui.table.table-head nowrap>Cliente</x-ui.table.table-head>
                        <x-ui.table.table-head nowrap>Produto</x-ui.table.table-head>
                        <x-ui.table.table-head nowrap>Categoria</x-ui.table.table-head>
                        <x-ui.table.table-head nowrap>Cidade</x-ui.table.table-head>
                        <x-ui.table.table-head nowrap align="end">Total</x-ui.table.table-head>
                        <x-ui.table.table-head nowrap>Status</x-ui.table.table-head>
                    </x-ui.table.table-row>
                </x-ui.table.table-header>
                <x-ui.table.table-body>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell mono nowrap>#ORD-2048</x-ui.table.table-cell>
                        <x-ui.table.table-cell nowrap>Ana Silva</x-ui.table.table-cell>
                        <x-ui.table.table-cell nowrap>Notebook Pro 16"</x-ui.table.table-cell>
                        <x-ui.table.table-cell nowrap>Eletrônicos</x-ui.table.table-cell>
                        <x-ui.table.table-cell nowrap>São Paulo</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono nowrap>R$ 6.499,00</x-ui.table.table-cell>
                        <x-ui.table.table-cell nowrap>
                            <x-ui.badge color="success" variant="soft" pill>Pago</x-ui.badge>
                        </x-ui.table.table-cell>
                    </x-ui.table.table-row>
                    <x-ui.table.table-row>
                        <x-ui.table.table-cell mono nowrap>#ORD-2049</x-ui.table.table-cell>
                        <x-ui.table.table-cell nowrap>Bruno Costa</x-ui.table.table-cell>
                        <x-ui.table.table-cell nowrap>Monitor UltraWide 34"</x-ui.table.table-cell>
                        <x-ui.table.table-cell nowrap>Eletrônicos</x-ui.table.table-cell>
                        <x-ui.table.table-cell nowrap>Curitiba</x-ui.table.table-cell>
                        <x-ui.table.table-cell align="end" mono nowrap>R$ 2.199,00</x-ui.table.table-cell>
                        <x-ui.table.table-cell nowrap>
                            <x-ui.badge color="warning" variant="soft" pill>Pendente</x-ui.badge>
                        </x-ui.table.table-cell>
                    </x-ui.table.table-row>
                </x-ui.table.table-body>
            </x-ui.table>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="table" />
</x-ui.docs>
