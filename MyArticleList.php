<?php

	require 'connect.inc.php';
	require 'auth_core.inc.php';

	if(!loggedin())
	{
		header('Location: index.php?m=Please Login');
		die();
	}

	$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Article List</title>
</head>
<body>
	
	<form action="zipdownload.php" method="POST">
		<?php			


			$query = "SELECT `article_id`,`article_name` FROM article_owner WHERE `jour_id`='$user_id' OR `editor_id`='$user_id'";

			if($query_run = mysqli_query($conn,$query))
			{

				$query_num_rows = mysqli_num_rows($query_run);

				if($query_num_rows>=1)
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						$article_id = $row['article_id'];
						$article_name = $row['article_name'];


		?>

						Article : <?php echo $article_name;?> <button name="download" value="<?php echo $article_id;?>"> Download </button> <br/><br/>

		<?php					
					}
				}

				else{

					echo "You don't own any articles.";
				}
				
			}else{

					//error page
			}
			
		?>
	</form>

</body>
</html>