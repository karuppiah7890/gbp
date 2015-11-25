<?php
	require 'auth_core.inc.php';

	if(loggedin()){

		echo "Welcome ".$username;

	}
	else{

		header('Location: index.php?m=Please Login');

	}

?>