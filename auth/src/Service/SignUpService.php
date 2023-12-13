<?php

namespace App\Service;

use App\Entity\User;
use App\Exception\UserAlreadyExistsException;
use App\Repository\UserRepository;
use App\Request\SignUpRequest;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Uid\Uuid;

class SignUpService
{
    public function __construct(
        private readonly UserPasswordHasherInterface $hasher,
        private readonly UserRepository $userRepository)
    {
    }

    public function signUp(SignUpRequest $signUpRequest)
    {
        if ($this->userRepository->existsByEmail($signUpRequest->email)) {
            throw new UserAlreadyExistsException();
        }

        $user = User::requestJoinByEmail(Uuid::v7(), new \DateTimeImmutable(), $signUpRequest->email, '');

        $user->setPassword($this->hasher->hashPassword($user, $signUpRequest->password));

        $this->userRepository->saveAndCommit($user);
    }
}
