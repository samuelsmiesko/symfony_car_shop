<?php

namespace App\Controller;
use App\Entity\Cars;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

    // #[Route('/', name: 'app_car_show')]
    // public function index(): Response
    // {

        
    //         $lists = $this->em->getRepository(Cars::class)->findBy(
    //             array(),
    //             array('id' => 'ASC'),
    //             10,
    //             0
    //         );
    //     return $this->render('car_show/index.html.twig', [
    //         'lists' => $lists,
    //     ]);
        
    // }


    // #[Route('/')]
    
    //     public function ajaxAction(Request $request) {  

            
    //         if(isset($_REQUEST['get_variable'])){
    //             $limit = $_REQUEST['get_variable'];
    //         }else{
    //             $limit = 1;
    //         }

    //         $TopLimit = $limit * 5;
    //         $BottomLimit = ($limit * 5)-4;

    //         $lists = $this->em->getRepository(Cars::class)->findAll();


    //         $students = $this->em->getRepository(Cars::class)->findBy(
    //             array(),
    //             array('id' => 'ASC'),
    //             $TopLimit,
    //             $BottomLimit
    //         ); 

            

    //         if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {  
    //         $jsonData = array();  
    //         $idx = 0;  
    //         foreach($students as $student) { 
    //             $dir = $student->getimage();
    //             $files = scandir($dir);
    //             $imageToDisplay=$dir.$files[2]; 
    //             $temp = array(
    //                 'id' => $student->getId(),  
    //                 'brandname' => $student->getBrandname(),  
    //                 'model' => $student->getModelname(), 
    //                 'modelyear' => $student->getModelyear(), 
    //                 'milage' => $student->getMilage(), 
    //                 'price' => $student->getPrice(), 
    //                 'status' => $student->getStatus(),
                    
    //                 'image' => $imageToDisplay, 
    //             );   
    //             $jsonData[$idx++] = $temp;  
           
    //         } 
            
    //         return new JsonResponse($jsonData); 
    //         } else { 
    //             return $this->render('car_show/index.html.twig', [
    //                 'lists' => $lists,

    //             ]);
    //         } 
    //     }
    

    #[Route('/blog/{id}', name: 'blogPick')]
    public function gallery($id): Response
    {
        

        $posts = $this->em->getRepository(Cars::class)->findById($id);
        
        foreach($posts as $post) { 
            $dir = $post->getimage();

            $files = scandir($dir);

            //dd($files);

            $imageToDisplay=$dir.$files[2];

            //dd($imageToDisplay);
        }    
        return $this->render('car_show/display.html.twig', [
            
            'picked' => $id,
            'posts' => $posts,
            'mainImage' => $imageToDisplay
        ]);
    }


    #[Route('/', name: 'blog')]
    public function index(): Response
    {
        
        $lists = $this->em->getRepository(Cars::class)->findBy(
            array(),
            array('id' => 'ASC'),
            10,
            0
            
            
        );

        foreach($lists as $list) { 
            $dir = $list->getimage();

            $files = scandir($dir);

            //dd($files);

            $imageToDisplay=$dir.$files[2];

            //dd($imageToDisplay);
        }   
        return $this->render('car_show/index.html.twig', [
  
            'lists' => $lists,
            'images' => $imageToDisplay,

        ]);

        
    }

    #[Route('/{page}', name: 'pagePick')]
    public function pickPage($page): Response
    {
        //try{
            
            $TopLimit = $page * 5;
            $BottomLimit = ($page * 5)-4;

            $lists = $this->em->getRepository(Cars::class)->findBy(
                array(),
                array('id' => 'ASC'),
                $TopLimit,
                $BottomLimit
            );
            
  
            return $this->render('car_show/index.html.twig', [
                
                'lists' => $lists,
                
  
            ]);
        // }catch(\Exception $e){
            
        //     return $this->render('blog/404.html.twig', [
        //     ]);
        
        // }    
        
    }
}
