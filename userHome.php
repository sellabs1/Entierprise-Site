<!--
	The page that the user redirects to once successfully 
	logged in.
-->

<?php
	include_once('user.php');

	if (session_id() == '') {
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
		<iframe src="http://crucial.ict.op.ac.nz:3000" width="1000" height="900"></iframe>
		<form method="POST" action="userHome.php">
			<input type="submit" value="Logout" name="logout">
		</form>
	</div>
</body>
</html>
