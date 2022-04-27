<?php

namespace App\Controller;

use App\Model\ArticleManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index()
    {
        return $this->twig->render('Home/index.html.twig');
    }

    /**
     * Show one article on home page
     */
    public function show(int $id)
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->selectOneById($id);

        return $this->twig->render('Home/show.html.twig', ['article' => $article]);
    }
}
