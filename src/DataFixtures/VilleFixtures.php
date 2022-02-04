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

        $ville2 = new Ville();
        $ville2->setNom('Washington');
        $ville2->setCodePostal(36000);
        $manager->persist($ville2);
        $this ->addReference('Washington', $ville2);

        $manager->flush();
    }
}
