<?php

class Controller
{
    protected $view;
    protected $model;

    function __construct()
    {
        $this->view = new View();
        session_start();
    }

    public function isAuth()
    {
        if(count($_SESSION) < 1)
        {
            header('Location: /auth/index');
            die();
        }else
        {
            return $this->model->getUserInfo();
        }
    }
}