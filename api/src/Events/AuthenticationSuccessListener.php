<?php


namespace App\Events;

use App\Entity\Users;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;


class AuthenticationSuccessListener
{
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();
        if (!$user instanceof Users) {
            return;
        }

        $data['id'] = $user->getId();
        $data['username'] = $user->getName();
        $data['email'] = $user->getEmail();

        $event->setData($data);
    }
}
