<?php

class mainController extends Controller
{
    public function __construct()
    {
        $this->model = new mainModel();
        parent::__construct();
    }

    public function index()
    {
        $result['USER'] = $this->isAuth();
        $this->model->index();
        $this->view->generate('index', $result);
    }
}