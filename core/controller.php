<?php

namespace core\controller;

class Controller
{
    public function view($view, $data = [])
    {
        extract($data);
        require_once("app/views/$view.php");
       
    }
    public function showUnique($view, $data=[])
    {
        extract($data);
        require_once("app/views/article/$view.php");
    }
}
