<?php

namespace App\Controller;

use App\Entity\Recommandation;
use App\Repository\RecommandationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
