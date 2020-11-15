<?php

namespace App\Controller;

use App\Entity\RecObjetPerdu;

use App\Form\RecObjetPerduType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ObjetPerdutController extends AbstractController
{
    /**
     * @Route("/objet/perdu", name="objet_perdu")
     */
    public function index()
    {
        return $this->render('front/RecPerteObjet.html.twig', [
            'controller_name' => 'ObjetPerdutController',
        ]);
    }
    /**
     * @Route("/add/objet/perdu", name="add.objet_perdu")
     */
    public function addObjet(RecObjetPerdu $objetPerdu = null, Request $request){
         if(!$objetPerdu)
             $objetPerdu= new RecObjetPerdu();
         $form= $this->createForm(RecObjetPerduType::class,$objetPerdu);
         $form->remove('createdAt');
         $form->remove('updatedAt');
         $form->remove('id_utilisateur');
         $form->remove('type');
         $form->handleRequest($request);
         $form->remove('commentaire');
        if($form->isSubmitted()) {
            $imageInfos = $form->get('image')->getData();
            $imageName = $imageInfos->getClientOriginalName();
            $newImageName = md5(uniqid()).$imageName;
            $imageInfos->move($this->getParameter('RecObjetPerdu_directory'),
                $newImageName);
            $objetPerdu->setImage('uploads/RecObjetPerdu/'.$newImageName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($objetPerdu);
            $em->flush();


        }
        return $this->redirectToRoute('home');

        return $this->render('front/RecObjetPerdu/add.html.twig', [
            'form' => $form->createView(),

        ]);

    }
    /**
     * @Route("/details/objet/perdu/{$id}", name="details.objet_perdu")
     */
    public function DetailReclamation($id){
        $repository = $this->getDoctrine()->getRepository(RecObjetPerdu::class);
        $reclamation=$repository->find($id);
        if ($reclamation) {
            return $this->render('front/RecObjetPerdu/detail.html.twig', ['reclamation' => $reclamation]);
        } else {
            $this->addFlash('error', 'cette réclamation inexistance');
            return $this->redirectToRoute('home');
        }


    }
}
