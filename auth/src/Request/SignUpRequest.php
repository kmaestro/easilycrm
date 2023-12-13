<?php

declare(strict_types=1);

namespace App\Request;

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SignUpRequest
{
    #[Email]
    #[NotBlank]
    public string $email;

    #[NotBlank]
    #[Length(min: 8)]
    public string $password;
}