<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class MonProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,
                array('attr' => array('placeholder' => 'Votre email')
                )
            )

            ->add('motDePasse', PasswordType::class, [
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ne peut être laissé vide',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Mot de passe trop petit (minimum {{ limit }} characters)',
                        // max length allowed by Symfony for security reasons
                        'max' => 255,
                        'maxMessage' => 'Mot de passe trop grand (maximum {{ limit }} characters)'
                    ]),
                ],
            ])

            ->add('nom')

            ->add('prenom')

            ->add('telephone')

            ->add('pseudo')

            //->add('campusRattache')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
        ]);
    }
}
