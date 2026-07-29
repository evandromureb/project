<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $months = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
    $week = ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'];

    $overviewCode = <<<'BLADE'
        <div class="flex flex-col gap-6">
            <x-ui.widget.widget-group :columns="4" gap="lg">
                <x-ui.widget.widget-stat … />
                {{-- + Orders, Customers, Balance --}}
            </x-ui.widget.widget-group>

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                <x-ui.widget title="Receita & Pedidos" class="xl:col-span-8">…chart…</x-ui.widget>
                <x-ui.widget title="Atividade recente" flush class="xl:col-span-4">…items…</x-ui.widget>
            </div>
        </div>
        BLADE;

    $overviewHtml = <<<'HTML'
        <div class="flex flex-col gap-6">
            <div class="ui-widget-group grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="ui-widget-stat card relative overflow-hidden p-5 border-primary/25 bg-primary/10 [&_.ui-widget-stat-value]:text-primary">
                    <div class="relative z-[2] flex flex-col gap-4">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0 flex-1">
                                <div class="mb-2 flex flex-wrap items-center gap-2">
                                    <p class="ui-widget-stat-title mb-0 text-xs font-medium uppercase tracking-wide text-muted-foreground">Total Earnings</p>
                                </div>
                                <div class="mb-2">
                                    <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1 px-2 py-0.5 text-[11px] rounded-full">
                                        <i class="bi bi-arrow-up shrink-0 leading-none" aria-hidden="true"></i>
                                        <span>+16.24%</span>
                                    </span>
                                </div>
                                <div class="ui-widget-stat-value text-2xl font-semibold tabular-nums tracking-tight text-card-foreground">
                                    <span class="text-[0.55em] opacity-80">$</span>559.25
                                </div>
                            </div>
                            <span class="relative inline-flex shrink-0 items-center justify-center rounded-full bg-primary/15 text-primary size-11">
                                <i class="bi bi-currency-dollar text-xl leading-none" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="ui-widget-stat-content -mx-1">
                            <div class="ui-chart relative w-full" style="--ui-chart-height: 56px">
                                <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
                            </div>
                        </div>
                        <div class="border-t border-border/60 pt-3">
                            <a href="#" class="relative z-[2] text-sm font-medium text-primary hover:underline">
                                View net earnings <i class="bi bi-arrow-right ms-1 text-xs" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Orders, Customers, My Balance: mesma estrutura, trocando título/ícone/cor/trend/sparkline -->
            </div>

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                <div class="ui-widget card flex flex-col overflow-hidden xl:col-span-8">
                    <div class="card-header">
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <h5 class="card-title">Receita &amp; Pedidos</h5>
                            </div>
                            <p class="mt-1 mb-0 text-sm text-muted-foreground">Comparativo ano a ano</p>
                        </div>
                        <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-soft-primary btn-sm">ALL</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">1M</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">6M</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">1Y</button>
                            </div>
                        </div>
                    </div>
                    <div class="ui-widget-body flex-1 card-body">
                        <div class="ui-chart relative w-full" style="--ui-chart-height: 300px">
                            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
                        </div>
                    </div>
                </div>

                <div class="ui-widget card flex flex-col overflow-hidden xl:col-span-4">
                    <div class="card-header">
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <h5 class="card-title">Atividade recente</h5>
                            </div>
                        </div>
                        <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                            <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">Ver tudo</a>
                        </div>
                    </div>
                    <div class="ui-widget-body flex-1">
                        <div class="ui-widget-item group relative flex items-start gap-3 px-5 py-3.5 transition-colors border-b border-border hover:bg-muted/30" data-widget-item>
                            <span class="relative inline-flex shrink-0 items-center justify-center rounded-full bg-primary/15 text-primary size-8 self-center">
                                <i class="bi bi-cart3 text-sm leading-none" aria-hidden="true"></i>
                            </span>
                            <div class="min-w-0 flex-1">
                                <p class="mb-0 truncate text-sm font-medium text-card-foreground">Purchase by James Price</p>
                                <p class="mt-0.5 mb-0 line-clamp-2 text-sm text-muted-foreground">Noise Evolve Smartwatch · #XF-2356</p>
                            </div>
                            <div class="ui-widget-item-end flex shrink-0 flex-col items-end gap-1 self-center text-end">
                                <span class="text-xs text-muted-foreground whitespace-nowrap">02:14 PM</span>
                            </div>
                        </div>
                        <!-- + 4 outros widget-item: estilo, curtida, comentário, alerta -->
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $tilesCode = <<<'BLADE'
        <x-ui.widget.widget-group :columns="4">
            <x-ui.widget.widget-stat
                title="Total Earnings"
                :value="559.25"
                prefix="$"
                icon="bi-currency-dollar"
                color="primary"
                variant="soft"
                trend="up"
                trend-value="+16.24%"
                link="#"
                link-label="View net earnings"
                animate
                :decimals="2"
            >
                <x-ui.chart type="area" :height="56" :legend="false" :tooltip="false" smooth
                    :categories="['S','T','Q','Q','S','S','D']"
                    :series="[['name' => 'E', 'data' => [12, 18, 14, 22, 19, 28, 24]]]"
                    :colors="['primary']" />
            </x-ui.widget.widget-stat>
            {{-- Orders / Customers / Balance com sparkline --}}
        </x-ui.widget.widget-group>
        BLADE;

    $tilesHtml = <<<'HTML'
        <div class="ui-widget-group grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="ui-widget-stat card relative overflow-hidden p-5 border-primary/25 bg-primary/10 [&_.ui-widget-stat-value]:text-primary">
                <div class="relative z-[2] flex flex-col gap-4">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0 flex-1">
                            <div class="mb-2 flex flex-wrap items-center gap-2">
                                <p class="ui-widget-stat-title mb-0 text-xs font-medium uppercase tracking-wide text-muted-foreground">Total Earnings</p>
                            </div>
                            <div class="mb-2">
                                <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1 px-2 py-0.5 text-[11px] rounded-full">
                                    <i class="bi bi-arrow-up shrink-0 leading-none" aria-hidden="true"></i>
                                    <span>+16.24%</span>
                                </span>
                            </div>
                            <div class="ui-widget-stat-value text-2xl font-semibold tabular-nums tracking-tight text-card-foreground">
                                <span class="text-[0.55em] opacity-80">$</span>559.25
                            </div>
                        </div>
                        <span class="relative inline-flex shrink-0 items-center justify-center rounded-full bg-primary/15 text-primary size-11">
                            <i class="bi bi-currency-dollar text-xl leading-none" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="ui-widget-stat-content -mx-1">
                        <div class="ui-chart relative w-full" style="--ui-chart-height: 56px">
                            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
                        </div>
                    </div>
                    <div class="border-t border-border/60 pt-3">
                        <a href="#" class="relative z-[2] text-sm font-medium text-primary hover:underline">
                            View net earnings <i class="bi bi-arrow-right ms-1 text-xs" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Orders (info), Customers (success), My Balance (warning): mesma estrutura -->
        </div>
        HTML;

    $solidTilesCode = <<<'BLADE'
        <x-ui.widget.widget-group :columns="5">
            <x-ui.widget.widget-stat layout="stacked" title="Campaign Sent" :value="197"
                icon="bi-send" color="primary" variant="solid" animate />
            {{-- Annual Profit, Lead Conversation, Daily Income, Annual Deals --}}
        </x-ui.widget.widget-group>
        BLADE;

    $solidTilesHtml = <<<'HTML'
        <div class="ui-widget-group grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-5">
            <div class="ui-widget-stat card relative overflow-hidden p-5 text-center border-primary bg-primary text-primary-foreground [&_.ui-widget-stat-title]:text-primary-foreground/80 [&_.ui-widget-stat-value]:text-primary-foreground">
                <div class="relative z-[2] flex flex-col items-center gap-3">
                    <span class="relative inline-flex shrink-0 items-center justify-center rounded-full bg-primary-foreground/15 text-primary-foreground size-11">
                        <i class="bi bi-send text-xl leading-none" aria-hidden="true"></i>
                    </span>
                    <p class="ui-widget-stat-title mb-0 text-xs font-medium uppercase tracking-wide text-muted-foreground">Campaign Sent</p>
                    <div class="ui-widget-stat-value text-2xl font-semibold tabular-nums tracking-tight text-card-foreground">197</div>
                </div>
            </div>
            <!-- Annual Profit (success), Lead Conversation (info), Daily Income (warning), Annual Deals (danger): mesma estrutura -->
        </div>
        HTML;

    $countersCode = <<<'BLADE'
        <x-ui.widget.widget-group :columns="4">
            <x-ui.widget.widget-stat layout="counter" title="Users" :value="28.05" suffix="k"
                trend="up" trend-value="16.24%" trend-label="vs. previous month"
                color="primary" animate :decimals="2">
                <x-ui.chart type="bar" :height="48" … />
            </x-ui.widget.widget-stat>
            {{-- Sessions, Duration, Bounce --}}
        </x-ui.widget.widget-group>
        BLADE;

    $countersHtml = <<<'HTML'
        <div class="ui-widget-group grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="ui-widget-stat card relative overflow-hidden p-5 border-primary/25 bg-primary/10 [&_.ui-widget-stat-value]:text-primary">
                <div class="relative z-[2] flex flex-col gap-2">
                    <p class="ui-widget-stat-title mb-0 text-sm font-medium text-muted-foreground">Users</p>
                    <div class="ui-widget-stat-value text-2xl font-semibold tabular-nums tracking-tight text-card-foreground">28.05k</div>
                    <p class="mb-0 flex flex-wrap items-center gap-1.5 text-xs">
                        <span class="inline-flex items-center gap-1 font-semibold text-success">
                            <i class="bi bi-arrow-up" aria-hidden="true"></i> 16.24%
                        </span>
                        <span class="text-muted-foreground">vs. previous month</span>
                    </p>
                    <div class="ui-widget-stat-content -mx-1 pt-1">
                        <div class="ui-chart relative w-full" style="--ui-chart-height: 48px">
                            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sessions (info), Avg. Visit Duration (success), Bounce Rate (danger, trend-inverse): mesma estrutura -->
        </div>
        HTML;

    $progressCode = <<<'BLADE'
        <x-ui.widget.widget-group :columns="4">
            <x-ui.widget.widget-stat layout="progress" title="Total Sales" :value="2045"
                compare="From 1.930 last year" trend="up" trend-value="6.11%"
                :progress="61" color="primary" animate />
            {{-- Users / Revenue / Stores --}}
        </x-ui.widget.widget-group>
        BLADE;

    $progressHtml = <<<'HTML'
        <div class="ui-widget-group grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="ui-widget-stat card relative overflow-hidden p-5 border-primary/25 bg-primary/10 [&_.ui-widget-stat-value]:text-primary">
                <div class="relative z-[2] flex flex-col gap-3">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0">
                            <p class="ui-widget-stat-title mb-1 text-sm font-medium text-muted-foreground">Total Sales</p>
                            <div class="ui-widget-stat-value text-2xl font-semibold tabular-nums tracking-tight text-card-foreground">2045</div>
                            <p class="ui-widget-stat-desc mt-1 mb-0 text-xs text-muted-foreground">From 1.930 last year</p>
                        </div>
                        <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1 px-2 py-0.5 text-[11px] rounded-full">
                            <i class="bi bi-arrow-up shrink-0 leading-none" aria-hidden="true"></i>
                            <span>6.11%</span>
                        </span>
                    </div>
                    <div class="ui-progress w-full">
                        <div class="relative w-full overflow-hidden h-1.5 rounded-full bg-muted">
                            <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 61%" role="progressbar" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Number of Users (info), Total Revenue (success), Number of Stores (warning): mesma estrutura -->
        </div>
        HTML;

    $chartsCode = <<<'BLADE'
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
            <x-ui.widget title="Sessions by Countries" class="xl:col-span-8">
                <x-slot:toolbar>…ALL / 1M / 6M…</x-slot:toolbar>
                <x-ui.chart type="bar" :height="300" … />
            </x-ui.widget>
            <x-ui.widget title="Audiences Metrics" class="xl:col-span-4">
                <x-ui.chart type="donut" … />
                {{-- 3 mini KPIs --}}
            </x-ui.widget>
        </div>
        BLADE;

    $chartsHtml = <<<'HTML'
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
            <div class="ui-widget card flex flex-col overflow-hidden xl:col-span-8">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Sessions by Countries</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">Últimos 7 meses</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-soft-primary btn-sm">ALL</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">1M</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">6M</button>
                        </div>
                        <div class="inline-block">
                            <button type="button" class="btn btn-outline-secondary btn-sm" aria-expanded="false">
                                Export <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i>
                            </button>
                            <!-- menu teleportado para <body>, inerte (dentro de <template>) até o Alpine rodar -->
                        </div>
                    </div>
                </div>
                <div class="ui-widget-body flex-1 card-body">
                    <div class="ui-chart relative w-full" style="--ui-chart-height: 300px">
                        <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
                    </div>
                </div>
            </div>

            <div class="ui-widget card flex flex-col overflow-hidden xl:col-span-4">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Audiences Metrics</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">Dispositivos</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-soft-primary btn-sm">ALL</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">1M</button>
                        </div>
                    </div>
                </div>
                <div class="ui-widget-body flex-1 card-body">
                    <div class="ui-chart relative w-full" style="--ui-chart-height: 220px">
                        <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
                    </div>

                    <div class="mt-4 grid grid-cols-3 gap-3 border-t border-border pt-4">
                        <div class="text-center">
                            <p class="mb-0 text-lg font-semibold tabular-nums">854</p>
                            <p class="mb-0 text-[11px] text-muted-foreground">Avg. Session</p>
                            <p class="mb-0 text-xs font-medium text-success">49%</p>
                        </div>
                        <div class="text-center">
                            <p class="mb-0 text-lg font-semibold tabular-nums">127</p>
                            <p class="mb-0 text-[11px] text-muted-foreground">Conversion</p>
                            <p class="mb-0 text-xs font-medium text-success">60%</p>
                        </div>
                        <div class="text-center">
                            <p class="mb-0 text-lg font-semibold tabular-nums">3m</p>
                            <p class="mb-0 text-[11px] text-muted-foreground">Duration</p>
                            <p class="mb-0 text-xs font-medium text-muted-foreground">0s</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $listsCode = <<<'BLADE'
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <x-ui.widget title="Top Authors" subtitle="Contribuidores da semana" flush>…</x-ui.widget>
            <x-ui.widget title="My Tasks" subtitle="4 of 10 remaining" flush>…</x-ui.widget>
        </div>
        BLADE;

    $listsHtml = <<<'HTML'
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="ui-widget card flex flex-col overflow-hidden">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Top Authors</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">Mark, Rowling, Esther</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <div class="inline-block">
                            <button type="button" class="btn btn-ghost-secondary btn-sm size-8 p-0" aria-expanded="false">
                                <i class="bi bi-three-dots shrink-0 leading-none" aria-hidden="true"></i>
                            </button>
                            <!-- menu teleportado, inerte até o Alpine rodar -->
                        </div>
                    </div>
                </div>
                <div class="ui-widget-body flex-1">
                    <div class="ui-widget-item group relative flex items-start gap-3 px-5 py-3.5 transition-colors border-b border-border hover:bg-muted/30" data-widget-item>
                        <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-10 text-sm bg-primary/15 text-primary rounded-full self-center" title="Emma Smith"><span>ES</span></div>
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <p class="mb-0 truncate text-sm font-medium text-card-foreground">Emma Smith</p>
                                <span class="inline-flex items-center font-medium leading-none bg-primary/15 text-primary gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>Pro</span></span>
                            </div>
                            <p class="mt-0.5 mb-0 line-clamp-2 text-sm text-muted-foreground">Project Manager</p>
                            <div class="mt-2">
                                <div class="flex flex-wrap gap-1">
                                    <span class="inline-flex items-center font-medium leading-none bg-secondary/15 text-secondary gap-1 px-2 py-0.5 text-[11px] rounded-md"><span>PHP</span></span>
                                    <span class="inline-flex items-center font-medium leading-none bg-secondary/15 text-secondary gap-1 px-2 py-0.5 text-[11px] rounded-md"><span>SQLite</span></span>
                                    <span class="inline-flex items-center font-medium leading-none bg-secondary/15 text-secondary gap-1 px-2 py-0.5 text-[11px] rounded-md"><span>Artisan</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="ui-widget-item-end flex shrink-0 flex-col items-end gap-1 self-center text-end">
                            <span class="text-sm font-semibold text-success tabular-nums">+$820</span>
                        </div>
                    </div>
                    <!-- + Sean Bean, Brian Cox, Dan Wilson: mesma estrutura -->
                </div>
            </div>

            <div class="ui-widget card flex flex-col overflow-hidden">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">My Tasks</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">4 of 10 remaining</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <button type="button" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i>
                            <span>Add Task</span>
                        </button>
                    </div>
                </div>
                <div class="ui-widget-body flex-1">
                    <div class="ui-widget-item group relative flex items-start gap-3 px-5 py-3.5 transition-colors border-b border-border hover:bg-muted/30" data-widget-item>
                        <span class="relative inline-flex shrink-0 items-center justify-center rounded-full bg-success/15 text-success size-8 self-center">
                            <i class="bi bi-check2-circle text-sm leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <p class="mb-0 truncate text-sm font-medium text-card-foreground">Create FireStone Logo</p>
                                <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>New</span></span>
                            </div>
                            <p class="mt-0.5 mb-0 line-clamp-2 text-sm text-muted-foreground">Due in 2 Days</p>
                            <div class="mt-2">
                                <div class="ui-progress w-full">
                                    <div class="relative w-full overflow-hidden h-1 rounded-full bg-muted">
                                        <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-success text-success-foreground" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- + Stakeholder Meeting, Scoping & Estimations, KPI App Showcase, Project Meeting: mesma estrutura -->
                    <div class="card-footer">
                        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">Show more…</a>
                        <span class="text-xs text-muted-foreground">10 tasks total</span>
                    </div>
                </div>
            </div>

            <div class="ui-widget card flex flex-col overflow-hidden">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Latest Products</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">Gifts and more</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">View All</a>
                    </div>
                </div>
                <div class="ui-widget-body flex-1">
                    <div class="ui-widget-item group relative flex items-start gap-3 px-5 py-3.5 transition-colors border-b border-border hover:bg-muted/30" data-widget-item>
                        <div class="ui-widget-item-start shrink-0 self-center">
                            <div class="flex size-11 items-center justify-center rounded-md bg-success/15 text-success">
                                <i class="bi bi-cup-hot text-lg" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <p class="mb-0 truncate text-sm font-medium text-card-foreground">Cup &amp; Green</p>
                                <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>Approved</span></span>
                            </div>
                            <p class="mt-0.5 mb-0 line-clamp-2 text-sm text-muted-foreground">Visually stunning · Size 87KB</p>
                        </div>
                        <div class="ui-widget-item-end flex shrink-0 flex-col items-end gap-1 self-center text-end">
                            <span class="inline-flex items-center gap-0.5 text-sm font-semibold text-warning">
                                <i class="bi bi-star-fill text-xs" aria-hidden="true"></i> 4.2
                            </span>
                        </div>
                    </div>
                    <!-- + Pink Patterns, Abstract Art, Desserts platter: mesma estrutura -->
                </div>
            </div>
        </div>
        HTML;

    $mixedCode = <<<'BLADE'
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
            <x-ui.widget title="Sales Summary" class="xl:col-span-8">…balance + 4 métricas…</x-ui.widget>
            <div class="flex flex-col gap-6 xl:col-span-4">
                <x-ui.widget color="primary" variant="soft">…upgrade…</x-ui.widget>
                <x-ui.widget title="Brand Logo Design">…progress bars…</x-ui.widget>
            </div>
        </div>
        BLADE;

    $mixedHtml = <<<'HTML'
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
            <div class="ui-widget card flex flex-col overflow-hidden xl:col-span-8">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Sales Summary</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">Quarter 2/3 overview</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <div class="inline-block">
                            <button type="button" class="btn btn-outline-secondary btn-sm" aria-expanded="false">
                                Actions <i class="bi bi-chevron-down shrink-0 leading-none" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="ui-widget-body flex-1 card-body">
                    <div class="mb-6 flex flex-wrap items-end justify-between gap-4 rounded-lg bg-muted/40 p-5">
                        <div>
                            <p class="mb-1 text-sm text-muted-foreground">Your Balance</p>
                            <p class="mb-0 text-3xl font-semibold tabular-nums tracking-tight">$37,562.00</p>
                        </div>
                        <button type="button" class="btn btn-primary">
                            <i class="bi bi-plus-lg shrink-0 leading-none" aria-hidden="true"></i>
                            <span>Add Funds</span>
                        </button>
                    </div>

                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                        <div class="rounded-lg border border-border p-4">
                            <div class="mb-3 flex size-10 items-center justify-center rounded-full bg-primary/15 text-primary">
                                <i class="bi bi-globe2" aria-hidden="true"></i>
                            </div>
                            <p class="mb-0 text-xs text-muted-foreground">Sales</p>
                            <p class="mb-0 text-lg font-semibold tabular-nums">$2.5b</p>
                            <p class="mb-0 text-xs text-muted-foreground">100 Regions</p>
                        </div>
                        <!-- + Revenue (success), Growth (info), Dispute (danger): mesma estrutura -->
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-6 xl:col-span-4">
                <div class="ui-widget card flex flex-col overflow-hidden border-primary/25 bg-primary/10 text-primary [&_.card-title]:text-primary [&_.card-header]:border-primary/15 [&_.card-footer]:border-primary/15">
                    <div class="ui-widget-body flex-1 card-body">
                        <div class="flex flex-col gap-3">
                            <div class="flex items-start justify-between gap-3">
                                <span class="inline-flex items-center font-medium leading-none bg-primary text-primary-foreground gap-1.5 px-2.5 py-1 text-xs rounded-full"><span>Upgrade</span></span>
                                <span class="relative inline-flex shrink-0 items-center justify-center rounded-full bg-primary/15 text-primary size-11">
                                    <i class="bi bi-rocket-takeoff text-xl leading-none" aria-hidden="true"></i>
                                </span>
                            </div>
                            <p class="mb-0 text-base font-semibold">
                                Your free trial expires in <span class="text-primary">17</span> days.
                            </p>
                            <p class="mb-0 text-sm text-muted-foreground">
                                Upgrade from Free trial to Premium Plan and unlock analytics, seats and priority support.
                            </p>
                            <div>
                                <button type="button" class="btn btn-primary btn-sm">Upgrade Account</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ui-widget card flex flex-col overflow-hidden">
                    <div class="card-header">
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <h5 class="card-title">Brand Logo Design — MD</h5>
                            </div>
                            <p class="mt-1 mb-0 text-sm text-muted-foreground">Graphics Work · Due 27 Apr</p>
                        </div>
                        <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                            <div class="ui-stack flex self-stretch flex-row gap-0 items-center justify-start -space-x-2" data-stack data-direction="horizontal" data-axis="horizontal">
                                <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-8 text-xs bg-primary/15 text-primary rounded-full ring-2 ring-card" title="Anna"><span>A</span></div>
                                <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-8 text-xs bg-success/15 text-success rounded-full ring-2 ring-card" title="Mark"><span>M</span></div>
                                <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-8 text-xs bg-info/15 text-info rounded-full ring-2 ring-card" title="Lisa"><span>L</span></div>
                                <span class="flex size-8 items-center justify-center rounded-full bg-muted text-[10px] font-semibold ring-2 ring-card">+2</span>
                            </div>
                        </div>
                    </div>
                    <div class="ui-widget-body flex-1 card-body">
                        <div class="flex flex-col gap-3">
                            <div class="ui-progress w-full">
                                <div class="mb-2 flex items-center justify-between gap-3">
                                    <p class="mb-0 text-sm font-medium text-foreground">
                                        <span class="font-semibold text-success">70%</span> Completed
                                    </p>
                                </div>
                                <div>
                                    <div class="relative w-full overflow-hidden h-1.5 rounded-full bg-muted">
                                        <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-success text-success-foreground" style="width: 70%" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- + In Progress (warning, 45%), To Do (info, 20%): mesma estrutura -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="ui-widget card flex flex-col overflow-hidden">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Sales Progress</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">This fiscal year</p>
                    </div>
                </div>
                <div class="ui-widget-body flex-1 card-body">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="mb-0 text-sm text-muted-foreground">Average Sale</p>
                                <p class="mb-0 text-xl font-semibold tabular-nums">$650</p>
                            </div>
                            <div class="ui-chart relative w-full" style="--ui-chart-height: 100px">
                                <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
                            </div>
                        </div>
                        <div class="ui-separator flex w-full items-center my-4">
                            <div class="h-0.5 w-full bg-border border-border"></div>
                        </div>
                        <div class="grid grid-cols-3 gap-3 text-center">
                            <div>
                                <p class="mb-0 text-xs text-muted-foreground">Commissions</p>
                                <p class="mb-0 text-sm font-semibold tabular-nums">$29.5k</p>
                            </div>
                            <!-- + Revenue, Expenses -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui-widget card flex flex-col overflow-hidden">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Sales by Locations</h5>
                        </div>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-download shrink-0 leading-none" aria-hidden="true"></i>
                            <span>Export</span>
                        </button>
                    </div>
                </div>
                <div class="ui-widget-body flex-1 card-body">
                    <div class="flex flex-col gap-4">
                        <div>
                            <div class="mb-1.5 flex justify-between text-sm"><span>New Mexico</span><span class="font-medium tabular-nums">75%</span></div>
                            <div class="ui-progress w-full">
                                <div class="relative w-full overflow-hidden h-1.5 rounded-full bg-muted">
                                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <!-- + California (info, 47%), Texas (success, 82%), Florida (warning, 61%) -->
                    </div>
                </div>
            </div>

            <div class="ui-widget card flex flex-col overflow-hidden">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Hiring Pipeline</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">vs. previous month</p>
                    </div>
                </div>
                <div class="ui-widget-body flex-1 card-body">
                    <div class="mb-4">
                        <div class="ui-chart relative w-full" style="--ui-chart-height: 140px">
                            <div class="w-full" style="height: var(--ui-chart-height); min-height: 160px"></div>
                        </div>
                    </div>
                    <div class="ui-widget-group grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="ui-widget-stat card relative overflow-hidden p-4 !shadow-none !border-0 !bg-transparent !p-0">
                            <div class="relative z-[2] flex flex-col gap-2">
                                <p class="ui-widget-stat-title mb-0 text-sm font-medium text-muted-foreground">Application</p>
                                <div class="ui-widget-stat-value text-xl font-semibold tabular-nums tracking-tight text-card-foreground">16.24%</div>
                                <p class="mb-0 flex flex-wrap items-center gap-1.5 text-xs">
                                    <span class="inline-flex items-center gap-1 font-semibold text-success">
                                        <i class="bi bi-arrow-up" aria-hidden="true"></i> +2.1%
                                    </span>
                                </p>
                            </div>
                        </div>
                        <!-- + Interviewed (info, +4.8%), Hired (success, -1.2%): mesma estrutura -->
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $tablesCode = <<<'BLADE'
        <x-ui.widget title="Live Users By Country" flush>
            <x-slot:toolbar>…Export…</x-slot:toolbar>
            <x-ui.table hover size="sm" :rounded="false">…</x-ui.table>
        </x-ui.widget>
        BLADE;

    $tablesHtml = <<<'HTML'
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
            <div class="ui-widget card flex flex-col overflow-hidden xl:col-span-7">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Live Users By Country</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">Sessões por duração</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-download shrink-0 leading-none" aria-hidden="true"></i>
                            <span>Export Report</span>
                        </button>
                    </div>
                </div>
                <div class="ui-widget-body flex-1">
                    <div data-table-shell data-variant="default" data-size="sm" data-responsive="true" data-hover="true" data-head-variant="muted" class="ui-table-shell relative rounded-none border-0 overflow-hidden w-full overflow-x-auto">
                        <table data-table class="ui-table w-full border-collapse text-left text-foreground text-xs [&_[data-table-head]]:px-3 [&_[data-table-head]]:py-2 [&_[data-table-cell]]:px-3 [&_[data-table-cell]]:py-2 table-auto caption-top">
                            <thead data-table-header class="ui-table-header">
                                <tr data-table-row class="ui-table-row border-b border-border transition-colors">
                                    <th data-table-head scope="col" class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start">Duration</th>
                                    <th data-table-head scope="col" class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start">Sessions</th>
                                    <th data-table-head scope="col" class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start">Views</th>
                                    <th data-table-head scope="col" class="ui-table-head h-10 whitespace-nowrap font-semibold text-muted-foreground text-start">Trend</th>
                                </tr>
                            </thead>
                            <tbody data-table-body class="ui-table-body">
                                <tr data-table-row class="ui-table-row border-b border-border transition-colors">
                                    <td data-table-cell class="ui-table-cell text-start font-medium text-foreground">0–30 secs</td>
                                    <td data-table-cell class="ui-table-cell text-start">2,250</td>
                                    <td data-table-cell class="ui-table-cell text-start">4,250</td>
                                    <td data-table-cell class="ui-table-cell text-start">
                                        <span class="inline-flex items-center font-medium leading-none bg-success/15 text-success gap-1 px-2 py-0.5 text-[11px] rounded-full">
                                            <i class="bi bi-arrow-up shrink-0 leading-none" aria-hidden="true"></i>
                                            <span>+12%</span>
                                        </span>
                                    </td>
                                </tr>
                                <!-- + 31–60 secs, 61–120 secs, 121–240 secs, 240+ secs: mesma estrutura -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="ui-widget card flex flex-col overflow-hidden xl:col-span-5">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Top Referrals</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">Sources this week</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">Show All</a>
                    </div>
                </div>
                <div class="ui-widget-body flex-1">
                    <div class="ui-widget-item group relative flex items-start gap-3 px-5 py-3.5 transition-colors border-b border-border hover:bg-muted/30" data-widget-item>
                        <span class="relative inline-flex shrink-0 items-center justify-center rounded-full bg-danger/15 text-danger size-8 self-center">
                            <i class="bi bi-google text-sm leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-0 truncate text-sm font-medium text-card-foreground">www.google.com</p>
                            <p class="mt-0.5 mb-0 line-clamp-2 text-sm text-muted-foreground">Organic search</p>
                        </div>
                        <div class="ui-widget-item-end flex shrink-0 flex-col items-end gap-1 self-center text-end">
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">24.58%</p>
                                <div class="ui-progress w-full mt-1 w-16">
                                    <div class="relative w-full overflow-hidden h-1 rounded-full bg-muted">
                                        <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-danger text-danger-foreground" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- + www.meta.com (info), www.youtube.com (danger), www.medium.com (secondary), Other (primary) -->
                </div>
            </div>
        </div>
        HTML;

    $feedsCode = <<<'BLADE'
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <x-ui.widget title="Recent Activity" flush>…</x-ui.widget>
            <x-ui.widget title="Upcoming Activities" flush>…</x-ui.widget>
            <x-ui.widget title="My Portfolio" flush>…</x-ui.widget>
        </div>
        BLADE;

    $feedsHtml = <<<'HTML'
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div class="ui-widget card flex flex-col overflow-hidden">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Recent Activity</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">890.344 sales</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <a href="#" class="group inline-flex items-center gap-1.5 font-medium transition-colors duration-150 text-primary no-underline hover:underline text-sm">View All</a>
                    </div>
                </div>
                <div class="ui-widget-body flex-1">
                    <div class="ui-widget-item group relative flex items-start gap-3 px-5 py-3.5 transition-colors border-b border-border hover:bg-muted/30" data-widget-item>
                        <span class="relative inline-flex shrink-0 items-center justify-center rounded-full bg-primary/15 text-primary size-8 self-center">
                            <i class="bi bi-cart3 text-sm leading-none" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="mb-0 truncate text-sm font-medium text-card-foreground">Purchase by James Price</p>
                            <p class="mt-0.5 mb-0 line-clamp-2 text-sm text-muted-foreground">Noise Evolve Smartwatch</p>
                        </div>
                        <div class="ui-widget-item-end flex shrink-0 flex-col items-end gap-1 self-center text-end">
                            <span class="text-xs text-muted-foreground whitespace-nowrap">02:14 PM</span>
                        </div>
                    </div>
                    <!-- + 5 outros widget-item: estilo, curtida, oferta, comentário, alerta -->
                </div>
            </div>

            <div class="ui-widget card flex flex-col overflow-hidden">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">Upcoming Activities</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">Showing 4 of 125</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <div class="inline-block">
                            <button type="button" class="btn btn-ghost-secondary btn-sm size-8 p-0" aria-expanded="false">
                                <i class="bi bi-three-dots shrink-0 leading-none" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="ui-widget-body flex-1">
                    <div class="ui-widget-item group relative flex items-start gap-3 px-5 py-3.5 transition-colors border-b border-border hover:bg-muted/30" data-widget-item>
                        <div class="ui-widget-item-start shrink-0 self-center">
                            <div class="flex size-12 flex-col items-center justify-center rounded-md bg-primary/10 text-primary">
                                <span class="text-sm font-bold leading-none">25</span>
                                <span class="text-[10px] uppercase tracking-wide">Tue</span>
                            </div>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="mb-0 truncate text-sm font-medium text-card-foreground">Meeting for campaign with sales team</p>
                            <p class="mt-0.5 mb-0 line-clamp-2 text-sm text-muted-foreground">12:00am – 03:30pm</p>
                        </div>
                        <div class="ui-widget-item-end flex shrink-0 flex-col items-end gap-1 self-center text-end">
                            <div class="ui-stack flex self-stretch flex-row gap-0 items-center justify-start -space-x-2" data-stack data-direction="horizontal" data-axis="horizontal">
                                <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-6 text-xs bg-primary/15 text-primary rounded-full ring-2 ring-card" title="A"><span>A</span></div>
                                <div class="relative inline-flex shrink-0 select-none items-center justify-center font-medium size-6 text-xs bg-success/15 text-success rounded-full ring-2 ring-card" title="B"><span>B</span></div>
                                <span class="flex size-6 items-center justify-center rounded-full bg-muted text-[9px] font-semibold ring-2 ring-card">+3</span>
                            </div>
                        </div>
                    </div>
                    <!-- + 3 outros widget-item: mesma estrutura, com badge no lugar dos avatares -->
                    <div class="card-footer">
                        <span class="text-xs text-muted-foreground">Showing 4 of 125 results</span>
                        <div class="flex items-center gap-1">
                            <button type="button" class="btn btn-outline-secondary btn-sm" disabled>«</button>
                            <button type="button" class="btn btn-soft-primary btn-sm">1</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">2</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">3</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">»</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui-widget card flex flex-col overflow-hidden">
                <div class="card-header">
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <h5 class="card-title">My Portfolio</h5>
                        </div>
                        <p class="mt-1 mb-0 text-sm text-muted-foreground">BTC · USD · Euro</p>
                    </div>
                    <div class="ui-widget-toolbar relative z-[2] flex shrink-0 items-center gap-2">
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-soft-warning btn-sm">BTC</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">USD</button>
                            <button type="button" class="btn btn-outline-secondary btn-sm">Euro</button>
                        </div>
                    </div>
                </div>
                <div class="ui-widget-body flex-1">
                    <div class="ui-widget-item group relative flex items-start gap-3 px-5 py-3.5 transition-colors border-b border-border hover:bg-muted/30" data-widget-item>
                        <div class="ui-widget-item-start shrink-0 self-center">
                            <span class="relative inline-flex shrink-0 items-center justify-center rounded-full bg-warning/15 text-warning size-11">
                                <i class="bi bi-currency-bitcoin text-xl leading-none" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <p class="mb-0 truncate text-sm font-medium text-card-foreground">Bitcoin</p>
                                <span class="inline-flex items-center font-medium leading-none bg-warning/15 text-warning gap-1 px-2 py-0.5 text-[11px] rounded-full"><span>BTC</span></span>
                            </div>
                            <p class="mt-0.5 mb-0 line-clamp-2 text-sm text-muted-foreground">BTC</p>
                        </div>
                        <div class="ui-widget-item-end flex shrink-0 flex-col items-end gap-1 self-center text-end">
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">0.00584875</p>
                                <p class="mb-0 text-xs text-success">$19,405.12</p>
                            </div>
                        </div>
                    </div>
                    <!-- + Ethereum (info), Litecoin (secondary), Dash (primary): mesma estrutura -->
                </div>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            Widgets de dashboard:
            <code>&lt;x-ui.widget&gt;</code> (shell),
            <code>&lt;x-ui.widget.widget-stat&gt;</code> (KPIs / tiles),
            <code>&lt;x-ui.widget.widget-item&gt;</code> (listas / feeds) e
            <code>&lt;x-ui.widget.widget-group&gt;</code> (grid).
            Compose com chart, table, progress, etc. Os previews abaixo são composições reais.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">

        {{-- ═══════════════════════════════════════════ Overview --}}
        <x-ui.example title="Dashboard overview" :code="$overviewCode" :html="$overviewHtml" section="Overview">
            <x-slot:description>
                Composição típica de dashboard: fila de KPIs com sparkline, gráfico principal e feed lateral.
            </x-slot:description>

            <div class="flex flex-col gap-6">
                <x-ui.widget.widget-group :columns="4" gap="lg">
                    <x-ui.widget.widget-stat
                        title="Total Earnings"
                        :value="559.25"
                        prefix="$"
                        icon="bi-currency-dollar"
                        color="primary"
                        variant="soft"
                        trend="up"
                        trend-value="+16.24%"
                        link="#"
                        link-label="View net earnings"
                        animate
                        :decimals="2"
                    >
                        <x-ui.chart
                            type="area"
                            :height="56"
                            :legend="false"
                            :tooltip="false"
                            smooth
                            :categories="$week"
                            :series="[['name' => 'Earn', 'data' => [12, 18, 14, 22, 19, 28, 24]]]"
                            :colors="['primary']"
                        />
                    </x-ui.widget.widget-stat>

                    <x-ui.widget.widget-stat
                        title="Orders"
                        :value="36894"
                        icon="bi-bag-check"
                        color="info"
                        variant="soft"
                        trend="down"
                        trend-value="-3.57%"
                        link="#"
                        link-label="View all orders"
                        animate
                    >
                        <x-ui.chart
                            type="bar"
                            :height="56"
                            :legend="false"
                            :tooltip="false"
                            :categories="$week"
                            :series="[['name' => 'Ord', 'data' => [8, 12, 9, 15, 11, 7, 10]]]"
                            :colors="['info']"
                        />
                    </x-ui.widget.widget-stat>

                    <x-ui.widget.widget-stat
                        title="Customers"
                        :value="183.35"
                        suffix="M"
                        icon="bi-people"
                        color="success"
                        variant="soft"
                        trend="up"
                        trend-value="+29.08%"
                        link="#"
                        link-label="See details"
                        animate
                        :decimals="2"
                    >
                        <x-ui.chart
                            type="area"
                            :height="56"
                            :legend="false"
                            :tooltip="false"
                            smooth
                            :categories="$week"
                            :series="[['name' => 'Cust', 'data' => [20, 24, 22, 30, 28, 35, 32]]]"
                            :colors="['success']"
                        />
                    </x-ui.widget.widget-stat>

                    <x-ui.widget.widget-stat
                        title="My Balance"
                        :value="165.89"
                        prefix="$"
                        icon="bi-wallet2"
                        color="warning"
                        variant="soft"
                        trend="flat"
                        trend-value="+0.00%"
                        link="#"
                        link-label="Withdraw money"
                        animate
                        :decimals="2"
                    >
                        <x-ui.chart
                            type="line"
                            :height="56"
                            :legend="false"
                            :tooltip="false"
                            smooth
                            :categories="$week"
                            :series="[['name' => 'Bal', 'data' => [16, 15, 16, 17, 16, 16, 17]]]"
                            :colors="['warning']"
                        />
                    </x-ui.widget.widget-stat>
                </x-ui.widget.widget-group>

                <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                    <x-ui.widget title="Receita & Pedidos" subtitle="Comparativo ano a ano" class="xl:col-span-8">
                        <x-slot:toolbar>
                            <x-ui.button-group size="sm">
                                <x-ui.button size="sm" variant="soft" color="primary">ALL</x-ui.button>
                                <x-ui.button size="sm" variant="outline" color="secondary">1M</x-ui.button>
                                <x-ui.button size="sm" variant="outline" color="secondary">6M</x-ui.button>
                                <x-ui.button size="sm" variant="outline" color="secondary">1Y</x-ui.button>
                            </x-ui.button-group>
                        </x-slot:toolbar>

                        <x-ui.chart
                            type="area"
                            :height="300"
                            smooth
                            :categories="array_slice($months, 0, 7)"
                            :series="[
                                ['name' => 'Receita', 'data' => [42, 55, 48, 67, 72, 81, 94]],
                                ['name' => 'Pedidos', 'data' => [28, 34, 31, 40, 45, 52, 58]],
                            ]"
                            :colors="['primary', 'info']"
                        />
                    </x-ui.widget>

                    <x-ui.widget title="Atividade recente" flush class="xl:col-span-4">
                        <x-slot:toolbar>
                            <x-ui.link href="#" class="text-sm">Ver tudo</x-ui.link>
                        </x-slot:toolbar>

                        <x-ui.widget.widget-item
                            icon="bi-cart3"
                            icon-color="primary"
                            title="Purchase by James Price"
                            description="Noise Evolve Smartwatch · #XF-2356"
                            meta="02:14 PM"
                        />
                        <x-ui.widget.widget-item
                            icon="bi-palette2"
                            icon-color="success"
                            title="New style collection"
                            description="By Nesta Technologies"
                            meta="Ontem"
                        />
                        <x-ui.widget.widget-item
                            icon="bi-heart-fill"
                            icon-color="danger"
                            title="Natasha Carey liked products"
                            description="3 produtos favoritados na loja"
                            meta="25 Dec"
                        />
                        <x-ui.widget.widget-item
                            icon="bi-chat-dots"
                            icon-color="info"
                            title="Frank Hook commented"
                            description='"Reviews aumentam a conversão."'
                            meta="26 Ago"
                        />
                        <x-ui.widget.widget-item
                            icon="bi-lightning-charge"
                            icon-color="warning"
                            title="Flash sale starting tomorrow"
                            description="Zoetic Fashion · 24h"
                            meta="22 Out"
                        />
                    </x-ui.widget>
                </div>
            </div>
        </x-ui.example>

        {{-- ═══════════════════════════════════════════ Statistics tiles --}}
        <x-ui.example title="Statistics — Tile boxes + sparkline" :code="$tilesCode" :html="$tilesHtml" section="Statistics" group="statistics" group-label="Statistics">
            <x-slot:description>
                <code>layout="tile"</code> com sparkline no slot padrão, tendência em badge e link de rodapé.
            </x-slot:description>

            <x-ui.widget.widget-group :columns="4">
                <x-ui.widget.widget-stat
                    title="Total Earnings"
                    :value="559.25"
                    prefix="$"
                    icon="bi-currency-dollar"
                    color="primary"
                    variant="soft"
                    trend="up"
                    trend-value="+16.24%"
                    link="#"
                    link-label="View net earnings"
                    animate
                    :decimals="2"
                >
                    <x-ui.chart type="area" :height="56" :legend="false" :tooltip="false" smooth :categories="$week" :series="[['name' => 'E', 'data' => [12, 18, 14, 22, 19, 28, 24]]]" :colors="['primary']" />
                </x-ui.widget.widget-stat>
                <x-ui.widget.widget-stat
                    title="Orders"
                    :value="36894"
                    icon="bi-bag-check"
                    color="info"
                    variant="soft"
                    trend="down"
                    trend-value="-3.57%"
                    link="#"
                    link-label="View all orders"
                    animate
                >
                    <x-ui.chart type="bar" :height="56" :legend="false" :tooltip="false" :categories="$week" :series="[['name' => 'O', 'data' => [8, 12, 9, 15, 11, 7, 10]]]" :colors="['info']" />
                </x-ui.widget.widget-stat>
                <x-ui.widget.widget-stat
                    title="Customers"
                    :value="183.35"
                    suffix="M"
                    icon="bi-people"
                    color="success"
                    variant="soft"
                    trend="up"
                    trend-value="+29.08%"
                    link="#"
                    link-label="See details"
                    animate
                    :decimals="2"
                >
                    <x-ui.chart type="area" :height="56" :legend="false" :tooltip="false" smooth :categories="$week" :series="[['name' => 'C', 'data' => [20, 24, 22, 30, 28, 35, 32]]]" :colors="['success']" />
                </x-ui.widget.widget-stat>
                <x-ui.widget.widget-stat
                    title="My Balance"
                    :value="165.89"
                    prefix="$"
                    icon="bi-wallet2"
                    color="warning"
                    variant="soft"
                    trend="flat"
                    trend-value="+0.00%"
                    link="#"
                    link-label="Withdraw money"
                    animate
                    :decimals="2"
                >
                    <x-ui.chart type="line" :height="56" :legend="false" :tooltip="false" smooth :categories="$week" :series="[['name' => 'B', 'data' => [16, 15, 16, 17, 16, 16, 17]]]" :colors="['warning']" />
                </x-ui.widget.widget-stat>
            </x-ui.widget.widget-group>
        </x-ui.example>

        <x-ui.example title="Statistics — Solid stacked" :code="$solidTilesCode" :html="$solidTilesHtml" group="statistics">
            <x-slot:description>
                <code>variant="solid"</code> + <code>layout="stacked"</code> para métricas de campanha com contraste alto.
            </x-slot:description>

            <x-ui.widget.widget-group :columns="5">
                <x-ui.widget.widget-stat layout="stacked" title="Campaign Sent" :value="197" icon="bi-send" color="primary" variant="solid" animate />
                <x-ui.widget.widget-stat layout="stacked" title="Annual Profit" :value="489.4" prefix="$" suffix="k" icon="bi-graph-up-arrow" color="success" variant="solid" animate :decimals="1" />
                <x-ui.widget.widget-stat layout="stacked" title="Lead Conversation" :value="32.89" suffix="%" icon="bi-chat-dots" color="info" variant="solid" animate :decimals="2" />
                <x-ui.widget.widget-stat layout="stacked" title="Daily Income" :value="1596" prefix="$" icon="bi-cash-stack" color="warning" variant="solid" animate />
                <x-ui.widget.widget-stat layout="stacked" title="Annual Deals" :value="2643" icon="bi-briefcase" color="danger" variant="solid" animate />
            </x-ui.widget.widget-group>
        </x-ui.example>

        <x-ui.example title="Statistics — Counters + mini chart" :code="$countersCode" :html="$countersHtml" group="statistics">
            <x-slot:description>
                <code>layout="counter"</code> com sparkline e comparação vs período anterior.
            </x-slot:description>

            <x-ui.widget.widget-group :columns="4">
                <x-ui.widget.widget-stat layout="counter" title="Users" :value="28.05" suffix="k" trend="up" trend-value="16.24%" trend-label="vs. previous month" color="primary" animate :decimals="2">
                    <x-ui.chart type="bar" :height="48" :legend="false" :tooltip="false" :categories="$week" :series="[['name' => 'U', 'data' => [4, 6, 5, 8, 7, 9, 10]]]" :colors="['primary']" />
                </x-ui.widget.widget-stat>
                <x-ui.widget.widget-stat layout="counter" title="Sessions" :value="97.66" suffix="k" trend="down" trend-value="3.96%" trend-label="vs. previous month" color="info" animate :decimals="2">
                    <x-ui.chart type="area" :height="48" :legend="false" :tooltip="false" smooth :categories="$week" :series="[['name' => 'S', 'data' => [30, 28, 26, 24, 25, 22, 20]]]" :colors="['info']" />
                </x-ui.widget.widget-stat>
                <x-ui.widget.widget-stat layout="counter" title="Avg. Visit Duration" value="3m 40s" trend="up" trend-value="0.24%" trend-label="vs. previous month" color="success">
                    <x-ui.chart type="line" :height="48" :legend="false" :tooltip="false" smooth :categories="$week" :series="[['name' => 'D', 'data' => [3.1, 3.2, 3.0, 3.4, 3.3, 3.5, 3.6]]]" :colors="['success']" />
                </x-ui.widget.widget-stat>
                <x-ui.widget.widget-stat layout="counter" title="Bounce Rate" :value="33.48" suffix="%" trend="down" trend-value="7.05%" trend-label="vs. previous month" color="danger" animate :decimals="2" trend-inverse>
                    <x-ui.chart type="bar" :height="48" :legend="false" :tooltip="false" :categories="$week" :series="[['name' => 'B', 'data' => [40, 38, 36, 35, 34, 33, 33]]]" :colors="['danger']" />
                </x-ui.widget.widget-stat>
            </x-ui.widget.widget-group>
        </x-ui.example>

        <x-ui.example title="Statistics — Progress compare" :code="$progressCode" :html="$progressHtml" group="statistics">
            <x-slot:description>
                <code>layout="progress"</code>: valor, comparação anual, badge de tendência e barra.
            </x-slot:description>

            <x-ui.widget.widget-group :columns="4">
                <x-ui.widget.widget-stat layout="progress" title="Total Sales" :value="2045" compare="From 1.930 last year" trend="up" trend-value="6.11%" :progress="61" color="primary" animate />
                <x-ui.widget.widget-stat layout="progress" title="Number of Users" :value="10468" compare="From 9.530 last year" trend="up" trend-value="10.35%" :progress="72" color="info" animate />
                <x-ui.widget.widget-stat layout="progress" title="Total Revenue" :value="2150.04" prefix="$" compare="From $1,750.04 last year" trend="up" trend-value="22.96%" :progress="83" color="success" animate :decimals="2" />
                <x-ui.widget.widget-stat layout="progress" title="Number of Stores" :value="358" suffix="k" compare="From 308 last year" trend="up" trend-value="16.31%" :progress="68" color="warning" animate />
            </x-ui.widget.widget-group>
        </x-ui.example>

        {{-- ═══════════════════════════════════════════ Charts --}}
        <x-ui.example title="Charts — Sessions + Audiences" :code="$chartsCode" :html="$chartsHtml" section="Charts" group="charts" group-label="Charts">
            <x-slot:description>
                Shell com toolbar de período + gráfico; ao lado, donut com mini-KPIs.
            </x-slot:description>

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                <x-ui.widget title="Sessions by Countries" subtitle="Últimos 7 meses" class="xl:col-span-8">
                    <x-slot:toolbar>
                        <x-ui.button-group size="sm">
                            <x-ui.button size="sm" variant="soft" color="primary">ALL</x-ui.button>
                            <x-ui.button size="sm" variant="outline" color="secondary">1M</x-ui.button>
                            <x-ui.button size="sm" variant="outline" color="secondary">6M</x-ui.button>
                        </x-ui.button-group>
                        <x-ui.dropdown label="Export" size="sm" color="secondary" variant="outline" align="end">
                            <x-ui.dropdown.dropdown-item icon="bi-filetype-csv" href="#">CSV</x-ui.dropdown.dropdown-item>
                            <x-ui.dropdown.dropdown-item icon="bi-filetype-pdf" href="#">PDF</x-ui.dropdown.dropdown-item>
                        </x-ui.dropdown>
                    </x-slot:toolbar>

                    <x-ui.chart
                        type="bar"
                        :height="300"
                        :categories="array_slice($months, 0, 7)"
                        :series="[
                            ['name' => 'Sessions', 'data' => [44, 55, 41, 67, 22, 43, 36]],
                            ['name' => 'Views', 'data' => [30, 40, 35, 50, 18, 32, 28]],
                        ]"
                        :colors="['primary', 'info']"
                    />
                </x-ui.widget>

                <x-ui.widget title="Audiences Metrics" subtitle="Dispositivos" class="xl:col-span-4">
                    <x-slot:toolbar>
                        <x-ui.button-group size="sm">
                            <x-ui.button size="sm" variant="soft" color="primary">ALL</x-ui.button>
                            <x-ui.button size="sm" variant="outline" color="secondary">1M</x-ui.button>
                        </x-ui.button-group>
                    </x-slot:toolbar>

                    <x-ui.chart
                        type="donut"
                        show-label
                        :height="220"
                        :series="[
                            ['name' => 'Desktop', 'value' => 48],
                            ['name' => 'Mobile', 'value' => 36],
                            ['name' => 'Tablet', 'value' => 16],
                        ]"
                        :colors="['primary', 'success', 'warning']"
                    />

                    <div class="mt-4 grid grid-cols-3 gap-3 border-t border-border pt-4">
                        <div class="text-center">
                            <p class="mb-0 text-lg font-semibold tabular-nums">854</p>
                            <p class="mb-0 text-[11px] text-muted-foreground">Avg. Session</p>
                            <p class="mb-0 text-xs font-medium text-success">49%</p>
                        </div>
                        <div class="text-center">
                            <p class="mb-0 text-lg font-semibold tabular-nums">127</p>
                            <p class="mb-0 text-[11px] text-muted-foreground">Conversion</p>
                            <p class="mb-0 text-xs font-medium text-success">60%</p>
                        </div>
                        <div class="text-center">
                            <p class="mb-0 text-lg font-semibold tabular-nums">3m</p>
                            <p class="mb-0 text-[11px] text-muted-foreground">Duration</p>
                            <p class="mb-0 text-xs font-medium text-muted-foreground">0s</p>
                        </div>
                    </div>
                </x-ui.widget>
            </div>
        </x-ui.example>

        {{-- ═══════════════════════════════════════════ Lists --}}
        <x-ui.example title="Lists — Authors, Tasks & Products" :code="$listsCode" :html="$listsHtml" section="Lists" group="lists" group-label="Lists">
            <x-slot:description>
                Itens com avatar, badges de skill, progresso, rating e ações.
            </x-slot:description>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <x-ui.widget title="Top Authors" subtitle="Mark, Rowling, Esther" flush>
                    <x-slot:toolbar>
                        <x-ui.dropdown align="end">
                            <x-slot:trigger>
                                <x-ui.button size="sm" variant="ghost" color="secondary" icon="bi-three-dots" icon-only />
                            </x-slot:trigger>
                            <x-ui.dropdown.dropdown-item icon="bi-plus-lg" href="#">New Contact</x-ui.dropdown.dropdown-item>
                            <x-ui.dropdown.dropdown-item icon="bi-file-earmark-bar-graph" href="#">Generate Reports</x-ui.dropdown.dropdown-item>
                        </x-ui.dropdown>
                    </x-slot:toolbar>

                    <x-ui.widget.widget-item avatar="Emma Smith" title="Emma Smith" description="Project Manager" badge="Pro" badge-color="primary">
                        <x-slot:end>
                            <span class="text-sm font-semibold text-success tabular-nums">+$820</span>
                        </x-slot:end>
                        <div class="flex flex-wrap gap-1">
                            <x-ui.badge size="sm" variant="soft" color="secondary">PHP</x-ui.badge>
                            <x-ui.badge size="sm" variant="soft" color="secondary">SQLite</x-ui.badge>
                            <x-ui.badge size="sm" variant="soft" color="secondary">Artisan</x-ui.badge>
                        </div>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item avatar="Sean Bean" title="Sean Bean" description="Lead Developer">
                        <x-slot:end>
                            <span class="text-sm font-semibold text-success tabular-nums">+$1.2k</span>
                        </x-slot:end>
                        <div class="flex flex-wrap gap-1">
                            <x-ui.badge size="sm" variant="soft" color="info">React</x-ui.badge>
                            <x-ui.badge size="sm" variant="soft" color="info">Node</x-ui.badge>
                        </div>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item avatar="Brian Cox" title="Brian Cox" description="UI Designer" badge="New" badge-color="success">
                        <x-slot:end>
                            <span class="text-sm font-semibold text-success tabular-nums">+$450</span>
                        </x-slot:end>
                        <div class="flex flex-wrap gap-1">
                            <x-ui.badge size="sm" variant="soft" color="warning">Figma</x-ui.badge>
                            <x-ui.badge size="sm" variant="soft" color="warning">Tailwind</x-ui.badge>
                        </div>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item avatar="Dan Wilson" title="Dan Wilson" description="DevOps">
                        <x-slot:end>
                            <span class="text-sm font-semibold text-success tabular-nums">+$680</span>
                        </x-slot:end>
                        <div class="flex flex-wrap gap-1">
                            <x-ui.badge size="sm" variant="soft" color="danger">AWS</x-ui.badge>
                            <x-ui.badge size="sm" variant="soft" color="danger">Docker</x-ui.badge>
                        </div>
                    </x-ui.widget.widget-item>
                </x-ui.widget>

                <x-ui.widget title="My Tasks" subtitle="4 of 10 remaining" flush>
                    <x-slot:toolbar>
                        <x-ui.button size="sm" color="primary" icon="bi-plus-lg">Add Task</x-ui.button>
                    </x-slot:toolbar>

                    <x-ui.widget.widget-item
                        icon="bi-check2-circle"
                        icon-color="success"
                        title="Create FireStone Logo"
                        description="Due in 2 Days"
                        badge="New"
                        badge-color="success"
                        :progress="100"
                        progress-color="success"
                    />
                    <x-ui.widget.widget-item
                        icon="bi-people"
                        icon-color="primary"
                        title="Stakeholder Meeting"
                        description="Due in 3 Days"
                        badge="New"
                        badge-color="primary"
                        :progress="45"
                        progress-color="primary"
                    />
                    <x-ui.widget.widget-item
                        icon="bi-rulers"
                        icon-color="warning"
                        title="Scoping & Estimations"
                        description="Due in 5 Days"
                        :progress="20"
                        progress-color="warning"
                    />
                    <x-ui.widget.widget-item
                        icon="bi-graph-up"
                        icon-color="info"
                        title="KPI App Showcase"
                        description="Due in 2 Days"
                        :progress="72"
                        progress-color="info"
                    />
                    <x-ui.widget.widget-item
                        icon="bi-calendar-event"
                        icon-color="secondary"
                        title="Project Meeting"
                        description="Due in 12 Days"
                        :progress="10"
                        progress-color="secondary"
                    />

                    <x-slot:footer>
                        <x-ui.link href="#" class="text-sm">Show more…</x-ui.link>
                        <span class="text-xs text-muted-foreground">10 tasks total</span>
                    </x-slot:footer>
                </x-ui.widget>

                <x-ui.widget title="Latest Products" subtitle="Gifts and more" flush>
                    <x-slot:toolbar>
                        <x-ui.link href="#" class="text-sm">View All</x-ui.link>
                    </x-slot:toolbar>

                    <x-ui.widget.widget-item title="Cup & Green" description="Visually stunning · Size 87KB" badge="Approved" badge-color="success">
                        <x-slot:start>
                            <div class="flex size-11 items-center justify-center rounded-md bg-success/15 text-success">
                                <i class="bi bi-cup-hot text-lg" aria-hidden="true"></i>
                            </div>
                        </x-slot:start>
                        <x-slot:end>
                            <span class="inline-flex items-center gap-0.5 text-sm font-semibold text-warning">
                                <i class="bi bi-star-fill text-xs" aria-hidden="true"></i> 4.2
                            </span>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item title="Pink Patterns" description="Feminine all around · 1.2MB" badge="In Progress" badge-color="warning">
                        <x-slot:start>
                            <div class="flex size-11 items-center justify-center rounded-md bg-danger/15 text-danger">
                                <i class="bi bi-palette text-lg" aria-hidden="true"></i>
                            </div>
                        </x-slot:start>
                        <x-slot:end>
                            <span class="inline-flex items-center gap-0.5 text-sm font-semibold text-warning">
                                <i class="bi bi-star-fill text-xs" aria-hidden="true"></i> 5.0
                            </span>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item title="Abstract Art" description="Capture readers · 345KB" badge="Success" badge-color="info">
                        <x-slot:start>
                            <div class="flex size-11 items-center justify-center rounded-md bg-info/15 text-info">
                                <i class="bi bi-brush text-lg" aria-hidden="true"></i>
                            </div>
                        </x-slot:start>
                        <x-slot:end>
                            <span class="inline-flex items-center gap-0.5 text-sm font-semibold text-warning">
                                <i class="bi bi-star-fill text-xs" aria-hidden="true"></i> 5.7
                            </span>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item title="Desserts platter" description="Food trends · 210KB" badge="Rejected" badge-color="danger">
                        <x-slot:start>
                            <div class="flex size-11 items-center justify-center rounded-md bg-warning/15 text-warning">
                                <i class="bi bi-cake2 text-lg" aria-hidden="true"></i>
                            </div>
                        </x-slot:start>
                        <x-slot:end>
                            <span class="inline-flex items-center gap-0.5 text-sm font-semibold text-warning">
                                <i class="bi bi-star-fill text-xs" aria-hidden="true"></i> 3.7
                            </span>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                </x-ui.widget>
            </div>
        </x-ui.example>

        {{-- ═══════════════════════════════════════════ Mixed --}}
        <x-ui.example title="Mixed — Sales summary & projects" :code="$mixedCode" :html="$mixedHtml" section="Mixed" group="mixed" group-label="Mixed">
            <x-slot:description>
                Balance em destaque, grid de métricas, banner de upgrade e progresso de projeto com time.
            </x-slot:description>

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                <x-ui.widget title="Sales Summary" subtitle="Quarter 2/3 overview" class="xl:col-span-8">
                    <x-slot:toolbar>
                        <x-ui.dropdown label="Actions" size="sm" color="secondary" variant="outline" align="end">
                            <x-ui.dropdown.dropdown-item icon="bi-receipt" href="#">Create Invoice</x-ui.dropdown.dropdown-item>
                            <x-ui.dropdown.dropdown-item icon="bi-credit-card" href="#">Create Payment</x-ui.dropdown.dropdown-item>
                            <x-ui.dropdown.dropdown-item icon="bi-file-earmark-text" href="#">Generate Bill</x-ui.dropdown.dropdown-item>
                        </x-ui.dropdown>
                    </x-slot:toolbar>

                    <div class="mb-6 flex flex-wrap items-end justify-between gap-4 rounded-lg bg-muted/40 p-5">
                        <div>
                            <p class="mb-1 text-sm text-muted-foreground">Your Balance</p>
                            <p class="mb-0 text-3xl font-semibold tabular-nums tracking-tight">$37,562.00</p>
                        </div>
                        <x-ui.button color="primary" icon="bi-plus-lg">Add Funds</x-ui.button>
                    </div>

                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                        <div class="rounded-lg border border-border p-4">
                            <div class="mb-3 flex size-10 items-center justify-center rounded-full bg-primary/15 text-primary">
                                <i class="bi bi-globe2" aria-hidden="true"></i>
                            </div>
                            <p class="mb-0 text-xs text-muted-foreground">Sales</p>
                            <p class="mb-0 text-lg font-semibold tabular-nums">$2.5b</p>
                            <p class="mb-0 text-xs text-muted-foreground">100 Regions</p>
                        </div>
                        <div class="rounded-lg border border-border p-4">
                            <div class="mb-3 flex size-10 items-center justify-center rounded-full bg-success/15 text-success">
                                <i class="bi bi-cash-coin" aria-hidden="true"></i>
                            </div>
                            <p class="mb-0 text-xs text-muted-foreground">Revenue</p>
                            <p class="mb-0 text-lg font-semibold tabular-nums">$1.7b</p>
                            <p class="mb-0 text-xs text-muted-foreground">Quarter 2/3</p>
                        </div>
                        <div class="rounded-lg border border-border p-4">
                            <div class="mb-3 flex size-10 items-center justify-center rounded-full bg-info/15 text-info">
                                <i class="bi bi-graph-up-arrow" aria-hidden="true"></i>
                            </div>
                            <p class="mb-0 text-xs text-muted-foreground">Growth</p>
                            <p class="mb-0 text-lg font-semibold tabular-nums">$8.8m</p>
                            <p class="mb-0 text-xs text-muted-foreground">80% Rate</p>
                        </div>
                        <div class="rounded-lg border border-border p-4">
                            <div class="mb-3 flex size-10 items-center justify-center rounded-full bg-danger/15 text-danger">
                                <i class="bi bi-arrow-repeat" aria-hidden="true"></i>
                            </div>
                            <p class="mb-0 text-xs text-muted-foreground">Dispute</p>
                            <p class="mb-0 text-lg font-semibold tabular-nums">$270m</p>
                            <p class="mb-0 text-xs text-muted-foreground">3.090 Refunds</p>
                        </div>
                    </div>
                </x-ui.widget>

                <div class="flex flex-col gap-6 xl:col-span-4">
                    <x-ui.widget color="primary" variant="soft">
                        <div class="flex flex-col gap-3">
                            <div class="flex items-start justify-between gap-3">
                                <x-ui.badge color="primary" variant="solid" size="sm" pill>Upgrade</x-ui.badge>
                                <x-ui.icon name="bi-rocket-takeoff" color="primary" variant="soft" box-size="md" shape="circle" />
                            </div>
                            <p class="mb-0 text-base font-semibold">
                                Your free trial expires in <span class="text-primary">17</span> days.
                            </p>
                            <p class="mb-0 text-sm text-muted-foreground">
                                Upgrade from Free trial to Premium Plan and unlock analytics, seats and priority support.
                            </p>
                            <div>
                                <x-ui.button size="sm" color="primary">Upgrade Account</x-ui.button>
                            </div>
                        </div>
                    </x-ui.widget>

                    <x-ui.widget title="Brand Logo Design — MD" subtitle="Graphics Work · Due 27 Apr">
                        <x-slot:toolbar>
                            <x-ui.stack direction="horizontal" gap="none" class="-space-x-2">
                                <x-ui.avatar name="Anna" size="sm" circle color="primary" class="ring-2 ring-card" />
                                <x-ui.avatar name="Mark" size="sm" circle color="success" class="ring-2 ring-card" />
                                <x-ui.avatar name="Lisa" size="sm" circle color="info" class="ring-2 ring-card" />
                                <span class="flex size-8 items-center justify-center rounded-full bg-muted text-[10px] font-semibold ring-2 ring-card">+2</span>
                            </x-ui.stack>
                        </x-slot:toolbar>

                        <div class="flex flex-col gap-3">
                            <x-ui.progress title="Completed" :value="70" color="success" show-label label-position="end" size="sm" />
                            <x-ui.progress title="In Progress" :value="45" color="warning" show-label label-position="end" size="sm" />
                            <x-ui.progress title="To Do" :value="20" color="info" show-label label-position="end" size="sm" />
                        </div>
                    </x-ui.widget>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
                <x-ui.widget title="Sales Progress" subtitle="This fiscal year">
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="mb-0 text-sm text-muted-foreground">Average Sale</p>
                                <p class="mb-0 text-xl font-semibold tabular-nums">$650</p>
                            </div>
                            <x-ui.chart type="gauge" :series="72" :height="100" :legend="false" />
                        </div>
                        <x-ui.separator />
                        <div class="grid grid-cols-3 gap-3 text-center">
                            <div>
                                <p class="mb-0 text-xs text-muted-foreground">Commissions</p>
                                <p class="mb-0 text-sm font-semibold tabular-nums">$29.5k</p>
                            </div>
                            <div>
                                <p class="mb-0 text-xs text-muted-foreground">Revenue</p>
                                <p class="mb-0 text-sm font-semibold tabular-nums">$55k</p>
                            </div>
                            <div>
                                <p class="mb-0 text-xs text-muted-foreground">Expenses</p>
                                <p class="mb-0 text-sm font-semibold tabular-nums">$1.1m</p>
                            </div>
                        </div>
                    </div>
                </x-ui.widget>

                <x-ui.widget title="Sales by Locations">
                    <x-slot:toolbar>
                        <x-ui.button size="sm" variant="outline" color="secondary" icon="bi-download">Export</x-ui.button>
                    </x-slot:toolbar>
                    <div class="flex flex-col gap-4">
                        <div>
                            <div class="mb-1.5 flex justify-between text-sm"><span>New Mexico</span><span class="font-medium tabular-nums">75%</span></div>
                            <x-ui.progress :value="75" color="primary" size="sm" />
                        </div>
                        <div>
                            <div class="mb-1.5 flex justify-between text-sm"><span>California</span><span class="font-medium tabular-nums">47%</span></div>
                            <x-ui.progress :value="47" color="info" size="sm" />
                        </div>
                        <div>
                            <div class="mb-1.5 flex justify-between text-sm"><span>Texas</span><span class="font-medium tabular-nums">82%</span></div>
                            <x-ui.progress :value="82" color="success" size="sm" />
                        </div>
                        <div>
                            <div class="mb-1.5 flex justify-between text-sm"><span>Florida</span><span class="font-medium tabular-nums">61%</span></div>
                            <x-ui.progress :value="61" color="warning" size="sm" />
                        </div>
                    </div>
                </x-ui.widget>

                <x-ui.widget title="Hiring Pipeline" subtitle="vs. previous month">
                    <div class="mb-4">
                        <x-ui.chart
                            type="bar"
                            :height="140"
                            :legend="false"
                            :categories="['App', 'Interview', 'Hired']"
                            :series="[['name' => 'Count', 'data' => [162, 84, 27]]]"
                            :colors="['primary']"
                        />
                    </div>
                    <x-ui.widget.widget-group :columns="3" gap="sm">
                        <x-ui.widget.widget-stat layout="counter" title="Application" value="16.24%" trend="up" trend-value="+2.1%" size="sm" color="primary" class="!shadow-none !border-0 !bg-transparent !p-0" />
                        <x-ui.widget.widget-stat layout="counter" title="Interviewed" value="34.24%" trend="up" trend-value="+4.8%" size="sm" color="info" class="!shadow-none !border-0 !bg-transparent !p-0" />
                        <x-ui.widget.widget-stat layout="counter" title="Hired" value="6.67%" trend="down" trend-value="-1.2%" size="sm" color="success" class="!shadow-none !border-0 !bg-transparent !p-0" />
                    </x-ui.widget.widget-group>
                </x-ui.widget>
            </div>
        </x-ui.example>

        {{-- ═══════════════════════════════════════════ Tables --}}
        <x-ui.example title="Tables — Live users & sessions" :code="$tablesCode" :html="$tablesHtml" section="Tables" group="tables" group-label="Tables">
            <x-slot:description>
                Shell <code>flush</code> + tabela com badges de status e avatares.
            </x-slot:description>

            <div class="grid grid-cols-1 gap-6 xl:grid-cols-12">
                <x-ui.widget title="Live Users By Country" subtitle="Sessões por duração" flush class="xl:col-span-7">
                    <x-slot:toolbar>
                        <x-ui.button size="sm" variant="outline" color="secondary" icon="bi-download">Export Report</x-ui.button>
                    </x-slot:toolbar>

                    <x-ui.table hover size="sm" :rounded="false" class="border-0">
                        <x-ui.table.table-header>
                            <x-ui.table.table-row>
                                <x-ui.table.table-head>Duration</x-ui.table.table-head>
                                <x-ui.table.table-head>Sessions</x-ui.table.table-head>
                                <x-ui.table.table-head>Views</x-ui.table.table-head>
                                <x-ui.table.table-head>Trend</x-ui.table.table-head>
                            </x-ui.table.table-row>
                        </x-ui.table.table-header>
                        <x-ui.table.table-body>
                            <x-ui.table.table-row>
                                <x-ui.table.table-cell strong>0–30 secs</x-ui.table.table-cell>
                                <x-ui.table.table-cell>2,250</x-ui.table.table-cell>
                                <x-ui.table.table-cell>4,250</x-ui.table.table-cell>
                                <x-ui.table.table-cell>
                                    <x-ui.badge color="success" variant="soft" size="sm" icon="bi-arrow-up" pill>+12%</x-ui.badge>
                                </x-ui.table.table-cell>
                            </x-ui.table.table-row>
                            <x-ui.table.table-row>
                                <x-ui.table.table-cell strong>31–60 secs</x-ui.table.table-cell>
                                <x-ui.table.table-cell>1,501</x-ui.table.table-cell>
                                <x-ui.table.table-cell>2,050</x-ui.table.table-cell>
                                <x-ui.table.table-cell>
                                    <x-ui.badge color="success" variant="soft" size="sm" icon="bi-arrow-up" pill>+4%</x-ui.badge>
                                </x-ui.table.table-cell>
                            </x-ui.table.table-row>
                            <x-ui.table.table-row>
                                <x-ui.table.table-cell strong>61–120 secs</x-ui.table.table-cell>
                                <x-ui.table.table-cell>750</x-ui.table.table-cell>
                                <x-ui.table.table-cell>1,600</x-ui.table.table-cell>
                                <x-ui.table.table-cell>
                                    <x-ui.badge color="danger" variant="soft" size="sm" icon="bi-arrow-down" pill>-2%</x-ui.badge>
                                </x-ui.table.table-cell>
                            </x-ui.table.table-row>
                            <x-ui.table.table-row>
                                <x-ui.table.table-cell strong>121–240 secs</x-ui.table.table-cell>
                                <x-ui.table.table-cell>540</x-ui.table.table-cell>
                                <x-ui.table.table-cell>1,040</x-ui.table.table-cell>
                                <x-ui.table.table-cell>
                                    <x-ui.badge color="success" variant="soft" size="sm" icon="bi-arrow-up" pill>+8%</x-ui.badge>
                                </x-ui.table.table-cell>
                            </x-ui.table.table-row>
                            <x-ui.table.table-row>
                                <x-ui.table.table-cell strong>240+ secs</x-ui.table.table-cell>
                                <x-ui.table.table-cell>312</x-ui.table.table-cell>
                                <x-ui.table.table-cell>890</x-ui.table.table-cell>
                                <x-ui.table.table-cell>
                                    <x-ui.badge color="warning" variant="soft" size="sm" icon="bi-arrow-right" pill>0%</x-ui.badge>
                                </x-ui.table.table-cell>
                            </x-ui.table.table-row>
                        </x-ui.table.table-body>
                    </x-ui.table>
                </x-ui.widget>

                <x-ui.widget title="Top Referrals" subtitle="Sources this week" flush class="xl:col-span-5">
                    <x-slot:toolbar>
                        <x-ui.link href="#" class="text-sm">Show All</x-ui.link>
                    </x-slot:toolbar>

                    <x-ui.widget.widget-item icon="bi-google" icon-color="danger" title="www.google.com" description="Organic search">
                        <x-slot:end>
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">24.58%</p>
                                <x-ui.progress :value="25" color="danger" size="xs" class="mt-1 w-16" />
                            </div>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item icon="bi-meta" icon-color="info" title="www.meta.com" description="Paid social">
                        <x-slot:end>
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">23.05%</p>
                                <x-ui.progress :value="23" color="info" size="xs" class="mt-1 w-16" />
                            </div>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item icon="bi-youtube" icon-color="danger" title="www.youtube.com" description="Video ads">
                        <x-slot:end>
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">17.51%</p>
                                <x-ui.progress :value="18" color="danger" size="xs" class="mt-1 w-16" />
                            </div>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item icon="bi-medium" icon-color="secondary" title="www.medium.com" description="Content">
                        <x-slot:end>
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">12.22%</p>
                                <x-ui.progress :value="12" color="secondary" size="xs" class="mt-1 w-16" />
                            </div>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item icon="bi-globe" icon-color="primary" title="Other" description="Direct & misc">
                        <x-slot:end>
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">17.58%</p>
                                <x-ui.progress :value="18" color="primary" size="xs" class="mt-1 w-16" />
                            </div>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                </x-ui.widget>
            </div>
        </x-ui.example>

        {{-- ═══════════════════════════════════════════ Feeds --}}
        <x-ui.example title="Feeds — Activity, calendar & portfolio" :code="$feedsCode" :html="$feedsHtml" section="Feeds" group="feeds" group-label="Feeds">
            <x-slot:description>
                Feed de atividade, agenda com datas custom e portfolio cripto.
            </x-slot:description>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <x-ui.widget title="Recent Activity" subtitle="890.344 sales" flush>
                    <x-slot:toolbar>
                        <x-ui.link href="#" class="text-sm">View All</x-ui.link>
                    </x-slot:toolbar>

                    <x-ui.widget.widget-item icon="bi-cart3" icon-color="primary" title="Purchase by James Price" description="Noise Evolve Smartwatch" meta="02:14 PM" />
                    <x-ui.widget.widget-item icon="bi-palette" icon-color="success" title="Added new style collection" description="By Nesta Technologies" meta="9:47 PM" />
                    <x-ui.widget.widget-item icon="bi-heart" icon-color="danger" title="Natasha Carey liked products" description="3 items favorited" meta="25 Dec" />
                    <x-ui.widget.widget-item icon="bi-tag" icon-color="warning" title="Today offers by Digitech" description="Orders of R$500+" meta="12 Dec" />
                    <x-ui.widget.widget-item icon="bi-chat-left-text" icon-color="info" title="Frank Hook commented" description='"Reviews help conversion."' meta="26 Ago" />
                    <x-ui.widget.widget-item icon="bi-bell" icon-color="secondary" title="Monthly sales report due" description="2 days left to submit" meta="15 Out" />
                </x-ui.widget>

                <x-ui.widget title="Upcoming Activities" subtitle="Showing 4 of 125" flush>
                    <x-slot:toolbar>
                        <x-ui.dropdown align="end">
                            <x-slot:trigger>
                                <x-ui.button size="sm" variant="ghost" color="secondary" icon="bi-three-dots" icon-only />
                            </x-slot:trigger>
                            <x-ui.dropdown.dropdown-item icon="bi-pencil" href="#">Edit</x-ui.dropdown.dropdown-item>
                            <x-ui.dropdown.dropdown-item icon="bi-trash" href="#" danger>Remove</x-ui.dropdown.dropdown-item>
                        </x-ui.dropdown>
                    </x-slot:toolbar>

                    <x-ui.widget.widget-item title="Meeting for campaign with sales team" description="12:00am – 03:30pm">
                        <x-slot:start>
                            <div class="flex size-12 flex-col items-center justify-center rounded-md bg-primary/10 text-primary">
                                <span class="text-sm font-bold leading-none">25</span>
                                <span class="text-[10px] uppercase tracking-wide">Tue</span>
                            </div>
                        </x-slot:start>
                        <x-slot:end>
                            <x-ui.stack direction="horizontal" gap="none" class="-space-x-2">
                                <x-ui.avatar name="A" size="xs" circle color="primary" class="ring-2 ring-card" />
                                <x-ui.avatar name="B" size="xs" circle color="success" class="ring-2 ring-card" />
                                <span class="flex size-6 items-center justify-center rounded-full bg-muted text-[9px] font-semibold ring-2 ring-card">+3</span>
                            </x-ui.stack>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item title="Adding a new event with attachments" description="02:00pm – 03:45pm">
                        <x-slot:start>
                            <div class="flex size-12 flex-col items-center justify-center rounded-md bg-success/10 text-success">
                                <span class="text-sm font-bold leading-none">20</span>
                                <span class="text-[10px] uppercase tracking-wide">Wed</span>
                            </div>
                        </x-slot:start>
                        <x-slot:end>
                            <x-ui.badge color="success" variant="soft" size="sm" pill>3</x-ui.badge>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item title="Create new project Bundling Product" description="04:30pm – 07:15pm">
                        <x-slot:start>
                            <div class="flex size-12 flex-col items-center justify-center rounded-md bg-warning/10 text-warning">
                                <span class="text-sm font-bold leading-none">17</span>
                                <span class="text-[10px] uppercase tracking-wide">Wed</span>
                            </div>
                        </x-slot:start>
                        <x-slot:end>
                            <x-ui.badge color="warning" variant="soft" size="sm" pill>4</x-ui.badge>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item title="Weekly closed sales won checking" description="10:30am – 01:15pm">
                        <x-slot:start>
                            <div class="flex size-12 flex-col items-center justify-center rounded-md bg-info/10 text-info">
                                <span class="text-sm font-bold leading-none">12</span>
                                <span class="text-[10px] uppercase tracking-wide">Tue</span>
                            </div>
                        </x-slot:start>
                        <x-slot:end>
                            <x-ui.badge color="info" variant="soft" size="sm" pill>9</x-ui.badge>
                        </x-slot:end>
                    </x-ui.widget.widget-item>

                    <x-slot:footer>
                        <span class="text-xs text-muted-foreground">Showing 4 of 125 results</span>
                        <div class="flex items-center gap-1">
                            <x-ui.button size="sm" variant="outline" color="secondary" disabled>«</x-ui.button>
                            <x-ui.button size="sm" variant="soft" color="primary">1</x-ui.button>
                            <x-ui.button size="sm" variant="outline" color="secondary">2</x-ui.button>
                            <x-ui.button size="sm" variant="outline" color="secondary">3</x-ui.button>
                            <x-ui.button size="sm" variant="outline" color="secondary">»</x-ui.button>
                        </div>
                    </x-slot:footer>
                </x-ui.widget>

                <x-ui.widget title="My Portfolio" subtitle="BTC · USD · Euro" flush>
                    <x-slot:toolbar>
                        <x-ui.button-group size="sm">
                            <x-ui.button size="sm" variant="soft" color="warning">BTC</x-ui.button>
                            <x-ui.button size="sm" variant="outline" color="secondary">USD</x-ui.button>
                            <x-ui.button size="sm" variant="outline" color="secondary">Euro</x-ui.button>
                        </x-ui.button-group>
                    </x-slot:toolbar>

                    <x-ui.widget.widget-item title="Bitcoin" description="BTC" badge="BTC" badge-color="warning">
                        <x-slot:start>
                            <x-ui.icon name="bi-currency-bitcoin" color="warning" variant="soft" box-size="md" shape="circle" />
                        </x-slot:start>
                        <x-slot:end>
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">0.00584875</p>
                                <p class="mb-0 text-xs text-success">$19,405.12</p>
                            </div>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item title="Ethereum" description="ETH">
                        <x-slot:start>
                            <x-ui.icon name="bi-currency-exchange" color="info" variant="soft" box-size="md" shape="circle" />
                        </x-slot:start>
                        <x-slot:end>
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">2.25842108</p>
                                <p class="mb-0 text-xs text-success">$40,552.18</p>
                            </div>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item title="Litecoin" description="LTC">
                        <x-slot:start>
                            <x-ui.icon name="bi-coin" color="secondary" variant="soft" box-size="md" shape="circle" />
                        </x-slot:start>
                        <x-slot:end>
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">10.58963217</p>
                                <p class="mb-0 text-xs text-danger">$15,824.58</p>
                            </div>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                    <x-ui.widget.widget-item title="Dash" description="DASH">
                        <x-slot:start>
                            <x-ui.icon name="bi-diamond" color="primary" variant="soft" box-size="md" shape="circle" />
                        </x-slot:start>
                        <x-slot:end>
                            <div class="text-end">
                                <p class="mb-0 text-sm font-semibold tabular-nums">204.28565885</p>
                                <p class="mb-0 text-xs text-success">$30,635.84</p>
                            </div>
                        </x-slot:end>
                    </x-ui.widget.widget-item>
                </x-ui.widget>
            </div>
        </x-ui.example>
    </div>

    <x-ui.docs.api reference="widget" />
</div>
</x-ui.docs>
