<?php

namespace app\controllers\ArticlesController;

use core\controller\Controller;

class ArticlesController extends Controller
{
    private $model;
    private $articlesPerPage = 8;
    private $lastpage = 1;

    public function __construct($model)
    {
        $this->model = $model;
        if (isset($_GET['page'])) {
            $_SESSION["page"] = $_GET["page"];
        }
    }

    public function index()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $page = max(1, $page);

        $totalArticles = $this->model->getTotalArticles();
        $totalPages = ceil($totalArticles / $this->articlesPerPage);

        $page = min($page, $totalPages);

        if (isset($_POST["search"])) {
            $name = $_POST["search"];
            $articles = $this->model->getArticleLike($name);

            if ($articles) {
                return $this->view("article/index", [
                    "articles" => $articles,
                    "currentPage" => $page,
                    "totalPages" => $totalPages,
                    "lastPage" => $this->lastpage,
                ]);
            } else {
                unset($_POST["search"]);
                $_SESSION["message"] = "Désolé, aucun produit ne correspond à votre recherche.";
                $this->renderView($page, $totalPages);
            }
        } else {
            $this->renderView($page, $totalPages);
        }
    }

    public function showArticle($id)
    {
        $article = $this->model->getArticleById($id);
        ($_SESSION["page"]);
        return $this->view("article/articleById/index", ["article" => $article, "lastPage" => $_SESSION["page"]]);
    }

    public function paiement()
    {
        $allArticles = $this->model->getAllArticles();
        return $this -> view("article/paiement/index", ["allArticles" => $allArticles , "articles" => "oui"]);
    }

    public function renderView($page, $totalPages)
    {
        $articles = $this->model->getArticlePerPage($page, $this->articlesPerPage);

        $allArticles = $this->model->getAllArticles();
        return $this->view("article/index", [
            "articles" => $articles,
            "currentPage" => $page,
            "totalPages" => $totalPages,
            "lastPage" => $this->lastpage,
            "allArticles" => $allArticles,
        ]);
    }
}
