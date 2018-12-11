<?php

namespace App\Controller\Admin;

use App\Entity\Visiteur;
use App\Entity\Visite;
use App\Form\VisiteurType;
use App\Repository\VisiteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/visiteur")
 */
class VisiteurController extends AbstractController
{
    /**
     * @Route("/", name="admin_visiteur_index", methods="GET")
     */
    public function index(VisiteurRepository $visiteurRepository) : Response
    {
        $visitors = $visiteurRepository->findAll();
        return $this->render('admin/visiteur/index.html.twig', [
            'visiteurs' => $visitors,
        ]);
    }

    /**
     * @Route("/new", name="admin_visiteur_new", methods="GET|POST")
     */
    public function new(Request $request) : Response
    {
        $visiteur = new Visiteur();
        $form = $this->createForm(VisiteurType::class, $visiteur);
        $form->handleRequest($request);
        echo "<pre>";
        var_dump($request);
        echo "</pre>";

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($visiteur);
            $em->flush();

            return $this->redirectToRoute('admin_visiteur_index');
        }

        return $this->render('admin/visiteur/new.html.twig', [
            'visiteur' => $visiteur,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/newfront", name="visiteurfront_new", methods="GET|POST")
     */
    public function newfront(Request $request) : Response
    {
        $visiteurfront = new Visiteur();
        $visiteurfront->setHeureArrivee(new \DateTime('now'));
        $form = $this->createForm(VisiteurType::class, $visiteurfront);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($visiteurfront);
            $em->flush();
            
           
            // return $this->redirectToRoute('admin_visiteur_index');
        }
        if (isset($GLOBALS["HTTP_RAW_POST_DATA"])) {
            // Get the data
            $imageData = $GLOBALS['HTTP_RAW_POST_DATA'];
 
            // Remove the headers (data:,) part.
            // A real application should use them according to needs such as to check image type
            $filteredData = substr($imageData, strpos($imageData, ",") + 1);
 
            // Need to decode before saving since the data we received is already base64 encoded
            $unencodedData = base64_decode($filteredData);
 
            echo "unencodedData".$unencodedData;
 
            // Save file. This example uses a hard coded filename for testing,
            // but a real application can specify filename in POST variable
            $fp = fopen('test.png', 'wb');
            fwrite($fp, $unencodedData);
            fclose($fp);
        }

        return $this->render('admin/visiteur/newfront.html.twig', [
            'visiteur' => $visiteurfront,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_visiteur_show", methods="GET")
     */
    public function show(Visiteur $visiteur) : Response
    {
        return $this->render('admin/visiteur/show.html.twig', ['visiteur' => $visiteur]);
    }

    /**
     * @Route("/{id}/edit", name="admin_visiteur_edit", methods="GET|POST")
     */
    public function edit(Request $request, Visiteur $visiteur) : Response
    {
        $form = $this->createForm(VisiteurType::class, $visiteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_visiteur_index', ['id' => $visiteur->getId()]);
        }

        return $this->render('admin/visiteur/edit.html.twig', [
            'visiteur' => $visiteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_visiteur_delete", methods="DELETE")
     */
    public function delete(Request $request, Visiteur $visiteur) : Response
    {
        if ($this->isCsrfTokenValid('delete' . $visiteur->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($visiteur);
            $em->flush();
        }

        return $this->redirectToRoute('admin_visiteur_index');
    }
}