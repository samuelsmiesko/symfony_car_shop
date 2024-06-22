<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted(attribute:"IS_AUTHENTICATED_FULLY");
        /** @var User $user */
        
        $user = $this->getUser();

        return match($user->isVerified()){
            true =>$this->render(view:"admin/index.html.twig"),
            false =>$this->render(view:"admin/verify-email.html.twig"),
        };

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
