<?php


namespace App\Controller;


use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Email\Mailer;
use App\Entity\Image;
use App\Entity\User;
use App\Security\TokenGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ForgetPasswordAction
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var TokenGenerator
     */
    private $tokenGenerator;
    /**
     * @var Mailer
     */
    private $mailer;
    /**
     * @var \Swift_Mailer
     */
    private $swift_Mailer;


    public function __construct(
        UserPasswordEncoderInterface $userPasswordEncoder,
        EntityManagerInterface $entityManager,
        TokenGenerator $tokenGenerator,
        Mailer $mailer,
        \Swift_Mailer $swift_Mailer
    )
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->entityManager = $entityManager;
        $this->tokenGenerator = $tokenGenerator;
        $this->mailer = $mailer;
        $this->swift_Mailer = $swift_Mailer;
    }

    public function __invoke(Request $request)
    {
        $data = ((array) json_decode($request->getContent()));

        $user = $this->entityManager->getRepository("App\Entity\User")->findOneBy(["email" => $data["email"]]);
        if($user != null){
            $token = $this->tokenGenerator->getRandomPassword();
            $user->setPassword(
                $this->userPasswordEncoder->encodePassword(
                    $user, $token
                )
            );
            $this->entityManager->flush();
            $this->mailer->sendForgetPasswordEmail($user, $token);
            return new JsonResponse([
                'message' => 'an email was send to your Email address! Check PLZ the new Password'
            ]);
        }else{
            return new JsonResponse([
                'message' => 'Email not found!'
            ]);
        }
        // Validator is only called after we return the data from this action!
        // Only hear it checks for user current password, but we've just modified it!

        // Entity is persisted automatically, only if validation pass
    }
}