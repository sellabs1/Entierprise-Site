<?php
	include_once('user.php');

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		$object = new User();
		$object->Login($username, $password);
	}

?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
</head>

<body>

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

</body>

</html>