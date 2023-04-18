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
		
		$tempname = $_FILES['userfile']['tmp_name'];
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
	}
		 
		
		
	?>
	<html>

		<head>
			<meta charset="UTF-8">
			<title>Product ID Update</title>	
		</head>

		<body>
			
			<a href='acmePortal2.php'>Return to Acme Product Portal</a>
		</body>
	</html>