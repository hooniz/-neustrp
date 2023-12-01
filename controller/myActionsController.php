<?php

class myActionsController extends Controller
{
    public function __construct()
    {
        $this->model = new myActionsModel();
        parent::__construct();
    }

    public function index()
    {
        $result['USER'] = $this->isAuth();
		$result['ACTIONS'] = $this->model->index();
        $this->view->generate('myActions', $result);
    }

	public function sale()
	{
		$this->model->sale($_POST);
	}
}