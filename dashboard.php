<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

	require 'connect.inc.php';
	require 'auth_core.inc.php';

	if(loggedin()){

		$username = getUserFieldValue('email_id');
		echo "Welcome ".$username;
?>
	<br/><a href="logout.php">Logout</a>	
<?php
	
	}
	else{

		header('Location: index.php?m=Please Login');

	}

?>

</body>
</html>