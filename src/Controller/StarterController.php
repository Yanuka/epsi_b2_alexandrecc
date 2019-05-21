<?php

namespace App\Controller;

use App\Entity\Pokemon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StarterController extends AbstractController
{
    /**
     * @Route("/starter", name="starter")
     */
    public function index()
    {
        $pokemon = $this->getDoctrine()->getRepository(Pokemon::class)->findStarter();

        return $this->render('starter/index.html.twig', [
            'starter' => $pokemon,

        ]);
    }
}
