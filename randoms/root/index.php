<!DOCTYPE html>
	<html lang="en">
		<head>
			
<?php 

/*WEBPHP ASSIGNMENT BEN ROBERTS
000726910
09/12/2022

FILENAME: index.php
This file creates the landing page for the acme door levers DB, providing a login portal for staff to access it all. It also 
initiates the creation of said database- if it doesn't already exist.*/

		ini_set('display_errors', 0);
		ini_set('display_startup_errors', 0);
		error_reporting(-1);
		
		//include('php/initialiseDB.php');
		
	//27/03  correspondence with Danny this morning: initialiseDB is not meant to be included or used by any other files. It is a seperate entity to everything else.

/*this needs to be out-side of the if statement otherwise this will not be recognised in the form tags*/

		
		/* $userName ="";
		$userPassword =""; */
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {  //User has pressed the submit button
		if (isset($_POST["reset"])){
			$_POST = array();
			exit();
		}
			
			
			
			
			$userName = ($_POST["userName"]);
			$userPassword = ($_POST["userPassword"]);
			$errMessageUserName="";
			$errMessagePassword=""; 
			//$validData = true;

			
			
			if($_POST["userName"] == "") {
				$errMessageUserName="Please enter your name.";
				$validData = false;
			}
			
			elseif($_POST["userPassword"] == "") {
				$errMessagePassword="You must enter your password";
				$validData = false;
			}
			 //work on this today
			/* else {
				include("php/LoginDetails.php");
				$validData = true;
				exit();
			} */
			if($validData){
						 include("php/LoginDetails_Verify.php");
						 exit();
					 }
			
		}
		
		 function checkInput($inputData) {
			$inputData = trim($inputData);
			$inputData = stripslashes($inputData);
             return htmlspecialchars($inputData);
		 }
		 
		if(isset($_POST["reset"])){
			header("Refresh:0");
			exit();
		} 
	//Connect to the database server using the syntax mysqli_connect(server, username, password)

	?>
<!DOCTYPE html>


<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./uikit.css">
<link rel="stylesheet" type="text/css" href="./METAKRON.css">
<style>
		.error {
			color: #FF0000;
		} 
	</style>

<title>Login Page</title>
</head>
<header class=" header uk-animation-slide-right">ACME Ceramics Pty Ltd</header> 
<body>
<section>
<div>

<h1>Staff Login</h1>

<p>Please enter your login and, when ready, press the submit button</br>

Note: * denotes a mandatory field.



<form method="post" action="php/LoginDetails_Verify.php">
					<label for="userName">Username:</label><input type="text" id="userName" name="userName" size="20" value="<?php echo $userName;?>"><span>*<?php echo $errMessageUserName;?></span>
					<br /><br />
					<label for="userPassword">Password:</label><input type="password" id="userPassword" name="userPassword" size="20" value=""><span>*<?php echo $errMessagePassword;?></span>
					<br /><br />
					
					<p><label for="submitDetails">SUBMIT DETAILS</label><input type="submit" name="submit" value="Login"/></p>

<p><label for="resetForm">RESET FORM</label><input type="reset" name="reset" value="Reset Form"/></p>
</form>
<hr>
<p>Enter new user details</p>
<button type="button" background-usage="green" name="newUser" value="New User"/>
<a href="#" value="staffUpdate">Update Details here
</a>



</div>

</section>

<footer>ACME Ceramics Pty Ltd</footer>
</body>

</html>

Today:

got valid username and password accepted.

I'm having trouble getting error messages to come up for blank form fields etc. 

I need to check over the file path (?) of the whole thing. 

Worry about styling right at the end. 

03/04:  trying to work out why i can't get an image into the images folder in xampp. gotta wade through the old assignments.
