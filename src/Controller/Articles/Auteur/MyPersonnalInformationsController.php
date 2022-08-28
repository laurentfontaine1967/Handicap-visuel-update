<?php

namespace App\Controller\Articles\Auteur;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MyPersonnalInformationsController extends AbstractController
{
    /**
     * @Route("auteur/mes-informations", name="mes-informations")
     */
    public function Informations(UserRepository $userRepository)
    {
        $user = $this->getUser();

        return $this->render('auteur/mypersonnal.html.twig', ['user' => $user]);
    }
}