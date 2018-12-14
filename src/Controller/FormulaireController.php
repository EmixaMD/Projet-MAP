<?php

namespace App\Controller;

use App\Entity\Formulaire;
use App\Entity\Visiteur;
use App\Form\VisiteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/formulaire")
 */
class FormulaireController extends AbstractController
{
    /**
     * @Route("/", name="formulaire_index", methods="GET")
     */
    public function formulaire(Request $request) : Response
    {
        $visiteurfront = new Visiteur();
        $visiteurfront->setHeureArrivee(new \DateTime('now'));
        $form = $this->createForm(VisiteurType::class, $visiteurfront);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($visiteurfront);
            $em->flush();
            
            return $this->redirectToRoute('giveid', ['id'=> $visiteurfront->getId()]);
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

        return $this->render('formulaire.html.twig', [
            'visiteur' => $visiteurfront,
            'form' => $form->createView(),
        ]);
    }
}