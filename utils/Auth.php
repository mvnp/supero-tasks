<?php 
namespace Utils;

class Auth
{	
	/**
	 * Verify On Load Controllers If User Session Exists 
	 * @return [type] [description]
	 */
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