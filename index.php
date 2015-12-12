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

				if(!empty($_GET['m']))
					echo htmlentities($_GET['m']).'<br/>';

				require 'loginform.inc.php';
			}
			
		?>
</body>
</html>