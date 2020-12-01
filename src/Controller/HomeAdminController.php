<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin")
 */
class HomeAdminController extends AbstractController
{
    /**
     * @Route("/home", name="home_admin")
     */
    public function index()
    {
        return $this->render('Back/Home.html.twig', [
            'controller_name' => 'HomeAdminController',
        ]);
    }
}
