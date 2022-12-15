<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[NotBlank(message: "La date de réception ne peut être laissée vide.")]
    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateReception = null;

    #[NotBlank(message: "Le nom du donateur ne peut être laissée vide.")]
    #[ORM\Column(length: 50)]
    private ?string $nomDonateur = null;

    #[NotBlank(message: "Le prénom du donateur ne peut être laissée vide.")]
    #[ORM\Column(length: 50)]
    private ?string $prenomDonateur = null;

    #[NotBlank(message: "Le téléphone du donateur ne peut être laissée vide.")]
    #[Length(min: "10", minMessage: "Le numéro de téléphone doit comporter au moins 10 caractères.")]
    #[ORM\Column(length: 15)]
    private ?string $telephoneDonateur = null;


    #[NotBlank(message: "l'email du donateur ne peut être laissée vide.")]
    #[Email(message: "Cet adresse mail est invalide.")]
    #[ORM\Column(length: 320)]
    private ?string $mailDonateur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'offres')]
    #[ORM\JoinColumn(nullable: false, name: 'id_etat')]
    private ?Etat $etat = null;

    #[ORM\OneToMany(mappedBy: 'offre', targetEntity: Objet::class, orphanRemoval: true, cascade: ['persist'])]
    private Collection $objets;

    public function __construct()
    {
        $this->objets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReception(): ?\DateTimeImmutable
    {
        return $this->dateReception;
    }

    public function setDateReception(?\DateTimeImmutable $dateReception): self
    {
        $this->dateReception = $dateReception;

        return $this;
    }

    public function getNomDonateur(): ?string
    {
        return $this->nomDonateur;
    }

    public function setNomDonateur(?string $nomDonateur): self
    {
        $this->nomDonateur = $nomDonateur;

        return $this;
    }

    public function getPrenomDonateur(): ?string
    {
        return $this->prenomDonateur;
    }

    public function setPrenomDonateur(?string $prenomDonateur): self
    {
        $this->prenomDonateur = $prenomDonateur;

        return $this;
    }

    public function getTelephoneDonateur(): ?string
    {
        return $this->telephoneDonateur;
    }

    public function setTelephoneDonateur(?string $telephoneDonateur): self
    {
        $this->telephoneDonateur = $telephoneDonateur;

        return $this;
    }

    public function getMailDonateur(): ?string
    {
        return $this->mailDonateur;
    }

    public function setMailDonateur(?string $mailDonateur): self
    {
        $this->mailDonateur = $mailDonateur;

        return $this;
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

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?Etat $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection<int, Objet>
     */
    public function getObjets(): Collection
    {
        return $this->objets;
    }

    public function addObjet(Objet $objet): self
    {
        if (!$this->objets->contains($objet)) {
            $this->objets->add($objet);
            $objet->setOffre($this);
        }

        return $this;
    }

    public function removeObjet(Objet $objet): self
    {
        if ($this->objets->removeElement($objet)) {
            // set the owning side to null (unless already changed)
            if ($objet->getOffre() === $this) {
                $objet->setOffre(null);
            }
        }

        return $this;
    }
}
