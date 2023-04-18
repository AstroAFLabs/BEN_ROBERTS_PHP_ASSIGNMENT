<?php 

/*WEBPHP ASSIGNMENT BEN ROBERTS
000726910
09/12/2022
name of file: LoginDetails_Verify.php

This file collects and adds staff login details to the acme door levers DB, upon verification and password encryption*/

	//error messages hidden

	/* ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(-1);  */
 
	//Connect to the database server using the syntax mysqli_connect(server, username, password)
	
	
	
	 $conn = @mysqli_connect("localhost:3306", "root", "");
	 
	 if (!$conn) {
		echo "The connection has failed: " . mysqli_error($conn);
	 }
	else 
	{
				$dbName = "acme_door_levers";
				$query = "use acme_door_levers";
				
				if(!mysqli_query($conn, $query)){
		
					echo"<p>Could not open the database: ".mysqli_error($conn)."</p>";
				}
				else
				{
					
					
			
					
					
					$userName = $_POST['userName'];
					$userPassword = $_POST['userPassword'];
					
					$query = "SELECT * FROM staff_logins WHERE userName='".$userName."'";
					$results = mysqli_query($conn,$query);
					if ($results) 
					{
						$numRecords=mysqli_num_rows($results);
						if ($numRecords == 0) //found a match with the username
						{	
						echo "<p>This user does not exist in the database.</p>";}

							else {
								//need to verify user - check the password
							$row = mysqli_fetch_array($results);
							$hashedPassword = password_hash($userPassword,PASSWORD_DEFAULT);
							$hashedPassword = $row['userPassword'];
							$myHashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
							$passwordsAreTheSame = password_verify($userPassword,$hashedPassword);
							
							if ($passwordsAreTheSame == true)
							{
								echo	"<p>Passwords match!</p>";
								
								echo "<p><a href='acmePortal.php'>Acme Products Portal</a></p>";
								
						}
							 else
							{
								
								echo	"<p>Username exists but the password does not match.</p>";
							
								echo	"<p><a href='../index.php'>Return to login page<a></p>";
								echo	"<hr>";
							}}
							
							
							
							
							
							//insert data in the table
							
						}
						
					}
							
						}	
					
					
				
			
		
	
	
	//Close the connection
	mysqli_close($conn);
?>

