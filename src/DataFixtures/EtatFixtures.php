<?php

namespace App\DataFixtures;

use App\Entity\Etat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $Etat1 = new Etat();
        $Etat1 -> setLibelle('Ouverte');

        $manager->persist($Etat1);


        $manager->flush();
    }
}
