<?php

namespace App\Form\Type;

use App\DTO\TicketDTO;
use App\Entity\Flight;
use App\Entity\Passenger;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('flight', EntityType::class, [
                'class' => Flight::class,
                'choice_label' => function ($flight) {
                    return $flight->getFlightData();
                },
                'label' => 'Рейс',
                'choices' => $options['activeFlights']
            ])
            ->add('passenger', EntityType::class, [
                'class' => Passenger::class,
                'choice_label' => function ($passenger) {
                    return $passenger->getFullPassengerData();
                },
                'label' => 'Пассажир'
            ])
            ->add('flightDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Дата',
                'attr' => array(
                    'min' => date('Y-m-d')
                )
            ])
            ->add('buy', SubmitType::class, ['label' => 'Купить']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TicketDTO::class,
        ])
            ->setRequired('activeFlights');
    }
}