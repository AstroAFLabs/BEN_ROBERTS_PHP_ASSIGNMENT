<?php 


	//Connect to the database server using the syntax mysqli_connect(server, username, password)
	 $conn = mysqli_connect("localhost:3306", "root", "");
	 

	if (!$conn) 
	{
	 
		echo "The connection has failed: " . mysqli_error($conn);
	}
	else 
	{
		//echo "Successfully connected to mySQL!";


		//Need to create a database called acme

		$query = "CREATE DATABASE IF NOT EXISTS acme";
		$dbName ="";

		if (!mysqli_query($conn,$query)) 
		{		
			echo "<p>Could not open the database: " . mysqli_error($conn)."</p>";
		}
		else
		{
			//echo "<p>Database successfully created</p>";
			
			if (!mysqli_select_db($conn,"acme")) 
			{
				echo "<p>Could not open the database: " . mysqli_error($conn)."</p>";	
			}
			else 
			{
				//echo "<p>Database selection successful</p>";
				
				$query = "CREATE TABLE IF NOT EXISTS names (id int not null auto_increment primary key, name varchar(50),age int)";
				if (!mysqli_query($conn,$query)) 
				{
					echo "table query failed: " . mysqli_error($conn);
				}
				else 
				{
					//echo "<p>table query successful</p>";

					//insert data in the table
					$insert = "INSERT INTO names (name, age) VALUES ('$_POST[name]', '$_POST[age]')";

					if (mysqli_query($conn,$insert)) 
					{
						//update successful, retrieve the auto id - nameID
						$nameID = mysqli_insert_id($conn);
						//Set the cookie
						setcookie("userID",$nameID);
					}
					else 
					{
						echo "table query failed: " . mysqli_error($conn);
					}
				}
			}
		}
	}

	//Close the connection

	mysqli_close($conn);

?>