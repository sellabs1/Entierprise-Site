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
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<script src="scripts/jquery-1.11.1.min.js"></script>
	<script src="scripts/js-functions.js"></script>
	<title>Entierprise - Server Browse</title>
</head>
<body>

	<div id="container">

		<div id="name-cloud">
			<div id="title"><h1 id='welcome'><?php echo "Hello, ".$_SESSION['username']; ?></h1></div>
		</div>

		<div id="serverList">

			<?php

				$crud = new Crud();
				$crud->getServers();

			?>

			<div id="server-back">
				
				<form id="back-form" method="POST" action="#">
					<input type="submit" value=" " name="Back">
				</form>
				
			</div>

			<form id="refresh-form" method="POST" action="#">
				<input type="button" value=" " name="Refresh" onclick="window.location.reload();">
			</form>
		</div>

	</div>
</body>
</html>