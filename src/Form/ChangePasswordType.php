<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true
            ])
            ->add('firstname', TextType::class, [
                'disabled' => true,
                'label' => 'Prénom'
            ] )
            ->add('lastname', TextType::class, [
                'disabled' => true,
                'label' => 'Nom'
            ] )
            ->add('old_password', PasswordType::class, [
                'mapped' => false,
                'label' => 'password actuel',
                'attr' =>[
                    'placeholder' => 'votre password actuel'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'Le password doivent etre identique',
                'label' => 'Nouveau password',
                'required' => true,
                'first_options' => [
                    'label' => 'Nouveau password',
                    'attr'=>[
                        'placholder' => 'votre nouveau password'
                    ]
                ],
                'second_options' => [
                'label' => 'Confimez votre nouveau password',
                'attr'=>[
                    'placholder' => 'confirmez votre nouveau password'
                ]
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label'=> 'Confirmer'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
