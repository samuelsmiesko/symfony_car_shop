<?php

namespace App\Controller;
use App\Entity\Cars;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
class CarShowController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route('/', name: 'app_car_show')]
    public function index(): Response
    {

        
            $lists = $this->em->getRepository(Cars::class)->findBy(
                array(),
                array('id' => 'DESC'),
                40,
                0
            );
        return $this->render('car_show/index.html.twig', [
            'lists' => $lists,
        ]);
        
    }
}
