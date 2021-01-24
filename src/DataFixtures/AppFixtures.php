<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

	/**
	 * @var UserPasswordEncoderInterface
	 */
	private $encoder;


	public function __construct(UserPasswordEncoderInterface $encoder)
	{
		$this->encoder = $encoder;
	}

    public function load(ObjectManager $manager)
    {
//	    $user = new User();
//	    $user->setEmail('ashilfree@gmail.com');
//	    $user->setUsername('admin');
//	    $user->setPassword($this->encoder->encodePassword($user, 'tekoop'));
//	    $user->setRoles(['ROLE_ADMIN']);
//	    $user->setIsActive(true);
//	    $user->setIsEmailConfirmed(true);
//	    $post = new Post();
	    $user = $manager->getRepository(User::class)->find(11);
	    $user->setPassword($this->encoder->encodePassword($user, 'tekoop'));
	    $manager->flush();
    }
}
