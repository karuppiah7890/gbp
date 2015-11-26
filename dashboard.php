<?php

	require 'connect.inc.php';
	require 'auth_core.inc.php';

	if(loggedin()){

		$username = getUserFieldValue('email_id');
		echo "Welcome ".$username;

	}
	else{

		header('Location: index.php?m=Please Login');

	}

?>