<?php

namespace App\Events;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Recipe;
use App\Entity\Users;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class RecipeOwnerSubscriber implements EventSubscriberInterface
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['addOwner', EventPriorities::PRE_WRITE],
        ];
    }

    public function addOwner(ViewEvent $event)
    {
        $recipe = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$recipe instanceof Recipe || Request::METHOD_POST !== $method) {
            return;
        }

        $user = $this->getUser();

        if (!$user) {
            throw new AccessDeniedException();
        }

        $recipe->setOwner($user);

    }

    private function getUser(): ?Users
    {
        if (!$token = $this->tokenStorage->getToken()) {
            return null;
        }

        $user = $token->getUser();

        if (!$user instanceof Users) {
            return null;
        }

        return $user;
    }

}
