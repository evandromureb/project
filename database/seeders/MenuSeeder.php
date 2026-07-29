<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'group' => 'sidebar',
                'parent_key' => null,
                'sort' => 0,
                'type' => 'item',
                'key' => 'dashboarditem',
                'label' => 'Dashboard',
                'icon' => 'bi-house',
                'route' => 'dashboard',
                'url' => null,
                'permission' => null,
                'guard' => null,
                'title' => 'Início',
                'description' => 'Visão geral do design system e atalhos para a documentação',
                'visible' => true,
                'enabled' => true,
                'meta' => null,
            ],
            [
                'group' => 'sidebar',
                'parent_key' => null,
                'sort' => 1,
                'type' => 'separator',
                'key' => 'configuracoesseparator',
                'label' => 'Configurações',
                'icon' => null,
                'route' => null,
                'url' => null,
                'permission' => null,
                'guard' => null,
                'title' => null,
                'description' => null,
                'visible' => true,
                'enabled' => true,
                'meta' => null,
            ],
            [
                'group' => 'sidebar',
                'parent_key' => null,
                'sort' => 2,
                'type' => 'drop',
                'key' => 'configuracoes-do-sistemadrop',
                'label' => 'Configurações do sistema',
                'icon' => 'bi-wrench',
                'route' => null,
                'url' => null,
                'permission' => null,
                'guard' => null,
                'title' => ' Configurações do sistema',
                'description' => null,
                'visible' => true,
                'enabled' => true,
                'meta' => null,
            ],
            [
                'group' => 'sidebar',
                'parent_key' => 'configuracoes-do-sistemadrop',
                'sort' => 0,
                'type' => 'drop-item',
                'key' => 'editar-menudrop-item',
                'label' => 'Editar menu',
                'icon' => null,
                'route' => 'settings.sidebar',
                'url' => null,
                'permission' => null,
                'guard' => null,
                'title' => 'Editar menu do sistema',
                'description' => "Edite o menu do sistema para adicionar, remover ou reordenar itens.\n\n",
                'visible' => false,
                'enabled' => true,
                'meta' => null,
            ],
            [
                'group' => 'sidebar',
                'parent_key' => null,
                'sort' => 3,
                'type' => 'hidden',
                'key' => 'loginhidden',
                'label' => 'Login',
                'icon' => 'bi',
                'route' => 'login',
                'url' => null,
                'permission' => null,
                'guard' => null,
                'title' => 'Bem-vindo de volta!',
                'description' => 'Faça login para continuar.',
                'visible' => true,
                'enabled' => true,
                'meta' => null,
            ],
            [
                'group' => 'sidebar',
                'parent_key' => null,
                'sort' => 4,
                'type' => 'hidden',
                'key' => 'cadastrohidden',
                'label' => 'Cadastro',
                'icon' => 'bi',
                'route' => 'register',
                'url' => null,
                'permission' => null,
                'guard' => null,
                'title' => 'Crie sua conta',
                'description' => 'Preencha os dados abaixo para começar.',
                'visible' => true,
                'enabled' => true,
                'meta' => null,
            ],
            [
                'group' => 'sidebar',
                'parent_key' => null,
                'sort' => 5,
                'type' => 'hidden',
                'key' => 'recuperar-senhahidden',
                'label' => 'Recuperar senha',
                'icon' => 'bi',
                'route' => 'password.request',
                'url' => null,
                'permission' => null,
                'guard' => null,
                'title' => 'Esqueceu sua senha?',
                'description' => "Informe seu e-mail e enviaremos um link para redefinir a senha.\n\n",
                'visible' => true,
                'enabled' => true,
                'meta' => null,
            ],
            [
                'group' => 'sidebar',
                'parent_key' => null,
                'sort' => 6,
                'type' => 'hidden',
                'key' => 'verificar-e-mailhidden',
                'label' => 'Verificar e-mail',
                'icon' => 'bi',
                'route' => 'verification.notice',
                'url' => null,
                'permission' => null,
                'guard' => null,
                'title' => 'Verifique seu e-mail',
                'description' => "Enviamos um link de verificação para o seu endereço de e-mail.\n\n",
                'visible' => true,
                'enabled' => true,
                'meta' => null,
            ],
        ];

        $byKey = [];

        foreach ($menus as $attributes) {
            if ($attributes['parent_key'] !== null) {
                continue;
            }

            $byKey[$attributes['key']] = $this->upsertMenu($attributes, null);
        }

        foreach ($menus as $attributes) {
            if ($attributes['parent_key'] === null) {
                continue;
            }

            $parent = $byKey[$attributes['parent_key']] ?? Menu::query()->where('key', $attributes['parent_key'])->first();

            $byKey[$attributes['key']] = $this->upsertMenu($attributes, $parent?->id);
        }
    }

    /**
     * @param  array{
     *     group: string,
     *     parent_key: string|null,
     *     sort: int,
     *     type: string,
     *     key: string,
     *     label: string|null,
     *     icon: string|null,
     *     route: string|null,
     *     url: string|null,
     *     permission: string|null,
     *     guard: string|null,
     *     title: string|null,
     *     description: string|null,
     *     visible: bool,
     *     enabled: bool,
     *     meta: array<string, mixed>|null
     * }  $attributes
     */
    private function upsertMenu(array $attributes, ?int $parentId): Menu
    {
        unset($attributes['parent_key']);

        return Menu::query()->updateOrCreate(
            ['key' => $attributes['key']],
            [
                ...$attributes,
                'parent_id' => $parentId,
            ],
        );
    }
}
