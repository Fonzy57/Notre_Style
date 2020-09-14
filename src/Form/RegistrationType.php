<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('roles', CollectionType::class, [
                'entry_type' => ChoiceType::class,
                'entry_options' => [
                    'label' => false,
                    'choices' => [
                        'Admin' => 'ROLE_ADMIN',
                        'User' => 'ROLE_USER'
                    ]
                ]
            ])
            ->add('password', PasswordType::class)
            ->add('confirmPassword', PasswordType::class)
            ->add('lastName', TextType::class)
            ->add('firstName', TextType::class)
            ->add('phone', TelType::class, [
                'help' => 'Entrez le numéro de téléphone sans espaces'
            ])
            ->add('createdBy', ChoiceType::class, [
                'choices' => [
                'Aude' => 'Aude',
                'Emilie' => 'Emilie'
                ]
                ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Le client accepte d\'enregistrer son numéro de téléphone',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Le client doit accepter que son numéro de téléphone soit enregistré',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
