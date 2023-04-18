<?php
	//downloadfile.php uses the database mycompany and table product_images
	//to retrieve the image

	include ('InitialiseDB.php');

	$dbQuery = "SELECT imageurl FROM acme_products WHERE productId='1'";

	$result = mysqli_query($conn, $dbQuery);

	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		echo"<h1>File downloaded ($row[imageurl])</h1>";
		echo "<img src='$row[imageurl]' height='300' width='200'/>";
	}
	else {
		echo "Record doesn't exist";
	}
?>