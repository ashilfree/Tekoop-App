<?php


namespace App\EventListener;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\HttpFoundation\JsonResponse;


class AuthenticationSuccessListener
{

	public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
	{
		/**
		 * @var $data array
		 */
		$data = $event->getData();
		/**
		 * @var $user User
		 */
		$user = $event->getUser();
		$data['user'] = $user->toMap();
		$event->setData($data);
	}

}