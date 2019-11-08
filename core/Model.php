<?php 
namespace App;

class Model
{
	public function __construct()
	{
		$this->db = new Database(DB_HOST, DB_BASE, DB_USER, DB_PASS);
	}
}