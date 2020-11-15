<?php

namespace App\Entity;

use App\Repository\CommisseriatPoliceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommisseriatPoliceRepository::class)
 */
class CommisseriatPolice
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity=RecObjetPerdu::class, mappedBy="id_commisseriatPolice")
     */
    private $recObjetPerdus;

    public function __construct()
    {
        $this->recObjetPerdus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
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
     * @return Collection|RecObjetPerdu[]
     */
    public function getRecObjetPerdus(): Collection
    {
        return $this->recObjetPerdus;
    }

    public function addRecObjetPerdu(RecObjetPerdu $recObjetPerdu): self
    {
        if (!$this->recObjetPerdus->contains($recObjetPerdu)) {
            $this->recObjetPerdus[] = $recObjetPerdu;
            $recObjetPerdu->setIdCommisseriatPolice($this);
        }

        return $this;
    }

    public function removeRecObjetPerdu(RecObjetPerdu $recObjetPerdu): self
    {
        if ($this->recObjetPerdus->contains($recObjetPerdu)) {
            $this->recObjetPerdus->removeElement($recObjetPerdu);
            // set the owning side to null (unless already changed)
            if ($recObjetPerdu->getIdCommisseriatPolice() === $this) {
                $recObjetPerdu->setIdCommisseriatPolice(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNom();
    }
}
