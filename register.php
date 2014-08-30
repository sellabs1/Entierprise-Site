<?php
	include_once('user.php');

	if(isset($_POST['submitReg'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$object = new User();
		$object->Register($username, $password, $email);
	}
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
</head>

<body>

	<div id="form-container">
		<h2>Register</h2>
		<form method="post" action="register.php">
			<label for='username'>Username: </label>
			<input type="text" name="username"/><br>
			<label for='password'>Password: </label>
			<input type="password" name="password"/><br>
			<label for='email'>Email: </label>
			<input type="text" name="email"/><br>
			<input type="submit" value="Submit" id="button" name="submitReg"/>
		</form>
	</div>

</body>

</html>