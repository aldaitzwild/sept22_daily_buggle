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
        //TODO
        return "";
    }

    public function searchArticlesJson(string $search): string
    {
        //TODO
        return "$search";
    }

    public function getArticleByIdJson(int $id): string
    {
        //TODO
        return "$id";
    }
}
