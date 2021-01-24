<?php

namespace App\Controller;

use App\Entity\Medias;
use App\Entity\RecObjetPerdu;
use App\Form\RecObjetPerduType;
use App\Repository\RecObjetPerduRepository;
use App\Service\ImageUploaderService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\services\Utils;

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
     * @Route("/admin/index/{page?1}", name="rec_objet_perdu_admin_index", methods={"GET"})
     */
    public function indexAdmin($page): Response
    {

        $repository = $this->getDoctrine()->getRepository(RecObjetPerdu::class);
        $nb = $repository->getNb();
        $pages=($nb  % 3)+1;


        $recObjetPerdu = $repository->findBy(
            [],
            ['date'=>'desc'],
            3,
            ($page - 1) * 3
        );
        return $this->render('Back/RecObjet/index.html.twig', [
            'rec_objet_perdus' => $recObjetPerdu,
            'pages' => $pages


        ]);
    }

    /**
     * @Route("/new", name="rec_objet_perdu_new", methods={"GET","POST"})
     */
    public function new(Request $request,
     ImageUploaderService $imageUploaderService,$uploadRecObjetPerduDirectory): Response
    {

        $recObjetPerdu = new RecObjetPerdu();
        $form = $this->createForm(RecObjetPerduType::class, $recObjetPerdu);
        $form->remove('date');
        $form->remove('etat');
        $form->remove('validiter');
        $form->remove('user');
        $form->remove('Media');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageInfos = $form->get('image')->getData();

            if ($imageInfos) {
                $newImageName = $imageUploaderService->uploadFile($imageInfos, $uploadRecObjetPerduDirectory);
                $recObjetPerdu->setImage('uploads/RecObjetPerdu/'.$newImageName);
            }



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
     * @Route("/admin/detail/{id}", name="rec_objet_perdu_admin_show")
     */
    public function showAdmin($id)

    {
        $repository = $this->getDoctrine()->getRepository(RecObjetPerdu::class);
        $RecObjetPerdu = $repository->find($id);
        if ($RecObjetPerdu) {
            return $this->render('Back/RecObjet/show.html.twig', [
                'rec_objet_perdu' => $RecObjetPerdu,
            ]);
        }else{
            $this->addFlash('error', 'Réclamation innexistante');
            return $this->redirectToRoute('rec_objet_perdu_admin_index');
        }
    }




    /**
     * @Route("/admin/{id}/edit", name="rec_objet_perdu_edit")
     */
    public function edit(Request $request, RecObjetPerdu $recObjetPerdu): Response
    {
        if (!$recObjetPerdu) {
            $this->addFlash('error', 'Réclamation  innexistante');
            return $this->redirectToRoute('rec_objet_perdu_admin_index');
        }
        $form = $this->createForm(RecObjetPerduType::class, $recObjetPerdu);
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
        $form->remove('image');


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rec_objet_perdu_admin_index');
        }

        return $this->render('Back/RecObjet/edit.html.twig', [
            'rec_objet_perdu' => $recObjetPerdu,
            'form' => $form->createView(),
        ]);
    }

}
