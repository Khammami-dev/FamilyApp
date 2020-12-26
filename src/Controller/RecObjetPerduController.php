<?php

namespace App\Controller;

use App\Entity\Medias;
use App\Entity\RecObjetPerdu;
use App\Form\RecObjetPerduType;
use App\Repository\RecObjetPerduRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rec/objet/perdu")
 */
class RecObjetPerduController extends AbstractController
{
    /**
     * @Route("/", name="rec_objet_perdu_index", methods={"GET"})
     */
    public function index(RecObjetPerduRepository $recObjetPerduRepository): Response
    {
        return $this->render('front/rec_objet_perdu/index.html.twig', [
            'rec_objet_perdus' => $recObjetPerduRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rec_objet_perdu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $recObjetPerdu = new RecObjetPerdu();
        $form = $this->createForm(RecObjetPerduType::class, $recObjetPerdu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $mediaInfos = $form->get('Media')->getData();
            foreach( $mediaInfos  as $media) {
                $imageName = $media->getClientOriginalName();
                $newImageName = md5(uniqid()) . $imageName;
                $media->move(
                    $this->getParameter('RecObjetPerdu_directory'),
                    $newImageName
                );
            }
                $med=new Medias();
                $med->setPath($newImageName);
                $recObjetPerdu->addMedia($med);
                $recObjetPerdu->setEtat(0);
                $recObjetPerdu->setValiditer(1);
                $recObjetPerdu->setDate(new \DateTime());
                $recObjetPerdu->setUser(null);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recObjetPerdu);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('front/rec_objet_perdu/new.html.twig', [
            'rec_objet_perdu' => $recObjetPerdu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rec_objet_perdu_show", methods={"GET"})
     */
    public function show(RecObjetPerdu $recObjetPerdu): Response
    {
        return $this->render('front/rec_objet_perdu/show.html.twig', [
            'rec_objet_perdu' => $recObjetPerdu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rec_objet_perdu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RecObjetPerdu $recObjetPerdu): Response
    {
        $form = $this->createForm(RecObjetPerduType::class, $recObjetPerdu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rec_objet_perdu_index');
        }

        return $this->render('front/rec_objet_perdu/edit.html.twig', [
            'rec_objet_perdu' => $recObjetPerdu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rec_objet_perdu_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RecObjetPerdu $recObjetPerdu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recObjetPerdu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recObjetPerdu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('Home');
    }
}