<?php

namespace App\Controller;

use App\Entity\MotifVisite;
use App\Form\MotifVisiteType;
use App\Repository\MotifVisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/motif/visite")
 */
class MotifVisiteController extends AbstractController
{
    /**
     * @Route("/", name="motif_visite_index", methods="GET")
     */
    public function index(MotifVisiteRepository $motifVisiteRepository): Response
    {
        return $this->render('motif_visite/index.html.twig', ['motif_visites' => $motifVisiteRepository->findAll()]);
    }

    /**
     * @Route("/new", name="motif_visite_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $motifVisite = new MotifVisite();
        $form = $this->createForm(MotifVisiteType::class, $motifVisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($motifVisite);
            $em->flush();

            return $this->redirectToRoute('motif_visite_index');
        }

        return $this->render('motif_visite/new.html.twig', [
            'motif_visite' => $motifVisite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="motif_visite_show", methods="GET")
     */
    public function show(MotifVisite $motifVisite): Response
    {
        return $this->render('motif_visite/show.html.twig', ['motif_visite' => $motifVisite]);
    }

    /**
     * @Route("/{id}/edit", name="motif_visite_edit", methods="GET|POST")
     */
    public function edit(Request $request, MotifVisite $motifVisite): Response
    {
        $form = $this->createForm(MotifVisiteType::class, $motifVisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('motif_visite_index', ['id' => $motifVisite->getId()]);
        }

        return $this->render('motif_visite/edit.html.twig', [
            'motif_visite' => $motifVisite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="motif_visite_delete", methods="DELETE")
     */
    public function delete(Request $request, MotifVisite $motifVisite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$motifVisite->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($motifVisite);
            $em->flush();
        }

        return $this->redirectToRoute('motif_visite_index');
    }
}
