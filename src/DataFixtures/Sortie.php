<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class Sortie extends Fixture implements DependentFixtureInterface
{

    public const SORTIE_BOWLING = 'bowling';
    public const SORTIE_KARTING = 'karting';

    public function load(ObjectManager $manager): void
    {
        $bowling = (new \App\Entity\Sortie())
            ->setNom("Bowling")
            ->setDebut(new \DateTime())
            ->setDuree(90)
            ->setInformations("Un bowling quoi, normal")
            ->setOrganisateur($this->getReference(Stagiaire::STAGIAIRE_BOB))
            ->addParticipant($this->getReference(Stagiaire::STAGIAIRE_ALICE))
            ->setLimiteInscription(new \DateTime('2023-04-07 15:00:00'))
            ->setParticipantsMax(3);
        $karting = (new \App\Entity\Sortie())
            ->setNom("Karting")
            ->setDebut(new \DateTime())
            ->setDuree(60)
            ->setInformations("Un karting quoi, normal")
            ->setOrganisateur($this->getReference(Stagiaire::STAGIAIRE_ALICE))
            ->setLimiteInscription(new \DateTime('2023-04-07 16:00:00'))
            ->setParticipantsMax(9);
        // Persist
        $manager->persist($bowling);
        $manager->persist($karting);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            Stagiaire::class
        ];
    }
}
