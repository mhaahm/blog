<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Articles;

class PageController
{
    /**
     * Undocumented function
     * Injection de dependance
     * Creation de la base de donnes avec sqllite
     *  ==> Il faut modifier le fichier .env
     * Route("/home",name="home")
     */
    public function index(Environment $twig,RegistryInterface $doctrine)
    {
        $listArticle = $doctrine->getRepository(Articles::class)->findAll();
        $content =  $twig->render("home/index.html.twig",
        [
            'articles' => $listArticle
        ]
    );
        return new Response($content);
    }
}

?>