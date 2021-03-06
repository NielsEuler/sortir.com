<?php

namespace App\Form;

use App\Entity\Sortie;
use Doctrine\ORM\Query\Expr\Select;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ArrayChoiceList;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AfficherSortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la sortie'
            ])
            ->add('dateHeureDebut', DateTimeType::class, [
                'label' => 'dateHeureDebut'
            ])
            ->add('dateLimiteInscription', DateType::class, [
                'label' => 'dateLimiteInscription'
            ])

            ->add('nbInscriptionsMax', IntegerType::class, [
                'label' => 'nbInscriptionsMax'
            ])

            ->add('duree', IntegerType::class, [
                'label' => 'duree'
            ])
            ->add('infosSortie', TextType::class, [
                'label' => 'infosSortie'
            ])
            ->add('siteOrganisateur', TextType::class, [
                'label' => 'siteOrganisateur'
            ])
            ->add('lieuSortie', TextType::class, [
                'label' => 'lieuSortie'
            ])

            ->add('participants', ChoiceType::class, [
                'label' => 'participants'
            ])
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,

        ]);
    }
}
