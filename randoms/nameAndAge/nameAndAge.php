<!DOCTYPE html>

	
	<?php
		$errMessageAge="required field"; //this needs to be outside of the if statement otherwise this will not be recognised in the form tags
		$errMessageName="required field"; 
		$userAge ="";
		$userName ="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {  //User has pressed the submit button
			$userAge = $_POST["age"];
			$userName = $_POST["name"];
			
			if($userName == "") {
				$errMessageName="Name must not be blank";
			}
			elseif($userAge == "") {
				$errMessageAge="Age must not be blank";
			}
			elseif (!is_numeric($userAge)){
				$errMessageAge="Age must be numeric only";
			}
			elseif ($userAge < 0 or $userAge > 100) {
				$errMessageAge="Age must between 0 and 100";
			}
			else {
				include('nameAndAge_db.php');
				//You can also set the cookie here instead of nameAndAge_db.php
				//setcookie("userID",$nameID);
				/* Show thank you page */
				header('Location: nameAndAgeThankYou.php');
				exit();
			}
		}
	
	
	?>
	
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Name and Age Example</title>
	</head>
	
	<style>
		.error {
			color: #FF0000;
		} 
	</style>
	
	<body>
		<h1>Name and Age Form</h1>
				
		<form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
			<label for="name">Enter your name: <input type="text" name="name" id="name" size="20" value="<?php echo $userName;?>"><span class="error">* <?php echo $errMessageName;?></span><br /><br /></label>
			<label for="age">Enter your age: <input type="text" name="age" id="age" size="20" value="<?php echo $userAge;?>"><span class="error">* <?php echo $errMessageAge;?></span><br /><br /></label>
			<input type="submit" name="submit" value="Submit">
		</form>
		
	</body>


</html>