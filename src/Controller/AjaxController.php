<?php

namespace App\Controller;

use App\Model\ArticleManager;

class AjaxController extends AbstractController
{
    public function __construct()
    {
        parent::__construct();

        header('Content-Type: application/json');
    }

    public function getArticles(): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectAll();

        return json_encode($articles);
    }

    public function getRandomArticle(): string
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->selectRandomOne();

        return json_encode($article);
    }

    public function searchArticles(string $search): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectArticlesBySearch($search);

        return json_encode($articles);
    }

    public function getArticleById(int $id): string
    {
        //TODO
        return "$id";
    }
}
