<?php 

class Val
{
	public function __construct()
	{

	}

	public function minlength($data, $args)
	{
		if(strlen($data) < $args)
			return "Your string can only be $args long min";
	}

	public function maxlength($data, $args)
	{
		if(strlen($data) > $args)
			return "Your string can only be $args long max";
	}

	public function digit($data, $args)
	{
		if(ctype_digit($data) == false)
			return "String must be a digit";
	}

	public function required($data)
	{
		if(empty($data) or is_null($data))
			return "This info is required";
	}

	public function __call($name, $args)
	{
		throw new Exception("$name does not exist inside of: " . __CLASS__);
	}
}