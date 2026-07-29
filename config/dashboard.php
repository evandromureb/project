<?php

declare(strict_types = 1);

return [
    'sidebar' => [
        [
            'type'        => 'item',
            'icon'        => 'bi-house',
            'route'       => 'dashboard',
            'position'    => 'top',
            'label'       => 'Início',
            'title'       => 'Início',
            'description' => 'Visão geral do design system e atalhos para a documentação.',
        ],
        [
            'type' => 'separator',
            'text' => 'Configurações do sistema',
        ],
        [
            'type'  => 'drop',
            'icon'  => 'bi-wrench',
            'label' => 'Settings',
            'items' => [
                [
                    'type'        => 'drop-item',
                    'route'       => 'settings.sidebar',
					'label'       => 'Editar menu',
					'title'       => 'Editar menu do sistema',
					'description' => 'Edite o menu do sistema para adicionar, remover ou reordenar itens.',
                ],
                [
                    'type'        => 'drop-item',
                    'label'       => 'Tipografia',
                    'route'       => 'app2',
                    'title'       => 'Tipografia',
                    'description' => 'Escala tipográfica, pesos, títulos, corpo e código.',
                ]
            ],
        ],
        [
            'type' => 'separator',
            'text' => 'Componentes',
        ],

    ],

    'auth' => [
        [
            'type'        => 'hidden',
            'route'       => 'login',
            'title'       => 'Entrar',
            'description' => 'Acesse sua conta com e-mail e senha.',
        ],
        [
            'type'        => 'hidden',
            'route'       => 'register',
            'title'       => 'Criar conta',
            'description' => 'Cadastre-se para começar a usar o sistema.',
        ],
        [
            'type'        => 'hidden',
            'route'       => 'password.request',
            'title'       => 'Esqueceu a senha?',
            'description' => 'Informe seu e-mail para receber o link de redefinição.',
        ],
        [
            'type'        => 'hidden',
            'route'       => 'password.reset',
            'title'       => 'Redefinir senha',
            'description' => 'Defina uma nova senha para a sua conta.',
        ],
        [
            'type'        => 'hidden',
            'route'       => 'profile',
            'title'       => 'Perfil',
            'description' => 'Atualize seus dados pessoais e a senha.',
        ],
    ],
];
