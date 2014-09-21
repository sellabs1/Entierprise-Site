<!--
	The page that the user redirects to once successfully 
	logged in.
-->

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
	<title>Entierprise - User Home Page</title>
</head>
<body>

	<div id="container">

	<div id ="nav">
		<ul>
			<li id="start-game"><a href="serverBrowse.php"></a></li>
			<li id="help"><a href="help.php">Help</a></li>
			<li id="settings"><a href="settings.php">Settings</a></li>
			<li id="tutorial"><a href="tutorial.php">Tutorial</a></li>
		</ul>

		<div id="list-test"><img src="images/menu-start.gif"></div>

		<form method="POST" action="userHome.php">
			<input type="submit" class="button" value="Logout" name="logout">
		</form>
	</div>
		<div id="title"><h1><?php echo "Welcome ".$_SESSION['username']; ?></h1></div>

	</div>
</body>
</html>
