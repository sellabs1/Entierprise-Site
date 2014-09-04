<?php

class Crud{

	private $db;

	public function __construct(){
		$this->db = new Connection();
		$this->db = $this->db->dbConnect();
	}
	
	public function showTable($table){

		$query = $this->db->prepare("SELECT * FROM $table");
		$query->execute();

		return $query->fetchAll(PDO::FETCH_NUM);
	}

	public function getColumns($table){

		$query = $this->db->prepare("DESCRIBE $table");
		$query->execute();

		return $query->fetchAll(PDO::FETCH_COLUMN);
	}
}

?>
