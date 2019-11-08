<?php 
namespace Utils;

class Auth
{	
	public static function handleLogin()
	{
		if(!isset($_SESSION['loggedIn'])) session_start();
		$logged = $_SESSION['loggedIn'];

		if($logged == false)
		{
			session_destroy();
			header("Location: " . URL . "login");
		}
	}
}