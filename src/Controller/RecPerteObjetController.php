<?php

namespace App\Controller;

use App\Entity\Reclamation;
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
            $form->remove('createdAt');
            $form->remove('updatedAt');
           // $form->remove('validiter');
            $form->handleRequest($request);
            if($form->isSubmitted()) {
                //add($form->getData());
                $addRecObjet = $this->getDoctrine()->getManager();
                $addRecObjet->persist($recObjet);
                $addRecObjet->flush();
            }

            return $this->render('front/RecObjetPerdu/add.html.twig', [
                'form' => $form->createView(),


            ]);
        }
    }
}
