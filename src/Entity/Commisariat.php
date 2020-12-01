<?php

namespace App\Entity;

use App\Repository\CommisariatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommisariatRepository::class)
 */
class Commisariat
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
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="id_commissariat", orphanRemoval=true)
     */
    private $reclamations;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    public function __construct()
    {
        $this->reclamations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Reclamation[]
     */
    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): self
    {
        if (!$this->reclamations->contains($reclamation)) {
            $this->reclamations[] = $reclamation;
            $reclamation->setIdCommissariat($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): self
    {
        if ($this->reclamations->contains($reclamation)) {
            $this->reclamations->removeElement($reclamation);
            // set the owning side to null (unless already changed)
            if ($reclamation->getIdCommissariat() === $this) {
                $reclamation->setIdCommissariat(null);
            }
        }

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
    public function __toString()
    {
        return $this->getNom();
    }
}
