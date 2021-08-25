<?php

namespace App\Model;

use DateTime;

class ArticleManager
{

    private string $file = "/../articles.csv";

    public function getAllArticles(): array
    {
        $articles = [];
        $file = fopen($_SERVER['DOCUMENT_ROOT'] . $this->file, 'r');

        while (($data = fgetcsv($file)) !== false) {
            $article = new Article();
            $article->setId($data[0])
                    ->setTitle($data[1])
                    ->setAuthor($data[2])
                    ->setDate(new DateTime($data[3]))
                    ->setPicture($data[4])
                    ->setContent($data[5])
                    ;
            $articles[] = $article->toAssocArray();
        }

        fclose($file);
        return $articles;
    }
}
