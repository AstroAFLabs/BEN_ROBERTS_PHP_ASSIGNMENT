
<?php 

/*WEBPHP ASSIGNMENT BEN ROBERTS
000726910
09/12/2022

FILENAME: initialiseDB.php

This code is solely for the purpose of  breaking my brain and constructing the acme door levers inventory database. */

		//Connect to the database server using the syntax mysqli_connect(server, username, password)
		$conn = @mysqli_connect("localhost:3306","root","");

		//The mysqli_connect function returns false if the connection fails.  
		//The @ symbol in front prevents error messages being outputted so we can use the die() function.
		//If successful, the $conn variable will hold a unique identifier that represents the connection

		 if (!$conn) {
			die ("The connection has failed: " . mysqli_error($conn));
		}
		else {
			echo "Successfully connected to mySQL!";
		}
		
		

		$query= "DROP DATABASE IF EXISTS acme_door_levers";
		$query= "CREATE DATABASE IF NOT EXISTS acme_door_levers;";
		$query.= "use acme_door_levers;";
		$query.= "CREATE TABLE IF NOT EXISTS acme_products (productId int auto_increment not null primary key, productName varchar(40), description varchar(50), productUsage varchar(15), finish varchar(30), price float(8,2), imageurl varchar(100));";
		$query.= "CREATE TABLE IF NOT EXISTS staff_logins (userName varchar(50) not null primary key, userPassword varchar(255) not null)";
		
		if(mysqli_multi_query($conn,$query)) {
		//echo "<p>Table creation/selection successful</p>";
		do
		{
			mysqli_next_result($conn);
		}while(mysqli_more_results($conn));
	}
	else {
		echo "<p>Table query failed ".mysqli_error($conn)."</p>";

	}
				
				$benPassword = "fortytwo";
							$hashedBenPassword = password_hash($benPassword,PASSWORD_DEFAULT);
							
							//insert data in the table
							$insert = "INSERT INTO staff_logins(userName, userPassword) VALUES ('Ben Roberts', '$hashedBenPassword')";

							if (mysqli_query($conn,$insert)) 
							{
								//update successful
								echo "<p>User successfully added</p>"; 
								
							}
							else
							{
								echo "<p>table query failed: Unable to locate this user" . mysqli_error($conn)."</p>";
							}
	
	//The do...while loop is used here to cycle through and process each query.

	
	
?>
<!DOCTYPE html>

<html lang="en">
	<head>
	
	<meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="./METAKRON.css">
	<link rel="stylesheet" type="text/css" href="./uikit.css">

	<title>Upload a File</title>
	</head>
	
	
	<header class=" header uk-animation-slide-right">ACME Ceramics Pty Ltd</header> 
<body>
<div hidden>
</div>
</body>
</html>
