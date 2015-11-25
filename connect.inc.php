<?php
	$server = "localhost";
	$name = "root";
	$pass = "root";
	$db_name = "gbpdb";

	$conn = mysqli_connect($server,$name,$pass,$db_name);

	if ($conn==null)
	{
		die("Error Occured. Failed to connect to MySQL : " . mysqli_connect_error());
	}
	
?>