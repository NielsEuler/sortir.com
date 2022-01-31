<?php

namespace App\DataFixtures;

use App\Entity\Etat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $etat1 = new Etat();
        $etat1 -> setLibelle('Ouverte');
        $manager->persist($etat1);
        $this ->addReference('etat1', $etat1);


        $manager->flush();
    }
}
