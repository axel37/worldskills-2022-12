<?php

namespace App\Entity;

use App\Repository\DonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\AttributeOverride;
use Doctrine\ORM\Mapping\AttributeOverrides;
use Doctrine\ORM\Mapping\Column;


#[ORM\Entity(repositoryClass: DonRepository::class)]
class Don extends Offre
{
    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateAcceptation = null;

    public function getDateAcceptation(): ?\DateTimeImmutable
    {
        return $this->dateAcceptation;
    }

    public function setDateAcceptation(\DateTimeImmutable $dateAcceptation): self
    {
        $this->dateAcceptation = $dateAcceptation;

        return $this;
    }

}
