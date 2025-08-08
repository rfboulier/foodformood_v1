<?php

namespace App\Controller;

use App\Entity\Recommandation;
use App\Form\RecoType;
use App\Repository\RecommandationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RecommandationController extends AbstractController
{
    #[Route('/list', name: 'list_recommandation')]
    public function index(RecommandationRepository $recommandationRepository): Response
    {
        $reco = $recommandationRepository->findAll();

        return $this->render('recommandation/list.html.twig', [
            'recos' => $reco,
        ]);
    }

    #[Route('/new', name: 'new_recommandation', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $recommandation = new Recommandation();
        $form = $this->createForm(RecoType::class, $recommandation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($recommandation);
            $em->flush();

            $this->addFlash('success', 'Recommandation enregistrée avec succès !');

            return $this->redirectToRoute('list_recommandation');
        }

        return $this->render('recommandation/create.html.twig', [
            'recoForm' => $form->createView()
        ]);
    }
}
