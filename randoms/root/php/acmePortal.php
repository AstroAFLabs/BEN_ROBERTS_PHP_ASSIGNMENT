<!DOCTYPE html>

<?php
/*WEBPHP Assignment 4
DOOR LEVER INVENTORY ASSIGNMENT
BEN ROBERTS 000726910
12/12/22

FILENAME: acmePortal.php
This is the main entry page for staff or users to access the acme door levers database.  */

		//This is the code for hiding errors from the final output. 
	
		//ini_set('display_errors', 0);
		//ini_set('display_startup_errors', 0);
		//error_reporting(-1);

	

		//This connects to the acme_door_levers DB
		
		$conn = @mysqli_connect("localhost:3306","root","","acme_door_levers");
		$mysqli = new mysqli("localhost:3306","root","","acme_door_levers"); //connects PHP to DB
// Check connection
	if (mysqli_connect_errno())
		{
		echo "<p>Failed to connect to MySQL and the Acme Door Levers db: " . mysqli_connect_error() . "</p>";
		}
		else
		{
		echo "<p>Connected to MySQL and the Acme Door Levers DB</p>";
		
		}
	

		//Declare placeholders for variables
		//this needs to be outside of the if statement otherwise this will not be recognised in the form tags
		
		$errMessProdName = "required field";
		$errMessDesc = "required field";
		$errMessUsage = "required field";
		$errMessFinish = "required field";
		$errMessPrice = "required field";
		//$errMessImage = "required field";
		$productName = "";
		$description = "";
		$usage = "";
		$finish = "";
		$price = "";

	

		//User now submits details
		
	if($_SERVER["REQUEST_METHOD"] == "POST"){ //Staff member has submitted details
			
		//form entry data is retrieved

		$productName = $_POST["productName"];
		$description = $mysqli -> real_escape_string($_POST["description"]);
		$usage = $_POST["usage"];
		$finish = $_POST["finish"];
		$price = $_POST["price"];

	
	//make sure a file has been entered
	

		//Validation of information entered into the form
		
	if ($productName == ""){
				
			$errMessProdName = "Product name can not be blank";
			//echo "Product name can not be blank";
	}
				
		elseif (!$_POST['description']){
			
			//echo "Description field can not be blank";
			$errMessDesc = "Please enter a product description.";
				}
				
		elseif (!$_POST['usage']){
			
			//echo "Please provide usage details";
			$errMessUsage = "Please enter the product usage";
				}
				
		elseif (!$_POST["finish"]){
			
			//echo "Please enter a product finish";
			$errMessFinish = "Please enter the product finish type";
				}
				
		elseif (!$_POST["price"]){
			
			//echo "Please enter the product price";
			$errMessPrice = "<p>Please enter the product value: ";
				
				}
				
			else 
			{
				include('product_cookie.php');		//validated information is sent to the product_cookie.php file, which enters every thing into the DB and creates a cookie
				header ('Location: thankYou.php');	//The output of product cookie is displayed on this redirected page
				
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
		<meta charset="UTF-8">
			<link rel="stylesheet"
			      type="text/css"
			      href="css/METAKRON.css">
				<title>Upload a File</title>
			</head>
			<style>
		.error {
			usage: #FF0000;
		} 
	</style>
			<header class=" header uk-animation-slide-right">ACME Ceramics Pty Ltd</header>
			<body>
				<section class="article">
					<div class="uk-card uk-card-default">
						<h1>Product Upload Page</h1>
						<div class="uk-card-default">
							<h2>Acme Door Levers</h2>
							<h2>Product Detail Form</h2>
							<form class="uk-default paragraphACME"
							      method='POST'
							      action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  enctype="multipart/form-data">
		
		
		<p>
								<label for="productName">Product Name</label>
								<input type="text"
								       id="productName"
								       name="productName"
								       value="<?php echo $productName;?>">
									<span class="error">* <?php echo $errMessProdName;?>
									</span>
								</p>
								<p>Product Description
		
		
		
		<label for="description"/>
									<textarea rows="5"
									          cols="50"
									          id="description"
									          name="description"><?php echo $description;?>
									</textarea>
									<span class="error">* <?php echo $errMessDesc;?>
									</span>
								</p>
								<p>
									<label for="usage">Product Function</label>
									<input type="usage"
									       id="usage"
									       name="usage"
									       value="<?php echo $usage;?>">
										<span class="error">* <?php echo $errMessUsage;?>
										</span>
									</p>
									<p>Product Finish
		<label for="finish">
											<select id="finish"
											        name="finish"
											        value="<?php echo $finish;?>">
												<span class="error">* <?php echo $errMessFinish;?>
												</span>
											</label>
											<option value="">Enter finish type</option>
											<option value="Brushed Chrome">Brushed Chrome</option>
											<option value="Brushed Zinc">Brushed Zinc</option>
											<option value="Matte">Matte</option>
											<option value="Pewter">Pewter</option>
											<option value="Polished Brass">Polished Brass</option>
											<option value="Rustic">Rustic</option>
											<option value="Pioneer">Pioneer</option>
											<option value="East Coast">East Coast</option>
										</select>
									</p>
									<label for="price">Price</label>
									<input type="number"
									       id="price"
									       name="price"
									       value="<?php echo $price;?>">
										<span class="error">* <?php echo $errMessPrice;?>
										</span>
										<div class="uk-card-default">
											<p>
												<input type='hidden'
												       name='MAX_FILE_SIZE'
												       value='41943040'/>
												<p>
													<label for="userfile">Send this file</label>
													<input type="file"
													       id="userfile"
													       name="userfile"/>
												</p>
												<p>
													<input type="submit"
													       id="Send File"
													       name="Send File"
													       value="Send File"/>
													<p>
														<label for="resetFile">CLear Form</label>
														<input type="reset"
														       id="resetFile"
														       name="reset"
														       value="Clear form"/>
													</div>
												</form>
												<ul>
													<li>
														<a href="priceChange.php"
														   target="external">Update Product/price</a>
													</li>
													<li>
														<a href="staffDetailsUpdate.php"
														   target="external">Update Staff Details Here</a>
													</li>
													<li>
														<a href="deleteProduct.php"
														   target="external">Remove Product</a>
													</li>
												</ul>
											</div>
										</div>
									</section>
								</body>
							</html>