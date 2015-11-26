<!DOCTYPE html>
<html>
<head>
	<title>Log In Page</title>
</head>
<body>
		<?php
			require 'connect.inc.php';
			require 'auth_core.inc.php';

			if(loggedin()){

				header('Location: dashboard.php');

			}else{

				if(isset($_GET['m'])&&!empty($_GET['m']))
					echo $_GET['m'].'<br/>';

				require 'loginform.inc.php';
			}
			
		?>
</body>
</html>