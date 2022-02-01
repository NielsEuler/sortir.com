<?php
namespace App\Controller;

use App\Entity\Sortie;
use App\Form\CreerSortieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * @Route("/profiles", name="main_profiles")
     */
    public function profiles() {
        return $this->render("main/profiles.html.twig");
    }

    /**
     * @Route("/creerSortie", name="main_creerSortie")
     */
    public function creerSortie() {
        $sortie1 = new Sortie();
        $sortie1Form = $this->createForm(CreerSortieType::class, $sortie1);

        return $this->render("main/creerSortie.html.twig" , [
                'sortie1Form' => $sortie1Form->createView()
        ]);
    }


}