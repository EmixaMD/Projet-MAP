<?php

namespace App\Controller;

use App\Entity\GiveId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/giveid")
 */
class GiveIdController extends AbstractController
{
    /**
     * @Route("/", name="giveid_index", methods="GET")
     */
    public function index(): Response
    {
        return $this->render('giveid.html.twig');
    }
}