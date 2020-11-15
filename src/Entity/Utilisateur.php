<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumCin;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity=RecObjetPerdu::class, mappedBy="id_utilisateur")
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

    public function getNumCin(): ?int
    {
        return $this->NumCin;
    }

    public function setNumCin(int $NumCin): self
    {
        $this->NumCin = $NumCin;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

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
            $recObjetPerdu->setIdUtilisateur($this);
        }

        return $this;
    }

    public function removeRecObjetPerdu(RecObjetPerdu $recObjetPerdu): self
    {
        if ($this->recObjetPerdus->contains($recObjetPerdu)) {
            $this->recObjetPerdus->removeElement($recObjetPerdu);
            // set the owning side to null (unless already changed)
            if ($recObjetPerdu->getIdUtilisateur() === $this) {
                $recObjetPerdu->setIdUtilisateur(null);
            }
        }

        return $this;
    }

}
