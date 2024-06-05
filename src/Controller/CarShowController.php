<?php

namespace App\Controller;
use App\Entity\Cars;
use App\Entity\DisplayPhotos;
use App\Entity\NewNumbers;
use App\Form\SearchFilterType;
use App\Repository\CarsRepository;
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

    

    #[Route('/search', name: 'liveSearch')]
    
    public function ajaxAction(Request $request, CarsRepository $CarsRepository): Response 
    {  

        $nextPage =  1;

        $lastPage = 1;

        $searchTerm = $request->query->get('q');

        if($searchTerm){
            $posts = $CarsRepository->search($searchTerm);
        }else{
            $posts = $CarsRepository->findAllOrdered();
        }

        foreach($posts as $post) { 
            $dir = $post->getimage();

            $files = scandir($dir);

            $imageToDisplay=$dir.$files[2];

            $post->setimage($imageToDisplay);
 
        } 
       
        return $this->render('car_show/index.html.twig', [
                
            'posts' => $posts,
            'nextPage' => $nextPage,
            'lastPage' => $lastPage

        ]);
    
    }
   
    #[Route("/ajaxSave")]
    public function ajaxSearch(Request $request) 
    {
    
        $ExistingNumbers = $this->em->getRepository(NewNumbers::class)->findAll();

        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {  

            $qID = $_REQUEST['get_variable'];

            $idx = 0;  
            foreach($ExistingNumbers as $ExistingNumber) { 
                    
                $temp = array(
                    'id' => $ExistingNumber->getId(),  
                    
                );   
                $jsonData[$idx++] = $temp;  

            } 
            $NewBlogNumber = new NewNumbers($qID);

            $NewBlogNumber->setBlogNumber($qID);

            $this->em->persist($NewBlogNumber);
    
            $this->em->flush();
            
            return new JsonResponse($jsonData); 
        }            
    }


    #[Route('/blog/{id}', name: 'blogPick')]
    public function gallery($id): Response
    {
        
        $lists = $this->em->getRepository(Cars::class)->findById($id);
        
        foreach($lists as $list) { 
            
            $dir = $list->getimage();

            $EmptyDir = $dir;

            $files = scandir($dir);

            $imageToDisplay=$dir.$files[2];

            $list->setimage($imageToDisplay);
        
        };   

        $files = scandir($dir);

        $outputs = array_slice($files, 2); 
        
        $listOfItems = array();

        for($i=0;$i<count($outputs);$i++)
          
            {
                $dir = $list->getimage();

                $listOfItems[$i] = new DisplayPhotos($outputs[$i]);

                $listOfItems[$i]->setimage($EmptyDir . $outputs[$i]);
            }
     
        return $this->render('car_show/display.html.twig', [
            
            'picked' => $id,
            'posts' => $lists,
            'listOfItems' => $listOfItems,
            'savedId' => $id,
        ]);
    }

    #[Route('/destroy', name: 'deleteSearchTerm')]
    public function deleteSearchTerm() 
    {
        session_start();

        session_destroy();

        return $this->redirectToRoute('pagePick', array(
            'page' => 1,
        ));
    }

    // #[Route('/{page}', name: 'pagePick')]
    // public function pickPage(Request $request, CarsRepository $CarsRepository, $page): Response
    // {
    //     //dd("Registering");
    //     // if(is_string($page)){
    //     //     $page = 1;
    //     // }
        
    //     $nextPage = $page + 1;

    //     $lastPage = $page - 1;

    //     $searchTerm = $request->query->get('q');

    //     $TopLimit = $page * 5;
        
    //     $BottomLimit = ($page * 5)-4;
       
    //     if($searchTerm){

    //         //session_start();

    //         $_SESSION['searchTerm'] = $searchTerm ;
                     
    //         $buttonTextSearchTerm = $searchTerm ;

    //         $TopLimit = 10;

    //         $buttonTextSearchTerm = $searchTerm;

    //         $posts = $CarsRepository->search($searchTerm);

    //         $count = $BottomLimit;

    //         $array = array();

    //         while ($count < $TopLimit ){
   
    //             array_push($array, $posts[$count]);

    //             $count += 1;

    //         }

    //         $posts = $array;

    //     }else{
            
    //         //session_start();

    //         if(isset($_SESSION['searchTerm'])){

    //             $searchTerm = $_SESSION['searchTerm'];

    //             $buttonTextSearchTerm = $searchTerm ;

    //             $posts = $CarsRepository->search($searchTerm);

    //             $count = $BottomLimit;

    //             $array = array();

    //             while ($count < $TopLimit ){
    
    //                 array_push($array, $posts[$count]);

    //                 $count += 1;

    //             }

    //             $posts = $array;

    //         }else{


    //             $buttonTextSearchTerm = '';

    //             $posts = $this->em->getRepository(Cars::class)->findBy(
    //                 array(),
    //                 array('id' => 'ASC'),
    //                 $TopLimit,
    //                 $BottomLimit
    //             );

    //         }

    //     }

    //     foreach($posts as $post) { 
    //         $dir = $post->getimage();

    //         $files = scandir($dir);

    //         $imageToDisplay=$dir.$files[2];

    //         $post->setimage($imageToDisplay);
        
    //     } 

    //     $task = new Cars();

    //     $form = $this->createForm(SearchFilterType::class, $task);

    //     $form->handleRequest($request);
        
    //     return $this->render('car_show/index.html.twig', [
            
    //         'posts' => $posts,
    //         'nextPage' => $nextPage,
    //         'lastPage' => $lastPage,
    //         'buttonTextSearchTerm' => $buttonTextSearchTerm,
    //         'form' => $form    
    //     ]);

    //     $page = NULL;   

    //     $request = NULL;  
    // }
    

    #[Route('/', name: 'blog')]
    public function index(): Response
    {   

        $posts = $this->em->getRepository(Cars::class)->findAll();

        $lenght = (count($posts));

        return $this->render('car_show/blog.html.twig', [
            'posts' => $posts,
            'lenght' => $lenght
       ]);

    
    }


    

    

}