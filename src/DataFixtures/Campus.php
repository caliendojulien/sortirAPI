<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class Campus extends Fixture
{

    public const CAMPUS_FARADAY = 'faraday';
    public const CAMPUS_CHARTRES = 'chartres de bretagne';

    public function load(ObjectManager $manager): void
    {
        $faraday = (new \App\Entity\Campus())
            ->setNom("Faraday");
        $chartres = (new \App\Entity\Campus())
            ->setNom("Chartres de Bretagne");
        // Persist
        $manager->persist($faraday);
        $manager->persist($chartres);
        // Flush
        $manager->flush();
        // Réferences
        $this->addReference(self::CAMPUS_FARADAY, $faraday);
        $this->addReference(self::CAMPUS_CHARTRES, $chartres);
    }
}
