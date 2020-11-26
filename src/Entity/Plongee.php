<?php

namespace App\Entity;

use App\Repository\PlongeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlongeeRepository::class)
 */
class Plongee
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
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveauAIDA;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxPersonne;

    /**
     * @ORM\Column(type="integer")
     */
    private $profondeurMax;

    /**
     * @ORM\Column(type="time")
     */
    private $duree;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $infos;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $prixPersonne;

    /**
     * @ORM\OneToMany(targetEntity=ReservationPlongee::class, mappedBy="plongee", cascade={"persist"})
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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getNiveauAIDA(): ?int
    {
        return $this->niveauAIDA;
    }

    public function setNiveauAIDA(int $niveauAIDA): self
    {
        $this->niveauAIDA = $niveauAIDA;

        return $this;
    }

    public function getMaxPersonne(): ?int
    {
        return $this->maxPersonne;
    }

    public function setMaxPersonne(int $maxPersonne): self
    {
        $this->maxPersonne = $maxPersonne;

        return $this;
    }

    public function getProfondeurMax(): ?int
    {
        return $this->profondeurMax;
    }

    public function setProfondeurMax(int $profondeurMax): self
    {
        $this->profondeurMax = $profondeurMax;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }


    public function getInfos(): ?string
    {
        return $this->infos;
    }

    public function setInfos(?string $infos): self
    {
        $this->infos = $infos;

        return $this;
    }

    public function getPrixPersonne(): ?string
    {
        return $this->prixPersonne;
    }

    public function setPrixPersonne(string $prixPersonne): self
    {
        $this->prixPersonne = $prixPersonne;

        return $this;
    }

    /**
     * @return Collection|ReservationPlongee[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(ReservationPlongee $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setPlongee($this);
        }

        return $this;
    }

    public function removeReservation(ReservationPlongee $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getPlongee() === $this) {
                $reservation->setPlongee(null);
            }
        }

        return $this;
    }


}
