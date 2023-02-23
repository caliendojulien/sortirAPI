<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class Stagiaire extends Fixture implements DependentFixtureInterface
{

    public const STAGIAIRE_BOB = 'bob';
    public const STAGIAIRE_ALICE = 'alice';

    public function load(ObjectManager $manager): void
    {
        $bob = (new \App\Entity\Stagiaire())
            ->setNom('Morane')
            ->setPrenom('Bob')
            ->setCampus($this->getReference(Campus::CAMPUS_FARADAY))
            ->setEmail('bob.morane@eni.fr')
            ->setEstActif(true)
            ->setEstAdmin(true)
            // 123456
            ->setPassword('$2y$13$.Klo.UFZplSFm.vmLkuVsuB5flWaFqcpd.oty0mmuiTlQu29L.2S6')
            ->setRoles(["ROLE_ADMIN"]);
        $alice = (new \App\Entity\Stagiaire())
            ->setNom('Ca glisse')
            ->setPrenom('Alice')
            ->setCampus($this->getReference(Campus::CAMPUS_CHARTRES))
            ->setEmail('alice.caglisse@eni.fr')
            ->setEstActif(true)
            ->setEstAdmin(false)
            // 123456
            ->setPassword('$2y$13$.Klo.UFZplSFm.vmLkuVsuB5flWaFqcpd.oty0mmuiTlQu29L.2S6')
            ->setRoles(["ROLE_USER"]);
        // Persist
        $manager->persist($bob);
        $manager->persist($alice);
        // Flush
        $manager->flush();
        // références
        $this->addReference(self::STAGIAIRE_BOB, $bob);
        $this->addReference(self::STAGIAIRE_ALICE, $alice);
    }

    public function getDependencies(): array
    {
        return [
            Campus::class
        ];
    }
}
