<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Services;
use App\Entity\Appointment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginAt', DateTimeType::class, [
                'label' => 'Jour et heure du rendez-vous',
                'date_widget' => 'single_text',
                'hours' => range(9, 17),
                'minutes' => [00, 15, 30, 45],
            ])
            ->add('hairdresser', ChoiceType::class, [
                'label' => 'Coiffeuse',
                'choices' => [
                    'Aude' => 'Aude',
                    'Emilie' => 'Emilie'
                ]
            ])
            ->add('user', EntityType::class, [
                'label' => 'Client',
                'class' => User::class,
                'choice_label' => 'lastname'
            ])
            ->add('services', EntityType::class, [
                'label' => 'Service',
                'class' => Services::class,
                'choice_label' => 'denomination'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
