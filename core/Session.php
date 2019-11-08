<?php 
namespace App;

class Session
{
	public static function init()
	{
		session_cache_expire(30);
		if(!isset($_SESSION)) session_start();
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key)
	{
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}
	}

	public static function destroy()
	{
		if(!isset($_SESSION)) session_start();
		unset($_SESSION['loggedIn']);
		unset($_SESSION['email']);
		session_destroy();
	}
}