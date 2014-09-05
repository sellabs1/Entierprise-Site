<!--
	CRUD class. Contains all of the Create, Update, and Delete functions for use with our
	Database.
-->

<?php

class Crud{

	private $db;

	//Constructor. Runs when class is instantiated.	
	public function __construct(){
		$this->db = new Connection();
		$this->db = $this->db->dbConnect();
	}
	
	//showTable function. Grabs all rows from the table that is passed to it.
	public function showTable($table){

		$query = $this->db->prepare("SELECT * FROM $table");
		$query->execute();

		//Returns an indexed array
		return $query->fetchAll(PDO::FETCH_NUM);
	}

	//getColumn	function. Grabs all column names from the table that is passed to it.
	public function getColumns($table){

		$query = $this->db->prepare("DESCRIBE $table");
		$query->execute();

		//Returns associative array of column names.	
		return $query->fetchAll(PDO::FETCH_COLUMN);
	}

	public function showEditFields($columns, $table, $id){
	
		//Stores number of columns	
		$colCount = count($columns);
		$rowId = $columns[0];

		//Runs a query that selects all values for row with passed in ID 	
		$query = $this->db->prepare("SELECT * FROM $table WHERE $rowId = $id");
		$query->execute();	
		
		//Stores indexed array of fields in $fields
		$fields = $query->fetch(PDO::FETCH_NUM);	

		echo "<form id='editForm' name='editForm' method='post' action='#'>";

		for($i = 0; $i < $colCount; $i++){
			echo "<label for='".$columns[$i]."'></br>";
			echo "<input type='textarea' name='".$columns[$i]."'>".$fields[$i]."</input>";	
		}

		echo "</form>";	
	}
}

?>
