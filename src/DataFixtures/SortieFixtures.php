<?php

namespace App\DataFixtures;

use App\Entity\Sortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SortieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $Sortie1 = new Sortie();
        $Sortie1 -> setNom('Disneyland');
        $Sortie1 -> setDateHeureDebut(new \DateTime());
        $Sortie1 -> setDuree(2);
        $Sortie1 -> setDateLimiteInscription(new \DateTime());
        $Sortie1 -> setNbInscriptionsMax(2);
        $Sortie1 -> setInfosSortie('week-end');
        $Sortie1 -> setEtatSortie($this->getReference('etat1'));
        $Sortie1 -> setSiteOrganisateur($this->getReference('campus1'));
        $Sortie1 -> setLieuSortie($this->getReference('lieu1'));
        $Sortie1 -> setOrganisateur($this->getReference('participant1'));
        $manager->persist($Sortie1);

        $Sortie2 = new Sortie();
        $Sortie2 -> setNom('ParcAsterix');
        $Sortie2 -> setDateHeureDebut(new \DateTime());
        $Sortie2 -> setDuree(3);
        $Sortie2 -> setDateLimiteInscription(new \DateTime());
        $Sortie2 -> setNbInscriptionsMax(2);
        $Sortie2 -> setInfosSortie('automne');
        $Sortie2 -> setEtatSortie($this->getReference('etat2'));
        $Sortie2 -> setSiteOrganisateur($this->getReference('campus2'));
        $Sortie2 -> setLieuSortie($this->getReference('lieu2'));
        $Sortie2-> setOrganisateur($this->getReference('participant2'));
        $manager->persist($Sortie2);



        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [EtatFixtures::class];
        //[LieuFixtures::class];
    }
}
