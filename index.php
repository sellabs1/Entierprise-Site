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
	<title>Entierprise - Home</title>
</head>

<body>
	<div id="container">
		<div id="login-form" class="form-container">
			<form method="post" action="index.php">
				<input type="text" name="username" placeholder="Username"/><br>
				<input type="password" name="password" placeholder="Password"/><br>
				<input type="submit" value=" " id="login-button" name="submit"/>
			</form>
			<br>
			<a id="register-link" href="register.php">Register Here</a>
		</div>
	</div>
</body>

</html>