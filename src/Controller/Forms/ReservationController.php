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
    public function new(Request $request)
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $reservation = $form->getData();

            $checkIn = $reservation->getCheckIn();
            $checkOut = $reservation->getCheckOut();
            $price = $reservation->getRoom()->getPrice();

            $cost = $checkOut->diff($checkIn)->days * $price;

            $reservation->setCost($cost);
            $reservation->setDate(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('reservations');
        }

        return $this->render('reservation.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}