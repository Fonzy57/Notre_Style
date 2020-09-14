<?php

namespace App\Form;

use App\Entity\Appointment;
use DateTimeImmutable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormTypeInterface;

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
            ->add('endAt', DateTimeType::class, [
                'date_widget' => 'single_text',
                'hours' => range(9, 18),
                'minutes' => [00, 15, 30, 45],
            ])
            ->add('denomination')
            ->add('hairdresser', ChoiceType::class, [
                'label' => 'Coiffeuse',
                'choices' => [
                    'Aude' => 'Aude',
                    'Emilie' => 'Emilie'
                ]
            ])
            /* ->add('createdAt')
            ->add('createdBy')
            ->add('updatedAt')
            ->add('updatedBy') */
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
