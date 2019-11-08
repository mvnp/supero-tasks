<?php 
namespace Controllers;

class Error extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
		# \App\Session::init();
	}

	public function index()
	{
		$this->view->title = "404 Error | MVC System";
		$this->view->render("error/index", false, true);
	}
}