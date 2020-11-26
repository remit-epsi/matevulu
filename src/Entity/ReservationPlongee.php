<?php

namespace App\Entity;

use App\Repository\ReservationPlongeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ReservationPlongeeRepository::class)
 */
class ReservationPlongee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\GreaterThan("today", message="Vous ne pouvez pas avoir une réservation avant aujourd'hui !")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\GreaterThan(propertyPath="dateDebut",message="La date de fin ne peut-être avant la date de début")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="integer")
     * @Assert\GreaterThan(0,message="Réservation minimum pour une personne")
     * @Assert\LessThan(5,message="Réservation maximum pour 4 personnes")
     */
    private $nbPersonnes;

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
     * @ORM\ManyToMany(targetEntity=Client::class, inversedBy="reservationsPlongees")
     */
    private $clients;

    /**
     * @ORM\ManyToOne(targetEntity=Plongee::class, inversedBy="reservations")
     */
    private $plongee;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

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

    public function getNbPersonnes(): ?int
    {
        return $this->nbPersonnes;
    }

    public function setNbPersonnes(int $nbPersonnes): self
    {
        $this->nbPersonnes = $nbPersonnes;

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

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->contains($client)) {
            $this->clients->removeElement($client);
        }

        return $this;
    }

    public function getPlongee(): ?Plongee
    {
        return $this->plongee;
    }

    public function setPlongee(?Plongee $plongee): self
    {
        $this->plongee = $plongee;

        return $this;
    }
}
