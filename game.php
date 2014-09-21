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
	<title>Entierprise - Game</title>
</head>

<body>

	<div id ="container">
	
		<div id ="nav">
			<form method="POST" action="userHome.php">
				<ul>
					<li id="menu-tutorial"><a href="tutorial.php"></a></li>
					<li id="menu-help"><a href="help.php"></a></li>
					<li id="menu-settings"><a href="settings.php"></a></li>
					<li id="menu-exit"><input type="submit" class="logout-button" value="" name="logout"></li>
				</ul>
			</form>
		</div>

		<?php echo "<iframe src='http://".$_POST['serverAddress'].":".$_POST['serverPort']."?username=".$_SESSION['username']."'></iframe>" ?>

	</div>

	<script>
    	window.username = <?php echo json_encode($_SESSION('username')); ?>; 
	</script>

</body>

</html>