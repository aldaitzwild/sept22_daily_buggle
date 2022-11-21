<?php

namespace App\Model;

class ArticleManager extends AbstractManager
{
    public const TABLE = 'Article';

    public function selectRandomOne(): array
    {
        $statement = $this->pdo->query("SELECT * FROM " . static::TABLE . " ORDER BY RAND() LIMIT 1");

        return $statement->fetch();
    }

    public function selectArticlesBySearch(string $search): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE title LIKE :search");
        $statement->bindValue(':search', '%' . $search . '%', \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
}
