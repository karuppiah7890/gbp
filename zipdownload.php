<?php
	require 'connect.inc.php';
	require 'auth_core.inc.php';

	redirect_if_not_loggedin();

	$user_id = $_SESSION['user_id'];

	if(!empty($_POST['download']))
	{
		$article_id = $_POST['download'];

		$query = "SELECT `jour_id` FROM article_owner WHERE `article_id`=".mysqli_escape_string($conn,$article_id)." AND (`jour_id`='$user_id' OR `editor_id`='$user_id')";

		if($query_run = mysqli_query($conn,$query))
		{
			$query_num_rows = mysqli_num_rows($query_run);

			if($query_num_rows == 1)
			{
				$row = mysqli_fetch_assoc($query_run);
				
				$jour_id = $row['jour_id'];
			}

			else{

				die('System breach attempt detected!');
			}
			
		}else{

				die('Error Occured in database!');
		}
		
	}

	else{
		
		header('Location: MyArticleList.php');
		die();
	}

	$directory = '/home/karuppiah/uploads/'.$jour_id.'/'.$article_id.'/';

	$allfiles = @scandir($directory);

	if(!$allfiles)
		die('Error Occured! Article Files not found!');

	$files = array_diff($allfiles, array('..', '.'));

	$tmp=tempnam('/home/karuppiah/tempfiles/','pref');

	$zip = new ZipArchive();
	$zip->open($tmp,ZipArchive::CREATE);

	$count = 0;

	foreach($files as $file)
	{
		$zip->addFile($directory.'/'.$file,$file);
		$count++;
	}
		
	$zip->close();

	if($count)
	{
		header('Content-disposition: attachment; filename=Article.zip');
		header('Content-type: application/zip');
		readfile($tmp);
	}
	
	else
	echo 'No Files for this article!';

	unlink($tmp);

?>