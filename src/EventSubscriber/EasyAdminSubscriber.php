<?php


namespace App\EventSubscriber;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $appKernel;
	/**
	 * @var CrudUrlGenerator
	 */
	private $crudUrlGenerator;
	/**
	 * @var UserPasswordEncoderInterface
	 */
	private $encoder;

	/**
	 * EasyAdminSubscriber constructor.
	 * @param KernelInterface $appKernel
	 * @param CrudUrlGenerator $crudUrlGenerator
	 * @param UserPasswordEncoderInterface $encoder
	 */
    public function __construct(KernelInterface $appKernel, CrudUrlGenerator $crudUrlGenerator, UserPasswordEncoderInterface $encoder)
    {
        $this->appKernel = $appKernel;
	    $this->crudUrlGenerator = $crudUrlGenerator;
	    $this->encoder = $encoder;
    }

    public static function getSubscribedEvents()
    {
        return [
	        BeforeEntityPersistedEvent::class => ['setImage'],
        ];
    }


    public function setImage(BeforeEntityPersistedEvent $event)
    {
	    $entity = $event->getEntityInstance();
    	if($entity instanceof User){
    		$entity->setPassword($this->encoder->encodePassword($entity, $entity->getPassword()));
	    }
    }


}