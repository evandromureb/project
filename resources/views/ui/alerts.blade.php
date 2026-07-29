<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $colorsCode = <<<'BLADE'
        <x-ui.alert color="primary" icon>Este é um alerta primário.</x-ui.alert>
        <x-ui.alert color="secondary" icon>Este é um alerta secundário.</x-ui.alert>
        <x-ui.alert color="success" icon>Operação realizada com sucesso.</x-ui.alert>
        <x-ui.alert color="warning" icon>Atenção, verifique os dados informados.</x-ui.alert>
        <x-ui.alert color="danger" icon>Ocorreu um erro ao processar sua solicitação.</x-ui.alert>
        <x-ui.alert color="info" icon>Nova atualização disponível.</x-ui.alert>
        BLADE;

    $colorsHtml = <<<'HTML'
        <div role="alert" class="border border-primary/20 border-l-4 border-l-primary bg-primary/10 text-primary flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-info-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Este é um alerta primário.</div>
            </div>
        </div>
        <div role="alert" class="border border-secondary/20 border-l-4 border-l-secondary bg-secondary/10 text-secondary flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-bell-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Este é um alerta secundário.</div>
            </div>
        </div>
        <div role="alert" class="border border-success/20 border-l-4 border-l-success bg-success/10 text-success flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Operação realizada com sucesso.</div>
            </div>
        </div>
        <div role="alert" class="border border-warning/20 border-l-4 border-l-warning bg-warning/10 text-warning flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-exclamation-triangle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Atenção, verifique os dados informados.</div>
            </div>
        </div>
        <div role="alert" class="border border-danger/20 border-l-4 border-l-danger bg-danger/10 text-danger flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-x-octagon-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Ocorreu um erro ao processar sua solicitação.</div>
            </div>
        </div>
        <div role="alert" class="border border-info/20 border-l-4 border-l-info bg-info/10 text-info flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-info-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Nova atualização disponível.</div>
            </div>
        </div>
        HTML;

    $solidCode = <<<'BLADE'
        <x-ui.alert color="primary" variant="solid" icon>Alerta primário sólido.</x-ui.alert>
        <x-ui.alert color="success" variant="solid" icon>Operação concluída.</x-ui.alert>
        <x-ui.alert color="warning" variant="solid" icon>Revise os campos destacados.</x-ui.alert>
        <x-ui.alert color="danger" variant="solid" icon>Falha ao salvar as alterações.</x-ui.alert>
        BLADE;

    $solidHtml = <<<'HTML'
        <div role="alert" class="border border-primary bg-primary text-primary-foreground flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-info-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Alerta primário sólido.</div>
            </div>
        </div>
        <div role="alert" class="border border-success bg-success text-success-foreground flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Operação concluída.</div>
            </div>
        </div>
        <div role="alert" class="border border-warning bg-warning text-warning-foreground flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-exclamation-triangle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Revise os campos destacados.</div>
            </div>
        </div>
        <div role="alert" class="border border-danger bg-danger text-danger-foreground flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-x-octagon-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Falha ao salvar as alterações.</div>
            </div>
        </div>
        HTML;

    $outlineCode = <<<'BLADE'
        <x-ui.alert color="primary" variant="outline" icon>Alerta outline primário.</x-ui.alert>
        <x-ui.alert color="success" variant="outline" icon>Tudo certo por aqui.</x-ui.alert>
        <x-ui.alert color="warning" variant="outline" icon>Há pendências no cadastro.</x-ui.alert>
        <x-ui.alert color="danger" variant="outline" icon>Não foi possível conectar.</x-ui.alert>
        BLADE;

    $outlineHtml = <<<'HTML'
        <div role="alert" class="border border-primary bg-card text-primary flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-info-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Alerta outline primário.</div>
            </div>
        </div>
        <div role="alert" class="border border-success bg-card text-success flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Tudo certo por aqui.</div>
            </div>
        </div>
        <div role="alert" class="border border-warning bg-card text-warning flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-exclamation-triangle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Há pendências no cadastro.</div>
            </div>
        </div>
        <div role="alert" class="border border-danger bg-card text-danger flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-x-octagon-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <div class="leading-relaxed">Não foi possível conectar.</div>
            </div>
        </div>
        HTML;

    $variantsCode = <<<'BLADE'
        <x-ui.alert color="success" variant="soft" icon title="Soft">
            Fundo suave com faixa lateral colorida (padrão).
        </x-ui.alert>
        <x-ui.alert color="success" variant="solid" icon title="Solid">
            Fundo cheio com texto contrastante.
        </x-ui.alert>
        <x-ui.alert color="success" variant="outline" icon title="Outline">
            Borda colorida sobre o fundo do card.
        </x-ui.alert>
        BLADE;

    $variantsHtml = <<<'HTML'
        <div role="alert" class="border border-success/20 border-l-4 border-l-success bg-success/10 text-success flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Soft</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    Fundo suave com faixa lateral colorida (padrão).
                </div>
            </div>
        </div>
        <div role="alert" class="border border-success bg-success text-success-foreground flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Solid</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    Fundo cheio com texto contrastante.
                </div>
            </div>
        </div>
        <div role="alert" class="border border-success bg-card text-success flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Outline</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    Borda colorida sobre o fundo do card.
                </div>
            </div>
        </div>
        HTML;

    $titleCode = <<<'BLADE'
        <x-ui.alert color="warning" icon title="Atenção">
            Seu plano expira em 3 dias. Renove para não perder o acesso aos recursos Pro.
        </x-ui.alert>
        BLADE;

    $titleHtml = <<<'HTML'
        <div role="alert" class="border border-warning/20 border-l-4 border-l-warning bg-warning/10 text-warning flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-exclamation-triangle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Atenção</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    Seu plano expira em 3 dias. Renove para não perder o acesso aos recursos Pro.
                </div>
            </div>
        </div>
        HTML;

    $iconCode = <<<'BLADE'
        <x-ui.alert color="success" icon title="Sucesso">
            Cadastro salvo com sucesso.
        </x-ui.alert>

        <x-ui.alert color="danger" icon="bi-shield-fill-exclamation" title="Falha de segurança">
            Detectamos uma tentativa de login suspeita a partir de um novo dispositivo.
        </x-ui.alert>

        <x-ui.alert color="info" icon="bi-lightning-charge-fill" title="Dica rápida">
            Use atalhos de teclado para navegar mais rápido no painel.
        </x-ui.alert>
        BLADE;

    $iconHtml = <<<'HTML'
        <div role="alert" class="border border-success/20 border-l-4 border-l-success bg-success/10 text-success flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Sucesso</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    Cadastro salvo com sucesso.
                </div>
            </div>
        </div>

        <div role="alert" class="border border-danger/20 border-l-4 border-l-danger bg-danger/10 text-danger flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-shield-fill-exclamation mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Falha de segurança</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    Detectamos uma tentativa de login suspeita a partir de um novo dispositivo.
                </div>
            </div>
        </div>

        <div role="alert" class="border border-info/20 border-l-4 border-l-info bg-info/10 text-info flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-lightning-charge-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Dica rápida</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    Use atalhos de teclado para navegar mais rápido no painel.
                </div>
            </div>
        </div>
        HTML;

    $actionsCode = <<<'BLADE'
        <x-ui.alert color="warning" icon title="Plano prestes a expirar">
            Renove agora e mantenha o acesso a relatórios avançados e integrações.

            <x-slot:actions>
                <x-ui.button color="warning" size="sm">Renovar plano</x-ui.button>
                <x-ui.button color="warning" variant="ghost" size="sm">Lembrar depois</x-ui.button>
            </x-slot:actions>
        </x-ui.alert>

        <x-ui.alert color="info" icon title="Convite pendente" variant="outline">
            Você foi convidado para o workspace "Design System".

            <x-slot:actions>
                <x-ui.button color="info" size="sm">Aceitar</x-ui.button>
                <x-ui.button color="secondary" variant="ghost" size="sm">Recusar</x-ui.button>
            </x-slot:actions>
        </x-ui.alert>
        BLADE;

    $actionsHtml = <<<'HTML'
        <div role="alert" class="border border-warning/20 border-l-4 border-l-warning bg-warning/10 text-warning flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-exclamation-triangle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Plano prestes a expirar</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    Renove agora e mantenha o acesso a relatórios avançados e integrações.
                </div>
                <div class="mt-3 flex flex-wrap items-center gap-2">
                    <button type="button" class="btn btn-warning btn-sm">Renovar plano</button>
                    <button type="button" class="btn btn-ghost-warning btn-sm">Lembrar depois</button>
                </div>
            </div>
        </div>

        <div role="alert" class="border border-info bg-card text-info flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-info-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Convite pendente</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    Você foi convidado para o workspace "Design System".
                </div>
                <div class="mt-3 flex flex-wrap items-center gap-2">
                    <button type="button" class="btn btn-info btn-sm">Aceitar</button>
                    <button type="button" class="btn btn-ghost-secondary btn-sm">Recusar</button>
                </div>
            </div>
        </div>
        HTML;

    $dismissibleCode = <<<'BLADE'
        <x-ui.alert color="info" icon title="Novidade" dismissible>
            Agora você pode exportar relatórios em PDF e CSV.
        </x-ui.alert>

        <x-ui.alert color="success" variant="solid" icon title="Alterações salvas" dismissible>
            O perfil foi atualizado com sucesso.
        </x-ui.alert>
        BLADE;

    $dismissibleHtml = <<<'HTML'
        <div role="alert" class="border border-info/20 border-l-4 border-l-info bg-info/10 text-info flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-info-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Novidade</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    Agora você pode exportar relatórios em PDF e CSV.
                </div>
            </div>
            <button type="button" class="-m-1 shrink-0 rounded-md p-1 opacity-70 transition-opacity hover:opacity-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-current" aria-label="Fechar">
                <i class="bi bi-x-lg text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>

        <div role="alert" class="border border-success bg-success text-success-foreground flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Alterações salvas</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    O perfil foi atualizado com sucesso.
                </div>
            </div>
            <button type="button" class="-m-1 shrink-0 rounded-md p-1 opacity-70 transition-opacity hover:opacity-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-current" aria-label="Fechar">
                <i class="bi bi-x-lg text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        HTML;

    $onlyTitleCode = <<<'BLADE'
        <x-ui.alert color="danger" icon title="Sessão expirada" dismissible />
        <x-ui.alert color="success" icon title="Pagamento confirmado" dismissible />
        BLADE;

    $onlyTitleHtml = <<<'HTML'
        <div role="alert" class="border border-danger/20 border-l-4 border-l-danger bg-danger/10 text-danger flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-x-octagon-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight">Sessão expirada</p>
            </div>
            <button type="button" class="-m-1 shrink-0 rounded-md p-1 opacity-70 transition-opacity hover:opacity-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-current" aria-label="Fechar">
                <i class="bi bi-x-lg text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        <div role="alert" class="border border-success/20 border-l-4 border-l-success bg-success/10 text-success flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight">Pagamento confirmado</p>
            </div>
            <button type="button" class="-m-1 shrink-0 rounded-md p-1 opacity-70 transition-opacity hover:opacity-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-current" aria-label="Fechar">
                <i class="bi bi-x-lg text-sm leading-none" aria-hidden="true"></i>
            </button>
        </div>
        HTML;

    $listCode = <<<'BLADE'
        <x-ui.alert color="danger" icon title="Não foi possível salvar">
            <p class="mb-2">Corrija os problemas abaixo e tente novamente:</p>
            <ul class="mb-0 list-disc space-y-1 pl-4">
                <li>O e-mail informado já está em uso.</li>
                <li>A senha precisa ter pelo menos 10 caracteres.</li>
                <li>Aceite os termos de uso para continuar.</li>
            </ul>
        </x-ui.alert>
        BLADE;

    $listHtml = <<<'HTML'
        <div role="alert" class="border border-danger/20 border-l-4 border-l-danger bg-danger/10 text-danger flex items-start gap-3 rounded-md px-4 py-3 text-sm">
            <i class="bi bi-x-octagon-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
            <div class="min-w-0 flex-1">
                <p class="mb-0 font-semibold leading-tight mb-1">Não foi possível salvar</p>
                <div class="leading-relaxed text-[13px] opacity-90">
                    <p class="mb-2">Corrija os problemas abaixo e tente novamente:</p>
                    <ul class="mb-0 list-disc space-y-1 pl-4">
                        <li>O e-mail informado já está em uso.</li>
                        <li>A senha precisa ter pelo menos 10 caracteres.</li>
                        <li>Aceite os termos de uso para continuar.</li>
                    </ul>
                </div>
            </div>
        </div>
        HTML;

    $stackCode = <<<'BLADE'
        <div class="flex flex-col gap-3">
            <x-ui.alert color="success" icon title="Backup concluído" dismissible>
                O backup noturno foi gerado às 03:12.
            </x-ui.alert>
            <x-ui.alert color="warning" icon title="Uso de armazenamento" dismissible>
                Você está usando 86% do espaço disponível.
            </x-ui.alert>
            <x-ui.alert color="info" icon title="Manutenção programada" dismissible>
                Haverá uma janela curta amanhã às 02:00 UTC.
            </x-ui.alert>
        </div>
        BLADE;

    $stackHtml = <<<'HTML'
        <div class="flex flex-col gap-3">
            <div role="alert" class="border border-success/20 border-l-4 border-l-success bg-success/10 text-success flex items-start gap-3 rounded-md px-4 py-3 text-sm">
                <i class="bi bi-check-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
                <div class="min-w-0 flex-1">
                    <p class="mb-0 font-semibold leading-tight mb-1">Backup concluído</p>
                    <div class="leading-relaxed text-[13px] opacity-90">
                        O backup noturno foi gerado às 03:12.
                    </div>
                </div>
                <button type="button" class="-m-1 shrink-0 rounded-md p-1 opacity-70 transition-opacity hover:opacity-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-current" aria-label="Fechar">
                    <i class="bi bi-x-lg text-sm leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div role="alert" class="border border-warning/20 border-l-4 border-l-warning bg-warning/10 text-warning flex items-start gap-3 rounded-md px-4 py-3 text-sm">
                <i class="bi bi-exclamation-triangle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
                <div class="min-w-0 flex-1">
                    <p class="mb-0 font-semibold leading-tight mb-1">Uso de armazenamento</p>
                    <div class="leading-relaxed text-[13px] opacity-90">
                        Você está usando 86% do espaço disponível.
                    </div>
                </div>
                <button type="button" class="-m-1 shrink-0 rounded-md p-1 opacity-70 transition-opacity hover:opacity-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-current" aria-label="Fechar">
                    <i class="bi bi-x-lg text-sm leading-none" aria-hidden="true"></i>
                </button>
            </div>
            <div role="alert" class="border border-info/20 border-l-4 border-l-info bg-info/10 text-info flex items-start gap-3 rounded-md px-4 py-3 text-sm">
                <i class="bi bi-info-circle-fill mt-0.5 shrink-0 text-base leading-none" aria-hidden="true"></i>
                <div class="min-w-0 flex-1">
                    <p class="mb-0 font-semibold leading-tight mb-1">Manutenção programada</p>
                    <div class="leading-relaxed text-[13px] opacity-90">
                        Haverá uma janela curta amanhã às 02:00 UTC.
                    </div>
                </div>
                <button type="button" class="-m-1 shrink-0 rounded-md p-1 opacity-70 transition-opacity hover:opacity-100 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-current" aria-label="Fechar">
                    <i class="bi bi-x-lg text-sm leading-none" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-ui.alert&gt;</code> exibe feedback contextual com cores do tema,
            variantes <code>soft</code> (padrão, com faixa lateral), <code>solid</code> e
            <code>outline</code>, além de título, ícone, slot de ações e opção de fechar.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Cores soft" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                <code>variant="soft"</code> (padrão) — fundo suave com borda e faixa lateral na cor do token.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.alert color="primary" icon>Este é um alerta primário.</x-ui.alert>
                <x-ui.alert color="secondary" icon>Este é um alerta secundário.</x-ui.alert>
                <x-ui.alert color="success" icon>Operação realizada com sucesso.</x-ui.alert>
                <x-ui.alert color="warning" icon>Atenção, verifique os dados informados.</x-ui.alert>
                <x-ui.alert color="danger" icon>Ocorreu um erro ao processar sua solicitação.</x-ui.alert>
                <x-ui.alert color="info" icon>Nova atualização disponível.</x-ui.alert>
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Compare <code>soft</code>, <code>solid</code> e <code>outline</code> na mesma cor.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.alert color="success" variant="soft" icon title="Soft">
                    Fundo suave com faixa lateral colorida (padrão).
                </x-ui.alert>
                <x-ui.alert color="success" variant="solid" icon title="Solid">
                    Fundo cheio com texto contrastante.
                </x-ui.alert>
                <x-ui.alert color="success" variant="outline" icon title="Outline">
                    Borda colorida sobre o fundo do card.
                </x-ui.alert>
            </div>
        </x-ui.example>

        <x-ui.example title="Com título e descrição" :code="$titleCode" :html="$titleHtml">
            <x-slot:description>
                <code>title</code> é o cabeçalho; o slot padrão é a descrição.
            </x-slot:description>
            <div class="w-full">
                <x-ui.alert color="warning" icon title="Atenção">
                    Seu plano expira em 3 dias. Renove para não perder o acesso aos recursos Pro.
                </x-ui.alert>
            </div>
        </x-ui.example>

        <x-ui.example title="Cores sólidas" :code="$solidCode" :html="$solidHtml">
            <x-slot:description>
                <code>variant="solid"</code> — máximo contraste, útil para erros críticos ou confirmações fortes.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-3 sm:grid-cols-2">
                <x-ui.alert color="primary" variant="solid" icon>Alerta primário sólido.</x-ui.alert>
                <x-ui.alert color="success" variant="solid" icon>Operação concluída.</x-ui.alert>
                <x-ui.alert color="warning" variant="solid" icon>Revise os campos destacados.</x-ui.alert>
                <x-ui.alert color="danger" variant="solid" icon>Falha ao salvar as alterações.</x-ui.alert>
            </div>
        </x-ui.example>

        <x-ui.example title="Outline" :code="$outlineCode" :html="$outlineHtml">
            <x-slot:description>
                <code>variant="outline"</code> — borda colorida com fundo do card.
            </x-slot:description>
            <div class="grid w-full grid-cols-1 gap-3 sm:grid-cols-2">
                <x-ui.alert color="primary" variant="outline" icon>Alerta outline primário.</x-ui.alert>
                <x-ui.alert color="success" variant="outline" icon>Tudo certo por aqui.</x-ui.alert>
                <x-ui.alert color="warning" variant="outline" icon>Há pendências no cadastro.</x-ui.alert>
                <x-ui.alert color="danger" variant="outline" icon>Não foi possível conectar.</x-ui.alert>
            </div>
        </x-ui.example>

        <x-ui.example title="Com ícone" :code="$iconCode" :html="$iconHtml">
            <x-slot:description>
                <code>icon</code> (bool = ícone padrão da cor) ou uma classe Bootstrap Icons customizada.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.alert color="success" icon title="Sucesso">
                    Cadastro salvo com sucesso.
                </x-ui.alert>

                <x-ui.alert color="danger" icon="bi-shield-fill-exclamation" title="Falha de segurança">
                    Detectamos uma tentativa de login suspeita a partir de um novo dispositivo.
                </x-ui.alert>

                <x-ui.alert color="info" icon="bi-lightning-charge-fill" title="Dica rápida">
                    Use atalhos de teclado para navegar mais rápido no painel.
                </x-ui.alert>
            </div>
        </x-ui.example>

        <x-ui.example title="Com ações" :code="$actionsCode" :html="$actionsHtml">
            <x-slot:description>
                O slot <code>actions</code> agrupa CTAs — combine com <code>&lt;x-ui.button&gt;</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.alert color="warning" icon title="Plano prestes a expirar">
                    Renove agora e mantenha o acesso a relatórios avançados e integrações.

                    <x-slot:actions>
                        <x-ui.button color="warning" size="sm">Renovar plano</x-ui.button>
                        <x-ui.button color="warning" variant="ghost" size="sm">Lembrar depois</x-ui.button>
                    </x-slot:actions>
                </x-ui.alert>

                <x-ui.alert color="info" icon title="Convite pendente" variant="outline">
                    Você foi convidado para o workspace "Design System".

                    <x-slot:actions>
                        <x-ui.button color="info" size="sm">Aceitar</x-ui.button>
                        <x-ui.button color="secondary" variant="ghost" size="sm">Recusar</x-ui.button>
                    </x-slot:actions>
                </x-ui.alert>
            </div>
        </x-ui.example>

        <x-ui.example title="Fechável" :code="$dismissibleCode" :html="$dismissibleHtml">
            <x-slot:description>
                <code>dismissible</code> adiciona o botão fechar (Alpine, sem round-trip).
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.alert color="info" icon title="Novidade" dismissible>
                    Agora você pode exportar relatórios em PDF e CSV.
                </x-ui.alert>

                <x-ui.alert color="success" variant="solid" icon title="Alterações salvas" dismissible>
                    O perfil foi atualizado com sucesso.
                </x-ui.alert>
            </div>
        </x-ui.example>

        <x-ui.example title="Somente título" :code="$onlyTitleCode" :html="$onlyTitleHtml">
            <x-slot:description>
                Dá para usar só <code>title</code>, sem descrição no slot.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.alert color="danger" icon title="Sessão expirada" dismissible />
                <x-ui.alert color="success" icon title="Pagamento confirmado" dismissible />
            </div>
        </x-ui.example>

        <x-ui.example title="Conteúdo rico" :code="$listCode" :html="$listHtml">
            <x-slot:description>
                O slot aceita HTML — listas de erros de validação, por exemplo.
            </x-slot:description>
            <div class="w-full">
                <x-ui.alert color="danger" icon title="Não foi possível salvar">
                    <p class="mb-2">Corrija os problemas abaixo e tente novamente:</p>
                    <ul class="mb-0 list-disc space-y-1 pl-4">
                        <li>O e-mail informado já está em uso.</li>
                        <li>A senha precisa ter pelo menos 10 caracteres.</li>
                        <li>Aceite os termos de uso para continuar.</li>
                    </ul>
                </x-ui.alert>
            </div>
        </x-ui.example>

        <x-ui.example title="Pilha de alertas" :code="$stackCode" :html="$stackHtml">
            <x-slot:description>
                Empilhe vários alertas com <code>flex flex-col gap-3</code> — sem prop nova.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.alert color="success" icon title="Backup concluído" dismissible>
                    O backup noturno foi gerado às 03:12.
                </x-ui.alert>
                <x-ui.alert color="warning" icon title="Uso de armazenamento" dismissible>
                    Você está usando 86% do espaço disponível.
                </x-ui.alert>
                <x-ui.alert color="info" icon title="Manutenção programada" dismissible>
                    Haverá uma janela curta amanhã às 02:00 UTC.
                </x-ui.alert>
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="alert" />
</x-ui.docs>
