<?php

namespace App\Controller;

use App\Model\ArticleManager;

class AjaxController extends AbstractController
{

    public function articlesJson(): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectAll();

        return json_encode($articles);
    }

    public function randomArticleJson(): string
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->selectAll();

        return json_encode($articles[array_rand($articles)]);
    }

    public function searchArticlesJson(string $search): string
    {
        //TODO
        $articleManager = new ArticleManager();
        $articles = $articleManager->searchByKeyword($search);

        return json_encode($articles);
    }

    public function getArticleByIdJson(int $id): string
    {
        //TODO
        return "$id";
    }
}
