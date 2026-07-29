<?php

declare(strict_types = 1);

namespace App\Enums;

enum MenuType: string
{
    case ITEM      = 'item';
    case DROP      = 'drop';
    case DROP_ITEM = 'drop-item';
    case SEPARATOR = 'separator';
    case HIDDEN    = 'hidden';

    public function label(): string
    {
        return match ($this) {
            self::ITEM      => 'Ítem',
            self::DROP      => 'Menu',
            self::DROP_ITEM => 'Submenu',
            self::SEPARATOR => 'Separador',
            self::HIDDEN    => 'Oculto',
        };
    }
}
