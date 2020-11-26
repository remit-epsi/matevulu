<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Un nom s.v.p")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Un prénom s.v.p")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Email(message="Il nous faut un mail valide")
     */
    private $mail;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     * @Assert\Length(min="10",minMessage="Un numéro à 10 chiffres",max="10",maxMessage="Un numéro à 10 chiffres")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Votre adresse s.v.p")
     */
    private $rue;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=0)
     * @Assert\Length(min="5",minMessage="Un code postal à 5 chiffres",max="5",maxMessage="Un code postal à 5 chiffres")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Une ville s.v.p")
     */
    private $ville;

    /**
     * @ORM\OneToMany(targetEntity=ReservationBungalow::class, mappedBy="client")
     */
    private $reservationsBungalows;

    /**
     * @ORM\ManyToMany(targetEntity=ReservationPlongee::class, mappedBy="clients")
     */
    private $reservationsPlongees;

    public function __construct()
    {
        $this->reservationsBungalows = new ArrayCollection();
        $this->reservationsPlongees = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection|ReservationBungalow[]
     */
    public function getReservationsBungalows(): Collection
    {
        return $this->reservationsBungalows;
    }

    public function addReservationsBungalow(ReservationBungalow $reservationsBungalow): self
    {
        if (!$this->reservationsBungalows->contains($reservationsBungalow)) {
            $this->reservationsBungalows[] = $reservationsBungalow;
            $reservationsBungalow->setClient($this);
        }

        return $this;
    }

    public function removeReservationsBungalow(ReservationBungalow $reservationsBungalow): self
    {
        if ($this->reservationsBungalows->contains($reservationsBungalow)) {
            $this->reservationsBungalows->removeElement($reservationsBungalow);
            // set the owning side to null (unless already changed)
            if ($reservationsBungalow->getClient() === $this) {
                $reservationsBungalow->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ReservationPlongee[]
     */
    public function getReservationsPlongees(): Collection
    {
        return $this->reservationsPlongees;
    }

    public function addReservationsPlongee(ReservationPlongee $reservationsPlongee): self
    {
        if (!$this->reservationsPlongees->contains($reservationsPlongee)) {
            $this->reservationsPlongees[] = $reservationsPlongee;
            $reservationsPlongee->addClient($this);
        }

        return $this;
    }

    public function removeReservationsPlongee(ReservationPlongee $reservationsPlongee): self
    {
        if ($this->reservationsPlongees->contains($reservationsPlongee)) {
            $this->reservationsPlongees->removeElement($reservationsPlongee);
            $reservationsPlongee->removeClient($this);
        }

        return $this;
    }
}
