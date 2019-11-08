<?php 
namespace Controllers;

/**
 * Redirect to login of Tasks
 * Used on Bootstrap File to Router System
 */
class Index extends \App\Controller
{
	public function index()
	{
		header("Location: " . URL . "login");
	}
}