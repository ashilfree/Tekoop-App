<?php

namespace App\Controller;

use App\Security\UserConfirmationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default_index")
     */
    public function index()
    {
        phpinfo();
        return $this->render(
            'base.html.twig'
        );
    }

	/**
	 * @Route("/confirm-user/{token}", name="default_confirm_token")
	 * @param string $token
	 * @param UserConfirmationService $userConfirmationService
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
    public function confirmUser(
        string $token,
        UserConfirmationService $userConfirmationService
    ) {
        $userConfirmationService->confirmUser($token);

        return $this->redirectToRoute('default_index');
    }
}
