<?php

namespace App\Enums;

enum MenuType: string
{
    case ITEM = 'item';
    case DROP = 'drop';
    case DROP_ITEM = 'drop-item';
    case SEPARATOR = 'separator';
    case HIDDEN = 'hidden';
}
