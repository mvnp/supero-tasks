<?php 
namespace Controllers;

use Utils;

class Adminlte extends \App\Controller
{
	public function __construct()
	{
		parent::__construct();
		\Utils\Auth::handleLogin();
		$this->view->js = array('adminlte/js/default.js');
	}

	public function index()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/index", false, true);
	}

	public function form1()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/form1", false, true);
	}

	public function form2()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/form2", false, true);
	}

	public function form3()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/form3", false, true);
	}

	public function tabela1()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/tabela1", false, true);
	}

	public function dash1()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/dash1", false, true);
	}

	public function dash2()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/dash2", false, true);
	}

	public function mailbox()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/mailbox", false, true);
	}

	public function mailcompose()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/mailcompose", false, true);
	}

	public function readmail()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/readmail", false, true);
	}

	public function login()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/login", false, true);
	}

	public function register()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/register", false, true);
	}

	public function widgets()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/widgets", false, true);
	}

	public function blank()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/blank", false, true);
	}

	public function chartjs()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/chartjs", false, true);
	}

	public function general()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/general", false, true);
	}

	public function icons()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/icons", false, true);
	}

	public function buttons()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/buttons", false, true);
	}

	public function sliders()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/sliders", false, true);
	}

	public function timeline()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/timeline", false, true);
	}

	public function calendar()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/calendar", false, true);
	}

	public function lockscreen()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/lockscreen", false, true);
	}

	public function invoice()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/invoice", false, true);
	}

	public function invoiceprint()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/invoiceprint", false, true);
	}

	public function error404()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/error404", false, true);
	}

	public function error500()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/error500", false, true);
	}

	public function profile()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/profile", false, true);
	}

	public function pace()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/pace", false, true);
	}

	public function modals()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/modals", false, true);
	}

	public function morris()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/morris", false, true);
	}

	public function flot()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/flot", false, true);
	}

	public function inline()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/inline", false, true);
	}

	public function palhoca()
	{
		$this->view->title = "Administrador | MVC System";
		$this->view->render("adminlte/palhoca", false, true);
	}
}