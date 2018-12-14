<?php

namespace App\Controller;

use App\Entity\Securite;
use App\Entity\Visiteur;
use App\Form\VisiteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/securite")
 */
class SecuriteController extends AbstractController
{
    /**
     * @Route("/", name="securite_index", methods="GET")
     */
    public function index(): Response
    {

        
        // return $this->redirectToRoute('formulaire_index');
        
        
        return $this->render('securite.html.twig');
    }
    
}