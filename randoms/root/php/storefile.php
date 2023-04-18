<!DOCTYPE html>
	
	<?php
	//$productId = "itemnumber";
	//setcookie("Itemno", $productId); 
	//echo $_COOKIE['productId'];
	//?> 

	
<html lang="en">
	<head>
	
	
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./uikit.css">
	<link rel="stylesheet" type="text/css" href="./METAKRON.css">

	<title>Upload a File</title>
	</head>
	
	<?php
	
/*WEBPHP ASSIGNMENT BEN ROBERTS
000726910
09/12/2022

FILENAME: storefile.php
This file retrieves the data entered into the get_files(2).php file, and assigns it to it's places in the acme door levers DB*/

//storefile.php uses the fields posted from the getfile.html
//and stores it in the product_images table

	//This is the code for hiding errors from the final output. 
	//===============================================================================
	/* ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(-1); */
	//=================================================================================
	
	if($_SERVER["REQUEST_METHOD"]== "POST"){
	
		
		$productName = $_POST['productName'];
		$description = $_POST['description']; 
		$usage = $_POST['usage'];
		$finish = $_POST['finish'];
		$price = $_POST['price'];
		

	$tempname = "";
	$fileupload = $_FILES['userfile']['name'];
		$filetype = $_FILES['userfile']['type'];
		$filesize = $_FILES['userfile']['size'];
		$tempname = $_FILES['userfile']['tmp_name'];
		$filelocation = "images/$fileupload";

	if(isset($_POST['Send File'])){
		$fileupload = $_FILES['userfile']['name'];
		$filetype = $_FILES['userfile']['type'];
		$filesize = $_FILES['userfile']['size'];
		$tempname = $_FILES['userfile']['tmp_name'];
		$filelocation = "images/";
	}

	//make sure a file has been entered
	if($tempname == "") {
		echo "<p>You must enter a valid file (PNG or JPG) and size (less than 40M) </p>" ;
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

			
			//include ('initialiseDB.php');

			$dbQuery = "INSERT INTO acme_products(productId, productName, description, productUsage, finish, price, imageurl) VALUES ('$filelocation','$productName','$description','$usage','$finish','$price', '$imageurl')";

			
			if (mysqli_query($conn, $dbQuery))
			{
				echo "<!DOCTYPE html>";
				echo "<html lang='en'>";
					echo "<head>";
						
						echo "<meta charset='UTF-8'>";
						echo "<title>File Upload</title>";				
					echo "</head>";
					echo "<body>";
						echo "<div>";
						echo"<h1>File Uploaded</h1>";
						echo"<p><img src='$filelocation' height='600' width='600'></p>";
						echo "<p>";$cid = mysqli_insert_id($conn);
						echo "<table>";
						echo "<tr><td>Product ID for this record is: ". $cid . "</td></tr>";
						echo "</table>";
						echo "</p>";
						echo"The details of the uploaded file are shown below:<br/>";
						echo"<b>File Name: </b>$fileupload<br/> ";
						echo"<b>File type: </b>$filetype<br/> ";
						echo"<b>File size: </b>$filesize bytes<br/> ";
						echo"<b>Uploaded to: </b>$tempname<br/> ";
						echo"<a href='acmePortal.php'>Add Another file</a>";
						echo "</div>";
					echo "</body>";
				echo "</html>";
				
			}
			else
			{
				echo "<p>Couldn't add the file to the database " . mysqli_error($conn) .  "</p>" ;
			
			}
		}

	}

//storefile.php uses the fields posted from the getfile.html
//and stores it in the product_images table

	$tempname = "";
	

	if(isset($_POST['Send File'])){
		$fileupload = $_FILES['userfile']['name'];
		$filetype = $_FILES['userfile']['type'];
		$filesize = $_FILES['userfile']['size'];
		$tempname = $_FILES['userfile']['tmp_name'];
		$filelocation = "images/$fileupload";
	}
//make sure a file has been entered
		if($fileupload == "") {
		//echo "<p>You must enter a filename</p>" ;
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
					echo "<p> </p>" ;
			}		
		}
		
			else
			{
				echo "<p>Couldn't add the file to the database " . mysqli_error($conn) .  "</p>" ;
			}
		}
	}
	
?>
	
	<body>
	
	
	
	
		
	
	
	</section>
	</body>
</html>