<?php

namespace App\Controller\Forms;

use App\Entity\Reservation;
use App\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservations", name="reservations")
     */
    public function reservations(Request $request)
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);

//        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $reservation = $form->getData();
            $reservation['date'] = new \DateTime('now');

            var_dump($reservation);exit;

//            $reservation['cost'] = ($reservation['checkOut'] - $reservation['checkIn']) * $reservation['room']->getPrice(); - or['price']

            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('reservation_succes');
        }

        return $this->render('reservation.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}