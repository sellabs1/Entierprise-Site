<!--
	Administrator Home Page. 
-->
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
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
</head>
<body>

	<div id="title"><h1>Admin Page</h1></div>
	<div id="admin-display-container">		
		
		<?php

			if(isset($_POST['tableName'])){

				$tableName = $_POST['tableName'];
				$_SESSION['tableName'] = $tableName;

				$crud = new Crud();
				$res = $crud->showTable($tableName);
				$cols = $crud->getColumns($tableName);

				echo "<h2>Table: ".$tableName."</h2>";	

				echo "<table>";
				echo "<tr>";

				//Loops through columns and creates table header for each one	
				foreach($cols as $column){
					echo "<th>".$column."</th>";
				}

				echo "<th>Action</th>";
				echo "</tr>";

				foreach($res as $row){

					echo "<tr>";

					for($i = 0; $i < count($cols); $i++){
						echo "<td>".$row[$i]."</td>";
					}

		            echo "<td>";

		                //we will use this links on next part of this post
		                echo "<a href='edit.php?id=".$row[0]."'>Edit</a>";
		                echo " / ";
		                //we will use this links on next part of this post
		                echo "<a href='#' onclick='delete_user( {$id} );'>Delete</a>";
		            echo "</td>";
		            
		            echo "</tr>";
	        	}
	        	echo "</table>";
        	}

		?>

	</div>

	<div id="admin-options">

		<h2>Select Table</h2>

		<form  id="select-table-form" name ="select-table-form" method="post">
			<select name = 'tableName' style = 'position: relative' onchange="change()">
				<option value="ActionCard">ActionCard</option>
				<option value="AttributeCard">AttributeCard</option>
				<option value="AttributeGoal">AttributeGoal</option>
				<option value="Card">Card</option>
				<option value="CardDeck">CardDeck</option>
				<option value="ChatMessage">ChatMessage</option>
				<option value="Deck">Deck</option>
				<option value="GoalCard">GoalCard</option>
				<option value="Group">Group</option>
				<option value="RuleCard">RuleCard</option>
				<option value="Server">Server</option>
				<option value="Type">Type</option>
				<option value="User">User</option>
				<option value="UserServer">UserServer</option>
			</select>
		</form>

	</div>

	<script>
		function change(){
		    document.getElementById("select-table-form").submit();
		}
	</script>

</body>
</html>