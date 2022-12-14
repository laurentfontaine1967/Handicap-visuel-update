<?php

namespace App\Controller\Articles\Auteur;

use App\Form\ArticleType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateMyArticleController extends AbstractController
{
    /**
     * @Route("/create", name="create_article")
     */
    public function create(Request $request, EntityManagerInterface $em, UserRepository $user): Response
    {

        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('danger', 'Vous devez être connecté pour écrire un post');
            return $this->redirectToRoute('app_login');
        }


        $form = $this->createForm(ArticleType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $article = $form->getData();
            $article->setUser($this->getUser());
            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'L\' article a bien eté ajouté');
            return $this->redirectToRoute('auteur_home');
        }

        return $this->render('article/create_article.html.twig', ['form' => $form->createView()]);
    }
}