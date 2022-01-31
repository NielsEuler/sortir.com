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
        $lieu = new Lieu();
        $lieu->setVille($this -> getReference ('villeNantes'));
        $lieu->setNom('Nantes');
        $lieu->setRue('rue de paris');
        $lieu->setLongitude(85);
        $lieu->setLatitude(85);

        $manager->persist($lieu);

        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [VilleFixtures::class];
    }
}