<?php

namespace core\App;

use app\controllers\ArticlesController\ArticlesController;
use app\controllers\HomeController\HomeController;
use app\controllers\UsersController\UserController;
use app\Models\Article\Article;
use app\Models\User\User;
use config\Database;

class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];
    protected $error = false;
    protected $db;
    protected $url;
    protected $paginate = false;

    public function __construct()
    {
        require_once __DIR__ . '/../config/database.php';
        // $this->db = $db;

        $url = $this->url = $this->parseUrl();
        $requestUri = $_SERVER['REQUEST_URI'];


        if (preg_match('/^\/articles\?page=(\d+)$/', $requestUri, $matches)) {
            $this->paginate = true;
            $this->controller = 'ArticlesController';
            $this->method = 'index';
            $this->params = [$matches[1]];
        } elseif(preg_match('/^\/paiement\/(\d+)$/', $requestUri, $matches)){
            $this->controller = 'ArticlesController';
        } else {
            if (isset($url)) {
                switch ($url[0]) {
                    case 'HomeController':
                        $this->controller = ucfirst($url[0]);
                        break;
                    case 'articles':
                        $this->controller = ucfirst($url[0] . 'Controller');
                        break;
                    case 'about':
                        return require_once __DIR__ . '/../app/views/about/index.php';
                        break;
                    case 'contact':
                        return require_once __DIR__ . '/../app/views/contact/index.php';
                        break;
                    case 'register':
                        $this->controller = "UserController";
                        break;
                    case 'login':
                        $this->controller = "UserController";
                        break;
                    case 'profil':
                        $this->controller = "UserController";
                        break;
                    case 'logout':
                        $this->controller = "UserController";
                        break;
                    case '/profil/edit-name':
                        $this->controller = "UserController";
                        break;
                    case '/profil/modifier-mot-de-passe':
                        $this->controller = "UserController";
                        break;
                    case 'profil/remove-account':
                        $this->controller = "UserController";
                        break;
                    default:
                        $this->error = true;
                        break;
                }
            }
        }
        $this->getController($this->controller);

        if ($this->error) {
            require_once 'app/views/404.php';
        } else {
            $this->method = 'index';
            if (!$this->paginate) {
                $this->params = $url ? [$url] : [];
            }

            if (isset($url[1]) && $_SERVER['REQUEST_URI'] === '/articles' . '/' . $url[1]) {
                $this->method = 'showArticle';
            } elseif(strstr($_SERVER["REQUEST_URI"], "paiement/")){
                $this->method = 'paiement';
            } elseif ($_SERVER['REQUEST_URI'] === '/register') {
                $this->method = "register";
            } elseif ($_SERVER["REQUEST_URI"] === "/login") {
                $this->method = "login";
            } elseif ($_SERVER["REQUEST_URI"] === "/profil") {
                $this->method = "profil";
            } elseif ($_SERVER["REQUEST_URI"] === "/profil/edit-name") {
                $this->method = "updateName";
            } elseif ($_SERVER["REQUEST_URI"] === "/profil/modifier-mot-de-passe") {
                $this->method = "updatePassword";
            } elseif ($_SERVER["REQUEST_URI"] === "/logout") {
                $this->method = "logout";
            } elseif ($_SERVER["REQUEST_URI"] === "/profil/remove-account") {
                $this->method = "deleteAccount";
            }
            call_user_func_array([$this->controller, $this->method], $this->params);
            unset($url);
            unset($error);
            unset($this->paginate);
        }
    }

    public function parseUrl()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $pathname = str_replace($_SERVER['HTTP_HOST'], '', $uri);
        $pathname = trim($pathname, '/');

        if ($pathname === '') {
            return ['HomeController', 'index'];
        }

        return explode('/', $pathname);
    }

    public function getController($controllerName)
    {
        require_once "./app/controllers/$controllerName.php";
        if ($controllerName === 'HomeController') {
            $this->controller = new HomeController();
        } elseif ($controllerName === 'ArticlesController') {
            require_once __DIR__ . '/../app/Models/Article.php';
            global $db;
            if (isset($this->url[1])) {
                $model = new Article($this->db);
            } else {
                $model = new Article($db);
            }
            $this->controller = new ArticlesController($model);
        } else if ($controllerName === "UserController") {
            require_once __DIR__ . "/../app/Models/User.php";
            global $db;
            if (isset($this->url[1])) {
                $model = new User($this->db);
            } else {
                $model = new User($db);
            }

            return $this->controller = new UserController($model);
        }
    }
}
