<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'title' => 'Notre Style'
        ]);
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profil(UserInterface $user)
    {
        return $this->render('home/profil.html.twig', [
            'user' => $user
        ]);
    }
    
}
