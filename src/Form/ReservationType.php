<?php

namespace App\Form;


use App\Entity\Reservation;
use App\Entity\Room;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('person', PersonType::class)
            ->add('checkIn', DateType::class, [
                'format' => 'yy-MM-dd',
            ])
            ->add('checkOut', DateType::class, [
                'format' => 'yy-MM-dd',
            ])
            ->add('room', EntityType::class, [
                'class' => Room::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.number', 'ASC');
                },
                'choice_label' => function ($room) { return $room; },
            ])
            ->add('save', SubmitType::class, ['label' => 'Add reservation']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }

}