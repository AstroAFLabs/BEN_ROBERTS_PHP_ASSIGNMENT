z

	<?php


	

	ini_set('display_errors', 0);
		ini_set('display_startup_errors', 0);
		error_reporting(-1);
		


	$tempname = "";
	$filelocation = "images/";

	if(isset($_POST['save'])){
		$fileupload = $_FILES['userfile']['name'];
		$filetype = $_FILES['userfile']['type'];
		$filesize = $_FILES['userfile']['size'];
		$tempname = $_FILES['userfile']['tmp_name'];
		//$filelocation = "images/$fileupload";
	}

	//make sure a file has been entered
	if($tempname == "") {
		echo "<p>You must enter a valid filename and size (less than 40M) </p>" ;
	}
	else
	{
		if (!move_uploaded_file($tempname,$filelocation)) {
			switch ($_FILES['userfile']['error'])
			{
				case UPLOAD_ERR_INI_SIZE:
					echo "<p>Error: File exceeds the maximum size limit set by the server</p>" ;
					break;
				
				case UPLOAD_ERR_FORM_SIZE:
					echo "<p>Error: File exceeds the maximum size limit set by the browser</p>" ;
					break;
				
				case UPLOAD_ERR_NO_FILE:
					echo "<p>Error: No file uploaded</p>" ;
					break;
				
				default:
					echo "<p>File could not be uploaded </p>" ;
			}
			
		}
		else
		{

			//Open the mycompany database and make sure the product_images table is present
			

			$dbQuery = "INSERT INTO acme_products(imageurl) VALUES ('$filelocation')";

			
			if (mysqli_query($conn, $dbQuery))
			{
				echo "<!DOCTYPE html>";
				echo "<html lang='en'>";
					echo "<head>";
						echo "<meta charset='UTF-8'>";
						echo "<title>File Upload</title>";				
					echo "</head>";
					echo "<body>";
						echo"<h1>File Uploaded</h1>";
						echo"<p><img src='$filelocation' height='300' width='200'></p>";
						echo"The details of the uploaded file are shown below:<br/>";
						echo"<b>File Name: </b>$fileupload<br/> ";
						echo"<b>File type: </b>$filetype<br/> ";
						echo"<b>File size: </b>$filesize bytes<br/> ";
						echo"<b>Uploaded to: </b>$tempname<br/> ";
						echo"<a href='acmePortal.php'>Add Another file</a>";
					echo "</body>";
				echo "</html>";
				
			}
			else
			{
				echo "<p>Couldn't add the file to the database " . mysqli_error($conn) .  "</p>" ;
			
			}
		}

	}
?>
