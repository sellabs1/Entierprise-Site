<?php
	include_once('user.php');

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

?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<title>Entierprise - Help</title>
</head>

<body>

	<div id ="nav">
		<ul>
			<li><a href="game.php">Game</a></li>
			<li><a href="settings.php">Settings</a></li>
			<li><a href="tutorial.php">Tutorial</a></li>
			<li><a href="userHome.php">Home</a></li>
			<li><a href="index.php">Exit</a></li>
		</ul>
	</div>

	<div id ="container">
		<div id="form-container">

			<h2>Login</h2>

			<form method="post" action="index.php">
				<input type="text" name="username" placeholder="Username"/><br>
				<input type="password" name="password" placeholder="Password"/><br>
				<input type="submit" value="Submit" id="button" name="submit"/>
			</form>

			<br>
			<a href="register.php">Register Here</a>

		</div>
	</div>

</body>

</html>