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
		<style>
		.error {
			color: #FF0000;
		} 
	</style>	


<meta charset="utf-8" >
<link rel="stylesheet" type="text/css" href="css/METAKRON.css">



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




