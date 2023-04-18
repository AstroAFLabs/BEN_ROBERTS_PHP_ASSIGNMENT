<!DOCTYPE html>

<?php
		
		/* WEBPHP Assignment 4
		DOOR LEVER INVENTORY ASSIGNMENT
		BEN ROBERTS 000726910

		FILENAME: deleteProduct.php
		This file provides a form for users to remove products from the database. No muss, no fuss. It calls up the deleteDbaseEntry.php file.*/
										

		
			$errMessageID="required field"; //this needs to be outside of the if statement otherwise this will 													        not be recognised in the form tags
			$productId ="";
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {  //User has pressed the submit button
				$productId = $_POST["productId"];
				
				if($productId == "") {
					$errMessageID=" ID must not be blank";
				}
				elseif (!is_numeric($productId)){
					$errMessageID="Product ID must be numeric only";
				}
				
				else {
					include('deleteDbaseEntry.php');
					exit();
				}
			}
		?>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="METAKRON.css">
		<!DOCTYPE html>
	<html lang="en">
		<head>
			
<?php 

/*WEBPHP ASSIGNMENT BEN ROBERTS
000726910
09/12/2022

FILENAME: login.php
This file collects and stores user logins to the acme door levers DB.*/

		ini_set('display_errors', 0);
		ini_set('display_startup_errors', 0);
		error_reporting(-1);
		
		include('php/initialiseDB.php');

/*this needs to be out-side of the if statement otherwise this will not be recognised in the form tags*/

		$errMessageUserName="required field";
		$errMessageUserPassword="required field"; 
		$userName ="";
		$userPassword ="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {  //User has pressed the submit button
		
		
			
			
			
			
			$userName = checkInput($_POST["userName"]);
			$userPassword = checkInput($_POST["userPassword"]);
			$errMessageUserName = "";
			$errMessageUserPassword = "";
			$validData = true;

			
			
			if($userName == "") {
				$errMessageUserName="Please enter your name.";
				$validData = false;
			}
			
			elseif($userPassword == "") {
				$errMessageUserPassword="You must enter your password";
				$validData = false;
			}
			
			else {
				include("php/LoginDetails_Verify.php");
				$validData = true;
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
<meta charset="utf-8" >
<link rel="stylesheet" type="text/css" href="css/METAKRON.css">

<!DOCTYPE html>
	<html lang="en">
		<head>
			
<?php 

/*WEBPHP ASSIGNMENT BEN ROBERTS
000726910
09/12/2022

FILENAME: login.php
This file collects and stores user logins to the acme door levers DB.*/

		/* ini_set('display_errors', 0);
		ini_set('display_startup_errors', 0);
		error_reporting(-1); */
		
		include('php/initialiseDB.php');

/*this needs to be out-side of the if statement otherwise this will not be recognised in the form tags*/

		$errMessageUserName="required field";
		$errMessageUserPassword="required field"; 
		$userName ="";
		$userPassword ="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {  //User has pressed the submit button
		
		
			
			
			
			
			$userName = checkInput($_POST["userName"]);
			$userPassword = checkInput($_POST["userPassword"]);
			$errMessageUserName = "";
			$errMessageUserPassword = "";
			$validData = true;

			
			
			if($userName == "") {
				$errMessageUserName="Please enter your name.";
				$validData = false;
			}
			
			elseif($userPassword == "") {
				$errMessageUserPassword="You must enter your password";
				$validData = false;
			}
			
			else {
				include("php/LoginDetails_Verify.php");
				$validData = true;
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
<meta charset="utf-8" >
<link rel="stylesheet" type="text/css" href="css/METAKRON.css">


<title>Acme Staff Portal Page</title>
</head>
<header class=" header uk-animation-slide-right">ACME Ceramics Pty Ltd</header> 
<body>
<section>
<div>

<h1>Staff Login</h1>

<p>Please enter your login and, when ready, press the submit button</br>

Note: * denotes a mandatory field.

<form method="POST" action="php/LoginDetails_Verify.php">
<label for="userName">Name</label>
<input type="text" id="userName" name="userName" value="<?php echo $userName;?>"/><span class="error">*<?php echo $errMessageUserName;?></span><br><br>
</p>
<p><label for="userPassword">Login ID</label></p>
<input type="password" id="userPassword" name="userPassword" value="<?php echo $userPassword;?>"/><span class="error">*<?php echo $errMessageUserPassword;?></span><br><br>


<p><label for="submitDetails">SUBMIT DETAILS</label><input type="submit" name="submit" value="Login"/></p>

<p><label for="resetForm">RESET FORM</label><input type="reset" name="reset" value="Reset Form"/></p>
</form>
<hr>
<p>Enter new user details</p>
<button type="button" background-usage="green" name="newUser" value="New User"/>
<a href="php/staffDetailsUpdate.php" value="staffUpdate">Update Details here
</a>



</div>

</section>

<footer>ACME Ceramics Pty Ltd</footer>
</body>

</html>

<title>Acme Staff Portal Page</title>
</head>
<header class=" header uk-animation-slide-right">ACME Ceramics Pty Ltd</header> 
<body>
<section>
<div>

<h1>Staff Login</h1>

<p>Please enter your login and, when ready, press the submit button</br>

Note: * denotes a mandatory field.

<form method="POST" action="php/LoginDetails_Verify.php">
<label for="userName">Name</label>
<input type="text" id="userName" name="userName" value="<?php echo $userName;?>"/><span class="error">*<?php echo $errMessageUserName;?></span><br><br>
</p>
<p><label for="userPassword">Login ID</label></p>
<input type="password" id="userPassword" name="userPassword" value="<?php echo $userPassword;?>"/><span class="error">*<?php echo $errMessageUserPassword;?></span><br><br>


<p><label for="submitDetails">SUBMIT DETAILS</label><input type="submit" name="submit" value="Login"/></p>

<p><label for="resetForm">RESET FORM</label><input type="reset" name="reset" value="Reset Form"/></p>
</form>
<hr>
<p>Enter new user details</p>
<button type="button" background-usage="green" name="newUser" value="New User"/>
<a href="php/staffDetailsUpdate.php" value="staffUpdate">Update Details here
</a>



</div>

</section>

<footer>ACME Ceramics Pty Ltd</footer>
</body>

</html>

		<title>Delete Record Example</title>
	</head>
	
	<style>
		.error {
			usage: #FF0000;
		} 
	</style>
	
	<body>
	<section>
	<div>
	
		

		<h1>Delete Product Form</h1>
				
		<form class="box" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
			<label for="productId">Enter Product ID: <input type="text" class="uk-card-default" id="productId" name="productId" size="20" value="<?php echo 				$productId;?>"><span class="error">* <?php echo $errMessageID;?></span><br /><br /></label>
			<input type="submit" name="submit" value="Submit">
		</form>	
	</div>
	</section>
	</body>
</html>




