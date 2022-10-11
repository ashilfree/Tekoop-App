<?php

namespace App\EventListener;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Security\Core\User\UserInterface;

class ResponseInterceptorListener
{
    /**
     * @var JWTTokenManagerInterface
     */
    private $tokenManager;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
        JWTTokenManagerInterface $tokenManager
    )
    {
        $this->tokenManager = $tokenManager;
        $this->entityManager = $entityManager;
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        // You can do more check here such as:
        // Is it master request?
        // Is it a specific controller?
        // Is it a authenticated user?
        // So on.
        if($event->getRequest()->attributes->get("_route") == "api_users_post_collection") {
            $data = json_decode($event->getResponse()->getContent(), true);
            /** @var User $user */
            $user = $this->entityManager->getRepository("App\Entity\User")->find($data["id"]);
            $token = $this->tokenManager->create($user);
            $event->getResponse()->setContent(json_encode([
                "token" => $token,
                "user" => $user->toMap()
            ]));
        }
    }
}