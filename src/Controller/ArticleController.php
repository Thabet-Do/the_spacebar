<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @Route("/",name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }
//    /**
//     * @Route("/news2/{slag}")
//     */
//    public function show2($slag)
//    {
//        return new Response(sprintf(
//            'Future page to show the article: "%s"',
//            $slag
//        ));
//    }
    /**
     * @Route("/news/{slag}",name="article_show")
     */
    public function show($slag)
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];
        return $this->render('article/show.html.twig',[
            'title'=>ucwords(str_replace('-',' ', $slag)),
            'comments'=>$comments
        ]);
    }
}