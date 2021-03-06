<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CampusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $campus1 = new Campus();
        $campus1->setNom('campus1');
        $this ->addReference('campus1', $campus1);
        $manager->persist($campus1);
        $manager->flush();

        $campus2 = new Campus();
        $campus2->setNom('campus2');
        $this ->addReference('campus2', $campus2);
        $manager->persist($campus2);
        $manager->flush();
    }
}
