<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ObjetPerdutController extends AbstractController
{
    /**
     * @Route("/objet/perdut", name="objet_perdut")
     */
    public function index()
    {
        return $this->render('front/AjoutRecPerteObjet.html.twig', [
            'controller_name' => 'ObjetPerdutController',
        ]);
    }
}
