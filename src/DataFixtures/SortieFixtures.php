<?php

namespace App\DataFixtures;

use App\Entity\Sortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SortieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $Sortie1 = new Sortie();
        $Sortie1 -> setNom('Disneyland');
        $Sortie1 -> setDateHeureDebut();
        $Sortie1 -> setDuree(2);
        $Sortie1 -> setDateLimiteInscription();
        $Sortie1 -> setNbInscriptionsMax(2);
        $Sortie1 -> setInfosSortie('week-end');
        $Sortie1 -> setEtatSortie();

        $manager->persist($Sortie1);



        $manager->flush();
    }
}
