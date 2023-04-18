<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./uikit.css">
<link rel="stylesheet" type="text/css" href="./METAKRON.css">
<style>
		.error {
			color: #FF0000;
		} 
	</style>

<title>Upload a File</title>
</head>
<header class=" header uk-animation-slide-right">ACME Ceramics Pty Ltd</header> 
<body>


<?php 

/* WEBPHP Assignment 4 
DOOR LEVER INVENTORY ASSIGNMENT
BEN ROBERTS 000726910
10/12/22

FILENAME: updateDbase.php
This file is called by the priceChange.php file. Upon validation of the data entered this file enters the valid data into the acme_products table of the acme_door_levers database. */


	/* ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(-1); */
	
	$conn = @mysqli_connect("localhost:3306","root","","acme_door_levers");

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "<p>Failed to connect to MySQL and the db: " . mysqli_connect_error() . "</p>";
	}
	else
		echo "<p>Connected to MySQL and the DB</p>";
				

		$query = "UPDATE acme_products SET price = '$newPrice' WHERE productId= '$productId'";
		$results = mysqli_query($conn,$query);
		$numRowsAffected = mysqli_affected_rows($conn);
		if (!$results) 
		{
			echo "<p>Error updating product data: " . mysqli_error($conn) . "</p>";
		}
		else 
			if ($numRowsAffected != 0) 
			{
				echo "<p>Error - Product ID not found.";
			}
			/* else 	
			 
				
				echo "<p>Price successfully updated for Product ID: ".$productId."</p>";
				//Show the updated record
				$query = "SELECT * FROM acme_products WHERE productId=".$productId;
				$results = mysqli_query($conn,$query);
				if ($results) 
				{
					$numRecords=mysqli_num_rows($results);
					if ($numRecords != 0)
					{
						//fetch and display results
						while ($row = mysqli_fetch_array($results)) 
						{ 
							
	
	
							echo "<p>Product ID:	$row[productId]</p>"; 
							echo "<p> Updated Price: $row[price]</p>"; 
							echo "<a href='acmePortal.php'>Return to Portal</p>";
						}
					}
					else
						echo "<p>Product ID not found!</p>";
				} */
				
		
	//Close the connection
	mysqli_close($conn);
?>
</body>
</html>