<?php

namespace App\Controller;

use App\Entity\RecPerteObjet;
use App\Form\ReclamationType;
use App\Form\RecPerteObjetType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecPerteObjetController extends AbstractController
{
    /**
     * @Route("/rec/perte/objet", name="rec_perte_objet")
     */
    public function index()
    {
        return $this->render('rec_perte_objet/index.html.twig', [
            'controller_name' => 'RecPerteObjetController',
        ]);
    }
    /**
     * @Route("/ajouter/rec/perte/objet", name="add_rec_perte_objet")
     */
    public  function addRec(RecPerteObjet $recObjet=null, Request $request)
    {
        if (!$recObjet) {
            $recObjet = new RecPerteObjet();
            $form = $this->createForm(RecPerteObjetType::class);
            $formRec = $this->createForm(ReclamationType::class);
            $form->remove('createdAt');
            $form->remove('updatedAt');
            $formRec->remove('recPerteObjet');
            $formRec->remove('recHarcelement');
            $formRec->remove('recAttaque');
            $formRec->remove('id_utilisateur');
            $formRec->remove('validiter');
            $formRec->remove('etat');
            $formRec->remove('date');
            $form->handleRequest($request);
            if ($form->isSubmitted()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($recObjet);
                $em->flush();

                return $this->redirectToRoute('home');
            }
            return $this->render('front/RecObjetPerdu/add.html.twig', [
                'form' => $form->createView(),
                'formRec' => $formRec->createView()

            ]);
        }
    }
}
