<?php
namespace Controllers;

class Login extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
		\App\Session::init();
	}

	public function index()
	{
		$this->view->render('login/index', true, false);
	}

	public function run()
	{
		$this->model->run();
	}
}