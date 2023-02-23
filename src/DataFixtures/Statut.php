<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Statut extends Fixture
{
    public const STATUT_CREE = 'statut-cree';
    public const STATUT_PUBLIEE = 'statut-publiee';
    public const STATUT_CLOTUREE = 'statut-cloturee';
    public const STATUT_ENCOURS = 'statut-encours';
    public const STATUT_PASSEE = 'statut-passee';
    public const STATUT_ANNULEE = 'statut-annulee';
    public const STATUT_ARCHIVEE = 'statut-archivee';
    public const STATUT_COMPLETE = 'statut-complete';

    public function load(ObjectManager $manager): void
    {
        $creee = (new \App\Entity\Statut())
            ->setNom("Créée");
        $publiee = (new \App\Entity\Statut())
            ->setNom("Publiée");
        $cloturee = (new \App\Entity\Statut())
            ->setNom("Cloturée");
        $encours = (new \App\Entity\Statut())
            ->setNom("En cours");
        $passee = (new \App\Entity\Statut())
            ->setNom("Passée");
        $annulee = (new \App\Entity\Statut())
            ->setNom("Annulée");
        $archivee = (new \App\Entity\Statut())
            ->setNom("Archivée");
        $complete = (new \App\Entity\Statut())
            ->setNom("Complète");
        // Persist
        $manager->persist($creee);
        $manager->persist($publiee);
        $manager->persist($cloturee);
        $manager->persist($encours);
        $manager->persist($passee);
        $manager->persist($annulee);
        $manager->persist($archivee);
        $manager->persist($complete);
        // Flush
        $manager->flush();
        // Références
        $this->addReference(self::STATUT_CREE, $creee);
        $this->addReference(self::STATUT_PUBLIEE, $publiee);
        $this->addReference(self::STATUT_CLOTUREE, $cloturee);
        $this->addReference(self::STATUT_ENCOURS, $encours);
        $this->addReference(self::STATUT_PASSEE, $passee);
        $this->addReference(self::STATUT_ANNULEE, $annulee);
        $this->addReference(self::STATUT_ARCHIVEE, $archivee);
        $this->addReference(self::STATUT_COMPLETE, $complete);
    }
}
