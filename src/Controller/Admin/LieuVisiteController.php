<?php

namespace App\Controller\Admin;

use App\Entity\LieuVisite;
use App\Form\LieuVisiteType;
use App\Repository\LieuVisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/lieu/visite", name="admin_")
 */
class LieuVisiteController extends AbstractController
{
    /**
     * @Route("/", name="lieu_visite_index", methods="GET")
     */
    public function index(LieuVisiteRepository $lieuVisiteRepository): Response
    {
        return $this->render('admin/lieu_visite/index.html.twig', ['lieu_visites' => $lieuVisiteRepository->findAll()]);
    }

    /**
     * @Route("/new", name="lieu_visite_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $lieuVisite = new LieuVisite();
        $form = $this->createForm(LieuVisiteType::class, $lieuVisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lieuVisite);
            $em->flush();

            return $this->redirectToRoute('admin_lieu_visite_index');
        }

        return $this->render('admin/lieu_visite/new.html.twig', [
            'lieu_visite' => $lieuVisite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lieu_visite_show", methods="GET")
     */
    public function show(LieuVisite $lieuVisite): Response
    {
        return $this->render('admin/lieu_visite/show.html.twig', ['lieu_visite' => $lieuVisite]);
    }

    /**
     * @Route("/{id}/edit", name="lieu_visite_edit", methods="GET|POST")
     */
    public function edit(Request $request, LieuVisite $lieuVisite): Response
    {
        $form = $this->createForm(LieuVisiteType::class, $lieuVisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_lieu_visite_index', ['id' => $lieuVisite->getId()]);
        }

        return $this->render('admin/lieu_visite/edit.html.twig', [
            'lieu_visite' => $lieuVisite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lieu_visite_delete", methods="DELETE")
     */
    public function delete(Request $request, LieuVisite $lieuVisite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lieuVisite->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lieuVisite);
            $em->flush();
        }

        return $this->redirectToRoute('admin_lieu_visite_index');
    }
}
