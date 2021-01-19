<?php

namespace App\Controller;

use App\Entity\RecPersonnePerdue;
use App\Form\RecPersonnePerdueType;
use App\Repository\RecPersonnePerdueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rec/personne/perdue")
 */
class RecPersonnePerdueController extends AbstractController
{
    /**
     * @Route("/", name="rec_personne_perdue_index", methods={"GET"})
     */
    public function index(RecPersonnePerdueRepository $recPersonnePerdueRepository): Response
    {
        return $this->render('rec_personne_perdue/index.html.twig', [
            'rec_personne_perdues' => $recPersonnePerdueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rec_personne_perdue_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $recPersonnePerdue = new RecPersonnePerdue();
        $form = $this->createForm(RecPersonnePerdueType::class, $recPersonnePerdue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recPersonnePerdue);
            $entityManager->flush();

            return $this->redirectToRoute('rec_personne_perdue_index');
        }

        return $this->render('rec_personne_perdue/new.html.twig', [
            'rec_personne_perdue' => $recPersonnePerdue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rec_personne_perdue_show", methods={"GET"})
     */
    public function show(RecPersonnePerdue $recPersonnePerdue): Response
    {
        return $this->render('rec_personne_perdue/show.html.twig', [
            'rec_personne_perdue' => $recPersonnePerdue,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rec_personne_perdue_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RecPersonnePerdue $recPersonnePerdue): Response
    {
        $form = $this->createForm(RecPersonnePerdueType::class, $recPersonnePerdue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rec_personne_perdue_index');
        }

        return $this->render('rec_personne_perdue/edit.html.twig', [
            'rec_personne_perdue' => $recPersonnePerdue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rec_personne_perdue_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RecPersonnePerdue $recPersonnePerdue): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recPersonnePerdue->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recPersonnePerdue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rec_personne_perdue_index');
    }
}
