<?php
namespace Models;

use PDO;

class Login_Model extends \App\Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$password = \App\Hash::create('sha256', $_POST['senha'], HASH_PASSWORD_KEY);
		$stmt = $this->db->prepare("SELECT * FROM supero_users WHERE email = :email AND senha = :senha");
		$stmt->execute(array(
			':email' => ((isset($_POST['email'])) ? $_POST['email'] : ""),
			':senha' => ((isset($_POST['senha'])) ? $password : "")
		));

		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() == 1)
		{
			\App\Session::init();
			\App\Session::set("loggedIn", true);
			\App\Session::set("nome", $data['name']);
			\App\Session::set("email", $data['email']);
			\App\Session::set("ativo", $data['ativo']);
			header("Location: " . URL . "tasks/index");
		} 
		else 
		{
			\App\Session::destroy();
			header("Location: " . URL . "index");
		}
	}
}