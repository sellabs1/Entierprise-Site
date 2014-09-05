<?php

	include('user.php');
	include('Crud.php');
	
	if (session_id() == '') {
    	
    	session_start();

    	if($_SESSION['username'] != 'Admin'){
    		
    		session_destroy();
			header('location: index.php');
    	}
	}

	//Holds selected table name	
	$table = $_SESSION['tableName'];
	
	//Instantiates Crud class
	$crud = new Crud();
	//Stores associative array of column names in $res
	$columns = $crud->getColumns($table);
	$rowId = $_REQUEST['id'];
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
</head>

<body>
	<?php

		$crud->showEditFields($columns, $table, $rowId);

	?>
</body>

</html>