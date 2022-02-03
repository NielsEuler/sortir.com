<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class MonProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, array(
                'help' => 'Email de contact',
                'label' => 'Votre email :',
                'attr' => array('placeholder' => 'Ne peut être laissé vide'),
                    'required' => true,
                    'constraints' => array(
                        new NotBlank(array("message" => "Ne peut être laissé vide"))
                    )
                )
            )

            ->add('motDePasse', RepeatedType::class, [
                // Ajouts pour le type Repeated

                // Doivent être placés au début
                'type' => PasswordType::class,
                'invalid_message' => 'Les valeurs pour les champs mots de passe doivent être identiques.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => [
                    'label' => 'Votre mot de passe :',
                    'attr' => array('placeholder' => 'Minimum de 6 caractères'),
                ],
                'second_options' => [
                    'label' => 'Répétez le mot de passe'],

                // Code généré par la commande 'make:registration-form'
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank(
                        [
                        'message' => 'Mot de passe obligatoire'
                        ]
                    ),
                    new Length(
                        [
                        'min' => 6,
                        'minMessage' => 'Le mot de passe doit avoir une longueur minimum de {{ limit }} caractères.',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096
                        ]
                    ),
                    // Ajout de la regex :
                    new Regex(
                        [
                            'pattern' => '/"^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$"/',
                            'message' => 'Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre et un caractère spécial (autorisé : @, $, !, %, *, #, ?, &)'
                        ]
                    )
                ],
            ])

            ->add('nom', TextType::class, [
                    'attr' => array('placeholder' => 'Ne peut être laissé vide'),
                    'label' => 'Votre nom :',
                    'constraints' => array(
                        new NotBlank(array("message" => "Ne peut être laissé vide"))
                    )
                ])

            ->add('prenom', TextType::class, [
                'required' => false,
                'label' => 'Votre prénom :'
                ])

            ->add('telephone',TelType::class,[
                'label' => 'Votre téléphone :',
                'required' => false,
                'mapped' => false
                ])

            ->add('pseudo', TextType::class,[
                'attr' => array('placeholder' => 'Ne peut être laissé vide'),
                'label' => 'Votre pseudo :',
                'constraints' => array(
                        new NotBlank(array("message" => "Ne peut être laissé vide"))
                    )
                ])

            ->add('photo', FileType::class,[
                'label' => 'Votre photo :',
                'required' => false,
                'mapped' => false
            ])

            ->add('campusRattache',TextType::class, [
                'label' => 'Votre campus :',
                'attr' => array('placeholder' => 'Veuillez indiquer votre Campus'),
                'required' => false,
                'mapped' => false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participant::class
        ]);
    }
}
