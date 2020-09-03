<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'Notre Style'
        ]);
    }


    // A VOIR SI ON GARDE ÇA OU PAS !!!!!
    /**
     * @Route("/profil", name="profil")
     */
    public function profil()
    {
        return $this->render('home/profil.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'Votre profil'
        ]);
    }
    
}
