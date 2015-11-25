<?php

	session_start();

	if (isset($_SESSION['username'])&&!empty($_SESSION['username']))
	$username = $_SESSION['username'];

	$current_file = $_SERVER['SCRIPT_NAME'];
	
	function loggedin()
	{
		if (isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])) {
			return true;
		}
		else
			return false;
	}
?>