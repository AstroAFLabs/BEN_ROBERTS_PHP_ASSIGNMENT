<!DOCTYPE html>

<html lang="en">
	<head>
	
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="uikit.css">
	<link rel="stylesheet" type="text/css" href="METAKRON.css">

	<title>Add New Staff Details</title>
	</head>
	
	<body>
	<header class=" header uk-animation-slide-right">ACME Ceramics Pty Ltd</header> 
<body>

<div>
<?php
/* ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(-1);  */
	
	$conn = @mysqli_connect("localhost:3306","root","","acme_door_levers");

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "<p>Failed to connect to MySQL and the db: " . mysqli_connect_error() . "</p>";
	}
	else
	{
		echo "<p>Connected to MySQL and the DB</p>";
		
		/* $userName = $_POST['userName'];
		$userPassword = $_POST['userPassword']; */
		$hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
		$query = "SELECT * FROM staff_logins WHERE userName='".$userName."'";
		$results = mysqli_query($conn,$query);
				

		$insert = "INSERT INTO staff_logins(userName, userPassword) VALUES ('$userName', '$hashedPassword')";
		$results = mysqli_query($conn,$insert);
		$numRowsAffected = mysqli_affected_rows($conn);
		if (!$results) 
		{
			echo "<p>Error updating product data: " . mysqli_error($conn) . "</p>";
		}
		else 
		{
			if (!$numRowsAffected == 0) 
			{
						
				echo "<p> Your details have been successfully entered: ".$userName."</p>";
				//Show the updated record
				$query = "SELECT * FROM acme_products WHERE userName=".$userName;
				$results = mysqli_query($conn,$query);
				if ($results) 
				{
					$numRecords=mysqli_num_rows($results);
					if ($numRecords != 0)
					{
						//fetch and display results
						while ($row = mysqli_fetch_array($results)) 
						{ 
							
							echo "<link rel='stylesheet' type='text/css' href='uikit.css'>";
							echo "<link rel='stylesheet' type='text/css' href='METAKRON.css'>";
							echo "<title>Add New Staff Details</title>";
							echo "</head>";
							echo "<body>p>New staff details successfully entered. </p>"; 
							echo "<p>Use your newfound responsibility wisely. </p>";
							echo	"<a href='login.php'>Return to login page</a>";
							
						}
					}
					
				}
				
			}
		}
	}
		
	//Close the connection
	mysqli_close($conn);
?>
</div>
</body>
</html>