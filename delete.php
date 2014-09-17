<?php

	include_once('connection.php');

	try{
		$db = new Connection();
		$con = $db->dbConnect();

		
		$query = $con->prepare("DELETE FROM ");
	}

	catch{

	}

?>