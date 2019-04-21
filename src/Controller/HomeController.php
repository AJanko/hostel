<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home()
    {
        return $this->render('layout.html.twig',
            [
                'navigation' =>
                    [
                        'home' =>
                            [
                                'href' => '/',
                                'caption' => 'Home',
                            ],
                        'reservations' =>
                            [
                                'href' => '/reservations',
                                'caption' => 'Reservations',
                            ],
                        'orders' =>
                            [
                                'href' => '/orders',
                                'caption' => 'Orders',
                            ],
                    ]
            ]);
    }
}