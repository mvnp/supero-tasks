<?php 
namespace Controllers;

class Index extends \App\Controller
{
	/**
	 * Redirect To System Login
	 * @return [type] [description]
	 */
	public function index()
	{
		header("Location: " . URL . "login");
	}
}