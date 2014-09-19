<?php
	include_once('user.php');

	if (session_id() == '') {
    	session_start();
	}

	if ($_SESSION['username'] == '') {
		session_destroy();
    	header('location: index.php');
	}

	if($_SESSION['login'] == 'true') {
    	echo 'Username: <b>'.$_SESSION['username'].'</b>';
	}

	if(isset($_POST['logout'])){

		$object = new User();
		$object->Logout();
	}

?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<title>Entierprise - Settings</title>
</head>

<body>

	<div id ="nav">
		<ul>
			<li><a href="game.php">Game</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="tutorial.php">Tutorial</a></li>
			<li><a href="userHome.php">Home</a></li>
		</ul>

		<form method="POST" action="#">
			<input type="submit" class="button" value="Logout" name="logout">
		</form>
	</div>

	<div id ="container">
		<h1>Settings Page</h1>
	</div>

</body>

</html>