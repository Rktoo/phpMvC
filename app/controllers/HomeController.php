<?php

namespace app\controllers\HomeController;

use core\controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view("home/index", []);
    }
}
