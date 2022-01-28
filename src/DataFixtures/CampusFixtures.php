<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CampusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $nantes = new Campus();
        $nantes->setNom('Campus de Nantes');

        $manager->persist($nantes);
        $manager->flush();
    }
}
