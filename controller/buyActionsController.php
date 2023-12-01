<?php

class buyActionsController extends Controller
{
    public function __construct()
    {
        $this->model = new buyActionsModel();
        parent::__construct();
    }

    public function index()
    {
        $result['USER'] = $this->isAuth();
        $result['ACTIONS'] = $this->model->index();
        $this->view->generate('buyActions', $result);
    }

	public function buy()
	{
		$this->model->buy($_POST);
	}
}