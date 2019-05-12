<?php

namespace App\Controller\Datatables;


use App\Entity\Reservation;
use App\Form\ReservationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sg\DatatablesBundle\Response\DatatableResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reservations")
 */
class ReservationsController extends AbstractController
{
    /**
     * @Route("/list", name="list_reservation")
     * @Method("GET")
     */
    public function indexAction(Request $request, DatatableResponse $response, ReservationDatatable $datatable)
    {
        $datatable->buildDatatable();

        if ($request->isXmlHttpRequest()) {
            $response->setDatatable($datatable);
            $response->getDatatableQueryBuilder();

            return $response->getResponse();
        }

        return $this->render('list_reservations.html.twig', ['datatable' => $datatable]);
    }

    /**
     * @Route("/edit/{id}", requirements={"id" = "\d+"}, name="edit_reservation", options={"expose"=true}, methods="GET")
     */
    public function editAction(Reservation $reservation)
    {
        $form = $this->createForm(
            ReservationType::class,
            $reservation,
            [
                'action' => $this->generateUrl('update_reservation', ['id' => $reservation->getId()]),
                'method' => 'PUT',
            ]
        );

        return $this->render('reservation.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/edit/{id}", requirements={"id" = "\d+"}, name="update_reservation", methods="PUT")
     */
    public function updateAction(Reservation $reservation, Request $request)
    {
        $form = $this->createForm(
            ReservationType::class,
            $reservation,
            [
                'action' => $this->generateUrl('update_reservation', ['id' => $reservation->getId()]),
                'method' => 'PUT',
            ]
        );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('list_reservation');
        }


        return $this->render('reservation.html.twig', ['form' => $form->createView()]);
    }

}