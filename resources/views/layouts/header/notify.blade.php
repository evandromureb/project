

{{-- notificações: cabeçalho + abas (Todas/Mensagens/Alertas) via
	 radio+label CSS-only (peer), sem JS adicional. Itens com conteúdo
	 genérico de estrutura, sem nomes/fotos de pessoas fictícias. --}}
<details class="dropdown relative">
	<summary class="dropdown-trigger btn-icon relative" aria-label="Notificações">
		<i class="bi bi-bell text-lg leading-none" aria-hidden="true"></i>
		<span class="absolute right-1 top-1 flex size-4 items-center justify-center rounded-full bg-danger text-[10px] font-semibold text-danger-foreground">
                                    4
                                </span>
	</summary>

	<div class="absolute right-0 z-20 mt-2 w-80 overflow-hidden rounded-md border border-border bg-popover shadow-lg">
		{{-- inputs das abas: precisam vir antes no DOM para o seletor peer-checked funcionar --}}
		<input type="radio" name="notif-tabs" id="notif-tab-all" class="peer/all sr-only" checked>
		<input type="radio" name="notif-tabs" id="notif-tab-messages" class="peer/messages sr-only">
		<input type="radio" name="notif-tabs" id="notif-tab-alerts" class="peer/alerts sr-only">

		{{-- cabeçalho + abas --}}
		<div class="bg-primary px-4 pt-3 pb-0">
			<div class="mb-3 flex items-center justify-between">
				<h6 class="text-sm font-semibold text-primary-foreground">Notificações</h6>
				<span class="rounded-full bg-primary-foreground/20 px-2 py-0.5 text-xs text-primary-foreground">4 novas</span>
			</div>
			<div class="flex gap-4 text-sm">
				<label for="notif-tab-all" class="cursor-pointer border-b-2 border-transparent pb-2 text-primary-foreground/70 peer-checked/all:border-primary-foreground peer-checked/all:text-primary-foreground">
					Todas
				</label>
				<label for="notif-tab-messages" class="cursor-pointer border-b-2 border-transparent pb-2 text-primary-foreground/70 peer-checked/messages:border-primary-foreground peer-checked/messages:text-primary-foreground">
					Mensagens
				</label>
				<label for="notif-tab-alerts" class="cursor-pointer border-b-2 border-transparent pb-2 text-primary-foreground/70 peer-checked/alerts:border-primary-foreground peer-checked/alerts:text-primary-foreground">
					Alertas
				</label>
			</div>
		</div>

		{{-- aba: Todas --}}
		<div class="hidden max-h-72 overflow-y-auto peer-checked/all:block">
			@foreach ([
				['badge' => 'bg-success/15 text-success', 'text' => 'Sua atualização foi publicada com sucesso.', 'time' => 'Há 30 seg'],
				['badge' => 'bg-info/15 text-info', 'text' => 'Você tem uma nova mensagem na conversa.', 'time' => 'Há 48 min'],
				['badge' => 'bg-warning/15 text-warning', 'text' => 'Um novo item foi atribuído a você.', 'time' => 'Há 2 h'],
				['badge' => 'bg-primary/15 text-primary', 'text' => 'Um novo usuário entrou em contato.', 'time' => 'Há 4 h'],
			] as $notification)
				<div class="flex items-start gap-3 border-b border-border px-4 py-3 last:border-b-0 hover:bg-header-hover">
                                            <span class="flex size-8 shrink-0 items-center justify-center rounded-full {{ $notification['badge'] }}">
                                                <i class="bi bi-check-lg text-sm leading-none" aria-hidden="true"></i>
                                            </span>
					<div class="min-w-0 flex-1">
						<p class="text-sm leading-snug text-popover-foreground">{{ $notification['text'] }}</p>
						<p class="mt-0.5 text-xs text-muted-foreground">{{ $notification['time'] }}</p>
					</div>
				</div>
			@endforeach
			<div class="px-4 py-3 text-center">
				<button type="button" class="btn btn-soft-primary btn-sm w-full">Ver todas as notificações</button>
			</div>
		</div>

		{{-- aba: Mensagens --}}
		<div class="hidden max-h-72 overflow-y-auto peer-checked/messages:block">
			@foreach ([
				['text' => 'Nova mensagem recebida na caixa de entrada.', 'time' => 'Há 30 min'],
				['text' => 'Você foi mencionado em um comentário.', 'time' => 'Há 2 h'],
				['text' => 'Nova resposta em uma conversa que você participa.', 'time' => 'Há 3 dias'],
			] as $message)
				<div class="flex items-start gap-3 border-b border-border px-4 py-3 last:border-b-0 hover:bg-header-hover">
                                            <span class="flex size-8 shrink-0 items-center justify-center rounded-full bg-info/15 text-info">
                                                <i class="bi bi-chat-dots text-sm leading-none" aria-hidden="true"></i>
                                            </span>
					<div class="min-w-0 flex-1">
						<p class="text-sm leading-snug text-popover-foreground">{{ $message['text'] }}</p>
						<p class="mt-0.5 text-xs text-muted-foreground">{{ $message['time'] }}</p>
					</div>
				</div>
			@endforeach
			<div class="px-4 py-3 text-center">
				<button type="button" class="btn btn-soft-primary btn-sm w-full">Ver todas as mensagens</button>
			</div>
		</div>

		{{-- aba: Alertas (estado vazio, sem dados fictícios) --}}
		<div class="hidden peer-checked/alerts:block">
			<p class="px-4 py-8 text-center text-sm text-muted-foreground">
				Nenhum alerta por aqui.
			</p>
		</div>
	</div>
</details>
