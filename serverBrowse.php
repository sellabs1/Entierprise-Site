<?php
	include_once('user.php');
	include_once('Crud.php');

	if (session_id() == '') {
    	session_start();
	}

	if ($_SESSION['username'] == '') {
		session_destroy();
    	header('location: index.php');
	}

	if(isset($_POST['logout'])){

		$object = new User();
		$object->Logout();
	}

	if(isset($_POST['Back'])){
		header("Location: userHome.php");
	}

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<title>Entierprise - Server Browse</title>
</head>
<body>

	<div id="container">

		<h1>Server Browse Page</h1>

		<div id="serverList">
			<?php

				$crud = new Crud();
				$crud->getServers();

			?>
			<form id="back-form" method="POST" action="#">
				<input type="submit" value="Back" name="Back">
			</form>
		</div>

	</div>
</body>
</html>