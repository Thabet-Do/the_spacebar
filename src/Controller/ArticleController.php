<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('My First Page ');
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
     * @Route("/news/{slag}")
     */
    public function show($slag)
    {
        $comments = [
            '   Comment -_- 1 -_-',
            '   Comment -_- 2 -_-',
            '   Comment -_- 3 -_-',
        ];
        return $this->render('article/show.html.twig',[

            'title'=>ucwords(str_replace('-',' ', $slag)),
            'comments'=>$comments
        ]);
    }
}