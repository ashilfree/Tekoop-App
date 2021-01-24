<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\OwnerEntityInterface;
use App\Entity\User;
use App\Repository\AddressRepository;
use App\Repository\CategoryRepository;
use App\Repository\PhoneRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class OwnerEntitySubscriber implements EventSubscriberInterface
{

	/**
	 * @var TokenStorageInterface
	 */
	private $tokenStorage;
	/**
	 * @var CategoryRepository
	 */
	private $categoryRepository;
	/**
	 * @var AddressRepository
	 */
	private $addressRepository;
	/**
	 * @var PhoneRepository
	 */
	private $phoneRepository;

	public function __construct(
		TokenStorageInterface $tokenStorage
	)
	{
		$this->tokenStorage = $tokenStorage;
	}

	public static function getSubscribedEvents()
	{
		return [
			KernelEvents::VIEW => [
				'getAuthenticatedOwner',
				EventPriorities::PRE_WRITE
			]
		];
	}

	public function getAuthenticatedOwner(ViewEvent $event)
	{
		$entity = $event->getControllerResult();
		$method = $event->getRequest()->getMethod();
		/** @var User $owner */
		$owner = $this->tokenStorage->getToken()->getUser();


		if (!$entity instanceof OwnerEntityInterface || Request::METHOD_POST !== $method) {
			return;
		}
		$entity->setOwner($owner);
	}
}