<?php

namespace App\Controller;

use App\Form\ArticleType;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ArticleController extends AbstractController
{
    #[IsGranted('ROLE_USER')] //Pour valider si l'utilisateur a le droit d'acceder à cette page tous les utilisatuers connéctés ont le role user
    #[Route('/addarticle', name: 'add_article')]
    public function add(): Response
    {
        $article = new Article();
        $article->setAuteur($this->getUser()); //cookie personne connéctée 
        $article->setDateCreation(new \DateTime());


        $form = $this->createForm(ArticleType::class, $article);
        return $this->render('article/add.html.twig', [
            'controller_name' => "Ajout article",
            'form' => $form,
        ]);
    }


}