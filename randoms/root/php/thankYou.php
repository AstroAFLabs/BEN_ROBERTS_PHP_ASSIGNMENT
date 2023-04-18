<!DOCTYPE = html>


	<?php
		print_r($_COOKIE);  //Prints all your cookie values
		echo "<h1>Product ID Update</h1>";
		echo "<p>Thank you, your data has been processed</p>";
		
		if(isset($_COOKIE['itemNo']))
		{
			echo "<p>New Product ID is : ". $_COOKIE['itemNo']. "</p>";
		}
		else
		{
			echo "<p>Sorry... cannot retrieve ID at this time" . "</P>";
		}
		
		$filetype = "";
		$tempname == "";

		$filetype = mime_content_type($tempname);
		echo "File type: " . $filetype;
		
		echo "<p>You must enter a valid file (PNG or JPG) and size (less than 40M) </p>" ;
	
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
	
		 
		
		
	?>			   
<html>
	<head>
		<meta charset="UTF-8">
			<title>Product ID Update</title>
		</head>
		<body>
			<link rel="stylesheet" type="text/css" href="../uikit.css">
				<link rel="stylesheet" type="text/css" href="../METAKRON.css">
					<style>
		.error {
			color: #FF0000;
		} 
	</style>
					
				<header class=" header uk-animation-slide-right">ACME Ceramics Pty Ltd</header>
				
<?php
$conn = @mysqli_connect("localhost:3306","root","","acme_door_levers");

		$dbQuery = "SELECT imageurl FROM acme_products WHERE productId ='1'";
		
		
		/* $fileupload = $_FILES['userfile']['name'];
		$filetype = $_FILES['userfile']['type'];
		$filesize = $_FILES['userfile']['size'];
		$tempname = $_FILES['userfile']['tmp_name']; */
		
		
	if(isset($_POST['Send File'])){
		$fileupload = $_FILES['userfile']['name'];
		$filetype = $_FILES['userfile']['type'];
		$filesize = $_FILES['userfile']['size'];
		$tempname = $_FILES['userfile']['tmp_name'];
		$filelocation = '../images/'. $fileupload;
		
	if(!move_uploaded_file($tempname, $filelocation))
	{
		die("Image upload failed");
	}
	
	else {
	
	$result = mysqli_query($conn, $dbQuery);

			if (mysqli_num_rows($result)== 1){
				
				$row = mysqli_fetch_assoc($result);
				echo "<!doctype = html>";
				echo "<html>";
				echo "<meta charset = utf-8>";
				echo "<title> Image Uploaded</title>";
				echo "<body>";
				echo "<div>";
				echo "<h1> Product Image</h1>";
				echo "<img src='$row[imageurl]' height='600' width='600'/>";
				echo"<p><img src='$filelocation' height='600' width='600'></p>";
				$cid = mysqli_insert_id($conn);
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
				
			
				//echo "<p>Couldn't add the file to the database " . mysqli_error($conn) .  "</p>" ;
			
	}
	}
	}
		 
			?>
					<a href='acmePortal.php'>Return to Acme Product Portal</a>
				</body>
			</html>

