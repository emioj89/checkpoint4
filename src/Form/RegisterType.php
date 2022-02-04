<?php

namespace App\Form;

use App\Entity\User;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                ]),
                'attr' => [
                    'placeholder' => 'votre prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                ]),
                'attr' => [
                    'placeholder' => 'votre nom'
                ]
            ] )
            ->add('email', EmailType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 60,
                ]),
                'attr' => [
                    'placeholder' => 'jean@hotmail.fr'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le password doivent etre identique',
                'required' => true,
                'first_options' => [
                    'label' => 'password',
                    'attr'=>[
                        'placholder' => 'votre password'
                    ]
                ],
                'second_options' => [
                'label' => 'Confimez votre password',
                'attr'=>[
                    'placholder' => 'confirmez votre password'
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
