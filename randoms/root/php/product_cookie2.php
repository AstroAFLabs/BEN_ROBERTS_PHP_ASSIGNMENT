
<?php
			
		//Connect to server using syntax mysqli_connect(server, username, password)
		
	$conn = mysqli_connect("localhost:3306", "root", "", "acme_door_levers");
		
	if (!$conn)
		{
			echo "Connection to database has failed: " . mysqli_error($conn);
		}
		else
		{	
			$dbQuery = "INSERT INTO acme_products(productName, description, productUsage, finish, price, imageurl) VALUES ('$productName','$description','$usage','$finish','$price', '$filelocation')";

			if (mysqli_query($conn, $dbQuery))
			{
				$productId = mysqli_insert_id($conn);
				setcookie("itemNo", $productId);
			}
		else 
		{
			echo "table query failed: " . mysqli_error($conn);
			}
				
		}
			
			//signing out...
			mysqli_close($conn);
		?>
	
		