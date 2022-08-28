<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function Contact(UserInterface $user,Request $request): Response
    {
  
         if ($user){
         $user=$this->getUser();

         }

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->get('message')->getData();
            $subject =$form->get('message')->getData();

        }


        return $this->render('contact/contact.html.twig', [
            'sujet' => $subject,
            'message'=>$message
        ]);
    }
}