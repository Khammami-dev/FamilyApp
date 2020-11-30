<?php

namespace App\Entity;

use App\Repository\RecAttaqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecAttaqueRepository::class)
 */
class RecAttaque
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
     * @ORM\Column(type="string", length=255)
     */
    private $certification;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $degat;

    /**
     * @ORM\OneToOne(targetEntity=reclamation::class, inversedBy="recAttaque", cascade={"persist", "remove"})
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

    public function getCertification(): ?string
    {
        return $this->certification;
    }

    public function setCertification(string $certification): self
    {
        $this->certification = $certification;

        return $this;
    }

    public function getDegat(): ?string
    {
        return $this->degat;
    }

    public function setDegat(string $degat): self
    {
        $this->degat = $degat;

        return $this;
    }

    public function getIdReclamation(): ?reclamation
    {
        return $this->id_reclamation;
    }

    public function setIdReclamation(reclamation $id_reclamation): self
    {
        $this->id_reclamation = $id_reclamation;

        return $this;
    }
}
