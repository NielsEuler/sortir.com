<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ParticipantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $participant1 = new Participant();
        $participant1->setNom('Dubois');
        $participant1->setActif(true);
        $participant1->setAdministrateur(false);
        $participant1->setEmail('paul@gmol.com');
        $participant1->setPrenom('Paul');
        $participant1->setTelephone(0600000000);
        $participant1->setPseudo('Polo');
        $participant1->setMotDePasse('Polo');
        $participant1->setCampusRattache($this->getReference('campus1'));
        $this ->addReference('participant1', $participant1);



        $manager->persist($participant1);

        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [CampusFixtures::class];
    }
}
