<?php
	include_once('user.php');

	if (isset($_SESSION['username'])) {
		header('location: userHome.php');
	}

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
	<script src="scripts/jquery-1.11.1.min.js"></script>
	<script src="scripts/js-functions.js"></script>
	<title>Entierprise - Register</title>
</head>

<body>
	<div id="container">
		<div class="form-container" id="register-form">
			<h2>Register</h2>
			<form method="post" action="register.php">
				<input id="regUsername" type="text" name="username" placeholder="Username" required/>
				<span id="user-result"></span><br>
				<input id="pass" type="password" name="password" placeholder="Password" required/><br>
				<input id="confPass" type="password" name="confPassword" placeholder="Confirm Password" required/>
				<span id="pass-result"></span><br>
				<input type="text" name="email" placeholder="Email" required/><br>
				<input type="submit" value="Submit" id="button" name="submitReg"/>
			</form>
		</div>
	</div>
</body>

</html>