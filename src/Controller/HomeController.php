<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Psr\Log\LoggerInterface;
use App\Controller\GreetingGenerator;

/*Abstract 2019 - Análisis y Desarrollo de Sistemas Informáticos versión 1.0
 Autor: Iván Velasco*/

class HomeController extends AbstractController
{
    public function home()
    {        
        return $this->render('inicio/home.html.twig', [
            'fecha' => "ABC",
        ]);
    }    

    /**
    * @Route("/api/saludo/{name}")
    */
    public function apiExample($name)
    {
        return $this->json([
        'name' => $name,
        'symfony' => 'rocks',
        ]);
    }    

    /**
    * @Route("/hola/{nombre}")
    */
    public function holaRegistro($nombre, LoggerInterface $logger,GreetingGenerator $generator)
    {
        $greeting = $generator->getRandomGreeting();
        $logger->info("Saying hello to $nombre!");
        return new Response('Hola :)'.$greeting);
    }    
}
?>