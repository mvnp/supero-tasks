<?php
namespace App;

/*
 * - Fill out a form
 * - POST to PHP
 * - Sanitize
 * - Validate
 * - Return data
 * - Write to database
 */
class Form
{
	/* [$_currentItem description] */
	private $_currentItem = null;

	/* $_postData - Stores the posted Data */
	private $_postData = array();

	/* $_val - The validator object */
	private $_val = array();

	/* $_error - Holds the current form errors */
	private $_error = array();

	/** __construct - Instantiates the validator class */
	public function __construct()
	{
		$this->_val = new Val();
	}

	/*
	 * This is to $_POST
	 */
	public function post($field)
	{
		$this->_postData[$field] = $_POST[$field];
		$this->_currentItem = $field;
		return $this;
	}

	/**
	 * fetch - Return the posted data
	 * @param  mixed $fieldName
	 * @return mixed string or array
	 */
	public function fetch($fieldName = false)
	{
		if($fieldName)
		{
			if(isset($this->_postData[$fieldName]))
			return $this->_postData[$fieldName]; 
			
			else 
			return false;
		}
		else 
		{
			return $this->_postData;
		}
	}

	/*
	 * This is to validate
	 */
	public function val($typeOfvalidator, $args = null)
	{
		$error = $this->_val->{$typeOfvalidator}($this->_postData[$this->_currentItem], $args);

		if($error){
			$this->_error[$this->_currentItem] = $error;
		}

		return $this;
	}

	public function submit()
	{
		if(empty($this->_error)){
			return true;
		}
		else {
			$str = "";
			foreach ($this->_error as $key => $value) 
			{
				$str .= $key . ' => ' . $value . "\n";
			}
			throw new Exception($str);
		}
	}
}