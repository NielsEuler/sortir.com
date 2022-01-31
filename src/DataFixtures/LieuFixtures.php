<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LieuFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $lieu1 = new Lieu();
        $lieu1->setVille($this -> getReference ('villeNantes'));
        $lieu1->setNom('Nantes');
        $lieu1->setRue('rue de paris');
        $lieu1->setLongitude(85);
        $lieu1->setLatitude(85);
        $this ->addReference('lieu1', $lieu1);

        $manager->persist($lieu1);

        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [VilleFixtures::class];
    }
}