<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,
                array('attr' => array('placeholder' => 'Votre email'),
                'constraints' => array(
                    new NotBlank(array("message" => "Merci d'inscrire un email valide."))
                    )
                )
            )
            ->add('nom', TextType::class,
                array('attr' => array('placeholder' => 'Votre nom'),
                    'constraints' => array(
                        new NotBlank(array("message" => "Merci d'ajouter votre nom"))
                    )
                ))
            ->add('password', PasswordType::class,
                array('attr' => array('placeholder' => 'Votre mot de passe'),
                    'constraints' => array(
                        new NotBlank(array("message" => 'Entre 6 et 126 caractères')),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Votre mot de passe est trop court : {{ limit }}',
                            // max length allowed by Symfony for security reasons
                            'max' => 126,
                            'maxMessage' => 'Votre mot de passe est trop long : {{ limit }}'
                        ])
                    )
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
        ]);
    }
}
