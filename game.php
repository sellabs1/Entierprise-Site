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

	<div id ="game-container">

		<?php echo "<iframe src='http://".$_POST['serverAddress'].":".$_POST['serverPort']."?username=".$_SESSION['username']."'></iframe>" ?>

	</div>

	<script>
    	window.username = <?php echo json_encode($_SESSION('username')); ?>; 
	</script>

</body>

</html>