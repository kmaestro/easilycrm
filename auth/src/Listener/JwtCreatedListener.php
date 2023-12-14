<?php

namespace App\Listener;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JwtCreatedListener
{
    public function __invoke(JWTCreatedEvent $event): void
    {
        /** @var User $user */
        $user = $event->getUser();
        $payload = $event->getData();
        $payload['id'] = $user->getId();
        $payload['email'] = $user->getUsername();
        unset($payload['username']);

        $event->setData($payload);
    }
}
