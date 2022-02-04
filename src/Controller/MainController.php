<?php
namespace App\Controller;

use App\Entity\Campus;
use App\Entity\Lieu;
use App\Entity\Participant;
use App\Entity\Sortie;
use App\Entity\Ville;
use App\Form\AfficherProfilType;
use App\Form\AfficherSortieType;
use App\Form\AnnulationSortieType;
use App\Form\CreerSortieType;
use App\Form\GestionSitesType;

use App\Form\GestionVillesType;
use App\Form\LieuType;
use App\Form\ModificationSortieType;
use App\Form\MonProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home() {
        return $this->render("main/home.html.twig");
    }

    /**
     * @Route("/profiles", name="main_monProfil")
     */
    public function profile(Request $request, EntityManagerInterface $entityManager) {
        $profilUser = new Participant();
        $updateProfil = $this->createForm(MonProfilType::class, $profilUser);

        $updateProfil->handleRequest($request);
        if($updateProfil->isSubmitted() && $updateProfil->isValid()){
            $entityManager->persist($profilUser);
            $entityManager->flush();
            return $this->redirectToRoute("main_home");
        }

        return $this->render("main/monProfil.html.twig" ,[
            'updateProfil' => $updateProfil->createView(),
        ]);
    }

    /**
     * @Route("/creerSortie", name="main_creerSortie")
     */
    public function creerSortie(Request $request, EntityManagerInterface $entityManager) {
        $sortie1 = new Sortie();
        $sortie1Form = $this->createForm(CreerSortieType::class, $sortie1);

        $sortie1Form->handleRequest($request);
        if($sortie1Form->isSubmitted() && $sortie1Form->isValid()){
            $entityManager->persist($sortie1);
            $entityManager->flush();
            return $this->redirectToRoute("main_home");
        }

         return $this->render("main/creerSortie.html.twig" , [

            'sortie1Form' => $sortie1Form->createView(),
         ]);
    }

    /**
     * @Route("/afficherSortie", name="main_afficherSortie")
     */
    public function afficherSortie() {
        $sortie1 = new Sortie();
        $sortie1Form = $this->createForm(AfficherSortieType::class, $sortie1);

        return $this->render("main/afficherSortie.html.twig" , [
            'sortie1Form' => $sortie1Form->createView(),
        ]);
    }

    /**
     * @Route("/afficherProfil", name="main_afficherProfil")
     */
    public function afficherProfil() {
        $participant1 = new Participant();
        $participant1Form = $this->createForm(AfficherProfilType::class, $participant1);

        return $this->render("main/afficherProfil.html.twig" , [
            'participant1Form' => $participant1Form->createView(),
        ]);
    }

    /**
     * @Route("/annulationSortie", name="main_annulationSortie")
     */
    public function annulationSortie() {
        $sortie1 = new sortie();
        $sortie1Form = $this->createForm(annulationSortieType::class, $sortie1);

        return $this->render("main/annulationSortie.html.twig" , [
            'sortie1Form' => $sortie1Form->createView(),
        ]);
    }

    /**
     * @Route("/gestionSites", name="main_gestionSites")
     */
    public function gestionSites() {
        $campus1 = new campus();
        $campus1Form = $this->createForm(gestionSitesType::class, $campus1);

        return $this->render("main/gestionSites.html.twig" , [
            'campus1form' => $campus1Form->createView(),
        ]);
    }

    /**
     * @Route("/gestionVilles", name="main_gestionVilles")
     */
    public function gestionVilles() {
        $ville1 = new ville();
        $ville1Form = $this->createForm(gestionVillesType::class, $ville1);

        return $this->render("main/gestionVilles.html.twig" , [
            'ville1form' => $ville1Form->createView(),
        ]);
    }

    /**
     * @Route("/modificationSortie", name="main_modificationSortie")
     */
    public function modificationSortie() {
        $sortie1 = new sortie();
        $updateSortieForm = $this->createForm(modificationSortieType::class, $sortie1);

        return $this->render("main/modificationSortie.html.twig" , [
           'updateSortieForm' => $updateSortieForm->createView(),

        ]);
    }
}