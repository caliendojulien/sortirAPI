<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SortieFixtures extends Fixture
{

    private $faker;

    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('FR-fr');
    }
}
