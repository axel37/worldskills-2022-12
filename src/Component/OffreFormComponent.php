<?php

namespace App\Component;

use App\Form\OffreType;
use App\Entity\Offre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\Component\Form\FormInterface;


#[AsLiveComponent(name: 'offre_form')]
class OffreFormComponent extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;

    #[LiveProp(fieldName: 'data')]
    public ?Offre $offre = null;

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(
            OffreType::class,
            $this->offre
        );
    }
}