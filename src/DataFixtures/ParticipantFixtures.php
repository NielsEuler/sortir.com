<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ParticipantFixtures extends Fixture
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




        $manager->persist($participant1);

        $manager->flush();
    }
}
