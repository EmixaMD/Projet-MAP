<?php

namespace App\Controller;

use App\Entity\Home;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/home")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_index", methods="GET")
     */
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }
}