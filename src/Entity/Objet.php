<?php

namespace App\Entity;

use App\Repository\ObjetRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Positive;

/**
 * Un Objet est le sujet d'un don / d'une offre.
 */
#[ORM\Entity(repositoryClass: ObjetRepository::class)]
class Objet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $reference = null;

    #[Length(max: 255, maxMessage: 'La description ne peut faire plus de 255 caractères.')]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[Positive(message: 'Ce montant doit être un nombre positif')]
    #[ORM\Column(nullable: true)]
    private ?float $montantEstime = null;

    #[ORM\ManyToOne(inversedBy: 'objets')]
    #[ORM\JoinColumn(nullable: false, name: 'id_offre')]
    private ?Offre $offre = null;

    #[ORM\ManyToOne(inversedBy: 'objets')]
    #[ORM\JoinColumn(nullable: false, name: 'id_type_materiel')]
    private ?TypeMateriel $type = null;

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMontantEstime(): ?float
    {
        return $this->montantEstime;
    }

    public function setMontantEstime(?float $montantEstime): self
    {
        $this->montantEstime = $montantEstime;

        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): self
    {
        $this->offre = $offre;

        return $this;
    }

    public function getType(): ?TypeMateriel
    {
        return $this->type;
    }

    public function setType(?TypeMateriel $type): self
    {
        $this->type = $type;

        return $this;
    }
}
