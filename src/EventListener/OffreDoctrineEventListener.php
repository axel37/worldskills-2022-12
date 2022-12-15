<?php

namespace App\EventListener;

use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Entity\Offre;
use App\Repository\Repository;

class OffreDoctrineEventListener
{

    // public function __construct(private OffreRepository $offreRepository)
    // {
        
    // }

    public function postUpdate(Offre $offre, LifecycleEventArgs $args): void
    {
        // Si l'état est passé à Accepté, transformé l'offre en don
    }
}