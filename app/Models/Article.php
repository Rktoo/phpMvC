<?php

namespace app\Models\Article;

use PDO;

class Article
{
    private $db;
    public function __construct($db)
    {
        $this->db = new PDO("sqlite:" . DB_PATH);
    }

    public function getAllArticles()
    {
        $stmt = $this->db->prepare('SELECT * FROM articles');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getArticlePerPage($page = 1, $articlesPerPage = 10)
    {
        $offset = ($page - 1) * $articlesPerPage;

        $stmt = $this->db->prepare('SELECT * FROM articles LIMIT :offset, :limit');
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $articlesPerPage, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalArticles()
    {
        $stmt = $this->db->query('SELECT * FROM articles');
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        shuffle($articles);
        return count($articles);
    }

    public function getArticleByID($id)
    {
        $query = $this->db->prepare("SELECT * FROM articles where id = :id");
        $query->bindParam(":id", $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
    public function getArticleLike($name)
    {
        $name = "%" . $name . "%";
        $query = $this->db->prepare("SELECT * FROM articles where name LIKE :name");
        $query->bindParam(":name", $name, \PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }
}
