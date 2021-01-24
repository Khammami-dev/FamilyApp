<?php

namespace App\Controller;

use App\Entity\RecPersonnePerdue;
use App\Form\RecPersonnePerdueType;
use App\Repository\RecPersonnePerdueRepository;
use App\Service\ImageUploaderService;
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
        return $this->render('front/rec_personne_perdue/index.html.twig', [
            'rec_personne_perdues' => $recPersonnePerdueRepository->findAll(),
        ]);
    }
    /**
     * @Route("/admin/index/{page?1}", name="rec_personne_perdu_admin_index", methods={"GET"})
     */
    public function indexAdmin($page): Response
    {

        $repository = $this->getDoctrine()->getRepository(RecPersonnePerdue::class);
        $nb = $repository->getNb();
        $pages=($nb  % 3)+1;


        $recPersonnePerdu = $repository->findBy(
            [],
            ['date'=>'desc'],
            3,
            ($page - 1) * 3
        );
        return $this->render('Back/rec_personne_perdue/index.html.twig', [
            'rec_personne_perdues' => $recPersonnePerdu,
            'pages' => $pages


        ]);
    }

    /**
     * @Route("/new", name="rec_personne_perdue_new", methods={"GET","POST"})
     */
    public function new(Request $request,
                        ImageUploaderService $imageUploaderService,$uploadRecObjetPerduDirectory
         ): Response
    {
        $recPersonnePerdue = new RecPersonnePerdue();
        $form = $this->createForm(RecPersonnePerdueType::class, $recPersonnePerdue);
        $form->remove('etat');
        $form->remove('validiter');
        $form->remove('user');
        $form->remove('Media');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageInfos = $form->get('image')->getData();

            if ($imageInfos) {
                $newImageName = $imageUploaderService->uploadFile($imageInfos, $uploadRecObjetPerduDirectory);
                $recPersonnePerdue->setImage('uploads/RecObjetPerdu/'.$newImageName);
            }



            $recPersonnePerdue->setEtat(0);
            $recPersonnePerdue->setValiditer(1);
            $recPersonnePerdue->setDate(new \DateTime());
            $recPersonnePerdue->setUser(null);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recPersonnePerdue);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('front/rec_personne_perdue/new.html.twig', [
            'rec_personne_perdue' => $recPersonnePerdue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rec_personne_perdue_show", methods={"GET"})
     */
    public function show(RecPersonnePerdue $recPersonnePerdue): Response
    {
        return $this->render('front/rec_personne_perdue/show.html.twig', [
            'rec_personne_perdue' => $recPersonnePerdue,
        ]);
    }
    /**
     * @Route("/admin/detail/{id}", name="rec_personne_perdu_admin_show")
     */
    public function showAdmin($id)

    {
        $repository = $this->getDoctrine()->getRepository(RecPersonnePerdue::class);
        $recPersonnePerdue= $repository->find($id);
        if ($recPersonnePerdue) {
            return $this->render('Back/rec_personne_perdue/show.html.twig', [
                'rec_personne_perdu' => $recPersonnePerdue,
            ]);
        }else{
            $this->addFlash('error', 'Réclamation innexistante');
            return $this->redirectToRoute('rec_objet_perdu_admin_index');
        }
    }


    /**
     * @Route("/{id}/edit", name="rec_personne_perdue_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RecPersonnePerdue $recPersonnePerdue): Response
    {
        if (!$recPersonnePerdue) {
            $this->addFlash('error', 'Réclamation  innexistante');
            return $this->redirectToRoute('rec_personne_perdue_index');
        }
        $form = $this->createForm(RecPersonnePerdueType::class, $recPersonnePerdue);
        $form->remove('date');
        $form->remove('localisation');
        $form->remove('adresse');
        $form->remove('categorie');
        $form->remove('marque');
        $form->remove('dateperte');
        $form->remove('commisariatPolice');
        $form->remove('user');
        $form->remove('Media');
        $form->remove('description');
        $form->remove('publique');
        $form->remove('titre');
        $form->remove('couleur');
        $form->remove('modele');
        $form->remove('numSerie');

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rec_personne_perdue_index');
        }

        return $this->render('Back/rec_personne_perdue/edit.html.twig', [
            'rec_personne_perdue' => $recPersonnePerdue,
            'form' => $form->createView(),
        ]);
    }


}
