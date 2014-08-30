<!--
	The page that the user redirects to once successfully 
	logged in.
-->

<?php
	include_once('user.php');

	if (session_status() == PHP_SESSION_NONE) {
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
</head>
<body>
	<div id="container">
		<div id="title"><h1>You Have Logged In Successfully</h1></div>
		<div id="image"><img src="https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-xap1/t1.0-9/1912083_10201611983886797_54581575_n.jpg"></div>
		<form method="POST" action="userHome.php">
			<input type="submit" value="Logout" name="logout">
		</form>
	</div>
</body>
</html>