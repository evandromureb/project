<?php

use Livewire\Component;

return new class extends Component
{
    public string $title = 'Início';
};
?>

@php
    $months = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
    $week = ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'];
@endphp

<div class="flex flex-col gap-6">

	<div class="flex flex-col gap-4 sm:flex-row">
		<div class="card flex-1">
			<div class="card-header">
				<div><h5 class="card-title">Básico</h5></div>
			</div>
			<div class="card-body flex flex-col">
				<p class="text-3xl font-semibold tracking-tight">R$ 0</p>
				<p class="mb-4 text-sm text-muted-foreground">Para experimentar.</p>
				<ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
					<li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> 1 projeto</li>
					<li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Suporte por e-mail</li>
				</ul>
				<button type="button" class="btn btn-outline-primary w-full">Começar</button>
			</div>
		</div>

		<div class="card flex-1 border-primary/25 bg-primary/10 text-primary">
			<div class="card-header">
				<div><h5 class="card-title">Pro</h5></div>
			</div>
			<div class="card-body flex flex-col">
				<div class="mb-1 flex items-center gap-2">
					<p class="mb-0 text-3xl font-semibold tracking-tight">R$ 49</p>
					<span class="badge badge-primary badge-sm rounded-full">Popular</span>
				</div>
				<p class="mb-4 text-sm text-muted-foreground">Para times em crescimento.</p>
				<ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
					<li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Projetos ilimitados</li>
					<li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Suporte prioritário</li>
				</ul>
				<button type="button" class="btn btn-primary w-full">Assinar Pro</button>
			</div>
		</div>

		<div class="card flex-1">
			<div class="card-header">
				<div><h5 class="card-title">Enterprise</h5></div>
			</div>
			<div class="card-body flex flex-col">
				<p class="text-3xl font-semibold tracking-tight">Custom</p>
				<p class="mb-4 text-sm text-muted-foreground">Para grandes empresas.</p>
				<ul class="mb-4 flex flex-1 flex-col gap-2 text-sm text-muted-foreground">
					<li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> SSO e auditoria</li>
					<li class="flex items-center gap-2"><i class="bi bi-check2 text-success" aria-hidden="true"></i> Gerente dedicado</li>
				</ul>
				<button type="button" class="btn btn-outline-secondary w-full">Falar com vendas</button>
			</div>
		</div>
	</div>

    <x-ui.widget.widget-group :columns="4" gap="lg">
        <x-ui.widget.widget-stat
            title="Receita total"
            :value="559.25"
            prefix="R$"
            icon="bi-currency-dollar"
            color="primary"
            variant="soft"
            trend="up"
            trend-value="+16.24%"
            link="#"
            link-label="Ver receita líquida"
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
            title="Pedidos"
            :value="36894"
            icon="bi-bag-check"
            color="info"
            variant="soft"
            trend="down"
            trend-value="-3.57%"
            link="#"
            link-label="Ver todos os pedidos"
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
            title="Clientes"
            :value="183.35"
            suffix="k"
            icon="bi-people"
            color="success"
            variant="soft"
            trend="up"
            trend-value="+29.08%"
            link="#"
            link-label="Ver detalhes"
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
            title="Saldo"
            :value="165.89"
            prefix="R$"
            icon="bi-wallet2"
            color="warning"
            variant="soft"
            trend="flat"
            trend-value="+0.00%"
            link="#"
            link-label="Sacar valor"
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
                title="Compra de James Price"
                description="Noise Evolve Smartwatch · #XF-2356"
                meta="14:14"
            />
            <x-ui.widget.widget-item
                icon="bi-palette2"
                icon-color="success"
                title="Nova coleção de estilos"
                description="Por Nesta Technologies"
                meta="Ontem"
            />
            <x-ui.widget.widget-item
                icon="bi-heart-fill"
                icon-color="danger"
                title="Natasha Carey favoritou produtos"
                description="3 produtos favoritados na loja"
                meta="25 Dez"
            />
            <x-ui.widget.widget-item
                icon="bi-chat-dots"
                icon-color="info"
                title="Frank Hook comentou"
                description='"Reviews aumentam a conversão."'
                meta="26 Ago"
            />
            <x-ui.widget.widget-item
                icon="bi-lightning-charge"
                icon-color="warning"
                title="Flash sale amanhã"
                description="Zoetic Fashion · 24h"
                meta="22 Out"
            />
        </x-ui.widget>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 xl:grid-cols-12">
        <x-ui.widget title="Minhas tarefas" subtitle="4 de 10 restantes" flush class="xl:col-span-4">
            <x-slot:toolbar>
                <x-ui.button size="sm" color="primary" icon="bi-plus-lg">Nova tarefa</x-ui.button>
            </x-slot:toolbar>

            <x-ui.widget.widget-item
                icon="bi-check2-circle"
                icon-color="success"
                title="Criar logo FireStone"
                description="Vence em 2 dias"
                badge="Nova"
                badge-color="success"
                :progress="100"
                progress-color="success"
            />
            <x-ui.widget.widget-item
                icon="bi-people"
                icon-color="primary"
                title="Reunião com stakeholders"
                description="Vence em 3 dias"
                badge="Nova"
                badge-color="primary"
                :progress="45"
                progress-color="primary"
            />
            <x-ui.widget.widget-item
                icon="bi-rulers"
                icon-color="warning"
                title="Escopo & estimativas"
                description="Vence em 5 dias"
                :progress="20"
                progress-color="warning"
            />
            <x-ui.widget.widget-item
                icon="bi-graph-up"
                icon-color="info"
                title="Showcase do app de KPIs"
                description="Vence em 2 dias"
                :progress="72"
                progress-color="info"
            />

            <x-slot:footer>
                <x-ui.link href="#" class="text-sm">Ver mais…</x-ui.link>
                <span class="text-xs text-muted-foreground">10 tarefas no total</span>
            </x-slot:footer>
        </x-ui.widget>

        <x-ui.widget title="Próximos eventos" flush class="xl:col-span-4">
            <x-slot:toolbar>
                <x-ui.link href="#" class="text-sm">Calendário</x-ui.link>
            </x-slot:toolbar>

            <x-ui.widget.widget-item title="Design Review" description="Equipe de produto · Sala 2" meta="09:30">
                <x-slot:start>
                    <div class="flex size-11 flex-col items-center justify-center rounded-md bg-primary/15 text-primary">
                        <span class="text-[10px] font-semibold uppercase leading-none">Mar</span>
                        <span class="text-sm font-bold leading-tight">12</span>
                    </div>
                </x-slot:start>
            </x-ui.widget.widget-item>
            <x-ui.widget.widget-item title="Demo com cliente" description="Acme Corp · Meet" meta="14:00">
                <x-slot:start>
                    <div class="flex size-11 flex-col items-center justify-center rounded-md bg-info/15 text-info">
                        <span class="text-[10px] font-semibold uppercase leading-none">Mar</span>
                        <span class="text-sm font-bold leading-tight">14</span>
                    </div>
                </x-slot:start>
            </x-ui.widget.widget-item>
            <x-ui.widget.widget-item title="Sprint Planning" description="Time de engenharia" meta="10:00">
                <x-slot:start>
                    <div class="flex size-11 flex-col items-center justify-center rounded-md bg-success/15 text-success">
                        <span class="text-[10px] font-semibold uppercase leading-none">Mar</span>
                        <span class="text-sm font-bold leading-tight">18</span>
                    </div>
                </x-slot:start>
            </x-ui.widget.widget-item>
            <x-ui.widget.widget-item title="Retrospectiva" description="Sprint 24 · Remoto" meta="16:30">
                <x-slot:start>
                    <div class="flex size-11 flex-col items-center justify-center rounded-md bg-warning/15 text-warning">
                        <span class="text-[10px] font-semibold uppercase leading-none">Mar</span>
                        <span class="text-sm font-bold leading-tight">21</span>
                    </div>
                </x-slot:start>
            </x-ui.widget.widget-item>
        </x-ui.widget>

        <x-ui.widget title="Vendas por região" subtitle="Este trimestre" class="xl:col-span-4">
            <div class="flex flex-col gap-4">
                <div>
                    <div class="mb-1.5 flex justify-between text-sm"><span>Sudeste</span><span class="font-medium tabular-nums">75%</span></div>
                    <x-ui.progress :value="75" color="primary" size="sm" />
                </div>
                <div>
                    <div class="mb-1.5 flex justify-between text-sm"><span>Sul</span><span class="font-medium tabular-nums">47%</span></div>
                    <x-ui.progress :value="47" color="info" size="sm" />
                </div>
                <div>
                    <div class="mb-1.5 flex justify-between text-sm"><span>Nordeste</span><span class="font-medium tabular-nums">82%</span></div>
                    <x-ui.progress :value="82" color="success" size="sm" />
                </div>
                <div>
                    <div class="mb-1.5 flex justify-between text-sm"><span>Centro-Oeste</span><span class="font-medium tabular-nums">61%</span></div>
                    <x-ui.progress :value="61" color="warning" size="sm" />
                </div>
            </div>
        </x-ui.widget>
    </div>
</div>
