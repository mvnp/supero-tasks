<?php 

namespace App;

/**
 * Functions To Modify PHP Responses And
 * Remove PHP Codes inside Views Files
 */
class Helpers 
{
	/**
	 * Return Status Of Tasks
	 * @param [type] $string [description]
	 */
	public static function setStatusToViewTask($string)
	{
		switch ($string) {
		  case 'NEW':
		    $backg = 'bg-new-mod';
		    break;
		  case 'WORK':
		    $backg = 'bg-white-mod';
		    break;  
		  case 'WAITING':
		    $backg = 'bg-yellow-mod';
		    break;
		  case 'URGENT':
		    $backg = 'bg-red-mod';
		    break;
		  case 'FINISHED':
		    $backg = 'bg-green-mod';
		    break;  
		  default:
		    $backg = 'bg-gray';
		    break;  
		}

		return $backg;
	}

	public static function convertDateToPTBR($date) 
	{
		$date = strftime('%A, %d de %B de %Y', strtotime($date));
		$date = ucwords($date);
		$date = utf8_encode($date);
		$date = str_replace("De", "de", $date);

		return $date;
	}
}