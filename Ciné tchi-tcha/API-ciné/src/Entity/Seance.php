<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeanceRepository")
 */
class Seance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\Column(type="integer")
     */
    private $PlacesDisponibles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salle", inversedBy="seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Salle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Film", inversedBy="seances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Film;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="Seance", orphanRemoval=true)
     */
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getPlacesDisponibles(): ?int
    {
        return $this->PlacesDisponibles;
    }

    public function setPlacesDisponibles(int $PlacesDisponibles): self
    {
        $this->PlacesDisponibles = $PlacesDisponibles;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->Salle;
    }

    public function setSalle(?Salle $Salle): self
    {
        $this->Salle = $Salle;

        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->Film;
    }

    public function setFilm(?Film $Film): self
    {
        $this->Film = $Film;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setSeance($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getSeance() === $this) {
                $reservation->setSeance(null);
            }
        }

        return $this;
    }
}
