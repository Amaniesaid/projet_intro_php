<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; //heritage
use Symfony\Component\HttpFoundation\Response; // C'est le type de retour de ma methode
use Symfony\Component\Routing\Annotation\Route; // Ce qui perment de definir les chemins d'accès dans le controller

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')] //C'est une annotation ce qui doit etre unique dans le projet c'est le nom de la route name 
    
    public function index(ArticleRepository $articleRepository): Response //type de retour de la méthode index response
    {

        $articles = $articleRepository->findAll();
        return $this->render('home/index.html.twig', [ //render renvoie la vue demandée par le controller on sible templates par défaut c'est ce que fait render
            //la home correspond à ce qu'il y'a dans templates c'est le chemin
            'controller_name' => 'HomeController', // on crée un tableau on met dedans toutes les variables qu'on enverra à la vue twig (ex on dit dans controller_name tu vas me mettre HomeController)
            'realisator' => 'Amanie',
            'articles' => $articles,
        ]);//ceci est un tableau associatif
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response 
    {
        return $this->render('home/contact.html.twig', [
            'contact_name' => 'Contact 1',
            'numero' => '0771164006'
        ]);

    }
}
