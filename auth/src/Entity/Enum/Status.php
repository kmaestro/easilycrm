<?php

namespace App\Entity\Enum;

enum Status: string
{
    case WAIT = 'wait';
    case ACTIVE = 'active';
}
