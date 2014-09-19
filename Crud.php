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

	//showEditFields function. Displays all of the fields from a specified table row, and allows the 
	//user to edit them
	public function showEditFields($columns, $table, $id){
	
		//Stores number of columns	
		$colCount = count($columns);
		$rowId = $columns[0];

		//Runs a query that selects all values for row with passed in ID 	
		$query = $this->db->prepare("SELECT * FROM $table WHERE $rowId = ?");
		$query->bindParam(1, $id);
		$query->execute();	
		
		//Stores indexed array of fields in $fields
		$fields = $query->fetch(PDO::FETCH_NUM);	

		//Displays the edit form for the selected row
		echo "<form id='editForm' name='editForm' method='post' action='#'>";

		//Displays each field from the selected row in textareas
		for($i = 0; $i < $colCount; $i++){
			echo "<label for='".$columns[$i]."'>".$columns[$i]."</label>";
			echo "<textarea class='textarea' name='".$columns[$i]."'>".$fields[$i]."</textarea></br>";	
		}

		echo "<input type='submit' value='update' name='editUpdate'></input>";
		echo "</form>";	
	}

	//updateFields function. Takes the user input and updates the selected row in the table 
	public function updateFields($columns, $table, $id){

		//Variable declaration
		$queryArray = array();
		$colCount = count($columns);

		//ID is always the first column
		$rowId = $columns[0];
		$rowCount = 0;

		//Loop to create array of parameters and placeholders for the prepared sql staement below
		for ($i=0; $i < $colCount; $i++) { 
			//E.g. 'CardId = ?'
			$queryArray[$i] = $columns[$i]." = ?";
		}

		//Implode array. Separate each element with a comma for the prepared sql statement below
		$implodeArray = implode(", ", $queryArray);
		
		//Prepare the sql staement. $table is passed in from user input select box. 
		//SET parameters and placeholders from the $implodeArray
		$query = $this->db->prepare("UPDATE $table SET $implodeArray WHERE $rowId = ?");

		//Loop to bind each value from POST to the prepared sql statement. 
		for ($i=1; $i <= $colCount; $i++) { 
			$query->bindParam($i, $_POST[$columns[$i-1]]);
			$rowCount += 1;
		}

		//Binds the $rowId parameter in the prepared statement with the passed in $id
		$query->bindParam($rowCount+1, $id);
		$query->execute();
	}

	public function deleteRow($columns, $table, $id){

		$rowId = $columns[0];

		try{
			$query = $this->db->prepare("DELETE FROM $table WHERE $rowId = ?");
			$query->bindParam(1, $id);

			if($result = $query->execute()){
				header('Location: adminHome.php');
			}
			else{
				die('Unable to delete record.');
			}
		}

		catch(PDOException $exception){
			echo "Error: ". $exception->getMessage();
		}
	}

	public function getServers(){
		
		try{
			$result = $this->showTable('Server');
			$cols = $this->getColumns('Server');
			
			if($result){

				echo "<table>";
				echo "<tr>";

				foreach ($cols as $column) {
					echo "<th>".$column."</th>";
				}

				echo "<th>Select</th>";
				echo "</tr>";

				foreach ($result as $row) {
					
					echo "<tr>";

					for($i = 0; $i < count($cols); $i++){
						echo "<td>".$row[$i]."</td>";
					}

					echo "<td><input type='checkbox'/></td>";
					echo "</tr>";
				}

				echo "</table>";
			}
			else{
				echo "There are no Servers to show";
			}
		}

		catch(PDOException $exception){
			echo "Error: ". $exception->getMessage();
		}
	}
}

?>
