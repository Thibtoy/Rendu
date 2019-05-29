<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="text")
     */
    private $Synopsis;

    /**
     * @ORM\Column(type="integer")
     */
    private $Duree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $BandeAnnonce;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDeSortie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Realisateur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Acteurs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nationalite;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Langue", inversedBy="films")
     */
    private $Langue;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="films")
     */
    private $Category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Seance", mappedBy="Film")
     */
    private $seances;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notation", mappedBy="Film", orphanRemoval=true)
     */
    private $notations;

    public function __construct()
    {
        $this->Langue = new ArrayCollection();
        $this->Category = new ArrayCollection();
        $this->seances = new ArrayCollection();
        $this->notations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->Synopsis;
    }

    public function setSynopsis(string $Synopsis): self
    {
        $this->Synopsis = $Synopsis;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->Duree;
    }

    public function setDuree(int $Duree): self
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getBandeAnnonce(): ?string
    {
        return $this->BandeAnnonce;
    }

    public function setBandeAnnonce(?string $BandeAnnonce): self
    {
        $this->BandeAnnonce = $BandeAnnonce;

        return $this;
    }

    public function getDateDeSortie(): ?\DateTimeInterface
    {
        return $this->DateDeSortie;
    }

    public function setDateDeSortie(\DateTimeInterface $DateDeSortie): self
    {
        $this->DateDeSortie = $DateDeSortie;

        return $this;
    }

    public function getRealisateur(): ?string
    {
        return $this->Realisateur;
    }

    public function setRealisateur(?string $Realisateur): self
    {
        $this->Realisateur = $Realisateur;

        return $this;
    }

    public function getActeurs(): ?string
    {
        return $this->Acteurs;
    }

    public function setActeurs(?string $Acteurs): self
    {
        $this->Acteurs = $Acteurs;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->Nationalite;
    }

    public function setNationalite(?string $Nationalite): self
    {
        $this->Nationalite = $Nationalite;

        return $this;
    }

    /**
     * @return Collection|Langue[]
     */
    public function getLangue(): Collection
    {
        return $this->Langue;
    }

    public function addLangue(Langue $langue): self
    {
        if (!$this->Langue->contains($langue)) {
            $this->Langue[] = $langue;
        }

        return $this;
    }

    public function removeLangue(Langue $langue): self
    {
        if ($this->Langue->contains($langue)) {
            $this->Langue->removeElement($langue);
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->Category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->Category->contains($category)) {
            $this->Category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->Category->contains($category)) {
            $this->Category->removeElement($category);
        }

        return $this;
    }

    /**
     * @return Collection|Seance[]
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seances->contains($seance)) {
            $this->seances[] = $seance;
            $seance->setFilm($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seances->contains($seance)) {
            $this->seances->removeElement($seance);
            // set the owning side to null (unless already changed)
            if ($seance->getFilm() === $this) {
                $seance->setFilm(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notation[]
     */
    public function getNotations(): Collection
    {
        return $this->notations;
    }

    public function addNotation(Notation $notation): self
    {
        if (!$this->notations->contains($notation)) {
            $this->notations[] = $notation;
            $notation->setFilm($this);
        }

        return $this;
    }

    public function removeNotation(Notation $notation): self
    {
        if ($this->notations->contains($notation)) {
            $this->notations->removeElement($notation);
            // set the owning side to null (unless already changed)
            if ($notation->getFilm() === $this) {
                $notation->setFilm(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->Titre;
    }
}
