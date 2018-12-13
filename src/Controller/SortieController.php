<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VisiteurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

/**
 * @Route("/sortie") 
 * @ORM\Entity(repositoryClass="App\Repository\VisiteurRepository")
 */
class SortieController extends AbstractController
{
    /**
     * @Route("/", name="sortie_index", methods="GET|POST")
     */
    public function index(Request $request): Response
    {   
        
        $form = $this->createFormBuilder()
            ->add('idUnique', TextType::class)
            ->setAction($this->generateUrl('sortie_index'))
            ->getForm();

            // $request = $this->get('request');
            // if ($request->getMethod() == 'POST') {
            //     $formAlias->handleRequest($request);
             
            //     if ($formAlias->isValid()) {
            //         $data = $formAlias->getData();
            //         $libelle = $data["libelle"];
             
            //         $gestionPack = $this->container->get('nwk_admin.gestionPack');
            //         $gestionPack->createAlias($pack->getPackId(), $libelle);
            //     }

            


        // $form = $this->createForm(SortieType::class);
        // $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if(!empty($_POST) && isset($_POST['idUnique'])) {
                $data = $form->getData();
                var_dump($data);
                $toto = $em->getRepository(Visiteur::class)->findByIdUnique($data['idUnique']);
                if($toto != null)
                {
                    return $this->redirectToRoute('home_index');
                } else {
                    return $this->redirectToRoute('categorie_index');
                }

            
            }
        }
        return $this->render('sortie.html.twig', ['form'=> $form->createView()]);
    }

    // /**
    //  * @Route("/", name="exit_index", methods="GET|POST")
    //  */
    // public function exit(Request $request)
    // {
    //     return $this->render('index.html.twig', ['form'=> $form->createView()]);
    // }
}