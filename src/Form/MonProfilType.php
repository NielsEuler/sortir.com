<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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

            ->add('plainPassword', RepeatedType::class, [
                // Ajouts pour le type Repeated
                // Doivent être placés au début
                'type' => PasswordType::class,
                'invalid_message' => 'Les valeurs pour les champs mots de passe doivent être identiques.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Répétez le mot de passe'],

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

            ->add('nom', TextType::class,
                array('attr' => array('placeholder' => 'Votre nom'),
                    'constraints' => array(
                        new NotBlank(array("message" => "Ne peut être laissé vide"))
                    )
                ))

            ->add('prenom', TextType::class,
                array('attr' => array('placeholder' => 'Votre prénom'),
                    'constraints' => array(
                        new NotBlank(array("message" => "Ne peut être laissé vide"))
                    )
                ))

            ->add('telephone')

            ->add('pseudo', TextType::class,
                array('attr' => array('placeholder' => 'Votre pseudo'),
                    'constraints' => array(
                        new NotBlank(array("message" => "Ne peut être laissé vide"))
                    )
                ))

            ->add('photo', FileType::class,[
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
        ]);
    }
}
