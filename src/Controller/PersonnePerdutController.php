<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonnePerdutController extends AbstractController
{
    /**
     * @Route("/personne/perdut", name="personne_perdut")
     */
    public function index()
    {
        return $this->render('personne_perdut/AjoutRecPertePersonne.html.twig', [
            'controller_name' => 'PersonnePerdutController',
        ]);
    }
}
