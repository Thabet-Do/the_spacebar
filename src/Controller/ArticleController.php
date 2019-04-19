<?php

namespace App\Controller;


use App\Entity\Product;
use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    /**
     * @Route("/news/{slug}",name="article_show")
     */
    public function show($slug, MarkdownInterface $markdown)
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];
        $articleContent = <<<EOF
picy **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow,
orem proident [beef ribs](https://baconipsum.com/) aute enim veniam ut cillum pork chuck picanha. Dolore reprehenderit
abore minim pork belly spare ribs cupim short loin in. Elit exercitation eiusmod dolore cow
urkey shank eu pork belly meatball non cupim.
Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur
laboris sunt venison, et laborum dolore minim non meatball. Shankle eu flank aliqua shoulder,
capicola biltong frankfurter boudin cupim officia. Exercitation fugiat consectetur ham. Adipisicing
picanha shank et filet mignon pork belly ut ullamco. Irure velit turducken ground round doner incididunt
occaecat lorem meatball prosciutto quis strip steak.
Meatball adipisicing ribeye bacon strip steak eu. Consectetur ham hock pork hamburger enim strip steak
mollit quis officia meatloaf tri-tip swine. Cow ut reprehenderit, buffalo incididunt in filet mignon
strip steak pork belly aliquip capicola officia. Labore deserunt esse chicken lorem shoulder tail consectetur
cow est ribeye adipisicing. Pig hamburger pork belly enim. Do porchetta minim capicola irure pancetta chuck
fugiat.
EOF;

        $articleContent = $markdown->transform($articleContent);

        return $this->render('article/show.html.twig',[
            'title'=>ucwords(str_replace('-',' ', $slug)),
            'slug'=>$slug,
            'comments'=>$comments,
            'articleContent' => $articleContent,
        ]);

    }


    /**
     * @Route("/news/{slug}/hart",name="article_toggle-hart", methods={"POST"})
     */
    public function togglenArticleHart($slug, LoggerInterface $logger)
    {
        // TODO - article hart/unhart the article

        $logger->info('Article has been hearted');

        return new JsonResponse(['hart' => rand(5,100)]);
    }

    /**
     * @Route("/show/{id}")
     */
    public function showProduct(Product $product)
    {
        return new Response();
    }
}