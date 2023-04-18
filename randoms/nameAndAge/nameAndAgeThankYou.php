<!DOCTYPE html>


	<?php
		print_r($_COOKIE);  //Prints all your cookie values
		echo "<h1>Name and Age</h1>";
		echo "<p>Thank you, your form has been processed</p>";
		
		if(isset($_COOKIE['userID']))
		{
			echo "<p>Your id is : ". $_COOKIE['userID']. "</p>";
		}
		else
		{
			echo "<p>Sorry... cannot retrieve ID at this time" . "</P>";
		}
		
		
	?>
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

		<head>
			<meta charset="UTF-8">
			<title>Name and Age</title>	
		</head>

		<body>
			
			<a href='nameAndAge.php'>Return to Name and Age form</a>
		</body>
	</html>