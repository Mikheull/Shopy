<?php

class db_connect{
	protected $_db;
	
	protected function __construct($connect){
		$this -> setDb($connect);
	}
	public function setDb(PDO $connect){
		$this -> _db = $connect;
	}

}

?>