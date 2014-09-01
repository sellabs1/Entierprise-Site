<?php
	include_once('user.php');
	
	if (session_id() == '') {
    	session_start();
	}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
</head>
<body>
	<div id="container">
		<div id="title"><h1>Admin Page</h1></div>
		<div id="image"></div>
	</div>
</body>
</html>