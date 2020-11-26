<?php

namespace App\Entity;

use App\Repository\ReservationBungalowRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationBungalowRepository::class)
 */
class ReservationBungalow
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
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $premiereValidation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $validationDefinitive;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Bungalow::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bungalow;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="reservationsBungalows")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPersonnes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getPremiereValidation(): ?bool
    {
        return $this->premiereValidation;
    }

    public function setPremiereValidation(bool $premiereValidation): self
    {
        $this->premiereValidation = $premiereValidation;

        return $this;
    }

    public function getValidationDefinitive(): ?bool
    {
        return $this->validationDefinitive;
    }

    public function setValidationDefinitive(bool $validationDefinitive): self
    {
        $this->validationDefinitive = $validationDefinitive;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getBungalow(): ?Bungalow
    {
        return $this->bungalow;
    }

    public function setBungalow(?Bungalow $bungalow): self
    {
        $this->bungalow = $bungalow;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getNbPersonnes(): ?int
    {
        return $this->nbPersonnes;
    }

    public function setNbPersonnes(int $nbPersonnes): self
    {
        $this->nbPersonnes = $nbPersonnes;

        return $this;
    }
}
