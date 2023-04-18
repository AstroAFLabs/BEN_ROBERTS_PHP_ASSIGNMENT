<!DOCTYPE HTML>
<html lang="en">
	<head>

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
		
		
		$conn = @mysqli_connect("localhost:3306","root","","acme_door_levers");
		$mysqli = new mysqli("localhost:3306","root","","acme_door_levers");
// Check connection
	if (mysqli_connect_errno())
		{
		echo "<p>Failed to connect to MySQL and the Acme Door Levers db: " . mysqli_connect_error() . "</p>";
		}
		else
		{
		echo "<p>Connected to MySQL and the Acme Door Levers DB</p>";
		
		}
		

		
		//this needs to be outside of the if statement otherwise this will not be recognised in the form tags
		
		$errMessProdName = "required field";
		$errMessDesc = "required field";
		$errMessUsage = "required field";
		$errMessFinish = "required field";
		$errMessPrice = "required field";
		// $errMessImage = "required field";
		$productName = "";
		$description = "";
		$usage = "";
		$finish = "";
		$price = "";
		
	if($_SERVER["REQUEST_METHOD"] == "POST"){ //Staff member has submitted details
			
		
		$productName = $_POST["productName"];
		$description = $mysqli -> real_escape_string($_POST["description"]);
		$usage = $_POST["usage"];
		$finish = $_POST["finish"];
		$price = $_POST["price"];
		
		/* $fileupload = $_FILES['userfile']['name'];
		$filetype = $_FILES['userfile']['type'];
		$filesize = $_FILES['userfile']['size'];
		$tempname = $_FILES['userfile']['tmp_name'];
		$filelocation = "../images/$fileupload"; */

		/* if(isset($_POST['Send File'])){
			$fileupload = $_FILES['userfile']['name'];
			$filetype = $_FILES['userfile']['type'];
			$filesize = $_FILES['userfile']['size'];
			$tempname = $_FILES['userfile']['tmp_name'];
			$filelocation = "../images/$fileupload";
		} */


		if ($productName == ""){
			echo "Product name must not be blank";
			$errMessProdName = "Product name must not be blank";
		}
				
		elseif (!$_POST['description']){
			echo "Description must not be blank";
			$errMessDesc = "Please enter a product description.";
				}
				
		elseif (!$_POST['usage']){
			echo "product usage must not be blank";
			$errMessUsage = "Please enter the product usage";
				}
				
		elseif (!$_POST["finish"]){
			
			$errMessFinish = "Please enter the product finish type";
				}
				
		elseif (!$_POST["price"]){
			echo "product price must not be blank";
			$errMessPrice = "<p>Please enter the product value: ";
				
				}
				
			else 
			{
				include('product_cookie.php');
				header ('Location: thankYou2.php');
				
			}
	}
	
	// $query = "use database acme_door_levers";
	
	// if($_SERVER["REQUEST_METHOD"]== "POST"){
	
		// //make sure a file has been entered
		// if($tempname == "") {
			// echo "<p>You must enter a valid file (PNG or JPG) and size (less than 40M) </p>" ;
		// }
		// else
		// {
			// if (!move_uploaded_file($tempname,$filelocation)) {
				// switch ($_FILES['userfile']['error'])
				// {
					// case UPLOAD_ERR_INI_SIZE:
						// echo "<p>Error: File exceeds the maximum size limit set by the server</p>" ;
						// break;
				
					// case UPLOAD_ERR_FORM_SIZE:
						// echo "<p>Error: File exceeds the maximum size limit set by the browser</p>" ;
						// break;
				
					// case UPLOAD_ERR_NO_FILE:
						// echo "<p>Error: No file uploaded</p>" ;
						// break;
				
					// default:
						// echo "<p>File could not be uploaded </p>" ;
					
				// }
			
			// }
		// }
		// $conn = @mysqli_connect("localhost:3306","root","","acme_door_levers");
		
		// $dbQuery = "INSERT INTO acme_products(productName, description, productUsage, finish, price, imageurl) VALUES ('$productName','$description','$usage','$finish','$price', '$filelocation')";

		// if (mysqli_query($conn, $dbQuery))
			
		// {
			// echo "<!DOCTYPE html>";
			// echo "<html lang='en'>";
				// echo "<head>";
					
					// echo "<meta charset='UTF-8'>";
					// echo "<title>File Upload</title>";				
				// echo "</head>";
				// echo "<body>";
					// echo "<div>";
					// echo"<h1>File Uploaded</h1>";
					// echo"<p><img src='$filelocation' height='600' width='600'></p>";
					// $cid = mysqli_insert_id($conn);
					// echo "<table>";
					// echo "<tr><td>Product ID for this record is: ". $cid . "</td></tr>";
					// echo "</table>";
					// echo "</p>";
					// echo"The details of the uploaded file are shown below:<br/>";
					// echo"<b>File Name: </b>$fileupload<br/> ";
					// echo"<b>File type: </b>$filetype<br/> ";
					// echo"<b>File size: </b>$filesize bytes<br/> ";
					// echo"<b>Uploaded to: </b>$tempname<br/> ";
					// echo"<a href='acmePortal.php'>Add Another file</a>";
					// echo "</div>";
				// echo "</body>";
			// echo "</html>";
			
		// }
		// else
		// {
			// echo "<p>Couldn't add the file to the database " . mysqli_error($conn) .  "</p>" ;
		
		// }
	// }
	?>
		<meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="css/METAKRON.css">
				<link rel="stylesheet" type="text/css" href="./uikit.css">
					<title>Upload a File</title>
				</head>
				<header class=" header uk-animation-slide-right">ACME Ceramics Pty Ltd</header>
				<body>
					<div hidden>
				</div>
				<section class="article">
					<div class="uk-card uk-card-default">
						<h1>Product Upload Page</h1>
						<div class="uk-card-default">
							<h2>Acme Door Levers</h2>
							<h3>Product Detail Form</h3>
							<form class="uk-default paragraphACME" method='POST' action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  enctype="multipart/form-data">
		
		
		<p>
								<label for="productName">Product Name</label>
								<input type="text" id="productName" name="productName"/>
								<p>Product Description
	
		
		
		<label for="description">
										<textarea rows="5" cols="50" id="description" name="description" placeholder="Please enter a product description">Please provide a short description of the product</textarea>
									</label>
								</p>
								<p>
									<label for="usage">Product Function</label>
									<input type="usage" id="usage" name="usage"/>
									<p>Product Finish
		<label for="finish">
											<select id="finish" name="finish"/>
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
									<input type="number" id="price" name="price" value="1" max="200">
										<div class="uk-card-default">
											<p>
												<input type='hidden' name='MAX_FILE_SIZE' value='41943040'/>
												<p>
													<label for="userfile">Send this file</label>
												</p>
												<p>
													<input type="file" id="userfile" name="userfile"/>
												</p>
												<p>
													<input type="submit" id="SendFile" name="Send File" value="Send File"/>
													<p>
														<label for="resetFile">CLear Form</label>
														<input type="reset" id="resetFile" name="reset" value="Clear form"/>
													</div>
												</form>
												<ul>
													<li>
														<a href="priceChange.php" target="external">Update Product/price</a>
													</li>
													<li>
														<a href="staffDetailsUpdate.php" target="external">Update Staff Details Here</a>
													</li>
													<li>
														<a href="deleteProduct.php" target="external">Remove Product</a>
													</li>
												</ul>
											</div>
										</div>
									</section>
								</body>
							</html>