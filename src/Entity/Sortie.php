<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\SortieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SortieRepository::class)]
#[ApiResource]
#[GetCollection(
    normalizationContext: ['groups' => ['sortie']]
)]
#[Get]
class Sortie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['sortie'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['sortie'])]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['sortie'])]
    private ?\DateTimeInterface $debut = null;

    #[ORM\Column]
    #[Groups(['sortie'])]
    private ?int $duree = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['sortie'])]
    private ?\DateTimeInterface $limiteInscription = null;

    #[ORM\Column]
    #[Groups(['sortie'])]
    private ?int $participantsMax = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['sortie'])]
    private ?string $informations = null;

    #[ORM\ManyToOne(inversedBy: 'sortiesOrganisees')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['sortie'])]
    private ?Stagiaire $organisateur = null;

    #[ORM\ManyToMany(targetEntity: Stagiaire::class, inversedBy: 'sorties')]
    #[Groups(['sortie'])]
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

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): static
    {
        $this->debut = $debut;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getLimiteInscription(): ?\DateTimeInterface
    {
        return $this->limiteInscription;
    }

    public function setLimiteInscription(\DateTimeInterface $limiteInscription): static
    {
        $this->limiteInscription = $limiteInscription;

        return $this;
    }

    public function getParticipantsMax(): ?int
    {
        return $this->participantsMax;
    }

    public function setParticipantsMax(int $participantsMax): static
    {
        $this->participantsMax = $participantsMax;

        return $this;
    }

    public function getInformations(): ?string
    {
        return $this->informations;
    }

    public function setInformations(string $informations): static
    {
        $this->informations = $informations;

        return $this;
    }

    public function getOrganisateur(): ?Stagiaire
    {
        return $this->organisateur;
    }

    public function setOrganisateur(?Stagiaire $organisateur): static
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

    public function addParticipant(Stagiaire $participant): static
    {
        if (!$this->participants->contains($participant)) {
            $this->participants->add($participant);
        }

        return $this;
    }

    public function removeParticipant(Stagiaire $participant): static
    {
        $this->participants->removeElement($participant);

        return $this;
    }

}
