<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MultiRouteController extends AbstractController
{
    
    #[Route("/route1", name:"route1")]
     
    public function route1(): Response
    {
        return new Response('<html><body><h1>Page Route 1</h1></body></html>');
    }

    
    #[Route("/route2", name:"route2")]
    
    public function route2(): Response
    {
        return new Response('<html><body><h1>Page Route 2</h1></body></html>');
    }

}
