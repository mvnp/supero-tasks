<?php 
namespace App;

class Hash 
{
	public static function create($algoritmo, $data, $salt)
	{
		$context = hash_init($algoritmo, HASH_HMAC, $salt);
		hash_update($context, $data);

		return hash_final($context);
	}
}