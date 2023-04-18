<!doctype html>
<?php
					
					
					$errMessageUserName="required field";//keep this statement outside of the if statement
					$errMessagePassword="required field";
					$userName="";
					$userPassword="";
					
					if ($_SERVER["REQUEST_METHOD"]=="POST"){//SUBMIT BUTTON IS PRESSED
					if (isset($_POST["reset"])){
						header("Refresh:0");
						exit();
						
					}
					$userName = checkInput($_POST["userName"]);
					$userPassword =  checkInput($_POST["userPassword"]);
					
					$errMessageUserName="";
					$errMessagePassword="";
					
					$validData = true;
					
					if($userName == ""){
						$errMessageUserName =" User name must not be blank";
						$validData = false;
					}
						
					if($userPassword == ""){
						$errMessagePassword = "Password can not be blank";
						$validData = false;
					}
					
					//work on this today.. can this file and index.php be merged?
					 if($validData){
						 include("LoginDetails_Verify.php");
						 exit();
					 }
					}
					
					function checkInput($inputData){
						$inputData = trim($inputData);
						$inputData = stripslashes($inputData);
						$inputData = htmlspecialchars($inputData);
						$inputData = strip_tags($inputData);
						return $inputData;
						
					}
					
					
					?>
					
					<html lang="en">
					<head>
					<meta charset="utf-8">
					<title>Login Page</title>
					<link rel='stylesheet' type='text/css' href='css/METAKRON.css'>
					</head>
					<body>
					<h1>Login Details</h1>
					
					<form method="post" action=<?php echo htmlspecialchars($$_SERVER["PHP_SELF"]);?>>
					<label for="userName">Username:</label><input type="text" id="userName" name="userName" size="20" value="<?php echo $userName;?>"><span>*<?php echo $errMessageUserName;?></span>
					<br /><br />
					<label for="userPassword">Password:</label><input type="text" id="userPassword" name="userPassword" size="20" value=""><span>*<?php echo $errMessagePassword;?></span>
					<br /><br />
					
					<input type="submit" name="submit" value="Submit">
					<input type="submit" name="reset" value="Reset" title="Reset Form">
					</form>
					</body>
					</html>
					

