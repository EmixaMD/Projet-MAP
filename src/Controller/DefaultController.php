<?php

namespace App\Controller;

use App\Controller\DefaultController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/change-locale/{locale}", name="change_locale")
     */
    public function changeLocale(Request $request, SessionInterface $session, $locale)
    {
        if (in_array($locale, ["fr", "en"])) {
            $this->get('session')->set('_locale', $locale);
        }

        $url = $request->headers->get('referer');
        if(empty($url))
        {
            $url = $this->container->get('router')->generate('index');
        }

        return $this->redirect($url);
    }


}