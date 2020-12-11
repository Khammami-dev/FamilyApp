<?php

namespace App\Controller;

use App\Entity\Media;
use App\Entity\Reclamation;
use App\Entity\RecPertePersonne;
use App\Form\RecPertePersonneType;
use App\Repository\RecPertePersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rec/perte/personne")
 */
class RecPertePersonneController extends AbstractController
{
    /**
     * @Route("/", name="rec_perte_personne_index", methods={"GET"})
     */
    public function index(RecPertePersonneRepository $recPertePersonneRepository): Response
    {
        return $this->render('rec_perte_personne/index.html.twig', [
            'rec_perte_personnes' => $recPertePersonneRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rec_perte_personne_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $recPertePersonne = new RecPertePersonne();
        $reclamation = new Reclamation();
        $form = $this->createForm(RecPertePersonneType::class, $recPertePersonne);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           // dd($form->getData());
            $mediaInfos = $form->get('id_reclamation')->get('Media')->getData();


            foreach( $mediaInfos  as $media){
                $imageName = $media->getClientOriginalName();
                $newImageName = md5(uniqid()).$imageName;
                $media->move(
                    $this->getParameter('RecPersonnePerdu_directory'),
                    $newImageName
                );
                $med=new Media();
                $med->setPath($newImageName);
                $recPertePersonne->getIdReclamation()->addIdMedium($med);

            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recPertePersonne);
            $entityManager->flush();

            return $this->redirectToRoute('rec_perte_personne_index');
        }

        return $this->render('rec_perte_personne/new.html.twig', [
            'rec_perte_personne' => $recPertePersonne,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rec_perte_personne_show", methods={"GET"})
     */
    public function show(RecPertePersonne $recPertePersonne): Response
    {
        return $this->render('rec_perte_personne/show.html.twig', [
            'rec_perte_personne' => $recPertePersonne,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rec_perte_personne_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RecPertePersonne $recPertePersonne): Response
    {
        $form = $this->createForm(RecPertePersonneType::class, $recPertePersonne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rec_perte_personne_index');
        }

        return $this->render('rec_perte_personne/edit.html.twig', [
            'rec_perte_personne' => $recPertePersonne,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rec_perte_personne_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RecPertePersonne $recPertePersonne): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recPertePersonne->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recPertePersonne);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rec_perte_personne_index');
    }
}
