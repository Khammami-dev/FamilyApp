<?php

namespace App\Controller;

use App\Entity\Medias;
use App\Entity\RecObjetPerdu;
use App\Form\RecObjetPerduType;
use App\Repository\RecObjetPerduRepository;
use Knp\Component\Pager\PaginatorInterface;
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
     * @Route("/admin/index/", name="rec_objet_perdu_admin_index", methods={"GET"})
     */
    public function indexAdmin(RecObjetPerduRepository $recObjetPerduRepository,Request $request, PaginatorInterface $paginator): Response
    {
        $donnees = $recObjetPerduRepository->findBy(
            [],
            ['date'=>'desc']);
        $recObjetPerdu = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            3 // Nombre de résultats par page
        );

        return $this->render('Back/RecObjet/index.html.twig', [
            'rec_objet_perdus' => $recObjetPerdu,


        ]);
    }

    /**
     * @Route("/new", name="rec_objet_perdu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {

        $recObjetPerdu = new RecObjetPerdu();
        $form = $this->createForm(RecObjetPerduType::class, $recObjetPerdu);
        $form->remove('etat');
        $form->remove('validiter');
        $form->remove('user');
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
