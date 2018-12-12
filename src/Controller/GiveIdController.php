<?php

namespace App\Controller;


use App\Entity\Visiteur;
use App\Entity\GiveId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/giveid" )
 */
class GiveIdController extends AbstractController
{
    /**
     * @Route("/{id}", name="giveid", methods="GET")
     */
    public function index(Visiteur $visiteur): Response
    {
        return $this->render('giveid.html.twig', ['visiteur' => $visiteur]);
    }
}