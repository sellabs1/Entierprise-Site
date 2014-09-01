<?php
	include_once('user.php');
	include('connection.php');

	if (session_id() == '') {
    	session_start();
	}

	$action = isset($_GET['action']) ? $_GET['action'] : "";
 
	// if it was redirected from delete.php
	if($action=='deleted'){
	    echo "<div>Record was deleted.</div>";
	}

	//select all data
	$query = "SELECT CardId, Name, Value, Description FROM Card";
	$stmt = $con->prepare( $query );
	$stmt->execute();
	 
	//this is how to get number of rows returned
	$num = $stmt->rowCount();
	 
	if($num>0){ //check if more than 0 records found
	 
	    echo "<table border='1'>";//start table
	     
	        //creating our table heading
	        echo "<tr>";
	            echo "<th>Name</th>";
	            echo "<th>Value</th>";
	            echo "<th>Description</th>";
	            echo "<th>Action</th>";
	        echo "</tr>";
	         
	        //retrieve our table contents
	        //fetch() is faster than fetchAll()
	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            //extract row
	            //this will make $row['Name'] to
	            //just $Name only
	            extract($row);
	             
	            //creating new table row per record
	            echo "<tr>";
	                echo "<td>{$Name}</td>";
	                echo "<td>{$Value}</td>";
	                echo "<td>{$Description}</td>";
	                echo "<td>";
	                    //we will use this links on next part of this post
	                    echo "<a href='edit.php?id={$CardId}'>Edit</a>";
	                    echo " / ";
	                    //we will use this links on next part of this post
	                    echo "<a href='#' onclick='delete_user( {$CardId} );'>Delete</a>";
	                echo "</td>";
	            echo "</tr>";
	        }
	     
	    //end table
	    echo "</table>";
	     
	}
	 
	//if no records found
	else{
	    echo "No records found.";
	}
	 
	?>
	 
	<script type='text/javascript'>
	function delete_user( id ){
	     
	    var answer = confirm('Are you sure?');
	    if ( answer ){
	     
	        //if user clicked ok, pass the id to delete.php and execute the delete query
	        window.location = 'delete.php?id=' + id;
	    } 
	}
	</script>
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
</head>
<body>
	<div id="container">
		<div id="title"><h1>Admin Page</h1></div>
		<div id="image"></div>
	</div>
</body>
</html>