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

        $lieu2 = new Lieu();
        $lieu2->setVille($this -> getReference ('Washington'));
        $lieu2->setNom('Washington');
        $lieu2->setRue('rue de George');
        $lieu2->setLongitude(120);
        $lieu2->setLatitude(132);
        $this ->addReference('lieu2', $lieu2);

        $manager->persist($lieu2);

        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [VilleFixtures::class];
    }
}