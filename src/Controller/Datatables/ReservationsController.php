<?php

namespace App\Controller\Datatables;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sg\DatatablesBundle\Response\DatatableResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reservations/list")
 */
class ReservationsController extends AbstractController
{
    /**
     * @Route("/", name="list_reservation")
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

        return $this->render('list_reservations.html.twig', array(
            'datatable' => $datatable,
        ));
    }
}