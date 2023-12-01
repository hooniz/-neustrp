<?php

class authController extends Controller
{
    public function __construct()
    {
        $this->model = new authModel();
        parent::__construct();
    }

    public function index()
    {
        $this->view->generate('auth');
    }

    public function doauth()
    {
        $result['ERRORS'] = $this->model->doAuth($_POST);
        $result['VALUES'] = $_POST;
        if(!$result['ERRORS'])
        {
            header('Location: /');
        }
        $this->view->generate('auth', $result);
    }

    public function lgout()
    {
        $this->model->lgout();
    }
}