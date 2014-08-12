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
			<label for='username'>Username: </label>
			<input type="text" name="username"/><br>
			<label for='password'>Password: </label>
			<input type="password" name="password"/><br>
			<input type="submit" value="Submit" id="button" name="submit"/>
		</form>
	</div>

</body>

</html>