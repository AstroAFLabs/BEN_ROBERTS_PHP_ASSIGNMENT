<!DOCTYPE html>
<?php

/* WEBPHP Assignment 4 
DOOR LEVER INVENTORY ASSIGNMENT
BEN ROBERTS 000726910
12/12/22

FILENAME: priceChange.php

This file processes requests for updates to the prices of items in the Acme door levers catalogue */



$errMessageUserName="required field"; //this needs to be outside of the if statement otherwise 													    //this will not be recognised in the form tags
		
		$errMessageID="required field"; 
		$errMessagePrice="required field";
		$productId ="";
		$newPrice ="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {  //User has pressed the submit button
		$productId=$_POST["productId"];
		$newPrice=$_POST["price"];
		
		
			
			if($productId == "") {
				$errMessageID="You must enter a product ID no.";
				
			}
			
			elseif(!is_numeric($productId)){
				$errMessageID="Product ID must be numerical";
				
				
			}
			if($newPrice == "") {
				$errMessagePrice="We don't give away free stuff pal.";
				
			}
			
			if(!is_numeric($newPrice)){
				$errMessagePrice="We only accept numbers as numbers. No runes, sea shells,beads or iou's. Numbers.";
				
			}
			
			if ($newPrice < 20 || $newPrice > 200){
				$errMessagePrice="Please choose a value between $20 and $200";
				
			}
			else{
				include('updateDbase.php');
			}
		}
			
		
		
		 
?>
<html lang="en">
	<head>
	
	<meta charset="UTF-8">
	
	<link rel="stylesheet" type="text/css" href="METAKRON.css">

	<title>Upload Product Details</title>
	</head>
	
	<body>
	<header class=" header uk-animation-slide-right">ACME Ceramics Pty Ltd</header> 
<body>

<h1>Product Update Page</h1>
<section>
<h1><em>Please enter the relevant product ID here, and then the updated price. Once you have entered these details, please press submit</em></h1>
<div>
<form  bgcolor="#ffff99" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="productId">Product ID     </label>
<input type="text" id="productId" name="productId" value="<?php echo $productId;?>"/><span class="error">*<?php echo $errMessageID;?></span></br></br>
<p><label for="newPrice">New Price     </label>
<label for="price"></label><input type="text" id="price" name="price"  min="20" max="200" value="<?PHP echo $newPrice;?>"/><span class="error">*<?php echo $errMessagePrice;?>></span></br></br>


<label for="submit">Submit</label><input type="submit" name="submit" value="Submit"/>
<label for="reset">Reset</label><input type="reset" name="reset" value="Reset Form">
</form>
</div>
</section>
</body>
</html>
