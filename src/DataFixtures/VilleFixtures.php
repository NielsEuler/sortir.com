<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ville1 = new Ville();
        $ville1->setNom('Nantes');
        $ville1->setCodePostal(34000);
        $manager->persist($ville1);
        $this ->addReference('villeNantes', $ville1);

        $manager->flush();
    }
}
