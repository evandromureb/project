<?php

declare(strict_types=1);

namespace App\Enums;

enum StatusEnum: string
{
    case Active = 'active';
    case Pending = 'pending';
    case Banned = 'banned';
    case Suspended = 'suspended';
}
