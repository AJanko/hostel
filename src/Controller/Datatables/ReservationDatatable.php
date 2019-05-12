<?php

namespace App\Controller\Datatables;


use App\Entity\Reservation;
use Sg\DatatablesBundle\Datatable\AbstractDatatable;
use Sg\DatatablesBundle\Datatable\Column\ActionColumn;
use Sg\DatatablesBundle\Datatable\Column\Column;
use Sg\DatatablesBundle\Datatable\Column\DateTimeColumn;

class ReservationDatatable extends AbstractDatatable
{

    public function buildDatatable(array $options = array())
    {
        $this->ajax->set(['url' => $this->router->generate('list_reservation')]);

        $this->columnBuilder
            ->add('id', Column::class,
                [
                    'title'      => 'Id',
                    'searchable' => true,
                    'orderable'  => true,
                ]
            )
            ->add('person.name', Column::class,
                [
                    'title'      => 'Name',
                    'searchable' => true,
                    'orderable'  => true,
                ]
            )
            ->add('person.surname',  Column::class,
                [
                    'title'      => 'Surname',
                    'searchable' => true,
                    'orderable'  => true,
                ]
            )
            ->add('checkIn',  DateTimeColumn::class,
                [
                    'title'      => 'Check in',
                    'searchable' => true,
                    'orderable'  => true,
                ]
            )
            ->add('checkOut',  DateTimeColumn::class,
                [
                    'title'      => 'Check out',
                    'searchable' => true,
                    'orderable'  => true,
                ]
            )
            ->add('cost',  Column::class,
                [
                    'title'      => 'Cost',
                    'searchable' => true,
                    'orderable'  => true,
                ]
            )
            ->add('room.number',  Column::class,
                [
                    'title'      => 'Room number',
                    'searchable' => true,
                    'orderable'  => true,
                ]
            )
            ->add(
                null,
                ActionColumn::class,
                [
                    'title' => 'Actions',
                    'start_html' => '<div class="start_actions">',
                    'end_html' => '</div>',
                    'actions' => [
                        [
                            'route' => 'edit_reservation',
                            'label' => 'Edit Reservation',
                            'route_parameters' =>
                                [
                                    'id' => 'id',
                                ],
                            'attributes' =>
                                [
                                    'rel' => 'tooltip',
                                    'title' => 'Show',
                                    'class' => 'btn btn-primary btn-xs',
                                    'role' => 'button',
                                ],
                            'start_html' => '<div class="start_edit_action">',
                            'end_html' => '</div>',
                        ]
                    ]
                ]);

    }

    public function getEntity()
    {
        return Reservation::class;
    }

    public function getName()
    {
        return 'reservation_datatable';
    }
}