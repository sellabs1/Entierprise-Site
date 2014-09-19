<?php

	include('user.php');
	include('Crud.php');

	//Instantiates Crud class
	$crud = new Crud();
	
	if (session_id() == '') {
    	
    	session_start();

    	if($_SESSION['username'] != 'Admin'){
    		
    		session_destroy();
			header('location: index.php');
    	}
	}

	//If editUpdate button is clicked, run the updateFields method
	if(isset($_POST['editUpdate'])){
		$crud->updateFields($columns, $table, $rowId);
	}

	//Holds selected table name	
	$table = $_SESSION['tableName'];

	//Stores associative array of column names in $columns
	$columns = $crud->getColumns($table);
	$rowId = $_REQUEST['id'];
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="scripts/js-functions.js"></script>
</head>

<body>

	<div id="edit-container">

		<?php
			//Shows the fields for the passed in table 
			$crud->showEditFields($columns, $table, $rowId);
			
		?>

	</div>

</body>

</html>