<?php

namespace App\EventListener;

use App\Entity\Don;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use App\Entity\Offre;
use App\Repository\DonRepository;
use App\Repository\OffreRepository;
use DateTimeImmutable;

class OffreDoctrineEventListener
{

    public function __construct(private DonRepository $donRepository, private OffreRepository $offreRepository)
    {
    }

    // Transformer les offres acceptées en dons lors de leur enregistrement
    public function postUpdate(Offre $offre, LifecycleEventArgs $args): void
    {
        if (!($offre instanceof Don) && $offre->getEtat()->getLibelle() == "Acceptée") {
            $don = new Don();
            $don->setDateReception($offre->getDateReception());
            $don->setNomDonateur($offre->getNomDonateur());
            $don->setPrenomDonateur($offre->getPrenomDonateur());
            $don->setTelephoneDonateur($offre->getTelephoneDonateur());
            $don->setMailDonateur($offre->getMailDonateur());
            $don->setDescription($offre->getDescription());
            $don->setEtat($offre->getEtat());

            foreach ($offre->getObjets() as $objet) {
                $don->addObjet($objet);
            }

            $don->setDateAcceptation(new DateTimeImmutable());

            $this->donRepository->save($don, true);
            $this->offreRepository->remove($offre, true);
        }
    }
}
