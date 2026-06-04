<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Article;


final class ManipulerBddController extends AbstractController
{
    #[Route('/manipuler/bdd', name: 'app_manipuler_bdd')]
    public function index(EntityManagerInterface $em): Response
    {

        $article = new Article();
        $article->setTitle("Mon premier article !");
        $article->setContent("Le contenu de mon superbe article de blog.");
        $em->persist($article);
        $em->flush();

        return $this->render('manipuler_bdd/index.html.twig', [
            'controller_name' => 'ManipulerBddController',
        ]);
    }
}
