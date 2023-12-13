<?php

declare(strict_types=1);

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Request\SignUpRequest;
use App\Service\SignUpService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class SignUpController extends AbstractController
{
    public function __construct(
        private SignUpService $service
    )
    {
    }

    #[Route('/signup')]
    public function signUp(#[RequestBody] SignUpRequest $request)
    {
//        dd($request);

        $this->service->signUp($request);

        return new JsonResponse([]);
    }
}