<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarShowController extends AbstractController
{
    #[Route('/', name: 'app_car_show')]
    public function index(): Response
    {
        return $this->render('car_show/index.html.twig', [
            'controller_name' => 'CarShowController',
        ]);
    }
}
