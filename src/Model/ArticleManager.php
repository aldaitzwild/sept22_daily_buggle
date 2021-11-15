<?php

namespace App\Model;

class ArticleManager extends AbstractManager
{
    public const TABLE = 'Article';

    public function searchByKeyword(string $search): array
    {
        $search = "%$search%";
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE title LIKE :keyword");
        $statement->bindValue(':keyword', $search, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
}
