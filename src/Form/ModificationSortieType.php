<?php


namespace App\Form;

use App\Entity\Sortie;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModificationSortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom'
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
            ->add('siteOrganisateur', TextType::class, [
                'label' => 'siteOrganisateur'
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