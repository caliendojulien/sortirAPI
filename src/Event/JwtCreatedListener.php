<?php

namespace App\Event;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;

class JwtCreatedListener
{
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $data = $event->getData();
        $utilisateur = $event->getUser();
        $data['id'] = $utilisateur->getId();
        $data['nom'] = $utilisateur->getNom();
        $data['prenom'] = $utilisateur->getPrenom();
        $event->setData($data);
    }
}