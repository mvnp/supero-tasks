<?php 
namespace App;

class View
{
	public function __construct(){}

	public function render($name, $noInclude = false, $admin = false)
	{
		if($noInclude == true){
			require 'views/' . $name . '.php';
		} elseif($admin == true) {
	 		require 'views/administrador/header-admin.php';
	 		require 'views/includes/sidebar.php';
				require 'views/administrador/' . $name . '.php';
			require 'views/administrador/footer-admin.php';

		} else {
	 		require 'views/header.php';
				require 'views/' . $name . '.php';
			require 'views/footer.php';
		}
	}

	public function renderH($name, $noInclude = false, $admin = false)
	{
		if($noInclude == true){
			require 'views/' . $name . '.php';
		} elseif($admin == true) {
	 		require 'views/administrador/header-admin.php';
	 		require 'views/includes/sidebar.php';
				require 'views/administrador/' . $name . '.php';
	 		# require 'views/administrador/footer-admin.php';
		} else {
	 		require 'views/header.php';
				require 'views/' . $name . '.php';
			require 'views/footer.php';
		}
	}
}