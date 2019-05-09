<?php

namespace App\Controller\Forms;

use App\Entity\Room;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/room") */
class RoomController extends AbstractController
{
    /** @Route("/", name="room" ) */
    public function index()
    {
        return $this->render('room.html.twig', [
            'index' => true,
            'add_route' => [
              'href' => $this->generateUrl('add_room'),
              'name' => 'Add room',
            ],
            'edit_route' => [
                'name' => 'Edit rooms',
            ],
        ]);
    }

    /** @Route("/add", name="add_room") */
    public function add(Request $request)
    {
        return $this->render('room.html.twig', [
            'add' => true,
        ]);
    }

    /** @Route("/edit/{id}") */
    public function edit(Request $request, Room $room)
    {
        return $this->render('room.html.twig', [
            'edit' => true,
        ]);
    }

}