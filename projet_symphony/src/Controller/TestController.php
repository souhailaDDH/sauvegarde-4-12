<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/route1", name="route1")
     */
    public function route1(): Response
    {
        return new Response('<html><body><h1>Page Route 1</h1></body></html>');
    }

    /**
     * @Route("/route2", name="route2")
     */
    public function route2(): Response
    {
        return new Response('<html><body><h1>Page Route 2</h1></body></html>');
    }

    /**
     * @Route("/route3", name="route3")
     */
    public function route3(): Response
    {
        return new Response('<html><body><h1>Page Route 3</h1></body></html>');
    }

    /**
     * @Route("/route4/{param}", name="route4")
     */
    public function route4($param): Response
    {
        return new Response('<html><body><h1>Page Route 4 avec paramètre: ' . $param . '</h1></body></html>');
    }
}
