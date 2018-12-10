<?php

namespace App\Controller;

use App\Controller\DefaultController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        return $this->render('index.html.twig');
    }
}