<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LieuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
/*        $lieu = new Lieu();
        $lieu->setNom('Nantes');
        $lieu->setRue('rue de paris');
        $lieu->setLongitude(85);
        $lieu->setLatitude(85);
        $lieu->setVille(12);



        $manager->persist($lieu);

        $manager->flush();*/
    }
}
