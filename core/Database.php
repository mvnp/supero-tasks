<?php 
namespace App;

use PDO;

class Database extends PDO
{
	public function __construct($DB_HOST, $DB_BASE, $DB_USER, $DB_PASS)
	{
		parent::__construct("mysql:host=".$DB_HOST.";dbname=".$DB_BASE."", $DB_USER, $DB_PASS);
		### parent::setAttibute(PDO::ATTR_ERRMODE, PDO::ATTR_EXCEPTIONS)
	}

	public function select($sql, $array = [], $fecthMode = PDO::FETCH_ASSOC)
	{
		$stmt = $this->prepare($sql);
		foreach ($array as $key => $value) {
			$stmt->bindValue(":$key", $value);
		}

		$stmt->execute();

		return $stmt->fetchAll($fecthMode);
	}

	public function selectOne($sql, $array = [], $fecthMode = PDO::FETCH_ASSOC)
	{
		$stmt = $this->prepare($sql);
		foreach ($array as $key => $value) {
			$stmt->bindValue(":$key", $value);
		}

		$stmt->execute();

		return $stmt->fetch($fecthMode);
	}

	public function selectCount($sql, $array = [], $fecthMode = PDO::FETCH_ASSOC)
	{
		$stmt = $this->prepare($sql);
		$stmt->execute();
		return $stmt->rowCount();
	}

	/**
	 * insert
	 * @param  string $table A name of table to insert into
	 * @param  string $data An associative array
	 */
	public function insert($table, $data)
	{
		ksort($data);

		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		$stmt = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

		foreach ($data as $key => $value)
		{
			$stmt->bindValue(":$key", $value);
		}

		$stmt->execute();

		if($stmt->errorCode() === "00000") return true;
		return false;		
	}

	/**
	 * insert
	 * @param  string $table A name of table to insert into
	 * @param  string $data An associative array
	 */
	public function update($table, $postData, $where)
	{
		ksort($postData);

		$fieldDetails = NULL;
		foreach($postData as $key => $value){
			$fieldDetails .= "$key = :$key, ";
		}

		$fieldDetails = rtrim($fieldDetails, ', '); 
		$stmt = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

		foreach ($postData as $key => $value)
		{
			$stmt->bindValue(":$key", $value);
		}

		$stmt->execute();

		if($stmt->errorCode() === "00000") return true;
		return false;
	}

	public function delete($table, $where, $limit = 1)
	{
		$stmt = $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
		if((int)$stmt === 1) return true;
		return false;
	}
}