<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nantes = new Ville();
        $nantes->setNom('Nantes');
        $nantes->setCodePostal(34000);
        $manager->persist($nantes);
        $this ->addReference('villeNantes', $nantes);

        $manager->flush();
    }
}
