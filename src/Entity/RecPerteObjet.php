<?php

namespace App\Entity;

use App\Repository\RecPerteObjetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecPerteObjetRepository::class)
 */
class RecPerteObjet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marque;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_perte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $num_serie;

    /**
     * @ORM\OneToOne(targetEntity=Reclamation::class, inversedBy="recPerteObjet", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_reclamation;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getDatePerte(): ?\DateTimeInterface
    {
        return $this->date_perte;
    }

    public function setDatePerte(\DateTimeInterface $date_perte): self
    {
        $this->date_perte = $date_perte;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getNumSerie(): ?int
    {
        return $this->num_serie;
    }

    public function setNumSerie(?int $num_serie): self
    {
        $this->num_serie = $num_serie;

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
