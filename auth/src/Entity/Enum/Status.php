<?php

declare(strict_types=1);

namespace App\Entity\Enum;

enum Status: string
{
    case WAIT = 'wait';
    case ACTIVE = 'active';
}
