<?php
	include_once('user.php');
	include_once('Crud.php');

	if (session_id() == '') {
    	session_start();
	}

	if($_SESSION['login'] == 'true') {
    	echo 'Username: <b>'.$_SESSION['username'].'</b>';
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

			<div id="serverList">
				<?php

					$crud = new Crud();
					$crud->getServers();

				?>
			</div>

			<input type="submit" value="Join" name="Join">
			<input type="submit" value="Back" name="Back">
		</form>

	</div>
</body>
</html>