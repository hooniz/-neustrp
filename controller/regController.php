<?php

class regController extends Controller
{
    public function __construct()
    {
        $this->model = new regModel();
        parent::__construct();
    }

    public function index()
    {
        $this->view->generate('reg');
    }

    public function doreg()
    {
        $result['ERRORS'] = $this->model->doRegistration($_POST);
        $result['VALUES'] = $_POST;
        if(!$result['ERRORS'])
        {
            header('Location: /auth/index');
        }
        $this->view->generate('reg', $result);
    }
}