<?php

namespace App\Entity;

use App\Repository\RecHarcelementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecHarcelementRepository::class)
 */
class RecHarcelement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_criminel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sexe_criminel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description_criminel;

    /**
     * @ORM\OneToOne(targetEntity=Reclamation::class, inversedBy="recHarcelement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_reclamation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCriminel(): ?string
    {
        return $this->nom_criminel;
    }

    public function setNomCriminel(?string $nom_criminel): self
    {
        $this->nom_criminel = $nom_criminel;

        return $this;
    }

    public function getSexeCriminel(): ?bool
    {
        return $this->sexe_criminel;
    }

    public function setSexeCriminel(bool $sexe_criminel): self
    {
        $this->sexe_criminel = $sexe_criminel;

        return $this;
    }

    public function getDescriptionCriminel(): ?string
    {
        return $this->description_criminel;
    }

    public function setDescriptionCriminel(?string $description_criminel): self
    {
        $this->description_criminel = $description_criminel;

        return $this;
    }

    public function getIdReclamation(): ?Reclamation
    {
        return $this->id_reclamation;
    }

    public function setIdReclamation(Reclamation $id_reclamation): self
    {
        $this->id_reclamation = $id_reclamation;

        return $this;
    }
}
