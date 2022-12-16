<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * La route principale de l'application.
 * Comme nous n'avons pas de page d'accueil, elle redirige automatiquement vers la page de gestion des offres.
 */
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_offre_index');
    }
}
