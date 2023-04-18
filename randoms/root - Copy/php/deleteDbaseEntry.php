<?php 

/* WEBPHP Assignment 4 
DOOR LEVER INVENTORY ASSIGNMENT
BEN ROBERTS
11/12/22

FILENAME: deleteDbaseEntry.php
This file is called by the deleteProduct.php and processes the necessary MYSQL to remove a product from the database. */

	

	
	<?php 

	/* ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(-1); */

	$conn = @mysqli_connect("localhost:3306","root","","acme_door_levers");

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "<p>Failed to connect to MySQL and the Acme Door Levers db: " . mysqli_connect_error() . "</p>";
	}
	else
	{
		echo "<p>Connected to MySQL and the Acme Door Levers DB</p>";
				
		$query = "DELETE FROM productName WHERE id= $productId ";
		$results = mysqli_query($conn,$query);
		$numRowsAffected = mysqli_affected_rows($conn);
		if (!$results) 
		{
			echo "<p>Error deleting product data: " . mysqli_error($conn) . "</p>";
		}
		else 
		{
			if ($numRowsAffected == 0) 
			{
				echo "<p>Error - user ID not found.";
			}
			else 		
			{		
				echo "<p>Product Number: ".$productId." successfully deleted</p>";
			}
		}
	}
		
	//Close the connection
	mysqli_close($conn);

?>