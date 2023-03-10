<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SortieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SortieRepository::class)]
#[ApiResource]
class Sortie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $debut = null;

    #[ORM\Column]
    private ?int $duree = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $limiteInscription = null;

    #[ORM\Column]
    private ?int $participantsMax = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $informations = null;

    #[ORM\ManyToOne(inversedBy: 'sorties')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Stagiaire $organisateur = null;

    #[ORM\ManyToMany(targetEntity: Stagiaire::class, inversedBy: 'sorties')]
    private Collection $participants;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
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

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getLimiteInscription(): ?\DateTimeInterface
    {
        return $this->limiteInscription;
    }

    public function setLimiteInscription(\DateTimeInterface $limiteInscription): self
    {
        $this->limiteInscription = $limiteInscription;

        return $this;
    }

    public function getParticipantsMax(): ?int
    {
        return $this->participantsMax;
    }

    public function setParticipantsMax(int $participantsMax): self
    {
        $this->participantsMax = $participantsMax;

        return $this;
    }

    public function getInformations(): ?string
    {
        return $this->informations;
    }

    public function setInformations(?string $informations): self
    {
        $this->informations = $informations;

        return $this;
    }

    public function getOrganisateur(): ?Stagiaire
    {
        return $this->organisateur;
    }

    public function setOrganisateur(?Stagiaire $organisateur): self
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    /**
     * @return Collection<int, Stagiaire>
     */
    public function getParticipants(): Collection
    {
        return $this->participants;
    }

    public function addParticipant(Stagiaire $participant): self
    {
        if (!$this->participants->contains($participant)) {
            $this->participants->add($participant);
        }

        return $this;
    }

    public function removeParticipant(Stagiaire $participant): self
    {
        $this->participants->removeElement($participant);

        return $this;
    }
}
