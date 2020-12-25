<?php

namespace App\Entity;

use App\Repository\CommisariatPoliceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommisariatPoliceRepository::class)
 */
class CommisariatPolice
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
     * @ORM\OneToMany(targetEntity=RecObjetPerdu::class, mappedBy="commisariatPolice", orphanRemoval=true)
     */
    private $recObjetPerdus;

    /**
     * @ORM\OneToMany(targetEntity=RecPersonnePerdue::class, mappedBy="commissariatPolice", orphanRemoval=true)
     */
    private $recPersonnePerdues;

    public function __construct()
    {
        $this->recObjetPerdus = new ArrayCollection();
        $this->recPersonnePerdues = new ArrayCollection();
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
            $recObjetPerdu->setCommisariatPolice($this);
        }

        return $this;
    }

    public function removeRecObjetPerdu(RecObjetPerdu $recObjetPerdu): self
    {
        if ($this->recObjetPerdus->removeElement($recObjetPerdu)) {
            // set the owning side to null (unless already changed)
            if ($recObjetPerdu->getCommisariatPolice() === $this) {
                $recObjetPerdu->setCommisariatPolice(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RecPersonnePerdue[]
     */
    public function getRecPersonnePerdues(): Collection
    {
        return $this->recPersonnePerdues;
    }

    public function addRecPersonnePerdue(RecPersonnePerdue $recPersonnePerdue): self
    {
        if (!$this->recPersonnePerdues->contains($recPersonnePerdue)) {
            $this->recPersonnePerdues[] = $recPersonnePerdue;
            $recPersonnePerdue->setCommissariatPolice($this);
        }

        return $this;
    }

    public function removeRecPersonnePerdue(RecPersonnePerdue $recPersonnePerdue): self
    {
        if ($this->recPersonnePerdues->removeElement($recPersonnePerdue)) {
            // set the owning side to null (unless already changed)
            if ($recPersonnePerdue->getCommissariatPolice() === $this) {
                $recPersonnePerdue->setCommissariatPolice(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNom();
    }
}
