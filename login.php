<?php
	require 'connect.inc.php';
	require 'auth_core.inc.php';

	if(loggedin())
	header('Location: dashboard.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>


<body>
	<div class="container container-table">

		<div class="row" id="header-row">

			<div class="col-md-3 text-right">
				
			</div>

			<div class="col-md-6 text-center" id="center-div">
				<p>
					<h1>LOGIN</h1>

				</p>
			</div>

		</div>


		<div class="row" id="center-row">

			
			
				<div class="col-md-4">
				</div>

				<div class="col-md-4 text-center" id="center-column">
					
						<?php
		
							if(!empty($_GET['m']))
							echo htmlentities($_GET['m']).'<br/>';
							
							if(!empty($_POST['username']) && !empty($_POST['password']))
							{
								$username = $_POST['username'];
								$password = $_POST['password'];

								$query = "SELECT `id`,`user_type` FROM login WHERE `email_id`='".mysqli_escape_string($conn,$username)."' AND `password`='".mysqli_escape_string($conn,$password)."'";

								if($query_run = mysqli_query($conn,$query)){

									$query_num_rows = mysqli_num_rows($query_run);

									if($query_num_rows==1)
									{
										$row = mysqli_fetch_assoc($query_run);

										$_SESSION['user_id'] = $row['id'];
										$_SESSION['user_type'] = $row['user_type'];

										header('Location: dashboard.php');
									}

									else{

										echo "Invalid Username/Password";
									}
									
								}else{

										//error page
								}
								
							}

						?>

						<h2>Please sign in</h2>
						
					<form class="form-signin" action="<?php echo $current_file ?>" method="POST">
				        
				        <label for="inputEmail" class="sr-only">Email address</label>
				        <input type="email" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				        <label for="inputPassword" class="sr-only">Password</label>
				        <br>
				        <br>
				        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
				        <div class="checkbox">
				          <label>
				            <input type="checkbox" value="remember-me"> Remember me
				          </label>
				        </div>
				        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

				      </form>

				</div>
			
		</div>


	</div>


</body>
</html>
