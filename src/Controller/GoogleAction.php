<?php


namespace App\Controller;


use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Entity\Image;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class GoogleAction
{
    /**
     * @var ValidatorInterface
     */
    private $validator;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var JWTTokenManagerInterface
     */
    private $tokenManager;

    public function __construct(
        ValidatorInterface $validator,
        UserPasswordEncoderInterface $userPasswordEncoder,
        EntityManagerInterface $entityManager,
        JWTTokenManagerInterface $tokenManager
    )
    {
        $this->validator = $validator;
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->entityManager = $entityManager;
        $this->tokenManager = $tokenManager;
    }

    public function __invoke(Request $request)
    {
        $data = ((array) json_decode($request->getContent()));
        $user = $this->entityManager->getRepository("App\Entity\User")->findOneBy(["googleId" => $data["googleId"]]);

        if($user == null){
            $image = new Image();
            $image->setUrl($data["image"]);
            $this->entityManager->persist($image);
            $this->entityManager->flush();
            $user = new User();
            $user->setUsername($data["username"]);
            $user->setEmail($data["email"]);
            $user->setImage($image);
            $user->setPassword(
                $this->userPasswordEncoder->encodePassword(
                    $user, "Tekoop$84"
                )
            );
            $user->setGoogleId($data["googleId"]);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        $token = $this->tokenManager->create($user);

        return new JsonResponse([
            'token' => $token,
            'user' => $user->toMap()
        ]);

        // Validator is only called after we return the data from this action!
        // Only hear it checks for user current password, but we've just modified it!

        // Entity is persisted automatically, only if validation pass
    }
}