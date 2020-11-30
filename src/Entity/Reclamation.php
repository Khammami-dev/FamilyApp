<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReclamationRepository::class)
 */
class Reclamation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $etat;

    /**
     * @ORM\Column(type="boolean")
     */
    private $publique;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validiter;

    /**
     * @ORM\OneToOne(targetEntity=RecPerteObjet::class, mappedBy="id_reclamation", cascade={"persist", "remove"})
     */
    private $recPerteObjet;

    /**
     * @ORM\OneToOne(targetEntity=RecHarcelement::class, mappedBy="id_reclamation", cascade={"persist", "remove"})
     */
    private $recHarcelement;

    /**
     * @ORM\OneToOne(targetEntity=RecAttaque::class, mappedBy="id_reclamation", cascade={"persist", "remove"})
     */
    private $recAttaque;

    /**
     * @ORM\OneToMany(targetEntity=Media::class, mappedBy="reclamation")
     */
    private $id_media;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="reclamations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Commisariat::class, inversedBy="reclamations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_commissariat;

    public function __construct()
    {
        $this->id_media = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

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

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(?bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getPublique(): ?bool
    {
        return $this->publique;
    }

    public function setPublique(bool $publique): self
    {
        $this->publique = $publique;

        return $this;
    }

    public function getValiditer(): ?bool
    {
        return $this->validiter;
    }

    public function setValiditer(bool $validiter): self
    {
        $this->validiter = $validiter;

        return $this;
    }

    public function getRecPerteObjet(): ?RecPerteObjet
    {
        return $this->recPerteObjet;
    }

    public function setRecPerteObjet(RecPerteObjet $recPerteObjet): self
    {
        $this->recPerteObjet = $recPerteObjet;

        // set the owning side of the relation if necessary
        if ($recPerteObjet->getIdReclamation() !== $this) {
            $recPerteObjet->setIdReclamation($this);
        }

        return $this;
    }

    public function getRecHarcelement(): ?RecHarcelement
    {
        return $this->recHarcelement;
    }

    public function setRecHarcelement(RecHarcelement $recHarcelement): self
    {
        $this->recHarcelement = $recHarcelement;

        // set the owning side of the relation if necessary
        if ($recHarcelement->getIdReclamation() !== $this) {
            $recHarcelement->setIdReclamation($this);
        }

        return $this;
    }

    public function getRecAttaque(): ?RecAttaque
    {
        return $this->recAttaque;
    }

    public function setRecAttaque(RecAttaque $recAttaque): self
    {
        $this->recAttaque = $recAttaque;

        // set the owning side of the relation if necessary
        if ($recAttaque->getIdReclamation() !== $this) {
            $recAttaque->setIdReclamation($this);
        }

        return $this;
    }

    /**
     * @return Collection|media[]
     */
    public function getIdMedia(): Collection
    {
        return $this->id_media;
    }

    public function addIdMedium(media $idMedium): self
    {
        if (!$this->id_media->contains($idMedium)) {
            $this->id_media[] = $idMedium;
            $idMedium->setReclamation($this);
        }

        return $this;
    }

    public function removeIdMedium(media $idMedium): self
    {
        if ($this->id_media->contains($idMedium)) {
            $this->id_media->removeElement($idMedium);
            // set the owning side to null (unless already changed)
            if ($idMedium->getReclamation() === $this) {
                $idMedium->setReclamation(null);
            }
        }

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    public function getIdCommissariat(): ?Commisariat
    {
        return $this->id_commissariat;
    }

    public function setIdCommissariat(?Commisariat $id_commissariat): self
    {
        $this->id_commissariat = $id_commissariat;

        return $this;
    }



}
