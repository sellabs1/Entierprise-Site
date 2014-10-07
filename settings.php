<?php
	include_once('user.php');

	if (session_id() == '') {
    	session_start();
	}

	if ($_SESSION['username'] == '') {
		session_destroy();
    	header('location: index.php');
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

	<div id="container">

		<div id="name-cloud"></div>

		<div id ="nav">

			<form method="POST" action="userHome.php">
				<ul>
					<li id="menu-start-game"><a href="serverBrowse.php"></a></li>
					<li id="menu-tutorial"><a href="tutorial.php"></a></li>
					<li id="menu-help"><a href="help.php"></a></li>
					<li id="menu-exit"><input type="submit" class="logout-button" value="" name="logout"></li>
				</ul>
			</form>
				
		</div>
	
		<div id="title"><h1><?php echo "Welcome ".$_SESSION['username']; ?></h1></div>
	</div>

</body>

</html>