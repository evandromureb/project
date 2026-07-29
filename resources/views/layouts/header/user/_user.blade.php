
<details class="dropdown relative ml-1 border-l border-border pl-3">
	<summary class="dropdown-trigger flex cursor-pointer list-none items-center gap-2">
		<x-ui.avatar initials="{{ getNameInitials('Usuário Administrativo') }}" color="primary" circle />
		<span class="hidden text-left sm:block">
			<span class="block text-sm font-medium leading-tight text-header-foreground">
				Usuário Administrativo
			</span>
			<span class="block text-xs leading-tight text-muted-foreground">
				Administrador
			</span>
		</span>
	</summary>

	<div class="absolute right-0 z-20 mt-2 w-52 overflow-hidden rounded-md border border-border bg-popover py-1 shadow-lg">
		<div class="border-b border-border px-4 py-2 text-sm font-semibold text-popover-foreground">
			Olá, Usuário!
		</div>

		{{-- seletor de tema: troca o data-theme do <html> via clique delegado
			 em resources/js/layout.js ([data-theme-name]). As cores dos
			 swatches abaixo são intencionalmente fixas — são a prévia visual
			 de um tema que pode não estar ativo, então não podem depender de
			 variáveis CSS (só existem quando aquele tema está aplicado no
			 <html>). Mantenha em sincronia com resources/css/themes/*.css. --}}
		<div class="border-b border-border px-4 py-3">
			<p class="mb-2 text-xs font-semibold uppercase tracking-wide text-muted-foreground">Tema</p>
			<div class="flex items-center gap-2">
				@foreach ([
					'default' => ['label' => 'Padrão', 'swatch' => '#6691e7'],
					'blue' => ['label' => 'Azul', 'swatch' => '#2563eb'],
					'green' => ['label' => 'Verde', 'swatch' => '#16a34a'],
					'corporate' => ['label' => 'Corporativo', 'swatch' => '#334155'],
					'danger' => ['label' => 'Danger', 'swatch' => '#dc2626'],
				] as $themeName => $themeOption)
					<button
						type="button"
						data-theme-name="{{ $themeName }}"
						class="flex size-7 items-center justify-center rounded-full border-2 border-border transition-colors hover:border-primary"
						style="background-color: {{ $themeOption['swatch'] }}"
						aria-label="Tema {{ $themeOption['label'] }}"
						title="{{ $themeOption['label'] }}"
					></button>
				@endforeach
			</div>
		</div>

		<a href="#" class="block px-4 py-2 text-sm text-popover-foreground hover:bg-muted">Perfil</a>
		<a href="#" class="block px-4 py-2 text-sm text-popover-foreground hover:bg-muted">Mensagens</a>
		<a href="#" class="block px-4 py-2 text-sm text-popover-foreground hover:bg-muted">Quadro de tarefas</a>
		<a href="#" class="block px-4 py-2 text-sm text-popover-foreground hover:bg-muted">Ajuda</a>
		<div class="my-1 border-t border-border"></div>
		<a href="#" class="block px-4 py-2 text-sm text-popover-foreground hover:bg-muted">Configurações</a>
		<a href="#" class="block px-4 py-2 text-sm text-popover-foreground hover:bg-muted">Bloquear tela</a>
		<a href="#" class="block px-4 py-2 text-sm text-popover-foreground hover:bg-muted">Sair</a>
	</div>
</details>
