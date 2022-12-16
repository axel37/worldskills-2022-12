<?php

namespace App\Controller;

use App\Form\RechercheType;
use App\Repository\ObjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheController extends AbstractController
{
    #[Route('/recherche', name: 'app_recherche_index')]
    public function index(ObjetRepository $objetRepository, Request $request): Response
    {
        $objets = $objetRepository->findByCriteres();

        $form = $this->createForm(RechercheType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            $objets = $objetRepository->findByCriteres($data['texte'], $data['type'], $data['etat']);
        }

        return $this->render('recherche/index.html.twig', [
            'form' => $form,
            'objets' => $objets
        ]);
    }
}
