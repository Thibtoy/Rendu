<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotationRepository")
 */
class Notation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Commentaire;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reservation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Reservation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Film", inversedBy="notations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Film;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->Note;
    }

    public function setNote(int $Note): self
    {
        $this->Note = $Note;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->Reservation;
    }

    public function setReservation(Reservation $Reservation): self
    {
        $this->Reservation = $Reservation;

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
}
