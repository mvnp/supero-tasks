<?php
namespace Controllers;

class Login extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
		\App\Session::init();
	}

	/**
	 * Render View To Show Login Form
	 * @return [type] [description]
	 */
	public function index()
	{
		$this->view->render('login/index', true, false);
	}

	/**
	 * Verify User Exists and Authorized and Login
	 * @return [type] [description]
	 */
	public function run()
	{
		$this->model->run();
	}

	/**
	 * Logout From System
	 * @return [type] [description]
	 */
	public function logout()
	{
		\App\Session::destroy();
		header("Location: https://palhocasites.com.br/supero");
	}
}