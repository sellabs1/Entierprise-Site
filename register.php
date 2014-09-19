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
	<title>Entierprise - Register</title>
</head>

<body>

	<div id="form-container">
		<h2>Register</h2>
		<form method="post" action="register.php">
			<input type="text" name="username" placeholder="Username"/><br>
			<input type="password" name="password" placeholder="Password"/><br>
			<input type="text" name="email" placeholder="Email"/><br>
			<input type="submit" value="Submit" id="button" name="submitReg"/>
		</form>
	</div>

</body>

</html>