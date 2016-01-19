<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

	require 'connect.inc.php';
	require 'auth_core.inc.php';

	redirect_if_not_loggedin();

	$username = getUserFieldValue('email_id');
	echo "Welcome ".$username;

?>
	<br/><a href="logout.php">Logout</a>

</body>
</html>