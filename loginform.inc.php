<?php
	
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password))
		{
			$query = "SELECT * FROM login WHERE `email_id`='$username' AND `password`='$password'";

			if($query_run = mysqli_query($conn,$query)){

				$query_num_rows = mysqli_num_rows($query_run);

				if($query_num_rows==0){

					echo "Invalid Username : $username /Password : $password";
				}

				else if($query_num_rows==1)
				{
					$row = mysqli_fetch_assoc($query_run);

					$_SESSION['user_id'] = $row['id'];
					$_SESSION['username'] = $row['email_id'];

					header('Location: dashboard.php');
				}

				else{
					
					echo "Invalid Username : $username /Password : $password";
				}

			}else{

					echo mysqli_error();
			}
		}
	}

?>

<form action="<?php echo $current_file ?>" method="POST">

	Username : <input type="text" name="username"/><br/>
	Password : <input type="password" name="password"/><br/>
	<input type="submit" value="Log in"/><br/>

</form>