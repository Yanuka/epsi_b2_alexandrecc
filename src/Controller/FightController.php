<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FightController extends AbstractController
{
    /**
     * @Route("/fight", name="fight")
     */
    public function index()
    {
        return $this->render('fight/index.html.twig', [
            'controller_name' => 'FightController',
        ]);
    }
}
